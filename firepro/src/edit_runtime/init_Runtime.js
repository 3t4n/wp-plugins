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

REPLACE {language};

// *******************************
// -- Gutenberg UI ----------------
// *******************************
REPLACE {gutenbergUI};
REPLACE {gutenbergUIControls};
REPLACE {projectTemplates};

// *************************************
// -- UI_Components (dropdown, lable) --
// *************************************
REPLACE {UI_Components};

// *******************************
// -- Create Editor UI -----------
// *******************************
REPLACE {editorUI};

// *******************************
// -- completedComposition -------
// *******************************
REPLACE {buildCompleteComposition};

// *******************************
// -- Build The Composition ------
// *******************************
REPLACE {buildComposition};
REPLACE {buildTransitionComposition};
REPLACE {rebuildThumbnails};

// ********************************
// -- Create Animation Controls ---
// ********************************
REPLACE {animationControls/imageControls};
REPLACE {animationControls/colorCorrectionControls};
REPLACE {animationControls/effectsControls};
REPLACE {animationControls/textControls};
REPLACE {animationControls/textDragControls};
REPLACE {animationControls/textRevealControls};
REPLACE {animationControls/transitionControls};

// *******************************
// -- Hover Processing -----
// *******************************
REPLACE {hoverProcessing};

// *******************************
// -- Out Of Free Animations -----
// *******************************
REPLACE {outOfFree};

// *******************************
// -- Helper Functions -----------
// *******************************
REPLACE {helpers};

// *******************************
// -- Destroy Editor -------------
// *******************************
REPLACE {destroyFunctions};
//
