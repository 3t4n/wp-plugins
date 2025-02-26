<?php

function asmember_get_bookings_status($status)
{
	if($status==1)return __("best&auml;tigt","asmember");
	return __("offen","asmember");
}


class asmember_bookings
{

	public function __construct()
	{
		
	}
	
	public static function asmember_bookings_page_output()
	{
		?>
	
	
	
		<?php
		if(isset($_REQUEST['asmember_action']))$asmember_action=$_REQUEST['asmember_action'];else $asmember_action="list_bookings";
	
	
	
	
		if($asmember_action=="save_payment_quittung")
		{
			$id=$_REQUEST['id'];
			global $wpdb;
			$action2=$_REQUEST['action2'];
		
			$asmember_booking_status=$_REQUEST['asmember_booking_status'];
		
		
			if($action2=="Als Email senden")
			{
				if(isset($_REQUEST['asverein_payment_quittung']))$asverein_payment_quittung=$_REQUEST['asverein_payment_quittung'];else $asverein_payment_quittung="";		
				if($asverein_payment_quittung!="")
				{
					$options=get_option('asverein_options_payment');
					if(isset($options['asverein_options_payment_quittung_text']))$quittung=$options['asverein_options_payment_quittung_text'];
					
					if(isset($options['asverein_options_payment_quittung_email_betreff']))	$quittung_email_betreff=$options['asverein_options_payment_quittung_email_betreff'];else $quittung_email_betreff=""; 
					if(isset($options['asverein_options_payment_quittung_email_text']))		$quittung_email_text=$options['asverein_options_payment_quittung_email_text'];else $quittung_email_text=""; 
					if(isset($options['asverein_options_payment_quittung_email_from']))		$quittung_email_from=$options['asverein_options_payment_quittung_email_from'];else $quittung_email_from=""; 
		
		
		
		
					$sql="select * from ".$wpdb->prefix."asverein_payment where id=".$id;
					$payment=$wpdb->get_row($sql);			
					$user=get_user_by("id",$payment->user_id);
				
					$email_betreff=str_replace("%betreff%",$payment->betreff,$quittung_email_betreff);
					$quittung_text=str_replace("%quittung%",$asverein_payment_quittung,$quittung_email_text);
					//$quittung_text=str_replace("\n","<br>",$quittung_text);
					$email_headers="From: ".$quittung_email_from;				
						
				
					if(!wp_mail($user->user_email,$email_betreff, $quittung_text, $email_headers ))
					{
						echo "Fehler Email- Versand";
					}			
				}	
			}
		
		
			if($action2=="Speichern")
			{
				if(isset($_REQUEST['asverein_payment_quittung']))$asverein_payment_quittung=$_REQUEST['asverein_payment_quittung'];else $asverein_payment_quittung="";		
				$sql="update ".$wpdb->prefix."asverein_payment set quittung='".$asverein_payment_quittung."' where id=".$id;			
				$result=$wpdb->query($sql);
				if($result==false)
				{
					$wpdb->print_error();
					echo $wpdb->show_errors." <br>".$sql;	
				}  
			}	
		
		
			if($action2=="Rechnung erstellen")
			{
			
				$quittung="";
				
			
				$options=get_option('asmember_options_bookings');
				if(isset($options['asmember_options_bookings_quittung_text']))$quittung=$options['asmember_options_bookings_quittung_text'];
			
			
				//Werte ersetzen
				$sql="select * from ".$wpdb->prefix."asmember_user where id=".$id;
				$payment=$wpdb->get_row($sql);
			
				$quittung=str_replace("%datum%",strftime("%d.%m.%Y",$payment->datum_akt),$quittung);
				$quittung=str_replace("%aktdatum%",strftime("%d.%m.%Y",time()),$quittung);
				$quittung=str_replace("%betrag%",strtr(number_format($payment->betrag,2),".",",")." Eur",$quittung);
			
				$user=get_user_by("id",$payment->user_id);
			
				$user_str=$user->first_name." ".$user->last_name."\n".$user->_asmember_account_strasse."\n".$user->_asmember_account_plz." ".$user->_asmember_account_ort;
			
				$quittung=str_replace("%mitglied%",$user_str,$quittung);
			
				$sql="update ".$wpdb->prefix."asmember_user set quittung='".$quittung."' where id=".$id;			
				$result=$wpdb->query($sql);
				if($result==false)
				{
					$wpdb->print_error();
					echo $wpdb->show_errors." <br>".$sql;	
				}  
			
			}
		
			$asmember_action="edit_booking";			
		}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		if($asmember_action=="verl_booking_end")
		{
			if(isset($_REQUEST["id"]))$id=$_REQUEST["id"];else $id=0;
			if(isset($_REQUEST["action_cancel"]))$action_cancel=$_REQUEST["action_cancel"];else $action_cancel="weiter";
			if($id>0 and $action_cancel=="weiter")
			{
				global $wpdb;
				$sql="select * from ".$wpdb->prefix."asmember_user where id=".$id;
				$item=$wpdb->get_row($sql);
			
				//Payment eintragen
				if($item->membership_id>0)
    			{
					$membership_post=get_post($item->membership_id);																			
					
					$d=getdate($item->datum_erstell);
					//$datum_erstell=mktime(0,0,0,$d["mon"]+1,1,$d["year"]);				
					//$datum_erstell=time();
					
					if($membership_post->_asmember_memberships_period==1)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+1,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==2)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+2,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==3)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+3,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==4)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+4,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==5)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+5,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==6)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+6,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==7)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+7,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==8)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+8,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==9)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+9,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==10)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+10,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==11)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+11,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==12)$datum_erstell=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+12,$d["mday"],$d["year"]);
					
					
					$d=getdate($datum_erstell);
					if($membership_post->_asmember_memberships_period==1)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+1,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==2)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+2,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==3)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+3,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==4)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+4,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==5)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+5,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==6)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+6,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==7)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+7,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==8)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+8,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==9)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+9,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==10)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+10,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==11)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+11,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==12)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+12,$d["mday"],$d["year"]);
								
										
					$membership_id=$membership_post->ID;
					$paypal_token=time();
					
					if(isset($membership_post->_asmember_memberships_verl_betrag) and $membership_post->_asmember_memberships_verl_betrag>0)
					{
						$asmember_memberships_betrag=		str_replace(",",".",$membership_post->_asmember_memberships_verl_betrag);
						$asmember_memberships_betrag_mwst=	str_replace(",",".",$membership_post->_asmember_memberships_verl_betrag_mwst);
						$asmember_memberships_betrag_netto=	str_replace(",",".",$membership_post->_asmember_memberships_verl_betrag_netto);
					}else
					{										
						$asmember_memberships_betrag=		str_replace(",",".",$membership_post->_asmember_memberships_betrag);
						$asmember_memberships_betrag_mwst=	str_replace(",",".",$membership_post->_asmember_memberships_betrag_mwst);
						$asmember_memberships_betrag_netto=	str_replace(",",".",$membership_post->_asmember_memberships_betrag_netto);
					}
				
					$user = get_user_by( 'id', $item->user_id ); 
					$user_name=$user->first_name." ".$user->last_name;
					$status=0;
								
					$asmember_bookings_renew = $post->_asmember_memberships_renew;
					
					
					if($datum_bis!=0)
					{									
						$renew_time=$membership_post->_asmember_memberships_renew_von*7;
						$datum_renew=$datum_bis-(60*60*24*$renew_time);
					}else $datum_renew=0;	
							
					if($datum_bis!=0)
					{									
						$renew_end_time=$membership_post->_asmember_memberships_renew_bis*7;
						$datum_renew_end=$datum_bis+(60*60*24*$renew_end_time);
					}else $datum_renew_end=0;	
								
				
				
					$sql="insert into ".$wpdb->prefix."asmember_user (datum_renew,datum_renew_end,verl_id,renew,user_id,user_name,membership_id,membership,datum_erstell,datum_bis,status,payment,betrag,betrag_mwst,betrag_netto,paypal_token) values
						(".$datum_renew.",".$datum_renew_end.",0,".$item->renew.",".$user->ID.",'".$user_name."',".$membership_id.",'".$membership_post->post_title."',".$datum_erstell.",".$datum_bis.",".$status.",'".$item->payment."',".$asmember_memberships_betrag.",".$asmember_memberships_betrag_mwst.",".$asmember_memberships_betrag_netto.",".$paypal_token.")";
					$result=$wpdb->query($sql);
					if(!$result)echo $sql;				
					if($result)
					{						
				
						$options=get_option('asmember_options_bookings');
						
						$asmember_user_id=$wpdb->insert_id;
					
						if(isset($options['asmember_options_bookings_betreff_text']))						
							$betreff=$options['asmember_options_bookings_betreff_text'];else
							$betreff="RG-%datum%-%id%";
						
					
						$betreff=str_replace("%datum%",strftime("%d-%m-%Y",time()),$betreff);
						$betreff=str_replace("%id%",$asmember_user_id,$betreff);
					
						$sql="update ".$wpdb->prefix."asmember_user set betreff='".$betreff."' where id=".$asmember_user_id;
						$result=$wpdb->query($sql);
				
						if($membership_post->_asmember_memberships_betrag==0)
						{
							$sql="update ".$wpdb->prefix."asmember_user set status=1 where id=".$asmember_user_id;
							$result=$wpdb->query($sql);
						}	
						
						
						$sql="update ".$wpdb->prefix."asmember_user set verl_id=".$asmember_user_id." where id=".$item->id;
						$result=$wpdb->query($sql);
							
					}
				}						
								
								
			}
			$asmember_action="list_bookings_verl";
		}
	
	
	
	
	
		if($asmember_action=="verl_booking")
		{
			if(isset($_REQUEST["id"]))$id=$_REQUEST["id"];else $id=0;		
			?>			
		
			<div class="wrap">
				<h1 class="wp-heading-inline">Mitgliedschaft verl&auml;ngern</h1>		
				<hr class="wp-header-end">				
				<?php
				if($id==0)
				{	
					echo "<div id=\"poststuff\">\n";				
					echo "	<div class=\"postbox\">\n";					
					echo "  	<div class=\"inside\">\n";
						echo "Ung&uuml;ltige Buchung\n";
					echo "      </div>\n";
					echo "	</div>\n";
					echo "</div>\n";		
				}else
				{
					global $wpdb;
					$sql="select * from ".$wpdb->prefix."asmember_user where id=".$id;				
					$booking_row=$wpdb->get_row($sql);
				
					if(!$booking_row or $booking_row->renew!=2)
					{
						echo "<div id=\"poststuff\">\n";				
						echo "	<div class=\"postbox\">\n";					
						echo "  	<div class=\"inside\">\n";
							echo "<p><b>Diese Mitgliedschaft kann nicht verl&auml;ngert werden.</b></p>\n";
							echo "<p>Grund: Verl&auml;ngerung kann nur manuell erfolgen.</p>\n";
						echo "      </div>\n";
						echo "	</div>\n";
						echo "</div>\n";		
						?>
						<form action="<?php echo esc_url(self_admin_url("admin.php?page=asmember_bookings"));?>" method="post" name="asmember_verl_booking" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">   	
    					<div class="row">
							<div class="col">							
							<div class="panel panel-default">
       						<div class="panel-body">
       					    	<input type="hidden" name="id" value="<?php echo $id;?>">
       							<input type="hidden" name="asmember_action" value="verl_booking_end">       			           				
           						<input type="submit" name="action_cancel" class="btn btn-primary pull-right" value="Abbrechen"/>
           						<div class="clearfix"></div>                
       						</div>
    						</div>	
							</div>
						</div>       		
    					</form>  
						<?php
					}else
					{
					
						?>					
						<form action="<?php echo esc_url(self_admin_url("admin.php?page=asmember_bookings"));?>" method="post" name="asmember_verl_booking" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">   	    		
						<div id="poststuff">
				
							<div class="postbox">					
								<h2 class="hndle ui-sortable-handle is-non-sortable"><span>zu verl&auml;ngernde Mitgliedschaft:</span></h2>
								<div class="inside">						
									<div class="row">
										<div class="col">

        								<table class="form-table">
        								<tbody>
        								<tr>
        									<th scope="row">Mitgliedschaft:</th>
        									<td><?php echo $booking_row->membership;?></td>
        								</tr>
        					
        								<tr>	
        									<th scope="row">Datum von:</th>
        									<td><?php echo strftime("%d.%m.%Y",$booking_row->datum_erstell);?></td>        						
        								</tr>
        		
        								<tr>
        									<th scope="row">Datum bis:</th>
        									<td><?php echo strftime("%d.%m.%Y",$booking_row->datum_bis);?></td>        						        						
        								</tr>
        		
        		
        								<tr>
        									<th scope="row">Datum Zahlung:</th>	
	        								<td><?php echo strftime("%d.%m.%Y",$booking_row->datum_zahlung);?></td>        						        						        							        				
			        					</tr>
        					
        					
        								<tr>
        									<th scope="row">Datum Verl&auml;ngerung ab:</th>
        									<td><?php echo strftime("%d.%m.%Y",$booking_row->datum_renew);?></td>            						
        								</tr>
        					
        					
        								<tr>
        									<th scope="row">Datum Verl&auml;ngerung bis:</th>
        									<td><?php echo strftime("%d.%m.%Y",$booking_row->datum_renew_end);?></td> 
		        						</tr>
        		
	        							<tr>
    	    								<th scope="row">Betrag:</th>
        									<td><?php echo $booking_row->betrag;?></td>       						
        								</tr>	        					
        								</tbody>        	
						        		</table>        
       	        					</div>
	       	        			</div>
    						</div>
    					</div>	
    			
    					<div class="row">
							<div class="col">							
								<div class="panel panel-default">
       								<div class="panel-body">           	            	
       								<input type="hidden" name="id" value="<?php echo $id;?>">
       								<input type="hidden" name="asmember_action" value="verl_booking_end">       			
           							<input type="submit" name="action" class="btn btn-primary pull-right" value="Verl&auml;ngern"/>           		
           							<input type="submit" name="action_cancel" class="btn btn-primary pull-right" value="Abbrechen"/>
           							<div class="clearfix"></div>                
       								</div>
    							</div>	
							</div>
						</div>
				
        		
    					</form>  
    					<?php
    				}
				}
    			?>
    		
    		</div>	
			<?php
		}
	
	
	
	
	
	if($asmember_action=="del_booking")
	{
		if(isset($_REQUEST["id"]))$id=$_REQUEST["id"];else $id=0;		
		?>					
		<div class="wrap">
			<h1 class="wp-heading-inline">Buchung l&ouml;schen</h1>		
			<hr class="wp-header-end">				
			<?php
			if($id==0)
			{
				echo "<div id=\"poststuff\">\n";				
				echo "	<div class=\"postbox\">\n";					
				echo "  	<div class=\"inside\">\n";
						echo "Ung&uuml;ltige Buchung\n";
				echo "      </div>\n";
				echo "	</div>\n";
				echo "</div>\n";		
			}else
			{
				?>					
				<form action="<?php echo esc_url(self_admin_url("admin.php?page=asmember_bookings"));?>" method="post" name="asmember_del_booking" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">   	
    		
				<div id="poststuff">
				
				<div class="postbox">					
					<h2 class="hndle ui-sortable-handle is-non-sortable"><span>Optionen</span></h2>
					<div class="inside">
						
						<div class="row">
							<div class="col">        					
        						Wollen Sie diese Buchung l&ouml;schen?        						
       	        			</div>
	       	        	</div>
    				</div>
    			</div>	
    			
    			<div class="row">
					<div class="col">							
						<div class="panel panel-default">
       						<div class="panel-body">           	            	
       							<input type="hidden" name="id" value="<?php echo $id;?>">
       							<input type="hidden" name="asmember_action" value="del_booking_end">       			
           						<input type="submit" name="action" class="btn btn-primary pull-right" value="Ja"/>           		
           						<input type="submit" name="action_cancel" class="btn btn-primary pull-right" value="Nein"/>
           						<div class="clearfix"></div>                
       						</div>
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
	
	
	if($asmember_action=="del_booking_end")
	{
		if(isset($_REQUEST["id"]))$id=$_REQUEST["id"];else $id=0;
		
		if($id==0)
		{
			echo "<div id=\"poststuff\">\n";				
			echo "	<div class=\"postbox\">\n";					
			echo "  	<div class=\"inside\">\n";
				echo __("Ung&uuml;ltige Buchung","asmember");
			echo "      </div>\n";
			echo "	</div>\n";
			echo "</div>\n";		
		}else
		{
			if(isset($_REQUEST["action"]) and $_REQUEST["action"]=="Ja")
			{
				global $wpdb;
				$sql="delete from ".$wpdb->prefix."asmember_user where id=".$id;
				$wpdb->query($sql);
			}
			$asmember_action="list_bookings";
		}	
	}
	
	
	
	
	
	if($asverein_action=="storno_payment")
	{
		if(isset($_REQUEST["id"]))$id=$_REQUEST["id"];else $id=0;
		
		?>			
		
		<div class="wrap">
			<h1 class="wp-heading-inline">Mitgliedschaft stornieren</h1>		
			<hr class="wp-header-end">				
			<?php
			if($id==0)
			{
				echo "<div id=\"poststuff\">\n";				
				echo "	<div class=\"postbox\">\n";					
				echo "  	<div class=\"inside\">\n";
						echo "Ung&uuml;ltige Zahlung\n";
				echo "      </div>\n";
				echo "	</div>\n";
				echo "</div>\n";		
			}else
			{
				?>					
				<form action="<?php echo esc_url(self_admin_url("admin.php?page=asverein_payment"));?>" method="post" name="asverein_new_payment" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">   	
    		
				<div id="poststuff">
				
				<div class="postbox">					
					<h2 class="hndle ui-sortable-handle is-non-sortable"><span>Optionen</span></h2>
					<div class="inside">
						
						<div class="row">
							<div class="col">        					
        						Wollen Sie diese Zahlung l&ouml;schen?        						
       	        			</div>
	       	        	</div>
	       	        	
	       	        	<div class="row">
	       	        		<div class="col">
	       	        			<div class="panel panel-default">
       								<div class="panel-body"> 
       									<select name="asverein_storno_version">
       										<option value="1">Mitgliedschaft deaktivieren</option>
       										<option value="2">Mitglied l&ouml;schen</option>
       									</select> 
       								</div>
       							</div>	
	       	        		</div>
	       	        	</div>
    				</div>
    			</div>	
    			
    			
    			<div class="row">
					<div class="col">							
						<div class="panel panel-default">
       						<div class="panel-body">           	            	
       							<input type="hidden" name="id" value="<?php echo $id;?>">
       							<input type="hidden" name="asverein_action" value="storno_payment_end">       			
           						<input type="submit" name="action" class="btn btn-primary pull-right" value="Stornieren"/>           		
           						<input type="submit" name="action_cancel" class="btn btn-primary pull-right" value="Abbrechen"/>
           						<div class="clearfix"></div>                
       						</div>
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
	
	
	
	if($asverein_action=="storno_payment_end")
	{
		if(isset($_REQUEST["id"]))$id=$_REQUEST["id"];else $id=0;
		if(isset($_REQUEST["asverein_storno_version"]))$asverein_storno_version=$_REQUEST["asverein_storno_version"];else $asverein_storno_version=0;
		if(isset($_REQUEST["action"]))$action=$_REQUEST["action"];else $action="";
				
		if($action=="Stornieren")
		{
			
			if($id==0)
			{
				echo "<div id=\"poststuff\">\n";				
				echo "	<div class=\"postbox\">\n";					
				echo "  	<div class=\"inside\">\n";
					echo "Ung&uuml;ltige Zahlung\n";
				echo "      </div>\n";
				echo "	</div>\n";
				echo "</div>\n";		
			}else
			{
				global $wpdb;
				if($asverein_storno_version==1)
				{
					$sql="select * from ".$wpdb->prefix."asverein_payment where id=".$id;
					$row=$wpdb->get_row($sql);
					$user=get_user_by("id",$row->user_id);
					
					
					$memberships=explode(",",trim($user->_asverein_account_membership,","));
					$new_array=array();
					foreach($memberships as $item)
					{
						if($item!=$row->membership_id)$new_array[]=$item;
					}
					if(count($new_array)==0)
						$new_membership="";else $new_membership=",".implode(",",$new_array).",";
					update_user_meta($user->ID,"_asverein_account_membership",$new_membership);
					
					//asverein_payment update
					$sql="update ".$wpdb->prefix."asverein_payment set verl_id=-1 where id=".$id;
					$wpdb->query($sql);
					
				}
				if($asverein_storno_version==2)
				{
					
				}
								
			}	
		}
		$asverein_action="list_payment_verl";	
	}
	
	
	
	
	
	
	
	
	
		if($asmember_action=="save_booking")
		{
			global $wpdb;
			if(isset($_REQUEST['id']))$id=$_REQUEST['id'];else $id=0;
			
			if(isset($_REQUEST['asmember_bookings_status']))
				$asmember_bookings_status=$_REQUEST['asmember_bookings_status'];else 
				$asmember_bookings_status=0;
			
			if(isset($_REQUEST['asmember_bookings_user_id']))
				$asmember_bookings_user_id=$_REQUEST['asmember_bookings_user_id'];else
				$asmember_bookings_user_id=0;
				
			if(isset($_REQUEST['asmember_bookings_membership_id']))
				$asmember_bookings_membership_id=$_REQUEST['asmember_bookings_membership_id'];else
				$asmember_bookings_membership_id=0;
			
						
			if(isset($_REQUEST['asmember_bookings_datum_erstell']))
				$asmember_bookings_datum_erstell=$_REQUEST['asmember_bookings_datum_erstell'];else
				$asmember_bookings_datum_erstell="";
				
			if(isset($_REQUEST['asmember_bookings_datum_bis']))
				$asmember_bookings_datum_bis=$_REQUEST['asmember_bookings_datum_bis'];else
				$asmember_bookings_datum_bis=0;
				
			if(isset($_REQUEST['asmember_bookings_datum_renew']))
				$asmember_bookings_datum_renew=$_REQUEST['asmember_bookings_datum_renew'];else
				$asmember_bookings_datum_renew="";
			
			if(isset($_REQUEST['asmember_bookings_datum_renew_end']))
				$asmember_bookings_datum_renew_end=$_REQUEST['asmember_bookings_datum_renew_end'];else
				$asmember_bookings_datum_renew_end="";
					
			if(isset($_REQUEST['asmember_bookings_renew']))
				$asmember_bookings_renew=$_REQUEST['asmember_bookings_renew'];else
				$asmember_bookings_renew=0;
			
			
			if(isset($_REQUEST['asmember_bookings_payment']))
				$asmember_bookings_payment=$_REQUEST['asmember_bookings_payment'];else
				$asmember_bookings_payment='bank';
					
					
			if(isset($_REQUEST['asmember_bookings_send_message']))
				$asmember_bookings_send_message=$_REQUEST['asmember_bookings_send_message'];else
				$asmember_bookings_send_message=0;		
					
					
			if(isset($_REQUEST['asmember_bookings_check_url']))
				$asmember_bookings_check_url=$_REQUEST['asmember_bookings_check_url'];else
				$asmember_bookings_check_url="";				
					
			if(isset($_REQUEST['speichern']))
			{
				if($id>0)
				{
					$membership_post=get_post($asmember_bookings_membership_id);
					$user=get_user_by("id",$asmember_bookings_user_id);
					$user_name=$user->first_name." ".$user->last_name;
					
					
					$datum_erstell_pieces=explode("-",$asmember_bookings_datum_erstell);
					$datum_erstell=mktime(0,0,0,$datum_erstell_pieces[1],$datum_erstell_pieces[2],$datum_erstell_pieces[0]);
					
					if($asmember_bookings_datum_bis>0)
					{
						$datum_bis_pieces=explode("-",$asmember_bookings_datum_bis);
						$datum_bis=mktime(0,0,0,$datum_bis_pieces[1],$datum_bis_pieces[2],$datum_bis_pieces[0]);
					}else $datum_bis=0;
					
					if($asmember_bookings_datum_renew!="")
					{
						$datum_renew_pieces=explode("-",$asmember_bookings_datum_renew);
						$datum_renew=mktime(0,0,0,$datum_renew_pieces[1],$datum_renew_pieces[2],$datum_renew_pieces[0]);
					}else $datum_renew=0;
					
					if($asmember_bookings_datum_renew_end!="")
					{
						$datum_renew_pieces=explode("-",$asmember_bookings_datum_renew_end);
						$datum_renew_end=mktime(0,0,0,$datum_renew_pieces[1],$datum_renew_pieces[2],$datum_renew_pieces[0]);
					}else $datum_renew_end=0;
					
					
					
					$sql="update ".$wpdb->prefix."asmember_user set membership_id='".$asmember_bookings_membership_id."',
							membership='".$membership_post->post_title."',
							user_id=".$asmember_bookings_user_id.",
							user_name='".$user_name."',
							datum_erstell=".$datum_erstell.",
							datum_bis=".$datum_bis.",
							renew=".$asmember_bookings_renew.",
							datum_renew=".$datum_renew.",
							datum_renew_end=".$datum_renew_end.",
							check_url='".$asmember_bookings_check_url."',
							payment='".$asmember_bookings_payment."' where id=".$id;
					
										
					$result=$wpdb->query($sql);
					
					if($asmember_bookings_send_message==1)
					{
					
						$sql="select * from ".$wpdb->prefix."asmember_user where id=".$id;					
						$booking_row=$wpdb->get_row($sql);
						
						$user=get_user_by("id",$booking_row->user_id);
						if($asmember_bookings_status==1)
						{							
							$asmember_options_bookings=get_option('asmember_options_bookings');
						
							$body=$asmember_options_bookings['asmember_options_bookings_email_payment_aktiv_text'];
        					//Werte austauschen
        					$body=str_replace("%benutzer%",$user->user_login,$body);
        					$body=str_replace("%vorname%",$user->first_name,$body);
        					$body=str_replace("%name%",$user->last_name,$body);        			
					
							$email_headers="From: ".$asmember_options_bookings['asmember_options_bookings_email_payment_aktiv_from'];
        					wp_mail( sanitize_email($user->user_email), $asmember_options_bookings['asmember_options_bookings_email_payment_aktiv_betreff'], $body, $email_headers );
        				
        					
						}
					}
					
												
				}					
				
			}
			$asmember_action="list_bookings";
		}
		
		
		
	
		
		if($asmember_action=="save_booking_status")
		{
			global $wpdb;
			if(isset($_REQUEST['id']))$id=$_REQUEST['id'];else $id=0;
			
			if(isset($_REQUEST['asmember_bookings_status']))
				$asmember_bookings_status=$_REQUEST['asmember_bookings_status'];else 
				$asmember_bookings_status=0;
			
					
			if(isset($_REQUEST['asmember_bookings_send_message']))
				$asmember_bookings_send_message=$_REQUEST['asmember_bookings_send_message'];else
				$asmember_bookings_send_message=0;		
					
					
					
						
			if($id>0)
			{
								
				$sql="update ".$wpdb->prefix."asmember_user set status=".$asmember_bookings_status." where id=".$id;					
				$result=$wpdb->query($sql);
					
				if($asmember_bookings_send_message==1 and $asmember_bookings_status==1)
				{
					$sql="select * from ".$wpdb->prefix."asmember_user where id=".$id;					
					$booking_row=$wpdb->get_row($sql);
						
					$user=get_user_by("id",$booking_row->user_id);
					if($asmember_bookings_status==1)
					{							
						$asmember_options_bookings=get_option('asmember_options_bookings');
						
						$body=$asmember_options_bookings['asmember_options_bookings_email_payment_aktiv_text'];
        				//Werte austauschen
        				$body=str_replace("%benutzer%",$user->user_login,$body);
        				$body=str_replace("%vorname%",$user->first_name,$body);
        				$body=str_replace("%name%",$user->last_name,$body);        			
				
						$email_headers="From: ".$asmember_options_bookings['asmember_options_bookings_email_payment_aktiv_from'];
        				wp_mail( sanitize_email($user->user_email), $asmember_options_bookings['asmember_options_bookings_email_payment_aktiv_betreff'], $body, $email_headers );
        				
        		
					}
				}
			}
			$asmember_action="list_bookings";
		}
		
		
		
		
		
		if($asmember_action=="email_booking")
		{
			if(isset($_REQUEST['id']))$id=$_REQUEST['id'];else $id=0;
			if(isset($_REQUEST['asmember_booking_email_text']))$asmember_booking_email_text=$_REQUEST['asmember_booking_email_text'];else $asmember_booking_email_text="";
			if(isset($_REQUEST['asmember_booking_email_betreff']))$asmember_booking_email_betreff=$_REQUEST['asmember_booking_email_betreff'];else $asmember_booking_email_betreff="";
			if(isset($_REQUEST['asmember_booking_email_from']))$asmember_booking_email_from=$_REQUEST['asmember_booking_email_from'];else $asmember_booking_email_from="";	
			if(isset($_REQUEST['asmember_booking_email_email']))$asmember_booking_email_email=$_REQUEST['asmember_booking_email_email'];else $asmember_booking_email_email="";	
		
			$email_headers="From:".$asmember_booking_email_from;	
			wp_mail( $asmember_booking_email_email, $asmember_booking_email_betreff, $asmember_booking_email_text, $email_headers );
    	
    		global $wpdb;
    		$sql="update ".$wpdb->prefix."asmember_user set last_email=".time()." where id=".$id;
    		$wpdb->query($sql);
    		$asmember_action="list_bookings";		
		}
	
	
	
	
		
		if($asmember_action=="email_booking_verl")
		{
			if(isset($_REQUEST['id']))$id=$_REQUEST['id'];else $id=0;
			if(isset($_REQUEST['asmember_booking_email_text']))$asmember_booking_email_text=$_REQUEST['asmember_booking_email_text'];else $asmember_booking_email_text="";
			if(isset($_REQUEST['asmember_booking_email_betreff']))$asmember_booking_email_betreff=$_REQUEST['asmember_booking_email_betreff'];else $asmember_booking_email_betreff="";
			if(isset($_REQUEST['asmember_booking_email_from']))$asmember_booking_email_from=$_REQUEST['asmember_booking_email_from'];else $asmember_booking_email_from="";	
			if(isset($_REQUEST['asmember_booking_email_email']))$asmember_booking_email_email=$_REQUEST['asmember_booking_email_email'];else $asmember_booking_email_email="";	
		
			$email_headers="From:".$asmember_booking_email_from;	
		
			$asmember_booking_email_text=str_replace("\'","'",$asmember_booking_email_text);
			$asmember_booking_email_text=str_replace('\"','"',$asmember_booking_email_text);
			
			wp_mail( $asmember_booking_email_email, $asmember_booking_email_betreff, $asmember_booking_email_text, $email_headers );
    	
    		global $wpdb;
    		$sql="update ".$wpdb->prefix."asmember_user set last_email_verl=".time()." where id=".$id;
    		$wpdb->query($sql);
    		$asmember_action="list_bookings";		
		}
	
	
	
	
		if($asmember_action=="save_booking_pdf_file")
		{
			global $wpdb;
			if(isset($_REQUEST['id']))$id=$_REQUEST['id'];else $id=0;
			
			if(!empty($_FILES['asmember_booking_pdf_file']['name']))
			{				
		
				// Use the WordPress API to upload the file
				$newfilename=substr(md5(time()),0,10)."-".$_FILES['asmember_booking_pdf_file']['name'];
				
				$upload = wp_upload_bits($newfilename, NULL, file_get_contents($_FILES['asmember_booking_pdf_file']['tmp_name']));
			
				if(isset($upload['error']) && $upload['error'] != 0)
				{
					wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
				} else 
				{					
					$sql="update ".$wpdb->prefix."asmember_user set pdf_file='".$upload['file']."',pdf_file_url='".$upload['url']."' where id=".$id;
					$wpdb->query($sql);
				} 
			
			}
			$asmember_action="edit_booking";
				
		}
		
	
	
		
		
		if($asmember_action=="edit_booking")
		{
			global $wpdb;
			if(isset($_REQUEST['id']))$id=$_REQUEST['id'];else $id=0;
			if($id>0)
			{
				$sql="select * from ".$wpdb->prefix."asmember_user where id=".$id;
				$item=$wpdb->get_row($sql);
			}
			?>
			
			<div class="wrap">
				<h1 class="wp-heading-inline"><?php echo _e("Buchung bearbeiten","asmember");?></h1>		
				<hr class="wp-header-end">	
				
				<div id="poststuff">
				
					<div class="postbox">					
						<h2 class="hndle ui-sortable-handle is-non-sortable"><span><?php echo _e("Information","asmember");?></span></h2>
						<div class="inside">
						
							<div class="asfirms-user-edit-entry">
			
							<form name="asmember_booking" action="<?php echo admin_url('admin.php?page=asmember_bookings');?>" method="post">
							<table class="form-table">
				
							
							<tr>
								<th scope="row"><?php echo _e("Benutzer:","asmember");?></th>
								<td>
									<select name="asmember_bookings_user_id">
									<?php
									$users=get_users();
									foreach ( $users as $user )
									{
										echo "<option value=\"".$user->ID."\"";
										if($item->user_id==$user->ID)echo " selected";
										echo ">\n";
										echo $user->first_name." ".$user->last_name." (".$user->user_login.")";
										echo "</option>\n";
									}
									?>									
									</select>
								</td>
							</tr>
							
							
							<tr>
								<th scope="row"><?php echo _e("Benutzer-Detail:","asmember");?></th>
								<td>
								<?php 
									$user_booking=get_user_by("id",$item->user_id);
									
									echo _e("Firma: ","asmember").$user_booking->_asmember_account_firma."<br>";
									echo _e("Name: ","asmember").$user_booking->first_name." ".$user_booking->last_name."<br>";
									echo _e("Anschrift: ","asmember").$user_booking->_asmember_account_strasse.", ".$user_booking->_asmember_account_plz." ".$user_booking->_asmember_account_ort;
								?>									
								</td>								
							</tr>
														
							
							<tr>
								<th scope="row"><?php echo _e("Mitgliedschaft:","asmember");?></th>
								<td>
									<select name="asmember_bookings_membership_id">
									<?php 
									$args=array(
											'post_type'=>'asmember_memberships',
											'numberposts'=>-1,
										);
									$posts=get_posts($args);
									foreach($posts as $membership)
									{
										echo "<option value=\"".$membership->ID."\"";
										if($item->membership_id==$membership->ID)echo " selected";
										echo ">";
										echo $membership->post_title;
										echo "</option>\n";
									}										
									?>
									</select>									
								</td>
							</tr>
							<tr>
								<th scope="row"><?php echo _e("Datum:","asmember");?></th>
								<td>
									<input type="date" name="asmember_bookings_datum_erstell" value="<?php echo strftime("%Y-%m-%d",$item->datum_erstell);?>"/>																											
								</td>
							</tr>
							<tr>
								<th scope="row"><?php echo _e("Datum bis:","asmember");?></th>
								<td>
									<?php if($item->datum_bis>0)
										echo "<input type=\"date\" name=\"asmember_bookings_datum_bis\" value=\"".strftime("%Y-%m-%d",$item->datum_bis)."\"/>\n";else
										echo "<input type=\"date\" name=\"asmember_bookings_datum_bis\" value=\"\"/>\n";																		
									?>	
								</td>
							</tr>
							
							<tr>
								<th scope="row"><?php echo _e("Verl&auml;ngerung:","asmember");?></th>
								<td>
									<select name="asmember_bookings_renew">
										<option value="0"<?php if($item->renew==0)echo " selected";?>>keine</option>
										<option value="1"<?php if($item->renew==1)echo " selected";?>>manuell</option>
										<option value="2"<?php if($item->renew==2)echo " selected";?>>automatisch</option>
									</select>									
								</td>
							</tr>
							
							
							<tr>
								<th scope="row"><?php echo _e("Verl&auml;ngerung ab:","asmember");?></th>
								<td>
									<?php if($item->datum_renew>0)
										echo "<input type=\"date\" name=\"asmember_bookings_datum_renew\" value=\"".strftime("%Y-%m-%d",$item->datum_renew)."\"/>\n";else
										echo "<input type=\"date\" name=\"asmember_bookings_datum_renew\" value=\"\"/>\n";																		
									?>	
								</td>
							</tr>
							
							
							<tr>
								<th scope="row"><?php echo _e("Verl&auml;ngerung bis:","asmember");?></th>
								<td>
									<?php if($item->datum_renew_end>0)
										echo "<input type=\"date\" name=\"asmember_bookings_datum_renew_end\" value=\"".strftime("%Y-%m-%d",$item->datum_renew_end)."\"/>\n";else
										echo "<input type=\"date\" name=\"asmember_bookings_datum_renew_end\" value=\"\"/>\n";																		
									?>	
								</td>
							</tr>
							
							
							<?php if(1==2)
							{
								?>
							<tr>
								<th scope="row"><?php echo _e("Status:","asmember");?></th>
								<td>
									<select name="asmember_bookings_status">
									<option value="0"<?php if($item->status==0)echo " selected";?>><?php echo _e("offen","asmember");?></option>
									<option value="1"<?php if($item->status==1)echo " selected";?>><?php echo _e("best&auml;tigt","asmember");?></option>
									</select>
								</td>
							</tr>
							<?php } ?>
							
							<tr>
								<th scope="row"><?php echo _e("Betreff:","asmember");?></th>
								<td>
									<?php echo $item->betreff;?>
								</td>
							</tr>
							
							
							<tr>
								<th scope="row"><?php echo _e("Zahlung:","asmember");?></th>
								<td>
									<select name="asmember_bookings_payment">
										<option value="paypal" <?php if($item->payment=="paypal")echo " selected";?>><?php echo _e("Paypal","asmember");?></option>
										<option value="bank" <?php if($item->payment=="bank") echo " selected";?>><?php echo _e("&Uuml;berweisung","asmember");?></option>
									</select>									
								</td>
							</tr>
							<tr>
								<th scope="row"><?php echo _e("Betrag:","asmember");?></th>
								<td>									
									<?php echo $item->betrag."<br>".$item->betrag_netto."<br>".$item->betrag_mwst;?>									
								</td>
							</tr>
							
							
							<?php
							$options=get_option("asmember_options_plugin");
							if(isset($options["asmember_options_plugin_checkurl"]) and $options["asmember_options_plugin_checkurl"]==1)
							{
								?>
								<tr>
									<th scope="row">Plugin Check-URL</th>
									<td>
										<input type="text" name="asmember_bookings_check_url" size="80" value="<?php echo $item->check_url;?>"/>
									</td>
								</tr>/tD>
								<?php
							}		
							?>
							
												
							<tr>
								<th scope="row">&nbsp;</th>
								<td>
									<input type="hidden" name="asmember_action" value="save_booking"/>
									<input type="hidden" name="id" value="<?php echo $item->id;?>"/>
									<input type="submit" name="speichern" class="btn btn-primary pull-right" value="<?php echo _e("Speichern","asmember");?>"/>
									<input type="submit" name="abbrechen" class="btn btn-primary pull-right" value="<?php echo _e("Abbrechen","asmember");?>"/>
								</td>
							</tr>
							</table>
				
				
							</form>
							</div>
						</div>
					</div>
				</div>
				
				
				<?php
    			if($id>0)
    			{
					?>				
    				<form name="asmember_booking_status" action="<?php echo esc_url(self_admin_url('admin.php?page=asmember_bookings'));?>" method="post" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">
    			
            		<div id="poststuff">
					
						<div class="postbox">					
							<h2 class="hndle ui-sortable-handle is-non-sortable"><span>Status setzen</span></h2>
							<div class="inside">
					    
        					<table class="form-table">
        					<tbody>
        					<tr>
								<th scope="row">Status:</th>
								<td>
						
               						<select name="asmember_bookings_status" id="asmember_bookings_status">
               							<option value="0" <?php if($item->status==0)echo " selected";?>>Offen</option>
               							<option value="1" <?php if($item->status==1)echo " selected";?>>bezahlt</option>
               						</select>		
								</td>
							</tr>       	
				
				
							
							<tr>
								<th scope="row"><?php echo _e("Nachricht senden:","asmember");?></th>
								<td>
									<select name="asmember_bookings_send_message">
										<option value="0"><?php echo _e("Nein","asmember");?></option>
										<option value="1"><?php echo _e("Ja","asmember");?></option>
									</select>
								</td>
							</tr>
							
							
							<tr>
								<th scope="row">&nbsp;</th>
								<td>
									<input type="hidden" name="id" value="<?php echo $id;?>">
       								<input type="hidden" name="asmember_action" value="save_booking_status"/>       							       			
		           					<input type="submit" name="set_status" class="btn btn-primary pull-right" value="Status &auml;ndern"/>	
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
    			
    		
    		
    			<?php
    			if($id>0)
    			{
					$asmember_options_bookings = get_option('asmember_options_bookings');
		
					$asmember_options_bookings_email_betreff = 	$asmember_options_bookings['asmember_options_bookings_email_betreff'];
					$asmember_options_bookings_email_text	= 	$asmember_options_bookings['asmember_options_bookings_email_text'];
					$asmember_options_bookings_email_from	= 	$asmember_options_bookings['asmember_options_bookings_email_from'];
			
					$asmember_options_bookings_email_text = str_replace("%jahr%",$asverein_payment_jahr,$asmember_options_bookings_email_text);
					$asmember_options_bookings_email_text = str_replace("%betrag%",$asverein_payment_betrag,$asmember_options_bookings_email_text);
			
					$user=get_user_by('id',$item->user_id);
			
					$asmember_options_bookings_email_text = str_replace("%vorname%",$user->first_name,$asmember_options_bookings_email_text);
					$asmember_options_bookings_email_text = str_replace("%name%",$user->last_name,$asmember_options_bookings_email_text);
			
					?>
	
			
					<form action="<?php echo esc_url(self_admin_url('admin.php?page=asmember_bookings'));?>" method="post" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">
    			
    				<div id="poststuff">
					
					<div class="postbox">					
						<h2 class="hndle ui-sortable-handle is-non-sortable"><span>Zahlungserinnerung senden</span></h2>
						<div class="inside">
					    
                
        				<table class="form-table">
        				<tbody>
        				<tr>
        					<th scope="row">Email an:</th>
        					<td>
        						<label for="asmember_booking_email_email">
        						<input type="text" name="asmember_booking_email_email" size="50" value="<?php echo $user->user_email;?>"/>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row">Betreff:</th>
        					<td>
        						<label for="asmember_booking_email_betreff">
        						<input type="text" name="asmember_booking_email_betreff" size="50" value="<?php echo $asmember_options_bookings_email_betreff;?>"/>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row">Text:</th>
        					<td>
        						<label for="asmember_booking_email_text">
        						<textarea id="asmember_booking_email_text" cols="60" rows="8" name="asmember_booking_email_text"><?php echo $asmember_options_bookings_email_text;?></textarea>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row">EMail von:</th>
        					<td>
        						<label for="asmember_booking_email_from">
        						<input type="text" name="asmember_booking_email_from" size="50" value="<?php echo $asmember_options_bookings_email_from;?>"/>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row">&nbsp;</th>
        					<td>
        						<input type="hidden" name="id" value="<?php echo $id;?>">
       							<input type="hidden" name="asmember_action" value="email_booking">       			
           						<input type="submit" name="action" class="btn btn-primary pull-right" value="Senden"/>		
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
			
    	
    	
    	
    			if($id>0 and $item->renew>0)
    			{
					$asmember_options_bookings = get_option('asmember_options_bookings');
				
					if($item->renew==1)
					{					
						$asmember_options_bookings_email_betreff = $asmember_options_bookings['asmember_options_bookings_email_verl_betreff'];
						$asmember_options_bookings_email_text	= $asmember_options_bookings['asmember_options_bookings_email_verl_text'];
						$asmember_options_bookings_email_from	= $asmember_options_bookings['asmember_options_bookings_email_verl_from'];
					}else
					{					
						$asmember_options_bookings_email_betreff = $asmember_options_bookings['asmember_options_bookings_email_verl_aut_betreff'];
						$asmember_options_bookings_email_text	= $asmember_options_bookings['asmember_options_bookings_email_verl_aut_text'];
						$asmember_options_bookings_email_from	= $asmember_options_bookings['asmember_options_bookings_email_verl_aut_from'];
					}
				
					$user=get_user_by('id',$item->user_id);
			
					$asmember_options_bookings_email_text = str_replace("%vorname%",$user->first_name,$asmember_options_bookings_email_text);
					$asmember_options_bookings_email_text = str_replace("%name%",$user->last_name,$asmember_options_bookings_email_text);			
					// %membership%
					$asmember_options_bookings_email_text = str_replace("%membership%",$item->membership,$asmember_options_bookings_email_text);
					//%datum_bis%					
					$asmember_options_bookings_email_text = str_replace("%datum_bis%",strftime("%d.%m.%Y",$item->datum_bis),$asmember_options_bookings_email_text);
					?>
					
	
			
					<form action="<?php echo esc_url(self_admin_url('admin.php?page=asmember_bookings'));?>" method="post" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">
    				
    				<div id="poststuff">
					
					<div class="postbox">					
						<h2 class="hndle ui-sortable-handle is-non-sortable"><span>Verl&auml;ngerungs-Erinnerung senden</span></h2>
						<div class="inside">
					    
                
        				<table class="form-table">
        				<tbody>
        				<tr>
        					<th scope="row">Email an:</th>
        					<td>
        						<label for="asmember_booking_email_email">
        						<input type="text" name="asmember_booking_email_email" size="50" value="<?php echo $user->user_email;?>"/>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row">Betreff:</th>
        					<td>
        						<label for="asmember_booking_email_betreff">
        						<input type="text" name="asmember_booking_email_betreff" size="50" value="<?php echo $asmember_options_bookings_email_betreff;?>"/>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row">Text:</th>
        					<td>
        						<label for="asmember_booking_email_text">
        						<textarea id="asmember_booking_email_text" cols="60" rows="8" name="asmember_booking_email_text"><?php echo $asmember_options_bookings_email_text;?></textarea>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row">EMail von:</th>
        					<td>
        						<label for="asmember_booking_email_from">
        						<input type="text" name="asmember_booking_email_from" size="50" value="<?php echo $asmember_options_bookings_email_from;?>"/>	
        						</label>
        					</td>
        				</tr>
        		
        				<tr>
        					<th scope="row">&nbsp;</th>
        					<td>
        						<input type="hidden" name="id" value="<?php echo $id;?>">
       							<input type="hidden" name="asmember_action" value="email_booking_verl">       			
           						<input type="submit" name="action" class="btn btn-primary pull-right" value="Senden"/>		
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
    	
    	
    		
				<?php
    			if($id>0)
    			{
					?>
				
    			
    				<form action="<?php echo admin_url('admin.php?page=asmember_bookings');?>" method="post" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">
    			
                	<div id="poststuff">
					
					<div class="postbox">					
						<h2 class="hndle ui-sortable-handle is-non-sortable"><span><?php echo _e("Rechnung","asmember");?></span></h2>
						<div class="inside">
						
        				<table class="form-table">
        				<tbody>
        				<tr>
							<th scope="row"><?php echo _e("Ansicht:","asmember");?></th>
							<td>						
               					<?php echo $item->quittung;?>
							</td>
						</tr>       					
						
        				<tr>
							<th scope="row"><?php echo _e("Bearbeiten:","asmember");?></th>
							<td>						
               					<textarea name="asmember_payment_quittung" cols="120" rows="15"><?php echo $item->quittung;?></textarea>	
							</td>
						</tr>       					
						<tr>
							<th scope="row">&nbsp;</th>
							<td>
								<input type="hidden" name="id" value="<?php echo $id;?>">
       							<input type="hidden" name="asmember_action" value="save_payment_quittung">
       							<input type="submit" name="action2" class="btn btn-primary pull-right" value="<?php echo _e("Speichern","asmember");?>"/>
           						<input type="submit" name="action2" class="btn btn-primary pull-right" value="<?php echo _e("Rechnung erstellen","asmember");?>"/>	
           						<input type="submit" name="action2" class="btn btn-primary pull-right" value="<?php echo _e("Als Email senden","asmember");?>"/>
           						<?php
								if($item->pdf_file!="")
								{
									echo "<a class=\"btn\" href=\"".get_home_url()."/wp-content/uploads/asmember-quittung/".$item->pdf_file."\" target=\"_blank\">"._e("pdf anzeigen","asmember")."</a>\n";
								}
								?>
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
    			
    			
    			
    			<?php
    			if($id>0)
    			{
					?>
				
    			
    				<form action="<?php echo admin_url('admin.php?page=asmember_bookings');?>" method="post" id="temp-acadp-post-form" class="form-vertical" role="form" enctype="multipart/form-data">
    			
                	<div id="poststuff">
					
					<div class="postbox">					
						<h2 class="hndle ui-sortable-handle is-non-sortable"><span>Rechnung hochladen</span></h2>
						<div class="inside">
						
        				<table class="form-table">
        				<tbody>
        				<tr>
							<th scope="row"><?php echo _e("Ansicht:","asmember");?></th>
							<td>						
               					<?php echo $item->pdf_file;?>
               					
               					<?php
								if($item->pdf_file_url!="")
								{
									echo "<a class=\"btn\" href=\"".$item->pdf_file_url."\" target=\"_blank\">"._e("pdf anzeigen","asmember")."</a>\n";
								}
								?>																
							</td>
						</tr>       					
						
        				<tr>
							<th scope="row"><?php echo _e("Datei ausw&auml;hlen:","asmember");?></th>
							<td>						
								<input type="file" name="asmember_booking_pdf_file"/>               					
							</td>
						</tr>       					
						<tr>
							<th scope="row">&nbsp;</th>
							<td>
								<input type="hidden" name="id" value="<?php echo $id;?>">
       							<input type="hidden" name="asmember_action" value="save_booking_pdf_file">
       							<input type="submit" name="action2" class="btn btn-primary pull-right" value="<?php echo _e("Speichern","asmember");?>"/>
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
		
		
		
		
		
	
		if($asmember_action=="new_booking_save")
		{
			global $wpdb;
			
			if(isset($_REQUEST['speichern']))
			{
				if(isset($_REQUEST['asmember_bookings_status']))
					$asmember_bookings_status=$_REQUEST['asmember_bookings_status'];else 
					$asmember_bookings_status=0;
				if(isset($_REQUEST['asmember_bookings_user_id']))
					$asmember_bookings_user_id=$_REQUEST['asmember_bookings_user_id'];else
					$asmember_bookings_user_id=0;
				
				if(isset($_REQUEST['asmember_bookings_membership_id']))
					$asmember_bookings_membership_id=$_REQUEST['asmember_bookings_membership_id'];else
					$asmember_bookings_membership_id=0;
			
				if(isset($_REQUEST['asmember_bookings_datum_von']))
					$asmember_bookings_datum_von=$_REQUEST['asmember_bookings_datum_von'];else
					$asmember_bookings_datum_von="";
				
				if(isset($_REQUEST['asmember_bookings_payment']))
					$asmember_bookings_payment=$_REQUEST['asmember_bookings_payment'];else
					$asmember_bookings_payment="paypal";
					
			
			
				//Membership holen
				if($asmember_bookings_user_id>0 and $asmember_bookings_membership_id>0)
				{
					
					$membership_post=get_post($asmember_bookings_membership_id);
					$user=get_user_by("id",$asmember_bookings_user_id);
					
					$datum_von_pieces=explode("-",$asmember_bookings_datum_von);
					$datum_erstell=mktime(0,0,0,$datum_von_pieces[1],$datum_von_pieces[2],$datum_von_pieces[0]);
									
					$d=getdate($datum_erstell);
					if($membership_post->_asmember_memberships_period==0)$datum_bis=0;
					if($membership_post->_asmember_memberships_period==1)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+1,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==2)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+2,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==3)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+3,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==4)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+4,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==5)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+5,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==6)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+6,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==7)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+7,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==8)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+8,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==9)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+9,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==10)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+10,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==11)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+11,$d["mday"],$d["year"]);
					if($membership_post->_asmember_memberships_period==12)$datum_bis=mktime($d["hours"],$d["minutes"],$d["seconds"],$d["mon"]+12,$d["mday"],$d["year"]);
					
					if($membership_post->_asmember_memberships_angebot_betrag<$membership_post->_asmember_memberships_betrag and $membership_post->_asmember_memberships_angebot_bis>time())
					{
						$asmember_memberships_betrag=		str_replace(",",".",$membership_post->_asmember_memberships_angebot_betrag);
						$asmember_memberships_betrag_mwst=	str_replace(",",".",$membership_post->_asmember_memberships_angebot_betrag_mwst);
						$asmember_memberships_betrag_netto=	str_replace(",",".",$membership_post->_asmember_memberships_angebot_betrag_netto);
					}else
					{
										
						$asmember_memberships_betrag=		str_replace(",",".",$membership_post->_asmember_memberships_betrag);
						$asmember_memberships_betrag_mwst=	str_replace(",",".",$membership_post->_asmember_memberships_betrag_mwst);
						$asmember_memberships_betrag_netto=	str_replace(",",".",$membership_post->_asmember_memberships_betrag_netto);
					}
				
					$asmember_bookings_renew = $membership_post->_asmember_memberships_renew;
					
					$user_name=$user->first_name." ".$user->last_name;
					
					if($datum_bis!=0)
					{									
						$renew_time=$membership_post->_asmember_memberships_renew_von*7;
						$datum_renew=$datum_bis-(60*60*24*$renew_time);
					}else $datum_renew=0;	
								
					if($datum_bis!=0)
					{									
						$renew_end_time=$membership->_asmember_memberships_renew_bis*7;
						$datum_renew_end=$datum_bis+(60*60*24*$renew_end_time);
					}else $datum_renew_end=0;	
							
								
				
					$sql="insert into ".$wpdb->prefix."asmember_user (datum_renew,datum_renew_end,verl_id,renew,user_id,user_name,membership_id,membership,datum_erstell,datum_bis,status,payment,betrag,betrag_mwst,betrag_netto) values
						(".$datum_renew.",".$datum_renew_end.",0,".$asmember_bookings_renew.",".$user->ID.",'".$user_name."',".$asmember_bookings_membership_id.",'".$membership_post->post_title."',".$datum_erstell.",".$datum_bis.",".$asmember_bookings_status.",'',".$asmember_memberships_betrag.",".$asmember_memberships_betrag_mwst.",".$asmember_memberships_betrag_netto.")";
					$result=$wpdb->query($sql);
											
				}					
				
			}
			$asmember_action="list_bookings";
		}
		
		
		
		
		
		if($asmember_action=="new_booking")
		{
			global $wpdb;
			$id=0;
			?>
			
			
			
			
			
			<div class="wrap">
				<h1 class="wp-heading-inline"><?php echo _e("Buchung erstellen","asmember");?></h1>		
				<hr class="wp-header-end">	
				
				<div id="poststuff">
				
					<div class="postbox">					
						<h2 class="hndle ui-sortable-handle is-non-sortable"><span><?php echo _e("Information","asmember");?></span></h2>
						<div class="inside">
						
							<div class="asfirms-user-edit-entry">
			
							<form name="asmember_booking" action="<?php echo admin_url('admin.php?page=asmember_bookings');?>" method="post">
							<table class="form-table">
				
							<tr>
								<th scope="row"><?php echo _e("Benutzer:","asmember");?></th>
								<td>
									<select name="asmember_bookings_user_id">
									<?php
									$users=get_users();
									foreach ( $users as $user )
									{
										echo "<option value=\"".$user->ID."\">\n";
										echo $user->first_name." ".$user->last_name." (".$user->user_login.")";
										echo "</option>\n";
									}
									?>									
									</select>
								</td>
							</tr>
							
							<tr>
								<th scope="row"><?php echo _e("Mitgliedschaft:","asmember");?></th>
								<td>
									<select name="asmember_bookings_membership_id">
									<?php 
									$args=array(
											'post_type'=>'asmember_memberships',
											'numberposts'=>-1,
										);
									$posts=get_posts($args);
									foreach($posts as $item)
									{
										echo "<option value=\"".$item->ID."\">";
										echo $item->post_title;
										echo "</option>\n";
									}										
									?>
									</select>									
								</td>
							</tr>
							<tr>
								<th scope="row"><?php echo _e("Datum:","asmember");?></th>
								<td>
									<?php $akt_date=strftime("%Y-%m-%d",time());?>
									<input type="date" name="asmember_bookings_datum_von" value="<?php echo $akt_date;?>"/>	
								</td>
							</tr>
							
							<tr>
								<th scope="row"><?php echo _e("Status:","asmember");?></th>
								<td>
									<select name="asmember_bookings_status">
									<option value="0"><?php echo _e("offen","asmember");?></option>
									<option value="1"><?php echo _e("best&auml;tigt");?></option>
									</select>
								</td>
							</tr>
				
							
							
							<tr>
								<th scope="row"><?php echo _e("Zahlung:","asmember");?></th>
								<td>
									<select name="asmember_bookings_payment">
									<option value="paypal"><?php echo _e("Paypal","asmember");?></option>
									<option value="bank"><?php echo _e("&Uuml;berweisung");?></option>
									</select>
								</td>
							</tr>
											
							<tr>
								<th scope="row">&nbsp;</th>
								<td>
									<input type="hidden" name="asmember_action" value="new_booking_save"/>									
									<input type="submit" name="speichern" value="<?php echo _e("Speichern","asmember");?>"/>
									<input type="submit" name="abbrechen" value="<?php echo _e("Abbrechen","asmember");?>"/>
								</td>
							</tr>
							</table>
				
				
							</form>
							</div>
						</div>
					</div>
				</div>
				
				
    			
			</div>
			
			<?php
		}
		
		
		
		
		
	
	
	
	if($asmember_action=="list_bookings_verl")
	{
		global $wpdb;
		
		$sql="select * from ".$wpdb->prefix."asmember_user where verl_id=0";
		if(isset($_REQUEST["as_status"]))$asmember_bookings_search_status=sanitize_text_field($_REQUEST["as_status"]);else $asmember_bookings_search_status=-1;
		if($asmember_bookings_search_status==0)$sql.=" and status=0";
		if($asmember_bookings_search_status==1)$sql.=" and status=1";
		
		if(isset($_REQUEST["as_user"]))$asmember_bookings_search_user=sanitize_text_field($_REQUEST["as_user"]);else $asmember_bookings_search_status=0;
		
		if(isset($asmember_bookings_search_user))
		if($asmember_bookings_search_user>0)$sql.=" and user_id=".$asmember_bookings_search_user;
		
		if(isset($_REQUEST["as_datum_von"]))$asmember_bookings_search_datum_von=sanitize_text_field($_REQUEST["as_datum_von"]);else $asmember_bookings_search_datum_von="";
		
		if($asmember_bookings_search_datum_von!="")
		{
			$date = DateTime::createFromFormat('Y-m-j', $asmember_bookings_search_datum_von);
  			if($date) $sql.=" and datum_erstell>=".$date->getTimestamp();
		}
		
		
		if(isset($_REQUEST["as_datum_bis"]))$asmember_bookings_search_datum_bis=sanitize_text_field($_REQUEST["as_datum_bis"]);else $asmember_bookings_search_datum_bis="";
		if($asmember_bookings_search_datum_bis!="")
		{
			$date = DateTime::createFromFormat('Y-m-j', $asmember_bookings_search_datum_bis);
  			if($date) $sql.=" and datum_bis<=".$date->getTimestamp();
		}
		$sql.=" order by datum_bis";
		
		$rows=$wpdb->get_results($sql);
		
		echo "<div class=\"wrap\">\n";
			echo "<h1 class=\"wp-heading-inline\">".__("Buchungen - Verl&auml;ngerung","asmember")."</h1>\n";
			
			
			echo sprintf('<a href="%s" class="page-title-action">%s</a>',esc_url(self_admin_url('admin.php?page=asmember_bookings&asmember_action=list_bookings')),__("Alle Buchungen"));
			
			
			echo "<hr class=\"wp-header-end\">\n";
			
			
			?>
			<div style="height:40px;margin-bottom:10px;">
			<form method="post" name="asverein_payment_search_form">
			
			<p class="search-box">
				
				<label>Datum von:</label>
				<input type="date" name="as_datum_von" value="<?php echo $_REQUEST["as_datum_von"];?>"/>
				
				<label>Datum von:</label>
				<input type="date" name="as_datum_bis" value="<?php echo $_REQUEST["as_datum_bis"];?>"/>
				
				<?php
				if(isset($_REQUEST["as_status"]))$as_status=$_REQUEST["as_status"];else $as_status=-1;
				?>
				<label>Status:</label>
				<select name="as_status">
					<option value="-1">Alle</a>
					<option value="0"<?php if($as_status==0)echo " selected";?>>offen</option>
					<option value="1"<?php if($as_status==1)echo " selected";?>>bezahlt</option>
				</select>
				
				<label>Mitglied:</label>
				<select name="as_user">
					<option value="0">Alle</option>
					<?php
					$blogusers = get_users( );
					// Array of WP_User objects.
					if(isset($_REQUEST["asverein_payment_search_user"]))$asverein_payment_search_user=$_REQUEST["asverein_payment_search_user"];else $asverein_payment_search_user=0;
					foreach ( $blogusers as $user )
					{
						echo '<option value="'.$user->ID.'"';
						if($user->ID==$asverein_payment_search_user)echo " selected";
						echo '>' . esc_html( $user->user_login ) . '</option>';
					}
					?>
				</select>
				<input type="submit" name="asverein_payment_search" value="Suchen" class="button"/>
				
			</p>
			</form>
			</div>
			
			
			<?php
			echo "<table class=\"wp-list-table widefat fixed striped\">";
			echo "<thead>\n";
			echo "<tr>\n";			
			echo "	<th class=\"manage-column\">User:</th>\n";
			echo "  <th class=\"manage-column\">Mitgliedschaft:</th>\n";
			echo "	<th class=\"manage-column\">Betrag:</th>\n";
			echo "	<th class=\"manage-column\">Datum von:</th>\n";
			echo "	<th class=\"manage-column\">Datum bis:</th>\n";
			
			echo "  <th class=\"manage-column\">Autom. Verl.:</th>\n";
			echo "	<th class=\"manage-column\">Verl. von:</th>\n";
			echo "	<th class=\"manage-column\">Verl. bis:</th>\n";
			
			
			echo "  <th class=\"manage-column\">EMail Zahlung:</th>\n";
			
			echo "	<th class=\"manage-column\">Status:</th>\n";
			echo "	<th class=\"manage-column\">&nbsp;</th>\n";
			echo "	<th class=\"manage-column\">&nbsp;</th>\n";
						
			echo "</tr>\n";
			echo "</thead>\n";
			if(count($rows)==0)
			{
				echo "<tr>\n";
				echo "  <td colspan=\"9\">Keine Datens&auml;tze vorhanden</td>\n";
				echo "</tr>\n";
			}else
			foreach($rows as $item)
			{
				echo "<tr>";
				echo "  <td>".$item->user_name."(".$item->user_id.")</td>\n";
				echo "  <td>".$item->membership."</td>\n";
				echo "	<td>".str_replace(".",",",sprintf("%0.2f", $item->betrag)) . " &euro;</td>";
				
				
				echo "	<td>".strftime("%d.%m.%Y",$item->datum_erstell)."</td>\n";
				if($item->datum_bis>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->datum_bis-2)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
				
				echo "  <td>\n";
					if($item->renew==1)echo "ja";else echo "nein";
				echo "	</td>\n";	
				
				if($item->datum_renew>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->datum_renew-2)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
				
				
				if($item->datum_renew_end>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->datum_renew_end-2)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
								
					
				if($item->status==0)echo "	<td>".__("offen","asmember")."</td>\n";
				if($item->status==1)echo "	<td>".__("bezahlt","asmember")."</td>\n";
				//if($item->status==2)echo "	<td>angewiesen/exportiert</td>\n";
				
				echo "	<td><a href=\"".esc_url(self_admin_url("admin.php?page=asmember_bookings&asmember_action=verl_booking&id=".$item->id))."\">".__("Verl&auml;ngern","asmember")."</a></td>\n";				
				echo "	<td><a href=\"".esc_url(self_admin_url("admin.php?page=asmember_bookings&asmember_action=storno_booking&id=".$item->id))."\">".__("Stornieren","asmember")."</a></td>\n";				
				echo "</tr>\n";
			}
			echo "</table>\n";
			
		echo "</div>\n";			
			
		
	
			
		$sql="select * from ".$wpdb->prefix."asmember_user where verl_id=-2";
		$sql.=" order by datum_bis";
		
		$rows=$wpdb->get_results($sql);
		
		echo "<div class=\"wrap\">\n";
			echo "<h1 class=\"wp-heading-inline\">".__("Stornierungen","asmember")."</h1>\n";			
			echo "<hr>\n";		
			
			echo "<table class=\"wp-list-table widefat fixed striped\">";
			echo "<thead>\n";
			echo "<tr>\n";			
			echo "	<th class=\"manage-column\">User:</th>\n";
			echo "  <th class=\"manage-column\">Mitgliedschaft:</th>\n";
			echo "	<th class=\"manage-column\">Betrag:</th>\n";
			echo "	<th class=\"manage-column\">Datum von:</th>\n";
			echo "	<th class=\"manage-column\">Datum bis:</th>\n";
			
			echo "  <th class=\"manage-column\">Autom. Verl.:</th>\n";
			echo "	<th class=\"manage-column\">Verl. von:</th>\n";
			echo "	<th class=\"manage-column\">Verl. bis:</th>\n";
			
			
			echo "  <th class=\"manage-column\">Last-EMail:</th>\n";
			echo "	<th class=\"manage-column\">Status:</th>\n";
			echo "	<th class=\"manage-column\">&nbsp;</th>\n";
			
			echo "</tr>\n";
			echo "</thead>\n";
			if(count($rows)==0)
			{
				echo "<tr>\n";
				echo "  <td colspan=\"9\">Keine Datens&auml;tze vorhanden</td>\n";
				echo "</tr>\n";
			}else
			foreach($rows as $item)
			{
				echo "<tr>";
				echo "  <td>".$item->user_name."(".$item->user_id.")</td>\n";
				echo "  <td>".$item->membership."</td>\n";
				echo "	<td>".str_replace(".",",",sprintf("%0.2f", $item->betrag)) . " &euro;</td>";
				
				
				echo "	<td>".strftime("%d.%m.%Y",$item->datum_erstell)."</td>\n";
				if($item->datum_bis>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->datum_bis-2)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
				
				echo "  <td>\n";
					if($item->renew==1)echo "ja";else echo "nein";
				echo "	</td>\n";	
				
				if($item->datum_renew>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->datum_renew-2)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
				
				
				if($item->datum_renew_end>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->datum_renew_end-2)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
				
				if($item->last_email>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->last_email)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
				
				if($item->status==0)echo "	<td>".__("offen","asmember")."</td>\n";
				if($item->status==1)echo "	<td>".__("bezahlt","asmember")."</td>\n";
				//if($item->status==2)echo "	<td>angewiesen/exportiert</td>\n";
						
				echo "	<td><a href=\"".esc_url(self_admin_url("admin.php?page=asmember_bookings&asmember_action=storno_booking&id=".$item->id))."\">".__("Stornieren","asmember")."</a></td>\n";				
				echo "</tr>\n";
			}
			echo "</table>\n";
			
		echo "</div>\n";
		
					
	}	
	
	
	
	
		if($asmember_action=="list_bookings")
		{
			global $wpdb;
		
			$sql="select * from ".$wpdb->prefix."asmember_user where 1=1";
			if(isset($_REQUEST["as_status"]))$asmember_bookings_search_status=sanitize_text_field($_REQUEST["as_status"]);else $asmember_bookings_search_status=-1;
			if($asmember_bookings_search_status==0)$sql.=" and status=0";
			if($asmember_bookings_search_status==1)$sql.=" and status=1";
		
			if(isset($_REQUEST["as_user"]))$asmember_bookings_search_user=sanitize_text_field($_REQUEST["as_user"]);else $asmember_bookings_search_status=0;
		
			if(isset($asmember_bookings_search_user))
			if($asmember_bookings_search_user>0)$sql.=" and user_id=".$asmember_bookings_search_user;
		
			if(isset($_REQUEST["as_datum_von"]))$asmember_bookings_search_datum_von=sanitize_text_field($_REQUEST["as_datum_von"]);else $asmember_bookings_search_datum_von="";
		
			if($asmember_bookings_search_datum_von!="")
			{
				$date = DateTime::createFromFormat('Y-m-j', $asmember_bookings_search_datum_von);
  				if($date) $sql.=" and datum_erstell>=".$date->getTimestamp();
			}
		
		
			if(isset($_REQUEST["as_datum_bis"]))$asmember_bookings_search_datum_bis=sanitize_text_field($_REQUEST["as_datum_bis"]);else $asmember_bookings_search_datum_bis="";
			if($asmember_bookings_search_datum_bis!="")
			{
				$date = DateTime::createFromFormat('Y-m-j', $asmember_bookings_search_datum_bis);
  				if($date) $sql.=" and datum_bis<=".$date->getTimestamp();
			}

		
			$sql.=" order by datum_erstell desc";
		
			$rows=$wpdb->get_results($sql);
		
			echo "<div class=\"wrap\">\n";
				echo "<h1 class=\"wp-heading-inline\">";
				echo __("Buchungen","asmember");
				echo "</h1>\n";
			
			
			echo sprintf('<a href="%s" class="page-title-action">%s</a>',esc_url(self_admin_url('admin.php?page=asmember_bookings&asmember_action=new_booking&id=0')),__("Neue Buchung"));
			echo sprintf('<a href="%s" class="page-title-action">%s</a>',esc_url(self_admin_url('admin.php?page=asmember_bookings&asmember_action=list_bookings_verl')),__("Verl&auml;ngerungen"));
			
			echo "<hr class=\"wp-header-end\">\n";
			
			
			?>
			<div style="height:40px;margin-bottom:10px;">
			<form method="post" name="asverein_payment_search_form">
			
			<p class="search-box">
				
				<label>Datum von:</label>
				<input type="date" name="as_datum_von" value="<?php echo $_REQUEST["as_datum_von"];?>"/>
				
				<label>Datum von:</label>
				<input type="date" name="as_datum_bis" value="<?php echo $_REQUEST["as_datum_bis"];?>"/>
				
				<?php
				if(isset($_REQUEST["as_status"]))$as_status=$_REQUEST["as_status"];else $as_status=-1;
				?>
				<label>Status:</label>
				<select name="as_status">
					<option value="-1">Alle</a>
					<option value="0"<?php if($as_status==0)echo " selected";?>>offen</option>
					<option value="1"<?php if($as_status==1)echo " selected";?>>bezahlt</option>
				</select>
				
				<label>Mitglied:</label>
				<select name="as_user">
					<option value="0">Alle</option>
					<?php
					$blogusers = get_users( );
					// Array of WP_User objects.
					if(isset($_REQUEST["asverein_payment_search_user"]))$asverein_payment_search_user=$_REQUEST["asverein_payment_search_user"];else $asverein_payment_search_user=0;
					foreach ( $blogusers as $user )
					{
						echo '<option value="'.$user->ID.'"';
						if($user->ID==$asverein_payment_search_user)echo " selected";
						echo '>' . esc_html( $user->user_login ) . '</option>';
					}
					?>
				</select>
				<input type="submit" name="asverein_payment_search" value="Suchen" class="button"/>
				
			</p>
			</form>
			</div>
			
			
			<?php
			echo "<table class=\"wp-list-table widefat fixed striped\">";
			echo "<thead>\n";
			echo "<tr>\n";			
			echo "	<th class=\"manage-column\">".__("User:","asmember")."</th>\n";
			echo "  <th class=\"manage-column\">".__("Mitgliedschaft:","asmember")."</th>\n";
			echo "	<th class=\"manage-column\">".__("Betrag:","asmember")."</th>\n";
			echo "	<th class=\"manage-column\">".__("Datum von:","asmember")."</th>\n";
			echo "	<th class=\"manage-column\">".__("Datum bis:","asmember")."</th>\n";
			echo "  <th class=\"manage-column\">".__("Betreff:","asmember")."</th>\n";
			echo "  <th class=\"manage-column\">".__("Zahlungsweise:","asmember")."</th>\n";
			echo "  <th class=\"manage-column\">".__("EMail Zahlung:","asmember")."</th>\n";
			echo "  <th class=\"manage-column\">".__("EMail Verl&auml;ngerung:","asmember")."</th>\n";
			echo "	<th class=\"manage-column\">".__("Zahlung:","asmember")."</th>\n";
			echo "  <th class=\"manage-column\">".__("Verl&auml;ngerung:","asmember")."</th>\n";
			echo "	<th class=\"manage-column\">&nbsp;</th>\n";
			echo "	<th class=\"manage-column\">&nbsp;</th>\n";
			echo "	<th class=\"manage-column\">&nbsp;</th>\n";
			echo "</tr>\n";
			echo "</thead>\n";
			if(count($rows)==0)
			{
				echo "<tr>\n";
				echo "  <td colspan=\"9\">".__("Keine Datens&auml;tze vorhanden","asmember")."</td>\n";
				echo "</tr>\n";
			}else
			foreach($rows as $item)
			{
				echo "<tr>";
				echo "  <td>".$item->user_name."(".$item->user_id.")</td>\n";
				echo "  <td>".$item->membership."</td>\n";
				echo "	<td>".str_replace(".",",",sprintf("%0.2f", $item->betrag)) . " &euro;</td>";
				
				
				echo "	<td>".strftime("%d.%m.%Y",$item->datum_erstell)."</td>\n";
				if($item->datum_bis>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->datum_bis-2)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
				echo "  <td>".$item->betreff."</td>\n";	
				echo "  <td>\n";
					if($item->payment=="paypal")echo __("Paypal","asmember");
					if($item->payment=="bank")  echo __("&Uuml;berweisung","asmember");					
				echo "  </td>\n";
				if($item->last_email>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->last_email)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
					
				if($item->last_email_verl>0)
					echo "	<td>".strftime("%d.%m.%Y",$item->last_email_verl)."</td>\n";else
					echo "  <td>&nbsp;</td>\n";
					
				if($item->status==0)
					echo "	<td>".__("offen","asmember")."</td>\n";else
					echo "	<td>".__("best&auml;tigt","asmember")."</td>\n";
				//Verlängerung
				echo "  <td>\n";
					if($item->verl_id>0)echo __("Verl&auml;ngert","asmember");
					if($item->verl_id==0)echo __("Nicht verl&auml;ngert","asmember");
					if($item->verl_id==-1)echo __("Storniert","asmember");
					if($item->verl_id==-2)echo __("Von Mitglied storniert","asmember");
				echo "  </td>\n";
				
				echo "	<td><a href=\"".esc_url(self_admin_url("admin.php?page=asmember_bookings&asmember_action=edit_booking&id=".$item->id))."\">".__("Bearbeiten","asmember")."</a></td>\n";
				echo "	<td><a href=\"".esc_url(self_admin_url("admin.php?page=asmember_bookings&asmember_action=del_booking&id=".$item->id))."\">".__("L&ouml;schen","asmember")."</a></td>\n";
				
				echo "	<td>";
					if($item->verl_id==0)echo "<a href=\"".esc_url(self_admin_url("admin.php?page=asmember_bookings&asmember_action=verl_booking&id=".$item->id))."\">".__("Verl&auml;ngern","asmember")."</a>\n";else echo "&nbsp;";
				echo "  </td>\n";				
				echo "</tr>\n";
			}
			echo "</table>\n";
					
			
			
			echo "</div>\n";	
		
			
			
			
		}	
	
	
	
	}
	
	
	
	
}	

$asmember_bookings_obj = new asmember_bookings();