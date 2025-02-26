<?php
/*
  Plugin Name: Qbloc
  Plugin URI: http://www.qwanz.com/
  Description:   Poll  Component for WordPress from http://www.qwanz.com
  Version: 1.1.0
  Author: Qwanz
  Author URI: http://www.qwanz.com/
  License: GPLv2 or later
 */
 //activation
 function wp_qbloc_activation() {}
register_activation_hook(__FILE__, 'wp_qbloc_activation');
//deactivation
function wp_qbloc_deactivation() {}
	register_deactivation_hook(__FILE__, 'wp_qbloc_deactivation');
//adding styles
add_action('wp_enqueue_scripts', 'wp_qbloc_front_styles');//for user side css
function wp_qbloc_front_styles() {
    wp_register_style('qbloc_front_css', plugins_url('css/qbloc_front.css', __FILE__));
    wp_enqueue_style('qbloc_front_css');
  }  
add_action('admin_enqueue_scripts', 'wp_qbloc_admin_styles'); //for admin side css
function wp_qbloc_admin_styles() {
    wp_register_style('qbloc_admin_css', plugins_url('css/qbloc_admin.css', __FILE__));
    wp_enqueue_style('qbloc_admin_css');
  }
//adding menu to wordpress  
 add_action('admin_menu', 'wp_qbloc_menu');
function wp_qbloc_menu() {
	//create new top-level menu
	add_menu_page('Qbloc', 'Qbloc', 'administrator', 'wp_qbloc_setting', 'wp_qbloc_setting',plugins_url('/images/icon.png', __FILE__));	
}
/*****short code catcher starts here**/
function qbloc_gigya_shortcode_catcher( $atts ) {
	extract( shortcode_atts( array(
		'src' => 'default value',
		'flashvars' => 'http://www.qwanz.com/wigets/newwidget/31190/qbcolor1/3a4235/qbcolor2/111111/bcolor/bbbbbb/acolor/000000/lbcolor1/ff0000/lbcolor2/ffffff/pbcolor1/ffcc00/pbcolor2/ff6600/hide/1/result/0/font/1/border/straight/abcolor1/ffffff/abcolor2/d2cecf/registration/simple/qtcolor/ffffff/preview/0/widgetid/585/?lang=en',
		'width' => '350px',
		'height' => '400px',
		), $atts ) );
		ob_start();
		
		add_filter('widget_text', 'do_shortcode'); //to enable shortcode in  text widget
				
		$qbloc_iframe = substr($flashvars, 5);
		?>
<!--qwanz poll out put starts here by ajay sharma-->

<iframe id="widget-preview" src="<?php echo $qbloc_iframe; ?>" frameborder="0" height="<?php echo $height; ?>" width="<?php echo $width; ?>"></iframe>
<!--qwanz poll out put ends here by ajay sharma-->
<?php		
		return ob_get_clean();
}
add_shortcode( 'gigya', 'qbloc_gigya_shortcode_catcher' );

/*** short code catcher ends here******/

function wp_qbloc_setting() {?>
<!-- Create a header in the default WordPress 'wrap' container --> 
<!--whole containg starts here-->
<div class="wrap">
  <div id="icon-themes" class="icon32"></div>
  <h2>Qbloc Settings</h2>
  <?php //getting current tab
if( isset( $_GET[ 'qbloc_tab' ] ) ) {  
    $qbloc_active_tab = $_GET[ 'qbloc_tab' ];  
} // end if  
//opening first tab by default
if(!isset( $_GET[ 'qbloc_tab' ] ) ) {  
    $qbloc_active_tab = 'tab1';  
	}?>
  <h2 class="nav-tab-wrapper"> &nbsp; <a href="?page=wp_qbloc_setting&qbloc_tab=tab1" class="nav-tab <?php echo $qbloc_active_tab == 'tab1' ? 'nav-tab-active' : ''; ?>">Links</a> <a href="?page=wp_qbloc_setting&qbloc_tab=tab2" class="nav-tab <?php echo $qbloc_active_tab == 'tab2' ? 'nav-tab-active' : ''; ?>">About Qwanz</a> <a href="?page=wp_qbloc_setting&qbloc_tab=tab3" class="nav-tab <?php echo $qbloc_active_tab == 'tab3' ? 'nav-tab-active' : ''; ?>">FAQs</a> </h2>
  <div class="wp_qwanz" >
    <?php $qbloc_tab = $_GET['qbloc_tab'];
	 if($qbloc_tab == 'tab1' || !isset($qbloc_tab) ){?>
    <!-- ender tab first content below this -->
    <h1>Creating a Qbloc is as easy as 1, 2, 3</h1>
    <ul>
      <li> <a href="http://www.qwanz.com/account/create-a-poll" target="_blank" class="actionbutton">Create your own poll</a> </li>
      <li> <a href="http://www.qwanz.com/featured-opinion-widgets/?lang=en" target="_blank" class="actionbutton" >Use a featured Qbloc</a> </li>
      <li> <a href="http://www.qwanz.com/account/my-surveys-and-widgets/?lang=en" target="_blank" class="actionbutton">Manage your polls</a> </li>
    </ul>
    <!--  tab first content ends here--> 
    <!--  tab second content starts here-->
    <?php }  if($qbloc_tab == 'tab2'){?>
    <p><strong>Qwanz is a fun, easy to use platform for daily democratic participation.</strong> If you're on Qwanz, you're a game-changer, a world-shaper, a political gangster; you have opinions, you have a voice, and you want to be heard.</p>
    <p>You've got your go-to news outlets right? Various sources where you get your information? Of course, we all do. But, here's a question: Where's your public opinion outlet?
      Qwanz is designed to fill that void in the democratic landscape. We're a hub for public recourse, a place for you to react to the day's latest and greatest, to test the claims you've heard in popular media, to propose your own solutions for the public to consider, and, above all else, to GET INVOLVED.</p>
    <p>We thought about petition sites, and how thousands, even millions of people coming together in protest can be a powerful force of change. But a protest is one-sided—it only accounts for the people who feel one way on an issue. A poll, on the other hand, reveals the whole composition. It can be used constructively, to prove public sentiment, and to call for change just the same way as a petition, but without all the limitations.</p>
    <p>Here on Qwanz, you make a poll, take a poll, vote, comment, debate, engage, and then you can go a step further. QWANZ IT. Send poll results directly from the site to where you think they should go, public officials, corporations, government agencies, or any one of 20,000 journalists with stakes in the question at hand.</p>
    <p>We provide you with the concept, the tools, the platform, and the network.
      This is Qwanz. <strong>How will you use it?</strong></p>
    <!--second tab ends here-->
    <?php } if($qbloc_tab=='tab3'){?>
    <!--third tab starts here--> 
    <br />
    <br />
    <a href="http://www.qwanz.com/faq/?lang=en" target="_blank" class="actionbutton">FAQs</a>
    <p>Contact us:<a href="mailto:help@qwanz.com?Subject=contact%20us" class="email-id">&nbsp;help@qwanz.com</a></p>
    <!--accordain starts here --> 
    <!-- accordian ends here-->
    <?php }?>
    <!--third tab ends here--> 
  </div>
  <!--  div  with id qwanz ends here--> 
</div>
<!-- /.wrap --> <!---whole container ends here-><?php }?>