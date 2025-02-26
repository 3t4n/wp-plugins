/* eslint-disable no-undef */
/* eslint-disable indent */
import React from 'react'
import { CustomSelect } from '../EditorComponents'
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

const Alignment = ({wide,attributes,setAttributes}) => {
    const {justify,justifyItems,justifySelf,alignContent,alignSelf,items,placeContent,placeItems,placeSelf} = attributes
    return <div className={"auto-rows-min w-full items-center pb-4 place-items-center "+(wide?'grid':'block')} style={{gridTemplateColumns:wide?'repeat(auto-fit, minmax(200px,1fr))':'repeat(auto-fit, minmax(100px,1fr))'}}>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Justify Content" attrval={justify} attrname="justify" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='justify-start'>Start</option>
                <option value='justify-end'>End</option>
                <option value='justify-center'>Center</option>
                <option value='justify-between'>Space-between</option>
                <option value='justify-around'>Space-around</option>
                <option value='justify-evenly'>Space-evenly</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Justify Items" attrval={justifyItems} attrname="justifyItems" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='justify-items-start'>Start</option>
                <option value='justify-items-end'>End</option>
                <option value='justify-items-center'>Center</option>
                <option value='justify-items-stretch'>Stretch</option>
                <option value='justify-items-auto'>Auto</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Justify Self" attrval={justifySelf} attrname="justifySelf" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='justify-self-start'>Start</option>
                <option value='justify-self-end'>End</option>
                <option value='justify-self-center'>Center</option>
                <option value='justify-self-stretch'>Stretch</option>
                <option value='justify-self-auto'>Auto</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Align Content" attrval={alignContent} attrname="alignContent" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='content-start'>Start</option>
                <option value='content-end'>End</option>
                <option value='content-center'>Center</option>
                <option value='content-between'>Space-between</option>
                <option value='content-around'>Space-around</option>
                <option value='content-evenly'>Space-evenly</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Align Items" attrval={items} attrname="items" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='items-start'>Start</option>
                <option value='items-end'>End</option>
                <option value='items-center'>Center</option>
                <option value='items-baseline'>Baseline</option>
                <option value='items-stretch'>Stretch</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Align Self" attrval={alignSelf} attrname="alignSelf" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='self-start'>Start</option>
                <option value='self-end'>End</option>
                <option value='self-center'>Center</option>
                <option value='self-stretch'>Stretch</option>
                <option value='self-auto'>Auto</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Place Content" attrval={placeContent} attrname="placeContent" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='place-content-start'>Start</option>
                <option value='place-content-end'>End</option>
                <option value='place-content-center'>Center</option>
                <option value='place-content-between'>Space-between</option>
                <option value='place-content-around'>Space-around</option>
                <option value='place-content-evenly'>Space-evenly</option>
                <option value='place-content-stretch'>Stretch</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Place Items" attrval={placeItems} attrname="placeItems" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='place-items-start'>Start</option>
                <option value='place-items-end'>End</option>
                <option value='place-items-center'>Center</option>
                <option value='place-items-stretch'>Stretch</option>
                <option value='place-items-auto'>Auto</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Place Self" attrval={placeSelf} attrname="placeSelf" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='place-self-start'>Start</option>
                <option value='place-self-end'>End</option>
                <option value='place-self-center'>Center</option>
                <option value='place-self-stretch'>Stretch</option>
                <option value='place-self-auto'>Auto</option>
            </CustomSelect>
        </div>
    </div>
}
export default Alignment