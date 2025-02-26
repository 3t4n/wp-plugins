<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

 if ( ! defined( 'ABSPATH' ) ) {
 	exit;
 }

    global $post, $product;

      $_totalFrames 		= get_post_meta($post->ID, '_totalFrames', true);
      $_endFrames 			= get_post_meta($post->ID, '_endFrames', true);
      $_currentFrames 	= get_post_meta($post->ID, '_currentFrames', true);
      $_filePrefix 			= get_post_meta($post->ID, '_filePrefix', true);
      $_fileExt 				= get_post_meta($post->ID, '_fileExt', true);
      $_heightFrame			= get_post_meta($post->ID, '_heightFrame', true);
      $_widthFrame			= get_post_meta($post->ID, '_widthFrame', true);
      $_navigationFrame	= get_post_meta($post->ID, '_navigationFrame', true);
      $_responsiveFrame	= get_post_meta($post->ID, '_responsiveFrame', true);

      $uploadfile    = wp_upload_dir();


    $attachment_ids = $product->get_gallery_attachment_ids();
    if ( $attachment_ids ) {
 	      $loop 		= 0;
 	      $columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
 	?>
  <div class="images">

        <div class="threesixty yupproduct">
            <div class="spinner">
                <span>0%</span>
            </div>
            <ol class="threesixty_images">
            </ol>
        </div>
        <script type="text/javascript">

          (function($) {

            $(document).ready(function() {
                      $('.yupproduct').ThreeSixty({
                         totalFrames: <?php echo htmlspecialchars($_totalFrames, ENT_QUOTES, 'UTF-8') ; ?> ,
                         endFrame: <?php echo $_endFrames; ?>,
                         currentFrame: <?php echo $_currentFrames; ?>,
                         imgList: '.threesixty_images',
                         progress: '.spinner',
                         imagePath: '<?php echo $uploadfile['baseurl']; ?>/',
                         filePrefix: '<?php echo $_filePrefix; ?>',
                         ext: '<?php echo $_fileExt; ?>',
                         height: <?php echo $_heightFrame; ?>,
                         width: <?php echo $_widthFrame; ?>,
                         <?php
                            if($_navigationFrame){
                                echo 'navigation: true,';
                            }else{
                                echo 'navigation: false,';
                            }
                            if($_responsiveFrame){
                                echo 'responsive: true';
                            }else{
                                echo 'responsive: false';
                            }
                         ?>

                     });
           });
          })(jQuery);



        </script>


</div>

<?php } ?>
