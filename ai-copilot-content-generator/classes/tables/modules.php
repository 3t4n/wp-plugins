<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class WaicTableModules extends WaicTable {
	public function __construct() {
		$this->_table = '@__modules';
		$this->_id = 'id';     /*Let's associate it with posts*/
		$this->_alias = 'sup_m';
		$this->_addField('label', 'text', 'varchar', 0, esc_html__('Label', 'ai-copilot-content-generator'), 128)
				->_addField('type_id', 'selectbox', 'smallint', 0, esc_html__('Type', 'ai-copilot-content-generator'))
				->_addField('active', 'checkbox', 'tinyint', 0, esc_html__('Active', 'ai-copilot-content-generator'))
				->_addField('params', 'textarea', 'text', 0, esc_html__('Params', 'ai-copilot-content-generator'))
				->_addField('code', 'hidden', 'varchar', '', esc_html__('Code', 'ai-copilot-content-generator'), 64)
				->_addField('ex_plug_dir', 'hidden', 'varchar', '', esc_html__('External plugin directory', 'ai-copilot-content-generator'), 255);
	}
}
