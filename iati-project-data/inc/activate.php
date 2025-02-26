<?php
function iati_plugin_activation(){
    // Verify WordPress version
    if( version_compare( get_bloginfo( 'version' ), '4.4', '<' ) ){
        wp_die( __( 'You must update your WordPress version before you can use this plugin.', 'iatiproject' ) );
    }
    
    global $wpdb;

    // Create database
    $createProjectDataSQL      = "CREATE TABLE `".$wpdb->prefix."iati_project_data` (
        `ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `budget` TEXT NOT NULL,
        `result` TEXT NULL DEFAULT NULL,
        `sector` TEXT NULL DEFAULT NULL,
        `dataset` VARCHAR(50) NULL DEFAULT NULL,
        `version` VARCHAR(50) NULL DEFAULT NULL,
        `location` TEXT NULL DEFAULT NULL,
        `lang` VARCHAR(50) NULL DEFAULT NULL,
        `hierarchy` TINYINT(10) UNSIGNED NULL DEFAULT NULL,
        `xsi` VARCHAR(50) NULL DEFAULT NULL,
        `idx` TINYINT(10) NULL DEFAULT NULL,
        `description` TEXT NULL DEFAULT NULL,
        `transaction` TEXT NULL DEFAULT NULL,
        `slug` VARCHAR(50) NULL DEFAULT NULL,
        `contact_info` TEXT NULL DEFAULT NULL,
        `activity_date` TEXT NULL DEFAULT NULL,
        `policy_marker` TEXT NULL DEFAULT NULL,
        `iati_identifier` VARCHAR(50) NULL DEFAULT NULL,
        `title` TEXT NULL DEFAULT NULL,
        `default_aid_type` TEXT NULL DEFAULT NULL,
        `other_identifier` TEXT NULL DEFAULT NULL,
        `recipient_region` TEXT NULL DEFAULT NULL,
        `related_activity` TEXT NULL DEFAULT NULL,
        `default_currency` VARCHAR(50) NULL DEFAULT NULL,
        `participating_org` TEXT NULL DEFAULT NULL,
        `recipient_country` TEXT NULL DEFAULT NULL,
        `reporting_org_ref` VARCHAR(50) NULL DEFAULT NULL,
        `reporting_org_type` TINYINT(10) NULL DEFAULT NULL,
        `generated_datetime` VARCHAR(50) NULL DEFAULT NULL,
        `activity_status` TINYINT(10) UNSIGNED NULL DEFAULT NULL,
        `last_updated_datetime` VARCHAR(50) NULL DEFAULT NULL,
        `default_flow_type` TINYINT(10) UNSIGNED NULL DEFAULT NULL,
        `collaboration_type` TINYINT(10) UNSIGNED NULL DEFAULT NULL,
        `reporting_org` TEXT NULL DEFAULT NULL,
        `capital_spend` TINYINT(10) NULL DEFAULT NULL,
        `default_tied_status` TINYINT(10) NULL DEFAULT NULL,
        `default_finance_type` TINYINT(10) NULL DEFAULT NULL,
        `loan_status_currency` VARCHAR(50) NULL DEFAULT NULL,
        `country_budget_items` TINYINT(10) NULL DEFAULT NULL,
        `budget_item` TEXT NULL DEFAULT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB " . $wpdb->get_charset_collate() . ";";

    $createCodesSQL         = "CREATE TABLE `".$wpdb->prefix."iati_codes` (
        `ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `code` VARCHAR(50) NOT NULL,
        `category` VARCHAR(50) NULL DEFAULT NULL,
        `name` VARCHAR(50) NOT NULL,
        `description` TEXT NULL DEFAULT NULL,
        `status` VARCHAR(50) NOT NULL,
        `type` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB " . $wpdb->get_charset_collate() . ";";

    require( ABSPATH . '/wp-admin/includes/upgrade.php' );

    dbDelta( [ $createProjectDataSQL, $createCodesSQL ] );

    // Install iati codes in database (if not yet done)
    iati_install_codes();
    
    // Add option with default project ID
    $iati_project_opts              = get_option( 'iati_project_opts' );

    if( !$iati_project_opts ) {
        $project_opts               = [
            'project_id'            => 'GB-CHC-207544-42019',
        ];

        $iati_project_opts          = add_option( 'iati_project_opts', $project_opts );
    }
}