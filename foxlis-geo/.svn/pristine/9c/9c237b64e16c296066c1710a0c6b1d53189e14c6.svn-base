<?php

namespace Foxlis\Geo\Render;

use Foxlis\Geo\Helpers\RedirectHelper;

class RedirectRender
{
    public static function renderRedirectFrontendScript()
    {
        $foxlisRedirectJsonUri = RedirectHelper::getFoxlisRedirectJsonUri();
        $redirectQuestionScript = self::renderRedirectQuestionScript();

        $result = <<<JS

const request = obj => {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest();
        xhr.open(obj.method || "GET", obj.url);
        if (obj.headers) {
            Object.keys(obj.headers).forEach(key => {
                xhr.setRequestHeader(key, obj.headers[key]);
            });
        }
        xhr.onload = () => {
            if (xhr.status >= 200 && xhr.status < 300) {
                resolve(xhr.response);
            } else {
                reject(xhr.statusText);
            }
        };
        xhr.onerror = () => reject(xhr.statusText);
        xhr.send(obj.body);
    });
};

request({url: "{$foxlisRedirectJsonUri}"})
    .then(data => {
        if (data === undefined || data === '[]' || data.length === 0) {
            return;
        }
        
        const redirectData = JSON.parse(data);
        
        if (["enable", "once"].includes(redirectData.redirectOption.status)) {
            window.location.href = redirectData.redirectUri;
        }
        
        if ("ask" === redirectData.redirectOption.status) {
            {$redirectQuestionScript}
        }
    })
    .catch(error => {
        console.log(error);
    });

JS;

        return <<<JS

(function () {
    {$result}
})();

JS;
    }

    public static function renderRedirectFrontendBackend($redirectResults)
    {
        $redirectData = json_encode($redirectResults);

        $result = <<<JS

const redirectData = JSON.parse('{$redirectData}');

JS;

        $result .= PHP_EOL;
        $result .= self::renderRedirectQuestionScript();

        return <<<JS

(function () {
    {$result}
})();

JS;
    }

    private static function renderRedirectQuestionScript()
    {
        $redirectStopAskingCookieValue = RedirectHelper::getStopAskingCookieValue();

        return <<<JS

const loaded = async function () {
    return await new Promise((resolve, reject) => {
        window.onload = function() {
            resolve();
        };
        
        if (document.readyState !== 'loading') {
            resolve();
        }
    });
}

loaded().then(() => {
    const askForm = document.createElement("div");

    askForm.classList.add("foxlis-geo-redirect-question");

    askForm.innerHTML =
        `<div class="foxlis-geo-redirect-question__container">` +
            `<span class="foxlis-geo-redirect-question__container_text">` +
                redirectData.redirectOption.question +
            `</span>` +
            `<button type="button" class="foxlis-geo-redirect-question__container_button-confirm js-foxlis-geo-question-confirm">` +
                redirectData.redirectOption.confirm +
            `</button>` +
            `<button type="button" class="foxlis-geo-redirect-question__container_button-cancel js-foxlis-geo-question-cancel">` +
                redirectData.redirectOption.cancel +
            `</button>` +
        `</div>`
    ;

    document.body.appendChild(askForm);

    document.addEventListener("click", function (e) {
        const target = e.target;

        if (
            target.classList.contains("js-foxlis-geo-question-confirm")
            || target.classList.contains("js-foxlis-geo-question-cancel")
        ) {
            if (target.classList.contains("js-foxlis-geo-question-confirm")) {
                window.location.href = redirectData.redirectUri;
            }
    
            if (target.classList.contains("js-foxlis-geo-question-cancel")) {
                target.parentElement.remove();
            }
            
            document.cookie = "{$redirectStopAskingCookieValue}=1; path=/; max-age=" + 60*60*24*30;
        }
    });
});

JS;
    }
}