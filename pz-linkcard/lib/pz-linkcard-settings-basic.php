<?php defined('ABSPATH' ) || wp_die; ?>
<div class="pz-page" id="pz-basic">
	<div class="pz-submit-float"><?php submit_button(); ?></div>
	<h2><?php echo	__('Basic Settings', TEXT_DOMAIN ).$help_open.'basic'.$help_close; ?></h2>
	<table class="form-table">

<?php
	// 簡単書式設定
	$item_name		=	'special-format';
	$item_list		=	array(
		''			=>		__('None',							TEXT_DOMAIN),
		'LkC'		=>		__('Pz-LkC Default',				TEXT_DOMAIN),
		'hbc'		=>		__('Normal',						TEXT_DOMAIN),
		'cmp'		=>		__('Compact',						TEXT_DOMAIN),
		'smp'		=>		__('Simple',						TEXT_DOMAIN),
		'JIN'		=>		__('Headline',						TEXT_DOMAIN),
		'ct1'		=>		__('Cellophane tape "center"',		TEXT_DOMAIN),
		'ct2'		=>		__('Cellophane tape "Top corner"',	TEXT_DOMAIN),
		'ct3'		=>		__('Cellophane tape "long"',		TEXT_DOMAIN),
		'ct4'		=>		__('Cellophane tape "digonal"',		TEXT_DOMAIN),
		'tac'		=>		__('Cellophane tape and curling',	TEXT_DOMAIN),
		'ppc'		=>		__('Curling paper',					TEXT_DOMAIN),
		'sBR'		=>		__('Stitch blue & red',				TEXT_DOMAIN),
		'sGY'		=>		__('Stitch green & yellow',			TEXT_DOMAIN),
		'sqr'		=>		__('Square',						TEXT_DOMAIN),
		'ecl'		=>		__('Enclose',						TEXT_DOMAIN),
		'ref'		=>		__('Reflection',					TEXT_DOMAIN),
		'inI'		=>		__('Infomation orange',				TEXT_DOMAIN),
		'inN'		=>		__('Neutral bluegreen',				TEXT_DOMAIN),
		'inE'		=>		__('Enlightened green',				TEXT_DOMAIN),
		'inR'		=>		__('Resistance blue',				TEXT_DOMAIN),
		'wxp'		=>		__('Windows XP',					TEXT_DOMAIN),
		'w95'		=>		__('Windows 95',					TEXT_DOMAIN),
		'slt'		=>		__('Slanting',						TEXT_DOMAIN),
		'3Dr'		=>		__('3D Rotate',						TEXT_DOMAIN),
		'pin'		=>		__('Pushpin',						TEXT_DOMAIN),
	);
	$item_descript		=	__('Easy Format',					TEXT_DOMAIN );
	$item_notice		=	__('*', TEXT_DOMAIN ).' '.__('It applies over other formatting settings.', TEXT_DOMAIN );
	echo_list($item_name, $prop[$item_name], $item_list, $item_descript, $item_notice );
?>

		<tr>
			<th scope="row"><?php _e('Saved Datetime', TEXT_DOMAIN ); ?></th>
			<td>
				<input type="text" size="40" value="<?php echo is_numeric($this->options['saved-date'] ) ? esc_html($this->pz_Date(DATETIME_FORMAT, $this->options['saved-date'] ) ) : $this->options['saved-date']; ?>" readonly="readonly" />
				<input name="properties[saved-date]" type="text" value="<?php echo $this->options['saved-date']; ?>" class="pz-admin-only" readonly="readonly" />
			</td>
		</tr>
	</table>
	<?php submit_button(); ?>

	<h2><?php echo	__('Changelog', TEXT_DOMAIN ); ?></h2>
	<div class="pz-changelog">
		<?php echo	$changelog; ?>
	</div>
	<?php submit_button(); ?>

	<h2><?php echo	__('Related Information', TEXT_DOMAIN ); ?></h2>
	<table class="form-table">
		<tr>
			<th scope="row"><?php echo	__('How to', TEXT_DOMAIN ).' '.__('(', TEXT_DOMAIN ).__('Japanese Only', TEXT_DOMAIN ).__(')', TEXT_DOMAIN ); ?></th>
			<td>
				<p><?php echo	self::PLUGIN_NAME.' Ver.'.PLUGIN_VERSION; ?></p>
				<p><a href="<?php echo	esc_attr($plugin_url ); ?>" rel="external noopener" target="_blank"><?php echo	esc_attr($plugin_url ); ?></a></p>
			</td>
		</tr>
		<tr>
			<th scope="row"><?php _e("Author's Site", TEXT_DOMAIN ); ?></th>
			<td><?php echo	__('Popozure.', TEXT_DOMAIN ).' ('.__("Poporon's PC Daily Diary", TEXT_DOMAIN ).')'; ?><BR><a href="<?php echo $pz_url; ?>" rel="external noopener" target="_blank"><?php echo $pz_url; ?></A></td>
		</tr>
		<tr>
			<th scope="row"><?php _e('When in Trouble', TEXT_DOMAIN ); ?></th>
			<td><?php echo	__('Twitter Account', TEXT_DOMAIN ); ?><BR><a href="<?php echo self::AUTHOR_TWITTER_URL; ?>" rel="external noopener" target="_blank"><?php echo self::AUTHOR_TWITTER; ?></A></td>
		</tr>

		<tr class="pz-debug-only">
			<th scope="row"><?php _e('Donation', TEXT_DOMAIN ); ?></th>
			<td><a href="<?php echo self::AUTHOR_DONATE_URL; ?>" rel="external noopenner noreferrer" target="_blank" target="_blank"><?php _e('Wishlist', TEXT_DOMAIN ); ?></a></td>
		</tr>

	</table>
	<?php submit_button(); ?>
</div>
