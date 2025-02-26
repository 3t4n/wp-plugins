<div class="wrap"> 
   <h2><?php echo _e("Cyberimpact Display Settings", "wp-cyber")?></h2> 
    <form method="post" action="options.php">
        <fieldset> 
        <?php @settings_fields('wp_cyber_form'); ?> 
        <?php @do_settings_fields('wp_cyber_form'); ?>
        <?php $cyber_display =  get_option('cyber_display');?>
        <?php if ( isset($_REQUEST['settings-updated']) && $_REQUEST['settings-updated'] == true && !count(get_settings_errors('wp_cyber_form') )) : ?>
            <div id='message' class='updated below-h2'><p><strong><?php echo _e( 'Display settings saved', 'wp-cyber' ); ?></strong></p></div>
        <?php endif; ?> 
        <table class="form-table"> 
            <tr valign="top"> 
                <th scope="row"><input type='checkbox' name='cyber_display[custom]' id='cyber_display_custom' value='1' <?php if(isset($cyber_display['custom']) && $cyber_display['custom'] == '1') echo 'checked'; ?> > <label for='cyber_display_custom'><?php echo _e("Custom styling", "wp-cyber")?></label></th> 
                <td>&nbsp;</td> 
            </tr> 
            <tr valign="top"> 
                <th scope="row"><label for="cyber_display_textcolor"><?php echo __("Text Color", "wp-cyber")?></label></th> 
                <td>#<input type="text" name="cyber_display[textcolor]" id="cyber_display_textcolor" value="<?php echo  $cyber_display['textcolor']?>" /></td> 
            </tr> 
            <tr valign="top"> 
                <th scope="row"><label for="cyber_display_backgroundcolor"><?php echo _e("Background Color", "wp-cyber")?></label></th> 
                <td>#<input type="text" name="cyber_display[backgroundcolor]" id="cyber_diplay_backgroundcolor" value="<?php echo  $cyber_display['backgroundcolor']?>" /></td> 
            </tr> 
            <tr valign="top"> 
                <th scope="row"><label for="cyber_display_bordercolor"><?php echo _e("Border Color", "wp-cyber")?></label></th> 
                <td>#<input type="text" name="cyber_display[bordercolor]" id="cyber_display_bordercolor" value="<?php echo  $cyber_display['bordercolor']?>" /></td> 
            </tr> 
            <tr valign="top"> 
                <th scope="row"><label for="cyber_display_borderwidth"><?php echo _e("Border Width", "wp-cyber")?></label></th> 
                <td><input type="text" name="cyber_display[borderwidth]" id="cyber_display_borderwidth" value="<?php echo  $cyber_display['borderwidth']?>" />px</td> 
            </tr> 
        </table> 
        <?php @submit_button(); ?> 
        </fieldset>
    </form> 
</div> 