<?php
/**
 * Author: Stefan Strobl
 */
MiFaZwsRequest ();

function MiFaZwsRequest() {
	if (isset ( $_GET ['f'] )) {
		switch ($_GET ['f']) {
			case 'getLocationsFromPart' :
				if (isset ( $_GET ['locationPart'] )) {
					$parameter = '?f=getLocationsFromPart&locationPart=' . $_GET ['locationPart'];
					If ($_GET ['maxLocations']) {
						$parameter .= '&maxLocations=' . $_GET ['maxLocations'];
					} else {
						$parameter .= '&maxLocations=5';
					}
					If ($_GET ['format']) {
						$parameter .= "&format=" . $_GET ['format'];
					}
				}
				break;
			case 'getEntries' :
				if (isset ( $_GET ['startID'] ) && isset ( $_GET ['goalID'] )) {
					$parameter = '?f=getEntries&startID=' . $_GET ['startID'] . '&goalID=' . $_GET ['goalID'];
				}
				If ($_GET ['format']) {
					$parameter .= "&format=" . $_GET ['format'];
				}
				break;
		}
		//TODO Validirung
		$data = file_get_contents ( 'http://www.mifaz.de/ws/MifazInterface.php' . $parameter );
		echo ($data);
	}
}
?>