<div class="pixcode  pixcode--team-member  team-member  <?php echo esc_attr( $class ) ?>">

	<?php if ( ! empty( $image ) ) : ?>

		<div class="team-member__image">

			<?php if ( ! empty( $imagelink ) ) : ?>

				<a href="<?php echo esc_url( $imagelink ) ?>" class="team-member__image__link"
				   title="More about <?php echo ! empty( $name ) ? esc_attr( $name ) : ''; ?>">
					<div class="team-member__image__container">
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo ! empty( $name ) ? esc_attr( $name ) : ''; ?>">
					</div>
					<div class="team-member__profile">
						<div class="team-member__profile__table">
                            <span class="team-member__profile__cell">
                               <i class="shc big icon-link"></i>
                            </span>
						</div>
					</div>
				</a>

			<?php else: ?>

				<div class="team-member__image__link">
					<div class="team-member__image__container">
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo ! empty( $name ) ? esc_attr( $name ) : ''; ?>">
					</div>
				</div>

			<?php endif; ?>

		</div>
	<?php endif; ?>

	<div class="team-member__header">
		<?php if ( ! empty( $name ) ) : ?>
			<h5 class="team-member__name"><?php echo esc_html( $name ); ?></h5>
		<?php endif; ?>
		<?php if ( ! empty( $title ) ) : ?>
			<h6 class="team-member__position"><?php echo esc_html( $title ); ?></h6>
		<?php endif; ?>
	</div>

	<div class="team-member__description">
		<?php echo wp_kses_post( $this->get_clean_content( $content ) ); ?>
	</div>

	<hr class="separator separator--striped"/>

	<div class="team-member__footer">
		<ul class="team-member__social-links-list">
			<?php if ( ! empty( $social_twitter ) ) : ?>
				<li class="team-member__social-link">
					<a class="team-member__social-link__link" href="<?php echo esc_url( $social_twitter ); ?>" target="_blank">
						<i class="shc  shc--icon  icon-twitter"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if ( ! empty( $social_facebook ) ) : ?>
				<li class="team-member__social-link">
					<a class="team-member__social-link__link" href="<?php echo esc_attr( $social_facebook ); ?>" target="_blank">
						<i class="shc  shc--icon  icon-facebook"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if ( ! empty( $social_linkedin ) ) : ?>
				<li class="team-member__social-link">
					<a class="team-member__social-link__link" href="<?php echo esc_attr( $social_linkedin ); ?>" target="_blank">
						<i class="shc  shc--icon  icon-linkedin"></i>
					</a>
				</li>
			<?php endif; ?>
			<?php if ( ! empty( $social_pinterest ) ) : ?>
				<li class="team-member__social-link">
					<a class="team-member__social-link__link" href="<?php echo esc_attr( $social_pinterest ); ?>" target="_blank">
						<i class="shc  shc--icon  icon-pinterest"></i>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</div>
