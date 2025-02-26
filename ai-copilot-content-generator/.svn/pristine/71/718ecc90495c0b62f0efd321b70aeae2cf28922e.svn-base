(function ($, app) {
"use strict";
	function SettingsPage() {
		this.$obj = this;
		return this.$obj;
	}
	
	SettingsPage.prototype.init = function () {
		var _this = this.$obj;
		_this.isPro = WAIC_DATA.isPro == '1';
		_this.langSettings = waicParseJSON($('#waicLangSettingsJson').val());
		_this.content = $('.wbw-tabs-content');
		
		_this.eventsSettingsPage();
		if (typeof(_this.initPro) == 'function') _this.initPro();
	}
	
	SettingsPage.prototype.eventsSettingsPage = function () {
		var _this = this.$obj;
		_this.content.find('.wbw-button-save').click(function(e){
			e.preventDefault();
			var $btn = $(this),
				$from = $btn.closest('form');
			$.sendFormWaic({
				elem: $btn,
				data: {
					mod: 'options',
					action: 'saveOptions',
					group: $from.attr('data-group'),
					params: jsonInputsWaic($from, true),
				},
			});
			return false;
		});
		_this.content.find('#waicStartGeneration').click(function(e){
			e.preventDefault();
			var $btn = $(this),
				$from = $btn.closest('form');
			$.sendFormWaic({
				elem: $btn,
				data: {
					mod: 'workspace',
					action: 'runGeneration'
				},
			});
			return false;
		});
		_this.content.find('.wbw-button-cancel').click(function(e){
			e.preventDefault();
			location.reload();
			return false;
		});
		_this.content.find('.wbw-button-restore').click(function(e){
			e.preventDefault();
			waicShowConfirm(waicCheckSettings(_this.langSettings, 'confirm-restore'), 'waicSettingsPage', 'restoreOptions', $(this));
			return false;
		});
	}
	SettingsPage.prototype.restoreOptions = function ($btn) {
		var $from = $btn.closest('form');
		$.sendFormWaic({
			elem: $btn,
			data: {
				mod: 'options',
				action: 'restoreOptions',
				group: $from.attr('data-group')
			},
			onSuccess: function(res) {
				if (!res.error) {
					location.reload();
				}
			}
		});
	}
	
	app.waicSettingsPage = new SettingsPage();

	$(document).ready(function () {
		app.waicSettingsPage.init();
	});

}(window.jQuery, window));
