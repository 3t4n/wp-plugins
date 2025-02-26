<?php 
/** 
 * Abstract class  has been designed to use common functions.
 * This is file is responsible to add custom logic needed by all templates and classes.  
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   
if ( ! class_exists( 'categoryAccordionPanelLib' ) ) { 
	abstract class categoryAccordionPanelLib extends WP_Widget {
		
	   /**
		* Default values can be stored
		*
		* @access    public
		* @since     1.0
		*
		* @var       array
		*/
		public $_config = array();

		/**
		 * PHP5 constructor method.
		 *
		 * Run the following methods when this class is loaded.
		 * 
		 * @access    public
		 * @since     1.0
		 *
		 * @return    void
		 */ 
		public function __construct() {  
		
			/**
			 * Default values configuration 
			 */
			$this->_config = array(
				'widget_title'=>acp_widget_title,
				'number_of_product_display'=>acp_number_of_product_display,
				'price_text_color'=>acp_price_text_color,
				'title_text_color'=>acp_title_text_color,
				'price_tab_text_color'=>acp_price_tab_text_color,
				'price_tab_background_color'=>acp_price_tab_background_color,
				'header_text_color'=>acp_header_text_color,
				'header_background_color'=>acp_header_background_color,
				'display_title_price_over_image'=>acp_display_title_price_over_image, 
				'hide_widget_title'=>acp_hide_widget_title, 
				'hide_product_title'=>acp_hide_product_title,
				'hide_product_price'=>acp_hide_product_price,
				'template'=>acp_template, 
				'vcode'=>$this->getUCode(), 
				'category_id'=>acp_category,
				'security_key'=>acp_security_key,
				'tp_widget_width'=>acp_widget_width
			); 
			
			/**
			 * Load text domain
			 */
			add_action( 'plugins_loaded', array( $this, 'categoryaccordionpanel_text_domain' ) );
			 
			parent::__construct( 'categoryaccordionpanel', __( 'Accordion Panel for Category and Products', 'categoryaccordionpanel' ) ); 
			
			/**
			 * Widget initialization for accordion panel for category and products
			 */
			add_action( 'widgets_init', array( &$this, 'initCategoryAccordionPanel' ) ); 
			
			/**
			 * Load the CSS/JS scripts
			 */
			add_action( 'init',  array( $this, 'categoryaccordionpanel_scripts' ) );
			
	    	add_action( 'admin_enqueue_scripts', array( $this, 'acp_admin_enqueue' ) ); 
			
		}
		
		/**
		* Register and load JS/CSS for admin widget configuration 
		*
		* @access  private
		* @since   1.0
		*
		* @return  bool|void It returns false if not valid page or display HTML for JS/CSS
		*/  
		public function acp_admin_enqueue() {

			if ( ! $this->validate_page() )
				return FALSE;
			
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'admin-categoryaccordionpanel.css', ACP_MEDIA."css/admin-categoryaccordionpanel.css" );
			wp_enqueue_script( 'admin-categoryaccordionpanel.js', ACP_MEDIA."js/admin-categoryaccordionpanel.js" ); 
			
		}
		
		/**
		* Validate widget or shortcode post type page
		*
		* @access  private
		* @since   1.0
		*
		* @return  bool It returns true if page is post.php or widget otherwise returns false
		*/ 
		private function validate_page() {

			if ( ( isset( $_GET['post_type'] )  && $_GET['post_type'] == 'acp_accordion' ) || strpos($_SERVER["REQUEST_URI"],"widgets.php") > 0  || strpos($_SERVER["REQUEST_URI"],"post.php" ) > 0 || strpos($_SERVER["REQUEST_URI"], "categoryaccordionpanel_settings" ) > 0  )
				return TRUE;
		
		} 	
		
		/**
		 * Load the CSS/JS scripts
		 *
		 * @return  void
		 *
		 * @access  public
		 * @since   1.0
		 */
		function categoryaccordionpanel_scripts() {

			$dependencies = array( 'jquery' );
			 
			/**
			 * Include Accordion Panel for Category and Products JS/CSS 
			 */
			wp_enqueue_style( 'categoryaccordionpanel', ACP_MEDIA."css/categoryaccordionpanel.css" );
			 
			wp_enqueue_script( 'categoryaccordionpanel', ACP_MEDIA."js/categoryaccordionpanel.js", $dependencies  );
			
			/**
			 * Define global javascript variable
			 */
			wp_localize_script( 'categoryaccordionpanel', 'categoryaccordionpanel', array(
				'acp_ajax_url' => admin_url( 'admin-ajax.php' ),
				'acp_security'  =>  wp_create_nonce(acp_security_key),
				'acp_plugin_url' => plugins_url( '/', __FILE__ ),
			));
		}	
		
		/**
		 * Loads the text domain
		 *
		 * @access  private
		 * @since   1.0
		 *
		 * @return  void
		 */
		public function categoryaccordionpanel_text_domain() {

		  /**
		   * Load text domain
		   */
		   load_plugin_textdomain( 'categoryaccordionpanel', false, ACP_Plugin_DIR . '/languages' );
			
		}
		 
		/**
		 * Load and register widget settings
		 *
		 * @access  private
		 * @since   1.0
		 *
		 * @return  void
		 */ 
		public function initCategoryAccordionPanel() { 
			
		  /**
		   * Widget registration
		   */ 
			  register_widget( 'categoryAccordionPanelWidget_Admin' );
			
		}     
		 
		/**
		 * Get product image by given image attachment id
		 *
 		 * @access  public
		 * @since   1.0
		 *
		 * @param   int   $img  Image attachment ID
		 * @return  string  Returns image html from product attachment
		 */
		 public function getProductImage( $img ) {
		 
			$image_link = wp_get_attachment_url( $img ); 
			if( $image_link ) {
				$image_title = esc_attr( get_the_title( $img ) );  
				return wp_get_attachment_image( $img , array(180,180), 0, $attr = array(
									'title'	=> $image_title,
									'alt'	=> $image_title
								) );
			}	 
			else
				return wc_placeholder_img( 'shop_catalog' );
		 }
		 
		/**
		 * Get all the categories
		 *
		 * @access  public
		 * @since   1.0
		 *
		 * @return  object It contains all the categories for shop
		 */
		public function getCategories($category_ids = "") {
		
			global $wpdb;
			
			/**
			 * Fetch all the categories from database
			 */
			$_id_filter = "";
			
			if( trim( $category_ids ) != "" && trim( $category_ids ) != "0" ) {
					$category_ids = explode(",", $category_ids);
					$__ids = "";
					$ol = 0;
					foreach( $category_ids as $__val ) {
						if($ol==0)
							$__ids .= intval($__val);
						else
							$__ids .= ", ".intval($__val);
						
						$ol++;	
					}
					$_id_filter =  " where wtt.term_id in ( ".$__ids." ) " ;
			}
			
			return $wpdb->get_results( "SELECT wtt.term_taxonomy_id as id, wt.name as category FROM `{$wpdb->prefix}terms` as wt INNER JOIN {$wpdb->prefix}term_taxonomy as wtt on wtt.term_id = wt.term_id and wtt.taxonomy = 'product_cat' ".$_id_filter );
		
		}
		 
		/**
		 * Get Unique Block ID
		 *
		 * @access  public
		 * @since   1.0
		 *
		 * @return  string 
		 */
		public function getUCode() { 
			
			return 'uid_'.md5( "TABULARPANE32@#RPSDD@SQSITARAM@A$".time() );
		
		} 
		
		/**
		 * Get Accordion Panel for Category and Products Template
		 *
		 * @access  public
		 * @since   1.0
		 *
		 * @param   string $file Template file name
		 * @return  string Returns template file path
		 */
		public function getCategoryAccordionPanelTemplate( $file ) { 
		
				// Get template file path
				if( locate_template( $file ) != "" ){
					return locate_template( $file );
				}else{
					return plugin_dir_path( dirname( __FILE__ ) ) . 'templates/' . $file ;
				}  
				
	   }
   }
}