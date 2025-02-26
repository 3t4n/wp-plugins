<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'ERR_Settings' ) ){

    class ERR_Settings extends WC_Settings_Page {

        private $errDefaultTemplate;
        private $errEmails;

        /**
         * Constructor.
         */
        public function __construct() {

            $this->id    = 'err_settings';
            $this->label = __( 'Review Reminder' );

            // Easy Review Reminders tab
            add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 30 );
            add_action( 'woocommerce_settings_' . $this->id, array( $this, 'errOutput' ) );
            add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'errSave' ) );
            add_action( 'woocommerce_sections_' . $this->id, array( $this, 'output_sections' ) );
            add_filter( 'woocommerce_get_sections_' . $this->id, array( $this, 'errGetSections' ) );

            add_action( 'woocommerce_admin_field_err_help_resources' , array( $this , 'errRenderHelpResources' ) );
            add_action( 'woocommerce_admin_field_err_email_schedules' , array( $this, 'errRenderERREmailSchedules' ) );
            add_action( 'woocommerce_admin_field_err_blacklist_emails' , array( $this, 'errRendererrBlacklistEmails' ) );
            add_action( 'woocommerce_admin_field_err_upsell' , array( $this , 'errRenderUpsellGraphics' ) );

            add_action( 'woocommerce_admin_field_err_button', array( $this, 'errRenderButton' ) );

            // Email Schedules
            add_action( 'woocommerce_admin_field_err_content_wysiwyg', array( $this, 'errRenderEmailContentWYSIWYG' ) );
            add_action( 'woocommerce_admin_field_err_schedule_buttons', array( $this, 'errRenderSchedulesButtons' ) );

            $this->errEmails = ERR_Emails::getInstance();
            $this->errDefaultTemplate = $this->errEmails->errDefaultTemplate;

            do_action( 'err_settings_constructor' );

        }

        /**
         * Get sections.
         *
         * @return array
         * @since 1.0.0
         */

        public function errGetSections() {

            $sections = array(
                ''                                 =>  __( 'General', 'easy-review-reminders' ),
                'err_settings_email_schedules'     =>  __( 'Email Schedules', 'easy-review-reminders' ),
                'err_blacklist_emails_section'     =>  __( 'Blacklist Emails', 'easy-review-reminders' ),
                'err_settings_help_section'        =>  __( 'Help', 'easy-review-reminders' ),
            );

            return apply_filters( 'err_get_sections_' . $this->id, $sections );

        }

        /**
         * Output the settings.
         *
         * @since 1.0.0
         */
        public function errOutput() {

            global $current_section;

            $settings = $this->errGetSettings( $current_section );
            WC_Admin_Settings::output_fields( $settings );

        }

        /**
         * Save settings.
         *
         * @since 1.0.0
         */
        public function errSave() {

            global $current_section;

            $settings = $this->errGetSettings( $current_section );
            WC_Admin_Settings::save_fields( $settings );

        }

        /**
         * Get settings array.
         *
         * @param string $current_section
         *
         * @return mixed
         * @since 1.0.0
         */
        public function errGetSettings( $current_section = '' ) {

            if ( $current_section == 'err_settings_help_section' ) {

                // Help Section
                $settings = apply_filters( 'err_settings_help_section_settings', $this->errGetHelpSectionSettings() );

                if( ! isset( $_GET[ 'debug' ] ) || ( isset( $_GET[ 'debug' ] ) && $_GET[ 'debug' ] != true ) ) { ?>

                    <style type="text/css">
                        .err_manual_run_email_sender,
                        .err_manual_run_time_considered_not_reviewed,
                        .err_manual_run_clear_all_emails{
                            display: none !important;
                        }
                    </style><?php
                }

            } else if ( $current_section == 'err_settings_email_schedules' ) {

                $settings = apply_filters( 'err_settings_email_schedules_section_settings', $this->errGetEmailSchedulesSectionSettings() );

            } else if ( $current_section == 'err_blacklist_emails_section' ) {

                $settings = apply_filters( 'err_settings_blacklist_emails_section_settings', $this->errGetBlacklistEmailsSectionSettings() );

            } else {

                // General Section
                $settings = apply_filters( 'err_settings_general_section_settings', $this->errGetGeneralSectionSettings() );

            }

            return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, $current_section );

        }

        /*
         |--------------------------------------------------------------------------------------------------------------
         | Section Settings
         |--------------------------------------------------------------------------------------------------------------
         */

        /**
         * Get general section settings.
         *
         * @return array
         * @since 1.0.0
         */
        private function errGetGeneralSectionSettings(){

            $errGeneralSettings = array(

                        array(
                            'title'     =>  __( 'General Options', 'easy-review-reminders' ),
                            'type'      =>  'title',
                            'desc'      =>  '',
                            'id'        =>  'err_general_main_title'
                        ),

                        array(
                            'name'  =>  '',
                            'type'  =>  'err_upsell',
                            'desc'  =>  '',
                            'id'    =>  'err_upsell',
                        ),

                        array(
                            'title'     =>  __( 'Days Considered "Not Reviewed"', 'easy-review-reminders' ),
                            'type'      =>  'number',
                            'desc'      =>  __( 'days after the final review reminder email is sent' , 'easy-review-reminders' ),
                            'desc_tip'  =>  __( 'If at least one product in the order is not reviewed by the customer within the number of days specified in this setting then the system will mark the review reminder as "Not Reviewed".' , 'easy-review-reminders' ),
                            'id'        =>  'err_general_considered_not_reviewed',
                            'css'       =>  'width:60px;',
                            'custom_attributes' => array(
                                'min'   => 0,
                                'step'  => 1
                            )
                        ),

                        array(
                            'type'      =>  'sectionend',
                            'id'        =>  'err_general_sectionend'
                        )


                    );

            return apply_filters( 'err_general_settings', $errGeneralSettings );

        }

        /**
         * Email schedule settings
         *
         * @return array
         * @since 1.0.0
         */
        public function errGetEmailSchedulesSectionSettings(){

            $errEmailSchedulesSettings = array(

                array(
                    'title' =>  __( 'Email Schedules', 'easy-review-reminders' ),
                    'type'  =>  'title',
                    'desc'  =>  '',
                    'id'    =>  'err_email_schedules_main_title'
                ),

                array(
                    'name'  =>  '',
                    'type'  =>  'err_email_schedules',
                    'desc'  =>  '',
                    'id'    =>  'err_email_schedules',
                ),

                array(
                    'type'  =>  'sectionend',
                    'id'    =>  'err_email_schedules_sectionend'
                )

            );

            return apply_filters( 'err_email_schedules_settings', $errEmailSchedulesSettings );
        }

        /**
         * Get blacklist section settings.
         *
         * @return array
         * @since 1.0.0
         */
        private function errGetBlacklistEmailsSectionSettings(){

            $errBlackListSettings = array(

                array(
                    'title' =>  __( 'Blacklist Options', 'easy-review-reminders' ),
                    'type'  =>  'title',
                    'desc'  =>  __( 'A list of all email addressed that have opted out of review reminder communication.', 'easy-review-reminders' ),
                    'id'    =>  'err_help_main_title'
                ),

                array(
                    'name'  =>  '',
                    'type'  =>  'err_blacklist_emails',
                    'desc'  =>  __( 'Insert the email address you want to add in the list.', 'easy-review-reminders' ),
                    'id'    =>  'err_blacklist_emails',
                ),

                array(
                    'type'  =>  'sectionend',
                    'id'    =>  'err_blacklist_sectionend'
                )

            );

            return apply_filters( 'err_blacklist_settings', $errBlackListSettings );

        }

        /**
         * Get help section settings.
         *
         * @return array
         * @since 1.0.0
         */
        private function errGetHelpSectionSettings(){

            $errHelpSettings = array(

                array(
                    'title' =>  __( 'Help Options', 'easy-review-reminders' ),
                    'type'  =>  'title',
                    'desc'  =>  '',
                    'id'    =>  'err_help_main_title'
                ),

                array(
                    'title' => '',
                    'type'  => 'err_help_resources',
                    'desc'  => '',
                    'id'    => 'err_help_resources'
                ),

                array(
                    'title' =>  __( 'Run Email Sender', 'easy-review-reminders' ),
                    'type'  =>  'err_button',
                    'desc'  =>  __( 'This will run the email sender cron function.', 'easy-review-reminders' ),
                    'id'    =>  'err_manual_run_email_sender',
                    'class' =>  'button button-primary'
                ),

                array(
                    'title' =>  __( 'Run Time Considered "Not Reviewed" cron', 'easy-review-reminders' ),
                    'type'  =>  'err_button',
                    'desc'  =>  __( 'This will run the Time Considered Not Reviewed cron function.', 'easy-review-reminders' ),
                    'id'    =>  'err_manual_run_time_considered_not_reviewed',
                    'class' =>  'button button-primary'
                ),

                array(
                    'title' =>  __( 'Clear All Emails', 'easy-review-reminders' ),
                    'type'  =>  'err_button',
                    'desc'  =>  __( 'This will remove everything against errEmailSender function.', 'easy-review-reminders' ),
                    'id'    =>  'err_manual_run_clear_all_emails',
                    'class' =>  'button button-primary'
                ),

                array(
                    'title' =>  __( 'Clean up plugin options on un-installation', 'easy-review-reminders' ),
                    'type'  =>  'checkbox',
                    'desc'  =>  __( 'If checked, removes all plugin options when this plugin is uninstalled. Note: Also affect premium version.', 'easy-review-reminders' ),
                    'id'    =>  'err_general_clean_plugin_options',
                ),

                array(
                    'type'  =>  'sectionend',
                    'id'    =>  'err_cron_sectionend'
                )

            );

            return apply_filters( 'err_help_settings', $errHelpSettings );

        }

        /*
         |--------------------------------------------------------------------------------------------------------------
         | Settings
         |--------------------------------------------------------------------------------------------------------------
         */

        /**
         * Render knowledge base link
         *
         * @param $data
         *
         * @since 1.0.0
         */
        public function errRenderHelpResources( $data ) { ?>

            <tr valign="top">
                <th scope="row" class="titledesc">
                    <label for=""><?php _e( 'Knowledge Base' , 'easy-review-reminders' ); ?></label>
                </th>
                <td class="forminp forminp-<?php echo sanitize_title( $data[ 'type' ] ); ?>">
                    <?php echo sprintf( __( 'Looking for documentation? Please see our growing <a href="%1$s" target="_blank">Knowledge Base</a>' , 'easy-review-reminders' ) , "https://marketingsuiteplugin.com/knowledge-base/easy-review-reminders/?utm_source=ERR&utm_medium=Settings%20Help&utm_campaign=ERR" ); ?>
                </td>
            </tr><?php

            do_action( 'err_settings_knowledge_base', $data );

        }

        /**
         * Render custom buttons.
         *
         * @param array $data
         *
         * @since 1.0.0
         */
        public function errRenderButton( $data ){

            // Change type accordingly
            $type = $data[ 'type' ];
            if( $type == 'err_button')
                $type = 'button';

            // Description handling
            $description = "";
            $tip = "";

            if ( ! empty( $data[ 'desc_tip' ] ) ) {
                $tip = $data[ 'desc_tip' ];
            }

            if ( ! empty( $data[ 'desc' ] ) ) {
                $description = $data[ 'desc' ];
            }

            ob_start();

            $id = $data[ 'id' ];
            if( $id == 'err_manual_run_email_sender' )
                $hookName = ERR_EMAIL_SENDER_CRON;
            elseif( $id == 'err_manual_run_time_considered_not_reviewed' )
                $hookName = ERR_TIME_CONSIDERED_NOT_REVIEWED_CRON; ?>

                <tr valign="top" class="<?php echo $id; ?>">
                    <th scope="row" class="titledesc">
                        <label for="<?php echo esc_attr( $data[ 'id' ] ); ?>"><?php echo esc_html( $data[ 'title' ] ); ?></label>
                        <span class="description"><?php echo $tip; ?></span>
                    </th><?php

                    if( isset( $hookName ) ) { ?>

                        <td class="forminp forminp-<?php echo sanitize_title( $data[ 'type' ] ); ?>">
                            <?php echo "<a class='button button-secondary' href='" . wp_nonce_url( 'admin.php?page=wc-settings&tab=err_settings&amp;section=err_settings_help_section&amp;action=err-manual-cron&amp;hook-name=' . $hookName . '&debug=true', 'err-manual_' . $hookName ) . "'>" . __( 'Run Now', 'easy-review-reminders' ) . "</a>"; ?>
                            <span class="description"><?php echo $description; ?></span>
                        </td><?php

                    }else{ ?>

                        <td class="forminp forminp-<?php echo sanitize_title( $data[ 'type' ] ); ?>">
                            <?php echo "<a class='button button-secondary' href='" . wp_nonce_url( 'admin.php?page=wc-settings&tab=err_settings&amp;section=err_settings_help_section&amp;action=' . $id . '&debug=true', 'err-manual-' . $id ) . "'>" . __( 'Run Now', 'easy-review-reminders' ) . "</a>"; ?>
                            <span class="description"><?php echo $description; ?></span>
                        </td>

                    <?php } ?>
                </tr><?php

            echo ob_get_clean();

        }

        /**
         * Render blacklisted emails.
         *
         * @param array $data
         *
         * @since 1.0.0
         */
        public function errRendererrBlacklistEmails( $data ){

            $errBlacklistedEmails = get_option( ERR_BLACKLIST_EMAILS_OPTION );
            if ( ! is_array( $errBlacklistedEmails ) )
                $errBlacklistedEmails = array(); ?>

            <tr valign="top">
                <th scope="row" class="titledesc">
                    <div class="blacklist-controls">
                        <div class="field-container text-field-container">

                            <label for="err_email_field"><?php _e( 'Manually Unsubscribe Email Address' , 'easy-review-reminders' ); ?></label>
                            <span class=""></span>
                            <input type="text" id="err_email_field"/>
                            <p class="desc"><?php echo $data[ 'desc' ]; ?></p>
                        </div>
                    </div>
                    <div class="button-controls add-mode">

                        <input type="button" id="err-add-email" class="button button-primary" value="<?php _e( 'Add' , 'easy-review-reminders' ); ?>"/>
                        <span class="spinner"></span>

                        <div style="clear: both; float: none; display: block;"></div>

                    </div>

                    <table id="err-blacklist-emails-table" class="wp-list-table widefat">
                        <thead>
                            <tr>
                                <th><?php _e( 'Email', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Date Added', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Reason', 'easy-review-reminders' ); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?php _e( 'Email', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Date Added', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Reason', 'easy-review-reminders' ); ?></th>
                                <th></th>
                            </tr>
                        </tfoot>

                        <tbody><?php

                        if ( $errBlacklistedEmails ) {

                            $itemNumber =   0;

                            foreach( $errBlacklistedEmails as $email => $reason ) {

                                $itemNumber++;
                                extract( $reason );

                                if ( $itemNumber % 2 == 0 ) { // even  ?>
                                    <tr class="even">
                                <?php } else { // odd ?>
                                    <tr class="odd alternate">
                                <?php } ?>

                                    <td class="meta hidden"></td>
                                    <td class="err_row_email"><?php echo $email; ?></td>
                                    <td class="err_row_date"><?php echo isset( $date ) ? date( 'Y-m-d h:i:s A', $date ) : ''; ?></td>
                                    <td class="err_row_reason"><?php echo ucfirst( $reason ); ?></td>
                                    <td class="controls">
                                        <a class="delete dashicons dashicons-no"></a>
                                    </td>

                                </tr>
                            <?php
                            }

                        } else { ?>
                            <tr class="no-items">
                                <td class="colspanchange" colspan="7"><?php _e( 'No emails Found' , 'easy-review-reminders' ); ?></td>
                            </tr>
                        <?php } ?>

                        </tbody>

                    </table>

                </th>
            </tr>

            <style>
                p.submit {
                    display: none !important;
                }
            </style>
        <?php
        }

        /**
         * Render the manage screen where they can add, view, update and delete email schedules
         *
         * @param array $data
         *
         * @since 1.0.0
         */
        public function errRenderERREmailSchedules( $data ){

            $errFunctions = new ERR_Functions;

            $errEmailSchedules = get_option( ERR_EMAIL_SCHEDULES_OPTION );
            if ( ! is_array( $errEmailSchedules ) )
                $errEmailSchedules = array();

            do_action( 'err_settings_before_email_schedules', $data ); ?>

            <tr valign="top">
                <td scope="row" class="titledesc"><?php

                    $errEmailSchedulesForm = array(

                                array(
                                    'title' =>  __( 'Subject', 'easy-review-reminders' ),
                                    'type'  =>  'text',
                                    'desc'  =>  '',
                                    'id'    =>  'err_email_subject_field'
                                ),

                                array(
                                    'title' =>  __( 'Days After Successful Order', 'easy-review-reminders' ),
                                    'type'  =>  'number',
                                    'desc'  =>  '',
                                    'id'    =>  'err_email_days_after_successful_order_field',
                                    'css'   =>  'width:60px;',
                                                'custom_attributes' => array(
                                                    'min'   => 0,
                                                    'step'  => 1
                                                )
                                ),

                                array(
                                    'title' =>  __( 'Wrap emails with WooCommerce email header and footer?', 'easy-review-reminders' ),
                                    'type'  =>  'checkbox',
                                    'desc'  =>  __( 'If enabled, the emails will be wrapped with WooCommerce email header and footer.', 'easy-review-reminders' ),
                                    'id'    =>  'err_email_wrap_wc_header_footer_field'
                                ),

                                array(
                                    'title' =>  __( 'Heading Text', 'easy-review-reminders' ),
                                    'type'  =>  'text',
                                    'desc'  =>  '',
                                    'id'    =>  'err_email_heading_text',
                                    'css'   =>  'width: 65%;'
                                ),

                                array(
                                    'title' =>  '',
                                    'type'  =>  'err_content_wysiwyg',
                                    'desc'  =>  '',
                                    'id'    =>  'err_content_wysiwyg'
                                ),

                                array(
                                    'title' =>  '',
                                    'type'  =>  'err_schedule_buttons',
                                    'desc'  =>  '',
                                    'id'    =>  'err_schedule_buttons'
                                ),

                            );

                    $errEmailSchedulesForm = apply_filters( 'err_email_schedules_controls', $errEmailSchedulesForm, $data ); ?>

                    <!-- Add Data -->
                    <div class="err-email-schedules-controls" id="err-email-schedules-controls" style="display:none;">
                        <div class="form-container">
                            <table>
                                <?php echo WC_Admin_Settings::output_fields( $errEmailSchedulesForm ); ?>
                            </table>
                        </div>
                    </div>

                    <!-- View Data -->
                    <div id="err-view-data">
                        <table><?php
                            $errViewData[] =    '<tr>' .
                                                    '<td class="err_email_subject_field">' .
                                                        '<label for="err_email_subject_field"><b>'. __( 'Subject', 'easy-review-reminders' ) . '</b></label>' .
                                                    '</td>' .
                                                    '<td class="err_email_subject_value">&nbsp;</td>' .
                                                '</tr>';
                            $errViewData[] =    '<tr>' .
                                                    '<td class="err_email_days_after_successful_order_field">' .
                                                        '<label for="err_email_days_after_successful_order_field"><b>' . __( 'Days After Successful Order', 'easy-review-reminders' ) .'</b></label>' .
                                                    '</td>' .
                                                    '<td class="err_email_days_after_successful_order_value">&nbsp;</td>' .
                                                '</tr>';

                            $errViewData[] =    '<tr>' .
                                                    '<td class="err_email_wrap_wc_header_footer_field">' .
                                                        '<label for="err_email_wrap_wc_header_footer_field"><b>' . __( 'Wrap emails with WooCommerce header & Footer', 'easy-review-reminders' ) . '</b></label>' .
                                                    '</td>' .
                                                    '<td class="err_email_wrap_wc_header_footer_value">&nbsp;</td>' .
                                                '</tr>';
                            $errViewData[] =    '<tr>' .
                                                    '<td class="err_email_heading_text_field">' .
                                                        '<label for="err_email_heading_text_field"><b>' . __( 'Heading Text', 'easy-review-reminders' ) . '</b></label>' .
                                                    '</td>' .
                                                    '<td class="err_email_heading_text_value">&nbsp;</td>' .
                                                '</tr>';
                            $errViewData[] =    '<tr>' .
                                                    '<td class="err_email_content_field"><b>' . __( 'Content', 'easy-review-reminders' ) . '</b></td>' .
                                                    '<td class="err_email_content_value">&nbsp;</td>' .
                                                '</tr>';

                            $errViewData = apply_filters( 'err_view_schedule_form', $errViewData, $data );
                            echo implode( '', $errViewData ); ?>

                        </table>
                    </div>

                    <?php do_action( 'err_before_email_schedules_table', $data, $errEmailSchedules ); ?>

                    <table id="err-email-schedules-table" class="wp-list-table widefat">
                        <thead>
                            <tr>
                                <th><?php _e( 'Subject', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Wrap with WC header & Footer', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Days After Successful Order', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Content', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Actions', 'easy-review-reminders' ); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?php _e( 'Subject', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Wrap with WC header & Footer', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Days After Successful Order', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Content', 'easy-review-reminders' ); ?></th>
                                <th><?php _e( 'Actions', 'easy-review-reminders' ); ?></th>
                            </tr>
                        </tfoot>
                        <tbody><?php

                            if ( $errEmailSchedules ) {

                                $itemNumber = 0;

                                foreach( $errEmailSchedules as $key => $val ) {
                                    $itemNumber++;

                                    $errOnlyInitial = apply_filters( 'err_only_initial_template', $key === 'initial' ? true : false );

                                    if( $errOnlyInitial ){

                                        if ( $itemNumber % 2 == 0 ) { // even  ?>
                                            <tr class="err-email-id-<?=$key ?> even"><?php
                                        } else { // odd ?>
                                            <tr class="err-email-id-<?=$key ?> odd alternate"><?php
                                        } ?>

                                            <td class="err-subject"><?= ! empty( $val[ 'subject' ] ) ? $val[ 'subject' ] : ''; ?></td>
                                            <td class="err-wrap-wc-header-footer">
                                                <?= ! empty( $val[ 'wrap' ] ) ? ucfirst( $val[ 'wrap' ] ) : ''; ?>
                                            </td>
                                            <td class="err-days-after-successful-order">
                                                <?= ! empty( $val[ 'days_after_successful_order' ] ) ? $val[ 'days_after_successful_order' ] : ''; ?>
                                                <?= ! empty( $val[ 'days_after_successful_order' ] ) && $val[ 'days_after_successful_order' ] > 1 ? 'Days' : 'Day'; ?>
                                            </td>
                                            <td class="err-content"><?php
                                                $content = $errFunctions->errContentExcerpt( wc_clean( $val[ 'content' ] ), 10 );
                                                echo ! empty( $content ) ? $content : ''; ?>
                                            </td>
                                            <td class="controls">
                                                <input type="hidden" value="<?=$key ?>" class="key">
                                                <a class="view dashicons dashicons-search" title="<?php _e( 'Preview', 'easy-review-reminders' ); ?>"></a>
                                                <a href="#err-email-schedules-controls" class="edit dashicons dashicons-edit" title="<?php _e( 'Edit', 'easy-review-reminders' ); ?>"></a>

                                                <?php do_action( 'err_email_schedules_actions', $key ); ?>

                                            </td>

                                        </tr><?php

                                    }
                                }

                                do_action( 'err_after_email_schedule_list', $data, $errEmailSchedules );

                            } else { ?>
                                <tr class="no-items">
                                    <td class="colspanchange" colspan="7"><?php _e( 'No emails Found' , 'easy-review-reminders' ); ?></td>
                                </tr><?php
                            } ?>
                        </tbody>
                    </table>

                    <?php do_action( 'err_after_email_schedules_table', $data, $errEmailSchedules ); ?>

                </td>
            </tr>

            <style>
                p.submit {
                    display: none !important;
                }
            </style><?php

            do_action( 'err_settings_after_email_schedules', $data, $this->errDefaultTemplate );
        }


        /**
         * Render upsell graphic.
         *
         * @param array $data
         *
         * @since 1.0.0
         */
        public function errRenderUpsellGraphics( $data ){ ?>

            <tr valign="top">
                <th scope="row" class="titledesc" colspan="2">
                    <a target="_blank" href="https://marketingsuiteplugin.com/product/easy-review-reminders/?utm_source=ERR&utm_medium=Settings%20Banner&utm_campaign=ERR">
                        <img style="outline: none;" src="<?php echo ERR_IMAGES_URL . 'general-upsells.png'; ?>" alt="<?php _e( 'Easy Review Reminders Premium' , 'easy-review-reminders' ); ?>"/>
                    </a>
                </th>
            </tr><?php

        }

        /**
         * Render email content WYSIWYG.
         *
         * @param array $data
         *
         * @since 1.0.1
         */
        public function errRenderEmailContentWYSIWYG( $data ){ ?>

            <tr>
                <td><b><?php _e( 'Content', 'easy-review-reminders' ); ?></b></td>
                <td>
                    <span class="description" style="display: block; margin: 10px 0px;"><?php _e( 'You can use these template tags:', 'easy-review-reminders' );
                        $tags = "";
                        foreach ( $this->errDefaultTemplate[ 'tags' ] as $tag => $desc ) {
                            $tags .= ' <b>' . $tag . '</b>,';
                        }
                        echo rtrim( $tags, ', ' ); ?>

                    </span><?php

                        do_action( 'err_settings_before_email_content_wysiwyg', $data, $this->errDefaultTemplate );

                        $settings = array(
                                            'textarea_rows' => 20,
                                            'wpautop'       => true,
                                            'tinymce'       => array(
                                                'height' => 400
                                            )
                                        );

                        wp_editor( '', 'err_email_content_field', $settings ); ?>
                </td>
            </tr><?php

        }

        /**
         * Render schedules buttons.
         *
         * @param array $data
         *
         * @since 1.0.1
         */
        public function errRenderSchedulesButtons( $data ){ ?>

            <tr>
                <td colspan='2'>
                    <input type="hidden" id="err_email_schedule_id_field">
                    <div class="err-button-controls"><?php

                        $errButons[] = '<input type="button" id="err-add-email-schedule" class="add button button-primary" value="' . __( 'Add', 'easy-review-reminders' ) . '"/>';
                        $errButons[] = '<input type="button" id="err-update-email-schedule" class="edit button button-primary" value="' . __( 'Update', 'easy-review-reminders' ) . '" style="display:none;"/>';
                        $errButons[] = '<input type="button" id="err-cancel-email-schedule" class="cancel button button-primary" value="' . __(  'Cancel', 'easy-review-reminders' ) . '"/>';

                        $errButons = apply_filters( 'err_schedule_form_buttons', $errButons, $data );
                        echo implode( '', $errButons ); ?>

                        <span class="spinner"></span>

                        <div style="clear: both; float: none; display: block;"></div>

                    </div>
                </td>
            </tr><?php

        }
    }
}

return new ERR_Settings();
