<?php

/*
Plugin Name: Social Skew Bar
Plugin URI: http://designskew.com/blog/
Description: <a href="http://www.designskew.com/blog/social-skew-bar-sharing-wordpress-plugin">Social Skew Bar</a> is social sharing wordpress plugin which helps you increase your blog's exposure using social media sites. Includes Twitter, Facebook and Google Plus.
Version: 1.0
Author: Rishi
Author URI: http://www.designskew.com
License: GPLv2 or later
*/

/*
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

define('DS_URL', plugin_dir_url( __FILE__ ));

function build_stylesheet_url() {
    echo '<link rel="stylesheet" href="' . DS_URL . 'skew.css?build=' . date( "Ymd", strtotime( '-24 days' ) ) . '" type="text/css" media="screen" />';
    echo '<link rel="stylesheet" href="' . DS_URL . 'skew.js" type="text/css" media="screen" />';
}

function build_stylesheet_content() {
    if( isset( $_GET['build'] ) && addslashes( $_GET['build'] ) == date( "Ymd", strtotime( '-24 days' ) ) ) {
        header("Content-type: text/css");
        echo "/* Something */";
        define( 'DONOTCACHEPAGE', 1 ); // don't let wp-super-cache cache this page.
        die();
    }
}

add_action( 'init', 'build_stylesheet_content' );
add_action( 'wp_head', 'build_stylesheet_url' );

function my_new_contactmethods( $contactmethods ) {
// Add Twitter
$contactmethods['twittername'] = 'Twitter Username';
//add Facebook
$contactmethods['facebookurl'] = 'Facebook Page URL';

return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);

function skew($content) { 
	if(is_single())
		{
			skew_single();
		}
	else
		{
			skew_home();
		}
return '<div id="my_div>' .$content. '</div>';
}
add_filter('the_content','skew',10);

function skew_home() { ?>
<div id="skew-sharing">
<ul>
<a href="#"><p style="line-height: 32px;font-family:Helvetica, Arial;color: white; float: left; margin-right: 25px; font-size: 20px; width: 166px; text-transform: uppercase;"><?php bloginfo('name'); ?></p></a>
<span style="float: left; margin-top: 5px; height: 25px;">
<div style="float:left;width:100px;"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_author_meta('facebookurl'); ?>&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=lucida+grande&amp;height=21&amp;appId=172507942880686" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></div>
<div style="float:left;width:100px;"><a href="https://twitter.com/<?php the_author_meta('twittername'); ?>" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false"><?php the_author_meta('twittername'); ?></a>
</div>
<div style="float:left;width:100px;"><g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone></div>
</span>	
<span style="float: right; width: 390px; margin-top: 2px;color:white;">
<span style="float: left; font-size: 15px; line-height: 27px;">Popular :</span>
<ul><?php $popular = new WP_Query('orderby=comment_count&posts_per_page=1'); ?> <?php while ($popular->have_posts()) : $popular->the_post(); ?><li><a style="color: white; margin-left: 10px; float: left; font-size: 14px; line-height: 16px;" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li> <?php endwhile; ?> </ul>
</span>
</ul>
</div>
<?
}

function skew_single() { ?>
<div id="skew-sharing">
<ul>
<a href="#"><p style="line-height: 32px;font-family:Helvetica, Arial;color: white; float: left; margin-right: 25px; font-size: 20px; width: 166px; text-transform: uppercase;"><?php bloginfo('name'); ?></p></a>
<span style="float: left; margin-top: 5px; height: 25px;">
<div style="float:left;width:100px;"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=lucida+grande&amp;height=21&amp;appId=172507942880686" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe></div>
<div style="float:left;width:100px;"><a href="https://twitter.com/share" class="twitter-share-button" data-text="<?php the_title(); ?>" data-count="true" data-url="<?php the_permalink(); ?>" data-via="<?php the_author_meta('twittername'); ?>" data-lang="en">Tweet</a>
</div>
<div style="float:left;width:100px;"><g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone></div>
</span>	
<span style="float: right; width: 390px; margin-top: 2px;color:white;">
<span style="float: left; font-size: 15px; line-height: 27px;">Popular :</span>
<ul><?php $popular = new WP_Query('orderby=comment_count&posts_per_page=1'); ?> <?php while ($popular->have_posts()) : $popular->the_post(); ?><li><a style="color: white; margin-left: 10px; float: left; font-size: 14px; line-height: 16px;" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li> <?php endwhile; ?> </ul>
</span>
</ul>
</div>
	<?
}

function skewfooter() {
	?>
<script type="text/javascript">
window.___gcfg = {lang: 'en'};
(function() 
{var po = document.createElement("script");
po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(po, s);
})();</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

	<?php
}
add_action('wp_footer','skewfooter');