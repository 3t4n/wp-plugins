(function ($) {
	'use strict';

	$(function () {
		$("#wp-homeasap-search-master-admin #tabs").tabs({
			collapsible: true,
			active: false,
		});

		// homeasap-idx-search
		$(".homeasap-idx-search-agent-search").on('focus', function () {
			$(this).val('')
		}).autocomplete({
			source: function (request, response) {
				$.ajax({
					url: 'https://api.homeasap.com/NPlay.Services.NPlayApi/api/agentsearch/autocomplete?term=' + encodeURIComponent(request.term) + '&size=10',
					dataType: "json",
					type: "GET",
					success: function (data) {
						response($.map((data || []).filter(function(item){ return !!item.FirstName }), function (item) {
							return {
								label: item.FirstName + ' ' + item.LastName,
								value: item.FirstName + ' ' + item.LastName,
								suggest: item,
							}
						}));
					}
				});
			},
			minLength: 3,
			select: function (event, ui) {
				console.log("Selected: ", ui.item.suggest);
				this.value = '';
				$(this).blur();
				$('.homeasap-idx-search-shortcode-sample-agent').text(ui.item.suggest.Id)
			}
		}).autocomplete("instance")._renderItem = function (ul, item) {
			console.log(item)
			return $("<li class='homeasap-idx-search-agent-search-li'><img src='" + item.suggest.ProfileImage + "'><span>" + item.label + "</span></li>").appendTo(ul);
		};

		$("#wp-homeasap-search-master-admin #tabs-1 .homeasap-idx-search-placeholder").keyup(function () {
			$('.homeasap-idx-search-shortcode-sample-placeholder').text(this.value)
		});

		$("#wp-homeasap-search-master-admin #tabs-1 .display-mode input").click(function () {
			$('.homeasap-idx-search-shortcode-sample-mode').text(this.value)
		});

		$("#wp-homeasap-search-master-admin #tabs-1 .homeasap-idx-search-css").keyup(function () {
			$('.homeasap-idx-search-shortcode-sample-css').text(this.value.replace(/"/g, '\'').replace(/\n/g, ' '))
		});

		$(".homeasap-idx-search-shortcode-button-copy").on('click', function () {
			var copyText = document.getElementById("homeasap-idx-search-shortcode-sample-code").innerText;
			var tempInput = document.createElement("input");
			tempInput.style = "position: fixed; left: -1000px; top: -1000px";
			tempInput.value = copyText;
			document.body.appendChild(tempInput);
			tempInput.select();
			tempInput.setSelectionRange(0, 99999); /*For mobile devices*/
			document.execCommand("copy");
			document.body.removeChild(tempInput);
			alert('Copied!');
			return false
		});

		// homeasap-idx-landing
		$(".homeasap-idx-landing-agent-search").on('focus', function () {
			$(this).val('')
		}).autocomplete({
			source: function (request, response) {
				$.ajax({
					url: 'https://api.homeasap.com/NPlay.Services.NPlayApi/api/agentsearch/autocomplete?term=' + encodeURIComponent(request.term) + '&size=10',
					dataType: "json",
					type: "GET",
					success: function (data) {
						response($.map((data || []).filter(function(item){ return !!item.FirstName }), function (item) {
							return {
								label: item.FirstName + ' ' + item.LastName,
								value: item.FirstName + ' ' + item.LastName,
								suggest: item,
							}
						}));
					}
				});
			},
			minLength: 3,
			select: function (event, ui) {
				console.log("Selected: ", ui.item.suggest);
				this.value = '';
				$(this).blur();
				$('.homeasap-idx-landing-shortcode-sample-agent').text(ui.item.suggest.Id)
			}
		}).autocomplete("instance")._renderItem = function (ul, item) {
			return $("<li class='homeasap-idx-search-agent-search-li'><img src='" + item.suggest.ProfileImage + "'><span>" + item.label + "</span></li>").appendTo(ul);
		};

		$("#wp-homeasap-search-master-admin #tabs-2 .homeasap-idx-landing-height").keyup(function () {
			$('.homeasap-idx-landing-shortcode-sample-height').text(this.value)
		});

		$("#wp-homeasap-search-master-admin #tabs-2 .homeasap-idx-landing-css").keyup(function () {
			$('.homeasap-idx-landing-shortcode-sample-css').text(this.value.replace(/"/g, '\'').replace(/\n/g, ' '))
		});

		$(".homeasap-idx-landing-shortcode-button-copy").on('click', function () {
			var copyText = document.getElementById("homeasap-idx-landing-shortcode-sample-code").innerText;
			var tempInput = document.createElement("input");
			tempInput.style = "position: fixed; left: -1000px; top: -1000px";
			tempInput.value = copyText;
			document.body.appendChild(tempInput);
			tempInput.select();
			tempInput.setSelectionRange(0, 99999); /*For mobile devices*/
			document.execCommand("copy");
			document.body.removeChild(tempInput);
			alert('Copied!');
			return false
		});

	});

})(jQuery);
