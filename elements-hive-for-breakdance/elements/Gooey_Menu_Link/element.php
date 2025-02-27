<?php

namespace ElementsHiveForBreakdance;

class GooeyMenuLink extends \ElementsHiveForBreakdance\GooeyLink {

	public static function name() {
		return 'Gooey Menu Link';
	}

	public static function slug() {
		return get_class();
	}

	public static function nestingRule() {
		return ['type' => 'final', 'restrictedToBeADirectChildOf' => [ 'EssentialElements\MenuBuilder' ] ];
	}

}
