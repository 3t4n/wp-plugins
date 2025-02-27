<?php
/*
Plugin Name: Horizontal Line Styles
Plugin URI: http://www.WarMarks.com/
Description: Adds an HR Horizontal Line button into tinymce editor and also number for Styles to spice your Horizontal Rule/lines with just one click
Version: 1.0
Author: Mohsin Rasool
Author URI: http://www.MohsinRasool.com/
License: GPL2
*/


add_filter("mce_buttons", "wmhr_hr_button");
function wmhr_hr_button($buttons) {
     $buttons[] = 'hr';
     return $buttons;
}


function wmhr_admin_style() {
		  wp_register_style( 'wmhr_admin_hr_css', plugins_url('hr-style.css', __FILE__) );
        wp_register_style( 'wmhr_admin_css', plugins_url('hr-style-admin.css', __FILE__) );
        wp_enqueue_style( 'wmhr_admin_hr_css' );
        wp_enqueue_style( 'wmhr_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wmhr_admin_style' );





add_action('admin_menu','wmhr_settings_page');

function wmhr_settings_page() {
if ( current_user_can( 'manage_options' ) && is_admin()){
add_submenu_page( 'themes.php', 'HR Styles Custom Settings', 'Hr Line Styles', 'manage_options', 'wmhr_styles_settings','wmhr_plugin_custom_menu_page');
}}



//Our admin page content
function wmhr_plugin_custom_menu_page(){ ?>

<div class="wrap hrz">
<h2>HR Styles Settings</h2>

<h3>1. How to Add HR, Horizontal Lines in Your Posts or Pages </h3>
<div class="form-table" style="background:white;padding-top:10px;">

<ol>
<li>Once hr-styles plugin is activated</li>
<li>A new Button on your Editor is added as shown in this photo below</li>
<li>Click on the button after having Cursor at right position in your article</li>

</ol>


<img src="<?php echo plugins_url('img/tiny-button.jpg', __FILE__) ;?>" class="thumbnail" style="border:1px solid silver;margin:10px;">

</div>

<h3>2. Choose Default Styles for Your Horizontal Rules/Lines on Your Website </h3>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<table class="form-table" style="background:white;">

<?php
$wmhr_chosen_style_current = get_option('wmhr_chosen_style');
//$wmhr_chosen_style_current = 'style0';
//echo $wmhr_chosen_style_current;

for($wmhr_i=0;$wmhr_i < 19;$wmhr_i++) {
$wmhr_style = 'style'.$wmhr_i;	

//echo $wmhr_style;	
if($wmhr_style ==$wmhr_chosen_style_current){ 
$wmhr_check = 'checked checked="checked"'; }
else { $wmhr_check='';}	 
	 
	 ?>



<tr><td>
<input <?php echo $wmhr_check; ?> type="radio" name="wmhr_chosen_style" value="style<?php echo $wmhr_i; ?>"  /> 
<hr class="style<?php echo $wmhr_i; ?>" />
</td></tr>
 


<?php }
?>



</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="wmhr_chosen_style" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>


<?php }

add_action( 'wp_enqueue_scripts', 'wmhr_hr_styles' );

function wmhr_hr_styles() {
    wp_register_style( 'wmhr-style', plugins_url('hr-style.css', __FILE__) );
    wp_enqueue_style( 'wmhr-style' );

$path = plugins_url().'/hr-styles/img/';        
        $img = $path.'h-01.gif';




$wmhr_chosen = get_option('wmhr_chosen_style');		
$color = '#8c8b8b';
$width = "100%";


$common = 		"width: $width;
       				margin-right: auto;
         			margin-left:auto;";
	
	
switch ($wmhr_chosen) {
    case "style1":
        $custom_css = "
				body hr{        
         				border-top: 1px solid $color;
         				$common;
               			}";
        break;
    case "style2":
        $custom_css = "
				body hr{        
         					border-top: 3px double $color;
         					$common;
               			}";
        break;
    case "style3":
        $custom_css = "
				body hr{        
         					border-top: 1px dashed $color;
         					$common;
               			}";
        break;
        
    case "style4":
        $custom_css = "
				body hr{        
         					border-top: 1px dotted $color;
         					$common;
               			}";
        break;
        
    case "style5":
        $custom_css = "
				body hr{        
         				background-color: #fff;
							border-top: 2px dashed $color;
							$common;
               			}";
        break;
    case "style6":
        $custom_css = "
				body hr{        
         					background-color: #fff;
								border-top: 2px dotted $color;
								$common;
               			}";
        break;
    case "style7":
        $custom_css = "
				body hr{        
         					border-top: 1px solid $color;
								border-bottom: 1px solid #fff;
         					$common;
               			}";
        break;
    case "style8":
        $custom_css = "
				body hr{        
         					border-top: 1px solid $color;
								border-bottom: 1px solid #fff;
         					$common;
               			}
            body hr:after {
								content: '';
								display: block;
								margin-top: 2px;
								border-top: 1px solid $color;
								border-bottom: 1px solid #fff;
								}";
        break;
    case "style9":
        $custom_css = "
				body hr{        
         					border-top: 1px dashed $color;
								border-bottom: 1px dashed #fff;
         					$common;
               			}";
        break;
    case "style10":
        $custom_css = "
				body hr{        
         					border-top: 1px dotted $color;
								border-bottom: 1px dotted #fff;
         					$common;
               			}";
        break;
    case "style11":
   	 $img = $path.'h-11.png';
        $custom_css = "
				body hr{        
         					height: 6px;
								background: url($img) repeat-x 0 0;
    							border: 0;
    							$common;
               			}";
        break;
    case "style12":
	    $img = $path.'h-12.png';
        $custom_css = "
				body hr{        
	         				height: 6px;
								background: url($img) repeat-x 0 0;
    							border: 0;	
         					$common;
               			}";
        break;
    
    case "style13":
	    
        $custom_css = "
				body hr{        
	         				height: 10px;
								border: 0;
								box-shadow: 0 10px 10px -10px $color inset;
	      					$common;
               			}";
        break;
    
    case "style14":
	    
        $custom_css = "
				body hr{        
	         				border: 0; 
  								height: 1px; 
  								background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  								background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  								background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  								background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);	
         					$common;
               			}";
        break;            

    case "style15":
	    
        $custom_css = "
				body hr{        
	         				border-top: 4px double $color;
								text-align: center;		
								$common;
               			}
            body hr:after {
								content: '\002665';
								display: inline-block;
								position: relative;
								top: -15px;
								padding: 0 10px;
								background: #f0f0f0;
								color: $color;
								font-size: 18px;
								}   			
               			";
        break;

    case "style16":
	    
        $custom_css = "
							body hr{        
						      border-top: 1px dashed $color;
	        					$common;
               			}
														
							body hr:after { 
							  content: '\002702'; 
							  display: inline-block; 
							  position: relative; 
							  top: -12px; 
							  left: 40px; 
							  padding: 0 3px; 
							  background: #f0f0f0; 
							  color: $color; 
							  font-size: 18px; 
							}";
        break;            

    case "style17":
	    
        $custom_css = "
				body hr{        
					    	border-top: 1px solid $color;
							text-align: center;
							$common;
				}
				body hr:after {
					content: '§';
					display: inline-block;
					position: relative;
					top: -14px;
					padding: 0 10px;
					background: #f0f0f0;
					color: $color;
					font-size: 18px;
					-webkit-transform: rotate(60deg);
					-moz-transform: rotate(60deg);
					transform: rotate(60deg);
				
        			}";
        break;

    case "style18":
	   
        $custom_css = "
					body hr{        
						   height: 30px; 
							border-style: solid; 
					  		border-color: $color; 
					  		border-width: 1px 0 0 0; 
					  		border-radius: 20px;
					  		$common; 
					} 
					body hr:before { 
					  		display: block; 
					  		content: ''; 
					  		height: 30px; 
					  		margin-top: -31px; 
					  		border-style: solid; 
					  		border-color: $color; 
					  		border-width: 0 0 1px 0; 
					  		border-radius: 20px; 
								}";
        break;
    
    default:
    		$img = $path.'h-01.gif';
        $custom_css = "
				body hr{        
         				width: auto;
    						background: transparent url($img) repeat-x;
    						height: 6px;
    						border: medium none;
    						padding-bottom: 4px;
						   margin-top: 7px;
    						margin-left: 1px;
    						$common;
               			}";
               
}               
               
               
        wp_add_inline_style( 'wmhr-style', $custom_css );
}	