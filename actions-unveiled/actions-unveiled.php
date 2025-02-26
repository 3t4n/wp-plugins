<?php
/**
 * Plugin Name: Actions unveiled
 * Description: Lists all about running actions.
 * Version: 1.0.0
 * Date: 19/03/2015
 * Author: Jacquemin Serge
 * Author URI: https://profiles.wordpress.org/sergejack
*/
// important: no namespace for ths file! PHP 5.0+ Compatible!
define('BE_MCH_ACTUNV', true);

function actunv_load_scripts() {
	wp_enqueue_style('actunv-main', plugins_url('css/main.css', __FILE__));
	wp_enqueue_script('actunv-main', plugins_url('js/main.js', __FILE__));
}
add_action( 'admin_enqueue_scripts', 'actunv_load_scripts', 21);
add_action( 'wp_enqueue_scripts', 'actunv_load_scripts', 21);

class BE_MCH_ACTUNV_class {
	static private $actions = array();
	static private $dicActions = array();
	
	private $name;
	private $depth;
	private $subActions;
	
	private function __construct($action) {
		$this->name = $action;
		$this->depth = 0;
		$this->messages = array();
		$this->subActions = array();
	}
	
	public function addMessage($message) {
		$this->subActions[] = $message;
	}
	
	static function on_action() {
		global $wp_current_filter;
		
		$action = current_filter();
		
		// ignore some actions
		switch($action) {
			case 'gettext':
			case 'gettext_with_context':
				return;
		};
		
		$instance = new BE_MCH_ACTUNV_class($action);
		$instance->depth = count($wp_current_filter);

		self::$dicActions[$action] = $instance;
		self::$actions[] = $instance;
		
		if ($instance->depth > 1) {
			$previousAction = $wp_current_filter[$instance->depth - 2];
			
			if (isset(self::$dicActions[$previousAction])) {
				self::$dicActions[$previousAction]->subActions[] = $instance;
				array_pop(self::$actions);
			}
		}
	}
	
	static function print_actions($actions) {
		foreach($actions as $a => $action) {
			if ($action instanceof BE_MCH_ACTUNV_class) {
				echo(sprintf(
					$action->name == null
						? '<li class="empty_hook"><span>%1$s</span>'
						: '<li class="hook"><span>%1$s</span>'
					, htmlspecialchars($action->name)
					, $action->depth
				));
			} else {
				echo(sprintf(
					'<li class="message"><span>%1$s</span>'
					, htmlspecialchars($action)
				));
			}
			if (count($action->subActions) > 0) {
				echo('<ol>');
				self::print_actions($action->subActions);
				echo('</ol>');
			}
			echo('</li>');
		}
	}
	
	static function on_shutdown() {
		if (is_admin()) {		
			echo('<ol class="be_mch_actunv">');
			self::print_actions(self::$actions);
			echo('</ol>');
		} else {
			// Comment node
			echo('<!--actunv  <ol class="be_mch_actunv">');
			self::print_actions(self::$actions);
			echo('</ol>-->');
		}
	}
	
	static function add_message($action, $message) {
		if (isset(self::$dicActions[$action])) {
			self::$dicActions[$action]->addMessage($message);
		} else {
			$instance = new BE_MCH_ACTUNV_class(
				$action == null
				? ''
				: '[' . $action . ']'
			);
			$instance->addMessage($message);
		
			self::$actions[] = $instance;
		}
	}
}

class BE_MCH_ACTUNV_messenger {
	private $message;
	
	public function __construct($message) {
		$action = current_filter();
		
		// echo($message);

		BE_MCH_ACTUNV_class::add_message($action, $message);
	}
}

add_action( 'all', array('BE_MCH_ACTUNV_class', 'on_action'), 0);
add_action( 'shutdown', array('BE_MCH_ACTUNV_class', 'on_shutdown'), 9999);

