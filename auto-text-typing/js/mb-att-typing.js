
var melibu_auto_text_typing_list,
        melibu_auto_text_typing_i = 1,
        melibu_auto_text_typing_all;

/**
 * On Document ready set all eventhandler
 * 
 * @returns {undefined}
 */
document.addEventListener('DOMContentLoaded', function () {

    melibu_auto_text_typing();
});

function melibu_auto_text_typing() {

    if (document.querySelector('.typing-letters > div')) {
        
        melibu_auto_text_typing_list = document.querySelector('.typing-letters > div'),
                melibu_auto_text_typing_i = melibu_auto_text_typing_list.innerHTML.length,
                melibu_auto_text_typing_all = melibu_auto_text_typing_nl2br(melibu_auto_text_typing_list.innerHTML);

        var animate = function () {

            var x = 0;
            var inty = setInterval(function () {

                melibu_auto_text_typing_list.innerHTML = melibu_auto_text_typing_all.substr(0, x) + '<span class="typing">|</span>';

                x++;

                if (melibu_auto_text_typing_all.length < x) {

                    clearInterval(inty);

                    melibu_auto_text_typing_i++;

                    if (melibu_auto_text_typing_i > melibu_auto_text_typing_all.length) {
                        melibu_auto_text_typing_i = 1;
                    }

                    if (melibu_auto_text_typing_all.length) {

                        setTimeout(function () {

                            if (melibu_auto_text_typing_all[melibu_auto_text_typing_i - 1] !== "undefined") {
                                melibu_auto_text_typing_list.innerHTML = melibu_auto_text_typing_all[melibu_auto_text_typing_i - 1];
                            }

                            animate(melibu_auto_text_typing_i);

                        }, 700);
                    }
                }

            }, 100);
        };

        animate();
    }

}

function melibu_auto_text_typing_nl2br(str, is_xhtml) {

    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}