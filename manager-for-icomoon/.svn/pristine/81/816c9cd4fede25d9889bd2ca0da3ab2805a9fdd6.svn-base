<?php namespace managerForIcomoon ;  ?>

<h2><?= __( "Icon List", 'managerforicomoon'); ?></h2>

<?php if(Core::getIcons(true)) :?>
	<table class="managerforicomoon-table managerforicomoon-page-icons">
		<input id="clipboard" type="text" hidden>
		<tr>
			<th><?= __( "Preview ", 'managerforicomoon'); ?></th>
			<th><?= __( "Icon name", 'managerforicomoon'); ?></th>
			<th><?= __( "Code", 'managerforicomoon'); ?></th>
			<th><?= __( "HTML", 'managerforicomoon'); ?></th>
			<th><?= __( "Shortcode", 'managerforicomoon'); ?></th>
		</tr>
		<?php $i = 0 ; foreach(Core::getIcons() as $icon) : ?>
			<tr id="icon-<?= $i;?>">
			<td class="managerforicomoon-td-icon"><?= $icon['icon'] ;?></td> 
				<td class="managerforicomoon-td-name"><?= $icon['name'] ;?></td>
				<td class="managerforicomoon-td-content">
					<code class="managerforicomoon-page-icons--copy" data-text="<?= $icon['code']; ?>" data-message="<?= __( "Code copied to the clipboard !", 'managerforicomoon'); ?>">
						<?= $icon['code'] ;?>
					</code>
				</td>
				<td class="managerforicomoon-td-html">
					<code class="managerforicomoon-page-icons--copy" data-text="<?= htmlentities($icon['icon']); ?>" data-message="<?= __( "HTML copied to the clipboard !", 'managerforicomoon'); ?>">
						<?= htmlentities($icon['icon']) ;?>
					</code>
				</td>
				<td class="managerforicomoon-td_shortcode">
					<code class="managerforicomoon-page-icons--copy" data-text='<?= $icon['shortcode']; ?>' data-message="<?= __( "Shortcode copied to the clipboard !", 'managerforicomoon'); ?>">
						<?= $icon['shortcode'] ;?>
					</code>
				</td>
			</tr>
		<?php $i++ ; endforeach;?>
	</table>
<?php else :?>
	<p><?= __( "Style.css file does not contain any icons.", 'managerforicomoon'); ?></p>
<?php endif; ?>
