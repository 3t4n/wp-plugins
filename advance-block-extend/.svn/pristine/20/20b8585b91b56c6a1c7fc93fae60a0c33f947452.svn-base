(function (blocks, editor, components, i18n, element) {

  var el = wp.element.createElement
  var registerBlockType = wp.blocks.registerBlockType
  var createBlock = wp.blocks.createBlock
  var RichText = wp.editor.RichText
  var Editable = wp.blocks.Editable
  var BlockControls = wp.editor.BlockControls
  var AlignmentToolbar = wp.editor.AlignmentToolbar
  var MediaUpload = wp.editor.MediaUpload
  var InspectorControls = wp.editor.InspectorControls
  var TextControl = components.TextControl
  var FontSizePicker = wp.editor.FontSizePicker
  var ColorPicker = wp.components.ColorPicker
  var CheckboxControl = wp.components.CheckboxControl
  var RangeControl = wp.components.RangeControl


  registerBlockType('gutenberg-extend/transform-block', { 

    title: i18n.__('Transform Paragraph'),
    description: i18n.__('A custom transform block.'),
    icon: 'warning',
    category: 'gutenberg-extend',
    attributes: {
      featureContent: { type: 'string' },
      featureFontSize: { type: 'number', default:20 },
    },

    transforms: {
        from: [
            {
                type: 'block',
                blocks: [ 'core/heading' ],
                transform: function( attrs ) {                  
                    return wp.blocks.createBlock( 'gutenberg-extend/transform-block', {
                        featureContent: attrs.content,
                    } );
                },
            },
        ],
        to: [
            {
                type: 'block',
                blocks: [ 'core/heading' ],
                transform: function( attrs ) {                 
                    return wp.blocks.createBlock( 'core/heading', {
                        content: attrs.featureContent,
                    } );
                },
            },
        ],
    },

    edit: function (props) {
      var attributes = props.attributes     
      var featureContent = props.attributes.featureContent
      var featureFontSize = props.attributes.featureFontSize
      var get_featureFontSize = featureFontSize + 'px'
     
      function onChangeContent( newContent ) {
            props.setAttributes( { featureContent: newContent } );
      }

      function onChangeFontSize( newFontSize ) {          
            props.setAttributes( { featureFontSize: newFontSize } );
      }

      return [
          
          el(InspectorControls, { key: 'inspector' },
            
            el( components.PanelBody, {
                title: i18n.__('Block Settings'),
                className: 'block-setting',
                initialOpen: false
              },

              el(RangeControl, {
                label: i18n.__('FontSize.'),               
                value: featureFontSize,
                onChange: onChangeFontSize,
              }),
              
            )
          ),  

          el(
              RichText,
              {                
                  tagName: 'div',
                  style:{fontSize: get_featureFontSize},
                  className: props.className,                    
                  onChange: onChangeContent,
                  value: featureContent,
              }
          )

      ]
    },

    save: function (props) {
      var attributes = props.attributes
      var featureContent = props.attributes.featureContent
      var featureFontSize = props.attributes.featureFontSize
      var get_featureFontSize = featureFontSize + 'px'
      
        return el( 'div', { className: props.className, style:{fontSize: get_featureFontSize} }, featureContent )
    }
  })

})(
  window.wp.blocks,
  window.wp.editor,
  window.wp.components,
  window.wp.i18n,
  window.wp.element
)
