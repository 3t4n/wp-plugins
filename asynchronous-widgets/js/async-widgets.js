/*  Copyright 2010 Daniele Futtorovic (cosifantutti [at] laposte [dot] net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

@package asynchronous-widgets
@author Daniele Futtorovic
@since asynchronous-widgets 1.0.0
*/
jQuery(document).ready( function(){
    jQuery.each(
        jQuery(".async_widget_placeholder"),
        function(index, element){
            var wid = jQuery(element).children(".async_widget_id").text();
            var sid = jQuery(element).children(".aw_session_id").text();
            jQuery.ajax({
                type: "POST",
                url: async_widgets.ajax_url,
                data: "action=aw_get_widget&widget_id=" + wid + "&session_id=" + sid,
                dataType: "html",
                success: function(data, status){
                    jQuery(element).replaceWith(data);
                }
            });
        }
    );
});



