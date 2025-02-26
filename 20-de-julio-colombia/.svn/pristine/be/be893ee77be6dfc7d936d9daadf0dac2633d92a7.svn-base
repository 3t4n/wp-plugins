<?php
/*
Plugin Name: 20 de Julio Colombia
Plugin URI:  http://www.nexxuz.com/widget-wordpress-20-de-julio-dia-de-la-independencia-de-colombia.html
Description: 20 de Julio día de la Independencia de Colombia, agrega la bandera de nuestro país.
Version: 1.2
Author: Jose Daniel Canchila
Author URI: http://nexxuz.com

*/

/*  Copyright 2009 Jose Daniel Canchila - nexxuz.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

 
*/




// Inicia el widget
function show_Colombia_Ind($args) {
	$blog_url=get_bloginfo('url');
	?>
<div id="twitter" style="position:fixed;width:108px;height=105px;left:-5px;top:0;padding.0px;spacing:0px;opacity: 0.9;visibility:visible;z-index:99999;border:0px solid #000000">
<?php echo '<a href="http://www.colombiaaprende.edu.co/html/home/1592/article-83837.html" target="_Blank" rel="nofollow"><img src="'.$blog_url.'/wp-content/plugins/20-de-julio-colombia/colombia.png" title="Dia de la Independencia de Colombia"></a> '; ?> <br />
<a href="www.nexxuz.com"></a>
</div>
<?
echo $before_title.$option_header.$after_title.$before_widget;

echo $after_widget;

?>

<?php
}

function init_Colombia_widget() {
register_sidebar_widget("20 de Julio Colombia", "show_Colombia_Ind");
}

add_action("plugins_loaded", "init_Colombia_widget");

?>
