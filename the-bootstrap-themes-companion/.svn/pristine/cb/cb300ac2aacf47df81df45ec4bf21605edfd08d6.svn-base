<?php
/**
 * Client Logo Page
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function tbtc_client_logo(){
    ?>
    <div class="wrap">
        <fieldset class="fieldset-logo">

            <form method="post" action="options.php" class="field_form">
                <?php
                settings_fields( 'custom_logo_images' );
                do_settings_sections( 'custom_logo_images' );

                $photo_url = get_option('txt_image_url');
                $photo_link = get_option('image_link') 
                ?>
               <ol type="1" id="clone-input-list" class="clonedInput left_container">
            <?php

            if(!empty($photo_url[0])) {
                for($i=0; $i<count($photo_url); $i++) {
                    if ( $photo_url[$i] OR $photo_link[$i]){
                        ?>
                        <li class="clone-section group page_item">
                            <div class="field-section">
                                <div class="group">
                                    <label><?php esc_html_e( "Logo", 'tbthemes-companion' ); ?></label>
                                    <input class="upload_image text_field" type="text" name="txt_image_url[]" value="<?php echo esc_attr( $photo_url[$i] ); ?>" />
                                    <input class= "upload_image_button" type="button" value=<?php esc_attr_e( 'Browse', 'tbthemes-companion' ); ?> />
                                    <label><?php esc_html_e( "Featured Link", 'tbthemes-companion' ); ?></label>
                                    <input class="image_link" type="url" value="<?php echo esc_attr( $photo_link[$i] ); ?>" name="image_link[]">
                                    <div class="image-block image-holder"> <img src="<?php echo esc_url( $photo_url[$i] ); ?>" width="100" /> </div>
                                    
                                </div>
                            </div>
                            <span class="text-btn btn-remove"><?php esc_html_e( "Remove", 'tbthemes-companion' ); ?></span>
                        </li>
                    <?php }
                }
            } else { ?>
                <li class="clone-section group">
                    <div class="field-section">

                        <div class="group">
                            <div class="silde_label"><?php esc_html_e( "Upload or type the Image URL", 'tbthemes-companion' ); ?> </div>
                            <label><?php esc_html_e( "Logo", 'tbthemes-companion' ); ?></label>
                            <input class="upload_image text_field" type="text" name="txt_image_url[]" />
                            <input class= "upload_image_button" type="button" value="<?php esc_attr_e( 'Browse', 'tbthemes-companion' ); ?>" />
                            
                            <label><?php esc_html_e( "Featured Link", 'tbthemes-companion' ); ?></label>
                            <input class="image_link" type="url" name="image_link[]">
                            <div class="image-block image-holder"><img width="100" /> </div>
                        </div>
                    </div>
                    <span class="text-btn btn-remove"><?php esc_html_e( "Remove", 'tbthemes-companion' ); ?></span>
                </li>
                <?php
            }
            ?>
        </ol>
        <div class="add-more-section"> <span class="btn-add-logo" style="cursor:pointer">+ <?php esc_html_e( "Add Another Logo", 'tbthemes-companion' ); ?></span> </div>
                <?php submit_button(); ?>

            </form>
        </fieldset>
    </div>
<?php
}


//register setting
add_action('admin_init','tbtc_register_data_init');
function tbtc_register_data_init()
{
    register_setting( 'custom_logo_images', 'txt_image_url' );
    register_setting( 'custom_logo_images', 'image_link' );
}


function load_media_files() {
    wp_enqueue_media();
    wp_enqueue_script('media-upload');
    
}
add_action( 'admin_enqueue_scripts', 'load_media_files' );

