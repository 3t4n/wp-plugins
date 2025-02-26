( function( blocks, element, editor, components, data ) {
    const { registerBlockType } = blocks;
    const { RichText } = editor;
    const { withSelect } = data;

    registerBlockType( 'adno/admin-notes', {
        title: 'Admin Notes',
        icon: 'admin-comments',
        category: 'widgets',
        attributes: {
            notes: {
                type: 'string',
                default: '',
            },
        },
        edit: withSelect( ( select ) => {
            const notes = select( 'core' ).getEditedPostAttribute( 'meta' )._adno_notes;
            return {
                notes: notes || '',
            };
        } )( function( props ) {
            const { notes } = props;

            return (
                <div className="adno-notes-block-editor">
                    <h2>Admin Notes</h2>
                    <RichText
                        tagName="div"
                        multiline="p"
                        value={ notes }
                        onChange={ ( value ) => {
                            props.setAttributes( { notes: value } );
                            wp.data.dispatch( 'core' ).editPost( { meta: { _adno_notes: value } } );
                        } }
                        placeholder="Add notes..."
                        formattingControls={ [ 'bold', 'italic', 'link', 'blockquote', 'strikethrough' ] }
                    />
                </div>
            );
        } ),
        save: function() {
            return null;
        },
    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.editor,
    window.wp.components,
    window.wp.data
);
