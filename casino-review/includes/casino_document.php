<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


function casino_review_document(){
?>	
<table style="width: 100%;">
<tr>
<td><h1><?php _e('Document', 'casino-review' ); ?></h1></td>        
</tr>		
<tr>
<td><?php _e("1. Create casino using 'Add New Casino'", 'casino-review' ); ?></td>        
</tr>
<tr>
<td><?php _e('2. Use the Casino Post Id to create shortcode as shown below', 'casino-review' ); ?></td>        
</tr>
<tr>
<td><?php _e('Example', 'casino-review' ); ?>:-[crshortcode site1='6' site2='69' site3='62' site4='65' site5='66' site6='67' site7='68' site8='69' site9='70' site10='71']</td>
</tr>
<tr>
<td>
<a href="<?php echo esc_url('https://www.flytonic.com/free-casino-review-plugin-documentation/'); ?>" target="_blank"><input type="button" value="<?php _e('Click Here to check User Manual/Documentation of the plugin', 'casino-review' ); ?>" class="button button-primary button-large req_btn" /></a>
</td>        
</tr>
<tr>
<td><br/><h2><?php _e('Unlock below features with pro version:', 'casino-review' ); ?></h2></td>
</tr>
<tr>
<td><?php _e('.More options to add pros and cons of a casino', 'casino-review' ); ?></td>
</tr>
<tr>
<td><?php _e('.Feature to import several top casinos automatically from our database server. Save hours of your effort', 'casino-review' ); ?></td>
</tr>
<tr>
<td><?php _e('.Option to geo target casinos', 'casino-review' ); ?></td>
</tr>
<tr>
<td><?php _e('.Unlock several stunning layouts for CTR buttons and featured casinos', 'casino-review' ); ?></td>
</tr>
<tr>
<td><?php _e('.Option to add tags and tag based shortcodes, save several hours of your effort and time', 'casino-review' ); ?></td>
</tr>
<tr>
<td><?php _e('.Multiple color setting options', 'casino-review' ); ?></td>
</tr>
<tr>
<td><?php _e('.option to create casino games/slots manually', 'casino-review' ); ?></td>
</tr>
<tr>
<td><a href="<?php echo esc_url('https://www.flytonic.com/product/casino-review-plugin/'); ?>" target="_blank"><input type="button" value="<?php _e('Upgrade to Pro', 'casino-review' ); ?>" class="button button-primary button-large req_btn" /></a></td>        
</tr>
</table>
<?php
}
?>