jQuery( document ).ready( ( $ ) => {
    // install codeMirror in admin section
    const editor = wp.codeEditor.initialize( 
        $( '#code-mirror-editor' ), 
        aidmFormData.cmSettings 
    );

    const currentTheme = $( '#code-mirror-editor' ).attr( 'current-theme' ) ?? 'default';

    editor.codemirror.setOption( 'theme', currentTheme );

    editor.codemirror.setOption( 'value', aidmFormData.codeSample );

    //----------
    // event that changes theme on click
    $( '.aidm-theme-list-item' ).on( 'click', ( e ) => {
        e.preventDefault();

        // check new item
        const oldItem = $( '.aidm-theme-list-item.current' );

        const newItem = $( e.target.closest( '.aidm-theme-list-item' ) );

        // set new theme
        oldItem.removeClass( 'current' );

        newItem.addClass( 'current' );

        newItem.find( 'input' )[0].checked = true;

        // set new codeMirror theme
        const newThemeName = newItem.find( 'label' ).attr( 'data-theme-name' );
        
        editor.codemirror.setOption( 'theme', newThemeName );
    });

    //----------
    // check if a new theme is selected before submit
    $( 'input#submit' ).on( 'click', ( e ) => {
        e.preventDefault();

        // if already clicked -> abort
        if ( $( 'li.error-selection' ).length > 0 ) {
            return;
        }

        // if no selected item or is current theme -> return
        const inputCheckedId = $( 'input[name="theme"]' ).filter( ':checked' ).attr( 'id' );

        if ( 
            ! inputCheckedId 
            || inputCheckedId == currentTheme
        ) {
            const items = $( 'li.aidm-theme-list-item' );

            items.addClass( 'error-selection' );

            setTimeout( () => {
                items.removeClass( 'error-selection' );
            }, 550 );

            return;
        }

        // remove event and trigger click ( avoid preventDefault() )
        $( e.target ).off( 'click' ).trigger( 'click' );
    });
});