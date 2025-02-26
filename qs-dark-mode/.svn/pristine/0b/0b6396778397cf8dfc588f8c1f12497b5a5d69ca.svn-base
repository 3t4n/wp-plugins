
<?php $image_settings = $this->swap_images_options(); ?>

<?php if( is_array( $image_settings ) ): ?>

    <?php foreach($image_settings as $item_key => $item): ?>

        <?php if( $item['type'] == 'switch' ): ?>
                <div class="qs-dark-mode-block-row qs-dark-mode-swicth-row">
                    <div class="qs-dark-mode-block-col qs-dark-mode-block-col-xl-3 qs-dark-mode-block-col-lg-4 qs-dark-mode-block-col-md-6">
                        <div class="quomodo_switch_common qs-dark-mode-common <?php echo esc_attr($item['is_pro']?'qs-dark-mode-pro qs-dark-mode-dash-modal-open-btn':''); ?>">
                            <div class="quomodo_sm_switch">
                                <a href="<?php echo esc_url($item['demo_link']); ?>" class="qs-dark-mode-data-tooltip"><?php echo esc_html__('view demo','qs-dark-mode'); ?></a>
                               
                                <strong class="<?php echo esc_attr( $item[ 'is_pro' ]?'strong-pro':''); ?>">
                                    <?php echo esc_html( $item[ 'lavel' ] ); ?>
                                    <?php if( $item['is_pro'] ): ?>
                                        <span> <?php echo esc_html__( 'PRO', 'qs-dark-mode' ) ?> </span>
                                    <?php endif; ?>
                                </strong>
                                
                                <input <?php echo esc_attr( $item[ 'is_pro' ]?'readonly disabled':''); ?> <?php echo esc_attr( $item[ 'default' ]=='on'?'checked':''); ?> name="qsf_dark_mode_swap_images_options[<?php echo esc_attr( $item_key ); ?>]" class="quomodo_switch <?php echo esc_attr( $item_key ); ?>" id="quomodo-swap-modules-<?php echo esc_attr( $item_key ); ?>" type="checkbox">
                                <label for="quomodo-swap-modules-<?php echo esc_attr( $item_key ); ?>"></label>
                            </div>
                        </div>
                    </div>
                </div>

        <?php endif; ?>
        <?php if( $item['type'] == 'swap-images' ): ?>
            <div class="qs-dark-mode-block-row qs-dark-mode-swicth-row qs-dark-mode-img-choose">
                <div class="qs-dark-mode-block-col qs-dark-mode-block-col-xl-12 qs-dark-mode-block-col-lg-12 qs-dark-mode-block-col-md-12">
                    
                    <div class="qs-dark-mode-option-header">
                       <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                    </div>
                    
                    <div class="qs-dark-mode-block-image-wrapper-list">
                        <div class="qs-dark-mode-images-repeater">
                            <div class="qs-dark-mode-block-row" >
                                <div class="qs-dark-mode-block-col qs-dark-mode-block-col-xl-6 qs-dark-mode-block-col-lg-6"> 
                                    <label for="field"> <?php echo esc_html__( 'Normal', 'qs-dark-mode' ) ?> </label>
                                </div> 
                                <div class="qs-dark-mode-block-col qs-dark-mode-block-col-xl-6 qs-dark-mode-block-col-lg-6">
                                    <label for="another-field"><?php echo esc_html__( 'Dark', 'qs-dark-mode' ) ?></label> 
                                </div>
                            </div>
                            <?php foreach( $item['options'] as $sw_key => $img_option ): ?>
                                <div class="qs-swap-image-repeater qs-dark-mode-block-row" data-repeatable>
                                  
                                    <div class="qs-dark-mode-block-col qs-normal-img-src qs-dark-mode-block-d-flex qs-dark-mode-block-col-xl-6 qs-dark-mode-block-col-lg-6"> 
                                        <a href="#" class="qs-dark-mode-img-src-remove"> <span class="dashicons dashicons-trash"></span> </a>
                                        <input <?php echo esc_attr( $item[ 'is_pro' ]?'readonly disabled':''); ?> type="text" name="qsf_dark_mode_swap_images_options[<?php echo esc_attr( $item_key ); ?>][normal][]" value="<?php echo esc_attr($img_option['normal']); ?>">
                                      
                                    </div>

                                    <div class="qs-dark-mode-block-col qs-dark-mode-block-col-xl-6 qs-dark-mode-block-col-lg-6"> 
                                        <input <?php echo esc_attr( $item[ 'is_pro' ]?'readonly disabled':''); ?> type="text" name="qsf_dark_mode_swap_images_options[<?php echo esc_attr( $item_key ); ?>][dark][]" value="<?php echo esc_attr($img_option['dark']); ?>">
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        <?php if(!$item[ 'is_pro' ]): ?>
                            <a href="#" class="qs-gc-button"><?php echo esc_html__('Add Swap images','qs-dark-mode'); ?></a>
                        <?php endif ?>
                        </div>
  
                    </div>
                </div>
            </div>
        <?php endif; ?>
   
    <?php endforeach; ?>

     
<?php endif; ?>
