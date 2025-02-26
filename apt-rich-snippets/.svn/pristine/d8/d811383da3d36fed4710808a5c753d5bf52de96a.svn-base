<?php

/* 
  Plugin Name: APT Rich Snippets
  Plugin URI: http://www.aptonline.co.za
  Description: A plugin that displays rich snippets from your Wordpress Posts 
  Author: APTOnline 
  Version: 1.0 
  Author URI: http://www.aptonline.co.za 
*/

require_once('output.php');

$prefix = 'aptmicrodata_'; 
$aptmicrodata_meta_fields = array( 
    array(  
        'label'=> 'Microdata type',  
        'desc'  => 'Select which type of microdata you want to include.',  
        'id'    => $prefix.'microdata_type',  
        'type'  => 'select',  
        'options' => array (  
            'one' => array (  
                'label' => 'None',  
                'value' => 'none'  
            ),  
            'two' => array (  
                'label' => 'Review',  
                'value' => 'review'  
            ),  
            'three' => array (  
                'label' => 'Event',  
                'value' => 'event'  
            ),
            'four' => array (  
                'label' => 'Music',  
                'value' => 'music'  
            )
        ))
);

$aptmicrodata_microdata_review_form_fields = array(
        
        array(  
            'label'=> 'Item being reviewed',  
            'desc'  => 'The title of the item being reviews',  
            'id'    => $prefix.'review_itemreviewed',  
            'type'  => 'text'  
        ),
        array(  
        'label'=> 'Rating',  
        'desc'  => 'Give the item a rating 5 being the higest, 1 the lowest',  
        'id'    => $prefix.'review_rating',  
        'type'  => 'select',  
        'options' => array (  
            '1' => array (  
                'label' => '1',  
                'value' => '1'  
            ),
            '1.5' => array (  
                'label' => '1.5',  
                'value' => '1.5'  
            ),
            '2' => array (  
                'label' => '2',  
                'value' => '2'  
            ),
            '2.5' => array (  
                'label' => '2.5',  
                'value' => '2.5'  
            ),
            '3' => array (  
                'label' => '3',  
                'value' => '3'  
            ),
            '3.5' => array (  
                'label' => '3.5',  
                'value' => '3.5'  
            ),
            '4' => array (  
                'label' => '4',  
                'value' => '4'  
            ),
            '4.5' => array (  
                'label' => '4.5',  
                'value' => '4.5'  
            ),
            '5' => array (  
                'label' => '5',  
                'value' => '5'  
            ) 
        )),
        array(  
            'label'=> 'Summary',  
            'desc'  => 'A summary of the item being reviewed',  
            'id'    => $prefix.'review_summary',  
            'type'  => 'textarea'  
        ), 
    );

$aptmicrodata_microdata_event_form_fields = array(
        array(  
            'label'=> 'Location',  
            'desc'  => 'The location of the event',  
            'id'    => $prefix.'event_location',  
            'type'  => 'text'  
        ),
        array(  
            'label'=> 'Summary',  
            'desc'  => 'A summary of the event',  
            'id'    => $prefix.'event_summary',  
            'type'  => 'textarea'  
        ),
        array(  
            'label'=> 'Start date',  
            'desc'  => 'YYYY-MM-DD',  
            'id'    => $prefix.'event_start_date',  
            'type'  => 'text'  
        ),
        array(  
            'label'=> 'End date',  
            'desc'  => 'YYYY-MM-DD',  
            'id'    => $prefix.'event_end_date',  
            'type'  => 'text'  
        ),
        array(  
            'label'=> 'Type',  
            'desc'  => 'E.g. "Festival", "Concert", "Lecture"',  
            'id'    => $prefix.'event_type',  
            'type'  => 'text'  
        )
    );

$aptmicrodata_microdata_music_form_fields = array(
    
    array(  
            'label'=> 'Name',  
            'desc'  => 'Artist name',  
            'id'    => $prefix.'music_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> 'Album',  
            'desc'  => 'Album name',  
            'id'    => $prefix.'music_album',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> 'Tracks',  
            'desc'  => 'Track 1 name',  
            'id'    => $prefix.'music_track_1_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 1',  
            'id'    => $prefix.'music_track_1',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_1',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 2 name',  
            'id'    => $prefix.'music_track_2_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 2',  
            'id'    => $prefix.'music_track_2',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_2',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 3 name',  
            'id'    => $prefix.'music_track_3_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 3',  
            'id'    => $prefix.'music_track_3',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_3',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 4 name',  
            'id'    => $prefix.'music_track_4_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 4',  
            'id'    => $prefix.'music_track_4',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_4',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 5 name',  
            'id'    => $prefix.'music_track_5_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 5',  
            'id'    => $prefix.'music_track_5',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_5',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 6 name',  
            'id'    => $prefix.'music_track_6_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_6',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 6',  
            'id'    => $prefix.'music_track_6',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_6',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 7 name',  
            'id'    => $prefix.'music_track_7_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 7',  
            'id'    => $prefix.'music_track_7',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_7',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 8 name',  
            'id'    => $prefix.'music_track_8_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 8',  
            'id'    => $prefix.'music_track_8',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_8',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 9 name',  
            'id'    => $prefix.'music_track_9_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 9',  
            'id'    => $prefix.'music_track_9',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_9',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 10 name',  
            'id'    => $prefix.'music_track_10_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 10',  
            'id'    => $prefix.'music_track_10',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_10',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 11 name',  
            'id'    => $prefix.'music_track_11_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 11',  
            'id'    => $prefix.'music_track_11',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_11',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Track 12 name',  
            'id'    => $prefix.'music_track_12_name',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Link to track 12',  
            'id'    => $prefix.'music_track_12',  
            'type'  => 'text'  
        ),
    array(  
            'label'=> '',  
            'desc'  => 'Duration',  
            'id'    => $prefix.'duration_12',  
            'type'  => 'text'  
        ),
    
 );

$aptmicrodata_box_top = '<div class="aptmicrodatabox">';

$aptmicrodata_box_bottom = '</div>';

add_action( 'add_meta_boxes', 'aptmicrodata_meta_box' );

function aptmicrodata_meta_box() {
    
    wp_enqueue_script('aptmicrodata_javascript', '/wp-content/plugins/APTRichSnippets/javascript.js');
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-ui-datepicker' );
    add_meta_box(
            'aptmicrodataid',
            __( 'Rich Snippets', 'aptmicrodata_textdomain' ),
            'aptmicrodata_inner_custom_box',
            'post'
        );

}

function aptmicrodata_inner_custom_box() {
 
    global $aptmicrodata_meta_fields, $post; 
    
    $microDataType = get_post_meta($post->ID, 'aptmicrodata_microdata_type', true); 
    echo '<input type="hidden" name="aptmicrodata_saved_microdata_type" id="aptmicrodata_saved_microdata_type" value="'.$microDataType.'"/>';
    echo '<input type="hidden" name="aptmicrodata_post_id" id="aptmicrodata_post_id" value="'.$post->ID.'" />';
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
    
    aptmicrodata_build_form($aptmicrodata_meta_fields, $post->ID);
    
    echo '<div id="aptmicrodata_microdata_form"></div>';
    
}

add_action('wp_ajax_aptmicrodata_review_form', 'aptmicrodata_review_form_callback');
function aptmicrodata_review_form_callback() {
    
    global $prefix, $aptmicrodata_microdata_review_form_fields, $post; 
    
    aptmicrodata_build_form($aptmicrodata_microdata_review_form_fields, $_POST['postID']);
    
    die();
    
}

add_action('wp_ajax_aptmicrodata_event_form', 'aptmicrodata_event_form_callback');
function aptmicrodata_event_form_callback() {
    
    global $prefix, $aptmicrodata_microdata_event_form_fields, $post; 
    
    aptmicrodata_build_form($aptmicrodata_microdata_event_form_fields, $_POST['postID']);
    
    die();
    
}

add_action('wp_ajax_aptmicrodata_music_form', 'aptmicrodata_music_form_callback');
function aptmicrodata_music_form_callback() {
    
    global $prefix, $aptmicrodata_microdata_music_form_fields, $post; 
    
    aptmicrodata_build_form($aptmicrodata_microdata_music_form_fields, $_POST['postID']);
    
    die();
    
}

function aptmicrodata_build_form($fields, $postID) {
   
        // Begin the field table and loop  
    echo '<table class="form-table">';  
    foreach ($fields as $field) {  
        // get value of this field if it exists for this post  
        $meta = get_post_meta($postID, $field['id'], true); 
        
        // begin a table row with  
        echo '<tr> 
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
                <td>';  
                switch($field['type']) {  
                    //select
                    case 'select':  
                        echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';  
                        foreach ($field['options'] as $option) {  
                            echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
                        }  
                        echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
                    break; 
                    // text  
                    case 'text':  
                        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> 
                            <br /><span class="description">'.$field['desc'].'</span>';  
                    break;
                    // textarea  
                    case 'textarea':  
                        echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
                            <br /><span class="description">'.$field['desc'].'</span>';  
                    break; 
                } //end switch  
        echo '</td></tr>';  
    } // end foreach  
    echo '</table>'; // end table 

}

// Save the Data  
function aptmicrodata_save_custom_meta($post_id) {  
    global $aptmicrodata_meta_fields, $aptmicrodata_microdata_review_form_fields, $aptmicrodata_microdata_event_form_fields, $aptmicrodata_microdata_music_form_fields;  
      
    // verify nonce  
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))   
        return $post_id;  
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;  
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
      
    // loop through fields and save the data  
    foreach ($aptmicrodata_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  

    // loop through fields and save the data  
    foreach ($aptmicrodata_microdata_review_form_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach
    
     // loop through fields and save the data  
    foreach ($aptmicrodata_microdata_event_form_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach 
    
     // loop through fields and save the data  
    foreach ($aptmicrodata_microdata_music_form_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach 
    
}  
add_action('save_post', 'aptmicrodata_save_custom_meta');


function aptmicrodata_create_menu() {

	//create new top-level menu
	add_options_page('Settings Admin', 'APT Rich Snippets', 'administrator', __FILE__, 'aptmicrodata_create_admin_page');
        //add_action( 'admin_init', 'aptmicrodata_register_settings' ); 
        
}

add_action('admin_menu', 'aptmicrodata_create_menu');

/*function aptmicrodata_register_settings() {
    
    register_setting( 'aptmicrodata-options-group', 'aptmicrodata_background' ); 
    
}*/

register_activation_hook( __FILE__, 'aptmicrodata_set_up_options' );

function aptmicrodata_set_up_options() {
    
    add_option('aptmicrodata_background', '#F1F1F1');
    add_option('aptmicrodata_padding', '10px');
    add_option('aptmicrodata_border', '1px');
    add_option('aptmicrodata_text', '#000000');
    add_option('aptmicrodata_link', '#000000');
    add_option('aptmicrodata_display', 'inline-block');
    add_option('aptmicrodata_width', '300px');
    
}

function aptmicrodata_create_admin_page() {
    
    if(isset($_POST['submit']))  {
        
        update_option('aptmicrodata_background', $_POST['aptmicrodata_background']);
        update_option('aptmicrodata_padding', $_POST['aptmicrodata_padding']);
        update_option('aptmicrodata_border', $_POST['aptmicrodata_border']);
        update_option('aptmicrodata_text', $_POST['aptmicrodata_text']);
        update_option('aptmicrodata_link', $_POST['aptmicrodata_link']);
        update_option('aptmicrodata_display', $_POST['aptmicrodata_display']);
        update_option('aptmicrodata_width', $_POST['aptmicrodata_width']);
        
    }
    
?>  

    <?php if( isset($_POST['settings-updated']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
    <?php } ?>

    <div class="wrap">
    <h2>APT Smart Snippets</h2>
    <form method="post" name="options" target="_self">
        <input type="hidden" name="settings-updated" value="yes" />
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" colspan="2">
                        Customize the CSS output.
                    </th>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        Display
                    </th>
                    <td>
                        <select name="aptmicrodata_display" id='aptmicrodata_display'>
                            <option value='inline-block' <?php if(get_option('aptmicrodata_display') == 'inline') { echo 'SELECTED'; } ?>>Inline</option>
                            <option value='none' <?php if(get_option('aptmicrodata_display') == 'none') { echo 'SELECTED'; } ?>>None</option>
                        </select>
                        <p class="description">
                           Show or hide box in posts
                        </p>
                    </td>  
                </tr>
                <tr valign="top">
                    <th scope="row">
                        Background
                    </th>
                    <td>
                        <input name="aptmicrodata_background" type="text" id="aptmicrodata_background" value="<?php echo get_option('aptmicrodata_background'); ?>" class="regular-text"/>
                        <p class="description">
                            Background color of meta box
                        </p>
                    </td>  
                </tr>
                <tr valign="top">
                    <th scope="row">
                        Text color
                    </th>
                    <td>
                        <input name="aptmicrodata_text" type="text" id="aptmicrodata_text" value="<?php echo get_option('aptmicrodata_text'); ?>" class="regular-text"/>
                        <p class="description">
                            Text color inside meta box
                        </p>
                    </td>  
                </tr>
                <tr valign="top">
                    <th scope="row">
                        Link color
                    </th>
                    <td>
                        <input name="aptmicrodata_link" type="text" id="aptmicrodata_link" value="<?php echo get_option('aptmicrodata_link'); ?>" class="regular-text"/>
                        <p class="description">
                            Link color inside meta box
                        </p>
                    </td>  
                </tr>
                <tr valign="top">
                    <th scope="row">
                        Padding
                    </th>
                    <td>
                        <input name="aptmicrodata_padding" type="text" id="aptmicrodata_padding" value="<?php echo get_option('aptmicrodata_padding'); ?>" class="regular-text"/>
                        <p class="description">
                            Box padding
                        </p>
                    </td>  
                </tr>
                <tr valign="top">
                    <th scope="row">
                        Border
                    </th>
                    <td>
                        <input name="aptmicrodata_border" type="text" id="aptmicrodata_border" value="<?php echo get_option('aptmicrodata_border'); ?>" class="regular-text"/>
                        <p class="description">
                            Box border
                        </p>
                    </td> 
                    
                </tr>
                <tr valign="top">
                    <th scope="row">
                        Width
                    </th>
                    <td>
                        <input name="aptmicrodata_width" type="text" id="aptmicrodata_width" value="<?php echo get_option('aptmicrodata_width'); ?>" class="regular-text"/>
                        <p class="description">
                            Width of the meta box
                        </p>
                    </td> 
                    
                </tr>
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" name="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>

    </form>
</div>

<?php
} 

?>
