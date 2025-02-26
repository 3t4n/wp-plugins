if(document.getElementsByClassName("post-body").length > 0){
var readerTime = 30; //parseFloat((180 - WortAnZahl.ASL - (58,5 *(WortAnZahl.silben/WortAnZahl.anzahl))).toFixed(0))
var BilderS = {Anzahl: 0,a: document.querySelectorAll("img")};
var readerLocation = 150; // # px before tracking a reader
var callBackTime = 100; // Default time delay before checking location
// Set some flags for tracking & execution
var timer = 0;
var contentLength = 0; // Content Length -> Length of content area
var scroller = false;
var endContent = false;
var didComplete = false;
// Set some time variables to calculate reading time etc.
var pageTimeLoad = 0;
var scrollTimeStart = 0;
var timeToScroll = 0;
var contentTime = 0;
var endTime = 0;
for(i=0; i<BilderS.a.length; i++)
{if(BilderS.a[i].className.indexOf("wp-image") !=-1){
BilderS.Anzahl = BilderS.Anzahl + 1; }}
jQuery(function($) {
// Check if content has to be scrolled
if ($(window).height() < $('.post-body').height()) { // Replace contentArea with the name (class or ID) of your content wrappers name
	pageTimeLoad = new Date().getTime();
	contentLength = $('.post-body').height();
//_gaq.push(['_trackEvent','Page Scroll','Page Scroll: Allowed',window.location.pathname,contentLength,true]);
gtag('event', 'Allowed', {
  'event_label': window.location.pathname +""+ contentLength,
  'event_category': 'Page Scroll',
  'non_interaction': true
    });
console.log("alowed");
}
// Check the location and track user
function trackLocation() {
	bottom = $(window).height() + $(window).scrollTop();
	height = $(document).height();
// If user has scrolled beyond threshold send an event
if (bottom > readerLocation && !scroller) {
	scroller = true;
	scrollTimeStart = new Date().getTime();
		if (pageTimeLoad > 0) {
		timeToScroll = Math.round((scrollTimeStart-pageTimeLoad)/1000);
		} else { 
		timeToScroll = ""
}
// Article scroll started
//_gaq.push(['_trackEvent','Page Scroll','Page Scroll: Started',window.location.pathname,timeToScroll,true]);
gtag('event', 'Started', {
  'event_label': window.location.pathname +""+ timeToScroll,
  'event_category': 'Page Scroll',
  'non_interaction': true
    });
console.log("started");
}
// If user has hit the bottom of the content send an event
if (bottom >= $('.post-body').scrollTop() + $('.post-body').innerHeight() && !endContent) {
	timeToScroll = new Date().getTime();
	contentTime = Math.round((timeToScroll-scrollTimeStart)/1000);
		if (contentTime < readerTime) {
//_gaq.push(['_trackEvent','Page Scroll','Page Scroll: Content Scanner',window.location.pathname,contentTime,true]);
gtag('event', 'Content Scanner', {
  'event_label': window.location.pathname +""+ contentTime,
  'event_category': 'Page Scroll',
  'non_interaction': true
    });
console.log("Content Scanner");
		} else {
//_gaq.push(['_trackEvent','Page Scroll','Page Scroll: Content Reader',window.location.pathname,contentTime,true]);
gtag('event', 'Content Reader', {
  'event_label': window.location.pathname +" "+ contentTime,
  'event_category': 'Page Scroll',
  'non_interaction': true
    });
console.log("contentReader");
		}
endContent = true;
}
// If user has hit the bottom send an event
if (bottom == height && !didComplete) {
	endTime = new Date().getTime();
	totalTime = Math.round((endTime - scrollTimeStart)/1000);
//_gaq.push(['_trackEvent','Page Scroll','Page Scroll: Page Bottom',window.location.pathname,totalTime,true]);
gtag('event', 'Page Bottom', {
  'event_label': window.location.pathname +" "+ totalTime,
  'event_category': 'Page Scroll',
  'non_interaction': true
    });
	didComplete = true;
	}
}
// Track the scrolling and track location
$(window).scroll(function() {
	if (timer) {
	clearTimeout(timer);
}
// Use a buffer so we don't call trackLocation too often.
timer = setTimeout(trackLocation, callBackTime);
});
});
};