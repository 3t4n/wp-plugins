<?php
/*
Plugin Name: Add Me Dichev
Version: 0.1
Plugin URI: http://dichev.com/blog/webdesign/wordpress_social_bookmarks_buttons_plugin_howto/
Description: Add Me Dichev simply renders social bookmark buttons after the post body, including the Bulgarian social networks. For tutorial and updates visit the <a href="http://dichev.com/blog/webdesign/wordpress_social_bookmarks_buttons_plugin_howto/" target="_blank">plugin page</a>.
Author: Alexander Dichev
Author URI: http://dichev.com/
*/

function add_me($content) {

    // Hello
    global $post;
	
	// DIV-width in percents or pixels (Example: "90%" or "450px")
	$my_width = '100%';
	
	// Alignment of the buttons ("left", "right" or "center")
	$my_align = 'center';
	
	// Location of the folder with the icons of the buttons
	$my_images_folder = get_settings('home') . '/wp-content/plugins/add-me-dichev/images/';
	
	// We take the post details in the following variables
	$my_link = get_permalink($post->ID);	
    $my_title = get_the_title($post->ID);

    // And now we siply render all the links.
	// You can add or delete (comment) some lines to modify the buttons
	
	// If you add a new network button
	// do not forget to upload an image for the button
	// default image size is 16 x 16 pixels
	
	if ( !is_feed() && !is_page() ) {
		$content .= "\n\n" . '<!-- Begin Add Me Dichev social bookmarks plugin -->' . "\n"
                  . '<!-- http://dichev.com/blog/webdesign/wordpress_social_bookmarks_buttons_plugin/ -->' . "\n"
                  . '<div style="padding:16px 0 16px 0;text-align:' . $my_align . ';width:' . $my_width . ';">' . "\n"
				  
                  . '<a href="http://addthis.com/bookmark.php?pub=&amp;url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Add This!"><img src="' . $my_images_folder . 'addthis.gif" style="width:16px;height:16px;border:0px;" alt="Add This!" title="Add This!" /></a>' . "\n"
                  . '<a href="http://blinkbits.com/bookmarklets/save.php?v=1&amp;title=' . $my_title . '&amp;source_url=' . $my_link . '&amp;source_image_url=&amp;rss_feed_url=&amp;rss_feed_url=&amp;rss2member=&amp;body=" target="_blank" rel="nofollow" title="Blinkbits"><img src="' . $my_images_folder . 'blinkbits.gif" style="width:16px;height:16px;border:0px;" alt="Blinkbits" title="Blinkbits" /></a>' . "\n"
                  . '<a href="http://blinklist.com/index.php?Action=Blink/addblink.php&amp;Description=&amp;Url=' . $my_link . '&amp;Title=' . $my_title . '" target="_blank" rel="nofollow" title="Blinklist"><img src="' . $my_images_folder . 'blinklist.gif" style="width:16px;height:16px;border:0px;" alt="Blinklist" title="Blinklist" /></a>' . "\n"				  
                  . '<a href="http://blogmarks.net/my/marks,new?mini=1&amp;title=' . $my_title . '&amp;url=' . $my_link . '" target="_blank" rel="nofollow" title="Blogmarks"><img src="' . $my_images_folder . 'blogmarks.gif" style="width:16px;height:16px;border:0px;" alt="Blogmarks" title="Blogmarks" /></a>' . "\n"				  
                  . '<a href="http://blogmemes.net/post.php?url=' . $my_link . '&amp;title=' . $my_title . '" title="BlogMemes" target="_blank" rel="nofollow"><img src="' . $my_images_folder . 'blogmemes.gif" style="width:16px;height:16px;border:0px;" title="BlogMemes" alt="BlogMemes" /></a>' . "\n"
                  . '<a href="http://bluedot.us/Authoring.aspx?u=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="BlueDot"><img src="' . $my_images_folder . 'bluedot.gif" style="width:16px;height:16px;border:0px;" title="BlueDot" alt="BlueDot" /></a>' . "\n"
                  . '<a href="http://bloglines.com/sub/' . $my_link . '" target="_blank" rel="nofollow" title="BlogLines"><img src="' . $my_images_folder . 'bloglines.gif" style="width:16px;height:16px;border:0px;" alt="BlogLines" title="BlogLines" /></a>' . "\n"
                  . '<a href="http://co.mments.com/track?url=' . $my_link . '" target="_blank" rel="nofollow" title="co.mments"><img src="' . $my_images_folder . 'comments.gif" style="width:16px;height:16px;border:0px;" alt="co.mments" title="co.mments" /></a>' . "\n"
                  . '<a href="http://connotea.org/addpopup?continue=confirm&amp;uri=' . $my_link . '" target="_blank" rel="nofollow" title="Connotea"><img src="' . $my_images_folder . 'connotea.gif" style="width:16px;height:16px;border:0px;" alt="Connotea" title="Connotea" /></a>' . "\n"
                  . '<a href="http://del.icio.us/post?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="del.icio.us"><img src="' . $my_images_folder . 'delicious.gif" style="width:16px;height:16px;border:0px;" alt="del.icio.us" title="del.icio.us" /></a>' . "\n"
                  . '<a href="http://de.lirio.us/rubric/post?uri=' . $my_link . '" target="_blank" rel="nofollow" title="de.lirio.us"><img src="' . $my_images_folder . 'delirious.gif" style="width:16px;height:16px;border:0px;" alt="de.lirio.us" title="de.lirio.us" /></a>' . "\n"
                  . '<a href="http://digg.com/submit?phase=2&amp;url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Digg"><img src="' . $my_images_folder . 'digg.gif" style="width:16px;height:16px;border:0px;" alt="Digg" title="Digg" /></a>' . "\n"
                  . '<a href="http://diigo.com/post?url=' . $my_link . '&amp;title=' . $my_title . '&amp;tag=&amp;comments=" target="_blank" rel="nofollow" title="Diigo"><img src="' . $my_images_folder . 'diigo.gif" style="width:16px;height:16px;border:0px;" alt="Diigo" title="Diigo" /></a>' . "\n"
                  . '<a href="http://dzone.com/links/add.html?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="DZone"><img src="' . $my_images_folder . 'dzone.gif" style="width:16px;height:16px;border:0px;" alt="DZone" title="DZone" /></a>' . "\n"
                  . '<a href="http://facebook.com/sharer.php?u=' . $my_link . '&amp;t=' . $my_title . '" target="_blank" rel="nofollow" title="Facebook"><img src="' . $my_images_folder . 'facebook.gif" style="width:16px;height:16px;border:0px;" alt="Facebook" title="Facebook" /></a>' . "\n"
                  . '<a href="http://feedmelinks.com/categorize?from=toolbar&amp;op=submit&amp;url=' . $my_link . '&amp;name=' . $my_title . '" target="_blank" rel="nofollow" title="FeedMeLinks"><img src="' . $my_images_folder . 'feedmelinks.gif" style="width:16px;height:16px;border:0px;" title="FeedMeLinks" alt="FeedMeLinks" /></a>' . "\n"	
                  . '<a href="http://folkd.com/submit/' . $my_link . '" target="_blank" rel="nofollow" title="Folkd.com"><img src="' . $my_images_folder . 'folkd.gif" style="width:16px;height:16px;border:0px;" alt="Folkd.com" title="Folkd.com" /></a>' . "\n"
                  . '<a href="http://extension.fleck.com/?v=b.0.804&amp;url=' . $my_link . '" target="_blank" rel="nofollow" title="Fleck"><img src="' . $my_images_folder . 'fleck.gif" style="width:16px;height:16px;border:0px;" title="Fleck" alt="Fleck" /></a>' . "\n"                  . '<a href="http://furl.net/storeIt.jsp?t=' . $my_title . '&amp;u=' . $my_link . '" target="_blank" rel="nofollow" title="Furl"><img src="' . $my_images_folder . 'furl.gif" style="width:16px;height:16px;border:0px;" alt="Furl" title="Furl" /></a>' . "\n"				  				  
                  . '<a href="http://google.com/bookmarks/mark?op=add&amp;bkmk=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Google"><img src="' . $my_images_folder . 'google.gif" style="width:16px;height:16px;border:0px;" alt="Google" title="Google" /></a>' . "\n"
                  . '<a href="http://google.com/reader/preview/*/feed/' . $my_link . '" target="_blank" rel="nofollow" title="Google Reader"><img src="' . $my_images_folder . 'google_reader.gif" style="width:16px;height:16px;border:0px;" alt="Google Reader" title="Google Reader" /></a>' . "\n"
                  . '<a href="http://icio.de/add.php?url=' . $my_link . '" target="_blank" rel="nofollow" title="isio.de"><img src="' . $my_images_folder . 'icio.gif" style="width:16px;height:16px;border:0px;" alt="icio.de" title="icio.de" /></a>' . "\n"
                  . '<a href="http://indianpad.com/submit.php?url=' . $my_link . '" target="_blank" rel="nofollow" title="IndianPad"><img src="' . $my_images_folder . 'indianpad.gif" style="width:16px;height:16px;border:0px;" title="IndianPad" alt="IndianPad" /></a>' . "\n"
                  . '<a href="http://leonaut.com/submit.php?url=' . $my_link . '" target="_blank" rel="nofollow" title="Leonaut"><img src="' . $my_images_folder . 'leonaut-com.gif" style="width:16px;height:16px;border:0px;" title="Leonaut" alt="Leonaut" /></a>' . "\n"				  
                  . '<a href="http://linkagogo.com/go/AddNoPopup?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="LinkaGoGo"><img src="' . $my_images_folder . 'linkagogo.gif" style="width:16px;height:16px;border:0px;" title="LinkaGoGo" alt="LinkaGoGo" /></a>' . "\n"
                  . '<a href="http://linkarena.com/bookmarks/addlink/?url=' . $my_link . '" target="_blank" rel="nofollow" title="Linkarena"><img src="' . $my_images_folder . 'linkarena.gif" style="width:16px;height:16px;border:0px;" alt="Linkarena" title="Linkarena" /></a>' . "\n"
                  . '<a href="http://linkter.hu/index.php?action=suggest_link&amp;url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Linkter"><img src="' . $my_images_folder . 'linkter.gif" style="width:16px;height:16px;border:0px;" title="Linkter" alt="Linkter" /></a>' . "\n"
                  . '<a href="http://ma.gnolia.com/beta/bookmarklet/add?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Magnolia"><img src="' . $my_images_folder . 'magnolia.gif" style="width:16px;height:16px;border:0px;" alt="Magnolia" title="Magnolia" /></a>' . "\n"				  
                  . '<a href="http://mister-wong.de/index.php?action=addurl&amp;bm_url=' . $my_link . '&amp;bm_description=' . $my_title . '" target="_blank" rel="nofollow" title="Mister Wong"><img src="' . $my_images_folder . 'mrwong.gif" style="width:16px;height:16px;border:0px;" alt="Mister Wong" title="Mister Wong" /></a>' . "\n"				  
                  . '<a href="http://myshare.url.com.tw/index.php?func=newurl&amp;url=' . $my_link . '&amp;desc=' . $my_title . '" target="_blank" rel="nofollow" title="MyShare"><img src="' . $my_images_folder . 'myshare.gif" style="width:16px;height:16px;border:0px;" title="MyShare" alt="MyShare" /></a>' . "\n"
                  . '<a href="http://myjeeves.ask.com/mysearch/BookmarkIt?v=1.2&amp;t=webpages&amp;url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Ask.com"><img src="' . $my_images_folder . 'ask.gif" style="width:16px;height:16px;border:0px;" title="Ask.com" alt="Ask.com" /></a>' . "\n"
                  . '<a href="http://mystuff.ask.com/mysearch/QuickWebSave?v=1.2&amp;amp;t=webpages&amp;title=' . $my_title . '&amp;url=' . $my_link . '" target="_blank" rel="nofollow" title="MyStuff Ask.com"><img src="' . $my_images_folder . 'ask.gif" style="width:16px;height:16px;border:0px;" alt="MyStuff Ask.com" title="MyStuff Ask.com" /></a>' . "\n"
                  . '<a href="http://myweb2.search.yahoo.com/myresults/bookmarklet?t=' . $my_title . '&amp;u=' . $my_link . '" target="_blank" rel="nofollow" title="Yahoo! MyWeb"><img src="' . $my_images_folder . 'yahoo.gif" style="width:16px;height:16px;border:0px;" alt="Yahoo! MyWeb" title="Post to Yahoo! MyWeb" /></a>' . "\n"
                  . '<a href="http://netscape.com/submit/?U=' . $my_link . '&amp;T=' . $my_title . '" target="_blank" rel="nofollow" title="Netscape"><img src="' . $my_images_folder . 'netscape.gif" style="width:16px;height:16px;border:0px;" alt="Netscape" title="Netscape" /></a>' . "\n"
                  . '<a href="http://netvouz.com/action/submitBookmark?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Netvouz"><img src="' . $my_images_folder . 'netvouz.gif" style="width:16px;height:16px;border:0px;" alt="Netvouz" title="Netvouz" /></a>' . "\n"
                  . '<a href="http://newsgator.com/ngs/subscriber/subext.aspx?url=' . $my_link . '" target="_blank" rel="nofollow" title="Newsgator"><img src="' . $my_images_folder . 'newsgator.gif" style="width:16px;height:16px;border:0px;" alt="Newsgator" title="Newsgator" /></a>' . "\n"
                  . '<a href="http://newsvine.com/_tools/seed&amp;save?u=' . $my_link . '&amp;h=' . $my_title . '" target="_blank" rel="nofollow" title="Newsvine"><img src="' . $my_images_folder . 'newsvine.gif" style="width:16px;height:16px;border:0px;" alt="Newsvine" title="Newsvine" /></a>' . "\n"
                  . '<a href="http://beta.oneview.de:80/quickadd/neu/addBookmark.jsf?URL=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Oneview.de"><img src="' . $my_images_folder . 'oneview.gif" style="width:16px;height:16px;border:0px;" alt="Oneview.de" title="Oneview.de" /></a>' . "\n"
                  . '<a href="http://rawsugar.com/tagger/?turl=' . $my_link . '&amp;tttl=' . $my_title . '" target="_blank" rel="nofollow" title="RawSugar"><img src="' . $my_images_folder . 'rawsugar.gif" style="width:16px;height:16px;border:0px;" alt="RawSugar" title="RawSugar" /></a>' . "\n"
                  . '<a href="http://reddit.com/submit?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="reddit"><img src="' . $my_images_folder . 'reddit.gif" style="width:16px;height:16px;border:0px;" alt="reddit" title="reddit" /></a>' . "\n"
                  . '<a href="http://rojo.com/submit/?title=' . $my_title . '&amp;url=' . $my_link . '" target="_blank" rel="nofollow" title="Rojo"><img src="' . $my_images_folder . 'rojo.gif" style="width:16px;height:16px;border:0px;" alt="Rojo" title="Rojo" /></a>' . "\n"
                  . '<a href="http://segnalo.alice.it/login.html.php?uri=%2Fpost.html.php%3Furl%3D' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Segnalo"><img src="' . $my_images_folder . 'segnalo.gif" style="width:16px;height:16px;border:0px;" title="Segnalo" alt="Segnalo" /></a>' . "\n"
                  . '<a href="http://shadows.com/shadow/?page=' . $my_link . '" target="_blank" rel="nofollow" title="Shadows"><img src="' . $my_images_folder . 'shadows.gif" style="width:16px;height:16px;border:0px;" alt="Shadows" title="Shadows" /></a>' . "\n"
                  . '<a href="http://simpy.com/simpy/LinkAdd.do?href=' . $my_link . '&amp;title=' . $my_title . '&amp;v=6&amp;src=bookmarklet" target="_blank" rel="nofollow" title="Simpy"><img src="' . $my_images_folder . 'simpy.gif" style="width:16px;height:16px;border:0px;" alt="Simpy" title="Simpy" /></a>' . "\n"
                  . '<a href="http://slashdot.org/bookmark.pl?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="SlashDot"><img src="' . $my_images_folder . 'slashdot.gif" style="width:16px;height:16px;border:0px;" title="SlashDot" alt="SlashDot" /></a>' . "\n"
                  . '<a href="http://smarking.com/editbookmark/?url=' . $my_link . '" target="_blank" rel="nofollow" title="Smarking"><img src="' . $my_images_folder . 'smarking.gif" style="width:16px;height:16px;border:0px;" alt="Smarking" title="Smarking" /></a>' . "\n"
                  . '<a href="http://sphere.com/search?q=sphereit:' . $my_link . '" target="_blank" rel="nofollow" title="SphereIt"><img src="' . $my_images_folder . 'sphere.gif" style="width:16px;height:16px;border:0px;" title="Sphere" alt="Sphere" /></a>' . "\n"
                  . '<a href="http://spurl.net/spurl.php?title=' . $my_title . '&amp;url=' . $my_link . '" target="_blank" rel="nofollow" title="Spurl"><img src="' . $my_images_folder . 'spurl.gif" style="width:16px;height:16px;border:0px;" alt="Spurl" title="Spurl" /></a>' . "\n"				  
                  . '<a href="http://startaid.com/index.php?st=AddBrowserLink&amp;type=Detail&amp;v=3&amp;urlname=' . $my_link . '&amp;urltitle=' . $my_title . '" target="_blank" rel="nofollow" title="Startaid"><img src="' . $my_images_folder . 'startaid.gif" style="width:16px;height:16px;border:0px;" alt="Startaid" title="Startaid" /></a>' . "\n"				  
                  . '<a href="http://stumbleupon.com/submit?url=' . $my_link . '&amp;title=' . $my_title . '&amp;newcomment=' . $my_title . '" target="_blank" rel="nofollow" title="StumbleUpon"><img src="' . $my_images_folder . 'stumbleupon.gif" style="width:16px;height:16px;border:0px;" alt="StumbleUpon" title="StumbleUpon" /></a>' . "\n"
                  . '<a href="http://tailrank.com/share/?text=&amp;link_href=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="TailRank"><img src="' . $my_images_folder . 'tailrank.gif" style="width:16px;height:16px;border:0px;" title="TailRank" alt="TailRank" /></a>' . "\n"
                  . '<a href="http://technorati.com/faves?add=' . $my_link . '" target="_blank" rel="nofollow" title="Technorati"><img src="' . $my_images_folder . 'technorati.gif" style="width:16px;height:16px;border:0px;" alt="Technorati" title="Technorati" /></a>' . "\n"
                  . '<a href="http://thisnext.com/pick/new/submit/sociable/?url=' . $my_link . '&amp;name=' . $my_title . '" target="_blank" rel="nofollow" title="ThisNext"><img src="' . $my_images_folder . 'thisnext.gif" style="width:16px;height:16px;border:0px;" title="ThisNext" alt="ThisNext" /></a>' . "\n"
                  . '<a href="http://yigg.de/neu?exturl=' . $my_link . '" target="_blank" rel="nofollow" title="yigg.de"><img src="' . $my_images_folder . 'yigg.gif" style="width:16px;height:16px;border:0px;" alt="yigg.de" title="yigg.de" /></a>' . "\n"
                  . '<a href="http://webnews.de/einstellen?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Webnews.de"><img src="' . $my_images_folder . 'webnews.gif" style="width:16px;height:16px;border:0px;" alt="Webnews.de" title="Webnews.de" /></a>' . "\n"
                  . '<a href="http://readme.ru/?act=submit&amp;url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="ReadMe.ru"><img src="' . $my_images_folder . 'readmeru.gif" style="width:16px;height:16px;border:0px;" alt="ReadMe.ru" title="ReadMe.ru" /></a>' . "\n"
                  . '<a href="http://dobavi.com/quickpost.php?address=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Dobavi.com"><img src="' . $my_images_folder . 'dobavicom.gif" style="width:16px;height:16px;border:0px;" alt="Dobavi.com" title="Dobavi.com" /></a>' . "\n"
                  . '<a href="http://dao.bg/submit.php?url=' . $my_link . '" target="_blank" rel="nofollow" title="Dao.bg"><img src="' . $my_images_folder . 'daobg.gif" style="width:16px;height:16px;border:0px;" alt="Dao.bg" title="Dao.bg" /></a>' . "\n"
                  . '<a href="http://lubimi.com/bookmarks.php/?action=add&amp;popup=1&amp;address=' . $my_link . '" target="_blank" rel="nofollow" title="Lubimi.com"><img src="' . $my_images_folder . 'lubimi.gif" style="width:16px;height:16px;border:0px;" alt="Lubimi.com" title="Lubimi.com" /></a>' . "\n"
	              . '<a href="http://ping.bg/submit?step=2&amp;url=' . $my_link . '" target="_blank" rel="nofollow" title="Ping.bg"><img src="' . $my_images_folder . 'pingbg.gif" style="width:16px;height:16px;border:0px;" alt="Ping.bg" title="Ping.bg" /></a>' . "\n"
                  . '<a href="http://pipe.bg/submit.php?url=' . $my_link . '" target="_blank" rel="nofollow" title="Pipe.bg"><img src="' . $my_images_folder . 'pipebg.gif" style="width:16px;height:16px;border:0px;" alt="Pipe.bg" title="Pipe.bg" /></a>' . "\n"
                  . '<a href="http://svejo.net/story/submit_by_url?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Svejo.net"><img src="' . $my_images_folder . 'svejonet.gif" style="width:16px;height:16px;border:0px;" alt="Svejo.net" title="Svejo.net" /></a>' . "\n"
                  . '<a href="http://web-bg.com/login.php?return=/submit.php?url=' . $my_link . '&amp;title=' . $my_title . '" target="_blank" rel="nofollow" title="Web-bg.com"><img src="' . $my_images_folder . 'webbgcom.gif" style="width:16px;height:16px;border:0px;" alt="Web-bg.com" title="Web-bg.com" /></a>' . "\n"
				  . '<a href="http://dichev.com/" target="_blank" title="Plugin by Dichev.com"><img src="' . $my_images_folder . 'dichev_com.gif" style="width:16px;height:16px;border:0px;" alt="Plugin by Dichev.com" title="Plugin by Dichev.com" /></a>' . "\n"

                  . '</div>' . "\n"
				  . '<!-- End Add Me Dichev social bookmarks plugin -->' . "\n\n";				  
    }				  
	return $content;
}

add_filter('the_content', 'add_me', 1097);

?>