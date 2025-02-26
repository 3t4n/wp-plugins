jQuery(document).ready(function($) {
	$('#nsSimLoader').introLoader({
	    animation: {
	        name: '<?php if (isset($_GET['ns_disp_dim_load']) AND $_GET['ns_disp_dim_load'] != '') { echo $_GET['ns_disp_dim_load']; } else { echo 'gifLoader'; }?>',
	        options: {
	            exitFx:'fadeOut',
	            ease: 'linear',
	            style: '<?php if (isset($_GET['ns_disp_style']) AND $_GET['ns_disp_style'] != '') { echo $_GET['ns_disp_style']; } else { echo 'light'; }?>',
	            delayBefore: 500, //delay time in milliseconds
				loaderText: '<?php if (isset($_GET['ns_loader_text']) AND $_GET['ns_loader_text'] != '') { echo $_GET['ns_loader_text']; } else { echo 'Website is ready!1'; }?>',
	            exitTime: 300,
				lettersDelayTime: 0
	        }
	    },    

	    spinJs: {}
	    
	});   
});