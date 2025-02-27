/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/attributes.js":
/*!***************************!*\
  !*** ./src/attributes.js ***!
  \***************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
const attributes = {
  blockID: {
    type: "string",
    default: ""
  },
  dateFormat: {
    type: "string",
    default: "jS F Y"
  },
  display: {
    type: "string",
    default: "inline-block"
  },
  textColor: {
    type: "string",
    default: ""
  },
  fontSize: {
    type: "number",
    default: 17
  },
  letterSpacing: {
    type: "number",
    default: 0
  },
  textTransform: {
    type: "string",
    default: "none"
  },
  fontFamily: {
    type: "string",
    default: "default"
  },
  fontWeight: {
    type: "string",
    default: "normal"
  },
  lineHeight: {
    type: "number",
    default: 24
  },
  desktop_padding: {
    type: "object",
    default: {
      top: 0,
      bottom: 0,
      left: 0,
      right: 0
    }
  },
  tab_padding: {
    type: "object",
    default: {
      top: 0,
      bottom: 0,
      left: 0,
      right: 0
    }
  },
  mobile_padding: {
    type: "object",
    default: {
      top: 0,
      bottom: 0,
      left: 0,
      right: 0
    }
  },
  desktop_margin: {
    type: "object",
    default: {
      top: 0,
      bottom: 0,
      left: 0,
      right: 0
    }
  },
  tab_margin: {
    type: "object",
    default: {
      top: 0,
      bottom: 0,
      left: 0,
      right: 0
    }
  },
  mobile_margin: {
    type: "object",
    default: {
      top: 0,
      bottom: 0,
      left: 0,
      right: 0
    }
  },
  activePaddingDevice: {
    type: "string",
    default: "desktop"
  },
  activeMarginDevice: {
    type: "string",
    default: "desktop"
  },
  paddingLink: {
    type: "boolean",
    default: true
  },
  marginLink: {
    type: "boolean",
    default: true
  }
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (attributes);

/***/ }),

/***/ "./src/constants/constants.js":
/*!************************************!*\
  !*** ./src/constants/constants.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   FONT_FAMILYS: () => (/* binding */ FONT_FAMILYS)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);

const FONT_FAMILYS = [{
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Default", "current-date"),
  value: "Default"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("ABeeZee", "current-date"),
  value: "ABeeZee"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Abel", "current-date"),
  value: "Abel"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Abhaya Libre", "current-date"),
  value: "Abhaya Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Abril Fatface", "current-date"),
  value: "Abril Fatface"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Abyssinica SIL", "current-date"),
  value: "Abyssinica SIL"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Aclonica", "current-date"),
  value: "Aclonica"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Acme", "current-date"),
  value: "Acme"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Actor", "current-date"),
  value: "Actor"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Adamina", "current-date"),
  value: "Adamina"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Adobe Blank", "current-date"),
  value: "Adobe Blank"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Advent Pro", "current-date"),
  value: "Advent Pro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Aguafina Script", "current-date"),
  value: "Aguafina Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Akronim", "current-date"),
  value: "Akronim"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("aksarabaligalang", "current-date"),
  value: "aksarabaligalang"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Aladin", "current-date"),
  value: "Aladin"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Aldrich", "current-date"),
  value: "Aldrich"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alef", "current-date"),
  value: "Alef"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("alefhebrew", "current-date"),
  value: "alefhebrew"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alegreya", "current-date"),
  value: "Alegreya"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alegreya Sans", "current-date"),
  value: "Alegreya Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alegreya Sans SC", "current-date"),
  value: "Alegreya Sans SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alegreya SC", "current-date"),
  value: "Alegreya SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Aleo", "current-date"),
  value: "Aleo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alex Brush", "current-date"),
  value: "Alex Brush"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alfa Slab One", "current-date"),
  value: "Alfa Slab One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alice", "current-date"),
  value: "Alice"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alike", "current-date"),
  value: "Alike"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Alike Angular", "current-date"),
  value: "Alike Angular"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Allan", "current-date"),
  value: "Allan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Allerta", "current-date"),
  value: "Allerta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Allerta Stencil", "current-date"),
  value: "Allerta Stencil"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Allura", "current-date"),
  value: "Allura"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Almendra", "current-date"),
  value: "Almendra"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Almendra Display", "current-date"),
  value: "Almendra Display"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Almendra SC", "current-date"),
  value: "Almendra SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Amarante", "current-date"),
  value: "Amarante"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Amaranth", "current-date"),
  value: "Amaranth"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Amatic SC", "current-date"),
  value: "Amatic SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Amethysta", "current-date"),
  value: "Amethysta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Amiko", "current-date"),
  value: "Amiko"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Amiri", "current-date"),
  value: "Amiri"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Amita", "current-date"),
  value: "Amita"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("amstelvaralpha", "current-date"),
  value: "amstelvaralpha"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Anaheim", "current-date"),
  value: "Anaheim"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Andada", "current-date"),
  value: "Andada"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Andada SC", "current-date"),
  value: "Andada SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Andika", "current-date"),
  value: "Andika"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Angkor", "current-date"),
  value: "Angkor"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Annie Use Your Telescope", "current-date"),
  value: "Annie Use Your Telescope"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Anonymous Pro", "current-date"),
  value: "Anonymous Pro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Antic", "current-date"),
  value: "Antic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Antic Didone", "current-date"),
  value: "Antic Didone"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Antic Slab", "current-date"),
  value: "Antic Slab"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Anton", "current-date"),
  value: "Anton"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Antonio", "current-date"),
  value: "Antonio"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Arapey", "current-date"),
  value: "Arapey"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Arbutus", "current-date"),
  value: "Arbutus"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Arbutus Slab", "current-date"),
  value: "Arbutus Slab"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Architects Daughter", "current-date"),
  value: "Architects Daughter"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Archivo", "current-date"),
  value: "Archivo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Archivo Black", "current-date"),
  value: "Archivo Black"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Archivo Narrow", "current-date"),
  value: "Archivo Narrow"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("archivovfbeta", "current-date"),
  value: "archivovfbeta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Aref Ruqaa", "current-date"),
  value: "Aref Ruqaa"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Arima Madurai", "current-date"),
  value: "Arima Madurai"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Arimo", "current-date"),
  value: "Arimo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Arizonia", "current-date"),
  value: "Arizonia"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Armata", "current-date"),
  value: "Armata"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Arsenal", "current-date"),
  value: "Arsenal"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Artifika", "current-date"),
  value: "Artifika"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Arvo", "current-date"),
  value: "Arvo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Arya", "current-date"),
  value: "Arya"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Asap", "current-date"),
  value: "Asap"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Asap Condensed", "current-date"),
  value: "Asap Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("asapvfbeta", "current-date"),
  value: "asapvfbeta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Asar", "current-date"),
  value: "Asar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Asset", "current-date"),
  value: "Asset"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Assistant", "current-date"),
  value: "Assistant"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Astloch", "current-date"),
  value: "Astloch"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Asul", "current-date"),
  value: "Asul"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Athiti", "current-date"),
  value: "Athiti"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Atomic Age", "current-date"),
  value: "Atomic Age"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Aubrey", "current-date"),
  value: "Aubrey"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Audiowide", "current-date"),
  value: "Audiowide"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Autour One", "current-date"),
  value: "Autour One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Average", "current-date"),
  value: "Average"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Average Sans", "current-date"),
  value: "Average Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Averia Gruesa Libre", "current-date"),
  value: "Averia Gruesa Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Averia Libre", "current-date"),
  value: "Averia Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Averia Sans Libre", "current-date"),
  value: "Averia Sans Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Averia Serif Libre", "current-date"),
  value: "Averia Serif Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("B612", "current-date"),
  value: "B612"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("B612 Mono", "current-date"),
  value: "B612 Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bad Script", "current-date"),
  value: "Bad Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bahiana", "current-date"),
  value: "Bahiana"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bahianita", "current-date"),
  value: "Bahianita"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bai Jamjuree", "current-date"),
  value: "Bai Jamjuree"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo", "current-date"),
  value: "Baloo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo Bhai", "current-date"),
  value: "Baloo Bhai"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo Bhaijaan", "current-date"),
  value: "Baloo Bhaijaan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo Bhaina", "current-date"),
  value: "Baloo Bhaina"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo Chettan", "current-date"),
  value: "Baloo Chettan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo Da", "current-date"),
  value: "Baloo Da"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo Paaji", "current-date"),
  value: "Baloo Paaji"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo Tamma", "current-date"),
  value: "Baloo Tamma"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo Tammudu", "current-date"),
  value: "Baloo Tammudu"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baloo Thambi", "current-date"),
  value: "Baloo Thambi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Balthazar", "current-date"),
  value: "Balthazar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bangers", "current-date"),
  value: "Bangers"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Barlow", "current-date"),
  value: "Barlow"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Barlow Condensed", "current-date"),
  value: "Barlow Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Barlow Semi Condensed", "current-date"),
  value: "Barlow Semi Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Barriecito", "current-date"),
  value: "Barriecito"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Barrio", "current-date"),
  value: "Barrio"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Basic", "current-date"),
  value: "Basic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Battambang", "current-date"),
  value: "Battambang"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Baumans", "current-date"),
  value: "Baumans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bayon", "current-date"),
  value: "Bayon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Belgrano", "current-date"),
  value: "Belgrano"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bellefair", "current-date"),
  value: "Bellefair"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Belleza", "current-date"),
  value: "Belleza"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("BenchNine", "current-date"),
  value: "BenchNine"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bentham", "current-date"),
  value: "Bentham"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Berkshire Swash", "current-date"),
  value: "Berkshire Swash"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Beth Ellen", "current-date"),
  value: "Beth Ellen"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bevan", "current-date"),
  value: "Bevan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bhavuka", "current-date"),
  value: "Bhavuka"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bigelow Rules", "current-date"),
  value: "Bigelow Rules"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bigshot One", "current-date"),
  value: "Bigshot One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bilbo", "current-date"),
  value: "Bilbo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bilbo Swash Caps", "current-date"),
  value: "Bilbo Swash Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bio Rhyme", "current-date"),
  value: "Bio Rhyme"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bio Rhyme Expanded", "current-date"),
  value: "Bio Rhyme Expanded"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Biryani", "current-date"),
  value: "Biryani"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bitter", "current-date"),
  value: "Bitter"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Black And White Picture", "current-date"),
  value: "Black And White Picture"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Black Han Sans", "current-date"),
  value: "Black Han Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Black Ops One", "current-date"),
  value: "Black Ops One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bokor", "current-date"),
  value: "Bokor"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bonbon", "current-date"),
  value: "Bonbon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Boogaloo", "current-date"),
  value: "Boogaloo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bowlby One", "current-date"),
  value: "Bowlby One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bowlby One SC", "current-date"),
  value: "Bowlby One SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Brawler", "current-date"),
  value: "Brawler"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bree Serif", "current-date"),
  value: "Bree Serif"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bruno Ace", "current-date"),
  value: "Bruno Ace"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bruno Ace SC", "current-date"),
  value: "Bruno Ace SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bubblegum Sans", "current-date"),
  value: "Bubblegum Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bubbler One", "current-date"),
  value: "Bubbler One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Buda", "current-date"),
  value: "Buda"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Buenard", "current-date"),
  value: "Buenard"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bungee", "current-date"),
  value: "Bungee"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bungee Hairline", "current-date"),
  value: "Bungee Hairline"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bungee Inline", "current-date"),
  value: "Bungee Inline"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bungee Outline", "current-date"),
  value: "Bungee Outline"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Bungee Shade", "current-date"),
  value: "Bungee Shade"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Butcherman", "current-date"),
  value: "Butcherman"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Butcherman Caps", "current-date"),
  value: "Butcherman Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Butterfly Kids", "current-date"),
  value: "Butterfly Kids"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cabin", "current-date"),
  value: "Cabin"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cabin Condensed", "current-date"),
  value: "Cabin Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cabin Sketch", "current-date"),
  value: "Cabin Sketch"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("cabinvfbeta", "current-date"),
  value: "cabinvfbeta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Caesar Dressing", "current-date"),
  value: "Caesar Dressing"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cagliostro", "current-date"),
  value: "Cagliostro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cairo", "current-date"),
  value: "Cairo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Calligraffitti", "current-date"),
  value: "Calligraffitti"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cambay", "current-date"),
  value: "Cambay"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cambo", "current-date"),
  value: "Cambo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Candal", "current-date"),
  value: "Candal"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cantarell", "current-date"),
  value: "Cantarell"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cantata One", "current-date"),
  value: "Cantata One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cantora One", "current-date"),
  value: "Cantora One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Capriola", "current-date"),
  value: "Capriola"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cardo", "current-date"),
  value: "Cardo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Carme", "current-date"),
  value: "Carme"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Carrois Gothic", "current-date"),
  value: "Carrois Gothic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Carrois Gothic SC", "current-date"),
  value: "Carrois Gothic SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Carter One", "current-date"),
  value: "Carter One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Catamaran", "current-date"),
  value: "Catamaran"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Caudex", "current-date"),
  value: "Caudex"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Caveat", "current-date"),
  value: "Caveat"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Caveat Brush", "current-date"),
  value: "Caveat Brush"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cedarville Cursive", "current-date"),
  value: "Cedarville Cursive"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ceviche One", "current-date"),
  value: "Ceviche One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chakra Petch", "current-date"),
  value: "Chakra Petch"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Changa", "current-date"),
  value: "Changa"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Changa One", "current-date"),
  value: "Changa One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chango", "current-date"),
  value: "Chango"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Charm", "current-date"),
  value: "Charm"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Charmonman", "current-date"),
  value: "Charmonman"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chau Philomene One", "current-date"),
  value: "Chau Philomene One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chela One", "current-date"),
  value: "Chela One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chelsea Market", "current-date"),
  value: "Chelsea Market"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chenla", "current-date"),
  value: "Chenla"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cherry Cream Soda", "current-date"),
  value: "Cherry Cream Soda"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cherry Swash", "current-date"),
  value: "Cherry Swash"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chewy", "current-date"),
  value: "Chewy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chicle", "current-date"),
  value: "Chicle"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chilanka", "current-date"),
  value: "Chilanka"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chivo", "current-date"),
  value: "Chivo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Chonburi", "current-date"),
  value: "Chonburi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cinzel", "current-date"),
  value: "Cinzel"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cinzel Decorative", "current-date"),
  value: "Cinzel Decorative"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Clicker Script", "current-date"),
  value: "Clicker Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Coda", "current-date"),
  value: "Coda"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Coda Caption", "current-date"),
  value: "Coda Caption"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Codystar", "current-date"),
  value: "Codystar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Coiny", "current-date"),
  value: "Coiny"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Combo", "current-date"),
  value: "Combo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Comfortaa", "current-date"),
  value: "Comfortaa"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Coming Soon", "current-date"),
  value: "Coming Soon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Concert One", "current-date"),
  value: "Concert One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Condiment", "current-date"),
  value: "Condiment"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Content", "current-date"),
  value: "Content"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Contrail One", "current-date"),
  value: "Contrail One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Convergence", "current-date"),
  value: "Convergence"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cookie", "current-date"),
  value: "Cookie"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Copse", "current-date"),
  value: "Copse"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Corben", "current-date"),
  value: "Corben"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cormorant", "current-date"),
  value: "Cormorant"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cormorant Garamond", "current-date"),
  value: "Cormorant Garamond"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cormorant Infant", "current-date"),
  value: "Cormorant Infant"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cormorant SC", "current-date"),
  value: "Cormorant SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cormorant Unicase", "current-date"),
  value: "Cormorant Unicase"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cormorant Upright", "current-date"),
  value: "Cormorant Upright"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Courgette", "current-date"),
  value: "Courgette"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cousine", "current-date"),
  value: "Cousine"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Coustard", "current-date"),
  value: "Coustard"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Covered By Your Grace", "current-date"),
  value: "Covered By Your Grace"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Crafty Girls", "current-date"),
  value: "Crafty Girls"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Creepster", "current-date"),
  value: "Creepster"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Creepster Caps", "current-date"),
  value: "Creepster Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Crete Round", "current-date"),
  value: "Crete Round"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Crimson Pro", "current-date"),
  value: "Crimson Pro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Crimson Text", "current-date"),
  value: "Crimson Text"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Croissant One", "current-date"),
  value: "Croissant One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Crushed", "current-date"),
  value: "Crushed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cuprum", "current-date"),
  value: "Cuprum"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cute Font", "current-date"),
  value: "Cute Font"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cutive", "current-date"),
  value: "Cutive"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Cutive Mono", "current-date"),
  value: "Cutive Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Damion", "current-date"),
  value: "Damion"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dancing Script", "current-date"),
  value: "Dancing Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dangrek", "current-date"),
  value: "Dangrek"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Darker Grotesque", "current-date"),
  value: "Darker Grotesque"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dawning of a New Day", "current-date"),
  value: "Dawning of a New Day"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Days One", "current-date"),
  value: "Days One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("decovaralpha", "current-date"),
  value: "decovaralpha"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dekko", "current-date"),
  value: "Dekko"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Delius", "current-date"),
  value: "Delius"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Delius Swash Caps", "current-date"),
  value: "Delius Swash Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Delius Unicase", "current-date"),
  value: "Delius Unicase"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Della Respira", "current-date"),
  value: "Della Respira"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Denk One", "current-date"),
  value: "Denk One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Devonshire", "current-date"),
  value: "Devonshire"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dhurjati", "current-date"),
  value: "Dhurjati"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dhyana", "current-date"),
  value: "Dhyana"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Didact Gothic", "current-date"),
  value: "Didact Gothic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Digital Numbers", "current-date"),
  value: "Digital Numbers"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Diplomata", "current-date"),
  value: "Diplomata"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Diplomata SC", "current-date"),
  value: "Diplomata SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("DM Sans", "current-date"),
  value: "DM Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("DM Serif Display", "current-date"),
  value: "DM Serif Display"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("DM Serif Text", "current-date"),
  value: "DM Serif Text"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Do Hyeon", "current-date"),
  value: "Do Hyeon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dokdo", "current-date"),
  value: "Dokdo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Domine", "current-date"),
  value: "Domine"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Donegal One", "current-date"),
  value: "Donegal One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Doppio One", "current-date"),
  value: "Doppio One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dorsa", "current-date"),
  value: "Dorsa"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dosis", "current-date"),
  value: "Dosis"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dr Sugiyama", "current-date"),
  value: "Dr Sugiyama"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Duru Sans", "current-date"),
  value: "Duru Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Dynalight", "current-date"),
  value: "Dynalight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Eagle Lake", "current-date"),
  value: "Eagle Lake"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("East Sea Dokdo", "current-date"),
  value: "East Sea Dokdo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Eater", "current-date"),
  value: "Eater"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Eater Caps", "current-date"),
  value: "Eater Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("EB Garamond", "current-date"),
  value: "EB Garamond"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Economica", "current-date"),
  value: "Economica"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Eczar", "current-date"),
  value: "Eczar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ek Mukta", "current-date"),
  value: "Ek Mukta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("El Messiri", "current-date"),
  value: "El Messiri"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Electrolize", "current-date"),
  value: "Electrolize"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Elsie", "current-date"),
  value: "Elsie"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Elsie Swash Caps", "current-date"),
  value: "Elsie Swash Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Emblema One", "current-date"),
  value: "Emblema One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Emilys Candy", "current-date"),
  value: "Emilys Candy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Encode Sans", "current-date"),
  value: "Encode Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Encode Sans Condensed", "current-date"),
  value: "Encode Sans Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Encode Sans Expanded", "current-date"),
  value: "Encode Sans Expanded"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Encode Sans Semi Condensed", "current-date"),
  value: "Encode Sans Semi Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Encode Sans Semi Expanded", "current-date"),
  value: "Encode Sans Semi Expanded"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Engagement", "current-date"),
  value: "Engagement"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Englebert", "current-date"),
  value: "Englebert"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Enriqueta", "current-date"),
  value: "Enriqueta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Erica One", "current-date"),
  value: "Erica One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Esteban", "current-date"),
  value: "Esteban"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Euphoria Script", "current-date"),
  value: "Euphoria Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ewert", "current-date"),
  value: "Ewert"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Exo", "current-date"),
  value: "Exo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Exo 2", "current-date"),
  value: "Exo 2"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Expletus Sans", "current-date"),
  value: "Expletus Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fahkwang", "current-date"),
  value: "Fahkwang"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fanwood Text", "current-date"),
  value: "Fanwood Text"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Farro", "current-date"),
  value: "Farro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Farsan", "current-date"),
  value: "Farsan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fascinate", "current-date"),
  value: "Fascinate"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fascinate Inline", "current-date"),
  value: "Fascinate Inline"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Faster One", "current-date"),
  value: "Faster One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fasthand", "current-date"),
  value: "Fasthand"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fauna One", "current-date"),
  value: "Fauna One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Faustina", "current-date"),
  value: "Faustina"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("faustinavfbeta", "current-date"),
  value: "faustinavfbeta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Federant", "current-date"),
  value: "Federant"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Federo", "current-date"),
  value: "Federo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Felipa", "current-date"),
  value: "Felipa"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fenix", "current-date"),
  value: "Fenix"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Finger Paint", "current-date"),
  value: "Finger Paint"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fira Code", "current-date"),
  value: "Fira Code"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fira Mono", "current-date"),
  value: "Fira Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fira Sans", "current-date"),
  value: "Fira Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fira Sans Condensed", "current-date"),
  value: "Fira Sans Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fira Sans Extra Condensed", "current-date"),
  value: "Fira Sans Extra Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fjalla One", "current-date"),
  value: "Fjalla One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fjord One", "current-date"),
  value: "Fjord One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Flamenco", "current-date"),
  value: "Flamenco"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Flavors", "current-date"),
  value: "Flavors"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fondamento", "current-date"),
  value: "Fondamento"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fontdiner Swanky", "current-date"),
  value: "Fontdiner Swanky"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Forum", "current-date"),
  value: "Forum"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Francois One", "current-date"),
  value: "Francois One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Frank Ruhl Libre", "current-date"),
  value: "Frank Ruhl Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Freckle Face", "current-date"),
  value: "Freckle Face"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fredericka the Great", "current-date"),
  value: "Fredericka the Great"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fredoka One", "current-date"),
  value: "Fredoka One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Freehand", "current-date"),
  value: "Freehand"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fresca", "current-date"),
  value: "Fresca"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Frijole", "current-date"),
  value: "Frijole"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fruktur", "current-date"),
  value: "Fruktur"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Fugaz One", "current-date"),
  value: "Fugaz One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gabriela", "current-date"),
  value: "Gabriela"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gaegu", "current-date"),
  value: "Gaegu"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gafata", "current-date"),
  value: "Gafata"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Galada", "current-date"),
  value: "Galada"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Galdeano", "current-date"),
  value: "Galdeano"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Galindo", "current-date"),
  value: "Galindo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gamja Flower", "current-date"),
  value: "Gamja Flower"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gayathri", "current-date"),
  value: "Gayathri"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gemunu Libre", "current-date"),
  value: "Gemunu Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gentium Basic", "current-date"),
  value: "Gentium Basic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gentium Book Basic", "current-date"),
  value: "Gentium Book Basic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Geo", "current-date"),
  value: "Geo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Geostar", "current-date"),
  value: "Geostar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Geostar Fill", "current-date"),
  value: "Geostar Fill"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Germania One", "current-date"),
  value: "Germania One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("GFS Didot", "current-date"),
  value: "GFS Didot"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("GFS Neohellenic", "current-date"),
  value: "GFS Neohellenic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gidugu", "current-date"),
  value: "Gidugu"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gilda Display", "current-date"),
  value: "Gilda Display"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Give You Glory", "current-date"),
  value: "Give You Glory"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Glass Antiqua", "current-date"),
  value: "Glass Antiqua"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Glegoo", "current-date"),
  value: "Glegoo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gloria Hallelujah", "current-date"),
  value: "Gloria Hallelujah"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Goblin One", "current-date"),
  value: "Goblin One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gochi Hand", "current-date"),
  value: "Gochi Hand"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gorditas", "current-date"),
  value: "Gorditas"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gothic A1", "current-date"),
  value: "Gothic A1"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Goudy Bookletter 1911", "current-date"),
  value: "Goudy Bookletter 1911"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Graduate", "current-date"),
  value: "Graduate"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Grand Hotel", "current-date"),
  value: "Grand Hotel"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gravitas One", "current-date"),
  value: "Gravitas One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Great Vibes", "current-date"),
  value: "Great Vibes"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Grenze", "current-date"),
  value: "Grenze"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Griffy", "current-date"),
  value: "Griffy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gruppo", "current-date"),
  value: "Gruppo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gudea", "current-date"),
  value: "Gudea"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gugi", "current-date"),
  value: "Gugi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Gurajada", "current-date"),
  value: "Gurajada"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Habibi", "current-date"),
  value: "Habibi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Halant", "current-date"),
  value: "Halant"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hammersmith One", "current-date"),
  value: "Hammersmith One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hanalei", "current-date"),
  value: "Hanalei"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hanalei Fill", "current-date"),
  value: "Hanalei Fill"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Handlee", "current-date"),
  value: "Handlee"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("hanna", "current-date"),
  value: "hanna"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("hannari", "current-date"),
  value: "hannari"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hanuman", "current-date"),
  value: "Hanuman"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Happy Monkey", "current-date"),
  value: "Happy Monkey"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Harmattan", "current-date"),
  value: "Harmattan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Headland One", "current-date"),
  value: "Headland One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Heebo", "current-date"),
  value: "Heebo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Henny Penny", "current-date"),
  value: "Henny Penny"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hermeneus One", "current-date"),
  value: "Hermeneus One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Herr Von Muellerhoff", "current-date"),
  value: "Herr Von Muellerhoff"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hi Melody", "current-date"),
  value: "Hi Melody"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hind", "current-date"),
  value: "Hind"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hind Colombo", "current-date"),
  value: "Hind Colombo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hind Guntur", "current-date"),
  value: "Hind Guntur"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hind Jalandhar", "current-date"),
  value: "Hind Jalandhar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hind Kochi", "current-date"),
  value: "Hind Kochi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hind Madurai", "current-date"),
  value: "Hind Madurai"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hind Mysuru", "current-date"),
  value: "Hind Mysuru"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hind Siliguri", "current-date"),
  value: "Hind Siliguri"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Hind Vadodara", "current-date"),
  value: "Hind Vadodara"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Holtwood One SC", "current-date"),
  value: "Holtwood One SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Homemade Apple", "current-date"),
  value: "Homemade Apple"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Homenaje", "current-date"),
  value: "Homenaje"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IBM Plex Mono", "current-date"),
  value: "IBM Plex Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IBM Plex Sans", "current-date"),
  value: "IBM Plex Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IBM Plex Sans Condensed", "current-date"),
  value: "IBM Plex Sans Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IBM Plex Serif", "current-date"),
  value: "IBM Plex Serif"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Iceberg", "current-date"),
  value: "Iceberg"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Iceland", "current-date"),
  value: "Iceland"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell Double Pica", "current-date"),
  value: "IM Fell Double Pica"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell Double Pica SC", "current-date"),
  value: "IM Fell Double Pica SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell DW Pica", "current-date"),
  value: "IM Fell DW Pica"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell DW Pica SC", "current-date"),
  value: "IM Fell DW Pica SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell English", "current-date"),
  value: "IM Fell English"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell English SC", "current-date"),
  value: "IM Fell English SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell French Canon", "current-date"),
  value: "IM Fell French Canon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell French Canon SC", "current-date"),
  value: "IM Fell French Canon SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell Great Primer", "current-date"),
  value: "IM Fell Great Primer"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("IM Fell Great Primer SC", "current-date"),
  value: "IM Fell Great Primer SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Imprima", "current-date"),
  value: "Imprima"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inconsolata", "current-date"),
  value: "Inconsolata"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inder", "current-date"),
  value: "Inder"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Indie Flower", "current-date"),
  value: "Indie Flower"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inika", "current-date"),
  value: "Inika"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Inknut Antiqua", "current-date"),
  value: "Inknut Antiqua"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Irish Grover", "current-date"),
  value: "Irish Grover"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Istok Web", "current-date"),
  value: "Istok Web"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Italiana", "current-date"),
  value: "Italiana"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Italianno", "current-date"),
  value: "Italianno"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Itim", "current-date"),
  value: "Itim"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jacques Francois", "current-date"),
  value: "Jacques Francois"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jacques Francois Shadow", "current-date"),
  value: "Jacques Francois Shadow"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jaldi", "current-date"),
  value: "Jaldi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("jejugothic", "current-date"),
  value: "jejugothic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("jejuhallasan", "current-date"),
  value: "jejuhallasan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("jejumyeongjo", "current-date"),
  value: "jejumyeongjo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jim Nightshade", "current-date"),
  value: "Jim Nightshade"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jockey One", "current-date"),
  value: "Jockey One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jolly Lodger", "current-date"),
  value: "Jolly Lodger"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jomhuria", "current-date"),
  value: "Jomhuria"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("jomolhari", "current-date"),
  value: "jomolhari"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Josefin Sans", "current-date"),
  value: "Josefin Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Josefin Sans Std Light", "current-date"),
  value: "Josefin Sans Std Light"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Josefin Slab", "current-date"),
  value: "Josefin Slab"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Joti One", "current-date"),
  value: "Joti One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jua", "current-date"),
  value: "Jua"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Judson", "current-date"),
  value: "Judson"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Julee", "current-date"),
  value: "Julee"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Julius Sans One", "current-date"),
  value: "Julius Sans One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Junge", "current-date"),
  value: "Junge"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Jura", "current-date"),
  value: "Jura"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Just Another Hand", "current-date"),
  value: "Just Another Hand"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Just Me Again Down Here", "current-date"),
  value: "Just Me Again Down Here"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("K2D", "current-date"),
  value: "K2D"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kadwa", "current-date"),
  value: "Kadwa"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kalam", "current-date"),
  value: "Kalam"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kameron", "current-date"),
  value: "Kameron"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kanit", "current-date"),
  value: "Kanit"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kantumruy", "current-date"),
  value: "Kantumruy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Karla", "current-date"),
  value: "Karla"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Karla Tamil Inclined", "current-date"),
  value: "Karla Tamil Inclined"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Karla Tamil Upright", "current-date"),
  value: "Karla Tamil Upright"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Karma", "current-date"),
  value: "Karma"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Katibeh", "current-date"),
  value: "Katibeh"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kaushan Script", "current-date"),
  value: "Kaushan Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kavivanar", "current-date"),
  value: "Kavivanar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kavoon", "current-date"),
  value: "Kavoon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kdam Thmor", "current-date"),
  value: "Kdam Thmor"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Keania One", "current-date"),
  value: "Keania One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kelly Slab", "current-date"),
  value: "Kelly Slab"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kenia", "current-date"),
  value: "Kenia"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Khand", "current-date"),
  value: "Khand"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Khmer", "current-date"),
  value: "Khmer"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Khula", "current-date"),
  value: "Khula"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("khyay", "current-date"),
  value: "khyay"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kirang Haerang", "current-date"),
  value: "Kirang Haerang"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kite One", "current-date"),
  value: "Kite One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Knewave", "current-date"),
  value: "Knewave"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kodchasan", "current-date"),
  value: "Kodchasan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("KoHo", "current-date"),
  value: "KoHo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("kokoro", "current-date"),
  value: "kokoro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("kopubbatang", "current-date"),
  value: "kopubbatang"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kotta One", "current-date"),
  value: "Kotta One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Koulen", "current-date"),
  value: "Koulen"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kranky", "current-date"),
  value: "Kranky"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kreon", "current-date"),
  value: "Kreon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kristi", "current-date"),
  value: "Kristi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Krona One", "current-date"),
  value: "Krona One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Krub", "current-date"),
  value: "Krub"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kumar One", "current-date"),
  value: "Kumar One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Kurale", "current-date"),
  value: "Kurale"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("La Belle Aurore", "current-date"),
  value: "La Belle Aurore"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lacquer", "current-date"),
  value: "Lacquer"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Laila", "current-date"),
  value: "Laila"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lakki Reddy", "current-date"),
  value: "Lakki Reddy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lalezar", "current-date"),
  value: "Lalezar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lancelot", "current-date"),
  value: "Lancelot"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("laomuangdon", "current-date"),
  value: "laomuangdon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("laomuangkhong", "current-date"),
  value: "laomuangkhong"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("laosanspro", "current-date"),
  value: "laosanspro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lateef", "current-date"),
  value: "Lateef"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lato", "current-date"),
  value: "Lato"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("League Script", "current-date"),
  value: "League Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Leckerli One", "current-date"),
  value: "Leckerli One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ledger", "current-date"),
  value: "Ledger"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lekton", "current-date"),
  value: "Lekton"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lemon", "current-date"),
  value: "Lemon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lemonada", "current-date"),
  value: "Lemonada"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Barcode 128", "current-date"),
  value: "Libre Barcode 128"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Barcode 128 Text", "current-date"),
  value: "Libre Barcode 128 Text"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Barcode 39", "current-date"),
  value: "Libre Barcode 39"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Barcode 39 Extended", "current-date"),
  value: "Libre Barcode 39 Extended"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Barcode 39 Extended Text", "current-date"),
  value: "Libre Barcode 39 Extended Text"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Barcode 39 Text", "current-date"),
  value: "Libre Barcode 39 Text"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Baskerville", "current-date"),
  value: "Libre Baskerville"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Caslon Display", "current-date"),
  value: "Libre Caslon Display"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Caslon Text", "current-date"),
  value: "Libre Caslon Text"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Libre Franklin", "current-date"),
  value: "Libre Franklin"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Life Savers", "current-date"),
  value: "Life Savers"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lilita One", "current-date"),
  value: "Lilita One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lily Script One", "current-date"),
  value: "Lily Script One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Limelight", "current-date"),
  value: "Limelight"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Linden Hill", "current-date"),
  value: "Linden Hill"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Literata", "current-date"),
  value: "Literata"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Liu Jian Mao Cao", "current-date"),
  value: "Liu Jian Mao Cao"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Livvic", "current-date"),
  value: "Livvic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lobster", "current-date"),
  value: "Lobster"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lobster Two", "current-date"),
  value: "Lobster Two"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lohit Bengali", "current-date"),
  value: "Lohit Bengali"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lohit Tamil", "current-date"),
  value: "Lohit Tamil"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("lohitdevanagari", "current-date"),
  value: "lohitdevanagari"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Londrina Outline", "current-date"),
  value: "Londrina Outline"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Londrina Shadow", "current-date"),
  value: "Londrina Shadow"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Londrina Sketch", "current-date"),
  value: "Londrina Sketch"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Londrina Solid", "current-date"),
  value: "Londrina Solid"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Long Cang", "current-date"),
  value: "Long Cang"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lora", "current-date"),
  value: "Lora"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Love Ya Like A Sister", "current-date"),
  value: "Love Ya Like A Sister"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Loved by the King", "current-date"),
  value: "Loved by the King"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lovers Quarrel", "current-date"),
  value: "Lovers Quarrel"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Luckiest Guy", "current-date"),
  value: "Luckiest Guy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lusitana", "current-date"),
  value: "Lusitana"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Lustria", "current-date"),
  value: "Lustria"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ma Shan Zheng", "current-date"),
  value: "Ma Shan Zheng"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Macondo", "current-date"),
  value: "Macondo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Macondo Swash Caps", "current-date"),
  value: "Macondo Swash Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mada", "current-date"),
  value: "Mada"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Magra", "current-date"),
  value: "Magra"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Maiden Orange", "current-date"),
  value: "Maiden Orange"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Maitree", "current-date"),
  value: "Maitree"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Major Mono Display", "current-date"),
  value: "Major Mono Display"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mako", "current-date"),
  value: "Mako"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mali", "current-date"),
  value: "Mali"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mallanna", "current-date"),
  value: "Mallanna"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mandali", "current-date"),
  value: "Mandali"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Manjari", "current-date"),
  value: "Manjari"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Manuale", "current-date"),
  value: "Manuale"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Marcellus", "current-date"),
  value: "Marcellus"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Marcellus SC", "current-date"),
  value: "Marcellus SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Marck Script", "current-date"),
  value: "Marck Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Margarine", "current-date"),
  value: "Margarine"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Marko One", "current-date"),
  value: "Marko One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Marmelad", "current-date"),
  value: "Marmelad"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Martel", "current-date"),
  value: "Martel"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Martel Sans", "current-date"),
  value: "Martel Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Marvel", "current-date"),
  value: "Marvel"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mate", "current-date"),
  value: "Mate"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mate SC", "current-date"),
  value: "Mate SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Maven Pro", "current-date"),
  value: "Maven Pro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("mavenprovfbeta", "current-date"),
  value: "mavenprovfbeta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("McLaren", "current-date"),
  value: "McLaren"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Meddon", "current-date"),
  value: "Meddon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("MedievalSharp", "current-date"),
  value: "MedievalSharp"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Medula One", "current-date"),
  value: "Medula One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Meera Inimai", "current-date"),
  value: "Meera Inimai"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Megrim", "current-date"),
  value: "Megrim"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Meie Script", "current-date"),
  value: "Meie Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Merge One", "current-date"),
  value: "Merge One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Merienda", "current-date"),
  value: "Merienda"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Merienda One", "current-date"),
  value: "Merienda One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Merriweather", "current-date"),
  value: "Merriweather"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Merriweather Sans", "current-date"),
  value: "Merriweather Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mervale Script", "current-date"),
  value: "Mervale Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Metal", "current-date"),
  value: "Metal"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Metal Mania", "current-date"),
  value: "Metal Mania"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Metamorphous", "current-date"),
  value: "Metamorphous"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Metrophobic", "current-date"),
  value: "Metrophobic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Miama", "current-date"),
  value: "Miama"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Michroma", "current-date"),
  value: "Michroma"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Milonga", "current-date"),
  value: "Milonga"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Miltonian", "current-date"),
  value: "Miltonian"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Miltonian Tattoo", "current-date"),
  value: "Miltonian Tattoo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mina", "current-date"),
  value: "Mina"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Miniver", "current-date"),
  value: "Miniver"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Miriam Libre", "current-date"),
  value: "Miriam Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Miss Fajardose", "current-date"),
  value: "Miss Fajardose"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Miss Saint Delafield", "current-date"),
  value: "Miss Saint Delafield"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Modak", "current-date"),
  value: "Modak"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Modern Antiqua", "current-date"),
  value: "Modern Antiqua"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Molengo", "current-date"),
  value: "Molengo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Molle", "current-date"),
  value: "Molle"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Monda", "current-date"),
  value: "Monda"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Monofett", "current-date"),
  value: "Monofett"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Monoton", "current-date"),
  value: "Monoton"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Monsieur La Doulaise", "current-date"),
  value: "Monsieur La Doulaise"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Montaga", "current-date"),
  value: "Montaga"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Montez", "current-date"),
  value: "Montez"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Montserrat", "current-date"),
  value: "Montserrat"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Montserrat Alternates", "current-date"),
  value: "Montserrat Alternates"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Montserrat Subrayada", "current-date"),
  value: "Montserrat Subrayada"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Moul", "current-date"),
  value: "Moul"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Moulpali", "current-date"),
  value: "Moulpali"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mountains of Christmas", "current-date"),
  value: "Mountains of Christmas"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mouse Memoirs", "current-date"),
  value: "Mouse Memoirs"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("mplus1p", "current-date"),
  value: "mplus1p"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mr Bedford", "current-date"),
  value: "Mr Bedford"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mr Bedfort", "current-date"),
  value: "Mr Bedfort"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mr Dafoe", "current-date"),
  value: "Mr Dafoe"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mr De Haviland", "current-date"),
  value: "Mr De Haviland"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mrs Saint Delafield", "current-date"),
  value: "Mrs Saint Delafield"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mrs Sheppards", "current-date"),
  value: "Mrs Sheppards"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mukta", "current-date"),
  value: "Mukta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mukta Mahee", "current-date"),
  value: "Mukta Mahee"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mukta Malar", "current-date"),
  value: "Mukta Malar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mukta Vaani", "current-date"),
  value: "Mukta Vaani"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Muli", "current-date"),
  value: "Muli"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("myanmarsanspro", "current-date"),
  value: "myanmarsanspro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Mystery Quest", "current-date"),
  value: "Mystery Quest"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nanum Brush Script", "current-date"),
  value: "Nanum Brush Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nanum Gothic", "current-date"),
  value: "Nanum Gothic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nanum Gothic Coding", "current-date"),
  value: "Nanum Gothic Coding"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nanum Myeongjo", "current-date"),
  value: "Nanum Myeongjo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nanum Pen Script", "current-date"),
  value: "Nanum Pen Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("NATS", "current-date"),
  value: "NATS"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Neucha", "current-date"),
  value: "Neucha"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Neuton", "current-date"),
  value: "Neuton"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("New Rocker", "current-date"),
  value: "New Rocker"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("News Cycle", "current-date"),
  value: "News Cycle"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("nicomoji", "current-date"),
  value: "nicomoji"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Niconne", "current-date"),
  value: "Niconne"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("nikukyu", "current-date"),
  value: "nikukyu"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Niramit", "current-date"),
  value: "Niramit"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nixie One", "current-date"),
  value: "Nixie One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nobile", "current-date"),
  value: "Nobile"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nokora", "current-date"),
  value: "Nokora"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Norican", "current-date"),
  value: "Norican"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nosifer", "current-date"),
  value: "Nosifer"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nosifer Caps", "current-date"),
  value: "Nosifer Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Notable", "current-date"),
  value: "Notable"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nothing You Could Do", "current-date"),
  value: "Nothing You Could Do"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Noticia Text", "current-date"),
  value: "Noticia Text"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Noto Sans", "current-date"),
  value: "Noto Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Noto Serif", "current-date"),
  value: "Noto Serif"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("notosanstamil", "current-date"),
  value: "notosanstamil"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nova Cut", "current-date"),
  value: "Nova Cut"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nova Flat", "current-date"),
  value: "Nova Flat"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nova Mono", "current-date"),
  value: "Nova Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nova Oval", "current-date"),
  value: "Nova Oval"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nova Round", "current-date"),
  value: "Nova Round"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nova Script", "current-date"),
  value: "Nova Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nova Slim", "current-date"),
  value: "Nova Slim"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nova Square", "current-date"),
  value: "Nova Square"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("NTR", "current-date"),
  value: "NTR"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Numans", "current-date"),
  value: "Numans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nunito", "current-date"),
  value: "Nunito"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Nunito Sans", "current-date"),
  value: "Nunito Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Odor Mean Chey", "current-date"),
  value: "Odor Mean Chey"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Offside", "current-date"),
  value: "Offside"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("OFL Sorts Mill Goudy TT", "current-date"),
  value: "OFL Sorts Mill Goudy TT"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Old Standard TT", "current-date"),
  value: "Old Standard TT"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Oldenburg", "current-date"),
  value: "Oldenburg"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Oleo Script", "current-date"),
  value: "Oleo Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Oleo Script Swash Caps", "current-date"),
  value: "Oleo Script Swash Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Open Sans", "current-date"),
  value: "Open Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Open Sans Condensed", "current-date"),
  value: "Open Sans Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("opensanshebrew", "current-date"),
  value: "opensanshebrew"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("opensanshebrewcondensed", "current-date"),
  value: "opensanshebrewcondensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Oranienbaum", "current-date"),
  value: "Oranienbaum"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Orbitron", "current-date"),
  value: "Orbitron"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Oregano", "current-date"),
  value: "Oregano"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Orienta", "current-date"),
  value: "Orienta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Original Surfer", "current-date"),
  value: "Original Surfer"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Oswald", "current-date"),
  value: "Oswald"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Over the Rainbow", "current-date"),
  value: "Over the Rainbow"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Overlock", "current-date"),
  value: "Overlock"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Overlock SC", "current-date"),
  value: "Overlock SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Overpass", "current-date"),
  value: "Overpass"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Overpass Mono", "current-date"),
  value: "Overpass Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ovo", "current-date"),
  value: "Ovo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Oxygen", "current-date"),
  value: "Oxygen"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Oxygen Mono", "current-date"),
  value: "Oxygen Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pacifico", "current-date"),
  value: "Pacifico"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Padauk", "current-date"),
  value: "Padauk"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Palanquin", "current-date"),
  value: "Palanquin"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Palanquin Dark", "current-date"),
  value: "Palanquin Dark"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pangolin", "current-date"),
  value: "Pangolin"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Paprika", "current-date"),
  value: "Paprika"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Parisienne", "current-date"),
  value: "Parisienne"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Passero One", "current-date"),
  value: "Passero One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Passion One", "current-date"),
  value: "Passion One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pathway Gothic One", "current-date"),
  value: "Pathway Gothic One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Patrick Hand", "current-date"),
  value: "Patrick Hand"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Patrick Hand SC", "current-date"),
  value: "Patrick Hand SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pattaya", "current-date"),
  value: "Pattaya"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Patua One", "current-date"),
  value: "Patua One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pavanam", "current-date"),
  value: "Pavanam"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Paytone One", "current-date"),
  value: "Paytone One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pecita", "current-date"),
  value: "Pecita"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Peddana", "current-date"),
  value: "Peddana"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Peralta", "current-date"),
  value: "Peralta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Permanent Marker", "current-date"),
  value: "Permanent Marker"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Petit Formal Script", "current-date"),
  value: "Petit Formal Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Petrona", "current-date"),
  value: "Petrona"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Phetsarath", "current-date"),
  value: "Phetsarath"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Philosopher", "current-date"),
  value: "Philosopher"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Piedra", "current-date"),
  value: "Piedra"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pinyon Script", "current-date"),
  value: "Pinyon Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pirata One", "current-date"),
  value: "Pirata One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Plaster", "current-date"),
  value: "Plaster"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Play", "current-date"),
  value: "Play"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Playball", "current-date"),
  value: "Playball"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Playfair Display", "current-date"),
  value: "Playfair Display"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Playfair Display SC", "current-date"),
  value: "Playfair Display SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Podkova", "current-date"),
  value: "Podkova"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("podkovavfbeta", "current-date"),
  value: "podkovavfbeta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Poetsen One", "current-date"),
  value: "Poetsen One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Poiret One", "current-date"),
  value: "Poiret One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Poller One", "current-date"),
  value: "Poller One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Poly", "current-date"),
  value: "Poly"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pompiere", "current-date"),
  value: "Pompiere"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ponnala", "current-date"),
  value: "Ponnala"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pontano Sans", "current-date"),
  value: "Pontano Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Poor Story", "current-date"),
  value: "Poor Story"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Poppins", "current-date"),
  value: "Poppins"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Port Lligat Sans", "current-date"),
  value: "Port Lligat Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Port Lligat Slab", "current-date"),
  value: "Port Lligat Slab"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Porter Sans Block", "current-date"),
  value: "Porter Sans Block"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Post No Bills Colombo", "current-date"),
  value: "Post No Bills Colombo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Post No Bills Jaffna", "current-date"),
  value: "Post No Bills Jaffna"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pragati Narrow", "current-date"),
  value: "Pragati Narrow"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Preahvihear", "current-date"),
  value: "Preahvihear"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Press Start 2P", "current-date"),
  value: "Press Start 2P"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pridi", "current-date"),
  value: "Pridi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Princess Sofia", "current-date"),
  value: "Princess Sofia"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Prociono", "current-date"),
  value: "Prociono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Prompt", "current-date"),
  value: "Prompt"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Prosto One", "current-date"),
  value: "Prosto One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Proza Libre", "current-date"),
  value: "Proza Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("PT Mono", "current-date"),
  value: "PT Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("PT Sans", "current-date"),
  value: "PT Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("PT Sans Caption", "current-date"),
  value: "PT Sans Caption"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("PT Sans Narrow", "current-date"),
  value: "PT Sans Narrow"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("PT Serif", "current-date"),
  value: "PT Serif"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("PT Serif Caption", "current-date"),
  value: "PT Serif Caption"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Puritan", "current-date"),
  value: "Puritan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Purple Purse", "current-date"),
  value: "Purple Purse"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Pushster", "current-date"),
  value: "Pushster"
}, {
  label: "Quando",
  value: "Quando"
}, {
  label: "Quantico",
  value: "Quantico"
}, {
  label: "Quattrocento",
  value: "Quattrocento"
}, {
  label: "Quattrocento Sans",
  value: "Quattrocento Sans"
}, {
  label: "Questrial",
  value: "Questrial"
}, {
  label: "Quicksand",
  value: "Quicksand"
}, {
  label: "Quintessential",
  value: "Quintessential"
}, {
  label: "Qwigley",
  value: "Qwigley"
}, {
  label: "Racing Sans One",
  value: "Racing Sans One"
}, {
  label: "Radley",
  value: "Radley"
}, {
  label: "Rajdhani",
  value: "Rajdhani"
}, {
  label: "Rakkas",
  value: "Rakkas"
}, {
  label: "Raleway",
  value: "Raleway"
}, {
  label: "Raleway Dots",
  value: "Raleway Dots"
}, {
  label: "Ramabhadra",
  value: "Ramabhadra"
}, {
  label: "Ramaraja",
  value: "Ramaraja"
}, {
  label: "Rambla",
  value: "Rambla"
}, {
  label: "Rammetto One",
  value: "Rammetto One"
}, {
  label: "Ranchers",
  value: "Ranchers"
}, {
  label: "Rancho",
  value: "Rancho"
}, {
  label: "Ranga",
  value: "Ranga"
}, {
  label: "Rasa",
  value: "Rasa"
}, {
  label: "Rationale",
  value: "Rationale"
}, {
  label: "Ravi Prakash",
  value: "Ravi Prakash"
}, {
  label: "Red Hat Display",
  value: "Red Hat Display"
}, {
  label: "Red Hat Text",
  value: "Red Hat Text"
}, {
  label: "Redacted",
  value: "Redacted"
}, {
  label: "Redacted Script",
  value: "Redacted Script"
}, {
  label: "Redressed",
  value: "Redressed"
}, {
  label: "Reem Kufi",
  value: "Reem Kufi"
}, {
  label: "Reenie Beanie",
  value: "Reenie Beanie"
}, {
  label: "Revalia",
  value: "Revalia"
}, {
  label: "Rhodium Libre",
  value: "Rhodium Libre"
}, {
  label: "Ribeye",
  value: "Ribeye"
}, {
  label: "Ribeye Marrow",
  value: "Ribeye Marrow"
}, {
  label: "Righteous",
  value: "Righteous"
}, {
  label: "Risque",
  value: "Risque"
}, {
  label: "Roboto",
  value: "Roboto"
}, {
  label: "Roboto Condensed",
  value: "Roboto Condensed"
}, {
  label: "Roboto Mono",
  value: "Roboto Mono"
}, {
  label: "Roboto Slab",
  value: "Roboto Slab"
}, {
  label: "Rochester",
  value: "Rochester"
}, {
  label: "Rock Salt",
  value: "Rock Salt"
}, {
  label: "Rokkitt",
  value: "Rokkitt"
}, {
  label: "Romanesco",
  value: "Romanesco"
}, {
  label: "Ropa Sans",
  value: "Ropa Sans"
}, {
  label: "Rosario",
  value: "Rosario"
}, {
  label: "Rosarivo",
  value: "Rosarivo"
}, {
  label: "Rouge Script",
  value: "Rouge Script"
}, {
  label: "roundedmplus1c",
  value: "roundedmplus1c"
}, {
  label: "Rozha One",
  value: "Rozha One"
}, {
  label: "Rubik",
  value: "Rubik"
}, {
  label: "Rubik Mono One",
  value: "Rubik Mono One"
}, {
  label: "Rubik One",
  value: "Rubik One"
}, {
  label: "Ruda",
  value: "Ruda"
}, {
  label: "Rufina",
  value: "Rufina"
}, {
  label: "Ruge Boogie",
  value: "Ruge Boogie"
}, {
  label: "Ruluko",
  value: "Ruluko"
}, {
  label: "Rum Raisin",
  value: "Rum Raisin"
}, {
  label: "Ruslan Display",
  value: "Ruslan Display"
}, {
  label: "Russo One",
  value: "Russo One"
}, {
  label: "Ruthie",
  value: "Ruthie"
}, {
  label: "Rye",
  value: "Rye"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sacramento", "current-date"),
  value: "Sacramento"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sahitya", "current-date"),
  value: "Sahitya"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sail", "current-date"),
  value: "Sail"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Saira", "current-date"),
  value: "Saira"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Saira Condensed", "current-date"),
  value: "Saira Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Saira Extra Condensed", "current-date"),
  value: "Saira Extra Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Saira Semi Condensed", "current-date"),
  value: "Saira Semi Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Saira Stencil One", "current-date"),
  value: "Saira Stencil One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Salsa", "current-date"),
  value: "Salsa"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sanchez", "current-date"),
  value: "Sanchez"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sancreek", "current-date"),
  value: "Sancreek"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sansation", "current-date"),
  value: "Sansation"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sansita", "current-date"),
  value: "Sansita"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sansita One", "current-date"),
  value: "Sansita One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sarabun", "current-date"),
  value: "Sarabun"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sarala", "current-date"),
  value: "Sarala"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sarina", "current-date"),
  value: "Sarina"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sarpanch", "current-date"),
  value: "Sarpanch"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Satisfy", "current-date"),
  value: "Satisfy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("sawarabigothic", "current-date"),
  value: "sawarabigothic"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("sawarabimincho", "current-date"),
  value: "sawarabimincho"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Scada", "current-date"),
  value: "Scada"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Scheherazade", "current-date"),
  value: "Scheherazade"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Schoolbell", "current-date"),
  value: "Schoolbell"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Scope One", "current-date"),
  value: "Scope One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Seaweed Script", "current-date"),
  value: "Seaweed Script"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Secular One", "current-date"),
  value: "Secular One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sedan", "current-date"),
  value: "Sedan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sedan SC", "current-date"),
  value: "Sedan SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sedgwick Ave", "current-date"),
  value: "Sedgwick Ave"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sedgwick Ave Display", "current-date"),
  value: "Sedgwick Ave Display"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("seoulhangang", "current-date"),
  value: "seoulhangang"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("seoulhangangcondensed", "current-date"),
  value: "seoulhangangcondensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("seoulnamsan", "current-date"),
  value: "seoulnamsan"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("seoulnamsancondensed", "current-date"),
  value: "seoulnamsancondensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("seoulnamsanvertical", "current-date"),
  value: "seoulnamsanvertical"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sevillana", "current-date"),
  value: "Sevillana"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Seymour One", "current-date"),
  value: "Seymour One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Shadows Into Light", "current-date"),
  value: "Shadows Into Light"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Shadows Into Light Two", "current-date"),
  value: "Shadows Into Light Two"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Shanti", "current-date"),
  value: "Shanti"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Share", "current-date"),
  value: "Share"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Share Tech", "current-date"),
  value: "Share Tech"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Share Tech Mono", "current-date"),
  value: "Share Tech Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Shojumaru", "current-date"),
  value: "Shojumaru"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Short Stack", "current-date"),
  value: "Short Stack"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Shrikhand", "current-date"),
  value: "Shrikhand"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Siamreap", "current-date"),
  value: "Siamreap"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Siemreap", "current-date"),
  value: "Siemreap"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sigmar One", "current-date"),
  value: "Sigmar One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Signika", "current-date"),
  value: "Signika"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Signika Negative", "current-date"),
  value: "Signika Negative"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Simonetta", "current-date"),
  value: "Simonetta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Single Day", "current-date"),
  value: "Single Day"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sintony", "current-date"),
  value: "Sintony"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sirin Stencil", "current-date"),
  value: "Sirin Stencil"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sitara", "current-date"),
  value: "Sitara"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Six Caps", "current-date"),
  value: "Six Caps"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Skranji", "current-date"),
  value: "Skranji"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Slabo 13px", "current-date"),
  value: "Slabo 13px"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Slabo 27px", "current-date"),
  value: "Slabo 27px"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Slackey", "current-date"),
  value: "Slackey"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Smokum", "current-date"),
  value: "Smokum"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Smythe", "current-date"),
  value: "Smythe"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sniglet", "current-date"),
  value: "Sniglet"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Snippet", "current-date"),
  value: "Snippet"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Snowburst One", "current-date"),
  value: "Snowburst One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sofadi One", "current-date"),
  value: "Sofadi One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sofia", "current-date"),
  value: "Sofia"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Solway", "current-date"),
  value: "Solway"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Song Myung", "current-date"),
  value: "Song Myung"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sonsie One", "current-date"),
  value: "Sonsie One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sorts Mill Goudy", "current-date"),
  value: "Sorts Mill Goudy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("souliyo", "current-date"),
  value: "souliyo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Source Code Pro", "current-date"),
  value: "Source Code Pro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Source Sans Pro", "current-date"),
  value: "Source Sans Pro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Source Serif Pro", "current-date"),
  value: "Source Serif Pro"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Space Mono", "current-date"),
  value: "Space Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Special Elite", "current-date"),
  value: "Special Elite"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Spectral", "current-date"),
  value: "Spectral"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Spicy Rice", "current-date"),
  value: "Spicy Rice"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Spinnaker", "current-date"),
  value: "Spinnaker"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Spirax", "current-date"),
  value: "Spirax"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Squada One", "current-date"),
  value: "Squada One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sree Krushnadevaraya", "current-date"),
  value: "Sree Krushnadevaraya"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sriracha", "current-date"),
  value: "Sriracha"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Srisakdi", "current-date"),
  value: "Srisakdi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Staatliches", "current-date"),
  value: "Staatliches"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Stalemate", "current-date"),
  value: "Stalemate"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Stalin One", "current-date"),
  value: "Stalin One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Stalinist One", "current-date"),
  value: "Stalinist One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Stardos Stencil", "current-date"),
  value: "Stardos Stencil"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Stint Ultra Condensed", "current-date"),
  value: "Stint Ultra Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Stint Ultra Expanded", "current-date"),
  value: "Stint Ultra Expanded"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Stoke", "current-date"),
  value: "Stoke"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Strait", "current-date"),
  value: "Strait"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Strong", "current-date"),
  value: "Strong"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Stylish", "current-date"),
  value: "Stylish"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sue Ellen Francisco", "current-date"),
  value: "Sue Ellen Francisco"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Suez One", "current-date"),
  value: "Suez One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sumana", "current-date"),
  value: "Sumana"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sunflower", "current-date"),
  value: "Sunflower"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sunshiney", "current-date"),
  value: "Sunshiney"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Supermercado One", "current-date"),
  value: "Supermercado One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Sura", "current-date"),
  value: "Sura"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Suranna", "current-date"),
  value: "Suranna"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Suravaram", "current-date"),
  value: "Suravaram"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Suwannaphum", "current-date"),
  value: "Suwannaphum"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Swanky and Moo Moo", "current-date"),
  value: "Swanky and Moo Moo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Syncopate", "current-date"),
  value: "Syncopate"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tajawal", "current-date"),
  value: "Tajawal"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tangerine", "current-date"),
  value: "Tangerine"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Taprom", "current-date"),
  value: "Taprom"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tauri", "current-date"),
  value: "Tauri"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Taviraj", "current-date"),
  value: "Taviraj"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Teko", "current-date"),
  value: "Teko"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Telex", "current-date"),
  value: "Telex"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tenali Ramakrishna", "current-date"),
  value: "Tenali Ramakrishna"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tenor Sans", "current-date"),
  value: "Tenor Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Terminal Dosis", "current-date"),
  value: "Terminal Dosis"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Terminal Dosis Light", "current-date"),
  value: "Terminal Dosis Light"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Text Me One", "current-date"),
  value: "Text Me One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Thabit", "current-date"),
  value: "Thabit"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("tharlon", "current-date"),
  value: "tharlon"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Thasadith", "current-date"),
  value: "Thasadith"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("The Girl Next Door", "current-date"),
  value: "The Girl Next Door"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tienne", "current-date"),
  value: "Tienne"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tillana", "current-date"),
  value: "Tillana"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Timmana", "current-date"),
  value: "Timmana"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tinos", "current-date"),
  value: "Tinos"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Titan One", "current-date"),
  value: "Titan One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Titillium Web", "current-date"),
  value: "Titillium Web"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Trade Winds", "current-date"),
  value: "Trade Winds"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Trirong", "current-date"),
  value: "Trirong"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Trocchi", "current-date"),
  value: "Trocchi"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Trochut", "current-date"),
  value: "Trochut"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Trykker", "current-date"),
  value: "Trykker"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tuffy", "current-date"),
  value: "Tuffy"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Tulpen One", "current-date"),
  value: "Tulpen One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ubuntu", "current-date"),
  value: "Ubuntu"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ubuntu Condensed", "current-date"),
  value: "Ubuntu Condensed"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ubuntu Mono", "current-date"),
  value: "Ubuntu Mono"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Ultra", "current-date"),
  value: "Ultra"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Uncial Antiqua", "current-date"),
  value: "Uncial Antiqua"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Underdog", "current-date"),
  value: "Underdog"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Unica One", "current-date"),
  value: "Unica One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("UnifrakturCook", "current-date"),
  value: "UnifrakturCook"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("UnifrakturMaguntia", "current-date"),
  value: "UnifrakturMaguntia"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Unkempt", "current-date"),
  value: "Unkempt"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Unlock", "current-date"),
  value: "Unlock"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Unna", "current-date"),
  value: "Unna"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vampiro One", "current-date"),
  value: "Vampiro One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Varela", "current-date"),
  value: "Varela"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Varela Round", "current-date"),
  value: "Varela Round"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Varta", "current-date"),
  value: "Varta"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vast Shadow", "current-date"),
  value: "Vast Shadow"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vesper Libre", "current-date"),
  value: "Vesper Libre"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vibur", "current-date"),
  value: "Vibur"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vidaloka", "current-date"),
  value: "Vidaloka"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Viga", "current-date"),
  value: "Viga"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Voces", "current-date"),
  value: "Voces"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Volkhov", "current-date"),
  value: "Volkhov"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vollkorn", "current-date"),
  value: "Vollkorn"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Vollkorn SC", "current-date"),
  value: "Vollkorn SC"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Voltaire", "current-date"),
  value: "Voltaire"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("VT323", "current-date"),
  value: "VT323"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Waiting for the Sunrise", "current-date"),
  value: "Waiting for the Sunrise"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Wallpoet", "current-date"),
  value: "Wallpoet"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Walter Turncoat", "current-date"),
  value: "Walter Turncoat"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Warnes", "current-date"),
  value: "Warnes"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Wellfleet", "current-date"),
  value: "Wellfleet"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Wendy One", "current-date"),
  value: "Wendy One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Wire One", "current-date"),
  value: "Wire One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Work Sans", "current-date"),
  value: "Work Sans"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yaldevi Colombo", "current-date"),
  value: "Yaldevi Colombo"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yanone Kaffeesatz", "current-date"),
  value: "Yanone Kaffeesatz"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yantramanav", "current-date"),
  value: "Yantramanav"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yatra One", "current-date"),
  value: "Yatra One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yellowtail", "current-date"),
  value: "Yellowtail"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yeon Sung", "current-date"),
  value: "Yeon Sung"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yeseva One", "current-date"),
  value: "Yeseva One"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yesteryear", "current-date"),
  value: "Yesteryear"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yinmar", "current-date"),
  value: "Yinmar"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Yrsa", "current-date"),
  value: "Yrsa"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("ZCOOL KuaiLe", "current-date"),
  value: "ZCOOL KuaiLe"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("ZCOOL QingKe HuangYou", "current-date"),
  value: "ZCOOL QingKe HuangYou"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("ZCOOL XiaoWei", "current-date"),
  value: "ZCOOL XiaoWei"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Zeyada", "current-date"),
  value: "Zeyada"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Zhi Mang Xing", "current-date"),
  value: "Zhi Mang Xing"
}, {
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)("Zilla Slab Highlight", "current-date"),
  value: "Zilla Slab Highlight"
}];

/***/ }),

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _constants_constants__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./constants/constants */ "./src/constants/constants.js");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./editor.scss */ "./src/editor.scss");








function Edit({
  attributes,
  setAttributes
}) {
  const {
    blockID,
    dateFormat,
    display,
    textColor,
    fontSize,
    letterSpacing,
    textTransform,
    fontFamily,
    fontWeight,
    lineHeight,
    desktop_padding,
    tab_padding,
    mobile_padding,
    desktop_margin,
    tab_margin,
    mobile_margin,
    activePaddingDevice,
    activeMarginDevice,
    paddingLink,
    marginLink
  } = attributes;
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.useBlockProps)();
  const [previousPadding, setPreviousPadding] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useState)(desktop_padding);
  const [previousMargin, setPreviousMargin] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useState)(desktop_margin);

  /** Function to update all padding values */
  const updateAllPadding = (value, device) => {
    switch (device) {
      case 'desktop':
        setAttributes({
          desktop_padding: {
            top: value,
            right: value,
            bottom: value,
            left: value
          }
        });
        break;
      case 'tab':
        setAttributes({
          tab_padding: {
            top: value,
            right: value,
            bottom: value,
            left: value
          }
        });
        break;
      case 'mobile':
        setAttributes({
          mobile_padding: {
            top: value,
            right: value,
            bottom: value,
            left: value
          }
        });
        break;
      default:
        break;
    }
  };

  /** Function to update all margin values */
  const updateAllMargin = (value, device) => {
    switch (device) {
      case 'desktop':
        setAttributes({
          desktop_margin: {
            top: value,
            right: value,
            bottom: value,
            left: value
          }
        });
        break;
      case 'tab':
        setAttributes({
          tab_margin: {
            top: value,
            right: value,
            bottom: value,
            left: value
          }
        });
        break;
      case 'mobile':
        setAttributes({
          mobile_margin: {
            top: value,
            right: value,
            bottom: value,
            left: value
          }
        });
        break;
      default:
        break;
    }
  };

  /** Function to handle input change */
  const handlePaddingInputChange = (e, direction) => {
    const value = e.target.value;
    switch (activePaddingDevice) {
      case 'desktop':
        setAttributes({
          desktop_padding: {
            ...desktop_padding,
            [direction]: value
          }
        });
        break;
      case 'tab':
        setAttributes({
          tab_padding: {
            ...tab_padding,
            [direction]: value
          }
        });
        break;
      case 'mobile':
        setAttributes({
          mobile_padding: {
            ...mobile_padding,
            [direction]: value
          }
        });
        break;
      default:
        break;
    }
    /** Update all padding values if paddingLink is true */
    if (paddingLink) {
      updateAllPadding(value, activePaddingDevice);
    }
  };

  /** Function to handle input change */
  const handleMarginInputChange = (e, direction) => {
    const value = e.target.value;
    switch (activeMarginDevice) {
      case 'desktop':
        setAttributes({
          desktop_margin: {
            ...desktop_margin,
            [direction]: value
          }
        });
        break;
      case 'tab':
        setAttributes({
          tab_margin: {
            ...tab_margin,
            [direction]: value
          }
        });
        break;
      case 'mobile':
        setAttributes({
          mobile_margin: {
            ...mobile_margin,
            [direction]: value
          }
        });
        break;
      default:
        break;
    }
    /** Update all margin values if marginLink is true */
    if (marginLink) {
      updateAllMargin(value, activeMarginDevice);
    }
  };

  /** Function to handle paddingLink toggle */
  const handlePaddingLinkToggle = () => {
    if (!paddingLink) {
      setAttributes({
        desktop_padding: previousPadding
      });
    }
    /** setPaddingLink(!paddingLink) */
    setAttributes({
      paddingLink: !paddingLink
    });
  };

  /** Function to handle marginLink toggle */
  const handleMarginLinkToggle = () => {
    if (!marginLink) {
      /** If marginLink is being turned off, restore previous margin values */
      setAttributes({
        desktop_margin: previousMargin
      });
    }
    /** setMarginLink(!marginLink); */
    setAttributes({
      marginLink: !marginLink
    });
  };

  /** Update previousPadding state when padding changes */
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    setPreviousPadding(desktop_padding);
  }, [desktop_padding]);

  /** Update previousMargin state when Margin changes */
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    setPreviousMargin(desktop_margin);
  }, [desktop_margin]);

  /* set default values for the style attributes */
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.useEffect)(() => {
    if (fontFamily) {
      const fontUrl = `https://fonts.googleapis.com/css?family=${fontFamily.replace(' ', '+')}`;
      const linkElement = document.createElement('link');
      linkElement.rel = 'stylesheet';
      linkElement.href = fontUrl;
      document.head.appendChild(linkElement);
    }
  }, [fontFamily]);

  /** Get current date based on selected format */
  const currentDate = (0,_wordpress_date__WEBPACK_IMPORTED_MODULE_3__.dateI18n)(dateFormat);

  /** Function to handle device click for padding */
  const handlePaddingDeviceClick = device => {
    setAttributes({
      activePaddingDevice: device
    });
  };

  /** Function to handle device click for margin */
  const handleMarginDeviceClick = device => {
    setAttributes({
      activeMarginDevice: device
    });
  };

  /** Default padding for desktop (using desktop_padding) */
  const padding = `${desktop_padding.top}px ${desktop_padding.right}px ${desktop_padding.bottom}px ${desktop_padding.left}px`;
  const margin = `${desktop_margin.top}px ${desktop_margin.right}px ${desktop_margin.bottom}px ${desktop_margin.left}px`;
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.InspectorControls, {
    key: "controls"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Date Format', 'current-date')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Select Date Format', 'current-date'),
    value: dateFormat,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Default', 'current-date'),
      value: 'jS F Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('F j, Y', 'current-date'),
      value: 'F j, Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('l, F jS, Y', 'current-date'),
      value: 'l, F jS, Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('D, M j, Y', 'current-date'),
      value: 'D, M j, Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('j F Y', 'current-date'),
      value: 'j F Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('M j, Y', 'current-date'),
      value: 'M j, Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('j M Y', 'current-date'),
      value: 'j M Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Y-M-d', 'current-date'),
      value: 'Y-M-d'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('d F Y', 'current-date'),
      value: 'd F Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('M j', 'current-date'),
      value: 'M j'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('F jS', 'current-date'),
      value: 'F jS'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('jS M Y', 'current-date'),
      value: 'jS M Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('l, M jS, Y', 'current-date'),
      value: 'l, M jS, Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('D, j M Y', 'current-date'),
      value: 'D, j M Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('l, j F Y', 'current-date'),
      value: 'l, j F Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('D, M j Y', 'current-date'),
      value: 'D, M j Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('d/m/Y', 'current-date'),
      value: 'd/m/Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('j.n.Y', 'current-date'),
      value: 'j.n.Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Y.m.d', 'current-date'),
      value: 'Y.m.d'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('d-m-Y', 'current-date'),
      value: 'd-m-Y'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Y-m-d', 'current-date'),
      value: 'Y-m-d'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Y/m/d', 'current-date'),
      value: 'Y/m/d'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('m/d/Y', 'current-date'),
      value: 'm/d/Y'
    }],
    onChange: value => setAttributes({
      dateFormat: value
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Display', 'current-date'),
    value: display,
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Inline Block', 'current-date'),
      value: 'inline-block'
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Block', 'current-date'),
      value: 'block'
    }],
    onChange: value => setAttributes({
      display: value
    })
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Typography", "current-date"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.PanelColorSettings, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Color', 'current-date'),
    enableAlpha: true,
    className: "Panel_Color_Settings",
    colorSettings: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Text Color', 'current-date'),
      value: textColor,
      onChange: value => setAttributes({
        textColor: value
      })
    }],
    colors: [{
      name: 'White',
      color: '#ffffff'
    }, {
      name: 'Red',
      color: '#ff0000'
    }, {
      name: 'Green',
      color: '#00ff00'
    }, {
      name: 'Blue',
      color: '#0000ff'
    }, {
      name: 'Yellow',
      color: '#ffff00'
    }, {
      name: 'Black',
      color: '#000000'
    }]
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Font Size", "current-date"),
    value: fontSize,
    onChange: fontSize => setAttributes({
      fontSize
    }),
    min: 1,
    max: 200
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Font Family", "current-date"),
    options: _constants_constants__WEBPACK_IMPORTED_MODULE_6__.FONT_FAMILYS,
    value: fontFamily,
    onChange: value => setAttributes({
      fontFamily: value
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Text Transform", "current-date"),
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("None", "current-date"),
      value: "none"
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Uppercase", "current-date"),
      value: "uppercase"
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Lowercase", "current-date"),
      value: "lowercase"
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Capitalize", "current-date"),
      value: "capitalize"
    }],
    value: textTransform,
    onChange: textTransform => setAttributes({
      textTransform
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Font Weight", "current-date"),
    options: [{
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Normal", "current-date"),
      value: "normal"
    }, {
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Bold", "current-date"),
      value: "bold"
    }, {
      label: "100",
      value: "100"
    }, {
      label: "200",
      value: "200"
    }, {
      label: "300",
      value: "300"
    }, {
      label: "400",
      value: "400"
    }, {
      label: "500",
      value: "500"
    }, {
      label: "600",
      value: "600"
    }, {
      label: "700",
      value: "700"
    }, {
      label: "800",
      value: "800"
    }, {
      label: "900",
      value: "900"
    }],
    value: fontWeight,
    onChange: fontWeight => setAttributes({
      fontWeight
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Letter Spacing", "current-date"),
    value: letterSpacing,
    onChange: letterSpacing => setAttributes({
      letterSpacing
    }),
    min: -2,
    max: 10
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Line Height", "current-date"),
    value: lineHeight,
    onChange: lineHeight => setAttributes({
      lineHeight
    }),
    min: 10,
    max: 120
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
    title: "Spacing",
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_spacing_container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_spacing_inner_container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_label_container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "cdsfw_label_text"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Padding", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdfw_responsive_devices"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: `cdfw_desktop_device ${activePaddingDevice === 'desktop' ? 'active' : ''}`,
    onClick: () => handlePaddingDeviceClick('desktop')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "8",
    height: "7",
    viewBox: "0 0 8 7"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M7.33333 0H0.666667C0.298611 0 0 0.293945 0 0.65625V5.03125C0 5.39355 0.298611 5.6875 0.666667 5.6875H3.33333L3.11111 6.34375H2.11111C1.92639 6.34375 1.77778 6.49004 1.77778 6.67188C1.77778 6.85371 1.92639 7 2.11111 7H5.88889C6.07361 7 6.22222 6.85371 6.22222 6.67188C6.22222 6.49004 6.07361 6.34375 5.88889 6.34375H4.88889L4.66667 5.6875H7.33333C7.70139 5.6875 8 5.39355 8 5.03125V0.65625C8 0.293945 7.70139 0 7.33333 0ZM7.11111 4.8125H0.888889V0.875H7.11111V4.8125Z"
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: `cdfw_tab_device ${activePaddingDevice === 'tab' ? 'active' : ''}`,
    onClick: () => handlePaddingDeviceClick('tab')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "6",
    height: "7",
    viewBox: "0 0 6 7"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M5 0H1C0.446667 0 0 0.390833 0 0.875V6.125C0 6.60917 0.446667 7 1 7H5C5.55333 7 6 6.60917 6 6.125V0.875C6 0.390833 5.55333 0 5 0ZM3.66667 6.41667H2.33333V6.125H3.66667V6.41667ZM5.41667 5.54167H0.583333V0.875H5.41667V5.54167Z"
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: `cdfw_mobile_device ${activePaddingDevice === 'mobile' ? 'active' : ''}`,
    onClick: () => handlePaddingDeviceClick('mobile')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "4",
    height: "7",
    viewBox: "0 0 4 7"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M3.33333 0H0.666667C0.297778 0 0 0.390833 0 0.875V6.125C0 6.60917 0.297778 7 0.666667 7H3.33333C3.70222 7 4 6.60917 4 6.125V0.875C4 0.390833 3.70222 0 3.33333 0ZM2.44444 6.41667H1.55556V6.125H2.44444V6.41667ZM3.61111 5.54167H0.388889V0.875H3.61111V5.54167Z"
  }))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Top", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    name: "top",
    value: activePaddingDevice === 'desktop' ? desktop_padding.top : activePaddingDevice === 'tab' ? tab_padding.top : mobile_padding.top,
    onChange: e => handlePaddingInputChange(e, 'top')
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Right", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    name: "right",
    value: activePaddingDevice === 'desktop' ? desktop_padding.right : activePaddingDevice === 'tab' ? tab_padding.right : mobile_padding.right,
    onChange: e => handlePaddingInputChange(e, 'right')
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Bottom", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    name: "bottom",
    value: activePaddingDevice === 'desktop' ? desktop_padding.bottom : activePaddingDevice === 'tab' ? tab_padding.bottom : mobile_padding.bottom,
    onChange: e => handlePaddingInputChange(e, 'bottom')
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Left", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    name: "left",
    value: activePaddingDevice === 'desktop' ? desktop_padding.left : activePaddingDevice === 'tab' ? tab_padding.left : mobile_padding.left,
    onChange: e => handlePaddingInputChange(e, 'left')
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: `dashicons ${paddingLink ? 'dashicons-admin-links' : 'dashicons-editor-unlink'} ${paddingLink ? 'is-checked' : ''}`,
    onClick: handlePaddingLinkToggle
  })))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_spacing_inner_container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_label_container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    className: "cdsfw_label_text"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Margin", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdfw_responsive_devices"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: `cdfw_desktop_device ${activeMarginDevice === 'desktop' ? 'active' : ''}`,
    onClick: () => handleMarginDeviceClick('desktop')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "8",
    height: "7",
    viewBox: "0 0 8 7"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M7.33333 0H0.666667C0.298611 0 0 0.293945 0 0.65625V5.03125C0 5.39355 0.298611 5.6875 0.666667 5.6875H3.33333L3.11111 6.34375H2.11111C1.92639 6.34375 1.77778 6.49004 1.77778 6.67188C1.77778 6.85371 1.92639 7 2.11111 7H5.88889C6.07361 7 6.22222 6.85371 6.22222 6.67188C6.22222 6.49004 6.07361 6.34375 5.88889 6.34375H4.88889L4.66667 5.6875H7.33333C7.70139 5.6875 8 5.39355 8 5.03125V0.65625C8 0.293945 7.70139 0 7.33333 0ZM7.11111 4.8125H0.888889V0.875H7.11111V4.8125Z"
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: `cdfw_tab_device ${activeMarginDevice === 'tab' ? 'active' : ''}`,
    onClick: () => handleMarginDeviceClick('tab')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "6",
    height: "7",
    viewBox: "0 0 6 7"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M5 0H1C0.446667 0 0 0.390833 0 0.875V6.125C0 6.60917 0.446667 7 1 7H5C5.55333 7 6 6.60917 6 6.125V0.875C6 0.390833 5.55333 0 5 0ZM3.66667 6.41667H2.33333V6.125H3.66667V6.41667ZM5.41667 5.54167H0.583333V0.875H5.41667V5.54167Z"
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: `cdfw_mobile_device ${activeMarginDevice === 'mobile' ? 'active' : ''}`,
    onClick: () => handleMarginDeviceClick('mobile')
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "4",
    height: "7",
    viewBox: "0 0 4 7"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M3.33333 0H0.666667C0.297778 0 0 0.390833 0 0.875V6.125C0 6.60917 0.297778 7 0.666667 7H3.33333C3.70222 7 4 6.60917 4 6.125V0.875C4 0.390833 3.70222 0 3.33333 0ZM2.44444 6.41667H1.55556V6.125H2.44444V6.41667ZM3.61111 5.54167H0.388889V0.875H3.61111V5.54167Z"
  }))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Top", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    name: "top",
    value: activeMarginDevice === 'desktop' ? desktop_margin.top : activeMarginDevice === 'tab' ? tab_margin.top : mobile_margin.top,
    onChange: e => handleMarginInputChange(e, 'top')
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Right", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    name: "right",
    value: activeMarginDevice === 'desktop' ? desktop_margin.right : activeMarginDevice === 'tab' ? tab_margin.right : mobile_margin.right,
    onChange: e => handleMarginInputChange(e, 'right')
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Bottom", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    name: "bottom",
    value: activeMarginDevice === 'desktop' ? desktop_margin.bottom : activeMarginDevice === 'tab' ? tab_margin.bottom : mobile_margin.bottom,
    onChange: e => handleMarginInputChange(e, 'bottom')
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)("Left", "current-date")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "number",
    name: "left",
    value: activeMarginDevice === 'desktop' ? desktop_margin.left : activeMarginDevice === 'tab' ? tab_margin.left : mobile_margin.left,
    onChange: e => handleMarginInputChange(e, 'left')
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "cdsfw_input_wrapper"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "cdsfw_spacing_input_label"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: `dashicons ${marginLink ? 'dashicons-admin-links' : 'dashicons-editor-unlink'} ${marginLink ? 'is-checked' : ''}`,
    onClick: handleMarginLinkToggle
  }))))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", null, `
                    @media only screen and (max-width: 1024px) {
                        .cdsfw_responsive {
                            padding: ${tab_padding.top}px ${tab_padding.right}px ${tab_padding.bottom}px ${tab_padding.left}px !important;
                            margin: ${tab_margin.top}px ${tab_margin.right}px ${tab_margin.bottom}px ${tab_margin.left}px !important;
                        }
                    }

                    @media only screen and (max-width: 767px) {
                        .cdsfw_responsive {
                            padding: ${mobile_padding.top}px ${mobile_padding.right}px ${mobile_padding.bottom}px ${mobile_padding.left}px !important;
                            margin: ${mobile_margin.top}px ${mobile_margin.right}px ${mobile_margin.bottom}px ${mobile_margin.left}px !important;
                        }
                    }
                `), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...blockProps
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "cdsfw_responsive",
    style: {
      display: display,
      color: textColor,
      fontFamily: fontFamily,
      fontSize: fontSize,
      letterSpacing: letterSpacing + "px",
      textTransform: textTransform,
      fontWeight: fontWeight,
      lineHeight: lineHeight + "px",
      padding,
      margin
    }
  }, currentDate)));
}

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./save */ "./src/save.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./src/block.json");
/* harmony import */ var _attributes_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./attributes.js */ "./src/attributes.js");



/**
 * Internal dependencies
 */




(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  attributes: _attributes_js__WEBPACK_IMPORTED_MODULE_5__["default"],
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"],
  save: _save__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "./src/save.js":
/*!*********************!*\
  !*** ./src/save.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ save)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/date */ "@wordpress/date");
/* harmony import */ var _wordpress_date__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_date__WEBPACK_IMPORTED_MODULE_2__);



function save({
  attributes
}) {
  const {
    blockID,
    dateFormat,
    display,
    textColor,
    fontSize,
    letterSpacing,
    textTransform,
    fontFamily,
    fontWeight,
    lineHeight,
    desktop_padding,
    tab_padding,
    mobile_padding,
    desktop_margin,
    tab_margin,
    mobile_margin
  } = attributes;
  const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps.save({
    id: blockID
  });

  /** Get current date based on selected format */
  const currentDate = (0,_wordpress_date__WEBPACK_IMPORTED_MODULE_2__.dateI18n)(dateFormat);

  // Default padding for desktop (using desktop_padding)
  const padding = `${desktop_padding.top}px ${desktop_padding.right}px ${desktop_padding.bottom}px ${desktop_padding.left}px`;
  const margin = `${desktop_margin.top}px ${desktop_margin.right}px ${desktop_margin.bottom}px ${desktop_margin.left}px`;
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", null, `
                    @media only screen and (max-width: 1024px) {
                        .cdsfw_responsive {
                            padding: ${tab_padding.top}px ${tab_padding.right}px ${tab_padding.bottom}px ${tab_padding.left}px !important;
                            margin: ${tab_margin.top}px ${tab_margin.right}px ${tab_margin.bottom}px ${tab_margin.left}px !important;
                        }
                    }

                    @media only screen and (max-width: 767px) {
                        .cdsfw_responsive {
                            padding: ${mobile_padding.top}px ${mobile_padding.right}px ${mobile_padding.bottom}px ${mobile_padding.left}px !important;
                            margin: ${mobile_margin.top}px ${mobile_margin.right}px ${mobile_margin.bottom}px ${mobile_margin.left}px !important;
                        }
                    }
                `), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    ...blockProps,
    className: "cdsfw_responsive",
    style: {
      display: display,
      color: textColor,
      fontSize: fontSize,
      fontFamily: fontFamily,
      letterSpacing: letterSpacing + "px",
      textTransform: textTransform,
      fontWeight: fontWeight,
      lineHeight: lineHeight + "px",
      padding,
      margin
    }
  }, currentDate));
}

/***/ }),

/***/ "./src/editor.scss":
/*!*************************!*\
  !*** ./src/editor.scss ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/date":
/*!******************************!*\
  !*** external ["wp","date"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["date"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/block.json":
/*!************************!*\
  !*** ./src/block.json ***!
  \************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"create-block/cdsfw-current-date","version":"1.0.0","title":"Current Date","category":"text","icon":"calendar-alt","description":"Dynamic and customizable Current Date block for displaying up-to-date information on your WordPress site.","supports":{},"textdomain":"current-date","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css"}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkcdsfw_current_date"] = globalThis["webpackChunkcdsfw_current_date"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./src/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map