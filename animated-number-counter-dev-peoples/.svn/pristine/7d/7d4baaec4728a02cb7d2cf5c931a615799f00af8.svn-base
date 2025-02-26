(function($, undefined){

  $(document).ready(function(){

    var el           = document.getElementById('score'),
        score        = 0,
        increment    = 0,
        time         = 0;

    var od = new Odometer({
        el: el,
        value: score,
    
        // Any option (other than auto and selector) can be passed in here
        format: '( ddd)',
        theme: 'minimal',
        duration: 7000,
        animation: 'numbers' 
    });    
    
    
    $.ajax({
        url: '/wp-admin/admin-ajax.php?action=get_litres',
        success: function (response) {
            score     = parseInt(response.litres);
            increment = parseInt(response.increment);
            time      = parseInt(response.time);
            time      = time * 1000;

            od.update(score);

            function addIncrementHandler(){
                score = score += increment
                od.update(score);
            }

            var addIncrement = setInterval(addIncrementHandler, time);
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        },
    });
     

  });
  
})(jQuery)

