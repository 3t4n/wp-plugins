<?php
class DDSOO_mod_generate{
	public function __construct(){
		
	}
	public function run(){	
		require_once(DDSOO_plugin_path."data/dd-data.php");
		$data=new DDSOO_data();
		$props=$data->properties();
		$o=[];
		if($props){
			foreach($props as $p){	
				$v=	$this->prop($p);	
				if($v) $o[]=$v;
			}
		}
		$o[]='urlParams: {utm_medium: "wp_plugin"}';
		$o='{'.implode(', ',$o).'}';
		return $o;
	}
	public function prop($p){
		$p=wp_parse_args($p, $data->default);
		extract($p);	
		$value = get_option('DDSOO_'.$name);
		$publish = get_option('DDSOO_'.$name.'_publish');
		$publish=true; 
		if(!$mandatory && !$publish) return false;		
		if(!is_numeric($value)) {
			if($json){

			}else{
				$value='"'.$value.'"';
			}			
		}
		if(!$value) return false;
		$o=$name.':'.$value.'';
		return $o;
	}	
}