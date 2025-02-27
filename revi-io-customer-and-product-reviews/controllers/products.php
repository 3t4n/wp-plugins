<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class revi_products
{
    var $REVI_API_URL;
    var $prefix;
    var $wpdb;
    var $reviGeneralModel;
    var $reviProductsModel;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->prefix = $wpdb->prefix;
        $this->REVI_API_URL = REVI_API_URL;
        $this->reviGeneralModel = new reviGeneralModel();
        $this->reviProductsModel = new reviProductsModel();

        if (isset($_REQUEST['reset_data']) && $_REQUEST['reset_data'] == 1) {
            $this->resetDataProducts();
        }

        $limit = 20;
        if (isset($_REQUEST['limit']) && !empty($_REQUEST['limit'])) {
            $limit = esc_attr($_REQUEST['limit']);
        }
        $cicles = 50;
        if (isset($_REQUEST['cicles']) && !empty($_REQUEST['cicles'])) {
            $cicles = esc_attr($_REQUEST['cicles']);
        }

        $sync_result = $this->sendAllProducts($limit, $cicles);

        echo esc_html($sync_result); // Escapar salida de sync_result
    }

    private function sendAllProducts($limit, $cicles)
    {
        $num_products_left = $this->reviProductsModel->getNumProductsLeft();
        $this->reviGeneralModel->reviCURL($this->REVI_API_URL . 'productsLeft', "POST", [
            'num_products_left' => $num_products_left
        ], true, true);

        if (!$num_products_left) {
            return esc_html__('No products LEFT to Sync', 'revi-io-customer-and-product-reviews');
        }

        $products = [];
        $count_cicles = 1;
        do {
            $products = $this->reviProductsModel->getProductsToSend();

            if (empty($products)) {
                return 'No products to Sync';
            }

            $result = $this->reviGeneralModel->reviCURL($this->REVI_API_URL . 'products', "POST", [
                'products' => json_encode($products),
            ], true, true);

            if (isset($result) && $result->success) {
                foreach ($products as $product) {

                    $this->reviProductsModel->addReviProduct([
                        "id_product" => $product['id_product_parent'], // Pasamos el id_product_parent que es el del producto que estamos cogiendo de la BD
                    ], date("Y-m-d H:i:s"));
                }

                echo esc_html(count($products)) . ' ' . esc_html__('products sync successfully', 'revi-io-customer-and-product-reviews') . '<br>';
            } else {
                return esc_html__('Error CURL result', 'revi-io-customer-and-product-reviews');
            }

            sleep(rand(0, 1));
            $count_cicles++;
        } while (!empty($products) && $count_cicles <= $cicles);

        $num_products_left = $this->reviProductsModel->getNumProductsLeft();
        $this->reviGeneralModel->reviCURL($this->REVI_API_URL . 'productsLeft', "POST", [
            'num_products_left' => $num_products_left
        ], true, true);
        echo "se han necesitado " . esc_html($count_cicles) . " ciclos con un límite de " . esc_html($limit);
    }

    private function resetDataProducts()
    {
        global $wpdb;

        // Nombre completo de la tabla
        $table_name = 'revi_products';

        // Verificar si la tabla existe antes de realizar la operación
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table_name))) {
            // Eliminar todos los datos de la tabla
            $wpdb->query("TRUNCATE TABLE {$table_name}"); // Más eficiente que DELETE
            echo '<br>' . esc_html__('Product Revi Data Tables Deleted', 'revi-io-customer-and-product-reviews') . '<br>';
        } else {
            echo '<br>' . esc_html__('The table revi_products does not exist.', 'revi-io-customer-and-product-reviews') . '<br>';
        }
    }
}
