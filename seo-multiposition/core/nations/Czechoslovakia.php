<?php
	class Czechoslovakia {

		var $provinces;

		function __construct(){
		    $this->setProvinces();
		}

		function setProvinces(){
      /* INSERT */
  		$provinces = array(
        'Brno',
        'Česká Lípa',
        'České Budějovice',
        'Chomutov',
        'Děčín',
        'Havířov',
        'Frýdek-Místek',
        'Jablonec nad Nisou',
        'Jihlava',
        'Karlovy Vary',
        'Karviná',
        'Kladno',
        'Liberec',
        'Mladá Boleslav',
        'Most',
        'Olomouc',
        'Opava',
        'Ostrava',
        'Pardubice',
        'Plzeň',
        'Praga',
        'Přerov',
        'Prostějov',
        'Tábor',
        'Teplice',
        'Třebíč',
        'Třinec',
        'Ústí nad Labem',
        'Hradec Králové',
        'Zlín'
  		);
			$this->provinces = $provinces;
		}

		public function getProvinces(){
			return $this->provinces;
		}

	}
?>
