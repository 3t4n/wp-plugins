<?php
if(!class_exists("asmember_public_user_register"))
{
	
class asmember_public_user_register
{

	public function __construct()
	{
		add_shortcode('asmember_register',array($this,'shortcode_asmember_register'));
	}	

	function shortcode_asmember_register()
	{
		if(isset($_REQUEST['action']))$action=sanitize_text_field($_REQUEST['action']);else $action="form";
	
		$asmember_options_account = get_option('asmember_options_account');
		$asmember_options_account_register_layout = $asmember_options_account['asmember_options_account_register_layout'];		
		$asmember_options_account_register_modus = $asmember_options_account['asmember_options_account_register_modus'];
		$asmember_options_account_active_modus = $asmember_options_account['asmember_options_account_active_modus'];
		$asmember_options_account_register_membership = $asmember_options_account['asmember_options_account_register_membership'];
		$asmember_options_account_spam_blacklist		= $asmember_options_account['asmember_options_account_spam_blacklist'];
		//$asmember_options_account_profil_extended	=$asmember_options_account['asmember_options_account_profil_extended'];
		if(is_user_logged_in())
		{
			
			$url_myentries=$asmember_options_account['asmember_options_account_pages_redirect_after_login'];					
	
			return "<p>".esc_html_x("Sie sind bereits eingeloggt","asmember")."</p><a href=\"".esc_url($url_myentries)."\" class=\"btn btn-primary\">".esc_html_x('Weiter','','asmember')."</a>";		
			exit();	
		}	
	
	
		if(get_option('users_can_register')==0)
		{
			return esc_html_x('Die Registrierung ist deaktiviert','','asmember');
		}
	
	
		
			
	
		
		if($action=="activate")
		{
			//Aktivierung ausführen
			$key=	sanitize_text_field($_GET['key']);
			$user=	sanitize_text_field($_GET['user']);		
			$return_str="";		
			$user = get_user_by( 'ID', $user );
		
			$asmember_options_account=get_option("asmember_options_account");			
			
						
			if($user->active==0)
			{
				if($user->active_code==$key)
				{
					//keys identisch, aktivieren
					if($asmember_options_account["asmember_options_account_active_modus"]==0)
					{						
						update_user_meta( $user->ID, 'active', 1 );					
						$return_str.=get_asmember_login_form();					
					}else
					{
						//Aktivierung durch Admin
						update_user_meta( $user->ID, 'active_user', 1 );
						$return_str.="<p>".esc_html_x("Ihr Zugang wird vom Administrator freigeschaltet.","asmember")."</p>\n";
					}	
				}else
				{
					$return_str.=esc_html_x('Die Aktivierung war nicht erfolgreich.','asmember');
						
				}
			}else
			{
			
				$return_str.="<h2>".esc_html_x("Login","asmember")."</h2>";
				$return_str.=get_asmember_login_form();
			}
			
		
			return $return_str;
		}
	
	
	
		ob_start();
	
	
	
		
		if($action=="asmember_reg_user")
		{
			//User Registrieren				
			
			$asmember_register_name = sanitize_text_field($_POST["asmember_register_name"]);
    	   	$asmember_register_email = sanitize_text_field( $_POST["asmember_register_email"]);
        	$asmember_register_password1= sanitize_text_field( $_POST["asmember_register_password1"]);
 				
 			$search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ");
			$replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "");
				
			if($asmember_options_account_register_modus==2)	 		
 			{
				//Zusätzliche Variablen holen
				if(isset($_POST["asmember_register_anrede"]))	$asmember_register_anrede = 	sanitize_text_field($_POST["asmember_register_anrede"]);	else $asmember_register_anrede="";
				if(isset($_POST["asmember_register_titel"]))	$asmember_register_titel = 	sanitize_text_field($_POST["asmember_register_titel"]);	else $asmember_register_titel="";
				
				if(isset($_POST["asmember_register_vorname"]))	$asmember_register_vorname = 	sanitize_text_field($_POST["asmember_register_vorname"]);	else $asmember_register_vorname="";
				if(isset($_POST["asmember_register_strasse"]))	$asmember_register_strasse = 	sanitize_text_field($_POST["asmember_register_strasse"]);	else $asmember_register_strasse="";
				if(isset($_POST["asmember_register_plz"]))		$asmember_register_plz = 		sanitize_text_field($_POST["asmember_register_plz"]);		else $asmember_register_plz="";
				if(isset($_POST["asmember_register_ort"]))		$asmember_register_ort = 		sanitize_text_field($_POST["asmember_register_ort"]);		else $asmember_register_ort="";
				if(isset($_POST["asmember_register_firma"]))	$asmember_register_firma = 		sanitize_text_field($_POST["asmember_register_firma"]);		else $asmember_register_firma="";
				if(isset($_POST["asmember_register_position"]))	$asmember_register_position = 	sanitize_text_field($_POST["asmember_register_position"]);	else $asmember_register_position="";				
				if(isset($_POST["asmember_register_telefon"]))	$asmember_register_telefon = 	sanitize_text_field($_POST["asmember_register_telefon"]);	else $asmember_register_telefon="";					
				if(isset($_POST["asmember_register_url"]))		$asmember_register_url = 		sanitize_text_field($_POST["asmember_register_url"]);	else $asmember_register_url="";									
				if(isset($_POST["asmember_register_ustid"]))	$asmember_register_ustid = 	sanitize_text_field($_POST["asmember_register_ustid"]);	else $asmember_register_ustid="";					
				if(isset($_POST["asmember_register_gebdatum"]))	$asmember_register_gebdatum = sanitize_text_field($_POST["asmember_register_gebdatum"]); else $asmember_register_gebdatum="";
				
				if(isset($_POST["asmember_register_membership"])) $asmember_register_membership = $_POST["asmember_register_membership"]; else $asmember_register_membership=0;
				
				$asmember_register_benutzer = str_replace($search, $replace, trim($asmember_register_vorname))."_".str_replace($search, $replace, trim($asmember_register_name));
					
			}else
			{
				$asmember_register_vorname = 	"";
				$asmember_register_strasse = 	"";
				$asmember_register_plz = 		"";
				$asmember_register_ort = 		"";
				$asmember_register_firma = 		"";
				$asmember_register_position =	"";
				$asmember_register_telefon = 	"";					
				$asmember_register_benutzer = str_replace($search, $replace, trim($asmember_register_name));
				$asmember_register_membership=0;	
			}
 			
 			//Spam
			
			$asmember_options_account_spam_blacklist=explode(";",$asmember_options_account_spam_blacklist);
			
			foreach($asmember_options_account_spam_blacklist as $item)
			{
				if(isset($item) and $item!="")
				{					
					if(strpos("1".$asmember_register_benutzer,$item)>0)	exit();				
					if(strpos("1".$asmember_register_email,$item)>0)exit();				
				}	
			}
        	
        	// get the blog administrator's email address
        	$admin_email = get_option( 'admin_email' );

			$errormsg=array();
			$new_user=false;
		
			
			$user_exists = 1;    			
			while($user_exists > 0)
    		{
       			if(username_exists($asmember_register_benutzer))
       			{
					$asmember_register_benutzer.="1";
				}else
				{
					$user_exists=0;
				}       				
   			} 
   
   
			if(!is_email($asmember_register_email)) $errormsg[]=esc_html_x("Bitte geben Sie eine g&uuml;ltige Email-Adresse ein!","asmember");
			if(count($errormsg)==0)
			{
				//$password=wp_generate_password();
			    
	       		$user_id = wp_create_user( $asmember_register_benutzer, $asmember_register_password1, $asmember_register_email );
    	   		if( !is_wp_error($user_id) )
        		{
           			$user = get_user_by( 'id', $user_id );            			 
					$asmember_options_account = get_option('asmember_options_account');
					$url_register=	$asmember_options_account['asmember_options_account_pages_register'];
					$email_from=	$asmember_options_account['asmember_options_account_email_from'];				
			
					$email_headers="From:".$email_from;
				
					update_user_meta( $user_id, 'last_name', $asmember_register_name );
						
					wp_update_user( array( 'user_nicename' => $asmember_register_vorname." ".$asmember_register_name ));
						
						
					
					update_user_meta( $user_id, '_asmember_account_anrede', $asmember_register_anrede );
					update_user_meta( $user_id, '_asmember_account_titel', $asmember_register_titel );
					update_user_meta( $user_id, 'first_name', $asmember_register_vorname );							
					update_user_meta( $user_id, '_asmember_account_strasse', $asmember_register_strasse );
					update_user_meta( $user_id, '_asmember_account_plz', $asmember_register_plz );
					update_user_meta( $user_id, '_asmember_account_ort', $asmember_register_ort );
					update_user_meta( $user_id, '_asmember_account_firma', $asmember_register_firma );
					update_user_meta( $user_id, '_asmember_account_position', $asmember_register_position );
					update_user_meta( $user_id, '_asmember_account_ustid', $asmember_register_ustid );
					update_user_meta( $user_id, '_asmember_account_gebdatum', $asmember_register_gebdatum);
					update_user_meta( $user_id, '_asmember_account_telefon', $asmember_register_telefon);
				
					
					
  					if($asmember_register_membership>0)  					
  						update_user_meta( $user_id,"_asmember_account_membership",",".$asmember_register_membership.",");
  				
				
					update_user_meta($user_id,'active',0);
					update_user_meta($user_id,'show_admin_bar_front','false');
	
					
						
						$active_code = sha1( $user_id . time() );
    	   				$activation_link = add_query_arg( array( 'action'=>'activate', 'key' => $active_code, 'user' => $user_id ), $url_register);
        				$activation_link_html="<a href=\"".$activation_link."\">".$activation_link."</a>";
        				global $wpdb;
        				$sql="udpate ".$wpdb->prefix."users set user_activation_key='".$active_code."' where ID=".$user_id;
        				$wpdb->query($sql);
        		        		
        				update_user_meta( $user_id, 'active_code', $active_code, true );
						
        		        		        			
        			
        			$body=$asmember_options_account['asmember_options_account_text_email_benutzer'];
        			//Werte austauschen
        			$body=str_replace("%benutzer%",$asmember_register_benutzer,$body);
        			$body=str_replace("%vorname%",$asmember_register_vorname,$body);
        			$body=str_replace("%name%",$asmember_register_name,$body);
        			$body=str_replace("%strasse%",$asmember_register_strasse,$body);
        			$body=str_replace("%plz%",$asmember_register_plz,$body);
        			$body=str_replace("%ort%",$asmember_register_ort,$body);
        			$body=str_replace("%firma%",$asmember_register_firma,$body);        			
        			$body=str_replace("%download%",$asmember_options_account['asmember_options_account_attachment_benutzer'],$body);
        			
        			$body=str_replace("%activation_link%",$activation_link,$body);        		
					
					
					//$body=str_replace("\n","<br>",$body);
					if($asmember_options_account['asmember_options_account_attachment_benutzer_file']!="")
					{						
						$attachments = array( $asmember_options_account['asmember_options_account_attachment_benutzer_file'] );					
        				wp_mail( sanitize_email($user->user_email), $asmember_options_account['asmember_options_account_text_betreff_benutzer'], $body, $email_headers,$attachments );
					}else
					{
						wp_mail( sanitize_email($user->user_email), $asmember_options_account['asmember_options_account_text_betreff_benutzer'], $body, $email_headers);	
					}	
    			
    			
    				//Admin-Email senden
					$body=$asmember_options_account['asmember_options_account_text_email_admin'];
        			//Werte austauschen
        			$body=str_replace("%benutzer%",$asmember_register_benutzer,$body);
        			$body=str_replace("%email%",$asmember_register_email,$body);
        			$body=str_replace("%activation_link%",$activation_link,$body);   
        			$body=str_replace("%vorname%",$asmember_register_vorname,$body);
        			$body=str_replace("%name%",$asmember_register_name,$body);
        			$body=str_replace("%strasse%",$asmember_register_strasse,$body);
        			$body=str_replace("%plz%",$asmember_register_plz,$body);
        			$body=str_replace("%ort%",$asmember_register_ort,$body); 
        			$body=str_replace("%firma%",$asmember_register_firma,$body); 
        			//$body=str_replace("\n","<br>",$body);    		
        			wp_mail( $admin_email, $asmember_options_account['asmember_options_account_text_betreff_admin'], $body, $email_headers );
    		
    								}	
			
			}
        

			if(count($errormsg)>0)
			{
				$string.='<ul class="error">';
				foreach($errormsg as $e) $string.='<li>'.$e.'</li>';
				$string.='</ul>';
				$action="form";				
			}else
			{
				$string.=esc_html_x('Ihr Benutzerkonto wurde erfolgreich erstellt. Sie erhalten nun eine E-Mail mit einem Aktivierungslink.','asmember');
			}		
			echo $string;	
		}
		
		
		
		if($action=="form")
		{    		
			?>
	
			<script language="javascript">

			jQuery(document).ready(function()
			{
  				jQuery('#asmember_register_form').submit(function(e)
  				{    		
    				var error=0;	    		   					
					
    				
					<?php if($asmember_options_account_register_modus==2)
					{	?>
    					
    					var asmember_register_vorname	= 	jQuery('#asmember_register_vorname').val();
    					if (asmember_register_vorname.length < 1)
    					{     			
      						jQuery('#asmember_register_vorname_error').html('<?php echo esc_html_x('Bitte f&uuml;llen Sie dieses Feld aus!','','asmember');?>');
      						error=1;
    					}else
	    				{
						
							jQuery('#asmember_register_vorname_error').html('');						
						}
    				
    				
    					var asmember_register_name		=	jQuery('#asmember_register_name').val();
    					if (asmember_register_name.length < 1)
    					{      			
      						jQuery('#asmember_register_name_error').html('<?php echo esc_html_x('Bitte f&uuml;llen Sie dieses Feld aus!','','asmember');?>');
      						error=1;
	    				}else
    					{
							jQuery('#asmember_register_name_error').html('');
						}
					
					
    					var asmember_register_strasse	=	jQuery('#asmember_register_strasse').val();
    					if (asmember_register_strasse.length < 1)
    					{      			
      						jQuery('#asmember_register_strasse_error').html('<?php echo esc_html_x('Bitte f&uuml;llen Sie dieses Feld aus!','','asmember');?>');
      						error=1;
    					}else
	    				{
							jQuery('#asmember_register_strasse_error').html('');
						}
    				
    					var asmember_register_plz		=	jQuery('#asmember_register_plz').val();
    					if (asmember_register_plz.length < 1)
    					{      			
      						jQuery('#asmember_register_plz_error').html('<?php echo esc_html_x('Bitte f&uuml;llen Sie dieses Feld aus!','','asmember');?>');
      						error=1;
    					}else
    					{
							jQuery('#asmember_register_plz_error').html('');
						}
    				
    					var asmember_register_ort		=	jQuery('#asmember_register_ort').val();
    					if (asmember_register_ort.length < 1)
    					{      			
      						jQuery('#asmember_register_ort_error').html('<?php echo esc_html_x('Bitte f&uuml;llen Sie dieses Feld aus!','','asmember');?>');
      						error=1;
    					}else
    					{
							jQuery('#asmember_register_ort_error').html('');
						}
    					
    					var asmember_register_telefon	=	jQuery('#asmember_register_telefon').val();
    					if (asmember_register_telefon.length < 1)
    					{      			
      						jQuery('#asmember_register_telefon_error').html('<?php echo esc_html_x('Bitte f&uuml;llen Sie dieses Feld aus!','','asmember');?>');
      						error=1;
    					}else
    					{
							jQuery('#asmember_register_telefon_error').html('');
						}
    				<?php } ?>
    				
    				
    					
    					
    					var asmember_register_email = jQuery('#asmember_register_email').val();    		
    					
    					if (asmember_register_email.length < 1)
    					{
      						jQuery('#asmember_register_email_error').html('<?php echo esc_html_x('Bitte f&uuml;llen Sie dieses Feld aus!','','asmember');?>');
      						error=1;
	    				} else
    					{
      						var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;      			
      						var validEmail = regEx.test(asmember_register_email);
      						if (!validEmail)
      						{
        						jQuery('#asmember_register_email_error').html('<?php echo esc_html_x('Bitte geben Sie eine g&uuml;ltige EMail ein!','','asmember');?>');
        						error=1;
      						}else
	      					{
								jQuery('#asmember_register_email_error').html('');
							}      			
    					}
    					<?php
  						if($asmember_options_account["asmember_options_account_register_emailcheck"]==1)
  						{
  							?>
  							var asmember_register_email2 = jQuery('#asmember_register_email2').val();
  							if(asmember_register_email!=asmember_register_email2)
  							{
								jQuery('#asmember_register_email2_error').html('<?php echo esc_html_x('Bitte geben Sie eine g&uuml;ltige EMail ein!','','asmember');?>');
        						error=1;
							}
							<?php
						}
  						?>	
    					var asmember_register_password1 = jQuery('#asmember_register_password1').val();
    					var asmember_register_password2 = jQuery('#asmember_register_password2').val();
    					
    					
    					if (asmember_register_password1.length < 8)
    					{
      						jQuery('#asmember_register_password1_error').html('<?php echo esc_html_x('Bitte geben Sie ein Passwort mit mindestens 8 Zeichen ein!','asmember');?>');
      						error=1;
	    				}else
    					{
							jQuery('#asmember_register_password1_error').html('');
						}
    		
    					if (asmember_register_password2.length < 8)
    					{
      						jQuery('#asmember_register_password2_error').html('<?php echo esc_html_x('Bitte geben Sie ein Passwort mit mindestens 8 Zeichen ein!','asmember');?>');
	      					error=1;
    					}else
    					{
							jQuery('#asmember_register_password2_error').html('');
						}
    		
    					if(asmember_register_password1!=asmember_register_password2)
    					{
							jQuery('#asmember_register_password2_error').html('<?php echo esc_html_x('Die Passw&ouml;rter sind nicht identisch.','asmember');?>');
						}
						
						
    					if (jQuery('#asmember_register_check_agb').is(':checked'))
						{
    						jQuery('#asmember_register_check_agb_error').html('');
						}
						else
						{
    						jQuery('#asmember_register_check_agb_error').html('<?php echo esc_html_x('Bitte best&auml;tigen Sie die AGB.','asmember');?>');
    						error=1;
						}
						if (jQuery('#asmember_register_check_datenschutz').is(':checked'))
						{
    						jQuery('#asmember_register_check_datenschutz_error').html('');
						}
						else
						{
    						jQuery('#asmember_register_check_datenschutz_error').html('<?php echo esc_html_x('Bitte best&auml;tigen Sie die Datenschutzbestimmung.','asmember');?>');
    						error=1;
						}
						
						
						
					
    				if(error==0)
    				{
						//alert('erfolg');				
					}else
					{
						e.preventDefault();
					}
    			
				});
	
			});

    
	    	</script>
    
    		
			
        
			<form id="asmember_register_form" action="<?php echo esc_url( $_SERVER['REQUEST_URI'] );?>" method="post">
    		
    		<div class="container">
    			
    		<?php
    		
    		if($asmember_options_account_register_modus==2)
			{
				?>
				<div class="row asmember-form-container">
    				
    				<div class="col-md-6">
    					
    					<?php
						if($asmember_options_account["asmember_options_account_register_firma"]==1)
						{
							?>
							<div class="form-group">
								<label for="asmember_register_firma"><?php echo esc_html_e('Firma','asmember');?></label>
								<input type="text" name="asmember_register_firma" id="asmember_register_firma" class="form-control" placeholder="<?php echo esc_attr_e('Ihre Firma','asmember');?>"/>
								<span class="error" id="asmember_register_firma_error"></span>
							</div> 	
							<?php
						}
						?>
						
						<?php
						if($asmember_options_account["asmember_options_account_register_position"]==1)
						{
							?>
							<div class="form-group">
								<label for="asmember_register_position"><?php echo esc_html_e('Position','asmember');?></label>
								<input type="text" name="asmember_register_position" id="asmember_register_position" class="form-control" placeholder="<?php echo esc_attr_e('Ihre Position','asmember');?>"/>								
							</div> 	
							<?php
						}
						?>
						
						
    					<div class="form-group">
    						<label for="asmember_register_anrede"><?php echo esc_html_e('Anrede','asmember');?></label>
    						<select name="asmember_register_anrede" id="asmember_register_anrede" class="form-control">
    							<option value="Herr"><?php echo esc_html_e('Herr','asmember');?></option>
    							<option value="Frau"><?php echo esc_html_e('Frau','asmember');?></option>    							
    						</select>    			
  						</div>	
  						
  						<div class="form-group">
							<label for="asmember_register_titel"><?php echo esc_html_e('Titel','asmember');?></label>
							<input type="text" name="asmember_register_titel" id="asmember_register_titel" class="form-control"/>
							<span class="error" id="asmember_register_titel_error"></span>
						</div> 
			
						<div class="form-group">
							<label for="asmember_register_vorname"><?php echo esc_html_e('Vorname','asmember');?></label>
							<input type="text" name="asmember_register_vorname" id="asmember_register_vorname" class="form-control" placeholder="<?php echo esc_attr_e('Ihr Vorname','asmember');?>"/>
							<span class="error" id="asmember_register_vorname_error"></span>
						</div> 	
			
						<div class="form-group">
							<label for="asmember_register_name"><?php echo esc_html_e('Nachname','asmember');?></label>
							<input type="text" name="asmember_register_name" id="asmember_register_name" class="form-control" placeholder="<?php echo esc_attr_e('Ihr Nachname','asmember');?>"/>
							<span class="error" id="asmember_register_name_error"></span>
						</div> 	
						
						
						
						
    				</div>
    				
    				<div class="col-md-6">
    					
    					<div class="form-group">
							<label for="asmember_register_strasse"><?php echo esc_html_e('Stra&szlig;e','asmember');?></label>
							<input type="text" name="asmember_register_strasse" id="asmember_register_strasse" class="form-control" placeholder="<?php echo esc_attr_e('Ihre Stra&szlig;e','asmember');?>"/>
							<span class="error" id="asmember_register_strasse_error"></span>
						</div> 	
						<div class="form-group">
							<label for="asmember_register_plz"><?php echo esc_html_e('PLZ','asmember');?></label>
							<input type="text" name="asmember_register_plz" id="asmember_register_plz" class="form-control" placeholder="<?php echo esc_attr_e('PLZ','asmember');?>"/>
							<span class="error" id="asmember_register_plz_error"></span>
						</div> 	
			
						<div class="form-group">
							<label for="asmember_register_ort"><?php echo esc_html_e('Ort','asmember');?></label>
							<input type="text" name="asmember_register_ort" id="asmember_register_ort" class="form-control" placeholder="<?php echo esc_attr_e('Ort','asmember');?>"/>
							<span class="error" id="asmember_register_ort_error"></span>
						</div> 	
						<div class="form-group">
							<label for="asmember_register_telefon"><?php echo esc_html_e('Telefon','asmember');?></label>
							<input type="text" name="asmember_register_telefon" id="asmember_register_telefon" class="form-control" placeholder="<?php echo esc_attr_e('Telefon','asmember');?>"/>
							<span class="error" id="asmember_register_telefon_error"></span>
						</div> 	
						
						<?php
						if($asmember_options_account["asmember_options_account_register_url"]==1)
						{
							?>
							<div class="form-group">
								<label for="asmember_register_url"><?php echo esc_html_e('Homepage','asmember');?></label>
								<input type="text" name="asmember_register_url" id="asmember_register_url" class="form-control" placeholder="<?php echo esc_attr_e('Ihre Homepage','asmember');?>"/>								
							</div> 	
							<?php
						}
						?>
						
						<?php
						if($asmember_options_account["asmember_options_account_register_ustid"]==1)
						{
							?>
							<div class="form-group">
								<label for="asmember_register_ustid"><?php echo esc_html_e('Steuer-Identifikationsnummer','asmember');?></label>
								<input type="text" name="asmember_register_ustid" id="asmember_register_ustid" class="form-control" placeholder=""/>								
							</div> 	
							<?php
						}
						?>
						<?php
						if($asmember_options_account["asmember_options_account_register_gebdatum"]==1)
						{
							?>
							<div class="form-group">
								<label for="asmember_register_gebdatum"><?php echo esc_html_e('Geburtsdatum','asmember');?></label>
								<input type="date" name="asmember_register_gebdatum" id="asmember_register_gebdatum" class="form-control" placeholder="<?php echo esc_attr_e('Ihr Geburtsdatum','asmember');?>"/>								
							</div> 	
							<?php
						}
						?>
						
				
    				</div>
    			</div>
			<?php
			}
			
			?>	
				
				
			<?php    		
    		if($asmember_options_account_register_modus==1)
			{
				?>
				<div class="row asmember-form-container">			
					<div class="col-md-6">
						<div class="form-group">
							<label for="asmember_register_name"><?php echo esc_html_e('Name','asmember');?></label>
							<input type="text" name="asmember_register_name" id="asmember_register_name" class="form-control" placeholder="<?php echo esc_attr_e('Ihr Nachname','asmember');?>"/>
							<span class="error" id="asmember_register_name_error"></span>
						</div> 	
					</div>
				</div>	
				<?php
			}
			?>					
			
			
			<div class="row asmember-form-container">
			
				<div class="col-md-6">
											
					<div class="form-group">
    					<label for="asmember_register_email"><?php echo esc_html_e('Email','asmember');?></label>
    					<input type="email" class="form-control" name="asmember_register_email" id="asmember_register_email" placeholder="<?php echo esc_attr_e('Ihre Email','asmember');?>">    	
    					<span class="error" id="asmember_register_email_error"></span>
  					</div>
  				</div>
  				<?php
  				if($asmember_options_account["asmember_options_account_register_emailcheck"]==1)
  				{
					?>
					<div class="col-md-6">
											
						<div class="form-group">
    						<label for="asmember_register_email2"><?php echo esc_html_e('Email-Wiederholung','asmember');?></label>
    						<input type="email" class="form-control" name="asmember_register_email2" id="asmember_register_email2" placeholder="<?php echo esc_attr_e('Wiederholen Sie Ihre Email','asmember');?>">    	
    						<span class="error" id="asmember_register_email2_error"></span>
  						</div>
  					</div>
  					<?php				
				}
				?>  				
			</div>
			
			<div class="row asmember-form-container">
				<div class="col-md-6">
					
					
  					<div class="form-group">
    					<label for="asmember_register_password1" style="white-space:nowrap;"><?php echo esc_html_e('Passwort','asmember');?></label>
    					<input type="password" class="form-control" name="asmember_register_password1" id="asmember_register_password1" placeholder="<?php echo esc_attr_e('Passwort','asmember');?>">
    					<span class="error" id="asmember_register_password1_error"></span>
  					</div>
  				</div>
  				<div class="col">
  					<div class="form-group">
    					<label for="asmember_register_password2" style="white-space:nowrap;"><?php echo esc_html_e('Passwort wiederholen','asmember');?></label>
    					<input type="password" class="form-control" name="asmember_register_password2" id="asmember_register_password2" placeholder="<?php echo esc_attr_e('Passwort wiederholen','asmember');?>">
						<span class="error" id="asmember_register_password2_error"></span>    		
  					</div>	
  				</div>
  			</div>
  			
  						
			<?php
			if($asmember_options_account_register_membership==-1)
			{
				echo "<div class=\"row asmember-form-container\">\n";
					echo "<div class=\"col-md-6\">\n";
						$args = array(
        						'post_type' => 'asmember_memberships',
        						'numberposts' => -1,
        						'meta_query' => array(
            							array(
                							'key' => '_asmember_memberships_enabled',
                							'value' => '1',
                							'compare' => '=',
            								)
        								)
    							);
    
    					$results=get_posts($args);
    					if(count($results)>0)
    					{
							
							?>
							
							<div class="form-group">
    						<label for="asmember_register_membership"><?php echo esc_html_e('Mitgliedschaft','asmember');?>:</label>
	    					<?php
	    					$first_entry=1;
	    					echo "<table class=\"table\">\n";
	    					foreach($results as $item)
	    					{
								echo "<tr>\n";
								echo "  <td>\n";								
									echo "<input type=\"radio\" name=\"asmember_register_membership\" value=\"".$item->ID."\"/";
									if($first_entry==1){echo " checked";$first_entry=0;}
									echo ">\n";
								echo "  </td>\n";
								echo "  <td>\n";	
								
									echo "<b>".$item->post_title."</b>\n";
									echo "<br>Betrag: ".str_replace(".",",",sprintf("%0.2f", $item->_asmember_memberships_betrag)) . " &euro;";
									echo "<br>Laufzeit: ".$item->_asmember_memberships_period;
									if($item->_asmember_memberships_period==1)echo " Monat"; else echo " Monate";
								echo "	</td>\n";	
								echo "</tr>\n";
							}
							echo "</table>\n";
							?>
							
	    					</div>
  							<?php
						}
					echo "</div>\n";
				echo "</div>\n";
  			}else
  			{
				echo "<input type=\"hidden\" name=\"asmember_register_membership\" id=\"asmember_register_membership\" value=\"".$asmember_options_account_register_membership."\"/>\n";
			}	
			?>
				
						
  			<div class="row asmember-form-container">
				<div class="col">
						<?php
						
  						$asmember_options_account_pages_agb	=$asmember_options_account["asmember_options_account_pages_agb"];
  						$slink="<a href=\"".$asmember_options_account_pages_agb."\" target=\"_blank\">";
  						$asmember_options_account_text_check_agb = $asmember_options_account['asmember_options_account_text_check_agb'];
  						$asmember_options_account_text_check_agb=str_replace("<a>",$slink,$asmember_options_account_text_check_agb);
  						$asmember_options_account_text_check_agb=str_replace("%link%",$slink,$asmember_options_account_text_check_agb);
  						$asmember_options_account_text_check_agb=str_replace("%/link%","</a>",$asmember_options_account_text_check_agb);
  						
  						
  						
  						$asmember_options_account_pages_datenschutz	=$asmember_options_account["asmember_options_account_pages_datenschutz"];
  						$slink="<a href=\"".$asmember_options_account_pages_datenschutz."\" target=\"_blank\">";
  						
  						$asmember_options_account_text_check_datenschutz = $asmember_options_account['asmember_options_account_text_check_datenschutz'];
  						$asmember_options_account_text_check_datenschutz=str_replace("<a>",$slink,$asmember_options_account_text_check_datenschutz);
  						$asmember_options_account_text_check_datenschutz=str_replace("%link%",$slink,$asmember_options_account_text_check_datenschutz);
  						$asmember_options_account_text_check_datenschutz=str_replace("%/link%","</a>",$asmember_options_account_text_check_datenschutz);
  						
  						
  						?>
  						
  						
						<div class="form-check">
  							<input type="checkbox" class="form-check-input" name="asmember_register_check_agb" value="1" id="asmember_register_check_agb">
    						<label class="form-check-label" for="asmember_register_check_agb"><?php echo $asmember_options_account_text_check_agb;?></label>
    						<br><span class="error" id="asmember_register_check_agb_error"></span>
  						</div>
  			
  			
  						<div class="form-check form-group">
  							<input type="checkbox" class="form-check-input" name="asmember_register_check_datenschutz" value="1" id="asmember_register_check_datenschutz">
    						<label class="form-check-label" for="asmember_register_check_datenschutz"><?php echo $asmember_options_account_text_check_datenschutz;?></label>
    						<br><span class="error" id="asmember_register_check_datenschutz_error"></span>
  						</div>
  		
  						<div class="form-group">
  							<input type="hidden" name="action" value="asmember_reg_user">  	
  							<input type="submit" class="btn btn-primary" id="wp-submit" value="<?php echo esc_html_e('Registrieren','asmember');?>"/>  					
  						</div>	
					</div>
					
				</div>    		
    			
    		</div>
    		
  			
    
    		</form>
    	<?php
    	}
  		  	
    	return ob_get_clean();
    }

}

$asmember_public_user_register = new asmember_public_user_register();

}


