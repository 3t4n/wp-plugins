/* eslint-disable no-undef */
/* eslint-disable indent */
import { indigo, pink } from '@material-ui/core/colors'
import _ from 'lodash'
import React from 'react'
// MATERIAL UI COMPONENTS
import { SketchPicker } from 'react-color'
import {
    CustomImage, CustomSelect, CustomSlider,
    CustomText, CustomToggle
} from '../editorcomponents'
window.lodash = _.noConflict()
const wp = window.wp
const { Panel, PanelBody, PanelRow } =  wp.components
const { InnerBlocks, InspectorControls  } = wp.blockEditor
const { Fragment } = wp.element

const iem = _.isEmpty

wp.blocks.registerBlockType( 'bootstrap/bsblock', {
    title: 'Grid Block (Legacy Bootstrap)',
    icon: {
        background: '#fff',
        foreground:'#455a64',
        src:<svg width={30} height={30} viewBox="0 0 16 16" className="bi bi-columns" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fillRule="evenodd" d="M15 2H1v12h14V2zM1 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H1z"/>
            <path fillRule="evenodd" d="M7.5 14V2h1v12h-1zm0-8H1V5h6.5v1zm7.5 5H8.5v-1H15v1z"/>
        </svg>
    },
    category: 'agendahelsinki',
    example:()=>null,
    supports:{
        defaultStylePicker:false,
        align: [ 'left', 'right', 'center', 'wide', 'full' ]
    },
    getEditWrapperProps:(attributes)=>{
        let w='100%',d='block'
        switch(attributes.grid){
            case 'col-12 col-lg-11':w='91.66%';break;
            case 'col-12 col-lg-10':w='83.33%';break;
            case 'col-12 col-lg-9':w='75%';break;
            case 'col-12 col-lg-8':w='66.66%';break;
            case 'col-12 col-lg-7':w='58.33%';break;
            case 'col-12 col-lg-6':w='50%';break;
            case 'col-12 col-lg-5':w='41.66%';break;
            case 'col-12 col-lg-4':w='33.33%';break;
            case 'col-12 col-lg-3':w='25%';break;
            case 'col-12 col-lg-2':w='16.66%';break;
            case 'col-12 col-lg-1':w='8.33%';break;
            case 'col-12 col-lg-0':w='0';break;
            default:w='100%';d='block';break;
        }
        switch(attributes.row){
            case 'on':d='flex';break;
            default:d='block';break;
        }
        let c = _.get(attributes,'className','')
        let editorcss = ' '+_.get(attributes,'editorcss','')
        if(_.includes(c,'d-flex')) d='flex'
		return {
            'data-align': null,
            className:attributes.className + ' ' + attributes.grid + editorcss,alignItems:'flex-start',
            style:{marginTop:10,marginBottom:10,display:d,flexFlow:'row wrap',width:'100%',flexBasis:w,maxWidth:w,border:'1px solid #212121'}
        }
	},
    attributes: {
        blockeditortitle: {type: 'string',default: ''},
        showel:{type:'string',default:'on'},
        row:{type:'string',default:'off'},
        templatelock:{type:'string',default:'off'},
        nogutters:{type:'string',default:'off'},
        gridnum:{type: 'integer',default:6},
        grid: {type: 'string',default: 'col-12'},
        tabletgrid: {type: 'string',default: ' '},
        container: {type: 'string',default: ' '},
        display: {type: 'string',default: ' '},
        displaydesktop: {type: 'string',default: ' '},
        cssgridcolumns: {type: 'string',default: ''},
        cssgridrows: {type: 'string',default: ''},
        bgclass: {type: 'string',default: ' '},
        textcolorclass: {type: 'string',default: ' '},
        bgsize: {type: 'string',default: 'cover'},
        alignment: {type: 'string',default: 'align-items-start'},
        horizalignment: {type: 'string',default: 'justify-content-start'},

        ordermobile:{type: 'integer',default:0},

		showtweaks:{type:'boolean',default:false},
        applypadding:{type:'string',default:'off'},
        applymargin:{type:'string',default:'off'},

        /* Mobile Padding */
        paddingmobiletop:{type: 'integer',default:0},
        paddingmobileright:{type: 'integer',default:-1},
        paddingmobilebottom:{type: 'integer',default:0},
        paddingmobileleft:{type: 'integer',default:-1},
        /* Desktop Padding */
        paddingdesktoptop: {type: 'integer',default:0},
        paddingdesktopright: {type: 'integer',default:-1},
        paddingdesktopbottom: {type: 'integer',default:0},
        paddingdesktopleft: {type: 'integer',default:-1},
        /* Margins */
        marginmobiletop:{type: 'integer',default:0},
        marginmobilebottom:{type: 'integer',default:0},
        margindesktoptop:{type: 'integer',default:0},
        margindesktopbottom:{type: 'integer',default:0},

        bgposy:{type: 'integer',default:50},
        bgposx:{type: 'integer',default:50},
        /* Colors and more sliders */
        bgcolor:{type:'string'},
        textcolor:{type:'string'},
        bordercolor:{type:'string'},
        bgcolorobj:{type:'object',default:{h:1,s:1,l:1,a:1}},
        textcolorobj:{type:'array',default:{h:0,s:0,l:0,a:1}},
        bordercolorobj:{type:'array',default:{h:0,s:0,l:0,a:1}},

        bgimage: {type: 'object'},
        bgimagearray: {type: 'array',default:[]},
        bgimagearraylarge: {type: 'array',default:[]},
        bgimagesize:{type:'string',default:'full'},
        minheight:{type:'integer'},
        borderwidth:{type:'integer',default:0},
        borderradius:{type:'integer',default:0},

        gridgap:{type:'string',default:''},
        gridrowgap:{type:'string',default:''},
        gridcolumngap:{type:'string',default:''},

        editorcss:{type:'string',default:'slidewidth'}
    },

    edit: function ( props ) {
        const {attributes,setAttributes} = props
        var toptitle=[<p key="legacytext" style={{color:'#455a64',paddingLeft:'1.25rem',paddingRight:'1.25rem',paddingBottom:'0.25rem',paddingTop:'0.25rem',fontWeight:300,margin:0}}>
            LEGACY
        </p>]
        var displayoutput=''

        if(props.attributes.container=='container-fluid') {
            toptitle.push(
                <p key="containerfluidtext" style={{color:indigo[500],paddingLeft:'1.25rem',paddingRight:'1.25rem',paddingBottom:'0.25rem',paddingTop:'0.25rem',fontWeight:300,margin:0}}>
                    Full Width Container
                </p>
            )
        }
        else if(props.attributes.container=='container mx-auto') { 
            toptitle.push(
                <p key="containertext" style={{color:indigo[500],paddingLeft:'1.25rem',paddingRight:'1.25rem',paddingBottom:'0.25rem',paddingTop:'0.25rem',fontWeight:300,margin:0}}>
                    Container
                </p>
            )
        }
        if(props.attributes.row=='on') { 
            toptitle.push(
                <p key="rowtext" style={{color:pink[500],paddingLeft:'1.25rem',paddingRight:'1.25rem',paddingBottom:'0.25rem',paddingTop:'0.25rem',fontWeight:300,margin:0}}>
                    Row
                </p>
            )
        }

		if(props.attributes.grid!=' ') {
            toptitle.push(
                <p key="columntext" style={{paddingLeft:'1.25rem',paddingRight:'1.25rem',paddingBottom:'0.25rem',paddingTop:'0.25rem',margin:0}}>
                    Column
                </p>
            )
		}
		
        if(props.attributes.display!=' ') {
            switch(props.attributes.display) {
                case 'd-block':displayoutput+='Display: Block';break;
                case 'd-flex':displayoutput+='Display: Flex';break;
                case 'd-inline':displayoutput+='Display: Inline';break;
                case 'd-inline-block':displayoutput+='Display: Inline Block';break;
                case 'd-table':displayoutput+='Display: Table';break;
                case 'd-table-cell':displayoutput+='Display: Table Cell';break;
                case 'd-table-row':displayoutput+='Display: Table Row';break;
                case 'd-inline-flex':displayoutput+='Display: Inline Flex';break;
                case 'd-grid':displayoutput+='Display: CSS Grid';break;
                case 'd-none':displayoutput+='Display: None';break;
                default:displayoutput+=' ';break;
            }
        }
        if(props.attributes.displaydesktop!=' ') {
			if(props.attributes.display!=' ') displayoutput+=' ';
            switch(props.attributes.displaydesktop) {
                case 'd-lg-block':displayoutput+='Display: Block (Desktop)';break;
                case 'd-lg-flex':displayoutput+='Display: Flex (Desktop)';break;
                case 'd-lg-inline':displayoutput+='Display: Inline (Desktop)';break;
                case 'd-lg-inline-block':displayoutput+='Display: Inline Block (Desktop)';break;
                case 'd-lg-table':displayoutput+='Display: Table (Desktop)';break;
                case 'd-lg-table-cell':displayoutput+='Display: Table Cell (Desktop)';break;
                case 'd-lg-table-row':displayoutput+='Display: Table Row (Desktop)';break;
                case 'd-lg-inline-flex':displayoutput+='Display: Inline Flex (Desktop)';break;
                case 'd-lg-grid':displayoutput+='Display: CSS Grid (Desktop)';break;
                case 'd-lg-none':displayoutput+='Display: None (Desktop)';break;
                default:displayoutput+=' ';break;
            }
		}

		if(props.attributes.display!=' '||props.attributes.displaydesktop!=' '){
			toptitle.push(
				<p key="displayoutput" style={{paddingLeft:'1.25rem',paddingRight:'1.25rem',paddingBottom:'0.75rem',paddingTop:'0.75rem',margin:0}}>
					{displayoutput}
				</p>
			)
		}
    
        //SIMPLE MODE TOGGLE
        toptitle.push(
            <div key="tweaktoggle" style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-end'}}>
                <button type="button" 
                color={attributes.showtweaks ? "secondary" : "inherit"}   
                style={{color:"#000",padding:0,
				flexBasis:40,width:40,
				height:40,verticalAlign:'middle',
				border:'1px solid rgb(119, 119, 119)',
				borderRadius:99999}} className="grid-block-toolbar-button" 
                onClick={()=>{setAttributes({showtweaks:!attributes.showtweaks});}}>
                    {attributes.showtweaks ? (
                    <svg width={20} height={20} viewBox="0 0 16 16" 
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" className="mx-auto" style={{marginLeft:'auto',marginRight:'auto'}}>
                        <path fillRule="evenodd" d="M3.204 11L8 5.519 12.796 11H3.204zm-.753-.659l4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z"/>
                    </svg>) : (
                    <svg width={20} height={20} viewBox="0 0 16 16" 
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" className="mx-auto" style={{marginLeft:'auto',marginRight:'auto'}}>
                        <path fillRule="evenodd" d="M3.204 5L8 10.481 12.796 5H3.204zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                    </svg>
                    )}
                </button>
			</div>
        )
        
        let rowprops = attributes.row=='on'||_.includes(attributes.className,'d-flex') ? {display:'flex',flexFlow:'row wrap'} : {}
        let gradientprops = _.includes(attributes.className,'darken-background') ? 'linear-gradient( 90deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3) ), ' : ''
        let topbarcolor = '#f7f7f7'
        if(props.attributes.container=='container-fluid') topbarcolor='#f7f3fb'
        else if(props.attributes.container=='container mx-auto') topbarcolor='#f7f7ff'
        if(attributes.row=='on'||_.includes(attributes.className,'d-flex')) topbarcolor='#f1e1e1'
		if(props.attributes.container!='container mx-auto'&&props.attributes.grid!=' ') topbarcolor='#f1f3ec'


        return (  
            <Fragment>
                <InspectorControls>
                    <Panel>
                        <PanelBody title='Grid Settings' icon={<svg width={20} height={20} 
                        viewBox="0 0 16 16" fill="currentColor" 
                        xmlns="http://www.w3.org/2000/svg">
                        <path fillRule="evenodd" d="M4 4H2v2h2V4zm1 7V9a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm5 5V9a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V4a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zM9 4H7v2h2V4zm5 0h-2v2h2V4zM4 9H2v2h2V9zm5 0H7v2h2V9zm5 0h-2v2h2V9zm-3-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V4zm1 4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-2z"/>
                        </svg>} initialOpen={false}>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomSelect title="Container Class" attrname="container" 
                                attrval={attributes.container} setAttributes={setAttributes}>
                                    <option value=' '>No container class</option>
                                    <option value='container mx-auto'>Container Width</option>
                                    <option value='container-fluid'>Full Width (fluid)</option>
                                </CustomSelect>
                            </div></PanelRow>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomToggle title={"Row"} attrname={"row"} attrval={attributes.row} 
                                setAttributes={setAttributes} />
                                <CustomToggle title={"No row gutters"} attrname={"nogutters"} 
                                attrval={attributes.nogutters} setAttributes={setAttributes} />
                            </div></PanelRow>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomSelect title="Desktop Column Width" 
                                attrname="grid" attrval={attributes.grid}
                                setAttributes={setAttributes}>
                                    <option value=' '>No grid class</option>
                                    <option value='col-12'>12/12 Column</option>
                                    <option value='col-12 col-lg-11'>11/12 Column</option>
                                    <option value='col-12 col-lg-10'>10/12 Column</option>
                                    <option value='col-12 col-lg-9'>9/12 Column</option>
                                    <option value='col-12 col-lg-8'>8/12 Column</option>
                                    <option value='col-12 col-lg-7'>7/12 Column</option>
                                    <option value='col-12 col-lg-6'>6/12 Column</option>
                                    <option value='col-12 col-lg-5'>5/12 Column</option>
                                    <option value='col-12 col-lg-4'>4/12 Column</option>
                                    <option value='col-12 col-lg-3'>3/12 Column</option>
                                    <option value='col-12 col-lg-2'>2/12 Column</option>
                                    <option value='col-12 col-lg-1'>1/12 Column</option>
                                    <option value='col-12 col-lg-0'>0/12 Column</option>
                                    <option value='col-12 col-lg-auto'>Automatic Width</option>
                                </CustomSelect>

                                <CustomSelect title="Tablet Column Width" attrname="tabletgrid" 
                                attrval={attributes.tabletgrid} setAttributes={setAttributes}>
                                    <option value=' '>No tablet column class</option>
                                    <option value='col-md-12'>12/12 Column</option>
                                    <option value='col-md-11'>11/12 Column</option>
                                    <option value='col-md-10'>10/12 Column</option>
                                    <option value='col-md-9'>9/12 Column</option>
                                    <option value='col-md-8'>8/12 Column</option>
                                    <option value='col-md-7'>7/12 Column</option>
                                    <option value='col-md-6'>6/12 Column</option>
                                    <option value='col-md-5'>5/12 Column</option>
                                    <option value='col-md-4'>4/12 Column</option>
                                    <option value='col-md-3'>3/12 Column</option>
                                    <option value='col-md-2'>2/12 Column</option>
                                    <option value='col-md-1'>1/12 Column</option>
                                    <option value='col-md-0'>0/12 Column</option>
                                    <option value='col-md-auto'>Automatic Width</option>
                                </CustomSelect>
                            </div></PanelRow>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomText title="CSS Grid rows" attrname="cssgridrows" attrval={attributes.cssgridrows} 
                                setAttributes={setAttributes} />
                                <CustomText title="CSS Grid columns" attrname="cssgridcolumns" attrval={attributes.cssgridcolumns} 
                                setAttributes={setAttributes} />
                                <CustomText width="12" title="CSS Grid Gap" attrname="gridgap" attrval={attributes.gridgap} 
                                setAttributes={setAttributes} />
                                <CustomText width="12" title="CSS Grid Row Gap" attrname="gridrowgap" attrval={attributes.gridrowgap} 
                                setAttributes={setAttributes} />
                                <CustomText width="12" title="CSS Grid Column Gap" attrname="gridcolumngap" attrval={attributes.gridcolumngap} 
                                setAttributes={setAttributes} />
                                <CustomText title="Järjestysluku mobiilissa" attrname="ordermobile" attrval={attributes.ordermobile} 
                                type="number" setAttributes={setAttributes} />
                            </div></PanelRow>
                       </PanelBody>
                    </Panel>
                    <Panel>
                        <PanelBody title='Alignment' icon={<svg width={20} height={20} 
                        viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>} initialOpen={false}>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomSelect title="Display class" attrname="display" 
                                attrval={attributes.display} setAttributes={setAttributes}>
                                    <option value=' '>No display class</option>
                                    <option value='d-block'>Block</option>
                                    <option value='d-flex'>Flex</option>
                                    <option value='d-inline'>Inline</option>
                                    <option value='d-inline-block'>Inline Block</option>
                                    <option value='d-table'>Table</option>
                                    <option value='d-table-cell'>Table Cell</option>
                                    <option value='d-table-row'>Table Row</option>
                                    <option value='d-inline-flex'>Inline Flex</option>
                                    <option value='d-grid'>Grid</option>
                                    <option value='d-none'>None</option>
                                </CustomSelect>
                            </div></PanelRow>

                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomSelect title="Display class (Desktop)" attrname="displaydesktop" 
                                attrval={attributes.displaydesktop} setAttributes={setAttributes}>
                                    <option value=' '>No display class</option>
                                    <option value='d-lg-block'>Block</option>
                                    <option value='d-lg-flex'>Flex</option>
                                    <option value='d-lg-inline'>Inline</option>
                                    <option value='d-lg-inline-block'>Inline Block</option>
                                    <option value='d-lg-flex'>Table</option>
                                    <option value='d-lg-table-cell'>Table Cell</option>
                                    <option value='d-lg-table-row'>Table Row</option>
                                    <option value='d-lg-inline-flex'>Inline Flex</option>
                                    <option value='d-lg-grid'>Grid</option>
                                    <option value='d-lg-none'>None</option>
                                </CustomSelect>
                            </div></PanelRow>

                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomSelect title="Vertical Alignment (for row/flexbox)" attrname="alignment" 
                                attrval={attributes.alignment} setAttributes={setAttributes}>
                                    <option value='align-items-start'>Top</option>
                                    <option value='align-items-center'>Middle</option>
                                    <option value='align-items-end'>Bottom</option>
                                    <option value='align-items-stretch'>Stretch</option>
                                </CustomSelect>
                                <CustomSelect title="Horizontal Alignment (for row/flexbox)" 
                                attrname="horizalignment" attrval={attributes.horizalignment}
                                setAttributes={setAttributes}>
                                    <option value='justify-content-start'>Left</option>
                                    <option value='justify-content-center'>Middle</option>
                                    <option value='justify-content-end'>Right</option>
                                    <option value='justify-content-between'>Justify (Between)</option>
                                </CustomSelect>
                            </div></PanelRow>
                        </PanelBody>
                    </Panel>
                    <Panel>
                        <PanelBody title='Spacing' icon={<svg width={20} height={20} viewBox="0 0 16 16" 
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fillRule="evenodd" d="M1.5 10.036a.5.5 0 0 1 .5.5v3.5h3.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5z"/>
                            <path fillRule="evenodd" d="M6.354 9.646a.5.5 0 0 1 0 .708l-4.5 4.5a.5.5 0 0 1-.708-.708l4.5-4.5a.5.5 0 0 1 .708 0zm8.5-8.5a.5.5 0 0 1 0 .708l-4.5 4.5a.5.5 0 0 1-.708-.708l4.5-4.5a.5.5 0 0 1 .708 0z"/>
                            <path fillRule="evenodd" d="M10.036 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 1 1-1 0V2h-3.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>} initialOpen={false}>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>

                                <CustomToggle title={"Apply Padding classes"} attrname={"applypadding"} 
                                attrval={attributes.applypadding} 
                                setAttributes={setAttributes} />
                                <CustomToggle title={"Apply Margin classes"} attrname={"applymargin"} 
                                attrval={attributes.applymargin} 
                                setAttributes={setAttributes} />

                                {(props.attributes.applypadding=='on' ?
                                    <div style={{width:'100%',paddingLeft:'0.25rem',paddingRight:'0.25rem',marginBottom:'1rem'}}>
                                        <p>Padding</p>

                                        <p>Mobile (and up)</p>

                                        <CustomSlider title={"Padding Top ↑"} attrname={"paddingmobiletop"} attrval={attributes.paddingmobiletop} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />
                                        <CustomSlider title={"Padding Bottom ↓"} attrname={"paddingmobilebottom"} attrval={attributes.paddingmobilebottom} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />
                                        <CustomSlider title={"Padding Right →"} attrname={"paddingmobileright"} attrval={attributes.paddingmobileright} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />
                                        <CustomSlider title={"Padding Left ←"} attrname={"paddingmobileleft"} attrval={attributes.paddingmobileleft} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />

                                        <hr style={{width:'100%'}} />

                                        <p>Desktop</p>

                                        <CustomSlider title={"Padding Top ↑ (Desktop)"} attrname={"paddingdesktoptop"} attrval={attributes.paddingdesktoptop} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />
                                        <CustomSlider title={"Padding Bottom ↓ (Desktop)"} attrname={"paddingdesktopbottom"} attrval={attributes.paddingdesktopbottom} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />
                                        <CustomSlider title={"Padding Right → (Desktop)"} attrname={"paddingdesktopright"} attrval={attributes.paddingdesktopright} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />
                                        <CustomSlider title={"Padding Left ← (Desktop)"} attrname={"paddingdesktopleft"} attrval={attributes.paddingdesktopleft} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />
                                    </div> : 
                                    null
                                )}

                                {(props.attributes.applymargin=='on' && props.attributes.applypadding=='on') ?
                                    <div style={{width:'100%',marginBottom:'1.5rem'}}></div> : null}

                                {props.attributes.applymargin=='on' ?
                                    <div>
                                        <p>Margin</p>

                                        <p>Mobile (and up)</p>

                                        <CustomSlider title={"Margin Top ↑"} attrname={"marginmobiletop"} attrval={attributes.marginmobiletop} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />
                                        <CustomSlider title={"Margin Bottom ↓"} attrname={"marginmobilebottom"} attrval={attributes.marginmobilebottom} 
                                        min={-1} max={20} step={1} setAttributes={setAttributes} />

                                        <hr style={{width:'100%'}} />

                                        <p>Desktop</p>

                                        <CustomSlider title={"Margin Top ↑ (Desktop)"} attrname={"margindesktoptop"} attrval={attributes.margindesktoptop} 
                                        min={-20} max={20} step={1} setAttributes={setAttributes} />
                                        <CustomSlider title={"Margin Bottom ↓ (Desktop)"} attrname={"margindesktopbottom"} attrval={attributes.margindesktopbottom} 
                                        min={-20} max={20} step={1} setAttributes={setAttributes} />
                                    </div> : null }
                            </div></PanelRow>
                        </PanelBody>
                    </Panel>
                    <Panel>
                        <PanelBody title='Border & Minimum Height' icon={
                        <svg width={20} height={20} viewBox="0 0 16 16" 
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fillRule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8zm6-1.5a.5.5 0 0 0 .5-.5V1.5a.5.5 0 0 0-1 0V6a.5.5 0 0 0 .5.5z"/>
                            <path fillRule="evenodd" d="M10.354 3.854a.5.5 0 0 0 0-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L8 2.207l1.646 1.647a.5.5 0 0 0 .708 0zM8 9.5a.5.5 0 0 1 .5.5v4.5a.5.5 0 0 1-1 0V10a.5.5 0 0 1 .5-.5z"/>
                            <path fillRule="evenodd" d="M10.354 12.146a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L8 13.793l1.646-1.647a.5.5 0 0 1 .708 0z"/>
                        </svg>} initialOpen={false}>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomSlider title={"Border Width"} attrname={"borderwidth"} attrval={attributes.borderwidth} 
                                min={0} max={50} step={1} setAttributes={setAttributes} />
                                <CustomSlider title={"Border Radius"} attrname={"borderradius"} attrval={attributes.borderradius} 
                                min={0} max={100} step={1} setAttributes={setAttributes} />
                                <CustomSlider title={"Min Height"} attrname={"minheight"} attrval={attributes.minheight} 
                                min={0} max={1000} step={1} setAttributes={setAttributes} />
                            </div></PanelRow>
                       </PanelBody>
                    </Panel>
                    <Panel>
                        <PanelBody title='Background Image' icon={
                        <svg width={20} height={20} viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fillRule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M10.648 7.646a.5.5 0 0 1 .577-.093L15.002 9.5V13h-14v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"/>
                            <path fillRule="evenodd" d="M4.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                        </svg>} initialOpen={false}>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomImage title='Background Image' attrname="bgimagearray" attrval={attributes.bgimagearray} 
                                setAttributes={setAttributes} />
                            </div></PanelRow>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomSelect title="Background Size" attrname="bgsize" 
                                attrval={attributes.bgsize} setAttributes={setAttributes}>
                                    <option value='cover'>Cover</option>
                                    <option value='contain'>Contain</option>
                                </CustomSelect>
                            </div></PanelRow>
                            <CustomSlider title={"Background Position (X axis)"} 
                            attrname={"bgposx"} attrval={attributes.bgposx} 
                            min={0} max={100} step={1} setAttributes={setAttributes} />
                            <CustomSlider title={"Background Position (Y axis)"} 
                            attrname={"bgposy"} attrval={attributes.bgposy} 
                            min={0} max={100} step={1} setAttributes={setAttributes} />
                            <CustomSelect title="Maximum image size" attrname="bgimagesize" 
                            attrval={attributes.bgimagesize} setAttributes={setAttributes}>
                                <option value='full'>Full</option>
                                <option value='large'>Large</option>
                                <option value='medium'>Medium</option>
                            </CustomSelect>
                        </PanelBody>
                    </Panel>
                    <Panel>
                        <PanelBody title='Color' icon={<svg width={20} height={20} 
                        viewBox="0 0 16 16" fill="currentColor" 
                        xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.213 1.018a.572.572 0 0 1 .756.05.57.57 0 0 1 .057.746C15.085 3.082 12.044 7.107 9.6 9.55c-.71.71-1.42 1.243-1.952 1.596-.508.339-1.167.234-1.599-.197-.416-.416-.53-1.047-.212-1.543.346-.542.887-1.273 1.642-1.977 2.521-2.35 6.476-5.44 7.734-6.411z"/>
                            <path d="M7 12a2 2 0 0 1-2 2c-1 0-2 0-3.5-.5s.5-1 1-1.5 1.395-2 2.5-2a2 2 0 0 1 2 2z"/>
                        </svg>} initialOpen={false}>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomSelect title="Background color class" attrname="bgclass" 
                                attrval={attributes.bgclass} setAttributes={setAttributes}>
                                    <option value=' '>No Background Class</option>
                                    <option value='site-bg-color1'>Site Color 1</option>
                                    <option value='site-bg-color2'>Site Color 2</option>
                                    <option value='site-bg-color3'>Site Color 3</option>
                                    <option value='site-bg-color4'>Site Color 4</option>
                                    <option value='site-bg-color5'>Site Color 5</option>
                                    <option value='site-bg-color6'>Site Color 6</option>
                                    <option value='site-bg-color7'>Site Color 7</option>
                                    <option value='bg-primary'>Bootstrap Primary</option>
                                    <option value='bg-secondary'>Bootstrap Secondary</option>
                                    <option value='bg-success'>Success</option>
                                    <option value='bg-danger'>Danger</option>
                                    <option value='bg-warning'>Warning</option>
                                    <option value='bg-info'>Info</option>
                                    <option value='bg-light'>Light</option>
                                    <option value='bg-dark'>Dark</option>
                                    <option value='bg-white'>White</option>
                                </CustomSelect>
                            </div></PanelRow>
                            
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <CustomSelect title="Background color class" attrname="textcolorclass" 
                                attrval={attributes.textcolorclass} setAttributes={setAttributes}>
                                    <option value=' '>No Background Class</option>
                                    <option value='site-text-color1'>Site Color 1</option>
                                    <option value='site-text-color2'>Site Color 2</option>
                                    <option value='site-text-color3'>Site Color 3</option>
                                    <option value='site-text-color4'>Site Color 4</option>
                                    <option value='site-text-color5'>Site Color 5</option>
                                    <option value='site-text-color6'>Site Color 6</option>
                                    <option value='site-text-color7'>Site Color 7</option>
                                    <option value='text-primary'>Bootstrap Primary</option>
                                    <option value='text-secondary'>Bootstrap Secondary</option>
                                    <option value='text-success'>Success</option>
                                    <option value='text-danger'>Danger</option>
                                    <option value='text-warning'>Warning</option>
                                    <option value='text-info'>Info</option>
                                    <option value='text-light'>Light</option>
                                    <option value='text-dark'>Dark</option>
                                    <option value='text-white'>White</option>
                                </CustomSelect>

                            </div></PanelRow>
                            <PanelRow style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}><div style={{flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start'}}>
                                <div style={{width:'100%',paddingLeft:'0.25rem',paddingRight:'0.25rem'}}>
                                    <p>Background Color</p>
                                    <button color="default" aria-label="remove choice" 
                                    onClick={()=>{setAttributes({bgcolorobj:{h:1,s:1,l:1,a:1},bgcolor:''});}}>
                                        <svg width={30} height={30} 
                                        viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fillRule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                    <SketchPicker color={attributes.bgcolorobj} style={{width:'100%',padding:'0.5rem'}} 
                                    onChangeComplete={( value ) => {
                                        let newcolor='rgba('+value.rgb.r+','+value.rgb.g+','+value.rgb.b+','+value.rgb.a+')';
                                        setAttributes({bgcolorobj:value.hsl,bgcolor:newcolor});}}
                                    />
                                    
                                </div>

                                <div style={{width:'100%',paddingLeft:'0.25rem',paddingRight:'0.25rem'}}>
                                    <p>Text Color</p>
                                    <button color="default" aria-label="remove choice" 
                                    onClick={()=>{setAttributes({textcolorobj:{h:0,s:0,l:0,a:1},textcolor:''});}}>
                                        <svg width={30} height={30} 
                                        viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fillRule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                    <SketchPicker color={ attributes.textcolorobj } style={{width:'100%'}} 
                                    onChangeComplete={( value ) => {
                                        let newcolor='rgba('+value.rgb.r+','+value.rgb.g+','+value.rgb.b+','+value.rgb.a+')';
                                        setAttributes({textcolorobj:value.hsl,textcolor:newcolor});}}
                                    />
                                </div>
                                <div style={{width:'100%',paddingLeft:'0.25rem',paddingRight:'0.25rem'}}>
                                    <p>Border Color</p>
                                    <button color="default" aria-label="remove choice" 
                                    onClick={()=>{setAttributes({bordercolorobj:{h:0,s:0,l:0,a:1},bordercolor:''});}}>
                                        <svg width={30} height={30} 
                                        viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fillRule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                    <SketchPicker color={ attributes.bordercolorobj }
                                    onChangeComplete={( value ) => {
                                        let newcolor='rgba('+value.rgb.r+','+value.rgb.g+','+value.rgb.b+','+value.rgb.a+')';
                                        setAttributes({bordercolorobj:value.hsl,bordercolor:newcolor});}}
                                    /> 
                                </div>
                            </div></PanelRow>
                        </PanelBody>
                    </Panel>
                </InspectorControls>
                <div className="grid-block-topbar" style={{width:'100%',paddingLeft:0,paddingRight:0}}>
                    <div style={{backgroundColor:topbarcolor,width:'100%',flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start',alignItems:'center',
                    paddingLeft:'1.5rem',paddingRight:'1.5rem',marginTop:0,paddingTop:'1.5rem',paddingBottom:'1rem',textAlign:'center',color:'#000',
                    borderBottom:'1px solid #212121'}}>
                        <svg width={20} height={20} viewBox="0 0 16 16" fill="#455a64" xmlns="http://www.w3.org/2000/svg" className="mx-auto" style={{marginLeft:'auto',marginRight:'auto'}}>
                            <path fillRule="evenodd" d="M15 2H1v12h14V2zM1 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H1z"/>
                            <path fillRule="evenodd" d="M7.5 14V2h1v12h-1zm0-8H1V5h6.5v1zm7.5 5H8.5v-1H15v1z"/>
                        </svg>
                        {toptitle}
                    </div>
					{ attributes.showtweaks ? (
                    <div style={{backgroundColor:props.attributes.showel=='off' ? '#f5d3d3' : topbarcolor,
                    flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'flex-start',paddingLeft:'1rem',paddingRight:'1rem',
                    paddingTop:'0.75rem',paddingBottom:'0.5rem',borderBottom:'1px solid #212121'}}>

                        <CustomSelect key="desktopcolumnselect" width="auto" style={{flexGrow:1,flexBasis:210,maxWidth:210,marginLeft:'auto',marginRight:'auto'}} 
                        title="Desktop Column Width" attrname="grid" attrval={attributes.grid} 
                        setAttributes={setAttributes}>
                            <option value=' '>No grid class</option>
                            <option value='col-12'>12/12 Column</option>
                            <option value='col-12 col-lg-11'>11/12 Column</option>
                            <option value='col-12 col-lg-10'>10/12 Column</option>
                            <option value='col-12 col-lg-9'>9/12 Column</option>
                            <option value='col-12 col-lg-8'>8/12 Column</option>
                            <option value='col-12 col-lg-7'>7/12 Column</option>
                            <option value='col-12 col-lg-6'>6/12 Column</option>
                            <option value='col-12 col-lg-5'>5/12 Column</option>
                            <option value='col-12 col-lg-4'>4/12 Column</option>
                            <option value='col-12 col-lg-3'>3/12 Column</option>
                            <option value='col-12 col-lg-2'>2/12 Column</option>
                            <option value='col-12 col-lg-1'>1/12 Column</option>
                            <option value='col-12 col-lg-0'>0/12 Column</option>
                            <option value='col-12 col-lg-auto'>Automatic Width</option>
                        </CustomSelect>

                        {props.attributes.tabletgrid!=' '&&attributes.showtweaks && <CustomSelect key="tabletgridselect" width="auto" style={{flexGrow:1,flexBasis:210,maxWidth:210,marginLeft:'auto',marginRight:'auto'}} 
                        title="Tablet Column Width" attrname="tabletgrid" attrval={attributes.tabletgrid}
                        setAttributes={setAttributes}>
                            <option value=' '>No tablet column class</option>
                            <option value='col-md-12'>12/12 Column</option>
                            <option value='col-md-11'>11/12 Column</option>
                            <option value='col-md-10'>10/12 Column</option>
                            <option value='col-md-9'>9/12 Column</option>
                            <option value='col-md-8'>8/12 Column</option>
                            <option value='col-md-7'>7/12 Column</option>
                            <option value='col-md-6'>6/12 Column</option>
                            <option value='col-md-5'>5/12 Column</option>
                            <option value='col-md-4'>4/12 Column</option>
                            <option value='col-md-3'>3/12 Column</option>
                            <option value='col-md-2'>2/12 Column</option>
                            <option value='col-md-1'>1/12 Column</option>
                            <option value='col-md-0'>0/12 Column</option>
                            <option value='col-md-auto'>Automatic Width</option>
                        </CustomSelect>}

                        {props.attributes.display=='d-grid'||props.attributes.displaydesktop=='d-lg-grid' && <div key="cssgridtext" style={{width:'100%',paddingLeft:'1.5rem',paddingRight:'1.5rem',marginBottom:'1.25rem'}}>
                        <div style={{display:'flex',flexFlow:'row wrap',width:'100%',maxWidth:'100%',flexBasis:'100%'}}>
                                <CustomText width="6" title="CSS Grid rows" attrname="cssgridrows" attrval={attributes.cssgridrows} 
                                setAttributes={setAttributes} />
                                <CustomText width="6" title="CSS Grid columns" attrname="cssgridcolumns" attrval={attributes.cssgridcolumns} 
                                setAttributes={setAttributes} />
                                <CustomText width="6" title="CSS Grid Gap" attrname="gridgap" attrval={attributes.gridgap} 
                                setAttributes={setAttributes} />
                                <CustomText width="6" title="CSS Grid Row Gap" attrname="gridrowgap" attrval={attributes.gridrowgap} 
                                setAttributes={setAttributes} />
                                <CustomText width="6" title="CSS Grid Column Gap" attrname="gridcolumngap" attrval={attributes.gridcolumngap} 
                                setAttributes={setAttributes} />
                            </div>
                        </div>}

                        <Fragment>
                            <div key="gridtitle" style={{width:'100%',flexShrink:1,flexBasis:160,maxWidth:160,paddingTop:'0.75rem',paddingBottom:'0.75rem'}}>
                                <div style={{display:'block',width:'100%',flexBasis:'100%',maxWidth:'100%'}}>
                                    <label style={{textAlign:'center',display:'block',width:'100%',color:'#000'}}>Container</label>
                                </div>
                                <div style={{width:'100%',marginTop:'0.5rem',
                                flexGrow:1,display:'flex',flexFlow:'row wrap',justifyContent:'center'}}>
                                    <input className="agenda-custom-checkbox" id="Container" 
                                    type="checkbox" color="primary" style={{color:indigo[500],width:20,height:20}} 
                                    checked={attributes.container=='container mx-auto' ? true : false} 
                                    onChange={()=>{setAttributes({container:attributes.container=='container mx-auto' ? ' ' : 'container mx-auto'});}} />
                                </div>
                            </div>
                            <CustomToggle key="headerrowtoggle" style={{flexShrink:1,flexBasis:160,maxWidth:160}} 
                            width="auto" title={"Row"} attrname={"row"} attrval={attributes.row} 
                            setAttributes={setAttributes} />
                            <CustomToggle key="headerguttertoggle" style={{flexShrink:1,flexBasis:160,maxWidth:160}} 
                            width="auto" title={"No row gutters"} attrname={"nogutters"} attrval={attributes.nogutters} 
                            setAttributes={setAttributes} />
                            <CustomToggle key="headerclassname" style={{flexShrink:1,flexBasis:160,maxWidth:160}} 
                            width="auto" title={"Show on page"} attrname={"showel"} attrval={attributes.showel} 
                            setAttributes={setAttributes} />
                            <CustomText style={{flexShrink:1,flexBasis:300,maxWidth:300}} 
                            title="Custom CSS Classes" attrname="className" attrval={attributes.className} 
                            setAttributes={setAttributes} />    
                        </Fragment>
					</div>
					) : null
					}
                </div>
                <div 
                className={ attributes.container + ' ' + 
                (attributes.nogutters=='on' ? 'no-gutters ' : '') +
                attributes.horizalignment + ' ' +
                attributes.alignment + ' ' +
                attributes.display + ' ' +
                attributes.displaydesktop + ' ' +
                attributes.bgclass + ' ' +
                attributes.textcolorclass + ' ' +
                (attributes.bgimage ? 'has-bg-image ' : '')+
                (attributes.ordermobile!=0 ? 'order-mobile-'+attributes.ordermobile+' ' : '')+
                ' rounded grid-block'}
                style={{
                    ...rowprops,width:'100%',flexBasis:'100%',
                    transition:'all 0.3s linear',
                    backgroundColor:
                    attributes.bgcolor,
                    color:attributes.textcolor,
                    minHeight:attributes.minheight,
                    backgroundImage: (attributes.bgimage ? `url(${attributes.bgimage.url})` : 
                        (attributes.bgimagearray.length ? gradientprops+`url(${attributes.bgimagearray[0]})` : null)),
                    backgroundRepeat:'no-repeat',
                    backgroundSize:attributes.bgsize,
                    backgroundPositionX:attributes.bgposx+'%',
                    backgroundPositionY:attributes.bgposy+'%',
                    borderColor:attributes.bordercolor,
                    borderWidth:attributes.borderwidth,
                    [attributes.borderwidth ? 'borderStyle' : null] : 
                        (attributes.borderwidth ? 'solid' : null),
                    [attributes.cssgridcolumns ? 'gridTemplateColumns' : null ] : 
                        (attributes.cssgridcolumns ? attributes.cssgridcolumns : null),
                    [attributes.cssgridrows.length ? 'gridTemplateRows' : null ] : 
                        (attributes.cssgridrows.length ? attributes.cssgridrows : null),
                    [attributes.showel=='off' ? 'height' : null] : 
                        (attributes.showel=='off' ? 0 : null),
                    [attributes.showel=='off' ? 'overflow' : null] : 
                        (attributes.showel=='off' ? 'hidden' : null),
                    [attributes.showel=='off' ? 'display' : null] : 
                        (attributes.showel=='off' ? 'none' : null),
                    borderRadius:attributes.borderradius
                }}>
                    <InnerBlocks 
                    templateLock={props.attributes.templatelock=='on' ? 'all' : false} 
                    renderAppender={()=>{
                        return <div style={{width:'100%',maxWidth:'100%',minHeight:100,padding:10}}><div style={{width:'100%',display:'flex',borderStyle:'dashed',borderWidth:1,
                        borderColor:'#8a8a8a',flexFlow:'row wrap',justifyContent:'center',padding:10,alignItems:'center',
                        backgroundColor:'rgba(230,230,230,0.5)'}}>
                            <InnerBlocks.ButtonBlockAppender />
                        </div></div>
                    }} />
                </div>
            </Fragment>)
    },

    save: function (props) {
        const {attributes} = props;
        var pt='',pr='',pb='',pl='',mt='',mb='';
        pt+= ' pt-'+attributes.paddingmobiletop;
        pt+= ' pt-lg-'+attributes.paddingdesktoptop; 
        pr+= ' pr-'+attributes.paddingmobileright;
        pr+= ' pr-lg-'+attributes.paddingdesktopright;
        pb+= ' pb-'+attributes.paddingmobilebottom;
        pb+= ' pb-lg-'+attributes.paddingdesktopbottom;
        pl+= ' pl-'+attributes.paddingmobileleft;
        pl+= ' pl-lg-'+attributes.paddingdesktopleft;
        mt+= (attributes.marginmobiletop >= 0) ? ' mt-'+attributes.marginmobiletop :  ' mt-n'+Math.abs(attributes.marginmobiletop);
        mt+= (attributes.margindesktoptop >= 0) ? ' mt-lg-'+attributes.margindesktoptop : ' mt-lg-n'+Math.abs(attributes.margindesktoptop);
        mb+= (attributes.marginmobilebottom >= 0) ? ' mb-'+attributes.marginmobilebottom :  ' mb-n'+Math.abs(attributes.marginmobilebottom);
        mb+= (attributes.margindesktopbottom >= 0) ? ' mb-lg-'+attributes.margindesktopbottom : ' mb-lg-n'+Math.abs(attributes.margindesktopbottom);
        let gradientprops = _.includes(attributes.className,'darken-background') ? 'linear-gradient( 90deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3) ), ' : ''

        return(
            <div 
            className={
            (attributes.container ? attributes.container+ ' ':'')+
            (attributes.row=='on' ? 'row ' : '') +
            (attributes.nogutters=='on' ? 'no-gutters ' : '') +
            (attributes.grid ? attributes.grid+' ':'')+
            (attributes.tabletgrid ? attributes.tabletgrid+' ':'')+
            (attributes.horizalignment ? attributes.horizalignment+' ':'')+
            (attributes.alignment ? attributes.alignment+' ':'')+
            (attributes.display ? attributes.display+' ':'')+
            (attributes.displaydesktop ? attributes.displaydesktop+' ':'')+
            (attributes.bgclass ? attributes.bgclass+' ':'')+
            (attributes.textcolorclass ? attributes.textcolorclass+' ':'')+
            pt+' '+pr+' '+pb+' '+pl+' '+mt+' '+mb+' '+
            (attributes.ordermobile!=0 ? 'order-mobile-'+attributes.ordermobile+' ' : '')+
            (props.className ? props.className : '')+
            (attributes.showel=='off' ? 'd-none d-sm-none d-md-none d-lg-none d-xl-none' : '')}
            style={{
            [attributes.bgcolor ? 'backgroundColor' : null]:
            (attributes.bgcolor ? attributes.bgcolor : null),
            [attributes.textcolor ? 'color' : null] : 
            (attributes.textcolor ? attributes.textcolor : null),
            [attributes.minheight ? 'minHeight': null] : 
            (attributes.minheight ? attributes.minheight : null),
            [attributes.bgimage||attributes.bgimagearray.length ? 'backgroundImage' : null] : 
                (attributes.bgimage ? gradientprops+`url(${attributes.bgimage.url})`+gradientprops : 
                (attributes.bgimagearray.length ? gradientprops+`url(${attributes.bgimagearray[0]})` : null)),
            backgroundRepeat:'no-repeat',
            backgroundSize:attributes.bgsize,
            backgroundPositionX:attributes.bgposx+'%',
            backgroundPositionY:attributes.bgposy+'%',
            [attributes.bordercolor ? 'borderColor' : null] : 
            (attributes.bordercolor ? attributes.bordercolor : null),
            [attributes.borderwidth ? 'borderWidth' : null] : 
            (attributes.borderwidth ? attributes.borderwidth : null),
            [attributes.borderwidth ? 'borderStyle' : null] : 
            (attributes.borderwidth ? 'solid' : null),
            [attributes.borderradius ? 'borderRadius' : null] : 
            (attributes.borderradius ? attributes.borderradius : null),
            [attributes.cssgridcolumns!='' ? 'gridTemplateColumns' : null ] : 
                (attributes.cssgridcolumns!='' ? attributes.cssgridcolumns : null),
            [attributes.cssgridrows!='' ? 'gridTemplateRows' : null ] : 
                (attributes.cssgridrows!='' ? attributes.cssgridrows : null),
            [attributes.showel=='off' ? 'height' : null] : 
                (attributes.showel=='off' ? 0 : null),
            [attributes.showel=='off' ? 'overflow' : null] : 
                (attributes.showel=='off' ? 'hidden' : null),
            [attributes.showel=='off' ? 'display' : null] : 
                (attributes.showel=='off' ? 'none' : null),
            [!iem(attributes.gridgap) ? 'gap' : null]:(!iem(attributes.gridgap) ? attributes.gridgap : null),
            [!iem(attributes.gridrowgap) ? 'rowGap' : null]:(!iem(attributes.gridrowgap) ? attributes.gridrowgap : null),
            [!iem(attributes.gridcolumngap) ? 'columnGap' : null]:(!iem(attributes.gridcolumngap) ? attributes.gridcolumngap : null)
            }}>
                <InnerBlocks.Content />
            </div>
        )
    }
} )