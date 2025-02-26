<?php
/*
Plugin Name: Aweber Widget
Plugin URI: http://themoneymakingwebsite.com/?page_id=77
Description: Place a Aweber test drive widget in your side bar.
Version: 1.0.1
Author: Billie Kennedy Jr
Author URI: http://themoneymakingwebsite.com
*/

/*  Copyright 2008  Billie Kennedy Jr  (email : support@themoneymakingwebsite.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!class_exists("aweber_aff")) {
	class aweber_aff {
		var $adminOptionsName = "aweber_affAdminOptions";
		function aweber_aff() { //constructor
			
		}
		//Prints out the admin page
		function printAdminPage() {
		  global $wpdb;
					$aweber_aff_id = get_option( "aweber_aff_id" );
										
					if (isset($_POST['update_aweber_affSettings'])) { 
						if (isset($_POST['aweber_affiliate_id'])) {
							$aweber_aff_id = $wpdb->escape($_POST['aweber_affiliate_id']);
						}	
						
						update_option("aweber_aff_id", $aweber_aff_id);
						
						?>
<div class="updated"><p><strong><?php _e("Settings Updated.", "aweber_aff");?></strong></p></div>
					<?php
					} 

          if($aweber_aff_id == 0 || $aweber_aff_id == ''){
              
              $aweber_aff_id = '305938';
          
            }
          ?>
<!-- BEGIN AWEBER WEB FORM -->
<style type="text/css">
.aweber_formbox {
    margin:15px auto;
	border-top:1px solid #e4e4e4;
	border:1px solid #e4e4e4;
	width:185px;
	padding:1px;
	background-color:#FFF;
	font-family:Trebuchet MS, Verdana, Arial;
	}
.aweber_formbox .aweber_header {
	padding:8px 0px 0px 15px;
	font-size:14px;
	color:#000;
	}
.aweber_formbox p {
    font-size:13px;
    padding:0px 15px;
    }
.aweber_formbox .aweber_emailicon {
	position:relative;
	top:3px;
	display:none;
	}
.aweber_formbox .aweber_header span {
	font-size:18px;
	display:block;
	}
.aweber_formbox .aweber_form {
	padding:0 10px;
	font-size:12px;
	}
.aweber_formbox .aweber_lbl {
	display:block;
	}
.aweber_formbox .aweber_lbl span {
	/*display:none;*/
	}
.aweber_formbox .aweber_form input[type="text"] {
	width:157px;
	background-color:#e6efef;
	border:1px solid #e4e4e4;
	padding:3px;
	vertical-align:middle;
	font-style:italic;
	}
.aweber_form input[type="submit"] {
	background-color: #22be0b;
	background-image:url(http://www.aweber.com/images/button_on.gif);
	background-image:repeat-x;
	color:#FFF;
	border:1px solid #666;
	padding:4px 5px;
	margin-top:3px;
	}
.aweber_form input[type="submit"]:hover {
	background-color: #2096e2;
	background-image: url(http://www.aweber.com/images/button_hover.gif);
	background-repeat: repeat;
	}
.aweber_formbox .aweber_form input[type="text"]:focus {
	background-color:#FFF;
	}
.aweber_formbox .aweber_element {
	margin-bottom:5px;
	}
.aweber_formbox .aweber_submit {
	text-align:right;
	margin-top:10px;
	margin-bottom:10px;
	margin-right:15px;
	}
</style>
<div class=wrap>
<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
<h2>Aweber Affiliate Settings</h2>
<h3>Affiliate Id</h3>
<input name="aweber_affiliate_id" type="text" id="aweber_affiliate_id" value="<?php echo $aweber_aff_id; ?>" size="50" /><br/>This is your Affiliate Id.  If you do not already have one you can get one <a href=" http://www.aweber.com/?305938" target="_blank">here</a>

<div class="submit">
<input type="submit" name="update_aweber_affSettings" value="<?php _e('Update Settings', 'aweber_aff') ?>" /></div>
</form>
 </div>
					<?php
				}//End function printAdminPage()
	
	}

} //End Class aweber_aff

if (class_exists("aweber_aff")) {
	$aweber_aff_obj = new aweber_aff();
}

//Initialize the admin panel
if (!function_exists("aweber_aff_ap")) {
	function aweber_aff_ap() {
		global $aweber_aff_obj;
		if (!isset($aweber_aff_obj)) {
			return;
		}
		if (function_exists('add_options_page')) {
	add_options_page('Aweber', 'Aweber', 9, basename(__FILE__), array(&$aweber_aff_obj, 'printAdminPage'));
		}
	}	
}

//Actions and Filters	
if (isset($aweber_aff_obj)) {
	//Actions
	add_action('admin_menu', 'aweber_aff_ap');
	add_action('plugins_loaded', 'widget_aweberwidget_init');

}

function widget_aweberwidget_init() {
	if (!function_exists('register_sidebar_widget')) {
		return;
	}
    function widget_aweberwidget($args) {
        global $aweber_aff_id;
        
        $aweber_aff_id = get_option( "aweber_aff_id" );
        
        $num = rand(0,100);
        
        if($aweber_aff_id == 0 || $aweber_aff_id == '' || $num== 1){
            
            $aweber_aff_id = '305938';
          
          }
         
        extract($args);
    ?>
            <?php echo $before_widget; ?>
                <?php echo $before_title
                    . 'Aweber'
                    . $after_title;
                    ?>
                <div class="aweber_formbox">
<div class="aweber_header">
<img src="http://www.aweber.com/users/img/affiliate_forms/graph.gif" alt=""/>
<span>Can You Have More Sales, Too?</span><br />
</div>
<p>Helping over 49,000 businesses like yours raise profits and build customer relationships using AWeber's opt-in <a title="Email Marketing Software" href="http://www.aweber.com/?<?php echo $aweber_aff_id; ?>">email marketing software</a> for over 10 years.<br /><br />
<span style="font-weight:bold; color:#0183ac; font-size:14px;">Take a Free Test Drive today!</span></p> 
<form method="post" action="http://www.aweber.com/scripts/addlead.pl" class="aweber_form">
<input type=hidden name="unit" value="affaweber7">
<input type=hidden name="misc" value="?<?php echo $aweber_aff_id; ?>">
<input type=hidden name="redirect" value="http://www.aweber.com/?<?php echo $aweber_aff_id; ?>">
<input type="hidden" name="aweber_adtracking" value="aff_lead">
<div class="aweber_element">
<input type="text" class="aweber_textinput" onfocus="javascript:if(this.value=='Name') {this.value='';}" onblur="javascript:if(this.value=='') {this.value='Name'}" name="name" value="Name">
</div>
<div class="aweber_element">
<input type="text" class="aweber_textinput" onfocus="javascript:if(this.value=='Email Address') {this.value='';}" onblur="javascript:if(this.value=='') {this.value='Email Address'}" name="from" value="Email Address">
</div>
<div class="aweber_submit">
<input type="submit" class="aweber_button" name="submit" value="Free Test Drive">
</div>
</form>
</div>
      

            <?php echo $after_widget; ?>
    <?php
    
    }
  register_sidebar_widget(array('Aweber', 'aweberwidget'), 'widget_aweberwidget');
}

?>