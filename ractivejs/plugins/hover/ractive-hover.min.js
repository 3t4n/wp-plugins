const testDiv=typeof document!=='undefined'?document.createElement('div'):{};let hover;if(testDiv.onmouseenter!==undefined){hover=(node,fire)=>{function mouseenterHandler(original){fire({node,original,hover:true});}
function mouseleaveHandler(original){fire({node,original,hover:false});}
node.addEventListener('mouseenter',mouseenterHandler,false);node.addEventListener('mouseleave',mouseleaveHandler,false);return{teardown(){node.removeEventListener('mouseenter',mouseenterHandler,false);node.removeEventListener('mouseleave',mouseleaveHandler,false);}};};}
else{hover=(node,fire)=>{function mouseoverHandler(original){if(node.contains(original.relatedTarget))return;fire({node,original,hover:true});}
function mouseoutHandler(original){if(node.contains(original.relatedTarget))return;fire({node,original,hover:false});}
node.addEventListener('mouseover',mouseoverHandler,false);node.addEventListener('mouseout',mouseoutHandler,false);return{teardown(){node.removeEventListener('mouseover',mouseoverHandler,false);node.removeEventListener('mouseout',mouseoutHandler,false);}};};}
export default hover;
