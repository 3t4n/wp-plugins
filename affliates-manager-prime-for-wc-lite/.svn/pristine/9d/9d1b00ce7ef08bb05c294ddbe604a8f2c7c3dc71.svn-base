
<?php
     /**
	 * This file is included for comman commission setting page
	 *
	 * @since    1.0.0
	 */
  $ciwcamp_comman_settings = get_option("ciwcamp-common-commission");
?>
<div class="col-12 card">
  <h6 class="font-weight-bold text-center margin-10"><?php esc_html_e( 'Commission Priority : Affiliate wise > Product wise > Category wise > Comman wise ','ciwcamp-affliate-manager' ); ?></h6>
  <form id="ciwcamp-comman-setting-form">
  <div class="row">
      <div class="col-6 form-group">
          <label class="mb-3"><?php esc_html_e( 'Flat and percentage value separated with space ','ciwcamp-affliate-manager' ); ?></label> 
          <label><?php esc_html_e('Common commission value','ciwcamp-affliate-manager'); ?></label>   
      </div>
            
      <div class="col-6 form-group">
        <select id="ciwcamp-comman-commission-type" class="browser-default custom-select form-control mb-3">
          <option value="Flat"  <?php echo ($ciwcamp_comman_settings[0]=="Flat") ? "selected" : "";  ?> > <?php esc_html_e( 'Flat','ciwcamp-affliate-manager' ); ?> </option>
          <option value="Percentage" <?php echo ($ciwcamp_comman_settings[0]=="Percentage") ? "selected" : "";  ?> > <?php esc_html_e( 'Percentage','ciwcamp-affliate-manager' ); ?></option>
          <option value="Combined" <?php echo ($ciwcamp_comman_settings[0]=="Percentage+Flat") ? "selected" : "";  ?> ><?php esc_html_e( 'Combined','ciwcamp-affliate-manager' ); ?></option>
        </select>
        <input type="text" id="ciwcamp-common-commission-value" class="form-control" placeholder="<?php esc_attr_e('value'); ?>" value="<?php esc_html_e($ciwcamp_comman_settings[1]); ?>">
        <p><?php esc_html_e('Combined commission value seprated with comma(Flat value, Percentage value.','ciwcamp-affliate-manager'); ?></p>
      </div>
            
      <div class="btn-group">
        <button type="button" class="btn ciwcamp-secondary-color text-white" id="ciwcamp-save-comman-commission-btn"> <?php esc_html_e( 'Save Changes','ciwcamp-affliate-manager' ); ?> </button>
      </div>
  </div>
  </form>
</div>







