<?php function om_stripe_html_contaner(){$om_stripe_date_html='<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div id="om_stripe_form_hide_after_sucess">
      <div class="form-group">
        <label  for="exampleInputEmail3" class="col-sm-3">Name:</label>
        <div class="col-lg-9"><input name="Fname" type="text" maxlength="50" id="Fname" placeholder="Name*" value=""></div>
      </div>
      <div class="form-group">
        <label  for="exampleInputEmail3" class="col-sm-3">Address:</label>
        <div class="col-lg-9"><input name="Address1" type="text" maxlength="50" id="Address1" placeholder="Address*" value=""></div>
      </div>
      <div class="form-group">
        <label  for="exampleInputEmail3" class="col-sm-3">Phone:</label>
        <div class="col-lg-9"><input name="phone_no" type="text" maxlength="50" id="Phone_no" placeholder="Phone No*" value=""></div>
      </div>
      <div class="form-group">
        <label  for="exampleInputEmail3" class="col-sm-3">Email:</label>
        <div class="col-lg-9"><input name="Email" type="text" maxlength="50" id="Email" placeholder="Email*" value=""></div>
      </div>
      <div class="form-group">
        <label  for="exampleInputEmail3" class="col-sm-3">Amount:</label>
        <div class="col-lg-9"><input name="amount" type="text" maxlength="50" id="amount" placeholder="Donation Amount*" value=""></div>
      </div>
      <div class="form-group">
        <label  for="exampleInputEmail3" class="col-sm-3">Card Number:</label>
        <div class="col-lg-9"><input type="text" size="20" autocomplete="off" class="card-number" id="cardnum" placeholder="Card Number*"/></div>
      </div>

        <div class="form-group">
          <label  for="exampleInputEmail3" class="col-sm-3">CVC:</label>
          <div class="col-lg-9"><input type="text" size="4" autocomplete="off" class="card-cvc" id="cvc" placeholder="CVC*" /></div>
        </div>
        <div class="form-group">
          <label  for="exampleInputEmail3" class="col-sm-3">Expiration Month:</label>
          <div class="col-lg-9"><input type="text" size="2" class="card-expiry-month" id="month" placeholder="Exp-MM*"/></div>
        </div>
        <div class="form-group">
          <label  for="exampleInputEmail3" class="col-sm-3">Expiration Year:</label>
          <div class="col-lg-9"><input type="text" size="4" class="card-expiry-year" id="year" placeholder="Exp-YYYY*"/></div>
        </div>
      <div class="form-group">
      <input type="button" name="next" class="next action-button btn btn-primary mb-3" value="Submit Payment" id="nextButton"/>
      </div>
    </div>
    <p id="error_message"></p>
    <p id="error_contaner"></p>
    <p id="sucess_message"></p>
    <div id="load"></div>
  </div>
</div>';return $om_stripe_date_html; }add_shortcode('om_stripe_form', 'om_stripe_html_contaner');?>