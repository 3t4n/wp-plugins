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
