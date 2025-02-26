function fnSetTimer(image, src, counter, limit)
{	
    image.onload = null;
    if(counter < limit)
    {
        counter++;
        setTimeout(function(){ fnSetTimer(image, src, counter, limit); },20000);
        image.src= src+ '?\\'+new Date().getMilliseconds();  
		//document.getElementById('refreshCount').innerHTML = 'Last Refresh: '+new Date();
    }else{
		alert("Refreshing has reached its limit - reload the page if want to restart refreshing");
	}
} 
videojs.options.flash.swf = "video-js.swf";