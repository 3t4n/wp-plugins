// *******************************************
// -- Build Transition Composition -----------
// *******************************************
//<beginFold> Build Transition Composition
FM.buildTransitionComposition = function(){
  return new Promise((resolve, reject) => {
    let compositionData = FM.compositionData;
    let compositionData2 = FM.compositionData2;
    let transitionData = FM.transitionData;
    // console.log("Built Transition Block Using compositionData: ", compositionData);
    // console.log("Built Transition Block Using compositionData2: ", compositionData2);
    // console.log("Built Transition Block Using TransitionData: ", transitionData);

    // -- Destroy Any Existing Animations --------
    FM.destoryAnimations();

    // Reset Aspect Ratio Of Preview
    let compositionPreview = FM.editorContainer.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
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

    // -- Setup Each Compsotion Block
    let promiseAllBlocks = [];
    if(compositionData != null){
      promiseAllBlocks.push(FM.buildCompositionBlock(FM.compositionData, ""));
    }
    promiseAllBlocks.push(FM.buildCompositionBlock(FM.compositionData2, 2));

    // -- Build Transition
    Promise.all(promiseAllBlocks).then(() => {
      FM.buildTransitionBlock().then(function(){
        resolve();
      })
    });

  }); // end return promise
}
//</endFold>

// *******************************************
// -- Build Composition Blocks ---------------
// *******************************************
//<beginFold> buildCompositionBlock
FM.buildCompositionBlock = function(compositionData, index){
  return new Promise((resolve, reject) => {

    // -- Build An Object That Stores Data For The Composition
    let compositionStorage = FM["compositionStorage" + index];
    compositionStorage.elements = {};
    compositionStorage.animations = {};
    let compositionElements = compositionStorage.elements;
    let compositionAnimations = compositionStorage.animations;

    // -- Extract HTML Nodes From Editor Container
    let compositionPreview = FM.editorContainer.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
    compositionElements.image = compositionPreview.getElementsByClassName("FP_image" + index)[0];
    compositionElements.colorCorrection = compositionPreview.getElementsByClassName("FP_colorCorrection" + index)[0];
    compositionElements.effects = compositionPreview.getElementsByClassName("FP_effects" + index)[0];
    compositionElements.text = compositionPreview.getElementsByClassName("FP_text" + index)[0];

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
        settings.objectFit = compositionData.image.fit;
        settings.effects = compositionData.image.effects;
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
          image1.objectFit = compositionData.image.fit;
          FM.deepCopy(image1.effects, compositionData.image.effects);
          let image2 = setup.image2;
          if(image2 != undefined){
            image2.src = compositionElements.image;
            image2.objectFit = compositionData.image.fit;
            FM.deepCopy(image2.effects, compositionData.image.effects);
          }

          // -- Play The Animation
          animation.play();

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
        FM.initCompositionTextImages(compositionStorage, compositionData);
        FM.updateCompositionText(compositionStorage);

        // -- Setup Images
        let image1 = setup.image1;
        image1.src = compositionStorage.elements.textImages.image1;

        let image3 = setup.image3;
        image3.src = compositionElements.effects;

        resolve();

      }).catch(function(FireProError){ console.error(FireProError); });
    }
    //</endFold>


  }); // end return promise
}
//</endFold>

//<beginFold> buildTransitionBlock
FM.buildTransitionBlock = function(){
  return new Promise((resolve, reject) => {

    // -- Build An Object That Stores Data For The Composition
    let compositionStorage = FM.compositionStorage2;
    let compositionElements = compositionStorage.elements;
    let compositionAnimations = compositionStorage.animations;
    let transitionData = FM.transitionData;

    // -- Extract Active Blocks
    let compositionPreview = FM.editorContainer.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
    let block1 = compositionPreview.getElementsByClassName("FP_text")[0];
    let block2 = compositionPreview.getElementsByClassName("FP_text2")[0];
    let transitionBlock = compositionPreview.getElementsByClassName("FP_transition")[0];

    // -- Build Transition Animation
    function buildTransition(){
      if(transitionData.package.package == null){
        FM.imageTransfer(block2, transitionBlock).then(function(animation){
          // -- Store Animation In Storage
          compositionAnimations.transition = animation;
          resolve();
        });
      }else{
        let frame = {};
        frame.canvas = transitionBlock;
        let packageData = { package: transitionData.package.package, style: transitionData.package.style };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;
          FM.deepCopy(setup.controls, transitionData.controls);

          // -- Setup Images
          let image1 = setup.image1;
          image1.src = block1;
          let image2 = setup.image2;
          image2.src = block2;

          // -- Play The Animation
          animation.play();

          // -- Store Animation In Storage
          compositionAnimations.transition = animation;
          resolve();

        }).catch(function(FireProError){
          FM.outOfFree("transition", transitionData.package.package);
          console.error(FireProError);
        });
      }
    }
    buildTransition();

  }); // end return promise
}
//</endFold>

// *******************************************
// -- Update The Compostion Transition -------
// *******************************************
//<beginFold> updateCompositionTransition
FM.updateCompositionTransition = function(){
  return new Promise((resolve, reject) => {

    // -- Build An Object That Stores Data For The Composition
    let compositionStorage = FM.compositionStorage2;
    let compositionElements = compositionStorage.elements;
    let compositionAnimations = compositionStorage.animations;
    let transitionData = FM.transitionData;

    // -- Extract Active Blocks
    let compositionPreview = FM.editorContainer.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
    let block1 = compositionPreview.getElementsByClassName("FP_text")[0];
    let block2 = compositionPreview.getElementsByClassName("FP_text2")[0];
    let transitionBlock = compositionPreview.getElementsByClassName("FP_transition")[0];

    compositionPreview.onclick = function(){
      if(FM.compositionStorage2.animations.transition.getPlayState() == "softPause"){
        FM.compositionStorage2.animations.transition.play(); return;
      }
      if(FM.compositionStorage2.animations.transition.getPlayState() == "play"){
        FM.compositionStorage2.animations.transition.pause(); return;
      }
    }

    // Hard Pause Transition Animation to prevent any type of frame jumps
    compositionAnimations.transition.hardPause();

    // Delete Existing Transition
    compositionAnimations.transition.destroy();

    // Update Active Style
    if(transitionData.package.package != null){
      FM.presetData[transitionData.package.package].activeStyle = transitionData.package.style;
    }

    // -- Build Transition Animation
    function buildTransition(){
      if(transitionData.package.package == null){
        FM.imageTransfer(block2, transitionBlock).then(function(animation){
          // -- Store Animation In Storage
          compositionAnimations.transition = animation;
          FM.editingTransition = false;
          resolve();
        });
      }else{
        let frame = {};
        frame.canvas = transitionBlock;
        let packageData = { package: transitionData.package.package, style: transitionData.package.style };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;
          if(FM.controlData[transitionData.package.package] == undefined){
            FM.controlData[transitionData.package.package] = controls;
          }
          FM.deepCopy(setup.controls, transitionData.controls);


          // -- Setup Images
          let image1 = setup.image1;
          image1.src = block1;
          let image2 = setup.image2;
          image2.src = block2;

          // -- Play The Animation
          animation.play();

          function loopPause(){
            animation.pause();
            setTimeout(function(){
              animation.play();
            }, 1000);
          }
          animation.events.addEventListener("loop", loopPause);

          // -- Store Animation In Storage
          compositionAnimations.transition = animation;
          FM.editingTransition = false;
          resolve();

        }).catch(function(FireProError){
          FM.editingTransition = false;
          reject();
          console.error(FireProError);
        });
      }
    }
    buildTransition();
  }); // end return promise
}
//</endFold>

// *******************************************
// -- Update Gutenberg/Wordpress Data --------
// *******************************************
//<beginFold> updateTransitionGutenberg
FM.updateTransitionGutenberg = function(){
  // Update Comp Data
  let fullCompString = window.FireTrack[FM.attributes.seed].compositionData;
  let fullCompData = JSON.parse(fullCompString);
  fullCompData.slides[FM.blockIndex].transitionData = FM.transitionData;
  let compositionString = JSON.stringify(fullCompData);
  window.FireTrack[FM.attributes.seed].compositionData = compositionString;
  FM.setAttributes( { compositionData: compositionString } );
}
//</endFold>
