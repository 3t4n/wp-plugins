<?php
/*
Plugin Name: affburner shortcodes for wordpress
Version: 1.0
Plugin URI: http://www.affburner.com/
Author: Affburner
Author URI: http://www.affburner.com/
Description: A Wordpress plugin that allows easy integration of Affburner advertisements into your website
License: GPLv2
*/


global $shortcode_tags;



function register_affburner_shortcodes() {
    $sid = get_option('affburner_sid');
    if(!empty($sid)) {
    //text
    add_shortcode("affburner_text_160x600", "display_text_160x600");
    add_shortcode("affburner_text_468x60", "display_text_468x60");
    add_shortcode("affburner_text_728x90", "display_text_728x90");
    add_shortcode("affburner_text_125x125", "display_text_125x125");
    add_shortcode("affburner_text_250x250", "display_text_250x250");
    
    //graphic
    add_shortcode("affburner_graphic_88x31", "display_graphic_88x31");
    add_shortcode("affburner_graphic_120x90", "display_graphic_120x90");
    add_shortcode("affburner_graphic_160x600", "display_graphic_160x600");
    add_shortcode("affburner_graphic_120x600", "display_graphic_120x600");
    add_shortcode("affburner_graphic_125x125", "display_graphic_125x125");
    add_shortcode("affburner_graphic_250x250", "display_graphic_250x250");
    add_shortcode("affburner_graphic_300x250", "display_graphic_300x250");
    add_shortcode("affburner_graphic_234x60", "display_graphic_234x60");
    add_shortcode("affburner_graphic_468x60", "display_graphic_468x60");
    add_shortcode("affburner_graphic_728x90", "display_graphic_728x90");
    }
}



/* 
 * Hook shortcodes to 'init'
 */ 

add_filter( 'init', 'register_affburner_shortcodes' );



/* 
 *  Show options menu
 */ 
function affburner_shortcodes_option_page() {
    
	if ( function_exists( 'add_options_page' ) ) {
		add_options_page( 'Affburner shortcodes', 'Affburner shortcodes', 'manage_options', __FILE__, 'affburner_shortcodes_options_page' );
        
	}
}



/*
 * Load javascript
 */ 

function affburner_js($type, $size, $sid) {
    $js = "<script>\n";
    $js .= "\taffburner_sid = \"" . $sid . "\";\n";
    $js .= "\taffburner_ad_dimension = \"" . $size  . "\";\n"; 
    $js .= "\taffburner_ad_type = \"" . $type . "\";\n";
    $js .= "</script>\n";
    $js .= "<script src=\"http://adserver.affburner.com/js/display_ads.js\"></script>\n";
    
    return $js;
}


/*
 * Generate javascript for each dimension
 */

function display_text_160x600() {
    return affburner_js("text", "160x600", get_option('affburner_sid'));
}

function display_text_125x125() {
       return affburner_js("text", "125x125", get_option('affburner_sid'));
}

function display_text_250x250() {
      return affburner_js("text", "250x250", get_option('affburner_sid'));
}

function display_text_468x60() {
       return affburner_js("text", "468x60", get_option('affburner_sid'));
}


function display_text_728x90() {
      return affburner_js("text", "728x90", get_option('affburner_sid'));
}




function display_graphic_88x31() {
       return affburner_js("graphic", "88x31", get_option('affburner_sid'));
}

function display_graphic_120x90() {
       return affburner_js("graphic", "120x90", get_option('affburner_sid'));
}

function display_graphic_160x600() {
       return affburner_js("graphic", "160x600", get_option('affburner_sid'));
}

function display_graphic_120x600() {
       return affburner_js("graphic", "120x600", get_option('affburner_sid'));
}

function display_graphic_125x125() {
       return affburner_js("graphic", "125x125", get_option('affburner_sid'));
}

function display_graphic_250x250() {
       return affburner_js("graphic", "250x250", get_option('affburner_sid'));;
}

function display_graphic_300x250() {
       return affburner_js("graphic", "300x250", get_option('affburner_sid'));
}

function display_graphic_234x60() {
       return affburner_js("graphic", "234x60", get_option('affburner_sid'));
}

function display_graphic_468x60() {
       return affburner_js("graphic", "468x60", get_option('affburner_sid'));
}


function display_graphic_728x90() {
       return affburner_js("graphic", "728x90", get_option('affburner_sid'));
}



/*
 * Show navigation tabs in admin settings
 */

function admin_tabs($tabs, $current=NULL){
    if(is_null($current)){
        if(isset($_GET['tab'])){
            $current = $_GET['tab'];
        }
    }
    $content = '';
    $content .= '<h2 class="nav-tab-wrapper">';
    foreach($tabs as $location => $tabname){
        
        
        print $current; 
        if($current == $location){
            $class = ' nav-tab-active';
        } else{
            $class = '';    
        }
        
        if(empty($_GET['tab']) && $tabname=='Settings')
         $class = '  nav-tab-active';
         
        $content .= '<a class="nav-tab'.$class.'" href="options-general.php?page=affburner-shortcodes-for-wordpress/affburner-shortcodes-for-wordpress.php&tab='.$tabname.'">'.$tabname.'</a>';

    }
    $content .= '</h2>';
        return $content;
}


/*
 * Display settings page
 */ 

function affburner_shortcodes_options_page() {
    wp_register_style( 'table-style', plugins_url('stylesheet.css', __FILE__) );

    global $shortcode_tags;
    
    $my_plugin_tabs = array(
         'Settings' => 'Settings',
         
    );

    echo admin_tabs($my_plugin_tabs);
    
   	if ( !empty( $_POST)) {
        $sid = $_POST['sid'];

            if(empty($sid)) {
                    echo '<div id="message" class="error">SID cannot be empty</div>';
            }
            else {
                	echo '<div id="message" class="updated fade"><p><strong> SID saved, shortcodes are ready for use! </strong></p></div>';
                    update_option('affburner_sid', $sid);
                }
	       }


        if (empty($_GET['tab']) || $_GET['tab']=='Settings') {
        ?>


	<div class="wrap">
		<h2>Affburner shortcodes for Wordpress settings</h2>
        If you don't have an Affburner-account you can register it for free <a href ="http://affburner.com/">here</a><br />
        If you wish to check your earnings, please <a href = "http://affburner.com/cp">login</a>
        <br />
        
        
		
		<br>

	    <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
	    <input type="hidden" name="info_update" id="info_update" value="true" />

	    <fieldset class="options">
	    <table width="100%" border="0" cellspacing="0" cellpadding="6">

	    <tr valign="top"><td width="35%" align="left">
	    <strong>SID:</strong>
	    <br>Your unique site identifier. <br />
	    
	    </td><td align="left">
        <input type="text" name="sid" size="20" value="<?php print get_option('affburner_sid'); ?>">
	    </td></tr>

	    </table>
	    </fieldset>

	    <div class="submit">
	        <input type="submit" class="button-primary" name="info_update" value="Save settings" />
	    </div>

	    </form>        
        
       
            
        
	    
	    <?php 
        $sid = get_option('affburner_sid');
        if(!empty($sid)) {
        ?>
        <h2>Available shortcodes</h2>
        <p>The shortcodes below are now availble for use.</p>
        <h4>Text ad shortcodes</h4>
        <table class="widefat" width="100%" border="0" cellspacing="0" cellpadding="6">

	        <tr class="alternate">
				<td><code>[affburner_text_160x600]</code></td>
				<td class='desc'>Display a text advertisement with a width of 160 and a height of 600 (Vertical)</td>
		      	</tr>
             <tr>
        
            <tr>
				<td><code>[affburner_text_468x60]</code></td>
				<td class='desc'>Display a text advertisement with a width of 468 and a height of 60 (Horizontal)</td>
			</tr>
            
            
             <tr class="alternate">
				<td><code>[affburner_text_728x90]</code></td>
				<td class='desc'>Display a text advertisement with a width of 728 and a height of 90 (Vertical)</td>
		      	</tr>
             <tr>
        
            <tr>
				<td><code>[affburner_text_125x125]</code></td>
				<td class='desc'>Display a text advertisement with a width of 125 and a height of 125 (Square)</td>
			</tr>
            
                   <tr class="alternate">
				<td><code>[affburner_text_250x250]</code></td>
				<td class='desc'>Display a text advertisement with a width of 250 and a height of 250 (Square)</td>
		      	</tr>
             <tr>
         </table>
    
        <br />
             
             
      <h4>Graphic ad shortcodes</h4>
        <table class="widefat" width="100%" border="0" cellspacing="0" cellpadding="6">

	        <tr class="alternate">
				<td><code>[affburner_graphic_88x31]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 80 and a height of 31 (Horizontal)</td>
		      	</tr>
             <tr>
        
            <tr>
				<td><code>[affburner_graphic_120x90]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 120 and a height of 90 (Horizontal)</td>
			</tr>
            
             <tr class="alternate">
				<td><code>[affburner_graphic_160x600]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 160 and a height of 600 (Vertical)</td>
		      	</tr>
             <tr>
        
            <tr>
				<td><code>[affburner_graphic_120x600]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 120 and a height of 600 (Vertical)</td>
			</tr>
            
            <tr class="alternate">
				<td><code>[affburner_graphic_125x125]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 125 and a height of 125 (Square)</td>
		      	</tr>
             <tr>
             
               <tr>
				<td><code>[affburner_graphic_250x250]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 120 and a height of 600 (Vertical)</td>
			</tr>
            
            <tr class="alternate">
				<td><code>[affburner_graphic_300x250]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 300 and a height of 250 (Square)</td>
		      	</tr>
             <tr>
             
                 
             
               <tr>
				<td><code>[affburner_graphic_234x60]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 234 and a height of 60 (Vertical)</td>
			</tr>
            
            <tr class="alternate">
				<td><code>[affburner_graphic_468x60]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 468 and a height of 260 (Vertical)</td>
		      	</tr>
             <tr>
             
                 <tr>
				<td><code>[affburner_graphic_728x90]</code></td>
				<td class='desc'>Display a graphic advertisement with a width of 728 and a height of 90 (Vertical)</td>
			</tr>
             
             
             
                    
             
         </table>
             
            
         <?   
        }
?>


	    
	    

	</div>
<?php
    }

    
}




add_action( 'admin_menu', 'affburner_shortcodes_option_page' );


if(!is_admin()) {
    add_filter('widget_text', 'do_shortcode');
    }
    
add_filter('the_content', 'do_shortcode');
add_filter('the_excerpt', 'do_shortcode');

?>
