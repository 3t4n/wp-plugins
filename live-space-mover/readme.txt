=== Plugin Name ===
Contributors: broom9
Donate link: http://blog.broom9.com/?page_id=519#donate
Tags: live_space, migrate, import, msn_space,move,importer
Requires at least: 2.1
Tested up to: 2.1.3
Stable tag: 0.93

A python script for importing blog entries from live space to WordPress.

== Description ==

A python script for importing blog entries from live space to WordPress.
Can move both posts and comments (since version 0.9). Provides 3 modes : "postsOnly","commentsOnly" and "all".
Based on the wonderful HTML parser library [BeautifulSoup](http://www.crummy.com/software/BeautifulSoup/).

= Notes =

*   If you met an "UnicodeDecodeError", that¡¯s probably because your live space contains Italian or other languages. There is a bug in Python 2.5, you need to fix it. Yes, fix Python library by your own hands :P

    If you installed Python to it¡¯s default path on Windows, what you need to do is to change the file C:\Python25\Lib\sgmlib.py, in line 394
    
  	`if not 0 <= n <= 255:`
    
    should be changed to
  	
  	`if not 0 <= n <= 127:`
  	
    That¡¯s all, I learned this from [here](http://mail.python.org/pipermail/python-bugs-list/2007-February/037082.html)
  
* This mover heavily depends on some very weird and sucking patterns of HTML and JavaScript codes in live space. So it may become unusable at any time¡­.in that case please notice me

* As I studied, the metaWeblog API in WordPress seems not to support comments? WordPress supports other two kinds of XML-RPC interfaces, too, blogger and MovableType. The blogger API has been updated to GData, and the old API looks not supporting comments, too. The documentation of MovableType API is so complex¡­.I can¡¯t understand yet.So maybe it would be much easier to write a mover with PHP which can handle comments.

* This mover heavily depends on some very weird and sucking patterns of HTML and JavaScript codes in live space. So it may become unusable at any time¡­.in that case please notice me

* As I studied, the metaWeblog API in WordPress seems not to support comments? WordPress supports other two kinds of XML-RPC interfaces, too, blogger and MovableType. The blogger API has been updated to GData, and the old API looks not supporting comments, too. The documentation of MovableType API is so complex¡­.I can¡¯t understand yet.So maybe it would be much easier to write a mover with PHP which can handle comments.

* This script may generate log file and cache file in the working directory. If you met some errors, it would be very helpful to send the log file and error message to me. Thank you.This script may generate log file and cache file in the working directory. If you met some errors, it would be very helpful to send the log file and error message to me. Thank you.

= Change Log =
* Version 0.93
  - Add Donate Link
* Version 0.92
  - Fix some bugs
* Version 0.9
  - NEW: Support moving comments. Add file "my-wp-comments-post.php" for posting comments
  - NEW: Add running modes, for only moving posts/comments, or both
* Version 0.2
  - BUG: Error when reading live space in Italian or other languages. Actually it¡¯s a bug of Python 2.5.
  - BUG: Doesn¡¯t jump out loop after moving the oldest entry.
  - NEW: Support date format pattern specifying, added -t option
  - NEW: Support starting from a specified entry, added -f option
* Version 0.1
  - NEW: Starting, used to move my own live space

= Thanks =
Great Thanks for [Michele Nasti](http://www.ilparticolarenascosto.it/ "His blog") and [Oliver Diaz Herrera](http://saoblog.laventanadesaouri.com/ "I guess this is his girlfriend's blog"), they used this script, reported bugs to me and helped me to solve them. I¡¯m not a patient guy and I don¡¯t have many blogs to test this script too much. It¡¯s them, the nice users, who made this script really usable.
It¡¯s so wonderful to cooperate with guys all around the world ;-p

== Installation ==

1.  Install [Python runtime](http://python.org/download/). I only tested this code on Python 2.5.

1.  Download the most recent release zip, extract it.

1.  Download the [BeautifulSoup.py](http://www.crummy.com/software/BeautifulSoup/download/BeautifulSoup.py), and place it in the same directory of live-space-mover.py, or install it into Python runtime by yourself

1.  Change your live space settings
   * Make sure it is open for anyone
   * Change time zone to be GMT (+00:00)
   * Change date format to be yyyy/mm/dd, or mm/dd/yyyy, this probably depends on the locale setting of your system or browser. If the program fails and complains about date parsing, try to use the option -t to specify date time format.
   
1.  If your live space isn¡¯t written by English or Chinese, see 1st Note to check if you need to fix something of Python.

1.  If want to move comments, you must have previlege to upload file to destination blogs.
    * Upload the file `my-wp-comments-post.php` from live-space-mover zip file to the root directory of your blog. It can be removed after using this.
    * Deactivate anti-spam plugins of your blog, such as `Akismet`.
    
1.  Run the live-space-mover.py script. In Windows, open the command line, change to the directory of live-space-mover.py, run command like this

    `python live-space-mover.py -s http://yourspaceid.spaces.live.com/ -d http://your.wordpress.blog.com/xmlrpc.php -u yourusername -p yourpassword`
    
    Replace the example values with your own.
    
    If you have moved posts with earlier version of this script, only want to move comments now. Use command like this
    
    `python live-space-mover.py -s http://yourspaceid.spaces.live.com/ -d http://your.wordpress.blog.com/xmlrpc.php -u yourusername -p yourpassword -m commentsOnly -a 100`
    
    the option -a is for specifying the max post id of your destination blog, check the permalink (e.g., for http://blog.broom9.com/?p=570, the post id is 570) of your latest post to see it
    
1.  Use command

    `python live-space-mover.py -help`
   
    to check supported options of this script


== Frequently Asked Questions ==
Not any questions yet

== Screenshots ==
No screenshots