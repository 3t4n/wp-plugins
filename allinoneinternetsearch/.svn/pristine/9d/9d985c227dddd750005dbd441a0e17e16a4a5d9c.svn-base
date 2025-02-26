function buildTitle(title,link) {
  return '<li><a target="_blank" href="'+link+'">'+title+'</a></li>';
}

var global_terms = new Array();
var global_max = 1;
//var feed_loaded=false;

function initialize() {

  for (var i=0;i<global_terms.length;i++)
  { 
      loadRSS(global_terms[i],i);
  } 

}

function loadRSS(query,order) {

      var feed = new google.feeds.Feed("https://news.google.com/news/feeds?&q="+query+"&um=1&ie=UTF-8&output=rss&ned="+countryGNAW);
      feed.setNumEntries(20);
      feed.load(function(result) {
        if (result.feed.entries.length==0) {
          jQuery("#internet_search #element-wrapper"+order).remove();
          return;
        }
        var results = jQuery("#internet_search #element"+order);
        if (!result.error) {
          var limit = result.feed.entries.length;
          if (limit>global_max){ 
              limit = global_max;
          }
          for (var i = 0; i < limit; i++) {
            //alert(JSON.stringify(entry));
            var entry = result.feed.entries[i];
            results.append(buildTitle(entry.title,entry.link));
          }
        }

      });

}

function news_call(terms,max){ 
  global_terms = terms;
  global_max = max;
  google.load("feeds", "1"); 
  google.setOnLoadCallback(initialize);
}