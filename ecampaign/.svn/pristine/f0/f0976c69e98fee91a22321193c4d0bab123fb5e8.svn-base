<?php

/*
class : MP
author : John Ackers
modified : 11-Aug-2015

Supports the use of a %lookup button in a form.
The lookup function takes the value of the field 'ukpostcode'
and looks up the corresponding UK councillors using two steps.

From May 2015, It makes use of 
http://www.parliament.uk/mps-lords-and-offices/mps/?search_term=

This class is loaded by ecampaign.php when the
attribute class='uk/MP' is added to the ecampaign shortcode
e.g. [ecampaign class='uk/MP'].....[/ecampaign]

*/

include_once dirname(__FILE__) . '/../EcampaignTarget.class.php';

class MP extends EcampaignTarget
{
  const sLookup = 'lookup' ;

  function __construct()
  {
    parent::__construct();
    $this->classPath = "uk/MP";
    $this->validAjaxMethods[] = self::sLookup ;
    $this->submitEnabled = false  ;       // initially disable the send button
  }

  function initializeCannedFields()
  {
    parent::initializeCannedFields();
    $this->cannedFields[self::sLookup] = array(__('lookup MP'));
  }

  function createField($noun, $efield, $page)
  {
    switch($noun) {

      case self::sLookup :
        $html = "
        <span class='eclookup'>
          <input type='button' name='lookup-postcode' value='{$efield->label}'
          onclick=\"return ecam.onClickSubmit(this, '$this->classPath', 'lookup');\"/>
        </span>
        <span class='ecstatus'></span>";
        break ;

      default :
        $html = parent::createField($noun, $efield, $page);
    }
    return $html ;
  }

  /*
   * email the original or updated message to the party or parties that are the target of
   * this campaign.
   * can throw exception containing text error message
   */

  function lookup()
  {
    $desiredFields = array(self::sPostID, self::sUKPostcode, self::sCampaignEmail, self::sVisitorName, self::sVisitorEmail);
    $controlFields = array(self::sPostID => new EcampaignField(self::sPostID));
    $this->fieldSet = EcampaignField::requestPartialMap($desiredFields, array_merge($controlFields, self::$allFields));

    if (empty($this->fieldSet->ukpostcode))
      throw new Exception("Postcode field is empty");

    $postcode = $this->fieldSet->ukpostcode;

    $biography = self::lookupMPBiography($postcode);

    $memberName = $biography['name']; 
    $memberEmail = $biography['email'];    
    $constituencyName = $biography['constituency'];    

    $target = array();
    $target['name']  =   $memberName ;
    $target['email'] = $this->testMode->isDiverted() ? $this->fieldSet->campaignEmail : $memberEmail;

    $this->log->write("lookup", $this->fieldSet, "$memberName\r\n$constituencyName\r\nsource:".$source);
    $response = array("target" => array($target),
                 "constituency" => $constituencyName,
                 "success" => true,
                 "callbackJS" => 'updateMessageFields',
                 "msg" => $memberName);

    if (isset($biography['addressAs']))
      $response['regexp'] = array('pattern'=>"[name]", 'replacement'=>$biography['addressAs']);

    return $response;
  }
  
  private static function fetchPage($postCode)
  {
    if (true)
    {
      $header = array();
      $header[] = "Cache-Control: max-age=0";
      $header[] = "User-Agent: Mozilla/5.0 (X11; Linux i686) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.57 Safari/534.24" ;
      $header[] = "Accept: application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;";
      $header[] = "Accept-Language: en-GB,en-US;q=0.8,en;q=0.6";
      $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.8,en;q=0.6";


      # 875 59.725711000  192.168.1.4 4.26.228.254  HTTP  941 GET /mps-lords-and-offices/mps/?search_term=n5+2ag HTTP/1.1
      
      $url = "http://www.parliament.uk/mps-lords-and-offices/mps/?search_term=". urlencode($postCode);
      
      $ch = curl_init($url);

      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

      return array('url' => $url, 'body' => curl_exec($ch));
    }
  }

  private static function matchChain($regexpAr, $page, $flags)
  {
    $offset = 0 ;
    $biography = array();
    foreach ($regexpAr as $key => $reg)
    {
      $regexp = "@" . $reg . '@mixs';
      
      $matches = array();
      $num = preg_match($regexp, $page, $matches, PREG_OFFSET_CAPTURE, $offset);
      if ($num != 1)
        throw new ErrorException($key);  
      $biography[$key] = trim($matches[$key][0]);
      $offset = $matches[$key][1];
    }    
    //$biography['source'] = 'unknown' ;
    return $biography ;
  }

  private static function lookupMPBiography($postcode)    
  {  	    
    # test area #  https://regex101.com/r/yG6oH6/1
    # revised 27 July 2015

    $regexBio = array('name'         => '<h1>(?<name>[^>]+)<\/h1>',
                      'constituency' => '<div\sid="commons-constituency">(?<constituency>[^<]*?)<\/div>',
                      'addressAs'    => '<div\sid="commons-addressas">(?<addressAs>[^<]*?)<\/div>.*?',
                      'email'        => '\"mailto:(?<email>[^\";]+)');  
    
    $page = self::fetchPage($postcode);

    if (strpos($page['body'], 'no results matching') > 0)
    	throw new Exception("Unable to fetch page for MP at $postcode");
    
    try {     
      $biography = self::matchChain($regexBio, $page['body'], 'mixs');
    }
    catch (ErrorException $e)
    {
      $key = $e->getMessage();
			$pageLen = strlen($page);
      throw new Exception("Unable to find MP's '$key' in their <a href='". $page['url'] ."'>biography page</a>");
    }
    return $biography ;    
  }
}

?>