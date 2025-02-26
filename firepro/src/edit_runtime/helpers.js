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
