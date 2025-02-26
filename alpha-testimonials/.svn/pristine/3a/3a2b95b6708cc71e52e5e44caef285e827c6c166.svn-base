<?php 
if( !class_exists( 'Alpha_Interface' ) ){
   class Alpha_Interface{

     protected static function hooks() {
        add_filter('post_updated_messages', array( 'Alpha_Interface', 'alpha_updated_messages' ) );
        add_action( 'admin_menu', array( 'Alpha_Interface', 'alpha_replace_submit_meta_box' ) );
        add_action( 'admin_head', array( 'Alpha_Interface', 'change_thumb_name' ) );
        add_filter( "manage_edit-tf_testimonials_columns",  array( 'Alpha_Interface', "testimonials_custom_columns" ) );
        add_action( "manage_tf_testimonials_posts_custom_column", array( 'Alpha_Interface', "testimonials_custom_column_content" ), 10, 2 );
     } 

     /**
      * 
      * CUSTOM MESSAGES
      *
      * modify custom messages for post types (like save, edit, view, etc.)
      *
      * @global $post, $post_id
      * @param  $messages
      * @return string
      * @since  1.0
      *
      */      
      public static function alpha_updated_messages( $messages ) {
        global $post, $post_ID;
        $messages = array(
            0 => '', // Unused. Messages start at index 1.
            1 => sprintf( __('%s updated. <a href="%s">View %s</a>'), 'Testimonial', esc_url( get_permalink($post_ID) ), 'Testimonial' ),
            2 => __('Custom field updated.'),
            3 => __('Custom field deleted.'),
            4 => __(strtolower('Testimonial'). ' updated.'),
            /* translators: %s: date and time of the revision */
            5 => isset($_GET['revision']) ? sprintf( __('%s restored to revision from %s'),'Testimonial', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6 => sprintf( __('%s published. <a href="%s">View %s</a>'), 'Testimonial', esc_url( get_permalink($post_ID) ), strtolower('Testimonial') ),
            7 => __('Testimonial'. ' Saved.'),
            8 => sprintf( __('%s submitted. <a target="_blank" href="%s">Preview %s</a>'), 'Testimonial', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ), strtolower('Testimonial') ),
            9 => sprintf( __('%s scheduled for: <strong>%2$s</strong>. <a target="_blank"
        href="%3$s">Preview %1$s</a>'), 'Testimonial', date_i18n( __( 'M j, Y @ G:i' ),
        strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
            10 => sprintf( __('%s draft updated. <a target="_blank" href="%s">Preview %s</a>'), 'Testimonial', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ), strtolower('Testimonial') ),
        );
         return $messages;
      }
      
     /**
      *
      * Custom Submit Box
      *
      * Loop throught custom post types and 
      * replace default submit box
      *
      * @since  1.0
      *
      */      
      public static function alpha_replace_submit_meta_box() {
          remove_meta_box('submitdiv', 'tf_testimonials', 'core');
          add_meta_box('submitdiv', sprintf( __('Save/Update %s'), 'Testimonial' ), array( 'Alpha_Interface', 'alpha_submit_meta_box' ), 'tf_testimonials', 'side', 'low');     
      }
      
     /**
      * Custom edit of default wordpress publish box callback
      * loop through each custom post type and remove default
      * submit box, replacing it with custom one that has
      * only submit button with custom text on it (add/update)
      *
      * @global $action, $post
      * @see wordpress/includes/metaboxes.php
      * @since  1.0
      *
      */ 
      public static function alpha_submit_meta_box() {
        global $action, $post;
         $post_type = $post->post_type;
         $post_type_object = get_post_type_object($post_type);
         $can_publish = current_user_can($post_type_object->cap->publish_posts);
        ?>
        <div class="submitbox" id="submitpost">
         <div id="major-publishing-actions">
         <?php
         do_action( 'post_submitbox_start' );
         ?>
         <div id="delete-action">
         <?php
         if ( current_user_can( "delete_post", $post->ID ) ) {
           if ( !EMPTY_TRASH_DAYS )
                $delete_text = __('Delete Permanently');
           else
                $delete_text = __('Move to Trash');
         ?>
         <a class="submitdelete deletion" href="<?php echo get_delete_post_link($post->ID); ?>"><?php _e('Delete'); ?></a><?php
         } //if ?>
        </div>
         <div id="publishing-action">
         <span class="spinner"></span>
         <?php
         if ( !in_array( $post->post_status, array('publish', 'future', 'private') ) || 0 == $post->ID ) {
              if ( $can_publish ) : ?>
                <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Add New') ?>" />
                <?php submit_button(  __( 'Add New', 'alpha'), 'primary button-large', 'publish', false, array( 'accesskey' => 'p' ) ); ?>
         <?php   
              endif; 
         } else { ?>
                <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Update'); ?>" />
                <input name="save" type="submit" class="button button-primary button-large" id="publish" accesskey="p" value="<?php esc_attr_e('Update'); ?>" />
         <?php
         } //if ?>
         </div>
         <div class="clear"></div>
         </div>
         </div>
        <?php
      } //alpha_submit_meta_box()

      /**
      *
      * THUMBNAIL TEXT
      *
      * Change Default "set thumbnail" Text for
      * features, team members, apps and highlights
      *
      * @since  1.0
      *
      */ 
      public static function change_thumb_name() {
          remove_meta_box( 'postimagediv', 'tf_testimonials', 'side' );
          add_meta_box('postimagediv', __('Customer`s Image', 'alpha'), 'post_thumbnail_meta_box', 'tf_testimonials', 'side', 'high');
      }
       

     /**
      * CUSTOM COLUMNS
      *
      * changing default post columns for 
      * testimonials post type, by adding
      * custom icon, name and ulg(customer's
      * title) columns
      *
      * @param  $cols
      * @return string
      * @since  1.0
      */
      public static function testimonials_custom_columns( $cols ) {
          $cols = array( 'cb' => '<input type="checkbox" />',
            'title' => __('Testimonial Title', 'alpha'),
            'name' => __('Customer', 'alpha'),
            'ulg' => __('His Title', 'alpha'),
            'icon' => __( 'Image', 'alpha' ),
            'date' => __('Date', 'alpha')
          ); 
          return $cols;
      } // testimonials_custom_columns()
      

     /**
      *
      * Custom Columns Callback Function
      *
      * @param  $column, $post_id
      * @global $alpha
      * @return string
      * @since  1.0
      */
      public static function testimonials_custom_column_content( $column, $post_id ) {
        switch ( $column ) {
          case "icon":
             $image[0] = plugin_dir_url( __FILE__ ) . '../assets/images/customer.png';
             if( has_post_thumbnail( $post_id ) ){
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), array(72,72) );
             } 
             echo '<img src="'. $image[0] .'" width="80px" height="80px"/>';
          break;
          case 'name':
          $name    = get_post_meta( $post_id, 'alpha_name', true );
          if( $name ){
            echo $name;
          }
          break;
          case 'ulg':
          $title   = get_post_meta( $post_id, 'alpha_title', true );
          $company = get_post_meta( $post_id, 'alpha_company', true ); 
          if( $title ){
            echo $title . ' at ' . $company;
          }
          break;
        }
      } //testimonials_custom_column_content()
      public static function init() {
        self::hooks();
      }

   }//class end;
 }//if !class_exists()

?>