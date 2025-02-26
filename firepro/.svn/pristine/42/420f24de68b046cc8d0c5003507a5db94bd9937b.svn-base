// **********************************************************
// -- Ranged Input Hover Managment --------------------------
// **********************************************************
//<beginFold> rangedHoverState
FM.rangedHoverState = function(container, elementName, packageName, controlArr){
  if(container.classList.contains("FM_groupControls")){ return; }
  function delayRAF(){
    // Get HoverData Settings
    if(FM.hoverData[elementName] == undefined){ FM.hoverData[elementName] = {}; }
    if(FM.hoverData[elementName][packageName] == undefined){ FM.hoverData[elementName][packageName] = {}; }
    if(FM.hoverData[elementName][packageName].controlArrs == undefined){ FM.hoverData[elementName][packageName].controlArrs = []; }
    FM.addArrayIfUnique(FM.hoverData[elementName][packageName].controlArrs, controlArr);

    // Rebuild HoverData Structure to Match Controls
    for(var i=0; i<controlArr.length; i++){
      let hoverIndex = FM.hoverData[elementName][packageName];
      let tempControlArr = [];
      for(var x=0; x<i+1; x++){
        tempControlArr.push(controlArr[x]);
      }
      for(var x=0; x<tempControlArr.length; x++){
        let controlName = tempControlArr[x];
        if(x == tempControlArr.length-1){
          if(hoverIndex[controlName] == undefined){ hoverIndex[controlName] = {}; }
        }else{
          hoverIndex = hoverIndex[controlName];
        }
      }
    }

    // Get Hover Control Using controlArr Structure
    let hoverControl = FM.getHoverIndex(FM.hoverData[elementName][packageName], controlArr);

    // Populate HoverControl
    if(hoverControl.open == undefined){ hoverControl.open = false; }
    if(hoverControl.inuse == undefined){ hoverControl.inuse = false; }
    if(hoverControl.value == undefined){ hoverControl.value = 0; }
    if(hoverControl.duration == undefined){ hoverControl.duration = .3; }
    if(hoverControl.easing == undefined){ hoverControl.easing = "linear"; }
    let open = hoverControl.open;
    let inuse = hoverControl.inuse;
    let hoverValue = hoverControl.value;
    let durationValue = hoverControl.duration;
    let easingValue = hoverControl.easing;

    // Extract HTML Nodes From Container
    let hoverFullContainer = container.getElementsByClassName("FP_hoverStateContainer")[0];
    let hoverToggleButton = container.getElementsByClassName("--hoverToggle")[0];
    let hoverInputContainer = container.getElementsByClassName("--hoverInputContainer")[0];
    let durationInputContainer = container.getElementsByClassName("--durationInputContainer")[0];
    let easingInputContainer = container.getElementsByClassName("--easingInputContainer")[0];
    let expandedLabel = FM.expandLabel(container, open, inuse);

    // Set Proper Values On Hover Inputs
    let hoverInput = container.getElementsByClassName("--hoverInput")[0];
    let durationInput = durationInputContainer.getElementsByClassName("--durationInput")[0];
    let easingInput = easingInputContainer.getElementsByClassName("--easingInput")[0];
    hoverInput.setValue(hoverValue);
    durationInput.setValue(durationValue);
    easingInput.setValue(easingValue);

    // Build Parameters on inputs
    hoverInput.function = "updateHoverInfo";
    hoverInput.params = [elementName, packageName, controlArr, "value", "uiValue"];
    durationInput.function = "updateHoverInfo";
    durationInput.params = [elementName, packageName, controlArr, "duration", "uiValue"];
    FM.addOptionsAction(easingInput, "updateHoverInfo", [elementName, packageName, controlArr, "easing", "uiValue"]);


    // Determine if the hover state UI should be visable
    function toggleUI(){
      // Label
      FM.setClass(expandedLabel, "--active", open);
      FM.setClass(expandedLabel, "--inuse", inuse);
      // UI
      FM.setClass(hoverFullContainer, "--hide", !open);
      // FM.setClass(hoverInputContainer, "--hide", !inuse);
      // FM.setClass(durationInputContainer, "--hide", !inuse);
      // FM.setClass(easingInputContainer, "--hide", !inuse);
      if(inuse == true){
        FM.setClass(hoverToggleButton, "--active", true);
        // hoverToggleButton.innerHTML = FM.language["disableHover"];
      }else{
        FM.setClass(hoverToggleButton, "--active", false);
        // hoverToggleButton.innerHTML = FM.language["activateHover"];
      }
    }
    toggleUI();

    // Setup Hover Open Toggle
    expandedLabel.onclick = function(){
      open = !open;
      hoverControl.open = open;
      toggleUI();
    }

    // Setup Hover Inuse Toggle
    hoverToggleButton.onclick = function(){
      inuse = !inuse;
      hoverControl.inuse = inuse;
      toggleUI();
    }


  }
  window.requestAnimationFrame(delayRAF);
}
//</endFold>

//<beginFold> updateHoverInfo
FM.updateHoverInfo = function(hoverInfo){
  let elementName = hoverInfo[0];
  let packageName = hoverInfo[1];
  let controlArr = hoverInfo[2];
  let type = hoverInfo[3];
  let value = hoverInfo[4];

  let hoverControl = FM.getHoverIndex(FM.hoverData[elementName][packageName], controlArr);
  hoverControl[type] = value;
}
//</endFold>

// **********************************************************
// -- Hover Processing --------------------------------------
// **********************************************************
//<beginFold> processHoverAnimation
FM.processHoverAnimation = function(){
  let compositionPreview = FM.editorContainer.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
  // Mouse Events
  compositionPreview.onmouseover = function(event) { startHover(); };
  compositionPreview.onmouseout = function(event) { endHover(event, compositionPreview); };

  function startHover(){

    //<beginFold> processImage
    function processImage(){
      let animationControls = FM.compositionStorage.animations.colorCorrection.setup.image1.effects;
      let compositionData = FM.compositionData.image.effects;
      let hoverControls = FM.hoverData.image["onlyImage"];
      if(hoverControls == undefined){ return; }
      let controlArrs = FM.hoverData.image["onlyImage"].controlArrs;
      if(controlArrs == undefined){ return; }
      for(var i=0; i<controlArrs.length; i++){
        // Extract hover index Using Controls Array
        let controlArr = controlArrs[i];
        let hoverControl = FM.getHoverIndex(hoverControls, controlArr);
        if(hoverControl.inuse == false){ continue; }
        // Get Composition & Hover Values
        let defaultValue = FM.getHoverIndex(animationControls, controlArr);

        // Build Transition
        let transition;
        if(defaultValue.value != undefined){ // There is a transition object attached
          transition = defaultValue;
          transition.setEasing({timing: hoverControl.easing, duration: hoverControl.duration*1000});
          transition.setValue({value: defaultValue.value});
        }else{
          transition = FP.newTransition({value: defaultValue});
          transition.setEasing({timing: hoverControl.easing, duration: hoverControl.duration*1000});
        }
        // Apply Transition To Composition Controls
        FM.addTranistionToEffect(animationControls, transition, controlArr);
        delaySettingValues(transition, hoverControl.value);
      }
    }
    processImage();
    //</endFold>

    //<beginFold> processPackages
    function processPackages(){
      let elementsArr = ["colorCorrection", "effects"];
      for(var x=0; x<elementsArr.length; x++){
        let element = elementsArr[x];
        let animationControls = FM.compositionStorage.animations[element].setup.controls;
        let compositionData = FM.compositionData[element].controls;
        let packageName = FM.compositionData[element].package.package;
        if(packageName == null){ continue; }
        if(FM.hoverData[element] == undefined){ continue; }
        let hoverControls = FM.hoverData[element][packageName];
        if(hoverControls == undefined){ continue; }
        let controlArrs =FM.hoverData[element][packageName].controlArrs;
        if(controlArrs == undefined){ continue; }
        for(var i=0; i<controlArrs.length; i++){
          // Extract hover index Using Controls Array
          let controlArr = controlArrs[i];
          let hoverControl = FM.getHoverIndex(hoverControls, controlArr);
          if(hoverControl.inuse == false){ continue; }
          // Get Composition & Hover Values
          let defaultValue = FM.getHoverIndex(animationControls, controlArr);
          // Build Transition
          let transition;
          if(defaultValue.value != undefined){ // There is a transition object attached
            transition = defaultValue;
            transition.setEasing({timing: hoverControl.easing, duration: hoverControl.duration*1000});
            transition.setValue({value: defaultValue.value});
          }else{
            transition = FP.newTransition({value: defaultValue});
            transition.setEasing({timing: hoverControl.easing, duration: hoverControl.duration*1000});
          }
          // Apply Transition To Composition Controls
          FM.addTranistionToEffect(animationControls, transition, controlArr);
          delaySettingValues(transition, hoverControl.value);
        }
      }
    }
    processPackages();
    //</endFold>

    //<beginFold> processText
    function processText(){
      let animationControls = FM.compositionStorage.animations.text.controls;
      let compositionData = FM.compositionData.text;
      let hoverControls = FM.hoverData.text["3ImageText"];
      if(hoverControls == undefined){ return; }
      let controlArrs =FM.hoverData.text["3ImageText"].controlArrs;
      if(controlArrs == undefined){ return; }
      FM.updateText = true;
      for(var i=0; i<controlArrs.length; i++){
        // Extract hover index Using Controls Array
        let controlArr = controlArrs[i];
        let hoverControl = FM.getHoverIndex(hoverControls, controlArr);
        if(hoverControl.inuse == false){ continue; }
        // Get Composition & Hover Values
        let defaultValue = FM.getHoverIndex(animationControls, controlArr);

        // Build Transition
        let transition;
        if(defaultValue.value != undefined){ // There is a transition object attached
          transition = defaultValue;
          transition.setEasing({timing: hoverControl.easing, duration: hoverControl.duration*1000});
          transition.setValue({value: defaultValue.value});
          let newTransitionTime = hoverControl.duration*1000 + performance.now();
          if(newTransitionTime > FM.textTransitionTime){
            FM.textTransitionTime = newTransitionTime + 100;
          }
        }else{
          transition = FP.newTransition({value: defaultValue});
          transition.setEasing({timing: hoverControl.easing, duration: hoverControl.duration*1000});
          let newTransitionTime = hoverControl.duration*1000 + performance.now();
          if(newTransitionTime > FM.textTransitionTime){
            FM.textTransitionTime = newTransitionTime + 100;
          }
        }
        // Apply Transition To Composition Controls
        FM.addTranistionToEffect(animationControls, transition, controlArr);
        delaySettingValues(transition, hoverControl.value);
      }
    }
    processText();
    //</endFold>

  }

  function endHover(e, compositionPreview){

    //<beginFold> Prevent Mouseout On Absolute Child
    var e = event.toElement || event.relatedTarget;
    if(e == compositionPreview){ return; }
    let storeElement = e;
    for(var i=0; i<10; i++){
      if(storeElement == null){ break; }
      storeElement = storeElement.parentNode;
      if(storeElement == document.body){ break; }
      if(storeElement == compositionPreview){ return; }
    }
    //</endFold>

    //<beginFold> processImage
    function processImage(){
      let animationControls = FM.compositionStorage.animations.colorCorrection.setup.image1.effects;
      let compositionData = FM.compositionData.image.effects;
      let hoverControls = FM.hoverData.image["onlyImage"];
      let controlArrs =FM.hoverData.image["onlyImage"].controlArrs;
      if(controlArrs == undefined){ return; }
      for(var i=0; i<controlArrs.length; i++){
        let controlArr = controlArrs[i];
        let hoverControl = FM.getHoverIndex(hoverControls, controlArr);
        if(hoverControl.inuse == false){ continue; }
        let transition = FM.getHoverIndex(animationControls, controlArr);
        let defaultValue = FM.getHoverIndex(compositionData, controlArr);
        transition.setValue({value: defaultValue})
      }
    }
    processImage();
    //</endFold>

    //<beginFold> processPackages
    function processPackages(){
      let elementsArr = ["colorCorrection", "effects"];
      for(var x=0; x<elementsArr.length; x++){
        let element = elementsArr[x];
        let animationControls = FM.compositionStorage.animations[element].setup.controls;
        let compositionData = FM.compositionData[element].controls;
        let packageName = FM.compositionData[element].package.package;
        if(packageName == null){ continue; }
        if(FM.hoverData[element] == undefined){ continue; }
        let hoverControls = FM.hoverData[element][packageName];
        if(hoverControls == undefined){ continue; }
        let controlArrs =FM.hoverData[element][packageName].controlArrs;
        if(controlArrs == undefined){ continue; }
        for(var i=0; i<controlArrs.length; i++){
          let controlArr = controlArrs[i];
          let hoverControl = FM.getHoverIndex(hoverControls, controlArr);
          if(hoverControl.inuse == false){ continue; }
          let transition = FM.getHoverIndex(animationControls, controlArr);
          let defaultValue = FM.getHoverIndex(compositionData, controlArr);
          transition.setValue({value: defaultValue})
        }
      }
    }
    processPackages();
    //</endFold>

    //<beginFold> processText
    function processText(){
      let animationControls = FM.compositionStorage.animations.text.controls;
      let compositionData = FM.compositionData.text;
      let hoverControls = FM.hoverData.text["3ImageText"];
      if(hoverControls == undefined){ return; }
      let controlArrs =FM.hoverData.text["3ImageText"].controlArrs;
      if(controlArrs == undefined){ return; }
      FM.updateText = true;
      for(var i=0; i<controlArrs.length; i++){
        let controlArr = controlArrs[i];
        let hoverControl = FM.getHoverIndex(hoverControls, controlArr);
        if(hoverControl.inuse == false){ continue; }
        let transition = FM.getHoverIndex(animationControls, controlArr);
        let defaultValue = FM.getHoverIndex(compositionData, controlArr);
        transition.setValue({value: defaultValue});
        let newTransitionTime = hoverControl.duration*1000 + performance.now();
        if(newTransitionTime > FM.textTransitionTime){
          FM.textTransitionTime = newTransitionTime + 100;
        }
      }
    }
    processText();
    //</endFold>

  }

  //<beginFold> delaySettingValues
  function delaySettingValues(transition, value){
    function delayRAF(){
      transition.setValue({value: value});
    }
    window.requestAnimationFrame(delayRAF);
  }
  //</endFold>


}
//</endFold>
