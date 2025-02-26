=== Ghost blog ===
Contributors: Lyman
Plugin URI: http://www.yaaahaaa.com/2009/07/24/ghost-blog.html
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=phsjackgatesljy@gmail.com&amount=&return=&item_name=Lyman+for+ghost_blog

Tags: ghost blog, mutiple entry with one version
Requires at least: 2.0.2
Tested up to: 2.8
Stable tag: trunk

This plugin would help you ghost some of your blog post,then when you change one, the other ghost version will change automaticly

== Description ==

这个插件可以让你的blog有个ghost功能，如果你想创建一个cms，比如类似学校课程的列表，会按照不同专业列出课程，不同的专业可能会有相同的专业课或选修课程，这个时候，你可以建多个文章标题比如: 
website
-php
–wordpress
-html
–wordpress(for designer)
此时，你可能想要2个跟wordpress的文章的内容一样，并且，改变其中一个的时候，另一个也同时改变，就像是一篇文章的内容，可以放到2个文章里一样。
在你想ghost的blog内容里写上你要ghost的文章id即可类似如此： [ghost=897]
这样插件就会自动获取id为897的文章的内容。

This plugin would let your blog got a ghost function,just like if you want to create a cms system,like a course list for different specialities,but for different specialities,there must be some courses would be the same,for then,you could create different blog post or page to to this:
website
-php
–wordpress
-html
–wordpress(for designer)
Then, you maybe want two of the wordpress course got the same content, and when you change one of the content,then all of the other content would be change,just like you put one content in two blog posts.
Check out the plugin URL, for more information.
Put the tag into the new post that you want to ghost: [ghost=897]
Then the plugin would automaticly get the content of the post 897(the post id) to the new blog you want to be show

== Changelog ==

= 1.0 =
* The first release version
= 1.3 =
* Fix some bug, using the $inner_query method