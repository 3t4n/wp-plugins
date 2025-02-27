<div class="misc-pub-section misc-pub-section-last"><span id="timestamp">
    
    <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="bigta_text"><?php echo  esc_html__( 'Use Custom Title Text for all images?*', "bulk-image-title-attribute" ); ?></label></p>

    <div class="bigta-switch-radio">

    <input type="radio" id="bigta_use_custom_title_btn1" name="bigta_use_custom_title" value="bigta_use_custom_title_yes" <?php if ( isset( $bigta_use_custom_title ) ) echo 'checked="checked"'; ?> />
        <label for="bigta_use_custom_title_btn1"><?php echo esc_html__( 'Yes', "bulk-image-title-attribute" ); ?></label>

        <input type="radio" id="bigta_use_custom_title_btn2" name="bigta_use_custom_title" value="bigta_use_custom_title_no" <?php if ( empty( $bigta_use_custom_title ) ) echo 'checked="checked"'; ?> />
        <label for="bigta_use_custom_title_btn2"><?php echo esc_html__( 'No', "bulk-image-title-attribute" ); ?></label> 

    </div>

    <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="bigta_text"><?php echo  esc_html__( 'Insert your custom Title text (other than page title)', "bulk-image-title-attribute" ) ;?></label></p>

    <input type="text" name="bigta_custom_title" value="<?php if ( !empty($bigta_custom_title) ) echo $bigta_custom_title; ?>">

    <p class="post-attributes-label-wrapper"><label class="post-attributes-label" for="bigta_text"><?php echo  esc_html__( 'Disable BIGTA?', "bulk-image-title-attribute" ); ?></label></p>

    <div class="bigta-switch-radio">

        <input type="radio" id="bigta_disable_btn1" name="bigta_disable" value="bigta_disable_yes" <?php if ( isset( $bigta_disable ) ) echo 'checked="checked"'; ?> />
        <label for="bigta_disable_btn1"><?php echo esc_html__( 'Yes', "bulk-image-title-attribute" ); ?></label>

        <input type="radio" id="bigta_disable_btn2" name="bigta_disable" value="bigta_disable_no" <?php if ( empty( $bigta_disable ) ) echo 'checked="checked"'; ?> />
        <label for="bigta_disable_btn2"><?php echo esc_html__( 'No', "bulk-image-title-attribute" ); ?></label>  

    </div>

    <p style="margin-top: 20px;"><?php echo  esc_html__( '*If NO, default BIGTA settings will be applied', "bulk-image-title-attribute" ); ?></p>

</div>