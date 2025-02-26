<?php 
ob_start();
	/*
Plugin Name: Ads Adder
Plugin URI: http://www.ninobs.com
Description: Ads Adder Plugin .. Tools to add  google adsense in the bellow title and bellow content
Version: 0.1
Author: ninobs
Author URI: http://www.ninobs.com
*/
	function bellow_the_content($content) 
	{ 
		$check_on = get_option("nobs_bellow_on"); //Get plugin option to check if we want to show ads
		if($check_on){
		if (is_single())
		{
		$bellow_text = str_replace("\\","",get_option("nobs_bellow_ads")); //Get option text  
		$upper_text = str_replace("\\","",get_option("nobs_title_ads")); //Get option text  
		
		}
        else
		{$bellow_text = ""; $upper_text = "";}
		
		}

		return $upper_text  . " " . $content . ' '. $bellow_text  ; 
	} 
	add_filter('the_content', 'bellow_the_content'); 
	
	/*
	//add ads in the upper title
	add_filter('the_title','upper_the_title');
	
	function upper_the_title($title)
	{
	
		$check_on = get_option("nobs_bellow_on"); //Get plugin option to check if we want to show the intro
		if($check_on){
		if (is_single())
		{
		$upper_text = str_replace("\\","",get_option("nobs_title_ads")); //Get option text  
		
		}
        else
		{ $upper_text = "";}
		
		}

		return $upper_text . " " . $title;
	}
	*/
	

//Make our admin page function
function nobs_intro_adminpage(){
    //Check if the admin form has been submited
    if(isset($_POST['submitted'])){
        //Get form data
        $nobs_bellow_on = $_POST['nobs_bellow_on'];
        $nobs_title_ads = $_POST['nobs_title_ads'];
        $nobs_bellow_ads = $_POST['nobs_bellow_ads'];
        //Update plugin options
        update_option("nobs_bellow_on", $nobs_bellow_on); //The first parameter is the name of the option and the second is the value, this will be stored in the database by WordPress
        update_option("nobs_bellow_ads", $nobs_bellow_ads);
        update_option("nobs_title_ads", $nobs_title_ads);
        //echo a pretty 'Options Edited' message
        echo "<div id=\"message\" class=\"updated fade\"><p><strong>Ads Adder Plugin is updated</strong></p></div>";
    }
    //echo the code for a nice container for our plugin admin page
    echo "<div class=\"wrap\">
    <h2>Ads Adder Setup</h2><br />You can configure <strong>Ads Adder Plugin</strong> here. You can change wether the plugin shows ads in the bellow title or bellow content. For support visit <a href=\"http://www.ninobs.com/ads-adder-plugin-add-adsense-below-title-in-wordpress/\">http://www.ninobs.com</a>.";
    //It's always a good idea to put in a link to your website so that the user can get support and check for newer versions.
    //Make a nice little form for the option editing
    ?><form method="post" name="options" target="_self">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="300">Do you want to activate the ads adder plugin?</td>
    <td><select name="nobs_bellow_on">
    <option value="true" selected="selected">Yes</option>
    <option value="false">No</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Ads Bellow Title :</td>
    <td><textarea name="nobs_title_ads" style="height: 100px; width:100%;"><?php echo str_replace("\\","",get_option("nobs_title_ads")); ?></textarea></td>
  </tr>
  <tr>
    <td>Ads Bellow Content :</td>
    <td><textarea name="nobs_bellow_ads" style="height: 100px; width:100%;"><?php echo str_replace("\\","",get_option("nobs_bellow_ads")); ?></textarea></td>
  </tr>
</table>
<p class="submit">
<input name="submitted" type="hidden" value="yes" />
<input type="submit" name="Submit" value="Update Options &raquo;" />
</p>
</form></div><?php 
}

//Add the options page under the Options tab in the admin panel
function nobs_intro_addpage() {
    add_submenu_page('options-general.php', 'Ads Adder Options', 'Ads Adder Options', 10, __FILE__, 'nobs_intro_adminpage');
}
add_action('admin_menu', 'nobs_intro_addpage');
?>