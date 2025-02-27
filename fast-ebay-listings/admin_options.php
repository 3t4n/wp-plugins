<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once __DIR__."/constants.php";
require_once __DIR__."/includes/presentation.inc.php";
require_once __DIR__."/includes/listing.inc.php";

////////////////////////////////////////////////////////////////////////////////////////////////////////
// Infer the default eBay Marketplace/GlobalId from the site locale region code.

function fu_ebay_getDefGlobalIdForLocale()
{
  $validGlobalIds = array(
    'EBAY-AT','EBAY-AU','EBAY-BE','EBAY-CA','EBAY-CH','EBAY-DE','EBAY-ES','EBY-FR','EBAY-GB','EBAY-HK','EBAY-IE','EBAY-IN','EBAY-IT','EBAY-MY','EBAY-NL','EBAY-PH','EBAY-PL','EBAY-SG','EBAY-TH','EBAY-TW','EBAY-VN','EBAY-US',
  );

  if (class_exists("Locale"))
  {
    $region = Locale::getRegion(get_locale());
    $globalId = "EBAY-$region";
    return in_array($globalId, $validGlobalIds) ? $globalId : "EBAY-US";
  }
  return "EBAY-US";
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
/// Add options needed for plugin

function fu_ebay_init_settings()
{
  add_option('fubaby_ebayPluginVer', '2.9.13', '', true); //Version key was introduced
  add_option('fubaby_ebayCampaignID', '', '', true); //The eBay campaign id.
  add_option('fubaby_ebayDefCustomID', '', '', true); //The eBay custom id.
  add_option('fubaby_ebayEnableSmartLinks', 1, '', true); // Enable eBay SmartLinks tool
  add_option('fubaby_ebaySmartLinksCustomID', ''); //The eBay custom id for smart links
  add_option('fubaby_ebayGlobalID', fu_ebay_getDefGlobalIdForLocale(), '', true); // eBay Global ID.
  add_option('fubaby_ebayDefCategory', ''); // Default category IDs. 
  add_option('fubaby_ebayDefSeller', ''); // Default seller. 
  add_option('fubaby_ebayDefSellerType', fuEbaySellerType::Any); // Default seller type. 
  add_option('fubaby_ebayDefSearchLocation', fuItemLocation::Internationally);
  add_option('fubaby_ebayDefColumns', 2); // Default columns of search results.
  add_option('fubaby_ebayDefRows', 1); // Default rows of search results.
  add_option('fubaby_ebayDefSort', fuEbaySortOrder::BestMatch); // Default sort order of search results
  add_option('fubaby_ebayPicWidthItem', 225); // Default width of pictures for single items.
  add_option('fubaby_ebayPicWidthList', 225); // Default width of pictures for search listings.
  add_option('fubaby_ebayPicWidthWidget', 225); // Default width of pictures for widgets.
  add_option('fubaby_ebayPicAspect', fuPictureAspect::Square); // Picture aspect
  add_option('fubaby_ebayColourStyle', fuColourStyle::Default); // Default colour style
  add_option('fubaby_ebayTitleMaxLines', 3, '', true); // Max title lines to display.
  add_option('fubaby_ebayShortDescMaxLines', 20, '', true); // Max short description lines to display.
  add_option('fubaby_ebayDefArrangementItem', fuEbayArrangement::ImageLeft); // Default arrangement for single items.
  add_option('fubaby_ebayDefArrangementList', fuEbayArrangement::TitleBelow); // Default arrangement for search listings.
  add_option('fubaby_ebayDefArrangementWidget', fuEbayArrangement::TitleBelow); // Default arrangement for widgets.
  add_option('fubaby_ebayDefSlideshowStyle', fuSlideShowStyle::Manual); // Default slideshow style
  add_option('fubaby_ebayDefDisplayFieldsItem', fuEbayGlobal::DisplayFieldsItemDefault); // Default fields to show for single items
  add_option('fubaby_ebayDefDisplayFieldsList', fuEbayGlobal::DisplayFieldsListingDefault); // Default fields to show for search listings
  add_option('fubaby_ebayDefDisplayFieldsWidget', fuEbayGlobal::DisplayFieldsListingDefault); // Default fields to show for widgets
  add_option('fubaby_ebayDefNumSlides', 3); // Default number of slideshow slides
  add_option('fubaby_ebayEmptySearchMsg', fuEbayDefaultText::EmptySearch()); // Default empty results message.
  add_option('fubaby_ebayPriorityListingText', fuEbayDefaultText::PriorityListing()); // Default default priority listing text
  add_option('fubaby_ebayLinkText', fuEbayDefaultText::EbayLink()); // Default default link text
  add_option('fubaby_ebayLoadMoreButtonText', fuEbayDefaultText::LoadMore()); // Default 'load more' button text
  add_option('fubaby_ebaySlideshowTimer', FU_DEFSLIDESHOWTIMER, '', true); // Default slideshow timeout
  add_option('fubaby_ebayNewWindow', 1); // Whether to open eBay links in new window/tab.
  add_option('fubaby_ebayDeferredLoading', fuDeferedLoading::NotCached); // Whether to open ebay links in new window/tab.
  add_option('fubaby_ebaySubscriptionKey', '', '', true); // Key for subscription.
  add_option('fubaby_ebayDisplayFELLink', 0); // Whether to display a link to Fast eBay Listings
  add_option('fubaby_ebayGeoTargetResults', fuGeoTargetting::Never); // Whether to geotarget results based on CloudFlare headers
  add_option('fubaby_ebayShowEndedItems', 0); // Whether to show items that have ended since results were cached.
  add_option('fubaby_ebayAdDisclosurePlacement', fuAdDisclosurePlacement::Top, '', true); // Where to place ad disclosure
  add_option('fubaby_ebayAdDisclosureText', fuEbayDefaultText::AdDisclosure1(), '', true); // What ad disclosure text to display.
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
// Register options.

function fu_ebay_register_settings()
{
  register_setting('fu_ebay_settings_general', 'fubaby_ebaySubscriptionKey');
  register_setting('fu_ebay_settings_general', 'fubaby_ebayGlobalID');

  register_setting('fu_ebay_settings_defaults', 'fubaby_ebayDefCategory');
  register_setting('fu_ebay_settings_defaults', 'fubaby_ebayDefSeller');
  register_setting('fu_ebay_settings_defaults', 'fubaby_ebayDefSellerType');
  register_setting('fu_ebay_settings_defaults', 'fubaby_ebayDefSearchLocation');
  register_setting('fu_ebay_settings_defaults', 'fubaby_ebayDefColumns');
  register_setting('fu_ebay_settings_defaults', 'fubaby_ebayDefRows');
  register_setting('fu_ebay_settings_defaults', 'fubaby_ebayDefSlideshowStyle');
  register_setting('fu_ebay_settings_defaults', 'fubaby_ebayDefNumSlides');
  register_setting('fu_ebay_settings_defaults', 'fubaby_ebayDefSort');

  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayPicWidthItem');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayPicWidthList');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayPicWidthWidget');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayPicAspect');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayDefArrangementItem');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayDefArrangementList');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayDefArrangementWidget');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayDefDisplayFieldsItem');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayDefDisplayFieldsList');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayDefDisplayFieldsWidget');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayLinkText', [
    'type'              => 'text',
    'sanitize_callback' => 'fubaby_ebayLinkText_sanitize',
  ]);
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayEmptySearchMsg');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayPriorityListingText');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayLoadMoreButtonText');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebaySlideshowTimer');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayNewWindow');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayDeferredLoading');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayDisplayFELLink');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayColourStyle');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayTitleMaxLines');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayShortDescMaxLines');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayGeoTargetResults');
  register_setting('fu_ebay_settings_behaviour', 'fubaby_ebayShowEndedItems');
  
  register_setting('fu_ebay_settings_epn', 'fubaby_ebayCampaignID');
  register_setting('fu_ebay_settings_epn', 'fubaby_ebayDefCustomID');
  register_setting('fu_ebay_settings_epn', 'fubaby_ebayEnableSmartLinks');
  register_setting('fu_ebay_settings_epn', 'fubaby_ebaySmartLinksCustomID');
  register_setting('fu_ebay_settings_epn', 'fubaby_ebayAdDisclosurePlacement');
  register_setting('fu_ebay_settings_epn', 'fubaby_ebayAdDisclosureText');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////
// Remove options on uninstall.

function fu_ebay_uninstall()
{
  delete_option('fubaby_ebayPluginVer');
  delete_option('fubaby_ebayCampaignID');
  delete_option('fubaby_ebayGlobalID');
  delete_option('fubaby_ebayDefCustomID');
  delete_option('fubaby_ebayEnableSmartLinks');
  delete_option('fubaby_ebaySmartLinksCustomID');
  delete_option('fubaby_ebayDefCategory');
  delete_option('fubaby_ebayDefSeller');
  delete_option('fubaby_ebayDefSellerType');
  delete_option('fubaby_ebayDefSearchLocation');
  delete_option('fubaby_ebayDefColumns');
  delete_option('fubaby_ebayDefRows');
  delete_option('fubaby_ebayDefSort');
  delete_option('fubaby_ebayPicWidthItem');
  delete_option('fubaby_ebayPicWidthList');
  delete_option('fubaby_ebayPicWidthWidget');
  delete_option('fubaby_ebayPicAspect');
  delete_option('fubaby_ebayColourStyle');
  delete_option('fubaby_ebayTitleMaxLines');
  delete_option('fubaby_ebayShortDescMaxLines');
  delete_option('fubaby_ebayDefArrangementItem');
  delete_option('fubaby_ebayDefArrangementList');
  delete_option('fubaby_ebayDefArrangementWidget');
  delete_option('fubaby_ebayDefDisplayFieldsItem');
  delete_option('fubaby_ebayDefDisplayFieldsList');
  delete_option('fubaby_ebayDefDisplayFieldsWidget');
  delete_option('fubaby_ebayDefSlideshowStyle');
  delete_option('fubaby_ebayDefNumSlides');
  delete_option('fubaby_ebayEmptySearchMsg');
  delete_option('fubaby_ebayPriorityListingText');
  delete_option('fubaby_ebayLoadMoreButtonText');
  delete_option('fubaby_ebayLinkText');
  delete_option('fubaby_ebaySlideshowTimer');
  delete_option('fubaby_ebayNewWindow');
  delete_option('fubaby_ebayDeferredLoading');
  delete_option('fubaby_ebaySubscriptionKey');
  delete_option('fubaby_ebayDisplayFELLink');
  delete_option('fubaby_ebayGeoTargetResults');
  delete_option('fubaby_ebayShowEndedItems');
  delete_option('fubaby_ebayAdDisclosurePlacement');
  delete_option('fubaby_ebayAdDisclosureText');
  
}