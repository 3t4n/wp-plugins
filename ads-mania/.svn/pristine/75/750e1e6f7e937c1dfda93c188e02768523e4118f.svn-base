<div class="wrap"> 
        <h2><?php echo __('Ads Settings','adsmania') ?></h2>
        <p><?php echo __('Control General Options of Ads Mania','adsmania') ?></p>
        <?php echo "
                <script>
                    jQuery(document).ready(function(){
                        jQuery('#ads_sett_ic_bg').wpColorPicker();
                        jQuery('#ads_sett_i_ads').val('".get_option('ads_sett_i_ads','ads_start_at')."');
                        jQuery('#ads_sett_c_ads').val('".get_option('ads_sett_c_ads','rand')."');
                    });
                </script>
                "; ?>
        <form method="post" action="options.php">
            <?php
            // output the settings sections.
            do_settings_sections( "{$this->plugin_name}_settings" );
 
            // output the hidden fields, nonce, etc.
            settings_fields( "{$this->plugin_name}_settings_group" );
            
            // output the submit button.
            submit_button();
            ?>
        </form>
</div>
