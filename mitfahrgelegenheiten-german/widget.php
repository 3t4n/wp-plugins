<?php
/*
Plugin Name: MiFaZ-Carpooling
Plugin URI: http://www.jast-it.de/wordpress-plugin/
Description: Widget, welches Startort- und Zielort Eingabefelder anzeigt, um nach Mitfahrgelegenheiten zu suchen. Start- und/oder Zielort können vorgegeben werden  
Author: Inna Janssen und Stefan Strobl
Version: 0.9
License: GPL
Author URI: http://www.jast-it.de
Min WP Version: 3.0
Max WP Version: 3.2

TODO Datum Eingabefeld anbieten
*/

/*
 * TODO browserinterne vorschlagsliste deaktivieren
 */
class Mifaz_Widget extends WP_Widget
{

public static $desc = 'Ergänzt Startort- und Zielort-Felder zur Abfrage von Mitfahrgelegenheiten. Wahlweise können einer oder beide Orte bereits vorgegeben werden.';
public static $buttonLabel = 'Anfrage senden';
public static $startLabel = 'Startort:';
public static $destLabel = 'Zielort:';
public static $defaulTitle = 'Suche nach Mitfahrgelegenheiten';

function Mifaz_Widget()
{
  require_once 'MiFaZWidgetForm.php';
  require_once 'MiFaZWidgetFrontend.php';
  $widget_ops = array('classname' => 'mifazcl', 'description' => __(Mifaz_Widget::$desc));
  $this->WP_Widget(false, __('MiFaZ'), $widget_ops);
}

/**
 * Hier wird das Widget ausgegeben
 * @param unknown_type $args
 * @param unknown_type $instance
 */
function widget($args, $instance)
{
  MiFaZWidgetFrontend::displayFrontend($args,$instance);
}

function update($new_instance, $old_instance)
{
  $instance = $old_instance;
  $instance ['startloc'] = strip_tags($new_instance ['startloc']);
  $instance ['startlocValue'] = strip_tags($new_instance ['startlocValue']);
  $instance ['destloc'] = strip_tags($new_instance ['destloc']);
  $instance ['destlocValue'] = strip_tags($new_instance ['destlocValue']);
  $instance ['title'] = strip_tags($new_instance ['title']);
  return $instance;
}

function form($instance)
{
  MiFaZWidgetForm::displayForm($instance,$this);
}

}

add_action('widgets_init', create_function('', 'return register_widget("Mifaz_Widget");'));
?>