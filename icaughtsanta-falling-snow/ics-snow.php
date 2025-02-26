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
Version: 1.8
Stable tag: 1.8
Framework: P-2.0
Tested up to: 2.9
Requires at least: 2.8.4
Requires: WordPress® 2.8.4+, PHP 5.2.0+
WordPress MU Compatible: yes

License: GNU GPL v3
Contributors: CatchACharacter
Copyright: © 2009 CatchACharacter.com
Author URI: http://www.catchacharacter.com/
Author: CatchACharacter.com / iCaughtSanta.com
Donate link: http://www.catchacharacter.com/

ZipId: ics-snow
FolderId: ics-snow
Plugin Name: iCaughtSanta ( Falling Snow )
Plugin URI: http://www.icaughtsanta.com/ics-snow-plugin/
Description: Adds a beautiful falling snow effect to any WordPress powered site. Charm your visitors with this wonderful winter scenery.
Tags: icaughtsanta, catchacharacter, snow, christmas, santa, santa claus, christmas, falling snow, snow effect, wordpress snow
*/
/*
Direct access denial.
*/
if (realpath(__FILE__) === realpath($_SERVER["SCRIPT_FILENAME"]))
	exit;
/*
Compatibility checks.
*/
if (version_compare(PHP_VERSION, "5.2.0", ">=") && version_compare(get_bloginfo("version"), "2.8.4", ">=") && !isset($GLOBALS["WS_PLUGIN__"]["ics_snow"]))
	{
		/*
		Record the location of this file.
		*/
		$GLOBALS["WS_PLUGIN__"]["ics_snow"]["l"] = __FILE__;
		/*
		Function includes.
		*/
		include_once dirname(__FILE__) . "/includes/funcs.inc.php";
		/*
		Syscon includes.
		*/
		include_once dirname(__FILE__) . "/includes/syscon.inc.php";
		/*
		Hook includes.
		*/
		include_once dirname(__FILE__) . "/includes/hooks.inc.php";
	}
/*
Else handle incompatibilities.
*/
else if (!version_compare(PHP_VERSION, "5.2.0", ">="))
	{
		register_shutdown_function(create_function('', 'echo \'<script type="text/javascript">alert(\\\'You need PHP version 5.2.0 or higher to use the iCS-Snow plugin.\\\');</script>\';'));
	}
else if (!version_compare(get_bloginfo("version"), "2.8.4", ">="))
	{
		register_shutdown_function(create_function('', 'echo \'<script type="text/javascript">alert(\\\'You need WordPress 2.8.4 or higher to use the iCS-Snow plugin.\\\');</script>\';'));
	}
?>