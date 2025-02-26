<?php

    /**
     *  this file is included for affiliate withdraw page
     *
     * @since    1.0.0
     */

  $ciwcamp_activated_payment_methods = [];

  $ciwcamp_active_bank_tranfer =  get_option("ciwcamp_active_bank_tranfer");
  $ciwcamp_active_cash_transfer =  get_option("ciwcamp_active_cash_transfer");

  if($ciwcamp_active_cash_transfer=="activated")
  {
    array_push($ciwcamp_activated_payment_methods, "Cash Transfer");
  }
  if($ciwcamp_active_bank_tranfer=="activated")
  {
    array_push($ciwcamp_activated_payment_methods, "Bank Transfer");
  }
 
?>

<div class="btn-group" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ciwcamp-request-for-withdraw" > <?php esc_html_e( 'Request for Withdraw','ciwcamp-affliate-manager' ); ?> </button>
</div>
<div class="btn-group mx-5">
  <button class="btn teal lighten-1" id="ciwcamp-all-withdraw-btn"><?php esc_html_e( 'All Withdraw','ciwcamp-affliate-manager' ); ?></button> 
  <button class="btn teal lighten-1" id="ciwcamp-approved-withdraw-btn"><?php esc_html_e( 'Approved Withdraw','ciwcamp-affliate-manager' ); ?></button>
  <button class="btn teal lighten-1" id="ciwcamp-reject-withdraw-btn"><?php esc_html_e( 'Rejected Withdraw','ciwcamp-affliate-manager' ); ?></button>
  <button class="btn teal lighten-1" id="ciwcamp-pending-withdraw-btn"><?php esc_html_e( 'Pending Withdraw','ciwcamp-affliate-manager' ); ?></button>
</div>
<table id="ciwcamp_withdraw_table" class="table table-striped table-bordered" cellspacing="0">
  <thead>
    <tr>
      <th><?php esc_html_e( 'Withdraw ID.','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Withdraw Amount','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Withdraw Method','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Withdraw Date','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Status','ciwcamp-affliate-manager' ); ?></th>
      <th><?php esc_html_e( 'Approve/Reject Date','ciwcamp-affliate-manager' ); ?></th>
    </tr>
  </thead>
</table>

<div class="modal fade right" id="ciwcamp-request-for-withdraw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-side modal-bottom-right" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100"><?php esc_html_e( 'Withdraw Request','ciwcamp-affliate-manager' ); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="ciwcamp-withdraw-form">
        <label><?php esc_html_e( 'Withdraw Amount','ciwcamp-affliate-manager' ); ?></label>
        <input type="text" id="ciwcamp-withdraw-amount" class="form-control mb-4">
        <label><?php esc_html_e( 'Withdraw Method','ciwcamp-affliate-manager' ); ?></label>
        <select class="form-control" id="ciwcamp-withdraw-method">
          <?php foreach($ciwcamp_activated_payment_methods as $ciwcamp_payment_methods) { ?>
          <option value="<?php esc_attr_e($ciwcamp_payment_methods,'ciwcamp-affliate-manager' ); ?>"><?php esc_html_e($ciwcamp_payment_methods,'ciwcamp-affliate-manager' ); ?></option>
      
          <?php } ?>
      </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="ciwcamp-request-withdraw-btn"><?php esc_html_e( 'Send Request','ciwcamp-affliate-manager' ); ?></button>
      </div>
      </form>
    </div>
  </div>
</div>