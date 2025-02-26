<?php
global $wpdb;
?>

<div class="futura_wrap">

<section><h1><?php _e( 'Detail Setting Page', 'futura' ) ?></h1></section>


<section class="futura_menu">
    <?php $this->futura_admin_menu(); ?>
</section>


<section class="futura_form_section design">
<h2><?php _e( 'Display Setting', 'futura' ) ?></h2>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura-setting">
    <dl>
        <dt>
            <h3><?php _e( 'Display Items Setting', 'futura' ) ?></h3>
            <?php _e( 'Please select items you want to show for PC/SP each.', 'futura' ); ?>
        </dt>
        <dd>
            <p><u>PC</u></p>
                <input type="checkbox" name="futura_items_display[]" value="thumbnail_pc" <?php if(preg_match('/thumbnail_pc/', get_option('futura_items_display'))){print 'checked';} ?>>&emsp;<?php _e( 'Thumbnail', 'futura' ) ?>&emsp;&emsp; 
                <input type="checkbox" name="futura_items_display[]" value="title_pc" <?php if(preg_match('/title_pc/', get_option('futura_items_display'))){print 'checked';} ?>>&emsp;<?php _e( 'Title', 'futura' ) ?>&emsp;&emsp; 
                <input type="checkbox" name="futura_items_display[]" value="content_pc" <?php if(preg_match('/content_pc/', get_option('futura_items_display'))){print 'checked';} ?>>&emsp;<?php _e( 'Content', 'futura' ) ?>&emsp;&emsp;
                <input type="checkbox" name="futura_items_display[]" value="author_pc" <?php if(preg_match('/author_pc/', get_option('futura_items_display'))){print 'checked';} ?>>&emsp;<?php _e( 'Author', 'futura' ) ?>&emsp;&emsp;
            <p><u>SP</u></p>
                <input type="checkbox" name="futura_items_display[]" value="thumbnail_sp" <?php if(preg_match('/thumbnail_sp/', get_option('futura_items_display'))){print 'checked';} ?>>&emsp;<?php _e( 'Thumbnail', 'futura' ) ?>&emsp;&emsp; 
                <input type="checkbox" name="futura_items_display[]" value="title_sp" <?php if(preg_match('/title_sp/', get_option('futura_items_display'))){print 'checked';} ?>>&emsp;<?php _e( 'Title', 'futura' ) ?>&emsp;&emsp; 
                <input type="checkbox" name="futura_items_display[]" value="content_sp" <?php if(preg_match('/content_sp/', get_option('futura_items_display'))){print 'checked';} ?>>&emsp;<?php _e( 'Content', 'futura' ) ?>&emsp;&emsp;
                <input type="checkbox" name="futura_items_display[]" value="author_sp" <?php if(preg_match('/author_sp/', get_option('futura_items_display'))){print 'checked';} ?>>&emsp;<?php _e( 'Author', 'futura' ) ?>&emsp;&emsp;
        </dd>

    </dl>

    <h2><?php _e( 'Display Period', 'futura' ) ?></h2>
    <p><?php _e( 'Posts of this period will be displayed with priority.', 'futura' ) ?></p>
    <select name="futura_related_post_period">
        <option value="0"><?php _e( 'all period', 'futura' ) ?></option>
        <option value="1"><?php _e( 'In One Month', 'futura' ) ?></option>
        <option value="3"><?php _e( 'In Three Month', 'futura' ) ?></option>
        <option value="6"><?php _e( 'In Six Month', 'futura' ) ?></option>
        <option value="12"><?php _e( 'In One Year', 'futura' ) ?></option>
    </select>
    <br>
    <br>

    <input type="hidden" name="futura_display_setting" value="1">    
    <input name="futura-display-setting-submit" id="futura-display-setting-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
</form>

</section>



<section class="futura_form_section">
<h2><?php _e( 'Custom Post Setting', 'futura' ) ?></h2>
<p><?php _e( 'Select Custom Post you want to use.', 'futura' ) ?></p>
<p><?php _e( '"POST" is used though no choice here.', 'futura' ) ?></p>
<p><small><?php _e( '*Related posts are shown from same post type.', 'futura' ) ?></small></p>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura-setting">
    <input type="hidden" name="futura-custom_post_setting" value="1">
    <select name="custom_post_types[]" id="futura_custom_post_setting" class="multi_select" multiple>
    <?php
    $results = $wpdb->get_results( "select distinct post_type from $wpdb->posts order by post_type" );
    $fields_array = explode(",", get_option('futura_custom_post_setting'));
    ?>
    <?php
    foreach($results as $field):
        $value = $field->post_type;
        if($value == "post"){continue;}
        ?>
        <option value="<?php print $value; ?>" <?php if(in_array($value, $fields_array)){print "selected";} ?>><?php print $value; ?></option>
        <?php
    endforeach;
    ?>
    </select>&emsp;
    <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
</form>
</section>


<section class="futura_form_section">
<h2><?php _e( 'Custom Posts Search Setting', 'futura' ) ?></h2>
<p><?php _e( 'Select Custom Post you do not want to show for related posts which you selected above. If you want to use for search function, please do not select here.', 'futura' ) ?></p>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura-setting">
    <input type="hidden" name="futura_custom_post_not_show_setting" value="1">
    <select name="custom_post_types_not_show[]" id="futura_custom_post_not_show_setting" class="multi_select" multiple>
    <?php
    $fields_array = explode(",", get_option('futura_custom_post_not_show_setting'));
    ?>
    <?php
    foreach($results as $field):
        $value = $field->post_type;
        if($value == "post"){continue;}
        ?>
        <option value="<?php print $value; ?>" <?php if(in_array($value, $fields_array)){print "selected";} ?>><?php print $value; ?></option>
        <?php
    endforeach;
    ?>
    </select>&emsp;
    <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
</form>
</section>


<section>
<h2><?php _e( 'Custom Field Setting', 'futura' ) ?></h2>
<p><?php _e( 'Input custom field name you want to analyze. Please use comma for multiple words.', 'futura' ) ?></p>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura-setting" class="futura-custom_field_setting">
    <input type="hidden" name="futura-custom_field_setting" value="1">
    <input type="text" value="<?php print get_option('futura_custom_fields_setting'); ?>" name="custom_fields" style="width:50%;">
    &emsp;
    <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
</form>
</section>



<section>
<h2><?php _e( 'Record Setting', 'futura' ) ?></h2>
<p><?php _e( 'Check this to recored click for improving related posts.', 'futura' ) ?></p>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura-setting">
    <input type="hidden" name="futura-record_click" value="1">
    <select name="futura_record_setting" id="futura_record_setting" class="multi_select">
        <option value="0"><?php _e( 'Not Selected', 'futura' ) ?></option>
        <option value="1" <?php if(get_option('futura_record_setting')){print ' selected';} ?>><?php _e( 'Select', 'futura' ) ?></option>
        <?php
        ?>
    </select>&emsp;
    <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
</form>
</section>

<?php $this->admin_footer_area(); ?>

</div>

