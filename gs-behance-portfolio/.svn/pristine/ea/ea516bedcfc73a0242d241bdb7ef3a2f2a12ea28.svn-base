<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>

    <style>
        @dim : 500px;

        .gs-spinner {
            height: 100px;
            width: 100px;
        //   margin:0 auto; //   position:relative; position: absolute; top: 30%; left: 45%;
            margin: -(@dim / 2) 0 0 -(@dim / 2);
            -webkit-animation: rotation 1s infinite linear;
            -moz-animation: rotation 1s infinite linear;
            -o-animation: rotation 1s infinite linear;
            animation: rotation 1s infinite linear;
            border: 6px solid rgba(0, 0, 0, .2);
            border-radius: 100%;
        }

        .gs-spinner:before {
            content: "";
            display: block;
            position: absolute;
            left: -6px;
            top: -6px;
            height: 100%;
            width: 100%;
            border-top: 6px solid rgba(0, 0, 0, .8);
            border-left: 6px solid transparent;
            border-bottom: 6px solid transparent;
            border-right: 6px solid transparent;
            border-radius: 100%;
        }

        @-webkit-keyframes rotation {
            from {
                -webkit-transform: rotate(0deg);
            }
            to {
                -webkit-transform: rotate(359deg);
            }
        }

        @-moz-keyframes rotation {
            from {
                -moz-transform: rotate(0deg);
            }
            to {
                -moz-transform: rotate(359deg);
            }
        }

        @-o-keyframes rotation {
            from {
                -o-transform: rotate(0deg);
            }
            to {
                -o-transform: rotate(359deg);
            }
        }

        @keyframes rotation {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(359deg);
            }
        }

    </style>

</head>

<body class="gsbeh-shortcode-preview--page">
<div class="gs-shortcode-preview--container">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="gs-shortcode-preview--wrapper shortcode-found">
			<?php echo do_shortcode( get_the_content() ); ?>
        </div>

	<?php endwhile; else: ?>

        <div class="gs-shortcode-preview--wrapper something-wrong">
            <h2><?php _e( 'Something went wrong!', 'gs-behance' ); ?></h2>
            <p><?php _e( 'Data not found for preview, probably it\'s a bug, contact with plugin author', 'gs-behance' ); ?></p>
        </div>

	<?php endif; ?>

    <script>
        jQuery( window.parent.document ).find('.gsbeh-shortcode-preview-loader').slideUp(100, '', function() {
            jQuery(this).addClass('gsbeh-loader-hide');
        });
    </script>

</div>
<?php wp_footer(); ?>

</body>

</html>