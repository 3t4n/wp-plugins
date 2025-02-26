<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$link = explode ('/', $actual_link);
$without = end($link);
$reallink = '/';
$counter = 0;
$minReq = 3;
foreach ($link as $url){
    if ($url != $without && ++$counter > $minReq){
        $reallink.= $url . '/';
    }
}
?>

function downloadJSAtOnload() {
var element = document.createElement("script");
element.src = "<?php echo $reallink; ?>bodyloader.js";
document.body.appendChild(element);
}
if (window.addEventListener)
window.addEventListener("load", downloadJSAtOnload, false);
else if (window.attachEvent)
window.attachEvent("onload", downloadJSAtOnload);
else window.onload = downloadJSAtOnload;