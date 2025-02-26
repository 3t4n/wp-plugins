<?php
/** Master init.php for plugin agenda-gutenberg */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

// THEME SUPPORT
add_theme_support( 'pop-up-banner' );
add_image_size( 'post-small', 200, 200 );
add_image_size( 'post-medium', 450, 450 );
add_image_size( 'post-mlarge', 600, 600 );
add_image_size( 'post-large', 800, 800 );
add_image_size( 'post-xlarge', 1100, 1100 );

if(!function_exists('agendahelsinki_editor_add_block_category')){
    function agendahelsinki_editor_add_block_category( $categories, $post ) {
        write_log($categories);

        $block_categories = array_unique(array_merge(
            [[
              'slug' => 'agendahelsinki',
              'title' => __( 'Agenda Helsinki', 'agendahelsinki' ),
            ]],
            $categories,
          ), SORT_REGULAR);
          write_log($block_categories);
      return $block_categories;
    }
    // add_filter( 'block_categories', 'agendahelsinki_editor_add_block_category', 10, 2);
}

//ENQUEUE AND LOCALIZE EDITOR ASSETS
function agendahelsinki_gutenberg_cgb_editor_assets() { // phpcs:ignore
    wp_register_script('agenda_gutenberg-cgb-block-js',
        plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
        array( 'wp-plugins', 'wp-edit-post', 'wp-blocks', 'wp-i18n', 
        'wp-element', 'wp-editor', 'jquery', 'lodash' ),
        date('omdHis'),true
    );
    wp_enqueue_script('agenda_gutenberg-cgb-block-js');

    // SET DEFAULT VALUE FOR PLAINMODE AND SAVE IT TO DB IF OPTION IS UNSET
    if(get_option('agendahelsinki_editor_settings_options')===false){
        $newval = array('plainmode'=>true);
        update_option( 'agendahelsinki_editor_settings_options', array('plainmode'=>true));
        $options = $newval;
    }
    else $options = get_option( 'agendahelsinki_editor_settings_options' );

    // ALWAYS LOAD BARE MINIMUM GRID CSS
    
    wp_register_style(
        'agenda_gutenberg-cgb-block-plainmode-css',
        plugins_url( 'dist/blocks.editor.plain.css', dirname( __FILE__ ) ),
        array( 'wp-edit-blocks' ), date('omdHis')
    );
    wp_enqueue_style('agenda_gutenberg-cgb-block-plainmode-css');
    

    $plainmode = is_array($options)&&isset($options['plainmode']) ? $options['plainmode'] : false;
    /*
    if(!$plainmode){
        wp_enqueue_style(
            'agenda_gutenberg-cgb-block-editor-css',
            plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
            array( 'wp-edit-blocks' ), date('omdHis')
        );
    }
    */

    // ROBOTO FONT
    wp_enqueue_style( 'google-roboto-font', 
    'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,400&display=swap', false ); 

    // MAKE SURE WP-BLOCK INSIDE FLEXBOX IS FULL WIDTH
    echo '<style>.block-editor-block-list__layout,.block-editor-inner-blocks{display:flex;width:100%;flex-basis:100%;flex-flow:row wrap;align-items:flex-start;}.block-editor-block-list__layout > * {width:100%;flex-basis:100%;max-width:100%;}'.
    '.block-editor-block-list__layout > .wp-block:not([data-type="bootstrap/bsblock"]):not([data-type="agendahelsinki/tailwindblock"]){width:100%;flex-basis:100%;max-width:100% !important;}body,div,h1,h2,h3,h4,h5,h6,p,span,strong{font-family:Roboto,sans-serif;}'.
    '.block-editor-block-list__block:not([data-type="bootstrap/bsblock"]):not([data-type="agendahelsinki/tailwindblock"]){margin-top:0 !important;margin-bottom:5px !important;}'.
    '.wp-block[data-align=left], .wp-block[data-align=right] {height:auto !important;}.grid-block.col-12{max-width:100% !important;flex-basis:100% !important;}'.
    '.wp-block.row{margin-left:0;margin-right:0;}.block-editor-inner-blocks > .block-editor-block-list__layout {padding-left:1rem;padding-right:1rem;}'.
    '.tailwind-sidebar .components-panel__body-toggle.components-button{text-align:center;display:block;width:100%;}</style>';
}
add_action( 'enqueue_block_editor_assets', 'agendahelsinki_gutenberg_cgb_editor_assets' );

// ENQUEUE FRONT JS + CSS
function agendahelsinki_gutenberg_frontend_assets() {
    // CSS
    wp_enqueue_style('agenda_gutenberg-cgb-style-css',
    plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
    array(), date('omdHis'));
    // JS
    wp_enqueue_script( 'agenda-gutenberg-scripts', 
    plugins_url( '/dist/front.dist.js', dirname( __FILE__ ) ),
    array('jquery'), date('omdHis'), true );
}
add_action( 'wp_enqueue_scripts', 'agendahelsinki_gutenberg_frontend_assets', 200 );

//ADD ASYNC="ASYNC" TO AGENDA-GUTENBERG FRONT JS
function agendahelsinki_add_async_attribute_plugin($tag, $handle) {
    if ( 'agenda-gutenberg-scripts' !== $handle ) return $tag;
    return str_replace( ' src', ' async="async" defer="defer" src', $tag );
}
add_filter('script_loader_tag', 'agendahelsinki_add_async_attribute_plugin', 10, 2);


// DISABLE "POWERED WITH" TEXT
add_filter( 'admin_footer_text', '__return_empty_string', 11);
add_filter( 'update_footer', '__return_empty_string', 11 );


/** DISABLE EMOJIS */
function agendahelsinki_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );	
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'agendahelsinki_disable_emojis' );
/** End of DISABLE EMOJIS */

// LOGIN.PHP Cleanup (?)
function agendahelsinki_remove_admin_login_header_plugin() {remove_action('wp_head', '_admin_bar_bump_cb');}
add_action('get_header', 'agendahelsinki_remove_admin_login_header_plugin');

// ENFORCE NEW FULLSCREEN (WP5.4)
function agendahelsinki_se337302_fullscreen_editor() {
    $js_code = "jQuery(document).ready(function(){" .
            "   var isFullScreenMode = wp.data.select('core/edit-post').isFeatureActive('fullscreenMode');" .
            "   if ( !isFullScreenMode )" .
            "       wp.data.dispatch('core/edit-post').toggleFeature('fullscreenMode');" .
            "});";
    wp_add_inline_script( 'wp-blocks', $js_code );
}
add_action( 'enqueue_block_editor_assets', 'agendahelsinki_se337302_fullscreen_editor' );

// ADD COMMON BLOCK CATEGORY
function agendahelsinki_add_common_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'common',
				'title' => __( 'Common', 'common' ),
			),
		)
	);
}
add_filter( 'block_categories', 'agendahelsinki_add_common_category', 10, 2);

// ADD SUPPORT FOR FULL WIDTH BLOCKS
add_theme_support('align-wide');

// ADD SETTINGS PAGE
if(!function_exists('agendahelsinki_editor_add_settings_page')&&!function_exists('agendahelsinki_editor_render_settings_page')&&
!function_exists('agendahelsinki_editor_register_settings')){
    // RENDER SETTINGS PAGE
    function agendahelsinki_editor_render_settings_page(){
        ?>
        <h2 class="display-4" style="display:block;font-size:28px;margin-bottom:50px;margin-top:50px;font-weight:300;letter-spacing:0.01;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',
        Roboto,'Helvetica Neue',Arial,'Noto Sans',sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';">Agenda Editor Settings</h2>
        <form action="options.php" method="post" style="display:block;width:300px;border:1px solid #000;padding:20px;">
            <?php 
            settings_fields( 'agendahelsinki_editor_settings_options' );
            do_settings_sections( 'agendahelsinki_editor_settings' ); ?>
            <input name="submit" class="button button-primary" type="submit" style="margin-top:20px;margin-bottom:20px;background-color:#eee;border:1px solid #000;border-radius:4px;color:#000;" 
            value="<?php esc_attr_e( 'Save' ); ?>" />
        </form>
        <?php
    }
    // ADD SETTINGS PAGE
    function agendahelsinki_editor_add_settings_page() {
        add_options_page( 'Agenda Editor Settings', 'Agenda Editor Settings', 'manage_options', 'agenda-editor-settings', 'agendahelsinki_editor_render_settings_page' );
    }
    // REGISTER FIELDS
    function agendahelsinki_editor_register_settings() {
        register_setting( 'agendahelsinki_editor_settings_options', 'agendahelsinki_editor_settings_options', 'agendahelsinki_editor_settings_options_validate' );
        add_settings_section( 'plainmode', 'Plain Mode', 'agendahelsinki_editor_setting_section_text', 'agendahelsinki_editor_settings' );
        add_settings_field( 'agendahelsinki_editor_setting_plainmode', 'Plain Mode (No editor css)', 'agendahelsinki_editor_setting_plainmode', 'agendahelsinki_editor_settings', 'plainmode');
    }
    // VALIDATION
    function agendahelsinki_editor_settings_options_validate( $input ) {
        $plainmode = $input['plainmode']&&$input['plainmode']==='on'?true:false;
        $newinput['plainmode'] = $plainmode;
        return $newinput;
    }
    // SECTION LABEL
    function agendahelsinki_editor_setting_section_text() {
        echo '<p></p>';
    }
    // INPUT
    function agendahelsinki_editor_setting_plainmode() {
        $options = get_option( 'agendahelsinki_editor_settings_options' );
        $plainmode = is_array($options)&&isset($options['plainmode']) ? $options['plainmode'] : false;
        $checked = $plainmode ? ' checked ' : '';
        echo "<input id='agendahelsinki_editor_setting_plainmode' name='agendahelsinki_editor_settings_options[plainmode]' type='checkbox' ".$checked." />";
    }
    add_action( 'admin_menu', 'agendahelsinki_editor_add_settings_page' );
    add_action( 'admin_init', 'agendahelsinki_editor_register_settings' );
}