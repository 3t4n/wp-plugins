<?php
$isBarOn = isset($getTektonicOptions['tektonic_file_upload_bar_show']) ? esc_html($getTektonicOptions['tektonic_file_upload_bar_show']) : null;
$barType = isset($getTektonicOptions['tektonic_file_upload_bar_type']) ? esc_html($getTektonicOptions['tektonic_file_upload_bar_type']) : 'bar';
?>
<div class="tektonic-file-upload">
	<div id="tektonic_file_upload_notification"></div>
	<div id="upload-file-area">
		<p class="tleft">
			<input type="button" value="<?php echo esc_html__('Upload File'); ?>" onclick="<?php echo esc_js('file_explorer()');?>">
		</p>
		<input type="file" id="tektonic_file_upload_selectfile">
		<div class="ts-clear-both"></div>
		<div class="ts-clear-both"></div>
	</div>
	<div class="full" id="tektonic_file_upload_loader">
		<?php
		if( $barType == 'bar' && $isBarOn == 'on') {
			?>
			<div class="ts-border" id="bartype" style="display: none;">
			  	<div id="tsBar" class="ts-container ts-padding ts-green" style="width: <?php echo absint(0); ?>%;">
			        <div class="ts-center black" id="ts-progress-label"><?php echo absint(0); ?>%</div>
			  	</div>
			</div>
			<?php
		} else if( $barType == 'circular' &&  $isBarOn == 'on') {
			?>
			<div class="full" id="circular" style="display: none;">
				<div class="c100" id="circular-inner">
					<span id="circletypelabel"><?php echo absint(0); ?>%</span>
					<div class="slice">
						<div class="bar"></div>
						<div class="fill"></div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<div id="tektonic_file_upload_status_notification"></div>
</div>
<script>
	var barType          = '<?php echo esc_html_e($barType); ?>';
	var allowedFileTypes = '<?php echo esc_html_e($fileTypes); ?>';
</script>
