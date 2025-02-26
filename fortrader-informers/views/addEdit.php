<div class="wrap addEditWrapper" >
<form action="<?php echo $submitUrl;?>" method="post">
	<div class="addEditForm">
		<h2 style="margin-bottom: 10px;"><?php echo $createEditTitleText;?></h2>
		
			<a href="<?php echo $backUrl;?>" class="button-secondary" style="float: left;"><?php echo $backToList;?></a>

			<div class="clearboth"></div>
			<div id="poststuff">
				<div class="postbox">
					<h3 class="hndle"><?php echo $informerTitleText;?></h3>
					<div class="inside">
						<input type="text" placeholder="<?php echo $informerTitleText;?>" value="" class="regular-text informerTitle" name="informerTitle">
					</div>
				</div>
				
				<div class="postbox">
					<h3 class="hndle"><?php echo $languageTitleText;?></h3>
					<div class="inside">
						<div>
							<select name="informerLang" class="informerLang">
								<?php
									foreach( $langsList as $lang => $title ){
										echo '<option value="' .$lang. '">'. $title .'</option>';
									}
								?>
							</select>
						</div>
					</div>
				</div>
	
				<div class="generatedSettings">
				</div>
			
			</div>
		
	</div>
	<div class="previewInformer">
		<div class="previewControl">
			<div class="postbox">
				<h3 class="hndle"><?php echo $informerHeightTitleText;?></h3>
				<div class="inside">
					<div>
						<input type="text"  name="informerHeight" value="500">
					</div>
				</div>
			</div>
			<h3><?php echo $informerPreviewTitle;?></h3>
			<div style="color:#F1F1F1;height:1px">.</div>
		</div>
		<div class="informerPreviewBorder">
		<div class="informerPreviewBox"></div>
		</div>
	</div>
</form>
</div>
<?php //print_r($allSettings)?>
<script>
!function( $ ) {
	FtInformersAddEditWidget({
		'urlLangs': <?php echo json_encode($urlLangs);?>,
		'allSettings': <?php echo json_encode($allSettings);?>,
		'jsTexts': <?php echo json_encode($jsTexts);?>,
		'ftUrl': '<?php echo $ftUrl;?>',
		'createnonce': '<?php echo $createnonce;?>',
		'ajaxAction': '<?php echo $ajaxAction;?>',
		'savedData': <?php echo json_encode($savedData);?>,
		'mode': '<?php echo $mode;?>',
		'parsedData': <?php echo json_encode($parsedData);?>,
		'listUrl': '<?php echo $backUrl?>',
	});
}( window.jQuery );
</script>