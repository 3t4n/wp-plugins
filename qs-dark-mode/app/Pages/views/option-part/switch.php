
<?php $switch_settings = $this->switch_style_options(); ?>

<?php if( is_array( $switch_settings ) ): ?>

    <?php foreach($switch_settings as $item_key => $item): ?>

        <?php if( $item['type'] == 'switch' ): ?>
            
                <div class="qs-dark-mode-block-row qs-dark-mode-swicth-row">
                    <div class="qs-dark-mode-block-col qs-dark-mode-block-col-xl-5 qs-dark-mode-block-col-lg-5 qs-dark-mode-block-col-md-6">
                        <div class="quomodo_switch_common qs-dark-mode-common qs-dark-mood-custom-style-btn <?php echo esc_attr($item['is_pro']?'qs-dark-mode-pro qs-dark-mode-dash-modal-open-btn ':''); ?>">
                            <div class="quomodo_sm_switch <?php echo esc_attr($item['is_pro']?'qs-pro':''); ?>">
                                <a href="<?php echo esc_url($item['demo_link']); ?>" class="qs-dark-mode-data-tooltip"><?php echo esc_html__('view demo','qs-dark-mode'); ?></a>
                                <strong>
                                    <?php echo esc_html( $item[ 'lavel' ] ); ?>
                                </strong>
                                <div class="qs-dark-mood-custom-style-wrapper">
                                    <?php if( $item['is_pro'] ): ?>
                                        <span> <?php echo esc_html__( 'PRO', 'qs-dark-mode' ) ?> </span>
                                    <?php endif; ?>
                                    <input <?php echo esc_attr( $item[ 'is_pro' ]?'readonly disabled':''); ?> <?php echo esc_attr( $item[ 'value' ]=='on'?'checked':''); ?> name="qs-dark-mode-switch-option[<?php echo esc_attr( $item_key ); ?>]" class="quomodo_switch <?php echo esc_attr( $item_key ); ?>" id="quomodo-dark-mode-option-<?php echo esc_attr( $item_key ); ?>" type="checkbox">
                                    <label for="quomodo-dark-mode-option-<?php echo esc_attr( $item_key ); ?>"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php endif; ?>
        <?php if( $item['type'] == 'image-choose' ): ?>
            <div class="qs-dark-mode-block-row qs-dark-mode-swicth-row qs-dark-mode-img-choose">
                <div class="qs-dark-mode-block-col qs-dark-mode-block-col-xl-12 qs-dark-mode-block-col-lg-12 qs-dark-mode-block-col-md-12">
                    <div class="qs-dark-mode-switch-wrapper">
                        <div class="qs-dark-mode-option-header">
                        <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                        </div>
                        
                        <div class="qs-dark-mode-block-image-wrapper-list qs-skip-dark-mode">
                            <?php foreach( $item['options'] as $img_option ): ?>
                                <div class="qs-dark-mode-img-block-wrapper qs-skip-dark-mode <?php echo esc_attr($img_option['pro']?'qs-pro':''); ?>"> 
                                    <input <?php echo esc_attr($img_option['value'] == $item['value']?'checked':''); ?> id="<?php echo esc_attr($item_key.'_'.$img_option['value']); ?>" type="radio" name="qs-dark-mode-switch-option[<?php echo esc_attr( $item_key ); ?>]" value="<?php echo esc_attr($img_option['value']); ?>"  />
                                    <label class="qs-skip-dark-mode" for="<?php echo esc_attr($item_key.'_'.$img_option['value']); ?>">
                                        <img src="<?php echo esc_url( $img_option[ 'src' ] ); ?>">
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if( $item['type'] == 'select' ): ?>
           <div class="qs-dark-mode-switch-wrapper">
                <div class="qs-dark-mode-option-header">
                    <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                </div>
                <div class="qs-dark-mode-select-list-wrapper">
                    <div class="qs-dark-mode-select-list-inner-wrapper"> 
                    <select class="qs-dark-mode-select-dropdown <?php echo esc_attr( $item_key ); ?>" name="qs-dark-mode-switch-option[<?php echo esc_attr( $item_key ); ?>]"> 
                            <?php foreach($item['options'] as $select_key => $select_option): ?>
                                <option <?php echo esc_attr($select_key == $item['value']?'selected':''); ?> value="<?php echo esc_attr($select_key); ?>"> <?php echo esc_html($select_option); ?> </option>
                            <?php endforeach; ?>  
                    </select>
                    </div> 
                </div>
            </div>

        <?php endif; ?>
        <?php if( $item['type'] == 'image_upload' ): ?>
           <div class="qs-dark-mode-switch-wrapper">
                <div class="qs-dark-mode-option-header">
                    <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                </div>
                <div class="qs-dark-mode-select-image-wrapper">
                    <div class="qs-dark-mode-select-image-inner-wrapper <?php echo esc_attr( $item[ 'is_pro' ]?'qs-pro':''); ?>"> 
                            <input value="<?php echo esc_attr( $item[ 'value' ] ); ?>" <?php echo esc_attr( $item[ 'is_pro' ]?'readonly disabled':''); ?>  name="qs-dark-mode-switch-option[<?php echo esc_attr( $item_key ); ?>]" class="quomodo_switch qs-dark-mode-image-upload <?php echo esc_attr( $item_key ); ?>" id="quomodo-switch-<?php echo esc_attr( $item_key ); ?>" type="text">
                            <img class="qs-img-hide qs-dm-uploaded" src="<?php echo esc_url($item[ 'value' ]); ?>" alt="<?php echo esc_attr__('icon image','qs-dark-mode'); ?>"/>
                            <span class="<?php echo esc_attr( $item[ 'is_pro' ]?'qs-pro':''); ?>" > <?php echo esc_html__('Pro','qs-dark-mode'); ?></span>
                    </div>
                    
                </div>
           </div>

       <?php endif; ?>
       <?php if( $item['type'] == 'text' ): ?>
            <div class="qs-dark-mode-switch-wrapper">
                <div class="qs-dark-mode-option-header qs-dark-mode-text-option-container-<?php echo $item_key ?>">
                    <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                </div>
                <div class="qs-dark-mode-text-wrapper qs-dark-mode-advanced-option-container-<?php echo $item_key ?>">
                    <div class="qs-dark-mode-text-inner-wrapper"> 
                        <input type="text" name="qs-dark-mode-switch-option[<?php echo esc_attr( $item_key ); ?>]" class="qs-dark-mode-text-option" value="<?php echo trim(esc_html(isset($item['value']) && $item['value'] !=''?$item['value']:'')); ?>" />
                        <?php if(isset($item['help'])): ?>
                            <p><?php echo esc_html($item['help']); ?></p>
                        <?php endif; ?>
                    </div> 
                </div>
           </div>
       <?php endif; ?>  
       <?php if( $item['type'] == 'range' ): ?>
            <div class="qs-dark-mode-switch-wrapper">
                <div class="qs-dark-mode-option-header qs-dark-mode-text-option-container-<?php echo $item_key ?>">
                    <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                </div>
                <div class="qs-dark-mode-text-wrapper qs-dark-mode-advanced-option-container-<?php echo $item_key ?> <?php echo esc_attr( $item[ 'is_pro' ]?'qs-dark-mode-pro':''); ?>">
                    <div class="qs-dark-mode-range-inner-wrapper"> 
                    <span class="<?php echo esc_attr( $item[ 'is_pro' ]?'qs-pro':''); ?>" > <?php echo esc_html__('Pro','qs-dark-mode'); ?></span>
                        <input type="range" max="<?php echo esc_html(isset($item['max'])? $item['max'] : 100); ?>" min="<?php echo esc_html(isset($item['min'])? $item['min'] : 0); ?>" name="qs-dark-mode-switch-option[<?php echo esc_attr( $item_key ); ?>]" class="qs-dark-mode-range-option qs-ranger-value" value="<?php echo trim(esc_html(isset($item['value']) && $item['value'] !=''?$item['value']:'')); ?>" />
                        <span class="qs-dm-range-value" id="<?php echo esc_attr($item_key); ?>"> <?php echo esc_html($item['value']).'px'; ?> </span>
                        <?php if(isset($item['help'])): ?>
                            <p><?php echo esc_html($item['help']); ?></p>
                        <?php endif; ?>
                       
                    </div> 
                    
                </div>
           </div>
       <?php endif; ?>
       <?php if( $item['type'] == 'number' ): ?>
            <div class="qs-dark-mode-switch-wrapper">
                <div class="qs-dark-mode-option-header qs-dark-mode-text-option-container-<?php echo $item_key ?>">
                    <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                </div>
                <div class="qs-dark-mode-text-wrapper qs-dark-mode-advanced-option-container-<?php echo $item_key ?>">
                    <div class="qs-dark-mode-text-inner-wrapper"> 
                        <input type="number" name="qs-dark-mode-switch-option[<?php echo esc_attr( $item_key ); ?>]" class="qs-dark-mode-text-option" value="<?php echo trim(esc_html(isset($item['value']) && $item['value'] !=''?$item['value']:'')); ?>" />
                        <?php if(isset($item['help'])): ?>
                            <p><?php echo esc_html($item['help']); ?></p>
                        <?php endif; ?>
                    </div> 
                </div>
           </div>
       <?php endif; ?>
       <?php if( $item['type'] == 'color' ): ?>
            <div class="qs-dark-mode-switch-color-wrapper">
                <div class="qs-dark-mode-option-header qs-dark-mode-text-option-container-<?php echo $item_key ?>">
                    <h3 class="qs-dark-mode-option-heading"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
                </div>
                <div class="qs-dark-mode-text-wrapper qs-dark-mode-advanced-option-container-<?php echo $item_key ?>">
                    <div class="qs-dark-mode-text-inner-wrapper"> 
                        <input type="color" name="qs-dark-mode-switch-option[<?php echo esc_attr( $item_key ); ?>]" class="qs-dark-mode-text-option" value="<?php echo trim(esc_html(isset($item['value']) && $item['value'] !=''?$item['value']:'')); ?>" />
                        <?php if(isset($item['help'])): ?>
                            <p><?php echo esc_html($item['help']); ?></p>
                        <?php endif; ?>
                    </div> 
                </div>
           </div>
       <?php endif; ?>
       <?php if( $item['type'] == 'label' ): ?>

           <div class="qs-dark-mode-option-header qs-skip-dark-mode qs-dark-mode-text-option-container-<?php echo sanitize_key($item_key) ?>">
               <h3 class="qs-dark-mode-option-heading qs-skip-dark-mode"> <?php echo esc_html( $item[ 'lavel' ] ); ?> </h3>
           </div>
        
       <?php endif; ?>
    <?php endforeach; ?>

     
<?php endif; ?>
