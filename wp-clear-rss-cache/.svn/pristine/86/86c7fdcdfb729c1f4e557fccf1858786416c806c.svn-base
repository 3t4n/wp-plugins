<?php 
    
// =============================================================================
// File: clear.php
// Version: 1.0
// 
// Renders the action page and performs RSS widget cache cleaning
// =============================================================================

// check access
if(!defined('WPCRC')) exit('Direct access is not allowed...'); 

?>

<h1>Clear RSS Widget cache</h1>

<?php

// get and check options
$widget_rss_options = get_option( 'widget_rss' );
if($widget_rss_options == false) { ?>
    <p>RSS Widget options not found. It appears you are not using the RSS widget.</p>
<?php 
} else if(!is_array($widget_rss_options) || empty($widget_rss_options)) { ?>
    <p>RSS Widget rss list is empty. It appears you are not using the RSS widget right now.</p>
<?php 
} else { ?>
    <p>Clearing RSS Widget cache: </p>
    <ol>
        <?php 
            foreach($widget_rss_options as $option)  {
                if(!is_array($option)) continue;
                echo "<li>Clearing cache for \"{$option['title']}\": cleared {$option['items']} item(s).</li>"; 
                $key = md5($option['url']);
                delete_option( "_transient_timeout_feed_mod_{$key}" );
                delete_option( "_transient_timeout_feed_{$key}" );
                delete_option( "_transient_feed_mod_{$key}" );
                delete_option( "_transient_feed_{$key}" );
            }
        ?>
    </ol>
    <p>RSS Widget cache is cleared...</p>
<?php }