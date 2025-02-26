=== WP-UTF8-Excerpt ===
Tags: post, excerpt, homepage, archive
Tested up to: 5.8
Stable tag: 0.8.3

This plugin generates a better excerpt for multi-byte language users (Chinese, for example). Besides, it keeps the html tags in the excerpt.

== Description ==
= Main features of the plugin: =
1. It supports multi-byte language (such as Chinese). It will not produce gibberish as some other excerpt plugins do.
2. The html tags in the original posts, i.e., the font styles, colors, hyperlinks, pictures and such are preserved in the excerpt.
3. For better readability, it displays 300 characters for each post on the homepage and 150 characters for each post on archive pages.

== Installation ==
1. Unzip and upload the `wp-utf8-excerpt` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

And it's done!

If it does not work, look in your theme directory, edit the index.php file by changing

		<?php the_content(); ?>

to

		<?php
			if (is_single() or is_page()) {
				the_content();
			} else {
				the_excerpt();
			} 
		?>

注意：有些主题在the_content()中还有一些字，比如the_content(’Continue Reading »’)，这种要把整句话换掉。有些主题用了其他文件来控制存档页面，如category.php、archive.php等，如有必要，请对这些文件也做修改。

== Frequently Asked Questions ==
= 想/不想在摘要中显示某些标签，比如图片、视频，怎么办？ =

答：进入后台设置页面（Settings——Excerpt），修改Allow these HTML tags中的内容。
默认设置显示图片，不想显示图片的话就把<img>删掉。
默认设置不显示视频，想显示视频的话就加入视频的标签，各个视频网站不一样，有可能是<embed>或<object>或其他，查看插入视频的代码就知道了。
其他标签以此类推。

= 为什么我的RSS Feed不显示全文？ =

答：本插件没有动RSS Feed，你的Feed不显示全文，应该跟本插件无关。请查看你的后台——设置——阅读——Feed中每篇文章，是不是选成摘要了。

= 我用了代码高亮插件，显示不正常？ =

答：用代码格式化插件好像确实容易出问题。对于这种文章，暂时请大家先手动加摘要吧，我再想想办法。

= 我讨厌那个“继续阅读”链接，怎么办？ =

答：后台选项中可以设置“继续阅读”的文本，你可以改成“Read more”或其他任何东西。它的class为read-more，可以用CSS进行美化或隐藏。如果你实在讨厌它，请打开插件文件wp-utf8-excerpt.php，找到165行左右的

		$text .= "<p class='read-more'><a href='".get_permalink()."'>".$read_more_link."</a></p>";

删掉它，或者注释掉它（在行首加上//），这个链接就不会出现了。

		
== Changelog ==
0.8.2 fix a bug caused by function excerpt_remove_blocks() undefined

0.8.1 support password protection; very short posts will also show the 'read more' link

0.8	support latest WP version; better performance; fix typos; give warning if the PHP mbstring library is not available

0.6.2	search result page is now treated as archive page

0.6.1	fix numerous compatibility issues after hooking the_content; now works with WP-Syntax!

0.6	support latest WP version; no longer need to edit theme files; i18n; almost rewrite to optimize performance

0.5.3	you can change the text of the read more link now

0.5.2	add more default allowed tags, to make it more convenient

0.5.1	fix a small bug about the <!--more--> tag

0.5		add the option to set the HTML tags you'd like to preserve

0.4.2.1 fix a small bug

0.4.2	fix a bug caused by the bug fixed in 0.4.1

0.4.1	fix a "missing argument for mb_strlen" bug

0.4		add an option page. Now you can set the excerpt length in Settings->Excerpt.

0.3.4   add support for the <!--more--> tag; give the "read more" link a "read-more" class so that one can control its style via css

0.3.3	fix: display the "read more" link even if the excerpt is given by the user

0.3.2	fix a bug in the "read more" link (the permalink)

0.3.1	add a "read more" link

0.3 	release
