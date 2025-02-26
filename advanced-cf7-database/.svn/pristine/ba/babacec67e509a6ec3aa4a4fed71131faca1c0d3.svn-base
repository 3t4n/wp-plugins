<?php

class advanced_cf7_main_pages extends Advanced_cf7_database{
	
	public function __construct(){
		parent::__construct();
		$this->add_advanced_cf7_main_page();
		$this->add_plugin_extensions_page();
		//$this->create_plugin_options_page();
	}
	
	public function add_advanced_cf7_main_page(){
		$page_title = 'Contact Forms';
		$menu_title = 'Contact Forms';
		$capability = 'manage_options';
		$slug = self::$plugin_slug;
		$callback = array($this, 'advanced_cf7_listing_page');
		$icon = 'dashicons-book-alt';
		$position = 100;
		add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	}
	
	/*------ Options Page For Plugin Frontend ------*/
	public function advanced_cf7_listing_page(){
		
		$fid  = empty($_GET['fid']) ? 0 : (int) $_GET['fid'];
        $ufid = empty($_GET['ufid']) ? 0 : (int) $_GET['ufid'];
		
		
		
		if ( !empty($fid) && empty($_GET['ufid']) ) {

            new advanced_cf7_subpage();
            return;
        }
		
		if( !empty($ufid) && !empty($fid) ){

            new contact_form_details();
            return;
        }
		
		$ListTable = new ACFDB7_List_Table();
        $ListTable->prepare_items();
        ?>
            <div class="wrap">
                <div id="icon-users" class="icon32"></div>
                <h2>Contact Forms List</h2>
                <?php $ListTable->display(); ?>
            </div>
        <?php
	}
	
	/*------ Create Options Page Plugin --------*/
	public function create_plugin_options_page(){
		$parent_slug = self::$plugin_slug;
		$page_title = 'Contact Forms Options';
		$menu_title = 'Contact Forms Options';
		$capability = 'manage_options';
		$menu_slug = 'acf7_options_page';
		$callback = array($this,'advanced_cf7_optons_page');
		add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $callback);
	}
	
	/*--- Options Page Frontend ----*/
	public function advanced_cf7_optons_page(){
		echo '<h2>Advanced CF7 Database Options</h2>';
		echo '<form method="post" action="options.php">';
		do_settings_sections( 'pngats-acf7-options-page' );
		settings_fields( 'pngats-acf7-settings' );
		submit_button();
		echo '</form>';
	}
	
	/*------ Extensions Page -------*/
	public function add_plugin_extensions_page(){
		$parent_slug = self::$plugin_slug;
		$page_title = 'Premium';
		$menu_title = 'Premium';
		$capability = 'manage_options';
		$menu_slug = 'acf7_extensions';
		$callback = array($this, 'advanced_cf7_extensions_page');
		add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $callback);
	}
	
	public function advanced_cf7_extensions_page(){ ?>
		<div class="welcome-panel">
			<h2>Premium Advanced Contact Form 7 Database</h2>
			<p><b>Upgrade this plugin with new features offered by our premium version:</b></p>
				<ol>
					<li>All Free Version Features Included</li>
					<li><b>Custom Fields</b></li>
					<li>Add unlimited custom fields to your submission</li>
					<li>Edit each custom field from submission edit page.</li>
					<li><b>Pie Chart Reports</b> for Custom Fields</li>
					<li><b>Chart Lines</b> With Submissions by months</li>
					<li>Export Charts as jpg/png or print</li>
					<li>Export Custom Fields as Excel,PDF or CSV.</li>
				</ol>
			<p><a href="http://penguin-arts.com/product/premium-advanced-contact-form-7-database/" target="_blank" class="button button-primary">Get this plugin</a></p>
		</div>
	<?php }
}

// WP_List_Table is not loaded automatically so we need to load it in our application
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
/**
 * Create a new table class that will extend the WP_List_Table
 */
class ACFDB7_List_Table extends WP_List_Table
{

    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */
    public function prepare_items(){

        global $wpdb;
        $cfdb        = apply_filters( 'cfdb7_database', $wpdb );
        $table_name  = $cfdb->prefix.'advanced_cf7_data';
        $columns     = $this->get_columns();
        $hidden      = $this->get_hidden_columns();
        $data        = $this->table_data();
        $perPage     = 10;
        $currentPage = $this->get_pagenum();
        $count_forms = wp_count_posts('wpcf7_contact_form');
         if(empty((array) $count_forms)){
            $totalItems  = 0;
        }else{
            $totalItems  = $count_forms->publish;
        }


        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );

        $this->_column_headers = array($columns, $hidden );
        $this->items = $data;
    }
    /**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Array
     */
    public function get_columns(){
        $columns = array(
            'name' => 'Name',
            'count'=> 'Count'
        );
        return $columns;
    }
    /**
     * Define which columns are hidden
     *
     * @return Array
     */
    public function get_hidden_columns(){
        return array();
    }

    /**
     * Get the table data
     *
     * @return Array
     */
    private function table_data(){
        global $wpdb;

        $cfdb         = apply_filters( 'cfdb7_database', $wpdb );
        $data         = array();
        $table_name   = $cfdb->prefix.'advanced_cf7_data';
        $page         = $this->get_pagenum();
        $page         = $page - 1;
        $start        = $page * 10;

        $args = array(
            'post_type'=> 'wpcf7_contact_form',
            'order'    => 'ASC',
            'posts_per_page' => 10,
            'offset' => $start
        );

        $the_query = new WP_Query( $args );

        while ( $the_query->have_posts() ) : $the_query->the_post();
            $form_post_id = get_the_id();
            $totalItems   = $cfdb->get_var("SELECT COUNT(*) FROM $table_name WHERE form_post_id = $form_post_id");
            $title = get_the_title();
            $link  = "<a class='row-title' href=admin.php?page=advanced-cf7-listing&fid=$form_post_id>%s</a>";
            $data_value['name']  = sprintf( $link, $title );
            $data_value['count'] = sprintf( $link, $totalItems );
            $data[] = $data_value;
        endwhile;

        return $data;
    }
    /**
     * Define what data to show on each column of the table
     *
     * @param  Array $item        Data
     * @param  String $column_name - Current column name
     *
     * @return Mixed
     */
    public function column_default( $item, $column_name ){
        return $item[ $column_name ];
    }

}