<div class="wrap">
	<h2>PANNELLO DI CONTROLLO</h2>
	<form method="post" action="">
	<?php $options = get_option('addphp_settingPage'); ?>
	<div class="metabox-holder">
		<div class="postbox"><h3>Tutorial</h3>
			<div class="inside" style="padding:0px 15px 0px 15px;">
				<p>Inserire il codice PHP tra i tag addPhp:</p>
				<p><b>[addPhp] echo "Stampo codice PHP"; [/addPhp]</b></p>
			</div>
		</div>
		<div class="postbox">
			<h3><?php _e("Opzioni Generali", 'addphp_settingPage'); ?></h3>
		 	<div class="inside" style="padding:0px 15px 0px 15px;">	
				<p></p>
				<p>
					<?php _e("Attivare PHP", 'addphp_settingPage'); ?>
					<select name="addphp_settingPage[status]">
   					 	<option value="1" <?php selected( $options['status'], 1 ); ?>>SI</option>
    				 	<option value="0" <?php selected( $options['status'], 0 ); ?>>NO</option>
					</select>
					</p>
			 	<input type="hidden" name="addphp_settingPage[update]" value="UPDATED" />
                <p><input type="submit" class="button-primary" value="<?php _e('Salva') ?>" /></p>
			</div>
		</div>
	</div>
</div>