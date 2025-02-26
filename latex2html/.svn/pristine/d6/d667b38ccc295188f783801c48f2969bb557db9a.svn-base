<?php
defined('ABSPATH') or exit;
?>
<div class = 'l2h_wrap'>
  <h1>LaTeX2HTML <?php echo esc_html(l2h_main_class::l2hVER); ?></h1>
  <div class = "about-text">
    <p>
<?php
  // translators: %1$s is the plugin name, %2$s is the plugin version.
printf(esc_html__("Thanks for your updating! %1\$s %2\$s is totally rebuild based on the neweast version of wordpress, I hope you will enjoy it!", 'latex2html'), 'LaTeX2HTML', esc_html(l2h_main_class::l2hVER));
?>
    </p>
  </div>
<?php
if (isset($nonce) && wp_verify_nonce($nonce, 'l2h_admin_nonce_action')) {
  // Nonce is valid, proceed with setting the active tab
  $this->active_tab = isset($_GET['tab']) ? sanitize_text_field(wp_unslash($_GET['tab'])) : 'welcome';
} else {
  // Nonce verification failed, display an error or redirect
  wp_die(esc_html__('Nonce verification failed. Please try again.', 'latex2html'));
}
?>
<h2 class = "nav-tab-wrapper">
<a  href  = "<?php echo esc_url(add_query_arg(array('tab' => 'welcome', 'nonce' => $nonce), admin_url('options-general.php?page=latex2html'))); ?>" class  = "nav-tab <?php echo $this->active_tab == 'welcome' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('What\'s New?', 'latex2html'); ?></a>
<a  href  = "<?php echo esc_url(add_query_arg(array('tab' => 'settings', 'nonce' => $nonce), admin_url('options-general.php?page=latex2html'))); ?>" class = "nav-tab <?php echo $this->active_tab == 'settings' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Settings', 'latex2html'); ?></a>
<a  href  = "<?php echo esc_url(add_query_arg(array('tab' => 'bibtex', 'nonce' => $nonce), admin_url('options-general.php?page=latex2html'))); ?>" class   = "nav-tab <?php echo $this->active_tab == 'bibtex' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('BibTeX', 'latex2html'); ?></a>
<a  href  = "<?php echo esc_url(add_query_arg(array('tab' => 'support', 'nonce' => $nonce), admin_url('options-general.php?page=latex2html'))); ?>" class  = "nav-tab <?php echo $this->active_tab == 'support' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Support &amp; Credit', 'latex2html'); ?></a>
<a  href  = "<?php echo esc_url(add_query_arg(array('tab' => 'manual', 'nonce' => $nonce), admin_url('options-general.php?page=latex2html'))); ?>" class   = "nav-tab <?php echo $this->active_tab == 'manual' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Manual', 'latex2html'); ?></a><br />
</h2>
<?php
switch($this->active_tab) {
    case 'settings': 
        echo "<form action='options.php' method='post'>";
        settings_fields('l2h_setting_group');
        do_settings_sections('l2h_setting_page');
        submit_button(esc_html__('Save settings', 'latex2html'));
        break;
    case 'bibtex': 
        echo "<form action='". esc_url(admin_url('admin-post.php')) . "' method='post'>";
              //settings_fields( 'l2h_bibtex_group' );
        echo "<input type='hidden' name='action' value='bibtex' />";
        wp_nonce_field($this->action, 'bibtex_nonce', false);

        do_settings_sections('l2h_bibtex_page');
        submit_button(esc_html__('Submit', 'latex2html'));
        echo "<div class='bibitems'>";
        if(isset($_GET['status'])) {
              switch (sanitize_text_field(wp_unslash($_GET['status']))) {  // Sanitize input
                case 'success': 
                  echo "<h3>" . esc_html__('The following items have been added to the database', 'latex2html') . ":</h3><hr />";
                  global $wpdb;
                  $tab_name = $wpdb->prefix . 'l2hbibtex';
                  if (isset($_GET['bibkeys'])) {
                    $bibkeys = explode(' ', sanitize_text_field(wp_unslash($_GET['bibkeys']))); // Sanitize and split input
                } else {
                    // Handle case when 'bibkeys' is not set (e.g., provide a default or show an error)
                    $bibkeys = array(); // Default value
                }

                  
                  echo "<div class='bibtex'>\n<ol>";
                  
                  foreach ($bibkeys as $bibkey) {
                      // Sanitize input bibkey
                    $bibkey = sanitize_text_field($bibkey);
                
                    // Sanitize the table name
                    $sanitized_tab_name = esc_sql($tab_name);

                    
                    // Define a unique cache key based on the bibkey or other unique identifier
                    $cache_key = 'bibitem_' . md5($bibkey); // Unique key based on the bibkey or any other identifier

                    // Attempt to retrieve the result from the cache
                    $bibitem = wp_cache_get($cache_key, 'bibtex_item');

                    if (false === $bibitem) {
                        // Data is not in cache, proceed with the database query
                        // Use $wpdb->prepare() for parameters but not for table names
                        $query = $wpdb->prepare(
                          "SELECT * FROM {$sanitized_tab_name} WHERE `bibkey` = %s LIMIT 1;", 
                          $bibkey
                        );
                        // Execute the query and retrieve the row
                        $bibitem = $wpdb->get_row($query, ARRAY_A);
                        
                        // Cache the result for future use (e.g., 12 hours)
                        wp_cache_set($cache_key, $bibitem, 'bibtex_item', 12 * HOUR_IN_SECONDS);
                    }

                    // Want to update the query immediately After modifying or deleting a bibtex item, clear the cache
                    //wp_cache_delete($cache_key, 'bibtex_item');

                    if (!empty($bibitem)) {
                          // Render and sanitize the HTML output
                        $bib_rendered = l2h_bibtex_class::l2h_bibtex_render($bibitem);
                        echo wp_kses_post($bib_rendered);  // Allow basic post HTML tags
                    } else {
                          // Escape the text when there's no matching bibkey and display a message
                        echo "<li>" . esc_html__('No data found for key:', 'latex2html') . " " . esc_html($bibkey) . "</li>";
                    }
                  }                                
                  
                  echo "</ol></div>";                  
                    break;
                case 'failtowrite': 
                    echo "<h3>" . esc_html__('Error', 'latex2html') . "!</h3>";
                          // translators: %s is the file path wrapped in <code> tags.
                    echo sprintf(esc_html__("Can't write bibtex data to file %s, please check the file permission!", "latex2html"), '<code>' . esc_html('wp-content/uploads/bibtex.bib.txt') . '</code>');
                    break;              
                default: 
                    echo "<h3>" . esc_html__('Error', 'latex2html') . "!</h3>";
                          // Sanitize the message
                    if (isset($_GET['message'])) {
                        // translators: %s is the bibtex key that already exists in the database.
                      echo sprintf("<p>" . esc_html__("Please check your bibtex data, the key %s already exists in the database.", 'latex2html') . "</p>", "<strong>" . esc_html(sanitize_text_field(wp_unslash($_GET['message']))) . "</strong>");
                  }
              }
        }
        echo "</div>";
        break;
    case 'support': 
        do_settings_sections('l2h_support_page');
        break;
    case 'manual': 
        do_settings_sections('l2h_manual_page');
        break;
    case 'welcome': 
         default  : 
        echo "<form action='options.php' method='post'>";
        settings_fields('l2h_upgrade_group');
        echo "<input type='hidden' name='l2h_upgrade_options[upgrade_confirm]' value='1' />";
        do_settings_sections('l2h_upgrade_page');
        if(version_compare(get_option('l2h_upgrade_options')['VER'], l2h_main_class::l2hVER) < 0 || version_compare(get_option('l2h_upgrade_options')['dbVER'], l2h_main_class::l2hdbVER) < 0) {
            submit_button(esc_html__('Upgrade', 'latex2html'));
        }
}
?>
  </form>
</div>
