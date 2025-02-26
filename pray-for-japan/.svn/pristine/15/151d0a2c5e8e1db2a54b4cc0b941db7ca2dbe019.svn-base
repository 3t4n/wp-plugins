<?php
/*
Plugin Name:  Pray For Japan
Plugin URI: http://www.vjcatkick.com/
Description: add pray for japan icon at your sidebar
Version: 1.0.1
Author: V.J.Catkick
Author URI: http://www.vjcatkick.com/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2933164
*/

/*
License: GPL
Compatibility: WordPress 3.0 with Widget-plugin.

Installation:
Place the widget_single_photo folder in your /wp-content/plugins/ directory
and activate through the administration panel, and then go to the widget panel and
drag it to where you would like to have it!
*/

/*  Copyright V.J.Catkick - http://www.vjcatkick.com/

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


/* Changelog
* Mar 17 2011 - v1.0.0
- Initial release
*/



function pray_for_japan_init() {
	if ( !function_exists( 'register_sidebar_widget' ) )
		return;

	function pray_for_japan( $args ) {
		extract( $args );

		$options = get_option( 'pray_for_japan' );
		$pray_for_japan_title = $options[ 'pray_for_japan_title' ];
		$pray_for_japan_icon_size = $options[ 'pray_for_japan_icon_size' ];
			if( !$pray_for_japan_icon_size ) $pray_for_japan_icon_size = '64px';
		$pray_for_japan_icon_position = $options[ 'pray_for_japan_icon_position' ];
			if( !$pray_for_japan_icon_position ) $pray_for_japan_icon_size = 'center';
		$pray_for_japan_use_background = (int)$options[ 'pray_for_japan_use_background' ];


		// section main logic from here 

		$donation_window = get_bloginfo( 'wpurl' ) . '/wp-content/plugins/pray-for-japan/donation.html';
		$donation_popup = 'javascript:var d=document,w=window,u=\'' . $donation_window . '\';w.open(u,\'title\',\'toolbar=1,resizable=1,scrollbars=1,status=1,width=450,height=450\');void(0);';

		$img_url = get_bloginfo( 'wpurl' ) . '/wp-content/plugins/pray-for-japan/images/prayforjapan.png';
//		$img_tag = '<img class="pray_for_japan_icon" src="' . $img_url . '" border="0" onclick="' . $donation_popup . '"/>';
		$img_tag = '<img class="pray_for_japan_icon" src="' . $img_url . '" border="0" />';
		$img_style_use_background = ' padding: 10px 0px; background-color: white; ';
		$img_style='<style type="text/css" >
		#pray_for_japan { text-align: ' . $pray_for_japan_icon_position . '; ' . ($pray_for_japan_use_background ? $img_style_use_background : '' ) . ' }
		.pray_for_japan_icon { width: ' . $pray_for_japan_icon_size . '; height: ' . $pray_for_japan_icon_size . '; border: 0px solid; cursor: pointer; }
		.post { position: relative; }
		</style>';

		$output = $img_style . '<div id="pray_for_japan">';

		$output .= $img_tag;

		// These lines generate the output
		$output .= '</div>';

		echo $before_widget;
		echo $output;
		echo $after_widget;

	} /* pray_for_japan() */

	function pray_for_japan_control() {
		$options = $newoptions = get_option( 'pray_for_japan' );
		if ( $_POST[ "pray_for_japan_submit" ] ) {
			$newoptions[ 'pray_for_japan_title' ] = strip_tags( stripslashes( $_POST[ "pray_for_japan_title" ] ) );
			$newoptions[ 'pray_for_japan_icon_size' ] = $_POST[ "pray_for_japan_icon_size" ];
			$newoptions[ 'pray_for_japan_icon_position' ] = $_POST[ "pray_for_japan_icon_position" ];
			$newoptions[ 'pray_for_japan_use_background' ] = (int)$_POST[ "pray_for_japan_use_background" ];
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option( 'pray_for_japan', $options );
		}

		$pray_for_japan_title = htmlspecialchars( $options[ 'pray_for_japan_title' ], ENT_QUOTES );
		$pray_for_japan_icon_size = $options[ 'pray_for_japan_icon_size' ];
			if( !$pray_for_japan_icon_size ) $pray_for_japan_icon_size = '64px';
		$pray_for_japan_icon_position = $options[ 'pray_for_japan_icon_position' ];
			if( !$pray_for_japan_icon_position ) $pray_for_japan_icon_size = 'center';
		$pray_for_japan_use_background = (int)$options[ 'pray_for_japan_use_background' ];

?>


Icon width:<br />
&nbsp;<input type="radio" id="pray_for_japan_icon_size" name="pray_for_japan_icon_size" value="32px" <?php echo ( $pray_for_japan_icon_size == '32px' ? 'checked' : '' ); ?> />&nbsp;32px&nbsp;
<input type="radio" id="pray_for_japan_icon_size" name="pray_for_japan_icon_size" value="64px" <?php echo ( $pray_for_japan_icon_size == '64px' ? 'checked' : '' ); ?> />&nbsp;64px&nbsp;

<input type="radio" id="pray_for_japan_icon_size" name="pray_for_japan_icon_size" value="50%" <?php echo ( $pray_for_japan_icon_size == '50%' ? 'checked' : '' ); ?> />&nbsp;50%&nbsp;
<input type="radio" id="pray_for_japan_icon_size" name="pray_for_japan_icon_size" value="100%" <?php echo ( $pray_for_japan_icon_size == '100%' ? 'checked' : '' ); ?> />&nbsp;100%<br />

Icon position:<br />
&nbsp;<input type="radio" id="pray_for_japan_icon_position" name="pray_for_japan_icon_position" value="left" <?php echo ( $pray_for_japan_icon_position == 'left' ? 'checked' : '' ); ?> />&nbsp;left&nbsp;
<input type="radio" id="pray_for_japan_icon_position" name="pray_for_japan_icon_position" value="center" <?php echo ( $pray_for_japan_icon_position == 'center' ? 'checked' : '' ); ?> />&nbsp;center&nbsp;
<input type="radio" id="pray_for_japan_icon_position" name="pray_for_japan_icon_position" value="right" <?php echo ( $pray_for_japan_icon_position == 'right' ? 'checked' : '' ); ?> />&nbsp;right<br />

<br />
&nbsp;<input type="checkbox" id="pray_for_japan_use_background" name="pray_for_japan_use_background" value="1" <?php echo ( $pray_for_japan_use_background ? 'checked' : '' ); ?> />&nbsp;enable white background color<br />


  	    <input type="hidden" id="pray_for_japan_submit" name="pray_for_japan_submit" value="1" />

<?php
	} /* pray_for_japan_control() */

	register_sidebar_widget( 'Pray For Japan', 'pray_for_japan' );
	register_widget_control( 'Pray For Japan', 'pray_for_japan_control' );
} /* pray_for_japan_init() */

add_action('plugins_loaded', 'pray_for_japan_init');



?>