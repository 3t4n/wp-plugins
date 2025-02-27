<?php
class DDSOO_mod_color_picker_ui{	
	public function __construct(){
		$this->colors=[			
			["title"=>"Grape", "code"=>"#8e36aa"],
			["title"=>"Cyan Blue", "code"=>"#4398cf"],
			["title"=>"Strong Cyan", "code"=>"#4d9d92"],
			["title"=>"#ba8831", "code"=>"#ba8831"],
			["title"=>"#a4552a", "code"=>"#a4552a"],
			["title"=>"#5e5e5e", "code"=>"#5e5e5e"],
			["title"=>"#cc3294", "code"=>"#cc3294"],
			["title"=>"#2b71d0", "code"=>"#2b71d0"],

			["title"=>"#4ba231", "code"=>"#4ba231"],
			["title"=>"#df6f30", "code"=>"#df6f30"],
			["title"=>"#ea3a2e", "code"=>"#ea3a2e"],
			["title"=>"#bb2644", "code"=>"#bb2644"],			
			["title"=>"Black", "code"=>"#000000"],
			["title"=>"Grey", "code"=>"#999999"],
			["title"=>"White", "code"=>"#ffffff"],
		];
	}
	public function render(){
		$logo='<div class="--logo"><img src="'.DDSOO_IMG.'logo.png"/></div>';		
		$header=$this->header();
		$content=$this->content();			
		$o='<div class="--color-picker-ui-holder">'.$header.$content.'</div>';
		$o='<div class="--color-picker-ui"><div class="--color-picker-ui-overlay"></div>'.$o.'</div>';
		return $o;
	}
	public function header(){				
		$left='<div class="---left -head-left"><div class="-title"><div class="-title1">Select color for</div><div class="-title3">Background Color</div></div></div>';
		$right='<div class="---right"><div class="--close __btn">Close</div></div>';
		$o='<div class="--color-picker-ui-header -head2">'.$left.$right.'</div>';	
		return $o;
	}
	public function content(){	
		$blocks='<div class="--color-picker-ui-blocks">';
		foreach($this->colors as $c){
			$blocks.=$this->color_block($c);
		}	
		$blocks.='</div>';
		$o='<div class="--color-picker-ui-content">'.$blocks.'</div>';
		return $o;
	}
	public function color_block($c){	
		$c=wp_parse_args($c, ["title"=>"", "code"=>""]); extract($c);	
		$o='<div class="--color-picker-ui-block"  data-code="'.$code.'" data-title="'.$title.'">
			<div class="--color-picker-ui-block-inner" style="background-color:'.$code.';"></div>
		</div>';
		return $o;
	}		
}