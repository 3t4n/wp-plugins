<?php
 /*
Plugin Name: Auto amazon product widget by seegatesite
Plugin URI: http://seegatesite.com/how-to-create-an-attractive-auto-amazon-product-widget/
Description: Creating an attractive amazon auto product widget to increase your earning from amazon affiliate site http://seegatesite.com/how-to-create-an-attractive-auto-amazon-product-widget/
Version: 1.0
Author: Seegatesite
Author URI: http://seegatesite.com
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}
wp_register_sidebar_widget('aapws_id','Auto amazon product Widget','aapws_display',array('description' => 'Auto amazon product widgets by seegatesite.com'));
wp_register_widget_control('aapws_id','aapws','aapws_control');

function aapws_control($args=array(), $params=array()) {
if (isset($_POST['submitted'])) 
{
	update_option('aapws_title', $_POST['widgettitle']);
	update_option('aapws_tag_id', $_POST['tag_id']);
	update_option('aapws_pub_key', $_POST['pub_key']);
	update_option('aapws_priv_key', $_POST['priv_key']);
	update_option('aapws_searchindex', $_POST['searchindex']);
	update_option('aapws_keyword', $_POST['keyword']);
	update_option('aapws_location', $_POST['location']);
	update_option('aapws_count', $_POST['count']);
}
//load options
$widgettitle = get_option('aapws_title');
$tag_id = get_option('aapws_tag_id');
$pub_key = get_option('aapws_pub_key');
$priv_key = get_option('aapws_priv_key');
$searchindex = get_option('aapws_searchindex');
$keyword = get_option('aapws_keyword');
$location = get_option('aapws_location');
$count = get_option('aapws_count');
?>
Widget Title :<br />
<input type="text" class="widefat" name="widgettitle" value="<?php echo stripslashes($widgettitle); ?>" />
<br /><br />
Tag id :<br />
<input type="text" class="widefat" name="tag_id" value="<?php echo $tag_id; ?>" />
<br /><br />
Public key :<br />
<input type="password" class="widefat" name="pub_key" value="<?php echo $pub_key; ?>" />
<br /><br />
Private key :<br />
<input type="password" class="widefat" name="priv_key" value="<?php echo $priv_key; ?>" />
<br /><br />
Searchindex :<br />
<select class="widefat" name="searchindex">
	<option value="All"<?php if($searchindex=="All") echo 'selected' ;  ?> >All</option>
    <option value="Apparel"<?php if($searchindex=="Apparel") echo 'selected' ;  ?> >Apparel</option>
    <option value="Appliances"<?php if($searchindex=="Appliances") echo 'selected' ;  ?> >Appliances</option>
    <option value="ArtsAndCrafts"<?php if($searchindex=="ArtsAndCrafts") echo 'selected' ;  ?> >ArtsAndCrafts</option>
    <option value="Automotive"<?php if($searchindex=="Automotive") echo 'selected' ;  ?> >Automotive</option>
    <option value="Baby"<?php if($searchindex=="Baby") echo 'selected' ;  ?> >Baby</option>
    <option value="Beauty"<?php if($searchindex=="Beauty") echo 'selected' ;  ?> >Beauty</option>
    <option value="Blended"<?php if($searchindex=="Blended") echo 'selected' ;  ?> >Blended</option>
    <option value="Books"<?php if($searchindex=="Books") echo 'selected' ;  ?> >Books</option>
    <option value="Classical"<?php if($searchindex=="Classical") echo 'selected' ;  ?> >Classical</option>
    <option value="Collectibles"<?php if($searchindex=="Collectibles") echo 'selected' ;  ?> >Collectibles</option>
    <option value="DigitalMusic"<?php if($searchindex=="DigitalMusic") echo 'selected' ;  ?> >DigitalMusic</option>
    <option value="Grocery"<?php if($searchindex=="Grocery") echo 'selected' ;  ?> >Grocery</option>
    <option value="DVD"<?php if($searchindex=="DVD") echo 'selected' ;  ?> >DVD</option>
    <option value="Electronics"<?php if($searchindex=="Electronics") echo 'selected' ;  ?> >Electronics</option>
    <option value="HealthPersonalCare"<?php if($searchindex=="HealthPersonalCare") echo 'selected' ;  ?> >HealthPersonalCare</option>
    <option value="HomeGarden"<?php if($searchindex=="HomeGarden") echo 'selected' ;  ?> >HomeGarden</option>
    <option value="Industrial"<?php if($searchindex=="Industrial") echo 'selected' ;  ?> >Industrial</option>
    <option value="Jewelry"<?php if($searchindex=="Jewelry") echo 'selected' ;  ?> >Jewelry</option>
    <option value="KindleStore"<?php if($searchindex=="KindleStore") echo 'selected' ;  ?> >KindleStore</option>
    <option value="Kitchen"<?php if($searchindex=="Kitchen") echo 'selected' ;  ?> >Kitchen</option>
    <option value="LawnGarden"<?php if($searchindex=="LawnGarden") echo 'selected' ;  ?> >LawnGarden</option>
    <option value="Magazines"<?php if($searchindex=="Magazines") echo 'selected' ;  ?> >Magazines</option>
    <option value="Marketplace"<?php if($searchindex=="Marketplace") echo 'selected' ;  ?> >Marketplace</option>
    <option value="Merchants"<?php if($searchindex=="Merchants") echo 'selected' ;  ?> >Merchants</option>
    <option value="Miscellaneous"<?php if($searchindex=="Miscellaneous") echo 'selected' ;  ?> >Miscellaneous</option>
    <option value="MobileApps"<?php if($searchindex=="MobileApps") echo 'selected' ;  ?> >MobileApps</option>
    <option value="MP3Downloads"<?php if($searchindex=="MP3Downloads") echo 'selected' ;  ?> >MP3Downloads</option>
    <option value="Music"<?php if($searchindex=="Music") echo 'selected' ;  ?> >Music</option>
    <option value="MusicalInstruments"<?php if($searchindex=="MusicalInstruments") echo 'selected' ;  ?> >MusicalInstruments</option>
    <option value="MusicTracks"<?php if($searchindex=="MusicTracks") echo 'selected' ;  ?> >MusicTracks</option>
    <option value="OfficeProducts"<?php if($searchindex=="OfficeProducts") echo 'selected' ;  ?> >OfficeProducts</option>
    <option value="OutdoorLiving"<?php if($searchindex=="OutdoorLiving") echo 'selected' ;  ?> >OutdoorLiving</option>
    <option value="PCHardware"<?php if($searchindex=="PCHardware") echo 'selected' ;  ?> >PCHardware</option>
    <option value="PetSupplies"<?php if($searchindex=="PetSupplies") echo 'selected' ;  ?> >PetSupplies</option>
    <option value="Photo"<?php if($searchindex=="Photo") echo 'selected' ;  ?> >Photo</option>
    <option value="Shoes"<?php if($searchindex=="Shoes") echo 'selected' ;  ?> >Shoes</option>
    <option value="Software"<?php if($searchindex=="Software") echo 'selected' ;  ?> >Software</option>
    <option value="SportingGoods"<?php if($searchindex=="SportingGoods") echo 'selected' ;  ?> >SportingGoods</option>
    <option value="Tools"<?php if($searchindex=="Tools") echo 'selected' ;  ?> >Tools</option>
    <option value="Toys"<?php if($searchindex=="Toys") echo 'selected' ;  ?> >Toys</option>
    <option value="UnboxVideo"<?php if($searchindex=="UnboxVideo") echo 'selected' ;  ?> >UnboxVideo</option>
    <option value="VHS"<?php if($searchindex=="VHS") echo 'selected' ;  ?> >VHS</option>
    <option value="Video"<?php if($searchindex=="Video") echo 'selected' ;  ?> >Video</option>
    <option value="VideoGames"<?php if($searchindex=="VideoGames") echo 'selected' ;  ?> >VideoGames</option>
    <option value="Watches"<?php if($searchindex=="Watches") echo 'selected' ;  ?> >Watches</option>
    <option value="Wireless"<?php if($searchindex=="Wireless") echo 'selected' ;  ?> >Wireless</option>
    <option value="WirelessAccessories"<?php if($searchindex=="WirelessAccessories") echo 'selected' ;  ?> >WirelessAccessories</option>
</select>
<br /><br />
Keyword :<br />
<input type="text" class="widefat" name="keyword" value="<?php echo $keyword; ?>" />
<br /><br />
Location :<br />
<select  name="location">
	<option value="ca" <?php if($location=='ca') echo 'selected'; ?> >.ca</option>
	<option value="cn" <?php if($location=='cn') echo 'selected'; ?> >.cn</option>
	<option value="es" <?php if($location=='es') echo 'selected'; ?> >.es</option>
    <option value="fr" <?php if($location=='fr') echo 'selected'; ?> >.fr</option>
    <option value="in" <?php if($location=='in') echo 'selected'; ?> >.in</option>
    <option value="it" <?php if($location=='it') echo 'selected'; ?> >.it</option>
    <option value="co.jp" <?php if($location=='co.jp') echo 'selected'; ?> >.co.jp</option>
    <option value="co.uk" <?php if($location=='co.uk') echo 'selected'; ?> >.co.uk</option>
    <option value="com" <?php if($location=='com') echo 'selected'; ?> >.com</option>
</select>
<br /><br />
Count :<br />
<select  name="count">
	<?php
		for($i=1;$i<=10;$i++)
		{
			echo '<option value="'.$i.'" ';
			if($count==$i) echo ' selected';
			echo ' >'.$i.'</option>';	
		}
	?>
</select>
<br /><br />
<input type="hidden" name="submitted" value="1" />
<?php
}
function aapws_display($args=array(), $params=array()) 
{
	//load options
	$widgettitle = get_option('aapws_title');
	$count = get_option('aapws_count');
	if($widgettitle=='')
	{
	   $jdw = 'Hot trends';
	} else {
	   $jdw = $widgettitle;
	}
	//widget output
	echo stripslashes($args['before_widget']);
	echo stripslashes($args['before_title']);
	echo stripslashes($jdw);
	echo stripslashes($args['after_title']); ?>
	<?php
	$url = aapws_aws_request();
	//echo $url;
	$a	 = file_get_contents($url);
	$xml = new SimpleXmlElement($a, LIBXML_NOCDATA);
	echo "<ul>";
	if(isset($xml->Items)) 
	{
	  $cnt = count($xml->Items->Item);
	  for($i=0; $i<$cnt; $i++)
	  {
		   echo "<li>";
		   $detailurl = $xml->Items->Item[$i]->DetailPageURL;
		   $img = $xml->Items->Item[$i]->SmallImage->URL;
		   $title = $xml->Items->Item[$i]->ItemAttributes->Title;
		   $price = $xml->Items->Item[$i]->OfferSummary->LowestNewPrice->FormattedPrice;
		   $desc = $xml->Items->Item[$i]->EditorialReviews->EditorialReview->Content;
		   
		   echo '<div style="width:100%;"><p>';
		   echo '<img src="'.$img.'" align="left" rel="nofollow" title="'.$title.'" />';
		   echo '<a href="'.$detailurl.'" rel="nofollow" target="_blank" title="'.$title.'">'.substr($title,0,70).'...</a><br/>';
		   echo 'Price : '.$price.'<br/>';
		   echo strtolower(substr($desc,0,70)).'...<br/>';
		   echo '<a href="'.$detailurl.'" rel="nofollow" target="_blank" title="'.$title.'">more detail</a>';
		   echo "</p></div><div style='clear:both'></div></li>";
		   if($i == $count-1)
		   {
				break;   
		   }
	  }
	}
	echo '</ul>';
	?>
	<?php wp_reset_query(); ?>
	<?php echo stripslashes($args['after_widget']);
}
function aapws_aws_request() 
	{ 	
	  $tag_id = get_option('aapws_tag_id');
	  $pub_key = get_option('aapws_pub_key');
	  $priv_key = get_option('aapws_priv_key');
	  $searchindex = get_option('aapws_searchindex');
	  $keyword = get_option('aapws_keyword');
	  $location = get_option('aapws_location');
	  $params=array(
		'Operation'		  => 'ItemSearch',
		'Keywords'		  => $keyword ,
		'SearchIndex'	  => $searchindex          ,
		'AssociateTag'    => $tag_id,  //tag url
		'ResponseGroup'   => 'Medium'                ,  
	  );
	  $ext=$location;  //extension of server, see data.php
	  ksort($params);
      $method = "GET";
	  $host = "ecs.amazonaws.".$ext;
	  $uri = "/onca/xml";
	  $params["Service"] = "AWSECommerceService";
	  $params["AWSAccessKeyId"] = $pub_key;
	  $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z",time());  //may not be more than 15 minutes out of date!
	  $params["Version"] = "2009-03-31";
	  ksort($params);
	  $canonicalized_query = array();
	  foreach ($params as $param=>$value)
	  	{	
			$param = str_replace("%7E", "~", rawurlencode($param));
			$value = str_replace("%7E", "~", rawurlencode($value));
			$canonicalized_query[] = $param."=".$value;
		}
		$canonicalized_query = implode("&", $canonicalized_query);
		$string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;		
		$signature = base64_encode(hash_hmac("sha256", $string_to_sign, $priv_key, True));
		$signature = rawurlencode($signature);
		$request = "http://".$host.$uri."?".$canonicalized_query."&Signature=".$signature;
	    return $request;
	}

?>