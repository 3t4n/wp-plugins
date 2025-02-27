<?php
namespace yce;

class Config
{
	public static function addDefine($name, $value)
	{
		if (!defined($name)) {
			define($name, $value);
		}
	}

	public function __construct()
	{
		$this->init();
	}

	private function init()
	{
		$this->addDefine('YCE_FOLDER_NAME', 'classic-editor-plus');
		$this->addDefine('YCE_ADMIN_POST_NONCE', 'YCE_ADMIN_POST_NONCE');
		$this->addDefine('YCE_ADMIN_URL', admin_url());
		$this->addDefine('YCD_EDITOR_URL', plugins_url().'/'.YCE_FOLDER_NAME.'/');
		$this->addDefine('YCE_EDITOR_CSS_URL', YCD_EDITOR_URL.'css/');
		$this->addDefine('YCE_MAIN_PAGE_KEY', 'yceEditor');
		$this->addDefine('YCE_LANG', 'yce_lang');
		$this->addDefine('YCE_PATH', dirname(__FILE__).'/');
		$this->addDefine('YCE_CLASSES_PATH', YCE_PATH.'classes/');
		$this->addDefine('YCE_VIEWS_PATH', YCE_PATH.'views/');
		$this->addDefine('YCE_SUPPORT_URL', 'https://wordpress.org/support/plugin/classic-editor-plus/');
	}
}

new Config();