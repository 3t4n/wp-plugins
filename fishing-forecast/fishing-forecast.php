<?php
/*
Plugin Name: Fishing Forecast
Plugin URI: http://preweather.com
Description: Find out the best time to fish, high fish activity and where the fish are biting.
Version: 1.0
Author: preweather.com
Author URI: http://preweather.com
*/

/*  Copyright 2014 preweather.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Do not load directly
if (!function_exists('is_admin')) {
  header('Status: 403 Forbidden');
  header('HTTP/1.1 403 Forbidden');
  exit();
}

if (!class_exists('fishingForecast')) {
class fishingForecast extends WP_Widget {
  private $widgetData = array(
    'Name'        => 'fishingForecast',
    'Title'       => 'Fishing Forecast',
    'Description' => 'Find out the best time to fish, high fish activity and where the fish are biting.',
  );

  private $widgetFormData = array(
    'Title'           => 'Fishing Forecast',
    'CityID'          => ''
  );

  public function fishingForecast() {
    fishingForecast::__construct();
  }

  public function __construct() {

    $widget_options = array(
      'classname'   => $this->widgetData['Name'],
      'description' => __($this->widgetData['Description'])
    );
    $control_options = array();
    $this->WP_Widget($this->widgetData['Name'], __($this->widgetData['Title']), $widget_options, $control_options);
  }

  /**
   * form
   *
   * @see WP_Widget::form()
   */
public function form($instance) {
  /**
   * form defaults
   *
   * @var array
   */
  $instance = wp_parse_args((array)$instance, $this->widgetData);

// title
    echo '<label for="' . $this->get_field_id('Title') . '">' . __('Title:') . '</label>';
    echo '<p><input id="' . $this->get_field_id('Title') . '" name="' . $this->get_field_name('Title') . '" type="text" value="' . $instance['Title'] . '" /></p>';
    echo '<p style="clear:both;"></p>';

    // City ID
    echo '<label for="' . $this->get_field_id('CityID') . '">' . __('City ID:') . '</label>';
    echo '<p><input id="' . $this->get_field_id('CityID') . '" name="' . $this->get_field_name('CityID') . '" type="text" value="' . $instance['CityID'] . '" /></p>';
    echo '<p style="clear:both;"></p>'; 
  }

  /**
   * save settings to db
   *
   * @see WP_Widget::update()
   */
  public function update($new_instance, $old_instance) {
    $instance = $old_instance;

    /**
     * defaults
     *
     * @var array
     */
    $new_instance = wp_parse_args((array)$new_instance, $this->widgetFormData);

    foreach ($this->widgetFormData as $key => $keyData) {
      $instance[$key] = (string)strip_tags($new_instance[$key]);
    }
    return $instance;
  }

  /**
   * Widget frontend
   *
   * @see WP_Widget::widget()
   */
  public function widget($args, $instance) {
    extract($args);

    echo $before_widget;

    $title = (empty($instance['Title'])) ? '' : apply_filters('my_widget_title', $instance['Title']);

    if (!empty($title)) {
      echo $before_title . $title . $after_title;
    }

    echo $this->ff_widget_html_output($instance);
    echo $after_widget;
  }

  /**
   * Widget output
   *
   * @param array $args
   */
  private function ff_widget_html_output($args = array()) {
    /**
     * guess what: output
     */
    
    $widgetHTML = '<a href="http://preweather.com/fishing-forecast/?p=' . $args['CityID'] . '" title="More about fishing forecast"><img src="http://preweather.com/fishing-forecast/widget.php?c=' . $args['CityID'] . '" alt="Fishing forecast" /></a>
                    ';
    
    return $widgetHTML;
  } // private function ff_widget_html_output($args = array())
}

  /**
   * widget initialization
   */
  add_action('widgets_init', create_function('', 'return register_widget("fishingForecast");'));
}