<?php
/*
Plugin Name: Amazon SmartLinks Widget
Description: Adds a sidebar widget display a variety of Amazon Bestsellers as a SmartLinks List
Author: AdaptiveBlue, Inc.
Version: 1.0
Author URI: http://adaptiveblue.com
*/


// Put functions into one big function we'll call at the plugins_loaded
// action. This ensures that all required plugin functions are defined.
function widget_amazon_smartlinks_init() {

	// Check for the required plugin functions. This will prevent fatal
	// errors occurring when you deactivate the dynamic-sidebar plugin.
	if ( !function_exists('register_sidebar_widget') )
		return;

	// Adds Amazon Bestsellers List to your sidebar
	function widget_amazon_books_smartlinks($args) {
		// $args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys. Default tags: li and h2.
		extract($args);

	        // get affiliate id
		$options = get_option('widget_amazon_books_smartlinks');
		$title = $options['title'];
		$float = $options['float'];
		$width = $options['width'];
		$numItems = $options['numItems'];
		$amazonId = $options['amazonId'];
		$ebayId = $options['ebayId'];
		$googleId = $options['googleId'];
        $feed = "http%3A%2F%2Fecs.amazonaws.com%2Fonca%2Fxml%3FService%3DAWSECommerceService%26AWSAccessKeyId%3D07GG2103RY5KFCY09GG2%26Operation%3DItemSearch%26SearchIndex%3DBooks%26BrowseNode%3D1000%26Sort%3Dsalesrank%26ResponseGroup%3DItemAttributes%2CImages%2CEditorialReview";

		echo $before_widget;
		echo widget_amazon_smartlinks_createScript($feed, $title, "amazon-item.xsl", $numItems, $width, $float, $amazonId, $ebayId, $googleId);
		echo $after_widget;
	}

	function widget_amazon_books_smartlinks_control() {

		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_amazon_books_smartlinks');
		if ( !is_array($options) )
		  $options = array('title'=>__('Amazon Best Selling Books', 'widgets'), 'float'=>__('none', 'widgets'), 'numItems'=>__('3', 'widgets'), 'amazonId'=>__('', 'widgets'), 'ebayId'=>__('', 'widgets'), 'googleId'=>__('', 'widgets'), 'width'=>__('200', 'widgets'));
		if ( $_POST['amazon_books_smartlinks-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['title'] = strip_tags(stripslashes($_POST['amazon_books_smartlinks-title']));
			$options['float'] = strip_tags(stripslashes($_POST['amazon_books_smartlinks-float']));
            $options['width'] = strip_tags(stripslashes($_POST['amazon_books_smartlinks-width']));
            $options['numItems'] = strip_tags(stripslashes($_POST['amazon_books_smartlinks-numItems']));
            $options['amazonId'] = strip_tags(stripslashes($_POST['amazon_books_smartlinks-amazonId']));
            $options['ebayId'] = strip_tags(stripslashes($_POST['amazon_books_smartlinks-ebayId']));
            $options['googleId'] = strip_tags(stripslashes($_POST['amazon_books_smartlinks-googleId']));

			update_option('widget_amazon_books_smartlinks', $options);
		}

		// Be sure you format your options to be valid HTML attributes.
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$float = htmlspecialchars($options['float'], ENT_QUOTES);
        $width = htmlspecialchars($options['width'], ENT_QUOTES);
        $numItems = htmlspecialchars($options['numItems'], ENT_QUOTES);
        $amazonId = htmlspecialchars($options['amazonId'], ENT_QUOTES);
        $ebayId = htmlspecialchars($options['ebayId'], ENT_QUOTES);
        $googleId = htmlspecialchars($options['googleId'], ENT_QUOTES);

        if(empty($numItems)) {
            $numItems = 4;
        }

        if(empty($width)) {
            $width = 200;
        }

		// form
        echo '<table>';
		echo '<tr><td><label for="amazon_books_smartlinks-title">' . __('Title:') . '</label></td><td> <input style="width: 200px;" id="amazon_books_smartlinks-title" name="amazon_books_smartlinks-title" type="text" value="'.$title.'" /></td></tr>';
        echo '<tr><td><label for="amazon_books_smartlinks-width">' . __('Widget Width:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_books_smartlinks-width" name="amazon_books_smartlinks-width" type="text" value="'.$width.'" /></td></tr>';
        echo '<tr><td><label for="amazon_books_smartlinks-numItems">' . __('Num Items:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_books_smartlinks-numItems" name="amazon_books_smartlinks-numItems" type="text" value="'.$numItems.'" /></td></tr>';
        echo '<tr><td><label for="amazon_books_smartlinks-amazonId">' . __('Amazon Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_books_smartlinks-amazonId" name="amazon_books_smartlinks-amazonId" type="text" value="'.$amazonId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_books_smartlinks-ebayId">' . __('eBay Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_books_smartlinks-ebayId" name="amazon_books_smartlinks-ebayId" type="text" value="'.$ebayId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_books_smartlinks-googleId">' . __('Google Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_books_smartlinks-googleId" name="amazon_books_smartlinks-googleId" type="text" value="'.$googleId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_books_smartlinks-float">' . __('Float (optional):', 'widgets') . '</label></td><td> <select id="amazon_books_smartlinks-float" name="amazon_books_smartlinks-float">' . widget_amazon_smartlinks_getFloatOptions($float) . '</select></td></tr>';
		echo '</table>';
		echo '<p>(The float option is necessary if your widget pushes the content of your sidebar to the bottom, or is stretched to the bottom of the sidebar)</p>';
		echo '<input type="submit" id="amazon_books_smartlinks-submit" name="amazon_books_smartlinks-submit" value="submit" />';
	}

	// Adds Amazon Bestselling Movies to your sidebar
	function widget_amazon_movies_smartlinks($args) {
		// $args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys. Default tags: li and h2.
		extract($args);

	        // get affiliate id
		$options = get_option('widget_amazon_movies_smartlinks');
		$title = $options['title'];
		$float = $options['float'];
		$width = $options['width'];
		$numItems = $options['numItems'];
		$amazonId = $options['amazonId'];
		$ebayId = $options['ebayId'];
		$googleId = $options['googleId'];
        $feed = "http%3A%2F%2Fecs.amazonaws.com%2Fonca%2Fxml%3FService%3DAWSECommerceService%26AWSAccessKeyId%3D07GG2103RY5KFCY09GG2%26Operation%3DItemSearch%26SearchIndex%3DDVD%26BrowseNode%3D139452%26Sort%3Dsalesrank%26ResponseGroup%3DItemAttributes%2CImages%2CEditorialReview";

		echo $before_widget;
		echo widget_amazon_smartlinks_createScript($feed, $title, "amazon-item.xsl", $numItems, $width, $float, $amazonId, $ebayId, $googleId);
		echo $after_widget;
	}

	function widget_amazon_movies_smartlinks_control() {

		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_amazon_movies_smartlinks');
		if ( !is_array($options) )
		  $options = array('title'=>__('Amazon Best Selling DVDs', 'widgets'), 'float'=>__('none', 'widgets'), 'numItems'=>__('3', 'widgets'), 'amazonId'=>__('', 'widgets'), 'ebayId'=>__('', 'widgets'), 'googleId'=>__('', 'widgets'), 'width'=>__('200', 'widgets'));
		if ( $_POST['amazon_movies_smartlinks-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['title'] = strip_tags(stripslashes($_POST['amazon_movies_smartlinks-title']));
			$options['float'] = strip_tags(stripslashes($_POST['amazon_movies_smartlinks-float']));
            $options['width'] = strip_tags(stripslashes($_POST['amazon_movies_smartlinks-width']));
            $options['numItems'] = strip_tags(stripslashes($_POST['amazon_movies_smartlinks-numItems']));
            $options['amazonId'] = strip_tags(stripslashes($_POST['amazon_movies_smartlinks-amazonId']));
            $options['ebayId'] = strip_tags(stripslashes($_POST['amazon_movies_smartlinks-ebayId']));
            $options['googleId'] = strip_tags(stripslashes($_POST['amazon_movies_smartlinks-googleId']));

			update_option('widget_amazon_movies_smartlinks', $options);
		}

		// Be sure you format your options to be valid HTML attributes.
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$float = htmlspecialchars($options['float'], ENT_QUOTES);  
        $width = htmlspecialchars($options['width'], ENT_QUOTES);
        $numItems = htmlspecialchars($options['numItems'], ENT_QUOTES);
        $amazonId = htmlspecialchars($options['amazonId'], ENT_QUOTES);
        $ebayId = htmlspecialchars($options['ebayId'], ENT_QUOTES);
        $googleId = htmlspecialchars($options['googleId'], ENT_QUOTES);

        if(empty($numItems)) {
            $numItems = 4;
        }

        if(empty($width)) {
            $width = 200;
        }

		// form
        echo '<table>';
		echo '<tr><td><label for="amazon_movies_smartlinks-title">' . __('Title:') . '</label></td><td> <input style="width: 200px;" id="amazon_movies_smartlinks-title" name="amazon_movies_smartlinks-title" type="text" value="'.$title.'" /></td></tr>';
        echo '<tr><td><label for="amazon_movies_smartlinks-width">' . __('Widget Width:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_movies_smartlinks-width" name="amazon_movies_smartlinks-width" type="text" value="'.$width.'" /></td></tr>';
        echo '<tr><td><label for="amazon_movies_smartlinks-numItems">' . __('Num Items:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_movies_smartlinks-numItems" name="amazon_movies_smartlinks-numItems" type="text" value="'.$numItems.'" /></td></tr>';
        echo '<tr><td><label for="amazon_movies_smartlinks-amazonId">' . __('Amazon Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_movies_smartlinks-amazonId" name="amazon_movies_smartlinks-amazonId" type="text" value="'.$amazonId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_movies_smartlinks-ebayId">' . __('eBay Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_movies_smartlinks-ebayId" name="amazon_movies_smartlinks-ebayId" type="text" value="'.$ebayId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_movies_smartlinks-googleId">' . __('Google Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_movies_smartlinks-googleId" name="amazon_movies_smartlinks-googleId" type="text" value="'.$googleId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_movies_smartlinks-float">' . __('Float (optional):', 'widgets') . '</label></td><td> <select id="amazon_movies_smartlinks-float" name="amazon_movies_smartlinks-float">' . widget_amazon_smartlinks_getFloatOptions($float) . '</select></td></tr>';
		echo '</table>';
		echo '<p>(The float option is necessary if your widget pushes the content of your sidebar to the bottom, or is stretched to the bottom of the sidebar)</p>';
		echo '<input type="submit" id="amazon_movies_smartlinks-submit" name="amazon_movies_smartlinks-submit" value="submit" />';
	}

	// Adds Amazon Bestselling Music to your sidebar
	function widget_amazon_music_smartlinks($args) {
		// $args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys. Default tags: li and h2.
		extract($args);

	        // get affiliate id
		$options = get_option('widget_amazon_music_smartlinks');
		$title = $options['title'];
		$float = $options['float'];
		$width = $options['width'];
		$numItems = $options['numItems'];
		$amazonId = $options['amazonId'];
		$ebayId = $options['ebayId'];
		$googleId = $options['googleId'];
		$feed = "http%3A%2F%2Fecs.amazonaws.com%2Fonca%2Fxml%3FService%3DAWSECommerceService%26AWSAccessKeyId%3D07GG2103RY5KFCY09GG2%26Operation%3DItemSearch%26SearchIndex%3DMusic%26BrowseNode%3D5174%26Sort%3Dsalesrank%26ResponseGroup%3DItemAttributes%2CImages%2CEditorialReview";

		echo $before_widget;
		echo widget_amazon_smartlinks_createScript($feed, $title, "amazon-item.xsl", $numItems, $width, $float, $amazonId, $ebayId, $googleId);
		echo $after_widget;
	}

	function widget_amazon_music_smartlinks_control() {

		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_amazon_music_smartlinks');
		if ( !is_array($options) )
		  $options = array('title'=>__('Amazon Best Selling Music', 'widgets'), 'float'=>__('none', 'widgets'), 'numItems'=>__('3', 'widgets'), 'amazonId'=>__('', 'widgets'), 'ebayId'=>__('', 'widgets'), 'googleId'=>__('', 'widgets'), 'width'=>__('200', 'widgets'));
		if ( $_POST['amazon_music_smartlinks-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['title'] = strip_tags(stripslashes($_POST['amazon_music_smartlinks-title']));
			$options['float'] = strip_tags(stripslashes($_POST['amazon_music_smartlinks-float']));
            $options['width'] = strip_tags(stripslashes($_POST['amazon_music_smartlinks-width']));
			$options['numItems'] = strip_tags(stripslashes($_POST['amazon_music_smartlinks-numItems']));
			$options['amazonId'] = strip_tags(stripslashes($_POST['amazon_music_smartlinks-amazonId']));
			$options['ebayId'] = strip_tags(stripslashes($_POST['amazon_music_smartlinks-ebayId']));
			$options['googleId'] = strip_tags(stripslashes($_POST['amazon_music_smartlinks-googleId']));

			update_option('widget_amazon_music_smartlinks', $options);
		}

		// Be sure you format your options to be valid HTML attributes.
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$float = htmlspecialchars($options['float'], ENT_QUOTES);
        $width = htmlspecialchars($options['width'], ENT_QUOTES);
        $numItems = htmlspecialchars($options['numItems'], ENT_QUOTES);
        $amazonId = htmlspecialchars($options['amazonId'], ENT_QUOTES);
        $ebayId = htmlspecialchars($options['ebayId'], ENT_QUOTES);
        $googleId = htmlspecialchars($options['googleId'], ENT_QUOTES);

        if(empty($numItems)) {
            $numItems = 4;
        }

        if(empty($width)) {
            $width = 200;
        }

		// form
        echo '<table>';
		echo '<tr><td><label for="amazon_music_smartlinks-title">' . __('Title:') . '</label></td><td> <input style="width: 200px;" id="amazon_music_smartlinks-title" name="amazon_music_smartlinks-title" type="text" value="'.$title.'" /></td></tr>';
        echo '<tr><td><label for="amazon_music_smartlinks-width">' . __('Widget Width:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_music_smartlinks-width" name="amazon_music_smartlinks-width" type="text" value="'.$width.'" /></td></tr>';
        echo '<tr><td><label for="amazon_music_smartlinks-numItems">' . __('Num Items:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_music_smartlinks-numItems" name="amazon_music_smartlinks-numItems" type="text" value="'.$numItems.'" /></td></tr>';
        echo '<tr><td><label for="amazon_music_smartlinks-amazonId">' . __('Amazon Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_music_smartlinks-amazonId" name="amazon_music_smartlinks-amazonId" type="text" value="'.$amazonId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_music_smartlinks-ebayId">' . __('eBay Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_music_smartlinks-ebayId" name="amazon_music_smartlinks-ebayId" type="text" value="'.$ebayId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_music_smartlinks-googleId">' . __('Google Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_music_smartlinks-googleId" name="amazon_music_smartlinks-googleId" type="text" value="'.$googleId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_music_smartlinks-float">' . __('Float (optional):', 'widgets') . '</label></td><td> <select id="amazon_music_smartlinks-float" name="amazon_music_smartlinks-float">' . widget_amazon_smartlinks_getFloatOptions($float) . '</select></td></tr>';
        echo '</table>';
        echo '<p>(The float option is necessary if your widget pushes the content of your sidebar to the bottom, or is stretched to the bottom of the sidebar)</p>';
		echo '<input type="submit" id="amazon_music_smartlinks-submit" name="amazon_music_smartlinks-submit" value="submit" />';
	}


	// Adds Amazon Bestselling Electronics to your sidebar
	function widget_amazon_electronics_smartlinks($args) {
		// $args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys. Default tags: li and h2.
		extract($args);

	        // get affiliate id
		$options = get_option('widget_amazon_electronics_smartlinks');
		$title = $options['title'];
		$float = $options['float'];
		$width = $options['width'];
		$numItems = $options['numItems'];
		$amazonId = $options['amazonId'];
		$ebayId = $options['ebayId'];
		$googleId = $options['googleId'];
        $feed = "http%3A%2F%2Fecs.amazonaws.com%2Fonca%2Fxml%3FService%3DAWSECommerceService%26AWSAccessKeyId%3D07GG2103RY5KFCY09GG2%26Operation%3DItemSearch%26SearchIndex%3DElectronics%26BrowseNode%3D172282%26Sort%3Dsalesrank%26ResponseGroup%3DItemAttributes%2CImages%2CEditorialReview";

		echo $before_widget;
		echo widget_amazon_smartlinks_createScript($feed, $title, "amazon-item.xsl", $numItems, $width, $float, $amazonId, $ebayId, $googleId);
		echo $after_widget;
	}

	function widget_amazon_electronics_smartlinks_control() {

		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_amazon_electronics_smartlinks');
		if ( !is_array($options) )
		  $options = array('title'=>__('Amazon Best Selling Electronics', 'widgets'), 'float'=>__('none', 'widgets'), 'numItems'=>__('3', 'widgets'), 'amazonId'=>__('', 'widgets'), 'ebayId'=>__('', 'widgets'), 'googleId'=>__('', 'widgets'), 'width'=>__('200', 'widgets'));
		if ( $_POST['amazon_electronics_smartlinks-submit'] ) {

			// Remember to sanitize and format use input appropriately.
			$options['title'] = strip_tags(stripslashes($_POST['amazon_electronics_smartlinks-title']));
			$options['float'] = strip_tags(stripslashes($_POST['amazon_electronics_smartlinks-float']));
            $options['width'] = strip_tags(stripslashes($_POST['amazon_electronics_smartlinks-width']));
            $options['numItems'] = strip_tags(stripslashes($_POST['amazon_electronics_smartlinks-numItems']));
            $options['amazonId'] = strip_tags(stripslashes($_POST['amazon_electronics_smartlinks-amazonId']));
            $options['ebayId'] = strip_tags(stripslashes($_POST['amazon_electronics_smartlinks-ebayId']));
            $options['googleId'] = strip_tags(stripslashes($_POST['amazon_electronics_smartlinks-googleId']));

			update_option('widget_amazon_electronics_smartlinks', $options);
		}

		// Be sure you format your options to be valid HTML attributes.
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$float = htmlspecialchars($options['float'], ENT_QUOTES);
        $width = htmlspecialchars($options['width'], ENT_QUOTES);
        $numItems = htmlspecialchars($options['numItems'], ENT_QUOTES);
        $amazonId = htmlspecialchars($options['amazonId'], ENT_QUOTES);
        $ebayId = htmlspecialchars($options['ebayId'], ENT_QUOTES);
        $googleId = htmlspecialchars($options['googleId'], ENT_QUOTES);

        if(empty($numItems)) {
            $numItems = 4;
        }

        if(empty($width)) {
            $width = 200;
        }


		// form
        echo '<table>';
		echo '<tr><td><label for="amazon_electronics_smartlinks-title">' . __('Title:') . '</label></td><td> <input style="width: 200px;" id="amazon_electronics_smartlinks-title" name="amazon_electronics_smartlinks-title" type="text" value="'.$title.'" /></td></tr>';
        echo '<tr><td><label for="amazon_electronics_smartlinks-width">' . __('Widget Width:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_electronics_smartlinks-width" name="amazon_electronics_smartlinks-width" type="text" value="'.$width.'" /></td></tr>';
        echo '<tr><td><label for="amazon_electronics_smartlinks-numItems">' . __('Num Items:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_electronics_smartlinks-numItems" name="amazon_electronics_smartlinks-numItems" type="text" value="'.$numItems.'" /></td></tr>';
        echo '<tr><td><label for="amazon_electronics_smartlinks-amazonId">' . __('Amazon Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_electronics_smartlinks-amazonId" name="amazon_electronics_smartlinks-amazonId" type="text" value="'.$amazonId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_electronics_smartlinks-ebayId">' . __('eBay Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_electronics_smartlinks-ebayId" name="amazon_electronics_smartlinks-ebayId" type="text" value="'.$ebayId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_electronics_smartlinks-googleId">' . __('Google Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_electronics_smartlinks-googleId" name="amazon_electronics_smartlinks-googleId" type="text" value="'.$googleId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_electronics_smartlinks-float">' . __('Float (optional):', 'widgets') . '</label></td><td> <select id="amazon_electronics_smartlinks-float" name="amazon_electronics_smartlinks-float">' . widget_amazon_smartlinks_getFloatOptions($float) . '</select></td></tr>';
        echo '</table>';
        echo '<p>(The float option is necessary if your widget pushes the content of your sidebar to the bottom, or is stretched to the bottom of the sidebar)</p>';
		echo '<input type="submit" id="amazon_electronics_smartlinks-submit" name="amazon_electronics_smartlinks-submit" value="submit" />';
	}


	// Adds your Amazon Wishlit to your sidebar
	function widget_amazon_wishlist_smartlinks($args) {
		// $args is an array of strings that help widgets to conform to
		// the active theme: before_widget, before_title, after_widget,
		// and after_title are the array keys. Default tags: li and h2.
		extract($args);

	        // get affiliate id
		$options = get_option('widget_amazon_wishlist_smartlinks');
		$title = $options['title'];
		$listId = $options['listId'];
		$float = $options['float'];
		$width = $options['width'];
		$numItems = $options['numItems'];
		$amazonId = $options['amazonId'];
		$ebayId = $options['ebayId'];
		$googleId = $options['googleId'];
        $feed = 'http%3A%2F%2Fecs.amazonaws.com%2Fonca%2Fxml%3FService%3DAWSECommerceService%26AWSAccessKeyId%3D07GG2103RY5KFCY09GG2%26Operation%3DListLookup%26ListType%3DWishList%26ListId%3D' . $listId . '%26ResponseGroup%3DItemAttributes%2CImages%2CEditorialReview';

		echo $before_widget;
		echo widget_amazon_smartlinks_createScript($feed, $title, "amazon-list.xsl", $numItems, $width, $float, $amazonId, $ebayId, $googleId);
		echo $after_widget;
	}

	function widget_amazon_wishlist_smartlinks_control() {

		// Get our options and see if we're handling a form submission.
		$options = get_option('widget_amazon_wishlist_smartlinks');
		if ( !is_array($options) )
		  $options = array('title'=>__('My Amazon Wish List', 'widgets'), 'listId'=>__('', 'widgets'), 'float'=>__('none', 'widgets'), 'numItems'=>__('3', 'widgets'), 'amazonId'=>__('', 'widgets'), 'ebayId'=>__('', 'widgets'), 'googleId'=>__('', 'widgets'), 'width'=>__('200', 'widgets'));
		if ( $_POST['amazon_wishlist_smartlinks-submit'] ) {
            // get list id from email address
            $email = $_POST['amazon_wishlist_smartlinks-email'];
            $responseString = file_get_contents("http://s1.smrtlnks.com/users/GetPageContent.php?url=http://ecs.amazonaws.com/onca/xml?Service=AWSECommerceService" .
              "&AWSAccessKeyId=07GG2103RY5KFCY09GG2&Operation=ListSearch&ListType=WishList&Email=" . $email);
			if(strpos($responseString, "Error") === FALSE) {
                $start = strpos($responseString, "<ListId>") + strlen("<ListId>");
                $end = strpos($responseString, "</ListId");
                $length = $end - $start;
                $listId = substr($responseString, $start, $length);
            }
            else {
			    // we couldn't find anything
			    $listId = ".error.";
            }

			// Remember to sanitize and format use input appropriately.
			$options['title'] = strip_tags(stripslashes($_POST['amazon_wishlist_smartlinks-title']));
			$options['email'] = strip_tags(stripslashes($email));
			$options['listId'] = strip_tags(stripslashes($listId));
			$options['float'] = strip_tags(stripslashes($_POST['amazon_wishlist_smartlinks-float']));
			$options['width'] = strip_tags(stripslashes($_POST['amazon_wishlist_smartlinks-width']));
			$options['numItems'] = strip_tags(stripslashes($_POST['amazon_wishlist_smartlinks-numItems']));
			$options['amazonId'] = strip_tags(stripslashes($_POST['amazon_wishlist_smartlinks-amazonId']));
			$options['ebayId'] = strip_tags(stripslashes($_POST['amazon_wishlist_smartlinks-ebayId']));
			$options['googleId'] = strip_tags(stripslashes($_POST['amazon_wishlist_smartlinks-googleId']));
			update_option('widget_amazon_wishlist_smartlinks', $options);
		}

		// Be sure you format your options to be valid HTML attributes.
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$email = htmlspecialchars($options['email'], ENT_QUOTES);
		$float = htmlspecialchars($options['float'], ENT_QUOTES);
		$width = htmlspecialchars($options['width'], ENT_QUOTES);
		$numItems = htmlspecialchars($options['numItems'], ENT_QUOTES);
		$amazonId = htmlspecialchars($options['amazonId'], ENT_QUOTES);
		$ebayId = htmlspecialchars($options['ebayId'], ENT_QUOTES);
		$googleId = htmlspecialchars($options['googleId'], ENT_QUOTES);

        if(empty($numItems)) {
            $numItems = 4;
        }

        if(empty($width)) {
            $width = 200;
        }

		// form
        echo '<table>';
		echo '<tr><td><label for="amazon_wishlist_smartlinks-title">' . __('Title:') . '</label></td><td> <input style="width: 200px;" id="amazon_wishlist_smartlinks-title" name="amazon_wishlist_smartlinks-title" type="text" value="'.$title.'" /></td></tr>';
		echo '<tr><td><label for="amazon_wishlist_smartlinks-email">' . __('Email Address:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_wishlist_smartlinks-email" name="amazon_wishlist_smartlinks-email" type="text" value="'.$email.'" /></td></tr>';
        echo '<tr><td><label for="amazon_wishlist_smartlinks-width">' . __('Widget Width:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_wishlist_smartlinks-width" name="amazon_wishlist_smartlinks-width" type="text" value="'.$width.'" /></td></tr>';
        echo '<tr><td><label for="amazon_wishlist_smartlinks-numItems">' . __('Num Items:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_wishlist_smartlinks-numItems" name="amazon_wishlist_smartlinks-numItems" type="text" value="'.$numItems.'" /></td></tr>';
        echo '<tr><td><label for="amazon_wishlist_smartlinks-amazonId">' . __('Amazon Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_wishlist_smartlinks-amazonId" name="amazon_wishlist_smartlinks-amazonId" type="text" value="'.$amazonId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_wishlist_smartlinks-ebayId">' . __('eBay Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_wishlist_smartlinks-ebayId" name="amazon_wishlist_smartlinks-ebayId" type="text" value="'.$ebayId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_wishlist_smartlinks-googleId">' . __('Google Affiliate:', 'widgets') . '</label></td><td> <input style="width: 200px;" id="amazon_wishlist_smartlinks-googleId" name="amazon_wishlist_smartlinks-googleId" type="text" value="'.$googleId.'" /></td></tr>';
        echo '<tr><td><label for="amazon_wishlist_smartlinks-float">' . __('Float (optional):', 'widgets') . '</label></td><td> <select id="amazon_wishlist_smartlinks-float" name="amazon_wishlist_smartlinks-float">' . widget_amazon_smartlinks_getFloatOptions($float) . '</select></td></tr>';
		echo '</table>';
		echo '<p>(The float option is necessary if your widget pushes the content of your sidebar to the bottom, or is stretched to the bottom of the sidebar)</p>';
		echo '<input type="submit" id="amazon_wishlist_smartlinks-submit" name="amazon_wishlist_smartlinks-submit" value="submit" />';
	}

	function widget_amazon_smartlinks_createScript($feed, $title, $xsl, $numItems, $width, $float, $amazonId, $ebayId, $googleId) {
        if(empty($numItems)) {
            $numItems = 4;
        }

        if(empty($width)) {
            $width = 200;
        }

        $script = '<script src="http://' . widget_amazon_smartlinks_getHostName() . '/users/GenerateBlueLinks.php?skin=white&width='. $width . '&display=both&numItems=' . $numItems . '&auto=yes&title='. $title . '&xsl=' . $xsl . '&feedUrl=' . $feed . '&layout=list&&blueAmazonId=' . $amazonId . '&blueEbayId=' .$ebayId .'&blueGoogleId=' . $googleId .'" type="text/javascript"></script>';

	    if(strcmp($float, "left") === 0 || strcmp($float, "right") === 0) {
	        return '<div style="float:' . $float . '">' . $script . '</div><div style="clear:' . $float .'"></div>';
	    }
	    else {
	        return $script;
	    }
	}

	function widget_amazon_smartlinks_getHostName() {
        $serverIndex = rand(1, 10);
        return "s" . $serverIndex . ".smrtlnks.com";
	}

	function widget_amazon_smartlinks_getFloatOptions($float) {
	    $floatOptions = array("none", "right", "left");
	    $result = '';

		foreach($floatOptions as $floatOption){
		    $result .= '<option value="' . $floatOption . '"';
		    if(strcmp($float, $floatOption) ===0) {
		        $result .= ' selected ';
		    }
		    $result .= '>' . $floatOption . '</option>';
		}

		return $result;
	}

	register_sidebar_widget(array('Amazon Best Selling Electronics', 'widgets'), 'widget_amazon_electronics_smartlinks');
	register_widget_control(array('Amazon Best Selling Electronics', 'widgets'), 'widget_amazon_electronics_smartlinks_control', 320, 350);

    register_sidebar_widget(array('Amazon Best Selling Music', 'widgets'), 'widget_amazon_music_smartlinks');
    register_widget_control(array('Amazon Best Selling Music', 'widgets'), 'widget_amazon_music_smartlinks_control', 320, 350);

    register_sidebar_widget(array('Amazon Best Selling DVDs', 'widgets'), 'widget_amazon_movies_smartlinks');
    register_widget_control(array('Amazon Best Selling DVDs', 'widgets'), 'widget_amazon_movies_smartlinks_control', 320, 350);
 
    register_sidebar_widget(array('Amazon Best Selling Books', 'widgets'), 'widget_amazon_books_smartlinks');
    register_widget_control(array('Amazon Best Selling Books', 'widgets'), 'widget_amazon_books_smartlinks_control', 320, 350);

    register_sidebar_widget(array('Amazon Wish List', 'widgets'), 'widget_amazon_wishlist_smartlinks');
    register_widget_control(array('Amazon Wish List', 'widgets'), 'widget_amazon_wishlist_smartlinks_control', 320, 380);

}

add_action('widgets_init', 'widget_amazon_smartlinks_init');

?>