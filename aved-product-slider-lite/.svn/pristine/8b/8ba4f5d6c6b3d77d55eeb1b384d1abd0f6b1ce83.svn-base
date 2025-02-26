<?php
/*
*
* 	Class Admin functions and panels
*	Core Aved Soft
*
*
*/
?>
<?php

class AVS_slider_admin
{

	//** Init pages admin menu **//
	public static function init_pages()
	{
		//** Register pages code **//
		require_once(AVS_SLIDER_DIR.'includes/class-admin-pages.php');
		//** Addings menu in dashboard **//
		add_action('admin_menu', function()
			{
				add_menu_page( 
					'AV Slider Settings',
			        'AVS Slider',
			        'edit_plugins',
			        'avss_settings',
			        array( 'AVS_slider_admin_pages', 'get_main_page' ),
			       	AVS_SLIDER_URL.'/AVED-Slider-Plugin/images/AS.png',
			        6
    			);
    			add_submenu_page( 
    				'avss_settings',
    				'Create New Slider', 
    				'Create New Slider', 
    				'edit_plugins' , 
    				'avss_slider_create_new',  
    				array( 'AVS_slider_admin_pages', 'get_created_slider' ) 
				);
				add_submenu_page( 
    				'avss_settings',
    				'List Sliders', 
    				'List Sliders', 
    				'edit_plugins' , 
    				'avss_slider_list',  
    				array( 'AVS_slider_admin_pages', 'get_list_slider' ) 
				);
				add_submenu_page( 
    				'avss_settings',
    				'Custom Css', 
    				'Custom Css', 
    				'edit_plugins' , 
    				'avss_custom_css_editor',  
    				array( 'AVS_slider_admin_pages', 'get_editor_css' ) 
				);
			}
		);
	}
	public static function get_shortcode_by_type($id,$type)
	{
		if(isset($id) && isset($type))
		{
			switch ($type) {
				case '1':
					return '[AVS_show_slider_product_id id="'.$id.'"]';
					break;
				case '2':
					return '[AVS_show_slider_product_category id="'.$id.'"]';
					break;
				case '3':
					return '[AVS_show_slider_product_page_category id="'.$id.'"]';
					break;
				case '4':
					return '[AVS_show_slider_viewed_product id="'.$id.'"]';
					break;
				default:
					break;
			}
		}
		else
			{return false;}
	}
	public static function get_slider_list()
	{
		$query_sliders = AVS_slider_db_api::get_list_sliders_arg();
		if(isset($query_sliders) && $query_sliders != 'error')
		{
			?>
			<div class="col-lg-12 list-slides">
				<?php
				if(!isset($query_sliders)){return false;}
				foreach ($query_sliders as $slide ) 
				{
					?>
					<div class="col-lg-12 slide">
						<!-- Name -->
						<div class="row">
						<hr>
							<div class="col-lg-8">
								<h4><?= $slide->name; ?></h4>
							</div>
							<div class="col-lg-4">
								<a class="edit-slider" data-id="<?= $slide->ID; ?>" >Edit</a>
								<a class="delete-slider" data-id="<?= $slide->ID; ?>" >Delete Slider</a>
							</div>
						</div>
						<div class="col-lg-6">
							<h4>Slider Type : <?= AVS_base_operation::type_decode($slide->type);?></h4>
						</div>
						<div class="col-lg-6">
							<h4>Use this shortcode: <br><strong><?= AVS_slider_admin::get_shortcode_by_type($slide->ID,$slide->type);?></strong></h4>
						</div>
					</div>
					<?php	
				}
				?>	
			</div>
			<?php
		}
		else
		{
			?>
			<div class="col-lg-12">
				<h3>Not found Sliders</h3>
			</div>
			<?php
		}
	}

}




?>