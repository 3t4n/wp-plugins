<?php

class Social_Parts_Loader {

	protected $actions;

	public function __construct() {
		$this->actions = [];
	}

	/**
	 * @param $hook
	 * @param $component
	 * @param $callback
	 * @param  int  $priority
	 * @param  int  $accepted_args
	 */
	public function add_action(
		$hook,
		$component,
		$callback,
		$priority = 10,
		$accepted_args = 1
	) {
		$this->actions = $this->add( $this->actions, $hook, $component,
			$callback, $priority, $accepted_args );
	}

	/**
	 * @param $hooks
	 * @param $hook
	 * @param $component
	 * @param $callback
	 * @param $priority
	 * @param $accepted_args
	 *
	 * @return array
	 */
	private function add(
		$hooks,
		$hook,
		$component,
		$callback,
		$priority,
		$accepted_args
	) {
		$hooks[] = [
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args,
		];

		return $hooks;
	}

	public function run() {
		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'],
				[ $hook['component'], $hook['callback'] ], $hook['priority'],
				$hook['accepted_args'] );
		}
	}
}