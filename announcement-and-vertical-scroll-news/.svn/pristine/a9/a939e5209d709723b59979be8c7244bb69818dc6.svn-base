<style type="text/css">
<!--
.style1 {
	color: #990000;
	font-style: italic;
	font-size: 12px;
}
-->
</style>
<div class="tool-box">
<?php
//select query
$data = $wpdb->get_results("select * from ".WP_G_ANNOUNCE_TABLE." order by gAnn_status desc,gAnn_order");

//bad feedback
if ( empty($data) ) 
{ 
	echo "<div id='message' class='error'><p>No Announcement Available in Database! Creat New.</p></div>";
	return;
}
?>
<script language="javascript" type="text/javascript">
function _dealdelete(id)
{
	if(confirm("Do you want to delete this record?"))
	{
		document.frm.action="options-general.php?page=announcement-and-vertical-scroll-news/announcement-and-vertical-scroll-news.php&AC=DEL&rand=76mv1ojtlele176mv1ojtlele1&AID="+id;
		document.frm.submit();
	}
}	
</script>
<form name="frm" method="post">
<table width="100%" class="widefat" id="straymanage">
<thead>
    <tr>
        <th width="67%" align="left">News</th>
        <th width="7%" align="left">Order</th>
        <th width="7%" align="left">Status</th>
        <th width="8%" align="left">Expiration</th>
        <th width="11%" align="left">Action</th>
    </tr>
<thead>
<tbody>
	<?php 
    $i = 0;
    foreach ( $data as $data ) { 
    ?>
    <tr class="<?php if ($i&1) { echo'alternate'; } else { echo ''; }?>">
        <td align="left"><?php echo(stripslashes($data->gAnn_text)); ?></td>
        <td align="left"><?php echo(stripslashes($data->gAnn_order)); ?></td>
        <td align="left"><?php echo(stripslashes($data->gAnn_status)); ?></td>
        <td align="left"><?php echo(stripslashes($data->gAnn_expiration)); ?></td>
        <td align="left">
            <a href="options-general.php?page=announcement-and-vertical-scroll-news/announcement-and-vertical-scroll-news.php&AID=<?php echo $data->gAnn_id?>">Edit</a> 
            &nbsp; 
            <a onClick="javascript:_dealdelete('<?php echo($data->gAnn_id); ?>')" href="javascript:void(0);">Delete</a>        </td>
    </tr>
    <?php $i = $i+1; } ?>
</tbody>
</table>
<table cellspacing="3"><tr><td align="left">
<span class="style1">Note: In front end widget area, if you see any news content out of area or invisible, it because of height and width of the widget, so you should arrange width and height of the widget in widget configuration area to good look. In default I have fixed width: 180px and height: 100px.
</span><br />
Note : <span class="style1"><br />1. I disabled enter key from above text area, to break the line type &lt;br&gt;. <br />2. add your Announcement record by record <br />3. 0000-00-00 is equal to no expiration.</span>
<h2><?php echo wp_specialchars( 'About Plugin' ); ?></h2>
Plug-in created by <a target="_blank" href='http://www.gopiplus.com/'>Gopi</a>. <br> 
<a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/announcement-and-vertical-scroll-news/'>Click here</a> to post suggestion or comments or feedback. <br> 
<a target="_blank" href='http://www.gopiplus.com/work/2010/07/18/announcement-and-vertical-scroll-news/'>Click here</a> to see live demo. <br> 
<a target="_blank" href='http://www.gopiplus.com/work/plugin-list/'>Click here</a> to download my other plugins. <br> 
<br>

</td>
</tr></table>
</form>
</div>
