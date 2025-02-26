<?php
/**
 * @package AviaSales cheap flights
 */
/*
Plugin Name: AviaSales поиск авиабилетов
Plugin URI: http://www.aviasales.ru/
Description: Плагин поиска дешевых авиабилетов от AviaSales.ru. Дайте возможность своим посетителям искать дешёвые авиабилеты прямо у Вас на сайте и зарабатывайте с проданных авиабилетов от 50 до 70% дохода aviasales.ru.
Version: 2.0.4
Author: aviasales.ru
Author URI: http://www.aviasales.ru/
License: GPLv2 or later
*/

// if called directly
if (!function_exists('add_action')) {
	echo "Shoooosh!!1";
	exit;
}

class Aviasales extends WP_Widget
{

	protected	$aviasales_lang				= array();
	
	public function Aviasales()
	{
		
		parent::__construct('aviasales', 'AviaSales поиск авиабилетов', array(
			'classname'			=> 'aviasales', 
			'description'		=> 'Plugin for flight search through your website'
		), array(
			'id_base'			=> 'aviasales'
		));

		$this->aviasales_lang = include plugin_dir_path(__FILE__) . 'language.php';

	}

	protected function aviasales_translate($instance, $key, $lang = null)
	{

		$lang = $lang ? $lang : $instance['widget_lang'];
		
		return isset($this->aviasales_lang['widget'][$lang][$key]) ? $this->aviasales_lang['widget'][$lang][$key] : '';

	}
	
	protected function aviasales_translate_admin($key)
	{

		$lang = 'ru_RU' == get_locale() ? 'ru' : 'en';

		return isset($this->aviasales_lang['admin'][$lang][$key]) ? $this->aviasales_lang['admin'][$lang][$key] : $key;

	}
	
	public function form($instance)
	{
		
		if (!is_readable(plugin_dir_path(__FILE__) . 'params.php'))
			return ;
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-effects-slide');
		
		wp_enqueue_script('jquery-minicolors-script', plugins_url('assets/minicolors/jquery.minicolors.js', __FILE__));
		wp_enqueue_style('jquery-minicolors-style', plugins_url('assets/minicolors/jquery.minicolors.css', __FILE__));
		
		wp_enqueue_script('aviasales-admin-script', plugins_url('assets/aviasales_admin.js', __FILE__));
		wp_enqueue_style('aviasales-admin-style', plugins_url('assets/aviasales_admin.css', __FILE__));

		$instance = $this->aviasales_validate($instance);

		$validate = $this->form_validate($instance);
		
		include plugin_dir_path(__FILE__) . 'params.php';
		
	}
	
	private function form_validate($instance)
	{
		
		return array(
			'affiliate_id'				=> (isset($instance['affiliate_id']) && (int)$instance['affiliate_id'] ? true : false),
			'widget_lang'				=> true,
			'show_logo'					=> true,
			'widget_title'				=> true,
			'title_color'				=> ((!isset($instance['title_color'])		|| !trim($instance['title_color']))			|| preg_match('/^\#([0-9a-f]{3}|[0-9a-f]{6})$/i', trim($instance['title_color']))								? true : false),
			'background_color'			=> ((!isset($instance['background_color'])	|| !trim($instance['background_color']))	|| preg_match('/^\#([0-9a-f]{3}|[0-9a-f]{6})$/i', trim($instance['background_color']))							? true : false),
			'border_color'				=> ((!isset($instance['border_color'])		|| !trim($instance['border_color']))		|| preg_match('/^\#([0-9a-f]{3}|[0-9a-f]{6})$/i', trim($instance['border_color']))								? true : false),
			'text_color'				=> ((!isset($instance['text_color'])		|| !trim($instance['text_color']))			|| preg_match('/^\#([0-9a-f]{3}|[0-9a-f]{6})$/i', trim($instance['text_color']))								? true : false),
			'white_label'				=> ((!isset($instance['white_label'])		|| !trim($instance['white_label']))			|| preg_match('/^[\.\_\-\d\p{L}]+$/iu', trim($instance['white_label']))											? true : false),
			'show_hotels'				=> true,
			'currency'					=> true
		); 
		
	}

	private function aviasales_validate($instance)
	{

		// first time
		if (!$instance) {
			
			$instance['widget_lang']		= ('ru_RU' == get_locale() ? 'ru' : ('de_DE' == get_locale() ? 'de' : 'en'));
			$instance['show_logo']			= 'on';
			
			return $instance;
			
		}

		if ($this->aviasales_value($instance, 'title_color') && preg_match('/^([0-9a-f]{3}|[0-9a-f]{6})$/i', trim($this->aviasales_value($instance, 'title_color'))))
			$instance['title_color'] = '#' . trim($this->aviasales_value($instance, 'title_color'));

		if ($this->aviasales_value($instance, 'background_color') && preg_match('/^([0-9a-f]{3}|[0-9a-f]{6})$/i', trim($this->aviasales_value($instance, 'background_color'))))
			$instance['background_color'] = '#' . trim($this->aviasales_value($instance, 'background_color'));

		if ($this->aviasales_value($instance, 'border_color') && preg_match('/^([0-9a-f]{3}|[0-9a-f]{6})$/i', trim($this->aviasales_value($instance, 'border_color'))))
			$instance['border_color'] = '#' . trim($this->aviasales_value($instance, 'border_color'));

		if ($this->aviasales_value($instance, 'text_color') && preg_match('/^([0-9a-f]{3}|[0-9a-f]{6})$/i', trim($this->aviasales_value($instance, 'text_color'))))
			$instance['text_color'] = '#' . trim($this->aviasales_value($instance, 'text_color'));

		if ($this->aviasales_value($instance, 'white_label') && preg_match('/^http:\/\//i', trim($this->aviasales_value($instance, 'white_label'))))
			$instance['white_label'] = preg_replace('/^http:\/\//i', '', trim($this->aviasales_value($instance, 'white_label')));

		return $instance;

	}

	public function update($new_instance, $old_instance)
	{

		$new_instance = $this->aviasales_validate($new_instance);

		return $new_instance;

	}

	public function widget($args, $instance)
	{

		if (!$this->aviasales_value($instance, 'affiliate_id')) {
			echo "\n\n<!-- Aviasales widget error: need affiliate id! -->\n\n";
			return ;
		}

		$intance = $this->check_values($instance);

        wp_enqueue_style('aviasales-font', 'http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic');
		wp_enqueue_style('aviasales-ui', plugins_url('assets/jquery.ui.all.min.css', __FILE__));
		wp_enqueue_style('aviasales-common', plugins_url('assets/aviasales.css', __FILE__));
		
		wp_enqueue_script('jquery');

		wp_enqueue_script('aviasales-jquery-ui', 'http://yandex.st/jquery-ui/1.8.16/jquery-ui.min.js');

		wp_enqueue_script('aviasales-pure', plugins_url('assets/pure_min.js', __FILE__)/*, array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'jquery-ui-autocomplete')*/);
		wp_enqueue_script('aviasales-underscore', plugins_url('assets/underscore-min.js', __FILE__));
		
		if ('en' != $instance['widget_lang'])
			wp_enqueue_script('aviasales-jquery-i18n', 'http://yandex.st/jquery-ui/1.8.15/i18n/jquery.ui.datepicker-' . $instance['widget_lang'] . '.min.js');

		wp_enqueue_script('aviasales-autocomplete', 'http://nano.aviasales.ru/assets/autocomplete_places_' . $instance['widget_lang'] . '.js');
		wp_enqueue_script('aviasales-inline-form', 'http://nano.aviasales.ru/assets/minimal/inline_form.js');
		
		wp_enqueue_script('aviasales-init', plugins_url('assets/aviasales.js', __FILE__));

		include 'widget.php';

	}
	
	public static function script_list()
	{
		
		if (is_admin())
			return ;
		
	}
	
	public static function style_list()
	{
		
		if (is_admin())
			return ;

	}

    protected function aviasales_logo($instance, $position)
    {

        if ('top' == $position && 'wide' == $instance['widget_width'])
            return '';

        if ('bottom' == $position && 'wide' != $instance['widget_width'])
            return '';

        return '<div class="aviasales_logo">'
            . ($this->aviasales_value($instance, 'show_logo') ? '<a href="' . $this->aviasales_translate($instance, 'domain')
            	. ($this->aviasales_value($instance, 'affiliate_id') ? '?marker=' . $instance['affiliate_id'] : '')
            	. '"><img src="' . plugins_url($this->aviasales_translate($instance, 'logo'), __FILE__) . '" /></a>' : '')
        . '</div>';
    }

    protected function aviasales_value($instance, $key)
    {
    	return isset($instance[$key]) ? $instance[$key] : null;
    }

    protected function check_values($instance)
    {

		if (!in_array($this->aviasales_value($instance, 'widget_lang'), array('ru', 'en', 'de')))
			$instance['widget_lang'] = 'ru';

		if (!in_array($this->aviasales_value($instance, 'widget_width'), array('ultraslim', 'slim', 'medium', 'wide')))
			$instance['widget_width'] = 'slim';

		if (!in_array($this->aviasales_value($instance, 'currency'), array('RUB', 'EUR', 'USD', 'UAH')))
			$instance['widget_width'] = 'RUB';

		return $instance;

    }
	
}

add_action('widgets_init', create_function('', 'return register_widget("Aviasales");'));
// add_action('wp_print_scripts', array('Aviasales', 'script_list'));
// add_action('wp_print_styles', array('Aviasales', 'style_list'));