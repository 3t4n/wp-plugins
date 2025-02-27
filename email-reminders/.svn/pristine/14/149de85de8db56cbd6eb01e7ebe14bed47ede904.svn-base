<?php
/**
 * @package  Load Files
 * @category Core
 *
 * Author: wpdevelop, oplugins
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @version 1.0
 * @modified 2019-03-08
 */


if ( ! defined( 'ABSPATH' ) ) exit;                                                     // Exit if accessed directly

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//   L O A D   F I L E S
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
																						// = Package: Any =
require_once( OPER_PLUGIN_DIR . '/core/class-css-js.php' );                             // Abstract. Loading CSS & JS files
require_once( OPER_PLUGIN_DIR . '/core/class-admin-settings-api.php' );                 // Abstract. Settings API.
require_once( OPER_PLUGIN_DIR . '/core/class-admin-page-structure.php' );               // Abstract. Page Structure in Admin Panel
require_once( OPER_PLUGIN_DIR . '/core/class-admin-menu.php' );                         // CLASS. Menus of plugin
require_once( OPER_PLUGIN_DIR . '/core/admin-bs-ui.php' );                              // Functions. Toolbar BS UI Elements -- Need to avoid use it.
require_once( OPER_PLUGIN_DIR . '/core/flex-ui/admin-flex-ui.php' );                    // Flex UI Elements for Admin Panel (Toolbar), that does not use BootStrap
if( is_admin() ) {
	require_once OPER_PLUGIN_DIR . '/core/class-dismiss.php';			                // Class - Dismiss
	require_once OPER_PLUGIN_DIR . '/core/class-notices.php';			                // Class - Notices
}

////////////////////////////////////////////////////////////////////////////////
// Functions
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/core/debug.php' );                                    // Debug
require_once( OPER_PLUGIN_DIR . '/core/internal-hooks.php' );                           // Internal Hooks
require_once( OPER_PLUGIN_DIR . '/core/functions.php' );                                // Functions
require_once( OPER_PLUGIN_DIR . '/core/translation.php' );                              // Translations

// JS & CSS		////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/load-css.php' );                             // Load CSS
require_once( OPER_PLUGIN_DIR . '/includes/load-js.php' );                              // Load JavaScript & define JS Vars

// Libraries 4 Pages		////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/upload/upload.php' );                        // Upload Functions,  if need to  use in page-files-add.php
require_once( OPER_PLUGIN_DIR . '/includes/codemirror/class-codemirror.php' );          // Highlight HTML syntax

require_once( OPER_PLUGIN_DIR . '/includes/pagination/pagination.php' );                // Pagination Class
require_once( OPER_PLUGIN_DIR . '/includes/listing_class/listing_class.php' );          // Listing Class    -   General  Common

require_once( OPER_PLUGIN_DIR . '/includes/help-wizard/help-wizard.php' );              // Help Wizard Class

////////////////////////////////////////////////////////////////////////////////
// Reminders
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/page-reminders/page-reminders.php' );                                        // Reminders page
if ( 1 ) {
	require_once( OPER_PLUGIN_DIR . '/includes/page-reminders/reminders_listing.php' );
	require_once( OPER_PLUGIN_DIR . '/includes/page-reminders/reminders_modify.php' );
	require_once( OPER_PLUGIN_DIR . '/includes/page-reminders/reminders_send.php' );
	require_once( OPER_PLUGIN_DIR . '/includes/page-reminders/reminders_shortcodes.php' );                              // CRON - Run Shortcodes
}
////////////////////////////////////////////////////////////////////////////////
// Rules
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/page-rules/page-rules.php' );                                                // Rules page
if ( 1 ) {
	require_once( OPER_PLUGIN_DIR . '/includes/page-rules/rules_listing.php' );
	require_once( OPER_PLUGIN_DIR . '/includes/page-rules/rules_modify.php' );
	require_once( OPER_PLUGIN_DIR . '/includes/page-rules/rules_run.php' );                                             // Run Rules
	require_once( OPER_PLUGIN_DIR . '/includes/page-rules/rules_shortcodes.php' );                                      // CRON - Run Shortcodes
}
////////////////////////////////////////////////////////////////////////////////
// Settings Page
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/page-settings/page-settings.php' );			                                // Settings page
if ( 1 ){
	require_once( OPER_PLUGIN_DIR . '/includes/page-settings/oper-dashboard.php' );                                     // Plugin  info
	require_once( OPER_PLUGIN_DIR . '/includes/page-settings/api-settings.php' );                                       // API -> Settings
}

////////////////////////////////////////////////////////////////////////////////
// Emails Settings Page
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/page-emails/page-emails.php' );                                              // Emails Settings
if ( 1 ){
	require_once( OPER_PLUGIN_DIR . '/includes/page-emails/addon-multi-emails.php' );                                   // Addon: Multiple Custom Emails
}

////////////////////////////////////////////////////////////////////////////////
// Contact Form
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/page-contact-form/page-contact-form.php' );                                  // Contact Form Settings
if ( 1 ){
	// require_once( OPER_PLUGIN_DIR . '/includes/page-contact-form/addon-multi-forms.php' );                           // Addon: Multiple Custom Contact Forms
}

////////////////////////////////////////////////////////////////////////////////
// Contacts Listing
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/page-contacts/page-contacts.php' );                                          // Contacts
if ( 1 ) {
	require_once( OPER_PLUGIN_DIR . '/includes/page-contacts/contacts_listing.php' );
	require_once( OPER_PLUGIN_DIR . '/includes/page-contacts/contacts_modify.php' );
}
require_once( OPER_PLUGIN_DIR . '/includes/page-contacts-tabs/page-add-contact.php' );                                  // Add New Contact - manually

////////////////////////////////////////////////////////////////////////////////
// CSV Parser
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/page-contacts-tabs/page-csv.php' );                                          // CSV Parser
//require_once( OPER_PLUGIN_DIR . '/includes/admin/page-paste-xls.php' );
if ( 1 ) {
	require_once( OPER_PLUGIN_DIR . '/includes/csv-parser/class-csv-parser.php' );                                      // CSV Parser
	require_once( OPER_PLUGIN_DIR . '/includes/csv-parser/csv-html-table.php' );                                        // CSV HTML table
	require_once( OPER_PLUGIN_DIR . '/includes/csv-parser/csv-sql-db.php' );                                            // SQL for saving CSV to DB
	require_once( OPER_PLUGIN_DIR . '/includes/csv-parser/csv_css_js.php' );                                            // Simple JS and CSS Loader for CSV HTML table
}

require_once( OPER_PLUGIN_DIR . '/includes/wpbc/page-wpbc-import.php' );                                                // Import contacts from  "Booking Calendar" plugin


////////////////////////////////////////////////////////////////////////////////
// Activation | Deactivation
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/core/class-activation.php' );
require_once( OPER_PLUGIN_DIR . '/includes/activation.php' );

////////////////////////////////////////////////////////////////////////////////
// Integrated Addons            //FixIn: 2.0.0.1
////////////////////////////////////////////////////////////////////////////////
require_once( OPER_PLUGIN_DIR . '/includes/cron/opera-cron.php' );

make_oper_action( 'oper_loaded_php_files' );