
<?php 
	global $as_woo_owl_setting_error;
	$as_woo_set_value = get_option('as_woo_owl_all_settings_save');
	
?>
<div class="as_woo_owl_main_body">
	<header class="as_woo_owl_main_header">
		<h2>As woocomerce with owl carousel</h2>
	</header>

	<div class="as_woo_owl_content">
		<form action="" method="POST">
			<div class="as_as_woo_bar">
				<div class="as_main_width">
					<div class="as_woo_owl_header">
						<div id="as_woo_owl_header_select" onclick="selectText('as_woo_owl_header_select')">[as_featured_product]</div>
					</div>

<?php
$as_woo_set_err = $as_woo_owl_setting_error->get_error_message('setting_success');
if (!empty($as_woo_set_err)) {
	?>

	<div class="as_woo_owl_save_conf">
		<strong><?php echo $as_woo_set_err; ?></strong><span>x</span>
	</div>

	<?php
}


?>
					<div class="as_woo_owl_body">
						<div class="as_woo_owl_admin_item">
							<h3>Upload loader gif </h3>
							<p>Please Uploader a Carousel Loader Gif Image</p>
							<input id="loader_gif" type="text" name="loader_gif" value="<?php echo $as_woo_set_value['loader_gif']; ?>" placeholder="Upload loader gif">
							<a id="as_woo_owl_set_loader_image" href=""style="margin:10px 0;"  class="button right">Upload</a>
						</div>
						<div class="as_woo_owl_admin_item">
							<h3>Add To Cart loader gif </h3>
							<p>Please Uploader An Add To Cart Loader Gif Image</p>
							<input id="as_atc_loader_gif" type="text" name="as_atc_loader_gif" value="<?php echo $as_woo_set_value['as_atc_loader_gif']; ?>" placeholder="Add To Cart loader gif">
							<a id="as_woo_owl_atc_loader_image" href="" style="margin:10px 0;"  class="button right">Upload</a>
						</div>
						<div class="as_woo_owl_admin_item">
							<h3>Carousel Loader Background Color</h3>
							<p>Select Carousel Loader Background Color</p>
							<input id="as_woo_loader_bg_color" type="text" name="as_woo_loader_bg_color" value="<?php echo (!empty($as_woo_set_value['as_woo_loader_bg_color'])) ? $as_woo_set_value['as_woo_loader_bg_color'] : '#ffffff' ; ?>" placeholder="Carousel Loader Background Color">
						</div>
						<div class="as_woo_owl_admin_item">
							<h3>Carousel Add To Cart Background Color</h3>
							<p>Select Carousel Add To Cart Background Color</p>
							<input id="as_woo_add_to_cart_bg_color" type="text" name="as_woo_add_to_cart_bg_color" value="<?php echo (!empty($as_woo_set_value['as_woo_add_to_cart_bg_color'])) ? $as_woo_set_value['as_woo_add_to_cart_bg_color'] : '#000000' ; ?>" placeholder="Carousel Add To Cart Background Color">
						</div>
						<div class="as_woo_owl_admin_item">
							<h3>Background Opacity</h3>
							<p style="margin: 15px 0 30px 0;">Select Carousel Background Opacity</p>
							<input id="as_woo_loader_bg_opacity" type="hidden" name="as_woo_loader_bg_opacity" value="<?php echo (!empty($as_woo_set_value['as_woo_loader_bg_opacity'])) ? $as_woo_set_value['as_woo_loader_bg_opacity'] : 10 ; ?>">
						</div>
						<div class="as_woo_owl_admin_item">
							<h3>Add To Cart Background Opacity</h3>
							<p style="margin: 15px 0 30px 0;">Select Carousel Add To Cart Background Opacity</p>
							<input id="as_woo_add_to_cart_bg_opacity" type="hidden" name="as_woo_add_to_cart_bg_opacity" value="<?php echo (!empty($as_woo_set_value['as_woo_add_to_cart_bg_opacity'])) ? $as_woo_set_value['as_woo_add_to_cart_bg_opacity'] : 6 ; ?>">
						</div>

						<div class="as_woo_owl_admin_item">
							<h3>Set image width height</h3>
							<p>Set image width height default <strong>Width 300 and Height 200</strong>. This function is work on next upload</p>
							<input style="width: 49%;float:left; padding: 19px 10px;box-sizing: border-box;" id="as_woo_width" type="number" name="as_woo_width" value="<?php echo $as_woo_set_value['as_woo_width']; ?>" placeholder="Width">

							<input style="width: 49%;float:right; padding: 19px 10px;box-sizing: border-box;" id="as_woo_width" type="number" name="as_woo_height" value="<?php echo $as_woo_set_value['as_woo_height']; ?>" placeholder="Height">
						</div>

						<div class="as_woo_owl_admin_item">
							<h3><input <?php echo ($as_woo_set_value['as_woo_checkbox'] == 'yes') ?'checked': null ; ?> id="as_woo_checkbox" type="checkbox" name="as_woo_checkbox" value=""><label for="as_woo_checkbox">Crop image</label></h3>							
						</div>


						<div class="as_woo_owl_admin_item">
							<h3>Description limit</h3>
							<p>How many word you need?? Default <strong>100</strong>. If you no need just remove value or put 0</p>
							<input name="as_woo_d_limit" type="number" style="padding: 19px 10px;" placeholder="Description limit" value="<?php echo $as_woo_set_value['as_woo_d_limit']; ?>">
						</div>

					</div>
				</div>
			</div>

			<div class="as_woo_owl_submit_button">
				<input style="float:left;" class="button button-primary dsd" type="submit" value="Save" name="as_woo_owl_setting_submit">
				<span class="button right" id="as_woo_owl_setting_reset">Reset</span>
			</div>


		</form>
	</div>
</div>