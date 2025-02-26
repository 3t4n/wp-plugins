<?php

$columns_classes = ACTModuleHelper::get_columns_class($props);


if ( $posts->have_posts() ) {
    echo '<div class="row">';
    $counter_post = 1;
    while ( $posts->have_posts() ) { $posts->the_post();
        global $et_fb_processing_shortcode_object;
        $post_id = get_the_ID();
        $global_processing_original_value = $et_fb_processing_shortcode_object;
        // reset the fb processing flag
        $et_fb_processing_shortcode_object = false;


        // Set title
        $post_title = (isset($props['heading_tag']) && $props['heading_tag']) ? "<{$props['heading_tag']}>".get_the_title()."</{$props['heading_tag']}>" : "<h4>".get_the_title()."</h4>";
        $card_equal_cols = (isset($props['card_equal_cols']) && $props['card_equal_cols'] == 'on') ? "equal-col" : null;
        ?>
        <div class="act-col <?= $columns_classes['desktop']; ?> <?= $columns_classes['tablet']; ?> <?= $columns_classes['phone']; ?> mb-5 <?= $card_equal_cols ;?>">
            <article id="post-<?php echo $post_id; ?>" <?php post_class(['act-post']); ?>>
                <div class="card">
                    <?php if ($props['show_thumbnail'] == 'on'){ ?>
                        <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail($props['thumbnail_size'], ['class' => 'act-card-img-top']);?>
                        </a>
                    <?php }?>
                    <?php $card_padding = ($props['card_padding'] == 'on') ? "p-3" : false; ?>
                    <div class="card-body align-items-start <?= $card_padding; ?>">
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
            </article>
        </div>
        <?php
        $et_fb_processing_shortcode_object = $global_processing_original_value;
        $counter_post++;
    } // endwhile
    echo '</div>';
    wp_reset_query();
    wp_reset_postdata();
} else {
    if ( $et_is_builder_plugin_active ) {
        include( ET_BUILDER_PLUGIN_DIR . 'includes/no-results.php' );
    } else {
        get_template_part( 'includes/no-results', 'index' );
    }
}


