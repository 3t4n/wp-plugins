const changeCodeMirrorTheme = () => {
    const $ = jQuery;
    const codeMirrorInstance = $( '.CodeMirror' );

    if ( codeMirrorInstance.length == 0 ) {
        return;
    } 

    const themeName = aidm['theme_name'];

    codeMirrorInstance[0].CodeMirror.setOption( 'theme', themeName );
}

// This script changes codeMirror defaults settings
jQuery( document ).ready( ( $ ) => {
    // this part modify the custom css IDE in the customize panel
    // Select the node that will be observed for mutations
    const targetNode = document.body;

    // Options for the observer (which mutations to observe)
    const config = { 
        childList: true, 
        subtree: true 
    };

    // Create an observer instance
    const observer = new MutationObserver( () => {
        // Look for elements with the class name 'CodeMirror'
        const additionalCSSTab = $( 'li#accordion-section-custom_css > h3' );
        const codeMirrorElement = $( '.CodeMirror' );

        if ( codeMirrorElement.length > 0 ) {
            // Do something if the element is found
            changeCodeMirrorTheme();
            
            observer.disconnect();
                    
        } else if ( additionalCSSTab.length > 0 ) {
            // if on personalize panel
            additionalCSSTab.on( 'click', changeCodeMirrorTheme );

            observer.disconnect();
                    
        } else {
            // deactivate after
            setTimeout( () => {
                observer.disconnect();
            }, 3000 );
        }
    });

    // Start observing the target node for configured mutations
    observer.observe(targetNode, config);
});