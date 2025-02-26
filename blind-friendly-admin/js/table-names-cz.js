(function($) {
function parseURL(url) {
    var a =  document.createElement('a');
    a.href = url;
    return {
        query: a.search
    };
}

var currentLocation = window.location;
var myURL = parseURL(currentLocation);

 if(myURL.query == "?taxonomy=category") {
  $(function() {
    var form = document.getElementsByClassName("wp-list-table");
    form[0].setAttribute('title', 'Tabulka rubrik');

    });
 }
 else if(myURL.query == "?taxonomy=post_tag") {
  $(function() {
    var form = document.getElementsByClassName("wp-list-table");
    form[0].setAttribute('title', 'Tabulka štítků');

    });
 }                   
                  
})(jQuery);