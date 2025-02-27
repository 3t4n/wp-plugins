<?php
/* 
Plugin Name: Custom Posts Order
Plugin URI: https://wordpress.org/plugins/custom-posts-order/
Description: Allows you to order the posts with simple Drag and Drop Sortable capability.
Version: 4.4
Author: Hiren Patel, hikebranding
Author URI: https://hikebranding.com
License: GPLv2 or later
*/

//-------------------Connection -----------------------------
global $wpdb; 
include_once('addpostsection.php');

/*========================================================
                on plugin activation
========================================================*/  
register_activation_hook(__FILE__,'cpo_post_order');
function cpo_post_order(){  /* Function to add option name in wp_options table */
    add_option("porder_name");
}

/*========================================================
        Add settings link on plugin page
========================================================*/
function cpo_post_order_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=addpostsection">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'cpo_post_order_settings_link' );

/*========================================================
                on plugin uninstall
========================================================*/  
register_uninstall_hook(__FILE__,'cpo_post_uninstall');
function cpo_post_uninstall(){
    delete_option('postsdetails');
}

/*========================================================
                plugin custom js
========================================================*/ 
add_action( 'admin_enqueue_scripts', 'cpo_custom_order_scripts' );
function cpo_custom_order_scripts() { /*  Proper way to enqueue scripts and styles  */
    wp_enqueue_style( 'cpo_style', plugin_dir_url(__FILE__). 'css/cpo_style.css' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'orderposts', plugin_dir_url(__FILE__). 'js/orderposts.js', array(), true );
}

/*========================================================
                plugin custom css
========================================================*/ 
add_action( 'wp_enqueue_scripts', 'cpo_custom_display_style' );
function cpo_custom_display_style() {
    wp_enqueue_style( 'custompostdisplay', plugin_dir_url(__FILE__). 'css/custompostdisplay.css' );
}


/*========================================================
        plugin Front end view using shortcode
========================================================*/
add_filter('widget_text', 'do_shortcode');
add_shortcode('posts_order','cpo_posts_listing');

function cpo_posts_listing($atts){ /* Front-End Display*/
    global $wpdb;
    if(empty($atts['porder'])){
        $all_sections=get_option('porder_name');
        $all_sections =explode(',', $all_sections);
        $atts['porder']=$all_sections[0];
    }
    $options=get_option('porder_name_'.$atts['section']);
    $post_id = explode(",", $options);
    if($atts['posts']==""){
        $atts['posts']=5; 
    }
    $plugin_content = '<div class="postsinfo">';
    $name = $atts['section'];
    if (!is_admin()) {
        if(in_array($name, $all_sections)){ 
?>
            <h4> Section Name: <?php echo esc_html($name); ?> </h4>
<?php 
            $count=0;
            for($i=0;$i<count($post_id);$i++)
            {
                $count++;
                $post_info = get_post($post_id[$i]);
                $plugin_content = $plugin_content;
?>
                <div class="postlist">
                        <div class="posttitle">
                                <?php if (has_post_thumbnail( $post_info->ID ) ): ?>
                        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post_info->ID, 'thumbnail') ); ?>
                                <img src="<?php echo $url ?>" height="200" width="200" /><br/>
                        <?php endif; ?>
                <a href="<?php echo esc_url(get_permalink($post_info->ID));?>"><?php echo esc_html($post_info->post_title);?></a><br/>
                <?php $content=$post_info->post_content;echo substr($content, 0, 100);?>  ...
                        </div>
                </div>
<?php
                if($atts['posts']==$count) break;
            }
            $plugin_content = $plugin_content.'</div>'; /*Post info ends */
            return "{$plugin_content}";
        }
        else{
            echo '<div>'.$name.' section is NOT available in this custom post order listing.</div>';
        }
        
    }                
}


/*========================================================
        plugin menu added as setting sub menu
========================================================*/
add_action('admin_menu', 'managepost');
function managepost(){  
    add_submenu_page( 'options-general.php', 'Custom posts Order Page', 'Custom posts Order', 'manage_options', 'addpostsection', 'addpostsection'); 
}

?>