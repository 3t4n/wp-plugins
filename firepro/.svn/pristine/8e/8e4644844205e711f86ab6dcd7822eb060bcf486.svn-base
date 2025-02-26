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
