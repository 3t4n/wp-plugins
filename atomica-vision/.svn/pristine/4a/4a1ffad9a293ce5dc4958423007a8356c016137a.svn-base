let iframeSRC = "";

window.addEventListener('load', function () {
    let iframe = document.getElementById("atomica-vision-popup-frame"); 
    if(iframe){
        iframeSRC = iframe.getAttribute('preloadsrc');
    }
})
  
function showAtomicaVisionTryOn(){
    document.getElementById("atomica-vision-popup-overlay").style.visibility = "visible";
    document.getElementById("atomica-vision-popup-overlay").style.opacity = 1;
    document.getElementById("atomica-vision-popup-frame").src = iframeSRC;
  }

  function hideAomicaVisionTryOn(){
    document.getElementById("atomica-vision-popup-overlay").style.visibility = "hidden";
    document.getElementById("atomica-vision-popup-overlay").style.opacity = 0;
    document.getElementById("atomica-vision-popup-frame").src = "";
  }