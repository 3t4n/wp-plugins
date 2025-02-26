import React from 'react';
import _ from 'lodash'

window.lodash = _.noConflict()
const wp = window.wp
const {Children,cloneElement} = wp.element


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


const CustomButtonGroup:React.FC<{title:string,children:any,width?:string,className?:any,style?:any}> = props => {
  const {title,children,width="12",className="",style={}} = props;
  let w = Math.round((parseInt(width)/12)*100)+'%'
	return (
			<div className={"col-12 col-lg-"+width+" px-1 py-3 "+className} 
			style={{display:'flex',flexFlow:'row wrap',alignItems:'center',width:'100%',flexBasis:w,maxWidth:w,...style}}>
					<label style={{flexBasis:'100%',width:'100%',display:'block',marginBottom:10}}>{title}</label>
					{children}
			</div>
	);
}
export const CustomButtonGroupButton = ({value,title,attrname,attrval,setAttributes,color="primary",disabled=false}) => {
	const buttontoggle = (value) => {
    setAttributes({[attrname]:value})
	};
	let disabledstr = disabled ? ' disabled' : '';
	let colorstr = disabled ? 'grey'+disabledstr : color;
	return <button disabled={disabled} onClick={()=>buttontoggle(value)} style={{width:'auto',flexBasis:'auto',marginLeft:5,marginRight:5,marginBottom:5,display:'block'}} 
	className={_.includes(attrval,value) ? 'btn btn-'+colorstr : 'btn btn-outline-'+colorstr}>{title}</button>
}
export default CustomButtonGroup