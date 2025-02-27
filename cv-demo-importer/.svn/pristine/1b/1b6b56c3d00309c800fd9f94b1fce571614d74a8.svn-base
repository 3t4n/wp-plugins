<?php
defined('ABSPATH') or die("No script kiddies please!");
/**
* Demo importer admin page
*
* @link       https://codevibrant.com/
* @since      1.0.0
*
* @package    CV Demo Importer
* @subpackage /admin/partials
*/

$activated_demo_check 	= get_option( 'cvdi_activated_check' );
$template 				= get_template();
?>
<div class="wrap demo-importer">
	<h1 class="wp-heading-inline dashicons-before dashicons-upload"><?php esc_html_e( 'CV Demo Importer', 'cv-demo-importer' ); ?></h1>
	<hr>
	<div class="theme-browser content-filterable rendered">
		<div class="cvdi-demo-themes wp-clearfix">
		<?php
			if ( isset( $demodata ) && empty( $demodata ) ) {
				esc_html_e( 'No demos are configured for this theme, please contact the theme author', 'cv-demo-importer' );
				return;
			} else {
				?>
				<div class="cvdi-demo-wrapper cvdi_gl js-ocdi-gl">
					<div class="cvdi_gl-item-container  wp-clearfix  js-ocdi-gl-item-container theme-browser rendered">
						<div class="themes wp-clearfix">
						<?php
							foreach ( $demodata as $value ) {
								$theme_name 		= $value['name'];
								$theme_slug 		= $value['theme_slug'];
								$preview_screenshot = $value['preview_screen'];
								$demourl 			= $value['preview_url'];
								if ( ( strpos( $template, 'pro' ) !== false && strpos( $theme_slug, 'pro' ) !== false ) ||
								( strpos( $template, 'pro' ) == false ) ) {
						?>
									<div class="cvdi-each-demo theme cvdi_gl-item js-ocdi-gl-item" data-categories="ltrdemo" data-name="<?php echo esc_attr( $theme_slug ); ?>" style="display: block;">
										<div class="cvdi-preview-screenshot cvdi_gl-item-image-container">
											<a href="<?php echo esc_url( $demourl ); ?>" target="_blank">
												<img class="cvdi_gl-item-image" src="<?php echo esc_url( $preview_screenshot ); ?>" />
											</a>
										</div><!-- .cvdi-preview-screenshot -->
										<div class="theme-id-container">
											<h2 class="cvdi-theme-name theme-name" id="current-theme-name"><?php echo esc_html( $theme_name ); ?></h2>
											<div class="cvdi-theme-actions theme-actions">
												<?php if ( $activated_demo_check != '' && $activated_demo_check == $theme_slug ) { ?>
														<?php /* translators: %s: theme name */ ?>
														<a class="button disabled button-primary hide-if-no-js" href="javascript:void(0);" data-name="<?php echo esc_attr( $theme_name ); ?>" data-slug="<?php echo esc_attr( $theme_slug ); ?>" aria-label="<?php printf( esc_html__( 'Imported %s', 'cv-demo-importer' ), esc_html( $theme_name ) ); ?>">
															<?php esc_html_e( 'Imported', 'cv-demo-importer' ); ?>
														</a>
												<?php } else {

														if ( strpos( $template, 'pro' ) == false && strpos( $theme_slug, 'pro' ) !== false ) {
															$s_slug 		= explode( "-pro", $theme_slug );
															$purchaseurl 	= 'https://codevibrant.com/wp-themes/'.$s_slug[0].'-pro';
												?>
															<?php /* translators: %s: theme name */ ?>
															<a class="button button-primary cvdi-purchasenow" href="<?php echo esc_url( $purchaseurl ); ?>" target="_blank" data-name="<?php echo esc_attr( $theme_name ); ?>" data-slug="<?php echo esc_attr( $theme_slug ); ?>" aria-label="<?php printf( esc_html__( 'Purchase Now %s', 'cv-demo-importer' ), esc_html( $theme_name ) ); ?>">
																<?php esc_html_e( 'Purchase Now', 'cv-demo-importer' ); ?>
															</a>
												<?php
														} else {
												?>
															<?php /* translators: %s: theme name */ ?>
															<a class="button button-primary hide-if-no-js cvdi-demo-import" href="javascript:void(0);" data-name="<?php echo esc_attr( $theme_name ); ?>" data-slug="<?php echo esc_attr( $theme_slug ); ?>" aria-label="<?php printf( esc_html__( 'Import %s', 'cv-demo-importer' ), esc_html( $theme_name ) ); ?>">
																<?php esc_html_e( 'Import', 'cv-demo-importer' ); ?>
															</a>
												<?php
														}
													}
												?>
													<a class="button preview install-demo-preview" target="_blank" href="<?php echo esc_url( $demourl ); ?>">
														<?php esc_html_e( 'View Demo', 'cv-demo-importer' ); ?>
													</a>
											</div><!-- .cvdi-theme-actions -->
										</div><!-- .theme-id-container -->
									</div><!-- .cvdi-each-demo -->
						<?php
								}
							}
						?>
						</div><!-- .themes -->
					</div><!-- .cvdi_gl-item-container -->
				</div><!-- .cvdi-demo-wrapper -->
		<?php
			}
		?>
		</div><!-- .cvdi-demo-themes -->
	</div><!-- .theme-browser -->
</div><!-- .wrap.demo-importer-->