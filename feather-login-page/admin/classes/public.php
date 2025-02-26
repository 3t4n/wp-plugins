<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Feather_POLPB_PublicClass {

	function __construct(){

		$this->_init();
		$this->_hooks();
		$this->_filters();

	}

	function _init(){
		
	}

	function _hooks(){


		add_action( 'login_enqueue_scripts', array($this,'feather_login_load_scripts') );

		add_action( 'login_head', array($this,'feather_login_page_change_defaults') );

		add_action( 'login_head', array($this,'login_load_inlineStyles'), 99999999 );

		//add_filter( 'login_errors', array($this,'feather_login_page_login_errors') );


	}

	function _filters(){
		
		add_action('login_form','add_captcha_to_login'); // Login Form Hook
		function add_captcha_to_login(){

			$recaptchaOptions = get_option('plbp_login_builder_recaptcha_data', false);
			if ($recaptchaOptions != false) {

		  		$recaptchaEnabled = sanitize_text_field($recaptchaOptions['enable']);
			  	$recaptchaSiteKey = esc_attr($recaptchaOptions['siteKey']);
			  	$recaptchaTheme = esc_attr($recaptchaOptions['theme']);

			  	if ($recaptchaTheme == '') {
			  		$recaptchaTheme = 'light';
			  	}

			  	if ($recaptchaEnabled == 'true') {

			  		echo "
						<script src='https://www.google.com/recaptcha/api.js' async defer></script>
						<div class='g-recaptcha' data-sitekey='".$recaptchaSiteKey."' data-theme='".$recaptchaTheme."'></div>
				      	<br/>
					";

			  	}

			 }
			
		}
		add_action('wp_authenticate_user', 'captcha_login_check', 10, 2); // Check Login Hook
		function captcha_login_check(WP_User $user ){
		  
		  	$recaptchaOptions = get_option('plbp_login_builder_recaptcha_data', false);

		  	if ($recaptchaOptions != false) {

		  		$recaptchaEnabled = sanitize_text_field($recaptchaOptions['enable']);
			  	$recaptchaSiteSecret = esc_attr($recaptchaOptions['siteSecret']);

			  	if ($recaptchaEnabled == 'true') {
			  			
			  		$output = wp_remote_post( 'https://www.google.com/recaptcha/api/siteverify?secret='.$recaptchaSiteSecret.'&response='.$_POST['g-recaptcha-response'] );

					if (!is_array($output)) {
						$output = array();
						$output['body'] = '';
					}
					
					$responseData = json_decode($output['body'],true);

					if($responseData['success']){
			        	
					}else{

						if (isset($responseData['error-codes'])) {
							$invalidSecret = in_array('invalid-input-secret',$responseData['error-codes']);

							if ($invalidSecret) {
								return new WP_Error( 'pluginops_invalid_captcha', 'Invalid site secret for Recaptcha.' );
							}
						}

						return new WP_Error( 'pluginops_invalid_captcha', 'The captcha you entered is incorrect.' );
					}

			  	}
					

		  	}
			  	

			return $user;


		}

	}


	function feather_login_page_login_errors(){
		global $errors;

		$errorCodes = $errors->get_error_codes();

		if (!isset($errors['feather_login_ivalid_captcha'])) {
			$errors['feather_login_ivalid_captcha'] = 'The captcha you entered is incorrect.';
		}

		return $error;
	}

	function feather_polpb_strip($string, $allowed_tags = NULL){

		if (is_array($string)){

			foreach ($string as $k => $v){
				$string[$k] = $this->feather_polpb_strip($v, $allowed_tags);
			}
			return $string;

		}

		$allowed_tagskses = array(
			'a' => array(
				'href' => array(),
				'title' => array()
			),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
		);

		return wp_kses($string, $allowed_tagskses );
					    
	}


	function feather_login_page_change_defaults(){

		add_filter('gettext', array($this,'change_login_page_labels_text'), 99 , 3 );

	}


	function change_login_page_labels_text($labels){

			$data = $this->feather_polpb_strip( get_option( 'plbp__login_builder_options_data', false ) );

			if ($data == false) {
				return $labels;
			}

			$loginPageTexts = $data['formTexts'];

			foreach($loginPageTexts as $key => $value){
				if(is_array($value)){

					foreach($value as $key2 => $value2){
						if(is_array($value2)){
							
						}else{
							$loginPageTexts[$key][$key2] = esc_attr($value2);
						}
					}
					
				}else{
					if(isset($value2)){
						$loginPageTexts[$key] = esc_attr($value2);
					}
					
				}
			}



			if ($loginPageTexts['lostPass'] != '') {
				$labels = str_ireplace( 'Lost your password?', $loginPageTexts['lostPass'] ,  $labels );
			}


			if ($loginPageTexts['unLabel'] != '') {
				$labels = str_ireplace( 'Username or Email Address', $loginPageTexts['unLabel'] ,  $labels );
			}


			if ($loginPageTexts['passLabel'] != '') {
				$labels = str_ireplace( 'Password', $loginPageTexts['passLabel'] ,  $labels );
			}


			if ($loginPageTexts['rembLabel'] != '') {
				$labels = str_ireplace( 'Remember Me', $loginPageTexts['rembLabel'] ,  $labels );
			}


			if ($loginPageTexts['btnText'] != '') {
				$labels = str_ireplace( 'Log In', $loginPageTexts['btnText'] ,  $labels );
			}


			if ($loginPageTexts['backtoblog'] != '') {
				$labels = str_ireplace( '← Back to', $loginPageTexts['backtoblog'] ,  $labels );
			}


    		return $labels;

	}



	function feather_login_load_scripts() {

	    wp_enqueue_script( 'polbp_render_script', FPOLPB_PLUGIN_URL.'/admin/scripts/render.js', array( 'jquery' ), false, true );


	    wp_register_script( 'polbp_render_trigger_script', FPOLPB_PLUGIN_URL.'/admin/scripts/public-render-trigger.js', array( 'jquery' ), false, true );


		$data = $this->feather_polpb_strip( get_option( 'plbp__login_builder_options_data', false ) );

		$dataMobile = $this->feather_polpb_strip( get_option( 'plbp__login_builder_options_data_mobile', false ) );


	    $saved_polpb_data_json = json_encode( $data );
	    $saved_polpb_dataMobile_json = json_encode( $dataMobile );

	    wp_localize_script( 'polbp_render_trigger_script', 'saved_polpb_data',  array( 'data' =>  $saved_polpb_data_json, 'dataMobile' =>  $saved_polpb_dataMobile_json ) );

	    wp_enqueue_script( 'polbp_render_trigger_script' );

	    if (is_array($data)) {
	    	wp_enqueue_style( 'polpb_front_gFont-labels', 'https://fonts.googleapis.com/css?family='.$data['formLabels']['fontFamily'].':300italic,400italic,700italic,400,700,300', false ); 

		    wp_enqueue_style( 'polpb_front_gFont-input', 'https://fonts.googleapis.com/css?family='.$data['formInput']['fontFamily'].':300italic,400italic,700italic,400,700,300', false ); 

		    wp_enqueue_style( 'polpb_front_gFont-button', 'https://fonts.googleapis.com/css?family='.$data['formButton']['fontFamily'].':300italic,400italic,700italic,400,700,300', false ); 

		    wp_enqueue_style( 'polpb_front_gFont-links', 'https://fonts.googleapis.com/css?family='.$data['footerLinks']['fontFamily'].':300italic,400italic,700italic,400,700,300', false ); 
	    }
	    
		    


	}



	function login_load_inlineStyles(){

		$data = get_option( 'plbp__login_builder_options_data', false );

		if ($data == false) {
			return;
		}
		
		foreach ($data as $key1 => $value1) {
			
			
			if (is_array($value1)) {

				foreach ($value1 as $key2 => $value2) {

					if (is_array($value2)) {

						foreach($value2 as $key3 => $value3){
							$data[$key1][$key2][$key3] = esc_attr($data[$key1][$key2][$key3]);
						}

					}else{

						if ($value2 == '' || $value2 == ' ') {
							unset($data[$key1][$key2]);
						}else{
							$data[$key1][$key2] = esc_attr($data[$key1][$key2]);
						}

					}

				}
				
			}else{

				$data[$key1] = esc_attr($data[$key1]);

			}

		}
		

		$logo = $data['logo'];
		$bgOps = $data['bgOps'];
		$fbgOps = $data['formContBgOps'];
		$formContOps = $data['formContOps'];
		$formLabels = $data['formLabels'];
		$formInput = $data['formInput'];
		$formButton = $data['formButton'];
		$formSubmitBg = $data['formButtonBg'];
		$footerLinks = $data['footerLinks'];
		$customScripts = $data['scripts'];

		echo "<style type='text/css' media='screen'>";

			// logo image
			echo " .login h1 { ";
				
				if (isset($logo['hideLogo'])) {
					echo "display: ".$logo['hideLogo'].";";
				}

				if (isset($logo['logoAlignment'])) {
					echo "text-align: ".$logo['logoAlignment'].";";
				}
				

			echo " } \n \n  ";


			// logo link
			echo " .login h1 a { ";

				if ($logo['logoImage'] != '' && $logo['logoImage'] != ' ') {
					echo "background-image: url(".$logo['logoImage'].") !important; ";
				}

				if (isset($logo['logoImageWidth'])) {
					echo "background-size: ".$logo['logoImageWidth']."px !important;";
				}

				if (isset($logo['logoImageHeight'])) {
					echo "height: ".$logo['logoImageHeight']."px !important;";
				}

				echo "width:100% !important;";

			echo " } \n \n  ";


			// body bg
			echo ".login { ";

				if ($bgOps['bgType'] == 'solid') {
					
					if ($bgOps['bgColor'] != '') {

						echo "
							background: ".$bgOps['bgColor'].";
						";

					}

				}


				if ($bgOps['bgType'] == 'image') {

					if ($bgOps['bgImage'] != '') {

						echo "
							background-image: url(".$bgOps['bgImage'].");
							background-color:transparent;
						";

					}

					if ($bgOps['bgImgOps']['pos'] != '') {
						
						if ($bgOps['bgImgOps']['pos'] == 'custom') {
							
							echo "
								background-position-x:".$bgOps['bgImgOps']['xPos'].$bgOps['bgImgOps']['xPosU'].";
								background-position-x:".$bgOps['bgImgOps']['yPos'].$bgOps['bgImgOps']['yPosU'].";
							";

						}else{
							echo "
								background-position: ".$bgOps['bgImgOps']['pos'].";
							";
						}

					}

					if ($bgOps['bgImgOps']['rep'] != '') {

						echo "
							background-repeat: ".$bgOps['bgImgOps']['rep'].";
						";

					}

					if ($bgOps['bgImgOps']['size'] != '') {

						if ($bgOps['bgImgOps']['size'] == 'custom') {

							echo "
								background-size: ".$bgOps['bgImgOps']['cWid'].$bgOps['bgImgOps']['widU'].";
							";

						}else{

							echo "
								background-size: ".$bgOps['bgImgOps']['size'].";
							";

						}
						

					}

				}


				if ($bgOps['bgType'] == 'gradient') {

					if ($bgOps['bgGradient']['bgGrType'] == 'linear') {

						echo "
							background: linear-gradient( ".
								
								$bgOps['bgGradient']['bgGrAngle']."deg,".
								$bgOps['bgGradient']['bgGr1Color']." ".$bgOps['bgGradient']['bgGr1Loc']."%,".
								$bgOps['bgGradient']['bgGr2Color']." ".$bgOps['bgGradient']['bgGr2Loc']."%".

							" ) ;
						";

					}


					if ($bgOps['bgGradient']['bgGrType'] == 'radial') {

						echo "
							background: radial-gradient( at".
								
								$bgOps['bgGradient']['bgGrPos'].",".
								$bgOps['bgGradient']['bgGr1Color']." ".$bgOps['bgGradient']['bgGr1Loc']."%,".
								$bgOps['bgGradient']['bgGr2Color']." ".$bgOps['bgGradient']['bgGr2Loc']."%".

							" ) ;
						";

					}

				}


			echo "}  \n \n ";


			// form container bg
			echo "#login { ";

				if ($fbgOps['fbgType'] == 'solid') {
					
					if (isset($fbgOps['fbgColor'])) {

						echo "
							background: ".$fbgOps['fbgColor'].";
						";

					}

				}


				if ($fbgOps['fbgType'] == 'image') {

					if (isset($fbgOps['fbgImage'])) {

						echo "
							background-image: url(".$fbgOps['fbgImage'].");
							background-color:transparent;
						";

					}

					if ($fbgOps['fbgImgOps']['fpos'] != '') {
						
						if ($fbgOps['fbgImgOps']['fpos'] == 'custom') {
							
							echo "
								background-position-x:".$fbgOps['fbgImgOps']['fxPos'].$fbgOps['fbgImgOps']['fxPosU'].";
								background-position-x:".$fbgOps['fbgImgOps']['fyPos'].$fbgOps['fbgImgOps']['fyPosU'].";
							";

						}else{
							echo "
								background-position: ".$fbgOps['fbgImgOps']['fpos'].";
							";
						}

					}

					if ($fbgOps['fbgImgOps']['frep'] != '') {

						echo "
							background-repeat: ".$fbgOps['fbgImgOps']['frep'].";
						";

					}

					if ($fbgOps['fbgImgOps']['fsize'] != '') {

						if ($fbgOps['fbgImgOps']['fsize'] == 'custom') {

							echo "
								background-size: ".$fbgOps['fbgImgOps']['fcWid'].$fbgOps['fbgImgOps']['fwidU'].";
							";

						}else{

							echo "
								background-size: ".$fbgOps['fbgImgOps']['fsize'].";
							";

						}
						

					}

				}


				if ($fbgOps['fbgType'] == 'gradient') {

					if ($fbgOps['fbgGradient']['fbgGrType'] == 'linear') {

						echo "
							background: linear-gradient( ".
								
								$fbgOps['fbgGradient']['fbgGrAngle']."deg,".
								$fbgOps['fbgGradient']['fbgGr1Color']." ".$fbgOps['fbgGradient']['fbgGr1Loc']."%,".
								$fbgOps['fbgGradient']['fbgGr2Color']." ".$fbgOps['fbgGradient']['fbgGr2Loc']."%".

							" ) ;
						";

					}


					if ($fbgOps['fbgGradient']['fbgGrType'] == 'radial') {

						echo "
							background: radial-gradient( at".
								
								$fbgOps['fbgGradient']['fbgGrPos'].",".
								$fbgOps['fbgGradient']['fbgGr1Color']." ".$fbgOps['fbgGradient']['fbgGr1Loc']."%,".
								$fbgOps['fbgGradient']['fbgGr2Color']." ".$fbgOps['fbgGradient']['fbgGr2Loc']."%".

							" ) ;
						";

					}

				}


			echo "} \n \n  ";


			// form container
			echo "#login { ";

				if (isset($formContOps['fwidth'])) {
						
					echo "
						width: ".$formContOps['fwidth']."px;
					";

				}


				if (isset($formContOps['fheight'])) {
						
					echo "
						height: ".$formContOps['fheight']."px;
					";

				}


				if ($formContOps['border']['color'] != '') {
						
					echo "
						border-color: ".$formContOps['border']['color'].";
					";

				}

				if ($formContOps['border']['style'] != '') {
						
					echo "
						border-style: ".$formContOps['border']['style'].";
					";

				}

				if ($formContOps['border']['top'] != '') {
						
					echo "
						border-top-width: ".$formContOps['border']['top']."px;
					";

				}

				if ($formContOps['border']['right'] != '') {
						
					echo "
						border-right-width: ".$formContOps['border']['right']."px;
					";

				}

				if ($formContOps['border']['bottom'] != '') {
						
					echo "
						border-bottom-width: ".$formContOps['border']['bottom']."px;
					";

				}

				if ($formContOps['border']['left'] != '') {
						
					echo "
						border-left-width: ".$formContOps['border']['left']."px;
					";

				}



				if ($formContOps['borderRadius']['tleft'] != '') {
						
					echo "
						border-top-left-radius: ".$formContOps['borderRadius']['tleft']."px;
					";

				}

				if ($formContOps['borderRadius']['tright'] != '') {
						
					echo "
						border-top-right-radius: ".$formContOps['borderRadius']['tright']."px;
					";

				}

				if ($formContOps['borderRadius']['bleft'] != '') {
						
					echo "
						border-bottom-left-radius: ".$formContOps['borderRadius']['bleft']."px;
					";

				}

				if ($formContOps['borderRadius']['bright'] != '') {
						
					echo "
						border-bottom-right-radius: ".$formContOps['borderRadius']['bright']."px;
					";

				}



				if ($formContOps['shadow']['posV'] != '' && $formContOps['shadow']['posH'] != '') {

					echo "
						box-shadow : " . $formContOps['shadow']['color']." ". $formContOps['shadow']['posH']."px ". $formContOps['shadow']['posV']."px ". $formContOps['shadow']['blur']."px ". ";
					";

				}


				if ($formContOps['margin']['top'] != '') {

					echo "
						margin-top: ". $formContOps['margin']['top'] . $formContOps['margin']['unit'] ." ;
					";

				}else{
					echo "margin-top:8%;";
				}

				if ($formContOps['margin']['right'] != '') {

					echo "
						margin-right: ". $formContOps['margin']['right'] . $formContOps['margin']['unit'] ." ;
						display:inline-block;
					";

				}else{
					echo "margin-right:auto; display:block;";
				}

				if ($formContOps['margin']['bottom'] != '') {

					echo "
						margin-bottom: ". $formContOps['margin']['bottom'] . $formContOps['margin']['unit'] ." ;
					";

				}else{
					echo "margin-bottom:0;";
				}


				if ($formContOps['margin']['left'] != '') {

					echo "
						margin-left: ". $formContOps['margin']['left'] . $formContOps['margin']['unit'] ." ;
						display:inline-block;
					";

				}else{
					echo "margin-left:auto; display:block;";
				}



				if ($formContOps['padding']['top'] != '') {

					echo "
						padding-top: ". $formContOps['padding']['top'] . $formContOps['padding']['unit'] ." ;
					";

				}else{
					echo "padding-top:15px;";
				}

				if ($formContOps['padding']['right'] != '') {

					echo "
						padding-right: ". $formContOps['padding']['right'] . $formContOps['padding']['unit'] ." ;
					";

				}else{
					echo "padding-right:15px;";
				}

				if ($formContOps['padding']['bottom'] != '') {

					echo "
						padding-bottom: ". $formContOps['padding']['bottom'] . $formContOps['padding']['unit'] ." ;
					";

				}else{
					echo "padding-bottom:15px;";
				}

				if ($formContOps['padding']['left'] != '') {

					echo "
						padding-left: ". $formContOps['padding']['left'] . $formContOps['padding']['unit'] ." ;
					";

				}else{
					echo "padding-left:15px;";
				}			



			echo "} \n \n  ";


			// labels 
			echo "#loginform label { ";


				if (isset($formLabels['textColor'])) {
					
					echo "
						color: ".$formLabels['textColor'].";
					";

				}

				if (isset($formLabels['textSize'])) {
					
					echo "
						font-size:".$formLabels['textSize'].$formLabels['textSizeU'].";
					";

				}else{
					echo "font-size:14px;";
				}


				if (isset($formLabels['fontFamily'])) {
					
					echo "
						font-family: ".str_replace('+', ' ', $formLabels['fontFamily'] ).";
					";
				}else{
					echo "font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen-Sans,Ubuntu,Cantarell,'Helvetica Neue',sans-serif;";
				}




				if ($formLabels['margin']['top'] != '') {

					echo "
						margin-top: ". $formLabels['margin']['top'] . $formLabels['margin']['unit'] ." ;
					";

				}else{
					echo "margin-top:0";
				}

				if ($formLabels['margin']['right'] != '') {

					echo "
						margin-right: ". $formLabels['margin']['right'] . $formLabels['margin']['unit'] ." ;
					";

				}else{
					echo "margin-right:0;";
				}

				if ($formLabels['margin']['bottom'] != '') {

					echo "
						margin-bottom: ". $formLabels['margin']['bottom'] . $formLabels['margin']['unit'] ." ;
					";

				}else{
					echo "margin-bottom:2px;";
				}


				if ($formLabels['margin']['left'] != '') {

					echo "
						margin-left: ". $formLabels['margin']['left'] . $formLabels['margin']['unit'] ." ;
					";

				}else{
					echo "margin-left:0;";
				}



			echo "} \n \n  ";



			//input fields
			echo "#loginform .input{ ";

				if (isset($formInput['bgColor'])) {
					
					echo "
						background: ".$formInput['bgColor'].";
					";

				}

				if (isset($formInput['textColor'])) {
					
					echo "
						color: ".$formInput['textColor'].";
					";

				}

				if (isset($formInput['fontFamily'])) {
					
					echo "
						font-family: ".str_replace('+', ' ', $formInput['fontFamily'] ).";
					";

				}

				if (isset($formInput['textSize'])) {
					
					echo "
						font-size: ".$formInput['textSize'].$formInput['textSizeU'].";
					";

				}


				if ($formInput['border']['color'] != '') {
						
					echo "
						border-color: ".$formInput['border']['color'].";
					";

				}

				if ($formInput['border']['style'] != '') {
						
					echo "
						border-style: ".$formInput['border']['style'].";
					";

				}

				if ($formInput['border']['top'] != '') {
						
					echo "
						border-top-width: ".$formInput['border']['top']."px;
					";

				}

				if ($formInput['border']['right'] != '') {
						
					echo "
						border-right-width: ".$formInput['border']['right']."px;
					";

				}

				if ($formInput['border']['bottom'] != '') {
						
					echo "
						border-bottom-width: ".$formInput['border']['bottom']."px;
					";

				}

				if ($formInput['border']['left'] != '') {
						
					echo "
						border-left-width: ".$formInput['border']['left']."px;
					";

				}



				if ($formInput['borderRadius']['tleft'] != '') {
						
					echo "
						border-top-left-radius: ".$formInput['borderRadius']['tleft']."px;
					";

				}

				if ($formInput['borderRadius']['tright'] != '') {
						
					echo "
						border-top-right-radius: ".$formInput['borderRadius']['tright']."px;
					";

				}

				if ($formInput['borderRadius']['bleft'] != '') {
						
					echo "
						border-bottom-left-radius: ".$formInput['borderRadius']['bleft']."px;
					";

				}

				if ($formInput['borderRadius']['bright'] != '') {
						
					echo "
						border-bottom-right-radius: ".$formInput['borderRadius']['bright']."px;
					";

				}


				if ($formInput['shadow']['posV'] != '' && $formInput['shadow']['posH'] != '') {

					echo "
						box-shadow : " . $formInput['shadow']['color']." ". $formInput['shadow']['posH']."px ". $formInput['shadow']['posV']."px ". $formInput['shadow']['blur']."px ". ";
					";

				}



				if ($formInput['margin']['top'] != '') {

					echo "
						margin-top: ". $formInput['margin']['top'] . $formInput['margin']['unit'] ." ;
					";

				}else{
					echo "margin-top:0";
				}

				if ($formInput['margin']['right'] != '') {

					echo "
						margin-right: ". $formInput['margin']['right'] . $formInput['margin']['unit'] ." ;
					";

				}else{
					echo "margin-right:0;";
				}

				if ($formInput['margin']['bottom'] != '') {

					echo "
						margin-bottom: ". $formInput['margin']['bottom'] . $formInput['margin']['unit'] ." ;
					";

				}else{
					echo "margin-bottom:16px;";
				}


				if ($formInput['margin']['left'] != '') {

					echo "
						margin-left: ". $formInput['margin']['left'] . $formInput['margin']['unit'] ." ;
					";

				}else{
					echo "margin-left:0;";
				}



				if ($formInput['padding']['top'] != '') {

					echo "
						padding-top: ". $formInput['padding']['top'] . $formInput['padding']['unit'] ." ;
					";

				}else{
					echo "padding-top:3px;";
				}

				if ($formInput['padding']['right'] != '') {

					echo "
						padding-right: ". $formInput['padding']['right'] . $formInput['padding']['unit'] ." ;
					";

				}else{
					echo "padding-right:5px;";
				}

				if ($formInput['padding']['bottom'] != '') {

					echo "
						padding-bottom: ". $formInput['padding']['bottom'] . $formInput['padding']['unit'] ." ;
					";

				}else{
					echo "padding-bottom:3px;";
				}

				if ($formInput['padding']['left'] != '') {

					echo "
						padding-left: ". $formInput['padding']['left'] . $formInput['padding']['unit'] ." ;
					";

				}else{
					echo "padding-left:5px;";
				}



			echo "} \n \n  ";


			//submit button
			echo "#loginform #wp-submit{ ";

				if (isset($formButton['textColor'])) {
					echo "
						color: ".$formButton['textColor'].";
					";
				}


				if (isset($formButton['fontFamily'])) {
					echo "
						font-family: ".str_replace('+',' ', $formButton['fontFamily'])." ;
					";
				}


				if (isset($formButton['textSize'])) {
					echo "
						font-size: ".$formButton['textSize'].$formButton['textSizeU'].";
					";
				}


				if (!isset($formButton['width'])) { $formButton['width'] == 'default'; }

				if (isset($formButton['width'])) {

					if ($formButton['width'] == 'default') {
						echo "
							width: auto;
						";
					}else{
						echo "
							width: 100%;
						";
					}

				}





				if ($formButton['border']['color'] != '') {
						
					echo "
						border-color: ".$formButton['border']['color'].";
					";

				}

				if ($formButton['border']['style'] != '') {
						
					echo "
						border-style: ".$formButton['border']['style'].";
					";

				}

				if ($formButton['border']['top'] != '') {
						
					echo "
						border-top-width: ".$formButton['border']['top']."px;
					";

				}

				if ($formButton['border']['right'] != '') {
						
					echo "
						border-right-width: ".$formButton['border']['right']."px;
					";

				}

				if ($formButton['border']['bottom'] != '') {
						
					echo "
						border-bottom-width: ".$formButton['border']['bottom']."px;
					";

				}

				if ($formButton['border']['left'] != '') {
						
					echo "
						border-left-width: ".$formButton['border']['left']."px;
					";

				}



				if ($formButton['borderRadius']['tleft'] != '') {
						
					echo "
						border-top-left-radius: ".$formButton['borderRadius']['tleft']."px;
					";

				}

				if ($formButton['borderRadius']['tright'] != '') {
						
					echo "
						border-top-right-radius: ".$formButton['borderRadius']['tright']."px;
					";

				}

				if ($formButton['borderRadius']['bleft'] != '') {
						
					echo "
						border-bottom-left-radius: ".$formButton['borderRadius']['bleft']."px;
					";

				}

				if ($formButton['borderRadius']['bright'] != '') {
						
					echo "
						border-bottom-right-radius: ".$formButton['borderRadius']['bright']."px;
					";

				}




				if ($formButton['shadow']['posV'] != '' && $formButton['shadow']['posH'] != '') {

					echo "
						box-shadow : " . $formButton['shadow']['color']." ". $formButton['shadow']['posH']."px ". $formButton['shadow']['posV']."px ". $formButton['shadow']['blur']."px ". ";
					";

				}



				if ($formButton['margin']['top'] != '') {

					echo "
						margin-top: ". $formButton['margin']['top'] . $formButton['margin']['unit'] ." ;
					";

				}else{
					echo "margin-top:0";
				}

				if ($formButton['margin']['right'] != '') {

					echo "
						margin-right: ". $formButton['margin']['right'] . $formButton['margin']['unit'] ." ;
					";

				}else{
					echo "margin-right:0;";
				}

				if ($formButton['margin']['bottom'] != '') {

					echo "
						margin-bottom: ". $formButton['margin']['bottom'] . $formButton['margin']['unit'] ." ;
					";

				}else{
					echo "margin-bottom:0;";
				}


				if ($formButton['margin']['left'] != '') {

					echo "
						margin-left: ". $formButton['margin']['left'] . $formButton['margin']['unit'] ." ;
					";

				}else{
					echo "margin-left:0;";
				}



				if ($formButton['padding']['top'] != '') {

					echo "
						padding-top: ". $formButton['padding']['top'] . $formButton['padding']['unit'] ." ;
					";

				}else{
					echo "padding-top:0;";
				}

				if ($formButton['padding']['right'] != '') {

					echo "
						padding-right: ". $formButton['padding']['right'] . $formButton['padding']['unit'] ." ;
					";

				}else{
					echo "padding-right:12px;";
				}

				if ($formButton['padding']['bottom'] != '') {

					echo "
						padding-bottom: ". $formButton['padding']['bottom'] . $formButton['padding']['unit'] ." ;
					";

				}else{
					echo "padding-bottom:0;";
				}

				if ($formButton['padding']['left'] != '') {

					echo "
						padding-left: ". $formButton['padding']['left'] . $formButton['padding']['unit'] ." ;
					";

				}else{
					echo "padding-left:12px;";
				}



			echo "} \n \n  ";




			//submit button Bg
			echo "#loginform #wp-submit { ";

				if ($formSubmitBg['bbgType'] == 'solid') {
					
					if (isset($formSubmitBg['bbgColor'])) {

						echo "
							background: ".$formSubmitBg['bbgColor'].";
						";

					}

				}


				if ($formSubmitBg['bbgType'] == 'gradient') {

					if ($formSubmitBg['bbgGradient']['bbgGrType'] == 'linear') {

						echo "
							background: linear-gradient( ".
								
								$formSubmitBg['bbgGradient']['bbgGrAngle']."deg,".
								$formSubmitBg['bbgGradient']['bbgGr1Color']." ".$formSubmitBg['bbgGradient']['bbgGr1Loc']."%,".
								$formSubmitBg['bbgGradient']['bbgGr2Color']." ".$formSubmitBg['bbgGradient']['bbgGr2Loc']."%".

							" ) ;
						";

					}


					if ($formSubmitBg['bbgGradient']['bbgGrType'] == 'radial') {

						echo "
							background: radial-gradient( at".
								
								$formSubmitBg['bbgGradient']['bbgGrPos'].",".
								$formSubmitBg['bbgGradient']['bbgGr1Color']." ".$formSubmitBg['bbgGradient']['bbgGr1Loc']."%,".
								$formSubmitBg['bbgGradient']['bbgGr2Color']." ".$formSubmitBg['bbgGradient']['bbgGr2Loc']."%".

							" ) ;
						";

					}

				}


			echo "} \n \n  ";




			//footer links styles
			echo "#nav a, #backtoblog a { ";

				if (isset($footerLinks['textColor'])) {
					
					echo "
						color: ".$footerLinks['textColor']." !important;
					";

				}

				if (isset($footerLinks['textSize'])) {
					
					echo "
						font-size: ".$footerLinks['textSize'].$footerLinks['textSizeU']." !important;
					";

				}

				if (isset($footerLinks['fontFamily'])) {
					
					echo "
						font-family: ".str_replace('+',' ',$footerLinks['fontFamily']).";
					";

				}

				

			echo "} \n \n  ";

			//footer links styles
			echo "#nav, #backtoblog { ";


				if (isset($footerLinks['alignment'])) {
					
					echo "
						text-align:".$footerLinks['alignment'].";
					";
				}


			echo "} \n \n  ";

			//footer links styles
			echo "#nav { ";

				if ($footerLinks['margin']['top'] != '') {

					echo "
						margin-top: ". $footerLinks['margin']['top'] . $footerLinks['margin']['unit'] ." ;
					";

				}else{
					echo "margin-top:15px";
				}

				if ($footerLinks['margin']['right'] != '') {

					echo "
						margin-right: ". $footerLinks['margin']['right'] . $footerLinks['margin']['unit'] ." ;
					";

				}else{
					echo "margin-right:0;";
				}

				if ($footerLinks['margin']['bottom'] != '') {

					echo "
						margin-bottom: ". $footerLinks['margin']['bottom'] . $footerLinks['margin']['unit'] ." ;
					";

				}else{
					echo "margin-bottom:0;";
				}


				if ($footerLinks['margin']['left'] != '') {

					echo "
						margin-left: ". $footerLinks['margin']['left'] . $footerLinks['margin']['unit'] ." ;
					";

				}else{
					echo "margin-left:0;";
				}


			echo "} \n \n  ";


			echo "  
				#loginform {
				  background: transparent;
				  background-color: transparent;
				  border: none;
				  box-shadow: none;
				  padding: 0;
				}
			";


			if (isset($customScripts['customcss'])) {
				echo $customScripts['customcss'];
			}

		echo "</style>";



		$dataMobile = get_option( 'plbp__login_builder_options_data_mobile', false );

		
		
		if ($dataMobile == '' || $dataMobile == false) {
			$dataMobile = array();
		}



		$dataMobile = $this->mergeNonSetObjectValues($dataMobile,$data);


		foreach ($dataMobile as $key1 => $value1) {
			
			if (is_array($value1)) {

				foreach ($value1 as $key2 => $value2) {
					
					if (is_array($value2)) {
						
					}else{

						if ($value2 == '' || $value2 == ' ') {
							unset($dataMobile[$key1][$key2]);
						}

					}

				}
				
			}

		}


		$logo = $dataMobile['logo'];
		$bgOps = $dataMobile['bgOps'];
		$fbgOps = $dataMobile['formContBgOps'];
		$formContOps = $dataMobile['formContOps'];
		$formLabels = $dataMobile['formLabels'];
		$formInput = $dataMobile['formInput'];
		$formButton = $dataMobile['formButton'];
		$formSubmitBg = $dataMobile['formButtonBg'];
		$footerLinks = $dataMobile['footerLinks'];
		$customScripts = $dataMobile['scripts'];


		echo "<style type='text/css' media='screen'>";

			echo "@media only screen and (max-width: 400px) { ";

				// logo image
				echo " .login h1 { ";
					
					if (isset($logo['hideLogo'])) {
						echo "display: ".$logo['hideLogo'].";";
					}

					if (isset($logo['logoAlignment'])) {
						echo "text-align: ".$logo['logoAlignment'].";";
					}
					

				echo " } \n \n  ";


				// logo link
				echo " .login h1 a { ";

					if ($logo['logoImage'] != '' && $logo['logoImage'] != ' ') {
						echo "background-image: url(".$logo['logoImage'].") !important; ";
					}

					if (isset($logo['logoImageWidth'])) {
						echo "background-size: ".$logo['logoImageWidth']."px !important;";
					}

					if (isset($logo['logoImageHeight'])) {
						echo "height: ".$logo['logoImageHeight']."px !important;";
					}

					echo "width:100% !important;";

				echo " } \n \n  ";


				// body bg
				echo ".login { ";

					if ($bgOps['bgType'] == 'solid') {
						
						if ($bgOps['bgColor'] != '') {

							echo "
								background: ".$bgOps['bgColor'].";
							";

						}

					}


					if ($bgOps['bgType'] == 'image') {

						if ($bgOps['bgImage'] != '') {

							echo "
								background-image: url(".$bgOps['bgImage'].");
								background-color:transparent;
							";

						}

						if ($bgOps['bgImgOps']['pos'] != '') {
							
							if ($bgOps['bgImgOps']['pos'] == 'custom') {
								
								echo "
									background-position-x:".$bgOps['bgImgOps']['xPos'].$bgOps['bgImgOps']['xPosU'].";
									background-position-x:".$bgOps['bgImgOps']['yPos'].$bgOps['bgImgOps']['yPosU'].";
								";

							}else{
								echo "
									background-position: ".$bgOps['bgImgOps']['pos'].";
								";
							}

						}

						if ($bgOps['bgImgOps']['rep'] != '') {

							echo "
								background-repeat: ".$bgOps['bgImgOps']['rep'].";
							";

						}

						if ($bgOps['bgImgOps']['size'] != '') {

							if ($bgOps['bgImgOps']['size'] == 'custom') {

								echo "
									background-size: ".$bgOps['bgImgOps']['cWid'].$bgOps['bgImgOps']['widU'].";
								";

							}else{

								echo "
									background-size: ".$bgOps['bgImgOps']['size'].";
								";

							}
							

						}

					}


					if ($bgOps['bgType'] == 'gradient') {

						if ($bgOps['bgGradient']['bgGrType'] == 'linear') {

							echo "
								background: linear-gradient( ".
									
									$bgOps['bgGradient']['bgGrAngle']."deg,".
									$bgOps['bgGradient']['bgGr1Color']." ".$bgOps['bgGradient']['bgGr1Loc']."%,".
									$bgOps['bgGradient']['bgGr2Color']." ".$bgOps['bgGradient']['bgGr2Loc']."%".

								" ) ;
							";

						}


						if ($bgOps['bgGradient']['bgGrType'] == 'radial') {

							echo "
								background: radial-gradient( at".
									
									$bgOps['bgGradient']['bgGrPos'].",".
									$bgOps['bgGradient']['bgGr1Color']." ".$bgOps['bgGradient']['bgGr1Loc']."%,".
									$bgOps['bgGradient']['bgGr2Color']." ".$bgOps['bgGradient']['bgGr2Loc']."%".

								" ) ;
							";

						}

					}


				echo "}  \n \n ";


				// form container bg
				echo "#login { ";

					if ($fbgOps['fbgType'] == 'solid') {
						
						if (isset($fbgOps['fbgColor'])) {

							echo "
								background: ".$fbgOps['fbgColor'].";
							";

						}

					}


					if ($fbgOps['fbgType'] == 'image') {

						if (isset($fbgOps['fbgImage'])) {

							echo "
								background-image: url(".$fbgOps['fbgImage'].");
								background-color:transparent;
							";

						}

						if ($fbgOps['fbgImgOps']['fpos'] != '') {
							
							if ($fbgOps['fbgImgOps']['fpos'] == 'custom') {
								
								echo "
									background-position-x:".$fbgOps['fbgImgOps']['fxPos'].$fbgOps['fbgImgOps']['fxPosU'].";
									background-position-x:".$fbgOps['fbgImgOps']['fyPos'].$fbgOps['fbgImgOps']['fyPosU'].";
								";

							}else{
								echo "
									background-position: ".$fbgOps['fbgImgOps']['fpos'].";
								";
							}

						}

						if ($fbgOps['fbgImgOps']['frep'] != '') {

							echo "
								background-repeat: ".$fbgOps['fbgImgOps']['frep'].";
							";

						}

						if ($fbgOps['fbgImgOps']['fsize'] != '') {

							if ($fbgOps['fbgImgOps']['fsize'] == 'custom') {

								echo "
									background-size: ".$fbgOps['fbgImgOps']['fcWid'].$fbgOps['fbgImgOps']['fwidU'].";
								";

							}else{

								echo "
									background-size: ".$fbgOps['fbgImgOps']['fsize'].";
								";

							}
							

						}

					}


					if ($fbgOps['fbgType'] == 'gradient') {

						if ($fbgOps['fbgGradient']['fbgGrType'] == 'linear') {

							echo "
								background: linear-gradient( ".
									
									$fbgOps['fbgGradient']['fbgGrAngle']."deg,".
									$fbgOps['fbgGradient']['fbgGr1Color']." ".$fbgOps['fbgGradient']['fbgGr1Loc']."%,".
									$fbgOps['fbgGradient']['fbgGr2Color']." ".$fbgOps['fbgGradient']['fbgGr2Loc']."%".

								" ) ;
							";

						}


						if ($fbgOps['fbgGradient']['fbgGrType'] == 'radial') {

							echo "
								background: radial-gradient( at".
									
									$fbgOps['fbgGradient']['fbgGrPos'].",".
									$fbgOps['fbgGradient']['fbgGr1Color']." ".$fbgOps['fbgGradient']['fbgGr1Loc']."%,".
									$fbgOps['fbgGradient']['fbgGr2Color']." ".$fbgOps['fbgGradient']['fbgGr2Loc']."%".

								" ) ;
							";

						}

					}


				echo "} \n \n  ";


				// form container
				echo "#login { ";

					if (isset($formContOps['fwidth'])) {
							
						echo "
							width: ".$formContOps['fwidth']."px;
						";

					}


					if (isset($formContOps['fheight'])) {
							
						echo "
							height: ".$formContOps['fheight']."px;
						";

					}


					if ($formContOps['border']['color'] != '') {
							
						echo "
							border-color: ".$formContOps['border']['color'].";
						";

					}

					if ($formContOps['border']['style'] != '') {
							
						echo "
							border-style: ".$formContOps['border']['style'].";
						";

					}

					if ($formContOps['border']['top'] != '') {
							
						echo "
							border-top-width: ".$formContOps['border']['top']."px;
						";

					}

					if ($formContOps['border']['right'] != '') {
							
						echo "
							border-right-width: ".$formContOps['border']['right']."px;
						";

					}

					if ($formContOps['border']['bottom'] != '') {
							
						echo "
							border-bottom-width: ".$formContOps['border']['bottom']."px;
						";

					}

					if ($formContOps['border']['left'] != '') {
							
						echo "
							border-left-width: ".$formContOps['border']['left']."px;
						";

					}



					if ($formContOps['borderRadius']['tleft'] != '') {
							
						echo "
							border-top-left-radius: ".$formContOps['borderRadius']['tleft']."px;
						";

					}

					if ($formContOps['borderRadius']['tright'] != '') {
							
						echo "
							border-top-right-radius: ".$formContOps['borderRadius']['tright']."px;
						";

					}

					if ($formContOps['borderRadius']['bleft'] != '') {
							
						echo "
							border-bottom-left-radius: ".$formContOps['borderRadius']['bleft']."px;
						";

					}

					if ($formContOps['borderRadius']['bright'] != '') {
							
						echo "
							border-bottom-right-radius: ".$formContOps['borderRadius']['bright']."px;
						";

					}



					if ($formContOps['shadow']['posV'] != '' && $formContOps['shadow']['posH'] != '') {

						echo "
							box-shadow : " . $formContOps['shadow']['color']." ". $formContOps['shadow']['posH']."px ". $formContOps['shadow']['posV']."px ". $formContOps['shadow']['blur']."px ". ";
						";

					}


					if ($formContOps['margin']['top'] != '') {

						echo "
							margin-top: ". $formContOps['margin']['top'] . $formContOps['margin']['unit'] ." ;
						";

					}else{
						echo "margin-top:8%;";
					}

					if ($formContOps['margin']['right'] != '') {

						echo "
							margin-right: ". $formContOps['margin']['right'] . $formContOps['margin']['unit'] ." ;
							display:inline-block;
						";

					}else{
						echo "margin-right:auto; display:block;";
					}

					if ($formContOps['margin']['bottom'] != '') {

						echo "
							margin-bottom: ". $formContOps['margin']['bottom'] . $formContOps['margin']['unit'] ." ;
						";

					}else{
						echo "margin-bottom:0;";
					}


					if ($formContOps['margin']['left'] != '') {

						echo "
							margin-left: ". $formContOps['margin']['left'] . $formContOps['margin']['unit'] ." ;
							display:inline-block;
						";

					}else{
						echo "margin-left:auto; display:block;";
					}



					if ($formContOps['padding']['top'] != '') {

						echo "
							padding-top: ". $formContOps['padding']['top'] . $formContOps['padding']['unit'] ." ;
						";

					}else{
						echo "padding-top:15px;";
					}

					if ($formContOps['padding']['right'] != '') {

						echo "
							padding-right: ". $formContOps['padding']['right'] . $formContOps['padding']['unit'] ." ;
						";

					}else{
						echo "padding-right:15px;";
					}

					if ($formContOps['padding']['bottom'] != '') {

						echo "
							padding-bottom: ". $formContOps['padding']['bottom'] . $formContOps['padding']['unit'] ." ;
						";

					}else{
						echo "padding-bottom:15px;";
					}

					if ($formContOps['padding']['left'] != '') {

						echo "
							padding-left: ". $formContOps['padding']['left'] . $formContOps['padding']['unit'] ." ;
						";

					}else{
						echo "padding-left:15px;";
					}			



				echo "} \n \n  ";


				// labels 
				echo "#loginform label { ";


					if (isset($formLabels['textColor'])) {
						
						echo "
							color: ".$formLabels['textColor'].";
						";

					}

					if (isset($formLabels['textSize'])) {
						
						echo "
							font-size:".$formLabels['textSize'].$formLabels['textSizeU'].";
						";

					}else{
						echo "font-size:14px;";
					}


					if (isset($formLabels['fontFamily'])) {
						
						echo "
							font-family: ".str_replace('+', ' ', $formLabels['fontFamily'] ).";
						";
					}else{
						echo "font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen-Sans,Ubuntu,Cantarell,'Helvetica Neue',sans-serif;";
					}




					if ($formLabels['margin']['top'] != '') {

						echo "
							margin-top: ". $formLabels['margin']['top'] . $formLabels['margin']['unit'] ." ;
						";

					}else{
						echo "margin-top:0";
					}

					if ($formLabels['margin']['right'] != '') {

						echo "
							margin-right: ". $formLabels['margin']['right'] . $formLabels['margin']['unit'] ." ;
						";

					}else{
						echo "margin-right:0;";
					}

					if ($formLabels['margin']['bottom'] != '') {

						echo "
							margin-bottom: ". $formLabels['margin']['bottom'] . $formLabels['margin']['unit'] ." ;
						";

					}else{
						echo "margin-bottom:2px;";
					}


					if ($formLabels['margin']['left'] != '') {

						echo "
							margin-left: ". $formLabels['margin']['left'] . $formLabels['margin']['unit'] ." ;
						";

					}else{
						echo "margin-left:0;";
					}



				echo "} \n \n  ";



				//input fields
				echo "#loginform .input{ ";

					if (isset($formInput['bgColor'])) {
						
						echo "
							background: ".$formInput['bgColor'].";
						";

					}

					if (isset($formInput['textColor'])) {
						
						echo "
							color: ".$formInput['textColor'].";
						";

					}

					if (isset($formInput['fontFamily'])) {
						
						echo "
							font-family: ".str_replace('+', ' ', $formInput['fontFamily'] ).";
						";

					}

					if (isset($formInput['textSize'])) {
						
						echo "
							font-size: ".$formInput['textSize'].$formInput['textSizeU'].";
						";

					}


					if ($formInput['border']['color'] != '') {
							
						echo "
							border-color: ".$formInput['border']['color'].";
						";

					}

					if ($formInput['border']['style'] != '') {
							
						echo "
							border-style: ".$formInput['border']['style'].";
						";

					}

					if ($formInput['border']['top'] != '') {
							
						echo "
							border-top-width: ".$formInput['border']['top']."px;
						";

					}

					if ($formInput['border']['right'] != '') {
							
						echo "
							border-right-width: ".$formInput['border']['right']."px;
						";

					}

					if ($formInput['border']['bottom'] != '') {
							
						echo "
							border-bottom-width: ".$formInput['border']['bottom']."px;
						";

					}

					if ($formInput['border']['left'] != '') {
							
						echo "
							border-left-width: ".$formInput['border']['left']."px;
						";

					}



					if ($formInput['borderRadius']['tleft'] != '') {
							
						echo "
							border-top-left-radius: ".$formInput['borderRadius']['tleft']."px;
						";

					}

					if ($formInput['borderRadius']['tright'] != '') {
							
						echo "
							border-top-right-radius: ".$formInput['borderRadius']['tright']."px;
						";

					}

					if ($formInput['borderRadius']['bleft'] != '') {
							
						echo "
							border-bottom-left-radius: ".$formInput['borderRadius']['bleft']."px;
						";

					}

					if ($formInput['borderRadius']['bright'] != '') {
							
						echo "
							border-bottom-right-radius: ".$formInput['borderRadius']['bright']."px;
						";

					}


					if ($formInput['shadow']['posV'] != '' && $formInput['shadow']['posH'] != '') {

						echo "
							box-shadow : " . $formInput['shadow']['color']." ". $formInput['shadow']['posH']."px ". $formInput['shadow']['posV']."px ". $formInput['shadow']['blur']."px ". ";
						";

					}



					if ($formInput['margin']['top'] != '') {

						echo "
							margin-top: ". $formInput['margin']['top'] . $formInput['margin']['unit'] ." ;
						";

					}else{
						echo "margin-top:0";
					}

					if ($formInput['margin']['right'] != '') {

						echo "
							margin-right: ". $formInput['margin']['right'] . $formInput['margin']['unit'] ." ;
						";

					}else{
						echo "margin-right:0;";
					}

					if ($formInput['margin']['bottom'] != '') {

						echo "
							margin-bottom: ". $formInput['margin']['bottom'] . $formInput['margin']['unit'] ." ;
						";

					}else{
						echo "margin-bottom:16px;";
					}


					if ($formInput['margin']['left'] != '') {

						echo "
							margin-left: ". $formInput['margin']['left'] . $formInput['margin']['unit'] ." ;
						";

					}else{
						echo "margin-left:0;";
					}



					if ($formInput['padding']['top'] != '') {

						echo "
							padding-top: ". $formInput['padding']['top'] . $formInput['padding']['unit'] ." ;
						";

					}else{
						echo "padding-top:3px;";
					}

					if ($formInput['padding']['right'] != '') {

						echo "
							padding-right: ". $formInput['padding']['right'] . $formInput['padding']['unit'] ." ;
						";

					}else{
						echo "padding-right:5px;";
					}

					if ($formInput['padding']['bottom'] != '') {

						echo "
							padding-bottom: ". $formInput['padding']['bottom'] . $formInput['padding']['unit'] ." ;
						";

					}else{
						echo "padding-bottom:3px;";
					}

					if ($formInput['padding']['left'] != '') {

						echo "
							padding-left: ". $formInput['padding']['left'] . $formInput['padding']['unit'] ." ;
						";

					}else{
						echo "padding-left:5px;";
					}



				echo "} \n \n  ";


				//submit button
				echo "#loginform #wp-submit{ ";

					if (isset($formButton['textColor'])) {
						echo "
							color: ".$formButton['textColor'].";
						";
					}


					if (isset($formButton['fontFamily'])) {
						echo "
							font-family: ".str_replace('+',' ', $formButton['fontFamily'])." ;
						";
					}


					if (isset($formButton['textSize'])) {
						echo "
							font-size: ".$formButton['textSize'].$formButton['textSizeU'].";
						";
					}


					if (!isset($formButton['width'])) { $formButton['width'] == 'default'; }

					if (isset($formButton['width'])) {

						if ($formButton['width'] == 'default') {
							echo "
								width: auto;
							";
						}else{
							echo "
								width: 100%;
							";
						}

					}





					if ($formButton['border']['color'] != '') {
							
						echo "
							border-color: ".$formButton['border']['color'].";
						";

					}

					if ($formButton['border']['style'] != '') {
							
						echo "
							border-style: ".$formButton['border']['style'].";
						";

					}

					if ($formButton['border']['top'] != '') {
							
						echo "
							border-top-width: ".$formButton['border']['top']."px;
						";

					}

					if ($formButton['border']['right'] != '') {
							
						echo "
							border-right-width: ".$formButton['border']['right']."px;
						";

					}

					if ($formButton['border']['bottom'] != '') {
							
						echo "
							border-bottom-width: ".$formButton['border']['bottom']."px;
						";

					}

					if ($formButton['border']['left'] != '') {
							
						echo "
							border-left-width: ".$formButton['border']['left']."px;
						";

					}



					if ($formButton['borderRadius']['tleft'] != '') {
							
						echo "
							border-top-left-radius: ".$formButton['borderRadius']['tleft']."px;
						";

					}

					if ($formButton['borderRadius']['tright'] != '') {
							
						echo "
							border-top-right-radius: ".$formButton['borderRadius']['tright']."px;
						";

					}

					if ($formButton['borderRadius']['bleft'] != '') {
							
						echo "
							border-bottom-left-radius: ".$formButton['borderRadius']['bleft']."px;
						";

					}

					if ($formButton['borderRadius']['bright'] != '') {
							
						echo "
							border-bottom-right-radius: ".$formButton['borderRadius']['bright']."px;
						";

					}




					if ($formButton['shadow']['posV'] != '' && $formButton['shadow']['posH'] != '') {

						echo "
							box-shadow : " . $formButton['shadow']['color']." ". $formButton['shadow']['posH']."px ". $formButton['shadow']['posV']."px ". $formButton['shadow']['blur']."px ". ";
						";

					}



					if ($formButton['margin']['top'] != '') {

						echo "
							margin-top: ". $formButton['margin']['top'] . $formButton['margin']['unit'] ." ;
						";

					}else{
						echo "margin-top:0";
					}

					if ($formButton['margin']['right'] != '') {

						echo "
							margin-right: ". $formButton['margin']['right'] . $formButton['margin']['unit'] ." ;
						";

					}else{
						echo "margin-right:0;";
					}

					if ($formButton['margin']['bottom'] != '') {

						echo "
							margin-bottom: ". $formButton['margin']['bottom'] . $formButton['margin']['unit'] ." ;
						";

					}else{
						echo "margin-bottom:0;";
					}


					if ($formButton['margin']['left'] != '') {

						echo "
							margin-left: ". $formButton['margin']['left'] . $formButton['margin']['unit'] ." ;
						";

					}else{
						echo "margin-left:0;";
					}



					if ($formButton['padding']['top'] != '') {

						echo "
							padding-top: ". $formButton['padding']['top'] . $formButton['padding']['unit'] ." ;
						";

					}else{
						echo "padding-top:0;";
					}

					if ($formButton['padding']['right'] != '') {

						echo "
							padding-right: ". $formButton['padding']['right'] . $formButton['padding']['unit'] ." ;
						";

					}else{
						echo "padding-right:12px;";
					}

					if ($formButton['padding']['bottom'] != '') {

						echo "
							padding-bottom: ". $formButton['padding']['bottom'] . $formButton['padding']['unit'] ." ;
						";

					}else{
						echo "padding-bottom:0;";
					}

					if ($formButton['padding']['left'] != '') {

						echo "
							padding-left: ". $formButton['padding']['left'] . $formButton['padding']['unit'] ." ;
						";

					}else{
						echo "padding-left:12px;";
					}



				echo "} \n \n  ";




				//submit button Bg
				echo "#loginform #wp-submit { ";

					if ($formSubmitBg['bbgType'] == 'solid') {
						
						if (isset($formSubmitBg['bbgColor'])) {

							echo "
								background: ".$formSubmitBg['bbgColor'].";
							";

						}

					}


					if ($formSubmitBg['bbgType'] == 'gradient') {

						if ($formSubmitBg['bbgGradient']['bbgGrType'] == 'linear') {

							echo "
								background: linear-gradient( ".
									
									$formSubmitBg['bbgGradient']['bbgGrAngle']."deg,".
									$formSubmitBg['bbgGradient']['bbgGr1Color']." ".$formSubmitBg['bbgGradient']['bbgGr1Loc']."%,".
									$formSubmitBg['bbgGradient']['bbgGr2Color']." ".$formSubmitBg['bbgGradient']['bbgGr2Loc']."%".

								" ) ;
							";

						}


						if ($formSubmitBg['bbgGradient']['bbgGrType'] == 'radial') {

							echo "
								background: radial-gradient( at".
									
									$formSubmitBg['bbgGradient']['bbgGrPos'].",".
									$formSubmitBg['bbgGradient']['bbgGr1Color']." ".$formSubmitBg['bbgGradient']['bbgGr1Loc']."%,".
									$formSubmitBg['bbgGradient']['bbgGr2Color']." ".$formSubmitBg['bbgGradient']['bbgGr2Loc']."%".

								" ) ;
							";

						}

					}


				echo "} \n \n  ";




				//footer links styles
				echo "#nav a, #backtoblog a { ";

					if (isset($footerLinks['textColor'])) {
						
						echo "
							color: ".$footerLinks['textColor']." !important;
						";

					}

					if (isset($footerLinks['textSize'])) {
						
						echo "
							font-size: ".$footerLinks['textSize'].$footerLinks['textSizeU']." !important;
						";

					}

					if (isset($footerLinks['fontFamily'])) {
						
						echo "
							font-family: ".str_replace('+',' ',$footerLinks['fontFamily']).";
						";

					}

					

				echo "} \n \n  ";

				//footer links styles
				echo "#nav, #backtoblog { ";


					if (isset($footerLinks['alignment'])) {
						
						echo "
							text-align:".$footerLinks['alignment'].";
						";
					}


				echo "} \n \n  ";

				//footer links styles
				echo "#nav { ";

					if ($footerLinks['margin']['top'] != '') {

						echo "
							margin-top: ". $footerLinks['margin']['top'] . $footerLinks['margin']['unit'] ." ;
						";

					}else{
						echo "margin-top:15px";
					}

					if ($footerLinks['margin']['right'] != '') {

						echo "
							margin-right: ". $footerLinks['margin']['right'] . $footerLinks['margin']['unit'] ." ;
						";

					}else{
						echo "margin-right:0;";
					}

					if ($footerLinks['margin']['bottom'] != '') {

						echo "
							margin-bottom: ". $footerLinks['margin']['bottom'] . $footerLinks['margin']['unit'] ." ;
						";

					}else{
						echo "margin-bottom:0;";
					}


					if ($footerLinks['margin']['left'] != '') {

						echo "
							margin-left: ". $footerLinks['margin']['left'] . $footerLinks['margin']['unit'] ." ;
						";

					}else{
						echo "margin-left:0;";
					}


				echo "} \n \n  ";


				echo "  
					#loginform {
					  background: transparent;
					  background-color: transparent;
					  border: none;
					  box-shadow: none;
					  padding: 0;
					}
				";


				if (isset($customScripts['customcss'])) {
					echo $customScripts['customcss'];
				}


			echo "}";

		echo "</style>";

		
		

		
	}



	function mergeNonSetObjectValues($source,$target){

		foreach ($target as $key => $value) {
        
	        if (!isset($source[$key])) {

	          $source[$key] = $target[$key];
	        }else{

	          if (is_array($target[$key])) {
	             
	              foreach ($target[$key] as $key2 => $value2) {
	                  
	                if (!isset($source[$key][$key2])) {
	                  $source[$key][$key2] = $target[$key][$key2];
	                }else{

	                  if (is_array($target[$key][$key2])) {
	                    
	                    foreach ($target[$key][$key2] as $key3 => $value3) {

	                      if (!isset($source[$key][$key2][$key3])) {
	                        $source[$key][$key2][$key3] = $target[$key][$key2][$key3];
	                      }

	                    }

	                  }

	                }

	              }

	          }

	        }

    	}

    	return $source;
	
	}
	




}