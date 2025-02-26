// JavaScript Document
var Codiblog_Plugin = (function($) {
	"user strict";
	
	//module
	return {
		
		init: function()
		{
		
			// Twitter tweet
			$(document).ready(function() {
				$('#asso_tweet').tweecool({
				username : setting.interval,
				limit: setting.twittercount
				});
			});
			
		},
		
	};
	
})(jQuery);

//Work when ready
jQuery(function($) {
	Codiblog_Plugin.init();
});

/*
* Twitter tweet
* Developed by Codiblog
*/
(function(b){b.fn.extend({tweecool:function(c){c=b.extend({username:"tweecool",limit:5,profile_image:!0,show_time:!0},c);return this.each(function(){var e=c,f=b(this),g=b("<ul>").appendTo(f),h=/(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;b.getJSON("http://api.tweecool.com/?screenname="+e.username+"&count="+e.limit,function(d){if(d.errors||null==d)return f.html("No tweets available."),!1;b.each(d.tweets,function(b,d){var a;if(e.show_time){var c=d.created_at;a=Date.parse(new Date);
c=Date.parse(c);a=(a-c)/1E3;a=1<a&&60>a?Math.round(a/1)+" seconds ago":60<=a&&3600>a?Math.round(a/60)+" minutes ago":3600<=a&&86400>a?Math.round(a/3600)+" hours ago":86400<=a&&604800>a?Math.round(a/86400)+" days ago":604800<=a&&2592E3>a?Math.round(a/604800)+" weeks ago":2592E3<=a&&31536E3>a?Math.round(a/2592E3)+" months ago":"over a year ago"}else a="";g.append('<li><div class="tweets_txt">'+d.text.replace(h,'<a href="$1" target="_blank">$1</a>')+" <span>"+a+"</span></div></li>")})}).fail(function(b,
c,e){f.html("No tweets available")})})}})})(jQuery);