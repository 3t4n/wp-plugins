jQuery(document).ready(function( $ ) {

    $('#currency_submit').click(function() {

      var amount = $("#currency_amount").val();
      var from = $("#currency_from").val();
      var to = $("#currency_to").val();

      var demo = function(data) {
        fx.base = from;
        fx.rates = data.rates;
        var rate = fx(amount).from(from).to(to);
        var output = amount + ' ' + from + ' = ' + rate.toFixed(2) + ' ' + to;

        $("#currency_result").html(output);
      };

      $.getJSON("https://api.fixer.io/latest?base=" + from, demo);




    });
});