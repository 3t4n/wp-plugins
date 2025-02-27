( function ( $ ) {
    'use strict';
    window.addEventListener('message', function(event) {
        if(event.data.method === 'asyncRedirect'){
            var url            = event.data.redirectUrl;
            var method         = event.data.httpMethod;
            var allParams      = event.data.params;
            // make an post request
            var formtemp, inputtemp;
            formtemp = document.createElement("form");
            formtemp.action        = url;
            formtemp.method        = method;
            formtemp.target        = "myCustomIframe";
            Object.keys(allParams).forEach(function (elm) {
                inputtemp          = document.createElement("input");
                inputtemp.name     = allParams[elm].name;
                inputtemp.value    = allParams[elm].value;
                inputtemp.type     = "hidden";
                formtemp.appendChild(inputtemp);
            })
            document.getElementsByTagName('body')[0].appendChild(formtemp);
            formtemp.submit();
        }
    });
} )( jQuery );
