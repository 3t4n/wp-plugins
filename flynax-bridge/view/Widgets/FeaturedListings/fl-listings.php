<?= $args['before_widget']; ?>

<?php if ($widgetTitle): ?>
    <?= $widgetTitle ?>
<?php endif; ?>

<div class="flb-recently-added-wrapper">
    <?php if ($listings): ?>
		<ul>
            <?php foreach ($listings as $listing): ?>
				<li class="listing-element">
                    <?php if ($listing['img']): ?>
						<div class="listing-image" <?= $imgStyle; ?> >
							<a href="<?= $listing['url'] ?>">
								<img src="<?= $listing['img'] ?>" <?php if($listing['img_x2']):?> srcset="<?=$listing['img_x2']?> 2x"  <?php endif;?> ">
							</a>
						</div>
                    <?php endif; ?>
					<ul class="listing-fields">
						<li class="flb_title">
							<a href="<?= $listing['url']; ?>"><?= $listing['title'] ?></a>
						</li>
						<li><?= $listing['fields']; ?></li>
					</ul>
				</li>
            <?php endforeach; ?>
		</ul>
    <?php else: ?>
		<div><?= __("There are no listings on the site yet", 'flynax-bridge') ?></div>
    <?php endif; ?>
</div>

<?= $args['after_widget']; ?>
