<?php
function iati_fetch_project_data(){
    global $wpdb;

    // Check referer
    check_admin_referer( 'fetch_data_verify' );
    
    // Project ID will be retrieved from options if not provided in the form
    $iati_project_opts              = get_option( 'iati_project_opts' );
    $project_id                     = !isset( $_POST['project-id'] ) ? sanitize_option( 'iati_project_opts', $iati_project_opts['project_id'] ) : sanitize_text_field( $_POST['project-id'] );

    // Retrieve project data from d-portal website
    $response                       = wp_remote_get( esc_url_raw( 'https://d-portal.org/q.json?&from=xson&root=/iati-activities/iati-activity&aid=' . $project_id ) );
    $body                           = wp_remote_retrieve_body( $response );

    $data                           = json_decode( $body, true );
    
    $project_budget                 = $data['/iati-activities/iati-activity'][0]['/budget'];
    $project_result                 = $data['/iati-activities/iati-activity'][0]['/result'];
    $project_sector                 = $data['/iati-activities/iati-activity'][0]['/sector'];
    $project_dataset                = $data['/iati-activities/iati-activity'][0]['@dataset'];
    $project_version                = $data['/iati-activities/iati-activity'][0]['@version'];
    $project_location               = $data['/iati-activities/iati-activity'][0]['/location'];
    $project_lang                   = $data['/iati-activities/iati-activity'][0]['@xml:lang'];
    $project_hierarchy              = $data['/iati-activities/iati-activity'][0]['@hierarchy'];
    $project_xsi                    = $data['/iati-activities/iati-activity'][0]['@xmlns:xsi'];
    $project_idx                    = $data['/iati-activities/iati-activity'][0]['@dstore:idx'];
    $project_description            = $data['/iati-activities/iati-activity'][0]['/description'];
    $project_transaction            = $data['/iati-activities/iati-activity'][0]['/transaction'];
    $project_slug                   = $data['/iati-activities/iati-activity'][0]['@dstore:slug'];
    $project_contact_info           = $data['/iati-activities/iati-activity'][0]['/contact-info'];
    $project_activity_date          = $data['/iati-activities/iati-activity'][0]['/activity-date'];
    $project_policy_marker          = $data['/iati-activities/iati-activity'][0]['/policy-marker'];
    $project_identifier             = $data['/iati-activities/iati-activity'][0]['/iati-identifier'];
    $project_title                  = $data['/iati-activities/iati-activity'][0]['/title/narrative'];
    $project_default_aid_type       = $data['/iati-activities/iati-activity'][0]['/default-aid-type'];
    $project_other_identifier       = $data['/iati-activities/iati-activity'][0]['/other-identifier'];
    $project_recipient_region       = $data['/iati-activities/iati-activity'][0]['/recipient-region'];
    $project_related_activity       = $data['/iati-activities/iati-activity'][0]['/related-activity'];
    $project_default_currency       = $data['/iati-activities/iati-activity'][0]['@default-currency'];
    $project_participating_org      = $data['/iati-activities/iati-activity'][0]['/participating-org'];
    $project_recipient_country      = $data['/iati-activities/iati-activity'][0]['/recipient-country'];
    $project_reporting_org_ref      = $data['/iati-activities/iati-activity'][0]['/reporting-org@ref'];
    $project_reporting_org_type     = $data['/iati-activities/iati-activity'][0]['/reporting-org@type'];
    $project_generated_time         = $data['/iati-activities/iati-activity'][0]['@generated-datetime'];
    $project_activity_status        = $data['/iati-activities/iati-activity'][0]['/activity-status@code'];
    $project_last_updated_time      = $data['/iati-activities/iati-activity'][0]['@last-updated-datetime'];
    $project_default_flow_type      = $data['/iati-activities/iati-activity'][0]['/default-flow-type@code'];
    $project_collaboration_type     = $data['/iati-activities/iati-activity'][0]['/collaboration-type@code'];
    $project_reporting_org          = $data['/iati-activities/iati-activity'][0]['/reporting-org/narrative'];
    $project_capital_spend          = $data['/iati-activities/iati-activity'][0]['/capital-spend@percentage'];
    $project_default_tied_status    = $data['/iati-activities/iati-activity'][0]['/default-tied-status@code'];
    $project_default_finance_type   = $data['/iati-activities/iati-activity'][0]['/default-finance-type@code'];
    $project_loan_status            = $data['/iati-activities/iati-activity'][0]['/crs-add/loan-status@currency'];
    $project_country_budget_items   = $data['/iati-activities/iati-activity'][0]['/country-budget-items@vocabulary'];
    $project_budget_item             = $data['/iati-activities/iati-activity'][0]['/country-budget-items/budget-item'];
    
    // Insert data in database or update if exists
    $wpdb->get_results( "SELECT * FROM `" . $wpdb->prefix . "iati_project_data` WHERE iati_identifier='" . $project_id . "'" );

    // If project data are not yet saved, insert...
    if( $wpdb->num_rows == 0 ) {
        $insert_project_data        = $wpdb->insert(
            $wpdb->prefix . 'iati_project_data',
            [
                'budget'                => json_encode( $project_budget ),
                'result'                => json_encode( $project_result ),
                'sector'                => json_encode( $project_sector ),
                'dataset'               => $project_dataset, 
                'version'               => $project_version,
                'location'              => json_encode( $project_location ),
                'lang'                  => $project_lang,
                'hierarchy'             => absint( $project_hierarchy ),
                'xsi'                   => $project_xsi,
                'idx'                   => absint( $project_idx ),
                'description'           => json_encode( $project_description ),
                'transaction'           => json_encode( $project_transaction ),
                'slug'                  => $project_slug,
                'contact_info'          => json_encode( $project_contact_info ),
                'activity_date'         => json_encode( $project_activity_date ),
                'policy_marker'          => json_encode( $project_policy_marker ),
                'iati_identifier'       => $project_identifier,
                'title'                 => json_encode( $project_title ),
                'default_aid_type'      => json_encode( $project_default_aid_type ),
                'default_currency'      => $project_default_currency,
                'other_identifier'      => json_encode( $project_other_identifier ),
                'recipient_region'      => json_encode( $project_recipient_region ),
                'related_activity'      => json_encode( $project_related_activity ),
                'participating_org'     => json_encode( $project_participating_org ),
                'recipient_country'     => json_encode( $project_recipient_country ),
                'reporting_org_ref'     => $project_reporting_org_ref,
                'reporting_org_type'    => absint( $project_reporting_org_type ),
                'generated_datetime'    => $project_generated_time,
                'activity_status'       => absint( $project_activity_status ),
                'last_updated_datetime' => $project_last_updated_time,
                'default_flow_type'     => absint( $project_default_flow_type ),
                'collaboration_type'    => absint($project_collaboration_type ),
                'reporting_org'         => json_encode( $project_reporting_org ),
                'capital_spend'         => absint( $project_capital_spend ),
                'default_tied_status'   => absint( $project_default_tied_status ),
                'default_finance_type'  => absint( $project_default_finance_type ),
                'loan_status_currency'  => $project_loan_status,
                'country_budget_items'  => absint( $project_country_budget_items ),
                'budget_item'           => json_encode( $project_budget_item )
            ]
        );
    } else {
        $update_project_data        = $wpdb->update(
            $wpdb->prefix . 'iati_project_data',
            [
                'budget'                => json_encode( $project_budget ),
                'result'                => json_encode( $project_result ),
                'sector'                => json_encode( $project_sector ),
                'dataset'               => $project_dataset, 
                'version'               => $project_version,
                'location'              => json_encode( $project_location ),
                'lang'                  => $project_lang,
                'hierarchy'             => absint( $project_hierarchy ),
                'xsi'                   => $project_xsi,
                'idx'                   => absint( $project_idx ),
                'description'           => json_encode( $project_description ),
                'transaction'           => json_encode( $project_transaction ),
                'slug'                  => $project_slug,
                'contact_info'          => json_encode( $project_contact_info ),
                'activity_date'         => json_encode( $project_activity_date ),
                'policy_marker'          => json_encode( $project_policy_marker ),
                'title'                 => json_encode( $project_title ),
                'default_aid_type'      => json_encode( $project_default_aid_type ),
                'default_currency'      => $project_default_currency,
                'other_identifier'      => json_encode( $project_other_identifier ),
                'recipient_region'      => json_encode( $project_recipient_region ),
                'related_activity'      => json_encode( $project_related_activity ),
                'participating_org'     => json_encode( $project_participating_org ),
                'recipient_country'     => json_encode( $project_recipient_country ),
                'reporting_org_ref'     => $project_reporting_org_ref,
                'reporting_org_type'    => absint( $project_reporting_org_type ),
                'generated_datetime'    => $project_generated_time,
                'activity_status'       => absint( $project_activity_status ),
                'last_updated_datetime' => $project_last_updated_time,
                'default_flow_type'     => absint( $project_default_flow_type ),
                'collaboration_type'    => absint($project_collaboration_type ),
                'reporting_org'         => json_encode( $project_reporting_org ),
                'capital_spend'         => absint( $project_capital_spend ),
                'default_tied_status'   => absint( $project_default_tied_status ),
                'default_finance_type'  => absint( $project_default_finance_type ),
                'loan_status_currency'  => $project_loan_status,
                'country_budget_items'  => absint( $project_country_budget_items ),
                'budget_item'           => json_encode( $project_budget_item )
            ],
            [
                'iati_identifier'        => $project_identifier,
            ]
       );
    }
    
    // Update project ID, in case an ID different from the default one was provided
    $project_opts                   = [
        'project_id'                => $project_id
    ];
    
    update_option( 'iati_project_opts', $project_opts );

    // Redirecting to project details page
    wp_redirect( admin_url( 'admin.php?page=iati-project-data&status=1' ) );
}