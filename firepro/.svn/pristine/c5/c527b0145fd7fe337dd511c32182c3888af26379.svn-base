//<beginFold> rebuildThumbnails
FM.rebuildThumbnails = function(seed, attributes, setAttributes){
  return new Promise((resolve, reject) => {
    // Extract Composition Data
    let compositionData = JSON.parse(window.FireTrack[seed].compositionData);
    let slides = compositionData.slides;

    // Build Loading Container
    let loaderContainer = document.createElement("div");
    loaderContainer.classList.add("FP_loadScreen");
    loaderContainer.innerHTML = `<svg class="FP_loader" version="1.1" id="L4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
      <circle fill="#444" stroke="none" cx="6" cy="50" r="6">
        <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1"></animate>
      </circle>
      <circle fill="#444" stroke="none" cx="26" cy="50" r="6">
        <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.2"></animate>
      </circle>
      <circle fill="#444" stroke="none" cx="46" cy="50" r="6">
        <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.3"></animate>
      </circle>
    </svg>`;
    document.body.appendChild(loaderContainer);

    function buildSlideThumbnail( slideIndex ){
      FM.editorState = "composition";
      FM.setAttributes = setAttributes;
      FM.attributes = attributes;
      FM.blockIndex = slideIndex;
      let fullCompString = window.FireTrack[attributes.seed].compositionData;
      let fullCompData = JSON.parse(fullCompString);
      FM.fullCompData = fullCompData;
      FM.compositionData = fullCompData.slides[FM.blockIndex].blockData;
      FM.hoverData = fullCompData.slides[FM.blockIndex].hoverData;
      let rebuildDiv = document.createElement("div");
      rebuildDiv.classList.add("FM_rebuildDiv");
      FM.editorContainer = rebuildDiv;
      FM.editorContainer.appendChild(FM.createCompositionPreview());
      document.body.appendChild(rebuildDiv);
      function delayRAF(){
        FM.buildComposition().then(function(){
          FM.updateTextRAFLoop();
          FM.closeEditor();
          function delayAgain(){
            function delayMore(){
              if(slideIndex == slides.length -1){
                loaderContainer.parentNode.removeChild(loaderContainer);
                resolve();
              }else{
                slideIndex++;
                buildSlideThumbnail(slideIndex);
              }
            }
            window.requestAnimationFrame(delayMore);
          }
          window.requestAnimationFrame(delayAgain);
        });
      }
      window.requestAnimationFrame(delayRAF);
    }
    buildSlideThumbnail(0);


  }); // end return promise
}
//</endFold>
