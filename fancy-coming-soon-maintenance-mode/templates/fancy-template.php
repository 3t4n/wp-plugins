<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<title><?php bloginfo( 'name' ); $site_description = get_bloginfo( 'description' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="<?php echo plugins_url('assets/css/style.css?v=1.4.0',dirname(__FILE__)); ?>">
	<link rel="stylesheet" id="luunch_source_sans_pro-css"  href="//fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C400%2C700" type="text/css" media="all" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo plugins_url('assets/js/main.js',dirname(__FILE__)); ?>"></script>

	<style type="text/css">
		body {
			background-color:<?php echo esc_attr( get_option('fancy_coming_soon_background_color', '#f5f5f5') ); ?> !important;
			background-repeat:<?php echo esc_attr(get_option( 'fancy_coming_soon_background_repeat', 'no-repeat')); ?> !important;
			background-position: <?php echo esc_attr(get_option( 'fancy_coming_soon_background_position', 'center')); ?> !important;
			background-attachment:fixed;
			-webkit-background-size: <?php echo esc_attr(get_option( 'fancy_coming_soon_background_cover', 'cover')); ?>; -moz-background-size: <?php echo esc_attr(get_option( 'fancy_coming_soon_background_cover', 'cover')); ?>; -o-background-size: <?php echo esc_attr(get_option( 'fancy_coming_soon_background_cover', 'cover')); ?>; background-size: <?php echo esc_attr(get_option( 'fancy_coming_soon_background_cover', 'cover')); ?>;
			<?php if (get_option( 'fancy_coming_soon_background_image', plugin_dir_url( __FILE__ ) .'../assets/images/bg.jpg') ) : ?>
				background-image:url("<?php echo esc_attr(get_option( 'fancy_coming_soon_background_image', plugin_dir_url( __FILE__ ) .'../assets/images/bg.jpg' )); ?>") !important;
			<?php endif ?>
		}
		<?php echo wp_kses(get_option( 'fancy_coming_soon_page_custom_css' ), true); ?>
	</style>

	<?php if ( $custom_code = get_option( 'fancy_coming_soon_custom_code_header', false ) ) echo $custom_code; ?>

</head>
<body class="body-color-<?php echo get_option( 'fancy_coming_soon_content_color', 'light' ); ?>">

	<div id="body-background">

		<div id="loading">
			<span class="status icon"></span>
		</div>

		<header class="row" id="header">
			
			<div class="content">
				<?php if ( $logo_image = get_option( 'fancy_coming_soon_plugin_logo', plugin_dir_url( __FILE__ ) .'../assets/images/logo.png') ) : ?>
					<?php
						if ( get_option( 'fancy_coming_soon_plugin_logo_force_https', 'no' ) == 'yes' ) {
							$logo_image = str_replace( 'http', 'https', $logo_image );
						}
					?>
					<span class="logo"><img src="<?php echo esc_url( $logo_image ); ?>" alt="<?php bloginfo('name'); ?>"></span>
				<?php else: ?>
					<span><?php bloginfo('name'); ?></span>
				<?php endif; ?>          
			</div>

			<?php if (get_option( 'fancy_coming_soon_percentage_completed', '75') ) : ?>
				<div class="status" style="width:  <?php echo esc_attr(get_option( 'fancy_coming_soon_percentage_completed', '75')); ?>%;">
					<span><?php echo esc_attr(get_option( 'fancy_coming_soon_percentage_completed', '75')); ?>%</span>
				</div>
			<?php else: ?>
				<div class="status"></div>
			<?php endif; ?>

		</header>

		<div class="row" id="intro">

			<div class="content">

				<div id="pre-subscribe">

					<div class="row" id="copy">

						<?php echo wp_kses(get_option( 'fancy_coming_soon_page_heading', '<h1>Something <strong>really good</strong> is coming <strong>very soon</strong>.</h1>' ), true); ?>
						<p><?php echo wp_kses(get_option( 'fancy_coming_soon_page_content', 'If you have something new you’re looking to launch, you’re going to want to start building a community of people interested in what you’re launching. The Launch template by is the best way to do just that.' ), true); ?></p>

						<?php if (!get_option( 'fancy_coming_soon_mailchimp_form') == 1 ) : ?>

							<div class="row" id="subscribe">
							
								<form action="<?php if (get_option( 'fancy_coming_soon_mailchimp_form_url')) { echo esc_attr(get_option( 'fancy_coming_soon_mailchimp_form_url')); } ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="row" class="validate" id="mailchimp" target="_blank">

									<div class="mc-field-group"> <input type="email" name="EMAIL" class="required email" id="mce-EMAIL"  value="" placeholder="you@youremail.com"></div>

									<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div>
									
									<button type="submit" name="subscribe"  id="mc-embedded-subscribe" class="button icon submit fas fa-check"></button>

								</form>

							</div><!-- #row -->
							
							<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

						<?php endif; ?>

					</div><!-- #copy -->

				</div><!-- #pre-subscribe -->

				<div class="row" id="social">

					<?php if (get_option( 'fancy_coming_soon_social_twitter', false ) ) : ?>
						<a class="icon twitter fab fa-twitter" href="<?php echo esc_url(get_option( 'fancy_coming_soon_social_twitter', 'https://www.twitter.com/circathemes')); ?>" target="_blank"></a>
					<?php endif; ?>

					<?php if (get_option( 'fancy_coming_soon_social_facebook', false ) ) : ?>
						<a class="icon facebook fab fa-facebook" href="<?php echo esc_url(get_option( 'fancy_coming_soon_social_facebook', 'https://www.facebook.com/circathemes')); ?>" target="_blank"></a>
					<?php endif; ?>

					<?php if (get_option( 'fancy_coming_soon_social_instagram', false ) ) : ?>
						<a class="icon instagram fab fa-instagram" href="<?php echo esc_url(get_option( 'fancy_coming_soon_social_instagram', '' )); ?>" target="_blank"></a>
					<?php endif; ?>

					<?php if (get_option( 'fancy_coming_soon_social_whatsapp', false ) ) : ?>
						<a class="icon whatsapp fab fa-whatsapp" href="<?php echo esc_url(get_option( 'fancy_coming_soon_social_whatsapp', '')); ?>" target="_blank"></a>
					<?php endif; ?>

					<?php if (get_option( 'fancy_coming_soon_social_email', false ) ) : ?>
						<a class="icon email fa fa-envelope" href="mailto:<?php echo esc_attr(get_option( 'fancy_coming_soon_social_email', 'you@domain.com')); ?>"></a>
					<?php endif; ?>

				</div><!-- #social-->

				<footer class="row"><?php echo wp_kses(get_option( 'fancy_coming_soon_page_footer', 'Designed by <a href="http://www.leeflets.com" rel="nofollow" target="_blank">Jason Schuller</a> & Developed by <a href="http://www.wpkube.com/" rel="nofollow" target="_blank">WP Kube</a>' ), true); ?></footer>

			</div><!-- .content -->

		</div><!-- #intro -->

		<div style="clear: both;"></div>

		<?php if ( is_customize_preview() ) : ?>
			<div class="admin-note">
				<span class="fas fa-info-circle"></span> <strong>This message is visible only to the administrator.</strong> The coming soon page is currently shown to you in the Customizer so you can make adjustments. You can disable it in Fancy Coming Soon Settings &rarr; General.
			</div>
		<?php endif; ?>

	</div><!-- #body-background -->

	<?php if ( $custom_code = get_option( 'fancy_coming_soon_custom_code_footer', false ) ) echo $custom_code; ?>

</body>
</html>