<?php
    add_action('admin_init', 'htsirve_add_meta_boxes', 2);
    function htsirve_add_meta_boxes(){
        add_meta_box(
            'htsirve-group', 
            __( 'Sirve Options', 'sirve' ), 
            'htsirve_meta_box_display', 
            'sirve', 
            'normal', 
            'default'
        );
    }

    function htsirve_meta_box_display(){
        global $post;
        $sirveGroup = get_post_meta( $post->ID, 'sirveGroup', true );

        $sirveFeatureText = get_post_meta( $post->ID, 'htSirveFeatureText', true );

        $sirveButtonText = get_post_meta( $post->ID, 'htSirveButtonText', true );
        $sirveButtonUrl = get_post_meta( $post->ID, 'htSirveButtonUrl', true );
        $sirveButtonUrlTarget = get_post_meta( $post->ID, 'htSirveButtonUrlTarget', true );
        $sirveDoFollowPostBtn1 = get_post_meta( $post->ID, 'htSirveDoFollowPostBtn1', true );
        

        $sirveFeaturePost = get_post_meta( $post->ID, 'htSirveFeaturePost', true );
        $sirveButtonText2 = get_post_meta( $post->ID, 'htSirveButtonText2', true );
        $sirveButtonUrl2 = get_post_meta( $post->ID, 'htSirveButtonUrl2', true );
        $sirveButtonUrlTarget2 = get_post_meta( $post->ID, 'htSirveButtonUrlTarget2', true );
        $sirveDoFollowPostBtn2 = get_post_meta( $post->ID, 'htSirveDoFollowPostBtn2', true );

        // Button 1 placeholder Text 
        $sirveButtonPlaceholderText1 = esc_attr__( 'Live Preview', 'sirve' );
        if(!empty( get_option('sirve_button_one_text'))){
            $sirveButtonPlaceholderText1 = get_option('sirve_button_one_text');
        }
        
        // Button 2 placeholder Text 
        $sirveButtonPlaceholderText2 = esc_attr__( 'More Details', 'sirve' );
        if(!empty( get_option('sirve_single_page_button_text'))){
            $sirveButtonPlaceholderText2 = get_option('sirve_single_page_button_text');
        }
        //Nonce
        wp_nonce_field( 'SirveList', 'htSirveList' );
        ?>

        <table  class="sirve_meta_box_table">
            <!-- Sticky / Feature Enable / Disable -->
            <tr>
                <th>
                    <label for="htSirveFeaturePost"><?php echo esc_html__( 'Sticky / Featured:', 'sirve' ); ?></label>
                </th>
                <td>
                    <input type="checkbox" id="htSirveFeaturePost" name="htSirveFeaturePost" value="1" <?php checked( $sirveFeaturePost, '1' ); ?> >
                    <p><?php echo esc_html__( 'Make the post sticky. With this feature, place the post at the top of the front page of all listings.', 'sirve' ) ?></p>
                </td>
            </tr>

            <!-- List Featured -->
            <tr>
                <th>
                    <label for="htSirveFeatureText"><?php echo esc_html__( 'Sticky / Featured Text:', 'sirve' ); ?></label>
                </th>
                <td>
                    <input type="text" id="htSirveFeatureText" placeholder="<?php echo esc_attr__( 'Featured', 'sirve' ); ?>" name="htSirveFeatureText" value="<?php if( $sirveFeatureText != '') echo esc_attr__( $sirveFeatureText, 'sirve' ); ?>" />
                </td>
            </tr>

        </table>
        <hr>
        <table  class="sirve_meta_box_table">
            
            <!-- Button Text 1 -->
            <tr>
                <th>
                    <label for="htSirveButtonText"><?php echo esc_html__( 'Button 1 Text:', 'sirve' ); ?></label>
                </th>
                <td>
                    <input type="text" id="htSirveButtonText" placeholder="<?php echo esc_attr( $sirveButtonPlaceholderText1 )?>" name="htSirveButtonText" value="<?php if( $sirveButtonText != '') echo esc_attr__( $sirveButtonText, 'sirve' ); ?>" />
                </td>
            </tr>

            <!-- Button URL 1 -->
            <tr>
                <th>
                    <label for="htSirveButtonUrl"><?php echo esc_html__( 'Button 1 URL:', 'sirve' ); ?></label>
                </th>
                <td>
                    <input type="url" id="htSirveButtonUrl" placeholder="<?php echo esc_attr__( 'https://example.com/', 'sirve' ); ?>" name="htSirveButtonUrl" value="<?php if( $sirveButtonUrl != '') echo esc_attr__( $sirveButtonUrl, 'sirve' ); ?>" />
                </td>
            </tr>

            <!-- DoFollow Button 1 Enable / Disable -->
            <tr>
                <th>
                    <label for="htSirveDoFollowPostBtn1"><?php echo esc_html__( 'Link DoFollow Enable:', 'sirve' ); ?></label>
                </th>
                <td>
                    <input type="checkbox" id="htSirveDoFollowPostBtn1" name="htSirveDoFollowPostBtn1" value="1" <?php checked( $sirveDoFollowPostBtn1, '1' ); ?> >
                    <?php echo esc_html__( 'Do you want DoFollow Link?', 'sirve' ) ?>
                </td>
            </tr>

            <!-- Button 1 URL Target -->
            <tr>
                <th><?php echo esc_html__( 'URL Target:', 'sirve' ); ?></th>
                <td>
                    <select id="htSirveUrlTarget" class="sirve_select_control" name="htSirveButtonUrlTarget" value="<?php if( $sirveButtonUrlTarget != '') echo esc_attr__( $sirveButtonUrlTarget, 'sirve' ); ?>" >
                        <option <?php selected( $sirveButtonUrlTarget, '_self' ); ?> value="_self" ><?php echo esc_html__('Self Page', 'sirve') ?></option>    
                        <option <?php selected( $sirveButtonUrlTarget, '_blank' ); ?> value="_blank" ><?php echo esc_html__('New Tab', 'sirve') ?></option>    
                    </select>
                </td>
            </tr>
            </table>

            
            <?php if(get_option('sirve_single_page', '') == 'yes' || get_option('sirve_single_page_button_link_enable') == 'yes'): ?>
                <hr>
                <table  class="sirve_meta_box_table">
                    <!-- Button Text 2 -->
                    <tr>
                        <th>
                            <label  for="htSirveButtonText2"><?php echo esc_html__( 'Button 2 Text:', 'sirve' ); ?></label>
                        </th>
                        <td>
                            <input type="text" id="htSirveButtonText2" placeholder="<?php echo esc_attr( $sirveButtonPlaceholderText2 )?>" name="htSirveButtonText2" value="<?php if( $sirveButtonText2 != '') echo esc_attr__( $sirveButtonText2, 'sirve' ); ?>" />
                        </td>
                    </tr>

                    <!-- Button Url 2 -->
                    <tr>
                        <th>
                            <label for="htSirveButtonUrl2"><?php echo esc_html__( 'Button 2 Url:', 'sirve' ); ?></label>
                        </th>
                        <td>
                            <input type="url" id="htSirveButtonUrl2" placeholder="<?php echo esc_attr__( 'https://example.com/', 'sirve' ); ?>" name="htSirveButtonUrl2" value="<?php if( $sirveButtonUrl2 != '') echo esc_attr__( $sirveButtonUrl2, 'sirve' ); ?>" />
                        </td>
                    </tr>

                    <!-- DoFollow Button 1 Enable / Disable -->
                    <tr>
                        <th>
                            <label for="htSirveDoFollowPostBtn2"><?php echo esc_html__( 'Link DoFollow Enable:', 'sirve' ); ?></label>
                        </th>
                        <td>
                            <input type="checkbox" id="htSirveDoFollowPostBtn2" name="htSirveDoFollowPostBtn2" value="1" <?php checked( $sirveDoFollowPostBtn2, '1' ); ?> >
                            <?php echo esc_html__( 'Do you want DoFollow Link?', 'sirve' ) ?>
                        </td>
                    </tr>

                    <!-- Button URL Target 2 -->
                    <tr>
                        <th>
                            <label for="htSirveButtonUrlTarget2"><?php echo esc_html__( 'URL Target:', 'sirve' ); ?></label>
                        </th>
                        <td>
                            <select id="htSirveButtonUrlTarget2" class="sirve_select_control" name="htSirveButtonUrlTarget2" value="<?php if( $sirveButtonUrlTarget2 != '') echo esc_attr__( $sirveButtonUrlTarget2, 'sirve' ); ?>" >
                                <option <?php selected( $sirveButtonUrlTarget2 , '_self' ); ?> value="_self" ><?php echo esc_html__('Self Page', 'sirve') ?></option>    
                                <option <?php selected( $sirveButtonUrlTarget2 , '_blank' ); ?> value="_blank" ><?php echo esc_html__('New Tab', 'sirve') ?></option>    
                            </select>
                        </td>
                    </tr>
                </table>
            <?php endif ?>
        <?php
    }
    add_action('save_post', 'htsirve_meta_box_save');

    function htsirve_meta_box_save( $post_id ){
        
        if ( ! isset( $_POST['htSirveList'] ) || !wp_verify_nonce( $_POST['htSirveList'], 'SirveList' ) ){
            return;
        }
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
            return;
        }
        if (!current_user_can('edit_post', $post_id)){
            return;
        }

        // List Group
        $old = get_post_meta( $post_id, 'sirveGroup', true );
        $new = array();

        if ( !empty( $new ) && $new != $old ){
            update_post_meta( $post_id, 'sirveGroup', $new );

        }elseif ( empty($new) && $old ){
            delete_post_meta( $post_id, 'sirveGroup', $old );
        }

        // Button 1 DoFollow
        $SirveDoFollowPostValue = !empty($_POST['htSirveDoFollowPostBtn1']) ? $_POST['htSirveDoFollowPostBtn1'] : 0;
        $sirveDoFollowPostBtn1 = sanitize_text_field( absint( $SirveDoFollowPostValue ));
        update_post_meta( $post_id, 'htSirveDoFollowPostBtn1', $sirveDoFollowPostBtn1 );

        // Button 2 DoFollow 
        $SirveDoFollowPostValue = !empty($_POST['htSirveDoFollowPostBtn2']) ? $_POST['htSirveDoFollowPostBtn2'] : 0;
        $sirveDoFollowPostBtn2 = sanitize_text_field( absint( $SirveDoFollowPostValue ));
        update_post_meta( $post_id, 'htSirveDoFollowPostBtn2', $sirveDoFollowPostBtn2 );
       
        // List Featured
        $SirveFeaturePostValue = !empty($_POST['htSirveFeaturePost']) ? $_POST['htSirveFeaturePost'] : 0;
        $sirveFeaturePost = sanitize_text_field( absint( $SirveFeaturePostValue ));
        update_post_meta( $post_id, 'htSirveFeaturePost', $sirveFeaturePost );


        // List Featured Text
        if($SirveFeaturePostValue == 1){
            $oldSirveFeatureText = get_post_meta( $post_id, 'htSirveFeatureText', true );
            $sirveFeatureText = sanitize_text_field( $_POST['htSirveFeatureText'] );

            if ( !empty( $sirveFeatureText ) && $sirveFeatureText != $oldSirveFeatureText ){
                update_post_meta( $post_id, 'htSirveFeatureText', $sirveFeatureText );

            }elseif ( empty($sirveFeatureText) && $oldSirveFeatureText ){
                delete_post_meta( $post_id, 'htSirveFeatureText', $oldSirveFeatureText );
            }
        }

        // Button 1 Text
        $oldSirveButtonText = get_post_meta( $post_id, 'htSirveButtonText', true );
        $sirveButtonText = sanitize_text_field( $_POST['htSirveButtonText'] );

        if ( !empty( $sirveButtonText ) && $sirveButtonText != $oldSirveButtonText ){
            update_post_meta( $post_id, 'htSirveButtonText', $sirveButtonText );

        }elseif ( empty($sirveButtonText) && $oldSirveButtonText ){
            delete_post_meta( $post_id, 'htSirveButtonText', $oldSirveButtonText);
        }

        // Button 1 URL
        $oldSirveButtonUrl = get_post_meta( $post_id, 'htSirveButtonUrl', true );
        $sirveButtonUrl = sanitize_text_field( $_POST['htSirveButtonUrl'] );

        if ( !empty( $sirveButtonUrl ) && $sirveButtonUrl != $oldSirveButtonUrl ){
            update_post_meta( $post_id, 'htSirveButtonUrl', $sirveButtonUrl );

        }elseif ( empty($sirveButtonUrl) && $oldSirveButtonUrl ){
            delete_post_meta( $post_id, 'htSirveButtonUrl', $oldSirveButtonUrl);
        }

        // Button 1 URL Target
        $oldSirveButtonUrlTarget = get_post_meta( $post_id, 'htSirveButtonUrlTarget', true );
        $sirveButtonUrlTarget = sanitize_text_field( $_POST['htSirveButtonUrlTarget'] );

        if ( !empty( $sirveButtonUrlTarget ) && $sirveButtonUrlTarget != $oldSirveButtonUrlTarget ){
            update_post_meta( $post_id, 'htSirveButtonUrlTarget', $sirveButtonUrlTarget );

        }elseif ( empty($sirveButtonUrlTarget) && $oldSirveButtonUrlTarget ){
            delete_post_meta( $post_id, 'htSirveButtonUrlTarget', $oldSirveButtonUrlTarget);
        }


        // Button 2 Text
        if(get_option('sirve_single_page', '') == 'yes' || get_option('sirve_single_page_button_link_enable') == 'yes'){
            $oldSirveButtonText2 = get_post_meta( $post_id, 'htSirveButtonText2', true );
            $sirveButtonText2 = sanitize_text_field( $_POST['htSirveButtonText2'] );

            if ( !empty( $sirveButtonText2 ) && $sirveButtonText2 != $oldSirveButtonText2 ){
                update_post_meta( $post_id, 'htSirveButtonText2', $sirveButtonText2 );

            }elseif ( empty( $sirveButtonText2 ) && $oldSirveButtonText2 ){
                delete_post_meta( $post_id, 'htSirveButtonText2', $oldSirveButtonText2 );
            }
        

            //Button 2 Url
            $oldSirveButtonUrl2 = get_post_meta( $post_id, 'htSirveButtonUrl2', true );
            $sirveButtonUrl2 = sanitize_text_field( $_POST['htSirveButtonUrl2'] );

            if ( !empty( $sirveButtonUrl2 ) && $sirveButtonUrl2 != $oldSirveButtonUrl2 ){
                update_post_meta( $post_id, 'htSirveButtonUrl2', $sirveButtonUrl2 );

            }elseif ( empty( $sirveButtonUrl2 ) && $oldSirveButtonUrl2 ){
                delete_post_meta( $post_id, 'htSirveButtonUrl2', $oldSirveButtonUrl2 );
            }

            //Button 2 URL Target
            $oldSirveButtonUrlTarget2 = get_post_meta( $post_id, 'htSirveButtonUrlTarget2', true );
            $sirveButtonUrlTarget2 = sanitize_text_field( $_POST['htSirveButtonUrlTarget2'] );

            if ( !empty( $sirveButtonUrlTarget2 ) && $sirveButtonUrlTarget2 != $oldSirveButtonUrlTarget2 ){
                update_post_meta( $post_id, 'htSirveButtonUrlTarget2', $sirveButtonUrlTarget2 );

            }elseif ( empty( $sirveButtonUrlTarget2 ) && $oldSirveButtonUrlTarget2 ){
                delete_post_meta( $post_id, 'htSirveButtonUrlTarget2', $oldSirveButtonUrlTarget2 );
            }
        }
    }