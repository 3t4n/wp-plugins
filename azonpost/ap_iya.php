	<?php
global $wpdb;
$tabeljadwal = $wpdb->prefix . "jadwal_acara";
$jadwal = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . $tabeljadwal . " WHERE pin = %s", $dbpin) );
if (empty($jadwal)) { 
echo 'you knew, you have the wrong address..';
return false; 
}
foreach ($jadwal as $jadual){
	$aidi = $jadual->id;
	$dbsindex = $jadual->indekcari;
	$dbnodeid = $jadual->nodeid;
	$dbkategori = $jadual->kategori;
	$dbjudul = $jadual->judul;
	$dbtempletpos = $jadual->templetpos;
	$dbbacalagi = $jadual->bacalagi;
	//$dbtags = $jadual->tags;
	$katids = $jadual->katids;
	$sukses = $jadual->sukses;
	$gagal = $jadual->gagal;
}
			$dbumum = get_option('ap_dbumum');
			$dboraumum = get_option('ap_dboraumum');
			$dbasstag = get_option('ap_dbasstag');
			$arrayasstag = explode(' ', $dbasstag);
			$acakadutasstag = array_rand($arrayasstag);
			$associatetag = $arrayasstag[$acakadutasstag];  // <-----ass tag
			$dbwilayah = get_option('ap_dbwilayah');
			$dbtags = get_option('ap_radio_tags_opt');
			$dbprasetags = get_option('ap_prase_tags_opt');
			$dbmetaradio = get_option('ap_radio_des_opt');
			$dbkw = get_option('ap_radio_kw_opt');
			$dbprasekw = get_option('ap_prase_kw_opt');
			$pisah_nodeid = preg_split('/(\r?\n)+/', $dbnodeid);
			$ktid = explode('-', $katids);
			$gelas = array_rand($pisah_nodeid);
			$node_yg_terpilih = $pisah_nodeid[$gelas];
$kategori_hanya_untukmu = $ktid[$gelas];
//ACAK tentukan var sort brdasar SearchIndex
if ($dbwilayah == 'com')
{
	switch ($dbsindex)  //<---------us a.k.a .com.. yg laen kpn2 ajah.. klo smpet..
	{
	case "Apparel":
		$kumpulsort = array("relevancerank","salesrank","pricerank","inverseprice","-launch-date","sale-flag");
	break;
	case "Appliances":
		$kumpulsort = array("salesrank","pmrank","price","-price","relevancerank","reviewrank");
	break;
	case "ArtsAndCrafts":
		$kumpulsort = array("pmrank","price","-price","relevancerank","reviewrank");
	break;
	case "Automotive":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "Baby":
		$kumpulsort = array("psrank","salesrank","price","-price","titlerank");
	break;
	case "Beauty":
		$kumpulsort = array("pmrank","salesrank","price","-price","-launch-date","sale-flag");
	break;
	case "Books":
		$kumpulsort = array("relevancerank","salesrank","reviewrank","pricerank","inverse-pricerank","daterank","titlerank","-titlerank");
	break;
	case "Classical":
		$kumpulsort = array("psrank","salesrank","price","-price","titlerank","-titlerank","orig-rel-date","-orig-rel-date","releasedate","-releasedate");
	break;
	case "Collectibles":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "DigitalMusic":
		$kumpulsort = array("songtitlerank","uploaddaterank");
	break;
	case "DVD":
		$kumpulsort = array("relevancerank","salesrank","price","-price","titlerank","-video-release-date","releasedate");
	break;
	case "Electronics":
		$kumpulsort = array("pmrank","salesrank","reviewrank","price","-price","titlerank");
	break;
	case "Grocery":
		$kumpulsort = array("relevancerank","salesrank","pricerank","inverseprice","launch-date","sale-flag");
	break;
	case "HealthPersonalCare":
		$kumpulsort = array("pmrank","salesrank","pricerank","inverseprice","launch-date","sale-flag");
	break;
	case "HomeImprovement":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "Industrial":
		$kumpulsort = array("pmrank","salesrank","price","-price","titlerank","-titlerank");
	break;
	case "Jewelry":
		$kumpulsort = array("pmrank","salesrank","pricerank","inverseprice","launch-date");
	break;
	case "KindleStore":
		$kumpulsort = array("daterank","-edition-sales-velocity","price","-price","relevancerank","reviewrank");
	break;
	case "Kitchen":
		$kumpulsort = array("pmrank","salesrank","price","-price","titlerank","-titlerank");
	break;
	case "LawnAndGarden":
		$kumpulsort = array("relevancerank","reviewrank","salesrank","price","-price");
	break;
	case "Magazines":
		$kumpulsort = array("subslot-salesrank","reviewrank","price","-price","daterank","titlerank","-titlerank");
	break;
	case "Marketplace":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank","-launch-date");
	break;
	case "Merchants":
		$kumpulsort = array("relevancerank","salesrank","pricerank","inverseprice","-launch-date","sale-flag");
	break;
	case "Miscellaneous":
		$kumpulsort = array("pmrank","salesrank","price","-price","titlerank","-titlerank");
	break;
	case "MobileApps":
		$kumpulsort = array("pmrank","price","-price","relevancerank","reviewrank");
	break;
	case "MP3Downloads":
		$kumpulsort = array("price","-price","-releasedate","relevancerank","salesrank");
	break;
	case "Music":
		$kumpulsort = array("psrank","salesrank","price","-price","titlerank","-titlerank","artistrank","orig-rel-date","release-date","releasedate","-releasedate","relevancerank");
	break;
	case "MusicalInstruments":
		$kumpulsort = array("pmrank","salesrank","price","-price","-launch-date","sale-flag");
	break;
	case "MusicTracks":
		$kumpulsort = array("titlerank","-titlerank");
	break;
	case "OfficeProducts":
		$kumpulsort = array("pmrank","salesrank","reviewrank","price","-price","titlerank");
	break;
	case "OutdoorLiving":
		$kumpulsort = array("psrank","salesrank","price","-price","titlerank","-titlerank");
	break;
	case "PCHardware":
		$kumpulsort = array("psrank","salesrank","price","-price","titlerank");
	break;
	case "PetSupplies":
		$kumpulsort = array("+pmrank","salesrank","price","-price","titlerank","-titlerank","relevancerank","reviewrank");
	break;
	case "Photo":
		$kumpulsort = array("pmrank","salesrank","price","-price","titlerank","-titlerank");
	break;
	case "Shoes":
		$kumpulsort = array("-launch-date","pmrank","price","-price","xsrelevancerank","reviewrank");
	break;
	case "Software":
		$kumpulsort = array("pmrank","salesrank","price","-price","titlerank");
	break;
	case "SportingGoods":
		$kumpulsort = array("relevancerank","salesrank","pricerank","inverseprice","launch-date","sale-flag");
	break;
	case "Tools":
		$kumpulsort = array("pmrank","salesrank","price","-price","titlerank","-titlerank");
	break;
	case "Toys":
		$kumpulsort = array("pmrank","salesrank","price","-price","titlerank","-age-min");
	break;
	case "UnboxVideo":
		$kumpulsort = array("relevancerank","salesrank","price","-price","titlerank","-video-release-date");
	break;
	case "VHS":
		$kumpulsort = array("relevancerank","salesrank","price","-price","titlerank","-video-release-date","-releasedate");
	break;
	case "Video":
		$kumpulsort = array("relevancerank","salesrank","price","-price","titlerank","-video-release-date","-releasedate");
	break;
	case "VideoGames":
		$kumpulsort = array("pmrank","salesrank","price","-price","titlerank");
	break;
	case "Watches":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "Wireless":
		$kumpulsort = array("daterank","pricerank","inverse-pricerank","reviewrank","salesrank","titlerank","-titlerank");
	break;
	case "WirelessAccessories":
		$kumpulsort = array("psrank","salesrank","titlerank","-titlerank");
	break;
	default:
		$sort = "salesrank";
	}
}
if ($dbwilayah == 'ca')
{
	switch ($dbsindex) 
	{
	case "Baby":
		$kumpulsort = array("salesrank","relevancerank","price","-price","reviewrank");
	break;
	case "Books":
		$kumpulsort = array("salesrank","pricerank","inverse-pricerank","daterank","titlerank");
	break;
	case "Classical":
		$kumpulsort = array("salesrank","titlerank","orig-rel-date");
	break;
	case "DVD":
		$kumpulsort = array("salesrank","titlerank");
	break;
	case "Electronics":
		$kumpulsort = array("salesrank","relevancerank","price","-price","titlerank","-titlerank");
	break;
	case "ForeignBooks":
		$kumpulsort = array("salesrank","pricerank","inverse-pricerank","daterank","titlerank");
	break;
	case "Kitchen":
		$kumpulsort = array("salesrank","relevancerank","price","-price","reviewrank");
	break;
	case "Music":
		$kumpulsort = array("salesrank","titlerank","orig-rel-date");
	break;
	case "Software":
		$kumpulsort = array("salesrank","pricerank","inverse-pricerank","titlerank","-daterank");
	break;
	case "SoftwareVideoGames":
		$kumpulsort = array("salesrank","pricerank","inverse-pricerank","titlerank","-daterank");
	break;
	case "VHS":
		$kumpulsort = array("salesrank","-titlerank");
	break;
	case "Video":
		$kumpulsort = array("salesrank","titlerank","-titlerank");
	break;
	case "VideoGames":
		$kumpulsort = array("salesrank","pricerank","inverse-pricerank","titlerank","-titlerank");
	break;
	default:
		$sort = "salesrank";
	}
}
if ($dbwilayah == 'cn')
{
	switch ($dbsindex) 
	{
	case "Apparel":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank","-launchdate");
	break;
	case "Appliances":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank","-launchdate");
	break;
	case "Automotive":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank","-launchdate");
	break;
	case "Baby":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "Beauty":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "Books":
		$kumpulsort = array("salesrank","pricerank","-pricerank","daterank","titlerank","-titlerank","reviewrank");
	break;
	case "Electronics":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank","release-date","-release-date");
	break;
	case "Grocery":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "HealthPersonalCare":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank","release-date","-release-date");
	break;
	case "HomeGarden":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "HomeImprovement":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "Jewelry":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "Misc":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank","-launch-date");
	break;
	case "Music":
		$kumpulsort = array("relevancerank","salesrank","price","-price","titlerank","-titlerank","orig-rel-date","-orig-rel-date");
	break;
	case "OfficeProducts":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "Photo":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank","-launchdate");
	break;
	case "Shoes":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank","-launch-date");
	break;
	case "Software":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank","releasedate","-releasedate");
	break;
	case "SportingGoods":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank","releasedate","-releasedate");
	break;
	case "Toys":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank","releasedate","-releasedate","reviewrank");
	break;
	case "Video":
		$kumpulsort = array("salesrank","pricerank","-pricerank","titlerank","-titlerank","orig-rel-date","-orig-rel-date");
	break;
	case "VideoGames":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank","releasedate","-releasedate");
	break;
	case "Watches":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	default:
		$sort = "salesrank";
	}
}
if ($dbwilayah == 'de')
{
	switch ($dbsindex) 
	{
	case "Apparel":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "Automotive":
		$kumpulsort = array("salesrank","price","-price","reviewrank");
	break;
	case "Baby":
		$kumpulsort = array("price","-price","relevancerank","salesrank");
	break;
	case "Beauty":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "Books":
		$kumpulsort = array("salesrank","reviewrank","pricerank","inverse-pricerank","titlerank","-titlerank");
	break;
	case "Classical":
		$kumpulsort = array("salesrank","price","-price","pubdate","-pubdate","publication_date","-publication_date","titlerank","-titlerank");
	break;
	case "DVD":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "Electronics":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "ForeignBooks":
		$kumpulsort = array("salesrank","reviewrank","pricerank","inverse-pricerank","titlerank","-titlerank");
	break;
	case "Grocery":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "HealthPersonalCare":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "HomeGarden":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "HomeImprovement":
		$kumpulsort = array("price","-price","reviewrank","salesrank");
	break;
	case "Jewelry":
		$kumpulsort = array("salesrank","price","-price","relevancerank","reviewrank");
	break;
	case "KindleStore":
		$kumpulsort = array("relevancerank","-edition-sales-velocity","price","-price","reviewrank","daterank","salesrank");
	break;
	case "Kitchen":
		$kumpulsort = array("price","-price","relevancerank","salesrank");
	break;
	case "Magazines":
		$kumpulsort = array("salesrank","titlerank","-titlerank");
	break;
	case "Lighting":
		$kumpulsort = array("salesrank","price","-price","relevancerank","reviewrank");
	break;
	case "Marketplace":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank","-launch-date");
	break;
	case "MP3Downloads":
		$kumpulsort = array("salesrank","relevancerank","reviewrank","price","-price","artistalbumrank","-artistalbumrank","albumrank","-albumrank","runtime","-runtime","-releasedate","titlerank","-titlerank");
	break;
	case "Music":
		$kumpulsort = array("salesrank","price","-price","pubdate","-pubdate","publicationdate","-publicationdate","releasedate","-releasedate","titlerank","-titlerank");
	break;
	case "MusicalInstruments":
		$kumpulsort = array("reviewrank","salesrank","price","-price","relevancerank");
	break;
	case "MusicTracks":
		$kumpulsort = array("titlerank","-titlerank");
	break;
	case "OfficeProducts":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "OutdoorLiving":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "PCHardware":
		$kumpulsort = array("psrank","salesrank","price","-price","titlerank","reviewrank");
	break;
	case "Photo":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "Shoes":
		$kumpulsort = array("-launch-date","-price","price","relevancerank","salesrank","reviewrank");
	break;
	case "Software":
		$kumpulsort = array("price","-price","salesrank","-date","titlerank","-titlerank");
	break;
	case "SportingGoods":
		$kumpulsort = array("price","-price","salesrank","titlerank","-titlerank","release-date","-release-date");
	break;
	case "SoftwareVideoGames":
		$kumpulsort = array("salesrank","reviewrank","price","inverse-pricerank","-date","titlerank","-titlerank");
	break;
	case "Tools":
		$kumpulsort = array("salesrank","price","-pricerank","titlerank","-titlerank");
	break;
	case "Toys":
		$kumpulsort = array("pmrank","salesrank","price","-price","-date","titlerank");
	break;
	case "VHS":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "Video":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	case "VideoGames":
		$kumpulsort = array("price","-price","salesrank","-date","titlerank","-titlerank");
	break;
	case "Watches":
		$kumpulsort = array("salesrank","-price","price","titlerank","-titlerank");
	break;
	default:
		$sort = "salesrank";
	}
}
if ($dbwilayah == 'es')
{
	switch ($dbsindex) 
	{
	case "Books":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank","reviewrank_authority","-pubdate","-publicationdate");
	break;
	case "DVD":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank","reviewrank_authority","-releasedate");
	break;
	case "Electronics":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank","reviewrank_authority");
	break;
	case "ForeignBooks":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank","reviewrank_authority","-pubdate","-publicationdate");
	break;
	case "KindleStore":
		$kumpulsort = array("price","-price","relevancerank","-edition-sales-velocity","reviewrank","daterank","salesrank");
	break;
	case "Kitchen":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank","reviewrank_authority");
	break;
	case "Music":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank","reviewrank_authority","-releasedate");
	break;
	case "Software":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank","reviewrank_authority","-releasedate");
	break;
	case "Toys":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank","reviewrank_authority");
	break;
	case "VideoGames":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank","reviewrank_authority","-releasedate");
	break;
	case "Watches":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank","reviewrank_authority");
	break;
	default:
		$sort = "salesrank";
	}
}
if ($dbwilayah == 'fr')
{
	switch ($dbsindex) 
	{
	case "Apparel":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "Baby":
		$kumpulsort = array("relevancerank","price","-price","salesrank");
	break;
	case "Beauty":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "Books":
		$kumpulsort = array("salesrank","pricerank","inverse-pricerank","-daterank","titlerank","-titlerank");
	break;
	case "Classical":
		$kumpulsort = array("salesrank","pricerank","price","inverse-pricerank","-price","titlerank","-titlerank");
	break;
	case "DVD":
		$kumpulsort = array("amzrank","availability","salesrank","titlerank","-titlerank");
	break;
	case "Electronics":
		$kumpulsort = array("price","-price","titlerank","salesrank","-titlerank");
	break;
	case "ForeignBooks":
		$kumpulsort = array("salesrank","pricerank","inverse-pricerank","-daterank","titlerank","-titlerank");
	break;
	case "HealthPersonalCare":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "HomeImprovement":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank");
	break;
	case "Jewelry":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "KindleStore":
		$kumpulsort = array("relevancerank","-edition-sales-velocity","price","-price","reviewrank","daterank","salesrank");
	break;
	case "Kitchen":
		$kumpulsort = array("price","-price","relevancerank","salesrank");
	break;
	case "Lighting":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank");
	break;
	case "MP3Downloads":
		$kumpulsort = array("albumrank","-albumrank","artistalbumrank","-artistalbumrank","price","-price","runtime","-runtime","-releasedate","relevancerank","reviewrank","salesrank","titlerank","-titlerank");
	break;
	case "Music":
		$kumpulsort = array("releasedate","-releasedate","salesrank","pricerank","inverse-pricerank","price","-price","titlerank","-titlerank");
	break;
	case "MusicalInstruments":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "MusicTracks":
		$kumpulsort = array("titlerank","-titlerank");
	break;
	case "OfficeProducts":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "Shoes":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "PCHardware":
		$kumpulsort = array("price","-price","psrank","titlerank","salesrank");
	break;
	case "Software":
		$kumpulsort = array("salesrank","price","-pricerank","titlerank","-titlerank");
	break;
	case "SoftwareVideoGames":
		$kumpulsort = array("salesrank","price","-pricerank","titlerank","-titlerank","-date");
	break;
	case "SportingGoods":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank","-launch-date");
	break;
	case "VHS":
		$kumpulsort = array("amzrank","availability","salesrank","titlerank","-titlerank");
	break;
	case "Video":
		$kumpulsort = array("titlerank","price","-price","salesrank","-titlerank");
	break;
	case "VideoGames":
		$kumpulsort = array("price","-price","date","salesrank","titlerank","-titlerank");
	break;
	case "Watches":
		$kumpulsort = array("price","-price","salesrank","relevancerank","reviewrank");
	break;
	default:
		$sort = "salesrank";
	}
}
if ($dbwilayah == 'it')
{
	switch ($dbsindex) 
	{
	case "Baby":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "Books":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank","-pubdate");
	break;
	case "DVD":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank","-releasedate");
	break;
	case "Electronics":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "ForeignBooks":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank","-pubdate");
	break;
	case "HomeGarden":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank");
	break;
	case "KindleStore":
		$kumpulsort = array("price","-price","relevancerank","-edition-sales-velocity","reviewrank","daterank","salesrank");
	break;
	case "Kitchen":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank");
	break;
	case "Lighting":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "Music":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank","-releasedate");
	break;
	case "Shoes":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank","-releasedate");
	break;
	case "Software":
		$kumpulsort = array("relevancerank","salesrank","price","-price","reviewrank","-releasedate");
	break;
	case "Toys":
		$kumpulsort = array("price","-price","relevancerank","reviewrank","salesrank");
	break;
	case "VideoGames":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank","-releasedate");
	break;
	case "Watches":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	default:
		$sort = "salesrank";
	}
}
if ($dbwilayah == 'jp')
{
	switch ($dbsindex) 
	{
	case "Apparel":
		$kumpulsort = array("price","-price","relevancerank","salesrank");
	break;
	case "Appliances":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank");
	break;
	case "Automotive":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "Baby":
		$kumpulsort = array("psrank","salesrank","price","-price","titlerank");
	break;
	case "Beauty":
		$kumpulsort = array("price","-price","relevancerank","reviewrank");
	break;
	case "Books":
		$kumpulsort = array("salesrank","pricerank","inverse-pricerank","daterank","titlerank","-titlerank");
	break;
	case "Classical":
		$kumpulsort = array("price","-price","pricerank","salesrank","-pricerank","titlerank","-titlerank","-orig-rel-date","orig-rel-date","releasedate","-releasedate");
	break;
	case "DVD":
		$kumpulsort = array("salesrank","pricerank","-pricerank","price","-price","titlerank","-titlerank","-orig-rel-date","orig-rel-date","releasedate","-releasedate");
	break;
	case "Electronics":
		$kumpulsort = array("price","-price","titlerank","salesrank","-titlerank","-releasedate","releasedate");
	break;
	case "ForeignBooks":
		$kumpulsort = array("salesrank","pricerank","inverse-pricerank","daterank","titlerank","-titlerank");
	break;
	case "Grocery":
		$kumpulsort = array("salesrank","-price","price","reviewrank");
	break;
	case "HealthPersonalCare":
		$kumpulsort = array("titlerank","salesrank","price","-price","-titlerank");
	break;
	case "Hobbies":
		$kumpulsort = array("price","-price","titlerank","salesrank","-titlerank","release-date","-release-date","mfg-age-min","-mfg-age-min");
	break;
	case "HomeImprovement":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank");
	break;
	case "Jewelry":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "Kitchen":
		$kumpulsort = array("titlerank","salesrank","price","-price","-titlerank","-release-date","release-date","releasedate","-releasedate");
	break;
	case "Marketplace":
		$kumpulsort = array("price","-price","titlerank","salesrank","-titlerank","-launch-date");
	break;
	case "MP3Downloads":
		$kumpulsort = array("relevancerank","salesrank","titlerank","-titlerank","artistalbumrank","-artistalbumrank","albumrank","-albumrank","-runtime","runtime","price","-price","price-new-bin","-price-new-bin","reviewrank_authority","-releank","releasedate");
	break;
	case "Music":
		$kumpulsort = array("salesrank","pricerank","-pricerank","price","-price","titlerank","-titlerank","-orig-rel-date","orig-rel-date","releasedate","-releasedate");
	break;
	case "MusicalInstruments":
		$kumpulsort = array("reviewrank","salesrank","price","-price","relevancerank");
	break;
	case "MusicTracks":
		$kumpulsort = array("titlerank","-titlerank");
	break;
	case "OfficeProducts":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank");
	break;
	case "Shoes":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "Software":
		$kumpulsort = array("salesrank","titlerank","price","-price","-titlerank","-release-date","release-date","releasedate","-releasedate");
	break;
	case "SportingGoods":
		$kumpulsort = array("price","-price","titlerank","salesrank","-titlerank","releasedate","-releasedate");
	break;
	case "Toys":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank","-release-date","release-date","releasedate","-releasedate");
	break;
	case "VHS":
		$kumpulsort = array("price","-price","salesrank","pricerank","-pricerank","titlerank","-titlerank","-orig-rel-date","orig-rel-date","releasedate","-releasedate");
	break;
	case "Video":
		$kumpulsort = array("salesrank","pricerank","price","-price","-pricerank","titlerank","-titlerank","-orig-rel-date","orig-rel-date","releasedate","-releasedate");
	break;
	case "VideoGames":
		$kumpulsort = array("price","-price","salesrank","titlerank","-titlerank","-release-date","release-date","releasedate","-releasedate");
	break;
	case "Watches":
		$kumpulsort = array("salesrank","price","-price","titlerank","-titlerank");
	break;
	default:
		$sort = "salesrank";
	}
}
if ($dbwilayah == 'uk')
{
	switch ($dbsindex) 
	{
	case "Apparel":
		$kumpulsort = array("price","-price","-launch-date","relevancerank","salesrank","reviewrank");
	break;
	case "Automotive":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank");
	break;
	case "Baby":
		$kumpulsort = array("price","-price","relevancerank","salesrank");
	break;
	case "Beauty":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "Books":
		$kumpulsort = array("salesrank","reviewrank","pricerank","inverse-pricerank","daterank","pubdate","titlerank","-titlerank");
	break;
	case "Classical":
		$kumpulsort = array("price","-price","reviewrank","salesrank","inverse-pricerank","titlerank","-titlerank");
	break;
	case "DVD":
		$kumpulsort = array("price","-price","salesrank","reviewrank","inverse-pricerank","daterank","releasedate","titlerank","-titlerank");
	break;
	case "Electronics":
		$kumpulsort = array("salesrank","reviewrank","price","inverse-pricerank","daterank","titlerank","-titlerank");
	break;
	case "Grocery":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "HealthPersonalCare":
		$kumpulsort = array("price","-price","daterank","salesrank","reviewrank","titlerank","-titlerank");
	break;
	case "HomeGarden":
		$kumpulsort = array("price","-price","daterank","titlerank","salesrank","reviewrank","-titlerank");
	break;
	case "HomeImprovement":
		$kumpulsort = array("price","-price","salesrank","reviewrank");
	break;
	case "Jewelry":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "KindleStore":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank","-edition-sales-velocity","daterank");
	break;
	case "Kitchen":
		$kumpulsort = array("price","-price","titlerank","salesrank","reviewrank","-titlerank","daterank");
	break;
	case "Lighting":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "Marketplace":
		$kumpulsort = array("titlerank","price","-price","salesrank","-titlerank","-launch-date");
	break;
	case "MP3Downloads":
		$kumpulsort = array("price","-price","relevancerank","salesrank","-releasedate","reviewrank");
	break;
	case "Music":
		$kumpulsort = array("price","-price","releasedate","salesrank","reviewrank","-releasedate","inverse-pricerank","titlerank","-titlerank");
	break;
	case "MusicalInstruments":
		$kumpulsort = array("price","-price","relevancerank","salesrank","reviewrank");
	break;
	case "MusicTracks":
		$kumpulsort = array("titlerank","-titlerank");
	break;
	case "OfficeProducts":
		$kumpulsort = array("relevancerank","price","-price","salesrank","reviewrank");
	break;
	case "OutdoorLiving":
		$kumpulsort = array("price","-price","daterank","salesrank","reviewrank","titlerank","-titlerank");
	break;
	case "PCHardware":
		$kumpulsort = array("price","-price","psrank","salesrank","titlerank");
	break;
	case "Shoes":
		$kumpulsort = array("price","-price","-launch-date","relevancerank","salesrank","reviewrank");
	break;
	case "Software":
		$kumpulsort = array("daterank","price","inverse-pricerank","salesrank","reviewrank","titlerank","-titlerank");
	break;
	case "SoftwareVideoGames":
		$kumpulsort = array("daterank","price","inverse-pricerank","salesrank","reviewrank","titlerank","-titlerank");
	break;
	case "Toys":
		$kumpulsort = array("price","-price","-mfg-age-min","salesrank","mfg-age-min");
	break;
	case "VHS":
		$kumpulsort = array("price","-price","inverse-pricerank","daterank","salesrank","reviewrank","releasedate","titlerank","-titlerank");
	break;
	case "Video":
		$kumpulsort = array("price","-price","inverse-pricerank","daterank","salesrank","reviewrank","releasedate","titlerank","-titlerank");
	break;
	case "VideoGames":
		$kumpulsort = array("reviewrank","price","inverse-pricerank","salesrank","daterank","titlerank","-titlerank");
	break;
	case "Watches":
		$kumpulsort = array("price","-price","relevancerank","salesrank","-launch-date","titlerank","-titlerank");
	break;
	default:
		$sort = "salesrank";
	}
}
$pilihsort = array_rand($kumpulsort);
$sort = $kumpulsort[$pilihsort];
//MENCARI DAN ACAK ASIN beserta halaman tentunya
// if ($dbnodeid != '' and $dbkategori != '')
	$totalhal = array("Operation"=>"ItemSearch","AssociateTag"=>$associatetag,"SearchIndex"=>$dbsindex,"Sort"=>$sort,"Keywords"=>"","BrowseNode"=>$node_yg_terpilih,"MerchantId"=>"All",
		"IncludeReviewsSummary"=>"False","ResponseGroup"=>"Small"
		);
	$jamu = ijin_minta_masuk($totalhal);
    if ($jamu === False)
    {
		update_option('ap_maxload', '0');		
        $gagal_maning = $gagal + 1; 
		$wpdb->update( $tabeljadwal, array ( 'gagal' => $gagal_maning ), array ( 'id' => $aidi ), array( '%s' ), array( '%d' ) );
		echo "emmm.. something goes wrong. Connenction refuse. Can not make a request, please check your Amazon API settings.\n";
    }
    else
    {
        if (isset($jamu->Items->Item->ItemAttributes->Title) && get_option('ap_maxload') < 3)
        {
			$halamantotal = $jamu->Items->TotalPages;
			$halamantotal = (int)$halamantotal;
			// ==================YUUK MAREEE===============
			if ($halamantotal == '')
			{
				$itung = get_option('ap_maxload') + 1;
				update_option('ap_maxload', $itung);
		// RELOAD MANING
				load_url();
				exit;
			}elseif ($halamantotal > 10)
			{// halamatotal g k baca=======> edit mning
				$halaman = mt_rand(1,10);
			}else{
				$halaman = mt_rand(1,$halamantotal);
			}
		// REKUES ASIN BARU
			$asinboss = golekasin($halaman,$sort);
			global $wpdb;
			$tabelasin = $wpdb->prefix . "daftarasin";
			$daftarasin = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM " . $tabelasin . " WHERE nama = %s", $asinboss) );
		
			if ($daftarasin == '')
			{
			// ASIN LOM AD D DAFTAR N LGSG REKUES ITEM ASIN N POS
				$masukin_dunk = pos_asin($asinboss);
				if ($masukin_dunk != 0){
				$tambah_satu = $sukses + 1; 
				$wpdb->update( $tabeljadwal, array ( 'sukses' => $tambah_satu ), array ( 'id' => $aidi ), array( '%s' ), array( '%d' ) );
				$wpdb->insert( $tabelasin, array( 'nama' => $asinboss ), array( '%s' ) );
				}else{
				$gagal_maning = $gagal + 1; 
				$wpdb->update( $tabeljadwal, array ( 'gagal' => $gagal_maning ), array ( 'id' => $aidi ), array( '%s' ), array( '%d' ) );
				}				
			}else{
				//echo '----------------------->   asin UDAH ad d daptar, GAK JADI Nulis bos..   <----------------------<br />';
				$itung = get_option('ap_maxload') + 1;
				update_option('ap_maxload', $itung);		
				load_url();
				exit;
			}
	
        }else{
			update_option('ap_maxload', '0');		
			if (isset($jamu->Items->Request->Errors->Error))
			{
				echo "<br />pesan sponsor: <b>";
				echo $jamu->Items->Request->Errors->Error->Message;
			}
				$gagal_maning = $gagal + 1; 
				$wpdb->update( $tabeljadwal, array ( 'gagal' => $gagal_maning ), array ( 'id' => $aidi ), array( '%s' ), array( '%d' ) );
				echo "</b><br />uda 3 x nyari g dapet2.. istirohat dolo.\n";
        }
    }
	
// ========================GOLEK HALAMAN END======================

function ijin_minta_masuk($uborampe)
{
	global $dbwilayah, $dbumum, $dboraumum;
    // setting jam kunjungan
	$h = "12";         // Default value is 0, if your server time doesn't match with amazon's, change this value. e.g. +12 or -7 or whatever u like,
	$hm = $h * 60;
	$ms = $hm * 60;
	$kunjungan = gmdate("Y-m-d\TH:i:s\Z", time()+($ms));	//  and then just change to the + or -
	// berkunjung a.k.a  mbah azon
	$ketok_pintu = "GET";
    $empu = "ecs.amazonaws.".$dbwilayah;
    $jenis_permintaan = "/onca/xml";
    // uborampe kumpul dolo
    $uborampe["Service"] = "AWSECommerceService";
    $uborampe["AWSAccessKeyId"] = $dbumum;
	$uborampe["Timestamp"] = $kunjungan;
    $uborampe["Version"] = "2011-08-01";
    // uborampe gabung
    ksort($uborampe);
    // bikin pertanyaan berantai
    $pertanyaan_berantai = array();
    foreach ($uborampe as $ubo=>$rampe)
    {
        $ubo = str_replace("%7E", "~", rawurlencode($ubo));
        $rampe = str_replace("%7E", "~", rawurlencode($rampe));
        $pertanyaan_berantai[] = $ubo."=".$rampe;
    }
    $pertanyaan_berantai = implode("&", $pertanyaan_berantai);
    // bikin mantra ijin masuk buat surat masuk
    $mantra_ijin_masuk = $ketok_pintu."\n".$empu."\n".$jenis_permintaan."\n".$pertanyaan_berantai;
    // bikin surat masuk
    $surat_masuk = base64_encode(hash_hmac("sha256", $mantra_ijin_masuk, $dboraumum, True));
    // encode surat masuk buat minta-minta
    $surat_masuk = str_replace("%7E", "~", rawurlencode($surat_masuk));
    // bikin permintaan
    $minta = "http://".$empu.$jenis_permintaan."?".$pertanyaan_berantai."&Signature=".$surat_masuk;
    $tanggapan = @file_get_contents($minta);
    
    if ($tanggapan === False)
    {
        return False;
    }
    else
    {
        $jamu = simplexml_load_string($tanggapan);
        if ($jamu === False)
        {
            return False; // g dapet jamu
        }
        else
        {
            return $jamu;
        }
    }
}
// =====================GOLEK ASIN START======================
function golekasin($halaman,$sort)
{
	global $associatetag, $dbsindex, $node_yg_terpilih;
	$golekitem = array(
		"Operation"=>"ItemSearch",
		"AssociateTag"=>$associatetag,
		"SearchIndex"=>$dbsindex,  
		"Keywords"=>"",
		"Sort"=>$sort, 
		"BrowseNode"=>$node_yg_terpilih,
		"MerchantId"=>"All",
		"ItemPage"=>$halaman, 
		"IncludeReviewsSummary"=>"False",
		"ResponseGroup"=>"Small"
		);
	$jamu = ijin_minta_masuk($golekitem);
    if ($jamu === False)
    {
        echo "nihil\n";
    }
    else
    {
        if (isset($jamu->Items->Item->ItemAttributes->Title))
        {
			$desc = "";					
					if (isset($jamu->Items->Item)) {
						foreach($jamu->Items->Item as $descs) {
							$desc[] .= $descs->ASIN;
						}		
					}
					$acakasin2 = array_rand($desc);
					$asinacak2 = $desc[$acakasin2];
		}
        else
        {
            echo "gagal maning.\n";
        }
    }
	return $asinacak2;
}
// ==================GOLEK ASIN END==============================

// ================DETAIL ITEM N POSTING START================================
function pos_asin($asinboss)
{
	global $associatetag, $kategori_hanya_untukmu, $dbtempletpos, $dbjudul, $dbbacalagi, $dbtags ,$dbprasetags, $dbmetaradio, $dbkw, $dbprasekw;
	$asin = array("Operation"=>"ItemLookup","ItemId"=>$asinboss,"TruncateReviewsAt"=>"377","ResponseGroup"=>"Large","AssociateTag"=>$associatetag);
	$jamu = ijin_minta_masuk($asin);
    if ($jamu === False)
    {
        echo "ketoke g jalan.\n";
    }
    else
    {
        if (isset($jamu->Items->Item->ItemAttributes->Title))
        {
			$judul = $jamu->Items->Item->ItemAttributes->Title;
			$kecut = $jamu->Items->Item->ASIN;
			$gambarcilik = $jamu->Items->Item->SmallImage->URL;
			$gambarsedeng = $jamu->Items->Item->MediumImage->URL;
			$gambargede = $jamu->Items->Item->LargeImage->URL;
			$merek = $jamu->Items->Item->ItemAttributes->Brand;
			$brand = $jamu->Items->Item->ItemAttributes->Brand;
			$rego = $jamu->Items->Item->ItemAttributes->ListPrice->FormattedPrice;
			$price = $jamu->Items->Item->ItemAttributes->ListPrice->FormattedPrice;
			$lowprice = $jamu->Items->Item->OfferSummary->LowestNewPrice->FormattedPrice;
			$offerprice = $jamu->Items->Item->Offers->Offer->OfferListing->Price->FormattedPrice;
			$features = "";
					if (isset($jamu->Items->Item->ItemAttributes->Feature)) {	
						$features = "<ul>";
						foreach($jamu->Items->Item->ItemAttributes->Feature as $feature) {
							$posx = strpos($feature, "href=");
							if ($posx === false) {
								$features .= "<li>".$feature."</li>";		
							}
						}	
						$features .= "</ul><br>";				
					}
			$fitur = balanceTags($features);
			$desc = "";					
					if (isset($jamu->Items->Item->EditorialReviews->EditorialReview)) {
						foreach($jamu->Items->Item->EditorialReviews->EditorialReview as $descs) {
							$desc .= $descs->Content;
						}		
					}
			$keterngan = $desc;
			$keterngan = strip_tags($keterngan, '<p><ul><li>');// buang seng ra penting
			$link = $jamu->Items->Item->DetailPageURL;
			$refiu = $jamu->Items->Item->CustomerReviews->IFrameURL;
        }
        else
        {
            echo "Could not find item.\n";
        }
    }
	$titel = str_replace("^title^", $judul, $dbjudul);
	$titel = str_replace("^asin^", $kecut, $titel);
	$judul = htmlentities($judul, ENT_QUOTES);
	$beli = 'Buy Now';
	$dbtempletpos = str_replace("^title^", $judul, $dbtempletpos);
	$dbtempletpos = str_replace("^asin^", $kecut, $dbtempletpos);
	$dbtempletpos = str_replace("^url^", $link, $dbtempletpos);
	$dbtempletpos = str_replace("^simgurl^", $gambarcilik, $dbtempletpos);
	$dbtempletpos = str_replace("^mimgurl^", $gambarsedeng, $dbtempletpos);
	$dbtempletpos = str_replace("^limgurl^", $gambargede, $dbtempletpos);
	$dbtempletpos = str_replace("^simage^", '<img src="' . $gambarcilik . '" />', $dbtempletpos);
	$dbtempletpos = str_replace("^mimage^", '<img src="' . $gambarsedeng . '" />', $dbtempletpos);
	$dbtempletpos = str_replace("^limage^", '<img src="' . $gambargede . '" />', $dbtempletpos);
	$dbtempletpos = str_replace("^simagel^", '<a href="' . $link . '" rel="nofollow"><img src="' . $gambarcilik . '" /></a>', $dbtempletpos);
	$dbtempletpos = str_replace("^mimagel^", '<a href="' . $link . '" rel="nofollow"><img src="' . $gambarsedeng . '"></a>', $dbtempletpos);
	$dbtempletpos = str_replace("^limagel^", '<a href="' . $link . '" rel="nofollow"><img src="' . $gambargede . '" /></a>', $dbtempletpos);
	$dbtempletpos = str_replace("^brand^", $brand, $dbtempletpos);
	$dbtempletpos = str_replace("^price^", $price, $dbtempletpos);
	$dbtempletpos = str_replace("^lowprice^", $lowprice, $dbtempletpos);
	$dbtempletpos = str_replace("^offerprice^", $offerprice, $dbtempletpos);
	$dbtempletpos = str_replace("^buy^", $beli, $dbtempletpos);
	$dbtempletpos = str_replace("^ybuys^", '<a href="' . $link . '" rel="nofollow"><img src="' . plugins_url( 'gambar/yellow-buy-small.gif', __FILE__  ) . '" /></a>', $dbtempletpos);		
	$dbtempletpos = str_replace("^ybuym^", '<a href="' . $link . '" rel="nofollow"><img src="' . plugins_url( 'gambar/yellow-buy-medium.gif', __FILE__  ) . '" /></a>', $dbtempletpos);		
	$dbtempletpos = str_replace("^ybuyl^", '<a href="' . $link . '" rel="nofollow"><img src="' . plugins_url( 'gambar/yellow-buy-big.gif', __FILE__  ) . '" /></a>', $dbtempletpos);		
	$dbtempletpos = str_replace("^wbuys^", '<a href="' . $link . '" rel="nofollow"><img src="' . plugins_url( 'gambar/white-buy-small.gif', __FILE__  ) . '" /></a>', $dbtempletpos);		
	$dbtempletpos = str_replace("^wbuym^", '<a href="' . $link . '" rel="nofollow"><img src="' . plugins_url( 'gambar/white-buy-medium.gif', __FILE__  ) . '" /></a>', $dbtempletpos);		
	$dbtempletpos = str_replace("^wbuyl^", '<a href="' . $link . '" rel="nofollow"><img src="' . plugins_url( 'gambar/white-buy-big.gif', __FILE__  ) . '" /></a>', $dbtempletpos);		
	$dbtempletpos = str_replace("^features^", $fitur, $dbtempletpos);
	$dbtempletpos = str_replace("^description^", $keterngan, $dbtempletpos);
	$dbtempletpos = str_replace("^content^", $deskrip, $dbtempletpos);
	$dbtempletpos = str_replace("^fbcomments^", '<!--fbkotakkomen-->', $dbtempletpos);
	$dbtempletpos = str_replace("^iframereview^", '<!--frem-ngarep-->'.$refiu.'<!--frem-mburi-->', $dbtempletpos);
	if ($dbbacalagi == '0')
	{
		$juliem = $dbtempletpos;
	}else{
		$resikitag = strip_tags($dbtempletpos, '<p><ul><li>');
		$merda = explode(' ', $resikitag, $dbbacalagi);
		if(count($merda) == $dbbacalagi) 
		{
			array_pop($merda);
			array_push($merda, '<!--more-->');
			$meir = implode(' ', $merda);
			//$ekserp = strip_tags($meir);
			$meir = substr($meir, strpos($meir, '<!--more-->') - 17);
			$yanti = str_replace('<!--more-->', '', $meir);
			$juliem = str_replace($yanti, $meir, $dbtempletpos);
			// CEK MORE
			if (substr_count($dbtempletpos, '<!--more-->') == 1)
			{
				update_option('ap_maxload', '0');
			}else{
				$dbtempletpos = str_replace('<!--more-->', '', $dbtempletpos);
				update_option('ap_maxload', '0');
			}
		}else{
			$itung = get_option('ap_maxload') + 1;
			update_option('ap_maxload', $itung);		
			load_url();
			exit;
			//$juliem = $dbtempletpos . '<!--more-->';
			}
	}
	if ($dbtags != '0' || $dbkw != '0')
	{
		$gombalan = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a","able","about","above","abst","accordance","according","accordingly","across","act","actually","added","adj","affected",
		"affecting","affects","after","afterwards","again","against","ah","all","almost","alone","along","already","also","although","always","am","among",
		"amongst","an","and","announce","another","any","anybody","anyhow","anymore","anyone","anything","anyway","anyways","anywhere","apparently",
		"approximately","are","aren","arent","arise","around","as","aside","ask","asking","at","auth","available","away","awfully","b","back","be",
		"became","because","become","becomes","becoming","been","before","beforehand","begin","beginning","beginnings","begins","behind","being",
		"believe","below","beside","besides","between","beyond","biol","both","brief","briefly","but","by","c","ca","came","can","cannot","can't",
		"cause","causes","certain","certainly","co","com","come","comes","contain","containing","contains","could","couldnt","d","date","did",
		"didn't","different","do","does","doesn't","doing","done","don't","down","downwards","due","during","e","each","ed","edu","effect","eg",
		"eight","eighty","either","else","elsewhere","end","ending","enough","especially","et","et-al","etc","even","ever","every","everybody",
		"everyone","everything","everywhere","ex","except","f","far","few","ff","fifth","first","five","fix","followed","following","follows",
		"for","former","formerly","forth","found","four","from","further","furthermore","g","gave","get","gets","getting","give","given","gives",
		"giving","go","goes","gone","got","gotten","h","had","happens","hardly","has","hasn't","have","haven't","having","he","hed","hence","her",
		"here","hereafter","hereby","herein","heres","hereupon","hers","herself","hes","hi","hid","him","himself","his","hither","home","how",
		"howbeit","however","hundred","i","id","ie","if","i'll","im","immediate","immediately","importance","important","in","inc","indeed","index",
		"information","instead","into","invention","inward","is","isn't","it","itd","it'll","its","itself","i've","j","just","k","keep,keeps","kept",
		"kg","km","know","known","knows","l","largely","last","lately","later","latter","latterly","least","less","lest","let","lets","like","liked",
		"likely","line","little","'ll","long","look","looking","looks","ltd","m","made","mainly","make","makes","many","may","maybe","me","mean","means",
		"meantime","meanwhile","merely","mg","might","million","miss","ml","more","moreover","most","mostly","mr","mrs","much","mug","must","my",
		"myself","n","na","name","namely","nay","nd","near","nearly","necessarily","necessary","need","needs","neither","never","nevertheless","new",
		"next","nine","ninety","no","nobody","non","none","nonetheless","noone","nor","normally","nos","not","noted","nothing","now","nowhere","o",
		"obtain","obtained","obviously","of","off","often","oh","ok","okay","old","omitted","on","once","one","ones","only","onto","open","or","ord","other",
		"others","otherwise","ought","our","ours","ourselves","out","outside","over","overall","owing","own","p","page","pages","part","particular",
		"particularly","past","per","perhaps","placed","please","plus","poorly","possible","possibly","potentially","pp","predominantly","present",
		"previously","primarily","probably","promptly","proud","provides","put","q","que","quickly","quite","qv","r","ran","rather","rd","re",
		"readily","really","recent","recently","ref","refs","regarding","regardless","regards","related","relatively","research","respectively",
		"resulted","resulting","results","right","run","s","said","same","saw","say","saying","says","sec","section","see","seeing","seem","seemed",
		"seeming","seems","seen","self","selves","sent","seven","several","shall","she","shed","she'll","shes","should","shouldn't","show",
		"showed","shown","showns","shows","side","significant","significantly","similar","similarly","since","six","slightly","so","some","somebody",
		"somehow","someone","somethan","something","sometime","sometimes","somewhat","somewhere","soon","sorry","specifically","specified",
		"specify","specifying","still","stop","strongly","sub","substantially","successfully","such","sufficiently","suggest","sup","sure,t",
		"take","taken","taking","tell","tends","th","than","thank","thanks","thanx","that","that'll","thats","that've","the","their","theirs",
		"them","themselves","then","thence","there","thereafter","thereby","thered","therefore","therein","there'll","thereof","therere","theres",
		"thereto","thereupon","there've","these","they","theyd","they'll","theyre","they've","think","this","those","thou","though","thoughh",
		"thousand","throug","through","throughout","thru","thus","til","tip","to","together","too","took","toward","towards","tried","tries",
		"truly","try","trying","ts","twice","two","u","un","under","unfortunately","unless","unlike","unlikely","until","unto","up","upon","ups",
		"us","use","used","useful","usefully","usefulness","uses","using","usually","v","value","various","'ve","very","via","viz","vol","vols",
		"vs","w","want","wants","was","wasn't","way","we","wed","welcome","well","we'll","went","were","weren't","we've","what","whatever","what'll",
		"whats","when","whence","whenever","where","whereafter","whereas","whereby","wherein","wheres","whereupon","wherever","whether","which",
		"while","whim","whither","who","whod","whoever","whole","who'll","whom","whomever","whos","whose","why","widely","width","will","willing","wish","with",
		"within","without","won't","words","world","would","wouldn't","www","x","y","yes","yet","you","youd","you'll","your","youre","yours",
		"yourself","yourselves","you've","z","zero");
		$dbtempletpos = strip_tags($dbtempletpos);
		$dbtempletpos = preg_replace('/\s\s+/i', '', $dbtempletpos);
		$dbtempletpos = trim($dbtempletpos);
		$dbtempletpos = preg_replace('/[^a-zA-Z0-9 -]/', '', $dbtempletpos);
		$dbtempletpos = strtolower($dbtempletpos);
   
		preg_match_all('/\b.*?\b/i', $dbtempletpos, $mila);
		$mila = $mila[0];
      
		foreach ( $mila as $tirta=>$bumi ) {
			if ( $bumi == '' || in_array($bumi, $gombalan) || ctype_digit($bumi) || preg_replace('/[^a-zA-Z0-9_ -]/s', '', $bumi) == '' || strlen($bumi) <= 3 ) {
				unset($mila[$tirta]);
			}
		}   
		$ya_gitcu_deh = array();		
		foreach ( $mila as $kayak => $kuwe ) {
            $kuwe = strtolower($kuwe);
			$ya_gitcu_deh[] = $kuwe;
			}
		$jml = count($ya_gitcu_deh);
		if ($dbtags != '0')
		{
			for ($i=0; $i<$jml-1; $i++)
			{
				if (in_array('satutags', $dbprasetags))
				{
					$arrtags[] = $ya_gitcu_deh[$i];
				}
				if (in_array('duatags', $dbprasetags))
				{
					$arrtags[] = $ya_gitcu_deh[$i] . ' ' . $ya_gitcu_deh[$i+1];
				}
				if (in_array('tigatags', $dbprasetags))
				{
					$arrtags[] = $ya_gitcu_deh[$i] . ' ' . $ya_gitcu_deh[$i+1] . ' ' . $ya_gitcu_deh[$i+2];
				}
				if (in_array('empattags', $dbprasetags))
				{
					$arrtags[] = $ya_gitcu_deh[$i] . ' ' . $ya_gitcu_deh[$i+1] . ' ' . $ya_gitcu_deh[$i+2] . ' ' . $ya_gitcu_deh[$i+3];
				}
			}
			$menghitung_hari = array();
			if ( is_array($arrtags) ) 
			{
				foreach ( $arrtags as $benci => $rindu ) 
				{
					$rindu = strtolower($rindu);
					if ( isset($menghitung_hari[$rindu]) ) 
					{
						$menghitung_hari[$rindu]++;
					}else{
						$menghitung_hari[$rindu] = 1;
					}
				}
			}
			arsort($menghitung_hari);		
			$menghitung_hari = array_slice($menghitung_hari, 0, $dbtags);
			$tags = implode(',', array_keys($menghitung_hari));
		
			$post_for_you = array(
				'post_title'    => $titel,
				'post_content'  => wp_kses_post($juliem),
				'post_status'   => 'publish',
				'post_author'   => 1,
				'tags_input'    => $tags,
				//'post_excerpt'  => wp_kses($ekserp),
				'post_category' => array($kategori_hanya_untukmu)
			);
			// slempitke neng database
			$masuk_dunk = wp_insert_post( $post_for_you );
		}else{
			$post_for_you = array(
				'post_title'    => $titel,
				'post_content'  => wp_kses_post($juliem),
				'post_status'   => 'publish',
				'post_author'   => 1,
				//'post_excerpt'  => wp_kses($ekserp),
				'post_category' => array($kategori_hanya_untukmu)
			);
			// slempitke neng database
			$masuk_dunk = wp_insert_post( $post_for_you );
		}
		if ($dbkw != '0')
		{
			for ($i=0; $i<$jml-1; $i++)
			{
				if (in_array('satukw', $dbprasekw))
				{
					$arrkw[] = $ya_gitcu_deh[$i];
				}
				if (in_array('duakw', $dbprasekw))
				{
					$arrkw[] = $ya_gitcu_deh[$i] . ' ' . $ya_gitcu_deh[$i+1];
				}
				if (in_array('tigakw', $dbprasekw))
				{
					$arrkw[] = $ya_gitcu_deh[$i] . ' ' . $ya_gitcu_deh[$i+1] . ' ' . $ya_gitcu_deh[$i+2];
				}
				if (in_array('empatkw', $dbprasekw))
				{
					$arrkw[] = $ya_gitcu_deh[$i] . ' ' . $ya_gitcu_deh[$i+1] . ' ' . $ya_gitcu_deh[$i+2] . ' ' . $ya_gitcu_deh[$i+3];
				}
			}
			$jumlahkawe = array();
			if ( is_array($arrkw) ) 
			{
				foreach ( $arrkw as $asli => $plasu ) 
				{
					$plasu = strtolower($plasu);
					if ( isset($jumlahkawe[$plasu]) ) 
					{
						$jumlahkawe[$plasu]++;
					}else{
						$jumlahkawe[$plasu] = 1;
					}
				}
			}
			arsort($jumlahkawe);		
			$jumlahkawe = array_slice($jumlahkawe, 0, $dbkw);
			$kiwot = implode(',', array_keys($jumlahkawe));
			add_post_meta($masuk_dunk, 'AP Meta Keywords', $kiwot); 
		}
   }
   if ($dbmetaradio != '0')
   {
		switch ($dbmetaradio)
		{
			case '1': //ptma sj
				$ambildolo = wp_strip_all_tags($dbtempletpos, true);
				if (count(explode(' ', $ambildolo)) > 21)
				{
					$totalan = explode(' ', $ambildolo, 20);
					$dua_nol_kata_pertama = implode(' ', $totalan);
				//}else{
				//	$dua_nol_kata_pertama = $ekserp;
				}
				$metades = preg_replace('/\s\s+/', ' ', $dua_nol_kata_pertama);
			break;
			case '2': // trkir sj
				$ambildolo = wp_strip_all_tags($dbtempletpos, true);
				if (count(explode(' ', $ambildolo)) > 21)
				{
					$totalan = explode(' ', $ambildolo);
					$ambil_dua_nol = explode(' ', $ambildolo, count($totalan) - 20);
					$dua_nol_kata_terakhir = array_pop($ambil_dua_nol);
				//}else{
				//	$dua_nol_kata_terakhir = $ekserp;
				}
				$metades = preg_replace('/\s\s+/', ' ', $dua_nol_kata_terakhir);
			break;
			case '3': // acak
				$kontenpos = wp_strip_all_tags($dbtempletpos, true);
				$kontenpos = preg_replace('/\s\s+/', ' ', $kontenpos);
				$konten = count(explode(' ', $kontenpos));
				$random_ongko = rand(0, $konten - 20);
				if ($random_ongko > 0 && $konten > 20)
				{
					$buangkatadepan = explode(' ', $kontenpos, $random_ongko);
					if ($random_ongko == $konten - 20)
					{
						$sisakata = array_pop($buangkatadepan);
						$metades = $sisakata;
					}else{
						$sisakata = array_pop($buangkatadepan);
						$pisahkata = explode(' ', $sisakata, 20); // ambil 20 kata ajah
						array_pop($pisahkata); // buang sisa kata blkang
						$metades = implode(' ', $pisahkata); // satukan 20 kata yg terpisah jarak n waktu
					}
				}else{
					$buangkatablk = explode(' ', $kontenpos, 20);
					array_pop($buangkatablk);
					$metades = implode(' ', $buangkatablk);
				}
			break;
		}
	add_post_meta($masuk_dunk, 'AP Meta Description', str_replace('"', '', $metades)); 
   }
return $masuk_dunk;
//if (wp_insert_post( $post_for_you )){echo 'posted..';}
}

// =====================DETAIL POSTING ITEM END========================
// =================LOADING WEB START=================
function load_url() {
	$url = 'http';
	if ($_SERVER["HTTPS"] == "on") {$url .= "s";}
	$url .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	if(!headers_sent()) 
	{
		wp_redirect( $url ); exit;
		if (!wp_redirect( $url ))
		{
			header('Location: '.$url);
			exit;
		}
	} else {
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
		echo '<noscript>';
		echo '<meta http-equiv="refresh" content="5;url='.$url.'" />';
		echo '</noscript>';
		exit;
	}
}
// =================LOADING WEB END==================		
?>