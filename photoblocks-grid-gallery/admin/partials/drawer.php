<div id="pb-drawer">
	<div class="pb-shoulder close-drawer"></div><!--
		--><div class="pb-content">
		<?php require 'drawer-sections/gallery.php'; ?>
		<?php require 'drawer-sections/image.php'; ?>
		<?php require 'drawer-sections/text.php'; ?>
		<?php if ( photob_fs()->is__premium_only() ) : ?>
			<?php include 'drawer-sections/source.php'; ?>
		<?php endif ?>
	</div>
</div>
