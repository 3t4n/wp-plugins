<?php

namespace TopDeliverability;

interface FormHandler {

	/**
	 * @return void
	 */
	public function handle();

	/**
	 * @return string
	 */
	public function action();
}
