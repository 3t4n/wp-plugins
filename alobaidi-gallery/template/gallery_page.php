<!DOCTYPE html>
<?php
	if( is_user_logged_in() ){

      if( !get_option('alobaidi_gallery_bar') ){
        $class_admin_bar = "ag_hide_admin_bar";
      }else{
        $class_admin_bar = "ag_show_admin_bar";
      }

			$class = "logged-in $class_admin_bar";
	}else{
			$class = "not-logged";
	}

	if( get_option('alobaidi_gallery_sitename') ){
		$site_name = get_option('alobaidi_gallery_sitename');
	}else{
		$site_name = get_bloginfo('name');
	}

	if( get_option('alobaidi_gallery_tagline') ){
		$tagline = get_option('alobaidi_gallery_tagline');
	}else{
		$tagline = get_bloginfo('description');
	}
?>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#" class="<?php echo $class; ?>">
	<head>
	<?php
		$blog_url = esc_url( home_url() );
		$blog_name = get_bloginfo('name');
		$html5shiv = plugins_url( '/js/html5shiv.js', __FILE__ );
    $reset = plugins_url( '/css/reset.css', __FILE__ );
    $fontello = plugins_url( '/css/fontello/css/fontello.css', __FILE__ );
    $style = plugins_url( '/css/style.css', __FILE__ );
    $rtl = plugins_url( '/css/rtl.css', __FILE__ );
    $responsive = plugins_url( '/css/responsive.css', __FILE__ );
    $fancybox_css = plugins_url( '/fancy/css/jquery.fancybox-1.3.7.css', __FILE__ );
	?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php echo $site_name.' | '.$tagline; ?></title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>">
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo $html5shiv; ?>"></script>
	<![endif]-->
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <link rel="stylesheet" type="text/css" media="all" href="<?php echo $reset; ?>">
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo $fontello; ?>">
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo $style; ?>">
  <?php
  if( is_rtl() ){
      ?>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $rtl; ?>">
      <?php
  }
  ?>

  <link rel="stylesheet" type="text/css" media="all" href="<?php echo $responsive; ?>">
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo $fancybox_css; ?>">

	<?php if( get_option('alobaidi_gallery_filter') ) : ?>
		<style type="text/css">
			.gallery-content-ag img{
				opacity: 1;
				-webkit-filter: grayscale(100%);
    			filter: gray;
    			filter: grayscale(100%);
    			transition:all ease-in-out 0.3s;
    			-webkit-transition:all ease-in-out 0.3s;
    			-moz-transition:all ease-in-out 0.3s;
    			-o-transition:all ease-in-out 0.3s;
			}

			.gallery-content-ag img:hover{
				-webkit-filter: none;
    			filter: none;
			}
		</style>
	<?php endif; ?>

	<?php if ( get_option('alobaidi_gallery_favicon') ) : ?>
		<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo wp_filter_nohtml_kses( get_option('alobaidi_gallery_favicon') ); ?>">
	<?php endif; ?>

  <?php do_action('alobaidi_gallery_head'); ?>
</head>
<body id="alobaidi-gallery" class="<?php echo $class; ?>">

	<?php
		if( get_option('alobaidi_gallery_home') ){
			$site_url = esc_url( home_url('/') );
		}else{
			$site_url = get_option('alobaidi_gallery_page');
		}
	?>

	<header id="header-ag">
    	<div class="header-content-ag global-style-ag">
      	<h1><a href="<?php echo $site_url; ?>" title="<?php echo $site_name; ?>"><?php echo $site_name; ?></a></h1>
      	<p><?php echo $tagline; ?></p>
    	</div>
	</header>

  	<section id="gallery-ag">
    	<div class="gallery-content-ag global-style-ag">
    		<?php include ( plugin_dir_path(__FILE__).'/loop.php' ); ?>
    	</div>

		<?php if ( get_previous_posts_link() or get_next_posts_link('', $query->max_num_pages) ) : ?>
			<nav id="navigation-ag" class="global-style-ag clear-fix">
				<?php
					if( get_previous_posts_link() ){
                    	if( get_option('alobaidi_gallery_prev') ){
                    		$prev_word = get_option('alobaidi_gallery_prev');
                    	}else{
                    		$prev_word = "Previous Page";
                    	}
						echo '<li class="left-ag" title="'.$prev_word.'">'; previous_posts_link(''); echo'</li>';
                    }
                ?>
            	<?php
                    if( get_next_posts_link('', $query->max_num_pages) ){
                    	if( get_option('alobaidi_gallery_next') ){
                    		$next_word = get_option('alobaidi_gallery_next');
                    	}else{
                    		$next_word = "Next Page";
                    	}
               			echo '<li class="right-ag" title="'.$next_word.'">'; next_posts_link('', $query->max_num_pages); echo'</li>';
                     }
                ?>
            </nav>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>
  	</section>

	<footer id="footer-ag">
    	<div class="footer-content-ag global-style-ag clear-fix">
    		<?php if ( get_option('alobaidi_gallery_facebook') or get_option('alobaidi_gallery_twitter') or get_option('alobaidi_gallery_instagram') ) : ?>
      			<ul class="social-ag">
      				<?php if ( get_option('alobaidi_gallery_facebook') ) : ?>
      					<a class="fb-icon-ag" href="<?php echo wp_filter_nohtml_kses( get_option('alobaidi_gallery_facebook') ); ?>" target="_blank" rel="nofollow"></a>
      				<?php endif; ?>

      				<?php if ( get_option('alobaidi_gallery_twitter') ) : ?>
      					<a class="tw-icon-ag" href="<?php echo wp_filter_nohtml_kses( get_option('alobaidi_gallery_twitter') ); ?>" target="_blank" rel="nofollow"></a>
      				<?php endif; ?>

      				<?php if ( get_option('alobaidi_gallery_instagram') ) : ?>
      					<a class="ig-icon-ag" href="<?php echo wp_filter_nohtml_kses( get_option('alobaidi_gallery_instagram') ); ?>" target="_blank" rel="nofollow"></a>
      				<?php endif; ?>
      			</ul>
      		<?php endif; ?>
      		<div class="copyrights-ag">
      			<p>&copy; <?php echo date('Y').' '.$site_name; ?>.</p>
      		</div>
    	</div>
  	</footer>

  	<?php
		if( is_user_logged_in() ){
    		$get_user_id = get_current_user_id();
    		$get_user_data = get_userdata($get_user_id);
    		$display_name = $get_user_data->display_name;
    		$email = $get_user_data->user_email;
    		$avatar = get_avatar($email, 64);

    		if( is_ssl() ){
    			$protocol = "https";
    		}else{
    			$protocol = "http";
    		}

    		$settings_url = admin_url('plugins.php?page=alobaidi_gallery_settings', $protocol);

    		$media_url = admin_url('media-new.php', $protocol);

    		if( !get_option('alobaidi_gallery_bar') ){
    			if( get_option('alobaidi_gallery_setw') ){
    				$settings_word = get_option('alobaidi_gallery_setw');
    			}else{
    				$settings_word = "Settings";
    			}

    			if( get_option('alobaidi_gallery_medw') ){
    				$media_word = get_option('alobaidi_gallery_medw');
    			}else{
    				$media_word = "Upload Images";
    			}
				?>
  					<div id="alobaidi-gallery-bar">
  						<div class="bar-content">
  							<?php echo $avatar; ?>
  							<p><?php echo $display_name; ?> - <a href="<?php echo $settings_url; ?>"><?php echo $settings_word; ?></a> - <a href="<?php echo $media_url; ?>"><?php echo $media_word; ?></a></p>
  						</div>
  					</div>
				<?php
			}
		}
  	?>

    <div id="wp_footer-ag"><?php wp_footer(); ?></div>

    <script type="text/javascript">
      jQuery(document).ready(function() {
			   jQuery("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox();
		  });
	</script>

  <?php do_action('alobaidi_gallery_footer'); ?>
</body>
</html>