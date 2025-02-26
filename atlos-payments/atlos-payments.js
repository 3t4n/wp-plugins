
window.onload = () => {
  document.getElementById('atlos_pay_button').onclick = () => {
    atlos.Pay({
      merchantId: atlos_payments_vars.atlosMerchantId,
      orderId: atlos_payments_vars.atlosOrderId,
      orderAmount: parseFloat(atlos_payments_vars.atlosAmount),
      orderCurrency: atlos_payments_vars.atlosCurrency,
      recurrence: atlos_payments_vars.atlosRecurrence,
      theme: atlos_payments_vars.atlosTheme,
      userName: atlos_payments_vars.atlosUserName,
      userEmail: atlos_payments_vars.atlosUserEmail,
      postbackUrl: atlos_payments_vars.atlosPostbackUrl,
      onCompleted: () => { location.reload(); }
    });
  };
};
