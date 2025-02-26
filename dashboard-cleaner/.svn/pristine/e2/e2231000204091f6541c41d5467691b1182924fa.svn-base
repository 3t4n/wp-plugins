<?php
/*
 +=====================================================================+
 |     ____            _     _                         _               |
 |    |  _ \  __ _ ___| |__ | |__   ___   __ _ _ __ __| |              |
 |    | | | |/ _` / __| '_ \| '_ \ / _ \ / _` | '__/ _` |              |
 |    | |_| | (_| \__ \ | | | |_) | (_) | (_| | | | (_| |              |
 |    |____/ \__,_|___/_| |_|_.__/ \___/ \__,_|_|  \__,_|              |
 |      ____ _                                                         |
 |     / ___| | ___  __ _ _ __   ___ _ __                              |
 |    | |   | |/ _ \/ _` | '_ \ / _ \ '__|                             |
 |    | |___| |  __/ (_| | | | |  __/ |                                |
 |     \____|_|\___|\__,_|_| |_|\___|_|                                |
 |                                                                     |
 | (c) Jerome Bruandet ~ https://nintechnet.com/bruandet/              |
 +=====================================================================+
*/
if (! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

/* ================================================================== */

function dhcl_help() {

	// Contextual help:

	get_current_screen()->add_help_tab( array(
		'id'        => 'dhcl_help_overview',
		'title'     => __("Overview", "dashboard-cleaner"),
		'content'   => '<div>' .
			'<p>'. __( "Dashboard Cleaner allows you to hide any HTML elements from your admin dashboard such as annoying banners, unwanted ads and other nuisances, and basically anything else you want. It works like a DOM inspector:", "dashboard-cleaner" ) . '</p>' .
			'<ol>' .
				'<li>' . __( "Start Dashboard Cleaner from the above <strong>DHCL</strong> Toolbar menu.", "dashboard-cleaner" ) . '</li>' .
				'<li>' . __( "Move your mouse over the HTML element you want to hide. It will be outlined and a label will display the element name as well as its attributes (e.g., <code>id</code>, <code>class</code>, <code>src</code>, <code>href</code>, <code>name</code> or <code>style</code>). Make sure it has at least one attribute, otherwise you won't be able to add it to your filter list. Then, click on it.", "dashboard-cleaner" ) . '</li>' .
				'<li>' . __( "Select the attribute name and value pair you want the filter to apply to. You can also select the method used to hide the element (see the <strong>FAQ</strong> section), view the selected HTML source and add a small comment.", "dashboard-cleaner" ) . '</li>' .
				'<li>' . __( "Click the <strong>Create a Filter</strong> button.", "dashboard-cleaner" ) . '</li>' .
			'</ol>' .
			'<p>' . __( "If you make a mistake, click on <strong>Undo last change</strong> in the <strong>DHCL</strong> Toolbar menu and try your luck again!", "dashboard-cleaner" ) . '</p>' .
		'</div>'
	) );

	get_current_screen()->add_help_tab( array(
		'id'        => 'dhcl_help_faq',
		'title'     => __("FAQ", "dashboard-cleaner"),
		'content'   => '<div style="height:350px;">' .
			'<ul>'.
				'<li><strong>'. __( "What is the difference between hiding an element and making it invisible?", "dashboard-cleaner" ) .'</strong><br />' .
					__( "Hiding will remove the element and the space it occupies; making it invisible will mask the element but will keep the space it occupies. Hiding the element is the preferrered method but in a few cases, it can wrongly alter the whole page layout.", "dashboard-cleaner" ) .
				'</li><br />' .

				'<li><strong>'. __( "Why attempts to filter a link from the <code>href</code> attribute don't always work.", "dashboard-cleaner" ) .'</strong><br />'.
					__( "WordPress can add security nonces to links, e.g. <code>index.php?foo=bar&nonce=1234567</code>. Because nonces have a limited lifetime after which they expire, you must remove them when you create your filter (e.g. <code>index.php?foo=bar&nonce</code> or <code>index.php?foo=bar</code>).", "dashboard-cleaner" ) .
				'</li><br />' .

				'<li><strong>'. __( "Shall the filter be based on the exact attribute value, or can it be shortened (i.e., partial match)?", "dashboard-cleaner" ) .'</strong><br />'.
					__( "Partial match is accepted but whatever value you enter, it must start and end on a word boundary (as opposed to a substring).", "dashboard-cleaner" ) .
					' ' .	__( "For instance, assuming the following <code>style</code> value:", "dashboard-cleaner" ) .
					'<br />' .
					"<code>border-radius:20%;display:inline-block;height:150px;background:transparent url('http://foo.com/bar.png') no-repeat scroll center center;</code>" .
					'<br />' .
					__( "It could be shortened to:", "dashboard-cleaner" ) .
					'<ul>'.
						'<li><code>http://foo.com/bar.png</code></li>' .
						"<li><code>background:transparent url('http://foo.com/bar.png') no-repeat</code></li>" .
						'<li><code>display:inline-block;height:150px;background</code></li>' .
					'</ul>' .
					__( "But it <strong>could not</strong> be shortened to:", "dashboard-cleaner" ) .
					'<ul>'.
						"<li><code>.com/bar.png')</code></li>" .
						"<li><code>ground:transparent url('http://foo.com/bar.png') no-rep</code></li>" .
						"<li><code>play:inline-block;height:150px;back</code></li>" .
					'</ul>' .
				'</li><br />' .

				'<li><strong>'. __( "Are field values case sensitive?", "dashboard-cleaner" ) .'</strong><br />' .
				__( "The attribute value is case-sensitive, the HTML element and attribute names aren't.", "dashboard-cleaner" ) .
				'</li><br />' .

				'<li><strong>'. __( "Where does Dashboard Cleaner store its data?", "dashboard-cleaner" ) .'</strong><br />' .
					sprintf( __( "Its settings are saved to the database, but the filters are saved to a file named %s and located inside the %s folder (single installation) or the %s folders (multisite installation).", "dashboard-cleaner" ), '<code>dhcl_xxxxx.filter</code>', '<code>/wp-content/uploads/dashboard-cleaner/</code>', '<code>/wp-content/uploads/sites/X/dashboard-cleaner/</code>' ) . ' ' . __( "Removing or renaming that file will simply delete your filters without affecting Dashboad Cleaner settings.", "dashboard-cleaner" ) .
				'</li><br />' .

				'<li><strong>'. __( "Will it slow down my site?", "dashboard-cleaner" ) .'</strong><br />' .
					__( "Dashboard Cleaner runs only in the back-end section (admin dashboard) not the front-end, hence it won't affect your visitors.", "dashboard-cleaner" ) .
				'</li><br />' .

			'</ul>'.
		'</div>'
	) );
}
/* ================================================================== */
// EOF
