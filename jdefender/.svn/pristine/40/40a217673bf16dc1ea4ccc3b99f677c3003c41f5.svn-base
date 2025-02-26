<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Email_Email_form_mailer_view extends Output_Forms_class {
function prepareView(){
$type=$this->getValue('type','email.mailer');
if($type !=10){
$this->removeElements( array('email_form_mailer_fieldset_smtp'));
}
if($type !=3){
$this->removeElements( array('email_form_mailer_fieldset_send_mail'));
}
if($type==10 || $type > 100){
$this->removeElements( array('email_form_mailer_fieldset_dkim'));
}
if($type==11){
$this->removeElements( array('email_form_mailer_fieldset_dkim'));
}else{
$this->removeElements( array('email_form_mailer_fieldset_email_api'));
}
if($type < 100){
$this->removeElements( array('email_form_mailer_fieldset_sms_settings'));
}
if($type > 100){
$this->removeElements( array('email_form_mailer_fieldset_email_settings','email_form_mailer_fieldset_frequency_limitation_settings','email_form_mailer_fieldset_max_emails_limitation_settings'));
$type=$this->getValue('type');
switch ($type){
case 105:
$this->removeElements('email_form_mailer_email_mailer_p_sms_username');
break;
case 117:
$this->changeElements('email_form_mailer_email_mailer_p_sms_api','name', WText::t('1211811588SCXI'));
break;
default:
break;
}
}
return true;
}}