<?php
function kwm_info_basic_install_hook() {
  if ( version_compare( PHP_VERSION, '5.2.1', '<' )
    or version_compare( get_bloginfo( 'version' ), '3.3', '<' ) ) {
      deactivate_plugins( basename( __FILE__ ) );
  }
 
 $optionForARRAY = Array
						(
						    'allPhones' => Array
						        (
						            'telephone' => Array
						                (
						                    '0' => '',
						                    '1' => '',
						                    '2' => ''
						                ),

						            'mobile-phone' => Array
						                (
						                    '0' => '',
						                    '1' => '',
						                    '2' => '',
						                )

						        ),

						    'address' => Array
						        (
						            'address' => Array
						                (
						                    'address' => '',
						                    'number' => '',
						                    'neighborhood' => '',
						                    'complement' => '',
						                    'zipcode' => '',
						                    'state' => '',
						                    'contry' => ''
						                )

						        ),

						    'socialNetwork' => Array
						        (
						            'facebook' => '',
						            'youtube' => '',
						            'twitter' => '',
						            'googlePlus' => '',
						            'linkedIn' => '',
						            'instagram' => '',
						            'flickr' => '',
						            'mySpace' => '',
						            'askfm' => ''
						        )

	);
  add_option( 'kwm_info_basic', $optionForARRAY );
 
}
?>