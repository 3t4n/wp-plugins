<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class get_class______month_name_translation_benaceur_inc extends class______month_name_translation_benaceur_glob {
	
	function options(){
			
	$settings = get_option($this->get_option_settings());
			
		return array(
			'enable_plug' => isset($settings['enable']) ? $settings['enable'] : '',
			'all_reset' => get_option( 'mntb_all_reset' ),
			'disable_reset_wplang' => isset($settings['reset_wplang']) ? $settings['reset_wplang'] : '',
			'disable_in_admin' => isset($settings['in__admin']) ? $settings['in__admin'] : '',
			'disable_in_front' => isset($settings['in_front']) ? $settings['in_front'] : '',
			'hide_icon_evol_plug' => isset($settings['icon_evol_plug']) ? $settings['icon_evol_plug'] : '',
			'delete_all_options' => isset($settings['delete_all_options']) ? $settings['delete_all_options'] : '',
			'wplang' => get_option( 'month_name_translation_benaceur_WPLANG' )
		);
	}
	
	function option($value){ // ex: $this->option('enable_plug')
			
		$opts = $this->options();
		$opt = isset($opts[$value]) ? $opts[$value] : '' ;
		
		return $opt;
	}
	
	function optionAbb($value){ // ex: $this->optionAbb('jan')
			
		$opts = get_option( 'month_name_translation_benaceur_abbrev_month' ); 
		$opt_s = isset($opts[$value]) && !empty($opts[$value]) ? $opts[$value] : '' ; // هذا السطر لتفادي خطأ Undefined index
			
		return $opt_s;
	}
	
	function optionA($value){
		$opt = "month_name_translation_benaceur_abbrev_month[$value]";
		return $opt;
	}
	
	function optionSett($value){
		$opt = "month_name_translation_benaceur_option_settings[$value]";
		return $opt;
	}
	
	function wp_equal_more_than($ver) {
		if ( version_compare( floatval(get_bloginfo('version')), $ver, '>=') ) return true;
		return false;		
	}
	
	function MNTB_version() {
		$plugin_data = get_plugin_data( MNTB_BEN_PLUGIN );
		$plugin_version = $plugin_data['Version'];
		return $plugin_version;
	}
	
    function _reset(){
	    if ( $this->option('all_reset') || $this->option('wplang') )
	        return true;
	  
        return false;
    }
	
    function mntb_a_translation( $translation, $text, $domain ) {
			//if ($domain != 'default') return $translation;

        switch ( $text ) {
 
            case 'January' :
                $translation = get_option( 'month_name_translation_benaceur_t_jan' );
                break;
				
            case 'Jan' :
                $translation = $this->optionAbb('jan_t');
                break;
				
            case 'February' :
                $translation = get_option( 'month_name_translation_benaceur_t_Fev' );
                break;
				
            case 'Feb' :
                $translation = $this->optionAbb('feb_t');
                break;
				
            case 'March' :
                $translation = get_option( 'month_name_translation_benaceur_t_Mar' );
                break;
				
            case 'Mar' :
                $translation = $this->optionAbb('mar_t');
                break;
				
            case 'April' :
                $translation = get_option( 'month_name_translation_benaceur_t_Avr' );
                break;
				
            case 'Apr' :
                $translation = $this->optionAbb('apr_t');
                break;
				
            case 'May' :
                $translation = get_option( 'month_name_translation_benaceur_t_Mai' );
                break;
				
            case 'May' :
                $translation = $this->optionAbb('may_t');
                break;
				
            case 'June' :
                $translation = get_option( 'monthnametranslationbenaceurtjuin' );
                break;
				
            case 'Jun' :
                $translation = $this->optionAbb('jun_t');
                break;
				
            case 'July' :
                $translation = get_option( 'monthnametranslationbenaceurtjuil' );
                break;
				
            case 'Jul' :
                $translation = $this->optionAbb('jul_t');
                break;
				
            case 'August' :
                $translation = get_option( 'month_name_translation_benaceur_t_Aou' );
                break;
				
            case 'Aug' :
                $translation = $this->optionAbb('aug_t');
                break;
				
            case 'September' :
                $translation = get_option( 'month_name_translation_benaceur_t_Sep' );
                break;
				
            case 'Sep' :
                $translation = $this->optionAbb('sep_t');
                break;
				
            case 'October' :
                $translation = get_option( 'month_name_translation_benaceur_t_Oct' );
                break;
				
            case 'Oct' :
                $translation = $this->optionAbb('oct_t');
                break;
				
            case 'November' :
                $translation = get_option( 'month_name_translation_benaceur_t_Nov' );
                break;
				
            case 'Nov' :
                $translation = $this->optionAbb('nov_t');
                break;
				
            case 'December' :
                $translation = get_option( 'month_name_translation_benaceur_t_Dec' );
                break;
				
            case 'Dec' :
                $translation = $this->optionAbb('dec_t');
                break;
				
        }
 
        return $translation;
    }

}