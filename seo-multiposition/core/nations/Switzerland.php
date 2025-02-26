<?php
	class Switzerland {

		var $provinces;

		function __construct(){
		    $this->setProvinces();
		}

		function setProvinces(){
      /* INSERT */
  		$provinces = array(
				'Baden',
				'Basilea',
				'Berna',
				'Bienne',
				'Coira',
				'Losanna',
				'Lucerna',
				'Lugano',
				'Ginevra',
				'St.Gallen',
				'Thun',
				'Winterthur',
				'Zurigo'
  		);
			$this->provinces = $provinces;
		}

		public function getProvinces(){
			return $this->provinces;
		}

	}
?>
