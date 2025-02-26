<?php
global $wpdb;
?>

<div class="futura_wrap">

<section><h1><?php _e( 'Search Setting Page', 'futura' ) ?></h1></section>


<section class="futura_menu">
    <?php $this->futura_admin_menu(); ?>
</section>


<?php if($license_key): ?>
<section>
    <div id="result_analyze" style="display:none;margin:0 0 20px -15px;">
        <div class="notice notice-success is-dismissible">
            <p><?php _e( 'Success!', 'futura' ); ?></p>
        </div>
    </div>
</section>
<?php endif; ?>


<?php futura_ajax_script('futura_ajax_post_s_data', 0); ?>


<section class="futura_form_section">
    <h2><?php _e( 'Search Setting', 'futura' ) ?></h2>

    <p><?php _e( 'Please click Analyze Button for initial set up.', 'futura' ) ?></p>
    <p><?php _e( 'After this, new post will be analyze automatically.', 'futura' ) ?></p>
    <p><?php _e( 'You can add custom posts below the button.', 'futura' ) ?></p>

    <?php if ($license_key == ""): ?>
        <p><a href="<?php print FUTURA_LICENSE_SITE_URL; ?>/manage_license?site_url=<?php print get_home_url(); ?>" target="_blank"><?php _e( 'Please get License key.', 'futura' ) ?></a></p>
    <?php else: ?>
        <form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura">
            <input type="hidden" name="futura-analyze" value="1">
            <button type="button" id="futura-analyze" class="button button-primary" ><?php _e( 'analyze', 'futura' ) ?></button>
        </form>
    <?php endif; ?>


</section>    

<section class="futura_form_section">
    <h2><?php _e( 'Custom Post Setting', 'futura' ) ?></h2>
    <p><?php _e( 'Select Custom Post you want to use.', 'futura' ) ?></p>
    <p><?php _e( '"POST" is used though no choice here.', 'futura' ) ?></p>
    <form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura-search">
        <input type="hidden" name="futura_search-custom_post_setting" value="1">
        <select name="custom_post_types_s[]" id="futura_custom_post_setting" class="multi_select" multiple style="height:200px;">
        <?php
        $results = $wpdb->get_results( "select distinct post_type from $wpdb->posts order by post_type" );
        $fields_array = explode(",", get_option('futura_custom_post_types_s'));
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
<p><?php _e( 'Input custom field you want to use with commna.', 'futura' ) ?></p>
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura-search" class="futura-custom_field_setting">
    <input type="hidden" name="futura_search-custom_field_setting" value="1">
    <input type="text" value="<?php print get_option('futura_search-custom_field_setting'); ?>" name="custom_fields" style="width:50%;">
    &emsp;
    <input name="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
</form>
</section>


<div class="futura_overlay">
    <div class="futura_overlay_inner">
        <div class="app">
            <div id="prog-bar" class="progress">
                <div class="progress-bar">
                </div>
                <div style="text-align:center;">now posting</div>
            </div>    
        </div>
    </div>
</div>

<div class="futura_overlay_analyze">
    <div class="futura_overlay_inner">
        <div class="app">
            <div id="prog-bar" class="progress">
                <div class="progress-bar">
                </div>
                <div style="text-align:center;">now analyzing</div>
            </div>    
        </div>
    </div>
</div>

<?php $this->admin_footer_area(); ?>


</div>