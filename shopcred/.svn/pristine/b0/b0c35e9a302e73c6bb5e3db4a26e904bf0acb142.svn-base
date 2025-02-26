'use strict';

let ShopCredSettinsMixin = {
    data: function () {
        return {
            pageOptions: window.ShopCredSettingsConfig.settingsData,
            preparedOptions: {},
            savingStatus: false,
            ajaxSaveHandler: null,
        };
    },

    watch: {
        pageOptions: {
            handler(options) {
                let prepared = {};

                for (let option in options) {

                    if (options.hasOwnProperty(option)) {
                        prepared[option] = options[option]['value'];
                    }
                }

                this.preparedOptions = prepared;

                this.saveOptions();
            },
            deep: true
        }
    },

    methods: {
        saveOptions: function () {
            var self = this;

            self.savingStatus = true;

            self.ajaxSaveHandler = jQuery.ajax({
                type: 'POST',
                url: window.ShopCredSettingsConfig.settingsApiUrl,
                dataType: 'json',
                data: self.preparedOptions,
                beforeSend: function (jqXHR, ajaxSettings) {

                    if (null !== self.ajaxSaveHandler) {
                        self.ajaxSaveHandler.abort();
                    }
                },
                success: function (responce, textStatus, jqXHR) {
                    self.savingStatus = false;

                    if ('success' === responce.status) {
                        self.$CXNotice.add({
                            message: responce.message,
                            type: 'success',
                            duration: 3000,
                        });
                    }

                    if ('error' === responce.status) {
                        self.$CXNotice.add({
                            message: responce.message,
                            type: 'error',
                            duration: 3000,
                        });
                    }
                }
            });
        },
    }
}

Vue.component('shopcred-available-blocks', {
    template: '#shopcred-dashboard-shopcred-available-blocks',
    mixins: [ShopCredSettinsMixin],
});
Vue.component('shopcred-general-settings', {
    template: '#shopcred-dashboard-shopcred-general-settings',
    mixins: [ShopCredSettinsMixin],
});

Vue.component('shopcred-plugin-dashboard', {
    template: '#shopcred-dashboard-shopcred-plugin-dashboard',
    mixins: [ShopCredSettinsMixin],
});


