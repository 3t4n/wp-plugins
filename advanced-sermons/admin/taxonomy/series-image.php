<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


if( ! class_exists( 'Series_Taxonomy_Images' ) ) {
  class Series_Taxonomy_Images {

    public function __construct() {
     //
    }

    /**
     * Initialize the class and start calling our hooks and filters
     */
     public function asp_init() {
     // Image actions
     add_action( 'sermon_series_add_form_fields', array( $this, 'asp_add_category_image' ), 10, 2 );
     add_action( 'created_sermon_series', array( $this, 'asp_save_category_image' ), 10, 2 );
     add_action( 'sermon_series_edit_form_fields', array( $this, 'asp_update_category_image' ), 10, 2 );
     add_action( 'edited_sermon_series', array( $this, 'asp_updated_category_image' ), 10, 2 );
     add_action( 'admin_enqueue_scripts', array( $this, 'asp_load_media' ) );
     add_action( 'admin_footer', array( $this, 'asp_add_script' ) );
   }

   public function asp_load_media() {
       if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'sermon_series' ) {
          return;
       }
       wp_enqueue_media();
   }

   /**
    * Add a form field in the new category page
    * @since 1.0.0
    */

   public function asp_add_category_image( $taxonomy ) { ?>
       <div class="form-field term-group series-thumbnail">
           <label for="series-taxonomy-image-id"><?php _e( 'Series Image', 'advanced-sermons' ); ?></label>
           <input type="hidden" id="series-taxonomy-image-id" name="series-taxonomy-image-id" class="custom_media_url" value="">
           <div id="category-image-wrapper"></div>
           <p>
               <input type="button" class="button button-secondary series_tax_media_button" id="series_tax_media_button" name="series_tax_media_button" value="<?php _e( 'Add Image', 'advanced-sermons' ); ?>" />
               <input type="button" class="button button-secondary series_tax_media_remove" id="series_tax_media_remove" name="series_tax_media_remove" value="<?php _e( 'Remove Image', 'advanced-sermons' ); ?>" />
           </p>
       </div>
   <?php }

   /**
    * Save the form field
    * @since 1.0.0
    */
   public function asp_save_category_image( $term_id, $tt_id ) {
       if ( isset( $_POST['series-taxonomy-image-id'] ) ){
          add_term_meta( $term_id, 'series-taxonomy-image-id', absint( $_POST['series-taxonomy-image-id'] ), true );
       }
    }

    /**
     * Edit the form field
     * @since 1.0.0
     */
    public function asp_update_category_image( $term, $taxonomy ) { ?>
      <tr class="form-field term-group-wrap">
        <th scope="row">
          <label for="series-taxonomy-image-id"><?php _e( 'Series Image', 'advanced-sermons' ); ?></label>
        </th>
        <td>
          <?php $image_id = get_term_meta( $term->term_id, 'series-taxonomy-image-id', true ); ?>
          <input type="hidden" id="series-taxonomy-image-id" name="series-taxonomy-image-id" value="<?php echo esc_attr( $image_id ); ?>">
          <div id="category-image-wrapper">
            <?php if( $image_id ) { ?>
              <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
            <?php } ?>
          </div>
          <p>
            <input type="button" class="button button-secondary series_tax_media_button" id="series_tax_media_button" name="series_tax_media_button" value="<?php _e( 'Add Image', 'advanced-sermons' ); ?>" />
            <input type="button" class="button button-secondary series_tax_media_remove" id="series_tax_media_remove" name="series_tax_media_remove" value="<?php _e( 'Remove Image', 'advanced-sermons' ); ?>" />
          </p>
        </td>
      </tr>
   <?php }

   /**
    * Update the form field value
    * @since 1.0.0
    */
   public function asp_updated_category_image( $term_id, $tt_id ) {
       if ( isset( $_POST['series-taxonomy-image-id'] ) ){
          update_term_meta( $term_id, 'series-taxonomy-image-id', absint( $_POST['series-taxonomy-image-id'] ) );
       }
   }

   /**
    * Enqueue styles and scripts
    * @since 1.0.0
    */
   public function asp_add_script() {
     if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'sermon_series' ) {
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
                               $('#series-taxonomy-image-id').val(attachment.id);
                               $('#category-image-wrapper').html('<img class="custom_media_image" src="' + attachment.url + '" style="margin:0;padding:0;max-height:100px;float:none;" />');
                           }
                       }

                       wp.media.editor.open(button);
                       return false;
                   });
               }

               ct_media_upload('.series_tax_media_button.button');

               $('body').on('click', '.series_tax_media_remove', function() {
                   $('#series-taxonomy-image-id').val('');
                   $('#category-image-wrapper').html('');
               });

               // Reset the media uploader state when adding a new term
               $(document).ajaxComplete(function(event, xhr, settings) {
                   var queryStringArr = settings.data.split('&');
                   if ($.inArray('action=add-tag', queryStringArr) !== -1) {
                       // Reset the image ID and wrapper
                       $('#series-taxonomy-image-id').val('');
                       $('#category-image-wrapper').html('');
                   }
               });
           });
       </script>
   <?php }
  }
$series_Taxonomy_Images = new series_Taxonomy_Images();
$series_Taxonomy_Images->asp_init(); }


// Add series image to taxamony columns
add_filter( 'manage_edit-sermon_series_columns', 'asp_taxonomy_columns_series_image', 1);
add_filter( 'manage_sermon_series_custom_column', 'asp_taxonomy_columns_series_image_manage', 1, 3);
function asp_taxonomy_columns_series_image ($columns ) {
    $columns['series-image'] = 'Image';
    return $columns;
}
function asp_taxonomy_columns_series_image_manage( $out ,$column_name, $term_id) {
    $asp_series_image_id = get_term_meta( $term_id, 'series-taxonomy-image-id', true );
      if ( $column_name == 'series-image' && !empty($asp_series_image_id) ) {
              echo wp_get_attachment_image( $asp_series_image_id, array('70', '70'), "", array( "class" => "img-responsive" ) );
      }
}


// Change order of series image admin column
function asp_series_image_admin_column_order( $defaults ) {
    $new = array();
    $tags = isset( $defaults['tags'] ) ? $defaults['tags'] : '';
    unset($defaults['tags']);
    foreach($defaults as $key=>$value) {
        if($key=='name') {
           $new['series-image'] = $tags;
        }
        $new[$key]=$value;
    }
    return $new;
}
add_filter('manage_edit-sermon_series_columns', 'asp_series_image_admin_column_order');
