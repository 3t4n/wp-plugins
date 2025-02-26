<?php

    /**
     *	this file is included for admin payment setting page
     *
     * @since    1.0.0
     */	

?>
<?php
   $ciwcamp_paypal_details =  get_option("ciwcamp_paypal_details");
   $ciwcamp_stripe_details =  get_option("ciwcamp_stripe_details");
   $ciwcamp_active_bank_tranfer =  get_option("ciwcamp_active_bank_tranfer");
   $ciwcamp_active_cash_transfer =  get_option("ciwcamp_active_cash_transfer");
?>
<div class="col-12 card">
<ul class="nav nav-tabs nav-justified md-tabs border border-dark ciwcamp-secondary-color" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="ciwcamp-bank-tab" data-toggle="tab" href="#ciwcamp-bank" role="tab" aria-controls="ciwcamp-bank"
      aria-selected="false"><?php esc_html_e( 'Bank Transfer','ciwcamp-affliate-manager' ); ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="ciwcamp-cash-tab" data-toggle="tab" href="#ciwcamp-cash" role="tab" aria-controls="ciwcamp-cash"
      aria-selected="false"><?php esc_html_e( 'Cash Transfer','ciwcamp-affliate-manager' ); ?></a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active mt-4" id="ciwcamp-bank" role="tabpanel" aria-labelledby="ciwcamp-bank-tab">
    <p class="h4 mb-4"><?php esc_html_e( 'Bank Transfer','ciwcamp-affliate-manager' ); ?></p>
      <ul>
          <li >
              <label><?php esc_html_e( 'Activate Bank Transfer','ciwcamp-affliate-manager' ); ?></label>
              <input type="checkbox" id="ciwcamp-active-bank-tranfer" value="activated" <?php echo ($ciwcamp_active_bank_tranfer=="activated") ? "checked": ""; ?>>
          </li>
      </ul>
      <button class="btn ciwcamp-secondary-color text-white" type="submit" id="ciwcamp-save-bank-transfer"><?php esc_html_e( 'Save Details','ciwcamp-affliate-manager' ); ?></button>
  </div>

  <div class="tab-pane fade mt-4" id="ciwcamp-cash" role="tabpanel" aria-labelledby="ciwcamp-cash-tab">
    <p class="h4 mb-4"><?php esc_html_e( 'Cash Transfer','ciwcamp-affliate-manager' ); ?></p>
      <ul>
          <li >
              <td><?php esc_html_e( 'Activate Cash Transfer','ciwcamp-affliate-manager' ); ?></td>
              <td><input type="checkbox" id="ciwcamp-active-cash-tranfer" value="activated"  <?php echo ($ciwcamp_active_cash_transfer=="activated") ? "checked": ""; ?>></td>
          </li>
      </ul>
      <button class="btn ciwcamp-secondary-color text-white" type="submit" id="ciwcamp-save-cash-transfer"><?php esc_html_e( 'Save Details','ciwcamp-affliate-manager' ); ?></button>
  </div>
</div>
</div>