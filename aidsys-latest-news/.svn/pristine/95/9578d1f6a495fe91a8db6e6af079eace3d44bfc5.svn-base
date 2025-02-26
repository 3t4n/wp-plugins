jQuery(document).ready(function($) {
    // Adjust ticker speed (milliseconds)
    var tickerSpeed = 5000; // 5 seconds

    // Clone the first news item and append to the end
    $('#ticker-content ul li:first-child').clone().appendTo('#ticker-content ul');

    // Start ticker animation
    function startTicker() {
        $('#ticker-content ul').animate({marginTop: '-50px'}, tickerSpeed, 'linear', function() {
            $(this).css({marginTop: 0}).find('li:first').appendTo(this);
        });
    }

    // Call startTicker function
    startTicker();

    // Restart ticker animation after a delay
    setInterval(startTicker, tickerSpeed + 1000);
});
