<?php

/*
Plugin Name: Adicon Server
Plugin URI: http://vasthtml.com
Version: 1.1
Description: Displays 16x16 favicon ads on your blog and lets users upload new favicons.
Author: Eric Hamby
Author URI: http://www.erichamby.com/
*/



class AI_Admin {



	function AI_install()



	{



		global $wpdb,$table_prefix;



	if(!get_option("AI_rows")) {







		$wpdb->query("CREATE TABLE IF NOT EXISTS `".$table_prefix."adicons` (



			  `id` int(11) NOT NULL auto_increment,



			  `adURL` varchar(255) default NULL,



			  `adText` varchar(255) default NULL,



			  `adPrice` int(11) default NULL,



			  `adStartDate` datetime default NULL,



			  `adPeriodCount` int(11) default NULL,



			  `adStatus` int(11) default NULL,



			  `contactName` varchar(255) default NULL,



			  `contactEmail` varchar(255) default NULL,



			  `adRow` int(11) NOT NULL,



			  `adCol` int(11) NOT NULL,



			  PRIMARY KEY  (`id`)



			)");







	}







		if(!get_option("AI_rows"))



		update_option("AI_rows",5);



		if(!get_option("AI_cols"))



		update_option("AI_cols",5);



		if(!get_option("AI_defaultStatus"))



		update_option("AI_defaultStatus",0);



		if(!get_option("AI_adPrice"))



		update_option("AI_adPrice",0);



		if(!get_option("AI_sameURL"))



		update_option("AI_sameURL",0);



		if(!get_option("AI_rowsForSale"))



		update_option("AI_rowsForSale",0);



		if(!get_option("AI_salePrice"))



		update_option("AI_salePrice",0);



		if(!get_option("AI_emptyLink"))



		update_option("AI_emptyLink","/");



		if(!get_option("AI_emptySaleImg"))



		update_option("AI_emptySaleImg",get_bloginfo('wpurl')."/wp-content/plugins/adicons/images/adbuy.jpg");



		if(!get_option("AI_emptyRentImg"))



		update_option("AI_emptyRentImg",get_bloginfo('wpurl')."/wp-content/plugins/adicons/images/adicon.jpg");







	}



	function add_config_page() {
$adminmenu = get_bloginfo('url').'/wp-content/plugins/adicons/images/admin.png';



		global $wpdb;



		if ( function_exists('add_submenu_page') ) {



		if ( function_exists('add_menu_page') ) {



			add_menu_page('AdIcons', 'AdIcons', 1, basename(__FILE__), array('AI_Admin','config_page'), $adminmenu);



		}



	}}







	function config_page() {



		global $wpdb,$_REQUEST,$table_prefix;



		include("ai_admin.php");



	}







}







class AI_Interface {







	function adIconShow() {



		global $wpdb,$table_prefix,$adPrice;



		$AI_rows=get_option("AI_rows");



		$AI_cols=get_option("AI_cols");



		$AI_defaultStatus=get_option("AI_defaultStatus");



		$AI_adPrice=get_option("AI_adPrice");



		$AI_sameURL=get_option("AI_sameURL");



		$AI_rowsForSale=get_option("AI_rowsForSale");



		$AI_salePrice=get_option("AI_salePrice");



		$AI_emptyLink=get_option("AI_emptyLink");



		$AI_emptySaleImg=get_option("AI_emptySaleImg");



		$AI_emptyRentImg=get_option("AI_emptyRentImg");



		$AI_showAll=get_option("AI_showAll");







		if(!function_exists("vcupdate")) {



			$adPrice=get_option("AI_adPrice");



		}











		?>



		<style>



		.adicon {



			border: 1px solid #FFFFFF;



			padding:0px;



		}



		</style>



		<table border=0 cellspacing=2 cellpadding=0 align="center">



		<?php



		if($AI_showAll)



		{



			for($i=0;$i<$AI_rows;$i++)



			{



			?>







				<tr>



					<?php



					for($t=0;$t<$AI_cols;$t++)



					{



						//for sale



						if($i<$AI_rowsForSale) {



							$q=$wpdb->get_row("select id,adURL, adText from ".$table_prefix."adicons where adRow=$i and adCol=$t and adStatus=1");



							if($q->id)



							{



								?>



								<td><a onmouseup="mengTracker('adicon',this.href);" href="<?php echo $q->adURL;?>" target="_blank" title="<?php echo $q->adText;?>"><img class="adicon" src="<?php echo get_bloginfo('wpurl');?>/wp-content/plugins/adicons/images/<?php echo $q->id;?>.jpg" title="<?php echo $q->adText;?>" alt="<?php echo $q->adText;?>" /></a></td>



								<?php



							}



							else



							{



								?>



								<td><a onmouseup="mengTracker('adicon',this.href);" href="<?php echo $AI_emptyLink;?>" target="_blank" title="Buy This AdIcon. Current Price: $<?php echo $salePrice;?>/lifetime"><img class="adicon" src="<?php echo $AI_emptySaleImg;?>" title="Buy This AdIcon. Current Price: $<?php echo $AI_salePrice;?>/lifetime" alt="Buy This AdIcon. Current Price: $<?php echo $salePrice;?>/lifetime" /></a></td>



								<?php



							}



						}



						//for rent



						else



						{



							$q=$wpdb->get_row("select id,adURL, adText from ".$table_prefix."adicons where adRow=$i and adCol=$t and adStatus=1");



							if($q->id)



							{



								?>



								<td><a <?php if(class_exists('MA_Filter')){?>onmouseup="mengTracker('adicon',this.href);"<?php }?> href="<?php echo $q->adURL;?>" target="_blank" title="<?php echo $q->adText;?>"><img class="adicon" src="<?php echo get_bloginfo('wpurl');?>/wp-content/plugins/adicons/images/<?php echo $q->id;?>.jpg" title="<?php echo $q->adText;?>" alt="<?php echo $q->adText;?>" /></a></td>



								<?php



							}



							else



							{



								?>



								<td><a <?php if(class_exists('MA_Filter')){?>onmouseup="mengTracker('adicon',this.href);"<?php }?> href="<?php echo $AI_emptyLink;?>" target="_blank" title="Rent This AdIcon. Current Price: $<?php echo $adPrice;?>/month"><img class="adicon"  src="<?php echo $AI_emptyRentImg;?>" title="Rent This AdIcon. Current Price: $<?php echo $adPrice;?>/month" alt="Rent This AdIcon. Current Price: $<?php echo $adPrice;?>/month" /></a></td>



								<?php



							}



						}



						?>







				<?php



				}



			?>



			</tr>



			<?php



			}



		}



		else



		{







			if($AI_rowsForSale)



			{



				for($i=0;$i<$AI_rowsForSale;$i++)



				{



					for($t=0;$t<$AI_cols;$t++)



					{



						$q=$wpdb->get_row("select id,adURL, adText from ".$table_prefix."adicons where adRow=$i and adCol=$t and adStatus=1");



						if($q->id)



						{

							?>



							<td><a onmouseup="mengTracker('adicon',this.href);" href="<?php echo $q->adURL;?>" target="_blank" title="<?php echo $q->adText;?>"><img class="adicon" src="<?php echo get_bloginfo('wpurl');?>/wp-content/plugins/adicons/images/<?php echo $q->id;?>.jpg" title="<?php echo $q->adText;?>" alt="<?php echo $q->adText;?>" /></a></td>



							<?php



						}



						else



						{



							?>



							<td><a onmouseup="mengTracker('adicon',this.href);" href="<?php echo $AI_emptyLink;?>" target="_blank" title="Buy This AdIcon. Current Price: $<?php echo $salePrice;?>/lifetime"><img class="adicon" src="<?php echo $AI_emptySaleImg;?>" title="Buy This AdIcon. Current Price: $<?php echo $AI_salePrice;?>/lifetime" alt="Buy This AdIcon. Current Price: $<?php echo $salePrice;?>/lifetime" /></a></td>



							<?php



						}



					}



				}



				$continueFrom="and adRow>=$i";







			}



			$q=$wpdb->get_results("select id,adURL, adText from ".$table_prefix."adicons where  adStatus=1 $continueFrom order by adRow, adCol");



			$nr=$wpdb->num_rows;



			$rows=ceil($nr/$AI_cols);



			$i=0;



			?><tr>



			<?php



			foreach($q as $ad)



			{







				?>



				<td><a onmouseup="mengTracker('adicon',this.href);" href="<?php echo $ad->adURL;?>" target="_blank" title="<?php echo $ad->adText;?>"><img class="adicon" src="<?php echo get_bloginfo('wpurl');?>/wp-content/plugins/adicons/images/<?php echo $ad->id;?>.jpg" title="<?php echo $ad->adText;?>" alt="<?php echo $ad->adText;?>" /></a></td>



				<?php



				$i++;



				if(!($i%$AI_cols))



				{



					echo "</tr><tr>";



				}







			}







			if(($i%$AI_cols))



			{



				for($t=($i%$AI_cols);$t<$AI_cols;$t++)



				{



				?>



				<td><a onmouseup="mengTracker('adicon',this.href);" href="<?php echo $AI_emptyLink;?>" target="_blank" title="Rent This AdIcon. Current Price: $<?php echo $adPrice;?>/month"><img class="adicon"  src="<?php echo $AI_emptyRentImg;?>" title="Rent This AdIcon. Current Price: $<?php echo $adPrice;?>/month" alt="Rent This AdIcon. Current Price: $<?php echo $adPrice;?>/month" /></a></td>



				<?php



				}



				echo "</tr>";



			}







		}?>



		</table>



		<?php







	}



	function adIconUploadForm()



	{



		global $wpdb,$table_prefix;







	?>



	<script>



	var selId='';



	function selectPlace(row,col,clicked)



	{



		document.adIconUploadForm.selectedPlace.value=row+"_"+col;



		if(selId)



			selId.style.border='1px solid #dfdfdf;';



		clicked.style.border='1px solid #0000ff;';



		selId=clicked;







	}



	</script>



	<style>



		.adicon {



			border: 1px solid #FFFFFF;



		}



	</style>



	<div id="adIconUpload">



		<table border=0 cellspacing=2 cellpadding=3>







		<?php



		$errmsg=$_SESSION['errmsg'];



		if($errmsg) {?>



		<tr>



			<td colspan=3 style="background-color: #ffd8cd; color:#0000ff;">ERROR: <?php echo $errmsg;?></td>



		</tr>



		<?php



		}?>



		<form method="post" enctype="multipart/form-data" name="adIconUploadForm" action="<?php echo get_bloginfo('wpurl').'/wp-content/plugins/adicons/addIcon.php'; ?>">



		<input type="hidden" name="selectedPlace" value=''>



		<input type="hidden" name="act" value=''>



		<tr>



			<td>Your Name:</td>



			<td><input  name="contactName"></td>



			<td class='ai_info'></td>



		</tr>



		<tr>



			<td>E-mail:</td>



			<td><input name="contactEmail" value="@"></td>



			<td class='ai_info'></td>



		</tr>



		<tr>



			<td>Icon:</td>



			<td><input type="file" name="iconfile"></td>



			<td class='ai_info'>This is the icon file that will be displayed</td>



		</tr>



		<tr>



			<td>URL:</td>



			<td><input name="adurl" value="http://"></td>



			<td class='ai_info'>This is the URL where visitors will be redirected. (i.e. http://www.yoursite.com)</td>



		</tr>



		<tr>



			<td>Ad Text:</td>



			<td><input name="adtext"></td>



			<td class='ai_info'>This is the icon file that will be displayed</td>



		</tr>



		<tr>



			<td>For How Long?</td>



			<td><input name="periodcount" size=2 value=1></td>



			<td class='ai_info'>In months</td>



		</tr>



		<tr>



			<td colspan=3><strong>Where should we place your ad?</strong><br><em>Just click on an available slot</em><br>



			<table border=0 cellspacing=2 cellpadding=0 >



			<?php







			$tRows=get_option("AI_rows");



			$tCols=get_option("AI_cols");



			for($i=0;$i<$tRows;$i++)



			{



				echo "<tr>";



				for($t=0;$t<$tCols;$t++)



				{



					echo "<td>";



					$q=$wpdb->get_row("select id from ".$table_prefix."adicons where adRow=$i and adCol=$t");



					if($q->id) {



						echo "<img src='".get_bloginfo('wpurl')."/wp-content/plugins/adicons/images/nobuy.jpg'>";



					}



					else



					{



						echo "<img id='".$i."_".$t."' src='".get_bloginfo('wpurl')."/wp-content/plugins/adicons/images/buy.jpg' onclick='selectPlace($i,$t,this);'>";



					}







				}







			}



			?>



			</table>



			</td>



		</tr>



		<tr>



			<td colspan=3 ><input type="submit" name="s" value="Add">



		</tr>



		</form>



		</table>



	</div>



	<?



	}







}







add_action('init', array('AI_Admin','AI_install'));



add_action('admin_menu', array('AI_Admin','add_config_page'));



