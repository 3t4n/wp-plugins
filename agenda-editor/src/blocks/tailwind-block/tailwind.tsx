/* eslint-disable no-undef */
/* eslint-disable indent */
import _ from 'lodash'
import React from 'react'
import { CustomSlider, CustomToggle } from './EditorComponents'
import { default as TabButton } from './EditorComponents/TabButton'
import { default as Alignment } from './SettingTabs/Alignment'
import { default as Backgrounds } from './SettingTabs/Backgrounds'
import { default as FlexBox } from './SettingTabs/Flexbox'
import { default as Grid } from './SettingTabs/Grid'
import { default as Layout } from './SettingTabs/Layout'
import { default as Spacing } from './SettingTabs/Spacing'
window.lodash = _.noConflict()
const wp = window.wp
const { InnerBlocks, InspectorControls  } = wp.blockEditor
const { Fragment } = wp.element
const { PanelBody, PanelRow } = wp.components;

declare global {
	interface Props {}
	interface Window {
			wp:any,
			lodash:any
	}
	interface Math {
		round:(x: number) => number
	}
}

const CustomBlockAppender = () => <div style={{width:'100%',maxWidth:'100%',minHeight:100,padding:10}}>
    <div style={{width:'100%',display:'flex',borderStyle:'dashed',borderWidth:1,
    borderColor:'#8a8a8a',flexFlow:'row wrap',justifyContent:'center',padding:10,alignItems:'center',
    backgroundColor:'rgba(230,230,230,0.5)'}}>
        <InnerBlocks.ButtonBlockAppender />
    </div>
</div>

wp.blocks.registerBlockType( 'agendahelsinki/tailwindblock', {
    title: 'Grid Block (Tailwind)',
    icon: {
        background: '#fff',
        foreground:'#6071f3',
        src:<svg width={30} height={30} viewBox="0 0 16 16" className="bi bi-columns text-teal-700" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
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
        switch(attributes.flexBasisLg){
            case 11:w='91.66%';break;
            case 10:w='83.33%';break;
            case 9:w='75%';break;
            case 8:w='66.66%';break;
            case 7:w='58.33%';break;
            case 6:w='50%';break;
            case 5:w='41.66%';break;
            case 4:w='33.33%';break;
            case 3:w='25%';break;
            case 2:w='16.66%';break;
            case 1:w='8.33%';break;
            case 0:w='0';break;
            default:w='100%';d='block';break;
        }
        d=attributes.flex?'flex':'block';
        let c = _.get(attributes,'className','')
        if(_.includes(c,'flex')) d='flex'
		return {
            'data-align': null,
            className:'tailwind-block ' + ' lg:flex-basis-' + attributes.flexBasisLg,alignItems:'flex-start',
            style:{marginTop:10,marginBottom:10,display:d,flexFlow:'row wrap',width:'100%',flexBasis:w,maxWidth:w,border:'1px solid #212121'}
        }
	},
    attributes: {
        flexBasis:{type:'integer',default:-1},
        flexBasisSm:{type:'integer',default:-1},
        flexBasisMd:{type:'integer',default:-1},
        flexBasisLg:{type:'integer',default:-1},
        flexBasisXl:{type:'integer',default:-1},
        gridTemplateColumns:{type:'integer',default:-1},
        gridTemplateColumnsSm:{type:'integer',default:-1},
        gridTemplateColumnsMd:{type:'integer',default:-1},
        gridTemplateColumnsLg:{type:'integer',default:-1},
        gridTemplateColumnsXl:{type:'integer',default:-1},
        gridTemplateRows:{type:'integer',default:-1},
        gridTemplateRowsSm:{type:'integer',default:-1},
        gridTemplateRowsMd:{type:'integer',default:-1},
        gridTemplateRowsLg:{type:'integer',default:-1},
        gridTemplateRowsXl:{type:'integer',default:-1},
        columnSpan:{type:'integer',default:-1},
        columnStart:{type:'integer',default:-1},
        columnEnd:{type:'integer',default:-1},
        rowSpan:{type:'integer',default:-1},
        rowStart:{type:'integer',default:-1},
        rowEnd:{type:'integer',default:-1},
        flex:{type:'boolean',default:false},
        flexWrap:{type:'boolean',default:false},
        flexRow:{type:'boolean',default:false},
        flexColumn:{type:'boolean',default:false},
        flexGrow:{type:'boolean',default:false},
        flexShrink:{type:'boolean',default:false},
        container:{type:'boolean',default:false},
        mxauto:{type:'boolean',default:false},
        myauto:{type:'boolean',default:false},
        wfull:{type:'boolean',default:false},
        boxBorder:{type:'boolean',default:false},
        boxContent:{type:'boolean',default:false},
        backgroundColor:{type:'object',default:{r:255,g:255,b:255,a:0}},
        backgroundImageId:{type:'integer',default:0},
        backgroundImageUrl:{type:'string',default:'#'},
        display:{type:'string',default:''},
        float:{type:'string',default:''},
        zIndex:{type:'string',default:''},
        position:{type:'string',default:''},
        justify:{type:'string',default:''},
        justifyItems:{type:'string',default:''},
        justifySelf:{type:'string',default:''},
        items:{type:'string',default:''},
        alignContent:{type:'string',default:''},
        alignSelf:{type:'string',default:''},
        placeContent:{type:'string',default:''},
        placeItems:{type:'string',default:''},
        placeSelf:{type:'string',default:''},
        spacing:{type:'string',default:''},
        pt:{type:'integer',default:-1},
        pr:{type:'integer',default:-1},
        pb:{type:'integer',default:-1},
        pl:{type:'integer',default:-1},
        pLg:{type:'integer',default:-1},
        ptLg:{type:'integer',default:-1},
        prLg:{type:'integer',default:-1},
        pbLg:{type:'integer',default:-1},
        plLg:{type:'integer',default:-1},
        mt:{type:'integer',default:-1},
        mr:{type:'integer',default:-1},
        mb:{type:'integer',default:-1},
        ml:{type:'integer',default:-1},
        mLg:{type:'integer',default:-1},
        mtLg:{type:'integer',default:-1},
        mrLg:{type:'integer',default:-1},
        mbLg:{type:'integer',default:-1},
        mlLg:{type:'integer',default:-1},

        bgimagearray: {type: 'array',default:[]},
        
        className:{type:'string',default:''},
        activeTab:{type:'integer',default:-1},
        showTweaks:{type:'boolean',default:false},
        showSmQuery:{type:'boolean',default:false},
        showMdQuery:{type:'boolean',default:false},
        showLgQuery:{type:'boolean',default:false},
        showXlQuery:{type:'boolean',default:false},
    },

    edit:({attributes,setAttributes,className})=>{
        const {showTweaks,backgroundColor} = attributes
        const setShowTweaks = (val) => setAttributes({showTweaks:val})
        let dbgcolor = {r:255,g:255,b:255,a:0}

        // BLOCK OPTIONS IN A BUTTON GRID + TABS
        const EditGrid = ({attributes,setAttributes,wide=false}) => {
            const {activeTab} = attributes
            const setActiveTab = (val) => setAttributes({activeTab:val})
            const settingtabs = ['LAYOUT','FLEXBOX','GRID','ALIGNMENT','SPACING','SIZING','TYPOGRAPHY',
            'BACKGROUNDS','BORDERS','EFFECTS','TABLES']
            return (
                <div className="block w-full tailwind-block-editgrid">
                    <div className={"auto-rows-min max-width-700 mx-auto mb-4 grid"} style={{gridTemplateColumns:wide?'repeat(auto-fit, minmax(150px,1fr))':'repeat(auto-fit, minmax(100px,1fr))'}}>
                        {_.map(settingtabs,(s,i)=>(<TabButton title={s} tabindex={i} activeTab={activeTab} setActiveTab={setActiveTab} />))}
                    </div>
                    <div className="block max-width-700 mx-auto">
                        {activeTab==0 && <Layout wide={wide} attributes={attributes} setAttributes={setAttributes} />}
                        {activeTab==1 && <FlexBox wide={wide} attributes={attributes} setAttributes={setAttributes} />}
                        {activeTab==2 && <Grid wide={wide} attributes={attributes} setAttributes={setAttributes} />}
                        {activeTab==3 && <Alignment wide={wide} attributes={attributes} setAttributes={setAttributes} />}
                        {activeTab==4 && <Spacing wide={wide} attributes={attributes} setAttributes={setAttributes} />}
                        {activeTab==7 && <Backgrounds wide={wide} attributes={attributes} setAttributes={setAttributes} />}
                    </div>
                </div>
            );
        }
        let title = '';
        if(attributes.container) title+=' Container';
        if(attributes.flex&&attributes.flexRow&&attributes.flexWrap) title+=' Row';
        if(!attributes.container&&!(attributes.flex&&attributes.flexRow&&attributes.flexWrap)&&attributes.flexBasisLg>-1) title+=' Column';
        else if(attributes.wfull&&!attributes.container&&!(attributes.flex&&attributes.flexRow&&attributes.flexWrap)&&attributes.flexBasisLg==-1&&attributes.flexBasis==12) title+=' Full Width Container';
        else title+=' Grid Block';
        let classes = (attributes.flexBasis>-1 ? ' flex-basis-'+attributes.flexBasis : '')+
        (attributes.flexBasisSm>-1 ? ' sm:flex-basis-'+attributes.flexBasisSm : '')+
        (attributes.flexBasisMd>-1 ? ' md:flex-basis-'+attributes.flexBasisMd : '')+
        (attributes.flexBasisLg>-1 ? ' lg:flex-basis-'+attributes.flexBasisLg : '')+
        (attributes.flexBasisXl>-1 ? ' xl:flex-basis-'+attributes.flexBasisXl : '')+
        (attributes.gridTemplateColumns>-1 ? ' grid-cols-'+attributes.gridTemplateColumns : '')+
        (attributes.gridTemplateColumnsSm>-1 ? ' sm:grid-cols-'+attributes.gridTemplateColumnsSm : '')+
        (attributes.gridTemplateColumnsMd>-1 ? ' md:grid-cols-'+attributes.gridTemplateColumnsMd : '')+
        (attributes.gridTemplateColumnsLg>-1 ? ' lg:grid-cols-'+attributes.gridTemplateColumnsLg : '')+
        (attributes.gridTemplateColumnsXl>-1 ? ' xl:grid-cols-'+attributes.gridTemplateColumnsXl : '')+
        (attributes.gridTemplateRows>-1 ? ' grid-cols-'+attributes.gridTemplateRows : '')+
        (attributes.gridTemplateRowsSm>-1 ? ' sm:grid-cols-'+attributes.gridTemplateRowsSm : '')+
        (attributes.gridTemplateRowsMd>-1 ? ' md:grid-cols-'+attributes.gridTemplateRowsMd : '')+
        (attributes.gridTemplateRowsLg>-1 ? ' lg:grid-cols-'+attributes.gridTemplateRowsLg : '')+
        (attributes.gridTemplateRowsXl>-1 ? ' xl:grid-cols-'+attributes.gridTemplateRowsXl : '')+
        (attributes.pt>-1 ? ' pt-'+attributes.pt : '')+
        (attributes.pr>-1 ? ' pr-'+attributes.pr : '')+
        (attributes.pb>-1 ? ' pb-'+attributes.pb : '')+
        (attributes.pl>-1 ? ' pl-'+attributes.pl : '')+
        (attributes.mt>-1 ? ' mt-'+attributes.mt : '')+
        (attributes.mr>-1 ? ' mr-'+attributes.mr : '')+
        (attributes.mb>-1 ? ' mb-'+attributes.mb : '')+
        (attributes.ml>-1 ? ' ml-'+attributes.ml : '')+
        (attributes.columnSpan>-1 ? (attributes.columnSpan>12?' col-span-full':' col-span-'+attributes.columnSpan) : '')+
        (attributes.columnStart>-1 ? (attributes.columnStart>12?' col-start-auto':' col-start-'+attributes.columnStart) : '')+
        (attributes.columnEnd>-1 ? (attributes.columnEnd>12?' col-end-auto':' col-end-'+attributes.columnEnd) : '')+
        (attributes.rowSpan>-1 ? (attributes.rowSpan>12?' row-span-full':' row-span-'+attributes.rowSpan) : '')+
        (attributes.rowStart>-1 ? (attributes.rowStart>12?' row-start-auto':' row-start-'+attributes.rowStart) : '')+
        (attributes.rowEnd>-1 ? (attributes.rowEnd>12?' row-end-auto':' row-end-'+attributes.rowEnd) : '')+
        (attributes.flex ? ' flex' : '')+
        (attributes.flexWrap ? ' flex-wrap' : '')+
        (attributes.flexRow ? ' flex-row' : '')+
        (attributes.flexColumn ? ' flex-column' : '')+
        (attributes.flexGrow ? ' flex-grow' : '')+
        (attributes.flexShrink ? ' flex-shrink' : '')+
        (attributes.container ? ' container' : '')+
        (attributes.mxauto ? ' mx-auto' : '')+
        (attributes.myauto ? ' my-auto' : '')+
        (attributes.wfull ? ' w-full' : '')+
        (attributes.boxBorder ? ' box-border' : '')+
        (attributes.boxContent ? ' box-content' : '')+
        (!_.isEmpty(attributes.display) ? ' '+attributes.display : '')+
        (!_.isEmpty(attributes.float) ? ' '+attributes.float : '')+
        (!_.isEmpty(attributes.position) ? ' '+attributes.position : '')+
        (!_.isEmpty(attributes.zIndex) ? ' '+attributes.zIndex : '')+
        (!_.isEmpty(attributes.justify) ? ' '+attributes.justify : '')+
        (!_.isEmpty(attributes.justifyItems) ? ' '+attributes.justifyItems : '')+
        (!_.isEmpty(attributes.justifySelf) ? ' '+attributes.justifySelf : '')+
        (!_.isEmpty(attributes.items) ? ' '+attributes.items : '')+
        (!_.isEmpty(attributes.alignContent) ? ' '+attributes.alignContent : '')+
        (!_.isEmpty(attributes.alignSelf) ? ' '+attributes.alignSelf : '')+
        (!_.isEmpty(attributes.placeContent) ? ' '+attributes.placeContent : '')+
        (!_.isEmpty(attributes.placeItems) ? ' '+attributes.placeItems : '')+
        (!_.isEmpty(attributes.placeSelf) ? ' '+attributes.placeSelf : '')+
        (!_.isEmpty(attributes.spacing) ? ' '+attributes.spacing : '')+
        ' '+className
        classes = classes.trim()
        let topbarcolor = 'bg-white'
        if(attributes.container) topbarcolor='bg-blue-50'
        if(attributes.flex&&attributes.flexRow&&attributes.flexWrap) topbarcolor='bg-teal-50'
        if(!attributes.container&&attributes.flexBasisLg>-1) topbarcolor='bg-green-50'
        else if(attributes.wfull&&!attributes.container&&!(attributes.flex&&attributes.flexRow&&attributes.flexWrap)&&attributes.flexBasisLg==-1&&attributes.flexBasis==12) topbarcolor='bg-purple-50';
        return <Fragment>
            <InspectorControls>
                <PanelBody title="Tailwind Classes" initialOpen={ true } className="px-0 tailwind-sidebar"><PanelRow>
                    <EditGrid attributes={attributes} setAttributes={setAttributes} />
                </PanelRow></PanelBody>
            </InspectorControls>
            <div className={"tailwind-block-topbar w-full flex flex-row items-center justify-start flex-wrap py-4 "+topbarcolor}>
                <svg width={30} height={30} viewBox="0 0 16 16" className="inline-block ml-4 mr-4 py-0 text-teal-700" style={{flexBasis:30}} fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fillRule="evenodd" d="M15 2H1v12h14V2zM1 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H1z"/>
                    <path fillRule="evenodd" d="M7.5 14V2h1v12h-1zm0-8H1V5h6.5v1zm7.5 5H8.5v-1H15v1z"/>
                </svg>
                <div className="inline-block font-sans text-sm pl-4 pr-4" style={{flexBasis:'auto'}}><p className="w-full block text-center m-0 text-sm text-gray-700">{title}</p></div>
                <div className="flex flex-row flex-wrap justify-end items-center flex-1 pr-5">
                    <button className="appearance-none text-base bg-gray-200 text-black p-2 border border-black rounded-full shadow text-center" 
                    onClick={()=>{setShowTweaks(!showTweaks)}} style={{width:40,height:40}} {...{'aria-label':'show tweaks'}}>
                        {showTweaks ? (
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
            </div>
            {showTweaks && <div className={"block w-full pb-4 px-4 "+topbarcolor}>
                <div className="block pt-2 pb-4 text-center">
                    <div className="inline-block align-top px-4 mt-1"><CustomToggle width="12" title={"w-full"} attrname={"wfull"} attrval={attributes.wfull} 
                    setAttributes={setAttributes} /></div>
                    <div className="inline-block align-top px-4 mt-1"><CustomToggle width="12" title={"Container"} attrname={"container"} attrval={attributes.container} 
                    setAttributes={setAttributes} /></div>
                    <div className="inline-block align-top px-4 mt-1"><CustomToggle width="12" title={"mx-auto"} attrname={"mxauto"} attrval={attributes.mxauto} 
                    setAttributes={setAttributes} /></div>
                    <div className="inline-block align-top px-4 mt-1"><CustomToggle width="12" title={"flex"} attrname={"flex"} attrval={attributes.flex} 
                    setAttributes={setAttributes} /></div>
                    <div className="inline-block align-top px-4 mt-1"><CustomToggle width="12" title={"Flex Wrap"} attrname={"flexWrap"} attrval={attributes.flexWrap} 
                    setAttributes={setAttributes} /></div>
                    <div className="inline-block align-top px-4 mt-1"><CustomToggle width="12" title={"Flex Row"} attrname={"flexRow"} attrval={attributes.flexRow} 
                    setAttributes={setAttributes} /></div>
                    <div className={"inline-block align-top px-4 mt-1 max-width-250"}><CustomSlider title={"Flex Basis (Lg)"} attrname={"flexBasisLg"} attrval={attributes.flexBasisLg} 
                    min={-1} max={12} step={1} setAttributes={setAttributes} /></div>
                </div>
                <code className="block w-full font-mono pt-2 pb-4 text-center">{classes}</code>
                <EditGrid attributes={attributes} setAttributes={setAttributes} wide />
            </div>}
            <div className={"w-full grid-block tailwind-block "+className} style={{
            backgroundRepeat:'no-repeat',backgroundSize:'cover',backgroundPosition:'center',
            [attributes.bgimagearray.length ? 'backgroundImage' : null] : 
                attributes.bgimagearray.length ? `url(${attributes.bgimagearray[0]})` : null,
            [!_.isNil(backgroundColor)&&!_.isEqual(backgroundColor,dbgcolor) ? 'backgroundColor' : null]:
                    (!_.isNil(backgroundColor)&&!_.isEqual(backgroundColor,dbgcolor) ? `rgba(${backgroundColor.r},${backgroundColor.g},${backgroundColor.b},${backgroundColor.a})` : null)
            }}>
                <InnerBlocks 
                templateLock={attributes.templatelock=='on' ? 'all' : false} 
                renderAppender={()=><CustomBlockAppender />} />
            </div>
        </Fragment>
    },
    save:({attributes})=>{
        const {className} = attributes
        let bgc = attributes.backgroundColor
        let dbgcolor = {r:255,g:255,b:255,a:0}
        return <div className={'grid-block tailwind-block'+
        (attributes.flexBasis>-1 ? ' flex-basis-'+attributes.flexBasis : '')+
        (attributes.flexBasisSm>-1 ? ' sm:flex-basis-'+attributes.flexBasisSm : '')+
        (attributes.flexBasisMd>-1 ? ' md:flex-basis-'+attributes.flexBasisMd : '')+
        (attributes.flexBasisLg>-1 ? ' lg:flex-basis-'+attributes.flexBasisLg : '')+
        (attributes.flexBasisXl>-1 ? ' xl:flex-basis-'+attributes.flexBasisXl : '')+
        (attributes.gridTemplateColumns>-1 ? ' grid-cols-'+attributes.gridTemplateColumns : '')+
        (attributes.gridTemplateColumnsSm>-1 ? ' sm:grid-cols-'+attributes.gridTemplateColumnsSm : '')+
        (attributes.gridTemplateColumnsMd>-1 ? ' md:grid-cols-'+attributes.gridTemplateColumnsMd : '')+
        (attributes.gridTemplateColumnsLg>-1 ? ' lg:grid-cols-'+attributes.gridTemplateColumnsLg : '')+
        (attributes.gridTemplateColumnsXl>-1 ? ' xl:grid-cols-'+attributes.gridTemplateColumnsXl : '')+
        (attributes.gridTemplateRows>-1 ? ' grid-cols-'+attributes.gridTemplateRows : '')+
        (attributes.gridTemplateRowsSm>-1 ? ' sm:grid-cols-'+attributes.gridTemplateRowsSm : '')+
        (attributes.gridTemplateRowsMd>-1 ? ' md:grid-cols-'+attributes.gridTemplateRowsMd : '')+
        (attributes.gridTemplateRowsLg>-1 ? ' lg:grid-cols-'+attributes.gridTemplateRowsLg : '')+
        (attributes.gridTemplateRowsXl>-1 ? ' xl:grid-cols-'+attributes.gridTemplateRowsXl : '')+
        (attributes.pt>-1 ? ' pt-'+attributes.pt : '')+
        (attributes.pr>-1 ? ' pr-'+attributes.pr : '')+
        (attributes.pb>-1 ? ' pb-'+attributes.pb : '')+
        (attributes.pl>-1 ? ' pl-'+attributes.pl : '')+
        (attributes.mt>-1 ? ' mt-'+attributes.mt : '')+
        (attributes.mr>-1 ? ' mr-'+attributes.mr : '')+
        (attributes.mb>-1 ? ' mb-'+attributes.mb : '')+
        (attributes.ml>-1 ? ' ml-'+attributes.ml : '')+
        (attributes.columnSpan>-1 ? (attributes.columnSpan>12?' col-span-full':' col-span-'+attributes.columnSpan) : '')+
        (attributes.columnStart>-1 ? (attributes.columnStart>12?' col-start-auto':' col-start-'+attributes.columnStart) : '')+
        (attributes.columnEnd>-1 ? (attributes.columnEnd>12?' col-end-auto':' col-end-'+attributes.columnEnd) : '')+
        (attributes.rowSpan>-1 ? (attributes.rowSpan>12?' row-span-full':' row-span-'+attributes.rowSpan) : '')+
        (attributes.rowStart>-1 ? (attributes.rowStart>12?' row-start-auto':' row-start-'+attributes.rowStart) : '')+
        (attributes.rowEnd>-1 ? (attributes.rowEnd>12?' row-end-auto':' row-end-'+attributes.rowEnd) : '')+
        (attributes.flex ? ' flex' : '')+
        (attributes.flexWrap ? ' flex-wrap' : '')+
        (attributes.flexRow ? ' flex-row' : '')+
        (attributes.flexColumn ? ' flex-column' : '')+
        (attributes.flexGrow ? ' flex-grow' : '')+
        (attributes.flexShrink ? ' flex-shrink' : '')+
        (attributes.container ? ' container' : '')+
        (attributes.mxauto ? ' mx-auto' : '')+
        (attributes.myauto ? ' my-auto' : '')+
        (attributes.wfull ? ' w-full' : '')+
        (attributes.boxBorder ? ' box-border' : '')+
        (attributes.boxContent ? ' box-content' : '')+
        (!_.isEmpty(attributes.display) ? ' '+attributes.display : '')+
        (!_.isEmpty(attributes.float) ? ' '+attributes.float : '')+
        (!_.isEmpty(attributes.position) ? ' '+attributes.position : '')+
        (!_.isEmpty(attributes.zIndex) ? ' '+attributes.zIndex : '')+
        (!_.isEmpty(attributes.justify) ? ' '+attributes.justify : '')+
        (!_.isEmpty(attributes.justifyItems) ? ' '+attributes.justifyItems : '')+
        (!_.isEmpty(attributes.justifySelf) ? ' '+attributes.justifySelf : '')+
        (!_.isEmpty(attributes.items) ? ' '+attributes.items : '')+
        (!_.isEmpty(attributes.alignContent) ? ' '+attributes.alignContent : '')+
        (!_.isEmpty(attributes.alignSelf) ? ' '+attributes.alignSelf : '')+
        (!_.isEmpty(attributes.placeContent) ? ' '+attributes.placeContent : '')+
        (!_.isEmpty(attributes.placeItems) ? ' '+attributes.placeItems : '')+
        (!_.isEmpty(attributes.placeSelf) ? ' '+attributes.placeSelf : '')+
        (!_.isEmpty(attributes.spacing) ? ' '+attributes.spacing : '')+
        ' '+(className?className:'')} style={{
            [attributes.bgimagearray.length ? 'backgroundImage' : null] : 
                attributes.bgimagearray.length ? `url(${attributes.bgimagearray[0]})` : null,
            [!_.isNil(bgc)&&!_.isEqual(bgc,dbgcolor) ? 'backgroundColor' : null]:
                (!_.isNil(bgc)&&!_.isEqual(bgc,dbgcolor) ? `rgba(${bgc.r},${bgc.g},${bgc.b},${bgc.a})` : null)
        }}>
            <InnerBlocks.Content />
        </div>
    }
} )