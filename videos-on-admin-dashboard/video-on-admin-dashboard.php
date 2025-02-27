<?php
/*
Plugin Name: Videos on Admin Dashboard
Plugin URI: http://wordpress.org/plugins
Description: Include Youtube or Vimeo tutorials and support videos for your customers or for your Wordpress dashboard.
Version: 2.1.16
Requires at Least: 3.0.1
Requires PHP: 5.6
Author: Nahiro.net - Wordpress Hilfe & Support
Author URI: https://nahiro.net/
License: GPLv2 or later
Text Domain: videos-on-admin-dashboard
Domain Path: /languages
*/


/* Global Variables */

$vdb_prefix      = 'videos-on-admin-dashboard_';
$vdb_plugin_name = 'Videos on admin Dashboard';
$vdb_options     = get_option('vdb_settings');

/*Includes*/

include('includes/admin-page.php');


    
add_action( 'init', 'voad_load_textdomain' );

function voad_load_textdomain() {
    load_plugin_textdomain( 'videos-on-admin-dashboard', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}


add_action('wp_dashboard_setup', 'voad_dashboard'); //Run plugin when dashboard is loaded
register_activation_hook(__FILE__, 'voad_set_up_options'); //Run function to load default values

function voad_set_up_options() //Function to load default values
{
    add_option('vdb_settings', array(
        'minimum_role' => 'administrator',
        'youtube_number' => '3',
        'categories' => 'Video title',
        'note1' => 'This is a free plugin, your are allowed to create just one widget and a maximun of three videos, if you want to have unlimited videos and create unlimited widgets on the dashboard please get the premium version.',
        'note2' => 'This is a free plugin, your are allowed to create just one widget and a maximun of three videos, if you want to have unlimited videos and create unlimited widgets on the dashboard please get the premium version.',
        'note3' => 'This is a free plugin, your are allowed to create just one widget and a maximun of three videos, if you want to have unlimited videos and create unlimited widgets on the dashboard please get the premium version.',
        'color0' => '#08104E',
        'category_video1' => 'Video title',
        'category_video2' => 'Video title',
        'category_video3' => 'Video title',
        'colorVideo1' => '#08104E',
        'colorVideo2' => '#08104E',
        'colorVideo3' => '#08104E',
        'youtube_id1' => '',
        'youtube_id2' => '',
        'youtube_id3' => '',
        'title1' => '',
        'title2' => '',
        'title3' => ''
    ));
}

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'voad_add_plugin_page_settings_link');
function voad_add_plugin_page_settings_link( $links ) {
    $links[] = '<a href="' .
        admin_url( 'admin.php?page=vdb-options' ) .'">' . __('Settings', 'videos-on-admin-dashboard') . '</a>';
        $links[] = '<a href="https://nahiro.net/kontakt/">' . __('Support', 'videos-on-admin-dashboard') . '</a>';
    return $links;
}

function voad_load_scripts($hook) //Register our stylesheet
{
   
    if ($hook != 'index.php') //Only if it's in the admin area
        return;

    wp_register_style('voad-style', plugins_url('includes/css/video-on-admin-dashboard.css', __FILE__));
    wp_enqueue_style('voad-style');


}
add_action('admin_enqueue_scripts', 'voad_load_scripts');



function voad_dashboard() //Display Videos
{
    
    $vdb_options = get_option('vdb_settings');
    
    //Specify which roles have permissions, given the minimum value
    if ($vdb_options['minimum_role'] == 'subscriber') {
        $roles = array(
            'subscriber',
            'contributor',
            'author',
            'editor'
        );
    }
    if ($vdb_options['minimum_role'] == 'contributor') {
        $roles = array(
            'contributor',
            'author',
            'editor'
        );
    }
    if ($vdb_options['minimum_role'] == 'author') {
        $roles = array(
            'author',
            'editor'
        );
    }
    if ($vdb_options['minimum_role'] == 'editor') {
        $roles = array(
            'editor'
        );
    }
    if ($vdb_options['minimum_role'] == 'administrator') {
        $roles = array(
            'administrator'
        );
    }
    
    //Check role
    $in_role = voad_check_user_role($roles);
    
    //Load dashboard widget if they are an acceptable role
    if ($in_role) {
             remove_meta_box( 'voad_youtube_videos', 'dashboard', 'high' ); 
             add_meta_box( 'voad_youtube_videos',esc_attr( $vdb_options['categories']) , 'voad_display_youtube', 'dashboard', 'normal', 'high' );//Add YouTube Videos
       
    } else {
        // User not in role, do nothing
    }
}

//Function to check user role
function voad_check_user_role($roles, $user_id = NULL)
{
    if ($user_id)
        $user = get_userdata($user_id);
    else
        $user = wp_get_current_user();
    
    if (empty($user))
        return FALSE;
    
    if (!in_array('administrator', $roles)) //Add admins even if they aren't specified
        $roles[] = 'administrator';
    
    foreach ($user->roles as $role) {
        if (in_array($role, $roles)) {
            return TRUE;
        }
    }
    return FALSE;
}



function voad_display_youtube($var,$args)
{
    global $vdb_options;    

    echo '<div class="wrap"></div>';
    for ($i = 1; $i <= 3; $i++) { //Loop through the number of videos
       
            if (array_key_exists('youtube_id' . $i, $vdb_options)) { //Make sure there is something entered in the field, otherwise do nothing with it
            $youtube_location = $vdb_options['youtube_id' . $i];
            if (!empty($youtube_location)) {
                if (strpos($youtube_location, 'v=') !== false) { //If it's the full url
                    $url = $youtube_location;
                    parse_str(parse_url($youtube_location, PHP_URL_QUERY), $my_array_of_vars); //Strip the video ID from the URL
                    $video_id = $my_array_of_vars['v'];
                }else if (strpos($youtube_location, 'youtu.be/') !== false) {
                    $pos =strpos($youtube_location, 'youtu.be/');
                    $video_id= substr($youtube_location, $pos+9);
                } else if (strpos($youtube_location, 'https://drive.google.com/file/d/') !== false) {
                    $pos =strpos($youtube_location, 'https://drive.google.com/file/d/');
                    $video_id= substr($youtube_location, $pos+32);
                    $video_id= str_replace("/view", "", $video_id);
                    $type_video="google";
                }
                else {
                    $video_id = $youtube_location; //Otherwise it must be the video ID, just display that
                }
                if (strlen($video_id) != '11') {//It doesn't appear to be valid YouTube, so let's check and see if it's Vimeo.
                    //Start VIMEO Section
                    preg_match('/vimeo\.com\/([0-9]{1,10})/', $youtube_location, $matches);
                    $vimeo_id = $matches[1];
                    if ($vimeo_id) {
                        if($vdb_options['title'. $i]==''){
                            $vdb_options['title'. $i]= '&nbsp';
                        }
                        ?>
                            <button class="voad-collapsible1" style="background-color:<?php echo esc_attr( $vdb_options['colorVideo'. $i] )?> "><strong><?php echo esc_attr( $vdb_options['title'. $i] )?></strong> </button>
                            <div class="voad-content" style="<?php if($vdb_options['youtube_number']==$i) echo "display:block;"?>">
                            <p><strong><?php echo _e('Note: ', 'videos-on-admin-dashboard'); ?></strong><?php echo  esc_attr( $vdb_options['note'. $i])?></p> 
                                <div class="voad-video-container" >
                                    <iframe src="https://player.vimeo.com/video/<?php echo $vimeo_id; ?>" width="640" height="360" frameborder="0" style="width:100%;" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php
                    }//END Vimeo Section
                    else { 
                        if ($type_video=="google") { // Start GoogleVideo Section
                            ?>
                            <button class="voad-collapsible1" style="background-color:<?php echo esc_attr( $vdb_options['colorVideo'. $i] )?> "><strong><?php echo esc_attr(  $vdb_options['title'. $i] )?></strong> </button>
                            <div class="voad-content" style="<?php if($vdb_options['youtube_number']==$i) echo "display:block;"?>">
                            <p><strong><?php echo _e('Note: ', 'videos-on-admin-dashboard'); ?></strong><?php echo  esc_attr( $vdb_options['note'. $i])?></p> 
                                <div class="voad-video-container"> 
                                    <iframe src="https://drive.google.com/file/d/<?php echo $video_id;?>/preview" frameborder="0"allowfullscreen></iframe>
                                </div>
                            </div> 
                        <?php
                        } //END GoogleVideo Section
                        else {//It's not Vimeo either, so display error
                             echo '<p>Error: Video #' . $i . " does not appear to be a valid YouTube or Vimeo URL.</p>";
                        }
                    }
                } //Make sure it's a valid 11-character string
                else {
                    if($vdb_options['title'. $i]==''){
                        $vdb_options['title'. $i]= '&nbsp';
                    }
                        ?>
                        <button class="voad-collapsible1" style="background-color:<?php echo esc_attr( $vdb_options['colorVideo'. $i] )?> "><strong><?php echo esc_attr($vdb_options['title'. $i]) ?></strong> </button>
                        <div class="voad-content" style="<?php if($vdb_options['youtube_number']==$i) echo "display:block;"?>">
                        <p><strong><?php echo _e('Note: ', 'videos-on-admin-dashboard'); ?></strong><?php echo  esc_attr( $vdb_options['note'. $i])?></p> 
                            <div class="voad-video-container"> 
                                <iframe src="//www.youtube.com/embed/<?php echo $video_id;?>" frameborder="0"allowfullscreen></iframe>
                            </div>
                        </div>  
            <?php
                } //end else
            } //End if !empty($youtube_location)
            }
        
    } //End the Loop
    ?>
    <script type="text/javascript">
    
    var coll = document.getElementsByClassName("voad-collapsible1");
    var i;
    window.onload = function() {
        for (i = 0; i < coll.length; i++) {
             if(i+1==<?php echo $vdb_options['youtube_number']?>){
                var content= coll[i].nextElementSibling;
                content.style.display = "block";
                coll[i].classList.toggle("voad-active1");
            }
          coll[i].addEventListener("click", function() {
            this.classList.toggle("voad-active1");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
              content.style.display = "none";
            } else {
              content.style.display = "block";
            }
          });
    }
    };
    
    
    </script>
    <?php
} 
