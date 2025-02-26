<?php
/*
 * Template for showing Contact Meta Info on Member Post Screen.
 */

$general_info = (array_key_exists('general_info', $args)) ? $args['general_info'] : array();
extract($general_info);
?>
<div class="cmb2-wrap form-table">
    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list pt-package-list">

        <div class="adl-member-info-body">

            <!--Details Bio -->
            <div class="cmb-row cmb-type-text-medium">
                <label class="member-bio-label"><?php esc_html_e('Full Biography', ADL_TEAM_TEXTDOMAIN); ?></label>

                <?php wp_editor($memberfullbio, 'memberfullbio', $e_settings_full); ?>


            </div>

            <!--Short Bio -->
            <div class="cmb-row cmb-type-text-medium">
                <label class="member-bio-label" for="member_short_bio"><?php esc_html_e('Short Biography (Max 15 words)', ADL_TEAM_TEXTDOMAIN); ?></label>

                <?php wp_editor($membershortbio, 'membershortbio', $e_settings_short); ?>

            </div>


            <!--Image -->

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label class="pt-label" id="member_image_label" for="member_image"><?php esc_html_e('Member Image', ADL_TEAM_TEXTDOMAIN); ?> </label>

                </div>

                <div class="cmb-td">

                    <!-- image container, which can be manipulated with js -->
                    <div class="custom-img-container">
                        <?php if ( $member_img_src ) { ?>
                            <img src="<?php echo $member_img_src; ?>" alt="Member Image" />
                        <?php } else { ?>
                            <img src="<?php echo ADL_TEAM_ADMIN_ASSETS.'img/no-image.jpg' ?>" alt="Member Image" />
                        <?php } ?>
                    </div>

                    <!-- A hidden input to set and post the chosen image id -->
                    <input id="member_image_id" name="general[_member_image_id]" type="hidden" value="<?= (!empty($_member_image_id)) ? esc_attr( $_member_image_id ) : ''; ?>" />


                    <!--  add & remove image links -->
                    <p class="hide-if-no-js">
                        <a href="#" id="member_image_btn" class="button button-primary <?php if ( $member_img_src  ) { echo 'hidden'; } ?>">
                            <span class="dashicons dashicons-format-image"></span>
                            <?php esc_html_e('Upload Image', ADL_TEAM_TEXTDOMAIN) ?>
                        </a>
                        <a id="delete-custom-img" class="button button-primary <?php if ( ! $member_img_src  ) { echo 'hidden'; } ?>"
                           href="#">
                            <?php esc_html_e('Remove Image') ?>
                        </a>
                    </p>

                    <p class="cmb2-metabox-description"><?php esc_html_e('Image size should be larger than 270px in width and 322px in Height (two themes will use this size) / 260px in Height (four themes use this) . If you do not have the exact size, then upload large image than 270px by 322px.', ADL_TEAM_TEXTDOMAIN); ?></p>

                </div>
            </div>


        </div> <!-- end adl-member-info-body -->


    </div> <!-- end cmb2-metabox -->
</div> <!-- end cmb2-wrap -->

