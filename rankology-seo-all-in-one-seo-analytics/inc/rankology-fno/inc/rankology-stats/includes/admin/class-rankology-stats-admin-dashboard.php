<?php

namespace RANKOLOGY_STATS;

class Admin_Dashboard
{
    /**
     * User Meta Set Dashboard Option name
     *
     * @var string
     */
    public static $dashboard_set = 'dashboard_set';

    /**
     * Admin_Dashboard constructor.
     */
    public function __construct()
    {
        // Add plugin's global class name
        add_action('admin_body_class', array($this, 'add_plugin_body_class'));
    }

    /**
     * Set Default Hidden Dashboard User Option
     */
    public static function set_user_hidden_dashboard_option()
    {

        //Get List Of Rankology-stats Dashboard Widget
        $dashboard_list = Meta_Box::getList();
        $hidden_opt     = 'metaboxhidden_dashboard';

        //Create Empty Option and save in User meta
        Option::update_user_option(self::$dashboard_set, RANKOLOGY_STATS_VERSION);

        //Get Dashboard Option User Meta
        $hidden_widgets = get_user_meta(User::get_user_id(), $hidden_opt, true);
        if (!is_array($hidden_widgets)) {
            $hidden_widgets = array();
        }

        //Set Default Hidden Dashboard in Admin Wordpress
        foreach ($dashboard_list as $widget => $dashboard) {
            if (isset($dashboard['hidden']) and $dashboard['hidden'] === true) {
                $hidden_widgets[] = Meta_Box::getMetaBoxKey($widget);
            }
        }

        update_user_meta(User::get_user_id(), $hidden_opt, $hidden_widgets);
    }

	public function add_plugin_body_class($classes)
	{
		// Add class for the admin body only for plugin's pages
		if (isset($_GET['page']) && strpos($_GET['page'], 'rkns_') === 0) {
			$classes .= ' rkns_page';
		}

		return $classes;
	}
}

new Admin_Dashboard;