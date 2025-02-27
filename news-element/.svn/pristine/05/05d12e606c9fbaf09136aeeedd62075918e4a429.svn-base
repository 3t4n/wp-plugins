<?php

class News_Element_Demo_Sites {

	private $importer_page = 'newselement_demo';

	public function admin_pages() {

		$temp = __('Starter Sites','news-element');
		add_submenu_page(
			'news-element',
			$temp, 
			$temp,
			'manage_options',
			$this->importer_page,
			[ $this, 'ne_display_import_sites' ]
		);
	}

	public function ne_display_import_sites() {

		$data = get_option('news24lib');

		$out = '';
		$page_number = isset($_POST['data']['page']) ? $_POST['data']['page'] : '1' ;
		$limit = 12;
		$offset = 0;
		$current_page = 1;
		if (isset($page_number)) {
			$current_page = (int)$page_number;
			$offset = ($current_page * $limit) - $limit;
		}

		if( !isset($data['sites']) ){
			echo '<div class="no-data">Something went wrong ! Please <a class="reload-lib" href="#">Reload</a> library</div>';
			return;
		}

		$paged_products = array_slice($data['sites'], $offset, $limit);
		$total_products = count($data['sites']);
		$total_pages = is_float($total_products / $limit) ? intval($total_products / $limit) + 1 : $total_products / $limit;

		foreach($paged_products as $demo) { 
			//var_dump($demo); News24_Cloud_Library::$plugin_data["remote_site"]
			$pro = $demo['pro'] ? '<span class="pro">'.__('pro','news-element').'</span>' : '';
			$btn = $demo['pro'] && !class_exists('News_Element_Pro') ? __('Purchase','news-element') : __('Import','news-element');
			$url = $demo['pro'] && !class_exists('News_Element_Pro') ? News24_Cloud_Library::$plugin_data["pro-link"] : '#';

			$out.=' 
				<div class="demo">
				    <div class="inner">
						<img class="xlspinner" src="'.admin_url().'/images/spinner.gif">
						<div class="theme-screenshot">
							<img src="'.$demo['thumb'].'">
							'.$pro.'
						</div>
						<a class="more-details" target="_blank" href="'.$demo['preview'].'">'.__('Preview','news-element').'</a>
						<a target="_blank" data-xml="'.$demo['xml_attachment'].'" data-front="'.$demo['homepage'].'" class="more-details btn-import-xml '.$btn.'" href="'.$url.'">'.$btn.'</a>
						<h3 class="theme-name">'.$demo['name'].'</h3>
					</div>
				</div>
			';
		}

		?>
	    <?php if ( !wp_doing_ajax() ) { echo '<div class="xlimwrap">'; } ?>

			<div class="header">
				<div class="lhead">
					<h2 class="lib-logo"><?php echo __('Sites','news-element').'<span>'.$total_products.'</span>';?></h2>
				</div>
				<div class="centerhead">
				</div>
				<div class="rhead"></div>
			</div>		
			<div class="tp-loader"></div>
	    	<div class="demo-inner">
	    		<?php echo $out;?> 
	    	</div>

			<?php
				if ($total_pages > 1) {
					$ends_count = 2;
					$middle_count = 1;
					$dots = false;
					$cur_page = $page_number;

					echo '<div class="pagination-wrap"><ul>';
					for ($page_number = 1; $page_number <= $total_pages; $page_number++) {
						if ($page_number == $cur_page) {?>
								<li class="page-item active"><a class="page-link" href="#" data-page-number="<?php echo $page_number; ?>"><?php echo $page_number; ?></a></li>
							<?php } else {
							if ($page_number <= $ends_count || ($cur_page && $page_number >= $cur_page - $middle_count && $page_number <= $cur_page + $middle_count) || $page_number > $total_pages - $ends_count) { ?>
									<li class="page-item"><a class="page-link" href="#" data-page-number="<?php echo $page_number; ?>"><?php echo $page_number; ?></a></li>
								<?php $dots = true;
								} elseif ($dots) {
									echo '<li><a>&hellip;</a></li>';
									$dots = false;
								}
						}
					}
					echo '</ul></div>';
				}
			?>

			<?php if ( !wp_doing_ajax() ) { echo '</div>'; } ?>

		<?php
		if ( wp_doing_ajax() ) {
			die();
		}		
	}

	public function admin_scripts() {

		if (isset($_GET['page']) && $_GET['page'] == 'newselement_demo'){

			 $data = array(
			   'ajax_url' => admin_url( 'admin-ajax.php' ),
			   'site_url' => home_url(),
			);
			 wp_enqueue_script('ne_admin_demo', plugin_dir_url( __FILE__ ).'assets/admin.js',array('jquery','masonry'), '', true);
			 wp_enqueue_style('ne_admin_demo', plugin_dir_url( __FILE__ ).'assets/admin.css');
			 wp_localize_script('ne_admin_demo', 'ne_localise', $data );
		 }
	}

	public static function custom_admin_styles(){
		echo '<style>
			@keyframes gradient {
				0% {
					background-position: 0% 50%;
				}
				50% {
					background-position: 100% 50%;
				}
				100% {
					background-position: 0% 50%;
				}
			}
			#adminmenu #toplevel_page_news-element>a{
				background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
				background-size: 400% 400%;
				animation: gradient 15s ease infinite;  
			}
	  	</style>';
	}

	public static function ne_import_data(){

		$remote = News24_Cloud_Library::$plugin_data["remote_site"];
		set_time_limit(0);

		// If the function it's not available, require it.

		if ( ! function_exists( 'download_url' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}

		// Now you can use it!
		$file_url = json_decode(wp_remote_retrieve_body(wp_remote_get($remote . 'wp-json/wp/v2/news24_xml_url/?id=' . $_POST['xml'] )), true);

		$tmp_file = download_url( $file_url );

		// Sets file final destination.
		$filepath = ABSPATH . 'wp-content/data.xml';
		copy( $tmp_file, $filepath );
		@unlink( $tmp_file );

		if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);

		require_once 'vendor/wordpress-importer/wordpress-importer.php';

		$wp_import = new WP_Import();
		$wp_import->fetch_attachments = true;
		ob_start();
		$wp_import->import($filepath);
		ob_end_clean();
		update_option('page_on_front',$_POST['frontpage']);
		update_option('show_on_front','page');

		@unlink( $filepath );
		\Elementor\Plugin::instance()->files_manager->clear_cache();
	
		$created_default_kit = \Elementor\Plugin::$instance->kits_manager->create_default();
		update_option(\Elementor\Core\Kits\Manager::OPTION_ACTIVE, $created_default_kit);

		$var = new \ThePackKitThemeBuilder\Modules\ThemeBuilder\Classes\Conditions_Cache();
		$var->regenerate();
		
		News_Element_Style_Grabber::generate_css();

		die();

	}

	function tmx_delete_upload_folder($path) {

		if(!empty($path) && is_dir($path) ){
			$dir  = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
			$files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
			foreach ($files as $f) {if (is_file($f)) {unlink($f);} else {$empty_dirs[] = $f;} } if (!empty($empty_dirs)) {foreach ($empty_dirs as $eachDir) {rmdir($eachDir);}} rmdir($path);
		}
	}

	public function ne_clean_data(){

		global $wpdb;
		$tables = ['commentmeta','comments','postmeta','posts','termmeta','terms','term_relationships','term_taxonomy'];

		foreach ( $tables as $table ) {
			$table  = $wpdb->prefix . $table;
			$wpdb->query( "TRUNCATE TABLE $table" );
		}

		$upload_dir = wp_upload_dir(date('Y/m'), true);
		$upload_dir['basedir'] = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $upload_dir['basedir']);
		$this->tmx_delete_upload_folder($upload_dir['basedir']);

	}

	public function admin_notice(){
		$screen = get_current_screen();
		if ( $screen->id == 'news-element_page_newselement_demo'){
			echo '
				<div class="notice e-notice e-notice--extended">
					<div class="e-notice__aside">
						<div class="e-notice__icon-wrapper"><i class="dashicons dashicons-warning" aria-hidden="true"></i></div>
					</div>				
					<div class="e-notice__content">
						<h3>'.__('Reset WordPress','news-element').'</h3>
						<p>'.__('For the best outcome, clean WordPress install is required.This will delete posts and clear all media uploads.If you face any issue, contact support and we will solve it.','news-element').'</p>
						<div class="e-notice__actions">
							<a class="e-button e-button--cta clean-db" href="#">'.__('Reset WordPress','news-element').'</a>
							<a class="e-button e-button--cta e-button--outline" target="_blank" href="https://webangon.com/contact/">'.__('Plugin Support','news-element').'</a>
						</div>
					</div>
				</div>			
			';
		}
	}

	public function __construct() {
		add_action( 'admin_menu', [ $this, 'admin_pages' ], 600 );
		add_action( 'admin_print_scripts', array( $this, 'admin_scripts' ), 10 );
		add_action( 'admin_head', array( $this, 'custom_admin_styles' ) );
		add_action( 'wp_ajax_ne_import_data', array( $this, 'ne_import_data' ), 10 );
		add_action( 'wp_ajax_ne_clean_data', array( $this, 'ne_clean_data' ), 10 );
		add_action( 'admin_notices', array( $this, 'admin_notice' ), 99 );
		add_action( 'wp_ajax_ne_display_import_sites', array($this,'ne_display_import_sites')); 

	}
}

new News_Element_Demo_Sites();
