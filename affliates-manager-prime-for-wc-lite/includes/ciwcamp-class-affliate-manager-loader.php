<?php

/**
 * Register all actions and filters for the plugin
 *
 * @link       http://codexinfra.com
 * @since      1.0.0
 *
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/includes
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Ciwcamp_Affliate_Manager_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $ciwcamp_actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $ciwcamp_actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $ciwcamp_filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $ciwcamp_filters;

	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->ciwcamp_actions = array();
		$this->ciwcamp_filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $ciwcamp_hook             The name of the WordPress action that is being registered.
	 * @param    object               $ciwcamp_component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $ciwcamp_callback         The name of the function definition on the $ciwcamp_component.
	 * @param    int                  $ciwcamp_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $ciwcamp_accepted_args    Optional. The number of arguments that should be passed to the $ciwcamp_callback. Default is 1.
	 */
	public function ciwcamp_add_action( $ciwcamp_hook, $ciwcamp_component, $ciwcamp_callback, $ciwcamp_priority = 10, $ciwcamp_accepted_args = 1 ) {
		$this->ciwcamp_actions = $this->ciwcamp_add( $this->ciwcamp_actions, $ciwcamp_hook, $ciwcamp_component, $ciwcamp_callback, $ciwcamp_priority, $ciwcamp_accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $ciwcamp_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $ciwcamp_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $ciwcamp_callback         The name of the function definition on the $ciwcamp_component.
	 * @param    int                  $ciwcamp_priority         Optional. The priority at which the function should be fired. Default is 10.
	 * @param    int                  $ciwcamp_accepted_args    Optional. The number of arguments that should be passed to the $ciwcamp_callback. Default is 1
	 */
	public function ciwcamp_add_filter( $ciwcamp_hook, $ciwcamp_component, $ciwcamp_callback, $ciwcamp_priority = 10, $ciwcamp_accepted_args = 1 ) {
		$this->ciwcamp_filters = $this->ciwcamp_add( $this->ciwcamp_filters, $ciwcamp_hook, $ciwcamp_component, $ciwcamp_callback, $ciwcamp_priority, $ciwcamp_accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $ciwcamp_hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $ciwcamp_hook             The name of the WordPress filter that is being registered.
	 * @param    object               $ciwcamp_component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $ciwcamp_callback         The name of the function definition on the $component.
	 * @param    int                  $ciwcamp_priority         The priority at which the function should be fired.
	 * @param    int                  $ciwcamp_accepted_args    The number of arguments that should be passed to the $ciwcamp_callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function ciwcamp_add( $ciwcamp_hooks, $ciwcamp_hook, $ciwcamp_component, $ciwcamp_callback, $ciwcamp_priority, $ciwcamp_accepted_args ) {

		$ciwcamp_hooks[] = array(
			'hook'          => $ciwcamp_hook,
			'component'     => $ciwcamp_component,
			'callback'      => $ciwcamp_callback,
			'priority'      => $ciwcamp_priority,
			'accepted_args' => $ciwcamp_accepted_args
		);

		return $ciwcamp_hooks;

	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function ciwcamp_run() {

		foreach ( $this->ciwcamp_filters as $ciwcamp_hook ) {
			add_filter( $ciwcamp_hook['hook'], array( $ciwcamp_hook['component'], $ciwcamp_hook['callback'] ), $ciwcamp_hook['priority'], $ciwcamp_hook['accepted_args'] );
		}

		foreach ( $this->ciwcamp_actions as $ciwcamp_hook ) {
			add_action( $ciwcamp_hook['hook'], array( $ciwcamp_hook['component'], $ciwcamp_hook['callback'] ), $ciwcamp_hook['priority'], $ciwcamp_hook['accepted_args'] );
		}

	}

}
