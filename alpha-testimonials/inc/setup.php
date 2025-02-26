<?php 

  /*==============================================
        Prevent Direct Access of this file
  ==============================================*/
  if ( ! defined( 'ABSPATH' ) ) exit; // Exit if this file is accessed directly

  if( !class_exists( 'Alpha_Testimonials' ) ) {
    class Alpha_Testimonials { 

      static $version = '1.0';

      protected static function alpha_enqueue() {
         add_action( 'wp_enqueue_scripts', array( 'Alpha_Testimonials', 'alpha_frontend_scripts' ) );
         add_action( 'admin_enqueue_scripts', array( 'Alpha_Testimonials', 'alpha_admin_scripts' ) );
         add_action( 'wp_head', array( 'Alpha_Testimonials', 'alpha_print_options' ) );
      }
      protected static function hooks() {
         // Activation
         register_activation_hook( __FILE__, array( 'Alpha_Testimonials', 'alpha_activate' ) );
         //  Deactivation
         register_deactivation_hook( __FILE__, array( 'Alpha_Testimonials', 'alpha_deactivate' ) );
         // unistall
         register_uninstall_hook( __FILE__, array( 'Alpha_Testimonials', ' alpha_unistall' ) ); 
         //initialize testimonials post type
         add_action( 'init', array( 'Alpha_Testimonials', 'alpha_post_type' ) );
         //metabox
         add_action('add_meta_boxes', array( 'Alpha_Testimonials', 'alpha_meta_boxes' ) );
         //saving the testimonials post type
         add_action('save_post', array( 'Alpha_Testimonials', 'alpha_save_meta_boxes' ) );
         // TinyMCE Plugin
         add_filter( 'mce_external_plugins', array( 'Alpha_Testimonials', 'alpha_add_shortcode_plugin' ) );
         add_filter( 'mce_buttons', array( 'Alpha_Testimonials', 'alpha_shortcode_button' ) );
      }
      /*===========================================
                enqueue styles and scripts
      =============================================*/
      public static function alpha_frontend_scripts() {
          wp_enqueue_style( 'main-style', plugin_dir_url( __FILE__ ) . '../assets/css/style.css', array(), self::$version );
          wp_enqueue_script( 'jquery', plugin_dir_url( __FILE__ ) . '../assets/js/jquery-1.9.1.min.js', array(), '1.9.1', true );
          wp_enqueue_script( 'alpha', plugin_dir_url( __FILE__ ) . '../assets//js/testimonials.min.js', array(), self::$version,  true );
      }

      public static function alpha_admin_scripts() {
        if( is_admin() ) {
          wp_enqueue_style( 'admin-style', plugin_dir_url( __FILE__ ) . '../assets/css/admin.css', array(), self::$version );
          wp_enqueue_script( 'admin-js', plugin_dir_url( __FILE__ ) . '../assets/js/admin.js',  array(), self::$version, true );
          wp_enqueue_media();
        }
      }
      
      /*================================================
         flush rewrite rules &&
         activation/deactivation hooks
      =================================================*/
      public static function alpha_activate(){
          flush_rewrite_rules();
      }
      public static function alpha_deactivate(){
          flush_rewrite_rules();
      }
       public static function alpha_unistall(){
            delete_option('alpha-title');
            delete_option('alpha-title_clr');
            delete_option('alpha-background');
            delete_option('alpha-bubble');
            delete_option('alpha-layout');
            delete_option('alpha-delay');
            delete_option('alpha-autoplay');
            delete_option('alpha-bck-img');
            delete_option('alpha-text');
            delete_option('alpha-quotes');
      }

      /*================================================
        Add tinyMCE Button
      =================================================*/
      public static function alpha_shortcode_button( $buttons ) {
         global $current_screen;
         $type = $current_screen->post_type;

         if ( is_admin() && ($type == 'post' || $type == 'page') ) {
          array_push( $buttons, "alpha" );
         }  

        return $buttons;
      } //alpha_register_shortcode_button()
      public static function alpha_add_shortcode_plugin( $plugin_array ) {
         global $current_screen;
         $type = $current_screen->post_type;

         if ( is_admin() && ($type == 'post' || $type == 'page') ) {
          $plugin_array['alpha'] = plugin_dir_url( __FILE__ )  . '../assets/js/shortcode.js';
         }
         return $plugin_array;
      } //alpha_add_shortcode_plugin()

      /*===========================================
                Register custom post types
      =============================================*/
      public static function alpha_post_type(){
        $labels = array(
                    'name'           => __('Testimonials', 'alpha'),
                    'singular_name'  => __('Testimonial', 'alpha'),
                    'add_new'        => __('Add new', 'alpha'),
                    'add_new_item'   => __('Add new Testimonial', 'alpha'),
                    'edit_item'      => __('Edit Testimonial', 'alpha'),  
                    'view_item'      => __('View Testimonial', 'alpha'), 
                    'all_items'      => __('All Testimonials', 'alpha'), 
                    'search_item'    => __('Search Testimonial', 'alpha'), 
                    'not_found'      => __('No Testimonial found', 'alpha'),
                    'not_found_in_trash' => __('No Testimonial found in trash', 'alpha'),
                    'parent_item_colon'   => '',
                    'menu_name'      => __('Testimonials', 'alpha')
        );
        register_post_type( 'tf_testimonials', array(
                   'labels'          => $labels,
                   'public'          => true,
                   'has_archive'     => true,
                   'capability_type' => 'post',
                   'supports'        => array('thumbnail', 'title'),
                   'rewrite'         => array( 'testimonial'),
                   'menu_position'   => 46,
                   'menu_icon'       => 'dashicons-format-quote',
                    )
        ); 
      }
      /*=============================================
                Add custom metabox
      ==============================================*/
      public static function alpha_meta_boxes(){
                //testimonials meta box
                add_meta_box(
                  'tf_testimonials_cus_meta', __('Customer Testimonial', 'alpha'), array( 'Alpha_Testimonials', 'tf_testimonials_meta_fields' ), 'tf_testimonials', 'normal', 'core'
                );
      }
            
      
      public static function tf_testimonials_meta_fields($post){
        /**
          * Testimonials metabox callback function
          *
          * Adding custom fields (name, title and content)
          * to app_testimonials post type
          *
          * @param $post
          * @since 1.0
          *
          */

              $content = get_post_meta( $post->ID, 'tf_testimonial_content',true );
              $name    = get_post_meta( $post->ID, 'alpha_name', true );
              $title   = get_post_meta( $post->ID, 'alpha_title', true );
              $company   = get_post_meta( $post->ID, 'alpha_company', true );
              $url  = get_post_meta( $post->ID, 'alpha_url', true );
              ?>
              <table>
                <tr>
                  <td>
                    <label>Customer's Name</label>
                  </td>
                  <td> 
                    <input type="text" name="alpha_name" id="alpha_name" value="<?php echo $name; ?>">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Customer's Title</label>
                  </td>  
                  <td>
                    <input type="text" name="alpha_title" id="alpha_title" value="<?php echo $title; ?>">
                  </td>
                 </tr>
                 <tr>
                  <td>
                    <label>Company</label>
                  </td>  
                  <td>
                    <input type="text" name="alpha_company" id="alpha_company" value="<?php echo $company; ?>">
                  </td>
                 </tr>
                 <tr>
                  <td>
                    <label>Website</label>
                  </td>  
                  <td>
                    <input type="text" name="alpha_url" id="alpha_url" value="<?php echo $url; ?>">
                  </td>
                 </tr>
                 <tr>
                  <td>
                  <label>His/Her Testimonial</label>
                  </td>
                  <td>
                          <!--addiding custom editor-->
                      <?php wp_editor($content, 'testimonial_content', array(
                              'wpautop'       =>      true,
                              'media_buttons' =>      false,
                              'textarea_name' =>      'tf_testimonial_content',
                              'textarea_rows' =>      10,
                              'teeny'         =>      true
                        )); ?>
                  </td>
                 </tr>       
              </table>
              <?php 
        }
                 
      /*=============================================
                  SAVE METABOXES
      ==============================================*/
      public static function alpha_save_meta_boxes( $post_id ){

          if(defined('DOING_AUTOSAVE') && 'DOING_AUTOSAVE') {
            return $post_id;
          }

          $metadata['alpha_name']                        = ( isset($_POST['alpha_name']) ? $_POST['alpha_name'] : '' );
          $metadata['alpha_title']                       = ( isset($_POST['alpha_title']) ? $_POST['alpha_title'] : '' );
          $metadata['alpha_company']                       = ( isset($_POST['alpha_title']) ? $_POST['alpha_company'] : '' );
          $metadata['alpha_url']                       = ( isset($_POST['alpha_title']) ? $_POST['alpha_url'] : '' ); 
          $metadata['tf_testimonial_content'] = ( isset($_POST['tf_testimonial_content']) ? $_POST['tf_testimonial_content'] : '' );  

          foreach($metadata as $key => $value ){
            $current_value = get_post_meta( $post_id, $key, true );
            if( $value && '' == $current_value ){
              add_post_meta( $post_id, $key, $value, true );
            }  elseif ( $value && '' != $current_value ){
              update_post_meta( $post_id, $key, $value );
            } elseif ( '' == $value && $current_value ){
              delete_post_meta( $post_id, $key, $current_value );
            }
          }
      }     
      
      /*=============================================
                  USER SELECTED STYLE
      ==============================================*/
      public static function alpha_print_options(){
        /**
          *
          * Collect the values submited via options form
          * and then print them to the head
          *
          * @param $css
          * @since 1.0
          *
          */
          $image_id = get_option('alpha-bck-img');
          $image_attributes = wp_get_attachment_image_src( $image_id, 'full'); 
          $bubble = get_option('alpha-bubble');
          $bck = get_option('alpha-background');    
          $text_color = get_option('alpha-text'); 
          $quotes = get_option('alpha-quotes');
          $title_color = get_option('alpha-title_clr');
          
          $css = '<style type="text/css">';
          $css .= '.testimonial-bubble{background: '. $bubble .'}';
          $css .= '.testimonial-bubble:after{border-color: transparent '. $bubble .'}';
          if( !empty( $image_id ) ){
            $css .= '#testimonials{background: url('. $image_attributes[0] .') center no-repeat; background-size: cover}';
          } else {
            $css .= '#testimonials{background: '. $bck .'}';     
          }
          $css .= '.testimonial-bubble p{color: '. $text_color .'}';
          $css .= '.testimonial-bubble p:after, .testimonial-bubble p:before{color: '. $quotes .'}';
          $css .= '#tes-title h2{color: '. ( !empty($title_color) ? $title_color : '#fefefe' ) .'}';
          $css .= '#tes-title h2:after, #tes-title h2:before{background: '. $title_color .'}';
          $css .= '</style>';

          echo $css;
      }

      public static function init(){
          self::alpha_enqueue();
          self::hooks();
      }//init()    
    }//Class ends;
  }//if !class_exists()
?>