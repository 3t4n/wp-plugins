<?
	if($_GET["user"] == ""){
                return;
		//die("user is required");
	}
	$u = $_GET["user"];
	header("Content-type: application/xml");
	echo '<?xml version="1.0" encoding="iso-8859-1"?>';
?>
<rss version="2.0" 
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:admin="http://webns.net/mvcb/"
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<language>en-us</language>
		<title><?=$u?>'s favorite pictures</title> 
		<link>http://flickr.com/<?=$u?>/favorites/</link> 
		<description><?=$u?>'s favorite pictures from flickr, script by b3co.com</description>
		<pubDate><?=date("D, j M Y H:i:s")?> -0400</pubDate>
		<copyright>b3co.com</copyright>
		<managingEditor>root@b3co.com</managingEditor>
 
<?
	$data = implode("",file("http://www.flickr.com/photos/$u/favorites")/*fetchURL("http://www.flickr.com/photos/$u/favorites")*/);


	$regexp = "/<a href=\"\/photos\/(.*)\/\" title=\"(.*)\"><img src=\"(.*)\"/";
	preg_match_all($regexp, $data, $matches, PREG_SET_ORDER);
	for($i = 0; $i < count($matches); $i++){
?>
	  <item>
		<title><?=$matches[$i][2]?></title> 
		<link>http://www.flickr.com/photos/<?=$matches[$i][1]?>/</link> 
		<content:encoded><![CDATA[<img src="<?=str_replace("_s.jpg","_m.jpg",$matches[$i][3])?>"/>]]></content:encoded>
		<pubDate><?=date("D, j M Y H:i:s")?> -0400</pubDate>
		<author><?=$matches[$i][2]?> @ flickr.com</author>
	  </item>
<?
	}
?>
	</channel>
</rss>
