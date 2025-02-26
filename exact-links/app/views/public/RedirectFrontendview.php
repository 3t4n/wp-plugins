<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo esc_html($post->title); ?></title>

<base href="/" />

<?php
	$productImage = $post->featured_image ? $post->featured_image : EXACTLINKS_PLUGIN_URL."assets/images/default-product.png";
?>

<meta property="og:title" content="<?php echo esc_html($post->title); ?>" />
<meta property="og:url" content="<?php echo get_site_url().'/'.esc_html($post->slug); ?>" />
<meta property="og:description" content="<?php echo esc_html($post->meta_description); ?>" />
<meta property="og:image" itemprop="image" content="<?php echo esc_url($productImage); ?>" />
<meta property="og:type" content="website" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="twitter:card" content="<?php echo esc_html($post->title); ?>" />
<meta property="twitter:url" content="<?php echo get_site_url().'/'.esc_html($post->slug); ?>" />
<meta property="twitter:title" content="<?php echo esc_html($post->title); ?>" />
<meta property="twitter:description" content="<?php echo esc_html($post->meta_description); ?>" />
<meta property="twitter:image" content="<?php echo esc_url($productImage); ?>" />

</head>
<body>
    <?php
        if ($post->target_url) {
            sleep(1);
            wp_redirect($post->target_url);
            exit;
        }
    ?>

    <noscript>
      Redirecting to <a href="<?php echo esc_url($post->target_url); ?>"><?php echo esc_url($post->target_url); ?></a>
    </noscript>
</body>
</html>