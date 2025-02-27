<?php
/*
Plugin Name: Digital Clock
Author: Mehedi Hasan Kanon
Author URI: http://mhkanon.com
Description: The Digital Clock plugin allows you to effortlessly add a customizable clock to your website, featuring two elegant themes: dark and light. Automatically adjusts to your local timezone, ensuring accurate time display for your visitors. With an intuitive interface, setting it up is a breeze, making it perfect for any WordPress site.
Text Domain: digital_clock
Domain Path: /languages
Version: 1.1.5
License: GNU General Public License v2 or later
*/

/*=======================================================
                    Digital Clock
=========================================================*/

add_action('widgets_init', function () {
	register_widget('DGC_Clock_Widget');
});

require_once plugin_dir_path(__FILE__) . 'dgc_menu.php';

class DGC_Clock_Widget extends WP_Widget
{
	public function __construct()
	{
		parent::__construct('dgc_register', 'Digital Clock');
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_shortcode('dgc_shortcode', array($this, 'render_shortcode'));
	}

	public function enqueue_scripts()
	{
		wp_enqueue_style('dgc_css', plugins_url('assets/css/style.css', __FILE__));
		wp_enqueue_script('dgc_moment_js', plugins_url('assets/js/momoent.js', __FILE__), array('jquery'), null, true);
		wp_enqueue_script('dgc_script', plugins_url('assets/js/script.js', __FILE__), array('jquery'), null, true);
	}

	public function form($instance)
	{
		echo '<p>Nothing to do here</p>';
	}

	public function widget($args, $instance)
	{
		$dgc_select = get_option('dgc_clock_select', 'c2');

		if ($dgc_select == 'c1') {
			echo $this->render_clock('light');
		} elseif ($dgc_select == 'c2') {
			echo $this->render_clock('dark');
		} elseif ($dgc_select == 'c3') {
			echo $this->render_clock2();
		}
	}

	public function render_clock($theme)
	{
		return "
            <div id='dgc_clock' class='$theme'>
                <div class='display'>
                    <div class='weekdays'></div>
                    <div class='ampm'></div>
                    <div class='digits'></div>
                </div>
            </div>
        ";
	}

	public function render_clock2()
	{
		return "
            <div id='dgc_clock2'>
                <div id='Date'></div>
                <ul>
                    <li id='hours'></li>
                    <li id='point'>:</li>
                    <li id='min'></li>
                    <li id='point'>:</li>
                    <li id='sec'></li>
                </ul>
            </div>
        ";
	}

	public function render_shortcode()
	{
		ob_start();
		echo $this->widget(array(), array());
		return ob_get_clean();
	}
}
