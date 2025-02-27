<?php include $this->getPath( 'views/shared/header.php' ); ?>
    <div class="totalcontest-page-content <?php echo esc_attr(empty( $customPage['id'] ) ?: "totalcontest-page-content-{$customPage['id']}"); ?>">
		<?php do_action( 'totalcontest/actions/contest/before/page/' . $customPage['id'], $contest ); ?>
		<?php echo wp_kses(apply_filters( 'totalcontest/filters/contest/custom-page-content/' . $customPage['id'], empty( $customPage['content'] ) ? '' : $customPage['content'], $contest, $customPage ), TotalContest('allowed-tags')); ?>
		<?php do_action( 'totalcontest/actions/contest/after/page/' . $customPage['id'], $contest ); ?>
    </div>
<?php include $this->getPath( 'views/shared/footer.php' );
