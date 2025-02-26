<?php
	class England {

		var $provinces;

		function __construct(){
		    $this->setProvinces();
		}

		function setProvinces(){
      /* INSERT */
  		$provinces = array(
        'Birmingham',
        'Bristol',
        'Cambridge',
        'Coventry',
        'Dublino',
        'Glasgow',
        'Lancaster',
        'Leeds',
        'Liverpool',
        'Londra',
        'Manchester',
        'Newcastle',
        'Nottingham',
        'Oxford',
        'Sheffield',
        'Windsor'
  		);
			$this->provinces = $provinces;
		}

		public function getProvinces(){
			return $this->provinces;
		}

	}
?>
