<?php

class LC_social_admin_setting extends Akasa_media_social
{
public function __construct(){
	parent::__construct();
add_action('admin_menu', array($this,'social_media_options'));
add_action('admin_init', array($this,'social_media_register_setting'));

}	

public function social_media_register_setting(){

    register_setting('ms-group-plugins','linkfacebokpage');
    register_setting('ms-group-plugins','appidfacebook');
    register_setting('ms-group-plugins','pageidfacebook');
    register_setting('ms-group-plugins','enablecheckboxfb');
    register_setting('ms-group-plugins','customercheckboxfb');
    register_setting('ms-group-plugins','oaidzalo');
    register_setting('ms-group-plugins','messagezalo');
    register_setting('ms-group-plugins','autopopupzalo');
    register_setting('ms-group-plugins','widthzalo');
    register_setting('ms-group-plugins','heightzalo');
    register_setting('ms-group-plugins','enablezalolive');
    register_setting('ms-group-plugins','contactidskype');
    register_setting('ms-group-plugins','enableskypelive');


}

public function social_media_options() {
    add_menu_page('Live chat social', 'Live chat', 'manage_options', 'akasa-social',array($this,'template_admin_social'),'dashicons-share');


}

public function template_admin_social(){


	$data=array();
	$data['linkplugins']=$this->urlplugins;

	$this->views("setting",$data);

}
	
}