<?php
/**
 * @package Auction_Feed
 * @version 1.1.2
 */
/*
Plugin Name: Auction Feed
Plugin URI: http://wordpress.org/plugins/auction-feed/
Description: Display your eBay items on your own website allowing visitors to search your products and buy them easily.  Choose options and styles to suit your wordpress theme for simple and seamless integration..
Version: 1.1.2
Author: OneStepDesign
Author URI: http://onestepdesign.co.uk/
License: GPL2   `
*/

  namespace AuctionFeed;

  add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'AuctionFeed\\auction_feed_settings_link');
  add_action('admin_menu', 'AuctionFeed\\auction_feed_plugin_setup_menu');
  add_action('admin_enqueue_scripts', 'AuctionFeed\\auction_feed_load_scripts');
  add_shortcode('auctionfeed', 'AuctionFeed\\auction_feed_shortcode');

  function auction_feed_settings_link( $links ) {
    $myLinks = array(
      '<a href="' . admin_url('admin.php?page=auction-feed-plugin') . '">Settings</a>'
    );
    return array_merge($links, $myLinks);
  }

  function auction_feed_load_scripts() {
    wp_enqueue_style( 'style', plugins_url('auction-feed/css/style.css') );
    wp_enqueue_script( 'formValidate', plugins_url('auction-feed/js/jquery.validate.min.js') );
    wp_enqueue_script( 'ajaxCalls', plugins_url('auction-feed/js/ajax-calls.js') );
    wp_enqueue_script( 'setupFeed', plugins_url('auction-feed/js/setup-feed.js') );
  }


  function auction_feed_plugin_setup_menu() {
    $myIcon = 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMzVweCIgaGVpZ2h0PSIzNXB4IiB2aWV3Qm94PSIwIDAgMzUgMzUiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDM1IDM1IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxnPg0KCTwvZz4NCgk8Zz4NCgk8L2c+DQoJPGc+DQoJCTxnPg0KCQkJPGc+DQoJCQkJPGc+DQoJCQkJCTxwYXRoIGZpbGw9InJlZCIgZD0iTTIuNSwxOS40MDVsMC40MjktMC4yNDlsNS44MTItMy4zOGw1LjA2Ny0yLjk1bC0wLjUwMS0wLjk4NWwtMS4wNTItMi4wNjlsOC4yMjItNS4xMTdMMjEuNSw2LjY2OWwzLjczLDcuMzM2DQoJCQkJCQlsLTguMjIzLDUuMTE4bC0xLjU1NS0zLjA1OUwyLjUsMjQuNjc0VjE5LjQwNXogTTIwLjU5NywyLjg2N2MtMC4wNSwwLjQwOS0wLjIzMiwwLjc1Ny0wLjUzMywwLjk0MmwtOC4yNDgsNS4xMzQNCgkJCQkJCWMtMC42MDIsMC4zNzUtMS40NDktMC4wMzEtMS44OTQtMC45MDdDOS42OTksNy41OTcsOS42MjEsNy4xMjUsOS42Nyw2LjcxNmMwLjA1Mi0wLjQwOSwwLjIzMy0wLjc1NiwwLjUzNC0wLjk0Mmw4LjI0OC01LjEzNA0KCQkJCQkJYzAuNjAyLTAuMzc0LDEuNDQ5LDAuMDMyLDEuODk1LDAuOTA4QzIwLjU2OSwxLjk4MywyMC42NDgsMi40NTYsMjAuNTk3LDIuODY3eiBNMjkuODQxLDI1LjQxNA0KCQkJCQkJYzAuNDU2LDAuNDY0LDAuNzM3LDEuMTA2LDAuNzM3LDEuODE1SDE3LjQyN2MwLTEuNDE4LDEuMTI1LTIuNTY3LDIuNTE1LTIuNTY3aDguMTIyDQoJCQkJCQlDMjguNzU4LDI0LjY2MiwyOS4zODcsMjQuOTQ5LDI5Ljg0MSwyNS40MTR6IE0xNi44ODgsMjAuOTEyYzAuMDUyLTAuNDEsMC4yMzMtMC43NTcsMC41MzQtMC45NDNsMC4zOTktMC4yNDlsNy40NDktNC42MzYNCgkJCQkJCWwwLjM5OS0wLjI1YzAuNjAxLTAuMzczLDEuNDQ5LDAuMDMzLDEuODk0LDAuOTA5YzAuMjI0LDAuNDM3LDAuMzAyLDAuOTEsMC4yNTEsMS4zMmMtMC4wNTEsMC40MDktMC4yMzMsMC43NTUtMC41MzMsMC45NDINCgkJCQkJCWwtOC4yNDksNS4xMzNjLTAuNjAyLDAuMzc1LTEuNDQ5LTAuMDMyLTEuODkzLTAuOTA4QzE2LjkxNywyMS43OTIsMTYuODM4LDIxLjMyMSwxNi44ODgsMjAuOTEyeiBNMzMuNSwzMS41SDE0LjUwNHYtMC43MTINCgkJCQkJCWMwLTEuNDYyLDEuMTI4LTIuNjQ2LDIuNTIxLTIuNjQ2SDMwLjk4YzEuMzkzLDAsMi41MiwxLjE4NCwyLjUyLDIuNjQ2VjMxLjV6Ii8+DQoJCQkJPC9nPg0KCQkJPC9nPg0KCQk8L2c+DQoJPC9nPg0KPC9nPg0KPC9zdmc+DQo=';
    add_menu_page( 'Auction Feed', 'Auction Feed', 'manage_options', 'auction-feed-plugin', 'AuctionFeed\\auction_feed_list', 'data:image/svg+xml;base64,' . $myIcon );
    add_submenu_page('auction-feed-plugin', 'Auction Feed - Feed Options', 'Add New', 'manage_options', 'auction-feed-plugin-feed-options', 'AuctionFeed\\auction_feed_feed');
    // add_submenu_page('auction-feed-plugin', 'Auction Feed - Support', 'Support', 'manage_options', 'auction-feed-plugin-support', 'AuctionFeed\\auction_feed_support');
    add_submenu_page(null, 'Auction Feed - Delete Options', 'Delete', 'manage_options', 'auction-feed-plugin-delete-feed', 'AuctionFeed\\auction_feed_delete');
  }



  function auction_feed_list() {
    if ( current_user_can('manage_options') ) {
      global $wpdb; 

      if (isset($_GET['feed-added']) && $_GET['feed-added'] == 'true') {
        $alert = '<div class="alert alert-success">Feed created</div>' . PHP_EOL;
      }
      if (isset($_GET['feed-removed']) && $_GET['feed-removed'] == 'true') {
        $alert = '<div class="alert alert-success">Feed removed</div>' . PHP_EOL;
      }

      echo '<h1>Auction Feed</h1>' . PHP_EOL;
      if ( isset($alert) ) {
        echo $alert;
      }

      echo '<p><a href="https://wordpress.org/support/plugin/auction-feed/reviews/#new-post">Rate our Auction Feed plugin</a></p>' . PHP_EOL;
      echo createButton( 'Add', array('page'=>'auction-feed-plugin-feed-options'), array('class'=>'add-button') ) . PHP_EOL;
      echo '<table class="wp-list-table widefat fixed striped table-view-list auction-feed">' . PHP_EOL;
      echo '  <tr>' . PHP_EOL;
      echo '    <th class="manage-column">Label</th>' . PHP_EOL;
      echo '    <th class="manage-column">User</th>' . PHP_EOL;
      echo '    <th class="manage-column">Marketplace</th>' . PHP_EOL;
      echo '    <th class="manage-column">Theme</th>' . PHP_EOL;
      echo '    <th class="manage-column">Items per Page</th>' . PHP_EOL;
      echo '    <th class="manage-column">Shortcode</th>' . PHP_EOL;
      echo '    <th class="manage-column"></th>' . PHP_EOL;
      echo '    <th class="manage-column"></th>' . PHP_EOL;
      echo '  </tr>' . PHP_EOL;
      $query   = $wpdb->prepare(
        "SELECT option_id, option_value FROM $wpdb->options WHERE option_name = %s",
        'auction_feed_data'
      );
      $results = $wpdb->get_row($query, 'ARRAY_A');
      if ( !empty($results) ) {
        $feeds = unserialize($results['option_value']);
        foreach ($feeds as $feed) {
          echo '  <tr>' . PHP_EOL;
          echo '    <td>' . $feed['ebayLabel'] . '</td>' . PHP_EOL;
          echo '    <td>' . $feed['sellerId'] . '</td>' . PHP_EOL;
          echo '    <td>' . $feed['marketplaceId'] . '</td>' . PHP_EOL;
          echo '    <td>' . $feed['theme'] . '</td>' . PHP_EOL;
          echo '    <td>' . $feed['itemsPerPage'] . '</td>' . PHP_EOL;
          echo '    <td>[auctionfeed id="' . $feed['id'] . '"]</td>' . PHP_EOL;
          echo '    <td>' . createButton( 'Edit', array('page'=>'auction-feed-plugin-feed-options', 'id'=>$feed['id']), array('class'=>'edit-button') ) . '</td>' . PHP_EOL;
          echo '    <td>' . createButton( 'Remove', array('page'=>'auction-feed-plugin-delete-feed', 'id'=>$feed['id']), array('class'=>'delete-button') ) . '</td>' . PHP_EOL;
          echo '  </tr>' . PHP_EOL;
        }
      }
      echo '</table>' . PHP_EOL;
    }
  }


  function createButton($buttonText, $urlParameters=array(), $buttonAttributes=array(), $userCapability='manage_options', $buttonType='button') {
    $button      = '';
    if ( current_user_can($userCapability) ) {
      $url = add_query_arg( $urlParameters , admin_url() . 'admin.php' );
      $button   .= '<button type="' . $buttonType . '" ';
      foreach ($buttonAttributes as $key=>$value) {
        $button .= $key . '="' . $value . '" ';
      }
      $button   .= 'data-href="' .esc_url($url) . '">' . $buttonText . '</button>';
    }
    return $button;
  }


  function auction_feed_feed() {
    global $wpdb; 
    if ( current_user_can('manage_options') ) {

      if ( isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce']) && !empty($_POST['sellerId']) || !empty($_POST['marketplaceId']) || !empty($_POST['theme']) || !empty($_POST['language']) || !empty($_POST['itemsPerPage']) || !empty($_POST['sortOrder']) || !empty($_POST['listingType']) ) {
        $successful = sendToDatabase();
        if ($successful) {
          echo '<script type="text/javascript">' . PHP_EOL;
          echo '  location.href = \'admin.php?page=auction-feed-plugin&feed-added=true\'' . PHP_EOL;
          echo '</script>' . PHP_EOL;
        }
        elseif ($successful == false) {
          $alert = '<div class="alert alert-warning">Sorry there has been a problem please try again</div>' . PHP_EOL;
        }
      }

      $marketplaces       = array(
        array('label'=>'eBay US', 'eBayCode'=>'EBAY-US', 'eBayValue'=>0),
        array('label'=>'eBay UK', 'eBayCode'=>'EBAY-GB', 'eBayValue'=>3),
        array('label'=>'eBay Canada (English)', 'eBayCode'=>'EBAY-ENCA', 'eBayValue'=>2),
        array('label'=>'eBay Australia', 'eBayCode'=>'EBAY-AU', 'eBayValue'=>15),
        array('label'=>'eBay Belgium', 'eBayCode'=>'EBAY-FRBE', 'eBayValue'=>23),
        array('label'=>'eBay Germany', 'eBayCode'=>'EBAY-DE', 'eBayValue'=>77),
        array('label'=>'eBay France', 'eBayCode'=>'EBAY-FR', 'eBayValue'=>71),
        array('label'=>'eBay Spain', 'eBayCode'=>'EBAY-ES', 'eBayValue'=>186),
        array('label'=>'eBay Austria', 'eBayCode'=>'EBAY-AT', 'eBayValue'=>16),
        array('label'=>'eBay Italy', 'eBayCode'=>'EBAY-IT', 'eBayValue'=>101),
        array('label'=>'eBay Netherlands', 'eBayCode'=>'EBAY-NL', 'eBayValue'=>146),
        array('label'=>'eBay Ireland', 'eBayCode'=>'EBAY-IE', 'eBayValue'=>205),
        array('label'=>'eBay Switzerland', 'eBayCode'=>'EBAY-CH', 'eBayValue'=>193)
      );
      $sortOrderOptions   = array(
        array('label'=>'Items Ending First', 'value'=>'EndTimeSoonest'),
        array('label'=>'Newly-Listed First', 'value'=>'StartTimeNewest'),
        array('label'=>'Price + Shipping: Lowest First', 'value'=>'PricePlusShippingLowest'), 
        array('label'=>'Price + Shipping: Highest First', 'value'=>'PricePlusShippingHighest'), 
        array('label'=>'Best Match', 'value'=>'BestMatch')
      );
      $listingTypeOptions = array(
        array('label'=>'All Listings', 'value'=>'0'),
        array('label'=>'Buy It Now Only', 'value'=>'FixedPrice'),
        array('label'=>'Auction Only', 'value'=>'Auction')
      );
      $themeOptions       = array('Grid 3', 'Grid 4', 'Grid 6', 'Row');
      $languageOptions    = array('English', 'French', 'German', 'Italian', 'Spanish');

      $id                 = '';
      $ebayLabel          = '';
      $sellerId           = '';
      $itemsPerPage       = 24;
      $marketplaceId      = 3;
      $sortOrder          = 'EndTimeSoonest';
      $listingType        = 'Grid 4';
      $borderColour       = '#CCCCCC';
      $backgroundColour   = '#777777';
      $textColour         = '#FFFFFF';
      $displayFeed        = false;

      if ( !empty($_GET['id']) ) {
        $id      = (int)sanitize_text_field($_GET['id']);
        $result  = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'auction_feed_data'");
        $feeds   = unserialize($result);
        foreach ($feeds as $feed) {
          if ($feed['id'] == (int)$id) {
            $ebayLabel             = sanitize_text_field($feed['ebayLabel']);
            $sellerId              = sanitize_text_field($feed['sellerId']);
            $marketplaceId         = sanitize_text_field($feed['marketplaceId']);
            $sortOrder             = sanitize_text_field($feed['sortOrder']);
            $listingType           = sanitize_text_field($feed['listingType']);
            $setThemeOptions       = sanitize_text_field($feed['theme']);
            $setLanguageOptions    = sanitize_text_field($feed['language']);
            $itemsPerPage          = sanitize_text_field($feed['itemsPerPage']);
            $sortOrder             = sanitize_text_field($feed['sortOrder']);
            $listingType           = sanitize_text_field($feed['listingType']);
            $borderColour          = sanitize_hex_color('#' . $feed['borderColour']);
            $backgroundColour      = sanitize_hex_color('#' . $feed['backgroundColour']);
            $textColour            = sanitize_hex_color('#' . $feed['textColour']);
            $keywords              = sanitize_text_field($feed['keywords']);
            $categoryId            = sanitize_text_field($feed['categoryId']);
            $showCategories        = (int)$feed['showCategories'];
            $showSearchBox         = (int)$feed['showSearchBox'];
            $showMultiplePages     = (int)$feed['showMultiplePages'];
            $showBorder            = (int)$feed['showBorder'];
            $showLogo              = (int)$feed['showLogo'];
            $linksInNewTab         = (int)$feed['linksInNewTab'];
            $displayFeed           = true;
          }
        }
      }

      echo '<h1>Feed Options</h1>' . PHP_EOL;
      if ( !empty($alert) ) {
        echo $alert;
      }
      echo '<form action="" name="feedOptions" id="feedOptions" method="post" class="osd-feed-options">' . PHP_EOL;

      echo '  <div class="postbox">' . PHP_EOL;
      echo '    <div class="postbox-header">' . PHP_EOL;
      echo '      <h2 class="hndle ui-sortable-handle">Feed Information</h2>' . PHP_EOL;
      echo '    </div>' . PHP_EOL;
      echo '    <div class="inside">' . PHP_EOL;
      echo '      <input type="hidden" name="id" id="id" class="form-control required" value="' . $id . '">' . PHP_EOL;
      if ($displayFeed) {
        echo '      <input type="hidden" name="existingId" id="existingId" class="form-control required" value="true">' . PHP_EOL;
      }
      echo '      <label for="ebayLabel">' . PHP_EOL;
      echo '        Your Label' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>LABEL</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Add you custom label to easily recognise this feed.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <input type="text" name="ebayLabel" id="ebayLabel" class="form-control required" value="' . $ebayLabel . '">' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;

      echo '      <label for="sellerId">' . PHP_EOL;
      echo '        eBay Username' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>USERNAME</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            This is your eBay ID/Username, it appears on your listings (not your store name).' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <input type="text" name="sellerId" id="sellerId" class="form-control required" value="' . $sellerId . '">' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <label for="marketplaceId">' . PHP_EOL;
      echo '        eBay Market Place' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>MARKETPLACE</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            This is the country where your items are listed.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;    echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <select name="marketplaceId" id="marketplaceId" class="form-control required">' . PHP_EOL;
      foreach ($marketplaces as $marketplace) {
        $selected   = '';
        if ($marketplace['eBayValue'] == $marketplaceId) {
          $selected = ' selected="selected"';
        }
        echo '        <option value="' . $marketplace['eBayValue'] . '"' . $selected . '>' . $marketplace['label'] . '</option>' . PHP_EOL;
      }
      echo '      </select>' . PHP_EOL;
      echo '    </div>' . PHP_EOL;
      echo '  </div>' . PHP_EOL;

      echo '  <div class="postbox">' . PHP_EOL;
      echo '    <div class="postbox-header">' . PHP_EOL;
      echo '      <h2 class="hndle ui-sortable-handle">Layout Options</h2>' . PHP_EOL;
      echo '    </div>' . PHP_EOL;
      echo '    <div class="inside">' . PHP_EOL;
      echo '      <label for="theme">' . PHP_EOL;
      echo '        Theme' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>THEME</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            All of our themes are responsive and work with most layouts and devices.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <select name="theme" id="theme" class="form-control required">' . PHP_EOL;
      foreach ($themeOptions as $themeOption) {
        $selected   = '';
        if ($setThemeOptions == $themeOption) {
          $selected = ' selected="selected"';
        }
        echo '        <option value="' . $themeOption . '"' . $selected . '>' . $themeOption . '</option>' . PHP_EOL; 
      }
      echo '      </select>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <label for="language">' . PHP_EOL;
      echo '        Language' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>LANGUAGE</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Allows you to chose which language will be displayed on your listed items (eBay item titles will are unaffected).' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <select name="language" id="language" class="form-control required">' . PHP_EOL;
      foreach ($languageOptions as $languageOption) {
        $selected   = '';
        if ($setLanguageOptions == $languageOption) {
          $selected = ' selected="selected"';
        }
        echo '        <option value="' . $languageOption . '"' . $selected . '>' . $languageOption . '</option>' . PHP_EOL; 
      }
      echo '      </select>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;

      echo '      <label for="itemsPerPage">' . PHP_EOL;
      echo '        Items per Page' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>ITEMS PER PAGE</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Selects how many listing items are shown per page of results.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <input type="text" name="itemsPerPage" id="itemsPerPage" class="form-control required" value="' . $itemsPerPage . '">' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;

      echo '      <div class="checkbox-grouped">' . PHP_EOL;
      echo '        <input type="checkbox" checked id="showCategories" name="showCategories" value="true" checked>' . PHP_EOL;
      echo '        <label for="showCategories">' . PHP_EOL;
      echo '          Display categories dropdown on page?' . PHP_EOL;
      echo '        </label>' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>DISPLAY CATEGORIES</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            If selected will show your item categories dropdown on the page.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </div>' . PHP_EOL;

      echo '      <div class="checkbox-grouped">' . PHP_EOL;
      echo '        <input type="checkbox" checked id="showSearchBox" name="showSearchBox" value="true" checked>' . PHP_EOL;
      echo '        <label for="showSearchBox">' . PHP_EOL;
      echo '          Display search box on page?' . PHP_EOL;
      echo '        </label>' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>DISPLAY SEARCH BOX</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            If selected will display a search box on the page allowing your customers to search your items.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </div>' . PHP_EOL;

      echo '      <div class="checkbox-grouped">' . PHP_EOL;
      echo '        <input type="checkbox" checked id="showMultiplePages" name="showMultiplePages" value="true" checked>' . PHP_EOL;
      echo '        <label for="showMultiplePages">' . PHP_EOL;
      echo '          Show paging?' . PHP_EOL;
      echo '        </label>' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>SHOW PAGING</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            If selected will display next and previous style paging to the page.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </div>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '    </div>' . PHP_EOL;
      echo '  </div>' . PHP_EOL;

      echo '  <div class="postbox">' . PHP_EOL;
      echo '    <div class="postbox-header">' . PHP_EOL;
      echo '      <h2 class="hndle ui-sortable-handle">Style Options</h2>' . PHP_EOL;
      echo '    </div>' . PHP_EOL;
      echo '    <div class="inside">' . PHP_EOL;
      echo '      <div class="checkbox-grouped">' . PHP_EOL;
      echo '        <input type="checkbox" checked id="showBorder" name="showBorder" value="true">' . PHP_EOL;
      echo '        <label for="showBorder">' . PHP_EOL;
      echo '          Show border?' . PHP_EOL;
      echo '        </label>' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>SHOW BORDER</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Adds a border to your listed items.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </div>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;

      echo '      <label for="borderColour">' . PHP_EOL;
      echo '        Border Colour' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>BORDER COLOUR</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Allows you to choose the colour of the border.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <input type="color" name="borderColour" id="borderColour" class="form-control" value="' . $borderColour . '">' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;

      echo '      <label for="backgroundColour">' . PHP_EOL;
      echo '        Background Colour' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>BACKGROUND COLOUR</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Allows you to choose the background colour of buttons and the paging section.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <input type="color" name="backgroundColour" id="backgroundColour" class="form-control" value="' . $backgroundColour . '">' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;

      echo '      <label for="textColour">' . PHP_EOL;
      echo '        Text Colour' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>TEXT COLOUR</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Allows you to choose the text colour of buttons and the paging section.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <input type="color" name="textColour" id="textColour" class="form-control" value="' . $textColour . '">' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      </div>' . PHP_EOL;
      echo '    </div>' . PHP_EOL;

      echo '    <div class="postbox">' . PHP_EOL;
      echo '      <div class="postbox-header">' . PHP_EOL;
      echo '        <h2 class="hndle ui-sortable-handle">Advanced Options</h2>' . PHP_EOL;
      echo '      </div>' . PHP_EOL;
      echo '      <div class="inside">' . PHP_EOL;
      echo '        <label for="sortOrder">' . PHP_EOL;
      echo '          Sort Order' . PHP_EOL;
      echo '          <div class="tooltip-box">' . PHP_EOL;
      echo '            ?' . PHP_EOL;
      echo '            <span class="tooltip-text">' . PHP_EOL;
      echo '              <strong>SORT ORDER</strong>' . PHP_EOL;
      echo '              <hr>' . PHP_EOL;
      echo '              Select the default order of items listed on the page.' . PHP_EOL;
      echo '            </span>' . PHP_EOL;
      echo '          </div>' . PHP_EOL;
      echo '        </label>' . PHP_EOL;
      echo '        <br>' . PHP_EOL;
      echo '        <select name="sortOrder" id="sortOrder" class="form-control">' . PHP_EOL;
      foreach ($sortOrderOptions as $sortOrderOption) {
        $selected   = '';
        if ($sortOrder == $sortOrderOption['value']) {
          $selected = ' selected="selected"';
        }
        echo '          <option value="' . $sortOrderOption['value'] . '"' . $selected . '>' . $sortOrderOption['label'] . '</option>' . PHP_EOL; 
      }
      echo '        </select>' . PHP_EOL;
      echo '        <br>' . PHP_EOL;
      echo '        <br>' . PHP_EOL;

      echo '      <div class="checkbox-grouped">' . PHP_EOL;
      echo '        <input type="checkbox" checked id="showLogo" name="showLogo" value="true">' . PHP_EOL;
      echo '        <label for="showLogo">' . PHP_EOL;
      echo '          Show eBay logo?' . PHP_EOL;
      echo '        </label>' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>EBAY LOGO</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Select to display the eBay logo on your listing page.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </div>' . PHP_EOL;

      echo '      <div class="checkbox-grouped">' . PHP_EOL;
      echo '        <input type="checkbox" checked id="linksInNewTab" name="linksInNewTab" value="true">' . PHP_EOL;
      echo '        <label for="linksInNewTab">' . PHP_EOL;
      echo '          Open links in new tab?' . PHP_EOL;
      echo '        </label>' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>ITEM LINKS</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Select to open item links in a new browser window/tab.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </div>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;

      echo '      <label for="listingType">' . PHP_EOL;
      echo '        Listing Type' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>LISTING TYPE</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Select which item types will be displayed on the listing page.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <select name="listingType" id="listingType" class="form-control">' . PHP_EOL;
      foreach ($listingTypeOptions as $listingTypeOption) {
        $selected   = '';
        if ($listingType == $listingTypeOption['value']) {
          $selected = ' selected="selected"';
        }
        echo '        <option value="' . $listingTypeOption['value'] . '"' . $selected . '>' . $listingTypeOption['label'] . '</option>' . PHP_EOL; 
      }
      echo '      </select>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;

      echo '      <label for="keywords">' . PHP_EOL;
      echo '        Keywords' . PHP_EOL;
      echo '        <div class="tooltip-box">' . PHP_EOL;
      echo '          ?' . PHP_EOL;
      echo '          <span class="tooltip-text">' . PHP_EOL;
      echo '            <strong>KEYWORDS</strong>' . PHP_EOL;
      echo '            <hr>' . PHP_EOL;
      echo '            Selecting a keyword will only show items that contain the keyword in their title.' . PHP_EOL;
      echo '          </span>' . PHP_EOL;
      echo '        </div>' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '      <br>' . PHP_EOL;
      echo '      <input type="text" name="keywords" id="keywords" class="form-control" value="">' . PHP_EOL;
      echo '      <br>' . PHP_EOL;

      if ($marketplaceId != '101') {
        echo '      <br>' . PHP_EOL;
        echo '      <div class="category-id-container">' . PHP_EOL;
        echo '        <label for="categoryId">' . PHP_EOL;
        echo '          Category ID' . PHP_EOL;
        echo '          <div class="tooltip-box">' . PHP_EOL;
        echo '            ?' . PHP_EOL;
        echo '            <span class="tooltip-text">' . PHP_EOL;
        echo '              <strong>CATEGORY</strong>' . PHP_EOL;
        echo '              <hr>' . PHP_EOL;
        echo '              Selecting categories (maximum of 3) will only show items the chosen categories.' . PHP_EOL;
        echo '            </span>' . PHP_EOL;
        echo '          </div>' . PHP_EOL;
        echo '        </label>' . PHP_EOL;
        echo '        <br>' . PHP_EOL;
        echo '        <input type="text" name="categoryId" id="categoryId" class="form-control" value="" autocomplete="off">' . PHP_EOL;
        echo '        <div class="alert-container"></div>' . PHP_EOL;
        echo '        <div id="category-ids-dropdown">' . PHP_EOL;
        echo '          <ul class="row">' . PHP_EOL;
        echo '          </ul>' . PHP_EOL;
        echo '        </div>' . PHP_EOL;
        echo '      </div>' . PHP_EOL;
        echo '      <br>' . PHP_EOL;
      }
      echo '    </div>' . PHP_EOL;
      echo '  </div>' . PHP_EOL;
      echo '  <div class="postbox">' . PHP_EOL;
      echo '    <div class="postbox-header">' . PHP_EOL;
      echo '      <h2 class="hndle ui-sortable-handle">Consent</h2>' . PHP_EOL;
      echo '    </div>' . PHP_EOL;
      echo '    <div class="inside">' . PHP_EOL;
      echo '      <label for="consent">' . PHP_EOL;
      echo '          By clicking you agree that you understand this plugin uses external service calls to get the ebay data and will display a \'Powered by auctionfeedonyourwebsite.co.uk\' link on the data retrieved from eBay &nbsp; <input type="checkbox" id="consent" name="consent" value="true" class="required">' . PHP_EOL;
      echo '      </label>' . PHP_EOL;
      echo '    </div>' . PHP_EOL;
      echo '  </div>' . PHP_EOL;
      echo '  <input type="hidden" name="website" id="website" value="' . $_SERVER['SERVER_NAME'] . '">' . PHP_EOL;
      echo '  <button type="button" class="btn update-btn"> DISPLAY RESULTS</button> &nbsp;' . PHP_EOL;
      wp_nonce_field();
      echo '  <button type="submit" class="btn submit-btn"> SAVE </button><br>' . PHP_EOL;
      echo '</form>' . PHP_EOL;


      echo '<div class="osd-ebay-example">' . PHP_EOL;
      echo '  <div id="osd-ebay-listings"></div>' . PHP_EOL;
      echo '</div>' . PHP_EOL;

      echo '<script type="text/javascript">' . PHP_EOL;
      echo '  jQuery(document).ready( function() {' . PHP_EOL;
      if ($displayFeed) {
        echo '    jQuery(\'.update-btn\').click();' . PHP_EOL;
      }
      echo '    jQuery(\'#sellerId\').focusout( function() {' . PHP_EOL;
      echo '      if ( jQuery(\'#sellerId\').val().trim() != \'\' ) {' . PHP_EOL;
      echo '        jQuery(\'.update-btn\').click();' . PHP_EOL;
      echo '      };' . PHP_EOL;
      echo '    });' . PHP_EOL;
      echo '  });' . PHP_EOL;
      echo '</script>' . PHP_EOL;

    }
  }



  function auction_feed_delete() {
    if ( current_user_can('manage_options') ) {
      global $wpdb;
  
      $confirm   = false;
      if ( !empty($_GET['confirm']) ) {
        $confirm = sanitize_text_field($_GET['confirm']);
      }

      if ( !empty($_GET['id']) ) {
        $id      = sanitize_text_field($_GET['id']);
        $newFeed = array();

        $query   = $wpdb->prepare(
          "SELECT option_id, option_value FROM $wpdb->options WHERE option_name = %s",
          'auction_feed_data'
        );
        $results = $wpdb->get_row($query, 'ARRAY_A');
        if ( !empty($results) ) {
          $feeds    = unserialize($results['option_value']);
          foreach ($feeds as $feed) {
            if ($id == $feed['id']) {
              echo '<div class="alert alert-warning">' . PHP_EOL;
              echo '  <form action="" id="" name="" method="get">' . PHP_EOL;
              echo '    <h3>Delete the auction feed shown below?</h3>' . PHP_EOL;
              echo '    <button type="button" class="cancel-remove-button">Cancel</button>' . PHP_EOL;
              echo '    <button type="button" class="confirm-remove-button" data-feed-id="' . $id . '">Remove</button>' . PHP_EOL;
              echo '  </form>' . PHP_EOL;
              echo '</div>' . PHP_EOL;
              echo '<div id="osd-ebay-listings" style="width: calc(100% - 45px); padding: 15px; background-color: #FFFFFF"></div>' . PHP_EOL;
              echo '<script type="text/javascript">' . PHP_EOL;
              echo '  jQuery(document).ready( function() {' . PHP_EOL;
              echo '    jQuery.ajax({' . PHP_EOL;
              echo '      url:      \'https://auctionfeedonyourwebsite.co.uk/ebay' . $feed['ajaxUrl'] . '\',' . PHP_EOL;
              echo '      methond:  \'POST\',' . PHP_EOL;
              echo '      dataType: \'html\',' . PHP_EOL;
              echo '      success:  function(data) {' . PHP_EOL;
              echo '        jQuery(\'#osd-ebay-listings\').html(data);' . PHP_EOL;
              echo '      }' . PHP_EOL;
              echo '    });' . PHP_EOL;
              echo '  });' . PHP_EOL;
              echo '</script>' . PHP_EOL;
            }
            elseif (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
              array_push($newFeed, $feed);
            }
          }

          if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
            $query   = $wpdb->prepare(
              "UPDATE $wpdb->options SET option_value = %s WHERE option_name = %s",
              serialize($newFeed),
              'auction_feed_data'
            );
            $results = $wpdb->get_row($query, 'ARRAY_A');
            echo '<script type="text/javascript">' . PHP_EOL;
            echo '  location.href = \'admin.php?page=auction-feed-plugin&feed-removed=true\'' . PHP_EOL;
            echo '</script>' . PHP_EOL;
          }
        }
      }
    }
  }


  function auction_feed_support() {
    echo '<h1>Support</h1>' . PHP_EOL;
    echo '<div class="postbox">' . PHP_EOL;
    echo '  <div class="inside">' . PHP_EOL;
    echo '  </div>' . PHP_EOL;
    echo '</div>' . PHP_EOL;
  }



  function auction_feed_shortcode($attr) {
    global $wpdb;

    $returnValue = '';
    if ( !empty($attr['id']) ) {
      $result  = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'auction_feed_data'");
      $feeds   = unserialize($result);
      foreach ($feeds as $feed) {
        if ($feed['id'] == (int)$attr['id']) {
          $returnValue .= '<div id="osd-ebay-listings"></div>' . PHP_EOL;
          wp_enqueue_script('ebayListing' . $attr['id'], 'https://auctionfeedonyourwebsite.co.uk/js' . $feed['ajaxUrl']);
        }
      }
    }
    return $returnValue;
  }



  function sendToDatabase() {
    if ( current_user_can('manage_options') ) {
      global $wpdb; 

      $result   = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'auction_feed_count'");
      if ( !empty($result) ) {
        $newId  = (int)$result;
      }
      else {
        $newId = 1;
        $wpdb->query(
          $wpdb->prepare(
            "INSERT INTO $wpdb->options (option_name, option_value, autoload) VALUES (%s, %d, %s)",
            'auction_feed_count',
            $newId,
            'no'
          )
        );
      }

      if ( !empty($_POST['id']) ) {
        $id              = sanitize_text_field($_POST['id']);
      }
      else {
        $id              = $newId;
      }
      $ebayLabel         = sanitize_text_field($_POST['ebayLabel']);
      $existingId        = sanitize_text_field($_POST['existingId']);
      $sellerId          = sanitize_text_field($_POST['sellerId']);
      $marketplaceId     = sanitize_text_field($_POST['marketplaceId']);
      $theme             = sanitize_text_field($_POST['theme']);
      $language          = sanitize_text_field($_POST['language']);
      $itemsPerPage      = sanitize_text_field($_POST['itemsPerPage']);
      $showCategories    = (bool)sanitize_text_field($_POST['showCategories']);
      $showSearchBox     = (bool)sanitize_text_field($_POST['showSearchBox']);
      $showMultiplePages = (bool)sanitize_text_field($_POST['showMultiplePages']);
      $showBorder        = (bool)sanitize_text_field($_POST['showBorder']);
      $borderColour      = str_replace( '#', '', sanitize_hex_color($_POST['borderColour']) );
      $backgroundColour  = str_replace( '#', '', sanitize_hex_color($_POST['backgroundColour']) );
      $textColour        = str_replace( '#', '', sanitize_hex_color($_POST['textColour']) );
      $sortOrder         = sanitize_text_field($_POST['sortOrder']);
      $showLogo          = (bool)sanitize_text_field($_POST['showLogo']);
      $linksInNewTab     = (bool)sanitize_text_field($_POST['linksInNewTab']);
      $listingType       = sanitize_text_field($_POST['listingType']);
      $keywords          = sanitize_text_field($_POST['keywords']);
      if ( empty($keywords) ) {
        $keywords        = 0;
      }
      $categoryId        = $_POST['categoryId'];
      if ( empty($categoryId) ) {
        $categoryId      = 0;
      }

      $ajaxUrl           = '/v1/' . rawurlencode($sellerId) . '/' . $marketplaceId . '/' . rawurlencode($theme) . '/' . $language . '/' . $itemsPerPage . '/' . (int)$showCategories . '/' . (int)$showSearchBox . '/' . (int)$showMultiplePages . '/' . $sortOrder . '/' . (int)$showLogo . '/' . (int)$linksInNewTab . '/' . $listingType . '/' . $keywords . '/' . $categoryId . '/' . (int)$showBorder . '/' . $borderColour . '/' . $backgroundColour . '/' . $textColour . '/1/' . $_SERVER['SERVER_NAME'] . '/';

      $dbArray = array(
        'id'                => $id,
        'ebayLabel'         => $ebayLabel,
        'sellerId'          => $sellerId,
        'marketplaceId'     => $marketplaceId,
        'theme'             => $theme,
        'language'          => $language,
        'itemsPerPage'      => $itemsPerPage,
        'showCategories'    => $showCategories,
        'showSearchBox'     => $showSearchBox,
        'showMultiplePages' => $showMultiplePages,
        'showBorder'        => $showBorder,
        'borderColour'      => $borderColour,
        'backgroundColour'  => $backgroundColour,
        'textColour'        => $textColour,
        'sortOrder'         => $sortOrder,
        'showLogo'          => $showLogo,
        'linksInNewTab'     => $linksInNewTab,
        'listingType'       => $listingType,
        'keywords'          => $keywords,
        'categoryId'        => $categoryId,
        'ajaxUrl'           => $ajaxUrl,
      );


      $returnValue = false;
      if ( $id == 1 && empty($existingId) )  {
        $returnValue = $wpdb->query(
          $wpdb->prepare(
            "INSERT INTO $wpdb->options (option_name, option_value, autoload) VALUES (%s, %s, %s)",
            'auction_feed_data',
            serialize( array($dbArray) ),
            'no'
          )
        );
      }
      else {
        $result   = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'auction_feed_data'");
        $feeds    = unserialize($result);
        if ( !empty($_POST['id']) ) {
          $newFeeds = array();
          foreach ($feeds as $feed) {
            if ( (int)$_POST['id'] != $feed['id'] ) {
              array_push($newFeeds, $feed);
            }
          }
          $feeds = $newFeeds;
        }
        array_push($feeds, $dbArray);

        $sql =  $wpdb->prepare(
          "UPDATE $wpdb->options SET option_value = %s WHERE option_name = 'auction_feed_data'",
          serialize($feeds)
        );

        $returnValue = $wpdb->query($sql);
      }


      $newId++;
      if ($returnValue) {
        $wpdb->query(
          $wpdb->prepare(
            "UPDATE $wpdb->options SET option_value = %d WHERE option_name = 'auction_feed_count'",
            $newId
          )
        );
      }

      $url  = 'https://www.auctionfeedonyourwebsite.co.uk/wordpress' . $ajaxUrl . '?updateDatabase=wordpress';
      $data = fopen($url, 'r');

      return $returnValue;
    }
  }
?>