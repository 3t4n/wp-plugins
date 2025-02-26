<?php
class open56_success{
	var $main; // main Add From Server instance.
	var $package = 'open56';
	var $name = '56视频上传';

	function __construct() {
	}

	function render() {
		$uac = get_option('frmsvr_uac', 'allusers');
        $admin_url = admin_url();
        $rurl = $admin_url.'media-upload.php?post_id=9&tab=open56';
		?>
        <form enctype="multipart/form-data" method="post" action="<?=$rurl?>" class="media-upload-form type-form validate" id="open56-form">
<input type="hidden" name="post_id" id="post_id" value="9">
<input type="hidden" id="_wpnonce" name="_wpnonce" value="4bbfc7cefd">
<input type="hidden" name="_wp_http_referer" value="<?=$rurl?>">
<h3 class="media-title">已经成功上传视频！</h3>
<div id="media-items">
<div class="media-item media-blank">
	<table class="describe "><tbody>
		<tr>
			<th valign="top" scope="row" class="label" style="width:130px;">
				<span class="alignleft"><label for="src">标题</label></span>
				<span class="alignright"><abbr id="status_img" title="required" class="required">*</abbr></span>
			</th>
            <td class="field">
                <input id="subject" name="subject" value="<?=isset($_GET['subject'])?urldecode($_GET['subject']):''?>" type="text">
            </td>
		</tr>
		<tr>
			<th valign="top" scope="row" class="label" style="width:130px;">
				<span class="alignleft"><label for="src">播放地址</label></span>
				<span class="alignright"><abbr id="status_img" title="required" class="required">*</abbr></span>
			</th>
            <td class="field">
                <input id="player" name="player" value="<?=isset($_GET['player'])?$_GET['player']:''?>" type="text">
            </td>
		</tr>
		<tr>
			<td></td>
			<td>
                <input type="button" value="插入视频" onclick="open56_insert()" style="color: rgb(187, 187, 187);" id="go_button" class="button">
			</td>
		</tr>
	</tbody></table>
</div>
</div>
</form>
<script type="text/javascript">
//<![CDATA[
function open56_insert() {
    var t = this, html, f = document.forms[0],subject = '',player = '';
    if ( f.subject.value ) {
        subject = f.subject.value.replace(/'/g, '&#039;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }
    if ( f.player.value ) {
        player = f.player.value;
    }
    html = "<p>"+subject+"</p><p style='height:400px;'><embed src='"+player+"' type='application/x-shockwave-flash' allowFullScreen='true' width='100%' height='100%' allowNetworking='all' wmode='opaque' allowScriptAccess='always'></embed></p>";
    parent.parent.send_to_editor(html);
    return false;
}
//]]>
</script>
<?php
	}
}
