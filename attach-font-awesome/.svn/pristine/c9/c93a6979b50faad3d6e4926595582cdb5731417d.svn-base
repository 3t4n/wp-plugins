var cdnContainerObj , loadCdnTypeObj, loadLocalTypeObj;
function triggerEvent(el, type){
   if ('createEvent' in document) {
        // modern browsers, IE9+
        var e = document.createEvent('HTMLEvents');
        e.initEvent(type, false, true);
        el.dispatchEvent(e);
    } else {
        // IE 8
        var e = document.createEventObject();
        e.eventType = type;
        el.fireEvent('on'+e.eventType, e);
    }
}
function atchfaLoadTypeHandler (e) {
	var type=e.target.value;
	if(e.target.checked && type == 'local') {
		cdnContainerObj.style.display='none'
	} else {
		cdnContainerObj.style.display='block'
	}
}
document.addEventListener( 'DOMContentLoaded', function () {
    cdnContainerObj = document.getElementById('atchfaCdnVersionContainter');
    loadCdnTypeObj = document.getElementById('atchfaLoadCdnType');
    loadLocalTypeObj = document.getElementById('atchfaLoadLocalType');
	loadCdnTypeObj.addEventListener('change',atchfaLoadTypeHandler,false);
	loadLocalTypeObj.addEventListener('change',atchfaLoadTypeHandler,false);
	triggerEvent(loadLocalTypeObj,'change');
}, false );