<style>
.item {
	border-top: 3px solid #ccc;
	padding: 20px 0;
}
.example {
	font-family: Courier;
	color: #000;
	font-size: 12px;
	line-height: 14px;
	margin: 10px 0 10px 25px;
}
.alt {

}
pre {
	width: 600px;
}
#typenav {
	margin-bottom: -3px; 
	margin-top: 20px;
}
#typenav li {
	display: inline;
}
#typenav li a {
	-moz-border-radius-topleft:7px;
	-webkit-border-top-left-radius:7px;
	border-top-left-radius:7px;
	-moz-border-radius-topright:7px;
	-webkit-border-top-right-radius:7px;
	border-top-right-radius:7px;
	padding: 5px 10px;
	background-color: #ccc;
	margin: 0 15px 0 0;
	color: #666;
	font-weight: bold;
	text-decoration: none;
}
#typenav li a.settings {
	background: #000;
	color: #999;
	margin-left: 120px;
	margin-right: 0;
}
#typenav li a.current {
	border: 2px solid #ccc;
	border-bottom: none;
	background-color: #fff;
	color: #666;
}
#typenav li a.settings.current {
	background-color: #fff;
	color: #000;
	border: 2px solid #000;
	border-bottom: none;
}
ul.foo {
	margin-left: 20px;
	text-indent: -20px;
	width: 700px;
}
ul.foo li {
	line-height: 21px;
}
ul.normalbullet {
	margin: 0 10px;
}
ul.normalbullet li {
	margin: 5px 0 5px 10px;
	list-style: disc;
}
.wrap {
	width: 750px;
}
h4 { margin: 0; }
</style>
<?php
	$type = esc_html($_GET['type']); if (empty($type)) $type='columns';
	$page = esc_html($_GET['page']);
	$types = array('columns','messages','dynamic','buttons and icons','database','misc','settings');
	global $urlpath;
?>
<div class="wrap">

    <div class="icon32" id="icon-options-general"><br/></div><h2>April's Super Functions Pack</h2>

<div style="float: left; width: 530px;">
	<p>The following shortcodes are included in the Super Functions Pack. To try one out, simply copy and paste the example into a page on your site. To create one page with all examples on one tab of this page, copy and paste the contents of the text box at the bottom of this page.</p>
</div>
<div style="float: right; width: 200px; text-align: center; background: #FFFCAD; padding: 8px; padding-bottom: 0;">
	<strong>Like this plugin?</strong><br />
	Consider donating a few bucks!<br />
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="N6DQZN546AC5L">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="Donate">
	<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
</div>
<div style="clear: both; height: 5px;">&nbsp;</div>

	<ul id="typenav">
		<?php foreach ($types as $t) {
			echo '<li><a href="'.$PHP_SELF.'?page='.$page.'&type='.$t.'" class="'.$t;
			if ($t==$type) echo ' current';
			echo '">'.ucwords($t).'</a></li>'; 
		} ?>
	</ul>
<div style="clear: both; height: 4px;">&nbsp;</div>

<?php 
	$scodes['misc'] = array(
		array(
			'name'=>'basic_list',
			'example'=>'[basic_list]
	<ul>
		<li>The is the first item</li>
		<li>This is the second</li>
		<li>This is the third and last item</li>
	</ul>
[/basic_list]',
			'alt'=>array('check_list'),
			'notes'=>'Optional argument: <code>class</code> lets you add an additional class to any list.',
		),
		array(
			'name'=>'quote',
			'example'=>'[quote author="Dolor Sedamet"]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/quote]',
			'alt'=>array('quote_left','quote_right'),
		),
		array(
			'name'=>'dropcap',
			'example'=>'[dropcap]L[/dropcap]orem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.',
			'alt'=>array('dropcap2'),
		),
		array(
			'name'=>'asfp_photostack',
			'example'=>'[asfp_photostack]<a href="http://artistapril.com/" target="_blank"><img src="'.$urlpath.'images/photostack-example.jpg" class="any bunch of classes" name="name or no name" /></a>[/asfp_photostack]',
			'notes'=>'The image inside the photostack shortcode only needs a <code>src</code>, but can have any other attributes you or WordPress wants to give it (class, name, title, etc) and can be inside of a link (anchor) tag. The src should ideally be to a square thumbnail version of the image. This shortcode will create the illusion of a stack of photos with the thumbnail you provide as the image on top. Useful for linking to Gallery pages.',
		),
		array('name'=>'clear','example'=>'[clear]','notes'=>'This is useful if you need to break up left or right aligned items.'),
		array('name'=>'line','example'=>'[line]',),
		array('name'=>'blankline','example'=>'[blankline]','notes'=>'As if you added a blank, one-line paragraph.'),
		array('name'=>'noformat','example'=>'[noformat]<i>sensitive code, e.g. cforms include call</i>[/noformat]','notes'=>'Add this shortcode around sensitive code that might be affected by the plugin. If you find extra <br /> tags, or missing paragraph tags, use this shortcode. I hope to eliminate the need for this in the future.')
	);
	$scodes['database'] = array(
		array('name'=>'asfp_subpages','example'=>'[asfp_subpages type="excerpt" exclude=""]','notes'=>'This shortcode will list all child pages of the current page. The default format is a UL displaying each title, linked to the page. You can choose <code>type="excerpt"</code> to change the format to a series of DIVs with the titles linked in H3s and the excerpt in a paragraph tag. Use the <code>exclude</code> option to list the comma-separated ID numbers of any pages to exclude. Both list and excerpt divs have their own classes; view source to see them for css styling.'),
		array('name'=>'asfp_submenu','example'=>'[asfp_submenu link_heading="true"]','notes'=>'This shortcode is meant to be used in the sidebar. It generates a menu of the current page\'s children and grandchildren.')
	);
	$scodes['columns'] = array(
		array(
			'name'=>'one_half',
			'example'=>'[one_half]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_half]BR[one_half_last]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_half_last]',
			'notes'=>'You can do combinations for any of these columns so long as the numbers add up. For example, one_half one_fourth one_fourth_last, or even one_fourth one_half one_fourth_last, or also one_fourth one_fourth one_half_last',
		),
		array(
			'name'=>'one_third',
			'example'=>'[one_third]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_third]BR[one_third]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_third]BR[one_third_last]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_third_last]',
		),
		array(
			'name'=>'two_third',
			'example'=>'[two_third]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/two_third]BR[one_third_last]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_third_last]',
		),
		array(
			'name'=>'one_fourth',
			'example'=>'[one_fourth]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_fourth]BR[one_fourth]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_fourth]BR[one_fourth]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_fourth]BR[one_fourth_last]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_fourth_last]',
		),
		array(
			'name'=>'three_fourth',
			'example'=>'[three_fourth]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/three_fourth]BR[one_fourth_last]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/one_fourth_last]',
		),
	);
	$scodes['buttons and icons'] = array(
		array(
			'name'=>'button_grey',
			'example'=>'[button_grey url="http://google.com/"]Visit Google Now[/button_grey]',
			'alt'=>array('button_blue','button_green','button_orange'),
			'notes'=>'Optional argument: <code>class</code> lets you add an additional class to any button.',
		),
		array(
			'name'=>'big_button',
			'example'=>'[big_button url="http://google.com/" bgcolor="336699"]Visit Google Now[/big_button]',
			'notes'=>'The default color is green. The parameter <code>bgcolor</code> is optional. An additional optional parameter is <code>class</code>, which lets you add a css class.',
		),
		array(
			'name'=>'ico_mail',
			'example'=>'[ico_mail email="you@email.com"]Email George Smith[/ico_mail]',
		),
		array(
			'name'=>'ico_home',
			'example'=>'[ico_home]Lorem ipsum dolor sed amet[/ico_home]',
			'alt'=>array('ico_phone','ico_male','ico_female'),
		),
		array(
			'name'=>'ico_star',
			'example'=>'[ico_star url="http://google.com/"]Lorem ipsum dolor sed amet[/ico_star]',
			'alt'=>array('ico_find','ico_key','ico_arrow','ico_new','ico_support','ico_excel','ico_download','ico_monitor','ico_dollar','ico_paintcan','ico_pie','ico_database','ico_basket'),
			'notes'=>'Optional argument: <code>target</code> lets you add a target to links. Note that the <code>url</code> argument is also optional.',
		),
	);
	$scodes['messages'] = array(
		array(
			'name'=>'feature_box',
			'example'=>'[feature_box title="Lorem ipsum dolor" title_color="fff" header_color="369"]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/feature_box]',
			'notes'=>'In addition to the title, title_color and header_color, you may specify a height. If you do not specify a height, then the box will automatically be the height needed by the text.',
		),
		array(
			'name'=>'blue_message',
			'example'=>'[blue_message]BRLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.BR[/blue_message]',
			'alt'=>array('green_message','yellow_message'),
		),
	);
	$scodes['dynamic'] = array(
		array(
			'name'=>'asfp_tabs',
			'example'=>'[noformat][asfp_tabs
	tab1="Tab #1"
	tab2="Tab #2"
	tab3="Tab #3"
][/noformat]
	[slide1]First slide content[/slide1]
	[slide2]Second slide content[/slide2]
	[slide3]Third slide content[/slide3]
[/asfp_tabs]',
			'notes'=>'You will probably want to put [noformat][/noformat] around the [asfp_tabs] shortcode, as in the above example.',
		),
		array(
			'name'=>'toggle',
			'example'=>'[toggle title="Toggle Title #1"]
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.
[/toggle]
[toggle title="Toggle Title #2"]
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.
[/toggle]
[toggle title="Toggle Title #3"]
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan sagittis porta.BRMorbi dignissim leo sed metus dignissim convallis vel at libero. Aliquam vel rhoncus est.BRNunc volutpat lacinia sagittis. Proin et velit vitae lectus elementum lacinia. Proin nonBReros eget odio lobortis pulvinar vitae et ipsum.
[/toggle]',
		),
		array(
			'name'=>'asfp_preselect_recipient',
			'example'=>'[asfp_preselect_recipient]',
			'notes'=>'This shortcode has an optional parameter <code>formid</code> which is needed if the particular cform on this page is not the very first cform. If not, then it will have an id of 2 or higher. You must add that parameter to the shortcode for it to work. <br /><br /><b>General Guidelines</b>: This shortcode is only useful if the following conditions are met:<ul class="normalbullet"><li>"Include cforms Javascript?" is checked on the <a href="tools.php?page=aprils-super-functions-pack/aprils-super-functions-pack.php&type=settings">Settings</a> tab</li><li>You have a cforms contact form where "multiple recipients" is the type of the first field</li><li>You have a page that has both the cform and the shortcode, in that order. E.g.<br /><code>&lt;!--cforms name="Contact Us"--&gt;<br />[asfp_preselect_recipient]</code></li></ul> Then, to link to the page in such a way that a person\'s name is pre-selected in the dropdown, use this format:<br />
<code>http://mywebsite.com/contact/?person=John%20Cleese</code><br />
Where "/contact/" is the path to your page and "John Cleese" (%20 is a space) is the EXACT way the name appears in the dropdown. If the name in
the dropdown is "The Honorable John Cleese" then you have to put that whole string in the URL.',
			'hide_from_copypaste'=>true,
		),
	);
	
	function cleanexample($txt,$erase_breaks=null) {
		if ($erase_breaks) $txt = str_ireplace('BR'," ",$txt);
		else $txt = str_ireplace('BR',"\n",$txt);
		return $txt;
	}
	
	$textarea = '';
	if ($type != 'settings') {
	foreach ($scodes[$type] as $info):
		if (!isset($info['hide_from_copypaste'])) {
			$txt = cleanexample($info['example'],true);
			$textarea .= '<h3>'.ucwords(str_replace('_',' ',$info['name'])).'</h3>'."\n".$txt;
			$textarea .= "\n[clear]";
			$textarea .= "\n\n";
			if (isset($info['alt'])) {
				foreach ($info['alt'] as $i) {
					$textarea .= '<h3>'.ucwords(str_replace('_',' ',$i)).'</h3>'."\n";
					$textarea .= str_replace($info['name'],$i,$txt)."\n[clear]\n\n";
				}
			}
		}
?>

<div class="item">
	<code>[<?php echo $info['name'] ?>]</code>
	<pre class="example"><?php echo str_ireplace('BR',"\n",str_ireplace('<',"&lt;",$info['example'])) ?></pre>
	<?php if (isset($info['alt'])): ?><p class="alt">Variations: <?php foreach ($info['alt'] as $i) echo '<code>['.$i.']</code> &nbsp; '; ?></p><?php endif;  ?>
	<?php if (isset($info['notes'])): ?><p class="alt"><b>Notes</b>: <?php echo $info['notes'] ?></p><?php endif;  ?>
</div>

<?php endforeach; ?>
<div class="item">
	<h3>Copy-and-Paste-able Examples</h3>
	<p>Copy the text below. It contains an example of every shortcode on this page, above, including variations. Then paste it into a <a href="post-new.php?post_type=page">new page</a> or an <a href="edit.php?post_type=page">existing page</a> on your site.</p>
	<textarea style="width: 100%; height: 200px;"><?php echo $textarea ?></textarea>
</div>
<?php } else {
	include('lib/asfpsettings.php');
} ?>

</div>