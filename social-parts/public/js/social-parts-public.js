(function () {
    if (social_parts_domain_id != 0) {
        var mainRequest = new XMLHttpRequest();
        mainRequest.open('GET', social_parts_api_url + social_parts_domain_id + '/get-app', true);
        mainRequest.setRequestHeader('Content-Type', 'application/json');
        mainRequest.setRequestHeader('Access-Control-Allow-Origin', '*');
        mainRequest.onload = function () {
            if (mainRequest.status >= 200 && mainRequest.status < 400) {
                var mainScriptNode = document.createElement('script');
                mainScriptNode.innerHTML = mainRequest.responseText;
                document.body.appendChild(mainScriptNode);
            }
        };
        mainRequest.onerror = function (){
        };
        mainRequest.send();
    }
}());