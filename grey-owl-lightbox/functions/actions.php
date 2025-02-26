<?php
add_action( 'gol_page_start', 'gol_page_fields_list_start', 10 );
function gol_page_fields_list_start(){
    ?>
    <div class="page-fields-settin-list-wrapper">
        <div class="setting-container">
    <?php
}
add_action( 'gol_page_header', 'gol_setting_page_title', 10 );
function gol_setting_page_title(){
    ?>
    <div class="title-wrapper">
        <div class="main-title-box">
            <h1 class="main-title">
                <span class="goi-grey-owl"></span>
                Grey Owl lightbox
                <span class="version-text">(ver <?php echo GOL_VER; ?>)</span>
            </h1>
        </div>
    </div>
    <?php
}
add_action( 'gol_page_documentation', 'gol_element_attributes_section', 10 );
function gol_element_attributes_section(){
    ?>
    <section class="">
        <h2 class="section-title">jQuery events</h2>
        <table class="documentation-tbl">

            <?php
            include 'documentation/image-lightbox.php';
            include 'documentation/gallery-lightbox.php';
            include 'documentation/video-lightbox.php';
            include 'documentation/element-from-dom.php';
            include 'documentation/iframe-from-dom.php';
            include 'documentation/callback-ajax-lightbox.php';
            include 'documentation/change-content-in-lightbox.php';
            ?>

            <tr>
                <td class="event-name">GreyOwlLightbox( 'close' );</td>
                <td class="description">
                    <?php esc_html_e('close the (open) lightbox', 'greyowl'); ?>
                </td>
            </tr>
        </table>
    </section>
    <?php
}
add_action( 'gol_page_documentation', 'gol_jquery_event_section', 15 );
function gol_jquery_event_section(){
    ?>
    <section class="">
        <h2 class="section-title"><?php esc_html_e('Element attributes', 'greyowl'); ?></h2>
        <?php /*
        <p class="after-title-p">
            <a href="#" class="link-to-tutorial" target="_blank"><?php esc_html_e('view example video in YouTube', 'greyowl'); ?></a>
        </p>
        */ ?>
        <table class="documentation-tbl">

            <?php
            include 'documentation/element-attributes.php';
            ?>

        </table>
    </section>
    <?php
}
add_action( 'gol_page_header', 'gol_setting_tabs_nav_page', 10 );
function gol_setting_tabs_nav_page(){
    $links_array = gol_get_page_links_array();
    $current = ( isset( $_GET['part'] ) && $_GET['part'] ) ? $_GET['part'] : 'settings';
    $current = ( array_key_exists( $current, $links_array ) ) ? $current : 'settings';
    ?>
    <div class="nav-tabs-wrapper">
        <nav class="tabs-nav-wrapp">
            <ul class="tabs-nav clear-block">
                <?php foreach ( $links_array as $key => $value ): ?>
                    <?php $current_class = ( $current == $key ) ? ' current' : ''; ?>
                    <li class="item-nav">
                        <a href="<?php echo $value['url']; ?>" class="link-btn<?php echo $current_class; ?>" title="<?php echo $value['name']; ?>" aria-label="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <?php
}
add_action( 'gol_page_setting', 'gol_field_blocks_start', 10 );
function gol_field_blocks_start(){
    $page_url = gol_get_page_links_array();
    ?>
    <div class="setting-blocks-wrapper">
        <div class="setting-blocks clear-block">
            <form class="setting-blocks-form" action="<?php echo $page_url['settings']['url']; ?>" method="post">
    <?php
    if ( function_exists('wp_nonce_field') ) {
        wp_nonce_field('grey_owl_lightbox_setup_form');
    }
}
add_action( 'gol_page_setting', 'gol_save_button_submit_before', 15 );
function gol_save_button_submit_before(){
    /* if( gol_is_settings_page() ): ?>
        <div class="field-column-12">
            <button class="preview-lightbox" go-lightbox data-go-image="<?php echo plugins_url( 'grey-owl-lightbox/images/grey_owl_demo_page.jpg' ); ?>" type="button" title="<?php esc_html_e('preview lightbox', 'greyowl'); ?>" aria-label="<?php esc_html_e('preview lightbox', 'greyowl'); ?>">
                <span class="icon-box"><span class="goi-grey-owl"></span></span>
                <span class="text"><?php esc_html_e('preview lightbox', 'greyowl'); ?></span>
            </button>
            <p><?php esc_html_e('You can see the changes after saving the parameters.', 'greyowl'); ?></p>
            <p><span class="caution-m"><span class="goi-attention-filled"></span></span><?php esc_html_e('changes in the CSS file you can see only on the site', 'greyowl'); ?></p>
        </div>
    <?php endif; */ ?>
    <div class="block-wrapper">
        <div class="field-column-12">
            <input type="submit" class="button-primary" name="gol_submit_form" value="<?php esc_html_e('Save options', 'greyowl'); ?>">
        </div>
    </div>
    <?php
}
add_action( 'gol_page_setting', 'gol_page_fields_content', 20 );
function gol_page_fields_content(){
    $field_list = GreyOwllightboxOBJ::get_fields_list();
    if ( is_array( $field_list ) && $field_list ) {
        foreach ( $field_list as $rows ): ?>
        <div class="block-wrapper">
            <?php if( ( isset( $rows['row_title'] ) && $rows['row_title'] ) || ( isset( $rows['row_subtitle'] ) && $rows['row_subtitle'] ) ):
                $classes = array('label-title-row');
                if( isset( $rows['row_type'] ) && $rows['row_type'] == 'main' ){
                    $classes[] = 'main-row';
                } ?>
                <div class="<?php echo implode( ' ', $classes ); ?>">
            <?php endif; ?>
            <?php if( isset( $rows['row_title'] ) && $rows['row_title'] ): ?>
                <div class="label-row">
                    <?php if( isset( $rows['icon'] ) && $rows['icon'] ): ?>
                        <span class="icon-box"><?php echo $rows['icon']; ?></span>
                    <?php endif; ?>
                    <h2 class="label-title">
                        <?php echo $rows['row_title']; ?>
                    </h2>
                </div>
            <?php endif; ?>
            <?php if( isset( $rows['row_subtitle'] ) && $rows['row_subtitle'] ): ?>
                <div class="label-subtitle-row">
                    <h3 class="label-subtitle">
                        <?php echo $rows['row_subtitle']; ?>
                    </h3>
                </div>
            <?php endif; ?>
            <?php if( ( isset( $rows['row_title'] ) && $rows['row_title'] ) || ( isset( $rows['row_subtitle'] ) && $rows['row_subtitle'] ) ): ?>
                </div>
            <?php endif; ?>
            <?php if( $rows['row'] ): ?>
                <div class="fields-row">
                    <?php foreach ( $rows['row'] as $field ){
                        gol_field_type( $field );
                    } ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endforeach;
    }
}
//add_action( 'gol_page_setting', 'gol_save_field_input_padding_box', 30 );
function gol_save_field_input_padding_box(){
    ?>
    <div class="fields-row">
        <div class="field-column-3">
            <label for="">
                <span class="label-text">
                    <?php esc_html_e('Box padding top', 'greyowl'); ?>
                </span>
                <div class="input-wrapper">
                    <input id="" type="number" class="" data-alpha="true" name="gol_box_padding_top" value="">
                </div>
            </label>
        </div>
        <div class="field-column-3">
            <label for="">
                <span class="label-text">
                    <?php esc_html_e('Box padding right', 'greyowl'); ?>
                </span>
                <div class="input-wrapper">
                    <input id="" type="number" class="" data-alpha="true" name="gol_box_padding_right" value="">
                </div>
            </label>
        </div>
        <div class="field-column-3">
            <label for="">
                <span class="label-text">
                    <?php esc_html_e('Box padding bottom', 'greyowl'); ?>
                </span>
                <div class="input-wrapper">
                    <input id="" type="number" class="" data-alpha="true" name="gol_box_padding_bottom" value="">
                </div>
            </label>
        </div>
        <div class="field-column-3">
            <label for="">
                <span class="label-text">
                    <?php esc_html_e('Box padding left', 'greyowl'); ?>
                </span>
                <div class="input-wrapper">
                    <input id="" type="number" class="" data-alpha="true" name="gol_box_padding_left" value="">
                </div>
            </label>
        </div>
    </div>
    <?php
}
add_action( 'gol_page_shortcode', 'shortcode_generate_block' );
function shortcode_generate_block(){
    ?>
    <div class="generate-form-data-wrapper trigger-shortcode-generator">
        <div class="create-shortcode-block">
            <h2 class="shortcode-block-title">
                <?php esc_html_e('Video shortcode', 'greyowl'); ?>
            </h2>
            <div class="shortcode-link-wrapper">
                <p class="p-text">[gol_button
                    <span class="data-type" data-name="shortcode_data_type"></span>
                    <span class="data-class" data-name="shortcode_data_class"></span>
                    <span class="data-video-url" data-name="shortcode_data_video_url"></span>
                    <span class="data-video-width" data-name="shortcode_data_video_width"></span>
                    <span class="data-button-title" data-name="shortcode_data_title"></span>
                    <span class="data-button-text" data-name="shortcode_data_text"></span>
                    ]</p>
            </div>
            <div class="generate-form-data clear-block">
                <div class="item-field field-url float-towards">
                    <label for="shortcode-data-video-url">
                        <span class="label-text">
                            <?php esc_html_e('video url', 'greyowl'); ?>
                        </span>
                        <input id="shortcode-data-video-url" class="shortcode-data-video-url" type="text" name="shortcode_data_video_url" value="">
                    </label>
                </div>
                <div class="item-field field-width float-towards">
                    <label for="shortcode-data-video-width">
                        <span class="label-text">
                            <?php esc_html_e('video width', 'greyowl'); ?>
                        </span>
                        <input id="shortcode-data-video-width" class="shortcode-data-video-width" type="number" name="shortcode_data_video_width" value="" placeholder="default video width 960">
                    </label>
                </div>
                <div class="item-field field-type float-towards">
                    <label for="shortcode-data-type">
                        <span class="label-text">
                            <?php esc_html_e('button type', 'greyowl'); ?>
                        </span>
                        <select id="shortcode-data-type" class="shortcode-data-type" name="shortcode_data_type">
                            <option value="button">button</option>
                            <option value="link">link</option>
                        </select>
                    </label>
                </div>
                <div class="item-field field-text float-towards">
                    <label for="shortcode-data-text">
                        <span class="label-text">
                            <?php esc_html_e('link text or buttons', 'greyowl'); ?>
                        </span>
                        <input id="shortcode-data-text" class="shortcode-data-text" type="text" name="shortcode_data_text" value="">
                    </label>
                </div>
                <div class="item-field field-title float-towards">
                    <label for="shortcode-data-title">
                        <span class="label-text">
                            <?php esc_html_e('title and aria-label attributes', 'greyowl'); ?>
                        </span>
                        <input id="shortcode-data-title" class="shortcode-data-title" type="text" name="shortcode_data_title" value="">
                    </label>
                </div>
                <div class="item-field field-class float-towards">
                    <label for="shortcode-data-class">
                        <span class="label-text">
                            <?php esc_html_e('class', 'greyowl'); ?>
                        </span>
                        <input id="shortcode-data-class" class="shortcode-data-class" type="text" name="shortcode_data_class" value="">
                    </label>
                </div>
            </div>
        </div>
    </div>
    <?php
}
add_action( 'gol_page_setting', 'gol_save_button_submit_after', 140 );
function gol_save_button_submit_after(){
    ?>
    <div class="block-wrapper">
        <div class="field-column-12">
            <input type="submit" class="button-primary" name="gol_submit_form" value="<?php esc_html_e('Save options', 'greyowl'); ?>">
        </div>
    </div>
    <?php
}
add_action( 'gol_page_setting', 'gol_preview_lightbox_block', 140 );
function gol_preview_lightbox_block(){
    require_once GOL_MAIN_DIR . 'inc/lightbox.php';
}
add_action( 'gol_page_setting', 'gol_field_blocks_end', 145 );
function gol_field_blocks_end(){
    ?>
            </form>
        </div>
    </div>
    <?php
}
add_action( 'gol_page_end', 'gol_page_fields_list_end', 15 );
function gol_page_fields_list_end(){
    ?>
        </div>
    </div>
    <?php
}
