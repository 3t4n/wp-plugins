jQuery(document).ready(function($){

    tinymce.PluginManager.add('relink', function(editor) {

        var postIDInputId = 'relink_postId';
        var searchInputId = 'relink_search';
        var searchResultsId = 'relink_search-results';
        var linkInputId = 'relink_link';
        var linkRequestLoading = false;


        function searchIdByLink() {

            var $linkInput = $('#' + linkInputId);

            if (linkRequestLoading) {
                return;
            }

            linkRequestLoading = true;
            $linkInput.attr('disabled', 1);

            $.get(window.ajaxurl, {
                action: 'relink_url_to_id',
                link: $linkInput.val(),
                _ajax_linking_nonce: $('#_ajax_linking_nonce').val()
            }, function (response) {

                linkRequestLoading = false;
                $linkInput.removeAttr('disabled');

                if (response.ID) {
                    $('#' + postIDInputId).val( response.ID );
                    $linkInput.val('');
                } else {
                    alert('Nothing found (');
                }
            }, 'json');
        }


        editor.addButton( 'relink_button', {
            tooltip: 'Insert post link',
            image: 'data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2060%2060%22%20width%3D%22512%22%20height%3D%22512%22%3E%3Cg%20fill%3D%22%23933EC5%22%3E%3Cpath%20d%3D%22M0%20.5v59h60V.5H0zm58%2057H2v-55h56v55z%22/%3E%3Cpath%20d%3D%22M12%2011.5h35a1%201%200%201%200%200-2H12a1%201%200%201%200%200%202zM12%2018.5h35a1%201%200%201%200%200-2H12a1%201%200%201%200%200%202zM47%2025.5H30a1%201%200%201%200%200%202h17a1%201%200%201%200%200-2zM47%2032.5H30a1%201%200%201%200%200%202h17a1%201%200%201%200%200-2zM47%2041.5H12a1%201%200%201%200%200%202h35a1%201%200%201%200%200-2zM47%2048.5H12a1%201%200%201%200%200%202h35a1%201%200%201%200%200-2zM15%2038.674l9.536-8.174L15%2022.326V26.5H7v8h8v4.174zM9%2032.5v-4h8v-1.826l4.464%203.826L17%2034.326V32.5H9z%22/%3E%3C/g%3E%3C/svg%3E',
            onclick: function() {

                editor.windowManager.open({

                    title: 'Insert link to post',

                    body: [
                        { type: 'textbox', name: 'id', label: 'post ID', value: '', id: postIDInputId },
                        { type: 'panel', html: '<div style="padding: 10px 0;">Search by:</div>' },
                        { type: 'textbox', name: 'search', label: 'Title', value: '', id: searchInputId, placeholder: 'Start enter title and select article' },
                        { type: 'panel', id: searchResultsId },
                        {
                            type: 'container',
                            layout: 'flex',
                            direction: 'row',
                            align: 'center',
                            spacing: 5,
                            items: [
                                { type: 'label', text: 'Link', style: 'width: 95px' },
                                { type: 'textbox', name: 'link', value: '', id: linkInputId, placeholder: 'Insert link end press "Find"' },
                                { type: 'button', text: 'Find', onclick: searchIdByLink}
                            ]
                        }
                    ],

                    onsubmit: function(e) {

                        var postID = e.data.id * 1;

                        if ( !postID ) {
                            alert( 'Post ID is required !' );
                            return false;
                        }

                        editor.insertContent( '[relink id="' + postID + '"]' );
                    },

                    onPostRender: function() {

                        if ( !$ || !$.ui || !$.ui.autocomplete ) {
                            return;
                        }

                        // Search by title
                        var $postIdInput = $('#' + postIDInputId),
                            $searchInput = $('#' + searchInputId),
                            last, cache;

                        $searchInput.autocomplete({
                            appendTo: '#' + searchResultsId,
                            minLength: 3,
                            delay: 500,
                            position: {
                                my: 'left top+2'
                            },
                            source: function (request, response) {

                                if (last === request.term) {
                                    response(cache);
                                    return;
                                }

                                if (/^https?:/.test(request.term) || request.term.indexOf('.') !== -1) {
                                    return response();
                                }

                                $.post(window.ajaxurl, {
                                    action: 'wp-link-ajax',
                                    page: 1,
                                    search: request.term,
                                    _ajax_linking_nonce: $('#_ajax_linking_nonce').val()
                                }, function (data) {
                                    cache = data;
                                    response(data);
                                }, 'json');

                                last = request.term;
                            },
                            focus: function( event, ui ) {
                                event.preventDefault();
                            },
                            select: function( event, ui ) {
                                $postIdInput.val( ui.item.ID );
                                return false;
                            }
                        })
                        .autocomplete( 'instance' )._renderItem = function( ul, item ) {
                            return $( '<li role="option">' )
                                .append( '<span>' + item.title + '</span>&nbsp;<span class="wp-editor-float-right">' + item.info + '</span>' )
                                .appendTo( ul );
                        };

                        $searchInput.autocomplete( 'widget' )
                            .addClass( 'wplink-autocomplete' )
                            .attr( 'role', 'listbox' );
                    }

                });
            }
        });

    });

});
