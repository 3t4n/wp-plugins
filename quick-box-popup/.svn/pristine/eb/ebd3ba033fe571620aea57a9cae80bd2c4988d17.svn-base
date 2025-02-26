<?php
if ( ! defined( 'ABSPATH' ) ) exit;

$xyz_qbx_tinymce=get_option("xyz_qbx_tinymce");
$xyz_credit_link=get_option("xyz_credit_link");
$xyz_qbx_enable=get_option("xyz_qbx_enable");
$xyz_qbx_cache_enable=get_option("xyz_qbx_cache_enable");
$xyz_qbx_adds_enable=get_option("xyz_qbx_adds_enable");
if(isset($_GET['quickbox_notice']) && $_GET['quickbox_notice'] == 'hide')
{
    if (! isset( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'quickbox_notice' ))
    {
        wp_nonce_ays( 'quickbox_notice' );
        exit();
    }
    update_option('xyz_quick_dnt_shw_notice', "hide");
    ?>


<div class="system_notice_area_style1" id="system_notice_area">
Thanks again for using the plugin. We will never show the message again.
&nbsp;&nbsp;&nbsp;<span
id="system_notice_area_dismiss">Dismiss</span>
</div>
<?php
}
?>
<h2>Basic Settings</h2>
<form method="post" >
<?php wp_nonce_field( 'add-basic-setting' );?>
<table  class="widefat" style="width:98%">

<tr valign="top" id="xyz_qbx">

<td scope="row" colspan="1" width="50%"><label for="xyz_qbx_tinymce">Enable tiny MCE filter to prevent auto removal of &lt br &gt and &lt p &gt tags ?</label>	</td>

<td><select name="xyz_qbx_tinymce" id="xyz_qbx_tinymce" >

<option value ="1" <?php if($xyz_qbx_tinymce=='1') echo 'selected'; ?> >Yes </option>

<option value ="0" <?php if($xyz_qbx_tinymce=='0') echo 'selected'; ?> >No </option>
</select>
</td>

</tr>

<tr valign="top" id="xyz_qbx">

<td scope="row" colspan="1"><label for="xyz_qbx_credit_link">Enable credit link to author ?</label>	</td><td><select name="xyz_credit_link" id="xyz_qbx_credit_link" >

<option value ="qbx" <?php if($xyz_credit_link=='qbx') echo 'selected'; ?> >Yes </option>

<option value ="<?php echo $xyz_credit_link!='qbx'?$xyz_credit_link:0;?>" <?php if($xyz_credit_link!='qbx') echo 'selected'; ?> >No </option>
</select>
</td></tr>



<tr valign="top" id="xyz_qbx">

<td scope="row" colspan="1"><label for="xyz_qbx_enable">Enable Quickbox Popup ?</label></td>
<td><select name="xyz_qbx_enable" id="xyz_qbx_enable" >

<option value ="1" <?php if($xyz_qbx_enable=='1') echo 'selected'; ?> >Yes </option>

<option value ="0" <?php  if($xyz_qbx_enable=='0') echo 'selected'; ?> >No </option>
</select>
</td></tr>



<tr valign="top" id="xyz_qbx">

<td scope="row" colspan="1"><label for="xyz_qbx_cache_enable">Compatible with cache plugin ?</label></td>
<td><select name="xyz_qbx_cache_enable" id="xyz_qbx_cache_enable" >
<option value ="0" <?php  if($xyz_qbx_cache_enable=='0') echo 'selected'; ?> >No </option>
<option value ="1" <?php if($xyz_qbx_cache_enable=='1') echo 'selected'; ?> >Yes </option>


</select>
</td></tr>

<tr valign="top" id="xyz_qbx">

<td scope="row" colspan="1"><label for="xyz_qbx_adds_enable">Enable premium version ads ?</label></td>
<td><select name="xyz_qbx_adds_enable" id="xyz_qbx_adds_enable" >
<option value ="0" <?php  if($xyz_qbx_adds_enable=='0') echo 'selected'; ?> >No </option>
<option value ="1" <?php if($xyz_qbx_adds_enable=='1') echo 'selected'; ?> >Yes </option>
</select>
</td></tr>


<tr>
<td scope="row"> </td>
<td>
<input type="submit" class="submit_qbx" value=" Update Settings " /></td>
</tr>


</table></form>
