<?php
/**
 * This class is loaded on the back-end since its main job is 
 * to display the Admin to box.
 */

class ALGWJM_Frontend {
	
	public function __construct () {
		$algwjm_enable_setting = get_option('algwjm_enable_setting');
		if ($algwjm_enable_setting=='yes') {
			add_action( 'wp_enqueue_scripts', array($this,'ALGWJM_load_script' ));
			add_action( 'wp_footer', array($this,'ALGWJM_footer_load_script'), 21, 1 );
		}
		
		
	}

	public function ALGWJM_load_script()
	{
		$api_key = get_option( 'algwjm_map_api_key' );
		if(is_ssl()){
			$securee = 'https';
		}else{
			$securee = 'http';
		}
		$api_script = $securee.'://maps.googleapis.com/maps/api/js?key=' . esc_attr($api_key) . '&libraries=places';
		wp_enqueue_script( 'algwjm-google-places-api', $api_script, array(), 'null', true );
	}

	public function ALGWJM_footer_load_script()
	{
		?>
		<script>
				  window.onload = function initialize_gpa() {
				  			 var input1 = document.getElementById('search_location');
				  			 var input2 = document.getElementById('job_location');
				  			 var optionsc = {
				  			 				  <?php
				  			 				  $algwjm_types = get_option('algwjm_types');
	      									  $algwjm_country_code = esc_attr(get_option('algwjm_country_code'));
				  			 				  if($algwjm_types=='cities'){
				  			 				  	echo "types: ['(cities)'],";
				  			 				  }
				  			 				  if($algwjm_country_code!=''){
				  			 				  	echo "componentRestrictions: {country: '".$algwjm_country_code."'}";
				  			 				  }
				  			 				  ?>
											  
											  
											};

				  			 var autocomplete1 = new google.maps.places.Autocomplete(input1,optionsc);
				  			 var autocomplete2 = new google.maps.places.Autocomplete(input2,optionsc);
	
				  }
				</script>
		<?php
	}
	

	
	
	
}



?>