
<?php
    
    /**
     * This file is included to show Affiliates list page
     *
     * @since    1.0.0
     */

?>

<div class="z-depth-1  pt-3 pl-3 px-3 py-2 ml-n5 mt-n2">
  <div>
      <button type="button"  class="btn ciwcamp-secondary-color text-white" data-toggle="modal" data-target="#create-affiliate-modal-preview">
        <?php esc_html_e( 'Create Affiliates','ciwcamp-affliate-manager' ); ?>
      </button>
  </div>
  
  <form id="create-affiliate-form">
    <div class="modal fade right" id="create-affiliate-modal-preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-full-height modal-right" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
            <div class="modal-body mt-n3">
              <div class="p-2 mt-3">
                <legend  class="w-auto"><?php esc_html_e( 'Affiliate Details','ciwcamp-affliate-manager' ); ?></legend>
                <div class="form-row">
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-username" class="form-control">
                        <label for="ciwcamp-affiliate-username"><?php esc_html_e( 'Username','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-email" class="form-control">
                        <label for="ciwcamp-affiliate-email"><?php esc_html_e( 'Email','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-fname" class="form-control">
                        <label for="ciwcamp-affiliate-fname"><?php esc_html_e( 'First Name','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-lname" class="form-control">
                        <label for="ciwcamp-affiliate-lname"><?php esc_html_e( 'Last Name','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-contact" class="form-control">
                        <label for="ciwcamp-affiliate-contact"><?php esc_html_e( 'Contact','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-password" class="form-control" >
                        <label for="ciwcamp-affiliate-password"><?php esc_html_e( 'Password','ciwcamp-affliate-manager' ); ?><a href="#" class=" ml-5"><i class="fa fa-refresh" aria-hidden="true" id="ciwcamp-generate-password" title="esc_attr_e(Regenerate Password)"></i></a></label>
                      </div>
                  </div>
                </div>
              </div>
              <div class="p-2 mt-3">
                <legend  class="w-auto"><?php esc_html_e( 'Payment Details','ciwcamp-affliate-manager' ); ?></legend>
                <div class="form-row">
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-account-number" class="form-control">
                        <label for="ciwcamp-affiliate-account-number"><?php esc_html_e( 'Account Number','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-bank-name" class="form-control">
                        <label for="ciwcamp-affiliate-bank-name"><?php esc_html_e( 'Bank Name','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-bank-address" class="form-control">
                        <label for="ciwcamp-affiliate-bank-address"><?php esc_html_e( 'Bank Address','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-bank-rounting-number" class="form-control">
                        <label for="ciwcamp-affiliate-bank-rounting-number"><?php esc_html_e( 'Routing Number','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-bank-iban" class="form-control">
                        <label for="ciwcamp-affiliate-bank-iban"><?php esc_html_e( 'Bank IBAN','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-bank-swift" class="form-control">
                        <label for="ciwcamp-affiliate-bank-swift"><?php esc_html_e( 'Bank Swift ','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-payment-email" class="form-control">
                        <label for="ciwcamp-affiliate-payment-email"><?php esc_html_e( 'Payment Email ','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                  <div class="col">
                      <div class="md-form">
                        <input type="text" id="ciwcamp-affiliate-bank-strip-id" class="form-control">
                        <label for="ciwcamp-affiliate-bank-strip-id"><?php esc_html_e( 'Stripe ID ','ciwcamp-affliate-manager' ); ?></label>
                      </div>
                  </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger" ><?php esc_html_e( 'Clear','ciwcamp-affliate-manager' ); ?></button>
              <button type="button" class="btn ciwcamp-secondary-color text-white" id="ciwcamp-create-affiliate"><?php esc_html_e( 'Create Affiliate','ciwcamp-affliate-manager' ); ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </form>

  <div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn ciwcamp-secondary-color text-white mr-2 ciwcamp-active" id='ciwcamp-affiliates-all'> <?php esc_html_e( 'All Affiliates','ciwcamp-affliate-manager' ); ?> (<span id="ciwcamp-all-affiliate-count"></span>) </button>
    <button type="button" class="btn ciwcamp-secondary-color text-white mr-2 ciwcamp-active" id='ciwcamp-affiliates-disbaled'> <?php esc_html_e( 'Disabled','ciwcamp-affliate-manager' ); ?> (<span id="ciwcamp-disabled-affiliate-count"></span>) </button>
    <button type="button" class="btn ciwcamp-secondary-color text-white mr-2 ciwcamp-active" id='ciwcamp-affiliates-banned'> <?php esc_html_e( 'Banned','ciwcamp-affliate-manager' ); ?> (<span id="ciwcamp-banned-affiliate-count"></span>) </button>
    <button type="button" class="btn ciwcamp-secondary-color text-white mr-2 ciwcamp-active" id='ciwcamp-affiliates-rejected'> <?php esc_html_e( 'Rejected','ciwcamp-affliate-manager' ); ?> (<span id="ciwcamp-rejected-affiliate-count"></span>) </button>
    <button type="button" class="btn ciwcamp-secondary-color text-white mr-2 ciwcamp-active" id='ciwcamp-affiliates-pending'> <?php esc_html_e( 'Pending','ciwcamp-affliate-manager' ); ?> (<span id="ciwcamp-pending-affiliate-count"></span>) </button>
  </div>
  <form id="ciwcamp-action-form">
    <div class='ciwcamp-btn-div'>
      <select class="browser-default custom-select custom-select-lg mb-3 mt-3" id="ciwcamp-affiliate-bulk-action">
        <option value=""> <?php esc_html_e( 'Bulk Action','ciwcamp-affliate-manager' ); ?> </option>
        <option value="Enable"> <?php esc_html_e( 'Approve','ciwcamp-affliate-manager' ); ?> </option>
        <option value="Reject"> <?php esc_html_e( 'Reject','ciwcamp-affliate-manager' ); ?> </option>
        <option value="Enable"> <?php esc_html_e( 'Enable.','ciwcamp-affliate-manager' ); ?> </option>
        <option value="Disable"> <?php esc_html_e( 'Disable','ciwcamp-affliate-manager' ); ?> </option>
        <option value="Banned"> <?php esc_html_e( 'Banned','ciwcamp-affliate-manager' ); ?> </option>
      </select>
      <button id="ciwcamp-affiliate-apply-action" type="button"  class="btn ciwcamp-secondary-color text-white"><?php esc_html_e( 'Apply','ciwcamp-affliate-manager' ); ?> </button>
    <div>
  </form>

  <table id="ciwcamp_affiliates_table" class="table" cellspacing="0" width="100%">
    <thead class="text-white ciwcamp-secondary-color">
      <tr>
        <th><input type='checkbox' id="ciwcamp-select-all-affiliate" /></th>
        <th><?php esc_html_e( 'ID.','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Status','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Name','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Username','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Email','ciwcamp-affliate-manager' ); ?></th>
        <th><?php esc_html_e( 'Action','ciwcamp-affliate-manager' ); ?></th>
      </tr>
    </thead>
  </table>

          <div class="modal fade" id="ciwcamp-reason-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              
              <form id="ciwcamp-reason-form">
              <div class="modal-content">
                
                <div class="modal-body">
                  <div class="form-group">
                      <label for="ciwcamp-reason"><?php esc_html_e( 'Add reason (Optional)','ciwcamp-affliate-manager' ); ?></label>
                    <textarea class="form-control" id="ciwcamp-action-reason" rows="5"></textarea>
                  </div>
                </div>
                <div modal-footer>
                  <button type="button" class="stylish-color-dark border border-primary text-white" id="ciwcamp-apply-action-with-reason">
                  <?php esc_html_e( 'Apply Action','ciwcamp-affliate-manager' ); ?>
                    </button>
                </div>
              </div>
              </form>
              
            </div>
          </div>
      </div>
    </div>
  </form>
</div>
