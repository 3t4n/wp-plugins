var AcimaCredit = {
    isReady: false,
    client: null,
    initClient: function() {
        if (typeof Acima === 'undefined') {
            console.error('AcimaJS SDK is not loaded');
            return;
        }

        this.client = new Acima.Client({
            merchantId: acima_credit_settings.merchant_id,
            source: "retailer",
            platform: "woo_commerce",
            phpVersion: acima_credit_settings.phpVersion,
            pluginVersion: acima_credit_settings.pluginVersion,
            databaseVersion: acima_credit_settings.databaseVersion
        });

        this.isReady = true;
        console.log('AcimaJS Client initialized');
    },
    ajaxCall: function (data, callback) {
        jQuery.post(woocommerce_params.ajax_url, data, callback, 'json');
    }
};

document.addEventListener('DOMContentLoaded', function() {
    AcimaCredit.initClient();
});
