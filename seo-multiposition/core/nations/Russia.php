<?php
	class Russia {

		var $provinces;

		function __construct(){
		    $this->setProvinces();
		}

		function setProvinces(){
      /* INSERT */
  		$provinces = array(
        'Baschiria',
        'Čeljabinsk',
        'Ekaterinburg',
        'Iževsk',
        'Kazan\'',
        'Krasnodar',
        'Krasnojarsk',
        'Mosca',
        'Nižnij Novgorod',
        'Novosibirsk',
        'Omsk',
        'Perm\'',
        'Rostov sul Don',
        'Samara',
        'Saratov',
        'San Pietroburgo',
        'Togliatti',
        'Ufa',
        'Uljanovsk',
        'Volgograd',
        'Voronež'
  		);
			$this->provinces = $provinces;
		}

		public function getProvinces(){
			return $this->provinces;
		}

	}
?>
