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

const Grid = ({wide,attributes,setAttributes}) => {
    const {showSmQuery,showMdQuery,showLgQuery,showXlQuery,gridTemplateColumns,gridTemplateColumnsSm,
    gridTemplateColumnsMd,gridTemplateColumnsLg,gridTemplateColumnsXl,
    columnSpan,columnStart,columnEnd,rowSpan,rowStart,rowEnd,gridTemplateRows,
    gridTemplateRowsSm,gridTemplateRowsMd,gridTemplateRowsLg,
    gridTemplateRowsXl} = attributes
    return <div className={"grid-cols-"+(wide?'4':'2')+" auto-rows-min w-full text-center "+(wide?"grid":"block")}>
        <div className="inline-block align-top px-2 col-span-1"><CustomToggle width="12" title={"Show Sm media queries"} attrname={"showSmQuery"} attrval={showSmQuery} 
        setAttributes={setAttributes} /></div>
        <div className="inline-block align-top px-2 col-span-1"><CustomToggle width="12" title={"Show Md media queries"} attrname={"showMdQuery"} attrval={showMdQuery} 
        setAttributes={setAttributes} /></div>
        <div className="inline-block align-top px-2 col-span-1"><CustomToggle width="12" title={"Show Lg media queries"} attrname={"showLgQuery"} attrval={showLgQuery} 
        setAttributes={setAttributes} /></div>
        <div className="inline-block align-top px-2 col-span-1"><CustomToggle width="12" title={"Show Xl media queries"} attrname={"showXlQuery"} attrval={showXlQuery} 
        setAttributes={setAttributes} /></div>
        <div className="col-span-full w-full grid auto-rows-min w-full items-center pb-4 place-items-center" style={{gridTemplateColumns:wide?'repeat(auto-fit, minmax(200px,1fr))':'repeat(auto-fit, minmax(100px,1fr))'}}>
            <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Columns"} attrname={"gridTemplateColumns"} attrval={gridTemplateColumns} 
            min={-1} max={12} step={1} setAttributes={setAttributes} /></div>
            {showSmQuery && <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Columns (Sm)"} attrname={"gridTemplateColumnsSm"} attrval={gridTemplateColumnsSm} 
            min={-1} max={12} step={1} setAttributes={setAttributes} /></div>}
            {showMdQuery && <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Columns (Md)"} attrname={"gridTemplateColumnsMd"} attrval={gridTemplateColumnsMd} 
            min={-1} max={12} step={1} setAttributes={setAttributes} /></div>}
            {showLgQuery && <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Columns (Lg)"} attrname={"gridTemplateColumnsLg"} attrval={gridTemplateColumnsLg} 
            min={-1} max={12} step={1} setAttributes={setAttributes} /></div>}
            {showXlQuery && <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Columns (Xl)"} attrname={"gridTemplateColumnsXl"} attrval={gridTemplateColumnsXl} 
            min={-1} max={12} step={1} setAttributes={setAttributes} /></div>}
            <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Rows"} attrname={"gridTemplateRows"} attrval={gridTemplateRows} 
            min={-1} max={6} step={1} setAttributes={setAttributes} /></div>
            {showSmQuery && <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Rows (Sm)"} attrname={"gridTemplateRowsSm"} attrval={gridTemplateRowsSm} 
            min={-1} max={6} step={1} setAttributes={setAttributes} /></div>}
            {showMdQuery && <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Rows (Md)"} attrname={"gridTemplateRowsMd"} attrval={gridTemplateRowsMd} 
            min={-1} max={6} step={1} setAttributes={setAttributes} /></div>}
            {showLgQuery && <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Rows (Lg)"} attrname={"gridTemplateRowsLg"} attrval={gridTemplateRowsLg} 
            min={-1} max={6} step={1} setAttributes={setAttributes} /></div>}
            {showXlQuery && <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Grid template Rows (Xl)"} attrname={"gridTemplateRowsXl"} attrval={gridTemplateRowsXl} 
            min={-1} max={6} step={1} setAttributes={setAttributes} /></div>}
            <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Column Span"+(columnSpan>12?' (Full)':'')} attrname={"columnSpan"} attrval={columnSpan} 
            min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
            <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Column Start"+(columnStart>12?' (Auto)':'')} attrname={"columnStart"} attrval={columnStart} 
            min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
            <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Column End"+(columnEnd>12?' (Auto)':'')} attrname={"columnEnd"} attrval={columnEnd} 
            min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
            <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Row Span"+(rowSpan>12?' (Full)':'')} attrname={"rowSpan"} attrval={rowSpan} 
            min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
            <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Row Start"+(rowStart>12?' (Auto)':'')} attrname={"rowStart"} attrval={rowStart} 
            min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
            <div className={"w-full inline-block align-top px-4 col-span-"+(wide?'1':'2')}><CustomSlider title={"Row End"+(rowEnd>12?' (Auto)':'')} attrname={"rowEnd"} attrval={rowEnd} 
            min={-1} max={13} step={1} setAttributes={setAttributes} /></div>
        </div>
    </div>
}
export default Grid