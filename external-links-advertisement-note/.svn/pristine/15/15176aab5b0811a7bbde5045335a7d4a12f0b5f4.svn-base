<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.daivdschlegl.at
 * @since      1.0.0
 *
 * @package    Bfelan
 * @subpackage Bfelan/admin/partials
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h2>External Links Advertisement Note <?php _e('Options', $this->plugin_name); ?></h2>
	
	<?php _e('<p>Welcome to Blogofant External Links Advertisement Note (BF-ELAN)! This plugin will add word, symbols or characters after your external link.</p><p>You have to choose at first your desired character, word or symbor. More you can add a border around the word as well as hide the underline.</p><p>If you have questions just send me a message. I\'m always happy to help.</p>', 'bf-elan-intro');?>

    <form method="post" name="cleanup_options" action="options.php">
		<?php
			//Grab all options
			$options = get_option($this->plugin_name);
			//$example_select = ( isset( $options['example_select'] ) && ! empty( $options['example_select'] ) ) ? esc_attr( $options['example_select'] ) : '1';
			$tx_text = ( isset( $options['tx_text'] ) && ! empty( $options['tx_text'] ) ) ? esc_attr( $options['tx_text'] ) : '*';
			$cb_underline = ( isset( $options['cb_underline'] ) && ! empty( $options['cb_underline'] ) ) ? 1 : 0;
			$cb_border = ( isset( $options['cb_border'] ) && ! empty( $options['cb_border'] ) ) ? 1 : 0;
			$sl_textsize = ( isset( $options['sl_textsize'] ) && ! empty( $options['sl_textsize'] ) ) ? esc_attr( $options['sl_textsize'] ) : '1';
			settings_fields($this->plugin_name);
			do_settings_sections($this->plugin_name);
			// Sources: - http://searchengineland.com/tested-googlebot-crawls-javascript-heres-learned-220157
			//          - http://dinbror.dk/blog/lazy-load-images-seo-problem/
			//          - https://webmasters.googleblog.com/2015/10/deprecating-our-ajax-crawling-scheme.html
		?>
		
		<br>

		<!-- Text -->
		<fieldset>
			<p><?php _e( 'Character or word to mark links. (\2197, Ads, Advertisement, *):', $this->plugin_name ); ?></p>
			<legend class="screen-reader-text">
				<span><?php _e( 'Character or word to mark links. (\2197, Ads, Advertisement, *):', $this->plugin_name ); ?></span>
			</legend>
			<input type="text" class="tx_text" id="<?php echo $this->plugin_name; ?>-tx_text" name="<?php echo $this->plugin_name; ?>[tx_text]" value="<?php if( ! empty( $tx_text ) ) echo $tx_text; else echo 'default'; ?>"/>
		</fieldset>
		
		<br>	

		<!-- Checkbox Hide underline -->
		<fieldset>
			<label for="<?php echo $this->plugin_name; ?>-cb_underline">
				<input type="checkbox" id="<?php echo $this->plugin_name; ?>-cb_underline" name="<?php echo $this->plugin_name; ?>[cb_underline]" value="1" <?php checked( $cb_underline, 1 ); ?> />
				<span><?php esc_attr_e('Hide Underline', $this->plugin_name); ?></span>
			</label>
		</fieldset>

		<br>

		<!-- Checkbox Show Border -->
		<fieldset>
			<!--<p><?php _e( 'Show Border', $this->plugin_name ); ?></p>
			<legend class="cb_border">
				<span><?php _e( 'Show Border', $this->plugin_name ); ?></span>
			</legend>-->
			<label for="<?php echo $this->plugin_name; ?>-cb_border">
				<input type="checkbox" id="<?php echo $this->plugin_name; ?>-cb_border" name="<?php echo $this->plugin_name; ?>[cb_border]" value="1" <?php checked( $cb_border, 1 ); ?> />
				<span><?php esc_attr_e('Show Border', $this->plugin_name); ?></span>
			</label>
		</fieldset>
		
		<fieldset>
        <p><?php _e( 'Textsize', $this->plugin_name ); ?></p>
        <legend class="screen-reader-text">
            <span><?php _e( 'Textsize', $this->plugin_name ); ?></span>
        </legend>
        <label for="sl_textsize">
            <select name="<?php echo $this->plugin_name; ?>[sl_textsize]" id="<?php echo $this->plugin_name; ?>-example_select">
                <option <?php if ( $sl_textsize == 'small' ) echo 'selected="selected"'; ?> value="small">Small</option>
                <option <?php if ( $sl_textsize == 'medium' ) echo 'selected="selected"'; ?> value="medium">Medium</option>
				<option <?php if ( $sl_textsize == 'large' ) echo 'selected="selected"'; ?> value="large">Large</option>
            </select>
        </label>
		</fieldset>
		
		<br>
		
		<p>
			More information about the plugin @ <a href="https://www.blogofant.de/elan">https://www.blogofant.de/elan</a>
		</p>

		<!-- Button Submit -->
		<?php submit_button( __( 'Save all changes', $this->plugin_name ), 'primary','submit', TRUE ); ?>
		
    </form>
</div>
