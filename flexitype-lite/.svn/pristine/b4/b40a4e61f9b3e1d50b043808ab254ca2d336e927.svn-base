<?php

// Exit if accessed directly 
if ( ! defined( 'ABSPATH' ) ) exit; 

?>

<?php $protocol = is_ssl() ? 'https' : 'http'; ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="<?php echo esc_attr($protocol) ?>://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="flexitype-builder" <?php post_class(); ?>>
        <?php
        while (have_posts()):
            the_post();
            the_content();
        endwhile;
        ?>

<?php wp_footer(); ?>
</body>

</html>