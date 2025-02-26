<?php
class GSWPGMAP_Map {
	
	private $styles;
	private $version = '1.0';
	private $initMapFunctionName = 'initMap';
	private $options;
	
	public function __construct($options) {
		
		$this->styles  = require_once dirname ( __FILE__ ) . '/gswpgmap_styles.php';
		$this->options = $this->checkOptions ( $options );
	}
	
	private function checkOptions($options) {
		
		$required = array (
				'key' => 'Your Google Map API Key',
				'container-id' => 'Map container ID',
				'coord' => array (
						'lat' => 'Latitude',
						'lng' => 'Longitude'
				),
				'zoom' => 'Map zoom',
				'style' => 'Style you chose for your map'
		);
		foreach ( $required as $r => $m ) {

			if (! isset ( $options [$r] )) {
				throw new Exception ( $m . ' is required' );
				return false;
			}
		}
		return $options;
	}
	public function getGoogleMapURL() {
		return 'https://maps.googleapis.com/maps/api/js?key=' . $this->options ['key'] . '&callback=' . $this->initMapFunctionName;
	}
	public function getGoogleMapLinkTag() {
		return '<script src="' . $this->getGoogleMapURL () . '" async defer></script>';
	}
	public function getJS() {
		global $styles;

		$map = '
		if(document.getElementById("'.$this->options ['container-id'].'") == null) return;
		var map = new google.maps.Map(document.getElementById("' . $this->options ['container-id'] . '"), {
          center: {lat: ' . floatval ( $this->options ['coord'] ['lat'] ) . ', lng: ' . floatval ( $this->options ['coord'] ['lng'] ) . '},
		  zoom: ' . intval ( $this->options ['zoom'] ) . ',
		  styles: ' . str_replace ( array (
				"\r",
				"\n",
				' ',
				'	'
		), '', $this->styles [$this->options ['style']] ) . '
		});' . "\n\n";

		if (isset ( $this->options ['info-window-html'] )) {

			$map .= 'new google.maps.InfoWindow({
				content: \'' . str_replace ( array (
					"\r",
					"\n"
			), '', $this->options ['info-window-html'] ) . '\'
			}).open(map, new google.maps.Marker({
				animation: google.maps.Animation.DROP,
				position: new google.maps.LatLng(' . floatval ( $this->options ['coord'] ['lat'] ) . ',' . floatval ( $this->options ['coord'] ['lng'] ) . '),
				map: map
			}));';
		}

		return "\n" . 'function ' . $this->initMapFunctionName . '() {' . "\n" . $map . "\n" . '}';
	}
	
}
