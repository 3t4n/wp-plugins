<?php
/*
Plugin Name: Agenda DoveBalliamo.com
Description: Abilita lo shortcode per includere il plugin Agenda di DoveBalliamo.com nel proprio sito Wordpress
Version: 1.0
Author: DoveBalliamo.com
Author URI: http://doveballiamo.com
License: GPL2
*/

function agenda_doveballiamo($atts) {
	if(isset($atts['id']) && is_numeric($atts['id'])) {
		return "
			<!-- PLUGIN AGENDA ♫ DoveBalliamo.com -->
			<div id=\"__plugin_agenda__\"></div>
			<script src=\"//doveballiamo.com/agenda/js/{$atts['id']}\" type=\"text/javascript\"></script>
			<!-- PLUGIN AGENDA - fine -->
		";
	}
	return '';
}
add_shortcode( 'agenda_doveballiamo', 'agenda_doveballiamo' );

function agenda_db_attivazione() {
	update_option( 'agenda_db_installato', 1 );
}
register_activation_hook( __FILE__, 'agenda_db_attivazione' );

function agenda_db_notifica(){
	if ( current_user_can( 'install_plugins' ) && get_option( 'agenda_db_installato' ) ) {
		echo '<div class="updated"><p>Grazie per aver installato il plugin <strong>Agenda di <a href="//doveballiamo.com">DoveBalliamo.com</a></strong> ♫</p></div>';
		delete_option( 'agenda_db_installato' );
	}
}
add_action('admin_notices', 'agenda_db_notifica');
