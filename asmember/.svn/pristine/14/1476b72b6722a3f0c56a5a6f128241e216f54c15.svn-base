<?php



class asmember_newsletter_admin
{

	public function __construct()
	{
		add_action('init',array($this,'post_type_asmember_newsletter'));		
		add_action("admin_init",array($this,'asmember_newsletter_metainit'));
		add_action('save_post', array($this,'asmember_newsletter_save_details'));
				
		
		add_action('wp_ajax_asmember-newsletter-test',array($this,'ajax_asmember_newsletter_test'));
		add_action('wp_ajax_asmember-newsletter-send-new',array($this,'ajax_asmember_newsletter_send_new'));
		add_action('wp_ajax_asmember-newsletter-send-step',array($this,'ajax_asmember_newsletter_send_step'));
		add_action('wp_ajax_asmember-newsletter-send-end',array($this,'ajax_asmember_newsletter_send_end'));
		
	}
		
		
	function post_type_asmember_newsletter()
	{
    	register_post_type(

               'asmember_newsletter',
                array(
                    'label' => __('Newsletter'),
                    'public' => false,
					'exclude_from_search'=>true,
					'publicly_queryable'=>true,
					'show_in_menu'=>false,
					'show_in_nav_menus'=>true,
                    'show_ui' => true,
                    'supports' => array('title','editor'),
                    'has_archive' => false
                    )
                );
     		

	}



	function asmember_newsletter_metainit()
	{
		if(isset($_REQUEST["show_protokoll"]))$show_protokoll="yes";else $show_protokoll="no";
		
		
		add_meta_box("asmember_newsletter_test_option",__("Test-Versand","asmember"),array($this,"asmember_newsletter_test_meta_option"),"asmember_newsletter","side");
		add_meta_box("asmember_newsletter_send_option",__("Versand","asmember"),array($this,"asmember_newsletter_send_meta_option"),"asmember_newsletter","side");
		add_meta_box("asmember_newsletter_send_manuell",__("Manueller Versand","asmember"),array($this,"asmember_newsletter_send_meta_manuell"),"asmember_newsletter","side");
		//add_meta_box("asmember_newsletter_meta_empfaenger",__("Empf&auml;nger","asmember"),array($this,"asmember_newsletter_meta_empfaenger"),"asmember_newsletter","side");
		
		if($show_protokoll=="yes") add_meta_box("asmember_newsletter_meta_protokoll", __("Versand-Protokoll","asmember"), array($this,"asmember_newsletter_meta_protokoll"), "asmember_newsletter", "normal", "high");
		add_meta_box("asmember_newsletter_meta_options", __("Optionen","asmember"), array($this,"asmember_newsletter_meta_options"), "asmember_newsletter", "normal", "high");
  		
	}


	function asmember_newsletter_test_meta_option()
	{
  		global $post;
		?>
  		<p><label><?php echo __("E-Mail:","asmember");?></label><br/>
  		<input type="text" name="asmember_newsletter_test_email" id="asmember-newsletter-test-email" size="30" value="<?php echo get_option( 'admin_email' );?>"/>
  		<input type="hidden" name="asmember_newsletter_test_id" id="asmember-newsletter-test-id" value="<?php echo $post->ID;?>"/>
  		</p>  		
		<p><a id="asmember-newsletter-test-button" class="page-title-action"><?php echo __("Senden","asmember");?></a></p>
 		<?php 
	}
	
	
	function asmember_newsletter_send_meta_option()
	{
  		global $post;
  		global $wp;
  		global $wp_query;

  		$custom = get_post_custom($post->ID);  	
  		if(isset($custom["_asmember_newsletter_send_anzahl"][0])) $_asmember_newsletter_send_anzahl = $custom["_asmember_newsletter_send_anzahl"][0];else $_asmember_newsletter_send_anzahl=0;
  		if(isset($custom["_asmember_newsletter_send_time"][0])) $_asmember_newsletter_send_time = $custom["_asmember_newsletter_send_time"][0];else $_asmember_newsletter_send_time=0;
		?>
  	 	<style>
		.button-asmember-newsletter-send
		{
			width:90%;
			margin:auto;
			border:solid 1px #afafaf;
			background-color:#dfdfdf;
			padding:10px;
			color:#000;
			height:25px;
			display:block;
			text-align:center;
			cursor:pointer;
		}		
		</style>	
  		<input type="hidden" name="asmember_newsletter_send_id" id="asmember-newsletter-send-id" value="<?php echo $post->ID;?>"/>
  		<input type="hidden" name="asmember_newsletter_pause" id="asmember-newsletter-pause" value="<?php echo $post->_asmember_newsletter_pause;?>"/>
  		<p><label><?php echo __("Letzer Versand:","asmember");?><br></label>
  		<?php
  		if($_asmember_newsletter_send_time>0)echo strftime("%d.%m.%Y %H:%M Uhr",$_asmember_newsletter_send_time);
  		?>
  		</p>
		<p><?php echo __("Gesendete Mails:","asmember");?> <?php echo $_asmember_newsletter_send_anzahl;?></p>
		<p><a id="asmember-newsletter-send-button" class="page-title-action sbutton-asmember-newsletter-send"><?php echo __("Jetzt Senden","asmember");?></a></p>
  		<input type="hidden" name="temp_asmember_url" id="temp_asmember_url" value="<?php echo admin_url(add_query_arg(array("post"=>$_REQUEST["post"],"action"=>$_REQUEST["action"]),"post.php"));?>"/>
		
  		<div id="asmember-newsletter-send-wrapper"></div>
  	
 		<?php  		
 		$url=admin_url($wp->request."post.php?post=".$post->ID."&action=edit&show_protokoll=yes");
 		echo "<a href=\"".$url."\">".__("Versand-Protokoll","asmember")."</a>\n";
	}
	
	
	
	
	
	function asmember_newsletter_send_meta_manuell()
	{
  		global $post;
  		global $wp;
  		global $wp_query;
		global $wpdb;
		
  		$custom = get_post_custom($post->ID);  	
  		if(isset($custom["_asmember_newsletter_send_anzahl"][0])) $_asmember_newsletter_send_anzahl = $custom["_asmember_newsletter_send_anzahl"][0];else $_asmember_newsletter_send_anzahl=0;
  		if(isset($custom["_asmember_newsletter_send_time"][0])) $_asmember_newsletter_send_time = $custom["_asmember_newsletter_send_time"][0];else $_asmember_newsletter_send_time=0;
		?>
  	 	<style>
		.button-asmember-newsletter-send
		{
			width:90%;
			margin:auto;
			border:solid 1px #afafaf;
			background-color:#dfdfdf;
			padding:10px;
			color:#000;
			height:25px;
			display:block;
			text-align:center;
			cursor:pointer;
		}		
		</style>	
  		<input type="hidden" name="temp_asmember_url" id="temp_asmember_url" value="<?php echo admin_url(add_query_arg(array("post"=>$_REQUEST["post"],"action"=>$_REQUEST["action"]),"post.php"));?>"/>
		
  		
 		<?php  		
 		
 		$sql="select count(*) as anzahl from ".$wpdb->prefix."asmember_newsletter_send where newsletter_id=".$post->ID;
 		$row=$wpdb->get_row($sql);
 		echo "<p>".__("Anzahl gesamt:","asmember")." ".$row->anzahl."</p>\n";
 		
 		$sql="select count(*) as anzahl from ".$wpdb->prefix."asmember_newsletter_send where status=1 and newsletter_id=".$post->ID;
 		$row=$wpdb->get_row($sql);
 		echo "<p>".__("Anzahl gesendet:","asmember")." ".$row->anzahl."</p>\n";
 		
 		$sql="select count(*) as anzahl from ".$wpdb->prefix."asmember_newsletter_send where status=0 and newsletter_id=".$post->ID;
 		$row=$wpdb->get_row($sql);
 		echo "<p>".__("Anzahl noch senden:","asmember")." ".$row->anzahl."</p>\n";
 		?>
 		
 		<input type="hidden" name="asmember_newsletter_send_id" id="asmember-newsletter-send-id" value="<?php echo $post->ID;?>"/>
  		<?php
  		if($row->anzahl>0)
  		{
			?>
  			<p>
  				<a id="asmember-newsletter-send-manuell-button" class="page-title-action sbutton-asmember-newsletter-send"><?php echo __("Manuell senden","asmember");?></a>
  			</p>
  			<?php
		}
		?>	
  		
  		<p>
  			<a id="asmember-newsletter-send-manuell-new-button" class="page-title-action sbutton-asmember-newsletter-send"><?php echo __("Empf&auml;nger anlegen","asmember");?></a>
  		</p>
  		
  		<input type="hidden" name="temp_asmember_url" id="temp_asmember_url" value="<?php echo admin_url(add_query_arg(array("post"=>$_REQUEST["post"],"action"=>$_REQUEST["action"]),"post.php"));?>"/>
		
  		<div id="asmember-newsletter-send-manuell-wrapper"></div>
 		<?php
	}
	
	
	
	
	
	function asmember_newsletter_set_content_type()
	{
    	return "text/html";
	}
	
	
	
	function ajax_asmember_newsletter_test()
	{
		global $wpdb;	
		$id=$_REQUEST["id"];
		$email=$_REQUEST["email"];
		
		$newsletter=get_post($id);
		
		add_filter( 'wp_mail_content_type',array($this,'asmember_newsletter_set_content_type' ));		
		wp_mail($email,$newsletter->_asmember_newsletter_betreff,str_replace("\n","<br>",$newsletter->post_content),"From: ".$newsletter->_asmember_newsletter_from);
		remove_filter( 'wp_mail_content_type',array($this,'asmember_newsletter_set_content_type' ));			
		die();
	}
	
	
	
	
	function ajax_asmember_newsletter_send_new()
	{
		global $wpdb;
		$id=$_REQUEST["id"];
		
		
		$anzahl=0;
		$sql="delete from ".$wpdb->prefix."asmember_newsletter_send where newsletter_id=".$id;
		$wpdb->query($sql);
		
		$newsletter=get_post($id);
		
		if(isset($newsletter->_asmember_newsletter_typ))$asmember_newsletter_typ=$newsletter->_asmember_newsletter_typ;else $asmember_newsletter_typ=0;
		
		
  		$users=get_users();
		foreach($users as $user)
		{			
			if($user->user_email!="")
				$user_email=$user->user_email;else
				$user_email="";
					
				
			if($user_email!="")
			{						
				$sql="select * from ".$wpdb->prefix."asmember_newsletter_send where newsletter_id=".$id." and email='".$user_email."'";
				$result=$wpdb->query($sql);
				if($wpdb->num_rows==0)
				{
					$sql="insert into ".$wpdb->prefix."asmember_newsletter_send (newsletter_id,status,user_id,email) values (".$id.",0,".$user->ID.",'".$user_email."');";
					$result=$wpdb->query($sql);
					$anzahl++;			
				}
			}		
		}	
			
			
			
		echo trim($anzahl);
		die();
	}
	
	
	
	function ajax_asmember_newsletter_send_step()
	{
		global $wpdb;
		$id=$_REQUEST["id"];
		
		
		$anzahl=0;
		
		$newsletter=get_post($id);
		
		$betreff=$newsletter->_asmember_newsletter_betreff;
		
		if(isset($newsletter->_asmember_newsletter_step))
			$step=$newsletter->_asmember_newsletter_step;else
			$step=1;
		
		if(isset($newsletter->_asmember_newsletter_pause))
			$pause=$newsletter->_asmember_newsletter_pause;else
			$pause=0;
		
		
		
		$headers="From: ".$newsletter->_asmember_newsletter_from;
		
		$sql="select * from ".$wpdb->prefix."asmember_newsletter_send where newsletter_id=".$id." and status=0 limit 0,".$step;
		$results=$wpdb->get_results($sql);
		
		foreach($results as $item)
		{
			if($item->user_id>0)
			{
						
				$temp_user=get_user_by('id',$item->user_id);
			
				//Werte ersetzen
				$body=str_replace("\n","<br>",$newsletter->post_content);
				$body=$newsletter->post_content;
				$body=str_replace("%name%",$temp_user->user_nicename,$body);
				$body=str_replace("\n","<br>",$body);
					
				add_filter( 'wp_mail_content_type',array($this,'asmember_newsletter_set_content_type' ));							
				wp_mail($item->email,$betreff,$body,$headers);
				remove_filter( 'wp_mail_content_type',array($this,'asmember_newsletter_set_content_type' ));							
				
				$sql="update ".$wpdb->prefix."asmember_newsletter_send set datum_send=".current_time("timestamp").",status=1 where newsletter_id=".$id." and user_id=".$item->user_id;
				$result=$wpdb->query($sql);
			
				$anzahl++;
			}else
			{
				$temp_address=get_post($item->address_id);
				$email_to=$temp_address->_asmember_address_email;
				$name=$temp_address->_asmember_address_vorname." ".$temp_address->_asmember_address_name;+
				//Werte ersetzen
				$body=str_replace("\n","<br>",$newsletter->post_content);
				$body=$newsletter->post_content;
				$body=str_replace("%name%",$name,$body);
				$body=str_replace("\n","<br>",$body);
				
							
				add_filter( 'wp_mail_content_type',array($this,'asmember_newsletter_set_content_type' ));							
				wp_mail($item->email,$betreff,$body,$headers);
				remove_filter( 'wp_mail_content_type',array($this,'asmember_newsletter_set_content_type' ));							
						
				$sql="update ".$wpdb->prefix."asmember_newsletter_send set datum_send=".current_time("timestamp").",status=1 where newsletter_id=".$id." and address_id=".$item->address_id;
				$result=$wpdb->query($sql);
			
				$anzahl++;
			}
			
		}
		sleep($pause);		
		echo trim($anzahl);
		die();
	}
	
	
	
	function ajax_asmember_newsletter_send_end()
	{
		global $wpdb;
		$id=$_REQUEST["id"];
		$anzahl = $_REQUEST["anzahl"];
		
		update_post_meta($id,'_asmember_newsletter_send_anzahl',$anzahl);
		update_post_meta($id,'_asmember_newsletter_send_time',current_time("timestamp"));
		die();
	}
	
	
	
	
	function asmember_newsletter_meta_options()
	{
  		global $post;
  
  		$custom = get_post_custom($post->ID);  	
  		if(isset($custom["_asmember_newsletter_typ"][0])) $_asmember_newsletter_typ = $custom["_asmember_newsletter_typ"][0];else $_asmember_newsletter_typ=0;
  		if(isset($custom["_asmember_newsletter_betreff"][0])) $_asmember_newsletter_betreff = $custom["_asmember_newsletter_betreff"][0];else $_asmember_newsletter_betreff="";
  		if(isset($custom["_asmember_newsletter_from"][0])) $_asmember_newsletter_from = $custom["_asmember_newsletter_from"][0];else $_asmember_newsletter_from="Ihre Firma <".get_option('admin_email').">";
  		if(isset($custom["_asmember_newsletter_step"][0])) $_asmember_newsletter_step = $custom["_asmember_newsletter_step"][0];else $_asmember_newsletter_step=10;
  		if(isset($custom["_asmember_newsletter_pause"][0])) $_asmember_newsletter_pause = $custom["_asmember_newsletter_pause"][0];else $_asmember_newsletter_pause=30;
  	
  	
		?>
  	
  		
  		<p><label><?php echo __("Betreff:","asmember");?></label><br/>
  		<input type="text" name="asmember_newsletter_betreff" size="70" value="<?php echo $_asmember_newsletter_betreff;?>"/>  		
  		</p>
  		
  		<p><label><?php echo __("From-Email:","asmember");?></label><br/>
  		<input type="text" name="asmember_newsletter_from" size="70" value="<?php echo $_asmember_newsletter_from;?>"/>  		
  		</p>
  		
  		
  		
		
  		<p><label><?php echo __("Step:","asmember");?></label><br/>
  		<input type="text" name="asmember_newsletter_step" size="70" value="<?php echo $_asmember_newsletter_step;?>"/>  		
  		</p>
  		
  		<p><label><?php echo __("Pause Javascript:","asmember");?></label><br/>
  		<input type="text" name="asmember_newsletter_pause" size="70" value="<?php echo $_asmember_newsletter_pause;?>"/>  		
  		</p>
  		
  		
 		<?php 
	}


	




	function asmember_newsletter_meta_protokoll()
	{
		global $wpdb;
		global $post;
		
		$sql="select * from ".$wpdb->prefix."asmember_newsletter_send where newsletter_id=".$post->ID;
		$results=$wpdb->get_results($sql);
		
		echo "<table class=\"table\" style=\"border-collapse: collapse;\">\n";
		echo "<thead>\n";
		echo "<tr>\n";
		echo "  <th style=\"padding:5px;padding-right:40px;border:solid 1px #afafaf;\">".__("Zeit:","asmember")."</th>\n";
		echo "  <th style=\"padding:5px;padding-right:40px;border:solid 1px #afafaf;\">".__("Empfänger:","asmember")."</th>\n";
		echo "  <th style=\"padding:5px;padding-right:40px;border:solid 1px #afafaf;\">".__("Status:","asmember")."</th>\n";
		echo "</tr>\n";
		echo "</thead>\n";
		
		
		if($wpdb->num_rows==0)
		{
			echo "<tr>\n";
			echo "  <td colspan=\"3\">\n";
			echo "	<p>".__("Keine Eintr&auml;ge vorhanden.","asmember")."</p>\n";
			echo "  </td>\n";
			echo "</tr>\n";
		}else
		foreach($results as $item)
		{
			echo "<tr>\n";
			echo "  <td style=\"padding:5px;padding-right:40px;border:solid 1px #afafaf;\">".strftime("%d.%m.%Y %H:%M Uhr",$item->datum_send)."</td>\n";
			echo "  <td style=\"padding:5px;padding-right:40px;border:solid 1px #afafaf;\">".$item->email."</td>\n";
			echo "  <td style=\"padding:5px;padding-right:40px;border:solid 1px #afafaf;\">\n";
				if($item->status==0)echo __("nicht gesandt.","asmember")."\n";
				if($item->status==1)echo __("erfolgreich versandt.","asmember")."\n";
			echo "  </td>\n";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
	
	
	

	function asmember_newsletter_save_details($post_id)
	{
  		$post_type = get_post_type($post_id);
		if($post_type=="asmember_newsletter")
		{
			if(isset($_REQUEST["asmember_newsletter_betreff"]))		update_post_meta($post_id, "_asmember_newsletter_betreff", $_REQUEST["asmember_newsletter_betreff"]);
  			if(isset($_REQUEST["asmember_newsletter_from"]))		update_post_meta($post_id, "_asmember_newsletter_from", $_REQUEST["asmember_newsletter_from"]);
  			if(isset($_REQUEST["asmember_newsletter_to"]))			update_post_meta($post_id, "_asmember_newsletter_to", $_REQUEST["asmember_newsletter_to"]);
  			if(isset($_REQUEST["asmember_newsletter_step"]))		update_post_meta($post_id, "_asmember_newsletter_step", $_REQUEST["asmember_newsletter_step"]);
  			if(isset($_REQUEST["asmember_newsletter_pause"]))		update_post_meta($post_id, "_asmember_newsletter_pause", $_REQUEST["asmember_newsletter_pause"]);
  			
  					
		}  
	}
	
}

$asmember_newsletter_admin = new asmember_newsletter_admin();