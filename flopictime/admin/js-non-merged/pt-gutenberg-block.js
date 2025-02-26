//const pt_registerBlockType = wp.blocks.registerBlockType; //Blocks API
const pt_createElement = wp.element.createElement; //React.createElement
//const {__} = wp.i18n; //translation functions
//const {InspectorControls} = wp.blockEditor; //Block inspector wrapper
//const {TextControl,SelectControl} = wp.components; //WordPress form inputs and server-side renderer
const PtServerSideRender = wp.serverSideRender;


wp.domReady( function() {
  // Re init the masonry, slider or PicTime View
  reRenderPTGallery();
} );

function reRenderPTGallery() {

    // Re init the masonry, slider or PicTime View
    var blockLoaded = false;
    var blockLoadedInterval = setInterval(function() {
        if (jQuery('.grid-main-wrap.pictime-view').length || jQuery('.pt-slideshow--container').length || jQuery('.packery-main-wrap').length ) {/*post-title-0 is ID of Post Title Textarea*/
            //Actual functions goes here
            jQuery( "body").trigger( "flo_pt_init_slider" );
            console.log('PT elements ready');
            blockLoaded = true;
        }
        if ( blockLoaded ) {
            clearInterval( blockLoadedInterval );
        }
    }, 500);
}

wp.blocks.registerBlockType( 'flo-pt/gallery', {
	title: wp.i18n.__( 'PicTime Gallery' ), // Block title.
	category:  wp.i18n.__( 'common' ), //category
  keywords: [
		wp.i18n.__( 'Pictime' ),
		wp.i18n.__( 'Gallery' ),
	],
  attributes:  {
		id : {
			//default: '',
      default: pt_posts[0].value,

		},
	},


	//display the shortcode
  edit(props){
		const attributes =  props.attributes;
		const setAttributes =  props.setAttributes;

		//Function to update id attribute
		function changeId(id){

			setAttributes({id}); // set the selected ID
      setTimeout(function () {
        reRenderPTGallery();
      }, 10);
      //reRenderPTGallery();

		}

		//Display block preview and UI
		return pt_createElement('div', {key: Math.random()}, [
			//Preview a block with a PHP render callback
			pt_createElement( PtServerSideRender, {
        key: Math.random(),
				block: 'flo-pt/gallery',
				attributes: attributes
			}),
			//Block inspector
			pt_createElement( wp.blockEditor.InspectorControls, {key: Math.random()},
				[
					pt_createElement(wp.components.SelectControl, {
            key: Math.random(),
						value: attributes.id,
						label: wp.i18n.__( 'Select PicTime Gallery' ),
						onChange: changeId,
            options: pt_posts,

					}),
				]
			)
		] )
	},
	save(){
		return null;//save has to exist. This all we need
	}
});
