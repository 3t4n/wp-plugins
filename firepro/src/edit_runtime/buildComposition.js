// *******************************************
// -- Build The Composition ------------------
// *******************************************
//<beginFold> Build The Composition
FM.buildComposition = function(){
  return new Promise((resolve, reject) => {
    let compositionData = FM.compositionData;
    console.log("Built The Block Using This Data: ", compositionData);

    // -- Destroy Any Existing Animations --------
    FM.destoryAnimations();

    // -- Build An Object That Stores Data For The Composition
    let compositionStorage = FM.compositionStorage;
    compositionStorage.elements = {};
    compositionStorage.animations = {};
    let compositionElements = compositionStorage.elements;
    let compositionAnimations = compositionStorage.animations;

    // -- Extract HTML Nodes From Editor Container
    let compositionPreview = FM.editorContainer.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
    compositionElements.image = compositionPreview.getElementsByClassName("FP_image")[0];
    compositionElements.colorCorrection = compositionPreview.getElementsByClassName("FP_colorCorrection")[0];
    compositionElements.effects = compositionPreview.getElementsByClassName("FP_effects")[0];
    compositionElements.text = compositionPreview.getElementsByClassName("FP_text")[0];
    compositionElements.textReveal = compositionPreview.getElementsByClassName("FP_textReveal")[0];
    compositionElements.transition = compositionPreview.getElementsByClassName("FP_transition")[0];

    // Reset Aspect Ratio Of Preview
    FM.updateCompositionAR = function(){
      let inner1Container = compositionPreview.getElementsByClassName("FP_compositionPreview_Inner1")[0];
      let inner1Height = compositionPreview.offsetWidth * (1/FM.fullCompData.aspectRatio);
      if(inner1Height > compositionPreview.offsetHeight){
        let percentDiff = (compositionPreview.offsetHeight ) / inner1Height;
        inner1Container.style.width = (percentDiff*100) + "%";
      }else{
        inner1Container.style.width = "100%";
      }
    }
    FM.updateCompositionAR();


    // ***********************
    // -- Setup Image --------
    // ***********************
    //<beginFold> Image
    compositionElements.image.crossOrigin = "anonymous";
    if(compositionData.image.source == null){
      compositionElements.image.src = FM.emptyImg;
    }else{
      compositionElements.image.src = compositionData.image.source;
    }
    //</endFold>

    // ********************************
    // -- Setup Color Correction ------
    // ********************************
    //<beginFold> colorCorrection
    function colorCorrection(){
      if(compositionData.colorCorrection.package.package == null){
        let settings = {};
        settings.objectFit = FM.compositionData.image.fit;
        settings.effects = FM.compositionData.image.effects;
        FM.imageTransfer(compositionElements.image, compositionElements.colorCorrection, settings).then(function(animation){
          // -- Store Animation In Storage
          compositionAnimations.colorCorrection = animation;
          setupEffects();
        });
      }else{
        let frame = {};
        frame.canvas = compositionElements.colorCorrection;
        let packageData = { package: compositionData.colorCorrection.package.package, style: compositionData.colorCorrection.package.style };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;
          FM.deepCopy(setup.controls, compositionData.colorCorrection.controls);

          // -- Setup Images
          let image1 = setup.image1;
          image1.src = compositionElements.image;
          image1.objectFit = FM.compositionData.image.fit;
          FM.deepCopy(image1.effects, FM.compositionData.image.effects);
          let image2 = setup.image2;
          if(image2 != undefined){
            image2.src = compositionElements.image;
            image2.objectFit = FM.compositionData.image.fit;
            FM.deepCopy(image2.effects, FM.compositionData.image.effects);
          }

          // -- Play The Animation
          animation.play();
          FM.controlData[packageData.package] = controls;

          // -- Store Animation In Storage
          compositionAnimations.colorCorrection = animation;
          setupEffects();

        }).catch(function(FireProError){
          FM.outOfFree("colorCorrection", compositionData.colorCorrection.package.package);
          console.error(FireProError);
        });
      }
    }
    colorCorrection();
    //</endFold>

    // ***********************
    // -- Setup Effects ------
    // ***********************
    //<beginFold> Effects
    function setupEffects(){
      if(compositionData.effects.package.package == null){
        FM.imageTransfer(compositionElements.colorCorrection, compositionElements.effects).then(function(animation){
          // -- Store Animation In Storage
          compositionAnimations.effects = animation;
          setupText();
        });
      }else{
        let frame = {};
        frame.canvas = compositionElements.effects;
        let packageData = { package: compositionData.effects.package.package, style: compositionData.effects.package.style };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;
          FM.deepCopy(setup.controls, compositionData.effects.controls);

          // -- Setup Images
          let image1 = setup.image1;
          image1.src = compositionElements.colorCorrection;
          let image2 = setup.image2;
          if(image2 != undefined){
            image2.src = compositionElements.colorCorrection;
          }

          // -- Play The Animation
          animation.play();
          FM.controlData[packageData.package] = controls;

          // -- Store Animation In Storage
          compositionAnimations.effects = animation;
          setupText();

        }).catch(function(FireProError){
          FM.outOfFree("effects", compositionData.effects.package.package);
          console.error(FireProError);
        });
      }
    }
    //</endFold>

    // ***********************
    // -- Setup Text ---------
    // ***********************
    //<beginFold> Text
    function setupText(){
      let frame = {};
      frame.canvas = compositionElements.text;
      let packageData = { package: "3 Image Text", style: "1" };
      let apiKey = firepro;
      FP.loadAnimation(frame, packageData, apiKey).then(function(animation){
        // -- Store Animation In Storage
        compositionAnimations.text = animation;
        let setup = animation.setup;
        // -- Text Settings
        compositionAnimations.text.controls = {};
        FM.guaranteedDeepCopy(compositionAnimations.text.controls, compositionData.text);
        let text1 = setup.text1;
        let text2 = setup.text2;
        FM.initCompositionText(text1);
        FM.initCompositionText(text2);
        FM.initCompositionTextImages();
        FM.updateCompositionText();

        // -- Setup Images
        let image1 = setup.image1;
        image1.src = FM.compositionStorage.elements.textImages.image1;
        // let image2 = setup.image2;
        // image2.src = FM.compositionStorage.elements.textImages.image2;
        // let image3 = setup.image3;
        // image3.src = compositionElements.effects;
        // let image4 = setup.image4;
        // image4.src = compositionElements.effects;
        FM.controlData[packageData.package] = setup.controls;

        setupTextReveal();

      }).catch(function(FireProError){ console.error(FireProError); });
    }
    //</endFold>

    // ***********************
    // -- Setup Text Reveal --
    // ***********************
    //<beginFold> Text Reveal
    function setupTextReveal(){
      if(compositionData.textReveal.package.package == null){
        FM.imageCombine(compositionElements.text, compositionElements.effects, compositionElements.textReveal).then(function(animation){
          // -- Store Animation In Storage
          compositionAnimations.textReveal = animation;
          resolve(compositionStorage);
        });
      }else{
        let frame = {};
        frame.canvas = compositionElements.textReveal;
        let packageData = { package: compositionData.textReveal.package.package, style: compositionData.textReveal.package.style };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;
          FM.deepCopy(setup.controls, compositionData.textReveal.controls);

          // -- Setup Images
          let image1 = setup.image1;
          image1.src = compositionElements.text;
          let image2 = setup.image2;
          image2.src = compositionElements.effects;

          // -- Play The Animation
          animation.play();
          // Pause On Loop If We Aren't Editing The Text Reveal
          function loopPause(){
            if(FM.elementState == "textReveal"){
              animation.pause();
              animation.events.removeEventListener("loop", loopPause);
              setTimeout(function(){
                if(FM.elementState == "textReveal"){
                  animation.events.addEventListener("loop", loopPause);
                  animation.play();
                }
              }, 1000);
            }
            animation.pause();
          }
          animation.events.addEventListener("loop", loopPause);

          FM.controlData[packageData.package] = controls;

          // -- Store Animation In Storage
          compositionAnimations.textReveal = animation;
          resolve(compositionStorage);

        }).catch(function(FireProError){
          FM.outOfFree("textReveal", compositionData.textReveal.package.package);
          console.error(FireProError);
        });
      }
    }
    //</endFold>


  }); // end return promise
}
//</endFold>

// *******************************************
// -- Update The Composition Setup Controls --
// *******************************************
//<beginFold> updateComposition
FM.updateComposition = function(type){
  // Update Image
  if(type == "image"){
    FM.compositionStorage.animations.colorCorrection.setup.image1.objectFit = FM.compositionData.image.fit;
    if(FM.compositionStorage.animations.colorCorrection.setup.image2 != undefined){
      FM.compositionStorage.animations.colorCorrection.setup.image2.objectFit = FM.compositionData.image.fit;
    }

    FM.deepCopy(FM.compositionStorage.animations.colorCorrection.setup.image1.effects, FM.compositionData.image.effects);
    if(FM.compositionStorage.animations.colorCorrection.setup.image2 != undefined){
      FM.deepCopy(FM.compositionStorage.animations.colorCorrection.setup.image2.effects, FM.compositionData.image.effects);
    }
  }

  // Update Color Correction
  if(type == "colorCorrection"){
    FM.deepCopy(FM.compositionStorage.animations.colorCorrection.setup.controls, FM.compositionData.colorCorrection.controls);
  }

  // Update Effects
  if(type == "effects"){
    FM.deepCopy(FM.compositionStorage.animations.effects.setup.controls, FM.compositionData.effects.controls);
  }

  // Update Text
  if(type == "text"){
    // FM.compositionData.elements.text.image1
    //  =
  }

  // Update Effects
  if(type == "textReveal"){
    FM.deepCopy(FM.compositionStorage.animations.textReveal.setup.controls, FM.compositionData.textReveal.controls);
  }

  // Update Effects
  if(type == "transition"){
    FM.deepCopy(FM.compositionStorage2.animations.transition.setup.controls, FM.transitionData.controls);
  }

}
//</endFold>

// *******************************************
// -- Update Gutenberg/Wordpress Data --------
// *******************************************
//<beginFold> updateCompositionGutenberg
FM.updateCompositionGutenberg = function(){
  // -- Update Hover Data
  // Remove All hoverData packages not in use
  for(let elementName in FM.compositionData){
    if(elementName == "previewImage"){ continue; }
    let packageName = FM.compositionData[elementName].package.package;
    for(let allPackageNames in FM.hoverData[elementName]){
      if(packageName != allPackageNames){
        delete FM.hoverData[elementName][allPackageNames];
      }
    }
  }

  // Update Comp Data
  let fullCompString = window.FireTrack[FM.attributes.seed].compositionData;
  let fullCompData = JSON.parse(fullCompString);
  fullCompData.slides[FM.blockIndex].blockData = FM.compositionData;
  fullCompData.slides[FM.blockIndex].hoverData = FM.hoverData;
  let compositionString = JSON.stringify(fullCompData);
  window.FireTrack[FM.attributes.seed].compositionData = compositionString;
  FM.setAttributes( { compositionData: compositionString } );

}
//</endFold>

// *******************************************
// -- Update The Compostion Color Correction -
// *******************************************
//<beginFold> updateCompositionColorCorrection
FM.updateCompositionColorCorrection = function(){
  return new Promise((resolve, reject) => {
    // Define FM Globas
    let compositionData = FM.compositionData;
    let compositionStorage = FM.compositionStorage;
    let compositionElements = compositionStorage.elements;
    let compositionAnimations = compositionStorage.animations;

    // -- Extract HTML Nodes From Editor Container
    let compositionPreview = FM.editorContainer.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
    compositionElements.image = compositionPreview.getElementsByClassName("FP_image")[0];
    compositionElements.colorCorrection = compositionPreview.getElementsByClassName("FP_colorCorrection")[0];
    compositionElements.effects = compositionPreview.getElementsByClassName("FP_effects")[0];
    compositionElements.text = compositionPreview.getElementsByClassName("FP_text")[0];

    // Hard Pause Transition Animation to prevent any type of frame jumps
    compositionAnimations.textReveal.hardPause();

    // Delete Existing Effect
    FM.compositionStorage.animations.colorCorrection.destroy();

    // Update Active Style
    if(compositionData.colorCorrection.package.package != null){
      FM.presetData[compositionData.colorCorrection.package.package].activeStyle = compositionData.colorCorrection.package.style;
    }

    // Load the Effect
    if(compositionData.colorCorrection.package.package == null){
      let settings = {};
      settings.objectFit = FM.compositionData.image.fit;
      settings.effects = FM.compositionData.image.effects;
      FM.imageTransfer(compositionElements.image, compositionElements.colorCorrection, settings).then(function(animation){
        // -- Store Animation In Storage
        animation.events.addEventListener("frameUpdate", finished);
        function finished(){
          animation.events.removeEventListener("frameUpdate", finished);
          finishBuild(animation);
        }
      });
    }else{
      let frame = {};
      frame.canvas = compositionElements.colorCorrection;
      let packageData = { package: compositionData.colorCorrection.package.package, style: compositionData.colorCorrection.package.style };
      let apiKey = firepro;
      FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

        let setup = animation.setup;

        // -- Setup The Controls
        let controls = setup.controls;
        if(FM.controlData[compositionData.colorCorrection.package.package] == undefined){
          FM.controlData[compositionData.colorCorrection.package.package] = controls;
        }
        FM.deepCopy(setup.controls, compositionData.colorCorrection.controls);

        // -- Setup Images
        let image1 = setup.image1;
        image1.src = compositionElements.image;
        image1.objectFit = FM.compositionData.image.fit;
        FM.deepCopy(image1.effects, FM.compositionData.image.effects);
        // image1.effects = FM.compositionData.image.effects;
        let image2 = setup.image2;
        if(image2 != undefined){
          image2.src = compositionElements.image;
          image2.objectFit = FM.compositionData.image.fit;
          FM.deepCopy(image2.effects, FM.compositionData.image.effects);
          // image2.effects = FM.compositionData.image.effects;
        }

        // -- Play The Animation
        animation.play();

        // -- Store Animation In Storage
        animation.events.addEventListener("frameUpdate", finished);
        function finished(){
          animation.events.removeEventListener("frameUpdate", finished);
          compositionAnimations.colorCorrection = animation;
          FM.updateComposition("colorCorrection");
          finishBuild(animation);
        }

      }).catch(function(FireProError){
        FM.editingColorCorrection = false;
        reject();
        console.error(FireProError);
      });
    }

    function finishBuild(animation){
      compositionAnimations.textReveal.pause();
      // Update Global Effects Storage
      compositionAnimations.colorCorrection = animation;
      FM.editingColorCorrection = false;
      resolve();
    }
  }); // end return promise
}
//</endFold>

// *******************************************
// -- Update The Compostion Effects ----------
// *******************************************
//<beginFold> updateCompositionEffects
FM.updateCompositionEffects = function(){
  return new Promise((resolve, reject) => {
    // Define FM Globas
    let compositionData = FM.compositionData;
    let compositionStorage = FM.compositionStorage;
    let compositionElements = compositionStorage.elements;
    let compositionAnimations = compositionStorage.animations;

    // -- Extract HTML Nodes From Editor Container
    let compositionPreview = FM.editorContainer.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
    compositionElements.image = compositionPreview.getElementsByClassName("FP_image")[0];
    compositionElements.colorCorrection = compositionPreview.getElementsByClassName("FP_colorCorrection")[0];
    compositionElements.effects = compositionPreview.getElementsByClassName("FP_effects")[0];
    compositionElements.text = compositionPreview.getElementsByClassName("FP_text")[0];

    // Hard Pause Transition Animation to prevent any type of frame jumps
    compositionAnimations.textReveal.hardPause();

    // Delete Existing Effect
    FM.compositionStorage.animations.effects.destroy();

    // Update Active Style
    if(compositionData.effects.package.package != null){
      FM.presetData[compositionData.effects.package.package].activeStyle = compositionData.effects.package.style;
    }

    // Load the Effect
    if(compositionData.effects.package.package == null){
      FM.imageTransfer(compositionElements.colorCorrection, compositionElements.effects).then(function(animation){
        // -- Store Animation In Storage
        animation.events.addEventListener("frameUpdate", finished);
        function finished(){
          animation.events.removeEventListener("frameUpdate", finished);
          finishBuild(animation);
        }
      });
    }else{
      let frame = {};
      frame.canvas = compositionElements.effects;
      let packageData = { package: compositionData.effects.package.package, style: compositionData.effects.package.style };
      let apiKey = firepro;
      FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

        let setup = animation.setup;

        // -- Setup The Controls
        let controls = setup.controls;
        if(FM.controlData[compositionData.effects.package.package] == undefined){
          FM.controlData[compositionData.effects.package.package] = controls;
        }
        FM.deepCopy(setup.controls, compositionData.effects.controls);

        // -- Setup Images
        let image1 = setup.image1;
        image1.src = compositionElements.colorCorrection;
        let image2 = setup.image2;
        if(image2 != undefined){
          image2.src = compositionElements.colorCorrection;
        }

        // -- Play The Animation
        animation.play();

        // -- Store Animation In Storage
        animation.events.addEventListener("frameUpdate", finished);
        function finished(){
          animation.events.removeEventListener("frameUpdate", finished);
          compositionAnimations.effects = animation;
          FM.updateComposition("effects");
          finishBuild(animation);
        }

      }).catch(function(FireProError){
        FM.editingEffects = false;
        reject();
        console.error(FireProError);
      });
    }

    function finishBuild(animation){
      compositionAnimations.textReveal.pause();
      // Update Global Effects Storage
      compositionAnimations.effects = animation;
      FM.editingEffects = false;
      resolve();
    }
  }); // end return promise
}
//</endFold>

// *******************************************
// -- Update The Compostion Text -------------
// *******************************************
//<beginFold> initCompositionText
FM.initCompositionText = function(container){
  // Define Text Container
  let textContainer = container.getElementsByClassName("FP_textContainer")[0];
  textContainer.style.textAlign = "left";
  textContainer.innerHTML = "";

  // PreFix Arr
  let textPrefix = ["preText", "mainText", "subText"];

  // Create Render Nodes
  for(var i=0; i<textPrefix.length; i++){
    let renderNode = document.createElement("div");
    renderNode.classList.add("--" + textPrefix[i]);
    renderNode.classList.add("FP_renderNode");
    renderNode.style.position = "absolute";
    textContainer.appendChild(renderNode);
  }
}
//</endFold>

//<beginFold> initCompositionTextImages
FM.initCompositionTextImages = function(compositionStorage, compositionData){
  if(compositionStorage == undefined){
    compositionStorage = FM.compositionStorage;
  }
  if(compositionData == undefined){
    compositionData = FM.compositionData;
  }
  compositionStorage.elements.textImages = {};
  compositionStorage.elements.textImages.image1 = document.createElement("img");
  if(compositionData.text.mainText.image.source == "" || compositionData.text.mainText.image.source == null){
    compositionStorage.elements.textImages.image1.src = FM.emptyImg;
  }else{
    compositionStorage.elements.textImages.image1.src = compositionData.text.mainText.image.source;
  }
}
//</endFold>

//<beginFold> updateCompositionText
FM.updateCompositionText = function(compositionStorage){
  if(compositionStorage == undefined){
    compositionStorage = FM.compositionStorage;
  }
  if(compositionStorage == null){ return; }
  if(compositionStorage.animations == undefined){ return; }


  let text1Parent = compositionStorage.animations.text.setup.text1;
  let text2Parent = compositionStorage.animations.text.setup.text2;
  let setup = compositionStorage.animations.text.setup;
  let controls = compositionStorage.animations.text.setup.controls;
  let parsedTextData = compositionStorage.animations.text.controls;

  // *******************
  // -- Main Text ------
  // *******************
  //<beginFold> mainText
  function mainText(){
    // -- Establish Containers
    let textContainer1 = text1Parent.getElementsByClassName('--'+"mainText")[0];
    let textContainer2 = text2Parent.getElementsByClassName('--'+"mainText")[0];
    let textData = parsedTextData["mainText"]; //FM.compositionData.text["mainText"];
    if(textData.animation.name == ""){ textData.animation.name = "Lift Up"; }
    textContainer1.innerHTML = textData.textValue;
    // -- Skip Filling In HTML For Text2 If There Is No Image
    if(textData.textValue != "" && FM.sanatizeTextValue(textData.image.opacity) != 0 && textData.image.source != null){ // BY PASS TEXT 2
      textContainer2.innerHTML = textData.textValue;
      textContainer2.style.color = "rgba("+255*(FM.sanatizeTextValue(textData.image.opacity)/100)+",0,0,1)";
    }else{
      textContainer2.innerHTML = "";
      textContainer2.style.color = "rgba(0,0,0,0)";
    }
    // -- Setup Image
    setup.image1.src = compositionStorage.elements.textImages.image1;
    FM.deepCopy(setup.image1.effects, textData.image.effects);
    setup.controls.image1Scale.value = FM.sanatizeTextValue(textData.image.scale);
    setup.controls.image1HorizontalPosition.value = FM.sanatizeTextValue(textData.image.x);
    setup.controls.image1VerticalPosition.value = FM.sanatizeTextValue(textData.image.y);
    // -- Fill In CSS Settings
    FM.loadFont(textData.fontFamily, textData.fontWeight).then(function(){
      textContainer1.style.fontFamily = textData.fontFamily;
      textContainer2.style.fontFamily = textData.fontFamily;
      textContainer1.style.fontWeight = textData.fontWeight;
      textContainer2.style.fontWeight = textData.fontWeight;
    })
    textContainer1.style.fontStyle = textData.fontStyle;
    textContainer2.style.fontStyle = textData.fontStyle;
    textContainer1.style.letterSpacing = FM.sanatizeTextValue(textData.letterSpacing) + "em";
    textContainer2.style.letterSpacing = FM.sanatizeTextValue(textData.letterSpacing) + "em";
    textContainer1.style.textAlign = textData.placement.xAlign;
    textContainer2.style.textAlign = textData.placement.xAlign;
    textContainer1.style.setProperty("--FP_verticalOffset", FM.sanatizeTextValue(textData.placement.y) + "%");
    textContainer2.style.setProperty("--FP_verticalOffset", FM.sanatizeTextValue(textData.placement.y) + "%");
    textContainer1.style.setProperty("--FP_verticalAlignment", textData.placement.yAlign);
    textContainer2.style.setProperty("--FP_verticalAlignment", textData.placement.yAlign);
    textContainer1.style.setProperty("--FP_horizontalOffset", FM.sanatizeTextValue(textData.placement.x) + "%");
    textContainer2.style.setProperty("--FP_horizontalOffset", FM.sanatizeTextValue(textData.placement.x) + "%");
    textContainer1.style.setProperty("--FP_horizontalAlignment", textData.placement.xAlign);
    textContainer2.style.setProperty("--FP_horizontalAlignment", textData.placement.xAlign);
    textContainer1.style.setProperty("--FP_animation", textData.animation.name); // textData.animation.name
    textContainer2.style.setProperty("--FP_animation", textData.animation.name); // textData.animation.name
    textContainer1.style.setProperty("--FP_animationTargets", textData.animation.targets); // textData.animation.name
    textContainer2.style.setProperty("--FP_animationTargets", textData.animation.targets); // textData.animation.name
    textContainer1.style.setProperty("--FP_animationProgress", FM.sanatizeTextValue(textData.animation.progress));
    textContainer2.style.setProperty("--FP_animationProgress", FM.sanatizeTextValue(textData.animation.progress));
    textContainer1.style.setProperty("--FP_animationEase", textData.animation.ease);
    textContainer2.style.setProperty("--FP_animationEase", textData.animation.ease);
    textContainer1.style.setProperty("--FP_fontSize", FM.sanatizeTextValue(textData.fontSize)+"cw");
    textContainer2.style.setProperty("--FP_fontSize", FM.sanatizeTextValue(textData.fontSize)+"cw");
    textContainer1.style.setProperty("--FP_maxFontSize", textData.maxFontSize);
    textContainer2.style.setProperty("--FP_maxFontSize", textData.maxFontSize);

    // Only Text1 Settings
    textContainer1.style.color = FM.sanatizeTextValue(textData.color);
    textContainer1.style.backgroundColor = FM.sanatizeTextValue(textData.backgroundColor);
    textContainer1.style.setProperty("--FP_borderWidth", FM.sanatizeTextValue(textData.borderWidth));
    textContainer1.style.setProperty("--FP_borderColor", FM.sanatizeTextValue(textData.borderColor));
    textContainer1.style.setProperty("--FP_borderStyle", textData.borderStyle);

    textContainer1.style.setProperty("--FP_backgroundHorizontalSize", FM.sanatizeTextValue(textData.backgroundHorizontalSize));
    textContainer1.style.setProperty("--FP_backgroundVerticalSize", FM.sanatizeTextValue(textData.backgroundVerticalSize));
    textContainer1.style.setProperty("--FP_backgroundXOffset", FM.sanatizeTextValue(textData.backgroundXOffset));
    textContainer1.style.setProperty("--FP_backgroundYOffset", FM.sanatizeTextValue(textData.backgroundYOffset));
    textContainer1.style.setProperty("--FP_stroke", FM.sanatizeTextValue(textData.strokeWidth) +"px "+ FM.sanatizeTextValue(textData.strokeColor));
    textContainer1.style.textShadow = "0 0 "+FM.sanatizeTextValue(textData.shadowSize)+"px "+FM.sanatizeTextValue(textData.shadowColor);

  }
  mainText();
  //</endFold>

  // *******************
  // -- Pre Text -------
  // *******************
  //<beginFold> preText
  function preText(){
    // -- Establish Containers
    let textContainer1 = text1Parent.getElementsByClassName('--'+"preText")[0];
    let textContainer2 = text2Parent.getElementsByClassName('--'+"preText")[0];
    let textData = parsedTextData["preText"];
    if(textData.animation.name == ""){ textData.animation.name = "Lift Up"; }
    let mainData = parsedTextData["mainText"];
    textContainer1.innerHTML = textData.textValue;

    // Setup Offset Margin
    let finalYOffset = FM.sanatizeTextValue(textData.placement.y);
    let finalYOffsetAlign = textData.placement.yAlign;
    let marginAdjustment = 0;
    if(textData.placement.yAlign.toLowerCase() == "offset main"){
      finalYOffset = FM.sanatizeTextValue(mainData.placement.y);
      finalYOffsetAlign = mainData.placement.yAlign;
      marginAdjustment = FM.getFontCWSize(mainData, textData, text1Parent) * -1;
    }

    textContainer1.style.marginTop = marginAdjustment + "px";
    textContainer1.style.setProperty("--FP_verticalOffset", finalYOffset + "%");
    textContainer1.style.setProperty("--FP_verticalAlignment", finalYOffsetAlign);

    // -- Fill In CSS Settings
    FM.loadFont(textData.fontFamily, textData.fontWeight).then(function(){
      textContainer1.style.fontFamily = textData.fontFamily;
      textContainer1.style.fontWeight = textData.fontWeight;
    })
    textContainer1.style.fontStyle = textData.fontStyle;
    textContainer1.style.letterSpacing = FM.sanatizeTextValue(textData.letterSpacing) + "em";
    textContainer1.style.textAlign = textData.placement.xAlign;
    textContainer1.style.setProperty("--FP_horizontalOffset", FM.sanatizeTextValue(textData.placement.x) + "%");
    textContainer1.style.setProperty("--FP_horizontalAlignment", textData.placement.xAlign);
    textContainer1.style.setProperty("--FP_animation", textData.animation.name); // textData.animation.name
    textContainer1.style.setProperty("--FP_animationTargets", textData.animation.targets); // textData.animation.name
    textContainer1.style.setProperty("--FP_animationProgress", FM.sanatizeTextValue(textData.animation.progress));
    textContainer1.style.setProperty("--FP_animationEase", textData.animation.ease);
    textContainer1.style.setProperty("--FP_fontSize", FM.sanatizeTextValue(textData.fontSize)+"cw");
    textContainer1.style.setProperty("--FP_maxFontSize", textData.maxFontSize);

    // Only Text1 Settings
    textContainer1.style.color = FM.sanatizeTextValue(textData.color);
    textContainer1.style.backgroundColor = FM.sanatizeTextValue(textData.backgroundColor);
    textContainer1.style.setProperty("--FP_borderWidth", FM.sanatizeTextValue(textData.borderWidth));
    textContainer1.style.setProperty("--FP_borderColor", FM.sanatizeTextValue(textData.borderColor));
    textContainer1.style.setProperty("--FP_borderStyle", textData.borderStyle);

    textContainer1.style.setProperty("--FP_backgroundHorizontalSize", FM.sanatizeTextValue(textData.backgroundHorizontalSize));
    textContainer1.style.setProperty("--FP_backgroundVerticalSize", FM.sanatizeTextValue(textData.backgroundVerticalSize));
    textContainer1.style.setProperty("--FP_backgroundXOffset", FM.sanatizeTextValue(textData.backgroundXOffset));
    textContainer1.style.setProperty("--FP_backgroundYOffset", FM.sanatizeTextValue(textData.backgroundYOffset));
    textContainer1.style.setProperty("--FP_stroke", FM.sanatizeTextValue(textData.strokeWidth) +"px "+ FM.sanatizeTextValue(textData.strokeColor));
    textContainer1.style.textShadow = "0 0 "+FM.sanatizeTextValue(textData.shadowSize)+"px "+FM.sanatizeTextValue(textData.shadowColor);

  }
  preText();
  //</endFold>

  // *******************
  // -- Sub Text -------
  // *******************
  //<beginFold> subText
  function subText(){
    // -- Establish Containers
    let textContainer1 = text1Parent.getElementsByClassName('--'+"subText")[0];
    let textData = parsedTextData["subText"];
    if(textData.animation.name == ""){ textData.animation.name = "Lift Up"; }
    let mainData = parsedTextData["mainText"];
    textContainer1.innerHTML = textData.textValue;

    // Setup Offset Margin
    let finalYOffset = FM.sanatizeTextValue(textData.placement.y);
    let finalYOffsetAlign = textData.placement.yAlign;
    let marginAdjustment = 0;
    if(textData.placement.yAlign.toLowerCase() == "offset main"){
      finalYOffset = FM.sanatizeTextValue(mainData.placement.y);
      finalYOffsetAlign = mainData.placement.yAlign;
      marginAdjustment = FM.getFontCWSize(mainData, textData, text1Parent);
    }else{
      finalYOffset = 100 - finalYOffset;
    }

    textContainer1.style.marginTop = marginAdjustment + "px";
    textContainer1.style.setProperty("--FP_verticalOffset", finalYOffset + "%");
    textContainer1.style.setProperty("--FP_verticalAlignment", finalYOffsetAlign);

    // -- Fill In CSS Settings
    FM.loadFont(textData.fontFamily, textData.fontWeight).then(function(){
      textContainer1.style.fontFamily = textData.fontFamily;
      textContainer1.style.fontWeight = textData.fontWeight;
    })
    textContainer1.style.fontStyle = textData.fontStyle;
    textContainer1.style.letterSpacing = FM.sanatizeTextValue(textData.letterSpacing) + "em";
    textContainer1.style.textAlign = textData.placement.xAlign;
    textContainer1.style.setProperty("--FP_horizontalOffset", FM.sanatizeTextValue(textData.placement.x) + "%");
    textContainer1.style.setProperty("--FP_horizontalAlignment", textData.placement.xAlign);
    textContainer1.style.setProperty("--FP_animation", textData.animation.name); // textData.animation.name
    textContainer1.style.setProperty("--FP_animationTargets", textData.animation.targets); // textData.animation.name
    textContainer1.style.setProperty("--FP_animationProgress", FM.sanatizeTextValue(textData.animation.progress));
    textContainer1.style.setProperty("--FP_animationEase", textData.animation.ease);
    textContainer1.style.setProperty("--FP_fontSize", FM.sanatizeTextValue(textData.fontSize)+"cw");
    textContainer1.style.setProperty("--FP_maxFontSize", textData.maxFontSize);

    // Only Text1 Settings
    textContainer1.style.color = FM.sanatizeTextValue(textData.color);
    textContainer1.style.backgroundColor = FM.sanatizeTextValue(textData.backgroundColor);
    textContainer1.style.setProperty("--FP_borderWidth", FM.sanatizeTextValue(textData.borderWidth));
    textContainer1.style.setProperty("--FP_borderColor", FM.sanatizeTextValue(textData.borderColor));
    textContainer1.style.setProperty("--FP_borderStyle", textData.borderStyle);

    textContainer1.style.setProperty("--FP_backgroundHorizontalSize", FM.sanatizeTextValue(textData.backgroundHorizontalSize));
    textContainer1.style.setProperty("--FP_backgroundVerticalSize", FM.sanatizeTextValue(textData.backgroundVerticalSize));
    textContainer1.style.setProperty("--FP_backgroundXOffset", FM.sanatizeTextValue(textData.backgroundXOffset));
    textContainer1.style.setProperty("--FP_backgroundYOffset", FM.sanatizeTextValue(textData.backgroundYOffset));
    textContainer1.style.setProperty("--FP_stroke", FM.sanatizeTextValue(textData.strokeWidth) +"px "+ FM.sanatizeTextValue(textData.strokeColor));
    textContainer1.style.textShadow = "0 0 "+FM.sanatizeTextValue(textData.shadowSize)+"px "+FM.sanatizeTextValue(textData.shadowColor);

  }
  subText();
  //</endFold>

  // Update The Composition Data
  FM.updateComposition("text");
}
//</endFold>

//<beginFold> updateTextRAFLoop
FM.updateText = false;
FM.textTransitionTime = performance.now();
FM.updateTextRAFLoop = function(){
  if(FM.editorState != "composition" && FM.editorState != "transition" && FM.editorState != "easy"){ return; }
  if(FM.updateText == true || FM.textTransitionTime > performance.now() ){
     FM.updateCompositionText(FM.compositionStorage);
     FM.updateCompositionText(FM.compositionStorage2);
   }
  FM.updateText = false;
  window.requestAnimationFrame(FM.updateTextRAFLoop);
}
//</endFold>

// *******************************************
// -- Update The Compostion Text Reveal ------
// *******************************************
//<beginFold> updateCompositionTextReveal
FM.updateCompositionTextReveal = function(){
  return new Promise((resolve, reject) => {
    // Define FM Globas
    let compositionData = FM.compositionData;
    let compositionStorage = FM.compositionStorage;
    let compositionElements = compositionStorage.elements;
    let compositionAnimations = compositionStorage.animations;

    // -- Extract HTML Nodes From Editor Container
    let compositionPreview = FM.editorContainer.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
    compositionElements.image = compositionPreview.getElementsByClassName("FP_image")[0];
    compositionElements.colorCorrection = compositionPreview.getElementsByClassName("FP_colorCorrection")[0];
    compositionElements.effects = compositionPreview.getElementsByClassName("FP_effects")[0];
    compositionElements.text = compositionPreview.getElementsByClassName("FP_text")[0];
    compositionElements.textReveal = compositionPreview.getElementsByClassName("FP_textReveal")[0];

    // Hard Pause Transition Animation to prevent any type of frame jumps
    compositionAnimations.textReveal.hardPause();

    // Delete Existing Effect
    FM.compositionStorage.animations.textReveal.destroy();

    // Update Active Style
    if(compositionData.textReveal.package.package != null){
      FM.presetData[compositionData.textReveal.package.package].activeStyle = compositionData.textReveal.package.style;
    }

    // Load the Effect
    if(compositionData.textReveal.package.package == null){
      FM.imageCombine(compositionElements.text, compositionElements.effects, compositionElements.textReveal).then(function(animation){
        // -- Store Animation In Storage
        compositionAnimations.textReveal = animation;
        FM.editingTextReveal = false;
        resolve();
      });
    }else{
      let frame = {};
      frame.canvas = compositionElements.textReveal;
      let packageData = { package: compositionData.textReveal.package.package, style: compositionData.textReveal.package.style };
      let apiKey = firepro;
      FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

        let setup = animation.setup;

        // -- Setup The Controls
        let controls = setup.controls;
        if(FM.controlData[compositionData.textReveal.package.package] == undefined){
          FM.controlData[compositionData.textReveal.package.package] = controls;
        }
        FM.deepCopy(setup.controls, compositionData.textReveal.controls);

        // -- Setup Images
        let image1 = setup.image1;
        image1.src = compositionElements.text;
        let image2 = setup.image2;
        image2.src = compositionElements.effects;

        // -- Play The Animation
        animation.play();

        // Pause On Loop If We Aren't Editing The Text Reveal
        function loopPause(){
          if(FM.elementState == "textReveal"){
            animation.pause();
            animation.events.removeEventListener("loop", loopPause);
            setTimeout(function(){
              if(FM.elementState == "textReveal"){
                animation.events.addEventListener("loop", loopPause);
                animation.play();
              }
            }, 1000);
          }
          animation.pause();
        }
        animation.events.addEventListener("loop", loopPause);

        // -- Store Animation In Storage
        animation.events.addEventListener("frameUpdate", finished);
        function finished(){
          animation.events.removeEventListener("frameUpdate", finished);
          compositionAnimations.textReveal = animation;
          FM.updateComposition("textReveal");
          finishBuild(animation);
        }

      }).catch(function(FireProError){
        FM.editingTextReveal = false;
        reject();
        console.error(FireProError);
      });
    }

    function finishBuild(animation){
      // compositionAnimations.textReveal.pause();
      // Update Global Effects Storage
      compositionAnimations.textReveal = animation;
      FM.editingTextReveal = false;
      resolve();
    }
  }); // end return promise
}
//</endFold>

// *******************************************
// -- Update Preset Data ---------------------
// *******************************************
//<beginFold> updatePresetData
FM.updatePresetData = function(controls, packageName){
  if(packageName != null){
    FM.presetData[packageName] = controls;
  }
  // let presetString = JSON.stringify(FM.presetData);
  // FM.setAttributes( { presetData: presetString } );
}
//</endFold>
