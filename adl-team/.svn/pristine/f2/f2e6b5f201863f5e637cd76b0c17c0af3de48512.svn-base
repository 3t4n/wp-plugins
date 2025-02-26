<?php
/*
 * Template for showing Contact Meta Info on Member Post Screen.
 */

$contact_info = (array_key_exists('contact_info', $args)) ? $args['contact_info'] : array();
extract($contact_info);

?>
<div class="cmb2-wrap form-table">
    <div id="cmb2-metabox" class="cmb2-metabox cmb-field-list pt-package-list">

        <div class="member-contact-info-body">

            <!--Email -->

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="member_email"><?php esc_html_e('Email', ADL_TEAM_TEXTDOMAIN); ?></label>
                </div>

                <div class="cmb-td">
                    <input type="email" id="member_email" class="cmb2-text-medium" name="contact[member_email]"  placeholder="eg. yourmail@example.com" value="<?php echo (!empty($member_email))? esc_attr($member_email): '' ; ?>">
                </div>
            </div>

            <!--Office Telephone -->

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="office_telephone"><?php esc_html_e('Office Telephone', ADL_TEAM_TEXTDOMAIN); ?></label>
                </div>

                <div class="cmb-td">
                    <input type="text" id="office_telephone" class="cmb2-text-medium" name="contact[office_telephone]"  placeholder="eg. (02) 0203 380 1479" value="<?php echo (!empty($office_telephone))? esc_attr($office_telephone): '' ; ?>">
                </div>
            </div>

            <!--Home Telephone -->

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="home_telephone"><?php esc_html_e('Home Telephone', ADL_TEAM_TEXTDOMAIN); ?></label>
                </div>

                <div class="cmb-td">
                    <input type="text" id="home_telephone" class="cmb2-text-medium" name="contact[home_telephone]"  placeholder="eg. (02) 0203 380 1479" value="<?php echo (!empty($home_telephone))? esc_attr($home_telephone): '' ; ?>">
                </div>
            </div>

            <!--Cell Number -->

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="mobile_number"><?php esc_html_e('Personal Cell Number', ADL_TEAM_TEXTDOMAIN); ?></label>
                </div>

                <div class="cmb-td">
                    <input type="text" id="mobile_number" class="cmb2-text-medium" name="contact[mobile_number]"  placeholder="eg. (02) 0203 380 1479" value="<?php echo (!empty($mobile_number))? esc_attr($mobile_number): '' ; ?>">
                </div>
            </div>

            <!--Skype ID -->

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="skype_id"><?php esc_html_e('Skype ID', ADL_TEAM_TEXTDOMAIN); ?></label>
                </div>

                <div class="cmb-td">
                    <input type="text" id="skype_id" class="cmb2-text-medium" name="contact[skype_id]"  placeholder="eg. hello57" value="<?php echo (!empty($skype_id))? esc_attr($skype_id): '' ; ?>">
                </div>
            </div>


            <!--Personal Website -->

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="website"><?php esc_html_e('Personal Website', ADL_TEAM_TEXTDOMAIN); ?></label>
                </div>

                <div class="cmb-td">
                    <input type="url" id="website" class="cmb2-text-medium" name="contact[website]"  placeholder="eg. http://example.com" value="<?php echo (!empty($website))? esc_url($website): '' ; ?>">
                </div>
            </div>

            <!--Location -->

            <div class="cmb-row cmb-type-text-medium">
                <div class="cmb-th">
                    <label for="location"><?php esc_html_e('Location', ADL_TEAM_TEXTDOMAIN); ?></label>
                </div>

                <div class="cmb-td">
                    <input type="text" id="location" class="cmb2-text width80pc" name="contact[location]"  placeholder="795 Folsom Ave, Suite 600
San Francisco, CA 94107, Canada" value="<?php echo (!empty($location))? esc_attr($location): '' ; ?>">
                </div>
            </div>

        </div> <!-- end member-contact-info-body -->


    </div> <!-- end cmb2-metabox -->
</div> <!-- end cmb2-wrap -->


