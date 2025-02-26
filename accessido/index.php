<?php
/*
* Plugin Name: accessi.do
* Description: This Plugin add script to your header and it will synchorise data.
* Version: 1.0
* Author: wp_head()
* Author URI: http://www.accessi.do/
*/



function accessi_wpb_script() { 
echo '<script language="javascript">var siteID="883017772000";</script> <script type="text/javascript" src="http://api.accessi.do/acc.js" async></script>';
}
add_action('wp_head', 'accessi_wpb_script');

function accessi_theme_settings_page()
{
	
	wp_enqueue_style( 'myCSS', plugins_url( '/css/accessi-style.css', __FILE__ ) );
    
    ?>
	
	    <div class="wrap">
	    <h1 class="user_made_h1">access.do</h1>
	    <form method="post" action="options.php" target="_blank">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");   ?>   
	           <input type="button" class="user_made_but" onclick="window.open('http://api.accessi.do/site')" id="register_website" value="Register your website">	
		</form>
		</div>
	<?php
}

function accessi_add_theme_menu_item()
{
	add_menu_page("accessi.do registration", "access.do", "manage_options", "theme-panel", "accessi_theme_settings_page", null, 99);
}

add_action("admin_menu", "accessi_add_theme_menu_item");


?>
