<?php

/**
  Plugin Name: Aneleira Virtual
  Plugin URI: http://blog.poesie.com.br/aneleira-virtual/
  Description: Este plugin possibilita que o visitante do seu site descubra de maneira simples e precisa a medida de aro de anel.
  Version: 1.0.8
  Author: Gestão Ativa, luiz.simples
  Author URI: http://gestaoativa.com.br
 */

add_action('init', 'aneleira_virtual_load_widget', 1);

function aneleira_virtual_load_widget()
{
  $plugin_url = (is_ssl()) ? str_replace('http://', 'https://', WP_PLUGIN_URL) : WP_PLUGIN_URL;

  // CSS
  $aneleira_virtual_css = $plugin_url . '/aneleira-virtual/css/aneleira-virtual.css';
  wp_register_style('aneleira-virtual-css', $aneleira_virtual_css);

  $fancy_box_css = $plugin_url . '/aneleira-virtual/js/fancybox/jquery.fancybox-1.3.4.css';
  wp_register_style('fancy_box_css', $fancy_box_css);

  wp_enqueue_style('fancy_box_css');
  wp_enqueue_style('aneleira-virtual-css');

  // Scripts
  $fancy_box = $plugin_url . '/aneleira-virtual/js/fancybox/jquery.fancybox-1.3.4.js';
  wp_register_script('fancybox', $fancy_box);

  $aneleira_virtual_js = $plugin_url . '/aneleira-virtual/js/aneleira-virtual.js';
  wp_register_script('aneleira-virtual-js', $aneleira_virtual_js);

  wp_enqueue_script('jquery');
  wp_enqueue_script('fancybox');
  wp_enqueue_script('aneleira-virtual-js');

  register_widget('aneleira_virtual_widget');
}

class aneleira_virtual_widget extends WP_Widget
{
  function aneleira_virtual_widget()
  {
    $widget_ops = array();
    $widget_ops['classname']   = __CLASS__;
    $widget_ops['description'] = 'Com esse plugin será fácil descobrir a numeração do seu Anel de noivado/casamento/namoro etc...';

    $control_ops = array();
    $control_ops['id_base'] = __CLASS__;

    $this->WP_Widget(__CLASS__, 'Aneleira Virtual', $widget_ops, $control_ops);
  }

  //Imprime na tela o Widget
  function widget($args, $instance)
  {
    extract($args);

    $arquivo = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'aneleira-virtual.phtml';
    $plugin_url = (is_ssl()) ? str_replace('http://', 'https://', WP_PLUGIN_URL) : WP_PLUGIN_URL;
    $plugin_url_img .= $plugin_url . '/aneleira-virtual/img/aneleira-virtual.png';

    echo $before_widget;

    include_once $arquivo;

    echo $after_widget;
  }
}
