<?php

if ( $posts->have_posts() ) {
    $counter_post = 1;
    while ( $posts->have_posts() ) { $posts->the_post();
        global $et_fb_processing_shortcode_object;
        $post_id = get_the_ID();
        $global_processing_original_value = $et_fb_processing_shortcode_object;
        // reset the fb processing flag
        $et_fb_processing_shortcode_object = false;


        // Set title
        $post_title = ($props['heading_tag']) ? "<{$props['heading_tag']}>".get_the_title()."</{$props['heading_tag']}>" : "<h4>".get_the_title()."</h4>";
        $card_equal_cols = (isset($props['card_equal_cols']) && $props['card_equal_cols'] == 'on') ? "equal-col" : null;
        $image_position = (isset($props['image_position']) ) ? $props['image_position'] : "left";
        $post_classes = ACTModuleHelper::get_post_classes($layout);
        $image_position = ACTModuleHelper::get_image_position_class($image_position);
        ?>
        <article id="post-<?php echo $post_id; ?>" <?php post_class([$post_classes]); ?>>
            <div class="row">

                <div class="col-md-4 <?= $image_position; ?>">
                    <?php if ($props['show_thumbnail'] == 'on'){ ?>
                        <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail($props['thumbnail_size'], ['class' => 'act-card-img-top']);?>
                        </a>
                    <?php }?>
                </div>

                <div class="col-md-8 order-1">
                    <div class="card-body align-items-start p-3">
                        <?php if ($props['show_title'] == 'on'){ ?>
                            <a href="<?php the_permalink(); ?>">
                                <?= $post_title; ?>
                            </a>
                        <?php }?>
                        <?php if ($props['show_content'] == 'on'){ ?>
                            <div class="act-post-content">
                                <?php
                                if ($props['content']){
                                    the_content();
                                }else{
                                    the_excerpt();
                                }
                                ?>
                            </div>
                        <?php }?>
                        <?php if (isset($props['use_meta']) && $props['use_meta'] == 'on'){ ?>
                            <div class="row act-post-metas">
                                <div class="col-md-4 col-sm-12"><p><?php the_field($props['meta_1']); ?></p></div>
                                <div class="col-md-4 col-sm-12"><?php the_field($props['meta_2']); ?></div>
                                <div class="col-md-4 col-sm-12"><?php the_field($props['meta_3']); ?></div>
                            </div>
                        <?php } ?>
                        <div class="actd_button mt-3">
                            <?php if (isset($props['show_button']) && $props['show_button'] == 'on') {
                                echo $divi_button;
                            }?>
                        </div>
                    </div>
                </div>

            </div>
        </article>
        <?php
        $et_fb_processing_shortcode_object = $global_processing_original_value;
        $counter_post++;
    } // endwhile
    wp_reset_query();
    wp_reset_postdata();
} else {
    if ( $et_is_builder_plugin_active ) {
        include( ET_BUILDER_PLUGIN_DIR . 'includes/no-results.php' );
    } else {
        get_template_part( 'includes/no-results', 'index' );
    }
}


