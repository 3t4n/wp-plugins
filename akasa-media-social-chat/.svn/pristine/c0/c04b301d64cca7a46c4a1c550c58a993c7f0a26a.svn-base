<?php

class LC_social_frontend_template extends Akasa_media_social
{
	
	function __construct(){
	parent::__construct();	

	add_action('wp_footer',array($this,'footer_social_live_chat'));

	}

	public function footer_social_live_chat(){


		$data=array();

		$data['linkfacebokpage']=get_option('linkfacebokpage');
		$data['appidfacebook']=get_option('appidfacebook');
		$data['pageidfacebook']=get_option('pageidfacebook');
		$data['enablecheckboxfb']=get_option('enablecheckboxfb');
		$data['customercheckboxfb']=get_option('customercheckboxfb');
		$data['oaidzalo']=get_option('oaidzalo');
		$data['messagezalo']=get_option('messagezalo');
		$data['autopopupzalo']=get_option('autopopupzalo');
		$data['widthzalo']=get_option('widthzalo');
		$data['heightzalo']=get_option('heightzalo');
		$data['enablezalolive']=get_option('enablezalolive');
		$data['contactidskype']=get_option('contactidskype');
		$data['enableskypelive']=get_option('enableskypelive');


		if(get_option('enablecheckboxfb')){

			if(get_option('customercheckboxfb')){

					$this->views("facebook-customer",$data);


			}

			else{


				$this->views("facebook",$data);

			}

		}


		if(get_option('enablezalolive')){

			$this->views("zalo",$data);

		}

		if(get_option('enableskypelive')){

			$this->views("skype",$data);

		}



	}

}