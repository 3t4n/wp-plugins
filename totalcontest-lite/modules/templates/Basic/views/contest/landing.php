<?php include $this->getPath( 'views/shared/header.php' ); ?>

<div class="totalcontest-page-content totalcontest-page-content-landing">
	<?php echo wp_kses($content, TotalContest('allowed-tags')); ?>
</div>

<?php include $this->getPath( 'views/shared/footer.php' ); ?>
