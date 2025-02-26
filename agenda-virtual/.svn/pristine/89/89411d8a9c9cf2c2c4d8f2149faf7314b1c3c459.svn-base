<?php
/*
Plugin Name: Agenda Virtual
Plugin URI: https://agendavirtual.net/plugin
Description: O plugin Agenda Virtual para WordPress permite que os clientes agendem compromissos por meio de um botão flutuante no site do seu negócio. A ferramenta oferece uma experiência de agendamento online fácil e conveniente para clientes e empresas.
Version: 1.03
Author: Agenda Virtual
Author URI: https://agendavirtual.net
License: GPL2
*/

// Carrega o script JavaScript
function plugin_agenda_virtual() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'agenda_virtual';
    $url = $wpdb->get_var("SELECT Data FROM $table_name WHERE Features = 'URL'");
    $visible = $wpdb->get_var("SELECT Data FROM $table_name WHERE Features = 'visible'");
    $cor = $wpdb->get_var("SELECT Data FROM $table_name WHERE Features = 'Cor'");
    $position_button = $wpdb->get_var("SELECT Data FROM $table_name WHERE Features = 'position'");

    wp_register_script('agenda-virtual-script', plugin_dir_url(__FILE__) . 'js/agenda-virtual-script.js', array(), '2', true);

    $data = array('url' => $url);
    $dataview = array('visible' => $visible);
    $dataposition = array('position' => $position_button);
    $datacor = array('cor' => $cor);

    wp_add_inline_script('agenda-virtual-script', 'var agendaVirtualData = ' . wp_json_encode($data) . ';', 'before');
    wp_add_inline_script('agenda-virtual-script', 'var agendaVirtualVisible = ' . wp_json_encode($dataview) . ';', 'before');
    wp_add_inline_script('agenda-virtual-script', 'var agendaVirtualDataPosition = ' . wp_json_encode($dataposition) . ';', 'before');
    wp_add_inline_script('agenda-virtual-script', 'var agendaVirtualDataCor = ' . wp_json_encode($datacor) . ';', 'before');

    wp_add_inline_script('agenda-virtual-script', file_get_contents(plugin_dir_path(__FILE__) . 'js/agenda-virtual-script.js'), 'after');

    wp_register_style('agenda-virtual-style', plugin_dir_url(__FILE__) . 'css/agenda-virtual.css');
    wp_add_inline_style('agenda-virtual-style', file_get_contents(plugin_dir_path(__FILE__) . 'css/agenda-virtual.css'));

    wp_enqueue_script('agenda-virtual-script');
    wp_enqueue_style('agenda-virtual-style');
}
add_action('wp_enqueue_scripts', 'plugin_agenda_virtual');


//Area adminsitrativa do Plugin
function agenda_virtual_admin_menu() {
	wp_enqueue_style( 'agenda-virtual-style', plugin_dir_url( __FILE__ ) . 'css/admin-agenda-virtual.css' );
	add_menu_page(
		'Agenda Virtual',
		'Agenda Virtual',
		'manage_options',
		'agenda-virtual-admin',
		'agenda_virtual_admin_page'
	);
}
add_action( 'admin_menu', 'agenda_virtual_admin_menu' );

function agenda_virtual_admin_page() {
	include( plugin_dir_path( __FILE__ ) . 'admin.php' );
}

add_action('wp_ajax_update_visible', 'agenda_virtual_update_visible');
add_action('wp_ajax_nopriv_update_visible', 'agenda_virtual_update_visible');

function agenda_virtual_update_visible() {
  global $wpdb;

  $table_name = $wpdb->prefix . 'agenda_virtual';

  $visible = sanitize_text_field($_POST['visible']);

  $visible_result = $wpdb->get_results("SELECT * FROM $table_name WHERE Features = 'visible'");
  if (count($visible_result) > 0) {
    $wpdb->update($table_name, array('Data' => $visible), array('Features' => 'visible'));
  } else {
    $wpdb->insert($table_name, array('Features' => 'visible', 'Data' => $visible));
  }

  wp_die();
}

?>
