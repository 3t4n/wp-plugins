<?php


if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class asmember_members_list extends WP_List_Table
{

	/** Class constructor */
	public function __construct()
	{

		parent::__construct( [
			'singular' => __( 'Mitglied', 'asmember' ), //singular name of the listed records
			'plural'   => __( 'Mitglieder', 'asmember' ), //plural name of the listed records
			'ajax'     => false //does this table support ajax?
		] );

	}


	function user_account_email()
	{
		if(isset($_REQUEST['user_id']))$user_id=$_REQUEST['user_id'];else $user_id=0;
		
		$asmember_options_allgemein=get_option('asmember_options_allgemein');
		$asmember_options_email_from=$asmember_options_allgemein["asmember_options_email_from"];
		$email_headers="From:".$asmember_options_email_from;
    	
    	$user_daten = get_user_by("id",$user_id);
    	$reset_code = get_password_reset_key($user_daten);
    	    					
        $asmember_options_members = get_option('asmember_options_members');          						    
        $asmember_options_members_import_email_betreff = $asmember_options_members["asmember_options_members_import_email_betreff"];
        $asmember_options_members_import_email_text = $asmember_options_members["asmember_options_members_import_email_text"];  			
        //$body=$asmember_options_account['asmember_options_account_text_emai
        $body=$asmember_options_members_import_email_text;
        							
        $password_reset_link=site_url()."/wp-login.php?action=rp&key=".$reset_code."&login=".$user_daten->user_login."\n\n";
        							
	    //Werte austauschen
    	$body=str_replace("%benutzer%",$user_daten->user_login,$body);
        $body=str_replace("%name%",$user_daten->first_name." ".$user_daten->last_name,$body);        							
        $body=str_replace("%password_reset_link%",$password_reset_link,$body);           						
	    //$body=str_replace("\n","<br>",$body);    		
    	
    	wp_mail( sanitize_email($user_daten->user_email), $asmember_options_members_import_email_betreff, $body, $email_headers );
    	   							
		update_user_meta($user_id, '_asmember_account_send_create_msg',0);
		
    	asmemberbasic_members_list::edit_user();
    		
	}
	
	
	function save_user()
	{
		if($_REQUEST["action"]=="Speichern")
		{	
			if(isset($_REQUEST['user_id']))$user_id=$_REQUEST['user_id'];else $user_id=0;
			
			if(isset($_REQUEST['action']))$action=$_REQUEST['action'];else $action="";
			
			if(isset($_POST['asmember_user_active']))$active=sanitize_text_field($_POST['asmember_user_active']);else $active=0;
			update_user_meta( $user_id, 'active', $active );		
				
	
			if(isset($_POST['asmember_account_first_name']))$_asmember_account_first_name=sanitize_text_field($_POST['asmember_account_first_name']);else $_asmember_account_first_name="";
			update_user_meta( $user_id, 'first_name', $_asmember_account_first_name );			
		
		
			if(isset($_POST['asmember_account_last_name']))$_asmember_account_last_name=sanitize_text_field($_POST['asmember_account_last_name']);else $_asmember_account_last_name="";
			update_user_meta( $user_id, 'last_name', $_asmember_account_last_name );
		
		
			if(isset($_POST['asmember_account_anrede']))$_asmember_account_anrede=sanitize_text_field($_POST['asmember_account_anrede']);else $_asmember_account_anrede="";
			update_user_meta( $user_id, '_asmember_account_anrede', $_asmember_account_anrede );
		
			if(isset($_POST['asmember_account_titel']))$_asmember_account_titel=sanitize_text_field($_POST['asmember_account_titel']);else $_asmember_account_titel="";
			update_user_meta( $user_id, '_asmember_account_titel', $_asmember_account_titel );	
		
		if(isset($_POST['asmember_account_funktion']))$_asmember_account_funktion=sanitize_text_field($_POST['asmember_account_funktion']);else $_asmember_account_funktion="";
		update_user_meta( $user_id, '_asmember_account_funktion', $_asmember_account_funktion );			
		
		if(isset($_POST['asmember_account_firma']))$_asmember_account_firma=sanitize_text_field($_POST['asmember_account_firma']);else $_asmember_account_firma="";
		update_user_meta( $user_id, '_asmember_account_firma', $_asmember_account_firma );	
				
		if(isset($_POST['asmember_account_strasse']))	$_asmember_account_strasse=sanitize_text_field($_POST['asmember_account_strasse']);else $_asmember_account_strasse="";
		update_user_meta( $user_id, '_asmember_account_strasse', $_asmember_account_strasse );
		
		
		if(isset($_POST['asmember_account_plz']))		$_asmember_account_plz=sanitize_text_field($_POST['asmember_account_plz']);else $_asmember_account_plz="";
		update_user_meta( $user_id, '_asmember_account_plz',$_asmember_account_plz);
		
		if(isset($_POST['asmember_account_ort']))		$_asmember_account_ort=sanitize_text_field($_POST['asmember_account_ort']);else $_asmember_account_ort="";
		update_user_meta( $user_id, '_asmember_account_ort',$_asmember_account_ort);
		
		if(isset($_POST['asmember_account_land']))		$_asmember_account_land=sanitize_text_field($_POST['asmember_account_land']);else $_asmember_account_land="";
		update_user_meta( $user_id, '_asmember_account_land',$_asmember_account_land);
		
			if(isset($_POST['asmember_account_telefon']))	$_asmember_account_telefon=sanitize_text_field($_POST['asmember_account_telefon']);else $_asmember_account_telefon="";
			update_user_meta( $user_id, '_asmember_account_telefon',$_asmember_account_telefon);
			
		
		if(isset($_POST['asmember_account_mobil']))	$_asmember_account_mobil=sanitize_text_field($_POST['asmember_account_mobil']);else $_asmember_account_mobil="";
		update_user_meta( $user_id, '_asmember_account_mobil',$_asmember_account_mobil);
		
		if(isset($_POST['asmember_account_payment']))			$_asmember_account_payment=sanitize_text_field($_POST['asmember_account_payment']);else $_asmember_account_payment="";
		update_user_meta( $user_id, '_asmember_account_payment',$_asmember_account_payment);
		
		if(isset($_POST['asmember_account_konto_iban']))		$_asmember_account_konto_iban=sanitize_text_field($_POST['asmember_account_konto_iban']);else $_asmember_account_konto_iban="";
		update_user_meta( $user_id, '_asmember_account_konto_iban',$_asmember_account_konto_iban);
		
		if(isset($_POST['asmember_account_konto_bic']))		$_asmember_account_konto_bic=sanitize_text_field($_POST['asmember_account_konto_bic']);else $_asmember_account_konto_bic="";
		update_user_meta( $user_id, '_asmember_account_konto_bic',$_asmember_account_konto_bic);
		
		if(isset($_POST['asmember_account_konto_inhaber']))	$_asmember_account_konto_inhaber=sanitize_text_field($_POST['asmember_account_konto_inhaber']);else $_asmember_account_konto_inhaber="";
		update_user_meta( $user_id, '_asmember_account_konto_inhaber',$_asmember_account_konto_inhaber);
		
		if(isset($_POST['asmember_account_konto_bank']))		$_asmember_account_konto_bank=sanitize_text_field($_POST['asmember_account_konto_bank']);else $_asmember_account_konto_bank="";
		update_user_meta( $user_id, '_asmember_account_konto_bank',$_asmember_account_konto_bank);
		
		
		if(isset($_REQUEST['asmember_account_membership']))$_asmember_account_membership=$_REQUEST['asmember_account_membership'];else $_asmember_account_membership="";
  			if($_asmember_account_membership!="")
  				if(count($_REQUEST['asmember_account_membership'])>0)
  					$_asmember_account_membership=implode(",",$_REQUEST['asmember_account_membership']);else
  					$_asmember_account_membership="";
  		update_user_meta( $user_id,"_asmember_account_membership",",".$_asmember_account_membership.",");
  		
  			
		if(isset($_POST['asmember_account_nummer']))		$_asmember_account_nummer=		sanitize_text_field($_POST['asmember_account_nummer']);else $_asmember_account_nummer=0;
		update_user_meta( $user_id, '_asmember_account_nummer', $_asmember_account_nummer);
		
		if(isset($_POST['asmember_account_mitglied_ab']))	$_asmember_account_mitglied_ab=	sanitize_text_field($_POST['asmember_account_mitglied_ab']);else $_asmember_account_mitglied_ab=0;
		update_user_meta( $user_id, '_asmember_account_mitglied_ab', $_asmember_account_mitglied_ab);
		
		if(isset($_POST['asmember_account_gebdatum']))		$_asmember_account_gebdatum=	sanitize_text_field($_POST['asmember_account_gebdatum']);else $_asmember_account_gabdatum=0;
		update_user_meta( $user_id, '_asmember_account_gebdatum', $_asmember_account_gebdatum);
		
		if(isset($_POST['asmember_user_sektion']))		$_asmember_user_sektion=	$_POST['asmember_user_sektion'];else $_asmember_user_sektion[]=0;
		$_asmember_user_sektion=implode(",",$_asmember_user_sektion);
		update_user_meta($user_id, '_asmember_user_sektion', $_asmember_user_sektion);
		
		/*
		$_asmember_address_id=$_POST['asmember_address_id'];
		if($_asmember_address_id>0)
		{
			update_post_meta($_asmember_address_id,'_asmember_address_user_id',$user_id);
			
			update_post_meta($_asmember_address_id, "_asmember_address_anrede", $_asmember_account_anrede);
			update_post_meta($_asmember_address_id, "_asmember_address_titel", $_asmember_account_titel);
			update_post_meta($_asmember_address_id, "_asmember_address_funktion", $_asmember_account_funktion);
			update_post_meta($_asmember_address_id, "_asmember_address_firma", $_asmember_account_firma);
			
			if($_POST['first_name']!="")update_post_meta($_asmember_address_id, "_asmember_address_vorname", $_POST['first_name']);
			if($_POST['last_name']!="") update_post_meta($_asmember_address_id, "_asmember_address_name", $_POST['last_name']);
			
			update_post_meta($_asmember_address_id, "_asmember_address_strasse", $_asmember_account_strasse);
			update_post_meta($_asmember_address_id, "_asmember_address_plz", $_asmember_account_plz);
			update_post_meta($_asmember_address_id, "_asmember_address_ort", $_asmember_account_ort);
			update_post_meta($_asmember_address_id, "_asmember_address_land", $_asmember_account_land);
			update_post_meta($_asmember_address_id, "_asmember_address_gebdatum", $_asmember_account_gebdatum);
			update_post_meta($_asmember_address_id, "_asmember_address_mitglied_ab", $_asmember_account_mitglied_ab);
			update_post_meta($_asmember_address_id, "_asmember_address_nummer", $_asmember_account_nummer);
			
			if($_POST['email']!="")	update_post_meta($_asmember_address_id, "_asmember_address_email", $_POST['email']);
			if($_POST['url']!="")   update_post_meta($_asmember_address_id, "_asmember_address_url", $_POST['url']);
			update_post_meta($_asmember_address_id, "_asmember_address_telefon", $_asmember_account_telefon);
			update_post_meta($_asmember_address_id, "_asmember_address_mobil", $_asmember_account_mobil);
			
		}else
		{
			if(isset($_REQUEST['asmember_address_new']))
			{
				if($_REQUEST['asmember_address_new']==1)
				{
					if(isset($_REQUEST["_asmember_address_cat_id"]))$_asmember_address_cat_id=$_REQUEST["asmember_address_cat_id"];else $_asmember_address_cat_id=0;
					
					//Address anlegen
					$akt_user=get_user_by('id',$user_id);
					$my_post = array(
  						'post_title'    => $akt_user->first_name." ".$akt_user->last_name,  						
  						'post_status'   => 'publish',  						
  						'post_category' => array(2,0),
  						'post_type'		=> 'asmember_address'
					);
 					$new_post_id=wp_insert_post( $my_post );
 					if($new_post_id>0)
 					{
						update_post_meta($new_post_id, "_asmember_address_vorname", $akt_user->first_name);
						update_post_meta($new_post_id, "_asmember_address_name", 	$akt_user->last_name);
						update_post_meta($new_post_id, "_asmember_address_strasse", $akt_user->_asmember_account_strasse);
						update_post_meta($new_post_id, "_asmember_address_plz", 	$akt_user->_asmember_account_plz);
						update_post_meta($new_post_id, "_asmember_address_ort", 	$akt_user->_asmember_account_ort);
						update_post_meta($new_post_id, "_asmember_address_email", $akt_user->user_email);			
						update_post_meta($new_post_id, "_asmember_address_telefon", $akt_user->_asmember_account_telefon);
						update_post_meta($new_post_id, "_asmember_address_mobil", $akt_user->_asmember_account_mobil);			
						update_post_meta($new_post_id, "_asmember_address_user_id", $akt_user->ID);
						
						//Category einfügen
						global $wpdb;
						$sql="insert into ".$wpdb->prefix."term_relationships (object_id,term_taxonomy_id) values (".$new_post_id.",".$_asmember_address_cat_id.")";
						$wpdb->query($sql);
						
					}
				}	
			}	
		}	
		*/
				
			$url=self_admin_url('admin.php?page=members');
			wp_redirect($url);
		}else
		{
			echo $_REQUEST["action"];
			asmemberbasic_members_list::edit_user();
		}	
	}
	
	
	
	function edit_user()
	{
		
		if(isset($_REQUEST['user_id']))$user_id=$_REQUEST['user_id'];else $user_id=0;			
		$user_daten=get_user_by("id",$user_id);
		?>
				
		
		<div class="wrap">
			<h1 class="wp-heading-inline"><?php echo __("Mitglied bearbeiten","asmember");?></h1>		
			<hr class="wp-header-end">
				
					
				<form action="<?php echo esc_url(self_admin_url('admin.php?page=members'));?>" method="post" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">
    	
    		
				<div id="poststuff">
				
				<div class="postbox">					
					<h2 class="hndle ui-sortable-handle is-non-sortable"><span><?php echo __("Pers&ouml;nliche Information","asmember");?></span></h2>
					<div class="inside">
						
						<div class="asfirms-user-edit-entry">						

							<div class="row">
							
								<div class="col-md-6">
														
        						<table class="form-table">
        						<tbody>
        					
        						<tr>
        							<th scope="row"><label for="asmember_account_anrede"><?php echo __("Anrede:","asmember");?></label></th>
        							<td>
        								<select name="asmember_account_anrede" id="asmember_account_anrede">
        									<option value="Herr"<?php if($user_daten->anrede=="Herr")echo " selected";?>><?php echo __("Herr","asmember");?></option>
        									<option value="Frau"<?php if($user_daten->anrede=="Frau")echo " selected";?>><?php echo __("Frau","asmember");?></option>
        								</select>
        							</td>
        						</tr>	
        								
        						<tr>
        							<th scope="row"><label for="asmember_account_titel"><?php echo __("Titel:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_titel" name="asmember_account_titel" value="<?php echo $user_daten->titel;?>" size="20"/>        								
        							</td>
        						</tr>
        						
        						<tr>
        							<th scope="row"><label for="asmember_account_first_name"><?php echo __("Vorname:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_first_name" name="asmember_account_first_name" value="<?php echo $user_daten->first_name;?>" size="60"/>        								
        							</td>
        						</tr>
        					
        						<tr>
        							<th scope="row"><label for="asmember_account_last_name"><?php echo __("Nachname:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_last_name" name="asmember_account_last_name" value="<?php echo $user_daten->last_name;?>" size="60"/>        								
        							</td>
        						</tr>
        						
        						<tr>
        							<th scope="row"><label for="asmember_account_firma"><?php echo __("Firma:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_firma" name="asmember_account_firma" value="<?php echo $user_daten->_asmember_account_firma;?>" size="60"/>        								
        							</td>
        						</tr>
        						<tr>
        							<th scope="row"><label for="asmember_account_funktion"><?php echo __("Funktion:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_funktion" name="asmember_account_funktion" value="<?php echo $user_daten->_asmember_account_funktion;?>" size="60"/>        								
        							</td>
        						</tr>
        						
        						<tr>
        							<th scope="row"><label for="asmember_account_strasse"><?php echo __("Stra&szlig;e:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_strasse" name="asmember_account_strasse" value="<?php echo $user_daten->_asmember_account_strasse;?>" size="60"/>        								
        							</td>
        						</tr>
        						
        						<tr>
        							<th scope="row"><label for="asmember_account_plz"><?php echo __("PLZ:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_plz" name="asmember_account_plz" value="<?php echo $user_daten->_asmember_account_plz;?>" size="60"/>        								
        							</td>
        						</tr>
        					
        						<tr>
        							<th scope="row"><label for="asmember_account_ort"><?php echo __("Ort:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_ort" name="asmember_account_ort" value="<?php echo $user_daten->_asmember_account_ort;?>" size="60"/>        								
        							</td>
        						</tr>
        						
        						
        					
        						</table>
        						</div>
        						
        						<div class="col-md-6">
														
        						<table class="form-table">
        						<tbody>
        					
        						<tr>
        							<th scope="row"><label for="asmember_account_email"><?php echo __("Email:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_email" name="asmember_account_email" value="<?php echo $user_daten->user_email;?>" size="60"/>        								
        							</td>
        						</tr>		
        						
        						<tr>
        							<th scope="row"><label for="asmember_account_benutzer"><?php echo __("Benutzer:","asmember");?></label></th>
        							<td>        								
        								<input type="text" id="asmember_account_benutzer" name="asmember_account_benutzer" value="<?php echo $user_daten->user_login;?>" size="60" readonly/>        								
        							</td>
        						</tr>	
        						
        						
        						<tr>
									<th><label for="_asmember_account_telefon"><?php _e('Telefon','asmember');?></label></th>
									<td>
										<input type="text" name="asmember_account_telefon" id="asmember_account_telefon" value="<?php echo $user_daten->_asmember_account_telefon;?>" class="regular_text"/><br/>
									</td>
								</tr>
		
								<tr>
									<th><label for="_asmember_account_mobil"><?php _e('Mobil','asmember');?></label></th>
									<td>
										<input type="text" name="asmember_account_mobil" id="asmember_account_mobil" value="<?php echo $user_daten->_asmember_account_mobil;?>" class="regular_text"/><br/>
									</td>
								</tr>
		
								<tr>
									<th><label for="_asmember_account_gebdatum"><?php _e('Geburtsdatum','asmember');?></label></th>
									<td>
										<input type="date" name="asmember_account_gebdatum" id="asmember-account-gebdatum" value="<?php echo $user_daten->_asmember_account_gebdatum;?>"/></p>	
									</td>
								</tr>
		
		
        						</table>
        						</div>
        						
        						
        					</div>
        				</div>
        			</div>
        		</div>
        		
        		
        		<div class="postbox">					
					<h2 class="hndle ui-sortable-handle is-non-sortable"><span><?php echo _e("Optionen","asmember");?></span></h2>
					<div class="inside">
						
						<div class="asfirms-user-edit-entry">
		
							<div class="row">
							
							<div class="col-md-6">

        						<table class="form-table">
        						<tbody>		
        					
        						<tr>
        							<th><label for="active"><?php _e("aktiviert"); ?></label></th>
        							<td>
            							
            	
            							<select name="asmember_user_active">
            							<option value="1" <?php if($user_daten->active==1)echo " selected";?>><?php echo _e('Ja','asmember');?></option>
            							<option value="0" <?php if($user_daten->active==0)echo " selected";?>><?php echo _e('Nein','verein');?></option>
            							</select>  
            							
            							
            							
            	
            							
            	
            	         		            
        							</td>
    							</tr>
    	
    							<tr>
    								<th><label for="asmember_user_active_user"><?php echo _e("Aktiviert durch User:","asmember");?></label></th>
    								<td>
    									<?php
    									if($user_daten->active_user==1)
    									{
    										echo _e("Ja","asmember");
    										?>
    										&nbsp;&nbsp;&nbsp;
    										<input type="checkbox" name="asmember_user_active_send_mail" value="1"><?php echo _e("EMail-Benachrichtigung f&uuml;r Aktivierung senden","asmember");?></input>
    			
    										<?php
										}	else echo _e("Nein","asmember");
    									?>
    								</td>
    							</tr>
    	
    	
    	
        						
		
		
								<tr>
									<th><label for="asmember_account_membership"><?php echo _e("Mitgliedschaft:","asmember");?></label></th>
									<td>
									<div>
  						
  			  			
									<?php
									$_asmember_account_membership=explode(",",$user_daten->_asmember_account_membership);
					
									global $wpdb;
									$sql="select * from ".$wpdb->prefix."posts where post_status='publish' and post_type='asmember_memberships'";
									$results=$wpdb->get_results($sql);
									foreach($results as $item)
									{
										echo "<input type=\"checkbox\" name=\"asmember_account_membership[]\" value=\"".$item->ID."\"";
										if(in_array($item->ID,$_asmember_account_membership))echo " checked";
										echo ">".$item->post_title."</input><br>\n";
									}				
									?>				
  		
  									</div>				
				
									</td>
								</tr>
		
		
		
								
        		
        						</tbody>
        	
	        					</table>        
	        				</div>
	        				<div class="col-md-6">
	        						        					
	        					<table class="form-table">
        						<tbody>
        						
        						<tr>
									<th><label for="asmember_account_payment"><?php echo _e("Zahlungsweise:","asmember");?></label></th>
									<td>
										<select name="asmember_account_payment" id="asmember_account_payment">
											<option value=""><?php echo _e("Keine Auswahl","asmember");?></option>
											<option value="paypal" <?php if($user_daten->_asmember_account_payment=="paypal")echo " selected";?>><?php echo _e("Paypal","asmember");?></option>
											<option value="paypal" <?php if($user_daten->_asmember_account_payment=="bank")echo " selected";?>><?php echo _e("&Uuml;berweisung","asmember");?></option>
											<option value="paypal" <?php if($user_daten->_asmember_account_payment=="lastschrift")echo " selected";?>><?php echo _e("Lastschrift","asmember");?></option>
										</select>
									</td>
								</tr>
		
								<tr>
									<th><label for="asmember_account_konto_paypal_email"><?php _e('Paypal-EMail', 'asmember'); ?></label></th>
									<td>
										<input type="text" name="asmember_account_konto_paypal_email" id="asmember_account_konto_paypal_email" value="<?php echo $user_daten->_asmember_account_konto_paypal_email;?>" class="regular-text" /><br />
									</td>
								</tr>
		
								<tr>
									<th><label for="asmember_account_konto_iban"><?php _e('IBAN', 'asmember'); ?></label></th>
									<td>
										<input type="text" name="asmember_account_konto_iban" id="asmember_account_konto_iban" value="<?php echo $user_daten->_asmember_account_konto_iban;?>" class="regular-text" /><br />
									</td>
								</tr>
		
								<tr>
									<th><label for="asmember_account_konto_iban"><?php _e('BIC', 'asmember'); ?></label></th>
									<td>
										<input type="text" name="asmember_account_konto_bic" id="asmember_account_konto_bic" value="<?php echo $user_daten->_asmember_account_konto_bic;?>" class="regular-text" /><br />				
									</td>
								</tr>
		
								<tr>
									<th><label for="_asmember_account_konto_inhaber"><?php _e('Kontoinhaber', 'asmember'); ?></label></th>
									<td>
										<input type="text" name="asmember_account_konto_inhaber" id="asmember_account_konto_inhaber" value="<?php echo $user_daten->_asmember_account_konto_inhaber;?>" class="regular-text" /><br />
									</td>
								</tr>
		
								<tr>
									<th><label for="_asmember_account_konto_bank"><?php _e('Bank', 'asmember'); ?></label></th>
									<td>
										<input type="text" name="asmember_account_konto_bank" id="asmember_account_konto_bank" value="<?php echo $user_daten->_asmember_account_konto_bank;?>" class="regular-text" /><br />				
									</td>
								</tr>
        						
        						</table>
	        					
	        				</div>
	        			</div>	
	        				
       	
       				</div>
        		</div>
        	</div>
        		
        	
        				
        											
        	<div class="postbox">									
				<div class="inside">
										
       						<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
       						<input type="hidden" name="asmember_action" value="save">
       						<input type="submit" name="action" class="btn btn-primary button-large pull-right" value="<?php echo _e("Speichern","asmember");?>"/>			           		
           					<input type="submit" name="action_cancel" class="btn btn-primary pull-right" value="<?php echo _e("Abbrechen","asmember");?>"/>
           					<div class="clearfix"></div>                
       				
				</div>
			</div>
			</form>
			
			
		
    		
    		
        	
	    	<?php
    		if($user_id>0 and $user_daten->_asmember_account_send_create_msg==1)
    		{
				
				$asmember_options_members = get_option('asmember_options_members');          						    
        		$asmember_options_members_import_email_betreff = $asmember_options_members["asmember_options_members_import_email_betreff"];
        		$asmember_options_members_import_email_text = $asmember_options_members["asmember_options_members_import_email_text"];  			
        		
        							
        							
				?>
	
			
				<form action="<?php echo esc_url(self_admin_url('admin.php?page=wp_list_table_class'));?>" method="post" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">
    			<div id="poststuff">
    				<div class="postbox">					
						<h2 class="hndle ui-sortable-handle is-non-sortable"><span><?php echo _e("Zugangsdaten senden","asmember");?></span></h2>
						<div class="inside">
                
        				<table class="form-table">
        				<tbody>
        				<tr>
        					<th scope="row"><?php echo _e("Email an:","asmember");?></th>
        					<td>
        						<label for="asmember_payment_email_email">
        						<input type="text" name="asmember_payment_email_email" size="50" value="<?php echo $user_daten->user_email;?>"/>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row"><?php echo _e("Betreff:","asmember");?></th>
        					<td>
        						<label for="asmember_payment_email_betreff">
        						<input type="text" name="asmember_options_members_import_email_betreff" size="50" value="<?php echo $asmember_options_members_import_email_betreff;?>"/>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row"><?php echo _e("Text:","asmember");?></th>
        					<td>
        						<label for="asmember_payment_email_text">
        						<textarea id="asmember_options_members_import_email_text" cols="60" rows="8" name="asmember_options_members_import_email_text"><?php echo $asmember_options_members_import_email_text;?></textarea>	
        						</label>
        					</td>
        				</tr>
        		
        				
        		
        				<tr>
        					<th scope="row">&nbsp;</th>
        					<td>
        						<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
       							<input type="hidden" name="asmember_action" value="user_account_email">       			
           						<input type="submit" name="action" class="btn btn-primary pull-right" value="<?php echo _e("Senden","asmember");?>"/>		
        					</td>
        				</tr>
        				</tbody>        	
        				</table>
        				</div>
        			</div>
        		</div>		
        	        	
    			</form>  
    		
				<?php
			}  

    		if($id>0)
    		{
				?>
				
    			
    			<form action="<?php echo esc_url(add_query_arg(urlencode(wp_unslash($_SERVER['REQUEST_URI'])),self_admin_url('admin.php?page=asmember_payment')));?>" method="post" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">
    			
                <div id="poststuff">
					
					<div class="postbox">					
						<h2 class="hndle ui-sortable-handle is-non-sortable"><span><?php echo _e("Quittung:","asmember");?></span></h2>
						<div class="inside">
						
        				<table class="form-table">
        				<tbody>
        				<tr>
							<th scope="row"><?php echo _e("Text:","asmember");?></th>
							<td>						
               					<textarea name="asmember_payment_quittung" cols="80" rows="10"><?php echo $asmember_payment_quittung;?></textarea>	
							</td>
						</tr>       					
						<tr>
							<th scope="row">&nbsp;</th>
							<td>
								<input type="hidden" name="id" value="<?php echo $id;?>">
       							<input type="hidden" name="asmember_action" value="save_payment_quittung">
       							<input type="submit" name="action" class="btn btn-primary pluu-right" value="<?php echo _e("Speichern","asmember");?>"/>
           						<input type="submit" name="action" class="btn btn-primary pull-right" value="<?php echo _e("Quittung erstellen","asmember");?>"/>	
           						<input type="submit" name="action" class="btn btn-primary pull-right" value="<?php echo _e("Als Email senden","asmember");?>"/>
							</td>
						</tr>				
						</tbody>
						</table>
						</div>
					</div>
				</div>
			
        
    			</form>
    			<?php  
    		}
    		?>
    	
    	</div>
    	
    	<?php
			
	}
	
	
	/**
	 * Retrieve customers data from the database
	 *
	 * @param int $per_page
	 * @param int $page_number
	 *
	 * @return mixed
	 */
	public static function get_members( $per_page = 10, $page_number = 1 ) {

		global $wpdb;

		
		if(isset($_REQUEST["asmember_members_search_membership"]))$asmember_members_search_membership=$_REQUEST["asmember_members_search_membership"];else $asmember_members_search_membership=0;
		if(isset($_REQUEST["asmember_members_search_s"]))$asmember_members_search_s=$_REQUEST["asmember_members_search_s"];else $asmember_members_search_s="";
				
		$meta_query['relation'] = 'AND';
		if($asmember_members_search_membership>0)
		$meta_query[]=array('key' => '_asmember_account_membership',
                		'value' => ",".$asmember_members_search_membership.",",
                		'compare' => "like");
		
		
		if($asmember_members_search_s!="")
		$meta_query[]=array('key' => 'last_name',
                		'value' => $asmember_members_search_s,
                		'compare' => "like");
        
                		
		$args = array(
	
			'orderby'      => 'login',
			'order'        => 'ASC',
			'offset'       => ( $page_number - 1 ) * $per_page,			
			'number'       => $per_page,
			'count_total'  => false,
			'meta_query'   => $meta_query,            
 			); 
 
 
 
		$result = get_users($args);
		
		return $result;
	}


	/**
	 * Delete a customer record.
	 *
	 * @param int $id customer ID
	 */
	public static function delete_member( $id ) {
		global $wpdb;

		$wpdb->delete(
			"{$wpdb->prefix}users",
			[ 'ID' => $id ],
			[ '%d' ]
		);
	}


	/**
	 * Returns the count of records in the database.
	 *
	 * @return null|string
	 */
	public static function record_count() {
		global $wpdb;

		//$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}users";

		if(isset($_REQUEST["asmember_members_search_membership"]))$asmember_members_search_membership=$_REQUEST["asmember_members_search_membership"];else $asmember_members_search_membership=0;
		if(isset($_REQUEST["asmember_members_search_s"]))$asmember_members_search_s=$_REQUEST["asmember_members_search_s"];else $asmember_members_search_s="";
				
		$meta_query['relation'] = 'AND';
		if($asmember_members_search_membership>0)
		$meta_query[]=array('key' => '_asmember_account_membership',
                		'value' => ",".$asmember_members_search_membership.",",
                		'compare' => "like");
		
		
		if($asmember_members_search_s!="")
		$meta_query[]=array('key' => 'last_name',
                		'value' => $asmember_members_search_s,
                		'compare' => "like");
                		
        
		$args = array(
	
			'orderby'      => 'login',
			'order'        => 'ASC',
			'offset'       => ( $page_number - 1 ) * $per_page,			
			'number'       => -1,
			'count_total'  => false,
			'meta_query'   => $meta_query,
            	
 			); 
 
 
		$result = get_users($args);		
		return count($result);
		//return $wpdb->get_var( $sql );
	}


	/** Text displayed when no customer data is available */
	public function no_items() {
		_e( 'Keine Mitglieder vorhanden', 'asmember' );
	}


	/**
	 * Render a column when no column specific method exist.
	 *
	 * @param array $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'display_name':				
				return sprintf(' <a href="%s">%s</a>',esc_url(add_query_arg('wp_http_referer',urlencode(wp_unslash($_SERVER['REQUEST_URI'])),self_admin_url('user-edit.php?user_id=' . $item->ID))    ),__($item->first_name . " " . $item->last_name));
			case 'action':				
				return sprintf('<a href="%s">%s</a>',esc_url(self_admin_url('admin.php?page=members&asmember_action=edit&user_id=' . $item->ID)),__('Bearbeiten','asmember'));
			case 'user_email':
				return $item->user_email;			
			case '_asmember_account_membership':
			{
				/*
				if(trim($item->_asmember_account_membership,',')!="")
				{					
					$args = array(
  						'numberposts' => -1,
  						'post_type'   => 'asmember_memberships',
  						'include'	=>	trim($item->_asmember_account_membership,',')
  						); 
					$temp_posts = get_posts( $args );
					$ret_string="";
					foreach($temp_posts as $item)
					{
						$ret_string.=",".$item->post_title;
					}
					return substr($ret_string,1);
				}else return "";	
				*/
				
				global $wpdb;
				$sql="select * from ".$wpdb->prefix."_asmember_bookings";
				$results = $wpdb->get_results($sql);
				if(count($results)>0)
				{
					return "Mitgliedschaften vorhanden";
				}else return "Keine Mitgliedschaften";
				
			}
				
			default:
				return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}

	/**
	 * Render the bulk edit checkbox
	 *
	 * @param array $item
	 *
	 * @return string
	 */
	function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="bulk-delete[]" value="%s" />', $item->ID
		);
	}


	/**
	 * Method for name column
	 *
	 * @param array $item an array of DB data
	 *
	 * @return string
	 */
	function column_name( $item ) {

		$delete_nonce = wp_create_nonce( 'asmember_delete_member' );

		$title = '<strong>' . $item['name'] . '</strong>';

		$actions = [
			'delete' => sprintf( '<a href="?page=%s&action=%s&member=%s&_wpnonce=%s">Delete</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['ID'] ), $delete_nonce )
		];

		return $title . $this->row_actions( $actions );
	}


	/**
	 *  Associative array of columns
	 *
	 * @return array
	 */
	function get_columns()
	{
		$columns = [
			'cb'      => '<input type="checkbox" />',
			'display_name'    => __( 'Name', 'asmember' ),			
			'user_email'    => __( 'Email', 'asmember' ),	
			'_asmember_account_membership' => __('Mitgliedschaft','asmember'),					
			'action'    => __( 'Aktion', 'asmember' ),
		];
		
		if(class_exists( 'asmember_abrechnung_frontend' ))
		{
			$columns['_asmember_kontostand']= __('Kontostand','asmember');
		}
		return $columns;
	}


	/**
	 * Columns to make sortable.
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'display_name' => array( 'name', true ),
			'user_email' => array( 'email', false )
		);

		return $sortable_columns;
	}

	/**
	 * Returns an associative array containing the bulk action
	 *
	 * @return array
	 */
	public function get_bulk_actions() {
		$actions = [
			'bulk-delete' => 'Delete'
		];

		return $actions;
	}


	/**
	 * Handles data query and filter, sorting, and pagination.
	 */
	public function prepare_items() {

		$this->_column_headers = $this->get_column_info();

		/** Process bulk action */
		$this->process_bulk_action();

		$per_page     = $this->get_items_per_page( 'members_per_page', 10 );
		$current_page = $this->get_pagenum();
		$total_items  = self::record_count();

		$this->set_pagination_args( [
			'total_items' => $total_items, //WE have to calculate the total number of items
			'per_page'    => $per_page //WE have to determine how many items to show on a page
		] );

		$this->items = self::get_members( $per_page, $current_page );
	}

	public function process_bulk_action() {

		//Detect when a bulk action is being triggered...
		if ( 'delete' === $this->current_action() ) {

			// In our file that handles the request, verify the nonce.
			$nonce = esc_attr( $_REQUEST['_wpnonce'] );

			if ( ! wp_verify_nonce( $nonce, 'asmember_delete_member' ) ) {
				die( 'Go get a life script kiddies' );
			}
			else {
				self::delete_member( absint( $_GET['member'] ) );

		                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		                // add_query_arg() return the current url
		                wp_redirect( esc_url_raw(add_query_arg()) );
				exit;
			}

		}

		// If the delete bulk action is triggered
		if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
		     || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
		) {

			$delete_ids = esc_sql( $_POST['bulk-delete'] );

			// loop over the array of record IDs and delete them
			foreach ( $delete_ids as $id ) {
				self::delete_member( $id );

			}

			// esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		        // add_query_arg() return the current url
		        wp_redirect( esc_url_raw(add_query_arg()) );
			exit;
		}
	}

}




class class_asmember_mitglieder
{

	// class instance
	static $instance;

	// customer WP_List_Table object
	public $members_obj;

	// class constructor
	public function __construct()
	{
		add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
		add_action( 'admin_menu', [ $this, 'plugin_menu' ],5 );
		
		add_action( 'show_user_profile',array($this,'asmember_add_custom_user_profile_fields'));
		add_action( 'edit_user_profile',array($this,'asmember_add_custom_user_profile_fields'));

		add_action( 'personal_options_update', array($this,'asmember_save_custom_user_profile_fields'));
		add_action( 'edit_user_profile_update', array($this,'asmember_save_custom_user_profile_fields'));
		
		add_action('wp_ajax_asmember-members-payment',array($this,'ajax_asmember_members_payment'));
		
		
	}


	public static function set_screen( $status, $option, $value ) {
		return $value;
	}

	public function plugin_menu() {

		$hook = add_submenu_page(			
			'asmember',
			__('Mitglieder','asmember'),
			__('Mitglieder','asmember'),
			'manage_options',
			'members',
			[ $this, 'plugin_settings_page' ]
		);

		add_action( "load-$hook", [ $this, 'screen_option' ] );

	}


	/**
	 * Plugin settings page
	 */
	public function plugin_settings_page()
	{
		if(isset($_REQUEST["asmember_action"]))$asmember_action=$_REQUEST["asmember_action"];else $asmember_action="list";
		
		if($asmember_action=="edit") $this->members_obj->edit_user();
		if($asmember_action=="save") $this->members_obj->save_user();
		
		if($asmember_action=="user_account_email") 
		{
			$this->members_obj->user_account_email();
			
		}
		
		
		if($asmember_action=="list")
		{			
			?>
			<div class="wrap">
			<h1 class="wp-heading-inline">Mitglieder</h1>
			
			<?php
			echo sprintf('<a href="%s" class="page-title-action">%s</a>',esc_url(self_admin_url('user-new.php')),__("Neu hinzuf&uuml;gen","asmember"));
			?>
			<hr class="wp-header-end">
			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<div class="meta-box-sortables ui-sortable">
							<form method="post">
								<?php
								$this->members_obj->prepare_items();								
								?>
								<p class="search-box">
									<label class="screen-reader-text" for="itelic-search-search-input"><?php echo _e("Suchen:","asmember");?></label>
									<select name="asmember_members_search_membership">
										<option value="0"><?php echo _e("Alle","asmember");?></option>
										<?php
										$args = array(
  											'numberposts' => -1,
  											'post_type'   => 'asmember_memberships',
  											'post_status' => 'publish'
										);
 
										$memberships = get_posts( $args );
										foreach($memberships as $item)
										{
											echo "<option value=\"".$item->ID."\"";
											if($item->ID==$_REQUEST["asmember_members_search_membership"])echo " selected";
											echo ">".$item->post_title."</option>\n";
										}	
										?>
									</select>
									<input type="search" id="asmember-members-search-input" name="asmember_members_search_s" value="<?php echo $_REQUEST["asmember_members_search_s"];?>"/>
									<input type="submit" id="search-submit" class="button" value="<?php echo _e("Suchen","asmember");?>"/></p>								
								<?php
								$this->members_obj->display(); ?>
							</form>
						</div>
					</div>
				</div>
				<br class="clear">
			</div>
			</div>
			<?php
		}	
	}

	/**
	 * Screen options
	 */
	public function screen_option()
	{

		$option = 'per_page';
		$args   = [
			'label'   => __('Mitglieder','asmember'),
			'default' => 10,
			'option'  => 'members_per_page'
		];

		add_screen_option( $option, $args );

		$this->members_obj = new asmember_members_list();
	}


	/** Singleton instance */
	public static function get_instance()
	{
		if ( ! isset( self::$instance ) )
		{
			self::$instance = new self();
		}

		return self::$instance;
	}



	function ajax_asmember_members_payment()
	{
		//echo "Dateilesen gestartet<br>";
		$user_id=sanitize_text_field($_REQUEST["id"]);
		global $wpdb;
		
		$user=get_user_by("id",$user_id);
		
		$user_name=$user->first_name." ".$user->last_name;
		if($user_name!="")$user_name=$user->display_name;
		
		//Memberships holen
		$args = array(
			'posts_per_page'   => 5000,
			'include'			=> explode(",",$user->_asmember_account_membership),
			'post_type'        => 'asmember_memberships',	
			'post_status'      => 'publish',	
			
		);
		$memberships = get_posts( $args );

		foreach($memberships as $membership)
		{
			//echo $membership->ID."<br>";
			
			//Unterscheidung, welcher Period_mode TYPE
			if($membership->_asmember_memberships_betrag>0)
			{
				
				$sql="select * from ".$wpdb->prefix."asmember_payment where user_id=".$user_id." and membership_id=".$membership->ID." and datum_bis>".time();
				
				$result2=$wpdb->get_results($sql);
				if($wpdb->num_rows==0)
				{
					echo _e("Nicht vorhanden.","asmember");echo "<br>";
					//Einfügen
					
					
					if($membership->_asmember_memberships_period_mode==0)
					{
						//Volles Jahr
						echo _e("Volles Jahr","asmember");echo "<br>\n";
						$d=getdate(time());
						$datum_jahr=$d["year"];
						$datum_erstell=mktime(0,0,0,1,1,$d["year"]);
						$datum_bis=mktime(23,59,0,12,31,$d["year"]);	
					}else
					{
						echo _e("Ab Registrierung","asmember");echo "<br>\n";				
					
						$datum_erstell=time();
						if($membership->_asmember_memberships_period==0)
						{
							$datum_bis=0;
						}else
						{
							$d=getdate(time());
							if($membership->_asmember_memberships_period==1)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+1,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==2)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+2,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==3)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+3,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==4)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+4,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==5)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+5,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==6)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+6,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==7)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+7,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==8)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+8,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==9)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+9,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==10)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+10,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==11)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+11,$d["mday"],$d["year"]);
							if($membership->_asmember_memberships_period==12)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+12,$d["mday"],$d["year"]);
						}
					}	
					$payment_time=$membership->_asmember_memberships_payment_time*7;
					$datum_zahlung=$datum_erstell+(60*60*24*$payment_time);
					$membership_id=$membership->ID;
					$paypal_token=time();
					$status=0;
					$asmember_memberships_betrag=		str_replace(",",".",$membership->_asmember_memberships_betrag);
					$asmember_memberships_betrag_mwst=	str_replace(",",".",$membership->_asmember_memberships_betrag_mwst);
					$asmember_memberships_betrag_netto=	str_replace(",",".",$membership->_asmember_memberships_betrag_netto);
					$asmember_memberships_betrag_mwst_satz = $membership->_asmember_memberships_betrag_mwst_satz;
					$asmember_register_payment="bank";
				
					$sql="insert into ".$wpdb->prefix."asmember_payment (user_id,user_name,membership_id,membership,datum_erstell,datum_bis,datum_zahlung,status,payment,betrag,betrag_mwst,betrag_netto,betrag_mwst_satz,paypal_token,jahr) values
						(".$user->ID.",'".$user_name."',".$membership_id.",'".$membership->post_title."',".$datum_erstell.",".$datum_bis.",".$datum_zahlung.",".$status.",'".$asmember_register_payment."',".$asmember_memberships_betrag.",".$asmember_memberships_betrag_mwst.",".$asmember_memberships_betrag_netto.",".$asmember_memberships_betrag_mwst_satz.",".$paypal_token.",'".$datum_jahr."')";
					$result=$wpdb->query($sql);
					if($result)
					{
						$membership_id=$wpdb->insert_id;
						$betreff = "AS-".strftime("%d-%m-%Y",time())."-".$membership_id;
						$sql="update ".$wpdb->prefix."asmember_payment set betreff='".$betreff."' where id=".$membership_id;
						$result=$wpdb->query($sql);
					}else
					{
						echo _e("Fehler: ","asmember");
					}
				}	
			};			
		}
		die();
	}






	function asmember_add_custom_user_profile_fields( $user ) 
	{
		
		$asmember_options_account = get_option("asmember_options_account");
		
		?>
	
	
		<h3><?php esc_html_e("Benutzer-Aktivierung", "asmember"); ?></h3>

    	<table class="form-table">
    	<tr>
        	<th><label for="address"><?php _e("aktiviert","asmember"); ?></label></th>
        	<td>
            	<select name="asmember_user_active">
            		<option value="1"<?php if(get_user_meta( $user->ID, 'active', true )==1)echo " selected";?>><?php echo esc_html_e('Ja','asmember');?></option>
            		<option value="0"<?php if(get_user_meta( $user->ID, 'active', true )==0)echo " selected";?>><?php echo esc_html_e('Nein','asmember');?></option>
            	</select>           
            
        	</td>
    	</tr>
   
   		<tr>
    		<th><label for="asmember_user_active_user"><?php echo _e("Aktiviert durch User:","asmember");?></label></th>
    		<td>
    		<?php
    		if(get_user_meta($user->ID,'active_user',true)==1)
    		{
    			echo _e("ja","asmember");
    			?>
    			&nbsp;&nbsp;&nbsp;
    			<input type="checkbox" name="asmember_user_active_send_mail" value="1"><?php echo _e("EMail-Benachrichtigung f&uuml;r Aktivierung senden","asmember");?></input>
    			
    			<?php
			}	else echo _e("nein","asmember");
    		?>
    		</td>
    	</tr>
    
    	</table>
	
	
		<h3><?php _e('Pers&ouml;nliche Informationen', 'asmember'); ?></h3>
	
		<table class="form-table">
		
		<tr>
			<th>
				<label for="_asmember_account_membership"><?php echo _e("Mitgliedschaft","asmember");?></label>
			</th>
			<td>
				<div>
  						
  			  			
			<?php
			$_asmember_account_membership=explode(",",get_user_meta($user->ID,'_asmember_account_membership',true));
					
			global $wpdb;
			$sql="select * from ".$wpdb->prefix."posts where post_status='publish' and post_type='asmember_memberships'";
			$results=$wpdb->get_results($sql);
			foreach($results as $item)
			{
				echo "<input type=\"checkbox\" name=\"_asmember_account_membership[]\" value=\"".$item->ID."\"";
				if(in_array($item->ID,$_asmember_account_membership))echo " checked";
				echo ">".$item->post_title."</input><br>\n";
			}
				
			?>
		
  				
  		
  				</div>	
				
				
			</td>
		</tr>
		
			
		
		
		<tr>
			<th>
				<label for="_asmember_account_mitglied_ab"><?php _e('Mitglied ab','asmember');?></label>
			</th>
			<td>
				<input type="date" name="_asmember_account_mitglied_ab" id="asmember-account-mitglied-ab-input" value="<?php echo esc_attr( get_user_meta($user->ID,'_asmember_account_mitglied_ab',true));?>"/></p>	
  				
			</td>
		</tr>
		
  		
  		
  		
  		
		<tr>
			<th>
				<label for="_asmember_account_anrede"><?php _e('Anrede', 'asmember'); ?>
			</label></th>
			<td>
				<select name="_asmember_account_anrede" id="_asmember_account_anrede">
					<option value="Herr" <?php if(get_user_meta($user->ID,"_asmember_account_anrede",true)=="Herr")echo " selected";?>><?php echo _e("Herr","asmember");?></option>
					<option value="Frau" <?php if(get_user_meta($user->ID,"_asmember_account_anrede",true)=="Frau")echo " selected";?>><?php echo _e("Frau","asmember");?></option>
				</select>				
			</td>
		</tr>
		
		
		<tr>
			<th>
				<label for="_asmember_account_titel"><?php _e('Titel', 'asmember'); ?>
			</label></th>
			<td>
				<input type="text" name="_asmember_account_titel" id="_asmember_account_titel" value="<?php echo esc_attr( get_user_meta($user->ID,'_asmember_account_titel',true));?>" class="regular-text" /><br />				
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="_asmember_account_firma"><?php _e('Firma','asmember');?></label>
			</th>
			<td>				
				<input type="text" name="_asmember_account_firma" id="_asmember_account_firma" value="<?php echo esc_attr(get_user_meta($user->ID,'_asmember_account_firma',true));?>" class="regular-text" /><br />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="_asmember_account_position"><?php _e('Position','asmember');?></label>
			</th>
			<td>				
				<input type="text" name="_asmember_account_position" id="_asmember_account_position" value="<?php echo esc_attr(get_user_meta($user->ID,'_asmember_account_position',true));?>" class="regular-text" /><br />
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="_asmember_account_strasse"><?php _e('Stra&szlig;e', 'asmember'); ?>
			</label></th>
			<td>
				<input type="text" name="_asmember_account_strasse" id="_asmember_account_strasse" value="<?php echo esc_attr( get_user_meta($user->ID,'_asmember_account_strasse',true));?>" class="regular-text" /><br />				
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="_asmember_account_plz"><?php _e('PLZ','asmember');?></label>
			</th>
			<td>
				<input type="text" name="_asmember_account_plz" id="_asmember_account_plz" value="<?php echo get_user_meta( $user->ID, '_asmember_account_plz',true);?>" class="regular_text"/><br/>
				
			</td>
		</tr>
		<tr>
			<th>
				<label for="_asmember_account_ort"><?php _e('Ort','asmember');?></label>
			</th>
			<td>
				<input type="text" name="_asmember_account_ort" id="_asmember_account_ort" value="<?php echo get_user_meta($user->ID,'_asmember_account_ort',true);?>" class="regular_text"/><br/>
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="_asmember_account_telefon"><?php _e('Telefon','asmember');?></label>
			</th>
			<td>
				<input type="text" name="_asmember_account_telefon" id="_asmember_account_telefon" value="<?php echo get_user_meta($user->ID,'_asmember_account_telefon',true);?>" class="regular_text"/><br/>
			</td>
		</tr>
		
		<tr>
			<th><label for="_asmember_account_mobil"><?php _e('Mobil','asmember');?></label></th>
			<td><input type="text" name="_asmember_account_mobil" id="_asmember_account_mobil" value="<?php echo get_user_meta($user->ID,'_asmember_account_mobil',true);?>" class="regular_text"/><br/></td>
		</tr>
		
		<tr>
			<th><label for="_asmember_account_gebdatum"><?php _e('Geburtsdatum','asmember');?></label></th>
			<td><input type="date" name="_asmember_account_gebdatum" id="asmember-account-gebdatum-input" value="<?php echo esc_attr( get_user_meta($user->ID,'_asmember_account_gebdatum',true));?>"/></p></td>
		</tr>
		
		<tr>
			<th><label for="_asmember_account_ustid"><?php _e('Ust-Id','asmember');?></label></th>
			<td><input type="text" name="_asmember_account_ustid" id="_asmember_account_ustid" value="<?php echo get_user_meta($user->ID,'_asmember_account_ustid',true);?>" class="regular_text"/><br/></td>
		</tr>
		
		
	</table>
	
	
	
	<h3><?php _e('Zahlungs-Informationen', 'asmember'); ?></h3>
	
	<table class="form-table">
		
	
		
		<tr>
			<th>
				<label for="_asmember_account_payment"><?php echo _e("Zahlungsweise","asmember");?></label>
			</th>
			<td>
				<select name="_asmember_account_payment" id="_asmember_account_payment">
					<option value=""><?php echo _e("Keine Auswahl","asmember");?></option>
					<option value="paypal" <?php if(get_user_meta($user->ID,'_asmember_account_payment',true)=="paypal")echo " selected";?>><?php echo _e("Paypal","asmember");?></option>
					<option value="paypal" <?php if(get_user_meta($user->ID,'_asmember_account_payment',true)=="bank")echo " selected";?>><?php echo _e("&Uuml;berweisung","asmember");?></option>
					<option value="paypal" <?php if(get_user_meta($user->ID,'_asmember_account_payment',true)=="lastschrift")echo " selected";?>><?php echo _e("Lastschrift","asmember");?></option>
				</select>
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="_asmember_account_konto_paypal_email"><?php _e('Paypal-EMail', 'asmember'); ?>
			</label></th>
			<td>
				<input type="text" name="_asmember_account_konto_paypal_email" id="_asmember_account_konto_paypal_email" value="<?php echo esc_attr( get_user_meta($user->ID,'_asmember_account_konto_paypal_email',true));?>" class="regular-text" /><br />
				
			</td>
		</tr>
		
		
		<tr>
			<th>
				<label for="_asmember_account_konto_iban"><?php _e('IBAN', 'asmember'); ?>
			</label></th>
			<td>
				<input type="text" name="_asmember_account_konto_iban" id="_asmember_account_konto_iban" value="<?php echo esc_attr( get_user_meta($user->ID,'_asmember_account_konto_iban',true));?>" class="regular-text" /><br />
				
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="_asmember_account_konto_iban"><?php _e('BIC', 'asmember'); ?>
			</label></th>
			<td>
				<input type="text" name="_asmember_account_konto_bic" id="_asmember_account_konto_bic" value="<?php echo esc_attr( get_user_meta($user->ID,'_asmember_account_konto_bic',true));?>" class="regular-text" /><br />
				
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="_asmember_account_konto_inhaber"><?php _e('Kontoinhaber', 'asmember'); ?>
			</label></th>
			<td>
				<input type="text" name="_asmember_account_konto_inhaber" id="_asmember_account_konto_inhaber" value="<?php echo esc_attr( get_user_meta($user->ID,'_asmember_account_konto_inhaber',true));?>" class="regular-text" /><br />
				
			</td>
		</tr>
		
		<tr>
			<th>
				<label for="_asmember_account_konto_bank"><?php _e('Bank', 'asmember'); ?>
			</label></th>
			<td>
				<input type="text" name="_asmember_account_konto_bank" id="_asmember_account_konto_bank" value="<?php echo esc_attr( get_user_meta($user->ID,'_asmember_account_konto_bank',true));?>" class="regular-text" /><br />
				
			</td>
		</tr>
		
		
  	</table>	
    
    
    <h3><?php esc_html_e("Benachrichtigung Zugangsdaten", "asmember"); ?></h3>

   	<table class="form-table">
   	<tr>
        <th><label for="create_msg"><?php _e("Nachricht noch nicht gesandt:","asmember"); ?></label></th>
        <td>
        	<?php
        	if(get_user_meta( $user->ID, '_asmember_account_send_create_msg', true )==1)echo _e("Ja","asmember");else echo _e("Nein","asmember");
        	?>
        </td>
    </tr> 
    <tr>
    	<th><label for="create_msg"><?php _e("EMail senden:","asmember"); ?></label></th>
    
        <td>
            <input name="_asmember_account_send_create_msg_send" type="checkbox" value="1"><?php echo _e("Nachricht senden","asmember");?></input>
        </td>
    </tr>
    
   	</table>
    	
    	
	<?php
	}




	function asmember_save_custom_user_profile_fields( $user_id )
	{
	
		if ( !current_user_can( 'edit_user', $user_id ) )return FALSE;
			
		if(isset($_POST['asmember_user_active']))$active=sanitize_text_field($_POST['asmember_user_active']);else $active=0;
		update_user_meta( $user_id, 'active', $active );		
		
		
		if($_REQUEST["asmember_user_active_send_mail"]==1 and $_POST['asmember_user_active']==1)	
		{
			$user_data=get_user_by("id",$user_id);
		
			$asmember_options_account=get_option("asmember_options_account");
		
			//Werte austauschen
			$body=$asmember_options_account['asmember_options_account_text_email_active_admin'];
		
        	$body=str_replace("%benutzer%",$user_data->user_login,$body);
        	$body=str_replace("%vorname%",$user_data->first_name,$body);
        	$body=str_replace("%name%",$user_data->last_name,$body);
        			
			//$body=str_replace("\n","<br>",$body);
			$email_headers="From: ".$asmember_options_account['asmember_options_account_email_from_active_admin'];
        	wp_mail( sanitize_email($user_data->user_email), $asmember_options_account['asmember_options_account_text_betreff_active_admin'], $body, $email_headers );
          			
    			
		}
	
		if($_REQUEST["_asmember_account_send_create_msg_send"]==1 and $_POST['asmember_user_active']==1)	
		{
			
          	$user_data=get_user_by("id",$user_id);
          	$reset_code = get_password_reset_key(get_user_by("id",$user_id));
    	    					
        	$asmember_options_members = get_option('asmember_options_members');          						    
        	$asmember_options_members_import_email_betreff = $asmember_options_members["asmember_options_members_import_email_betreff"];
        	$asmember_options_members_import_email_text = $asmember_options_members["asmember_options_members_import_email_text"];  			
        							//$body=$asmember_options_account['asmember_options_account_text_emai
        	$body=$asmember_options_members_import_email_text;
        							
        	$password_reset_link=site_url()."/wp-login.php?action=rp&key=".$reset_code."&login=".$user_data->user_login."\n\n";
        	$password_reset_link_html="<a href=\"".$password_reset_link."\">".$password_reset_link."</a>";
	        //Werte austauschen
    	    $body=str_replace("%benutzer%",$user_data->user_login,$body);
        	$body=str_replace("%name%",$user_data->first_name." ".$user_data->last_name,$body);
        							
        	$body=str_replace("%password_reset_link%",$password_reset_link_html,$body);   
        						
	        //$body=str_replace("\n","<br>",$body);     		
    	    wp_mail( sanitize_email($user_data->user_email), "Ihr Benutzer-Account", $body, $email_headers );
    	   	
		}
		
		
	
	
	
	
		if(isset($_POST['_asmember_account_anrede']))$_asmember_account_anrede=sanitize_text_field($_POST['_asmember_account_anrede']);else $_asmember_account_anrede="";
		if(isset($_POST['_asmember_account_titel']))$_asmember_account_titel=sanitize_text_field($_POST['_asmember_account_titel']);else $_asmember_account_titel="";
		if(isset($_POST['_asmember_account_position']))$_asmember_account_position=sanitize_text_field($_POST['_asmember_account_position']);else $_asmember_account_position="";		
		if(isset($_POST['_asmember_account_firma']))$_asmember_account_firma=sanitize_text_field($_POST['_asmember_account_firma']);else $_asmember_account_firma="";
		
				
		if(isset($_POST['_asmember_account_strasse']))	$_asmember_account_strasse=sanitize_text_field($_POST['_asmember_account_strasse']);else $_asmember_account_strasse="";
		if(isset($_POST['_asmember_account_plz']))		$_asmember_account_plz=sanitize_text_field($_POST['_asmember_account_plz']);else $_asmember_account_plz="";
		if(isset($_POST['_asmember_account_ort']))		$_asmember_account_ort=sanitize_text_field($_POST['_asmember_account_ort']);else $_asmember_account_ort="";
		if(isset($_POST['_asmember_account_land']))		$_asmember_account_land=sanitize_text_field($_POST['_asmember_account_land']);else $_asmember_account_land="";
		if(isset($_POST['_asmember_account_telefon']))	$_asmember_account_telefon=sanitize_text_field($_POST['_asmember_account_telefon']);else $_asmember_account_telefon="";
		if(isset($_POST['_asmember_account_mobil']))	$_asmember_account_mobil=sanitize_text_field($_POST['_asmember_account_mobil']);else $_asmember_account_mobil="";		
		if(isset($_POST['_asmember_account_ustid']))		$_asmember_account_ustid=sanitize_text_field($_POST['_asmember_account_ustid']);else $_asmember_account_ustid="";
		
		if(isset($_POST['_asmember_account_payment']))			$_asmember_account_payment=sanitize_text_field($_POST['_asmember_account_payment']);else $_asmember_account_payment="";
		if(isset($_POST['_asmember_account_konto_iban']))		$_asmember_account_konto_iban=sanitize_text_field($_POST['_asmember_account_konto_iban']);else $_asmember_account_konto_iban="";
		if(isset($_POST['_asmember_account_konto_bic']))		$_asmember_account_konto_bic=sanitize_text_field($_POST['_asmember_account_konto_bic']);else $_asmember_account_konto_bic="";
		if(isset($_POST['_asmember_account_konto_inhaber']))	$_asmember_account_konto_inhaber=sanitize_text_field($_POST['_asmember_account_konto_inhaber']);else $_asmember_account_konto_inhaber="";
		if(isset($_POST['_asmember_account_konto_bank']))		$_asmember_account_konto_bank=sanitize_text_field($_POST['_asmember_account_konto_bank']);else $_asmember_account_konto_bank="";
		
		//if(isset($_POST['_asmember_account_membership']))$_asmember_account_membership=sanitize_text_field($_POST['_asmember_account_membership']);else $_asmember_account_membership=0;
		
		
		if(isset($_REQUEST['_asmember_account_membership']))$_asmember_account_membership=$_REQUEST['_asmember_account_membership'];else $_asmember_account_membership="";
  			if($_asmember_account_membership!="")
  				if(count($_REQUEST['_asmember_account_membership'])>0)
  					$_asmember_account_membership=implode(",",$_REQUEST['_asmember_account_membership']);else
  					$_asmember_account_membership="";
  		update_user_meta( $user_id,"_asmember_account_membership",$_asmember_account_membership);
  			
		if(isset($_POST['_asmember_account_mitglied_ab']))	$_asmember_account_mitglied_ab=	sanitize_text_field($_POST['_asmember_account_mitglied_ab']);else $_asmember_account_mitglied_ab=0;
		if(isset($_POST['_asmember_account_gebdatum']))		$_asmember_account_gebdatum=	sanitize_text_field($_POST['_asmember_account_gebdatum']);else $_asmember_account_gabdatum=0;
		
		
		update_user_meta( $user_id, '_asmember_account_anrede', $_asmember_account_anrede );
		update_user_meta( $user_id, '_asmember_account_titel', $_asmember_account_titel );	
		
		update_user_meta( $user_id, '_asmember_account_firma', $_asmember_account_firma );	
		update_user_meta( $user_id, '_asmember_account_position', $_asmember_account_position );		
		update_user_meta( $user_id, '_asmember_account_strasse', $_asmember_account_strasse );
		update_user_meta( $user_id, '_asmember_account_plz',$_asmember_account_plz);
		update_user_meta( $user_id, '_asmember_account_ort',$_asmember_account_ort);
		update_user_meta( $user_id, '_asmember_account_land',$_asmember_account_land);
		update_user_meta( $user_id, '_asmember_account_telefon',$_asmember_account_telefon);
		update_user_meta( $user_id, '_asmember_account_mobil',$_asmember_account_mobil);
		update_user_meta( $user_id, '_asmember_account_ustid',$_asmember_account_ustid);
		
		update_user_meta( $user_id, '_asmember_account_payment',$_asmember_account_payment);
		update_user_meta( $user_id, '_asmember_account_konto_iban',$_asmember_account_konto_iban);
		update_user_meta( $user_id, '_asmember_account_konto_bic',$_asmember_account_konto_bic);
		update_user_meta( $user_id, '_asmember_account_konto_inhaber',$_asmember_account_konto_inhaber);
		update_user_meta( $user_id, '_asmember_account_konto_bank',$_asmember_account_konto_bank);
	
		
		update_user_meta( $user_id, '_asmember_account_mitglied_ab', $_asmember_account_mitglied_ab);
		update_user_meta( $user_id, '_asmember_account_gebdatum', $_asmember_account_gebdatum);
		
		
		


		
	
	}
	
}

class_asmember_mitglieder::get_instance();