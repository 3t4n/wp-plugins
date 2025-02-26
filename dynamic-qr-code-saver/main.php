<?php
/*
Plugin Name: Dynamic QR Code URL Saver
Plugin URI: http://funk.design
Description: Generates a dynamic QR code, which can be edited later. Share smartly
Version: 1.0
Author: Alexander Funk
Author URI: http://funk.design
Update Server: http://funk.design
Min WP Version: 1.5
License: GPL2
*/
?>
<?php
//Adding Meta box
//add_action( 'add_meta_boxes', 'dynamic_qr_code' );

//Adding Menubutton
add_action( 'admin_menu', 'dynamic_qr_code' );

function dynamic_qr_code() {
    add_menu_page('Dynamic QR', 'Dynamic QR', 'edit_posts', 'dynamicqrurl', 'show_qr', plugins_url('Dynamic-QR-Saver/icon.png'), 50);
} 

//Adding the hook to the post page
add_action( 'template_redirect', 'qr_forwarding', 100 );

//On Plugin activation create table
register_activation_hook(__FILE__,'install_dynamic_qr');

function install_dynamic_qr(){
	global $wpdb;
	
	//Tabellenname erstellen
	$table_name = $wpdb->prefix . "dynamic_qr";
	$charset_collate = $wpdb->get_charset_collate();
	
	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			`ID` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`URL` VARCHAR( 500 ) NOT NULL ,
			`Description` VARCHAR( 500 ) NULL ,
			`Visits` INT( 10 ) NULL
			) $charset_collate;";
	
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

}

//Shows a table with the qr urls
function show_qr(){
	
	global $wpdb;
	$showTable = false;
	
	//Form submit?
	if(!empty($_POST)){
		
		$table_name = $wpdb->prefix . "dynamic_qr";
		
		if($_POST['action'] == 'new'){
			//Saving
			
			if($wpdb->insert($table_name, array(
			   "URL" => validate($_POST['qrurl'],false,500),
			   "Description" => validate($_POST['qrdesc'],false,500),
			   "Visits" => "0"
			))){
			
				$message = "<div style='color:#333; width: calc(100% - 10px); padding: 3px 5px; text-align:center; background-color:rgba(0,255,102,0.8); margin: 10px 0'>Data has been added and saved!</div>";
				
			} else {
				
				$message = "An error announced! Please try again.<br><br>URL: " . $_POST['qrurl'] . "<br>Description: " . $_POST['qrdesc'];
				
			}
			
		} elseif($_POST['action'] == 'edit'){
			//update visits
			
			$wpdb->update( 
				$wpdb->prefix . "dynamic_qr", 
				array( 
					'URL' => validate($_POST['qrurl'],false,500),
					'Description' => validate($_POST['qrdesc'],false,500)
				), 
				array( 'ID' => validate($_POST['qrid'],false,500) )
			);
			
		} else {
			
		}
	}
	
	if(!empty($message)){
			echo $message;
	} 
	
	
	
	
	
	
	if(!empty($_GET['qr-delete'])){
		//Ask again
	?>
		<h2>Delete QR URL</h2>
		<p>Are you sure to delete this qr url? This can not be undone!<br /><br />
		<?php echo "<a href='" . admin_url( 'admin.php') . "?page=". $_GET["page"] . "' class='button button-primary button-large'>Back</a>"; 
		$qr_ID = validate($_GET['qr-delete'], true, 10);
			
			$sql = "SELECT * FROM " . $wpdb->prefix . "dynamic_qr WHERE id = '" . $qr_ID . "' LIMIT 0 , 1";
			$result = $wpdb->get_results($sql) or die(mysql_error());
				
			foreach( $result as $results ) {
						
			$qr_url = get_site_url() . "?short=" . $results->ID;
			echo '	<center><img src="https://chart.googleapis.com/chart?cht=qr&chs=500x500&chld=H|4&chl=' . $qr_url . '" width="250" height="250" /><br>
						<strong>ID: ' . $results->ID . '</strong><br />
						<strong>URL: ' . $results->URL . '</strong><br />
						<strong>Visits: ' . $results->Visits . '</strong><br />
						<strong>Description: ' . $results->Description . '</strong><br /><br>
						<a href="' . admin_url( 'admin.php') . "?page=". $_GET["page"] . '&qr-suredelete=' . $results->ID . '" class="button button-primary button-large">Delete</a>
					</center>';		
			}
			
			
			
			
			
	} elseif (!empty($_GET['qr-suredelete'])) {
		//Delete the URL
		
		$qr_ID = validate($_GET['qr-suredelete'], true, 10);
		
		$wpdb->query("DELETE FROM `" . $wpdb->prefix . "dynamic_qr` WHERE `ID` = '" . $qr_ID . "'");
		echo "<h2>Delete complete!</h2><p>The QR Code was successfully deleted!</p><br><a href='" . admin_url( 'admin.php') . "?page=". $_GET["page"] . "' class='button button-primary button-large'>Back</a>";
		



	} elseif (!empty($_GET['qr-edit'])) {
		//Edit the qr-code
	?>
	
	<h2>Edit QR-Code</h2>
	<p>Here you can redirect the QR-Code</p><br /><br />
	
	<?php echo "<a href='" . admin_url( 'admin.php') . "?page=". $_GET["page"] . "' class='button button-primary button-large'>Back</a>"; ?>
	
	<table border="0" cellpadding="3" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>ID</td><td>Linked URL</td><td>Visits</td><td>Description</td><td>Action</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php
					
					$qr_ID = validate($_GET['qr-edit'], true, 10);
					
					$sql = "SELECT * FROM " . $wpdb->prefix . "dynamic_qr WHERE id = '" . $qr_ID . "' LIMIT 0 , 1";
					$result = $wpdb->get_results($sql) or die(mysql_error());
				
					foreach( $result as $results ) {
						
						$qr_url = get_site_url() . "?short=" . $results->ID;
						echo '	<form method="post" action="' . admin_url( 'admin.php') . '?page='. $_GET["page"] . '">
									<td>' . $results->ID . '</td>
									<td><input type="text" value="' . $results->URL . '" maxlength="500" style="width:calc(100% - 10px);" name="qrurl" /></td>
									<td>' . $results->Visits . '</td>
									<td><input type="text" value="' . $results->Description . '" maxlength="500" style="width:calc(100% - 10px);" name="qrdesc" /></td>
									<td><input type="submit" value="Update" style="width:calc(100% - 3px);" name="submit" class="button button-primary button-large"></td>
									<input type="hidden" name="action" value="edit">
									<input type="hidden" name="qrid" value="' . $results->ID . '">
								</form>';
					}
					?>
				</tr>
			</tbody>
		</table>	
	
	
	
	
	
	<?php	
	} elseif (!empty($_GET['qr-show'])){
		//Show the details of the qr-code
	?>
		
		<h2>The QR Code</h2>
		<p>Details of your generated dynamic QR-Code.<br /><br />

		<?php
		
			echo "<a href='" . admin_url( 'admin.php') . "?page=". $_GET["page"] . "' class='button button-primary button-large'>Back</a>";
			
			$qr_ID = validate($_GET['qr-show'], true, 10);
			
			$sql = "SELECT * FROM " . $wpdb->prefix . "dynamic_qr WHERE id = '" . $qr_ID . "' LIMIT 0 , 1";
					$result = $wpdb->get_results($sql) or die(mysql_error());
				
					foreach( $result as $results ) {
						
						$qr_url = get_site_url() . "?short=" . $results->ID;
						echo '	<center><img src="https://chart.googleapis.com/chart?cht=qr&chs=500x500&chld=H|4&chl=' . $qr_url . '" width="250" height="250" /><br>
									<strong>ID: ' . $results->ID . '</strong><br />
									<strong>URL: ' . $results->URL . '</strong><br />
									<strong>Visits: ' . $results->Visits . '</strong><br />
									<strong>Description: ' . $results->Description . '</strong><br />
								</center>';
						
					}
	
		?>
		
		</p>
		
	<?php
	} else {	
	?>
		
		<h2>Dynamic QR URL's</h2>
		<p>You can change the link, whitout changing the QR-Code. This is perfect if you have to print the QR-Code and change it later on.</p>
		<table border="0" cellpadding="3" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>ID</td><td>Linked URL</td><td>Visits</td><td>Description</td><td>Action</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<form method="post">
						<td>-</td>
						<td><input type="text" maxlength="500" style="width:calc(100% - 10px);" name="qrurl" /></td>
						<td>-</td>
						<td><input type="text" maxlength="500" style="width:calc(100% - 10px);" name="qrdesc" /></td>
						<td><input type="submit" value="Add" style="width:calc(100% - 3px);" name="submit" class="button button-primary button-large"></td>
						<input type="hidden" name="action" value="new">
					</form>
				</tr>
			<?php
				
				$sql = "SELECT * FROM " . $wpdb->prefix . "dynamic_qr ORDER BY `ID` DESC";
				$result = $wpdb->get_results($sql) or die(mysql_error());
			
				foreach( $result as $results ) {
			
					echo "	<tr>
								<td>" . $results->ID . "</td>
								<td>" . $results->URL . "</td>
								<td>" . $results->Visits . "</td>
								<td>" . $results->Description . "</td>
								<td>
									<a href='" . admin_url( 'admin.php') . "?page=". $_GET["page"] . "&qr-show=" . $results->ID . "' class='button button-primary button-large' style='width: calc(33.33% - 10px);text-align: center;'>QR-Code</a>
									<a href='" . admin_url( 'admin.php') . "?page=". $_GET["page"] . "&qr-edit=" . $results->ID . "' class='button button-primary button-large' style='width: calc(33.33% - 10px);text-align: center; margin:0 10px;'>Edit</a>
									<a href='" . admin_url( 'admin.php') . "?page=". $_GET["page"] . "&qr-delete=" . $results->ID . "' class='button button-primary button-large' style='width: calc(33.33% - 10px);text-align: center;'>Delete</a>
								</td>
							</tr>";
					
				}
			?>
			
			</tbody>
		</table>
	
	<?php
	
	}
	
}


function validate($string,$html,$cut){
	
		//Entfernt jegliche HTML, PHP oder Java-Befehle vom String
		if($html == false){
			$string = strip_tags($string);
		}
		
		//Cuts the sting after x chars
		if(isset($cut)){
			$string = substr($string, 0, $cut);
		}
		
		//Return the variable
		return $string;
}



//Visitors pass
function qr_forwarding(){
	
	if(isset($_GET['short'])){
		
		global $wpdb;
		
		$qr_ID = validate($_GET['short'], true, 10);
			
		$sql = "SELECT * FROM " . $wpdb->prefix . "dynamic_qr WHERE id = '" . $qr_ID . "' LIMIT 0 , 1";
		$result = $wpdb->get_results($sql) or die(mysql_error());
				
		foreach( $result as $results ) {
						
			$qr_url = $results->URL;
			$qr_visits = $results->Visits + 1;
			
			//update visits
			$wpdb->update( 
				$wpdb->prefix . "dynamic_qr", 
				array( 
					'Visits' => $qr_visits,	// string
				), 
				array( 'ID' => $results->ID )
			);
			
			wp_redirect( $qr_url );
			exit();
					
		}			
	}
}

?>