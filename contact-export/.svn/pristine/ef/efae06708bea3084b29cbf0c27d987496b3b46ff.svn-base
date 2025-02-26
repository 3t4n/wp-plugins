<?php
/*
Plugin Name: Contact-Export
Plugin URI: http://mv.via-beuronensis.de/
Description: You can export and import your contacts as a .csv file.
Version: 1.5.0
Author: Eberhard Heber
Author URI: http://www.ebbi.ws
Update Server: http://mv.via-beuronensis.de/wordpress
Min WP Version: 2.8.0
Max WP Version: 2.*
*/
  function fb_meta_description_option_page() {

  require_once('class_settings.php');
	$settings = new class_settings;
	$settings->checkDB();
	//anzeigeengine
	$settings->javascript();

?>
<div class="wrap">
<h2>Contacts</h2><br />
<div>
<?php
		if (get_option('ex_which') == 1){
			?><a href="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=1'; ?>">Export (feste Kategorie)</a><?php
		} else if (get_option('ex_which') == 2){
			?>&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=2'; ?>">Export</a><?php
		}
		?>&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=4'; ?>">Import</a><?php
		if (get_option('ex_vis') == 1){
			?>&nbsp;<a href="<?php echo $_SERVER['PHP_SELF'] . '?page=contact-export/contact-export.php&action=3'; ?>">Einstellungen</a><?php
		}
?></div><br /><?php
	// Navigationserkennung, oben Navigation
		if ($_GET['action'] == 1){
			require_once('oneway.php');
		} else if ($_GET['action'] == 2){
			require_once('twoway.php');
		} else if ($_GET['action'] == 3){
			require_once('settings.php');
		} else if ($_GET['action'] == 4){
			require_once('cx_import.php');
		}
	echo '</div>';
  } // Ende Funktion fb_meta_description_option_page()

  // Adminmenu Optionen erweitern
  function fb_meta_description_add_menu() {
    add_options_page('Contact-Export', 'Contact Export', 9, __FILE__, 'fb_meta_description_option_page'); //optionenseite hinzufügen
  }

  // Registrieren der WordPress-Hooks
  add_action('admin_menu', 'fb_meta_description_add_menu');
    if ( !session_id() )
    session_start();
    
function integrate_front(){
  if (isset($_POST['export'])){
    $array = $_POST;
    unset($array['export']);
    unset($array['example_length']);
    
    $_SESSION['postexport'] = $array;
    require_once('class_export.php');
    $export = new class_export();
    
    echo '<form action="" method="post">';
    $export->add_Meta_Box();
    echo '<input type="submit" class="button-primary" name="next" value="weiter" /></form>';
    } else if (isset($_POST['next'])){
    require_once('class_export.php');
    $export = new class_export();
    $export->export_via_posts($_SESSION['postexport'], $export->filter($_POST));
    } 
    }
?>
