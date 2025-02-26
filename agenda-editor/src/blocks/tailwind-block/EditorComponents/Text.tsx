import React from 'react';
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


const CustomText:React.FC<{
	title:string,attrname:string,type?:string,attrval:any,width?:string,className?:string,style?:any,setAttributes:any
}> = props => {
	const {title,attrname,attrval,type="text",width="12",className="",style={},setAttributes=()=>{}} = props;
	const [tempval,setTempVal] = useState(attrval);
	let w = Math.round((parseInt(width)/12)*100)+'%'
	const sub = () => {setAttributes({[attrname]:tempval})}
	return (
			<div className={"col-12 col-lg-"+width+" px-1 py-3 text-sm "+className} style={{width:'100%',flexBasis:w,maxWidth:w,...style}}>
					<label className="col-12 px-0 mb-2" style={{marginBottom:'0.5rem',color:'#000'}}>{title}</label>
					<form noValidate onSubmit={(e)=>{e.preventDefault();e.stopPropagation();sub()}} style={{marginBottom:'0.75rem',display:'flex',flexFlow:'row wrap'}}>
							<input {...{'aria-label':title}} type={type} name="valinput" 
							className="agenda-custom-textinput form-control col-12 d-inline-block px-2" 
							style={{flex:1,display:'inline-block',width:'100%',paddingLeft:'0.5rem',paddingRight:'0.5rem'}}
							placeholder={title} 
							value={tempval} onChange={e=>{setTempVal(e.target.value)}} />
							<button type="submit" className="appearance-none p-1 text-black text-center" style={{color:"#000",padding:0,
							flexBasis:40,width:40,height:40,verticalAlign:'middle',textAlign:'center'}}>
								<svg width={20} height={20} viewBox="0 0 16 16" fill="currentColor" className="mx-auto" style={{marginLeft:'auto',marginRight:'auto'}}>
									<path fillRule="evenodd" 
									d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
								</svg>
							</button>
					</form>
			</div>
	);
}
export default CustomText