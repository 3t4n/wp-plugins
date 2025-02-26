<?php
	class Albania {

		var $provinces;

		function __construct(){
		    $this->setProvinces();
		}

		function setProvinces(){
      /* INSERT */
  		$provinces = array(
        'Alessio',
        'Argirocastro',
        'Coriza',
        'Durazzo',
        'Elbasan',
        'Fier',
        'Scutari',
        'Tirana',
        'Valona',
  		);
			$this->provinces = $provinces;
		}

		public function getProvinces(){
			return $this->provinces;
		}

	}
?>
