( function( window, wp ){

    var link_id =  'Blockheight_Editor_Link';
    if(!b_object.published ){
        var link_html = '<div><span>Current  &#x20BF;lockheight : </span><a id="' + link_id + '" class="components-buttons">'+ b_object.current +'</a></div>';

    }else{
var link_html = '<div><span>Published  &#x20BF;lockheight : </span><a id="' + link_id + '" class="components-buttons">'+ b_object.published +'</a></div><div><span>Current  &#x20BF;lockheight : </span><a id="' + link_id + '" class="components-buttons">'+ b_object.current +'</a></div>';
    }
 

    var editorEl = document.getElementById( 'editor' );
    if( !editorEl ){ 
        return;
    }

    var unsubscribe = wp.data.subscribe( function () {
        setTimeout( function () {
            if ( !document.getElementById( link_id ) ) {
                var toolbalEl = editorEl.querySelector( '.edit-post-post-schedule' );
                if( toolbalEl instanceof HTMLElement ){
                    toolbalEl.insertAdjacentHTML( 'afterend', link_html );
                }
            }
        }, 1 )
    } );

} )( window, wp )