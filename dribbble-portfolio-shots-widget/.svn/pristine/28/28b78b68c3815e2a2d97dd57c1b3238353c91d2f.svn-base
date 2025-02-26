(function(e){"use strict";e.jribbble={};var t=function(t,s){e.ajax({type:"GET",url:"http://api.dribbble.com"+t,data:s[1]||{},dataType:"jsonp",success:function(e){e===undefined?s[0]({error:!0}):s[0](e)}})},s={getShotById:"/shots/$/",getReboundsOfShot:"/shots/$/rebounds/",getShotsByList:"/shots/$/",getShotsByPlayerId:"/players/$/shots/",getShotsThatPlayerFollows:"/players/$/shots/following/",getPlayerById:"/players/$/",getPlayerFollowers:"/players/$/followers/",getPlayerFollowing:"/players/$/following/",getPlayerDraftees:"/players/$/draftees/",getCommentsOfShot:"/shots/$/comments/",getShotsThatPlayerLikes:"/players/$/shots/likes/"},o=function(e){return function(){var s=[].slice.call(arguments),o=e.replace("$",s.shift());t(o,s)}};for(var r in s)e.jribbble[r]=o(s[r])})(jQuery,window,document);

var get_dribbble = function(playerId,column){
        
        if (column == 2) {
            $.jribbble.getShotsByPlayerId(playerId, function(data){
		var shots = data.shots;
		var h = '';
		$(shots).each(function(i, shot){
			h += '<div class="column-6--hand">'
			h += '<a href="' + shot.url + '"><img src="' + shot.image_teaser_url + '"></a>';
			h += '</div>';
		});
		$('.dribbble-shots').html(h);
	});
} else if (column == 4) {
    $.jribbble.getShotsByPlayerId(playerId, function(data){
		var shots = data.shots;
		var h = '';
		$(shots).each(function(i, shot){
			h += '<div class="column-3--hand column-3--lap column-3--desk column-3--wall">'
			h += '<a href="' + shot.url + '"><img src="' + shot.image_teaser_url + '"></a>';
			h += '</div>';
		});
		$('.dribbble-shots').html(h);
	});
} else if(column == 6){
    $.jribbble.getShotsByPlayerId(playerId, function(data){
		var shots = data.shots;
		var h = '';
		$(shots).each(function(i, shot){
			h += '<div class="column-6--hand column-4--lap column-3--desk column-2--wall">'
			h += '<a href="' + shot.url + '"><img src="' + shot.image_teaser_url + '"></a>';
			h += '</div>';
		});
		$('.dribbble-shots').html(h);
	});
}
else{
    $.jribbble.getShotsByPlayerId(playerId, function(data){
		var shots = data.shots;
		var h = '';
		$(shots).each(function(i, shot){
			h += '<div class="column-6--hand">'
			h += '<a href="' + shot.url + '"><img src="' + shot.image_teaser_url + '"></a>';
			h += '</div>';
		});
		$('.dribbble-shots').html(h);
	});
}
	

}