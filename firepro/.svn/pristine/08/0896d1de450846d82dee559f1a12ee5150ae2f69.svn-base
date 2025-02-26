// *******************************************
// -- Build The Complete Composition ---------
// *******************************************
//<beginFold> Build Complete Composition
FM.buildCompleteComposition = function(){
  return new Promise((resolve, reject) => {
    let fullCompData = FM.fullCompData;
    console.log("Built Complete Composition Using fullCompData: ", fullCompData);

    // -- Destroy Any Existing Animations --------
    FM.destoryAnimations();

    // -- Reset Aspect Ratio Of Preview -----------
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

    // -- Build Slide Container -------------------
    let slide1Container = compositionPreview.getElementsByClassName("FP_slide1")[0];
    let slide2Container = compositionPreview.getElementsByClassName("FP_slide2")[0];
    let slideContainers = [slide1Container, slide2Container];
    let slideSwitch = 0;

    FM.buildSlide(fullCompData.slides[0], slideContainers[slideSwitch]).then(function(slide){
      slide.play();
      slideContainers[slideSwitch].getElementsByClassName("FP_transition")[0].classList.remove("FP_hide");
      resolve("Ready");
    });


  }); // end return promise
}
//</endFold>

// *******************************************
// -- Build Composition Blocks ---------------
// *******************************************
//<beginFold> buildSlide
FM.buildSlide = function(slideData, slideContainer){
  return new Promise((resolve, reject) => {

    // -- Setup Each Compsotion Block
    let promiseAllBlocks = [];
    promiseAllBlocks.push( FM.buildSlideElements(slideData, slideContainer)   );
    promiseAllBlocks.push( FM.buildTransitionSlide(slideData, slideContainer) );

    // -- Build Transition
    Promise.all(promiseAllBlocks).then((slideComponents) => {
      let slideReturn = {};
      let slideElements = slideComponents[0];
      let slideTransition = slideComponents[1];

      // Play Function
      slideReturn.play = function(){
        return new Promise((resolve, reject) => {
          for (const animation in slideElements.storage.animations) {
            if(animation == "textReveal"){ continue; }
            slideElements.storage.animations[animation].play();
          }
          slideTransition.animations.transition.play();
          slideTransition.elements.transition.classList.remove("FP_hide");
          if(slideTransition.finished == true){
            if(slideElements.storage.animations["textReveal"] == undefined){
              resolve("finishedTransition");
            }else{
              slideElements.storage.animations["textReveal"].play();
              slideElements.storage.animations["textReveal"].events.addEventListener("loop", function(){
                resolve("finishedTransition");
              });
            }

          }else{
            setTimeout(function(){
            // slideTransition.animations.transition.events.addEventListener("loop", function(){
              if(slideElements.storage.animations["textReveal"] == undefined){
                resolve("finishedTransition");
              }else{
                slideElements.storage.animations["textReveal"].play();
                slideElements.storage.animations["textReveal"].events.addEventListener("loop", function(){
                  resolve("finishedTransition");
                });
              }
            }, 600);
            // })
          }
        }); // end return promise
      }
      // Destory Function
      slideReturn.destroy = function(){
        for (const animation in slideElements.storage.animations) {
          slideElements.storage.animations[animation].destroy();
        }
        slideTransition.animations.transition.destroy();
      }
      // Transition Setup
      slideTransition.animations.transition.setup.image2.src = slideElements.showCanvas;
      slideReturn.transition = slideTransition.animations.transition;

      resolve(slideReturn);
    });

  }); // end return promise
}
//</endFold>

//<beginFold> buildSlideElements
FM.buildSlideElements = function(slideData, slideContainer){
  return new Promise((resolve, reject) => {
    let blockData = slideData.blockData;

    // -- Build An Object That Stores Data For The Composition
    let slideStorage = {};
    slideStorage.elements = {};
    slideStorage.animations = {};
    let compositionElements = slideStorage.elements;
    let compositionAnimations = slideStorage.animations;

    // -- Extract HTML Nodes From Editor Container
    compositionElements.image = slideContainer.getElementsByClassName("FP_image")[0];
    compositionElements.colorCorrection = slideContainer.getElementsByClassName("FP_colorCorrection")[0];
    compositionElements.effects = slideContainer.getElementsByClassName("FP_effects")[0];
    compositionElements.text = slideContainer.getElementsByClassName("FP_text")[0];
    compositionElements.textReveal = slideContainer.getElementsByClassName("FP_textReveal")[0];

    compositionElements.image.classList.add("FP_hide");
    compositionElements.colorCorrection.classList.add("FP_hide");
    compositionElements.effects.classList.add("FP_hide");
    compositionElements.text.classList.add("FP_hide");
    compositionElements.textReveal.classList.add("FP_hide");

    // -- Track Most Recent Used Canvas
    let previousCanvas = null;

    // ***********************
    // -- Setup Image --------
    // ***********************
    //<beginFold> Image
    compositionElements.image.crossOrigin = "anonymous";
    if(blockData.image.source == null){
      compositionElements.image.src = FM.emptyImg;
    }else{
      compositionElements.image.src = blockData.image.source;
    }
    previousCanvas = compositionElements.image;
    //</endFold>

    // ********************************
    // -- Setup Color Correction ------
    // ********************************
    //<beginFold> colorCorrection
    function colorCorrection(){
      if(blockData.colorCorrection.package.package == null){
        setupEffects();
      }else{
        let frame = {};
        frame.canvas = compositionElements.colorCorrection;
        let packageData = { package: blockData.colorCorrection.package.package, style: blockData.colorCorrection.package.style };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;
          FM.deepCopy(setup.controls, blockData.colorCorrection.controls);

          // -- Setup Images
          let image1 = setup.image1;
          image1.src = previousCanvas;
          image1.objectFit = blockData.image.fit;
          FM.deepCopy(image1.effects, blockData.image.effects);
          let image2 = setup.image2;
          if(image2 != undefined){
            image2.src = previousCanvas;
            image2.objectFit = blockData.image.fit;
            FM.deepCopy(image2.effects, blockData.image.effects);
          }


          // -- Store Animation In Storage
          compositionAnimations.colorCorrection = animation;
          previousCanvas = compositionElements.colorCorrection;
          setupEffects();

        }).catch(function(FireProError){
          FM.outOfFree("colorCorrection", blockData.colorCorrection.package.package);
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
      if(blockData.effects.package.package == null){
        setupText();
      }else{
        let frame = {};
        frame.canvas = compositionElements.effects;
        let packageData = { package: blockData.effects.package.package, style: blockData.effects.package.style };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;
          FM.deepCopy(setup.controls, blockData.effects.controls);

          // -- Setup Images
          let image1 = setup.image1;
          image1.src = previousCanvas;
          let image2 = setup.image2;
          if(image2 != undefined){
            image2.src = previousCanvas;
          }


          // -- Store Animation In Storage
          compositionAnimations.effects = animation;
          previousCanvas = compositionElements.effects;
          setupText();

        }).catch(function(FireProError){
          FM.outOfFree("effects", blockData.effects.package.package);
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
        FM.guaranteedDeepCopy(compositionAnimations.text.controls, blockData.text);
        let text1 = setup.text1;
        let text2 = setup.text2;
        FM.initCompositionText(text1);
        FM.initCompositionText(text2);
        FM.initCompositionTextImages(slideStorage, blockData);
        FM.updateCompositionText(slideStorage);

        // -- Setup Images
        let image1 = setup.image1;
        image1.src = slideStorage.elements.textImages.image1;

        let image3 = setup.image3;
        if(blockData.textReveal.package.package == null){
          image3.src = previousCanvas;
          previousCanvas = compositionElements.text;
        }

        setupTextReveal();

      }).catch(function(FireProError){ console.error(FireProError); });
    }
    //</endFold>

    // ***********************
    // -- Setup Text Reveal --
    // ***********************
    //<beginFold> Text Reveal
    function setupTextReveal(){
      if(blockData.textReveal.package.package == null){
        finishBuild();
      }else{
        let frame = {};
        frame.canvas = compositionElements.textReveal;
        let packageData = { package: blockData.textReveal.package.package, style: blockData.textReveal.package.style };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;
          FM.deepCopy(setup.controls, blockData.textReveal.controls);

          // -- Setup Images
          let image1 = setup.image1;
          image1.src = compositionElements.text;
          let image2 = setup.image2;
          image2.src = previousCanvas;

          // -- Play The Animation
          animation.events.addEventListener("loop", function(){
            animation.pause();
          })

          // -- Store Animation In Storage
          compositionAnimations.textReveal = animation;
          previousCanvas = compositionElements.textReveal;
          finishBuild();

        }).catch(function(FireProError){
          FM.outOfFree("textReveal", blockData.textReveal.package.package);
          console.error(FireProError);
        });
      }
    }
    //</endFold>

    //<beginFold> Finish Build
    function finishBuild(){
      let resolveSlide = {};
      resolveSlide.showCanvas = previousCanvas;
      resolveSlide.storage = slideStorage;
      resolve(resolveSlide);
    }
    //</endFold>


  }); // end return promise
}
//</endFold>

//<beginFold> buildTransitionSlide
FM.buildTransitionSlide = function(slideData, slideContainer){
  return new Promise((resolve, reject) => {

    let transitionData = slideData.transitionData;

    // -- Build An Object That Stores Data For The Composition
    let slideStorage = {};
    slideStorage.elements = {};
    slideStorage.animations = {};
    let compositionElements = slideStorage.elements;
    let compositionAnimations = slideStorage.animations;

    // -- Extract Active Blocks
    compositionElements.transition = slideContainer.getElementsByClassName("FP_transition")[0];
    compositionElements.transition.classList.add("FP_hide");

    // -- Build Transition Animation
    function buildTransition(){
      if(transitionData.package.package == null){
        let frame = {};
        frame.canvas = compositionElements.transition;
        let packageData = { package: "Only 2 Images", style: "1" };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;
          // -- Setup Image 1
          let image1 = setup.image1;
          // -- Setup Image 2
          let image2 = setup.image2;
          compositionAnimations.transition = animation;
          slideStorage.finished = true;
          resolve(slideStorage);

        }).catch(function(FireProError){ console.error(FireProError); });
      }else{
        let frame = {};
        frame.canvas = compositionElements.transition;
        let packageData = { package: transitionData.package.package, style: transitionData.package.style };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;
          FM.deepCopy(setup.controls, transitionData.controls);

          // -- Setup Images
          let image1 = setup.image1;
          let image2 = setup.image2;


          // -- Store Animation In Storage
          compositionAnimations.transition = animation;
          animation.events.addEventListener("loop", function(){
            slideStorage.finished = true;
            animation.pause();
          });
          slideStorage.finished = false;
          resolve(slideStorage);

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
