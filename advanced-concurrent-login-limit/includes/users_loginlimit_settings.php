<?php 
	global $table_prefix,$wpdb;
	$sql = "select * from ".$table_prefix."users order by id ASC";
	$users = $wpdb->get_results($sql);
	//die(print_r($users));
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('#inner_content').delegate('#ccloginlimit_update','click',function(e){
		e.preventDefault();
		//alert('hi');
		var userid = jQuery(this).parent().children('#hdnuserid').val();//jQuery('#hdnbookingid').val();
		var ccloginlimit = jQuery(this).parent().children('#ccloginlimit').val();
		jQuery.ajax({
				type: "POST",
				url: '<?php echo admin_url( 'admin-ajax.php' );?>',
				data: {
					action:'gen_alimitl_update_limitlogin',
					user_id: userid, login_limit: ccloginlimit
				},
				success: function (data) {
						var count = data.length;
						if(count>0){
							alert('<?php _e("User Login Limit Updated","advanced-limitlogin"); ?>');
						}
				},
				error : function(s , i , error){
						console.log(error);
				}
		});
		
	});
});	
</script>
<div class="wrapper">
  <div class="wrap" style="float:left; width:100%;">
    <div id="icon-options-general" class="icon32"><br />
    </div>
    
    <div style="width:47%;float:left;margin-top:15px;">
    	<div style="float:left;">
      	<div style="float:left; padding-top:8px;" class="wp-menu-image dashicons-before dashicons-admin-settings"></div>
      </div>
      <div style="float:left;padding-left:3px;"><h2><?php _e("User Settings","advanced-limitlogin"); ?> </h2></div>
    </div>
    <div style="width:28%;float:left;margin-top:15px;">
    	<form id="frmsearchb" method="post" action="">
      	<input type="text" name="txtsearchbooking" id="txtsearchbooking" value="" style="width:250px;height:40px;" />
      	<input type="button" id="btnsearchbooking" name="btnsearchbooking" value="" />
      </form>
    </div>
    
    <div class="main_div">
     	<div class="metabox-holder" style="width:80%; float:left;">
        <div id="namediv" class="stuffbox" style="width:99%;">
        <h3 class="top_bar"><?php _e("User Settings","advanced-limitlogin"); ?></h3>
		  <div id="inner_content">		
        	<div class="data"></div>
			  	<div class="pagination"></div>			
				 <table class="wp-list-table widefat fixed bookmarks" cellspacing="0">
                  <thead>
                    <tr>
                      <th><?php _e("ID","advanced-limitlogin"); ?></th>
                      <th><?php _e("Login","advanced-limitlogin"); ?></th>
                      <th><?php _e("User Name","advanced-limitlogin"); ?></th>
                      <th><?php _e("Email","advanced-limitlogin"); ?></th>
                      <th><?php _e("User Url","advanced-limitlogin"); ?></th>
                      <th><?php _e("Display Name","advanced-limitlogin"); ?></th>
                      <th colspan="2"></th>
                    </tr>
                  </thead>
                  <tr>
                            <?php
                  foreach($users as $user){
                  ?>
                    <tr class="alternate">
                        <td><?php printf(__("%s","advanced-limitlogin"), $user->ID) ;?></td>
                        <td><?php printf(__("%s","advanced-limitlogin"), $user->user_login) ;?></td>
                        <td><?php printf(__("%s","advanced-limitlogin"), $user->user_nicename) ;?></td>
                        <td><?php printf(__("%s","advanced-limitlogin"), $user->user_email) ;?></td>
                        <td><?php printf(__("%s","advanced-limitlogin"), $user->user_url) ;?></td>
                        <td><?php printf(__("%s","advanced-limitlogin"), $user->display_name) ;?></td>
                        <td colspan="2">
                        <?php
							$thislimitlogin = 0;
							
                        	$limitl = get_user_meta($user->ID,"_gen_user_cc_login_limit",true);
							if($limitl != "" || $limitl != NULL){
								$thislimitlogin = $limitl;
							}
						?>
                          <input type="text" id="ccloginlimit"  name="ccloginlimit" value="<?php echo $thislimitlogin;?>" />	
                          <a id="ccloginlimit_update" style="cursor:pointer;"	><?php _e("update","advanced-limitlogin"); ?></a>
                          &nbsp;&nbsp;&nbsp;
                          <input type="hidden" id="hdnuserid"  name="hdnuserid" value="<?php echo $user->ID;?>" />
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                  <tfoot>
                    <tr>
                       <th><?php _e("ID","advanced-limitlogin"); ?></th>
                      <th><?php _e("Login","advanced-limitlogin"); ?></th>
                      <th><?php _e("User Name","advanced-limitlogin"); ?></th>
                      <th><?php _e("Email","advanced-limitlogin"); ?></th>
                      <th><?php _e("User Url","advanced-limitlogin"); ?></th>
                      <th><?php _e("Display Name","advanced-limitlogin"); ?></th>
                      <th colspan="2"></th>
                    </tr>
                  </tfoot>
        		</table>
				</div>
				</div>
		  </div>
	  </div>
	 </div>
  </div>	
