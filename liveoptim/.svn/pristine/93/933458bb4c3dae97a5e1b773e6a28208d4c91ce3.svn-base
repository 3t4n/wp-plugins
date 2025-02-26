<?php

/**
 *
 * LiveOptim - Optimize the content of your articles and automatically tickets to easily improve your position in the results of search engines: Google, Baidu, Yandex, Bing ... 
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.htm
 * Copyright (C) 2012 Erwan MILBEO — All rights reserved
 * For more information see the README
 * Any question will find answer on  
 * [support@liveoptim.com](mailto:support@liveoptim.com)
 * our Timelines : [US-EN](https://twitter.com/LiveOptim_US) | [FR](https://twitter.com/LiveOptim_FR) | [ES](https://twitter.com/LiveOptim_ES)
 *
*/

?>
<?php 
require dirname(__FILE__).'/../lib/helper.php';


// ajout du css
wp_register_style( 'liveoptim-style', plugins_url('/style.css', __FILE__) );
wp_enqueue_style( 'liveoptim-style' );

// ajout du js
wp_register_script( 'liveoptim-script', plugins_url('/script.js', __FILE__) );
wp_enqueue_script( 'liveoptim-script' );
?>


<?php if ( $this->is_file_get_contents_disable ) { ?>
	<div style="background:none repeat scroll 0 0 #FF4040;color:white;display:block;margin:10px 0;padding:5px;text-align:center;width:800px;">
		The <em>file_get_contents ()</em> PHP function is disabled in the server configuration : <strong>allow_url_fopen=0</strong><br />
		You need to activate this function in order to run LiveOptim.
	</div>
<?php } ?>

<div class="wrap">

	
	<?php include dirname(__FILE__).'/'.$this->template; ?>
</div>