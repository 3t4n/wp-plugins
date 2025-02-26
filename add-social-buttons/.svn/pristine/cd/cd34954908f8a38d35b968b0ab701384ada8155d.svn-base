<?php

if (!defined('ABSPATH')) exit;

/**
 * The shortcode
 */

// [addsocialbuttons id=""]

function addsocialbuttons_shortcode($atts)
{
    // begin output buffering
    ob_start();

    $post_id = (int)$atts['id'];

    $args = array(
        'post_type' => 'addsocialbuttons',
        'p' => $post_id
    );
    $adsbtn = new WP_Query($args); ?>

    <?php while ($adsbtn->have_posts()) : $adsbtn->the_post();

    $addsocialbuttons_btn_facebook = get_post_meta($post_id, 'addsocialbuttons_btn_facebook', true);
    $addsocialbuttons_btn_twitter = get_post_meta($post_id, 'addsocialbuttons_btn_twitter', true);
    $addsocialbuttons_btn_instagram = get_post_meta($post_id, 'addsocialbuttons_btn_instagram', true);
    $addsocialbuttons_btn_linkedin = get_post_meta($post_id, 'addsocialbuttons_btn_linkedin', true);
    $addsocialbuttons_btn_youtube = get_post_meta($post_id, 'addsocialbuttons_btn_youtube', true);
    $addsocialbuttons_btn_pinterest = get_post_meta($post_id, 'addsocialbuttons_btn_pinterest', true);
    $addsocialbuttons_btn_flickr = get_post_meta($post_id, 'addsocialbuttons_btn_flickr', true);
    $addsocialbuttons_btn_yahoo = get_post_meta($post_id, 'addsocialbuttons_btn_yahoo', true);
    $addsocialbuttons_btn_behance = get_post_meta($post_id, 'addsocialbuttons_btn_behance', true);
    $addsocialbuttons_btn_blogger = get_post_meta($post_id, 'addsocialbuttons_btn_blogger', true);
    $addsocialbuttons_btn_dribbble = get_post_meta($post_id, 'addsocialbuttons_btn_dribbble', true);
    $addsocialbuttons_btn_google_plus = get_post_meta($post_id, 'addsocialbuttons_btn_google_plus', true);

    ?>

    <div class="dvBtns">

        <?php if ($addsocialbuttons_btn_facebook != '') { ?>
            <a href="<?= $addsocialbuttons_btn_facebook; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/facebook.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_twitter != '') { ?>
            <a href="<?= $addsocialbuttons_btn_twitter; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/twitter.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_instagram != '') { ?>
            <a href="<?= $addsocialbuttons_btn_instagram; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/instagram.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_linkedin != '') { ?>
            <a href="<?= $addsocialbuttons_btn_linkedin; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/linkedin.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_youtube != '') { ?>
            <a href="<?= $addsocialbuttons_btn_youtube; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/youtube.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_pinterest != '') { ?>
            <a href="<?= $addsocialbuttons_btn_pinterest; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/pinterest.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_flickr != '') { ?>
            <a href="<?= $addsocialbuttons_btn_flickr; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/flickr.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_yahoo != '') { ?>
            <a href="<?= $addsocialbuttons_btn_yahoo; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/yahoo.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_behance != '') { ?>
            <a href="<?= $addsocialbuttons_btn_behance; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/behance.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_blogger != '') { ?>
            <a href="<?= $addsocialbuttons_btn_blogger; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/blogger.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_dribbble != '') { ?>
            <a href="<?= $addsocialbuttons_btn_dribbble; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/dribbble.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

        <?php if ($addsocialbuttons_btn_google_plus != '') { ?>
            <a href="<?= $addsocialbuttons_btn_google_plus; ?>" target="_blank">
                <img src="<?= plugins_url('../assets/img/google_plus.png', __FILE__); ?>" alt="">
            </a>
        <?php } ?>

    </div>

<?php

endwhile;

    wp_reset_postdata();
    return ob_get_clean();

}

add_shortcode('addsocialbuttons', 'addsocialbuttons_shortcode');



