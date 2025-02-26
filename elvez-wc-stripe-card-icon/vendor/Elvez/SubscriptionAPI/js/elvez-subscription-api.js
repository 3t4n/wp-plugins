(function( $ ) {
	'use strict';
	/**
	 * Version 1.0.3
	 */
	$(document).ready( function() {
		const selector = '#elvez-subscription-api-form';
        /**
         * API Components
         */
        var VuePostMixin = {
            methods: {
                post: function(url, params, success_callback=null, failure_callback=null) {
                    axios.post(url, params)
                    .then( function(res) {
                        if ( success_callback ) {
                            // Apply callback function. Args should be into array.
                            this[success_callback].apply(this, [res]);
                        }
                    }.bind(this))
                    .catch( function(res) {
                        if ( failure_callback ) {
                            // Apply callback function. Args should be into array.
                            this[failure_callback].apply(this, [res]);
                        }
                    }.bind(this))
                    .finally( function() {
                        /**
                         * TODO: add callback function
                         */
                    }.bind(this))
                },
                ajax_post( api, args, success_callback=null, failure_callback=null) {
                    var params =  new FormData();
                    Object.keys(args).forEach( function(key) {
                        params.append( key, args[key] );
                    });

                    params.append('action', api.action);
                    params.append('nonce', api.nonce);

                    this.post(api.api, params, success_callback, failure_callback);
                },
                is_post_success(res) {
                    if ( res.data && res.data.result ) {
                        const result = res.data.result;
                        if (result == 'SUCCESS') {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }
            }
		}
		/**
		 * Plugin Component
		 */
		const ElvSubscriptionAPIForm = Vue.extend({
            mixins: [VuePostMixin],
            data() {
                return {
					status: null,
					domain: null,
					is_registered: null,
					email: null,
					product_id: null,
					subscription_id: null,
					subscribe_url: null,
					contact_url: 'https://shop.elvez.co.jp',
					notification: '',
					get_failed: false,
					register_button_text: ELVEZ_SUBSCRIPTION_API_FORM_TEXT.register_button_text,
					deregister_button_text: ELVEZ_SUBSCRIPTION_API_FORM_TEXT.deregister_button_text,
					subscribe_link_text: ELVEZ_SUBSCRIPTION_API_FORM_TEXT.subscribe_link_text,
					contact_link_text: ELVEZ_SUBSCRIPTION_API_FORM_TEXT.contact_link_text,
					sent_confirm_email_message: ELVEZ_SUBSCRIPTION_API_FORM_TEXT.sent_confirm_email_message,
					failed_confirm_email_message: ELVEZ_SUBSCRIPTION_API_FORM_TEXT.failed_confirm_email_message,
                };
            },
            computed: {
				is_subscribed(){
					return this.status == 'active';
				},
				button_text(){
					if ( this.is_registered ) {
						return this.deregister_button_text;
					} else {
						return this.register_button_text;
					}
				},
				message() {
					let message = '';
					if ( this.get_failed ) {
						return ELVEZ_SUBSCRIPTION_API_FORM_TEXT.get_failed;
					} else if ( this.status == null) {
						return ELVEZ_SUBSCRIPTION_API_FORM_TEXT.now_confirming;
					} else if ( this.is_registered ) {
						return ELVEZ_SUBSCRIPTION_API_FORM_TEXT.enabled_and_registered;
					} else if( this.is_subscribed && this.domain ) {
						return ELVEZ_SUBSCRIPTION_API_FORM_TEXT.enabled_but_in_used;
					} else if( this.is_subscribed ) {
						return ELVEZ_SUBSCRIPTION_API_FORM_TEXT.enabled_but_not_registered;
					} else {
						return ELVEZ_SUBSCRIPTION_API_FORM_TEXT.subscription_not_found;
					}
				},
            },
            watch: {
            },
			methods: {
				/**
				 * Trigger event
				 */
				trigger_got_status(){
					const data = {
						status: this.status,
						domain: this.domain,
						is_registered: this.is_registered,
					}
					$(document).trigger('elv.subscription_api.got_status', [data]);
				},
				/**
				 * Get Status
				 */
				get_status(){
					/** Reset status */
					this.get_failed = false;
					this.status = null;
					this.domain = null;
					this.is_registered = null;

                    const api = ELVEZ_SUBSCRIPTION_API_GET_STATUS;
                    const args = {
						email: this.email,
						product_id: this.product_id,
						subscription_id: this.subscription_id,
					}
                    this.ajax_post(api, args, 'get_status_success', 'get_status_failure');
				},
				get_status_success(res){
					if ( this.is_post_success(res) ) {
                        this.status = res.data['status'];
                        this.domain = res.data['domain'];
						this.is_registered = res.data['is_registered'];
						this.trigger_got_status();
                    } else {
                        this.get_status_failure(res);
                    }
				},
				get_status_failure(res={}){
					console.log('Failed get status');
					this.get_failed = true;
				},
				/**
				 * Register Domain
				 */
				register_domain(){
					this.disable_submit();
                    const api = ELVEZ_SUBSCRIPTION_API_REGISTER_DOMAIN;
                    const args = {
						email: this.email,
						product_id: this.product_id,
						subscription_id: this.subscription_id,
					}
                    this.ajax_post(api, args, 'register_domain_success', 'register_domain_failure');
				},
				register_domain_success(res){
					if ( this.is_post_success(res) ) {
						this.notification = this.sent_confirm_email_message;
						this.get_status();
                    } else {
                        this.register_domain_failure(res);
                    }
				},
				register_domain_failure(res={}){
					console.log('Failed to register domain');
					this.notification = this.failed_confirm_email_message;
				},
				/**
				 * Register Domain
				 */
				deregister_domain(){
					this.disable_submit();
                    const api = ELVEZ_SUBSCRIPTION_API_DEREGISTER_DOMAIN;
                    const args = {
						email: this.email,
						product_id: this.product_id,
						subscription_id: this.subscription_id,
					}
                    this.ajax_post(api, args, 'deregister_domain_success', 'deregister_domain_failure');
				},
				deregister_domain_success(res){
					if ( this.is_post_success(res) ) {
						this.notification = this.sent_confirm_email_message;
                    } else {
                        this.deregister_domain_failure(res);
                    }
				},
				deregister_domain_failure(res={}){
					console.log('Failed to register domain');
					this.notification = this.failed_confirm_email_message;
				},
				disable_submit() {
					this.get_failed = false;

					const $input = $(this.$el).find('input');
					$input.prop("disabled", true);
					setTimeout( function() {
						$($input).prop("disabled", false);
					}, 5000);
				},
			},
			mounted(){
				this.email = $(this.$el).data('email');
				this.product_id = $(this.$el).data('product_id');
				this.subscription_id = $(this.$el).data('subscription_id');
				this.subscribe_url = $(this.$el).data('subscribe_url');
				this.get_status();
			},
		})

		/**
		 * Mount Componet
		 */
		$(selector).each( function(index, element){
            const v = new ElvSubscriptionAPIForm().$mount(element);
        });

		/**
		 * Subscription event handler
		 */
		$(document).on('elv.subscription_api.got_status', function(event, data){
			if ( data.is_registered ) {
				$('.elv-need-subscribe').removeAttr('disabled');
			} else {
				$('.elv-need-subscribe').attr({disabled: 'disabled'});
			}
		});

		$('.elv-need-subscribe').after('<span class="elv-subscribe-icon"></span>');

	})

})( jQuery );
