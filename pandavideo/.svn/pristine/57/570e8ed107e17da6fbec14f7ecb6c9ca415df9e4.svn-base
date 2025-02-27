Sentry.init({
	dsn: 'https://723d8397c63643e796acaf8037069551@o1279024.ingest.sentry.io/4504000592478208',
	release: `panda-elementor-plugin@${pandaWpInfo.panda_plugin_version}`,
	tracesSampleRate: 0,
	beforeSend: function(event) {
		if (event.level === 'bugReport') {
			return event;
		}
		return;
	},
	normalizeDepth: 5
});

window.addEventListener('elementor/init', () => {
	var reportView = elementor.modules.controls.BaseData.extend({
		reportButtonElement: undefined,
		initialReportButtonText: undefined,
		pluginInfo: {},
		hasReported: false,
		filterAttributes(obj) {
			const finalObj = {};
			const objKeys = Object.keys(obj).filter(key => key[0] !== '_' && !key.includes('motion'));
			objKeys.forEach(key => {
				finalObj[key] = obj[key];
			});
			return finalObj;
		},
		setupInstalledPlugins() {
			const installedPlugins = {};
			const installedPluginsKeys = Object.keys(pandaWpInfo.installed_plugins);
			installedPluginsKeys.forEach(pluginName => {
				installedPlugins[pluginName] = `${pandaWpInfo.installed_plugins[pluginName].Version}`
			});
			pandaWpInfo.installed_plugins = installedPlugins;
		},
		setupPluginInfo() {
			const _this = this;
			this.setupInstalledPlugins();
			this.pluginInfo = {
				elementorEditorInitialSettings: _this.elementorEditorInitialSettings,
				elementorEditorFinalSettings: _this.elementorEditorFinalSettings,
				installedPlugins: pandaWpInfo.installed_plugins,
				wpVersion: pandaWpInfo.wp_version,
				siteUrl: window.location.href
			};
		},
		onReady() {
			const _this = this;
			this.reportButtonElement = this.el.querySelector('.panda-report-bug--button');
			this.reportedButtonElement = this.el.querySelector('.panda-reported-bug--button');
			this.initialReportButtonText = this.reportButtonElement.innerHTML;
			this.elementSettingsModel.changed = {};
			this.elementorEditorInitialSettings = {
				attributes: _this.filterAttributes(_this.elementSettingsModel.attributes)
			};

			this.reportButtonElement.onclick = function() {
				if (_this.hasReported) return;
				
				_this.hasReported = true;
				if (Object.keys(_this.elementSettingsModel.changed).length) {
					_this.elementorEditorFinalSettings = {
						attributes: _this.filterAttributes(_this.elementSettingsModel.attributes),
						changed: _this.elementSettingsModel.changed
					};
				} else {
					_this.elementorEditorFinalSettings = {
						attributes: _this.filterAttributes(_this.elementSettingsModel.attributes)
					};
				}
				
				_this.setupPluginInfo();
				
				Sentry.withScope(function(scope) {
                    scope.setTag('section', 'report plugin');
                    scope.setLevel('bugReport');
                    Sentry.addBreadcrumb({
                        category: 'user/plugin info',
                        message: 'Report data -> ',
						data: _this.pluginInfo,
                        level: 'info',
                    });
                    Sentry.captureException(new Error(`USER PLUGIN REPORT`));
                });
				_this.reportButtonElement.style.display = 'none';
				_this.reportedButtonElement.style.display = 'block';
			};
		}
	});

	elementor.addControlView('panda-report-bug', reportView);
});