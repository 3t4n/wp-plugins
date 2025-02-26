<!DOCTYPE html>
<html>
<head>
   <title><?php echo esc_html($posts->title); ?></title>
    <?php
		$productImage = $posts->featured_image ? $posts->featured_image : EXACTLINKS_PLUGIN_URL."assets/images/default-product.png";
	?>
    <meta property="og:site_name" content="<?php echo esc_html($posts->title); ?>" />
    <meta property="og:title" content="<?php echo esc_html($posts->title); ?>" />
    <meta property="og:description" content="<?php echo esc_html($posts->meta_description); ?>" />
    <meta property="og:image" itemprop="image" content="<?php echo esc_url($productImage); ?>" />
    <meta property="og:image:width" content="1936" />
    <meta property="og:image:height" content="912" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:url" content="<?php echo get_site_url().'/'.esc_html($posts->slug); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <?php
        use ExactLinks\Framework\Support\Arr;
        $metaTitle       = $posts->meta_title;
        $metaDescription = $posts->meta_description;
        $theme           = $posts->settings['theme'];
        $newTab          = $posts->settings['new_tab'] == 'yes' ? '_blank' : '_self';
        $noFollow        = $posts->settings['no_follow'] == 'yes' ? 'nofollow' : 'help';
        $showDisclosure  = $posts->settings['disclosure'];
        $disclosure      = $posts->disclosure;
        $styles          = ($theme == 'dark') ? 'style="background-image: url('.esc_url($productImage).');"' : '';
        $posts           =  Arr::get($posts, 'choice_links');
    ?> 
        <div class="exactlinks-choice-page exactlinks-choice-bg-<?php echo esc_attr($theme); ?>" <?php echo $styles;?>>
            <div class="exactlinks-frontend-preview"> 
                <div class="choice-page"> 
                    <div class="product-info"> 
                        <img src='<?php echo esc_url($productImage); ?>'/>
                        <h1 class="title"> <?php echo esc_html($metaTitle); ?> </h1>
                        <p> <?php echo wp_kses_post($metaDescription); ?> </p>
                    </div>
                    <div class="exactlinks-choice-link"> 
                        <?php foreach ($posts as $post): ?>
                            <div class="product-link"> 
                                <a href='<?php echo esc_url(site_url($post->slug)); ?>' class="btn" target=<?php echo esc_attr($newTab); ?> rel=<?php echo esc_attr($noFollow); ?>>
                                    <?php if ($post->button_text): ?>
                                        <?php echo esc_html($post->button_text); ?>
                                    <?php else: ?>
                                        <?php echo esc_html($post->target_domain); ?>
                                    <?php endif;?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($showDisclosure == 'yes') : ?> 
                        <div class="disclosure">
                            <?php echo wp_kses_post($disclosure); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php wp_footer(); ?>
</body>
</html>