<?php
/*
Plugin Name: Scrolling Twitter Like Google +1 Linkedin and Stumbleupon
Plugin URI: http://letusbuzz.com
Description: Scrolling Twitter Like Google +1 Linkedin and Stumbleupon
Version: 1.0.2
Author: Sudipto Pratap Mahato
Author URI: http://letusbuzz.com
*/

function disp_socialsii($content) {
global $post;
$plink = get_permalink($post->ID);
$eplink = urlencode($plink);
$ptitle = get_the_title($post->ID);

if((is_single()&&get_option('ss_dpost','checked')=='checked')||(is_page()&&get_option('ss_dpage','checked')=='checked')){
	$sharelinks=display_social4iii();
	$content=$sharelinks.$content;
}
return $content;
}


function social4iii_css() {
if(!is_single()&&!is_page())return;
$leftpad=get_option('ss_leftpadding','-20px');
$toppad=get_option('ss_toppadding','20');
if(trim(get_option('ss_baripath',''))=='')$bari="http://lh5.googleusercontent.com/-BBUN103Nb3c/TighHiu7JeI/AAAAAAAAAPQ/s5BerauQCr0/s150/socials.png";
else $bari=get_option('ss_baripath','');
$barw=get_option('ss_barwidth','25px');
$barh=get_option('ss_barheight','155px');
if((is_single()&&get_option('ss_dpost','checked')=='checked')||(is_page()&&get_option('ss_dpage','checked')=='checked')){
wp_print_scripts( 'jquery' );
?>
<style>
.scrollbox ul ul {
background: #fff;
border: 2px solid #F1F1F1;
display: none;
list-style: none outside none !important;
position: absolute;
top: 0;
z-index: 9999;
height:213px;
width:148px;
left:100%;
box-shadow: 2px 2px 2px #CCCCCC;
}
.scrollbox>ul>li:hover>ul{
display:block;
padding-left:0px;
padding-right:0px;
padding-top:0px;
padding-bottom:0px;
}
.scrollbox > ul > li {
background: url("<?php echo $bari; ?>") no-repeat scroll 0 0 transparent !important;
height: <?php echo $barh; ?>;
list-style: none outside none !important;
position: relative;
width: <?php echo $barw; ?>;
padding:0px !important;
cursor: pointer;
margin:0 !important;
}
.schildren>li{
margin:0 !important;
padding:0 !important;
background:transparent !important;
list-style:none !important;
}
.socialiconss{
float:left;
}
#scrollbox {
    display: block;
    margin-left: <?php echo $leftpad; ?> !important;
    position: absolute;
}
#scrollbox ul{
margin: 0px !important;
padding:0px !important;
position: relative;
z-index: 9999;
}
</style>
<script type="text/javascript">
(function($) {
	$(function() {
            var offset = $("#scrollbox").offset();
            var topPadding = <?php echo $toppad; ?>;
            $(window).scroll(function() {
		
                if ($(window).scrollTop() > offset.top) {
			var ss= $(window).scrollTop() - offset.top + topPadding;
                    $("#scrollbox").stop().animate({
                        marginTop:ss
                    });
                } else {
                    $("#scrollbox").stop().animate({marginTop: 0});
                };
            });
        });
})(jQuery);
</script>
<?php } ?>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script><script type="text/javascript" src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script><script type="text/javascript" src="http://platform.linkedin.com/in.js"></script>

<?php
s4_fb_shareii_thumb();
}



function s4_fb_shareii_thumb()
{
$thumb = false;
if(function_exists('get_post_thumbnail_id')&&function_exists('wp_get_attachment_image_src'))
{
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$thumb = $image_url[0]; 
}
$default_img = get_option('s4defthumb',''); 
if ( $thumb == false ) 
	$thumb=$default_img; 

if(is_single()) { 
?>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php single_post_title(''); ?>" />
	<meta property="og:url" content="<?php the_permalink(); ?>"/>
	<?php if(trim($thumb)!=''){ ?>
		<meta property="og:image" content="<?php echo $thumb; ?>" />
	<?php } ?>
<?php  } else { ?>
	<meta property="og:type" content="article" />
  	<meta property="og:title" content="<?php bloginfo('name'); ?>" />
	<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<?php if(trim($default_img)!=''){ ?>
		<meta property="og:image" content="<?php echo $default_img; ?>" />
	<?php } ?>
<?php  } 

}
function s4scrolling_option()
{
?>
	<h2>Scrolling Social Share Plugin</h2>
	Like this Plugin then why not hit the like button. Your like will motivate me to enhance the features of the Plugin :)<br />
<iframe style="overflow: hidden; width: 450px; height: 35px;" src="http://www.facebook.com/plugins/like.php?app_id=199883273397074&amp;href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FTech-XT%2F223482634358279&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35" frameborder="0" scrolling="no" width="320" height="35"></iframe><br />And if you are too generous then you can always <b>DONATE</b> by clicking the donation button.<br/>If you like the plugin then <b>write a review</b> of it pointing out the plus and minus points.<br /><a href="http://letusbuzz.com/scrolling-tweet-like-google-1-linkedin-and-stumbleupon/" TARGET='_blank'>Click here</a> for <b>Reference on using shortcode/Function</b> or if you want to <b>report a bug</b>. 
<table class="form-ta">	
<tr valign="top">
<td width="78%">
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	<h3>Where to Display</h3>
	<p><input type="checkbox" name="ss_dpost" value="checked" <?php echo get_option('ss_dpost','checked'); ?> />Dispaly on Post</p>
	<p><input type="checkbox" name="ss_dpage" value="checked" <?php echo get_option('ss_dpage','checked'); ?> />Dispaly on Page</p>
	<p><b>Left Padding : </b><input style="width: 60px;" type="text" name="ss_leftpadding" value="<?php echo get_option('ss_leftpadding','-20px'); ?>" /> <b>Include px</b> at the end of the value<br />(Negative value will shift Icon Bar towards Left and Positive value will move it towards Right)</p>
	<p><b>Top Padding : </b><input style="width: 60px;" type="text" name="ss_toppadding" value="<?php echo get_option('ss_toppadding','20'); ?>" /> <b>Do not Include px</b> at the end of the value<br />(Increasing the value will move the bar Down)</p>
	<p><b>Change Scrolling Bar's Image</b></p>
	<p>Enter Image Path : <input style="width: 400px;" type="text" name="ss_baripath" value="<?php echo get_option('ss_baripath',''); ?>" /> Leave blank for default Image</p>
	<p>Width of Bar : <input style="width: 60px;" type="text" name="ss_barwidth" value="<?php echo get_option('ss_barwidth','25px'); ?>" /> <b>Include px</b> at the end of the value (default value 25px)</p>
	<p>Height of Bar : <input style="width: 60px;" type="text" name="ss_barheight" value="<?php echo get_option('ss_barheight','155px'); ?>" /> <b>Include px</b> at the end of the value (default value 155px)</p>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="ss_leftpadding,ss_toppadding,ss_dpost,ss_dpage,ss_baripath,ss_barwidth,ss_barheight" />
	<p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>
	</form>
</td><td width="2%">&nbsp;</td><td width="20%"><b>Follow us on</b><br/><a href="http://twitter.com/letusbuzz" target="_blank"><img src="http://a0.twimg.com/a/1303316982/images/twitter_logo_header.png" /></a><br/><a href="http://facebook.com/letusbuzzz" target="_blank"><img src="https://secure-media-sf2p.facebook.com/ads3/creative/pressroom/jpg/b_1234209334_facebook_logo.jpg" height="38px" width="118px"/></a><p></p><b>Feeds and News</b><br /><?php get_feeds_ss() ?>
<p></p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="isudipto@gmail.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Scrolling Tweet Like Share Plusone Plugin">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<br />Consider a Donation and remember $X is always better than $0
</td></tr></table>
<?php
}
function s4scrolling_admin()
{
	add_options_page('Scrolling Tweet Like Plusone', 'Scrolling Tweet Like Plusone', 7, 'scrollingtweet', 's4scrolling_option');
}
add_action('admin_menu', 's4scrolling_admin');
add_action('wp_head', 'social4iii_css');
add_filter('the_content', 'disp_socialsii',1);

function get_feeds_ss() {
	include_once(ABSPATH . WPINC . '/feed.php');
	$rss = fetch_feed('http://feeds.feedburner.com/letusbuzz');
	if (!is_wp_error( $rss ) ){
		$rss5 = $rss->get_item_quantity(5); 
		$rss1 = $rss->get_items(0, $rss5); 
	}
?>
<ul>
<?php if (!$rss5 == 0)foreach ( $rss1 as $item ){?>
<li style="list-style-type:circle">
<a target="_blank" href='<?php echo $item->get_permalink(); ?>'><?php echo $item->get_title(); ?></a>
</li>
<?php } ?>
</ul>
<?php
}
//===================================================================================//
function display_social4iii()
{
global $post;
$plink = get_permalink($post->ID);
$eplink = urlencode($plink);
$ptitle = get_the_title($post->ID);
$eptitle=str_replace(array(">","<"),"",$ptitle);
$twsc='';$flsc='';$gpsc='';$fssc='';

$sharelinks.='<div class="scrollbox" id="scrollbox"><ul><li><ul class="schildren"><li style="margin: 0pt ! important; list-style: none outside none !important; padding: 0pt !important;"><div id="tray" style="display: block;margin-left: 10px;margin-top: 5px;">';

$sharelinks.='<div class="socialscroll" ><div class="social4in" style="position:relative;">';

$sharelinks.= '<div class="socialiconss ssfblike" style="margin-left: 6px; height: 66px; margin-right: 16px;"><iframe src="http://www.facebook.com/plugins/like.php?app_id=126788060742161&amp;href='.$eplink.'&amp;send=false&amp;layout=box_count&amp;width=48&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:48px; height:90px;" allowTransparency="true"></iframe></div>';


$sharelinks.='<div class="socialiconss ssplusone" >'.$gpsc.'<g:plusone size="tall" href="'.$plink.'" count="true"></g:plusone></div>';

$sharelinks.= '<div style="clear: both;"></div></div>';

$sharelinks.= '<div class="social4in" style="position:relative"><div class="socialiconss sstwitter" style="width: 64px;height: 70px;"><a href="http://twitter.com/share" data-url="'.$plink.'" data-counturl="'.$plink.'" data-text="'.$eptitle.'" class="twitter-share-button" data-count="vertical" data-via="'.$via.'"></a>'.$twsc.'</div>';

$sharelinks.='<div class="socialiconss sslinkedin" ><script type="in/share" data-url="'.$plink.'" data-counter="top"></script></div>';

$sharelinks.= '<div style="clear: both;"></div></div>';

$sharelinks.= '<div class="social4in" style="position:relative"><div class="socialiconss ssstumble" style="width: 62px; margin-left: 2px;"><script src="http://www.stumbleupon.com/hostedbadge.php?s=5&r='.$plink.'"></script></div>';

$sharelinks.= '<div class="socialiconss ssfbshare" style="margin-top: -2px; height: 54px; width: 60px; background: url(http://lh6.googleusercontent.com/-khBs3Dennc8/TiggtecoVQI/AAAAAAAAAPM/fiINPv9guK4/s60/fbshare.png) no-repeat scroll 0pt 3px transparent;"><div class="s4ifbshare" style="position: absolute; bottom: 0pt;"><a name="fb_share" type="box_count" share_url="'.$eplink.'" href="http://www.facebook.com/sharer.php"></a>'.$fssc.'</div></div>';

$sharelinks.= '<div style="clear: both;"></div></div>';


$sharelinks.= '</div><div style="clear:both"></div></div></li></ul></li></ul></div>';
return $sharelinks;
}

?>