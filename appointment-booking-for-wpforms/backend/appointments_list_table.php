<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class Booknow_Appointments_List_Table extends WP_List_Table{
    const POSTS_PER_PAGE = 10;
    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */
    public function prepare_items()
    {
        $columns = $this->get_columns();
        if( isset($_GET['type-filter']) > 0 ){
            $type = sanitize_text_field( $_GET['type-filter'] );
            $new_arr = array();
            foreach($data as $vl ){
                if($vl["type"] == $type ){
                    $new_arr[] = $vl;
                }
            }
        }
        $currentPage = $this->get_pagenum();
        $data = array();
        $get_posts_obj = $this->get_posts_object();
        if ( $get_posts_obj->have_posts() ) {
            while ( $get_posts_obj->have_posts() ) {
                $get_posts_obj->the_post();
                $data[ get_the_ID() ] = array(
                    'id'     => get_the_ID(),
                    'title'  => get_the_title(),
                );
            }
            wp_reset_postdata();
        }
        $this->set_pagination_args(
            array(
                'total_items' => $get_posts_obj->found_posts,
                'per_page'    => $get_posts_obj->post_count,
                'total_pages' => $get_posts_obj->max_num_pages,
            )
        );
        $this->_column_headers = array($columns);
        $this->items      = $data;
    }
    public function no_items() {
        esc_html_e( 'No Upcoming Appointments.', 'booknow' );
    }
    public function column_title( $item ) {
        $edit_url  = get_edit_post_link( $item['id'] );
        $post_link = get_permalink( $item['id'] );
        $output = '<strong>';
        /* translators: %s: Post Title */
        $output .= '<a class="row-title" href="' . esc_url( $edit_url ) . '" aria-label="' . sprintf( esc_html__( '%s (Edit)', 'booknow' ), $item['title'] ) . '">' . esc_html( $item['title'] ) . '</a>';
        $output .= _post_states( get_post( $item['id'] ), false );
        $output .= '</strong>';
        return $output;
    }
    protected function get_posts_object() {
        $current_date = current_time("Y-m-d");
        $time_format = apply_filters("booknow_time_format","h:i");
        $current_time = current_time($time_format);
        $timestamp = current_time( 'timestamp' );
        $post_args = array(
            'post_type'      => "booknow",
            'posts_per_page' => self::POSTS_PER_PAGE,
            'meta_key' => '_booknow_appointment_date_time',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
            'relation' => 'AND',
                array(
                    "key"=> "_booknow_appointment_status",
                    "value" => array("approved","pending"),
                    "compare"=>'IN'
                ),
                array(
                    "key"=> "_booknow_appointment_date_time",
                    "value" => $timestamp,
                    "compare"=>'>='
                )
              )
        );
        $paged = filter_input( INPUT_GET, 'paged', FILTER_VALIDATE_INT );
        if ( $paged ) {
            $post_args['paged'] = $paged;
        }
        $search = esc_sql( filter_input( INPUT_GET, 's' ) );
        if ( ! empty( $search ) ) {
            $post_args['s'] = $search;
        }
        return new WP_Query( $post_args );
    }
    /**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Array
     */
    public function get_columns()
    {
        $columns = apply_filters("manage_booknow_posts_columns",array());
        unset($columns["date"]);
        return $columns;
    }
    /**
     * Define which columns are hidden
     *
     * @return Array
     */
    public function get_hidden_columns()
    {
        return array();
    }
    public function get_sortable_columns()
    {
        return array();
    }
    public function column_default( $item, $column_name ){
        $columns = apply_filters("manage_booknow_posts_custom_column",$column_name, $item["id"]);
        return $columns;
    }
}