<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<?php  if($has_pages > 0){ ?>
    <div class="col-lg-12">
        <?php if($options['account_type'] == "guest" && WPBOOM_EDITION != "NDIC"){ ?>
            <div class="alert alert-primary"><i class="fa fa-info-circle"></i> Guest accounts are limited to 10 pages.</div>
        <?php } ?>   
        
           
            
                                        
        <div class="card p-0 w-100 mt-4 <?php echo ($options['pending_actions'] == "snapshot_requested")?"mt-0":""; ?> <?php echo (array_key_exists('token',$api))?"":""; ?> wpboom-api-container" style="max-width:100%;">
            <div class="card-header  bd-gray-300">
            <h3 class="float-start fw-bold fs-4">Snapshots</h3>   <button  data-bs-title="Sync plugin data with WP Boom service data." class="btn btn-link text-secondary float-end" type="button" onclick="jQuery('.btn-update-token').trigger('click')">sync data</button>
                
                <!-- api button -->
                
                    <!-- approve button -->
                    <?php if($options['account_type'] != "guest"){ ?>
                    <button class="btn  btn-success float-end me-2 d-none btn-approve" onclick="jQuery('.btn-update-token').click();"> <i class="fa-solid fa-check"></i> Approve Snapshots</button>
                    <?php } ?>    
                    <?php if($options['pending_actions'] == "ready"){ ?>
                <!-- refresh button -->
               
                <?php } ?>    
                <!-- snapshot button -->
                <?php if(0){ ?>
                <button class=" ms-0 btn text-light float-end btn-primary me-2 d-inline-block btn-snapshot"  data-bs-title="TODO: Take a snapshot of your dev site and compare it to live." type="button"><i class="fa fa-camera size-18"></i> &nbsp; Take Snapshot 
                    <div class="spinner-border spinner-border-sm d-inline-block d-none" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>   
                </button>
                <?php } ?>
                <div class="alert p-2 m-0 me-2 position-relative d-inline-block float-end alert-danger mt-2 snapshot-warning d-none" style="top:-8px;">
                    <span class='dashicons dashicons-warning text-danger'></span> <strong>Snapshots Out-Dated:</strong> Click <span class="">Refresh Snapshots</span> <span style="font-size: 35px;position: relative;top: 6px;line-height: 0px;">➨</span>
                </div>  

                
            </div>
            <div class="card-body p-0">
            <?php $is_reference = true; ?>
            <?php $total_percent = null; ?>   
            <?php $sites_with_percent = 0; ?>   
            <?php ob_start(); ?>
            <?php  foreach($sites as $site){ ?>
                    
                <table class="my-0 sites-table table table-light table-hover border table-striped table table-stack  no-footer" id="<?php echo esc_attr($prefix); ?>-snapshots">
                    <thead>
                    
                        <tr>
                            <th  style="width: 176px">Screenshot</th>
                            <th><?php echo wp_kses_post($data['site_name']); ?> Pages</td>
                            <th>Last Snapshot 
                                <?php
                                if($options['account_type'] == 'registered'){
                                    $host = "";
                                    if($site){
                                        if($options['api']['data']['live_or_dev']){
                                            $host = $site['dev_url'];
                                            ?> (DEV)<?php
                                        } else {
                                            $host = $data['sites'][0]['url'];
                                            ?> (LIVE)<?php
                                        }
                                    }
                                    
                                }
                                ?>
                            </td>
                            <th>%</td>
                            
                        </tr>
            
                    
                    
                    </thead>
                    <tbody>
                    
                    <?php foreach( $snapshots as $snapshot_id=>$snapshot) { 
                        
                        $page = $host . $snapshot['page'];
                        $ref = $diff = $img = "";
                        $ref = $snapshot['images']['ref']['Url'];
                        $diff = $snapshot['images']['diff']['Url'];
                        $img = $snapshot['images']['img']['Url'];
                        
                        $modified = $snapshot['images']['img']['LastModified'];
                        if(!preg_match("/[0-9]/",$snapshot['pct_changed'])){
                            $percent = '-';
                        } else {
                            $percent = ($snapshot['pct_changed'])?$snapshot['pct_changed']:'0';
                            $percent = number_format($percent,1);
                            if($total_percent == null){
                                $total_percent = 0;
                            }
                            $total_percent += $percent;
                            if($percent > 0){
                                $sites_with_percent++;
                            }
                        }
                        if($modified){
                            $is_reference = false;
                        }
                        $parsed = wp_parse_url($page);
                          
                        ?>
                        <tr class="site-page">
                            <td class="w-auto" id="thumb-<?php echo esc_attr($idx); ?>">
                                <?php if($ref || $img || $diff){} else { ?>-<?php } ?>
                                <?php if($ref){ ?>
                                <div class="overflow-hidden <?php echo ($diff)?"d-none":""; ?> border border-dark d-inline-block position-relative border-1 data-images " data-src="<?php echo esc_attr($ref); ?>" style="height:50px;width:50px;" > 
                                
                                    <img  onerror="imageError(jQuery(this))" title="reference" loading="lazy" class="ref border-0 img-thumbnail p-0 border-dark position-absolute rounded-0" src="<?php echo esc_url($ref); ?>?no-cache=<?php echo esc_attr(time()); ?>">
                                </div>
                                <?php } ?>
                                <?php if($diff){ ?>
                                <div class="overflow-hidden border d-none border-dark d-inline-block position-relative border-1 data-images " data-src="<?php echo esc_url($diff); ?>" style="height:50px;width:50px;" data-percent="<?php echo esc_attr($percent); ?>"> 
                                
                                    <img onerror="imageError(jQuery(this))" title="difference"  loading="lazy" class="diff border-0 img-thumbnail  p-0 border-dark position-absolute rounded-0" src="<?php echo esc_url($diff); ?>?no-cache=<?php echo esc_attr(time()); ?>">
                                </div>
                                <?php } ?>
                                <?php if($img && $diff){ ?>
                                <div class="overflow-hidden border border-dark d-inline-block position-relative border-1 data-images " data-src="<?php echo esc_url($img); ?>" style="height:50px;width:50px;" > 
                                    <img onerror="imageError(jQuery(this))" title="screenshot" loading="lazy" class="img border-0 img-thumbnail  p-0 border-dark position-absolute rounded-0" src="<?php echo esc_url($img); ?>?no-cache=<?php echo esc_attr(time()); ?>">
                                </div>
                                <?php } ?>
                                <?php if($img && !$ref){ ?>
                                <div class="overflow-hidden border border-dark d-inline-block position-relative border-1 data-images " data-src="<?php echo esc_url($img); ?>" style="height:50px;width:50px;" > 
                                    <img onerror="imageError(jQuery(this))" title="screenshot" loading="lazy" class="img border-0 img-thumbnail  p-0 border-dark position-absolute rounded-0" src="<?php echo esc_url($img); ?>?no-cache=<?php echo esc_attr(time()); ?>">
                                </div>
                                <?php } ?>
                                
                                
                            
                            </td>
                            <td><a href="<?php echo esc_url($page); ?>" target="_blank"><?php echo wp_kses_post($parsed['path']); ?></a></td>
                            <td><?php echo ($modified)?wp_kses_post($modified):wp_kses_post("-"); ?></td>
                            
                            <td><?php echo ($percent >= 0 && $modified)?wp_kses_post($percent."%"):wp_kses_post("-"); ?></td>
                            
                        </tr>
            
                    
                    <?php } ?>  
                    <?php
                    $pages_table = ob_get_clean(); 
                    if($is_reference){
                        $pages_table = '<p class="lead p-3 mb-0">This is your reference snapshot. Take another snapshot to compare.</p>' . $pages_table; 
                    }
                    echo $pages_table; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

                    ?>
                    </tbody>
                </table>
                <?php if($total_percent){ ?>
                <data id="total_percent" data-value="<?php echo ($sites_with_percent)?wp_kses_post(number_format($total_percent/$sites_with_percent,1)):wp_kses_post($total_percent); ?>"></data>
                <?php } ?>
                
                <?php } ?>
                
            </div>
        </div>

    

    </div>
    <?php if($options['api']['data']){ ?>
    <div class="col-lg-4 sticky-top p-0 d-none" style="top:30px">
        
        <div class="table-responsive m-4 preview-container" >
            <div class="btn-group pb-2 sticky-top d-none">
                <button type="button" data-type="diff" class="btn btn-sm btn-secondary   btn-diff" >Show Diff</button>
                <button type="button"  data-type="ref" class="btn btn-sm btn-primary btn-ref" >Show Reference</button>
                <button type="button"  data-type="img" class="btn btn-sm btn-secondary btn-new">Show New</button>
                
                
            </div>
            <img src="" class="img-fluid preview-img">
        </div>
    </div>
    <?php } ?>
<?php } ?>