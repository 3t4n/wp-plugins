<?php

  /**
  *	this file is included for affiliate details page
  *
  * @since    1.0.0
 */	

?>

<div class="card-deck mt-n4">
  <div class="card text-blue mb-3 info-color">
    <a class="ciwcamp-taffiliate">
    <span class="dashicons dashicons-welcome-view-site text-white"></span></a>
    <p class="font-weight-bold ml-20"><?php esc_html_e( 'Total Visits','ciwcamp-affliate-manager' ); ?>
    <span id="ciwcamp-total-visits-counter"></span></p>
  </div>
  <div class="card text-blue mb-3 success-color">
    <a class="ciwcamp-taffiliate">
    <span class="dashicons dashicons-controls-repeat text-white pr-4"></span></a>
    <p class="font-weight-bold ml-20"><?php esc_html_e( 'Total Conversion','ciwcamp-affliate-manager' ); ?>
    <span id="ciwcamp-total-conversion-counter"></span</p>
  </div>
  <div class="card text-blue mb-3 warning-color">
    <a class="ciwcamp-taffiliate">
    <span class="dashicons dashicons-editor-paste-word text-white"></span></a>
    <p class="font-weight-bold ml-20"><?php esc_html_e( 'Withdraw','ciwcamp-affliate-manager' ); ?>
    <span id="ciwcamp-total-withdraw-counter"></span></p>
  </div>
  <div class="card text-blue mb-3 danger-color">
    <a class="ciwcamp-taffiliate">
    <span class="dashicons dashicons-money-alt text-white"></span></a>
    <p class="font-weight-bold ml-20"><?php esc_html_e( 'Balance','ciwcamp-affliate-manager' ); ?>
    <span id="ciwcamp-total-balance-counter"></span></p>
  </div>
</div>

<p class="h4 mb-4" id="ciwcamp-affiliate"><?php esc_html_e( 'Affiliate Details','ciwcamp-affliate-manager' ); ?> <button id="ciwcamp-editable-btn" class="btn ciwcamp-secondary-color text-white btn-sm"><span class="dashicons dashicons-edit-large"></span></button></p>
<input type="hidden" id="ciwcamp-affiliate-profile-id" >
<div class="form-row mb-4">
    <div class="col">
      <label><?php esc_html_e( 'Username','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-username" class="form-control" disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Email','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-email" class="form-control" disabled >
    </div>
    <div class="col">
      <label><?php esc_html_e( 'First Name','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-first-name" class="form-control ciwcamp-editable" disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Last Name','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-last-name" class="form-control ciwcamp-editable" disabled >
    </div>
</div>
<div class="form-row mb-4">
    <div class="col">
      <label><?php esc_html_e( 'Contact','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-contact" class="form-control ciwcamp-editable" disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Registration Date','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-register-date" class="form-control" disabled >
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Parent ID','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-parent-id" class="form-control" disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Affiliate Status','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-status" class="form-control"  disabled>
    </div>
</div>
<div class="form-row mb-4">
    <div class="col">
      <label><?php esc_html_e( 'Bank name','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-bank-name" class="form-control ciwcamp-editable" disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Account Number','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-bank-account-number" class="form-control ciwcamp-editable"  disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Bank Address','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-bank-address" class="form-control ciwcamp-editable" disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Bank Routing','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-bank-rounting" class="form-control ciwcamp-editable"  disabled>
    </div>
</div>
<div class="form-row mb-4">
    <div class="col">
      <label><?php esc_html_e( 'Bank IBAN','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-bank-iban" class="form-control ciwcamp-editable" disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Bank Swift code','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-bank-swift" class="form-control ciwcamp-editable"  disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Payment Email','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-payment-email" class="form-control ciwcamp-editable" disabled>
    </div>
    <div class="col">
      <label><?php esc_html_e( 'Stripe ID','ciwcamp-affliate-manager' ); ?></label>
      <input type="text" id="ciwcamp-affiliate-profile-strip-id" class="form-control ciwcamp-editable"  disabled>
    </div>
</div>
<div class="form-row mb-4">
  <button class="btn ciwcamp-secondary-color text-white " id="ciwcamp-update-affiliate-profile"><?php esc_html_e('Update Profile','ciwcamp-affliate-manager') ?></button>
</div>
 
<p class="h4 mb-4"><?php esc_html_e( 'Sale Details','ciwcamp-affliate-manager' ); ?> 
<table id="ciwcamp-affiliates-wise-sales" class="table" cellspacing="0" width="100%">
  <thead  class="text-white ciwcamp-secondary-color">
    <tr>
      <th><?php esc_html_e( 'Sale ID.','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Order ID','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Product','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Commission','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Date','ciwcamp-affliate-manager' ); ?></th>
    </tr>
  </thead>
</table>

<p class="h4 mb-4"><?php esc_html_e( 'Withdraw Details','ciwcamp-affliate-manager' ); ?> 
<table id="ciwcamp-affiliates-withdraw" class="table" cellspacing="0" width="100%">
  <thead  class="text-white ciwcamp-secondary-color">
    <tr>
      <th><?php esc_html_e( 'ID.','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Withdraw Amount','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Status','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Withdraw Method','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Date','ciwcamp-affliate-manager' ); ?></th>
    </tr>
  </thead>
</table>
