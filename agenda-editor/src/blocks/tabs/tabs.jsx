import { wp } from '../../wp';

const { times } = require('lodash');
const { InnerBlocks } = wp.blockEditor;
const { RangeControl, TextControl, SelectControl  } = wp.components;
const { useSelect } = wp.data;
const el = wp.element.createElement;
const Fragment = wp.element.Fragment;

window.globaldate=function(){return new Date().valueOf().toString(36)};

/* SINGULAR TAB */
wp.blocks.registerBlockType('ads/tab',{
    title:'Tab',
    category: 'agendahelsinki',
	icon: {background:'#eeeeee',foreground:'#000000',src:'editor-table'},
	attributes:{
		index:{type:'integer',default:0},
		setdate:{type:'string',default:'notset'}
	},
	example:()=>null,
    supports:{
				'inserter':false,
    },
    edit:function(props){
			const {setAttributes} = props;
		if(props.attributes.setdate==='notset'){
			setAttributes({date:new Date().valueOf().toString(36)});
		}
		return el('div',{className:'col-12 p-3 bg-light rounded border border-dark mb-4'},
				el('h5',{className:'p-2 my-0 font-weight-600 text-dark col-12 px-0 text-center'},'Tab '+
					(props.attributes.index+1)),
				el(InnerBlocks,{templateLock:"all",template:[['bootstrap/bsblock',{
					blockeditortitle:' ',templatelock:'off',
					className:'border-0 rounded'}]]})
			);
    },
    save:function(props){
			return el('div',{id:('tab-'+props.attributes.index+'-'+props.attributes.setdate),className:'tab',
			'role':'tabpanel','aria-labelledby':('tab-'+props.attributes.index+'-'+props.attributes.setdate),
			style:{display:(props.attributes.index==0 ? 'block' : 'none')}},
				el(InnerBlocks.Content));
    },

})

/* TAB WRAPPER WITH AMOUNT SELECTOR */
wp.blocks.registerBlockType( 'ads/tabblock', {
    title: 'Tab Block',
    icon: {
        background: '#eee',
        foreground:'#000',
        src:'schedule'
    },
    category: 'agendahelsinki',
    attributes: {
		tabamount:{type: 'integer',default:2},
		selectedstyle:{type: 'string',default:'horizontal'},
		tab0:{type:'string',default:''},
		tab1:{type:'string',default:''},
		tab2:{type:'string',default:''},
		tab3:{type:'string',default:''},
		tab4:{type:'string',default:''},
		tab5:{type:'string',default:''},
		tab6:{type:'string',default:''},
		tab7:{type:'string',default:''},
		tab8:{type:'string',default:''},
		tab9:{type:'string',default:''},
		date:{type:'string',default:'notset'}
		},
		supports:{defaultStylePicker:false},

    edit: function ( props ) {
		const { setAttributes, attributes, clientId } = props;
		const { tabs } = useSelect(select => ({
            tabs: select("core/block-editor").getBlocks(clientId)
		}));

		if(attributes.date==='notset'){
			setAttributes({date:new Date().valueOf().toString(36)});
		}

		// Update the child block's attributes
		var {child} = useSelect(select => ({
			child: select("core/block-editor").getBlocksByClientId(clientId)[0].innerBlocks
		}));
		if(child.length){
			child.forEach((element) => {
				if(element.setdate!='notset'){
					wp.data.dispatch("core/block-editor").updateBlockAttributes(element.clientId, {
						setdate:attributes.date
					});
					console.log('Rewrote list item dates');
				}
			});
		}

		/* LOOP TEXTCONTROLS TO BLOCK ACCORDING TO AMOUNT OF TABS */
		let listitemnames=[];
		for(var p=0;p<attributes.tabamount;p++) {
			let selectedarr='tab'+p;
			listitemnames.push(
				<div className="col-12 col-lg-6 mt-4">
					<h6>Tab {(p+1)} link name</h6>
					<TextControl
					className="p-2 border border-dark bg-light mt-1 mb-2"
					value={attributes[selectedarr]}
					onChange={(newval)=> {
						if(attributes[selectedarr]!=newval) {
							setAttributes({[selectedarr]:newval});
						}
					}}
					/>
				</div>
			
			);
		}

		/* Good practise to wrap return in <Fragment> */
        return (<Fragment>
					<div className="row justify-content-center align-items-center">
						<RangeControl
							label="Tab Amount"
							value={ attributes.tabamount }
							className="col-12 bg-white border border-dark p-2 mt-4 mb-1 mx-1 text-center"
							style={{maxWidth:'50%'}}
							min={ 1 }
							max={ 10 }
							onChange={(newtabamount)=>{

								// DO THINGS ONLY IN ACTUAL CHANGE
								if(attributes.tabamount!=newtabamount) {
									// SET NEW TAB AMOUNT
									setAttributes({tabamount:newtabamount});

									// REWRITE INNERBLOCKS ONLY IF NEW SLIDER VALUE
									let inner_blocks = tabs;
									if (tabs.length < newtabamount) {
										inner_blocks = [
											...inner_blocks,
											...times(newtabamount - tabs.length, (i) =>
												wp.blocks.createBlock('ads/tab',{index:(tabs.length+i),
													setdate:attributes.date})
											)
										];
									} else if (tabs.length > newtabamount) {
										inner_blocks = inner_blocks.slice(0, newtabamount);
									}
									const clientIds = tabs.map( block => block.clientId );
									wp.data.dispatch( 'core/block-editor' ).removeBlocks( clientIds );
									wp.data.dispatch( 'core/block-editor' ).insertBlocks( inner_blocks, 0, clientId );
								}
							}}
						/>
						<SelectControl 
								label="Tabs UI Style" 
								className="col-12 border-0 text-italic font-weight-300 font-size-20 text-dark p-2 mt-4 mb-4 mx-1 text-center"
								value={attributes.selectedstyle}
								options={[
									{ value: 'horizontal', label: 'Horizontal' },
									{ value: 'vertical', label: 'Vertical' }
								]}
								onChange={function(sel){
									if(attributes.selectedstyle!=sel){
										setAttributes({selectedstyle:sel});
									}
								}}
						/>
					</div>
					<div className='row'>{listitemnames}</div>
					<div className='container py-3 border-0'>
						<div className='col-12 d-block px-0 mt-2 mb-5'>
							<div className='row border-0'>
								<InnerBlocks
									template={[
									['ads/tab',{index:0,
										setdate:attributes.date}],
									['ads/tab',{index:1,
										setdate:attributes.date}]
									]}
									allowedBlocks={['ads/tab']}
								/>
							</div>
						</div>
					</div>
				</Fragment>
		);
    },

    save: function (props) {
		let elarr=[];
		const { attributes } = props;

		for(var i=0;i<attributes.tabamount;i++){
			let selectedarr='tab'+i;
			/* TAB LINK */
			elarr.push(
			<div className={'tab-links-container my-0'+(attributes.selectedstyle=='vertical' ? ' col-12 d-block' : ' d-inline-block')}>
				<a href='#n'
				role='tab'
				aria-controls={'tab-'+i+'-'+attributes.date} 
				aria-selected={(i==0 ? 'true' : 'false')}
				className={'tab-link nav-link d-inline-block my-0 px-2 '+
				'text-enento-dark font-weight-600 font-size-16'+
				(attributes.selectedstyle=='vertical' ? ' mt-0 mb-2 py-0 vertical' : ' py-2 horizontal')}
				onClick={()=>{
					var t=jQuery(this), elems=jQuery(this).parent().parent().find(".tab-link").not(this), count = elems.length;
					elems.attr("aria-selected","false");
					t.attr("aria-selected","true");
					elems.each(function(i){
						if (!--count) jQuery("#"+jQuery(this).attr("aria-controls")).fadeOut(400,function(){
							jQuery("#"+t.attr("aria-controls")).fadeIn(400);
						});
						else jQuery("#"+jQuery(this).attr("aria-controls")).fadeOut(400);
					});
				}}
				style={{
					display:'inline-block'
				}}>
					{attributes[selectedarr]}
				</a>
			</div>
			);
		}
		return(
			<div className={'tabbar-wrapper '+(attributes.selectedstyle=='vertical' ? ' row' : '')}>
				<div 
				className={'tablist'+(attributes.selectedstyle=='vertical' ? ' col-12 col-lg-3 vertical' : ' horizontal')}
				role='tablist' 
				style={{
					listStyle:'none',
					display:'block'
				}}>
					{elarr}
				</div>
				<div className={'tab-content'+(attributes.selectedstyle=='vertical' ? ' col-12 col-md-9' : '')}><InnerBlocks.Content/></div>
			</div>
		);
    }
} );