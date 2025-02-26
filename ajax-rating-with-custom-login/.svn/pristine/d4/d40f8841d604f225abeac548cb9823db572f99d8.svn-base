<?php
//plugin setting page


add_action('admin_menu','mith_arcl_plugin_settings');
add_action('admin_init','mith_arcl_plugin_options');

function mith_arcl_plugin_settings() {
	
add_menu_page('AJAX RATING',
				'AJAX RATING' ,
				'administrator',
				'mith-arcl-ajax-rating',
				'mith_arcl_plugin_settings_page',
				'dashicons-star-filled',
				'90'
				);
}

function mith_arcl_plugin_options() {
register_setting( 'x-data-group', 'rated_text' );
register_setting( 'x-data-group', 'successfully_rated' );
register_setting( 'x-data-group', 'submittext' );
}
function mith_arcl_plugin_settings_page() { ?>
<div class="wrap">

<h2><?php _e( 'Ajax Rating Settings', 'mith_arcl' ); ?></h2>

<form action="options.php" method="post">

<?php settings_fields( 'x-data-group' ) ?>
<?php do_settings_sections('x-data-group'); ?>
<p>
<label id="rated_text">Please enter already rated text</label>
<?php $rated_text = esc_attr(get_option('rated_text'));?>
<input type="text" name="rated_text" value="<?php echo $rated_text;?>">
</p>


<p>
<label id="successfully_rated">Please enter successfully rated text</label>
<?php $successfully_rated = esc_attr(get_option('successfully_rated'));?>
<input type="text" name="successfully_rated" value="<?php echo $successfully_rated;?>">
</p>



<p>
<label id="submittext">Please enter Submit text</label>
<?php $submittext = esc_attr(get_option('submittext'));?>
<input type="text" name="submittext" value="<?php echo $submittext;?>">
</p>

<?php submit_button();?>
</form>

<p> This plugin is made by <a href="https://wordpress.org/support/profile/anand23">Anand Agrawal</a></p>

</div>

<?php } ?>