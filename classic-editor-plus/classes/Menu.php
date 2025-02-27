<?php
namespace YCE;

class Menu
{
	public function __construct()
	{
		$this->init();
	}

	private function init()
	{
		add_action("admin_menu", array($this, 'menu'), 2,2);
	}

	public function menu()
	{
		add_menu_page(__('Classic Editor', YCE_LANG), __('Classic Editor', YCE_LANG), 'read', YCE_MAIN_PAGE_KEY, array($this, 'mainMenu'), 'dashicons-format-aside');
	}

	public function mainMenu()
	{
		require_once(YCE_VIEWS_PATH.'mainMenu.php');
	}
}

new Menu();