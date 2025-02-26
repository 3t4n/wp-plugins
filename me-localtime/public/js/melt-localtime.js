jQuery(document).ready(function() {
  
  function melt_get_local_time(){
    var currentTime = new Date();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();

    var suffix = "AM";

    if (hours >= 12) {
        suffix = "PM";
        hours = hours - 12;
    }

    if (hours == 0) {
        hours = 12;
    }

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    jQuery(".melt_localtimedisplay").each(function() {
        jQuery(this).html(hours + ":" + minutes + " " + suffix);
    });
  }

  setInterval(function(){
    melt_get_local_time()
  }, 30000)

  melt_get_local_time();

});
