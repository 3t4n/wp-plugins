<?php
/**
 * ER Theme - 1
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/public
 */

// Get pros-cons label.
$wpas_pros_label = empty( $wpas_meta_values['wpas-pros-label'] ) ? 'PROS' : $wpas_meta_values['wpas-pros-label'];
$wpas_cons_label = empty( $wpas_meta_values['wpas-cons-label'] ) ? 'CONS' : $wpas_meta_values['wpas-cons-label'];

// Enqueuing.
wp_enqueue_style( $this->plugin_name );
wp_enqueue_style( $this->plugin_name . '-icomoon' );
wp_enqueue_script( $this->plugin_name . 'wpas-star-rating' );
wp_enqueue_script( $this->plugin_name . 'wpas-useful-script' );
$wpas_bar_animation_data = '';
if ( $wpas_bar_animation ) {

	$wpas_bar_animation_data = 'true';
} else {

	$wpas_bar_animation_data = 'false';
}
?>
<div id="wpas-er-<?php echo esc_attr( $wpas_post_id ); ?>" class="wpas--rating-wrap wpas-theme-1" data-id="<?php echo esc_attr( $wpas_post_id ); ?>" data-vote="<?php echo esc_attr( $frhd_total_vote ); ?>" data-star="<?php echo esc_attr( $frhd_total_star ); ?>" data-baranim="<?php echo esc_attr( $wpas_bar_animation_data ); ?>">
	<?php if ( $wpas_editorial_date_show ) : ?>
	<div class="wpas--rating-date">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192h80v56H48V192zm0 104h80v64H48V296zm128 0h96v64H176V296zm144 0h80v64H320V296zm80-48H320V192h80v56zm0 160v40c0 8.8-7.2 16-16 16H320V408h80zm-128 0v56H176V408h96zm-144 0v56H64c-8.8 0-16-7.2-16-16V408h80zM272 248H176V192h96v56z"/></svg>
		<strong><?php echo esc_html( $wpas_editorial_date_label ); ?></strong>
		<?php
		if ( ! empty( $wpas_editorial_date_custom ) ) {

			echo '<time>' . $wpas_editorial_date_custom . '</time>';
		} else {

			echo '<time datetime="' . get_the_modified_date( 'c' ) . '">' . get_the_modified_date('d, M Y') . '</time>';
		}
		?>
	</div>
	<?php endif; ?>
	<div class="wpas--rating-header">
		<div class="wpas--rating-score">
			<span class="wpas--overall-score"><?php echo esc_html( $wpas_total_rating_math_round ); ?></span>
			<span class="wpas--rating-text">TOTAL SCORE</span>
		</div>
		<div class="wpas--rating-meta"<?php echo $wpas_user_rating_shows ? '' : 'style="flex-basis: 75%;"'; ?>>
			<?php
			if ( $wpas_product_name_linked ) {

				echo '<h4 class="wpas--rating-title"><a href="' . $wpas_product_btn_url . '" target="' . ( '1' !== $wpas_product_btn_target ? '_self"' : '_blank"' ) . ( '1' === $wpas_product_btn_nofollow ? ' rel="nofollow"' : '' ) . '>' . esc_html( $wpas_score_title ) . '</a></h4>';
			} else {

				echo '<h4 class="wpas--rating-title">' . esc_html( $wpas_score_title ) . '</h4>';
			}
			if ( $wpas_product_btn_show ) :
			?>
			<a href="<?php echo esc_url( $wpas_product_btn_url ); ?>" class="wpas--product-link" target="<?php echo ( '1' !== $wpas_product_btn_target ? '_self"' : '_blank"' ) . ( '1' === $wpas_product_btn_nofollow ? ' rel="nofollow"' : '' ) . '>'; ?><?php echo esc_html( $wpas_product_btn_txt ); ?></a>
			<?php endif; ?>
		</div>

	<?php if ( $wpas_user_rating_shows ) : ?>
	<div class="frhd--user-rating">
		<div class="frhd--rate-cover">
			<span class="frhd--rate-visual"></span>
		</div>
		<strong class="wpas--total-category"><span class="frhd-rate-math"><?php echo esc_html( $frhd_rate_math_round ); ?></span> Out of 5</strong>
		<p>Based on <strong><?php echo esc_html( $frhd_total_vote ); ?></strong> Users</p>
	</div>
	<?php endif; ?>
	</div>

	<div class="wpas-rating-content-wrap">

	<?php
	if ( $wpas_product_image_url ) {

		if ( $wpas_product_img_linked ) {

			echo '<figure class="wpas--product-img">
				<a href="' . $wpas_product_btn_url . '" target="' . ( '1' !== $wpas_product_btn_target ? '_self"' : '_blank"' ) . ( '1' === $wpas_product_btn_nofollow ? ' rel="nofollow"' : '' ) . '>
					<img height="120" src="' . esc_url( $wpas_product_image_url ) . '" alt="' . esc_attr( $wpas_product_image_alt ) . '">
				</a>
			</figure>';
		} else {

			echo '<figure class="wpas--product-img">
				<img height="120" src="' . esc_url( $wpas_product_image_url ) . '" alt="' . esc_attr( $wpas_product_image_alt ) . '">
			</figure>';
		}
	}
	?>

	<?php
	if ( $wpas_editorial_rating_show ) {

		echo '<div class="wpas--rating-categories">';

		foreach ( $wpas_editorial_rating as $wpas_editorial_rating_key => $wpas_editorial_rating_value ) {

			echo '<div class="wpas--rating-detail">
					<span class="wpas--rating-name">' . $wpas_editorial_rating_value['wpas-editorial-rating-category-name'] . '</span>
					<span class="wpas--rating-rate"><strong>' . $wpas_editorial_rating_value['wpas-editorial-rating-category-rate'] . '</strong></span>
				</div>
				<div class="wpas--rating-meter">	
					<span class="wpas--rating-bar" style="width: ' . round( $wpas_editorial_rating_value['wpas-editorial-rating-category-rate'] ) . '0%"></span>
				</div>';
		}
		echo '</div>'; // wpas--rating-categories.
	}

	echo '</div>';

	echo '<div class="wpas--pros-cons-wrap">';

	if ( $is_wpas_pros_cons_shows ) {

			echo '<div class="wpas--pros-wrap">
				<span class="wpas--pros-title">' . $wpas_pros_label . '</span>
				<ul class="wpas--pros-list">';
				foreach ( $wpas_wpas_pros as $wpas_wpas_pros_key => $wpas_wpas_pros_value ) {

					echo '<li><span class="icon-checkmark"></span>' . $wpas_wpas_pros_value['wpas-pros-list'] . '</li>';
				}
				echo '</ul>
				<span class="wpas--title-cons"></span>
			</div>
			<div class="wpas--cons-wrap">
				<span class="wpas--cons-title">' . $wpas_cons_label . '</span>
				<ul class="wpas--cons-list">';
				foreach ( $wpas_wpas_cons as $wpas_wpas_cons_key => $wpas_wpas_cons_value ) {

					echo '<li><span class="icon-cross"></span>' . $wpas_wpas_cons_value['wpas-cons-list'] . '</li>';
				}
				echo '</ul>
			</div>';
	}
	if ( $wpas_score_overview ) {

		echo '<div class="wpas--bl-wrap">
			<span class="wpas--bl-title">Bottomline</span>
			<div class="wpas--bl-txt">' . wp_kses_post( wpautop( $wpas_score_overview ) ) . '</div>
		</div>';
	}
	echo '</div>';

	if ( $wpas_user_rating_shows ) :
		?>
	<div class="wpas-star-rating-wrap">
		<span class="frhd-user-notice"><?php echo esc_html( $wpas_user_rating_pre_txt ); ?></span>
		<div class="wpas-star-rating">
			<input id="star-5" type="radio" name="rating" value="5">
			<label for="star-5">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82819 2.13275L10.1988 4.87082C10.3331 5.13962 10.5923 5.32601 10.893 5.36914L13.959 5.81046C14.7165 5.91983 15.018 6.83791 14.4697 7.36396L12.2526 9.49433C12.0348 9.70382 11.9356 10.005 11.9871 10.3007L12.5103 13.3084C12.6392 14.0524 11.8473 14.62 11.1702 14.268L8.42991 12.847C8.16127 12.7076 7.83952 12.7076 7.57009 12.847L4.82975 14.268C4.15267 14.62 3.3608 14.0524 3.49043 13.3084L4.01288 10.3007C4.06443 10.005 3.96525 9.70382 3.74736 9.49433L1.53026 7.36396C0.982036 6.83791 1.28348 5.91983 2.041 5.81046L5.10699 5.36914C5.40765 5.32601 5.66771 5.13962 5.80203 4.87082L7.17181 2.13275C7.51074 1.45575 8.48926 1.45575 8.82819 2.13275Z" stroke="#A7A9AA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
			</label>

			<input id="star-4" type="radio" name="rating" value="4">
			<label for="star-4">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82819 2.13275L10.1988 4.87082C10.3331 5.13962 10.5923 5.32601 10.893 5.36914L13.959 5.81046C14.7165 5.91983 15.018 6.83791 14.4697 7.36396L12.2526 9.49433C12.0348 9.70382 11.9356 10.005 11.9871 10.3007L12.5103 13.3084C12.6392 14.0524 11.8473 14.62 11.1702 14.268L8.42991 12.847C8.16127 12.7076 7.83952 12.7076 7.57009 12.847L4.82975 14.268C4.15267 14.62 3.3608 14.0524 3.49043 13.3084L4.01288 10.3007C4.06443 10.005 3.96525 9.70382 3.74736 9.49433L1.53026 7.36396C0.982036 6.83791 1.28348 5.91983 2.041 5.81046L5.10699 5.36914C5.40765 5.32601 5.66771 5.13962 5.80203 4.87082L7.17181 2.13275C7.51074 1.45575 8.48926 1.45575 8.82819 2.13275Z" stroke="#A7A9AA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
			</label>

			<input id="star-3" type="radio" name="rating" value="3">
			<label for="star-3">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82819 2.13275L10.1988 4.87082C10.3331 5.13962 10.5923 5.32601 10.893 5.36914L13.959 5.81046C14.7165 5.91983 15.018 6.83791 14.4697 7.36396L12.2526 9.49433C12.0348 9.70382 11.9356 10.005 11.9871 10.3007L12.5103 13.3084C12.6392 14.0524 11.8473 14.62 11.1702 14.268L8.42991 12.847C8.16127 12.7076 7.83952 12.7076 7.57009 12.847L4.82975 14.268C4.15267 14.62 3.3608 14.0524 3.49043 13.3084L4.01288 10.3007C4.06443 10.005 3.96525 9.70382 3.74736 9.49433L1.53026 7.36396C0.982036 6.83791 1.28348 5.91983 2.041 5.81046L5.10699 5.36914C5.40765 5.32601 5.66771 5.13962 5.80203 4.87082L7.17181 2.13275C7.51074 1.45575 8.48926 1.45575 8.82819 2.13275Z" stroke="#A7A9AA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
			</label>

			<input id="star-2" type="radio" name="rating" value="2">
			<label for="star-2">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82819 2.13275L10.1988 4.87082C10.3331 5.13962 10.5923 5.32601 10.893 5.36914L13.959 5.81046C14.7165 5.91983 15.018 6.83791 14.4697 7.36396L12.2526 9.49433C12.0348 9.70382 11.9356 10.005 11.9871 10.3007L12.5103 13.3084C12.6392 14.0524 11.8473 14.62 11.1702 14.268L8.42991 12.847C8.16127 12.7076 7.83952 12.7076 7.57009 12.847L4.82975 14.268C4.15267 14.62 3.3608 14.0524 3.49043 13.3084L4.01288 10.3007C4.06443 10.005 3.96525 9.70382 3.74736 9.49433L1.53026 7.36396C0.982036 6.83791 1.28348 5.91983 2.041 5.81046L5.10699 5.36914C5.40765 5.32601 5.66771 5.13962 5.80203 4.87082L7.17181 2.13275C7.51074 1.45575 8.48926 1.45575 8.82819 2.13275Z" stroke="#A7A9AA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
			</label>

			<input id="star-1" type="radio" name="rating" value="1">
			<label for="star-1">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.82819 2.13275L10.1988 4.87082C10.3331 5.13962 10.5923 5.32601 10.893 5.36914L13.959 5.81046C14.7165 5.91983 15.018 6.83791 14.4697 7.36396L12.2526 9.49433C12.0348 9.70382 11.9356 10.005 11.9871 10.3007L12.5103 13.3084C12.6392 14.0524 11.8473 14.62 11.1702 14.268L8.42991 12.847C8.16127 12.7076 7.83952 12.7076 7.57009 12.847L4.82975 14.268C4.15267 14.62 3.3608 14.0524 3.49043 13.3084L4.01288 10.3007C4.06443 10.005 3.96525 9.70382 3.74736 9.49433L1.53026 7.36396C0.982036 6.83791 1.28348 5.91983 2.041 5.81046L5.10699 5.36914C5.40765 5.32601 5.66771 5.13962 5.80203 4.87082L7.17181 2.13275C7.51074 1.45575 8.48926 1.45575 8.82819 2.13275Z" stroke="#A7A9AA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
			</label>
		</div>
		<div class="frhd--user-rating-math-wrap">
			<strong class="frhd-rate-math"><?php echo esc_html( round( (float) $frhd_rate_math, 1 ) ); ?></strong>
			<span>(</span><span class="frhd-rate-count"><?php echo esc_html( $frhd_total_vote ); ?></span><span>)</span>
		</div>
	</div>

		<?php
	endif;
	echo '</div>';
