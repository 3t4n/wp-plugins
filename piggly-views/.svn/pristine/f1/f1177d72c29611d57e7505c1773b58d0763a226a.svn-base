(function() {
    'use strict';
    /** Removed jQuery dependence **/
    let ax = typeof XMLHttpRequest !== undefined ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

    ax.open ( 'POST', pigglyCore.ajaxurl, true );
    ax.timeout = 60000;

    ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    let data   = { action: 'piggly_views_counter', post_id: pigglyCore.post_id, enabled: pigglyCore.enabled  };
    let params = Object.keys ( data ).map
                (
                    function( k )
                    { return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]); }
                ).join('&');

    ax.send( params );
})();
