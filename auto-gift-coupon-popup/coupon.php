<?php 

class Bs_Coupon_Shortcode {

 	public function Bs_Instance() {
      add_action('wp_footer', array($this, 'show_shortcode_bs_touch_slideshow'));
	  add_action('wp_enqueue_scripts', array($this, 'bs_popup_scripts'));
    }
    public function Bs_GetInstance() {
        $this->Bs_Instance();
    }

	

	public function show_shortcode_bs_touch_slideshow(){ ?>
	<?php $option_object=Bs_Coupon_Popup_Setting::bs_get_instance(); ?>
	<?php
		$ps_pages=$option_object->bs_get_option( 'bs_coupon_popup_pages', 'bs_coupon_popup_basic','ps_home');
		if($ps_pages=='ps_home'){
			$check='home';
		}
		else{
			$check='all';
		}
		if($check=='all' && is_home() || $check=='all' && is_front_page()){
			return;
			//wp_die($check,true);
		}
		if($check=='home' && !is_home() || $check=='home' && !is_front_page()){
			return;
			//wp_die($check,true);
		}
	?>

	<div class="remodal" data-remodal-id="ps_cupon_popup" role="dialog">
	    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	    <div class="ps_popup_header">
	        <h2 id="ps_popup_title"><?php echo $ps_pages=$option_object->bs_get_option( 'bs_coupon_title', 'bs_coupon_popup_basic','Get 10% Discount For Like Our Page');?></h2>
	        <div class="ps_popup_des"><?php echo $ps_pages=$option_object->bs_get_option( 'bs_coupon_des', 'bs_coupon_popup_basic','Click Like and get 10% discount coupon. Enter the coupon at the shopping cart page.');?></div>
	        <div class="popup_coupon">
	           <!--  <img class="popup_coupon_img" src="<?php echo plugin_dir_url(__FILE__) . 'assets/cuponbox.png';?>"> -->
	            <div class="ps_popup_cupon_text"><?php echo $ps_pages=$option_object->bs_get_option( 'bs_coupon_code', 'bs_coupon_popup_basic','YOUR COUPON CODE');?></div>
	        </div>
	        <!-- <h3 class="ps_popup_social_link">Follow Us to See Your Coupon Code</h3> -->
	    </div>
	    <br>
	    <!-- <ul class="ps_popup_social">
	        <li>
	            <div class="ps_popup fb-like" data-href="https://www.facebook.com/barrelsoftware/" data-layout="box_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
	        </li>
	        <li>
	            <div class="ps_popup_twitter">
	                <a href="https://twitter.com/bgardner" class="twitter-follow-button" data-show-screen-name="false" data-show-count="false" data-size="large">Follow @bgardner</a>
	            </div>
	        </li>
	    </ul> -->
	<script type="text/javascript">
	    jQuery(function() {
	        setTimeout(function() {
	            var inst = jQuery('[data-remodal-id=ps_cupon_popup]').remodal();
	            inst.open();
	        }, 4000);
	    });
	</script>
	</div>
	<?php }

	public function bs_popup_scripts() {
	       wp_enqueue_style('bs_popup_style', plugin_dir_url(__FILE__) . 'assets/remodal.css');
	       wp_enqueue_style('bs_popup_theme', plugin_dir_url(__FILE__) . 'assets/remodal-default-theme.css');
	       wp_enqueue_script('bs_popup_script',plugin_dir_url(__FILE__).'assets/remodal.min.js',array('jquery'),true);
	}

}	

$var = new Bs_Coupon_Shortcode();

$var->Bs_GetInstance();

?>