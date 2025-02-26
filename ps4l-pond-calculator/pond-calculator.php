<?php
/*
* Plugin Name: PS4L Pond Calculator
* https://pondsuppliesforless.com/pages/resources
* Description: Pond liner and volume calculator
* Version: 1.0.0
* Author: Robert Long
* Author URI: https://www.pondsuppliesforless.com
* Text Domain: ps4l-pond-calculator
* License: GPLv2 or later
* License URI: http://www.gnu.org/licesnes/gpl-2.0.html
*/

function WSGT() {
    return WS_Pond_Calculator::instance();
}
WSGT();

class WS_Pond_Calculator {
    public static $instance;
    public $output_types = array('sales_by_value','sales_by_purchases','sales_by_purchasers');
   	/* const name = 'Goal Thermometer';
	const slug = 'dxc_goal_thermometer'; */
    function __construct() {
		$this->constants();
        define("WSGT_TEXTDOMAIN","ws-pond-calculator");
        add_action( 'widgets_init', array($this,'wpb_load_widget') );
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		//add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_assets' ) );
    }
	public function constants() {			
		$this->url = trailingslashit( plugin_dir_url( __FILE__ ) );		
	}
  public function enqueue_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );       
	 wp_enqueue_script("wp-color", plugin_dir_url( __FILE__ ) .'/js/colorpicker.js', array('jquery'), null, true);
	}
	// public function register_widget_assets() {	  wp_enqueue_style('wsgt_styles',plugins_url('css/style.css',__FILE__));
	//  wp_enqueue_style( $this,  plugin_dir_url( __FILE__ ) .'css/bootstrap.css' );
	 // wp_enqueue_style( $this,  plugin_dir_url( __FILE__ ) .'css/bootstrap.min.css' ); 	  	  wp_enqueue_script($this, plugin_dir_url( __FILE__ ) .'/js/pond.js', array('jquery'), null, true);	  wp_enqueue_script('bootstrapmin', plugin_dir_url( __FILE__ ) .'/js/bootstrap.min.js', array('jquery'), null, true);      wp_enqueue_script('bootstrap', plugin_dir_url( __FILE__ ) .'/js/bootstrap.js', array('jquery'), null, true);	  wp_enqueue_script('accounting', plugin_dir_url( __FILE__ ) .'/js/accounting.js', array('jquery'), null, true);
	//} 
	public function register_widget_assets()
	 {	  
	               wp_enqueue_style('wsgt_styles',plugins_url('css/style.css',__FILE__));
	               wp_enqueue_style( 'wsgt_stylesbootstrapcss',  plugin_dir_url( __FILE__ ) .'css/bootstrap.css' );
	               wp_enqueue_style( 'wsgt_stylesbootstrapmincss',  plugin_dir_url( __FILE__ ) .'css/bootstrap.min.css' ); 	  	 
	               wp_enqueue_script('wsgt_stylespondjs', plugin_dir_url( __FILE__ ) .'/js/pond.js', array('jquery'), null, true);
	   	           wp_enqueue_script('bootstrapmin', plugin_dir_url( __FILE__ ) .'/js/bootstrap.min.js', array('jquery'), null, true);  
		           wp_enqueue_script('bootstrap', plugin_dir_url( __FILE__ ) .'/js/bootstrap.js', array('jquery'), null, true);
			  	   wp_enqueue_script('accounting', plugin_dir_url( __FILE__ ) .'/js/accounting.js', array('jquery'), null, true);
				  
	} 
    function wpb_load_widget() {
        include(trailingslashit(plugin_dir_path(__FILE__))."inc/widget.php");
        register_widget( 'Pond_Calculator_Widget' );
    }
	   public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }		
        return self::$instance;
    }
	public function pond_frontend_widget($instance){
		$instance = shortcode_atts( array(
		'color1px' =>  isset( $instance['color1px'] ) ? esc_attr( $instance['color1px'] ) : '',
		'color1' => isset( $instance['color1'] ) ? esc_attr( $instance['color1'] ) : '',
		'color2' => isset( $instance['color2'] ) ? esc_attr( $instance['color2'] ) : '',
		'color2text' => isset( $instance['color2text'] ) ? esc_attr( $instance['color2text'] ) : '',
		'colorbutton' => isset( $instance['colorbutton'] ) ? esc_attr( $instance['colorbutton'] ) : '',
		'linktoggle' => isset( $instance['linktoggle'] ) ? esc_attr( $instance['linktoggle'] ) : '',
        
    ), $instance, 'pondcalculator' );
	
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$color1px =  isset( $instance['color1px'] ) ? esc_attr( $instance['color1px'] ) : '';   
		$color1 =isset( $instance['color1'] ) ? esc_attr( $instance['color1'] ) : '';    
		$color2 = isset( $instance['color2'] ) ? esc_attr( $instance['color2'] ) : '';  
		$color2text = isset( $instance['color2text'] ) ? esc_attr( $instance['color2text'] ) : '';  
		$colorbutton =isset( $instance['colorbutton'] ) ? esc_attr( $instance['colorbutton'] ) : ''; 
		$linktoggle = isset( $instance['linktoggle'] ) ? esc_attr( $instance['linktoggle'] ) : '';  
	?>
		<div class="desktop-pond">
<div class="main-pond">
<div class="select-pond-main" style="border:<?php echo $color1px; ?>px solid <?php echo $color1; ?>;">
<h3 style="background: <?php echo ( ! empty( $color2 ) ) ? $color2 : '#9f9e9e'; ?> none repeat scroll 0 0;color: <?php echo $color2text; ?>">Select Pond Shape</h3>
	<ul class="three-shapes nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home"><div class="color-icon-green greenc">0</div><span>Square</span></a></li>
		<li><a data-toggle="tab" href="#menu1"><div class="color-icon-oval greenc">0</div><span>Oval</span></a></li>
		<li><a data-toggle="tab" href="#menu2"><div class="color-icon-round greenc">0</div><span>Round</span></a></li>
	</ul>
  <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
	<form class="main-form">
	  <div class="form-group">
		<label for="email">Pond Length:</label>
		<input type="text" onchange="numonly(value)" value="50" class="form-control pondl1" id="email">
	  </div>
	  <div class="form-group">
		<label for="pwd">Pond Width:</label>
		<input type="text" onchange="numonly(value)" value="50" class="form-control pondw1" id="pwd">
	  </div>
	   <div class="form-group">
		<label for="pwd">Max Pond Depth :</label>
		<input type="text" onchange="numonly(value)" value="50" class="form-control pondh1" id="pwd">
	   </div>
	   <div class="form-group">
		<label for="pwd">Average Pond Depth:</label>
		<input type="text" onchange="numonly(value)" value="50" class="form-control pondd1" id="pwd">
	   </div>
	   <div class="form-group calculate-btn">

	  <a href="#" type="button" style="background-color: <?php echo $colorbutton; ?>;" rel="popuprel2" onclick="Getresults()" class="btn btn-default popup">Calculate</a>
	   </div>
	   <?php if($linktoggle=="block"){  ?>
	<p class="italic-text-2" style="display:<?php echo $linktoggle; ?>">Powered by <a target="_blank" href="https://pondsuppliesforless.com/">Pond Supplies for Less</a></p>
	   <?php }  ?>
	</form>


	</div>


   <div id="menu1" class="tab-pane fade">
   
    <form class="main-form">
  <div class="form-group">
    <label for="email">Pond Length:</label>
    <input type="text" onchange="numonly(value)" value="40" class="form-control pondl2" id="email"/>
  </div>
  <div class="form-group">
    <label for="pwd">Pond Width:</label>
    <input type="text" onchange="numonly(value)" value="40" class="form-control pondw2" id="pwd"/>
  </div>
   <div class="form-group">
    <label for="pwd">Max Pond Depth :</label>
    <input type="text" onchange="numonly(value)" value="40" class="form-control pondh2" id="pwd"/>
  </div>
   <div class="form-group">
    <label for="pwd">Average Pond Depth:</label>
    <input type="text" onchange="numonly(value)" value="40" class="form-control pondd2" id="pwd"/>
  </div>
<div class="form-group calculate-btn">
<a href="#"  style="background-color: <?php echo $colorbutton; ?>;" type="button" rel="popuprel2" onclick="Getresultsoval()" class="btn btn-default popup">Calculate</a>

  </div>
 <?php if($linktoggle=="block"){  ?>
	<p class="italic-text-2" style="display:<?php echo $linktoggle; ?>">Powered by <a target="_blank" href="https://pondsuppliesforless.com/">Pond Supplies for Less</a></p>
	   <?php }  ?>
    </form>
    </div>



<div id="menu2" class="tab-pane fade">
   <form class="main-form">
	<div class="form-group">
    <label for="email">Diameter</label>
    <input type="text" onchange="numonly(value)" value="30" class="form-control pondd3" id="email">
	</div>
	<div class="form-group">
    <label for="pwd">Average Pond Depth:</label>
    <input type="text" onchange="numonly(value)" value="30" class="form-control pondad3" id="pwd">
	</div>
	<div class="form-group last-feild">
    <label for="pwd">Deepest Point:</label>
    <input type="text" onchange="numonly(value)" value="30" class="form-control ponddp3" id="pwd">
	</div>
	<div class="form-group calculate-btn">
	<a href="#"  style="background-color: <?php echo $colorbutton; ?>;" type="button" rel="popuprel2" onclick="Getresultsround()" class="btn btn-default popup">Calculate</a>
	</div>
  <?php if($linktoggle=="block"){  ?>
	<p class="italic-text-2" style="display:<?php echo $linktoggle; ?>">Powered by <a target="_blank" href="https://pondsuppliesforless.com/">Pond Supplies for Less</a></p>
	   <?php }  ?>
	   
	</form>
   
</div>

</div>
</div>
</div>

<div class="popupbox2" id="popuprel2">
			<div id="intabdiv2">


<div class="pond-pop-up">
  <div class="cross-close"><img src="<?php echo plugins_url( 'img/cross-icon.png', __FILE__ );?>" alt="" /></div>
<h4>Our Calculator Estimates The Following Size For Your Pond Liner:</h4>
<p>Pond Volume: <span class="volume priceformat">0</span> US Gallons  |  Liters: <span class="volumeltrs priceformat">0</span> | Imperial Gallons:  <span class="volumeglns priceformat">0</span></p>
<p>Estimated Pond Liner Size:  <span class="nLinerlength">0</span> X <span class="nLinerwidth">0</span> Feet</p>
<p class="italic-text">Note: Pond liner size estimate includes a 1 foot overlap on all sides.</p>
<div class="water-img"><img src="<?php echo plugins_url( 'img/water-img.png', __FILE__ );?>" alt="" /></div>
 <?php if($linktoggle=="block"){  ?>
	<p class="italic-text-2">Powered by <a target="_blank" href="https://pondsuppliesforless.com">Pond Supplies For Less</a></p>
	   <?php }  ?>
</div></div>
</div>
<div id="fade"></div>
		</div>
	<?php
	}
}
add_shortcode( 'pondcalculator', array( 'WS_Pond_Calculator', 'pond_frontend_widget' ) );
