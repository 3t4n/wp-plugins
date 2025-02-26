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
