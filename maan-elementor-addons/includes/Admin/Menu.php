<?php


namespace Maantheme\Addons\Admin;

/**
 * The Menu handler class
 */
class Menu
{

    /**
     * Initialize the class
     */
    function __construct()
    {
        //add_action('admin_menu', [$this, 'admin_menu']);
    }

    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu()
    {
        $menu_slug = 'maan-elementor-addons';
        $capability = 'manage_options';
        add_menu_page(__('Maan Elementor Addons', 'maan-elementor-addons'), __('Elementor Addons', 'maan-elementor-addons'), $capability, $menu_slug, [$this, 'welcome_page'], 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAYAAAA71pVKAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAYpJREFUeNpiYBiSgBGZs+XQVYGdXAIOpzm4DYDcAyd0BA6AxH+U9DoAKYc/bBwXPgtIHpAsC/qAovlp36aEi2L8/UuY+QUu8IowMHMwMxj+/fRg5ta1DH8/vFX49fsXw1MhSYbPukYfPqvJFLo76SxghJoc8Oo/4/p+ATmGlQpGDO/ZuBhUfn5m2HtuHcOPpw8ZKox8GO7yiTL8Z2Rk0Pj6hkFYS5bhroxYIAtI8/9fP/vvf/7KMMsojOErCxvYJfEvbzNwPn/I4OycxnBZUArutfNCMgyqHz4z8Egy9zOBBP59/aSwRUYbpnEDEAdavnv84TSXEEwjyI+BILnfjEwML1m4GH59/q0A1szw7x9yuF1kCBfboPL904WrQtIwsQsgMbAcFPz/95+BBVc0PJFSZLj/4z/eqMKm+QGIeCwpwvDw7X+scjDAhCZ5Aepnhot8Ag8e8omga9oAVYNic6Pgz++gQFkA9Bs4Aex787/wFRcfzI8LwCRIbuUrRyaG/wlAnsDApW2AAAMACI6MqbEJIR0AAAAASUVORK5CYII=');
    }

    /**
     * Handles the settings page
     *
     * @return void
     */
    public function welcome_page()
    {
        new Pages\Welcome();
    }
}