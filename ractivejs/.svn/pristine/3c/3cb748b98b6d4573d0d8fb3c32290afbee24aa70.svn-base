const DEFAULTS={duration:400,easing:'easeOut',opacity:0,x:-500,y:0};function addPx(num){if(num===0||typeof num==='string'){return num;}
return num+'px';}
export default function fly(t,params){params=t.processParams(params,DEFAULTS);const x=addPx(params.x);const y=addPx(params.y);const offscreen={transform:`translate(${x},${y})`,opacity:0};let target;if(t.isIntro){target=t.getStyle(['opacity','transform']);t.setStyle(offscreen);}else{target=offscreen;}
t.animateStyle(target,params).then(t.complete);}
