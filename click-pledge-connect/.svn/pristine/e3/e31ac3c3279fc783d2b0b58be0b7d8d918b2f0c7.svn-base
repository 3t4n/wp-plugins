<?php
	define( 'CFCNP_PLUGIN_UID', "14059359-D8E8-41C3-B628-E7E030537905");
	define( 'CFCNP_PLUGIN_SKY', "5DC1B75A-7EFA-4C01-BDCD-E02C536313A3");
	$connect  = array('soap_version' => SOAP_1_1, 'trace' => 1, 'exceptions' => 0);

  $client = new SoapClient('Auth2.wsdl', $connect);


if (!isset($_REQUEST['CampaignId']) && isset($_REQUEST['AccountId_val']) && !empty($_REQUEST['AccountId_val']) && isset($_REQUEST['AccountGUId_val']) && !empty($_REQUEST['AccountGUId_val'])) {

  
    $accountid = $_REQUEST['AccountId_val'];
    $accountguid = $_REQUEST['AccountGUId_val'];
    
  
    $xmlr = new SimpleXMLElement("<GetPledgeTVChannelList></GetPledgeTVChannelList>");
    $xmlr->addChild('accountId', $accountid);
    $xmlr->addChild('AccountGUID', $accountguid);
    $xmlr->addChild('username', CFCNP_PLUGIN_UID);
    $xmlr->addChild('password', CFCNP_PLUGIN_SKY);

 
    try {
        $response = $client->GetPledgeTVChannelList($xmlr);
        $responsearr = $response->GetPledgeTVChannelListResult->PledgeTVChannel;
        
      
        $orderRes = [];
        if (!is_array($responsearr)) {
        
            $orderRes[$responsearr->ChannelURLID] = $responsearr->ChannelName;
        } else {
         
            foreach ($responsearr as $obj) {
                $orderRes[$obj->ChannelURLID] = $obj->ChannelName;
            }
        }

 
        natcasesort($orderRes);

      
        $camrtrnval = "<option value=''>Select channel</option>";

        foreach ($orderRes as $key => $value) {
            if (!empty($key)) {
                $displymsg = ($_REQUEST['slcamp'] == $key) ? "selected" : "";
                $camrtrnval .= "<option value='" . $key . "' $displymsg>" . $value . " (" . $key . ")</option>";
            }
        }

    
        echo $camrtrnval;

    } catch (Exception $e) {
       
        echo "<option value=''>Error fetching channels: " . esc_html($e->getMessage()) . "</option>";
    }
}

	
?>