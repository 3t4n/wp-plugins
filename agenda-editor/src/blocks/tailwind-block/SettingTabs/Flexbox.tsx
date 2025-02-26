/* eslint-disable no-undef */
/* eslint-disable indent */
import React from 'react'
import { CustomSlider, CustomToggle } from '../EditorComponents'

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

const FlexBox = ({wide,attributes,setAttributes}) => {
    const {flexGrow,flexShrink,flexBasis,flexBasisSm,flexBasisMd,flexBasisLg,flexBasisXl,
    flex,flexWrap,flexRow,flexColumn} = attributes
    return <div className={"auto-rows-min w-full items-center pb-4 place-items-center "+(wide?'grid':'block')} style={{gridTemplateColumns:wide?'repeat(auto-fit, minmax(200px,1fr))':'repeat(auto-fit, minmax(100px,1fr))'}}>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Flex Basis"} attrname={"flexBasis"} attrval={flexBasis} 
        min={-1} max={12} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Flex Basis (Sm)"} attrname={"flexBasisSm"} attrval={flexBasisSm} 
        min={-1} max={12} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Flex Basis (Md)"} attrname={"flexBasisMd"} attrval={flexBasisMd} 
        min={-1} max={12} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Flex Basis (Lg)"} attrname={"flexBasisLg"} attrval={flexBasisLg} 
        min={-1} max={12} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Flex Basis (Xl)"} attrname={"flexBasisXl"} attrval={flexBasisXl} 
        min={-1} max={12} step={1} setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"flex"} attrname={"flex"} attrval={flex} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"Flex Wrap"} attrname={"flexWrap"} attrval={flexWrap} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"Flex Row"} attrname={"flexRow"} attrval={flexRow} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"Flex Column"} attrname={"flexColumn"} attrval={flexColumn} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"Flex Grow"} attrname={"flexGrow"} attrval={flexGrow} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"Flex Shrink"} attrname={"flexShrink"} attrval={flexShrink} 
        setAttributes={setAttributes} /></div>
    </div>
}
export default FlexBox