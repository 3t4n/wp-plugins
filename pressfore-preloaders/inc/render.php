<?php

function pf_preloaders_show_on( $show_on ) {

	if ( 'home' === $show_on ) {
		return is_home() || is_front_page();
	} elseif ( 'pages' === $show_on ) {
		return is_page();
	} elseif ( 'posts' === $show_on ) {
		return is_single();
	}

	return false;
}

function pressfore_preloaders_type($preloader)
{
	$selected = pressfore_preloaders_options('type', 'default');

	if( 'default' !== $selected ) {
		$collection = apply_filters( 'pf_preloaders_collection', 'PF_Preloaders_Collection' );
		$new_preloader = new $collection;
		$new_preloader = $new_preloader->get_preloader($selected);

		$preloader  = '<div class="pf-gi-preloader-container"><div class="pf-gi-load-container">';
		$preloader .= $new_preloader;
		$preloader .= '</div></div>';
	}

	return $preloader;
}

add_filter('pressfore_preloaders_output', 'pressfore_preloaders_type');

if ( !function_exists( 'pressfore_preloaders' ) )
{

	function pressfore_preloaders()
	{
		$preloader = pressfore_preloaders_options('type');

		$html = '';
		if(  '' !== $preloader ) {
			$html = '<div class="pf-gi-preloader-container">
					<div class="pf-gi-load-container">
						<ul class="cssload-flex-container">
							<li>
								<span class="cssload-loading cssload-one"></span>
								<span class="cssload-loading cssload-two"></span>
								<span class="cssload-loading-center"></span>
							</li>
						</ul>
					</div></div>';
		}

		$html = apply_filters('pressfore_preloaders_output', $html);

		echo wp_kses($html, array(
			'div' => array(
				'id'     => true,
				'class'  => true
			),
			'span'  => array(
				'class' => true
			),
			'ul'  => array(
				'id'     => true,
				'class'  => true
			),
			'li'  => array(
				'id'     => true,
				'class'  => true
			)
		));
	}

	add_action('pressfore_preloaders_print', 'pressfore_preloaders', 0 );
}

function pressfore_preloaders_body_classes($class) {
	$show = pressfore_preloaders_options('display', 'show');
	$show_on = pressfore_preloaders_options('show_on', 'all');

	if ( 'show' === $show && 'all' === $show_on ) {
		$class[] = 'has-preloader';
	}

	if ( 'show' === $show && 'all' !== $show_on && pf_preloaders_show_on( $show_on ) ) {
		$class[] = 'has-preloader';
	}

	return $class;
}

add_filter( 'body_class', 'pressfore_preloaders_body_classes' );

function pressfore_preloaders_inline_style()
{
	$color = pressfore_preloaders_options('clr', '#333');
	$bg    = pressfore_preloaders_options('bg', '#fff');

	$css = sprintf('
			.cssload-loading-center,
			.cssload-loading::after,
			.cssload-loading::before,
			.cssload-loading::after,
			.cssload-loading::before,
			.cssload-thecube .cssload-cube:before,
			 .spinningSquaresG,
			  #cssload-loader ul li,
			  .cssload-ball_1,
			  .cssload-ball_2,
			  .cssload-ball_3,
			  .cssload-ball_4 {
				background: %1$s;
			}

			.fountainTextG {
				color: %1$s;
			}

			.cssload-inner.cssload-one,
			.cssload-inner.cssload-two,
			.cssload-inner.cssload-three {
				border-color: %1$s;
			}

			@keyframes bounce_spinningSquaresG{
			    0%%{
			        transform:scale(1);
			        background-color: %1$s;
			    }

			    100%%{
			        transform:scale(.3) rotate(90deg);
			        background-color: %1$s;
			    }
			}

			@-webkit-keyframes bounce_spinningSquaresG{
			    0%%{
			        -webkit-transform:scale(1);
			        background-color: %1$s;
			    }

			    100%%{
			        -webkit-transform:scale(.3) rotate(90deg);
			        background-color: %1$s;
			    }
			}

			@keyframes bounce_fountainTextG{
			    0%%{
			        transform:scale(1);
			        color: %1$s;
			    }

			    100%%{
			        transform:scale(.5);
			        color: %1$s;
			    }
			}

			@-webkit-keyframes bounce_fountainTextG{
			    0%%{
			        -webkit-transform:scale(1);
			        color: %1$s;
			    }

			    100%%{
			        -webkit-transform:scale(.5);
			        color: %1$s;
			    }
			}

			@-moz-keyframes bounce_fountainTextG{
			    0%%{
			        -moz-transform:scale(1);
			        color: %1$s;
			    }

			    100%%{
			        -moz-transform:scale(.5);
			        color: %1$s;
			    }
			}
		',
		esc_html( $color )
	);

	$css .= sprintf('
			.pf-gi-preloader-container {
				background-color: %s;
			}
		',
		esc_html( $bg )
	);

	wp_add_inline_style( 'pf-preloaders-styles', esc_attr( $css ) );
}

add_action( 'wp_enqueue_scripts', 'pressfore_preloaders_inline_style' );

function pressfore_preloaders_add_hook() {
	$show = pressfore_preloaders_options('display', 'show');
	$show_on = pressfore_preloaders_options('show_on', 'all');

	if( 'show' === $show && ( 'all' === $show_on || 'all' !== $show_on && pf_preloaders_show_on( $show_on ) ) ) {
		do_action( 'pressfore_preloaders_print' );
	}


}
add_action( 'wp_footer', 'pressfore_preloaders_add_hook' );