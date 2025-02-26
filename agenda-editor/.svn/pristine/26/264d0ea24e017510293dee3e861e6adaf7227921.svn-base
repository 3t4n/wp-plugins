import { blueGrey, indigo } from '@material-ui/core/colors';
import React from 'react';
// UI
import { CustomSlider } from '../editorcomponents';
 

const BLOCKS_TEMPLATE_THEME = [['agenda/slickslide'],];
const SLIDE_BLOCKS_TEMPLATE_THEME = [['agendahelsinki/tailwindblock'],];
const ALLOWED_BLOCKS_THEME = [ 'agenda/slickslide' ];
const wp = window.wp;
const { InnerBlocks, InspectorControls  } = wp.blockEditor
/**
 * Slide
 */
wp.blocks.registerBlockType( 'agenda/slickslide', {
    title: 'Slick.js Slide (Agenda Theme)',
	category: 'agendahelsinki',
	icon: {background: '#ff2e44',foreground:'#000',src:'tagcloud'},
	parent: [ 'agenda/slick' ],
	supports: {
		inserter: true
	},
	example:()=>null,
	getEditWrapperProps:(attributes)=>{
		return{
			style:{border:'solid 1px black'}
		}
	},
    edit: ( props ) => {
		return (
		<div className="w-full">
			<div className="w-full bg-white border-0">
				<div className="d-block">
					<p className="display-4 font-weight-light block text-left inline-block py-3 px-5 mx-4 text-dark rounded shadow-sm"
					style={{fontSize:18,backgroundColor:blueGrey['100']}}>
						Carousel Slide
					</p>
				</div>
				<div className='block px-3 px-lg-6'>
					{( 'undefined' !== typeof props.insertBlocksAfter ) ?
					<wp.blockEditor.InnerBlocks template={SLIDE_BLOCKS_TEMPLATE_THEME} /> : null}
				</div>
			</div>
		</div>
		);
    },
    save: () => {
		return (
		<div className="w-full px-0">
			<div className="w-full px-0 bg-white border-0">
				<wp.blockEditor.InnerBlocks.Content />
			</div>
		</div>
		);
    },
});

const CustomBlockAppender = () => <div style={{width:'100%',maxWidth:'100%',minHeight:100,padding:10}}>
    <div style={{width:'100%',display:'flex',borderStyle:'dashed',borderWidth:1,
    borderColor:'#8a8a8a',flexFlow:'row wrap',justifyContent:'center',padding:10,alignItems:'center',
    backgroundColor:'rgba(230,230,230,0.5)'}}>
		<p className="text-center">Add Slide</p>
        <InnerBlocks.ButtonBlockAppender />
    </div>
</div>


/**
 * Slick Block
 */
wp.blocks.registerBlockType( 'agenda/slick', {
    title: 'Slick.js',
	category: 'agendahelsinki',
	icon: {background: '#eee',foreground:'#000',src:'admin-page'},
	supports: {
		defaultStylePicker:false,
		inserter: true
	},
	attributes: {
		className:{type:'string',default:''},
		editorlabel:{type:'string',default:''},

		//SLICK CHOICES
		slidesToShow:{type:'integer',default:1},
		slidesToScroll:{type:'integer',default:1},
		dots:{type:'boolean',default:true},
		infinite:{type:'boolean',default:true},
		speed:{type:'integer',default:500},
		fade:{type:'boolean',default:true},
		cssEase:{type:'string',default:'linear'},
		autoplay:{type:'boolean',default:true},
		autoplaySpeed:{type:'integer',default:4000},
		pauseOnHover:{type:'boolean',default:false},
		centerMode: {type: 'boolean',default:true},
		adaptiveHeight: {type:'boolean',default:true},
		variableWidth:{type:'boolean',default:true},
		arrows:{type:'boolean',default:true}
	},
	getEditWrapperProps:(attributes)=>{
		return{
			style:{border:'solid 1px black'}
		}
	},
    edit: props => {
		const {attributes,setAttributes} = props;
		const checkedcolor=indigo[500];
		return ( 
			<div className="slick-block-edit w-full p-3 border-0">
				<div className="block w-full text-center mb-4">
					<div className="inline-block mr-6">
						<svg width={30} height={30} viewBox="0 0 16 16" 
						className="bi bi-easel" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M8.473.337a.5.5 0 0 0-.946 0L6.954 2h2.092L8.473.337zM12.15 11h-1.058l1.435 4.163a.5.5 0 0 0 .946-.326L12.15 11zM8.5 11h-1v2.5a.5.5 0 0 0 1 0V11zm-3.592 0H3.85l-1.323 3.837a.5.5 0 1 0 .946.326L4.908 11z"/>
							<path fillRule="evenodd" d="M14 3H2v7h12V3zM2 2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
						</svg>
					</div>
					<h2 className="inline-block w-full">Slick.js Carousel</h2>
					<h3 className="inline-block w-full">Options</h3>
				</div>
				<div className="block w-full text-center mb-2 mt-1">
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:120}}>
						<p className="block w-full mt-0 mb-3">Dots</p>
						<div>
							<button className={"btn p-1 "+(attributes.dots ? 'btn-primary' : 'btn-light')} 
							onClick={() => {setAttributes({dots:!attributes.dots});}}>
								{attributes.dots ? (<svg width={20} height={20} viewBox="0 0 16 16" 
								className="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fillRule="evenodd" 
									d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>) : (
									<svg width={20} height={20} viewBox="0 0 16 16" 
									className="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fillRule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
										<path fillRule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
									</svg>
								)}
							</button>
						</div>
					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:120}}>
						<p className="block w-full mt-0 mb-3">Infinite scroll</p>
						<div>
							<button className={"btn p-1 "+(attributes.infinite ? 'btn-primary' : 'btn-light')} 
							onClick={() => {setAttributes({infinite:!attributes.infinite});}}>
								{attributes.infinite ? (<svg width={20} height={20} viewBox="0 0 16 16" 
								className="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fillRule="evenodd" 
									d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>) : (
									<svg width={20} height={20} viewBox="0 0 16 16" 
									className="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fillRule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
										<path fillRule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
									</svg>
								)}
							</button>
						</div>
					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:120}}>
						<p className="block w-full mt-0 mb-3">Fade</p>
						<div>
							<button className={"btn p-1 "+(attributes.fade ? 'btn-primary' : 'btn-light')} 
							onClick={() => {setAttributes({fade:!attributes.fade});}}>
								{attributes.fade ? (<svg width={20} height={20} viewBox="0 0 16 16" 
								className="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fillRule="evenodd" 
									d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>) : (
									<svg width={20} height={20} viewBox="0 0 16 16" 
									className="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fillRule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
										<path fillRule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
									</svg>
								)}
							</button>
						</div>
					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:120}}>
						<p className="block w-full mt-0 mb-3">Autoplay</p>
						<div>
							<button className={"btn p-1 "+(attributes.autoplay ? 'btn-primary' : 'btn-light')} 
							onClick={() => {setAttributes({autoplay:!attributes.autoplay});}}>
								{attributes.autoplay ? (<svg width={20} height={20} viewBox="0 0 16 16" 
								className="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fillRule="evenodd" 
									d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>) : (
									<svg width={20} height={20} viewBox="0 0 16 16" 
									className="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fillRule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
										<path fillRule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
									</svg>
								)}
							</button>
						</div>
					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:120}}>
						<p className="block w-full mt-0 mb-3">Pause on hover</p>
						<div>
							<button className={"btn p-1 "+(attributes.pauseOnHover ? 'btn-primary' : 'btn-light')} value="check" 
							onClick={() => {setAttributes({pauseOnHover:!attributes.pauseOnHover});}}>
								{attributes.pauseOnHover ? (<svg width={20} height={20} viewBox="0 0 16 16" 
								className="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fillRule="evenodd" 
									d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>) : (
									<svg width={20} height={20} viewBox="0 0 16 16" 
									className="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fillRule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
										<path fillRule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
									</svg>
								)}
							</button>
						</div>
					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:120}}>
						<p className="block w-full mt-0 mb-3">Center Mode</p>
						<div>
							<button className={"btn p-1 "+(attributes.centerMode ? 'btn-primary' : 'btn-light')} 
							onClick={() => {setAttributes({centerMode:!attributes.centerMode});}}>
								{attributes.centerMode ? (<svg width={20} height={20} viewBox="0 0 16 16" 
								className="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fillRule="evenodd" 
									d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>) : (
									<svg width={20} height={20} viewBox="0 0 16 16" 
									className="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fillRule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
										<path fillRule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
									</svg>
								)}
							</button>
						</div>
					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:120}}>
						<p className="block w-full mt-0 mb-3">Adaptive Height</p>
						<div>
							<button className={"btn p-1 "+(attributes.adaptiveHeight ? 'btn-primary' : 'btn-light')}
							onClick={() => {setAttributes({adaptiveHeight:!attributes.adaptiveHeight});}}>
								{attributes.adaptiveHeight ? (
								<svg width={20} height={20} viewBox="0 0 16 16" 
								className="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fillRule="evenodd" 
									d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>) : (
									<svg width={20} height={20} viewBox="0 0 16 16" 
									className="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fillRule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
										<path fillRule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
									</svg>
								)}
							</button>
						</div>
					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:120}}>
						<p className="block w-full mt-0 mb-3">Variable Width</p>
						<div>
							<button className={"btn p-1 "+(attributes.variableWidth ? 'btn-primary' : 'btn-light')}
							onClick={() => {setAttributes({variableWidth:!attributes.variableWidth});}}>
								{attributes.variableWidth ? (
								<svg width={20} height={20} viewBox="0 0 16 16" 
								className="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fillRule="evenodd" 
									d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>) : (
									<svg width={20} height={20} viewBox="0 0 16 16" 
									className="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fillRule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
										<path fillRule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
									</svg>
								)}
							</button>
						</div>
					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:120}}>
						<p className="block w-full mt-0 mb-3">Arrows</p>
						<div>
							<button className={"btn p-1 "+(attributes.arrows ? 'btn-primary' : 'btn-light')}
							onClick={() => {setAttributes({arrows:!attributes.arrows});}}>
								{attributes.arrows ? (
								<svg width={20} height={20} viewBox="0 0 16 16" 
								className="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fillRule="evenodd" 
									d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
								</svg>) : (
									<svg width={20} height={20} viewBox="0 0 16 16" 
									className="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fillRule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
										<path fillRule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
									</svg>
								)}
							</button>
						</div>
					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:200}}>
						
						<CustomSlider title={"Slides to Show"} 
						attrname={"slidesToShow"} attrval={attributes.slidesToShow} 
						min={1} max={20} step={1} setAttributes={setAttributes} />

					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:200}}>
						
						<CustomSlider title={"Slides to Scroll"} 
						attrname={"slidesToScroll"} attrval={attributes.slidesToScroll} 
						min={1} max={20} step={1} setAttributes={setAttributes} />

					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:200}}>
						
						<CustomSlider title={"Speed"} 
						attrname={"speed"} attrval={attributes.speed} 
						min={100} max={5000} step={100} setAttributes={setAttributes} />

					</div>
					<div className="inline-block mt-1 mb-2 mx-3" style={{width:200}}>

						<CustomSlider title={"autoplaySpeed"} 
						attrname={"autoplaySpeed"} attrval={attributes.autoplaySpeed} 
						min={0} max={10000} step={100} setAttributes={setAttributes} />

					</div>
				</div>
				<h3 className="inline-block w-full text-center mb-0">Slides</h3>
				<wp.blockEditor.InnerBlocks template={BLOCKS_TEMPLATE_THEME}
				allowedBlocks={ALLOWED_BLOCKS_THEME} templateLock={false} renderAppender={()=><CustomBlockAppender />} />
			</div>
		);
    },
    save: props => {
		const {attributes} = props;
		let dataslickobject={
			dots: attributes.dots,
			infinite: attributes.infinite,
			speed: attributes.speed,
			fade: attributes.fade,
			cssEase: attributes.cssEase,
			slidesToShow:attributes.slidesToShow,
			slidesToScroll:attributes.slidesToScroll,
			autoplay: attributes.autoplay,
			autoplaySpeed: attributes.autoplaySpeed,
			pauseOnHover: attributes.pauseOnHover,
			centerMode: attributes.centerMode,
			adaptiveHeight: attributes.adaptiveHeight,
			variableWidth: attributes.variableWidth,
			arrows:attributes.arrows
		},
		dataslickstring=JSON.stringify(dataslickobject);
		return (
			<div data-slick={dataslickstring}
			className={"slick-block col-12 row no-gutters mx-auto px-0 "+(props.className ? props.className : '')}>
				<wp.blockEditor.InnerBlocks.Content />
			</div>
		);
    },
});