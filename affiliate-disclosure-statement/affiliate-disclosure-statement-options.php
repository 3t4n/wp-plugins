<?php
if( isset($_POST['disclosure_options']) ) {
  if( isset($_POST['website']) ) update_option('affiliate_disclosure_website', $_POST['website']);
  if( isset($_POST['affiliate_programs']) ) update_option('affiliate_disclosure_programs', $_POST['affiliate_programs']);
  if( isset($_POST['affiliate_attribution']) ) update_option('affiliate_disclosure_attribution', 1);
  else update_option('affiliate_disclosure_attribution', 0);
  ?>
  <div class="updated"><p><strong><?php _e('Options saved.'); ?></strong></p></div>
  <?php
}

if( ($website = get_option('affiliate_disclosure_website')) === FALSE ) $website = '';
if( ($affiliate_programs = get_option('affiliate_disclosure_programs')) === FALSE ) $affiliate_programs = '';
$attribution = get_option('affiliate_disclosure_attribution');
?>
<div class="wrap">
 <div id="icon-options-general" class="icon32"><br /></div>
 <?php echo "<h2>Disclosure ".__('Settings')."</h2>"; ?>  
 <form name="disclosure_admin_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
  <input type="hidden" name="disclosure_options" value="Y">  
  <?php echo "<h4>Disclosure ".__( 'Setting')."</h4>"; ?>  
  <table class="form-table">
  <tr valign="top">
   <th scope="row"><?php _e("Website"); ?></th>
   <td><input type="text" name="website" value="<?php echo $website; ?>" size="20"> Your website name.</td>
  </tr>

  <tr valign="top">
   <th scope="row"><?php _e("Affiliate Programs"); ?></th>
   <td><input type="text" name="affiliate_programs" value="<?php echo $affiliate_programs; ?>" size="20"> Your website affilaite programs.</td>
  </tr>

  <tr valign="top">
   <th scop="row"><?php _e("Attribution Link"); ?></th>
   <td>
    <input type="checkbox" name="affiliate_attribution" <?php echo ($attribution ? 'checked' : ''); ?>> Show attribution link. Provided by <a href="http://www.easywebsitebuilders.net/">www.easywebsitebuilders.net</a>.
   </td>
  </tr>

  <tr>
   <td colspan="2">To use the affiliate disclosure statement add the shortcode <b>[affiliate-disclosure-statement]</b> to any page.</td>
  </tr>
  </table>

  <p class="submit">  
   <input type="submit" class="button-primary" name="Submit" value="<?php _e('Save Changes') ?>" />  
  </p>  
 </form>  

</div>  
