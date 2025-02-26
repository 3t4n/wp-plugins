<div class="wrap">
	
    <?php screen_icon(); ?>
    
	<form action="options.php" method="post" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form">
    
	<?php settings_fields($plugin_id.'_options'); ?>
    
	  
	  
	<table>
      <tr>
        <td width="80%"><h2>Settings &raquo; CaliCoTek Floating Social Slider Plugin Options</h2></td>
		<td>Like This Plugin? Please Donate To Its Creator So He Keeps Creating </td>
	  </tr>
	</table>
		
    <table class="widefat">
		<thead>
		   <tr>
			 <th><input type="submit" name="submit" value="Save Settings" class="button-primary" style="padding:8px;" /></th>
		   </tr>
		</thead>
		<tfoot>
		   <tr>
			 <th><input type="submit" name="submit" value="Save Settings" class="button-primary" style="padding:8px;" /></th>
		   </tr>
		</tfoot>
		<tbody>
		    <tr>
			 <td style="padding:5px;font-family:Verdana, Geneva, sans-serif;color:#666;">
                 <label for="cct_quote_facebook">
                   <p>  <input type="text" size="50" name="cct_quote_facebook" value="<?php echo get_option('cct_quote_facebook'); ?>" /> Facebook Page?</p>
                 </label>
             </td>
		   </tr>
		    <tr>
			 <td style="padding:5px;font-family:Verdana, Geneva, sans-serif;color:#666;">
                 <label for="cct_quote_twitter">
                    <p> <input type="text" size="50" name="cct_quote_twitter" value="<?php echo get_option('cct_quote_twitter'); ?>" /> Twitter Page?</p>
                 </label>
             </td>
		   </tr>
		    <tr>
			 <td style="padding:5px;font-family:Verdana, Geneva, sans-serif;color:#666;">
                 <label for="cct_quote_googleplus">
                    <p> <input type="text" size="50" name="cct_quote_googleplus" value="<?php echo get_option('cct_quote_googleplus'); ?>" /> Google Plus Page?</p>
                 </label>
             </td>
		   </tr>
		   <tr>
			 <td style="padding:5px;font-family:Verdana, Geneva, sans-serif;color:#666;">
                 <label for="cct_quote_email">
                    <p> <input type="text" size="50" name="cct_quote_email" value="<?php echo get_option('cct_quote_email'); ?>" /> Site Email Address?</p>
                 </label>
             </td>
		   </tr>
		</tbody>
	</table>
    
	</form>
    
</div>