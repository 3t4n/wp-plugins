<?php 

/**
 *options class
 *
*/

if( !class_exists('WS_AliDo_Option') ):

class WS_AliDo_Option{
	
	var $pluginId;
	var $optionId;
	var $options = array();
	var $keys = array();
	
	function __construct( $pluginID ){
		$this->WS_AliDo_Option( $pluginID );	
	}
	
	function WS_AliDo_Option( $pluginID ){
		$this->pluginId =  $pluginID;
		$this->optionId =  $pluginID . '_options';
		$this->load();
		
	}
	
	private function load(){
		$this->options = get_option( $this->optionId );	
		
	}
	
	//-----------------------------------------------------------------------
	//TOOLS 
	//-----------------------------------------------------------------------

	function get( $key = NULL, $default = '', $is_num = false ){
		//if( empty($this->options) || empty($key) )
			//$this->options = get_option( $this->optionId );
		
		if( empty($key) ){
			return $this->options;	
		}else{
			if( isset($this->options[$key]) ){
				$tmp = intval($this->options[$key]);
				if( $is_num && empty($tmp) )
					return '0';
				else{
					return $this->options[$key];
				}	
			}else{
				$this->options[$key] = $default;	
				return $default;
			}		
		}
			
	}	
	
	function sets( $arr_kv ){
		if( !is_array($arr_kv) ) return;
		$this->options = array_merge( $this->options, $arr_kv );
	}
	                                
	function set( $key, $value ){
		$this->options[$key] = $value;
	}
	
	function update( $options = NULL ){
		empty($options) || $this->options = $options;
		$this->options = stripslashes_deep( $this->options );
		return update_option( $this->optionId, $this->options );
	}
	
	function es( $name, $value ){//echo select
		 if( $this->get($name) == $value)
			echo ' selected="selected" ';	
	}
	
	function delete(){
		delete_option($this->optionId);	
	}
}


endif;

?>