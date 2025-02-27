<?php
class DDSOO_mod_properties{	
	public function __construct(){
		$data=new DDSOO_data();
		$this->properties=$data->properties();
		
	}  
	
	public function advanced_settings(){
		//$advanced_input = get_option('DDSOO_advanced_input');
		$advanced_input = 0;			
		$o='<div class="--advanced-settings">';
			if($advanced_input){
				$c1='-hidden'; $c2='';
			}else{
				$c1=''; $c2='-hidden';
			}
			$o.='<a  class="--advanced-settings-view-btn __btn '.$c1.'" style="">View Advanced Settings</a>';
			$o.='<a  class="--advanced-settings-hide-btn __btn '.$c2.'" style="">Hide Advanced Settings</a>';
		$o.='</div>';		
		return $o;
	}
	public function left(){	
		$left='<div class="---left"><div class="-title"><div class="-title1">Storefront Online Ordering</div><div class="-title2">Button Settings</div><div class="-sub-title">Ensure your button links to the correct business, and customize the look and feel of your button.</div></div></div>';
		$right='<div class="---right"><div class="--addremove __btn  -lg-hidden">Add/Remove</div></div>';
		$right='';
		$o='<div class="-head">'.$left.$right.'</div>';	
		return $o;
	}
	public function right(){
		return '';		
		$title='<div class="-title"><div class="-title1">Add or Remove </div><div class="-title2">Properties</div></div>';	
		$left='<div class="---left">'.$title.'</div>';
		$right='<div class="---right"><div class="--close __btn -lg-hidden">Close</div></div>';	
		$head='<div class="-head">'.$left.$right.'</div>';
		$o='<div class="DDSOO_settings_properties -hidden -lg-block">'.$head.$this->properties().'</div>';
		return $o;
	}
	public function properties(){
		$o='';
		foreach($this->properties as $p){
			$o.=$this->property($p);
		}
		$o='<div  class="--props -shadow-md" style="">'.$o.'</div>';		
		return $o;
	}
	public function property($p=[]){
		$p=wp_parse_args($p, $d->default);
		extract($p);
		$value = get_option("DDSOO_".$name.'_publish');	
		if($value) $publish=true;
		
		if($mandatory){
			$action='<div class="--prop-mandatory -link-display-sm">Mandatory <br>Can\'t remove</div>';
		}else{
			if($publish){
				$class='--published'; $data_publish=true;
			}else{
				$class=''; $data_publish=false;		
			}	
			$action='<div class="--prop-remove -link-sm transition">Remove</div><div class="--prop-add -btn-sm transition">Add</div>';		
		}
		$o='<div class="--prop '.$class.'" data-name="'.$name.'" data-publish="'.$data_publish.'">';		
			$o.='<div class="--prop-title">'.$title.'</div>';
			$o.='<div class="--prop-action">'.$action.'</div>';		
		$o.='</div>';
		return $o;
	}
}