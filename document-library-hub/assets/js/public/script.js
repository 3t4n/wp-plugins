jQuery( function( $ ) {
    if ( typeof dlhp_ajax === 'undefined' ) {
        console.log( 'Error: dlhp_ajax is not defined.' )
        return false
    }

    $( document ).ready( function() {

        // Find the table and get the data-config attribute
        $( '.sdl-document-table' ).each( function() {
            // Parse the data-config JSON
            let config = $( this ).data( 'config' )
            if ( typeof config === 'string' ) {
                config = JSON.parse( config )
            }

            // Get the config values
            let perPage = config.perPage !== undefined ? parseInt( config.perPage ) : 10
            let enableSearch = config.enableSearch !== undefined ? Boolean( config.enableSearch ) : true


            // Initialize DataTable
            $( this ).DataTable( {
                paging: true,
                pageLength: perPage,
                responsive: true,
                searching: enableSearch,
                ordering: true
            } )
        } )
        
        // Helper to show/hide overlay
        function toggleOverlay( container, show ) {
            const overlay = container.find( '.dlhp-overlay' )
            if (show) {
                if ( ! overlay.length) container.append( '<div class="dlhp-overlay"></div>' )
                container.find( '.dlhp-overlay' ).show()
            } else {
                overlay.remove()
            }
        }

        // Helper to scroll to element
        function scrollToElement( element ) {
            $( 'html, body' ).animate( {
                scrollTop: element.offset().top -60
            }, 500)
        }

        // Common AJAX success handler
        function handleAjaxSuccess( response, documentsContainer, paginationContainer, libraryId, slug ) {
            if ( ! response.success  ) {
                console.error( 'Request failed: ' + response.data )
                return
            }
            
            const newDocuments = $( response.data.documents )
            var newPagination = {}

            var $newDocumentsContainer = $( documentsContainer.html( newDocuments ) )

            if ( response.data.layout === 'table' ) {
                newDocuments.DataTable( {
                    paging: true,
                    responsive: true,
                    searching: true,
                    ordering: true,
                } )
            } else {
                newPagination = $( response.data.pagination )
            }

            $newDocumentsContainer.attr( 'data-library', libraryId )

            if ( paginationContainer.length ) {
                paginationContainer.replaceWith( newPagination )
                newPagination.attr( 'data-category-slug', slug )
            } else {
                $newDocumentsContainer.append( newPagination )
                $newDocumentsContainer.find( '.dlhp-pagination' ).attr( 'data-category-slug', slug )
            }

            setTimeout( () => scrollToElement( $newDocumentsContainer ), 10 )
        }

        // Handle pagination link clicks
        $( document ).on( 'click', '.dlhp-pagination a', function( e ) {
            e.preventDefault()

            const wrap = $( this ).closest( '.dlhp-docs' )
            const pagination = wrap.find( '.dlhp-pagination' )
            const documentsContainer = wrap.find( '.dlhp-document-items' )
            const categorySlug = pagination.data( 'category-slug' )
            const page = $( this ).attr( 'href' ).split( 'paged=' )[1] || 1
            const libraryId = documentsContainer.data( 'library' )
            const searchInput = wrap.find( '.dlhp-document-search input[name="document_search"]' )
            const searchQuery = searchInput.length ? $.trim( searchInput.val() ) : ''

            toggleOverlay( wrap, true )

            $.ajax( {
                url: dlhp_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'dlhp_get_documents',
                    dlhp_nonce: dlhp_ajax.nonce,
                    library_id: libraryId,
                    page: page,
                    category: categorySlug,
                    searchQuery: searchQuery
                },
                success: function( response ) {
                    handleAjaxSuccess( response, documentsContainer, pagination, libraryId, categorySlug )
                },
                complete: function() {
                    toggleOverlay(wrap, false)
                },
                error: function( xhr, status, error ) {
                    console.error( 'AJAX Error: ', status, error )
                }
            } )
        } )

        // Handle folder clicks
        $( document ).on( 'click', '.dlhp-folder-name', function() {
            const folderName = $( this )
            if ( folderName.hasClass( 'dlhp-folder-name-opened' ) ) {
                return
            }

            const wrap = folderName.closest( '.dlhp-docs' )
            const categorySlug = folderName.data( 'slug' )
            const documentFoldersContainer = folderName.closest( '.dlhp-document-folders' )
            const libraryId = documentFoldersContainer.data( 'library' )
            const documentsContainer = documentFoldersContainer.find( '.dlhp-documents-container' )

            toggleOverlay( wrap, true )

            $.ajax( {
                url: dlhp_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'dlhp_get_documents_by_folder',
                    dlhp_nonce: dlhp_ajax.nonce,
                    category: categorySlug,
                    library_id: libraryId,
                    page: 1
                },
                success: function( response ) {
                    handleAjaxSuccess( response, documentsContainer, documentsContainer.find( '.dlhp-pagination' ), libraryId, categorySlug )
                    
                    // Mark current folder as opened and close the rest
                    const $foldersContainer = folderName.closest( '.dlhp-folders-container' )

                    folderName
                        .addClass( 'dlhp-folder-name-opened' )
                        .siblings( '.dlhp-child-folders' )
                        .show() // Open the current folder's child folders

                    $foldersContainer.find( '.dlhp-folder-name' )
                        .not( folderName)
                        .removeClass( 'dlhp-folder-name-opened' ) // Close other folders

                    // Open/close folder icons
                    folderName.find( '.dlhp-folder-icon' ).toggle()

                    // Hide all child folders except the current folder's visible hierarchy
                    $foldersContainer.find( '.dlhp-child-folders' )
                        .not( folderName.parents( '.dlhp-child-folders' ).add( folderName.siblings( '.dlhp-child-folders' )))
                        .hide()

                    // Handle folder icons (closed and open)
                    const closedIcons = $foldersContainer.find( '.dlhp-folder-icon-closed' )
                    const openIcons = $foldersContainer.find( '.dlhp-folder-icon-open' )

                    closedIcons
                        .not( folderName.parents( '.dlhp-folder-name' ).find( '.dlhp-folder-icon-closed' ).add( folderName.find( '.dlhp-folder-icon-closed' )))
                        .show() // Show the closed icons except for the current hierarchy

                    openIcons
                        .not( folderName.parents( '.dlhp-folder-name' ).find( '.dlhp-folder-icon-open' ).add( folderName.find( '.dlhp-folder-icon-open' )))
                        .hide() // Hide the open icons except for the current hierarchy
                },
                complete: function() {
                    toggleOverlay( wrap, false )
                },
                error: function( xhr, status, error ) {
                    console.error( 'AJAX Error: ', status, error )
                }
            } )
        } )

        // Handle search functionality
        $( document ).on( 'keypress', '.dlhp-document-search input', function( e ) {
            if ( e.which === 13 ) {
                e.preventDefault()
                triggerSearch( $( this ).closest( '.dlhp-document-search' ) )
            }
        } )

        $( document ).on( 'click', '.dlhp-document-search svg', function( e ) {
            e.preventDefault()
            triggerSearch($( this ).closest( '.dlhp-document-search' ) )
        } )

        function triggerSearch( searchContainer ) {
            const keywords = searchContainer.find( 'input' ).val()
            if ( ! keywords.length) return

            const wrap = searchContainer.parent( '.dlhp-docs' )
            const libraryId = searchContainer.data( 'library' )
            const folders = wrap.find( '.dlhp-folders-container' )
            const documents = wrap.find( '.dlhp-document-items' )
            const pagination = wrap.find( '.dlhp-pagination' )
            const notFound = searchContainer.find( '.dlhp-search-not-found' )
            const reset = searchContainer.find( '.dlhp-search-reset' )

            toggleOverlay(wrap, true)

            $.ajax( {
                url: dlhp_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'dlhp_get_documents',
                    dlhp_nonce: dlhp_ajax.nonce,
                    library_id: libraryId,
                    page: 1,
                    searchQuery: keywords
                },
                success: function( response ) {
                    if ( ! response.success ) {
                        console.error( 'Request failed: ' + response.data )
                        return
                    }

                    if ( ! response.data.documents ) {
                        notFound.show()
                        reset.show()
                        folders.remove()
                        documents.remove()
                        pagination.remove()
                        
                        return
                    }

                    reset.show()
                    console.log(wrap)
                    console.log(folders)
                    console.log(documents)
                    folders.remove()
                    documents.remove()
                    pagination.remove()
                    wrap.append( response.data.documents + response.data.pagination )

                    setTimeout( () => scrollToElement( searchContainer ), 10 )
                },
                complete: function() {
                    toggleOverlay( wrap, false )
                },
                error: function( xhr, status, error ) {
                    console.error( 'AJAX Error: ', status, error )
                }
            } )
        }

        // Reset functionality
        $( document ).on( 'click', '.dlhp-search-reset', function() {
            location.reload()
        } )
    } )
} )
