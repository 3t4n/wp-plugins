import _ from 'lodash';
import React from 'react';
window.lodash = _.noConflict()
const wp = window.wp
const { useState } = wp.element;

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

const CustomSlider:React.FC<{
	title:string,attrname:string,attrval:any,min:any,max:any,step:any,className?:string,setAttributes:any
}> = (props:any) => {
	const {title,attrname,attrval,min,max,step,className="",setAttributes=()=>{}} = props;
	const [curval,setCurval] = useState(attrval);
	const sub = () => {setAttributes({[attrname]:curval})}
	return (
			<div className={"col-12 px-1 py-3 text-sm "+className} style={{width:'100%'}}>
				<p className="my-2" style={{color:'#000'}}>{title}</p>
				<form noValidate onSubmit={(e)=>{e.preventDefault();e.stopPropagation();sub()}} style={{marginBottom:'0.75rem',display:'flex',flexFlow:'row wrap'}}>
					<input type="range" className="form-range w-100" 
					color="primary" style={{flexBasis:'100%'}}
					value={curval}
					step={step}
					min={min}
					max={max}
					onChange={(e)=>{
							let val = parseInt(e.target.value)
							setCurval(parseInt(e.target.value))
					}} 
					/>
					<input 
					className="form-control d-block mt-1 col-12 px-2" 
					type="number" style={{display:'block',width:'100%',flex:1,paddingLeft:'0.5rem',paddingRight:'0.5rem',marginTop:'0.25rem'}} 
					value={curval} 
					onChange={(e)=>{
							let val=parseInt(e.target.value);
							if(val>max) val=max;
							if(val<min) val=min;
							val=Math.round(val);
							setCurval(val);
					}} />
					<button type="submit" className="appearance-none p-1 text-black" style={{color:"#000",padding:0,
					flexBasis:40,width:40,height:40,verticalAlign:'middle',textAlign:'center'}}>
						<svg width={20} height={20} viewBox="0 0 16 16" fill="currentColor" className="mx-auto">
							<path fillRule="evenodd" 
							d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
						</svg>
					</button>
				</form>
			</div>
	);
}
export default CustomSlider