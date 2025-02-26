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
