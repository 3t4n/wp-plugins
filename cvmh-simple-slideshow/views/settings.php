<?php
# Exit if accessed directly
defined( 'ABSPATH' ) or exit;

$message      = '';
$notice_class = 'updated';
$notice_style = 'display:none;';

if ( $_REQUEST['action'] === 'save' ) :
        // nonce test
        if ( !wp_verify_nonce( $_POST['cvmh_slideshow_settings_nonce'], 'cvmh_slideshow_settings' ) ):
            $message      = __( 'Nonce error.', 'cvmh-simple-slideshow' );
            $notice_class = 'error';
        // rights test 
        elseif ( ! current_user_can( 'manage_options' ) ):
            $message      = '<p><strong>' . __( 'You do not have permission to change the settings for this extension.', 'cvmh-simple-slideshow' ) . '</strong></p>';
            $notice_class = 'error';
        else:
            cvmh_slideshow_save_options();
            $message      = '<p><strong>' . __( 'Settings saved.', 'cvmh-simple-slideshow' ) . '</strong></p>';
            $notice_style = 'display:block;';
        endif;
endif;

$options = json_decode( get_option( 'cvmh_slideshow' ), true );
?>

<div id="message" class="<?php echo $notice_class; ?> fade" style="<?php echo $notice_style; ?>"><?php echo $message; ?></div>


<div class="wrap">
    
    <h1><?php _e( 'CVMH Simple Slideshow', 'cvmh-simple-slideshow' ); ?></h1>
    
    <div id="welcome-panel" class="welcome-panel cvmh-slideshow-welcome-panel">
        <p><?php _e( 'To use the slideshow, use the widget or shortcode [cvmh-simple-slideshow].', 'cvmh-simple-slideshow' ); ?></p>
        <p><?php _e( 'To use the categorization, add the attribute <em>categories</em> in the shortcode and the slugs of categories separated by commas (eg. [cvmh-simple-slideshow categories="cat1,cat2"]).', 'cvmh-simple-slideshow' ); ?>
    </div>

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <input type="hidden" name="action" value="save" />
        <?php wp_nonce_field( 'cvmh_slideshow_settings', 'cvmh_slideshow_settings_nonce' ); ?>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <?php _e( 'Slideshow size', 'cvmh-simple-slideshow' ); ?>
                </th>
                <td>
                    <label for="width"><?php _e( 'Width', 'cvmh-simple-slideshow' ); ?></label>
                    <input id="width" class="small-text" type="number" min="0" step="1" name="options[width]" value="<?php echo $options['width']; ?>" />
                    <label for="height"><?php _e( 'Height', 'cvmh-simple-slideshow' ); ?></label>
                    <input id="height" class="small-text" type="number" min="0" step="1" name="options[height]" value="<?php echo $options['height']; ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="duration"><?php _e( 'Time between slides', 'cvmh-simple-slideshow' ); ?></label>
                </th>
                <td>
                    <input id="duration" class="small-text" type="number" min="0" step="1" name="options[duration]" value="<?php echo $options['duration']; ?>" /> ms
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php _e( 'Navigation', 'cvmh-simple-slideshow' ); ?>
                </th>
                <td>
                    <label for="show_nav">
                        <input id="show_nav" type="checkbox" name="options[show_nav]" value="1" <?php checked( $options['show_nav'], 1 ); ?> />
                        <?php _e( 'Arrows', 'cvmh-simple-slideshow' ); ?>
                    </label>
                    <br />
                    <label for="show_dots">
                        <input id="show_dots" type="checkbox" name="options[show_dots]" value="1" <?php checked( $options['show_dots'], 1 ); ?> />
                        <?php _e( 'Dots', 'cvmh-simple-slideshow' ); ?>
                    </label>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php _e( 'Text fields', 'cvmh-simple-slideshow' ); ?>
                </th>
                <td class="cvmh-slideshow-fields">
                    <?php if ( ! empty( $options['fields'] ) ) : ?>
                        <?php foreach( $options['fields'] as $key => $value ) : ?>
                            <div class="cvmh-slideshow-field">
                                <label for="field_<?php echo $key; ?>"><?php echo $key+1; ?>.</label>
                                <input id="field_<?php echo $key; ?>" class="regular-text" type="text" name="options[fields][]" value="<?php echo $value; ?>" />
                                <a class="cvmh-field-delete ir" href="#"><?php _e( 'Remove', 'cvmh-simple-slideshow' ); ?></a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <a class="cvmh-field-add" href="#"><?php _e( 'Add new field', 'cvmh-simple-slideshow' ); ?></a>
                    <div class="cvmh-slideshow-field to-clone">
                        <label for="field_clone"></label>
                        <input id="field_clone" class="regular-text" type="text" name="clone" value="" />
                        <a class="cvmh-field-delete ir" href="#"><?php _e( 'Remove', 'cvmh-simple-slideshow' ); ?></a>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php _e( 'Categories', 'cvmh-simple-slideshow' ); ?>
                </th>
                <td>
                    <label for="categories">
                        <input id="categories" type="checkbox" name="options[categories]" value="1" <?php checked( $options['categories'], 1 ); ?> />
                        <?php _e( 'Categorizing slides', 'cvmh-simple-slideshow' ); ?>
                    </label>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php _e( 'Images', 'cvmh-simple-slideshow' ); ?>
                </th>
                <td>
                    <label for="background">
                        <input id="background" type="checkbox" name="options[background]" value="1" <?php checked( $options['background'], 1 ); ?> />
                        <?php _e( 'Use background images', 'cvmh-simple-slideshow' ); ?>
                    </label>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php _e( 'Uninstall', 'cvmh-simple-slideshow' ); ?>
                </th>
                <td>
                    <label for="uninstall_delete">
                        <input id="uninstall_delete" type="checkbox" name="options[uninstall_delete]" value="1" <?php checked( $options['uninstall_delete'], 1 ); ?> />
                        <?php _e( 'Delete plugin data after uninstalling', 'cvmh-simple-slideshow' ); ?>
                    </label>
                </td>
            </tr>
        </table>
        <p class="submit">
            <input id="submit" class="button button-primary" type="submit" value="<?php _e( 'Save changes', 'cvmh-simple-slideshow' ); ?>" name="submit" />
        </p>
    </form>
    
</div><!-- .wrap -->