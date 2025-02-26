<?php

defined( 'ABSPATH' ) || exit;

/**
 * Form Template
 */

// get CodeMirror css themes
foreach( glob( AIDM_CM_DIR.'*.css' ) as $filename ) {
    $themes_list[] = basename( $filename, '.css' );
}

$post_url = admin_url( 'admin-post.php' );

$current_theme_preference = aidm_get_user_admin_ide_theme_preference();

?>
<div class="wrap">
    <div>
        <h1>
            <?php esc_html_e( 'Admin IDE Dark Mode', aidm_get_text_domain() ) ?>
        </h1>

<?php 
    if ( isset( $_GET['message'] ) ) : 

        $css_class = '';
        $message = '';

        switch ( $_GET['message'] ) {
            case 'nonce_error':
            case 'error':
            case 'capabilities-error':
                $css_class = 'notice-error';
                $message = __( 'Something went wrong. Unable to proceed your request.', aidm_get_text_domain() );
                break;
            case 'success':
                $css_class = 'notice-success';
                $message = __( 'Settings saved.', aidm_get_text_domain() );
                break;
        }
?>
        <div class="notice <?php echo esc_attr( $css_class ) ?> is-dismissible">
            <p>
                <strong>
                    <?php echo esc_html( $message ) ?>
                </strong>
            </p>
        </div>
        
<?php endif ?>

    </div>

    <form action="<?php echo esc_url( $post_url ) ?>" method="POST">

        <input type="hidden" name="action" value="<?php echo esc_attr( AIDM_POST_ID ) ?>" />

        <?php wp_nonce_field( AIDM_POST_ID, aidm_get_nonce_id() ); ?>

        <div class="aidm-setting-section aidm-theme-list-container">

            <h2><?php esc_html_e( 'Theme selection', aidm_get_text_domain() ) ?></h2>

            <ul class="aidm-theme-list">
<?php foreach( $themes_list as $theme_name ) : ?>
<?php $is_current_theme = $current_theme_preference == $theme_name ? 'current' : false; ?>
                <li class="aidm-theme-list-item <?php echo esc_attr( $is_current_theme ) ?>">
                    <label class="aidm-theme-name" for="<?php echo esc_attr( $theme_name ) ?>" data-theme-name="<?php echo $theme_name ?>">
                        <?php echo esc_html( $theme_name ) ?>
                    </label>
                    <input type="radio" id="<?php echo esc_attr( $theme_name ) ?>" class="theme-radio" name="theme" value="<?php echo esc_attr( $theme_name ) ?>" required />
                </li>
<?php endforeach ?>
            </ul>

            <textarea id="code-mirror-editor" current-theme="<?php echo esc_attr( $current_theme_preference ) ?>"></textarea>
            <div class="clear-fix"></div>
        </div>

        <input id="submit" class="button button-primary" type="submit" value="<?php esc_html_e( 'Save Changes', aidm_get_text_domain() ) ?>" />

    </form>
    
</div>