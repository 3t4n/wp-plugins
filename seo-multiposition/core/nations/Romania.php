<?php
	class Romania {

		var $provinces;

		function __construct(){
		    $this->setProvinces();
		}

		function setProvinces(){
      /* INSERT */
  		$provinces = array(
        'Arad',
        'Bacău',
        'Brăila',
        'Brașov',
        'Bucarest',
        'Cluj Napoca',
        'Costanza',
        'Craiova',
        'Galați',
        'Iași',
        'Oradea',
        'Pitești',
        'Ploiești',
        'Sibiu',
        'Timișoara',
  		);
			$this->provinces = $provinces;
		}

		public function getProvinces(){
			return $this->provinces;
		}

	}
?>
