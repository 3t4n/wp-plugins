/**
 * Identify browser on site if they are logged in.
 *
 * Object possibly containing user/commenter email address:
 * @typedef {Object} reachoUser
 *   @property {string} currect_user_email - Email of logged in user
 *   @property {string} commenter_email - Email of logged in commenter
 *
 */


function reachoIdentifyBrowser(reachoUser) {
    var reacho = window.reacho || [];
    if (reachoUser.current_user_email) {
        reacho.push(["identify", {
            "$email": reachoUser.current_user_email
        }]);
    } else {
        // See if current user is a commenter
        if (reachoUser.commenter_email) {
            reacho.push(["identify", {
                "$email": reachoUser.commenter_email
            }]);
        }
    }
}


window.addEventListener("load", function() {
    !function(){if(!window.reacho){window._reachoOnsite=window._reachoOnsite||[];try{window.reacho=new Proxy({},{get:function(n,i){return"push"===i?function(){var n;(n=window._reachoOnsite).push.apply(n,arguments)}:function(){for(var n=arguments.length,o=new Array(n),w=0;w<n;w++)o[w]=arguments[w];var t="function"==typeof o[o.length-1]?o.pop():void 0,e=new Promise((function(n){window._reachoOnsite.push([i].concat(o,[function(i){t&&t(i),n(i)}]))}));return e}}})}catch(n){window.reacho=window.reacho||[],window.reacho.push=function(){var n;(n=window._reachoOnsite).push.apply(n,arguments)}}}}();
    reachoIdentifyBrowser(reachoUser);
});
