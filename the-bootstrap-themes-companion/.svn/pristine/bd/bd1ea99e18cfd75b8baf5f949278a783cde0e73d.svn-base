<?php
/*=======================================================================*/
// Custom fields
/*=======================================================================*/

add_action("admin_init", "tbtc_addMetabox_init");
function tbtc_addMetabox_init(){

    //metabox for promotion posttype
    add_meta_box("team-designation", __( "Designation", 'tbthemes-companion' ), "tbtc_build_designation", "tbtc_teams", "advanced", "default");
    add_meta_box("team-socialmedia", __( "Social Media link", 'tbthemes-companion' ), "tbtc_build_social_media_link", "tbtc_teams", "advanced", "default");
    
    add_meta_box("cta-section", __( "CTA Section", 'tbthemes-companion' ), "tbtc_cta_options", "tbtc_price", "advanced", "default");
    add_meta_box("price", __( "Price", 'tbthemes-companion' ), "tbtc_build_price", "tbtc_price", "advanced", "default");

    add_meta_box("testimonial-designation", __( "Designation", 'tbthemes-companion' ), "tbtc_build_designation", "tbtc_testimonials", "advanced", "default");
    add_meta_box("testimonial-socialmedia", __( "Social Media link", 'tbthemes-companion' ), "tbtc_build_social_media_link", "tbtc_testimonials", "advanced", "default");
 }

//designation metafield
function tbtc_build_designation(){
    global $post;

    $custom = get_post_custom(get_the_ID());

    if (!empty($custom)){
        if(isset($custom['tbtc_designation'])){
            $tbtc_designation = $custom['tbtc_designation'][0];
        }
    }
    ?>

    <fieldset class="fieldset-1 fieldset-userDetail">
        <div class="testimonial-section">
            <div class="group">
                <label><?php esc_html_e( "Designation", 'tbthemes-companion' ); ?></label>
                <input type="text" name="tbtc_designation" value="<?php if( isset($tbtc_designation) ) echo esc_attr( $tbtc_designation ); ?>">
            </div>
        </div>
    </fieldset>

<?php }

//social media metafield
function tbtc_build_social_media_link(){
    global $post;
    $custom = get_post_custom(get_the_ID());
    if (!empty($custom)){
        if(isset($custom['tbtc_facebook_link'])){
            $tbtc_facebook_link = $custom['tbtc_facebook_link'][0];
        }
        if(isset($custom['tbtc_instagram_link'])){
            $tbtc_instagram_link = $custom['tbtc_instagram_link'][0];
        }
        if(isset($custom['tbtc_twitter_link'])){
            $tbtc_twitter_link = $custom['tbtc_twitter_link'][0];
        }
        if(isset($custom['tbtc_linkedIn_link'])){
            $tbtc_linkedIn_link = $custom['tbtc_linkedIn_link'][0];
        }
    }

    ?>

    <fieldset class="fieldset-1 fieldset-userDetail">
        <div class="social-media-section">
            <div class="group">
                <label><?php esc_html_e( "Facebook Link", 'tbthemes-companion' ); ?></label>
                <input type="url" name="tbtc_facebook_link" value="<?php if(isset($tbtc_facebook_link)) echo esc_attr( $tbtc_facebook_link ); ?>"><br>
                <label><?php esc_html_e( "Instagram Link", 'tbthemes-companion' ); ?></label>
                <input type="url" name="tbtc_instagram_link" value="<?php if(isset($tbtc_instagram_link)) echo esc_attr( $tbtc_instagram_link ); ?>"><br>
                <label><?php esc_html_e( "Twitter Link", 'tbthemes-companion' ); ?></label>
                <input type="url" name="tbtc_twitter_link" value="<?php if(isset($tbtc_twitter_link)) echo esc_attr( $tbtc_twitter_link ); ?>"><br>
                <label><?php esc_html_e( "LinkedIn Link", 'tbthemes-companion' ); ?></label>
                <input type="url" name="tbtc_linkedIn_link" value="<?php if(isset($tbtc_linkedIn_link)) echo esc_attr( $tbtc_linkedIn_link ); ?>"><br>
            </div>
        </div>

    </fieldset>

<?php }

//cta metafield
function tbtc_cta_options(){
    global $post;
    $custom = get_post_custom(get_the_ID());
    if (!empty($custom)){
        if(isset($custom['tbtc_cta_button'])){
            $tbtc_cta_button = $custom['tbtc_cta_button'][0];
        }
        if(isset($custom['tbtc_cta_link'])){
            $tbtc_cta_link = $custom['tbtc_cta_link'][0];
        }
    }

    ?>

    <fieldset class="fieldset-1 fieldset-userDetail">
        <div class="social-media-section">
            <div class="group">
                <label><?php esc_html_e( "CTA Button", 'tbthemes-companion' ); ?></label>
                <input type="text" name="tbtc_cta_button" value="<?php if(isset($tbtc_cta_button)) echo esc_attr( $tbtc_cta_button ); ?>"><br>
                <label><?php esc_html_e( "CTA Link", 'tbthemes-companion' ); ?></label>
                <input type="url" name="tbtc_cta_link" value="<?php if(isset($tbtc_cta_link)) echo esc_attr( $tbtc_cta_link ); ?>"><br>
            </div>
        </div>

    </fieldset>

<?php }


//price metafield
function tbtc_build_price(){
    global $post;
    $custom = get_post_custom(get_the_ID());
    if (!empty($custom)){
        if(isset($custom['tbtc_actual_price'])){
            $tbtc_actual_price = $custom['tbtc_actual_price'][0];
        }
        if(isset($custom['tbtc_sale_price'])){
            $tbtc_sale_price = $custom['tbtc_sale_price'][0];
        }
    }
    ?>

    <fieldset class="fieldset-1 fieldset-userDetail">
        <div class="social-media-section">
            <div class="group">
                <label><?php esc_html_e( "Actual Price", 'tbthemes-companion' ); ?></label>
                <input type="text" name="tbtc_actual_price" value="<?php if(isset($tbtc_actual_price)) echo esc_attr( $tbtc_actual_price ); ?>"><br>
                <label><?php esc_html_e( "Sale Price", 'tbthemes-companion' ); ?></label>
                <input type="text" name="tbtc_sale_price" value="<?php if(isset($tbtc_sale_price)) echo esc_attr( $tbtc_sale_price ); ?>"><br>
            </div>
        </div>

    </fieldset>

<?php }