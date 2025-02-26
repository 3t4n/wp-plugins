<?php

/*Meta App Opting Menu Starts Here (Part 2)*/
function METAAPP_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	   	global $wpdb;
		$table_name = $wpdb->prefix . "METAAPP_ADS"; 
		global $wpdb;
		
	/*Heading of Ads Setting Page in WordPress Admin Area*/
	echo '<div><h2>Ads Setting</h2></div>';

	/*Codes for Update Ads Data into Database*/
	if(isset($_POST['update']))
	{
	update($_POST['AD_ID'],$_POST['AD_CODE'],$_POST['style']);
	echo '<div class="updated"><h3>AD Has Been Updated!</h3></div><br/>';
	}
	
	/*Codes for Delete Ads Data from Database*/
	if(isset($_POST['delete']))
	{
	delete($_POST['AD_ID']);
	echo '<div class="error"><h3>AD Has Been Deleted!</h3></div><br/>';
	}
	
	/*Codes for Insert and Save Ads Data into Database*/
	if(isset($_POST['save']))
	{insert($_POST['ADNAME'],$_POST['ADCODE'],$_POST['style']);
	echo '<div class="updated"><h3>New AD Has Been Added!</h3></div><br/>';
	}
	
	/*Codes for Displaying Ad Names into a Dropdown Menu and Buttons on Setting options Page in WordPress Admin area*/
	echo '<table><tr><td width=70% style="vertical-align: text-top"><form class="form-table" action="" method="post" name="adcodecheck"><label>Ad Code Name : </label> <select name="adname">';

	$rese = $wpdb->get_results("SELECT METAAPP_AD_NAME FROM $table_name");
	foreach ($rese as $rse) {
	if($CHK==$rse->METAAPP_AD_NAME)
	{
		echo '<option selected="selected" value="'.$rse->METAAPP_AD_NAME.'" >'.$rse->METAAPP_AD_NAME.'</option>';
		}else{
			echo '<option value="'.$rse->METAAPP_AD_NAME.'">'.$rse->METAAPP_AD_NAME.'</option>';
		}
}
	echo '
	</select>
	<input class="button-primary" type="submit" value="Modify" name="modify" />
	OR
	<input class="button-primary" type="submit" value="ADD New" name="addnew" />
	</form>';

/*Codes for Add News Ad Code into the system and creating a form for inserting data*/
if (isset($_POST['addnew']))
{
	echo '<form action="" method="post">
<table class="form-table">
<tr>
<td><p>AD Name</p></td>
<td><input type="text" name="ADNAME"/></td>
</tr>
<tr>
<td><p>AD Code</p></td>
<td><textarea rows="6" cols="80" name="ADCODE"></textarea></td>
</tr>
<tr>
<td><p>AD Style</p></td>
<td>
<input type="radio" name="style" value="ad_left">Align Left<br/>
<input type="radio" name="style" value="ad_right">Align Right<br/>
<input type="radio" name="style" value="ad_center">Align Center<br/>
<input type="radio" name="style" value="no" checked="checked">No Style
</td>
</tr>
<tr><td>
</td>
<td ><input class="button-primary" type="submit" value="Save AD Code" name="save" /></td>
</tr>
</table></from>';

}

/*Codes for Modify Ad Code into the system and creating a form for modifying saved data*/
if (isset($_POST['modify']))
{
		$CHK = $rs->METAAPP_AD_NAME;
		$res = $wpdb->get_results("SELECT * FROM $table_name WHERE METAAPP_AD_NAME = '$_POST[adname]'");
		foreach ($res as $rs) {
echo '<form action="" method="post">
<table class="form-table" cellpadding="10px">
<tr>
<td><p>AD ID</p></td>
<td>'.$rs->METAAPP_AD_ID.'</td>
<input type="hidden" name="AD_ID" value="'.$rs->METAAPP_AD_ID.'"/>
</tr>
<tr>
<td><p>AD Name</p></td>
<td>'.$rs->METAAPP_AD_NAME.'</td>

</tr>
<tr>
<td><p>AD Code</p></td>
<td><textarea rows="6" cols="80" name="AD_CODE"> '.stripslashes($rs->METAAPP_AD_CODE).'</textarea></td>
</tr>
<tr>
<td><p>AD Style</p></td>
<td>';

echo '<input type="radio" name="style" value="ad_left"';if($rs->METAAPP_AD_STYLE=='ad_left') echo 'checked="checked"';
echo ' >Align Left<br/>';
echo '<input type="radio" name="style" value="ad_right"';if($rs->METAAPP_AD_STYLE=='ad_right') echo 'checked="checked"';
echo ' >Align Right<br/>';
echo '<input type="radio" name="style" value="ad_center"';if($rs->METAAPP_AD_STYLE=='ad_center') echo 'checked="checked"';
echo ' >Align Center<br/>';
echo '<input type="radio" name="style" value="no"'; if($rs->METAAPP_AD_STYLE=='no') echo 'checked="checked"';
echo ' >No Style';
echo '</td>
</tr>
<tr>
<td>
</td>

<td ><input class="button-primary" type="submit" value="Update" name="update" />
<input class="button-primary" type="submit" value="Delete" name="delete" />
</td>
</tr>
</table>
</form>';
}}

/*Disply Feeds from Meta App Website for latest Updates about Lab activities*/	
$rss = fetch_feed('http://appstore.probashitimes.com/feed/');


if (!is_wp_error( $rss ) ) : 
	
    $maxitems = $rss->get_item_quantity(5); 
    $rss_items = $rss->get_items(0, $maxitems); 
endif;

	echo '</div></td><td style="vertical-align: text-top"><div class="postbox"><h3 class="hndle"><a href="http://appstore.probashitimes.com" target="_blank" style="margin-left:8px; font-size: 15px;">Latest Updates from Meta App</a></h3><div class="inside"><ul class="rss-items" id="wow-feed">';
    
    	if ($maxitems == 0) echo '<li>No items.</li>';
    	else 
    	foreach ( $rss_items as $item ) : 
    
echo '<li class="item">
        <span class="data">
        	<h5><a target="_blank" href=';
echo esc_url( $item->get_permalink() );  
echo ' title=';
echo esc_html( $item->get_title() ); 
echo '>';
echo '> '.esc_html( $item->get_title() );
echo '</a></h5> 	
        </span>
    </li>';
    endforeach;

/*Display Custom information About this Plugin Developer and more*/
	echo '</tr><tr><td></td><td style="vertical-align: text-top"><div class="postbox"><h3 class="hndle" align="center">Ads Plugin Information</h3><div class="inside"><ul>';
	echo '<li>Plugin Developed by: <strong><a href="http://en.gravatar.com/hasmsayemkhan">A S M Sayem</a></strong></li>';
	echo '<li>Customer Support: <strong><a href="http://appstore.probashitimes.com/contact-us">Meta App Support</a></strong></li>';
	echo '<li>Distributed by: <strong>Meta App</strong> (<a href="http://appstore.probashitimes.com/download/">App Store</a>)';
	echo '<li>Got a problem? <a target="_blank" href="http://appstore.probashitimes.com/">Download Plugin Documentation</a></li>';
	echo '</ul></div></div></div></td></tr></table>';
}

?>