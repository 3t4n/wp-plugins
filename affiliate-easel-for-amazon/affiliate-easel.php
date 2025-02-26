<?php
/* 
Plugin Name: Affiliate Easel for Amazon
Plugin URI: http://www.bookspree.com/easel/
Version: v1.1.3
Author: <a href="http://zykinetics.com/">Gary M Davis</a>
Description: Affiliate Easel for Amazon is an affiliate helper and site builder for Amazon affiliates.  After Activation, <a href="options-general.php?page=affiliate-easel.php">add your affiliate ID and keys on the admin page</a>. Visit the <a href="http://www.bookspree.com/easel/">BookSpree</a> site for complete information about Affiliate Easel for Amazon.
 
Copyright © 2011 Gary M Davis, Zykinetics Inc.  (email : gary [a t ] zykinetics DOT com)

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
/*
 * easelWidget Class
 */
 class easelWidget extends WP_Widget {
    /** constructor */
    function easelWidget() {
        parent::WP_Widget(false, $name = 'Affiliate Easel Search');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $searchpage = apply_filters('widget_searchpage', $instance['searchpage']);
        echo $before_widget; 
		if ( $title ){echo $before_title . $title . $after_title;} 
		include 'includes/search_widget.php';
		echo $after_widget; 
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['searchpage'] = strip_tags($new_instance['searchpage']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        $searchpage = esc_attr($instance['searchpage']);
		//print_r($instance);
        ?>
            <p><label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <label for="<?php echo $this->get_field_name('searchpage'); ?>"><?php _e('Search results page:'); ?></label>
            <select name="<?php echo $this->get_field_name('searchpage'); ?>"> 
			<?php 
            $pages = get_pages(); 
            foreach ($pages as $pagg) {
				if(get_page_link($pagg->ID)==$instance['searchpage']){$selPg='selected="selected"';}else{$selPg='';}
              $option = '<option value="'.get_page_link($pagg->ID).'" '.$selPg.'>';
              $option .= $pagg->post_title;
              $option .= '</option>';
              echo $option;
            }
            ?>
            </select>
            <br /><small>Place the shortcode &quot;[az_easel node="1000" index="Books"]&quot; on the selected page.</small>

        <?php 
    }

} // END class easelWidget

// register easelWidget widget
add_action('widgets_init', create_function('', 'return register_widget("easelWidget");'));


  function mytheme_add_init() {  
	  $myStyleUrl = WP_PLUGIN_URL .'/affiliate-easel-for-amazon/resources/style.css';
	  $myStyleFile = WP_PLUGIN_DIR .'/affiliate-easel-for-amazon/resources/style.css';
	  if (file_exists($myStyleFile)) {
		  wp_register_style('myStyleSheets', $myStyleUrl);
		  wp_enqueue_style( 'myStyleSheets');
	  } //END if (file_exists($myStyleFile))
	  if(is_admin()){
		  wp_enqueue_style( 'plugin-install' );
		  wp_enqueue_style( 'dashboard' );
	  }
   }//END function mytheme_add_init

if (!class_exists("aeaAffiliateEasel")) {
	class aeaAffiliateEasel {
		var $adminOptionsName = "aeaAffiliateEaselAdminOptions";
		function aeaAffiliateEasel() { //constructor
		} //function aeaAffiliateEasel
		
		function init() {
			$this->getAdminOptions();
		} //

		function deactivate() {
			// Cleanup if requested
			delete_option('aeaAffiliateEaselAdminOptions');
			delete_option('widget_easelwidget');
		}
		
		function makeSearchPage(){
			$shoppe = array('post_status' => 'publish', 'post_type' => 'page', 'ping_status' => 'closed', 'post_content' => '[az_easel node="1000" index="Books"]', 
			'post_title' => 'Shoppe');
			wp_insert_post($shoppe, false);
		} //END makeSearchPage()

		//Returns an array of admin options
		function getAdminOptions() {
			$aeaAdminOptions = array(
				//list options
				'aff_id' => '',
				'aeaaff_key' => '',
				'aeaaff_secret' => '',
				'contribute' => '9',
				'show_title' => 'h3',
				'show_image' => 'medium',
				'show_byline' => 'true',
				'show_ratings' => '',
				'show_related' => '',
				'show_versions' => '',
				'show_content' => '0',
				//item detail options
				'show_title_d' => 'h1',
				'show_image_d' => 'large',
				'show_byline_d' => 'true',
				'show_ratings_d' => 'true',
				'show_related_d' => 'true',
				'show_versions_d' => 'true',
				'show_content_d' => 'full',
				'show_list_d' => 'true',
				'float_d' => '',
				'show_kindle' => 'true',
				'show_mp3' => 'true',
				//prices
				'show_list' => 'true',
				'show_az' => 'true',
				'show_azn' => '',
				'show_azu' => '',
				'show_azr' => '',
				'show_azc' => '',
				//page navigation
				'show_page_top' => 'true',
				'show_page_bot' => 'true',
				'float' => 'true',
				'link_type' => '',
				'aea_blank' => ''
	  		);
			$aea_option = get_option($this->adminOptionsName);
			if (!empty($aea_option)) {
				//add_option($this->adminOptionsName, $aeaAdminOptions); //would this be better?
				foreach ($aea_option as $key => $option)
					$aeaAdminOptions[$key] = $option;
			} //END if (!empty($aea_option))
			update_option($this->adminOptionsName, $aeaAdminOptions);
			return $aeaAdminOptions;
		} //END function getAdminOptions
//-----------------------------------------------------
		function aff_easel_admin_warnings() {
			if ( !get_option('add_id') ) {
				function aff_easel_warning() {
					echo "
					<div id='aff_easel-warning' class='updated fade'><p><strong>".__('Affilate Easel is almost ready.')."</strong> ".sprintf(__('You must <a href="%1$s">enter your Amazon API keys and Affiliate ID</a> for it to work.'), "options-general.php?page=affiliate-easel.php")."</p></div> 
					";
				}
				add_action('admin_notices', 'aff_easel_warning');
				return;
			}
		}

//-----------------------------------------------------
		//Prints out the admin page
		function printAdminPage() {
			$aea_option = $this->getAdminOptions();
			
			if (isset($_POST['update_aeaAffiliateEaselSettings'])) { 
				//checkboxes don't need conditional statements
						check_admin_referer('az_easel_nonce');
						$aea_option['show_ratings'] = $_POST['aeaRatings'];
						$aea_option['show_byline'] = $_POST['aeaByline'];
						$aea_option['show_versions'] = $_POST['aeaVersions'];
						$aea_option['show_related'] = $_POST['aeaRelated'];
						$aea_option['show_content'] = $_POST['aeaContent'];
						$aea_option['show_list'] = $_POST['listPrice'];
						$aea_option['show_az'] = $_POST['azPrice'];
						$aea_option['show_azu'] = $_POST['azuPrice'];
						$aea_option['show_azn'] = $_POST['aznPrice'];
						$aea_option['show_azr'] = $_POST['azrPrice'];
						$aea_option['show_azc'] = $_POST['azcPrice'];
						$aea_option['float'] = $_POST['aeaFloat'];
						$aea_option['show_page_top'] = $_POST['aeaPageTop'];
						$aea_option['show_page_bot'] = $_POST['aeaPageBot'];
				//	  
						$aeaDetail_option['show_ratings_d'] = $_POST['aeaDetailRatings'];
						$aeaDetail_option['show_byline_d'] = $_POST['aeaDetailByline'];
						$aeaDetail_option['show_versions_d'] = $_POST['aeaDetailVersions'];
						$aeaDetail_option['show_related_d'] = $_POST['aeaDetailRelated'];
						$aea_option['show_content_d'] = $_POST['aeaDetailContent'];
						$aea_option['float_d'] = $_POST['aeaDetailFloat'];
						$aea_option['show_kindle'] = $_POST['aeaDetailKindle'];
						$aea_option['show_mp3'] = $_POST['aeaDetailmp3'];
						$aea_option['aea_blank'] = $_POST['aea_blank'];
				//	  
					if (isset($_POST['aeaLink'])) {
						$aea_option['link_type'] = $_POST['aeaLink'];
					}	
					if (isset($_POST['aeaImageSize'])) {
						$aea_option['show_image'] = $_POST['aeaImageSize'];
					}	
					if (isset($_POST['aeaTitle'])) {
						$aea_option['show_title'] = $_POST['aeaTitle'];
					}	
					if (isset($_POST['aeaDetailImageSize'])) {
						$aea_option['show_image_d'] = $_POST['aeaDetailImageSize'];
					}	
					if (isset($_POST['aeaDetailTitle'])) {
						$aea_option['show_title_d'] = $_POST['aeaDetailTitle'];
					}	
					if (isset($_POST['aeaaff_id'])) {
						$aea_option['aff_id'] = apply_filters('aff_id_save_pre', $_POST['aeaaff_id']);
					}
					if (isset($_POST['aeaaff_key'])) {
						$aea_option['aeaaff_key'] = apply_filters('aeaaff_key_save_pre', $_POST['aeaaff_key']);
					}
					if (isset($_POST['aeaaff_secret'])) {
						$aea_option['aeaaff_secret'] = apply_filters('aeaaff_secret_save_pre', $_POST['aeaaff_secret']);
					}
					if (isset($_POST['contribute'])) {
						$aea_option['contribute'] = apply_filters('contribute_save_pre', $_POST['contribute']);
					}
					update_option($this->adminOptionsName, $aea_option);
					?>
	  <div class="updated">
		<p><strong>
		  <?php _e("Settings Updated.", "aeaAffiliateEasel");?>
		  </strong></p>
	  </div>
<?php
			} //END if (isset($_POST['update_aeaAffiliateEaselSettings'])) ?>

<?php
			include('includes/admin_form.php');
		}//End function printAdminPage()
	}// END class aeaAffiliateEasel

	if (class_exists("aeaAffiliateEasel")) {
		$dl_AffiliateEasel = new aeaAffiliateEasel();
	}

	register_activation_hook( __FILE__, array(&$dl_AffiliateEasel, 'getAdminOptions'));
	register_deactivation_hook( __FILE__, array(&$dl_AffiliateEasel, 'deactivate'));

//Initialize the admin panel
	if (!function_exists("aeaAffiliateEasel_ap")) {
		function aeaAffiliateEasel_ap() {
			global $dl_AffiliateEasel;
			if (!isset($dl_AffiliateEasel)) {
				return;
			}
			if (function_exists('add_options_page')) {
				add_options_page('Affiliate Easel for Amazon', 'Affiliate Easel for Amazon', 9, basename(__FILE__), array(&$dl_AffiliateEasel, 'printAdminPage'));
			}
		}	
	//Actions and Filters	
		if (isset($dl_AffiliateEasel)) {
			//Actions
			add_action('admin_menu', 'aeaAffiliateEasel_ap');
			add_action('admin_init', 'mytheme_add_init');
			add_action('get_header', 'mytheme_add_init');
			//Filters
		}
	/*
		if ( !get_option('aff_id') ) {
			function aff_easel_warning() {
				echo "
				<div id='aff_easel-warning' class='updated fade'><p><strong>".__('Affilate Easel is almost ready.')."</strong> ".sprintf(__('You must <a href="%1$s">enter your Amazon API keys and Affiliate ID</a> for it to work.'), "options-general.php?page=affiliate-easel.php")."</p></div> 
				";
			}
			add_action('admin_notices', 'aff_easel_warning');
			return;
		}
	*/
	
	}

/**/
//-- END admin menu --//	
	
	//shortcode
	function easel_item($atts) {
		global $easel_atts;
		$opt = get_option('aeaAffiliateEaselAdminOptions'); //get predefined options
		extract(shortcode_atts(array(
				'item' => '', //for item lookup - ASIN code B002FQJT3Q
				'search' => '', //for search only - search term
				'node' => '', //for node only - numeric search node
				'index' => 'All', //for search. may be All, Apparel, Automotive, Baby, Beauty, Blended, Books, Classical, DigitalMusic, DVD, Electronics, ForeignBooks, GourmetFood, Grocery, HealthPersonalCare, Hobbies, HomeGarden, Industrial, Jewelry, KindleStore, Kitchen, Magazines, Merchants, Miscellaneous, MP3Downloads, Music, MusicalInstruments, MusicTracks, OfficeProducts, OutdoorLiving, PCHardware, PetSupplies, Photo, Software, SoftwareVideoGames, SportingGoods, Tools, Toys, VHS, Video, VideoGames, Watches, Wireless, WirelessAccessories
				'show_title' => $opt['show_title'], //h3
				'show_image' => $opt['show_image'], //'medium',
				'show_byline' => $opt['show_byline'], //'true',
				'show_ratings' => $opt['show_ratings'], //'',
				'show_related' => $opt['show_related'], //'',
				'show_versions' => $opt['show_versions'], //'',
				'show_content' => $opt['show_content'], //'0',
				//prices
				'show_list' => $opt['show_list'], //'true',
				'show_az' => $opt['show_az'], //'true',
				'show_azn' => $opt['show_azn'], //'',
				'show_azu' => $opt['show_azu'], //'',
				'show_azr' => $opt['show_azr'], //'',
				'show_azc' => $opt['show_azc'], //'',
				//page navigation
				'page_top' => $opt['show_page_top'], //'true',
				'page_bot' => $opt['show_page_bot'], //'true',
				'float' => $opt['float'], //'true',
			  ), $atts)); 
				 
				 if($_GET['node']){$item=''; $node=$_GET['node']; $search='';}
				 if($_GET['kw']){$item=''; $node=''; $search=$_GET['kw'];}
				 if($_GET['item']){$item=$_GET['item']; $node=''; $search='';}
			if($item){
				$item=str_replace('-', '', trim($item));//removes spaces and hyphen
				return(ItemLookup($item, $index, $atts));
			} elseif($search){
				if(isset($_GET['ItemPage'])){$p=$_GET['ItemPage'];}else{$p='1';}
				if(!isset($index)){$index='All';}
				if(isset($_GET['idx'])){$index=$_GET['idx'];}
				return(ItemSearch($index, rawurlencode($search), $p, $atts));
			} elseif($node){
				if(!isset($index)){$index='Books';} //index cannot be "All" for BrowseNode
				if(isset($_GET['idx'])){$index=$_GET['idx'];}
				if(isset($_GET['ItemPage'])){$p=$_GET['ItemPage'];}else{$p='1';}
				return(nodePage($index, $node, $p, $atts)); 
			}
		}

add_shortcode('az_easel', 'easel_item');

	function search_form($atts){
		extract(shortcode_atts(array(
		'page'=> get_page_link(),
		'select'=>'',
		), $atts));
		$searchpage = $page; 
		$form=file_get_contents( WP_PLUGIN_DIR .'/affiliate-easel-for-amazon/includes/search_widget.php' );
		/* eval ouputs directly to the browser so putting it in the output buffer allows control over placement */
		ob_start();
		eval(' ?> '.$form.' <?php ');
		$result = ob_get_contents();
		ob_end_clean();
		return($result);
	}
	
add_shortcode('easel_search', 'search_form');

function signed($q){
	$q['Version'] = '2010-10-01'; //was 2008-11-03 | 2010-10-01 
	$q['Service'] = 'AWSECommerceService';
	$q['Timestamp']=gmdate("Y-m-d\TH:i:s\Z"); //add timestamp to query
	$opt = get_option('aeaAffiliateEaselAdminOptions'); //get predefined options
	($opt['aff_id']) ? $q['AssociateTag']=$opt['aff_id'] : $q['AssociateTag']='bookspree3-20'; //if there isn't an id, use default
	$q['AWSAccessKeyId'] = $opt['aeaaff_key'];
	$pvtKey = $opt['aeaaff_secret'];
	$request=build_query($q); //since v1.0.3
    $request = str_replace(',','%2C', $request);
	$request = str_replace(':','%3A', $request);
	if($opt['aeaaff_key'] && $opt['aeaaff_secret']){
		//break request string into key/value pairs,
		$reqarr = explode('&',$request);
		//sort on byte value
		sort($reqarr);
		 // tie back together w/ &'s
		$string_to_sign = implode("&", $reqarr);
		$string_to_sign = "GET\nwebservices.amazon.com\n/onca/xml\n".$string_to_sign;
		//Substitute your real Secret Key here...
		$signature = urlencode(base64_encode(hash_hmac("sha256", $string_to_sign, $pvtKey, True)));
		$request .= '&Signature='.$signature;
	}else{
		$opt['contribute']=30; // fyi
	}
 	$request = 'http://bookspree.com/sign.php?'.$request.'&contribute='.$opt['contribute'].'&site='.urlencode(site_url());
	return ($request);
}
//-------------------------------------------------------------------------------------------------------
function cartCreate($offerListingId){
	$q = array('Operation'=>'CartCreate', 'Item.1.OfferListingId'=>$offerListingId, 'Item.1.Quantity'=>'1');
	$request=signed($q);
	if (isset($_GET['dev'])){$results.='<p style="clear:both">For development test <a href="'.htmlentities($request).'">XML</a> [cartCreate]</p>'	;}
	$response = @file_get_contents($request);
	if(!$response){
		$results.='<div style="font-size:smaller; border-bottom:dotted 1px; color:red; display:inline-block;" title="This account may have exceeded the hourly request limit Efficiency Guidelines. ">Amazon Error. </div>';
		return($results);
		}
	$parsed_xml = simplexml_load_string($response);
	showCartContents($parsed_xml);
}
//-------------------------------------------------------------------------------------------------------
function cartAdd($offerListingId){
	$CartId = $_GET['CartId'];
	$HMAC = urlencode($_GET['HMAC']);
	$q = array('Operation'=>'CartAdd', 'CartId'=>$CartId, 'HMAC'=>$HMAC, 'Item.1.OfferListingId'=>$offerListingId, 'Item.1.Quantity'=>'1');
	$request=signed($q);
	if (isset($_GET['dev'])){$results.='<p style="clear:both">For development test <a href="'.htmlentities($request).'">XML</a> [cartAdd]</p>'	;}
	$response = @file_get_contents($request);
	if(!$response){
		$results.='<div style="font-size:smaller; border-bottom:dotted 1px; color:red; display:inline-block;" title="This account may have exceeded the hourly request limit Efficiency Guidelines. ">Amazon Error. </div>';
		return($results);
		}
	$parsed_xml = simplexml_load_string($response);
	showCartContents($parsed_xml);	
}
//-------------------------------------------------------------------------------------------------------
function showCartContents($parsed_xml){
	print("<table>");
	$CartId = $parsed_xml->Cart->CartId;
	$HMAC = $parsed_xml->Cart->URLEncodedHMAC;
	foreach($parsed_xml->Cart->CartItems->CartItem as $current){
		$CartItemId = $current->CartItemId;
		$remove="books.html?Action=Remove&CartId=$CartId&HMAC=$HMAC&CartItemId=$CartItemId";
		print("<tr><td>".$current->Title.": ".$current->Price->FormattedPrice."&nbsp;&nbsp;&nbsp;<a href=$remove>(Remove from Cart)</a></td></tr>");
	}
	print("<tr><td>Subtotal: ".$parsed_xml->Cart->CartItems->SubTotal->FormattedPrice."</td></tr>");
	print("<tr><td>");
	$continue = "books.html?Action=Search&CartId=$CartId&HMAC=$HMAC";
	print("<a href=$continue>Continue Shopping</a>");
	$checkout=$parsed_xml->Cart->PurchaseURL;
	print("&nbsp;&nbsp;&nbsp;<a href=$checkout>Checkout</a>");
	print("</table>");
}
//------------------------------------------------------------------------------------------------------
function removeFromCart($CartItemId){
	$CartId = $_GET['CartId'];
	$HMAC = urlencode($_GET['HMAC']);
	$CartItemId = $_GET['CartItemId'];
	$q = array('Operation' => 'CartModify', 'CartId' => $CartId, 'HMAC' => $HMAC, 'Item.1.CartItemId' => $CartItemId, 'Item.1.Quantity' => '0');
	$request=sign($q);
	if (isset($_GET['dev'])){$results.='<p style="clear:both">For development test <a href="'.htmlentities($request).'">XML</a> [removeFromCart]</p>'	;}
	$response = @file_get_contents($request);
	if(!$response){
		$results.='<div style="font-size:smaller; border-bottom:dotted 1px; color:red; display:inline-block;" title="This account may have exceeded the hourly request limit Efficiency Guidelines. ">Amazon Error. </div>';
		return($results);
		}
	$parsed_xml = simplexml_load_string($response);
	showCartContents($parsed_xml);
}
//-----------------------------------------------------------------------------------------------------
function getCartContents($CartId, $HMAC){
	$q = array('Operation'=>'CartGet', 'CartId'=>$CartId, 'HMAC'=>$HMAC);
	$request=sign($q);
	if (isset($_GET['dev'])){$results.='<p style="clear:both">For development test <a href="'.htmlentities($request).'">XML</a> [getCartContents]</p>'	;}
	$response = @file_get_contents($request);
	if(!$response){
		$results.='<div style="font-size:smaller; border-bottom:dotted 1px; color:red; display:inline-block;" title="This account may have exceeded the hourly request limit Efficiency Guidelines. ">Amazon Error. </div>';
		return($results);
		}
	$parsed_xml = simplexml_load_string($response);
	showCartContents($parsed_xml);
}
//------------------------------------------------------------------------------------------------------
function ItemSearch($index, $keywords, $page, $atts){
	$q =array('ItemPage'=>$page, 'Keywords'=>$keywords, 'SearchIndex'=>$index, 'Operation'=>'ItemSearch', 'ResponseGroup'=>'Large,Offers,VariationSummary');
	//$q['Keywords']=rawurldecode($q['Keywords']);
	$request=signed($q);
	if (isset($_GET['dev'])){$results.='<p style="clear:both">For development test <a href="'.htmlentities($request).'">XML</a> [ItemSearch]</p>'	;}
	$response = @file_get_contents($request);
	if(!$response){
		$results.='<div style="font-size:smaller; border-bottom:dotted 1px; color:red; display:inline-block;" title="This account may have exceeded the hourly request limit Efficiency Guidelines. ">Amazon Error. </div>';
		return($results);
		}
	$parsed_xml = simplexml_load_string($response);
	$results.=searchDetails($parsed_xml, $index, $atts);
	return($results);
}
//-------------------------------------------------------------------------------------------------------
function ItemLookup($item, $index, $atts){
	$q = array('ItemId'=>$item, 'Operation'=>'ItemLookup', 'ResponseGroup'=>'Large,Offers,VariationSummary,AlternateVersions');
	$request=signed($q);
	if (isset($_GET['dev'])){$results.='<p style="clear:both">For development test <a href="'.htmlentities($request).'">XML</a> [ItemLookup]</p>'	;}
	$response = @file_get_contents($request);
	if(!$response){
		$results.='<div style="font-size:smaller; border-bottom:dotted 1px; color:red; display:inline-block;" title="This account may have exceeded the hourly request limit Efficiency Guidelines. ">Amazon Error. </div>';
		return($results);
		}
	$parsed_xml = simplexml_load_string($response);
	$results.=searchDetails($parsed_xml, $index, $atts);
	return($results);
}
//-------------------------------------------------------------------------------------------------------
function nodePage($index, $node, $page, $atts){
	$q=array('BrowseNode'=>$node, 'ItemPage'=>$page, 'Operation'=>'ItemSearch', 'SearchIndex'=>$index, 'ResponseGroup'=>'Large,Offers,VariationSummary');
	$request=signed($q);
	if (isset($_GET['dev'])){$results.='<p style="clear:both">For development test <a href="'.htmlentities($request).'">XML</a> [nodePage]</p>'	;}
	$response = @file_get_contents($request);
	if(!$response){
		$results.='<div style="font-size:smaller; border-bottom:dotted 1px; color:red; display:inline-block;" title="This account may have exceeded the hourly request limit Efficiency Guidelines. ">Amazon Error. </div>';
		return($results);
		}
	$parsed_xml = simplexml_load_string($response);
	$results.=searchDetails($parsed_xml, $index, $atts);
	return($results);
}
//------------------------------------------------------------------------------------------------------
function nodeBrowse($index, $node){
	$q['node']=$node;
	$q['idx']=$index;
	$q['svc']='tree';
	$param=http_build_query($q);
	$request=signed($param);
	if (isset($_GET['dev'])){$results.='<p style="clear:both">For development test <a href="'.htmlentities($request).'">XML</a> [nodeBrowse]</p>'	;}
	$response = @file_get_contents($request);
	if(!$response){
		$results.='<div style="font-size:smaller; border-bottom:dotted 1px; color:red; display:inline-block;" title="This account may have exceeded the hourly request limit Efficiency Guidelines. ">Amazon Error. </div>';
		return($results);
		}
	$parsed_xml = simplexml_load_string($response);
	return(makeNodeResults($parsed_xml, $index));
}
//echo nodeBrowse('Books', '1000');
//------------------------------------------------------------------------------------------------------
function makeNodeResults($parsed_xml, $SearchIndex){
	$myNode = $parsed_xml->BrowseNodes->BrowseNode;
	$topic=$myNode->Name;
	//print_r($myNode);
	
	$nodeTree= '<h4>'.$topic.'</h4>';
	if(isset($myNode->Children->BrowseNode)){
		$nodeTree.= '<ul>';
		foreach($myNode->Children->BrowseNode as $child){
			$name=$child->Name;
			$childNode=$child->BrowseNodeId;
			//urlencode(
			$nodeTree.= '<li><a href="books.html?p='.$childNode.'&amp;v='.urlencode($name).'&amp;SearchIndex='.$SearchIndex.'">'.$name.'</a></li>';
		}
		$nodeTree.= '</ul>';
	}
	return($nodeTree);
}
//-------------------------------------------------------------------------------------------------------
function pageNumbers($p, $t){
	$pg=(int)$p;
	$prevQuery['ItemPage']=$pg-1;
	$nextQuery['ItemPage']=$pg+1;
	if(isset($_GET)){
		$nextQuery=array_merge($_GET, $nextQuery);
		$prevQuery=array_merge($_GET, $prevQuery);
	}
		$folio='<div class="pages" style="clear:both;">';
	if($p>1){
		$folio.='<a class="prev" href="?'.http_build_query($prevQuery, '', '&amp;').'">Previous Page</a>&emsp; ';
	}
	$folio.='<span>Page '.$p.' &emsp;</span>';
	if($t==1){
$folio.='<span>of &emsp;'.$t.' </span>';
	}
	if($t>1){
$folio.='<a class="next" href="?'.http_build_query($nextQuery, '', '&amp;').'">Next Page</a>';
	}
	$folio.='</div>';

	return($folio);
  }
//-------------------------------------------------------------------------------------------------------
function searchDetails($parsed_xml, $SearchIndex, $atts){
	if(!$parsed_xml){return '<code style="color:red;">Amazon Error</code>';}
	$searchpage=getSearchpage();
	//establish parameters
	$aea_option=get_option('aeaAffiliateEaselAdminOptions');
	extract($aea_option); //defaults
	extract($atts); //shortcodes will overwrite aea defaults
	if($only=='image'){ //prevents all data but images form appearing
		$show_title = '';
		$show_byline = '';
		$show_ratings = '';
		$show_related = '';
		$show_versions = '';
		$show_content = '';
		$show_list = '';
		$show_az = '';
		$show_azn = '';
		$show_azu = '';
		$show_azr = '';
		$show_azc = '';
		$kindle = ''; 
		$mp3 = ''; 		
	}
	if($_GET['item']){ //changes parameters if this is a detail page
		$show_title = $show_title_d;
		$show_image = $show_image_d;
		$show_byline = $show_byline_d;
		$show_ratings = $show_ratings_d;
		$show_related = $show_related_d;
		$show_versions = $show_versions_d;
		$show_content = $show_content_d;
		$show_list = $show_list_d;
		$float = $float_d;
		$kindle = $show_kindle; //this prevents kindle preview from showing in lists
		$mp3 = $show_mp3; //this prevents mp3 preview from showing in lists
	}	
	if($parsed_xml->Items->Request->Errors){
		$error=$parsed_xml->Items->Request->Errors->Error->Message;
	  $azEaselResults.='<code style="color:red;">'.$error.'</code>';
	}
	$numOfItems =count($parsed_xml->Items->Item);
	$totalPages = $parsed_xml->Items->TotalPages;
	$CartId = $_GET['CartId'];
	$HMAC = urlencode($_GET['HMAC']);
	$args=$parsed_xml->OperationRequest->Arguments[0];
	foreach($args as $arg){
		if($arg->attributes()->Name == 'AssociateTag'){
			$tag=$arg->attributes()->Value;
		}
		if($arg->attributes()->Name == 'ItemPage'){
			$pageNo=$arg->attributes()->Value;
		}
	}
	if($aea_blank){$target='target="_blank" ';}
	if($link_type == 'nofollow'){$rel='rel="nofollow" ';}
	if($pageNo && $show_page_top){
		$azEaselResults.=pageNumbers($pageNo, $totalPages);
	  }
	if($numOfItems>0){
		foreach($parsed_xml->Items->Item as $current){
			$asin = $current->ASIN;
			if($show_title){
				$title=$current->ItemAttributes->Title;
				$htmlTitle=htmlspecialchars($title, ENT_QUOTES);
			}
			switch ($show_image) {
				case 'small':
					$imgSrc=$current->SmallImage->URL;
					$imgH=$current->SmallImage->Height;
					$imgW=$current->SmallImage->Width;
					break;
				case 'medium':
					$imgSrc=$current->MediumImage->URL;
					$imgH=$current->MediumImage->Height;
					$imgW=$current->MediumImage->Width;
					break;
				case 'large':
					$imgSrc=$current->LargeImage->URL;
					$imgH=$current->LargeImage->Height;
					$imgW=$current->LargeImage->Width;
					break;
			}
			$azURL=$current->DetailPageURL;

			$creators=@getCreators($current);

			if($show_versions){
				$versions=@getVersions($current, $tag, $rel.$target);
			}
			if($show_related){
				$similar=@getSimilar($current, $tag, $rel.$target);
			}
			if($show_list){
			  $listPrice=$current->ItemAttributes->ListPrice->FormattedPrice;
			}
			if($show_az){
				$azPrice=$current->Offers->Offer->OfferListing->Price->FormattedPrice;
				if(!$current->Offers->Offer){
					$azPrice=$current->VariationSummary->LowestPrice->FormattedPrice;
				}
			}
			if(stristr($creators, 'kindle')){
				$azPrice='See Kindle Price';
				$kindlePreview='true';
			}
			if(stristr($creators, 'MP3 Download')){
				$mp3Preview='true';
			}
			if($show_azn){
				$aznPrice=$current->OfferSummary->LowestNewPrice->FormattedPrice;
			}
			if($show_azu){
				$azuPrice=$current->OfferSummary->LowestUsedPrice->FormattedPrice;
			}
			if($show_azr){
				$azrPrice=$current->OfferSummary->LowestRefurbishedPrice->FormattedPrice; 
			}
			if($show_azc){		
				$azcPrice=$current->OfferSummary->LowestCollectiblePrice->FormattedPrice; 
			}
			if($show_content && $current->EditorialReviews->EditorialReview){
				$content=''; //reset
				foreach($current->EditorialReviews->EditorialReview as $reviews){
					$content.='<h4>'.$reviews->Source.' </h4>';
					$content.=$reviews->Content.' <br />';
					if ($content && $show_content =='excerpt') {
						$content=strip_tags($content, '<br>');
						$content=trimPost($content);
						$content.='... <a '.$rel.$target.' href="'.$azURL.'">Read more</a>';
					}
				}
			}
			if($show_ratings && $current->CustomerReviews->IFrameURL){
				$ratings=$current->CustomerReviews->IFrameURL;
				settype($ratings, 'string');
				$ratings=htmlentities($ratings);
			}
			//if(isset($current->Offers)){ //only show items for which there is an offer
				$azEaselResults.='<div class="item">';
				if($show_title){
					$azEaselResults.='<'.$show_title.' style="padding:1em 0 .2em; margin:0;">';
					if(isset($searchpage)){
						$azEaselResults.='<a href="'.$searchpage.'?idx=All&amp;item='.$asin.'">'.$htmlTitle.'</a>' ;
					}else{
						$azEaselResults.='<a '.$rel.$target.' href="'.$azURL.'">'.$htmlTitle.'</a>' ;
					}
					  $azEaselResults.='</'.$show_title.'>';
				}
				if($show_byline){
					$azEaselResults.='<div class="byline">'.$creators.'</div>';
					unset($creators);
				}
				if(isset($imgSrc)){
					if($float){$float=' fl';}
					$azEaselResults.='<a '.$rel.$target.' href="'.$azURL.'">';
					$azEaselResults.='<img src="'.$imgSrc.'" class="book'.$float.'" alt="'.$htmlTitle.'" style="width:'.$imgW.'px; height:'.$imgH.'px; margin:0 1em 1em 0;" /></a>';
				}
				if($imgW && $float){$ulm=' style="margin-left:'.($imgW+30).'px;"'; }
				$azEaselResults.='<ul class="prices"'.$ulm.'>';
				unset($ulm);// so it doesn't persist for next item
				if($listPrice){
				$azEaselResults.='<li class="d">'.$listPrice.' List Price</li>';
				}
				if($azPrice){
					$azEaselResults.='<li><a '.$rel.$target.' href="'.$azURL.'" title="Buy: '.$htmlTitle.'">';
					$azEaselResults.=$azPrice.' at Amazon.com</a></li>'; 
				}
				$redirectLink=htmlspecialchars('http://www.amazon.com/exec/obidos/redirect?link_code=ur2&camp=1789&tag='.$tag.'&creative=9325&path=http://www.amazon.com/gp/product/offer-listing/'.$asin.'/ref=olp_tab_new?%5Fencoding=UTF8%26condition=');
				if(isset($aznPrice)){
					$azEaselResults.='<li><a '.$rel.$target.' href="'.$redirectLink.'new" title="New: '.$htmlTitle.'">'.$aznPrice.' NEW at Amazon.com Marketplace</a></li>';
				}
				if(isset($azuPrice)){
					$azEaselResults.='<li><a '.$rel.$target.' href="'.$redirectLink.'used" title="Used: '.$htmlTitle.'">'.$azuPrice.' USED at Amazon.com Marketplace</a></li>';
				}
				if(isset($azrPrice)){
					$azEaselResults.='<li><a '.$rel.$target.' href="'.$redirectLink.'refurbished" title="Refurbished: '.$htmlTitle.'">'.$azrPrice.' REFURBISHED at Amazon.com Marketplace</a></li>';
				}
				if(isset($azcPrice)){
					$azEaselResults.='<li><a '.$rel.$target.' href="'.$redirectLink.'collectible" title="Collectible: '.$htmlTitle.'">'.$azcPrice.' COLLECTIBLE at Amazon.com Marketplace</a></li>';
				}
				$azEaselResults.='</ul>';
				if($kindlePreview && $kindle){
					$azEaselResults.="<h4>Kindle Preview</h4><div id='kindleReaderDiv82'></div><script type='text/javascript' src='http://kindleweb.s3.amazonaws.com/app/KindleReader-min.js'></script><script>KindleReader.LoadSample({containerID: 'kindleReaderDiv82', asin: '".$asin."', width: '100%', height: '496', assoctag: '".$tag."'});</script>";
				}
				if($mp3Preview && $mp3){
					$azEaselResults.="<script type='text/javascript'>var amzn_wdgt={widget:'MP3Clips'}; amzn_wdgt.tag='".$tag."'; amzn_wdgt.widgetType='ASINList'; amzn_wdgt.ASIN='$asin'; amzn_wdgt.title='Listen to Samples'; amzn_wdgt.width='336'; amzn_wdgt.height='280'; amzn_wdgt.shuffleTracks='True'; amzn_wdgt.marketPlace='US'; </script><script type='text/javascript' src='http://wms.assoc-amazon.com/20070822/US/js/swfobject_1_5.js'></script>"; 
				}
				if(isset($content)){
					$azEaselResults.='<div>'.$content.'</div>';
					unset($content);
				}
				if(isset($ratings)){
					$azEaselResults.='<iframe src="'.$ratings.'" style="clear:both; margin-top:1em; border:1px solid #ccc; width:100%; height:180px;"><a '.$rel.$target.' href="'.$azURL.'" title="Reviews about '.$htmlTitle.'">Read the reviews...</a></iframe>';
				}
				if(isset($versions)){
					$azEaselResults.='<div class="info"><h4 style="margin:1em 0 .2em">Other versions</h4>'.$versions.'</div>';
					unset($versions);
				}
				if(isset($similar)){
					$azEaselResults.='<div class="info rBox"><h4 style="margin:1em 0 .2em">Related items</h4>'.$similar.'</div>';
					unset($similar);
				}
			//} //if(isset($current->Offers))	
			$azEaselResults.='</div>';
		}
	  if($pageNo && $show_page_bot){
		$azEaselResults.=pageNumbers($pageNo, $totalPages);
	  }
	  $azEaselResults= '<div class="az_easel">'.$azEaselResults.'</div>'; //to allow specific styles
	}
	return $azEaselResults;
}
//-------------------------------------------------------------------------------------------------------
function getSearchpage(){
	$easel_atts=get_option('widget_easelwidget');
	  foreach($easel_atts as $att){
		  if(is_array($att) && array_key_exists('searchpage', $att)){$searchpage=$att['searchpage'];} //may be multiple, last one is fine.
	  }
	return $searchpage;
}
//-------------------------------------------------------------------------------------------------------
function trimPost($post){
	$str1=strip_tags($post);
	//trims the text to the nearest length $maxL at last space
	$end = strrpos(substr($str1, 0, 512), ".");
	if($end){
		$newStr = substr($str1, 0, $end+1);
	}else{
		$newStr = substr($str1, 0, 512);
	}
	return $newStr;
}
//-------------------------------------------------------------------------------------------------------
function getCreators($current){
	foreach($current->ItemAttributes->AudienceRating as $attribute){
			if(isset($creators)){$creators.=", ";}
			$creators.=$attribute;
	}
	foreach($current->ItemAttributes->HardwarePlatform as $attribute){
			if(isset($creators)){$creators.=", ";}
			$creators.=$attribute;
	}
	foreach($current->ItemAttributes->Binding as $attribute){
			if(isset($creators)){$creators.=", ";}
			$creators.=$attribute;
	}
	foreach($current->ItemAttributes->Actor as $attribute){
			if(isset($creators)){$creators.=", ";}
			$creators.=$attribute;
	}
	foreach($current->ItemAttributes->Author as $attribute){
			if(isset($creators)){$creators.=", ";}
			$creators.=$attribute;
	}
	foreach($current->ItemAttributes->Director as $attribute){
			if(isset($creators)){$creators.=", ";}
			$creators.=$attribute;
	}
	foreach($current->ItemAttributes->Artist as $attribute){
			if(isset($creators)){$creators.=", ";}
			$creators.=$attribute;
	}
	foreach($current->ItemAttributes->Creator as $attribute){
			if(isset($creators)){$creators.=", ";}
			$creators.=$attribute;
	} 
	$creators=htmlspecialchars($creators, ENT_QUOTES);
	return($creators);
}
//------------------
function getLinkOptions(){
	$aea_option=get_option('aeaAffiliateEaselAdminOptions');
	if($aea_option['aea_blank']){$options.='target="_blank" ';}
	if($aea_option['link_type'] == 'nofollow'){$options.='rel="nofollow" ';}
	return($options);
}

function getVersions($current, $tag, $opt){
	$searchpage=getSearchpage();
	foreach($current->AlternateVersions->AlternateVersion as $version){
			if(isset($versions)){$versions.="<br />";}
			$htmlTitle=htmlspecialchars($version->Title, ENT_QUOTES);
			if(isset($searchpage)){
				$versions.='<a href="'.$searchpage.'?idx=All&amp;item='.$version->ASIN.'">'.$htmlTitle.', '.$version->Binding.'</a>' ;
			}else{
				$versions.='<a  '.$opt.' href="http://www.amazon.com/exec/obidos/ASIN/'.$version->ASIN.'/ref=nosim/'.$tag.'">'.$htmlTitle.', '.$version->Binding.'</a>' ;
			}
	}
	return($versions);
}
function getSimilar($current, $tag, $opt){
	$searchpage=getSearchpage();
	foreach($current->SimilarProducts->SimilarProduct as $product){
			if(isset($products)){$products.="<br />";}
			$htmlTitle=htmlspecialchars($product->Title, ENT_QUOTES);
			if(isset($searchpage)){
				$products.='<a href="'.$searchpage.'?idx=All&amp;item='.$product->ASIN.'">'.$htmlTitle.', '.$product->Binding.'</a>' ;
			}else{
				$products.='<a '.$opt.' href="http://www.amazon.com/exec/obidos/ASIN/'.$product->ASIN.'/ref=nosim/'.$tag.'">'.$htmlTitle.', '.$product->Binding.'</a>' ;
			}			//$products.='<a href="http://www.amazon.com/exec/obidos/ASIN/'.$product->ASIN.'/ref=nosim/'.$tag.'">'.$product->Title.'</a>' ;
	}
	return($products);
}

} //End Class aeaAffiliateEasel

?>
