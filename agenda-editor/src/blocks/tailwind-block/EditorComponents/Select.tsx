import _ from 'lodash'
window.lodash = _.noConflict()
import React from 'react';
import { Listbox } from '@headlessui/react'

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

const CheckmarkIcon = () => (<div className="inline-block" style={{width:20,height:20}}>
	<svg xmlns="http://www.w3.org/2000/svg" width={20} height={20} fill="currentColor" className="bi bi-check2" viewBox="0 0 16 16">
		<path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
	</svg>
</div>)

const ExpandIcon = ({open=false}) => (<div className={`inline-block ml-2 align-middle transition-transform transform-gpu ${open?'rotate-180':''}`} style={{width:20,height:20}}>
	<svg xmlns="http://www.w3.org/2000/svg" width={20} height={20} fill="currentColor" className="bi bi-check2" viewBox="0 0 16 16">
		{open?
			<path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/> :
			<path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
		}
	</svg>
</div>)

const CustomSelect:React.FC<{
	title:string,attrname:string,attrval:any,children:any,width?:string,className?:any,style?:any,setAttributes:any
}> = props => {
	const {title,attrname,attrval,children,width="12",className="",style={},setAttributes=()=>{}} = props;
	const mappedvalues = _.map(children,d=>({value:d.props.value,label:d.props.children}))
	let founditem = _.find(mappedvalues,m=>(m.value==attrval))
	let founditemstr=!_.isNil(founditem)&&_.has(founditem,'label')?founditem.label:attrval
	let w = Math.round((parseInt(width)/12)*100)+'%'
	return (
			<div className={"block w-full col-lg-"+width+" px-1 py-3 text-sm "+className} style={{width:'100%',flexBasis:w,maxWidth:w,...style}}>
					<label className="block w-full" 
					style={{color:'#000',width:'100%',flexBasis:'100%',maxWidth:'100%',display:'block',font:'inherit'}}>
						<span className="block w-full">{title}</span>
						<Listbox value={attrval} onChange={(v)=>{setAttributes({[attrname]:v})}}>
							<Listbox.Button as="div">
								{({ open }) => (
									<p className={`py-2 px-4 rounded shadow-sm mx-0 mb-0 mt-2 grid auto-rows-min gap-2 border border-dark items-center ${open ? 'bg-gray-100 text-black' : 'bg-white text-black'}`} 
									style={{gridTemplateColumns:'1fr 20px'}}>
										{founditemstr}
										<ExpandIcon open={open} />
									</p>
								)}
							</Listbox.Button>
							<Listbox.Options as="div" className="relative w-full">
								{(open) => (
									<div className={"bg-white text-black border border-black rounded-sm shadow py-1 px-1 outline-none absolute w-full transition-all transform-gpu z-1000 "+(open?'h-auto w-full overflow-y-visible opacity-100 scale-y-100':'h-0 overflow-hidden w-0 opacity-0 scale-y-0')} 
									style={{top:5,left:0}}>
										{_.map(children,d=>(
											<Listbox.Option key={d.props.value} value={d.props.value} disabled={false} as="div" className="outline-none">
												{({ active, selected }) => (
													<p className={`rounded-sm px-1 py-2 m-0 w-full flex flex-row flex-wrap items-center ${selected&&!active ? 'bg-teal-800 text-white' : ''} 
													${!selected&&active ? 'bg-teal-100 text-black' : ''} ${selected&&active ? 'bg-teal-700 text-white' : ''} ${!selected&&!active ? 'bg-white text-black' : ''} `}>
														<div className="inline-block flex-1">{d.props.children}</div>
														{selected && <CheckmarkIcon />}
													</p>
												)}
											</Listbox.Option>
										))}
									</div>
								)}
							</Listbox.Options>
						</Listbox>
					</label>
			</div>
	);
}
export default CustomSelect