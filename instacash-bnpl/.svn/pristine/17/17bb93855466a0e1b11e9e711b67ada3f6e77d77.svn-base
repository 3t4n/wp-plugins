let instaCashBnpl = new function () {
    this.serializeObject = function (obj) {
        var serialized = [];
        for (var key in obj) {
            if (obj.hasOwnProperty(key)) {
                serialized.push(encodeURIComponent(key) + '=' + encodeURIComponent(obj[key]));
            }
        }
        return serialized.join('&');
    };

    this.displayLoanData = function (formData, response)
    {
        // var installments = 0 < parseInt(response.downPayment) ? response.payments.length - 1 : response.payments.length;
        var aprDecimal = 0 == response.thm ? 0 : 2;
        if (response.payments.length > 12) {
            document.querySelector(".payments").classList.add('ic-scrollable');
        } else {
            document.querySelector(".payments").classList.remove('ic-scrollable');
        }
        document.querySelector(".payments").innerHTML = '';
        document.querySelector(".dp-block").style.display = "none";
        document.querySelector(".offer-apr strong").innerHTML = response.thm.toFixed(aprDecimal);
        document.querySelector(".offer-total").innerHTML = response.total;
        document.querySelector(".offer-installments-title").innerHTML = response.payments.length;
        document.querySelector(".offer-installments").innerHTML = response.payments.length;
        document.querySelector(".offer-repay").innerHTML = response.payments[response.payments.length-1].sum;

        if(0 < parseInt(response.downPayment)) {
            document.querySelector(".dp-block").style.display = "";
            document.querySelector(".offer-down-payment").innerHTML = response.downPaymentTotal;
        }

        response.payments.forEach(function(payment, index){
            var dueDate = null;
            const event = new Date(payment.dueDate);
            const deg = 360 / response.payments.length;
            const now = (new Date());

            if (event.getMonth() != now.getMonth() || event.getDate() != now.getDate()) {
                dueDate = event.toLocaleDateString(BNPLObject.locale.replace('_', '-'), { year: 'numeric', month: 'long', day: 'numeric' });
            }

            var node = document.querySelector("#payment-container .payment").cloneNode(true);

            if (null !== dueDate){
                node.querySelector(".date").innerHTML = dueDate;
            }

            node.querySelector(".pay").innerHTML = payment.sum;
            node.querySelector(".payment-circle").style.setProperty('--progress', deg * index + "deg");
            node.querySelector(".payment-circle").style.setProperty('--progress-dark', deg * index + "deg " + deg * (index + 1) + "deg");
            document.querySelector(".payments").appendChild(node);
        })
    }

    this.displayErrors = function (error)
    {
        document.querySelector(".offer-error .error").style.display = "none";

        if(error != null && typeof error == "string") {
            document.querySelector(".offer-error .error").innerText = error;
            document.querySelector(".offer-error .error").style.display = "block";
        } else if(error != null && typeof error == "object") {
            document.querySelector(".offer-error ." + error.wrapper).querySelector(".amount").innerText = error.amount;
            document.querySelector(".offer-error ." + error.wrapper).style.display = "block";
        }
    }

    this.calculateLoanData = function (amount, offerId)
    {

        var formData = {
            amount: amount,
            offerId: offerId,
        };

        instaCashBnpl.XhrRequest(formData);
        return formData.amount;
    }

    this.XhrRequest = function (formData) {
        document.getElementById("bnplOverlay").style.display = "block";
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == xhr.DONE && this.status == 200) {
                instaCashBnpl.displayLoanData(formData, JSON.parse(this.responseText));
                document.getElementById("bnplOverlay").style.display = "none";
            }
            if (this.readyState == xhr.DONE && this.status == 503) {
                var response = JSON.parse(this.responseText);
                if (response.data.message) {
                    instaCashBnpl.displayErrors(response.data.message);
                    document.getElementById("bnplOverlay").style.display = "none";
                }
            }
        };
        xhr.open("POST", BNPLObject.calculator, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(instaCashBnpl.serializeObject(formData));
    }

    if (document.body.classList.contains("woocommerce-order-pay")) {
        document.addEventListener( "DOMContentLoaded", function(){
            instaCashBnpl.calculateLoanData(document.getElementById("totalAmount").value, document.getElementById("offerId").value);
        });
    }
}

jQuery( document.body ).on( "updated_checkout", function(){
    instaCashBnpl.calculateLoanData(document.getElementById("totalAmount").value, document.getElementById("offerId").value);
});
