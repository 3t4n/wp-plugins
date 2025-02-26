<?php
/* Admin */
//Actions and Filters	
add_action('admin_menu', 'customers_ap');

//Initialize the admin panel
if (!function_exists("customers_ap")) {
	function customers_ap() {
		add_options_page('Customers Settings', 'Customers', 9, basename(__FILE__), 'printAdminPageCustomers');
	}	
}

function printAdminPageCustomers() {
	if ( !current_user_can( 'edit_pages' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	global $wpdb;
	echo '<div class="wrap">';

	echo '<h1>Customers settings</h1>';
	echo '<a href="'.$_SERVER['SCRIPT_NAME'].'?page=customersadmin.php&customers=list">All customers</a> - <a href="'.$_SERVER['SCRIPT_NAME'].'?page=customersadmin.php&customer=add">Add a customer</a>.<br>';
	echo '<a href="'.$_SERVER['SCRIPT_NAME'].'?page=customersadmin.php&countries=list">All countries</a> - Add a country<br><br>';
	
	if($_GET["customers"]=='delete'){
		echo '<div style="background-color:yellow; padding:10px; width:500px; height:auto;">You prepare to delete Customer with id='.$_GET["id"].'.<br>Do you really want to delete ? <a href="'.$_SERVER['SCRIPT_NAME'].'?page=customersadmin.php&customer=erase&id='.$_GET["id"].'">Yes</a> or <a href="'.$_SERVER['SCRIPT_NAME'].'?page=customersadmin.php&customers=list">Not</a></div>';
	}

	if($_GET["customer"]=='erase'){
		$sql='DELETE FROM '.$wpdb->prefix .'customers WHERE cuid='.mysql_real_escape_string($_GET["id"]);
		$wpdb->query($sql);
		echo '<div style="background-color:yellow; padding:10px; width:500px; height:auto;">Customer '.$_GET["id"].' delete</div>';
	}
	
	if($_GET["customer"]=='add'){
		if($_POST['name']){
			$error=FALSE;

			$sql='SELECT MAX(cuid) as max FROM '.$wpdb->prefix .'customers';
			$maxid=$wpdb->get_results($sql);
			//$maxid[0]->max;
			$dlfile=NULL;
			$dlfile=($maxid[0]->max+1).'.png';
			if($_FILES['logo']['size']>0){
				$uploadfile = CTS_IMG_ADMIN.'/'.($maxid[0]->max+1).'.png';
				
				if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile)) {
					
				} else {
					echo '<div id="error">Erreur de chargement de l\'image...</div>';
				}
				
			}
			$sql='INSERT INTO '.$wpdb->prefix .'customers ( cuid, cuname, cuadr1, cuadr2, cucp, cutown,cupays,cutel,cufax,cumail,cuweb,culogo	) VALUES (NULL, \''.mysql_real_escape_string($_POST["name"]).'\',\''.mysql_real_escape_string($_POST["adr1"]).'\',\''.mysql_real_escape_string($_POST["adr2"]).'\',\''.mysql_real_escape_string($_POST["cp"]).'\',\''.mysql_real_escape_string($_POST["town"]).'\',\''.mysql_real_escape_string($_POST["country"]).'\',\''.mysql_real_escape_string($_POST["tel"]).'\',\''.mysql_real_escape_string($_POST["fax"]).'\',\''.mysql_real_escape_string($_POST["mail"]).'\',\''.mysql_real_escape_string($_POST["web"]).'\',\''.$dlfile.'\');';
			$wpdb->query($sql);
			echo "Customer added<br>";
		}
		$sql='SELECT * FROM '.$wpdb->prefix .'pays ORDER BY en';
		$countries=$wpdb->get_results($sql);

			echo '<form method="post" enctype="multipart/form-data">
			Name <input name="name" size="50"><br>
			Adress 1 <input name="adr1" size="100"><br>
			Adress 2 <input name="adr2" size="100"><br>
			Cp <input name="cp"><br>
			Town <input name="town" size="100"><br>
			Country <select name="country">';
			foreach($countries as $country){
				echo '<option value="'.$country->rowid.'">'.$country->en.'</option>';
			}
			echo '</select><br>
			Tel <input name="tel"><br>
			Fax <input name="fax"><br>
			Mail <input name="mail" size="50"><br>
			Web <input name="web" size="100"><br>
			Logo <input name="logo" type="file"><br>
			<input name="valid" type="submit" value="Valid">
			</form>';
	}

	if($_GET["customer"]=='edit'){
		if($_POST['id']){
			echo "Customer updated<br>";
			if($_FILES['logo']['size']>0){
				$uploadfile = CTS_IMG_ADMIN.'/'.$_POST['id'].'.png';
				$dlfile=',culogo="'.mysql_real_escape_string($_POST['id']).'.png"';
				if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile)) {
				} else {
					echo "Error of download";
				}
			}
			$sql='UPDATE '.$wpdb->prefix .'customers SET 
			cuname="'.mysql_real_escape_string($_POST["name"]).'",
			cuadr1="'.mysql_real_escape_string($_POST["adr1"]).'",
			cuadr2="'.mysql_real_escape_string($_POST["adr2"]).'",
			cucp="'.mysql_real_escape_string($_POST["cp"]).'",
			cutown="'.mysql_real_escape_string($_POST["town"]).'",
			cupays="'.mysql_real_escape_string($_POST["country"]).'",
			cutel="'.mysql_real_escape_string($_POST["tel"]).'",
			cufax="'.mysql_real_escape_string($_POST["fax"]).'",
			cumail="'.mysql_real_escape_string($_POST["mail"]).'",
			cuweb="'.mysql_real_escape_string($_POST["web"]).'"';
			$sql.=$dlfile;
			$sql.='	WHERE  cuid ='.mysql_real_escape_string($_POST["id"]).';';
			$wpdb->query($sql);
		}
		$sql='SELECT * FROM '.$wpdb->prefix .'customers WHERE cuid='.mysql_real_escape_string($_GET["id"]);
		$customers=$wpdb->get_results($sql);
		$sql='SELECT * FROM '.$wpdb->prefix .'pays ORDER BY en';
		$countries=$wpdb->get_results($sql);
		foreach($customers as $customer){
			echo '<form method="post" enctype="multipart/form-data">
			Name <input name="name" value="'.$customer->cuname.'" size="50"><br>
			Adress 1 <input name="adr1" value="'.$customer->cuadr1.'" size="100"><br>
			Adress 2 <input name="adr2" value="'.$customer->cuadr2.'" size="100"><br>
			Cp <input name="cp" value="'.$customer->cucp.'"><br>
			Town <input name="town" value="'.$customer->cutown.'" size="100"><br>
			Country <select name="country">';
			foreach($countries as $country){
				unset($selected);
				if($country->rowid==$customer->cupays) $selected=' selected';
				echo '<option value="'.$country->rowid.'"'.$selected.'>'.$country->en.'</option>';
			}
			echo '</select><br>
			Tel <input name="tel" value="'.$customer->cutel.'"><br>
			Fax <input name="fax" value="'.$customer->cufax.'"><br>
			Mail <input name="mail" value="'.$customer->cumail.'" size="50"><br>
			Web <input name="web" value="'.$customer->cuweb.'" size="100"><br>
			Logo <input name="logo" type="file"><br>
			<input name="id" type="hidden" value="'.$customer->cuid.'" />
			<input name="valid" type="submit" value="Valid">
			</form>';
		}
	}
	
	echo '<h2>Customers</h2>';
	echo countcustomers().'<br>Lasts customers<br>';
	echo lastcustomersdisplay(2);
	if($_GET["customers"]=='list'){
		echo '<h3>List of customers</h3>';
		echo lastcustomersdisplay(999999999);
	}
	
	
	echo '<h2>Countries</h2>';
	echo countcountries().'<br>';
	if($_GET["countries"]=='list'){
		echo '<h3>List of countries</h3>';
		echo countrieslist();
	}

	echo '</div>';
}

function lastcustomersdisplay($nb=3) {
	global $wpdb;
	if($nb==999999999){
		$sql = $wpdb->prepare("SELECT * FROM  `".$wpdb->prefix ."customers` LEFT JOIN ".$wpdb->prefix ."pays ON rowid=cupays ORDER BY cuname");
	}else{
		$sql = $wpdb->prepare("SELECT * FROM  `".$wpdb->prefix ."customers` LEFT JOIN ".$wpdb->prefix ."pays ON rowid=cupays ORDER BY cuid desc LIMIT ".$nb);
	}
	$customers=$wpdb->get_results($sql);
	foreach($customers as $customer){
		$listcutomers .= $customer->cuname.' - '.$customer->en;
		if($nb==999999999) $listcutomers .=  ' - <a href="'.$_SERVER['SCRIPT_NAME'].'?page=customersadmin.php&customer=edit&id='.$customer->cuid.'">Modify</a> - <a href="'.$_SERVER['SCRIPT_NAME'].'?page=customersadmin.php&customers=delete&id='.$customer->cuid.'">Delete</a>';
		$listcutomers .= '<br>';
	}
	return $listcutomers;
}
function countcustomers(){
	global $wpdb;
	$sql = $wpdb->prepare("SELECT count(*) as total FROM ".$wpdb->prefix ."customers");
	$countcustomers = $wpdb->get_results($sql);
	return $countcustomers[0]->total.' customers in database';
}
function countcountries(){
	global $wpdb;
	$sql = $wpdb->prepare("SELECT count(*) as total FROM ".$wpdb->prefix ."pays");
	$countcountries = $wpdb->get_results($sql);
	return $countcountries[0]->total.' countries in database';
}
function countrieslist() {
	global $wpdb;
	$sql = $wpdb->prepare("SELECT * FROM ".$wpdb->prefix ."pays ORDER BY en");
	$countries=$wpdb->get_results($sql);
	foreach($countries as $country){
		$countrieslist .= $country->code.' - '.$country->en.'<br>';
	}
	return $countrieslist;
}

?>