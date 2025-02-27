export default ( { attributes, setAttributes, className } ) => {
    const { __ } = wp.i18n;
    const { InspectorControls } = wp.blockEditor;
    const { 
        BaseControl,
        PanelBody,
        FormToggle,
        TextControl 
    } = wp.components;
    const { 
        username,
        autoplay,
        allowfullscreen,
    } = attributes;

    function get_embed() {
        if ( username ) {
            return (
                <iframe 
                src={ 
                    'https://player.twitch.tv/?channel=' 
                    + username
					+ '&parent=' + window.location.hostname
					+ '&autoplay=' + autoplay
                    + '&allowfullscreen=' + allowfullscreen
                } 
                frameborder="0" 
                allowfullscreen=""
                scrolling="no" 
                height="378" 
                width="620"
                ></iframe>
            );
        }
    }

    return [
        <InspectorControls>
            <PanelBody 
                title={ __( 'Stream Settings', 'sv_block_for_twitch' ) }
                initialOpen={ true }
            >
                <BaseControl 
                    id='inspector-form-toggle-1'
                    label={ __( 'Autoplay', 'sv_block_for_twitch' ) }
                >
                    <FormToggle
                        id='inspector-form-toggle-1'
                        checked={ autoplay }
                        onChange={ () => setAttributes( { autoplay: ! autoplay } ) }
                    />
                </BaseControl>
                <BaseControl 
                    id='inspector-form-toggle-2'
                    label={ __( 'Allow Fullscreen', 'sv_block_for_twitch' ) }
                >
                    <FormToggle
                        id='inspector-form-toggle-2'
                        checked={ allowfullscreen }
                        onChange={ () => setAttributes( { allowfullscreen: ! allowfullscreen } ) }
                    />
                </BaseControl>
            </PanelBody>
        </InspectorControls>,
        <div className={ className }>
            <TextControl
                type='text'
                name='username'
                label={ __( 'Twitch Username', 'sv_twitch' ) }
                placeholder={ __( 'Paste your Twitch username', 'sv_twitch' ) }
                value={ username }
                onChange={ ( content ) => setAttributes( { placeholder: content, username: content } ) }
            />
            {get_embed()}
        </div>
    ];
}