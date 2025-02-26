<div class="wrap">
	<h1><?php _e("How to set up Event Tracking", $this->k->domain ); ?></h1>
	
	<h2><?php _e("Installation of StatPress", $this->k->domain ); ?></h2>
	<p><?php _e("install the StatPress at plug-in new search", $this->k->domain ); ?></p>
	
	<h2><?php _e("Specifying the id name", $this->k->domain ); ?></h2>
	<p>
	<?php _e("id name enclosed in a tag that begin with 'dlc_'", $this->k->domain ); ?>
	
	</p>
	<h3><?php _e("Example", $this->k->domain ); ?></h3>
	<pre>
	&lt;a id="dlc_123"&gt;0120-000-000&lt;/a&gt;
	</pre>
	
	<h2><?php _e("Measurement information", $this->k->domain ); ?></h2>
	<p><?php _e("Check the place that has been recorded in the beginning id from '/_dlc_' that you specified above in A tag to Page items in StatPress", $this->k->domain ); ?></p>
	
	<h2><?php _e("Measurement Results(recent 10)", $this->k->domain ); ?></h2>
	<?php
	foreach( $res as $row ):
	?>
	<?php echo date( "Y-m-d H:i:s", $row->timestamp ); ?>　<?php echo $row->urlrequested; ?><br />
	<?php
	endforeach;
	?>

</div>