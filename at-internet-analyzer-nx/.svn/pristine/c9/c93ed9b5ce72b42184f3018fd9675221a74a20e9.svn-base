<?php
// Global variables
$xtsd = get_option('xtsd_value');
$xtsite = get_option('xtsite_value');
$xtdmc = get_option('xtdmc_value');
$xtdir = get_bloginfo('wpurl').'/wp-content/plugins/';
function xt_tag($n2,$page,$di){
	global $xtsd;
	global $xtsite;
	global $xtdmc;
	echo '
		<script type="text/javascript">
		<!--
		xtnv = document;         //parent.document or top.document or document         
		xtsd = "'.$xtsd.'";
		xtsite = "'.$xtsite.'";
		xtn2 = "'.$n2.'";        //level 2 site 
		xtpage = "'.$page.'";    //page name (with the use of :: to create chapters)
		xtdi = "'.$di.'";        //implication degree
		xtdmc = "'.$xtdmc.'";
		//-->
		</script>';
}
function xt_core(){
	global $xtdir;	
	echo '
	<script type="text/javascript" src="'.$xtdir.'at-internet-analyzer-nx/js/xtcore.js"></script>';
}
function xt_clicks(){
	global $xtdir;
	echo '
	<script type="text/javascript" language="javascript" src="'.$xtdir.'at-internet-analyzer-nx/js/xtclicks.js"></script>';
}
function xt_noscript($n2,$page,$di){
	global $xtsd;
	global $xtsite;
	echo '
		<noscript>
		<img width="1" height="1" alt="" src="'.$xtsd.'.xiti.com/hit.xiti?s='.$xtsite.'&s2='.$n2.'&p='.$page.'&di='.$di.'&" >
		</noscript>';
}
// Echoes the complete Tag with ClickZone analysis.
function xt_all($n2,$page,$di){
	xt_tag($n2,$page,$di);
	xt_clicks();
	xt_core();
	xt_noscript($n2,$page,$di);	
}
// Echoes the basic Tag.
function xt_basic($n2,$page,$di){
	xt_tag($n2,$page,$di);
	xt_core();
	xt_noscript($n2,$page,$di);
}
// Main function.
function xt_print() {
	$ergo='';
	$xtn2='';
	$xtpage='';		
	// Home.	
	if(is_home()){	
		$xtpage='homepage::homepage';	
		$ergo='homepage_ergo';		
	}	
	else{ 					
		$xtpage=sanitize_title(wp_title('',FALSE));
		// Static pages.	
		if(is_page()){
			$xtpage='static_page::'.$xtpage;	
			$ergo='pages_ergo';		
		}
		// Blog entries.
		else{ 
			$ergo='posts_ergo';	
			//Belongs to only one category.
			if((count(get_the_category())==1)&&(is_single())){								
				$cat=get_the_category();
				$catName=$cat[0]->cat_name;				
				$xtpage='posts_blogs::'.sanitize_title($catName).'::'.$xtpage;
			}				
			else{												
				$xtpage='posts_blogs::'.$xtpage;
			}
		}
	}	
	if(get_option($ergo))
		xt_all($xtn2,$xtpage,'');		
	else
		xt_basic($xtn2,$xtpage,'');		
}
?>