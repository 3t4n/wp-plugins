<table width="100%" border="0" class="ap-table">
  <form name="cf" method="post" action="">
    <?php wp_nonce_field( 'contact_info_options_save_action', 'contact_info_options_save_action_field' ); ?>
    <input type="hidden" value="update_contact" name="update_contact" />
    <tr>
      <td><h3>
          <?php _e('Contact Info');?>
        </h3></td>
    </tr>
    <tr>
      <td>
      <div class="ap-tabs">
          <div class="ap-tab">
            <?php _e('Default Data','login-sidebar-widget');?>
          </div>
          <div class="ap-tab">
            <?php _e('Contact Icons','login-sidebar-widget');?>
          </div>
          <div class="ap-tab">
            <?php _e('Usage','login-sidebar-widget');?>
          </div>
        </div>
        <div class="ap-tabs-content">
          <div class="ap-tab-content">
            <table width="100%">
              <tr>
                <td colspan="2"><h3>
                    <?php _e('Contact Data for Shortcode');?>
                  </h3></td>
              </tr>
              <?php
				if(is_array( $contact_info_data )){
					foreach( $contact_info_data as $key => $value ){
						?>
				  <tr>
					<td width="200" valign="top"><label for="<?php echo $value['title'];?>"><?php echo $value['title'];?></label></td>
					<td><input type="text" name="<?php echo $key;?>_default" value="<?php echo stripslashes(get_option( $key.'_default' ));?>" class="widefat">
            
          <p><strong><font color="#0073AA">&lt;?php echo ci("<?php echo $key;?>"); ?&gt;</font></strong> or Shortcode <strong><font color="#0073AA">[ci show="<?php echo $key;?>"]</font></strong></p>

          </td>
				  </tr>
				  <?php
					}
				}
				?>
                <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Save" class="button button-primary button-large button-ap-large" /></td>
            </tr>
            </table>
          </div>
          <div class="ap-tab-content">
            <table width="100%">
              <tr>
                <td colspan="2"><h3>
                    <?php _e('Contact Info Icons');?>
                  </h3></td>
              </tr>
              <?php
				if(is_array( $contact_info_data )){
					foreach( $contact_info_data as $key => $value ){
						?>
						  <tr>
							<td width="200"><label for="<?php echo $value['title'];?>"><?php echo $value['title'];?></label></td>
							<td><select name="<?php echo $key;?>_icon">
								<option value="">-</option>
								<?php echo $this->get_icon_selected( get_option( $key.'_icon') );?>
							  </select>
							  <?php echo Contact_Info_Widget::contact_icon($key);?></td>
						  </tr>
						  <?php
					}
				}
				?>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><input type="submit" name="Submit" value="Save" class="button button-primary button-large button-ap-large" /></td>
            </tr>
    
            </table>
          </div>
          <div class="ap-tab-content">
            <table width="100%">
              <tr>
                <td colspan="2"><h3>
                    <?php _e('Shortcode Usage');?>
                  </h3></td>
              </tr>
               <tr>
                <td colspan="2" align="left"><?php $this->contact_help();?></td>
              </tr>
            </table>
          </div>
        </div></td>
    </tr>
  </form>
</table>