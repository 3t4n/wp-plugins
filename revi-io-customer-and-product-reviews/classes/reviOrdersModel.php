<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class reviOrdersModel
{
    var $REVI_API_URL;
    var $prefix;
    var $wpdb;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->prefix = $this->wpdb->prefix;
        $this->REVI_API_URL = REVI_API_URL;
    }



    ////////////////////// REVI ORDERS ///////////////////////

    public function addReviOrder($idOrder, $status)
    {
        $date_sent = date('Y-m-d H:i:s');
        if (!$this->checkReviOrderExist($idOrder)) {
            $this->insertReviOrder($idOrder, $status, $date_sent);
        } else {
            $this->updateReviOrders($idOrder, $status, $date_sent);
        }
    }

    public function insertReviOrder($idOrder, $status, $date_sent = null)
    {
        if (empty($date_sent)) {
            $date_sent = date('Y-m-d H:i:s');
        }
        $sql = "INSERT INTO `revi_orders`(id_order, status, date_sent) VALUES ('" . $idOrder . "', '" . $status . "', '" . $date_sent . "')";
        $this->wpdb->query($sql);
    }

    public function updateReviOrders($idOrder, $status, $date_sent = null)
    {
        if (empty($date_sent)) {
            $date_sent = date('Y-m-d H:i:s');
        }
        $sql = "UPDATE revi_orders SET status = '" . $status . "', date_sent = '" . $date_sent . "' WHERE id_order = '" . $idOrder . "'";
        $this->wpdb->query($sql);
    }

    public function checkReviOrderExist($idOrder)
    {
        $sql = "SELECT id_order FROM revi_orders WHERE id_order = '" . $idOrder . "'";
        $result = $this->wpdb->get_row($sql);
        if (!empty($result->id_order)) {
            return $result->id_order;
        } else {
            return 0;
        }
    }

    ////////////////////// PS ORDERS ///////////////////////

    /*
    * Devuelve Order
    */
    public function getOrder($idOrder)
    {
        $this->wpdb->query('SET SQL_BIG_SELECTS = 1');

        // Verificar si las nuevas tablas de WooCommerce existen
        $table_exists = $this->wpdb->get_var("SHOW TABLES LIKE '{$this->prefix}wc_orders'");

        if ($table_exists) {
            // Verificar si el pedido existe en las nuevas tablas
            $sql_new = "SELECT O.ID as id_order, O.date_created_gmt as date_order
                        FROM {$this->prefix}wc_orders O
                        WHERE O.ID = '$idOrder'
                        LIMIT 1";

            $order = $this->wpdb->get_row($sql_new);

            // Si encontramos el pedido, lo retornamos
            if ($order) {
                return $order;
            }
        }

        // Si no existen las nuevas tablas o no hay datos para ese pedido, usar las tablas anteriores de WordPress
        $sql_old = "SELECT O.ID as id_order, O.post_date_gmt as date_order
                    FROM {$this->prefix}posts O 
                    WHERE O.post_type IN ('shop_order', 'shop_order_placehold') 
                    AND O.ID = '$idOrder'
                    GROUP BY O.ID 
                    LIMIT 1";

        return $this->wpdb->get_row($sql_old);
    }



    /*
    * Devuelve orders que no estén en revi_orders
    */
    public function getOrders()
    {
        $this->wpdb->query('SET SQL_BIG_SELECTS = 1');

        // Verificar si las nuevas tablas de WooCommerce existen
        $table_exists = $this->wpdb->get_var("SHOW TABLES LIKE '{$this->prefix}wc_orders'");

        if ($table_exists) {
            // Usar las nuevas tablas de WooCommerce
            $sql_new = "SELECT O.ID as id_order, O.date_created_gmt as date_order
                        FROM {$this->prefix}wc_orders O
                        WHERE O.date_created_gmt > NOW() - INTERVAL 400 DAY 
                        AND O.ID NOT IN (SELECT RO.id_order FROM revi_orders RO)
                        ORDER BY O.date_created_gmt DESC
                        LIMIT 100";

            $orders = $this->wpdb->get_results($sql_new);

            // Si encontramos pedidos en las nuevas tablas, los retornamos
            if ($orders) {
                return $orders;
            }
        }

        // Si no existen las nuevas tablas o no hay datos en ellas, usar las tablas anteriores de WordPress
        $sql_old = "SELECT O.ID as id_order, O.post_date_gmt as date_order
                    FROM {$this->prefix}posts O 
                    WHERE O.post_date_gmt > NOW() - INTERVAL 400 DAY 
                    AND O.ID NOT IN (SELECT RO.id_order FROM revi_orders RO)
                    AND O.post_type IN ('shop_order', 'shop_order_placehold') 
                    GROUP BY O.ID 
                    ORDER BY O.post_date_gmt DESC
                    LIMIT 100";

        return $this->wpdb->get_results($sql_old);
    }


    /*
    * Devuelve orders que están en revi_orders y se han actualizado
    */
    public function getOrdersUpdated()
    {
        $this->wpdb->query('SET SQL_BIG_SELECTS = 1');

        // Verificar si las nuevas tablas de WooCommerce existen
        $table_exists = $this->wpdb->get_var("SHOW TABLES LIKE '{$this->prefix}wc_orders'");

        if ($table_exists) {
            // Verificar si hay datos en las nuevas tablas
            $orders_exist = $this->wpdb->get_var("SELECT COUNT(*) FROM {$this->prefix}wc_orders");

            if ($orders_exist > 0) {
                // Usar las nuevas tablas de WooCommerce
                $sql = "SELECT O.ID as id_order
                    FROM {$this->prefix}wc_orders O
                    LEFT JOIN revi_orders RO ON RO.id_order = O.ID
                    WHERE (RO.date_sent < O.date_updated_gmt)
                    ORDER BY O.date_updated_gmt DESC
                    LIMIT 50";

                $results = $this->wpdb->get_results($sql);

                if ($results) {
                    return $results;
                }
            }
        }

        // Si no hay registros en las nuevas tablas, usar las tablas anteriores de WordPress
        $sql_old = "SELECT O.ID as id_order
                FROM {$this->prefix}posts O
                LEFT JOIN revi_orders RO ON RO.id_order = O.ID
                WHERE (RO.date_sent < O.post_modified_gmt)
                AND O.post_type IN ('shop_order', 'shop_order_placehold') 
                ORDER BY O.post_modified_gmt DESC
                LIMIT 50";

        return $this->wpdb->get_results($sql_old);
    }


    /*
    * Devuelve Orders con un estado concreto que no se hayan enviado ya
    */
    public function getOrdersByStatus($status)
    {
        // Permitir consultas grandes
        $this->wpdb->query('SET SQL_BIG_SELECTS = 1');

        // Obtener el estado seleccionado de la configuración
        $selected_status = get_option('REVI_ORDER_STATUSES');

        // Si el estado es '2', buscar 'wc-completed' o el valor predeterminado
        if ($status == '2') {
            $selected_status = get_option('REVI_ORDER_STATUSES');
            if (empty($selected_status)) {
                $selected_status = ['wc-completed'];
            }
        } else if ($status == '0') {
            // Si el estado es '0', asignar 'wc-cancelled'
            $selected_status = ['wc-cancelled'];
        }

        // Verificar si las nuevas tablas de WooCommerce existen
        $table_exists = $this->wpdb->get_var("SHOW TABLES LIKE '{$this->prefix}wc_orders'");

        if ($table_exists) {
            // Verificar si hay registros en las nuevas tablas
            $orders_exist = $this->wpdb->get_var("SELECT COUNT(*) FROM {$this->prefix}wc_orders");

            if ($orders_exist > 0) {
                // Usar las nuevas tablas de WooCommerce
                $sql = "SELECT O.ID as id_order, O.date_updated_gmt as date_status_upd
                FROM {$this->prefix}wc_orders O
                WHERE O.ID NOT IN (SELECT RO.id_order FROM revi_orders RO WHERE RO.status = '" . esc_sql($status) . "')
                AND O.ID IN (SELECT RO.id_order FROM revi_orders RO)
                AND O.status IN ('" . implode("','", array_map('esc_sql', $selected_status)) . "')
                ORDER BY O.date_updated_gmt DESC
                LIMIT 200";

                $results = $this->wpdb->get_results($sql);

                if ($results) {
                    return $results;
                }
            }
        }

        // Si no hay registros en las nuevas tablas, usar las tablas anteriores de WordPress
        $sql_old = "SELECT O.ID as id_order, O.post_modified_gmt as date_status_upd
        FROM {$this->prefix}posts O
        WHERE O.ID NOT IN (SELECT RO.id_order FROM revi_orders RO WHERE RO.status = '" . esc_sql($status) . "')
        AND O.ID IN (SELECT RO.id_order FROM revi_orders RO)
        AND O.post_type IN ('shop_order', 'shop_order_placehold')
        AND O.post_status IN ('" . implode("','", array_map('esc_sql', $selected_status)) . "')
        GROUP BY O.ID
        ORDER BY O.post_modified_gmt DESC
        LIMIT 200";

        return $this->wpdb->get_results($sql_old);
    }


    ///////////////////////////// ORDER PRODUCTS ////////////////////

    public function getOrderProducts($idOrder)
    {
        $wc_order = wc_get_order($idOrder);

        $products_data = array();
        if (empty($wc_order)) {
            return [];
        }

        foreach ($wc_order->get_items() as $item_id => $item) {

            if (empty($item)) {
                continue;
            }

            $product = $item->get_product();
            if (empty($product)) {
                continue;
            }

            $product_price = (float)$product->get_price() + (float)$item->get_total_tax();

            $order_product = [
                'quantity' => $item->get_quantity(),
                'price_unit' => $product_price,
                'taxes' => $item->get_total_tax(),
                'total_price' => $product_price * $item->get_quantity(),
            ];

            $reviProductsModel = new reviProductsModel();
            $order_product['id_external_product'] = $reviProductsModel->get_id_main_product($item->get_product_id());

            $order_product['vat'] = 0;
            if ($item->get_total_tax() > 0) {
                if (!empty($product->get_price())) {
                    $order_product['vat'] = round((($order_product['total_price'] / $product->get_price()) - 1) * 100, 2);
                }
            }
            if (is_infinite($order_product['vat'])) {
                unset($order_product['vat']);
            }

            // Obtener la versión de WooCommerce
            $wc_version = defined('WC_VERSION') && WC_VERSION ? WC_VERSION : null;

            // Only for product variation
            if ($product->is_type('variation')) {
                // Comprobar si la versión de WooCommerce es menor a 3.0
                if (version_compare($wc_version, '3.0', '<')) {
                    // Usar get_variation_id para versiones anteriores
                    $order_product['id_external_product_combination'] = $product->get_variation_id();
                } else {
                    // Usar get_id para versiones 3.0 y superiores
                    $order_product['id_external_product_combination'] = $product->get_id();
                }
            }

            $products_data[] = $order_product;
        }

        return $products_data;
    }
}
