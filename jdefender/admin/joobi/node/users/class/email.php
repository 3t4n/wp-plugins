<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
 class Users_Email_class extends WClasses {
 public function validateEmail($email,$fullCheck=true){
 if(!filter_var($email, FILTER_VALIDATE_EMAIL )){
WMessage::log('PHP checker failed to validate email : '.$email , 'email-not-valid');
 return false;
 }
  if($fullCheck){
  list($user, $domain )=explode('@',$email );
if( function_exists('checkdnsrr') && !checkdnsrr($domain.'.','MX')){
WMessage::log('The MX record for the email : '.$email.' are not defined!','email-not-valid');
return false;
}
if( WExtension::exist('security.node') 
&& WApplication::isEnabled('jdefender', true)
&& WPref::load('PSECURITY_NODE_SHIELD_VALID_EMAIL')
){
$securityBadwordsM=WModel::get('security.badwords');
$securityBadwordsM->rememberQuery(true);
$securityBadwordsM->whereE('publish', 1 );
$securityBadwordsM->whereE('type', 2 );
$securityBadwordsM->setLimit( 5000 );
$wordsA=$securityBadwordsM->load('lra','alias');
if( in_array($domain, $wordsA )){
$securityReportC=WClass::get('security.report');$DOMAIN=$domain;
$EMAIL=$email;
$cause=str_replace(array('$DOMAIN'), array($DOMAIN),WText::t('1488401789MMWH'));
$details=str_replace(array('$DOMAIN','$EMAIL'), array($DOMAIN,$EMAIL),WText::t('1489081649GHBX'));
$securityReportC->recordIncident('bademails',$cause, $details );
return false;
}elseif( in_array($email, $wordsA )){
$securityReportC=WClass::get('security.report');$EMAIL=$email;
$cause=str_replace(array('$EMAIL'), array($EMAIL),WText::t('1488401789MMWJ'));
$details=$cause;
$securityReportC->recordIncident('bademails',$cause, $details, false);
return false;
}else{
foreach($wordsA as $oneW){
if( strpos($oneW, '@') !==false) continue;
$checkDomainA=explode('@',$oneW );
$myDomain=array_pop($checkDomainA );
if( strpos($domain, $myDomain ) !==false){
$securityReportC=WClass::get('security.report');$DOMAIN='.'.$domain;
$EMAIL=$email;
$cause=str_replace(array('$DOMAIN'), array($DOMAIN),WText::t('1489081649GHBY'));
$details=str_replace(array('$DOMAIN','$EMAIL'), array($DOMAIN,$EMAIL),WText::t('1489081649GHBZ'));
$securityReportC->recordIncident('bademails',$cause, $details );
return false;
}
}
}
}
 }
 return true;
 }
 public function checkEmailUnique($email){
 if(empty($email)) return false;
 $users=WModel::get('users');
 $users->whereE('email',$email );
 $uid=$users->load('lr','uid');
 if(empty($uid)) return true;
 else return false;
 }
 public function checkUsernameUnique($username){
 if(empty($username)) return false;
 $users=WModel::get('users');
 $users->whereE('username',$username );
 $uid=$users->load('lr','uid');
 return $uid;
 }
}