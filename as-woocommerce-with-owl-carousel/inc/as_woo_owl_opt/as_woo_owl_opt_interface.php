

<?php 
	global $as_woo_owl_error;
	$as_woo_value = get_option('as_woo_owl_all_opt_save');
	$as_woo_atc_btn = apply_filters('as_woo_owl_atc_btn_filter', array());
	$as_woo_lr_icon = apply_filters('as_woo_lr_icon_filter', array());
	
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

$as_woo_success = $as_woo_owl_error->get_error_message('success');

if (!empty($as_woo_success)) {
	?>

	<div class="as_woo_owl_save_conf">
		<strong><?php echo $as_woo_success; ?></strong><span>x</span>
	</div>

	<?php
}

?>

	
<div class="as_woo_owl_body">
<div class="as_woo_owl_admin_item">
	<h3>Carousel Name </h3>
	<p>Carousel Name <strong>Note!</strong> must be an unique name.</p>
	<?php
	$as_field_error = $as_woo_owl_error->get_error_message('carousel_name_field');

	if (!empty($as_field_error)) {
		echo '<p style="color:red;">'.$as_field_error.'</p>';
	}

	?>
	<input id="carousel_name" type="text" name="carousel_name" value="<?php echo as_woo_owl_get_text_val($as_woo_value['carousel_name']); ?>" placeholder="Carousel Name">
</div>


<div class="as_woo_owl_admin_item" id="as_woo_owl_appand">
<h3>Select type of Product</h3>
<p>Default <strong>Featured products</strong></p>
<select class="as_select" name="as_woo_owl_product_type" id="as_woo_owl_product_type">
	<option <?php echo ($as_woo_value['as_woo_owl_product_type'] == 'def') ? 'selected' : null ; ?> value="def"  >Select an option</option>
	<option <?php echo ($as_woo_value['as_woo_owl_product_type'] == '_featured') ? 'selected' : null ; ?>  value="_featured" >Featured products</option>
	<option <?php echo ($as_woo_value['as_woo_owl_product_type'] == 'category') ? 'selected' : null ; ?> value="category" >Show products by category</option>
	<option <?php echo ($as_woo_value['as_woo_owl_product_type'] == 'all') ? 'selected' : null ; ?> value="all" >Show all products</option>
</select>


<?php
	if ($as_woo_value['as_woo_owl_product_category'] !== 0) {
		as_woo_owl_chack_option();
	}

?>


</div>



<div class="as_woo_owl_admin_item">
	<h3>Items</h3>
	<p>How many show post in Carousel. </p>
	<input id="items" type="number" name="items" value="<?php echo as_woo_owl_get_option($as_woo_value['items']); ?>" placeholder="Items" min="4" max="10">
</div>

<div class="as_woo_owl_admin_item">
<h3>ItemsDesktop</h3>
<p>Select a device width and items default <strong>Width 1199 and Items 4</strong>.</p>
<input id="itemsDesktop_one" type="number" name="itemsDesktop" value="<?php echo as_woo_owl_get_option($as_woo_value['itemsDesktop']); ?>" placeholder="Desktop Width" min="1100" max="2500">

<input id="itemsDesktop_two" type="number" name="itemsDesktop_two" value="<?php echo as_woo_owl_get_option($as_woo_value['itemsDesktop_two']); ?>" placeholder="Desktop Items" min="3" max="8">
</div>

<div class="as_woo_owl_admin_item">
<h3>ItemsDesktopSmall</h3>
<p>Select a device width and items default <strong>Width 980 and Items 3</strong>.</p>
<input id="itemsDesktopSmall_one" type="number" name="itemsDesktopSmall_one" value="<?php echo as_woo_owl_get_option($as_woo_value['itemsDesktopSmall_one']); ?>" placeholder="Desktop Small Width" min="970" max="1500">

<input id="itemsDesktopSmall_two" type="number" name="itemsDesktopSmall_two" value="<?php echo as_woo_owl_get_option($as_woo_value['itemsDesktopSmall_two']); ?>" placeholder="Items Desktop Small Items" min="2" max="8">

</div>

<div class="as_woo_owl_admin_item">
<h3>ItemsTablet</h3>
<p>Select a device width and items default <strong>Width 768 and Items 2</strong>.</p>
<input class="as_left" id="itemsTablet_one" type="number" name="itemsTablet_one" value="<?php echo as_woo_owl_get_option($as_woo_value['itemsTablet_one']); ?>" placeholder="itemsTablet" min="760" max="1000">
<input class="as_right" id="itemsTablet_two" type="number" name="itemsTablet_two" value="<?php echo as_woo_owl_get_option($as_woo_value['itemsTablet_two']); ?>" placeholder="itemsTablet" min="2" max="5">
</div>

<div class="as_woo_owl_admin_item">
<h3>ItemsTabletSmall</h3>
<p>Default <strong>False</strong></p>
<select class="as_select" name="itemsTabletSmall" id="itemsTabletSmall">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['itemsTabletSmall'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['itemsTabletSmall'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['itemsTabletSmall'], 'true'); ?> >True</option>
</select>
</div>


<div class="as_woo_owl_admin_item">
<h3>ItemsMobile</h3>
<p>Select a device width and items default <strong>Width 479 and Items 1</strong>.</p>
<input class="as_left" id="itemsMobile_one" type="number" name="itemsMobile_one" value="<?php echo as_woo_owl_get_option($as_woo_value['itemsMobile_one']); ?>" placeholder="itemsMobile width" min="400" max="600">
<input class="as_right" id="itemsMobile_two" type="number" name="itemsMobile_two" value="<?php echo as_woo_owl_get_option($as_woo_value['itemsMobile_two']); ?>" placeholder="itemsMobile item" min="1" max="3">

</div>


<div class="as_woo_owl_admin_item">
<h3>singleItem</h3>
<p>Default <strong>False</strong></p>
<select class="as_select" name="singleItem" id="singleItem">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['singleItem'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['singleItem'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['singleItem'], 'true'); ?> >True</option>
</select>
</div>


<div class="as_woo_owl_admin_item">
<h3>itemsScaleUp</h3>
<p>Default <strong>False</strong></p>
<select class="as_select" name="itemsScaleUp" id="itemsScaleUp">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['itemsScaleUp'], '1'); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['itemsScaleUp'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['itemsScaleUp'], 'true'); ?> >True</option>
</select>
</div>


<div class="as_woo_owl_admin_item">
<h3>slideSpeed</h3>
<p>Default <strong>200</strong></p>
<input id="slideSpeed" type="number" name="slideSpeed" value="<?php echo as_woo_owl_get_option($as_woo_value['slideSpeed']); ?>" placeholder="slideSpeed" min="150" max="100000">
</div>


<div class="as_woo_owl_admin_item">
<h3>paginationSpeed</h3>
<p>Default <strong>800</strong></p>
<input id="paginationSpeed" type="number" name="paginationSpeed" value="<?php echo as_woo_owl_get_option($as_woo_value['paginationSpeed']); ?>" placeholder="paginationSpeed" min="700" max="100000">
</div>

<div class="as_woo_owl_admin_item">
<h3>rewindSpeed</h3>
<p>Default <strong>1000</strong></p>
<input id="rewindSpeed" type="number" name="rewindSpeed" value="<?php echo as_woo_owl_get_option($as_woo_value['rewindSpeed']); ?>" placeholder="rewindSpeed">
</div>

<div class="as_woo_owl_admin_item">
<h3>autoPlay</h3>
<p>Default <strong>True</strong></p>
<select class="as_select" name="autoPlay" id="autoPlay">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['autoPlay'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['autoPlay'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['autoPlay'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>stopOnHover</h3>
<p>Default <strong>True</strong></p>
<select class="as_select" name="stopOnHover" id="stopOnHover">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['stopOnHover'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['stopOnHover'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['stopOnHover'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>navigation</h3>
<p>Default <strong>True</strong></p>
<select class="as_select" name="navigation" id="navigation">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['navigation'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['navigation'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['navigation'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">

<h3>navigationText</h3>
<p>Default <strong>prev -- next</strong></p>

<input class="as_woo_owl_left" id="navigationText_one" type="text" name="navigationText_one" value="<?php echo as_woo_owl_get_text_val($as_woo_value['navigationText_one']); ?>" placeholder="prev">

<input class="as_woo_owl_right"  id="navigationText_two" type="text" name="navigationText_two" value="<?php echo as_woo_owl_get_text_val($as_woo_value['navigationText_two']); ?>" placeholder="next">
</div>

<div class="as_woo_owl_admin_item">
<h3>rewindNav</h3>
<p>Default <strong>True</strong></p>
<select class="as_select" name="rewindNav" id="rewindNav">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['rewindNav'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['rewindNav'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['rewindNav'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>scrollPerPage</h3>
<p>Default <strong>False</strong></p>
<select class="as_select" name="scrollPerPage" id="scrollPerPage">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['scrollPerPage'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['scrollPerPage'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['scrollPerPage'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>pagination</h3>
<p>Default <strong>True</strong></p>
<select class="as_select" name="pagination" id="pagination">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['pagination'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['pagination'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['pagination'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>paginationNumbers</h3>
<p>Default <strong>False</strong></p>
<select class="as_select" name="paginationNumbers" id="paginationNumbers">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['paginationNumbers'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['paginationNumbers'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['paginationNumbers'], 'true'); ?> >True</option>
</select>
</div>


<div class="as_woo_owl_admin_item">
<h3>responsive</h3>
<p>Default <strong>True</strong></p>
<select class="as_select" name="responsive" id="responsive">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['responsive'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['responsive'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['responsive'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>lazyLoad</h3>
<p>Default <strong>True</strong></p>
<select class="as_select" name="lazyLoad" id="lazyLoad">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['lazyLoad'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['lazyLoad'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['lazyLoad'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>lazyFollow</h3>
<p>Default <strong>True</strong></p>
<select class="as_select" name="lazyFollow" id="lazyFollow">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['lazyFollow'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['lazyFollow'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['lazyFollow'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>lazyEffect</h3>
<p>Default <strong>Fade</strong></p>
<select class="as_select" name="lazyEffect" id="lazyEffect">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['lazyEffect'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['lazyEffect'], 'false'); ?> >False</option>
	<option value="fade" <?php echo as_woo_owl_bull_val($as_woo_value['lazyEffect'], 'fade'); ?> >Fade</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>mouseDrag</h3>
<p>Default <strong>Ture</strong></p>
<select class="as_select" name="mouseDrag" id="mouseDrag">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['mouseDrag'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['mouseDrag'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['mouseDrag'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>touchDrag</h3>
<p>Default <strong>Ture</strong></p>
<select class="as_select" name="touchDrag" id="touchDrag">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['touchDrag'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['touchDrag'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['touchDrag'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>afterLazyLoad</h3>
<p>Default <strong>False</strong></p>
<select class="as_select" name="afterLazyLoad" id="afterLazyLoad">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['afterLazyLoad'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['afterLazyLoad'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['afterLazyLoad'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
<h3>Add to cart</h3>
<p>Default <strong>True</strong> if true you can add to cart or false product page linking</p>
<select class="as_select" name="as_woo_owl_add_to_cart" id="as_woo_owl_add_to_cart">
	<option value="" <?php echo as_woo_owl_bull_val($as_woo_value['as_woo_owl_add_to_cart'], 1); ?> >Select an option</option>
	<option value="false" <?php echo as_woo_owl_bull_val($as_woo_value['as_woo_owl_add_to_cart'], 'false'); ?> >False</option>
	<option value="true" <?php echo as_woo_owl_bull_val($as_woo_value['as_woo_owl_add_to_cart'], 'true'); ?> >True</option>
</select>
</div>

<div class="as_woo_owl_admin_item">
	<h3>Select a button</h3>
	<p>Default <strong>Themeforest</strong></p>
<div class="as_woo_owl_button">

<?php

if (!empty($as_woo_atc_btn)) {
	if (is_array($as_woo_atc_btn)) {
		foreach ($as_woo_atc_btn as $as_woo_atc) {
			?>

		<label class="as_woo_owl_btn_style" for="<?php echo $as_woo_atc['btn_id']; ?>">

			<input 
			<?php echo ($as_woo_value['as_button'] == $as_woo_atc['btn_class']) ? 'checked="checked"': '' ; ?> 
			type="radio" 
			name="as_button" 
			id="<?php echo $as_woo_atc['btn_id']; ?>" 
			value="<?php echo $as_woo_atc['btn_class']; ?>"

			 >

			<div class="as_woo_owl_add_to_cart_button">

				<a href="" class="as_woo_owl_button_border" ></a>

				<span class="<?php echo $as_woo_atc['btn_class']; ?>"><?php echo $as_woo_atc['btn_name']; ?></span>

			</div>
		</label>

			<?php
		}
	}
}


?>


	<input type="hidden" name="as_woo_owl_save_button_opt" id="as_woo_owl_get_name" as_button_name="<?php echo $as_woo_value['as_button']; ?>">
</div>
</div>




<div class="as_woo_owl_admin_item">
	<h3>Select a icon</h3>
	<p>Default <strong>Left11 Right11</strong></p>
	<ul class="as_woo_owl_select_icon">

<?php

	if (!empty($as_woo_lr_icon)) {
		if (is_array($as_woo_lr_icon)) {
			foreach ($as_woo_lr_icon as $as_woo_lr) {
				?>
		<li>
			<label for="<?php echo $as_woo_lr['as_lr_id']; ?>">

				<input <?php echo ($as_woo_value['as_select_icon'] == $as_woo_lr['as_lr_val']) ? 'checked="checked"': '' ; ?> type="radio" name="as_select_icon" id="<?php echo $as_woo_lr['as_lr_id']; ?>" value="<?php echo $as_woo_lr['as_lr_val']; ?>">

				<span class="as_woo_owl_select_icon_border"></span>
				<img class="as_woo_owl_left" src="<?php echo plugins_url( 'ico/'.$as_woo_lr['as_lr_licon'], __FILE__ )?>" alt="">

				<img  class="as_woo_owl_right"src="<?php echo plugins_url( 'ico/'.$as_woo_lr['as_lr_ricon'], __FILE__ )?>" alt="">

			</label>
		</li>
				<?php
			}
		}
	}

?>

	</ul>
	<input type="hidden" name="" id="as_icon_data" as_icon_data="<?php echo $as_woo_value['as_select_icon']; ?>">
</div>


	</div>

</div>


<div class="as_woo_owl_show_short_code" id="as_woo_owl_selectable" onclick="selectText('as_woo_owl_selectable')" style="display:none;">

</div>


			</div>
			<div class="as_woo_owl_submit_button">
				<input style="float:left;" class="button button-primary dsd" type="submit" value="Save" name="as_woo_owl_submit">
				<span class="button" id="as_woo_owl_reset_btn">Reset</span>
				<span style="float:right;" class="button button-primary as_woo_owl_add_new">Get Shortcode</span>
			</div>
		</form>
	</div>
</div>