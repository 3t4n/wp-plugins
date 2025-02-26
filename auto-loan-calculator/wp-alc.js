function hide_divs() {
	document.getElementById('new_auto_loan').style.display = 'none';
	document.getElementById('used_auto_loan').style.display = 'none';
}

window.onload = hide_divs; 
		
		
function toggleLayer(value){
	if(value == 'on' || value === true){
	document.getElementById('used_radio_button').checked = true;
	document.getElementById('used_auto_loan').style.display = 'block';
	document.getElementById('new_auto_loan').style.display = 'none';
	}
	else if(value == 'off' || value === false){
	document.getElementById('new_radio_button').checked = true;
	document.getElementById('used_auto_loan').style.display = 'none';
	document.getElementById('new_auto_loan').style.display = 'block';
	}
}
			
function Validate_new(){	    
	newPurchasePrice = document.getElementById('alc_new_purchase_price').value;
	newDownPayment = document.getElementById('alc_new_down_payment').value; 
	newLoanInterest = document.getElementById('alc_new_interest').value;
	if (isNaN(newPurchasePrice)){
		alert('Purchase price must be a number (no dollar signs or commas).');
	 	}	else if (newPurchasePrice== ''){
	 	alert('No purchase price was entered.');
	 	}	else {
		document.getElementById('alc_new_purchase_price').value=newPurchasePrice;
	 	}
	if (isNaN(newDownPayment)){
	 	alert('Down payment must be a number (no dollar signs or commas).');
	 	}	else if (newDownPayment == ''){
	 	alert('No down payment was entered.');
	 	}	else {
		document.getElementById('alc_new_down_payment').value=newDownPayment;
	 	}
	if (isNaN(newLoanInterest)){
	 	alert('Interest must be a number (no dollar signs or commas).');
	 	}	else if (newLoanInterest == ''){
	 	alert('No interest rate was entered.');
	 	}	else {					document.getElementById('alc_new_interest').value=newLoanInterest;
	 	}
}

function Validate_used(){	    
	usedPurchasePrice = document.getElementById('alc_used_purchase_price').value;
	usedDownPayment = document.getElementById('alc_used_down_payment').value; 
	usedLoanInterest = document.getElementById('alc_used_interest').value;
	if (isNaN(usedPurchasePrice)){
		alert('Purchase price must be a number (no dollar signs or commas).');
	 	}	else if (usedPurchasePrice== ''){
	 	alert('No purchase price was entered.');
	 	}	else {
		document.getElementById('alc_used_purchase_price').value=usedPurchasePrice;
	}
	if (isNaN(usedDownPayment)){
	 	alert('Down payment must be a number (no dollar signs or commas).');
	 	}	else if (usedDownPayment == ''){
	 	alert('No down payment was entered.');
	 	}	else {					document.getElementById('alc_used_down_payment').value=usedDownPayment;
	}
	if (isNaN(usedLoanInterest)){
		alert('Interest must be a number (no dollar signs or commas).');
	 	}	else if (usedLoanInterest == ''){
	 	alert('No interest rate was entered.');
	 	}	else {
		document.getElementById('alc_used_interest').value=usedLoanInterest;				
	 	}
}

function Calculate_new() {
	newPurchasePrice = document.getElementById('alc_new_purchase_price').value;
	newDownPayment = document.getElementById('alc_new_down_payment').value; 
	newLoanInterest = document.getElementById('alc_new_interest').value;
	newLoanLength = document.getElementById('alc_new_months').value/12;		
	//these are the calculations	    
	loanAmount = newPurchasePrice-newDownPayment;
	periodInterest = (newLoanInterest/100)/12;
	paymentsNumber = 12*newLoanLength;
	paymentValue = Math.floor((loanAmount*periodInterest)/(1-Math.pow((1+periodInterest),(-1*paymentsNumber)))*100)/100;
	if (!isNaN(paymentValue) && (paymentValue != Number.POSITIVE_INFINITY) && (paymentValue != Number.NEGATIVE_INFINITY)) {
		document.getElementById('alc_new_monthlyPayment').value=paymentValue;
	    } else {
	    document.getElementById('alc_new_monthlyPayment')='';
	}
}
	    
function Calculate_used() {
	usedPurchasePrice = document.getElementById('alc_used_purchase_price').value;
	usedDownPayment = document.getElementById('alc_used_down_payment').value; 
	usedLoanInterest = document.getElementById('alc_used_interest').value;
	usedLoanLength = document.getElementById('alc_used_months').value/12;
	//these are the calculations	    
	loanAmount = usedPurchasePrice-usedDownPayment;
	periodInterest = (usedLoanInterest/100)/12;
	paymentsNumber = 12*usedLoanLength;
	paymentValue = Math.floor((loanAmount*periodInterest)/(1-Math.pow((1+periodInterest),(-1*paymentsNumber)))*100)/100;
	if (!isNaN(paymentValue) && (paymentValue != Number.POSITIVE_INFINITY) && (paymentValue != Number.NEGATIVE_INFINITY)) {
		document.getElementById('alc_used_monthlyPayment').value=paymentValue;
	    } else {
	    document.getElementById('alc_used_monthlyPayment')='';
	}
}
