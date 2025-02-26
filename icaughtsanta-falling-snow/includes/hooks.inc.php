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
Add the plugin actions/filters here.
*/
add_action("admin_menu", "ws_plugin__ics_snow_add_options");
add_action("wp_head", "ws_plugin__ics_snow_scripting");
/*
Register the activation | de-activation routines.
*/
register_activation_hook($GLOBALS["WS_PLUGIN__"]["ics_snow"]["l"], "ws_plugin__ics_snow_activate");
register_deactivation_hook($GLOBALS["WS_PLUGIN__"]["ics_snow"]["l"], "ws_plugin__ics_snow_deactivate");
?>