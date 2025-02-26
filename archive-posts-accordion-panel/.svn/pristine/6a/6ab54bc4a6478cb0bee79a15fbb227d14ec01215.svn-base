<?php 
/** 
 * Abstract class  has been designed to use common functions.
 * This is file is responsible to add custom logic needed by all templates and classes.  
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly   
if ( ! class_exists( 'archivesPostAccordionLib' ) ) { 
	abstract class archivesPostAccordionLib extends WP_Widget {
		
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
				'widget_title'=>avpt_widget_title,
				'date_format'=>avpt_date_format, 
				'number_of_post_display'=>avpt_number_of_post_display, 
				'title_text_color'=>avpt_title_text_color,
				'panel_text_color'=>avpt_panel_text_color,
				'panel_background_color'=>avpt_panel_background_color,
				'header_text_color'=>avpt_header_text_color,
				'header_background_color'=>avpt_header_background_color,
				'display_title_over_image'=>avpt_display_title_over_image, 
				'hide_widget_title'=>avpt_hide_widget_title,  
				'hide_post_title'=>avpt_hide_post_title, 
				'template'=>avpt_template, 
				'vcode'=>$this->getUCode(), 
				'category_id'=>avpt_category,
				'security_key'=>avpt_security_key,
				'tp_widget_width'=>avpt_widget_width
			); 
			
			/**
			 * Load text domain
			 */
			add_action( 'plugins_loaded', array( $this, 'archivespostaccordion_text_domain' ) );
			
			parent::WP_Widget( false, $name = __( 'Archive Posts Accordion Panel', 'archivespostaccordion' ) ); 	
			
			/**
			 * Widget initialization
			 */
			add_action( 'widgets_init', array( &$this, 'initArchivesPostAccordion' ) ); 
			
			/**
			 * Load the CSS/JS scripts
			 */
			add_action( 'init',  array( $this, 'archivespostaccordion_scripts' ) );
			
			add_action( 'admin_enqueue_scripts', array( $this, 'avpt_admin_enqueue' ) ); 
			
		}
		
			
 	   /**
		* Register and load JS/CSS for admin widget configuration 
		*
		* @access  private
		* @since   1.0
		*
		* @return  bool|void It returns false if not valid page or display HTML for JS/CSS
		*/  
		public function avpt_admin_enqueue() {

			if ( ! $this->validate_page() )
				return FALSE;
			
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'admin-archivespostaccordion.css', AVPT_MEDIA."css/admin-archivespostaccordion.css" );
			wp_enqueue_script( 'admin-archivespostaccordion.js', AVPT_MEDIA."js/admin-archivespostaccordion.js" ); 
			
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

			if ( ( isset( $_GET['post_type'] )  && $_GET['post_type'] == 'avpt_archives' ) || strpos($_SERVER["REQUEST_URI"],"widgets.php") > 0  || strpos($_SERVER["REQUEST_URI"],"post.php" ) > 0 || strpos($_SERVER["REQUEST_URI"], "archivespostaccordion_settings" ) > 0  )
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
		function archivespostaccordion_scripts() {

			$dependencies = array( 'jquery' );
			 
			/**
			 * Include Archive Posts Accordion Panel JS/CSS 
			 */
			wp_enqueue_style( 'archivespostaccordion', AVPT_MEDIA."css/archivespostaccordion.css" );
			 
			wp_enqueue_script( 'archivespostaccordion', AVPT_MEDIA."js/archivespostaccordion.js", $dependencies  );
			
			/**
			 * Define global javascript variable
			 */
			wp_localize_script( 'archivespostaccordion', 'archivespostaccordion', array(
				'avpt_ajax_url' => admin_url( 'admin-ajax.php' ),
				'avpt_security'  =>  wp_create_nonce(avpt_security_key),
				'avpt_plugin_url' => plugins_url( '/', __FILE__ ),
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
		public function archivespostaccordion_text_domain() {

		  /**
		   * Load text domain
		   */
		   load_plugin_textdomain( 'archivespostaccordion', false, AVPT_Plugin_DIR . '/languages' );
			
		}
		 
		/**
		 * Load and register widget settings
		 *
		 * @access  private
		 * @since   1.0
		 *
		 * @return  void
		 */ 
		public function initArchivesPostAccordion() { 
			
		  /**
		   * Widget registration
		   */
		  register_widget( 'archivesPostAccordionWidget_Admin' );
			
		}  
		 
		/**
		 * Create different panel from post dates
		 *
		 * @access  public
		 * @since   1.0 
		 * @return  array  An array of  the date
		 */
		public function getPanelArray() { 
			
			global $wpdb; 
			
			$_panel_fetch_format_display_text = "%M - %Y";
			$_panel_fetch_format_comapre_text = "%m%Y";
			if($this->_config["date_format"] == "year") {
				$_panel_fetch_format_display_text = "%Y";
				$_panel_fetch_format_comapre_text = "%Y";
			}
			
			$_arr_list = array();
			
			$_result_items = $wpdb->get_results( " SELECT DATE_FORMAT(post_date,'".$_panel_fetch_format_display_text."') as d1, DATE_FORMAT(post_date,'".$_panel_fetch_format_comapre_text."') as d2 FROM `{$wpdb->prefix}posts` where post_status = 'publish' group by DATE_FORMAT(post_date,'".$_panel_fetch_format_display_text."') order by post_date desc" ); 
			
			foreach( $_result_items as $_value ) {
			
				$_arr_list[$_value->d2] = $_value->d1; 
			
			} 
			
			return $_arr_list;	
		
		}    
		 
		/**
		 * Get post image by given image attachment id
		 *
 		 * @access  public
		 * @since   1.0
		 *
		 * @param   int   $img  Image attachment ID
		 * @return  string  Returns image html from post attachment
		 */
		 public function getPostImage( $img ) {
		 
			$image_link = wp_get_attachment_url( $img ); 
			if( $image_link ) {
				$image_title = esc_attr( get_the_title( $img ) );  
				return wp_get_attachment_image( $img , array(180,180), 0, $attr = array(
									'title'	=> $image_title,
									'alt'	=> $image_title
								) );
			}else{
				return "<img src='".AVPT_MEDIA."images/no-img.png' />";
			}
		 }
		 
		/**
		 * Get all the categories
		 *
		 * @access  public
		 * @since   1.0
		 *
		 * @return  object It contains all the categories for shop
		 */
		public function getCategories() {
		
			global $wpdb;
			
			/**
			 * Fetch all the categories from database
			 */
			return $wpdb->get_results( "SELECT wtt.term_taxonomy_id as id, wt.name as category FROM `{$wpdb->prefix}terms` as wt INNER JOIN {$wpdb->prefix}term_taxonomy as wtt on wtt.term_id = wt.term_id and wtt.taxonomy = 'category'" );
		
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
		 * Get Archive Posts Accordion Panel Template
		 *
		 * @access  public
		 * @since   1.0
		 *
		 * @param   string $file Template file name
		 * @return  string Returns template file path
		 */
		public function getArchivesPostAccordionTemplate( $file ) { 
			  
			if( locate_template( $file ) != "" ){
				return locate_template( $file );
			}else{
				return plugin_dir_path( dirname( __FILE__ ) ) . 'templates/' . $file ;
			}  
	   }
   }
}