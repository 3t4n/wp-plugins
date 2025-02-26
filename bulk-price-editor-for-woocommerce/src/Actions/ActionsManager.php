<?php namespace BulkPriceEditor\Actions;

class ActionsManager {
	
	public function __construct() {
		new SchedulePriceUpdatesAction();
		new UpdateProductPriceAction();
	}
	
}