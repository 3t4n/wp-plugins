/* eslint-disable no-undef */
/* eslint-disable indent */
import React from 'react'
import { CustomSelect, CustomToggle } from '../EditorComponents'

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

const Layout = ({wide,attributes,setAttributes}) => {
    const {container,mxauto,wfull,boxBorder,boxContent,display,float,zIndex,position} = attributes
    return <div className={"auto-rows-min w-full items-center pb-4 place-items-center "+(wide?'grid':'block')} style={{gridTemplateColumns:wide?'repeat(auto-fit, minmax(200px,1fr))':'repeat(auto-fit, minmax(100px,1fr))'}}>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"w-full"} attrname={"wfull"} attrval={wfull} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"Container"} attrname={"container"} attrval={container} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"mx-auto"} attrname={"mxauto"} attrval={mxauto} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"box-border"} attrname={"boxBorder"} attrval={boxBorder} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4"><CustomToggle width="12" title={"box-content"} attrname={"boxContent"} attrval={boxContent} 
        setAttributes={setAttributes} /></div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Display" attrval={display} attrname="display" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='block'>block</option>
                <option value='inline-block	'>inline-block</option>
                <option value='inline'>inline</option>
                <option value='flex'>flex</option>
                <option value='inline-flex'>inline-flex</option>
                <option value='table'>table</option>
                <option value='table-caption'>table-caption</option>
                <option value='table-cell'>table-cell</option>
                <option value='table-column'>table-column</option>
                <option value='table-column-group'>table-column-group</option>
                <option value='table-footer-group'>table-footer-group</option>
                <option value='table-header-group'>table-header-group</option>
                <option value='table-row-group'>table-row-group</option>
                <option value='table-row'>table-row</option>
                <option value='flow-root'>flow-root</option>
                <option value='grid'>grid</option>
                <option value='inline-grid'>inline-grid</option>
                <option value='contents'>contents</option>
                <option value='hidden'>hidden</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Float" attrval={float} attrname="float" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='float-left'>float-left</option>
                <option value='float-right'>float-right</option>
                <option value='float-none'>float-none</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Position" attrval={position} attrname="position" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='static'>static</option>
                <option value='fixed'>fixed</option>
                <option value='absolute'>absolute</option>
                <option value='relative'>relative</option>
                <option value='sticky'>sticky</option>
            </CustomSelect>
        </div>
        <div className="w-full inline-block align-top px-4 text-center">
            <CustomSelect title="Z-Index" attrval={zIndex} attrname="zIndex" setAttributes={setAttributes}>
                <option value=''>No class</option>
                <option value='z-0'>z-0</option>
                <option value='z-10'>z-10</option>
                <option value='z-20'>z-20</option>
                <option value='z-30'>z-30</option>
                <option value='z-40'>z-40</option>
                <option value='z-50'>z-50</option>
                <option value='z-auto'>z-auto</option>
            </CustomSelect>
        </div>
    </div>
}
export default Layout