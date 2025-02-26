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
