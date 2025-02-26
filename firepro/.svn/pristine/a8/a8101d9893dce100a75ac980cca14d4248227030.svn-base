// ********************************
// -- Init FM Object --------------
// ********************************
//<beginFold> Init FM
let FM = {};
FM.scrollState = true;
FM.compositionContainers = []; // Stores the composition containers found on the page
FM.updateText = 0;
FM.textAnimations = [];
FM.emptyImg = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=";
//</endFold>

//<beginFold> onBodyLoad
FM.onBodyLoad = function(){
  if (document.readyState === 'complete') {
    var script = document.createElement('script');
    script.onload = function () {
      FM.startRuntime();
    };
    script.src = 'https://cdn.firepro.io/releases/firepro.js';
    document.head.appendChild(script);
    return;
  }
  window.requestAnimationFrame(FM.onBodyLoad);
}
FM.onBodyLoad();
//</endFold>

// ********************************
// -- Scroll State ----------------
// ********************************
//<beginFold> Scroll State Handler
// Used to find which compositions are in the viewport
window.addEventListener('scroll', function() {
  FM.scrollState = true;
});
//</endFold>

// ********************************
// -- Runtime ---------------------
// ********************************
//<beginFold> startRuntime
FM.startRuntime = function(){

  function loopRAF(){
    if(FM.scrollState == false){
      window.requestAnimationFrame(loopRAF);
      return;
    }
    FM.scrollState = false;
    FM.compositionContainers = document.getElementsByClassName("Firepro_OuterContainer");
    FM.findViewPortCompositions();
    window.requestAnimationFrame(loopRAF);
  }
  loopRAF();
  FM.updateTextRAFLoop();
}
//</endFold>

//<beginFold> findViewPortCompositions
FM.findViewPortCompositions = function(){

  function getViewportSize(w) {
    var w = w || window;
    if(w.innerWidth != null)
      return {w:w.innerWidth, h:w.innerHeight};
    var d = w.document;
    if (document.compatMode == "CSS1Compat") {
      return {
        w: d.documentElement.clientWidth,
        h: d.documentElement.clientHeight
      };
    }
    return { w: d.body.clientWidth, h: d.body.clientWidth };
  }
  function isViewportVisible(e, padding) {
    var box = e.getBoundingClientRect();
    var height = box.height || (box.bottom - box.top);
    var width = box.width || (box.right - box.left);
    var viewport = getViewportSize();
	if(!height || !width){ return 0; }

	let finalReturn = 2;
	if(box.top > viewport.h || box.bottom < 0){ finalReturn = 0; }
    if(box.right < 0 || box.left > viewport.w){ finalReturn = 0; }

	if(finalReturn == 0){
		if(box.top < viewport.h + padding && box.bottom > 0 - padding){ finalReturn = 1; }
	}
	return finalReturn;
  }

  for(var i=0; i<FM.compositionContainers.length; i++){
    let inViewport = isViewportVisible(FM.compositionContainers[i], 500);
    if(inViewport == 0){ // It's not Visible at all
      FM.endCompotion(FM.compositionContainers[i]);
    }else if(inViewport == 1){ // It's Visible with padding
      FM.loadComposition(FM.compositionContainers[i]);
    }else if(inViewport == 2){ // It's entirely Visible
      FM.loadComposition(FM.compositionContainers[i]);
      FM.playComposition(FM.compositionContainers[i]);
    }
  }
}
//</endFold>

// ********************************
// -- Composition Processing ------
// ********************************
//<beginFold> loadComposition
FM.loadComposition = function(masterContainer){
  if(masterContainer.firepro_composition == undefined){
    masterContainer.firepro_composition = "wait";
    FM.buildComposition(masterContainer);
  }
}
//</endFold>

//<beginFold> playComposition
FM.playComposition = function(masterContainer){
  function loopRAF(){
    if(masterContainer.firepro_composition == undefined || masterContainer.firepro_composition == "wait"){
      window.requestAnimationFrame(loopRAF);
      return;
    }
    if(masterContainer.firepro_composition.playState == "pause"){
      masterContainer.firepro_composition.play();
    }
  }
  loopRAF();
}
//</endFold>

//<beginFold> endComposition
FM.endCompotion = function(masterContainer){
	function tryToDestroy(){
		if(masterContainer.firepro_composition != undefined){
			if(masterContainer.firepro_composition.destroy != undefined){
				masterContainer.firepro_composition.destroy();
				masterContainer.firepro_composition = undefined;
				return;
			}else{
				window.requestAnimationFrame(tryToDestroy);
			}
		}
	}
	tryToDestroy();
}
//</endFold>

// ********************************
// -- Build Composition -----------
// ********************************
//<beginFold> buildComposition
FM.buildComposition = function(masterContainer){
  // -- Extract slide data
  let compositionData = JSON.parse(masterContainer.getElementsByClassName("FirePro_Data")[0].getElementsByTagName("code")[0].innerHTML);
  let slideData = compositionData.slides[0];
  
  if(slideData.linkData != ""){
	masterContainer.onclick = function(){
		window.open(slideData.linkData); 
	}
	masterContainer.style.cursor = "pointer"; 
  }
  
  // -- Setup Each Composition Block
  let promiseAllBlocks = [];
  promiseAllBlocks.push( FM.buildSlideElements(slideData, masterContainer)   );
  promiseAllBlocks.push( FM.buildTransitionSlide(slideData, masterContainer) );

  // -- Build Transition
  Promise.all(promiseAllBlocks).then((slideComponents) => {
    FM.processHoverAnimation(masterContainer, slideData, slideComponents);
    let slideReturn = {};
    let slideElements = slideComponents[0];
    let slideTransition = slideComponents[1];
    slideReturn.playState = "pause";

    // Play Function
    slideReturn.play = function(){
      return new Promise((resolve, reject) => {
        slideReturn.playState = "play";
        masterContainer.FP_playedBefore = true;
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
          }, 1300);
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

    masterContainer.firepro_composition = slideReturn;
  });

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
    compositionElements.image = slideContainer.getElementsByClassName("FirePro_Image")[0];
    compositionElements.colorCorrection = slideContainer.getElementsByClassName("FirePro_ColorCorrection")[0];
    compositionElements.effects = slideContainer.getElementsByClassName("FirePro_Effects")[0];
    compositionElements.text = slideContainer.getElementsByClassName("FirePro_Text")[0];
    compositionElements.textReveal = slideContainer.getElementsByClassName("FirePro_TextReveal")[0];

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
        let frame = {};
        frame.canvas = compositionElements.colorCorrection;
        let packageData = { package: "Only An Image", style: "1" };
        let apiKey = firepro;
        FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

          let setup = animation.setup;

          // -- Setup The Controls
          let controls = setup.controls;

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
        FM.textAnimations.push(slideStorage);
		FM.updateText++;
		function delayRAF(){
			function delayMore(){
				FM.updateText--;
			}
			window.requestAnimationFrame(delayMore);
		}
		window.requestAnimationFrame(delayRAF);
        FM.updateCompositionText(slideStorage);

        // -- Setup Images
        let image1 = setup.image1;
        image1.src = slideStorage.elements.textImages.image1;

        let image3 = setup.image3;
        if(blockData.textReveal.package.package == null || slideContainer.FP_playedBefore == true){
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
      if(blockData.textReveal.package.package == null || slideContainer.FP_playedBefore == true){
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
    compositionElements.transition = slideContainer.getElementsByClassName("FirePro_Transition")[0];
    compositionElements.transition.classList.add("FP_hide");

    // -- Build Transition Animation
    function buildTransition(){
      if(transitionData.package.package == null || slideContainer.FP_playedBefore == true){
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

//<beginFold> updateCompositionText
FM.updateCompositionText = function(compositionStorage){
  if(compositionStorage == undefined){ return false; }
  if(compositionStorage.animations == undefined){ return false; }
  if(compositionStorage.animations.text.getPlayState() == "destroyed"){ return false; }

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

  return true;
}
//</endFold>

//<beginFold> updateTextRAFLoop
FM.textTransitionTime = performance.now();
FM.updateTextRAFLoop = function(){
  if(FM.updateText > 0 || FM.textTransitionTime > performance.now() ){
    for(var i=0; i<FM.textAnimations.length; i++){
      let stillActive = FM.updateCompositionText(FM.textAnimations[i]);
      if(!stillActive){ FM.textAnimations[i] = undefined; }
    }
  }
  window.requestAnimationFrame(FM.updateTextRAFLoop);
}
//</endFold>

// **********************************************************
// -- Hover Processing --------------------------------------
// **********************************************************
//<beginFold> processHoverAnimation
FM.processHoverAnimation = function(masterContainer, slideData, slideComponents){
  // Build Animations Arr
  let slideAnimations = slideComponents[0].storage.animations;
  // let animations = [];
  // for (const animation in slideComponents[0].storage.animations) {
  //   animations.push(slideComponents[0].storage.animations[animation]);
  // }

  // Mouse Events
  masterContainer.onmouseover = function(event) { startHover(); };
  masterContainer.onmouseout = function(event) { endHover(event, masterContainer); };

  function startHover(){

    //<beginFold> processImage
    function processImage(){
      let animationControls = slideComponents[0].storage.animations.colorCorrection.setup.image1.effects;
      let hoverControls = slideData.hoverData.image["onlyImage"];
      if(hoverControls == undefined){ return; }
      let controlArrs = hoverControls.controlArrs;
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
        if(slideAnimations[element] == undefined){ continue; }
        let animationControls = slideAnimations[element].setup.controls;
        let compositionData = slideData.blockData[element].controls;
        let packageName = slideData.blockData[element].package.package;
        if(packageName == null){ continue; }
        if(slideData.hoverData[element] == undefined){ continue; }
        let hoverControls = slideData.hoverData[element][packageName];
        if(hoverControls == undefined){ continue; }
        let controlArrs = hoverControls.controlArrs;
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
      let animationControls = slideAnimations['text'].controls;
      let compositionData = slideData.blockData['text'].controls;
      let hoverControls = slideData.hoverData.text["3ImageText"];
      if(hoverControls == undefined){ return; }
      let controlArrs = hoverControls.controlArrs;
      if(controlArrs == undefined){ return; }
      FM.updateText++;
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

  function endHover(e, masterContainer){

    //<beginFold> Prevent Mouseout On Absolute Child
    var e = event.toElement || event.relatedTarget;
    if(e == masterContainer){ return; }
    let storeElement = e;
    for(var i=0; i<10; i++){
      if(storeElement == null){ break; }
      storeElement = storeElement.parentNode;
      if(storeElement == document.body){ break; }
      if(storeElement == masterContainer){ return; }
    }
    //</endFold>

    //<beginFold> processImage
    function processImage(){
      let animationControls = slideComponents[0].storage.animations.colorCorrection.setup.image1.effects;
      let compositionData = slideData.blockData.image.effects;
      let hoverControls = slideData.hoverData.image["onlyImage"];
      let controlArrs = hoverControls.controlArrs;
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
        if(slideAnimations[element] == undefined){ continue; }
        let animationControls = slideAnimations[element].setup.controls;
        let compositionData = slideData.blockData[element].controls;
        let packageName = slideData.blockData[element].package.package;
        if(packageName == null){ continue; }
        if(slideData.hoverData[element] == undefined){ continue; }
        let hoverControls = slideData.hoverData[element][packageName];
        if(hoverControls == undefined){ continue; }
        let controlArrs = hoverControls.controlArrs;
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
      let animationControls = slideAnimations['text'].controls;
      let compositionData = slideData.blockData['text'];
      let hoverControls = slideData.hoverData.text["3ImageText"];
      if(hoverControls == undefined){ return; }
      let controlArrs = hoverControls.controlArrs;
      if(controlArrs == undefined){ return; }
      FM.updateText--;
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

// ********************************
// -- Helper Functions ------------
// ********************************
//<beginFold> guaranteedDeepCopy
FM.guaranteedDeepCopy = function(oldControls, newControls){
  for(const index1 in newControls){
    if(typeof newControls[index1] === 'object' && newControls[index1] !== null){
      let newControls2 = newControls[index1];
      for(const index2 in newControls2){
        if(typeof newControls2[index2] === 'object' && newControls2[index2] !== null){
          let newControls3 = newControls2[index2];
          for(const index3 in newControls3){
            if(typeof newControls3[index3] === 'object' && newControls3[index3] !== null){
              let newControls4 = newControls3[index3];
              for(const index4 in newControls4){
                if(typeof newControls4[index4] === 'object' && newControls4[index4] !== null){
                  let newControls5 = newControls4[index4];
                  for(const index5 in newControls5){
                    if(oldControls[index1] == undefined){ oldControls[index1] = {}; }
                    if(oldControls[index1][index2] == undefined){ oldControls[index1][index2] = {}; }
                    if(oldControls[index1][index2][index3] == undefined){ oldControls[index1][index2][index3] = {} }
                    if(oldControls[index1][index2][index3][index4] == undefined){ oldControls[index1][index2][index3][index4] = {}; }
                    if(oldControls[index1][index2][index3][index4][index5] == undefined){ oldControls[index1][index2][index3][index4][index5] = {}; }
                    oldControls[index1][index2][index3][index4][index5] = newControls5[index5];
                  }
                }else{
                  if(oldControls[index1] == undefined){ oldControls[index1] = {}; }
                  if(oldControls[index1][index2] == undefined){ oldControls[index1][index2] = {}; }
                  if(oldControls[index1][index2][index3] == undefined){ oldControls[index1][index2][index3] = {} }
                  if(oldControls[index1][index2][index3][index4] == undefined){ oldControls[index1][index2][index3][index4] = {}; }
                  oldControls[index1][index2][index3][index4] = newControls4[index4];
                }
              }
            }else{
              if(oldControls[index1] == undefined){ oldControls[index1] = {}; }
              if(oldControls[index1][index2] == undefined){ oldControls[index1][index2] = {}; }
              if(oldControls[index1][index2][index3] == undefined){ oldControls[index1][index2][index3] = {} }
              oldControls[index1][index2][index3] = newControls3[index3];
            }
          }
        }else{
          if(oldControls[index1] == undefined){ oldControls[index1] = {}; }
          if(oldControls[index1][index2] == undefined){ oldControls[index1][index2] = {}; }
          oldControls[index1][index2] = newControls2[index2];
        }
      }
    }else{
      if(oldControls[index1] == undefined){ oldControls[index1] = {}; }
      oldControls[index1] = newControls[index1];
    }
  }
}
//</endFold>

//<beginFold> deepCopy
FM.deepCopy = function(oldControls, newControls){
  // console.error("NEW DEEP COPY");
  // console.log("oldControls: ", oldControls);
  // console.log("newControls: ", newControls);
  for(const index1 in newControls){
    if(typeof newControls[index1] === 'object' && newControls[index1] !== null){
      let newControls2 = newControls[index1];
      for(const index2 in newControls2){
        if(typeof newControls2[index2] === 'object' && newControls2[index2] !== null){
          let newControls3 = newControls2[index2];
          for(const index3 in newControls3){
            if(typeof newControls3[index3] === 'object' && newControls3[index3] !== null){
              let newControls4 = newControls3[index3];
              for(const index4 in newControls4){
                if(typeof newControls4[index4] === 'object' && newControls4[index4] !== null){
                  let newControls5 = newControls4[index4];
                  for(const index5 in newControls5){
                    oldControls[index1][index2][index3][index4][index5] = newControls5[index5];
                  }
                }else{ oldControls[index1][index2][index3][index4] = newControls4[index4]; }
              }
            }else{ oldControls[index1][index2][index3] = newControls3[index3]; }
          }
        }else{ oldControls[index1][index2] = newControls2[index2]; }
      }
    }else{ oldControls[index1] = newControls[index1]; }
  }

  // for(const controlName in newControls){
  //   let newControlValues = newControls[controlName];
  //   for(const newValues in newControlValues){
  //     if(newControlValues == undefined){ continue; }
  //     if(newControlValues[newValues] == undefined){ continue; }
  //     if(oldControls[controlName] == undefined){ continue; }
  //     if(newValues.toLowerCase() == "blur"){
  //       oldControls[controlName][newValues].type = newControlValues[newValues].type;
  //       oldControls[controlName][newValues].value = newControlValues[newValues].value;
  //     }else{
  //       oldControls[controlName][newValues] = newControlValues[newValues];
  //     }
  //   }
  // }
}
//</endFold>

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

//<beginFold> Font Loader
  // *****************************************
  // -- Load All Fonts -----------------------
  // *****************************************
  //<beginFold> loadAllFonts
  FM.loadAllFonts = function(){
    for(var i=0; i<FM.fonts.length;i++){
      let fontName = FM.fonts[i];
      FM.loadFont(fontName);
    }
  }
  //</endFold>

  // *****************************************
  // -- Append a test font to the page -------
  // *****************************************
  //<beginFold> createTestFont
  FM.createTestFont = function(){
    let styleElement = document.createElement('style');
    // This Font has a special "A" Character
    styleElement.innerHTML = `
    @font-face {
      font-family: 'Firepro';
      src: url(data:font/truetype;charset=utf-8;base64,d09GRk9UVE8AAASgAAsAAAAABogAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAABDRkYgAAADIAAAAUQAAAFSzsBAiEZGVE0AAAR8AAAAGwAAAByPuhLBR0RFRgAABGQAAAAYAAAAHAAVABRPUy8yAAABZAAAAEoAAABgV7FwAWNtYXAAAALQAAAANwAAAUIADQLoaGVhZAAAAQgAAAAzAAAANhaTU99oaGVhAAABPAAAAB4AAAAkBXATa2htdHgAAASYAAAACAAAAAgkYgAcbWF4cAAAAVwAAAAGAAAABgACUABuYW1lAAABsAAAAR8AAAINzp4ugHBvc3QAAAMIAAAAFgAAACD/twA0eJxjYGRgYADi85YXi+P5bb4ycLMwgMCtKazeEJqzjkGG0ZzJkOkRkMvBwAQSBQAXdwklAHicY2BkYGB6xGjOECNkyAAETIYMjAyogAkANm0B8wAAAABQAAACAAB4nGNgETJknMDAysDANJPpDAMDQz+EZnzNYMzICRRlYAWSUMDIgAQC0lxTGBoYHBkcmY3/GzPEMD36dxKhhukRgwIQMgIAbksNbwAAeJyFjs1qwkAUhc9otGQjxU23d1NQMGESceMuCKF0KSgI3YimMRASGWPBTR+pD9Kn6SP0TBy76cKBy/3m/p0DYIAvKFzfE7RjBR9vjjt4wIfjLp7x7diDrzzHPTyq226f9RUnlefzF7ZblhWGeHHcoe674y5e8enY48yP4x5EDRz3MVQJFqhxxAUGBXIc0EAwwg5j5pjebUzIGyRUwqI+XkyRHxoZ7cYS61hPZJOwsULF3YJRIsMeEUtVUzRlticuWctxZm9LJSyz/FxuCSnV7Z7NhhNZqxpSUzBn/L96rUeYIcCUcfOItK6atDZ5JnGoZS5/6uRoFkwDa/aezzVrBif2rS/hXc2JsM3WE9aZORV1JVpHodZa7hz8BS6KTNoAeJxjYGBgZoBgGQZGBhCwAfIYwXwWBgUgzQKEIL7j//8Q8v8BqEoGRjYGGJN8QLEBAwsAfbsG9AB4nGNgZgCD/1sYjIEUIwMaAAAs0QHrAAB4nGNkYGFhYGRk5ArNK8ksyUlNMWRgZGJgZPD/wc/wQ5rxhwzTD1nmHxIsPTyMcg+ZlvznYZYLXPSfh0WOi4GzLEy/uxvO4GFf/v30j6M/y1llGObyyzAwCMgwLBCUYeCXYXQWYmAGGSrBoMig5ZxfUFmUmZ5RoqCRrKlgZGBkoKMQ6egBtx/hECBQYmBiZFSb173vR8A+xn37ZART9zHvE5MRPP1jm8w7U7Z9f5pFfwQARf8EsPP9Z3qkfr2ccfkPK9Hu7pnq/e3/GZhdJP7//7P7xX8Gy3eHQKyX/xk09qd0/2fg1EgHkhxeBv8ZGLSs/zOwzdYGsmK/rO+9dXbX2u/23/kO3+ve1707+j+DiPr1qG6Oku7S//9/39CsaK5v+x1mYO9fUObzW7i7m4NPRshQpFu0fP7Psm62bh4uAG8xe/p4nGNgZIAAHgYRBhYgzQTEjBAMAALLACp4nGNgYGBkAIJbk5i/g+kprN4QmrMOAEXNBhsAEjEAABIxABw=) format('woff');
      }
    `;
    document.getElementsByTagName("head")[0].appendChild(styleElement);

    // Built Font Containers
    let body = document.getElementsByTagName("BODY")[0];

    FM.fontTest1 = [];
    FM.fontTest2 = [];
    let container = document.createElement("div");
    container.style.fontFamily = "Firepro";
    container.style.visibility = "hidden";
    container.style.zIndex = 99999;
    container.style.position = "fixed";
    container.style.top = 0;
    container.style.left = 0;
    container.style.pointerEvents = "none";
    FM.fontTest1.push(document.createElement("span"));
    FM.fontTest2.push(document.createElement("span"));
    container.appendChild(FM.fontTest1[0]);
    container.appendChild(FM.fontTest2[0]);

    function loopRAF(){
      body = document.getElementsByTagName("BODY")[0];
      if(body == undefined){
        window.requestAnimationFrame(loopRAF);
        return;
      }
      body.appendChild(container);
    }
    loopRAF();
  }
  FM.createTestFont();
  //</endFold>

  // *****************************************
  // -- Is Font Loaded -----------------------
  // *****************************************
  //<beginFold> isFontLoaded
  FM.loadedFonts = {};
  FM.loadedFonts.arial = [-1];
  FM.isFontLoaded = function(fontName){
    FM.fontTest1[0].innerHTML = "AAAA"; // The FirePro Font Width
    FM.fontTest1[0].style.fontFamily = "Firepro";
    FM.fontTest2[0].innerHTML = "AAAA"; // The Custom Font Width
    FM.fontTest2[0].style.fontFamily = fontName + ", Firepro";
    if( Math.abs(FM.fontTest1[0].offsetWidth - FM.fontTest2[0].offsetWidth) <= 3 ){ return false; }
    return true;
  }
  //</endFold>

  // ****************************************
  // -- loadFont ----------------------------
  // ****************************************
  //<beginFold> loadFont
  FM.loadFont = function(fontName, fontWeight){
    return new Promise((resolve, reject) => {
      let lowerName = fontName.toLowerCase();
      fontWeight = 0;

      // Add The CSS Script To The Page
      function load(){
        if(FM.loadedFonts[lowerName] == undefined){
          FM.loadedFonts[lowerName] = [];
        }else{
          if(FM.loadedFonts[lowerName].includes(fontWeight) || FM.loadedFonts[lowerName].includes(-1)){
            return;
          }
        }
        let prettyName = fontName.replace(/ /g,"+");
        let head  = document.getElementsByTagName('head')[0];
        let link  = document.createElement('link');
        link.rel  = 'stylesheet';
        link.type = 'text/css';
        link.href = 'https://fonts.googleapis.com/css?family='+prettyName+':ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap';
        link.media = 'all';
        head.appendChild(link);
        FM.loadedFonts[lowerName].push(fontWeight);
      }
      load();

      function loopRAF(){
        if(FM.isFontLoaded(fontName)){
          resolve("Finished");
          return;
        }
        window.requestAnimationFrame(loopRAF);
      }
      loopRAF();

    }); // end return promise
  }
  //</endFold>

  //<beginFold> getFontCWSize
  FM.getFontCWSize = function(mainData, textData, container){
    let renderWidth = container.offsetWidth;

    let mainFontSize = mainData.fontSize;
    let mainSize = renderWidth * (mainFontSize / 100);
    let mainMaxSize = mainData.maxFontSize;
    if(mainMaxSize == ""){ mainMaxSize = 99999999; }
    if(mainSize > mainMaxSize){ mainSize = mainMaxSize; }

    let preFontSize = textData.fontSize;
    let preSize = renderWidth * (preFontSize / 100);
    let preMaxSize = textData.maxFontSize;
    if(preMaxSize == ""){ preMaxSize = 99999999; }
    if(preSize > preMaxSize){ preSize = preMaxSize; }


    let finalSize = mainSize + ((preSize - mainSize)/2);

    finalSize = finalSize + ((textData.placement.y/100) * renderWidth);
    return finalSize;
  }
  //</endFold>

//</endFold>

// -- Hover Helpers
//<beginFold> getHoverIndex
FM.getHoverIndex = function(hoverControl, controlArr){
  for(var i=0; i<controlArr.length; i++){
    let controlName = controlArr[i];
    hoverControl = hoverControl[controlName];
  }
  if(typeof hoverControl == "string"){
    if(hoverControl.startsWith("rgba")){
      hoverControl = FM.rgbaToArray(hoverControl);
    }
  }
  return hoverControl;
}
//</endFold>

//<beginFold> addArrayIfUnique
FM.addArrayIfUnique = function(parentArr, newChildArr) {
  for(var i=0; i<parentArr.length; i++){
    let childArr = parentArr[i];
    if(JSON.stringify(childArr)==JSON.stringify(newChildArr)){
      return;
    }
  }
  parentArr.push(newChildArr);
}
//</endFold>

//<beginFold> addTranistionToEffect
FM.addTranistionToEffect = function(effect, transition, controlArr){

  for(var i=0; i<controlArr.length; i++){
    let controlName = controlArr[i];
    if(i==controlArr.length-1){ // Final Pass
      effect[controlName] = transition;
    }else{
      effect = effect[controlName];
    }
  }

}
//</endFold>

//<beginFold> sanatizeTextValue
FM.sanatizeTextValue = function(data){
  if(data.timing != undefined){
    data = data.value;
  }
  if(toString.call(data) === "[object Array]"){
    data = FM.arrayToRGBA(data);
  }
  return data;
}
//</endFold>

//<beginFold> rgbaToArray
FM.rgbaToArray = function(rgb){
  rgb = rgb.substring(4, rgb.length-1)
           .replace(/ /g, '')
           .split(',');
  for(var i=0; i<rgb.length; i++){
    rgb[i] = rgb[i].replace(/^(-)|[^0-9.,]+/g, '$1');
    rgb[i] = parseFloat(rgb[i]);
  }
  return rgb;
}
//</endFold>

//<beginFold> arrayToRGBA
FM.arrayToRGBA = function(colorArr){
  return "rgba(" + colorArr[0] + ", " + colorArr[1] + ", " + colorArr[2] + ", " + colorArr[3] + ")";
}
//</endFold>
