<?php
/**
 * Meta box
 *
 * @package Aithenticate
 */

defined( 'ABSPATH' ) || exit;

$content_type         = get_post_meta( $post->ID, '_content_type', true );
$aithenticate_enabled = get_post_meta( $post->ID, '_aithenticate_enabled', true );

?>

<div class="aithenticate">
	<div class="pretty p-switch p-fill block mt-4 text-base leading-none">
		<input type="checkbox" name="aithenticate_enabled" <?php checked( $aithenticate_enabled ); ?>/>
		<div class="state p-primary">
			<label>
				<?php esc_html_e( 'Show Aithenticate icon', 'aithenticate' ); ?>
			</label>
		</div>
	</div>

	<div class="mt-6">
		<label class="text-neutral-400"><?php esc_html_e( 'Turn visiblity on or off', 'aithenticate' ); ?></label>

		<a
			href="<?php menu_page_url( 'aithenticate' ); ?>"
			target="_blank"
			class="button mt-2"
		>
			<?php esc_html_e( 'Global settings', 'aithenticate' ); ?>
		</a>
	</div>

	<div class="mt-6">
		<div class="pretty p-default p-curve text-base leading-none block">
			<input
				type="radio"
				name="content_type"
				value="ai"
				<?php checked( $content_type, 'ai' ); ?>
			/>
			<div class="state p-primary-o">
				<label>
					<?php esc_html_e( 'AI Content', 'aithenticate' ); ?>
					<img
						src="<?php echo esc_url( aithenticate()->plugin_url() . 'assets/images/ai-content.png' ); ?>"
						class="w-6 absolute right-0 top-1/2 -translate-y-1/2"
						alt=""
					>
				</label>
			</div>
		</div>

		<div class="pretty p-default p-curve text-base leading-none block mt-4">
			<input
				type="radio"
				name="content_type"
				value="human"
				<?php checked( $content_type, 'human' ); ?>
			/>
			<div class="state p-primary-o">
				<label>
					<?php esc_html_e( 'Human Content', 'aithenticate' ); ?>
					<img
						src="<?php echo esc_url( aithenticate()->plugin_url() . 'assets/images/human-content.png' ); ?>"
						class="w-6 absolute right-0 top-1/2 -translate-y-1/2"
						alt=""
					>
				</label>
			</div>
		</div>
	</div>

	<p class="mt-6">
		<span class="font-bold"><?php echo esc_html( aithenticate_get_enabled_posts_count() ); ?>/<?php echo esc_html( aithenticate_get_license_type() ); ?></span>
		<?php esc_html_e( 'Implementations used.', 'aithenticate' ); ?>
	</p>

	<?php if ( 'unlimited' !== aithenticate_get_license_type() ) : ?>
		<div class="mt-6 bg-emerald-50 text-green-700 p-3 border border-solid border-green-700 flex items-center gap-1">
			<span class="dashicons dashicons-star-filled"></span>
			<span><?php esc_html_e( 'More pages/posts?', 'aithenticate' ); ?></span>
			<a
				href="https://aithenticate.org/pricing"
				target="_blank"
				class="underline ml-auto"
			>
				<?php esc_html_e( 'Upgrade', 'aithenticate' ); ?>
			</a>
		</div>
	<?php endif; ?>

	<?php if ( in_array( $post->post_type, aithenticate_get_fixed_ai_post_types(), true ) ) : ?>
		<div class="mt-6 bg-emerald-50 text-green-700 p-3 border border-solid border-green-700 flex items-center gap-1">
			<span class="dashicons dashicons-star-filled"></span>
			<span class="text-center"><?php esc_html_e( 'Site wide implementations active', 'aithenticate' ); ?></span>
		</div>
	<?php endif; ?>
</div>
