<?php 
	if($_POST['alixcan_hidden_more'] == 'Y') {
	
		$reklam_kodu = $_POST['alixcan_reklam_kodu'];
		update_option('alixcan_reklam_kodu', $reklam_kodu);

		echo '<div class="updated"><p><strong>Ayarlar Kaydedildi.</strong></p></div>';
	} else {
		$reklam_kodu = get_option('alixcan_reklam_kodu');
	} 
?> 
<div class="wrap">
	<h2>Devamını Göster Reklam Ayarları</h2>
	Aşşağıdaki Yazı Alanına Devamını Gör &lt;!--more--&gt; Kodunun Olduğu Yere Eklemek İstediğiniz Reklam Kodunu Yazın.
	<p>HTML Kod Ve Css Kullanabilirsiniz</p>

	<div style="float:left;width:85%">
		<form name="alixcan_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
			<input type="hidden" name="alixcan_hidden_more" value="Y">
			
			<h4> Reklam Kodu </h4>
				<p>
					<textarea name="alixcan_reklam_kodu" cols="100" rows="15"><?php echo stripslashes($reklam_kodu); ?></textarea>
				</p>	
			<p class="submit"><input type="submit" name="Submit" value="Kaydet" /></p>
		</form>
	</div>

	<div style="float:right;">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="BNYV2XMRCPXML">
		<input type="image" src="https://www.paypalobjects.com/tr_TR/TR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - Online ödeme yapmanın daha güvenli ve kolay yolu!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
</div>