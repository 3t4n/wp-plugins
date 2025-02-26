(function (blocks, editor, components, i18n, element, data) {

  var el = wp.element.createElement
  var registerBlockType = wp.blocks.registerBlockType
  var withSelect = wp.data.withSelect
  var InspectorControls = wp.editor.InspectorControls 
  var ColorPicker = wp.components.ColorPicker
  var ColorPalette = wp.components.ColorPalette


  registerBlockType( 'gutenberg-extend/posts-block', {
      title: 'Latest Post',
      icon: 'megaphone',
      category: 'gutenberg-extend',
      attributes: {
        TitleColor: {  type: 'string',  default : '#067390'  },
        boxColor: {  type: 'string',  default : '#fff'  },
        TxtFontSize: { type: 'number',  default: 22   },
      },
      

      edit: withSelect( function(select) {         
       
        return {
            posts: select( 'core' ).getEntityRecords( 'postType', 'post',{
              per_page: 5
            }),
            categoriesList: select( 'core' ).getEntityRecords( 'taxonomy', 'category' )
        };


      } )( function( props ) {
          var attributes = props.attributes
          var categoriesList = props.categoriesList
          var order = props.attributes.order
          var TitleColor = props.attributes.TitleColor
          var boxColor = props.attributes.boxColor
          var TxtFontSize = props.attributes.TxtFontSize
          

          if ( ! props.posts || ! categoriesList) {
              return i18n.__( 'Loading...' );
          }
          if ( props.posts.length === 0 ) {
              return i18n.__( 'No posts' );
          }
          var className = props.className;
          var post = props.posts;
          


          function onChangeTxtFontSize( newTxtFontSize ) {
            props.setAttributes( { TxtFontSize: newTxtFontSize } )
          }

          return [ 

            el(
              'div',
              { className: 'post-list',style:{backgroundColor:boxColor}},
                el(                  
                  'ul',
                  { },
                  post.map(function(getPosts) {               

                    return el(                  
                        'li',
                        { },
                        el(
                          'a', 
                          { className: className, href: getPosts.link,style:{color:TitleColor, fontSize: TxtFontSize + 'px'}},
                          getPosts.title.rendered
                      )
                    )
                  })
              )
            ),

            el(InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
              
                el( components.PanelBody, {
                    title: i18n.__('Latest Post Settings'),
                    className: 'block-latest-post-settings',
                    initialOpen: false
                  },
                  el( 'p', {}, i18n.__( 'Apply Content Font Size.' ) ),         
                    el( components.RangeControl, {
                      value: TxtFontSize, 
                      min: 12,
                      max: 70,
                      onChange: onChangeTxtFontSize,              
                    }),
                ),
                el( editor.PanelColorSettings, {
                    title: i18n.__( 'Color Setting' ),
                    initialOpen: false,          
                    colorSettings:[
                      {
                        value:TitleColor,
                        label:'Change Title Color',
                        onChange:function(TitleColorvalue){
                            props.setAttributes( { TitleColor: TitleColorvalue } )
                        }
                      },
                      {
                        value:boxColor,
                        label:'Change Box Color',
                        onChange:function(boxColorvalue){
                            props.setAttributes( { boxColor: boxColorvalue } )
                          }
                      },
                    ],
                  },
                ),

          ), // End of Inspector Panel
        ]

      } ),

      save: function() {
          // Rendering in PHP
          return null;
      },
  } );
  

})(
  window.wp.blocks,
  window.wp.editor,
  window.wp.components,
  window.wp.i18n,
  window.wp.element,
  window.wp.data
)
