<div class="form-table">
	<?php foreach($this->options as $optKey => $opt) { ?>
		<?php
			$htmlType = isset($opt['html']) ? $opt['html'] : false;
			if(empty($htmlType)) continue;
			$htmlOpts = array('value' => outGdprsup::_js($opt['value']), 'attrs' => 'data-optkey="'. $optKey. '"');
			if(in_array($htmlType, array('selectbox', 'selectlist', 'radiobuttons')) && isset($opt['options'])) {
				if(is_callable($opt['options'])) {
					$htmlOpts['options'] = call_user_func( $opt['options'] );
				} elseif(is_array($opt['options'])) {
					$htmlOpts['options'] = $opt['options'];
				}
				if($htmlType == 'radiobuttons') {
					$htmlOpts['labeled'] = true;
					$htmlOpts['no_br'] = true;
				}
			}
			if(isset($opt['pro']) && !empty($opt['pro'])) {
				$htmlOpts['attrs'] .= ' class="gdprsupProOpt"';
			}
		?>
	<div class="row gdprsupOptRow gdprsupOptHtml-<?php echo $htmlType;?>"
		 <?php if(isset($opt['connect']) && $opt['connect']) { ?>
			data-connect="<?php echo $opt['connect'];?>" style="display: none;"
		<?php }?>
	>
		<div class="col-sm-3 gdprsupOptLblCell">
			<?php echo $opt['label']?>
			<?php if(!empty($opt['changed_on'])) {?>
				<br />
				<span class="description">
					<?php 
					$opt['value'] 
						? printf(__('Turned On %s', GDPRSUP_LANG_CODE), dateGdprsup::_($opt['changed_on']))
						: printf(__('Turned Off %s', GDPRSUP_LANG_CODE), dateGdprsup::_($opt['changed_on']))
					?>
				</span>
			<?php }?>
			<?php if(isset($opt['pro']) && !empty($opt['pro'])) { ?>
				<span class="gdprsupProOptMiniLabel">
					<a href="<?php echo $opt['pro']?>" target="_blank">
						<?php _e('PRO option', GDPRSUP_LANG_CODE)?>
					</a>
				</span>
			<?php }?>
		</div>
		<div class="col-sm-1 gdprsupOptCell"><i class="fa fa-question supsystic-tooltip" title="<?php echo esc_html($opt['desc'])?>"></i></div>
		<div class="col-sm-8 gdprsupOptCell gdprsupOptCellValue">
			<?php
				$inputName = 'opt_values['. $optKey. ']';
				if($htmlType == 'wp_editor') {
					wp_editor( $htmlOpts['value'], str_replace(array('[', ']'), '', $inputName), array('drag_drop_upload' => true) );
				} else {
					echo htmlGdprsup::$htmlType($inputName, $htmlOpts);
				}
			?>
		</div>
		<div style="clear: both;"></div>
	</div>
	<?php }?>
</div>

