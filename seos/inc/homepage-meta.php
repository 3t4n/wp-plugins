<?php

add_action("wp_head", "seos_meta");

function seos_meta () { ?>

<?php if ( is_front_page() or is_home() )  : ?>

			<?php if ( get_option( 'seos_canonical' ) ) : ?>
				<link rel="canonical" href="<?php echo esc_url( get_option( 'seos_canonical' ) ); ?>"  />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_keywords' ) ) : ?>
				<meta name="keywords" content="<?php echo esc_html( get_option( 'seos_keywords' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_description' ) ) : ?>
				<meta name="description" content="<?php echo esc_html( get_option( 'seos_description' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_google_verification' ) ) : ?>
				<meta name="google-site-verification" content="<?php echo esc_html( get_option( 'seos_google_verification' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_yandex_verification' ) ) : ?>
			<meta name="yandex-verification" content="<?php echo esc_html( get_option( 'seos_yandex_verification' ) ); ?>" />
			<?php endif; ?>	
			
			<?php if ( get_option( 'seos_bing_verification' ) ) : ?>
			<meta name="msvalidate.01" content="<?php echo esc_html( get_option( 'seos_bing_verification' ) ); ?>" />
			<?php endif; ?>

			<?php if ( get_option( 'seos_site_name' ) ) : ?>
				<meta property="og:site_name" content="<?php echo esc_html( get_option( 'seos_site_name' ) ); ?>" />
				<meta property="og:type"   content="website" /> 
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_facebook_image' ) ) : ?>
			<meta property="og:image" content="<?php echo esc_url( get_option( 'seos_facebook_image' ) ); ?>" />
			<?php endif; ?> 
			
			<?php if ( get_option( 'seos_facebook_title' ) ) : ?>
			<meta property="og:title" content="<?php echo esc_html( get_option( 'seos_facebook_title' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_facebook_description' ) ) : ?>
			<meta property="og:description" content="<?php echo esc_html( get_option( 'seos_facebook_description' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_facebook_id' ) ) : ?>
			<meta property="fb:app_id" content="<?php echo esc_html( get_option( 'seos_facebook_id' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_locale' ) ) : ?>
			<meta property="og:locale" content="<?php echo esc_html( get_option( 'seos_locale' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_locale_alternate' ) ) : ?>
			<meta property="og:locale:alternate" content="<?php echo esc_html( get_option( 'seos_locale_alternate' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_locale_alternate1' ) ) : ?>
			<meta property="og:locale:alternate" content="<?php echo esc_html( get_option( 'seos_locale_alternate1' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_graph_url' ) ) : ?>
			<meta property="og:url" content="<?php echo esc_url( get_option( 'seos_graph_url' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_geo_region' ) ) : ?>
			<meta name="geo.region" content="<?php echo esc_html( get_option( 'seos_geo_region' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_geo_placename' ) ) : ?>
			<meta name="geo.placename" content="<?php echo esc_html( get_option( 'seos_geo_placename' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_geo_position' ) ) : ?>
			<meta name="geo.position" content="<?php echo esc_html( get_option( 'seos_geo_position' ) ); ?>" />
			<?php endif; ?> 
			
			<?php if ( get_option( 'seos_icbm' ) ) : ?>
			<meta name="ICBM" content="<?php echo esc_html( get_option( 'seos_icbm' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_twitter_card' ) ) : ?>
			<meta name="twitter:card" content="<?php echo esc_html( get_option( 'seos_twitter_card' ) ); ?>" />
			<?php endif; ?>	
			
			<?php if ( get_option( 'seos_twitter_site' ) ) : ?>
			<meta name="twitter:site" content="<?php echo esc_html( get_option( 'seos_twitter_site' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_twitter_title' ) ) : ?>
			<meta name="twitter:title" content="<?php echo esc_html( get_option( 'seos_twitter_title' ) ); ?>" />
			<?php endif; ?>	
			
			<?php if ( get_option( 'seos_twitter_description' ) ) : ?>
			<meta name="twitter:description'" content="<?php echo esc_html( get_option( 'seos_twitter_description' ) ); ?>" />
			<?php endif; ?>
			
			<?php if ( get_option( 'seos_twitter_image' ) ) : ?>
			<meta name="twitter:image'" content="<?php echo esc_url( get_option( 'seos_twitter_image' ) ); ?>" />
			<?php endif; ?>
			
<?php endif; ?>

			<?php if ( get_option('google_analytics') ) : ?>
				<?php echo get_option('google_analytics'); ?>           
			<?php endif; ?>
			
<?php } 
