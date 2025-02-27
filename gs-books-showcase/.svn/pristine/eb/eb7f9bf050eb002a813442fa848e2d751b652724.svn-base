<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

$gsbks_st_retails = Helpers::get_post_meta( 'gs_repeatable_fields' );
$book_prefs 	  = plugin()->builder->_get_shortcode_pref( false );

$store_display = apply_filters( 'gsbks_retail_switcher', $book_prefs['store_display'] );


if ( ! empty( $gsbks_st_retails ) ) : ?>

	<div class="gsb-retails">

		<div class="gsb-sp-label">
			<h3><?php echo esc_html__( $localizations['gsb_store_text_modify'], 'gsbookshowcase' ); ?>:</h3>
		</div>

		<ul class="buy-store-link">

			<?php foreach ( $gsbks_st_retails as  $values ) : ?>

				<?php if( empty($values['url']) ) continue; ?>
				<li>
					
					<a href="<?php echo esc_url( $values['url'] ); ?>">

						<?php if ( $store_display === 'btn' ): ?>
							<div class="store-btn"> <?php echo $values['name']; ?> </div>
						<?php endif; ?>
						<?php if ( $store_display === 'image' ): ?>
							<?php wp_get_attachment_image( $values['uploaded_img_id'], 'medium', false, ['class' => 'store_img'] ); ?>
						<?php endif; ?>
						<?php if ( $store_display === 'both' ): ?>
							<div class="store-btn"> <?php echo $values['name']; ?> </div>
							<?php wp_get_attachment_image( $values['uploaded_img_id'], 'medium', false, ['class' => 'store_img'] ); ?>
						<?php endif; ?>
					</a>
					
                </li>

			<?php endforeach; ?>
			
		</ul>

	</div>
<?php endif; ?>