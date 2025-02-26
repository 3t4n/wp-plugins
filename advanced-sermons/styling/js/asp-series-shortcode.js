/** Change URL state based on search & filters **/
function asp_series_change_url( Data ) {
    const ExcludeQuery = {
        'action' : true,
        'mode' : true,
        'path' : true,
        'paged' : 1,
        'query' : true,
    };
    const IncludeSearchParams = {
        'p' : true,
        'page_id' : true,
        'post_type' : true,
    };

    // Exclude default params from URL
    const VisibleData = Object.entries( Data ).reduce((acc, [ Key,  Value ]) => {
        if( !Value || Object.keys( ExcludeQuery ).includes( Key )
            && ( ExcludeQuery[ Key ] === Value || ExcludeQuery[ Key ] === true ) ) {
            return acc;
        }

        return {...acc, [Key]: Value};
    }, {});

    const SearchParams = new URLSearchParams( VisibleData );
    const SourceParams = new URLSearchParams( window.location.search );
    const PageURL = (window.location.origin + window.location.pathname).replace( /\/page\/[0-9]*/gm, '' );
    const Target = new URL( PageURL );

    // Only WP params to be kept
    Object.keys( Object.fromEntries( SourceParams ) ).forEach( Key => {
        if( !Object.keys( IncludeSearchParams ).includes( Key ) ) {
            SourceParams.delete( Key );
        }
    });

    // Combine params groups
    const TargetParams = new URLSearchParams( {
        ...Object.fromEntries( SourceParams ),
        ...Object.fromEntries( SearchParams ),
    } );

    Target.search = TargetParams.toString();

    window.history.pushState( 'page', null, Target.toString() );
}

/** Replace the content with the newly generated **/
function asp_series_render( SeriesGrid, Data = {}, Override = true ) {
    const Series = SeriesGrid.querySelector( '.asp-series-container' );
    const Pagination = SeriesGrid.querySelector( '.asp-pagination-wrapper' );

    if( Pagination ) {
        Pagination.innerHTML = Data.pagination;
    }

    if( Data.series ) {
        Series.innerHTML = Override ? Data.series : Series.innerHTML + Data.series;

        // if( Override ) {
        //     window.scrollTo( {
        //         top: Series.getBoundingClientRect().y + window.scrollY - window.visualViewport.height * 0.10,
        //         behavior: 'smooth'
        //     } );
        // }

        setTimeout( () => {
            Series.querySelectorAll( '.asp-series-box' ).forEach( Serie => Serie.removeAttribute( 'style' ) );
        }, 150 );
    }
}

/** Initialize the filtering, pagination and load more logic **/
function asp_series_init( SeriesGrid ) {
    const InfinityScrollHandler = SeriesGrid.querySelector( '.asp-pagination-wrapper' );
    const Type = InfinityScrollHandler.querySelector( '.asp-load-more-button' )?.getAttribute( 'data-asp-type');

    /** Creates listenable proxy for Query changes **/
    let QueryDebouncer;
    const QueryHandler = {
        set( Target, Property, Value ) {
            Target[ Property ] = Value;

            clearInterval( QueryDebouncer );
            QueryDebouncer = setTimeout( () => {
                SeriesGrid.dispatchEvent( new CustomEvent( 'asp.reload' ) )
            }, 250 );

            return Target;
        }
    };
    const InitialQuery = SeriesGrid.getAttribute('data-asp-atts');
    const QueryProxy = new Proxy( {
        'action' : 'asp_generate_series',
        'paged' : 1,
        'mode' : SeriesGrid.getAttribute( 'data-asp-pagination' ),
        'path' : window.location.pathname,
        'query' : InitialQuery,
    }, QueryHandler );

    /** Init Infinity Scroll on Desktop **/
    if( InfinityScrollHandler && Type === 'infinity' && !asp_detect_mobile() ) {
        const InfinityScrollObserver = new IntersectionObserver( Entries => {
            Entries.forEach( Entry => {
                if( Entry.isIntersecting && InfinityScrollHandler.querySelector( '.asp-load-more-button' ) ) {
                    QueryProxy.mode = 'infinity';
                    QueryProxy.paged = InfinityScrollHandler.querySelector( '.asp-load-more-button' ).getAttribute( 'data-asp-page' );
                }
            } );
        }, {
            root: null,
            threshold: 0.1,
        } );

        InfinityScrollObserver.observe( InfinityScrollHandler );
    }

    /** Init Infinity Scroll on Mobile **/
    if( InfinityScrollHandler && Type === 'infinity' && asp_detect_mobile() ) {
        const InfinityScrollObserver = new IntersectionObserver( Entries => {
            Entries.forEach( Entry => {
                if( Entry.isIntersecting && InfinityScrollHandler.querySelector( '.asp-load-more-button' ) ) {
                    QueryProxy.mode = 'infinity';
                    QueryProxy.paged = InfinityScrollHandler.querySelector( '.asp-load-more-button' ).getAttribute( 'data-asp-page' );
                }
            } );
        }, {
            root: null,
            threshold: 0.1,
        } );

        InfinityScrollObserver.observe( InfinityScrollHandler );
    }

    /** Init Load More on Mobile **/
    if( Type === 'infinity' && asp_detect_mobile() ) {
        const LoadMoreButton = InfinityScrollHandler.querySelector('.asp-load-more-button');
        LoadMoreButton.removeAttribute( 'data-asp-type' );
        LoadMoreButton.addEventListener( 'click', () => {
            QueryProxy.mode = 'default';
            QueryProxy.paged = LoadMoreButton.getAttribute( 'data-asp-page' );
        });
    }

    /** Init Pagination **/
    SeriesGrid.addEventListener( 'click', Event => {
        if( !InfinityScrollHandler.contains( Event.target ) ) {
            return;
        }

        const Page = Event.target.getAttribute( 'data-asp-page' );
        const Mode = Event.target.getAttribute( 'data-asp-type' ) ? 'infinity' : 'default';

        if ( !Page ) {
            return;
        }

        Event.preventDefault();

        QueryProxy.mode = Mode;
        QueryProxy.paged = Page;
    });

    /** Handle data reload event **/
    SeriesGrid.addEventListener( 'asp.reload', () => {
        if( SeriesGrid.getAttribute( 'data-state' ) === 'pending' ) {
            return;
        }

        const RenderMode = QueryProxy.mode;
        const Data = new FormData();

        for( let Key in QueryProxy ) {
            if( !QueryProxy[ Key ] ) {
                continue;
            }

            Data.append( Key, QueryProxy[ Key ] );
        }

        if( RenderMode !== 'infinity' ) {
            SeriesGrid.querySelector( '.asp-pagination-wrapper' ).innerHTML = '';
        }

        SeriesGrid.setAttribute( 'data-state', 'pending' );

        fetch( window.asp_ajax.url, {
            method: 'POST',
            body: Data
        } ).then( ( Response ) => Response.json() ).then( Response => {
            asp_series_render( SeriesGrid, Response.data, RenderMode !== 'infinity' );
        } ).then( () => {
            asp_series_change_url( QueryProxy );
        }).finally(() => {
            SeriesGrid.setAttribute( 'data-state', 'idle' );
        });
    } );
}

/** Initialize Filtering processing with support for multiple filters (shortcodes) **/
const SeriesGrids = document.querySelectorAll( '.asp-series-shortcode' );

if( SeriesGrids ) {
    SeriesGrids.forEach( SeriesGrid => {
        asp_series_init( SeriesGrid );
    } );
}
