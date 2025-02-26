<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.ivisa.com/
 * @since      1.0.0
 *
 * @package    Ivisa
 * @subpackage Ivisa/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
  //Grab all options from database
  $options = get_option($this->plugin_name);
?>
        
<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>


   <div class="" style="background-color:#FFFFFF; padding:10px; border:1px solid gray">
   
<p><?php _e('To use the plugin either add this piece of shortcode to your posts or pages', 'ivisa'); ?>:</p>

<p>[ivisa_widget]</p>
<br />

<p><?php echo sprintf(__('Or go to the %swidgets page%s and enable the iVisa Widget in your sidebar or footer', 'ivisa'), '<a href="' . get_admin_url(null, 'widgets.php') . '" target="_blank">', '</a>'); ?></p>

<?php if(current_user_can('edit_themes')): ?>
  <br />
	<p><?php _e('Or add this piece of code to where ever you like (such as the header or footer)', 'ivisa'); ?>:</p>
	<p style="font-style: italic;"><?php echo htmlentities('<?php do_action(\'ivisa_widget\'); ?>'); ?></p>
<?php endif; ?>
  


   
   </div>
   
<br /><br />
    <h3>Settings</h3>

    <form method="post" name="ivisa_options" action="options.php">
        <?php 
        do_settings_sections($this->plugin_name);
        settings_fields($this->plugin_name); 
        ?>
        
        
        <fieldset>
            <legend class="screen-reader-text"><span>Settings</span></legend>
            <input type="checkbox" id="<?php echo $this->plugin_name; ?>-poweredby" name="<?php echo $this->plugin_name; ?>[show_powered_by]" value="1" <?php checked(@$options['show_powered_by'], 1); ?>/>
            <label for="<?php echo $this->plugin_name; ?>-poweredby">
                Show "Powered By iVisa" message
            </label>
        </fieldset>
        <br />
        <fieldset>
            <legend class="screen-reader-text"><span>Settings</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-affiliate-code">
                Affiliate Code (Optional): 
            </label>
            <input type="text" id="<?php echo $this->plugin_name; ?>-affiliate-code" name="<?php echo $this->plugin_name; ?>[affiliate_code]" value="<?php echo isset($options['affiliate_code'])? $options['affiliate_code'] : ''?>"/>
            <br />&nbsp;&nbsp;<b>Note:</b> You can register for an affiliate code at <a href="https://www.ivisa.com/affiliates" target="_blank">https://www.ivisa.com/affiliates</a><Br /><br />
        </fieldset>
        
        <fieldset style="display:none">
            <legend class="screen-reader-text"><span>Settings</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-smallversion">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-smallversion" name="<?php echo $this->plugin_name; ?>[smallversion]" value="1"/>
                <span><?php esc_attr_e('Use small version', $this->plugin_name); ?></span>
            </label>
        </fieldset>

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>

</div>