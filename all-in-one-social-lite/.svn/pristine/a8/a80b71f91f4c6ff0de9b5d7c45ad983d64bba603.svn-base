var total_count = 0;
var facebook_shares = twitter_shares = gplus_shares = linkedin_shares = stumpleupon_shares = 0;
var facebook_fans = twitter_fans = gplus_fans = linkedin_fans = stumpleupon_fans = 0;
function load_all_in_one_social(options)
{
	//Elements needed for interaction
	var ele_total_text = jQuery('.cube3x-social-wrapper .total-share-count-wrapper .shares_text');
	var facebook_url = twitter_url = gplus_url = linkedin_url = stumpleupon_url = "";
	if(options.source == 1)
	{
		var current_url = window.location.href;
		if(current_url.trim().length != 0)
		{
			if(jQuery.inArray("facebook", options.sites) > -1)
			{
				facebook_url = "https://graph.facebook.com/fql?q=SELECT url, total_count FROM link_stat WHERE url='"+current_url+"'";
				getData(facebook_url).done(function(facebook_data){
					facebook_shares = parseInt(facebook_data.data[0].total_count);
					getTotalCount(facebook_shares);
					jQuery('.cube3x-social-wrapper .facebook-wrapper .social-count').text(CommaFormatted(facebook_shares.toString()));
				});
			}
			if(jQuery.inArray("twitter", options.sites) > -1)
			{
				twitter_url = "http://urls.api.twitter.com/1/urls/count.json?url="+current_url;
				getData(twitter_url).done(function(twitter_data){
					twitter_shares = parseInt(twitter_data.count);
					getTotalCount(twitter_shares);
					jQuery('.cube3x-social-wrapper .twitter-wrapper .social-count').text(CommaFormatted(twitter_shares.toString()));
				});
			}
			if(jQuery.inArray("gplus", options.sites) > -1)
			{
				gplus_url = options.plugin_url+'ajax-cube3x-gplus-count.php?url='+current_url;
				getData(gplus_url).done(function(gplus_data){
					gplus_shares = parseInt(gplus_data.plus_count);
					getTotalCount(gplus_shares);
					jQuery('.cube3x-social-wrapper .gplus-wrapper .social-count').text(CommaFormatted(gplus_shares.toString()));
				});				
			}
			if(jQuery.inArray("linkedin", options.sites) > -1)
			{
				linkedin_url = options.plugin_url+'ajax-cube3x-linkedin-count.php?url='+current_url;
				getData(linkedin_url).done(function(linkedin_data){
					linkedin_shares = parseInt(linkedin_data.count);
					getTotalCount(linkedin_shares);
					jQuery('.cube3x-social-wrapper .linkedin-wrapper .social-count').text(CommaFormatted(linkedin_shares.toString()));
				});		
			}
			if(jQuery.inArray("stumpleupon", options.sites) > -1)
			{
				stumpleupon_url = options.plugin_url+'ajax-cube3x-stumpleupon-count.php?url='+current_url;
				getData(stumpleupon_url).done(function(stumpleupon_data){
					stumpleupon_shares = parseInt(stumpleupon_data.result.views);
					if(isNaN(stumpleupon_shares))
						stumpleupon_shares = 0;
					getTotalCount(stumpleupon_shares);
					jQuery('.cube3x-social-wrapper .stumpleupon-wrapper .social-count').text(CommaFormatted(stumpleupon_shares.toString()));
				});	
			}
		}
	}
	else if(options.source == 3) {
		ele_total_text.text('Followers');
		for(var i = 0; i < options.services.length; i++){
			total_count+=parseInt(options.services[i].subscriber_count);
			var ele_total_count = jQuery('.cube3x-social-wrapper .total-share-count-wrapper .total_shares');
			ele_total_count.text(formatNumber(total_count));
			jQuery('.cube3x-social-wrapper .'+options.services[i].name+'-wrapper .social-count').text(CommaFormatted(options.services[i].subscriber_count));
		}
		for(var i = 0; i < options.services.length; i++){
			jQuery('.cube3x-social-wrapper .'+options.services[i].name+'-wrapper .fill').css('width', parseInt(options.services[i].subscriber_count)/total_count*100+'%');
		}
	}
}

//Get Facebook Share Count
function getData(url){
	return jQuery.ajax({
		type: "GET",
		url: url,
		dataType:"jsonp",
		success: function(data)
		{
			
		}
	});
}

//Calculate and Show total shares
function getTotalCount(count)
{
	total_count+=count;
	var ele_total_count = jQuery('.cube3x-social-wrapper .total-share-count-wrapper .total_shares');
	ele_total_count.text(formatNumber(total_count));
	jQuery('.cube3x-social-wrapper .twitter-wrapper .fill').css('width', twitter_shares/total_count*100+'%');
	jQuery('.cube3x-social-wrapper .facebook-wrapper .fill').css('width', facebook_shares/total_count*100+'%');
	jQuery('.cube3x-social-wrapper .linkedin-wrapper .fill').css('width', linkedin_shares/total_count*100+'%');
	jQuery('.cube3x-social-wrapper .gplus-wrapper .fill').css('width', gplus_shares/total_count*100+'%');
	jQuery('.cube3x-social-wrapper .stumpleupon-wrapper .fill').css('width', stumpleupon_shares/total_count*100+'%');
}

//Function to format number
function formatNumber(number)
{
	if(number<1000) {
		return number
	} else if(number < 1000000) {
		number = parseFloat(number / 1000).toFixed(1);
		return number+'k';
	} else if(number < 1000000000) {
		number = parseFloat(number / 1000000).toFixed(1);
		return number+'m';
	}
}

function CommaFormatted(str) {
    return str.replace(/.(?=(?:.{3})+$)/g, '$&,');
}