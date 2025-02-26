<?php

// require_once( plugin_dir_path( __FILE__ ).'../src/brown-paper-tickets-plugin.php');

use BrownPaperTickets\BPTFeed;
use BrownPaperTickets\BPTPlugin;

?>
<h1>
	<img src="<?php echo esc_url( plugins_url( 'public/assets/img/bpt.png', $this->plugin_root() ) )?>">
</h1>

<div class="wrap">
	<div class="welcome-panel">
		<div class="welcome-panel-content">
			<div id="greeting"></div>
			<p class="about-description">Please be aware that this plugin is no longer actively supported by Brown Paper Tickets.</p>
			<p class="about-description">While this plugin continues to work well for many users, you may encounter errors and bugs. All usage is as-is, at your own risk.</p>
		</div>
	</div>
</div>

<script type="text/ractive" id="bpt-welcome-panel-template">
	{{ #account }}
	<h2>Hi, {{ firstName }}</h2><h3>Thanks for using Brown Paper Tickets.</h3>
	{{ /account}}
	{{ ^account }}
	<h2>Thanks for using Brown Paper Tickets.</h2>
	{{ /account }}
	<div class="bpt-status-box">

	</div>
	{{ #request }}
		{{ #message }}
			<div class="bpt-message-box">
				<p class="{{ result === false ? 'bpt-error-message' : 'bpt-success-message' }} ">{{ message }} </p>
			</div>
		{{ /message}}
	{{ /request }}
</script>
