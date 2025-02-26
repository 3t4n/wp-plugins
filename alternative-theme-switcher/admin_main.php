<style>
	.item .field{
		float:left;
	}
</style>
<div class="wrap">
	<h2><?php _e('Alternative Theme Switcher', 'altthemeswitcher');?></h2>	
	<form method="post" action="options.php">
		<?php
			settings_fields('ats-options-group');
			$sThemes = get_option('ats_switchable_themes');
			$atsDefault = get_option('ats_default');
		?>
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<td scope="row"><?php _e('Switchable themes', 'altthemeswitcher');?></td>
					<td></td>
				</tr>
				<tr>
					<td><?php _e('Widget text', 'altthemeswitcher');?> :</td>
					<td><input type="text" name="ats_label" value="<?php echo get_option('ats_label');?>" /></td>
				</tr>
			</table>
			<?php
				global $_WIDGET;
				$available_themes = altThemeSwitcher::getInstance()->getThemes();
				$string = '<div class="altThemeContainer">';
				foreach($available_themes as $theme){
					$string .= '<div class="item">
						<div class="field" style="width:200px;">
							<label>
								<input type="checkbox" '.(!empty($sThemes['theme'][$theme])?'checked="checked"':'').' name="ats_switchable_themes[theme]['.$theme.']" value="'.$theme.'" />'
								.preg_replace('!(?:([^/]+)/altThemes/)?([^/]+)/style.css!', ' $1 $2', $theme).'
							</label>
						</div>
						<div class="field" style="width:200px;">
							<label>
								<input type="radio" '.(empty($atsDefault) || $atsDefault != $theme?'':'checked="checked"').' name="ats_default" value="'.$theme.'" />'
								.__("Default", 'altthemeswitcher').'
							</label>
						</div>
						<div class="field" style="width:240px;">
							<label>
								'.__('Name', 'altthemeswitcher').' : 
								<input type="text" name="ats_switchable_themes[name]['.$theme.']" value="'.(empty($sThemes['name'][$theme])?'':$sThemes['name'][$theme]).'" />
							</label>
						</div>
						<div class="field">
							<label>
								'.__('Color', 'altthemeswitcher').' : 
								<input type="text" size="6" name="ats_switchable_themes[color]['.$theme.']" value="'.(empty($sThemes['color'][$theme])?'':$sThemes['color'][$theme]).'" />
							</label>
						</div>
						<div style="clear:both;"></div>
					</div>';
				}
				echo $string.'</div>';
			?>
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes', 'altthemeswitcher') ?>" />
			</p>
	</form>
	<?php
		$usage = '<h3>'.__('Usage', 'altthemeswitcher').' :</h3>
	<p>'.__('There are two usages of this plugin', 'altthemeswitcher').' :</p>
	<ol>
		<li>
			'.__('You have several themes in different directory under', 'altthemeswitcher').' <code>wp-content/themes</code>. '.__('You can switch the main css stylesheet by clicking on the appropriate button.
			In this case, the current theme and the switched theme must have the same layout !', 'altthemeswitcher').'
		</li>
		<li>
			<p>'.__('You just want to switch some items of your theme. So you can create alternatives themes', 'altthemeswitcher').'.</p>
			<p>'.__('To create en alternative theme, create a directory', 'altthemeswitcher').' <code>altThemes</code>.</p>
			<p>'.__('Each subdirectory will be an alternative theme and must have a stylesheet', 'altthemeswitcher').' : <code>style.css</code></p>
			<p>'.__('Now, you should have', 'altthemeswitcher').' : <code>wp-content/themes/(mainTheme)/altThemes/(altThemes)/style.css</code> ('.__('and optionally an images dir', 'altthemeswitcher').')</p>
			<p>'.__('By clicking on an altenative theme button, it will switch the main stylesheet and the alternative stylesheet', 'altthemeswitcher').'. <strong>'.__('The alternative stylesheet only contains alternative style directives !', 'altthemeswitcher').'</strong></p>
		</li>
	</ol>
	<p>'.__('To render the widget, just copy this sample where you want to display it', 'altthemeswitcher').' : <code>&lt;?php if ( class_exists( \'altThemeSwitcher\' ) ) altThemeSwitcher::getInstance()->render();?&gt;</code></p>';
	echo $usage;
	?>
</div>