<?php

// Admin Functions
function getRokuCats() {
	    global $roCatGrab, $roOptions;
		$options = $roOptions;
	
		$userCat = $options["rokuCat"];
		$EpNoMax = $options["noCat"];
		$categories = get_categories($roCatGrab); 
		
		$i = 0;
		
		foreach ($categories as $category) {
			   $catID = $category->cat_ID;
				   if ($catID == $userCat[$i]) {
					  	$option = '<option value="'.$catID.'" selected="selected">';
						$option .= $category->cat_name;
						$option .= '</option>';
						echo $option;
						$i = $i + 1;
			   		} else {
				   		$option = '<option value="'.$catID.'">';
						$option .= $category->cat_name;
						$option .= '</option>';
						echo $option;						   
				}
				
}}

// Admin Page Builder

function rovidx_roku_addon_page() {
	
	global $roSettingsAr, $roCatGrab, $roOptions;
	$options = $roOptions;
	?>
    <div class="wrap">
   		<h1><?php _e('RoVidX Roku VOD Lite'); ?></h1><hr />
       <h3> <strong>Have a <em>PREMIUM</em> CHANNEL?</strong>  Go Pro! - <a href="http://rovidx.com/downloads/roku-feeds-addon-pro/" target="_blank">Get Roku VOD Pro</a>!</h3>
       Includes: Secondary RSS Feed | Wordpress-to-Roku Link System | Advertising System<hr />
<form id="rovidxform" method="post" action="options.php">
   	  <?php
  				settings_fields( 'rovidx_settings_roku_group' );
				do_settings_sections( 'rovidx_settings_roku_group' );
					$userCat = $options["rokuCat"];
					$EpNoMax = $options["noCat"];
			
?><label class="header" for="rovidx_settings_roku[noCat]"><?php _e( '<h3><strong>Maximum Episodes <em>per</em> Category</strong></h3>'); ?></label>
			<input type="number" min="1" max="50" value="<?php echo $EpNoMax; ?>" name="rovidx_settings_roku[noCat]" /><hr />
            <label class="header" for="rovidx_settings_roku[rokuCat]"><?php _e( '<h3><strong>Select Roku Categories</strong></h3>', 'rovidx_domain' ); ?></label>
	    	<select name="rovidx_settings_roku[rokuCat][]" multiple="multiple" size="10" style="width:250px;"> 
<?php getRokuCats() ?></select><br /><hr />
    	    <input type="submit" class="button-primary" value="Save Options" />
    </form><br />
    <div>Output Feeds: <a href="<?php echo  site_url().'/feeds/rokucat/' ?>">Category Listings</a></div>
    </div>
	<?php
}