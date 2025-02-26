jQuery(function ($) {
    setTimeout(function () {
        // Parse JSON string to JavaScript object
        var data = JSON.parse(sm.jsonData);
        
        callSmartBox(data);
    }, 2000);

    function callSmartBox(data) {
        if (data["MID"] === "" || data["TID"] === "") {
            document.getElementById("Error").style.display = "block";
            return;
        }
        console.log(data);
        SmartBox.Checkout.configure = {
            ...data,

            completeCallback: function (data) {

                var dateResponse = data.data.data;
                window.location = sm.callback + '&amount=' + dateResponse.amount + '&currencyId=' + dateResponse.currencyId + '&customerId=' + dateResponse.customerId + '&customerTokenId=' + dateResponse.customerTokenId + '&merchantReference=' + dateResponse.merchantReference + '&responseCode=' + data.data.responseCode + '&transactionId=' + dateResponse.transactionId + '&transactionTime=' + dateResponse.transactionTime + '&secureHashValue=' + dateResponse.secureHashValue;
            },
            errorCallback: function (data) {

            },
            cancelCallback: function () {

            },
        };

        SmartBox.Checkout.showSmartBox()
    }
});