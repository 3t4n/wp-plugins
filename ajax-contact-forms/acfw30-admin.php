<?php
//Forms
function acfw30_register_forms() {
  $labels = array(
    "name" => __('Ajax CF', 'acfw30'),
    "singular_name" => __('Forms', 'acfw30'),
    "all_items" => __('Forms', 'acfw30'),
    "add_new" => __('Create form', 'acfw30'),
    "add_new_item" => __('Create', 'acfw30'),
    "edit_item" => __('Edit', 'acfw30'),
    "new_item" => __('New', 'acfw30'),
    "view_item" => __('View form', 'acfw30'),
    "view_items" => __('View forms', 'acfw30'),
    "search_items" => __('Search Forms', 'acfw30'),
    "not_found" => __('No forms found', 'acfw30'),
    "not_found_in_trash" => __('No forms found in Trash', 'acfw30'),
  );

  $args = array(
    "label" => __( 'Forms', 'acfw30' ),
    "labels" => $labels,
    "description" => "",
    "public" => false,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array("slug" => "acfw30_forms", "with_front" => true),
    "query_var" => true,
    "supports" => array("title"),
    "menu_icon" => plugins_url('ajax-contact-forms/img/logo-acf.png'),
  );

  register_post_type( "acfw30_forms", $args );
}

add_action('init', 'acfw30_register_forms');

//hiding column(date)
function acfw30_remove_date_column($defaults) {
    $spwp86_post_type = get_post_type();
    if($spwp86_post_type == 'acfw30_forms'){
        unset($defaults['date']);
    }
    return $defaults;
}
add_filter('manage_posts_columns', 'acfw30_remove_date_column');

//adding column(link)
function acfw30_custom_link_column($defaults){
    $acfw30_post_type = get_post_type();
    if($acfw30_post_type == 'acfw30_forms') $defaults['acfw30_link'] = 'Custom link';
    return $defaults;
}
add_filter('manage_posts_columns', 'acfw30_custom_link_column', 5);

//adding column(link text)
function acfw30_custom_link_column_text($column_name, $id){
    $acfw30_post_type = get_post_type($id);
    if($acfw30_post_type == 'acfw30_forms' && $column_name === 'acfw30_link') echo esc_attr('<a href="#acfw30_'.get_the_ID().'">Custom link</a>');
}
add_action('manage_posts_custom_column', 'acfw30_custom_link_column_text', 5, 2);

//adding column(shortcode)
function acfw30_form_id_column($defaults){
    $acfw30_post_type = get_post_type();
    if($acfw30_post_type == 'acfw30_forms') $defaults['acfw30_shortcode'] = 'ShortCode';
    return $defaults;
}
add_filter('manage_posts_columns', 'acfw30_form_id_column', 5);

//adding column(shortcode text)
function acfw30_form_id_column_text($column_name, $id){
    $acfw30_post_type = get_post_type($id);
    if($acfw30_post_type == 'acfw30_forms' && $column_name === 'acfw30_shortcode') echo '[acfw30 id="'.get_the_ID().'"]';
}
add_action('manage_posts_custom_column', 'acfw30_form_id_column_text', 5, 2);

//register the meta box
add_action('add_meta_boxes', 'acfw30_add_meta_box');
function acfw30_add_meta_box() {
    add_meta_box('acfw30_meta_box0', __('Information', 'acfw30'), 'acfw30_plugins', 'acfw30_forms', 'normal', 'default');
    add_meta_box('acfw30_meta_box1', __('1. Form Fields', 'acfw30'), 'acfw30_fields_form_show', 'acfw30_forms', 'normal', 'default');
    add_meta_box('acfw30_meta_box2', __('2. Design', 'acfw30'), 'acfw30_design_form_show', 'acfw30_forms', 'normal', 'default');
    add_meta_box('acfw30_meta_box3', __('3. Notification', 'acfw30'), 'acfw30_notice_form_show', 'acfw30_forms', 'normal', 'default');

}

function acfw30_plugins($post){
    echo '<a href="https://web-cude.com/">';
    echo __('Try other plugins', 'acfw30');
    echo '</a> ';

    echo '<a href="http://acf.web-cude.com/">';
    echo __('Documentation', 'acfw30');
    echo '</a>';
}

function acfw30_fields_form_show($post){
    $id = $post->ID;

    $acfw30_form_fields = get_post_meta($id, 'acfw30_form_fields', true);    
    
    if(empty($acfw30_form_fields)){
        $acfw30_form_fields = "[acfw30_title text='Contact Form']\r[acfw30_subtitle text='Use the contact form']\r<p>Name:</p>\r[acfw30_input_text name='acfw30_name' required='y' minlength='2' maxlength='15']\r<p>Age:</p>\r[acfw30_input_number name='acfw30_number' required='y' minlength='1' maxlength='2']\r<p>E-mail:</p>\r[acfw30_input_email name='acfw30_email' required='y']\r<p>Phone:</p>\r[acfw30_input_phone  name='acfw30_phone' required='y' mask='+7(999)999-9999']\r<p>Message:</p>\r[acfw30_textarea name='acfw30_textarea' required='y' minlength='2' maxlength='300']\r[acfw30_submit name='acfw30_submit' text='Send']\r[acfw30_page]\r[acfw30_ip]\r[acfw30_success_message text='Thank you!']";
    }

    ?>
    <textarea name="acfw30_form_fields" class="acfw30_textarea" id="acfw30_form_fields"><?php echo esc_textarea($acfw30_form_fields);?></textarea>
<?php
}

function acfw30_design_form_show($post){
    $id = $post->ID; ?>
    <table class="acfw30_table2">
        <tr>
            <td>
            	<?php
            	$acfw30_form_bg_spcolor = get_post_meta($id, 'acfw30_form_bg_spcolor', true);
                if(empty($acfw30_form_bg_spcolor)){$acfw30_form_bg_spcolor = '#f9f9f9';}
                ?>
                <p><label for="acfw30_form_bg_spcolor"><?php echo __('Background Color', 'acfw30')?>:</label></br>
                <input type="text" name="acfw30_form_bg_spcolor" id="acfw30_form_bg_spcolor" value="<?php echo $acfw30_form_bg_spcolor;?>"></p>
            </td>
            <td>
            	<?php
            	$acfw30_form_font_spcolor = get_post_meta($id, 'acfw30_form_font_spcolor', true);
                if(empty($acfw30_form_font_spcolor)) $acfw30_form_font_spcolor = '#333333';
                ?>
                <p><label for="acfw30_form_font_spcolor"><?php echo __('Text Color', 'acfw30')?>:</label></br>
                <input type="text" name="acfw30_form_font_spcolor" id="acfw30_form_font_spcolor" value="<?php echo $acfw30_form_font_spcolor;?>"></p>
            </td>
        </tr>
        <tr>    
            <td>
            	<?php
            	$acfw30_form_btn_spcolor = get_post_meta($id, 'acfw30_form_btn_spcolor', true);
                if(empty($acfw30_form_btn_spcolor)) $acfw30_form_btn_spcolor = '#4095f4';
                ?>
                <p><label for="acfw30_form_btn_spcolor"><?php echo __('Button Color', 'acfw30')?>:</label></br>
                <input type="text" name="acfw30_form_btn_spcolor" id="acfw30_form_btn_spcolor" value="<?php echo $acfw30_form_btn_spcolor;?>"></p>
            </td>
            <td>
            	<?php
            	$acfw30_form_border_spcolor = get_post_meta($id, 'acfw30_form_border_spcolor', true);
                if(empty($acfw30_form_border_spcolor)) $acfw30_form_border_spcolor = '#cccccc';
                ?>
                <p><label for="acfw30_form_border_spcolor"><?php echo __('Border Color', 'acfw30')?>:</label></br>
                <input type="text" name="acfw30_form_border_spcolor" id="acfw30_form_border_spcolor" value="<?php echo $acfw30_form_border_spcolor;?>"></p>
            </td>
        </tr>
        <tr>
            <td>
            	<?php
            	$acfw30_form_btn_text_spcolor = get_post_meta($id, 'acfw30_form_btn_text_spcolor', true);
                if(empty($acfw30_form_btn_text_spcolor)) $acfw30_form_btn_text_spcolor = '#ffffff';
                ?>
                <p><label for="acfw30_form_btn_text_spcolor"><?php echo __('Button text color', 'acfw30')?>:</label></br>
                <input type="text" name="acfw30_form_btn_text_spcolor" id="acfw30_form_btn_text_spcolor" value="<?php echo$acfw30_form_btn_text_spcolor;?>"></p>
            </td>
            <td>
            	<?php
            	$acfw30_form_placeholder_spcolor = get_post_meta($id, 'acfw30_form_placeholder_spcolor', true);
                if(empty($acfw30_form_placeholder_spcolor)) $acfw30_form_placeholder_spcolor = '#5b5b5b';
                ?>
                <p><label for="acfw30_form_placeholder_spcolor"><?php echo __('Placeholder color', 'acfw30')?>:</label></br>
                <input type="text" name="acfw30_form_placeholder_spcolor" id="acfw30_form_placeholder_spcolor" value="<?php echo get_post_meta($id, 'acfw30_form_placeholder_spcolor', true);?>"></p>
            </td>    
        </tr>    
    </table>    
<?php        
}

function acfw30_notice_form_show($post){
    $id = $post->ID; 
	$acfw30_form_notice_email = get_post_meta($id, 'acfw30_form_notice_email', true);
    if(empty($acfw30_form_notice_email)) $acfw30_form_notice_email = get_option('admin_email');
    ?>
    <p><label for="acfw30_form_notice_email"><?php echo __('E-mail', 'acfw30')?>:</label></br>
    <input type="text" name="acfw30_form_notice_email" id="acfw30_form_notice_email" value="<?php echo $acfw30_form_notice_email;?>"></p>
    <?php
    $acfw30_form_notice_title = get_post_meta($id, 'acfw30_form_notice_title', true);
    if(empty($acfw30_form_notice_title)) $acfw30_form_notice_title = 'Contact Form';
    ?>
    <p><label for="acfw30_form_notice_title"><?php echo __('Title', 'acfw30')?>:</label></br>
    <input type="text" name="acfw30_form_notice_title" id="acfw30_form_notice_title" value="<?php echo $acfw30_form_notice_title;?>"></p>

	<?php
	$acfw30_form_notice_text = get_post_meta($id, 'acfw30_form_notice_text', true);
	if(empty($acfw30_form_notice_text)){
		$acfw30_form_notice_text = "Name: %acfw30_name%<br>\rAge: %acfw30_number%<br>\rE-mail: %acfw30_email%<br>\rPhone: %acfw30_phone%<br>\rMessage: %acfw30_textarea%<br>\rPage: %acfw30_page%<br>\rIP: %acfw30_ip%<br>";

	}
	?>

    <p><label for="acfw30_form_notice_text"><?php echo __('Text', 'acfw30')?>:</label></br>
    <textarea name="acfw30_form_notice_text" class="acfw30_textarea" id="acfw30_form_notice_text"><?php echo esc_textarea($acfw30_form_notice_text);?></textarea>
    <?php
}

add_action('save_post', 'acfw30_meta_box_data_save');
function acfw30_meta_box_data_save($post_id) {

    if (get_post_type($post_id) == 'acfw30_forms'){
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return;

        $allowed_html = array(
            'p' => array(),
            'em' => array(),
            'strong' => array(),
            'lable' => array(),
            'br' => array(),
        );

        //field
        if(isset($_POST['acfw30_form_fields'])){ $acfw30_form_fields = wp_kses($_POST['acfw30_form_fields'], $allowed_html); } else { $acfw30_form_fields = ''; }
        
        //design
        if(isset($_POST['acfw30_form_bg_spcolor'])){ $acfw30_form_bg_spcolor = sanitize_text_field($_POST['acfw30_form_bg_spcolor']); } else { $acfw30_form_bg_spcolor = ''; }
        if(isset($_POST['acfw30_form_font_spcolor'])){ $acfw30_form_font_spcolor = sanitize_text_field($_POST['acfw30_form_font_spcolor']); } else { $acfw30_form_font_spcolor = ''; }
        if(isset($_POST['acfw30_form_placeholder_spcolor'])){ $acfw30_form_placeholder_spcolor = sanitize_text_field($_POST['acfw30_form_placeholder_spcolor']); } else { $acfw30_form_placeholder_spcolor = ''; }

        if(isset($_POST['acfw30_form_border_spcolor'])){ $acfw30_form_border_spcolor = sanitize_text_field($_POST['acfw30_form_border_spcolor']); } else { $acfw30_form_border_spcolor = ''; }

        if(isset($_POST['acfw30_form_btn_spcolor'])){ $acfw30_form_btn_spcolor = sanitize_text_field($_POST['acfw30_form_btn_spcolor']); } else { $acfw30_form_btn_spcolor = ''; }

        if(isset($_POST['acfw30_form_btn_text_spcolor'])){ $acfw30_form_btn_text_spcolor = sanitize_text_field($_POST['acfw30_form_btn_text_spcolor']); } else { $acfw30_form_btn_text_spcolor = ''; }

        //notice
        if(isset($_POST['acfw30_form_notice_email'])){ $acfw30_form_notice_email = sanitize_email($_POST['acfw30_form_notice_email']); } else { $acfw30_form_notice_email = ''; }
        if(isset($_POST['acfw30_form_notice_title'])){ $acfw30_form_notice_title = sanitize_text_field($_POST['acfw30_form_notice_title']); } else { $acfw30_form_notice_title = ''; }
        if(isset($_POST['acfw30_form_notice_text'])){ $acfw30_form_notice_text = wp_kses($_POST['acfw30_form_notice_text'], $allowed_html); } else { $acfw30_form_notice_text = ''; }

        //field
        update_post_meta($post_id, 'acfw30_form_fields', acfw30_validate_data("3000", "n", $acfw30_form_fields));
       
        //design
        update_post_meta($post_id, 'acfw30_form_bg_spcolor', acfw30_validate_data("7", "n", $acfw30_form_bg_spcolor));
        update_post_meta($post_id, 'acfw30_form_font_spcolor', acfw30_validate_data("7", "n", $acfw30_form_font_spcolor));
        update_post_meta($post_id, 'acfw30_form_placeholder_spcolor', acfw30_validate_data("7", "n", $acfw30_form_placeholder_spcolor));
        update_post_meta($post_id, 'acfw30_form_border_spcolor', acfw30_validate_data("7", "n", $acfw30_form_border_spcolor));
        update_post_meta($post_id, 'acfw30_form_btn_spcolor', acfw30_validate_data("7", "n", $acfw30_form_btn_spcolor));
        update_post_meta($post_id, 'acfw30_form_btn_text_spcolor', acfw30_validate_data("7", "n", $acfw30_form_btn_text_spcolor));

        //notice
        update_post_meta($post_id, 'acfw30_form_notice_email', acfw30_validate_data("300", "n", $acfw30_form_notice_email));
        update_post_meta($post_id, 'acfw30_form_notice_title', acfw30_validate_data("300", "n", $acfw30_form_notice_title));
        update_post_meta($post_id, 'acfw30_form_notice_text', acfw30_validate_data("3000", "n", $acfw30_form_notice_text)); 

        //clear cache
        if(class_exists('comet_cache')) comet_cache::clear();
        if(class_exists('autoptimizeCache')) autoptimizeCache::clearall();
        if(function_exists ('wp_cache_clear_cache')) wp_cache_clear_cache();
    }
}