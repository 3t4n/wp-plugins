// this file makes click tracking work with AdRotate's native click tracking mechanism
// set a timeout to give the iframe time to load
setTimeout(function() {
    // track clicks on the ad, which is going to be an iframe
    setInterval(function(){
        var elem = document.activeElement;
        // is it a parkave iframe? also, don't track a click twice
        if(elem && elem.tagName == 'IFRAME' && elem.parentNode.className == 'adrotate-parkave' && elem.dataset.tracked != 'true') {
            elem.dataset.tracked = 'true';
            elem.parentNode.querySelector('a').click();
        }
    }, 1000);
}, 500)