(function() {
    function isInMobiCMPReady() {
        return typeof window.__tcfapi !== 'undefined' && 
               document.querySelector('script[src*="inmobi.com/choice/"]') !== null;
    }

    function checkTCFConsent(callback) {
        if (!isInMobiCMPReady()) {
            callback(true);
            return;
        }

        window.__tcfapi('getTCData', 2, function(tcData, success) {
            if (success) {
                const hasConsent = tcData.gdprApplies ? 
                    tcData.purpose.consents[1] && 
                    tcData.purpose.consents[3] && 
                    tcData.purpose.consents[4]
                    : true;
                
                callback(hasConsent);
            } else {
                callback(true);
            }
        });
    }

    function showAds() {
        const adContainers = document.querySelectorAll('[class*="adhub-"]');
        adContainers.forEach(container => {
            if (container.dataset.adTag) {
                container.innerHTML = decodeURIComponent(container.dataset.adTag);
                delete container.dataset.adTag;
            }
        });
    }

    function waitForTCF() {
        if (isInMobiCMPReady()) {
            checkTCFConsent(function(hasConsent) {
                if (hasConsent) {
                    showAds();
                }
            });
        } else if (document.querySelector('script[src*="inmobi.com/choice/"]') === null) {
            showAds();
        } else {
            setTimeout(waitForTCF, 100);
        }
    }

    waitForTCF();
})();