<?php

if ( ! class_exists( 'About_Author_Box_User_Options' ) ) {

    /**
     * Handles user options ( social )
     *
     * @since 1.0.0
     */
    class About_Author_Box_User_Options {

        /**
         * Constructor
         *
         * @since 1.0.0
         */
        function __construct() {

            add_action( 'show_user_profile', array( $this, 'show_fields' ) );
            add_action( 'edit_user_profile', array( $this, 'show_fields' ) );

            add_action( 'personal_options_update', array( $this, 'save_fields' ) );
            add_action( 'edit_user_profile_update', array( $this, 'save_fields' ) );

        }

        /**
         * Display additional profile fields
         *
         * @since 1.0.0
         */
        function show_fields( $user ) {

            ?>

            <h3><?php esc_html_e(  'Social Profiles', 'about-author-box' ); ?></h3>

            <table class="form-table">

                <tr>
                    <th><label for="about_author_box_twitter"><?php esc_html_e(  'Twitter', 'about-author-box' ); ?></label></th>
                    <td>
                        <input type="text" name="about_author_box_twitter" id="about_author_box_twitter" value="<?php echo esc_attr( get_the_author_meta( 'about_author_box_twitter', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e(  'The full URL to your profile.', 'about-author-box' ); ?></span>
                    </td>
                </tr>

                <tr>
                    <th><label for="about_author_box_facebook"><?php esc_html_e(  'Facebook', 'about-author-box' ); ?></label></th>
                    <td>
                        <input type="text" name="about_author_box_facebook" id="about_author_box_facebook" value="<?php echo esc_attr( get_the_author_meta( 'about_author_box_facebook', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e(  'The full URL to your profile.', 'about-author-box' ); ?></span>
                    </td>
                </tr>

                <tr>
                    <th><label for="about_author_box_instagram"><?php esc_html_e(  'Instagram', 'about-author-box' ); ?></label></th>
                    <td>
                        <input type="text" name="about_author_box_instagram" id="about_author_box_instagram" value="<?php echo esc_attr( get_the_author_meta( 'about_author_box_instagram', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e(  'The full URL to your profile.', 'about-author-box' ); ?></span>
                    </td>
                </tr>

                <tr>
                    <th><label for="about_author_box_behance"><?php esc_html_e(  'Behance', 'about-author-box' ); ?></label></th>
                    <td>
                        <input type="text" name="about_author_box_behance" id="about_author_box_behance" value="<?php echo esc_attr( get_the_author_meta( 'about_author_box_behance', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e(  'The full URL to your profile.', 'about-author-box' ); ?></span>
                    </td>
                </tr>

                <tr>
                    <th><label for="about_author_box_dribbble"><?php esc_html_e(  'Dribbble', 'about-author-box' ); ?></label></th>
                    <td>
                        <input type="text" name="about_author_box_dribbble" id="about_author_box_dribbble" value="<?php echo esc_attr( get_the_author_meta( 'about_author_box_dribbble', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e(  'The full URL to your profile.', 'about-author-box' ); ?></span>
                    </td>
                </tr>

                <tr>
                    <th><label for="about_author_box_vine"><?php esc_html_e(  'Vine', 'about-author-box' ); ?></label></th>
                    <td>
                        <input type="text" name="about_author_box_vine" id="about_author_box_vine" value="<?php echo esc_attr( get_the_author_meta( 'about_author_box_vine', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e(  'The full URL to your profile.', 'about-author-box' ); ?></span>
                    </td>
                </tr>

                <tr>
                    <th><label for="about_author_box_linkedin"><?php esc_html_e(  'LinkedIn', 'about-author-box' ); ?></label></th>
                    <td>
                        <input type="text" name="about_author_box_linkedin" id="about_author_box_linkedin" value="<?php echo esc_attr( get_the_author_meta( 'about_author_box_linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e(  'The full URL to your profile.', 'about-author-box' ); ?></span>
                    </td>
                </tr>

                <tr>
                    <th><label for="about_author_box_pinterest"><?php esc_html_e(  'Pinterest', 'about-author-box' ); ?></label></th>
                    <td>
                        <input type="text" name="about_author_box_pinterest" id="about_author_box_pinterest" value="<?php echo esc_attr( get_the_author_meta( 'about_author_box_pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
                        <span class="description"><?php esc_html_e(  'The full URL to your profile.', 'about-author-box' ); ?></span>
                    </td>
                </tr>

            </table>

            <?php

        }

        /**
         * Process additional fields
         *
         * @since 1.0.0
         */
        function save_fields( $user_id ) {

            if ( !current_user_can( 'edit_user', $user_id ) )
                return false;

            update_user_meta( $user_id, 'about_author_box_twitter', sanitize_text_field( $_POST['about_author_box_twitter'] ) );
            update_user_meta( $user_id, 'about_author_box_facebook', sanitize_text_field( $_POST['about_author_box_facebook'] ) );
            update_user_meta( $user_id, 'about_author_box_instagram', sanitize_text_field( $_POST['about_author_box_instagram'] ) );
            update_user_meta( $user_id, 'about_author_box_behance', sanitize_text_field( $_POST['about_author_box_behance'] ) );
            update_user_meta( $user_id, 'about_author_box_dribbble', sanitize_text_field( $_POST['about_author_box_dribbble'] ) );
            update_user_meta( $user_id, 'about_author_box_vine', sanitize_text_field( $_POST['about_author_box_vine'] ) );
            update_user_meta( $user_id, 'about_author_box_linkedin', sanitize_text_field( $_POST['about_author_box_linkedin'] ) );
            update_user_meta( $user_id, 'about_author_box_pinterest', sanitize_text_field( $_POST['about_author_box_pinterest'] ) );

        }

    }

}

new About_Author_Box_User_Options();
