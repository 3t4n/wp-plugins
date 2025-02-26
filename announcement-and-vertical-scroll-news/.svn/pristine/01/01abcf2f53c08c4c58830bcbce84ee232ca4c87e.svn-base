<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-and-vertical-scroll-news/gAnnounce/gAnnounceform.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/announcement-and-vertical-scroll-news/gAnnounce/noenter.js"></script>
<style type="text/css">
<!--
.style1 {
	color: #993300;
	font-style: italic;
}
-->
</style>
<div align="left" style="padding-top:0px;padding-bottom:5px;"> <a href="options-general.php?page=announcement-and-vertical-scroll-news/announcement-and-vertical-scroll-news.php">Manage Page</a> <a href="options-general.php?page=announcement-and-vertical-scroll-news/setting.php">Setting Page</a> </div>
<form name="gAnnouncefrm" method="post" action="<?php echo $mainurl; ?>"  onSubmit="return _gAnnounce()">
  <table width="98%" border="0" cellspacing="2" cellpadding="0">
    <tr>
      <td colspan="3"><textarea name="gAnn_text" cols="100" rows="6" id="txt_news"><?php echo $gAnn_text_x; ?></textarea></td>
    </tr>
    <tr>
      <td width="135">Display Order :</td>
      <td width="135">Display Status :</td>
      <td width="928">Expiration Date : </td>
    </tr>
    <tr>
      <td><input name="gAnn_order" value="<?php echo $gAnn_order_x; ?>" type="text" id="txt_order" size="10" maxlength="3" /></td>
      <td><select name="gAnn_status" style="width:70px" id="txt_status">
        <option value="">Select</option>
        <option value='Yes' <?php if($gAnn_status_x=='Yes') { echo 'selected' ; } ?>>Yes</option>
        <option value='No' <?php if($gAnn_status_x=='No') { echo 'selected' ; } ?>>No</option>
      </select></td>
      <td>
        <input name="gAnn_expiration" type="text" id="txt_expiration" maxlength="10" value="<?php echo $gAnn_expiration_x; ?>" /> 
        Date formate(YYYY-MM-DD), Example: 25th Dec 2012 should type = 2012-12-25
      </td>
    </tr>
    <tr>
      <td height="50" colspan="3"><input name="publish" lang="publish" class="button-primary" value="<?php echo $submittext?>" type="submit" /></td>
    </tr>
  </table>
  <input name="gAnn_id" id="gAnn_id" type="hidden" value="<?php echo $gAnn_id_x; ?>">
</form>
