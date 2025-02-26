<?php


	
	function admonpedidosservientrega_dptoOptions($codDpto){
		$dptos  = array (
	'AMA'=>'AMAZONAS',
	'ANT'=>'ANTIOQUIA',
	'ARA'=>'ARAUCA',
	'ATL'=>'ATLANTICO',
	'BOL'=>'BOLIVAR',
	'BOY'=>'BOYACA',
	'CAL'=>'CALDAS',
	'CAQ'=>'CAQUETA',
	'CAS'=>'CASANARE',
	'CAU'=>'CAUCA',
	'CES'=>'CESAR',
	'CHO'=>'CHOCO',
	'COR'=>'CORDOBA',
	'CUN'=>'CUNDINAMARCA',
	'GUV'=>'GUAVIARE',
	'HUI'=>'HUILA',
	'LAG'=>'LA GUAJIRA',
	'MAG'=>'MAGDALENA',
	'MET'=>'META',
	'NAR'=>'NARIÑO',
	'NSA'=>'NORTE DE SANTANDER',
	'PUT'=>'PUTUMAYO',
	'QUI'=>'QUINDIO',
	'RIS'=>'RISARALDA',
	'SAN'=>'SANTANDER',
	'SUC'=>'SUCRE',
	'TOL'=>'TOLIMA',
	'VAC'=>'VALLE',
	'VAU'=>'VAUPES',
	'VID'=>'VICHADA'
	);
	
		foreach($dptos as $codigo=>$nombre)
		{
		 $selected=$codigo==$codDpto ? 'selected':''; ?>
		 <option value='<?php echo esc_attr($codigo);?>' <?php echo esc_attr($selected);?>> <?php echo esc_html($nombre);?> </option>
		
	<?php	}
		
	
	}