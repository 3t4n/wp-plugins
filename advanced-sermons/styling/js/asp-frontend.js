/** Global Settings **/
window.disableLitepickerStyles = true;

/** Detect Mobile devices **/
function asp_detect_mobile() {
    const Devices = [
        /Android/i,
        /webOS/i,
        /iPhone/i,
        /iPad/i,
        /iPod/i,
        /BlackBerry/i,
        /Windows Phone/i
    ];

    return Devices.some( ( Device ) => {
        return navigator.userAgent.match( Device );
    } );
}

/** Change URL state based on search & filters **/
function asp_change_url( Data ) {
    const ExcludeQuery = {
        'action' : true,
        'mode' : true,
        'path' : true,
        'paged' : 1,
        'order' : 'DESC',
        'type' : true,
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

/** Define scoped Filters function **/
function asp_init_date_pickers( FilterBar ) {


    const Pickers = FilterBar.querySelectorAll( '.sermon-date-container' );
    const PickersInstances = [];

    if( !Pickers ) {
        return;
    }

    Pickers.forEach( Picker => {
        const Input = Picker.querySelector('.asp-filter-date');

        PickersInstances.push( new Litepicker( {
            element: Input,
            startDate: new Date(),
            numberOfMonths: 2,
            numberOfColumns: 2,
            singleMode: false,
            resetButton: true,
            setup: Instance => {
                Instance.on( 'selected', ( Start, End ) => {
                    if( Start && End ) {
                        Input.dispatchEvent( new CustomEvent( 'asp.filter.change' ) );
                    }
                } );

                Instance.on( 'clear:selection', () => {
                    Input.dispatchEvent( new CustomEvent( 'asp.filter.change' ) );
                } );
            },
        } ) );

        // After initializing, wrap the Litepicker in a asp-litepicker-wrapper div to reduce conflicts
        const litepickerEl = document.querySelector('.litepicker');
        const wrapperDiv = document.createElement('div');
        wrapperDiv.className = 'asp-litepicker-wrapper'; // your desired class name

        // Move litepicker inside the wrapper
        wrapperDiv.appendChild(litepickerEl);

        // Append the wrapperDiv to the body
        document.body.appendChild(wrapperDiv);

    } );

    return PickersInstances;
}

/** Set initial query values **/
function asp_set_initial_query( Query, FilterBar ) {

    if( !FilterBar ) {
        return Query;
    }

    const Filters = FilterBar.querySelectorAll( 'input, select' );

    Filters.forEach( Filter => {
        Query[ Filter.getAttribute( 'name' ) ] = Filter.value;
    });

    return Query;
}

// Flag to track if the featured content has been loaded initially
let featuredContentLoaded = false;

/** Initialize and handle change of filters value **/
function asp_init_filters( SermonsGrid, FilterBar, Query, DatePickers ) {


    const Filters = FilterBar.querySelectorAll( 'input, select' );

    Filters.forEach( Filter => {
        // Listen for future changes
        Filter.addEventListener( 'asp.filter.change', () => {
            Query[ 'mode' ] = 'filter';
            Query[ 'paged' ] = 1;
            Query[ Filter.getAttribute( 'name' ) ] = Filter.value;
        } );

        // Enable custom events for simple filters
        if( Filter.getAttribute( 'name' ) !== 'sermon_dates' ) {
            Filter.addEventListener( 'change', () => {
                featuredContentLoaded = false;
                Filter.dispatchEvent( new CustomEvent( 'asp.filter.change' ) );
            } );
        }
    });

    SermonsGrid.addEventListener( 'click', Event => {
        if( !Event.target.classList.contains( 'asp-clear-filter-criteria' ) ) {
            return;
        }

        Event.preventDefault();

        asp_clear_filters( SermonsGrid, FilterBar, Query, DatePickers );
    } );
}

function asp_clear_filters( SermonsGrid, FilterBar, QueryProxy, DatePickers ) {


    const Filters = FilterBar.querySelectorAll( 'input, select' );
    const Sermons = SermonsGrid.querySelector( '.sermon-archive-holder' );
    const Pagination = SermonsGrid.querySelector( '.asp-pagination-wrapper' );
    const FeaturedContent = SermonsGrid.querySelector( '.asp-details-top-holder' );
    const CriteriaBar = SermonsGrid.querySelector( '.asp-criteria-box-wrapper' );

    SermonsGrid.querySelector('.asp-load-more-button')?.removeAttribute('data-asp-page');

    Filters.forEach( Filter => {
        if( Filter.nodeName === 'SELECT' ) {
            Filter.value = Filter.querySelector( 'option' ).value;
        } else {
            Filter.value = null;
        }

        if( Filter.classList.contains( 'asp-filter-date' ) ) {
            DatePickers.forEach( DatePicker => DatePicker.clearSelection() );
        }

    } );

    // Reset the featuredContentLoaded flag
    featuredContentLoaded = false;

    // Reset FeaturedContent and CriteriaBar
    if (FeaturedContent) {
        FeaturedContent.innerHTML = ''; // or set to default content
    }
    if (CriteriaBar) {
        CriteriaBar.innerHTML = ''; // reset criteria display
    }

    Sermons.innerHTML = '';
    Pagination.innerHTML = '';
    QueryProxy.reset = {}
}

function asp_set_filters( SermonsGrid, FilterBar, QueryProxy, NewFilters ) {


    const Filters = FilterBar.querySelectorAll( 'input, select' );

    Filters.forEach( Filter => {
        if( Filter.nodeName === 'SELECT' ) {
            Filter.value = NewFilters[ Filter.getAttribute( 'name' ) ] ?? Filter.querySelector( 'option' ).value;
        } else {
            Filter.value = NewFilters[ Filter.getAttribute( 'name' ) ] ?? null;
        }
    } );

    QueryProxy.reset = NewFilters;
}

/** Replace the content with the newly generated **/
function asp_render(SermonsGrid, FilterBar, Data = {}, Override = true) {
    const CriteriaBar = SermonsGrid.querySelector('.asp-criteria-box-wrapper');
    const ArchiveScrollTo = SermonsGrid.querySelector('.asp-archive-ajax-scrollto');
    const Sermons = SermonsGrid.querySelector('.sermon-archive-holder');
    const FeaturedContent = SermonsGrid.querySelector('.asp-details-top-holder');
    const Pagination = SermonsGrid.querySelector('.asp-pagination-wrapper');

    // Update CriteriaBar and Pagination content
    if (CriteriaBar) {
        CriteriaBar.innerHTML = Data.active_filters;
    }
    if (Pagination) {
        Pagination.innerHTML = Data.pagination;
    }

    // Update FeaturedContent if not a pagination action or if featured content has not been loaded yet
    if (FeaturedContent && (Override || !featuredContentLoaded)) {
        FeaturedContent.innerHTML = Data.featured;
        featuredContentLoaded = true; // Set the flag after initial load or refresh
    }

    // Update Sermons content
    if (Data.sermons) {
        if (Override) {
            Sermons.innerHTML = Data.sermons;
            window.scrollTo({
                top: ArchiveScrollTo.getBoundingClientRect().y + window.scrollY - 125,
                behavior: 'smooth'
            });
        } else {
            Sermons.insertAdjacentHTML('beforeend', Data.sermons);
        }

        setTimeout(() => {
            Sermons.querySelectorAll('li').forEach(Sermon => Sermon.removeAttribute('style'));
        }, 150);
    }
}

/** Initialize the filtering, pagination and load more logic **/
function asp_init( SermonsGrid ) {
    const FiltersBar = SermonsGrid.querySelector( '.asp-archive-filter' );
    const InfinityScrollHandler = SermonsGrid.querySelector( '.asp-pagination-wrapper' );
    const Type = SermonsGrid.getAttribute( 'data-asp-pagination');

    /** Creates listenable proxy for Query changes **/
    let QueryDebouncer;
    const InitialQuery = {
        'action' : 'asp_generate_sermons',
        'paged' : 1,
        'type' : SermonsGrid.getAttribute( 'data-asp-pagination' ),
        'path' : window.location.pathname,
        'order' : 'DESC'
    }

    const QueryHandler = {
        set( Target, Property, Value ) {
            if( Property === 'reset' ) {
                Object.keys( Target ).forEach( Key => {
                    if( InitialQuery[ Key ] ) {
                        Target[ Key ] = InitialQuery[ Key ];
                    } else {
                        delete Target[ Key ];
                    }
                });

                Object.keys( Value ).forEach( Key => {
                    Target[ Key ] = Value[ Key ];
                });
            } else {
                Target[ Property ] = Value;
            }

            if( Property !== 'mode' ) {
                clearInterval( QueryDebouncer );
                QueryDebouncer = setTimeout( () => {
                    SermonsGrid.dispatchEvent( new CustomEvent( 'asp.reload' ) )
                }, 250 );
            }

            return Target;
        }
    };
    const QueryProxy = new Proxy( asp_set_initial_query( {
        'action' : 'asp_generate_sermons',
        'paged' : 1,
        'type' : SermonsGrid.getAttribute( 'data-asp-pagination' ),
        'path' : window.location.pathname,
        'order' : 'DESC'
    }, FiltersBar ), QueryHandler );

    /** Init Filters **/
    if( FiltersBar ) {
        const DatePickers = asp_init_date_pickers( FiltersBar );
        asp_init_filters( SermonsGrid, FiltersBar, QueryProxy, DatePickers );
    }

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
    if( Type !== 'infinity' && asp_detect_mobile() ) {
        const LoadMoreButton = InfinityScrollHandler.querySelector('.asp-load-more-button');
        if( Type !== 'default') {
            LoadMoreButton.removeAttribute( 'data-asp-pagination' );
            LoadMoreButton.addEventListener( 'click', () => {
                QueryProxy.mode = 'default';
                QueryProxy.paged = LoadMoreButton.querySelector( '.asp-load-more-button' );
            });
        }
    }

    /** Init Pagination **/
    SermonsGrid.addEventListener( 'click', Event => {
        if( !InfinityScrollHandler.contains( Event.target ) ) {
            return;
        }

        const Page = Event.target.getAttribute('data-asp-page');
        const Mode = Event.target.getAttribute( 'data-asp-type' ) ? 'infinity' : 'default';

        if ( !Page ) {
            return;
        }

        Event.preventDefault();

        QueryProxy.mode = Mode;
        QueryProxy.paged = Page;
    });

    /** Init Any link filtering **/
    SermonsGrid.addEventListener( 'click', Event => {
        const Link = Event.target.href;

        if( InfinityScrollHandler.contains( Event.target ) ) {
            return;
        }

        if ( !Link || Link?.indexOf( window.location.pathname ) === -1
            || Link?.indexOf( '?' ) === -1
            || Link?.indexOf( '?sermons=' ) > -1
            || Link?.indexOf( '?page_id=' ) > -1
            || Link?.indexOf( '?p=' ) > -1 ) {
            return;
        }

        if (FiltersBar) {
            Event.preventDefault();
        }

        const SearchParams = new URLSearchParams( Link.substr( Link.indexOf('?') + 1 ) );
        const Filters = {};

        for( let Key of SearchParams.keys() ) {
            Filters[ Key ] = SearchParams.get( Key );
        }

        asp_set_filters( SermonsGrid, FiltersBar, QueryProxy, Filters );
    });

    /** Handle data reload event **/
    SermonsGrid.addEventListener( 'asp.reload', () => {
        if( SermonsGrid.getAttribute( 'data-state' ) === 'pending' ) {
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
            SermonsGrid.querySelector( '.asp-pagination-wrapper' ).innerHTML = '';
        }

        SermonsGrid.setAttribute( 'data-state', 'pending' );

        fetch( window.asp_ajax.url, {
            method: 'POST',
            body: Data
        } ).then( ( Response ) => Response.json() ).then( Response => {
            asp_render( SermonsGrid, FiltersBar, Response.data, RenderMode !== 'infinity' );
        } ).then( () => {
            asp_change_url( QueryProxy );
        }).finally(() => {
            SermonsGrid.setAttribute( 'data-state', 'idle' );
        });
    } );
}

/** Initialize Filtering processing with support for multiple filters (shortcodes) **/
const SermonsGrids = document.querySelectorAll( '.asp-archive-container' );

if( SermonsGrids ) {
    SermonsGrids.forEach( SermonsGrid => {
        asp_init( SermonsGrid );
    } );
}


/** Improves compatability with 3rd party plugins and themes by removing select2 */
(function($) {
    $(document).ready(function() {
        $(".asp-filter-order, .asp-filter-series, .asp-filter-topic, .asp-filter-speaker, .asp-filter-book, .asp-filter-campus, .asp-filter-service-type").each(function() {
            // Check if Select2 is applied and destroy it
            if ($(this).data('select2')) {
                $(this).select2('destroy');
            }

            // Check if it's wrapped in .fancy-select-wrap and unwrap it
            if ($(this).parent().hasClass('fancy-select-wrap')) {
                $(this).unwrap();
            }
        });
    });
})(jQuery);