<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<input type="hidden" id="wpboom_pending_actions" placeholder="pending action..." value="<?php echo esc_attr($options['pending_actions']); ?>">


<?php if(!empty($remote_error)){ ?>
    <div class="col-lg-12">
        <div class="alert alert-danger">
        <span class="dashicons dashicons-warning"></span> <?php echo wp_kses_post($remote_error); ?>
        </div>  
    </div>
<?php } ?>
<?php if(!$wp_cli_installed){ ?>
    <div class="col-lg-12">
        <div class="alert alert-danger">
            <span class='dashicons dashicons-warning'></span> <strong>WP-CLI Not Found:</strong> There was a problem communicating with WP-CLI as it did not return the expected response.
           
            This requires WP-CLI to facilitate the creation of a dev site! WP-CLI extends the shell to provide WordPress-specific command line tools. This tool is used to:<p>
                
                <ul>
                    <li>&bull; List and Update Plugins ('plugin list' and 'plugin update')</li>
                    <li>&bull; Manipulating table data in the database related to the dev site (search-replace)</li>
                    
                </ul>
        </p>
       
        
       
        
        <p>
        <span class="dashicons dashicons-info"></span> For more information on how to install WP-CLI, click <a class="text-decoration-underline" target='_blank' href='https://make.wordpress.org/cli/handbook/guides/installing/' >here</a> or contact your host!</p>
        </div>
    </div>
<?php } ?>
<?php if(!$exec_enabled){ ?>
    <div class="alert alert-warning">
        <span class='dashicons dashicons-danger'></span> <strong>PHP function 'exec' Not Found:</strong> Due to the nature of this plugin, the 'exec' function is required to perform utility operations.
    </div>
<?php } ?>
<div class="col-lg-12 snapshot-requested <?php echo ($options['pending_actions'] != "snapshot_requested")?"d-none":""; ?>">
    <div class="alert alert-primary">
        <div class="spinner-border spinner-border-sm d-inline-block " role="status"></div> There is a pending snapshot request. This page will automatically reload when it is complete. Other functions will be disabled until the snapshot is complete.
    </div>
</div>
<div class="col-lg-12 crawl-requested <?php echo ($options['pending_actions'] != "crawl_requested")?"d-none":""; ?>">
    <div class="alert alert-primary">
        <div class="spinner-border spinner-border-sm d-inline-block " role="status"></div> Thje WP Boom service is currently crawling your site for pages to screenshot. This page will automatically reload when it is complete. Other functions will be disabled until the crawl is complete.
    </div>
</div>
<?php
if($scheduled){
    $next_schedueled_interval = date_diff(new DateTime(), new DateTime( gmdate("Y-m-d H:i:s",$scheduled)));
    $remaining_seconds = (($next_schedueled_interval->i * 60) + $next_schedueled_interval->s) + 15; //add buffer
    //$remaining_seconds = 30
    ?>
   
    <div class="col-lg-12">
        <div class="alert alert-primary pending-schedule-alert" data-scheduled_remaining="<?php echo esc_attr($remaining_seconds); ?>">
           
            <span class="spinner-border spinner-border-sm " aria-hidden="true"></span> A dev site is scheduled to spawn in <span class="fw-bold scheduled-remaining-seconds"><?php echo wp_kses_post($remaining_seconds); ?>s</span>. This alert will change once it has begun.  Plugin functionality will be <strong>disabled</strong> until it is finished.
        </div>
    
    </div> 
    <?php
} else {
    //$wp_cli_command = SafeWPUpdates_Lib::get_wp_cli_path();
    //$event = wp_schedule_single_event( time(), 'safeupdates_cron_ajax', $args);
    //@exec("{$wp_cli_command} wp cron event run wpboom_cron_ajax");
}
?>
<?php if($dev_prefix != $wpboom_prefix && $options['account_type'] == 'registered') { ?> 
    <input type="hidden" value="<?php echo ($dev_prefix)?wp_kses_post($dev_url):""; ?>" id="update_dev_url">
<?php } ?>
<?php 

?>
<?php if(!empty($wpboom_url) && $wpboom_url != $home_url){ 
    $wpboom_error = true;    
?>
    <div class="col-lg-12">
        <div class="alert alert-warning">
        <span class="dashicons dashicons-warning"></span> The domain of this site, <a href="<?php echo esc_url($home_url); ?>" target="_blank"><?php echo wp_kses_post($home_url); ?></a>, does not match the domain of your WP Boom account, <a href="<?php echo esc_url($wpboom_url); ?>" target="_blank"><?php echo wp_kses_post($wpboom_url); ?></a>. Please use an API token associated with this site: <a href="<?php echo esc_url($home_url); ?>" target="_blank"><?php echo wp_kses_post($home_url); ?></a>
        <br><span class="dashicons dashicons-info text-info"></span> You can update your token from  <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#settingsModal" type="button"><i class="fa-solid fa-gear fs-6"></i> Settings</button>
        </div>  
    </div>
<?php } elseif(!$scheduled && $has_sites && (empty($wpboom_dev_url) || (! empty($wpboom_prefix) && empty($dev_prefix)))  && !$spawn_in_progress) { 
    //$wpboom_error = true; 
    
?>
    <div class="col-lg-12">
        <div class="alert alert-warning"><span class="dashicons dashicons-warning"></span> 
            <?php if(empty($dev_prefix)){ ?>
                <?php if($wp_cli_installed) { ?>
                    You have not created a DEV site! You will only be able to snapshot your LIVE site until you create one.
                    <?php } else { ?>
                    You are unable to create DEV site because WP-CLI cannot be found. You will only be able to snapshot your LIVE site.
                    <?php } ?>
            <?php } elseif($dev_prefix != $wpboom_prefix) { ?> 
               A dev site has been spawned but does not match the records in your service account. Updating....
               
            <?php } ?>
        </div>  
    </div>
<?php } ?>

<?php if($spawn_in_progress){ ?>
    <div class="col-lg-12">
    <div class="alert alert-success">
    <span class="spinner-border spinner-border-sm " aria-hidden="true"></span> The development site is being created. Plugin functionality will be <strong>disabled</strong> until it is finished. The duration of this procedure is relative to the size of the database and file system.
    </div> 
    
    </div> 
<?php } ?>

<?php if(!$cron_enabled && 0){ ?>
    <div class="alert alert-warning">
        <span class='dashicons dashicons-warning'></span> <strong>CRON is disabled:</strong> This plugin requires CRON.
    </div>
<?php } ?>

