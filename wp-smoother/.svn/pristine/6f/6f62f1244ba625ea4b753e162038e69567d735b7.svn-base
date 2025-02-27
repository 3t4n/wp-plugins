<?php header("Content-type: text/css; charset: UTF-8"); ?>

body {
        animation: fadein <?php if (is_numeric($_GET['wpsmoother_fade_duration'])) { echo $_GET['wpsmoother_fade_duration']; } else { echo '1200'; } ?>ms;
    -moz-animation: fadein <?php if (is_numeric($_GET['wpsmoother_fade_duration'])) { echo $_GET['wpsmoother_fade_duration']; } else { echo '1200'; } ?>ms; /* Firefox */
    -webkit-animation: fadein <?php if (is_numeric($_GET['wpsmoother_fade_duration'])) { echo $_GET['wpsmoother_fade_duration']; } else { echo '1200'; } ?>ms; /* Safari and Chrome */
    -o-animation: fadein <?php if (is_numeric($_GET['wpsmoother_fade_duration'])) { echo $_GET['wpsmoother_fade_duration']; } else { echo '1200'; } ?>ms; /* Opera */
}
@keyframes fadein {
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-moz-keyframes fadein { /* Firefox */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-webkit-keyframes fadein { /* Safari and Chrome */
    from {
        opacity:0;
    }
    to {
        opacity:1;
    }
}
@-o-keyframes fadein { /* Opera */
    from {
        opacity:0;
    }
    to {
        opacity: 1;
    }
}