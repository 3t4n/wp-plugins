<?php
/**
 * Plugin Name:       Gutenberg Editor Full Width Blocks Border
 * Description:       This plugin adds borders and hover effects to all blocks in the Gutenberg Editor for easier navigation.
 * Version:           1.1.1
 * Author:            Rahul Kanojia
 * Author URI:        https://rahulkanojia.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       editorblocksborder
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

function gebb_activate() {
    if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
        include_once( ABSPATH . '/wp-admin/includes/plugin.php' );
    }
    if ( current_user_can( 'activate_plugins' ) && function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) {
        deactivate_plugins( plugin_basename( __FILE__ ) );
        $error_message = esc_html( '<p>Needs Gutenberg Installed and Activated</p>' );
        die( $error_message );
    }
    $args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'any',
        'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    foreach($posts_array as $post_array)
    {
        $gebbactivate = sanitize_text_field( 'gebb_activate' );
        update_post_meta($post_array->ID, 'gebb_id', $gebbactivate);
    }
}
register_activation_hook( __FILE__, 'gebb_activate' );

/** Check if a user is on a new page or existing page */
function gebb_is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;
    if($new_edit == "edit"){
        return in_array( $pagenow, array( 'post.php',  ) );
    }elseif($new_edit == "new"){
        return in_array( $pagenow, array( 'post-new.php' ) );
    }else{ 
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
    }
}

/** if on a new page, enable borders by default */
if (gebb_is_edit_page('new')){
    add_action( 'admin_footer', 'gebb_on_add_new_page_post' );
}

function gebb_on_add_new_page_post(){
    wp_enqueue_style('gebb-handle', plugin_dir_url( __FILE__ ).'/css/editor-blocks-border.css');
?>
    <script type="text/javascript">
        document.getElementById('gebbBorders').setAttribute('checked','checked')
    </script> 
<?php }

/** Check if on gutenberg page  */
function gebb_is_gutenberg_editor() {
    if( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ) { 
        return true;
    }   

    $current_screen = get_current_screen();
    if ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) {
        return true;
    }   
    return false;
}
/** Add checkbox on admin sidebar of page */
add_action( 'admin_head', 'gebb_gutenberg_editor_action' );
function gebb_gutenberg_editor_action() {
    if( gebb_is_gutenberg_editor() ) {
        global $post;
        add_meta_box("checkbox", __("Gutenberg Editor Borders"), "gebb_checkbox", $post->post_type, "side", "high");
    }
}
?>
<?php
/** Logic */
function gebb_checkbox(){
    global $post;
    $custom = get_post_custom(get_the_ID()); ?>
	<?php $field_id_value = get_post_meta($post->ID, 'gebb_id', true); ?>
    <?php if($field_id_value == "gebb_activate") {
        $field_id_checked = 'checked';
        wp_enqueue_style('gebb-handle', plugin_dir_url( __FILE__ ).'/css/editor-blocks-border.css'); 
    } else {
        $field_id_checked = 'unchecked';
    } ?>
    <input onclick="checkActive()" id="gebbBorders" type="checkbox" name="gebb_id" value="gebb_activate" <?php echo esc_attr( $field_id_checked ); ?> />
    <label>Activate Borders</label>
    <script type="text/javascript">
        function checkActive()
        {
            if (document.getElementById('gebbBorders').checked == false) {
                if(document.getElementById("gebb-handle-css")){
                    document.getElementById("gebb-handle-css").disabled = true;
                }
            }
            if (document.getElementById('gebbBorders').checked==true) 
            {
                if(document.getElementById("gebb-handle-css")){
                    document.getElementById("gebb-handle-css").removeAttribute("disabled");
                }else{
                    var link = document.createElement('link');
                    link.href = '<?php echo esc_url( plugin_dir_url( __FILE__ ).'/css/editor-blocks-border.css'); ?>';
                    link.id = 'gebb-handle-css';
                    link.rel = 'stylesheet';
                    link.type = 'text/css';
                    document.body.appendChild(link);
                }
            } else{
                if(document.getElementById("gebb-handle-css")){
                    document.getElementById("gebb-handle-css").disabled = true;
                }
            }
        }
    </script>
<?php } ?>
<?php 
// Save Meta Details
add_action('save_post', 'gebb_save_details');
function gebb_save_details(){
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post->ID;
    }
    if(get_the_ID()){
        $gebbid = sanitize_text_field( $_POST['gebb_id'] );
        update_post_meta(get_the_ID(), "gebb_id", $gebbid);
    }
}
?>