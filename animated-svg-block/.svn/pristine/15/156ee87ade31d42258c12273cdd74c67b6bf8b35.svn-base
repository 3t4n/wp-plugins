(function (wp) {
  const {
    registerBlockType
  } = wp.blocks;
  const {
    MediaUpload,
    InspectorControls
  } = wp.blockEditor;
  const {
    Button,
    PanelBody,
    PanelRow
  } = wp.components;
  const {
    Fragment,
    useState,
    useEffect
  } = wp.element;
  const { __ } = wp.i18n; // Add this line to import the translation function

  // Utility function to extract the highest appended value
  function getMaxAppendedValue(attribute) {
    const matches = attribute.match(/_([0-9]+)$/);
    return matches ? parseInt(matches[1], 10) : 0;
  }

  let svgCounter = 0;

  registerBlockType('animated-svg-block/svg-block', {
    title: __('Animated SVG Block', 'animated-svg-block'),
    icon: 'format-image',
    category: 'common',
    attributes: {
      svgUrl: {
        type: 'string',
        default: ''
      },
      svgId: {
        type: 'string',
        default: ''
      }
    },
    edit: function (props) {
      const {
        attributes: {
          svgUrl,
          svgId
        },
        setAttributes
      } = props;

      useEffect(() => {
        if (!svgId) {
          svgCounter += 1;
          setAttributes({ svgId: `svg_image_${svgCounter}` });
        } else {
          const currentMax = getMaxAppendedValue(svgId);
          svgCounter = Math.max(svgCounter, currentMax);
        }
      }, []);

      const onSelectImage = function (media) {
        setAttributes({
          svgUrl: media.url
        });
      };

      return wp.element.createElement(
        Fragment,
        null,
        wp.element.createElement(
          InspectorControls,
          null,
          wp.element.createElement(
            PanelBody,
            { title: __('SVG Settings', 'animated-svg-block') },
            wp.element.createElement(
              PanelRow,
              null,
              wp.element.createElement(MediaUpload, {
                onSelect: onSelectImage,
                allowedTypes: ['image'],
                value: svgUrl,
                render: function (_ref) {
                  let { open } = _ref;
                  return wp.element.createElement(Button, {
                    isPrimary: true,
                    onClick: open
                  }, __('Select SVG Image', 'animated-svg-block')); // Make this string translatable
                }
              })
            )
          )
        ),
        wp.element.createElement(
          'div',
          { className: 'svg-block-editor' },
          svgUrl
            ? wp.element.createElement('img', { id: svgId, src: svgUrl, alt: 'Selected SVG', className: 'img-fluid' })
            : wp.element.createElement(MediaUpload, {
                onSelect: onSelectImage,
                allowedTypes: ['image'],
                render: function (_ref2) {
                  let { open } = _ref2;
                  return wp.element.createElement(Button, {
                    isPrimary: true,
                    onClick: open
                  }, __('Select SVG Image', 'animated-svg-block'));
                }
              })
        )
      );
    },
    save: function (props) {
      const {
        attributes: {
          svgUrl,
          svgId
        }
      } = props;

      return wp.element.createElement(
        'div',
        { className: 'svg-block' },
        svgUrl && wp.element.createElement('img', {
          id: svgId,
          src: svgUrl,
          className: 'img-fluid'
        })
      );
    }
  });
})(window.wp);
