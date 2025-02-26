<?php 
	function table_display_plugin_options() {

		$bus311mtd_default_file_upload_directory='files'; // setting must be declared in abase.php and abase_plugin_options.php

		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		$cusr=get_current_user();

		$cusrlen=strlen($cusr)+1;
		$wpdbname=DB_NAME; $wpdbnamePrefix=substr($wpdbname,0,strpos($wpdbname,'_'));
		$wpdbuser=DB_USER;$wpdbuserPrefix=substr($wpdbuser,0,strpos($wpdbuser,'_'));
		$cpanelUser='';
		if(strlen($wpdbnamePrefix)>0 && $wpdbnamePrefix==$wpdbuserPrefix){$cpanelUser=$wpdbnamePrefix;};

/*
// do not allow switching from show=3 to show=1 
// if 
// any database name does not start with $cusr.'_' or
// user does not start with $cusr.'_' or
//
// any database2 parameter not blank or
// any database3 parameter not blank

if(dbshow_old==0 && 

*/

		if($_POST['bus311mtd_hidden'] == 'Y') {  
			//Form data sent  
			$dbshow_old = get_option('bus311mtd_show');  
			$dbshow = $_POST['bus311mtd_show'];  
			if($dbshow_old==0){
// from 1 database to 1 database or from 1 database to 3 databases
				$dbname_nu=$_POST['bus311mtd_dbname_nu'];
				$dbname='';
				if($dbname_nu>''){
					$dbname=$cusr.'_'.$dbname_nu;
//					$dbname=$dbname_nu;
				};
				update_option('bus311mtd_dbname', $dbname);  
				$dbuser_nu=$_POST['bus311mtd_dbuser_nu'];
				$dbuser='';
				if($dbuser_nu>''){
					$dbuser=$cusr.'_'.$dbuser_nu;
//					$dbuser=$dbuser_nu;
				};
				update_option('bus311mtd_dbuser', $dbuser);
				$dbpwd = $_POST['bus311mtd_dbpwd'];
				if($dbuser==''){
					update_option('bus311mtd_dbpwd', '');
				}else if($dbpwd>''){
					update_option('bus311mtd_dbpwd', $dbpwd);
				};
				$dbfiles = $_POST['bus311mtd_dbfiles'];
				update_option('bus311mtd_dbfiles', $dbfiles);
				if($create_databases==1){
					if($_POST['bus311mtd_createdb']==1){
//						create_database('',$_POST['bus311mtd_cpanelpw'],$dbname,$dbuser,$dbpw);
					};
				};
				update_option('bus311mtd_show', $dbshow);
			}else if($dbshow_old > 0){
				$lp=9;
				for($i=1;$i<=$lp;$i+=1){
					if($i==1){
						$dbn='';
					}else if($i>=2){
						$dbn=$i;
					};
					$dbhost = $_POST['bus311mtd_dbhost'.$dbn];  
					update_option('bus311mtd_dbhost'.$dbn, $dbhost);  
					$dbname = $_POST['bus311mtd_dbname'.$dbn];  
					update_option('bus311mtd_dbname'.$dbn, $dbname);  
					$dbuser = $_POST['bus311mtd_dbuser'.$dbn];  
					update_option('bus311mtd_dbuser'.$dbn, $dbuser);  
					$dbpwd = $_POST['bus311mtd_dbpwd'.$dbn];  
					if($dbuser==''){
						update_option('bus311mtd_dbpwd'.$dbn, '');
					}else if($dbpwd>''){
						update_option('bus311mtd_dbpwd'.$dbn, $dbpwd);
					};
					$dbfiles = $_POST['bus311mtd_dbfiles'.$dbn];  
					update_option('bus311mtd_dbfiles'.$dbn, $dbfiles);
					if($create_databases==1){
						if($_POST['bus311mtd_createdb'.$dbn]==1){
//							create_database($dbhost,$_POST['bus311mtd_cpanelpw'.$dbn],$dbname,$dbuser,$dbpw);
						};
					};
				};
// 
//				if(($dbshow==0 && ($_POST['bus311mtd_dbname']=='' || substr($_POST['bus311mtd_dbname'],0,$cusrlen)==$cusr.'_') && ($_POST['bus311mtd_dbuser']=='' || substr($_POST['bus311mtd_dbuser'],0,$cusrlen)==$cusr.'_') && $cb1ok=='')){
				if($dbshow==0){
					update_option('bus311mtd_show', $dbshow);
				};
			};
			$disable_wptexturize=$_POST['bus311mtd_disable_wptexturize']; update_option('bus311mtd_disable_wptexturize', $disable_wptexturize);
			$form_min=$_POST['bus311mtd_form_min'];	update_option('bus311mtd_form_min', $form_min);
			$form_max=$_POST['bus311mtd_form_max'];	update_option('bus311mtd_form_max', $form_max);
			?>  
			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
			<?php 

		};
	//Normal page display


		$dbshow='';if(get_option('bus311mtd_show')){$dbshow = get_option('bus311mtd_show');}else{update_option('bus311mtd_show', '');};

		$disable_wptexturize='';
		if(get_option('bus311mtd_disable_wptexturize')){
			$disable_wptexturize = get_option('bus311mtd_disable_wptexturize');
		}else{
			update_option('bus311mtd_disable_wptexturize', '');
		};

		$form_min='';if(get_option('bus311mtd_form_min')){$form_min = get_option('bus311mtd_form_min');}else{update_option('bus311mtd_form_min', '0');};
		$form_max='';if(get_option('bus311mtd_form_max')){$form_max = get_option('bus311mtd_form_max');}else{update_option('bus311mtd_form_max', '0');};

//		$valid_forms='';if(get_option('bus311mtd_current_forms')){$valid_forms = get_option('bus311mtd_current_forms');}else{update_option('bus311mtd_current_forms', '');};
		$dbhost='';if(get_option('bus311mtd_dbhost')){$dbhost = get_option('bus311mtd_dbhost');}else{update_option('bus311mtd_dbhost', '');};
		$dbname='';if(get_option('bus311mtd_dbname')){$dbname = get_option('bus311mtd_dbname');}else{update_option('bus311mtd_dbname', '');};
		$dbuser='';if(get_option('bus311mtd_dbuser')){$dbuser = get_option('bus311mtd_dbuser');}else{update_option('bus311mtd_dbuser', '');};
		$dbpwd='';if(get_option('bus311mtd_dbpwd')){$dbpwd = get_option('bus311mtd_dbpwd');}else{update_option('bus311mtd_dbpwd', '');};
		$dbfiles='';if(get_option('bus311mtd_dbfiles')){$dbfiles = get_option('bus311mtd_dbfiles');}else{update_option('bus311mtd_dbfiles', '');};

		$dbhost_=[];$dbname_=[];$dbpwd_=[];$dbuser_=[];$dbfiles_=[];
		for($k=2;$k<=9;$k++){
			$dbhost_[$k] = get_option('bus311mtd_dbhost'.$k);  
			$dbname_[$k] = get_option('bus311mtd_dbname'.$k);  
			$dbuser_[$k] = get_option('bus311mtd_dbuser'.$k);  
			$dbpwd_[$k] = get_option('bus311mtd_dbpwd'.$k); 
			$dbfiles_[$k] = get_option('bus311mtd_dbfiles'.$k);
		}

?> 
		<script language="JavaScript"> function bus311mtd_executeSubmitFunction(){document.getElementById('bus311mtd_form_id').submit()};</script>
		<div class="wrap">
			<h2>ABASE for Accessing MySQL Databases</h2><font style="font-size:14pt; font-weight: normal;">Settings and Reference</font><BR>

			<form id="bus311mtd_form_id" name="bus311mtd_form" method="post" autocomplete="off" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
				<input type="hidden" name="bus311mtd_hidden" value="Y">

							
		<?php 
				$lp=1;$fs=0;
				if($dbshow>0){$lp=9;$fs=1;};
//				$fs=1; //remove default user name for cPanel
				for($i=1;$i<=$lp;$i+=1){
					if($i==1){
						$dbn='';
						$sdbn='';
						$dhost=$dbhost;
						$dname=$dbname;
						$duser=$dbuser;
						$dpwd=$dbpwd;
						$dfiles=$dbfiles;
					}else if($i>=2){
						$dbn=$i;
						$sdbn=" $i";
						$dhost=$dbhost_[$i];
						$dname=$dbname_[$i];
						$duser=$dbuser_[$i];
						$dpwd=$dbpwd_[$i];
						$dfiles=$dbfiles_[$i];
					};
		?>			<table>
<?php 			if($i==1){
		?>
					
					<tr>
						<td colspan=2>&nbsp;</td>
						<td colspan=2 align=left>&nbsp;</td>
					</tr>
					<tr>
						<td align=right bgcolor="DDDDDD">Texturization:</td>
						<td>&nbsp;<input type="checkbox" name="bus311mtd_disable_wptexturize" value="1" <?php if($disable_wptexturize=='1') echo 'checked'; ?>>Disable wptexturize</td>
						<td colspan=2>Try disabling wptexturize if you are having trouble with quotes or other special characters in short codes.
						
						</td>
					</tr>
					<tr>
						<td align=right bgcolor="DDDDDD">Form Life:</td>
						<td><nobr>Min:<input type="text" name="bus311mtd_form_min" size="2" value="<?php echo $form_min; ?>">,</nobr> <nobr>Max:<input type="text" name="bus311mtd_form_max" size="3" value="<?php echo $form_max; ?>"></nobr></td>
						<td colspan=2>in Seconds. Valid form life. Before or afterwards, Insert, Update or Delete<BR>form not valid and database update will not occur. Set Max to 0 for non-enforcement.
						</td>
					</tr>

					<tr>
						<td colspan=2><h3>Database Settings:</h3></td>
						<td colspan=2 align=left><table><tr><td><input type="checkbox" name="bus311mtd_show" value="1" <?php  if($dbshow>0){echo "checked"; }; ?>>Expand to full settings (9 databases)</td><td><?php  submit_button() ?></td></tr></table>
						</td>
					</tr>
		<?php 					
					}else if($i>1){
						echo "<h3>Database Settings$sdbn:</h3>";
					};
					$dname_nouser=$dname;
					if(substr($dname,0,strlen($cusr)+1)==$cusr.'_'){$dname_nouser=substr($dname,strlen($cusr)+1);};
					$wp_dname_nouser=DB_NAME;
					if(substr($wp_dname_nouser,0,strlen($cusr)+1)==$cusr.'_'){$wp_dname_nouser=substr($wp_dname_nouser,strlen($cusr)+1);};
					$duser_nouser=$duser;
					if(substr($duser,0,strlen($cusr)+1)==$cusr.'_'){$duser_nouser=substr($duser,strlen($cusr)+1);};
					$wp_duser_nouser=DB_USER;
					if(substr($wp_duser_nouser,0,strlen($cusr)+1)==$cusr.'_'){$wp_duser_nouser=substr($wp_duser_nouser,strlen($cusr)+1);};

					if($dbshow>0){	?>
						<tr><td align=right bgcolor="DDDDDD">Database host<?php echo $sdbn;?>:</td>
							<td><input type="text" name="bus311mtd_dbhost<?php echo $dbn;?>" value="<?php echo $dhost; ?>" size="30"></td>
							<td colspan=2>leave blank unless you know specifically otherwise (<?php  echo "default: ".DB_HOST; ?>)</td>
						</tr>
<?php 				};	?>
						<tr><td align=right bgcolor="DDDDDD">Database name<?php echo $sdbn;?>:</td>
							<td><nobr>
						<?php if(!$fs){ echo $cusr.'_'; ?><input type="text" name="bus311mtd_dbname_nu<?php echo $dbn;?>" value="<?php echo $dname_nouser; ?>" size="20">
						<?php  }else{ ?>
							<input type="text" name="bus311mtd_dbname<?php echo $dbn;?>" value="<?php echo $dname; ?>" size="30">
						<?php  }; ?>
							</nobr></td>
							<td><?php  echo " leave blank for WordPress database (".DB_NAME.")"; ?></td>
<?php  if($create_databases==1){ ?> 
							<td>(required only if creating new database)</td>

						</tr>  
						<tr><td></td><td></td>
							<td align=right bgcolor="DDDDDD">Click <input type=checkbox name="bus311mtd_createdb<?php echo $dbn;?>" value="1"> if this is a new database and enter your cPanel Password:</td>
							<td><input type="password" name="bus311mtd_cpanelpw<?php echo $dbn;?>" size="30"></td>
<?php  }; ?>
						</tr>  
						<tr><td align=right bgcolor="DDDDDD">Database user<?php echo $sdbn;?>:</td>
							<td><?php  if(!$fs){ echo $cusr.'_'; ?><input type="text" name="bus311mtd_dbuser_nu<?php echo $dbn;?>" value="<?php echo $duser_nouser; ?>" size="20">
								<?php  }else{ ?>
									<input type="text" name="bus311mtd_dbuser<?php echo $dbn;?>" value="<?php echo $duser; ?>" size="30">
								<?php  }; ?>
							</td>
							<td colspan=2><?php  echo " leave blank if Database name is blank or the WordPress user (".DB_USER.") has permissions to access this database."; ?></td>
							<td></td>
						</tr>  
						<tr><td align=right bgcolor="DDDDDD"><?php  if($dpwd>''){echo '<a title="'.$dpwd.'">Database password:</a>';}else{echo 'Database password:';}; ?></td>
							<td><input type="<?php if($dpwd==''){ _e('text'); }else{_e('password');}; ?>" name="bus311mtd_dbpwd<?php echo $dbn;?>" value="<?php echo $dpwd; ?>" size="30"></td>
							<td colspan=2>leave blank if the Database user is blank</td>
						</tr>
						<tr><td align=right bgcolor="DDDDDD">File Upload Directory<?php echo $sdbn;?>:</td>
							<td colspan=3>http://<?php echo $_SERVER['HTTP_HOST']; ?>/<input type="text" name="bus311mtd_dbfiles<?php echo $dbn;?>" value="<?php echo $dfiles; ?>" <?php if($dfiles==''){echo 'placeholder="'.$bus311mtd_default_file_upload_directory.'"';};?> size="20">/&lt;table_name&gt;/&lt;column_name&gt;/&lt;primary_index&gt;/&lt;file_name&gt;</td>
						</tr>
						<?php  if($sdbn==''){ ?>
						<tr><td align=right bgcolor="DDDDDD">&nbsp;</td>
							<td colspan=3><table cellspacing=0 cellpadding=0 width=700><tr><td>where <B>/&lt;table_name&gt;/&lt;column_name&gt;/&lt;primary_index&gt;/</B> specifies the Internet accessible subdirectory within the directory you specify, where the file named <B>&lt;file_name&gt;</B> will be uploaded. The field type of <nobr><B>&lt;table_name&gt;.&lt;column_name&gt;</B></nobr> should be large enough to store the full path-file name (e.g., <B>varchar(255)</B>).<BR>
							The root directory name that you enter must be non-blank and will be created upon a file upload if it does not exist. A default root directory name of <B>/<?php  echo $bus311mtd_default_file_upload_directory; ?>/</B> will be created if none is specified. Be careful not to choose a directory name that could cause file names to interfere with other applications.							
							</td></tr></table>
							</td>
						</tr>
				<?php  }; ?>
					</table>
		<?php 	
				}; // for loop

		?>
				<table>
				<tr><td colspan=3><?php  submit_button() ?></td></tr>
				</table>

			</form> 

<hr width=100%>
			<h3>Shortcode Reference</h3>
			<?php  $fn="abase_description.php"; ob_start(); include $fn; $fn = ob_get_contents(); ob_end_clean(); echo $fn; ?>
		</div> 
<?php  

	}; // end of function
?>
