<?php
    /**
     * Plugin Name: Date Calculator
     * Plugin URI: http://wordpress.org/plugins/date-calculator/
     * Description: Date Calculator returns the current date via shortcode and it can calculate it into an other and returns it in posts, pages and also in CF7-forms.
     * Version: 1.2.0
     * Author: Matthias.S
     * Author URI: https://profiles.wordpress.org/matthiass
     * License: GPLv2
     */

    /*
       Copyright 2014-2018 Matthias Siebler (email: matthias.siebler@gmail.com)
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
     */


 	 // Prevent Direct Access of this file
     if ( ! defined( 'ABSPATH' ) ) exit; // Exit if this file is accessed directly

     // Show an entry in the admin menu in settings-area
     add_action( 'admin_menu', 'dc_plugin_menu' );

     // Add an subpage at the settings entry
     function dc_plugin_menu() {
	add_options_page( 'Settings', 'Date Calculator', 'manage_options', 'dc-options', 'dc_plugin_options' );
     }

     // Display the site 'Settings'
     function dc_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
        echo '<div class="wrap">';
        echo '<h2>Date Calculator › Here are the shortcode definition</h2>';
		echo '<p>The Date Calculator plugin has <b>NOW</b> three basic functions.</p>';
		echo '<p><h3><u>1. It returns the current date.</u></h3>';
		echo 'The shortcode <code>[date_now]</code> returns the current date in posts, pages and also in Contact Form 7-forms.<br />';
		echo 'Since version 1.1.0, it is also possible to determine the date format or print only parts of the current date.</p>';
		echo '<p><u><b>For returning the current date, the following shortcode is available:</b></u><br />';
		echo '<code>[date_now show="dayonly/monthonly/yearonly" format="d.m.Y"]</code><br />';
		echo '<p><u><b>Examples:</b></u></p>';		
		echo '<p><u><b>1.1 Displaying of certain date parts:</b></u><br />';
		echo 'It is possible to impersonate only a part of the date, for example the day or month only. This is specified with the <code>show-parameter</code>.<br />';
		echo '<small>Suppose today is the 01.10.2016</small></p>';
		echo '<p><code>[date_now]</code> returns: 01.10.2016<br />';
		echo '<code>[date_now show="dayonly"]</code> returns: 01<br />';
		echo '<code>[date_now show="monthonly"]</code> returns: 10<br />';
		echo '<code>[date_sub show="yearonly"]</code> returns: 2016</p>';
		echo '<p><u><b>1.2 Returning a date in your own format:</b></u><br />';
		echo 'It is also possible to impersonate a date, in your desired format. This is specified with the <code>format-parameter</code>.<br />';
		echo '<small>Suppose today is the 01.10.2016</small></p>';
		echo '<p><code>[date_now]</code> returns: 01.10.2016<br />';
		echo '<code>[date_now format="m/d/Y"]</code> returns: 10/01/2016<br />';
		echo '<code>[date_now format="j. F Y"]</code> returns: 10. October 2016</p>';
		echo '<p><small><b><u>Note:</u></b> The parameter "format" has no effect if parameter "show" is set (except "all").</small><br />';
		echo '<small>For the documentation of the parameter "format" please have a look at <a href="http://php.net/manual/function.date.php" target="_blank">PHP: date - Manual.</a></small></p>';
		echo '<p><h3><u>2. It can calculate a date.</u></h3>';
		echo 'The shortcodes <code>[date_add]</code> or <code>[date_sub]</code> and returns a calculated date in posts, pages and also in Contact Form 7-forms.</p>';
		echo '<p><u><b>For calculating, the following shortcodes are available:</b></u><br />';
		echo '<code>[date_add day="1" month="1" year="1" show="dayonly/monthonly/yearonly" format="d.m.Y"]</code><br />';
		echo '<code>[date_sub day="1" month="1" year="1" show="dayonly/monthonly/yearonly" format="d.m.Y"]</code></p>';
		echo '<p><span style="text-decoration: underline;"><strong>Examples:</strong></span></p>';
		echo '<p><span style="text-decoration: underline;"><strong>2.1 Calculating the date down:</strong></span><br />';
		echo '<small>Suppose today is the 01.10.2014</small></p>';
		echo '<p><code>[date_sub day="1"]</code> returns: 30.09.2014<br />';
		echo '<code>[date_sub month="3"]</code> returns: 01.07.2014<br />';
		echo '<code>[date_sub year="4"]</code> returns: 01.10.2010<br />';
		echo '<code>[date_sub day="1" month="3" year="4"]</code> returns: 30.06.2010</p>';
		echo '<p><span style="text-decoration: underline;"><strong>2.2 Calculating the date up:</strong></span><br />';
		echo '<small>Suppose today is the 01.10.2014</small></p>';
		echo '<p><code>[date_add day="1"]</code> returns: 02.10.2014<br />';
		echo '<code>[date_add month="3"]</code> returns: 01.01.2015<br />';
		echo '<code>[date_add year="4"]</code> returns: 01.10.2018<br />';
		echo '<code>[date_add day="1" month="3" year="4"]</code> returns: 02.01.2018</p>';
		echo '<p><span style="text-decoration: underline;"><strong>2.3 Displaying of certain date parts:</strong></span><br />';
		echo 'It is also possible to impersonate only a part of the date, for example the day or month only. This is specified with the <code>show-parameter</code>.<br />';
		echo '<small>Suppose today is the 01.10.2014</small></p>';
		echo '<p><code>[date_add day="1" show="dayonly"]</code> returns: 02<br />';
		echo '<code>[date_add month="3" show="monthonly"]</code> returns: 01<br />';
		echo '<code>[date_add year="4" show="yearonly"]</code> returns: 2018<br />';
		echo '<code>[date_sub day="1" show="dayonly"].[date_sub month="3" show="monthonly"]</code> returns: 30.07<br />';
		echo '<code>[date_add year="0" show="yearonly"]-[date_add month="1" show="monthonly"]-[date_add day="1" show="dayonly"]</code> returns: 2014-11-02</p>';
		echo '<p><u><b>2.4 Returning a date in your own format:</b></u><br />';
		echo 'It is also possible to impersonate a date, in your desired format. This is specified with the <code>format-parameter</code>.<br />';
		echo '<small>Suppose today is the 01.10.2016</small></p>';
		echo '<code>[date_add day="1" format="m/d/Y"]</code> returns: 10/02/2016<br />';
		echo '<code>[date_sub year="4" format="j. F Y"]</code> returns: 10. October 2012</p>';
		echo '<p><small><b><u>Note:</u></b> The parameter "format" has no effect if parameter "show" is set (except "all").</small><br />';
		echo '<small>For the documentation of the parameter "format" please have a look at <a href="http://php.net/manual/function.date.php" target="_blank">PHP: date - Manual.</a></small></p>';
		echo '<p><h3><u>3. The Thing "says" a date.</u></h3>';
		echo 'The shortcode <code>[date_say]</code> returns a date in posts, pages and also in Contact Form 7-forms in many different ways like <code>next Monday</code> or <code>last month</code>.<br />';
		echo 'Since version 1.1.0, it is also possible to determine the date format or print only parts of the date.</p>';
		echo '<p><u><b>For returning the current date, the following shortcode is available:</b></u><br />';
		echo '<code>[date_say what="next monday" show="dayonly/monthonly/yearonly" format="d.m.Y"]</code><br />';
		echo '<p><u><b>Examples:</b></u></p>';		
		echo '<p><u><b>3.1 Displaying a date:</b></u><br />';
		echo 'It is possible to impersonate a special date, something like the "second friday of next month" or "third monday of last month". This is specified with the <code>say-parameter</code>.<br />';
		
		echo '<small>Suppose today is the 01.10.2016</small></p>';
		echo '<p><code>[date_say what="second friday of next month"]</code> returns: 11.11.2016<br />';
		echo '<code>[date_say what="third monday of last month"]</code> returns: 19.09.2016<br />';
		echo '<small>For the documentation of the parameter "say" please have a look at <a href="http://php.net/manual/function.strtotime.php" target="_blank">PHP: strtotime - Manual.</a></small></p>';


		echo '<p><u><b>3.2 Displaying of certain date parts:</b></u><br />';
		echo 'It is possible to impersonate only a part of the date, for example the day or month only. This is specified with the <code>show-parameter</code>.<br />';
		echo '<small>Suppose today is the 01.10.2016</small></p>';
		echo '<p><code>[date_say what="second friday of next month" show="dayonly"]</code> returns: 11<br />';
		echo '<code>[date_say what="last month" show="monthonly"]</code> returns: 09</p>';

		echo '<p><u><b>3.3 Returning a date in your own format:</b></u><br />';
		echo 'It is also possible to impersonate a date, in your desired format. This is specified with the <code>format-parameter</code>.<br />';
		echo '<small>Suppose today is the 01.10.2016</small></p>';
		echo '<code>[date_say what="next monday" format="m/d/Y"]</code> returns: 10/03/2016<br />';
		echo '<code>[date_say what="next monday" format="j. F Y"]</code> returns: 3. October 2016</p>';
		echo '<p><small><b><u>Note:</u></b> The parameter "format" has no effect if parameter "show" is set (except "all").</small><br />';
		echo '<small>For the documentation of the parameter "format" please have a look at <a href="http://php.net/manual/function.date.php" target="_blank">PHP: date - Manual.</a></small></p>';


		echo '<p>This plugin enables the shortcode-support within Contact Form 7-forms so that the Date Calculator-shortcodes can also be used there.</p>';


		echo '<p>Have a lot of fun with my first Wordpress-Plugin.</p>';
		echo '<br><p><h2>You like this Plugin? Help to keep it alive and donate a cup of coffee :-)</h2></p>';
		echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">';
		echo '<input type="hidden" name="cmd" value="_s-xclick">';
		echo '<input type="hidden" name="hosted_button_id" value="K73Z3MNV82UTQ">';
		echo '<input type="image" src="https://www.paypalobjects.com/en_US/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">';
		echo '<img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">';
		echo '</form>';
		echo '</div>';
     }


    // Integrate Shortcodes to Contact Form 7
    add_filter( 'wpcf7_form_elements', 'do_shortcode' );

    // Date now - Callexample: [date_now show="dayonly/monthonly/yearonly/all" format="d.m.Y"]
    function date_now_func( $atts ) {
	extract( shortcode_atts( array(
		'show' => 'all',
		'format' => 'd.m.Y',
	), $atts ) );

	$show = "{$show}";
	$format = "{$format}";

	if ($show == "all") {
        $date_now = date($format, mktime(0, 0, 0, date("m"), date("d"), date("Y")));
	return $date_now;
	}

	if ($show == "monthonly") {
        $date_now = date("m", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
	return $date_now;
	}

	if ($show == "dayonly") {
        $date_now = date("d", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
	return $date_now;
	}

	if ($show == "yearonly") {
        $date_now = date("Y", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
	return $date_now;
	}

    }

    add_shortcode( 'date_now', 'date_now_func');



    // Date add - Callexample: [date_add month="1" day="1" year="1" show="dayonly/monthonly/yearonly/all"]
    function date_add_func( $atts ) {
	extract( shortcode_atts( array(
		'month' => '0',
		'day' => '0',
		'year' => '0',
		'show' => 'all',
		'format' => 'd.m.Y',
	), $atts ) );

	$month = "{$month}";
	$day = "{$day}";
	$year = "{$year}";
	$show = "{$show}";
	$format = "{$format}";

	if ($show == "all") {
	$datecalc = date("d.m.Y",mktime(0, 0, 0, date("m")+$month, date("d")+$day, date("Y")+$year));
	return $datecalc;
	}

	if ($show == "monthonly") {
	$datecalc = date("m",mktime(0, 0, 0, date("m")+$month, date("d")+$day, date("Y")+$year));
	return $datecalc;
	}

	if ($show == "dayonly") {
	$datecalc = date("d",mktime(0, 0, 0, date("m")+$month, date("d")+$day, date("Y")+$year));
	return $datecalc;
	}

	if ($show == "yearonly") {
	$datecalc = date("Y",mktime(0, 0, 0, date("m")+$month, date("d")+$day, date("Y")+$year));
	return $datecalc;
	}
    }

    add_shortcode( 'date_add', 'date_add_func' );



    // Date sub - Callexample: [date_sub month="1" day="1" year="1" show="dayonly/monthonly/yearonly/all"]
    function date_sub_func( $atts ) {
	extract( shortcode_atts( array(
		'month' => '0',
		'day' => '0',
		'year' => '0',
		'show' => 'all',
		'format' => 'd.m.Y',
	), $atts ) );

	$month = "{$month}";
	$day = "{$day}";
	$year = "{$year}";
	$show = "{$show}";
	$format = "{$format}";

	if ($show == "all") {
	$datecalc = date("d.m.Y",mktime(0, 0, 0, date("m")-$month, date("d")-$day, date("Y")-$year));
	return $datecalc;
	}

	if ($show == "monthonly") {
	$datecalc = date("m",mktime(0, 0, 0, date("m")-$month, date("d")-$day, date("Y")-$year));
	return $datecalc;
	}

	if ($show == "dayonly") {
	$datecalc = date("d",mktime(0, 0, 0, date("m")-$month, date("d")-$day, date("Y")-$year));
	return $datecalc;
	}

	if ($show == "yearonly") {
	$datecalc = date("Y",mktime(0, 0, 0, date("m")-$month, date("d")-$day, date("Y")-$year));
	return $datecalc;
	}
    }

    add_shortcode( 'date_sub', 'date_sub_func' );



    // Say the Date - Callexample: [date_say what="next monday/second friday of next month" show="dayonly/monthonly/yearonly/all" format="d.m.Y"]
    function date_say_func( $atts ) {
	extract( shortcode_atts( array(
		'what' => 'today',
		'show' => 'all',
		'format' => 'd.m.Y',
	), $atts ) );

	$what = "{$what}";
	$show = "{$show}";
	$format = "{$format}";

	if ($show == "all") {
	$search_date = strtotime($what);
	$datecalc = date($format, $search_date);
	return $datecalc;
	}

	if ($show == "monthonly") {
	$search_date = strtotime($what);
	$datecalc = date("m", $search_date);
	return $datecalc;
	}

	if ($show == "dayonly") {
	$search_date = strtotime($what);
	$datecalc = date("d", $search_date);
	return $datecalc;
	}

	if ($show == "yearonly") {
	$search_date = strtotime($what);
	$datecalc = date("Y", $search_date);
	return $datecalc;
	}
    }

    add_shortcode( 'date_say', 'date_say_func' );

?>