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
