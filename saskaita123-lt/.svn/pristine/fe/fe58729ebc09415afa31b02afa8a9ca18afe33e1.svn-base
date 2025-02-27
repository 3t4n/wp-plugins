jQuery(function ($) {
  const companyNameInput = $("#_billing_company_name_field");
  const companyCodeInput = $("#_billing_company_code_field");
  const companyVatCodeInput = $("#_billing_company_vat_code_field");

  companyNameInput.hide();
  companyCodeInput.hide();
  companyVatCodeInput.hide();

  $('#_invoice_for_company').on('click', function () {
    if (this.checked) {
      companyNameInput.show();
      companyCodeInput.show();
      companyVatCodeInput.show();
    } else {
      companyNameInput.hide();
      companyCodeInput.hide();
      companyVatCodeInput.hide();
    }
  });
});