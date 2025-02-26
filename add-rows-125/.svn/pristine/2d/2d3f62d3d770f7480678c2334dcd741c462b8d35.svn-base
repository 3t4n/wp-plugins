<?php
/*
Plugin Name: Ad Rows 125
Plugin URI: http://wpxprt.com/plugins-list/ad-rows-125/
Description: Ad Rows 125 has been replaced by WPX Affiliate Manager.
Version: 2.0.0
Author: Wordpress Expert
Author URI: http://wpxprt.com
*/

/*  Copyright 2012 Greg Goodwin (email : wpxprt@gmail.com)

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
add_action('admin_menu', 'ad_rows_125_menu');

function ad_rows_125_menu() {
	add_options_page('Ad Rows 125 Options', 'Ad Rows 125', 'manage_options', 'ad-rows-125', 'ad_rows_125_options');
}

function ad_rows_125_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	$theMessage = $status[3];
	
	if (isset($_POST['submitted'])) {
		$widget_title=(!isset($_POST['widgettitle'])? '': $_POST['widgettitle']);
		
		$ad1_url=(!isset($_POST['ad1url'])? '': $_POST['ad1url']);
		$ad1_img=(!isset($_POST['ad1img'])? '': $_POST['ad1img']);
		$ad2_url=(!isset($_POST['ad2url'])? '': $_POST['ad2url']);
		$ad2_img=(!isset($_POST['ad2img'])? '': $_POST['ad2img']);
		$ad3_url=(!isset($_POST['ad3url'])? '': $_POST['ad3url']);
		$ad3_img=(!isset($_POST['ad3img'])? '': $_POST['ad3img']);
		$ad4_url=(!isset($_POST['ad4url'])? '': $_POST['ad4url']);
		$ad4_img=(!isset($_POST['ad4img'])? '': $_POST['ad4img']);
		$ad5_url=(!isset($_POST['ad5url'])? '': $_POST['ad5url']);
		$ad5_img=(!isset($_POST['ad5img'])? '': $_POST['ad5img']);
		$ad6_url=(!isset($_POST['ad6url'])? '': $_POST['ad6url']);
		$ad6_img=(!isset($_POST['ad6img'])? '': $_POST['ad6img']);

		update_option('ad_rows_125_title', $widget_title);
		
		update_option('ad_rows_125_ad1_url', $ad1_url );
		update_option('ad_rows_125_ad1_img', $ad1_img );
		update_option('ad_rows_125_ad2_url', $ad2_url );
		update_option('ad_rows_125_ad2_img', $ad2_img );
		update_option('ad_rows_125_ad3_url', $ad3_url );
		update_option('ad_rows_125_ad3_img', $ad3_img );
		update_option('ad_rows_125_ad4_url', $ad4_url );
		update_option('ad_rows_125_ad4_img', $ad4_img );
		update_option('ad_rows_125_ad5_url', $ad5_url );
		update_option('ad_rows_125_ad5_img', $ad5_img );
		update_option('ad_rows_125_ad6_url', $ad6_url );
		update_option('ad_rows_125_ad6_img', $ad6_img );
		
		$msg_status = 'Ad Rows 125 options saved.';

		// Show message
	   _e('<div id="message" class="updated fade"><p>' . $msg_status . '</p></div>');
	}
	
	$widget_title = get_option('ad_rows_125_title');

	$ad1_url = get_option('ad_rows_125_ad1_url');
	$ad1_img = get_option('ad_rows_125_ad1_img');
	$ad2_url = get_option('ad_rows_125_ad2_url');
	$ad2_img = get_option('ad_rows_125_ad2_img');
	$ad3_url = get_option('ad_rows_125_ad3_url');
	$ad3_img = get_option('ad_rows_125_ad3_img');
	$ad4_url = get_option('ad_rows_125_ad4_url');
	$ad4_img = get_option('ad_rows_125_ad4_img');
	$ad5_url = get_option('ad_rows_125_ad5_url');
	$ad5_img = get_option('ad_rows_125_ad5_img');
	$ad6_url = get_option('ad_rows_125_ad6_url');
	$ad6_img = get_option('ad_rows_125_ad6_img');
	
	echo <<<END

	<div class="wrap" >
		<h2>Ad Rows 125</h2>
		<div id="poststuff" style="margin-top:10px;">
			<div id="sideblock" style="float:right;width:270px;margin-left:10px;"> 		 
				<iframe width=270 height=800 frameborder="0" src="http://wpxprt.com/plugins/adrows125/news.php"></iframe>
 			</div>
 		</div>

		<div id="mainblock" style="width:710px">
			<div class="dbx-content">
				<form name="sfiform" action="$action_url" method="post">
					<input type="hidden" name="submitted" value="1" /> 
					<h2>General Options</h2>
					<div>Ad Rows 125 has been replaced by <a href="http://wpxprt.com/plugins-list/wpx-affiliate-manager/" target="_blank">WPX Affiliate Manager</a></div>
					<div>
						<label for="widget_title"><b>Widget Title</b></label><br>
						<input style="border:1px solid #D1D1D1; width:165px;" id="widget_title" name="widgettitle" value="$widget_title"/>
					</div><br>
					
					<h2>Ad Section</h2>
					<div>
						<label for="ad1_url"><b>Ad 1</b> Destination Url</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad1_url" name="ad1url" value="$ad1_url"/>
					</div><br>
					<div>
						<label for="ad1_img"><b>Ad 1</b> Image URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad1_img" name="ad1img" value="$ad1_img"/>
					</div><br>
					
					<div>
						<label for="ad2_url"><b>Ad 2</b> Destination URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad2_url" name="ad2url" value="$ad2_url"/>
					</div><br>
					<div>
						<label for="ad2_img"><b>Ad 2</b> Image URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad2_img" name="ad2img" value="$ad2_img"/>
					</div><br>
					
					<div>
						<label for="ad3_url"><b>Ad 3</b> Destination URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad3_url" name="ad3url" value="$ad3_url"/>
					</div><br>
					<div>
						<label for="ad3_img"><b>Ad 3</b> Image URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad3_img" name="ad3img" value="$ad3_img"/>
					</div><br>
					
					<div>
						<label for="ad4_url"><b>Ad 4</b> Destination URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad4_url" name="ad4url" value="$ad4_url"/>
					</div><br>
					<div>
						<label for="ad4_img"><b>Ad 4</b> Image URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad4_img" name="ad4img" value="$ad4_img"/>
					</div><br>
					
					<div>
						<label for="ad5_url"><b>Ad 5</b> Destination URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad5_url" name="ad5url" value="$ad5_url"/>
					</div><br>
					<div>
						<label for="ad5_img"><b>Ad 5</b> Image URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad5_img" name="ad5img" value="$ad5_img"/>
					</div><br>
					
					<div>
						<label for="ad6_url"><b>Ad 6</b> Destination URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad6_url" name="ad6url" value="$ad6_url"/>
					</div><br>
					<div>
						<label for="ad6_img"><b>Ad 6</b> Image URL</label><br>
						<input style="border:1px solid #D1D1D1; width:165px;"  id="ad6_img" name="ad6img" value="$ad6_img"/>
					</div><br>

					<div class="submit"><input type="submit" name="Submit" value="Update options" /></div>
				</form>
				
			</div>	
		</div>
	</div>

	<h5>WordPress plugin by <a href="http://wpxprt.com/">Wordpress Experts</a></h5>	
END;

}
//Widget
class ad_rows_125 extends WP_Widget {

    function ad_rows_125() {
        $widget_options = array( 'classname' => 'widget_ad_rows_125', 'description' => __( 'Display your ads.', 'ad-rows-125' ) );
        $this->WP_Widget( 'ad-rows-125', __( 'Ad Rows 125', 'ad-rows-125' ), $widget_options );
		wp_enqueue_style('ad-rows-125', plugins_url('/css/add-rows-125.css',__FILE__) );
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $title = get_option('ad_rows_125_title');
        $ads = array();

        if(get_option('ad_rows_125_ad1_url')) {
            $ads[] = array (
                'img' => get_option('ad_rows_125_ad1_img'),
                'link' => get_option('ad_rows_125_ad1_url')
            );
        }

        if(get_option('ad_rows_125_ad2_url')) {
            $ads[] = array (
                'img' => get_option('ad_rows_125_ad2_img'),
                'link' => get_option('ad_rows_125_ad2_url')
            );
        }

        if(get_option('ad_rows_125_ad3_url')) {
            $ads[] = array (
                'img' => get_option('ad_rows_125_ad3_img'),
                'link' => get_option('ad_rows_125_ad3_url')
            );
        }

        if(get_option('ad_rows_125_ad4_url')) {
            $ads[] = array (
                'img' => get_option('ad_rows_125_ad4_img'),
                'link' => get_option('ad_rows_125_ad4_url')
            );
        }

        if(get_option('ad_rows_125_ad5_url')) {
            $ads[] = array (
                'img' => get_option('ad_rows_125_ad5_img'),
                'link' => get_option('ad_rows_125_ad5_url')
            );
        }

        if(get_option('ad_rows_125_ad6_url')) {
            $ads[] = array (
                'img' => get_option('ad_rows_125_ad6_img'),
                'link' => get_option('ad_rows_125_ad6_url')
            );
        }


        $i = 1;
        $ad_num = count($ads);
        echo $before_widget;

        if($title) {
                echo $before_title . $title . $after_title;
        }

        echo '<div class="ad-square-buttons">';

        foreach($ads as $ad) {
                echo '<a href="' . $ad['link'] . '" title="Advertisement">';
                echo '<img src="' . $ad['img'] .'" alt="Advertisement" width="125" height="125">';
                echo '</a>';

                if($i%2 == 0 || $i == $ad_num) {
                        echo '<div class="clear"></div>';
                }
                $i++;
        }

        echo '</div>';
        echo $after_widget;

    }

    function form($instance) {
        $defaults = '';

?>
            <p>Setup this widget in Settings > Ad Rows 125</p>
<?php
    }
}
add_action( 'widgets_init', create_function('', 'return register_widget("ad_rows_125");') );
?>