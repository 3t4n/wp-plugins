<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


if( ! class_exists( 'Speaker_Taxonomy_Images' ) ) {
  class Speaker_Taxonomy_Images {

    public function __construct() {
     //
    }

    /**
     * Initialize the class and start calling our hooks and filters
     */
     public function asp_init() {
     // Image actions
     add_action( 'sermon_speaker_add_form_fields', array( $this, 'asp_add_category_image' ), 10, 2 );
     add_action( 'created_sermon_speaker', array( $this, 'asp_save_category_image' ), 10, 2 );
     add_action( 'sermon_speaker_edit_form_fields', array( $this, 'asp_update_category_image' ), 10, 2 );
     add_action( 'edited_sermon_speaker', array( $this, 'asp_updated_category_image' ), 10, 2 );
     add_action( 'admin_enqueue_scripts', array( $this, 'asp_load_media' ) );
     add_action( 'admin_footer', array( $this, 'asp_add_script' ) );
   }

   public function asp_load_media() {
     if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'sermon_speaker' ) {
       return;
     }
     wp_enqueue_media();
   }

   /**
    * Add a form field in the new category page
    * @since 1.0.0
    */

   public function asp_add_category_image( $taxonomy ) {

   $speaker_label = get_option( 'asp_general_speaker_label' );
   if (!empty($speaker_label)) {
   		$speaker_label = $speaker_label;
   		$speaker_label_slug = strtolower("$speaker_label");
   } else {
   		$speaker_label = 'Speaker';
   		$speaker_label_slug = strtolower("Speaker");
   }
   ?>

     <div class="form-field term-group speaker-thumbnail">
       <label for="speaker-taxonomy-image-id"><?php _e( "Speaker Image", "advanced-sermons" ); ?></label>
       <input type="hidden" id="speaker-taxonomy-image-id" name="speaker-taxonomy-image-id" class="custom_media_url" value="">
       <div id="category-image-wrapper"></div>
       <p>
         <input type="button" class="button button-secondary speaker_tax_media_button" id="speaker_tax_media_button" name="speaker_tax_media_button" value="<?php _e( 'Add Image', 'advanced-sermons' ); ?>" />
         <input type="button" class="button button-secondary speaker_tax_media_remove" id="speaker_tax_media_remove" name="speaker_tax_media_remove" value="<?php _e( 'Remove Image', 'advanced-sermons' ); ?>" />
       </p>
     </div>
   <?php }

   /**
    * Save the form field
    * @since 1.0.0
    */
    public function asp_save_category_image( $term_id, $tt_id ) {
       if ( isset( $_POST['speaker-taxonomy-image-id'] ) ){
          add_term_meta( $term_id, 'speaker-taxonomy-image-id', absint( $_POST['speaker-taxonomy-image-id'] ), true );
       }
    }

    /**
     * Edit the form field
     * @since 1.0.0
     */
    public function asp_update_category_image( $term, $taxonomy ) {

    $speaker_label = get_option( 'asp_general_speaker_label' );
    if (!empty($speaker_label)) {
    		$speaker_label = $speaker_label;
    		$speaker_label_slug = strtolower("$speaker_label");
    } else {
    		$speaker_label = 'Speaker';
    		$speaker_label_slug = strtolower("Speaker");
    }
    ?>

      <tr class="form-field term-group-wrap">
        <th scope="row">
          <label for="speaker-taxonomy-image-id"><?php _e( "Speaker Image", "advanced-sermons" ); ?></label>
        </th>
        <td>
          <?php $image_id = get_term_meta( $term->term_id, 'speaker-taxonomy-image-id', true ); ?>
          <input type="hidden" id="speaker-taxonomy-image-id" name="speaker-taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
          <div id="category-image-wrapper">
            <?php if( $image_id ) { ?>
              <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
            <?php } ?>
          </div>
          <p>
            <input type="button" class="button button-secondary speaker_tax_media_button" id="speaker_tax_media_button" name="speaker_tax_media_button" value="<?php _e( 'Add Image', 'advanced-sermons' ); ?>" />
            <input type="button" class="button button-secondary speaker_tax_media_remove" id="speaker_tax_media_remove" name="speaker_tax_media_remove" value="<?php _e( 'Remove Image', 'advanced-sermons' ); ?>" />
          </p>
        </td>
      </tr>
   <?php }

   /**
    * Update the form field value
    * @since 1.0.0
    */
   public function asp_updated_category_image( $term_id, $tt_id ) {
       if ( isset( $_POST['speaker-taxonomy-image-id'] ) ){
            update_term_meta( $term_id, 'speaker-taxonomy-image-id', absint( $_POST['speaker-taxonomy-image-id'] ) );
       }
   }

   /**
    * Enqueue styles and scripts
    * @since 1.0.0
    */
   public function asp_add_script() {
     if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'sermon_speaker' ) {
       return;
     } ?>
       <script>
           jQuery(document).ready(function($) {
               _wpMediaViewsL10n.insertIntoPost = '<?php _e( "Insert", "advanced-sermons" ); ?>';

               function ct_media_upload(button_class) {
                   var _custom_media = true;

                   $('body').on('click', button_class, function(e) {
                       var button_id = '#' + $(this).attr('id');
                       var button = $(button_id);
                       _custom_media = true;

                       wp.media.editor.send.attachment = function(props, attachment) {
                           if (_custom_media) {
                               $('#speaker-taxonomy-image-id').val(attachment.id);
                               $('#category-image-wrapper').html('<img class="custom_media_image" src="' + attachment.url + '" style="margin:0;padding:0;max-height:100px;float:none;" />');
                           }
                       }

                       wp.media.editor.open(button);
                       return false;
                   });
               }

               ct_media_upload('.speaker_tax_media_button.button');

               $('body').on('click', '.speaker_tax_media_remove', function() {
                   $('#speaker-taxonomy-image-id').val('');
                   $('#category-image-wrapper').html('');
               });

               // Reset the media uploader state when adding a new term
               $(document).ajaxComplete(function(event, xhr, settings) {
                   var queryStringArr = settings.data.split('&');
                   if ($.inArray('action=add-tag', queryStringArr) !== -1) {
                       // Reset the image ID and wrapper
                       $('#speaker-taxonomy-image-id').val('');
                       $('#category-image-wrapper').html('');
                   }
               });
           });
       </script>
   <?php }
  }
$speaker_Taxonomy_Images = new speaker_Taxonomy_Images();
$speaker_Taxonomy_Images->asp_init(); }


// Add speaker image to taxamony columns
add_filter( 'manage_edit-sermon_speaker_columns', 'asp_taxonomy_columns_speaker_image', 1);
add_filter( 'manage_sermon_speaker_custom_column', 'asp_taxonomy_columns_speaker_image_manage', 1, 3);
function asp_taxonomy_columns_speaker_image($columns) {
    $columns['speaker-image'] = 'Image';
    return $columns;
}
function asp_taxonomy_columns_speaker_image_manage( $out ,$column_name, $term_id) {
    $asp_speaker_image_id = get_term_meta( $term_id, 'speaker-taxonomy-image-id', true );
      if ( $column_name == 'speaker-image' && !empty($asp_speaker_image_id) ) {
              echo wp_get_attachment_image( $asp_speaker_image_id, array('70', '70'), "", array( "class" => "img-responsive" ) );
      }
}


// Change order of speaker image admin column
function asp_speaker_image_admin_column_order( $defaults ) {
    $new = array();
    $tags = isset( $defaults['tags'] ) ? $defaults['tags'] : '';
    unset($defaults['tags']);
    foreach($defaults as $key=>$value) {
        if($key=='name') {
           $new['speaker-image'] = $tags;
        }
        $new[$key]=$value;
    }
    return $new;
}
add_filter('manage_edit-sermon_speaker_columns', 'asp_speaker_image_admin_column_order');
