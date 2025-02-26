<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Users_Currency_picklist extends WPicklist {
function create(){
$this->addElement( 0, WText::t('1206732410ICCJ'));
$currencyM=WModel::get('currency');
$currencyM->whereE('publish', 1 );
$currencyM->orderBy('ordering');
$currencyM->setLimit( 500 );
$currenciesA=$currencyM->load('ol',array('curid','title','code','symbol'));
$iptrackerInstalled=WExtension::exist('security.node');
if($iptrackerInstalled && WRoles::isNotAdmin('manager')){
$iptrackerLookupC=WClass::get('security.lookup');
$localCURID=$iptrackerLookupC->ipInfo( null, 'curid');
if(!empty($localCURID))$this->setDefault($localCURID );
}
if(!empty($currenciesA)){
foreach($currenciesA as $currencies){
$this->addElement($currencies->curid, $currencies->title.' ('. $currencies->symbol .')');
}
}
}
}