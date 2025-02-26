		<?php
		
		require_once 'cURL_ajax.inc.php';
				
		$nos=0;
		$ref="";
		$descr="";
		
		$banner_size 	= htmlentities($_POST["banner_size"]);	
		$ref			= htmlentities($_POST["ref"]);		
		$kws			= htmlentities($_POST["kws"]);
		$hide_footer	= htmlentities($_POST["hide_footer"]);
		$tracking_id	= htmlentities($_POST["tracking_id"]);
		
		$kws=urlencode($kws);
		
		
		//$banner_size
		$banner_height = substr($banner_size,strpos($banner_size,"x")+1);
		$banner_width =substr($banner_size,0,strpos($banner_size,"x"));

	
		
		
		$url=mycbgenie_fetch_url_in_ajax ('https://cbproads.com/xmlfeed/wordpress_ads/ads.asp?width='. $banner_width.'&height='.$banner_height.'&nos='.$nos.'&kws='.$kws,$ref,'banner');


// $url = 'https://cbproads.com/xmlfeed/wordpress_ads/ads.asp?width='. $banner_width.'&height='.$banner_height.'&nos='.$nos.'&kws='.$kws;


		$json = json_decode(mycbgenie_ads_file_get_contents_curl($url,0,null,null));
		
		foreach ($json as $key=>$value) {
	
			
			foreach ($value as $key => $val) { 
			
			if ($key=='title') { $title= $val;}
			if ($key=='descr') { $descr= $val;}
			if ($key=='mdescr') { $mdescr= $val;}
			if ($key=='image_name') { $image_name= $val;}
			if ($key=='altimage') { $altimage= $val;}	
			if ($key=='ids') { $ids= $val;}						
			if ($key=='bannerurl') { $banner_url= $val;}
			if ($key=='nWidth') { $banner_width= $val;}						
			if ($key=='nHeight') { $banner_height= $val;}						

			
				$title=htmlspecialchars($title);					
				$descr=htmlspecialchars($descr);					

			}
			$term_link	= "?action=mycbgenie_ads_view&tracking_id=".$tracking_id."&id=".$ids;
			?>
			 <div style="border:0px solid red; heights:<?php echo $banner_height; ?>px;">
			    <a href="<?php echo ($term_link);?>" target="_blank" rel="nofollow" >
			        <img style='margin:0px; padding:0px; widths:100%; max-widths:<?php echo $banner_width; ?>px;' src='<?php echo ($banner_url);?>'  /></a>
			 </div>
			
			<?php		 
			

		}
		if($hide_footer!=1){
?>
			<div style="max-width:<?php echo $banner_width; ?>px; " align="center">
		
			<a style='text-decoration:none;' href='http://mycbgenie.com/?ref=<?php echo $ref;?>' target='_blank'>
			<font color=darkgrey   style="font-size:.75em;">MyCBGenie Ads&nbsp;</font></a>
			</div>
			
		<?php } ?>