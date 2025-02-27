/*
myYoutubePlaylist
WordPress Plugin by Jonk @ Follow me Darling, https://plugins.followmedarling.se/my-youtube-playlist/
Download from https://wordpress.org/plugins/my-youtube-playlist/
*/

jQuery(document).ready(function() {
    
});
jQuery(window).load(function () {
    myYoutubePlaylist_size();
});
jQuery(window).scroll(function () {

});
var timer;
jQuery(window).resize(function () {
    timer = setTimeout(function () { 
        myYoutubePlaylist_size();
    }, 500);
});

//a function to choose another youtube-video without reloading the page
function myYoutubePlaylist_cy(ytSrc, containerId, play, allVideos) {
	document.getElementById(containerId).innerHTML = eval("myYoutubePlaylist_cf(ytSrc, 500, 315, play, allVideos)");
	jQuery(this).addClass('myYoutubePlaylist_active');
	myYoutubePlaylist_size();
}

//a function to load flashmovies. it also prevents ie from adding the ugly border
function myYoutubePlaylist_cf(movie, width, height, play, allVideos) {
	allVideosArr = allVideos.split(movie + ',');
	prevVideosList = allVideosArr[0];
	nextVideosList = allVideosArr[1];
	if (nextVideosList == undefined) {
		nextVideosList = '';
	}
	allVideosList = movie + ',' + nextVideosList + ',' + prevVideosList;
	if ( allVideosList.slice(allVideosList.length - 1) == ',' ) {
		allVideosList = allVideosList.slice(0, -1);
	}
	allVideosList = allVideosList.replace(' ','');
	if (play == 'play') {
		play = '&autoplay=1';
	} else {
		play = '';
	}
	myYoutubePlaylist_cfStr = '<iframe width="' + width + '" height="' + height + '" src="//www.youtube.com/embed/'+ movie +'?playlist='+ allVideosList +'&feature=oembed&modestbranding=1&showinfo=0&rel=0'+ play +'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>';
	myYoutubePlaylist_cfStr += '</iframe>';
	return myYoutubePlaylist_cfStr;
}

//a function to load all movies with thumbs to a list
function myYoutubePlaylist_dl(allVideos, containerId, targetContainerId) {
	allVideosArr = allVideos.split(',');
	if (allVideosArr.length > 1) {
		allVideosLi = '<ul class="myYoutubePlaylist_Ul" >';	
		for (var i=0; i < allVideosArr.length; i++) {
			thisLink = 'javascript:myYoutubePlaylist_cy(\''+allVideosArr[i]+'\', \''+targetContainerId+'\', \''+'play'+'\', \'' + allVideos + '\');'
			allVideosLi += '<li>' + '<a href="'+thisLink+'">' + '<span class="myYoutubePlaylist_Img" style="background-image:url(\'//i.ytimg.com/vi/'+allVideosArr[i]+'/mqdefault.jpg\');"></span>' + '</'+'a></'+'li>';
		}
		allVideosLi += '</ul><div class="myYoutubePlaylist_clearer"></div>';
		document.getElementById(containerId).innerHTML = allVideosLi;
	} else {
		document.getElementById(containerId).style.display = 'none';
	}
}

function myYoutubePlaylist_size() {
    jQuery('.myYoutubePlaylist iframe, .myYoutubePlaylist object').each(function( index ) {
        thisW = jQuery(this).attr('width');
        thisH = jQuery(this).attr('height');
        thisR = thisH / thisW;
        thisW = jQuery(this).parent().parent().width();
        thisH = jQuery(this).parent().parent().width()*thisR;
        jQuery(this).css('width', thisW);
        jQuery(this).parent().css('width', thisW);
        jQuery(this).css('height', thisH);
        jQuery(this).parent().css('height', thisH);
        jQuery(this).parent().parent().find('.myYoutubePlaylist_YoutubePlaylist').css('width', thisW+3);

        thisThmb = jQuery(this).parent().parent().find('.myYoutubePlaylist_YoutubePlaylist ul.myYoutubePlaylist_Ul li a span');
        thisThmbW = thisThmb.width();
        thisThmb.css('height', thisThmbW*0.75);
    });
}
