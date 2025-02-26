<?php

function admonpedidosservientrega_generaCiudades(){
include  plugin_dir_path(__DIR__ ) . 'arrays/pluginexterno/places/CO.php';
//$html.='<option value="'.$ciudad.'" >'.$ciudad.'</option>';


?>
<option value="" selected>Selecciona</option>
<?php	foreach($places['CO'][$_POST["elegido"]] as $ciudad)
	{ ?>
		
		<option value="<?php echo esc_html($ciudad) ?>" ><?php echo esc_html($ciudad) ?></option>
		 
		 
		
	
	<?php
	}
}	

	
	