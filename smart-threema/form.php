<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* --------------------------------------------------------------------------------------------------------------------------------------- */
 function adminForm_threemasmart() {
	 

?>
<div class="wrap">
<h2><?php _e( 'Smart Threema', 'smart-threema' ); ?></h2>
<p><?php _e( 'Add Threema Buttons to your Website and allow your Visitor to Contact you.', 'smart-threema' ); ?></p>

	
<hr />
	
<?php
  

  
/*------nonce field check start ---- */
if (isset($_REQUEST['submit'])) {

  if ( 
    ! isset( $_POST['nonce_threemasmart'] ) 
    || ! wp_verify_nonce( $_POST['nonce_threemasmart'], 'nonce_threemasmart_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_threemasmart();
  			}
			
  }			
/*------nonce field check end ---- */  

  
/*------nonce field check start ---- */
	 //status online oder offline
if (isset($_REQUEST['submit_threemasmart_reset'])) {
  if ( 
    ! isset( $_POST['nonce_reset'] ) 
    || ! wp_verify_nonce( $_POST['nonce_reset'], 'nonce_reset_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_threemasmart_reset();
  			}
}
/*------nonce field check end ---- */ 
	 
/*------nonce field check start ---- */
if (isset($_REQUEST['submit_threemasmartposi'])) {

  if ( 
    ! isset( $_POST['nonce_threemasmartposi'] ) 
    || ! wp_verify_nonce( $_POST['nonce_threemasmartposi'], 'nonce_threemasmartposi_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_threemasmartposi();
  			}
			
  }			
/*------nonce field check end ---- */  
	 

/*------nonce field check start ---- */
	 //Floating Button online oder offline
if (isset($_REQUEST['submit_threemasmartchat_floatingbutton_online'])) {
  if ( 
    ! isset( $_POST['nonce_threemasmartchat_floatingbutton_online'] ) 
    || ! wp_verify_nonce( $_POST['nonce_threemasmartchat_floatingbutton_online'], 'nonce_threemasmartchat_floatingbutton_online' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_threemasmart_floatingbutton_online();
  			}
}
/*------nonce field check end ---- */ 
	 
/*------nonce field check start ---- */ 

if (isset($_REQUEST['submit_threemasmartchat_floating_posi'])) {
  if ( 
    ! isset( $_POST['nonce_threemasmartsharefloatingbuttonposi'] ) 
    || ! wp_verify_nonce( $_POST['nonce_threemasmartsharefloatingbuttonposi'], 'nonce_threemasmartsharefloatingbuttonposi_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_threemasmartsharefloatingbuttonposi();
		//print "set floating button position";
	  //exit;
  			}
}
/*------nonce field check end ---- */  
	 
  
  
 showForm_threemasmart();
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */ 
 
    
/* --------------------------------------------------------------------------------------------------------------------------------------- */  
 function saveForm_threemasmart() {
  if (sanitize_text_field($_POST['threemasmart_id']) ) {
	$threemasmart_id_kleinbuchstaben = $_POST['threemasmart_id'];
	$threemasmart_id_grossbuchstaben = strtoupper($threemasmart_id_kleinbuchstaben);

  update_option('threemasmart_id', sanitize_text_field($threemasmart_id_grossbuchstaben) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */  
 function saveForm_threemasmart_reset() {
  	  
  update_option('threemasmart_id', '' );
  
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */  
/* container position */
 function saveForm_threemasmartposi() {
  if (sanitize_text_field($_POST['threemasmart_position']) ) {
	
  update_option('threemasmart_position', sanitize_text_field($_POST['threemasmart_position']) );
  }
  
 }

/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */ 
   		

//whatsapp chat -  floating button online offline
 function saveForm_threemasmart_floatingbutton_online() {
  if (sanitize_text_field($_POST['threemasmart_floatingbutton_status']) ) {

  update_option('threemasmart_floatingbutton_status', sanitize_text_field($_POST['threemasmart_floatingbutton_status']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */
/* Posi Floating Button */

 function saveForm_threemasmartsharefloatingbuttonposi() {
  //if ((sanitize_text_field($_POST['threemasmart_floation_posi_rechts_nach_links']) ) && (sanitize_text_field($_POST['threemasmart_floating_posi_unten_nach_oben']) )) {

update_option('threemasmart_floation_posi_rechts_nach_links', sanitize_text_field($_POST['threemasmart_floation_posi_rechts_nach_links']) );
update_option('threemasmart_floating_posi_unten_nach_oben', sanitize_text_field($_POST['threemasmart_floating_posi_unten_nach_oben']) );
	  
  //}
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */
function showForm_threemasmart() {

  
  
   $threemasmart_id_show = get_option('threemasmart_id');


  //tel nummer
  ?>
<h2><?php _e( 'Smart Threema ID', 'smart-threema' ); ?></h2>
<form method="post">
<label for="quickgoogleanalytics_ua"><strong><?php _e( 'Add your Threema Smart ID (Exampl.: ABCDEFGH)', 'smart-threema' ); ?> </strong><br />
<input type="text"  name="threemasmart_id" size="50" maxlength="50" value="<?php echo $threemasmart_id_show; ?>">
</label><br />
<input type="submit" style="height: 25px; width: 250px" name="submit" value="<?php _e( 'Save', 'smart-threema' ); ?>">
  <?php wp_nonce_field( 'nonce_threemasmart_field', 'nonce_threemasmart' ); ?>
</form><br/>


<form method="post">
<input type="submit" style="height: 25px; width: 450px" name="submit_threemasmart_reset" value="<?php _e( 'Reset', 'smart-threema' ); ?>">
  <?php echo wp_nonce_field( 'nonce_reset_field', 'nonce_reset' ); ?>
</form>
<br /><br />
<hr>
<?php
	
	$threemasmart_position_nr = get_option('threemasmart_position');
	if ($threemasmart_position_nr == '1')
	{
		$input_radio1 = '<input type="radio" name="threemasmart_position" value="1" id="Position_0"  checked="checked">';
		
	}
	else {$input_radio1 = '<input type="radio" name="threemasmart_position" value="1" id="Position_0">';}
		
	
	
	if  ($threemasmart_position_nr == '2')
	{
		$input_radio2 = '<input type="radio" name="threemasmart_position" value="2" id="Position_1"  checked="checked">';
	}
	else {$input_radio2 = '<input type="radio" name="threemasmart_position" value="2" id="Position_1">';}
	
	
	
	
	if   ($threemasmart_position_nr == '3')  
	{
		$input_radio3 = '<input type="radio" name="threemasmart_position" value="3" id="Position_2"  checked="checked">';
	}
	else {$input_radio3 = '<input type="radio" name="threemasmart_position" value="3" id="Position_2">';}
	
		if   ($threemasmart_position_nr == '4')  
	{
		$input_radio4 = '<input type="radio" name="threemasmart_position" value="4" id="Position_5"  checked="checked">';
	}
	else {$input_radio4 = '<input type="radio" name="threemasmart_position" value="4" id="Position_5">';}
	
	?>
	<h2><?php _e( 'Container Positions', 'smart-threema' ); ?></h2>
	<form method="post">
	<label>
	<?php 
    echo "$input_radio1";
    ?>
	<?php _e( 'Pages', 'smart-threema' ); ?>
	</label>
  	<br>
	<label>
	<?php 
    echo "$input_radio2";
    ?>
	<?php _e( 'Posts', 'smart-threema' ); ?>
	</label>
  	<br>
	<label>
	<?php 
    echo "$input_radio3";
    ?>

	<?php _e( 'Pages & Posts', 'smart-threema' ); ?>

	</label>
	<label>
	<br>
	<?php 
    echo "$input_radio4";
    ?>
	<?php _e( 'No Button', 'smart-threema' ); ?>
	
	</label>
  	<br>
	<input type="submit" style="height: 25px; width: 250px" name="submit_threemasmartposi" value="<?php _e( "Save", "wp-smart-seo" ); ?>">
  <?php wp_nonce_field( 'nonce_threemasmartposi_field', 'nonce_threemasmartposi' ); ?>
	</form>

  <?php
/* #################### FLOATING BUTTON ######################### */

	
	$threemasmart_floatingbutton_status_show = get_option('threemasmart_floatingbutton_status');
	
	if ($threemasmart_floatingbutton_status_show == 'an')
		{
		$threemasmart_floatingbutton_status_an = "<input name='threemasmart_floatingbutton_status' type='radio' value='an' checked>";
		$threemasmart_floatingbutton_status_aus = "<input name='threemasmart_floatingbutton_status' type='radio' value='aus'>";
		}
	else
		{
		$threemasmart_floatingbutton_status_an = "<input name='threemasmart_floatingbutton_status' type='radio' value='an'>";
		$threemasmart_floatingbutton_status_aus = "<input name='threemasmart_floatingbutton_status' type='radio' value='aus' checked>";
		}
	?>	
	
	<h2><?php _e( 'Floating Button activate or deactivate', 'smart-threema' ); ?></h2>
	<p><?php _e( 'If you want you can here activate the floating Button. A Button on the Right side - floating on a specific position', 'smart-threema' ); ?></p>
	
	<form method='post'>
	<table width='300' border='0'>
	<tr>
	<td width='20'><?php echo $threemasmart_floatingbutton_status_aus ?></td>
	<td width='280'><?php _e( 'Floating Button is disabled', 'smart-threema' ); ?></td>
	</tr>
	<tr>
	<td><?php echo $threemasmart_floatingbutton_status_an ?></td>
	<td><?php _e( 'Floating Button is enabled', 'smart-threema' ); ?></td>
	</tr>
	</table>
	<input type='submit' style='height: 25px; width: 250px' name='submit_threemasmartchat_floatingbutton_online' value='<?php _e( "Save", "wp-smart-seo" ); ?>'>
	<?php wp_nonce_field( 'nonce_threemasmartchat_floatingbutton_online', 'nonce_threemasmartchat_floatingbutton_online' ); ?>
	</form><br />
	
	
	<?php
	  //Floating Button Positionierung

	$threemasmart_floation_posi_rechts_nach_links_show = get_option('threemasmart_floation_posi_rechts_nach_links');
	
	$threemasmart_floating_posi_unten_nach_oben_show = get_option('threemasmart_floating_posi_unten_nach_oben');
	
	?>
	
  <h2><?php _e( 'Floating Button Position', 'smart-threema' ); ?></h2>
  <form method="post">
  <label for="threemasmart"><strong><?php _e( 'Position from right to left in px or %', 'smart-threema' ); ?></strong><br />
  <input type="text"  name="threemasmart_floation_posi_rechts_nach_links" size="50" maxlength="50"  value="<?php echo $threemasmart_floation_posi_rechts_nach_links_show ?>"> ex. 100px or 10%
  </label><br />
  <label for="threemasmart"><strong><?php _e( 'Position from bottom to above in px or %', 'smart-threema' ); ?></strong><br />
  <input type="text"  name="threemasmart_floating_posi_unten_nach_oben" size="50" maxlength="50"  value="<?php echo $threemasmart_floating_posi_unten_nach_oben_show ?>"> ex. 100px or 10%
  </label><br />
  <input type="submit" style="height: 25px; width: 250px" name="submit_threemasmartchat_floating_posi" value="<?php _e( "Save", "wp-smart-seo" ); ?>">
  <?php wp_nonce_field( 'nonce_threemasmartsharefloatingbuttonposi_field', 'nonce_threemasmartsharefloatingbuttonposi' ); ?>
</form><br/>



  </div>
<div class="wrap">
	<?php
	$shortcodeexample1 = '<img src="' . plugins_url( 'images/shortcode-example-0.jpg', __FILE__ ) . '" width="200">';
	

	$shortcodeexample_design1 = '<img src="' . plugins_url( 'images/floating-button-threema-klein.png', __FILE__ ) . '" width="50">';
	$shortcodeexample_design2 = '<img src="' . plugins_url( 'images/floating-button-threema-invers.gif', __FILE__ ) . '" width="50">';




	?>
	<h2><?php _e( 'Shortcode', 'smart-threema' ); ?></h2>
	<p><?php _e( 'Now we support some Shortcode. Use the following Shortcode to add your Threema Button, whereever you want.', 'smart-threema' ); ?></p>
	<h3>[threema]</h3>
	<?php _e( 'standard design without any styling', 'smart-threema' ); ?><br /><br />
	<?php echo $shortcodeexample1 ?>
	<br /><br />
	<b><?php _e( 'Design it yourself', 'smart-threema' ); ?></b><br />
	<?php _e( 'if you want to style this shortcode, use the following css codes and addept it to your needs. add it into your style-sheet, at your child-theme', 'smart-threema' ); ?><br />
	<p>
	.smartthreema_container {<br />
    border: 1px double brown!important; <?php _e( '/* Style the Border */', 'smart-threema' ); ?><br />
}<br />
<br />
.smartthreema_container_h4 {<br />
	color:red!important; <?php _e( '/* style title color */', 'smart-threema' ); ?><br />
	font-size:22px!important; <?php _e( '/* style title font size */', 'smart-threema' ); ?><br />
}<br />
<br />
.smartthreema_container_txt {<br />
	color:green!important; <?php _e( '/* style description text */', 'smart-threema' ); ?><br />
}<br />
	</p>
	
	
	<h3>[threema_design1]</h3>
	<?php echo $shortcodeexample_design1 ?>
	
	<h3>[threema_design2]</h3>
	<?php echo $shortcodeexample_design2 ?>
	
</div>
  <hr />
 
  <div class="wrap">
 
  <h2><?php _e( 'Infos', 'smart-threema' ); ?></h2>
  <p><?php _e( 'This is the Threema Smart WordPress Plugin - created by Eric-Oliver M&auml;chler', 'smart-threema' ); ?> <a href="http://www.chefblogger.me" target="_blank">www.chefblogger.me</a></p>
  
  
  </div>
  <?php
 }
 /* --------------------------------------------------------------------------------------------------------------------------------------- */
?>
