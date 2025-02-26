(function () {

    'use strict';

    Vue.component('plugin-item-registered', {
        template: '#shopcred-plugin-item-registered',

        props: {
            pluginData: Object,
        },

        data: function () {
            return {
                usefulLinksToggle: false
            }
        },

        computed: {

            itemClass: function () {
                return [
                    'plugin-item',
                    'plugin-item--registered',
                    this.dropdownVisible ? 'dropdown-visible' : ''
                ];
            },

            usefulLinksEmpty: function () {
                return 0 === this.pluginData.usefulLinks.length;
            },

            mainLinkItem: function () {

                if (!this.usefulLinksEmpty) {
                    let firstItem = this.pluginData.usefulLinks[0];

                    return {
                        'url': firstItem.url,
                        'label': firstItem.label,
                        'target': firstItem.target,
                    };
                }

                return {
                    'url': this.pluginData.docs,
                    'label': __('Go to docs', 'shopcred'),
                    'target': '_blank'
                };
            },

            dropdownLinkItems: function () {
                let usefulLinks = this.pluginData.usefulLinks;

                return usefulLinks;
            },

            dropdownAvaliable: function () {
                return 1 < this.dropdownLinkItems.length;
            },

            dropdownVisible: function () {
                return this.usefulLinksToggle && 1 < this.dropdownLinkItems.length;
            },
        },

        methods: {
            mouseoverHandle: function () {
                this.usefulLinksToggle = true;
            },

            mouseleaveHandle: function () {
                this.usefulLinksToggle = false;
            },
        }
    });

    Vue.component('offers-item', {
        template: '#shopcred-offers-item',

        props: {
            config: Object,
        },

        data: function () {
            return {}
        },

        computed: {
            itemClass: function () {
                return [
                    'offers-item',
                ];
            },
            configDefined: function () {
                return this.config;
            },
            logo: function () {
                return this.configDefined && this.config['logo'] ? this.config['logo'] : false;
            },
            name: function () {
                return this.configDefined && this.config['name'] ? this.config['name'] : false;
            },
            desc: function () {
                return this.configDefined && this.config['desc'] ? this.config['desc'] : false;
            },
            actionConfig: function () {
                return this.configDefined && this.config['actionUrl'] && this.config['actionLabel'] ? {
                    url: this.config['actionUrl'],
                    label: this.config['actionLabel']
                } : false;
            },
        },
    });

    Vue.component('extras-item', {
        template: '#shopcred-extras-item',

        props: {
            config: Object,
        },

        data: function () {
            return {
                adminUrl: window.shopcredDashboardConfig.adminUrl || '#',
                userPlugins: window.shopcredDashboardConfig.userPlugins || {},
            }
        },

        computed: {
            itemClass: function () {
                return [
                    'extras-item',
                ];
            },
            configDefined: function () {
                return this.config || false;
            },
            logo: function () {
                return this.configDefined && this.config['logo'] ? this.config['logo'] : false;
            },
            name: function () {
                return this.configDefined && this.config['name'] ? this.config['name'] : false;
            },
            desc: function () {
                return this.configDefined && this.config['desc'] ? this.config['desc'] : false;
            },
            actionType: function () {
                return this.configDefined && this.config['actionType'] ? this.config['actionType'] : 'external';
            },
            requirementPlugin: function () {
                return this.configDefined && this.config['requirementPlugin'] ? this.config['requirementPlugin'] : false;
            },
            actionConfig: function () {
                let actionConfig = false;

                switch (this.actionType) {

                    case 'external':
                        actionConfig = this.configDefined && this.config['externalUrl'] && this.config['externalLabel'] ? {
                            url: this.config['externalUrl'],
                            label: this.config['externalLabel'],
                            target: '_blank'
                        } : false;
                        break;

                    case 'dashboard':

                        if (this.requirementPlugin && this.userPlugins.hasOwnProperty(this.requirementPlugin) && this.userPlugins[this.requirementPlugin].isActivated) {
                            actionConfig = this.configDefined && this.config['dashboardUrl'] && this.config['dashboardLabel'] ? {
                                url: this.adminUrl + this.config['dashboardUrl'],
                                label: this.config['dashboardLabel'],
                                target: '_self'
                            } : false;
                        } else {
                            actionConfig = this.configDefined && this.config['externalUrl'] && this.config['externalLabel'] ? {
                                url: this.config['externalUrl'],
                                label: this.config['externalLabel'],
                                target: '_blank'
                            } : false;
                        }
                        break;
                }

                return actionConfig;
            },
        },
    });

    Vue.component('welcome-page', {

        template: '#shopcred-dashboard-welcome-page',

        props: {
            subpage: [String, Boolean]
        },

        data: function () {
            return {
                categoryList: window.ShopcredDashboardConfig.categoryList || [],
                proccesingState: false

            };
        },

        mounted: function () {
            window.ShopcredDashboardEventBus.$on('settingsPage/navigateHandler', this.navigateHandler);
        },

        computed: {
            innerComponentConfig: function () {
                let innerComponentConfig = this.$root.pageConfig['inner-component'] || false,
                    bannersData = this.$root.getBannerListForArea(innerComponentConfig);

                innerComponentConfig = Object.assign(innerComponentConfig, {
                    bannersData: bannersData
                });

                return innerComponentConfig;
            },  
            innerComponentConfigCategory: function () {
                let innerComponentConfigCategory = this.$root.pageConfig['shopcred-admin-category'] || false,
                    bannersData = this.$root.getBannerListForArea(innerComponentConfigCategory);

                    innerComponentConfigCategory = Object.assign(innerComponentConfigCategory, {
                    bannersData: bannersData
                });

                return innerComponentConfigCategory;
            },

        },

        methods: {
            getLicenseExpireMessage: function (rawDate = '') {
                let convertedDate = this.convertDateFormat(rawDate),
                    expireCases = [
                        '0000-00-00 00:00:00',
                        '1000-01-01 00:00:00',
                        'lifetime'
                    ];

                if (expireCases.includes(rawDate)) {
                    return __('<b class="lifetime">Lifetime</b>', 'shopcred');
                }

                return sprintf(__('Licence expires <b class="expire-date">%s</b>', 'shopcred'), convertedDate);
            },

            convertDateFormat: function (_date = '') {
                let lifetimeCases = [
                    '0000-00-00 00:00:00',
                    '1000-01-01 00:00:00',
                    'lifetime'
                ],
                    rawDate = lifetimeCases.includes(_date) ? '1000-01-01 00:00:00' : _date,
                    timeStamp = Date.parse(rawDate),
                    dateTimeFormat = new Intl.DateTimeFormat('en', { year: 'numeric', month: 'short', day: '2-digit' }),
                    [{ value: month }, , { value: day }, , { value: year }] = dateTimeFormat.formatToParts(timeStamp),
                    convertedDate = `${month}. ${day}, ${year}`;

                return convertedDate;
            },

            pluginAction: function (plugin_file, action) {

            },

            toggleHandler: function (moduleSlug) {
                this.fold = !this.fold;
            },

            navigateHandler: function (link, moduleSlug, category) {

                window.ShopcredDashboardEventBus.$emit('settingsPage/navigateHandler', {
                    'link': link,
                    'moduleSlug': moduleSlug,
                    'category': category,
                });
            },
            navigateHandler: function (payload) {
                let link = payload.link || false,
                    moduleSlug = payload.moduleSlug || false,
                    category = payload.category || false;

                if (!link || !moduleSlug) {
                    return false;
                }

                if (moduleSlug !== this.$root.subPageModule) {
                    this.proccesingState = true;
                    Shopcred.setLocalStorageData('activeSettingsCategory', category);
                    window.open(link, '_self');
                }
            }

        }
    });
    

    Vue.component('plugin-settings-toggle', {

        template: '#shopcred-dashboard-plugin-settings-toggle',

        props: {
            config: [Object, Boolean]
        },

        data: function () {
            return {
                fold: false,
                pageModule: this.$root.pageModule || false,
                subPageModule: this.$root.subPageModule || false,
            };
        },

        mounted: function () {
            let activeSettingsCategory = Shopcred.getLocalStorageData('activeSettingsCategory', false);

            if (this.config.hasOwnProperty('moduleList')) {
                let moduleCheck = this.config.moduleList.some((moduleData) => {
                    return moduleData.page === this.subPageModule;
                });

                if (moduleCheck) {
                    this.fold = true;
                }
            }
        },

        computed: {
            linksList: function () {
                return this.config.moduleList;
            },
            islinksEmpty: function () {
                return 0 !== this.linksList.length;
            },
            linksVisible: function () {
                return this.fold && this.islinksEmpty;
            }
        },

        methods: {
            toggleHandler: function (moduleSlug) {
                this.fold = !this.fold;
            },

            navigateHandler: function (link, moduleSlug, category) {

                window.ShopcredDashboardEventBus.$emit('settingsPage/navigateHandler', {
                    'link': link,
                    'moduleSlug': moduleSlug,
                    'category': category,
                });
            },

            isActiveLink: function () {
				if (this.config.hasOwnProperty('moduleList')) {
					let categoryCheckActive = this.config.moduleList.some((moduleData) => {
						return moduleData.page === this.subPageModule;
					});
	
					if (categoryCheckActive) {
						return true;
					}
				}
            }
        }
    });

    Vue.component('shopcred-admin-category', {

		template: '#shopcred-dashboard-shopcred-admin-category',

		props: {
			subpage: [String, Boolean]
		},

		data: function () {
			return {
				categoryList: window.ShopcredDashboardConfig.categoryList || [],
				proccesingState: false
			};
		},

		mounted: function () {
			window.ShopcredDashboardEventBus.$on('settingsPage/navigateHandler', this.navigateHandler);
		},

		methods: {
			navigateHandler: function (payload) {
				let link = payload.link || false,
					moduleSlug = payload.moduleSlug || false,
					category = payload.category || false;

				if (!link || !moduleSlug) {
					return false;
				}

				if (moduleSlug !== this.$root.subPageModule) {
					this.proccesingState = true;
					Shopcred.setLocalStorageData('activeSettingsCategory', category);
					window.open(link, '_self');
				}
			}
		}
	});


})();
