<!-- Designersblog Adblock Blocker -->
<?php 
require_once(ABSPATH. '/wp-content/plugins/adblock-blocker/scripts/popupbase.php');

$db_adblock_ugroup = get_option( 'db_adblock_ugroup' );
$db_adblock_allpages = get_option( 'db_adblock_allpages' );
	

// Output start
if ( 'all' == $db_adblock_allpages['page'] ) { // show on index only
	// adblock_ugroup function start
	if ( 'true' == $db_adblock_ugroup['reg_users'] ) { // registered users GET the popup 
			db_popup(); // show popup
	}	
	
	elseif ( 'false' == $db_adblock_ugroup['reg_users'] ) { // registered users DON'T GET the popup
		if ( is_user_logged_in() ) { // if user is logged in
		}
		else { // if user isn't logged in
			db_popup(); // show popup
		}
	}
// adblock_ugroup function end
}
elseif ( 'index' == $db_adblock_allpages['page'] ) { // show on all pages
	if(is_front_page() ) {
		// adblock_ugroup function start
	if ( 'true' == $db_adblock_ugroup['reg_users'] ) { // registered users GET the popup 
			db_popup(); // show popup
	}	
	
	elseif ( 'false' == $db_adblock_ugroup['reg_users'] ) { // registered users DON'T GET the popup
		if ( is_user_logged_in() ) { // if user is logged in
		}
		else { // if user isn't logged in
			db_popup(); // show popup
		}
	}
// adblock_ugroup function end
	}
}
elseif ( 'post' == $db_adblock_allpages['page'] ) { // show on posts/pages only
	if(is_single() ) { // if single post
		// adblock_ugroup function start
	if ( 'true' == $db_adblock_ugroup['reg_users'] ) { // registered users GET the popup 
			db_popup(); // show popup
	}	
	
	elseif ( 'false' == $db_adblock_ugroup['reg_users'] ) { // registered users DON'T GET the popup
		if ( is_user_logged_in() ) { // if user is logged in
		}
		else { // if user isn't logged in
			db_popup(); // show popup
		}
	}
// adblock_ugroup function end
	}
	elseif(is_page() ) { // if single page
		// adblock_ugroup function start
	if ( 'true' == $db_adblock_ugroup['reg_users'] ) { // registered users GET the popup 
			db_popup(); // show popup
	}	
	
	elseif ( 'false' == $db_adblock_ugroup['reg_users'] ) { // registered users DON'T GET the popup
		if ( is_user_logged_in() ) { // if user is logged in
		}
		else { // if user isn't logged in
			db_popup(); // show popup
		}
	}
// adblock_ugroup function end
	}
}
// Output end
?>
<!-- End Designersblog Adblock Blocker -->