<?php

//Set columns
$columns_device = array('columns','columns_tablet','columns_phone');
$columns_desktop = 'col-lg-4';
$columns_tablet = 'col-md-12';
$columns_phone = 'col-sm-12';
foreach ($columns_device as $device){
    $columns_class = false;
    if (strpos($device, '_phone')){
        $breakpoint = 'sm';
    }else if (strpos($device, '_table')){
        $breakpoint = 'md';
    }else{
        $breakpoint = 'lg';
    }
    if ($props[$device]){
        switch ($props[$device]){
            case 1:
                $columns_class = "col-{$breakpoint}-12";
                break;
            case 2:
                $columns_class = "col-{$breakpoint}-6";
                break;
            case 3:
                $columns_class = "col-{$breakpoint}-4";
                break;
            case 4:
                $columns_class = "col-{$breakpoint}-3";
                break;
            case 5:
                $columns_class = "col-{$breakpoint}-2";
                break;
            case 6:
                $columns_class = "col-{$breakpoint}-2";
                break;
        }
        if (strpos($device, '_phone')){
            $columns_phone = $columns_class;
        }else if (strpos($device, '_table')){
            $columns_tablet = $columns_class;
        }else{
            $columns_desktop = $columns_class;
        }
    }
}



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
        $post_title = ($props['heading_tag']) ? "<{$props['heading_tag']}>".get_the_title()."</{$props['heading_tag']}>" : "<h4>".get_the_title()."</h4>";

        ?>
        <div class="<?= $columns_desktop; ?> <?= $columns_tablet; ?> <?= $columns_phone; ?> mb-5">
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
                        <?php if ($props['use_meta'] == 'on'){ ?>
                            <div class="row act-post-metas">
                                <div class="col-md-4 col-sm-12"><p><?php the_field($props['meta_1']); ?></p></div>
                                <div class="col-md-4 col-sm-12"><?php the_field($props['meta_2']); ?></div>
                                <div class="col-md-4 col-sm-12"><?php the_field($props['meta_3']); ?></div>
                            </div>
                        <?php } ?>
                        <?php
                        $button_classes = "act-view-more et_pb_button";
                        $button_classes = ($props['view_more_use_icon'] == 'on') ? $button_classes." et_pb_custom_button_icon" : $button_classes;
                        ?>
                        <div class="et_pb_button_wrapper mt-3">
                            <a class="<?= $button_classes ?>" href="<?php the_permalink(); ?>" target="_self" <?= $button_icon ?>>
                                <?= $props['view_more_text'];?>
                            </a>
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


