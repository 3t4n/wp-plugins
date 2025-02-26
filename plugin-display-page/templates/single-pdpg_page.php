<?php get_header(); ?>
<div class="pdpg-wrap pdpg-clearfix">
        <?php global $post;
        $plugin_name = get_post_meta($post->ID, 'pdpg_plugin_name', true);
        $image_ids = get_post_meta($post->ID, 'pdpg_plugin_images', true);
        $page_images = '';
        if ($image_ids != '') {
            $image_ids_array = explode(" ", $image_ids);
            foreach ($image_ids_array as $image_id) {
                $page_images .= wp_get_attachment_image($image_id, "", "", array("class" => "pdpg-image"));
            }
        }
        ?>
        <h1><?php echo $plugin_name ?></h1>
            <div class="pdpg_image_container owl-carousel owl-theme"><?php echo $page_images ?></div>

        
        <div class="pdpg-side-content">
            <ul>
                <li>
                    Requires WordPress Version:
                    <strong><?php echo get_post_meta($post->ID, 'pdpg_plugin_requires', true); ?></strong>
                </li>
                <li>
                    Tested up to:
                    <strong><?php echo get_post_meta($post->ID, 'pdpg_plugin_tested', true); ?></strong>
                </li>
                <li>
                    License:
                    <strong><?php echo get_post_meta($post->ID, 'pdpg_plugin_license', true); ?></strong>
                </li>
                <li>
                    <a href="<?php echo get_post_meta($post->ID, 'pdpg_plugin_download', true); ?>">Download Link</a>
                </li>
                <li>
                    <a href="<?php echo get_post_meta($post->ID, 'pdpg_plugin_wppage', true); ?>">WordPress Page Link</a>
                </li>
                <li>
                    <a href="<?php echo get_post_meta($post->ID, 'pdpg_plugin_repo', true); ?>">Repository Link</a>
                </li>
                <li class="pdpg-tags-wrapper">
                    Tags:
                    <div class="pdpg-tags">
                        <?php 
                        if (get_the_terms($post->ID, 'pdpg_tags')) {
                            foreach (get_the_terms($post->ID, 'pdpg_tags') as $tag) {
                                ?><span><?php echo $tag->name; ?></span><?php
                            }
                        }
                        ?>
                    </div>
                </li>
                <li>
                    Changelog:
                    </br></br>
                    <?php echo nl2br(get_post_meta($post->ID, 'pdpg_plugin_changelog', true)); ?>
                </li>
            </ul>
        </div>
        
        <div class="pdpg-main-content">
            <h2>Description</h2>
            <p><?php echo nl2br(get_post_meta($post->ID, 'pdpg_plugin_description', true)); ?></p>
            <h2>FAQ</h2>
            <p><?php echo nl2br(get_post_meta($post->ID, 'pdpg_plugin_faq', true)); ?></p>
            <h2>Installation</h2>
            <p><?php echo nl2br(get_post_meta($post->ID, 'pdpg_plugin_installation', true)); ?></p>
            <h2>Contributors</h2>
            <p><?php echo nl2br(get_post_meta($post->ID, 'pdpg_plugin_contributors', true)); ?></p>
        </div>
</div>


<?php get_footer() ?>
