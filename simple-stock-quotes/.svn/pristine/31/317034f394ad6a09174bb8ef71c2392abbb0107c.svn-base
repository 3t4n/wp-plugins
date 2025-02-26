<?php
$client = new SoapClient("http://www.webservicex.net/stockquote.asmx?WSDL");

try{$request = $client->GetQuote($_POST);}
catch (Exception $a){echo $a;}

try{echo $request->GetQuoteResult;}
catch(SoapFault $e){echo $e;}
	

?>