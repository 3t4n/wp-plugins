<?php
	class Austria {

		var $provinces;

		function __construct(){
		    $this->setProvinces();
		}

		function setProvinces(){
      /* INSERT */
  		$provinces = array(
        'Baden',
        'Bregenz',
        'Dornbirn',
        'Feldkirch',
        'Graz',
        'Innsbruck',
        'Klagenfurt',
        'Klosterneuburg',
        'Krems',
        'Leoben',
        'Linz',
        'Salisburgo',
        'St. Polten',
        'Steyr',
        'Vienna',
        'Villach',
        'Wels',
        'Wiener Neustadt',
        'Wolfsberg'
  		);
			$this->provinces = $provinces;
		}

		public function getProvinces(){
			return $this->provinces;
		}

	}
?>
