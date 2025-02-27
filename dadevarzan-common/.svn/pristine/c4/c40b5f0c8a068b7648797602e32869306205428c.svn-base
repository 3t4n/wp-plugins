<?php
/**
 * Class DV_CapabilityManagement
 *
 * This class Manage capabilities for Editor Role
 */

class DV_CapabilityManagement
{
    public function initialize()
    {

        add_filter('user_has_cap', array($this, 'add_required_caps'), 10, 4);
        add_action('admin_head', array($this, 'remove_appearance_menu_items'), 10);
        add_action('admin_head', array($this, 'appearance_redirect'), 10);
        add_action('admin_bar_menu', array($this, 'hide_admin_bar_customize'), 99);
    }

    // roles to which allow the Appearance menu
    private $allowed_roles = array('editor', 'shop_manager');

    // allowed items from Appearance menu
    private $allowed_items = array(
        'widgets.php',
        'nav-menus.php'
    );

    // capabilities required by WordPress to access to the menu items above and Smart Slider 3
    private $required_capabilities = array(
        'edit_theme_options',
        'rocket_purge_posts',
        'rocket_purge_terms',
        'rocket_purge_cache',
    );

    private $prohibited_items = array();

    protected function user_has_allowed_role($user)
    {

        foreach($user->roles as $role) {
            if (in_array($role, $this->allowed_roles)) {
                return true;
            }
        }

        return false;

    }

    public function add_required_caps($allcaps, $caps, $args, $user)
    {

        if (!$this->user_has_allowed_role($user)) {
            return $allcaps;
        }

        remove_filter('user_has_cap', array($this, 'add_required_caps'), 10, 4);
        foreach($this->required_capabilities as $cap) {
            if (!$user->has_cap($cap)) {
                $allcaps[$cap] = true;
            }
        }
        add_filter('user_has_cap', array($this, 'add_required_caps'), 10, 4);

        return $allcaps;

    }

    /**
     * Hide Customize options from the front-end admin menu bar
     */
    public function hide_admin_bar_customize($wp_admin_bar)
    {

        global $current_user;

        if (!$this->user_has_allowed_role($current_user)) {
            return;
        }

        // Remove customize, background and header from the menu bar.
        $wp_admin_bar->remove_node( 'customize' );
        $wp_admin_bar->remove_node( 'customize-background' );
        $wp_admin_bar->remove_node( 'customize-header' );

    }

    public function remove_appearance_menu_items()
    {

        global $current_user, $menu, $submenu;

        if (!$this->user_has_allowed_role($current_user)) {
            return;
        }

        if (!isset($submenu['themes.php'])) {
            return;
        }
        // remove not allowed menu items under Appearance menu
        foreach($submenu['themes.php'] as $key=>$item) {
            if (!in_array($item[2], $this->allowed_items)) {
                $this->prohibited_items[] = $item[2];
                unset($submenu['themes.php'][$key]);
            }
        }

        // remove all other menu items which could become available after adding capabilities to the role
        foreach($menu as $key=>$item) {
            if ($item[2]=='themes.php') { // skip 'Appearance' menu item
                continue;
            }
            if (in_array($item[1], $this->required_capabilities)) {
                $this->prohibited_items[] = $item[2];
                unset($menu[$key]);
            }
        }

        foreach($submenu as $sub_key=>$subitem) {
            if ($sub_key=='themes.php') { // Skip themes submenu
                continue;
            }
            foreach($subitem as $key=>$item) {
                if (in_array($item[1], $this->required_capabilities)) {
                    $this->prohibited_items[] = $item[2];
                    unset($submenu[$sub_key][$key]);
                }
            }
            if (count($subitem)==0) {
                unset($submenu[$sub_key]);
            }
        }

    }

    public function appearance_redirect() {

        global $current_user;

        if (!$this->user_has_allowed_role($current_user)) {
            return;
        }

        foreach ($this->prohibited_items as $item) {
            $result = stripos($_SERVER['REQUEST_URI'], $item);
            if ($result !== false) {
                wp_redirect(get_option('siteurl') . '/wp-admin/index.php');
            }
            break;
        }

    }
}
