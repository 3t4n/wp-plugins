import { indigo } from '@material-ui/core/colors';
import React from 'react';
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
	title:string,attrname:string,attrval:any,width?:string,className?:string,style?:any,setAttributes:any
}> = props => {
	const {title,attrname,attrval,width="6",className="",style={},setAttributes=()=>{}} = props;
	let w = Math.round((parseInt(width)/12)*100)+'%'
	return (
			<div className={"col-12 col-lg-"+width+" px-1 text-center py-3 "+className} style={{width:'100%',flexBasis:w,maxWidth:w,paddingLeft:'0.25rem',paddingRight:'0.25rem',
			paddingTop:'0.75rem',paddingBottom:'0.75rem',textAlign:'center',...style}}>
					<div className="col-12 px-0" style={{width:'100%',display:'block'}}>
							<label className="col-12 px-0" style={{width:'100%',display:'block',textAlign:'center',
							color:'#000'}}>
									{title}
							</label>
					</div>
					<div className="col-12 px-0 mt-2 d-flex flex-wrap flex-row justify-content-center" style={{width:'100%',display:'flex',flexFlow:'row wrap',justifyContent:'center',
					marginTop:'0.5rem'}}> 
							<input type="checkbox" style={{color:indigo[500],display:'inline-block',
							width:20,height:20}} color="primary" 
							checked={attrval=='on' ? true : false} className="agenda-custom-checkbox d-inline-block px-0"
							onChange={()=>{setAttributes({[attrname]:attrval=='on' ? 'off' : 'on'});}} 
							{...{'aria-label':title}} />
					</div>
			</div>
	);
}
export default CustomToggle