function contentCenter(editor) {

    // content html in content email
    editor.Components.addType('content-center', {
        model: {
            defaults: {
                style: {
                    //background: 'red',
                },
                tagName: 'div',
                components: ``,
                posts: null
            },
            init() {
                this.setContent();
            },
            
            setContent() {
                this.components(`
                    <table style="margin-left:auto;margin-right:auto;width:100%;max-width:600px;min-height:100px;padding:5px;" >
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                `);
            },
            
        },
        view: {
        }
    });

    //block in sidebar
    editor.BlockManager.add('content-center-block', {
        label: `
            <div style="text-align:center" class="gjs-block gjs-one-bg gjs-four-color-h contentCenterBlock">
                <svg width="37" height="26" viewBox="0 0 37 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="36" height="25" rx="2.5" stroke="#35414D"/>
                    <rect x="5.5" y="0.5" width="26" height="25" stroke="#35414D"/>
                    <path d="M8.82322 17.8232C8.72559 17.9209 8.72559 18.0791 8.82322 18.1768L10.4142 19.7678C10.5118 19.8654 10.6701 19.8654 10.7678 19.7678C10.8654 19.6701 10.8654 19.5118 10.7678 19.4142L9.35355 18L10.7678 16.5858C10.8654 16.4882 10.8654 16.3299 10.7678 16.2322C10.6701 16.1346 10.5118 16.1346 10.4142 16.2322L8.82322 17.8232ZM28.1768 18.1768C28.2744 18.0791 28.2744 17.9209 28.1768 17.8232L26.5858 16.2322C26.4882 16.1346 26.3299 16.1346 26.2322 16.2322C26.1346 16.3299 26.1346 16.4882 26.2322 16.5858L27.6464 18L26.2322 19.4142C26.1346 19.5118 26.1346 19.6701 26.2322 19.7678C26.3299 19.8654 26.4882 19.8654 26.5858 19.7678L28.1768 18.1768ZM9 18.25H28V17.75H9V18.25Z" fill="#35414D"/>
                </svg>
            
                <div class="gjs-block-label">
                    Sección centrada
                </div>
            </div>
        `,
        content: {
            type: 'content-center'
        },
        category: 'Extra'
    });
}