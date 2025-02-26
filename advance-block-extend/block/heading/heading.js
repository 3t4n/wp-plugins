(function (blocks, editor, components, i18n, element, data) {

  var el = wp.element.createElement
  var registerBlockType = wp.blocks.registerBlockType
  var RichText = wp.editor.RichText
  var BlockControls = wp.editor.BlockControls
  var InspectorControls = wp.editor.InspectorControls
  var AlignmentToolbar = wp.editor.AlignmentToolbar
  var ColorPalette= wp.components.ColorPalette
  var TabPanel= wp.components.TabPanel
  var range = lodash.range

  registerBlockType( 'gutenberg-extend/heading-block', {
    title: i18n.__( 'Heading block' ),
    description: i18n.__( 'A Heading block for customizing your content.' ),
    icon: 'editor-textcolor',
    category: 'gutenberg-extend',
    attributes: {
      alignment:   { type: 'string', default: 'left'  },
      contentText: { type: 'string' },
      level:       { type: "number", default: 2  },
      contentColor:{ type: 'string', default: '#000000'  },
      contentBoxColor:{ type: 'string', default: '#ffffff'},
      contentTransform:{ type: 'string', default: 'none' },
    },
    
    edit: function( props ) {
      var attributes = props.attributes
      var alignment = props.attributes.alignment
      var contentText = props.attributes.contentText
      var contentColor = props.attributes.contentColor
      var contentBoxColor = props.attributes.contentBoxColor
      var tagLevel = 'h' + props.attributes.level
      var contentTransform = props.attributes.contentTransform

       function onChangeAlignment( newAlignment ) {
        props.setAttributes( { alignment: newAlignment } )
      }
        
      function onChangeContentTransform( newcontentTransform ) {
        props.setAttributes( { contentTransform: newcontentTransform } )
      }

      function createLevelControl( targetLevel ) { 
          return {
            icon: 'heading',
            title: targetLevel,
            isActive: tagLevel === 'h' + targetLevel,
            onClick: function() {
              props.setAttributes( { level: targetLevel } )
            },
            subscript: String( targetLevel ),
          };
      }

      return [
        el( BlockControls, { key: 'controls' },
          el(components.Toolbar,{
              controls:range( 1, 7 ).map( createLevelControl ),
          })
        ),
        el( InspectorControls, { key: 'inspector' },
          el( components.PanelBody, {
              title: i18n.__( 'Heading Block Setting' ),
              initialOpen: false,              
            },
            
            el( 'p', {}, i18n.__( 'Change Text Alignment' ) ),
            
            el( AlignmentToolbar, {
              value: alignment,
              onChange: onChangeAlignment,
            } ),
            
            el( 'p', {}, i18n.__( 'Select Heading Level' ) ),
            el(components.Toolbar,{
              controls:range( 1, 7 ).map( createLevelControl ),
            }),
          ),
          el( editor.PanelColorSettings, {
              title: i18n.__( 'Color Setting' ),
              initialOpen: false,          
              colorSettings:[
                {
                  value:contentColor,
                  label:'Change Text Color',
                  onChange:function(txtcolor){
                      props.setAttributes( { contentColor: txtcolor } )
                  }
                },
                {
                  value:contentBoxColor,
                  label:'Change Box Color',
                  onChange:function(Boxcolor){
                      props.setAttributes( { contentBoxColor: Boxcolor } )
                    }
                },
              ],
            },
          ),

          el( components.PanelBody, {
              title: i18n.__( 'Font Setting' ),
              initialOpen: false,              
            },
            el( 'p', {}, i18n.__( 'Apply Content Text Transform.' ) ),          
            el( components.SelectControl, {              
              value: contentTransform,
              onChange: onChangeContentTransform,
              options: [
                { value: 'none', label: i18n.__( 'None' ) },
                { value: 'capitalize', label: i18n.__( 'Capitalize' ) },
                { value: 'uppercase', label: i18n.__( 'Uppercase' ) },
                { value: 'lowercase', label: i18n.__( 'Lowercase' ) },
              ],
            }),

          ),

        ),
        el('div',{className: props.className,style:{backgroundColor:contentBoxColor}},
          el('div',{className: 'wp-block-gutenberg-extend-inner-heading-block'},
            el('div',{  
              className: 'wp-block-gutenberg-extend-inner-wrap-heading-block heading-' + contentTransform,             
              style: { textAlign: alignment} 
              },
              el( RichText, {
                //key: 'editable',
                tagName: tagLevel,
                placeholder: 'Enter Text Here',
                //keepPlaceholderOnFocus: true,
                //formattingControls: [ 'bold', 'link' ],
                value: contentText,
                style:{color:contentColor},
                onChange: function( content_txt ) {                  
                  props.setAttributes( { contentText: content_txt } )
                },
              }),
            )
          ),
        ),

      ];
      
    },

    save: function( props ) {
      var attributes = props.attributes
      var alignment = props.attributes.alignment
      var contentText = props.attributes.contentText
      var contentColor = props.attributes.contentColor      
      var contentBoxColor = props.attributes.contentBoxColor
      var tagLevel = props.attributes.level      
      var contentTransform = props.attributes.contentTransform
      
      return el('div',{className: props.className, style:{backgroundColor:contentBoxColor}},
                el('div',{className: 'wp-block-gutenberg-extend-inner-heading-block'},
                  el('div',{
                    className: 'wp-block-gutenberg-extend-inner-wrap-heading-block heading-' + contentTransform,               
                    style: { textAlign: alignment} 
                    },
                    el( RichText.Content, {
                      tagName: 'h' + tagLevel,
                      value: contentText,
                      style:{color:contentColor}
                    })
                  )
                )
              )
    },    
  });
  
} )(
  window.wp.blocks,
  window.wp.editor,
  window.wp.components,
  window.wp.i18n,
  window.wp.element,
  //window.lodash,
);