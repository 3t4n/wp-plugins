<?php
	class Sweden {

		var $provinces;

		function __construct(){
		    $this->setProvinces();
		}

		function setProvinces(){
      /* INSERT */
  		$provinces = array(
        'Borås',
        'Eskilstuna',
        'Gävle',
        'Göteborg',
        'Helsingborg',
        'Jönköping',
        'Linköping',
        'Lund',
        'Malmö',
        'Norrköping',
        'Örebro',
        'Stoccolma',
        'Sundsvall',
        'Umeå',
        'Uppsala',
        'Västerås'
  		);
			$this->provinces = $provinces;
		}

		public function getProvinces(){
			return $this->provinces;
		}

	}
?>
