<?php
/*
Plugin Name: AMBER Alert Europe
Plugin URI: http://www.spep.nl/
Version: 1.11
Author: <a href="http://www.spep.nl/">Peter Braun</a>
Description: A AMBER Alert Europe rss alerts plugin.
short : Amber alert Europe
*/
?>
<div class="wrap">
<?php screen_icon(); ?>
<h2>AMBER Alert Europe Options</h2>
<form name="Alert_Europeoption" id="Alert_Europeoption" method="POST" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<p>Number of alterts ( between 1 and 14 )
<input type="number" step="1" min="0" max = "15" name="Alert_Europe1_option" size="3" value="<?php echo get_option('Alert_Europe1_option'); ?>" /></p>

<p><input type="checkbox" name="Alert_Europe2_option" <?php checked( get_option('Alert_Europe2_option') == 'on',true); ?> />
Show a photo with the alert ? ( checked is yes )</p>

<p><input type="checkbox" name="Alert_Europe3_option" <?php checked( get_option('Alert_Europe3_option') == 'on',true); ?> />
Show the coordinates with the alert ? ( checked is yes ) </p>


<p><input type="checkbox" name="Alert_Europe4_option" <?php checked( get_option('Alert_Europe4_option') == 'on',true); ?> />
turn chache on  ?( checked is yes and wil improve server time )</p>

<p>how lang before update the chache ? ( 3600 sec = 1 hour)
<label>update : </label>
<input type="number" step="5" min="5" name="Alert_Europe5_option" size="3" value="<?php echo get_option('Alert_Europe5_option'); ?>" /> seconds</p>


<p><input type="checkbox" name="Alert_Europe0_option" <?php checked( get_option('Alert_Europe0_option') == 'on',true); ?> />
Promote spep.nl ? ( we are a non profit open stage venue for artists)</p>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="Alert_Europe1_option,Alert_Europe2_option,Alert_Europetest_option,Alert_Europe_chachetime,Alert_Europe_chachetext,Alert_Europe3_option,Alert_Europe4_option,Alert_Europe5_option,Alert_Europe0_option" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

<p>for internal use :<br> 
<input type="hidden" name="Alert_Europe_chachetime" size="12" value="<?php echo time();?>" /> 
<input type="hidden" name="Alert_Europe_chachetext" size="12" value="leeg" /> 
<input type="checkbox" name="Alert_Europetest_option" <?php checked( get_option('Alert_Europetest_option') == 'on',true); ?> /> test : shows some interal stuff ( checked is yes )</p>

</form></div>