/**
 * JS for fontIconPicker
 */
jQuery(document).ready(function($) {
	
	// Icomoon icon index
	// If you are wondering who was the mad person to index such a large thing
	// Well, basically that mad person created a PHP script to index it
	// It has been released open source at: https://github.com/swashata/IcoMoonIconIndexer
	var icm_icons = {
		'Web Applications' : [57436, 57437, 57438, 57439, 57524, 57525, 57526, 57527, 57528, 57531, 57532, 57533, 57534, 57535, 57536, 57537, 57541, 57545, 57691, 57692],
		'Business Icons' : [57347, 57348, 57375, 57376, 57377, 57379, 57403, 57406, 57432, 57433, 57434, 57435, 57450, 57453, 57456, 57458, 57460, 57461, 57463],
		'eCommerce' : [57392, 57397, 57398, 57399, 57402],
		'Currency Icons' : [],
		'Form Control Icons' : [57383, 57384, 57385, 57386, 57387, 57388, 57484, 57594, 57595, 57600, 57603, 57604, 57659, 57660, 57693],
		'User Action & Text Editor' : [57442, 57443, 57444, 57445, 57446, 57447, 57472, 57473, 57474, 57475, 57476, 57477, 57539, 57662, 57668, 57669, 57670, 57671, 57674, 57675, 57688, 57689],
		'Charts and Codes' : [57493],
		'Attentive' : [57543, 57588, 57590, 57591, 57592, 57593, 57596],
		'Multimedia Icons' : [57356, 57357, 57362, 57363, 57448, 57485, 57547, 57548, 57549, 57605, 57606, 57609, 57610, 57611, 57614, 57617, 57618, 57620, 57621, 57622, 57623, 57624, 57625, 57626],
		'Location and Contact' : [57344, 57345, 57346, 57404, 57405, 57408, 57410, 57411, 57413, 57414, 57540],
		'Date and Time' : [57415, 57416, 57417, 57421, 57422, 57423],
		'Devices' : [57359, 57361, 57364, 57425, 57426, 57430],
		'Tools' : [57349, 57350, 57352, 57355, 57365, 57478, 57479, 57480, 57481, 57482, 57483, 57486, 57487, 57488, 57663, 57664],
		'Social and Networking' : [57694, 57700, 57701, 57702, 57703, 57704, 57705, 57706, 57707, 57709, 57710, 57711, 57717, 57718, 57719, 57736, 57737, 57738, 57739, 57740, 57741, 57742, 57746, 57747, 57748, 57755, 57756, 57758, 57759, 57760, 57761, 57763, 57764, 57765, 57766, 57767, 57776],
		'Brands' : [57743, 57750, 57751, 57752, 57753, 57754, 57757, 57773, 57774, 57775, 57789, 57790, 57792, 57793],
		'Files & Documents' : [57378, 57380, 57381, 57382, 57390, 57391, 57778, 57779, 57780, 57781, 57782, 57783, 57784, 57785, 57786, 57787],
		'Like & Dislike Icons' : [57542, 57544, 57550, 57551, 57552, 57553, 57554, 57555, 57556, 57557],
		'Emoticons' : [57558, 57559, 57560, 57561, 57562, 57563, 57564, 57565, 57566, 57567, 57568, 57569, 57570, 57571, 57572, 57573, 57574, 57575, 57576, 57577, 57578, 57579, 57580, 57581, 57582, 57583],
		'Directional Icons' : [57584, 57585, 57586, 57587, 57631, 57632, 57633, 57634, 57635, 57636, 57637, 57638, 57639, 57640, 57641, 57642, 57643, 57644, 57645, 57646, 57647, 57648, 57649, 57650, 57651, 57652, 57653, 57654],
		'Other Icons' : [57351, 57353, 57354, 57358, 57360, 57366, 57367, 57368, 57369, 57370, 57371, 57372, 57373, 57374, 57389, 57393, 57394, 57395, 57396, 57400, 57401, 57407, 57409, 57412, 57418, 57419, 57420, 57424, 57427, 57428, 57429, 57431, 57440, 57441, 57449, 57451, 57452, 57454, 57455, 57457, 57459, 57462, 57464, 57465, 57466, 57467, 57468, 57469, 57470, 57471, 57489, 57490, 57491, 57492, 57494, 57495, 57496, 57497, 57498, 57499, 57500, 57501, 57502, 57503, 57504, 57505, 57506, 57507, 57508, 57509, 57510, 57511, 57512, 57513, 57514, 57515, 57516, 57517, 57518, 57519, 57520, 57521, 57522, 57523, 57529, 57530, 57538, 57546, 57589, 57597, 57598, 57599, 57601, 57602, 57607, 57608, 57612, 57613, 57615, 57616, 57619, 57627, 57628, 57629, 57630, 57655, 57656, 57657, 57658, 57661, 57665, 57666, 57667, 57672, 57673, 57676, 57677, 57678, 57679, 57680, 57681, 57682, 57683, 57684, 57685, 57686, 57687, 57690, 57695, 57696, 57697, 57698, 57699, 57708, 57712, 57713, 57714, 57715, 57716, 57720, 57721, 57722, 57723, 57724, 57725, 57726, 57727, 57728, 57729, 57730, 57731, 57732, 57733, 57734, 57735, 57744, 57745, 57749, 57762, 57768, 57769, 57770, 57771, 57772, 57777, 57788, 57791, 57794]
	};

	var icm_icon_search = {
		'Web Applications' : ['Box add', 'Box remove', 'Download', 'Upload', 'List', 'List 2', 'Numbered list', 'Menu', 'Menu 2', 'Cloud download', 'Cloud upload', 'Download 2', 'Upload 2', 'Download 3', 'Upload 3', 'Globe', 'Attachment', 'Bookmark', 'Embed', 'Code'],
		'Business Icons' : ['Office', 'Newspaper', 'Book', 'Books', 'Library', 'Profile', 'Support', 'Address book', 'Cabinet', 'Drawer', 'Drawer 2', 'Drawer 3', 'Bubble', 'Bubble 2', 'User', 'User 2', 'User 3', 'User 4', 'Busy'],
		'eCommerce' : ['Tag', 'Cart', 'Cart 2', 'Cart 3', 'Calculate'],
		'Currency Icons' : [],
		'Form Control Icons' : ['Copy', 'Copy 2', 'Copy 3', 'Paste', 'Paste 2', 'Paste 3', 'Settings', 'Cancel circle', 'Checkmark circle', 'Spell check', 'Enter', 'Exit', 'Radio checked', 'Radio unchecked', 'Console'],
		'User Action & Text Editor' : ['Undo', 'Redo', 'Flip', 'Flip 2', 'Undo 2', 'Redo 2', 'Zoomin', 'Zoomout', 'Expand', 'Contract', 'Expand 2', 'Contract 2', 'Link', 'Scissors', 'Bold', 'Underline', 'Italic', 'Strikethrough', 'Table', 'Table 2', 'Indent increase', 'Indent decrease'],
		'Charts and Codes' : ['Pie'],
		'Attentive' : ['Eye blocked', 'Warning', 'Question', 'Info', 'Info 2', 'Blocked', 'Spam'],
		'Multimedia Icons' : ['Image', 'Image 2', 'Play', 'Film', 'Forward', 'Equalizer', 'Brightness medium', 'Brightness contrast', 'Contrast', 'Play 2', 'Pause', 'Forward 2', 'Play 3', 'Pause 2', 'Forward 3', 'Previous', 'Next', 'Volume high', 'Volume medium', 'Volume low', 'Volume mute', 'Volume mute 2', 'Volume increase', 'Volume decrease'],
		'Location and Contact' : ['Home', 'Home 2', 'Home 3', 'Phone', 'Phone hang up', 'Envelope', 'Location', 'Location 2', 'Map', 'Map 2', 'Flag'],
		'Date and Time' : ['History', 'Clock', 'Clock 2', 'Stopwatch', 'Calendar', 'Calendar 2'],
		'Devices' : ['Camera', 'Headphones', 'Camera 2', 'Keyboard', 'Screen', 'Tablet'],
		'Tools' : ['Pencil', 'Pencil 2', 'Pen', 'Paint format', 'Dice', 'Key', 'Key 2', 'Lock', 'Lock 2', 'Unlocked', 'Wrench', 'Cog', 'Cogs', 'Cog 2', 'Filter', 'Filter 2'],
		'Social and Networking' : ['Share', 'Googleplus', 'Googleplus 2', 'Googleplus 3', 'Googleplus 4', 'Google drive', 'Facebook', 'Facebook 2', 'Facebook 3', 'Twitter', 'Twitter 2', 'Twitter 3', 'Vimeo', 'Vimeo 2', 'Vimeo 3', 'Github', 'Github 2', 'Github 3', 'Github 4', 'Github 5', 'Wordpress', 'Wordpress 2', 'Tumblr', 'Tumblr 2', 'Yahoo', 'Soundcloud', 'Soundcloud 2', 'Reddit', 'Linkedin', 'Lastfm', 'Lastfm 2', 'Stumbleupon', 'Stumbleupon 2', 'Stackoverflow', 'Pinterest', 'Pinterest 2', 'Yelp'],
		'Brands' : ['Joomla', 'Apple', 'Finder', 'Android', 'Windows', 'Windows 8', 'Skype', 'Paypal', 'Paypal 2', 'Paypal 3', 'Chrome', 'Firefox', 'Opera', 'Safari'],
		'Files & Documents' : ['File', 'File 2', 'File 3', 'File 4', 'Folder', 'Folder open', 'File pdf', 'File openoffice', 'File word', 'File excel', 'File zip', 'File powerpoint', 'File xml', 'File css', 'Html 5', 'Html 52'],
		'Like & Dislike Icons' : ['Eye', 'Eye 2', 'Star', 'Star 2', 'Star 3', 'Heart', 'Heart 2', 'Heart broken', 'Thumbs up', 'Thumbs up 2'],
		'Emoticons' : ['Happy', 'Happy 2', 'Smiley', 'Smiley 2', 'Tongue', 'Tongue 2', 'Sad', 'Sad 2', 'Wink', 'Wink 2', 'Grin', 'Grin 2', 'Cool', 'Cool 2', 'Angry', 'Angry 2', 'Evil', 'Evil 2', 'Shocked', 'Shocked 2', 'Confused', 'Confused 2', 'Neutral', 'Neutral 2', 'Wondering', 'Wondering 2'],
		'Directional Icons' : ['Point up', 'Point right', 'Point down', 'Point left', 'Arrow up left', 'Arrow up', 'Arrow up right', 'Arrow right', 'Arrow down right', 'Arrow down', 'Arrow down left', 'Arrow left', 'Arrow up left 2', 'Arrow up 2', 'Arrow up right 2', 'Arrow right 2', 'Arrow down right 2', 'Arrow down 2', 'Arrow down left 2', 'Arrow left 2', 'Arrow up left 3', 'Arrow up 3', 'Arrow up right 3', 'Arrow right 3', 'Arrow down right 3', 'Arrow down 3', 'Arrow down left 3', 'Arrow left 3'],
		'Other Icons' : ['Quill', 'Blog', 'Droplet', 'Images', 'Music', 'Pacman', 'Spades', 'Clubs', 'Diamonds', 'Pawn', 'Bullhorn', 'Connection', 'Podcast', 'Feed', 'Stack', 'Tags', 'Barcode', 'Qrcode', 'Ticket', 'Coin', 'Credit', 'Notebook', 'Pushpin', 'Compass', 'Alarm', 'Alarm 2', 'Bell', 'Print', 'Laptop', 'Mobile', 'Mobile 2', 'Tv', 'Disk', 'Storage', 'Reply', 'Bubbles', 'Bubbles 2', 'Bubbles 3', 'Bubbles 4', 'Users', 'Users 2', 'Quotes left', 'Spinner', 'Spinner 2', 'Spinner 3', 'Spinner 4', 'Spinner 5', 'Spinner 6', 'Binoculars', 'Search', 'Hammer', 'Wand', 'Aid', 'Bug', 'Stats', 'Bars', 'Bars 2', 'Gift', 'Trophy', 'Glass', 'Mug', 'Food', 'Leaf', 'Rocket', 'Meter', 'Meter 2', 'Dashboard', 'Hammer 2', 'Fire', 'Lab', 'Magnet', 'Remove', 'Remove 2', 'Briefcase', 'Airplane', 'Truck', 'Road', 'Accessibility', 'Target', 'Shield', 'Lightning', 'Switch', 'Powercord', 'Signup', 'Tree', 'Cloud', 'Earth', 'Bookmarks', 'Notification', 'Close', 'Checkmark', 'Checkmark 2', 'Minus', 'Plus', 'Stop', 'Backward', 'Stop 2', 'Backward 2', 'First', 'Last', 'Eject', 'Loop', 'Loop 2', 'Loop 3', 'Shuffle', 'Tab', 'Checkbox checked', 'Checkbox unchecked', 'Checkbox partial', 'Crop', 'Font', 'Text height', 'Text width', 'Omega', 'Sigma', 'Insert template', 'Pilcrow', 'Lefttoright', 'Righttoleft', 'Paragraph left', 'Paragraph center', 'Paragraph right', 'Paragraph justify', 'Paragraph left 2', 'Paragraph center 2', 'Paragraph right 2', 'Paragraph justify 2', 'Newtab', 'Mail', 'Mail 2', 'Mail 3', 'Mail 4', 'Google', 'Instagram', 'Feed 2', 'Feed 3', 'Feed 4', 'Youtube', 'Youtube 2', 'Lanyrd', 'Flickr', 'Flickr 2', 'Flickr 3', 'Flickr 4', 'Picassa', 'Picassa 2', 'Dribbble', 'Dribbble 2', 'Dribbble 3', 'Forrst', 'Forrst 2', 'Deviantart', 'Deviantart 2', 'Steam', 'Steam 2', 'Blogger', 'Blogger 2', 'Tux', 'Delicious', 'Xing', 'Xing 2', 'Flattr', 'Foursquare', 'Foursquare 2', 'Libreoffice', 'Css 3', 'IE', 'IcoMoon']
	};

	/**
	 * Init the fontIconPickers on the jumbotron
	 */
	jQuery('#sip-icon-select-status').fontIconPicker({
		source: icm_icons,
		searchSource: icm_icon_search,
		useAttribute: true,
		theme: 'fip-darkgrey',
		attributeName: 'data-icomoon',
		emptyIconValue: 'none',
		onchange : function(a, b){
			
			if( a.hasClass('sip-icon-select-status') ){
				var icon_lists = {57436 : 'box-add', 57437 : 'box-remove', 57438 : 'download', 57439 : 'upload', 57524 : 'list', 57525 : 'list2', 57526 : 'numbered-list', 57527 : 'menu', 57528 : 'menu2', 57531 : 'cloud-download', 57532 : 'cloud-upload', 57533 : 'download2', 57534 : 'upload2', 57535 : 'download3', 57536 : 'upload3', 57537 : 'globe', 57541 : 'attachment', 57545 : 'bookmark', 57691 : 'embed', 57692 : 'code', 57347 : 'office', 57348 : 'newspaper', 57375 : 'book', 57376 : 'books', 57377 : 'library', 57379 : 'profile', 57403 : 'support', 57406 : 'address-book', 57432 : 'cabinet', 57433 : 'drawer', 57434 : 'drawer2', 57435 : 'drawer3', 57450 : 'bubble', 57453 : 'bubble2', 57456 : 'user', 57458 : 'user2', 57460 : 'user3', 57461 : 'user4', 57463 : 'busy', 57392 : 'tag', 57397 : 'cart', 57398 : 'cart2', 57399 : 'cart3', 57402 : 'calculate', 57383 : 'copy', 57384 : 'copy2', 57385 : 'copy3', 57386 : 'paste', 57387 : 'paste2', 57388 : 'paste3', 57484 : 'settings', 57594 : 'cancel-circle', 57595 : 'checkmark-circle', 57600 : 'spell-check', 57603 : 'enter', 57604 : 'exit', 57659 : 'radio-checked', 57660 : 'radio-unchecked', 57693 : 'console', 57442 : 'undo', 57443 : 'redo', 57444 : 'flip', 57445 : 'flip2', 57446 : 'undo2', 57447 : 'redo2', 57472 : 'zoomin', 57473 : 'zoomout', 57474 : 'expand', 57475 : 'contract', 57476 : 'expand2', 57477 : 'contract2', 57539 : 'link', 57662 : 'scissors', 57668 : 'bold', 57669 : 'underline', 57670 : 'italic', 57671 : 'strikethrough', 57674 : 'table', 57675 : 'table2', 57688 : 'indent-increase', 57689 : 'indent-decrease', 57493 : 'pie', 57543 : 'eye-blocked', 57588 : 'warning', 57590 : 'question', 57591 : 'info', 57592 : 'info2', 57593 : 'blocked', 57596 : 'spam', 57356 : 'image', 57357 : 'image2', 57362 : 'play', 57363 : 'film', 57448 : 'forward', 57485 : 'equalizer', 57547 : 'brightness-medium', 57548 : 'brightness-contrast', 57549 : 'contrast', 57605 : 'play2', 57606 : 'pause', 57609 : 'forward2', 57610 : 'play3', 57611 : 'pause2', 57614 : 'forward3', 57617 : 'previous', 57618 : 'next', 57620 : 'volume-high', 57621 : 'volume-medium', 57622 : 'volume-low', 57623 : 'volume-mute', 57624 : 'volume-mute2', 57625 : 'volume-increase', 57626 : 'volume-decrease', 57344 : 'home', 57345 : 'home2', 57346 : 'home3', 57404 : 'phone', 57405 : 'phone-hang-up', 57408 : 'envelope', 57410 : 'location', 57411 : 'location2', 57413 : 'map', 57414 : 'map2', 57540 : 'flag', 57415 : 'history', 57416 : 'clock', 57417 : 'clock2', 57421 : 'stopwatch', 57422 : 'calendar', 57423 : 'calendar2', 57359 : 'camera', 57361 : 'headphones', 57364 : 'camera2', 57425 : 'keyboard', 57426 : 'screen', 57430 : 'tablet', 57349 : 'pencil', 57350 : 'pencil2', 57352 : 'pen', 57355 : 'paint-format', 57365 : 'dice', 57478 : 'key', 57479 : 'key2', 57480 : 'lock', 57481 : 'lock2', 57482 : 'unlocked', 57483 : 'wrench', 57486 : 'cog', 57487 : 'cogs', 57488 : 'cog2', 57663 : 'filter', 57664 : 'filter2', 57694 : 'share', 57700 : 'googleplus', 57701 : 'googleplus2', 57702 : 'googleplus3', 57703 : 'googleplus4', 57704 : 'google-drive', 57705 : 'facebook', 57706 : 'facebook2', 57707 : 'facebook3', 57709 : 'twitter', 57710 : 'twitter2', 57711 : 'twitter3', 57717 : 'vimeo', 57718 : 'vimeo2', 57719 : 'vimeo3', 57736 : 'github', 57737 : 'github2', 57738 : 'github3', 57739 : 'github4', 57740 : 'github5', 57741 : 'wordpress', 57742 : 'wordpress2', 57746 : 'tumblr', 57747 : 'tumblr2', 57748 : 'yahoo', 57755 : 'soundcloud', 57756 : 'soundcloud2', 57758 : 'reddit', 57759 : 'linkedin', 57760 : 'lastfm', 57761 : 'lastfm2', 57763 : 'stumbleupon', 57764 : 'stumbleupon2', 57765 : 'stackoverflow', 57766 : 'pinterest', 57767 : 'pinterest2', 57776 : 'yelp', 57743 : 'joomla', 57750 : 'apple', 57751 : 'finder', 57752 : 'android', 57753 : 'windows', 57754 : 'windows8', 57757 : 'skype', 57773 : 'paypal', 57774 : 'paypal2', 57775 : 'paypal3', 57789 : 'chrome', 57790 : 'firefox', 57792 : 'opera', 57793 : 'safari', 57378 : 'file', 57380 : 'file2', 57381 : 'file3', 57382 : 'file4', 57390 : 'folder', 57391 : 'folder-open', 57778 : 'file-pdf', 57779 : 'file-openoffice', 57780 : 'file-word', 57781 : 'file-excel', 57782 : 'file-zip', 57783 : 'file-powerpoint', 57784 : 'file-xml', 57785 : 'file-css', 57786 : 'html5', 57787 : 'html52', 57542 : 'eye', 57544 : 'eye2', 57550 : 'star', 57551 : 'star2', 57552 : 'star3', 57553 : 'heart', 57554 : 'heart2', 57555 : 'heart-broken', 57556 : 'thumbs-up', 57557 : 'thumbs-up2', 57558 : 'happy', 57559 : 'happy2', 57560 : 'smiley', 57561 : 'smiley2', 57562 : 'tongue', 57563 : 'tongue2', 57564 : 'sad', 57565 : 'sad2', 57566 : 'wink', 57567 : 'wink2', 57568 : 'grin', 57569 : 'grin2', 57570 : 'cool', 57571 : 'cool2', 57572 : 'angry', 57573 : 'angry2', 57574 : 'evil', 57575 : 'evil2', 57576 : 'shocked', 57577 : 'shocked2', 57578 : 'confused', 57579 : 'confused2', 57580 : 'neutral', 57581 : 'neutral2', 57582 : 'wondering', 57583 : 'wondering2', 57584 : 'point-up', 57585 : 'point-right', 57586 : 'point-down', 57587 : 'point-left', 57631 : 'arrow-up-left', 57632 : 'arrow-up', 57633 : 'arrow-up-right', 57634 : 'arrow-right', 57635 : 'arrow-down-right', 57636 : 'arrow-down', 57637 : 'arrow-down-left', 57638 : 'arrow-left', 57639 : 'arrow-up-left2', 57640 : 'arrow-up2', 57641 : 'arrow-up-right2', 57642 : 'arrow-right2', 57643 : 'arrow-down-right2', 57644 : 'arrow-down2', 57645 : 'arrow-down-left2', 57646 : 'arrow-left2', 57647 : 'arrow-up-left3', 57648 : 'arrow-up3', 57649 : 'arrow-up-right3', 57650 : 'arrow-right3', 57651 : 'arrow-down-right3', 57652 : 'arrow-down3', 57653 : 'arrow-down-left3', 57654 : 'arrow-left3', 57351 : 'quill', 57353 : 'blog', 57354 : 'droplet', 57358 : 'images', 57360 : 'music', 57366 : 'pacman', 57367 : 'spades', 57368 : 'clubs', 57369 : 'diamonds', 57370 : 'pawn', 57371 : 'bullhorn', 57372 : 'connection', 57373 : 'podcast', 57374 : 'feed', 57389 : 'stack', 57393 : 'tags', 57394 : 'barcode', 57395 : 'qrcode', 57396 : 'ticket', 57400 : 'coin', 57401 : 'credit', 57407 : 'notebook', 57409 : 'pushpin', 57412 : 'compass', 57418 : 'alarm', 57419 : 'alarm2', 57420 : 'bell', 57424 : 'print', 57427 : 'laptop', 57428 : 'mobile', 57429 : 'mobile2', 57431 : 'tv', 57440 : 'disk', 57441 : 'storage', 57449 : 'reply', 57451 : 'bubbles', 57452 : 'bubbles2', 57454 : 'bubbles3', 57455 : 'bubbles4', 57457 : 'users', 57459 : 'users2', 57462 : 'quotes-left', 57464 : 'spinner', 57465 : 'spinner2', 57466 : 'spinner3', 57467 : 'spinner4', 57468 : 'spinner5', 57469 : 'spinner6', 57470 : 'binoculars', 57471 : 'search', 57489 : 'hammer', 57490 : 'wand', 57491 : 'aid', 57492 : 'bug', 57494 : 'stats', 57495 : 'bars', 57496 : 'bars2', 57497 : 'gift', 57498 : 'trophy', 57499 : 'glass', 57500 : 'mug', 57501 : 'food', 57502 : 'leaf', 57503 : 'rocket', 57504 : 'meter', 57505 : 'meter2', 57506 : 'dashboard', 57507 : 'hammer2', 57508 : 'fire', 57509 : 'lab', 57510 : 'magnet', 57511 : 'remove', 57512 : 'remove2', 57513 : 'briefcase', 57514 : 'airplane', 57515 : 'truck', 57516 : 'road', 57517 : 'accessibility', 57518 : 'target', 57519 : 'shield', 57520 : 'lightning', 57521 : 'switch', 57522 : 'powercord', 57523 : 'signup', 57529 : 'tree', 57530 : 'cloud', 57538 : 'earth', 57546 : 'bookmarks', 57589 : 'notification', 57597 : 'close', 57598 : 'checkmark', 57599 : 'checkmark2', 57601 : 'minus', 57602 : 'plus', 57607 : 'stop', 57608 : 'backward', 57612 : 'stop2', 57613 : 'backward2', 57615 : 'first', 57616 : 'last', 57619 : 'eject', 57627 : 'loop', 57628 : 'loop2', 57629 : 'loop3', 57630 : 'shuffle', 57655 : 'tab', 57656 : 'checkbox-checked', 57657 : 'checkbox-unchecked', 57658 : 'checkbox-partial', 57661 : 'crop', 57665 : 'font', 57666 : 'text-height', 57667 : 'text-width', 57672 : 'omega', 57673 : 'sigma', 57676 : 'insert-template', 57677 : 'pilcrow', 57678 : 'lefttoright', 57679 : 'righttoleft', 57680 : 'paragraph-left', 57681 : 'paragraph-center', 57682 : 'paragraph-right', 57683 : 'paragraph-justify', 57684 : 'paragraph-left2', 57685 : 'paragraph-center2', 57686 : 'paragraph-right2', 57687 : 'paragraph-justify2', 57690 : 'newtab', 57695 : 'mail', 57696 : 'mail2', 57697 : 'mail3', 57698 : 'mail4', 57699 : 'google', 57708 : 'instagram', 57712 : 'feed2', 57713 : 'feed3', 57714 : 'feed4', 57715 : 'youtube', 57716 : 'youtube2', 57720 : 'lanyrd', 57721 : 'flickr', 57722 : 'flickr2', 57723 : 'flickr3', 57724 : 'flickr4', 57725 : 'picassa', 57726 : 'picassa2', 57727 : 'dribbble', 57728 : 'dribbble2', 57729 : 'dribbble3', 57730 : 'forrst', 57731 : 'forrst2', 57732 : 'deviantart', 57733 : 'deviantart2', 57734 : 'steam', 57735 : 'steam2', 57744 : 'blogger', 57745 : 'blogger2', 57749 : 'tux', 57762 : 'delicious', 57768 : 'xing', 57769 : 'xing2', 57770 : 'flattr', 57771 : 'foursquare', 57772 : 'foursquare2', 57777 : 'libreoffice', 57788 : 'css3', 57791 : 'ie', 57794 : 'icomoon'};

				jQuery('.sip-icon-circle i, .sip-icon-outline i').attr('class', 'icomoon-'+icon_lists[b]);					
			}
		}
	});


	jQuery('#status_action_icon').fontIconPicker({
		source: icm_icons,
		searchSource: icm_icon_search,
		useAttribute: true,
		theme: 'fip-darkgrey',
		attributeName: 'data-icomoon',
		emptyIconValue: 'none'
	});

	jQuery("#status_label").on("change paste keyup", function() {
		var text = jQuery(this).val();
		jQuery(".sip-status-label-display").text( text );
		// alert(jQuery(this).val()); 
	});

	jQuery('body').on('click', '.sip_cos_note_prompt_modal .media-modal-close', function(event) {
		jQuery('.sip_cos_note_prompt_modal, .media-modal-backdrop').remove();
		return false;
	});

	jQuery('.class_note_prompt').click(function(event) {

		var action  = jQuery(this).attr('href');
		var modal   = jQuery('#tmpl-media-modal').html();
		var form    = jQuery('#wc_cos_note_prompt-modal').html();
		var $modal  = jQuery(modal);

		console.log(modal);

		$modal.addClass('sip_cos_note_prompt_modal').find('.media-modal-content').html(form);
		$modal.find('form').attr('action', action);
		$modal.appendTo('body');

		return false;
	});
});