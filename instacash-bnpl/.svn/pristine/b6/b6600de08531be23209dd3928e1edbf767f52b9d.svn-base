let instaCashProductBnpl = new function () {

  // Nodes.
  this.prescore = document.getElementById("prescore-block");
  this.info = document.getElementById("ic-offer-display");
  this.errors = document.getElementById("ic-error-display");
  this.modal = document.getElementById("InstaCash-modal");
  this.btn = document.getElementById("productCalculationModal");
  this.cta = document.getElementById("instacash-cart-trigger");
  this.quantity = document.querySelector("input[name=quantity]");

  this.timer = null;
  this.delay = 100;

  // Request data from the API when we reach the offer limit.
  this.XhrRequest = function (formData)
  {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == xhr.DONE && this.status == 200) {
        instaCashProductBnpl.displayLoanData(formData, JSON.parse(this.responseText));
        instaCashProductBnpl.info.style.display = "";
        instaCashProductBnpl.errors.style.display = "none";
      }
      if (this.readyState == xhr.DONE && this.status == 503) {
        var response = JSON.parse(this.responseText);
        if (response.data.message) {
          instaCashProductBnpl.displayErrors(response.data.message);
        }
      }
    };
    xhr.open("POST", window.atob(BNPLObject.calculator), true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(instaCashProductBnpl.serializeObject(formData));
  }

  // Display requested data.
  this.displayLoanData = function (formData, response)
  {
    BNPLObject.condition.min = response.condition.min;
    BNPLObject.condition.max = response.condition.max;
    var installments = 0 < parseInt(response.calculation.downPayment)
      ? response.calculation.payments.length - 1
      : response.calculation.payments.length;
    var aprDecimal = 0 == response.calculation.thm ? 0 : 2;

    this.info.querySelector("#bnpl-one-line").innerHTML = response.one_line;
    this.modal.querySelector(".payments").innerHTML = '';
    this.modal.querySelector(".offer-apr strong").innerHTML = response.calculation.thm.toFixed(aprDecimal);
    this.modal.querySelector(".offer-fee").innerHTML = response.calculation.fee;
    this.modal.querySelector(".offer-total").innerHTML = response.calculation.total;

    if (response.calculation.payments.length > 12) {
        document.querySelector(".payments").classList.add('ic-scrollable');
    } else {
        document.querySelector(".payments").classList.remove('ic-scrollable');
    }

    response.calculation.payments.forEach(function(payment, index){
      var dueDate = null;
      const event = new Date(payment.dueDate);
      const deg = 360 / response.calculation.payments.length;
      const now = (new Date());

      if (event.getMonth() != now.getMonth() || event.getDate() != now.getDate()) {
        dueDate = event.toLocaleDateString(BNPLObject.locale.replace('_', '-'), { year: 'numeric', month: 'long', day: 'numeric' });
      }

      var node = instaCashProductBnpl.modal.querySelector("#payment-container .payment").cloneNode(true);

      if (null !== dueDate){
        node.querySelector(".date").innerHTML = dueDate;
      }

      node.querySelector(".pay").innerHTML = payment.sum;
      node.querySelector(".payment-circle").style.setProperty('--progress', deg * index + "deg");
      node.querySelector(".payment-circle").style.setProperty('--progress-dark', deg * index + "deg " + deg * (index + 1) + "deg");
      instaCashProductBnpl.modal.querySelector(".payments").appendChild(node);
    })

    if(instaCashProductBnpl.prescore){
      instaCashProductBnpl.prescore.querySelector(".ps-num").innerHTML = response.calculation.total;

      let url = new URL(instaCashProductBnpl.prescore.querySelector("a").href);
      let params = new URLSearchParams(url.search);
      params.set("amount", response.calculation.prescoreTotal.toFixed(0));
      url.search = params.toString()
      instaCashProductBnpl.prescore.querySelector("a").href = url.toString();
    }
  }

  // Display errors when happend.
  this.displayErrors = function (error)
  {
    this.errors.style.display = "none";

    if(error != null && typeof error == "string") {
      this.errors.innerText = error;
      this.errors.style.display = "block";
      this.info.style.display = "none";
    }
  }

  // Make serialized string from object.
  this.serializeObject = function (obj)
  {
    var serialized = [];
    for (var key in obj) {
      if (obj.hasOwnProperty(key)) {
        serialized.push(encodeURIComponent(key) + '=' + encodeURIComponent(obj[key]));
      }
    }
    return serialized.join('&');
  };

  // New calculation.
  this.reCalculate = function (subtotal = null)
  {
    if (subtotal !== null && typeof subtotal !== 'number') {
      switch (typeof subtotal) {
        case "string":
          subtotal = parseInt(subtotal.match(/\d/g).join(""));
          break;
        case "object" :
          subtotal = parseInt(subtotal.innerText.match(/\d/g).join(""));
          break;
      }
    }

    let offer = JSON.parse(BNPLObject.offer);
    let basePrice = parseInt(instaCashProductBnpl.btn.dataset.basePrice * instaCashProductBnpl.quantity.value);
    let price = subtotal && (subtotal > basePrice) ? subtotal : parseInt(basePrice);

    // Request an offer if the amount is greater than the displayed offer.
    let formData = {
      productId: instaCashProductBnpl.btn.dataset.productId,
      subtotal: price,
      offer: BNPLObject.offer,
      min: BNPLObject.condition.min,
      max: BNPLObject.condition.max
    };

    instaCashProductBnpl.XhrRequest(formData);
    return;
  }

  // Add eventListeners.
  this.listen = function ()
  {
    document.addEventListener(
      "DOMContentLoaded",
      function() {
        if(instaCashProductBnpl.btn) {
          instaCashProductBnpl.btn.onclick = function(event) {
            event.preventDefault();
            instaCashProductBnpl.modal.style.display = "block";
          }
        }

        if(instaCashProductBnpl.cta) {
          instaCashProductBnpl.cta.onclick = function(event) {
            event.preventDefault();
            document.querySelector(".single_add_to_cart_button").click();
          }
        }

        if(instaCashProductBnpl.modal) {
          instaCashProductBnpl.modal.querySelector(".close").onclick = function() {
            instaCashProductBnpl.modal.style.display = "none";
          }

          if(instaCashProductBnpl.quantity) {
            instaCashProductBnpl.quantity.onchange = function(event){
                clearTimeout(instaCashProductBnpl.timer);
                instaCashProductBnpl.timer = setTimeout(instaCashProductBnpl.reCalculate, instaCashProductBnpl.delay);
            }
          }

          window.onclick = function(event) {
            if (event.target == instaCashProductBnpl.modal && instaCashProductBnpl.modal.style.display != "none") {
              instaCashProductBnpl.modal.style.display = "none";
            }
          }
        }

      }
    );
  }
}

instaCashProductBnpl.listen();

jQuery(document).ready(function() {
  jQuery( ".variations_form" ).each( function() {
    jQuery(this).on( "found_variation", function( event, variation ) {
      setTimeout(() => {
        clearTimeout(instaCashProductBnpl.timer);
        instaCashProductBnpl.timer = setTimeout(
          instaCashProductBnpl.reCalculate(variation.display_price), 200);
      }, 50);
    });
  });
});
