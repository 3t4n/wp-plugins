/*  Copyright 2006  Robert Jorgenson  (email : rjorgy@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

<?php
require_once('../../../../wp-blog-header.php');
?>
/* If the dbx-boxes are empty(no item loaded), then toggle them closed */
function testing(state) {
	var toggles = document.getElementsByClassName('dbx-toggle');
	for (i = 0; i < toggles.length; i++) {
		if (state == 'open' && toggle[i].className == 'dbx-toggle dbx-toggle-closed') {
			toggle[i].click();
		} else if (state == 'closed' && toggle[i].className == 'dbx-toggle dbx-toggle-open') {
			toggle[i].click();
		}
	}
}

/* Show a pretty little picture that shows when there is activity */

var showActivity = {
	onCreate: function() {
		Element.show('spinner');
	},
	
	onComplete: function() {
		
		if(Ajax.activeRequestCount == 0) {
			Element.hide('spinner');
		}
	}
};

Ajax.Responders.register(showActivity);

function queryAmazon() {

	var requestURL = '<?php echo get_settings('siteurl').'/wp-admin/post.php' ?>';
	var pars = 'page=<?php echo basename(dirname(dirname(__FILE__))); ?>&asin=' + $F('asin') + '&queryaz=1';
	var amazonResult = new Ajax.Request( requestURL, {
		method: 'get',
		parameters: pars,
		onComplete: parseValues
	});
}

function parseValues(result) {
	var fields = $('asin', 'title', 'author', 'url', 'image_s', 'rating', 'price', 'total_pages');
	
	$('content').value = result.responseText;
}

addLoadEvent( function() {

//code ripped straight from WordPress dbx-key.js and edited to run a unique dbx instance
var crManager = new dbxManager('currentlyReading');

//create new docking boxes group
var crPlugin = new dbxGroup(
	'currentlyReading', // container ID [/-_a-zA-Z0-9/]
	'vertical', 	    // orientation ['vertical'|'horizontal']
	'10', 				// drag threshold ['n' pixels]
	'no',				// restrict drag movement to container axis ['yes'|'no']
	'10', 				// animate re-ordering [frames per transition, or '0' for no effect]
	'yes', 				// include open/close toggle buttons ['yes'|'no']
	'open', 			// default state ['open'|'closed']
	'open', 			// word for "open", as in "open this box"
	'close', 			// word for "close", as in "close this box"
	'click-down and drag to move this box', // sentence for "move this box" by mouse
	'click to %toggle% this box', // pattern-match sentence for "(open|close) this box" by mouse
	'use the arrow keys to move this box', // sentence for "move this box" by keyboard
	', or press the enter key to %toggle% it',  // pattern-match sentence-fragment for "(open|close) this box" by keyboard
	'%mytitle%  [%dbxtitle%]' // pattern-match syntax for title-attribute conflicts
	);

var crMore = new dbxGroup(
		'crMore', // container ID [/-_a-zA-Z0-9/]
		'vertical', 	    // orientation ['vertical'|'horizontal']
		'10', 				// drag threshold ['n' pixels]
		'no',				// restrict drag movement to container axis ['yes'|'no']
		'10', 				// animate re-ordering [frames per transition, or '0' for no effect]
		'yes', 				// include open/close toggle buttons ['yes'|'no']
		'closed', 			// default state ['open'|'closed']
		'open', 			// word for "open", as in "open this box"
		'close', 			// word for "close", as in "close this box"
		'click-down and drag to move this box', // sentence for "move this box" by mouse
		'click to %toggle% this box', // pattern-match sentence for "(open|close) this box" by mouse
		'use the arrow keys to move this box', // sentence for "move this box" by keyboard
		', or press the enter key to %toggle% it',  // pattern-match sentence-fragment for "(open|close) this box" by keyboard
		'%mytitle%  [%dbxtitle%]' // pattern-match syntax for title-attribute conflicts
		);
});