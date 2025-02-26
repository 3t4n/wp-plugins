var isopen=false;
jQuery(document).ready(
	function() {
		jQuery("#jh-imgpost").click(  
			function(){ 
				if (isopen){
					jQuery("#jh-pbox").animate( {"bottom":"-300px"},callfunc );
				}
				else{
					callfunc();
					jQuery("#jh-pbox").animate( {"bottom":"10px"});					
				}
			}
		 )
	}
 );
	
	
function callfunc(){		
	if (isopen){		
		jQuery("#jh-imgpost").animate( {"bottom":"10px"} );
		isopen=false;
	}
	else{		
		jQuery("#jh-imgpost").animate( {"bottom":"233px"} );		
		isopen=true;
	}
}

