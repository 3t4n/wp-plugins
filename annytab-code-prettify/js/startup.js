(function () {

    'use_strict';

    // Run code when document (DOM) has been loaded 
    document.addEventListener('DOMContentLoaded', function()
    { 
        // Get all <pre> tags on a page
        var tags = document.querySelectorAll('pre');

        // Loop tags
        for(var i = 0; i < tags.length; i++)
        {
            // Add classes if they don't exist already
            tags[i].classList.add('prettyprint', 'linenums');
        }

        // Apply prettyprinting
        PR.prettyPrint();

    }, false);

})();