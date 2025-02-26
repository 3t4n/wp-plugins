<?php
/**
 Plugin Name: Ads in bottom right
 Plugin URI: http://blog.casanova.vn/ads-in-bottom-right/
 Version: 1.0
 Description: This plugin help you display your ads in bottom right of website with fully options. After active this plugin please goto <strong>Settings</strong> --> <strong><a href="options-general.php?page=ads-in-bottom-right.php">Ads in bottom right</a></strong> and config your Advertising.
 Author: Nguyen Duc Manh
 Author URI: http://casanova.vn
*/


/*****************Frontend****************************************/
function load_ads_script(){
	/*wp_enqueue_script(
		'floatads.js',
		plugins_url('/js/ads.js', __FILE__),
		'',
		'',
		false
	);*/
	wp_enqueue_style(
				'br_ads.css',
				plugins_url("/css/ads.css",__FILE__)
			);
	add_action('wp_footer', 'add_this_code_to_footer');
}

function add_this_code_to_footer(){
	?>
	<!-- START BOTTOM RIGHT ADS -->
    <div id="fl813691">
      <div id="eb951855">
        <div id="cob263512">
          <div id="coh963846">
            <ul id="coc67178">
              <li id="pf204652hide" style="display: inline;"><a title="Hide" href="javascript:pf204652clickhide();" class="min"> Hide</a></li>
              <li id="pf204652show" style="display: none;"><a title="Hiện lại" href="javascript:pf204652clickshow();" class="max">View</a></li>
              <li style="display: none;" id="pf204652close"><a title="Đóng lại" href="javascript:pf204652clickclose();" class="close">Close</a></li>
            </ul>
            <?php echo get_option("ads_title"); ?></div>
          <div id="co453569">
          	<?php echo get_option("html_code"); ?>
          </div>
        </div>
      </div>
    </div>
    <!-- BOTTOM RIGHT ADS SETTING -->
    <script type="text/javascript" src="<?php echo plugins_url('/js/ads.js', __FILE__); ?>"></script>
    <script type="text/javascript">
    	//var cohurl1353	=	"http://logoart.vn";
		getCookieState();
    </script>
    <?php
}


add_action('init', 'load_ads_script');

/************Admin Panel***********/
function br_ads_plugin_remove(){
	delete_option('html_code');
	delete_option('ads_title');
}
function br_ads_plugin_install(){
	add_option('ads_title',"Customer care");
	add_option('html_code','<a href="http://example.com" target="_blank"><img src="'.plugins_url('/images/demo_ads.png', __FILE__).'"  width ="290" alt="" /></a>');
}

function br_ads_menu() {
	add_options_page( __('Ads in bottom right',''), __('Ads in bottom right',''), 3, basename(__FILE__), 'br_ads_setting');
}
function br_ads_setting(){
		if(isset($_POST['submit'])){			
			update_option('ads_title',stripslashes($_POST['ads_title']));
			update_option('html_code',(stripslashes($_POST['html_code'])));
			echo '<div id="message" class="updated fade"><p>Your settings were saved !</p></div>';
		}
	?>
	<h2>Ads in bottom right</h2>
	<form method="post" id="csnv_options">	
    	<input type="hidden" name="status_submit" id="status_submit" value="2"  />
		<table width="100%" cellspacing="2" cellpadding="5" class="editform">
        	<tr valign="top">
            	<td>Title</td>
                <td><input type="text" name="ads_title" id="ads_title" size="50" value="<?php echo get_option("ads_title"); ?>" /></td>
            </tr>
            <tr valign="top"> 
				<td width="200" scope="row">HTML Code:<br/><small>Put HTML code for your ads</small></td> 
				<td scope="row">			
					<textarea name="html_code" rows="10" cols="50"><?php echo (get_option('html_code'));?></textarea>	
				</td> 
			</tr>

             <tr valign="top"> 
				<td  scope="row"></td> 
				<td scope="row">			
					<input type="submit" name="submit"  value="Save setting" class="button-primary" />
				</td> 
			</tr>
		</table>
        
	</form>	
	<?php
}

//add setting menu
add_action('admin_menu', 'br_ads_menu');
/* What to do when the plugin is activated? */
register_activation_hook(__FILE__,'br_ads_plugin_install');
/* What to do when the plugin is deactivated? */
register_deactivation_hook( __FILE__, 'br_ads_plugin_remove' );
?>