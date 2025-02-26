const wp = window.wp;
const { InnerBlocks } = wp.blockEditor;
const { TextControl  } = wp.components;

wp.blocks.registerBlockType( 'ads/linkwrapper', {
    title: 'Link Wrapper',
    icon: {
        background: '#00695C',
        foreground:'#fff',
        src:'schedule'
    },
    category: 'agendahelsinki',
    attributes: {
		linktarget:{type:'string',default:''},
		},
		example:()=>null,
    edit: function ( props ) {
        return (
		<div className="row no-gutters py-1 border border-success">
			<div className="col-12 px-5 pt-2 pb-3">
				<h3 className="font-size-22 font-weight-700 mb-3 mt-2">Link Wrapper Block</h3>
				<p className="font-size-18 font-weight-500 mb-2 mt-1">Link target</p>
				<TextControl
					className="p-2 border border-dark bg-light mt-1 mb-2"
					value={props.attributes.linktarget}
					onChange={(newval)=> {
						if(props.attributes.linktarget!=newval) {
							props.setAttributes({linktarget:newval});
						}
					}}
				/>
			</div>
			<div className="col-12 mb-3 mb-lg-4 mx-0 py-4 px-5 border-0">
				<p className="font-size-18 font-weight-500 mb-2 mt-1">Link Content</p>
				<InnerBlocks
					template={[['core/paragraph']]}
				/>
			</div>
		</div>
		);
    },

    save: function (props) {
		return(
		<div className={"d-block "+(props.className ? props.className : '')} 
		onClick={()=>{window.location=props.attributes.linktarget}} 
		style={{'cursor':'pointer'}}>
			{<InnerBlocks.Content/>}
		</div>
		);
    }
} );