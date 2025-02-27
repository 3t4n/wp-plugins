<?php
include $this->getPath( 'views/shared/header.php' );
?>
    <div class="totalcontest-page-content">
		<?php echo wp_kses( empty( $content ) ? esc_html__( 'Thank you!', 'totalcontest' ) : $content, TotalContest('allowed-tags') ); ?>
        <a href="<?php echo esc_attr( $submission->getPermalink() ); ?>">&larr;&nbsp;<?php  esc_html_e( 'Back', 'totalcontest' ); ?></a>
    </div>
<?php
include $this->getPath( 'views/shared/footer.php' );
