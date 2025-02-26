<?php
  
  // Plugin Name: Free Poker Rolls
  // Plugin URI: http://www.onlinemarketing.eu
  // Description: Displays an HTML table with an extensive list of free rolls for a variety of poker games.
  // Author: Online Marketing
  // Version: 1.0.0
    
  function free_rolls_table($post_or_page_content) {
    $free_rolls_token = '%%FREE_POKER_ROLLS%%';
    $free_rolls_source = 'http://winchester.webmsol.com/free_rolls/';
    
    // Return the original content and quit if our token was not found.
    if(! strpos($post_or_page_content, $free_rolls_token)) {
      return $post_or_page_content;
    }
    
    // Grab the free rolls content from Winchester.
    $free_rolls_content = file_get_contents($free_rolls_source . get_option('online_marketing_free_rolls_table_data') . '/' . get_option('online_marketing_free_rolls_table_stylesheet'));
  
    $post_or_page_content = str_replace($free_rolls_token, $free_rolls_content, $post_or_page_content);
    
    return $post_or_page_content;
  }

  function free_rolls_table_menu() {
    add_options_page('Free Rolls options', 'Free Poker Rolls', 8, 'free-rolls-table-options', 'free_rolls_table_options');

    // Do this only once. Or close to once.
    if(get_option('free_rolls_table_installed') != 'yes') {
      update_option('free_rolls_table_installed', 'yes');
      
      // Let us know you installed our plugin. Thanks! :)
      // This only sends us the name of your website and the name of the plugin
      // you're using.
      file_get_contents('http://winchester.onlinemarketing.eu/installations/create?installation[uri]=' . urlencode($_SERVER['SERVER_NAME']) . '&installation[plugin_or_widget_name]=' . urlencode('Free Rolls Table'));
    }
  }

  function free_rolls_table_options() {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      update_option('online_marketing_free_rolls_table_data', $_POST['options']['data']);
      update_option('online_marketing_free_rolls_table_stylesheet', $_POST['options']['stylesheet']);
      
      $message = '<p style="background: #228B22; color: #FFFFFF; text-align: center; padding: 5px;">Changes saved!</p>';
    }

    ?>

      <h2>Free Poker Rolls Plugin Options</h2>
      
      <?php if($message) { echo $message; } ?>
      
      <fieldset style="background: #FFFFFF; border: 1px solid #CCCCCC; margin-bottom: 20px;">
        <legend style="margin-left: 20px; background: #333333; padding: 5px; font-weight: bold; color: #FFFFFF;">How do I use this?</legend>
        <p style="clear: both; margin: 20px;">To display free poker rolls in any WordPress post or page, simply enter %%FREE_POKER_ROLLS%% into the body. Example:</p>
        <p style="clear: both; margin: 20px;"><img src="<?php echo bloginfo('home'); ?>/wp-content/plugins/online_marketing_free_rolls/images/example-usage.gif" width="500" height="318"></p>
      </fieldset>
      
      <form method="post" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <fieldset style="background: #FFFFFF; border: 1px solid #CCCCCC; margin-bottom: 20px;">
          <legend style="margin-left: 20px; background: #333333; padding: 5px; font-weight: bold; color: #FFFFFF;">How much information would you like to show?</legend>
          <p style="clear: both; margin: 20px;"><input type="radio" name="options[data]" id="options_data_complete" value="complete" <?php if(get_option('online_marketing_free_rolls_table_data') == 'complete') { echo 'checked="checked"'; } ?> /><label for="options_data_complete"> Complete, looks something like this:<br />
            <img style="padding-top: 5px;" src="<?php echo bloginfo('home'); ?>/wp-content/plugins/online_marketing_free_rolls/images/free-rolls-complete-data.gif" width="500" height="206" /></label></p>
          <p style="clear: both; margin: 20px;"><input type="radio" name="options[data]" id="options_data_minimal" value="minimal" <?php if(get_option('online_marketing_free_rolls_table_data') == 'minimal') { echo 'checked="checked"'; } ?> /><label for="options_data_minimal"> Minimal, looks something like this:<br />
            <img style="padding-top: 5px;" src="<?php echo bloginfo('home'); ?>/wp-content/plugins/online_marketing_free_rolls/images/free-rolls-minimal-data.gif" width="500" height="206" /></label></p>
        </fieldset>
        
        <fieldset style="background: #FFFFFF; border: 1px solid #CCCCCC;">
          <legend style="margin-left: 20px; background: #333333; padding: 5px; font-weight: bold; color: #FFFFFF;">How would you like to style your poker rolls?</legend>
          <p style="margin-left: 20px;"><input type="radio" name="options[stylesheet]" id="options_stylesheet_standard" value="standard" <?php if(get_option('online_marketing_free_rolls_table_stylesheet') == 'standard') { echo 'checked="checked"'; } ?> /><label for="options_stylesheet_standard"> <strong>Standard</strong> -- Will be styled as shown above.</label></p>
          <p style="margin-left: 20px;"><input type="radio" name="options[stylesheet]" id="options_stylesheet_custom" value="custom" <?php if(get_option('online_marketing_free_rolls_table_stylesheet') == 'custom') { echo 'checked="checked"'; } ?> /><label for="options_stylesheet_custom"> <strong>Custom</strong> -- You must declare how the HTML is to be styled. Below is a sample of the HTML used to build the table.</label></p>
          <p><pre>
    &lt;table border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;0&quot; class=&quot;free_rolls_table&quot;&gt;
        &lt;thead&gt;
          &lt;tr&gt;
            &lt;th&gt;Start&lt;/th&gt;
            &lt;th&gt;Game&lt;/th&gt;
            &lt;th&gt;Limit&lt;/th&gt;
            &lt;th&gt;Prize&lt;/th&gt;
            &lt;th&gt;Poker Room&lt;/th&gt;
            &lt;th&gt;Info&lt;/th&gt;
          &lt;/tr&gt;
        &lt;/thead&gt;

        &lt;tbody&gt;    
          &lt;tr class=&quot;odd&quot;&gt;
            &lt;td&gt;2009-08-18 18:55:00&lt;/td&gt;
            &lt;td&gt;Holdem&lt;/td&gt;
            &lt;td&gt;NL &lt;/td&gt;
            &lt;td&gt;5&lt;/td&gt;
            &lt;td&gt;VC Poker&lt;/td&gt;
            &lt;td&gt;NO INFO&lt;/td&gt;
          &lt;/tr&gt;

          &lt;tr class=&quot;even&quot;&gt;
            &lt;td&gt;2009-08-18 19:00:00&lt;/td&gt;
            &lt;td&gt;Holdem&lt;/td&gt;
            &lt;td&gt;NL &lt;/td&gt;
            &lt;td&gt;100&lt;/td&gt;
            &lt;td&gt;Inter Poker&lt;/td&gt;
            &lt;td&gt;Play 5 raked hands in previous 24 hours to enter&lt;/td&gt;
          &lt;/tr&gt;
        &lt;/tbody&gt;
      &lt;/table&gt;
            </pre></p>
        </fieldset>
        
        <hr />
        
        <p class="submit">
          <input type="submit" name="Submit" value="<?php _e('Update Options', 'mt_trans_domain' ) ?>" />
        </p>
      </form>
    
    <?php
    
  }
  
  add_filter("the_content", "free_rolls_table");
  add_action('admin_menu', 'free_rolls_table_menu');
  
  // Let us know you activated or deactivated our plugin. Thanks!

  function activate_free_poker_rolls() {
    update_option('free_poker_rolls_installed', '1');
    file_get_contents('http://winchester.onlinemarketing.eu/installations/create?installation[uri]=' . urlencode($_SERVER['SERVER_NAME']) . '&installation[activity]=activate&installation[plugin_or_widget_name]=' . urlencode('Free Poker Rolls'));
  }
  
  function deactivate_free_poker_rolls() {
    update_option('free_poker_rolls_installed', '0');
    file_get_contents('http://winchester.onlinemarketing.eu/installations/create?installation[uri]=' . urlencode($_SERVER['SERVER_NAME']) . '&installation[activity]=deactivate&installation[plugin_or_widget_name]=' . urlencode('Free Poker Rolls'));
  }

  register_activation_hook(__FILE__, 'activate_free_poker_rolls');
  register_deactivation_hook(__FILE__, 'deactivate_free_poker_rolls');
  
?>
