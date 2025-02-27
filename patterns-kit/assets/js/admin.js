wp.domReady(function () {
    setTimeout(function () {
        jQuery('.edit-post-header__settings').before('<button class="components-button open-pattern-inserter-sp">\
        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.83"><path opacity="0.83" d="M26.8 88L9.00003 33.5C8.00003 30.7 9.60003 27.8 12.2 27L66.8 9.20004C69.5 8.30004 72.5 9.80004 73.2 12.4L91.1 67C92 69.7 90.5 72.7 87.9 73.4L33.3 91.4C30.5 92.2 27.6 90.8 26.8 88Z" fill="#95F9EF"/></g><g opacity="0.53"><path opacity="0.53" d="M44.7 94.3L5.60003 52C3.70003 49.9 3.80003 46.7 5.90003 44.7L48.1 5.40001C50.2 3.50001 53.4 3.60001 55.3 5.70001L94.4 48C96.3 50.1 96.2 53.3 94.1 55.3L51.9 94.6C50 96.6 46.6 96.4 44.7 94.3Z" fill="url(#paint0_linear)"/></g><g opacity="0.7"><path opacity="0.7" d="M69.2 93.3L10.6001 76.1C7.70005 75.3 6.10005 72.2 6.90005 69.3L24.1 10.7C24.9 7.80003 28 6.20003 30.9 7.00003L89.5001 24.2C92.4001 25 94.0001 28.1 93.2001 31L75.9001 89.6C75.1001 92.5 72 94.1 69.2 93.3Z" fill="url(#paint1_linear)"/></g><path d="M36.2113 38.9016L51.0406 28.417L63.8053 38.5928L50.7468 44.3524L64.071 50.4089L64.071 63.7331L50.6893 72.06L36.2104 64.9717L50.7468 57.9795L36.2113 51.0146L36.2113 38.9016Z" fill="url(#paint2_linear)"/><path d="M64.071 50.4089L50.7468 57.9795L64.071 63.7331V50.4089Z" fill="#F6F6F6"/><path d="M36.2113 38.9016L50.7468 44.3524L36.2113 51.0145V38.9016Z" fill="#F7F7F7"/><defs><linearGradient id="paint0_linear" x1="4.23803" y1="49.9995" x2="95.762" y2="49.9995" gradientUnits="userSpaceOnUse"><stop stop-color="#00E97B"/><stop offset="1" stop-color="#00F9D7"/></linearGradient><linearGradient id="paint1_linear" x1="15.4392" y1="40.0233" x2="84.5112" y2="60.397" gradientUnits="userSpaceOnUse"><stop stop-color="#00DBDE"/><stop offset="1" stop-color="#FC00FF"/></linearGradient><linearGradient id="paint2_linear" x1="35.712" y1="50.1418" x2="64.202" y2="50.3963" gradientUnits="userSpaceOnUse"><stop offset="0.531247" stop-color="#DDDBDB"/><stop offset="0.531347" stop-color="#EDEAEA"/></linearGradient></defs></svg>\
        Patterns Kit</button>');


        jQuery('.open-pattern-inserter-sp').click(function () {
            jQuery('.components-button.edit-post-header-toolbar__inserter-toggle').trigger('click');
            setTimeout(function () {
                jQuery('.block-editor-inserter__tabs button:nth-child(2)').trigger('click');

                setTimeout(function () {
                    // open patterns popup
                    jQuery('.components-button.block-editor-inserter__patterns-explore-button').trigger('click');

                    setTimeout(function () {
                        //activate sparkle patterns tab
                        jQuery('.block-editor-block-patterns-explorer__sidebar__categories-list button[aria-label="PK Patterns"]').trigger('click');
                    }, 500)
                }, 500);

            }, 1000)

        });
    }, 2000);
})