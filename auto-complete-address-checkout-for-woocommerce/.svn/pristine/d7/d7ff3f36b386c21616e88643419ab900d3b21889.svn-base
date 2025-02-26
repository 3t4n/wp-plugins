<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class GMACAW_Cron {
	
	public function __construct () {

		add_action( 'init', array( $this, 'GMACAW_default' ) );
		
	}

	public function GMACAW_default(){
		global $gmacaw_translation,$gmacaw_arr;
		
		$defalarr = array(
		);
		foreach ($defalarr as $keya => $valuea) {
			if (get_option( $keya )=='') {
			    if(in_array($keya, array())){
			        update_option( $keya, $valuea );
			    }else{
			        update_option( $keya, sanitize_text_field($valuea) );
			    }
				
			}
			
		}
		foreach ($defalarr as $keya => $valuea) {

			$gmacaw_arr[$keya]=get_option( $keya );
		}
		$gmacaw_translation_arr = array(
			
		);
		foreach ($gmacaw_translation_arr as $keya => $valuea) {
			$gmacaw_translation[$valuea]['label'] = $defalarr[$valuea];
			if (get_option( $valuea )=='') {
			    $gmacaw_translation[$valuea]['val']=$defalarr[$valuea];
			}else{
				$gmacaw_translation[$valuea]['val']=get_option($valuea);
			}
			
		}


		
	}
}

?>