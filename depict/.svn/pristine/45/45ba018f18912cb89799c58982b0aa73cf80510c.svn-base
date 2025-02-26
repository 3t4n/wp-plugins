<?php
/**
 * Prevent direct access to the file.
 *
 * @since 0.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * TextToMe Options Page
 *
 * Add options page for the plugin.
 *
 * @since 0.1.0
 */
function depict_plugin_page() {

	add_options_page(
		__( 'Depict', 'depict' ),
		__( 'Depict', 'depict' ),
		'manage_options',
		'depict',
		'render_depict_admin_page_ui'
	);

}
add_action( 'admin_menu', 'depict_plugin_page' );

//settings
function depict_settings_init() {

	register_setting(
        'depict-pluginPage',
        'depict_settings'
    );
	add_settings_section(
		'depict_pluginPage_section',
		__( 'Select What to Show in Widget', 'depict' ),
		'depict_settings_section_callback',
		'depict-pluginPage'
	);

	register_setting(
        'depict-pluginPage',
        'depict_widgeter',
        'sanitize_textfield'
    );
    add_option(
        'depict_widgeter',
        '',
        '',
        'yes'
    );
	register_setting(
        'depict-pluginPage',
        'depict_usespage',
        'sanitize_textfield'
    );
    add_option(
        'depict_usespage',
        'no',
        '',
        'yes'
    );
	register_setting(
        'depict-pluginPage',
        'depict_font',
        'sanitize_textfield'
    );
    add_option(
        'depict_font',
        '',
        '',
        'yes'
    );
	register_setting(
        'depict-pluginPage',
        'depict_authorpage',
        'sanitize_textfield'
    );
    add_option(
        'depict_authorpage',
        'true',
        '',
        'yes'
    );
}

function render_depict_admin_page_ui() {


/**
 * get each value from form and post
 */
    $depictPost = $_POST;
        if ( !empty( $depictPost ) ) {
            foreach($depictPost as $vKey => $depictPost) {
            update_option($vKey, $depictPost);
        }
    }
?>
<div class="wrap">
    <h1><div id="icon-options-general" class="dashicons dashicons-dashboard"></div>
	<?php esc_html_e( 'Depict Options Admin Page', 'depict' ); ?></h1>
    <div class="depict-wrap">
        <h3>Depict Plugin Options</h3>
        <form method="post" action="" name="depict_admin_form" id="depict_adminForm">
        <table class="form-table">
        <tr><th><label for="depict_authorpage"><?php esc_html_e(
            'Which Page to Use for Author Page', 'depict' ); ?>
            <span class="text-muted">*</span><br><small><em>
            <?php esc_html_e( 'Select only the page that you inserted depict shortcode into [depict-show-author-page]', 'depict' ); ?></em></small></label></th>
        </tr>

        <tr><td><select name="depict_usespage" id="depictUsespage" >
                <option value="yes"
                        <?php selected( 'yes', get_option(
                        'depict_usespage' )); ?>>
                        Use Full Author Page</option>
                <option value="no"
                        <?php selected( 'no', get_option(
                        'depict_usespage' )); ?>>
                        Use Author Link Only</option>
                </select> <span class="under"><?php echo esc_html( get_option(
                        'depict_usespage' )); ?></span></td>
        </tr>

        <tr><td><select name="depict_authorpage">
                <option value=""><?php esc_attr_e(
                                       'Select page', 'depict' ); ?></option>
        <?php

            $authorpage = get_option( 'depict_authorpage' );
            if($authorpage == "" )
            $authorpage = get_page_link( $page->ID );
            $pages = get_pages();
            foreach ( $pages as $page ) {
                $option = '<option '. get_page_link( $page->ID ) . 'value="';
                $option .= get_page_link( $page->ID ) . '" ';
                $option .= selected( get_page_link( $page->ID ),
                           get_option( 'depict_authorpage' ));
                $option .= ' >';
	            $option .= $page->post_title;
	            $option .= '</option>';
            	echo $option;

            }
        ?></select> <span class="under"><?php echo esc_html( get_option(
                    'depict_authorpage' )); ?></span></td>
        </tr></table>
        <hr>
        <table class="form-table">
        <tr><th><label for="depict_widgeter"><?php esc_html_e(
                            'What to show in Widget', 'depict' ); ?>
                <br><small><em><?php esc_attr_e( 'Select Full Widget to display everything - Select Author Link Only to display avatar and link only.',
                'depict' ); ?></label></th>
        </tr>

        <tr><td><select name="depict_widgeter" id="depictWidgeter" >
                <option value="depict_full"
                        <?php selected( 'depict_full', get_option(
                        'depict_widgeter' )); ?>>
                        Full Widget</option>
                <option value="depict_link"
                        <?php selected( 'depict_link', get_option(
                        'depict_widgeter' )); ?>>
                        Author Link Only</option>
                <option value="depict_custom"
                        <?php selected( 'depict_custom', get_option(
                        'depict_widgeter' )); ?>>
                        Custom View</option>
                </select> <span class="under"><?php echo esc_html( get_option(
                        'depict_widgeter' )); ?></span></td>
        </tr></table>
        <hr>
        <table class="form-table">
        <tr><th><label for="depict_widgeter"><?php esc_html_e( 'Type in name of your font', 'depict' ); ?><br><small><em>
                <?php esc_attr_e( 'You can use &#39;inherit&#39; to utlilize your theme&#39;s default font-family font.', 'depict' ); ?></em></small></label></th>
        </tr>

        <tr><td><input type="text"
                       name="depict_font" id="depictFont"
                       placeholder="default is sans-serif"
                       value="<?php echo esc_attr( get_option(
                                'depict_font' )); ?>" >
                       <span class="under"><?php echo esc_html(
                             get_option( 'depict_font' )); ?></span></td>
        </tr></table>
        <hr>
        <table class="form-table">
        <tr><th><label for="depict_width"><?php esc_attr_e( 'Type in width of your theme sidebar', 'depict' ); ?>**<br><small><em><?php esc_attr_e( 'This will determine the maximum width of the Depict Widget. Only enter a number - attribute will be in pixels px.', 'depict' ); ?>
                </em></small></label></th>
        </tr>

        <tr><td><input type="text"
                       name="depict_width" id="depictWidth"
                       placeholder="default is 300"
                       value="<?php echo esc_attr( get_option(
                                'depict_width' )); ?>" >
                       <span class="under"><?php echo esc_html(
                             get_option( 'depict_width' )); ?></span></td>
        </tr></table>

            <?php // create a nonce field
            wp_nonce_field( 'new_depict_admin_nonce', 'depict_admin_nonce' );
            submit_button(); ?>
        </form>


    <hr>
        <table class="form-table">
            <tr>
                <th><?php esc_html_e( 'Further Instructions', 'depict' ); ?></th>
                <th><?php esc_html_e( 'Donate Link', 'depict' ); ?></th>
            </tr>
            <tr>
            <td><p>*Select which way you want to show Author link in Footer of Depict Widget.</p>
                <p><span style="color:blue;font-style:italic">Use Full Author Page</span> will link to a customized page which is the page you put your shortcode into <code>[depict-show-author-page]</code>.</p>
                <p><span style="color:blue;font-style:italic">Use Author Link Only</span> will use the Theme default author page which is typically an archive template.</p>
                <p>**<?php esc_html_e( 'Use the width control above to regulate how wide your Depict Widget will be. There is no way of predicting which theme you will be using this plugin on so we give you this option to be able to adjust the widget width.', 'depict' ); ?></p>
            </td>
            <td><p>Support can be found on the WordPress Plugins Repository for this plugin. https://wordpress.org/plugins/depict</p>
                <p>If you feel like this plugin really helps your blog or website, then feel free to donate to Tradesouthwest. We are a small development company located in Arizona, USA.</p>
                <p><a href="https://paypal.me/tradesouthwest" class="button button-primary"  title="paypal.me/tradesouthwest" target="_blank">https://paypal.me/tradesouthwest</a></p></td>
            </tr></table>

    </div>
</div>
<?php
}



//display page
function render_depict_admin_page()
{

		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
}
?>
