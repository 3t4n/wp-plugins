/* Plugin Scripts */

(function($) {

// 	$( document ).ready(function() {
// 		$( '.grid' ).masonry({
// 		  	itemSelector: '.grid-item',
// 		  	columnWidth: '.grid-sizer',
// 		  	percentPosition: true
// 		});
// 	});

	/****** Premium Countdown Handler ******/
  var PremiumCountDownHandler = function($scope, $) {
    var countDownElement = $scope.find(".advanced-countdown").each(function() {
      var countDownSettings = $(this).data("settings");
      var label1 = countDownSettings["label1"],
        label2 = countDownSettings["label2"],
        newLabe1 = label1.split(","),
        newLabe2 = label2.split(",");
      if (countDownSettings["event"] === "onExpiry") {
        $(this)
          .find(".advanced-countdown-init")
          .pre_countdown({
            labels: newLabe2,
            labels1: newLabe1,
            until: new Date(countDownSettings["until"]),
            format: countDownSettings["format"],
            padZeroes: true,
            onExpiry: function() {
              $(this).html(countDownSettings["text"]);
            },
            serverSync: function() {
              return new Date(countDownSettings["serverSync"]);
            }
          });
      } else if (countDownSettings["event"] === "expiryUrl") {
        $(this)
          .find(".advanced-countdown-init")
          .pre_countdown({
            labels: newLabe2,
            labels1: newLabe1,
            until: new Date(countDownSettings["until"]),
            format: countDownSettings["format"],
            padZeroes: true,
            expiryUrl: countDownSettings["text"],
            serverSync: function() {
              return new Date(countDownSettings["serverSync"]);
            }
          });
      }
      times = $(this)
        .find(".advanced-countdown-init")
        .pre_countdown("getTimes");
      function runTimer(el) {
        return el == 0;
      }
      if (times.every(runTimer)) {
        if (countDownSettings["event"] === "onExpiry") {
          $(this)
            .find(".advanced-countdown-init")
            .html(countDownSettings["text"]);
        }
        if (countDownSettings["event"] === "expiryUrl") {
          var editMode = $("body").find("#elementor").length;
          if (editMode > 0) {
            $(this)
              .find(".advanced-countdown-init")
              .html(
                "<h1>You can not redirect url from elementor Editor!!</h1>"
              );
          } else {
            window.location.href = countDownSettings["text"];
          }
        }
      }
    });
  };
	
})( jQuery );


