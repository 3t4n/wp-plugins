
<?php $color_settings = $this->theme_color_preset_options();  ?>

<?php if( is_array( $color_settings ) ): ?>

    <?php foreach($color_settings as $item_key => $item): ?>

    
        <?php if( $item['type'] == 'color' ): ?>
            <div class="qs-dark-mode-preset-wrapper">
                <div class="qs-dark-mode-option-header">
                    <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                </div>
                <div class="qs-dark-mode-color-wrapper">
                    <div class="qs-dark-mode-color-inner-wrapper <?php echo esc_attr($item['is_pro']?'qs-pro':''); ?>"> 
                        <input <?php echo esc_attr( $item[ 'is_pro' ]?'readonly disabled':''); ?> value="<?php echo esc_attr( $item[ 'value' ] ); ?>" name="qs-dark-mode-preset-option[<?php echo esc_attr( $item_key ); ?>]" class="quomodo_switch <?php echo esc_attr( $item_key ); ?>" id="quomodo-dark-mode-option-<?php echo esc_attr( $item_key ); ?>" type="color">
                        <?php if(isset($item['help'])): ?>
                            <p><?php echo esc_html($item['help']); ?></p>
                        <?php endif; ?>
                    </div> 
                </div>
           </div>
       <?php endif; ?>

        <?php if( $item['type'] == 'switch' ): ?>
                <div class="qs-dark-mode-block-row qs-dark-mode-swicth-row qs-control-container-<?php echo esc_attr($item_key); ?>">
                    <div class="qs-dark-mode-block-col qs-dark-mode-block-col-xl-5 qs-dark-mode-block-col-lg-5 qs-dark-mode-block-col-md-12">
                        <div class="quomodo_switch_common qs-dark-mode-common <?php echo esc_attr($item['is_pro']?'qs-dark-mode-pro qs-dark-mode-dash-modal-open-btn':''); ?>">
                            <div class="quomodo_sm_switch <?php echo esc_attr($item['is_pro']?'qs-pro':''); ?>">
                                <a href="<?php echo esc_url($item['demo_link']); ?>" class="qs-dark-mode-data-tooltip"><?php echo esc_html__('view demo','qs-dark-mode'); ?></a>
                                
                                <strong>
                                    <?php echo esc_html( $item[ 'lavel' ] ); ?>
                                    <?php if( $item['is_pro'] ): ?>
                                        <span> <?php echo esc_html__( 'PRO', 'qs-dark-mode' ) ?> </span>
                                    <?php endif; ?>
                                </strong>
                                
                                <input <?php echo esc_attr( $item[ 'is_pro' ]?'readonly disabled':''); ?> <?php echo esc_attr( $item[ 'value' ]=='on'?'checked':''); ?> name="qs-dark-mode-preset-option[<?php echo esc_attr( $item_key ); ?>]" class="quomodo_switch <?php echo esc_attr( $item_key ); ?>" id="quomodo-dark-mode-option-<?php echo esc_attr( $item_key ); ?>" type="checkbox">
                                <label for="quomodo-dark-mode-option-<?php echo esc_attr( $item_key ); ?>"></label>
                            </div>
                        </div>
                    </div>
                </div>

        <?php endif; ?>
        <?php if( $item['type'] == 'image-choose' ): ?>
            <div class="qs-dark-mode-block-row qs-dark-mode-swicth-row qs-dark-mode-img-choose qs-control-container-<?php echo esc_attr($item_key); ?>">
                <div class="qs-dark-mode-block-col qs-dark-mode-block-col-xl-12 qs-dark-mode-block-col-lg-12 qs-dark-mode-block-col-md-12">
                    <div class="qs-dark-mode-option-header">
                       <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                    </div>
                    
                    <div class="qs-dark-mode-block-image-wrapper-list">
                        <?php foreach( $item['options'] as $img_option ): ?>
                            <div class="qs-dark-mode-img-block-wrapper <?php echo esc_attr($img_option['pro']?'qs-pro':''); ?>"> 
                                <input <?php // echo esc_attr($img_option['pro']?'disabled ':''); ?> <?php echo esc_attr($img_option['value'] == $item['value']?'checked':''); ?> id="<?php echo esc_attr($item_key.'_'.$img_option['value']); ?>" type="radio" name="qs-dark-mode-preset-option[<?php echo esc_attr( $item_key ); ?>]" value="<?php echo esc_attr($img_option['value']); ?>"  />
                                <label for="<?php echo esc_attr($item_key.'_'.$img_option['value']); ?>">
                                    <img src="<?php echo esc_url( $img_option[ 'src' ] ); ?>">
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if( $item['type'] == 'select' ): ?>
           
            <div class="qs-dark-mode-option-header qs-control-container-<?php echo esc_attr($item_key); ?>">
                <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
            </div>
            <div class="qs-dark-mode-select-list-wrapper qs-control-container-<?php echo esc_attr($item_key); ?>">
                <div class="qs-dark-mode-select-list-inner-wrapper"> 
                   <select class="qs-dark-mode-select-dropdown" name="qs-dark-mode-preset-option[<?php echo esc_attr( $item_key ); ?>]"> 
                        <?php foreach($item['options'] as $select_key => $select_option): ?>
                            <option <?php echo esc_attr($select_key == $item['value']?'selected':''); ?> value="<?php echo esc_attr($select_key); ?>"> <?php echo esc_html($select_option); ?> </option>
                        <?php endforeach; ?>  
                   </select>
                </div> 
            </div>

        <?php endif; ?>
    <?php endforeach; ?>

     
<?php endif; ?>
