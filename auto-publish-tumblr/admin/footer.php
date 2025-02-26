<?php
if( !defined('ABSPATH') ){ exit();}
if(get_option('xyz_tbap_premium_version_ads')==1){?>
<div id="xyz-wp-tbap-premium">

<div style="float: left; padding: 0 5px">
<h2 style="vertical-align: middle;">
<a target="_blank" href="https://xyzscripts.com/wordpress-plugins/social-media-auto-publish/features"> 
	<?php $tbap_smap_plugin="XYZ WP SMAP Premium";
	      $tbap_smap_plugin_msg=sprintf(__('Fully Featured %s Plugin','auto-publish-tumblr'),$tbap_smap_plugin); 
	      echo $tbap_smap_plugin_msg; ?> </a> - <?php _e('Just 39 USD','auto-publish-tumblr'); ?>
		
</h2>
</div>
<div class="xyz-tbap-buy-now">
<a target="_blank" href="https://xyzscripts.com/members/product/purchase/XYZWPSMPPRE"><img 
            src="<?php  echo plugins_url("images/orange_buynow.png",XYZ_TBAP_PLUGIN_FILE); ?>">
</a>
</div>
<div style="float: left; padding: 0 5px">
<h2 style="vertical-align: middle;text-shadow: 1px 1px 1px #686868">
( <a 	href="<?php echo admin_url('admin.php?page=tumblr-auto-publish-about');?>">  <?php _e('Compare Features','auto-publish-tumblr') ?> </a> ) 
</h2>		
</div>
</div>
<?php }?>
<div style="clear: both;"></div>
<div style="width: 100%">
<div class="xyz_tbap_social_media">
<h3 class="xyz_tbap_inner_head"> <?php _e('Follow Us','auto-publish-tumblr') ?> </h3>
   <a target="_blank" href="http://facebook.com/xyzscripts" class="xyz_home_fbook"></a>
   <a target="_blank" href="http://twitter.com/xyzscripts" class="xyz_home_twitt"></a>
<!--    <a target="_blank" href="https://plus.google.com/+Xyzscripts/" class="xyz_home_gplus"></a> -->
 <a style="margin-right:0px;" target="_blank" href="https://www.linkedin.com/company/xyzscripts" class="xyz_home_linkedin"></a>
</div>

<div class="xyz_tbap_sugession">
<h3 class="xyz_tbap_inner_head"> <?php _e('Support','auto-publish-tumblr') ?> </h3>
<p style="width:100%;"><a target="_blank" href="https://xyzscripts.com/donate/5" > <?php _e('Donate','auto-publish-tumblr') ?> </a></p>
<p style="width:100%;"><a target="_blank" href="https://xyzscripts.com/support/" > <?php _e('Contact Us','auto-publish-tumblr') ?> </a></p>
<p><a target="_blank" href="https://wordpress.org/support/plugin/auto-publish-tumblr/reviews/" > <?php _e('Please Rate Us','auto-publish-tumblr') ?>
 </a></p>
<a target="_blank" href="https://wordpress.org/support/plugin/auto-publish-tumblr/reviews/" ><span class="xyz_new_star"></span></a>

<p style="width:100%;"><a target="_blank" href="https://wordpress.org/support/plugin/auto-publish-tumblr/" > <?php _e('Create a ticket at Wordpress forum','auto-publish-tumblr') ?> </a></p>
</div>
<div class="xyz_tbap_new_subscribe">
<h3 class="xyz_tbap_inner_head"> <?php _e('Stay tuned for our updates','auto-publish-tumblr') ?> </h3>

<script language="javascript">
function xyz_tbap_check_email(emailString)
{
    var mailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,})$/;
    var matchArray = emailString.match(mailPattern);
    if (emailString.length == 0)
    return false;
       
    if (matchArray == null)    {
    return false;
    }else{
    return true;
    }
}
   
function xyz_tbap_verify_lists(form)
{
   
    var total=0;
    var checkBox=form['chk[]'];
   
    if(checkBox.length){
   
    for(var i=0;i<checkBox.length;i++){
    checkBox[i].checked?total++:null;
    }
    }else{
       
    checkBox.checked?total++:null;
       
    }
    if(total>0){
    return true;
    }else{
    return false;
    }
}
   
function xyz_tbap_verify_fields()
{

    if(xyz_tbap_check_email(document.email_subscription.email.value) == false){
    alert(xyz_script_tbap_var.alert1);
    document.email_subscription.email.select();
    return false;
    }else if(xyz_tbap_verify_lists(document.email_subscription)==false){
    alert(xyz_script_tbap_var.alert2);
    }
    else{
    document.email_subscription.submit();
    }

}
</script>
<?php global $current_user; wp_get_current_user(); ?>
<form action="https://xyzscripts.com/newsletter/index.php?page=list/subscribe" method="post" name="email_subscription" id="email_subscription" target="_blank">
<input type="hidden" name="fieldNameIds" value="1,">
<input type="hidden" name="redirActive" value="https://xyzscripts.com/subscription/pending/XYZWPSMPPRE">
<input type="hidden" name="redirPending" value="https://xyzscripts.com/subscription/active/XYZWPSMPPRE">
<input type="hidden" name="mode" value="1">
<input class="xyz_tbap_name"  type="text" placeholder="<?php _e('Name','auto-publish-tumblr'); ?>" name="field1" value="<?php
if ($current_user->user_firstname != "" || $current_user->user_lastname != "") 
{
    echo esc_html($current_user->user_firstname . " " . $current_user->user_lastname);
} 
else if (strcasecmp($current_user->display_name, 'admin')!=0 && strcasecmp($current_user->display_name , "administrator")!=0 ) 
{
    echo esc_html($current_user->display_name);
} 
else if (strcasecmp($current_user->user_login ,"admin")!=0 && strcasecmp($current_user->user_login , "administrator")!=0 ) 
{
    echo esc_html($current_user->user_login);
}
?>"  >

<input class="xyz_tbap_email" name="email"
type="text" placeholder="<?php _e('Email','auto-publish-tumblr'); ?>" value="<?php echo esc_html($current_user->user_email); ?>" />
<input id="xyz_tbap_submit_tbap" class="sbmt_btn" type="submit" value="<?php _e('Subscribe','auto-publish-tumblr');?>" name="Submit"  onclick="javascript: if(!xyz_tbap_verify_fields()) return false; " />
<input type="hidden" name="listName" value="7,1,"/>
</form>
</div>   
<div class="xyz_tbap_inmotion">
   <a target="_blank" href="http://inmotion-hosting.evyy.net/c/1150074/260033/4222">
   <img src="<?php echo plugins_url("images/xyz.png",XYZ_TBAP_PLUGIN_FILE);?>" class="xyz_inmotion_label"></a></div>
</div>   

<div style="clear: both;"></div>
<div style="width: 100%">

<div class="xyz_our_plugins_new">
<p class="xyz_plugin_head"> <?php _e('Our Plugins','auto-publish-tumblr'); ?> : </p>

    <a target="_blank"  href="https://wordpress.org/plugins/social-media-auto-publish/"><span>1</span>Social Media Auto Publish</a>
    <a target="_blank"  href="https://wordpress.org/plugins/facebook-auto-publish/"><span>2</span>WP2Social Auto Publish</a>
    <a target="_blank"  href="https://wordpress.org/plugins/twitter-auto-publish/"><span>3</span>WP Twitter Auto Publish</a>
    <a target="_blank"  href="https://wordpress.org/plugins/linkedin-auto-publish/"><span>4</span>WP to LinkedIn Auto Publish</a>
    <a target="_blank"  href="https://wordpress.org/plugins/insert-html-snippet/"><span>5</span>Insert HTML Snippet</a>
    <a target="_blank"  href="https://wordpress.org/plugins/insert-php-code-snippet/"><span>6</span>Insert PHP Code Snippet</a>
    <a target="_blank"  href="https://wordpress.org/plugins/contact-form-manager/"><span>7</span>Contact Form Manager</a>
    <a target="_blank"  href="https://wordpress.org/plugins/newsletter-manager/"><span>8</span>Newsletter Manager</a>
    <a target="_blank"  href="https://wordpress.org/plugins/lightbox-pop/"><span>9</span>Lightbox Pop</a>
    <a target="_blank"  href="https://wordpress.org/plugins/full-screen-popup/"><span>10</span>Full Screen Popup</a>
    <a target="_blank"  href="https://wordpress.org/plugins/popup-dialog-box/"><span>11</span>Popup Dialog Box</a>
    <a target="_blank"  href="https://wordpress.org/plugins/quick-bar/"><span>12</span>Quick Bar</a>
    <a target="_blank"  href="https://wordpress.org/plugins/quick-box-popup/"><span>13</span>Quick Box Popup</a>
    <a target="_blank"  href="https://wordpress.org/plugins/custom-field-manager/"><span>14</span> Custom Field Manager</a>
    <a target="_blank"  href="https://wordpress.org/plugins/wp-filter-posts/"><span>15</span>  WP Filter Posts</a>
    <a target="_blank"  href="https://wordpress.org/plugins/wp-gallery-manager/"><span>16</span>  WP Gallery Manager</a>
</div>
</div>
<div class="xyz_tbap_poweredBy">  
<?php _e('Powered by','auto-publish-tumblr');?> <a href="http://xyzscripts.com" target="_blank">XYZScripts</a>
</div>
<div style="clear: both;"></div>
<p style="clear: both;"></p>