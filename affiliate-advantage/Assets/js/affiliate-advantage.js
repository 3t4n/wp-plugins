jQuery(document).ready(($) => {

    // if ( window.location.href.indexOf( 'wp-admin' ) > -1 ) {
    //     setInterval( function () {
    //         if ( $( '#sample-permalink' ).length ) {
    //             $( '#sample-permalink' ).html( $( '#sample-permalink' ).html().replace( '/affiliate_advantage', '' ) );
    //         }
    //     }, 100 );
    // }

    // $('#title').on('change', () => {
    //     if ( $( '#sample-permalink' ).length ) {
    //         $( '#sample-permalink' ).html( $( '#sample-permalink' ).html().replace( '/affiliate_advantage', '' ) );
    //     }
    // });
    //
    // $('#edit-slug-buttons>button').on('click', () => {
    //     if ( $( '#sample-permalink' ).length ) {
    //         $( '#sample-permalink' ).html( $( '#sample-permalink' ).html().replace( '/affiliate_advantage', '' ) );
    //     }
    // });



    // Banner Upload
    // $('#affiliate-advantage-upload-link-banner-btn').click(() => {
    //
    //     let formfield = $('#affiliate-advantage-link-banner').attr('name');
    //     tb_show('Upload Banner', 'media-upload.php?type=image&amp;TB_iframe=true');
    //     window.send_to_editor = function (html) {
    //         let imgurl = $(html).attr('src');
    //         $('#affiliate-advantage-link-banner').val(imgurl);
    //         $('#affiliate-advantage-link-banner-img').attr('src', imgurl);
    //         tb_remove();
    //     };
    //
    //     return false;
    // });
    let affiliate_advantage_custom_uploader;
    $('#affiliate-advantage-upload-link-banner-btn').click(() => {

        //If the uploader object has already been created, reopen the dialog
        if (affiliate_advantage_custom_uploader) {
            affiliate_advantage_custom_uploader.open();
            return;
        }

        //Extend the wp.media object
        affiliate_advantage_custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Banner Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        affiliate_advantage_custom_uploader.on('select', function() {
            console.log(affiliate_advantage_custom_uploader.state().get('selection').toJSON());
            let attachment = affiliate_advantage_custom_uploader.state().get('selection').first().toJSON();
            $('#affiliate-advantage-link-banner').val(attachment.url);
            $('#affiliate-advantage-link-banner-img').prop('src', attachment.url);
        });

        //Open the uploader dialog
        affiliate_advantage_custom_uploader.open();
    });

    // Click to copy short urls
    $('.affiliate-advantage-copy').on('click', function (evt) {

        // let link = evt.target;
        navigator.clipboard.writeText($(this).text())   ;

         $('#short_link')
            .text('Short Link (Copied!)')
            .css('color', '#056bd8');

        $('th.column-short_link')
            .text('Short Link (Copied!)')
            .css('color', '#056bd8');

        setTimeout(() => {

            $('#short_link')
                .text('Short Link (Click to Copy)')
                .css('color', 'inherit');

            $('th.column-short_link')
                .text('Short Link (Click to Copy)')
                .css('color', 'inherit');

        }, 1000);

    });

    // Link expiration date
    $(`#${affiliate_advantage.prefix}link_expiration_chooser`).on('change', function (evt) {
        switch ($(this).val()) {
            case 'never':
                $(`#${affiliate_advantage.prefix}link_expiration_settings`).css('display', 'none');
                $(`#${affiliate_advantage.prefix}link_expiration`).val('0');
                break;
            case 'date':
                $(`#${affiliate_advantage.prefix}link_expiration_settings`).css('display', 'block');
                break
        }
    });

    $(`#${affiliate_advantage.prefix}link_expiration_date`).on('change', function (evt) {
        $(`#${affiliate_advantage.prefix}link_expiration`).val($(this).val());
    });

    // Link Password
    $(`#${affiliate_advantage.prefix}link_password_chooser`).on('change', function (evt) {
        switch ($(this).val()) {
            case 'no':
                $(`#${affiliate_advantage.prefix}link_password_settings`).css('display', 'none');
                $(`#${affiliate_advantage.prefix}link_password`).val('0');
                $(`#${affiliate_advantage.prefix}link_password_input`).css('display', 'none');
                break;
            case 'yes':
                $(`#${affiliate_advantage.prefix}link_password_settings`).css('display', 'block');
                $(`#${affiliate_advantage.prefix}link_password_input`).css('display', 'flex');
                break
        }
    });

    $(`#${affiliate_advantage.prefix}link_password_input`).on('change', function (evt) {
        $(`#${affiliate_advantage.prefix}link_password`).val($(this).val());
    });

    let clicks_dates = $( '#affiliate-advantage-stats-dates' ).data( 'clicks' );
    let clicks_links = $( '#affiliate-advantage-stats-links' ).data( 'clicks' );
    let clicks_countries = $( '#affiliate-advantage-stats-countries' ).data( 'clicks' );

    // Stats - Dates
    if ( $( '#affiliate-advantage-stats-dates' ).length ) {
        let chart_dates = new Chart( $( '#affiliate-advantage-stats-dates' ), {
            type: 'bar',
            data: {
                labels: Object.keys(clicks_dates),
                datasets: [{
                    label: '# of Clicks',
                    data: Object.values(clicks_dates),
                    backgroundColor: '#2271B1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function ( label, index, labels ) {
                                if (Math.floor(label) === label) {
                                    return label;
                                }
                            }
                        }
                    },

                }
            }
        })
    }

    // Stats - Links
    if ( $( '#affiliate-advantage-stats-links' ).length ) {
        let chart_links = new Chart( $( '#affiliate-advantage-stats-links' ), {
            type: 'bar',
            data: {
                labels: Object.keys(clicks_links),
                datasets: [{
                    label: '# of Clicks',
                    data: Object.values(clicks_links),
                    backgroundColor: '#2271B1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function ( label, index, labels ) {
                                if (Math.floor(label) === label) {
                                    return label;
                                }
                            }
                        }
                    },

                }
            }
        })
    }

    // Stats - Countries
    if ( $( '#affiliate-advantage-stats-countries' ).length ) {
        let chart_countries = new Chart( $( '#affiliate-advantage-stats-countries' ), {
            type: 'bar',
            data: {
                labels: Object.keys(clicks_countries),
                datasets: [{
                    label: '# of Clicks',
                    data: Object.values(clicks_countries),
                    backgroundColor: '#2271B1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function ( label, index, labels ) {
                                if (Math.floor(label) === label) {
                                    return label;
                                }
                            }
                        }
                    },

                }
            }
        });
    }


    $( '#bl-stats-selector' ).on( 'change', function () {
            window.location.href = `/wp-admin/edit.php?post_type=${affiliate_advantage.cpt}&page=stats&view=${ $( this ).val() }`;
    } );

    $( '#bl-stats-link-selector' ).on( 'change', function () {
            window.location.href = `/wp-admin/edit.php?post_type=${affiliate_advantage.cpt}&page=stats&type=link&link=${ $( this ).data( 'link' ) }&view=${ $( this ).val() }`;
    } );

});
