"use strict";

function findGetParameter(parameterName) {
	var result = null,
		tmp = [];
	location.search
		.substr(1)
		.split("&")
		.forEach(function (item) {
		  tmp = item.split("=");
		  if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
		});
	return result;
}

function uuidv4() {
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
    return v.toString(16);
  });
}

function handle_request_error(error) {
	console.log(error);
	alert("Error during request");
}

(function ($) {

	
	function updateHTML(data){
		var avMetrics = data.commonAnalyses.map(x => x.name.split('Analysis')[0]);
		$(".metrics-col").each(function(index) {
			var elem_id = $( this ).attr('id');
			if( !avMetrics.includes(elem_id.split('-')[0]) )
				$( this ).css("visibility", "hidden");
		});
		avMetrics.forEach( (x, i) => {
			var analysis = data.commonAnalyses[i];
			$('#'+x+'-score').text(`${analysis.successPerc.toFixed(2)}%`);
		});
		
		$( "#ai-summary-textarea" ).text(data.aiAnalysis.aiSummary);
		
		var tags_container = $( "#tags-container" );
		tags_container.children("button").remove();
		data.aiAnalysis.trendingTags.forEach(x => {
			var color = 'btn-success';
			if(x.score < 20)
				color = 'btn-warning';
			if(x.score < 5)
				color = 'btn-secondary';
			var new_elem = `<button type="button" class="btn ${color} m-1">${x.value} <span class="badge badge-dark">${x.score.toFixed(2)}%</span>`;
			tags_container.append(new_elem);
		});
		
		var ai_tags_container = $( "#ai-tags-container" );
		ai_tags_container.children("button").remove();
		data.aiAnalysis.aiTrendingKeywords.forEach(x => {
			var color = 'btn-success';
			if(x.score < 20)
				color = 'btn-warning';
			if(x.score < 5)
				color = 'btn-secondary';
			var new_elem = `<button type="button" class="btn ${color} m-1">${x.value} <span class="badge badge-dark">${x.score.toFixed(2)}%</span>`;
			ai_tags_container.append(new_elem);
		});

		var corr_tag_list = $("#pills-tab");
		var corr_tag_content = $("#pills-tabContent");
		
		corr_tag_list.children("li").remove();
		corr_tag_content.children("div").remove();
		data.aiAnalysis.correlatedTags.forEach((x, i) => {
			var pill_ref = `pills-${i}`;
			var pill_id = pill_ref + '-tab';
			
			var new_list_elem = `<li class="nav-item"><a class="nav-link asimov-pill ${(i == 0)? 'active':''}" id="${pill_id}" data-toggle="pill" href="#${pill_ref}" role="tab" aria-controls="${pill_ref}" aria-selected="${i == 0}"><i class="fas fa-tag"></i> ${x.value}</a></li>`;
			var new_content_elem = `<div class="tab-pane fade ${(i == 0)? 'show active':''}" id="${pill_ref}" role="tabpanel" aria-labelledby="${pill_id}">
										<p class="p-3 interpretazione" style="border: 1px solid rgb(236, 236, 236); border-top-left-radius:13px; border-top-right-radius:13px; border-bottom-right-radius:13px; border-bottom-left-radius:13px">`;
			
			x.tags.forEach((y, j) => {
				var color = 'btn-success';
				if(y.score < 20)
					color = 'btn-warning';
				if(y.score < 5)
					color = 'btn-secondary';
				new_content_elem += `<button type="button" class="btn ${color} m-1"> ${y.value} <span class="badge badge-dark">${y.score.toFixed(2)}%</span></button>`;
				
			});
			new_content_elem += `</p></div>`;
			
			corr_tag_list.append(new_list_elem);
			corr_tag_content.append(new_content_elem);
		});
	}
	
	function updateCounters(value, data){
		var metric = value.split('-')[1];
		
		var analysis = data.data.commonAnalyses.filter(x => x.name.includes(metric))[0];
		var ordered_advices = [...analysis.advices].sort( (a, b) => b.perc - a.perc );
		$(".contatore").each(function(index) {
			var perc_value = ordered_advices[index].perc;
			var advice = LOCALIZED_VARS.map_advice[ordered_advices[index].name];
			var advice_dir = parseInt(ordered_advices[index].direction);
			var advice_desc = (' ' + advice.desc).slice(1);
			if ( advice_dir === 1)
				advice_desc = LOCALIZED_VARS.direction_up+ " " + advice_desc;
			else if (advice_dir === -1 )
			    advice_desc = LOCALIZED_VARS.direction_down+ " " + advice_desc;
			else if (advice_dir === +99 )
			    advice_desc = LOCALIZED_VARS.direction_up_bin+ " " + advice_desc;
			else if (advice_dir === -99 )
			    advice_desc = LOCALIZED_VARS.direction_down_bin+ " " + advice_desc;
			
			var tooltip = $(this).find('.tooltip-counter');
			tooltip.text(advice_desc);
			tooltip.attr("title", advice.tooltip);
			
			$(this).children("svg").remove();
			$(this).circliful({
				animation: 1,
				animationStep: 1,
				foregroundBorderWidth: 23,
				backgroundBorderWidth: 13,
				percent: perc_value,
				textSize: 28,
				textStyle: 'font-size: 12px;',
				textColor: '#666',
				progressColor: {0: 'EA2B1F',  30: '#FFD23F',  80: '#0CCA4A' },
				fontColor: '#000',
				iconColor: '#000',
				icon: 'f1de',
				iconSize: '33',
				iconPosition: 'middle',
				target: 34,
				start: 2,
			});
		});
	}

	$( document ).ready(function() {
		var isContentModified = true;
		var pivots = {
			gender: "",
			age: "",
			device: "",
			country: ""
		};
		
		var local_url = LOCALIZED_VARS.rest_url;
		
		var recSysData = {};
		var recSysDataProxy = new Proxy(recSysData, {
		  set: function (target, key, value) {
			  target[key] = value;
			  
			  updateHTML(value);
			  return true;
		  }
		});
		var metric = {};
		var metricProxy = new Proxy(metric, {
		  set: function (target, key, value) {
			  target[key] = value;
			  
			  updateCounters(value, recSysData);
			  return true;
		  }
		});
		
		var is_filter_dirty = true;
		
		$("#pivots-save").click(function() {
			pivots.gender = $( "#sesso option:selected" ).val();
			pivots.age = $( "#eta option:selected" ).val();
			pivots.device = $( "#dispositivi option:selected" ).val();
			pivots.country = $( "#zone option:selected" ).val();
			
			$("#save-icon").prop("class", "spinner-border spinner-border-sm");
			$(this).prop("disabled",true);
		
			var submitArticle = function(pivots, postId) {
				var endpoint = "asimov-plugin/v1/submit_article";
			  return fetch(local_url+endpoint, {
				method: "POST",
				headers: {
				  "Content-Type": "application/json",
				  "X-WP-Nonce": LOCALIZED_VARS.nonce
				},
				body: JSON.stringify({
				  post_id: postId,
				  pivots: pivots
				})
			  }).then(function(result) {
					return result.json();
			  });
			};

			var post_id = findGetParameter('post');
			submitArticle(pivots, post_id)
			.then(function(data) {
				if(data.success) {
					recSysDataProxy.data = data.data;
					console.log(recSysData);
					is_filter_dirty = false;
					$("#collapseOne").collapse('toggle');
				}
			})
			.catch(handle_request_error)
			.finally( () => {
				$("#save-icon").prop("class", "fas fa-magic mr-1");
				$("#pivots-save").prop("disabled",false);
			});
		});
		
		//$("#reload-recsys").click(function() {
		//	postToRecSys({
		//		article_guid: article_guid,
		//		pivots: pivots,
		//		remote_url: remote_url,
		//		local_url: base_url
		//	}).then(function(recsys_data) {
		//		recSysDataProxy.data = recsys_data.data;
		//	}).catch(handle_request_error);
		//});
		
		$("#metrics-save").click(function() {
			var selected = $("input[type='radio'][name='metrics']:checked");
			if (selected.length > 0) {
				metricProxy.data = selected.attr('id');
				$("#selected-metric-span").html(metric.data.split('-')[1].toUpperCase());
				
				$("#collapseTwo").collapse('toggle');
			}			
		});
		
		$("#modify-current-metric").click(function () {
			if(!is_filter_dirty && recSysData.data !== undefined) {
				$("#collapseOne").collapse('toggle');
			} else if(confirm('Save current filters!')){
				//$("#collapseOne").collapse('toggle');
			} else {
				is_filter_dirty = false;
				$( "#sesso" ).val(pivots.gender);
				$( "#eta" ).val(pivots.age);
				$( "#dispositivi" ).val(pivots.device);
				$( "#zone" ).val(pivots.country);
			}
		});
		
		$("#dashboard-step-next").click(function() {				
			$("#collapseThree").collapse('toggle');
		});
		$("#summary-step-next").click(function() {				
			$("#collapseFour").collapse('toggle');
		});
		$("#tags-step-next").click(function() {				
			$("#collapseFive").collapse('toggle');
		});
		$("#ai-tags-step-next").click(function() {				
			$("#collapseSix").collapse('toggle');
		});
		
		$("#summary-step-back").click(function() {				
			$("#collapseTwo").collapse('toggle');
		});
		$("#tags-step-back").click(function() {				
			$("#collapseThree").collapse('toggle');
		});
		$("#ai-tags-step-back").click(function() {				
			$("#collapseFour").collapse('toggle');
		});
		$("#correlated-tags-step-back").click(function() {				
			$("#collapseFive").collapse('toggle');
		});
		
		$('.custom-select').on('change', function() {
			is_filter_dirty = true;
		});
		
		$('.tooltip-counter').each(function(index) {
			//$(this).tooltip({trigger:'click'});
		});
	});
}(jQuery));