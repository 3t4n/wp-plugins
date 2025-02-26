<?php

function cabrero_activar_cron() {
wp_schedule_event( time(), 'daily', 'hook_cron_mc' ); // 'porminuto' para comprobar cada minuto o por intervalo
}

function cabrero_desactivar_cron() {
wp_clear_scheduled_hook( 'hook_cron_mc' );
}

add_action( 'hook_cron_mc', 'cabrero_mail_cron' );
function cabrero_mail_cron() {
	$activo=get_option('form_activo');
	$primera = date('d/m/Y');// Fecha de hoy
	$url = get_site_url();
	$email = get_option( 'form_email' );
	
	for ($i=1;$i<=10;$i++){
	query_posts('cat='.$i.'&showposts=1');// Consulta los datos de 1 post de la categoria especificada	
	while (have_posts()) : the_post();
	$fecha_post=get_the_date('d/m/Y');
	$segunda = $fecha_post;
	$dias_antiguedad=compararFechas($primera,$segunda);
	$dias_aviso=get_option('form_dias');
	
	// Función de envío del mensaje
	if ( ($activo == true) && ($dias_aviso == $dias_antiguedad) ){		
		$permalink=get_the_permalink();
		$titulo_post=get_the_title();
		$link_post="<a href='".$permalink."'>".$titulo_post."</a>";		
		// Mensaje del email:
		$mensaje = "";
		$mensaje .= "<font face='verdana' size='2'>Hola "._e($email).",<br/><br/>Este es un aviso desde "._e($url)."<br/><br/>Simplemente te molestamos para avisarte de que hace tiempo que no escribes ninguna entrada en la categoría <b>"._e(get_cat_name($i))."</b>, la última entrada que escribiste fue "._e($link_post)." el <b>"._e($fecha_post)."</b> hace <b>"._e($dias_antiguedad)."</b> días.<br/><br/>Si has recibido este mensaje por error, por favor contacta con el <a href='mailto:"._e($admin_email)."'>administrador</a> del sitio.<br/><br/>";
		mail($email,"Hace tiempo que no escribes",$mensaje,$header);
	}
	endwhile;
	wp_reset_query();
};
};

?>