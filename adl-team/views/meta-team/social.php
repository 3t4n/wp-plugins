<?php
/*
 * Template for showing Social Meta Info on Member Post Screen.
 */
$social_info = (array_key_exists('social_info', $args)) ? $args['social_info'] : array();

?>
<div class="cmb2-wrap form-table">
    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list">
        <h2 class="social-h2"><span class="button button-primary" id="addNewSocial"><?php esc_html_e('Add New Social', ADL_TEAM_TEXTDOMAIN); ?></span></h2>

        <div id="social_info_sortable_container">
            <?php
            if ( !empty($social_info) ):
                foreach ( $social_info as $index => $socialInfo ): // eg. here, $socialInfo = ['id'=> 'facebook', 'url'=> 'http://fb.com']
                    ?>
                    <div class="cmb-row cmb-type-text-medium adl_social_field_wrapper" id="socialID-<?= $index; ?>">
                        <div class="cmb-th adl_team_meta_label">
                            <select name="social[<?= $index; ?>][id]">
                                <?php foreach ( $ADL_team->adl_social_links() as $nameID => $socialName ) { ?>
                                    <option value='<?= esc_attr($nameID); ?>' <?php selected($nameID, $socialInfo['id']);?> > <?= esc_html($socialName); ?></option>;
                                <?php } ?>
                            </select>
                        </div>
                        <div class="cmb-td">
                            <input type="url" name="social[<?= $index; ?>][url]" class="cmb2-text-medium adl_social_input" value="<?= esc_url($socialInfo['url']); ?>" placeholder="eg. http://example.com"><span data-id="<?= $index; ?>" class="removeSocialField dashicons dashicons-dismiss" title="Remove this item"></span> <span class="adl-move-icon dashicons dashicons-move"></span>
                        </div>
                    </div> <!--   ends .cmb-row   &  .adl_social_field_wrapper-->

                    <?php
                endforeach;

            else:
                ?>
                <div class="cmb-row cmb-type-text-medium adl_social_field_wrapper" id="socialID-0">
                    <div class="cmb-th adl_team_meta_label">
                        <select name="social[0][id]">
                            <?php foreach ( $ADL_team->adl_social_links() as $nameID => $socialName ) { ?>
                                <option value='<?= esc_attr($nameID); ?>' > <?= esc_html($socialName); ?></option>;
                            <?php } ?>
                        </select>
                    </div>
                    <div class="cmb-td">
                        <input type="url" name="social[0][url]" class="cmb2-text-medium adl_social_input" value="" placeholder="eg. http://example.com" required=""><span data-id="0" class="removeSocialField dashicons dashicons-dismiss" title="Remove this item"></span> <span class="adl-move-icon dashicons dashicons-move"></span>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div> <!--    ends .social_info_sortable_container    -->

    </div> <!-- end .cmb2-metabox -->
</div> <!-- end .cmb2-wrap -->

