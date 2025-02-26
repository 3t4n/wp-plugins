<?php
 
 if( ! class_exists( 'AFAQCBC_q_a_faq_Showcase_Taxonomy_Images' ) ) {
	 		/*
* اعتقد هذا تمام جاهز
هو مخصص لإضافة صوره للكاتيقوري
*/
  class AFAQCBC_q_a_faq_Showcase_Taxonomy_Images {
    
    public function __construct() {
		 add_action( 'faqscategory_add_form_fields', array( $this, 'add_category_image' ), 10, 2 );
		 add_action( 'create_faqscategory', array( $this, 'save_category_image' ), 10, 2 );
		 add_action( 'faqscategory_edit_form_fields', array( $this, 'update_category_image' ), 10, 2 );
		 add_action( 'edited_faqscategory', array( $this, 'updated_category_image' ), 10, 2 );
		 add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
		 add_action( 'admin_footer', array( $this, 'add_script' ) );
    }


   public function load_media() {
		if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'faqscategory' ) {
		   return;
		}
		wp_enqueue_media();
   }
  
   /**
    * Add a form field in the new category page
    * @since 1.0.0
    */
  
   public function add_category_image( $taxonomy ) { ?>
   <?php wp_nonce_field('add_faq_nonce'); ?>
     <div class="form-field term-group">
       <label for="showcase-taxonomy-image-id"><?php echo esc_html__( 'Image', 'advanced-faq-creator-by-category' ); ?></label>
       <input type="hidden" id="showcase-taxonomy-image-id" name="showcase-taxonomy-image-id" class="custom_media_url" value="">
       <div id="category-image-wrapper"></div>
       <p>
         <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php echo esc_attr__( 'Add Image', 'advanced-faq-creator-by-category' ); ?>" />
         <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php echo esc_attr__( 'Remove Image', 'advanced-faq-creator-by-category' ); ?>" />
       </p>
     </div>
   <?php }

   /**
    * Save the form field
    * @since 1.0.0
    */
   public function save_category_image( $term_id, $tt_id ) {
	   $retrieved_nonce = $_REQUEST['_wpnonce'];
		if (!wp_verify_nonce($retrieved_nonce, 'add_faq_nonce' ) ) die( 'Failed security check' );
     if( isset( $_POST['showcase-taxonomy-image-id'] ) && '' !== $_POST['showcase-taxonomy-image-id'] ){
       add_term_meta( $term_id, 'showcase-taxonomy-image-id', absint( $_POST['showcase-taxonomy-image-id'] ), true );
     }
    }

    /**
     * Edit the form field
     * @since 1.0.0
     */
    public function update_category_image( $term, $taxonomy ) { ?>

      <tr class="form-field term-group-wrap">
        <th scope="row">
            <?php wp_nonce_field('update_faq_nonce_image','name_image_nonc'); ?>
          <label for="showcase-taxonomy-image-id"><?php _e( 'Image', 'advanced-faq-creator-by-category' ); ?></label>
        </th>
        <td>
          <?php $image_id = get_term_meta( absint($term->term_id), 'showcase-taxonomy-image-id', true ); ?>
          <input type="hidden" id="showcase-taxonomy-image-id" name="showcase-taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
          <div id="category-image-wrapper">
              <?php $image_attributes = wp_get_attachment_image_src( $image_id, 'thumbnail' ); ?>
            <?php if( $image_id ) { ?>
              <img src="<?php echo esc_url($image_attributes['0']); ?>">
            <?php } ?>
          </div>
          <p>
            <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php echo esc_attr__( 'Add Image', 'advanced-faq-creator-by-category' ); ?>" />
            <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php echo esc_attr__( 'Remove Image', 'advanced-faq-creator-by-category' ); ?>" />
          </p>
        </td>
      </tr>
   <?php }

   /**
    * Update the form field value
    * @since 1.0.0
    */
   public function updated_category_image( $term_id, $tt_id ) {
		$retrieved_nonce = $_REQUEST['name_image_nonc'];
		if (!wp_verify_nonce($retrieved_nonce, 'update_faq_nonce_image' ) ) die( 'Failed security check' );

     if( isset( $_POST['showcase-taxonomy-image-id'] ) && '' !== $_POST['showcase-taxonomy-image-id'] ){
       update_term_meta( $term_id, 'showcase-taxonomy-image-id', absint( $_POST['showcase-taxonomy-image-id'] ) );
     } else {
       update_term_meta( $term_id, 'showcase-taxonomy-image-id', '' );
     }
   }
 
   /**
    * Enqueue styles and scripts
    * @since 1.0.0
    */
   public function add_script() {
     if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'faqscategory' ) {
       return;
     } ?>
     <script> 
	 "use strict";
	 jQuery(document).ready( function($) {
		 "use strict";
       _wpMediaViewsL10n.insertIntoPost = '<?php echo esc_js( "Insert" ); ?>';
       function ct_media_upload(button_class) {
         var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;
         jQuery('body').on('click', button_class, function(e) {
           var button_id = '#'+jQuery(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = jQuery(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if( _custom_media ) {
               jQuery('#showcase-taxonomy-image-id').val(attachment.id);
               jQuery('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               jQuery( '#category-image-wrapper .custom_media_image' ).attr( 'src',attachment.url ).css( 'display','block' );
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
           }
           wp.media.editor.open(button); return false;
         });
       }
       ct_media_upload('.showcase_tax_media_button.button');
       jQuery('body').on('click','.showcase_tax_media_remove',function(){
         jQuery('#showcase-taxonomy-image-id').val('');
         jQuery('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
       });

       jQuery(document).ajaxComplete(function(event, xhr, settings) {
         var queryStringArr = settings.data.split('&');
         if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
           var xml = xhr.responseXML;
           $response = jQuery(xml).find('term_id').text();
           if($response!=""){
             // Clear the thumb image
             jQuery('#category-image-wrapper').html('');
           }
          }
        });
      });
    </script>
   <?php }
  }
	new AFAQCBC_q_a_faq_Showcase_Taxonomy_Images();
 
}

