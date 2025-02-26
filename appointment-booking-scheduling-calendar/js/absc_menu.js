var GREATAT_ABSC_htmlEl = document.querySelector('html');
var GREATAT_ABSC_bodyEl = document.querySelector('body');
var GREATAT_ABSC_popupWin = document.getElementById('open-popup-window');
var GREATAT_ABSC_popupCls = document.getElementById('popup-window-cls');
var GREATAT_ABSC_iFrameMain = document.getElementById('wp-widget-iframe-wrapper');
var GREATAT_ABSC_gaIframe = document.getElementById('gaIframe');
var GREATAT_ABSC_seeAllBtn = document.getElementById('ga__see-all-btn');
var GREATAT_ABSC_username= '';
var GREATAT_ABSC_domain= '';

// Closes the modal window popup
let clsFunction = function (e) {
    e.preventDefault();
    if (window.innerWidth < 769) {
        GREATAT_ABSC_htmlEl.style.overflow = 'initial';
        GREATAT_ABSC_bodyEl.style.height = 'initial';
    }
    GREATAT_ABSC_bodyEl.style.overflow = 'initial';
    GREATAT_ABSC_popupWin.classList.remove('opened');
};

// Closes with escape btn
document.onkeydown = function (e) {
    evt = e || window.event;
    if (evt.keyCode == 27) {
        if (window.innerWidth < 769) {
            GREATAT_ABSC_htmlEl.style.overflow = 'initial';
            GREATAT_ABSC_bodyEl.style.height = 'initial';
        }
            GREATAT_ABSC_bodyEl.style.overflow = 'initial';
            GREATAT_ABSC_popupWin.classList.remove('opened');
        }
};

// Open offers with See All click
let openFunction = function (e) {
    e.preventDefault();
    GREATAT_ABSC_gaIframe.src = 'https://'+GREATAT_ABSC_domain+'.greatat.com/'+GREATAT_ABSC_username+'?tab=offers_widget&mc=wpw_offers_pop';
    if (window.innerWidth < 769) {
        GREATAT_ABSC_htmlEl.style.overflow = 'hidden';
        GREATAT_ABSC_bodyEl.style.height = '1vh';
    }
    GREATAT_ABSC_bodyEl.style.overflow = 'hidden';
    GREATAT_ABSC_popupWin.classList.add('opened');
};

GREATAT_ABSC_popupCls.addEventListener('touchend', clsFunction, false);
GREATAT_ABSC_popupCls.addEventListener('click', clsFunction, false);

GREATAT_ABSC_seeAllBtn.addEventListener('touchend', openFunction, false);
GREATAT_ABSC_seeAllBtn.addEventListener('click', openFunction, false);

// Listen to message from child window
function displayMessage (e) {
    if (e.origin == 'https://'+GREATAT_ABSC_domain+'.greatat.com') {
        GREATAT_ABSC_gaIframe.src = 'https://'+GREATAT_ABSC_domain+'.greatat.com/success/blue?redirect='+encodeURI(e.data)+'&message=&is_ssu=1&icon=fal%20fa-star';
        GREATAT_ABSC_popupWin.classList.add('opened');
        GREATAT_ABSC_bodyEl.style.overflow = 'hidden';
    }
}

// Receives message content from GreatAt website push/postMessage
window.addEventListener('message', displayMessage, false);