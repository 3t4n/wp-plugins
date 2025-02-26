<?php
if(!class_exists('WP_List_Table')){
    require_once( ABSPATH.'wp-admin/includes/class-wp-list-table.php' );
}

class ZCForm_Admin_List_Table extends WP_List_Table{

    function __construct(){
        global $status, $page;
        parent::__construct([
            'singular' => __('forms', 'contact-form-z'),
            'plural' => __('forms', 'contact-form-z'),
            'ajax' => false
        ]);
    }

    function no_items(){
        esc_attr_e('No form created.', 'contact-form-z');
    }

    function column_default($item, $column_name){
        switch($column_name){
            case 'title':
            case 'user_login':
                return $item[$column_name];
            case 'add_date':
                return mysql2date(ZCFORM_DATE_FORMAT.' '.ZCFORM_TIME_FORMAT, $item[$column_name]);
            case 'shortcode':
                $list = explode('|', $item[$column_name]);
                return "<span class='zcf_shortcode'>[".ZCFORM_PLUGIN_NAME_ABBR." id={$list[0]}]</span>";
            default:
                return '';
        }
    }

    function get_sortable_columns(){
        $sortable_columns = [
            'title' => ['title', false],
            'user_login' => ['user_login', false],
            'add_date' => ['add_date', false]
        ];
        return $sortable_columns;
    }

    function get_columns(){
        $columns = [
            'cb' => '<input type="checkbox" />',
            'title' => esc_html__('Name', 'contact-form-z'),
            'shortcode' => esc_html__('Shortcode', 'contact-form-z'),
            'user_login' => esc_html__('Author', 'contact-form-z'),
            'add_date' => esc_html__('Created', 'contact-form-z')
        ];
        return $columns;
    }

    function usort_reorder($a, $b){
        $orderby = (!empty($_GET['orderby']) ) ? sanitize_key($_GET['orderby']) : 'title';
        $order = (!empty($_GET['order']) ) ? sanitize_key($_GET['order']) : 'asc';
        $result = strcmp($a[$orderby], $b[$orderby]);
        return ( $order === 'asc' ) ? $result : -$result;
    }

    function column_title($item){
        $actions = [
            'edit' => sprintf('<a href="?page=%s&form_id=%d">'.(esc_html__('Edit', 'contact-form-z')).'</a>', 'zcf-edit-form', $item['id']),
            'entries' => sprintf('<a href="?page=%s&form_id=%d&start=%s&end=%s">'.(esc_html__('Entries', 'contact-form-z')).'</a>', 'zcf-report-form', $item['id'], date('Y-m-01 00:00'), date('Y-m-d 23:59')),
            'copy' => sprintf('<a class="zcf_copy_form" data-value="%d">'.(esc_html__('Duplicate', 'contact-form-z')).'</a>', $item['id']),
            'delete' => sprintf('<a class="zcf_delete_form" data-value="%d">'.(esc_html__('Delete', 'contact-form-z')).'</a>', $item['id'])
        ];
        return sprintf('%1$s %2$s', sprintf('<b><a href="?page=%s&form_id=%d">'.($item['title']).'</a></b>', 'zcf-edit-form', $item['id']), $this->row_actions($actions));
    }

    function get_bulk_actions(){
        $actions = [
            'none' => [
                'name' => __('Bulk Actions'),
                ],
            'delete_form' => [
                'name' => esc_html__('Delete', 'contact-form-z'),
                ]
        ];
        return $actions;
    }

    function bulk_actions($which = ''){
        ?>
        <select class="zcf_bulk_action">

            <?php foreach($this->get_bulk_actions() as $name => $v):?>
                <option value="<?=$name;?>"><?=$v['name'];?></option>
            <?php endforeach;?>

        </select>
        <input type="button" class="button button-default zcf_bulk_action_button" value="<?=__('Apply');?>">
        <?php
    }

    function column_cb($item){
        return sprintf(
            '<label class="zcf_label" style="margin: 0px 8px;">
                    <input type="checkbox" class="zcf_cb" name="form_id[]" value="%s" />
                    <span class="zcf_check_admin zcf_check_admin_checkbox"></span>
                </label>', $item['id']
        );
    }
    
    function search_box($text, $input_id){
        //parent::search_box($text, $input_id);
    }

    function prepare_items(){
        $columns = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = [$columns, $hidden, $sortable];

        $per_page = 20;
        $current_page = $this->get_pagenum();

        global $wpdb;
        $wpdb->hide_errors();
        $prefix = $wpdb->prefix;

        $this->items = $wpdb->get_results(
            "SELECT fl.id, fl.title, u.user_login, 
                            CASE WHEN flh.add_date IS NULL THEN fl.add_date ELSE flh.add_date END add_date, 
                            fl.title, CONCAT(fl.id,  '|', fl.title) shortcode
                            FROM {$prefix}zcf_form_list fl 
                            LEFT JOIN (
                                SELECT form_list_id, MIN(add_date) add_date
                                    FROM {$prefix}zcf_form_list_history
                                        GROUP BY form_list_id
                            ) flh ON flh.form_list_id=fl.id
                            LEFT JOIN {$prefix}users u ON u.id=fl.add_user;"
            , ARRAY_A
        );

        usort($this->items, [&$this, 'usort_reorder']);

        $total_items = count($this->items);

        $this->items = array_slice($this->items, ( ( $current_page - 1 ) * $per_page), $per_page);

        $this->set_pagination_args([
            'total_items' => $total_items,
            'per_page' => $per_page
        ]);
    }
    
    public function print_column_headers( $with_id = true ) {
		list( $columns, $hidden, $sortable, $primary ) = $this->get_column_info();

		$current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		$current_url = remove_query_arg( 'paged', $current_url );

		if ( isset( $_GET['orderby'] ) ) {
			$current_orderby = $_GET['orderby'];
		} else {
			$current_orderby = '';
		}

		if ( isset( $_GET['order'] ) && 'desc' === $_GET['order'] ) {
			$current_order = 'desc';
		} else {
			$current_order = 'asc';
		}

		if ( ! empty( $columns['cb'] ) ) {
			static $cb_counter = 1;
			$columns['cb'] = '<label class="screen-reader-text" for="cb-select-all-0' . $cb_counter . '">' . __( 'Select All' ) . '</label>'
                                        .'<label class="zcf_label" style="margin: 0px 8px 5px 8px;">'
                                        .'<input id="cb-select-all-0' . $cb_counter . '" type="checkbox" />'
                                        .'<span class="zcf_check_admin zcf_check_admin_checkbox">'
                                        .'</span>'
                                        .'</label>';
			$cb_counter++;
		}

		foreach ( $columns as $column_key => $column_display_name ) {
			$class = array( 'manage-column', "column-$column_key" );

			if ( in_array( $column_key, $hidden ) ) {
				$class[] = 'hidden';
			}

			if ( 'cb' === $column_key )
				$class[] = 'check-column';
			elseif ( in_array( $column_key, array( 'posts', 'comments', 'links' ) ) )
				$class[] = 'num';

			if ( $column_key === $primary ) {
				$class[] = 'column-primary';
			}

			if ( isset( $sortable[$column_key] ) ) {
				list( $orderby, $desc_first ) = $sortable[$column_key];

				if ( $current_orderby === $orderby ) {
					$order = 'asc' === $current_order ? 'desc' : 'asc';
					$class[] = 'sorted';
					$class[] = $current_order;
				} else {
					$order = $desc_first ? 'desc' : 'asc';
					$class[] = 'sortable';
					$class[] = $desc_first ? 'asc' : 'desc';
				}

				$column_display_name = '<a href="' . esc_url( add_query_arg( compact( 'orderby', 'order' ), $current_url ) ) . '"><span>' . $column_display_name . '</span><span class="sorting-indicator"></span></a>';
			}

			$tag = ( 'cb' === $column_key ) ? 'td' : 'th';
			$scope = ( 'th' === $tag ) ? 'scope="col"' : '';
			$id = $with_id ? "id='$column_key'" : '';

			if ( !empty( $class ) )
				$class = "class='" . join( ' ', $class ) . "'";

			echo "<$tag $scope $id $class>$column_display_name</$tag>";
		}
	}

}
