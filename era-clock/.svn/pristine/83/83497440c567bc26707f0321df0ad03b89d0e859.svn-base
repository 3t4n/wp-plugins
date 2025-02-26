<?php 
	/**
		 * Plugin Name: ERA Clock
		 * Plugin URI: http://plugins.era-solutions.com/#clock
		 * Description: Display Clock using an easy short code
		 * Version: 1.0
		 * Author: ERA Solutions
		 * Author URI: http://plugins.era-solutions.com
	 */
	
	
	function era_short_code($choices) {
		
		$clock = '<div class="era-digital-clock">00:00:00</div>
	<script>
	jQuery(document).ready(function() {
	  eraClockUpdate();
	  setInterval(eraClockUpdate, 1000);
	})

	function eraClockUpdate() {
	  var date = new Date();
	  jQuery(".era-digital-clock").css({"color": "'.$choices["textcolor"].'"});
	  function eraAddZero(x) {
	    if (x < 10) {
	      return x = "0" + x;
	    } else {
	      return x;
	    }
	  }

	  function eraTwelveHour(x) {
	    if (x > 12) {
	      return x = x - 12;
	    } else if (x == 0) {
	      return x = 12;
	    } else {
	      return x;
	    }
	  }

	  var h = eraAddZero(eraTwelveHour(date.getHours()));
	  var m = eraAddZero(date.getMinutes());
	  var s = eraAddZero(date.getSeconds());

	  jQuery(".era-digital-clock").text(h + ":" + m + ":" + s)
	}
	</script>

	<style>
	.era-digital-clock {
	  background: '.$choices["backcolor"].';
	  padding: 15px;
	  width: 100%;
	  margin-bottom:40px;
	  height: auto ;
      margin-bottom: 0; 
	  top: 0;
	  left: 0;
	  bottom: 0;
	  right: 0;
	  color: '.$choices["textcolor"].';
	  border: 2px solid '.$choices["bordercolor"].';
	  border-radius: 4px;
	  text-align: center;
	  font: '.$choices["fontsize"].' "DIGITAL", Helvetica;
	}
	</style>';
	  	return $clock;
			
	}



	
	add_shortcode( 'era_clock', 'era_short_code' );
	
 ?>