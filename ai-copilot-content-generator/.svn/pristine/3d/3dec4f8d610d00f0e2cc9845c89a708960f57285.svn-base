<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class WaicTableWorkspace extends WaicTable {
	public function __construct() {
		$this->_table = '@__workspace';
		$this->_id = 'id';     /*Let's associate it with posts*/
		$this->_alias = 'sup_w';
		$this->_addField('id', 'text', 'int')
			->_addField('name', 'text', 'text', 0, esc_html__('Name', 'ai-copilot-content-generator'))
			->_addField('value', 'text', 'text', 0, esc_html__('Value', 'ai-copilot-content-generator'));
	}
}
