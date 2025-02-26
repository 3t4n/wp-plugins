<?php

class asmember_login_stat
{

	public function __construct()
	{
		
	}
	
	public function asmember_login_stat_page_output()
	{
		
		if(isset($_REQUEST['asmember_action']))$asmember_action=$_REQUEST['asmember_action'];else $asmember_action="list_login_stat";
	
		
	
	
		if($asmember_action=="list_login_stat")
		{
			global $wpdb;
		
			$sql="select * from ".$wpdb->prefix."asmember_login_stat order by datum desc";
			$rows=$wpdb->get_results($sql);
		
			echo "<div class=\"wrap\">\n";
				echo "<h1 class=\"wp-heading-inline\">"._e("Login-Statistik","asmember")."</h1>\n";
			
				echo "<hr class=\"wp-header-end\">\n";
			
				echo "<table class=\"wp-list-table widefat fixed striped\">";
				echo "<thead>\n";
				echo "<tr>\n";			
				echo "	<th class=\"manage-column\">";echo _e("Benutzer:","asmember");echo "</th>\n";
				echo "  <th class=\"manage-column\">";echo _e("Datum:","asmember");echo "</th>\n";
				echo "  <th class=\"manage-column\">";echo _e("Letzte Logins:","asmember");echo "</th>\n";
				echo "	<th class=\"manage-column\">";echo _e("Anzahl:","asmember");echo "</th>\n";
				echo "</tr>\n";
				echo "</thead>\n";
		
				foreach($rows as $item)
				{
					echo "<tr>";					
					echo "  <td>".$item->user." (".$item->user_id.")</td>\n";					
					echo "	<td>".strftime("%d.%m.%Y",$item->datum)."</td>\n";
					echo "  <td>\n";
						if($item->last_logins!="")
						{							
							$logins=explode(",",$item->last_logins);
							foreach($logins as $login)
							{
								echo strftime("%d.%m.%Y %H:%M",$login)."<br>";
							}
						}	
					echo "  </td>\n";
					echo "	<td>".$item->anzahl."</td>\n";
					echo "</tr>\n";
				}
				echo "</table>\n";
			
			echo "</div>\n";	
		}	
	
	
	}
}	

$asmember_login_stat = new asmember_login_stat();
	
	