<?php
/**
 * This file will create admin menu page.
 */

class WP_MetaText_Create_Admin_Page extends WP_MetaText_Default_Properties {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'create_admin_menu' ] );
        if (
            isset($_GET['page']) && 
            htmlspecialchars($_GET['page']) == 'metaText'
        ) {
            add_filter( 'admin_footer_text', [$this, 'change_footer'] );
        }
    }

    public function change_footer() {
        return <<<EOD
            metaText v$this->ApiVersionFooter -- 
            <i class="meta-text-footer">
              <a target="_blank" href="https://wordpress.org/support/plugin/metaText/reviews/#new-post" title="Rate the plugin">
                Please rate plugin <span>★★★★★</span> to help spread the word. Thanks
              </a>.<br>
            </i>
            <b>For assistance, bugs etc., send message to Developer on <a href="$this->linkdlnProfile" target="_blank">Linkedin</a>.</b>
            <br><b>To get me a beer,</b> Tether Address (TRC20) =>> TW6EM3BTh6MrnxgwHuPV1mjhHaeMeAE8nB
        EOD;
    }

    public function create_admin_menu() {
        $capability = 'manage_options';
        $slug = 'metaText';

        add_menu_page(
            __( 'Meta Text Plugin', 'wp-meta-text' ),
            __( 'Meta Text', 'wp-meta-text' ),
            $capability,
            $slug,
            [ $this, 'menu_page_template' ],
            'dashicons-universal-access-alt'
        );
    }

    public function menu_page_template() {
        echo '<div class="wrap"><div id="wp-meta-text-root"></div></div>';
    }
}

new WP_MetaText_Create_Admin_Page();