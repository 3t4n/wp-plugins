<?php 
// Class generation shortcodes
// Core AVS 
?>

<?php 

class AVS_shortcode_generator
{
	public static function init_base_shortcodes()
	{
		add_shortcode('AVS_show_slider_product_id',array('AVS_shortcode_output','product_id'));
		add_shortcode('AVS_show_slider_product_category',array('AVS_shortcode_output','product_category'));
		add_shortcode('AVS_show_slider_product_page_category',array('AVS_shortcode_output','product_page_category'));
		add_shortcode('AVS_show_slider_viewed_product',array('AVS_shortcode_output','viewed_product'));
	}
}


class AVS_shortcode_output
{
	public static function product_id($id)
	{
		if(!isset($id['id'])){return false;}
		AVS_product_id_code::get_code($id['id']);
	}
	public static function product_category($id)
	{
		if(!isset($id['id'])){return false;}
		AVS_product_category::get_code($id['id']);

	}
	public static function product_page_category($id)
	{
		if(!isset($id['id'])){return false;}
		AVS_product_page_category_code::get_code($id['id']);
	}
	public static function viewed_product($id)
	{
		if(!isset($id['id'])){return false;}
		AVS_viewed_products::get_code($id['id']);
	}
}
?>