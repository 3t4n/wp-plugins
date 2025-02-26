<?php

class EStrixAllegroWebApi {
	
	private $client = null;
	private $url = "http://webapi.allegro.pl/uploader.php?wsdl";
	public $session = null;
	public $error = false;
    public $error_mess = '';
    public $error_code = '';	
	private $country = 1; // Polska
	private $sysVar = 1; // Polska
	private $apiKey = "";
	
	public function __construct($login = null,$password = null, $apiKey = null) {
		if(!empty($apiKey)){
			$this->apiKey = $apiKey;
		}
		try {
			$this->client = new SoapClient($this->url );
			$version = (array)($this->client->doQuerySysStatus($this->sysVar, $this->country, $this->apiKey));
			$session = $this->client->doLogin($login, $password, $this->country, $this->apiKey, $version['ver-key']);

			$this->session = $session['session-handle-part'];
		} catch(SoapFault $error) {
			echo 'Błąd ', $error->faultcode, ': ', $error->faultstring, "n";
		}		
	}
	
	public function get_sell_items() {
		$result = array();
		try{
			$items = $this->client->doGetMySellItems($this->session);
			for($i=0;$i<$items['sell-items-counter'];$i++){
				array_push($result, $items['sell-items-list'][$i]->{'item-id'});
			}			
		} catch(SoapFault $error) {
			$result['faultcode'] = $error->faultcode;
			$result['faultstring'] = $error->faultstring;
		}		
		return $result;	
	}
	
	public function get_sell_items_description($itemIdsIn ) {
		$result = array();
		try{			
			$itemIds = array();
			foreach ($itemIdsIn as $key => $value) {
				array_push($itemIds, (float)$value);
			}
			$items = $this->client->doGetItemsInfo($this->session,$itemIds, 1, 1, 0, 0, 0, 0, 0);
			$port_array = array();
			foreach($items['array-item-list-info'] as $item) {
				$description = $item->{'item-info'}->{'it-description'};				
				$price = number_format($item->{'item-info'}->{'it-buy-now-price'}, 2, '.', '');	
				$img1 = "";
				$img2 = "";
				
				foreach($item->{'item-images'} as $image) {
					if ($image->{'image-type'} == "1") {
						$img1 = $image->{'image-url'};
					}
					if ($image->{'image-type'} == "2") {
						$img2 = $image->{'image-url'};
					}
				}				
				$arrTmp = array(
					"item_id" => $item->{'item-info'}->{'it-id'},
					"item_price" => $price,
					"item_image_1" => $img1,
					"item_image_2" => $img2,
					"item_title" => $item->{'item-info'}->{'it-name'},
					"item_description" => wp_strip_all_tags( $description ),
					);
					
				$result__ = array_merge($port_array, $arrTmp);					
				array_push($result, $result__);	
			}
			
		} catch(SoapFault $error) {
			$result['faultcode'] = $error->faultcode;
			$result['faultstring'] = $error->faultstring;
		}		
		return $result;		
	}	
}

?>