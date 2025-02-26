// ********************************************
// -- Close The Editor ------------------------
// ********************************************
//<beginFold> closeEditor
FM.closeEditor = function(backDrop){
  // Close If user is looking at project templates
  if(FM.editorState == "projectTemplate"){
    document.getElementsByClassName("FP_compContainer")[0].remove();
    FM.editorState = "closed";
    return;
  }

  // Remove Backdrop for package errors
  if(backDrop != undefined){
    backDrop.remove();
  }

  // Verify no pro packages are used if the user is not pro
  if(!FM.parseBool(FM.proStatus)){
    FM.removeProPackages(backDrop);
  }else{
    FM.closeEditorStep2(backDrop);
  }

}
//</endFold>

//<beginFold> closeEditorStep2
FM.closeEditorStep2 = function(backDrop){
  // Change Editor AR
  FP.windowSizeChange++;
  let compPreview = document.getElementsByClassName("FP_compCompositionPreview_Preview")[0];
  let desiredAR = FM.fullCompData.aspectRatio;
  compPreview.style.width = (300 * desiredAR) + "px";
  compPreview.style.height = (300) + "px";
  compPreview.style.opacity = 0;
  compPreview.getElementsByClassName("FP_compositionPreview_Inner1")[0].style.width = "100%";

  FM.updateText = true;

  function delayRAF(){
    function delayMore(){
      FM.closeEditorDelayed(backDrop);
    }
    window.requestAnimationFrame(delayMore);
  }
  window.requestAnimationFrame(delayRAF);
}
//</endFold>

//<beginFold> closeEditorDelayed
FM.closeEditorDelayed = function(backDrop){

  // Close Editor As A Block
  if(FM.editorState == "composition" || FM.editorState == "easy"){
    var readFromCanvas = document.getElementsByClassName("FP_textReveal")[0];
    let image = FM.saveCanvasImage(readFromCanvas, readFromCanvas.width, readFromCanvas.height);
    FM.compositionData.previewImage = image;
    FM.updateCompositionGutenberg();
  }

  // Close Editor As A Transition
  if(FM.editorState == "transition"){
    FM.updateTransitionGutenberg();
  }

  FP.windowSizeChange--;
  FM.editorState = "closed";

  // Remove Window Resize Event
  window.removeEventListener('resize', FM.windowSizeChange);


  // Destory Animations
  FM.destoryAnimations();
  FM.elementState = null;
  // Rebuild Gutenberg UI
  FM.buildGutenbergUI(FM.attributes.seed, FM.attributes, FM.setAttributes);
  // Remove Editor From Dom
  let compContainer = FM.editorContainer;
  if(compContainer != undefined){ compContainer.remove(); }

}
//</endFold>

// ********************************************
// -- Remove Animations -----------------------
// ********************************************
//<beginFold> removeProPackages
FM.removeProPackages = function(backDrop){

  function testPackageForPro(packageName, updateFunction, packageLocation){
    return new Promise((resolve, reject) => {
      let response = {};
      response.packageName = packageName;
      response.updateFunction = updateFunction;
      response.packageLocation = packageLocation;
      response.pro = false;
      if(packageName == null || packageName == ""){
        resolve(response);
        return;
      }
      let apiLocation = "https://firepro.io/animations_api?package_name="+packageName;
      let request = new XMLHttpRequest();
      request.open('GET', apiLocation);
      request.onload = function () {
        if(request.responseText.trim() != "" && request.responseText != undefined){
          let animationData = JSON.parse(request.responseText);
          response.pro = FM.parseBool(animationData.pro);
          resolve(response);
          return;
        }
        resolve(response);
      }
      request.send();
    }); // end return promise
  }

  // Build Promise All to load packages
  let promiseAll = [];
  if(FM.editorState == "composition" || FM.editorState == "easy"){
    promiseAll.push(testPackageForPro(FM.compositionData.colorCorrection.package.package, "updateCompositionColorCorrection", FM.compositionData.colorCorrection));
    promiseAll.push(testPackageForPro(FM.compositionData.effects.package.package, "updateCompositionEffects", FM.compositionData.effects));
    promiseAll.push(testPackageForPro(FM.compositionData.textReveal.package.package, "updateCompositionTextReveal", FM.compositionData.textReveal));
  }
  if(FM.editorState == "transition"){
    promiseAll.push(testPackageForPro(FM.transitionData.package.package, "updateCompositionTransition", FM.transitionData));
  }

  // Find Any Pro Animations
  let promiseAll2 = [];
  Promise.all(promiseAll).then((animations) => {
    for(var i=0; i<animations.length; i++){
      if(animations[i].pro == true){
        promiseAll2.push(animations[i]);
        break;
      }
    }
    cycleOutAnimations(0);
  });


  function cycleOutAnimations(index){
    if(promiseAll2[index] != undefined){
      alertUserOfPro(promiseAll2[index]).then(function(){
        index++;
        cycleOutAnimations(index);
      })
    }else{
      FM.closeEditorStep2(backDrop);
    }
  }

  function alertUserOfPro(animation){
    return new Promise((resolve, reject) => {
      FM.outOfFree(animation.updateFunction, animation.packageName, animation.packageLocation);
    }); // end return promise
  }

}
//</endFold>

//<beginFold> destoryAnimations
FM.destoryAnimations = function(){
  for (const animation in FM.compositionStorage.animations) {
    FM.compositionStorage.animations[animation].destroy();
  }
  for (const animation in FM.compositionStorage2.animations) {
    FM.compositionStorage2.animations[animation].destroy();
  }
}
//</endFold>
