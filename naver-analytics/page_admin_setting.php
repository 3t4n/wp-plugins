<?php
$_save_ok = ( !empty($_POST['Submit'] ) && !$apikey_error ) ? true : false;
$_apikey_confirm = ( !empty($_POST['Submit'] ) && $apikey_error ) ? true : false;
?>
<script type="text/javascript">
jQuery(function($){
	<?php if($_save_ok): ?>$('#naver-analytics-apikey-warning').hide();<?php endif; ?>
	$('input[name=apikey]').focus(function(){
		$(this).css({'border-color':'','background-color':''});
	});
});
</script>
<div id="save_ok" class="updated fade"<?php echo $_save_ok ? '':' style="display:none;"'; ?>><p><strong><?php _e('설정을 저장하였습니다.') ?></strong></p></div>
<div id="check_ok" class="updated fade" style="display:none;"><p><strong><?php _e('사용가능한 api_key입니다. 설정을 저장해 주세요.') ?></strong></p></div>
<div id="apikey_confirm" class="error fade"<?php echo $_apikey_confirm ? '':' style="display:none;"'; ?>><p><strong><?php _e('api_key를 입력해 주세요.') ?></strong></p></div>
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2><?php _e('NAVER Analytics 설정'); ?></h2>
	<form action="" method="post">
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">API KEY</th>
				<td><input type="text" name="apikey" size="35" value="<?php echo get_option('naver_analytics_api_key'); ?>" /><br /><a href="http://analytics.naver.com/" target="_blank">NAVER Analytics 공식사이트</a>에서 발급 받은 API KEY를 등록합니다.<br />(API변경으로 API KEY 확인기능이 제거되었습니다.)</td>
			</tr>
		</tbody>
	</table>
	<p class="submit"><input name="Submit" class="button-primary" value="<?php _e('Save Changes'); ?>" type="submit" /></p>
	</form>
</div>