/* eslint-disable no-undef */
/* eslint-disable indent */
import React from 'react'
import { CustomImage } from '../EditorComponents'

const wp = window.wp
const { ColorPicker } =  wp.components

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

const Backgrounds = ({wide,attributes,setAttributes}) => {
    let dbgcolor = {r:255,g:255,b:255,a:0}
    return <div className={"auto-rows-min w-full items-center pb-4 place-items-center "+(wide?'grid':'block')} style={{gridTemplateColumns:wide?'repeat(auto-fit, minmax(200px,1fr))':'repeat(auto-fit, minmax(100px,1fr))'}}>
        <div className={"w-full inline-block col-span-full"} style={{maxWidth:400,flexBasis:400,paddingLeft:'1.5rem',paddingRight:'2rem'}}>
            <div className="w-full flex flex-row flex-wrap">
                <span className="w-full block text-lg mb-5 tracking-normal font-medium">Taustaväri</span>
                <div className="inline-block flex-grow" style={{maxWidth:'calc(100% - 60px)',flexBasis:'calc(100% - 60px)'}}><ColorPicker 
                color={ attributes.backgroundColor }
                onChangeComplete={ ( value ) => setAttributes({backgroundColor:value.rgb}) }
                /></div>
                <button className="appearance-none text-center p-1 flex-shrink" style={{width:60,height:60,flexBasis:60}} 
                onClick={()=>{setAttributes({backgroundColor:dbgcolor})}}>
                    <svg width={30} height={30} viewBox="0 0 16 16" 
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg" className="mx-auto text-black" style={{marginLeft:'auto',marginRight:'auto'}}>
                        <path d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div className={"w-full inline-block col-span-full"} style={{maxWidth:400,flexBasis:400,paddingLeft:'2rem',paddingRight:'2rem'}}>
            <CustomImage title='Background Image' attrname="bgimagearray" attrval={attributes.bgimagearray} 
            setAttributes={setAttributes} />
        </div>
    </div>
}
export default Backgrounds