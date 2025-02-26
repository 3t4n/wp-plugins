 <?php

  /**
   * this page is used to show admin settings page 
   *
   * @since    1.0.0
   */	

  ?>
  <?php
    $ciwcamp_comman_settings = get_option("ciwcamp-common-commission");
  ?>
<div class="tab-pane fade show active" id="Affiliate-Setting" role="tabpanel" aria-labelledby="Affiliate-Setting-just">
  <div class="col-12 mt-4 ">
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label ><?php esc_html_e( 'Signup Bonus','ciwcamp-affliate-manager' ); ?></label >
          <input class="form-control" type="text" id="ciwcamp-signup-bonus" placeholder="<?php esc_attr_e('value','ciwcamp-affliate-manager' ); ?>" value="<?php esc_html_e( get_option("ciwcamp-signup-bonus"),'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="form-group">
          <label ><?php esc_html_e( 'Link Expiry time','ciwcamp-affliate-manager' ); ?></label>
          <input class="form-control" type="text" id="ciwcamp-cookie-time" placeholder="<?php esc_attr_e('Link expiry Time (in days)','ciwcamp-affliate-manager' ); ?>" value="<?php esc_html_e( get_option("ciwcamp-cookie-time"),'ciwcamp-affliate-manager' ); ?>">
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label ><?php esc_html_e( 'Default message for Pending affiliates','ciwcamp-affliate-manager' ); ?></label >
          <input class="form-control" type="text" id="ciwcamp-affiliate-pending-msz" placeholder="<?php esc_attr_e('Message','ciwcamp-affliate-manager'); ?>" value="<?php esc_html_e(get_option("ciwcamp_affiliate_pending_msz"),'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="form-group">
          <label ><?php esc_html_e( 'Default message for Reject affiliates','ciwcamp-affliate-manager' ); ?></label >
          <input class="form-control" type="text" id="ciwcamp-affiliate-reject-msz" placeholder="<?php esc_attr_e('Message','ciwcamp-affliate-manager'); ?>" value="<?php esc_html_e(get_option("ciwcamp_affiliate_reject_msz"),'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="form-group">
          <label ><?php esc_html_e( 'Default message for Disbled affiliates','ciwcamp-affliate-manager' ); ?></label >
          <input class="form-control" type="text" id="ciwcamp-affiliate-disable-msz" placeholder="<?php esc_attr_e('Message','ciwcamp-affliate-manager'); ?>" value="<?php esc_html_e(get_option("ciwcamp_affiliate_disable_msz"),'ciwcamp-affliate-manager' ); ?>">
        </div>
        <div class="form-group">
          <label ><?php esc_html_e( 'Default message for Ban affiliates','ciwcamp-affliate-manager' ); ?></label >
          <input class="form-control" type="text" id="ciwcamp-affiliate-ban-msz" placeholder="<?php esc_attr_e('Message','ciwcamp-affliate-manager');?>" value="<?php esc_html_e(get_option("ciwcamp_affiliate_ban_msz"),'ciwcamp-affliate-manager' ); ?>">
        </div>
      </div>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn ciwcamp-secondary-color text-white float-right" id="ciwcamp-save-affiliate-setting-btn"> <?php esc_html_e( 'Save Changes','ciwcamp-affliate-manager' ); ?> </button>
      </div>
    </div>
  </div>
</div>


