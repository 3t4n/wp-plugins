/* eslint-disable no-undef */
/* eslint-disable indent */
import React from 'react'
import { CustomSlider, CustomText } from '../EditorComponents'
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
const wp = window.wp

const Spacing = ({wide,attributes,setAttributes}) => {
    const {spacing,pt,pr,pb,pl,mt,mr,mb,ml} = attributes
    return <div className={"auto-rows-min w-full items-center pb-4 place-items-center "+(wide?'grid':'block')} style={{gridTemplateColumns:wide?'repeat(auto-fit, minmax(200px,1fr))':'repeat(auto-fit, minmax(100px,1fr))'}}>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={'Padding Top'} attrname={"pt"} attrval={pt} 
        min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={'Padding Right'} attrname={"pr"} attrval={pr} 
        min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={'Padding Bottom'} attrname={"pb"} attrval={pb} 
        min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={'Padding Left'} attrname={"pl"} attrval={pl} 
        min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={'Margin Top'} attrname={"mt"} attrval={mt} 
        min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={'Margin Right'} attrname={"mr"} attrval={mr} 
        min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={'Margin Bottom'} attrname={"mb"} attrval={mb} 
        min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
        <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={'Margin Left'} attrname={"ml"} attrval={ml} 
        min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
        <div className="grid grid-cols-2 auto-rows-auto gap-2 w-full col-span-full">
            <code className="bg-transparent col-span-1 pb-3 w-full block text-center">
            <strong>m</strong>argin{", "}
            <strong>p</strong>adding<br/>
            <strong>t</strong>op{", "}
            <strong>r</strong>ight{", "}
            <strong>b</strong>ottom{", "}
            <strong>l</strong>eft<br/>
            <strong>x</strong>-axis{", "}
            <strong>y</strong>-axis<br/>
            1 Unit=0.25rem, Auto=<strong>auto</strong></code>
            <code className="bg-transparent col-span-1 pb-3 w-full block text-center">{"sm: small (>400px)"}<br/>
            {"md: medium (>768px)"}<br/>{"lg: Large (>1024px)"}<br/>{"xl: Extra large (>1280px)"}</code>
            <code className="bg-transparent col-span-2 w-full block text-center">{'{p|m}{axis/direction}-{1,2,...,20,auto}'}</code>
            <code className="bg-transparent col-span-2 w-full block text-center">Examples: px-10 (Horizontal padding, 2.5rem) <br/>lg:ml-4 (Left margin on large screen, 1rem) <br/>mx-auto (Auto-fill horizontal margin)</code>
            <div className="col-span-full block w-full">
                <CustomText title="" attrval={spacing} attrname="spacing" setAttributes={setAttributes} />
            </div>
        </div>
    </div>
}
export default Spacing