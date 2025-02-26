<?php
function as_login_admin_option(){

    add_settings_section('as_login_section','<span class="as_heading">Logo settings</span>', 'as_logo_setting_function','as_logins');

    add_settings_field('as_login_url', 'Logo url' , 'as_logo_url_display','as_logins', 'as_login_section');

    add_settings_field('as_login_title', 'Logo title', 'as_login_title_display','as_logins', 'as_login_section');

    add_settings_field('as_login_image', 'Logo image', 'as_login_image_display','as_logins', 'as_login_section');

    add_settings_field('as_logo_size', 'Logo size', 'as_logo_size_display','as_logins', 'as_login_section');

// section two

    add_settings_section('as_login_box_section','<span class="as_heading">Login settings</span>', 'as_login_settings_function','as_logins');

    add_settings_field('as_login_box_bg_color', 'Login box bg color', 'as_login_box_bg_color_display','as_logins', 'as_login_box_section');

    add_settings_field('as_login_text_color', 'Login text color', 'as_login_text_color_display','as_logins', 'as_login_box_section');

    add_settings_field('as_login_width', 'Width', 'as_login_width_display','as_logins', 'as_login_box_section');

    add_settings_field('as_login_input_color', 'Login input field color', 'as_login_input_color_display','as_logins', 'as_login_box_section');

    add_settings_field('as_login_input_text_color', 'Login input field text color', 'as_login_input_text_color_display','as_logins', 'as_login_box_section');

    add_settings_field('as_message_bg_color', 'Message bg color', 'as_message_bg_color_display','as_logins', 'as_login_box_section');

    add_settings_field('as_message_text_color', 'Message text color', 'as_message_text_color_display','as_logins', 'as_login_box_section');

    add_settings_field('as_message_border_width', 'Message border width', 'as_message_border_width_display','as_logins', 'as_login_box_section');

    add_settings_field('as_message_border_color', 'Message border color', 'as_message_border_colot_display','as_logins', 'as_login_box_section');

// section three


    add_settings_section('as_login_other_link_seiing','<span class="as_heading">Others links settings</span>', 'as_login_other_link_settings_display','as_logins');


    add_settings_field('as_login_other_link', 'Hide others link', 'as_login_other_link_display','as_logins', 'as_login_other_link_seiing');

    add_settings_field('as_login_other_link_color', 'Others link color', 'as_login_other_link_color_display','as_logins', 'as_login_other_link_seiing');

    add_settings_field('as_login_other_link_hv_color', 'Others link hover color', 'as_login_other_link_hv_color_display','as_logins', 'as_login_other_link_seiing');

    add_settings_field('as_login_other_link_fz', 'Others link font size', 'as_login_other_link_fz_display','as_logins', 'as_login_other_link_seiing');

// section four

    add_settings_section('as_background','<span class="as_heading">Bankground settings</span>', 'as_background_settings_display','as_logins');

    add_settings_field('as_bg_color', 'Bankground color', 'as_bg_color_display','as_logins', 'as_background');
    add_settings_field('as_bg_image', 'Bankground image', 'as_bg_image_display','as_logins', 'as_background');
    add_settings_field('as_bg_repeat', 'Bankground repeat', 'as_bg_repeat_display','as_logins', 'as_background');
    add_settings_field('as_bg_size', 'Bankground size', 'as_bg_size_display','as_logins', 'as_background');

//section five

    add_settings_section('as_button','<span class="as_heading">Button settings</span>', 'as_button_settings_display','as_logins');

    add_settings_field('as_button_color', 'Button color', 'as_button_color_display','as_logins', 'as_button');

    add_settings_field('as_button_hover_color', 'Button hover color', 'as_button_hover_color_display','as_logins', 'as_button');
    add_settings_field('as_button_border_color', 'Button border color', 'as_button_border_color_display','as_logins', 'as_button');



     register_setting('as_login_section','as_opt_save');

     register_setting('as_login_box_section','as_opt_save');

     register_setting('as_login_other_link_seiing','as_opt_save');

     register_setting('as_background','as_opt_save');

     register_setting('as_button','as_opt_save');
}
add_action('admin_init', 'as_login_admin_option');

function as_logo_setting_function(){
    return false;
}

function as_login_settings_function(){
    return false;
}

function as_login_other_link_settings_display(){
?>
<p>Others link means Log in | Lost your password? etc</p>
<?php
}
function as_background_settings_display(){
return false;
}
function as_button_settings_display(){
return false;
}

function as_button_border_color_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_button_border_color = (isset($as_opt['as_button_border_color'])) ? $as_opt['as_button_border_color'] : '' ;
    ?>

<input type="text" class="as_wp_color" name="as_opt_save[as_button_border_color]" value="<?php echo $as_button_border_color; ?>">

    <?php
}

function as_button_color_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_button_color = (isset($as_opt['as_button_color'])) ? $as_opt['as_button_color'] : '' ;
    ?>

<input type="text" class="as_wp_color" name="as_opt_save[as_button_color]" value="<?php echo $as_button_color; ?>">

    <?php
}
function as_button_hover_color_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_button_hover_color = (isset($as_opt['as_button_hover_color'])) ? $as_opt['as_button_hover_color'] : '' ;
    ?>

<input type="text" class="as_wp_color" name="as_opt_save[as_button_hover_color]" value="<?php echo $as_button_hover_color; ?>">

    <?php
}


function as_bg_size_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_bg_size = (isset($as_opt['as_bg_size'])) ? $as_opt['as_bg_size'] : '' ;
    ?>
<select name="as_opt_save[as_bg_size]" class="regular-text" >
    <option value="contain" <?php echo ($as_bg_size == 'contain') ? 'selected' : '' ; ?> >Contain</option>
    <option value="cover" <?php echo ($as_bg_size == 'cover') ? 'selected' : '' ; ?> >Cover</option>
    <option value="inherit" <?php echo ($as_bg_size == 'inherit') ? 'selected' : '' ; ?> >Inherit</option>
</select>

    <?php
}


function as_bg_repeat_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_bg_repeat = (isset($as_opt['as_bg_repeat'])) ? $as_opt['as_bg_repeat'] : '' ;
    ?>
<select name="as_opt_save[as_bg_repeat]" class="regular-text" >
    <option value="repeat" <?php echo ($as_bg_repeat == 'repeat') ? 'selected' : '' ; ?> >Repeat</option>
    <option value="no-repeat" <?php echo ($as_bg_repeat == 'no-repeat') ? 'selected' : '' ; ?> >No Repeat</option>
    <option value="repeat-x" <?php echo ($as_bg_repeat == 'repeat-x') ? 'selected' : '' ; ?> >Repeat x</option>
    <option value="repeat-y" <?php echo ($as_bg_repeat == 'repeat-y') ? 'selected' : '' ; ?> >Repeat y</option>
    <option value="space" <?php echo ($as_bg_repeat == 'space') ? 'selected' : '' ; ?> >Space</option>
    <option value="round" <?php echo ($as_bg_repeat == 'round') ? 'selected' : '' ; ?> >Round</option>
</select>

    <?php
}


function as_bg_color_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_bg_color = (isset($as_opt['as_bg_color'])) ? $as_opt['as_bg_color'] : '' ;
    ?>

    <input type="text" name="as_opt_save[as_bg_color]" class="as_wp_color" value="<?php echo $as_bg_color; ?>">

    <?php
}
function as_bg_image_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_bg_image = (isset($as_opt['as_bg_image'])) ? $as_opt['as_bg_image'] : '' ;?>

    <input type="url" value="<?php echo $as_bg_image; ?>" class="regular-text" id="as_bg_url" name="as_opt_save[as_bg_image]">
    <button id="as_bg_image">Set Image ID</button>


<?php
}



function as_logo_size_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_logo_size = (isset($as_opt['as_logo_size'])) ? $as_opt['as_logo_size'] : '' ;
    ?>

    <input type="hidden" name="as_opt_save[as_logo_size]" class="as_logo_width_height" value="<?php echo $as_logo_size; ?>">

    <?php
}


function as_login_other_link_color_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_login_other_link_color = (isset($as_opt['as_login_other_link_color'])) ? $as_opt['as_login_other_link_color'] : '' ;
    ?>

<input type="text" class="as_wp_color" value="<?php echo $as_login_other_link_color; ?>" name="as_opt_save[as_login_other_link_color]">

    <?php
}
function as_login_other_link_hv_color_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_login_other_link_hv_color = (isset($as_opt['as_login_other_link_hv_color'])) ? $as_opt['as_login_other_link_hv_color'] : '' ;
    ?>

<input type="text" class="as_wp_color" value="<?php echo $as_login_other_link_hv_color; ?>" name="as_opt_save[as_login_other_link_hv_color]">

    <?php
}
function as_login_other_link_fz_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_login_other_link_fz = (isset($as_opt['as_login_other_link_fz'])) ? $as_opt['as_login_other_link_fz'] : '' ;
    ?>


<input type="hidden" name="as_opt_save[as_login_other_link_fz]" class="ranj_width_three" value="<?php echo $as_login_other_link_fz; ?>">

    <?php
}

function as_login_input_text_color_display(){
$as_opt = (array)get_option('as_opt_save');
$as_login_input_text_color = (isset($as_opt['as_login_input_text_color'])) ? $as_opt['as_login_input_text_color'] : '' ;
?>

<input type="text" class="as_wp_color" value="<?php echo $as_login_input_text_color; ?>" name="as_opt_save[as_login_input_text_color]">

<?php
}
function as_login_input_color_display(){
$as_opt = (array)get_option('as_opt_save');
$as_login_input_color = (isset($as_opt['as_login_input_color'])) ? $as_opt['as_login_input_color'] : '' ;
?>

<input type="text" class="as_wp_color" value="<?php echo $as_login_input_color; ?>" name="as_opt_save[as_login_input_color]">

<?php
}



function as_message_border_colot_display(){
$as_opt = (array)get_option('as_opt_save');
$as_message_border_color = (isset($as_opt['as_message_border_color'])) ? $as_opt['as_message_border_color'] : '' ;
?>

<input type="text" class="as_wp_color" value="<?php echo $as_message_border_color; ?>" name="as_opt_save[as_message_border_color]">

<?php
}


function as_message_border_width_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_message_border_width = (isset($as_opt['as_message_border_width'])) ? $as_opt['as_message_border_width'] : '2' ;
?>

<input type="hidden" name="as_opt_save[as_message_border_width]" class="ranj_width_two" value="<?php echo $as_message_border_width; ?>">

<?php
}


function as_message_text_color_display(){
$as_opt = (array)get_option('as_opt_save');
$as_message_text_color = (isset($as_opt['as_message_text_color'])) ? $as_opt['as_message_text_color'] : '' ;
?>

<input type="text" class="as_wp_color" value="<?php echo $as_message_text_color; ?>" name="as_opt_save[as_message_text_color]">

<?php
}

function as_message_bg_color_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_message_bg_color = (isset($as_opt['as_message_bg_color'])) ? $as_opt['as_message_bg_color'] : '' ;
?>
<input type="text" class="as_wp_color" value="<?php echo $as_message_bg_color; ?>" name="as_opt_save[as_message_bg_color]">
<?php
}


function as_login_width_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_login_width = (isset($as_opt['as_login_width'])) ? $as_opt['as_login_width'] : '' ;
?>

<input type="hidden" name="as_opt_save[as_login_width]" class="ranj_width" value="<?php echo $as_login_width; ?>">

<?php
}

function as_login_other_link_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_other_link = (isset($as_opt['as_login_other_link']) == 'yes') ? 'checked' : '' ;
?>
<div class="onoffswitch">
    <input type="checkbox" name="as_opt_save[as_login_other_link]" class="onoffswitch-checkbox" id="myonoffswitch" value="yes" <?php echo $as_other_link; ?> >
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
<p>Hide lost password, login etc</p>
<?php
}


function as_login_text_color_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_text_color = (isset($as_opt['as_login_text_color'])) ? $as_opt['as_login_text_color'] : '' ;
?>

<input type="text" class="as_wp_color" name="as_opt_save[as_login_text_color]" value="<?php echo $as_text_color; ?>">

<?php
}


function as_login_box_bg_color_display(){
    $as_opt = (array)get_option('as_opt_save');
    $as_box_color = (isset($as_opt['as_login_box_bg_color'])) ? $as_opt['as_login_box_bg_color'] : '' ;
?>
    <input type="text" class="as_wp_color" name="as_opt_save[as_login_box_bg_color]" value="<?php echo $as_box_color; ?>">
<?php
}


function as_login_image_display(){
     $as_opt = (array)get_option('as_opt_save');
     $as_login_image = (isset($as_opt['as_login_image'])) ? $as_opt['as_login_image'] : '' ;?>

    <input type="url" value="<?php echo $as_login_image; ?>" class="regular-text" id="as_image_url" name="as_opt_save[as_login_image]">
    <button id="as_upload_image">Set Image ID</button>


<?php
}

function as_logo_url_display(){
     $as_opt = (array)get_option('as_opt_save');
     $as_url = (isset($as_opt['as_login_url'])) ? $as_opt['as_login_url'] : '' ;?>

        <input type="url" class="regular-text" name="as_opt_save[as_login_url]" value="<?php echo esc_url($as_url); ?>">
        <p>It will redirect user when logo is clicked</p>

     <?php
}

function as_login_title_display(){
     $as_opt = (array)get_option('as_opt_save');
     $as_title = (isset($as_opt['as_login_title'])) ? $as_opt['as_login_title'] : '' ;
     ?>
        <input type="text" class="regular-text" name="as_opt_save[as_login_title]" value="<?php echo $as_title; ?>">
        <p>Enter Tittle for logo</p>
     <?php
}