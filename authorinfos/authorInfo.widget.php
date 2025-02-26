<?php
/*
Plugin Name: AuthorInfos Widget
Plugin URI: http://xpablo.kilu.de/
Description: A little private widget.
Author: xPablo
Version: 2.3.0.1.1
Author URI: http://xpablo.kilu.de/
*/

/*
* ----------------------------------------------------------------------------------------------*
* "THE BEER-WARE LICENSE" (Revision 42):														*
* <pabloprietz@googlemail.com> schrieb diese Datei. Solange Sie diesen Vermerk nicht entfernen,	*
* koennen Sie mit der Datei machen, was Sie moechten. Wenn wir uns eines Tages treffen			*
* und Sie denken, die Datei ist es wert, koennen Sie mir dafuer ein Bier ausgeben. xPablo		*
* ----------------------------------------------------------------------------------------------*
*/

?>
<?php
add_option('widget_authorinfos2', array('title' => 'Author Infos', 'imgurl' => 'http://xpablo.kilu.de/~pablo/source/author.png', 'firsttext' => '', 'secondtext' => '', 'imglink' => ''), 'yes'); /* reserviert Speicher fŸr die Einstellungen */
function widget_authorinfos2($args) { /* Funktion zum Darstellen des Widgets */
	extract($args);
	$options = get_option('widget_authorinfos2');
		echo $before_widget;	
		echo $before_title . $options['title'] . $after_title; ?>
	<!-- hier Code fuer das auhtorInfos-Widget einfuegen -->
		<p><?php echo $options['firsttext']; ?></p>
		<a href="<?php echo $options['imglink']; ?>">
			<img src="<?php echo $options['imgurl']; ?>" alt="Author" style="margin: 0 0 0 0; width: 170px; padding: 0;" />
		</a>
		<p><?php echo $options['secondtext']; ?></p>
	<!-- bis hier hin -->
<?php
		echo $after_widget;
}

function widget_authorinfos2_control() { /* Funktion fŸr die Einstellungen */
	$options = $newoptions = get_option('widget_authorinfos2');
	if ( $_POST["authorinfos2-submit"] ) {
		
		$newoptions['title'] = strip_tags(stripslashes($_POST["authorinfos2-title"]));
		if (empty($newoptions['title']) ) $newoptions['title'] = 'Author Infos';
		
		$newoptions['imgurl'] = strip_tags(stripslashes($_POST["authorinfos2-imgurl"]));
		if (empty($newoptions['imgurl'])) $newoptions['imgurl'] = 'http://xpablo.kilu.de/~pablo/source/author.png';
		
		$newoptions['firsttext'] = strip_tags(stripslashes($_POST["authorinfos2-firsttext"]));
		if (empty($newoptions['firsttext'])) $newoptions['firsttext'] = '';
		
		$newoptions['secondtext'] = strip_tags(stripslashes($_POST['authorinfos2-secondtext']));
		if (empty($newoptions['secondtext'])) $newoptions['secondtext'] = '';
		
		$newoptions['imglink'] = strip_tags(stripslashes($_POST["authorinfos2-imglink"]));
		if (empty($newoptions['imglink'])) $newoptions['imglink'] = '';
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_authorinfos2', $options);
	}
	$title = htmlspecialchars($options['title'], ENT_QUOTES);
	$imgurl = htmlspecialchars($options['imgurl'], ENT_QUOTES);
	$firsttext = htmlspecialchars($options['firsttext'], ENT_QUOTES);
	$secondtext = htmlspecialchars($options['secondtext'], ENT_QUOTES);
	$imglink = htmlspecialchars($options['imglink'], ENT_QUOTES);
	?>
				<p><label for="authorinfos2-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="authorinfos2-title" name="authorinfos2-title" type="text" value="<?php echo $title; ?>" /></label></p>
				
				<p><label for="authorinfos2-imgurl"><?php _e('ImageURL:'); ?> <input style="width: 250px;" id="authorinfos2-imgurl" name="authorinfos2-imgurl" type="text" value="<?php echo $imgurl; ?>" /></label></p>
				
				<p><label for="authorinfos2-firsttext"><?php _e('1. Text (over the image):'); ?> <input style="width: 250px;" id="authorinfos2-firsttext" name="authorinfos2-firsttext" type="text" value="<?php echo $firsttext; ?>" /></label></p>

				<p><label for="authorinfos2-secondtext"><?php _e('2. Text (under the image):'); ?> <input style="width: 250px;" id="authorinfos2-secondtext" name="authorinfos2-secondtext" type="text" value="<?php echo $secondtext; ?>" /></label></p>

				<p><label for="authorinfos2-imglink"><?php _e('Location where the image links:'); ?> <input style="width: 250px;" id="authorinfos2-imglink" name="authorinfos2-imglink" type="text" value="<?php echo $imglink; ?>" /></label></p>
				
				<input type="hidden" id="authorinfos2-submit" name="authorinfos2-submit" value="1" />
	<?php
}

function authorinfos2_init(){ /* registriert das Widget und die Einstellungen */
	register_sidebar_widget(__('authorInfos2'), 'widget_authorinfos2');
	register_widget_control('authorInfos2', 'widget_authorinfos2_control', null, 75, 'authorinfos2');     
}
add_action("plugins_loaded", "authorinfos2_init"); /* initiiert das Plugin */
?>