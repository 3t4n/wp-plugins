import _ from 'lodash'
import React from 'react'
window.lodash = _.noConflict()
import { Switch } from "@headlessui/react";


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

const CustomToggle:React.FC<{
	title:string,attrname:string,attrval:boolean,width?:string,className?:string,style?:any,setAttributes:any
}> = props => {
	const {title,attrname,attrval,width="6",className="",style={},setAttributes=()=>{}} = props;
	let w = Math.round((parseInt(width)/12)*100)+'%'
	return (
			<div className={"col-12 col-lg-"+width+" px-1 text-center py-3 text-sm "+className} style={{width:'100%',flexBasis:w,maxWidth:w,paddingLeft:'0.25rem',paddingRight:'0.25rem',
			paddingTop:'0.75rem',paddingBottom:'0.75rem',textAlign:'center',...style}}>
					<div className="col-12 px-0 mt-2 d-flex flex-wrap flex-row justify-content-center" style={{width:'100%',display:'flex',flexFlow:'row wrap',justifyContent:'center',
					marginTop:'0.5rem'}}> 
						<Switch.Group as="div" className="flex items-center space-x-4">
							<Switch.Label as="label" className="inline-block mr-2">{title}</Switch.Label>
							<Switch
								as="button"
								checked={attrval}
								onChange={()=>{setAttributes({[attrname]:!attrval});}}
								className={`${
								attrval ? "bg-teal-600" : "bg-gray-200"
								} relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:shadow-outline`}>
								{({ checked }) => (
								<span
									className={`${
									checked ? "translate-x-5" : "translate-x-0"
									} inline-block w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full`}
								/>
								)}
							</Switch>
						</Switch.Group>
					</div>
			</div>
	);
}
export default CustomToggle