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
