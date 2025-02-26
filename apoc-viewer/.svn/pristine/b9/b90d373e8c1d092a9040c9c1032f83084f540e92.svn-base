const APOC_URL = 'https://www.apoc.day/#/';

/**
 * Check Apoc Contents Url
 *
 * @package   APOC
 * @copyright Copyright(c) 2022, FAMPPY INC
 * @function checkApocContents()
 */
window.onload = function () {
    function checkApocContents(){
        const apocList = document.getElementsByClassName('apoc-contents-viewer');
        for (const vo of apocList){
            const iframe = vo.getElementsByTagName('iframe');
            if (iframe && iframe.length > 0){
                if (iframe[0].src.indexOf(`${APOC_URL}`) < 0)  vo.remove();
            }
        }
    }
    checkApocContents();
}

