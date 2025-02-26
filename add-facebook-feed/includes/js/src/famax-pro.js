/*--------------------------------------------------------------------------------
Famax PRO v6.2 by Jake H. from CodeHandling
https://codecanyon.net/item/famax-facebook-fan-page-on-your-website/10287995?ref=codehandling
---------------------------------------------------------------------------------*/


/*------------------------------------------------------------------
[Table of contents]

1. Famax Settings
2. DOM Initialization 
3. Options Initialization
4. Source Validation
5. Getters
    5.1 Page Details
    5.2 Page Posts
    5.3 Page Videos
    5.4 Page Photos
6. Setters
    6.1 Post Objects
    6.2 Photo Objects
    6.3 Video Setters
7. Display List
8. Item Display Mechanisms
8. Sorting Handlers
9. Tab Handlers
9. Popup Button Handler
10.Load More Handler
12.Famax Display Handler
11.Resize Handler
12.Utility Functions 
13.Facebook Login
14.Famax Main Function
-------------------------------------------------------------------*/


(function($) {

	"use strict";

	var settings = {

		appId:'852602131447787',
		accessToken: 'EAAJTO0BbbJUBAHSW6a0dfzb7Nx5BADMHk3OlaQFEBFDlTmenOSAMes2JZAjaEDy0YGa2NZBbhZAicjCznslFkwTlQcjlRnZCpz9kOOWekXw4dYxzJaPRoXvuy9vgKVf0k2VHaFQBxpbmcU9tyCYkkzmIqcfapY8ZD',
		
		fanPageLinkForHeader:'http://www.facebook.com/adidas',

        tabs:[
            {
                name:"Posts",
                type:"facebook-page-posts",
                link:"https://www.facebook.com/adidas",
            },
            {
                name:"Photos",
                type:"facebook-page-photos",
                link:"http://www.facebook.com/adidas"
            },
            {
                name:"Videos",
                type:"facebook-page-videos",
                link:"http://www.facebook.com/adidas"
            },
            {
                name:"Album Pics",
                type:"facebook-album-photos",
                link:"https://www.facebook.com/pg/adidas/photos/?tab=album&album_id=191308754225385"
            },
        ],

        defaultTab:"Posts", 
        itemDisplayMode:"popup",
		maxResults:12, 
	

        defaultSortOrder:"recent-first",    
        famaxDisplayMode:"grid",           
        dateFormat:"relative",             

        famaxBackgroundColor      :"#ECEFF1",
        itemBackgroundColor       :"#fbfbfb",
        headerBackgroundColor               :"rgb(244, 67, 54)",
        titleColor                :"rgb(97, 93, 93)",
        likesColor                :"#6f6f6f",
        controlsTextColor         :"black",
        

        titleFontFamily         :"Roboto Condensed",    
        generalFontFamily       :"Roboto Condensed",    
        titleFontSize           :"1",
        titleFontWeight         :"normal",              
        likesDateFontSize       :"0.85",
        baseFontSize            :"16px",                
        
        responsiveBreakpoints   :[600,1200,2000,2500],

        loadMoreText            :"<i class='fa fa-plus'></i>&nbsp;&nbsp;Show me more posts..",
        ctaText                 :"<i class='fa fa-envelope'></i>&nbsp;&nbsp;Check out our store!",
        ctaLink                 :"http://www.adidas.co.in/heretocreate",
		
		        
		postList				:[],
		popupAlignTop			:true,
		aspectRatio				:360/640,
		nextPageToken			:null,
		clearListOnDisplay		:true,
		channelIdForSearch		:null,
		searchFlag				:false,

		famaxLoggedInUser		: {
			name 		:null,
			id 			:null,
			picture 	:null,
			token 		:null,

		}

	},

	init = function($famaxPro) {
	
		var facebookWrapperStart = "<div class='fp-font-controller'>"
		var facebookWrapperEnd = "</div>"
		var listWrapperStart = "<div class='fp-wrapper'>";
		var listWrapperEnd = "</div>";
		var pageHeader = "<div class='fp-header'></div>"
		var listHeader = "<div class='fp-list-title'><div class='fp-tab-container'><i class='fa fa-bars'></i></div><select id='fp-sort-order'><option value='popular-first' selected>Popular first</option><option value='recent-first'>Recent first</option></select></div>";
		//var inlineContainer = "<div class='fp-inline-container'></div>";
		var listContainer = "<div class='fp-item-container'></div>";
		var loadMoreButton = "<div class='fp-load-more-button'>"+settings.loadMoreText+"</div>";
		var ctaButton = "";
		var calloutContainer = "<div class='fp-callout-container'></div>";
		var albumNavigationName = "<div class='fp-showing-album-name'></div>";

		var popupContainer = "<div id='famax-popup' class='white-popup mfp-hide'><div class='fb-post' data-href='' data-show-text='true' data-height='500'></div></div>";

		if(settings.ctaLink!=null) {
			ctaButton = "<a href='"+settings.ctaLink+"' target='_blank'><div class='fp-cta-button'>"+settings.ctaText+"</div></a>";
		}
		
		$famaxPro.append(facebookWrapperStart+pageHeader+listWrapperStart+listHeader+albumNavigationName+listContainer+loadMoreButton+ctaButton+listWrapperEnd+facebookWrapperEnd+popupContainer);
		showLoader($famaxPro);
	},


    doOptions = function($famaxPro){

    	var customCSS = "";
    	var headerBackgroundColor,lightheaderBackgroundColor;

    	clearSettings();
    	//settings.minimumViewsPerDayForTrendingVideos = parseInt(settings.minimumViewsPerDayForTrendingVideos,10);

    	//set date format
    	if(settings.dateFormat=="relative") {
    		convertDate = convertToRelativeDate;
    	} else if(settings.dateFormat=="specific") {
    		convertDate = convertToSpecificDate;
    	}

    	//set view - grid|list|double-list
    	handleFamaxDisplay($famaxPro);


    	//Famax Background Color
    	customCSS += ".facebook-pro {background-color: "+settings.famaxBackgroundColor+";}";
    	customCSS += ".fp-load-more-button:hover {background: linear-gradient(to right,"+settings.famaxBackgroundColor+","+settings.itemBackgroundColor+" 30%);}"

    	//Item Background Color
    	customCSS += ".fp-list-title select, .fp-item, .fp-load-more-button, .fp-channel-search {background-color: "+settings.itemBackgroundColor+";}"

    	//Likes Color
    	customCSS += ".fp-view-string{color: "+settings.likesColor+";}";


    	//Header Color
	   	customCSS += ".fp-grid .fp-view-bucket-seen {color: "+settings.headerBackgroundColor+"; background-color:inherit;}";
    	customCSS += ".fp-loader {border-color: "+settings.headerBackgroundColor+";}";
    	customCSS += ".fp-load-more-button{box-shadow: 0 0px 2px rgba(0,0,0,.2), -0.2em 0px 0px 0px "+settings.headerBackgroundColor+";}";
    	customCSS += ".fp-list-title select{box-shadow: 0 1px 2px rgba(0,0,0,.2), -0.2em 0px 0px 0px "+settings.headerBackgroundColor+";}";
    	customCSS += ".fp-header,.fp-cta-button,.fp-showing-album-name{background-color:"+settings.headerBackgroundColor+"; color:"+settings.headerTextColor+";}";

    	customCSS += ".fp-title a, .fp-popup-title a, .fp-comment span{color:"+settings.headerBackgroundColor+"; }";
    	customCSS += ".fp-popup-button:hover, .fp-add-comment-button:hover, .fp-post-like-button:hover, .fp-view-string {background-color: "+settings.headerBackgroundColor+"; box-shadow: 0px 0px 0px 1px "+settings.headerBackgroundColor+";}";


		//Title color
    	customCSS += ".fp-title, .fp-views-per-day {color: "+settings.titleColor+";}";
    	customCSS += ".fp-date-bucket{color: "+settings.titleColor+";}";
    	//customCSS += ".fp-tab-container{box-shadow: -0.2em 0px 0px 0px "+settings.likesColor+";}";
    	
		customCSS += ".fp-selected-tab:after{background-color:"+settings.titleColor+";}";
    	customCSS += ".fp-item, .fp-loader {color:"+settings.titleColor+";}";


    	//Controls Text Color
    	customCSS += ".fp-list-title select, .fp-load-more-button, .fp-channel-search {color:"+settings.controlsTextColor+";}";
		customCSS += ".fp-tab-container{color: "+settings.controlsTextColor+";}";


    	headerBackgroundColor = settings.headerBackgroundColor;
    	if(headerBackgroundColor.indexOf("rgb")!=-1) {
    		//convert rgb format to rgba format
    		lightheaderBackgroundColor = headerBackgroundColor.substring(0,headerBackgroundColor.length-1) + ",0.5)";
			lightheaderBackgroundColor = lightheaderBackgroundColor.replace("rgb","rgba");
			customCSS += ".fp-views-per-day{border-color: "+lightheaderBackgroundColor+";}";
			customCSS += ".fp-load-more-button:hover {background: linear-gradient(to right,"+lightheaderBackgroundColor+","+settings.itemBackgroundColor+" 20%);}"
    	}


    	//font size styles
    	customCSS += ".fp-title {font-size:"+settings.titleFontSize+"em !important; font-weight:"+settings.titleFontWeight+" !important;}";
    	customCSS += ".fp-date-bucket,.fp-count-string,.fp-view-string {font-size:"+settings.likesDateFontSize+"em !important;}";
    	customCSS += ".famax-pro,.mfp-container{font-size: "+settings.baseFontSize+";}";


    	//font-family
    	customCSS += ".fp-item,.fp-callout,.fp-offer{font-family:"+settings.generalFontFamily+";}";
    	customCSS += ".fp-title,.fp-offer-title,.fp-callout-title {font-family:"+settings.titleFontFamily+";}";

		//hiding options
    	if(settings.hideHeader) {
    		customCSS += " .fp-header {display:none;}";
    	}   	
    	if(settings.hideTabs) {
    		customCSS += " .fp-tab-container {display:none;}";
    	}
    	if(settings.hideSorting) {
    		customCSS += " #fp-sort-order {display:none;}";
    	}
    	if(settings.hideLoadingMechanism) {
    		customCSS += " .fp-load-more-button,  .fp-previous-button,  .fp-next-button{display:none;}";
    		customCSS += " .fp-cta-button{width:100%;}";
    	}
    	if(settings.hideCtaButton) {
    		customCSS += " .fp-cta-button{display:none;}";
    		customCSS += " .fp-load-more-button {width: 100%;}  .fp-previous-button,  .fp-next-button {width: 48.5%;}";
    	}
        if(settings.hidePopupDetails) {
            customCSS += ".fp-popup-details {display:none;}";
            settings.popupAlignTop = false;     
        }
        if(settings.hideThumbnailLikesCommentsDate) {
            customCSS += ".fp-separator-for-grid, .fp-likes, .fp-comments, .fp-date-bucket {display: none !important;}";
            settings.popupAlignTop = false;     
        }
        if(settings.hidePageAboutInfo) {
            customCSS += ".fp-about-info, .fp-website {display:none;}";
        }



    	//popup image max height
    	try{
    		var maxHeight = $(window.top).height()*0.85;
    		customCSS += ".mfp-img{max-height:"+maxHeight+"px !important;}";
    	} catch(e){
    		//must be in an iframe..
		}

    	//remove styles if already existing
    	$(".facebook-added-styles").remove();

    	//add new styles
		$("body").append("<style class='facebook-added-styles'>"+customCSS+"</style>");

    },

    clearSettings = function(){

    	settings.postList = [];
    	settings.nextPageToken = null;
    	settings.clearListOnDisplay = true;
    	settings.searchFlag = false;

    },


    initHeader = function($famaxPro){
		
		var identifierJSON;

		identifierJSON = sanitizeLink("facebook-page-posts",settings.fanPageLinkForHeader);

		if(identifierJSON.identifier=="error") {
			alert("\n\nFacebook Page Link should be of the format: \nhttp://www.facebook.com/adidas \n\nPlease contact us via comments to get your page link in this format :)");
			return;
		}

		getPageDetails(identifierJSON.identifier,null,$famaxPro);

    },

    


    displayHeader = function(pageDetails,$famaxPro){

		var pageId = pageDetails.id;
		var pageName = pageDetails.name;
		var pageLikes = pageDetails.likes;
		var pageTalkingAbout = pageDetails.talking_about_count;
		var pageBackgroundImage;
		if(null!=pageDetails.cover) {
			pageBackgroundImage = pageDetails.cover.source;
		} else {
			pageBackgroundImage="";
		}
		var pageLink = "https://www.facebook.com/"+pageId;
		var pageThumbnail = pageDetails.picture.data.url;
		var pageAbout = pageDetails.about;
		var pageWebsite = pageDetails.website;

		
		var $facebookHeader = $famaxPro.find(".fp-header");

		var pageThumbnailHTML = "<div class='fp-channel-thumbnail'><a href='"+pageLink+"' target='_blank'><img src='"+pageThumbnail+"' /></a></div>";
		var pageLikeBoxHTML = "<iframe src='http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2F"+pageId+"&amp;layout=button_count&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp' style='overflow:hidden;width:100%;height:80px;' scrolling='no' frameborder='0' allowTransparency='true'></iframe>";
    	var pageDetailsHTML = "<div class='fp-channel-details'><div class='fp-channel-name'><a href='"+pageLink+"' target='_blank'>"+pageName+"</a></div><div class='fp-subscribe'>"+pageLikeBoxHTML+"</div></div>";

    	var aboutDetails = "<div class='fp-about-info'>"+pageAbout+"</div>";
    	var pageWebsite = "<div class='fp-website'><a href='"+pageWebsite+"' target='_blank'>"+pageWebsite+"</a></div>";

    	$facebookHeader.append("<div class='fp-header-data'>"+pageThumbnailHTML+pageDetailsHTML+aboutDetails+pageWebsite+"</div>");

    	if(settings.showCoverImage) {
    		$famaxPro.find(".fp-header").css("background-image","url("+pageBackgroundImage+")");
    	}


    	settings.fanPageId = pageId;
		

    },


	createTabs = function($famaxPro) {

		var identifierJSON,source,name,link,selected,channelId,channelUser,playlistId,tabId;
		var $facebookTabContainer = $famaxPro.find(".fp-tab-container");

		for(var i=0; i<settings.tabs.length; i++) {

			source = settings.tabs[i].type;
			name = settings.tabs[i].name;
			link = settings.tabs[i].link;

			identifierJSON = sanitizeLink(source,link);

			//skip Tab in case of error
			if(identifierJSON.identifier=="error") {
				continue;
			}

			tabId = source + "-" + identifierJSON.identifier;
			$facebookTabContainer.append("<div class='fp-tab' id='"+tabId+"'>"+name+"</div>");


			if(source=="facebook-page-posts" || source=="facebook-page-photos" || source=="facebook-page-videos" || source=="facebook-page-albums") {

				//update the tab with page id
				getPageDetails(identifierJSON.identifier,tabId,$famaxPro);
									

			} else if(source=="facebook-album-photos") {

				//select if default
				if(settings.defaultTab==name) {
					$famaxPro.find("#"+tabId).click();
				}					


			} else if(source=="") {

			}
			
		} //for loop on tabs ends

		
	},

	sanitizeLink = function(source,link) {

		var sanityIndex,pageUser,albumId;
		var identifierJSON = {
			identifier 			:"",
			identifierType		:""
		};


		//remove trailing slashes
		link = link.replace(/\/$/, "");


		if(source=="facebook-page-posts" || source=="facebook-page-photos" || source=="facebook-page-videos" || source=="facebook-page-albums") {

			//remove "/?nr" from the end of URL
			link = link.replace(/\/\?.*/,"");

			sanityIndex = link.lastIndexOf("/");
			if(sanityIndex==-1) {

				identifierJSON.identifier = "error";
				alert("\n\nFacebook Page Link should be of the format: \nhttp://www.facebook.com/adidas \n\nPlease contact us via comments to get your page link in this format :)");

			} else {

				pageUser = link.substring(sanityIndex+1);

				//remove "." from the page name
				pageUser = pageUser.replace(/\./g,"");
				
				//keep only the last "-part" from the page name
				if(pageUser.indexOf("-")!=-1) {
					pageUser = pageUser.substring(pageUser.lastIndexOf("-")+1);
				}

				identifierJSON.identifierType = "facebook-page-user";				
				identifierJSON.identifier = pageUser;

			}


		} else if(source=="facebook-album-photos") {
			
			sanityIndex = link.indexOf("album_id=");
			if(sanityIndex==-1) {

				identifierJSON.identifier = "error";
				alert("\n\nFacebook Album Link should be of the format: \nhttps://www.facebook.com/pg/adidas/photos/?tab=album&album_id=1067342993288619 \n\n");

			} else {

				albumId = link.substring(sanityIndex+9);
				identifierJSON.identifierType = "facebook-album-useid";				
				identifierJSON.identifier = albumId;

			}			

		} else if(source=="") {

		}

		return identifierJSON;

	},

	getPageDetails = function(pageName,tabId,$famaxPro) {

		var apiURL = "https://graph.facebook.com/v2.8/"+pageName+"?access_token="+settings.accessToken+"&fields=talking_about_count,cover,likes,name,picture,about,website";

		$.ajax({
			url: apiURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'json',
			success: function(response) {
				
				if(null==tabId) {
					displayHeader(response,$famaxPro);
				} else {
					updateTabs(tabId,response,$famaxPro);	
				}	
	
			},
			error: function(html) { 
				
				alert("Could not load Page Details.."); 
				
			}
		});

	},


	getPagePosts = function(pageId,$famaxPro) {

		var apiURL, postArray;

		apiURL = "https://graph.facebook.com/v2.8/"+pageId+"/posts?limit="+settings.maxResults+"&access_token="+settings.accessToken+"&fields=type,message,message_tags,object_id,picture,full_picture,name,story,link,from,comments.limit(1).summary(true),likes.limit(1).summary(true),shares,created_time";
			
		if(settings.nextPageToken!=null) {
			apiURL = settings.nextPageToken;
		}

		$.ajax({
			url: apiURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'json',
			success: function(response) {
				postArray = createPostObjects(response.data,$famaxPro);				
				handleNextPageToken(response.paging,$famaxPro);
				displayItems(postArray,$famaxPro);
				videoDisplayMechanism($famaxPro);
			},
			error: function(html) { 
				
				
			}
		});

	},




	getPagePhotos = function(pageId,$famaxPro) {

		var apiURL, postArray;

		apiURL = "https://graph.facebook.com/v2.8/"+pageId+"/photos/uploaded?limit="+settings.maxResults+"&access_token="+settings.accessToken+"&fields=type,object_id,picture,images,name,name_tags,story,link,from,comments.limit(1).summary(true),likes.limit(1).summary(true),shares,created_time,album";
			
		if(settings.nextPageToken!=null) {
			apiURL = settings.nextPageToken;
		}

		$.ajax({
			url: apiURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'json',
			success: function(response) {
				postArray = createPhotoObjects(response.data,$famaxPro);				
				handleNextPageToken(response.paging,$famaxPro);
				displayItems(postArray,$famaxPro);
				videoDisplayMechanism($famaxPro);
			},
			error: function(html) { 
				
				
			}
		});

	},


	getPageAlbums = function(pageId,$famaxPro) {

		var apiURL, postArray;

		apiURL = "https://graph.facebook.com/v2.8/"+pageId+"/albums?limit="+settings.maxResults+"&access_token="+settings.accessToken+"&fields=cover_photo,description,photo_count,picture,images,name,name_tags,link,from,comments.limit(1).summary(true),likes.limit(1).summary(true),shares,created_time";
			
		if(settings.nextPageToken!=null) {
			apiURL = settings.nextPageToken;
		}

		$.ajax({
			url: apiURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'json',
			success: function(response) {

				createAlbumObjects(response.data,$famaxPro);

			},
			error: function(html) { 
				
				
			}
		});

	},

/*
	gatherAlbumCoverPhotos = function(albumArray,$famaxPro) {

		var coverId, coverIdArray = [];

		for(var i=0;i<=albumArray.length;i++) {

			coverId = albumArray[i].cover_photo.id;
			coverIdArray.push(coverId);

		}

		getAlbumCoverPhotos(coverIdArray,$famaxPro);

	},
*/

	getAlbumCoverPhotos = function(coverIdArray,processesPostArray,$famaxPro) {

		var apiURL, postArray;

		apiURL = "https://graph.facebook.com/v2.8?ids="+coverIdArray+"&access_token="+settings.accessToken+"&fields=images";


		$.ajax({
			url: apiURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'json',
			success: function(response) {
				
				postArray = addCoverImagesToAlbums(response,processesPostArray,$famaxPro);
				displayAlbums(postArray,$famaxPro);
                registerAlbumNavigation($famaxPro);
                
			},
			error: function(html) { 
				
				
			}
		});

	},

	getPageVideos = function(pageId,$famaxPro) {

		var apiURL, postArray;

		apiURL = "https://graph.facebook.com/v2.8/"+pageId+"/videos?limit="+settings.maxResults+"&access_token="+settings.accessToken+"&fields=object_id,picture,permalink_url,thumbnails,description,link,from,comments.limit(1).summary(true),likes.limit(1).summary(true),shares,created_time";
			
		if(settings.nextPageToken!=null) {
			apiURL = settings.nextPageToken;
		}

		$.ajax({
			url: apiURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'json',
			success: function(response) {
				postArray = createVideoObjects(response.data,$famaxPro);				
				handleNextPageToken(response.paging,$famaxPro);
				displayItems(postArray,$famaxPro);
				videoDisplayMechanism($famaxPro);
			},
			error: function(html) { 
				
				
			}
		});

	},


	getAlbumPhotos = function(albumId,$famaxPro) {

		var apiURL, postArray;

		apiURL = "https://graph.facebook.com/v2.8/"+albumId+"/photos?limit="+settings.maxResults+"&access_token="+settings.accessToken+"&fields=type,object_id,picture,images,name,name_tags,story,link,from,comments.limit(1).summary(true),likes.limit(1).summary(true),shares,created_time,album";
			
		if(settings.nextPageToken!=null) {
			apiURL = settings.nextPageToken;
		}

		$.ajax({
			url: apiURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'json',
			success: function(response) {
				postArray = createPhotoObjects(response.data,$famaxPro);				
				handleNextPageToken(response.paging,$famaxPro);
				displayItems(postArray,$famaxPro);
				videoDisplayMechanism($famaxPro);
			},
			error: function(html) { 
				
				
			}
		});

	},


	getPostLikes = function(postId,$famaxPro) {

		var apiURL, postArray;

		apiURL = "https://graph.facebook.com/v2.8/"+postId+"/likes?access_token="+settings.accessToken+"&limit=6&fields=name,pic_square";

		$.ajax({
			url: apiURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'json',
			success: function(response) {
				displayPostLikes(response.data,$famaxPro);
			},
			error: function(html) { 
				
				
			}
		});

	},


	getPostComments = function(postId,$famaxPro) {

		var apiURL, postArray;

		apiURL = "https://graph.facebook.com/v2.8/"+postId+"/comments?access_token="+settings.accessToken+"&limit=6&fields=from,message";

		$.ajax({
			url: apiURL,
			type: "GET",
			async: true,
			cache: true,
			dataType: 'json',
			success: function(response) {
				displayPostComments(response.data,$famaxPro);
			},
			error: function(html) { 
				
				
			}
		});

	},



	handleNextPageToken = function(token,$famaxPro) {
		
		if(token!=null) {
			
			token = token.next;
			settings.nextPageToken = token;

			$famaxPro.find(".fp-load-more-button").html(settings.loadMoreText).removeClass("fp-loading");

		} else {
			$famaxPro.find('.fp-load-more-button').html("All Done");
		}

	},


    createPostObjects = function(postArray,$famaxPro) {

    	var processesPostArray = [];
    	var proSnippet;

    	for(var i=0; i<postArray.length; i++) {
    		proSnippet = new Object();
    		proSnippet.image = postArray[i].full_picture;
    		
    		//message
    		proSnippet.message = postArray[i].message;
    		if(null==proSnippet.message) {
    			proSnippet.message = postArray[i].story;
    		}
    		if(null==proSnippet.message) {
    			proSnippet.message = postArray[i].name;
    		}

    		//convert message - add links to it.
    		proSnippet.processedMessage = processMessage(proSnippet.message,postArray[i].message_tags);

    		proSnippet.postId = postArray[i].id;
			proSnippet.link = postArray[i].link;
			proSnippet.type = postArray[i].type;

			//likes
			proSnippet.likes = postArray[i].likes.summary.total_count;
			proSnippet.commaSeparatedLikes = convertViews(proSnippet.likes);

			//comments
			proSnippet.comments = postArray[i].comments.summary.total_count;
			proSnippet.commaSeparatedComments = convertViews(proSnippet.comments);

			//date
    		proSnippet.date = postArray[i].created_time;
			proSnippet.formattedDate = convertDate(proSnippet.date);

			processesPostArray.push(proSnippet);
    	}

    	settings.postList = settings.postList.concat(processesPostArray);    
    	return processesPostArray;

    	
    },

	createPhotoObjects = function(postArray,$famaxPro) {

    	var processesPostArray = [];
    	var proSnippet;

    	for(var i=0; i<postArray.length; i++) {
    		proSnippet = new Object();
    		proSnippet.image = postArray[i].images[0].source;
    		
    		//message
    		proSnippet.message = postArray[i].name;
    		if(null==proSnippet.message) {
    			proSnippet.message = postArray[i].album.name;
    		}

    		//convert message - add links to it.
    		proSnippet.processedMessage = processMessage(proSnippet.message,postArray[i].name_tags);

    		proSnippet.postId = postArray[i].id;
			proSnippet.link = postArray[i].link;
			proSnippet.type = "photo";

			//likes
			proSnippet.likes = postArray[i].likes.summary.total_count;
			proSnippet.commaSeparatedLikes = convertViews(proSnippet.likes);

			//comments
			proSnippet.comments = postArray[i].comments.summary.total_count;
			proSnippet.commaSeparatedComments = convertViews(proSnippet.comments);

			//date
    		proSnippet.date = postArray[i].created_time;
			proSnippet.formattedDate = convertDate(proSnippet.date);

			processesPostArray.push(proSnippet);
    	}

    	settings.postList = settings.postList.concat(processesPostArray);    
    	return processesPostArray;

    	
    },

	createAlbumObjects = function(postArray,$famaxPro) {

    	var processesPostArray = [];
    	var proSnippet;
    	var coverIdArray = [];

    	for(var i=0; i<postArray.length; i++) {
    		proSnippet = new Object();

    		proSnippet.photoCount = postArray[i].photo_count;
    		if(proSnippet.photoCount==0) {
    			continue;
    		}

    		proSnippet.image = postArray[i].picture.url;
    		
    		//message
    		proSnippet.message = postArray[i].name;
    		if(null==proSnippet.message) {
    			proSnippet.message = postArray[i].cover_photo.name;
    		}

    		//convert message - add links to it.
    		proSnippet.processedMessage = processMessage(proSnippet.message,postArray[i].name_tags);

    		proSnippet.postId = postArray[i].id;
			proSnippet.link = postArray[i].link;
			proSnippet.type = "album";

			//likes
			//proSnippet.likes = postArray[i].likes.summary.total_count;
			//proSnippet.commaSeparatedLikes = convertViews(proSnippet.likes);

			//comments
			//proSnippet.comments = postArray[i].comments.summary.total_count;
			//proSnippet.commaSeparatedComments = convertViews(proSnippet.comments);

			//date
    		proSnippet.date = postArray[i].created_time;
			proSnippet.formattedDate = convertDate(proSnippet.date);

			//coverIds
			proSnippet.coverId = postArray[i].cover_photo.id;
			coverIdArray.push(proSnippet.coverId);

			processesPostArray.push(proSnippet);
    	}

    	settings.postList = settings.postList.concat(processesPostArray);
    	
    	getAlbumCoverPhotos(coverIdArray,processesPostArray,$famaxPro);

    	//return processesPostArray;
    	
    },        

    addCoverImagesToAlbums = function(coverArray,processesPostArray,$famaxPro) {

    	var coverId;

    	for(var i=0; i<processesPostArray.length; i++) {

    		coverId = processesPostArray[i].coverId;
    		processesPostArray[i].image = coverArray[coverId].images[2].source;

    	}

    	return processesPostArray;

    },

	createVideoObjects = function(postArray,$famaxPro) {

    	var processesPostArray = [];
    	var proSnippet;

    	for(var i=0; i<postArray.length; i++) {
    		proSnippet = new Object();
    		proSnippet.image = postArray[i].thumbnails.data[0].uri;
    		
    		//message
    		proSnippet.message = postArray[i].description;
    		/*if(null==proSnippet.message) {
    			proSnippet.message = postArray[i].story;
    		}*/

    		//convert message - add links to it.
    		proSnippet.processedMessage = processMessage(proSnippet.message,null);

    		proSnippet.postId = postArray[i].id;
			proSnippet.link = "https://www.facebook.com"+postArray[i].permalink_url;
			proSnippet.type = "video";

			//likes
			proSnippet.likes = postArray[i].likes.summary.total_count;
			proSnippet.commaSeparatedLikes = convertViews(proSnippet.likes);

			//comments
			proSnippet.comments = postArray[i].comments.summary.total_count;
			proSnippet.commaSeparatedComments = convertViews(proSnippet.comments);

			//date
    		proSnippet.date = postArray[i].created_time;
			proSnippet.formattedDate = convertDate(proSnippet.date);

			processesPostArray.push(proSnippet);
    	}

    	settings.postList = settings.postList.concat(processesPostArray);    
    	return processesPostArray;

    	
    },    

    
    updateTabs = function(tabId,pageDetails,$famaxPro){

    	var $facebookTab = $famaxPro.find("#"+tabId);
    	var pageId = pageDetails.id;
    	var finalTabId,tabType;

    	tabType = tabId.substring(0,tabId.indexOf("-",17)+1);

    	finalTabId = tabType+pageId;
    	$facebookTab.attr("id",finalTabId);

    	if(settings.defaultTab==$facebookTab.text()) {
			$facebookTab.click();
		}

    },


	displayItems = function(postArray,$famaxPro) {

		var viewboxHTML, dateboxHTML, trendBoxHTML, itemboxHTML, playIconHTML, likeStringHTML, commentStringHTML, sortOrder, containerHTML="";
		var image, likes, comments, viewsPerDay, message, date, link, id, popupLink, popupClass, type;
		var sortOrder = $famaxPro.find("#fp-sort-order").val();
		var $facebookContainer = $famaxPro.find(".fp-item-container");
		var list = postArray;		
		//list = settings.postList

		if(sortOrder=="popular-first") {
			list.sort(popularFirstComparator);
		} else if(sortOrder=="recent-first") {
			list.sort(latestFirstComparator);
		}

		if(settings.clearListOnDisplay) {
			clearList($famaxPro);
		}

		for(var count=0; count<list.length; count++) {			
            image = list[count].image;
			likes = list[count].commaSeparatedLikes;
			comments = list[count].commaSeparatedComments;
			//viewsPerDay = list[count].viewsPerDay;
			message = list[count].processedMessage;
			//description = list[count].description;
			date = list[count].formattedDate;
            link = list[count].link;
            id = list[count].postId;

            type = list[count].type;
			
			
			if(type=="video") {
				playIconHTML = "<div class='fp-play-box'><div class='fp-play-icon'><i class='fa fa-play'></i></div></div>";
				popupLink = link;
            	popupClass = "mfp-iframe";
			} else if(type=="link") {
				playIconHTML = "<div class='fp-play-box'><div class='fp-play-icon'><i class='fa fa-link'></i></div></div>";
				popupLink = link;
				popupClass = "mfp-link";
			} else if(type=="photo") {
				playIconHTML = "";
				popupLink = image;
            	popupClass = "mfp-image";
			} else if(type=="event") {
				popupLink = link;
				playIconHTML = "<div class='fp-play-box'><div class='fp-play-icon'><i class='fa fa-calendar'></i></div></div>";
				popupClass = "mfp-link";
			} else if(type=="status") {
				popupLink = link;
				playIconHTML = "";
				popupClass = "mfp-status";
			} else {
				popupLink = link;
				playIconHTML = "";
				popupClass = "mfp-status";
			}

			if(null==image) {
				image = "./images/link.png";
			}

			likeStringHTML = "<div class='fp-view-string fp-likes'><i class='fa fa-thumbs-o-up'></i><span>"+likes+"</span></div>";

			commentStringHTML = "<div class='fp-view-string fp-comments'><i class='fa fa-comment-o'></i><span>"+comments+"</span></div>";
		
			dateboxHTML = "<div class='fp-date-bucket'>"+date+"</div>";

			itemboxHTML = "<div class='fp-item' id='"+id+"'><div class='fp-focus "+popupClass+"' href='"+popupLink+"' data-link='"+link+"'><div class='fp-thumbnail'><img src='"+image+"''>"+playIconHTML+"</div><br/></div><div class='fp-text'><div class='fp-title-description-wrapper'><div class='fp-title'>"+message+"</div></div>"+"<div class='fp-separator-for-grid'></div>"+likeStringHTML+commentStringHTML+dateboxHTML+"</div></div>";

			containerHTML += "<div class='fp-item-wrapper'>"+itemboxHTML+"</div>";

		}

		$facebookContainer.append(containerHTML);

	},




	displayAlbums = function(postArray,$famaxPro) {

		var viewboxHTML, dateboxHTML, trendBoxHTML, itemboxHTML, playIconHTML, countDisplayHTML, countStringHTML, sortOrder, containerHTML="";
		var image, likes, comments, viewsPerDay, message, date, link, id, popupLink, popupClass, type, photoCount;
		var sortOrder = $famaxPro.find("#fp-sort-order").val();
		var $facebookContainer = $famaxPro.find(".fp-item-container");
		var list = postArray;		
		//list = settings.postList

		if(sortOrder=="popular-first") {
			list.sort(popularFirstComparator);
		} else if(sortOrder=="recent-first") {
			list.sort(latestFirstComparator);
		}

		if(settings.clearListOnDisplay) {
			clearList($famaxPro);
		}

		for(var count=0; count<list.length; count++) {			
            image = list[count].image;
			message = list[count].processedMessage;
			date = list[count].formattedDate;
            link = list[count].link;
            id = list[count].postId;

            type = list[count].type;
			
		
			popupLink = link;
			playIconHTML = "";
			popupClass = "";

			photoCount = list[count].photoCount;

			countStringHTML = "<div class='fp-count-string'>"+photoCount+" photos</div>";

			countDisplayHTML = "<div class='yl-playlist-video-count-wrapper'><div class='yl-playlist-video-count-box'><span class='yl-playlist-video-count'>"+photoCount+"</span><br>PHOTOS<br><div class='yl-playlist-line-wrapper'><span class='yl-playlist-line'></span><br><span class='yl-playlist-line'></span><br><span class='yl-playlist-line'></span></div></div></div>";
			
			dateboxHTML = "<div class='fp-date-bucket'>"+date+"</div>";

			itemboxHTML = "<div class='fp-item' id='"+id+"'><div class='fp-focus "+popupClass+"' href='"+popupLink+"' data-link='"+link+"'><div class='fp-thumbnail'><img src='"+image+"''>"+playIconHTML+"</div><br/>"+countDisplayHTML+"</div><div class='fp-text'><div class='fp-title-description-wrapper'><div class='fp-title'>"+message+"</div></div>"+"<div class='fp-separator-for-grid'></div>"+countStringHTML+dateboxHTML+"</div></div>";

			containerHTML += "<div class='fp-item-wrapper'>"+itemboxHTML+"</div>";

		}

		$facebookContainer.append(containerHTML);

	},



	displayPopupData = function($baseElement,$famaxPro) {

		var popupTitleHTML,popupDescriptionHTML,popupMoreHTML,postLikesHTML,postCommentsHTML,postAddCommentHTML,facebookShareHTML,facebookLikeHTML,facebookCommentHTML,googleShareHTML,twitterShareHTML,addLikeButton;
		var postId, title, likes, description, link, encodedLink;
		var $popupBox,$photoLink;

		setTimeout(function(){

			$popupBox = $("#fp-popup-details");
			$photoLink = $(".fp-photo-link");

			postId = $baseElement.attr("id");
			title = $baseElement.find(".fp-title").html();
			likes = $baseElement.find(".fp-view-string span").html();
			//description = $baseElement.find(".yl-description").html();
			
			link = $baseElement.find(".fp-focus").data("link");
			encodedLink = encodeURIComponent(link);

			addLikeButton = "<a href='"+link+"' target='_blank'><div class='fp-post-like-button'><i class='fa fa-facebook-official'></i><i class='fa fa-thumbs-up'></i></div></a>";

			popupTitleHTML = "<div class='fp-popup-title'>"+title+"</div>";
			postLikesHTML = "<div class='fp-post-like-box'><div class='fp-post-like-count'>"+likes+"<br><span>likes</span></div><div class='fp-post-likes'></div>"+addLikeButton+"</div>";
			
			postAddCommentHTML = "<div class='fp-add-comment-box'><input type='text' id='fp-add-comment-text' placeholder='Write a Facebook comment..' /><div class='fp-add-comment-button' data-postid='"+postId+"'><i class='fa fa-facebook-official'></i>Post</div></div>";
			postCommentsHTML = "<div class='fp-post-comment-box'><div class='fp-post-comments'></div></div>";
			
			/*
			facebookLikeHTML = "<div data-postid='"+postId+"' class='fp-popup-button fp-like'><i class='fa fa-thumbs-up'></i></div>";
			facebookShareHTML = "<div onclick=\"window.open('https://www.facebook.com/sharer.php?u="+encodedLink+"','facebook','width=500,height=350');\" class='fp-popup-button fp-share'><i class='fa fa-share'></i></div>";
			facebookCommentHTML = "<a href='"+link+"' target='_blank'><div class='fp-popup-button fp-comment'><i class='fa fa-comment'></i></div></a>";
			*/

			facebookShareHTML = "<div onclick=\"window.open('https://www.facebook.com/sharer.php?u="+link+"','facebook','width=500,height=350');\" class='fp-popup-button'><i class='fa fa-facebook'></i></div>";
			twitterShareHTML = "<div onclick=\"window.open('https://twitter.com/share?url="+link+"','facebook','width=500,height=350');\" class='fp-popup-button'><i class='fa fa-twitter'></i></div>";
			googleShareHTML = "<div onclick=\"window.open('https://plus.google.com/share?url="+link+"','facebook','width=500,height=350');\" class='fp-popup-button'><i class='fa fa-google'></i></div>";



			//<a target='_blank' href='https://www.facebook.com/sharer.php?u="+link+"'>
			$popupBox.empty();

			$popupBox.append("<div class='fp-right-section'>"+popupTitleHTML+postLikesHTML+postAddCommentHTML+postCommentsHTML+"</div>"+"<div class='fp-left-section'>"+facebookShareHTML+twitterShareHTML+googleShareHTML+"</div>");

			getPostLikes(postId);
			getPostComments(postId);

			if($popupBox.width()<500) {
				$("body").addClass("fp-simple-popup");
			} else {
				$("body").removeClass("fp-simple-popup");
			}

			if($photoLink!=null) {
				$photoLink.html("<i class='fa fa-facebook'></i>").unwrap().wrap("<a href='"+link+"' target='_blank'></a>");
			}

		}, 100);
		
	},

	displayPostLikes = function(likeArray, $famaxPro) {

		for(var i=0; i<likeArray.length; i++) {

			$(".fp-post-likes").append("<img src='"+likeArray[i].pic_square+"' />");

		}

	},


	displayPostComments = function(commentArray, $famaxPro) {

		var userImage;

		for(var i=0; i<commentArray.length; i++) {

			userImage = "https://graph.facebook.com/v2.8/"+commentArray[i].from.id+"/picture?access_token="+settings.accessToken;

			$(".fp-post-comments").append("<div class='fp-comment'><div class='fp-comment-img'><img class='fp-comment-from-img' src='"+userImage+"' /></div><div class='fp-comment-text'><span>"+commentArray[i].from.name+"</span><br> "+commentArray[i].message+"</span></div>");

		}

	},

	clearList = function($famaxPro) {
		$famaxPro.find(".fp-item-container").empty();
	},

    videoDisplayMechanism = function($famaxPro){

    	if(settings.itemDisplayMode=="popup") {
			registerPopup($famaxPro);	
		} else {
			registerLinkToFacebook(".fp-focus",$famaxPro);
		}

		registerLinkToFacebook(".mfp-link",$famaxPro);

    },

    registerPopup = function($famaxPro) {

    	var currentTabId;

    	$famaxPro.find(".mfp-image,.mfp-iframe").magnificPopup({

			gallery: {
				enabled:true
			},

			image: {
				markup: '<div class="fp-popup">'+
				'<div class="mfp-figure">'+
				'<div class="mfp-close"></div>'+
				'<div class="mfp-img"></div>'+
				'<div id="fp-popup-details"></div>'+
				'<div class="fp-photo-link"></div>'+
				'</div>',

				verticalFit: true, // Fits image in area vertically

			},

			iframe:{

				markup: '<div class="mfp-iframe-scaler">'+
				'<div class="mfp-close"></div>'+
				'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
				'<div id="fp-popup-details"></div>'+
				'</div>',
   
    			patterns: {
					facebook : {
						index: 'facebook.com/',
						//id: '/videos/',
						//src: 'http://www.facebook.com/video/embed?video_id=%id%&autoplay=1'
						id: null,
						src: 'https://www.facebook.com/plugins/video.php?href=%id%&show_text=false&width=1000'
					},
				}
    		},
			

			callbacks: {

				markupParse: function(template, values, item) {
					// Triggers each time when content of popup changes
					
					$('.famax-fb-fix').remove();

					if(item.src.indexOf("facebook.com")!=-1 && item.src.indexOf("/videos/")!=-1 && null!=item.el) {
						
						var naturalWidth = item.el[0].clientWidth;
						var naturalHeight = item.el[0].clientHeight;
						var aspectRatio = naturalHeight/naturalWidth;

						var calculatedHeight = naturalHeight;
						var calculatedWidth = naturalWidth;
					
						calculatedHeight=430;
						calculatedWidth = calculatedHeight/aspectRatio;
						
						
						var style = $('<style class="famax-fb-fix">.mfp-content { width: '+calculatedWidth+'px !important; height: '+calculatedHeight+'px !important; }</style>');
						$('html > head').append(style);
						
					}
				},

				change: function() {
						
					// Triggers each time when content of popup changes
					var $baseElement = $(this.currItem.el[0].offsetParent);
					displayPopupData($baseElement,$famaxPro);
					
				}			


			},

			closeBtnInside:true,
			preloader: true,
			alignTop: settings.popupAlignTop,
			closeOnContentClick: false, 
			closeOnBgClick: false, 
			enableEscapeKey: true, 

		});

    },

    registerLinkToFacebook = function(itemIdentifier,$famaxPro) {

    	$famaxPro.find(itemIdentifier).each(function(i,v){
    		var $focusElement = $(v);
    		var link = $focusElement.data("link");
    		$focusElement.wrap("<a href='"+link+"' target='_blank'></a>");
    	});

    },

    registerAlbumNavigation = function($famaxPro) {

        $famaxPro.find(".fp-focus").click(function(){
            var $item = $(this).parent(".fp-item");
            var albumId = $item.attr("id");
            var albumTitle = $item.find(".fp-title").text();
            var $currentTab = $famaxPro.find(".fp-selected-tab");
            var $albumTab = $famaxPro.find(".fp-showing-album-name");

            //remove selected tab
            $currentTab.removeClass("fp-selected-tab");

            //set last tab id
            settings.previousTabId = $currentTab.attr("id");

            //set playlist name
            $albumTab.data("album-name",albumTitle).attr("id","facebook-album-photos-"+albumId).addClass("fp-playlist-tab");

            handlePlaylistTabClick($albumTab,$famaxPro);

        });

    },


	popularFirstComparator = function(a,b) {
		return b.likes - a.likes;
	},

	latestFirstComparator = function(a,b) {
		return (new Date(b.date).getTime()) - (new Date(a.date).getTime());
	},	

	handleSortOrders = function($famaxPro) {
		
		var seenVideos = [];
		
		$('#fp-sort-order').change(function() {
	        
			showLoader($famaxPro);
			//not needed as list is cleared in show loader
			//clearList($famaxPro);
			
			displayItems(settings.postList,$famaxPro);
			videoDisplayMechanism($famaxPro);
		});

		$famaxPro.find("#fp-sort-order").val(settings.defaultSortOrder);
	
	},

	handleTabs = function ($famaxPro) {


		$famaxPro.on("click",".fp-tab",function() {

            handleTabClick($(this),$famaxPro);
		
        });

        $famaxPro.on("click",".fp-playlist-tab",function() {

            //go back to last tab
            var previousTabId = settings.previousTabId;
            $famaxPro.find("#"+previousTabId).click();
        
        });


		
	},



    handleTabClick = function($tab,$famaxPro) {

        clearSettings();
        showLoader($famaxPro);

        //add selected tab class to current tab
        $famaxPro.find(".fp-tab").removeClass("fp-selected-tab");
	    $tab.addClass("fp-selected-tab");

        displayTabItems($famaxPro);

    },


    handlePlaylistTabClick = function($tab,$famaxPro) {

        var albumName;

        clearSettings();
        showLoader($famaxPro);

        //add selected tab class to current tab
        $famaxPro.find(".fp-tab").removeClass("fp-selected-tab");
	    $tab.addClass("fp-selected-tab");

        albumName = $tab.data("album-name");
        $tab.append("<i class='fa fa-chevron-left'></i> Showing album: "+albumName).show();

        displayTabItems($famaxPro);

    },



    displayTabItems = function($famaxPro) {

    	//get selected tab and handle the tab click
		var tabId = $famaxPro.find(".fp-selected-tab").attr("id");
    	var identifier = tabId.substring(tabId.indexOf("-",17)+1);

    	if(tabId.indexOf("facebook-page-posts")!=-1) {
    		getPagePosts(identifier,$famaxPro);
    	} else if(tabId.indexOf("facebook-page-photos")!=-1) {
    		getPagePhotos(identifier,$famaxPro);    		
    	} else if(tabId.indexOf("facebook-page-videos")!=-1) {
    		getPageVideos(identifier,$famaxPro);    		
    	} else if(tabId.indexOf("facebook-page-albums")!=-1) {
    		getPageAlbums(identifier,$famaxPro);    		
    	} else if(tabId.indexOf("facebook-album-photos")!=-1) {
    		getAlbumPhotos(identifier,$famaxPro);    		
    	} 

    },

    handleSearch = function($famaxPro) {

    	var searchText;

    	$famaxPro.on('keyup','.fp-channel-search-input', function (e) {
			if (e.keyCode == 13) {
			
				clearSettings();	    		
	    		showLoader($famaxPro);
				displaySearchItems($famaxPro);
				
				return false;
			}
		});

    },

    displaySearchItems = function($famaxPro) {

    	var searchText;

		//set search flag as sorting needs to be doen on relevance
		settings.searchFlag = true;

		searchText = $famaxPro.find('.fp-channel-search-input').val().replace(/ /g,"%20");
    	getSearchVideos(searchText,$famaxPro);

    },


	handlePopupButtons = function($famaxPro) {

		/*$("body").on("click",".fp-video-iframe-hover",function() {
			$(this).remove();
			//$(".mfp-content .mfp-iframe").click();
			return true;
		});*/

		

		$(document).on("click", ".fp-popup-button.fp-like", function(){
			handleFacebookLikes();
		});


		$(document).on("click", ".fp-add-comment-button", function(){
			handleFacebookComments();
		});



		$("body").on("click",".mfp-wrap",function(e){ 

			if (e.target.id == "fp-popup-details" || $(e.target).parents("#fp-popup-details").length>0 || e.target.tagName=="BUTTON") { 
	            //do nothing
	        } else { 
	           $.magnificPopup.close(); 
	        }
			
		});

		//$("body").on("click",".fp-popup-details",function(){ return false; });



	},

	handleLoadMoreButton = function($famaxPro) {

		$famaxPro.on('click','.fp-load-more-button', function(){

			var tabId;

			//do nothing if next token is not present
			if(settings.nextPageToken==null) {
				return;
			}

			//do not clear list during load mores
			settings.clearListOnDisplay = false;

			$(this).html("Loading..").addClass("fp-loading");

			if(settings.searchFlag) {
				//displaySearchItems($famaxPro);
			} else {
				displayTabItems($famaxPro);	
			}
			

		});

	},

	handleFamaxDisplay = function($famaxPro) {

		/*
		if(settings.famaxDisplayMode=="double-list") {
			if($famaxPro.width()>=settings.responsiveBreakpoints[1]) {
	    		$famaxPro.addClass("fp-double-list").removeClass("fp-grid");
	    	} else if($famaxPro.width()<settings.responsiveBreakpoints[1]) {
				$famaxPro.removeClass("fp-double-list").removeClass("fp-grid");
			} else if($famaxPro.width()<settings.responsiveBreakpoints[0]) {
				$famaxPro.addClass("fp-grid").removeClass("fp-double-list");
			}
		}

		if(settings.famaxDisplayMode=="list") {
			if($famaxPro.width()<settings.responsiveBreakpoints[0]) {
				$famaxPro.addClass("fp-grid");
			} else {
				$famaxPro.removeClass("fp-grid");
			}
		}*/

		if(settings.famaxDisplayMode=="grid") {
    		$famaxPro.addClass("fp-grid");
    		if($famaxPro.width()<settings.responsiveBreakpoints[0]) {
    			$famaxPro.addClass("fp-1-col-grid").removeClass("fp-2-col-grid fp-3-col-grid fp-4-col-grid fp-4-col-grid");
    		} else if($famaxPro.width()<settings.responsiveBreakpoints[1]) {
    			$famaxPro.addClass("fp-2-col-grid").removeClass("fp-1-col-grid fp-3-col-grid fp-4-col-grid fp-5-col-grid");
    		} else if($famaxPro.width()<settings.responsiveBreakpoints[2]) {
    			$famaxPro.addClass("fp-3-col-grid").removeClass("fp-1-col-grid fp-2-col-grid fp-4-col-grid fp-5-col-grid");
    		} else if($famaxPro.width()<settings.responsiveBreakpoints[3]) {
    			$famaxPro.addClass("fp-4-col-grid").removeClass("fp-1-col-grid fp-2-col-grid fp-3-col-grid fp-5-col-grid");
    		} else {
    			$famaxPro.addClass("fp-5-col-grid").removeClass("fp-1-col-grid fp-2-col-grid fp-3-col-grid fp-4-col-grid");
    		}

    	}

    	/*
    	//set callout View - grid|list|double-list
    	if(settings.calloutType=="list") {
    		$famaxPro.addClass("fp-list-callouts");
    	} else if(settings.calloutType=="grid") {
    		$famaxPro.addClass("fp-grid-callouts");
    	} else if(settings.calloutType=="double-list") {
    		$famaxPro.addClass("fp-double-list-callouts");
    	} */

	},

	handleResize = function($famaxPro){

		$(window).resize(function() {
			handleFamaxDisplay($famaxPro);
		});

	},

	showLoader = function($famaxPro) {

		$famaxPro.find(".fp-inline-container").empty();
		$famaxPro.find(".fp-item-container").empty().append("<div class='fp-loader'>Famax<br><span>is loading..</span></div>");

		$famaxPro.find(".fp-showing-album-name").empty().hide();
	},


    saveSeenVideos = function($famaxPro) {
        
        var seenVideos = [];

        $famaxPro.find(".fp-seen").each(function(){
            seenVideos.push($(this).attr("id"));
        });

        return seenVideos;
    },

    highlightSeenVideos = function(seenVideos,$famaxPro) {
        
        for(var k=seenVideos.length;k>=0;k--) {
            $famaxPro.find("#"+seenVideos[k]).addClass("fp-seen");
        }
        
    },

    convertViews = function(views) {
    			
		var commaSeparatedViews = "";
		views = ""+views;
		
		while(views.length>0) {
			if(views.length > 3) {
				commaSeparatedViews = ","+views.substring(views.length-3)+commaSeparatedViews;
				views = views.substring(0,views.length-3);
			} else {
				commaSeparatedViews = views + commaSeparatedViews;
				break;
			}
		}
		
		return commaSeparatedViews;
    },

    convertDate = convertToSpecificDate,

	convertToSpecificDate = function(date) {
		//date incoming format "2016-08-26T21:48:14.000Z"
		var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
		var innerDate = date.substring(0,date.indexOf("T"));
		var splitDate = innerDate.split("-");
		//var returnDate = splitDate[2]+"-"+months[splitDate[1]-1]+"-"+splitDate[0];
		var returnDate = "<div class='fp-date'>"+splitDate[2]+"</div><div class='fp-month'>"+months[splitDate[1]-1]+"</div><div class='fp-year'>"+splitDate[0]+"</div>";

		//date outgoing format "26 Aug 2016"
		return returnDate;
	},

	convertToRelativeDate = function (timestamp) {
	
		var dateDiffMS, dateDiffHR, dateDiffDY, dateDiffMH, dateDiffYR;
		if(null==timestamp||timestamp==""||timestamp=="undefined")
			return "?";

		//safari Nan Bug fix
		var a = timestamp.split(/[^0-9]/);
		timestamp = new Date (a[0],a[1]-1,a[2],a[3],a[4],a[5] );
		
		dateDiffMS = Math.abs(new Date() - new Date(timestamp));
		console.log(timestamp);
		
		dateDiffHR = dateDiffMS/1000/60/60;
		if(dateDiffHR>24) {
			dateDiffDY = dateDiffHR/24;
			if(dateDiffDY>30) {
				dateDiffMH = dateDiffDY/30;
				if(dateDiffMH>12) {
					dateDiffYR = dateDiffMH/12;
					dateDiffYR = Math.round(dateDiffYR);
					if(dateDiffYR<=1) {
						return dateDiffYR+" <span>year ago</span>";
					} else {
						return dateDiffYR+" <span>years ago</span>";
					}						
				} else {
					dateDiffMH = Math.round(dateDiffMH);
					if(dateDiffMH<=1) {
						return dateDiffMH+" <span>month ago</span>";
					} else {
						return dateDiffMH+" <span>months ago</span>";
					}						
				}
			} else {
				dateDiffDY = Math.round(dateDiffDY);
				if(dateDiffDY<=1) {
					return dateDiffDY+" <span>day ago</span>";
				} else {
					return dateDiffDY+" <span>days ago</span>";
				}
			}
		} else {
			dateDiffHR = Math.round(dateDiffHR);
			if(dateDiffHR<1) {
				return "just now";
			}else if(dateDiffHR==1) {
				return dateDiffHR+" <span>hour ago</span>";
			} else {
				return dateDiffHR+" <span>hours ago</span>";
			}
		}		

	
	},

	processMessage = function(message,message_tags) {

		var tag, id, spotArray, replaceLink;

		if(null==message) {
			return "";
		}

		message = message.replace(/"/g, "'");
		message = message.replace(/\n/g," <br> ");

		//replace links
		spotArray = message.match(/(http(s)*:\/\/|www\.).+?(\s|\n|$)/g);
		
		if(null!=spotArray) {
			for(var i=0;i<spotArray.length;i++) {
				spotArray[i] = spotArray[i].trim();
				message = message.replace(spotArray[i],"~~"+i+"~~");
			}

			for(var i=0;i<spotArray.length;i++) {

				if(spotArray[i].indexOf("www.")==0) {
					replaceLink = "http://"+spotArray[i];
				} else {
					replaceLink = spotArray[i];
				}
				message = message.replace("~~"+i+"~~","<a target='_blank' href='"+replaceLink+"' class='famax-link'>"+spotArray[i]+"</a>");
			}
		}

		

		//replace hahstags
		//spotArray = message.match(/#\w+\s*/g);
		spotArray = message.match(/#\w+?(\s|\n|$|\.)/g);
		if(null!=spotArray) {
			for(var i=0;i<spotArray.length;i++) {
				spotArray[i] = spotArray[i].trim();
				message = message.replace(spotArray[i],"~~"+i+"~~");
			}

			for(var i=0;i<spotArray.length;i++) {

				replaceLink = "https://www.facebook.com/hashtag/"+spotArray[i].trim().replace("#","");

				message = message.replace("~~"+i+"~~","<a target='_blank' href='"+replaceLink+"' class='famax-link'>"+spotArray[i]+"</a>");
			}
		}


		//replace message tags
		if(null==message_tags) {
			return message;
		}

		for(var i=0; i<message_tags.length; i++) {
			
			tag= message_tags[i].name;
			//offset= message_tags[i].offset;
			id= message_tags[i].id;

			message = message.replace(tag,"<a target='_blank' href='https://www.facebook.com/"+id+"'>"+tag+"</a>");

		}

		


		return message;

	}, 

	handleFacebookLikes = function() {

		var postId = $(".fp-popup-button.fp-like").data("postid");

		if(settings.famaxLoggedInUser.token==null) {
			famaxLoginToFacebook("like",postId);
		} else {

			famaxPostLike(postId);

		}

	},


	handleFacebookComments = function() {

		var postId = $(".fp-add-comment-button").data("postid");

		if(settings.famaxLoggedInUser.token==null) {
			famaxLoginToFacebook("comment",postId);
		} else {

			famaxPostComment(postId);

		}

	},


	famaxPostLike = function(postId) {
		
		var postCommentURL = "https://graph.facebook.com/v2.4/"+postId+"/likes";
		
		$.ajax({
			url: postCommentURL,
			type: 'post',
			crossDomain: true,
			data: { access_token:settings.famaxLoggedInUser.token },
			//contentType: "application/atom+xml",
			beforeSend: function(xhr){
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			},
			success: function (data, status) {
				$(".fp-post-likes").prepend("<img src='"+settings.famaxLoggedInUser.picture+"' />")
			},
			error: function (xhr, desc, err) {
				alert("Could not add Like");
				console.log(err);
			}
		});
	
	},



	famaxPostComment = function(postId) {
		
		var postCommentURL = "https://graph.facebook.com/v2.4/"+postId+"/comments";
		var comment = $("#fp-add-comment-text").val();
		
		$.ajax({
			url: postCommentURL,
			type: 'post',
			crossDomain: true,
			data: { 
				message:comment,
				access_token:settings.famaxLoggedInUser.token 
			},
			//contentType: "application/atom+xml",
			beforeSend: function(xhr){
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			},
			success: function (data, status) {
				$(".fp-post-comments").prepend("<div class='fp-comment'><span>@"+settings.famaxLoggedInUser.name+":</span> "+comment+"</div>");
				$("#fp-add-comment-text").val("");		
			},
			error: function (xhr, desc, err) {
				alert("Could not add Comment");
				console.log(err);
			}
		});
	
	},
	
	

	famaxLoginToFacebook = function(action,postId) {

		FB.login(function(response) {

			if (response.status === 'connected') {
				// Logged into your app and Facebook.
				settings.famaxLoggedInUser.token = response.authResponse.accessToken;
				saveUserName(action,postId);
				
			} else if (response.status === 'not_authorized') {
				// The person is logged into Facebook, but not your app.
			} else {
				// The person is not logged into Facebook, so we're not sure if
				// they are logged into this app or not.
			}
		}, {scope: 'publish_actions'});

	},

	
	saveUserName = function (action,postId) {
		FB.api('/me', function(response) {
			settings.famaxLoggedInUser.name = response.name;
			settings.famaxLoggedInUser.id = response.id;
		});
		FB.api('/me/picture', function(response) {
			settings.famaxLoggedInUser.picture = response.data.url;
			if(action=="like") {
				famaxPostLike(postId);	
			} else if(action=="comment") {
				famaxPostComment(postId);
			}
		});
	},


	handleFacebookLogin = function(){

		//Facebook Login script
		$.getScript( "http://connect.facebook.net/en_US/sdk.js" )
		.done(function( script, textStatus ) {
			FB.init({
				appId      : settings.appId,
				cookie     : true, 
				xfbml      : false, 
				version    : 'v2.8'
			});
		})
		.fail(function( jqxhr, settings, exception ) {

		});

	};


	$.fn.famaxPro=function(options) {

		var $famaxPro=this;
		settings = $.extend(settings,options);

		init($famaxPro);
		doOptions($famaxPro);
		initHeader($famaxPro);

		handleTabs($famaxPro);
		createTabs($famaxPro);
		
		handleLoadMoreButton($famaxPro);
		handlePopupButtons($famaxPro);
		
		handleSortOrders($famaxPro);
		handleResize($famaxPro);

		handleFacebookLogin($famaxPro);
		

		return this;

	}


})(jQuery);

