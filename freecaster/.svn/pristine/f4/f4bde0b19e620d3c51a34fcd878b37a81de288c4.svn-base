<link rel='stylesheet' href='<?php echo plugins_url('fc_style.css', __FILE__) ?>' type='text/css'/>

<style>
    #TB_window {
        width: 690px !important;
        height: 305px !important;
    }
</style>

<div id="menu">
    <div class="choice" data-page="search"><img src="<?php echo plugin_dir_url(__FILE__); ?>img/search_big_icon.png"/><br><?php _e('Search for a video', 'freecaster') ?></div>
    <div class="choice" data-page="upload"><img src="<?php echo plugin_dir_url(__FILE__); ?>img/upload_big_icon.png"/><br><?php _e('Send a video', 'freecaster') ?></div>
</div>

<script>
    jQuery(document).ready(function ($)
    {
        $('.choice').click(function ()
        {
            $('#TB_ajaxContent').load('<?php echo site_url(); ?>/?fc_ajax=' + $(this).attr('data-page'));
        });
    });
</script>