<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class revi_orders
{
    var $REVI_API_URL;
    var $prefix;
    var $wpdb;
    var $reviGeneralModel;
    var $reviOrdersModel;
    var $language_plugin;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->prefix = $wpdb->prefix;
        $this->REVI_API_URL = REVI_API_URL;
        $this->reviGeneralModel = new reviGeneralModel();
        $this->reviOrdersModel = new reviOrdersModel();

        $this->language_plugin = '';
        if (function_exists('icl_object_id')) {
            $this->language_plugin = 'wpml';
        }
        if (function_exists('pll_count_posts')) {
            $this->language_plugin = 'polylang';
        }

        if (isset($_REQUEST['reset_data']) && $_REQUEST['reset_data'] == 1) {
            $this->resetDataOrders();
        }

        $sync_result =  '';
        $sync_result .= $this->sendAllOrders();
        $sync_result .= $this->sendOrdersUpdated();
        $sync_result .= $this->sendAllOrdersStatus(2); //Orders Status Valid
        $sync_result .= $this->sendAllOrdersStatus(0); //orders Status Canceled

        echo esc_html($sync_result);
    }

    private function sendAllOrders()
    {
        $orders = $this->reviOrdersModel->getOrders();

        if (empty($orders)) {
            return 'No orders in AllOrders<br>';
        }

        $orders_data = [];
        $i = 0;
        foreach ($orders as $order) {

            $parsedOrder = $this->parseOrderData($order);

            if (empty($parsedOrder)) {
                continue;
            }

            $orders_data[$i] = $parsedOrder;

            $this->sendOrderProducts($order->id_order);

            // De momento no lo enviamos
            // $wc_order = wc_get_order($order->id_order);
            // $orders_data[$i]['total_products'] = array_reduce($wc_order->get_items(), function ($carry, $item) {
            //     return $carry + $item->get_quantity();
            // }, 0);

            $i++;
        }

        if (empty($orders_data)) {
            return 'No Parsed orders to sync<br>';
        }

        $result = $this->reviGeneralModel->reviCURL($this->REVI_API_URL . 'orders', "POST", [
            'orders' => json_encode($orders_data)
        ], true);

        if (isset($result) && $result->success) {
            foreach ($orders_data as $order_data) {
                $this->reviOrdersModel->addReviOrder($order_data['id_external_order'], '1');
            }

            return "$i  orders sync succesfully<br>";
        }

        return "Sync All orders Failed |  $i  orders not sync<br>";
    }

    private function parseOrderData($order)
    {
        $wc_order = wc_get_order($order->id_order);
        if (empty($wc_order)) {
            return [];
        }

        // Check if the order is a refund object
        if ($wc_order instanceof WC_Order_Refund) {
            return []; // Skip the refund object
        }

        $email = $wc_order->get_billing_email();
        if (empty($email)) {
            return [];
        }

        $orders_data = [
            'status' => 1,
            'id_external_order' => $order->id_order,
            'customer_firstname' => $wc_order->get_billing_first_name(),
            'customer_lastname' => $wc_order->get_billing_last_name(),
            'email' => $email,
            'currency' => $wc_order->get_currency(),
            'shipping_cost' => $wc_order->get_shipping_total(),
            'total_discount' => $wc_order->get_discount_total(),
            'date_order' => $wc_order->get_date_created()->date('Y-m-d H:i:s'),
        ];

        $iso_country = $wc_order->get_shipping_country();
        if (!empty($iso_country)) {
            $orders_data['iso_country'] = $iso_country;
        }

        $lang = get_post_meta($order->id_order, 'wpml_language', true);

        if (!empty($lang) && strlen($lang) >= 2) {
            $lang = substr($lang, 0, 2);
        } else if (!empty($iso_country) && strlen($iso_country) >= 2) {
            $lang = substr($iso_country, 0, 2);
        } else {
            $lang = get_option('REVI_SELECTED_LANGUAGE');
        }
        $orders_data['iso_code'] = $lang;


        $total_paid = $wc_order->get_total();
        $total_tax = $wc_order->get_total_tax();
        $total_price_without_taxes = $total_paid - $total_tax;

        $orders_data['total_paid'] = $total_paid;
        $orders_data['taxes'] = $total_tax;

        if ($total_tax && $total_price_without_taxes) { //para que no sea dividido por infinito
            $orders_data['vat'] = round((($total_paid / $total_price_without_taxes) - 1) * 100, 0);
        } else {
            $orders_data['vat'] = 0;
        }
        if (is_infinite($orders_data['vat'])) {
            unset($orders_data['vat']);
        }

        return $orders_data;
    }

    private function sendOrderProducts($idOrder)
    {
        $orders_products = $this->reviOrdersModel->getOrderProducts($idOrder);

        if (empty($orders_products)) {
            return [];
        }

        return $this->reviGeneralModel->reviCURL($this->REVI_API_URL . 'orderProducts', "POST", [
            'id_external_order' => $idOrder,
            'order_products' => json_encode($orders_products),
            'delete_products' => true,
        ]);
    }

    private function sendOrdersUpdated()
    {
        $orders_updated = $this->reviOrdersModel->getOrdersUpdated();

        if (empty($orders_updated)) {
            return 'No orders updated <br>';
        }

        $i_succes = 0;
        $i_failed = 0;
        foreach ($orders_updated as $order) {
            $result = $this->sendOrderProducts($order->id_order);

            if (isset($result) && $result->success) {
                $this->reviOrdersModel->updateReviOrders($order->id_order, '1', date("Y-m-d H:i:s"));
                $i_succes++;
            } else {
                $i_failed++;
            }
        }

        return 'Sync orders updated | ' . $i_succes . ' orders sync succesfully | ' . $i_failed . ' orders not sync<br>';
    }

    private function sendAllOrdersStatus($status)
    {
        $orders = $this->reviOrdersModel->getOrdersByStatus($status);

        if (empty($orders)) {
            return 'No orders with STATUS = ' . $status . '<br>';
        }

        $orders_data = array();
        $i = 0;
        foreach ($orders as $order) {
            $orders_data[$i]['id_external_order'] = $order->id_order;
            $orders_data[$i]['status'] = $status;
            $orders_data[$i]['date_status_upd'] = $order->date_status_upd;

            $i++;
        }

        $result = $this->reviGeneralModel->reviCURL($this->REVI_API_URL . 'ordersStatus', "POST", [
            'orders' => json_encode($orders_data),
        ], true);

        if (isset($result) && $result->success) {
            foreach ($orders as $order) {
                $this->reviOrdersModel->updateReviOrders($order->id_order, $status);
            }
            return count($orders) . ' orders status(' . $status . ') sync succesfully<br>';
        }

        return 'Sync Failed Status ' . $status . ' | ' . count($orders) . ' orders status(' . $status . ') not sync<br>';
    }

    private function resetDataOrders()
    {
        global $wpdb;

        // Nombre completo de la tabla
        $table_name = 'revi_orders';

        // Verificar si la tabla existe antes de realizar la operación
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table_name))) {
            // Eliminar todos los datos de la tabla de forma eficiente
            $wpdb->query("TRUNCATE TABLE {$table_name}"); // Más eficiente que DELETE
            echo '<br>' . esc_html__('Orders Revi Data Tables Deleted', 'revi-io-customer-and-product-reviews') . '<br>';
        } else {
            echo '<br>' . esc_html__('The table revi_orders does not exist.', 'revi-io-customer-and-product-reviews') . '<br>';
        }
    }
}
