/**
 * Jawda YouTube Embed - SEO Friendly - Schema - Speed
 *
 * @author Sabry Suleiman <https://twitter.com/sabry_suleiman>
 * @copyright jawda <https://jawdadesigns.com/>
 * @license GPL3
 * @package jawdadesigns\jawda-youtube-embed
 * @version 1.0.0
 */

wp.blocks.registerBlockType( 'jawda-blocks/jawda-youtube-embed', {
    /**
     * Block title.
     * @var string
     * @since 1.0.0
     */
    title: wp.i18n.__( 'jawda YT embed', 'jawda-youtube-embed' ),
    /**
     * Block description.
     * @var string
     * @since 1.0.0
     */
    description: wp.i18n.__( 'Lazyload YouTube Embed Plugin', 'jawda-youtube-embed' ),
    /**
     * Block icon.
     * @var string
     * @since 1.0.0
     */
    icon: 'format-video',
    /**
     * Block category.
     * @var string
     * @since 1.0.0
     */
    category: 'jawda-blocks',
    /**
     * Keywords.
     * @var array
     * @since 1.0.0
     */
    keywords: [
        wp.i18n.__( 'wpmvc', 'jawda-youtube-embed' ),
        wp.i18n.__( 'mvc', 'jawda-youtube-embed' ),
        wp.i18n.__( 'block', 'jawda-youtube-embed' ),
    ],
    /**
     * Attributes / properties.
     * @var dictionary
     * @since 1.0.0
     */
    attributes:
    {
        /**
         * Block ID to display.
         * If left blank, should use current.
         * @since 1.0.0
         * @var number
         */
        url:
        {
            type: 'string'
        },
				title:
        {
            type: 'string'
        },
    },
    /**
     * Returns the editor display block and HTML markup.
     * The "edit" property must be a valid function.
     * @since 1.0.0
     *
     * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     *
     * @param {object} props
     *
     * @return {object} element
     */
    edit: function( video ) {

        return [
            wp.element.createElement(
                'div',
                {
                    className: video.className,
                },
                (video.attributes.pros
                    ? 'Block [jawda_yt url="'+video.attributes.url+'" title="'+video.attributes.title+'"]'
                    : 'Block [jawda_yt]'
                )
            ),
            wp.element.createElement( wp.components.TextControl, {
              label: 'url',
              value: video.attributes.url,
              onChange: ( value ) => {
                video.setAttributes( { url: value } );
              }
            }
						),
						wp.element.createElement( wp.components.TextControl, {
              label: 'title',
              value: video.attributes.title,
              onChange: ( value ) => {
                video.setAttributes( { title: value } );
              }
            }

					)
        ];

    },
    /**
     * Returns the HTML markup that will be rendered in live post.
     * The "save" property must be a valid function.
     * @since 1.0.0
     *
     * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
     *
     * @param {object} props
     *
     * @return {object} element
     */
    save: function( video ) {

        return wp.element.createElement(
            'div',
            {
                className: video.className,
            },
            (video.attributes.url
                ? '[jawda_yt url="'+video.attributes.url+'" title="'+video.attributes.title+'"]'
                : '[jawda_yt]'
            )
        );
    },
} );
