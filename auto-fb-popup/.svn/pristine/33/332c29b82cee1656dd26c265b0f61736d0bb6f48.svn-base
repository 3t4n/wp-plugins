<?php 

class Bs_Popup_Shortcode {

 	public function Bs_Instance() {

       //add_shortcode('bs_popup', array($this, 'show_shortcode_bs_touch_slideshow'));
       add_action( 'wp_footer', array( $this, 'show_shortcode_bs_touch_slideshow' ) );

	  add_action('wp_enqueue_scripts', array($this, 'bs_popup_scripts'));
	  //$this->show_shortcode_bs_touch_slideshow();
        

    }

    public function Bs_GetInstance() {
        $this->Bs_Instance();
    }

	

	public function show_shortcode_bs_touch_slideshow(){ ?>
	<?php $option_object=Bs_Fb_Popup_Setting::bs_get_instance(); ?>
	<?php
		$ps_pages=$option_object->bs_get_option( 'bs_fb_popup_pages', 'bs_fb_popup_basic','ps_home');
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
	<div class="remodal" data-remodal-id="psfbmodal" role="dialog">
	    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
	    <div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1794642570776180";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		

		<div class="fb-page" data-href="<?php echo $option_object->bs_get_option( 'bs_fb_popup_like', 'bs_fb_popup_basic','https://www.facebook.com/Dresserie-Boutique-Tailoring-692711967471901/');?>" data-tabs="<?php echo $option_object->bs_get_option( 'bs_fb_popup_timeline', 'bs_fb_popup_basic','false');?>"" data-width="<?php echo $option_object->bs_get_option('bs_fb_popup_width', 'bs_fb_popup_basic',500);?>" data-height="<?php echo $option_object->bs_get_option('bs_fb_popup_height', 'bs_fb_popup_basic',500);?>" data-small-header="<?php echo $option_object->bs_get_option( 'bs_fb_popup_header', 'bs_fb_popup_basic','false');?>" data-adapt-container-width="true" data-hide-cover="false"  data-show-facepile="<?php echo $option_object->bs_get_option( 'bs_fb_popup_face', 'bs_fb_popup_basic','true');?>"><blockquote cite="https://www.facebook.com/Dresserie-Boutique-Tailoring-692711967471901/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Dresserie-Boutique-Tailoring-692711967471901/">Dresserie-Boutique &amp; Tailoring</a></blockquote></div>
		<script type="text/javascript">
		    jQuery(function() {
		        setTimeout(function() {
		            var inst = jQuery('[data-remodal-id=psfbmodal]').remodal();
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

$var = new Bs_Popup_Shortcode();

$var->Bs_GetInstance();

?>