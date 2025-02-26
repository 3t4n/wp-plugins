<?php
//declare all global keys
$emailId = "amy_emailIdConnected";
$campaignId = "amy_campaignId";
$token = "amy_token";
$firstName = "amy_firstName";
$lastName = "amy_lastName";
$adminConsoleUrl = "amy_adminConsoleUrl";
$agentId = "amy_agentId";
$avatarUrl = "amy_avatarUrl";
$editBotFlowUrl = "amy_editBotFlowUrl";
$editdesignUrl = "amy_editdesignUrl";
$siteId = "amy_siteId";
$taskbotId = "amy_taskbotId";
$signinsuccess = "amy_signinsuccess";
$viewCollectedLeadsUrl = "amy_viewCollectedLeadsUrl";
$businesstype = "amy_businesstype";
$primarycolor = "amy_primarycolor";
$connect = "amy_connect";   
$isamylive = "amy_isamylive"; 

// get wp options methods
function amy_get_emailidconnected(){ return get_option("amy_emailIdConnected");}
function amy_get_campaignd(){ return get_option("amy_campaignId");}
function amy_get_token(){ return get_option("amy_token");}
function amy_get_firstname(){return get_option("amy_firstName");}
function amy_get_lastname(){ return get_option("amy_lastName");}
function amy_get_adminconsoleurl(){return str_replace("/dashboard/", "/amydashboard/", get_option("amy_adminConsoleUrl"));}
function amy_get_agentid(){return get_option("amy_agentId");}
function amy_get_avatarurl(){return get_option("amy_avatarUrl");}
function amy_get_editbotflowurl(){return get_option("amy_editBotFlowUrl");}
function amy_get_editdesignurl(){return get_option("amy_editdesignUrl");}
function amy_get_siteid(){return get_option("amy_siteId");}
function amy_get_taskbotid(){return get_option("amy_taskbotId");}
function amy_get_signinsuccess(){return get_option("amy_signinsuccess");}
function amy_get_viewcollectedleadsurl(){ return get_option("amy_viewCollectedLeadsUrl");}	
function amy_get_businesstype(){ return get_option("amy_businesstype");}
function amy_get_primarycolor(){return get_option("amy_primarycolor");}
function amy_get_connect(){return get_option("amy_connect");   }
function amy_get_isamylive(){ return get_option("amy_isamylive"); }	

// update wp options methods
   function amy_update_emailidconnected($value){ update_option("amy_emailIdConnected",$value);}
   function amy_update_campaignd($value){update_option("amy_campaignId",$value);}
   function amy_update_token($value){update_option("amy_token",$value);}
   function amy_update_firstname($value){update_option("amy_firstName",$value);}
   function amy_update_lastname($value){update_option("amy_lastName",$value);}
   function amy_update_adminconsoleurl($value){update_option("amy_adminConsoleUrl",$value);}
   function amy_update_agentid($value){update_option("amy_agentId",$value);}
   function amy_update_avatarurl($value){update_option("amy_avatarUrl",$value);}
   function amy_update_editbotflowurl($value){update_option("amy_editBotFlowUrl",$value);}
   function amy_update_editdesignurl($value){update_option("amy_editdesignUrl",$value);}
   function amy_update_siteid($value){update_option("amy_siteId",$value);}
   function amy_update_taskbotid($value){update_option("amy_taskbotId",$value);}
   function amy_update_signinsuccess($value){update_option("amy_signinsuccess",$value);}
   function amy_update_viewcollectedleadsurl($value){    update_option("amy_viewCollectedLeadsUrl",$value);}	
   function amy_update_businesstype($value){update_option("amy_businesstype",$value);}
   function amy_update_primarycolor($value){update_option("amy_primarycolor",$value);}
   function amy_update_connect($value){ update_option("amy_connect",$value);   }
   function amy_update_isamylive($value){update_option("amy_isamylive",$value); }	

// delete wp options

function amy_delete_emailidconnected(){ delete_option("amy_emailIdConnected");}
function amy_delete_campaignd(){  delete_option("amy_campaignId");}
function amy_delete_token(){  delete_option("amy_token");}
function amy_delete_firstname(){ delete_option("amy_firstName");}
function amy_delete_lastname(){  delete_option("amy_lastName");}
function amy_delete_adminconsoleurl(){ delete_option("amy_adminConsoleUrl");}
function amy_delete_agentid(){ delete_option("amy_agentId");}
function amy_delete_avatarurl(){ delete_option("amy_avatarUrl");}
function amy_delete_editbotflowurl(){ delete_option("amy_editBotFlowUrl");}
function amy_delete_editdesignurl(){ delete_option("amy_editdesignUrl");}
function amy_delete_siteid(){ delete_option("amy_siteId");}
function amy_delete_taskbotid(){ delete_option("amy_taskbotId");}
function amy_delete_signinsuccess(){ delete_option("amy_signinsuccess");}
function amy_delete_viewcollectedleadsurl(){  delete_option("amy_viewCollectedLeadsUrl");}	
function amy_delete_businesstype(){  delete_option("amy_businesstype");}
function amy_delete_primarycolor(){ delete_option("amy_primarycolor");}
function amy_delete_connect(){ delete_option("amy_connect");   }
function amy_delete_isamylive(){  delete_option("amy_isamylive"); }	

//urls for amy

// delete all amy keys from wpoptions database and remove it comepletely
function amy_deleteallamykeys()
{
  amy_delete_emailidconnected();
 amy_delete_campaignd();
 amy_delete_token();
 amy_delete_firstname();
 amy_delete_lastname();
 amy_delete_adminconsoleurl();
 amy_delete_agentid();
 amy_delete_avatarurl();
 amy_delete_editbotflowurl();
 amy_delete_editdesignurl();
 amy_delete_siteid();
 amy_delete_taskbotid();
 amy_delete_signinsuccess();
 amy_delete_viewcollectedleadsurl();
 amy_delete_businesstype();
 amy_delete_primarycolor();
 amy_delete_connect();
 amy_delete_isamylive();
}

// webhook call back to render the bot box on the website
function amy_installcode()
{
        $t_campaignid = amy_get_campaignd();
    $t_siteid = amy_get_siteid();
    if(amy_get_isamylive()=="true" || current_user_can('administrator'))
    {
        if($t_siteid != "")
 echo "<!--Begin Amy Chatbot Code--><div id='amy-button-".esc_html($t_campaignid)."'></div><script type='text/javascript'>  var AmyAPI=AmyAPI||{};(function(t){function e(e){var a=document.createElement('script'),c=document.getElementsByTagName('script')[0];a.type='text/javascript',a.async=!0,a.src=e+t.site_id,c.parentNode.insertBefore(a,c)}t.chat_buttons=t.chat_buttons||[],t.chat_buttons.push({code_plan:'".esc_html($t_campaignid)."',div_id:'amy-button-".esc_html($t_campaignid)."'}),t.site_id=".esc_html($t_siteid).",t.main_code_plan='".esc_html($t_campaignid)."',e('https://script.amy.us/livechat.ashx?siteId='),setTimeout(function(){t.loaded||e('https://standby.amy-script.us/livechat.ashx?siteId=')},5e3)})(AmyAPI||{})</script><!--End Amy Chatbot Code-->";
    }
    else
    {
        echo "<!--amy not set to live -->";
    }
}

function amy_installpreviewcode()
{
    $t_campaignid = amy_get_campaignd();
    $t_siteid = amy_get_siteid();
      echo "<!--Begin Amy Chatbot Code--><div id='amy-button-".esc_html($t_campaignid)."'></div><script type='text/javascript'>  var AmyAPI=AmyAPI||{};(function(t){function e(e){var a=document.createElement('script'),c=document.getElementsByTagName('script')[0];a.type='text/javascript',a.async=!0,a.src=e+t.site_id,c.parentNode.insertBefore(a,c)}t.chat_buttons=t.chat_buttons||[],t.chat_buttons.push({code_plan:'".esc_html($t_campaignid)."',div_id:'amy-button-".esc_html($t_campaignid)."'}),t.site_id=".esc_html($t_siteid).",t.main_code_plan='".esc_html($t_campaignid)."',e('https://script.amy.us/livechat.ashx?siteId='),setTimeout(function(){t.loaded||e('https://standby.amy-script.us/livechat.ashx?siteId=')},5e3)})(AmyAPI||{})</script><!--End Amy Chatbot Code-->";

}

//update preview when business type has been changed on bot preview page
function amy_updatepreview()
{
    
    $url = 'https://start.amy.us/api/amy/changePreviewBizType';
    $data = array("businessType" => amy_get_businesstype(),"campaignId" => amy_get_campaignd());
    $postdata =  json_encode($data);
 
	$args = array(
	'method'	  => 'PUT',
    'body'        => $postdata,
    'timeout'     => '5',
    'redirection' => '5',
    'httpversion' => '1.0',
    'blocking'    => true,
    'headers'     => array('Content-Type'  => 'application/json'),
    'cookies'     => array(),
);
   $result = wp_remote_request($url,$args);
}

// get installation code for bot preview page to show the bot in action
function amy_installationcode()
{
    $url="https://start.amy.us/api/amy/installation?campaignId=".amy_get_campaignd()."&siteId=".amy_get_siteid();
	
	 $args = array(
    'timeout'     => '5',
    'redirection' => '5',
    'blocking'    => true,
    'headers'     => array('Content-Type'  => 'application/json')
);
   $result = wp_remote_retrieve_body(wp_remote_get($url,$args));
   $result_decode = json_decode($result, true);
   return $result_decode["installationCode"];
}

// asks amy to prepare a bot preview for the requested website
function amy_createpreview()
{
    $url = 'https://start.amy.us/api/amy/CreatePreviewPage';
    $data = array("businessType" => amy_get_businesstype(),"siteUrl" => get_option("siteurl"));	
    $postdata =  json_encode($data);

	$args = array(
    'body'        => $postdata,
    'timeout'     => '5',
    'redirection' => '5',
    'blocking'    => true,
    'headers'     => array('Content-Type'  => 'application/json'),
    'cookies'     => array()
);
   $result = wp_remote_retrieve_body(wp_remote_post($url,$args));
   $result_decode = json_decode($result, true);
	
	amy_update_siteid($result_decode["siteId"]);
    amy_update_campaignd($result_decode["campaignId"]);
    amy_update_businesstype($result_decode["businessType"]);
    amy_update_primarycolor(str_replace("%23","#",$result_decode["primaryColor"]));
}

//load the business types options returns html
function amy_businesstypes($selected)
{ 
    $businesstypes="";
    $url="https://start.amy.us/api/amy/businessTypes";

	 $args = array(
    'timeout'     => '5',
    'redirection' => '5',
    'blocking'    => true,
    'headers'     => array('Content-Type'  => 'application/json')
);
   $result = wp_remote_retrieve_body(wp_remote_get($url,$args));
   $result_decode = json_decode($result, true);
    // Will dump a beauty json :3
    $biztypes = $result_decode["businessTypes"];
    // Loop through the associative array
    foreach($biztypes as $key=>$value){
        if($value == $selected)
        {
            $businesstypes = $businesstypes."<option selected='selected'>".esc_html($value)."</option>";	
        }
        else
            $businesstypes = $businesstypes."<option>".esc_html($value)."</option>";
    }
    return $businesstypes;
}

function amy_loadbusinesstypes($selected)
{ 
    
    $url="https://start.amy.us/api/amy/businessTypes";

	 $args = array(
    'timeout'     => '5',
    'redirection' => '5',
    'blocking'    => true,
    'headers'     => array('Content-Type'  => 'application/json')
);
   $result = wp_remote_retrieve_body(wp_remote_get($url,$args));
   $result_decode = json_decode($result, true);
    // Will dump a beauty json :3
    $biztypes = $result_decode["businessTypes"];
    // Loop through the associative array
    foreach($biztypes as $key=>$value){
        if($value == $selected)
        {
            echo "<option selected='selected'>".esc_html($value)."</option>";	
        }
        else
            echo "<option>".esc_html($value)."</option>";
    }
}

// returns URL of plugin
function amy_get_plugin_url()
{	
	return plugin_dir_url(__FILE__);    
}

// check email on amy
function amy_checkemailexists($email)
{
    $url = "https://start.amy.us/api/amy/checkEmailExists?email=" . $email;
   	 $args = array(
    'timeout'     => '5',
    'redirection' => '5',
    'blocking'    => true,
    'headers'     => array('Content-Type'  => 'application/json')
);

	$result = wp_remote_retrieve_body(wp_remote_get($url,$args));
	$check_email = json_decode($result, true);
    if ($check_email['isEmailExists'] == 1) return true;
    else return false;
}
?>