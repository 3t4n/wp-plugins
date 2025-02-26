<?php

 /*  
Plugin Name: Artisteer Sidebar Generator  
Plugin URI: http://www.thetemplateer.com  
Description: Add unlimited custom sidebars to your theme.  
Version: 1.0.1
Author: Bud Griffin  
Author URI: http://thetemplateer.com/  
License: GPLv2 or later
*/

/*
This plugin is based on Sidebar Generator by kylegetson.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if ( !function_exists( 'add_action' ) ) {
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}


define('TTSBG_VERSION', '1.0.0');
define('TTSBG__MINIMUM_WP_VERSION', '3.3.1' );
define('TTSBG_PLUGIN_URL', plugin_dir_url( __FILE__ ));

require_once dirname( __FILE__ ) . '/parsecss.class.php';
include_once dirname( __FILE__ ) . '/css_options.php';


function get_between ($text, $s1, $s2) {
$mid_url = "";
$pos_s = strpos($text,$s1);
$pos_e = strpos($text,$s2);
for ( $i=$pos_s+strlen($s1) ; (( $i<($pos_e)) && $i < strlen($text)) ; $i++ ) {
$mid_url .= $text[$i];
}
return $mid_url;
}

function get_style() {
global $template_path, $oCss;

$template_path = get_stylesheet_directory().'/style.css';
$oCSS = new CSS();
$oCSS->parse_file($template_path);
$property = $oCSS->get_property('.'.ttsbg_option('css_prefix').'blockcontent-body ul li');
global $css_prop;
//print_r($property);
foreach($property as $prop => $attrs) {
    {
	$prop2 = $prop.':'. $attrs.' !important;';
        $prop2 = str_replace("url('" , "url('".get_bloginfo('template_url').'/' , $prop2);
        $prop3 = $prop3 . $prop2;

   }
}
if (strpos($prop3,'url(') === false ) { $prop3 = $prop3 . 'background-image:none !important;padding-left:0;';}
$css_prop = '.'.ttsbg_option('css_prefix').'blockcontent-body ul li {'.$prop3.' } ';
global $css_prop;

return $css_prop;
}



function ttsbg_option($key) {
	global $ttsbg_settings;
	$option = get_option($ttsbg_settings);
	if(isset($option[$key])) return $option[$key];
	else return FALSE;
}

class ttsbg_sidebar_generator {
	
	function ttsbg_sidebar_generator(){
		add_action('init',array('ttsbg_sidebar_generator','ttsbg_init'));
		add_action('admin_menu',array('ttsbg_sidebar_generator','admin_menu'));
		add_action('admin_print_scripts', array('ttsbg_sidebar_generator','admin_print_scripts'));
		add_action('wp_ajax_add_sidebar', array('ttsbg_sidebar_generator','add_sidebar') );
		add_action('wp_ajax_remove_sidebar', array('ttsbg_sidebar_generator','remove_sidebar') );

	}
        

	
	function ttsbg_init(){
   
	    $sidebars = ttsbg_sidebar_generator::get_sidebars();
            global $cust_sb;
            $sidebars = get_option('tt_sbg_sidebars');
        if(is_array($sidebars)){
            foreach ($sidebars as $sidebar) {

                $custom_sidebars = array(
                               $sidebar => array(
                                  'name' => __($sidebar.' Widget Area',THEME_NS),
                                  'id' => $sidebar.'-widget-area',
                                  'description' => __('This is a shortcode widget area. Widgets placed here will appear in the location that you use the sidebar shortcode.', THEME_NS) 
                                                        )
                                        );
                $cust_sb = array_merge((array)$cust_sb, (array)$custom_sidebars); 
                       };
                        }; 
            global $theme_widget_args,$theme_sidebars;
  
            if (function_exists('register_sidebar')) {
	
            $theme_widget_args = array(
		'before_widget' => '<widget id="%1$s" name="%1$s" class="widget %2$s">',
		'before_title' => '<title>',
		'after_title' => '</title>',
		'after_widget' => '</widget>'
		);

            if (isset($cust_sb)) {
            foreach ($cust_sb as $sidebar2) {
		register_sidebar( array_merge($sidebar2, $theme_widget_args));
            }}
            if (isset($cust_sb)) {
            $theme_sidebars = array_merge($theme_sidebars,$cust_sb);
            }
        
            }	    

	}
	
	function admin_print_scripts(){
		wp_print_scripts( array( 'sack' ));
		?>
			<script>
				function add_sidebar( sidebar_name )
				{
					
					var mysack = new sack("<?php echo admin_url(); ?>admin-ajax.php" );    
				
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "add_sidebar" );
				  	mysack.setVar( "sidebar_name", sidebar_name );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	mysack.runAJAX();
					return true;
				}
				
				function remove_sidebar( sidebar_name,num )
				{
					
					var mysack = new sack("<?php echo admin_url(); ?>admin-ajax.php" );    
				
				  	mysack.execute = 1;
				  	mysack.method = 'POST';
				  	mysack.setVar( "action", "remove_sidebar" );
				  	mysack.setVar( "sidebar_name", sidebar_name );
				  	mysack.setVar( "row_number", num );
				  	mysack.encVar( "cookie", document.cookie, false );
				  	mysack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	mysack.runAJAX();
					//alert('hi!:::'+sidebar_name);
					return true;
				}
			</script>
		<?php
	}
	
	function add_sidebar(){
		$sidebars = ttsbg_sidebar_generator::get_sidebars();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$id = ttsbg_sidebar_generator::name_to_class($name);
		if(isset($sidebars[$id])){
			die("alert('Sidebar already exists, please use a different name.')");
		}
		
		$sidebars[$id] = $name;
		ttsbg_sidebar_generator::update_sidebars($sidebars);
		
		$js = "
			var tbl = document.getElementById('sbg_table');
			var lastRow = tbl.rows.length;
			// if there's no header row in the table, then iteration = lastRow + 1
			var iteration = lastRow;
			var row = tbl.insertRow(lastRow);
			
			// left cell
			var cellLeft = row.insertCell(0);
			var textNode = document.createTextNode('$name');
			cellLeft.appendChild(textNode);
			
			//middle cell
			var cellLeft = row.insertCell(1);
			var textNode = document.createTextNode('$id');
			cellLeft.appendChild(textNode);
			
			//var cellLeft = row.insertCell(2);
			//var textNode = document.createTextNode('[<a href=\'javascript:void(0);\' onclick=\'return remove_sidebar_link($name);\'>Remove</a>]');
			//cellLeft.appendChild(textNode)
			
			var cellLeft = row.insertCell(2);
			removeLink = document.createElement('a');
      		linkText = document.createTextNode('remove');
			removeLink.setAttribute('onclick', 'remove_sidebar_link(\'$name\')');
			removeLink.setAttribute('href', 'javacript:void(0)');
        
      		removeLink.appendChild(linkText);
      		cellLeft.appendChild(removeLink);

			
		";
		
		
		die( "$js");
	}
	
	function remove_sidebar(){
		$sidebars = ttsbg_sidebar_generator::get_sidebars();
		$name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$id = ttsbg_sidebar_generator::name_to_class($name);
		if(!isset($sidebars[$id])){
			die("alert('Sidebar does not exist.')");
		}
		$row_number = $_POST['row_number'];
		unset($sidebars[$id]);
		ttsbg_sidebar_generator::update_sidebars($sidebars);
		$js = "
			var tbl = document.getElementById('sbg_table');
			tbl.deleteRow($row_number)

		";
		die($js);
	}
	
	function admin_menu(){
		add_theme_page('Custom Sidebars', 'Custom Sidebars', 'edit_themes', 'theme-sidebars.php', array('ttsbg_sidebar_generator','admin_page'));
	}
	
	function admin_page(){
		?>
		<script>
			function remove_sidebar_link(name,num){
				answer = confirm("Are you sure you want to remove " + name + "?\nThis will remove any widgets you have assigned to this sidebar.");
				if(answer){
					//alert('AJAX REMOVE');
					remove_sidebar(name,num);
				}else{
					return false;
				}
			}
			function add_sidebar_link(){
				var sidebar_name = prompt("Sidebar Name:","");
				//alert(sidebar_name);
				add_sidebar(sidebar_name);
			}
		</script>
<?php tt_theme_options_css_js(); ?>
     <div id="icon-themes" class="icon32">
<br>
</div>

    <h2>Custom Sidebar Generator</h2>
        <div class="metabox-holder">
	<div style="width: 625px;" class="postbox-container">       
	<div id="main-sortables" class="meta-box-sortables ui-sortable">               
        <div class="postbox">

    <h3 class="">Create A New Sidebar</h3>
            
    <div class="inside">
			
			
        <p class="normal">
		<?php _e('The sidebar generator allows you to create additional sidebars that can be used in your theme.', THEME_NS); ?>
	</p>                        
        <p class="normal">
            <?php _e('Add your sidebars below and then you can assign one of these sidebars using the shortcode listed next to the sidebar name. Make sure that each sidebar name is unique so as not to conflict with existing sidebars.', THEME_NS); ?>
	</p>
	<br />
	<div class="add_sidebar">
            <a href="javascript:void(0);" onclick="return add_sidebar_link()" title="Add a sidebar">+ <?php _e('Add Sidebar', THEME_NS); ?></a>
	</div>
	<br />
	<table class="widefat page" id="sbg_table" style="width:600px;">
		<tr>
			<th><?php _e('Name', THEME_NS); ?></th>
			<th><?php _e('Shortcode', THEME_NS); ?></th>
			<th><?php _e('Remove', THEME_NS); ?></th>
		</tr>
		<?php
		$sidebars = ttsbg_sidebar_generator::get_sidebars();

			if(is_array($sidebars) && !empty($sidebars)){
				$cnt=0;
				foreach($sidebars as $sidebar){
				$alt = ($cnt%2 == 0 ? 'alternate' : '');
		?>
		<tr class="<?php echo $alt?>">
			<td><?php echo $sidebar; ?></td>
			<td><?php echo ttsbg_sidebar_generator::name_to_class($sidebar); ?></td>
			<td><a href="javascript:void(0);" onclick="return remove_sidebar_link('<?php echo $sidebar; ?>',<?php echo $cnt+1; ?>);" title="Remove this sidebar"><?php _e('remove', 'gp_lang'); ?></a></td>
		</tr>
		<?php
			$cnt++;
			}
		}else{
		?>
		<tr>
                    <td colspan="3"><?php _e('No Sidebars defined', THEME_NS); ?></td>
		</tr>
		<?php
		}
		?>
		</table>
                        
             <h4 class="sub-title"><?php _e('Using The Sidebar Shortcode', THEME_NS); ?></h4>
                        <p class="normal">
				<?php _e('The sidebar shortcode has several parameters that can be used...', THEME_NS); ?>
                            
                        <ol>
                            <li>
                                <?php _e('name: name="sidebar-name"', THEME_NS); ?>
                            </li>
                            <li>
                                <?php _e('align: align="alignleft",align="alignright", align="aligncenter" ', THEME_NS); ?>
                            </li>
                            <li>
                                <?php _e('width: width="200" ', THEME_NS); ?>
                            </li>
                        </ol>
            </p>
            <p class="normal">
                        <?php _e('Example: [sidebar name="Main" width="250" align="alignright" /]', THEME_NS); ?>
			</p>
            <p class="normal">
                        <?php _e('The sidebar name is the only mandatory option. The alignment will default to Left and the width will default to your themes Primary sidebar width.', THEME_NS); ?>
			</p>
                        <p class="normal">
                            <?php _e('<strong>Notice:</strong> Presently the Vertical Menu widget does not format the CSS properly when used in a shortcode. Until a universal solution can be found you will need to creat your own custom CSS in the field below.', THEME_NS); ?>
                        </p>
                        
                        
                        <h4 class="sub-title"><?php _e('Using Your New Sidebar In Theme Files', THEME_NS); ?></h4>
                        <p class="normal">
                        <?php _e('If you want to use your new custom sidebar in a page template or one of the other theme files use the following code where you want the sidebar to appear.', THEME_NS); ?>
                        </p>
                        <p>
                        <code>
                        <?php _e('theme_dynamic_sidebar(\'sidebar-name\')', THEME_NS); ?>
                        </code>
                        </p>
    </div>   
                </div> 
<?php

	// display the proper notification if Saved/Reset
	global $ttsbg_settings, $ttsbg_defaults, $hidden_field_name,$test_data;
	if(ttsbg_option('reset')) {
		echo '<div class="updated fade" id="message"><p>'.__('CSS Options', THEME_NS).' <strong>'.__('RESET TO DEFAULTS', THEME_NS).'</strong></p></div>';
		update_option($ttsbg_settings, $ttsbg_defaults);
	} elseif($_REQUEST['updated'] == 'true') {
		echo '<div class="updated fade" id="message"><p>'.__('CSS Options', THEME_NS).' <strong>'.__('SAVED', THEME_NS).'</strong></p></div>';
	}
	// display icon next to page title
	//screen_icon('page');

?>
            <div class="postbox">
             <form method="post" action="options.php">
	<?php settings_fields($ttsbg_settings); // important! ?>

    <h3  class="postbox-header">Adjust Sidebar CSS</h3>
            <div class="inside">  

               
                    

 		<p class="normal"><?php $my_css_prefix = ttsbg_option('css_prefix'); ?>
		<input type="text" name="<?php echo $ttsbg_settings; ?>[css_prefix]" value="<?php echo ttsbg_option('css_prefix'); ?>" size="4" />
		<?php _e(" This is the CSS prefix that the plugin tried to extract from the style.css file for your theme.  ", THEME_NS); ?>
                </p>
                <p class="sub"><?php _e("If you know it is not correct and wish to change the prefix, then enter the correct prefix and hit the Save button. ", THEME_NS); ?>
		</p>
		<p class="normal">
                <?php _e("If you want to add some additional CSS to the shortcode for some special styling, enter it in the box below.", THEME_NS); ?>
                   </p>
                   <p>
		<textarea cols=75 rows=10 name="<?php echo $ttsbg_settings; ?>[additional_css]" value="<?php echo ttsbg_option('additional_css'); ?>" size="4" ></textarea>
		
		</p>               
                <p class="sub"><?php _e("If your CSS doesn't appear to make any change, check your syntax and also make sure that you are targeting the correct element. ", THEME_NS); ?>
		</p>
                 

 		<p>
		<input type="submit" class="button-primary" value="<?php _e('Save CSS Settings') ?>" />
		<input type="submit" class="button-highlighted" name="<?php echo $ttsbg_settings; ?>[reset]" value="<?php _e('Reset CSS Settings'); ?>" />
		</p> 
		<p><strong><?php _e("Reset", THEME_NS); ?></strong> <?php _e(" will reset all CSS options to their default values. It will not delete any sidebars that have been defined above. You should reset the CSS settings if you change themes. This will re-check the style.css file.", THEME_NS); ?></p>                
                
               
                
            </div>	
             </form>
            </div>
            
            
            
		</div></div></div>
		<?php
	}


	
	// replaces array of sidebar names	
	function update_sidebars($sidebar_array){
		$sidebars = update_option('tt_sbg_sidebars',$sidebar_array);
	}	
	
	// gets the generated sidebars
	function get_sidebars(){
		$sidebars = get_option('tt_sbg_sidebars');
		return $sidebars;
	}
	function name_to_class($name){
		$class = '[sidebar name="'.$name.'" /]';
		return $class;
	}

	        
        
}
$sbg = new ttsbg_sidebar_generator;

function generated_dynamic_sidebar($name='0'){
	ttsbg_sidebar_generator::get_sidebar($name);	
	return true;
}

//*************************** Sidebar Shortcode ***************************//

function tt_sc_sidebar($atts, $content = null) {
	extract(shortcode_atts(array(
        'name' => 'default',
        'width' => '',
        'align' => 'alignleft',
		), $atts));
	
        
        ob_start(); 
        get_style();
        global $css_prop;
        ?>
    <style type="text/css">
        <?php echo $css_prop; ?>
        <?php echo $additional_css; ?>
        .<?php echo ttsbg_option('css_prefix'); ?>blockcontent-body li{margin:0;}
        .<?php echo ttsbg_option('css_prefix'); ?>blockcontent-body ul{margin:0;}
        ul.<?php echo ttsbg_option('css_prefix'); ?>vmenu {margin:0 !important;}
        ul.<?php echo ttsbg_option('css_prefix'); ?>vmenu li{background-image:none !important;padding-left:0 !important; }
    </style>
	<div class="art-layout-cell art-sidebar1 <?php echo($align); ?>" style="width: <?php echo($width); ?>px"><?php theme_dynamic_sidebar($name); ?></div>
<?php 

	$output_string = ob_get_contents();
	ob_end_clean(); 
	
	return $output_string;

}

add_shortcode("sidebar", "tt_sc_sidebar");

?>
