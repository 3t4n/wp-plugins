<?php


namespace SMFWC\Shiperman\Orders_List_Table;

use SMFWC\Shiperman\API\SMFWC_Shiperman_API;

if (!defined('ABSPATH')) exit;

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class SMFWC_Shiperman_Orders_List_Table extends \WP_List_Table
{
    private $total_items;

    public function __construct()
    {
        parent::__construct([
            'singular' => __('Order', 'shiperman-for-woocommerce'),
            'plural'   => __('Orders', 'shiperman-for-woocommerce'),
            'ajax'     => false,
        ]);
    }

    /**
     * Define the columns for the table.
     */
    public function get_columns()
    {
        return [
            'cb'           => '<input type="checkbox" />', // Checkbox column for bulk actions
            'order_number' => __('Order Number', 'shiperman-for-woocommerce'),
            'created'      => __('Created', 'shiperman-for-woocommerce'),
            'status'       => __('Status', 'shiperman-for-woocommerce'),
            'sender'       => __('Sender', 'shiperman-for-woocommerce'),
            'email'        => __('Email', 'shiperman-for-woocommerce'),
            'parcel_inside' => __('Parcel Inside', 'shiperman-for-woocommerce'),
        ];
    }

    /**
     * Define sortable columns.
     */
    protected function get_sortable_columns()
    {
        return [
            'order_number' => ['order_number', true],
            'created'      => ['created', false],
            'status'       => ['status', false],
        ];
    }

    /**
     * Prepare the items for display.
     */
    public function prepare_items()
    {
        $per_page     = 10;
        $current_page = $this->get_pagenum();

        $this->_column_headers = [
            $this->get_columns(),
            [], // hidden columns
            $this->get_sortable_columns(),
            $this->get_primary_column_name(),
        ];

        $this->items = $this->fetch_orders_data($per_page, $current_page);
        $this->total_items  = $this->get_total_items_count();

        //var_dump($this->items);
        $this->set_pagination_args([
            'total_items' => $this->total_items,
            'per_page'    => $per_page,
        ]);
    }

    /**
     * Fetch orders data from Shipperman API.
     */
    private function fetch_orders_data($per_page = 10, $page_number = 1)
    {
        // Create a unique cache key based on page and size parameters
        $cache_key = "smfwc_shipperman_orders_data_{$page_number}_{$per_page}";
        $cache_expiration = HOUR_IN_SECONDS;

        // Check if the orders data is cached
        $cached_data = get_transient($cache_key);
        if ($cached_data !== false) {
            return $cached_data;
        }

        // Prepare the API endpoint with pagination parameters
        $endpoint = "plugin/orders?page={$page_number}&size={$per_page}";

        $shiperman_api = SMFWC_Shiperman_API::get_instance();
        $response = $shiperman_api->make_authenticated_request($endpoint, 'GET');

        // Check if the response is valid and contains order items
        if (!$response || $response['status'] !== 'success' || empty($response['data']['items'])) {
            return [];
        }

        // Format data for display in the table
        $orders_data = array_map(function ($item) {
            return [
                'order_number'  => $item['referenceId'] ?? '',
                'created'       => gmdate('Y-m-d H:i:s', $item['dateCreated'] ?? 0),
                'status'        => $item['status'] ?? '',
                'sender'        => $item['recipient']['name'] ?? '',
                'email'         => $item['recipient']['email'] ?? '',
                'parcel_inside' => implode(', ', array_column($item['items'], 'id') ?? []),
            ];
        }, $response['data']['items']);

        // Cache the orders data for the specific page and size
        set_transient($cache_key, $orders_data, $cache_expiration);

        // Store the total items for pagination
        $this->total_items = $response['data']['total'] ?? count($orders_data);

        return $orders_data;
    }


    /**
     * Get total items count from the API.
     */
    private function get_total_items_count()
    {
        return $this->total_items;
    }

    /**
     * Render the checkbox column.
     */
    public function column_cb($item)
    {
        return sprintf('<input type="checkbox" name="order[]" value="%s" />', $item['order_number']);
    }

    /**
     * Render each column.
     */
    protected function column_default($item, $column_name)
    {

        switch ($column_name) {
            case 'order_number':
                return esc_html($item['order_number']);
            case 'created':
                return esc_html($item['created']);
            case 'status':
                return esc_html((string) $item['status']);  // Convert integer to string
            case 'sender':
                return esc_html($item['sender']);
            case 'email':
                return esc_html($item['email']);
            case 'parcel_inside':
                return esc_html($item['parcel_inside']);
            default:
                return print_r($item, true); // For any unexpected column
        }
    }

    /**
     * Add search functionality.
     */
    public function prepare_search_query($query)
    {
        if (isset($_REQUEST['s'])) {
            $search = sanitize_text_field(wp_unslash($_REQUEST['s']));
            $query['search'] = $search;
        }
        return $query;
    }
}
