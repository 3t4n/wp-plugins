<?php

/*
Plugin Name: GData Importer
Plugin URI: http://www.ankitsharma.info
Description: Imports Google Spreadsheets Data into a post using shortcode.
Version: 1.0.2
Author: Ankit Sharma
Author URI: http://wwww.ankitsharma.info
*/

function gdataimport_handler($attrib) {
	$demolph_output = gdata_import($attrib);
	return $demolph_output;
}

function gdata_import($attrib) {
	if($attrib["key"]=="" || $attrib["worksheet"] == "" || $attrib["user"] == "" || $attrib["pass"] == ""){
		echo('ERROR: SET ALL ATTRIBUTES i.e sheet, worksheet, user, pass and columns. ');
		return;
	}
	// load Zend Gdata libraries
	set_include_path(get_include_path() . PATH_SEPARATOR . WP_PLUGIN_DIR . "//gdata-importer//");
	require_once 'Zend/Loader.php';
	Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
	Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
	
	// set credentials for ClientLogin authentication
	$user = $attrib["user"];
	$pass = $attrib["pass"];
	
	try {  
		// connect to API
		$service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
		$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
		$service = new Zend_Gdata_Spreadsheets($client);
		
		// get spreadsheet entry
		$ssEntry = $service->getSpreadsheetEntry(
				'https://spreadsheets.google.com/feeds/spreadsheets/'. $attrib["key"]);
		
		// get worksheets in this spreadsheet
		$wsFeed = $ssEntry->getWorksheets($attrib["worksheet"]);


	} catch (Exception $e) {
		echo ('ERROR: ' . $e->getMessage());
		return;
	}
	
	$content = <<<HTML
	<table>
HTML;


	foreach($wsFeed as $wsEntry):
		if ($wsEntry->getTitle() == $attrib["worksheet"]):
			//get title
			$query = new Zend_Gdata_Spreadsheets_CellQuery();
			$query->setSpreadsheetKey($attrib["key"]);
			$id = $wsEntry->getId();
			$arr = explode('/', $id);
			$query->setWorksheetId($arr[sizeof($arr)-1]);
			$query->setMinRow(1);
			$query->setMaxRow(1);
			$cellFeed = $service->getCellFeed($query);
			$content = $content . "<tr>";
			foreach ($cellFeed as $cellEntry) {
				$content = $content . "<td>" .$cellEntry->getCell()->getText() . "</td>";
			}
			$content = $content . "</tr>";
			
			//get content
			$rows = $wsEntry->getContentsAsRows();
			foreach ($rows as $row):
				 $content = $content . "<tr>";
					foreach($row as $key => $value): 
					$content = $content . "<td>" .$value . "</td>";
					endforeach;
				 $content = $content . "</tr>";
				endforeach;
		endif;
	endforeach;
	
	$content = $content . <<<HTML
		</tbody>
	</table>
HTML;
	
	return $content;
}

function cleanClassname($content){
	$content = preg_replace('/\s/', '-', $content);
	$content = strtolower($content);
	return $content; 
}

add_shortcode("gdata_import", "gdataimport_handler");

?>