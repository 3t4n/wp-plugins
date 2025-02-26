<?php
/*
Plugin Name: Easy Backstretch
Plugin URI: http://neatandplain.com
Description: A simple and easy way to use Backstretch jQuery plugin in basic, slideshow and block level mode. You can upload/delete images via the administration panel, and display the images in your theme in any HTML element of choice.
Version: 1.0
Author: Marco Galasso
Author URI: http://neatandplain.com/

Contributor: Gabriele Romanato
Contributor URI: http://gabrieleromanato.com/


This plugin is a fork of Wp-Cycle by Nathan Rice
This plugin inherits the GPL license from it's parent system, WordPress.
*/


/**
*
*   This section defines the variables that will be used throughout the plugin.
*
**/

    //  define our defaults (filterable)
        $easy_backstretch_defaults = apply_filters('easy_backstretch_defaults', array(
        'div' => 'body',
        'fade' => 750,
        'duration' => 3500
        ));

    //  pull the settings from the db
        $easy_backstretch_settings = get_option('easy_backstretch_settings');
        $easy_backstretch_images = get_option('easy_backstretch_images');

    //  fallback
        $easy_backstretch_settings = wp_parse_args($easy_backstretch_settings, $easy_backstretch_defaults);


/**
*
*   This section hooks the proper functions to the proper actions in WordPress
*
**/

    //  this function registers our settings in the db
        add_action('admin_init', 'easy_backstretch_register_settings');
        function easy_backstretch_register_settings() {
            register_setting('easy_backstretch_images', 'easy_backstretch_images', 'easy_backstretch_images_validate');
            register_setting('easy_backstretch_settings', 'easy_backstretch_settings', 'easy_backstretch_settings_validate');
        }
    //  this function adds the settings page to the Appearance tab
        add_action('admin_menu', 'add_easy_backstretch_menu');
        function add_easy_backstretch_menu() {
            add_submenu_page('upload.php', 'Easy Backstretch Settings', 'Easy Backstretch', 'upload_files', 'easy-backstretch', 'easy_backstretch_admin_page');
        }

    //  add "Settings" link to plugin page
        add_filter('plugin_action_links_' . plugin_basename(__FILE__) , 'easy_backstretch_plugin_action_links');
        function easy_backstretch_plugin_action_links($links) {
        $easy_backstretch_settings_link = sprintf( '<a href="%s">%s</a>', admin_url( 'upload.php?page=easy-backstretch' ), __('Settings') );
        array_unshift($links, $easy_backstretch_settings_link);
        return $links;
    }


/**
*
*   This function is the code that gets loaded when the settings page gets loaded by the browser. 
*   It calls functions that handle image uploads and image settings changes, as well as producing the visible page output.
*
**/

    function easy_backstretch_admin_page() {
        echo '<div class="wrap">';
        
            //  handle image upload, if necessary
            if($_REQUEST['action'] == 'wp_handle_upload')
                easy_backstretch_handle_upload();
            
            //  delete an image, if necessary
            if(isset($_REQUEST['delete']))
                easy_backstretch_delete_upload($_REQUEST['delete']);
            
            //  the image management form
            easy_backstretch_images_admin();
            
            //  the settings management form
            easy_backstretch_settings_admin();

        echo '</div>';
    }


/**
*
*   this section handles uploading images, adding the image data to the database, deleting images,
*   and deleting image data from the database.
*
**/

/**
*   this function handles the file upload, and adds the image data to the db
**/
    function easy_backstretch_handle_upload() {
        global $easy_backstretch_settings, $easy_backstretch_images;
        
    //  upload the image
        $upload = wp_handle_upload($_FILES['easy_backstretch'], 0);
        
    //  extract the $upload array
        extract($upload);
        
    //  the URL of the directory the file was loaded in
        $upload_dir_url = str_replace(basename($file), '', $url);
        
    //  get the image dimensions
        list($width, $height) = getimagesize($file);
        
    //  if the uploaded file is NOT an image
        if(strpos($type, 'image') === FALSE) {
            unlink($file); // delete the file
            echo '<div class="error" id="message"><p>Sorry, but the file you uploaded does not seem to be a valid image. Please try again.</p></div>';
            return;
        }
        
        
    //  make the thumbnail
        if(isset($upload['file'])) {
        $thumbnail = image_resize($file, 300, 180, true, 'thumb');
        $thumbnail_url = $upload_dir_url . basename($thumbnail);
        }
        
    //  use the timestamp as the array key and id
        $time = date('YmdHis');
        
    //  add the image data to the array
        $easy_backstretch_images[$time] = array(
        'id' => $time,
        'file' => $file,
        'file_url' => $url,
        'thumbnail' => $thumbnail,
        'thumbnail_url' => $thumbnail_url
        );
        
    //  add the image information to the database
        $easy_backstretch_images['update'] = 'Added';
        update_option('easy_backstretch_images', $easy_backstretch_images);
    }

/**
*
*   this function deletes the image, and removes the image data from the db
*
**/ 
    function easy_backstretch_delete_upload($id) {
    global $easy_backstretch_images;
    
    //  if the ID passed to this function is invalid,
    //  halt the process, and don't try to delete.
        if(!isset($easy_backstretch_images[$id])) return;
    
    //  delete the image and thumbnail
        unlink($easy_backstretch_images[$id]['file']);
        unlink($easy_backstretch_images[$id]['thumbnail']);
    
    //  indicate that the image was deleted
        $easy_backstretch_images['update'] = 'Deleted';
    
    //  remove the image data from the db
        unset($easy_backstretch_images[$id]);
        update_option('easy_backstretch_images', $easy_backstretch_images);
}


/**
*
*   these two functions check to see if an update to the data just occurred. if it did, then they
*   will display a notice, and reset the update option.
*
**/


/**
*   
*   this function checks to see if we just updated the settings if so, it displays the "updated" message.
*
**/ 
    function easy_backstretch_settings_update_check() {
        global $easy_backstretch_settings;
        if(isset($easy_backstretch_settings['update'])) {
            echo '<div class="updated fade" id="message"><p>Easy Backstretch Settings <strong>'.$easy_backstretch_settings['update'].'</strong></p></div>';
            unset($easy_backstretch_settings['update']);
            update_option('easy_backstretch_settings', $easy_backstretch_settings);
        }
    }

/**
*       
*   this function checks to see if we just added a new image if so, it displays the "updated" message.
*
**/ 
    function easy_backstretch_images_update_check() {
        global $easy_backstretch_images;
        if($easy_backstretch_images['update'] == 'Added' || $easy_backstretch_images['update'] == 'Deleted' || $easy_backstretch_images['update'] == 'Updated') {
            echo '<div class="updated fade" id="message"><p>Image(s) '.$easy_backstretch_images['update'].' Successfully</p></div>';
            unset($easy_backstretch_images['update']);
            update_option('easy_backstretch_images', $easy_backstretch_images);
        }
    }


/**
*
*   these two functions display the front-end code on the admin page. it's mostly form markup.
*
**/
    //  display the images administration code
        function easy_backstretch_images_admin() { ?>
            <?php global $easy_backstretch_images; ?>
            <?php easy_backstretch_images_update_check(); ?>
            <h2><?php _e('Easy Backstretch Images', 'easy_backstretch'); ?></h2>
            
            <table class="form-table">
                <tr valign="top"><th scope="row">Upload New Image</th>
                    <td>
                    <form enctype="multipart/form-data" method="post" action="?page=easy-backstretch">
                        <input type="hidden" name="post_id" id="post_id" value="0" />
                        <input type="hidden" name="action" id="action" value="wp_handle_upload" />
                        
                        <label for="easy_backstretch">Select a File: </label>
                        <input type="file" name="easy_backstretch" id="easy_backstretch" />
                        <input type="submit" class="button-primary" name="html-upload" value="Upload" />
                    </form>
                    </td>
                </tr>
            </table><br />
            
        <?php if(!empty($easy_backstretch_images)) : ?>
        <table class="widefat fixed" cellspacing="0">
            
            <tbody>
            
            <form method="post" action="options.php">
            <?php settings_fields('easy_backstretch_images'); ?>
            <?php foreach((array)$easy_backstretch_images as $image => $data) : ?>
                <tr>
                    <input type="hidden" name="easy_backstretch_images[<?php echo $image; ?>][id]" value="<?php echo $data['id']; ?>" />
                    <input type="hidden" name="easy_backstretch_images[<?php echo $image; ?>][file]" value="<?php echo $data['file']; ?>" />
                    <input type="hidden" name="easy_backstretch_images[<?php echo $image; ?>][file_url]" value="<?php echo $data['file_url']; ?>" />
                    <input type="hidden" name="easy_backstretch_images[<?php echo $image; ?>][thumbnail]" value="<?php echo $data['thumbnail']; ?>" />
                    <input type="hidden" name="easy_backstretch_images[<?php echo $image; ?>][thumbnail_url]" value="<?php echo $data['thumbnail_url']; ?>" />
                    <th scope="row" class="column-slug"><img src="<?php echo $data['thumbnail_url']; ?>" /></th>
                    <td class="column-slug"><input type="submit" class="button-primary" value="Update" /> <a href="?page=easy-backstretch&amp;delete=<?php echo $image; ?>" class="button">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            <input type="hidden" name="easy_backstretch_images[update]" value="Updated" />
            </form>
            
            </tbody>
        </table>
        <?php endif; ?>

    <?php
    }

    //  display the settings administration code
        function easy_backstretch_settings_admin() { ?>

        <?php easy_backstretch_settings_update_check(); ?>
        <h2><?php _e('Easy Backstretch Settings', 'easy-backstretch'); ?></h2>
        <form method="post" action="options.php">
        <?php settings_fields('easy_backstretch_settings'); ?>
        <?php global $easy_backstretch_settings; $options = $easy_backstretch_settings; ?>
        <table class="form-table">

            <tr><th scope="row">Fade Speed</th>
            <td>This is the speed at which the image will fade in. Integers in milliseconds are accepted.<br />
                <input type="text" name="easy_backstretch_settings[fade]" value="<?php echo $options['fade'] ?>" size="4" />
                <label for="easy_backstretch_settings[fade]">milliseconds</label>
            </td></tr>
            
            
            <tr><th scope="row">In between slides time duration</th>
            <td>The amount of time in between slides, when using Backstretch as a slideshow, expressed as the number of milliseconds:<br />
                <input type="text" name="easy_backstretch_settings[duration]" value="<?php echo $options['duration'] ?>" size="4" />
                <label for="easy_backstretch_settings[duration]">milliseconds</label>
            </td></tr>
            
            <tr><th scope="row">Backstretch Element DIV</th>
            <td>Please indicate what you would like the backstretch DIV to be (default is <em>body</em>):<br />
                <input type="text" name="easy_backstretch_settings[div]" value="<?php echo $options['div'] ?>" />
            </td></tr>


            <input type="hidden" name="easy_backstretch_settings[update]" value="UPDATED" />
        
        </table>
        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
        </form>
        
        <!-- The Reset Option -->
        <form method="post" action="options.php">
            <?php settings_fields('easy_backstretch_settings'); ?>
            <?php global $easy_backstretch_defaults; // use the defaults ?>
                <?php foreach((array)$easy_backstretch_defaults as $key => $value) : ?>
                    <input type="hidden" name="easy_backstretch_settings[<?php echo $key; ?>]" value="<?php echo $value; ?>" />
                <?php endforeach; ?>
            <input type="hidden" name="easy_backstretch_settings[update]" value="RESET" />
            <input type="submit" class="button" value="<?php _e('Reset Settings') ?>" />
        </form>
        <!-- End Reset Option -->
        </p>

    <?php
    }


/**
*
*   these two functions sanitize the data before it gets stored in the database via options.php
*
**/

    //  this function sanitizes our settings data for storage
        function easy_backstretch_settings_validate($input) {
            $input['fade'] = wp_filter_nohtml_kses($input['fade']); 
            $input['duration'] = wp_filter_nohtml_kses($input['duration']);
            $input['div'] = wp_filter_nohtml_kses($input['div']);

            return $input;
        }

    //  this function sanitizes our image data for storage
        function easy_backstretch_images_validate($input) {
            foreach((array)$input as $key => $value) {
                if($key != 'update') {
                $input[$key]['file_url'] = clean_url($value['file_url']);
                $input[$key]['thumbnail_url'] = clean_url($value['thumbnail_url']);
                }
            }
            return $input;
        }

/**
*
*   This final section generates all the code that is displayed on the front-end of the WP Theme 
*
**/




    add_action('wp_print_scripts', 'easy_backstretch_scripts');
        function easy_backstretch_scripts() {
            if(!is_admin())
            wp_enqueue_script('backstretch', plugins_url( 'jquery.backstretch.min.js' , __FILE__ ) , array('jquery'), '2.0.4', true);

        }

    add_action('wp_footer', 'easy_backstretch_args', 20);
        function easy_backstretch_args() {
            global $easy_backstretch_settings, $easy_backstretch_images;
            ?>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
        var images = [];
        <?php foreach($easy_backstretch_images as $image => $data): ?>
        images.push('<?php echo $data['file_url']; ?>');
        <?php endforeach; ?>
        var index = 0;
        var backstretchSettings = { fade: <?php echo $easy_backstretch_settings['fade']; ?>, duration:<?php echo $easy_backstretch_settings['duration'];?>};
        var len = images.length;
        var totalDuration = (backstretchSettings.fade + backstretchSettings.duration);
        var timer = null;
        var rotate = function() {
            $('<?php echo $easy_backstretch_settings["div"]; ?>').backstretch(images[0], backstretchSettings);
            timer = setInterval(function() {
                index++;
                if(index == len) {
                    index = 0;
                }
                $('<?php echo $easy_backstretch_settings["div"]; ?>').backstretch(images[index], backstretchSettings);     
            }, totalDuration); 
        };
        rotate();
        });
        </script>
        <?php
        }