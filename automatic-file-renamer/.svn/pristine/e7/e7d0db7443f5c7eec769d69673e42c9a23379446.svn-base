<?php

/**
 * Load the languages with text domain
 */
function AFR_admin_init() {
  load_plugin_textdomain('automatic-file-renamer', false, 'automatic-file-renamer/languages');
}
add_action( 'init', 'AFR_admin_init' );


//Si l'installation n'a pas encore de rôles attribués pour la gestion du plugin
if (!get_option('AFR_roles_config')) {
  /*
   * Ajoute un menu au panneau d'administration, dans un sous-menu de média
   * Seulement pour les administrateurs
   */
  function AFR_ADMIN_PANEL()
  {
    add_submenu_page(
      'upload.php', // Title of the page
      'Automatic File Renamer',
      'Automatic File Renamer',
      'manage_options', // Capability requirement to see the link: manage_options for only admins, edit_pages for admins and editor, publish_posts for admin, editor and autors
      plugin_dir_path(__FILE__).'AFR-Admin-Panel.php' // The 'slug' - file to display when clicking the link
    );
  }
}else{
  /*
 * Ajoute un menu au panneau d'administration, dans un sous-menu de média
 * Seulement pour les utilisateurs autorisés (avec le droit AFR_config)
 */
  function AFR_ADMIN_PANEL()
  {
    add_submenu_page(
      'upload.php', // Title of the page
      'Automatic File Renamer',
      'Automatic File Renamer',
      'AFR_config', // Capability requirement
      plugin_dir_path(__FILE__).'AFR-Admin-Panel.php' // The 'slug' - file to display when clicking the link
    );
  }
}
// Hook the 'admin_menu' action hook, run the function named 'AFR_ADMIN_PANEL()'
add_action( 'admin_menu', 'AFR_ADMIN_PANEL' );
