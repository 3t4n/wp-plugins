// *******************************
// -- Init FM Object -------------
// *******************************
//<beginFold> Init FM
let FM = {};
export default FM;
FM.emptyImg = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=";
FM.editorContainer = null;
FM.setAttributes = null;
FM.mediaFrame = null;
FM.mediaState = null;
FM.blockIndex = 0;
FM.blurs = ["Box", "Zoom", "Star", "Horizontal", "Vertical", "Diagnal 1", "Diagnal 2"];
FM.fonts = ["Arial", "Lato", "Teko", "Parisienne", "Unica One", "Special Elite", "Josefin Slab", "Heebo", "Pacifico", "Great Vibes", "Sacramento", "Orbitron"];
FM.easings = ["linear", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInElastic", "easeOutElastic", "easeInOutElastic"];
FM.textAnimations = ["Lift Up"];
FM.runtime = function( masterDiv, attributes, setAttributes ) {
  FP.performanceThrottle = false;
  console.log("Starting Runtime");
  FM.attributes = attributes;
  FM.setAttributes = setAttributes;
  FM.createBlockUI(masterDiv, attributes, setAttributes);
}
//</endFold>

//<beginFold> Wordpress Imports
// Wordpress Media Upload
import { Button } from '@wordpress/components';
import { MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
//</endFold>

//<beginFold> dataStorage
FM.compositionStorage = {}; // Stores Canvas Elements, Animations & Images
FM.compositionStorage2 = {}; // Stores Canvas Elements, Animations & Images (used for transitions)
FM.attributes = null; // Use this one to save, however changes are only applied on post update
FM.compositionData = null; // Stores The Current Settings Of The Composition
FM.compositionData2 = null; // Stores The Current Settings Of The Composition (used for transitions)
FM.transitionData = null; // Stores The Current Settings Of The Transition
FM.presetData = {}; // Stores the default values & styles of a package (also stores what a user changes them to)
FM.hoverData = {}; // Stores the values of hover settings for the composition
FM.controlGroupData = {}; // This stores which control groups have been opened in the control tab
FM.controlData = {}; // This stores the full controls of a package, ie (min, max, type, ect..)
FM.fullCompData = {}; // This stores a copy of all the slides and global data of a composition
//</endFold>

//<beginFold> proManagment
FM.proStatus = firepro_status;
FM.checkProStatus = function(){
  let request = new XMLHttpRequest();
  request.open('GET', "https://cdn.firepro.io/api-processing/verify-api.php?apiKey=" + firepro);
  request.onload = function () {
    if(request.responseText.trim() != "" && request.responseText != undefined){
      let animationData = JSON.parse(request.responseText);
      FM.proStatus = FM.parseBool(animationData.pro);
    }
  }
  request.send();
}
FM.checkProStatus();
//</endFold>

//<beginFold> stateManagment
// easy is simple editor
// composition is advanced edtior
// transition is transition editor
// closed is nothing up (ie default gutenbergUI)
// projectTemplate is the template manager
FM.editorState = null; // easy, composition, transition, closed, projectTemplate
FM.elementState = null;
FM.textPreset = null;
FM.editingEffects = false;
FM.editingTextReveal = false;
FM.editingColorCorrection = false;
FM.editingTransition = false;
FM.loadedTemplateCSS = false;
//</endFold>

//<beginFold> windowSize Managment
FM.windowSizeTime = Date.now();
setTimeout(function(){
  FM.windowSizeTime = Date.now();
}, 3000);

FM.updateCompositionAR = function(){} // Just an init, actual function will be declared when comp is built

FM.rtime;
FM.windowResizeTimeout = false;
FM.resizeTime = 100;
FM.resizeend = function() {
    if (new Date() - FM.rtime < FM.resizeTime) {
        setTimeout(FM.resizeend, FM.resizeTime);
    } else {
        FM.windowResizeTimeout = false;
        if(FM.editorState == "composition" || FM.editorState == "transition" || FM.editorState == "easy"){
          FP.windowSizeChange++;
          function delayRAF(){
            FM.updateCompositionText();
            FM.updateCompositionAR();
            setTimeout(function(){ FP.windowSizeChange--; }, 200);
          }
          window.requestAnimationFrame(delayRAF);
        }
    }
}

FM.windowSizeChange = function() {
  FM.windowSizeTime = Date.now();
  // Throttle Resize Event
  FM.rtime = new Date();
  if (FM.windowResizeTimeout === false) {
      FM.windowResizeTimeout = true;
      setTimeout(FM.resizeend, FM.resizeTime);
  }
}
window.addEventListener('resize', FM.windowSizeChange);
//</endFold>

FM.language = {};
// Gutenberg UI
FM.language["EditComposition"] = "Edit Composition";
FM.language["NewBlock"] = "Add a new slide";

//<beginFold> Gutenberg Start
FM.language["ImportProject"] = "Use A Project Template";
FM.language["Or"] = "Or";
FM.language["NewProject"] = "Start From Scratch";
//</endFold>

//<beginFold> Main Menu (save/ease/aspectRatio/preview)
FM.language["PreviewVideo"] = "Preview Video";
FM.language["AspectRatio"] = "Aspect Ratio";
FM.language["EasyEditor"] = "Easy Editor";
FM.language["AdvancedEditor"] = "Advanced Editor";
FM.language["SaveProject"] = "Save Template";
//</endFold>

//<beginFold> Slide Menu Settings
FM.language["SlideDurationOption"] = "Set Slide Duration";
FM.language["SlideLinkOption"] = "Set Slide URL Link";
FM.language["SlideRemoveOption"] = "Remove Slide";
FM.language["SlideCloneOption"] = "Clone Slide";
FM.language["SlideDurationDescription"] = "Slide Duration in seconds (0 means infinity): ";
FM.language["EnableUserSlideControls"] = "Allow the user to skip to the next slide: ";
FM.language["SaveDuration"] = "Save Settings";
FM.language["ApplyLink"] = "Save Link";
FM.language["RemoveLink"] = "Remove Link";
FM.language["Yes"] = "Yes";
FM.language["No"] = "No";
FM.language["RemoveBlockConfirmation"] = "Are you sure you want to remove this slide?";
FM.language["SlideURL"] = "Enter a link the user will go to when they click on this slide (leave blank if you don't want a link).";
//</endFold>

//<beginFold> Title Bar
FM.language["Title1"] = "Setup";
FM.language["Title2"] = "Slide Preview";
FM.language["Title3"] = "Configuration";
FM.language["Title4"] = "Transition Preview";
//</endFold>

//<beginFold> Element Bar
FM.language["Element1"] = "Background Image";
FM.language["Element2"] = "Color Changer";
FM.language["Element3"] = "Effects";
FM.language["Element4"] = "Text";
FM.language["Element5"] = "Text Reveal";
FM.language["Element6"] = "Add a Transition";
//</endFold>

//<beginFold> UI Controls
FM.language["activateHover"] = "Hover Controls";
FM.language["disableHover"] = "Hover Controls";
FM.language["hoverAniTime"] = "Hover Duration (seconds)";
FM.language["valueOnHover"] = "New Value On Hover";
FM.language["hoverEasing"] = "Animation Easing";
//</endFold>

//<beginFold> Template Manager
FM.language["TemplateManager"] = "Template Manager";
FM.language["MyTemplates"] = "My Templates";
FM.language["FireProTemplates"] = "FirePro Templates";
//</endFold>

// **********************************************
// -- Package/Configuration Controls ------------
// **********************************************
//<beginFold> Image Controls
// -- Control Tabs
FM.language["ImageTab1"] = "Select Image";
FM.language["ImageTab2"] = "Customize";
FM.language["ImageTab3"] = "Fit";
// -- Select Image
FM.language["AddImage"] = "Add Image";
FM.language["ReplaceImage"] = "Replace Image";
// -- Image Fit
FM.language["ImageFit"] = "Image Fit";
// -- Color Correction
FM.language["BlurSize"] = "Blur Size";
FM.language["BlurType"] = "Blur Type";
FM.language["Bloom"] = "Bloom";
FM.language["Brightness"] = "Brightness";
FM.language["Contrast"] = "Contrast";
FM.language["Hue"] = "Hue";
FM.language["Saturation"] = "Saturation";
//</endFold>

//<beginFold> Color Correction
// -- Control Tabs
FM.language["ColorCorrectionTab1"] = "Color Effect";
FM.language["ColorCorrectionTab2"] = "Controls";
FM.language["ColorCorrectionTab3"] = "Style";
// -- Package Controls
FM.language["noControls"] = "No Available Controls";
// -- Style Section
FM.language["noStyles"] = "No Available Styles";
//</endFold>

//<beginFold> Effect Controls
// -- Control Tabs
FM.language["EffectsTab1"] = "Effect";
FM.language["EffectsTab2"] = "Controls";
FM.language["EffectsTab3"] = "Style";
// -- Package Selection
FM.language["noEffect"] = "No Effect";
FM.language["proEffect"] = "Pro Effect";
// -- Package Controls
FM.language["noControls"] = "No Available Controls";
// -- Style Section
FM.language["noStyles"] = "No Available Styles";
//</endFold>

//<beginFold> Text Controls
// -- Drag Menu
FM.language["ToggleTextDragMenu"] = "Text Controls";
// -- Control Tabs
FM.language["TextTab1"] = "Main Text";
FM.language["TextTab2"] = "Pre Text";
FM.language["TextTab3"] = "Sub Text";
// -- Main Text
FM.language["mainTextCGValue"] = "Text Value";
FM.language["mainTextPlaceHolder"] = "Your Text Here...";
FM.language["mainTextCGPlacement"] = "Text Size & Position";
FM.language["mainTextXAlignLable"] = "Horizontal Alignment";
FM.language["mainTextXLable"] = "Horizontal Position";
FM.language["mainTextYAlignLable"] = "Vertical Alignment";
FM.language["mainTextYLable"] = "Vertical Position";
FM.language["mainTextCGFont"] = "Font Style & Color";
FM.language["mainTextFontFamilyLable"] = "Font Family";
FM.language["mainTextFontWeightLable"] = "Font Weight";
FM.language["mainTextFontStyleLable"] = "Font Style";
FM.language["mainTextFontSizeLable"] = "Font Size %";
FM.language["mainTextMaxFontSizeLable"] = "Max Font Size (px)";
FM.language["mainTextLetterSpacingLable"] = "Letter Spacing";
FM.language["mainTextFontColorLable"] = "Font Color";
FM.language["mainTextCGFontImage"] = "Image Overlay";
FM.language["mainTextFontImageLable"] = "Image";
FM.language["mainTextFontImageOpacityLable"] = "Image Opacity";
FM.language["mainTextFontImageBlurTypeLable"] = "Blur Type";
FM.language["mainTextFontImageBlurSizeLable"] = "Blur Size";
FM.language["mainTextFontImageBloomLable"] = "Bloom";
FM.language["mainTextFontImageBrightnessLable"] = "Brightness";
FM.language["mainTextFontImageContrastLable"] = "Contrast";
FM.language["mainTextFontImageHueLable"] = "Hue";
FM.language["mainTextFontImageSaturationLable"] = "Saturation";
FM.language["mainTextFontImageScaleLable"] = "Image Scale";
FM.language["mainTextFontImageHorizontalPositionLable"] = "Horiztonal Position";
FM.language["mainTextFontImageVerticalPositionLable"] = "Vertical Position";
// -- Stroke
FM.language["mainTextCGStroke"] = "Text Stroke";
FM.language["mainTextCGStrokeWidthLabel"] = "Stroke Width";
FM.language["mainTextCGStrokeColorLabel"] = "Stroke Color";
// -- Shadow
FM.language["mainTextCGShadow"] = "Text Shadow";
FM.language["mainTextCGShadowWidthLabel"] = "Shadow Width";
FM.language["mainTextCGShadowColorLabel"] = "Shadow Color";
// -- Background
FM.language["mainTextCGBackground"] = "Text Background";
FM.language["mainTextBackgroundXSizeLabel"] = "Background Horizontal Size";
FM.language["mainTextBackgroundYSizeLabel"] = "Background Vertical Size";
FM.language["mainTextBackgroundXOffsetLabel"] = "Background Horizontal Position";
FM.language["mainTextBackgroundYOffsetLabel"] = "Background Vertical Position";
FM.language["mainTextBackgroundColorLabel"] = "Background Color";
// -- Border
FM.language["mainTextCGBorder"] = "Text Border";
FM.language["mainTextCGBorderStyleLabel"] = "Border Style";
FM.language["mainTextCGBorderWidthLabel"] = "Border Width";
FM.language["mainTextCGBorderColorLabel"] = "Border Color";
// -- Animation
FM.language["mainTextCGAnimations"] = "Animation";
FM.language["mainTextAnimationNameLabel"] = "Animation Name";
FM.language["mainTextAnimationTargetsLabel"] = "Apply Animation To";
FM.language["mainTextAnimationProgressLabel"] = "Animation Progress";
// -- Alignment
FM.language["AlignLeft"] = "Align Text Left";
FM.language["AlignCenter"] = "Align Text Center";
FM.language["AlignRight"] = "Align Text Right";
//</endFold>

//<beginFold> Text Reveal Controls
// -- Control Tabs
FM.language["TextRevealTab1"] = "Effect";
FM.language["TextRevealTab2"] = "Controls";
FM.language["TextRevealTab3"] = "Style";
// -- Package Selection
FM.language["noEffect"] = "No Effect";
FM.language["proEffect"] = "Pro Effect";
// -- Package Controls
FM.language["noControls"] = "No Available Controls";
// -- Style Section
FM.language["noStyles"] = "No Available Styles";
//</endFold>

//<beginFold> Transition Controls
// -- Control Tabs
FM.language["TransitionsTab1"] = "Effect";
FM.language["TransitionsTab2"] = "Controls";
FM.language["TransitionsTab3"] = "Style";
// -- Package Selection
FM.language["noTransition"] = "No Transition";
FM.language["proTransition"] = "Pro Transition";
//</endFold>


// *******************************
// -- Gutenberg UI ----------------
// *******************************
// ******************************************************
// -- Gutenberg Starting Point --------------------------
// ******************************************************
//<beginFold> createBlockUI
FM.createBlockUI = function(masterDiv, attributes, setAttributes){
  FM.buildGutenbergUI(attributes.seed, attributes, setAttributes);
}
//</endFold>

//<beginFold> buildGutenbergUI
FM.buildGutenbergUI = function(seed, attributes, setAttributes){
  let compositionData = JSON.parse(window.FireTrack[seed].compositionData);
  let slides = compositionData.slides;

  // Allow For Template Import
  if(slides.length == 0){
    FM.buildGutenbergUIStart(seed, attributes, setAttributes);
    return;
  }

  if(compositionData.editorType == "easy"){
    FM.buildEasyGutenbergUI(seed, attributes, setAttributes);
    return;
  }
  if(compositionData.editorType == "advanced"){
    FM.buildAdvancedGutenbergUI(seed, attributes, setAttributes);
    return;
  }

}
//</endFold>

//<beginFold> buildGutenbergUIStart
FM.buildGutenbergUIStart = function(seed, attributes, setAttributes){

  // Extract Master Container
  let masterDiv = document.getElementById(seed);
  masterDiv.innerHTML = "";

  // Outter Contianer
  let templateOptionContainer = document.createElement('div');
  templateOptionContainer.classList.add("FM_templateOptionContainer");

  // Inner Container
  let templateOptionInnerContainer = document.createElement('div');
  templateOptionInnerContainer.classList.add("FM_templateOptionInnerContainer");
  templateOptionContainer.appendChild(templateOptionInnerContainer);

  // Logo
  let logo = document.createElement("div");
  logo.style.position = "absolute";
  logo.classList.add("FP_compTopBar_Logo");
  templateOptionInnerContainer.appendChild(logo);

  let importExisting = document.createElement('div');
  importExisting.classList.add("FM_templateSelectorButton");
  importExisting.onclick = function(){
    FM.editorState = "projectTemplate";
    FM.showProjectTemplates(seed, attributes, setAttributes);
    // let updatedCompData = JSON.parse(window.FireTrack[seed].compositionData);
    // updatedCompData.editorType = "easy";
    // window.FireTrack[seed].compositionData = JSON.stringify(updatedCompData);
    // FM.addNewBlock(seed, attributes, setAttributes);
  }
  importExisting.innerHTML = FM.language["ImportProject"];
  templateOptionInnerContainer.appendChild(importExisting);

  let orOption = document.createElement('div');
  orOption.classList.add("FM_templateSelectorDivider");
  orOption.innerHTML = FM.language["Or"];
  templateOptionInnerContainer.appendChild(orOption);

  let createCustomStory = document.createElement('div');
  createCustomStory.classList.add("FM_templateSelectorButton");
  createCustomStory.innerHTML = FM.language["NewProject"];
  createCustomStory.onclick = function(){
    let updatedCompData = JSON.parse(window.FireTrack[seed].compositionData);
    updatedCompData.editorType = "advanced";
    window.FireTrack[seed].compositionData = JSON.stringify(updatedCompData);
    FM.addNewBlock(seed, attributes, setAttributes);
  }
  templateOptionInnerContainer.appendChild(createCustomStory);

  masterDiv.appendChild(templateOptionContainer);
  return;
}
//</endFold>

// ******************************************************
// -- GutenbergUI Editors -------------------------------
// ******************************************************
//<beginFold> buildGutenbergEditorMenu
FM.buildGutenbergEditorMenu = function(seed, attributes, setAttributes){
  // Extract CompositionData
  let compositionData = JSON.parse(window.FireTrack[seed].compositionData);

  // Build Main Container
  let menuContainer = document.createElement('div');
  menuContainer.classList.add('FM_storyBoardMenuContainer');

  //<beginFold> File Item
  let fileItem = document.createElement('div');
  fileItem.classList.add('FM_storyBoardMenuItem');
  fileItem.classList.add("--borderRight");
  let fileItemHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M15,9H5V5H15M12,19A3,3 0 0,1 9,16A3,3 0 0,1 12,13A3,3 0 0,1 15,16A3,3 0 0,1 12,19M17,3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V7L17,3Z" /></svg>';
  fileItemHTML += "<br>" + FM.language["SaveProject"];
  fileItem.onclick = function(){
    document.addEventListener('click', listenToFileItem);
  }
  fileItem.innerHTML = fileItemHTML;
  function listenToFileItem(event){
    if(event.path[0] == fileItemUIContainer){ return; }
    if(event.path[1] == fileItemUIContainer){ return; }
    if(event.path[2] == fileItemUIContainer){ return; }
    if(event.path[3] == fileItemUIContainer){ return; }
    if(event.path[4] == fileItemUIContainer){ return; }
    if(event.path[5] == fileItemUIContainer){ return; }
    if(fileItemUIContainer.classList.contains("--hide")){
      fileItemUIContainer.classList.remove("--hide");
      return;
    }
    document.removeEventListener("click", listenToFileItem);
    fileItemUIContainer.classList.add("--hide");
  }


  // File Input
  let fileItemUIContainer = document.createElement('div');
  fileItemUIContainer.classList.add("FM_fileItemUIContainer");
  fileItemUIContainer.classList.add("--hide");

  let fileItemDescription = document.createElement('div');
  fileItemDescription.classList.add("FM_fileItemDescription");
  fileItemDescription.innerHTML = "Enter a template name:"
  fileItemUIContainer.appendChild(fileItemDescription);

  let fileItemName = document.createElement('input');
  fileItemName.classList.add("FM_fileItemInput");
  fileItemName.setAttribute("type", "text");
  fileItemUIContainer.appendChild(fileItemName);

  let fileItemSave = document.createElement('div');
  fileItemSave.classList.add("FM_fileItemSave");
  fileItemSave.innerHTML = "Save"
  fileItemSave.onclick = function(){

    function tryToSave(bypass){
      FM.saveTemplate( fileItemName.value, window.FireTrack[seed].compositionData, bypass ).then(function(resolved){
        alert("Template Saved Succesfully");
        listenToFileItem({path: []});
      }).catch(function(rejected){
        var r = confirm("There is already a template with this name, overwrite it?");
        if (r == true) {
          tryToSave(true);
        }
      });
    }
    tryToSave();

  }
  fileItemUIContainer.appendChild(fileItemSave);

  menuContainer.appendChild(fileItemUIContainer);

  menuContainer.appendChild(fileItem);
  //</endFold>

  //<beginFold> Easy Adavanced Item
  if(compositionData.editorType == "easy"){
    let easyAdvancedItem = document.createElement('div');
    easyAdvancedItem.classList.add('FM_storyBoardMenuItem');
    easyAdvancedItem.classList.add("--borderRight");
    easyAdvancedItem.onclick = function(){
      let updatedCompData = JSON.parse(window.FireTrack[seed].compositionData);
      updatedCompData.editorType = "advanced";
      window.FireTrack[seed].compositionData = JSON.stringify(updatedCompData);
      FM.buildGutenbergUI(seed, attributes, setAttributes);
     }
    let easyAdvancedItemHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17,10.5V7A1,1 0 0,0 16,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16A1,1 0 0,0 17,17V13.5L21,17.5V6.5L17,10.5M14,13H11V16H9V13H6V11H9V8H11V11H14V13Z" /></svg>';
    easyAdvancedItemHTML += "<br>" + FM.language["AdvancedEditor"];
    easyAdvancedItem.innerHTML = easyAdvancedItemHTML;
    menuContainer.appendChild(easyAdvancedItem);
  }
  if(compositionData.editorType == "advanced"){
    let easyAdvancedItem = document.createElement('div');
    easyAdvancedItem.classList.add('FM_storyBoardMenuItem');
    easyAdvancedItem.classList.add("--borderRight");
    easyAdvancedItem.onclick = function(){
      let updatedCompData = JSON.parse(window.FireTrack[seed].compositionData);
      updatedCompData.editorType = "easy";
      window.FireTrack[seed].compositionData = JSON.stringify(updatedCompData);
      FM.buildGutenbergUI(seed, attributes, setAttributes);
     }
    let easyAdvancedItemHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17,10.5V7A1,1 0 0,0 16,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16A1,1 0 0,0 17,17V13.5L21,17.5V6.5L17,10.5M14,13H6V11H14V13Z" /></svg>';
    easyAdvancedItemHTML += "<br>" + FM.language["EasyEditor"];
    easyAdvancedItem.innerHTML = easyAdvancedItemHTML;
    menuContainer.appendChild(easyAdvancedItem);
  }
  //</endFold>

  //<beginFold> Aspect Ratio Item
  let aspectRatioItem = document.createElement('div');
  aspectRatioItem.classList.add('FM_storyBoardMenuItem');
  aspectRatioItem.classList.add("--borderRight");
  // Aspect Ratio Menu Setup
  let aspectRatioItemHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M19,12H17V15H14V17H19V12M7,9H10V7H5V12H7V9M21,3H3A2,2 0 0,0 1,5V19A2,2 0 0,0 3,21H21A2,2 0 0,0 23,19V5A2,2 0 0,0 21,3M21,19H3V5H21V19Z" /></svg>';
  aspectRatioItemHTML += "<br>" + FM.language["AspectRatio"];
  aspectRatioItem.innerHTML = aspectRatioItemHTML;
  // Create AR Holder (Holds AR Options)
  let arHolder = document.createElement('div');
  arHolder.classList.add("FM_arHolder");
  arHolder.classList.add("--hide");
  // Flex Items
  let arFlexHolder = document.createElement('div');
  arFlexHolder.classList.add("FM_arFlexHolder");
  arHolder.appendChild(arFlexHolder);
  let targetARs = [
    {width: 9, height: 16, description: "Mobile Screen"},
    {width: 3, height: 4, description: "Narrow"},
    {width: 1, height: 1, description: "Square"},
    {width: 16, height: 9, description: "Wide Screen"}
  ];
  let arItemArr = [];
  for(var ta = 0; ta<targetARs.length; ta++){
    let targetAR = targetARs[ta];
    let arItem = document.createElement('div');
    arItem.classList.add("FM_arItem");
    arItem.FM_AR = targetAR.width/targetAR.height;
    if(ta+1 != targetARs.length){ arItem.classList.add("--borderRight"); }
    if(FM.withinRange(compositionData.aspectRatio, targetAR.width/targetAR.height, 0.1)){ arItem.classList.add("--active"); }
    arItem.innerHTML = "<span>"+targetAR.width+":"+targetAR.height+" <br> ("+targetAR.description+")</span>";
    arFlexHolder.appendChild(arItem);
    arItemArr.push(arItem);
    arItem.onclick = function(){
      for(var x=0; x<arItemArr.length; x++){
        arItemArr[x].classList.remove("--active");
      }
      arItem.classList.add("--active");
    }
  }
  // Apply Button
  let applyAR = document.createElement('div');
  applyAR.classList.add("FM_applyButton");
  applyAR.innerHTML = "Apply Aspect Ratio";
  applyAR.onclick = function(){
    for(var x=0; x<arItemArr.length; x++){
      if(arItemArr[x].classList.contains("--active")){
        let newCompData = JSON.parse(window.FireTrack[seed].compositionData);
        newCompData.aspectRatio = arItemArr[x].FM_AR;
        window.FireTrack[seed].compositionData = JSON.stringify(newCompData);
      }
    }
    document.removeEventListener("click", listenToHideARHolder);
    FM.rebuildThumbnails(seed, attributes, setAttributes).then(function(){
      FM.buildGutenbergUI(seed, attributes, setAttributes);
    })
  }
  arHolder.appendChild(applyAR);
  // On Menu Click
  aspectRatioItem.onclick = function(){
    document.addEventListener("click", listenToHideARHolder);
  }
  function listenToHideARHolder(event){
    if(event.path[0] == arHolder){ return; }
    if(event.path[1] == arHolder){ return; }
    if(event.path[2] == arHolder){ return; }
    if(event.path[3] == arHolder){ return; }
    if(event.path[4] == arHolder){ return; }
    if(event.path[5] == arHolder){ return; }
    if(arHolder.classList.contains("--hide")){
      arHolder.classList.remove("--hide");
      return;
    }
    document.removeEventListener("click", listenToHideARHolder);
    arHolder.classList.add("--hide");
  }
  aspectRatioItem.appendChild(arHolder);
  // Final Append
  menuContainer.appendChild(aspectRatioItem);
  //</endFold>

  //<beginFold> Preview Composition
  let previewAllItem = document.createElement('div');
  previewAllItem.classList.add('FM_storyBoardMenuItem');
  let previewAllItemHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M21,3H3C1.89,3 1,3.89 1,5V17A2,2 0 0,0 3,19H8V21H16V19H21A2,2 0 0,0 23,17V5C23,3.89 22.1,3 21,3M21,17H3V5H21M16,11L9,15V7" /></svg>';
  previewAllItemHTML += "<br>" + FM.language["PreviewVideo"];
  previewAllItem.innerHTML = previewAllItemHTML;
  previewAllItem.onclick = function(){
    FM.openCompleteEditor(seed, attributes, setAttributes);
  }
  menuContainer.appendChild(previewAllItem);
  //</endFold>

  // Return Container
  return menuContainer;
}
//</endFold>

//<beginFold> buildEasyGutenbergUI
FM.buildEasyGutenbergUI = function(seed, attributes, setAttributes){
  let compositionData = JSON.parse(window.FireTrack[seed].compositionData);
  let slides = compositionData.slides;

  // Extract Master Container
  let masterDiv = document.getElementById(seed);
  masterDiv.innerHTML = "";

  // Append Menu
  masterDiv.appendChild( FM.buildGutenbergEditorMenu(seed, attributes, setAttributes) );

  // Create Slides
  for(var i=0; i<slides.length; i++){
    let storeIndex = i;
    // Build StoryBoard Container
    let storyBoardContainer = document.createElement('div');
    storyBoardContainer.classList.add('FM_storyBoardContainer');
    // Create Story Controls
    let storyControlsContainer = document.createElement('div');
    storyControlsContainer.classList.add('FM_storyControlsContainer');

    //<beginFold> Menu Control
    let menuLevel = -1;
    let menuControl = document.createElement('div');
    menuControl.classList.add('FM_storyBoardControl');
    menuControl.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /></svg>';
    menuControl.onclick = function(){
      slideURLLink();
    }
    //</endFold>

    //<beginFold> Slide Up Control
    let slideUpControl = document.createElement('div');
    slideUpControl.classList.add('FM_storyBoardControl');
    slideUpControl.classList.add("--bottom1");
    if(slides.length == 1 || i == 0){
      slideUpControl.classList.add("--hide");
    }
    slideUpControl.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg>';
    slideUpControl.onclick = function(){ FM.reorderBlock(seed, attributes, setAttributes, storeIndex, -1); }
    //</endFold>

    //<beginFold> Slide Down Control
    let slideDownControl = document.createElement('div');
    slideDownControl.classList.add('FM_storyBoardControl');
    slideDownControl.classList.add("--bottom2");
    if(slides.length == 1 || i == slides.length-1){
      slideDownControl.classList.add("--hide");
    }
    slideDownControl.style.transform = "rotate(180deg)";
    slideDownControl.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg>';
    slideDownControl.onclick = function(){ FM.reorderBlock(seed, attributes, setAttributes, storeIndex, 1); }
    //</endFold>

    //<beginFold> Menu Functions

      //<beginFold> openMenu
      function openMenu(){
        if(menuLevel == 0){ closeMenu(); return; }
        let menuOptionsContainer;
        if(menuLevel == 1){
          menuOptionsContainer = document.getElementsByClassName("FM_linkInputContainer")[0];
          menuOptionsContainer.innerHTML = "";
        }else{
          menuOptionsContainer = document.createElement('div');
          menuOptionsContainer.classList.add("FM_linkInputContainer");
        }
        menuLevel = 0;
        // Menu Title
        let menuTitle = document.createElement('div');
        menuTitle.classList.add("FM_menuTitle");
        menuTitle.innerHTML = "Slide Controls";
        menuOptionsContainer.appendChild(menuTitle);

        // Menu Options
        let menuOptions = document.createElement('ul');
        menuOptions.classList.add("FM_menuOptions");

        let slideDurationOption = document.createElement('li');
        slideDurationOption.classList.add("FM_menuOption");
        slideDurationOption.innerHTML = "<span>1: </span>" + FM.language["SlideDurationOption"];
        slideDurationOption.onclick = function(){ setupSlideDuration(); }
        menuOptions.appendChild(slideDurationOption);

        let slideLinkOption = document.createElement('li');
        slideLinkOption.classList.add("FM_menuOption");
        slideLinkOption.innerHTML = "<span>2: </span>" + FM.language["SlideLinkOption"];
        slideLinkOption.onclick = function(){ slideURLLink(); }
        menuOptions.appendChild(slideLinkOption);

        let cloneSlideOption = document.createElement('li');
        cloneSlideOption.classList.add("FM_menuOption");
        cloneSlideOption.innerHTML = "<span>3: </span>" + FM.language["SlideCloneOption"] ;
        cloneSlideOption.onclick = function(){ cloneSlide(); }
        menuOptions.appendChild(cloneSlideOption);

        let removeSlideOption = document.createElement('li');
        removeSlideOption.classList.add("FM_menuOption");
        removeSlideOption.innerHTML = "<span>4: </span>" + FM.language["SlideRemoveOption"];
        removeSlideOption.onclick = function(){ removeBlock(); }
        menuOptions.appendChild(removeSlideOption);

        menuOptionsContainer.appendChild(menuOptions);
        storyBoardContainer.appendChild(menuOptionsContainer);
      }
      //</endFold>

      //<beginFold> closeMenu
      function closeMenu(){
        let menu = document.getElementsByClassName("FM_linkInputContainer")[0];
        menu.parentNode.removeChild(menu);
        menuLevel = -1;
      }
      //</endFold>

      //<beginFold> setupSlideDuration
      function setupSlideDuration(){
        menuLevel = 1;
        let mainContainer = document.getElementsByClassName("FM_linkInputContainer")[0];
        mainContainer.innerHTML = "";
        let durationData = slides[storeIndex].durationData;
        // Duration Input
        let durationDescription = document.createElement("span");
        durationDescription.innerHTML = FM.language["SlideDurationDescription"];
        durationDescription.style.marginBottom = "11px";
        mainContainer.appendChild(durationDescription);
        let durationInput = document.createElement("INPUT");
        durationInput.setAttribute("type", "text");
        durationInput.value = durationData.duration;
        durationInput.style.fontSize = 18+"px";
        durationInput.classList.add("FM_textInput");
        mainContainer.appendChild(durationInput);
        // Break
        // let lineBreak = document.createElement("div");
        // lineBreak.classList.add("FM_lineBreak");
        // mainContainer.appendChild(lineBreak);
        // Controls Option
        // let controlsDescription = document.createElement("span");
        // controlsDescription.innerHTML = FM.language["EnableUserSlideControls"];
        // mainContainer.appendChild(controlsDescription);
        // var controlsInput = document.createElement("INPUT");
        // controlsInput.setAttribute("type", "checkbox");
        // controlsInput.checked = durationData.controls;
        // controlsInput.classList.add("FM_checkBox");
        // mainContainer.appendChild(controlsInput);
        // Break
        let lineBreak2 = document.createElement("div");
        lineBreak2.classList.add("FM_lineBreak");
        mainContainer.appendChild(lineBreak2);
        // Save Button
        let confirmContainer = document.createElement('div');
        confirmContainer.classList.add("FM_linkConfirmContainer");
        let saveButton = document.createElement('div');
        saveButton.classList.add("FM_linkConfirm");
        saveButton.onclick = function(){
          // durationData.controls = controlsInput.checked;
          durationData.duration = durationInput.value.trim();
          openMenu();
        }
        saveButton.innerHTML = FM.language["SaveDuration"];
        confirmContainer.appendChild(saveButton);
        mainContainer.appendChild(confirmContainer);

      }
      //</endFold>

      //<beginFold> slideURLLink
      function slideURLLink(){
        if(menuLevel == 0){ closeMenu(); return; }
        menuLevel = 0;

        let linkInputContainer;
        linkInputContainer = document.createElement('div');
        linkInputContainer.classList.add("FM_linkInputContainer");
        storyBoardContainer.appendChild(linkInputContainer);

        // let linkInputContainer = document.getElementsByClassName("FM_linkInputContainer")[0];
        linkInputContainer.innerHTML = "";
        let linkInputDescription = document.createElement('div');
        linkInputDescription.style.fontSize = "20px";
        linkInputDescription.style.lineHeight = "1.5";
        linkInputDescription.style.marginBottom = "11px";
        linkInputDescription.innerHTML = FM.language["SlideURL"];
        linkInputContainer.appendChild(linkInputDescription);
        let linkInput = document.createElement('input');
        linkInput.value = slides[storeIndex].linkData;
        linkInput.classList.add("FM_textInput");
        linkInput.classList.add("FM_linkInput");
        linkInputContainer.appendChild(linkInput);
        let confirmContainer = document.createElement('div');
        confirmContainer.classList.add("FM_linkConfirmContainer");
        let confirmButton = document.createElement('div');
        confirmButton.classList.add("FM_linkConfirm");
        confirmButton.onclick = function(){
          let parsedCompData = JSON.parse(window.FireTrack[seed].compositionData);
          parsedCompData.slides[storeIndex].linkData = linkInput.value.trim();
          slides[storeIndex].linkData = linkInput.value.trim();
          window.FireTrack[seed].compositionData = JSON.stringify(parsedCompData);
          closeMenu();
        }
        confirmButton.innerHTML = FM.language["ApplyLink"];
        confirmContainer.appendChild(confirmButton);
        linkInputContainer.appendChild(confirmContainer);
      }
      //</endFold>

      //<beginFold> cloneSlide
      function cloneSlide(){
        FM.cloneSlide(seed, attributes, setAttributes, storeIndex);
      }
      //</endFold>

      //<beginFold> removeBlock
      function removeBlock(){
        menuLevel = 1;
        let linkInputContainer = document.getElementsByClassName("FM_linkInputContainer")[0];
        linkInputContainer.innerHTML = "";
        let linkInputDescription = document.createElement('div');
        linkInputDescription.style.marginBottom = "24px";
        linkInputDescription.innerHTML = FM.language["RemoveBlockConfirmation"];
        linkInputContainer.appendChild(linkInputDescription);
        let confirmContainer = document.createElement('div');
        confirmContainer.classList.add("FM_linkConfirmContainer");
        let confirmButton = document.createElement('div');
        confirmButton.classList.add("FM_linkConfirm");
        confirmButton.onclick = function(){
          FM.removeBlock(seed, attributes, setAttributes, storeIndex);
        }
        confirmButton.innerHTML = FM.language["Yes"];
        confirmContainer.appendChild(confirmButton);
        let cancelButton = document.createElement('div');
        cancelButton.classList.add("FM_linkConfirm");
        cancelButton.onclick = function(){
          openMenu();
        }
        cancelButton.innerHTML = FM.language["No"];
        confirmContainer.appendChild(cancelButton);
        linkInputContainer.appendChild(confirmContainer);
      }
      //</endFold>

    //</endFold>

    storyControlsContainer.appendChild(menuControl);
    storyControlsContainer.appendChild(slideUpControl);
    storyControlsContainer.appendChild(slideDownControl);
    storyBoardContainer.appendChild(storyControlsContainer);

    //<beginFold> Create Image
    let imageContainer = document.createElement('div');
    imageContainer.classList.add('FM_storyBoardImageContainer');
    let aspectRatio = 1/compositionData.aspectRatio;
    if(aspectRatio * 500 >= 330){
      imageContainer.style.width = (330 * compositionData.aspectRatio) + "px";
    }
    let imageInnerContainer = document.createElement('div');
    imageInnerContainer.classList.add('FM_storyBoardImageInnerContainer');
    imageInnerContainer.style.paddingBottom = (aspectRatio * 100) + "%";
    let imageNode = document.createElement('img');
    imageNode.classList.add('FM_storyBoardImage');
    imageInnerContainer.appendChild(imageNode);
    let blockImageSrc = slides[i].blockData.previewImage;
    if(blockImageSrc == "" || blockImageSrc == null){
      blockImageSrc = FM.emptyImg;
    }
    imageNode.src = blockImageSrc;
    imageContainer.appendChild(imageInnerContainer);
    storyBoardContainer.appendChild(imageContainer);
    imageContainer.onclick = function(){
      FM.openEasyEditor(seed, attributes, setAttributes, storeIndex);
    }
    masterDiv.appendChild(storyBoardContainer);
    //</endFold>

  }

  // Create Add New Block
  // let slideContainer = document.createElement('div');
  // slideContainer.classList.add('FM_newStoryBoardItem');
  // slideContainer.onclick = function(){
  //   FM.addNewBlock(seed, attributes, setAttributes);
  // }
  // slideContainer.innerHTML = `<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z" /></svg> <span>`+FM.language["NewBlock"]+`</span>`;
  // masterDiv.appendChild(slideContainer);

}
//</endFold>

//<beginFold> buildAdvancedGutenbergUI
FM.buildAdvancedGutenbergUI = function(seed, attributes, setAttributes){
  let compositionData = JSON.parse(window.FireTrack[seed].compositionData);
  let slides = compositionData.slides;
  // Create Master Container
  let masterDiv = document.getElementById(seed);
  masterDiv.innerHTML = "";
  // Append Menu
  masterDiv.appendChild( FM.buildGutenbergEditorMenu(seed, attributes, setAttributes) );

  // Create Slides
  for(var i=0; i<slides.length; i++){
    let storeIndex = i;
    // Build StoryBoard Container
    let storyBoardContainer = document.createElement('div');
    storyBoardContainer.classList.add('FM_storyBoardContainer');
    // Create Story Controls
    let storyControlsContainer = document.createElement('div');
    storyControlsContainer.classList.add('FM_storyControlsContainer');

    //<beginFold> Menu Control
    let menuLevel = -1;
    let menuControl = document.createElement('div');
    menuControl.classList.add('FM_storyBoardControl');
    menuControl.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" /></svg>';
    menuControl.onclick = function(){
      slideURLLink();
    }
    //</endFold>

    //<beginFold> Slide Up Control
    let slideUpControl = document.createElement('div');
    slideUpControl.classList.add('FM_storyBoardControl');
    slideUpControl.classList.add("--bottom1");
    if(slides.length == 1 || i == 0){
      slideUpControl.classList.add("--hide");
    }
    slideUpControl.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg>';
    slideUpControl.onclick = function(){ FM.reorderBlock(seed, attributes, setAttributes, storeIndex, -1); }
    //</endFold>

    //<beginFold> Slide Down Control
    let slideDownControl = document.createElement('div');
    slideDownControl.classList.add('FM_storyBoardControl');
    slideDownControl.classList.add("--bottom2");
    if(slides.length == 1 || i == slides.length-1){
      slideDownControl.classList.add("--hide");
    }
    slideDownControl.style.transform = "rotate(180deg)";
    slideDownControl.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg>';
    slideDownControl.onclick = function(){ FM.reorderBlock(seed, attributes, setAttributes, storeIndex, 1); }
    //</endFold>

    //<beginFold> Menu Functions

      //<beginFold> openMenu
      function openMenu(){
        if(menuLevel == 0){ closeMenu(); return; }
        let menuOptionsContainer;
        if(menuLevel == 1){
          menuOptionsContainer = document.getElementsByClassName("FM_linkInputContainer")[0];
          menuOptionsContainer.innerHTML = "";
        }else{
          menuOptionsContainer = document.createElement('div');
          menuOptionsContainer.classList.add("FM_linkInputContainer");
        }
        menuLevel = 0;
        // Menu Title
        let menuTitle = document.createElement('div');
        menuTitle.classList.add("FM_menuTitle");
        menuTitle.innerHTML = "Slide Controls";
        menuOptionsContainer.appendChild(menuTitle);

        // Menu Options
        let menuOptions = document.createElement('ul');
        menuOptions.classList.add("FM_menuOptions");

        let slideDurationOption = document.createElement('li');
        slideDurationOption.classList.add("FM_menuOption");
        slideDurationOption.innerHTML = "<span>1: </span>" + FM.language["SlideDurationOption"];
        slideDurationOption.onclick = function(){ setupSlideDuration(); }
        menuOptions.appendChild(slideDurationOption);

        let slideLinkOption = document.createElement('li');
        slideLinkOption.classList.add("FM_menuOption");
        slideLinkOption.innerHTML = "<span>2: </span>" + FM.language["SlideLinkOption"];
        slideLinkOption.onclick = function(){ slideURLLink(); }
        menuOptions.appendChild(slideLinkOption);

        let cloneSlideOption = document.createElement('li');
        cloneSlideOption.classList.add("FM_menuOption");
        cloneSlideOption.innerHTML = "<span>3: </span>" + FM.language["SlideCloneOption"] ;
        cloneSlideOption.onclick = function(){ cloneSlide(); }
        menuOptions.appendChild(cloneSlideOption);

        let removeSlideOption = document.createElement('li');
        removeSlideOption.classList.add("FM_menuOption");
        removeSlideOption.innerHTML = "<span>4: </span>" + FM.language["SlideRemoveOption"];
        removeSlideOption.onclick = function(){ removeBlock(); }
        menuOptions.appendChild(removeSlideOption);

        menuOptionsContainer.appendChild(menuOptions);
        storyBoardContainer.appendChild(menuOptionsContainer);
      }
      //</endFold>

      //<beginFold> closeMenu
      function closeMenu(){
        let menu = document.getElementsByClassName("FM_linkInputContainer")[0];
        menu.parentNode.removeChild(menu);
        menuLevel = -1;
      }
      //</endFold>

      //<beginFold> setupSlideDuration
      function setupSlideDuration(){
        menuLevel = 1;
        let mainContainer = document.getElementsByClassName("FM_linkInputContainer")[0];
        mainContainer.innerHTML = "";
        let durationData = slides[storeIndex].durationData;
        // Duration Input
        let durationDescription = document.createElement("span");
        durationDescription.innerHTML = FM.language["SlideDurationDescription"];
        durationDescription.style.marginBottom = "11px";
        mainContainer.appendChild(durationDescription);
        let durationInput = document.createElement("INPUT");
        durationInput.setAttribute("type", "text");
        durationInput.value = durationData.duration;
        durationInput.style.fontSize = 18+"px";
        durationInput.classList.add("FM_textInput");
        mainContainer.appendChild(durationInput);
        // Break
        // let lineBreak = document.createElement("div");
        // lineBreak.classList.add("FM_lineBreak");
        // mainContainer.appendChild(lineBreak);
        // Controls Option
        // let controlsDescription = document.createElement("span");
        // controlsDescription.innerHTML = FM.language["EnableUserSlideControls"];
        // mainContainer.appendChild(controlsDescription);
        // var controlsInput = document.createElement("INPUT");
        // controlsInput.setAttribute("type", "checkbox");
        // controlsInput.checked = durationData.controls;
        // controlsInput.classList.add("FM_checkBox");
        // mainContainer.appendChild(controlsInput);
        // Break
        let lineBreak2 = document.createElement("div");
        lineBreak2.classList.add("FM_lineBreak");
        mainContainer.appendChild(lineBreak2);
        // Save Button
        let confirmContainer = document.createElement('div');
        confirmContainer.classList.add("FM_linkConfirmContainer");
        let saveButton = document.createElement('div');
        saveButton.classList.add("FM_linkConfirm");
        saveButton.onclick = function(){
          // durationData.controls = controlsInput.checked;
          durationData.duration = durationInput.value.trim();
          openMenu();
        }
        saveButton.innerHTML = FM.language["SaveDuration"];
        confirmContainer.appendChild(saveButton);
        mainContainer.appendChild(confirmContainer);

      }
      //</endFold>

      //<beginFold> slideURLLink
      function slideURLLink(){
        if(menuLevel == 0){ closeMenu(); return; }
        menuLevel = 0;

        let linkInputContainer;
        linkInputContainer = document.createElement('div');
        linkInputContainer.classList.add("FM_linkInputContainer");
        storyBoardContainer.appendChild(linkInputContainer);

        // let linkInputContainer = document.getElementsByClassName("FM_linkInputContainer")[0];
        linkInputContainer.innerHTML = "";
        let linkInputDescription = document.createElement('div');
        linkInputDescription.style.fontSize = "20px";
        linkInputDescription.style.lineHeight = "1.5";
        linkInputDescription.style.marginBottom = "11px";
        linkInputDescription.innerHTML = FM.language["SlideURL"];
        linkInputContainer.appendChild(linkInputDescription);
        let linkInput = document.createElement('input');
        linkInput.value = slides[storeIndex].linkData;
        linkInput.classList.add("FM_textInput");
        linkInput.classList.add("FM_linkInput");
        linkInputContainer.appendChild(linkInput);
        let confirmContainer = document.createElement('div');
        confirmContainer.classList.add("FM_linkConfirmContainer");
        let confirmButton = document.createElement('div');
        confirmButton.classList.add("FM_linkConfirm");
        confirmButton.onclick = function(){
          let parsedCompData = JSON.parse(window.FireTrack[seed].compositionData);
          parsedCompData.slides[storeIndex].linkData = linkInput.value.trim();
          slides[storeIndex].linkData = linkInput.value.trim();
          window.FireTrack[seed].compositionData = JSON.stringify(parsedCompData);
          closeMenu();
        }
        confirmButton.innerHTML = FM.language["ApplyLink"];
        confirmContainer.appendChild(confirmButton);
        linkInputContainer.appendChild(confirmContainer);
      }
      //</endFold>

      //<beginFold> cloneSlide
      function cloneSlide(){
        FM.cloneSlide(seed, attributes, setAttributes, storeIndex);
      }
      //</endFold>

      //<beginFold> removeBlock
      function removeBlock(){
        menuLevel = 1;
        let linkInputContainer = document.getElementsByClassName("FM_linkInputContainer")[0];
        linkInputContainer.innerHTML = "";
        let linkInputDescription = document.createElement('div');
        linkInputDescription.style.marginBottom = "24px";
        linkInputDescription.innerHTML = FM.language["RemoveBlockConfirmation"];
        linkInputContainer.appendChild(linkInputDescription);
        let confirmContainer = document.createElement('div');
        confirmContainer.classList.add("FM_linkConfirmContainer");
        let confirmButton = document.createElement('div');
        confirmButton.classList.add("FM_linkConfirm");
        confirmButton.onclick = function(){
          FM.removeBlock(seed, attributes, setAttributes, storeIndex);
        }
        confirmButton.innerHTML = FM.language["Yes"];
        confirmContainer.appendChild(confirmButton);
        let cancelButton = document.createElement('div');
        cancelButton.classList.add("FM_linkConfirm");
        cancelButton.onclick = function(){
          openMenu();
        }
        cancelButton.innerHTML = FM.language["No"];
        confirmContainer.appendChild(cancelButton);
        linkInputContainer.appendChild(confirmContainer);
      }
      //</endFold>

    //</endFold>

    storyControlsContainer.appendChild(menuControl);
    storyControlsContainer.appendChild(slideUpControl);
    storyControlsContainer.appendChild(slideDownControl);
    storyBoardContainer.appendChild(storyControlsContainer);

    //<beginFold> Create Transition
    let transitionContainer = document.createElement('div');
    transitionContainer.classList.add('FM_storyBoardTransition');
    let transitionData = slides[i].transitionData;
    if(transitionData.package.package != null){
      transitionContainer.classList.add("--active");
    }
    transitionContainer.onclick = function(){
      FM.openTransitionEdtior(seed, attributes, setAttributes, storeIndex);
    }
    let transitionText = document.createElement('div');
    let transitionHTML = `
    <?xml version="1.0" encoding="UTF-8"?>
    <svg width="43px" height="40px" viewBox="0 0 43 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g class="FM_transitionIcon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g class="FM_transitionIcon" transform="translate(-31.000000, -605.000000)" stroke-width="2.83499985">
                <g transform="translate(-14.000000, 79.000000)">
                    <g transform="translate(29.000000, 526.000000)">
                        <g transform="translate(16.000000, 0.000000)">
                            <path d="M24.3057045,6.27749967 L9.29237907,37.462498 L1.41749992,37.462498 L1.41749992,6.27749967 L24.3057045,6.27749967 Z" id="Rectangle"></path>
                            <path d="M40.5057037,1.41749992 L25.4923782,32.6024983 L17.6174991,32.6024983 L17.6174991,1.41749992 L40.5057037,1.41749992 Z" id="Rectangle" transform="translate(29.480671, 17.009999) scale(-1, -1) translate(-29.480671, -17.009999) "></path>
                            <line x1="15.120892" y1="38.069998" x2="42.7613435" y2="38.069998" id="Path-2"></line>
                            <line x1="-2.84217094e-14" y1="1.61999991" x2="27.6404515" y2="1.61999991" id="Path-2-Copy"></line>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    `;
    if(transitionData.package.package == null){
      transitionHTML += '<span>'+FM.language["Element6"]+'</span>'
    }else{
      transitionHTML += '<span>'+transitionData.package.package+'</span>'
    }
    transitionText.innerHTML = transitionHTML;
    transitionContainer.appendChild(transitionText);
    storyBoardContainer.appendChild(transitionContainer);
    //</endFold>

    //<beginFold> Create Image
    let imageContainer = document.createElement('div');
    imageContainer.classList.add('FM_storyBoardImageContainer');
    let aspectRatio = 1/compositionData.aspectRatio;
    if(aspectRatio * 500 >= 330){
      imageContainer.style.width = (330 * compositionData.aspectRatio) + "px";
    }
    let imageInnerContainer = document.createElement('div');
    imageInnerContainer.classList.add('FM_storyBoardImageInnerContainer');
    imageInnerContainer.style.paddingBottom = (aspectRatio * 100) + "%";
    let imageNode = document.createElement('img');
    imageNode.classList.add('FM_storyBoardImage');
    imageInnerContainer.appendChild(imageNode);
    let blockImageSrc = slides[i].blockData.previewImage;
    if(blockImageSrc == "" || blockImageSrc == null){
      blockImageSrc = FM.emptyImg;
    }
    imageNode.src = blockImageSrc;
    imageContainer.appendChild(imageInnerContainer);
    storyBoardContainer.appendChild(imageContainer);
    imageContainer.onclick = function(){
      FM.openEditor(seed, attributes, setAttributes, storeIndex);
    }
    masterDiv.appendChild(storyBoardContainer);
    //</endFold>

  }

  // Create Add New Block
  // let slideContainer = document.createElement('div');
  // slideContainer.classList.add('FM_newStoryBoardItem');
  // slideContainer.onclick = function(){
  //   FM.addNewBlock(seed, attributes, setAttributes);
  // }
  // slideContainer.innerHTML = `<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M13,7H11V11H7V13H11V17H13V13H17V11H13V7Z" /></svg> <span>`+FM.language["NewBlock"]+`</span>`;
  // masterDiv.appendChild(slideContainer);
}
//</endFold>

// ******************************************************
// -- Open Package Editors ------------------------------
// ******************************************************
//<beginFold> openEditor
FM.openEditor = function(masterDiv, attributes, setAttributes, index){
    FM.editorState = "composition";
    FM.setAttributes = setAttributes;
    FM.attributes = attributes;
    FM.masterDiv = masterDiv;
    FM.blockIndex = index;
    let fullCompString = window.FireTrack[attributes.seed].compositionData;
    let fullCompData = JSON.parse(fullCompString);
    FM.fullCompData = fullCompData;
    FM.compositionData = fullCompData.slides[FM.blockIndex].blockData;
    FM.hoverData = fullCompData.slides[FM.blockIndex].hoverData;
    let timeNow = performance.now();
    FM.editorContainer = FM.createCompositionEditor();
    let timeAfter = performance.now();
    function delayRAF(){
      FM.buildComposition().then(function(){
        document.getElementsByClassName("FP_loadScreen")[0].classList.add("--hide");
        FM.buildImageControls();
        FM.updateTextRAFLoop();
        FM.processHoverAnimation();
      });
    }
    window.requestAnimationFrame(delayRAF);
}
//</endFold>

//<beginFold> openTransitionEdtior
FM.openTransitionEdtior = function(masterDiv, attributes, setAttributes, index){
    FM.editorState = "transition";
    FM.setAttributes = setAttributes;
    FM.attributes = attributes;
    FM.masterDiv = masterDiv;
    FM.blockIndex = index;
    let fullCompString = window.FireTrack[attributes.seed].compositionData;
    let fullCompData = JSON.parse(fullCompString);
    FM.fullCompData = fullCompData;
    if(index == 0){
      FM.compositionData = null;
    }else{
      FM.compositionData = fullCompData.slides[index - 1].blockData;
    }
    FM.compositionData2 = fullCompData.slides[index].blockData;
    FM.transitionData = fullCompData.slides[index].transitionData;
    let timeNow = performance.now();
    FM.editorContainer = FM.createCompositionEditor(true);
    let timeAfter = performance.now();
    function delayRAF(){
      FM.buildTransitionComposition().then(function(){
        document.getElementsByClassName("FP_loadScreen")[0].classList.add("--hide");
        FM.buildTransitionControls();
        FM.updateTextRAFLoop();
        FM.updateText = true;
      });
    }
    window.requestAnimationFrame(delayRAF);

}
//</endFold>

//<beginFold> openEasyEditor
FM.openEasyEditor = function(masterDiv, attributes, setAttributes, index){
  FM.editorState = "easy";
  FM.setAttributes = setAttributes;
  FM.attributes = attributes;
  FM.masterDiv = masterDiv;
  FM.blockIndex = index;
  let fullCompString = window.FireTrack[attributes.seed].compositionData;
  let fullCompData = JSON.parse(fullCompString);
  FM.fullCompData = fullCompData;
  FM.compositionData = fullCompData.slides[FM.blockIndex].blockData;
  FM.hoverData = fullCompData.slides[FM.blockIndex].hoverData;
  let timeNow = performance.now();
  FM.editorContainer = FM.createCompositionEditor();
  let timeAfter = performance.now();
  function delayRAF(){
    FM.buildComposition().then(function(){
      document.getElementsByClassName("FP_loadScreen")[0].classList.add("--hide");
      FM.buildImageControls();
      FM.updateTextRAFLoop();
      FM.processHoverAnimation();
    });
  }
  window.requestAnimationFrame(delayRAF);
}
//</endFold>

//<beginFold> openCompleteEditor
FM.openCompleteEditor = function(seed, attributes, setAttributes){
  FM.editorState = "complete";
  FM.setAttributes = setAttributes;
  FM.attributes = attributes;
  let fullCompString = window.FireTrack[attributes.seed].compositionData;
  let fullCompData = JSON.parse(fullCompString);
  FM.fullCompData = fullCompData;
  FM.editorContainer = FM.createPreviewCompositionEditor();
  function delayRAF(){
    FM.buildCompleteComposition().then(function(){
      document.getElementsByClassName("FP_loadScreen")[0].classList.add("--hide");
    });
  }
  window.requestAnimationFrame(delayRAF);
}
//</endFold>

//<beginFold> emptyBlock
FM.emptyBlock = {
      "linkData": "",
      "blockData": {
        "previewImage": FM.emptyImg,
        "image": {
          "package": {
            "package": "onlyImage" // This is the package name used for hover settings
          },
          "source": null,
          "id": null,
          "fit": "Cover",
          "effects": {
            "blur": { "type": "Box", "value": 0 },
            "bloom": 0,
            "brightness": 0,
            "contrast": 0,
            "hue": 0,
            "saturation": 0
          }
        },
        "colorCorrection": {
          "package": {
            "package": null,
            "style": "1"
          },
          "controls": {	}
        },
        "text": {
          "package": {
            "package": "3ImageText" // This is the package name used for hover settings
          },
          "preText":{
            "image": {
              "source": null,
              "id": null,
              "opacity": 100,
              "scale": 100,
              "x": 0,
              "y": 0,
              "effects": {
                "blur": { "type": "Box", "value": 0 },
                "bloom": 0,
                "brightness": 0,
                "contrast": 0,
                "hue": 0,
                "saturation": 0
              }
            },
            "placement": {
              "x": 50,
              "xAlign": "center",
              "y": 0,
              "yAlign": "Offset Main"
            },
            "animation":{
              "name": "Lift Up",
              "targets": "Text Background Border",
              "progress": 100,
              "ease": ""
            },
            "backgroundColor": "rgba(0,0,0,0)",
            "backgroundHorizontalSize": 0,
            "backgroundVerticalSize": 0,
            "backgroundXOffset": 0,
            "backgroundYOffset": 0,
            "borderWidth": 0,
            "borderColor": "rgba(0,0,0,0)",
            "borderStyle": "Top Bottom Left Right",
            "fontFamily": "Arial",
            "fontSize": 5,
            "maxFontSize": "",
            "fontWeight": 400,
            "fontStyle": "Normal",
            "letterSpacing": 0,
            "textValue": "",
            "color": "rgba(0,0,0,1)",
            "shadowColor": "rgba(0,0,0,0)",
            "shadowSize": "10",
            "strokeColor": "rgba(0,0,0,0)",
            "strokeWidth": "0"
          },
          "mainText":{
            "image": {
              "source": null,
              "id": null,
              "opacity": 100,
              "scale": 100,
              "x": 0,
              "y": 0,
              "effects": {
                "blur": { "type": "Box", "value": 0 },
                "bloom": 0,
                "brightness": 0,
                "contrast": 0,
                "hue": 0,
                "saturation": 0
              }
            },
            "placement": {
              "x": 50,
              "xAlign": "center",
              "y": 50,
              "yAlign": "center"
            },
            "animation":{
              "name": "Lift Up",
              "targets": "Text Background Border",
              "progress": 100,
              "ease": ""
            },
            "backgroundColor": "rgba(0,0,0,0)",
            "backgroundHorizontalSize": 0,
            "backgroundVerticalSize": 0,
            "backgroundXOffset": 0,
            "backgroundYOffset": 0,
            "borderWidth": 0,
            "borderColor": "rgba(0,0,0,0)",
            "borderStyle": "Top Bottom Left Right",
            "fontFamily": "Arial",
            "fontSize": 10,
            "maxFontSize": "",
            "fontWeight": 400,
            "fontStyle": "Normal",
            "letterSpacing": 0,
            "textValue": "",
            "color": "rgba(0,0,0,1)",
            "shadowColor": "rgba(0,0,0,0)",
            "shadowSize": "10",
            "strokeColor": "rgba(0,0,0,0)",
            "strokeWidth": "0"
          },
          "subText":{
            "image": {
              "source": null,
              "id": null,
              "opacity": 100,
              "scale": 100,
              "x": 0,
              "y": 0,
              "effects": {
                "blur": { "type": "Box", "value": 0 },
                "bloom": 0,
                "brightness": 0,
                "contrast": 0,
                "hue": 0,
                "saturation": 0
              }
            },
            "placement": {
              "x": 50,
              "xAlign": "center",
              "y": 0,
              "yAlign": "Offset Main"
            },
            "animation":{
              "name": "Lift Up",
              "targets": "Text Background Border",
              "progress": 100,
              "ease": ""
            },
            "backgroundColor": "rgba(0,0,0,0)",
            "backgroundHorizontalSize": 0,
            "backgroundVerticalSize": 0,
            "backgroundXOffset": 0,
            "backgroundYOffset": 0,
            "borderWidth": 0,
            "borderColor": "rgba(0,0,0,0)",
            "borderStyle": "Top Bottom Left Right",
            "fontFamily": "Arial",
            "fontSize": 7,
            "maxFontSize": "",
            "fontWeight": 400,
            "fontStyle": "Normal",
            "letterSpacing": 0,
            "textValue": "",
            "color": "rgba(0,0,0,1)",
            "shadowColor": "rgba(0,0,0,0)",
            "shadowSize": "10",
            "strokeColor": "rgba(0,0,0,0)",
            "strokeWidth": "0"
          }
        },
        "effects": {
          "package": {
            "package": null,
            "style": "1"
          },
          "controls": { }
        },
        "textReveal":{
          "package": {
            "package": null,
            "style": "1"
          },
          "controls": { }
        }
      },
      "transitionData": {
        "package": {
          "package": null,
          "style": "1"
        },
        "controls": {  }
      },
      "hoverData": {
        "image": {
          "onlyImage": { }
        },
        "effects": { },
        "colorCorrection": { },
        "text": {
          "3ImageText": {  }
        },
        "transition": { }
      },
      "durationData": {
        "controls": false,
        "duration": 0
      }
    };
//</endFold>

//<beginFold> addNewBlock
FM.addNewBlock = function(seed, attributes, setAttributes){
  let compositionData = JSON.parse(window.FireTrack[seed].compositionData);
  let slides = compositionData.slides;
  slides.push(FM.emptyBlock);
  window.FireTrack[seed].compositionData = JSON.stringify(compositionData);
  FM.buildGutenbergUI(seed, attributes, setAttributes);
}
//</endFold>

//<beginFold> cloneSlide
FM.cloneSlide = function(seed, attributes, setAttributes, index){
  let compositionData = JSON.parse(window.FireTrack[seed].compositionData);
  let slides = compositionData.slides;
  let targetSlide = slides[index];
  let targetString = JSON.stringify(targetSlide);
  targetSlide = JSON.parse(targetString);
  slides.splice(index, 0, targetSlide);
  window.FireTrack[seed].compositionData = JSON.stringify(compositionData);
  FM.buildGutenbergUI(seed, attributes, setAttributes);
}
//</endFold>

//<beginFold> removeBlock
FM.removeBlock = function(seed, attributes, setAttributes, index){
  let compositionData = JSON.parse(window.FireTrack[seed].compositionData);
  let slides = compositionData.slides;
  slides.splice(index, 1);
  window.FireTrack[seed].compositionData = JSON.stringify(compositionData);
  FM.buildGutenbergUI(seed, attributes, setAttributes);
}
//</endFold>

//<beginFold> reorderBlock
FM.reorderBlock = function(seed, attributes, setAttributes, index, direction){
  let compositionData = JSON.parse(window.FireTrack[seed].compositionData);
  let slides = compositionData.slides;
  FM.swapArrayIndex(slides, index, (index+direction));
  window.FireTrack[seed].compositionData = JSON.stringify(compositionData);
  FM.buildGutenbergUI(seed, attributes, setAttributes);
}
//</endFold>

//<beginFold> saveTemplate
FM.saveTemplate = function(templateName, templateJSON, bypass){
  return new Promise((resolve, reject) => {

    if(bypass != true){
      let request = new XMLHttpRequest();
      let getTemplateID = firepro_wpURL+"/wp-json/firepro/templates?action=getTemplateID";
      let name = "&name=" + templateName;
      request.open('GET', getTemplateID + name);
      request.setRequestHeader("X-WP-Nonce", firepro_nonce);
      request.onload = function () {
        if(request.responseText != "-1"){
          reject();
          return;
        }else{
          saveTemplate();
        }
      }
      request.send();
    }else{
      saveTemplate();
    }

    function saveTemplate(){


      var data = new FormData();
      data.append("action", "updateTemplate");
      data.append("name", templateName);
      let templateData = JSON.parse(templateJSON);
      data.append("image", templateData.slides[0].blockData.previewImage);
      for(var i=0; i<templateData.slides.length; i++){
        templateData.slides[i].blockData.previewImage = "";
      }
      data.append("data", JSON.stringify(templateData));
      // (B) AJAX
      var request = new XMLHttpRequest();
      request.open("POST", firepro_wpURL + "/wp-json/firepro/templates");
      request.setRequestHeader("X-WP-Nonce", firepro_nonce);
      // What to do when server responds
      request.onload = function(){
         resolve();
       };
      request.send(data);
    }

  }); // end return promise
}
//</endFold>

//<beginFold> showProjectTemplates
FM.showProjectTemplates = function(seed, attributes, setAttributes){
  let container = FM.createCompEditContainer("--templates");

  //<beginFold> Loader
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
  container.appendChild(loaderContainer);
  document.body.appendChild(container);
  //</endFold>

  //<beginFold> getFireProTemplateNames
  function getFireProTemplateNames(){
    return new Promise((resolve, reject) => {
      let request = new XMLHttpRequest();
      let templateAPI = "https://firepro.io/templates_api.php";
      request.open('GET', templateAPI);
      request.onload = function () {
        resolve( JSON.parse(request.responseText) );
        return;
      }
      request.send();
    }); // end return promise
  }
  //</endFold>

  //<beginFold> getUserTemplateNames
  function getUserTemplateNames(){
    return new Promise((resolve, reject) => {
        let request = new XMLHttpRequest();
        let getTemplateID = firepro_wpURL+"/wp-json/firepro/templates?action=getTemplateID";
        let updateTemplate = firepro_wpURL+"/wp-json/firepro/templates?action=updateTemplate";
        let getTemplates = firepro_wpURL+"/wp-json/firepro/templates?action=getTemplates";

        // let name = "&name=test";
        // let image = "&image=newIMAGE2";
        // let tempalteData = "&data=dataTest2";

        request.open('GET', getTemplates);
        request.setRequestHeader("X-WP-Nonce", firepro_nonce);
        request.onload = function () {
          resolve( JSON.parse(request.responseText) );
          return;
        }
        request.send();
    }); // end return promise
  }
  //</endFold>

  //<beginFold> Resolve Promise All
  let promiseAll = [];
  promiseAll.push(getFireProTemplateNames());
  promiseAll.push(getUserTemplateNames());
  Promise.all(promiseAll).then((values) => {
    // Build Out FirePro Templates
    let fireProTemplates = [];
    for(var i=0; i<values[0].length; i++){
      fireProTemplates.push(values[0][i].post_title);
    }
    // Build Out User Templates
    let userTemplates = [];
    for(var i=0; i<values[1].length; i++){
      userTemplates.push(values[1][i].template_name);
    }
    combineTemplates(fireProTemplates, userTemplates);

  });
  //</endFold>

  //<beginFold> combineTemplates
  function combineTemplates(fireProTemplates, userTemplates){
    // Build UI With Template Names

    let templates = [];
    for(var i=0; i<fireProTemplates.length; i++){
      let template = {name: fireProTemplates[i], type: "firepro"};
      templates.push(template);
    }
    for(var i=0; i<userTemplates.length; i++){
      let template = {name: userTemplates[i], type: "user"};
      templates.push(template);
    }

    templates.sort(function(a, b) {
      var textA = a.name.toUpperCase();
      var textB = b.name.toUpperCase();
      return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
    });

    FM.showProjectTemplatesDelayed(seed, attributes, setAttributes, container, loaderContainer, templates);
  }
  //</endFold>

}
//</endFold>

//<beginFold> showProjectTemplatesDelayed
FM.showProjectTemplatesDelayed = function(seed, attributes, setAttributes, container, loaderContainer, templates){

  //<beginFold> Top Bar
  let topBar = FM.createCompEditTopBarWide(FM.language["TemplateManager"]);
  container.appendChild(topBar);
  //</endFold>

  //<beginFold> buildTempalteUI
  function buildTempalteUI(){
    let templateUIContainer = document.createElement('div');
    templateUIContainer.style.display = "none";

    let mainSection = document.createElement("div");
    mainSection.classList.add("FM_mainSection");
    templateUIContainer.appendChild(mainSection);

    let flexContainer = document.createElement("div");
    flexContainer.classList.add("FM_flexContainer");
    mainSection.appendChild(flexContainer);

    let filterSidebarContainer = document.createElement("div");
    filterSidebarContainer.classList.add("FM_filterSidebar");
    flexContainer.appendChild(filterSidebarContainer);

    let filterSidebarIcon = document.createElement("div");
    filterSidebarIcon.classList.add("FM_filterSidebar__icon");
    filterSidebarContainer.appendChild(filterSidebarIcon);

    // let filterSidebarIconText = document.createElement("div");
    // filterSidebarIconText.classList.add("FM_filterSidebar__icon__text");
    // filterSidebarIconText.innerHTML = "Show: ";
    // filterSidebarIcon.appendChild(filterSidebarIconText);

    //<beginFold> Categories
    let categories = [
      {name: FM.language["MyTemplates"], filter: "user"},
      {name: FM.language["FireProTemplates"], filter: "firepro"}
    ];
    for(var i=0; i<categories.length; i++){
      let listOption = document.createElement("div");
      listOption.classList.add("FM_listOption");
      listOption.FM_filter = categories[i].filter;
      listOption.onclick = function(){
        let packages = flexContainer.getElementsByClassName("FM_template");
        let checkBoxes = flexContainer.getElementsByClassName("FM_listOptionContainer__check");
        let userTemplates = false;
        let fireProTemplates = false;
        for(var i=0; i<packages.length; i++){ packages[i].classList.remove("--hide");  }
        for(var i=0; i<checkBoxes.length; i++){
          if(checkBoxes[i].classList.contains("user")){
            if(checkBoxes[i].checked == true){
              userTemplates = true;
            }
          }
          if(checkBoxes[i].classList.contains("firepro")){
            if(checkBoxes[i].checked == true){
              fireProTemplates = true;
            }
          }
        }
        if(userTemplates == false && fireProTemplates == false){ return; }
        if(userTemplates == true && fireProTemplates == true){ return; }
        if(userTemplates == true){
          for(var i=0; i<packages.length; i++){
            if(packages[i].FM_template.type == "firepro"){
              packages[i].classList.add("--hide");
            }
          }
        }
        if(fireProTemplates == true){
          for(var i=0; i<packages.length; i++){
            if(packages[i].FM_template.type == "user"){
              packages[i].classList.add("--hide");
            }
          }
        }
      }
      filterSidebarContainer.appendChild(listOption);

      let listOptionContainer = document.createElement("div");
      listOptionContainer.classList.add("FM_listOptionContainer");
      listOption.appendChild(listOptionContainer);

      let listOptionCheckbox = document.createElement("input");
      listOptionCheckbox.id = "FM_"+i;
      listOptionCheckbox.setAttribute("type", "checkbox");
      listOptionCheckbox.classList.add("FM_listOptionContainer__check");
      listOptionCheckbox.classList.add(categories[i].filter);
      listOptionContainer.appendChild(listOptionCheckbox);

      let listOptionTitle = document.createElement("label");
      listOptionTitle.classList.add("FM_listOptionTitle");
      listOptionTitle.htmlFor = 'FM_'+i;
      listOptionTitle.innerHTML = categories[i].name;
      listOptionContainer.appendChild(listOptionTitle);
    }
    // End List Options
    //</endFold>

    let packagesContainer = document.createElement("div");
    packagesContainer.classList.add("FM_packagesFlexContainer__buffer");
    flexContainer.appendChild(packagesContainer);

    let packagesTitle = document.createElement("div");
    packagesTitle.classList.add("FM_packagesTitle");
    packagesTitle.innerHTML = "Select An Animation To Customize";
    packagesContainer.appendChild(packagesTitle);

    let packageGrid = document.createElement("div");
    packageGrid.classList.add("FM_grid");
    packageGrid.classList.add("--threeRows");
    packagesContainer.appendChild(packageGrid);

    //<beginFold> Packages
    for(var i=0; i<templates.length; i++){
      let storeIndex = i;
      let packageElement = document.createElement("div");
      packageElement.classList.add("FM_grid__element");
      packageElement.classList.add("FM_template");
      packageElement.FM_template = {name: templates[i].name, type: templates[i].type};
      packageGrid.appendChild(packageElement);
      templates[i].packageElement = packageElement;
      packageElement.onclick = function(){
        loadData(packageElement);
      }

      let packageImageContainer = document.createElement("div");
      packageImageContainer.classList.add("FM_grid__element__image");
      packageElement.appendChild(packageImageContainer);

      let packageImageAR = document.createElement("div");
      packageImageAR.classList.add("ArContainer");
      packageImageAR.classList.add("--Ar16-9");
      packageImageContainer.appendChild(packageImageAR);

      let packageImage = document.createElement('img');
      packageImage.classList.add("FM_packageImage");
      packageImage.classList.add("ArContainer");
      packageImage.classList.add("--Ar16-9");
      packageImage.src = FM.emptyImg;
      packageImageAR.appendChild(packageImage);

      let packageLowerSection = document.createElement('div');
      packageLowerSection.classList.add("FM_grid__element__lowerSection");
      packageElement.appendChild(packageLowerSection);

      let packageTitleContainer = document.createElement("div");
      packageTitleContainer.classList.add("FM_grid__element__lowerSection__title");
      packageLowerSection.appendChild(packageTitleContainer);

      let packageTitle = document.createElement("a");
      packageTitle.href = "https://firepro.io/package_editor/build.php?packageName=Text+Sparkle+Reveal";
      packageTitle.innerHTML = templates[i].name;
      packageTitleContainer.appendChild(packageTitle);

      let packageGridElement = document.createElement("div");
      packageGridElement.classList.add("FM_grid__element__lowerSection__section");
      packageLowerSection.appendChild(packageGridElement);
    }
    container.appendChild(templateUIContainer);
    //</endFold>

    //<beginFold> loadData
    function loadData(packageElement){
      if(packageElement.FM_template.type == "firepro"){
        let request = new XMLHttpRequest();
        let templateAPI = "https://firepro.io/templates_api.php?templateData="+packageElement.FM_template.name;
        request.open('GET', templateAPI);
        request.onload = function () {
          window.FireTrack[seed].compositionData = request.responseText;
          FM.closeEditor();
          FM.rebuildThumbnails(seed, attributes, setAttributes).then(function(){
            FM.buildGutenbergUI(seed, attributes, setAttributes);
          })
          return;
        }
        request.send();
      }
      if(packageElement.FM_template.type == "user"){
        let request = new XMLHttpRequest();
        request.open('GET', firepro_wpURL+"/wp-json/firepro/templates?action=getTemplateData&name="+packageElement.FM_template.name);
        request.setRequestHeader("X-WP-Nonce", firepro_nonce);
        request.onload = function () {
          window.FireTrack[seed].compositionData = request.responseText;
          FM.closeEditor();
          FM.rebuildThumbnails(seed, attributes, setAttributes).then(function(){
            FM.buildGutenbergUI(seed, attributes, setAttributes);
          })
          return;
        }
        request.send();
      }
    }
    //</endFold>

    // After Page HTML Is Built
    function delayRAF(){

      //<beginFold> loadImage
      function loadImage(packageElement){
        if(packageElement.FM_template.type == "firepro"){
          let request = new XMLHttpRequest();
          let templateAPI = "https://firepro.io/templates_api.php?templateImage="+packageElement.FM_template.name;
          request.open('GET', templateAPI);
          request.onload = function () {
            packageElement.getElementsByClassName("FM_packageImage")[0].src = request.responseText;
            return;
          }
          request.send();
        }
        if(packageElement.FM_template.type == "user"){
          let request = new XMLHttpRequest();
          request.open('GET', firepro_wpURL+"/wp-json/firepro/templates?action=getTemplateImage&name="+packageElement.FM_template.name);
          request.setRequestHeader("X-WP-Nonce", firepro_nonce);
          request.onload = function () {
            let imgSrc = request.responseText;
            packageElement.getElementsByClassName("FM_packageImage")[0].src = imgSrc;
            return;
          }
          request.send();
        }
      }
      for(var i=0; i<templates.length; i++){
        loadImage(templates[i].packageElement);
      }
      //</endFold>

      templateUIContainer.style.display = "block";
      loaderContainer.remove();
    }
    window.requestAnimationFrame(delayRAF);
  }
  buildTempalteUI();
  //</endFold>

}
//</endFold>


// *************************************
// -- UI_Components (dropdown, lable) --
// *************************************
// **********************************************************
// -- Label Module ------------------------------------------
// **********************************************************
//<beginFold> Label
FM.label = function(name){

  let label = document.createElement("div");
  label.classList.add("FP_label");

  let expandContainer = "<div class='FP_expandLabel'></div>";

  label.innerHTML = name + ": " + expandContainer;
  return label;

}
//</endFold>

//<beginFold> expandLabel
FM.expandLabel = function(container){
  let label = container.previousSibling;
  if(!label.classList.contains("FP_label")){ return; }
  let expandContainer = label.getElementsByClassName("FP_expandLabel")[0];
  let chevronDown = `<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M6,10L12,16L18,10L16.6,8.6L12,13.2L7.4,8.6L6,10Z" /></svg>`;
  let chevronUp = `<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M7.4,15.4L12,10.8L16.6,15.4L18,14L12,8L6,14L7.4,15.4Z" /></svg>`;

  let fullExpansion = "<div class='FP_plus'>" + chevronDown + "</div>";
  fullExpansion += "<div class='FP_minus'>" + chevronUp + "</div>";
  expandContainer.innerHTML = fullExpansion;

  return expandContainer;
}
//</endFold>

// **********************************************************
// -- DropDown Module ---------------------------------------
// **********************************************************
//<beginFold> dropDown
FM.dropDown = function(options, defaultOption, font){

  let dropdownContainer = document.createElement("div");
  dropdownContainer.classList.add("FP_dropDown_Container");
  dropdownContainer.classList.add("--inactive");
  dropdownContainer.onclick = function(){ FM.openDropDown(dropdownContainer); }

  for(var x=0; x<options.length; x++){
    let optionValue = options[x];
    let dropdownOption = document.createElement("div");
    dropdownOption.classList.add("FP_dropdownOption");
    if(font == true){
      dropdownOption.classList.add("--font");
      dropdownOption.style.fontFamily = optionValue;
    }
    dropdownOption.innerHTML = optionValue;
    dropdownOption.onclick = function(){ FM.dropdownOptionClick(dropdownContainer, dropdownOption); }
    if(optionValue.toLowerCase() == defaultOption.toLowerCase()){
      dropdownOption.classList.add("--active");
    }
    dropdownContainer.appendChild(dropdownOption);
  }

  // Expose a set value option
  dropdownContainer.setValue = function(selectedValue){
    let options = dropdownContainer.getElementsByClassName("FP_dropdownOption");
    let desiredOption = null;
    for(var i=0; i<options.length; i++){
      if(options.innerHTML == selectedValue){
        desiredOption = options; break;
      }
    }
    if(desiredOption != null){
      FM.dropdownOptionClick(dropdownContainer, desiredOption);
    }
  }

  return dropdownContainer;
}
//</endFold>

//<beginFold> addOptionsAction
FM.addOptionsAction = function(dropdown, functionName, params){
  let options = dropdown.getElementsByClassName("FP_dropdownOption");
  for(var x=0; x<options.length; x++){
    let option = options[x];

    // Build a modified Params Array
    let moddedParams = [];
    for(var i=0; i<params.length; i++){
      if(params[i] == "uiValue"){
        moddedParams.push(option.innerHTML);
      }else{
        moddedParams.push(params[i]);
      }
    }

    // Add the onclick function
    option.addEventListener("click", function(){ FM[functionName](moddedParams); });

  }
}
//</endFold>

//<beginFold> openDropDown
FM.activeDropdown = null;
FM.openDropDown = function(dropdown){
  if(FM.activeDropdown != null){ FM.closeDropDown(); }

  if(!dropdown.classList.contains("--inactive")){ return; } // already open
  dropdown.classList.remove("--inactive");
  document.addEventListener("click", FM.closeDropDown );
  function delayRAF(){ FM.activeDropdown = dropdown; }
  window.requestAnimationFrame(delayRAF);
}
//</endFold>

//<beginFold> closeDropDown
FM.closeDropDown = function(){
  if(FM.activeDropdown == null){ return; }
  FM.activeDropdown.classList.add("--inactive");
  FM.activeDropdown = null;
  document.removeEventListener("click", FM.closeDropDown );
}
//</endFold>

//<beginFold> dropdownOptionClick
FM.dropdownOptionClick = function(dropdown, option){
  let options = dropdown.getElementsByClassName("FP_dropdownOption");
  for(var i=0; i<options.length; i++){
    options[i].classList.remove("--active");
  }
  option.classList.add("--active");
}
//</endFold>

// **********************************************************
// -- Button Selector Module --------------------------------
// **********************************************************
//<beginFold> buttonSelector
FM.buttonSelector = function(options, defaultOption){
  let container = document.createElement("div");
  container.classList.add("FP_buttonSelector");

  for(var x=0; x<options.length; x++){
    let optionValue = options[x];
    let buttonOption = document.createElement("div");
    buttonOption.classList.add("FP_buttonSelector_button");
    buttonOption.style.flex = (1/options.length) * .94;
    buttonOption.innerHTML = optionValue;
    buttonOption.onclick = function(){ FM.updateButtonSelector(container, buttonOption); }
    if(optionValue.toLowerCase() == defaultOption.toLowerCase()){
      buttonOption.classList.add("--active");
    }
    container.appendChild(buttonOption);
  }

  return container;
}
//</endFold>

//<beginFold> updateButtonSelector
FM.updateButtonSelector = function(container, selectedOption){
  let options = container.getElementsByClassName("FP_buttonSelector_button");
  for(var i=0; i<options.length; i++){
    options[i].classList.remove("--active");
  }
  selectedOption.classList.add("--active");
}
//</endFold>

//<beginFold> addButtonSelectorActions
FM.addButtonSelectorActions = function(dropdown, functionName, params){

  // Add Click Update To Options
  let options = dropdown.getElementsByClassName("FP_buttonSelector_button");
  for(var x=0; x<options.length; x++){
    let option = options[x];

    // Build a modified Params Array
    let moddedParams = [];
    for(var i=0; i<params.length; i++){
      if(params[i] == "uiValue"){
        moddedParams.push(option.innerHTML);
      }else{
        moddedParams.push(params[i]);
      }
    }

    // Add the onclick function
    option.addEventListener("click", function(){ FM[functionName](moddedParams); });
  }

  // Expose Set Value
  dropdown.setValue = function(desiredValue){
    for(var x=0; x<options.length; x++){
      let option = options[x];
      if(option.innerHTML.toLowerCase() == desiredValue.toLowerCase()){
        let moddedParams = [];
        for(var i=0; i<params.length; i++){
          if(params[i] == "uiValue"){
            moddedParams.push(option.innerHTML);
          }else{
            moddedParams.push(params[i]);
          }
        }
        FM.updateButtonSelector(dropdown, option);
        FM[functionName](moddedParams);
        return;
      }
    }
  }


}
//</endFold>

// **********************************************************
// -- Multi Selector Module ---------------------------------
// **********************************************************
//<beginFold> multiSelector
FM.multiSelector = function(options, defaultOption){
  let container = document.createElement("div");
  container.classList.add("FP_multiSelector");

  // Split Default Option into Array and Make Lower Case
  let arrayDefaultOption = defaultOption.split(" ");
  for(var i=0; i<arrayDefaultOption.length; i++){
    arrayDefaultOption[i] = arrayDefaultOption[i].toLowerCase();
  }

  // Build Option Buttons
  for(var x=0; x<options.length; x++){
    let optionValue = options[x];
    let lowerCaseValue = optionValue.toLowerCase();
    let buttonOption = document.createElement("div");
    buttonOption.classList.add("FP_multiSelector_button");
    buttonOption.style.flex = (1/options.length) * .94;
    buttonOption.innerHTML = optionValue;
    buttonOption.onclick = function(){ FM.updateMultiSelector(container, buttonOption); }
    if(arrayDefaultOption.includes(lowerCaseValue)){
      buttonOption.classList.add("--active");
    }
    container.appendChild(buttonOption);
  }

  return container;
}
//</endFold>

//<beginFold> updateMultiSelector
FM.updateMultiSelector = function(container, selectedOption){
  let options = container.getElementsByClassName("FP_multiSelector_button");
  if(selectedOption.classList.contains("--active")){
    selectedOption.classList.remove("--active");
  }else{
    selectedOption.classList.add("--active");
  }
}
//</endFold>

//<beginFold> addMultiSelectorActions
FM.addMultiSelectorActions = function(dropdown, functionName, params){
  let options = dropdown.getElementsByClassName("FP_multiSelector_button");

  function getSelectedButtons(){
    // Get Selected Buttons
    let selectedButtons = "";
    for(var x=0; x<options.length; x++){
      if(options[x].classList.contains("--active")){
        selectedButtons += options[x].innerHTML + " ";
      }
    }
    // Build a modified Params Array
    let moddedParams = [];
    for(var i=0; i<params.length; i++){
      if(params[i] == "uiValue"){
        moddedParams.push(selectedButtons);
      }else{
        moddedParams.push(params[i]);
      }
    }
    return moddedParams;
  }

  for(var x=0; x<options.length; x++){
    let option = options[x];
    // Add the onclick function
    option.addEventListener("click", function(){
      let moddedParams = getSelectedButtons();
      FM[functionName](moddedParams);
    });
  }
}
//</endFold>

// **********************************************************
// -- Ranged Input Module -----------------------------------
// **********************************************************
//<beginFold> buildRangedInput
FM.buildRangedInput = function(min, max, defaultValue, step){
  // -- Build Main Container
  let container = document.createElement("div");
  container.classList.add("FP_containMultipleRangeInputs");

  // Build Default Input
  let defaultContainer = document.createElement("div");
  defaultContainer.classList.add("FP_subContainMultipleRangeInputs");
  let defaultInput = FM.buildRangedInputHTML(min, max, defaultValue, step);
  defaultInput.classList.add("--defaultInput");
  defaultContainer.appendChild(defaultInput);

  // Setup Hover Container
  let hoverContainer = document.createElement("div");
  hoverContainer.classList.add("FP_hoverStateContainer");
  hoverContainer.classList.add("--hide");
  let hoverButton = document.createElement("div");
  hoverButton.classList.add("FP_buttonSelector_button");
  hoverButton.classList.add("--hoverToggle");
  hoverButton.style.marginBottom = "7px";
  hoverButton.innerHTML = FM.language["activateHover"] + ": ";
  let hoverSwitchContainer = document.createElement("div");
  hoverSwitchContainer.classList.add("FP_hoverSwitchContainer");
  let hoverSwitchCircle = document.createElement("div");
  hoverSwitchCircle.classList.add("FP_hoverSwitchCircle");
  hoverSwitchContainer.appendChild(hoverSwitchCircle);
  hoverButton.appendChild(hoverSwitchContainer);
  hoverContainer.appendChild(hoverButton);

  // Hover
  let hoverInputContainer = document.createElement("div");
  hoverInputContainer.classList.add("FP_subContainMultipleRangeInputs");
  hoverInputContainer.classList.add("--hoverInputContainer");
  // hoverInputContainer.classList.add("--hide");
  hoverInputContainer.innerHTML = FM.language["valueOnHover"] + ": ";
  let hoverInput = FM.buildRangedInputHTML(min, max, 0, step);
  hoverInput.classList.add("--hoverInput");
  hoverInputContainer.appendChild(hoverInput);
  hoverContainer.appendChild(hoverInputContainer);
  // Duration
  let durationContainer = document.createElement("div");
  durationContainer.classList.add("FP_subContainMultipleRangeInputs");
  durationContainer.classList.add("--durationInputContainer");
  // durationContainer.classList.add("--hide");
  durationContainer.innerHTML = FM.language["hoverAniTime"] + ": ";
  let durationInput = FM.buildRangedInputHTML(0, 1, 0, step);
  durationInput.classList.add("--durationInput");
  durationContainer.appendChild(durationInput);
  hoverContainer.appendChild(durationContainer);

  // Easing
  let easingContainer = document.createElement("div");
  easingContainer.classList.add("FP_subContainMultipleRangeInputs");
  easingContainer.classList.add("--easingInputContainer");
  // easingContainer.innerHTML = FM.language["hoverEasing"] + ": ";
  // easingContainer.classList.add("--hide");
  // easingContainer.innerHTML = "Hover Easing: ";
  let easingInput = FM.dropDown(FM.easings, "linear");
  easingInput.classList.add("--easingInput");
  easingContainer.appendChild(easingInput);
  hoverContainer.appendChild(easingContainer);

  // Append Inputs To Main Container
  container.appendChild(defaultContainer);
  container.appendChild(hoverContainer);

  // Expose Set Value
  container.setValue = function(newValue){
    defaultInput.setValue(newValue);
  }

  return container;
}
//</endFold>

//<beginFold> expandRangedInput
FM.expandRangedInput = function(hoverContainer, showHover){
  if(showHover){
    // Enable The Hover Inputs
    hoverContainer.classList.remove("--hide");
  }else{
    // Disable The Hover Inputs
    hoverContainer.classList.add("--hide");
  }
}
//</endFold>

//<beginFold> buildRangedInputHTML
FM.rangedNumber_MouseDown = 0;
FM.rangedNumber_Container = null;
FM.buildRangedInputHTML = function(min, max, defaultValue, step){
  let container = document.createElement("div");
  container.uiValue = parseFloat(defaultValue);
  container.min = min;
  container.max = max;
  container.classList.add("FP_rangedNumberContainer");
  container.appendChild(buildNumber());

  container.update = function(){
    let params = container.params;
    let functionName = container.function;
    let moddedParams = [];
    for(var i=0; i<params.length; i++){
      if(params[i] == "uiValue"){
        moddedParams.push( container.uiValue );
      }else{
        moddedParams.push(params[i]);
      }
    }
    FM[functionName](moddedParams);
  }

  var clickEvent = true;
  // Listen For Mouse Down
  container.addEventListener("mousedown", listenPointerLock);
  function listenPointerLock(){
    container.addEventListener("mousemove", activePointerLock);
  }

  // Listen For Mouse Move
  function activePointerLock(e){
    clickEvent = false;
    FM.rangedNumber_MouseDown = 1;
    FM.rangedNumber_Container = container;
    container.requestPointerLock();
    e.preventDefault();
  }

  // Remove Pointer Lock Event
  document.addEventListener("mouseup", removePointerLock);
  function removePointerLock(){
    clickEvent = true;
    container.removeEventListener("mousemove", activePointerLock);
  }

  // Build Text Input
  container.addEventListener("mouseup", renderTextInput);
  function renderTextInput(){
    if(clickEvent == false){ return; }
    container.removeEventListener("mousedown", listenPointerLock);
    container.removeEventListener("mouseup", renderTextInput);
    container.innerHTML = "";
    let textInput = document.createElement("input");
    textInput.classList.add("FM_input");
    textInput.setAttribute("type", "text");
    textInput.value =  FM.toFixed(container.uiValue, max);

    textInput.onchange = function(){
      container.uiValue = FM.toFixed(textInput.value, max);
      container.update();
    }
    textInput.oninput = function(){
      container.uiValue = FM.toFixed(textInput.value, max);
      container.update();
    }


    container.appendChild(textInput);
    function delayRAF(){  textInput.focus(); }
    window.requestAnimationFrame(delayRAF);
    document.addEventListener("keydown", checkForEnterKey);
    document.addEventListener("mousedown", checkForTextDestory);
  }

  // Destory Text Input
  function checkForEnterKey(e){
    let code = (e.keyCode ? e.keyCode : e.which);
    if(code == 13) { //Enter keycode
      destoryTextInput();
    }
  }
  function checkForTextDestory(event){
    if(!event.path[0].classList.contains("FM_input")){
      destoryTextInput();
    }
  }
  function destoryTextInput(){
    let typedValue = container.getElementsByClassName("FM_input")[0].value;
    container.uiValue = FM.toFixed(typedValue, max);
    container.update();
    function delayRAF(){
      container.innerHTML = "";
      container.appendChild(buildNumber());
      container.addEventListener("mousedown", listenPointerLock);
      container.addEventListener("mouseup", renderTextInput);
      document.removeEventListener("keydown", checkForEnterKey);
      document.removeEventListener("mousedown", checkForTextDestory);
    }
    window.requestAnimationFrame(delayRAF);
  }

  container.setValue = function(newValue){
    container.uiValue = newValue;
    container.getElementsByClassName("FP_rangedNumber")[0].innerHTML = FM.toFixed(newValue, max);
  }

  function buildNumber(){
    let numberSubContainer = document.createElement("div");
    numberSubContainer.classList.add("FP_rangedNumberSubContainer");
    let innerNumber = document.createElement("div");
    innerNumber.classList.add("FP_rangedNumber");
    innerNumber.innerHTML = FM.toFixed(container.uiValue, max);
    numberSubContainer.appendChild(innerNumber);
    return numberSubContainer;
  }

  return container;
}
//</endFold>

//<beginFold> updateRangedNumber
// Reset Range to Middle Value
FM.shiftDown = 0;
document.addEventListener("keydown", e => {
  if(e.shiftKey){
    if(FM.rangedNumber_Container == undefined){ return; }
    if(FM.rangedNumber_MouseDown == 0){ return; }
    FM.shiftDown = 1;
    let max = parseFloat(FM.rangedNumber_Container.max);
    let min = parseFloat(FM.rangedNumber_Container.min);
    let middleRange = (max + min)/2;
    FM.rangedNumber_Container.getElementsByClassName("FP_rangedNumber")[0].innerHTML = FM.toFixed(middleRange, max);
    FM.rangedNumber_Container.uiValue = parseFloat(middleRange);
    FM.rangedNumber_Container.update();
  }
});
document.addEventListener("keyup", e => {
  FM.shiftDown = 0;
});

document.addEventListener("mousemove", function(e){
  if(FM.shiftDown == 1){ return; }
  if(FM.rangedNumber_MouseDown == 0){ return; }
  let max = parseFloat(FM.rangedNumber_Container.max);
  let min = parseFloat(FM.rangedNumber_Container.min);

  let fullRange = max-min;
  let xCord = e.movementX;
  xCord = xCord;
  let currentValue = FM.rangedNumber_Container.uiValue;
  let percentChange = (xCord/1000);
  let finalChange = percentChange * fullRange;
  let newValue = currentValue + finalChange;

  if(newValue > max){
    newValue = max;
  }
  if(newValue < min){
    newValue = min;
  }

  FM.rangedNumber_Container.getElementsByClassName("FP_rangedNumber")[0].innerHTML = FM.toFixed(newValue, max);
  FM.rangedNumber_Container.uiValue = parseFloat(newValue);
  FM.rangedNumber_Container.update();
  e.preventDefault();
});

// Release Pointer Lock
document.addEventListener("mouseup", function(e){
  FM.rangedNumber_MouseDown = 0;
  document.exitPointerLock();
});
//</endFold>

//<beginFold> addRangedInputActions
FM.addRangedInputActions = function(container, functionName, params){
  let defaultInput = container.getElementsByClassName("--defaultInput")[0];
  let hoverInput = container.getElementsByClassName("--hoverInput")[0];
  let durationInput = container.getElementsByClassName("--durationInput")[0];

  defaultInput.params = params;
  defaultInput.function = functionName;

  // hoverInput.params = params;
  // hoverInput.function = "updateHover";
  // durationInput.params = params;
  // durationInput.function = "updateHoverDuration";

}
//</endFold>

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// -- Color Picker ----------------------------------------------------
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//<beginFold> colorLibrary
/*! Pickr 1.5.0 MIT | https://github.com/Simonwep/pickr */
!function(t,e){"object"==typeof exports&&"object"==typeof module?module.exports=e():"function"==typeof define&&define.amd?define([],e):"object"==typeof exports?exports.Pickr=e():t.Pickr=e()}(window,(function(){return function(t){var e={};function o(n){if(e[n])return e[n].exports;var i=e[n]={i:n,l:!1,exports:{}};return t[n].call(i.exports,i,i.exports,o),i.l=!0,i.exports}return o.m=t,o.c=e,o.d=function(t,e,n){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},o.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var i in t)o.d(n,i,function(e){return t[e]}.bind(null,i));return n},o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="",o(o.s=1)}([function(t){t.exports=JSON.parse('{"a":"1.5.0"}')},function(t,e,o){"use strict";o.r(e);var n={};function i(t,e){var o=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),o.push.apply(o,n)}return o}function r(t){for(var e=1;e<arguments.length;e++){var o=null!=arguments[e]?arguments[e]:{};e%2?i(Object(o),!0).forEach((function(e){s(t,e,o[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(o)):i(Object(o)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(o,e))}))}return t}function s(t,e,o){return e in t?Object.defineProperty(t,e,{value:o,enumerable:!0,configurable:!0,writable:!0}):t[e]=o,t}o.r(n),o.d(n,"on",(function(){return c})),o.d(n,"off",(function(){return a})),o.d(n,"createElementFromString",(function(){return p})),o.d(n,"removeAttribute",(function(){return u})),o.d(n,"createFromTemplate",(function(){return h})),o.d(n,"eventPath",(function(){return d})),o.d(n,"resolveElement",(function(){return f})),o.d(n,"adjustableInputNumbers",(function(){return m}));const c=l.bind(null,"addEventListener"),a=l.bind(null,"removeEventListener");function l(t,e,o,n,i={}){e instanceof HTMLCollection||e instanceof NodeList?e=Array.from(e):Array.isArray(e)||(e=[e]),Array.isArray(o)||(o=[o]);for(const s of e)for(const e of o)s[t](e,n,r({capture:!1},i));return Array.prototype.slice.call(arguments,1)}function p(t){const e=document.createElement("div");return e.innerHTML=t.trim(),e.firstElementChild}function u(t,e){const o=t.getAttribute(e);return t.removeAttribute(e),o}function h(t){return function t(e,o={}){const n=u(e,":obj"),i=u(e,":ref"),r=n?o[n]={}:o;i&&(o[i]=e);for(const o of Array.from(e.children)){const e=u(o,":arr"),n=t(o,e?{}:r);e&&(r[e]||(r[e]=[])).push(Object.keys(n).length?n:o)}return o}(p(t))}function d(t){let e=t.path||t.composedPath&&t.composedPath();if(e)return e;let o=t.target.parentElement;for(e=[t.target,o];o=o.parentElement;)e.push(o);return e.push(document,window),e}function f(t){return t instanceof Element?t:"string"==typeof t?t.split(/>>/g).reduce((t,e,o,n)=>(t=t.querySelector(e),o<n.length-1?t.shadowRoot:t),document):null}function m(t,e=(t=>t)){function o(o){const n=[.001,.01,.1][Number(o.shiftKey||2*o.ctrlKey)]*(o.deltaY<0?1:-1);let i=0,r=t.selectionStart;t.value=t.value.replace(/[\d.]+/g,(t,o)=>o<=r&&o+t.length>=r?(r=o,e(Number(t),n,i)):(i++,t)),t.focus(),t.setSelectionRange(r,r),o.preventDefault(),t.dispatchEvent(new Event("input"))}c(t,"focus",()=>c(window,"wheel",o,{passive:!1})),c(t,"blur",()=>a(window,"wheel",o))}var v=o(0);const{min:b,max:y,floor:g,round:_}=Math;function w(t,e,o){e/=100,o/=100;const n=g(t=t/360*6),i=t-n,r=o*(1-e),s=o*(1-i*e),c=o*(1-(1-i)*e),a=n%6;return[255*[o,s,r,r,c,o][a],255*[c,o,o,s,r,r][a],255*[r,r,c,o,o,s][a]]}function A(t,e,o){const n=(2-(e/=100))*(o/=100)/2;return 0!==n&&(e=1===n?0:n<.5?e*o/(2*n):e*o/(2-2*n)),[t,100*e,100*n]}function C(t,e,o){let n,i,r;const s=b(t/=255,e/=255,o/=255),c=y(t,e,o),a=c-s;if(r=c,0===a)n=i=0;else{i=a/c;const r=((c-t)/6+a/2)/a,s=((c-e)/6+a/2)/a,l=((c-o)/6+a/2)/a;t===c?n=l-s:e===c?n=1/3+r-l:o===c&&(n=2/3+s-r),n<0?n+=1:n>1&&(n-=1)}return[360*n,100*i,100*r]}function k(t,e,o,n){return e/=100,o/=100,[...C(255*(1-b(1,(t/=100)*(1-(n/=100))+n)),255*(1-b(1,e*(1-n)+n)),255*(1-b(1,o*(1-n)+n)))]}function S(t,e,o){return e/=100,[t,2*(e*=(o/=100)<.5?o:1-o)/(o+e)*100,100*(o+e)]}function O(t){return C(...t.match(/.{2}/g).map(t=>parseInt(t,16)))}function j(t){t=t.match(/^[a-zA-Z]+$/)?function(t){if("black"===t.toLowerCase())return"#000";const e=document.createElement("canvas").getContext("2d");return e.fillStyle=t,"#000"===e.fillStyle?null:e.fillStyle}(t):t;const e={cmyk:/^cmyk[\D]+([\d.]+)[\D]+([\d.]+)[\D]+([\d.]+)[\D]+([\d.]+)/i,rgba:/^((rgba)|rgb)[\D]+([\d.]+)[\D]+([\d.]+)[\D]+([\d.]+)[\D]*?([\d.]+|$)/i,hsla:/^((hsla)|hsl)[\D]+([\d.]+)[\D]+([\d.]+)[\D]+([\d.]+)[\D]*?([\d.]+|$)/i,hsva:/^((hsva)|hsv)[\D]+([\d.]+)[\D]+([\d.]+)[\D]+([\d.]+)[\D]*?([\d.]+|$)/i,hexa:/^#?(([\dA-Fa-f]{3,4})|([\dA-Fa-f]{6})|([\dA-Fa-f]{8}))$/i},o=t=>t.map(t=>/^(|\d+)\.\d+|\d+$/.test(t)?Number(t):void 0);let n;t:for(const i in e){if(!(n=e[i].exec(t)))continue;const r=t=>!!n[2]==("number"==typeof t);switch(i){case"cmyk":{const[,t,e,r,s]=o(n);if(t>100||e>100||r>100||s>100)break t;return{values:k(t,e,r,s),type:i}}case"rgba":{const[,,,t,e,s,c]=o(n);if(t>255||e>255||s>255||c<0||c>1||!r(c))break t;return{values:[...C(t,e,s),c],a:c,type:i}}case"hexa":{let[,t]=n;4!==t.length&&3!==t.length||(t=t.split("").map(t=>t+t).join(""));const e=t.substring(0,6);let o=t.substring(6);return o=o?parseInt(o,16)/255:void 0,{values:[...O(e),o],a:o,type:i}}case"hsla":{const[,,,t,e,s,c]=o(n);if(t>360||e>100||s>100||c<0||c>1||!r(c))break t;return{values:[...S(t,e,s),c],a:c,type:i}}case"hsva":{const[,,,t,e,s,c]=o(n);if(t>360||e>100||s>100||c<0||c>1||!r(c))break t;return{values:[t,e,s,c],a:c,type:i}}}}return{values:null,type:null}}function x(t=0,e=0,o=0,n=1){const i=(t,e)=>(o=-1)=>e(~o?t.map(t=>Number(t.toFixed(o))):t),r={h:t,s:e,v:o,a:n,toHSVA(){const t=[r.h,r.s,r.v,r.a];return t.toString=i(t,t=>"hsva(".concat(t[0],", ").concat(t[1],"%, ").concat(t[2],"%, ").concat(r.a,")")),t},toHSLA(){const t=[...A(r.h,r.s,r.v),r.a];return t.toString=i(t,t=>"hsla(".concat(t[0],", ").concat(t[1],"%, ").concat(t[2],"%, ").concat(r.a,")")),t},toRGBA(){const t=[...w(r.h,r.s,r.v),r.a];return t.toString=i(t,t=>"rgba(".concat(t[0],", ").concat(t[1],", ").concat(t[2],", ").concat(r.a,")")),t},toCMYK(){const t=function(t,e,o){const n=w(t,e,o),i=n[0]/255,r=n[1]/255,s=n[2]/255;let c,a,l,p;return c=b(1-i,1-r,1-s),a=1===c?0:(1-i-c)/(1-c),l=1===c?0:(1-r-c)/(1-c),p=1===c?0:(1-s-c)/(1-c),[100*a,100*l,100*p,100*c]}(r.h,r.s,r.v);return t.toString=i(t,t=>"cmyk(".concat(t[0],"%, ").concat(t[1],"%, ").concat(t[2],"%, ").concat(t[3],"%)")),t},toHEXA(){const t=function(t,e,o){return w(t,e,o).map(t=>_(t).toString(16).padStart(2,"0"))}(r.h,r.s,r.v),e=r.a>=1?"":Number((255*r.a).toFixed(0)).toString(16).toUpperCase().padStart(2,"0");return e&&t.push(e),t.toString=()=>"#".concat(t.join("").toUpperCase()),t},clone:()=>x(r.h,r.s,r.v,r.a)};return r}const E=t=>Math.max(Math.min(t,1),0);function L(t){const e={options:Object.assign({lock:null,onchange:()=>0,onstop:()=>0},t),_keyboard(t){const{type:n,key:i}=t;if(document.activeElement===o.wrapper){const{lock:o}=e.options,r="ArrowUp"===i,s="ArrowRight"===i,c="ArrowDown"===i,a="ArrowLeft"===i;if("keydown"===n&&(r||s||c||a)){let n=0,i=0;"v"===o?n=r||s?1:-1:"h"===o?n=r||s?-1:1:(i=r?-1:c?1:0,n=a?-1:s?1:0),e.update(E(e.cache.x+.01*n),E(e.cache.y+.01*i)),t.preventDefault()}else i.startsWith("Arrow")&&(e.options.onstop(),t.preventDefault())}},_tapstart(t){c(document,["mouseup","touchend","touchcancel"],e._tapstop),c(document,["mousemove","touchmove"],e._tapmove),t.preventDefault(),e._tapmove(t)},_tapmove(t){const{options:{lock:n},cache:i}=e,{element:r,wrapper:s}=o,c=s.getBoundingClientRect();let a=0,l=0;if(t){const e=t&&t.touches&&t.touches[0];a=t?(e||t).clientX:0,l=t?(e||t).clientY:0,a<c.left?a=c.left:a>c.left+c.width&&(a=c.left+c.width),l<c.top?l=c.top:l>c.top+c.height&&(l=c.top+c.height),a-=c.left,l-=c.top}else i&&(a=i.x*c.width,l=i.y*c.height);"h"!==n&&(r.style.left="calc(".concat(a/c.width*100,"% - ").concat(r.offsetWidth/2,"px)")),"v"!==n&&(r.style.top="calc(".concat(l/c.height*100,"% - ").concat(r.offsetHeight/2,"px)")),e.cache={x:a/c.width,y:l/c.height};const p=E(a/s.offsetWidth),u=E(l/s.offsetHeight);switch(n){case"v":return o.onchange(p);case"h":return o.onchange(u);default:return o.onchange(p,u)}},_tapstop(){e.options.onstop(),a(document,["mouseup","touchend","touchcancel"],e._tapstop),a(document,["mousemove","touchmove"],e._tapmove)},trigger(){e._tapmove()},update(t=0,o=0){const{left:n,top:i,width:r,height:s}=e.options.wrapper.getBoundingClientRect();"h"===e.options.lock&&(o=t),e._tapmove({clientX:n+r*t,clientY:i+s*o})},destroy(){const{options:t,_tapstart:o}=e;a([t.wrapper,t.element],"mousedown",o),a([t.wrapper,t.element],"touchstart",o,{passive:!1})}},{options:o,_tapstart:n,_keyboard:i}=e;return c([o.wrapper,o.element],"mousedown",n),c([o.wrapper,o.element],"touchstart",n,{passive:!1}),c(document,["keydown","keyup"],i),e}function P(t={}){t=Object.assign({onchange:()=>0,className:"",elements:[]},t);const e=c(t.elements,"click",e=>{t.elements.forEach(o=>o.classList[e.target===o?"add":"remove"](t.className)),t.onchange(e)});return{destroy:()=>a(...e)}}function B({el:t,reference:e,padding:o=8}){const n={start:"sme",middle:"mse",end:"ems"},i={top:"tbrl",right:"rltb",bottom:"btrl",left:"lrbt"},r=((t={})=>(e,o=t[e])=>{if(o)return o;const[n,i="middle"]=e.split("-"),r="top"===n||"bottom"===n;return t[e]={position:n,variant:i,isVertical:r}})();return{update(s,c=!1){const{position:a,variant:l,isVertical:p}=r(s),u=e.getBoundingClientRect(),h=t.getBoundingClientRect(),d=t=>t?{t:u.top-h.height-o,b:u.bottom+o}:{r:u.right+o,l:u.left-h.width-o},f=t=>t?{s:u.left+u.width-h.width,m:-h.width/2+(u.left+u.width/2),e:u.left}:{s:u.bottom-h.height,m:u.bottom-u.height/2-h.height/2,e:u.bottom-u.height},m={},v=(t,e,o)=>{const n="top"===o,i=n?h.height:h.width,r=window[n?"innerHeight":"innerWidth"];for(const n of t){const t=e[n],s=m[o]="".concat(t,"px");if(t>0&&t+i<r)return s}return null};for(const e of[p,!p]){const o=e?"top":"left",r=e?"left":"top",s=v(i[a],d(e),o),c=v(n[l],f(e),r);if(s&&c)return t.style[r]=c,void(t.style[o]=s)}c?(t.style.top="".concat((window.innerHeight-h.height)/2,"px"),t.style.left="".concat((window.innerWidth-h.width)/2,"px")):(t.style.left=m.left,t.style.top=m.top)}}}function H(t,e,o){return e in t?Object.defineProperty(t,e,{value:o,enumerable:!0,configurable:!0,writable:!0}):t[e]=o,t}class R{constructor(t){H(this,"_initializingActive",!0),H(this,"_recalc",!0),H(this,"_nanopop",null),H(this,"_root",null),H(this,"_color",x()),H(this,"_lastColor",x()),H(this,"_swatchColors",[]),H(this,"_eventListener",{init:[],save:[],hide:[],show:[],clear:[],change:[],changestop:[],cancel:[],swatchselect:[]}),this.options=t=Object.assign({appClass:null,theme:"classic",useAsButton:!1,padding:8,disabled:!1,comparison:!0,closeOnScroll:!1,outputPrecision:0,lockOpacity:!1,autoReposition:!0,container:"body",components:{interaction:{}},strings:{},swatches:null,inline:!1,sliders:null,default:"#42445a",defaultRepresentation:null,position:"bottom-middle",adjustableNumbers:!0,showAlways:!1,closeWithKey:"Escape"},t);const{swatches:e,components:o,theme:n,sliders:i,lockOpacity:r,padding:s}=t;["nano","monolith"].includes(n)&&!i&&(t.sliders="h"),o.interaction||(o.interaction={});const{preview:c,opacity:a,hue:l,palette:p}=o;o.opacity=!r&&a,o.palette=p||c||a||l,this._preBuild(),this._buildComponents(),this._bindEvents(),this._finalBuild(),e&&e.length&&e.forEach(t=>this.addSwatch(t));const{button:u,app:h}=this._root;this._nanopop=B({reference:u,padding:s,el:h}),u.setAttribute("role","button"),u.setAttribute("aria-label","toggle color picker dialog");const d=this;requestAnimationFrame((function e(){if(!h.offsetWidth&&h.parentElement!==t.container)return requestAnimationFrame(e);d.setColor(t.default),d._rePositioningPicker(),t.defaultRepresentation&&(d._representation=t.defaultRepresentation,d.setColorRepresentation(d._representation)),t.showAlways&&d.show(),d._initializingActive=!1,d._emit("init")}))}_preBuild(){const t=this.options;for(const e of["el","container"])t[e]=f(t[e]);this._root=(({components:t,strings:e,useAsButton:o,inline:n,appClass:i,theme:r,lockOpacity:s})=>{const c=t=>t?"":'style="display:none" hidden',a=h('\n      <div :ref="root" class="pickr">\n\n        '.concat(o?"":'<button type="button" :ref="button" class="pcr-button"></button>','\n\n        <div :ref="app" class="pcr-app ').concat(i||"",'" data-theme="').concat(r,'" ').concat(n?'style="position: unset"':"",' aria-label="color picker dialog" role="form">\n          <div class="pcr-selection" ').concat(c(t.palette),'>\n            <div :obj="preview" class="pcr-color-preview" ').concat(c(t.preview),'>\n              <button type="button" :ref="lastColor" class="pcr-last-color" aria-label="use previous color"></button>\n              <div :ref="currentColor" class="pcr-current-color"></div>\n            </div>\n\n            <div :obj="palette" class="pcr-color-palette">\n              <div :ref="picker" class="pcr-picker"></div>\n              <div :ref="palette" class="pcr-palette" tabindex="0" aria-label="color selection area" role="listbox"></div>\n            </div>\n\n            <div :obj="hue" class="pcr-color-chooser" ').concat(c(t.hue),'>\n              <div :ref="picker" class="pcr-picker"></div>\n              <div :ref="slider" class="pcr-hue pcr-slider" tabindex="0" aria-label="hue selection slider" role="slider"></div>\n            </div>\n\n            <div :obj="opacity" class="pcr-color-opacity" ').concat(c(t.opacity),'>\n              <div :ref="picker" class="pcr-picker"></div>\n              <div :ref="slider" class="pcr-opacity pcr-slider" tabindex="0" aria-label="opacity selection slider" role="slider"></div>\n            </div>\n          </div>\n\n          <div class="pcr-swatches ').concat(t.palette?"":"pcr-last",'" :ref="swatches"></div> \n\n          <div :obj="interaction" class="pcr-interaction" ').concat(c(Object.keys(t.interaction).length),'>\n            <input :ref="result" class="pcr-result" type="text" spellcheck="false" ').concat(c(t.interaction.input),'>\n\n            <input :arr="options" class="pcr-type" data-type="HEXA" value="').concat(s?"HEX":"HEXA",'" type="button" ').concat(c(t.interaction.hex),'>\n            <input :arr="options" class="pcr-type" data-type="RGBA" value="').concat(s?"RGB":"RGBA",'" type="button" ').concat(c(t.interaction.rgba),'>\n            <input :arr="options" class="pcr-type" data-type="HSLA" value="').concat(s?"HSL":"HSLA",'" type="button" ').concat(c(t.interaction.hsla),'>\n            <input :arr="options" class="pcr-type" data-type="HSVA" value="').concat(s?"HSV":"HSVA",'" type="button" ').concat(c(t.interaction.hsva),'>\n            <input :arr="options" class="pcr-type" data-type="CMYK" value="CMYK" type="button" ').concat(c(t.interaction.cmyk),'>\n\n            <input :ref="save" class="pcr-save" value="').concat(e.save||"Save",'" type="button" ').concat(c(t.interaction.save),' aria-label="save and exit">\n            <input :ref="cancel" class="pcr-cancel" value="').concat(e.cancel||"Cancel",'" type="button" ').concat(c(t.interaction.cancel),' aria-label="cancel and exit">\n            <input :ref="clear" class="pcr-clear" value="').concat(e.clear||"Clear",'" type="button" ').concat(c(t.interaction.clear),' aria-label="clear and exit">\n          </div>\n        </div>\n      </div>\n    ')),l=a.interaction;return l.options.find(t=>!t.hidden&&!t.classList.add("active")),l.type=()=>l.options.find(t=>t.classList.contains("active")),a})(t),t.useAsButton&&(this._root.button=t.el),t.container.appendChild(this._root.root)}_finalBuild(){const t=this.options,e=this._root;if(t.container.removeChild(e.root),t.inline){const o=t.el.parentElement;t.el.nextSibling?o.insertBefore(e.app,t.el.nextSibling):o.appendChild(e.app)}else t.container.appendChild(e.app);t.useAsButton?t.inline&&t.el.remove():t.el.parentNode.replaceChild(e.root,t.el),t.disabled&&this.disable(),t.comparison||(e.button.style.transition="none",t.useAsButton||(e.preview.lastColor.style.transition="none")),this.hide()}_buildComponents(){const t=this,e=this.options.components,o=(t.options.sliders||"v").repeat(2),[n,i]=o.match(/^[vh]+$/g)?o:[],r=()=>this._color||(this._color=this._lastColor.clone()),s={palette:L({element:t._root.palette.picker,wrapper:t._root.palette.palette,onstop:()=>t._emit("changestop",t),onchange(o,n){if(!e.palette)return;const i=r(),{_root:s,options:c}=t,{lastColor:a,currentColor:l}=s.preview;t._recalc&&(i.s=100*o,i.v=100-100*n,i.v<0&&(i.v=0),t._updateOutput());const p=i.toRGBA().toString(0);this.element.style.background=p,this.wrapper.style.background="\n                        linear-gradient(to top, rgba(0, 0, 0, ".concat(i.a,"), transparent),\n                        linear-gradient(to left, hsla(").concat(i.h,", 100%, 50%, ").concat(i.a,"), rgba(255, 255, 255, ").concat(i.a,"))\n                    "),c.comparison?c.useAsButton||t._lastColor||(a.style.color=p):(s.button.style.color=p,s.button.classList.remove("clear"));const u=i.toHEXA().toString();for(const{el:e,color:o}of t._swatchColors)e.classList[u===o.toHEXA().toString()?"add":"remove"]("pcr-active");l.style.color=p}}),hue:L({lock:"v"===i?"h":"v",element:t._root.hue.picker,wrapper:t._root.hue.slider,onstop:()=>t._emit("changestop",t),onchange(o){if(!e.hue||!e.palette)return;const n=r();t._recalc&&(n.h=360*o),this.element.style.backgroundColor="hsl(".concat(n.h,", 100%, 50%)"),s.palette.trigger()}}),opacity:L({lock:"v"===n?"h":"v",element:t._root.opacity.picker,wrapper:t._root.opacity.slider,onstop:()=>t._emit("changestop",t),onchange(o){if(!e.opacity||!e.palette)return;const n=r();t._recalc&&(n.a=Math.round(100*o)/100),this.element.style.background="rgba(0, 0, 0, ".concat(n.a,")"),s.palette.trigger()}}),selectable:P({elements:t._root.interaction.options,className:"active",onchange(e){t._representation=e.target.getAttribute("data-type").toUpperCase(),t._recalc&&t._updateOutput()}})};this._components=s}_bindEvents(){const{_root:t,options:e}=this,o=[c(t.interaction.clear,"click",()=>this._clearColor()),c([t.interaction.cancel,t.preview.lastColor],"click",()=>{this._emit("cancel",this),this.setHSVA(...(this._lastColor||this._color).toHSVA(),!0)}),c(t.interaction.save,"click",()=>{!this.applyColor()&&!e.showAlways&&this.hide()}),c(t.interaction.result,["keyup","input"],t=>{this.setColor(t.target.value,!0)&&!this._initializingActive&&this._emit("change",this._color),t.stopImmediatePropagation()}),c(t.interaction.result,["focus","blur"],t=>{this._recalc="blur"===t.type,this._recalc&&this._updateOutput()}),c([t.palette.palette,t.palette.picker,t.hue.slider,t.hue.picker,t.opacity.slider,t.opacity.picker],["mousedown","touchstart"],()=>this._recalc=!0)];if(!e.showAlways){const n=e.closeWithKey;o.push(c(t.button,"click",()=>this.isOpen()?this.hide():this.show()),c(document,"keyup",t=>this.isOpen()&&(t.key===n||t.code===n)&&this.hide()),c(document,["touchstart","mousedown"],e=>{this.isOpen()&&!d(e).some(e=>e===t.app||e===t.button)&&this.hide()},{capture:!0}))}if(e.adjustableNumbers){const e={rgba:[255,255,255,1],hsva:[360,100,100,1],hsla:[360,100,100,1],cmyk:[100,100,100,100]};m(t.interaction.result,(t,o,n)=>{const i=e[this.getColorRepresentation().toLowerCase()];if(i){const e=i[n],r=t+(e>=100?1e3*o:o);return r<=0?0:Number((r<e?r:e).toPrecision(3))}return t})}if(e.autoReposition&&!e.inline){let t=null;const n=this;o.push(c(window,["scroll","resize"],()=>{n.isOpen()&&(e.closeOnScroll&&n.hide(),null===t?(t=setTimeout(()=>t=null,100),requestAnimationFrame((function e(){n._rePositioningPicker(),null!==t&&requestAnimationFrame(e)}))):(clearTimeout(t),t=setTimeout(()=>t=null,100)))},{capture:!0}))}this._eventBindings=o}_rePositioningPicker(){const{options:t}=this;t.inline||this._nanopop.update(t.position,!this._recalc)}_updateOutput(){const{_root:t,_color:e,options:o}=this;if(t.interaction.type()){const n="to".concat(t.interaction.type().getAttribute("data-type"));t.interaction.result.value="function"==typeof e[n]?e[n]().toString(o.outputPrecision):""}!this._initializingActive&&this._recalc&&this._emit("change",e)}_clearColor(t=!1){const{_root:e,options:o}=this;o.useAsButton||(e.button.style.color="rgba(0, 0, 0, 0.15)"),e.button.classList.add("clear"),o.showAlways||this.hide(),this._lastColor=null,this._initializingActive||t||(this._emit("save",null),this._emit("clear",this))}_parseLocalColor(t){const{values:e,type:o,a:n}=j(t),{lockOpacity:i}=this.options,r=void 0!==n&&1!==n;return e&&3===e.length&&(e[3]=void 0),{values:!e||i&&r?null:e,type:o}}_emit(t,...e){this._eventListener[t].forEach(t=>t(...e,this))}on(t,e){return"function"==typeof e&&"string"==typeof t&&t in this._eventListener&&this._eventListener[t].push(e),this}off(t,e){const o=this._eventListener[t];if(o){const t=o.indexOf(e);~t&&o.splice(t,1)}return this}addSwatch(t){const{values:e}=this._parseLocalColor(t);if(e){const{_swatchColors:t,_root:o}=this,n=x(...e),i=p('<button type="button" style="color: '.concat(n.toRGBA().toString(0),'" aria-label="color swatch"/>'));return o.swatches.appendChild(i),t.push({el:i,color:n}),this._eventBindings.push(c(i,"click",()=>{this.setHSVA(...n.toHSVA(),!0),this._emit("swatchselect",n),this._emit("change",n)})),!0}return!1}removeSwatch(t){const e=this._swatchColors[t];if(e){const{el:o}=e;return this._root.swatches.removeChild(o),this._swatchColors.splice(t,1),!0}return!1}applyColor(t=!1){const{preview:e,button:o}=this._root,n=this._color.toRGBA().toString(0);return e.lastColor.style.color=n,this.options.useAsButton||(o.style.color=n),o.classList.remove("clear"),this._lastColor=this._color.clone(),this._initializingActive||t||this._emit("save",this._color),this}destroy(){this._eventBindings.forEach(t=>a(...t)),Object.keys(this._components).forEach(t=>this._components[t].destroy())}destroyAndRemove(){this.destroy();const{root:t,app:e}=this._root;t.parentElement&&t.parentElement.removeChild(t),e.parentElement.removeChild(e),Object.keys(this).forEach(t=>this[t]=null)}hide(){return this._root.app.classList.remove("visible"),this._emit("hide",this),this}show(){return this.options.disabled||(this._root.app.classList.add("visible"),this._rePositioningPicker(),this._emit("show",this)),this}isOpen(){return this._root.app.classList.contains("visible")}setHSVA(t=360,e=0,o=0,n=1,i=!1){const r=this._recalc;if(this._recalc=!1,t<0||t>360||e<0||e>100||o<0||o>100||n<0||n>1)return!1;this._color=x(t,e,o,n);const{hue:s,opacity:c,palette:a}=this._components;return s.update(t/360),c.update(n),a.update(e/100,1-o/100),i||this.applyColor(),r&&this._updateOutput(),this._recalc=r,!0}setColor(t,e=!1){if(null===t)return this._clearColor(e),!0;const{values:o,type:n}=this._parseLocalColor(t);if(o){const t=n.toUpperCase(),{options:i}=this._root.interaction,r=i.find(e=>e.getAttribute("data-type")===t);if(r&&!r.hidden)for(const t of i)t.classList[t===r?"add":"remove"]("active");return!!this.setHSVA(...o,e)&&this.setColorRepresentation(t)}return!1}setColorRepresentation(t){return t=t.toUpperCase(),!!this._root.interaction.options.find(e=>e.getAttribute("data-type").startsWith(t)&&!e.click())}getColorRepresentation(){return this._representation}getColor(){return this._color}getSelectedColor(){return this._lastColor}getRoot(){return this._root}disable(){return this.hide(),this.options.disabled=!0,this._root.button.classList.add("disabled"),this}enable(){return this.options.disabled=!1,this._root.button.classList.remove("disabled"),this}}R.utils=n,R.libs={HSVaColor:x,Moveable:L,Nanopop:B,Selectable:P},R.create=t=>new R(t),R.version=v.a;e.default=R}]).default}));

//</endFold>

//<beginFold> newColorPicker
FM.newColorPicker = function(container, defaultColor, callbackFunction, params){
  // -- Build Main Container
  // let container = document.createElement("div");
  container.classList.add("FP_containMultipleRangeInputs");

  // Build Default Input
  let defaultContainer = document.createElement("div");
  defaultContainer.classList.add("FP_subContainMultipleRangeInputs");
  container.appendChild(defaultContainer);
  let defaultInput = FM.newColorPickerHTML(defaultContainer, defaultColor, callbackFunction, params);
  // defaultInput.classList.add("--defaultInput");
  // defaultContainer.appendChild(defaultInput);

  // Setup Hover Container
  let hoverContainer = document.createElement("div");
  hoverContainer.classList.add("FP_hoverStateContainer");
  hoverContainer.classList.add("--hide");
  container.appendChild(hoverContainer);
  let hoverButton = document.createElement("div");
  hoverButton.classList.add("FP_buttonSelector_button");
  hoverButton.classList.add("--hoverToggle");
  hoverButton.style.marginBottom = "7px";
  hoverButton.innerHTML = FM.language["activateHover"];
  hoverContainer.appendChild(hoverButton);

  // Hover
  let hoverInputContainer = document.createElement("div");
  hoverInputContainer.classList.add("FP_subContainMultipleRangeInputs");
  hoverInputContainer.classList.add("--hoverInputContainer");
  hoverInputContainer.classList.add("--hoverInput");
  hoverInputContainer.classList.add("--hide");
  hoverInputContainer.innerHTML = "Value on Hover: ";
  hoverContainer.appendChild(hoverInputContainer);
  let hoverInput = document.createElement("div");
  hoverInputContainer.appendChild(hoverInput);
  FM.newColorPickerHTML(hoverInput, defaultColor, callbackFunction, params, hoverInputContainer);

  // Duration
  let durationContainer = document.createElement("div");
  durationContainer.classList.add("FP_subContainMultipleRangeInputs");
  durationContainer.classList.add("--durationInputContainer");
  durationContainer.classList.add("--hide");
  durationContainer.innerHTML = "Hover Animation Time: ";
  let durationInput = FM.buildRangedInputHTML(0, 1, 0);
  durationInput.classList.add("--durationInput");
  durationContainer.appendChild(durationInput);
  hoverContainer.appendChild(durationContainer);

  // Easing
  let easingContainer = document.createElement("div");
  easingContainer.classList.add("FP_subContainMultipleRangeInputs");
  easingContainer.classList.add("--easingInputContainer");
  easingContainer.classList.add("--hide");
  // easingContainer.innerHTML = "Hover Easing: ";
  let easingInput = FM.dropDown(FM.easings, "linear");
  easingInput.classList.add("--easingInput");
  easingContainer.appendChild(easingInput);
  hoverContainer.appendChild(easingContainer);

  // Append Inputs To Main Container
  // container.appendChild(defaultContainer);
  container.appendChild(hoverContainer);

  return container;
}
//</endFold>

//<beginFold> newColorPickerHTML
FM.newColorPickerHTML = function(container, defaultColor, callbackFunction, params, hoverContainer){
  var rgbToHex = function (rgb) {
    var hex = Number(rgb).toString(16);
    if (hex.length < 2) { hex = "0" + hex; }
    return hex;
  };
  if(typeof defaultColor == "string"){
    defaultColor = FM.rgbaToArray(defaultColor);
  }
  if(defaultColor[3] > 1){ defaultColor[3] = 1; }
  var fullColorHex = function() {
    var red = rgbToHex(defaultColor[0]);
    var green = rgbToHex(defaultColor[1]);
    var blue = rgbToHex(defaultColor[2]);
    var alpha = rgbToHex(parseInt(defaultColor[3] * 255));
    return red+green+blue+alpha;
  };

  const pickr = Pickr.create({
      el: container,
      container: container,
      theme: 'classic',
      inline: true,
      default: "#"+fullColorHex(),
      swatches: null,
      useAsButton: false,
      // showAlways: true,
      components: {
          // Main components
          opacity: true,
          hue: true,
          // Input / output Options
          interaction: {
              hex: true,
              rgba: true,
              hsla: true,
              hsva: true,
              cmyk: true,
              input: true,
              clear: true,
              save: true
          }
      }
  });
  pickr.on('change', (color, instance) => {
    pickr.applyColor(color);
    let moddedParams = [];
    if(hoverContainer != undefined){
      params = hoverContainer.params;
    }
    for(var i=0; i<params.length; i++){
      if(params[i] == "uiValue"){
        let rgbColor = color.toRGBA(color);
        moddedParams.push([Math.round(rgbColor[0]), Math.round(rgbColor[1]), Math.round(rgbColor[2]), rgbColor[3]]);
      }else{
        moddedParams.push(params[i]);
      }
    }
    if(hoverContainer != undefined){
      FM[hoverContainer.function](moddedParams);
    }else{
      FM[callbackFunction](moddedParams);
    }
  })

  if(hoverContainer != undefined){
    hoverContainer.setValue = function(hoverValue){
      if(hoverValue != 0){
        pickr.setColor(FM.sanatizeTextValue(hoverValue));
      }
    }
  }

}
//</endFold>

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// -- Group Container -------------------------------------------------
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//<beginFold> groupContainer
FM.groupContainer = function(packageName, containerName, startOpened, additionalClassName){
  if(packageName == null){ return; }
  let controlGroupContainer = document.createElement("div");
  controlGroupContainer.classList.add("FM_controlGroupContainer");
  if(startOpened == true){
    controlGroupContainer.classList.add("--active");
  }
  if(additionalClassName != undefined){
    controlGroupContainer.classList.add(additionalClassName);
  }

  // Determine if this container needs to be in an opend state
  if(FM.controlGroupData[packageName] == undefined){
    FM.controlGroupData[packageName] = {};
  }
  if(FM.controlGroupData[packageName][containerName] == undefined){
    FM.controlGroupData[packageName][containerName] = false;
  }

  // Build Group Lable
  let groupLable = document.createElement("div");
  groupLable.classList.add("FM_groupLabel");
  if(FM.controlGroupData[packageName][containerName] == true){
    controlGroupContainer.classList.add("--active");
  }
  let groupLableHTML = "";
  groupLableHTML += "<span>" + containerName + "</span>";
  groupLableHTML += '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>';
  groupLable.innerHTML = groupLableHTML;
  groupLable.onclick = function(){
    if(controlGroupContainer.classList.contains("--active")){
      FM.controlGroupData[packageName][containerName] = false;
      controlGroupContainer.classList.remove("--active");
    }else{
      FM.controlGroupData[packageName][containerName] = true;
      controlGroupContainer.classList.add("--active");
    }
  }
  controlGroupContainer.appendChild( groupLable );

  return controlGroupContainer;
}
//</endFold>

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// -- Text Input ------------------------------------------------------
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//<beginFold> buildTextInput
FM.buildTextInput = function(defaultValue, placeHolder){
  let textValueInput = document.createElement("input");
  textValueInput.setAttribute("type", "text");
  textValueInput.classList.add("FM_textInput");

  textValueInput.placeholder = placeHolder;
  if(defaultValue == "&amp;"){
    defaultValue = "&";
  }
  textValueInput.value = defaultValue;
  return textValueInput;
}
//</endFold>

//<beginFold> addTextInputActions
FM.addTextInputActions = function(textValueInput, callback, params){
  textValueInput.onchange = function(){
    window.requestAnimationFrame(delayRAF);
  };
  textValueInput.oninput = function(){
    window.requestAnimationFrame(delayRAF);
  };

  function delayRAF(){
    let moddedParams = [];
    for(var i=0; i<params.length; i++){
      if(params[i] == "uiValue"){
        moddedParams.push(textValueInput.value);
      }else{
        moddedParams.push(params[i]);
      }
    }
    FM[callback](moddedParams);
  }

}
//</endFold>


// *******************************
// -- Create Editor UI -----------
// *******************************
// *******************************************
// -- Create Editor Master Function ----------
// *******************************************
  //<beginFold> createCompositionEditor
  FM.createCompositionEditor = function(transition){
    let container = FM.createCompEditContainer();

    // Loader
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
    container.appendChild(loaderContainer);

    // Top Bar
    let topBar = FM.createCompEditTopBar();
    container.appendChild(topBar);

    // Bottom Section
    let editorContainer = FM.createEditorContainer();
    container.appendChild(editorContainer);

    if(transition == undefined){
      let componentBar = FM.createElementBar();
      editorContainer.appendChild(componentBar);
    }

    let compositionPreview = FM.createCompositionPreview(transition);
    editorContainer.appendChild(compositionPreview);

    let elementConfiguration = FM.createElementConfiguration();
    editorContainer.appendChild(elementConfiguration);

    // Ranged Input Tool Tip
    let toolTip = document.createElement("div");
    toolTip.classList.add("toolTip");
    let toolTip_info = document.createElement("div");
    toolTip_info.classList.add("toolTip_info");
    toolTip.appendChild(toolTip_info);
    editorContainer.appendChild(toolTip);

    document.body.appendChild(container);

    return container;
  }
  //</endFold>

  //<beginFold> createEasyCompositionEditor
  FM.createEasyCompositionEditor = function(){
    let container = FM.createCompEditContainer();

    // Loader
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
    container.appendChild(loaderContainer);

    // Top Bar
    let topBar = FM.createCompEditTopBar();
    container.appendChild(topBar);

    // Bottom Section
    let editorContainer = FM.createEditorContainer();
    container.appendChild(editorContainer);

    if(transition != true){
      let componentBar = FM.createElementBar();
      editorContainer.appendChild(componentBar);
    }

    let compositionPreview = FM.createCompositionPreview(transition);
    editorContainer.appendChild(compositionPreview);

    let elementConfiguration = FM.createElementConfiguration();
    editorContainer.appendChild(elementConfiguration);

    // Ranged Input Tool Tip
    let toolTip = document.createElement("div");
    toolTip.classList.add("toolTip");
    let toolTip_info = document.createElement("div");
    toolTip_info.classList.add("toolTip_info");
    toolTip.appendChild(toolTip_info);
    editorContainer.appendChild(toolTip);

    document.body.appendChild(container);

    return container;
  }
  //</endFold>

  //<beginFold> createPreviewCompositionEditor
  FM.createPreviewCompositionEditor = function(){
    let container = FM.createCompEditContainer();

    // Loader
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
    container.appendChild(loaderContainer);

    // Top Bar
    let topBar = FM.createCompEditTopBar();
    container.appendChild(topBar);

    // Bottom Section
    let editorContainer = FM.createEditorContainer();
    container.appendChild(editorContainer);

    let compositionPreview = FM.createCompleteCompositionPreview();
    editorContainer.appendChild(compositionPreview);

    document.body.appendChild(container);

    return container;
  }
  //</endFold>

// *******************************************
// -- Editor Components ----------------------
// *******************************************
  // Static Containers
  //<beginFold> createCompEditContainer
  FM.createCompEditContainer = function(className){
    var div = document.createElement("div");
    div.classList.add("FP_compContainer");
    if(className != undefined){
      div.classList.add(className);
    }

    return div;
  }
  //</endFold>

  //<beginFold> createCompEditTopBar
  FM.createCompEditTopBar = function(spacerTitle){
    let topBar = document.createElement("div");
    topBar.classList.add("FP_compTopBar");

    let logoContainer = document.createElement("div");
    logoContainer.classList.add("FP_compTopBar_LogoContainer");
    topBar.appendChild(logoContainer);

    let logo = document.createElement("div");
    logo.classList.add("FP_compTopBar_Logo");
    logoContainer.appendChild(logo);

    let spacer = document.createElement("div");
    spacer.classList.add("FP_flexSpacer");
    if(spacerTitle != undefined){
      spacer.classList.add("--title");
      spacer.innerHTML = spacerTitle;
    }
    topBar.appendChild(spacer);

    let buttonContainer = document.createElement("div");
    buttonContainer.classList.add("FP_compTopBar_ButtonContainer");
    topBar.appendChild(buttonContainer);

    // let tutorialButton = document.createElement("div");
    // tutorialButton.classList.add("FP_compTopBar_Button");
    // tutorialButton.classList.add("--white");
    // tutorialButton.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M10,16.5L16,12L10,7.5V16.5Z" /></svg>' + "How it works";
    // buttonContainer.appendChild(tutorialButton);

    let saveButton = document.createElement("div");
    saveButton.classList.add("FP_compTopBar_Button");
    saveButton.classList.add("--blue");
    saveButton.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z" /></svg>' + "Return to Wordpress";
    saveButton.onclick = function(){
      FM.closeEditor();
    }
    buttonContainer.appendChild(saveButton);


    return topBar;
  }
  //</endFold>

  //<beginFold> createCompEditTopBarWide
  FM.createCompEditTopBarWide = function(spacerTitle){
    let topBar = document.createElement("div");
    topBar.classList.add("FP_compTopBar");
    topBar.classList.add("--wide");

    let logoContainer = document.createElement("div");
    logoContainer.classList.add("FP_compTopBar_LogoContainer");
    topBar.appendChild(logoContainer);

    let logo = document.createElement("div");
    logo.classList.add("FP_compTopBar_Logo");
    logoContainer.appendChild(logo);

    let spacer = document.createElement("div");
    spacer.classList.add("FP_flexSpacer");
    if(spacerTitle != undefined){
      spacer.classList.add("--title");
      spacer.innerHTML = spacerTitle;
    }
    topBar.appendChild(spacer);

    let buttonContainer = document.createElement("div");
    buttonContainer.classList.add("FP_compTopBar_ButtonContainer");
    topBar.appendChild(buttonContainer);

    let saveButton = document.createElement("div");
    saveButton.classList.add("FP_compTopBar_Button");
    saveButton.classList.add("--blue");
    saveButton.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z" /></svg>' + "Return to Wordpress";
    saveButton.onclick = function(){
      FM.closeEditor();
    }
    buttonContainer.appendChild(saveButton);


    return topBar;
  }
  //</endFold>

  //<beginFold> createEditorContainer
  FM.createEditorContainer = function(){
    var div = document.createElement("div");
    div.classList.add("FP_compEditorContainer");
    return div;
  }
  //</endFold>

  // Configurable UI Components
  //<beginFold> createElementBar
  FM.createElementBar = function(){
    let container = document.createElement("div");
    container.classList.add("FP_compComponentBar");

    let subContainer = document.createElement("div");
    subContainer.classList.add("FP_compComponentBar_SubContainer");
    container.appendChild(subContainer);

    let description = document.createElement("div");
    description.classList.add("FP_compComponentBar_Block");
    description.classList.add("FP_compComponentBar_Description");
    description.innerHTML = FM.language["Title1"];
    subContainer.appendChild(description);

    // Image
    let imageBlock = document.createElement("div");
    imageBlock.classList.add("FP_compComponentBar_Block");
    imageBlock.classList.add("FP_compComponentBar_Component");
    imageBlock.classList.add("--image");
    imageBlock.onclick = function(){
      FM.buildImageControls();
    }
    let imageBlockHTML = "";
    imageBlockHTML += "<div>";
    imageBlockHTML += `<?xml version="1.0" encoding="UTF-8"?>
    <svg width="49px" height="37px" viewBox="0 0 49 37" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g class="FP_compComponentBar_Block_Color" transform="translate(-26.000000, -187.000000)" fill-rule="nonzero">
                <g transform="translate(-14.000000, 79.000000)">
                    <g transform="translate(40.000000, 108.000000)">
                        <g>
                            <path d="M0,0 L0,36.6795018 L48.1536024,36.6795018 L48.1536024,0 L0,0 Z M45.3321022,33.8580017 L4.81658289,33.8580017 L14.5777507,24.0968338 L20.314801,29.8338841 L37.2438018,12.9048833 L45.3321022,20.9931837 L45.3321022,33.8580017 Z M45.3321022,17.0030182 L37.2438018,8.91471779 L20.314801,25.8437186 L14.5777507,20.1066683 L2.82150014,31.8629189 L2.82150014,2.82150014 L45.3321022,2.82150014 L45.3321022,17.0030182 Z" id="Shape"></path>
                            <path d="M14.5777507,5.64300028 C11.4662004,5.64300028 8.93475044,8.1744502 8.93475044,11.2860006 C8.93475044,14.3975509 11.4662004,16.9290008 14.5777507,16.9290008 C17.6893011,16.9290008 20.220751,14.3975509 20.220751,11.2860006 C20.220751,8.1744502 17.6893011,5.64300028 14.5777507,5.64300028 Z M14.5777507,14.1075007 C13.0219755,14.1075007 11.7562506,12.8417757 11.7562506,11.2860006 C11.7562506,9.73022538 13.0219755,8.46450041 14.5777507,8.46450041 C16.1335259,8.46450041 17.3992509,9.73022538 17.3992509,11.2860006 C17.3992509,12.8417757 16.1335259,14.1075007 14.5777507,14.1075007 Z" id="Shape"></path>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </svg>`;
    imageBlockHTML += "<br>" + FM.language["Element1"];
    imageBlockHTML += "</div>";
    imageBlock.innerHTML = imageBlockHTML;
    subContainer.appendChild(imageBlock);

    // Color Correction
    if(FM.editorState == "composition"){
      let colorCorrectionBlock = document.createElement("div");
      colorCorrectionBlock.classList.add("FP_compComponentBar_Block");
      colorCorrectionBlock.classList.add("FP_compComponentBar_Component");
      colorCorrectionBlock.classList.add("--colorCorrection");
      colorCorrectionBlock.onclick = function(){
        FM.buildColorCorrectionControls();
      }
      let colorCorrectionBlockHTML = "";
      colorCorrectionBlockHTML += "<div>";
      colorCorrectionBlockHTML += '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,9A1.5,1.5 0 0,1 19,10.5A1.5,1.5 0 0,1 17.5,12M14.5,8A1.5,1.5 0 0,1 13,6.5A1.5,1.5 0 0,1 14.5,5A1.5,1.5 0 0,1 16,6.5A1.5,1.5 0 0,1 14.5,8M9.5,8A1.5,1.5 0 0,1 8,6.5A1.5,1.5 0 0,1 9.5,5A1.5,1.5 0 0,1 11,6.5A1.5,1.5 0 0,1 9.5,8M6.5,12A1.5,1.5 0 0,1 5,10.5A1.5,1.5 0 0,1 6.5,9A1.5,1.5 0 0,1 8,10.5A1.5,1.5 0 0,1 6.5,12M12,3A9,9 0 0,0 3,12A9,9 0 0,0 12,21A1.5,1.5 0 0,0 13.5,19.5C13.5,19.11 13.35,18.76 13.11,18.5C12.88,18.23 12.73,17.88 12.73,17.5A1.5,1.5 0 0,1 14.23,16H16A5,5 0 0,0 21,11C21,6.58 16.97,3 12,3Z" /></svg>';
      colorCorrectionBlockHTML += "<br>" + FM.language["Element2"];
      colorCorrectionBlockHTML += "</div>";
      colorCorrectionBlock.innerHTML = colorCorrectionBlockHTML;
      subContainer.appendChild(colorCorrectionBlock);

      // Effects
      let effectsBlock = document.createElement("div");
      effectsBlock.classList.add("FP_compComponentBar_Block");
      effectsBlock.classList.add("FP_compComponentBar_Component");
      effectsBlock.classList.add("--effects");
      effectsBlock.onclick = function(){
        FM.buildEffectControls();
      }
      let effectsBlockHTML = "";
      effectsBlockHTML += "<div>";
      effectsBlockHTML += '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M7.5,5.6L5,7L6.4,4.5L5,2L7.5,3.4L10,2L8.6,4.5L10,7L7.5,5.6M19.5,15.4L22,14L20.6,16.5L22,19L19.5,17.6L17,19L18.4,16.5L17,14L19.5,15.4M22,2L20.6,4.5L22,7L19.5,5.6L17,7L18.4,4.5L17,2L19.5,3.4L22,2M13.34,12.78L15.78,10.34L13.66,8.22L11.22,10.66L13.34,12.78M14.37,7.29L16.71,9.63C17.1,10 17.1,10.65 16.71,11.04L5.04,22.71C4.65,23.1 4,23.1 3.63,22.71L1.29,20.37C0.9,20 0.9,19.35 1.29,18.96L12.96,7.29C13.35,6.9 14,6.9 14.37,7.29Z" /></svg>';
      effectsBlockHTML += "<br>" + FM.language["Element3"];
      effectsBlockHTML += "</div>";
      effectsBlock.innerHTML = effectsBlockHTML;
      subContainer.appendChild(effectsBlock);
    }


    // Text
    let textBlock = document.createElement("div");
    textBlock.classList.add("FP_compComponentBar_Block");
    textBlock.classList.add("FP_compComponentBar_Component");
    textBlock.classList.add("--text");
    textBlock.onclick = function(){
      FM.buildTextControls();
    }
    let textBlockHTML = "";
    textBlockHTML += "<div>";
    textBlockHTML += `<?xml version="1.0" encoding="UTF-8"?>
    <svg width="41px" height="41px" viewBox="0 0 41 41" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g class="FP_compComponentBar_Block_Color" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-30.000000, -330.000000)" fill-rule="nonzero">
                <g transform="translate(-14.000000, 79.000000)">
                    <g transform="translate(44.000000, 251.000000)">
                        <g >
                            <rect id="Rectangle" transform="translate(28.186220, 14.155495) rotate(165.054927) translate(-28.186220, -14.155495) " x="26.906825" y="12.8754596" width="2.55879021" height="2.56007025"></rect>
                            <polygon id="Path" points="10.9497602 38.4000006 3.37984005 38.4000006 12.9376002 2.56000004 23.7689604 2.56000004 24.6432004 5.83168009 27.1161604 5.17248008 25.7376004 0 10.9689602 0 0.0467200007 40.9600006 12.9824002 40.9600006 14.7744002 33.2800005 18.3532803 33.2800005 18.3532803 30.7200005 12.7417602 30.7200005"></polygon>
                            <rect id="Rectangle" transform="translate(26.866315, 9.211778) rotate(165.096631) translate(-26.866315, -9.211778) " x="25.5862631" y="7.93172655" width="2.56010346" height="2.56010346"></rect>
                            <polygon id="Path" points="19.8368003 7.68000011 16.8697603 7.68000011 12.0915202 25.6000004 18.3532803 25.6000004 18.3532803 23.0400003 15.4246402 23.0400003 18.3532803 12.0537602 19.3235203 15.6902402 21.7952003 15.0297602"></polygon>
                            <path d="M32.4332805,17.9200003 L20.9132803,17.9200003 L20.9132803,25.6000004 L31.1532805,25.6000004 C31.8602405,25.6000004 32.4332805,26.1730404 32.4332805,26.8800004 L32.4332805,28.1600004 L27.3132804,28.1600004 C23.7786404,28.1600004 20.9132803,31.0253605 20.9132803,34.5600005 C20.9132803,38.0946406 23.7786404,40.9600006 27.3132804,40.9600006 L40.1132806,40.9600006 L40.1132806,25.6000004 C40.1090406,21.3602403 36.6730405,17.9242403 32.4332805,17.9200003 Z M37.5532806,38.4000006 L27.3132804,38.4000006 C25.1924804,38.4000006 23.4732803,36.6808005 23.4732803,34.5600005 C23.4732803,32.4392005 25.1924804,30.7200005 27.3132804,30.7200005 L34.9932805,30.7200005 L34.9932805,26.8800004 C34.9932805,24.7592004 33.2740805,23.0400003 31.1532805,23.0400003 L23.4732803,23.0400003 L23.4732803,20.4800003 L32.4332805,20.4800003 C35.2609605,20.4800003 37.5532806,22.7723203 37.5532806,25.6000004 L37.5532806,38.4000006 Z" id="Shape"></path>
                            <rect id="Rectangle" x="27.3132804" y="33.2800005" width="7.68000011" height="2.56000004"></rect>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </svg>`;
    textBlockHTML += "<br>" + FM.language["Element4"];
    textBlockHTML += "</div>";
    textBlock.innerHTML = textBlockHTML;
    subContainer.appendChild(textBlock);

    if(FM.editorState == "composition"){
      // Text Reveal
      let textRevealBlock = document.createElement("div");
      textRevealBlock.classList.add("FP_compComponentBar_Block");
      textRevealBlock.classList.add("FP_compComponentBar_Component");
      textRevealBlock.classList.add("--textReveal");
      textRevealBlock.onclick = function(){
        FM.buildTextRevealControls();
      }
      let textRevealBlockHTML = "";
      textRevealBlockHTML += "<div>";
      textRevealBlockHTML += '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M20.84 2.18L16.91 2.96L19.65 6.5L21.62 6.1L20.84 2.18M13.97 3.54L12 3.93L14.75 7.46L16.71 7.07L13.97 3.54M9.07 4.5L7.1 4.91L9.85 8.44L11.81 8.05L9.07 4.5M4.16 5.5L3.18 5.69A2 2 0 0 0 1.61 8.04L2 10L6.9 9.03L4.16 5.5M2 10V20C2 21.11 2.9 22 4 22H20C21.11 22 22 21.11 22 20V10H2Z" /></svg>';
      textRevealBlockHTML += "<br>" + FM.language["Element5"];
      textRevealBlockHTML += "</div>";
      textRevealBlock.innerHTML = textRevealBlockHTML;
      subContainer.appendChild(textRevealBlock);
    }

    return container;
  }
  //</endFold>

  //<beginFold> createCompositionPreview
  FM.createCompositionPreview = function(transition){
    let container = document.createElement("div");
    container.classList.add("FP_compCompositionPreview");

    if(transition == undefined){
      let description = document.createElement("div");
      description.classList.add("FP_compCompositionPreview_Description");
      description.innerHTML = FM.language["Title2"];
      container.appendChild(description);
    }else{
      let description = document.createElement("div");
      description.classList.add("FP_compCompositionPreview_Description");
      description.innerHTML = FM.language["Title4"];
      container.appendChild(description);
    }

    // Create Composition Canvas
    let desiredAR = FM.fullCompData.aspectRatio;
    let previewContainer = document.createElement("div");
    previewContainer.classList.add("FP_compCompositionPreview_Preview");

    let inner1PreviewContainer = document.createElement("div");
    inner1PreviewContainer.classList.add("FP_compositionPreview_Inner1");
    previewContainer.appendChild(inner1PreviewContainer);

    let inner2PreviewContainer = document.createElement("div");
    inner2PreviewContainer.classList.add("FP_compositionPreview_Inner2");
    inner2PreviewContainer.style.paddingBottom = ((1/desiredAR)*100) + "%";
    inner1PreviewContainer.appendChild(inner2PreviewContainer);

    let inner3PreviewContainer = document.createElement("div");
    inner3PreviewContainer.classList.add("FP_compositionPreview_Inner3");
    inner2PreviewContainer.appendChild(inner3PreviewContainer);

    let compImage = document.createElement("img");
    compImage.src = FM.emptyImg;
    compImage.classList.add("FP_image");
    compImage.classList.add("FP_hide");
    inner3PreviewContainer.appendChild(compImage);

    let compColorCorrection = document.createElement("canvas");
    compColorCorrection.classList.add("FP_colorCorrection");
    compColorCorrection.classList.add("FP_hide");
    inner3PreviewContainer.appendChild(compColorCorrection);

    let compEffects = document.createElement("canvas");
    compEffects.classList.add("FP_effects");
    compEffects.classList.add("FP_hide");
    inner3PreviewContainer.appendChild(compEffects);

    let textDragControls = document.createElement("div");
    textDragControls.classList.add("FP_textDragControlContainer");
    inner3PreviewContainer.appendChild(textDragControls);

    let compText = document.createElement("canvas");
    compText.classList.add("FP_text");
    compText.classList.add("FP_hide");
    inner3PreviewContainer.appendChild(compText);

    if(transition != true){
      let compTextReveal = document.createElement("canvas");
      compTextReveal.classList.add("FP_textReveal");
      inner3PreviewContainer.appendChild(compTextReveal);
    }

    if(transition == true){
      let compImage2 = document.createElement("img");
      compImage2.src = FM.emptyImg;
      compImage2.classList.add("FP_image2");
      compImage2.classList.add("FP_hide");
      inner3PreviewContainer.appendChild(compImage2);

      let compColorCorrection2 = document.createElement("canvas");
      compColorCorrection2.classList.add("FP_colorCorrection2");
      compColorCorrection2.classList.add("FP_hide");
      inner3PreviewContainer.appendChild(compColorCorrection2);

      let compEffects2 = document.createElement("canvas");
      compEffects2.classList.add("FP_effects2");
      compEffects2.classList.add("FP_hide");
      inner3PreviewContainer.appendChild(compEffects2);

      let textDragControls2 = document.createElement("div");
      textDragControls2.classList.add("FP_textDragControlContainer2");
      inner3PreviewContainer.appendChild(textDragControls2);

      let compText2 = document.createElement("canvas");
      compText2.classList.add("FP_text2");
      compText2.classList.add("FP_hide");
      inner3PreviewContainer.appendChild(compText2);

      let compTransition = document.createElement("canvas");
      compTransition.classList.add("FP_transition");
      inner3PreviewContainer.appendChild(compTransition);
    }


    container.appendChild(previewContainer);
    return container;
  }
  //</endFold>

  //<beginFold> createCompleteCompositionPreview
  FM.createCompleteCompositionPreview = function(){
    let container = document.createElement("div");
    container.classList.add("FP_compCompositionPreview");

    let description = document.createElement("div");
    description.classList.add("FP_compCompositionPreview_Description");
    description.innerHTML = "Preview Video";
    container.appendChild(description);

    // Create Composition Canvas
    let desiredAR = FM.fullCompData.aspectRatio;
    let previewContainer = document.createElement("div");
    previewContainer.classList.add("FP_compCompositionPreview_Preview");

    let inner1PreviewContainer = document.createElement("div");
    inner1PreviewContainer.classList.add("FP_compositionPreview_Inner1");
    previewContainer.appendChild(inner1PreviewContainer);

    let inner2PreviewContainer = document.createElement("div");
    inner2PreviewContainer.classList.add("FP_compositionPreview_Inner2");
    inner2PreviewContainer.style.paddingBottom = ((1/desiredAR)*100) + "%";
    inner1PreviewContainer.appendChild(inner2PreviewContainer);

    let inner3PreviewContainer = document.createElement("div");
    inner3PreviewContainer.classList.add("FP_compositionPreview_Inner3");
    inner2PreviewContainer.appendChild(inner3PreviewContainer);

    let slide1Container = document.createElement("div");
    slide1Container.classList.add("FP_slide1");
    inner3PreviewContainer.appendChild(slide1Container);

    let slide2Container = document.createElement("div");
    slide2Container.classList.add("FP_slide2");
    inner3PreviewContainer.appendChild(slide2Container);

    let compImage = document.createElement("img");
    compImage.src = FM.emptyImg;
    compImage.classList.add("FP_image");
    compImage.classList.add("FP_hide");
    slide1Container.appendChild(compImage);

    let compColorCorrection = document.createElement("canvas");
    compColorCorrection.classList.add("FP_colorCorrection");
    compColorCorrection.classList.add("FP_hide");
    slide1Container.appendChild(compColorCorrection);

    let compEffects = document.createElement("canvas");
    compEffects.classList.add("FP_effects");
    compEffects.classList.add("FP_hide");
    slide1Container.appendChild(compEffects);

    let compText = document.createElement("canvas");
    compText.classList.add("FP_text");
    compText.classList.add("FP_hide");
    slide1Container.appendChild(compText);

    let compTextReveal = document.createElement("canvas");
    compTextReveal.classList.add("FP_textReveal");
    compTextReveal.classList.add("FP_hide");
    slide1Container.appendChild(compTextReveal);

    let compTransition = document.createElement("canvas");
    compTransition.classList.add("FP_transition");
    compTransition.classList.add("FP_hide");
    slide1Container.appendChild(compTransition);


    let compImage2 = document.createElement("img");
    compImage2.src = FM.emptyImg;
    compImage2.classList.add("FP_image");
    compImage2.classList.add("FP_hide");
    slide2Container.appendChild(compImage2);

    let compColorCorrection2 = document.createElement("canvas");
    compColorCorrection2.classList.add("FP_colorCorrection");
    compColorCorrection2.classList.add("FP_hide");
    slide2Container.appendChild(compColorCorrection2);

    let compEffects2 = document.createElement("canvas");
    compEffects2.classList.add("FP_effects");
    compEffects2.classList.add("FP_hide");
    slide2Container.appendChild(compEffects2);

    let textDragControls2 = document.createElement("div");
    textDragControls2.classList.add("FP_textDragControlContainer2");
    slide2Container.appendChild(textDragControls2);

    let compText2 = document.createElement("canvas");
    compText2.classList.add("FP_text");
    compText2.classList.add("FP_hide");
    slide2Container.appendChild(compText2);

    let compTextReveal2 = document.createElement("canvas");
    compTextReveal2.classList.add("FP_textReveal");
    compTextReveal2.classList.add("FP_hide");
    slide2Container.appendChild(compTextReveal2);

    let compTransition2 = document.createElement("canvas");
    compTransition2.classList.add("FP_transition");
    compTransition2.classList.add("FP_hide");
    slide2Container.appendChild(compTransition2);


    container.appendChild(previewContainer);
    return container;
  }
  //</endFold>

  //<beginFold> createElementConfiguration
  FM.createElementConfiguration = function(){
    let container = document.createElement("div");
    container.classList.add("FP_compElementConfiguration");

    let description = document.createElement("div");
    description.classList.add("FP_compElementConfiguration_Description");
    let descriptionHTML = "";
    descriptionHTML += '<img style="position: absolute;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMjZweCIgaGVpZ2h0PSIyNnB4IiB2aWV3Qm94PSIwIDAgMjYgMjYiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogU2tldGNoIDYyICg5MTM5MCkgLSBodHRwczovL3NrZXRjaC5jb20gLS0+CiAgICA8dGl0bGU+c2V0dGluZ3MgKDMpPC90aXRsZT4KICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPgogICAgPGcgaWQ9IlBhZ2UtMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPGcgaWQ9IjAxLi1JbWFnZSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTExMjMuMDAwMDAwLCAtMTAxLjAwMDAwMCkiIGZpbGw9IiNEN0UzRjAiIGZpbGwtcnVsZT0ibm9uemVybyI+CiAgICAgICAgICAgIDxnIGlkPSJSaWdodC1QYW5lbCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTA5NS4wMDAwMDAsIDc5LjAwMDAwMCkiPgogICAgICAgICAgICAgICAgPGcgaWQ9IkhlYWRpbmciPgogICAgICAgICAgICAgICAgICAgIDxnIGlkPSJzZXR0aW5ncy0oMykiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI4LjAwMDAwMCwgMjIuMDAwMDAwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0yNS4wMjY4NSwxMC42MjExNSBMMjIuMDMyNjUsOS44OTQ1NSBDMjEuODY1NDUsOS4zNjc4IDIxLjY1NDcsOC44NTgxIDIxLjQwMjksOC4zNzE0IEwyMi45MzkwNSw1LjgxMTI1IEMyMy4xMTYxLDUuNTE2MTUgMjMuMDY5Niw1LjEzODQgMjIuODI2MjUsNC44OTUwNSBMMjAuNzA1LDIuNzczNzUgQzIwLjQ2MTY1LDIuNTMwNCAyMC4wODM4NSwyLjQ4MzkgMTkuNzg4ODUsMi42NjA5NSBMMTcuMjI4NSw0LjE5NzA1IEMxNi43NDE3NSwzLjk0NTE1IDE2LjIzMTk1LDMuNzM0NCAxNS43MDU0NSwzLjU2NzMgTDE0Ljk3ODg1LDAuNTczMTUgQzE0Ljg5NzIsMC4yMzY4IDE0LjU5NjEsMCAxNC4yNSwwIEwxMS4yNSwwIEMxMC45MDM5LDAgMTAuNjAyOCwwLjIzNjggMTAuNTIxMTUsMC41NzMxNSBMOS43OTQ1NSwzLjU2NzMgQzkuMjY4MDUsMy43MzQ0IDguNzU4MjUsMy45NDUyIDguMjcxNSw0LjE5NzA1IEw1LjcxMTIsMi42NjA5NSBDNS40MTYxNSwyLjQ4MzkgNS4wMzg0NSwyLjUzMDQgNC43OTUwNSwyLjc3Mzc1IEwyLjY3Mzc1LDQuODk1IEMyLjQzMDQsNS4xMzgzNSAyLjM4MzksNS41MTYxIDIuNTYwOTUsNS44MTEyIEw0LjA5NzEsOC4zNzEzNSBDMy44NDQ3NSw4Ljg1OTA1IDMuNjMzNiw5LjM2OTkgMy40NjYzLDkuODk3OCBMMC41NjgxNSwxMC42MjIzNSBDMC4yMzQyNSwxMC43MDU4NSAwLDExLjAwNTg1IDAsMTEuMzUgTDAsMTQuMzUgQzAsMTQuNjk0MTUgMC4yMzQyNSwxNC45OTQxNSAwLjU2ODEsMTUuMDc3NiBMMy40NjYyNSwxNS44MDIxNSBDMy42MzM2NSwxNi4zMzAxNSAzLjg0NDY1LDE2Ljg0MDg1IDQuMDk3LDE3LjMyODU1IEwyLjU2MDksMTkuODg4NyBDMi4zODM4NSwyMC4xODM4IDIuNDMwMzUsMjAuNTYxNTUgMi42NzM3LDIwLjgwNDkgTDQuNzk1LDIyLjkyNjI1IEM1LjAzODMsMjMuMTY5NiA1LjQxNjA1LDIzLjIxNjEgNS43MTEyLDIzLjAzOTA1IEw4LjI3MTM1LDIxLjUwMjk1IEM4Ljc1OTA1LDIxLjc1NTMgOS4yNjk5NSwyMS45NjY0IDkuNzk3OCwyMi4xMzM3NSBMMTAuNTIyMzUsMjUuMDMxOSBDMTAuNjA1ODUsMjUuMzY1NzUgMTAuOTA1ODUsMjUuNiAxMS4yNSwyNS42IEwxNC4yNSwyNS42IEMxNC41OTQxNSwyNS42IDE0Ljg5NDE1LDI1LjM2NTc1IDE0Ljk3NzYsMjUuMDMxOSBMMTUuNzAyMTUsMjIuMTMzNzUgQzE2LjIzMDA1LDIxLjk2NjQgMTYuNzQwOSwyMS43NTUzIDE3LjIyODYsMjEuNTAyOTUgTDE5Ljc4ODc1LDIzLjAzOTA1IEMyMC4wODM4LDIzLjIxNjEgMjAuNDYxNiwyMy4xNjk2IDIwLjcwNDk1LDIyLjkyNjI1IEwyMi44MjYyNSwyMC44MDQ5IEMyMy4wNjk2LDIwLjU2MTU1IDIzLjExNjEsMjAuMTgzOCAyMi45MzkwNSwxOS44ODg3IEwyMS40MDI5NSwxNy4zMjg1NSBDMjEuNjU0NzUsMTYuODQxOTUgMjEuODY1NDUsMTYuMzMyMjUgMjIuMDMyNjUsMTUuODA1NSBMMjUuMDI2ODUsMTUuMDc4ODUgQzI1LjM2MzIsMTQuOTk3MjUgMjUuNiwxNC42OTYxIDI1LjYsMTQuMzUgTDI1LjYsMTEuMzUgQzI1LjYsMTEuMDAzOSAyNS4zNjMyLDEwLjcwMjc1IDI1LjAyNjg1LDEwLjYyMTE1IFogTTI0LjEsMTMuNzYwMjUgTDIxLjI1NzgsMTQuNDUgQzIwLjk5MTE1LDE0LjUxNDcgMjAuNzgxMSwxNC43MTk4NSAyMC43MTAxNSwxNC45ODQ5NSBDMjAuNTIyODUsMTUuNjg0ODUgMjAuMjQ2NywxNi4zNTI4IDE5Ljg4OTUsMTYuOTcwMiBDMTkuNzUyOTUsMTcuMjA2MjUgMTkuNzU1MiwxNy40OTc4IDE5Ljg5NTU1LDE3LjczMTY1IEwyMS4zNTE1NSwyMC4xNTgzIEwyMC4wNTg0LDIxLjQ1MTUgTDE3LjYzMTgsMTkuOTk1NTUgQzE3LjM5Nzk1LDE5Ljg1NTIgMTcuMTA2MzUsMTkuODUyOSAxNi44NzAzNSwxOS45ODk0NSBDMTYuMjUyNywyMC4zNDY3NSAxNS41ODQ3LDIwLjYyMjg1IDE0Ljg4NDksMjAuODEwMiBDMTQuNjIxNiwyMC44ODA2NSAxNC40MTcyNSwyMS4wODg0IDE0LjM1MTIsMjEuMzUyOCBMMTMuNjY0NCwyNC4xIEwxMS44MzU2LDI0LjEgTDExLjE0ODgsMjEuMzUyOCBDMTEuMDgyNzUsMjEuMDg4NCAxMC44Nzg0LDIwLjg4MDY1IDEwLjYxNTEsMjAuODEwMiBDOS45MTUzLDIwLjYyMjkgOS4yNDczLDIwLjM0Njc1IDguNjI5NjUsMTkuOTg5NDUgQzguMzkzNjUsMTkuODUyOTUgOC4xMDIxLDE5Ljg1NTIgNy44NjgyLDE5Ljk5NTU1IEw1LjQ0MTYsMjEuNDUxNSBMNC4xNDg0NSwyMC4xNTgzIEw1LjYwNDQ1LDE3LjczMTY1IEM1Ljc0NDgsMTcuNDk3OCA1Ljc0NzEsMTcuMjA2MiA1LjYxMDUsMTYuOTcwMiBDNS4yNTMyNSwxNi4zNTI4IDQuOTc3MTUsMTUuNjg0ODUgNC43ODk4NSwxNC45ODQ5NSBDNC43MTk0LDE0LjcyMTcgNC41MTE2NSwxNC41MTczNSA0LjI0NzIsMTQuNDUxMjUgTDEuNSwxMy43NjQ0IEwxLjUsMTEuOTM1NTUgTDQuMjQ3MiwxMS4yNDg3NSBDNC41MTE2LDExLjE4MjY1IDQuNzE5MzUsMTAuOTc4MzUgNC43ODk4NSwxMC43MTUwNSBDNC45NzcxNSwxMC4wMTUxNSA1LjI1MzMsOS4zNDcyIDUuNjEwNTUsOC43Mjk2NSBDNS43NDcwNSw4LjQ5MzYgNS43NDQ3NSw4LjIwMjA1IDUuNjA0NDUsNy45NjgyIEw0LjE0ODQ1LDUuNTQxNTUgTDUuNDQxNiw0LjI0ODQgTDcuODY4MzUsNS43MDQ0IEM4LjEwMjEsNS44NDQ3IDguMzkzNyw1Ljg0NyA4LjYyOTc1LDUuNzEwNDUgQzkuMjQ3NjUsNS4zNTMgOS45MTU2NSw1LjA3NjkgMTAuNjE1MDUsNC44ODk3NSBDMTAuODgwMTUsNC44MTg4NSAxMS4wODUzLDQuNjA4OCAxMS4xNTAwNSw0LjM0MjEgTDExLjgzOTc1LDEuNSBMMTMuNjYwMjUsMS41IEwxNC4zNDk5NSw0LjM0MjIgQzE0LjQxNDcsNC42MDg4NSAxNC42MTk4NSw0LjgxODkgMTQuODg0OTUsNC44ODk4NSBDMTUuNTg0MzUsNS4wNzcgMTYuMjUyMzUsNS4zNTMxIDE2Ljg3MDI1LDUuNzEwNTUgQzE3LjEwNjIsNS44NDcxIDE3LjM5Nzg1LDUuODQ0OCAxNy42MzE2NSw1LjcwNDUgTDIwLjA1ODQsNC4yNDg1IEwyMS4zNTE1NSw1LjU0MTY1IEwxOS44OTU1NSw3Ljk2ODMgQzE5Ljc1NTI1LDguMjAyMTUgMTkuNzUyOSw4LjQ5MzcgMTkuODg5NDUsOC43Mjk3NSBDMjAuMjQ2NzUsOS4zNDczIDIwLjUyMjg1LDEwLjAxNTI1IDIwLjcxMDE1LDEwLjcxNTE1IEMyMC43ODExLDEwLjk4MDIgMjAuOTkxMTUsMTEuMTg1NCAyMS4yNTc4LDExLjI1MDEgTDI0LjEsMTEuOTM5NzUgTDI0LjEsMTMuNzYwMjUgWiIgaWQ9IlNoYXBlIj48L3BhdGg+CiAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik0xMi43NSw3LjYgQzkuODU1MTUsNy42IDcuNSw5Ljk1NTE1IDcuNSwxMi44NSBDNy41LDE1Ljc0NDg1IDkuODU1MTUsMTguMSAxMi43NSwxOC4xIEMxNS42NDQ4NSwxOC4xIDE4LDE1Ljc0NDg1IDE4LDEyLjg1IEMxOCw5Ljk1NTE1IDE1LjY0NDg1LDcuNiAxMi43NSw3LjYgWiBNMTIuNzUsMTYuNiBDMTAuNjgyMjUsMTYuNiA5LDE0LjkxNzc1IDksMTIuODUgQzksMTAuNzgyMjUgMTAuNjgyMjUsOS4xIDEyLjc1LDkuMSBDMTQuODE3NzUsOS4xIDE2LjUsMTAuNzgyMjUgMTYuNSwxMi44NSBDMTYuNSwxNC45MTc3NSAxNC44MTc3NSwxNi42IDEyLjc1LDE2LjYgWiIgaWQ9IlNoYXBlIj48L3BhdGg+CiAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICA8L2c+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4=" alt="Setting Icon">';
    descriptionHTML += "<span style='padding-left: 43px; margin-top: -1px; padding-bottom: 1px;'>"+FM.language["Title3"]+"</span>";
    description.innerHTML = descriptionHTML;
    container.appendChild(description);

    // Control Selector
    let controlsSelector = document.createElement("div");
    controlsSelector.classList.add("FP_compElementConfiguration_ControlsSelector");
    for(var i=0; i<3; i++){
      let controlContainer = document.createElement("div");
      controlContainer.classList.add("controlContainer");
      let control = document.createElement("span");
      control.classList.add("control");
      // if(i == 0){
      //   control.innerHTML = "Image";
      //   controlContainer.classList.add("--available");
      //   controlContainer.classList.add("--active");
      // }
      controlContainer.appendChild(control);
      controlsSelector.appendChild(controlContainer);
    }
    container.appendChild(controlsSelector);

    // Control Interface
    let controlInterface = document.createElement("div");
    controlInterface.classList.add("FP_controlInterface");
    container.appendChild(controlInterface);

    return container;
  }
  //</endFold>

// *******************************************
// -- Configurable CallBack Functions --------
// *******************************************
//<beginFold> resetAnimationControls
FM.resetAnimationControls = function(){
  // Reset Component Bar
  let componentBar = FM.editorContainer.getElementsByClassName("FP_compComponentBar")[0];
  if(componentBar != undefined){
    let components = componentBar.getElementsByClassName("FP_compComponentBar_Block");
    for(var i=0; i<components.length; i++){
      components[i].classList.remove("--active");
    }
  }

  // Reset Animation Controls
  let controlContainers = FM.editorContainer.getElementsByClassName("controlContainer");
  for(var i=0; i<controlContainers.length; i++){
    controlContainers[i].classList.remove("--available");
    controlContainers[i].classList.remove("--active");
    controlContainers[i].onclick = function(){};
    controlContainers[i].getElementsByClassName("control")[0].innerHTML = "";
  }

  // Reset Control Interface
  let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
  controlInterface.innerHTML = "";

}
//</endFold>


// *******************************
// -- completedComposition -------
// *******************************
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


// *******************************
// -- Build The Composition ------
// *******************************
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


// ********************************
// -- Create Animation Controls ---
// ********************************
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

FM.buildColorCorrectionControls = function(){
  FM.resetAnimationControls();

  //<beginFold> Set Image Controls as Active Component & Build Control Tabs
  let componentBar = FM.editorContainer.getElementsByClassName("FP_compComponentBar")[0];
  componentBar.getElementsByClassName("--colorCorrection")[0].classList.add("--active");

  // Build Component Editor
  let controlContainers = FM.editorContainer.getElementsByClassName("controlContainer");
  controlContainers[0].classList.add("--available");
  controlContainers[0].classList.add("--active");
  controlContainers[0].onclick = function(){ showPackages(); }
  controlContainers[0].getElementsByClassName("control")[0].innerHTML = FM.language['ColorCorrectionTab1'];

  controlContainers[1].classList.add("--available");
  controlContainers[1].onclick = function(){ showControls(); }
  controlContainers[1].getElementsByClassName("control")[0].innerHTML = FM.language['ColorCorrectionTab2'];

  controlContainers[2].classList.add("--available");
  controlContainers[2].onclick = function(){ showStyles(); }
  controlContainers[2].getElementsByClassName("control")[0].innerHTML = FM.language['ColorCorrectionTab3'];
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
        if(animationData[i].categoryName == "Color Correction"){
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
      if(effectAnimation.post_title == FM.compositionData.colorCorrection.package.package){
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
        packageName.innerHTML = FM.language["noEffect"];
      }
      // Pro Alert
      if(effectAnimation.pro == true){
        let proAlert = document.createElement("div");
        proAlert.classList.add("FP_effectsPackage_Pro");
        proAlert.innerHTML = FM.language["proEffect"];
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
      if(FM.editingColorCorrection == true){ return; }
      if(FM.compositionData.colorCorrection.package.package == packageName){ return; }
      FM.editingColorCorrection = true;
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
      FM.compositionData.colorCorrection.package.package = packageName;
      // No Effects
      if(packageName == null){
        FM.updateCompositionColorCorrection().then().catch(function(){
          FM.updateActivePackage(null);
        });
        return;
      }
      // Build Effects Package
      if(FM.presetData[packageName].activeStyle != undefined){
        FM.compositionData.colorCorrection.package.style = FM.presetData[packageName].activeStyle;
      }else if(FM.presetData[packageName].styles[0].name != "styleBreak"){
        FM.presetData[packageName].activeStyle = FM.presetData[packageName].styles[0].name;
        FM.compositionData.colorCorrection.package.style = FM.presetData[packageName].activeStyle;
      }else{
        FM.presetData[packageName].activeStyle = FM.presetData[packageName].styles[1].name;
        FM.compositionData.colorCorrection.package.style = FM.presetData[packageName].activeStyle;
      }
      FM.compositionData.colorCorrection.controls = FM.presetData[packageName].controls;
      FM.updateCompositionColorCorrection().then().catch(function(){
        FM.updateActivePackage(null);
      });
    }
    //</endFold>

  }
  showPackages();
  if(FM.elementState == "colorCorrection"){ return; }
  FM.elementState = "colorCorrection";

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
    let packageName = FM.compositionData.colorCorrection.package.package;
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
      let currentStyle = FM.compositionData.colorCorrection.package.style;
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
      if(FM.editingColorCorrection == true){ return; }
      FM.editingColorCorrection = true;
      // reset style containers
      let styleContainers = document.getElementsByClassName("FM_styleContainer");
      for(var i=0; i<styleContainers.length; i++){
        styleContainers[i].classList.remove("--active");
        if( styleContainers[i].classList.contains("FM_style_"+FM.makeStringAlphaNumeric(style.name)) ){
          styleContainers[i].classList.add("--active");
        }
      }
      // Update Composition
      FM.compositionData.colorCorrection.package.style = style.name;
      FM.updateCompositionColorCorrection().then().catch(function(){
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
    let packageName = FM.compositionData.colorCorrection.package.package;
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
      if(FM.elementState != "colorCorrection"){ return; }
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
      if(FM.elementState != "colorCorrection"){ return; }
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
              let rangedInput = FM.buildRangedInput(control.minValue, control.maxValue, FM.compositionData.colorCorrection.controls[controlName].value, control.step);
              FM.addRangedInputActions(rangedInput, "updateCCControl", [controlName, 'uiValue']);
              FM.rangedHoverState(rangedInput, "colorCorrection", packageName, [controlName, "value"]);
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
              FM.newColorPicker(colorPicker, control.color, "updateCCColor", [controlName, 'uiValue']);
              groupControls.appendChild( colorPickerContainer );
              // FM.rangedHoverState(colorPickerContainer, "colorCorrection", packageName, [controlName, "color"]);
            }
            if(control.type == "visualEffects"){
              // Blur Size
              let blurSizeLabel = FM.label( FM.language["BlurSize"] );
              groupControls.appendChild( blurSizeLabel );
              let rangedInput = FM.buildRangedInput(-100, 100, control.blur.value, 0);
              FM.addRangedInputActions(rangedInput, "updateCCVisualEffect", [controlName, 'blur', 'value', 'uiValue']);
              FM.rangedHoverState(rangedInput, "colorCorrection", packageName, [controlName, "blur", "value"]);
              groupControls.appendChild( rangedInput );
              // Blur Type
              let blurTypeLabel = FM.label( FM.language["BlurType"] );
              groupControls.appendChild( blurTypeLabel );
              let dropDown = FM.dropDown(FM.blurs, control.blur.type);
              FM.addOptionsAction(dropDown, "updateCCVisualEffect", [controlName, 'blur', 'type', 'uiValue']);
              groupControls.appendChild( dropDown );
              // Brightness
              let brightnessLabel = FM.label( FM.language["Brightness"] );
              groupControls.appendChild( brightnessLabel );
              let brightnessInput = FM.buildRangedInput(-100, 100, control.brightness, 0);
              FM.addRangedInputActions(brightnessInput, "updateCCVisualEffect", [controlName, 'brightness', null, 'uiValue']);
              FM.rangedHoverState(rangedInput, "colorCorrection", packageName, [controlName, "brightness"]);
              groupControls.appendChild( brightnessInput );
              // Contrast
              let contrastLabel = FM.label( FM.language["Contrast"] );
              groupControls.appendChild( contrastLabel );
              let contrastInput = FM.buildRangedInput(-100, 100, control.contrast, 0);
              FM.addRangedInputActions(contrastInput, "updateCCVisualEffect", [controlName, 'contrast', null, 'uiValue']);
              FM.rangedHoverState(rangedInput, "colorCorrection", packageName, [controlName, "contrast"]);
              groupControls.appendChild( contrastInput );
              // Hue
              let hueLabel = FM.label( FM.language["Hue"] );
              groupControls.appendChild( hueLabel );
              let hueInput = FM.buildRangedInput(0, 360, control.hue, 0);
              FM.addRangedInputActions(hueInput, "updateCCVisualEffect", [controlName, 'hue', null, 'uiValue']);
              FM.rangedHoverState(rangedInput, "colorCorrection", packageName, [controlName, "hue"]);
              groupControls.appendChild( hueInput );
              // Saturation
              let saturationLabel = FM.label( FM.language["Saturation"] );
              groupControls.appendChild( saturationLabel );
              let saturationInput = FM.buildRangedInput(-100, 100, control.saturation, 0);
              FM.addRangedInputActions(saturationInput, "updateCCVisualEffect", [controlName, 'saturation', null, 'uiValue']);
              FM.rangedHoverState(rangedInput, "colorCorrection", packageName, [controlName, "saturation"]);
              groupControls.appendChild( saturationInput );
            }
            if(control.type == "blurEffect"){
              // Blur Size
              let blurSizeLabel = FM.label( FM.language["BlurSize"] );
              groupControls.appendChild( blurSizeLabel );
              let rangedInput = FM.buildRangedInput(-100, 100, control.blur.value, 0);
              FM.addRangedInputActions(rangedInput, "updateCCVisualEffect", [controlName, 'blur', 'value', 'uiValue']);
              FM.rangedHoverState(rangedInput, "colorCorrection", packageName, [controlName, "blur", "value"]);
              groupControls.appendChild( rangedInput );
              // Blur Type
              let blurTypeLabel = FM.label( FM.language["BlurType"] );
              groupControls.appendChild( blurTypeLabel );
              let dropDown = FM.dropDown(FM.blurs, control.blur.type);
              FM.addOptionsAction(dropDown, "updateCCVisualEffect", [controlName, 'blur', 'type', 'uiValue']);
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
//<beginFold> updateCCControl
FM.updateCCControl = function(controlInfo){
  // Update Composition
  FM.compositionData.colorCorrection.controls[controlInfo[0]].value = controlInfo[1];
  FM.updateComposition("colorCorrection");
}
//</endFold>

//<beginFold> updateCCColor
FM.updateCCColor = function(colorInfo){
  // Update Composition
  FM.compositionData.colorCorrection.controls[colorInfo[0]].color = colorInfo[1];
  FM.updateComposition("colorCorrection");
}
//</endFold>

//<beginFold> updateCCVisualEffect
FM.updateCCVisualEffect = function(values){
  let controlName = values[0];
  let controlSubName = values[1];
  let controlSubType = values[2];
  let value = values[3];
  // Update Composition
  if(controlSubType != null){
    FM.compositionData.colorCorrection.controls[controlName][controlSubName][controlSubType] = value;
  }else{
    FM.compositionData.colorCorrection.controls[controlName][controlSubName] = value;
    FM.updateComposition("colorCorrection");
  }
}
//</endFold>

FM.buildEffectControls = function(){
  FM.resetAnimationControls();

  //<beginFold> Set Image Controls as Active Component & Build Control Tabs
  let componentBar = FM.editorContainer.getElementsByClassName("FP_compComponentBar")[0];
  componentBar.getElementsByClassName("--effects")[0].classList.add("--active");

  // Build Component Editor
  let controlContainers = FM.editorContainer.getElementsByClassName("controlContainer");
  controlContainers[0].classList.add("--available");
  controlContainers[0].classList.add("--active");
  controlContainers[0].onclick = function(){ showPackages(); }
  controlContainers[0].getElementsByClassName("control")[0].innerHTML = FM.language['EffectsTab1'];

  controlContainers[1].classList.add("--available");
  controlContainers[1].onclick = function(){ showControls(); }
  controlContainers[1].getElementsByClassName("control")[0].innerHTML = FM.language['EffectsTab2'];

  controlContainers[2].classList.add("--available");
  controlContainers[2].onclick = function(){ showStyles(); }
  controlContainers[2].getElementsByClassName("control")[0].innerHTML = FM.language['EffectsTab3'];
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
        if(animationData[i].categoryName == "Image Effects"){
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
      if(effectAnimation.post_title == FM.compositionData.effects.package.package){
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
        packageName.innerHTML = FM.language["noEffect"];
      }
      // Pro Alert
      if(effectAnimation.pro == true){
        let proAlert = document.createElement("div");
        proAlert.classList.add("FP_effectsPackage_Pro");
        proAlert.innerHTML = FM.language["proEffect"];
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
      if(FM.editingEffects == true){ return; }
      if(FM.compositionData.effects.package.package == packageName){ return; }
      FM.editingEffects = true;
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
      FM.compositionData.effects.package.package = packageName;
      // No Effects
      if(packageName == null){
        FM.updateCompositionEffects().then().catch(function(){
          FM.updateActivePackage(null);
        });
        return;
      }
      // Build Effects Package
      if(FM.presetData[packageName].activeStyle != undefined){
        FM.compositionData.effects.package.style = FM.presetData[packageName].activeStyle;
      }else if(FM.presetData[packageName].styles[0].name != "styleBreak"){
        FM.presetData[packageName].activeStyle = FM.presetData[packageName].styles[0].name;
        FM.compositionData.effects.package.style = FM.presetData[packageName].activeStyle;
      }else{
        FM.presetData[packageName].activeStyle = FM.presetData[packageName].styles[1].name;
        FM.compositionData.effects.package.style = FM.presetData[packageName].activeStyle;
      }


      FM.compositionData.effects.controls = FM.presetData[packageName].controls;
      FM.updateCompositionEffects().then().catch(function(){
        FM.updateActivePackage(null);
      });
    }
    //</endFold>

  }
  showPackages();
  if(FM.elementState == "effects"){ return; }
  FM.elementState = "effects";

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
    let packageName = FM.compositionData.effects.package.package;
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
      let currentStyle = FM.compositionData.effects.package.style;
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
      if(FM.editingEffects == true){ return; }
      FM.editingEffects = true;
      // reset style containers
      let styleContainers = document.getElementsByClassName("FM_styleContainer");
      for(var i=0; i<styleContainers.length; i++){
        styleContainers[i].classList.remove("--active");
        if( styleContainers[i].classList.contains("FM_style_"+FM.makeStringAlphaNumeric(style.name)) ){
          styleContainers[i].classList.add("--active");
        }
      }
      // Update Composition
      FM.compositionData.effects.package.style = style.name;
      FM.updateCompositionEffects().then().catch(function(){
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
    let packageName = FM.compositionData.effects.package.package;
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
      if(FM.elementState != "effects"){ return; }
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
      if(FM.elementState != "effects"){ return; }
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
              let rangedInput = FM.buildRangedInput(control.minValue, control.maxValue, FM.compositionData.effects.controls[controlName].value, control.step);
              FM.addRangedInputActions(rangedInput, "updateControl", [controlName, 'uiValue']);
              FM.rangedHoverState(rangedInput, "effects", packageName, [controlName, "value"]);
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
              FM.newColorPicker(colorPicker, control.color, "updateColor", [controlName, 'uiValue']);
              groupControls.appendChild( colorPickerContainer );
              // FM.rangedHoverState(colorPickerContainer, "effects", packageName, [controlName, "color"]);
            }
            if(control.type == "visualEffects"){
              // Blur Size
              let blurSizeLabel = FM.label( FM.language["BlurSize"] );
              groupControls.appendChild( blurSizeLabel );
              let rangedInput = FM.buildRangedInput(-100, 100, control.blur.value, 0);
              FM.addRangedInputActions(rangedInput, "updateVisualEffect", [controlName, 'blur', 'value', 'uiValue']);
              FM.rangedHoverState(rangedInput, "effects", packageName, [controlName, "blur", "value"]);
              groupControls.appendChild( rangedInput );
              // Blur Type
              let blurTypeLabel = FM.label( FM.language["BlurType"] );
              groupControls.appendChild( blurTypeLabel );
              let dropDown = FM.dropDown(FM.blurs, control.blur.type);
              FM.addOptionsAction(dropDown, "updateVisualEffect", [controlName, 'blur', 'type', 'uiValue']);
              groupControls.appendChild( dropDown );
              // Brightness
              let brightnessLabel = FM.label( FM.language["Brightness"] );
              groupControls.appendChild( brightnessLabel );
              let brightnessInput = FM.buildRangedInput(-100, 100, control.brightness, 0);
              FM.addRangedInputActions(brightnessInput, "updateVisualEffect", [controlName, 'brightness', null, 'uiValue']);
              FM.rangedHoverState(brightnessInput, "effects", packageName, [controlName, "brightness"]);
              groupControls.appendChild( brightnessInput );
              // Contrast
              let contrastLabel = FM.label( FM.language["Contrast"] );
              groupControls.appendChild( contrastLabel );
              let contrastInput = FM.buildRangedInput(-100, 100, control.contrast, 0);
              FM.addRangedInputActions(contrastInput, "updateVisualEffect", [controlName, 'contrast', null, 'uiValue']);
              FM.rangedHoverState(contrastInput, "effects", packageName, [controlName, "contrast"]);
              groupControls.appendChild( contrastInput );
              // Hue
              let hueLabel = FM.label( FM.language["Hue"] );
              groupControls.appendChild( hueLabel );
              let hueInput = FM.buildRangedInput(0, 360, control.hue, 0);
              FM.addRangedInputActions(hueInput, "updateVisualEffect", [controlName, 'hue', null, 'uiValue']);
              FM.rangedHoverState(hueInput, "effects", packageName, [controlName, "hue"]);
              groupControls.appendChild( hueInput );
              // Saturation
              let saturationLabel = FM.label( FM.language["Saturation"] );
              groupControls.appendChild( saturationLabel );
              let saturationInput = FM.buildRangedInput(-100, 100, control.saturation, 0);
              FM.addRangedInputActions(saturationInput, "updateVisualEffect", [controlName, 'saturation', null, 'uiValue']);
              FM.rangedHoverState(saturationInput, "effects", packageName, [controlName, "saturation"]);
              groupControls.appendChild( saturationInput );
            }
            if(control.type == "blurEffect"){
              // Blur Size
              let blurSizeLabel = FM.label( FM.language["BlurSize"] );
              groupControls.appendChild( blurSizeLabel );
              let rangedInput = FM.buildRangedInput(-100, 100, control.blur.value, 0);
              FM.addRangedInputActions(rangedInput, "updateVisualEffect", [controlName, 'blur', 'value', 'uiValue']);
              FM.rangedHoverState(rangedInput, "effects", packageName, [controlName, "blur", "value"]);
              groupControls.appendChild( rangedInput );
              // Blur Type
              let blurTypeLabel = FM.label( FM.language["BlurType"] );
              groupControls.appendChild( blurTypeLabel );
              let dropDown = FM.dropDown(FM.blurs, control.blur.type);
              FM.addOptionsAction(dropDown, "updateVisualEffect", [controlName, 'blur', 'type', 'uiValue']);
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
//<beginFold> updateControl
FM.updateControl = function(controlInfo){
  // Update Composition
  FM.compositionData.effects.controls[controlInfo[0]].value = controlInfo[1];
  FM.updateComposition("effects");
}
//</endFold>

//<beginFold> updateColor
FM.updateColor = function(colorInfo){
  // Update Composition
  FM.compositionData.effects.controls[colorInfo[0]].color = colorInfo[1];
  FM.updateComposition("effects");
}
//</endFold>

//<beginFold> updateVisualEffect
FM.updateVisualEffect = function(values){
  let controlName = values[0];
  let controlSubName = values[1];
  let controlSubType = values[2];
  let value = values[3];
  // Update Composition
  if(controlSubType != null){
    FM.compositionData.effects.controls[controlName][controlSubName][controlSubType] = value;
  }else{
    FM.compositionData.effects.controls[controlName][controlSubName] = value;
    // FM.updateComposition("effects");
  }
  FM.updateComposition("effects");
}
//</endFold>

FM.buildTextControls = function(){
  FM.resetAnimationControls();

  //<beginFold> Set Image Controls as Active Component & Build Control Tabs
  let componentBar = FM.editorContainer.getElementsByClassName("FP_compComponentBar")[0];
  componentBar.getElementsByClassName("--text")[0].classList.add("--active");

  // Build Component Editor
  let controlContainers = FM.editorContainer.getElementsByClassName("controlContainer");
  controlContainers[0].classList.add("--available");
  controlContainers[0].classList.add("--active");
  controlContainers[0].onclick = function(){ showMainText(); }
  controlContainers[0].getElementsByClassName("control")[0].innerHTML = FM.language['TextTab1'];

  controlContainers[1].classList.add("--available");
  controlContainers[1].onclick = function(){ showPreText(); }
  controlContainers[1].getElementsByClassName("control")[0].innerHTML = FM.language['TextTab2'];

  controlContainers[2].classList.add("--available");
  controlContainers[2].onclick = function(){ showSubText(); }
  controlContainers[2].getElementsByClassName("control")[0].innerHTML = FM.language['TextTab3'];
  //</endFold>

  //<beginFold> Main Text Tab
  function showMainText(){
    // Reset Control Interface
    let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
    controlInterface.innerHTML = "";
    controlContainers[0].classList.add("--active");
    controlContainers[1].classList.remove("--active");
    controlContainers[2].classList.remove("--active");
    // Create Controls
    createTextControls("mainText", controlInterface);
  }
  showMainText();
  //</endFold>
  if(FM.elementState == "text"){ return; }
  FM.elementState = "text";

  //<beginFold> Pre Text Tab
  function showPreText(){
    // Reset Control Interface
    let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
    controlInterface.innerHTML = "";
    controlContainers[0].classList.remove("--active");
    controlContainers[1].classList.add("--active");
    controlContainers[2].classList.remove("--active");
    // Create Controls
    createTextControls("preText", controlInterface);
  }
  //</endFold>

  //<beginFold> Sub Text Tab
  function showSubText(){
    // Reset Control Interface
    let controlInterface = FM.editorContainer.getElementsByClassName("FP_controlInterface")[0];
    controlInterface.innerHTML = "";
    controlContainers[0].classList.remove("--active");
    controlContainers[1].classList.remove("--active");
    controlContainers[2].classList.add("--active");
    // Create Controls
    createTextControls("subText", controlInterface);
  }
  //</endFold>

  //<beginFold> createTextControls
  function createTextControls(textPrefix, controlInterface){
    // Build Text Drag Controls
    FM.textPreset = textPrefix;
    function delayDragControls(){
      FM.buildTextDragControls(textPrefix);
    }
    window.requestAnimationFrame(delayDragControls);

    // Load Text Data
    let textData = FM.compositionData.text[textPrefix];


    // Get Proper Image Index
    let imageIndexArr = ["mainText"];
    let imageIndex = 0;
    for(var i=0; i<imageIndexArr.length; i++){
      if(imageIndexArr[i] == textPrefix){
        imageIndex = i+1;
      }
    }

    // Build Proper Y Align Values
    let yAlignArr;
    if(textPrefix == "preText"){
      yAlignArr = ["Offset Main", "Top"];
    }
    if(textPrefix == "mainText"){
      yAlignArr = ["Top", "Center", "Bottom"];
    }
    if(textPrefix == "subText"){
      yAlignArr = ["Offset Main", "Bottom"];
    }

    // *******************
    // -- Text Value -----
    // *******************
    // -- Control Group
    let valueControlGroupContainer = FM.groupContainer("Only Text"+textPrefix, FM.language["mainTextCGValue"], true, "FM_textInputGC");
    let valueGroupControls = document.createElement("div");
    valueGroupControls.classList.add("FM_groupControls");
    valueControlGroupContainer.appendChild( valueGroupControls );
    // -- Value Controls
    let valueInput = FM.buildTextInput(textData.textValue, FM.language["mainTextPlaceHolder"]);
    FM.addTextInputActions(valueInput, "updateTextValue", [textPrefix, "uiValue"]);
    valueGroupControls.appendChild( valueInput );
    // -- Final Append
    controlInterface.appendChild(valueControlGroupContainer);

    // *******************
    // -- Placement ------
    // *******************
    // -- Control Group
    let placementControlGroupContainer = FM.groupContainer("Only Text"+textPrefix, FM.language["mainTextCGPlacement"], false, "FM_textPlacementGC");
    let placementGroupControls = document.createElement("div");
    placementGroupControls.classList.add("FM_groupControls");
    placementControlGroupContainer.appendChild( placementGroupControls );
    // -- xAlign
    let xAlignLabel = FM.label( FM.language["mainTextXAlignLable"] );
    placementGroupControls.appendChild( xAlignLabel );
    let xAlignDropDown = FM.buttonSelector(["Left", "Center", "Right"], textData.placement.xAlign);
    xAlignDropDown.classList.add("FM_textHorizontalAlign");
    FM.addButtonSelectorActions(xAlignDropDown, "updateTextAlign", [textPrefix, 'xAlign', 'uiValue']);
    placementGroupControls.appendChild( xAlignDropDown );
    // -- x
    let xLabel = FM.label( FM.language["mainTextXLable"] );
    placementGroupControls.appendChild( xLabel );
    let xRangedInput = FM.buildRangedInput(0, 100, textData.placement.x, 0);
    FM.addRangedInputActions(xRangedInput, "updateTextAlign", [textPrefix, 'x', 'uiValue']);
    FM.rangedHoverState(xRangedInput, "text", "3ImageText", [textPrefix, "placement", "x"]);
    xRangedInput.classList.add("FM_textXPlacement");
    placementGroupControls.appendChild( xRangedInput );
    // -- yAlign
    let yAlignLabel = FM.label( FM.language["mainTextYAlignLable"] );
    placementGroupControls.appendChild( yAlignLabel );
    let yAlignDropDown = FM.buttonSelector(yAlignArr, textData.placement.yAlign);
    FM.addButtonSelectorActions(yAlignDropDown, "updateTextAlign", [textPrefix, 'yAlign', 'uiValue']);
    placementGroupControls.appendChild( yAlignDropDown );
    // -- y
    let yLabel = FM.label( FM.language["mainTextYLable"] );
    placementGroupControls.appendChild( yLabel );
    let yRangedInput = FM.buildRangedInput(-100, 100, textData.placement.y, 0);
    FM.addRangedInputActions(yRangedInput, "updateTextAlign", [textPrefix, 'y', 'uiValue']);
    FM.rangedHoverState(yRangedInput, "text", "3ImageText", [textPrefix, "placement", "y"]);
    yRangedInput.classList.add("FM_textYPlacement");
    placementGroupControls.appendChild( yRangedInput );
    // -- Font Size
    let fontSizeLabel = FM.label( FM.language["mainTextFontSizeLable"] );
    placementGroupControls.appendChild( fontSizeLabel );
    let fontSizeRangedInput = FM.buildRangedInput(1, 50, textData.fontSize, 0);
    FM.addRangedInputActions(fontSizeRangedInput, "updateFontProperty", [textPrefix, 'fontSize', 'uiValue']);
    FM.rangedHoverState(fontSizeRangedInput, "text", "3ImageText", [textPrefix, "fontSize"]);
    fontSizeRangedInput.classList.add("FM_textFontSize");
    placementGroupControls.appendChild( fontSizeRangedInput );
    // -- Max Font Size
    // let maxFontSizeLabel = FM.label( FM.language["mainTextMaxFontSizeLable"] );
    // placementGroupControls.appendChild( maxFontSizeLabel );
    // let maxFontSizeInput = FM.buildTextInput(textData.maxFontSize, "");
    // FM.addTextInputActions(maxFontSizeInput, "updateFontProperty", [textPrefix, 'maxFontSize', 'uiValue']);
    // placementGroupControls.appendChild( maxFontSizeInput );
    // -- Letter Spacing
    let letterSpacingLabel = FM.label( FM.language["mainTextLetterSpacingLable"] );
    placementGroupControls.appendChild( letterSpacingLabel );
    let letterSpacingRangedInput = FM.buildRangedInput(-1, 1, textData.letterSpacing, 0);
    FM.addRangedInputActions(letterSpacingRangedInput, "updateFontProperty", [textPrefix, 'letterSpacing', 'uiValue']);
    FM.rangedHoverState(letterSpacingRangedInput, "text", "3ImageText", [textPrefix, "letterSpacing"]);
    placementGroupControls.appendChild( letterSpacingRangedInput );
    // -- Final Append
    controlInterface.appendChild(placementControlGroupContainer);

    // ************************
    // -- Font Style/Colors ---
    // ************************
    // -- Control Group
    let fontControlGroupContainer = FM.groupContainer("Only Text"+textPrefix, FM.language["mainTextCGFont"], false, "FM_fontFormatGC");
    let fontGroupControls = document.createElement("div");
    fontGroupControls.classList.add("FM_groupControls");
    fontControlGroupContainer.appendChild( fontGroupControls );
    // -- Font Weight
    let fontWeightLabel = FM.label( FM.language["mainTextFontWeightLable"] );
    fontGroupControls.appendChild( fontWeightLabel );
    let fontWeightRangedInput = FM.buildRangedInput(100, 800, textData.fontWeight, 100);
    FM.addRangedInputActions(fontWeightRangedInput, "updateFontProperty", [textPrefix, 'fontWeight', 'uiValue']);
    fontGroupControls.appendChild( fontWeightRangedInput );
    // -- Font Family
    FM.loadAllFonts();
    let fontFamilyLabel = FM.label( FM.language["mainTextFontFamilyLable"] );
    fontGroupControls.appendChild( fontFamilyLabel );
    let fontFamilyDropDown = FM.dropDown(FM.fonts, textData.fontFamily, true);
    FM.addOptionsAction(fontFamilyDropDown, "updateFontProperty", [textPrefix, 'fontFamily', 'uiValue']);
    fontGroupControls.appendChild( fontFamilyDropDown );
    // -- Font Style
    let fontStyleLabel = FM.label( FM.language["mainTextFontStyleLable"] );
    fontGroupControls.appendChild( fontStyleLabel );
    let fontStyleDropDown = FM.dropDown(["Normal", "Italic"], textData.fontStyle);
    FM.addOptionsAction(fontStyleDropDown, "updateFontProperty", [textPrefix, 'fontStyle', 'uiValue']);
    fontGroupControls.appendChild( fontStyleDropDown );
    // -- Font Color
    let fontColorLabel = FM.label( FM.language["mainTextFontColorLable"] );
    fontGroupControls.appendChild( fontColorLabel );
    let fontColorPickerContainer = document.createElement("div");
    fontColorPickerContainer.classList.add("FM_colorPickterContainer");
    let fontColorPicker = document.createElement("div");
    fontColorPicker.classList.add("FM_colorPickter");
    fontColorPickerContainer.appendChild(fontColorPicker);
    FM.newColorPicker(fontColorPicker, textData.color, "updateFontColor", [textPrefix, 'color', 'uiValue']);
    fontGroupControls.appendChild( fontColorPickerContainer );
    // FM.rangedHoverState(fontColorPickerContainer, "text", "3ImageText", [textPrefix, "color"]);
    // -- Final Append
    controlInterface.appendChild(fontControlGroupContainer);

    // ************************
    // -- Stroke --------------
    // ************************
    // -- Control Group
    let strokeControlGroupContainer = FM.groupContainer("Only Text"+textPrefix, FM.language["mainTextCGStroke"], false, "FM_textStrokeGC");
    let strokeGroupControls = document.createElement("div");
    strokeGroupControls.classList.add("FM_groupControls");
    strokeControlGroupContainer.appendChild( strokeGroupControls );
    // -- Stroke Width
    let strokeWidthLabel = FM.label( FM.language["mainTextCGStrokeWidthLabel"] );
    strokeGroupControls.appendChild( strokeWidthLabel );
    let strokeWidthRangedInput = FM.buildRangedInput(0, 15, textData.strokeWidth, 0);
    FM.addRangedInputActions(strokeWidthRangedInput, "updateFontProperty", [textPrefix, 'strokeWidth', 'uiValue']);
    FM.rangedHoverState(strokeWidthRangedInput, "text", "3ImageText", [textPrefix, "strokeWidth"]);
    strokeGroupControls.appendChild( strokeWidthRangedInput );
    // -- Stroke Color
    let strokeColorLabel = FM.label( FM.language["mainTextCGStrokeColorLabel"] );
    strokeGroupControls.appendChild( strokeColorLabel );
    let strokeColorPickerContainer = document.createElement("div");
    strokeColorPickerContainer.classList.add("FM_colorPickerContainer");
    let strokeColorPicker = document.createElement("div");
    strokeColorPicker.classList.add("FM_colorPicker");
    strokeColorPickerContainer.appendChild(strokeColorPicker);
    FM.newColorPicker(strokeColorPicker, textData.strokeColor, "updateFontColor", [textPrefix, 'strokeColor', 'uiValue']);
    strokeGroupControls.appendChild( strokeColorPickerContainer );
    // FM.rangedHoverState(strokeColorPickerContainer, "text", "3ImageText", [textPrefix, "strokeColor"]);
    // -- Final Append
    controlInterface.appendChild(strokeControlGroupContainer);

    // ************************
    // -- Shadow --------------
    // ************************
    // -- Control Group
    let shadowControlGroupContainer = FM.groupContainer("Only Text"+textPrefix, FM.language["mainTextCGShadow"], false, "FM_textShadowGC");
    let shadowGroupControls = document.createElement("div");
    shadowGroupControls.classList.add("FM_groupControls");
    shadowControlGroupContainer.appendChild( shadowGroupControls );
    // -- Shadow Width
    let shadowWidthLabel = FM.label( FM.language["mainTextCGShadowWidthLabel"] );
    shadowGroupControls.appendChild( shadowWidthLabel );
    let shadowWidthRangedInput = FM.buildRangedInput(0, 15, textData.shadowSize, 0);
    FM.addRangedInputActions(shadowWidthRangedInput, "updateFontProperty", [textPrefix, 'shadowSize', 'uiValue']);
    FM.rangedHoverState(shadowWidthRangedInput, "text", "3ImageText", [textPrefix, "shadowSize"]);
    shadowGroupControls.appendChild( shadowWidthRangedInput );
    // -- Shadow Color
    let shadowColorLabel = FM.label( FM.language["mainTextCGShadowColorLabel"] );
    shadowGroupControls.appendChild( shadowColorLabel );
    let shadowColorPickerContainer = document.createElement("div");
    shadowColorPickerContainer.classList.add("FM_colorPickerContainer");
    let shadowColorPicker = document.createElement("div");
    shadowColorPicker.classList.add("FM_colorPicker");
    shadowColorPickerContainer.appendChild(shadowColorPicker);
    FM.newColorPicker(shadowColorPicker, textData.shadowColor, "updateFontColor", [textPrefix, 'shadowColor', 'uiValue']);
    shadowGroupControls.appendChild( shadowColorPickerContainer );
    // FM.rangedHoverState(shadowColorPickerContainer, "text", "3ImageText", [textPrefix, "shadowColor"]);
    // -- Final Append
    controlInterface.appendChild(shadowControlGroupContainer);

    if(FM.editorState == "easy"){ return; }

    if(textPrefix == "mainText"){
      // *******************
      // -- Font Image -----
      // *******************
      // -- Control Group
      let fontImageControlGroupContainer = FM.groupContainer("Only Text"+textPrefix, FM.language["mainTextCGFontImage"], false, "FM_textImageGC");
      let fontImageGroupControls = document.createElement("div");
      fontImageGroupControls.classList.add("FM_groupControls");
      fontImageControlGroupContainer.appendChild( fontImageGroupControls );
      //<beginFold> Image Containers & Buttons
      let fontImageLabel = FM.label( FM.language["mainTextFontImageLable"] );
      fontImageGroupControls.appendChild( fontImageLabel );

      let imageContainer = document.createElement("div");
      imageContainer.classList.add("FP_imgControl_imgContainer");
      imageContainer.classList.add("--hide");
      fontImageGroupControls.appendChild(imageContainer);

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
      fontImageGroupControls.appendChild(replaceButton);

      let removeButton = document.createElement("div");
      removeButton.classList.add("FP_imgControl_button");
      removeButton.classList.add("--warning");
      removeButton.classList.add("--hide");
      removeButton.innerHTML = "X";
      removeButton.onclick = function(){
        imagePreview.src = FM.emptyImg;
        FM.compositionStorage.elements.textImages["image"+imageIndex].src = FM.emptyImg;
        imageContainer.classList.add("--hide");
        removeButton.classList.add("--hide");
        replaceButton.classList.add("--hide");
        addButton.classList.remove("--hide");
        FM.updateText = true;
      }
      imageContainer.appendChild(removeButton);

      let addButton = document.createElement("div");
      addButton.classList.add("FP_imgControl_button");
      addButton.classList.add("--hide");
      addButton.innerHTML = FM.language['AddImage'];
      addButton.onclick = function(){
        FM.mediaFrame.open();
      }
      fontImageGroupControls.appendChild(addButton);
      //</endFold>
      //<beginFold> On Media Select
      FM.mediaState = textPrefix;
      FM.mediaFrame.on( 'select', function() {
        if(FM.elementState != "text"){ return; }
        // Get media attachment details from the frame state
        var attachment = FM.mediaFrame.state().get('selection').first().toJSON();
        // Update Component Interface HTML
        imagePreview.src = attachment.url;
        addButton.classList.add("--hide");
        imageContainer.classList.remove("--hide");
        removeButton.classList.remove("--hide");
        replaceButton.classList.remove("--hide");
        // Get Proper Image Index
        let imageIndexNew = 0;
        for(var i=0; i<imageIndexArr.length; i++){
          if(imageIndexArr[i] == FM.mediaState){
            imageIndexNew = i+1;
          }
        }
        // Update Composition
        if(FM.compositionStorage.elements.textImages["image"+imageIndexNew].src != attachment.url){
          FM.compositionStorage.elements.textImages["image"+imageIndexNew].src = attachment.url;
        }
        FM.compositionData.text[textPrefix].image.source = attachment.url;
        FM.compositionData.text[textPrefix].image.id = attachment.id;
        FM.compositionStorage.animations.text.controls[textPrefix].image.source = attachment.url;
        FM.compositionStorage.animations.text.controls[textPrefix].image.id = attachment.id;
        FM.updateText = true;
      });
      //</endFold>
      //<beginFold> init Image State
      if(FM.compositionData.text[textPrefix].image.source != FM.emptyImg && FM.compositionData.text[textPrefix].image.source != null){
        imagePreview.src = FM.compositionData.text[textPrefix].image.source;
        if(FM.compositionStorage.elements.textImages["image"+1].src != FM.compositionData.text[textPrefix].image.source){
          FM.compositionStorage.elements.textImages["image"+1].src = FM.compositionData.text[textPrefix].image.source;
        }
        imageContainer.classList.remove("--hide");
        removeButton.classList.remove("--hide");
        replaceButton.classList.remove("--hide");
      }else{
        addButton.classList.remove("--hide");
      }
      //</endFold>
      // -- Font Image Opacity
      let fontImageOpacityLabel = FM.label( FM.language["mainTextFontImageOpacityLable"] );
      fontImageGroupControls.appendChild( fontImageOpacityLabel );
      let fontImageOpacityRangedInput = FM.buildRangedInput(0, 100, textData.image.opacity, 0);
      FM.addRangedInputActions(fontImageOpacityRangedInput, "updateFontImageOpacity", [textPrefix, 'uiValue']);
      FM.rangedHoverState(fontImageOpacityRangedInput, "text", "3ImageText", [textPrefix, "image", "opacity"]);
      fontImageGroupControls.appendChild( fontImageOpacityRangedInput );
      // -- Font Image Scale
      let fontImageScaleLabel = FM.label( FM.language["mainTextFontImageScaleLable"] );
      fontImageGroupControls.appendChild( fontImageScaleLabel );
      let fontImageScaleRangedInput = FM.buildRangedInput(0, 100, textData.image.scale);
      FM.addRangedInputActions(fontImageScaleRangedInput, "updateFontImagePos", [textPrefix, "scale", "uiValue"]);
      FM.rangedHoverState(fontImageScaleRangedInput, "text", "3ImageText", [textPrefix, "image", "scale"]);
      fontImageGroupControls.appendChild( fontImageScaleRangedInput );
      // -- Font Image Horiztonal Position
      let fontImageHorizontalPositionLabel = FM.label( FM.language["mainTextFontImageHorizontalPositionLable"] );
      fontImageGroupControls.appendChild( fontImageHorizontalPositionLabel );
      let fontImageHorizontalPositionRangedInput = FM.buildRangedInput(-100, 100, textData.image.x);
      FM.addRangedInputActions(fontImageHorizontalPositionRangedInput, "updateFontImagePos", [textPrefix, "x", "uiValue"]);
      FM.rangedHoverState(fontImageHorizontalPositionRangedInput, "text", "3ImageText", [textPrefix, "image", "x"]);
      fontImageGroupControls.appendChild( fontImageHorizontalPositionRangedInput );
      // -- Font Image Horiztonal Position
      let fontImageVerticalPositionLabel = FM.label( FM.language["mainTextFontImageVerticalPositionLable"] );
      fontImageGroupControls.appendChild( fontImageVerticalPositionLabel );
      let fontImageVerticalPositionRangedInput = FM.buildRangedInput(-100, 100, textData.image.y);
      FM.addRangedInputActions(fontImageVerticalPositionRangedInput, "updateFontImagePos", [textPrefix, "y", "uiValue"]);
      FM.rangedHoverState(fontImageVerticalPositionRangedInput, "text", "3ImageText", [textPrefix, "image", "y"]);
      fontImageGroupControls.appendChild( fontImageVerticalPositionRangedInput );
      // -- Font Image Blur Size
      let fontImageBlurSizeLabel = FM.label( FM.language["mainTextFontImageBlurSizeLable"] );
      fontImageGroupControls.appendChild( fontImageBlurSizeLabel );
      let fontImageBlurSizeRangedInput = FM.buildRangedInput(0, 100, textData.image.effects.blur.value);
      FM.addRangedInputActions(fontImageBlurSizeRangedInput, "updateFontImageBlur", [textPrefix, 'value', 'uiValue']);
      FM.rangedHoverState(fontImageBlurSizeRangedInput, "text", "3ImageText", [textPrefix, "image", "effects", "blur", "value"]);
      fontImageGroupControls.appendChild( fontImageBlurSizeRangedInput );
      // -- Font Image Blur Type
      let fontImageBlurTypeLabel = FM.label( FM.language["mainTextFontImageBlurTypeLable"] );
      fontImageGroupControls.appendChild( fontImageBlurTypeLabel );
      let fontImageBlurTypeDropDown = FM.dropDown(FM.blurs, textData.image.effects.blur.type);
      FM.addOptionsAction(fontImageBlurTypeDropDown, "updateFontImageBlur", [textPrefix, 'type', 'uiValue']);
      fontImageGroupControls.appendChild( fontImageBlurTypeDropDown );
      // -- Font Image Bloom
      let fontImageBloomLabel = FM.label( FM.language["mainTextFontImageBloomLable"] );
      fontImageGroupControls.appendChild( fontImageBloomLabel );
      let fontImageRangedInput = FM.buildRangedInput(0, 100, textData.image.effects.bloom);
      FM.addRangedInputActions(fontImageRangedInput, "updateFontImageEffects", [textPrefix, "bloom", "uiValue"]);
      FM.rangedHoverState(fontImageRangedInput, "text", "3ImageText", [textPrefix, "image", "effects", "bloom"]);
      fontImageGroupControls.appendChild( fontImageRangedInput );
      // -- Font Image Brightness
      let fontImageBrightnessLabel = FM.label( FM.language["mainTextFontImageBrightnessLable"] );
      fontImageGroupControls.appendChild( fontImageBrightnessLabel );
      let fontImageBrightnessRangedInput = FM.buildRangedInput(-100, 100, textData.image.effects.brightness);
      FM.addRangedInputActions(fontImageBrightnessRangedInput, "updateFontImageEffects", [textPrefix, "brightness", "uiValue"]);
      FM.rangedHoverState(fontImageBrightnessRangedInput, "text", "3ImageText", [textPrefix, "image", "effects", "brightness"]);
      fontImageGroupControls.appendChild( fontImageBrightnessRangedInput );
      // -- Font Image Contrast
      let fontImageContrastLabel = FM.label( FM.language["mainTextFontImageContrastLable"] );
      fontImageGroupControls.appendChild( fontImageContrastLabel );
      let fontImageContrastRangedInput = FM.buildRangedInput(-100, 100, textData.image.effects.contrast);
      FM.addRangedInputActions(fontImageContrastRangedInput, "updateFontImageEffects", [textPrefix, "contrast", "uiValue"]);
      FM.rangedHoverState(fontImageContrastRangedInput, "text", "3ImageText", [textPrefix, "image", "effects", "contrast"]);
      fontImageGroupControls.appendChild( fontImageContrastRangedInput );
      // -- Font Image Hue
      let fontImageHueLabel = FM.label( FM.language["mainTextFontImageHueLable"] );
      fontImageGroupControls.appendChild( fontImageHueLabel );
      let fontImageHueRangedInput = FM.buildRangedInput(0, 360, textData.image.effects.hue);
      FM.addRangedInputActions(fontImageHueRangedInput, "updateFontImageEffects", [textPrefix, "hue", "uiValue"]);
      FM.rangedHoverState(fontImageHueRangedInput, "text", "3ImageText", [textPrefix, "image", "effects", "hue"]);
      fontImageGroupControls.appendChild( fontImageHueRangedInput );
      // -- Font Image Saturation
      let fontImageSaturationLabel = FM.label( FM.language["mainTextFontImageSaturationLable"] );
      fontImageGroupControls.appendChild( fontImageSaturationLabel );
      let fontImageSaturationRangedInput = FM.buildRangedInput(-100, 100, textData.image.effects.saturation);
      FM.addRangedInputActions(fontImageSaturationRangedInput, "updateFontImageEffects", [textPrefix, "saturation", "uiValue"]);
      FM.rangedHoverState(fontImageSaturationRangedInput, "text", "3ImageText", [textPrefix, "image", "effects", "saturation"]);
      fontImageGroupControls.appendChild( fontImageSaturationRangedInput );
      // -- Final Append
      controlInterface.appendChild(fontImageControlGroupContainer);
    }

    // ************************
    // -- Background ----------
    // ************************
    // -- Control Group
    let backgroundControlGroupContainer = FM.groupContainer("Only Text"+textPrefix, FM.language["mainTextCGBackground"], false, "FM_textBackgroundGC");
    let backgroundGroupControls = document.createElement("div");
    backgroundGroupControls.classList.add("FM_groupControls");
    backgroundControlGroupContainer.appendChild( backgroundGroupControls );
    // -- Background X Width
    let backgroundHorizontalWidthLabel = FM.label( FM.language["mainTextBackgroundXSizeLabel"] );
    backgroundGroupControls.appendChild( backgroundHorizontalWidthLabel );
    let backgroundHorizontalSizeRangedInput = FM.buildRangedInput(-10, 10, textData.backgroundHorizontalSize, 0);
    FM.addRangedInputActions(backgroundHorizontalSizeRangedInput, "updateFontProperty", [textPrefix, 'backgroundHorizontalSize', 'uiValue']);
    FM.rangedHoverState(backgroundHorizontalSizeRangedInput, "text", "3ImageText", [textPrefix, "backgroundHorizontalSize"]);
    backgroundGroupControls.appendChild( backgroundHorizontalSizeRangedInput );
    // -- Background X Position
    let backgroundXOffsetLabel = FM.label( FM.language["mainTextBackgroundXOffsetLabel"] );
    backgroundGroupControls.appendChild( backgroundXOffsetLabel );
    let backgroundXOffsetRangedInput = FM.buildRangedInput(-5, 5, textData.backgroundXOffset, 0);
    FM.addRangedInputActions(backgroundXOffsetRangedInput, "updateFontProperty", [textPrefix, 'backgroundXOffset', 'uiValue']);
    FM.rangedHoverState(backgroundXOffsetRangedInput, "text", "3ImageText", [textPrefix, "backgroundXOffset"]);
    backgroundGroupControls.appendChild( backgroundXOffsetRangedInput );
    // -- Background Y Width
    let backgroundVerticalWidthLabel = FM.label( FM.language["mainTextBackgroundYSizeLabel"] );
    backgroundGroupControls.appendChild( backgroundVerticalWidthLabel );
    let backgroundVerticalSizeRangedInput = FM.buildRangedInput(-10, 10, textData.backgroundVerticalSize, 0);
    FM.addRangedInputActions(backgroundVerticalSizeRangedInput, "updateFontProperty", [textPrefix, 'backgroundVerticalSize', 'uiValue']);
    FM.rangedHoverState(backgroundVerticalSizeRangedInput, "text", "3ImageText", [textPrefix, "backgroundVerticalSize"]);
    backgroundGroupControls.appendChild( backgroundVerticalSizeRangedInput );
    // -- Background Y Position
    let backgroundYOffsetLabel = FM.label( FM.language["mainTextBackgroundYOffsetLabel"] );
    backgroundGroupControls.appendChild( backgroundYOffsetLabel );
    let backgroundYOffsetRangedInput = FM.buildRangedInput(-5, 5, textData.backgroundYOffset, 0);
    FM.addRangedInputActions(backgroundYOffsetRangedInput, "updateFontProperty", [textPrefix, 'backgroundYOffset', 'uiValue']);
    FM.rangedHoverState(backgroundYOffsetRangedInput, "text", "3ImageText", [textPrefix, "backgroundYOffset"]);
    backgroundGroupControls.appendChild( backgroundYOffsetRangedInput );
    // -- Background Color
    let backgroundColorLabel = FM.label( FM.language["mainTextBackgroundColorLabel"] );
    backgroundGroupControls.appendChild( backgroundColorLabel );
    let backgroundColorPickerContainer = document.createElement("div");
    backgroundColorPickerContainer.classList.add("FM_colorPickerContainer");
    let backgroundColorPicker = document.createElement("div");
    backgroundColorPicker.classList.add("FM_colorPicker");
    backgroundColorPickerContainer.appendChild(backgroundColorPicker);
    FM.newColorPicker(backgroundColorPicker, textData.backgroundColor, "updateFontColor", [textPrefix, 'backgroundColor', 'uiValue']);
    backgroundGroupControls.appendChild( backgroundColorPickerContainer );
    // FM.rangedHoverState(backgroundGroupControls, "text", "3ImageText", [textPrefix, "backgroundColor"]);
    // -- Final Append
    controlInterface.appendChild(backgroundControlGroupContainer);

    // ************************
    // -- Border --------------
    // ************************
    // -- Control Group
    let borderControlGroupContainer = FM.groupContainer("Only Text"+textPrefix, FM.language["mainTextCGBorder"], false, "FM_textBorderGC");
    let borderGroupControls = document.createElement("div");
    borderGroupControls.classList.add("FM_groupControls");
    borderControlGroupContainer.appendChild( borderGroupControls );
    // -- Border Style
    let borderStyleLabel = FM.label( FM.language["mainTextCGBorderStyleLabel"] );
    borderGroupControls.appendChild( borderStyleLabel );
    let borderStyleButtonSelector = FM.multiSelector(["Top", "Bottom", "Left", "Right"], textData.borderStyle);
    FM.addMultiSelectorActions(borderStyleButtonSelector, "updateFontProperty", [textPrefix, 'borderStyle', 'uiValue']);
    borderGroupControls.appendChild( borderStyleButtonSelector );
    // -- Border Width
    let borderWidthLabel = FM.label( FM.language["mainTextCGBorderWidthLabel"] );
    borderGroupControls.appendChild( borderWidthLabel );
    let borderWidthRangedInput = FM.buildRangedInput(0, 15, textData.borderWidth, 0);
    FM.addRangedInputActions(borderWidthRangedInput, "updateFontProperty", [textPrefix, 'borderWidth', 'uiValue']);
    FM.rangedHoverState(borderWidthRangedInput, "text", "3ImageText", [textPrefix, "borderWidth"]);
    borderGroupControls.appendChild( borderWidthRangedInput );
    // -- Border Color
    let borderColorLabel = FM.label( FM.language["mainTextCGBorderColorLabel"] );
    borderGroupControls.appendChild( borderColorLabel );
    let borderColorPickerContainer = document.createElement("div");
    borderColorPickerContainer.classList.add("FM_colorPickerContainer");
    let borderColorPicker = document.createElement("div");
    borderColorPicker.classList.add("FM_colorPicker");
    borderColorPickerContainer.appendChild(borderColorPicker);
    FM.newColorPicker(borderColorPicker, textData.borderColor, "updateFontColor", [textPrefix, 'borderColor', 'uiValue']);
    borderGroupControls.appendChild( borderColorPickerContainer );
    // FM.rangedHoverState(borderColorPickerContainer, "text", "3ImageText", [textPrefix, "borderColor"]);
    // -- Final Append
    controlInterface.appendChild(borderControlGroupContainer);


    // ************************
    // -- Animations ----------
    // ************************
    // -- Control Group
    let animationsControlGroupContainer = FM.groupContainer("Only Text"+textPrefix, FM.language["mainTextCGAnimations"], false, "FM_textAnimationGC");
    let animationGroupControls = document.createElement("div");
    animationGroupControls.classList.add("FM_groupControls");
    animationsControlGroupContainer.appendChild( animationGroupControls );
    // -- Animation Name
    let animationNameLabel = FM.label( FM.language["mainTextAnimationNameLabel"] );
    animationGroupControls.appendChild( animationNameLabel );
    if(textData.animation.name == ""){ textData.animation.name = "Lift Up"; }
    let animationNameDropDown = FM.dropDown(FM.textAnimations, textData.animation.name, true);
    FM.addOptionsAction(animationNameDropDown, "updateTextAnimation", [textPrefix, 'name', 'uiValue']);
    animationGroupControls.appendChild( animationNameDropDown );
    // -- Animation Targets
    let animationTargetsLabel = FM.label( FM.language["mainTextAnimationTargetsLabel"] );
    animationGroupControls.appendChild( animationTargetsLabel );
    let animationTargetsButtonSelector = FM.multiSelector(["Text", "Background"], textData.animation.targets);
    FM.addMultiSelectorActions(animationTargetsButtonSelector, "updateTextAnimation", [textPrefix, 'targets', 'uiValue']);
    animationGroupControls.appendChild( animationTargetsButtonSelector );
    // -- Animation Progress
    let animationProgressLabel = FM.label( FM.language["mainTextAnimationProgressLabel"] );
    animationGroupControls.appendChild( animationProgressLabel );
    let animationProgressRangedInput = FM.buildRangedInput(0, 100, textData.animation.progress, 0);
    FM.addRangedInputActions(animationProgressRangedInput, "updateTextAnimation", [textPrefix, 'progress', 'uiValue']);
    FM.rangedHoverState(animationProgressRangedInput, "text", "3ImageText", [textPrefix, "animation", "progress"]);
    animationGroupControls.appendChild( animationProgressRangedInput );
    // -- Final Append
    controlInterface.appendChild(animationsControlGroupContainer);


  }
  //</endFold>


  document.getElementsByClassName("FP_loadScreen")[0].classList.add("--hide");
}

// ******************************
// -- CallBack Functions --------
// ******************************
//<beginFold> updateTextValue
FM.updateTextValue = function(textInfo){
  let preFix = textInfo[0];
  let value = textInfo[1];
  // Update Composition
  FM.compositionData.text[preFix].textValue = value;
  FM.compositionStorage.animations.text.controls[preFix].textValue = value;
  FM.updateText = true;
}
//</endFold>

//<beginFold> updateTextAlign
FM.updateTextAlign = function(textInfo){
  let preFix = textInfo[0];
  let alignDirection = textInfo[1];
  let alignValue = textInfo[2];
  // Update Composition
  FM.compositionData.text[preFix].placement[alignDirection] = alignValue;
  FM.compositionStorage.animations.text.controls[preFix].placement[alignDirection] = alignValue;
  FM.updateText = true;
}
//</endFold>

//<beginFold> updateFontProperty
FM.updateFontProperty = function(textInfo){
  let preFix = textInfo[0];
  let fontProperty = textInfo[1];
  let value = textInfo[2];
  // Update Composition
  FM.compositionData.text[preFix][fontProperty] = value;
  FM.compositionStorage.animations.text.controls[preFix][fontProperty] = value;
  FM.updateText = true;
}
//</endFold>

//<beginFold> updateFontColor
FM.updateFontColor = function(textInfo){
  let preFix = textInfo[0];
  let fontProperty = textInfo[1];
  let color = textInfo[2];
  // Update Composition
  FM.compositionData.text[preFix][fontProperty] = "rgba("+color[0]+", "+color[1]+", "+color[2]+", "+color[3]+")";
  FM.compositionStorage.animations.text.controls[preFix][fontProperty] = "rgba("+color[0]+", "+color[1]+", "+color[2]+", "+color[3]+")";
  FM.updateText = true;
}
//</endFold>

//<beginFold> updateFontImageOpacity
FM.updateFontImageOpacity = function(textInfo){
  let preFix = textInfo[0];
  let opacity = textInfo[1];
  // Update Composition
  FM.compositionData.text[preFix].image.opacity = opacity;
  FM.compositionStorage.animations.text.controls[preFix].image.opacity = opacity;
  FM.updateText = true;
}
//</endFold>

//<beginFold> updateFontImageBlur
FM.updateFontImageBlur = function(blurInfo){
  let preFix = blurInfo[0];
  let type = blurInfo[1];
  let value = blurInfo[2];
  // Update Composition
  FM.compositionData.text[preFix].image.effects.blur[type] = value;
  FM.compositionStorage.animations.text.controls[preFix].image.effects.blur[type] = value;
  FM.updateText = true;
}
//</endFold>

//<beginFold> updateFontImageEffects
FM.updateFontImageEffects = function(effectInfo){
  let preFix = effectInfo[0];
  let type = effectInfo[1];
  let value = effectInfo[2];
  // Update Composition
  FM.compositionData.text[preFix].image.effects[type] = value;
  FM.compositionStorage.animations.text.controls[preFix].image.effects[type] = value;
  FM.updateText = true;
}
//</endFold>

//<beginFold> updateFontImagePos
FM.updateFontImagePos = function(posInfo){
  let preFix = posInfo[0];
  let type = posInfo[1];
  let value = posInfo[2];
  // Update Composition
  FM.compositionData.text[preFix].image[type] = value;
  FM.compositionStorage.animations.text.controls[preFix].image[type] = value;
  FM.updateText = true;
}
//</endFold>

//<beginFold> updateTextAnimation
FM.updateTextAnimation = function(animationInfo){
  let preFix = animationInfo[0];
  let animationProperty = animationInfo[1];
  let value = animationInfo[2];
  // Update Composition
  FM.compositionData.text[preFix].animation[animationProperty] = value;
  FM.compositionStorage.animations.text.controls[preFix].animation[animationProperty] = value;
  FM.updateText = true;
}
//</endFold>

//<beginFold> buildTextDragControls
FM.buildTextDragControls = function(){
  if(FM.elementState != "text"){ return; }

  //<beginFold> Setup Inital Containers/Divs
  let masterContainer = FM.compositionStorage.animations.text.setup.text1;
  let textContainer = masterContainer.getElementsByClassName("--" + FM.textPreset)[0];
  let textCoords = textContainer.FP_position;
  if(textCoords == undefined){
    window.requestAnimationFrame(FM.buildTextDragControls);
    return;
  }
  let storeTextCoords = {top: 0, left: 0, width: 0, height: 0};
  let textData = FM.compositionData.text[FM.textPreset];

  // Reset Text Controls
  let textDragControlContainer = document.getElementsByClassName("FP_textDragControlContainer")[0];
  textDragControlContainer.innerHTML = "";
  let textDragControls = document.createElement("div");
  textDragControls.classList.add("FP_textDragControls");
  let textDragArea = document.createElement("div");
  textDragArea.classList.add("FP_textDragArea");
  textDragControls.appendChild(textDragArea);
  //</endFold>

  //<beginFold> Build Corner Handles
  let topLeftCorner = document.createElement('div');
  let cornerPadding = 20;
  topLeftCorner.classList.add("FP_textDragCorner");
  topLeftCorner.classList.add("--northWest");
  topLeftCorner.style.top = -cornerPadding + "px";
  topLeftCorner.style.left = -cornerPadding + "px";
  textDragControls.appendChild(topLeftCorner);

  let topRightCorner = document.createElement('div');
  topRightCorner.classList.add("FP_textDragCorner");
  topRightCorner.classList.add("--northEast");
  topRightCorner.style.right = -cornerPadding + "px";
  topRightCorner.style.top = -cornerPadding + "px";
  textDragControls.appendChild(topRightCorner);

  let bottomLeftCorner = document.createElement('div');
  bottomLeftCorner.classList.add("FP_textDragCorner");
  bottomLeftCorner.classList.add("--northEast");
  bottomLeftCorner.style.left = -cornerPadding + "px";
  bottomLeftCorner.style.bottom = -cornerPadding + "px";
  textDragControls.appendChild(bottomLeftCorner);

  let bottomRightCorner = document.createElement('div');
  bottomRightCorner.classList.add("FP_textDragCorner");
  bottomRightCorner.classList.add("--northWest");
  bottomRightCorner.style.right = -cornerPadding + "px";
  bottomRightCorner.style.bottom = -cornerPadding + "px";
  textDragControls.appendChild(bottomRightCorner);
  //</endFold>

  //<beginFold> Build Control Bar
  let textDragBar = document.createElement('div');
  textDragBar.classList.add("textDragBar");
  // Collapse Menu
  let collapseMenu = document.createElement('div');
  collapseMenu.classList.add("FP_textDragControl");
  collapseMenu.classList.add("--rightBorder");
  collapseMenu.classList.add("--showAlways");
  let collapseMenuHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z" /></svg>';
  collapseMenuHTML += '<span>'+FM.language["ToggleTextDragMenu"]+'</span>'
  collapseMenu.innerHTML = collapseMenuHTML;
  collapseMenu.onclick = function(){ FM.toggleClass(textDragBar, "--showAll") }
  textDragBar.appendChild(collapseMenu);
  // Text Value
  let textValue = document.createElement('div');
  textValue.classList.add("FP_textDragControl");
  // textValue.classList.add("--rightBorder");
  let textValueHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 4v3h5.5v12h3V7H19V4z"/></svg>';
  textValueHTML += '<span>'+FM.language["mainTextCGValue"]+'</span>'
  textValue.innerHTML = textValueHTML;
  textValue.onclick = function(){ FM.openTextControl("FM_textInputGC"); }
  textDragBar.appendChild(textValue);
  // Format Text
  let formatText = document.createElement('div');
  formatText.classList.add("FP_textDragControl");
  let formatTextHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M9.6,14L12,7.7L14.4,14M11,5L5.5,19H7.7L8.8,16H15L16.1,19H18.3L13,5H11Z" /></svg>';
  formatTextHTML += '<span>'+FM.language["mainTextCGFont"]+'</span>'
  formatText.innerHTML = formatTextHTML;
  formatText.onclick = function(){ FM.openTextControl("FM_fontFormatGC"); }
  textDragBar.appendChild(formatText);
  // Format Stroke
  let formatStroke = document.createElement('div');
  formatStroke.classList.add("FP_textDragControl")
  let formatStrokeHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M11 3C10.18 3 9.44 3.5 9.14 4.27L3.64 18.27C3.12 19.58 4.09 21 5.5 21H7.75C8.59 21 9.33 20.5 9.62 19.7L10.26 18H13.74L14.38 19.7C14.67 20.5 15.42 21 16.25 21H18.5C19.91 21 20.88 19.58 20.36 18.27L14.86 4.27C14.56 3.5 13.82 3 13 3M11 5H13L18.5 19H16.25L15.12 16H8.87L7.75 19H5.5M12 7.67L9.62 14H14.37Z" /></svg>';
  formatStrokeHTML += '<span>'+FM.language["mainTextCGStroke"]+'</span>';
  formatStroke.innerHTML = formatStrokeHTML;
  formatStroke.onclick = function(){ FM.openTextControl("FM_textStrokeGC"); }
  textDragBar.appendChild(formatStroke);
  // Format Shadow
  let formatShadow = document.createElement('div');
  formatShadow.classList.add("FP_textDragControl")
  let formatShadowHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M3,3H16V6H11V18H8V6H3V3M12,7H14V9H12V7M15,7H17V9H15V7M18,7H20V9H18V7M12,10H14V12H12V10M12,13H14V15H12V13M12,16H14V18H12V16M12,19H14V21H12V19Z" /></svg>';
  formatShadowHTML += '<span>'+FM.language["mainTextCGShadow"]+'</span>';
  formatShadow.innerHTML = formatShadowHTML;
  formatShadow.onclick = function(){ FM.openTextControl("FM_textShadowGC"); }
  textDragBar.appendChild(formatShadow);
  // Format Background
  let formatBackground = document.createElement('div');
  formatBackground.classList.add("FP_textDragControl")
  let formatBackgroundHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M2,2H16V16H2V2M22,8V22H8V18H18V8H22M4,4V14H14V4H4Z" /></svg>';
  formatBackgroundHTML += '<span>'+FM.language["mainTextCGBackground"]+'</span>';
  formatBackground.innerHTML = formatBackgroundHTML;
  formatBackground.onclick = function(){ FM.openTextControl("FM_textBackgroundGC"); }
  textDragBar.appendChild(formatBackground);
  // Format Border
  let formatBorder = document.createElement('div');
  formatBorder.classList.add("FP_textDragControl");
  formatBorder.classList.add("--rightBorder");
  let formatBorderHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M15,5H17V3H15M19,21H21V19H19M19,13H21V11H19M19,5H21V3H19M19,17H21V15H19M15,21H17V19H15M19,9H21V7H19M3,21H5V3H3M7,5H9V3H7M7,21H9V19H7M11,5H13V3H11M11,21H13V19H11V21Z" /></svg>';
  formatBorderHTML += '<span>'+FM.language["mainTextCGBorder"]+'</span>';
  formatBorder.innerHTML = formatBorderHTML;
  formatBorder.onclick = function(){ FM.openTextControl("FM_textBorderGC"); }
  textDragBar.appendChild(formatBorder);
  // Init Alignment State
  let textAlignment = textData.placement.xAlign;
  // Align Left
  let alignLeft = document.createElement('div');
  alignLeft.classList.add("FP_textDragControl");
  alignLeft.classList.add("FP_textDragAlign");
  alignLeft.classList.add("--left");
  if(textAlignment.toLowerCase() == "left"){ alignLeft.classList.add("--active"); }
  let alignLeftHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M3,3H21V5H3V3M3,7H15V9H3V7M3,11H21V13H3V11M3,15H15V17H3V15M3,19H21V21H3V19Z" /></svg>';
  alignLeftHTML += '<span>'+FM.language["AlignLeft"]+'</span>';
  alignLeft.innerHTML = alignLeftHTML;
  alignLeft.onclick = function(){ FM.openTextControl("FM_textPlacementGC"); FM.adjustTextAlign("left"); }
  textDragBar.appendChild(alignLeft);
  // Align Center
  let alignCetner = document.createElement('div');
  alignCetner.classList.add("FP_textDragControl");
  alignCetner.classList.add("FP_textDragAlign");
  alignCetner.classList.add("--center");
  if(textAlignment.toLowerCase() == "center"){ alignCetner.classList.add("--active"); }
  let alignCetnerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M3,3H21V5H3V3M7,7H17V9H7V7M3,11H21V13H3V11M7,15H17V17H7V15M3,19H21V21H3V19Z" /></svg>';
  alignCetnerHTML += '<span>'+FM.language["AlignCenter"]+'</span>';
  alignCetner.innerHTML = alignCetnerHTML;
  alignCetner.onclick = function(){ FM.openTextControl("FM_textPlacementGC"); FM.adjustTextAlign("center"); }
  textDragBar.appendChild(alignCetner);
  // Align Right
  let alignRight = document.createElement('div');
  alignRight.classList.add("FP_textDragControl");
  alignRight.classList.add("FP_textDragAlign");
  alignRight.classList.add("--right");
  if(textAlignment.toLowerCase() == "right"){ alignRight.classList.add("--active"); }
  let alignRightHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M3,3H21V5H3V3M9,7H21V9H9V7M3,11H21V13H3V11M9,15H21V17H9V15M3,19H21V21H3V19Z" /></svg>';
  alignRightHTML += '<span>'+FM.language["AlignRight"]+'</span>';
  alignRight.innerHTML = alignRightHTML;
  alignRight.onclick = function(){ FM.openTextControl("FM_textPlacementGC"); FM.adjustTextAlign("right"); }
  textDragBar.appendChild(alignRight);
  textDragControls.appendChild(textDragBar);
  //</endFold>

  //<beginFold> Update Drag UI Position With RAF Loop
  textDragControlContainer.appendChild(textDragControls);
  let storePrefix = FM.textPreset;
  function loopRAF(){
    if(FM.elementState != "text"){ destoryDragControls(); return; }
    if(FM.textPreset != storePrefix){ destoryDragControls(); return; }
    // Test if text coords need updating
    textCoords = textContainer.FP_position;
    if(storeTextCoords.height == textCoords.height && storeTextCoords.width == textCoords.width && storeTextCoords.left == textCoords.left && storeTextCoords.top == textCoords.top){
      window.requestAnimationFrame(loopRAF);
      return;
    }
    storeTextCoords = {top: textCoords.top, left: textCoords.left, width: textCoords.width, height: textCoords.height};

    // Update Text Drag Controls
    let padding = 0;
    textDragControls.style.marginTop = (textCoords.top - padding) + "px";
    textDragControls.style.marginLeft = (textCoords.left - padding) + "px";
    textDragControls.style.width = (textCoords.width + padding*2) + "px";
    textDragControls.style.height = (textCoords.height + padding*2) + "px";

    window.requestAnimationFrame(loopRAF);
  }
  loopRAF();
  //</endFold>

  //<beginFold> Remove Drag Controls If Hover Is Active
  textDragArea.onmouseover = function(){
    if(hoverTest()){
      if(!textDragControls.classList.contains("--noHover")){
        textDragControls.classList.add("--noHover");
      }
    }else{
      if(textDragControls.classList.contains("--noHover")){
        textDragControls.classList.remove("--noHover");
      }
    }
  }
  //</endFold>

  //<beginFold> Mouse Drag Events
  let mouseStart = null;
  let positionStart = null;
  let masterContainerWidth = null;
  let masterContainerHeight = null;
  textDragArea.onmousedown = function(event){
    mouseStart = {x: event.clientX, y: event.clientY};
    positionStart = {x: textData.placement.x, y: textData.placement.y};
    masterContainerWidth = masterContainer.offsetWidth;
    masterContainerHeight = masterContainer.offsetHeight;
    document.addEventListener("mousemove", mouseMove);
  };
  document.addEventListener("mouseup", function(){
    function delayRAF(){
      document.removeEventListener("mousemove", mouseMove);
    }
    window.requestAnimationFrame(delayRAF);
  });

  let mouseThrottleTimeout = false;
  function mouseMove(event){
    event.preventDefault();

    //<beginFold> Throttle Event To RAF
    // If there's a timer, cancel it
  	if (mouseThrottleTimeout) {
  		window.cancelAnimationFrame(mouseThrottleTimeout);
  	}
    // Setup the new requestAnimationFrame()
	  mouseThrottleTimeout = window.requestAnimationFrame(function () {
      //</endFold>

      //<beginFold> Hover Test
      if(hoverTest()){
        textDragControls.classList.add("--noHover");
        return;
      }
      textDragControls.classList.remove("--noHover");
      //</endFold>

      //<beginFold> Update Drag Postion
      // Calcuate Drag Changes
      let mouseChangeX = ((event.clientX - mouseStart.x)/masterContainerWidth)*100;
      let mouseChangeY = ((event.clientY - mouseStart.y)/masterContainerHeight)*100;
      if(FM.textPreset == "preText" && FM.compositionStorage.animations.text.controls[FM.textPreset].placement.yAlign.toLowerCase() == "offset main"){
        mouseChangeY = mouseChangeY * -1;
      }
      if(FM.textPreset == "subText" && FM.compositionStorage.animations.text.controls[FM.textPreset].placement.yAlign.toLowerCase() == "bottom"){
        mouseChangeY = mouseChangeY * -1;
      }
      let newX = positionStart.x + mouseChangeX;
      let newY = positionStart.y + mouseChangeY;
      textData.placement.x = newX;
      textData.placement.y = newY;
      FM.compositionStorage.animations.text.controls[FM.textPreset].placement.x = positionStart.x + mouseChangeX;
      FM.compositionStorage.animations.text.controls[FM.textPreset].placement.y = positionStart.y + mouseChangeY;
      // Update UI
      document.getElementsByClassName("FM_textXPlacement")[0].setValue(newX);
      document.getElementsByClassName("FM_textYPlacement")[0].setValue(newY);
      // Update Composition Preview Text
      FM.updateText = true;
      //</endFold>

    });
  }
  //</endFold>

  //<beginFold> Mouse Resize Events
  // let mouseStart = null;
  let sizeStart = null;
  let mouseDirectionX = 1;
  let mouseDirectionY = 1;
  topLeftCorner.onmousedown = function(event){
    mouseDirectionX = 1;
    mouseDirectionY = 1;
    cornerDrag(event);
  };
  topRightCorner.onmousedown = function(event){
    mouseDirectionX = -1;
    mouseDirectionY = 1;
    cornerDrag(event);
  };
  bottomLeftCorner.onmousedown = function(event){
    mouseDirectionX = 1;
    mouseDirectionY = -1;
    cornerDrag(event);
  };
  bottomRightCorner.onmousedown = function(event){
    mouseDirectionX = -1;
    mouseDirectionY = -1;
    cornerDrag(event);
  };
  function cornerDrag(event){
    mouseStart = {x: event.clientX, y: event.clientY};
    sizeStart = textData.fontSize;
    masterContainerWidth = masterContainer.offsetWidth;
    masterContainerHeight = masterContainer.offsetHeight;
    document.addEventListener("mousemove", mouseResize);
  }
  document.addEventListener("mouseup", function(){
    document.removeEventListener("mousemove", mouseResize);
  });

  function mouseResize(event){
    event.preventDefault();
    //<beginFold> Throttle Event To RAF
    // If there's a timer, cancel it
  	if (mouseThrottleTimeout) {
  		window.cancelAnimationFrame(mouseThrottleTimeout);
  	}
    // Setup the new requestAnimationFrame()
	  mouseThrottleTimeout = window.requestAnimationFrame(function () {
      //</endFold>

      //<beginFold> Hover Test
      if(hoverTest()){
        textDragControls.classList.add("--noHover");
        return;
      }
      textDragControls.classList.remove("--noHover");
      //</endFold>

      //<beginFold> Update Drag Postion
      // Calcuate Drag Changes
      let mouseChangeX = ((event.clientX - mouseStart.x)/masterContainerWidth)*100;
      let mouseChangeY = ((event.clientY - mouseStart.y)/masterContainerHeight)*100;
      mouseChangeX *= mouseDirectionX;
      mouseChangeY *= mouseDirectionY;
      let newSize = sizeStart - (mouseChangeX+mouseChangeY)/1.5;
      if(newSize < 1){ return; }

      // Apply Changes
      FM.compositionStorage.animations.text.controls[FM.textPreset].fontSize = newSize;
      textData.fontSize = newSize;;
      document.getElementsByClassName("FM_textFontSize")[0].setValue(newSize);

      // Update Composition Preview Text
      FM.updateText = true;
      //</endFold>

    });
  }
  //</endFold>

  //<beginFold> destoryDragControls
  function destoryDragControls(){
    document.removeEventListener("mousemove", mouseMove);
    textDragControlContainer.innerHTML = "";
  }
  //</endFold>

  //<beginFold> hoverTest
  function hoverTest(){
    if(FM.hoverData.text["3ImageText"] != undefined){
      if(FM.hoverData.text["3ImageText"][FM.textPreset] != undefined){
        let hoverData = FM.hoverData.text["3ImageText"][FM.textPreset];
        if(hoverData.fontSize != undefined){
          if(hoverData.fontSize.inuse == true){ return true; }
        }
        if(hoverData.backgroundHorizontalSize != undefined){
          if(hoverData.backgroundHorizontalSize.inuse == true){ return true; }
        }
        if(hoverData.backgroundVerticalSize != undefined){
          if(hoverData.backgroundVerticalSize.inuse == true){ return true; }
        }
        if(hoverData.placement != undefined){
          if(hoverData.placement.x != undefined){
            if(hoverData.placement.x.inuse == true){ return true; }
          }
          if(hoverData.placement.y != undefined){
            if(hoverData.placement.y.inuse == true){ return true; }
          }
        }
      }
    }
    return false;
  }
  //</endFold>

}
//</endFold>

// *************************
// -- CallBack Functions ---
// *************************
//<beginFold> openTextControl
FM.openTextControl = function(gcName){
  let groupControls = document.getElementsByClassName("FM_controlGroupContainer");
  for(var i=0; i<groupControls.length; i++){
    groupControls[i].classList.remove("--active");
  }

  let targetGroup = document.getElementsByClassName(gcName)[0];
  targetGroup.classList.add("--active");
}
//</endFold>

//<beginFold> adjustTextAlign
FM.adjustTextAlign = function(alignment){
  // Reset Drag UI
  let dragAligns = document.getElementsByClassName("FP_textDragAlign");
  for(var i=0; i<dragAligns.length; i++){
    dragAligns[i].classList.remove("--active");
    if(dragAligns[i].classList.contains("--"+alignment)){
      dragAligns[i].classList.add("--active");
    }
  }
  document.getElementsByClassName("FM_textHorizontalAlign")[0].setValue(alignment);
}
//</endFold>

FM.buildTextRevealControls = function(){
  FM.resetAnimationControls();

  //<beginFold> Set Text Reveal Controls as Active Component & Build Control Tabs
  let componentBar = FM.editorContainer.getElementsByClassName("FP_compComponentBar")[0];
  componentBar.getElementsByClassName("--textReveal")[0].classList.add("--active");

  // Build Component Editor
  let controlContainers = FM.editorContainer.getElementsByClassName("controlContainer");
  controlContainers[0].classList.add("--available");
  controlContainers[0].classList.add("--active");
  controlContainers[0].onclick = function(){ showPackages(); }
  controlContainers[0].getElementsByClassName("control")[0].innerHTML = FM.language['TextRevealTab1'];

  controlContainers[1].classList.add("--available");
  controlContainers[1].onclick = function(){ showControls(); }
  controlContainers[1].getElementsByClassName("control")[0].innerHTML = FM.language['TextRevealTab2'];

  controlContainers[2].classList.add("--available");
  controlContainers[2].onclick = function(){ showStyles(); }
  controlContainers[2].getElementsByClassName("control")[0].innerHTML = FM.language['TextRevealTab3'];
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
        if(animationData[i].categoryName == "Text Reveals"){
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
      if(effectAnimation.post_title == FM.compositionData.textReveal.package.package){
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
        packageName.innerHTML = FM.language["noEffect"];
      }
      // Pro Alert
      if(effectAnimation.pro == true){
        let proAlert = document.createElement("div");
        proAlert.classList.add("FP_effectsPackage_Pro");
        proAlert.innerHTML = FM.language["proEffect"];
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
      if(FM.editingTextReveal == true){ return; }
      if(FM.compositionData.textReveal.package.package == packageName){ return; }
      FM.editingTextReveal = true;
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
      FM.compositionData.textReveal.package.package = packageName;
      // No Effects
      if(packageName == null){
        FM.updateCompositionTextReveal().then().catch(function(){
          FM.updateActivePackage(null);
        });
        return;
      }
      // Build Effects Package
      if(FM.presetData[packageName].activeStyle != undefined){
        FM.compositionData.textReveal.package.style = FM.presetData[packageName].activeStyle;
      }else if(FM.presetData[packageName].styles[0].name != "styleBreak"){
        FM.presetData[packageName].activeStyle = FM.presetData[packageName].styles[0].name;
        FM.compositionData.textReveal.package.style = FM.presetData[packageName].activeStyle;
      }else{
        FM.presetData[packageName].activeStyle = FM.presetData[packageName].styles[1].name;
        FM.compositionData.textReveal.package.style = FM.presetData[packageName].activeStyle;
      }


      FM.compositionData.textReveal.controls = FM.presetData[packageName].controls;
      FM.updateCompositionTextReveal().then().catch(function(){
        FM.updateActivePackage(null);
      });
    }
    //</endFold>

  }
  showPackages();
  if(FM.elementState == "textReveal"){ return; }
  FM.elementState = "textReveal";

  //<beginFold> Play Text Reveal Animation Animation
  if(FM.compositionData.textReveal.package.package != null){
    let animation = FM.compositionStorage.animations.textReveal;
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
    animation.play();
  }
  //</endFold>

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
    let packageName = FM.compositionData.textReveal.package.package;
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
      let currentStyle = FM.compositionData.textReveal.package.style;
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
      if(FM.editingTextReveal == true){ return; }
      FM.editingTextReveal = true;
      // reset style containers
      let styleContainers = document.getElementsByClassName("FM_styleContainer");
      for(var i=0; i<styleContainers.length; i++){
        styleContainers[i].classList.remove("--active");
        if( styleContainers[i].classList.contains("FM_style_"+FM.makeStringAlphaNumeric(style.name)) ){
          styleContainers[i].classList.add("--active");
        }
      }
      // Update Composition
      FM.compositionData.textReveal.package.style = style.name;
      FM.updateCompositionTextReveal().then().catch(function(){
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
    let packageName = FM.compositionData.textReveal.package.package;
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
      if(FM.elementState != "textReveal"){ return; }
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
      if(FM.elementState != "textReveal"){ return; }
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
            // Build Parameter
            if(control.type == "parameter"){
              let label = FM.label( control.description );
              groupControls.appendChild( label );
              let rangedInput = FM.buildRangedInput(control.minValue, control.maxValue, FM.compositionData.textReveal.controls[controlName].value, control.step);
              FM.addRangedInputActions(rangedInput, "updateTextRevealControl", [controlName, 'uiValue']);
              // FM.rangedHoverState(rangedInput, "textReveal", packageName, [controlName, "value"]);
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
              FM.newColorPicker(colorPicker, control.color, "updateTextRevealColor", [controlName, 'uiValue']);
              groupControls.appendChild( colorPickerContainer );
              // FM.rangedHoverState(colorPickerContainer, "textReveal", packageName, [controlName, "color"]);
            }
            if(control.type == "visualEffects"){
              // Blur Size
              let blurSizeLabel = FM.label( FM.language["BlurSize"] );
              groupControls.appendChild( blurSizeLabel );
              let rangedInput = FM.buildRangedInput(-100, 100, control.blur.value, 0);
              FM.addRangedInputActions(rangedInput, "updateTextRevealVisualEffect", [controlName, 'blur', 'value', 'uiValue']);
              // FM.rangedHoverState(rangedInput, "textReveal", packageName, [controlName, "blur", "value"]);
              groupControls.appendChild( rangedInput );
              // Blur Type
              let blurTypeLabel = FM.label( FM.language["BlurType"] );
              groupControls.appendChild( blurTypeLabel );
              let dropDown = FM.dropDown(FM.blurs, control.blur.type);
              FM.addOptionsAction(dropDown, "updateTextRevealVisualEffect", [controlName, 'blur', 'type', 'uiValue']);
              groupControls.appendChild( dropDown );
              // Brightness
              let brightnessLabel = FM.label( FM.language["Brightness"] );
              groupControls.appendChild( brightnessLabel );
              let brightnessInput = FM.buildRangedInput(-100, 100, control.brightness, 0);
              FM.addRangedInputActions(brightnessInput, "updateTextRevealVisualEffect", [controlName, 'brightness', null, 'uiValue']);
              // FM.rangedHoverState(brightnessInput, "textReveal", packageName, [controlName, "brightness"]);
              groupControls.appendChild( brightnessInput );
              // Contrast
              let contrastLabel = FM.label( FM.language["Contrast"] );
              groupControls.appendChild( contrastLabel );
              let contrastInput = FM.buildRangedInput(-100, 100, control.contrast, 0);
              FM.addRangedInputActions(contrastInput, "updateTextRevealVisualEffect", [controlName, 'contrast', null, 'uiValue']);
              // FM.rangedHoverState(contrastInput, "textReveal", packageName, [controlName, "contrast"]);
              groupControls.appendChild( contrastInput );
              // Hue
              let hueLabel = FM.label( FM.language["Hue"] );
              groupControls.appendChild( hueLabel );
              let hueInput = FM.buildRangedInput(0, 360, control.hue, 0);
              FM.addRangedInputActions(hueInput, "updateTextRevealVisualEffect", [controlName, 'hue', null, 'uiValue']);
              // FM.rangedHoverState(hueInput, "textReveal", packageName, [controlName, "hue"]);
              groupControls.appendChild( hueInput );
              // Saturation
              let saturationLabel = FM.label( FM.language["Saturation"] );
              groupControls.appendChild( saturationLabel );
              let saturationInput = FM.buildRangedInput(-100, 100, control.saturation, 0);
              FM.addRangedInputActions(saturationInput, "updateTextRevealVisualEffect", [controlName, 'saturation', null, 'uiValue']);
              // FM.rangedHoverState(saturationInput, "textReveal", packageName, [controlName, "saturation"]);
              groupControls.appendChild( saturationInput );
            }
            if(control.type == "blurEffect"){
              // Blur Size
              let blurSizeLabel = FM.label( FM.language["BlurSize"] );
              groupControls.appendChild( blurSizeLabel );
              let rangedInput = FM.buildRangedInput(-100, 100, control.blur.value, 0);
              FM.addRangedInputActions(rangedInput, "updateTextRevealVisualEffect", [controlName, 'blur', 'value', 'uiValue']);
              // FM.rangedHoverState(rangedInput, "textReveal", packageName, [controlName, "blur", "value"]);
              groupControls.appendChild( rangedInput );
              // Blur Type
              let blurTypeLabel = FM.label( FM.language["BlurType"] );
              groupControls.appendChild( blurTypeLabel );
              let dropDown = FM.dropDown(FM.blurs, control.blur.type);
              FM.addOptionsAction(dropDown, "updateTextRevealVisualEffect", [controlName, 'blur', 'type', 'uiValue']);
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
//<beginFold> updateTextRevealControl
FM.updateTextRevealControl = function(controlInfo){
  // Update Composition
  FM.compositionData.textReveal.controls[controlInfo[0]].value = controlInfo[1];
  FM.updateComposition("textReveal");
}
//</endFold>

//<beginFold> updateTextRevealColor
FM.updateTextRevealColor = function(colorInfo){
  // Update Composition
  FM.compositionData.textReveal.controls[colorInfo[0]].color = colorInfo[1];
  FM.updateComposition("textReveal");
}
//</endFold>

//<beginFold> updateTextRevealVisualEffect
FM.updateTextRevealVisualEffect = function(values){
  let controlName = values[0];
  let controlSubName = values[1];
  let controlSubType = values[2];
  let value = values[3];
  // Update Composition
  if(controlSubType != null){
    FM.compositionData.textReveal.controls[controlName][controlSubName][controlSubType] = value;
  }else{
    FM.compositionData.textReveal.controls[controlName][controlSubName] = value;
  }
  FM.updateComposition("textReveal");
}
//</endFold>

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


// *******************************
// -- Hover Processing -----
// *******************************
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


// *******************************
// -- Out Of Free Animations -----
// *******************************
  //<beginFold> outOfFree
  FM.outOfFree = function(updateFunction, packageName, packageLocation){
    let backDrop = document.createElement("div");
    backDrop.classList.add("FP_outOfFree_BackDrop");

    let container = document.createElement("div");
    container.classList.add("FP_outOfFree");
    backDrop.appendChild(container);

    let refreshIcon = document.createElement("div");
    refreshIcon.classList.add("FP_closeOutOfFree");
    refreshIcon.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M2 12C2 16.97 6.03 21 11 21C13.39 21 15.68 20.06 17.4 18.4L15.9 16.9C14.63 18.25 12.86 19 11 19C4.76 19 1.64 11.46 6.05 7.05C10.46 2.64 18 5.77 18 12H15L19 16H19.1L23 12H20C20 7.03 15.97 3 11 3C6.03 3 2 7.03 2 12Z" /></svg>';
    refreshIcon.onclick = function(){
      FM.closeEditor(backDrop);
    }
    container.appendChild(refreshIcon);

    let alertIcon = document.createElement("div");
    alertIcon.classList.add("FP_outOfFree_Icon");
    alertIcon.innerHTML = '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M11,15H13V17H11V15M11,7H13V13H11V7M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20Z" /></svg>';
    container.appendChild(alertIcon);

    let errorMssgContainer = document.createElement("div");
    errorMssgContainer.classList.add("FP_outOfFree_MessageContainer");
    container.appendChild(errorMssgContainer);

    let errorMssg = document.createElement("div");
    errorMssg.classList.add("FP_outOfFree_Message");
    errorMssg.innerHTML = "The <span><a href='https://firepro.io/package_editor/build.php?packageName="+encodeURIComponent(packageName)+"' target='_blank'>" + packageName + "</a></span> effect you want to use is only available for Pro users.";
    errorMssgContainer.appendChild(errorMssg);

    let buttonContainer = document.createElement("div");
    buttonContainer.classList.add("FP_outOfFree_ButtonContainer");
    container.appendChild(buttonContainer);

    let button1 = document.createElement("div");
    button1.classList.add("FP_outOfFree_Button");
    button1.classList.add("--sad");
    button1.innerHTML = "<div>Remove "+packageName+"</div>";
    let clickTrack = false;
    button1.onclick = function(){
      if(clickTrack == false){
        FM.removeAnimation(packageName, updateFunction, packageLocation, backDrop);
      }
      clickTrack = true;
    }
    buttonContainer.appendChild(button1);

    let button2 = document.createElement("div");
    button2.classList.add("FP_outOfFree_Button");
    button2.classList.add("--happy");
    button2.innerHTML = "<a target='blank' href='https://firepro.io/go-pro' style='width: 100%;'><div>Upgrade To Pro</div></a>";
    buttonContainer.appendChild(button2);

    document.body.appendChild(backDrop);
  }
  //</endFold>

  //<beginFold> removeAnimation
  FM.removeAnimation = function(animationName, updateFunction, packageLocation, backdrop){
    packageLocation.package.package = null;
    FM[updateFunction]().then(function(){
      FM.closeEditor(backdrop);
    });
  }
  //</endFold>


// *******************************
// -- Helper Functions -----------
// *******************************
// *******************************
// -- Helper Functions -----------
// *******************************
  // -- Composition Helpers
  //<beginFold> drawImageCover
  FM.drawImageCover = function(ctx, img, x, y, w, h, offsetX, offsetY) {

      if (arguments.length === 2) {
          x = y = 0;
          w = ctx.canvas.width;
          h = ctx.canvas.height;
      }

      // default offset is center
      offsetX = typeof offsetX === "number" ? offsetX : 0.5;
      offsetY = typeof offsetY === "number" ? offsetY : 0.5;

      // keep bounds [0.0, 1.0]
      if (offsetX < 0) offsetX = 0;
      if (offsetY < 0) offsetY = 0;
      if (offsetX > 1) offsetX = 1;
      if (offsetY > 1) offsetY = 1;

      var iw = img.width,
          ih = img.height,
          r = Math.min(w / iw, h / ih),
          nw = iw * r,   // new prop. width
          nh = ih * r,   // new prop. height
          cx, cy, cw, ch, ar = 1;

      // decide which gap to fill
      if (nw < w) ar = w / nw;
      if (Math.abs(ar - 1) < 1e-14 && nh < h) ar = h / nh;  // updated
      nw *= ar;
      nh *= ar;

      // calc source rectangle
      cw = iw / (nw / w);
      ch = ih / (nh / h);

      cx = (iw - cw) * offsetX;
      cy = (ih - ch) * offsetY;

      // make sure source rectangle is valid
      if (cx < 0) cx = 0;
      if (cy < 0) cy = 0;
      if (cw > iw) cw = iw;
      if (ch > ih) ch = ih;

      // fill image in dest. rectangle
      ctx.drawImage(img, cx, cy, cw, ch,  x, y, w, h);
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

  //<beginFold> imageTransfer
  FM.imageTransfer = function(canvas1, canvas2, settings){
    return new Promise((resolve, reject) => {
      let frame = {};
      frame.canvas = canvas2;
      let packageData = { package: "Only An Image", style: "1" };
      let apiKey = firepro;
      FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

        let setup = animation.setup;

        // -- Setup Image 1
        let image1 = setup.image1;
        image1.src = canvas1;

        if(settings != undefined){
          if(settings.objectFit != undefined){
            image1.objectFit = settings.objectFit;
          }
          if(settings.effects != undefined){
            FM.deepCopy(image1.effects, settings.effects);
          }
        }

        resolve(animation);
      }).catch(function(FireProError){ console.error(FireProError); });
    }); // end return promise
  }
  //</endFold>

  //<beginFold> imageCombine
  FM.imageCombine = function(canvas1, canvas2, canvas3){
    return new Promise((resolve, reject) => {
      let frame = {};
      frame.canvas = canvas3;
      let packageData = { package: "Only 2 Images", style: "1" };
      let apiKey = firepro;
      FP.loadAnimation(frame, packageData, apiKey).then(function(animation){

        let setup = animation.setup;

        // -- Setup Image 1
        let image1 = setup.image1;
        image1.src = canvas1;

        // -- Setup Image 2
        let image2 = setup.image2;
        image2.src = canvas2;

        resolve(animation);
      }).catch(function(FireProError){ console.error(FireProError); });
    }); // end return promise
  }
  //</endFold>

  //<beginFold> saveCanvasImage
  FM.saveCanvasImage = function(webGLCanvas, width, height){
    let canvas = document.createElement('canvas');
    canvas.width = width;
    canvas.height = height;
    let ctx = canvas.getContext('2d');

    ctx.beginPath();
    ctx.rect(0, 0, width, height);
    ctx.fillStyle = "white";
    ctx.fill();

    ctx.drawImage(webGLCanvas, 0, 0, width, height);
    var pngFile = canvas.toDataURL("image/jpeg", 0.5);
    return pngFile;
  }
  //</endFold>

  // -- String/Number Processing
  //<beginFold> parseBool
  FM.parseBool = function(value) {
    if (typeof value === "string") {
       value = value.replace(/^\s+|\s+$/g, "").toLowerCase();
       if (value === "true" || value === "false")
         return value === "true";
    }
    return value;
  }
  //</endFold>

  //<beginFold> makeStringAlphaNumeric
  FM.makeStringAlphaNumeric = function(input){
    if(input == null){
      return "";
    }
    return input.replace(/\W/g, '');
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

  //<beginFold> toFixed
  FM.toFixed = function(num, max) {

    let numberOfDigits = parseInt(max).toString().length;
    let numberOfDecimals = 3 - numberOfDigits;
    if(numberOfDecimals < 0){ numberOfDecimals = 0; }

    if(num == undefined || num == ""){ num = 0; }
    let finalNumber = parseFloat(num);

    var re = new RegExp('^-?\\d+(?:\.\\d{0,' + (numberOfDecimals || -1) + '})?');
    if(finalNumber.toString().match(re) == null){
      return 0;
    }
    return parseFloat(finalNumber.toString().match(re)[0]);
  }
  //</endFold>

  //<beginFold> swapArrayIndex
  FM.swapArrayIndex = function(array, indexA, indexB) {
    var tmp = array[indexA];
    array[indexA] = array[indexB];
    array[indexB] = tmp;
  }
  //</endFold>

  //<beginFold> withinRange
  FM.withinRange = function(testNumber, target, range){
    return testNumber < target + range && testNumber > target - range;
  }
  //</endFold>

  // -- Class List Helpers
  //<beginFold> toggleClass
  FM.toggleClass = function(node, className){
    if(node.classList.contains(className)){
      node.classList.remove(className);
    }else{
      node.classList.add(className);
    }
  }
  //</endFold>

  //<beginFold> setClass
  FM.setClass = function(node, className, set){
    node.classList.remove(className);
    if(set == true){
      node.classList.add(className);
    }
  }
  //</endFold>

  // -- Font Helpers
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


// *******************************
// -- Destroy Editor -------------
// *******************************
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

//
