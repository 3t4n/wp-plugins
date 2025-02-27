<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* --------------------------------------------------------------------------------------------------------------------------------------- */
 function adminForm_quickwhatsapp() {
	 
	 
$buttondesign1 = '<img src="' . plugins_url( 'images/whatsapp-chat.jpg', __FILE__ ) . '" >';
$buttondesign2 = '<img src="' . plugins_url( 'images/whatsapp-chat-clear.png', __FILE__ ) . '" >';
$buttondesign3 = '<img src="' . plugins_url( 'images/whatsapp-chat-flat.png', __FILE__ ) . '" >';
$buttondesign4 = '<img src="' . plugins_url( 'images/whatsapp-chat-creativ.png', __FILE__ ) . '" >';
?>
<div class="wrap">
<h2>Quick WhatsApp</h2>
	
<table width="100%" border="0">
  <tbody>
    <tr>
<td width='70%'>
<h3><?php _e('Info','quick-whatsapp'); ?></h3>
<b><?php _e('German','quick-whatsapp'); ?></b>
<p><?php _e('With this Plugin installed, a WhatsApp Button will show on each Post in your WordPress.','quick-whatsapp'); ?></p>

<h3><?php _e('Installation','quick-whatsapp'); ?></h3>
<?php _e('Enter your mobile phone number which you can receive WhatsApp Msg','quick-whatsapp'); ?>
	
</td>
<td width='30%' style='background-color:antiquewhite; text-align: center'>
<h3><?php _e('Menu','quick-whatsapp'); ?></h3>
<a href="#handynummer"><?php _e('Mobile Phone Number','quick-whatsapp'); ?></a><br>
<a href="#buttondesignauswahl"><?php _e('Button Design','quick-whatsapp'); ?></a><br>
<a href="#chatactiv"><?php _e('Status','quick-whatsapp'); ?></a><br>
<a href="#floatingbutton"><?php _e('Floating Button','quick-whatsapp'); ?></a><br>
<a href="#groupe"><?php _e('WhatsApp Group Link','quick-whatsapp'); ?></a><br>
<a href="#shortcode"><?php _e('Shortcode','quick-whatsapp'); ?></a><br>
</td>
    </tr>
  </tbody>
</table>
	
	
	

<hr />
<h3><?php _e('Templates for Button Design','quick-whatsapp'); ?></h3>
<b>Standard</b><br />
<?php echo $buttondesign1; ?><br />
<b>Clear</b>	<br />
<?php echo $buttondesign2; ?><br />
<b>Flat</b><br />
<?php echo $buttondesign3; ?><br />
<b>Creativ</b><br />	
<?php echo $buttondesign4; ?><br />
	
<hr />
	
<?php
  

  
/*------nonce field check start ---- */
if (isset($_REQUEST['submit'])) {

  if ( 
    ! isset( $_POST['nonce_tel'] ) 
    || ! wp_verify_nonce( $_POST['nonce_tel'], 'nonce_tel_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsapp();
  			}
			
  }			
/*------nonce field check end ---- */  

  
  


/*------nonce field reset start ---- */
if (isset($_REQUEST['quickwhatsappbutton_reset'])) {
  if ( 
    ! isset( $_POST['nonce_reset'] ) 
    || ! wp_verify_nonce( $_POST['nonce_reset'], 'nonce_reset_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		resetForm_quickwhatsapp();
  			}
}
/*------nonce field reset end ---- */ 
/*------nonce field reset start ---- */
if (isset($_REQUEST['submit_whatsapp_custome_button_reset'])) {
  if ( 
    ! isset( $_POST['nonce_reset2'] ) 
    || ! wp_verify_nonce( $_POST['nonce_reset2'], 'nonce_reset2_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		resetForm_custome_chat_button();
  			}
}
/*------nonce field reset end ---- */ 
/*------nonce field reset start ---- */
	 

if (isset($_REQUEST['quickwhatsapp_resetgreetings'])) {
  if ( 
    ! isset( $_POST['nonce_resetgreetings'] ) 
    || ! wp_verify_nonce( $_POST['nonce_resetgreetings'], 'nonce_resetgreetings_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		resetForm_quickwhatsapp_greetings();
	  //print 'geklappt.';
  			}
}

/*------nonce field reset end ---- */ 	  


/*------nonce whatsapp button style field check start ---- */
if (isset($_REQUEST['submit_style'])) {
  if ( 
    ! isset( $_POST['nonce_style'] ) 
    || ! wp_verify_nonce( $_POST['nonce_style'], 'nonce_style_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				ECHO "ERROR";

			} else {
   		saveForm_quickwhatsappbutton_style();
  			}
}
/*------nonce field check end ---- */ 

	  
 
  
  
    
  
/*------nonce field check start ---- */
if (isset($_REQUEST['submit_whatsapp_custome_button'])) {
  if ( 
    ! isset( $_POST['nonce_chatbutton'] ) 
    || ! wp_verify_nonce( $_POST['nonce_chatbutton'], 'nonce_chatbutton_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappbutton();
  			}
}
/*------nonce field check end ---- */  

/*------nonce field check start ---- */
if (isset($_REQUEST['submit_quickwhatsapp_sharestatus'])) {
  if ( 
    ! isset( $_POST['nonce_sharestatus'] ) 
    || ! wp_verify_nonce( $_POST['nonce_sharestatus'], 'nonce_sharestatus_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappsharing();
  			}
}
/*------nonce field check end ---- */  
	 
/*------nonce field check start ---- */
	 //after add to cart button
if (isset($_REQUEST['submit_quickwhatsappchat_after_addtocart_button'])) {
  if ( 
    ! isset( $_POST['nonce_quickwhatsappchat_after_addtocart_button'] ) 
    || ! wp_verify_nonce( $_POST['nonce_quickwhatsappchat_after_addtocart_button'], 'nonce_quickwhatsappchat_after_addtocart_button_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappchat_after_addtocart_button();
  			}
}
/*------nonce field check end ---- */ 
	 
/*------nonce field check start ---- */
	 //status online oder offline
if (isset($_REQUEST['submit_quickwhatsappchat_status_online'])) {
  if ( 
    ! isset( $_POST['nonce_quickwhatsappchat_status_online'] ) 
    || ! wp_verify_nonce( $_POST['nonce_quickwhatsappchat_status_online'], 'nonce_quickwhatsappchat_status_online' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappchat_status_online();
  			}
}
/*------nonce field check end ---- */ 
	 
/*------nonce field check start ---- */
	 //Floating Button online oder offline
if (isset($_REQUEST['submit_quickwhatsappchat_floatingbutton_online'])) {
  if ( 
    ! isset( $_POST['nonce_quickwhatsappchat_floatingbutton_online'] ) 
    || ! wp_verify_nonce( $_POST['nonce_quickwhatsappchat_floatingbutton_online'], 'nonce_quickwhatsappchat_floatingbutton_online' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappchat_floatingbutton_online();
  			}
}
/*------nonce field check end ---- */ 

/*------nonce field check start ---- */
	 //global chat Button online oder offline
if (isset($_REQUEST['submit_quickwhatsappchat_chatbutton_online'])) {
  if ( 
    ! isset( $_POST['nonce_quickwhatsappchat_chatbutton_online'] ) 
    || ! wp_verify_nonce( $_POST['nonce_quickwhatsappchat_chatbutton_online'], 'nonce_quickwhatsappchat_chatbutton_online' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappchat_chatbutton_online();
  			}
}
/*------nonce field check end ---- */ 
  
/*------nonce field check start ---- */
if (isset($_REQUEST['submit_sharesbutton'])) {
  if ( 
    ! isset( $_POST['nonce_sharesbutton'] ) 
    || ! wp_verify_nonce( $_POST['nonce_sharesbutton'], 'nonce_sharesbutton_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappsharesbutton();
  			}
}
/*------nonce field check end ---- */   


/*------nonce field check start ---- */
if (isset($_REQUEST['submit_quickwhatsappsharebutton_reset'])) {
  if ( 
    ! isset( $_POST['nonce_quickwhatsappsharebuttonreset'] ) 
    || ! wp_verify_nonce( $_POST['nonce_quickwhatsappsharebuttonreset'], 'nonce_quickwhatsappsharebuttonreset_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappsharebuttonreset();
		//print "sharebutton wird resettet";
  			}
}
/*------nonce field check end ---- */  

/*------nonce field check start ---- */ 

if (isset($_REQUEST['submit_quickwhatsappchat_floating_posi'])) {
  if ( 
    ! isset( $_POST['nonce_quickwhatsappsharefloatingbuttonposi'] ) 
    || ! wp_verify_nonce( $_POST['nonce_quickwhatsappsharefloatingbuttonposi'], 'nonce_quickwhatsappsharefloatingbuttonposi_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappsharefloatingbuttonposi();
		//print "set floating button position";
  			}
}
/*------nonce field check end ---- */  

  
/*------nonce field check start ---- */ 
//greetings
	 
if (isset($_REQUEST['submit_whatsapp_greetings'])) {
  if ( 
    ! isset( $_POST['nonce_greetings'] ) 
    || ! wp_verify_nonce( $_POST['nonce_greetings'], 'nonce_greetings_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappsharegreetings();
		//print "set floating button position";
  			}
}
/*------nonce field check end ---- */  
	 
//groupelink
if (isset($_REQUEST['submit_whatsapp_groupelink'])) {
  if ( 
    ! isset( $_POST['nonce_groupelink'] ) 
    || ! wp_verify_nonce( $_POST['nonce_groupelink'], 'nonce_groupelink_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappgroupelink();
		//print "set floating button position";
  			}
}
/*------nonce field check end ---- */  

//groupelink2
if (isset($_REQUEST['submit_whatsapp_groupelink2'])) {
	if ( 
	  ! isset( $_POST['nonce_groupelink2'] ) 
	  || ! wp_verify_nonce( $_POST['nonce_groupelink2'], 'nonce_groupelink2_field' ) 
		  ) {
  
					 //print 'Sorry, your nonce did not verify.';
					 exit;
  
			  } else {
			 saveForm_quickwhatsappgroupelink2();
		  //print "set floating button position";
				}
  }
  /*------nonce field check end ---- */  

//groupelink3
if (isset($_REQUEST['submit_whatsapp_groupelink3'])) {
	if ( 
	  ! isset( $_POST['nonce_groupelink3'] ) 
	  || ! wp_verify_nonce( $_POST['nonce_groupelink3'], 'nonce_groupelink3_field' ) 
		  ) {
  
					 //print 'Sorry, your nonce did not verify.';
					 exit;
  
			  } else {
			 saveForm_quickwhatsappgroupelink3();
		  //print "set floating button position";
				}
  }
  /*------nonce field check end ---- */  
 
/*------nonce field reset start ---- */
if (isset($_REQUEST['quickwhatsapp_resetgroupelink'])) {
  if ( 
    ! isset( $_POST['nonce_resetgroupelink'] ) 
    || ! wp_verify_nonce( $_POST['nonce_resetgroupelink'], 'nonce_resetgroupelink_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		resetForm_groupelink();
  			}
}
/*------nonce field reset end ---- */ 

/*------nonce field reset start ---- */
if (isset($_REQUEST['quickwhatsapp_resetgroupelink2'])) {
	if ( 
	  ! isset( $_POST['nonce_resetgroupelink2'] ) 
	  || ! wp_verify_nonce( $_POST['nonce_resetgroupelink2'], 'nonce_resetgroupelink2_field' ) 
		  ) {
  
					 //print 'Sorry, your nonce did not verify.';
					 exit;
  
			  } else {
			 resetForm_groupelink2();
				}
  }
  /*------nonce field reset end ---- */ 

  /*------nonce field reset start ---- */
if (isset($_REQUEST['quickwhatsapp_resetgroupelink3'])) {
	if ( 
	  ! isset( $_POST['nonce_resetgroupelink3'] ) 
	  || ! wp_verify_nonce( $_POST['nonce_resetgroupelink3'], 'nonce_resetgroupelink3_field' ) 
		  ) {
  
					 //print 'Sorry, your nonce did not verify.';
					 exit;
  
			  } else {
			 resetForm_groupelink3();
				}
  }
  /*------nonce field reset end ---- */ 
	 
  
//groupelink bilderurl
if (isset($_REQUEST['submit_quickwhatsapps_groupelink_imgurl'])) {
  if ( 
    ! isset( $_POST['nonce_groupelinkimg'] ) 
    || ! wp_verify_nonce( $_POST['nonce_groupelinkimg'], 'nonce_groupelinkimg_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		saveForm_quickwhatsappgroupelinkimg();
		//print "set floating button position";
  			}
}
/*------nonce field check end ---- */  
 
/*------nonce field reset start ---- */
if (isset($_REQUEST['quickwhatsapps_resetgroupelink_imgurl'])) {
  if ( 
    ! isset( $_POST['nonce_resetgroupelinkimg'] ) 
    || ! wp_verify_nonce( $_POST['nonce_resetgroupelinkimg'], 'nonce_resetgroupelinkimg_field' ) 
		) {

   				//print 'Sorry, your nonce did not verify.';
   				exit;

			} else {
   		resetForm_groupelinkimg();
  			}
}
/*------nonce field reset end ---- */  
	 
	 

//groupelink bilderurl2
if (isset($_REQUEST['submit_quickwhatsapps_groupelink_imgurl2'])) {
	if ( 
	  ! isset( $_POST['nonce_groupelinkimg2'] ) 
	  || ! wp_verify_nonce( $_POST['nonce_groupelinkimg2'], 'nonce_groupelinkimg2_field' ) 
		  ) {
  
					 //print 'Sorry, your nonce did not verify.';
					 exit;
  
			  } else {
			 saveForm_quickwhatsappgroupelinkimg2();
		  //print "set floating button position";
				}
  }
  /*------nonce field check end ---- */  
   
  /*------nonce field reset start ---- */
  if (isset($_REQUEST['quickwhatsapps_resetgroupelink_imgurl2'])) {
	if ( 
	  ! isset( $_POST['nonce_resetgroupelinkimg2'] ) 
	  || ! wp_verify_nonce( $_POST['nonce_resetgroupelinkimg2'], 'nonce_resetgroupelinkimg2_field' ) 
		  ) {
  
					 //print 'Sorry, your nonce did not verify.';
					 exit;
  
			  } else {
			 resetForm_groupelinkimg2();
				}
  }
  /*------nonce field reset end ---- */  

//groupelink bilderurl3
if (isset($_REQUEST['submit_quickwhatsapps_groupelink_imgurl3'])) {
	if ( 
	  ! isset( $_POST['nonce_groupelinkimg3'] ) 
	  || ! wp_verify_nonce( $_POST['nonce_groupelinkimg3'], 'nonce_groupelinkimg3_field' ) 
		  ) {
  
					 //print 'Sorry, your nonce did not verify.';
					 exit;
  
			  } else {
			 saveForm_quickwhatsappgroupelinkimg3();
		  //print "set floating button position";
				}
  }
  /*------nonce field check end ---- */  
   
  /*------nonce field reset start ---- */
  if (isset($_REQUEST['quickwhatsapps_resetgroupelink_imgurl3'])) {
	if ( 
	  ! isset( $_POST['nonce_resetgroupelinkimg3'] ) 
	  || ! wp_verify_nonce( $_POST['nonce_resetgroupelinkimg3'], 'nonce_resetgroupelinkimg3_field' ) 
		  ) {
  
					 //print 'Sorry, your nonce did not verify.';
					 exit;
  
			  } else {
			 resetForm_groupelinkimg3();
				}
  }
  /*------nonce field reset end ---- */  
	 
  
 showForm_quickwhatsapp();
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */ 
 
 
 
 
 
 
 
 
 
/* --------------------------------------------------------------------------------------------------------------------------------------- */ 	
 	//reset
  if (isset($_REQUEST['quickwhatsappbutton_reset'])) {
	  $resetter = '';
   update_option('quickwhatsapp', sanitize_text_field($resetter) );
  }

function resetForm_quickwhatsapp() {
  
  update_option('quickwhatsapp', '' );

  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------------------------------------------------------------------------------------------- */ 	
 	//reset
  if (isset($_REQUEST['submit_whatsapp_custome_button_reset'])) {
	  $resetter = '';
   update_option('quickwhatsappbutton', sanitize_text_field($resetter) );
  }

function resetForm_custome_chat_button() {
  
  update_option('quickwhatsappbutton', '' );

  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------------------------------------------------------------------------------------------- */ 	

 	//reset
  if (isset($_REQUEST['quickwhatsapp_resetgreetings'])) {
	  $resetter = '';
   update_option('quickwhatsapps_greetings', sanitize_text_field($resetter) );
  }

function resetForm_quickwhatsapp_greetings() {
  
  update_option('quickwhatsapps_greetings', '' );

  
 }
 
/* --------------------------------------------------------------------------------------------------------------------------------------- */ 


/* --------------------------------------------------------------------------------------------------------------------------------------- */ 	
 	//reset
  if (isset($_REQUEST['saveForm_quickwhatsappsharebuttonreset'])) {
	  $resetter = '';
   update_option('quickwhatsappsharebutton', sanitize_text_field($resetter) );
  }

function saveForm_quickwhatsappsharebuttonreset() {
  
  update_option('quickwhatsappsharebutton', '' );

  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */ 

/* --------------------------------------------------------------------------------------------------------------------------------------- */  
 function saveForm_quickwhatsappbutton_style() {
  if (sanitize_text_field($_POST['quickwhatsappbutton_style']) ) {

  update_option('quickwhatsappbutton_style', sanitize_text_field($_POST['quickwhatsappbutton_style']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

    
/* --------------------------------------------------------------------------------------------------------------------------------------- */  
 function saveForm_quickwhatsapp() {
  if (sanitize_text_field($_POST['quickwhatsapp']) ) {

  update_option('quickwhatsapp', sanitize_text_field($_POST['quickwhatsapp']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */  
 function saveForm_quickwhatsappbutton() {
  if (sanitize_text_field($_POST['quickwhatsappbutton']) ) {

  update_option('quickwhatsappbutton', sanitize_text_field($_POST['quickwhatsappbutton']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */  
 function saveForm_quickwhatsappsharing() {
  if (sanitize_text_field($_POST['quickwhatsappsharing']) ) {

  update_option('quickwhatsappsharing', sanitize_text_field($_POST['quickwhatsappsharing']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */ 
//whatsapp chat -  after add to cart button
 function saveForm_quickwhatsappchat_after_addtocart_button() {
  if (sanitize_text_field($_POST['quickwhatsapps_afteraddtocartbutton']) ) {

  update_option('quickwhatsapps_afteraddtocartbutton', sanitize_text_field($_POST['quickwhatsapps_afteraddtocartbutton']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */


/* --------------------------------------------------------------------------------------------------------------------------------------- */ 
//whatsapp chat -  status chat online offline
 function saveForm_quickwhatsappchat_status_online() {
  if (sanitize_text_field($_POST['quickwhatsapps_onlineoffline_status']) ) {

  update_option('quickwhatsapps_onlineoffline_status', sanitize_text_field($_POST['quickwhatsapps_onlineoffline_status']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */ 
//whatsapp chat -  floating button online offline
 function saveForm_quickwhatsappchat_floatingbutton_online() {
  if (sanitize_text_field($_POST['quickwhatsapps_floatingbutton_status']) ) {

  update_option('quickwhatsapps_floatingbutton_status', sanitize_text_field($_POST['quickwhatsapps_floatingbutton_status']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */ 
//whatsapp chat -  global chat button online offline
 function saveForm_quickwhatsappchat_chatbutton_online() {
  if (sanitize_text_field($_POST['quickwhatsapps_chatbutton_status']) ) {

  update_option('quickwhatsapps_chatbutton_status', sanitize_text_field($_POST['quickwhatsapps_chatbutton_status']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */  
 function saveForm_quickwhatsappsharesbutton() {
  if (sanitize_text_field($_POST['quickwhatsappsharebutton']) ) {

  update_option('quickwhatsappsharebutton', sanitize_text_field($_POST['quickwhatsappsharebutton']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */
/* Posi Floating Button */

 function saveForm_quickwhatsappsharefloatingbuttonposi() {
  if ((sanitize_text_field($_POST['quickwhatsapps_floation_posi_rechts_nach_links']) ) && (sanitize_text_field($_POST['quickwhatsapps_floating_posi_unten_nach_oben']) )) {

update_option('quickwhatsapps_floation_posi_rechts_nach_links', sanitize_text_field($_POST['quickwhatsapps_floation_posi_rechts_nach_links']) );
update_option('quickwhatsapps_floating_posi_unten_nach_oben', sanitize_text_field($_POST['quickwhatsapps_floating_posi_unten_nach_oben']) );
	  

  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* --------------------------------------------------------------------------------------------------------------------------------------- */  
/* greetings */
 function saveForm_quickwhatsappsharegreetings() {
  if (sanitize_text_field($_POST['quickwhatsapps_greetings']) ) {

  update_option('quickwhatsapps_greetings', sanitize_text_field($_POST['quickwhatsapps_greetings']) );
  }
  
 }
/* --------------------------------------------------------------------------------------------------------------------------------------- */

/* groupelink */
 function saveForm_quickwhatsappgroupelink() {
  if (sanitize_text_field($_POST['quickwhatsapps_groupelink']) ) {

  update_option('quickwhatsapps_groupelink', sanitize_text_field($_POST['quickwhatsapps_groupelink']) );
  }
  
 }

 /* groupelink2 */
 function saveForm_quickwhatsappgroupelink2() {
	if (sanitize_text_field($_POST['quickwhatsapps_groupelink2']) ) {
  
	update_option('quickwhatsapps_groupelink2', sanitize_text_field($_POST['quickwhatsapps_groupelink2']) );
	}
	
   }

/* groupelink3 */
function saveForm_quickwhatsappgroupelink3() {
	if (sanitize_text_field($_POST['quickwhatsapps_groupelink3']) ) {
  
	update_option('quickwhatsapps_groupelink3', sanitize_text_field($_POST['quickwhatsapps_groupelink3']) );
	}
	
   }


function resetForm_groupelink() {
  
  update_option('quickwhatsapps_groupelink', '' );
 }

 function resetForm_groupelink2() {
  
	update_option('quickwhatsapps_groupelink2', '' );
   }

   function resetForm_groupelink3() {
  
	update_option('quickwhatsapps_groupelink3', '' );
   }


/* --------------------------------------------------------------------------------------------------------------------------------------- */


/* groupelink img */
 function saveForm_quickwhatsappgroupelinkimg() {
  if (sanitize_text_field($_POST['quickwhatsapps_groupelink_imgurl']) ) {

  update_option('quickwhatsapps_groupelink_imgurl', sanitize_text_field($_POST['quickwhatsapps_groupelink_imgurl']) );
  }
  
 }

 /* groupelink img 2*/
 function saveForm_quickwhatsappgroupelinkimg2() {
	if (sanitize_text_field($_POST['quickwhatsapps_groupelink_imgurl2']) ) {
  
	update_option('quickwhatsapps_groupelink_imgurl2', sanitize_text_field($_POST['quickwhatsapps_groupelink_imgurl2']) );
	}
	
   }

/* groupelink img 3*/
function saveForm_quickwhatsappgroupelinkimg3() {
	if (sanitize_text_field($_POST['quickwhatsapps_groupelink_imgurl3']) ) {
  
	update_option('quickwhatsapps_groupelink_imgurl3', sanitize_text_field($_POST['quickwhatsapps_groupelink_imgurl3']) );
	}
	
   }

function resetForm_groupelinkimg() {
  
  update_option('quickwhatsapps_groupelink_imgurl', '' );
 }

 function resetForm_groupelinkimg2() {
  
	update_option('quickwhatsapps_groupelink_imgurl2', '' );
   }

function resetForm_groupelinkimg3() {
  
	update_option('quickwhatsapps_groupelink_imgurl3', '' );
   }


/* --------------------------------------------------------------------------------------------------------------------------------------- */



/* --------------------------------------------------------------------------------------------------------------------------------------- */
function showForm_quickwhatsapp() {

  $default = get_option('quickwhatsapp');
  if ($default=="") {$default=" ";}
  $default = str_replace("&","&amp;",$default);
  $default = str_replace("<","&lt;",$default);
  $default = str_replace(">","&gt;",$default);
  $default = str_replace("\"","&quot;",$default);
  $default = str_replace("\\","",$default);
  $default = str_replace(" ","",$default);
  
  $quickwhatsappbutton_show = get_option('quickwhatsappbutton');
  $quickwhatsappsharebutton_show = get_option('quickwhatsappsharebutton');
  
   $quickwhatsappbutton_style_show = get_option('quickwhatsappbutton_style');

	$quickwhatsapps_greetings_show = get_option('quickwhatsapps_greetings');


  //tel nummer
  echo '<h2 id="handynummer">' . __('Quick WhatsApp Chat Options','quick-whatsapp') . '</h2>';
  echo '<form method="post">';
  echo '<label for="quickwhatsapp"><strong>' . __('Mobile phone number (417611122233)','quick-whatsapp') . '</strong><br />';
  echo '<input type="text"  name="quickwhatsapp" size="50" maxlength="50" value="' . $default . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_tel_field', 'nonce_tel' );
echo '</form><br/>';

//reset 
  echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 450px" name="quickwhatsappbutton_reset" value="' . __('Reset','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_reset_field', 'nonce_reset' );
  echo '</form>';
  echo '<br /><br />';
  echo '<hr>';
	
//eigene Begrüssung definieren
  echo '<form method="post">';
  echo '<label for="quickwhatsappbuttonbegrüssung"><strong>' . __('Own Chat Greeting-Words','quick-whatsapp') . '</strong><br />';
  echo '<input type="text"  name="quickwhatsapps_greetings" size="80" maxlength="80" value="' . $quickwhatsapps_greetings_show . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit_whatsapp_greetings" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_greetings_field', 'nonce_greetings' );
echo '</form><br />';
//greetings reset
	echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 450px" name="quickwhatsapp_resetgreetings" value="' . __('Reset','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_resetgreetings_field', 'nonce_resetgreetings' );
  echo '</form>';
  echo '<br /><br />';
  echo '<hr>';
  
//Style Auswahl
echo '<h2 id="buttondesignauswahl">' . __('Quick Whatsapp Button Design Settings','quick-whatsapp') . '</h2>';
echo '<p>'. __('Choose your Button Design from 4 Styles','quick-whatsapp') . '</p>';
echo '<form method="post">';

ECHO '<select name="quickwhatsappbutton_style">';

if ($quickwhatsappbutton_style_show == '' or $quickwhatsappbutton_style_show == '1')
{ echo '<option selected value="1" >Standard</option>';}
else
{ echo '<option value="1" >Standard</option>';}
	
if ($quickwhatsappbutton_style_show == '2')
{ echo '<option selected value="2" >Clear</option>';}
else
{ echo '<option value="2" >Clear</option>';}

if ($quickwhatsappbutton_style_show == '3')
{ echo '<option selected value="3" >Flat</option>';}
else
{ echo '<option value="3" >Flat</option>';}

if ($quickwhatsappbutton_style_show == '4')
{ echo '<option selected value="4" >Creativ</option>';}
else
{ echo '<option value="4" >Creativ</option>';}
	
/* 
      <option value="1" >Standard</option>
      <option value="2">Clear</option>
      <option value="3">Flat</option>
</select>';
*/	
/*
if ($quickwhatsappbutton_style_show == '' or $quickwhatsappbutton_style_show == '1')
	{

echo '
<select name="quickwhatsappbutton_style">
<option selected value="1">Standard</option>
<option value="2">Clear</option>
';
	}
else
{
echo '
<select name="quickwhatsappbutton_style">
<option value="1">Standard</option>
<option selected value="2">Clear</option>
';
	
}
*/


echo '</select>';


echo '<br />';
echo '<input type="submit" style="height: 25px; width: 250px" name="submit_style" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_style_field', 'nonce_style' );
  echo '</form>';
  echo '<br /><br />';


//eigenes WhatsApp Bild
  echo '<form method="post">';
  echo '<label for="quickwhatsappbutton"><strong>' . __('Custom Button (https://www.yourdomain.ch/whatsappbutton.jpg)','quick-whatsapp') . '</strong><br />';
  echo '<input type="text"  name="quickwhatsappbutton" size="80" maxlength="200" value="' . $quickwhatsappbutton_show . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit_whatsapp_custome_button" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_chatbutton_field', 'nonce_chatbutton' );
echo '</form><br />';
	//reset bild
  echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 450px" name="submit_whatsapp_custome_button_reset" value="' . __('Reset','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_reset2_field', 'nonce_reset2' );
  echo '</form>';
  echo '<br /><br />';
	
/* #################### Chat Button BUTTON ######################### */

	
	$quickwhatsapps_chatbutton_status_show = get_option('quickwhatsapps_chatbutton_status');
	
	if ($quickwhatsapps_chatbutton_status_show == 'an')
		{
		$quickwhatsapps_chatbutton_status_an = "<input name='quickwhatsapps_chatbutton_status' type='radio' value='an' checked>";
		$quickwhatsapps_chatbutton_status_aus = "<input name='quickwhatsapps_chatbutton_status' type='radio' value='aus'>";
		}
	else
		{
		$quickwhatsapps_chatbutton_status_an = "<input name='quickwhatsapps_chatbutton_status' type='radio' value='an'>";
		$quickwhatsapps_chatbutton_status_aus = "<input name='quickwhatsapps_chatbutton_status' type='radio' value='aus' checked>";
		}
	
	
	echo "<h2 id='chatactiv'>" . __('Chat Button activ / inactiv','quick-whatsapp') . "</h2>";
	echo '<p>' . __('If you do not want the normal chat button to be displayed, you can deactivate it here.','quick-whatsapp') . '</p>';
	echo "<form method='post'>";
	echo "<table width='320' border='0'>";
	echo "<tr>";
	echo "<td width='20'>$quickwhatsapps_chatbutton_status_aus</td>";
	echo "<td width='300'>" . __('Chat Button is deactivated / hidden','quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$quickwhatsapps_chatbutton_status_an</td>";
	echo "<td>" . __('Chat Button is active / visible','quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' style='height: 25px; width: 250px' name='submit_quickwhatsappchat_chatbutton_online' value='' . __('Save','quick-whatsapp') . ''>";
	wp_nonce_field( 'nonce_quickwhatsappchat_chatbutton_online', 'nonce_quickwhatsappchat_chatbutton_online' );
	echo "</form><br />";

/* ############################################################## */
	

/* #################### CHAT BUTTON ######################### */

// Online oder Offline
	
	$quickwhatsapp_status_online_show = get_option('quickwhatsapps_onlineoffline_status');
	
	if ($quickwhatsapp_status_online_show == 'an')
		{
		$quickwhatsappchat_status_online_an = "<input name='quickwhatsapps_onlineoffline_status' type='radio' value='an' checked>";
		
		$quickwhatsappchat_status_online_aus = "<input name='quickwhatsapps_onlineoffline_status' type='radio' value='aus'>";
		}
	else
		{
		$quickwhatsappchat_status_online_an = "<input name='quickwhatsapps_onlineoffline_status' type='radio' value='an'>";
		$quickwhatsappchat_status_online_aus = "<input name='quickwhatsapps_onlineoffline_status' type='radio' value='aus' checked>";
		}
	
	
	echo "<h2>Chat online oder offline schalten? / Chat Sign Online or Offline?</h2>";
	echo '<p>Sollten Sie mal nicht am Handy sitzen und lieber den Chat als offline anzeigen, dann können sie das hier mit diesem Button machen.</p>';
	echo "<form method='post'>";
	echo "<table width='200' border='0'>";
	echo "<tr>";
	echo "<td width='20'>$quickwhatsappchat_status_online_aus</td>";
	echo "<td width='180'>" . __('Chat is offline', 'quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$quickwhatsappchat_status_online_an</td>";
	echo "<td>" . __('Chat is online', 'quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' style='height: 25px; width: 250px' name='submit_quickwhatsappchat_status_online' value='" . __('Save','quick-whatsapp') . "'>";
	wp_nonce_field( 'nonce_quickwhatsappchat_status_online', 'nonce_quickwhatsappchat_status_online' );
	echo "</form><br />";
/* ########################################################## */	
	
// an aus share funktion
$quickwhatsappsharing_show = get_option('quickwhatsappsharing');
	
	if ($quickwhatsappsharing_show == 'an')
		{
		$quickwhatsappsharing_button_an = "<input name='quickwhatsappsharing' type='radio' value='an' checked>";
		$quickwhatsappsharing_button_aus = "<input name='quickwhatsappsharing' type='radio' value='aus'>";
		}
	else
		{
		$quickwhatsappsharing_button_an = "<input name='quickwhatsappsharing' type='radio' value='an'>";
		$quickwhatsappsharing_button_aus = "<input name='quickwhatsappsharing' type='radio' value='aus' checked>";
		}

	echo "<h2>" . __('Quick Whatsapp Share Functions', 'quick-whatsapp') . "</h2>";
	echo '<p>' . __('If you want to display a share button in addition to the chat button (only works if the chat button is active)','quick-whatsapp') . '</p>';
	echo "<form method='post'>";
	echo "<table width='200' border='0'>";
	echo "<tr>";
	echo "<td width='20'>$quickwhatsappsharing_button_aus</td>";
	echo "<td width='180'>" . __('Share Function off','quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$quickwhatsappsharing_button_an</td>";
	echo "<td>" . __('Share Function on','quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' style='height: 25px; width: 250px' name='submit_quickwhatsapp_sharestatus' value='" . __('Save','quick-whatsapp') . "'>";
	wp_nonce_field( 'nonce_sharestatus_field', 'nonce_sharestatus' );
	echo "</form><br />";
	
	  //eigenes WhatsApp ShareBild
  echo '<form method="post">';
  echo '<label for="quickwhatsappsharebutton"><strong>' . __('Custom Button (https://www.yourdomain.ch/whatsappbutton.jpg)','quick-whatsapp') . '</strong><br />';
  echo '<input type="text"  name="quickwhatsappsharebutton" size="80" maxlength="200" value="' . $quickwhatsappsharebutton_show . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 30px; width: 250px" name="submit_sharesbutton" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_sharesbutton_field', 'nonce_sharesbutton' );
echo '</form><br />';
	//reset bild
  echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 450px;" name="submit_quickwhatsappsharebutton_reset" value="' . __('Reset','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_quickwhatsappsharebuttonreset_field', 'nonce_quickwhatsappsharebuttonreset' );
  echo '</form>';
  echo '<br /><br />';  

	
	
//Chat Button after - Add to cart Button - An / AUS
	/*
	echo "<form method='post'>";
	echo "<table width='200' border='0'>";
	echo "<tr>";
	echo "<td width='20'>$quickwhatsappsharing_button_aus</td>";
	echo "<td width='180'>Share Funktion aus / off</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$quickwhatsappsharing_button_an</td>";
	echo "<td>Share Funktion ein / on</td>";
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' style='height: 25px; width: 250px' name='submit_quickwhatsapp_sharestatus' value='Sichern / Save'>";
	wp_nonce_field( 'nonce_sharestatus_field', 'nonce_sharestatus' );
	echo "</form><br />";
	*/
	
// an aus share funktion
$quickwhatsapp_afteraddtocartbutton_show = get_option('quickwhatsapps_afteraddtocartbutton');
	
	if ($quickwhatsapp_afteraddtocartbutton_show == 'an')
		{
		$quickwhatsappchat_after_addtocart_button_an = "<input name='quickwhatsapps_afteraddtocartbutton' type='radio' value='an' checked>";
		$quickwhatsappchat_after_addtocart_button_aus = "<input name='quickwhatsapps_afteraddtocartbutton' type='radio' value='aus'>";
		}
	else
		{
		$quickwhatsappchat_after_addtocart_button_an = "<input name='quickwhatsapps_afteraddtocartbutton' type='radio' value='an'>";
		$quickwhatsappchat_after_addtocart_button_aus = "<input name='quickwhatsapps_afteraddtocartbutton' type='radio' value='aus' checked>";
		}
	
	
	echo "<h2>" . __('Show Chat Button after Cart Button?','quick-whatsapp') . "</h2>";
	echo '<p>' . __('This button appears in WooCommerce on the product detail page - directly after the Add-To-Cart button (shopping cart button)','quick-whatsapp') . '.</p>';
	echo "<form method='post'>";
	echo "<table width='200' border='0'>";
	echo "<tr>";
	echo "<td width='20'>$quickwhatsappchat_after_addtocart_button_aus</td>";
	echo "<td width='180'>" . __('off','quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$quickwhatsappchat_after_addtocart_button_an</td>";
	echo "<td>" . __('on','quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' style='height: 25px; width: 250px' name='submit_quickwhatsappchat_after_addtocart_button' value='" . __('Save','quick-whatsapp') . "'>";
	wp_nonce_field( 'nonce_quickwhatsappchat_after_addtocart_button_field', 'nonce_quickwhatsappchat_after_addtocart_button' );
	echo "</form><br />";

	echo '<br /><br />'; 
	

/* #################### FLOATING BUTTON ######################### */

	
	$quickwhatsapps_floatingbutton_status_show = get_option('quickwhatsapps_floatingbutton_status');
	
	if ($quickwhatsapps_floatingbutton_status_show == 'an')
		{
		$quickwhatsapps_floatingbutton_status_an = "<input name='quickwhatsapps_floatingbutton_status' type='radio' value='an' checked>";
		$quickwhatsapps_floatingbutton_status_aus = "<input name='quickwhatsapps_floatingbutton_status' type='radio' value='aus'>";
		}
	else
		{
		$quickwhatsapps_floatingbutton_status_an = "<input name='quickwhatsapps_floatingbutton_status' type='radio' value='an'>";
		$quickwhatsapps_floatingbutton_status_aus = "<input name='quickwhatsapps_floatingbutton_status' type='radio' value='aus' checked>";
		}
	
	
	echo "<h2 id='floatingbutton'>" . __('Floating Button active oder inactiv?','quick-whatsapp') . "</h2>";
	echo '<p>' . __('If you want, you can activate the floating button here. A small round button will then be visible on the bottom right-hand side.','quick-whatsapp') . '</p>';
	echo "<form method='post'>";
	echo "<table width='500' border='0'>";
	echo "<tr>";
	echo "<td width='20'>$quickwhatsapps_floatingbutton_status_aus</td>";
	echo "<td width='300'>" . __('Floating Button is deactivated','quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$quickwhatsapps_floatingbutton_status_an</td>";
	echo "<td>" . __('Floating Button is actived','quick-whatsapp') . "</td>";
	echo "</tr>";
	echo "</table>";
	echo "<input type='submit' style='height: 25px; width: 250px' name='submit_quickwhatsappchat_floatingbutton_online' value='" . __('Save','quick-whatsapp') . "'>";
	wp_nonce_field( 'nonce_quickwhatsappchat_floatingbutton_online', 'nonce_quickwhatsappchat_floatingbutton_online' );
	echo "</form><br />";
	
	
	
	  //Floating Button Positionierung

	$quickwhatsapps_floation_posi_rechts_nach_links_show = get_option('quickwhatsapps_floation_posi_rechts_nach_links');
	
	$quickwhatsapps_floating_posi_unten_nach_oben_show = get_option('quickwhatsapps_floating_posi_unten_nach_oben');
	
	
  echo '<h2>' . __('Floating Button Position','quick-whatsapp') . '</h2>';
  echo '<form method="post">';
  echo '<label for="quickwhatsapp"><strong>' . __('Position from right to left in px or %','quick-whatsapp') . '</strong><br />';
  echo '<input type="text"  name="quickwhatsapps_floation_posi_rechts_nach_links" size="50" maxlength="50"  value="' . $quickwhatsapps_floation_posi_rechts_nach_links_show . '">' . __('ex. 100px or 10%','quick-whatsapp') . '';
  echo '</label><br />';
  echo '<label for="quickwhatsapp"><strong>' . __('Position from bottom to above in px or %','quick-whatsapp') . '</strong><br />';
  echo '<input type="text"  name="quickwhatsapps_floating_posi_unten_nach_oben" size="50" maxlength="50"  value="' . $quickwhatsapps_floating_posi_unten_nach_oben_show . '">' . __('ex. 100px or 10%','quick-whatsapp') . '';
  echo '</label><br />';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit_quickwhatsappchat_floating_posi" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_quickwhatsappsharefloatingbuttonposi_field', 'nonce_quickwhatsappsharefloatingbuttonposi' );
echo '</form><br/>';

	echo '<hr>';

//Whatsapp Gruppe
$quickwhatsapps_grouplink_old = get_option('quickwhatsapps_groupelink');
$quickwhatsapps_grouplink_old_imgurl = get_option('quickwhatsapps_groupelink_imgurl');
$quickwhatsapps_grouplink_old_imgurl2 = get_option('quickwhatsapps_groupelink_imgurl2');
$quickwhatsapps_grouplink_old_imgurl3 = get_option('quickwhatsapps_groupelink_imgurl3');
	
	$quickwhatsapp_groupelink_button1 = '<img src="' . plugins_url( 'images/whatsapp-gruppe.png', __FILE__ ) . '" > ';
	
  echo '<h2 id="groupe">' . __('WhatsApp Group Link','quick-whatsapp') . '</h2>';
  echo '<p>' . __('This is your Shortcode','quick-whatsapp') . ': <span style="background-color: #F6D8CE">[quickwhatsapp_group]</span></p>';
  echo '<form method="post">';
  echo '<label for="quickwhatsappgroupelink"><strong>' . __('WhatsApp Group ID','quick-whatsapp') . '</strong>(' . __('Example','quick-whatsapp') . ': C2aZdBG0iPnGUvgX0huTtB)<br />';
  echo '<input type="text"  name="quickwhatsapps_groupelink" size="80" maxlength="80" value="' . $quickwhatsapps_grouplink_old . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit_whatsapp_groupelink" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_groupelink_field', 'nonce_groupelink' );
echo '</form><br />';
//gruppe id reset
	echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 450px" name="quickwhatsapp_resetgroupelink" value="' . __('Reset','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_resetgroupelink_field', 'nonce_resetgroupelink' );
  echo '</form>';
  echo '<br /><br />';

//Whatsapp Gruppe 2
$quickwhatsapps_grouplink_old2 = get_option('quickwhatsapps_groupelink2');

	
  echo '<h2 id="groupe">' . __('WhatsApp Group Link 2','quick-whatsapp') . '</h2>';
  echo '<p>' . __('This is your Shortcode','quick-whatsapp') . ': <span style="background-color: #F6D8CE">[quickwhatsapp_group2]</span></p>';
  echo '<form method="post">';
  echo '<label for="quickwhatsappgroupelink"><strong>' . __('WhatsApp Group ID','quick-whatsapp') . '</strong>(' . __('Example','quick-whatsapp') . ': C2aZdBG0iPnGUvgX0huTtB)<br />';
  echo '<input type="text"  name="quickwhatsapps_groupelink2" size="80" maxlength="80" value="' . $quickwhatsapps_grouplink_old2 . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit_whatsapp_groupelink2" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_groupelink2_field', 'nonce_groupelink2' );
echo '</form><br />';
//gruppe id reset
	echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 450px" name="quickwhatsapp_resetgroupelink2" value="' . __('Reset','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_resetgroupelink2_field', 'nonce_resetgroupelink2' );
  echo '</form>';
  echo '<br /><br />';

  //Whatsapp Gruppe 3
$quickwhatsapps_grouplink_old3 = get_option('quickwhatsapps_groupelink3');

	
echo '<h2 id="groupe">' . __('WhatsApp Group Link 3','quick-whatsapp') . '</h2>';
echo '<p>' . __('This is your Shortcode','quick-whatsapp') . ': <span style="background-color: #F6D8CE">[quickwhatsapp_group3]</span></p>';
echo '<form method="post">';
echo '<label for="quickwhatsappgroupelink"><strong>' . __('WhatsApp Group ID','quick-whatsapp') . '</strong>(' . __('Example','quick-whatsapp') . ': C2aZdBG0iPnGUvgX0huTtB)<br />';
echo '<input type="text"  name="quickwhatsapps_groupelink3" size="80" maxlength="80" value="' . $quickwhatsapps_grouplink_old3 . '">';
echo '</label><br /><p></p>';
echo '<input type="submit" style="height: 25px; width: 250px" name="submit_whatsapp_groupelink3" value="' . __('Save','quick-whatsapp') . '">';
wp_nonce_field( 'nonce_groupelink3_field', 'nonce_groupelink3' );
echo '</form><br />';
//gruppe id reset
  echo '<form method="post">';
echo '<input type="submit" style="height: 25px; width: 450px" name="quickwhatsapp_resetgroupelink3" value="' . __('Reset','quick-whatsapp') . '">';
wp_nonce_field( 'nonce_resetgroupelink3_field', 'nonce_resetgroupelink3' );
echo '</form>';
echo '<br /><br />';







	
 echo '<form method="post">';
  echo '<label for="quickwhatsapps_groupelink_imgurl"><strong>WhatsApp Groupe Button Image Link<br />';
  echo '<input type="text"  name="quickwhatsapps_groupelink_imgurl" size="80" maxlength="200" value="' . $quickwhatsapps_grouplink_old_imgurl . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit_quickwhatsapps_groupelink_imgurl" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_groupelinkimg_field', 'nonce_groupelinkimg' );
echo '</form><br />';
//greetings reset
	echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 450px" name="quickwhatsapps_resetgroupelink_imgurl" value="' . __('Reset','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_resetgroupelinkimg_field', 'nonce_resetgroupelinkimg' );
  echo '</form>';

echo "" . __('if you dont use a own group button then you will see this button','quick-whatsapp') . " <br /> $quickwhatsapp_groupelink_button1";
  echo '<br /><br />';



  echo '<form method="post">';
  echo '<label for="quickwhatsapps_groupelink_imgurl"><strong>WhatsApp Groupe Button Image Link 2<br />';
  echo '<input type="text"  name="quickwhatsapps_groupelink_imgurl2" size="80" maxlength="200" value="' . $quickwhatsapps_grouplink_old_imgurl2 . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit_quickwhatsapps_groupelink_imgurl2" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_groupelinkimg2_field', 'nonce_groupelinkimg2' );
echo '</form><br />';
//greetings reset
	echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 450px" name="quickwhatsapps_resetgroupelink_imgurl2" value="' . __('Reset','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_resetgroupelinkimg2_field', 'nonce_resetgroupelinkimg2' );
  echo '</form>';

echo "" . __('if you dont use a own group button then you will see this button','quick-whatsapp') . " <br /> $quickwhatsapp_groupelink_button1";
  echo '<br /><br />';
	


  echo '<form method="post">';
  echo '<label for="quickwhatsapps_groupelink_imgurl"><strong>WhatsApp Groupe Button Image Link 3<br />';
  echo '<input type="text"  name="quickwhatsapps_groupelink_imgurl3" size="80" maxlength="200" value="' . $quickwhatsapps_grouplink_old_imgurl3 . '">';
  echo '</label><br /><p></p>';
  echo '<input type="submit" style="height: 25px; width: 250px" name="submit_quickwhatsapps_groupelink_imgurl3" value="' . __('Save','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_groupelinkimg3_field', 'nonce_groupelinkimg3' );
echo '</form><br />';
//greetings reset
	echo '<form method="post">';
  echo '<input type="submit" style="height: 25px; width: 450px" name="quickwhatsapps_resetgroupelink_imgurl3" value="' . __('Reset','quick-whatsapp') . '">';
  wp_nonce_field( 'nonce_resetgroupelinkimg3_field', 'nonce_resetgroupelinkimg3' );
  echo '</form>';

echo "" . __('if you dont use a own group button then you will see this button','quick-whatsapp') . " <br /> $quickwhatsapp_groupelink_button1";
  echo '<br /><br />';

	
  echo '<hr>';
	
/* ############################################################## */
//alt: beforefp: neu quickwhatsapp
  
  ?>
  </div>
  <hr />
  <div class="wrap">
  <h3 id="shortcode"><?php _e('Shortcode','quick-whatsapp'); ?>:</h3>
  <?php _e('The following shortcodes are available','quick-whatsapp'); ?><br />
  <br />
  <?php _e('Chat Button','quick-whatsapp'); ?>: <span style="background-color: #F6D8CE">[quickwhatsapp_chat]</span>
  <br />
  <?php _e('Quick WhatsApp Share Button','quick-whatsapp'); ?>: <span style="background-color: #F6D8CE">[quickwhatsapp_share]</span>
<br />
	<?php _e('Quick WhatsApp Group Link','quick-whatsapp'); ?>: <span style="background-color: #F6D8CE">[quickwhatsapp_group]</span>
  <br />
  <?php _e('Quick WhatsApp Group Link 2','quick-whatsapp'); ?>: <span style="background-color: #F6D8CE">[quickwhatsapp_group2]</span>
  <br />
  <?php _e('Quick WhatsApp Group Link 3','quick-whatsapp'); ?>: <span style="background-color: #F6D8CE">[quickwhatsapp_group3]</span>
  <br /><br />
  </div>
  <hr />

<div class="wrap">
<h2><?php _e( 'Plugin recommendation', 'quick-whatsapp' ); ?></h2>
	<p><?php _e( 'if you need are looking for a seo plugin for your wordpress, then I recommend this plugin called "WP Smart SEO".', 'quick-whatsapp' ); ?><br />
	<?php _e( 'Download:', 'quick-whatsapp' ); ?> <a href="https://de.wordpress.org/plugins/wp-smart-seo/" target="_blank">https://de.wordpress.org/plugins/wp-smart-seo/</a></p>
	
	<p><?php _e( 'If you want to install google analytics (Universal and GA4), then I recommend this plugin "Quick Google Analytics".', 'quick-whatsapp' ); ?><br />
	<?php _e( 'Download:', 'quick-whatsapp' ); ?> <a href="https://wordpress.org/plugins/quick-google-analytics/" target="_blank">https://wordpress.org/plugins/quick-google-analytics/</a></p>
	
	<p><?php _e( 'all 3 plugins work perfectly together', 'quick-whatsapp' ); ?></p>
</div>
  <div class="wrap">
 
  <h2><?php _e( 'Information', 'quick-whatsapp' ); ?></h2>
  <p><?php _e( 'This is the Simple Webchat Plugin for WordPress - created by', 'quick-whatsapp' ); ?> Eric-Oliver M&auml;chler von <a href="http://www.chefblogger.me" target="_blank">www.chefblogger.me</a></p>

  
  </div>
  <?php
 }
 /* --------------------------------------------------------------------------------------------------------------------------------------- */
?>