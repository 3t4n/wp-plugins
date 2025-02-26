<?php
/*
Plugin Name: aiMatch Platform Connection
Plugin URI: http://blog.aimatch.com/wordpress-aimatch-platform-connnection-plugin/
Description: Plugin that allows you to easily setup an aiMatch ad call for your wordpress site! For usage instructions head over to the <a href="./options-general.php?page=aimatch-adcall-plugin">settings</a> page.
Author: aiMatch
Version: 1.0 
Author URI: http://www.aimatch.com
*/

/*
aiMatch Platform Connection
Copyright (C) 2011 aiMatch 

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Options file include
include_once dirname(__FILE__) . '/aimatch_apcOptions.php';

// Widgets file include
include_once dirname(__FILE__) . '/aimatch_apcWidgets.php';

// Call options
add_action('admin_menu', 'aimatch_apcPluginMenu');

// Call Widgets
add_action( 'widgets_init', 'aimatch_apcLoadWidgets' );

// Ad call core function
function aimatch_apc($adServer, $shortName, $adCallType, $targeting, $adSize) { 
	
	// Get the width and height from $adSize
	$iSize = explode("x", $adSize);

	if ($adCallType == 'jserver') { ?>

		<script type="text/javascript"  language="JavaScript">

			<!-- Hide from old browsers

			// Modify to reflect site specifics
			adServer = "<?php echo $adServer ?>/<?php echo $shortName ?>";

                        // If adSize is emptly leave out "/"
                        if ("<?php echo $adSize ?>" == "") {
                                var adSize = "";
                                } else {
                                var adSize = "/size=<?php echo $adSize ?>";
                        }

			// If targeting is emptly leave out "/"
			if ("<?php echo $targeting ?>" == "") {
				var target = "";
				} else {
				var target = "/<?php echo $targeting ?>";
			}

			// Cache-busting and viewid values
			random = Math.round(Math.random() * 100000000);

			if (!pageNum) var pageNum = Math.round(Math.random() * 100000000);

				document.write('<scr');
				document.write('ipt src="' + adServer + '/jserver/random=' + random + target + adSize + '/viewid=' + pageNum + '">');
				document.write('</scr');
				document.write('ipt>');

			// End Hide -->

		</script>
	<?php }
	else { ?>

		<script type="text/javascript" language="JavaScript">

			<!-- Hide from old browsers

			// Modify to reflect site specifics
			adServer = "<?php echo $adServer ?>/<?php echo $shortName ?>"; 

                        // If adSize is emptly leave out "/"
                        if ("<?php echo $adSize ?>" == "") {
                                var adSize = "";
                                } else {
                                var adSize = "/size=<?php echo $adSize ?>";
                        }

                        // If targeting is emptly leave out "/"
                        if ("<?php echo $targeting ?>" == "") {
                                var target = "";
                                } else {
                                var target = "/<?php echo $targeting ?>";
                        }

			// Cache-busting and viewid values
			random = Math.round(Math.random() * 100000000);

			if (!pageNum) var pageNum = Math.round(Math.random() * 100000000);

				document.write('<iframe src="' + adServer + '/hserver/random=' + random + target + adSize + '/viewid=' + pageNum + '"');
				document.write(' noresize scrolling=no hspace=0 vspace=0 frameborder=0 marginheight=0 marginwidth=0 width=<?php echo $iSize[0] ?> height=<?php echo $iSize[1] ?> allowTransparency="true">');
				document.write('</iframe>');
    
			// End Hide -->

		</script>

	<?php } 
}

?>
