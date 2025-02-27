<?php
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class revi_sync
{
    var $REVI_API_URL;
    public $prefix;
    public $wpdb;
    public $reviGeneralModel;
    public $reviProductsModel;
    public $subscription;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->prefix = $wpdb->prefix;
        $this->REVI_API_URL = REVI_API_URL;
        $this->reviGeneralModel = new reviGeneralModel();
        $this->reviProductsModel = new reviProductsModel();

        revi_verifyTables();
        $this->reviGeneralModel->updateConfiguration();

        $this->subscription = get_option('REVI_SUBSCRIPTION');

        if (isset($_REQUEST['reset_data']) && $_REQUEST['reset_data'] == 1) {
            $this->resetDataAll();
        }

        $sync_result =  '';
        $sync_result .= $this->syncProductRatings();

        // if ($this->subscription >= 2) {
        //     $sync_result .= $this->syncComments();
        // }

        $this->reviGeneralModel->sendModuleVersion();

        echo esc_html($sync_result); // Escapado de la salida
    }

    private function syncProductRatings()
    {
        $response = $this->reviGeneralModel->reviCURL($this->REVI_API_URL . 'productsRatings', 'GET');

        if (!isset($response->products)) {
            return 'No products to SYNC <br>';
        }

        $products = $response->products;

        if (!empty($products)) {
            foreach ($products as $product) {
                $product_array = (array)$product;
                $product_array['date_sent'] = date('Y-m-d H:i:s');
                $product_array['id_product'] = $product_array['id_external_product'];
                unset($product_array['id_external_product']);
                $this->reviProductsModel->addReviProduct($product_array);
            }
        }
        return '- Updating ' . esc_html(count($products)) . ' products.<br>'; // Escapado de la salida
    }

    private function resetDataAll()
    {
        global $wpdb;

        // Tablas que se van a limpiar
        $tables = ['revi_orders',  'revi_products'];

        // Limpiar tablas de forma segura
        foreach ($tables as $table) {
            $table_name = esc_sql($table);

            // Comprobar si la tabla existe antes de intentar eliminar datos
            if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table_name))) {
                $wpdb->query("TRUNCATE TABLE {$table_name}"); // Truncar tabla para eliminar todos los datos
            }
        }

        // Borrar caché relacionada con Revi, si aplica
        wp_cache_delete('revi_sync_data');

        echo "<br>" . esc_html__('All Revi Data Tables Deleted', 'revi-io-customer-and-product-reviews') . "<br>"; // Escapado y traducción
    }
}
