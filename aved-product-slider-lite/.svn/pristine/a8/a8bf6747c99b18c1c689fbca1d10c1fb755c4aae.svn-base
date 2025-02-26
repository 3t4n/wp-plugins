<?php 
// Class Editor Sliders 
// Core AVS
?>

<?php 

class AVS_slider_editor
{
	public static function edit_page( $slide_id )
	{
		if(!isset($slide_id)){return false;}

		$slider = AVS_data_op_API::get_slider_by_id($slide_id);
		if(!isset($slide_id)){return false;}
		?>
		<div class="editor text-center">
			<div class="col-lg-12 text-right">
				<input type="button" class="button" id="editor_close" value ="CLOSE EDITOR" />
			</div>
			<div class="col-lg-12">
			<h2>AVSS Editor</h2>
			<?php 
			AVS_slider_editor::get_editor($slider);
			?>
			</div>
		
		</div>

		<?php
	}
	public static function get_select_by_boolean($argument,$option_name)
	{
		if(!isset($argument) || !isset($option_name)){return false;}
		if($argument == 'true')
			{
				?>
				<select name="options[<?= $option_name; ?>]">
					<option selected='selected' value="true">On</option>
					<option value="false">Off</option>
				</select>
				<?php
			}
			else
			{
				?>
				<select name="options[<?= $option_name; ?>]">
					<option value="true">On</option>
					<option selected='selected' value="false">Off</option>
				</select>
				<?php
			}
	}

	public static function get_editor($slider)
	{

		$increment_to_start = AVS_base_operation::get_increment();
		if(!isset($slider) || (!isset($increment_to_start))){return false;}

		?>
		<form method="post">
			<input type="hidden" id="main_increment" name="main_increment" value="<?= $increment_to_start;?>">
			<input type="hidden" name="options[slider_type]" value="<?= $slider->type;?>">
			<input type="hidden" name="slider_id" value="<?= $slider->ID;?>">
			<div class="col-lg-12">
				<label> Title <input type="text"  name="options[name]" value="<?= $slider->name;?>"/></label>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-6 col-md-6">
						<label>Slides in page<input type="number" max="5" min='1' name="options[count_visible]" value="<?= $slider->params['visible']; ?>"/></label>
						<label>Slides To Scrool: <input type="number" max="5" min="1" name="options[slidesToScroll]" value="<?= $slider->params['slidesToScroll']; ?>"></label>
						<label>Autoplay Speed (sec): <input type="number" min="1" max="10" name="options[autoplaySpeed]" value="<?= $slider->params['autoplaySpeed']; ?>"/>
						<label>Pause On Scrool:
							<?php 
							AVS_slider_editor::get_select_by_boolean($slider->params['pauseOnScrool'],'pauseOnScrool');
							?>
						</label>
					</div>
					<div class="col-lg-6 col-md-6">
						<label>Show Arrows: 
							<?php 
							AVS_slider_editor::get_select_by_boolean($slider->params['arrowVisible'],'arrowVisible');
							?>
						</label>
						<label>Autoplay:     
							<?php 
							AVS_slider_editor::get_select_by_boolean($slider->params['autoplay'],'autoplay');
							?>
						</label>
						<label>Druggable:
							<?php 
							AVS_slider_editor::get_select_by_boolean($slider->params['druggable'],'druggable');
							?>
						</label>
						<label>Select Count Slides : <input type="number" name=" options[count_slides]" value="<?= $slider->count_slides; ?>" max="20" min="1"/></label>
					</div>
			</div>
			<div class="col-lg-12">
				<?php 
				// Custom settings
					switch ($slider->type) {
						case '1':
							AVS_slider_editor::get_settings_product_id($slider);
							break;
						case '2':
							AVS_slider_editor::get_setting_product_category($slider);
							break;
						
						case '3':
							AVS_slider_editor::get_settings_product_page_category($slider);
							break;
						
						case '4':
							AVS_slider_editor::get_setting_viewed_product($slider);
							break;
					}
				// end 
				?>
			</div>
			<input type="submit" name="update_slider" class="button" value="Update" />
		</form>
		<?php
	}
	public static function get_settings_product_id($slider)
	{
		if(!isset($slider)){return false;}
		?>
		<!-- Product by id -->
			<div id="options_product_id" class="col-lg-12" hidden_s="false">
				<div class="col-lg-12 header">
					<h3>Slider by product id settings</h3>
					<input type="button" class="button" id="adding_slide_pr_id" value="Adding New Slide"/>
				</div>
				<div class="col-lg-12 list-slides">
					
					<?php 
					foreach ($slider->params['slides'] as $slide => $value) {
						?>
						<div class="slide">
							<label>Product ID: 
								<input type="text" name="options[slides][<?= $slide; ?>]" value="<?= $value; ?>" placeholder="Input ID Product" />
								<a class='remove_id'>X</a>
							</label>
						</div>
						<?php
					}
					?>

					
				</div>
			</div>
			<!-- End product by id -->
		<?php
	}

	public static function get_setting_product_category($slider)
	{
		if(!isset($slider)){return false;}
		?>
		<div id="options_product_category" class="col-lg-12" >
			<div class="col-lg-12 header">
				<h3>Slider by category settings</h3>
				
			</div>
			<?php $categorys = AVS_slider_db_api::get_woocommerce_category_list();	?>
			<div class="col-lg-12 options ">
				<label>Select Count Slides : <input type="number" name=" options[count_slides]" value="<?= $slider->count_slides;?>" max="20" min="1"/></label>
				<label>Select category: 
					<select name="options[category_product]">
						<option value="0">Select Category</option>
						<?php 

						if( isset($categorys) )
						{	
							foreach ($categorys as $category ) {
								if($category->term_id == $slider->params['category'])
								{
									echo '<option selected="selected" value="'.$category->term_id.'" >'.$category->name.'</option>';
								}
								else
								{
									echo '<option value="'.$category->term_id.'" >'.$category->name.'</option>';
								}
							}
						}
						?>
					</select>
				</label>
			</div>
		</div>
		<?php
	}

	public static function get_settings_product_page_category($slider)
	{
		if(!isset($slider)){return false;}
		?>
			<div id="options_product_page_category" class="col-lg-12">
				<div class="col-lg-12 header">
					<h3>Slider by page category settings</h3>
				</div>
				<div class="col-lg-12 options ">
					<label>Select Count Slides : <input type="number" name=" options[count_slides]" value="<?= $slider->count_slides;?>" max="20" min="1"/></label>
				</div>
			</div>
		<?php
	}

	public static function get_setting_viewed_product($slider)
	{
		if(!isset($slider)){return false;}
		?>
		<div id="options_product_viewed">
			<div class="col-lg-12 header">
				<h3>Viewed Product settings</h3>
			</div>
			<div class="col-lg-12 options">
				<label>Select Count Slides : <input type="number" name=" options[count_slides]" value="<?= $slider->count_slides;?>" max="20" min="1"/></label>
			</div>
		</div>
		<?php
	}

}
?>