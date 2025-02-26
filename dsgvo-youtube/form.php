<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* ------------------------------------------------------------------------------- */ 
 function adminForm_dsgvoyoutube() {


?>
<div class="wrap dsgvoyoutube_box">
<h2><?php _e( 'DSGVO Youtube', 'dsgvo-youtube' ); ?></h2>
<p><?php _e( 'This are the instruction of how to add your youtube videos safe and according to the GDPR regulations.', 'dsgvo-youtube' ); ?></p>
<br /><br />
<h3><?php _e( 'Add your Videos directly (Not DSGVO / GDPR Correct)', 'dsgvo-youtube' ); ?></h3>
<p><?php _e( 'With this Code you can add your Videos directly into Wordpress Pages or Posts. But be aware thats not the GDPR / dsgvo correct way', 'dsgvo-youtube' ); ?></p>
<strong><?php _e( 'Use this Code:', 'dsgvo-youtube' ); ?></strong> <code>[dsgvo-youtube url=&quot;https://www.youtube.com/watch?v=fKkNvDtauI0&quot;][/dsgvo-youtube]</code>	
<br /><br />
<h3><?php _e( 'The GDPR Correct Way to add your Video ( DSGVO / GDPR Correct)', 'dsgvo-youtube' ); ?></h3>
<p><?php _e( 'Use this Code and your Video is GDPR correct in your WordPress Pages or Posts', 'dsgvo-youtube' ); ?></p>
<p><?php _e( 'Create a images and add it into your wordpress library. then use the following code - but replace the url with your image url', 'dsgvo-youtube' ); ?></p>	
<strong><?php _e( 'Use this Code:', 'dsgvo-youtube' ); ?></strong> <code>[dsgvo-youtube url=&quot;https://www.youtube.com/watch?v=CX11yw6YL1w&quot; images=&quot;https://www.chefblogger.me/wp-content/uploads/2015/10/I-can-do-it.jpg&quot; alt=&quot;my summer video&quot;][/dsgvo-youtube]</code>	

<br /><br />
<h3><?php _e( 'Overlay now resizable', 'dsgvo-youtube' ); ?></h3>
<p><?php _e( 'If you want to give your video overlay a special size, then extend the code with the heigh and width command.', 'dsgvo-youtube' ); ?></p>
<strong><?php _e( 'Use this Code:', 'dsgvo-youtube' ); ?></strong> <code>[dsgvo-youtube url=&quot;https://www.youtube.com/watch?v=CX11yw6YL1w&quot; images=&quot;https://www.chefblogger.me/wp-content/uploads/2015/10/I-can-do-it.jpg&quot; alt=&quot;my summer video&quot; width=&quot;600&quot; height=&quot;400&quot;][/dsgvo-youtube]</code>	
 </div>


<?php
if (isset($_REQUEST['submit'])) {

  if ( 
    ! isset( $_POST['nonce_bg'] ) 
    || ! wp_verify_nonce( $_POST['nonce_bg'], 'nonce_bg_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_bg_dsgvoyoutube();
  			}
			
  }			
/*------nonce field check end ---- */  


	 
  
  
 showForm_dsgvoyoutube();
 }
/* ------------------------------------------------------------------------------- */ 


  function saveForm_bg_dsgvoyoutube() {
  if (sanitize_text_field($_POST['dsgvoyoutube_bgcolor']) ) {
    $update_dsgvoyoutube_bgcolor = sanitize_text_field($_POST['dsgvoyoutube_bgcolor']);
  update_option('dsgvoyoutube_bgcolor', sanitize_text_field(esc_attr($update_dsgvoyoutube_bgcolor)) );
  }
  
 }


/* ------------------------------------------------------------------------------- */ 
function showForm_dsgvoyoutube() {

$dsgvoyoutube_bgcolor = get_option('dsgvoyoutube_bgcolor');
//echo "farbe: $dsgvoyoutube_bgcolor";
echo '<div class="wrap dsgvoyoutube_box">';
 echo '<h2 id="bgselector">Background Color Selector</h2>';
  echo '<form method="post">';
  echo '<label for="dsgvoyoutube"><strong>Select your Background Color</strong><br />';
  echo '<input type="color" id="colorPicker"  name="dsgvoyoutube_bgcolor" size="50" maxlength="50" value="' . $dsgvoyoutube_bgcolor . '">';
  echo '<input type="text" id="hexInput" value="' . esc_attr($dsgvoyoutube_bgcolor) . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit" value="Sichern / Save">';
  wp_nonce_field( 'nonce_bg_field', 'nonce_bg' );
echo '</form><br/>';
  echo '</div>';
echo '<script>
  document.addEventListener("DOMContentLoaded", function() {
    const colorPicker = document.getElementById("colorPicker");
    const hexInput = document.getElementById("hexInput");

    // Eventlistener für Änderungen im Color-Feld
    colorPicker.addEventListener("input", function() {
      const selectedColor = colorPicker.value;
      hexInput.value = selectedColor;
    });

    // Eventlistener für Änderungen im Hex-Feld
    hexInput.addEventListener("input", function() {
      const enteredHex = hexInput.value;
      colorPicker.value = enteredHex;
    });
  });
</script>';
?>

<div class="wrap">
  <div class="dsgvoyoutube_red_container">
  <h3><?php _e( 'Video replace thumbnail - no overlay (Beta)', 'dsgvo-youtube' ); ?></h3>
  <p><?php _e( 'if you embed this new shortcode, your video is no longer loaded in an overlay', 'dsgvo-youtube' ); ?></p>
  <p><?php _e( 'after you click on the thumbnail, the image will disappear and be replaced by the video', 'dsgvo-youtube' ); ?></p>
<strong><?php _e( 'Use this Code:', 'dsgvo-youtube' ); ?></strong> <code>[dsgvo-youtube-inpage videoid=&quot;mULSj3iKXTs&quot; images=&quot;https://www.chefblogger.me/wp-content/uploads/2015/10/I-can-do-it.jpg&quot; alt=&quot;my summer video&quot; width=&quot;600&quot; height=&quot;400&quot;][/dsgvo-youtube-inpage]</code>	

<p><?php _e( 'this features is under beta test - If you finde a bug, please report it here: <a href="https://support.ericmaechler.com/" target="_blank">Support</a>', 'dsgvo-youtube' ); ?></p>

</div>
</div>


<div class="wrap dsgvoyoutube_box">
<h2><?php _e( 'Support', 'dsgvo-youtube' ); ?></h2>
<p><?php _e( 'If you have found a bug, or have a question or feedback, or even if you have an idea for an extension, then come to my support forum and you can talk directly to the community and me.', 'dsgvo-youtube' ); ?></p>
<p><?php _e( 'Just click on the following link', 'dsgvo-youtube' ); ?></p>
<p><a href="https://support.ericmaechler.com/" target="_blank">Support</a></p>
</div>


<div class="wrap dsgvoyoutube_box">
 
  <h3><?php _e( 'Infos', 'dsgvo-youtube' ); ?></h3>
  <p><?php _e( 'This is the DSGVO Youtube WordPress Plugin - created by Eric-Oliver M&auml;chler', 'dsgvo-youtube' ); ?> <a href="http://www.chefblogger.me" target="_blank">www.chefblogger.me</a></p>
  
  
  </div>
  <?php
 }
/* ------------------------------------------------------------------------------- */ 
?>
