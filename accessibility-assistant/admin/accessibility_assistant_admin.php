<?php

if (!defined('ABSPATH')) exit;

add_action('admin_menu', 'accessibility_admin_actions');
function accessibility_admin_actions()
{

  add_menu_page('Accessibility', 'Accessibility', 'manage_options', 'accessibility-assistance', 'adminpage_accessibility', 'dashicons-universal-access-alt');

  // Add a submenu page
  add_submenu_page(
    'accessibility-assistance', // Parent menu slug
    'Languages', // Page title
    'Languages', // Menu title
    'manage_options', // Capability required to access the submenu
    'accessibility-submenu', // Menu slug
    'submenu_page_languages' // Callback function to display the submenu content
  );

  // Add a submenu page
  add_submenu_page(
    'null', // No parent menu slug (this will hide it from the menu)
    'Edit Languages', // Page title
    'Edit Languages', // Menu title
    'manage_options', // Capability required to access the submenu
    'accessibility-laguages', // Menu slug
    'accessibility_laguages_page' // Callback function to display the submenu content
  );

  // Add a submenu page
  add_submenu_page(
    'accessibility-assistance', // Parent menu slug
    'Plan', // Page title
    'Plan', // Menu title
    'manage_options', // Capability required to access the submenu
    'accessibility-plan', // Menu slug
    'accessibility_plan_page' // Callback function to display the submenu content
  );

  // Add a submenu page
  add_submenu_page(
    'accessibility-assistance', // Parent menu slug
    'User Guide', // Page title
    'User Guide', // Menu title
    'manage_options', // Capability required to access the submenu
    'user-guide', // Menu slug
    'userguide_page' // Callback function to display the submenu content
  );
}

// Callback function for the submenu page content[Start]
function accessibility_laguages_page()
{
  require_once 'edit-language.php';
}

function submenu_page_languages()
{
  require_once 'languages-listing.php';
}

function accessibility_plan_page()
{
  require_once 'plan-list.php';
}

function userguide_page()
{
  require_once 'user-guide.php';
}
// Callback function for the submenu page content[End]

// Admin Panel View function
function adminpage_accessibility()
{
  if (is_admin()) {
?>
    

    <?php
    require_once 'accessibility_dashboard.php';
    ?>
<?php
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error! </strong> You do not have permission to edit this page</div> ';
  }
}
