<?php
global $wpdb;
global $wp;

$asmember_options_allgemein = get_option("asmember_options_allgemein");
if(isset($asmember_options_allgemein["asmember_options_admin_email"]) and $asmember_options_allgemein["asmember_options_admin_email"]!="")
	$admin_email = $asmember_options_allgemein["asmember_options_admin_email"];else
	$admin_email = get_option( 'admin_email' );
        					
$action="";
if(isset($_REQUEST["action"]))$action=$_REQUEST["action"];else $action="";
	       					        					
?>

<script language="javascript">

			jQuery(document).ready(function()
			{

  				jQuery('#asmember_register_form').submit(function(e)
  				{    		
    				$error=0;	    		
    				var asmember_register_vorname=	$('#asmember_register_vorname').val();
    				var asmember_register_name=		$('#asmember_register_name').val();
    				var asmember_register_strasse=	$('#asmember_register_strasse').val();
    				var asmember_register_plz=		$('#asmember_register_plz').val();
    				var asmember_register_ort=		$('#asmember_register_ort').val();
    				var asmember_register_telefon = $('#asmember_register_telefon').val();
    				
    				if (asmember_register_vorname.length < 1)
    				{      			
      					jQuery('#asmember_register_vorname_error').html('<?php echo _e("Bitte f&uuml;llen Sie dieses Feld aus!");?>');
      					$error=1;
    				}else
    				{
						jQuery('#asmember_register_vorname.error').html('');
					}
					
    				if (asmember_register_name.length < 1)
    				{      			
      					jQuery('#asmember_register_name_error').html('<?php echo _e("Bitte f&uuml;llen Sie dieses Feld aus!");?>');
      					$error=1;
    				}else
    				{
						jQuery('#asmember_register_name.error').html('');
					}
					
    				if (asmember_register_strasse.length < 1)
    				{      			
      					jQuery('#asmember_register_strasse_error').html('<?php echo _e("Bitte f&uuml;llen Sie dieses Feld aus!");?>');
      					$error=1;
    				}else
    				{
						jQuery('#asmember_register_strasse.error').html('');
					}
					
    				if (asmember_register_plz.length < 1)
    				{      			
      					jQuery('#asmember_register_plz_error').html('<?php echo _e("Bitte f&uuml;llen Sie dieses Feld aus!");?>');
      					$error=1;
    				}else
    				{
						jQuery('#asmember_register_plz.error').html('');
					}
					
    				if (asmember_register_ort.length < 1)
    				{      			
      					jQuery('#asmember_register_ort_error').html('<?php echo _e("Bitte f&uuml;llen Sie dieses Feld aus!");?>');
      					$error=1;
    				}else
    				{
						jQuery('#asmember_register_ort.error').html('');
					}
					
    				
					
					if ($('#asmember_register_benutzer').length)
					{
  						
    					var asmember_register_benutzer = $('#asmember_register_benutzer').val();
    					var asmember_register_email = $('#asmember_register_email').val();    		
    					var asmember_register_password1 = $('#asmember_register_password1').val();
    					var asmember_register_password2 = $('#asmember_register_password2').val();

    					//jQuery(".error").remove();

    					if (asmember_register_benutzer.length < 1)
    					{      			
      						jQuery('#asmember_register_benutzer_error').html('<?php echo _e("Bitte f&uuml;llen Sie dieses Feld aus!");?>');
      						$error=1;
    					}else
    					{
							jQuery('#asmember_register_benutzer.error').html('');
						}
    
    					if (asmember_register_email.length < 1)
    					{
      						jQuery('#asmember_register_email_error').html('<?php echo _e("Bitte f&uuml;llen Sie dieses Feld aus!");?>');
      						$error=1;
    					} else
    					{
      						var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;      			
      						var validEmail = regEx.test(asmember_register_email);
      						if (!validEmail)
      						{
        						jQuery('#asmember_register_email_error').html('<?php echo _e("Bitte geben Sie eine g&uuml;ltige Email-Adresse ein!");?>');
        						$error=1;
      						}else
      						{
								jQuery('#asmember_register_email_error').html('');
							}      			
		    			}
    
    					if (asmember_register_password1.length < 8)
    					{
      						jQuery('#asmember_register_password1_error').html('<?php echo _e("Bitte geben Sie ein Passwort mit mindestens 8 Zeichen ein!");?>');
      						$error=1;
    					}else
    					{
							jQuery('#asmember_register_password1_error').html('');
						}
    		
    					if (asmember_register_password2.length < 8)
    					{
      						jQuery('#asmember_register_password2_error').html('<?php echo _e("Bitte geben Sie ein Passwort mit mindestens 8 Zeichen ein!");?>');
      						$error=1;
    					}else
    					{
							jQuery('#asmember_register_password2_error').html('');
						}
    		
		    			if(asmember_register_password1!=asmember_register_password2)
    					{
							jQuery('#asmember_register_password2_error').html('<?php echo _e("Die Passw&ouml;rter m&uuml;ssen identisch sein.");?>');
						}
			
					}	
					
    				
					if (jQuery('#asmember_register_check_datenschutz').is(':checked'))
					{
    					jQuery('#asmember_register_check_datenschutz_error').html('');
					}
					else
					{
    					jQuery('#asmember_register_check_datenschutz_error').html('<?php echo _e("Bitte best&auml;tigen Sie die Datenschutzbestimmungen.");?>');
    					$error=1;
					}
					
					
    				if($error==0)
    				{					
					
					}else
					{
						e.preventDefault();
					}
    		
	  			});
	
			});

    
</script>
	    	


			
<?php
if($action=="")
{
	echo "<div class=\"row asmember-memberships-container\">\n";
			
   	$image_url=get_the_post_thumbnail_url($post->ID,'full');
   	if($image_url!="")
   	{					
		echo "<div class=\"col-md-3 asmember-memberships-img\">\n";
		echo "<img src=\"".$image_url."\"/>\n";
		echo "</div>\n";
	}          		
	?>
        	
        	
	<div class="col-md-9 asmember-memberships-content">
	<?php echo str_replace("\n","<br>",$post->post_content);?>
			
			
	<div style="margin-top:25px;margin-bottom:25px">
	<?php
	if($post->_asmember_memberships_betrag==0)
	{
		echo "<p><b>";echo _e("Betrag: kostenlos","asmember");echo "</b></p>\n";
	}else
	{
		if($post->_asmember_memberships_angebot_betrag<$post->_asmember_memberships_betrag and $post->_asmember_memberships_angebot_bis>time())
		{
			echo "<p><b>";echo _e("Betrag:","asmember");echo " <span style=\"color:#ff0000\">".str_replace(".",",",sprintf("%0.2f",$post->_asmember_memberships_angebot_betrag))." EUR incl. MwSt</span> <s>".str_replace(".",",",sprintf("%0.2f",$post->_asmember_memberships_betrag))."</s> EUR incl. MwSt</b></p>";	
		}else
		{					
			echo "<p><b>";
			echo _e("Betrag:","asmember");
			echo "&nbsp;".str_replace(".",",",sprintf("%0.2f", $post->_asmember_memberships_betrag)) . " EUR incl. MwSt</p>";			
		}
	}					
	?>
	</div>
					
	</div>
		
			
   	<div class="asmember-memberships-divider"></div>	
</div>  		
        
<?php
}
?>

        
<?php
	
	if(isset($_REQUEST["form_user_id"]))$form_user_id=$_REQUEST["form_user_id"];else $form_user_id=0;
	if(isset($_REQUEST["asmember_register_payment"]))$asmember_register_payment=$_REQUEST["asmember_register_payment"];else $asmember_register_payment='bank';
		
		
	if($action=="paypal_return")
	{
		if(isset($_REQUEST["asmember_user_id"]))$asmember_user_id=$_REQUEST["asmember_user_id"];else $asmember_user_id=0;
		if(isset($_REQUEST["token"]))	$token=$_REQUEST["token"];else $token="";
		if($asmember_user_id>0)
		{
			global $wpdb;
			$sql="select * from ".$wpdb->prefix."asmember_user where paypal_token='".$token."' and id=".$asmember_user_id;
			$booking_row=$wpdb->get_row($sql);
			if($booking_row)
			{					
				$sql="update ".$wpdb->prefix."asmember_user set status=1 where paypal_token='".$token."' and id=".$asmember_user_id;
				$wpdb->query($sql);
								
				$user=get_user_by("id",$booking_row->user_id);
				if(isset($user->_asmember_account_membership))
       			{
					$_asmember_account_membership=explode(",",$user->_asmember_account_membership);
					if(!in_array($booking_row->membership_id,$_asmember_account_membership))$_asmember_account_membership[]=$booking_row->membership_id;
				}else
				{
					$_asmember_account_membership[]=$booking_row->membership_id;
				}					
        				
				$_asmember_account_membership=implode(",",$_asmember_account_membership);   								
  					
				update_user_meta( $user->ID,"_asmember_account_membership",$_asmember_account_membership);  
  						
  						
				echo "<p>";
				echo _e("Ihre Paypal-Zahlung ist eingegangen und Ihre Buchung wurde freigeschaltet.","asmember");
				echo "</p>\n";
			}					
		}
	}
		
		
		
	if($action=="asmember_membership_booking_step2")
	{
		if(isset($_POST['asmember_register_firma']))	$asmember_register_firma=$_POST['asmember_register_firma'];else $asmember_register_firma="";
		if(isset($_POST['asmember_register_anrede']))	$asmember_register_anrede=$_POST['asmember_register_anrede'];else $asmember_register_anrede="";			
		if(isset($_POST['asmember_register_vorname']))	$asmember_register_vorname=$_POST['asmember_register_vorname'];else $asmember_register_vorname="";
		if(isset($_POST['asmember_register_name']))		$asmember_register_name=$_POST['asmember_register_name'];else $asmember_register_name="";
		if(isset($_POST['asmember_register_titel']))	$asmember_register_titel=$_POST['asmember_register_titel'];else $asmember_register_titel="";
		if(isset($_POST['asmember_register_strasse']))	$asmember_register_strasse=$_POST['asmember_register_strasse'];else $asmember_register_strasse="";
		if(isset($_POST['asmember_register_plz']))		$asmember_register_plz=$_POST['asmember_register_plz'];else $asmember_register_plz="";
		if(isset($_POST['asmember_register_ort']))		$asmember_register_ort=$_POST['asmember_register_ort'];else $asmember_register_ort="";
		if(isset($_POST['asmember_register_telefon']))	$asmember_register_telefon=$_POST['asmember_register_telefon'];else $asmember_register_telefon="";
		if(isset($_POST['asmember_register_benutzer']))	$asmember_register_benutzer=$_POST['asmember_register_benutzer'];else $asmember_register_benutzer="";
		if(isset($_POST['asmember_register_email']))	$asmember_register_email=$_POST['asmember_register_email'];else $asmember_register_email="";
		if(isset($_POST['asmember_register_password1']))$asmember_register_password1=$_POST['asmember_register_password1'];else $asmember_register_password1="";
			
		if(isset($_POST['asmember_register_payment']))	$asmember_register_payment=$_POST['asmember_register_payment'];else $asmember_register_payment="bank";
			
			
		if(isset($_REQUEST["action2"]))
		{
				
			$action="";
		}else
		{
			$fehler=0;
			if (is_user_logged_in())
			{
				$current_user=wp_get_current_user();
				//Userdaten speichern
				
				update_user_meta( $current_user->ID, 'first_name', $asmember_register_vorname);				
				update_user_meta( $current_user->ID, 'last_name', $asmember_register_name );				
				update_user_meta( $current_user->ID, '_asmember_account_strasse', $asmember_register_strasse );
				update_user_meta( $current_user->ID, '_asmember_account_plz',$asmember_register_plz);
				update_user_meta( $current_user->ID, '_asmember_account_ort',$asmember_register_ort);
				update_user_meta( $current_user->ID, '_asmember_account_telefon',$asmember_register_telefon);
				$form_user_id=$current_user->ID;
			}else
			{
				//User registrieren
				$fehler=0;
				$fehler_str="";
				if($asmember_register_benutzer=="")$fehler=1;
				if($asmember_register_email=="")	$fehler=1;
				if($asmember_register_password1=="")$fehler=1;
				
				if($fehler==1)
				{
					$action="";
				}else
				{
					//User registrieren	
					if(get_option('users_can_register')==0)
					{
						$fehler=1;
						$action="";
					}else
					{
						//User Registrieren		
		
						$asmember_register_benutzer = 	sanitize_text_field($asmember_register_benutzer);
       					$asmember_register_email = 		sanitize_text_field($asmember_register_email);
       					$asmember_register_password1= 	sanitize_text_field($asmember_register_password1);
      
        					

						$error_string="";
						$errormsg=array();
						$new_user=false;
	
						if(null!=username_exists($asmember_register_benutzer))
						{
							$fehler=1;
							$fehler_str.=_e("Der Nutzer existiert bereits","asmember")."<br>";
						}	
						if(!is_email($asmember_register_email))
						{
							$fehler=1;
							$fehler_str.=_e("Bitte geben Sie eine g&uuml;ltige Email-Adresse ein!","asmember")."<br>";
						}	
						if($fehler==0)
						{
							//$password=wp_generate_password();
		    
       						$user_id = wp_create_user( $asmember_register_benutzer, $asmember_register_password1, $asmember_register_email );
       						if( !is_wp_error($user_id) )
       						{
           						$user = get_user_by( 'id', $user_id );            			 
								$asmember_options_account = get_option('asmember_options_account');
								$url_register=	$asmember_options_account['asmember_options_account_pages_register'];
								$email_from=	$asmember_options_account['asmember_options_account_email_from'];
				
								update_user_meta( $user_id, '_asmember_account_titel',$asmember_register_titel);
								update_user_meta( $user_id, '_asmember_account_anrede',$asmember_register_anrede);
								update_user_meta( $user_id, '_asmember_account_firma',$asmember_register_firma);
								update_user_meta( $user_id, 'first_name', $asmember_register_vorname);				
								update_user_meta( $user_id, 'last_name', $asmember_register_name );				
								update_user_meta( $user_id, '_asmember_account_strasse', $asmember_register_strasse );
								update_user_meta( $user_id, '_asmember_account_plz',$asmember_register_plz);
								update_user_meta( $user_id, '_asmember_account_ort',$asmember_register_ort);
								update_user_meta( $user_id, '_asmember_account_telefon',$asmember_register_telefon);
					
								$form_user_id=$user_id;
									
								$email_headers="From:".$email_from;
				
								//$email_headers="From: info@regiolinxx.de";
				
								update_user_meta($user_id,'active',0);
								update_user_meta($user_id,'show_admin_bar_front','false');
	
								$active_code = sha1( $user_id . time() );
        						$activation_link = add_query_arg( array( 'action'=>'activate', 'key' => $active_code, 'user' => $user_id ), $url_register);
       							//active-key setzen
       							global $wpdb;
       							$sql="update ".$wpdb->prefix."users set user_activation_key='".$active_code."' where ID=".$user_id;
       							$wpdb->query($sql);
       		        		
       							update_user_meta( $user_id, 'active_code', $active_code, true );
					
        		        		        		
       							$body=$asmember_options_account['asmember_options_account_text_email_benutzer'];
       							//Werte austauschen
       							$body=str_replace("%benutzer%",$asmember_register_benutzer,$body);
       							$body=str_replace("%activation_link%",$activation_link,$body);        		
									
									
       							//$body=str_replace("\n","<br>",$body);
       							wp_mail( $user->user_email, $asmember_options_account['asmember_options_account_text_betreff_benutzer'], $body, $email_headers );
    			
    			
    							//Admin-Email senden
								$body=$asmember_options_account['asmember_options_account_text_email_admin'];
       							//Werte austauschen
       							$body=str_replace("%benutzer%",$asmember_register_benutzer,$body);
       							$body=str_replace("%email%",$asmember_register_email,$body);
       							$body=str_replace("%activation_link%",$activation_link,$body); 
       							//$body=str_replace("\n","<br>",$body);       		
       							wp_mail( $admin_email, $asmember_options_account['asmember_options_account_text_betreff_admin'], $body, $email_headers );
    			
    
							}	
			
						}else
						{
							$fehler=1;
							$action="";
						}
					}
				}
					
			}
				
			if($fehler==0 and $form_user_id>0)
			{			
				
				//Mitgliedschaft einfügen, Status 0
				$datum_erstell=time();
					
				if($post->_asmember_memberships_period==0)$datum_bis=0;
				
				$d=getdate($datum_erstell);
				if($post->_asmember_memberships_period==1)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+1,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==2)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+2,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==3)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+3,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==4)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+4,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==5)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+5,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==6)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+6,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==7)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+7,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==8)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+8,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==9)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+9,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==10)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+10,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==11)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+11,$d["mday"],$d["year"]);
				if($post->_asmember_memberships_period==12)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+12,$d["mday"],$d["year"]);
								
										
				$membership_id=$post->ID;
				$paypal_token=time();
					
				if($post->_asmember_memberships_angebot_betrag<$post->_asmember_memberships_betrag and $post->_asmember_memberships_angebot_bis>time())
				{
					$asmember_memberships_betrag=		str_replace(",",".",$post->_asmember_memberships_angebot_betrag);
					$asmember_memberships_betrag_mwst=	str_replace(",",".",$post->_asmember_memberships_angebot_betrag_mwst);
					$asmember_memberships_betrag_netto=	str_replace(",",".",$post->_asmember_memberships_angebot_betrag_netto);
				}else
				{
										
					$asmember_memberships_betrag=		str_replace(",",".",$post->_asmember_memberships_betrag);
					$asmember_memberships_betrag_mwst=	str_replace(",",".",$post->_asmember_memberships_betrag_mwst);
					$asmember_memberships_betrag_netto=	str_replace(",",".",$post->_asmember_memberships_betrag_netto);
				}
				
				$user = get_user_by( 'id', $form_user_id ); 
				$user_name=$user->first_name." ".$user->last_name;
				$status=0;
				
				
				$asmember_bookings_renew = $post->_asmember_memberships_renew;
					
					
				if($datum_bis!=0)
				{									
					$renew_time=$post->_asmember_memberships_renew_von*7;
					$datum_renew=$datum_bis-(60*60*24*$renew_time);
				}else $datum_renew=0;	
							
				if($datum_bis!=0)
				{									
					$renew_end_time=$post->_asmember_memberships_renew_bis*7;
					$datum_renew_end=$datum_bis+(60*60*24*$renew_end_time);
				}else $datum_renew_end=0;	
								
				
				
				$sql="insert into ".$wpdb->prefix."asmember_user (datum_renew,datum_renew_end,verl_id,renew,user_id,user_name,membership_id,membership,datum_erstell,datum_bis,status,payment,betrag,betrag_mwst,betrag_netto,paypal_token) values
					(".$datum_renew.",".$datum_renew_end.",0,".$asmember_bookings_renew.",".$user->ID.",'".$user_name."',".$membership_id.",'".$post->post_title."',".$datum_erstell.",".$datum_bis.",".$status.",'".$asmember_register_payment."',".$asmember_memberships_betrag.",".$asmember_memberships_betrag_mwst.",".$asmember_memberships_betrag_netto.",".$paypal_token.")";
				$result=$wpdb->query($sql);
				
				
				
				if($result)
				{						
				
					$options=get_option('asmember_options_bookings');
						
					$asmember_options_bookings_booking_frontend			=$options['asmember_options_bookings_booking_frontend'];
					$asmember_options_bookings_booking_frontend_sofort 	=$options['asmember_options_bookings_booking_frontend_sofort'];
					
						
					$asmember_user_id=$wpdb->insert_id;
					
					if(isset($options['asmember_options_bookings_betreff_text']))						
						$betreff=$options['asmember_options_bookings_betreff_text'];
						$betreff="RG-%datum%-%id%";
						
					//$betreff = "AS-".strftime("%d-%m-%Y",time())."-".$asmember_user_id;
					$betreff=str_replace("%datum%",strftime("%d-%m-%Y",time()),$betreff);
					$betreff=str_replace("%id%",$asmember_user_id,$betreff);
					
					$sql="update ".$wpdb->prefix."asmember_user set betreff='".$betreff."' where id=".$asmember_user_id;
					$result=$wpdb->query($sql);
					
					//echo "<p>Vielen Dank f&uuml;r Ihre Buchung des Paketes ".$post->post_title."</p>";
					if($post->_asmember_memberships_betrag==0)
					{
						$sql="update ".$wpdb->prefix."asmember_user set status=1 where id=".$asmember_user_id;
						$result=$wpdb->query($sql);
						//echo "<p>Ihr Paket wurde automatisch freigeschaltet und Sie k&ouml;nnen die Dateien downloaden.</p>\n";
							
						$asmember_options_bookings_booking_frontend_sofort=str_replace("%titel%",$post->post_title,$asmember_options_bookings_booking_frontend_sofort);						
						$asmember_options_bookings_booking_frontend_sofort=str_replace("%membership%",$post->post_title,$asmember_options_bookings_booking_frontend_sofort);
						$asmember_options_bookings_booking_frontend_sofort=str_replace("\n","<br>",$asmember_options_bookings_booking_frontend_sofort);
						echo "<p>".$asmember_options_bookings_booking_frontend_sofort."</p>\n";
							
					}else
					{
						
						//echo "<p>Nach erfolgreichem Zahlungseingang wird Ihr Paket freigeschaltet und Sie k&ouml;nnen die Dateien downloaden.</p>\n";
					
						if($asmember_register_payment=="bank")
						{																
							$zahlungshinweis=$options['asmember_options_bookings_ueberweisung_text'];
								
							$zahlungshinweis=str_replace("%betrag%",str_replace(".",",",sprintf("%0.2f", $asmember_memberships_betrag))." EUR",$zahlungshinweis);
							$zahlungshinweis=str_replace("%betreff%",$betreff,$zahlungshinweis);
														
						}
						
						if($asmember_register_payment=="paypal")
						{
							global $wp;
							$current_url = home_url( $wp->request );
						
							$zahlungshinweis="<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_blank\">";
							$zahlungshinweis.="<input type=\"hidden\" name=\"cmd\" value=\"_xclick\">";
							$zahlungshinweis.="<input type=\"hidden\" name=\"item_name\" value=\"".$betreff."\">";							
							$zahlungshinweis.="<input type=\"hidden\" name=\"business\" value=\"".$options['asmember_options_bookings_email_paypal']."\">";
							$zahlungshinweis.="<input type=\"hidden\" name=\"amount\" value=\"".$asmember_memberships_betrag."\">";
							$zahlungshinweis.="<input type=\"hidden\" name=\"no_shipping\" value=\"1\">";
							$zahlungshinweis.="<input type=\"hidden\" name=\"currency_code\" value=\"EUR\">";
							$zahlungshinweis.="<input type=\"hidden\" name=\"return\" value=\"".$current_url."/?action=paypal_return&id=".$post->ID."&token=".$paypal_token."&asmember_user_id=".$asmember_user_id."\">";
							$zahlungshinweis.="<input type=\"image\" src=\"https://www.paypalobjects.com/de_DE/DE/i/btn/btn_buynowCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.\">";
							$zahlungshinweis.="<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/de_DE/i/scr/pixel.gif\" width=\"1\" height=\"1\">";
							$zahlungshinweis.="</form>\n";
							
								
						}
						//Payment eintragen
						/*
						$payment_user_id=$asmember_user_id;
						$payment_user_name=$user_name;
						$payment_datum_zahlung=$datum_erstell+(60*60*24*14);
						$payment_datum_erstell=$datum_erstell;
						$payment_datum_bis=$datum_bis;
						$payment_status=0;
						$payment_betreff=$betreff;
						$payment_membership_id=$post->ID;
						$payment_membership=$post->post_title;
						$payment_payment=$asmember_register_payment;
						$payment_betrag=$asmember_memberships_betrag;
						$payment_betrag_mwst=$asmember_memberships_betrag_mwst;
						$payment_betrag_netto=$asmember_memberships_betrag_netto;
						$payment_betrag_mwst_satz=$post->_asmember_memberships_betrag_mwst_satz;
						$payment_paypal_token=time();
							
						if(isset($_COOKIE["bid"]))
							$payment_bid = $_COOKIE["bid"];else
							$payment_bid = "";
										
							
						$sql="insert into ".$wpdb->prefix."asmember_payment (asmember_user_id,user_id,user_name,datum_zahlung,datum_erstell,datum_bis,status,betreff,membership_id,membership,payment,betrag,betrag_mwst,betrag_netto,betrag_mwst_satz,paypal_token,bid) values
							(".$payment_user_id.",".$user->ID.",'".$payment_user_name."',".$payment_datum_zahlung.",".$payment_datum_erstell.",".$payment_datum_bis.",".$payment_status.",'".$payment_betreff."',".$payment_membership_id.",'".$payment_membership."','".$payment_payment."',".$payment_betrag.",".$payment_betrag_mwst.",".$payment_betrag_netto.",".$payment_betrag_mwst_satz.",'".$payment_paypal_token."','".$payment_bid."')";
						$result_payment=$wpdb->query($sql);								
						if($result==true)
						{
							$asmember_payment_id=$wpdb->insert_id;
						}else
						{
							$asmember_payment_id=0;
						}	
						*/
						
						
						
						$asmember_options_bookings_booking_frontend=str_replace("%titel%",$post->post_title,$asmember_options_bookings_booking_frontend);
						$asmember_options_bookings_booking_frontend=str_replace("%membership%",$post->post_title,$asmember_options_bookings_booking_frontend);
						$asmember_options_bookings_booking_frontend=str_replace("%zahlungshinweis%",$zahlungshinweis,$asmember_options_bookings_booking_frontend);							
						$asmember_options_bookings_booking_frontend=str_replace("\n","<br>",$asmember_options_bookings_booking_frontend);
							
						$body_daten=__("Ihre Daten:","asmember")."<br><br>";
						$body_daten.=$asmember_register_anrede." ".$asmember_register_titel." ".$asmember_register_vorname." ".$asmember_register_name."<br>";
						$body_daten.=$asmember_register_firma."<br>";
						$body_daten.=$asmember_register_strasse."<br>";
						$body_daten.=$asmember_register_plz." ".$asmember_register_ort."<br>";
						$body_daten.=__("EMail:","asmember")."&nbsp;".$asmember_register_email."<br>";
						$body_daten.=__("Telefon:","asmember")."&nbsp;".$asmember_register_telefon."<br>";	

						$asmember_options_bookings_booking_frontend=str_replace("%daten%",$body_daten,$asmember_options_bookings_booking_frontend);							
												
						echo "<p>".$asmember_options_bookings_booking_frontend."</p>\n";
							
						//Partner-Id speichern
						if(isset($_COOKIE["pid"]))
							$cookie = $_COOKIE["pid"];else
							$cookie=0;
						if($cookie>0)
						{
							$sql="update ".$wpdb->prefix."asmember_user set pid=".$cookie." where id=".$asmember_user_id;
							$result=$wpdb->query($sql);
							if($result==false)echo "fehler: ".$sql;
							
							//Payment eintragen
							$partner_booking_id=$asmember_user_id;
							$partner_payment_id=$asmember_payment_id;															
							$partner_datum_erstell=$datum_erstell;
							$partner_status=0;
							$partner_betreff=$betreff;
							$partner_membership_id=$post->ID;
							$partner_membership=$post->post_title;								
							$partner_betrag=$post->_asmember_memberships_partner_betrag;
							$partner_betrag_mwst=$post->_asmember_memberships_partner_betrag_mwst;
							$partner_betrag_netto=$post->_asmember_memberships_partner_betrag_netto;
							$partner_betrag_mwst_satz=$post->_asmember_memberships_partner_betrag_mwst_satz;
							
														
							$sql="insert into ".$wpdb->prefix."asmember_payment_partner (pid,booking_id,payment_id,datum_erstell,status,betreff,membership_id,membership,betrag,betrag_mwst,betrag_netto,betrag_mwst_satz) values
								(".$cookie.",".$partner_booking_id.",".$partner_payment_id.",".$partner_datum_erstell.",".$partner_status.",'".$partner_betreff."',".$partner_membership_id.",'".$partner_membership."',".$partner_betrag.",".$partner_betrag_mwst.",".$partner_betrag_netto.",".$partner_betrag_mwst_satz.")";
							$result_partner=$wpdb->query($sql);				
							if($result_partner==false)echo "fehler: ".$sql;
							
							
						}
	
					}
					//Mail senden
						
					$user=get_user_by('id',$form_user_id);
								
						
					$body=$options['asmember_options_bookings_booking_email_text'];
        			$body_admin=$options['asmember_options_bookings_booking_email_admin_text'];
        				
        			//Titel der Mitgliedschaft
        			$body=str_replace("%titel%",$post->post_title,$body);
        			$body_admin=str_replace("%titel%",$post->post_title,$body_admin);
        			
        			$body=str_replace("%membership%",$post->post_title,$body);
        			$body_admin=str_replace("%membership%",$post->post_title,$body_admin);
        			
        				
        			//Persönliche Daten
					$body_daten=__("Ihre Daten:","asmember")."\n\n";
					$body_daten.=$asmember_register_anrede." ".$asmember_register_titel." ".$asmember_register_vorname." ".$asmember_register_name."\n";
					$body_daten.=$asmember_register_firma."\n";
					$body_daten.=$asmember_register_strasse."\n";
					$body_daten.=$asmember_register_plz." ".$asmember_register_ort."\n";
					$body_daten.=__("EMail:","asmember")."&nbsp;".$asmember_register_email."\n";
					$body_daten.=__("Telefon:","asmember")."&nbsp;".$asmember_register_telefon."\n";
							
					$body=str_replace("%daten%",$body_daten,$body);
        			$body_admin=str_replace("%daten%",$body_daten,$body_admin);
        				
						
					//Benutzer
        			$body=str_replace("%benutzer%",$asmember_register_titel." ".$asmember_register_vorname." ".$asmember_register_name,$body);
						
						
					//Zahlung
					if($post->_asmember_memberships_betrag>0)
					{
						$zahlungshinweis="";
						if($asmember_register_payment=="bank")
						{
							$zahlungshinweis=$options['asmember_options_bookings_ueberweisung_text'];
							
							$zahlungshinweis=str_replace("%betrag%",str_replace(".",",",sprintf("%0.2f", $asmember_memberships_betrag))." EUR",$zahlungshinweis);
							$zahlungshinweis=str_replace("%betreff%",$betreff,$zahlungshinweis);
													
						}
					}else $zahlungshinweis="";
						
					$body=str_replace("%zahlung%",$zahlungshinweis,$body);
						
					//$body=str_replace("\n","<br>",$body);
        			//$body_admin=str_replace("\n","<br>",$body_admin);
        				
						        				  		
        			$email_headers="From: ".$options['asmember_options_bookings_booking_email_from'];
        			wp_mail( $user->user_email, $options['asmember_options_bookings_booking_email_betreff'], $body, $email_headers );
    				wp_mail( $admin_email, $options['asmember_options_bookings_booking_email_admin_betreff'], $body_admin, $email_headers );			
    			
    			
        			//Tracking-Code
        			if(isset($post->_asmember_memberships_partner_tracking_code))
        			{							        					
        					
        				$tracking_code=$post->_asmember_memberships_partner_tracking_code;
        				if($tracking_code!="")
        				{
							$cookie = $_COOKIE["bid"];
							if($cookie!="")
							{
								if(isset($post->_asmember_memberships_partner_event_id) and $post->_asmember_memberships_partner_event_id!="")								
								{
									//Werte austauschen
									$tracking_code=str_replace("%pid%",$post->_asmember_memberships_partner_pid,$tracking_code);
									$tracking_code=str_replace("%referenz%",$payment_betreff,$tracking_code);
									$tracking_code=str_replace("%event_id%",$post->_asmember_memberships_partner_event_id,$tracking_code);
									echo $tracking_code;
									
								}
							}
						}
					}
						
				}else
				{
					echo _e("Bei Ihrer Buchung ist ein Fehler aufgetreten.","asmember");		
				}
					
			}else
			{
				echo $fehler_str;
			}		
		}
	}	
		
		
		
	if($action=="asmember_membership_booking_step1")
	{
		//Daten prüfen
		if(isset($_POST['asmember_register_firma']))	$asmember_register_firma=$_POST['asmember_register_firma'];else $asmember_register_firma="";
		if(isset($_POST['asmember_register_anrede']))	$asmember_register_anrede=$_POST['asmember_register_anrede'];else $asmember_register_anrede="";			
		if(isset($_POST['asmember_register_vorname']))	$asmember_register_vorname=$_POST['asmember_register_vorname'];else $asmember_register_vorname="";
		if(isset($_POST['asmember_register_name']))		$asmember_register_name=$_POST['asmember_register_name'];else $asmember_register_name="";
		if(isset($_POST['asmember_register_titel']))	$asmember_register_titel=$_POST['asmember_register_titel'];else $asmember_register_titel="";
		if(isset($_POST['asmember_register_strasse']))	$asmember_register_strasse=$_POST['asmember_register_strasse'];else $asmember_register_strasse="";
		if(isset($_POST['asmember_register_plz']))		$asmember_register_plz=$_POST['asmember_register_plz'];else $asmember_register_plz="";
		if(isset($_POST['asmember_register_ort']))		$asmember_register_ort=$_POST['asmember_register_ort'];else $asmember_register_ort="";
		if(isset($_POST['asmember_register_telefon']))	$asmember_register_telefon=$_POST['asmember_register_telefon'];else $asmember_register_telefon="";
		if(isset($_POST['asmember_register_benutzer']))	$asmember_register_benutzer=$_POST['asmember_register_benutzer'];else $asmember_register_benutzer="";
		if(isset($_POST['asmember_register_email']))	$asmember_register_email=$_POST['asmember_register_email'];else $asmember_register_email="";
		if(isset($_POST['asmember_register_password1']))$asmember_register_password1=$_POST['asmember_register_password1'];else $asmember_register_password1="";
		
		if(isset($_POST['asmember_register_payment']))	$asmember_register_payment=$_POST['asmember_register_payment'];else $asmember_register_payment="bank";
		
		$fehler=0;
			
		if($asmember_register_vorname=="")$fehler=1;
		if($asmember_register_name=="")		$fehler=1;
		if($asmember_register_strasse=="")	$fehler=1;
		if($asmember_register_plz=="")		$fehler=1;
		if($asmember_register_ort=="")		$fehler=1;
			
			
		if($fehler==1)
		{
			$action="";
		}else
		{
				
			if (is_user_logged_in())
			{
				$current_user=wp_get_current_user();
				//Userdaten speichern
					
				update_user_meta( $current_user->ID, 'first_name', $asmember_register_vorname);				
				update_user_meta( $current_user->ID, 'last_name', $asmember_register_name );				
				update_user_meta( $current_user->ID, '_asmember_account_strasse', $asmember_register_strasse );
				update_user_meta( $current_user->ID, '_asmember_account_plz',$asmember_register_plz);
				update_user_meta( $current_user->ID, '_asmember_account_ort',$asmember_register_ort);
				update_user_meta( $current_user->ID, '_asmember_account_telefon',$asmember_register_telefon);
				update_user_meta( $current_user->ID, '_asmember_account_anrede',$asmember_register_anrede);
				update_user_meta( $current_user->ID, '_asmember_account_titel',$asmember_register_titel);
				update_user_meta( $current_user->ID, '_asmember_account_firma',$asmember_register_firma);
				$form_user_id=$current_user->ID;
			}else
			{
					
				$form_user_id=0;	
			}
				
			if($fehler==1)
			{
				$action="";
			}else
			{
				//$user = get_user_by( 'id', $form_user_id );
				?>
					
				<form id="asmember_register_form" action="<?php echo esc_url( $_SERVER['REQUEST_URI'] );?>" method="post">
    
    
				<div class="row">					
					<div class="col-12 asmember-form-container">
						<h5 class="asmember-form-rahmen-header"><?php echo _e("Ihre Buchung:","asmember");?></h5>
						<p><?php echo _e("Gew&auml;hlte Mitgliedschaft:","asmember");?> <?php echo $post->post_title;?></p>
					</div>
				</div>
					
				<div class="row">
					<div class="col-12 asmember-form-container">
					<h5 class="asmember-form-rahmen-header"><?php echo _e("Ihre pers&ouml;nlichen Daten:","asmember");?></h5>					
					<?php echo $asmember_register_anrede." ".$asmember_register_titel." ".$asmember_register_vorname." ".$asmember_register_name;?><br>
					<?php echo $asmember_register_firma?><br>
					<?php echo $asmember_register_strasse;?><br>
					<?php echo $asmember_register_plz." ".$asmember_register_ort;?><br>
					<?php echo _e("Tel.:","asmember");?> <?php echo $asmember_register_telefon;?><br>
					<?php echo _e("Email:","asmember");?> <?php echo $asmember_register_email;?>
					
					<input type="hidden" name="asmember_register_firma" value="<?php echo $asmember_register_firma;?>"/>
					<input type="hidden" name="asmember_register_anrede" value="<?php echo $asmember_register_anrede;?>"/>
					<input type="hidden" name="asmember_register_titel" value="<?php echo $asmember_register_titel;?>"/>
					<input type="hidden" name="asmember_register_vorname" value="<?php echo $asmember_register_vorname;?>"/>
					<input type="hidden" name="asmember_register_name" value="<?php echo $asmember_register_name;?>"/>
					<input type="hidden" name="asmember_register_strasse" value="<?php echo $asmember_register_strasse;?>"/>
					<input type="hidden" name="asmember_register_plz" value="<?php echo $asmember_register_plz;?>"/>
					<input type="hidden" name="asmember_register_ort" value="<?php echo $asmember_register_ort;?>"/>
					<input type="hidden" name="asmember_register_telefon" value="<?php echo $asmember_register_telefon;?>"/>
					<input type="hidden" name="asmember_register_email" value="<?php echo $asmember_register_email;?>"/>
					<input type="hidden" name="asmember_register_benutzer" value="<?php echo $asmember_register_benutzer;?>"/>
					<input type="hidden" name="asmember_register_password1" value="<?php echo $asmember_register_password1;?>"/>
							
					</div>
				</div>
					
				<?php
    			if($post->_asmember_memberships_betrag>0)
    			{
					?>
				
					<div class="row">
						<div class="col-12 asmember-form-container">
							<h5 class="asmember-form-rahmen-header"><b><?php echo _e("Zahlungsweise:","asmember");?></b></h5>
							<?php
							if($asmember_register_payment=="bank")echo _e("Bank&uuml;berweisung","asmember");
							if($asmember_register_payment=="paypal")echo _e("Paypal","asmember");
							?>						
							<input type="hidden" name="asmember_register_payment" value="<?php echo $asmember_register_payment;?>"/>
						</div>
					</div>
					<?php
				}
				?>
					    				
				<div class="row">
					<div class="col-12 asmember-form-container">
						<div class="form-check">							
							<?php
							$asmember_options_account = get_option('asmember_options_account');  						
  							$asmember_options_account_pages_agb	=$asmember_options_account["asmember_options_account_pages_agb"];
  							$slink="<a href=\"".$asmember_options_account_pages_agb."\" target=\"_blank\">";  						
  							$asmember_options_account_text_check_agb = $asmember_options_account['asmember_options_account_text_check_agb'];
  							$asmember_options_account_text_check_agb=str_replace("<a>",$slink,$asmember_options_account_text_check_agb);
							$asmember_options_account_text_check_agb=str_replace("%link%",$slink,$asmember_options_account_text_check_agb);
  							$asmember_options_account_text_check_agb=str_replace("%/link%","</a>",$asmember_options_account_text_check_agb);  						
  							?>  				
  							<input type="checkbox" class="form-check-input" name="asmember_register_check_agb" value="1" id="asmember_register_check_agb">
    						<label class="form-check-label" for="asmember_register_check_agb"><?php echo $asmember_options_account_text_check_agb;?></label>
    						<br><span class="error" id="asmember_register_check_agb_error"></span>
  						</div>
  					
  		
  						<div class="form-group">
  							<input type="hidden" name="action" value="asmember_membership_booking_step2">  
  							<input type="hidden" name="form_user_id" value="<?php echo $form_user_id;?>"/>	  			
  							<button type="submit" name="action2" class="btn btn-primary"><?php echo _e("Zur&uuml;ck","asmember");?></button>
  							<button type="submit" name="action3" class="btn btn-primary"><?php echo _e("Weiter","asmember");?></button>  			
  						</div>
  					</div>
  				</div>    
    			</form>    			
    			<?php
			}    	
		}
	}
		
		
	if($action=="")
	{
			
		?>
		
		<div class="asmember-buchung-container">
			<div class="asmember-form-container">
			<h4><?php echo _e("Buchung:","asmember");?></h4>
			</div>
			
			<?php
			//Prüfen, ob Mitgliedschaft besteht
			global $wpdb;
			$in_membership=0;
			
			if(!isset($asmember_register_anrede))$asmember_register_anrede="Frau";
			if(!isset($asmember_register_benutzer))$asmember_register_benutzer="";
			if(!isset($asmember_register_email))$asmember_register_email="";
			if(!isset($asmember_register_titel))$asmember_register_titel="";
			if(!isset($asmember_register_firma))$asmember_register_firma="";				
			if(!isset($asmember_register_vorname))$asmember_register_vorname="";
			if(!isset($asmember_register_name))$asmember_register_name="";
			if(!isset($asmember_register_strasse))$asmember_register_strasse="";
			if(!isset($asmember_register_plz))$asmember_register_plz="";
			if(!isset($asmember_register_ort))$asmember_register_ort="";
			if(!isset($asmember_register_telefon))$asmember_register_telefon="";
				
				
			if(is_user_logged_in())
			{
				$current_user=wp_get_current_user();
				$sql="select * from ".$wpdb->prefix."asmember_user where user_id=".$current_user->ID." and membership_id=".$post->ID;
				
				$asmember_register_firma=$current_user->_asmember_account_firma;
				$asmember_register_anrede=$current_user->_asmember_account_anrede;
				$asmember_register_titel=$current_user->_asmember_account_titel;
				$asmember_register_vorname=$current_user->first_name;
				$asmember_register_name=$current_user->last_name;
				$asmember_register_strasse=$current_user->_asmember_account_strasse;
				$asmember_register_plz=$current_user->_asmember_account_plz;
				$asmember_register_ort=$current_user->_asmember_account_ort;
				$asmember_register_telefon=$current_user->_asmember_account_telefon;
				
				$temp_result=$wpdb->get_results($sql);
				if($wpdb->num_rows>0)
				{
					
					$in_membership=1;
					$booking_row=$wpdb->get_row($sql);
					
					echo "<p>";
					echo _e("Sie haben diese Mitgliedschaft bereits gebucht.","asmember");
					echo "</p>\n";
					echo "<p>";
					echo _e("Gebucht am:","asmember");
					echo " ".strftime("%d.%m.%Y",$booking_row->datum_erstell)."</p>";
					echo "<p>";
					echo _e("Status:","asmember");
					echo " ".asmember_get_bookings_status($booking_row->status)."</p>";
					
					if($booking_row->status==1)
					{
						echo "<h5>";
						echo _e("Verf&uuml;gbare Downloads:","asmember");
						echo "</h5>";
						
						$args=array( 'post_type' => 'asdownload_downloads',
									 'posts_per_page' => -1,
									 'post_status' => 'publish',									 
         							 'meta_query'=> array(
          								array(
              							'key' => '_asdownload_downloads_membership',
              							'compare' => 'in', 
              							'value' => $post->ID,
              							'type' => 'numeric'
           									)
        								),
									  );
						$loop = new WP_Query($args);
						
						while ( $loop->have_posts() )
						{
							$loop->the_post();?>
							<div class="asdownload-listings-item">	
						
								<?php the_title( sprintf( '<a href="%s" rel="bookmark" class="asdownload-listings-item-title">', esc_url( get_permalink() ) ), '</a>' ); ?>
					
								<div class="asverein-listings-item-info">					
					
									<span><?php //the_excerpt();?></span>
									<span><?php echo _e("Version:","asmember");?> <?php echo $post->_asdownload_downloads_version;?></span>
						
								</div>
							</div>
			
							
						<?php
						}
						wp_reset_query();
					}
				}else
				{
					echo "<p>";
					echo _e("Sie sind aktuell eingeloggt als:","asmember");
					echo " ".$current_user->user_login."</p>\n";
					
					echo "<form id=\"asmember_register_form\" action=\"".home_url( $wp->request )."\" method=\"post\">\n";  
				}	
			}else
			{
				$asmember_account_anrede="Frau";
				$asmember_account_titel="";
				$asmember_account_firma="";
				$asmember_account_vorname="";
				$asmember_account_name="";
				$asmember_account_strasse="";
				$asmember_account_plz="";
				$asmember_account_ort="";
				$asmember_account_telefon="";
				
				?>
									
				<div class="col asmember-form-container">
					<h5 class="asmember-form-rahmen-header"><?php echo _e("Login","asmember");?></h5>
					<p style="margin-top:20px;margin-bottom:20px;"><?php echo _e("Wenn Sie bereits ein Benutzerkonto haben, loggen Sie sich hier ein.","asmember");?></p>
					<?php
					if(isset($_GET['redirect_to']))
					{
						$redirect=$_GET['redirect_to'];
					}else
					{
						$asmember_options_account = get_option('asmember_options_account');
						$redirect=$asmember_options_account['asmember_options_account_pages_redirect_after_login'];
					}	
					$args = array(	
						'id_username' => 'user',
							'id_password' => 'pass',
							'redirect' => $redirect,
							'echo'           => false,
							'remember'       => true,	
							'form_id'        => 'loginform',
							'id_username'    => 'user_login',
							'id_password'    => 'user_pass',
							'id_remember'    => 'rememberme',
							'id_submit'      => 'wp-submit',
							'label_username' => __('Benutzer/Email','asmember' ),
							'label_password' => __('Passwort','asmember' ),
							'label_remember' => __('Eingeloggt bleiben','asmember' ),
							'label_log_in'   => __('Login','asmember'),
							'value_username' => '',
							'value_remember' => false
						);

 	
 						
 					?>
 	
 					<form name="loginform" id="loginform" action="<?php echo home_url();?>/wp-login.php" method="post">
 					<div class="row">
 						<div class="col-6">
 							<div class="form-group">
    							<label for="user_login"><?php echo _e("Benutzer oder EMail:","asmember");?></label>
    							<input type="text" class="form-control" name="log" id="user_login" placeholder="<?php echo _e("Benutzer","asmember");?>">				
  							</div>		
 						</div>
 						<div class="col-6">
 							<div class="form-group">
    							<label for="user_pass"><?php echo _e("Passwort:","asmember");?></label>
    							<input type="password" class="form-control" name="pwd" id="user_pass" placeholder="<?php echo _e("Passwort","asmember");?>">	
				  			</div>		
 						</div>
 					</div>
 						
 					<div class="row">
 						<div class="col-6">
 							<div class="form-check">
  								<input type="checkbox" class="form-check-input" name="rememberme" value="forever" id="rememberme">
    							<label class="form-check-label" for="rememberme"><?php echo _e("Eingeloggt bleiben","asmember");?></label>    
				  			</div>		
				  			<div class="form-group">
  								<input type="hidden" name="redirect_to" value="<?php echo esc_url( $_SERVER['REQUEST_URI'] );?>"/> 	
  								<input type="submit" name="wp-submit" class="btn btn-primary" id="wp-submit" value="<?php echo _e("Login","asmember");?>"/>
		  					</div> 		
 						</div>
 						
 						<div class="col-6">
 							<div class="form-group">		
								<a href="<?php echo wp_lostpassword_url(); ?>" title="Passwort vergessen"><?php echo _e("Passwort vergessen","asmember");?></a>							
							</div>	
 						</div>
 					</div>
  						
  								
					</form>
						
				</div>
				
				
				
				<form id="asmember_register_form" action="<?php echo home_url($wp->request);?>" method="post">
				
					
				<div class="col asmember-form-container">
					<h5 class="asmember-form-rahmen-header"><?php echo _e("Benutzerkonto anlegen","asmember");?></h5>
					
					<p style="margin-top:20px;margin-bottom:20px;"><?php echo _e("Wenn Sie kein Benutzerkonto haben, legen Sie hier Ihr eigenes Benutzerkonto an. Tragen Sie dazu Ihre pers&ouml;nlichen Daten ein.","asmember");?></p>
						
						
					<div class="row">
					<div class="col-6">
					
						<div class="form-group">
    						<label for="asmember_register_benutzer"><?php echo _e("Benutzer:","asmember");?></label>
    						<input type="text" class="form-control" name="asmember_register_benutzer" id="asmember_register_benutzer" placeholder="<?php echo _e("Benutzername","asmember");?>" value="<?php echo $asmember_register_benutzer;?>">    	
    						<span class="error" id="asmember_register_benutzer_error"></span>
  						</div>
  	
    					<div class="form-group">
    						<label for="asmember_register_email"><?php echo _e("Email:","asmember");?></label>
    						<input type="email" class="form-control" name="asmember_register_email" id="asmember_register_email" placeholder="<?php echo _e("Ihre Email-Adresse","asmember");?>" value="<?php echo $asmember_register_email;?>">    	
    						<span class="error" id="asmember_register_email_error"></span>
  						</div>
  					</div>
  					<div class="col-6">
  						<div class="form-group">
    						<label for="asmember_register_password1"><?php echo _e("Passwort","asmember");?></label>
    						<input type="password" class="form-control" name="asmember_register_password1" id="asmember_register_password1" placeholder="<?php echo _e("Passwort","asmember");?>">
    						<span class="error" id="asmember_register_password1_error"></span>
  						</div>
  						
  						<div class="form-group">
    						<label for="asmember_register_password2"><?php echo _e("Passwort best&auml;tigen","asmember");?></label>
    						<input type="password" class="form-control" name="asmember_register_password2" id="asmember_register_password2" placeholder="<?php echo _e("Passwort wiederholen","asmember");?>">
							<span class="error" id="asmember_register_password2_error"></span>    		
  						</div>
  						<input type="hidden" name="asmember_register_create_user" value="1"/>
  		
					</div>
					</div>
				
				</div>
				<?php
			}
			if($in_membership==0)
			{
				
				?>
				<div class="col asmember-form-container">
				
				<h5 class="asmember-form-rahmen-header"><?php _e("Ihre pers&ouml;nlichen Daten:","asmember");?></h5>
				
				<div class="row">
					
				
					<div class="col-3">
						
    					<div class="form-group">
    						<label for="asmember_register_anrede"><?php echo _e("Anrede:","asmember");?></label>
    						<select class="form-control" name="asmember_register_anrede" id="asmember_register_anrede">
    							<option value="Herr"<?php if($asmember_register_anrede=="Herr")echo " selected";?>><?php echo _e("Herr","asmember");?></option>
    							<option value="Frau"<?php if($asmember_register_anrede=="Frau")echo " selected";?>><?php echo _e("Frau","asmember");?></option>
    						</select>
    					</div>
    				</div>
    				
    				<div class="col-3">
    					<div class="form-group">
    						<label for="asmember_register_titel"><?php echo _e("Titel:","asmember");?></label>
    						<input type="text" class="form-control" name="asmember_register_titel" id="asmember_register_titel" placeholder="<?php echo _e("Titel","asmember");?>" value="<?php echo $asmember_register_titel;?>"/>
    						<span class="error" id="asmember_register_titel_error"></span>
    					</div>    		
    				</div>
    				
    				<div class="col-6">
    					<div class="form-group">
    						<label for="asmember_register_firma"><?php echo _e("Firma:","asmember");?></label>
    						<input type="text" class="form-control" name="asmember_register_firma" id="asmember_register_firma" placeholder="<?php echo _e("Firma","asmember");?>" value="<?php echo $asmember_register_firma;?>"/>
    						<span class="error" id="asmember_register_firma_error"></span>
    					</div>    	
    				</div>
    			</div>
    			
    			<div class="row">
    				<div class="col-6">
    					<div class="form-group">
    						<label for="asmember_register_vorname"><?php echo _e("Vorname:","asmember");?></label>
    						<input type="text" class="form-control" name="asmember_register_vorname" id="asmember_register_vorname" placeholder="<?php echo _e("Vorname","asmember");?>" value="<?php echo $asmember_register_vorname;?>"/>
    						<span class="error" id="asmember_register_vorname_error"></span>
    					</div>    			
    				</div>	
    					
    				<div class="col-6">
    		    		
    					<div class="form-group">
    						<label for="asmember_register_name"><?php echo _e("Name:","asmember");?></label>
    						<input type="text" class="form-control" name="asmember_register_name" id="asmember_register_name" placeholder="<?php echo _e("Name","asmember");?>" value="<?php echo $asmember_register_name;?>"/>
    						<span class="error" id="asmember_register_name_error"></span>
    					</div>
    				</div>
    			</div>
    			
    			<div class="row">
    				<div class="col-6">
    					<div class="form-group">
    						<label for="asmember_register_strasse"><?php echo _e("Strasse:","asmember");?></label>
    						<input type="text" class="form-control" name="asmember_register_strasse" id="asmember_register_strasse" placeholder="<?php echo _e("Strasse","asmember");?>"  value="<?php echo $asmember_register_strasse;?>"/>
    						<span class="error" id="asmember_register_strasse_error"></span>
    					</div>
    				</div>
    				<div class="col-6">
    					<div class="form-group">
    						<label for="asmember_register_name"><?php echo _e("PLZ:","asmember");?></label>
    						<input type="text" class="form-control" name="asmember_register_plz" id="asmember_register_plz" placeholder="<?php echo _e("PLZ","asmember");?>"  value="<?php echo $asmember_register_plz;?>"/>
    						<span class="error" id="asmember_register_plz_error"></span>
    					</div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-6">
    					<div class="form-group">
    						<label for="asmember_register_ort"><?php echo _e("Ort:","asmember");?></label>
    						<input type="text" class="form-control" name="asmember_register_ort" id="asmember_register_ort" placeholder="<?php echo _e("Ort","asmember");?>"  value="<?php echo $asmember_register_ort;?>"/>
    						<span class="error" id="asmember_register_ort_error"></span>
    					</div>
					</div>
					<div class="col-6">
    					<div class="form-group">
    						<label for="asmember_register_telefon"><?php echo _e("Telefon:","asmember");?></label>
    						<input type="text" class="form-control" name="asmember_register_telefon" id="asmember_register_telefon" placeholder="<?php echo _e("Telefon","asmember");?>"  value="<?php echo $asmember_register_telefon;?>"/>
    						<span class="error" id="asmember_register_telefon_error"></span>
    					</div>
    				</div>
    			
    			</div>
    			</div>
    			
    			<?php
    			if($post->_asmember_memberships_betrag>0)
    			{
				?>
    			
    			
    			<div class="col asmember-form-container">
    				<h5 class="asmember-form-rahmen-header"><?php echo _e("Zahlungsweise","asmember");?></h5>
    				<p style="margin-top:20px;margin-bottom:20px;"><?php echo _e("W&auml;hlen Sie bitte Ihre gew&uuml;nschte Zahlungsweise aus.","asmember");?></p>
							
    					<div class="form-group">							
							
							<?php
							$asmember_options_bookings=get_option("asmember_options_bookings");
							if($asmember_options_bookings["asmember_options_bookings_paypal"]==1)
							{
								?>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="asmember_register_payment" id="asmember_register_payment" value="paypal">
								<label class="form-check-label" for="asmember_register_payment"><?php echo _e("Paypal","asmember");?></label>
								</div>
								<?php
							}
							if($asmember_options_bookings["asmember_options_bookings_ueberweisung"]==1)
							{
								?>
								<div class="form-check">				
								<input class="form-check-input" type="radio" name="asmember_register_payment" id="asmember_register_payment" value="bank">
								<label class="form-check-label" for="asmember_register_payment"><?php echo _e("Bank&uuml;berweisung","asmember");?></label>
								</div>					
								<?php
							}
							?>
						</div>
				
    			
    			</div>
    			<?php
    			}
    			?>
    			
    				<div class="col asmember-form-container">
				
	
						<?php
						
  						$asmember_options_account = get_option('asmember_options_account');  						
  						$asmember_options_account_pages_datenschutz	=$asmember_options_account["asmember_options_account_pages_datenschutz"];
  						$slink="<a href=\"".$asmember_options_account_pages_datenschutz."\" target=\"_blank\">";  						
  						$asmember_options_account_text_check_datenschutz = $asmember_options_account['asmember_options_account_text_check_datenschutz'];
  						$asmember_options_account_text_check_datenschutz=str_replace("<a>",$slink,$asmember_options_account_text_check_datenschutz);
  						$asmember_options_account_text_check_datenschutz=str_replace("%link%",$slink,$asmember_options_account_text_check_datenschutz);
  						$asmember_options_account_text_check_datenschutz=str_replace("%/link%","</a>",$asmember_options_account_text_check_datenschutz);
  						
  						?>
  						
  						
  						
  						<div class="form-check">
  							<input type="checkbox" class="form-check-input" name="asmember_register_check_datenschutz" value="1" id="asmember_register_check_datenschutz">
    						<label class="form-check-label" for="asmember_register_check_datenschutz"><?php echo $asmember_options_account_text_check_datenschutz;?></label>
    						<br><span class="error" id="asmember_register_check_datenschutz_error"></span>
  						</div>
  		
  						<div style="height:20px;">&nbsp;</div>
  					
  						<div class="form-group">
  							<input type="hidden" name="action" value="asmember_membership_booking_step1">  	  			
  							<button type="submit" class="btn btn-primary"><?php echo _e("Weiter","asmember");?></button>  			
			  			</div>  
    				</div>   
    			</form>    	
    			<?php
    		}
    		?>
		
		</div>
		
		<?php
	}
?>
		
			    	