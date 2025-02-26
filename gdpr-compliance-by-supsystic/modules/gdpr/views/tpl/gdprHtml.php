<?php
	$enbShowAgain = $this->opts['main']['enb_show_again_tab'];
	$showAgainPos = 'bottom';
	$showAgainSide = isset($this->opts['main']['show_again_tab_pos']) && !empty($this->opts['main']['show_again_tab_pos'])
		? $this->opts['main']['show_again_tab_pos']
		: 'right';
	$styles = $showAgainStyles = array(
		'background-color' => $this->opts['design']['main_color'],
		'color' => $this->opts['design']['text_color'],
	);
	
	if($this->opts['design']['enb_border']) {
		$borderAttr = $showAgainBorderAttr = '';
		if($this->opts['design']['show_as'] == 'bar') {
			switch($this->opts['design']['bar_pos']) {
				case 'top':
					$borderAttr = 'border-bottom';
					$showAgainBorderAttr = 'border-top';
					break;
				case 'bottom':
					$borderAttr = 'border-top';
					$showAgainBorderAttr = 'border-bottom';
					break;
			}
			$showAgainPos = $this->opts['design']['bar_pos'];
		} else {
			$borderAttr = 'border';
			$showAgainBorderAttr = 'border-bottom';
		}
		if(!empty($borderAttr)) {
			$styles[ $borderAttr ] = $showAgainStyles['border'] = '1px solid '. $this->opts['design']['border_color'];
			$showAgainStyles[ $showAgainBorderAttr ] = 'none';
		}
	}
?>
<?php if($this->opts['design']['show_as'] == 'popup') { ?>
	<div id="gdprsupNotifyBg"></div>
<?php }?>
<div id="gdprsupNotifyShell" class="
	gdprsupNotifyBar 
	gdprsup-<?php echo $this->opts['design']['show_as']?>
	gdprsup-<?php echo $this->opts['design']['bar_pos']?>
	" style="<?php echo utilsGdprsup::arrToCss($styles)?>">
	
	<div class="gdprsupContent">
		<?php echo $this->opts['main']['cookie_txt'];?>
	</div>
	<?php if(!empty($this->agree)) { ?>
		<div class="gdprsupAgrees">
			<table>
			<?php foreach($this->agree as $a) { ?>
				<tr class="gdprsupAgree">
					<td valign="middle">
						<label class="gdprsupSwitch">
							<?php $agreeHash = md5($a['label']); ?>
							<input type="checkbox" name="agree[<?php echo $agreeHash;?>]" value="1" data-hash="<?php echo $agreeHash;?>" />
							<span class="gdprsupInputSlider gdprsupRound"></span>
						</label>
					</td>
					<td>
						<div class="gdprsupAgreeLabel"><?php echo $a['label'];?></div>
						<div class="gdprsupAgreeDesc"><?php echo $a['desc'];?></div>
					</td>
				</tr>
			<?php }?>
			</table>
		</div>
	<?php }?>
	<div class="gdprsupBtns">
		<?php
			$btns = $this->getModule()->getButtons();
			foreach($btns as $k => $b) {
				if($this->opts['btns'][$k. '_enb']) {
					$id = 'gdprsupBtn_'. $k;
					$btnStyles = array(
						'color' => $this->opts['btns'][$k. '_color_txt'],
						'border-color' => utilsGdprsup::adjustBrightness($this->opts['btns'][$k. '_color_bg'], -50),
					);
					$classes = array('gdprsupNotifyBtn');
					$btnStyled = false;
					if(!isset($this->opts['btns'][$k. '_lnk_style']) || !$this->opts['btns'][$k. '_lnk_style']) {
						$classes[] = 'gdprsupNotifyBtnStyled';
						$btnStyled = true;
						$btnStyles['background-color'] = $this->opts['btns'][$k. '_color_bg'];
					}
					if($this->opts['btns'][$k. '_new_line']) {
						$btnStyles['display'] = 'block';
					}
		?>
		<?php if($btnStyled) { ?>
		<style>#<?php echo $id;?>:hover {background-color: <?php echo utilsGdprsup::adjustBrightness($this->opts['btns'][$k. '_color_bg'], -25);?> !important;}</style>
		<?php } else { ?>
		<style>#<?php echo $id;?>:hover {color: <?php echo utilsGdprsup::adjustBrightness($this->opts['btns'][$k. '_color_txt'], -25);?> !important;}</style>
		<?php } ?>
		<?php
			$url = isset($this->opts['btns'][$k. '_url']) ? $this->opts['btns'][$k. '_url'] : '#';
			$blank = isset($this->opts['btns'][$k. '_blank']) && $this->opts['btns'][$k. '_blank'] ? 'target="_blank"' : '';
		?>
		
		<a id="<?php echo $id;?>" href="<?php echo $url;?>" <?php echo $blank;?> class="<?php echo implode(' ', $classes)?>" style="<?php echo utilsGdprsup::arrToCss($btnStyles);?>">
			<?php echo $this->opts['btns'][$k. '_lbl'];?>
		</a>
		<?php
				}
			}
		?>
	</div>
</div>
<?php
	if($this->opts['main']['enb_show_again_tab']) {
?>
<div id="gdprsupShowAgainShell" class="
	gdprsup-<?php echo $showAgainPos?>
	gdprsup-<?php echo $showAgainSide;?>
	" style="<?php echo utilsGdprsup::arrToCss($showAgainStyles);?>">
	<?php echo $this->opts['main']['show_again_tab_txt']?>
</div>
<?php
	}
?>