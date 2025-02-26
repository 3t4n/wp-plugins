jQuery(document).ready(function(){
	
	if (!/android|iphone|ipad|ipod|blackberry|iemobile/i.test(navigator.userAgent)) {
    
        $tgd(".ePaper").color1000box({
        	iframe:true, 
        	width:"80%", 
        	height:"90%"
     	});

    }
});