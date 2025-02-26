<?php

// functions that create our options page

class kb_inlinePicasa_options{
	
	// option names
	var $opt_maxsize;
	var $opt_update;
	var $opt_cachetime;
	var $opt_other;
	
	// option values
	var $maxsize = 400;	// default image size
	var $cachetime = 604800; // default cache time for an album (1 week)
	var $update;
	var $other; // opt_other
	
	// used internally
	var $valid_sizes;

	// sets all defaults
	function kb_inlinePicasa_options(){
		// set option names
		$this->opt_maxsize = KB_INLINEPICASA_OPTION . 'maxsize';
		$this->opt_update = KB_INLINEPICASA_OPTION . 'update'; // timestamp of last change to plugin's options
		$this->opt_cachetime = KB_INLINEPICASA_OPTION . 'cachetime';
		$this->opt_other = KB_INLINEPICASA_OPTION . 'other'; // array of assorted options
		
		// is maxsize set, or use default?
		$maxsize = get_option( $this->opt_maxsize );
		if ($maxsize)
			$this->maxsize = $maxsize;

		// is $cachetime set, or use default?
		$cachetime = get_option( $this->opt_cachetime );
		if ($cachetime)
			$this->cachetime = $cachetime;

		// process options in opt_other. These are all 1 or 0 options.
		$this->other = get_option( $this->opt_other );
		if (!$this->other)
			$this->other = array();
		global $kb_inlinePicasa_defaults;
		$this->other = array_merge( $kb_inlinePicasa_defaults, $this->other );

		// set valid sizes array
		$this->valid_sizes = array(32, 48, 64, 72, 94, 110, 128, 144, 160, 200, 288, 320, 400, 512, 576, 640, 720, 800, 912, 1024, 1152, 1280, 1440, 1600 );

		// set valid cache time array
		$this->valid_cachetimes = array(
			'Do not cache'=>1, '5 minutes'=>300, '10 minutes'=>600, '1 hour'=>3600, '12 hours'=>43200, '1 day'=>86400, '3 days'=>259200, '1 week'=>604800, '2 weeks'=>1209600, '1 month'=>2629744, '2 months'=>5259488, '6 months'=>15778463, '1 year'=>31556926);

		if (1==$_POST['kb_inlinePicasa_update'])
			echo '<div id="message" class="updated fade"><p><strong>'. $this->onSave() .'</strong> <a href="'.get_bloginfo('url').'">View site &raquo;</a></p></div>';
		
		echo $this->makeForm();
	}
	
	// for dummy options that get saved as 1 or 0
	function checkbox($o){
		if ($o)
			return 'checked="checked"';
	}
	
	function onSave(){
		
		$noHackMsg = 'Invalid input. Are you trying to hack something?';
		
		// validate
		if (!in_array($_POST['kb_inlinePicasa_sizes'], $this->valid_sizes))
			return $noHackMsg;
		if (!in_array($_POST['kb_inlinePicasa_cachetime'], $this->valid_cachetimes))
			return $noHackMsg;
		$_POST['kb_inlinePicasa_numpics'] = (int) $_POST['kb_inlinePicasa_numpics'];
		if ( 0>$_POST['kb_inlinePicasa_numpics'] || 9999<$_POST['kb_inlinePicasa_numpics'] )
			$_POST['kb_inlinePicasa_numpics'] = 0;

		// validate dummy options
		$dummy = array(0,1);
		if (!in_array($_POST['kb_inlinePicasa_linkpics'], $dummy))
			return $noHackMsg;
		if (!in_array($_POST['kb_inlinePicasa_linktitles'], $dummy))
			return $noHackMsg;
		if (!in_array($_POST['kb_inlinePicasa_showcaptions'], $dummy))
			return $noHackMsg;
		if (!in_array($_POST['kb_inlinePicasa_noWPCaption'], $dummy))
			return $noHackMsg;
		if (!in_array($_POST['kb_inlinePicasa_noDefaultStyles'], $dummy))
			return $noHackMsg;
		if (!in_array($_POST['kb_inlinePicasa_twocolumn'], $dummy))
			return $noHackMsg;

		// update vars
		if ($_POST['kb_inlinePicasa_sizes'] != $this->maxsize){
			$didone = true;
			$this->maxsize = $_POST['kb_inlinePicasa_sizes'];
			$update_time = true;	// if we change this setting, we need to be sure to dump all album caches
			update_option($this->opt_maxsize, $_POST['kb_inlinePicasa_sizes']);
		}
		if ($_POST['kb_inlinePicasa_cachetime'] != $this->cachetime){
			$didone = true;
			$this->cachetime = $_POST['kb_inlinePicasa_cachetime'];
			update_option($this->opt_cachetime, $_POST['kb_inlinePicasa_cachetime']);
		}
		// opt_other options
		if ($_POST['kb_inlinePicasa_numpics'] != $this->other['numpics']){
			$didone = true;
			$this->other['numpics'] = (int) $_POST['kb_inlinePicasa_numpics'];
			$update_other = true;
		}
		if ($_POST['kb_inlinePicasa_linkpics'] != $this->other['linkpics']){
			$didone = true;
			$this->other['linkpics'] = (int) $_POST['kb_inlinePicasa_linkpics'];
			$update_other = true;
		}
		if ($_POST['kb_inlinePicasa_linktitles'] != $this->other['linktitles']){
			$didone = true;
			$this->other['linktitles'] = (int) $_POST['kb_inlinePicasa_linktitles'];
			$update_other = true;
		}
		if ($_POST['kb_inlinePicasa_showcaptions'] != $this->other['showcaptions']){
			$didone = true;
			$this->other['showcaptions'] = (int) $_POST['kb_inlinePicasa_showcaptions'];
			$update_other = true;
		}
		if ($_POST['kb_inlinePicasa_noWPCaption'] != $this->other['noWPCaption']){
			$didone = true;
			$this->other['noWPCaption'] = (int) $_POST['kb_inlinePicasa_noWPCaption'];
			$update_other = true;
		}
		if ($_POST['kb_inlinePicasa_noDefaultStyles'] != $this->other['noDefaultStyles']){
			$didone = true;
			$this->other['noDefaultStyles'] = (int) $_POST['kb_inlinePicasa_noDefaultStyles'];
			$update_other = true;
		}
		if ($_POST['kb_inlinePicasa_twocolumn'] != $this->other['twocolumn']){
			$didone = true;
			$this->other['twocolumn'] = (int) $_POST['kb_inlinePicasa_twocolumn'];
			$update_other = true;
		}
		if ($update_other)
			update_option($this->opt_other, $this->other);		
		
		// do we need to update option timestamp to clear cache?
		if ($update_time)
			update_option($this->opt_update, time());		

		// done
		if ($didone)
			return 'Options updated.';
		return 'Nothing to save! (You didn\'t change anything.)';
	}
	
	function makeForm(){
		$out = '
			<div class="wrap">
				<h2>KB Easy Picasa &raquo; Instructions</h2>
				<p>To automatically insert photos from PicasaWeb into one of your posts, just make a link to one of your albums on a line by itself. Don\'t just paste the URL into a blog post; you need to actually link the URL (so it is clickable). The plugin will find your link and convert it as long as it meets the following conditions:</p>
				<ul style="list-style-type:disc;">
					<li>The link is on a line by itself.</li>
					<li>The URL looks like this (it will by default): <em>http://picasaweb.google.com/<strong>username</strong>/<strong>albumname</strong></em>
						<ul style="list-style-type:disc;padding-left:1em;">
							<li><strong>username</strong> is your Google (PicasaWeb) username</li>
							<li><strong>albumname</strong> is the name of an album</li>
						</ul>
					</li>
					<li>The link is clickable.</li>
					<li>The link does not contain <code>rel="noDisplay"</code> in it.</li>
				</ul>

				<h2>KB Easy Picasa &raquo; Options</h2>
				<form action="" method="post">
				<table>
					<tr>
						<td style="text-align:right;vertical-align:top;"><select name="kb_inlinePicasa_sizes" id="kb_inlinePicasa_sizes">';
		foreach($this->valid_sizes as $size){
			$selected = ($size == $this->maxsize) ? ' selected="selected"' : '';
			$out .= '<option value="'.$size.'"'.$selected.'>'.$size.' pixels</option>';
		}
		$out .= '
						</select>&nbsp;</td>
						<td><strong><label for="kb_inlinePicasa_sizes">What size do you want your images to be (in pixels)?</label></strong><br /><em>400 pixels will fit in most themes, but if you have a wide theme, you might be able to fit something larger. Remember, though, that larger size means slower load times for your blog visitors.</em><br />&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align:right;vertical-align:top;"><select name="kb_inlinePicasa_cachetime" id="kb_inlinePicasa_cachetime">';
		foreach($this->valid_cachetimes as $words=>$seconds){
			$selected = ($seconds == $this->cachetime) ? ' selected="selected"' : '';
			$out .= '<option value="'.$seconds.'"'.$selected.'>'.$words.'</option>';
		}
		$out .= '
						</select>&nbsp;</td>
						<td><strong><label for="kb_inlinePicasa_cachetime">How long do you want to cache the album data?</label></strong><br /><em>Each time you post a new PicasaWeb album, the plugin needs to ping PicasaWeb to request the names, sizes, and captions of all the images. This ping takes time and can slow down your blog\'s loading time a lot. To keep pageloads quick, we cache a copy of the album data here on your blog rather than ping PicasaWeb on every page load. Unless you expect to change captions or add images to your albums frequently, you should set a cache time of at least 7 days, the default.</em><br />&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align:right;vertical-align:top;"><input type="text" style="width:4em;" value="'.$this->other['numpics'].'" name="kb_inlinePicasa_numpics" id="kb_inlinePicasa_numpics" />&nbsp;</td>
						<td><strong><label for="kb_inlinePicasa_numpics">How many pictures to show? (Enter "0" to show all.)</label></strong><br /><em>If you enter "0," then all photos from each album will be shown. To show only the first 5 photos in each album, enter "5" (you get the idea).<br />&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align:right;vertical-align:top;"><input type="checkbox" value="1" '.$this->checkbox($this->other['showcaptions']).' name="kb_inlinePicasa_showcaptions" id="kb_inlinePicasa_showcaptions" />&nbsp;</td>
						<td><strong><label for="kb_inlinePicasa_showcaptions">Display captions?</label></strong><br /><em>By default, any captions that you composed at PicasaWeb will show up under each photo. Uncheck this box to hide captions.<br />&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align:right;vertical-align:top;"><input type="checkbox" value="1" '.$this->checkbox($this->other['linktitles']).' name="kb_inlinePicasa_linktitles" id="kb_inlinePicasa_linktitles" />&nbsp;</td>
						<td><strong><label for="kb_inlinePicasa_linktitles">Link album titles to PicasaWeb?</label></strong><br /><em>By default, this plugin will link the album\'s title to the PicasaWeb album. Uncheck this box to disable this behavior. Only <strong>public albums</strong> will be linked.<br />&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align:right;vertical-align:top;"><input type="checkbox" value="1" '.$this->checkbox($this->other['linkpics']).' name="kb_inlinePicasa_linkpics" id="kb_inlinePicasa_linkpics" />&nbsp;</td>
						<td><strong><label for="kb_inlinePicasa_linkpics">Link photos to PicasaWeb?</label></strong><br /><em>By default, this plugin only displays your images; the images are not clickable. By checking this option, you indicate that you want to have the images made clickable. When visitors click the image, they will be taken to PicasaWeb to view the full-size photo. Only <strong>public albums</strong> will be linked.<br />&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align:right;vertical-align:top;"><input type="checkbox" value="1" '.$this->checkbox($this->other['noWPCaption']).' name="kb_inlinePicasa_noWPCaption" id="kb_inlinePicasa_noWPCaption" />&nbsp;</td>
						<td><strong><label for="kb_inlinePicasa_noWPCaption">Use custom CSS classes instead of the usual WP classes?</label></strong><br /><em>Usually, this plugin wraps each photo in the <code>wp-caption</code> class that WordPress uses when you insert a photo into a post. To suppress those classes and use custom <code>kb-inlinePicasa</code> classes only, check this box.<br />&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align:right;vertical-align:top;"><input type="checkbox" value="1" '.$this->checkbox($this->other['noDefaultStyles']).' name="kb_inlinePicasa_noDefaultStyles" id="kb_inlinePicasa_noDefaultStyles" />&nbsp;</td>
						<td><strong><label for="kb_inlinePicasa_noDefaultStyles">Suppress the default KB PicasaWeb styles?</label></strong><br /><em>Usually, this plugin will insert some basic CSS styles into your theme to make pictures look a little nicer. If you don\'t want these styles added, then check this box.<br />&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align:right;vertical-align:top;"><input type="checkbox" value="1" '.$this->checkbox($this->other['twocolumn']).' name="kb_inlinePicasa_twocolumn" id="kb_inlinePicasa_twocolumn" />&nbsp;</td>
						<td><strong><label for="kb_inlinePicasa_twocolumn">Display photos in two columns?</label></strong><br /><em>If you select this option, you will probably want to disable captions and use a small photo size.<br />&nbsp;</td>
					</tr>
				</table>
				<p class="submit" style="width:430px;"><input type="submit" value="Update Options &raquo;" />
							<input type="hidden" name="kb_inlinePicasa_update" value="1" />
				</p>
				</form>
			</div>
		';
		return $out;
	}
}
?>