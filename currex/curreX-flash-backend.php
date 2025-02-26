<?php
/*
Filename: 		curreX-flash-backend.php
Date: 			2008-06-21
Copyright: 		2008, miCRoSCoPiC^eaRthLinG
Author: 		Sourjya Sankar Sen (sourjya@choas-laboratory.com)
Description: 	PHP Back-end to fetch Currency Conversion Rates from Yahoo! Finance. 
				The back-end is an adaptation of a Joomla Component written by Norbert Feria (ombing@gmail.com) & available for download from: http://www.ombing.com under GPL License.
License:		GPL
Requires:
*/

// Exit if no function specified
if( !isset( $_POST['action'] ) || '' == $_POST['action'] ) {
	echo 'errcode=ERR-000&errmsg=No action specified';
	exit();
}

switch( $_POST['action'] ) {
	
	case 'convert':
		
		$amount = $_POST['amount'];
		$currfrom = $_POST['currFrom'];
		$currto = $_POST['currTo'];
		
		$conversion_rate = get_conversion_rate( $currfrom, $currto );
			
		if( $conversion_rate != false ) {
			$result = $amount * $conversion_rate;				
			echo 'errcode=ERR-100&errmsg=Conversion Successful&result=' . $result;
			exit();
		}
		else {
			echo 'errcode=ERR-200&errmsg=Error contacting Yahoo! Finance';
			exit();
		}
		
		break;
		
	default:
			echo 'errcode=ERR-210&errmsg=Unknown conversion error';
			exit();
	
}

function get_conversion_rate( $cur_from, $cur_to ) {

	if( strlen( $cur_from ) == 0 )
		$cur_from = "USD";

	if( strlen( $cur_to ) == 0 )
		$cur_from = "THB";
	
	$host = "download.finance.yahoo.com";
	
	$fp = @fsockopen( $host, 80, $errno, $errstr, 30 );
	
	if ( !$fp ) {
		$errorstr = "$errstr ($errno)<br />\n";
		return false;
	}
	else {
	
		// Build Query String
		// Query URL: http://download.finance.yahoo.com/d/quotes.csv?s=[$cur_from][$cur_to]=X&f=sl1d1t1ba&e=.csv
		// Returns: A CSV file (Plain Text) which contains the current exchange rate
		//			along with the date & time
		// Example content: "USDTHB=X",32.15,"5/9/2008","5:11pm",32.10,32.20
		//					The source and destination currencies used here
		//					were USD (US Dollar) and THB (Thai Baht)
		$file = "/d/quotes.csv";
		$str = "?s=" . $cur_from . $cur_to . "=X&f=sl1d1t1ba&e=.csv";
		$out = "GET " . $file . $str . " HTTP/1.0\r\n";
	    $out .= "Host: www.yahoo.com\r\n";
		$out .= "Connection: Close\r\n\r\n";
		
		@fputs( $fp, $out );
		while( !@feof( $fp ) )
			$data .= @fgets( $fp, 128 );
		@fclose( $fp );
		
		@preg_match( "/^(.*?)\r?\n\r?\n(.*)/s", $data, $match );
		$data = $match[2];
		$search = array ( "'<script[^>]*?>.*?</script>'si","'<[\/\!]*?[^<>]*?>'si","'([\r\n])[\s]+'","'&(quot|#34);'i","'&(amp|#38);'i","'&(lt|#60);'i","'&(gt|#62);'i","'&(nbsp|#160);'i","'&(iexcl|#161);'i","'&(cent|#162);'i","'&(pound|#163);'i","'&(copy|#169);'i","'&#(\d+);'e" );
		$replace = array ( "","","\\1","\"","&","<",">"," ",chr(161),chr(162),chr(163),chr(169),"chr(\\1)" );
		$data = @preg_replace( $search, $replace, $data );
		$result = split( "," , $data );
		return $result[1];
		
	}//else
			
}//end get_conversion
	
?>