<?php

namespace RankologyFno\Services\ListTable;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

use WP_List_Table;

class BrokenLinksTable extends WP_List_Table {

    public function get_columns()
    {
        $columns = array(
                'cb'            => '<input type="checkbox" />',
                'name'          => __('Broken Link', 'wp-rankology'),
                'count'         => __('Count', 'wp-rankology'),
                'status'   => __('Status', 'wp-rankology'),
                'type'        => __('Type', 'wp-rankology'),
                'anchor'        => __('Anchor text', 'wp-rankology'),
                'source'        => __('Source', 'wp-rankology'),
                'post_type'        => __('Post type', 'wp-rankology'),
        );
        return $columns;
    }

    protected function get_table_data() {
        $paged = $this->get_pagenum();
        $perPage = isset($_GET['per_page']) ? (int) $_GET['per_page'] : 20;
        $posts = get_posts([
            'posts_per_page' => $perPage,
            'post_type' => 'rankology_bot',
            'paged' => $paged
        ]);


        return $posts;
    }
    protected function get_sortable_columns()
    {
        $sortable_columns = array(
            'status'  => array('status', false),
        );
        return $sortable_columns;
    }

    public function get_bulk_actions()
    {
        $actions = [
            'delete_all'    => __('Delete', 'wp-rankology'),
        ];

        return $actions;
    }


    public function prepare_items()
    {
        $this->process_bulk_action();
        $total = wp_count_posts('rankology_bot')->publish;
        $perPage = isset($_GET['per_page']) ? (int) $_GET['per_page'] : 1;

        $this->set_pagination_args( array(
            'total_items' => $total,
            'per_page'    => $perPage,
            'total_pages' => 2
        ) );

        $columns = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);

        $this->items = $this->get_table_data();
    }

    public function column_cb($item)
    {
        return sprintf('<input id="cb-select-%s" type="checkbox" name="post[]" value="%s">',$item->ID,$item->ID);
    }

    public function column_name($item)
    {
        $p_id = get_post_meta($item->ID, 'rankology_bot_source_id', true);
        if (!$p_id || !isset($p_id)) {
            return;

        }

        $broken_link_edit = get_edit_post_link($p_id);
        $str = '<a href="' . $broken_link_edit . '">';
        $str .= get_the_title($item->ID);
        $str .= ' - <span class="dashicons dashicons-edit"></span>';
        $str .= '</a>';
        return $str;
    }

    public function extra_tablenav( $which )
    {
        switch ( $which )
        {
            case 'top':


                $status = ['200', '301', '302', '307', '400', '401', '402', '403', '404', '410', '451', '500'];

                echo "<select name='bot-status' id='bot-status' class='postform'>";
                echo "<option value=''>" . __('Show All', 'wp-rankology') . '</option>';
                foreach ($status as $code) {
                    echo '<option value=' . $code, isset($_GET[$code]) == $code ? ' selected="selected"' : '','>' . $code . '</option>';
                }
                echo '</select>';
                break;

        }
    }


    public function column_count($item)
    {
        return get_post_meta($item->ID, 'rankology_bot_count', true);
    }

    public function column_status($item)
    {
        $rankology_bot_status = get_post_meta($item->ID, 'rankology_bot_status', true);
        $str = '';
        switch ($rankology_bot_status) {
            case '500':
                $str = '<span class="rankology_bot_500">' . $rankology_bot_status . '</span>';
                break;

            case '404':
            case '403':
            case '402':
            case '401':
            case '400':
                $str = '<span class="rankology_bot_404">' . $rankology_bot_status . '</span>';
                break;

            case '307':
                $str = '<span class="rankology_bot_307">' . $rankology_bot_status . '</span>';
                break;

            case '302':
                $str = '<span class="rankology_bot_302">' . $rankology_bot_status . '</span>';
                break;

            case '301':
                $str = '<span class="rankology_bot_301">' . $rankology_bot_status . '</span>';
                break;

            case '200':
                $str = '<span class="rankology_bot_200">' . $rankology_bot_status . '</span>';
                break;

            default:
                $str = '<span class="rankology_bot_default">' . esc_html($rankology_bot_status) . '</span>';
                break;
        }

        return $str;
    }

    public function column_type($item){
        return get_post_meta($item->ID, 'rankology_bot_type', true);
    }

    public function column_anchor($item){
        return get_post_meta($item->ID, 'rankology_bot_a_title', true);
    }

    public function column_source($item){
        return '<a href="' . get_post_meta($item->ID, 'rankology_bot_source_url', true) . '">' . get_post_meta($item->ID, 'rankology_bot_source_title', true) . '</a>';
    }

    public function column_post_type($item){
        return get_post_meta($item->ID, 'rankology_bot_cpt', true);
    }

    public function process_bulk_action() {


        if ( isset( $_POST['_wpnonce'] ) && ! empty( $_POST['_wpnonce'] ) ) {
            $nonce  = filter_input( INPUT_POST, '_wpnonce', FILTER_SANITIZE_STRING );
            $action = 'bulk-' . $this->_args['plural'];


            if ( ! wp_verify_nonce( $nonce, $action ) )
                wp_die( 'Nope! Security check failed!' );

        }

        $action = $this->current_action();

        switch ( $action ) {

            case 'delete_all':
                if(!isset($_POST['post'])){
                    return;
                }

                $posts = $_POST['post'];

                foreach ($posts as $post) {
                    wp_delete_post($post, true);
                }
                break;
        }

        return;
    }
}


