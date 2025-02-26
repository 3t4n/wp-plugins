<?php
// function to display search results
function avantlink_display_product_search_results($return=false) {

	// output only if ps variable is set
	if($_GET['ps'] == true) {

		// get search page url
		$search_url = get_option('avantlink_search_url');
		$affiliate_id = get_option('avantlink_affiliate_id');
		$website_id = get_option('avantlink_website_id');

		$strSortField = array_key_exists('sort', $_GET) ? urldecode(sanitize_text_field($_GET['sort'])) : null;
		$strSortOrder = isset($_GET['order']) ? sanitize_text_field($_GET['order']) : null;
		$intResultCount = array_key_exists('r', $_GET) ? intval(sanitize_text_field($_GET['r'])) : 0;

		$search_term =  isset($_GET['ps']) ? sanitize_text_field($_GET['ps']) : null;

		$intResultCountSafe = ($intResultCount > 0 ? $intResultCount : '');
		$strSearchUrlSafe = htmlspecialchars($search_url);
		$strSearchTermSafe = htmlspecialchars($search_term);

		$strSortOptionListHtml = '';
		$arrSortOrderOptions = array('', 'Product Name', 'Brand Name', 'Merchant Name', 'Retail Price', 'Sale Price');
		foreach ($arrSortOrderOptions as $strOption) {
			if ($strOption == $strSortField) {
				$strSelected = ' selected="selected"';
			}
			else { $strSelected = ''; }
			$strSortOptionListHtml .= '<option value="' . htmlspecialchars(urlencode($strOption)) . '"' . $strSelected . '>' . htmlspecialchars($strOption) . '</option>';
		}

/*
 * DGC - Commenting out the search form altogether for now
 * Seems unnecessary given that there's already a search input box somewhere in the configuration that led the user to here
 *
		$strOutput = <<<END
<form role="search" method="get" id="product_searchform" action="$strSearchUrlSafe" style="text-align:left;">
<div id="search_term">Search Term: <input type="text" value="$strSearchTermSafe" name="ps" id="ps" /></div>
<!--
<div id="search_result_count">Number Of Results: <input type="text" value="$intResultCountSafe" name="r" id="r" size="5" /></div>
<div id="search_sort_by">Sort By: <select name="sort">$strSortOptionListHtml</select></div>
<div id="search_order">Order: <select name="order">$strSortOrderListHtml</select></div>
-->
<div id="search_submit"><p><input type="submit" id="searchsubmit" value="Search" /></p></div>
</form>
END;
*/

		if ($intResultCount > 0) {
			$search_results_count = $intResultCount;
		}
		else if (get_option('avantlink_search_results_count') != '') {
			$search_results_count = get_option('avantlink_search_results_count');
		}
		else {
			$search_results_count = 10;
		}

		$sort_order = $strSortField . $strSortOrder;

		$arrProducts = avantlink_api_get_product_search( $affiliate_id, $website_id, $search_term, $search_results_count, $sort_order );
		$intProductCount = count($arrProducts);
		$strOutput = '';
		if ($intProductCount == 0) {
			$strOutput .= "<p>No Results Found</p>";
		}
		else {
			foreach ($arrProducts as $arrProduct) {

				$strOutput .= '<div class="avantlink_psr">';
					$strOutput .= '<div class="psr_image"><a href="' . htmlspecialchars($arrProduct['Buy_URL']) . '"><img src="'. htmlspecialchars($arrProduct['Thumbnail_Image']) . '" class="psr_product_image" /></a></div>';
					$strOutput .= '<div class="psr_product_info">';
						$strOutput .= '<div class="psr_product_name"><a href="' . htmlspecialchars($arrProduct['Buy_URL']) . '">' . htmlspecialchars($arrProduct['Product_Name']) . '</a></div>';
						$strOutput .= '<div class="psr_brand_name">' . htmlspecialchars($arrProduct['Brand_Name']) . '</div>';

						$strOutput .= '<div class="psr_prices"><span class="psr_retail_price">' . htmlspecialchars($arrProduct['Retail_Price']) . '</span>';
						if ($arrProduct['Sale_Price'] != $arrProduct['Retail_Price']) {
							$strOutput .= ' on sale for: <span class="psr_sale_price"> ' . htmlspecialchars($arrProduct['Sale_Price']) . '</span>';
						}
						$strOutput .= '</div>';

						$strOutput .= '<div class="psr_description">' . htmlspecialchars($arrProduct['Abbreviated_Description']) . '</div>';
						$strOutput .= '<div class="psr_merchant_name"><small><em>' . htmlspecialchars($arrProduct['Merchant_Name']) . '</em></small></div>';
					$strOutput .= '</div>';
					$strOutput .= '<div style="clear:both;"></div>';
				$strOutput .= '</div>';

			} // End, foreach product found
		}

		if ($return) {
			return $strOutput;
		}
		else {
			echo wp_kses($strOutput, array(
				'div' => array(),
				'a' => array(
					'href' => array(),
					'rel' => array()
				),
				'img' => array(
					'src' => array()
				),
				'span' => array(),
				'small' => array(),
				'em' => array()
			));
		}
	}
	else {
		$strOutput = 'No search term specified.';
		if ($return) {
			return $strOutput;
		}
		else {
			echo wp_kses($strOutput, array(
				'div' => array(),
				'a' => array(
					'href' => array(),
					'rel' => array()
				),
				'img' => array(
					'src' => array()
				),
				'span' => array(),
				'small' => array(),
				'em' => array()
			));
		}
	}
}
?>
