import React from 'react';
const wp = window.wp

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
const CustomImage:React.FC<{
	title:string,attrname:string,attrval:any,className?:any,bgimagesize?:string,setAttributes:any
}> = props => {
	const {title,attrname,attrval={},className="",bgimagesize="large",setAttributes=()=>{}} = props;
	return (
			<div className={"col-12 px-1 py-3 "+className} style={{width:'100%',paddingLeft:'0.25rem',paddingRight:'0.25rem',paddingTop:'0.75rem',paddingBottom:'0.75rem'}}>
					{attrval.length ? (
							<div className="col-12 p-0 border border-dark">
									<picture className="col-12 px-0">
											<img className="col-12 px-0" width={300} height={300} src={attrval[0]} loading="lazy" 
											style={{backgroundRepeat:'no-repeat',objectFit:'cover'}}/>
									</picture>
							</div>
					) : null}
					<p className="col-12 my-2" style={{width:'100%',marginTop:'0.5rem',marginBottom:'0.5rem',color:'#000'}}>{title}</p>
					<wp.blockEditor.MediaUploadCheck>
							<wp.blockEditor.MediaUpload
									allowedTypes={['image']}
									multiple={false}
									gallery={false}
									modalClass={'bg-light rounded border-0 shadow'}
									addToGallery={false}
									render={(open)=>{ 
											return (
												<div className='w-full grid rows-auto-min' style={{width:'100%',textAlign:'center',marginBottom:'1.5rem',gridTemplateColumns:'1fr 40px'}}>
														<button className="w-full block p-1 border border-dark" 
														color="secondary" onClick={open.open}>
																Select Media
														</button>
														<button color="secondary" 
														className="block w-full text-enter" 
														aria-label="remove choice" 
														onClick={(e)=>{setAttributes({[attrname]:''});}}>
																<svg width={30} height={30} 
																viewBox="0 0 16 16" className="bi bi-trash mx-auto" 
																fill="currentColor" xmlns="http://www.w3.org/2000/svg">
																		<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
																		<path fillRule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
																</svg>
														</button>
												</div>
											);
									}}
									onSelect={(val)=>{
											let tempval=[];
											if(val instanceof Array) tempval = val;
											else tempval.push(val);
											let attachment = wp.media.query({post__in:tempval});
											let mediapromise = attachment.more();
											mediapromise.done(function(){
													let apuslides=[],largeslides=[];
													if(attachment.props.attributes.post__in.length>0){
															attachment.props.attributes.post__in.forEach(function(el){
																	if(el.sizes.hasOwnProperty('large')) 
																			largeslides.push(el.sizes.large.url);
																	if(el.sizes.hasOwnProperty(bgimagesize)) 
																			apuslides.push(el.sizes[bgimagesize].url);
																	else apuslides.push(el.url);
															}); 
													}
													else apuslides=["#"];
													setAttributes({[attrname]:apuslides,bgimagearraylarge:largeslides});
											});
									}}
							/>
					</wp.blockEditor.MediaUploadCheck>
			</div>
	);
}
export default CustomImage