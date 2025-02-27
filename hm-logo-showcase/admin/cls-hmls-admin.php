<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
/**
 *	Admin Parent Class
 */
class HMLS_Admin {
    use 
        Hmls_Slide_Content_Settings,
        Hmls_Slide_Template_Settings,
        Hmls_Slide_Style_Settings,
        Hmls_Grid_Content_Settings,
        Hmls_Grid_Style_Settings,
        Hmls_Common
    ;
    private $hmls_version;

    private $hmls_assets_prefix;

    function __construct( $version ) {
        $this->hmls_version = $version;
        $this->hmls_assets_prefix = substr( HMLS_PRFX, 0, -1 ) . '-';
    }

    /**
     *	Flush Rewrite on Plugin initialization
     */
    function hmls_flush_rewrite() {
        if ( get_option( 'hmls_plugin_settings_have_changed' ) == true ) {
            flush_rewrite_rules();
            update_option( 'hmls_plugin_settings_have_changed', false );
        }
    }

    /**
     *	Loading admin menu
     */
    function hmls_admin_menu() {
        $hmls_cpt_menu = 'edit.php?post_type=hmls_logo';
        add_submenu_page(
            $hmls_cpt_menu,
            __( 'Slide Layout Settings', HMLS_TXT_DOMAIN ),
            __( 'Slide Layout Settings', HMLS_TXT_DOMAIN ),
            'manage_options',
            'hmls-slide-settings',
            array($this, HMLS_PRFX . 'slide_settings')
        );
        add_submenu_page(
            $hmls_cpt_menu,
            __( 'Grid Layout Settings', HMLS_TXT_DOMAIN ),
            __( 'Grid Layout Settings', HMLS_TXT_DOMAIN ),
            'manage_options',
            'hmls-grid-settings',
            array($this, HMLS_PRFX . 'grid_settings')
        );
        add_submenu_page(
            $hmls_cpt_menu,
            __( 'Usage & Tutorial', HMLS_TXT_DOMAIN ),
            __( 'Usage & Tutorial', HMLS_TXT_DOMAIN ),
            'manage_options',
            'hmls-get-help',
            array($this, 'hmls_help_usage')
        );
    }

    /**
     *	Loading admin panel assets
     */
    function hmls_enqueue_assets() {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style(
            $this->hmls_assets_prefix . 'font-awesome',
            HMLS_ASSETS . 'css/fontawesome/css/all.min.css',
            array(),
            $this->hmls_version,
            FALSE
        );
        wp_enqueue_style(
            $this->hmls_assets_prefix . 'admin',
            HMLS_ASSETS . 'css/' . $this->hmls_assets_prefix . 'admin.css',
            array(),
            $this->hmls_version,
            FALSE
        );
        if ( !wp_script_is( 'jquery' ) ) {
            wp_enqueue_script( 'jquery' );
        }
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script(
            $this->hmls_assets_prefix . 'admin',
            HMLS_ASSETS . 'js/' . $this->hmls_assets_prefix . 'admin.js',
            array('jquery'),
            $this->hmls_version,
            TRUE
        );
    }

    function hmls_custom_post_type() {
        $labels = array(
            'name'               => __( 'HM Logos', HMLS_TXT_DOMAIN ),
            'singular_name'      => __( 'HM Logos', HMLS_TXT_DOMAIN ),
            'menu_name'          => __( 'HM Logos', HMLS_TXT_DOMAIN ),
            'parent_item_colon'  => __( 'Parent Logo', HMLS_TXT_DOMAIN ),
            'all_items'          => __( 'All Logos', HMLS_TXT_DOMAIN ),
            'view_item'          => __( 'View Logo', HMLS_TXT_DOMAIN ),
            'add_new_item'       => __( 'Add New Logo', HMLS_TXT_DOMAIN ),
            'add_new'            => __( 'Add New Logo', HMLS_TXT_DOMAIN ),
            'edit_item'          => __( 'Edit Logo', HMLS_TXT_DOMAIN ),
            'update_item'        => __( 'Update Logo', HMLS_TXT_DOMAIN ),
            'search_items'       => __( 'Search Logo', HMLS_TXT_DOMAIN ),
            'not_found'          => __( 'Not Found', HMLS_TXT_DOMAIN ),
            'not_found_in_trash' => __( 'Not found in Trash', HMLS_TXT_DOMAIN ),
        );
        $args = array(
            'label'               => __( 'hmls_logo' ),
            'description'         => __( 'Description For Logo', HMLS_TXT_DOMAIN ),
            'labels'              => $labels,
            'supports'            => array(
                'title',
                'editor',
                'thumbnail',
                'page-attributes'
            ),
            'public'              => true,
            'hierarchical'        => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'has_archive'         => false,
            'can_export'          => true,
            'exclude_from_search' => false,
            'yarpp_support'       => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'menu_icon'           => 'dashicons-screenoptions',
        );
        register_post_type( 'hmls_logo', $args );
    }

    function hmls_taxonomy_for_logo() {
        $labels = array(
            'name'              => __( 'Logo Categories', HMLS_TXT_DOMAIN ),
            'singular_name'     => __( 'Logo Category', HMLS_TXT_DOMAIN ),
            'search_items'      => __( 'Search Logo Categories', HMLS_TXT_DOMAIN ),
            'all_items'         => __( 'All Logo Categories', HMLS_TXT_DOMAIN ),
            'parent_item'       => __( 'Parent Logo Category', HMLS_TXT_DOMAIN ),
            'parent_item_colon' => __( 'Parent Logo Category:', HMLS_TXT_DOMAIN ),
            'edit_item'         => __( 'Edit Logo Category', HMLS_TXT_DOMAIN ),
            'update_item'       => __( 'Update Logo Category', HMLS_TXT_DOMAIN ),
            'add_new_item'      => __( 'Add New Logo Category', HMLS_TXT_DOMAIN ),
            'new_item_name'     => __( 'New Logo Category Name', HMLS_TXT_DOMAIN ),
            'menu_name'         => __( 'Logo Categories', HMLS_TXT_DOMAIN ),
        );
        register_taxonomy( 'logo_category', array('hmls_logo'), array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array(
                'slug' => 'logo-category',
            ),
        ) );
    }

    function hmls_metaboxes() {
        add_meta_box(
            'hmls_metaboxes',
            __( 'Logo Information', HMLS_TXT_DOMAIN ),
            array($this, HMLS_PRFX . 'metabox_content'),
            'hmls_logo',
            'normal',
            'high'
        );
        // Changing Featured Image Text
        remove_meta_box( 'postimagediv', 'hmls_logo', 'side' );
        add_meta_box(
            'postimagediv',
            __( 'Logo Image', HMLS_TXT_DOMAIN ),
            'post_thumbnail_meta_box',
            'hmls_logo',
            'side',
            'default'
        );
        add_meta_box(
            'hmls-logo-image-url',
            __( 'Logo Image Url', HMLS_TXT_DOMAIN ),
            array($this, 'hmls_image_url_content'),
            'hmls_logo',
            'side',
            'default'
        );
    }

    function hmls_change_featured_image_link_text( $content ) {
        if ( 'hmls_logo' === get_post_type() ) {
            $content = str_replace( 'Set featured image', __( 'Set Logo Image Here', HMLS_TXT_DOMAIN ), $content );
            $content = str_replace( 'Remove featured image', __( 'Remove Logo Image Here', HMLS_TXT_DOMAIN ), $content );
        }
        return $content;
    }

    function hmls_metabox_content() {
        global $post;
        wp_nonce_field( basename( __FILE__ ), 'hmls_fields' );
        $hmls_logo_url = get_post_meta( $post->ID, 'hmls_logo_url', true );
        $hmls_status = get_post_meta( $post->ID, 'hmls_status', true );
        $hmls_img_url = get_post_meta( $post->ID, 'hmls_img_url', true );
        ?>
		<table class="form-table">
			<tr class="hmls_logo_url">
				<th scope="row">
					<label for="hmls_logo_url"><?php 
        _e( 'Logo Url', HMLS_TXT_DOMAIN );
        ?> :</label>
				</th>
				<td>
					<input type="text" name="hmls_logo_url" value="<?php 
        echo esc_attr( $hmls_logo_url );
        ?>" placeholder="<?php 
        esc_attr_e( 'e.g: http://hmplugin.com', HMLS_TXT_DOMAIN );
        ?>" class="regular-text ltr">
				</td>
			</tr>
			<tr class="hmls_status">
				<th scope="row">
					<label><?php 
        _e( 'Status', HMLS_TXT_DOMAIN );
        ?> :</label>
				</th>
				<td>
					<input type="radio" name="hmls_status" id="hmls_status_active" value="active" <?php 
        echo ( 'inactive' !== $hmls_status ? 'checked' : '' );
        ?> >
					<label for="hmls_status_active"><span></span><?php 
        _e( 'Active', HMLS_TXT_DOMAIN );
        ?></label>
						&nbsp;&nbsp;
					<input type="radio" name="hmls_status" id="hmls_status_inactive" value="inactive" <?php 
        echo ( 'inactive' === $hmls_status ? 'checked' : '' );
        ?> >
					<label for="hmls_status_inactive"><span></span><?php 
        _e( 'Inactive', HMLS_TXT_DOMAIN );
        ?></label>
				</td>
			</tr>
		</table>
		<?php 
    }

    function hmls_image_url_content() {
        global $post;
        if ( hls_fs()->is_not_paying() ) {
            ?>
			<span><?php 
            echo '<a href="' . hls_fs()->get_upgrade_url() . '">' . __( 'Please Upgrade Now!', HMLS_TXT_DOMAIN ) . '</a>';
            ?></span>
			<?php 
        }
    }

    /**
     * Save the metabox data
     */
    function hmls_save_meta_value( $post_id ) {
        global $post;
        if ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }
        if ( !isset( $_POST['hmls_status'] ) || !wp_verify_nonce( $_POST['hmls_fields'], basename( __FILE__ ) ) ) {
            return $post_id;
        }
        $hmls_meta['hmls_logo_url'] = ( isset( $_POST['hmls_logo_url'] ) ? sanitize_text_field( $_POST['hmls_logo_url'] ) : '' );
        $hmls_meta['hmls_status'] = ( isset( $_POST['hmls_status'] ) ? sanitize_text_field( $_POST['hmls_status'] ) : '' );
        $hmls_meta['hmls_img_url'] = ( isset( $_POST['hmls_img_url'] ) ? sanitize_text_field( $_POST['hmls_img_url'] ) : '' );
        foreach ( $hmls_meta as $key => $value ) {
            if ( 'revision' === $post->post_type ) {
                return;
            }
            if ( get_post_meta( $post_id, $key, false ) ) {
                update_post_meta( $post_id, $key, $value );
            } else {
                add_post_meta( $post_id, $key, $value );
            }
            if ( !$value ) {
                delete_post_meta( $post_id, $key );
            }
        }
    }

    function hmls_slide_settings() {
        if ( !current_user_can( 'manage_options' ) ) {
            return;
        }
        $tab = ( isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null );
        $hmlsSlideMessage = false;
        if ( isset( $_POST['updateSlideContent'] ) ) {
            $hmlsSlideMessage = $this->set_slide_content_settings( $_POST );
        }
        if ( isset( $_POST['updateSlideTemplate'] ) ) {
            $hmlsSlideMessage = $this->set_slide_template_settings( $_POST );
        }
        if ( isset( $_POST['updateSlideStyles'] ) ) {
            $hmlsSlideMessage = $this->set_slide_style_settings( $_POST );
        }
        $hmlsSlideContentSettings = $this->get_slide_content_settings();
        $hmlsSlideTemplate = $this->get_slide_template_settings();
        $hmlsSlideStylesSettings = $this->get_slide_styles_settings();
        require_once HMLS_PATH . 'admin/view/slide.php';
    }

    function hmls_grid_settings() {
        if ( !current_user_can( 'manage_options' ) ) {
            return;
        }
        $tab = ( isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null );
        $hmlsGridMessage = false;
        if ( isset( $_POST['updateGridContent'] ) ) {
            $hmlsGridMessage = $this->set_grid_content_settings( $_POST );
        }
        if ( isset( $_POST['updateGridStyles'] ) ) {
            $hmlsGridMessage = $this->set_grid_style_settings( $_POST );
        }
        $hmlsGridContentSettings = $this->get_grid_content_settings();
        $hmlsGridStyleSettings = $this->get_grid_style_settings();
        require_once HMLS_PATH . 'admin/view/grid.php';
    }

    function hmls_help_usage() {
        ?>
		<div class="hmls-wrap" style="padding-top:20px;">
			<div class="hmls_personal_wrap hmls_personal_help" style="width: 76%; float: left; text-align: center;">
				<h1>HM Logo Showcase Video Tutorial</h1>
				<div class="help-link">
				<iframe width="800" height="450" src="https://www.youtube.com/embed/oO8YI6dKZns" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
				</div>
			</div>
			<?php 
        $this->hmls_admin_sidebar();
        ?>   
		</div>
		<?php 
    }

    function hmls_display_notification( $type, $msg ) {
        ?>
		<div class="hmls-alert <?php 
        esc_attr_e( $type );
        ?>">
			<span class="hmls-closebtn">&times;</span>
			<strong><?php 
        esc_html_e( ucfirst( $type ) );
        ?>!</strong>
			<?php 
        esc_html_e( $msg );
        ?>
		</div>
		<?php 
    }

}
