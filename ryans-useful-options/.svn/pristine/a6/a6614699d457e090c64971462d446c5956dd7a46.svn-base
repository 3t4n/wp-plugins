<?php

	
	function is_child( $ofParent, $doRecursive = true ) {

		global $wpdb;
		$allCats = array();
		
		// Turn title or slug into ID if needed.
		if( !is_int( $ofParent ) ) {
			if( is_page() ) {
				# Different handling for Pages
				$getID = $wpdb->get_results("
					SELECT	ID as cat_ID
					FROM	{$wpdb->posts}
					WHERE	post_title = '{$ofParent}'
					OR		post_name = '{$ofParent}'
					LIMIT	0,1
				"); }
			else {
				# Get catID
				$getID = $wpdb->get_results("
					SELECT	cat_ID
					FROM	{$wpdb->terms}
//					FROM	{$wpdb->categories}
					WHERE	cat_name = '{$ofParent}'
					OR		category_nicename = '{$ofParent}'
					LIMIT	0,1
				"); }

			if( !$getID ) {
				# Not found.
				return false; 
			}
			else {
				# Found.
				$ofParent = $getID[0]->cat_ID;
				unset( $getID );
			}
		}
		
		// Everyone's a sub zero.
		if( $ofParent == 0 && $doRecursive ) { return true; }
	    
		// Now let's break it down to categories (or pages).
		if( is_page() ) {
			global $post;
			$allCats[] = $post->ID;
		} elseif( is_single() ) {
			$getCats = get_the_category();
			foreach( $getCats as $getCat )
				$allCats[] = $getCat->cat_ID;
			unset( $getCats );
		} elseif( is_category() ) {
			global $cat;
			$allCats[] = $cat;
		}

		// Already a match? Would save processing time.
		if( in_array( $ofParent, $allCats ) ) { return true; }
			
		// Post without recursive search ends here.
		if( ( is_single() ) && !$doRecursive ) { return false; }

		// Otherwise, let's do some genealogy.
//		while( count( $allCats ) != 0 ) {
		while( !empty($allCats) ) {
			if( in_array( $ofParent, $allCats ) ) { return true; }
			else { $allCats =  is_child_getParents( $allCats ); }
			}
		
		// Still here? Then nothing has been found.
		return false;

	}



if( !function_exists( "is_child_getParents" ) ) {

	function is_child_getParents( $fromChilds ) {
		
		// As there's only get_category_parents which isn't useful 
		// for fetching parental data, we'll have to query this
		// directly to the DB.
		global $wpdb;
		
		$fromChilds = implode( ", ", $fromChilds );
		if( !$fromChilds ) { return array(); }
		
		$getParents = 
			( is_page() )
			?	# Pages
				$wpdb->get_results("
					SELECT	post_parent AS category_parent
					FROM	{$wpdb->posts}
					WHERE	ID IN ({$fromChilds})
				")
			: 	# Posts / Categories
				$wpdb->get_results("
					SELECT	category_parent
//					FROM	{$wpdb->categories}
					FROM	{$wpdb->terms}
					WHERE	cat_ID IN ({$fromChilds})
				");
		
		foreach( $getParents as $getParent ) {
			if( $getParent->category_parent != 0 ) { $allParents[] = $getParent->category_parent; }
		}
		if( $allParents != '' ) { return $allParents; }

	}
}
