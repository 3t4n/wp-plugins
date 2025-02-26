<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Flexnet_class extends WClasses {
	private $_flexnet = null;
	private $_modelInfoO = null;
	private static $_alreadyDoneA = array();
	public function processAction($model) {
		if ( empty($model->ModelName) ) return false;
				$mainCredentialsC = WClass::get( 'main.credentials' );
		$crednetialO = $mainCredentialsC->loadFromType( 'flexnet' );
		if ( empty($crednetialO) ) return false;
				$this->_flexnet = new FLEXNET( $crednetialO->username, $crednetialO->passcode, $crednetialO->partnercode );
		$this->_modelInfoO = $model;
				switch( $model->ModelName ) {
			case 'contacts':
			case 'users':
				if ( !empty($model->ModelNew) ) {
					$this->_addContact();
				} else {
					$this->_updateContact();
				}				break;
			case 'item':
			case 'product':
			case 'classified':
			case 'voucher':
			case 'auction':
WMessage::log( '1 . Type : ' . $model->ModelName , 'flexnet_debug' );				
				if ( !empty($model->ModelNew) ) {
WMessage::log( '2 . New : ' . $model->ModelName , 'flexnet_debug' );					
					$this->_addProduct();
					$this->_addCatalogItem();  					$this->_AssociateToCatalogItem(); 				} else {
WMessage::log( '3 . Edit : ' . $model->ModelName , 'flexnet_debug' );					
					$this->_updateProduct();
					$this->_updateCatalogItem();						$this->_AssociateToCatalogItem(); 				}				break;	
			case 'order.products':
				if ( !empty($model->ModelNew) ) {
					$this->_addOrder();
				} else {
					$this->_updateOrder();
				}				break;				
			default:
				return false;
				break;
		}	
	}	
		private function _addOrder() {	
		 		$orderProductsM = WModel::get( 'order.products' );
 		$orderProductsM->whereE( 'oid', $this->_modelInfoO->oid );
 		$produtsA = $orderProductsM->load( 'ol', array( 'name', 'quantity', 'price', 'pid' ) );
 		if ( empty($produtsA) ) return false;
 		 		$LineNumber= 0;
 		foreach( $produtsA as $oneProduct ) {
 			$LineNumber+= 1;
			$oneProduct->namekey = WModel::getElementData( 'product', $oneProduct->pid, 'namekey' );
			$oneProduct->created = WModel::getElementData( 'product', $oneProduct->pid, 'created' );
			$order = $this->_prepareOrder( $oneProduct, $LineNumber ); 			$this->_flexnet->addUpdateOrder( $order );
 		}								
	}	
	private function _updateOrder() {
				$orderProductsM = WModel::get( 'order.products' );
		$orderProductsM->whereE( 'oid', $this->_modelInfoO->oid );
 		$produtsA = $orderProductsM->load( 'ol', array( 'name', 'quantity', 'price', 'pid' ) );
		if ( empty($produtsA) ) return false;
		$LineNumber= 0;
		foreach( $produtsA as $oneProduct ) {
			$LineNumber++;	
 			$oneProduct->namekey = WModel::getElementData( 'product', $oneProduct->pid, 'namekey' );
 			$oneProduct->created = WModel::getElementData( 'product', $oneProduct->pid, 'created' );
 			$order = $this->_prepareOrder( $oneProduct, $LineNumber );
 			$status = $this->_flexnet->addUpdateOrder( $order );
						if ( empty($status) ) {
				$this->_flexnet->addOrder( $order );
			}					
 		}	
	}
	private function _prepareOrder($product,$LineNumber) {
		$orderInfo = WModel::getElementData( 'order', $this->_modelInfoO->oid );
		$order = new Order();
		$order->ID = $orderInfo->namekey;			$order->AccountId = $orderInfo->uid;			$order->MemberMail = WUsers::get( 'email', $orderInfo->uid );			$order->InvoiceDate = WApplication::date( WTools::dateFormat( 'date-unix' ), $orderInfo->created );
		$order->OrderDate = WApplication::date( WTools::dateFormat( 'date-unix' ), $orderInfo->modified );
		$order->OrderNote = "";
		$order->PurchaseOrderID = "PurchaseOrderID";
		$order->SalesRep = "SalesRep";			
		$order->InvoiceID = "InvoiceID";
		$order->TO = "";			$order->CC = "";
		$order->BCC = "";
		$order->OrderLine = new OrderLine();
		$order->OrderLine->SKU = $product->namekey;				$order->OrderLine->Quantity = (int)$product->quantity;			$order->OrderLine->Price = $product->price;			$order->OrderLine->TemporaryOrderLine = false;
		$order->OrderLine->DownloadLimit = 5;
		$order->OrderLine->Status = "ACTIVE";		
		$order->OrderLine->EffectiveDate = WApplication::date( WTools::dateFormat( 'date-unix' ), $product->created );			$order->OrderLine->ExpirationDate = "01-01-2099";
		$order->OrderLine->LineNumber = $LineNumber;			$order->OrderLine->ActivationCode = "ActivationCode";
		$order->OrderLine->LicenseCode = "LicenseCode";
		$order->OrderLine->AllocatedAccountId = "AllocatedAccountId";
		$order->OrderLine->LicenseFileName = "LicenseFileName";
		$order->OrderLine->LicenseFileCode = "LicenseFileCode";
		return $order;
	}	
	private function _addProduct() {
		$product = $this->_prepareProduct();
		$this->_flexnet->addProduct( $product );
	}	
	private function _updateProduct() {
		$product = $this->_prepareProduct();
		$status = $this->_flexnet->addUpdateProduct( $product );
				if ( empty($status) ) {
			$this->_flexnet->addProduct( $product );
		}		
	}	
	private function _prepareProduct() {
		$translationProperty = $this->_modelInfoO->ModelName . 'trans';
		$product = new Product();
		$product->ID = $this->_modelInfoO->namekey;
		$product->Name = $this->_modelInfoO->$translationProperty->name;
		$product->ExtendedDescription = $this->_modelInfoO->$translationProperty->introduction . '<br>' . $this->_modelInfoO->$translationProperty->description;
		$product->Version = '1';			
		if ( empty($this->_modelInfoO->publishstart) ) $this->_modelInfoO->publishstart = time();
		if ( !empty($this->_modelInfoO->publishstart) ) $product->EffectiveDateString = WApplication::date( WTools::dateFormat( 'date-unix' ), $this->_modelInfoO->publishstart );
		if ( !empty($this->_modelInfoO->publishend) ) $product->ExpirationDateString = WApplication::date( WTools::dateFormat( 'date-unix' ), $this->_modelInfoO->publishend );			
		if ( !empty($this->_modelInfoO->availableend) ) $product->ArchiveDate = WApplication::date( WTools::dateFormat( 'date-unix' ), $this->_modelInfoO->availableend );
		if ( empty($product->ExpirationDateString) ) $product->ExpirationDateString = '2099-01-01';
		if ( empty($product->ArchiveDate) ) $product->ArchiveDate = '2099-01-01';
		$product->SortGroup = "SortGroup";			
				$product->NLR = "T";
		$product->ECCNCode = "5D002" ;
		$product->ENCCode = "UNRESTRICTED";
		$product->CCATSCode = "D######";
		$product->ProductManufacturerId = 'FunctionBay';
				if ( empty($product->ProductLineId) ) $product->ProductLineId = 'MS Office';			
		$product->LicenseGroup = "123";			$product->EndUserLicenseAgreement = "first agreement";			$product->ProductNote = "";		
		$product->PhysicalDistributionAvailable = "false";			
		return $product;
	}	
	private function _AssociateToCatalogItem () {		
		$ID = $this->_modelInfoO->namekey;
		$this->_flexnet->AssociateToCatalogItem( $ID );
	}	
	private function _addCatalogItem() {		
		$CatalogItem = $this->_prepareCatalogItem();
		$this->_flexnet->addCatalogItem( $CatalogItem );		
	}	
	private function _updateCatalogItem() {
		$CatalogItem = $this->_prepareCatalogItem();
		$status = $this->_flexnet->addUpdateCatalogItem( $CatalogItem );
				if ( empty($status) ) {
			$this->_flexnet->addCatalogItem( $CatalogItem );
		}		
	}	
	private function _prepareCatalogItem() {
		$translationProperty = $this->_modelInfoO->ModelName . 'trans';
		$CatalogItem = new CatalogItem();
		$CatalogItem->ID = $this->_modelInfoO->namekey;
		$CatalogItem->Name = $this->_modelInfoO->$translationProperty->name;
		$CatalogItem->Type = 'NORMAL';			$CatalogItem->Subscription = 'FALSE';			$CatalogItem->Temporary = 'FALSE';		
				$CatalogItem->DefaultDurationYear = 1;
		$CatalogItem->DefaultDurationMonth = 1;
		$CatalogItem->DefaultDurationDay = 1;
		$CatalogItem->CatalogManufacturerId = 'FunctionBay';					
				if ( empty($CatalogItem->CatalogProductLineId) ) $CatalogItem->CatalogProductLineId = 'MS Office';			
		$CatalogItem->LicenseGroup = "123";
		return $CatalogItem;
	}	
	private function _addContact() {
		$account=null;
		$member=null;
		$this->_prepareContact( $account, $member );
		if ( $this->_flexnet->addAccount( $account ) ) {
			$this->_flexnet->addMember( $member );
		}		
	}	
	private function _updateContact() {
		$account=null;
		$member=null;
		$this->_prepareContact( $account, $member );
		$status = $this->_flexnet->addUpdateAccount( $account );
		$this->_flexnet->addUpdateMember( $member );
	}	
	private function _prepareContact(&$account,&$member) {
		$account = new Account();
		$account->ID = $this->_modelInfoO->uid;
		$account->AccountName = $this->_modelInfoO->username;
		$account->AccountNote = '';
		$account->Status = "ACTIVE";
						$prop = 'contacts.details';
		$details = ( !empty($this->_modelInfoO->$prop) ? $prop : 'none' );
		$member = new Member();
		$member->ID = $account->ID;
		$member->FirstName = ( !empty($this->_modelInfoO->$details->first_name) ? $this->_modelInfoO->$details->first_name : '' );
		$member->LastName = ( !empty($this->_modelInfoO->$details->last_name) ? $this->_modelInfoO->$details->last_name : '' );
		if ( empty($member->FirstName) || empty($member->LastName) ) {
			$nameA = explode( ' ', $this->_modelInfoO->name );
			$member->FirstName = array_shift($nameA);
			$member->LastName = implode( ' ', $nameA );
			if ( empty($member->LastName) ) $member->LastName = $member->FirstName;
		}		
		$member->JobTitle = ( !empty($this->_modelInfoO->$details->title) ? $this->_modelInfoO->$details->title : '' );
		$member->Email = $this->_modelInfoO->email;
		$member->Phone = $this->_modelInfoO->mobile;
		$member->Fax = '';
		$member->AddressLine1 = 'none';
		$member->AddressLine2 = '';
		$member->AddressLine3 = '';
		$member->AddressLine4 = '';
		$member->City = 'New York';
		$member->State = 'NY';			$member->PostalCode = '';			$member->Country = 'US';			$member->AdminPrivilege = "false";
		$member->DownloadPrivilege = "false";
		$member->TransferSplitPrivilege = "false";
		$member->MoveHostDevicePrivilege = "false";
		$member->SendEmailIndicator = "false";
		$member->MemberNote = "Username: " . $this->_modelInfoO->username;
		$member->ExpirationDateString = "";
		$member->Status = "ACTIVE";
		$member->ExpirationDateString = "01-01-2099";
		$member->Status = "ACTIVE";
	}		
	public function saveCredential($model) {
						$this->_createController( 'contacts' );
		$this->_createController( 'users' );
		$this->_createController( 'product' );
		$this->_createController( 'item' );
		$this->_createController( 'classified' );
		$this->_createController( 'voucher' );
		$this->_createController( 'auction' );
		$this->_createController( 'order', false );
				$this->_createController( 'order.products', false ); 
	}	
	private function _createAction($ctrid,$task,$action) {	
		$actionM = WModel::get( 'library.action' );
		$actionM->whereE( 'namekey', 'main.' . $action );
		$actid = $actionM->load( 'lr', 'actid' );
		if ( empty($actid) ) {
			$actionM->namekey = 'main.' . $action;
			$actionM->wid = WExtension::get( 'main.node', 'wid' );
			$actionM->folder = $action;
			$actionM->status = 50;
			$actionM->rolid = WRoles::get( 'allusers', 'rolid' );
			$actionM->publish = 1;
			$actionM->core = 1;
			$actionM->returnId();
			$actionM->save();
			if ( !empty($actionM->actid) ) $actid = $actionM->actid;
		}		
				$libraryControlleractionM = WModel::get( 'library.controlleraction' );
		$libraryControlleractionM->whereE( 'ctrid', $ctrid );
		$libraryControlleractionM->whereE( 'actid', $actid );
		if ( $libraryControlleractionM->exist() ) return true;
		$libraryControlleractionM->ctrid = $ctrid;
		$libraryControlleractionM->actid = $actid;
		$libraryControlleractionM->action = 'main.' . $action;
		$libraryControlleractionM->namekey = 'flexnet' . $task . '.main.' . $action;
		$libraryControlleractionM->core = 1;
		$libraryControlleractionM->publish = 1;
		$libraryControlleractionM->ordering = 99;
		$libraryControlleractionM->save();
	}	
	private function _createController($task,$backend=true) {		
				$libraryControllerM = WModel::get( 'library.controller' );
		$libraryControllerM->remember( 'outgoing' . $task, true, 'Outoging' );
		$libraryControllerM->whereE( 'app', 'model-outgoing' );
		$libraryControllerM->whereE( 'task', $task );
		$ctrid = $libraryControllerM->load( 'lr', 'ctrid' );
		if ( empty($ctrid) ) {
						$cacheC = WCache::get();
			$cacheC->resetCache( 'Outoging' );
			$libraryControllerM->app = 'model-outgoing';
			$libraryControllerM->task = $task;
			$libraryControllerM->namekey = 'model-outgoing.' . $task;
			$libraryControllerM->premium = 0;
			$libraryControllerM->admin = (int)$backend;
			$libraryControllerM->publish = 1;
			$libraryControllerM->core = 0;
			$libraryControllerM->reload = 0;
			$libraryControllerM->trigger = 50;
			$libraryControllerM->rolid = WRoles::get( 'allusers', 'rolid' );
			$libraryControllerM->returnId();
			$libraryControllerM->save();
			if ( !empty($libraryControllerM->ctrid) ) $ctrid = $libraryControllerM->ctrid;
		}		
				$this->_createAction( $ctrid, $task, 'flexnet' );
	}	
}
class FLEXNET {
	var $wsdlFile = 'SubscribeNet.wsdl.xml';
	var $client;
	var $sessionId = "";
	private $userName = "";
	private $password = "";
	private $partnerCode = "";
	function __construct($userName,$password,$partnerCode) {
		$this->userName = $userName;
		$this->password = $password;
		$this->partnerCode = $partnerCode;
		$this->client = new SoapClient( JOOBI_DS_NODE . 'main/action/flexnet/SubscribeNet.wsdl.xml', array(
				"trace" => true,
				'cache_wsdl' => WSDL_CACHE_NONE )
				);
		try{
			$result = $this->client->login( array("Username" => $this->userName , "Password" => $this->password , "PartnerCode" => $this->partnerCode) );
			if(isset($result->SessionID)){
				$sessionId = $result->SessionID;
				$auth = new stdClass();
				$auth->SessionID = $sessionId;
				$header = new SoapHeader('https://manageruat.flexnetoperations.com/service/snetmgr/services/SubscribeNet'
						, 'SessionHeader', $auth, false);
				$this->client->__setSoapHeaders(array($header));
			}
		}catch(Exception $e){
			var_dump($e);
		}
	}
	function sendRequest($xml,$action) {
WMessage::log( '90 . sendRequest : ' , 'flexnet_debug' );
WMessage::log( $action , 'flexnet_debug' );
WMessage::log( $xml , 'flexnet_debug' );
		$soapBody = new \SoapVar($xml, \XSD_ANYXML);
		try{
			if($action == "Add"){
				$answer = $this->client->Add($soapBody);
			}elseif($action == "AddUpdate"){
				$answer = $this->client->AddUpdate($soapBody);
							}elseif($action == "Associate"){
				$answer = $this->client->Associate($soapBody);			
			}else{
				return array("error" => "undefined action: Add or AddUpdate");
			}
WMessage::log( '95 . received result : ' , 'flexnet_debug' );
WMessage::log( $answer , 'flexnet_debug' );
			if(isset($answer->TransactionResult)){
				if($answer->TransactionResult->Successful){
					return array("success" => true);
				}else{
					if(is_array($answer->TransactionResult->TransactionFault)){
						$errors = array();
						foreach($answer->TransactionResult->TransactionFault as $fault){
							$errors[] = $fault->errorMessage;
						}
						return array("error" => $errors);
					}else{
						return array("error" => $answer->TransactionResult->TransactionFault->errorMessage);
					}
				}
			}
		}catch(Exception $e){
			return array("error" => $e->faultstring);
		}
	}
	function generateRequest($type,$action,$xmlData){
		$xml = "<".$action.' xmlns="uri:webservice.subscribenet.intraware.com" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
		$xml.='
<SubscribeNetObject xsi:type="uri1:'.$type.'" xmlns:uri1="uri:subscribenet.intraware.com">';
		$xml.= $xmlData;
		$xml.='</SubscribeNetObject>';
		$xml.="</".$action.">
";
		return $xml;
	}
	function prepareMemberData($memberObj){
		$expirationDate = new DateTime( $memberObj->ExpirationDateString );
		$Xml = '<uri1:Reference xsi:type="uri1:MemberReference">
						<uri1:Email xsi:type="xsd:string">'.$memberObj->Email.'</uri1:Email>
				<uri1:AccountReference xsi:type="uri1:AccountReference">
				<uri1:ID xsi:type="xsd:string">'.$memberObj->ID.'</uri1:ID>
				</uri1:AccountReference>
					</uri1:Reference>
					<uri1:FirstName xsi:type="xsd:string">'.$memberObj->FirstName.'</uri1:FirstName>
			<uri1:LastName xsi:type="xsd:string">'.$memberObj->LastName.'</uri1:LastName>
			<uri1:JobTitle xsi:type="xsd:string">'.$memberObj->JobTitle.'</uri1:JobTitle>
			<uri1:Phone xsi:type="xsd:string">'.$memberObj->Phone.'</uri1:Phone>
			<uri1:Fax xsi:type="xsd:string">'.$memberObj->Fax.'</uri1:Fax>
			<uri1:AddressLine1 xsi:type="xsd:string">'.$memberObj->AddressLine1.'</uri1:AddressLine1>
			<uri1:City xsi:type="xsd:string">'.$memberObj->City.'</uri1:City>
			<uri1:Country xsi:type="xsd:string">'.$memberObj->Country.'</uri1:Country>
			<uri1:AddressLine2 xsi:type="xsd:string">'.$memberObj->AddressLine2.'</uri1:AddressLine2>
			<uri1:AddressLine3 xsi:type="xsd:string">'.$memberObj->AddressLine3.'</uri1:AddressLine3>
			<uri1:AddressLine4 xsi:type="xsd:string">'.$memberObj->AddressLine4.'</uri1:AddressLine4>
			<uri1:ExpirationDate xsi:type="xsd:date">'.$expirationDate->format('Y-m-d H:i:s').'</uri1:ExpirationDate>
			<uri1:Status xsi:type="xsd:string">'.$memberObj->Status.'</uri1:Status>
			<uri1:State xsi:type="xsd:string">'.$memberObj->State.'</uri1:State>
			<uri1:PostalCode xsi:type="xsd:string">'.$memberObj->PostalCode.'</uri1:PostalCode>
			<uri1:MemberNote xsi:type="xsd:string">'.$memberObj->MemberNote.'</uri1:MemberNote>
			<uri1:AdminPrivilege xsi:type="xsd:boolean">'.$memberObj->AdminPrivilege.'</uri1:AdminPrivilege>
			<uri1:DownloadPrivilege xsi:type="xsd:boolean">'.$memberObj->DownloadPrivilege.'</uri1:DownloadPrivilege>
			<uri1:TransferSplitPrivilege xsi:type="xsd:boolean">'.$memberObj->TransferSplitPrivilege.'</uri1:TransferSplitPrivilege>
			<uri1:MoveHostDevicePrivilege xsi:type="xsd:boolean">'.$memberObj->MoveHostDevicePrivilege.'</uri1:MoveHostDevicePrivilege>
			<uri1:SendEmailIndicator xsi:type="xsd:boolean">'.$memberObj->SendEmailIndicator.'</uri1:SendEmailIndicator>
			';
		return $Xml;
	}
	function addMember($memberObj){
		$memberXml = $this->prepareMemberData($memberObj);
		$xml = $this->generateRequest("Member" , "Add" , $memberXml);
		$soapBody = new \SoapVar($xml, \XSD_ANYXML);
		try{
			$answer = $this->client->Add($soapBody);
			if(isset($answer->TransactionResult)){
				if($answer->TransactionResult->Successful){
					return true;
									}else{
					return false;
				}
			}
		}catch(Exception $e){
			return false;
		}
	}
	function addUpdateMember($memberObj){
		$memberXml = $this->prepareMemberData($memberObj);
		$xml = $this->generateRequest("Member" , "AddUpdate" , $memberXml);
		$soapBody = new \SoapVar($xml, \XSD_ANYXML);
		try{
			$answer = $this->client->AddUpdate($soapBody);
			if(isset($answer->TransactionResult)){
				if ( $answer->TransactionResult->Successful ) {
					return true;
									}else{
					return false;
				}
			}
		}catch(Exception $e){
			return false;
		}
	}
	function prepareAccountData($accountObj){
		$Xml = '<uri1:Reference xsi:type="uri1:AccountReference">
								<uri1:ID xsi:type="xsd:string">'.$accountObj->ID.'</uri1:ID>
							</uri1:Reference>
							<uri1:AccountName xsi:type="xsd:string">'.$accountObj->AccountName.'</uri1:AccountName>
				<uri1:AccountNote xsi:type="xsd:string">'.$accountObj->AccountNote.'</uri1:AccountNote>
				<uri1:Status xsi:type="xsd:string">'.$accountObj->Status.'</uri1:Status>';
		if( isset($accountObj->UserDefinedField) ){
			$Xml.='<uri1:UserDefinedField xsi:type="uri1:UserDefinedField" code="'.$accountObj->UserDefinedField->code.'" use="'.$accountObj->UserDefinedField->touse.'" >
							'.$accountObj->UserDefinedField->desc.'
						</uri1:UserDefinedField>';
		}
		return $Xml;
	}
	function addAccount($productObj){		
		$productXml = $this->prepareAccountData($productObj);
		$xml = $this->generateRequest("Account" , "Add" , $productXml);
		$soapBody = new \SoapVar($xml, \XSD_ANYXML);
		try{
			$answer = $this->client->Add($soapBody);
			if(isset($answer->TransactionResult)){
				if($answer->TransactionResult->Successful){
					return true;
									}else{
					return false;
 									}
			}
		}catch(Exception $e){ 
			return false;
 					}
	}
	function addOrder($orderObj){
		$orderXml = $orderObj->prepareData();
		if(is_array($orderXml)){
			return $orderXml['error'];
		}
		$xml = $this->generateRequest("Order" , "Add" , $orderXml);
				$this->sendRequest($xml , "Add");
	}
	function addUpdateOrder($orderObj){
		$orderXml = $orderObj->prepareData();
		if(is_array($orderXml)){
			return $orderXml['error'];
		}
		$xml = $this->generateRequest("Order" , "AddUpdate" , $orderXml);
				$this->sendRequest($xml , "AddUpdate");
	}
	function addUpdateAccount($productObj){
		$productXml = $this->prepareAccountData($productObj);
		$xml = $this->generateRequest("Account" , "AddUpdate" , $productXml);
		$soapBody = new \SoapVar($xml, \XSD_ANYXML);		
		try{
			$answer = $this->client->Add($soapBody);				
			if( isset($answer->TransactionResult) ) {
				if($answer->TransactionResult->Successful){
					return true;
									}else{
					return false;
				}
			}
		}catch(Exception $e){
			return false;
		}
	}
	public function prepareProductData() {
		if($this->ID == null){
			return array("error" => "ID is required");
		}else if($this->Name == null){
			return array("error" => "Name is required");
		}else if($this->EffectiveDateString == null){
			return array("error" => "Effective date is required");
		}else if($this->ExpirationDateString  == null){
			return array("error" => "Expiration date is required");
		}else if($this->ProductManufacturerId  == null){
			return array("error" => "Product Manufacture Id is required");
		}else if($this->ProductLineId  == null){
			return array("error" => "ProductLineId Id is required");
		}else if($this->PhysicalDistributionAvailable == null){
			return array("error" => "PhysicalDistributionAvailable Id is required");
		}else if($this->NLR == null){
			return array("error" => "NLR Id is required");
		}else if($this->LicenseGroup == null){
			return array("error" => "LicenseGroup is required");
		}else if($this->ECCNCode == null){
			return array("error" => "ECCNCode Id is required");
		}else if($this->ENCCode == null){
			return array("error" => "ENCCode Id is required");
		}else if($this->CCATSCode == null){
			return array("error" => "CCATSCode Id is required");
		}
		$effectiveDate = new DateTime($this->EffectiveDateString);
		$expirationDate = new DateTime($this->ExpirationDateString);
		$Xml = '
<uri1:Reference xsi:type="uri1:ProductReference">
			<uri1:ID xsi:type="xsd:string">'.$this->ID.'</uri1:ID>
			</uri1:Reference>
			<uri1:Description xsi:type="xsd:string">'.$this->Name.'</uri1:Description>
					<uri1:EffectiveDate xsi:type="xsd:date">'.$effectiveDate->format('Y-m-d H:i:s').'</uri1:EffectiveDate>
					<uri1:ExpirationDate xsi:type="xsd:date">'.$expirationDate->format('Y-m-d H:i:s').'</uri1:ExpirationDate>
			<uri1:ProductManufacturer xsi:type="uri1:ManufacturerReference">
			<uri1:ID xsi:type="xsd:string">'.$this->ProductManufacturerId.'</uri1:ID>
			</uri1:ProductManufacturer>';
		$Xml.= '
<uri1:ExportComplianceClassification xsi:type="uri1:ExportComplianceClassification">
				<uri1:NLR xsi:type="xsd:string">'.$this->NLR.'</uri1:NLR>
				<uri1:ECCNCode xsi:type="xsd:string">'.$this->ECCNCode.'</uri1:ECCNCode>
				<uri1:ENCCode xsi:type="xsd:string">'.$this->ENCCode.'</uri1:ENCCode>
				<uri1:CCATSCode xsi:type="xsd:string">'.$this->CCATSCode.'</uri1:CCATSCode>
			</uri1:ExportComplianceClassification>
			<uri1:ProductLine xsi:type="uri1:ProductLineReference">
				<uri1:ID xsi:type="xsd:string">'.$this->ProductLineId.'</uri1:ID>
			</uri1:ProductLine>';
		$Xml .= '
<uri1:PhysicalDistributionAvailable xsi:type="xsd:boolean">
				'.$this->PhysicalDistributionAvailable.'
			</uri1:PhysicalDistributionAvailable>';
		if($this->Version != null){
			$Xml.='<uri1:Version xsi:type="xsd:string">'.$this->Version.'</uri1:Version>';
		}
		if($this->ArchiveDate != null){
			$archiveDate = new DateTime($this->ArchiveDate);
			$Xml.='<uri1:ArchiveDate xsi:type="xsd:date">'.$archiveDate->format('Y-m-d H:i:s').'</uri1:ArchiveDate>';
		}
		if($this->ExtendedDescription != null){
			$Xml.='<uri1:ExtendedDescription xsi:type="xsd:string">' . htmlspecialchars( $this->ExtendedDescription ) . '</uri1:ExtendedDescription>';
		}
		if($this->File != null){
			$Xml.=   '<uri1:File xsi:type="uri1:FileReference">
								<uri1:ID xsi:type="xsd:string">'.$this->File.'</uri1:ID>
						</uri1:File>';
		}
		if($this->EndUserLicenseAgreement != null){
			$Xml.= '<uri1:EndUserLicenseAgreement xsi:type="uri1:AgreementReference">
				<uri1:AgreementName xsi:type="xsd:string">'.$this->EndUserLicenseAgreement.'</uri1:AgreementName>
			</uri1:EndUserLicenseAgreement>';
		}
		if(isset($this->AlternateLanguage) && $this->AlternateLanguage != null){
			if($this->AlternateLanguage->language != null && $this->AlternateLanguage->description != null){
				$Xml.='<uri1:AlternateLanguage xsi:type="uri1:ProductAlternateLanguage">
				<uri1:Language xsi:type="xsd:string">'.$this->AlternateLanguage->language.'</uri1:Language>
				<uri1:Description xsi:type="xsd:string">'.$this->AlternateLanguage->description.'</uri1:Description>';
				if($this->AlternateLanguage->extendedDescription != null ){
					$Xml.='<uri1:ExtendedDescription xsi:type="xsd:string">'.$this->AlternateLanguage->extendedDescription.'</uri1:ExtendedDescription>';
				}
				if($this->AlternateLanguage->productNote != null ){
					$Xml.='<uri1:ProductNote xsi:type="xsd:string">'.$this->AlternateLanguage->productNote.'</uri1:ProductNote>';
				}
				$Xml.='</uri1:AlternateLanguage>';
			}
		}
		if($this->ProductNote != null){
			$Xml.='<uri1:ProductNote xsi:type="xsd:string">'.$this->ProductNote.'</uri1:ProductNote>';
		}
		if($this->SortGroup != null){
			$Xml.='<uri1:SortGroup xsi:type="xsd:string">'.$this->SortGroup.'</uri1:SortGroup>';
		}
		if( isset($this->UserDefinedField) && $this->UserDefinedField != null ){
			if($this->UserDefinedField->touse != null && $this->UserDefinedField->code!=null){
				$Xml.='<uri1:UserDefinedField xsi:type="uri1:UserDefinedField" code="'.$this->UserDefinedField->code.'" use="'.$this->UserDefinedField->touse.'" >';
				if($this->UserDefinedField->desc != null){
					$Xml.=$this->UserDefinedField->desc;
				}
				$Xml.='</uri1:UserDefinedField>';
			}else{
			}
		}
		return $Xml;
	}	
	function addProduct($productObj) {
		$productXml = $productObj->prepareData();
WMessage::log( '10 . addProduct : ' , 'flexnet_debug' );		
WMessage::log( $productXml , 'flexnet_debug' );
		if ( is_array($productXml) ) {
			return $productXml['error'];
		}	
		$xml = $this->generateRequest("Product" , "Add" , $productXml);
		return $this->sendRequest( $xml , "Add" );
	}
	function addUpdateProduct($productObj){
		$productXml = $productObj->prepareData();
		if(is_array($productXml)){
			return $productXml['error'];
		}
		$xml = $this->generateRequest( "Product" , "AddUpdate" , $productXml );
		return $this->sendRequest( $xml , "AddUpdate" );
	}	
		public function prepareCatalogItemData() {
		if($this->ID == null){
			return array("error" => "ID is required");
		}else if($this->Name == null){
			return array("error" => "Name is required");
		}else if($this->Type == null){
			return array("error" => "Type is required");
		}else if($this->Subscription  == null){
			return array("error" => "Subscription is required");
		}else if($this->Temporary  == null){
			return array("error" => "Temporary is required");
		}else if($this->DefaultDurationYear  == null){
			return array("error" => "Default Duration Year is required");
		}else if($this->DefaultDurationMonth  == null){
			return array("error" => "Default Duration Month is required");
		}else if($this->DefaultDurationDay  == null){
			return array("error" => "Default Duration Day is required");
		}else if($this->CatalogManufacturerId  == null){
			return array("error" => "Catalog Manufacturer Id is required");
		}else if($this->CatalogProductLineId  == null){
			return array("error" => "CatalogProductLine Id is required");
		}
				$Xml=	'<uri1:Reference xsi:type="uri1:CatalogItemReference">
					<uri1:ID xsi:type="xsd:string">' . $this->ID . '</uri1:ID>
				</uri1:Reference>
				<uri1:Description>' . $this->Name . '</uri1:Description>
				<uri1:Type>' . $this->Type . '</uri1:Type>
				<uri1:Subscription>' . $this->Subscription . '</uri1:Subscription>
				<uri1:Temporary>' . $this->Temporary . '</uri1:Temporary>
				<uri1:DefaultDurationYear>' . $this->DefaultDurationYear . '</uri1:DefaultDurationYear>
				<uri1:DefaultDurationMonth>' . $this->DefaultDurationMonth . '</uri1:DefaultDurationMonth>
				<uri1:DefaultDurationDay>' . $this->DefaultDurationDay . '</uri1:DefaultDurationDay>
				<uri1:CatalogManufacturer>
					<uri1:ID>' . $this->CatalogManufacturerId . '</uri1:ID>
				</uri1:CatalogManufacturer>
				<uri1:CatalogProductLine>
					<uri1:ID>' . $this->CatalogProductLineId . '</uri1:ID>
				</uri1:CatalogProductLine>';
		return $Xml;
	}
		public function AssociateToCatalogItem ($ID) {
		if($ID == null){
			return array("error" => "ID is required");
		}		$Xml= '<Associate xmlns="uri:webservice.subscribenet.intraware.com " xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
						<SubscribeNetObjectReference xsi:type="ns2:CatalogItemReference" xmlns:ns2="uri:subscribenet.intraware.com ">
							<ns2:ID xsi:type="xsd:string">' . $ID . '</ns2:ID>
						</SubscribeNetObjectReference>
						<SubscribeNetObjectReferenceAss xsi:type="ns3:ProductInCatReference" xmlns:ns3="uri:subscribenet.intraware.com ">
							<ns3:ID xsi:type="xsd:string">' . $ID . '</ns3:ID>
						</SubscribeNetObjectReferenceAss>
					</Associate>';
		return $this->sendRequest( $Xml , "Associate" );
	}	
		function addCatalogItem($catalogItemObj){
		$catalogItemXml = $catalogItemObj->prepareData();
		if(is_array($catalogItemXml)){
			return $catalogItemXml['error'];
		}	
		$xml = $this->generateRequest("CatalogItem" , "Add" , $catalogItemXml);
		return $this->sendRequest( $xml , "Add" );
	}	
		function addUpdateCatalogItem($catalogItemObj){
		$catalogItemXml = $catalogItemObj->prepareData();
		if(is_array($catalogItemXml)){
			return $catalogItemXml['error'];
		}	
		$xml = $this->generateRequest( "CatalogItem" , "AddUpdate" , $catalogItemXml );
		return $this->sendRequest( $xml , "AddUpdate" );
	}
}
class Account {
	var $ID;
	var $AccountName;
	var $AccountNote;
	var $Status; }
class Member {
	var $ID;
	var $FirstName;
	var $LastName;
	var $JobTitle ;
	var $Phone ;
	var $Email ;
	var $Fax;
	var $AddressLine1;
	var $AddressLine2;
	var $AddressLine3;
	var $AddressLine4;
	var $City;
	var $State ;
	var $PostalCode ;
	var $Country ;
	var $AdminPrivilege;
	var $DownloadPrivilege ;
	var $TransferSplitPrivilege;
	var $MoveHostDevicePrivilege;
	var $SendEmailIndicator;
	var $Permission;
	var $Preference;
	var $MemberNote;
	var $ExpirationDate;
	var $Status = "";
	var $UserDefinedField;
}
class UserDefinedField{
	var $code;
	var $desc;
	var $touse;
}
class Product {
	var $ID = null;
	var $Name = null;
	var $EffectiveDateString = null;
	var $ExpirationDateString  = null;
	var $PhysicalDistributionAvailable = null;
		var $NLR = null;
	var $ECCNCode = null;
	var $ENCCode = null;
	var $CCATSCode = null;
	var $ProductManufacturerId = null;
	var $ProductLineId = null;
	var $Version = null;
	var $ArchiveDate = null;
	var $SortGroup = null;
	var $ExtendedDescription = null;
	var $EndUserLicenseAgreement = null;
	var $ProductNote = null;
	var $UserDefinedField = null;
	var $AlternateLanguage = null;
	var $File = null;
	public function prepareData(){
		if($this->ID == null){
			return array("error" => "ID is required");
		}else if($this->Name == null){
			return array("error" => "Name is required");
		}else if($this->EffectiveDateString == null){
			return array("error" => "Effective date is required");
		}else if($this->ExpirationDateString  == null){
			return array("error" => "Expiration date is required");
		}else if($this->ProductManufacturerId  == null){
			return array("error" => "Product Manufacture Id is required");
		}else if($this->ProductLineId  == null){
			return array("error" => "ProductLineId Id is required");
		}else if($this->PhysicalDistributionAvailable == null){
			return array("error" => "PhysicalDistributionAvailable Id is required");
		}else if($this->NLR == null){
			return array("error" => "NLR Id is required");
		}else if($this->ECCNCode == null){
			return array("error" => "ECCNCode Id is required");
		}else if($this->LicenseGroup == null){
			return array("error" => "LicenseGroup Id is required");
		}else if($this->ENCCode == null){
			return array("error" => "ENCCode Id is required");
		}else if($this->CCATSCode == null){
			return array("error" => "CCATSCode Id is required");
		}
		$effectiveDate = new DateTime($this->EffectiveDateString);
		$expirationDate = new DateTime($this->ExpirationDateString);
		$Xml = '<uri1:Reference xsi:type="uri1:ProductReference">
					<uri1:ID xsi:type="xsd:string">'.$this->ID.'</uri1:ID>
				</uri1:Reference>
				<uri1:Description xsi:type="xsd:string">'.$this->Name.'</uri1:Description>
				<uri1:EffectiveDate xsi:type="xsd:date">'.$effectiveDate->format('Y-m-d H:i:s').'</uri1:EffectiveDate>
				<uri1:ExpirationDate xsi:type="xsd:date">'.$expirationDate->format('Y-m-d H:i:s').'</uri1:ExpirationDate>
				<uri1:ProductManufacturer xsi:type="uri1:ManufacturerReference">
					<uri1:ID xsi:type="xsd:string">'.$this->ProductManufacturerId.'</uri1:ID>
				</uri1:ProductManufacturer>';
		$Xml.=  '<uri1:ExportComplianceClassification xsi:type="uri1:ExportComplianceClassification">
				<uri1:NLR xsi:type="xsd:string">'.$this->NLR.'</uri1:NLR>
				<uri1:ECCNCode xsi:type="xsd:string">'.$this->ECCNCode.'</uri1:ECCNCode>
				<uri1:ENCCode xsi:type="xsd:string">'.$this->ENCCode.'</uri1:ENCCode>
				<uri1:CCATSCode xsi:type="xsd:string">'.$this->CCATSCode.'</uri1:CCATSCode>
			</uri1:ExportComplianceClassification>
			<uri1:ProductLine xsi:type="uri1:ProductLineReference">
				<uri1:ID xsi:type="xsd:string">'.$this->ProductLineId.'</uri1:ID>
			</uri1:ProductLine>
			<uri1:PhysicalDistributionAvailable xsi:type="xsd:boolean">
				'.$this->PhysicalDistributionAvailable.'
			</uri1:PhysicalDistributionAvailable>';
		if($this->Version != null){
			$Xml.='<uri1:Version xsi:type="xsd:string">'.$this->Version.'</uri1:Version>';
		}
		if($this->ArchiveDate != null){
			$archiveDate = new DateTime($this->ArchiveDate);
			$Xml.='<uri1:ArchiveDate xsi:type="xsd:date">'.$archiveDate->format('Y-m-d H:i:s').'</uri1:ArchiveDate>';
		}
		if($this->ExtendedDescription != null){
			$Xml.='<uri1:ExtendedDescription xsi:type="xsd:string">' . htmlspecialchars( $this->ExtendedDescription ) . '</uri1:ExtendedDescription>';
		}
		if($this->File != null){
			$Xml.=   '<uri1:File xsi:type="uri1:FileReference">
								<uri1:ID xsi:type="xsd:string">'.$this->File.'</uri1:ID>
						</uri1:File>';
		}
		if($this->EndUserLicenseAgreement != null){
			$Xml.= '<uri1:EndUserLicenseAgreement xsi:type="uri1:AgreementReference">
				<uri1:AgreementName xsi:type="xsd:string">'.$this->EndUserLicenseAgreement.'</uri1:AgreementName>
			</uri1:EndUserLicenseAgreement>';
		}
		if(isset($this->AlternateLanguage) && $this->AlternateLanguage != null){
			if($this->AlternateLanguage->language != null && $this->AlternateLanguage->description != null){
				$Xml.='<uri1:AlternateLanguage xsi:type="uri1:ProductAlternateLanguage">
				<uri1:Language xsi:type="xsd:string">'.$this->AlternateLanguage->language.'</uri1:Language>
				<uri1:Description xsi:type="xsd:string">'.$this->AlternateLanguage->description.'</uri1:Description>';
				if($this->AlternateLanguage->extendedDescription != null ){
					$Xml.='<uri1:ExtendedDescription xsi:type="xsd:string">'.$this->AlternateLanguage->extendedDescription.'</uri1:ExtendedDescription>';
				}
				if($this->AlternateLanguage->productNote != null ){
					$Xml.='<uri1:ProductNote xsi:type="xsd:string">'.$this->AlternateLanguage->productNote.'</uri1:ProductNote>';
				}
				$Xml.='</uri1:AlternateLanguage>';
			}
		}
		if($this->ProductNote != null){
			$Xml.='<uri1:ProductNote xsi:type="xsd:string">'.$this->ProductNote.'</uri1:ProductNote>';
		}
		if($this->SortGroup != null){
			$Xml.='<uri1:SortGroup xsi:type="xsd:string">'.$this->SortGroup.'</uri1:SortGroup>';
		}
		if( isset($this->UserDefinedField) && $this->UserDefinedField != null ){
			if($this->UserDefinedField->touse != null && $this->UserDefinedField->code!=null){
				$Xml.='<uri1:UserDefinedField xsi:type="uri1:UserDefinedField" code="'.$this->UserDefinedField->code.'" use="'.$this->UserDefinedField->touse.'" >';
				if($this->UserDefinedField->desc != null){
					$Xml.=$this->UserDefinedField->desc;
				}
				$Xml.='</uri1:UserDefinedField>';
			}else{
			}
		}
		return $Xml;
	}
}
class CatalogItem {
	var $ID = null;
	var $Name = null;
	var $Type = null;		var $Subscription = null;		var $Temporary = null;		
		var $DefaultDurationYear = null;
	var $DefaultDurationMonth = null;
	var $DefaultDurationDay = null;
	var $CatalogManufacturerId = null;		var $CatalogProductLineId = null;			
	public function prepareData(){
		if($this->ID == null){
			return array("error" => "ID is required");
		}else if($this->Name == null){
			return array("error" => "Name is required");
		}else if($this->Type == null){
			return array("error" => "Type is required");
		}else if($this->Subscription  == null){
			return array("error" => "Subscription is required");
		}else if($this->Temporary  == null){
			return array("error" => "Temporary is required");
		}else if($this->DefaultDurationYear  == null){
			return array("error" => "Default Duration Year is required");
		}else if($this->DefaultDurationMonth  == null){
			return array("error" => "Default Duration Month is required");
		}else if($this->DefaultDurationDay  == null){
			return array("error" => "Default Duration Day is required");
		}else if($this->CatalogManufacturerId  == null){
			return array("error" => "Catalog Manufacturer Id is required");
		}else if($this->CatalogProductLineId  == null){
			return array("error" => "CatalogProductLine Id is required");
		}
				$Xml=	'<uri1:Reference xsi:type="uri1:CatalogItemReference">
					<uri1:ID xsi:type="xsd:string">' . $this->ID . '</uri1:ID>
				</uri1:Reference>
				<uri1:Description>' . $this->Name . '</uri1:Description>
				<uri1:Type>' . $this->Type . '</uri1:Type>
				<uri1:Subscription>' . $this->Subscription . '</uri1:Subscription>
				<uri1:Temporary>' . $this->Temporary . '</uri1:Temporary>
				<uri1:DefaultDurationYear>' . $this->DefaultDurationYear . '</uri1:DefaultDurationYear>
				<uri1:DefaultDurationMonth>' . $this->DefaultDurationMonth . '</uri1:DefaultDurationMonth>
				<uri1:DefaultDurationDay>' . $this->DefaultDurationDay . '</uri1:DefaultDurationDay>
				<uri1:CatalogManufacturer>
					<uri1:ID>' . $this->CatalogManufacturerId . '</uri1:ID>
				</uri1:CatalogManufacturer>
				<uri1:CatalogProductLine>
					<uri1:ID>' . $this->CatalogProductLineId . '</uri1:ID>
				</uri1:CatalogProductLine>';
		return $Xml;
	}
}
class AlternateLanguageClass{
	var $language;
	var $description;
	var $extendedDescription;
	var $productNote;
}
class Order{
	var $ID;
	var $AccountId;
	var $MemberMail;
	var $OrderDate;
	var $PurchaseOrderID;
	var $SalesRep;
	var $InvoiceID;
	var $InvoiceDate;
	var $OrderNote;
	var $OrderLine;
	var $TO;
	var $CC;
	var $BCC;
	var $UserDefinedField;
	public function prepareData(){
		if($this->ID == null){
			return array("error" => "ID is required");
		}else if($this->AccountId == null){
			return array("error" => "Account is required");
		}else if($this->OrderLine == null){
			return array("error" => "OrderLine is required");
		}else if($this->OrderLine != null && $this->OrderLine->SKU == null){
			return array("error" => "OrderLine SKU is required");
		}else if($this->OrderLine != null && $this->OrderLine->Quantity == null){
			return array("error" => "OrderLine Quantity is required");
		}
		$Xml = '<uri1:Reference xsi:type="uri1:OrderReference">
						<uri1:ID xsi:type="xsd:string">'.$this->ID.'</uri1:ID>
					</uri1:Reference>
					<uri1:Account xsi:type="uri1:AccountReference">
						<uri1:ID xsi:type="xsd:string">'.$this->AccountId.'</uri1:ID>
					</uri1:Account>
					';
		if($this->MemberMail != null){
			$Xml.='<uri1:Member xsi:type="uri1:MemberReference">
							<uri1:Email xsi:type="xsd:string">'.$this->MemberMail.'</uri1:Email>
						</uri1:Member>';
		}
		if($this->OrderDate != null){
			$orderDate = new DateTime($this->OrderDate);
			$Xml.='<uri1:OrderDate xsi:type="xsd:date">'.$orderDate->format('Y-m-d H:i:s').'</uri1:OrderDate>';
		}
		if($this->InvoiceDate != null){
			$invoiceDate = new DateTime($this->InvoiceDate);
			$Xml.='<uri1:InvoiceDate xsi:type="xsd:date">'.$orderDate->format('Y-m-d H:i:s').'</uri1:InvoiceDate>';
		}
		if($this->OrderNote != null){
			$Xml.='<uri1:OrderNote xsi:type="xsd:string">'.$this->OrderNote.'</uri1:OrderNote>';
		}
		if($this->PurchaseOrderID != null){
			$Xml.='<uri1:PurchaseOrderID xsi:type="xsd:string">'.$this->PurchaseOrderID.'</uri1:PurchaseOrderID>';
		}
		if($this->SalesRep != null){
			$Xml.='<uri1:SalesRep xsi:type="xsd:string">'.$this->SalesRep.'</uri1:SalesRep>';
		}
		if($this->InvoiceID != null){
			$Xml.='<uri1:InvoiceID xsi:type="xsd:string">'.$this->InvoiceID.'</uri1:InvoiceID>';
		}
		if($this->TO != null){
			$Xml.='<uri1:TO xsi:type="xsd:string">'.$this->TO.'</uri1:TO>';
		}
		if($this->CC != null){
			$Xml.='<uri1:CC xsi:type="xsd:string">'.$this->CC.'</uri1:CC>';
		}
		if($this->BCC != null){
			$Xml.='<uri1:BCC xsi:type="xsd:string">'.$this->BCC.'</uri1:BCC>';
		}
		if($this->OrderLine != null){
			$Xml.='<uri1:OrderLine xsi:type="uri1:OrderLine">
						<uri1:SKU xsi:type="xsd:string">'.$this->OrderLine->SKU.'</uri1:SKU>
						<uri1:Quantity xsi:type="xsd:int">'.$this->OrderLine->Quantity.'</uri1:Quantity>
					';
			if($this->OrderLine->Price != null){
				$Xml.='<uri1:Price xsi:type="xsd:float">'.$this->OrderLine->Price.'</uri1:Price>';
			}
			if($this->OrderLine->TemporaryOrderLine != null){
				$Xml.='<uri1:TemporaryOrderLine xsi:type="xsd:boolean">'.$this->OrderLine->TemporaryOrderLine.'</uri1:TemporaryOrderLine>';
			}
			if($this->OrderLine->DownloadLimit != null){
				$Xml.='<uri1:DownloadLimit xsi:type="xsd:int">'.$this->OrderLine->DownloadLimit.'</uri1:DownloadLimit>';
			}
			if($this->OrderLine->Status != null){
				$Xml.='<uri1:Status xsi:type="xsd:string">'.$this->OrderLine->Status.'</uri1:Status>';
			}
			if($this->OrderLine->EffectiveDate != null){
				$effectiveDate = new DateTime($this->OrderLine->EffectiveDate);
				$Xml.='<uri1:EffectiveDate xsi:type="xsd:date">'.$effectiveDate->format('Y-m-d H:i:s').'</uri1:EffectiveDate>';
			}
			if($this->OrderLine->ExpirationDate != null){
				$expirationDate = new DateTime($this->OrderLine->ExpirationDate);
				$Xml.='<uri1:ExpirationDate xsi:type="xsd:date">'.$expirationDate->format('Y-m-d H:i:s').'</uri1:ExpirationDate>';
			}
			if($this->OrderLine->LineNumber != null){
				$Xml.='<uri1:LineNumber xsi:type="xsd:long">'.$this->OrderLine->LineNumber.'</uri1:LineNumber>';
			}
			if($this->OrderLine->ActivationCode != null){
				$Xml.='<uri1:ActivationCode xsi:type="xsd:string">'.$this->OrderLine->ActivationCode.'</uri1:ActivationCode>';
			}
			if($this->OrderLine->LicenseCode != null){
				$Xml.='<uri1:LicenseCode xsi:type="xsd:string">'.$this->OrderLine->LicenseCode.'</uri1:LicenseCode>';
			}
			if($this->OrderLine->AllocatedAccountId != null){
				$Xml.='<uri1:AllocatedAccountId xsi:type="xsd:string">'.$this->OrderLine->AllocatedAccountId.'</uri1:AllocatedAccountId>';
			}
			if($this->OrderLine->LicenseFileName != null){
				$Xml.='<uri1:LicenseFileName xsi:type="xsd:string">'.$this->OrderLine->LicenseFileName.'</uri1:LicenseFileName>';
			}
			if($this->OrderLine->LicenseFileCode != null){
				$Xml.='<uri1:LicenseFileCode xsi:type="xsd:string">'.$this->OrderLine->LicenseFileCode.'</uri1:LicenseFileCode>';
			}
			if($this->OrderLine->FlexLicenseModel != null){
				$Xml.='<uri1:FlexLicenseModel xsi:type="uri1:LicenseModelIdentifier">';
				if($this->OrderLine->FlexLicenseModel->Name != null){
					$Xml.='<uri1:Name xsi:type="xsd:string">'.$this->OrderLine->FlexLicenseModel->Name.'</uri1:Name>';
				}
				if($this->OrderLine->FlexLicenseModel->IntrawareLicenseModelID != null){
					$Xml.='<uri1:IntrawareLicenseModelID xsi:type="xsd:positiveInteger">'.$this->OrderLine->FlexLicenseModel->IntrawareLicenseModelID.'</uri1:IntrawareLicenseModelID>';
				}
				$Xml.='</uri1:FlexLicenseModel>';
			}
			if( isset($this->OrderLine->UserDefinedField) && $this->OrderLine->UserDefinedField != null ){
				if($this->OrderLine->UserDefinedField->touse != null && $this->OrderLine->UserDefinedField->code!=null){
					$Xml.='<uri1:UserDefinedField xsi:type="uri1:UserDefinedField" code="'.$this->OrderLine->UserDefinedField->code.'" use="'.$this->OrderLine->UserDefinedField->touse.'" >';
					if($this->OrderLine->UserDefinedField->desc != null){
						$Xml.=$this->OrderLine->UserDefinedField->desc;
					}
					$Xml.='</uri1:UserDefinedField>';
				}else{
				}
			}
			$Xml.='</uri1:OrderLine >';
		}
		if( isset($this->UserDefinedField) && $this->UserDefinedField != null ){
			if($this->UserDefinedField->touse != null && $this->UserDefinedField->code!=null){
				$Xml.='<uri1:UserDefinedField xsi:type="uri1:UserDefinedField" code="'.$this->UserDefinedField->code.'" use="'.$this->UserDefinedField->touse.'" >';
				if($this->UserDefinedField->desc != null){
					$Xml.=$this->UserDefinedField->desc;
				}
				$Xml.='</uri1:UserDefinedField>';
			}else{
			}
		}
		return $Xml;
	}
}
class OrderLine{
	var $LineNumber;
	var $TemporaryOrderLine;
	var $Price;
	var $SKU;
	var $EffectiveDate;
	var $ExpirationDate;
	var $Quantity;
	var $DownloadLimit;
	var $LicenseCode;
	var $AllocatedAccountId;
	var $LicenseFileName;
	var $LicenseFileCode;
	var $FlexLicenseModel;
	var $Status;
	var $ActivationCode;
	var $UserDefinedField;
}
class LicenseModelIdentifier{
	var $IntrawareLicenseModelID;
	var $Name;
}
