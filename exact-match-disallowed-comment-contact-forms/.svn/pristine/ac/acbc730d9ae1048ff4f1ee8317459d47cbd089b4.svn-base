<?php
/*
Plugin Name: Exact Match Disallowed Comment & Contact Forms
Plugin URI: https://www.completewebresources.com/exact-match-disallowed-comment-contact-forms-wordpress-plugin/
Description: Change the default WordPress comment blocklist functionality to exact match and save entries marked as spam for review.
Author: Complete SEO
Author URI: https://www.completewebresources.com/
Version: 1.3
*/

defined('ABSPATH') || exit;

Blocklist_Manager();

// Main Class
class Blocklist_Manager {
  
  // Name of table entries
  public static $table_entries;
  
  // The single instance of the class
  protected static $_instance = null;

  // Main Instance
  public static function instance() {
    if ( is_null( self::$_instance ) ) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  // Constructor
  public function __construct() {
    
    // vars
    global $wpdb;
    
    self::$table_entries = $wpdb->get_blog_prefix() . 'blocklist_entries';
    
    // Hooks
    add_action( 'init', array( $this, 'init' ) );
    
    // on activation
    register_activation_hook( __FILE__, array( $this, 'on_activation' ) );
  }
  
  // Init
  public function init() {
  
    // Admin menu
    add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    
    // Default comments handler
    add_filter( 'pre_comment_approved', array( $this, 'default_blocklist_check'), 10, 2 );
    
    // Formidable Forms handler
    add_filter('frm_validate_entry', array( $this, 'frm_blocklist_check'), 10 , 2);
    // Prevent frm check blocklist
    add_filter('frm_check_blacklist', '__return_false');
    
    // CF7 handler
    add_filter( 'wpcf7_submission_is_blacklisted', array( $this, 'cf7_blocklist_check'), 10, 2 );
		
	// Gravity Forms handler
    add_filter( 'gform_entry_is_spam', array( $this, 'gf_blocklist_check' ), 10, 3 );
  }
  
  // On plugin activation
  public function on_activation() {
  
    // Add table for blocklist entries
    global $wpdb;
  
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    
		$charset_collate = '';

    if ( ! empty ( $wpdb->charset ) )
			$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";

    if ( ! empty ( $wpdb->collate ) )
			$charset_collate .= " COLLATE {$wpdb->collate}";
  
    $sql = "CREATE TABLE ".self::$table_entries." (
      id bigint(20) unsigned NOT NULL auto_increment,
      source varchar(100) NOT NULL default '',
      content longtext NOT NULL default '',
      ip varchar(100) NOT NULL default '',
      url varchar(200) NOT NULL default '',
      date timestamp NOT NULL default current_timestamp,
      PRIMARY KEY (id)
	  )	{$charset_collate};";
  
    dbDelta($sql);
    
    // Add default blocklisted words
		$default = array();
		$file = fopen(dirname(__FILE__) . '/blocklist.txt', 'r');
		if ( $file ) {
			while ( ! feof($file) ) {
				$default[] = fgets($file);
			}
			fclose($file);
		}
		if ( count( $default ) ) {
      $current = self::get_disallowed_words();
			$current = preg_replace( '/\n$/', '', preg_replace( '/^\n/', '', preg_replace( '/[\r\n]+/', "\n", $current ) ) );
			$current = ! empty( $current ) ? (array) $current : array();
			$list	= array_unique( array_merge( $current, $default ) );
      // For WP 5.5 compatibility
      if ( false === get_option( 'disallowed_keys' ) ) {
        $option = 'blacklist_keys';
      } else {
        $option = 'disallowed_keys';
      }
      update_option( $option, implode( "\n", $list ) );
		}
  }
  
  // Admin menu
  public function admin_menu() {
    $hook = add_menu_page(
      'Blocklist entries', // page title
      'Blocklist manager', // admin settings title
      'manage_options',
      'blocklist-entries', // page url
      array( $this, 'settings_page') // output the content for this page
    );
    add_action( "load-$hook", array( $this, 'settings_page_load' ) );
  }
  
  // Settings page
  public function settings_page() {
    require_once( 'templates/entries.php' );
  }
  
  // Entries table load
  public function settings_page_load() {
    require_once( 'inc/class-table-entries.php' );
    $GLOBALS['Blocklist_Entries_List_Table'] = new Blocklist_Entries_List_Table();
  }
  
  // Get disallowed words
  public static function get_disallowed_words() {
    // For WP 5.5 compatibility
    $words = get_option( 'disallowed_keys' );
    if ( false === $words ) {
      $words = get_option( 'blacklist_keys' );
    }
    return trim( $words );
  }
  
  // Default comments check
  public function default_blocklist_check( $approved, $commentdata  ) {
    
    $mod_keys = self::get_disallowed_words();
    if ( '' == $mod_keys ) {
			if ( 1 == get_option( 'comment_moderation' ) ) {
				return 0;
			}
      return 1; // If moderation keys are empty.
    }
    
    // Ensure HTML tags are not being used to bypass the blocklist.
    $comment_without_html = wp_strip_all_tags( $commentdata['comment_content'] );
    
    $words = explode( "\n", $mod_keys );
    
    foreach ( (array) $words as $word ) {
      $word = trim( $word );
      
      // Skip empty lines.
      if ( empty( $word ) ) {
        continue; }
      
      // Do some escaping magic so that '#' chars
      // in the spam words don't break things:
      $word = preg_quote( $word, '~' );
      
      $pattern = "~\b$word\b~i";
      if ( preg_match( $pattern, $commentdata['comment_author_url'] )
        || preg_match( $pattern, $commentdata['comment_content'] )
        || preg_match( $pattern, $comment_without_html )
        || preg_match( $pattern, $commentdata['comment_author_IP'] )
      ) {
        return 'spam';
      }
    }

		if ( 1 == get_option( 'comment_moderation' ) ) {
			return 0;
		}

    return 1;
  }
  
  // Formidable Forms check
  public function frm_blocklist_check( $errors, $values ) {
    $commentdata['comment_content'] = FrmEntriesHelper::entry_array_to_string( $values );
    $commentdata['comment_author_IP'] = FrmAppHelper::get_ip_address();
    $commentdata['comment_author_url'] = '';
    if ( $this->default_blocklist_check( false, $commentdata  ) == 'spam' ) {
      $errors['spam'] = __( 'Your entry appears to be blocked spam!', 'formidable' );
      $this->save_spam_entry( 'Formidable Forms', $commentdata['comment_content'], $commentdata['comment_author_IP'], '-' );
    }
    return $errors;
  }
  
  // CF7 check
  public function cf7_blocklist_check( $approved, $obj ) {
    $content = $obj->get_posted_data();
    $content = implode( "\n", $content );
    $commentdata['comment_content'] = $content;
    $commentdata['comment_author_IP'] = $obj->get_meta( 'remote_ip' );
    $commentdata['comment_author_url'] = '';
    if ( $this->default_blocklist_check( false, $commentdata  ) == 'spam' ) {
      $this->save_spam_entry( 'Contact Form 7', $commentdata['comment_content'], $commentdata['comment_author_IP'], '-' );
      return true;
    }
    return false;
  }
	
	// Gravity Forms check
  public function gf_blocklist_check( $is_spam, $form, $entry ) {
    $content = '';
    foreach ( $entry as $k => $v ) {
      if ( preg_match('/[1-9]+/', $k ) ) {
        $content .= "\n" . $v;
      }
    }
    $commentdata['comment_content'] = $content;
    $commentdata['comment_author_IP'] = empty( $entry['ip'] ) ? GFFormsModel::get_ip() : $entry['ip'];
    $commentdata['comment_author_url'] = '';
    if ( $this->default_blocklist_check( false, $commentdata  ) == 'spam' ) {
      $this->save_spam_entry( 'Gravity Forms', $commentdata['comment_content'], $commentdata['comment_author_IP'], '-' );
      $is_spam = true;
    }
    return $is_spam;
  }
  
  // Save spam entry
  public function save_spam_entry( $source, $content, $ip, $url ) {
    global $wpdb;
    $wpdb->insert( self::$table_entries, array(
      'source' => $source,
      'content' => esc_sql( $content ),
      'ip' => sanitize_text_field( $ip ),
      'url' => sanitize_text_field( $url )
    ));
  }
}

// Returns the main instance
function Blocklist_Manager() {
  return Blocklist_Manager::instance();
}