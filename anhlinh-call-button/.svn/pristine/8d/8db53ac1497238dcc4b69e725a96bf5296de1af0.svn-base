<div class="wrap">
	<h2>Setting Anhlinh Contact List</h2>
	<?php settings_errors($this->_menuSlug, false, false);?>
	<p>You can leave it blank if you don't want it to be displayed</p>
	<form method="post" action="options.php" id="<?php echo esc_html($this->_menuSlug); ?>" enctype="multipart/form-data">
		<?php echo settings_fields('anhlinh_contact_list_options');?>
        <?php echo do_settings_sections($this->_menuSlug);?>
		<p class="submit">
			<input type="submit" name="submit" value="Save change"  class="button button-primary" >
		</p>
	</form>
</div>