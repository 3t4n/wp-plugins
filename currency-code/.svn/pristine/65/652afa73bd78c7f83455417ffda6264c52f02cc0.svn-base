var amount;
var from;
var to;

// Convert currency

var run_conv = function(data) {
    fx.rates = data.rates;
    var rate = fx(amount).from(from).to(to);
  
    var display = amount + ' ' + from + ' = ' + rate.toFixed(2) + ' ' + to;
};

$.getJSON("http://api.fixer.io/latest", run_conv);