<?php 
/**
 * Class to install database tables on installation and cleanup on uninstall
 */
class euLawActivate
{
	
	public static function on_activate(){
	    $o 		= get_option('eu_law_options',array());

	    $def 	= euLawSHARED::getDefaults();
	    if (empty($o)){
	    	update_option('eu_law_options', $def);

	    }

		return;
	}

	public static function on_deactivate(){
		delete_option("eu_law_options");
		return;
	}
} 

class euLawSHARED{
  //Defaults for the option table of this plugin
 

  /**
   *
   */
  public static function normalize($o){
    $checks = array(
   'width'		   => '400',
   'height'		  => '255',
   'delay'		   => '0',
   'coc'        => '0',
   'fb_id'		   => '' ,
   'cooc'       => '0'
    );

    

    return array_merge($checks,$o);
  }

  public static function getDefaults(){

    
    $text_to_show="This website uses cookies to offer you the best experience online. By continuing to use our website, you agree to the use of cookies.";
    $defaults = array (
	  'kirim_text_to_show'         => $text_to_show,
	  'kirim_terms_page'         => '0',
	  'fixed_position'       => '0',  //0 top , 1 bottom
	  'font-color'   => '#ffffff',
	  'background-color'         => '#00A761',
	  'font-size'         => '13',
	  'line-height'         => '60',
	  'width'         => '100%',
	  'text-width'         => '500',

	  'responsive-breakpoint'         => '600',

	  'learn-button-text'=>'Learn More',
	  'learn-button-color'=>'#ffffff',
	  'learn-button-padding-top'=>'5',
	  'learn-button-padding-left'=>'10',
	  'learn-button-border'=>'2',
	  'learn-button-border-color'=>'#ffffff',
	  'learn-button-border-radius'=>'5',
	  'learn-button-background-color'=>'#00A761',
	  'learn-button-position'=>'1', //0 inside text 1 standalone

	  'agree-button-text'=>'I Agree',
	  'agree-button-color'=>'#ffffff',
	  'agree-button-padding-top'=>'0',
	  'agree-button-padding-left'=>'10',
	  'agree-button-border'=>'0',
	  'agree-button-border-color'=>'#000000',
	  'agree-button-border-radius'=>'0',
	  'agree-button-background-color'=>'#000000',
	  'agree-button-full-height'=>'1'
	  );
    $o = $defaults;
    return $o;
  }
  
}

?>