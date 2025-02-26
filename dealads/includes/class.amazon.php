<?php

class wpdaAmazon {

	private $regions = array(
		'us' => array(
			'base' => 'http://www.amazon.com/gp/product/',
			'url' => 'http://z-na.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetResults&InstanceId=0&MarketPlace=US&TemplateId=8009&display_URL=',
			'more' => 'http://www.amazon.com/gp/goldbox',
		),
		'uk' => array(
			'base' => 'http://www.amazon.co.uk/gp/product/',
			'url' => 'http://ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetResults&InstanceId=0&MarketPlace=GB&TemplateId=8009&display_URL=',
			'more' => 'http://www.amazon.co.uk/gp/deals',
		),
		'de' => array(
			'base' => 'http://www.amazon.de/gp/product/',
			'url' => 'http://ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetResults&InstanceId=0&MarketPlace=DE&TemplateId=8009&display_URL=',
			'more' => 'http://www.amazon.de/gp/angebote',
		),
		'at' => array(
			'base' => 'http://www.amazon.de/gp/product/',
			'url' => 'http://ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetResults&InstanceId=0&MarketPlace=DE&TemplateId=8009&display_URL=',
			'more' => 'http://www.amazon.de/gp/angebote',
		),
		'ch' => array(
			'base' => 'http://www.amazon.de/gp/product/',
			'url' => 'http://ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetResults&InstanceId=0&MarketPlace=DE&TemplateId=8009&display_URL=',
			'more' => 'http://www.amazon.de/gp/angebote',
		),
	);

	private $count = 18;

	private $url;
	private $base;
	private $more;

	private $region;
	private $tag;

	private $data;

	public function __construct($region, $tag = '') {
		$this->tag = $tag;

		if(isset($this->regions[$region])) {
			$this->url = $this->regions[$region]['url'];
			$this->base = $this->regions[$region]['base'];
			$this->more = $this->regions[$region]['more'];
		} else {
			throw new Exception('Unknown region', 0);
		}
		$this->region = $region;
	}

	public function __destruct() {

	}

	public function __toString() {
		echo 'DealAds Amazon API';
	}

	public function update() {
		$data = $this->get();
		$data = $this->clean($data);
		$data = $this->sort($data);
		$this->data = $this->parse($data);
		$this->serialize();
	}

	private function serialize() {
		if($ser = serialize($this->data)) {
			update_option('wpda_data', $ser);
			return true;
		} else {
			throw new Exception('Error while serializing', 5);
		}
	}

	private function unserialize() {
		if($data = unserialize(get_option('wpda_data'))) {
			$this->data = $data;
			return true;
		} else {
			throw new Exception('Error while unserializing', 6);
		}
	}

	public function rollout() {
		$this->unserialize();
		for($i = 0; $i < count($this->data); $i++) {
			$this->data[$i]['url'] = $this->link($this->data[$i]['asin']);
		}
		return $this->data;
	}

	public function click($asin, $ip = '', $referer = '') {
		return '['.date('Y-m-d H:i:s').'] click -> asin: '.$asin.', region: '.$this->region.', tag: '.$this->tag.', ip: '.$ip.', referer: '.$referer."\n";
	}

	public function link($asin) {
		return $this->base.$asin.'/?tag='.$this->tag;
	}

	public function more() {
		return $this->more.'/?tag='.$this->tag;
	}

	private function get() {
		if($json = file_get_contents($this->url)) {
			if($data = wpda_json_decode($json, true)) {
				return array_merge($data['results']['LD'], $data['results']['DOTD']);
			} else {
				throw new Exception('Could not decode data', 2);
			}
		} else {
			throw new Exception('Could not retrieve data', 1);
		}
	}

	private function clean($data) {
		$res = array();
		foreach($data as $v) {
			if(count($v) > 2) {
				$v['Asin'] = trim(@$v['Asin']);
				$v['Title'] = trim(@$v['Title']);
				$v['Description'] = trim(@$v['Description']);
				$v['Image'] = trim(@$v['Image']);
				$v['Price'] = trim(@$v['Price']);
				if(empty($v['Title'])) {
					if(!empty($v['Description'])) {
						$v['Title'] = $v['Description'];
					}
				}
				if(is_array($v) && !empty($v['Asin']) && !(empty($v['Title']) && empty($v['Image'])) && !empty($v['Price'])) {
					array_push($res, $v);
				}
			}
		}
		if(count($res) < 3) {
			throw new Exception('Less than 3 items after cleaning', 3);
		}
		return $res;
	}

	private function sort($data) {
		usort($data, function($a, $b) {
			$a_title = $a['Title'];
			$b_title = $b['Title'];
			$a_activation = isset($a['MsToActivation'])?intval(round(intval($a['MsToActivation']) / 1000 / 60)):180;
			$b_activation = isset($b['MsToActivation'])?intval(round(intval($b['MsToActivation']) / 1000 / 60)):180;
			$a_expiration = isset($a['MsToExpiration'])?intval(round(intval($a['MsToExpiration']) / 1000 / 60)):0;
			$b_expiration = isset($b['MsToExpiration'])?intval(round(intval($b['MsToExpiration']) / 1000 / 60)):0;
			$a_percentage = isset($a['PercentageSold'])?intval($a['PercentageSold']):0;
			$b_percentage = isset($b['PercentageSold'])?intval($b['PercentageSold']):0;
			$a_available = (isset($a['IsAvailable']) && $a['IsAvailable'] == 'true')?true:false;
			$b_available = (isset($b['IsAvailable']) && $b['IsAvailable'] == 'true')?true:false;
			$a_price = floatval($a['Price']);
			$b_price = floatval($b['Price']);

			$a_listprice = (isset($a['ListPrice']))?floatval($a['ListPrice']):0.0;
			$a_prepromo = (isset($a['PrePromoPrice']))?floatval($a['PrePromoPrice']):0.0;
			$a_compare = ($a_listprice > $a_prepromo)?$a_listprice:$a_prepromo;
			if($a_compare > 0) {
				$a_save = intval(round(100 / $a_compare / ($a_compare - $a_price)));
			} else {
				$a_save = 0;
			}
			$b_listprice = (isset($b['ListPrice']))?floatval($b['ListPrice']):0.0;
			$b_prepromo = (isset($b['PrePromoPrice']))?floatval($b['PrePromoPrice']):0.0;
			$b_compare = ($b_listprice > $b_prepromo)?$b_listprice:$b_prepromo;
			if($b_compare > 0) {
				$b_save = intval(round(100 / $b_compare / ($b_compare - $b_price)));
			} else {
				$b_save = 0;
			}

			$a_score = 0;
			$b_score = 0;
			if(!empty($a_title)) $a_score += 5;
			if(!empty($b_title)) $b_score += 5;
			if($a_activation < 10) $a_score += 5;
			if($b_activation < 10) $b_score += 5;
			if($a_expiration > 10) $a_score += 5;
			if($b_expiration > 10) $b_score += 5;
			if($a_percentage < 95) $a_score += round($a_percentage / 2);
			if($b_percentage < 95) $b_score += round($b_percentage / 2);
			if($a_available) $a_score += 10;
			if($b_available) $b_score += 10;
			$a_score += round($a_save / 2);
			$b_score += round($b_save / 2);

			return intval($b_score - $a_score);
		});
		return $data;
	}

	private function parse($data) {
		$res = array();
		$i = 0;
		foreach($data as $v) {
			$url = $v['Image'];
			if($file = $url) {
				$item = array(
					'asin' => $v['Asin'],
					'title' => trim($v['Title']),
					'price' => floatval($v['Price']),
					'image' => $file,
				);

				if(isset($v['PercentageSold'])) {
					$item['sold'] = intval($v['PercentageSold']);
				}

				$now = time();
				$activation = isset($v['MsToActivation'])?intval($v['MsToActivation']):0;
				if($activation > 0) {
					$item['activation'] = intval($now + ($activation / 1000));
				} else {
					$item['activation'] = 0;
				}
				if(isset($v['MsToExpiration'])) {
					$expiration = intval($v['MsToExpiration']);
					$expiration = intval($now + ($expiration / 1000));
				} elseif(isset($v['ExpirationDate'])) {
					$expiration = intval($v['ExpirationDate']);
				} else {
					$expiration = 0;
				}
				$item['expiration'] = $expiration;

				$listprice = (isset($v['ListPrice']))?floatval($v['ListPrice']):0.0;
				$prepromo = (isset($v['PrePromoPrice']))?floatval($v['PrePromoPrice']):0.0;
				$compare = ($listprice > $prepromo)?$listprice:$prepromo;
				if($compare > 0) {
					$item['preprice'] = $compare;
					$save = $compare - $item['price'];
				} else {
					$save = 0.0;
				}

				if($save > 0) {
					$discount = intval(round(100 / ($item['preprice'] / $save)));
					$item['save'] = $save;
					$item['discount'] = $discount;
				} else {
					$item['save'] = 0.0;
					$item['discount'] = 0;
				}

				array_push($res, $item);
				$i++;
				if($i >= $this->count) {
					break;
				}
			}
		}
		if(count($res) < 3) {
			throw new Exception('Less than 3 items after parsing', 4);
		}
		return $res;
	}

}

?>
