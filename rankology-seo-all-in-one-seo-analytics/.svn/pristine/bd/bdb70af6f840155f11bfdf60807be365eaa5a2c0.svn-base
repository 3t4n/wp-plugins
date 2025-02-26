let RANKOLOGY_Stats_CheckTime = 30; //sec

// Check DoNotTrack Settings on User Browser
let RANKOLOGY_Stats_Dnd_Active = parseInt(navigator.msDoNotTrack || window.doNotTrack || navigator.doNotTrack, 10);

let rankologyStatsUserOnline = {
    init: function () {
        if (typeof RANKOLOGY_Stats_Tracker_Object == "undefined") {

            console.log('Variable RANKOLOGY_Stats_Tracker_Object not found on the page source. Please ensure that you have excluded the /wp-content/plugins/rankology-stats/assets/js/tracker.js file from your cache and then clear your cache.');

        } else {
            this.checkHitRequestConditions();
            this.keepUserOnline();
        }
    },

    // Check Conditions for Sending Hit Request
    checkHitRequestConditions: function () {
        if (RANKOLOGY_Stats_Tracker_Object.option.cacheCompatibility) {
            if (RANKOLOGY_Stats_Tracker_Object.option.dntEnabled) {
                if (RANKOLOGY_Stats_Dnd_Active !== 1) {
                    this.sendHitRequest();
                }
            } else {
                this.sendHitRequest();
            }
        }
    },

    //Sending Hit Request
    sendHitRequest: function () {
        var RANKOLOGY_Stats_http = new XMLHttpRequest();
        RANKOLOGY_Stats_http.open("GET", RANKOLOGY_Stats_Tracker_Object.hitRequestUrl + "&referred=" + encodeURIComponent(document.referrer) + "&_=" + Date.now(), true);
        RANKOLOGY_Stats_http.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        RANKOLOGY_Stats_http.send(null);
    },

    // Send Request to REST API to Show User Is Online
    sendOnlineUserRequest: function () {
        var RANKOLOGY_Stats_http = new XMLHttpRequest();
        RANKOLOGY_Stats_http.open("GET", RANKOLOGY_Stats_Tracker_Object.keepOnlineRequestUrl);
        RANKOLOGY_Stats_http.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        RANKOLOGY_Stats_http.send(null);
    },

    // Execute Send Active/Online User Request Function Every n Sec
    keepUserOnline: function () {
        setInterval(
            function () {
                if (!document.hidden) {
                    if (RANKOLOGY_Stats_Tracker_Object.option.dntEnabled) {
                        if (RANKOLOGY_Stats_Dnd_Active !== 1) {
                            this.sendOnlineUserRequest();
                        }
                    } else {
                        this.sendOnlineUserRequest();
                    }
                }
            }.bind(this),
            RANKOLOGY_Stats_CheckTime * 1000
        );
    },
};

rankologyStatsUserOnline.init();
