<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="col-lg-6 ">
   
    <div class="card w-100 p-0 dashboard-main-panel"  style="max-width:100%;min-height: 359px;">
        <div class="card-header  bd-gray-300">
            <h4 class="float-start"> Welcome to "Safe WP Updates" by WP Boom!</h4>
           
            <a class="btn btn-link text-secondary float-start text-decoration-underline" href="<?php echo esc_url(WPBOOM_URL); ?>/login" target="_blank">
           
            <span class="float-start">
            (<?php echo wp_kses_post($options['account_type']); ?>)
            </span>
           
            </a>
            
            
            <?php if(!$snapshots &&  $has_sites || $options['account_type'] == 'registered'){ ?>
            <button  data-bs-title="If you appear to be missing images or if the plugin appears to be stuck, click here." class="btn btn-link float-end" type="button" onclick="jQuery('.btn-update-token').trigger('click')"><i class="fa-solid fa-rotate-right"></i> Sync WP Boom</button>
            <?php } ?>
        </div>
        <div class="card-body">
            <div class="col-sm-12 float-start p-1">
                
                <?php if($options['account_type'] != 'registered'){ ?>
                    <p class="wpdt-text wpdt-font">Get ready to experience WP Boom, a powerful tool designed to create development sites in a breeze as well as to test plugin updates without fear of breaking your live site.</p>
                    <p class="wpdt-text wpdt-font">Designed as a companion plugin for our WP Boom service, you can safely test plugin updates without risking your live site. Simply clone your existing WordPress installation, including the database, directly from your admin dashboard to have a brand new dev site.</p>
                    <p class="wpdt-text wpdt-font">The spawned instance operates independently, allowing you to update plugins and compare screenshots to see changes without fear. If everything seems fine, you can do the updates in your live site, and if something brakes you will have the chance to fix it behind the curtains, without anyone noticing a design error due to a plugin or database update gone wrong.  </p>
                    <p class="wpdt-text wpdt-font">Click <span class="text-primary">Snapshot Live</span> to register for free or login in to your existing WP Boom account!</p>
                    
                <?php  if(array_key_exists('spawned',$options) && count((array)$options['spawned'])){ ?>
                <?php } else { ?>
                
                <?php } ?>
                <p class="wpdt-text wpdt-font fw-bold">   The following actions are available: </p>
                 
                <?php
                
                if(!array_key_exists('spawned',$options) || (array_key_exists('spawned',$options) && count((array)$options['spawned']) == 0)){ // ((array_key_exists('spawned',$options) && count((array)$options['spawned']) == 0) || (!array_key_exists('spawned',$options))) && $options['account_type'] != 'registered') 
                    ?>
                    <?php if($wp_cli_installed){ ?>
                    <button type="button" class="btn btn-warning    btn-trigger-create-modal <?php echo ($scheduled || $options['pending_actions'] == "snapshot_requested" )?"disabled":""; ?>" data-bs-toggle="modal" data-bs-title="You can create a dev site for testing plugin updates, performing development and taking snapshots!" data-bs-target="#createModal" <?php if($options['pending_actions'] == "snapshot_requested" || !empty($remote_error) || (array_key_exists('spawned',$options) && count($options['spawned']))){ ?>disabled<?php } ?>  ><i class="fa fa-folder-gear"></i>
                    Create Dev Site</button>
                    <?php } ?>
                    <?php
                }
                ?>
                <button class="btn  btn-primary d-none" data-bs-toggle="modal" data-bs-target="#settingsModal" type="button"><i class="fa fa-arrow-right-to-arc"></i> Connect Your Account 
                </button>
                <?php if($options['account_type'] != 'registered'){ ?>
                <button data-bs-toggle="modal"  onclick="jQuery('input.required').removeClass('is-invalid')" data-bs-title="Register for free or login to an existing account. After which, a reference snapshot of the site will be performed."  data-bs-target="#signupModal" class="btn btn-primary  <?php echo ($scheduled)?"disabled":""; ?> " type="button">
                <i class="fa fa-camera"></i> <?php echo ($options['api']['token'])?wp_kses_post("Reconnect Account"):wp_kses_post("Snapshot Live"); ?></button> 
               
                <?php } ?>  
                <?php } else { ?>
                    <?php
                    // DEV SITE SPAWN :: $options['spawned']
                    // WPBOOM SERVICE SITE :: $options['api']['data']['sites'][0]
                    // IS DEV SNAPSHOT :: $options['api']['data']['live_or_dev'] == 1
                    // SCREENSHOTS :: $options['api']['data']['sites'][0]['images']
                    // SITE PAGES :: $options['api']['data']['snapshots']
                   
                    $sites = [];
                    $images = [];
                    $live_or_dev = "";
                    $last_snapshot = gmdate("Y-m-d H:i:s",strtotime("-1 year"));
                    $last_snapshot_page = "";
                    $elapsed = [];
                    $snapshots = [];
                    $has_diff = false;
                    if($options['api']['data']['sites']){
                        $live_or_dev = $options['api']['data']['live_or_dev'];
                        foreach($options['api']['data']['sites'] as $site){
                            $sites[] = $site;
                            $images = $site['images'];
                            $snapshots = $options['api']['data']['snapshots'];
                            foreach($snapshots as $idx => $snapshot){
                                if($snapshot['last'] > $last_snapshot){
                                    $last_snapshot = $snapshot['last'];
                                    $last_snapshot_page =  $snapshot['page'];
                                }
                                $elapsed[] = $snapshot['elapsed'];
                                if(array_key_exists('diff',$images[$snapshot['snapshot_id']])){
                                    $has_diff = true;
                                }
                                $snapshots[$idx]['images'] = $images[$snapshot['snapshot_id']];
                            }
                        }
                    }
                    //SafeWPUpdates_print_r($elapsed);
                    if($elapsed){
                        $avg_speed = floor(array_sum($elapsed)/count($elapsed));
                        $fastest = min($elapsed);
                        $slowest = max($elapsed);
                    }
                   
                                            
                    
                    ?>
                   
                    <?php if($snapshots){ ?>
                    <div class="col-8 p-2 float-start">
                        <h1 class="fs-5 fw-bolder float-start mb-0">Latest Snapshot (<?php echo ($live_or_dev )?"DEV":"LIVE"; ?>) <i title="Maximize" class="fa fa-camera text-success"></i></h1>
                        <div id="speedchart_div" class="float-end position-absolute right-0"></div>
                        <div class="clearfix"></div>
                        <div>
                            <span class="last_snapshot_time"><?php echo wp_kses_post(gmdate("F j, Y g:i a",strtotime($last_snapshot))); ?></span> -                                        
                            <strong class="num_of_pages">
                            <?php echo wp_kses_post(count($snapshots)); ?>
                            </strong>
                            <input type="hidden" id="speed_test" value="3.9">                                        
                            pages <i class="fa-solid fa-gauge-high" data-bs-placement="right" data-bs-html="true" data-bs-title="<div class='text-start fs-6'>Speed Index<hr class='my-1'><strong>Average:</strong> <?php echo wp_kses_post($avg_speed);?> ms<br><strong>Fastest:</strong> <?php echo wp_kses_post($fastest);?> ms<br><strong>Slowest:</strong> <?php echo wp_kses_post($slowest);?> ms</div>"></i>
                        </div>
                        <div class="pt-2 snapshot-this-text"><i class="fa-solid fa-circle-info"></i> 
                            This snapshot was created
                            when you added the site
                            on <?php echo wp_kses_post(gmdate("F  j, Y g:i a",strtotime($sites[0]['created_at']))); ?>
                        </div>
                        <div class="snapshot-this-text"><i class="fa-solid fa-circle-info"></i> This site was last crawled on <?php echo wp_kses_post(gmdate("F j, Y g:i a",strtotime($sites[0]['last_crawled']))); ?></div>
                        <div class="pt-2 fs-6">
                            <strong>Latest Snapshot URL:</strong>
                            <span class="text-primary">
                            <a href="<?php echo ($live_or_dev)?wp_kses_post($sites[0]['dev_url']):wp_kses_post($sites[0]['url']);?><?php echo wp_kses_post($last_snapshot_page); ?>" style="position: relative;margin-right: -4px;" target="_blank"><?php echo ($live_or_dev)?wp_kses_post($sites[0]['dev_url']):wp_kses_post($sites[0]['url']);?><span class="last_snapshot_url  text-primary"><?php echo wp_kses_post($last_snapshot_page); ?></span></a>
                            </span>
                        </div>
                        <?php if(!$has_diff){ ?>
                            <div class="pt-2 fs-6">
                            This Is Your Reference Snapshot. The next snapshot you take will be compared against this one.
                        </div>
                        <?php } ?>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-4 p-2 float-end">
                        <div class="overall-percent " style="font-size: 60px;text-align: center;line-height: 104px;"></div>
                    </div>
                    <div class="clearfix"></div>
                    <?php } ?>
                    <hr>
                    
                    <p class="wpdt-text wpdt-font fw-bold">   The following actions are available: </p>
                    <?php  if(!array_key_exists('spawned',$options) || (array_key_exists('spawned',$options) && count((array)$options['spawned']) == 0)){ // ((array_key_exists('spawned',$options) && count((array)$options['spawned']) == 0) || (!array_key_exists('spawned',$options))) && $options['account_type'] != 'registered') 
                    ?>
                        <?php if($wp_cli_installed){ ?>
                        <button type="button"  data-bs-title="You can create a dev site for testing plugin updates, performing development and taking snapshots!" class="<?php if(!empty($remote_error)){ ?>btn-danger<?php } ?> btn btn-warning   btn-trigger-create-modal " data-bs-toggle="modal" data-bs-target="#createModal" <?php if($scheduled || !empty($remote_error)|| (array_key_exists('spawned',$options) && count($options['spawned']))){ ?>disabled<?php } ?>  ><i class="fa fa-folder-gear"></i>
                        Create Dev Site</button>
                        <?php }  ?>
                    <?php }  ?>
                    <a data-bs-toggle="tooltip" data-bs-title="This will take a snapshot of the site and compare it to the existing reference." class="snapshot-live-btn snapshot-btn   btn btn-<?php echo ( $live_or_dev)?"success":"primary"; ?> <?php echo ($options['pending_actions'] == "snapshot_requested" || $options['pending_actions'] == "crawl_requested" || $scheduled)?"disabled":""; ?>" type="button" href="#" onclick="takeSnapshot(0);jQuery('.snapshot-btn').addClass('disabled');return false;"><i class="fa fa-camera size-18"></i> Snapshot Live</a>
                    <?php if($sites[0]['dev_url'] || 1){ ?><a data-bs-toggle="tooltip" data-bs-title="This will take a snapshot of the dev site and compare it to the live site." class="snapshot-dev-btn snapshot-btn btn btn-<?php echo ($live_or_dev)?"primary":"success"; ?> <?php echo (empty($wpboom_dev_url) || $options['pending_actions'] == "snapshot_requested" || empty($dev_prefix)  || $options['pending_actions'] == "crawl_requested")?"disabled":""; ?>" type="button" href="#" onclick="takeSnapshot(1);jQuery('.snapshot-btn').addClass('disabled');return false;"><i class="fa fa-camera size-18"></i> Snapshot Dev</a>
                    <?php } ?>
                    <button class="btn btn-secondary  float-end d-none" data-bs-toggle="modal" data-bs-target="#settingsModal" type="button"><i class="fs-6 fa-solid fa-gear"></i> Settings
                </button>
               
                <div class="clearfix"></div>
                <?php } ?>
                
                </p>
                
                
                
                
                        
                
            </div>
           
            
        </div>
        <?php if($options['account_type'] == 'registered'){ ?>
        <div class="card-footer">
            <span class="text-muted float-start">Connected to WP Boom service as <a href="<?php echo esc_url(WPBOOM_URL); ?>/login" target="_blank"><?php echo wp_kses_post($options['login']); ?></a> </span>
            <button class="btn btn-sm btn-light  float-end snapshot-btn <?php echo ($options['pending_actions'] == "snapshot_requested" || $options['pending_actions'] == "crawl_requested")?"text-dark disabled":"text-secondary border-dark"; ?>" data-bs-title="Click this button to disconnect the plugin from your WP Boom service account!" onclick="Swal.showLoading();jQuery('.swal2-footer').html('Updating Account...').show();jQuery('#api_token').val('');jQuery('#api_form').submit();">Disconnect Account</button>
        </div>
        <?php } ?>
    </div>
</div>
<div class="col-lg-6 h-100 ">
    <div class="card p-0 w-100 dashboard-news-panel" style="max-width:100%;height:359px;">
        <div class="card-header  bd-gray-300">
            <h4 class="float-start">Latest News</h4> <?php if(defined('WP_DEBUG') && WP_DEBUG){ ?><button class="btn btn-link text-secondary float-end" type="button" onclick="jQuery('.wp-debug').toggleClass('d-none');">toggle debug</button><?php } ?>
        </div>
        <div class="card-body latest-news" style="overflow-y: scroll;">
            <div class="spinner-border spinner-border-sm d-inline-block" role="status"></div>  Loading
        </div>
    </div>
</div>
<div class="wp-debug d-none">
<?php SafeWPUpdates_print_r($options); ?>
</div>
