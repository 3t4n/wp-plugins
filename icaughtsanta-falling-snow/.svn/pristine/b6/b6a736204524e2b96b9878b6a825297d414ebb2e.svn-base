<?php
/*
Copyright: © 2009 CatchACharacter.com ( coded in the USA )
<mailto:support@catchacharacter.com> <http://www.catchacharacter.com/>

Released under the terms of the GNU General Public License.
You should have received a copy of the GNU General Public License,
along with this software. In the main directory, see: [gpl-v3.txt]
If not, see: <http://www.gnu.org/licenses/>.
*/
/*
Direct access denial.
*/
if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"]))
	exit;
/*
Function for handling activation routines.
This function should match the array key for this plugin:
ws_plugin__$plugin_key_activate() is called by our themes.
*/
function ws_plugin__ics_snow_activate ()
	{
		return;
	}
/*
Add the options menus & sub-menus.
Attached to: add_action("admin_menu");
*/
function ws_plugin__ics_snow_add_options ()
	{
		add_filter("plugin_action_links", "ws_plugin__ics_snow_add_settings_link", 10, 2);
		/**/
		add_menu_page("iCS Snow", "iCS Snow", "edit_plugins", "ws-plugin--ics-snow-options", "ws_plugin__ics_snow_options_page");
		add_submenu_page("ws-plugin--ics-snow-options", "iCS Snow Config Options", "Config Options", "edit_plugins", "ws-plugin--ics-snow-options", "ws_plugin__ics_snow_options_page");
		/**/
		return;
	}
/*
Add the settings link.
*/
function ws_plugin__ics_snow_add_settings_link ($links = array (), $file = "")
	{
		if (preg_match("/" . preg_quote($file, "/") . "$/", $GLOBALS["WS_PLUGIN__"]["ics_snow"]["l"]) && is_array($links))
			{
				$settings = '<a href="admin.php?page=ws-plugin--ics-snow-options">Settings</a>';
				array_unshift($links, $settings);
			}
		/**/
		return $links;
	}
/*
Add the scripting for snow / peel.
Attached to: add_action("wp_head");
*/
function ws_plugin__ics_snow_scripting ()
	{
		if ($_SERVER["HTTP_HOST"] !== "www.icaughtsanta.com" || is_page("ics-snow-plugin"))
			{
				if ($GLOBALS["WS_PLUGIN__"]["ics_snow"]["o"]["enable_snow"])
					{
						echo '<script type="text/javascript" src="' . $GLOBALS["WS_PLUGIN__"]["ics_snow"]["c"]["dir_url"] . '/snowstorm.js"></script>' . "\n";
					}
				if ($GLOBALS["WS_PLUGIN__"]["ics_snow"]["o"]["enable_peel"])
					{
						@file_get_contents ("http://www.catchacharacter.com/affiliates/track.php?tid1=ics-snow-plugin&tid2=" . urlencode($_SERVER["HTTP_HOST"]) . "&ip_address=" . urlencode($_SERVER["REMOTE_ADDR"]) . "&id=" . urlencode((($GLOBALS["WS_PLUGIN__"]["ics_snow"]["o"]["idev_id"]) ? $GLOBALS["WS_PLUGIN__"]["ics_snow"]["o"]["idev_id"] : 164)));
						echo '<script type="text/javascript" src="http://www.catchacharacter.com/affiliates/idevpeels.php?peel=3&amp;page=2&amp;id=' . urlencode((($GLOBALS["WS_PLUGIN__"]["ics_snow"]["o"]["idev_id"]) ? $GLOBALS["WS_PLUGIN__"]["ics_snow"]["o"]["idev_id"] : 164)) . '"></script>' . "\n";
					}
			}
	}
/*
Function that buffers ( gets ) function output.
*/
function ws_plugin__ics_snow_get ($function = FALSE)
	{
		$args = func_get_args();
		$function = array_shift($args);
		/**/
		if (is_string($function) && $function)
			{
				ob_start();
				/**/
				if (is_array($args) && !empty($args))
					{
						$return = call_user_func_array($function, $args);
					}
				else /* There are no additional arguments to pass. */
					{
						$return = call_user_func($function);
					}
				/**/
				$echo = ob_get_contents();
				/**/
				ob_end_clean();
				/**/
				return (!strlen($echo) && strlen($return)) ? $return : $echo;
			}
	}
/*
Function for saving all options from any page.
*/
function ws_plugin__ics_snow_update_all_options ()
	{
		if ($_POST["ws_plugin__ics_snow_options_save"])
			{
				$options = $GLOBALS["WS_PLUGIN__"]["ics_snow"]["o"]; /* Get current options. */
				/**/
				foreach ($_POST as $key => $value) /* Go through each post variable and look for ics_snow. */
					{
						if (preg_match("/^" . preg_quote("ws_plugin__ics_snow", "/") . "/", $key)) /* Look for keys. */
							{
								if ($key === "ws_plugin__ics_snow_configured") /* This is a special configuration option. */
									{
										update_option("ws_plugin__ics_snow_configured", trim(stripslashes($value))); /* Update this option separately. */
										/**/
										$GLOBALS["WS_PLUGIN__"]["ics_snow"]["c"]["configured"] = trim(stripslashes($value)); /* Update configuration on-the-fly. */
									}
								else /* We need to place this option into the array. Here we remove the ws_plugin__ics_snow_ portion on the beginning. */
									$options[preg_replace("/^" . preg_quote("ws_plugin__ics_snow_", "/") . "/", "", $key)] = $value;
							}
					}
				/**/
				$options["options_version"] = $GLOBALS["WS_PLUGIN__"]["ics_snow"]["o"]["options_version"] + 0.001; /* Increment options version. */
				/**/
				$options = ws_plugin__ics_snow_configure_options_and_their_defaults($options); /* Also updates the global options array. */
				/**/
				update_option("ws_plugin__ics_snow_options", $options); /* Update options. */
				/**/
				echo '<div id="message" class="updated fade"><p><b>Options updated.</b></p></div>';
			}
		/**/
		return;
	}
/*
Function for building and handling the options page.
*/
function ws_plugin__ics_snow_options_page ()
	{
		ws_plugin__ics_snow_update_all_options();
		/**/
		include_once dirname(__FILE__) . "/menu-pages/options.inc.php";
		/**/
		return;
	}
/*
Function for handling de-activation cleanup routines.
This function should match the array key for this plugin:
ws_plugin__$plugin_key_deactivate() is called by our themes.
*/
function ws_plugin__ics_snow_deactivate ()
	{
		delete_option ("ws_plugin__ics_snow_options");
		delete_option ("ws_plugin__ics_snow_configured");
		/**/
		return;
	}
?>