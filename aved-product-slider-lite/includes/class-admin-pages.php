<?php
/*
*
* 	Class Admin pages
*	Core Aved Soft
*
*
*/
?>
<?php 

class AVS_slider_admin_pages
{

	//** Main page settings in WP Dashboard **//
	public static function get_main_page()
	{

		?>
		<div id="main-set-avs" class="col-lg-8" >
		<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

			<!-- Begin Page -->
			<div class="col-lg-12">
				<div class='col-lg-6 text-center'>
					<h1>AvedSoft Slider</h1>
					<p class="text-center">Slider with the possibility of withdraw the goods by the ID  of products. <br> Just pointing id you will quickly fill the  slider, <br> and also you will be able to  insert it into any page of your site very fast.</p>
				</div>
				<div class="col-lg-6">
					<div>
						<h1>Information</h1>
						<p>Count Sliders: [ <?= AVS_data_op_API::get_count_sliders(); ?> ], View in <a href='?page=avss_slider_list'>Lists</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<hr>
				<h2>Accsess Now</h2>
				<p> * Created Sliders Carousel</p>
				<p> * Create slider by product ID </p>
				<p> * Create slider by product category page </p>
				<p> * Create slider by viewed products </p>
				<p> * Create slider by product category</p>
				<p> * Dynamic editor  </p>
				<p> * Custom CSS Editor</p>

			</div>
			<div class="col-lg-6">
				<hr>
				<h2>Accsess By Premium</h2>
				<p> * Created slider by posts</p>
				<p> * New Core </p>
				<p> * Support </p>
				<p> * More templates </p>

			</div>
		</div>
		<!-- End Page -->
		<?php
	}
	//** Create New Slider **//
	public static function get_created_slider()
	{
		// Creator slider
		$increment_to_start = AVS_base_operation::get_increment();
		$main_options = get_option('AVS_SLIDER_OP');
		
		if( isset($_POST['save'] ) && $_POST['save'] == 'Create Slider' )
		{
			$params  = AVS_data_op_API::create_slider_params($_POST['options']);
			AVS_data_op_API::set_new_slider($params['name'],$params['count_slides'],$params['params'],$params['type']);
			?>
			<script>
				window.location.href = '<?= site_url().'/wp-admin?page=avss_slider_list'?>';
			</script>
			<?php
		}
		// End creator slider



		?>

		<div id="main-set-avs" class="col-lg-8 text-center avs-created" >

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



		<div class='row'>
			<div class="col-lg-12">
				<h2>Adding New Slider </h2>
			</div>
		</div>
		<div class="col-lg-12">
			<form method="post">
			<!-- Increment -->
				<input type="hidden" id="main_increment" name="main_increment" value="<?= $main_options['increment']; ?>">
				<div class="col-lg-12">
					<label> Title <input type="text"  name="options[name]" /></label>
				</div>
				<div class="col-lg-12 global-option">
					<div class="col-lg-12">
						<label>Select Type Slider: 
							<select name="options[slider_type]">
								<option value='1' >By Product ID 			</option>
								<option value='2' >By Product Category		</option>
								<option value='3' >By Page category Products</option>
								<option value='4'>By Viewed products 		</option>
							</select>
						</label>
					</div>
					<div class="col-lg-6 col-md-6">
						<label>Slides in page<input type="number" max="5" min='1' name="options[count_visible]" value="3"/></label>
						<label>Slides To Scrool: <input type="number" max="5" min="1" name="options[slidesToScroll]" value="1"></label>
						<label>Autoplay Speed (sec): <input type="number" min="1" max="10" value="5" name="options[autoplaySpeed]"/>
						<label>Pause On Scrool:
							<select name="options[pauseOnScrool]">
								<option value="true">On</option>
								<option value="false">Off</option>
							</select>
						</label>
					</div>
					<div class="col-lg-6 col-md-6">
						<label>Show Arrows: 
						<select name="options[arrowVisible]">
								<option value="true">On</option>
								<option value="false">Off</option>
							</select>
						</label>
						<label>Autoplay:     
							<select name="options[autoplay]">
								<option value="true">On</option>
								<option value="false">Off</option>
							</select>
						</label>
						<label>Druggable:
						<select name="options[druggable]">
								<option value="true">On</option>
								<option value="false">Off</option>
							</select>
						</label>
						<label>Select Count Slides : <input type="number" name=" options[count_slides]" value="5" max="20" min="1"/></label>
					</div>
					
				</div>
				<!-- Product by id -->
				<div id="options_product_id" class="col-lg-12" hidden_s="false">
					<div class="col-lg-12 header">
						<h3>Slider by product id settings</h3>
						<input type="button" class="button" id="adding_slide_pr_id" value="Adding New Slide"/>
					</div>
					<div class="col-lg-12 list-slides">
						<div class="slide">
							<label>Product ID: 
								<input type="text" name="options[slides][slide_id_<?=$increment_to_start;?>]" value="" placeholder="Input ID Product" />
								<a class='remove_id'>X</a>
							</label>
						</div>
					</div>
				</div>
				<!-- End product by id -->
				
				<!-- By category -->
				<div id="options_product_category" class="col-lg-12" hidden_s="true">
					<div class="col-lg-12 header">
						<h3>Slider by category settings</h3>
					
					</div>
					<?php $categorys = AVS_slider_db_api::get_woocommerce_category_list();?>
					<div class="col-lg-12 options ">
						<label>Select category: 
							<select name="options[category_product]">
								<option value = "0"> Select Category</option>
								<?php 
								if( isset($categorys) )
								{	
									foreach ($categorys as $category ) {
										echo '<option value="'.$category->term_id.'" >'.$category->name.'</option>';
									}
								}
								?>
							</select>
						</label>
					</div>
				</div>
				<!-- End by category -->
				
				<!-- By page category -->
				<div id="options_product_page_category" class="col-lg-12" hidden_s="true">
					<div class="col-lg-12 header">
						<h3>Slider by page category settings</h3>
					</div>
					<div class="col-lg-12 options ">
						
					</div>
				</div>
				<!-- End page category -->
				<!-- By viewed product -->
				<div id="options_product_viewed" hidden_s="true">
					<div class="col-lg-12 header">
						<h3>Viewed Product settings</h3>
					</div>
					<div class="col-lg-12 options">
					
					</div>
				</div>
				<!-- End viewed product-->
				<!-- Submit  -->
				<div class="col-lg-12">
					<input type="submit" class="button" name="save" value="Create Slider" />
				</div>
				<!-- end submit-->
			</form>
		</div>
		</div>
		<?php
	}

	//** See all created sliderss **//
	public static function get_list_slider()
	{
		?>

		<div class="message-section">
		<?php

		if(isset($_POST['update_slider']) && $_POST['update_slider'] == 'Update' && isset($_POST['options']))
		{
			$params  = AVS_data_op_API::create_slider_params($_POST['options']);
			AVS_data_op_API::update_slider_by_id($_POST['slider_id'],$params['name'],$params['count_slides'],$params['params'],$params['type']);
			?>
			<div class="message-box-succsess col-lg-8 text-center">
				<h4>Updated</h4>
			</div>
			<?php
		}
		// Header
		?>
		</div>
		<div id="main-set-avs" class="col-lg-8" >
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



			<div class='row'>
				<div class="col-lg-12">
					<h2>Sliders List</h2>
				</div>
			</div>
			<div class="col-lg-12">
				<!-- Lists -->
				<?php 
				AVS_slider_admin::get_slider_list();
				?>
				<!-- End List -->
			</div>
		</div>
		<?php
		// end header
	}

	public static function get_editor_css()
	{
		
		?>
		<div id="main-set-avs" class="col-lg-8" >
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

			<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


			<?php 
			AVS_custom_css_editor::get_css_editor();
			?>
			
		
		</div>
		<?php
	}
}



class AVS_custom_css_editor
{
	public static function get_code()
	{
		$files = file(AVS_SLIDER_URL.'/AVED-Slider-Plugin/assets/css/custom.css');

		return $files;
	}
	public static function set_code($content)
	{
		$file = fopen(AVS_SLIDER_DIR.'assets/css/custom.css', "w+");
		$rez = fwrite($file,$content);
		fclose($file);
	}

	public static function get_css_editor()
	{

		if(isset($_POST['save_css']) && $_POST['save_css'] == 'Save' && isset($_POST['editor']) )
		{
			AVS_custom_css_editor::set_code($_POST['editor']['code']);
		}
		$code = AVS_custom_css_editor::get_code();

		?>
		<div class='row'>
			<div class="col-lg-12">
				<h2>Custom CSS Editor</h2>
			</div>
		</div>
			<div class="col-lg-12">
				<form method="post">

				<div class="col-lg-12 text-center">
					<input type="submit" class="button" name="save_css" value="Save" />
				</div>
				<div class="col-lg-12">
				<textarea name="editor[code]">
					<?php 
					foreach ($code as $line) {
						echo $line;
					}

					?>
				</textarea>
				</div>

				<div class="col-lg-12 text-center">
					<input type="submit" class="button" name="save_css" value="Save" />
				</div>
				</form>
				<style>
					textarea{
						width:100% !important;
						height: 500px;
						background: #888;
					}
				</style>
			</div>

		<?php
	}
}
?>