
<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<?php if(array_key_exists('spawned',$options) && count((array)$options['spawned'])){ ?>
<div class="card p-0 w-100" style="max-width:100%;">
        <div class="card-header  bd-gray-300">
            <h3 class="float-start fw-bold fs-4">Development Site</h3>  
            
            
        </div>
        <div class="card-body p-0">
            <table class="m-0 sites-table table table-light table-hover border  table table-stack  no-footer">
                <thead>
                    <tr>
                        
                        <th style="width:20%;">Dev Site Name</th>
                        
                        <th style="width:25%;">Last File Modified</th>
                        <th style="width:12.5%;">Size</th>
                        <th style="width:12.5%;">Status</th>
                        <th class="d-none">Pages</th>
                        <th style="width:15%;">Plugins Updated</th>
                        
                        
                        <th style="width:15%;"></th>
                    </tr>
                </thead>
                <tbody id="spawned_sites">
            
                    <?php 
                    //$options['spawned'] = ["2ca1aa4dwpboomdev"=>[],"41f284f2wpboomdev"=>[]];
                    //update_option( 'safeupdates_options', $options);
                    if(array_key_exists('spawned',$options) && count((array)$options['spawned'])){
                        foreach($options['spawned'] as $prefix=>$data){ 
                            
                            $total_percent = "-";
                            if(array_key_exists('snapshots',$data)){
                                $total_percent = 0;
                                foreach($data['snapshots'] as $url=>$snapshots){
                                    if($snapshots['diff']['percent'] >= 0){
                                        $total_percent += $snapshots['diff']['percent'];
                                    }
                                    
                                }
                                if($total_percent > 0){
                                    $total_percent = number_format($total_percent / count((array)$data['snapshots']),2);
                                }
                                $total_percent = $total_percent . "%";
                            }
                        
                            if(empty($prefix)){
                                unset($options['spawned'][$prefix]);
                                update_option('safeupdates_options',$options);
                                continue;
                            }
                            $path = ABSPATH . $prefix;
                            $sdata = SafeWPUpdates::safeupdates_ajax("status",$prefix,0,0,0,true);
                            $spawn_status = $sdata['response']['code'];
                            if($spawn_status == "tables"){
                                //SafeWPUpdates::wpboom_ajax("status",$prefix,0,0,0,true);
                            }
                            ?>
                            <tr id="<?php echo esc_attr($prefix); ?>" class="<?php echo (!array_key_exists('pages',$data))?"crawl-pages":""; ?> animate__animated animate__faster">
                                
                                
                                <td class="<?php echo ($data['progress'] && array_reverse($data['progress'])[0] != "Finished")?wp_kses_post("d-none"):""; ?>">
                                <a data-bs-title="Click this link to open your dev site in another tab. The credentials to login will be the same as your live site. If your admin folder is not 'wp-admin', adjust it accordingly." class="d-block fw-normal" href="/<?php echo wp_kses_post($prefix); ?>/wp-login.php" target="_blank"><?php echo wp_kses_post($data['site_name']); ?> - click to login</a>
                            
                                <?php echo ($data['include_uploads'])?"<div class='badge bd-red-700 text-white rounded-1 p-1 '>Include Uploads</div><br>":""; ?>
                                <?php echo ($data['update_plugins'])?"<div class='badge bd-red-800 text-white rounded-1 p-1'>Update Plugins/Themes</div>":""; ?>
                                <?php echo ($data['skip_database'])?"<div class='badge bd-red-900 text-white rounded-1 p-1'>Skip Database</div>":""; ?>
                                <?php echo ($data['username'])?"<div class='text-muted'>".wp_kses_post($data['username'])."</div>":""; ?>
                                <?php echo ($data['password'])?"<div class='text-muted d-inline-block'  data-password='".wp_kses_post($data['password'])."' data-bs-toggle='tooltip' data-bs-title='Click to reveal password' data-bs-placement='right'>•••••••••••••</div>":""; ?>
                                
                                </td>
                                
                                <td data-modified="<?php echo esc_attr($prefix); ?>" class="<?php echo ($data['progress'] && array_reverse($data['progress'])[0] != "Finished")?wp_kses_post("d-none"):""; ?>">
                                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                    <span role="status"><?php echo ($data['progress'])?"Pending":"Checking"; ?>...</span>  
                                </td>  
                                <td class="<?php echo ($data['progress'] && array_reverse($data['progress'])[0] != "Finished")?"d-none":""; ?> site_size">
                                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                    <span role="status"><?php echo ($data['progress'])?"Pending":"Calculating"; ?>...</span>  
                                </td>
                                <?php
                                $ready = true;
                                if($data['progress'] && array_reverse($data['progress'])[0] != "Finished"){
                                    $ready = false;
                                    ?>
                                    <td style="width:100%" data-in_progress="<?php echo esc_attr($prefix); ?>">
                                        
                                        <div class="text-muted progress-steps">Process Started.
                                            <?php
                                            $p = $data['progress'];
                                            $p = array_slice($p,0,4);
                                            $num_steps = count((array)$p);
                                            foreach($p as $idx => $step){
                                                echo wp_kses_post('<div>'.$step); 
                                                if($step != "Finished"){
                                                    echo wp_kses_post('...');
                                                }
                                                if($num_steps > 1 && $step != "Finished" && $idx + 1 < $num_steps){
                                                    echo wp_kses_post('done');
                                                }
                                                echo wp_kses_post('</div>');
                                            }
                                            ?>
                                        </div>
                                        
                                    </td>
                                        
                                <?php } ?>
                                <?php if($ready){ ?> 
                                    <td class="<?php echo ($data['progress'] && array_reverse($data['progress'])[0] != "Finished")?"d-none":""; ?>" data-site_status="<?php echo esc_attr($prefix); ?>">
                                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                                        <span role="status">Checking...</span>
                                    </td> 
                                <?php } ?>
                                <td class="<?php echo ($data['progress'] && array_reverse($data['progress'])[0] != "Finished")?"d-none":""; ?> page-count d-none">
                                    <?php echo wp_kses_post(count((array)$data['pages'])); ?>
                                    
                                </td>
                                <td class="<?php echo ($data['progress'] && array_reverse($data['progress'])[0] != "Finished")?wp_kses_post("d-none"):""; ?> updated-date">
                                    <?php echo (array_key_exists('updated',$data))?wp_kses_post($data['updated']):wp_kses_post("-"); ?>
                                    
                                </td>
                                
                                <?php
                                $folder  = wp_upload_dir()['basedir']."/".$prefix;
                                $filename  = $prefix.".png";
                                $image_path = $folder . $filename;
                                $ref_image_path = $folder . "ref-". $filename;
                                $image_url = wp_upload_dir()['baseurl']."/" . $prefix . "/" . $filename;
                                $ref_image_url = wp_upload_dir()['baseurl'] ."/" . $prefix . "/ref". $filename;
                                ?>
                                
                                
                                
                                <td class="<?php echo ($data['progress'] && array_reverse($data['progress'])[0] != "Finished")?"d-none":""; ?> text-center">
                                    <div class="btn-group-vertical">
                                    
                                            <a class="btn btn-sm btn-primary action-group disabled text-start" href="/<?php echo wp_kses_post($prefix); ?>" target="_blank"><i class="fa-solid fa-link"></i> Visit Site</a></li>
                                            <a class="btn btn-sm btn-secondary action-group disabled  text-start"  href="#"  onclick="Swal.showLoading();jQuery('.swal2-footer').html('Checking For Updates...').show();list_plugins('<?php echo wp_kses_post($prefix); ?>');return false;"><i class="fa-solid fa-puzzle-piece-simple"></i> Update Plugins</a></li>
                                            <a data-bs-toggle="tooltip" data-bs-title="This will allow you to query the spawned site for its status." class="btn btn-sm btn-success action-group disabled  text-start" href="#" onclick="safeupdates_check_spawn_status('<?php echo wp_kses_post($prefix); ?>');return false;"><i class="fa-solid fa-server"></i> Check Site Status</a></li>
                                            <a class="btn btn-sm btn-danger  text-start"  href="#"  onclick="deleteSite('<?php echo wp_kses_post($prefix); ?>');return false;"><i class="fa fa-trash me-2" aria-hidden="true"></i> Delete Site</a>
                                        
                                    </div>
                                </td>
                            
                                
                            </tr>
                            <?php 
                        } 
                    }
                    if((array_key_exists('spawned',$options) && !count((array)$options['spawned'])) || ! array_key_exists('spawned',$options)){
                        ?><tr class="nosites"><td colspan="7"  class="text-center">There are no development sites.</td></tr><?php
                    }
                    ?>
                
                </tbody>
            </table>
        </div>
</div>
<?php } ?>