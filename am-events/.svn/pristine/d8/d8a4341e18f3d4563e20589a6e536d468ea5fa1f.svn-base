jQuery(function($) {

	var AmEventsLanguage = {
		firstDayOfWeek: 1,
		weekdays: {
			shorthand: [
				localization.dayNameShortSun,
				localization.dayNameShortMon,
				localization.dayNameShortTue,
				localization.dayNameShortWed,
				localization.dayNameShortThu,
				localization.dayNameShortFri,
				localization.dayNameShortSat
			],
			longhand: [
				localization.dayNameFullSun,
				localization.dayNameFullMon,
				localization.dayNameFullTue,
				localization.dayNameFullWed,
				localization.dayNameFullThu,
				localization.dayNameFullFri,
				localization.dayNameFullSat
			],
		},
		months: {
			shorthand: [
				localization.januaryShort,
				localization.februaryShort,
				localization.marchShort,
				localization.aprilShort,
				localization.mayShort,
				localization.juneShort,
				localization.julyShort,
				localization.augustShort,
				localization.septemberShort,
				localization.octoberShort,
				localization.novemberShort,
				localization.decemberShort,
			],
			longhand: [
				localization.january,
				localization.february,
				localization.march,
				localization.april,
				localization.may,
				localization.june,
				localization.july,
				localization.august,
				localization.september,
				localization.october,
				localization.november,
				localization.december
			],
		}
	};

	// REPEAT INPUTS
	jQuery('#am_recurrent').click(function() {
		jQuery('#am_recurrent_fields')[this.checked ? "show" : "hide"]();
	});

	// DATETIME PICKERS
	var flatpickrOptions = {
		enableTime: true,
		time_24hr: true,
		allowInput: true,
		locale: AmEventsLanguage,
		minuteIncrement: parseInt(event_data.minuteStep)
	};

	var startPicker = $('#am_startdate').flatpickr(Object.assign(flatpickrOptions, {
		onChange: function(selectedDates, dateStr, instance) {
			if (selectedDates[0] != null && (endPicker.selectedDates[0] == null || endPicker.selectedDates[0] < selectedDates[0])) {
				endPicker.setDate(selectedDates[0]);
			}
	  }
	}));

	var endPicker = $('#am_enddate').flatpickr(Object.assign(flatpickrOptions, {
		onChange: function(selectedDates, dateStr, instance) {
			if (selectedDates[0] != null && (startPicker.selectedDates[0] == null || selectedDates[0] < startPicker.selectedDates[0])) {
				startPicker.setDate(selectedDates[0]);
			}
	  }
	}));

	startPicker.setDate(event_data.startDate);
	endPicker.setDate(event_data.endDate);

	startPicker.set();


});
