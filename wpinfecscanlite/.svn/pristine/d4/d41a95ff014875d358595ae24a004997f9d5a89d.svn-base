<?php if ( ! defined( 'ABSPATH' ) ) {exit;}?>
<div class="tab-pane" id="ContentF">
<style>.showq{word-break:break-all;max-width:200px !IMPORTANT;max-height:50px;overflow-x:auto;}
.activepage{font-weight:bold;text-decoration:none;color:#888}</style>
    <div class="col-lg-12">
          <p><?php esc_html_e("Enabling this feature will detect and log hackers' attacks against your site. You can also block hacker IPs from this log. Keep in mind that hackers attack WordPress sites at random, so a logged attack does not necessarily mean that the hack was successful.","wpinfecscanlite"); ?></p>
          <?php 
          if(!empty($hackmonitorchanged_error)){
              echo "<p color='red'>".esc_html($hackmonitorchanged_error)."</p>";
          }
          ?>
          <form method="post" action="">
            <table class="form-table">
              <tr valign="top">
              <th scope="row"><?php esc_html_e("Enable Hack Monitor","wpinfecscanlite"); ?></th>
              <td><input type="checkbox" name="wpinfectlitescanner_hackmonitor" value="1" <?php if($setting_hackmonitor==1){echo 'checked="checked"';} ?>/></td>
              
              <th scope="row"><?php esc_html_e("Number of logs to be stored","wpinfecscanlite"); ?></th>
              <td><select name="wpinfectlitescanner_hackmonitor_logcount" autocomplete="off"/>
              <?php
              $settingarray = array("infinity",10000,5000,1000,500,255);
              for($i=0;$i<count($settingarray);$i++){
                  $select="";
                  if($setting_hackmonitor_logcount==$settingarray[$i]){
                      $select=" selected='selected'";
                  }
                  echo "<option value='".esc_html($settingarray[$i])."' ".esc_html($select).">".esc_html($settingarray[$i])."</option>";
              }
              ?>
              </select>
              
              </td>
              </tr>
            </table>
            <input type="hidden" name="settingname" value="hackmonitor"/>
            <?php wp_nonce_field('setting_save', 'setting_save_nonce_field');?>
            <?php submit_button(); ?>
          </form>
          <hr>
          <?php 
          if(!empty($wpinfecscanlite_hackmonitorchanged_error)){
             echo "<p style='color:red'>".esc_html($wpinfecscanlite_hackmonitorchanged_error)."</p>";
          }
          ?>
          <h3><?php esc_html_e("Blocking IPs","wpinfecscanlite"); ?></h3>
          <p><?php esc_html_e("If you have inadvertently blocked your IP, please FTP to your server's HTACCESS file and delete #WPINFECLITEBLOCKIP_START to #WPINFECLITEBLOCKIP_END","wpinfecscanlite"); ?></p>
          
          <div style='width:100%;max-height:300px;overflow-y: scroll;'>
          <div class="table-responsive">
          <table id="ipblocktable" style='width:100%' class='datashow table'>
                <tr>
                <th><?php esc_html_e("Blocked time","wpinfecscanlite"); ?></th>
                <th><?php esc_html_e("IP(Check Abuse IP)","wpinfecscanlite"); ?></th>
                <th><?php esc_html_e("Un block this IP","wpinfecscanlite"); ?></th>
                </tr>
                <?php
                if(! empty($blockips)){
                    $blockips = unserialize($blockips);
                    if(count($blockips)>0){
                        $blockips = array_reverse($blockips);
                        for( $i=0;$i<count($blockips);$i++) {
                            $blockip = $blockips[$i];
                            $ipblockbutton = "<button style='width:100%' class='ipb".esc_html(wpinfectlitescanner_base64_encode_removeeq($blockip[1]))." btn btn-success' onClick='blockthisip(\"".esc_html(base64_encode($blockip[1]))."\");'>".esc_html(__("Unblock","wpinfecscanlite"))."</button>";
                            echo "<tr class='ipt".esc_html(wpinfectlitescanner_base64_encode_removeeq($blockip[1]))."'><td>".esc_html($blockip[0])."</td><td>".esc_html($blockip[1])."</td><td>".$ipblockbutton."</td></tr>";
                        }
                    }
                }
                ?>
          </table>
          </div>
          </div>
          <?php
           if(empty($blockips)){
               echo "<h6 id='noipdata'><b style='color:#72e350'>".esc_html(__("No data found.","wpinfecscanlite"))."</b></h6>";
           }
           
           $limitcount = 30;
          ?>
          <hr>
          <h3><?php esc_html_e("Hack log","wpinfecscanlite"); ?></h3>
          <script>
          
          function b64DecodeUnicode(str) {
                // Going backwards: from bytestream, to percent-encoding, to original string.
                return decodeURIComponent(atob(str).split('').map(function(c) {
                    return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                }).join(''));
            }
          function changepage(page){
              jQuery.ajax({
                   type: "POST",
                   url: "<?php echo esc_attr(admin_url( 'admin-ajax.php')); ?>",
                   data: "action=wpinfectlitescanner_changepage&nonce=<?php echo esc_attr(wp_create_nonce('wpinfecscanlite'));////edited2 ?>&pcount=<?php echo esc_attr($limitcount); ?>&page="+page,
                   success: function(msg){
                       //alert(msg);
                       if(msg!="error"){
                            jQuery("#hacktable tr:gt(0)").remove();
                            jQuery('#hacktable tr:last').after(b64DecodeUnicode(msg));
                            jQuery('.activepage').removeClass('activepage');
                            var pname = page-1;
                            jQuery('#hp'+pname).addClass('activepage');
                       }
                   }
              });
          }
          function blockthisip(ip){
              
              var classnameip = ip.replaceAll("=", "");
              jQuery(".ipb"+classnameip).prop("disabled",true);
              var mode=1;
              if(jQuery(".ipb"+classnameip).hasClass( "btn-success" )){
                  mode=0;
              }
              //alert(mode);
              jQuery.ajax({
                   type: "POST",
                   url: "<?php echo esc_url(admin_url( 'admin-ajax.php')); ?>",
                   data: "action=wpinfectlitescanner_blockip&nonce=<?php echo esc_attr(wp_create_nonce('wpinfecscanlite'));////edited2 ?>&ip="+ip+"&mode="+mode,
                   success: function(msg){
                       jQuery(".ipb"+classnameip).prop("disabled",false);
                       if(msg==1){
                            var el = jQuery(".ipb"+classnameip);
                            el.addClass('btn-success');
                            el.removeClass('btn-danger');
                            el.html("<?php esc_html_e("Unblock","wpinfecscanlite"); ?>");
                            
                            var ipblockbutton = "<button style='width:100%' class='ipb"+classnameip+" btn btn-success' onClick='blockthisip(\""+ip+"\");'><?php echo esc_html(__("Unblock","wpinfecscanlite"));?></button>";
                            
                            jQuery('#ipblocktable tr:first').after('<tr class="ipt'+classnameip+'"><td>Now</td><td>'+ atob(ip)+'</td><td>'+ipblockbutton+'</td></tr>');
                            jQuery('#noipdata').remove();
                       }else{
                           if(msg==-1){
                               alert("<?php esc_html_e("Block failed, does the HTACCESS file exist and is it writable permissions?","wpinfecscanlite"); ?>");
                           }else{
                               
                               var el = jQuery(".ipb"+classnameip);
                               el.addClass('btn-danger');
                               el.removeClass('btn-success');
                               el.html("<?php esc_html_e("Block","wpinfecscanlite"); ?>");
                               
                               jQuery('#ipblocktable .ipt'+classnameip).remove();
                           }
                       }
                   }
              });
          }
          </script>
          <?php 
            global $wpdb;
                
            $table_name = $wpdb->prefix . 'infectscannerlitenfblock';
            $query = $wpdb->prepare("SHOW TABLES LIKE %s",$table_name);
            if($wpdb->get_var($query) != $table_name) {
                $secfunc=new wpinfectlitescanner_WPInfectSecurity();
                $secfunc->wpinfectlitescan_db404install();
            }
            
            
            $nfblockres = false;
            $nfblockres_num_rows = 0;
            
            if($wpdb->get_var($query) == $table_name) {
                $query =  $wpdb->prepare("SELECT * FROM `%1s` ORDER BY lastdetect DESC limit %d",$table_name,$limitcount);
                
                $nfblockres = $wpdb->get_results($query);
                
                $query =  $wpdb->prepare("SELECT COUNT(*) FROM `%1s`",$table_name);
                $nfblockres_num_rows = $wpdb->get_var($query);
            }
            
            if($nfblockres_num_rows>$limitcount){
                echo "<div style='padding:20px 7px'>Page: ";
                for($i=0;$i<ceil($nfblockres_num_rows/$limitcount);$i++){
                    $active = "";
                    if($i==0){
                        $active = "activepage";
                    }
                    echo " <a id='hp".esc_html($i)."' class='".esc_html($active)."' href='javascript:void(0);' onCLick='changepage(".esc_html($i+1).")'>".esc_html($i+1)."</a> ";
                }
                echo "</div>";
            }
          ?>
          <style> #hacktable{word-break:break-all !important;}#hacktable td{min-width:90px;max-width:270px;}</style>
          <div class="table-responsive">
          <table style='width:100%' class='datashow table' id="hacktable">
                <tr>
                <th><?php esc_html_e("Detect time","wpinfecscanlite"); ?></th>
                <th><?php esc_html_e("Hacking type","wpinfecscanlite"); ?></th>
                <th><?php esc_html_e("Hacker's IP","wpinfecscanlite"); ?></th>
                <th><?php esc_html_e("Accessed file","wpinfecscanlite"); ?></th>
                <th><?php esc_html_e("Query","wpinfecscanlite"); ?></th>
                <th><?php esc_html_e("Hack count","wpinfecscanlite"); ?></th>
                <th><?php esc_html_e("Block this IP","wpinfecscanlite"); ?></th>
                </tr>
                <?php
                
                if($nfblockres){
                    foreach( $nfblockres as $key => $row) {
                        $ip = $row->ipv4;
                        if(empty($ip)){
                            $ip = $row->ipv6;
                        }
                        $accessedfile= $row->filepath.$row->filename;
                        $accessedfile=str_replace('//','/',$accessedfile);
                        $detecttime = $row->lastdetect;
                        $hacktype = $row->hacktype;
                        
                        
                        $getdata = $row->getquery;
                        $postdata = $row->postquery;
                        $showquery = $getdata;
                        if(strlen($postdata)>1){
                            $showquery = $postdata;
                        }
                        //$showquery=print_r(json_decode($showquery, true), TRUE);
                        $showquery=str_replace('"','',$showquery);
                        $showquery=str_replace('{','',$showquery);
                        $showquery=str_replace('}','',$showquery);
                        $showquery=str_replace(':','=',$showquery);
                        $showquery = htmlspecialchars (mb_strimwidth($showquery, 0, 200, '...'));
                        
                        $detectcount = $row->detectcount;
                        
                        $ipblockbutton = "<button class='ipb".esc_html(wpinfectlitescanner_base64_encode_removeeq($ip))." btn btn-danger' onClick='blockthisip(\"".esc_html(base64_encode($ip))."\");'>".esc_html(__("Block","wpinfecscanlite"))."</button>";
                        if(! empty($blockips)){
                            for( $i=0;$i<count($blockips);$i++) {
                                $blockip = $blockips[$i];
                                if($blockip[1]==$ip){
                                    $ipblockbutton = "<button class='ipb".esc_html(wpinfectlitescanner_base64_encode_removeeq($ip))." btn btn-success' onClick='blockthisip(\"".esc_html(base64_encode($ip))."\");'>".esc_html(__("Unblock","wpinfecscanlite"))."</button>";
                                    break;
                                }
                            }
                        }
                    
                        echo "<tr><td>".esc_html($detecttime)."</td><td>".esc_html($hacktype)."</td><td><a href='https://www.abuseipdb.com/check/".esc_html($ip)."' target='_blank'>".esc_html($ip)."</a></td><td>".esc_html($accessedfile)."</td><td class='showq'>".esc_html($showquery)."</td><td nowrap>".esc_html($detectcount)."</td><td nowrap>".$ipblockbutton."</td></tr>";
                    }
                }
                ?>
          </table>
          </div>
          <?php
           if($nfblockres){}else{
               echo "<h6><b style='color:#72e350'>".esc_html(__("No data found.","wpinfecscanlite"))."</b></h6>";
           }
          ?>
          <p><small><?php esc_html_e("Such hacks can be blocked automatically in the Pro version. Please consider using the Pro version!","wpinfecscanlite"); ?></small></p>
    </div>
</div>