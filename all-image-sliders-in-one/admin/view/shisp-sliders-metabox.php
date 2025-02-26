<?php $shisp_sliders = get_post_meta( $post->ID, 'shisp_sliders_meta', true ); ?>

<div class="wrap" id="shisp-sliders-metabox">
    <div class="shisp-lightboxme">
        <p>
            <img class="shisp-no-img-selected" src="<?php echo SHISP_NO_IMG; ?>">
        </p>
        <p>
            <label class="shisp-new-slide-title" for="shisp-new-slide-title"> <?php _e('Title','shisp-images-slider'); ?> </label><br>
            <input type="hidden" class="shisp-new-title" name="shisp-new-slide-title" id="shisp-new-slide-title" value="" required> 
        </p>
        <p>
            <label class="shisp-new-slide-url" for="shisp-new-slide-url"> <?php _e('Url','shisp-images-slider'); ?> </label><br>
            <input type="hidden" class="shisp-new-url" name="shisp-new-slide-url" id="shisp-new-slide-url" value="" required> 
        </p>
        <p>
            <input type="hidden" id="shisp-current-slide" value="0"/>
            <input type="button" value="<?php _e('Insert', 'shisp-images-slider'); ?>" class="shisp-slide-insert button button-primary"/>
            <input type="button" value="<?php _e('Delete', 'shisp-images-slider'); ?>" class="shisp-slide-delete button"/>
            <input type="button" value="<?php _e('Cancel', 'shisp-images-slider'); ?>" class="shisp-slide-cancel button button-secondary"/>
        </p>
    </div>
    <ul>
        <li class="shisp-default-id" data-slide="0"></li>
        <?php
        $i = 1;
        if ( is_array($shisp_sliders) ):
        foreach ( $shisp_sliders as $slide ):
        ?>
            <li title="<?php echo esc_attr($slide['caption']); ?>" class="shisp-slides-li" data-slide="<?php echo $i; ?>" data-content="<?php _e('Edit','shisp-images-slider'); ?>">
                <img class="shisp-image-slide" src="<?php echo esc_url($slide['image']); ?>">
                <input type="hidden" name="shisp-slider-images[]" value="<?php echo esc_url($slide['image']); ?>">
                <input type="hidden" name="shisp-slider-captions[]" value="<?php echo esc_attr($slide['caption']); ?>">
                <input type="hidden" name="shisp-slider-urls[]" value="<?php echo esc_url($slide['url']); ?>">
            </li>
        <?php
        $i++;
        endforeach; 
        endif;
        ?>
            <li class="shisp-add-new-slide">
               <span> + </span>
            </li>
    </ul>
</div>