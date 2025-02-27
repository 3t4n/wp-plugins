<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists('News24_Cloud_Library')) {

	class News24_Cloud_Library {

		private static $_instance = null;
		static $plugin_data = null;
		static public function init() {

			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
				self::$_instance->include_files();
			}
			return self::$_instance;
		} 

		private function __construct() {

			self::$plugin_data = array(
			 'root_file' =>  __FILE__,
			 'pro-link' => 'https://webangon.com/news-element/',
			 'remote_site' => 'https://webangon.com/plugins/news-element/',
			 //'remote_site' => 'http://magazine.test/main/',/*Must end with / */
			 'rest_call' => 'news24_widgets', 
			 'import_data' => 'news24_import'
			);

			add_action( 'elementor/editor/before_enqueue_scripts', array($this,'editor_script'));
			add_action( 'wp_ajax_news24_process_lib_data', array($this,'ajax_data'));
			add_action( 'wp_ajax_news24_reload_template', array($this,'reload_library'));

		}

		public function __clone() {

			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'news-element' ), '1.0.0' );
		}

		public function __wakeup() {

			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'news-element' ), '1.0.0' );
		}

		public function include_files(){

			require __DIR__ . '/inc/import.php';
			require __DIR__ . '/inc/activation.php';
		}

		public function count_elements( $option ){
            $data = get_option('news24lib');
            return is_array( $data[$option] ) ? count( $data[$option] ) : "0";
        }

		public function editor_script(){

			wp_enqueue_script( 'news24-library',  plugins_url( '/assets/js/elementor-manage-library.js', __FILE__), ['jquery'], '', true); 
			wp_localize_script( 'news24-library', 'news24_library',
			array( 
				'imgpath' => NEWS_ELM_URL,  
				'elements' => $this->count_elements('widget'),
				'slider' => $this->count_elements('slider'),
				'header_footer' => $this->count_elements('header_footer'),
				'hero' => $this->count_elements('hero'),
				'theme_builder' => $this->count_elements('theme_builder'),
				'extra' => $this->count_elements('extra'),
			)
		);			
			wp_enqueue_script( 'masonry');
			wp_enqueue_style( 'news24_lib',  plugins_url( '/assets/css/style.css', __FILE__ ) );
		}

		function reload_library(){

			News24_Activation::init();
		}

		function choose_option_table($table_name){
			
			if ($table_name == 'widget'){
				$out = 'widget';
			} elseif ($table_name == 'slider'){
				$out = 'slider';
			} elseif ($table_name == 'header-footer') {
				$out = 'header_footer';
			} elseif ($table_name == 'hero') {
				$out = 'hero';
			} elseif ($table_name == 'theme-builder'){
				$out = 'theme_builder';
			} else {
				$out = 'extra';
			}
			return $out;  
		}

		function ajax_data(){

			$option_type = $this->choose_option_table($_POST['data']['type']);
			$nav = '';
			$data = get_option('news24lib');
			$products = $data[$option_type];
			if ( is_array($products) ){

				// foreach ($products as $item){
				// 	$uniq[] = $item['cat_name'];
				// }
				// foreach (array_unique($uniq) as $a ) {
				// 	$nav.= '<a data-cat="'.$a.'" href="#">'.$a.'</a>';
				// }
				$category = esc_attr($_POST['data']['category']);
				$page_number = esc_attr($_POST['data']['page']);
				$search = esc_attr($_POST['data']['search']);
				$limit = 30;
				$offset = 0;

				$current_page = 1;
				if(isset($page_number)) {
					$current_page = (int)$page_number;
					$offset = ($current_page * $limit) - $limit;
				}
				$search_filter = strtolower($search);
				//$paged = $total_products > count($paged_products) ? true : false;
				
				if(!empty($search_filter)) {
					$filtered_products = array();
					foreach($products as $product) {
						if( !empty($search_filter) ) {
							if( preg_match("/{$search_filter}/", strtolower($product['name']))  ) {
								$filtered_products[] = $product;
							}
				
						}					
					}
					
					$products = $filtered_products;
				}

				$paged_products = array_slice($products, $offset, $limit);
				$total_products = count($products);
				$total_pages = is_float($total_products/$limit) ? intval($total_products/$limit)+1 : $total_products/$limit;

				//echo '<div class="filter-wrap"><a data-cat="" href="#">All</a>'.$nav.'</div>';
				echo '<div class="item-inner">';
				echo '<div class="item-wrap">';
				if (count($paged_products)) {
					foreach ($paged_products as $product) {
						$pro = $product['pro']? '<span class="pro">pro</span>' : '';
						if( $product['pro'] && !class_exists('News_Element_Pro') ){

							$btn = '<a target="_blank" href="'.self::$plugin_data['pro-link'].'" class="buy-tmpl"><i class="eicon-external-link-square"></i> Buy pro</a>';
						} else{
							$btn = '<a href="#" data-id="'.$product['id'].'" class="insert-tmpl"><i class="eicon-file-download"></i> Insert</a>';
						}
						?>
					<div class="item">
						<div class="product">
							<div data-thumb='<?php echo $product['thumb'];?>' data-preview='<?php echo $product['preview']; ?>' class='lib-img-wrap'>
								<?php echo $pro;?>
								<img src="<?php echo $product['thumb'];?>">
								<i class="eicon-zoom-in-bold"></i>
							</div>
							<div class='lib-footer'>
									<p class="lib-name"><?php echo $product['name']; ?></p>
								<?php echo $btn;?>
							</div>

						</div>
					</div>

					<?php }
					if ($total_pages > 1){
						echo '</div><div class="pagination-wrap"><ul>';
							for($page_number = 1; $page_number <= $total_pages; $page_number ++) { ?>
									<li class="page-item <?php echo $_POST['data']['page'] == $page_number ? 'active' : ''; ?>"><a class="page-link" href="#" data-page-number="<?php echo $page_number; ?>"><?php echo $page_number; ?></a></li>

							<?php }
						echo '</ul></div></div>';
					}
				} else {
					echo '<h3 class="no-found">No template found</h3>';
				}
				die();
			}
		}

	}

News24_Cloud_Library::init();

}