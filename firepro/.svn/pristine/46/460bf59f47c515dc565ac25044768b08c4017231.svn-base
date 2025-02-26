FM.buildImageControls = function(){
  FM.resetAnimationControls();

  //<beginFold> Set Image Controls as Active Component & Build Control Tabs
  let componentBar = FM.editorContainer.getElementsByClassName("FP_compComponentBar")[0];
  componentBar.getElementsByClassName("--image")[0].classList.add("--active");

  // Build Component Editor
  let controlContainers = FM.editorContainer.getElementsByClassName("controlContainer");
  controlContainers[0].classList.add("--available");
  controlContainers[0].classList.add("--active");
  controlContainers[0].onclick = function(){ showImage(); }
  controlContainers[0].getElementsByClassName("control")[0].innerHTML = FM.language['ImageTab1'];

  controlContainers[1].classList.add("--available");
  controlContainers[1].onclick = function(){ showCustomization(); }
  controlContainers[1].getElementsByClassName("control")[0].innerHTML = FM.language['ImageTab2'];

  controlContainers[2].classList.add("--available");
  controlContainers[2].onclick = function(){ showFit(); }
  controlContainers[2].getElementsByClassName("control")[0].innerHTML = FM.language['ImageTab3'];
  //</endFold>

  function showImage(){
    //<beginFold> Reset Control Containers
    controlContainers[0].classList.add("--active");
    controlContainers[1].classList.remove("--active");
    controlContainers[2].classList.remove("--active");
    //</endFold>

    //<beginFold> Build Media Frame
    if(FM.mediaFrame == null){
      FM.mediaFrame = wp.media({
        title: 'Select or Upload Media Of Your Chosen Persuasion',
        button: {
          text: 'Use this media'
        },
        multiple: false  // Set to true to allow multiple files to be selected
      });
    }
    //</endFold>

    //<beginFold> Setup Control Interface HTML
    let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
    controlInterface.innerHTML = "";

    let imageContainer = document.createElement("div");
    imageContainer.classList.add("FP_imgControl_imgContainer");
    imageContainer.classList.add("--hide");
    controlInterface.appendChild(imageContainer);

    let imagePreview = document.createElement("img");
    imagePreview.classList.add("FP_imgControl_imgPreview");
    imagePreview.src = FM.emptyImg;
    imagePreview.onclick = function(){
      FM.mediaFrame.open();
    }
    imageContainer.appendChild(imagePreview);

    let replaceButton = document.createElement("div");
    replaceButton.classList.add("FP_imgControl_button");
    replaceButton.classList.add("--hide");
    replaceButton.innerHTML = FM.language['ReplaceImage'];
    replaceButton.onclick = function(){
      FM.mediaFrame.open();
    }
    controlInterface.appendChild(replaceButton);

    let removeButton = document.createElement("div");
    removeButton.classList.add("FP_imgControl_button");
    removeButton.classList.add("--warning");
    removeButton.classList.add("--hide");
    removeButton.innerHTML = "X";
    removeButton.onclick = function(){
      imagePreview.src = FM.emptyImg;
      FM.compositionStorage.elements.image.src = FM.emptyImg;
      imageContainer.classList.add("--hide");
      removeButton.classList.add("--hide");
      replaceButton.classList.add("--hide");
      addButton.classList.remove("--hide");
      FM.updateComposition("image");
    }
    imageContainer.appendChild(removeButton);

    let addButton = document.createElement("div");
    addButton.classList.add("FP_imgControl_button");
    addButton.classList.add("--hide");
    addButton.innerHTML = FM.language['AddImage'];
    addButton.onclick = function(){
      FM.mediaFrame.open();
    }
    controlInterface.appendChild(addButton);
    //</endFold>

    //<beginFold> On Media Select
    FM.mediaState = "Main Image";
    FM.mediaFrame.on( 'select', function() {
      if(FM.mediaState != "Main Image"){ return; }
      // Get media attachment details from the frame state
      var attachment = FM.mediaFrame.state().get('selection').first().toJSON();
      // Update Component Interface HTML
      imagePreview.src = attachment.url;
      addButton.classList.add("--hide");
      imageContainer.classList.remove("--hide");
      removeButton.classList.remove("--hide");
      replaceButton.classList.remove("--hide");
      // Update Composition
      FM.compositionStorage.elements.image.src = attachment.url;
      FM.compositionData.image.source = attachment.url;
      FM.compositionData.image.id = attachment.id;
      FM.updateComposition("image");
    });
    //</endFold>

    //<beginFold> init Image State
    if(FM.compositionStorage.elements.image.src != FM.emptyImg && FM.compositionStorage.elements.image.src != null){
      imagePreview.src = FM.compositionStorage.elements.image.src;
      imageContainer.classList.remove("--hide");
      removeButton.classList.remove("--hide");
      replaceButton.classList.remove("--hide");
    }else{
      addButton.classList.remove("--hide");
    }
    //</endFold>
  }
  showImage();
  if(FM.elementState == "image"){ return; }
  FM.elementState = "image";

  function showCustomization(){
    //<beginFold> Reset Control Containers
    controlContainers[0].classList.remove("--active");
    controlContainers[1].classList.add("--active");
    controlContainers[2].classList.remove("--active");
    //</endFold>

    //<beginFold> Setup Control Interface HTML
    let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
    controlInterface.innerHTML = "";

    function blurSize(){
      let label = FM.label( FM.language["BlurSize"] );
      controlInterface.appendChild( label );
      let rangedInput = FM.buildRangedInput(-100, 100, FM.compositionData.image.effects.blur.value);
      FM.addRangedInputActions(rangedInput, "updateBlurSize", ['uiValue']);
      FM.rangedHoverState(rangedInput, "image", "onlyImage", ["blur", "value"]);
      controlInterface.appendChild( rangedInput );
    }
    blurSize();

    function blurType(){
      // let label = FM.label( FM.language["BlurType"] );
      // controlInterface.appendChild( label );
      let dropDown = FM.dropDown(FM.blurs, FM.compositionData.image.effects.blur.type);
      FM.addOptionsAction(dropDown, "updateBlurType", ['uiValue']);
      controlInterface.appendChild( dropDown );
    }
    blurType();

    function bloom(){
      let label = FM.label( FM.language["Bloom"] );
      controlInterface.appendChild( label );
      let rangedInput = FM.buildRangedInput(-100, 100, FM.compositionData.image.effects.bloom);
      FM.addRangedInputActions(rangedInput, "updateCC", ["bloom", "uiValue"]);
      FM.rangedHoverState(rangedInput, "image", "onlyImage", ["bloom"]);
      controlInterface.appendChild( rangedInput );
    }
    bloom();

    function brightness(){
      let label = FM.label( FM.language["Brightness"] );
      controlInterface.appendChild( label );
      let rangedInput = FM.buildRangedInput(-100, 100, FM.compositionData.image.effects.brightness);
      FM.addRangedInputActions(rangedInput, "updateCC", ["brightness", "uiValue"]);
      FM.rangedHoverState(rangedInput, "image", "onlyImage", ["brightness"]);
      controlInterface.appendChild( rangedInput );
    }
    brightness();

    function contrast(){
      let label = FM.label( FM.language["Contrast"] );
      controlInterface.appendChild( label );
      let rangedInput = FM.buildRangedInput(-100, 100, FM.compositionData.image.effects.contrast);
      FM.addRangedInputActions(rangedInput, "updateCC", ["contrast", "uiValue"]);
      FM.rangedHoverState(rangedInput, "image", "onlyImage", ["contrast"]);
      controlInterface.appendChild( rangedInput );
    }
    contrast();

    function hue(){
      let label = FM.label( FM.language["Hue"] );
      controlInterface.appendChild( label );
      let rangedInput = FM.buildRangedInput(0, 360, FM.compositionData.image.effects.hue);
      FM.addRangedInputActions(rangedInput, "updateCC", ["hue", "uiValue"]);
      FM.rangedHoverState(rangedInput, "image", "onlyImage", ["hue"]);
      controlInterface.appendChild( rangedInput );
    }
    hue();

    function saturation(){
      let label = FM.label( FM.language["Saturation"] );
      controlInterface.appendChild( label );
      let rangedInput = FM.buildRangedInput(-100, 100, FM.compositionData.image.effects.saturation);
      FM.addRangedInputActions(rangedInput, "updateCC", ["saturation", "uiValue"]);
      FM.rangedHoverState(rangedInput, "image", "onlyImage", ["saturation"]);
      controlInterface.appendChild( rangedInput );
    }
    saturation();
    //</endFold>
  }

  function showFit(){
    //<beginFold> Reset Control Containers
    controlContainers[0].classList.remove("--active");
    controlContainers[1].classList.remove("--active");
    controlContainers[2].classList.add("--active");
    //</endFold>

    //<beginFold> Setup Control Interface HTML
    let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
    controlInterface.innerHTML = "";
    let label = FM.label( FM.language["ImageFit"] );
    controlInterface.appendChild( label );
    let dropDown = FM.dropDown(["Cover", "Contain", "Fill"], FM.compositionData.image.fit);
    FM.addOptionsAction(dropDown, "updateFit", ['uiValue']);
    controlInterface.appendChild( dropDown );
    //</endFold>
  }

}


// ******************************
// -- CallBack Functions --------
// ******************************
//<beginFold> updateFit
FM.updateFit = function(fit){
  // Update Composition
  FM.compositionData.image.fit = fit[0];
  FM.updateComposition("image");
}
//</endFold>

//<beginFold> updateBlurSize
FM.updateBlurSize = function(blurSize){
  // Update Composition
  FM.compositionData.image.effects.blur.value = blurSize[0];
  FM.updateComposition("image");
}
//</endFold>

//<beginFold> updateBlurType
FM.updateBlurType = function(blurType){
  // Update Composition
  FM.compositionData.image.effects.blur.type = blurType[0];
  FM.updateComposition("image");
}
//</endFold>

//<beginFold> updateCC
FM.updateCC = function(CC){
  // Update Composition
  FM.compositionData.image.effects[CC[0]] = CC[1];
  FM.updateComposition("image");
}
//</endFold>
