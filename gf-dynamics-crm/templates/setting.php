<?php
if ( ! defined( 'ABSPATH' ) ) {
     exit;
 }                                            
$name=vxg_dynamics::post('name',$info);  
 $self_dir=admin_url().'?'.vxg_dynamics::$id.'_tab_action=get_code';  
// var_dump($info);
 ?>
  <div class="crm_fields_table">
    <div class="crm_field">
  <div class="crm_field_cell1"><label for="vx_name"><?php esc_html_e("Account Name",'gravity-forms-dynamics-crm'); ?></label>
  </div>
  <div class="crm_field_cell2">
  <input type="text" name="crm[name]" value="<?php echo !empty($name) ? esc_attr($name) : 'Account #'.esc_attr($id); ?>" id="vx_name" class="crm_text">

  </div>
  <div class="clear"></div>
  </div>
      <div class="crm_field">
  <div class="crm_field_cell1"><label for="vx_url"><?php esc_html_e('Dynamics-Online URL','gravity-forms-dynamics-crm'); ?></label>
  </div>
  <div class="crm_field_cell2">
  <input type="text" name="crm[url]" placeholder="https://abc.crm.dynamics.com" value="<?php echo !empty($info['url']) ? $info['url'] : ''; ?>" id="vx_url" class="crm_text" <?php if(!empty($info['access_token'])){ echo 'disabled="disabled"'; } ?>>
 <div class="howto"><?php esc_html_e('After entering url, click on "Save Changes" button.','gravity-forms-dynamics-crm'); ?><code><?php esc_html_e('Dynamics CRM On-premises is currently not supported.','gravity-forms-dynamics-crm'); ?></code></div>
 
  </div>
  <div class="clear"></div>
  </div>

    
  
     <div class="crm_field">
  <div class="crm_field_cell1">
  <label for="vx_custom_app_check"><?php esc_html_e('Dynamics APP','gravity-forms-dynamics-crm'); ?></label></div>
  <div class="crm_field_cell2"><div><input type="checkbox" name="crm[custom_app]" id="vx_custom_app_check" value="yes" <?php if(vxg_dynamics::post('custom_app',$info) == "yes"){echo 'checked="checked"';} ?> ><?php echo esc_html__('Use custom Dynamics CRM Application ','gravity-forms-dynamics-crm');  gform_tooltip('vx_custom_app'); ?></div>
  </div>
  <div class="clear"></div>
  </div>
  <div id="vx_custom_app_div" style="<?php if(vxg_dynamics::post('custom_app',$info) != "yes"){echo 'display:none';} ?>">
     <div class="crm_field">
  <div class="crm_field_cell1"><label for="app_id"><?php esc_html_e('APP ID','gravity-forms-dynamics-crm'); ?></label></div>
  <div class="crm_field_cell2">
     <div class="vx_tr">
  <div class="vx_td">
  <input type="password" id="app_id" name="crm[app_id]" class="crm_text" placeholder="<?php esc_html_e('APP ID','gravity-forms-dynamics-crm'); ?>" value="<?php echo esc_html(vxg_dynamics::post('app_id',$info)); ?>">
  </div><div class="vx_td2">
  <a href="#" class="button vx_toggle_btn vx_toggle_key" title="<?php esc_html_e('Toggle Consumer Key','gravity-forms-dynamics-crm'); ?>"><?php esc_html_e('Show Key','gravity-forms-dynamics-crm') ?></a>
  
  </div></div>

  <div class="howto">
  
 <div><?php echo sprintf(__('1. Register new App %sHere%s','gravity-forms-dynamics-crm'),'<a href="https://portal.azure.com/#blade/Microsoft_AAD_IAM/ActiveDirectoryMenuBlade/RegisteredApps">','</a>'); ?></div>
 <div><?php esc_html_e('2. Add "New App", enter name and url then click Create button','gravity-forms-dynamics-crm'); ?></div>
 <div><?php esc_html_e('3. Copy Application ID , it is your APP ID ','gravity-forms-dynamics-crm'); ?></div>
 <div><?php esc_html_e('4. go to settings and create new password, it is APP Key','gravity-forms-dynamics-crm'); ?></div>
 <div><?php esc_html_e('5. go to Reply URLs and enter URL which you entered in "App Redirect URL"','gravity-forms-dynamics-crm'); ?></div>
  </div>

</div>
  <div class="clear"></div>
  </div>
     <div class="crm_field">
  <div class="crm_field_cell1"><label for="app_secret"><?php esc_html_e('APP Key','gravity-forms-dynamics-crm'); ?></label></div>
  <div class="crm_field_cell2">
       <div class="vx_tr" >
  <div class="vx_td">
 <input type="password" id="app_secret" name="crm[app_secret]" class="crm_text"  placeholder="<?php esc_html_e('APP Key','gravity-forms-dynamics-crm'); ?>" value="<?php echo esc_html(vxg_dynamics::post('app_secret',$info)); ?>">
  </div><div class="vx_td2">
  <a href="#" class="button vx_toggle_btn vx_toggle_key" title="<?php esc_html_e('Toggle Consumer Secret','gravity-forms-dynamics-crm'); ?>"><?php esc_html_e('Show Key','gravity-forms-dynamics-crm') ?></a>
  
  </div></div>
  </div>
  <div class="clear"></div>
  </div>
       <div class="crm_field">
  <div class="crm_field_cell1"><label for="app_url"><?php esc_html_e("App Redirect URL",'gravity-forms-dynamics-crm'); ?></label></div>
  <div class="crm_field_cell2"><input type="text" id="app_url" name="crm[app_url]" class="crm_text" placeholder="<?php esc_html_e("Salesforce App URL",'gravity-forms-dynamics-crm'); ?>" value="<?php echo esc_html(vxg_dynamics::post('app_url',$info)); ?>"> 
    <div class="howto">
   <div>1: <?php echo $self_dir;?></div>
   <div>2: https://www.crmperks.com/nimble_auth/</div>

  </div>
  </div>
  <div class="clear"></div>
  </div>
  </div> 
  
  <div class="crm_field">
  <div class="crm_field_cell1"><label><?php esc_html_e('Dynamics Access','gravity-forms-dynamics-crm'); ?></label></div>
  <div class="crm_field_cell2">
  <?php  if(isset($info['access_token'])  && $info['access_token']!="") {
  ?>
  <div style="padding: 8px;" class="vx_green updated below-h2"><i class="fa fa-check"></i> <?php
  echo sprintf(__("Authorized Connection to %s on %s",'gravity-forms-dynamics-crm'),'<code>'.$info['url'].'</code>',date('F d, Y h:i:s A',$info['issued_at']));
        ?></div>
  <?php
  }else{
      if(empty($info['url'])){
vxg_dynamics::screen_msg(__('Please save dynamics URL first','gravity-forms-dynamics-crm'),'error below-h2');
      }else{
   $state=$link."&".vxg_dynamics::$id."_tab_action=get_token&id=".$id."&vx_nonce=".$nonce; 
 // $state=str_replace('&','-__-', $state);     &resource=<?php echo urlencode($info['url'])  
  ?>
  <a class="button button-default button-hero sf_login" data-id="<?php echo esc_html($client['client_id']) ?>" href="<?php echo $client['login']; ?>?response_type=code&state=<?php echo urlencode($state);?>&client_id=<?php echo $client['client_id'] ?>&redirect_uri=<?php echo urlencode($client['call_back']); ?>" title="<?php esc_html_e('Login with Dynamics','gravity-forms-dynamics-crm'); ?>" > <i class="fa fa-lock"></i> <?php esc_html_e("Login with Dynamics",'gravity-forms-dynamics-crm'); ?></a>
  <?php }
  }
  ?></div>
  <div class="clear"></div>
  </div>                  
    <?php if(isset($info['access_token'])  && $info['access_token']!="") {
  ?>
    <div class="crm_field">
  <div class="crm_field_cell1"><label><?php esc_html_e("Revoke Access",'gravity-forms-dynamics-crm'); ?></label></div>
  <div class="crm_field_cell2">  <a class="button button-secondary" id="vx_revoke" href="<?php echo $link."&".vxg_dynamics::$id."_tab_action=get_token&vx_nonce=".$nonce.'&id='.$id?>"><i class="fa fa-unlock"></i> <?php esc_html_e("Revoke Access",'gravity-forms-dynamics-crm'); ?></a>
  </div>
  <div class="clear"></div>
  </div> 
      <div class="crm_field">
  <div class="crm_field_cell1"><label><?php esc_html_e("Test Connection",'gravity-forms-dynamics-crm'); ?></label></div>
  <div class="crm_field_cell2">      <button type="submit" class="button button-secondary" name="vx_test_connection"><i class="fa fa-refresh"></i> <?php esc_html_e("Test Connection",'gravity-forms-dynamics-crm'); ?></button>
  </div>
  <div class="clear"></div>
  </div> 
  <?php
    }
  ?>
  <div class="crm_field">
  <div class="crm_field_cell1"><label for="vx_error_email"><?php esc_html_e("Notify by Email on Errors",'gravity-forms-dynamics-crm'); ?></label></div>
  <div class="crm_field_cell2"><textarea name="crm[error_email]" id="vx_error_email" placeholder="<?php esc_html_e("Enter comma separated email addresses",'gravity-forms-dynamics-crm'); ?>" class="crm_text" style="height: 70px"><?php echo isset($info['error_email']) ? esc_html($info['error_email']) : ""; ?></textarea>
  <span class="howto"><?php esc_html_e("Enter comma separated email addresses. An email will be sent to these email addresses if an order is not properly added to Salesforce. Leave blank to disable.",'gravity-forms-dynamics-crm'); ?></span>
  </div>
  <div class="clear"></div>
  </div>  

  
   <div class="crm_field">
  <div class="crm_field_cell1"><label for="vx_cache">
  <?php esc_html_e("Remote Cache Time", 'gravity-forms-dynamics-crm'); ?>
  </label>
 </div>
 <div class="crm_field_cell2">
    <div style="display: table">
  <div style="display: table-cell; width: 85%;">
  <select id="vx_cache" name="crm[cache_time]" style="width: 100%">
  <?php
  $cache=array("60"=>"One Minute (for testing only)","3600"=>"One Hour","21600"=>"Six Hours","43200"=>"12 Hours","86400"=>"One Day","172800"=>"2 Days","259200"=>"3 Days","432000"=>"5 Days","604800"=>"7 Days","18144000"=>"1 Month");
  if($this->post('cache_time',$info) == ""){
   $info['cache_time']="86400";
  }
  foreach($cache as $secs=>$label){
   $sel="";
   if($this->post('cache_time',$info) == $secs){
       $sel='selected="selected"';
   }
  echo '<option value="'.esc_attr($secs).'" '.$sel.' >'.esc_html($label).'</option>';     
  }   
  ?>
  </select></div><div style="display: table-cell;">
  <button name="vx_tab_action" value="refresh_lists_<?php echo vxg_dynamics::$id ?>" class="button" style="margin-left: 10px; vertical-align: baseline; width: 110px" autocomplete="off" title="<?php esc_html_e('Refresh Picklists','gravity-forms-dynamics-crm'); ?>">Refresh Now</button>
  </div></div>
  <span class="howto">
  <?php esc_html_e("How long should form and field data be stored? This affects how often remote picklists will be checked for the Live Remote Field Mapping feature. This is an advanced setting. You likely won't need to change this.",'gravity-forms-dynamics-crm'); ?>
  </span></div>
  </div>
<p class="submit">
  <button type="submit" value="save" class="button-primary" title="<?php esc_html_e('Save Changes','gravity-forms-dynamics-crm'); ?>" name="save"><?php esc_html_e('Save Changes','gravity-forms-dynamics-crm'); ?></button></p>  
  </div>  

  <script type="text/javascript">
 

  jQuery(document).ready(function($){


  $("#vx_url_type").change(function(){
     var val=$(this).val();
     if(val == 'custom'){
         $('#vx_url_type_div').show();
     }else{
          $('#vx_url_type_div').hide();
     } 
  })
  $(".vx_tabs_radio").click(function(){
  $(".vx_tabs").hide();   
  $("#tab_"+this.id).show();   
  }); 
$(".sf_login").click(function(e){
    if($("#vx_custom_app_check").is(":checked")){
    var client_id=$(this).data('id');
    var new_id=$("#app_id").val();
    if(client_id!=new_id){
          e.preventDefault();   
     alert("<?php esc_html_e('Dynamics Client ID Changed.Please save new changes first','gravity-forms-dynamics-crm') ?>");   
    }    
    }
})
  $("#vx_custom_app_check").click(function(){
     if($(this).is(":checked")){
         $("#vx_custom_app_div").show();
     }else{
            $("#vx_custom_app_div").hide();
     } 
  });
    $(document).on('click','#vx_revoke',function(e){
  
  if(!confirm('<?php esc_html_e('Notification - Remove Connection?','gravity-forms-dynamics-crm'); ?>')){
  e.preventDefault();   
  }
  })   
  })
  </script>  