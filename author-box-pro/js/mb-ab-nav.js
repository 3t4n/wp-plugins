/**
 * MELIBU PLUGIN SETTINGS NAV
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */

var melibu_plugin_ab_options_nav = {
    name: "Melibu Navigation",
    /**
     * 
     * @returns {undefined}
     */
    init: function () {

        // Get all nav list a tags
        var listitem = document.querySelectorAll('.mb-author-admin-panel--nav-list-item a');
        // Loop all
        for (var i = 0; i < listitem.length; i++) {
            // Give click event
            melibu_plugin_event.addEvent(listitem[i], 'click', melibu_plugin_ab_options_nav.click);
        }

        var logo = document.querySelector('.mb-author-admin-panel--nav-logo > a');
        melibu_plugin_event.addEvent(logo, 'click', melibu_plugin_ab_options_nav.logo);

        if (typeof (Storage) !== "undefined") {

            if (localStorage.getItem("menu-target")) {
                melibu_plugin_ab_options_nav.clean();
                var menuActiveLink = document.getElementsByClassName(localStorage.getItem("menu-target"))[0]
                if (menuActiveLink) {
                    menuActiveLink.classList.add('active');
                }
            }

            if (localStorage.getItem("main-show")) {
                var pageActive = document.getElementsByClassName(localStorage.getItem("main-show"))[0];
                if (pageActive) {
                    // Display div
                    pageActive.style.display = 'block';
                    setTimeout(function () {
                        // Style
                        pageActive.style.visibility = 'visible';
                        pageActive.style.opacity = '1';
                        pageActive.style.transition = 'all .5s ease';
                    }, 300);
                }
            }
        }
    },
    logo: function (e) {
        // Stop action
        e.preventDefault();
        var boardstart = document.querySelector('.mb-author-admin-panel--main-content .mb-l-boardstart');
        if (boardstart) {
            localStorage.clear();
            melibu_plugin_ab_options_nav.clean();
            boardstart.style.display = 'block';
            setTimeout(function () {
                // Style
                boardstart.style.visibility = 'visible';
                boardstart.style.opacity = '1';
                boardstart.style.transition = 'all .5s ease';
            }, 300);
        }
    },
    /**
     * 
     * @param {type} event
     * @returns {undefined}
     */
    click: function (event) {

        // Stop action
        event.preventDefault();
        if (typeof (Storage) !== "undefined") {
            // Code for localStorage/sessionStorage
            localStorage.setItem("main-show", event.target.getAttribute('data-mb-id'));
            localStorage.setItem("menu-target", event.target.className);
        }

        // Define vars
        var show = document.getElementsByClassName(localStorage.getItem("main-show"))[0],
                activelinks = document.querySelectorAll('.active'),
                activelink = document.getElementsByClassName(localStorage.getItem("menu-target"))[0];
        melibu_plugin_ab_options_nav.clean();

        // Display div
        show.style.display = 'block';
        setTimeout(function () {
            // Style
            show.style.visibility = 'visible';
            show.style.opacity = '1';
            show.style.transition = 'all .5s ease';
        }, 300);
        // Loop all active links
        for (var i = 0; i < activelinks.length; i++) {
            // Remove class from all
            activelinks[i].classList.remove('active');
        }

        // Add active class to clicked link (target)
        activelink.classList.add('active');
        event.target.classList.add('active');
    },
    clean: function () {

        // Define vars
        var alldivs = document.querySelectorAll('.mb-author-admin-panel--main-content > div');
        // Get all nav list a tags
        var listitem = document.querySelectorAll('.mb-author-admin-panel--nav-list-item a');
        // Loop all divs
        for (var i = 0; i < alldivs.length; i++) {
            // Style
            alldivs[i].style.visibility = 'hidden';
            alldivs[i].style.opacity = '0';
            alldivs[i].style.transition = 'all .5s ease';
            alldivs[i].style.display = 'none';
        }
        // Loop all navs
        for (var j = 0; j < listitem.length; j++) {
            // Style
            listitem[j].classList.remove('active');
        }
    }
};

document.addEventListener('DOMContentLoaded', function () {

    melibu_plugin_ab_options_nav.init();
});