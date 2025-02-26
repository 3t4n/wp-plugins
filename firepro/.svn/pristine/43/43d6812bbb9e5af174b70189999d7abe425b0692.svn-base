FM.buildTransitionControls = function(){
  FM.resetAnimationControls();

  //<beginFold> Set Transition Controls as Active Component & Build Control Tabs
  // Build Component Editor
  let controlContainers = FM.editorContainer.getElementsByClassName("controlContainer");
  controlContainers[0].classList.add("--available");
  controlContainers[0].classList.add("--active");
  controlContainers[0].onclick = function(){ showPackages(); }
  controlContainers[0].getElementsByClassName("control")[0].innerHTML = FM.language['TransitionsTab1'];

  controlContainers[1].classList.add("--available");
  controlContainers[1].onclick = function(){ showControls(); }
  controlContainers[1].getElementsByClassName("control")[0].innerHTML = FM.language['TransitionsTab2'];

  controlContainers[2].classList.add("--available");
  controlContainers[2].onclick = function(){ showStyles(); }
  controlContainers[2].getElementsByClassName("control")[0].innerHTML = FM.language['TransitionsTab3'];
  //</endFold>

  function showPackages(){
    //<beginFold> Reset Control Containers
    controlContainers[0].classList.add("--active");
    controlContainers[1].classList.remove("--active");
    controlContainers[2].classList.remove("--active");
    //</endFold>

    //<beginFold> Init Control Interface HTML
    let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
    controlInterface.innerHTML = "";
    //</endFold>

    //<beginFold> loadAnimationData
    function loadAnimationData(){
      let apiLocation = "https://firepro.io/animations_api";
      let request = new XMLHttpRequest();
      request.open('GET', apiLocation);
      request.onload = function () {
        let animationData = JSON.parse(request.responseText);
        processAnimationData(animationData);
      }
      request.send();
    }
    loadAnimationData();
    //</endFold>

    //<beginFold> processAnimationData
    function processAnimationData(animationData){
      // Seperate Effect Animations
      let effectAnimations;
      for(var i=0; i<animationData.length; i++){
        if(animationData[i].categoryName == "Transitions"){
          effectAnimations = animationData[i].animations;
        }
      }
      // Add Thumbnails
      for(var i=0; i<effectAnimations.length; i++){
        let thumbnailLocation = "https://cdn.firepro.io/package-supports/";
        thumbnailLocation += effectAnimations[i].post_title + "/package-supports/package_thumbnail.jpg";
        effectAnimations[i].thumbnail = thumbnailLocation;
      }
      // Sanatize True/False
      for(var i=0; i<effectAnimations.length; i++){
        effectAnimations[i].pro = FM.parseBool(effectAnimations[i].pro);
      }
      // Add Null Package
      let nullAnimation = {};
      nullAnimation.ID = -1;
      nullAnimation.post_title = null;
      nullAnimation.pro = false;
      nullAnimation.thumbnail = null;
      effectAnimations.unshift(nullAnimation);
      // Build Packages On Page
      for(var i=0; i<effectAnimations.length; i++){
        displayPackage(effectAnimations[i]);
      }
    }
    //</endFold>

    //<beginFold> displayPackage
    function displayPackage(effectAnimation){
      // Entire Package Container
      let packageContainer = document.createElement("div");
      packageContainer.classList.add("FP_effectsPackage_Container");
      packageContainer.classList.add("FP_PackageIdentify_" + FM.makeStringAlphaNumeric(effectAnimation.post_title));
      packageContainer.onclick = function(){
        FM.updateActivePackage(effectAnimation.post_title);
      }
      if(effectAnimation.post_title == FM.transitionData.package.package){
        packageContainer.classList.add("--active");
      }
      // Acitve Package Indicator
      let activePackage = document.createElement("div");
      activePackage.classList.add("FP_effectsPackage_active");
      activePackage.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z" /></svg>';
      packageContainer.appendChild(activePackage);
      // Package Thumbnail Preview Container
      let packageThumbnail_Container = document.createElement("div");
      packageThumbnail_Container.classList.add("FP_effectsPackage_Thumbnail_Container");
      if(effectAnimation.thumbnail != null){
        packageThumbnail_Container.style.backgroundImage = 'url("'+effectAnimation.thumbnail+'")';
      }else{
        packageThumbnail_Container.classList.add("--checkered")
      }
      // Package Thumbnail Preview Container
      let packageName = document.createElement("div");
      packageName.classList.add("FP_effectsPackage_Name");
      if(effectAnimation.post_title != null){
        packageName.innerHTML = effectAnimation.post_title;
      }else{
        packageName.innerHTML = FM.language["noTransition"];
      }
      // Pro Alert
      if(effectAnimation.pro == true){
        let proAlert = document.createElement("div");
        proAlert.classList.add("FP_effectsPackage_Pro");
        proAlert.innerHTML = FM.language["proTransition"];
        packageThumbnail_Container.appendChild(proAlert);
      }
      // Append Containers
      packageContainer.appendChild(packageName);
      packageContainer.appendChild(packageThumbnail_Container);
      controlInterface.appendChild(packageContainer);
    }
    //</endFold>

    //<beginFold> updateActivePackage
    FM.updateActivePackage = function(packageName){
      if(FM.editingTransition == true){ return; }
      if(FM.transitionData.package.package == packageName){ return; }
      FM.editingTransition = true;
      let packageContainers = document.getElementsByClassName("FP_effectsPackage_Container");
      for(var i=0; i<packageContainers.length; i++){
        packageContainers[i].classList.remove("--active");
        if(packageContainers[i].classList.contains("FP_PackageIdentify_" + FM.makeStringAlphaNumeric(packageName))){
          packageContainers[i].classList.add("--active");
        }
      }
      loadPresets(packageName);
    }
    //</endFold>

    //<beginFold> loadPresets
    function loadPresets(packageName){
      // They don't want any effects
      if(packageName == null){
        updateComp(null);
        return;
      }
      // Test if package preset data has been loaded before
      if(FM.presetData[packageName] == undefined){
        // Promise CallBack Function
        let supportLocation = "https://cdn.firepro.io/package-supports/";
        supportLocation += packageName + "/package-supports/preset.json";
        let request = new XMLHttpRequest();
        request.open('GET', supportLocation);
        request.onload = function () {
          let presetData = JSON.parse(request.responseText);
          FM.presetData[packageName] = presetData;
          updateComp(packageName);
        }
        request.send();
      }else{
        updateComp(packageName);
      }

    }
    //</endFold>

    //<beginFold> updateComp
    function updateComp(packageName){
      FM.transitionData.package.package = packageName;
      // No Effects
      if(packageName == null){
        FM.updateCompositionTransition().then().catch(function(){
          FM.updateActivePackage(null);
        });
        return;
      }
      // Build Effects Package
      if(FM.presetData[packageName].activeStyle != undefined){
        FM.transitionData.package.style = FM.presetData[packageName].activeStyle;
      }else if(FM.presetData[packageName].styles[0].name != "styleBreak"){
        FM.presetData[packageName].activeStyle = FM.presetData[packageName].styles[0].name;
        FM.transitionData.package.style = FM.presetData[packageName].activeStyle;
      }else{
        FM.presetData[packageName].activeStyle = FM.presetData[packageName].styles[1].name;
        FM.transitionData.package.style = FM.presetData[packageName].activeStyle;
      }


      FM.transitionData.controls = FM.presetData[packageName].controls;
      FM.updateCompositionTransition().then().catch(function(){
        FM.updateActivePackage(null);
      });
    }
    //</endFold>

  }
  showPackages();
  if(FM.elementState == "transition"){ return; }
  FM.elementState = "transition";

  function showStyles(){
    //<beginFold> Reset Control Containers
    controlContainers[0].classList.remove("--active");
    controlContainers[1].classList.remove("--active");
    controlContainers[2].classList.add("--active");
    //</endFold>

    //<beginFold> Setup Control Interface HTML
    let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
    controlInterface.innerHTML = "";
    //</endFold>

    //<beginFold> nullPackage
    let packageName = FM.transitionData.package.package;
    if(packageName == null || FM.presetData[packageName].styles.length <= 1){
      let noStyles = document.createElement("div");
      noStyles.classList.add("FM_noStyles");
      noStyles.innerHTML = FM.language["noStyles"];
      controlInterface.appendChild(noStyles);
      return;
    }
    //</endFold>

    //<beginFold> getStylesData
    let styles = FM.presetData[packageName].styles;
    let stylesContainer = document.createElement("div");
    stylesContainer.classList.add("FM_stylesContainer");
    for(var i=0; i<styles.length; i++){
      stylesContainer.appendChild( buildStyle(packageName, styles[i]) );
    }
    controlInterface.appendChild(stylesContainer);
    //</endFold>

    //<beginFold> buildStyle
    function buildStyle(packageName, style){
      // Build Style Container
      let styleContainer = document.createElement("div");
      styleContainer.classList.add("FM_styleContainer");
      styleContainer.classList.add("FM_style_"+FM.makeStringAlphaNumeric(style.name));

      // Style Break
      if(style.name == "styleBreak"){
        styleContainer.classList.add("FM_styleBreak");
        let styleBreakText = document.createElement("div");
        styleBreakText.classList.add("FM_styleBreakText");
        styleBreakText.innerHTML = style.thumbnail;
        styleContainer.appendChild(styleBreakText);
        return styleContainer;
      }

      // Change Style On Click
      styleContainer.onclick = function(){
        updateActiveStyle(packageName, style);
      }

      // Set Style Active if it is the current style
      let currentStyle = FM.transitionData.package.style;
      if(style.name == currentStyle){
        styleContainer.classList.add("--active");
      }

      // Build Normal Style
      let styleImage = document.createElement("img");
      styleImage.classList.add("FM_styleImage");
      styleImage.src = "https://cdn.firepro.io/package-supports/"+packageName+"/package-supports/"+style.thumbnail;

      // Acitve Package Indicator
      let activeStyle = document.createElement("div");
      activeStyle.classList.add("FM_style_active");
      activeStyle.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M9,20.42L2.79,14.21L5.62,11.38L9,14.77L18.88,4.88L21.71,7.71L9,20.42Z" /></svg>';
      styleContainer.appendChild(activeStyle);

      styleContainer.appendChild(styleImage);

      return styleContainer;
    }
    //</endFold>

    //<beginFold> updateActiveStyle
    function updateActiveStyle(packageName, style){
      // Update Global State
      if(FM.editingTransition == true){ return; }
      FM.editingTransition = true;
      // reset style containers
      let styleContainers = document.getElementsByClassName("FM_styleContainer");
      for(var i=0; i<styleContainers.length; i++){
        styleContainers[i].classList.remove("--active");
        if( styleContainers[i].classList.contains("FM_style_"+FM.makeStringAlphaNumeric(style.name)) ){
          styleContainers[i].classList.add("--active");
        }
      }
      // Update Composition
      FM.transitionData.package.style = style.name;
      FM.updateCompositionTransition().then().catch(function(){
        FM.updateActivePackage(null);
      });
    }
    //</endFold>
  }

  function showControls(){
    //<beginFold> Reset Control Containers
    controlContainers[0].classList.remove("--active");
    controlContainers[1].classList.add("--active");
    controlContainers[2].classList.remove("--active");
    //</endFold>

    //<beginFold> Setup Control Interface HTML
    let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
    controlInterface.innerHTML = "";
    //</endFold>

    //<beginFold> null package
    let packageName = FM.transitionData.package.package;
    if(packageName == null){
      let noStyles = document.createElement("div");
      noStyles.classList.add("FM_noStyles");
      noStyles.innerHTML = FM.language["noControls"];
      controlInterface.appendChild(noStyles);
      return;
    }
    //</endFold>

    //<beginFold> Wait For Package To Load
    function waitForControls(){
      if(FM.controlData[packageName] != undefined){
        if(FM.presetData[packageName] == undefined){
          // Promise CallBack Function
          let supportLocation = "https://cdn.firepro.io/package-supports/";
          supportLocation += packageName + "/package-supports/preset.json";
          let request = new XMLHttpRequest();
          request.open('GET', supportLocation);
          request.onload = function () {
            let presetData = JSON.parse(request.responseText);
            FM.presetData[packageName] = presetData;
            buildControls(FM.controlData[packageName]);
          }
          request.send();
        }else{
          buildControls(FM.controlData[packageName]);
        }
        return;
      }
      window.requestAnimationFrame(waitForControls);
    }
    waitForControls();
    //</endFold>

    //<beginFold> buildControls
    function buildControls(controlData){
      let controlValues = FM.presetData[packageName].controls;

      // Sort Into Control Groups
      let controlGroups = [];
      for(const control in controlData){
        let controlGroup = controlData[control].controlGroup;
        if(controlGroups.indexOf(controlGroup) == -1){
          controlGroups.push(controlGroup);
        }
      }

      // Build Control Groups
      let controlsContainer = document.createElement("div");
      for(var i=0; i<controlGroups.length; i++){
        // Build Control Group Container(s)
        let controlGroupContainer = FM.groupContainer(packageName, controlGroups[i]);
        let groupControls = document.createElement("div");
        groupControls.classList.add("FM_groupControls");
        controlGroupContainer.appendChild( groupControls );
        // Loop Through Each Control
        for(const controlName in controlData){
          let control = controlData[controlName];
          let controlGroup = control.controlGroup;
          if(controlGroup == controlGroups[i]){
            // console.log("control: ", control);
            // Build Parameter
            if(control.type == "parameter"){
              let label = FM.label( control.description );
              groupControls.appendChild( label );
              let rangedInput = FM.buildRangedInput(control.minValue, control.maxValue, FM.transitionData.controls[controlName].value, control.step);
              FM.addRangedInputActions(rangedInput, "updateTransitionControl", [controlName, 'uiValue']);
              FM.rangedHoverState(rangedInput, "transition", packageName, [controlName, "value"]);
              groupControls.appendChild( rangedInput );
            }
            if(control.type == "colorInput"){
              let label = FM.label( control.description );
              groupControls.appendChild( label );
              let colorPickerContainer = document.createElement("div");
              colorPickerContainer.classList.add("FM_colorPickterContainer");
              let colorPicker = document.createElement("div");
              colorPicker.classList.add("FM_colorPickter");
              colorPickerContainer.appendChild(colorPicker);
              FM.newColorPicker(colorPicker, control.color, "updateTransitionColor", [controlName, 'uiValue']);
              groupControls.appendChild( colorPickerContainer );
              // FM.rangedHoverState(colorPickerContainer, "transition", packageName, [controlName, "color"]);
            }
            if(control.type == "visualEffects"){
              // Blur Size
              let blurSizeLabel = FM.label( FM.language["BlurSize"] );
              groupControls.appendChild( blurSizeLabel );
              let rangedInput = FM.buildRangedInput(-100, 100, control.blur.value, 0);
              FM.addRangedInputActions(rangedInput, "updateTransitionVisualEffect", [controlName, 'blur', 'value', 'uiValue']);
              FM.rangedHoverState(rangedInput, "transition", packageName, [controlName, "blur", "value"]);
              groupControls.appendChild( rangedInput );
              // Blur Type
              let blurTypeLabel = FM.label( FM.language["BlurType"] );
              groupControls.appendChild( blurTypeLabel );
              let dropDown = FM.dropDown(FM.blurs, control.blur.type);
              FM.addOptionsAction(dropDown, "updateTransitionVisualEffect", [controlName, 'blur', 'type', 'uiValue']);
              groupControls.appendChild( dropDown );
              // Brightness
              let brightnessLabel = FM.label( FM.language["Brightness"] );
              groupControls.appendChild( brightnessLabel );
              let brightnessInput = FM.buildRangedInput(-100, 100, control.brightness, 0);
              FM.addRangedInputActions(brightnessInput, "updateTransitionVisualEffect", [controlName, 'brightness', null, 'uiValue']);
              FM.rangedHoverState(brightnessInput, "transition", packageName, [controlName, "brightness"]);
              groupControls.appendChild( brightnessInput );
              // Contrast
              let contrastLabel = FM.label( FM.language["Contrast"] );
              groupControls.appendChild( contrastLabel );
              let contrastInput = FM.buildRangedInput(-100, 100, control.contrast, 0);
              FM.addRangedInputActions(contrastInput, "updateTransitionVisualEffect", [controlName, 'contrast', null, 'uiValue']);
              FM.rangedHoverState(contrastInput, "transition", packageName, [controlName, "contrast"]);
              groupControls.appendChild( contrastInput );
              // Hue
              let hueLabel = FM.label( FM.language["Hue"] );
              groupControls.appendChild( hueLabel );
              let hueInput = FM.buildRangedInput(0, 360, control.hue, 0);
              FM.addRangedInputActions(hueInput, "updateTransitionVisualEffect", [controlName, 'hue', null, 'uiValue']);
              FM.rangedHoverState(hueInput, "transition", packageName, [controlName, "hue"]);
              groupControls.appendChild( hueInput );
              // Saturation
              let saturationLabel = FM.label( FM.language["Saturation"] );
              groupControls.appendChild( saturationLabel );
              let saturationInput = FM.buildRangedInput(-100, 100, control.saturation, 0);
              FM.addRangedInputActions(saturationInput, "updateTransitionVisualEffect", [controlName, 'saturation', null, 'uiValue']);
              FM.rangedHoverState(saturationInput, "transition", packageName, [controlName, "saturation"]);
              groupControls.appendChild( saturationInput );
            }
            if(control.type == "blurEffect"){
              // Blur Size
              let blurSizeLabel = FM.label( FM.language["BlurSize"] );
              groupControls.appendChild( blurSizeLabel );
              let rangedInput = FM.buildRangedInput(-100, 100, control.blur.value, 0);
              FM.addRangedInputActions(rangedInput, "updateTransitionVisualEffect", [controlName, 'blur', 'value', 'uiValue']);
              FM.rangedHoverState(rangedInput, "transition", packageName, [controlName, "blur", "value"]);
              groupControls.appendChild( rangedInput );
              // Blur Type
              let blurTypeLabel = FM.label( FM.language["BlurType"] );
              groupControls.appendChild( blurTypeLabel );
              let dropDown = FM.dropDown(FM.blurs, control.blur.type);
              FM.addOptionsAction(dropDown, "updateTransitionVisualEffect", [controlName, 'blur', 'type', 'uiValue']);
              groupControls.appendChild( dropDown );
            }
          }
        }

        // Append Control Group To Controls
        controlsContainer.appendChild(controlGroupContainer);
      }
      controlInterface.appendChild(controlsContainer);

    }
    //</endFold>
  }

  document.getElementsByClassName("FP_loadScreen")[0].classList.add("--hide");
}

// ******************************
// -- CallBack Functions --------
// ******************************
//<beginFold> updateTransitionControl
FM.updateTransitionControl = function(controlInfo){
  // Update Composition
  FM.transitionData.controls[controlInfo[0]].value = controlInfo[1];
  FM.updateComposition("transition");
}
//</endFold>

//<beginFold> updateTransitionColor
FM.updateTransitionColor = function(colorInfo){
  // Update Composition
  FM.transitionData.controls[colorInfo[0]].color = colorInfo[1];
  FM.updateComposition("transition");
}
//</endFold>

//<beginFold> updateTransitionVisualEffect
FM.updateTransitionVisualEffect = function(values){
  let controlName = values[0];
  let controlSubName = values[1];
  let controlSubType = values[2];
  let value = values[3];
  // Update Composition
  if(controlSubType != null){
    FM.transitionData.controls[controlName][controlSubName][controlSubType] = value;
  }else{
    FM.transitionData.controls[controlName][controlSubName] = value;
  }
  FM.updateComposition("transition");
}
//</endFold>
