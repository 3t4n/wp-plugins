/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/file-loader/dist/cjs.js?name=Readme.md!./Readme.md":
/*!*************************************************************************!*\
  !*** ./node_modules/file-loader/dist/cjs.js?name=Readme.md!./Readme.md ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "Readme.md";

/***/ }),

/***/ "./node_modules/file-loader/dist/cjs.js?name=enviropacks.gif!./enviropacks.gif":
/*!*************************************************************************************!*\
  !*** ./node_modules/file-loader/dist/cjs.js?name=enviropacks.gif!./enviropacks.gif ***!
  \*************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "enviropacks.gif";

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/matcap/fragmentShader.glsl":
/*!******************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/matcap/fragmentShader.glsl ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("#define MATCAP\r\nuniform vec3 color;\r\nuniform float opacity;\r\nuniform sampler2D roughDialectric;\r\nuniform sampler2D smoothDialectric;\r\nuniform sampler2D roughMetallic;\r\nuniform sampler2D smoothMetallic;\r\nuniform float roughness;\r\nuniform float metalness;\r\n\r\nvarying vec3 vViewPosition;\r\n#ifndef FLAT_SHADED\r\n\tvarying vec3 vNormal;\r\n#endif\r\n#include <common>\r\n#include <dithering_pars_fragment>\r\n#include <color_pars_fragment>\r\n#include <uv_pars_fragment>\r\n#include <map_pars_fragment>\r\n#include <alphamap_pars_fragment>\r\n#include <fog_pars_fragment>\r\n#include <bumpmap_pars_fragment>\r\n#include <normalmap_pars_fragment>\r\n#include <logdepthbuf_pars_fragment>\r\n#include <clipping_planes_pars_fragment>\r\n#include <roughnessmap_pars_fragment>\r\n#include <metalnessmap_pars_fragment>\r\nvoid main() {\r\n\t#include <clipping_planes_fragment>\r\n\tvec4 diffuseColor = vec4( color, opacity );\r\n\t#include <logdepthbuf_fragment>\r\n\t#include <map_fragment>\r\n\t#include <color_fragment>\r\n\t#include <alphamap_fragment>\r\n\t#include <alphatest_fragment>\r\n\t#include <normal_fragment_begin>\r\n\t#include <normal_fragment_maps>\r\n  #include <metalnessmap_fragment>\r\n  #include <roughnessmap_fragment>\r\n\tvec3 viewDir = normalize( vViewPosition );\r\n\tvec3 x = normalize( vec3( viewDir.z, 0.0, - viewDir.x ) );\r\n\tvec3 y = cross( viewDir, x );\r\n\tvec2 uv = vec2( dot( x, normal ), dot( y, normal ) ) * 0.495 + 0.5; // 0.495 to remove artifacts caused by undersized matcap disks\r\n\r\n\r\n  vec4 diaelectricColor = mix(texture2D( smoothDialectric, uv ),\r\n                              texture2D( roughDialectric, uv ),\r\n                              roughnessFactor);\r\n  vec4 metalnessColor = mix(texture2D( smoothMetallic, uv ),\r\n                            texture2D( roughMetallic, uv ),\r\n                            roughnessFactor);\r\n\r\n  vec4 matcapColor = mix(diaelectricColor, metalnessColor, metalnessFactor);\r\n\t/* matcapColor = matcapTexelToLinear( matcapColor ); */\r\n\r\n\r\n\tdiffuseColor = pow(diffuseColor, vec4(1.0 / 1.1));\r\n\tvec3 outgoingLight = diffuseColor.rgb * matcapColor.rgb;// + metalnessColor.rgb * metalnessFactor * 0.5;\r\n\tgl_FragColor = vec4( outgoingLight, diffuseColor.a );\r\n\r\n\t/* gl_FragColor = vec4(roughnessFactor, roughnessFactor, roughnessFactor, 1.0); */\r\n\t/* gl_FragColor = vec4(normal, 1.0); */\r\n\t#include <tonemapping_fragment>\r\n\t#include <encodings_fragment>\r\n\t#include <fog_fragment>\r\n\t/* #include <premultiplied_alpha_fragment> */\r\n\t#include <dithering_fragment>\r\n}\r\n");

/***/ }),

/***/ "./node_modules/raw-loader/dist/cjs.js!./src/matcap/vertexShader.glsl":
/*!****************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/matcap/vertexShader.glsl ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ("#define MATCAP\r\nvarying vec3 vViewPosition;\r\n#ifndef FLAT_SHADED\r\n\tvarying vec3 vNormal;\r\n#endif\r\n#include <common>\r\n#include <uv_pars_vertex>\r\n#include <color_pars_vertex>\r\n#include <displacementmap_pars_vertex>\r\n#include <fog_pars_vertex>\r\n#include <morphtarget_pars_vertex>\r\n#include <skinning_pars_vertex>\r\n#include <logdepthbuf_pars_vertex>\r\n#include <clipping_planes_pars_vertex>\r\nvoid main() {\r\n\t#include <uv_vertex>\r\n\t#include <color_vertex>\r\n\t#include <beginnormal_vertex>\r\n\t#include <morphnormal_vertex>\r\n\t#include <skinbase_vertex>\r\n\t#include <skinnormal_vertex>\r\n\t#include <defaultnormal_vertex>\r\n\t#ifndef FLAT_SHADED // Normal computed with derivatives when FLAT_SHADED\r\n\t\tvNormal = normalize( transformedNormal );\r\n\t#endif\r\n\r\n\t#include <begin_vertex>\r\n\t#include <morphtarget_vertex>\r\n\t#include <skinning_vertex>\r\n\t#include <displacementmap_vertex>\r\n\t#include <project_vertex>\r\n\t#include <logdepthbuf_vertex>\r\n\t#include <clipping_planes_vertex>\r\n\t#include <fog_vertex>\r\n\tvViewPosition = - mvPosition.xyz;\r\n}\r\n");

/***/ }),

/***/ "./package.json":
/*!**********************!*\
  !*** ./package.json ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "package.json";

/***/ }),

/***/ "./src/PMREMGenerator.js":
/*!*******************************!*\
  !*** ./src/PMREMGenerator.js ***!
  \*******************************/
/*! exports provided: PMREMGenerator */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PMREMGenerator", function() { return PMREMGenerator; });
/**
 * @author Emmett Lalish / elalish
 *
 * This class generates a Prefiltered, Mipmapped Radiance Environment Map
 * (PMREM) from a cubeMap environment texture. This allows different levels of
 * blur to be quickly accessed based on material roughness. It is packed into a
 * special CubeUV format that allows us to perform custom interpolation so that
 * we can support nonlinear formats such as RGBE. Unlike a traditional mipmap
 * chain, it only goes down to the LOD_MIN level (above), and then creates extra
 * even more filtered 'mips' at the same LOD_MIN resolution, associated with
 * higher roughness levels. In this way we maintain resolution to smoothly
 * interpolate diffuse lighting while limiting sampling computation.
 */

const {
	CubeUVReflectionMapping,
	GammaEncoding,
	LinearEncoding,
	LinearToneMapping,
	NearestFilter,
	NoBlending,
	RGBDEncoding,
	RGBEEncoding,
	RGBEFormat,
	RGBM16Encoding,
	RGBM7Encoding,
	UnsignedByteType,
	sRGBEncoding
} = THREE

const { BufferAttribute } = THREE;
const { BufferGeometry } = THREE;
const { Mesh } = THREE;
const { OrthographicCamera } = THREE;
const { PerspectiveCamera } = THREE;
const { RawShaderMaterial } = THREE;
const { Scene } = THREE;
const { Vector2 } = THREE;
const { Vector3 } = THREE;
const { WebGLRenderTarget } = THREE;

var LOD_MIN = 4;
var LOD_MAX = 8;
var SIZE_MAX = Math.pow( 2, LOD_MAX );

// The standard deviations (radians) associated with the extra mips. These are
// chosen to approximate a Trowbridge-Reitz distribution function times the
// geometric shadowing function. These sigma values squared must match the
// variance #defines in cube_uv_reflection_fragment.glsl.js.
var EXTRA_LOD_SIGMA = [ 0.125, 0.215, 0.35, 0.446, 0.526, 0.582 ];

var TOTAL_LODS = LOD_MAX - LOD_MIN + 1 + EXTRA_LOD_SIGMA.length;

// The maximum length of the blur for loop. Smaller sigmas will use fewer
// samples and exit early, but not recompile the shader.
var MAX_SAMPLES = 20;

var ENCODINGS = {
	[ LinearEncoding ]: 0,
	[ sRGBEncoding ]: 1,
	[ RGBEEncoding ]: 2,
	[ RGBM7Encoding ]: 3,
	[ RGBM16Encoding ]: 4,
	[ RGBDEncoding ]: 5,
	[ GammaEncoding ]: 6
};

var _flatCamera = new OrthographicCamera();
var { _lodPlanes, _sizeLods, _sigmas } = _createPlanes();
var _oldTarget = null;

// Golden Ratio
var PHI = ( 1 + Math.sqrt( 5 ) ) / 2;
var INV_PHI = 1 / PHI;

// Vertices of a dodecahedron (except the opposites, which represent the
// same axis), used as axis directions evenly spread on a sphere.
var _axisDirections = [
	new Vector3( 1, 1, 1 ),
	new Vector3( - 1, 1, 1 ),
	new Vector3( 1, 1, - 1 ),
	new Vector3( - 1, 1, - 1 ),
	new Vector3( 0, PHI, INV_PHI ),
	new Vector3( 0, PHI, - INV_PHI ),
	new Vector3( INV_PHI, 0, PHI ),
	new Vector3( - INV_PHI, 0, PHI ),
	new Vector3( PHI, INV_PHI, 0 ),
	new Vector3( - PHI, INV_PHI, 0 ) ];

function PMREMGenerator( renderer ) {

	this._renderer = renderer;
	this._pingPongRenderTarget = null;

	this._blurMaterial = _getBlurShader( MAX_SAMPLES );
	this._equirectShader = null;
	this._cubemapShader = null;

	this._compileMaterial( this._blurMaterial );

}

PMREMGenerator.prototype = {

	constructor: PMREMGenerator,

	/**
	 * Generates a PMREM from a supplied Scene, which can be faster than using an
	 * image if networking bandwidth is low. Optional sigma specifies a blur radius
	 * in radians to be applied to the scene before PMREM generation. Optional near
	 * and far planes ensure the scene is rendered in its entirety (the cubeCamera
	 * is placed at the origin).
	 */
	fromScene: function ( scene, sigma = 0, near = 0.1, far = 100 ) {

		_oldTarget = this._renderer.getRenderTarget();
		var cubeUVRenderTarget = this._allocateTargets();

		this._sceneToCubeUV( scene, near, far, cubeUVRenderTarget );
		if ( sigma > 0 ) {

			this._blur( cubeUVRenderTarget, 0, 0, sigma );

		}

		this._applyPMREM( cubeUVRenderTarget );
		this._cleanup( cubeUVRenderTarget );

		return cubeUVRenderTarget;

	},

	/**
	 * Generates a PMREM from an equirectangular texture, which can be either LDR
	 * (RGBFormat) or HDR (RGBEFormat). The ideal input image size is 1k (1024 x 512),
	 * as this matches best with the 256 x 256 cubemap output.
	 */
	fromEquirectangular: function ( equirectangular ) {

		equirectangular.magFilter = NearestFilter;
		equirectangular.minFilter = NearestFilter;
		equirectangular.generateMipmaps = false;

		return this.fromCubemap( equirectangular );

	},

	/**
	 * Generates a PMREM from an cubemap texture, which can be either LDR
	 * (RGBFormat) or HDR (RGBEFormat). The ideal input cube size is 256 x 256,
	 * as this matches best with the 256 x 256 cubemap output.
	 */
	fromCubemap: function ( cubemap ) {

		_oldTarget = this._renderer.getRenderTarget();
		var cubeUVRenderTarget = this._allocateTargets( cubemap );
		this._textureToCubeUV( cubemap, cubeUVRenderTarget );
		this._applyPMREM( cubeUVRenderTarget );
		this._cleanup( cubeUVRenderTarget );

		return cubeUVRenderTarget;

	},

	/**
	 * Pre-compiles the cubemap shader. You can get faster start-up by invoking this method during
	 * your texture's network fetch for increased concurrency.
	 */
	compileCubemapShader: function () {

		if ( this._cubemapShader === null ) {

			this._cubemapShader = _getCubemapShader();
			this._compileMaterial( this._cubemapShader );

		}

	},

	/**
	 * Pre-compiles the equirectangular shader. You can get faster start-up by invoking this method during
	 * your texture's network fetch for increased concurrency.
	 */
	compileEquirectangularShader: function () {

		if ( this._equirectShader === null ) {

			this._equirectShader = _getEquirectShader();
			this._compileMaterial( this._equirectShader );

		}

	},

	/**
	 * Disposes of the PMREMGenerator's internal memory. Note that PMREMGenerator is a static class,
	 * so you should not need more than one PMREMGenerator object. If you do, calling dispose() on
	 * one of them will cause any others to also become unusable.
	 */
	dispose: function () {

		this._blurMaterial.dispose();

		if ( this._cubemapShader !== null ) this._cubemapShader.dispose();
		if ( this._equirectShader !== null ) this._equirectShader.dispose();

		for ( var i = 0; i < _lodPlanes.length; i ++ ) {

			_lodPlanes[ i ].dispose();

		}

	},

	// private interface

	_cleanup: function ( outputTarget ) {

		this._pingPongRenderTarget.dispose();
		this._renderer.setRenderTarget( _oldTarget );
		outputTarget.scissorTest = false;
		// reset viewport and scissor
		outputTarget.setSize( outputTarget.width, outputTarget.height );

	},

	_allocateTargets: function ( equirectangular ) {

		var params = {
			magFilter: NearestFilter,
			minFilter: NearestFilter,
			generateMipmaps: false,
			type: UnsignedByteType,
			format: RGBEFormat,
			encoding: _isLDR( equirectangular ) ? equirectangular.encoding : RGBEEncoding,
			depthBuffer: false,
			stencilBuffer: false
		};

		var cubeUVRenderTarget = _createRenderTarget( params );
		cubeUVRenderTarget.depthBuffer = equirectangular ? false : true;
		this._pingPongRenderTarget = _createRenderTarget( params );
		return cubeUVRenderTarget;

	},

	_compileMaterial: function ( material ) {

		var tmpScene = new Scene();
		tmpScene.add( new Mesh( _lodPlanes[ 0 ], material ) );
		this._renderer.compile( tmpScene, _flatCamera );

	},

	_sceneToCubeUV: function ( scene, near, far, cubeUVRenderTarget ) {

		var fov = 90;
		var aspect = 1;
		var cubeCamera = new PerspectiveCamera( fov, aspect, near, far );
		var upSign = [ 1, 1, 1, 1, - 1, 1 ];
		var forwardSign = [ 1, 1, - 1, - 1, - 1, 1 ];
		var renderer = this._renderer;

		var outputEncoding = renderer.outputEncoding;
		var toneMapping = renderer.toneMapping;
		var toneMappingExposure = renderer.toneMappingExposure;
		var clearColor = renderer.getClearColor();
		var clearAlpha = renderer.getClearAlpha();

		renderer.toneMapping = LinearToneMapping;
		renderer.toneMappingExposure = 1.0;
		renderer.outputEncoding = LinearEncoding;
		scene.scale.z *= - 1;

		var background = scene.background;
		if ( background && background.isColor ) {

			background.convertSRGBToLinear();
			// Convert linear to RGBE
			var maxComponent = Math.max( background.r, background.g, background.b );
			var fExp = Math.min( Math.max( Math.ceil( Math.log2( maxComponent ) ), - 128.0 ), 127.0 );
			background = background.multiplyScalar( Math.pow( 2.0, - fExp ) );
			var alpha = ( fExp + 128.0 ) / 255.0;
			renderer.setClearColor( background, alpha );
			scene.background = null;

		}

		for ( var i = 0; i < 6; i ++ ) {

			var col = i % 3;
			if ( col == 0 ) {

				cubeCamera.up.set( 0, upSign[ i ], 0 );
				cubeCamera.lookAt( forwardSign[ i ], 0, 0 );

			} else if ( col == 1 ) {

				cubeCamera.up.set( 0, 0, upSign[ i ] );
				cubeCamera.lookAt( 0, forwardSign[ i ], 0 );

			} else {

				cubeCamera.up.set( 0, upSign[ i ], 0 );
				cubeCamera.lookAt( 0, 0, forwardSign[ i ] );

			}

			_setViewport( cubeUVRenderTarget,
				col * SIZE_MAX, i > 2 ? SIZE_MAX : 0, SIZE_MAX, SIZE_MAX );
			renderer.setRenderTarget( cubeUVRenderTarget );
			renderer.render( scene, cubeCamera );

		}

		renderer.toneMapping = toneMapping;
		renderer.toneMappingExposure = toneMappingExposure;
		renderer.outputEncoding = outputEncoding;
		renderer.setClearColor( clearColor, clearAlpha );
		scene.scale.z *= - 1;

	},

	_textureToCubeUV: function ( texture, cubeUVRenderTarget ) {

		var scene = new Scene();
		var renderer = this._renderer;

		if ( texture.isCubeTexture ) {

			if ( this._cubemapShader == null ) {

				this._cubemapShader = _getCubemapShader();

			}

		} else {

			if ( this._equirectShader == null ) {

				this._equirectShader = _getEquirectShader();

			}

		}

		var material = texture.isCubeTexture ? this._cubemapShader : this._equirectShader;
		scene.add( new Mesh( _lodPlanes[ 0 ], material ) );

		var uniforms = material.uniforms;

		uniforms[ 'envMap' ].value = texture;

		if ( ! texture.isCubeTexture ) {

			uniforms[ 'texelSize' ].value.set( 1.0 / texture.image.width, 1.0 / texture.image.height );

		}

		uniforms[ 'inputEncoding' ].value = ENCODINGS[ texture.encoding ];
		uniforms[ 'outputEncoding' ].value = ENCODINGS[ cubeUVRenderTarget.texture.encoding ];

		_setViewport( cubeUVRenderTarget, 0, 0, 3 * SIZE_MAX, 2 * SIZE_MAX );

		renderer.setRenderTarget( cubeUVRenderTarget );
		renderer.render( scene, _flatCamera );

	},

	_applyPMREM: function ( cubeUVRenderTarget ) {

		var renderer = this._renderer;
		var autoClear = renderer.autoClear;
		renderer.autoClear = false;

		for ( var i = 1; i < TOTAL_LODS; i ++ ) {

			var sigma = Math.sqrt( _sigmas[ i ] * _sigmas[ i ] - _sigmas[ i - 1 ] * _sigmas[ i - 1 ] );

			var poleAxis = _axisDirections[ ( i - 1 ) % _axisDirections.length ];

			this._blur( cubeUVRenderTarget, i - 1, i, sigma, poleAxis );

		}

		renderer.autoClear = autoClear;

	},

	/**
	 * This is a two-pass Gaussian blur for a cubemap. Normally this is done
	 * vertically and horizontally, but this breaks down on a cube. Here we apply
	 * the blur latitudinally (around the poles), and then longitudinally (towards
	 * the poles) to approximate the orthogonally-separable blur. It is least
	 * accurate at the poles, but still does a decent job.
	 */
	_blur: function ( cubeUVRenderTarget, lodIn, lodOut, sigma, poleAxis ) {

		var pingPongRenderTarget = this._pingPongRenderTarget;

		this._halfBlur(
			cubeUVRenderTarget,
			pingPongRenderTarget,
			lodIn,
			lodOut,
			sigma,
			'latitudinal',
			poleAxis );

		this._halfBlur(
			pingPongRenderTarget,
			cubeUVRenderTarget,
			lodOut,
			lodOut,
			sigma,
			'longitudinal',
			poleAxis );

	},

	_halfBlur: function ( targetIn, targetOut, lodIn, lodOut, sigmaRadians, direction, poleAxis ) {

		var renderer = this._renderer;
		var blurMaterial = this._blurMaterial;

		if ( direction !== 'latitudinal' && direction !== 'longitudinal' ) {

			console.error(
				'blur direction must be either latitudinal or longitudinal!' );

		}

		// Number of standard deviations at which to cut off the discrete approximation.
		var STANDARD_DEVIATIONS = 3;

		var blurScene = new Scene();
		blurScene.add( new Mesh( _lodPlanes[ lodOut ], blurMaterial ) );
		var blurUniforms = blurMaterial.uniforms;

		var pixels = _sizeLods[ lodIn ] - 1;
		var radiansPerPixel = isFinite( sigmaRadians ) ? Math.PI / ( 2 * pixels ) : 2 * Math.PI / ( 2 * MAX_SAMPLES - 1 );
		var sigmaPixels = sigmaRadians / radiansPerPixel;
		var samples = isFinite( sigmaRadians ) ? 1 + Math.floor( STANDARD_DEVIATIONS * sigmaPixels ) : MAX_SAMPLES;

		if ( samples > MAX_SAMPLES ) {

			console.warn( `sigmaRadians, ${
				sigmaRadians}, is too large and will clip, as it requested ${
				samples} samples when the maximum is set to ${MAX_SAMPLES}` );

		}

		var weights = [];
		var sum = 0;

		for ( var i = 0; i < MAX_SAMPLES; ++ i ) {

			var x = i / sigmaPixels;
			var weight = Math.exp( - x * x / 2 );
			weights.push( weight );

			if ( i == 0 ) {

				sum += weight;

			} else if ( i < samples ) {

				sum += 2 * weight;

			}

		}

		for ( var i = 0; i < weights.length; i ++ ) {

			weights[ i ] = weights[ i ] / sum;

		}

		blurUniforms[ 'envMap' ].value = targetIn.texture;
		blurUniforms[ 'samples' ].value = samples;
		blurUniforms[ 'weights' ].value = weights;
		blurUniforms[ 'latitudinal' ].value = direction === 'latitudinal';

		if ( poleAxis ) {

			blurUniforms[ 'poleAxis' ].value = poleAxis;

		}

		blurUniforms[ 'dTheta' ].value = radiansPerPixel;
		blurUniforms[ 'mipInt' ].value = LOD_MAX - lodIn;
		blurUniforms[ 'inputEncoding' ].value = ENCODINGS[ targetIn.texture.encoding ];
		blurUniforms[ 'outputEncoding' ].value = ENCODINGS[ targetIn.texture.encoding ];

		var outputSize = _sizeLods[ lodOut ];
		var x = 3 * Math.max( 0, SIZE_MAX - 2 * outputSize );
		var y = ( lodOut === 0 ? 0 : 2 * SIZE_MAX ) + 2 * outputSize * ( lodOut > LOD_MAX - LOD_MIN ? lodOut - LOD_MAX + LOD_MIN : 0 );

		_setViewport( targetOut, x, y, 3 * outputSize, 2 * outputSize );
		renderer.setRenderTarget( targetOut );
		renderer.render( blurScene, _flatCamera );

	}

};

function _isLDR( texture ) {

	if ( texture === undefined || texture.type !== UnsignedByteType ) return false;

	return texture.encoding === LinearEncoding || texture.encoding === sRGBEncoding || texture.encoding === GammaEncoding;

}

function _createPlanes() {

	var _lodPlanes = [];
	var _sizeLods = [];
	var _sigmas = [];

	var lod = LOD_MAX;

	for ( var i = 0; i < TOTAL_LODS; i ++ ) {

		var sizeLod = Math.pow( 2, lod );
		_sizeLods.push( sizeLod );
		var sigma = 1.0 / sizeLod;

		if ( i > LOD_MAX - LOD_MIN ) {

			sigma = EXTRA_LOD_SIGMA[ i - LOD_MAX + LOD_MIN - 1 ];

		} else if ( i == 0 ) {

			sigma = 0;

		}

		_sigmas.push( sigma );

		var texelSize = 1.0 / ( sizeLod - 1 );
		var min = - texelSize / 2;
		var max = 1 + texelSize / 2;
		var uv1 = [ min, min, max, min, max, max, min, min, max, max, min, max ];

		var cubeFaces = 6;
		var vertices = 6;
		var positionSize = 3;
		var uvSize = 2;
		var faceIndexSize = 1;

		var position = new Float32Array( positionSize * vertices * cubeFaces );
		var uv = new Float32Array( uvSize * vertices * cubeFaces );
		var faceIndex = new Float32Array( faceIndexSize * vertices * cubeFaces );

		for ( var face = 0; face < cubeFaces; face ++ ) {

			var x = ( face % 3 ) * 2 / 3 - 1;
			var y = face > 2 ? 0 : - 1;
			var coordinates = [
				x, y, 0,
				x + 2 / 3, y, 0,
				x + 2 / 3, y + 1, 0,
				x, y, 0,
				x + 2 / 3, y + 1, 0,
				x, y + 1, 0
			];
			position.set( coordinates, positionSize * vertices * face );
			uv.set( uv1, uvSize * vertices * face );
			var fill = [ face, face, face, face, face, face ];
			faceIndex.set( fill, faceIndexSize * vertices * face );

		}

		var planes = new BufferGeometry();
		planes.setAttribute( 'position', new BufferAttribute( position, positionSize ) );
		planes.setAttribute( 'uv', new BufferAttribute( uv, uvSize ) );
		planes.setAttribute( 'faceIndex', new BufferAttribute( faceIndex, faceIndexSize ) );
		_lodPlanes.push( planes );

		if ( lod > LOD_MIN ) {

			lod --;

		}

	}

	return { _lodPlanes, _sizeLods, _sigmas };

}

function _createRenderTarget( params ) {

	var cubeUVRenderTarget = new WebGLRenderTarget( 3 * SIZE_MAX, 3 * SIZE_MAX, params );
	cubeUVRenderTarget.texture.mapping = CubeUVReflectionMapping;
	cubeUVRenderTarget.texture.name = 'PMREM.cubeUv';
	cubeUVRenderTarget.scissorTest = true;
	return cubeUVRenderTarget;

}

function _setViewport( target, x, y, width, height ) {

	target.viewport.set( x, y, width, height );
	target.scissor.set( x, y, width, height );

}

function _getBlurShader( maxSamples ) {

	var weights = new Float32Array( maxSamples );
	var poleAxis = new Vector3( 0, 1, 0 );
	var shaderMaterial = new RawShaderMaterial( {

		defines: { 'n': maxSamples },

		uniforms: {
			'envMap': { value: null },
			'samples': { value: 1 },
			'weights': { value: weights },
			'latitudinal': { value: false },
			'dTheta': { value: 0 },
			'mipInt': { value: 0 },
			'poleAxis': { value: poleAxis },
			'inputEncoding': { value: ENCODINGS[ LinearEncoding ] },
			'outputEncoding': { value: ENCODINGS[ LinearEncoding ] }
		},

		vertexShader: _getCommonVertexShader(),

		fragmentShader: `
precision mediump float;
precision mediump int;
varying vec3 vOutputDirection;
uniform sampler2D envMap;
uniform int samples;
uniform float weights[n];
uniform bool latitudinal;
uniform float dTheta;
uniform float mipInt;
uniform vec3 poleAxis;

${_getEncodings()}

#define ENVMAP_TYPE_CUBE_UV
#include <cube_uv_reflection_fragment>

vec3 getSample(float theta, vec3 axis) {
	float cosTheta = cos(theta);
	// Rodrigues' axis-angle rotation
	vec3 sampleDirection = vOutputDirection * cosTheta
		+ cross(axis, vOutputDirection) * sin(theta)
		+ axis * dot(axis, vOutputDirection) * (1.0 - cosTheta);
	return bilinearCubeUV(envMap, sampleDirection, mipInt);
}

void main() {
	vec3 axis = latitudinal ? poleAxis : cross(poleAxis, vOutputDirection);
	if (all(equal(axis, vec3(0.0))))
		axis = vec3(vOutputDirection.z, 0.0, - vOutputDirection.x);
	axis = normalize(axis);
	gl_FragColor = vec4(0.0);
	gl_FragColor.rgb += weights[0] * getSample(0.0, axis);
	for (int i = 1; i < n; i++) {
		if (i >= samples)
			break;
		float theta = dTheta * float(i);
		gl_FragColor.rgb += weights[i] * getSample(-1.0 * theta, axis);
		gl_FragColor.rgb += weights[i] * getSample(theta, axis);
	}
	gl_FragColor = linearToOutputTexel(gl_FragColor);
}
		`,

		blending: NoBlending,
		depthTest: false,
		depthWrite: false

	} );

	shaderMaterial.type = 'SphericalGaussianBlur';

	return shaderMaterial;

}

function _getEquirectShader() {

	var texelSize = new Vector2( 1, 1 );
	var shaderMaterial = new RawShaderMaterial( {

		uniforms: {
			'envMap': { value: null },
			'texelSize': { value: texelSize },
			'inputEncoding': { value: ENCODINGS[ LinearEncoding ] },
			'outputEncoding': { value: ENCODINGS[ LinearEncoding ] }
		},

		vertexShader: _getCommonVertexShader(),

		fragmentShader: `
precision mediump float;
precision mediump int;
varying vec3 vOutputDirection;
uniform sampler2D envMap;
uniform vec2 texelSize;

${_getEncodings()}

#define RECIPROCAL_PI 0.31830988618
#define RECIPROCAL_PI2 0.15915494

void main() {
	gl_FragColor = vec4(0.0);
	vec3 outputDirection = normalize(vOutputDirection);
	vec2 uv;
	uv.y = asin(clamp(outputDirection.y, -1.0, 1.0)) * RECIPROCAL_PI + 0.5;
	uv.x = atan(outputDirection.z, outputDirection.x) * RECIPROCAL_PI2 + 0.5;
	vec2 f = fract(uv / texelSize - 0.5);
	uv -= f * texelSize;
	vec3 tl = envMapTexelToLinear(texture2D(envMap, uv)).rgb;
	uv.x += texelSize.x;
	vec3 tr = envMapTexelToLinear(texture2D(envMap, uv)).rgb;
	uv.y += texelSize.y;
	vec3 br = envMapTexelToLinear(texture2D(envMap, uv)).rgb;
	uv.x -= texelSize.x;
	vec3 bl = envMapTexelToLinear(texture2D(envMap, uv)).rgb;
	vec3 tm = mix(tl, tr, f.x);
	vec3 bm = mix(bl, br, f.x);
	gl_FragColor.rgb = mix(tm, bm, f.y);
	gl_FragColor = linearToOutputTexel(gl_FragColor);
}
		`,

		blending: NoBlending,
		depthTest: false,
		depthWrite: false

	} );

	shaderMaterial.type = 'EquirectangularToCubeUV';

	return shaderMaterial;

}

function _getCubemapShader() {

	var shaderMaterial = new RawShaderMaterial( {

		uniforms: {
			'envMap': { value: null },
			'inputEncoding': { value: ENCODINGS[ LinearEncoding ] },
			'outputEncoding': { value: ENCODINGS[ LinearEncoding ] }
		},

		vertexShader: _getCommonVertexShader(),

		fragmentShader: `
precision mediump float;
precision mediump int;
varying vec3 vOutputDirection;
uniform samplerCube envMap;

${_getEncodings()}

void main() {
	gl_FragColor = vec4(0.0);
	gl_FragColor.rgb = envMapTexelToLinear(textureCube(envMap, vec3( - vOutputDirection.x, vOutputDirection.yz ))).rgb;
	gl_FragColor = linearToOutputTexel(gl_FragColor);
}
		`,

		blending: NoBlending,
		depthTest: false,
		depthWrite: false

	} );

	shaderMaterial.type = 'CubemapToCubeUV';

	return shaderMaterial;

}

function _getCommonVertexShader() {

	return `
precision mediump float;
precision mediump int;
attribute vec3 position;
attribute vec2 uv;
attribute float faceIndex;
varying vec3 vOutputDirection;
vec3 getDirection(vec2 uv, float face) {
	uv = 2.0 * uv - 1.0;
	vec3 direction = vec3(uv, 1.0);
	if (face == 0.0) {
		direction = direction.zyx;
		direction.z *= -1.0;
	} else if (face == 1.0) {
		direction = direction.xzy;
		direction.z *= -1.0;
	} else if (face == 3.0) {
		direction = direction.zyx;
		direction.x *= -1.0;
	} else if (face == 4.0) {
		direction = direction.xzy;
		direction.y *= -1.0;
	} else if (face == 5.0) {
		direction.xz *= -1.0;
	}
	return direction;
}
void main() {
	vOutputDirection = getDirection(uv, faceIndex);
	gl_Position = vec4( position, 1.0 );
}
	`;

}

function _getEncodings() {

	return `
uniform int inputEncoding;
uniform int outputEncoding;

#include <encodings_pars_fragment>

vec4 inputTexelToLinear(vec4 value){
	if(inputEncoding == 0){
		return value;
	}else if(inputEncoding == 1){
		return sRGBToLinear(value);
	}else if(inputEncoding == 2){
		return RGBEToLinear(value);
	}else if(inputEncoding == 3){
		return RGBMToLinear(value, 7.0);
	}else if(inputEncoding == 4){
		return RGBMToLinear(value, 16.0);
	}else if(inputEncoding == 5){
		return RGBDToLinear(value, 256.0);
	}else{
		return GammaToLinear(value, 2.2);
	}
}

vec4 linearToOutputTexel(vec4 value){
	if(outputEncoding == 0){
		return value;
	}else if(outputEncoding == 1){
		return LinearTosRGB(value);
	}else if(outputEncoding == 2){
		return LinearToRGBE(value);
	}else if(outputEncoding == 3){
		return LinearToRGBM(value, 7.0);
	}else if(outputEncoding == 4){
		return LinearToRGBM(value, 16.0);
	}else if(outputEncoding == 5){
		return LinearToRGBD(value, 256.0);
	}else{
		return LinearToGamma(value, 2.2);
	}
}

vec4 envMapTexelToLinear(vec4 color) {
	return inputTexelToLinear(color);
}
	`;

}




/***/ }),

/***/ "./src/RGBELoader.js":
/*!***************************!*\
  !*** ./src/RGBELoader.js ***!
  \***************************/
/*! exports provided: RGBELoader */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RGBELoader", function() { return RGBELoader; });
const {
	DataTextureLoader,
	DataUtils,
	FloatType,
	HalfFloatType,
	LinearEncoding,
	LinearFilter
} = THREE;

// https://github.com/mrdoob/three.js/issues/5552
// http://en.wikipedia.org/wiki/RGBE_image_format

class RGBELoader extends DataTextureLoader {

	constructor( manager ) {

		super( manager );

		this.type = HalfFloatType;

	}

	// adapted from http://www.graphics.cornell.edu/~bjw/rgbe.html

	parse( buffer ) {

		const
			/* return codes for rgbe routines */
			//RGBE_RETURN_SUCCESS = 0,
			RGBE_RETURN_FAILURE = - 1,

			/* default error routine.  change this to change error handling */
			rgbe_read_error = 1,
			rgbe_write_error = 2,
			rgbe_format_error = 3,
			rgbe_memory_error = 4,
			rgbe_error = function ( rgbe_error_code, msg ) {

				switch ( rgbe_error_code ) {

					case rgbe_read_error: console.error( 'THREE.RGBELoader Read Error: ' + ( msg || '' ) );
						break;
					case rgbe_write_error: console.error( 'THREE.RGBELoader Write Error: ' + ( msg || '' ) );
						break;
					case rgbe_format_error: console.error( 'THREE.RGBELoader Bad File Format: ' + ( msg || '' ) );
						break;
					default:
					case rgbe_memory_error: console.error( 'THREE.RGBELoader: Error: ' + ( msg || '' ) );

				}

				return RGBE_RETURN_FAILURE;

			},

			/* offsets to red, green, and blue components in a data (float) pixel */
			//RGBE_DATA_RED = 0,
			//RGBE_DATA_GREEN = 1,
			//RGBE_DATA_BLUE = 2,

			/* number of floats per pixel, use 4 since stored in rgba image format */
			//RGBE_DATA_SIZE = 4,

			/* flags indicating which fields in an rgbe_header_info are valid */
			RGBE_VALID_PROGRAMTYPE = 1,
			RGBE_VALID_FORMAT = 2,
			RGBE_VALID_DIMENSIONS = 4,

			NEWLINE = '\n',

			fgets = function ( buffer, lineLimit, consume ) {

				const chunkSize = 128;

				lineLimit = ! lineLimit ? 1024 : lineLimit;
				let p = buffer.pos,
					i = - 1, len = 0, s = '',
					chunk = String.fromCharCode.apply( null, new Uint16Array( buffer.subarray( p, p + chunkSize ) ) );

				while ( ( 0 > ( i = chunk.indexOf( NEWLINE ) ) ) && ( len < lineLimit ) && ( p < buffer.byteLength ) ) {

					s += chunk; len += chunk.length;
					p += chunkSize;
					chunk += String.fromCharCode.apply( null, new Uint16Array( buffer.subarray( p, p + chunkSize ) ) );

				}

				if ( - 1 < i ) {

					/*for (i=l-1; i>=0; i--) {
						byteCode = m.charCodeAt(i);
						if (byteCode > 0x7f && byteCode <= 0x7ff) byteLen++;
						else if (byteCode > 0x7ff && byteCode <= 0xffff) byteLen += 2;
						if (byteCode >= 0xDC00 && byteCode <= 0xDFFF) i--; //trail surrogate
					}*/
					if ( false !== consume ) buffer.pos += len + i + 1;
					return s + chunk.slice( 0, i );

				}

				return false;

			},

			/* minimal header reading.  modify if you want to parse more information */
			RGBE_ReadHeader = function ( buffer ) {


				// regexes to parse header info fields
				const magic_token_re = /^#\?(\S+)/,
					gamma_re = /^\s*GAMMA\s*=\s*(\d+(\.\d+)?)\s*$/,
					exposure_re = /^\s*EXPOSURE\s*=\s*(\d+(\.\d+)?)\s*$/,
					format_re = /^\s*FORMAT=(\S+)\s*$/,
					dimensions_re = /^\s*\-Y\s+(\d+)\s+\+X\s+(\d+)\s*$/,

					// RGBE format header struct
					header = {

						valid: 0, /* indicate which fields are valid */

						string: '', /* the actual header string */

						comments: '', /* comments found in header */

						programtype: 'RGBE', /* listed at beginning of file to identify it after "#?". defaults to "RGBE" */

						format: '', /* RGBE format, default 32-bit_rle_rgbe */

						gamma: 1.0, /* image has already been gamma corrected with given gamma. defaults to 1.0 (no correction) */

						exposure: 1.0, /* a value of 1.0 in an image corresponds to <exposure> watts/steradian/m^2. defaults to 1.0 */

						width: 0, height: 0 /* image dimensions, width/height */

					};

				let line, match;

				if ( buffer.pos >= buffer.byteLength || ! ( line = fgets( buffer ) ) ) {

					return rgbe_error( rgbe_read_error, 'no header found' );

				}

				/* if you want to require the magic token then uncomment the next line */
				if ( ! ( match = line.match( magic_token_re ) ) ) {

					return rgbe_error( rgbe_format_error, 'bad initial token' );

				}

				header.valid |= RGBE_VALID_PROGRAMTYPE;
				header.programtype = match[ 1 ];
				header.string += line + '\n';

				while ( true ) {

					line = fgets( buffer );
					if ( false === line ) break;
					header.string += line + '\n';

					if ( '#' === line.charAt( 0 ) ) {

						header.comments += line + '\n';
						continue; // comment line

					}

					if ( match = line.match( gamma_re ) ) {

						header.gamma = parseFloat( match[ 1 ] );

					}

					if ( match = line.match( exposure_re ) ) {

						header.exposure = parseFloat( match[ 1 ] );

					}

					if ( match = line.match( format_re ) ) {

						header.valid |= RGBE_VALID_FORMAT;
						header.format = match[ 1 ];//'32-bit_rle_rgbe';

					}

					if ( match = line.match( dimensions_re ) ) {

						header.valid |= RGBE_VALID_DIMENSIONS;
						header.height = parseInt( match[ 1 ], 10 );
						header.width = parseInt( match[ 2 ], 10 );

					}

					if ( ( header.valid & RGBE_VALID_FORMAT ) && ( header.valid & RGBE_VALID_DIMENSIONS ) ) break;

				}

				if ( ! ( header.valid & RGBE_VALID_FORMAT ) ) {

					return rgbe_error( rgbe_format_error, 'missing format specifier' );

				}

				if ( ! ( header.valid & RGBE_VALID_DIMENSIONS ) ) {

					return rgbe_error( rgbe_format_error, 'missing image size specifier' );

				}

				return header;

			},

			RGBE_ReadPixels_RLE = function ( buffer, w, h ) {

				const scanline_width = w;

				if (
					// run length encoding is not allowed so read flat
					( ( scanline_width < 8 ) || ( scanline_width > 0x7fff ) ) ||
					// this file is not run length encoded
					( ( 2 !== buffer[ 0 ] ) || ( 2 !== buffer[ 1 ] ) || ( buffer[ 2 ] & 0x80 ) )
				) {

					// return the flat buffer
					return new Uint8Array( buffer );

				}

				if ( scanline_width !== ( ( buffer[ 2 ] << 8 ) | buffer[ 3 ] ) ) {

					return rgbe_error( rgbe_format_error, 'wrong scanline width' );

				}

				const data_rgba = new Uint8Array( 4 * w * h );

				if ( ! data_rgba.length ) {

					return rgbe_error( rgbe_memory_error, 'unable to allocate buffer space' );

				}

				let offset = 0, pos = 0;

				const ptr_end = 4 * scanline_width;
				const rgbeStart = new Uint8Array( 4 );
				const scanline_buffer = new Uint8Array( ptr_end );
				let num_scanlines = h;

				// read in each successive scanline
				while ( ( num_scanlines > 0 ) && ( pos < buffer.byteLength ) ) {

					if ( pos + 4 > buffer.byteLength ) {

						return rgbe_error( rgbe_read_error );

					}

					rgbeStart[ 0 ] = buffer[ pos ++ ];
					rgbeStart[ 1 ] = buffer[ pos ++ ];
					rgbeStart[ 2 ] = buffer[ pos ++ ];
					rgbeStart[ 3 ] = buffer[ pos ++ ];

					if ( ( 2 != rgbeStart[ 0 ] ) || ( 2 != rgbeStart[ 1 ] ) || ( ( ( rgbeStart[ 2 ] << 8 ) | rgbeStart[ 3 ] ) != scanline_width ) ) {

						return rgbe_error( rgbe_format_error, 'bad rgbe scanline format' );

					}

					// read each of the four channels for the scanline into the buffer
					// first red, then green, then blue, then exponent
					let ptr = 0, count;

					while ( ( ptr < ptr_end ) && ( pos < buffer.byteLength ) ) {

						count = buffer[ pos ++ ];
						const isEncodedRun = count > 128;
						if ( isEncodedRun ) count -= 128;

						if ( ( 0 === count ) || ( ptr + count > ptr_end ) ) {

							return rgbe_error( rgbe_format_error, 'bad scanline data' );

						}

						if ( isEncodedRun ) {

							// a (encoded) run of the same value
							const byteValue = buffer[ pos ++ ];
							for ( let i = 0; i < count; i ++ ) {

								scanline_buffer[ ptr ++ ] = byteValue;

							}
							//ptr += count;

						} else {

							// a literal-run
							scanline_buffer.set( buffer.subarray( pos, pos + count ), ptr );
							ptr += count; pos += count;

						}

					}


					// now convert data from buffer into rgba
					// first red, then green, then blue, then exponent (alpha)
					const l = scanline_width; //scanline_buffer.byteLength;
					for ( let i = 0; i < l; i ++ ) {

						let off = 0;
						data_rgba[ offset ] = scanline_buffer[ i + off ];
						off += scanline_width; //1;
						data_rgba[ offset + 1 ] = scanline_buffer[ i + off ];
						off += scanline_width; //1;
						data_rgba[ offset + 2 ] = scanline_buffer[ i + off ];
						off += scanline_width; //1;
						data_rgba[ offset + 3 ] = scanline_buffer[ i + off ];
						offset += 4;

					}

					num_scanlines --;

				}

				return data_rgba;

			};

		const RGBEByteToRGBFloat = function ( sourceArray, sourceOffset, destArray, destOffset ) {

			const e = sourceArray[ sourceOffset + 3 ];
			const scale = Math.pow( 2.0, e - 128.0 ) / 255.0;

			destArray[ destOffset + 0 ] = sourceArray[ sourceOffset + 0 ] * scale;
			destArray[ destOffset + 1 ] = sourceArray[ sourceOffset + 1 ] * scale;
			destArray[ destOffset + 2 ] = sourceArray[ sourceOffset + 2 ] * scale;
			destArray[ destOffset + 3 ] = 1;

		};

		const RGBEByteToRGBHalf = function ( sourceArray, sourceOffset, destArray, destOffset ) {

			const e = sourceArray[ sourceOffset + 3 ];
			const scale = Math.pow( 2.0, e - 128.0 ) / 255.0;

			// clamping to 65504, the maximum representable value in float16
			destArray[ destOffset + 0 ] = DataUtils.toHalfFloat( Math.min( sourceArray[ sourceOffset + 0 ] * scale, 65504 ) );
			destArray[ destOffset + 1 ] = DataUtils.toHalfFloat( Math.min( sourceArray[ sourceOffset + 1 ] * scale, 65504 ) );
			destArray[ destOffset + 2 ] = DataUtils.toHalfFloat( Math.min( sourceArray[ sourceOffset + 2 ] * scale, 65504 ) );
			destArray[ destOffset + 3 ] = DataUtils.toHalfFloat( 1 );

		};

		const byteArray = new Uint8Array( buffer );
		byteArray.pos = 0;
		const rgbe_header_info = RGBE_ReadHeader( byteArray );

		if ( RGBE_RETURN_FAILURE !== rgbe_header_info ) {

			const w = rgbe_header_info.width,
				h = rgbe_header_info.height,
				image_rgba_data = RGBE_ReadPixels_RLE( byteArray.subarray( byteArray.pos ), w, h );

			if ( RGBE_RETURN_FAILURE !== image_rgba_data ) {

				let data, type;
				let numElements;

				switch ( this.type ) {

					case FloatType:

						numElements = image_rgba_data.length / 4;
						const floatArray = new Float32Array( numElements * 4 );

						for ( let j = 0; j < numElements; j ++ ) {

							RGBEByteToRGBFloat( image_rgba_data, j * 4, floatArray, j * 4 );

						}

						data = floatArray;
						type = FloatType;
						break;

					case HalfFloatType:

						numElements = image_rgba_data.length / 4;
						const halfArray = new Uint16Array( numElements * 4 );

						for ( let j = 0; j < numElements; j ++ ) {

							RGBEByteToRGBHalf( image_rgba_data, j * 4, halfArray, j * 4 );

						}

						data = halfArray;
						type = HalfFloatType;
						break;

					default:

						console.error( 'THREE.RGBELoader: unsupported type: ', this.type );
						break;

				}

				return {
					width: w, height: h,
					data: data,
					header: rgbe_header_info.string,
					gamma: rgbe_header_info.gamma,
					exposure: rgbe_header_info.exposure,
					type: type
				};

			}

		}

		return null;

	}

	setDataType( value ) {

		this.type = value;
		return this;

	}

	load( url, onLoad, onProgress, onError ) {

		function onLoadCallback( texture, texData ) {

			switch ( texture.type ) {

				case FloatType:
				case HalfFloatType:

					texture.encoding = LinearEncoding;
					texture.minFilter = LinearFilter;
					texture.magFilter = LinearFilter;
					texture.generateMipmaps = false;
					texture.flipY = true;

					break;

			}

			if ( onLoad ) onLoad( texture, texData );

		}

		return super.load( url, onLoadCallback, onProgress, onError );

	}

}




/***/ }),

/***/ "./src/backstops sync recursive .*":
/*!*******************************!*\
  !*** ./src/backstops sync .* ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./abandoned_tank_farm_02.jpg": "./src/backstops/abandoned_tank_farm_02.jpg",
	"./autumn_hockey.jpg": "./src/backstops/autumn_hockey.jpg",
	"./colorful_studio.jpg": "./src/backstops/colorful_studio.jpg",
	"./dikhololo_night_edit.jpg": "./src/backstops/dikhololo_night_edit.jpg",
	"./large_corridor.jpg": "./src/backstops/large_corridor.jpg",
	"./the_sky_is_on_fire.jpg": "./src/backstops/the_sky_is_on_fire.jpg",
	"./winter_lake_01.jpg": "./src/backstops/winter_lake_01.jpg"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/backstops sync recursive .*";

/***/ }),

/***/ "./src/backstops sync recursive ^\\.\\/.*$":
/*!*************************************!*\
  !*** ./src/backstops sync ^\.\/.*$ ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./abandoned_tank_farm_02.jpg": "./src/backstops/abandoned_tank_farm_02.jpg",
	"./autumn_hockey.jpg": "./src/backstops/autumn_hockey.jpg",
	"./colorful_studio.jpg": "./src/backstops/colorful_studio.jpg",
	"./dikhololo_night_edit.jpg": "./src/backstops/dikhololo_night_edit.jpg",
	"./large_corridor.jpg": "./src/backstops/large_corridor.jpg",
	"./the_sky_is_on_fire.jpg": "./src/backstops/the_sky_is_on_fire.jpg",
	"./winter_lake_01.jpg": "./src/backstops/winter_lake_01.jpg"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/backstops sync recursive ^\\.\\/.*$";

/***/ }),

/***/ "./src/backstops sync recursive ^\\.\\/.*\\.jpg$":
/*!******************************************!*\
  !*** ./src/backstops sync ^\.\/.*\.jpg$ ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./abandoned_tank_farm_02.jpg": "./src/backstops/abandoned_tank_farm_02.jpg",
	"./autumn_hockey.jpg": "./src/backstops/autumn_hockey.jpg",
	"./colorful_studio.jpg": "./src/backstops/colorful_studio.jpg",
	"./dikhololo_night_edit.jpg": "./src/backstops/dikhololo_night_edit.jpg",
	"./large_corridor.jpg": "./src/backstops/large_corridor.jpg",
	"./the_sky_is_on_fire.jpg": "./src/backstops/the_sky_is_on_fire.jpg",
	"./winter_lake_01.jpg": "./src/backstops/winter_lake_01.jpg"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/backstops sync recursive ^\\.\\/.*\\.jpg$";

/***/ }),

/***/ "./src/backstops/abandoned_tank_farm_02.jpg":
/*!**************************************************!*\
  !*** ./src/backstops/abandoned_tank_farm_02.jpg ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/backstops/abandoned_tank_farm_02.jpg";

/***/ }),

/***/ "./src/backstops/autumn_hockey.jpg":
/*!*****************************************!*\
  !*** ./src/backstops/autumn_hockey.jpg ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/backstops/autumn_hockey.jpg";

/***/ }),

/***/ "./src/backstops/colorful_studio.jpg":
/*!*******************************************!*\
  !*** ./src/backstops/colorful_studio.jpg ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/backstops/colorful_studio.jpg";

/***/ }),

/***/ "./src/backstops/dikhololo_night_edit.jpg":
/*!************************************************!*\
  !*** ./src/backstops/dikhololo_night_edit.jpg ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/backstops/dikhololo_night_edit.jpg";

/***/ }),

/***/ "./src/backstops/large_corridor.jpg":
/*!******************************************!*\
  !*** ./src/backstops/large_corridor.jpg ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/backstops/large_corridor.jpg";

/***/ }),

/***/ "./src/backstops/the_sky_is_on_fire.jpg":
/*!**********************************************!*\
  !*** ./src/backstops/the_sky_is_on_fire.jpg ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/backstops/the_sky_is_on_fire.jpg";

/***/ }),

/***/ "./src/backstops/winter_lake_01.jpg":
/*!******************************************!*\
  !*** ./src/backstops/winter_lake_01.jpg ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/backstops/winter_lake_01.jpg";

/***/ }),

/***/ "./src/enviropack-material.js":
/*!************************************!*\
  !*** ./src/enviropack-material.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

const MAPS = ['map', 'roughnessMap', 'aoMap', 'normalMap', 'metalnessMap', "displacementMap"];
const ANISOTROPIC_MAPS = ['map', 'normalMap']

const MATERIALS = {
  "ground-grass-rock": {
    raw: 'aerial_grass_rock',
    repeat: 5,
    anisotropy: 16
  },
  "ground-sandstone": {
    raw: 'sandstone_cracks',
    repeat: 8,
    anisotropy: 16
  },
  "ground-wood-floor": {
    raw: "WoodFloor041",
    repeat: 32,
    anisotropy: 16,
  },
  "ground-snow": {
    raw: "Snow004",
    anisotropy: 16,
    repeat: 4
  },
  "ground-forest": {
    raw: "forrest_ground_03",
    anisotropy: 16,
    repeat: 16
  },
  "bark": {
    raw: "bark_brown_02",
    anisotropy: 4,
    displacementScale: 0.2,
    displacementBias: 0.0,
  },
  "gold": {
    raw: "Metal035",
  },
  "metal": {
    raw: "Metal009"
  },
  "plastic": {
    raw: "Plastic",
    repeat: 3,
    anisotropy: 2
  },
  "fabric": {
    raw: "Fabric026",
    repeat: 2,
    anisotropy: 8,
  },
  "concrete": {
    raw: "dirty_concrete",
    repeat: 2,
    anisotropy: 4
  },
  "rock": {
    raw: "rock_05",
    displacementScale: 0.1,
    displacementBias: 0.0,
    repeat: 1
  },
  "mossy_rock": {
    raw: "mossy_rock",
    anisotropy: 4,
  },
  "wood": {
    raw: "Wood027",
    repeat: 1.5,
    anisotropy: 4,
  },
  "planks": {
    raw: "brown_planks_04",
    repeat: 2,
    anisotropy: 4
  },
  "snow": {
    raw: "Snow003",
    displacementScale: 0.3,
    displacementBias: 0.0,
  }
}

const MAP_FROM_FILENAME = {
  'aoMap': [/AmbientOcclusion(Map)?/i, /(\b|_)AO(map)?(\b|_)/i],
  'displacementMap': [/(\b|_)Disp(lacement)?(Map)?(\b|_)/i],
  'normalMap': [/(\b|_)norm?(al)?(map)?(\b|_)/i],
  'emissiveMap': [/(\b|_)emi(t|tion|ssive|ss)?(map)?(\b|_)/i],
  'metalnessMap': [/(\b|_)metal(ness|l?ic)?(map)?(\b|_)/i],
  'roughnessMap': [/(\b|_)rough(ness)?(map)?(\b|_)/i],
  'src': [/(\b|_)diff(use)?(\b|_)/i, /(\b|_)col(or)?(\b|_)/i],
}

function mapFromFilename(filename) {
  for (let map in MAP_FROM_FILENAME)
  {
    if (MAP_FROM_FILENAME[map].some(exp => exp.test(filename)))
    {
      return map
    }
  }
}

const ALL_MATERIALS = {};

for (let fileName of __webpack_require__("./src/materials sync recursive .*").keys()) {
  let [dot, folder, file] = fileName.split('/')
  let name = folder.match(/(.*?)[-_]\d+k/i)[1]
  if (!(name in ALL_MATERIALS))
  {
    ALL_MATERIALS[name] = {}
  }
  ALL_MATERIALS[name][mapFromFilename(file)] = __webpack_require__("./src/materials sync recursive ^\\.\\/.*\\/.*$")(`./${folder}/${file}`)
}

for (let [name, data] of Object.entries(MATERIALS)) {
  ALL_MATERIALS[name] = Object.assign({}, data, ALL_MATERIALS[data.raw] || {})
}

AFRAME.registerSystem('enviropack-material', {
  schema: {
    autoApply: {default: true},
    shader: {default: 'auto'},
  },
  init() {
    this.materials = ALL_MATERIALS;
  },
  url(file) {
    if (!file) return null;
    if (!this.data) {
      console.warn("No data yet")
      return null;
    }
    let baseUrl = this.el.sceneEl.systems['enviropack'].data.baseUrl;
    return `${baseUrl}${baseUrl ? "/" : ""}${file}`
  },
  chooseShader() {
    if (this.data.shader !== 'auto') return this.data.shader;
    if (AFRAME.utils.device.isMobile()) return 'pbmatcap';
    if (AFRAME.utils.device.isMobileVR()) return 'pbmatcap';
    return 'standard'
  },
  forceShaderChange(shader) {
    this.data.shader = shader;
    this.el.querySelectorAll('*[enviropack-material]').forEach(el => {
      if (el.components['enviropack-material'].data.shader === 'auto')
      {
        el.components['enviropack-material'].forceUpdate()
      }
    })
  }
})

AFRAME.registerComponent('enviropack-material', {
  schema: {
    material: {default: "ground-grass-rock", oneOf: Object.keys(MATERIALS)},
    displacementMap: {default: false},
    shader: {default: 'auto'}
  },
  events: {
    materialtextureloaded: function (e) {
      this.setRepeat(this.repeat)
      this.setAnisotropy(this.anisotropy)
    },
    object3dset: function(e) {
      this.applyMaterial()
    },
    componentchanged: function(e) {
      if (e.detail === 'material')
      {
        this.applyMaterial()
      }
    }
  },
  update(oldData) {
    if (this.data.material !== oldData.material) {
      this.forceUpdate()
    }
  },
  forceUpdate() {
    let material = this.system.materials[this.data.material]
    if (!material) {
      console.warn("No such material", this.data.material)
      return
    }

    let shader = this.data.shader === 'auto' ? this.chooseShader() : this.data.shader;
    this.el.setAttribute('material', 'shader', shader)
    this.el.setAttribute('material', 'src', this.system.url(material.src))
    this.el.setAttribute('material', 'normalMap', this.system.url(material.normalMap))
    this.el.setAttribute('material', 'ambientOcclusionMap', this.system.url(material.aoMap))
    this.el.setAttribute('material', 'roughnessMap', this.system.url(material.roughnessMap))
    this.el.setAttribute('material', 'metalnessMap', this.system.url(material.metalnessMap))
    this.el.setAttribute('material', 'displacementMap', this.data.displacementMap ? this.system.url(material.displacementMap) : null)
    this.el.setAttribute('material', 'roughness', material.roughnessMap ? 1.0 : (material.roughness || 0.0))
    this.el.setAttribute('material', 'metalness', material.metalnessMap ? 1.0 : (material.metalness || 0.0))
    if (shader === 'pbmatcap')
    {
      this.el.setAttribute('material', 'displacementScale', material.displacementScale || 1.0)
      this.el.setAttribute('material', 'displacementBias', ("displacementBias" in material) ? material.displacementBias : 0.5)
    }
    else
    {
      this.el.components.material.material.displacementScale = material.displacementScale || 1.0
      this.el.components.material.material.displacementBias = ("displacementBias" in material) ? material.displacementBias : 0.5;
    }
    this.setRepeat(material.repeat || 1)
    this.setAnisotropy(material.anisotropy || 1)
  },
  chooseShader() {
    if (this.data.shader !== 'auto') return this.data.shader;

    return this.system.chooseShader();
  },
  setRepeat(scale) {
    this.repeat = scale
    let materialComponent = this.el.components.material
    let material = materialComponent.material
    for (let map of MAPS) {
      if (!material[map]) continue;
      material[map].repeat.set(scale, scale)
      material[map].wrapT = THREE.RepeatWrapping
      material[map].wrapS = THREE.RepeatWrapping
      material[map].needsUpdate = true
    }

    if (materialComponent.data.shader === 'pbmatcap')
    {
      materialComponent.shader.update(materialComponent.shader.data)
    }
  },
  setAnisotropy(anisotropy) {
    let material = this.el.components.material.material

    if (AFRAME.utils.device.isMobileVR())
    {
      anisotropy = 1;

      for (let map of MAPS)
      {
        if (material[map])
        {
          material[map].magFilter = THREE.NearestFilter
          material[map].minFilter = THREE.LinearMipmapNearestFilter
          material[map].needsUpdate = true
        }
      }
    }

    this.anisotropy = anisotropy;
    for (let map of ANISOTROPIC_MAPS)
    {
        if (!material[map]) continue;

        material[map].anisotropy = anisotropy;
        material[map].needsUpdate = true;
    }
  },
  applyMaterial(mesh = undefined)
  {
    if (!this.el.hasAttribute('material')) return
    if (!mesh) mesh = this.el.getObject3D('mesh')
    if (!mesh) return


    let material = this.el.components.material.material

    mesh.traverse(o => {
      if (o.material)
      {
        o.material = material
      }
    })
    this.el.emit('enviropack-material-applied', material)
  }
})


/***/ }),

/***/ "./src/hd-environment.js":
/*!*******************************!*\
  !*** ./src/hd-environment.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PMREMGenerator_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PMREMGenerator.js */ "./src/PMREMGenerator.js");
/* harmony import */ var _RGBELoader_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./RGBELoader.js */ "./src/RGBELoader.js");



const ENVIRONMENTS = {
  tankfarm: {
    hdri: 'abandoned_tank_farm_02',
    ground: 'ground-grass-rock',
    lights: [
      {position: "0.5 1 1", intensity: 1.6},
      {position: "0.5 0.3 0.1", intensity: 1.6}
    ],
    props: [
      {prop: 'rock', numObjects: 500, material: 'mossy_rock'},
    ]
  },
  sandstone: {
    hdri: 'the_sky_is_on_fire',
    ground: 'ground-sandstone',
    lights: [
      {position: "14.60351 3.91255 8.38254", intensity: 1.6},
      // {position: "18.33144 0.3 18.30444", intensity: 1.6}
    ],
    props: [
      {prop: 'stone', numObjects: 300, material: 'rock'},
    ]
  },
  interior: {
    hdri: "large_corridor",
    toneMapping: 2,
    ground: "ground-wood-floor",
    lights: [
      {position: "0 7.016 -3.91", intensity: 1.6}
    ],
    props: [
      {prop: "column", numObjects: 100, material: "planks", maxScale: 5, minScale: 3},
      {prop: "stone", numObjects: 100, material: "wood"}
    ]
  },
  winter: {
    hdri: "winter_lake_01",
    toneMapping: 3,
    ground: "ground-snow",
    lights: [
      {position: "0.5 1 1", intensity: 1.6, shadowRadius: 10},
      {position: "0.5 0.3 0.1", intensity: 1.6, shadowRadius: 10, shadowBias: 1.0}
    ],
    props: [{
      prop: 'rock',
      numObjects: 500,
      material: 'snow',
    }]
  },
  autumn: {
    hdri: "autumn_hockey",
    ground: "ground-forest",
    toneMapping: 2,
    lights: [
      {position: "0 7.016 0.91", intensity: 1.6, shadowRadius: 3}
    ],
    props: [
      {prop: 'rock', numObjects: 500, material: 'mossy_rock'},
    ]
  },
  empty_studio: {
    hdri: "colorful_studio",
  },
  empty_studio_floor: {
    hdri: "colorful_studio",
    ground: "ground-wood-floor",
  },
  night: {
    hdri: "dikhololo_night_edit",
    ground: "ground-forest",
    toneMapping: 2,
    lights: [
      {position: "0 3.2 0", intensity: 0.05, shadowRadius: 3, shadowBias: 0.1}
    ],
    props: [
      {prop: 'rock', numObjects: 100, material: 'metal'},
    ]
  },
}

AFRAME.registerSystem('enviropack', {
  schema: {
    baseUrl: {type: 'string', default: document.currentScript.src.split('/').slice(0, -1).join("/")}
  },
  init() {
    this.environments = ENVIRONMENTS;
    this.presets = ENVIRONMENTS;
    this.enviropack = null;
  },
  url(file) {
    if (!file) return null;
    if (!this.data) {
      console.warn("No data yet")
      return null;
    }
    let baseUrl = this.el.sceneEl.systems['enviropack'].data.baseUrl;
    return `${baseUrl}${baseUrl ? "/" : ""}${file}`
  },
})

AFRAME.registerComponent('enviropack', {
  schema: {
    preset: {type: 'string', oneOf: ENVIRONMENTS, default: "tankfarm"},
    baseUrl: {type: 'string', default: ""},
  },
  init() {
    this.lights = []
    this.props = []

    this.defaultLights = []

    if (this.system.enviropack)
    {
      // console.warn("There's already an existing enviropack. Expect problems")
      console.warn("Removing existing enviropack from other element", this.system.enviropack.el)
      this.system.enviropack.el.removeAttribute('enviropack')
    }
    this.system.enviropack = this
  },
  remove() {
    if (this.ground)
    {
      this.ground.remove()
    }

    for (let light of this.lights)
    {
      light.remove()
    }

    let sky = this.el.sceneEl.querySelector('a-sky');
    sky.removeAttribute('enviropack-hdri')

    for (let prop of this.props)
    {
      prop.remove()
    }

    this.el.sceneEl.systems.light.userDefinedLights = false
    this.el.sceneEl.systems.light.setupDefaultLights()

    if (this.system.enviropack === this)
    {
      this.system.enviropack = null
    }
  },
  update() {
    if (this.data.baseUrl)
    {
      this.system.data.baseUrl = this.data.baseUrl
    }

    let sceneEl = this.el.sceneEl;
    let sky = sceneEl.querySelector('a-sky');
    if (!sky) {
      sky = document.createElement('a-sky')
      sceneEl.append(sky)
    }

    let env = this.system.environments[this.data.preset]
    if (!env) {
      console.warn("No such preset", this.data.preset)
      return;
    }

    sky.setAttribute('enviropack-hdri', {hdri: env.hdri, backstop: env.backstop || "", toneMapping: env.toneMapping || 1})

    let ground
    if (!this.ground) {
      ground = document.createElement('a-plane')
      this.ground = ground
      this.el.append(ground)
      ground.setAttribute('position', '0 0 0')
      ground.setAttribute('rotation', "-90 0 0")
      ground.setAttribute('width', 100)
      ground.setAttribute('height', 100)
      ground.setAttribute('shadow', '')
    }
    else
    {
      ground = this.ground
    }

    if (env.ground)
    {
      ground.setAttribute('enviropack-material', {material: env.ground})
      ground.setAttribute('visible', true)
    }
    else
    {
      ground.setAttribute('visible', "false")
    }

    sceneEl.querySelectorAll('*[data-aframe-default-light]').forEach(el => {
      el.remove()
    })

    this.el.sceneEl.systems.light.userDefinedLights = true

    for (let light of this.lights)
    {
      light.remove()
    }
    this.lights.length = 0

    if (this.el.sceneEl.systems['enviropack-material'].chooseShader() !== 'pbmatcap')
    {
      for (let light of (env.lights || []))
      {
        let el = document.createElement('a-entity')
        this.el.append(el)
        this.lights.push(el)
        el.setAttribute('light', 'type', 'directional')
        el.setAttribute('light', 'castShadow', 'true')
        el.setAttribute('light', 'intensity', light.intensity)
        el.setAttribute('light', 'shadowRadius', light.shadowRadius || 1)
        el.setAttribute('light', 'shadowBias', light.shadowBias || 0.0)
        el.setAttribute('position', light.position)
        el.setAttribute('light', 'shadowCameraNear', -100)
        el.setAttribute('light', 'shadowCameraRight', 50)
        el.setAttribute('light', 'shadowCameraLeft', -50)
        el.setAttribute('light', 'shadowCameraTop', 50)
        el.setAttribute('light', 'shadowCameraBottom', -50)
      }
    }

    for (let prop of this.props)
    {
      prop.remove()
    }
    this.props.length = 0;

    for (let prop of (env.props || []))
    {
      let el = document.createElement('a-entity')
      this.el.append(el)
      this.props.push(el)
      el.setAttribute('enviropack-material', 'material', prop.material || 'rock')
      el.setAttribute('enviropack-prop', 'prop', prop.prop || 'stone')
      el.setAttribute('scatter-enviropack-props', {'numObjects': prop.numObjects || 5000,
                                                   'maxScale': prop.maxScale || 20,
                                                   'minScale': prop.minScale || 5})
    }

    this.el.sceneEl.querySelectorAll('*[enviropack-material]').forEach(el => {
      if (el.components && el.components.material && el.components.material.data.shader === 'pbmatcap')
      {
        el.components.material.shader.update(el.components.material.data)
      }
    })
  }
})

const HDRIS = {};
for (let fileName of __webpack_require__("./src/hdris sync recursive .*").keys()) {
  let [dot, file] = fileName.split('/')
  let name = file.match(/(.*?)[-_]\d+k/i)[1]

  HDRIS[name] = __webpack_require__("./src/hdris sync recursive ^\\.\\/.*$")(`./${file}`)
}

const BACKSTOPS = {};

for (let fileName of __webpack_require__("./src/backstops sync recursive .*").keys()) {
  let [dot, file] = fileName.split('/')
  let name = file.match(/(.*?)\.jpg/i)[1]

  BACKSTOPS[name] = __webpack_require__("./src/backstops sync recursive ^\\.\\/.*$")(`./${file}`)
}

AFRAME.registerSystem('enviropack-hdri', {
  init() {
    this.hdris = HDRIS;
  },
})

// Allows setting an HDRI to use as an a-sky background and scene-wide
// environment map
AFRAME.registerComponent('enviropack-hdri', {
  dependencies: ['material'],
  schema: {
    // Selector for the `a-asset-item` with the src set to the `.hdri` file
    hdri: {type: 'string', oneOf: HDRIS},

    backstop: {type: 'string'},

    // Exposure for the hdri
    exposure: {default: 1.0},

    // THREE.js tone mapping constant
    toneMapping: {default: 1},

    // If set, will set the envMap for all selected elements and children with compatible materials
    envMapSelector: {type: 'string', default: 'a-scene'},

    // Intensity of the environement map
    intensity: {default: 1.0},

    // If > 0 will set the envMap for all objects with compatible material continuously
    updateEnvMapThrottle: {default: 100},
  },
  init() {
    if (this.el.hasAttribute('material'))
    {
      this.originalMaterial = AFRAME.utils.extend({}, this.el.getAttribute('material'))
    }
  },
  remove() {
    this.el.removeAttribute('material')
    this.el.setAttribute('material', this.originalMaterial)

    for (let r of this.envMapSelectorElements)
    {
      r.object3D.traverseVisible(o => {
        if (o.material && o.material.type === 'MeshStandardMaterial' &&
          (o.material.envMap === this.envMap))
        {
          o.material.envMap = null
          o.material.needsUpdate = true
        }
      })
    }
  },
  update(oldData) {
    if (oldData.hdri !== this.data.hdri)
    {
      this.setHDRI()
    }

    if (oldData.envMapSelector !== this.data.envMapSelector)
    {
      this.envMapSelectorElements = Array.from(document.querySelectorAll(this.data.envMapSelector))
    }

    this.el.sceneEl.renderer.toneMapping = this.data.toneMapping
    this.el.sceneEl.renderer.toneMappingExposure = this.data.exposure

    if (oldData.updateEnvMapThrottle !== this.data.updateEnvMapThrottle)
    {
      if (this.data.updateEnvMapThrottle <= 0) {
        this.tick = function() {}
      }
      else
      {
        this.tick = AFRAME.utils.throttleTick(this._tick, this.data.updateEnvMapThrottle, this)
      }
    }
  },

  // Loads an RGBE (.hdr) image from URL, and returns a Promise resolving to a texture
  loadRGBE(url) {
    return new Promise((r, e) => {
      new _RGBELoader_js__WEBPACK_IMPORTED_MODULE_1__["RGBELoader"]()
  			.setDataType( THREE.HalfFloatType ) // alt: FloatType, HalfFloatType
  			.load( url , function ( texture, textureData ) {
          r({texture, textureData})
  			} );
      })
  },
  async setHDRI() {
    let url = this.el.sceneEl.systems.enviropack.url(this.system.hdris[this.data.hdri])
    let {texture} = await this.loadRGBE(url)
    let renderer = this.el.sceneEl.renderer
    renderer.toneMapping = this.data.toneMapping
    renderer.toneMappingExposure = this.data.exposure
    let wasXREnabled = renderer.xr.enabled
    renderer.xr.enabled = false
    let PMREMGeneratorClass = THREE.PMREMGenerator || _PMREMGenerator_js__WEBPACK_IMPORTED_MODULE_0__["PMREMGenerator"]
    var pmremGenerator = new PMREMGeneratorClass( renderer );
    pmremGenerator.compileEquirectangularShader();

    let skyEl = this.el
    let mesh = skyEl.getObject3D('mesh')
    mesh.material.color.set("#FFFFFF")

    if (this.data.backstop || this.data.hdri in BACKSTOPS)
    {
      skyEl.setAttribute('material', 'color', 'white')
      skyEl.setAttribute('material', 'src', '')
      skyEl.setAttribute('material', 'src', this.el.sceneEl.systems.enviropack.url(__webpack_require__("./src/backstops sync recursive ^\\.\\/.*\\.jpg$")(`./${this.data.backstop || this.data.hdri}.jpg`)))
      skyEl.components.material.material.toneMapped = false
      skyEl.components.material.material.needsUpdate = true
    }
    else
    {
      mesh.material.map = texture
      mesh.material.needsUpdate = true
      skyEl.components.material.material.toneMapped = true
      skyEl.components.material.material.needsUpdate = true
    }

    mesh.scale.x = -1
    mesh.scale.z = -1

    this.hdriTexture = texture
    var envMap = pmremGenerator.fromEquirectangular( texture ).texture;

    this.envMap = envMap
    renderer.xr.enabled = wasXREnabled

    pmremGenerator.dispose()

    this.setEnvMap()
  },
  setEnvMap() {
    if (!this.envMapSelectorElements) return
    for (let r of this.envMapSelectorElements)
    {
      r.object3D.traverseVisible(o => {
        if (o.material && o.material.type === 'MeshStandardMaterial' &&
          (o.material.envMap !== this.envMap || o.material.envMapIntensity !== this.data.envMapIntensity))
        {
          o.material.envMap = this.envMap
          o.material.envMapIntensity = this.data.intensity
          o.material.needsUpdate = true
        }
      })
    }
  },
  _tick() {
    this.setEnvMap()
  },
})


/***/ }),

/***/ "./src/hd-props.js":
/*!*************************!*\
  !*** ./src/hd-props.js ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

const PROPS = {}
for (let fileName of __webpack_require__("./src/models sync recursive .*").keys()) {
  let [dot, file] = fileName.split('/')
  let name = file.match(/(.*?)\.glb/i)[1]

  PROPS[name] = __webpack_require__("./src/models sync recursive ^\\.\\/.*$")(`./${file}`)
}

if (AFRAME.utils.device.isMobileVR())
{
  PROPS.rock = PROPS.stone
}

AFRAME.registerComponent('enviropack-prop', {
  schema: {
    prop: {type: 'string', oneOf: PROPS},
  },
  update(oldData) {
    if (!(this.data.prop in PROPS))
    {
      console.warn("No such prop", this.data.prop)
      return;
    }
    this.el.setAttribute('gltf-model', this.el.sceneEl.systems.enviropack.url(PROPS[this.data.prop]))
  }
})

AFRAME.registerComponent('scatter-enviropack-props', {
  schema: {
    innerRadius: {default: 30},
    outerRadius: {default: 50},
    numObjects: {default: 5000},
    maxScale: { default: 20},
    minScale: {default: 0.5 * 10},
  },
  events: {
    object3dset: function(e) {
      this.el.getObject3D('mesh').visible = false
      this.scatter();
    },
    'enviropack-material-applied': function(e) {
      this.scatter();
    },
    materialtextureloaded: function(e) {
      this.scatter();
    },
    componentchanged: function(e) {
      if (e.detail === 'material')
      {
        this.scatter();
      }
    }
  },
  update(oldData) {
    this.scatter();
  },
  init() {
  },
  remove() {
    if (this.instancedMesh)
    {
      this.instancedMesh.parent.remove(this.instancedMesh)
      this.instancedMesh.dispose()
    }
  },
  scatter() {
    if (!this.el.getObject3D('mesh')) return;
    let sourceMesh = this.el.getObject3D('mesh').getObjectByProperty('type', 'Mesh')
    if (!sourceMesh) return;
    // if (this.el.components.material.material.type !== 'MeshStandardMaterial') return;
    if (this.instancedMesh)
    {
      this.instancedMesh.parent.remove(this.instancedMesh)
      this.instancedMesh.dispose()
    }

    let numObjects = this.data.numObjects;

    if (AFRAME.utils.device.isMobile() || AFRAME.utils.device.isMobileVR())
    {
      numObjects = Math.min(100, numObjects)
    }

    let instancedMesh = new THREE.InstancedMesh(sourceMesh.geometry, this.el.components.material.material, numObjects)
    // Old a-frame compatibility
    if (!instancedMesh.dispose) {
      instancedMesh.dispose = function() {};
    }
    let matrix = new THREE.Matrix4();
    let pos = new THREE.Vector3();
    let scale = new THREE.Vector3();
    let rot = new THREE.Euler();
    let quat = new THREE.Quaternion()

    for (let i = 0; i < numObjects; ++i)
    {
      matrix.identity()
      pos.setFromSphericalCoords(
        THREE.MathUtils.lerp(this.data.innerRadius, this.data.outerRadius, Math.random()),
        Math.random() * Math.PI * 2,
        0
      );
      pos.x = pos.y;
      pos.y = 0;
      scale.set(1,1,1)
      scale.multiplyScalar(THREE.MathUtils.lerp(this.data.minScale, this.data.maxScale, Math.random()));
      rot.y = Math.random() * Math.PI * 2;
      quat.setFromEuler(rot)
      matrix.compose(pos, quat, scale)
      instancedMesh.setMatrixAt(i, matrix)
      // instancedMesh.instanceMatrix.needsUpdate = true
      // e.object3D.rotation.y = Math.random() * Math.PI * 2;
    }
    this.el.object3D.add(instancedMesh)
    this.instancedMesh = instancedMesh
  }
})


/***/ }),

/***/ "./src/hdris sync recursive .*":
/*!***************************!*\
  !*** ./src/hdris sync .* ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./abandoned_tank_farm_02_2k.hdr": "./src/hdris/abandoned_tank_farm_02_2k.hdr",
	"./autumn_hockey_2k.hdr": "./src/hdris/autumn_hockey_2k.hdr",
	"./colorful_studio_1k.hdr": "./src/hdris/colorful_studio_1k.hdr",
	"./dikhololo_night_edit_1k.hdr": "./src/hdris/dikhololo_night_edit_1k.hdr",
	"./large_corridor_1k.hdr": "./src/hdris/large_corridor_1k.hdr",
	"./moonless_golf_1k.hdr": "./src/hdris/moonless_golf_1k.hdr",
	"./the_sky_is_on_fire_2k.hdr": "./src/hdris/the_sky_is_on_fire_2k.hdr",
	"./winter_lake_01_2k.hdr": "./src/hdris/winter_lake_01_2k.hdr"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/hdris sync recursive .*";

/***/ }),

/***/ "./src/hdris sync recursive ^\\.\\/.*$":
/*!*********************************!*\
  !*** ./src/hdris sync ^\.\/.*$ ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./abandoned_tank_farm_02_2k.hdr": "./src/hdris/abandoned_tank_farm_02_2k.hdr",
	"./autumn_hockey_2k.hdr": "./src/hdris/autumn_hockey_2k.hdr",
	"./colorful_studio_1k.hdr": "./src/hdris/colorful_studio_1k.hdr",
	"./dikhololo_night_edit_1k.hdr": "./src/hdris/dikhololo_night_edit_1k.hdr",
	"./large_corridor_1k.hdr": "./src/hdris/large_corridor_1k.hdr",
	"./moonless_golf_1k.hdr": "./src/hdris/moonless_golf_1k.hdr",
	"./the_sky_is_on_fire_2k.hdr": "./src/hdris/the_sky_is_on_fire_2k.hdr",
	"./winter_lake_01_2k.hdr": "./src/hdris/winter_lake_01_2k.hdr"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/hdris sync recursive ^\\.\\/.*$";

/***/ }),

/***/ "./src/hdris/abandoned_tank_farm_02_2k.hdr":
/*!*************************************************!*\
  !*** ./src/hdris/abandoned_tank_farm_02_2k.hdr ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/hdris/abandoned_tank_farm_02_2k.hdr";

/***/ }),

/***/ "./src/hdris/autumn_hockey_2k.hdr":
/*!****************************************!*\
  !*** ./src/hdris/autumn_hockey_2k.hdr ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/hdris/autumn_hockey_2k.hdr";

/***/ }),

/***/ "./src/hdris/colorful_studio_1k.hdr":
/*!******************************************!*\
  !*** ./src/hdris/colorful_studio_1k.hdr ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/hdris/colorful_studio_1k.hdr";

/***/ }),

/***/ "./src/hdris/dikhololo_night_edit_1k.hdr":
/*!***********************************************!*\
  !*** ./src/hdris/dikhololo_night_edit_1k.hdr ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/hdris/dikhololo_night_edit_1k.hdr";

/***/ }),

/***/ "./src/hdris/large_corridor_1k.hdr":
/*!*****************************************!*\
  !*** ./src/hdris/large_corridor_1k.hdr ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/hdris/large_corridor_1k.hdr";

/***/ }),

/***/ "./src/hdris/moonless_golf_1k.hdr":
/*!****************************************!*\
  !*** ./src/hdris/moonless_golf_1k.hdr ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/hdris/moonless_golf_1k.hdr";

/***/ }),

/***/ "./src/hdris/the_sky_is_on_fire_2k.hdr":
/*!*********************************************!*\
  !*** ./src/hdris/the_sky_is_on_fire_2k.hdr ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/hdris/the_sky_is_on_fire_2k.hdr";

/***/ }),

/***/ "./src/hdris/winter_lake_01_2k.hdr":
/*!*****************************************!*\
  !*** ./src/hdris/winter_lake_01_2k.hdr ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/hdris/winter_lake_01_2k.hdr";

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! ./enviropack-material.js */ "./src/enviropack-material.js")
__webpack_require__(/*! ./hd-environment.js */ "./src/hd-environment.js")
__webpack_require__(/*! ./hd-props.js */ "./src/hd-props.js")
__webpack_require__(/*! ./pb-matcap.js */ "./src/pb-matcap.js")
__webpack_require__(/*! ../package.json */ "./package.json")
__webpack_require__(/*! !file-loader?name=Readme.md!../Readme.md */ "./node_modules/file-loader/dist/cjs.js?name=Readme.md!./Readme.md")
__webpack_require__(/*! !file-loader?name=enviropacks.gif!../enviropacks.gif */ "./node_modules/file-loader/dist/cjs.js?name=enviropacks.gif!./enviropacks.gif")


/***/ }),

/***/ "./src/matcap sync recursive .*\\.jpg":
/*!*********************************!*\
  !*** ./src/matcap sync .*\.jpg ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./autumn/roughDialectric.jpg": "./src/matcap/autumn/roughDialectric.jpg",
	"./autumn/roughMetallic.jpg": "./src/matcap/autumn/roughMetallic.jpg",
	"./autumn/smoothDialectric.jpg": "./src/matcap/autumn/smoothDialectric.jpg",
	"./autumn/smoothMetallic.jpg": "./src/matcap/autumn/smoothMetallic.jpg",
	"./default/roughDialectric.jpg": "./src/matcap/default/roughDialectric.jpg",
	"./default/roughMetallic.jpg": "./src/matcap/default/roughMetallic.jpg",
	"./default/smoothDialectric.jpg": "./src/matcap/default/smoothDialectric.jpg",
	"./default/smoothMetallic.jpg": "./src/matcap/default/smoothMetallic.jpg",
	"./interior/roughDialectric.jpg": "./src/matcap/interior/roughDialectric.jpg",
	"./interior/roughMetallic.jpg": "./src/matcap/interior/roughMetallic.jpg",
	"./interior/smoothDialectric.jpg": "./src/matcap/interior/smoothDialectric.jpg",
	"./interior/smoothMetallic.jpg": "./src/matcap/interior/smoothMetallic.jpg",
	"./night/roughDialectric.jpg": "./src/matcap/night/roughDialectric.jpg",
	"./night/roughMetallic.jpg": "./src/matcap/night/roughMetallic.jpg",
	"./night/smoothDialectric.jpg": "./src/matcap/night/smoothDialectric.jpg",
	"./night/smoothMetallic.jpg": "./src/matcap/night/smoothMetallic.jpg",
	"./sandstone/roughDialectric.jpg": "./src/matcap/sandstone/roughDialectric.jpg",
	"./sandstone/roughMetallic.jpg": "./src/matcap/sandstone/roughMetallic.jpg",
	"./sandstone/smoothDialectric.jpg": "./src/matcap/sandstone/smoothDialectric.jpg",
	"./sandstone/smoothMetallic.jpg": "./src/matcap/sandstone/smoothMetallic.jpg",
	"./tankfarm/roughDialectric.jpg": "./src/matcap/tankfarm/roughDialectric.jpg",
	"./tankfarm/roughMetallic.jpg": "./src/matcap/tankfarm/roughMetallic.jpg",
	"./tankfarm/smoothDialectric.jpg": "./src/matcap/tankfarm/smoothDialectric.jpg",
	"./tankfarm/smoothMetallic.jpg": "./src/matcap/tankfarm/smoothMetallic.jpg",
	"./winter/roughDialectric.jpg": "./src/matcap/winter/roughDialectric.jpg",
	"./winter/roughMetallic.jpg": "./src/matcap/winter/roughMetallic.jpg",
	"./winter/smoothDialectric.jpg": "./src/matcap/winter/smoothDialectric.jpg",
	"./winter/smoothMetallic.jpg": "./src/matcap/winter/smoothMetallic.jpg"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/matcap sync recursive .*\\.jpg";

/***/ }),

/***/ "./src/matcap sync recursive ^\\.\\/.*\\/.*$":
/*!**************************************!*\
  !*** ./src/matcap sync ^\.\/.*\/.*$ ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./autumn/roughDialectric.jpg": "./src/matcap/autumn/roughDialectric.jpg",
	"./autumn/roughMetallic.jpg": "./src/matcap/autumn/roughMetallic.jpg",
	"./autumn/smoothDialectric.jpg": "./src/matcap/autumn/smoothDialectric.jpg",
	"./autumn/smoothMetallic.jpg": "./src/matcap/autumn/smoothMetallic.jpg",
	"./default/roughDialectric.jpg": "./src/matcap/default/roughDialectric.jpg",
	"./default/roughMetallic.jpg": "./src/matcap/default/roughMetallic.jpg",
	"./default/smoothDialectric.jpg": "./src/matcap/default/smoothDialectric.jpg",
	"./default/smoothMetallic.jpg": "./src/matcap/default/smoothMetallic.jpg",
	"./interior/roughDialectric.jpg": "./src/matcap/interior/roughDialectric.jpg",
	"./interior/roughMetallic.jpg": "./src/matcap/interior/roughMetallic.jpg",
	"./interior/smoothDialectric.jpg": "./src/matcap/interior/smoothDialectric.jpg",
	"./interior/smoothMetallic.jpg": "./src/matcap/interior/smoothMetallic.jpg",
	"./night/roughDialectric.jpg": "./src/matcap/night/roughDialectric.jpg",
	"./night/roughMetallic.jpg": "./src/matcap/night/roughMetallic.jpg",
	"./night/smoothDialectric.jpg": "./src/matcap/night/smoothDialectric.jpg",
	"./night/smoothMetallic.jpg": "./src/matcap/night/smoothMetallic.jpg",
	"./sandstone/roughDialectric.jpg": "./src/matcap/sandstone/roughDialectric.jpg",
	"./sandstone/roughMetallic.jpg": "./src/matcap/sandstone/roughMetallic.jpg",
	"./sandstone/smoothDialectric.jpg": "./src/matcap/sandstone/smoothDialectric.jpg",
	"./sandstone/smoothMetallic.jpg": "./src/matcap/sandstone/smoothMetallic.jpg",
	"./tankfarm/roughDialectric.jpg": "./src/matcap/tankfarm/roughDialectric.jpg",
	"./tankfarm/roughMetallic.jpg": "./src/matcap/tankfarm/roughMetallic.jpg",
	"./tankfarm/smoothDialectric.jpg": "./src/matcap/tankfarm/smoothDialectric.jpg",
	"./tankfarm/smoothMetallic.jpg": "./src/matcap/tankfarm/smoothMetallic.jpg",
	"./winter/roughDialectric.jpg": "./src/matcap/winter/roughDialectric.jpg",
	"./winter/roughMetallic.jpg": "./src/matcap/winter/roughMetallic.jpg",
	"./winter/smoothDialectric.jpg": "./src/matcap/winter/smoothDialectric.jpg",
	"./winter/smoothMetallic.jpg": "./src/matcap/winter/smoothMetallic.jpg"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/matcap sync recursive ^\\.\\/.*\\/.*$";

/***/ }),

/***/ "./src/matcap/autumn/roughDialectric.jpg":
/*!***********************************************!*\
  !*** ./src/matcap/autumn/roughDialectric.jpg ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/autumn/roughDialectric.jpg";

/***/ }),

/***/ "./src/matcap/autumn/roughMetallic.jpg":
/*!*********************************************!*\
  !*** ./src/matcap/autumn/roughMetallic.jpg ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/autumn/roughMetallic.jpg";

/***/ }),

/***/ "./src/matcap/autumn/smoothDialectric.jpg":
/*!************************************************!*\
  !*** ./src/matcap/autumn/smoothDialectric.jpg ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/autumn/smoothDialectric.jpg";

/***/ }),

/***/ "./src/matcap/autumn/smoothMetallic.jpg":
/*!**********************************************!*\
  !*** ./src/matcap/autumn/smoothMetallic.jpg ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/autumn/smoothMetallic.jpg";

/***/ }),

/***/ "./src/matcap/default/roughDialectric.jpg":
/*!************************************************!*\
  !*** ./src/matcap/default/roughDialectric.jpg ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/default/roughDialectric.jpg";

/***/ }),

/***/ "./src/matcap/default/roughMetallic.jpg":
/*!**********************************************!*\
  !*** ./src/matcap/default/roughMetallic.jpg ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/default/roughMetallic.jpg";

/***/ }),

/***/ "./src/matcap/default/smoothDialectric.jpg":
/*!*************************************************!*\
  !*** ./src/matcap/default/smoothDialectric.jpg ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/default/smoothDialectric.jpg";

/***/ }),

/***/ "./src/matcap/default/smoothMetallic.jpg":
/*!***********************************************!*\
  !*** ./src/matcap/default/smoothMetallic.jpg ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/default/smoothMetallic.jpg";

/***/ }),

/***/ "./src/matcap/interior/roughDialectric.jpg":
/*!*************************************************!*\
  !*** ./src/matcap/interior/roughDialectric.jpg ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/interior/roughDialectric.jpg";

/***/ }),

/***/ "./src/matcap/interior/roughMetallic.jpg":
/*!***********************************************!*\
  !*** ./src/matcap/interior/roughMetallic.jpg ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/interior/roughMetallic.jpg";

/***/ }),

/***/ "./src/matcap/interior/smoothDialectric.jpg":
/*!**************************************************!*\
  !*** ./src/matcap/interior/smoothDialectric.jpg ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/interior/smoothDialectric.jpg";

/***/ }),

/***/ "./src/matcap/interior/smoothMetallic.jpg":
/*!************************************************!*\
  !*** ./src/matcap/interior/smoothMetallic.jpg ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/interior/smoothMetallic.jpg";

/***/ }),

/***/ "./src/matcap/night/roughDialectric.jpg":
/*!**********************************************!*\
  !*** ./src/matcap/night/roughDialectric.jpg ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/night/roughDialectric.jpg";

/***/ }),

/***/ "./src/matcap/night/roughMetallic.jpg":
/*!********************************************!*\
  !*** ./src/matcap/night/roughMetallic.jpg ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/night/roughMetallic.jpg";

/***/ }),

/***/ "./src/matcap/night/smoothDialectric.jpg":
/*!***********************************************!*\
  !*** ./src/matcap/night/smoothDialectric.jpg ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/night/smoothDialectric.jpg";

/***/ }),

/***/ "./src/matcap/night/smoothMetallic.jpg":
/*!*********************************************!*\
  !*** ./src/matcap/night/smoothMetallic.jpg ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/night/smoothMetallic.jpg";

/***/ }),

/***/ "./src/matcap/sandstone/roughDialectric.jpg":
/*!**************************************************!*\
  !*** ./src/matcap/sandstone/roughDialectric.jpg ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/sandstone/roughDialectric.jpg";

/***/ }),

/***/ "./src/matcap/sandstone/roughMetallic.jpg":
/*!************************************************!*\
  !*** ./src/matcap/sandstone/roughMetallic.jpg ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/sandstone/roughMetallic.jpg";

/***/ }),

/***/ "./src/matcap/sandstone/smoothDialectric.jpg":
/*!***************************************************!*\
  !*** ./src/matcap/sandstone/smoothDialectric.jpg ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/sandstone/smoothDialectric.jpg";

/***/ }),

/***/ "./src/matcap/sandstone/smoothMetallic.jpg":
/*!*************************************************!*\
  !*** ./src/matcap/sandstone/smoothMetallic.jpg ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/sandstone/smoothMetallic.jpg";

/***/ }),

/***/ "./src/matcap/tankfarm/roughDialectric.jpg":
/*!*************************************************!*\
  !*** ./src/matcap/tankfarm/roughDialectric.jpg ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/tankfarm/roughDialectric.jpg";

/***/ }),

/***/ "./src/matcap/tankfarm/roughMetallic.jpg":
/*!***********************************************!*\
  !*** ./src/matcap/tankfarm/roughMetallic.jpg ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/tankfarm/roughMetallic.jpg";

/***/ }),

/***/ "./src/matcap/tankfarm/smoothDialectric.jpg":
/*!**************************************************!*\
  !*** ./src/matcap/tankfarm/smoothDialectric.jpg ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/tankfarm/smoothDialectric.jpg";

/***/ }),

/***/ "./src/matcap/tankfarm/smoothMetallic.jpg":
/*!************************************************!*\
  !*** ./src/matcap/tankfarm/smoothMetallic.jpg ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/tankfarm/smoothMetallic.jpg";

/***/ }),

/***/ "./src/matcap/winter/roughDialectric.jpg":
/*!***********************************************!*\
  !*** ./src/matcap/winter/roughDialectric.jpg ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/winter/roughDialectric.jpg";

/***/ }),

/***/ "./src/matcap/winter/roughMetallic.jpg":
/*!*********************************************!*\
  !*** ./src/matcap/winter/roughMetallic.jpg ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/winter/roughMetallic.jpg";

/***/ }),

/***/ "./src/matcap/winter/smoothDialectric.jpg":
/*!************************************************!*\
  !*** ./src/matcap/winter/smoothDialectric.jpg ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/winter/smoothDialectric.jpg";

/***/ }),

/***/ "./src/matcap/winter/smoothMetallic.jpg":
/*!**********************************************!*\
  !*** ./src/matcap/winter/smoothMetallic.jpg ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/winter/smoothMetallic.jpg";

/***/ }),

/***/ "./src/materials sync recursive .*":
/*!*******************************!*\
  !*** ./src/materials sync .* ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./Fabric026_2K-JPG/Fabric026_2K_Color.jpg": "./src/materials/Fabric026_2K-JPG/Fabric026_2K_Color.jpg",
	"./Fabric026_2K-JPG/Fabric026_2K_Normal.jpg": "./src/materials/Fabric026_2K-JPG/Fabric026_2K_Normal.jpg",
	"./Fabric026_2K-JPG/Fabric026_2K_Roughness.jpg": "./src/materials/Fabric026_2K-JPG/Fabric026_2K_Roughness.jpg",
	"./Metal009_2K-JPG/Metal009_2K_Color.jpg": "./src/materials/Metal009_2K-JPG/Metal009_2K_Color.jpg",
	"./Metal009_2K-JPG/Metal009_2K_Metalness.jpg": "./src/materials/Metal009_2K-JPG/Metal009_2K_Metalness.jpg",
	"./Metal009_2K-JPG/Metal009_2K_Normal.jpg": "./src/materials/Metal009_2K-JPG/Metal009_2K_Normal.jpg",
	"./Metal009_2K-JPG/Metal009_2K_Roughness.jpg": "./src/materials/Metal009_2K-JPG/Metal009_2K_Roughness.jpg",
	"./Metal035_2K-JPG/Metal035_2K_Color.jpg": "./src/materials/Metal035_2K-JPG/Metal035_2K_Color.jpg",
	"./Metal035_2K-JPG/Metal035_2K_Metalness.jpg": "./src/materials/Metal035_2K-JPG/Metal035_2K_Metalness.jpg",
	"./Metal035_2K-JPG/Metal035_2K_Normal.jpg": "./src/materials/Metal035_2K-JPG/Metal035_2K_Normal.jpg",
	"./Metal035_2K-JPG/Metal035_2K_Roughness.jpg": "./src/materials/Metal035_2K-JPG/Metal035_2K_Roughness.jpg",
	"./Plastic_2K-JPG/Plastic_basecolor.jpg": "./src/materials/Plastic_2K-JPG/Plastic_basecolor.jpg",
	"./Plastic_2K-JPG/Plastic_normal.jpg": "./src/materials/Plastic_2K-JPG/Plastic_normal.jpg",
	"./Plastic_2K-JPG/Plastic_roughness.jpg": "./src/materials/Plastic_2K-JPG/Plastic_roughness.jpg",
	"./Snow003_2K-JPG/Snow003_2K_Color.jpg": "./src/materials/Snow003_2K-JPG/Snow003_2K_Color.jpg",
	"./Snow003_2K-JPG/Snow003_2K_Displacement.jpg": "./src/materials/Snow003_2K-JPG/Snow003_2K_Displacement.jpg",
	"./Snow003_2K-JPG/Snow003_2K_Normal.jpg": "./src/materials/Snow003_2K-JPG/Snow003_2K_Normal.jpg",
	"./Snow003_2K-JPG/Snow003_2K_Roughness.jpg": "./src/materials/Snow003_2K-JPG/Snow003_2K_Roughness.jpg",
	"./Snow004_2K-JPG/Snow004_2K_Color.jpg": "./src/materials/Snow004_2K-JPG/Snow004_2K_Color.jpg",
	"./Snow004_2K-JPG/Snow004_2K_Displacement.jpg": "./src/materials/Snow004_2K-JPG/Snow004_2K_Displacement.jpg",
	"./Snow004_2K-JPG/Snow004_2K_Normal.jpg": "./src/materials/Snow004_2K-JPG/Snow004_2K_Normal.jpg",
	"./Snow004_2K-JPG/Snow004_2K_Roughness.jpg": "./src/materials/Snow004_2K-JPG/Snow004_2K_Roughness.jpg",
	"./Wood027_2K-JPG/Wood027_2K_Color.jpg": "./src/materials/Wood027_2K-JPG/Wood027_2K_Color.jpg",
	"./Wood027_2K-JPG/Wood027_2K_Normal.jpg": "./src/materials/Wood027_2K-JPG/Wood027_2K_Normal.jpg",
	"./Wood027_2K-JPG/Wood027_2K_Roughness.jpg": "./src/materials/Wood027_2K-JPG/Wood027_2K_Roughness.jpg",
	"./WoodFloor041_2K-JPG/WoodFloor041_2K_AmbientOcclusion.jpg": "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_AmbientOcclusion.jpg",
	"./WoodFloor041_2K-JPG/WoodFloor041_2K_Color.jpg": "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Color.jpg",
	"./WoodFloor041_2K-JPG/WoodFloor041_2K_Normal.jpg": "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Normal.jpg",
	"./WoodFloor041_2K-JPG/WoodFloor041_2K_Roughness.jpg": "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Roughness.jpg",
	"./aerial_grass_rock_2k_jpg/aerial_grass_rock_ao_2k.jpg": "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_ao_2k.jpg",
	"./aerial_grass_rock_2k_jpg/aerial_grass_rock_diff_2k.jpg": "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_diff_2k.jpg",
	"./aerial_grass_rock_2k_jpg/aerial_grass_rock_nor_2k.jpg": "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_nor_2k.jpg",
	"./aerial_grass_rock_2k_jpg/aerial_grass_rock_rough_2k.jpg": "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_rough_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_ao_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_ao_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_diff_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_diff_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_disp_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_disp_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_nor_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_nor_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_rough_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_rough_2k.jpg",
	"./brown_planks_04_2k_jpg/brown_planks_04_ao_2k.jpg": "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_ao_2k.jpg",
	"./brown_planks_04_2k_jpg/brown_planks_04_diff_2k.jpg": "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_diff_2k.jpg",
	"./brown_planks_04_2k_jpg/brown_planks_04_nor_2k.jpg": "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_nor_2k.jpg",
	"./brown_planks_04_2k_jpg/brown_planks_04_rough_2k.jpg": "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_rough_2k.jpg",
	"./forrest_ground_03_2k_jpg/forrest_ground_03_AO_2k.jpg": "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_AO_2k.jpg",
	"./forrest_ground_03_2k_jpg/forrest_ground_03_diff_2k.jpg": "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_diff_2k.jpg",
	"./forrest_ground_03_2k_jpg/forrest_ground_03_nor_2k.jpg": "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_nor_2k.jpg",
	"./forrest_ground_03_2k_jpg/forrest_ground_03_rough_2k.jpg": "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_rough_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_ao_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_ao_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_diff_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_diff_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_disp_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_disp_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_nor_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_nor_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_rough_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_rough_2k.jpg",
	"./rock_05_2k_jpg/rock_05_ao_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_ao_2k.jpg",
	"./rock_05_2k_jpg/rock_05_diff_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_diff_2k.jpg",
	"./rock_05_2k_jpg/rock_05_disp_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_disp_2k.jpg",
	"./rock_05_2k_jpg/rock_05_nor_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_nor_2k.jpg",
	"./rock_05_2k_jpg/rock_05_rough_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_rough_2k.jpg",
	"./sandstone_cracks_2k_jpg/sandstone_cracks_AO_2k.jpg": "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_AO_2k.jpg",
	"./sandstone_cracks_2k_jpg/sandstone_cracks_diff_2k.jpg": "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_diff_2k.jpg",
	"./sandstone_cracks_2k_jpg/sandstone_cracks_nor_2k.jpg": "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_nor_2k.jpg",
	"./sandstone_cracks_2k_jpg/sandstone_cracks_rough_2k.jpg": "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_rough_2k.jpg"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/materials sync recursive .*";

/***/ }),

/***/ "./src/materials sync recursive ^\\.\\/.*\\/.*$":
/*!*****************************************!*\
  !*** ./src/materials sync ^\.\/.*\/.*$ ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./Fabric026_2K-JPG/Fabric026_2K_Color.jpg": "./src/materials/Fabric026_2K-JPG/Fabric026_2K_Color.jpg",
	"./Fabric026_2K-JPG/Fabric026_2K_Normal.jpg": "./src/materials/Fabric026_2K-JPG/Fabric026_2K_Normal.jpg",
	"./Fabric026_2K-JPG/Fabric026_2K_Roughness.jpg": "./src/materials/Fabric026_2K-JPG/Fabric026_2K_Roughness.jpg",
	"./Metal009_2K-JPG/Metal009_2K_Color.jpg": "./src/materials/Metal009_2K-JPG/Metal009_2K_Color.jpg",
	"./Metal009_2K-JPG/Metal009_2K_Metalness.jpg": "./src/materials/Metal009_2K-JPG/Metal009_2K_Metalness.jpg",
	"./Metal009_2K-JPG/Metal009_2K_Normal.jpg": "./src/materials/Metal009_2K-JPG/Metal009_2K_Normal.jpg",
	"./Metal009_2K-JPG/Metal009_2K_Roughness.jpg": "./src/materials/Metal009_2K-JPG/Metal009_2K_Roughness.jpg",
	"./Metal035_2K-JPG/Metal035_2K_Color.jpg": "./src/materials/Metal035_2K-JPG/Metal035_2K_Color.jpg",
	"./Metal035_2K-JPG/Metal035_2K_Metalness.jpg": "./src/materials/Metal035_2K-JPG/Metal035_2K_Metalness.jpg",
	"./Metal035_2K-JPG/Metal035_2K_Normal.jpg": "./src/materials/Metal035_2K-JPG/Metal035_2K_Normal.jpg",
	"./Metal035_2K-JPG/Metal035_2K_Roughness.jpg": "./src/materials/Metal035_2K-JPG/Metal035_2K_Roughness.jpg",
	"./Plastic_2K-JPG/Plastic_basecolor.jpg": "./src/materials/Plastic_2K-JPG/Plastic_basecolor.jpg",
	"./Plastic_2K-JPG/Plastic_normal.jpg": "./src/materials/Plastic_2K-JPG/Plastic_normal.jpg",
	"./Plastic_2K-JPG/Plastic_roughness.jpg": "./src/materials/Plastic_2K-JPG/Plastic_roughness.jpg",
	"./Snow003_2K-JPG/Snow003_2K_Color.jpg": "./src/materials/Snow003_2K-JPG/Snow003_2K_Color.jpg",
	"./Snow003_2K-JPG/Snow003_2K_Displacement.jpg": "./src/materials/Snow003_2K-JPG/Snow003_2K_Displacement.jpg",
	"./Snow003_2K-JPG/Snow003_2K_Normal.jpg": "./src/materials/Snow003_2K-JPG/Snow003_2K_Normal.jpg",
	"./Snow003_2K-JPG/Snow003_2K_Roughness.jpg": "./src/materials/Snow003_2K-JPG/Snow003_2K_Roughness.jpg",
	"./Snow004_2K-JPG/Snow004_2K_Color.jpg": "./src/materials/Snow004_2K-JPG/Snow004_2K_Color.jpg",
	"./Snow004_2K-JPG/Snow004_2K_Displacement.jpg": "./src/materials/Snow004_2K-JPG/Snow004_2K_Displacement.jpg",
	"./Snow004_2K-JPG/Snow004_2K_Normal.jpg": "./src/materials/Snow004_2K-JPG/Snow004_2K_Normal.jpg",
	"./Snow004_2K-JPG/Snow004_2K_Roughness.jpg": "./src/materials/Snow004_2K-JPG/Snow004_2K_Roughness.jpg",
	"./Wood027_2K-JPG/Wood027_2K_Color.jpg": "./src/materials/Wood027_2K-JPG/Wood027_2K_Color.jpg",
	"./Wood027_2K-JPG/Wood027_2K_Normal.jpg": "./src/materials/Wood027_2K-JPG/Wood027_2K_Normal.jpg",
	"./Wood027_2K-JPG/Wood027_2K_Roughness.jpg": "./src/materials/Wood027_2K-JPG/Wood027_2K_Roughness.jpg",
	"./WoodFloor041_2K-JPG/WoodFloor041_2K_AmbientOcclusion.jpg": "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_AmbientOcclusion.jpg",
	"./WoodFloor041_2K-JPG/WoodFloor041_2K_Color.jpg": "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Color.jpg",
	"./WoodFloor041_2K-JPG/WoodFloor041_2K_Normal.jpg": "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Normal.jpg",
	"./WoodFloor041_2K-JPG/WoodFloor041_2K_Roughness.jpg": "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Roughness.jpg",
	"./aerial_grass_rock_2k_jpg/aerial_grass_rock_ao_2k.jpg": "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_ao_2k.jpg",
	"./aerial_grass_rock_2k_jpg/aerial_grass_rock_diff_2k.jpg": "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_diff_2k.jpg",
	"./aerial_grass_rock_2k_jpg/aerial_grass_rock_nor_2k.jpg": "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_nor_2k.jpg",
	"./aerial_grass_rock_2k_jpg/aerial_grass_rock_rough_2k.jpg": "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_rough_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_ao_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_ao_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_diff_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_diff_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_disp_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_disp_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_nor_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_nor_2k.jpg",
	"./bark_brown_02_2k_jpg/bark_brown_02_rough_2k.jpg": "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_rough_2k.jpg",
	"./brown_planks_04_2k_jpg/brown_planks_04_ao_2k.jpg": "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_ao_2k.jpg",
	"./brown_planks_04_2k_jpg/brown_planks_04_diff_2k.jpg": "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_diff_2k.jpg",
	"./brown_planks_04_2k_jpg/brown_planks_04_nor_2k.jpg": "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_nor_2k.jpg",
	"./brown_planks_04_2k_jpg/brown_planks_04_rough_2k.jpg": "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_rough_2k.jpg",
	"./forrest_ground_03_2k_jpg/forrest_ground_03_AO_2k.jpg": "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_AO_2k.jpg",
	"./forrest_ground_03_2k_jpg/forrest_ground_03_diff_2k.jpg": "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_diff_2k.jpg",
	"./forrest_ground_03_2k_jpg/forrest_ground_03_nor_2k.jpg": "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_nor_2k.jpg",
	"./forrest_ground_03_2k_jpg/forrest_ground_03_rough_2k.jpg": "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_rough_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_ao_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_ao_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_diff_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_diff_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_disp_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_disp_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_nor_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_nor_2k.jpg",
	"./mossy_rock_2k_jpg/mossy_rock_rough_2k.jpg": "./src/materials/mossy_rock_2k_jpg/mossy_rock_rough_2k.jpg",
	"./rock_05_2k_jpg/rock_05_ao_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_ao_2k.jpg",
	"./rock_05_2k_jpg/rock_05_diff_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_diff_2k.jpg",
	"./rock_05_2k_jpg/rock_05_disp_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_disp_2k.jpg",
	"./rock_05_2k_jpg/rock_05_nor_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_nor_2k.jpg",
	"./rock_05_2k_jpg/rock_05_rough_2k.jpg": "./src/materials/rock_05_2k_jpg/rock_05_rough_2k.jpg",
	"./sandstone_cracks_2k_jpg/sandstone_cracks_AO_2k.jpg": "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_AO_2k.jpg",
	"./sandstone_cracks_2k_jpg/sandstone_cracks_diff_2k.jpg": "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_diff_2k.jpg",
	"./sandstone_cracks_2k_jpg/sandstone_cracks_nor_2k.jpg": "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_nor_2k.jpg",
	"./sandstone_cracks_2k_jpg/sandstone_cracks_rough_2k.jpg": "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_rough_2k.jpg"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/materials sync recursive ^\\.\\/.*\\/.*$";

/***/ }),

/***/ "./src/materials/Fabric026_2K-JPG/Fabric026_2K_Color.jpg":
/*!***************************************************************!*\
  !*** ./src/materials/Fabric026_2K-JPG/Fabric026_2K_Color.jpg ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Fabric026_2K-JPG/Fabric026_2K_Color.jpg";

/***/ }),

/***/ "./src/materials/Fabric026_2K-JPG/Fabric026_2K_Normal.jpg":
/*!****************************************************************!*\
  !*** ./src/materials/Fabric026_2K-JPG/Fabric026_2K_Normal.jpg ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Fabric026_2K-JPG/Fabric026_2K_Normal.jpg";

/***/ }),

/***/ "./src/materials/Fabric026_2K-JPG/Fabric026_2K_Roughness.jpg":
/*!*******************************************************************!*\
  !*** ./src/materials/Fabric026_2K-JPG/Fabric026_2K_Roughness.jpg ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Fabric026_2K-JPG/Fabric026_2K_Roughness.jpg";

/***/ }),

/***/ "./src/materials/Metal009_2K-JPG/Metal009_2K_Color.jpg":
/*!*************************************************************!*\
  !*** ./src/materials/Metal009_2K-JPG/Metal009_2K_Color.jpg ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Metal009_2K-JPG/Metal009_2K_Color.jpg";

/***/ }),

/***/ "./src/materials/Metal009_2K-JPG/Metal009_2K_Metalness.jpg":
/*!*****************************************************************!*\
  !*** ./src/materials/Metal009_2K-JPG/Metal009_2K_Metalness.jpg ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Metal009_2K-JPG/Metal009_2K_Metalness.jpg";

/***/ }),

/***/ "./src/materials/Metal009_2K-JPG/Metal009_2K_Normal.jpg":
/*!**************************************************************!*\
  !*** ./src/materials/Metal009_2K-JPG/Metal009_2K_Normal.jpg ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Metal009_2K-JPG/Metal009_2K_Normal.jpg";

/***/ }),

/***/ "./src/materials/Metal009_2K-JPG/Metal009_2K_Roughness.jpg":
/*!*****************************************************************!*\
  !*** ./src/materials/Metal009_2K-JPG/Metal009_2K_Roughness.jpg ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Metal009_2K-JPG/Metal009_2K_Roughness.jpg";

/***/ }),

/***/ "./src/materials/Metal035_2K-JPG/Metal035_2K_Color.jpg":
/*!*************************************************************!*\
  !*** ./src/materials/Metal035_2K-JPG/Metal035_2K_Color.jpg ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Metal035_2K-JPG/Metal035_2K_Color.jpg";

/***/ }),

/***/ "./src/materials/Metal035_2K-JPG/Metal035_2K_Metalness.jpg":
/*!*****************************************************************!*\
  !*** ./src/materials/Metal035_2K-JPG/Metal035_2K_Metalness.jpg ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Metal035_2K-JPG/Metal035_2K_Metalness.jpg";

/***/ }),

/***/ "./src/materials/Metal035_2K-JPG/Metal035_2K_Normal.jpg":
/*!**************************************************************!*\
  !*** ./src/materials/Metal035_2K-JPG/Metal035_2K_Normal.jpg ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Metal035_2K-JPG/Metal035_2K_Normal.jpg";

/***/ }),

/***/ "./src/materials/Metal035_2K-JPG/Metal035_2K_Roughness.jpg":
/*!*****************************************************************!*\
  !*** ./src/materials/Metal035_2K-JPG/Metal035_2K_Roughness.jpg ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Metal035_2K-JPG/Metal035_2K_Roughness.jpg";

/***/ }),

/***/ "./src/materials/Plastic_2K-JPG/Plastic_basecolor.jpg":
/*!************************************************************!*\
  !*** ./src/materials/Plastic_2K-JPG/Plastic_basecolor.jpg ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Plastic_2K-JPG/Plastic_basecolor.jpg";

/***/ }),

/***/ "./src/materials/Plastic_2K-JPG/Plastic_normal.jpg":
/*!*********************************************************!*\
  !*** ./src/materials/Plastic_2K-JPG/Plastic_normal.jpg ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Plastic_2K-JPG/Plastic_normal.jpg";

/***/ }),

/***/ "./src/materials/Plastic_2K-JPG/Plastic_roughness.jpg":
/*!************************************************************!*\
  !*** ./src/materials/Plastic_2K-JPG/Plastic_roughness.jpg ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Plastic_2K-JPG/Plastic_roughness.jpg";

/***/ }),

/***/ "./src/materials/Snow003_2K-JPG/Snow003_2K_Color.jpg":
/*!***********************************************************!*\
  !*** ./src/materials/Snow003_2K-JPG/Snow003_2K_Color.jpg ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Snow003_2K-JPG/Snow003_2K_Color.jpg";

/***/ }),

/***/ "./src/materials/Snow003_2K-JPG/Snow003_2K_Displacement.jpg":
/*!******************************************************************!*\
  !*** ./src/materials/Snow003_2K-JPG/Snow003_2K_Displacement.jpg ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Snow003_2K-JPG/Snow003_2K_Displacement.jpg";

/***/ }),

/***/ "./src/materials/Snow003_2K-JPG/Snow003_2K_Normal.jpg":
/*!************************************************************!*\
  !*** ./src/materials/Snow003_2K-JPG/Snow003_2K_Normal.jpg ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Snow003_2K-JPG/Snow003_2K_Normal.jpg";

/***/ }),

/***/ "./src/materials/Snow003_2K-JPG/Snow003_2K_Roughness.jpg":
/*!***************************************************************!*\
  !*** ./src/materials/Snow003_2K-JPG/Snow003_2K_Roughness.jpg ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Snow003_2K-JPG/Snow003_2K_Roughness.jpg";

/***/ }),

/***/ "./src/materials/Snow004_2K-JPG/Snow004_2K_Color.jpg":
/*!***********************************************************!*\
  !*** ./src/materials/Snow004_2K-JPG/Snow004_2K_Color.jpg ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Snow004_2K-JPG/Snow004_2K_Color.jpg";

/***/ }),

/***/ "./src/materials/Snow004_2K-JPG/Snow004_2K_Displacement.jpg":
/*!******************************************************************!*\
  !*** ./src/materials/Snow004_2K-JPG/Snow004_2K_Displacement.jpg ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Snow004_2K-JPG/Snow004_2K_Displacement.jpg";

/***/ }),

/***/ "./src/materials/Snow004_2K-JPG/Snow004_2K_Normal.jpg":
/*!************************************************************!*\
  !*** ./src/materials/Snow004_2K-JPG/Snow004_2K_Normal.jpg ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Snow004_2K-JPG/Snow004_2K_Normal.jpg";

/***/ }),

/***/ "./src/materials/Snow004_2K-JPG/Snow004_2K_Roughness.jpg":
/*!***************************************************************!*\
  !*** ./src/materials/Snow004_2K-JPG/Snow004_2K_Roughness.jpg ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Snow004_2K-JPG/Snow004_2K_Roughness.jpg";

/***/ }),

/***/ "./src/materials/Wood027_2K-JPG/Wood027_2K_Color.jpg":
/*!***********************************************************!*\
  !*** ./src/materials/Wood027_2K-JPG/Wood027_2K_Color.jpg ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Wood027_2K-JPG/Wood027_2K_Color.jpg";

/***/ }),

/***/ "./src/materials/Wood027_2K-JPG/Wood027_2K_Normal.jpg":
/*!************************************************************!*\
  !*** ./src/materials/Wood027_2K-JPG/Wood027_2K_Normal.jpg ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Wood027_2K-JPG/Wood027_2K_Normal.jpg";

/***/ }),

/***/ "./src/materials/Wood027_2K-JPG/Wood027_2K_Roughness.jpg":
/*!***************************************************************!*\
  !*** ./src/materials/Wood027_2K-JPG/Wood027_2K_Roughness.jpg ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/Wood027_2K-JPG/Wood027_2K_Roughness.jpg";

/***/ }),

/***/ "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_AmbientOcclusion.jpg":
/*!********************************************************************************!*\
  !*** ./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_AmbientOcclusion.jpg ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/WoodFloor041_2K-JPG/WoodFloor041_2K_AmbientOcclusion.jpg";

/***/ }),

/***/ "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Color.jpg":
/*!*********************************************************************!*\
  !*** ./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Color.jpg ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/WoodFloor041_2K-JPG/WoodFloor041_2K_Color.jpg";

/***/ }),

/***/ "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Normal.jpg":
/*!**********************************************************************!*\
  !*** ./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Normal.jpg ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/WoodFloor041_2K-JPG/WoodFloor041_2K_Normal.jpg";

/***/ }),

/***/ "./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Roughness.jpg":
/*!*************************************************************************!*\
  !*** ./src/materials/WoodFloor041_2K-JPG/WoodFloor041_2K_Roughness.jpg ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/WoodFloor041_2K-JPG/WoodFloor041_2K_Roughness.jpg";

/***/ }),

/***/ "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_ao_2k.jpg":
/*!****************************************************************************!*\
  !*** ./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_ao_2k.jpg ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/aerial_grass_rock_2k_jpg/aerial_grass_rock_ao_2k.jpg";

/***/ }),

/***/ "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_diff_2k.jpg":
/*!******************************************************************************!*\
  !*** ./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_diff_2k.jpg ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/aerial_grass_rock_2k_jpg/aerial_grass_rock_diff_2k.jpg";

/***/ }),

/***/ "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_nor_2k.jpg":
/*!*****************************************************************************!*\
  !*** ./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_nor_2k.jpg ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/aerial_grass_rock_2k_jpg/aerial_grass_rock_nor_2k.jpg";

/***/ }),

/***/ "./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_rough_2k.jpg":
/*!*******************************************************************************!*\
  !*** ./src/materials/aerial_grass_rock_2k_jpg/aerial_grass_rock_rough_2k.jpg ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/aerial_grass_rock_2k_jpg/aerial_grass_rock_rough_2k.jpg";

/***/ }),

/***/ "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_ao_2k.jpg":
/*!********************************************************************!*\
  !*** ./src/materials/bark_brown_02_2k_jpg/bark_brown_02_ao_2k.jpg ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/bark_brown_02_2k_jpg/bark_brown_02_ao_2k.jpg";

/***/ }),

/***/ "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_diff_2k.jpg":
/*!**********************************************************************!*\
  !*** ./src/materials/bark_brown_02_2k_jpg/bark_brown_02_diff_2k.jpg ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/bark_brown_02_2k_jpg/bark_brown_02_diff_2k.jpg";

/***/ }),

/***/ "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_disp_2k.jpg":
/*!**********************************************************************!*\
  !*** ./src/materials/bark_brown_02_2k_jpg/bark_brown_02_disp_2k.jpg ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/bark_brown_02_2k_jpg/bark_brown_02_disp_2k.jpg";

/***/ }),

/***/ "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_nor_2k.jpg":
/*!*********************************************************************!*\
  !*** ./src/materials/bark_brown_02_2k_jpg/bark_brown_02_nor_2k.jpg ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/bark_brown_02_2k_jpg/bark_brown_02_nor_2k.jpg";

/***/ }),

/***/ "./src/materials/bark_brown_02_2k_jpg/bark_brown_02_rough_2k.jpg":
/*!***********************************************************************!*\
  !*** ./src/materials/bark_brown_02_2k_jpg/bark_brown_02_rough_2k.jpg ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/bark_brown_02_2k_jpg/bark_brown_02_rough_2k.jpg";

/***/ }),

/***/ "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_ao_2k.jpg":
/*!************************************************************************!*\
  !*** ./src/materials/brown_planks_04_2k_jpg/brown_planks_04_ao_2k.jpg ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/brown_planks_04_2k_jpg/brown_planks_04_ao_2k.jpg";

/***/ }),

/***/ "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_diff_2k.jpg":
/*!**************************************************************************!*\
  !*** ./src/materials/brown_planks_04_2k_jpg/brown_planks_04_diff_2k.jpg ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/brown_planks_04_2k_jpg/brown_planks_04_diff_2k.jpg";

/***/ }),

/***/ "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_nor_2k.jpg":
/*!*************************************************************************!*\
  !*** ./src/materials/brown_planks_04_2k_jpg/brown_planks_04_nor_2k.jpg ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/brown_planks_04_2k_jpg/brown_planks_04_nor_2k.jpg";

/***/ }),

/***/ "./src/materials/brown_planks_04_2k_jpg/brown_planks_04_rough_2k.jpg":
/*!***************************************************************************!*\
  !*** ./src/materials/brown_planks_04_2k_jpg/brown_planks_04_rough_2k.jpg ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/brown_planks_04_2k_jpg/brown_planks_04_rough_2k.jpg";

/***/ }),

/***/ "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_AO_2k.jpg":
/*!****************************************************************************!*\
  !*** ./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_AO_2k.jpg ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/forrest_ground_03_2k_jpg/forrest_ground_03_AO_2k.jpg";

/***/ }),

/***/ "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_diff_2k.jpg":
/*!******************************************************************************!*\
  !*** ./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_diff_2k.jpg ***!
  \******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/forrest_ground_03_2k_jpg/forrest_ground_03_diff_2k.jpg";

/***/ }),

/***/ "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_nor_2k.jpg":
/*!*****************************************************************************!*\
  !*** ./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_nor_2k.jpg ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/forrest_ground_03_2k_jpg/forrest_ground_03_nor_2k.jpg";

/***/ }),

/***/ "./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_rough_2k.jpg":
/*!*******************************************************************************!*\
  !*** ./src/materials/forrest_ground_03_2k_jpg/forrest_ground_03_rough_2k.jpg ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/forrest_ground_03_2k_jpg/forrest_ground_03_rough_2k.jpg";

/***/ }),

/***/ "./src/materials/mossy_rock_2k_jpg/mossy_rock_ao_2k.jpg":
/*!**************************************************************!*\
  !*** ./src/materials/mossy_rock_2k_jpg/mossy_rock_ao_2k.jpg ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/mossy_rock_2k_jpg/mossy_rock_ao_2k.jpg";

/***/ }),

/***/ "./src/materials/mossy_rock_2k_jpg/mossy_rock_diff_2k.jpg":
/*!****************************************************************!*\
  !*** ./src/materials/mossy_rock_2k_jpg/mossy_rock_diff_2k.jpg ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/mossy_rock_2k_jpg/mossy_rock_diff_2k.jpg";

/***/ }),

/***/ "./src/materials/mossy_rock_2k_jpg/mossy_rock_disp_2k.jpg":
/*!****************************************************************!*\
  !*** ./src/materials/mossy_rock_2k_jpg/mossy_rock_disp_2k.jpg ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/mossy_rock_2k_jpg/mossy_rock_disp_2k.jpg";

/***/ }),

/***/ "./src/materials/mossy_rock_2k_jpg/mossy_rock_nor_2k.jpg":
/*!***************************************************************!*\
  !*** ./src/materials/mossy_rock_2k_jpg/mossy_rock_nor_2k.jpg ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/mossy_rock_2k_jpg/mossy_rock_nor_2k.jpg";

/***/ }),

/***/ "./src/materials/mossy_rock_2k_jpg/mossy_rock_rough_2k.jpg":
/*!*****************************************************************!*\
  !*** ./src/materials/mossy_rock_2k_jpg/mossy_rock_rough_2k.jpg ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/mossy_rock_2k_jpg/mossy_rock_rough_2k.jpg";

/***/ }),

/***/ "./src/materials/rock_05_2k_jpg/rock_05_ao_2k.jpg":
/*!********************************************************!*\
  !*** ./src/materials/rock_05_2k_jpg/rock_05_ao_2k.jpg ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/rock_05_2k_jpg/rock_05_ao_2k.jpg";

/***/ }),

/***/ "./src/materials/rock_05_2k_jpg/rock_05_diff_2k.jpg":
/*!**********************************************************!*\
  !*** ./src/materials/rock_05_2k_jpg/rock_05_diff_2k.jpg ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/rock_05_2k_jpg/rock_05_diff_2k.jpg";

/***/ }),

/***/ "./src/materials/rock_05_2k_jpg/rock_05_disp_2k.jpg":
/*!**********************************************************!*\
  !*** ./src/materials/rock_05_2k_jpg/rock_05_disp_2k.jpg ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/rock_05_2k_jpg/rock_05_disp_2k.jpg";

/***/ }),

/***/ "./src/materials/rock_05_2k_jpg/rock_05_nor_2k.jpg":
/*!*********************************************************!*\
  !*** ./src/materials/rock_05_2k_jpg/rock_05_nor_2k.jpg ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/rock_05_2k_jpg/rock_05_nor_2k.jpg";

/***/ }),

/***/ "./src/materials/rock_05_2k_jpg/rock_05_rough_2k.jpg":
/*!***********************************************************!*\
  !*** ./src/materials/rock_05_2k_jpg/rock_05_rough_2k.jpg ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/rock_05_2k_jpg/rock_05_rough_2k.jpg";

/***/ }),

/***/ "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_AO_2k.jpg":
/*!**************************************************************************!*\
  !*** ./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_AO_2k.jpg ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/sandstone_cracks_2k_jpg/sandstone_cracks_AO_2k.jpg";

/***/ }),

/***/ "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_diff_2k.jpg":
/*!****************************************************************************!*\
  !*** ./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_diff_2k.jpg ***!
  \****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/sandstone_cracks_2k_jpg/sandstone_cracks_diff_2k.jpg";

/***/ }),

/***/ "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_nor_2k.jpg":
/*!***************************************************************************!*\
  !*** ./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_nor_2k.jpg ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/sandstone_cracks_2k_jpg/sandstone_cracks_nor_2k.jpg";

/***/ }),

/***/ "./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_rough_2k.jpg":
/*!*****************************************************************************!*\
  !*** ./src/materials/sandstone_cracks_2k_jpg/sandstone_cracks_rough_2k.jpg ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/sandstone_cracks_2k_jpg/sandstone_cracks_rough_2k.jpg";

/***/ }),

/***/ "./src/models sync recursive .*":
/*!****************************!*\
  !*** ./src/models sync .* ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./column.glb": "./src/models/column.glb",
	"./pillar.glb": "./src/models/pillar.glb",
	"./rock.glb": "./src/models/rock.glb",
	"./stone.glb": "./src/models/stone.glb"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/models sync recursive .*";

/***/ }),

/***/ "./src/models sync recursive ^\\.\\/.*$":
/*!**********************************!*\
  !*** ./src/models sync ^\.\/.*$ ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./column.glb": "./src/models/column.glb",
	"./pillar.glb": "./src/models/pillar.glb",
	"./rock.glb": "./src/models/rock.glb",
	"./stone.glb": "./src/models/stone.glb"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./src/models sync recursive ^\\.\\/.*$";

/***/ }),

/***/ "./src/models/column.glb":
/*!*******************************!*\
  !*** ./src/models/column.glb ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/models/column.glb";

/***/ }),

/***/ "./src/models/pillar.glb":
/*!*******************************!*\
  !*** ./src/models/pillar.glb ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/models/pillar.glb";

/***/ }),

/***/ "./src/models/rock.glb":
/*!*****************************!*\
  !*** ./src/models/rock.glb ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/models/rock.glb";

/***/ }),

/***/ "./src/models/stone.glb":
/*!******************************!*\
  !*** ./src/models/stone.glb ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__.p + "asset/models/stone.glb";

/***/ }),

/***/ "./src/pb-matcap.js":
/*!**************************!*\
  !*** ./src/pb-matcap.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

const MATCAPS = {}

for (let fileName of __webpack_require__("./src/matcap sync recursive .*\\.jpg").keys()) {
  let [dot, folder, file] = fileName.split('/')
  // let name = folder.match(/(.*?)[-_]\d+k/i)[1]
  name = folder;
  if (!(name in MATCAPS))
  {
    MATCAPS[name] = {}
  }
  let matcap = file.match(/(.*?)\.jpg/)[1];
  MATCAPS[name][matcap] = __webpack_require__("./src/matcap sync recursive ^\\.\\/.*\\/.*$")(`./${folder}/${file}`)
}

const MATCAP_TEXTURES = ["roughDialectric", "smoothDialectric", "roughMetallic", "smoothMetallic"];

AFRAME.registerShader('pbmatcap', {
  schema: {
    color: {type: 'color', is: 'uniform'},
    opacity: {type: 'number', is: 'uniform', default: 1.0},
    src: {type: 'map', is: 'uniform'},
    metalnessMap: {type: 'map', is: 'uniform'},
    roughnessMap: {type: 'map', is: 'uniform'},
    normalMap: {type: 'map', is: 'uniform'},
    normalScale: {type: 'vec2', is: 'uniform', default: new THREE.Vector2(1.0, 1.0)},
    ambientOcclusionMap: {type: 'map', is: 'uniform'},
    displacementMap: {type: 'map', is: 'uniform'},
    displacementScale: {type: 'number', is: 'uniform', default: 1.0},
    displacementBias: {type: 'number', is: 'uniform', default: 0.5},

    metalness: {type: 'number', is: 'uniform', default: 0.0},
    roughness: {type: 'number', is: 'uniform', default: 1.0},

    roughDialectric: {type: 'map', is: 'uniform'},
    smoothDialectric: {type: 'map', is: 'uniform'},
    roughMetallic: {type: 'map', is: 'uniform'},
    smoothMetallic: {type: 'map', is: 'uniform'},

    environment: {type: 'string'},

    // uv: {type: 'vec2', is: 'attribute'}
  },

  vertexShader: __webpack_require__(/*! !raw-loader!./matcap/vertexShader.glsl */ "./node_modules/raw-loader/dist/cjs.js!./src/matcap/vertexShader.glsl").default,
  fragmentShader: __webpack_require__(/*! !raw-loader!./matcap/fragmentShader.glsl */ "./node_modules/raw-loader/dist/cjs.js!./src/matcap/fragmentShader.glsl").default,

  init(data) {
    this.attributes = this.initVariables(data, 'attribute');
    this.uniforms = this.initVariables(data, 'uniform');
    this.uniforms.uvTransform = { value: new THREE.Matrix3() };
    this.material = new (this.raw ? THREE.RawShaderMaterial : THREE.ShaderMaterial)({
      // attributes: this.attributes,
      uniforms: this.uniforms,
      vertexShader: this.vertexShader,
      fragmentShader: this.fragmentShader,
    });
    this.material.matcap = true
    this.material.normalMapType = 0
    this.autoMatcap = {}
    return this.material;
  },
  chooseMatcaps(data) {
    if (!data) return "default"
    if (data.environment) return data.environment;
    if (!this.el.sceneEl.systems.enviropack) return "default";
    if (!this.el.sceneEl.systems.enviropack.enviropack) return "default";
    if (this.el.sceneEl.systems.enviropack.enviropack.data.preset in MATCAPS) return this.el.sceneEl.systems.enviropack.enviropack.data.preset;
    return "default"
  },
  update(data) {
    let environment = this.chooseMatcaps(data)
    for (let matcapMap of MATCAP_TEXTURES)
    {
      if (data && (!data[matcapMap] || this.autoMatcap[matcapMap]))
      {
        data[matcapMap] = this.el.sceneEl.systems['enviropack'].url(MATCAPS[environment][matcapMap])
        this.autoMatcap[matcapMap] = true;
      }
    }
    this.updateVariables(data, 'attribute');
    this.updateVariables(data, 'uniform');

    if (this.material.map)
    {
      this.material.map.updateMatrix()
      this.material.uniforms.uvTransform.value.copy(this.material.map.matrix)
    }
  },
  setMapOnTextureLoad: function (variables, key, materialKey) {
    var self = this;
    this.el.addEventListener('materialtextureloaded', (e) => {
      if (key === 'src') {
        variables.map = variables.src
        key = 'map';
      }

      if (self.material[materialKey])
      {
        self.material[key] = self.material[materialKey];
        self.el.sceneEl.systems.renderer.applyColorCorrection(self.material[key])
        self.material.needsUpdate = true
      }
      variables[key].value = self.material[materialKey];
      variables[key].needsUpdate = true;

      if (this.material.map)
      {
        this.material.map.updateMatrix()
        this.material.uniforms.uvTransform.value.copy(this.material.map.matrix)
      }
    });
  }
});

class PBMatcap extends THREE.ShaderMaterial {
  constructor(parameters = {})
  {
    super(parameters)

    this.vertexShader = __webpack_require__(/*! !raw-loader!./matcap/vertexShader.glsl */ "./node_modules/raw-loader/dist/cjs.js!./src/matcap/vertexShader.glsl").default;
    this.fragmentShader = __webpack_require__(/*! !raw-loader!./matcap/fragmentShader.glsl */ "./node_modules/raw-loader/dist/cjs.js!./src/matcap/fragmentShader.glsl").default;

    this.defines = { 'MATCAP': '' };
    this.type = 'PBMatcap'

    this.matcap = null
    this.normalMapType = 0

    this.roughness = 1.0;
    this.metalness = 0.0;

    this.color = new THREE.Color( 0xffffff );
    this.opacity = 1.0;
    this.map = null;
    this.normalMap = null;
    this.normalMapScale = null;
    this.ambientOcclusionMap = null;
    this.displacementMap = null;



    let loader = new THREE.TextureLoader()
    for (let map in MATCAPS.default)
    {
      this[map] = null;
      if (map in parameters) continue;
      this[map] = loader.load(MATCAPS.default[map], (t) => {
        this[map] = t
        this.needsUpdate = true
        t.needsUpdate = true
        this.setValues()
      })
    }

    this.setValues( parameters )
  }
  copy(source) {
    super.copy(source)
  }
  setValues(parameters) {
    if (parameters)
    {
      super.setValues(parameters)
    }

    this.uniforms = {
      roughness: {value: 1.0},
      metalness: {value: 0.0},
      smoothDialectric: {value: null, type: 't'},
      roughDialectric: {value: null, type: 't'},
      smoothMetallic: {value: null, type: 't'},
      roughMetallic: {value: null, type: 't'},
    }
    this.uniforms.roughness.value = this.roughness
    this.uniforms.metalness.value = this.metalness
    this.uniforms.smoothDialectric.value = this.smoothDialectric
    this.uniforms.roughDialectric.value = this.roughDialectric
    this.uniforms.smoothMetallic.value = this.smoothMetallic
    this.uniforms.roughMetallic.value = this.roughMetallic

    this.uniformsNeedUpdate = true
  }
}

PBMatcap.MATCAPS = MATCAPS;

THREE.PBMatcap = PBMatcap;


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYWZyYW1lLWVudmlyb3BhY2tzLmpzIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vL3dlYnBhY2svYm9vdHN0cmFwIiwid2VicGFjazovLy8uL1JlYWRtZS5tZCIsIndlYnBhY2s6Ly8vLi9lbnZpcm9wYWNrcy5naWYiLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC9mcmFnbWVudFNoYWRlci5nbHNsIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvdmVydGV4U2hhZGVyLmdsc2wiLCJ3ZWJwYWNrOi8vLy4vcGFja2FnZS5qc29uIiwid2VicGFjazovLy8uL3NyYy9QTVJFTUdlbmVyYXRvci5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvUkdCRUxvYWRlci5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvYmFja3N0b3BzIHN5bmMgLioiLCJ3ZWJwYWNrOi8vLy4vc3JjL2JhY2tzdG9wcyBzeW5jIF5cXC5cXC8uKiQiLCJ3ZWJwYWNrOi8vLy4vc3JjL2JhY2tzdG9wcyBzeW5jIF5cXC5cXC8uKlxcLmpwZyQiLCJ3ZWJwYWNrOi8vLy4vc3JjL2JhY2tzdG9wcy9hYmFuZG9uZWRfdGFua19mYXJtXzAyLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvYmFja3N0b3BzL2F1dHVtbl9ob2NrZXkuanBnIiwid2VicGFjazovLy8uL3NyYy9iYWNrc3RvcHMvY29sb3JmdWxfc3R1ZGlvLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvYmFja3N0b3BzL2Rpa2hvbG9sb19uaWdodF9lZGl0LmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvYmFja3N0b3BzL2xhcmdlX2NvcnJpZG9yLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvYmFja3N0b3BzL3RoZV9za3lfaXNfb25fZmlyZS5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL2JhY2tzdG9wcy93aW50ZXJfbGFrZV8wMS5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL2Vudmlyb3BhY2stbWF0ZXJpYWwuanMiLCJ3ZWJwYWNrOi8vLy4vc3JjL2hkLWVudmlyb25tZW50LmpzIiwid2VicGFjazovLy8uL3NyYy9oZC1wcm9wcy5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvaGRyaXMgc3luYyAuKiIsIndlYnBhY2s6Ly8vLi9zcmMvaGRyaXMgc3luYyBeXFwuXFwvLiokIiwid2VicGFjazovLy8uL3NyYy9oZHJpcy9hYmFuZG9uZWRfdGFua19mYXJtXzAyXzJrLmhkciIsIndlYnBhY2s6Ly8vLi9zcmMvaGRyaXMvYXV0dW1uX2hvY2tleV8yay5oZHIiLCJ3ZWJwYWNrOi8vLy4vc3JjL2hkcmlzL2NvbG9yZnVsX3N0dWRpb18xay5oZHIiLCJ3ZWJwYWNrOi8vLy4vc3JjL2hkcmlzL2Rpa2hvbG9sb19uaWdodF9lZGl0XzFrLmhkciIsIndlYnBhY2s6Ly8vLi9zcmMvaGRyaXMvbGFyZ2VfY29ycmlkb3JfMWsuaGRyIiwid2VicGFjazovLy8uL3NyYy9oZHJpcy9tb29ubGVzc19nb2xmXzFrLmhkciIsIndlYnBhY2s6Ly8vLi9zcmMvaGRyaXMvdGhlX3NreV9pc19vbl9maXJlXzJrLmhkciIsIndlYnBhY2s6Ly8vLi9zcmMvaGRyaXMvd2ludGVyX2xha2VfMDFfMmsuaGRyIiwid2VicGFjazovLy8uL3NyYy9pbmRleC5qcyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwIHN5bmMgLipcXC5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcCBzeW5jIF5cXC5cXC8uKlxcLy4qJCIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL2F1dHVtbi9yb3VnaERpYWxlY3RyaWMuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvYXV0dW1uL3JvdWdoTWV0YWxsaWMuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvYXV0dW1uL3Ntb290aERpYWxlY3RyaWMuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvYXV0dW1uL3Ntb290aE1ldGFsbGljLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL2RlZmF1bHQvcm91Z2hEaWFsZWN0cmljLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL2RlZmF1bHQvcm91Z2hNZXRhbGxpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC9kZWZhdWx0L3Ntb290aERpYWxlY3RyaWMuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvZGVmYXVsdC9zbW9vdGhNZXRhbGxpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC9pbnRlcmlvci9yb3VnaERpYWxlY3RyaWMuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvaW50ZXJpb3Ivcm91Z2hNZXRhbGxpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC9pbnRlcmlvci9zbW9vdGhEaWFsZWN0cmljLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL2ludGVyaW9yL3Ntb290aE1ldGFsbGljLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL25pZ2h0L3JvdWdoRGlhbGVjdHJpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC9uaWdodC9yb3VnaE1ldGFsbGljLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL25pZ2h0L3Ntb290aERpYWxlY3RyaWMuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvbmlnaHQvc21vb3RoTWV0YWxsaWMuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvc2FuZHN0b25lL3JvdWdoRGlhbGVjdHJpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC9zYW5kc3RvbmUvcm91Z2hNZXRhbGxpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC9zYW5kc3RvbmUvc21vb3RoRGlhbGVjdHJpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC9zYW5kc3RvbmUvc21vb3RoTWV0YWxsaWMuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvdGFua2Zhcm0vcm91Z2hEaWFsZWN0cmljLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL3RhbmtmYXJtL3JvdWdoTWV0YWxsaWMuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRjYXAvdGFua2Zhcm0vc21vb3RoRGlhbGVjdHJpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC90YW5rZmFybS9zbW9vdGhNZXRhbGxpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGNhcC93aW50ZXIvcm91Z2hEaWFsZWN0cmljLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL3dpbnRlci9yb3VnaE1ldGFsbGljLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL3dpbnRlci9zbW9vdGhEaWFsZWN0cmljLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0Y2FwL3dpbnRlci9zbW9vdGhNZXRhbGxpYy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscyBzeW5jIC4qIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMgc3luYyBeXFwuXFwvLipcXC8uKiQiLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9GYWJyaWMwMjZfMkstSlBHL0ZhYnJpYzAyNl8yS19Db2xvci5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9GYWJyaWMwMjZfMkstSlBHL0ZhYnJpYzAyNl8yS19Ob3JtYWwuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvRmFicmljMDI2XzJLLUpQRy9GYWJyaWMwMjZfMktfUm91Z2huZXNzLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL01ldGFsMDA5XzJLLUpQRy9NZXRhbDAwOV8yS19Db2xvci5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9NZXRhbDAwOV8ySy1KUEcvTWV0YWwwMDlfMktfTWV0YWxuZXNzLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL01ldGFsMDA5XzJLLUpQRy9NZXRhbDAwOV8yS19Ob3JtYWwuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvTWV0YWwwMDlfMkstSlBHL01ldGFsMDA5XzJLX1JvdWdobmVzcy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfQ29sb3IuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvTWV0YWwwMzVfMkstSlBHL01ldGFsMDM1XzJLX01ldGFsbmVzcy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfTm9ybWFsLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL01ldGFsMDM1XzJLLUpQRy9NZXRhbDAzNV8yS19Sb3VnaG5lc3MuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvUGxhc3RpY18ySy1KUEcvUGxhc3RpY19iYXNlY29sb3IuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvUGxhc3RpY18ySy1KUEcvUGxhc3RpY19ub3JtYWwuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvUGxhc3RpY18ySy1KUEcvUGxhc3RpY19yb3VnaG5lc3MuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvU25vdzAwM18ySy1KUEcvU25vdzAwM18yS19Db2xvci5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX0Rpc3BsYWNlbWVudC5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX05vcm1hbC5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX1JvdWdobmVzcy5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9Tbm93MDA0XzJLLUpQRy9Tbm93MDA0XzJLX0NvbG9yLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfRGlzcGxhY2VtZW50LmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfTm9ybWFsLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfUm91Z2huZXNzLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL1dvb2QwMjdfMkstSlBHL1dvb2QwMjdfMktfQ29sb3IuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvV29vZDAyN18ySy1KUEcvV29vZDAyN18yS19Ob3JtYWwuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvV29vZDAyN18ySy1KUEcvV29vZDAyN18yS19Sb3VnaG5lc3MuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvV29vZEZsb29yMDQxXzJLLUpQRy9Xb29kRmxvb3IwNDFfMktfQW1iaWVudE9jY2x1c2lvbi5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9Xb29kRmxvb3IwNDFfMkstSlBHL1dvb2RGbG9vcjA0MV8yS19Db2xvci5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9Xb29kRmxvb3IwNDFfMkstSlBHL1dvb2RGbG9vcjA0MV8yS19Ob3JtYWwuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvV29vZEZsb29yMDQxXzJLLUpQRy9Xb29kRmxvb3IwNDFfMktfUm91Z2huZXNzLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL2FlcmlhbF9ncmFzc19yb2NrXzJrX2pwZy9hZXJpYWxfZ3Jhc3Nfcm9ja19hb18yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfZGlmZl8yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfbm9yXzJrLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL2FlcmlhbF9ncmFzc19yb2NrXzJrX2pwZy9hZXJpYWxfZ3Jhc3Nfcm9ja19yb3VnaF8yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2FvXzJrLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfZGlmZl8yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2Rpc3BfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvYmFya19icm93bl8wMl8ya19qcGcvYmFya19icm93bl8wMl9ub3JfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvYmFya19icm93bl8wMl8ya19qcGcvYmFya19icm93bl8wMl9yb3VnaF8yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9hb18yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9kaWZmXzJrLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL2Jyb3duX3BsYW5rc18wNF8ya19qcGcvYnJvd25fcGxhbmtzXzA0X25vcl8yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9yb3VnaF8yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfQU9fMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvZm9ycmVzdF9ncm91bmRfMDNfMmtfanBnL2ZvcnJlc3RfZ3JvdW5kXzAzX2RpZmZfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvZm9ycmVzdF9ncm91bmRfMDNfMmtfanBnL2ZvcnJlc3RfZ3JvdW5kXzAzX25vcl8yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfcm91Z2hfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19hb18yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9tb3NzeV9yb2NrXzJrX2pwZy9tb3NzeV9yb2NrX2RpZmZfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19kaXNwXzJrLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfbm9yXzJrLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfcm91Z2hfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvcm9ja18wNV8ya19qcGcvcm9ja18wNV9hb18yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9yb2NrXzA1XzJrX2pwZy9yb2NrXzA1X2RpZmZfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvcm9ja18wNV8ya19qcGcvcm9ja18wNV9kaXNwXzJrLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfbm9yXzJrLmpwZyIsIndlYnBhY2s6Ly8vLi9zcmMvbWF0ZXJpYWxzL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfcm91Z2hfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvc2FuZHN0b25lX2NyYWNrc18ya19qcGcvc2FuZHN0b25lX2NyYWNrc19BT18yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21hdGVyaWFscy9zYW5kc3RvbmVfY3JhY2tzXzJrX2pwZy9zYW5kc3RvbmVfY3JhY2tzX2RpZmZfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvc2FuZHN0b25lX2NyYWNrc18ya19qcGcvc2FuZHN0b25lX2NyYWNrc19ub3JfMmsuanBnIiwid2VicGFjazovLy8uL3NyYy9tYXRlcmlhbHMvc2FuZHN0b25lX2NyYWNrc18ya19qcGcvc2FuZHN0b25lX2NyYWNrc19yb3VnaF8yay5qcGciLCJ3ZWJwYWNrOi8vLy4vc3JjL21vZGVscyBzeW5jIC4qIiwid2VicGFjazovLy8uL3NyYy9tb2RlbHMgc3luYyBeXFwuXFwvLiokIiwid2VicGFjazovLy8uL3NyYy9tb2RlbHMvY29sdW1uLmdsYiIsIndlYnBhY2s6Ly8vLi9zcmMvbW9kZWxzL3BpbGxhci5nbGIiLCJ3ZWJwYWNrOi8vLy4vc3JjL21vZGVscy9yb2NrLmdsYiIsIndlYnBhY2s6Ly8vLi9zcmMvbW9kZWxzL3N0b25lLmdsYiIsIndlYnBhY2s6Ly8vLi9zcmMvcGItbWF0Y2FwLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIiBcdC8vIFRoZSBtb2R1bGUgY2FjaGVcbiBcdHZhciBpbnN0YWxsZWRNb2R1bGVzID0ge307XG5cbiBcdC8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG4gXHRmdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cbiBcdFx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG4gXHRcdGlmKGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdKSB7XG4gXHRcdFx0cmV0dXJuIGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdLmV4cG9ydHM7XG4gXHRcdH1cbiBcdFx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcbiBcdFx0dmFyIG1vZHVsZSA9IGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdID0ge1xuIFx0XHRcdGk6IG1vZHVsZUlkLFxuIFx0XHRcdGw6IGZhbHNlLFxuIFx0XHRcdGV4cG9ydHM6IHt9XG4gXHRcdH07XG5cbiBcdFx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG4gXHRcdG1vZHVsZXNbbW9kdWxlSWRdLmNhbGwobW9kdWxlLmV4cG9ydHMsIG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG4gXHRcdC8vIEZsYWcgdGhlIG1vZHVsZSBhcyBsb2FkZWRcbiBcdFx0bW9kdWxlLmwgPSB0cnVlO1xuXG4gXHRcdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG4gXHRcdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbiBcdH1cblxuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZXMgb2JqZWN0IChfX3dlYnBhY2tfbW9kdWxlc19fKVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5tID0gbW9kdWxlcztcblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGUgY2FjaGVcbiBcdF9fd2VicGFja19yZXF1aXJlX18uYyA9IGluc3RhbGxlZE1vZHVsZXM7XG5cbiBcdC8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb24gZm9yIGhhcm1vbnkgZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4gXHRcdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywgbmFtZSkpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgbmFtZSwgeyBlbnVtZXJhYmxlOiB0cnVlLCBnZXQ6IGdldHRlciB9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZGVmaW5lIF9fZXNNb2R1bGUgb24gZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5yID0gZnVuY3Rpb24oZXhwb3J0cykge1xuIFx0XHRpZih0eXBlb2YgU3ltYm9sICE9PSAndW5kZWZpbmVkJyAmJiBTeW1ib2wudG9TdHJpbmdUYWcpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgU3ltYm9sLnRvU3RyaW5nVGFnLCB7IHZhbHVlOiAnTW9kdWxlJyB9KTtcbiBcdFx0fVxuIFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgJ19fZXNNb2R1bGUnLCB7IHZhbHVlOiB0cnVlIH0pO1xuIFx0fTtcblxuIFx0Ly8gY3JlYXRlIGEgZmFrZSBuYW1lc3BhY2Ugb2JqZWN0XG4gXHQvLyBtb2RlICYgMTogdmFsdWUgaXMgYSBtb2R1bGUgaWQsIHJlcXVpcmUgaXRcbiBcdC8vIG1vZGUgJiAyOiBtZXJnZSBhbGwgcHJvcGVydGllcyBvZiB2YWx1ZSBpbnRvIHRoZSBuc1xuIFx0Ly8gbW9kZSAmIDQ6IHJldHVybiB2YWx1ZSB3aGVuIGFscmVhZHkgbnMgb2JqZWN0XG4gXHQvLyBtb2RlICYgOHwxOiBiZWhhdmUgbGlrZSByZXF1aXJlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnQgPSBmdW5jdGlvbih2YWx1ZSwgbW9kZSkge1xuIFx0XHRpZihtb2RlICYgMSkgdmFsdWUgPSBfX3dlYnBhY2tfcmVxdWlyZV9fKHZhbHVlKTtcbiBcdFx0aWYobW9kZSAmIDgpIHJldHVybiB2YWx1ZTtcbiBcdFx0aWYoKG1vZGUgJiA0KSAmJiB0eXBlb2YgdmFsdWUgPT09ICdvYmplY3QnICYmIHZhbHVlICYmIHZhbHVlLl9fZXNNb2R1bGUpIHJldHVybiB2YWx1ZTtcbiBcdFx0dmFyIG5zID0gT2JqZWN0LmNyZWF0ZShudWxsKTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5yKG5zKTtcbiBcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KG5zLCAnZGVmYXVsdCcsIHsgZW51bWVyYWJsZTogdHJ1ZSwgdmFsdWU6IHZhbHVlIH0pO1xuIFx0XHRpZihtb2RlICYgMiAmJiB0eXBlb2YgdmFsdWUgIT0gJ3N0cmluZycpIGZvcih2YXIga2V5IGluIHZhbHVlKSBfX3dlYnBhY2tfcmVxdWlyZV9fLmQobnMsIGtleSwgZnVuY3Rpb24oa2V5KSB7IHJldHVybiB2YWx1ZVtrZXldOyB9LmJpbmQobnVsbCwga2V5KSk7XG4gXHRcdHJldHVybiBucztcbiBcdH07XG5cbiBcdC8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSBmdW5jdGlvbihtb2R1bGUpIHtcbiBcdFx0dmFyIGdldHRlciA9IG1vZHVsZSAmJiBtb2R1bGUuX19lc01vZHVsZSA/XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0RGVmYXVsdCgpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcbiBcdFx0XHRmdW5jdGlvbiBnZXRNb2R1bGVFeHBvcnRzKCkgeyByZXR1cm4gbW9kdWxlOyB9O1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCAnYScsIGdldHRlcik7XG4gXHRcdHJldHVybiBnZXR0ZXI7XG4gXHR9O1xuXG4gXHQvLyBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGxcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubyA9IGZ1bmN0aW9uKG9iamVjdCwgcHJvcGVydHkpIHsgcmV0dXJuIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmplY3QsIHByb3BlcnR5KTsgfTtcblxuIFx0Ly8gX193ZWJwYWNrX3B1YmxpY19wYXRoX19cbiBcdF9fd2VicGFja19yZXF1aXJlX18ucCA9IFwiXCI7XG5cblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSBcIi4vc3JjL2luZGV4LmpzXCIpO1xuIiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiUmVhZG1lLm1kXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiZW52aXJvcGFja3MuZ2lmXCI7IiwiZXhwb3J0IGRlZmF1bHQgXCIjZGVmaW5lIE1BVENBUFxcclxcbnVuaWZvcm0gdmVjMyBjb2xvcjtcXHJcXG51bmlmb3JtIGZsb2F0IG9wYWNpdHk7XFxyXFxudW5pZm9ybSBzYW1wbGVyMkQgcm91Z2hEaWFsZWN0cmljO1xcclxcbnVuaWZvcm0gc2FtcGxlcjJEIHNtb290aERpYWxlY3RyaWM7XFxyXFxudW5pZm9ybSBzYW1wbGVyMkQgcm91Z2hNZXRhbGxpYztcXHJcXG51bmlmb3JtIHNhbXBsZXIyRCBzbW9vdGhNZXRhbGxpYztcXHJcXG51bmlmb3JtIGZsb2F0IHJvdWdobmVzcztcXHJcXG51bmlmb3JtIGZsb2F0IG1ldGFsbmVzcztcXHJcXG5cXHJcXG52YXJ5aW5nIHZlYzMgdlZpZXdQb3NpdGlvbjtcXHJcXG4jaWZuZGVmIEZMQVRfU0hBREVEXFxyXFxuXFx0dmFyeWluZyB2ZWMzIHZOb3JtYWw7XFxyXFxuI2VuZGlmXFxyXFxuI2luY2x1ZGUgPGNvbW1vbj5cXHJcXG4jaW5jbHVkZSA8ZGl0aGVyaW5nX3BhcnNfZnJhZ21lbnQ+XFxyXFxuI2luY2x1ZGUgPGNvbG9yX3BhcnNfZnJhZ21lbnQ+XFxyXFxuI2luY2x1ZGUgPHV2X3BhcnNfZnJhZ21lbnQ+XFxyXFxuI2luY2x1ZGUgPG1hcF9wYXJzX2ZyYWdtZW50PlxcclxcbiNpbmNsdWRlIDxhbHBoYW1hcF9wYXJzX2ZyYWdtZW50PlxcclxcbiNpbmNsdWRlIDxmb2dfcGFyc19mcmFnbWVudD5cXHJcXG4jaW5jbHVkZSA8YnVtcG1hcF9wYXJzX2ZyYWdtZW50PlxcclxcbiNpbmNsdWRlIDxub3JtYWxtYXBfcGFyc19mcmFnbWVudD5cXHJcXG4jaW5jbHVkZSA8bG9nZGVwdGhidWZfcGFyc19mcmFnbWVudD5cXHJcXG4jaW5jbHVkZSA8Y2xpcHBpbmdfcGxhbmVzX3BhcnNfZnJhZ21lbnQ+XFxyXFxuI2luY2x1ZGUgPHJvdWdobmVzc21hcF9wYXJzX2ZyYWdtZW50PlxcclxcbiNpbmNsdWRlIDxtZXRhbG5lc3NtYXBfcGFyc19mcmFnbWVudD5cXHJcXG52b2lkIG1haW4oKSB7XFxyXFxuXFx0I2luY2x1ZGUgPGNsaXBwaW5nX3BsYW5lc19mcmFnbWVudD5cXHJcXG5cXHR2ZWM0IGRpZmZ1c2VDb2xvciA9IHZlYzQoIGNvbG9yLCBvcGFjaXR5ICk7XFxyXFxuXFx0I2luY2x1ZGUgPGxvZ2RlcHRoYnVmX2ZyYWdtZW50PlxcclxcblxcdCNpbmNsdWRlIDxtYXBfZnJhZ21lbnQ+XFxyXFxuXFx0I2luY2x1ZGUgPGNvbG9yX2ZyYWdtZW50PlxcclxcblxcdCNpbmNsdWRlIDxhbHBoYW1hcF9mcmFnbWVudD5cXHJcXG5cXHQjaW5jbHVkZSA8YWxwaGF0ZXN0X2ZyYWdtZW50PlxcclxcblxcdCNpbmNsdWRlIDxub3JtYWxfZnJhZ21lbnRfYmVnaW4+XFxyXFxuXFx0I2luY2x1ZGUgPG5vcm1hbF9mcmFnbWVudF9tYXBzPlxcclxcbiAgI2luY2x1ZGUgPG1ldGFsbmVzc21hcF9mcmFnbWVudD5cXHJcXG4gICNpbmNsdWRlIDxyb3VnaG5lc3NtYXBfZnJhZ21lbnQ+XFxyXFxuXFx0dmVjMyB2aWV3RGlyID0gbm9ybWFsaXplKCB2Vmlld1Bvc2l0aW9uICk7XFxyXFxuXFx0dmVjMyB4ID0gbm9ybWFsaXplKCB2ZWMzKCB2aWV3RGlyLnosIDAuMCwgLSB2aWV3RGlyLnggKSApO1xcclxcblxcdHZlYzMgeSA9IGNyb3NzKCB2aWV3RGlyLCB4ICk7XFxyXFxuXFx0dmVjMiB1diA9IHZlYzIoIGRvdCggeCwgbm9ybWFsICksIGRvdCggeSwgbm9ybWFsICkgKSAqIDAuNDk1ICsgMC41OyAvLyAwLjQ5NSB0byByZW1vdmUgYXJ0aWZhY3RzIGNhdXNlZCBieSB1bmRlcnNpemVkIG1hdGNhcCBkaXNrc1xcclxcblxcclxcblxcclxcbiAgdmVjNCBkaWFlbGVjdHJpY0NvbG9yID0gbWl4KHRleHR1cmUyRCggc21vb3RoRGlhbGVjdHJpYywgdXYgKSxcXHJcXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0ZXh0dXJlMkQoIHJvdWdoRGlhbGVjdHJpYywgdXYgKSxcXHJcXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICByb3VnaG5lc3NGYWN0b3IpO1xcclxcbiAgdmVjNCBtZXRhbG5lc3NDb2xvciA9IG1peCh0ZXh0dXJlMkQoIHNtb290aE1ldGFsbGljLCB1diApLFxcclxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB0ZXh0dXJlMkQoIHJvdWdoTWV0YWxsaWMsIHV2ICksXFxyXFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJvdWdobmVzc0ZhY3Rvcik7XFxyXFxuXFxyXFxuICB2ZWM0IG1hdGNhcENvbG9yID0gbWl4KGRpYWVsZWN0cmljQ29sb3IsIG1ldGFsbmVzc0NvbG9yLCBtZXRhbG5lc3NGYWN0b3IpO1xcclxcblxcdC8qIG1hdGNhcENvbG9yID0gbWF0Y2FwVGV4ZWxUb0xpbmVhciggbWF0Y2FwQ29sb3IgKTsgKi9cXHJcXG5cXHJcXG5cXHJcXG5cXHRkaWZmdXNlQ29sb3IgPSBwb3coZGlmZnVzZUNvbG9yLCB2ZWM0KDEuMCAvIDEuMSkpO1xcclxcblxcdHZlYzMgb3V0Z29pbmdMaWdodCA9IGRpZmZ1c2VDb2xvci5yZ2IgKiBtYXRjYXBDb2xvci5yZ2I7Ly8gKyBtZXRhbG5lc3NDb2xvci5yZ2IgKiBtZXRhbG5lc3NGYWN0b3IgKiAwLjU7XFxyXFxuXFx0Z2xfRnJhZ0NvbG9yID0gdmVjNCggb3V0Z29pbmdMaWdodCwgZGlmZnVzZUNvbG9yLmEgKTtcXHJcXG5cXHJcXG5cXHQvKiBnbF9GcmFnQ29sb3IgPSB2ZWM0KHJvdWdobmVzc0ZhY3Rvciwgcm91Z2huZXNzRmFjdG9yLCByb3VnaG5lc3NGYWN0b3IsIDEuMCk7ICovXFxyXFxuXFx0LyogZ2xfRnJhZ0NvbG9yID0gdmVjNChub3JtYWwsIDEuMCk7ICovXFxyXFxuXFx0I2luY2x1ZGUgPHRvbmVtYXBwaW5nX2ZyYWdtZW50PlxcclxcblxcdCNpbmNsdWRlIDxlbmNvZGluZ3NfZnJhZ21lbnQ+XFxyXFxuXFx0I2luY2x1ZGUgPGZvZ19mcmFnbWVudD5cXHJcXG5cXHQvKiAjaW5jbHVkZSA8cHJlbXVsdGlwbGllZF9hbHBoYV9mcmFnbWVudD4gKi9cXHJcXG5cXHQjaW5jbHVkZSA8ZGl0aGVyaW5nX2ZyYWdtZW50Plxcclxcbn1cXHJcXG5cIjsiLCJleHBvcnQgZGVmYXVsdCBcIiNkZWZpbmUgTUFUQ0FQXFxyXFxudmFyeWluZyB2ZWMzIHZWaWV3UG9zaXRpb247XFxyXFxuI2lmbmRlZiBGTEFUX1NIQURFRFxcclxcblxcdHZhcnlpbmcgdmVjMyB2Tm9ybWFsO1xcclxcbiNlbmRpZlxcclxcbiNpbmNsdWRlIDxjb21tb24+XFxyXFxuI2luY2x1ZGUgPHV2X3BhcnNfdmVydGV4PlxcclxcbiNpbmNsdWRlIDxjb2xvcl9wYXJzX3ZlcnRleD5cXHJcXG4jaW5jbHVkZSA8ZGlzcGxhY2VtZW50bWFwX3BhcnNfdmVydGV4PlxcclxcbiNpbmNsdWRlIDxmb2dfcGFyc192ZXJ0ZXg+XFxyXFxuI2luY2x1ZGUgPG1vcnBodGFyZ2V0X3BhcnNfdmVydGV4PlxcclxcbiNpbmNsdWRlIDxza2lubmluZ19wYXJzX3ZlcnRleD5cXHJcXG4jaW5jbHVkZSA8bG9nZGVwdGhidWZfcGFyc192ZXJ0ZXg+XFxyXFxuI2luY2x1ZGUgPGNsaXBwaW5nX3BsYW5lc19wYXJzX3ZlcnRleD5cXHJcXG52b2lkIG1haW4oKSB7XFxyXFxuXFx0I2luY2x1ZGUgPHV2X3ZlcnRleD5cXHJcXG5cXHQjaW5jbHVkZSA8Y29sb3JfdmVydGV4PlxcclxcblxcdCNpbmNsdWRlIDxiZWdpbm5vcm1hbF92ZXJ0ZXg+XFxyXFxuXFx0I2luY2x1ZGUgPG1vcnBobm9ybWFsX3ZlcnRleD5cXHJcXG5cXHQjaW5jbHVkZSA8c2tpbmJhc2VfdmVydGV4PlxcclxcblxcdCNpbmNsdWRlIDxza2lubm9ybWFsX3ZlcnRleD5cXHJcXG5cXHQjaW5jbHVkZSA8ZGVmYXVsdG5vcm1hbF92ZXJ0ZXg+XFxyXFxuXFx0I2lmbmRlZiBGTEFUX1NIQURFRCAvLyBOb3JtYWwgY29tcHV0ZWQgd2l0aCBkZXJpdmF0aXZlcyB3aGVuIEZMQVRfU0hBREVEXFxyXFxuXFx0XFx0dk5vcm1hbCA9IG5vcm1hbGl6ZSggdHJhbnNmb3JtZWROb3JtYWwgKTtcXHJcXG5cXHQjZW5kaWZcXHJcXG5cXHJcXG5cXHQjaW5jbHVkZSA8YmVnaW5fdmVydGV4PlxcclxcblxcdCNpbmNsdWRlIDxtb3JwaHRhcmdldF92ZXJ0ZXg+XFxyXFxuXFx0I2luY2x1ZGUgPHNraW5uaW5nX3ZlcnRleD5cXHJcXG5cXHQjaW5jbHVkZSA8ZGlzcGxhY2VtZW50bWFwX3ZlcnRleD5cXHJcXG5cXHQjaW5jbHVkZSA8cHJvamVjdF92ZXJ0ZXg+XFxyXFxuXFx0I2luY2x1ZGUgPGxvZ2RlcHRoYnVmX3ZlcnRleD5cXHJcXG5cXHQjaW5jbHVkZSA8Y2xpcHBpbmdfcGxhbmVzX3ZlcnRleD5cXHJcXG5cXHQjaW5jbHVkZSA8Zm9nX3ZlcnRleD5cXHJcXG5cXHR2Vmlld1Bvc2l0aW9uID0gLSBtdlBvc2l0aW9uLnh5ejtcXHJcXG59XFxyXFxuXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwicGFja2FnZS5qc29uXCI7IiwiLyoqXHJcbiAqIEBhdXRob3IgRW1tZXR0IExhbGlzaCAvIGVsYWxpc2hcclxuICpcclxuICogVGhpcyBjbGFzcyBnZW5lcmF0ZXMgYSBQcmVmaWx0ZXJlZCwgTWlwbWFwcGVkIFJhZGlhbmNlIEVudmlyb25tZW50IE1hcFxyXG4gKiAoUE1SRU0pIGZyb20gYSBjdWJlTWFwIGVudmlyb25tZW50IHRleHR1cmUuIFRoaXMgYWxsb3dzIGRpZmZlcmVudCBsZXZlbHMgb2ZcclxuICogYmx1ciB0byBiZSBxdWlja2x5IGFjY2Vzc2VkIGJhc2VkIG9uIG1hdGVyaWFsIHJvdWdobmVzcy4gSXQgaXMgcGFja2VkIGludG8gYVxyXG4gKiBzcGVjaWFsIEN1YmVVViBmb3JtYXQgdGhhdCBhbGxvd3MgdXMgdG8gcGVyZm9ybSBjdXN0b20gaW50ZXJwb2xhdGlvbiBzbyB0aGF0XHJcbiAqIHdlIGNhbiBzdXBwb3J0IG5vbmxpbmVhciBmb3JtYXRzIHN1Y2ggYXMgUkdCRS4gVW5saWtlIGEgdHJhZGl0aW9uYWwgbWlwbWFwXHJcbiAqIGNoYWluLCBpdCBvbmx5IGdvZXMgZG93biB0byB0aGUgTE9EX01JTiBsZXZlbCAoYWJvdmUpLCBhbmQgdGhlbiBjcmVhdGVzIGV4dHJhXHJcbiAqIGV2ZW4gbW9yZSBmaWx0ZXJlZCAnbWlwcycgYXQgdGhlIHNhbWUgTE9EX01JTiByZXNvbHV0aW9uLCBhc3NvY2lhdGVkIHdpdGhcclxuICogaGlnaGVyIHJvdWdobmVzcyBsZXZlbHMuIEluIHRoaXMgd2F5IHdlIG1haW50YWluIHJlc29sdXRpb24gdG8gc21vb3RobHlcclxuICogaW50ZXJwb2xhdGUgZGlmZnVzZSBsaWdodGluZyB3aGlsZSBsaW1pdGluZyBzYW1wbGluZyBjb21wdXRhdGlvbi5cclxuICovXHJcblxyXG5jb25zdCB7XHJcblx0Q3ViZVVWUmVmbGVjdGlvbk1hcHBpbmcsXHJcblx0R2FtbWFFbmNvZGluZyxcclxuXHRMaW5lYXJFbmNvZGluZyxcclxuXHRMaW5lYXJUb25lTWFwcGluZyxcclxuXHROZWFyZXN0RmlsdGVyLFxyXG5cdE5vQmxlbmRpbmcsXHJcblx0UkdCREVuY29kaW5nLFxyXG5cdFJHQkVFbmNvZGluZyxcclxuXHRSR0JFRm9ybWF0LFxyXG5cdFJHQk0xNkVuY29kaW5nLFxyXG5cdFJHQk03RW5jb2RpbmcsXHJcblx0VW5zaWduZWRCeXRlVHlwZSxcclxuXHRzUkdCRW5jb2RpbmdcclxufSA9IFRIUkVFXHJcblxyXG5jb25zdCB7IEJ1ZmZlckF0dHJpYnV0ZSB9ID0gVEhSRUU7XHJcbmNvbnN0IHsgQnVmZmVyR2VvbWV0cnkgfSA9IFRIUkVFO1xyXG5jb25zdCB7IE1lc2ggfSA9IFRIUkVFO1xyXG5jb25zdCB7IE9ydGhvZ3JhcGhpY0NhbWVyYSB9ID0gVEhSRUU7XHJcbmNvbnN0IHsgUGVyc3BlY3RpdmVDYW1lcmEgfSA9IFRIUkVFO1xyXG5jb25zdCB7IFJhd1NoYWRlck1hdGVyaWFsIH0gPSBUSFJFRTtcclxuY29uc3QgeyBTY2VuZSB9ID0gVEhSRUU7XHJcbmNvbnN0IHsgVmVjdG9yMiB9ID0gVEhSRUU7XHJcbmNvbnN0IHsgVmVjdG9yMyB9ID0gVEhSRUU7XHJcbmNvbnN0IHsgV2ViR0xSZW5kZXJUYXJnZXQgfSA9IFRIUkVFO1xyXG5cclxudmFyIExPRF9NSU4gPSA0O1xyXG52YXIgTE9EX01BWCA9IDg7XHJcbnZhciBTSVpFX01BWCA9IE1hdGgucG93KCAyLCBMT0RfTUFYICk7XHJcblxyXG4vLyBUaGUgc3RhbmRhcmQgZGV2aWF0aW9ucyAocmFkaWFucykgYXNzb2NpYXRlZCB3aXRoIHRoZSBleHRyYSBtaXBzLiBUaGVzZSBhcmVcclxuLy8gY2hvc2VuIHRvIGFwcHJveGltYXRlIGEgVHJvd2JyaWRnZS1SZWl0eiBkaXN0cmlidXRpb24gZnVuY3Rpb24gdGltZXMgdGhlXHJcbi8vIGdlb21ldHJpYyBzaGFkb3dpbmcgZnVuY3Rpb24uIFRoZXNlIHNpZ21hIHZhbHVlcyBzcXVhcmVkIG11c3QgbWF0Y2ggdGhlXHJcbi8vIHZhcmlhbmNlICNkZWZpbmVzIGluIGN1YmVfdXZfcmVmbGVjdGlvbl9mcmFnbWVudC5nbHNsLmpzLlxyXG52YXIgRVhUUkFfTE9EX1NJR01BID0gWyAwLjEyNSwgMC4yMTUsIDAuMzUsIDAuNDQ2LCAwLjUyNiwgMC41ODIgXTtcclxuXHJcbnZhciBUT1RBTF9MT0RTID0gTE9EX01BWCAtIExPRF9NSU4gKyAxICsgRVhUUkFfTE9EX1NJR01BLmxlbmd0aDtcclxuXHJcbi8vIFRoZSBtYXhpbXVtIGxlbmd0aCBvZiB0aGUgYmx1ciBmb3IgbG9vcC4gU21hbGxlciBzaWdtYXMgd2lsbCB1c2UgZmV3ZXJcclxuLy8gc2FtcGxlcyBhbmQgZXhpdCBlYXJseSwgYnV0IG5vdCByZWNvbXBpbGUgdGhlIHNoYWRlci5cclxudmFyIE1BWF9TQU1QTEVTID0gMjA7XHJcblxyXG52YXIgRU5DT0RJTkdTID0ge1xyXG5cdFsgTGluZWFyRW5jb2RpbmcgXTogMCxcclxuXHRbIHNSR0JFbmNvZGluZyBdOiAxLFxyXG5cdFsgUkdCRUVuY29kaW5nIF06IDIsXHJcblx0WyBSR0JNN0VuY29kaW5nIF06IDMsXHJcblx0WyBSR0JNMTZFbmNvZGluZyBdOiA0LFxyXG5cdFsgUkdCREVuY29kaW5nIF06IDUsXHJcblx0WyBHYW1tYUVuY29kaW5nIF06IDZcclxufTtcclxuXHJcbnZhciBfZmxhdENhbWVyYSA9IG5ldyBPcnRob2dyYXBoaWNDYW1lcmEoKTtcclxudmFyIHsgX2xvZFBsYW5lcywgX3NpemVMb2RzLCBfc2lnbWFzIH0gPSBfY3JlYXRlUGxhbmVzKCk7XHJcbnZhciBfb2xkVGFyZ2V0ID0gbnVsbDtcclxuXHJcbi8vIEdvbGRlbiBSYXRpb1xyXG52YXIgUEhJID0gKCAxICsgTWF0aC5zcXJ0KCA1ICkgKSAvIDI7XHJcbnZhciBJTlZfUEhJID0gMSAvIFBISTtcclxuXHJcbi8vIFZlcnRpY2VzIG9mIGEgZG9kZWNhaGVkcm9uIChleGNlcHQgdGhlIG9wcG9zaXRlcywgd2hpY2ggcmVwcmVzZW50IHRoZVxyXG4vLyBzYW1lIGF4aXMpLCB1c2VkIGFzIGF4aXMgZGlyZWN0aW9ucyBldmVubHkgc3ByZWFkIG9uIGEgc3BoZXJlLlxyXG52YXIgX2F4aXNEaXJlY3Rpb25zID0gW1xyXG5cdG5ldyBWZWN0b3IzKCAxLCAxLCAxICksXHJcblx0bmV3IFZlY3RvcjMoIC0gMSwgMSwgMSApLFxyXG5cdG5ldyBWZWN0b3IzKCAxLCAxLCAtIDEgKSxcclxuXHRuZXcgVmVjdG9yMyggLSAxLCAxLCAtIDEgKSxcclxuXHRuZXcgVmVjdG9yMyggMCwgUEhJLCBJTlZfUEhJICksXHJcblx0bmV3IFZlY3RvcjMoIDAsIFBISSwgLSBJTlZfUEhJICksXHJcblx0bmV3IFZlY3RvcjMoIElOVl9QSEksIDAsIFBISSApLFxyXG5cdG5ldyBWZWN0b3IzKCAtIElOVl9QSEksIDAsIFBISSApLFxyXG5cdG5ldyBWZWN0b3IzKCBQSEksIElOVl9QSEksIDAgKSxcclxuXHRuZXcgVmVjdG9yMyggLSBQSEksIElOVl9QSEksIDAgKSBdO1xyXG5cclxuZnVuY3Rpb24gUE1SRU1HZW5lcmF0b3IoIHJlbmRlcmVyICkge1xyXG5cclxuXHR0aGlzLl9yZW5kZXJlciA9IHJlbmRlcmVyO1xyXG5cdHRoaXMuX3BpbmdQb25nUmVuZGVyVGFyZ2V0ID0gbnVsbDtcclxuXHJcblx0dGhpcy5fYmx1ck1hdGVyaWFsID0gX2dldEJsdXJTaGFkZXIoIE1BWF9TQU1QTEVTICk7XHJcblx0dGhpcy5fZXF1aXJlY3RTaGFkZXIgPSBudWxsO1xyXG5cdHRoaXMuX2N1YmVtYXBTaGFkZXIgPSBudWxsO1xyXG5cclxuXHR0aGlzLl9jb21waWxlTWF0ZXJpYWwoIHRoaXMuX2JsdXJNYXRlcmlhbCApO1xyXG5cclxufVxyXG5cclxuUE1SRU1HZW5lcmF0b3IucHJvdG90eXBlID0ge1xyXG5cclxuXHRjb25zdHJ1Y3RvcjogUE1SRU1HZW5lcmF0b3IsXHJcblxyXG5cdC8qKlxyXG5cdCAqIEdlbmVyYXRlcyBhIFBNUkVNIGZyb20gYSBzdXBwbGllZCBTY2VuZSwgd2hpY2ggY2FuIGJlIGZhc3RlciB0aGFuIHVzaW5nIGFuXHJcblx0ICogaW1hZ2UgaWYgbmV0d29ya2luZyBiYW5kd2lkdGggaXMgbG93LiBPcHRpb25hbCBzaWdtYSBzcGVjaWZpZXMgYSBibHVyIHJhZGl1c1xyXG5cdCAqIGluIHJhZGlhbnMgdG8gYmUgYXBwbGllZCB0byB0aGUgc2NlbmUgYmVmb3JlIFBNUkVNIGdlbmVyYXRpb24uIE9wdGlvbmFsIG5lYXJcclxuXHQgKiBhbmQgZmFyIHBsYW5lcyBlbnN1cmUgdGhlIHNjZW5lIGlzIHJlbmRlcmVkIGluIGl0cyBlbnRpcmV0eSAodGhlIGN1YmVDYW1lcmFcclxuXHQgKiBpcyBwbGFjZWQgYXQgdGhlIG9yaWdpbikuXHJcblx0ICovXHJcblx0ZnJvbVNjZW5lOiBmdW5jdGlvbiAoIHNjZW5lLCBzaWdtYSA9IDAsIG5lYXIgPSAwLjEsIGZhciA9IDEwMCApIHtcclxuXHJcblx0XHRfb2xkVGFyZ2V0ID0gdGhpcy5fcmVuZGVyZXIuZ2V0UmVuZGVyVGFyZ2V0KCk7XHJcblx0XHR2YXIgY3ViZVVWUmVuZGVyVGFyZ2V0ID0gdGhpcy5fYWxsb2NhdGVUYXJnZXRzKCk7XHJcblxyXG5cdFx0dGhpcy5fc2NlbmVUb0N1YmVVViggc2NlbmUsIG5lYXIsIGZhciwgY3ViZVVWUmVuZGVyVGFyZ2V0ICk7XHJcblx0XHRpZiAoIHNpZ21hID4gMCApIHtcclxuXHJcblx0XHRcdHRoaXMuX2JsdXIoIGN1YmVVVlJlbmRlclRhcmdldCwgMCwgMCwgc2lnbWEgKTtcclxuXHJcblx0XHR9XHJcblxyXG5cdFx0dGhpcy5fYXBwbHlQTVJFTSggY3ViZVVWUmVuZGVyVGFyZ2V0ICk7XHJcblx0XHR0aGlzLl9jbGVhbnVwKCBjdWJlVVZSZW5kZXJUYXJnZXQgKTtcclxuXHJcblx0XHRyZXR1cm4gY3ViZVVWUmVuZGVyVGFyZ2V0O1xyXG5cclxuXHR9LFxyXG5cclxuXHQvKipcclxuXHQgKiBHZW5lcmF0ZXMgYSBQTVJFTSBmcm9tIGFuIGVxdWlyZWN0YW5ndWxhciB0ZXh0dXJlLCB3aGljaCBjYW4gYmUgZWl0aGVyIExEUlxyXG5cdCAqIChSR0JGb3JtYXQpIG9yIEhEUiAoUkdCRUZvcm1hdCkuIFRoZSBpZGVhbCBpbnB1dCBpbWFnZSBzaXplIGlzIDFrICgxMDI0IHggNTEyKSxcclxuXHQgKiBhcyB0aGlzIG1hdGNoZXMgYmVzdCB3aXRoIHRoZSAyNTYgeCAyNTYgY3ViZW1hcCBvdXRwdXQuXHJcblx0ICovXHJcblx0ZnJvbUVxdWlyZWN0YW5ndWxhcjogZnVuY3Rpb24gKCBlcXVpcmVjdGFuZ3VsYXIgKSB7XHJcblxyXG5cdFx0ZXF1aXJlY3Rhbmd1bGFyLm1hZ0ZpbHRlciA9IE5lYXJlc3RGaWx0ZXI7XHJcblx0XHRlcXVpcmVjdGFuZ3VsYXIubWluRmlsdGVyID0gTmVhcmVzdEZpbHRlcjtcclxuXHRcdGVxdWlyZWN0YW5ndWxhci5nZW5lcmF0ZU1pcG1hcHMgPSBmYWxzZTtcclxuXHJcblx0XHRyZXR1cm4gdGhpcy5mcm9tQ3ViZW1hcCggZXF1aXJlY3Rhbmd1bGFyICk7XHJcblxyXG5cdH0sXHJcblxyXG5cdC8qKlxyXG5cdCAqIEdlbmVyYXRlcyBhIFBNUkVNIGZyb20gYW4gY3ViZW1hcCB0ZXh0dXJlLCB3aGljaCBjYW4gYmUgZWl0aGVyIExEUlxyXG5cdCAqIChSR0JGb3JtYXQpIG9yIEhEUiAoUkdCRUZvcm1hdCkuIFRoZSBpZGVhbCBpbnB1dCBjdWJlIHNpemUgaXMgMjU2IHggMjU2LFxyXG5cdCAqIGFzIHRoaXMgbWF0Y2hlcyBiZXN0IHdpdGggdGhlIDI1NiB4IDI1NiBjdWJlbWFwIG91dHB1dC5cclxuXHQgKi9cclxuXHRmcm9tQ3ViZW1hcDogZnVuY3Rpb24gKCBjdWJlbWFwICkge1xyXG5cclxuXHRcdF9vbGRUYXJnZXQgPSB0aGlzLl9yZW5kZXJlci5nZXRSZW5kZXJUYXJnZXQoKTtcclxuXHRcdHZhciBjdWJlVVZSZW5kZXJUYXJnZXQgPSB0aGlzLl9hbGxvY2F0ZVRhcmdldHMoIGN1YmVtYXAgKTtcclxuXHRcdHRoaXMuX3RleHR1cmVUb0N1YmVVViggY3ViZW1hcCwgY3ViZVVWUmVuZGVyVGFyZ2V0ICk7XHJcblx0XHR0aGlzLl9hcHBseVBNUkVNKCBjdWJlVVZSZW5kZXJUYXJnZXQgKTtcclxuXHRcdHRoaXMuX2NsZWFudXAoIGN1YmVVVlJlbmRlclRhcmdldCApO1xyXG5cclxuXHRcdHJldHVybiBjdWJlVVZSZW5kZXJUYXJnZXQ7XHJcblxyXG5cdH0sXHJcblxyXG5cdC8qKlxyXG5cdCAqIFByZS1jb21waWxlcyB0aGUgY3ViZW1hcCBzaGFkZXIuIFlvdSBjYW4gZ2V0IGZhc3RlciBzdGFydC11cCBieSBpbnZva2luZyB0aGlzIG1ldGhvZCBkdXJpbmdcclxuXHQgKiB5b3VyIHRleHR1cmUncyBuZXR3b3JrIGZldGNoIGZvciBpbmNyZWFzZWQgY29uY3VycmVuY3kuXHJcblx0ICovXHJcblx0Y29tcGlsZUN1YmVtYXBTaGFkZXI6IGZ1bmN0aW9uICgpIHtcclxuXHJcblx0XHRpZiAoIHRoaXMuX2N1YmVtYXBTaGFkZXIgPT09IG51bGwgKSB7XHJcblxyXG5cdFx0XHR0aGlzLl9jdWJlbWFwU2hhZGVyID0gX2dldEN1YmVtYXBTaGFkZXIoKTtcclxuXHRcdFx0dGhpcy5fY29tcGlsZU1hdGVyaWFsKCB0aGlzLl9jdWJlbWFwU2hhZGVyICk7XHJcblxyXG5cdFx0fVxyXG5cclxuXHR9LFxyXG5cclxuXHQvKipcclxuXHQgKiBQcmUtY29tcGlsZXMgdGhlIGVxdWlyZWN0YW5ndWxhciBzaGFkZXIuIFlvdSBjYW4gZ2V0IGZhc3RlciBzdGFydC11cCBieSBpbnZva2luZyB0aGlzIG1ldGhvZCBkdXJpbmdcclxuXHQgKiB5b3VyIHRleHR1cmUncyBuZXR3b3JrIGZldGNoIGZvciBpbmNyZWFzZWQgY29uY3VycmVuY3kuXHJcblx0ICovXHJcblx0Y29tcGlsZUVxdWlyZWN0YW5ndWxhclNoYWRlcjogZnVuY3Rpb24gKCkge1xyXG5cclxuXHRcdGlmICggdGhpcy5fZXF1aXJlY3RTaGFkZXIgPT09IG51bGwgKSB7XHJcblxyXG5cdFx0XHR0aGlzLl9lcXVpcmVjdFNoYWRlciA9IF9nZXRFcXVpcmVjdFNoYWRlcigpO1xyXG5cdFx0XHR0aGlzLl9jb21waWxlTWF0ZXJpYWwoIHRoaXMuX2VxdWlyZWN0U2hhZGVyICk7XHJcblxyXG5cdFx0fVxyXG5cclxuXHR9LFxyXG5cclxuXHQvKipcclxuXHQgKiBEaXNwb3NlcyBvZiB0aGUgUE1SRU1HZW5lcmF0b3IncyBpbnRlcm5hbCBtZW1vcnkuIE5vdGUgdGhhdCBQTVJFTUdlbmVyYXRvciBpcyBhIHN0YXRpYyBjbGFzcyxcclxuXHQgKiBzbyB5b3Ugc2hvdWxkIG5vdCBuZWVkIG1vcmUgdGhhbiBvbmUgUE1SRU1HZW5lcmF0b3Igb2JqZWN0LiBJZiB5b3UgZG8sIGNhbGxpbmcgZGlzcG9zZSgpIG9uXHJcblx0ICogb25lIG9mIHRoZW0gd2lsbCBjYXVzZSBhbnkgb3RoZXJzIHRvIGFsc28gYmVjb21lIHVudXNhYmxlLlxyXG5cdCAqL1xyXG5cdGRpc3Bvc2U6IGZ1bmN0aW9uICgpIHtcclxuXHJcblx0XHR0aGlzLl9ibHVyTWF0ZXJpYWwuZGlzcG9zZSgpO1xyXG5cclxuXHRcdGlmICggdGhpcy5fY3ViZW1hcFNoYWRlciAhPT0gbnVsbCApIHRoaXMuX2N1YmVtYXBTaGFkZXIuZGlzcG9zZSgpO1xyXG5cdFx0aWYgKCB0aGlzLl9lcXVpcmVjdFNoYWRlciAhPT0gbnVsbCApIHRoaXMuX2VxdWlyZWN0U2hhZGVyLmRpc3Bvc2UoKTtcclxuXHJcblx0XHRmb3IgKCB2YXIgaSA9IDA7IGkgPCBfbG9kUGxhbmVzLmxlbmd0aDsgaSArKyApIHtcclxuXHJcblx0XHRcdF9sb2RQbGFuZXNbIGkgXS5kaXNwb3NlKCk7XHJcblxyXG5cdFx0fVxyXG5cclxuXHR9LFxyXG5cclxuXHQvLyBwcml2YXRlIGludGVyZmFjZVxyXG5cclxuXHRfY2xlYW51cDogZnVuY3Rpb24gKCBvdXRwdXRUYXJnZXQgKSB7XHJcblxyXG5cdFx0dGhpcy5fcGluZ1BvbmdSZW5kZXJUYXJnZXQuZGlzcG9zZSgpO1xyXG5cdFx0dGhpcy5fcmVuZGVyZXIuc2V0UmVuZGVyVGFyZ2V0KCBfb2xkVGFyZ2V0ICk7XHJcblx0XHRvdXRwdXRUYXJnZXQuc2Npc3NvclRlc3QgPSBmYWxzZTtcclxuXHRcdC8vIHJlc2V0IHZpZXdwb3J0IGFuZCBzY2lzc29yXHJcblx0XHRvdXRwdXRUYXJnZXQuc2V0U2l6ZSggb3V0cHV0VGFyZ2V0LndpZHRoLCBvdXRwdXRUYXJnZXQuaGVpZ2h0ICk7XHJcblxyXG5cdH0sXHJcblxyXG5cdF9hbGxvY2F0ZVRhcmdldHM6IGZ1bmN0aW9uICggZXF1aXJlY3Rhbmd1bGFyICkge1xyXG5cclxuXHRcdHZhciBwYXJhbXMgPSB7XHJcblx0XHRcdG1hZ0ZpbHRlcjogTmVhcmVzdEZpbHRlcixcclxuXHRcdFx0bWluRmlsdGVyOiBOZWFyZXN0RmlsdGVyLFxyXG5cdFx0XHRnZW5lcmF0ZU1pcG1hcHM6IGZhbHNlLFxyXG5cdFx0XHR0eXBlOiBVbnNpZ25lZEJ5dGVUeXBlLFxyXG5cdFx0XHRmb3JtYXQ6IFJHQkVGb3JtYXQsXHJcblx0XHRcdGVuY29kaW5nOiBfaXNMRFIoIGVxdWlyZWN0YW5ndWxhciApID8gZXF1aXJlY3Rhbmd1bGFyLmVuY29kaW5nIDogUkdCRUVuY29kaW5nLFxyXG5cdFx0XHRkZXB0aEJ1ZmZlcjogZmFsc2UsXHJcblx0XHRcdHN0ZW5jaWxCdWZmZXI6IGZhbHNlXHJcblx0XHR9O1xyXG5cclxuXHRcdHZhciBjdWJlVVZSZW5kZXJUYXJnZXQgPSBfY3JlYXRlUmVuZGVyVGFyZ2V0KCBwYXJhbXMgKTtcclxuXHRcdGN1YmVVVlJlbmRlclRhcmdldC5kZXB0aEJ1ZmZlciA9IGVxdWlyZWN0YW5ndWxhciA/IGZhbHNlIDogdHJ1ZTtcclxuXHRcdHRoaXMuX3BpbmdQb25nUmVuZGVyVGFyZ2V0ID0gX2NyZWF0ZVJlbmRlclRhcmdldCggcGFyYW1zICk7XHJcblx0XHRyZXR1cm4gY3ViZVVWUmVuZGVyVGFyZ2V0O1xyXG5cclxuXHR9LFxyXG5cclxuXHRfY29tcGlsZU1hdGVyaWFsOiBmdW5jdGlvbiAoIG1hdGVyaWFsICkge1xyXG5cclxuXHRcdHZhciB0bXBTY2VuZSA9IG5ldyBTY2VuZSgpO1xyXG5cdFx0dG1wU2NlbmUuYWRkKCBuZXcgTWVzaCggX2xvZFBsYW5lc1sgMCBdLCBtYXRlcmlhbCApICk7XHJcblx0XHR0aGlzLl9yZW5kZXJlci5jb21waWxlKCB0bXBTY2VuZSwgX2ZsYXRDYW1lcmEgKTtcclxuXHJcblx0fSxcclxuXHJcblx0X3NjZW5lVG9DdWJlVVY6IGZ1bmN0aW9uICggc2NlbmUsIG5lYXIsIGZhciwgY3ViZVVWUmVuZGVyVGFyZ2V0ICkge1xyXG5cclxuXHRcdHZhciBmb3YgPSA5MDtcclxuXHRcdHZhciBhc3BlY3QgPSAxO1xyXG5cdFx0dmFyIGN1YmVDYW1lcmEgPSBuZXcgUGVyc3BlY3RpdmVDYW1lcmEoIGZvdiwgYXNwZWN0LCBuZWFyLCBmYXIgKTtcclxuXHRcdHZhciB1cFNpZ24gPSBbIDEsIDEsIDEsIDEsIC0gMSwgMSBdO1xyXG5cdFx0dmFyIGZvcndhcmRTaWduID0gWyAxLCAxLCAtIDEsIC0gMSwgLSAxLCAxIF07XHJcblx0XHR2YXIgcmVuZGVyZXIgPSB0aGlzLl9yZW5kZXJlcjtcclxuXHJcblx0XHR2YXIgb3V0cHV0RW5jb2RpbmcgPSByZW5kZXJlci5vdXRwdXRFbmNvZGluZztcclxuXHRcdHZhciB0b25lTWFwcGluZyA9IHJlbmRlcmVyLnRvbmVNYXBwaW5nO1xyXG5cdFx0dmFyIHRvbmVNYXBwaW5nRXhwb3N1cmUgPSByZW5kZXJlci50b25lTWFwcGluZ0V4cG9zdXJlO1xyXG5cdFx0dmFyIGNsZWFyQ29sb3IgPSByZW5kZXJlci5nZXRDbGVhckNvbG9yKCk7XHJcblx0XHR2YXIgY2xlYXJBbHBoYSA9IHJlbmRlcmVyLmdldENsZWFyQWxwaGEoKTtcclxuXHJcblx0XHRyZW5kZXJlci50b25lTWFwcGluZyA9IExpbmVhclRvbmVNYXBwaW5nO1xyXG5cdFx0cmVuZGVyZXIudG9uZU1hcHBpbmdFeHBvc3VyZSA9IDEuMDtcclxuXHRcdHJlbmRlcmVyLm91dHB1dEVuY29kaW5nID0gTGluZWFyRW5jb2Rpbmc7XHJcblx0XHRzY2VuZS5zY2FsZS56ICo9IC0gMTtcclxuXHJcblx0XHR2YXIgYmFja2dyb3VuZCA9IHNjZW5lLmJhY2tncm91bmQ7XHJcblx0XHRpZiAoIGJhY2tncm91bmQgJiYgYmFja2dyb3VuZC5pc0NvbG9yICkge1xyXG5cclxuXHRcdFx0YmFja2dyb3VuZC5jb252ZXJ0U1JHQlRvTGluZWFyKCk7XHJcblx0XHRcdC8vIENvbnZlcnQgbGluZWFyIHRvIFJHQkVcclxuXHRcdFx0dmFyIG1heENvbXBvbmVudCA9IE1hdGgubWF4KCBiYWNrZ3JvdW5kLnIsIGJhY2tncm91bmQuZywgYmFja2dyb3VuZC5iICk7XHJcblx0XHRcdHZhciBmRXhwID0gTWF0aC5taW4oIE1hdGgubWF4KCBNYXRoLmNlaWwoIE1hdGgubG9nMiggbWF4Q29tcG9uZW50ICkgKSwgLSAxMjguMCApLCAxMjcuMCApO1xyXG5cdFx0XHRiYWNrZ3JvdW5kID0gYmFja2dyb3VuZC5tdWx0aXBseVNjYWxhciggTWF0aC5wb3coIDIuMCwgLSBmRXhwICkgKTtcclxuXHRcdFx0dmFyIGFscGhhID0gKCBmRXhwICsgMTI4LjAgKSAvIDI1NS4wO1xyXG5cdFx0XHRyZW5kZXJlci5zZXRDbGVhckNvbG9yKCBiYWNrZ3JvdW5kLCBhbHBoYSApO1xyXG5cdFx0XHRzY2VuZS5iYWNrZ3JvdW5kID0gbnVsbDtcclxuXHJcblx0XHR9XHJcblxyXG5cdFx0Zm9yICggdmFyIGkgPSAwOyBpIDwgNjsgaSArKyApIHtcclxuXHJcblx0XHRcdHZhciBjb2wgPSBpICUgMztcclxuXHRcdFx0aWYgKCBjb2wgPT0gMCApIHtcclxuXHJcblx0XHRcdFx0Y3ViZUNhbWVyYS51cC5zZXQoIDAsIHVwU2lnblsgaSBdLCAwICk7XHJcblx0XHRcdFx0Y3ViZUNhbWVyYS5sb29rQXQoIGZvcndhcmRTaWduWyBpIF0sIDAsIDAgKTtcclxuXHJcblx0XHRcdH0gZWxzZSBpZiAoIGNvbCA9PSAxICkge1xyXG5cclxuXHRcdFx0XHRjdWJlQ2FtZXJhLnVwLnNldCggMCwgMCwgdXBTaWduWyBpIF0gKTtcclxuXHRcdFx0XHRjdWJlQ2FtZXJhLmxvb2tBdCggMCwgZm9yd2FyZFNpZ25bIGkgXSwgMCApO1xyXG5cclxuXHRcdFx0fSBlbHNlIHtcclxuXHJcblx0XHRcdFx0Y3ViZUNhbWVyYS51cC5zZXQoIDAsIHVwU2lnblsgaSBdLCAwICk7XHJcblx0XHRcdFx0Y3ViZUNhbWVyYS5sb29rQXQoIDAsIDAsIGZvcndhcmRTaWduWyBpIF0gKTtcclxuXHJcblx0XHRcdH1cclxuXHJcblx0XHRcdF9zZXRWaWV3cG9ydCggY3ViZVVWUmVuZGVyVGFyZ2V0LFxyXG5cdFx0XHRcdGNvbCAqIFNJWkVfTUFYLCBpID4gMiA/IFNJWkVfTUFYIDogMCwgU0laRV9NQVgsIFNJWkVfTUFYICk7XHJcblx0XHRcdHJlbmRlcmVyLnNldFJlbmRlclRhcmdldCggY3ViZVVWUmVuZGVyVGFyZ2V0ICk7XHJcblx0XHRcdHJlbmRlcmVyLnJlbmRlciggc2NlbmUsIGN1YmVDYW1lcmEgKTtcclxuXHJcblx0XHR9XHJcblxyXG5cdFx0cmVuZGVyZXIudG9uZU1hcHBpbmcgPSB0b25lTWFwcGluZztcclxuXHRcdHJlbmRlcmVyLnRvbmVNYXBwaW5nRXhwb3N1cmUgPSB0b25lTWFwcGluZ0V4cG9zdXJlO1xyXG5cdFx0cmVuZGVyZXIub3V0cHV0RW5jb2RpbmcgPSBvdXRwdXRFbmNvZGluZztcclxuXHRcdHJlbmRlcmVyLnNldENsZWFyQ29sb3IoIGNsZWFyQ29sb3IsIGNsZWFyQWxwaGEgKTtcclxuXHRcdHNjZW5lLnNjYWxlLnogKj0gLSAxO1xyXG5cclxuXHR9LFxyXG5cclxuXHRfdGV4dHVyZVRvQ3ViZVVWOiBmdW5jdGlvbiAoIHRleHR1cmUsIGN1YmVVVlJlbmRlclRhcmdldCApIHtcclxuXHJcblx0XHR2YXIgc2NlbmUgPSBuZXcgU2NlbmUoKTtcclxuXHRcdHZhciByZW5kZXJlciA9IHRoaXMuX3JlbmRlcmVyO1xyXG5cclxuXHRcdGlmICggdGV4dHVyZS5pc0N1YmVUZXh0dXJlICkge1xyXG5cclxuXHRcdFx0aWYgKCB0aGlzLl9jdWJlbWFwU2hhZGVyID09IG51bGwgKSB7XHJcblxyXG5cdFx0XHRcdHRoaXMuX2N1YmVtYXBTaGFkZXIgPSBfZ2V0Q3ViZW1hcFNoYWRlcigpO1xyXG5cclxuXHRcdFx0fVxyXG5cclxuXHRcdH0gZWxzZSB7XHJcblxyXG5cdFx0XHRpZiAoIHRoaXMuX2VxdWlyZWN0U2hhZGVyID09IG51bGwgKSB7XHJcblxyXG5cdFx0XHRcdHRoaXMuX2VxdWlyZWN0U2hhZGVyID0gX2dldEVxdWlyZWN0U2hhZGVyKCk7XHJcblxyXG5cdFx0XHR9XHJcblxyXG5cdFx0fVxyXG5cclxuXHRcdHZhciBtYXRlcmlhbCA9IHRleHR1cmUuaXNDdWJlVGV4dHVyZSA/IHRoaXMuX2N1YmVtYXBTaGFkZXIgOiB0aGlzLl9lcXVpcmVjdFNoYWRlcjtcclxuXHRcdHNjZW5lLmFkZCggbmV3IE1lc2goIF9sb2RQbGFuZXNbIDAgXSwgbWF0ZXJpYWwgKSApO1xyXG5cclxuXHRcdHZhciB1bmlmb3JtcyA9IG1hdGVyaWFsLnVuaWZvcm1zO1xyXG5cclxuXHRcdHVuaWZvcm1zWyAnZW52TWFwJyBdLnZhbHVlID0gdGV4dHVyZTtcclxuXHJcblx0XHRpZiAoICEgdGV4dHVyZS5pc0N1YmVUZXh0dXJlICkge1xyXG5cclxuXHRcdFx0dW5pZm9ybXNbICd0ZXhlbFNpemUnIF0udmFsdWUuc2V0KCAxLjAgLyB0ZXh0dXJlLmltYWdlLndpZHRoLCAxLjAgLyB0ZXh0dXJlLmltYWdlLmhlaWdodCApO1xyXG5cclxuXHRcdH1cclxuXHJcblx0XHR1bmlmb3Jtc1sgJ2lucHV0RW5jb2RpbmcnIF0udmFsdWUgPSBFTkNPRElOR1NbIHRleHR1cmUuZW5jb2RpbmcgXTtcclxuXHRcdHVuaWZvcm1zWyAnb3V0cHV0RW5jb2RpbmcnIF0udmFsdWUgPSBFTkNPRElOR1NbIGN1YmVVVlJlbmRlclRhcmdldC50ZXh0dXJlLmVuY29kaW5nIF07XHJcblxyXG5cdFx0X3NldFZpZXdwb3J0KCBjdWJlVVZSZW5kZXJUYXJnZXQsIDAsIDAsIDMgKiBTSVpFX01BWCwgMiAqIFNJWkVfTUFYICk7XHJcblxyXG5cdFx0cmVuZGVyZXIuc2V0UmVuZGVyVGFyZ2V0KCBjdWJlVVZSZW5kZXJUYXJnZXQgKTtcclxuXHRcdHJlbmRlcmVyLnJlbmRlciggc2NlbmUsIF9mbGF0Q2FtZXJhICk7XHJcblxyXG5cdH0sXHJcblxyXG5cdF9hcHBseVBNUkVNOiBmdW5jdGlvbiAoIGN1YmVVVlJlbmRlclRhcmdldCApIHtcclxuXHJcblx0XHR2YXIgcmVuZGVyZXIgPSB0aGlzLl9yZW5kZXJlcjtcclxuXHRcdHZhciBhdXRvQ2xlYXIgPSByZW5kZXJlci5hdXRvQ2xlYXI7XHJcblx0XHRyZW5kZXJlci5hdXRvQ2xlYXIgPSBmYWxzZTtcclxuXHJcblx0XHRmb3IgKCB2YXIgaSA9IDE7IGkgPCBUT1RBTF9MT0RTOyBpICsrICkge1xyXG5cclxuXHRcdFx0dmFyIHNpZ21hID0gTWF0aC5zcXJ0KCBfc2lnbWFzWyBpIF0gKiBfc2lnbWFzWyBpIF0gLSBfc2lnbWFzWyBpIC0gMSBdICogX3NpZ21hc1sgaSAtIDEgXSApO1xyXG5cclxuXHRcdFx0dmFyIHBvbGVBeGlzID0gX2F4aXNEaXJlY3Rpb25zWyAoIGkgLSAxICkgJSBfYXhpc0RpcmVjdGlvbnMubGVuZ3RoIF07XHJcblxyXG5cdFx0XHR0aGlzLl9ibHVyKCBjdWJlVVZSZW5kZXJUYXJnZXQsIGkgLSAxLCBpLCBzaWdtYSwgcG9sZUF4aXMgKTtcclxuXHJcblx0XHR9XHJcblxyXG5cdFx0cmVuZGVyZXIuYXV0b0NsZWFyID0gYXV0b0NsZWFyO1xyXG5cclxuXHR9LFxyXG5cclxuXHQvKipcclxuXHQgKiBUaGlzIGlzIGEgdHdvLXBhc3MgR2F1c3NpYW4gYmx1ciBmb3IgYSBjdWJlbWFwLiBOb3JtYWxseSB0aGlzIGlzIGRvbmVcclxuXHQgKiB2ZXJ0aWNhbGx5IGFuZCBob3Jpem9udGFsbHksIGJ1dCB0aGlzIGJyZWFrcyBkb3duIG9uIGEgY3ViZS4gSGVyZSB3ZSBhcHBseVxyXG5cdCAqIHRoZSBibHVyIGxhdGl0dWRpbmFsbHkgKGFyb3VuZCB0aGUgcG9sZXMpLCBhbmQgdGhlbiBsb25naXR1ZGluYWxseSAodG93YXJkc1xyXG5cdCAqIHRoZSBwb2xlcykgdG8gYXBwcm94aW1hdGUgdGhlIG9ydGhvZ29uYWxseS1zZXBhcmFibGUgYmx1ci4gSXQgaXMgbGVhc3RcclxuXHQgKiBhY2N1cmF0ZSBhdCB0aGUgcG9sZXMsIGJ1dCBzdGlsbCBkb2VzIGEgZGVjZW50IGpvYi5cclxuXHQgKi9cclxuXHRfYmx1cjogZnVuY3Rpb24gKCBjdWJlVVZSZW5kZXJUYXJnZXQsIGxvZEluLCBsb2RPdXQsIHNpZ21hLCBwb2xlQXhpcyApIHtcclxuXHJcblx0XHR2YXIgcGluZ1BvbmdSZW5kZXJUYXJnZXQgPSB0aGlzLl9waW5nUG9uZ1JlbmRlclRhcmdldDtcclxuXHJcblx0XHR0aGlzLl9oYWxmQmx1cihcclxuXHRcdFx0Y3ViZVVWUmVuZGVyVGFyZ2V0LFxyXG5cdFx0XHRwaW5nUG9uZ1JlbmRlclRhcmdldCxcclxuXHRcdFx0bG9kSW4sXHJcblx0XHRcdGxvZE91dCxcclxuXHRcdFx0c2lnbWEsXHJcblx0XHRcdCdsYXRpdHVkaW5hbCcsXHJcblx0XHRcdHBvbGVBeGlzICk7XHJcblxyXG5cdFx0dGhpcy5faGFsZkJsdXIoXHJcblx0XHRcdHBpbmdQb25nUmVuZGVyVGFyZ2V0LFxyXG5cdFx0XHRjdWJlVVZSZW5kZXJUYXJnZXQsXHJcblx0XHRcdGxvZE91dCxcclxuXHRcdFx0bG9kT3V0LFxyXG5cdFx0XHRzaWdtYSxcclxuXHRcdFx0J2xvbmdpdHVkaW5hbCcsXHJcblx0XHRcdHBvbGVBeGlzICk7XHJcblxyXG5cdH0sXHJcblxyXG5cdF9oYWxmQmx1cjogZnVuY3Rpb24gKCB0YXJnZXRJbiwgdGFyZ2V0T3V0LCBsb2RJbiwgbG9kT3V0LCBzaWdtYVJhZGlhbnMsIGRpcmVjdGlvbiwgcG9sZUF4aXMgKSB7XHJcblxyXG5cdFx0dmFyIHJlbmRlcmVyID0gdGhpcy5fcmVuZGVyZXI7XHJcblx0XHR2YXIgYmx1ck1hdGVyaWFsID0gdGhpcy5fYmx1ck1hdGVyaWFsO1xyXG5cclxuXHRcdGlmICggZGlyZWN0aW9uICE9PSAnbGF0aXR1ZGluYWwnICYmIGRpcmVjdGlvbiAhPT0gJ2xvbmdpdHVkaW5hbCcgKSB7XHJcblxyXG5cdFx0XHRjb25zb2xlLmVycm9yKFxyXG5cdFx0XHRcdCdibHVyIGRpcmVjdGlvbiBtdXN0IGJlIGVpdGhlciBsYXRpdHVkaW5hbCBvciBsb25naXR1ZGluYWwhJyApO1xyXG5cclxuXHRcdH1cclxuXHJcblx0XHQvLyBOdW1iZXIgb2Ygc3RhbmRhcmQgZGV2aWF0aW9ucyBhdCB3aGljaCB0byBjdXQgb2ZmIHRoZSBkaXNjcmV0ZSBhcHByb3hpbWF0aW9uLlxyXG5cdFx0dmFyIFNUQU5EQVJEX0RFVklBVElPTlMgPSAzO1xyXG5cclxuXHRcdHZhciBibHVyU2NlbmUgPSBuZXcgU2NlbmUoKTtcclxuXHRcdGJsdXJTY2VuZS5hZGQoIG5ldyBNZXNoKCBfbG9kUGxhbmVzWyBsb2RPdXQgXSwgYmx1ck1hdGVyaWFsICkgKTtcclxuXHRcdHZhciBibHVyVW5pZm9ybXMgPSBibHVyTWF0ZXJpYWwudW5pZm9ybXM7XHJcblxyXG5cdFx0dmFyIHBpeGVscyA9IF9zaXplTG9kc1sgbG9kSW4gXSAtIDE7XHJcblx0XHR2YXIgcmFkaWFuc1BlclBpeGVsID0gaXNGaW5pdGUoIHNpZ21hUmFkaWFucyApID8gTWF0aC5QSSAvICggMiAqIHBpeGVscyApIDogMiAqIE1hdGguUEkgLyAoIDIgKiBNQVhfU0FNUExFUyAtIDEgKTtcclxuXHRcdHZhciBzaWdtYVBpeGVscyA9IHNpZ21hUmFkaWFucyAvIHJhZGlhbnNQZXJQaXhlbDtcclxuXHRcdHZhciBzYW1wbGVzID0gaXNGaW5pdGUoIHNpZ21hUmFkaWFucyApID8gMSArIE1hdGguZmxvb3IoIFNUQU5EQVJEX0RFVklBVElPTlMgKiBzaWdtYVBpeGVscyApIDogTUFYX1NBTVBMRVM7XHJcblxyXG5cdFx0aWYgKCBzYW1wbGVzID4gTUFYX1NBTVBMRVMgKSB7XHJcblxyXG5cdFx0XHRjb25zb2xlLndhcm4oIGBzaWdtYVJhZGlhbnMsICR7XHJcblx0XHRcdFx0c2lnbWFSYWRpYW5zfSwgaXMgdG9vIGxhcmdlIGFuZCB3aWxsIGNsaXAsIGFzIGl0IHJlcXVlc3RlZCAke1xyXG5cdFx0XHRcdHNhbXBsZXN9IHNhbXBsZXMgd2hlbiB0aGUgbWF4aW11bSBpcyBzZXQgdG8gJHtNQVhfU0FNUExFU31gICk7XHJcblxyXG5cdFx0fVxyXG5cclxuXHRcdHZhciB3ZWlnaHRzID0gW107XHJcblx0XHR2YXIgc3VtID0gMDtcclxuXHJcblx0XHRmb3IgKCB2YXIgaSA9IDA7IGkgPCBNQVhfU0FNUExFUzsgKysgaSApIHtcclxuXHJcblx0XHRcdHZhciB4ID0gaSAvIHNpZ21hUGl4ZWxzO1xyXG5cdFx0XHR2YXIgd2VpZ2h0ID0gTWF0aC5leHAoIC0geCAqIHggLyAyICk7XHJcblx0XHRcdHdlaWdodHMucHVzaCggd2VpZ2h0ICk7XHJcblxyXG5cdFx0XHRpZiAoIGkgPT0gMCApIHtcclxuXHJcblx0XHRcdFx0c3VtICs9IHdlaWdodDtcclxuXHJcblx0XHRcdH0gZWxzZSBpZiAoIGkgPCBzYW1wbGVzICkge1xyXG5cclxuXHRcdFx0XHRzdW0gKz0gMiAqIHdlaWdodDtcclxuXHJcblx0XHRcdH1cclxuXHJcblx0XHR9XHJcblxyXG5cdFx0Zm9yICggdmFyIGkgPSAwOyBpIDwgd2VpZ2h0cy5sZW5ndGg7IGkgKysgKSB7XHJcblxyXG5cdFx0XHR3ZWlnaHRzWyBpIF0gPSB3ZWlnaHRzWyBpIF0gLyBzdW07XHJcblxyXG5cdFx0fVxyXG5cclxuXHRcdGJsdXJVbmlmb3Jtc1sgJ2Vudk1hcCcgXS52YWx1ZSA9IHRhcmdldEluLnRleHR1cmU7XHJcblx0XHRibHVyVW5pZm9ybXNbICdzYW1wbGVzJyBdLnZhbHVlID0gc2FtcGxlcztcclxuXHRcdGJsdXJVbmlmb3Jtc1sgJ3dlaWdodHMnIF0udmFsdWUgPSB3ZWlnaHRzO1xyXG5cdFx0Ymx1clVuaWZvcm1zWyAnbGF0aXR1ZGluYWwnIF0udmFsdWUgPSBkaXJlY3Rpb24gPT09ICdsYXRpdHVkaW5hbCc7XHJcblxyXG5cdFx0aWYgKCBwb2xlQXhpcyApIHtcclxuXHJcblx0XHRcdGJsdXJVbmlmb3Jtc1sgJ3BvbGVBeGlzJyBdLnZhbHVlID0gcG9sZUF4aXM7XHJcblxyXG5cdFx0fVxyXG5cclxuXHRcdGJsdXJVbmlmb3Jtc1sgJ2RUaGV0YScgXS52YWx1ZSA9IHJhZGlhbnNQZXJQaXhlbDtcclxuXHRcdGJsdXJVbmlmb3Jtc1sgJ21pcEludCcgXS52YWx1ZSA9IExPRF9NQVggLSBsb2RJbjtcclxuXHRcdGJsdXJVbmlmb3Jtc1sgJ2lucHV0RW5jb2RpbmcnIF0udmFsdWUgPSBFTkNPRElOR1NbIHRhcmdldEluLnRleHR1cmUuZW5jb2RpbmcgXTtcclxuXHRcdGJsdXJVbmlmb3Jtc1sgJ291dHB1dEVuY29kaW5nJyBdLnZhbHVlID0gRU5DT0RJTkdTWyB0YXJnZXRJbi50ZXh0dXJlLmVuY29kaW5nIF07XHJcblxyXG5cdFx0dmFyIG91dHB1dFNpemUgPSBfc2l6ZUxvZHNbIGxvZE91dCBdO1xyXG5cdFx0dmFyIHggPSAzICogTWF0aC5tYXgoIDAsIFNJWkVfTUFYIC0gMiAqIG91dHB1dFNpemUgKTtcclxuXHRcdHZhciB5ID0gKCBsb2RPdXQgPT09IDAgPyAwIDogMiAqIFNJWkVfTUFYICkgKyAyICogb3V0cHV0U2l6ZSAqICggbG9kT3V0ID4gTE9EX01BWCAtIExPRF9NSU4gPyBsb2RPdXQgLSBMT0RfTUFYICsgTE9EX01JTiA6IDAgKTtcclxuXHJcblx0XHRfc2V0Vmlld3BvcnQoIHRhcmdldE91dCwgeCwgeSwgMyAqIG91dHB1dFNpemUsIDIgKiBvdXRwdXRTaXplICk7XHJcblx0XHRyZW5kZXJlci5zZXRSZW5kZXJUYXJnZXQoIHRhcmdldE91dCApO1xyXG5cdFx0cmVuZGVyZXIucmVuZGVyKCBibHVyU2NlbmUsIF9mbGF0Q2FtZXJhICk7XHJcblxyXG5cdH1cclxuXHJcbn07XHJcblxyXG5mdW5jdGlvbiBfaXNMRFIoIHRleHR1cmUgKSB7XHJcblxyXG5cdGlmICggdGV4dHVyZSA9PT0gdW5kZWZpbmVkIHx8IHRleHR1cmUudHlwZSAhPT0gVW5zaWduZWRCeXRlVHlwZSApIHJldHVybiBmYWxzZTtcclxuXHJcblx0cmV0dXJuIHRleHR1cmUuZW5jb2RpbmcgPT09IExpbmVhckVuY29kaW5nIHx8IHRleHR1cmUuZW5jb2RpbmcgPT09IHNSR0JFbmNvZGluZyB8fCB0ZXh0dXJlLmVuY29kaW5nID09PSBHYW1tYUVuY29kaW5nO1xyXG5cclxufVxyXG5cclxuZnVuY3Rpb24gX2NyZWF0ZVBsYW5lcygpIHtcclxuXHJcblx0dmFyIF9sb2RQbGFuZXMgPSBbXTtcclxuXHR2YXIgX3NpemVMb2RzID0gW107XHJcblx0dmFyIF9zaWdtYXMgPSBbXTtcclxuXHJcblx0dmFyIGxvZCA9IExPRF9NQVg7XHJcblxyXG5cdGZvciAoIHZhciBpID0gMDsgaSA8IFRPVEFMX0xPRFM7IGkgKysgKSB7XHJcblxyXG5cdFx0dmFyIHNpemVMb2QgPSBNYXRoLnBvdyggMiwgbG9kICk7XHJcblx0XHRfc2l6ZUxvZHMucHVzaCggc2l6ZUxvZCApO1xyXG5cdFx0dmFyIHNpZ21hID0gMS4wIC8gc2l6ZUxvZDtcclxuXHJcblx0XHRpZiAoIGkgPiBMT0RfTUFYIC0gTE9EX01JTiApIHtcclxuXHJcblx0XHRcdHNpZ21hID0gRVhUUkFfTE9EX1NJR01BWyBpIC0gTE9EX01BWCArIExPRF9NSU4gLSAxIF07XHJcblxyXG5cdFx0fSBlbHNlIGlmICggaSA9PSAwICkge1xyXG5cclxuXHRcdFx0c2lnbWEgPSAwO1xyXG5cclxuXHRcdH1cclxuXHJcblx0XHRfc2lnbWFzLnB1c2goIHNpZ21hICk7XHJcblxyXG5cdFx0dmFyIHRleGVsU2l6ZSA9IDEuMCAvICggc2l6ZUxvZCAtIDEgKTtcclxuXHRcdHZhciBtaW4gPSAtIHRleGVsU2l6ZSAvIDI7XHJcblx0XHR2YXIgbWF4ID0gMSArIHRleGVsU2l6ZSAvIDI7XHJcblx0XHR2YXIgdXYxID0gWyBtaW4sIG1pbiwgbWF4LCBtaW4sIG1heCwgbWF4LCBtaW4sIG1pbiwgbWF4LCBtYXgsIG1pbiwgbWF4IF07XHJcblxyXG5cdFx0dmFyIGN1YmVGYWNlcyA9IDY7XHJcblx0XHR2YXIgdmVydGljZXMgPSA2O1xyXG5cdFx0dmFyIHBvc2l0aW9uU2l6ZSA9IDM7XHJcblx0XHR2YXIgdXZTaXplID0gMjtcclxuXHRcdHZhciBmYWNlSW5kZXhTaXplID0gMTtcclxuXHJcblx0XHR2YXIgcG9zaXRpb24gPSBuZXcgRmxvYXQzMkFycmF5KCBwb3NpdGlvblNpemUgKiB2ZXJ0aWNlcyAqIGN1YmVGYWNlcyApO1xyXG5cdFx0dmFyIHV2ID0gbmV3IEZsb2F0MzJBcnJheSggdXZTaXplICogdmVydGljZXMgKiBjdWJlRmFjZXMgKTtcclxuXHRcdHZhciBmYWNlSW5kZXggPSBuZXcgRmxvYXQzMkFycmF5KCBmYWNlSW5kZXhTaXplICogdmVydGljZXMgKiBjdWJlRmFjZXMgKTtcclxuXHJcblx0XHRmb3IgKCB2YXIgZmFjZSA9IDA7IGZhY2UgPCBjdWJlRmFjZXM7IGZhY2UgKysgKSB7XHJcblxyXG5cdFx0XHR2YXIgeCA9ICggZmFjZSAlIDMgKSAqIDIgLyAzIC0gMTtcclxuXHRcdFx0dmFyIHkgPSBmYWNlID4gMiA/IDAgOiAtIDE7XHJcblx0XHRcdHZhciBjb29yZGluYXRlcyA9IFtcclxuXHRcdFx0XHR4LCB5LCAwLFxyXG5cdFx0XHRcdHggKyAyIC8gMywgeSwgMCxcclxuXHRcdFx0XHR4ICsgMiAvIDMsIHkgKyAxLCAwLFxyXG5cdFx0XHRcdHgsIHksIDAsXHJcblx0XHRcdFx0eCArIDIgLyAzLCB5ICsgMSwgMCxcclxuXHRcdFx0XHR4LCB5ICsgMSwgMFxyXG5cdFx0XHRdO1xyXG5cdFx0XHRwb3NpdGlvbi5zZXQoIGNvb3JkaW5hdGVzLCBwb3NpdGlvblNpemUgKiB2ZXJ0aWNlcyAqIGZhY2UgKTtcclxuXHRcdFx0dXYuc2V0KCB1djEsIHV2U2l6ZSAqIHZlcnRpY2VzICogZmFjZSApO1xyXG5cdFx0XHR2YXIgZmlsbCA9IFsgZmFjZSwgZmFjZSwgZmFjZSwgZmFjZSwgZmFjZSwgZmFjZSBdO1xyXG5cdFx0XHRmYWNlSW5kZXguc2V0KCBmaWxsLCBmYWNlSW5kZXhTaXplICogdmVydGljZXMgKiBmYWNlICk7XHJcblxyXG5cdFx0fVxyXG5cclxuXHRcdHZhciBwbGFuZXMgPSBuZXcgQnVmZmVyR2VvbWV0cnkoKTtcclxuXHRcdHBsYW5lcy5zZXRBdHRyaWJ1dGUoICdwb3NpdGlvbicsIG5ldyBCdWZmZXJBdHRyaWJ1dGUoIHBvc2l0aW9uLCBwb3NpdGlvblNpemUgKSApO1xyXG5cdFx0cGxhbmVzLnNldEF0dHJpYnV0ZSggJ3V2JywgbmV3IEJ1ZmZlckF0dHJpYnV0ZSggdXYsIHV2U2l6ZSApICk7XHJcblx0XHRwbGFuZXMuc2V0QXR0cmlidXRlKCAnZmFjZUluZGV4JywgbmV3IEJ1ZmZlckF0dHJpYnV0ZSggZmFjZUluZGV4LCBmYWNlSW5kZXhTaXplICkgKTtcclxuXHRcdF9sb2RQbGFuZXMucHVzaCggcGxhbmVzICk7XHJcblxyXG5cdFx0aWYgKCBsb2QgPiBMT0RfTUlOICkge1xyXG5cclxuXHRcdFx0bG9kIC0tO1xyXG5cclxuXHRcdH1cclxuXHJcblx0fVxyXG5cclxuXHRyZXR1cm4geyBfbG9kUGxhbmVzLCBfc2l6ZUxvZHMsIF9zaWdtYXMgfTtcclxuXHJcbn1cclxuXHJcbmZ1bmN0aW9uIF9jcmVhdGVSZW5kZXJUYXJnZXQoIHBhcmFtcyApIHtcclxuXHJcblx0dmFyIGN1YmVVVlJlbmRlclRhcmdldCA9IG5ldyBXZWJHTFJlbmRlclRhcmdldCggMyAqIFNJWkVfTUFYLCAzICogU0laRV9NQVgsIHBhcmFtcyApO1xyXG5cdGN1YmVVVlJlbmRlclRhcmdldC50ZXh0dXJlLm1hcHBpbmcgPSBDdWJlVVZSZWZsZWN0aW9uTWFwcGluZztcclxuXHRjdWJlVVZSZW5kZXJUYXJnZXQudGV4dHVyZS5uYW1lID0gJ1BNUkVNLmN1YmVVdic7XHJcblx0Y3ViZVVWUmVuZGVyVGFyZ2V0LnNjaXNzb3JUZXN0ID0gdHJ1ZTtcclxuXHRyZXR1cm4gY3ViZVVWUmVuZGVyVGFyZ2V0O1xyXG5cclxufVxyXG5cclxuZnVuY3Rpb24gX3NldFZpZXdwb3J0KCB0YXJnZXQsIHgsIHksIHdpZHRoLCBoZWlnaHQgKSB7XHJcblxyXG5cdHRhcmdldC52aWV3cG9ydC5zZXQoIHgsIHksIHdpZHRoLCBoZWlnaHQgKTtcclxuXHR0YXJnZXQuc2Npc3Nvci5zZXQoIHgsIHksIHdpZHRoLCBoZWlnaHQgKTtcclxuXHJcbn1cclxuXHJcbmZ1bmN0aW9uIF9nZXRCbHVyU2hhZGVyKCBtYXhTYW1wbGVzICkge1xyXG5cclxuXHR2YXIgd2VpZ2h0cyA9IG5ldyBGbG9hdDMyQXJyYXkoIG1heFNhbXBsZXMgKTtcclxuXHR2YXIgcG9sZUF4aXMgPSBuZXcgVmVjdG9yMyggMCwgMSwgMCApO1xyXG5cdHZhciBzaGFkZXJNYXRlcmlhbCA9IG5ldyBSYXdTaGFkZXJNYXRlcmlhbCgge1xyXG5cclxuXHRcdGRlZmluZXM6IHsgJ24nOiBtYXhTYW1wbGVzIH0sXHJcblxyXG5cdFx0dW5pZm9ybXM6IHtcclxuXHRcdFx0J2Vudk1hcCc6IHsgdmFsdWU6IG51bGwgfSxcclxuXHRcdFx0J3NhbXBsZXMnOiB7IHZhbHVlOiAxIH0sXHJcblx0XHRcdCd3ZWlnaHRzJzogeyB2YWx1ZTogd2VpZ2h0cyB9LFxyXG5cdFx0XHQnbGF0aXR1ZGluYWwnOiB7IHZhbHVlOiBmYWxzZSB9LFxyXG5cdFx0XHQnZFRoZXRhJzogeyB2YWx1ZTogMCB9LFxyXG5cdFx0XHQnbWlwSW50JzogeyB2YWx1ZTogMCB9LFxyXG5cdFx0XHQncG9sZUF4aXMnOiB7IHZhbHVlOiBwb2xlQXhpcyB9LFxyXG5cdFx0XHQnaW5wdXRFbmNvZGluZyc6IHsgdmFsdWU6IEVOQ09ESU5HU1sgTGluZWFyRW5jb2RpbmcgXSB9LFxyXG5cdFx0XHQnb3V0cHV0RW5jb2RpbmcnOiB7IHZhbHVlOiBFTkNPRElOR1NbIExpbmVhckVuY29kaW5nIF0gfVxyXG5cdFx0fSxcclxuXHJcblx0XHR2ZXJ0ZXhTaGFkZXI6IF9nZXRDb21tb25WZXJ0ZXhTaGFkZXIoKSxcclxuXHJcblx0XHRmcmFnbWVudFNoYWRlcjogYFxyXG5wcmVjaXNpb24gbWVkaXVtcCBmbG9hdDtcclxucHJlY2lzaW9uIG1lZGl1bXAgaW50O1xyXG52YXJ5aW5nIHZlYzMgdk91dHB1dERpcmVjdGlvbjtcclxudW5pZm9ybSBzYW1wbGVyMkQgZW52TWFwO1xyXG51bmlmb3JtIGludCBzYW1wbGVzO1xyXG51bmlmb3JtIGZsb2F0IHdlaWdodHNbbl07XHJcbnVuaWZvcm0gYm9vbCBsYXRpdHVkaW5hbDtcclxudW5pZm9ybSBmbG9hdCBkVGhldGE7XHJcbnVuaWZvcm0gZmxvYXQgbWlwSW50O1xyXG51bmlmb3JtIHZlYzMgcG9sZUF4aXM7XHJcblxyXG4ke19nZXRFbmNvZGluZ3MoKX1cclxuXHJcbiNkZWZpbmUgRU5WTUFQX1RZUEVfQ1VCRV9VVlxyXG4jaW5jbHVkZSA8Y3ViZV91dl9yZWZsZWN0aW9uX2ZyYWdtZW50PlxyXG5cclxudmVjMyBnZXRTYW1wbGUoZmxvYXQgdGhldGEsIHZlYzMgYXhpcykge1xyXG5cdGZsb2F0IGNvc1RoZXRhID0gY29zKHRoZXRhKTtcclxuXHQvLyBSb2RyaWd1ZXMnIGF4aXMtYW5nbGUgcm90YXRpb25cclxuXHR2ZWMzIHNhbXBsZURpcmVjdGlvbiA9IHZPdXRwdXREaXJlY3Rpb24gKiBjb3NUaGV0YVxyXG5cdFx0KyBjcm9zcyhheGlzLCB2T3V0cHV0RGlyZWN0aW9uKSAqIHNpbih0aGV0YSlcclxuXHRcdCsgYXhpcyAqIGRvdChheGlzLCB2T3V0cHV0RGlyZWN0aW9uKSAqICgxLjAgLSBjb3NUaGV0YSk7XHJcblx0cmV0dXJuIGJpbGluZWFyQ3ViZVVWKGVudk1hcCwgc2FtcGxlRGlyZWN0aW9uLCBtaXBJbnQpO1xyXG59XHJcblxyXG52b2lkIG1haW4oKSB7XHJcblx0dmVjMyBheGlzID0gbGF0aXR1ZGluYWwgPyBwb2xlQXhpcyA6IGNyb3NzKHBvbGVBeGlzLCB2T3V0cHV0RGlyZWN0aW9uKTtcclxuXHRpZiAoYWxsKGVxdWFsKGF4aXMsIHZlYzMoMC4wKSkpKVxyXG5cdFx0YXhpcyA9IHZlYzModk91dHB1dERpcmVjdGlvbi56LCAwLjAsIC0gdk91dHB1dERpcmVjdGlvbi54KTtcclxuXHRheGlzID0gbm9ybWFsaXplKGF4aXMpO1xyXG5cdGdsX0ZyYWdDb2xvciA9IHZlYzQoMC4wKTtcclxuXHRnbF9GcmFnQ29sb3IucmdiICs9IHdlaWdodHNbMF0gKiBnZXRTYW1wbGUoMC4wLCBheGlzKTtcclxuXHRmb3IgKGludCBpID0gMTsgaSA8IG47IGkrKykge1xyXG5cdFx0aWYgKGkgPj0gc2FtcGxlcylcclxuXHRcdFx0YnJlYWs7XHJcblx0XHRmbG9hdCB0aGV0YSA9IGRUaGV0YSAqIGZsb2F0KGkpO1xyXG5cdFx0Z2xfRnJhZ0NvbG9yLnJnYiArPSB3ZWlnaHRzW2ldICogZ2V0U2FtcGxlKC0xLjAgKiB0aGV0YSwgYXhpcyk7XHJcblx0XHRnbF9GcmFnQ29sb3IucmdiICs9IHdlaWdodHNbaV0gKiBnZXRTYW1wbGUodGhldGEsIGF4aXMpO1xyXG5cdH1cclxuXHRnbF9GcmFnQ29sb3IgPSBsaW5lYXJUb091dHB1dFRleGVsKGdsX0ZyYWdDb2xvcik7XHJcbn1cclxuXHRcdGAsXHJcblxyXG5cdFx0YmxlbmRpbmc6IE5vQmxlbmRpbmcsXHJcblx0XHRkZXB0aFRlc3Q6IGZhbHNlLFxyXG5cdFx0ZGVwdGhXcml0ZTogZmFsc2VcclxuXHJcblx0fSApO1xyXG5cclxuXHRzaGFkZXJNYXRlcmlhbC50eXBlID0gJ1NwaGVyaWNhbEdhdXNzaWFuQmx1cic7XHJcblxyXG5cdHJldHVybiBzaGFkZXJNYXRlcmlhbDtcclxuXHJcbn1cclxuXHJcbmZ1bmN0aW9uIF9nZXRFcXVpcmVjdFNoYWRlcigpIHtcclxuXHJcblx0dmFyIHRleGVsU2l6ZSA9IG5ldyBWZWN0b3IyKCAxLCAxICk7XHJcblx0dmFyIHNoYWRlck1hdGVyaWFsID0gbmV3IFJhd1NoYWRlck1hdGVyaWFsKCB7XHJcblxyXG5cdFx0dW5pZm9ybXM6IHtcclxuXHRcdFx0J2Vudk1hcCc6IHsgdmFsdWU6IG51bGwgfSxcclxuXHRcdFx0J3RleGVsU2l6ZSc6IHsgdmFsdWU6IHRleGVsU2l6ZSB9LFxyXG5cdFx0XHQnaW5wdXRFbmNvZGluZyc6IHsgdmFsdWU6IEVOQ09ESU5HU1sgTGluZWFyRW5jb2RpbmcgXSB9LFxyXG5cdFx0XHQnb3V0cHV0RW5jb2RpbmcnOiB7IHZhbHVlOiBFTkNPRElOR1NbIExpbmVhckVuY29kaW5nIF0gfVxyXG5cdFx0fSxcclxuXHJcblx0XHR2ZXJ0ZXhTaGFkZXI6IF9nZXRDb21tb25WZXJ0ZXhTaGFkZXIoKSxcclxuXHJcblx0XHRmcmFnbWVudFNoYWRlcjogYFxyXG5wcmVjaXNpb24gbWVkaXVtcCBmbG9hdDtcclxucHJlY2lzaW9uIG1lZGl1bXAgaW50O1xyXG52YXJ5aW5nIHZlYzMgdk91dHB1dERpcmVjdGlvbjtcclxudW5pZm9ybSBzYW1wbGVyMkQgZW52TWFwO1xyXG51bmlmb3JtIHZlYzIgdGV4ZWxTaXplO1xyXG5cclxuJHtfZ2V0RW5jb2RpbmdzKCl9XHJcblxyXG4jZGVmaW5lIFJFQ0lQUk9DQUxfUEkgMC4zMTgzMDk4ODYxOFxyXG4jZGVmaW5lIFJFQ0lQUk9DQUxfUEkyIDAuMTU5MTU0OTRcclxuXHJcbnZvaWQgbWFpbigpIHtcclxuXHRnbF9GcmFnQ29sb3IgPSB2ZWM0KDAuMCk7XHJcblx0dmVjMyBvdXRwdXREaXJlY3Rpb24gPSBub3JtYWxpemUodk91dHB1dERpcmVjdGlvbik7XHJcblx0dmVjMiB1djtcclxuXHR1di55ID0gYXNpbihjbGFtcChvdXRwdXREaXJlY3Rpb24ueSwgLTEuMCwgMS4wKSkgKiBSRUNJUFJPQ0FMX1BJICsgMC41O1xyXG5cdHV2LnggPSBhdGFuKG91dHB1dERpcmVjdGlvbi56LCBvdXRwdXREaXJlY3Rpb24ueCkgKiBSRUNJUFJPQ0FMX1BJMiArIDAuNTtcclxuXHR2ZWMyIGYgPSBmcmFjdCh1diAvIHRleGVsU2l6ZSAtIDAuNSk7XHJcblx0dXYgLT0gZiAqIHRleGVsU2l6ZTtcclxuXHR2ZWMzIHRsID0gZW52TWFwVGV4ZWxUb0xpbmVhcih0ZXh0dXJlMkQoZW52TWFwLCB1dikpLnJnYjtcclxuXHR1di54ICs9IHRleGVsU2l6ZS54O1xyXG5cdHZlYzMgdHIgPSBlbnZNYXBUZXhlbFRvTGluZWFyKHRleHR1cmUyRChlbnZNYXAsIHV2KSkucmdiO1xyXG5cdHV2LnkgKz0gdGV4ZWxTaXplLnk7XHJcblx0dmVjMyBiciA9IGVudk1hcFRleGVsVG9MaW5lYXIodGV4dHVyZTJEKGVudk1hcCwgdXYpKS5yZ2I7XHJcblx0dXYueCAtPSB0ZXhlbFNpemUueDtcclxuXHR2ZWMzIGJsID0gZW52TWFwVGV4ZWxUb0xpbmVhcih0ZXh0dXJlMkQoZW52TWFwLCB1dikpLnJnYjtcclxuXHR2ZWMzIHRtID0gbWl4KHRsLCB0ciwgZi54KTtcclxuXHR2ZWMzIGJtID0gbWl4KGJsLCBiciwgZi54KTtcclxuXHRnbF9GcmFnQ29sb3IucmdiID0gbWl4KHRtLCBibSwgZi55KTtcclxuXHRnbF9GcmFnQ29sb3IgPSBsaW5lYXJUb091dHB1dFRleGVsKGdsX0ZyYWdDb2xvcik7XHJcbn1cclxuXHRcdGAsXHJcblxyXG5cdFx0YmxlbmRpbmc6IE5vQmxlbmRpbmcsXHJcblx0XHRkZXB0aFRlc3Q6IGZhbHNlLFxyXG5cdFx0ZGVwdGhXcml0ZTogZmFsc2VcclxuXHJcblx0fSApO1xyXG5cclxuXHRzaGFkZXJNYXRlcmlhbC50eXBlID0gJ0VxdWlyZWN0YW5ndWxhclRvQ3ViZVVWJztcclxuXHJcblx0cmV0dXJuIHNoYWRlck1hdGVyaWFsO1xyXG5cclxufVxyXG5cclxuZnVuY3Rpb24gX2dldEN1YmVtYXBTaGFkZXIoKSB7XHJcblxyXG5cdHZhciBzaGFkZXJNYXRlcmlhbCA9IG5ldyBSYXdTaGFkZXJNYXRlcmlhbCgge1xyXG5cclxuXHRcdHVuaWZvcm1zOiB7XHJcblx0XHRcdCdlbnZNYXAnOiB7IHZhbHVlOiBudWxsIH0sXHJcblx0XHRcdCdpbnB1dEVuY29kaW5nJzogeyB2YWx1ZTogRU5DT0RJTkdTWyBMaW5lYXJFbmNvZGluZyBdIH0sXHJcblx0XHRcdCdvdXRwdXRFbmNvZGluZyc6IHsgdmFsdWU6IEVOQ09ESU5HU1sgTGluZWFyRW5jb2RpbmcgXSB9XHJcblx0XHR9LFxyXG5cclxuXHRcdHZlcnRleFNoYWRlcjogX2dldENvbW1vblZlcnRleFNoYWRlcigpLFxyXG5cclxuXHRcdGZyYWdtZW50U2hhZGVyOiBgXHJcbnByZWNpc2lvbiBtZWRpdW1wIGZsb2F0O1xyXG5wcmVjaXNpb24gbWVkaXVtcCBpbnQ7XHJcbnZhcnlpbmcgdmVjMyB2T3V0cHV0RGlyZWN0aW9uO1xyXG51bmlmb3JtIHNhbXBsZXJDdWJlIGVudk1hcDtcclxuXHJcbiR7X2dldEVuY29kaW5ncygpfVxyXG5cclxudm9pZCBtYWluKCkge1xyXG5cdGdsX0ZyYWdDb2xvciA9IHZlYzQoMC4wKTtcclxuXHRnbF9GcmFnQ29sb3IucmdiID0gZW52TWFwVGV4ZWxUb0xpbmVhcih0ZXh0dXJlQ3ViZShlbnZNYXAsIHZlYzMoIC0gdk91dHB1dERpcmVjdGlvbi54LCB2T3V0cHV0RGlyZWN0aW9uLnl6ICkpKS5yZ2I7XHJcblx0Z2xfRnJhZ0NvbG9yID0gbGluZWFyVG9PdXRwdXRUZXhlbChnbF9GcmFnQ29sb3IpO1xyXG59XHJcblx0XHRgLFxyXG5cclxuXHRcdGJsZW5kaW5nOiBOb0JsZW5kaW5nLFxyXG5cdFx0ZGVwdGhUZXN0OiBmYWxzZSxcclxuXHRcdGRlcHRoV3JpdGU6IGZhbHNlXHJcblxyXG5cdH0gKTtcclxuXHJcblx0c2hhZGVyTWF0ZXJpYWwudHlwZSA9ICdDdWJlbWFwVG9DdWJlVVYnO1xyXG5cclxuXHRyZXR1cm4gc2hhZGVyTWF0ZXJpYWw7XHJcblxyXG59XHJcblxyXG5mdW5jdGlvbiBfZ2V0Q29tbW9uVmVydGV4U2hhZGVyKCkge1xyXG5cclxuXHRyZXR1cm4gYFxyXG5wcmVjaXNpb24gbWVkaXVtcCBmbG9hdDtcclxucHJlY2lzaW9uIG1lZGl1bXAgaW50O1xyXG5hdHRyaWJ1dGUgdmVjMyBwb3NpdGlvbjtcclxuYXR0cmlidXRlIHZlYzIgdXY7XHJcbmF0dHJpYnV0ZSBmbG9hdCBmYWNlSW5kZXg7XHJcbnZhcnlpbmcgdmVjMyB2T3V0cHV0RGlyZWN0aW9uO1xyXG52ZWMzIGdldERpcmVjdGlvbih2ZWMyIHV2LCBmbG9hdCBmYWNlKSB7XHJcblx0dXYgPSAyLjAgKiB1diAtIDEuMDtcclxuXHR2ZWMzIGRpcmVjdGlvbiA9IHZlYzModXYsIDEuMCk7XHJcblx0aWYgKGZhY2UgPT0gMC4wKSB7XHJcblx0XHRkaXJlY3Rpb24gPSBkaXJlY3Rpb24uenl4O1xyXG5cdFx0ZGlyZWN0aW9uLnogKj0gLTEuMDtcclxuXHR9IGVsc2UgaWYgKGZhY2UgPT0gMS4wKSB7XHJcblx0XHRkaXJlY3Rpb24gPSBkaXJlY3Rpb24ueHp5O1xyXG5cdFx0ZGlyZWN0aW9uLnogKj0gLTEuMDtcclxuXHR9IGVsc2UgaWYgKGZhY2UgPT0gMy4wKSB7XHJcblx0XHRkaXJlY3Rpb24gPSBkaXJlY3Rpb24uenl4O1xyXG5cdFx0ZGlyZWN0aW9uLnggKj0gLTEuMDtcclxuXHR9IGVsc2UgaWYgKGZhY2UgPT0gNC4wKSB7XHJcblx0XHRkaXJlY3Rpb24gPSBkaXJlY3Rpb24ueHp5O1xyXG5cdFx0ZGlyZWN0aW9uLnkgKj0gLTEuMDtcclxuXHR9IGVsc2UgaWYgKGZhY2UgPT0gNS4wKSB7XHJcblx0XHRkaXJlY3Rpb24ueHogKj0gLTEuMDtcclxuXHR9XHJcblx0cmV0dXJuIGRpcmVjdGlvbjtcclxufVxyXG52b2lkIG1haW4oKSB7XHJcblx0dk91dHB1dERpcmVjdGlvbiA9IGdldERpcmVjdGlvbih1diwgZmFjZUluZGV4KTtcclxuXHRnbF9Qb3NpdGlvbiA9IHZlYzQoIHBvc2l0aW9uLCAxLjAgKTtcclxufVxyXG5cdGA7XHJcblxyXG59XHJcblxyXG5mdW5jdGlvbiBfZ2V0RW5jb2RpbmdzKCkge1xyXG5cclxuXHRyZXR1cm4gYFxyXG51bmlmb3JtIGludCBpbnB1dEVuY29kaW5nO1xyXG51bmlmb3JtIGludCBvdXRwdXRFbmNvZGluZztcclxuXHJcbiNpbmNsdWRlIDxlbmNvZGluZ3NfcGFyc19mcmFnbWVudD5cclxuXHJcbnZlYzQgaW5wdXRUZXhlbFRvTGluZWFyKHZlYzQgdmFsdWUpe1xyXG5cdGlmKGlucHV0RW5jb2RpbmcgPT0gMCl7XHJcblx0XHRyZXR1cm4gdmFsdWU7XHJcblx0fWVsc2UgaWYoaW5wdXRFbmNvZGluZyA9PSAxKXtcclxuXHRcdHJldHVybiBzUkdCVG9MaW5lYXIodmFsdWUpO1xyXG5cdH1lbHNlIGlmKGlucHV0RW5jb2RpbmcgPT0gMil7XHJcblx0XHRyZXR1cm4gUkdCRVRvTGluZWFyKHZhbHVlKTtcclxuXHR9ZWxzZSBpZihpbnB1dEVuY29kaW5nID09IDMpe1xyXG5cdFx0cmV0dXJuIFJHQk1Ub0xpbmVhcih2YWx1ZSwgNy4wKTtcclxuXHR9ZWxzZSBpZihpbnB1dEVuY29kaW5nID09IDQpe1xyXG5cdFx0cmV0dXJuIFJHQk1Ub0xpbmVhcih2YWx1ZSwgMTYuMCk7XHJcblx0fWVsc2UgaWYoaW5wdXRFbmNvZGluZyA9PSA1KXtcclxuXHRcdHJldHVybiBSR0JEVG9MaW5lYXIodmFsdWUsIDI1Ni4wKTtcclxuXHR9ZWxzZXtcclxuXHRcdHJldHVybiBHYW1tYVRvTGluZWFyKHZhbHVlLCAyLjIpO1xyXG5cdH1cclxufVxyXG5cclxudmVjNCBsaW5lYXJUb091dHB1dFRleGVsKHZlYzQgdmFsdWUpe1xyXG5cdGlmKG91dHB1dEVuY29kaW5nID09IDApe1xyXG5cdFx0cmV0dXJuIHZhbHVlO1xyXG5cdH1lbHNlIGlmKG91dHB1dEVuY29kaW5nID09IDEpe1xyXG5cdFx0cmV0dXJuIExpbmVhclRvc1JHQih2YWx1ZSk7XHJcblx0fWVsc2UgaWYob3V0cHV0RW5jb2RpbmcgPT0gMil7XHJcblx0XHRyZXR1cm4gTGluZWFyVG9SR0JFKHZhbHVlKTtcclxuXHR9ZWxzZSBpZihvdXRwdXRFbmNvZGluZyA9PSAzKXtcclxuXHRcdHJldHVybiBMaW5lYXJUb1JHQk0odmFsdWUsIDcuMCk7XHJcblx0fWVsc2UgaWYob3V0cHV0RW5jb2RpbmcgPT0gNCl7XHJcblx0XHRyZXR1cm4gTGluZWFyVG9SR0JNKHZhbHVlLCAxNi4wKTtcclxuXHR9ZWxzZSBpZihvdXRwdXRFbmNvZGluZyA9PSA1KXtcclxuXHRcdHJldHVybiBMaW5lYXJUb1JHQkQodmFsdWUsIDI1Ni4wKTtcclxuXHR9ZWxzZXtcclxuXHRcdHJldHVybiBMaW5lYXJUb0dhbW1hKHZhbHVlLCAyLjIpO1xyXG5cdH1cclxufVxyXG5cclxudmVjNCBlbnZNYXBUZXhlbFRvTGluZWFyKHZlYzQgY29sb3IpIHtcclxuXHRyZXR1cm4gaW5wdXRUZXhlbFRvTGluZWFyKGNvbG9yKTtcclxufVxyXG5cdGA7XHJcblxyXG59XHJcblxyXG5leHBvcnQgeyBQTVJFTUdlbmVyYXRvciB9O1xyXG4iLCJjb25zdCB7XHJcblx0RGF0YVRleHR1cmVMb2FkZXIsXHJcblx0RGF0YVV0aWxzLFxyXG5cdEZsb2F0VHlwZSxcclxuXHRIYWxmRmxvYXRUeXBlLFxyXG5cdExpbmVhckVuY29kaW5nLFxyXG5cdExpbmVhckZpbHRlclxyXG59ID0gVEhSRUU7XHJcblxyXG4vLyBodHRwczovL2dpdGh1Yi5jb20vbXJkb29iL3RocmVlLmpzL2lzc3Vlcy81NTUyXHJcbi8vIGh0dHA6Ly9lbi53aWtpcGVkaWEub3JnL3dpa2kvUkdCRV9pbWFnZV9mb3JtYXRcclxuXHJcbmNsYXNzIFJHQkVMb2FkZXIgZXh0ZW5kcyBEYXRhVGV4dHVyZUxvYWRlciB7XHJcblxyXG5cdGNvbnN0cnVjdG9yKCBtYW5hZ2VyICkge1xyXG5cclxuXHRcdHN1cGVyKCBtYW5hZ2VyICk7XHJcblxyXG5cdFx0dGhpcy50eXBlID0gSGFsZkZsb2F0VHlwZTtcclxuXHJcblx0fVxyXG5cclxuXHQvLyBhZGFwdGVkIGZyb20gaHR0cDovL3d3dy5ncmFwaGljcy5jb3JuZWxsLmVkdS9+Ymp3L3JnYmUuaHRtbFxyXG5cclxuXHRwYXJzZSggYnVmZmVyICkge1xyXG5cclxuXHRcdGNvbnN0XHJcblx0XHRcdC8qIHJldHVybiBjb2RlcyBmb3IgcmdiZSByb3V0aW5lcyAqL1xyXG5cdFx0XHQvL1JHQkVfUkVUVVJOX1NVQ0NFU1MgPSAwLFxyXG5cdFx0XHRSR0JFX1JFVFVSTl9GQUlMVVJFID0gLSAxLFxyXG5cclxuXHRcdFx0LyogZGVmYXVsdCBlcnJvciByb3V0aW5lLiAgY2hhbmdlIHRoaXMgdG8gY2hhbmdlIGVycm9yIGhhbmRsaW5nICovXHJcblx0XHRcdHJnYmVfcmVhZF9lcnJvciA9IDEsXHJcblx0XHRcdHJnYmVfd3JpdGVfZXJyb3IgPSAyLFxyXG5cdFx0XHRyZ2JlX2Zvcm1hdF9lcnJvciA9IDMsXHJcblx0XHRcdHJnYmVfbWVtb3J5X2Vycm9yID0gNCxcclxuXHRcdFx0cmdiZV9lcnJvciA9IGZ1bmN0aW9uICggcmdiZV9lcnJvcl9jb2RlLCBtc2cgKSB7XHJcblxyXG5cdFx0XHRcdHN3aXRjaCAoIHJnYmVfZXJyb3JfY29kZSApIHtcclxuXHJcblx0XHRcdFx0XHRjYXNlIHJnYmVfcmVhZF9lcnJvcjogY29uc29sZS5lcnJvciggJ1RIUkVFLlJHQkVMb2FkZXIgUmVhZCBFcnJvcjogJyArICggbXNnIHx8ICcnICkgKTtcclxuXHRcdFx0XHRcdFx0YnJlYWs7XHJcblx0XHRcdFx0XHRjYXNlIHJnYmVfd3JpdGVfZXJyb3I6IGNvbnNvbGUuZXJyb3IoICdUSFJFRS5SR0JFTG9hZGVyIFdyaXRlIEVycm9yOiAnICsgKCBtc2cgfHwgJycgKSApO1xyXG5cdFx0XHRcdFx0XHRicmVhaztcclxuXHRcdFx0XHRcdGNhc2UgcmdiZV9mb3JtYXRfZXJyb3I6IGNvbnNvbGUuZXJyb3IoICdUSFJFRS5SR0JFTG9hZGVyIEJhZCBGaWxlIEZvcm1hdDogJyArICggbXNnIHx8ICcnICkgKTtcclxuXHRcdFx0XHRcdFx0YnJlYWs7XHJcblx0XHRcdFx0XHRkZWZhdWx0OlxyXG5cdFx0XHRcdFx0Y2FzZSByZ2JlX21lbW9yeV9lcnJvcjogY29uc29sZS5lcnJvciggJ1RIUkVFLlJHQkVMb2FkZXI6IEVycm9yOiAnICsgKCBtc2cgfHwgJycgKSApO1xyXG5cclxuXHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdHJldHVybiBSR0JFX1JFVFVSTl9GQUlMVVJFO1xyXG5cclxuXHRcdFx0fSxcclxuXHJcblx0XHRcdC8qIG9mZnNldHMgdG8gcmVkLCBncmVlbiwgYW5kIGJsdWUgY29tcG9uZW50cyBpbiBhIGRhdGEgKGZsb2F0KSBwaXhlbCAqL1xyXG5cdFx0XHQvL1JHQkVfREFUQV9SRUQgPSAwLFxyXG5cdFx0XHQvL1JHQkVfREFUQV9HUkVFTiA9IDEsXHJcblx0XHRcdC8vUkdCRV9EQVRBX0JMVUUgPSAyLFxyXG5cclxuXHRcdFx0LyogbnVtYmVyIG9mIGZsb2F0cyBwZXIgcGl4ZWwsIHVzZSA0IHNpbmNlIHN0b3JlZCBpbiByZ2JhIGltYWdlIGZvcm1hdCAqL1xyXG5cdFx0XHQvL1JHQkVfREFUQV9TSVpFID0gNCxcclxuXHJcblx0XHRcdC8qIGZsYWdzIGluZGljYXRpbmcgd2hpY2ggZmllbGRzIGluIGFuIHJnYmVfaGVhZGVyX2luZm8gYXJlIHZhbGlkICovXHJcblx0XHRcdFJHQkVfVkFMSURfUFJPR1JBTVRZUEUgPSAxLFxyXG5cdFx0XHRSR0JFX1ZBTElEX0ZPUk1BVCA9IDIsXHJcblx0XHRcdFJHQkVfVkFMSURfRElNRU5TSU9OUyA9IDQsXHJcblxyXG5cdFx0XHRORVdMSU5FID0gJ1xcbicsXHJcblxyXG5cdFx0XHRmZ2V0cyA9IGZ1bmN0aW9uICggYnVmZmVyLCBsaW5lTGltaXQsIGNvbnN1bWUgKSB7XHJcblxyXG5cdFx0XHRcdGNvbnN0IGNodW5rU2l6ZSA9IDEyODtcclxuXHJcblx0XHRcdFx0bGluZUxpbWl0ID0gISBsaW5lTGltaXQgPyAxMDI0IDogbGluZUxpbWl0O1xyXG5cdFx0XHRcdGxldCBwID0gYnVmZmVyLnBvcyxcclxuXHRcdFx0XHRcdGkgPSAtIDEsIGxlbiA9IDAsIHMgPSAnJyxcclxuXHRcdFx0XHRcdGNodW5rID0gU3RyaW5nLmZyb21DaGFyQ29kZS5hcHBseSggbnVsbCwgbmV3IFVpbnQxNkFycmF5KCBidWZmZXIuc3ViYXJyYXkoIHAsIHAgKyBjaHVua1NpemUgKSApICk7XHJcblxyXG5cdFx0XHRcdHdoaWxlICggKCAwID4gKCBpID0gY2h1bmsuaW5kZXhPZiggTkVXTElORSApICkgKSAmJiAoIGxlbiA8IGxpbmVMaW1pdCApICYmICggcCA8IGJ1ZmZlci5ieXRlTGVuZ3RoICkgKSB7XHJcblxyXG5cdFx0XHRcdFx0cyArPSBjaHVuazsgbGVuICs9IGNodW5rLmxlbmd0aDtcclxuXHRcdFx0XHRcdHAgKz0gY2h1bmtTaXplO1xyXG5cdFx0XHRcdFx0Y2h1bmsgKz0gU3RyaW5nLmZyb21DaGFyQ29kZS5hcHBseSggbnVsbCwgbmV3IFVpbnQxNkFycmF5KCBidWZmZXIuc3ViYXJyYXkoIHAsIHAgKyBjaHVua1NpemUgKSApICk7XHJcblxyXG5cdFx0XHRcdH1cclxuXHJcblx0XHRcdFx0aWYgKCAtIDEgPCBpICkge1xyXG5cclxuXHRcdFx0XHRcdC8qZm9yIChpPWwtMTsgaT49MDsgaS0tKSB7XHJcblx0XHRcdFx0XHRcdGJ5dGVDb2RlID0gbS5jaGFyQ29kZUF0KGkpO1xyXG5cdFx0XHRcdFx0XHRpZiAoYnl0ZUNvZGUgPiAweDdmICYmIGJ5dGVDb2RlIDw9IDB4N2ZmKSBieXRlTGVuKys7XHJcblx0XHRcdFx0XHRcdGVsc2UgaWYgKGJ5dGVDb2RlID4gMHg3ZmYgJiYgYnl0ZUNvZGUgPD0gMHhmZmZmKSBieXRlTGVuICs9IDI7XHJcblx0XHRcdFx0XHRcdGlmIChieXRlQ29kZSA+PSAweERDMDAgJiYgYnl0ZUNvZGUgPD0gMHhERkZGKSBpLS07IC8vdHJhaWwgc3Vycm9nYXRlXHJcblx0XHRcdFx0XHR9Ki9cclxuXHRcdFx0XHRcdGlmICggZmFsc2UgIT09IGNvbnN1bWUgKSBidWZmZXIucG9zICs9IGxlbiArIGkgKyAxO1xyXG5cdFx0XHRcdFx0cmV0dXJuIHMgKyBjaHVuay5zbGljZSggMCwgaSApO1xyXG5cclxuXHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdHJldHVybiBmYWxzZTtcclxuXHJcblx0XHRcdH0sXHJcblxyXG5cdFx0XHQvKiBtaW5pbWFsIGhlYWRlciByZWFkaW5nLiAgbW9kaWZ5IGlmIHlvdSB3YW50IHRvIHBhcnNlIG1vcmUgaW5mb3JtYXRpb24gKi9cclxuXHRcdFx0UkdCRV9SZWFkSGVhZGVyID0gZnVuY3Rpb24gKCBidWZmZXIgKSB7XHJcblxyXG5cclxuXHRcdFx0XHQvLyByZWdleGVzIHRvIHBhcnNlIGhlYWRlciBpbmZvIGZpZWxkc1xyXG5cdFx0XHRcdGNvbnN0IG1hZ2ljX3Rva2VuX3JlID0gL14jXFw/KFxcUyspLyxcclxuXHRcdFx0XHRcdGdhbW1hX3JlID0gL15cXHMqR0FNTUFcXHMqPVxccyooXFxkKyhcXC5cXGQrKT8pXFxzKiQvLFxyXG5cdFx0XHRcdFx0ZXhwb3N1cmVfcmUgPSAvXlxccypFWFBPU1VSRVxccyo9XFxzKihcXGQrKFxcLlxcZCspPylcXHMqJC8sXHJcblx0XHRcdFx0XHRmb3JtYXRfcmUgPSAvXlxccypGT1JNQVQ9KFxcUyspXFxzKiQvLFxyXG5cdFx0XHRcdFx0ZGltZW5zaW9uc19yZSA9IC9eXFxzKlxcLVlcXHMrKFxcZCspXFxzK1xcK1hcXHMrKFxcZCspXFxzKiQvLFxyXG5cclxuXHRcdFx0XHRcdC8vIFJHQkUgZm9ybWF0IGhlYWRlciBzdHJ1Y3RcclxuXHRcdFx0XHRcdGhlYWRlciA9IHtcclxuXHJcblx0XHRcdFx0XHRcdHZhbGlkOiAwLCAvKiBpbmRpY2F0ZSB3aGljaCBmaWVsZHMgYXJlIHZhbGlkICovXHJcblxyXG5cdFx0XHRcdFx0XHRzdHJpbmc6ICcnLCAvKiB0aGUgYWN0dWFsIGhlYWRlciBzdHJpbmcgKi9cclxuXHJcblx0XHRcdFx0XHRcdGNvbW1lbnRzOiAnJywgLyogY29tbWVudHMgZm91bmQgaW4gaGVhZGVyICovXHJcblxyXG5cdFx0XHRcdFx0XHRwcm9ncmFtdHlwZTogJ1JHQkUnLCAvKiBsaXN0ZWQgYXQgYmVnaW5uaW5nIG9mIGZpbGUgdG8gaWRlbnRpZnkgaXQgYWZ0ZXIgXCIjP1wiLiBkZWZhdWx0cyB0byBcIlJHQkVcIiAqL1xyXG5cclxuXHRcdFx0XHRcdFx0Zm9ybWF0OiAnJywgLyogUkdCRSBmb3JtYXQsIGRlZmF1bHQgMzItYml0X3JsZV9yZ2JlICovXHJcblxyXG5cdFx0XHRcdFx0XHRnYW1tYTogMS4wLCAvKiBpbWFnZSBoYXMgYWxyZWFkeSBiZWVuIGdhbW1hIGNvcnJlY3RlZCB3aXRoIGdpdmVuIGdhbW1hLiBkZWZhdWx0cyB0byAxLjAgKG5vIGNvcnJlY3Rpb24pICovXHJcblxyXG5cdFx0XHRcdFx0XHRleHBvc3VyZTogMS4wLCAvKiBhIHZhbHVlIG9mIDEuMCBpbiBhbiBpbWFnZSBjb3JyZXNwb25kcyB0byA8ZXhwb3N1cmU+IHdhdHRzL3N0ZXJhZGlhbi9tXjIuIGRlZmF1bHRzIHRvIDEuMCAqL1xyXG5cclxuXHRcdFx0XHRcdFx0d2lkdGg6IDAsIGhlaWdodDogMCAvKiBpbWFnZSBkaW1lbnNpb25zLCB3aWR0aC9oZWlnaHQgKi9cclxuXHJcblx0XHRcdFx0XHR9O1xyXG5cclxuXHRcdFx0XHRsZXQgbGluZSwgbWF0Y2g7XHJcblxyXG5cdFx0XHRcdGlmICggYnVmZmVyLnBvcyA+PSBidWZmZXIuYnl0ZUxlbmd0aCB8fCAhICggbGluZSA9IGZnZXRzKCBidWZmZXIgKSApICkge1xyXG5cclxuXHRcdFx0XHRcdHJldHVybiByZ2JlX2Vycm9yKCByZ2JlX3JlYWRfZXJyb3IsICdubyBoZWFkZXIgZm91bmQnICk7XHJcblxyXG5cdFx0XHRcdH1cclxuXHJcblx0XHRcdFx0LyogaWYgeW91IHdhbnQgdG8gcmVxdWlyZSB0aGUgbWFnaWMgdG9rZW4gdGhlbiB1bmNvbW1lbnQgdGhlIG5leHQgbGluZSAqL1xyXG5cdFx0XHRcdGlmICggISAoIG1hdGNoID0gbGluZS5tYXRjaCggbWFnaWNfdG9rZW5fcmUgKSApICkge1xyXG5cclxuXHRcdFx0XHRcdHJldHVybiByZ2JlX2Vycm9yKCByZ2JlX2Zvcm1hdF9lcnJvciwgJ2JhZCBpbml0aWFsIHRva2VuJyApO1xyXG5cclxuXHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdGhlYWRlci52YWxpZCB8PSBSR0JFX1ZBTElEX1BST0dSQU1UWVBFO1xyXG5cdFx0XHRcdGhlYWRlci5wcm9ncmFtdHlwZSA9IG1hdGNoWyAxIF07XHJcblx0XHRcdFx0aGVhZGVyLnN0cmluZyArPSBsaW5lICsgJ1xcbic7XHJcblxyXG5cdFx0XHRcdHdoaWxlICggdHJ1ZSApIHtcclxuXHJcblx0XHRcdFx0XHRsaW5lID0gZmdldHMoIGJ1ZmZlciApO1xyXG5cdFx0XHRcdFx0aWYgKCBmYWxzZSA9PT0gbGluZSApIGJyZWFrO1xyXG5cdFx0XHRcdFx0aGVhZGVyLnN0cmluZyArPSBsaW5lICsgJ1xcbic7XHJcblxyXG5cdFx0XHRcdFx0aWYgKCAnIycgPT09IGxpbmUuY2hhckF0KCAwICkgKSB7XHJcblxyXG5cdFx0XHRcdFx0XHRoZWFkZXIuY29tbWVudHMgKz0gbGluZSArICdcXG4nO1xyXG5cdFx0XHRcdFx0XHRjb250aW51ZTsgLy8gY29tbWVudCBsaW5lXHJcblxyXG5cdFx0XHRcdFx0fVxyXG5cclxuXHRcdFx0XHRcdGlmICggbWF0Y2ggPSBsaW5lLm1hdGNoKCBnYW1tYV9yZSApICkge1xyXG5cclxuXHRcdFx0XHRcdFx0aGVhZGVyLmdhbW1hID0gcGFyc2VGbG9hdCggbWF0Y2hbIDEgXSApO1xyXG5cclxuXHRcdFx0XHRcdH1cclxuXHJcblx0XHRcdFx0XHRpZiAoIG1hdGNoID0gbGluZS5tYXRjaCggZXhwb3N1cmVfcmUgKSApIHtcclxuXHJcblx0XHRcdFx0XHRcdGhlYWRlci5leHBvc3VyZSA9IHBhcnNlRmxvYXQoIG1hdGNoWyAxIF0gKTtcclxuXHJcblx0XHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdFx0aWYgKCBtYXRjaCA9IGxpbmUubWF0Y2goIGZvcm1hdF9yZSApICkge1xyXG5cclxuXHRcdFx0XHRcdFx0aGVhZGVyLnZhbGlkIHw9IFJHQkVfVkFMSURfRk9STUFUO1xyXG5cdFx0XHRcdFx0XHRoZWFkZXIuZm9ybWF0ID0gbWF0Y2hbIDEgXTsvLyczMi1iaXRfcmxlX3JnYmUnO1xyXG5cclxuXHRcdFx0XHRcdH1cclxuXHJcblx0XHRcdFx0XHRpZiAoIG1hdGNoID0gbGluZS5tYXRjaCggZGltZW5zaW9uc19yZSApICkge1xyXG5cclxuXHRcdFx0XHRcdFx0aGVhZGVyLnZhbGlkIHw9IFJHQkVfVkFMSURfRElNRU5TSU9OUztcclxuXHRcdFx0XHRcdFx0aGVhZGVyLmhlaWdodCA9IHBhcnNlSW50KCBtYXRjaFsgMSBdLCAxMCApO1xyXG5cdFx0XHRcdFx0XHRoZWFkZXIud2lkdGggPSBwYXJzZUludCggbWF0Y2hbIDIgXSwgMTAgKTtcclxuXHJcblx0XHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdFx0aWYgKCAoIGhlYWRlci52YWxpZCAmIFJHQkVfVkFMSURfRk9STUFUICkgJiYgKCBoZWFkZXIudmFsaWQgJiBSR0JFX1ZBTElEX0RJTUVOU0lPTlMgKSApIGJyZWFrO1xyXG5cclxuXHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdGlmICggISAoIGhlYWRlci52YWxpZCAmIFJHQkVfVkFMSURfRk9STUFUICkgKSB7XHJcblxyXG5cdFx0XHRcdFx0cmV0dXJuIHJnYmVfZXJyb3IoIHJnYmVfZm9ybWF0X2Vycm9yLCAnbWlzc2luZyBmb3JtYXQgc3BlY2lmaWVyJyApO1xyXG5cclxuXHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdGlmICggISAoIGhlYWRlci52YWxpZCAmIFJHQkVfVkFMSURfRElNRU5TSU9OUyApICkge1xyXG5cclxuXHRcdFx0XHRcdHJldHVybiByZ2JlX2Vycm9yKCByZ2JlX2Zvcm1hdF9lcnJvciwgJ21pc3NpbmcgaW1hZ2Ugc2l6ZSBzcGVjaWZpZXInICk7XHJcblxyXG5cdFx0XHRcdH1cclxuXHJcblx0XHRcdFx0cmV0dXJuIGhlYWRlcjtcclxuXHJcblx0XHRcdH0sXHJcblxyXG5cdFx0XHRSR0JFX1JlYWRQaXhlbHNfUkxFID0gZnVuY3Rpb24gKCBidWZmZXIsIHcsIGggKSB7XHJcblxyXG5cdFx0XHRcdGNvbnN0IHNjYW5saW5lX3dpZHRoID0gdztcclxuXHJcblx0XHRcdFx0aWYgKFxyXG5cdFx0XHRcdFx0Ly8gcnVuIGxlbmd0aCBlbmNvZGluZyBpcyBub3QgYWxsb3dlZCBzbyByZWFkIGZsYXRcclxuXHRcdFx0XHRcdCggKCBzY2FubGluZV93aWR0aCA8IDggKSB8fCAoIHNjYW5saW5lX3dpZHRoID4gMHg3ZmZmICkgKSB8fFxyXG5cdFx0XHRcdFx0Ly8gdGhpcyBmaWxlIGlzIG5vdCBydW4gbGVuZ3RoIGVuY29kZWRcclxuXHRcdFx0XHRcdCggKCAyICE9PSBidWZmZXJbIDAgXSApIHx8ICggMiAhPT0gYnVmZmVyWyAxIF0gKSB8fCAoIGJ1ZmZlclsgMiBdICYgMHg4MCApIClcclxuXHRcdFx0XHQpIHtcclxuXHJcblx0XHRcdFx0XHQvLyByZXR1cm4gdGhlIGZsYXQgYnVmZmVyXHJcblx0XHRcdFx0XHRyZXR1cm4gbmV3IFVpbnQ4QXJyYXkoIGJ1ZmZlciApO1xyXG5cclxuXHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdGlmICggc2NhbmxpbmVfd2lkdGggIT09ICggKCBidWZmZXJbIDIgXSA8PCA4ICkgfCBidWZmZXJbIDMgXSApICkge1xyXG5cclxuXHRcdFx0XHRcdHJldHVybiByZ2JlX2Vycm9yKCByZ2JlX2Zvcm1hdF9lcnJvciwgJ3dyb25nIHNjYW5saW5lIHdpZHRoJyApO1xyXG5cclxuXHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdGNvbnN0IGRhdGFfcmdiYSA9IG5ldyBVaW50OEFycmF5KCA0ICogdyAqIGggKTtcclxuXHJcblx0XHRcdFx0aWYgKCAhIGRhdGFfcmdiYS5sZW5ndGggKSB7XHJcblxyXG5cdFx0XHRcdFx0cmV0dXJuIHJnYmVfZXJyb3IoIHJnYmVfbWVtb3J5X2Vycm9yLCAndW5hYmxlIHRvIGFsbG9jYXRlIGJ1ZmZlciBzcGFjZScgKTtcclxuXHJcblx0XHRcdFx0fVxyXG5cclxuXHRcdFx0XHRsZXQgb2Zmc2V0ID0gMCwgcG9zID0gMDtcclxuXHJcblx0XHRcdFx0Y29uc3QgcHRyX2VuZCA9IDQgKiBzY2FubGluZV93aWR0aDtcclxuXHRcdFx0XHRjb25zdCByZ2JlU3RhcnQgPSBuZXcgVWludDhBcnJheSggNCApO1xyXG5cdFx0XHRcdGNvbnN0IHNjYW5saW5lX2J1ZmZlciA9IG5ldyBVaW50OEFycmF5KCBwdHJfZW5kICk7XHJcblx0XHRcdFx0bGV0IG51bV9zY2FubGluZXMgPSBoO1xyXG5cclxuXHRcdFx0XHQvLyByZWFkIGluIGVhY2ggc3VjY2Vzc2l2ZSBzY2FubGluZVxyXG5cdFx0XHRcdHdoaWxlICggKCBudW1fc2NhbmxpbmVzID4gMCApICYmICggcG9zIDwgYnVmZmVyLmJ5dGVMZW5ndGggKSApIHtcclxuXHJcblx0XHRcdFx0XHRpZiAoIHBvcyArIDQgPiBidWZmZXIuYnl0ZUxlbmd0aCApIHtcclxuXHJcblx0XHRcdFx0XHRcdHJldHVybiByZ2JlX2Vycm9yKCByZ2JlX3JlYWRfZXJyb3IgKTtcclxuXHJcblx0XHRcdFx0XHR9XHJcblxyXG5cdFx0XHRcdFx0cmdiZVN0YXJ0WyAwIF0gPSBidWZmZXJbIHBvcyArKyBdO1xyXG5cdFx0XHRcdFx0cmdiZVN0YXJ0WyAxIF0gPSBidWZmZXJbIHBvcyArKyBdO1xyXG5cdFx0XHRcdFx0cmdiZVN0YXJ0WyAyIF0gPSBidWZmZXJbIHBvcyArKyBdO1xyXG5cdFx0XHRcdFx0cmdiZVN0YXJ0WyAzIF0gPSBidWZmZXJbIHBvcyArKyBdO1xyXG5cclxuXHRcdFx0XHRcdGlmICggKCAyICE9IHJnYmVTdGFydFsgMCBdICkgfHwgKCAyICE9IHJnYmVTdGFydFsgMSBdICkgfHwgKCAoICggcmdiZVN0YXJ0WyAyIF0gPDwgOCApIHwgcmdiZVN0YXJ0WyAzIF0gKSAhPSBzY2FubGluZV93aWR0aCApICkge1xyXG5cclxuXHRcdFx0XHRcdFx0cmV0dXJuIHJnYmVfZXJyb3IoIHJnYmVfZm9ybWF0X2Vycm9yLCAnYmFkIHJnYmUgc2NhbmxpbmUgZm9ybWF0JyApO1xyXG5cclxuXHRcdFx0XHRcdH1cclxuXHJcblx0XHRcdFx0XHQvLyByZWFkIGVhY2ggb2YgdGhlIGZvdXIgY2hhbm5lbHMgZm9yIHRoZSBzY2FubGluZSBpbnRvIHRoZSBidWZmZXJcclxuXHRcdFx0XHRcdC8vIGZpcnN0IHJlZCwgdGhlbiBncmVlbiwgdGhlbiBibHVlLCB0aGVuIGV4cG9uZW50XHJcblx0XHRcdFx0XHRsZXQgcHRyID0gMCwgY291bnQ7XHJcblxyXG5cdFx0XHRcdFx0d2hpbGUgKCAoIHB0ciA8IHB0cl9lbmQgKSAmJiAoIHBvcyA8IGJ1ZmZlci5ieXRlTGVuZ3RoICkgKSB7XHJcblxyXG5cdFx0XHRcdFx0XHRjb3VudCA9IGJ1ZmZlclsgcG9zICsrIF07XHJcblx0XHRcdFx0XHRcdGNvbnN0IGlzRW5jb2RlZFJ1biA9IGNvdW50ID4gMTI4O1xyXG5cdFx0XHRcdFx0XHRpZiAoIGlzRW5jb2RlZFJ1biApIGNvdW50IC09IDEyODtcclxuXHJcblx0XHRcdFx0XHRcdGlmICggKCAwID09PSBjb3VudCApIHx8ICggcHRyICsgY291bnQgPiBwdHJfZW5kICkgKSB7XHJcblxyXG5cdFx0XHRcdFx0XHRcdHJldHVybiByZ2JlX2Vycm9yKCByZ2JlX2Zvcm1hdF9lcnJvciwgJ2JhZCBzY2FubGluZSBkYXRhJyApO1xyXG5cclxuXHRcdFx0XHRcdFx0fVxyXG5cclxuXHRcdFx0XHRcdFx0aWYgKCBpc0VuY29kZWRSdW4gKSB7XHJcblxyXG5cdFx0XHRcdFx0XHRcdC8vIGEgKGVuY29kZWQpIHJ1biBvZiB0aGUgc2FtZSB2YWx1ZVxyXG5cdFx0XHRcdFx0XHRcdGNvbnN0IGJ5dGVWYWx1ZSA9IGJ1ZmZlclsgcG9zICsrIF07XHJcblx0XHRcdFx0XHRcdFx0Zm9yICggbGV0IGkgPSAwOyBpIDwgY291bnQ7IGkgKysgKSB7XHJcblxyXG5cdFx0XHRcdFx0XHRcdFx0c2NhbmxpbmVfYnVmZmVyWyBwdHIgKysgXSA9IGJ5dGVWYWx1ZTtcclxuXHJcblx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHRcdC8vcHRyICs9IGNvdW50O1xyXG5cclxuXHRcdFx0XHRcdFx0fSBlbHNlIHtcclxuXHJcblx0XHRcdFx0XHRcdFx0Ly8gYSBsaXRlcmFsLXJ1blxyXG5cdFx0XHRcdFx0XHRcdHNjYW5saW5lX2J1ZmZlci5zZXQoIGJ1ZmZlci5zdWJhcnJheSggcG9zLCBwb3MgKyBjb3VudCApLCBwdHIgKTtcclxuXHRcdFx0XHRcdFx0XHRwdHIgKz0gY291bnQ7IHBvcyArPSBjb3VudDtcclxuXHJcblx0XHRcdFx0XHRcdH1cclxuXHJcblx0XHRcdFx0XHR9XHJcblxyXG5cclxuXHRcdFx0XHRcdC8vIG5vdyBjb252ZXJ0IGRhdGEgZnJvbSBidWZmZXIgaW50byByZ2JhXHJcblx0XHRcdFx0XHQvLyBmaXJzdCByZWQsIHRoZW4gZ3JlZW4sIHRoZW4gYmx1ZSwgdGhlbiBleHBvbmVudCAoYWxwaGEpXHJcblx0XHRcdFx0XHRjb25zdCBsID0gc2NhbmxpbmVfd2lkdGg7IC8vc2NhbmxpbmVfYnVmZmVyLmJ5dGVMZW5ndGg7XHJcblx0XHRcdFx0XHRmb3IgKCBsZXQgaSA9IDA7IGkgPCBsOyBpICsrICkge1xyXG5cclxuXHRcdFx0XHRcdFx0bGV0IG9mZiA9IDA7XHJcblx0XHRcdFx0XHRcdGRhdGFfcmdiYVsgb2Zmc2V0IF0gPSBzY2FubGluZV9idWZmZXJbIGkgKyBvZmYgXTtcclxuXHRcdFx0XHRcdFx0b2ZmICs9IHNjYW5saW5lX3dpZHRoOyAvLzE7XHJcblx0XHRcdFx0XHRcdGRhdGFfcmdiYVsgb2Zmc2V0ICsgMSBdID0gc2NhbmxpbmVfYnVmZmVyWyBpICsgb2ZmIF07XHJcblx0XHRcdFx0XHRcdG9mZiArPSBzY2FubGluZV93aWR0aDsgLy8xO1xyXG5cdFx0XHRcdFx0XHRkYXRhX3JnYmFbIG9mZnNldCArIDIgXSA9IHNjYW5saW5lX2J1ZmZlclsgaSArIG9mZiBdO1xyXG5cdFx0XHRcdFx0XHRvZmYgKz0gc2NhbmxpbmVfd2lkdGg7IC8vMTtcclxuXHRcdFx0XHRcdFx0ZGF0YV9yZ2JhWyBvZmZzZXQgKyAzIF0gPSBzY2FubGluZV9idWZmZXJbIGkgKyBvZmYgXTtcclxuXHRcdFx0XHRcdFx0b2Zmc2V0ICs9IDQ7XHJcblxyXG5cdFx0XHRcdFx0fVxyXG5cclxuXHRcdFx0XHRcdG51bV9zY2FubGluZXMgLS07XHJcblxyXG5cdFx0XHRcdH1cclxuXHJcblx0XHRcdFx0cmV0dXJuIGRhdGFfcmdiYTtcclxuXHJcblx0XHRcdH07XHJcblxyXG5cdFx0Y29uc3QgUkdCRUJ5dGVUb1JHQkZsb2F0ID0gZnVuY3Rpb24gKCBzb3VyY2VBcnJheSwgc291cmNlT2Zmc2V0LCBkZXN0QXJyYXksIGRlc3RPZmZzZXQgKSB7XHJcblxyXG5cdFx0XHRjb25zdCBlID0gc291cmNlQXJyYXlbIHNvdXJjZU9mZnNldCArIDMgXTtcclxuXHRcdFx0Y29uc3Qgc2NhbGUgPSBNYXRoLnBvdyggMi4wLCBlIC0gMTI4LjAgKSAvIDI1NS4wO1xyXG5cclxuXHRcdFx0ZGVzdEFycmF5WyBkZXN0T2Zmc2V0ICsgMCBdID0gc291cmNlQXJyYXlbIHNvdXJjZU9mZnNldCArIDAgXSAqIHNjYWxlO1xyXG5cdFx0XHRkZXN0QXJyYXlbIGRlc3RPZmZzZXQgKyAxIF0gPSBzb3VyY2VBcnJheVsgc291cmNlT2Zmc2V0ICsgMSBdICogc2NhbGU7XHJcblx0XHRcdGRlc3RBcnJheVsgZGVzdE9mZnNldCArIDIgXSA9IHNvdXJjZUFycmF5WyBzb3VyY2VPZmZzZXQgKyAyIF0gKiBzY2FsZTtcclxuXHRcdFx0ZGVzdEFycmF5WyBkZXN0T2Zmc2V0ICsgMyBdID0gMTtcclxuXHJcblx0XHR9O1xyXG5cclxuXHRcdGNvbnN0IFJHQkVCeXRlVG9SR0JIYWxmID0gZnVuY3Rpb24gKCBzb3VyY2VBcnJheSwgc291cmNlT2Zmc2V0LCBkZXN0QXJyYXksIGRlc3RPZmZzZXQgKSB7XHJcblxyXG5cdFx0XHRjb25zdCBlID0gc291cmNlQXJyYXlbIHNvdXJjZU9mZnNldCArIDMgXTtcclxuXHRcdFx0Y29uc3Qgc2NhbGUgPSBNYXRoLnBvdyggMi4wLCBlIC0gMTI4LjAgKSAvIDI1NS4wO1xyXG5cclxuXHRcdFx0Ly8gY2xhbXBpbmcgdG8gNjU1MDQsIHRoZSBtYXhpbXVtIHJlcHJlc2VudGFibGUgdmFsdWUgaW4gZmxvYXQxNlxyXG5cdFx0XHRkZXN0QXJyYXlbIGRlc3RPZmZzZXQgKyAwIF0gPSBEYXRhVXRpbHMudG9IYWxmRmxvYXQoIE1hdGgubWluKCBzb3VyY2VBcnJheVsgc291cmNlT2Zmc2V0ICsgMCBdICogc2NhbGUsIDY1NTA0ICkgKTtcclxuXHRcdFx0ZGVzdEFycmF5WyBkZXN0T2Zmc2V0ICsgMSBdID0gRGF0YVV0aWxzLnRvSGFsZkZsb2F0KCBNYXRoLm1pbiggc291cmNlQXJyYXlbIHNvdXJjZU9mZnNldCArIDEgXSAqIHNjYWxlLCA2NTUwNCApICk7XHJcblx0XHRcdGRlc3RBcnJheVsgZGVzdE9mZnNldCArIDIgXSA9IERhdGFVdGlscy50b0hhbGZGbG9hdCggTWF0aC5taW4oIHNvdXJjZUFycmF5WyBzb3VyY2VPZmZzZXQgKyAyIF0gKiBzY2FsZSwgNjU1MDQgKSApO1xyXG5cdFx0XHRkZXN0QXJyYXlbIGRlc3RPZmZzZXQgKyAzIF0gPSBEYXRhVXRpbHMudG9IYWxmRmxvYXQoIDEgKTtcclxuXHJcblx0XHR9O1xyXG5cclxuXHRcdGNvbnN0IGJ5dGVBcnJheSA9IG5ldyBVaW50OEFycmF5KCBidWZmZXIgKTtcclxuXHRcdGJ5dGVBcnJheS5wb3MgPSAwO1xyXG5cdFx0Y29uc3QgcmdiZV9oZWFkZXJfaW5mbyA9IFJHQkVfUmVhZEhlYWRlciggYnl0ZUFycmF5ICk7XHJcblxyXG5cdFx0aWYgKCBSR0JFX1JFVFVSTl9GQUlMVVJFICE9PSByZ2JlX2hlYWRlcl9pbmZvICkge1xyXG5cclxuXHRcdFx0Y29uc3QgdyA9IHJnYmVfaGVhZGVyX2luZm8ud2lkdGgsXHJcblx0XHRcdFx0aCA9IHJnYmVfaGVhZGVyX2luZm8uaGVpZ2h0LFxyXG5cdFx0XHRcdGltYWdlX3JnYmFfZGF0YSA9IFJHQkVfUmVhZFBpeGVsc19STEUoIGJ5dGVBcnJheS5zdWJhcnJheSggYnl0ZUFycmF5LnBvcyApLCB3LCBoICk7XHJcblxyXG5cdFx0XHRpZiAoIFJHQkVfUkVUVVJOX0ZBSUxVUkUgIT09IGltYWdlX3JnYmFfZGF0YSApIHtcclxuXHJcblx0XHRcdFx0bGV0IGRhdGEsIHR5cGU7XHJcblx0XHRcdFx0bGV0IG51bUVsZW1lbnRzO1xyXG5cclxuXHRcdFx0XHRzd2l0Y2ggKCB0aGlzLnR5cGUgKSB7XHJcblxyXG5cdFx0XHRcdFx0Y2FzZSBGbG9hdFR5cGU6XHJcblxyXG5cdFx0XHRcdFx0XHRudW1FbGVtZW50cyA9IGltYWdlX3JnYmFfZGF0YS5sZW5ndGggLyA0O1xyXG5cdFx0XHRcdFx0XHRjb25zdCBmbG9hdEFycmF5ID0gbmV3IEZsb2F0MzJBcnJheSggbnVtRWxlbWVudHMgKiA0ICk7XHJcblxyXG5cdFx0XHRcdFx0XHRmb3IgKCBsZXQgaiA9IDA7IGogPCBudW1FbGVtZW50czsgaiArKyApIHtcclxuXHJcblx0XHRcdFx0XHRcdFx0UkdCRUJ5dGVUb1JHQkZsb2F0KCBpbWFnZV9yZ2JhX2RhdGEsIGogKiA0LCBmbG9hdEFycmF5LCBqICogNCApO1xyXG5cclxuXHRcdFx0XHRcdFx0fVxyXG5cclxuXHRcdFx0XHRcdFx0ZGF0YSA9IGZsb2F0QXJyYXk7XHJcblx0XHRcdFx0XHRcdHR5cGUgPSBGbG9hdFR5cGU7XHJcblx0XHRcdFx0XHRcdGJyZWFrO1xyXG5cclxuXHRcdFx0XHRcdGNhc2UgSGFsZkZsb2F0VHlwZTpcclxuXHJcblx0XHRcdFx0XHRcdG51bUVsZW1lbnRzID0gaW1hZ2VfcmdiYV9kYXRhLmxlbmd0aCAvIDQ7XHJcblx0XHRcdFx0XHRcdGNvbnN0IGhhbGZBcnJheSA9IG5ldyBVaW50MTZBcnJheSggbnVtRWxlbWVudHMgKiA0ICk7XHJcblxyXG5cdFx0XHRcdFx0XHRmb3IgKCBsZXQgaiA9IDA7IGogPCBudW1FbGVtZW50czsgaiArKyApIHtcclxuXHJcblx0XHRcdFx0XHRcdFx0UkdCRUJ5dGVUb1JHQkhhbGYoIGltYWdlX3JnYmFfZGF0YSwgaiAqIDQsIGhhbGZBcnJheSwgaiAqIDQgKTtcclxuXHJcblx0XHRcdFx0XHRcdH1cclxuXHJcblx0XHRcdFx0XHRcdGRhdGEgPSBoYWxmQXJyYXk7XHJcblx0XHRcdFx0XHRcdHR5cGUgPSBIYWxmRmxvYXRUeXBlO1xyXG5cdFx0XHRcdFx0XHRicmVhaztcclxuXHJcblx0XHRcdFx0XHRkZWZhdWx0OlxyXG5cclxuXHRcdFx0XHRcdFx0Y29uc29sZS5lcnJvciggJ1RIUkVFLlJHQkVMb2FkZXI6IHVuc3VwcG9ydGVkIHR5cGU6ICcsIHRoaXMudHlwZSApO1xyXG5cdFx0XHRcdFx0XHRicmVhaztcclxuXHJcblx0XHRcdFx0fVxyXG5cclxuXHRcdFx0XHRyZXR1cm4ge1xyXG5cdFx0XHRcdFx0d2lkdGg6IHcsIGhlaWdodDogaCxcclxuXHRcdFx0XHRcdGRhdGE6IGRhdGEsXHJcblx0XHRcdFx0XHRoZWFkZXI6IHJnYmVfaGVhZGVyX2luZm8uc3RyaW5nLFxyXG5cdFx0XHRcdFx0Z2FtbWE6IHJnYmVfaGVhZGVyX2luZm8uZ2FtbWEsXHJcblx0XHRcdFx0XHRleHBvc3VyZTogcmdiZV9oZWFkZXJfaW5mby5leHBvc3VyZSxcclxuXHRcdFx0XHRcdHR5cGU6IHR5cGVcclxuXHRcdFx0XHR9O1xyXG5cclxuXHRcdFx0fVxyXG5cclxuXHRcdH1cclxuXHJcblx0XHRyZXR1cm4gbnVsbDtcclxuXHJcblx0fVxyXG5cclxuXHRzZXREYXRhVHlwZSggdmFsdWUgKSB7XHJcblxyXG5cdFx0dGhpcy50eXBlID0gdmFsdWU7XHJcblx0XHRyZXR1cm4gdGhpcztcclxuXHJcblx0fVxyXG5cclxuXHRsb2FkKCB1cmwsIG9uTG9hZCwgb25Qcm9ncmVzcywgb25FcnJvciApIHtcclxuXHJcblx0XHRmdW5jdGlvbiBvbkxvYWRDYWxsYmFjayggdGV4dHVyZSwgdGV4RGF0YSApIHtcclxuXHJcblx0XHRcdHN3aXRjaCAoIHRleHR1cmUudHlwZSApIHtcclxuXHJcblx0XHRcdFx0Y2FzZSBGbG9hdFR5cGU6XHJcblx0XHRcdFx0Y2FzZSBIYWxmRmxvYXRUeXBlOlxyXG5cclxuXHRcdFx0XHRcdHRleHR1cmUuZW5jb2RpbmcgPSBMaW5lYXJFbmNvZGluZztcclxuXHRcdFx0XHRcdHRleHR1cmUubWluRmlsdGVyID0gTGluZWFyRmlsdGVyO1xyXG5cdFx0XHRcdFx0dGV4dHVyZS5tYWdGaWx0ZXIgPSBMaW5lYXJGaWx0ZXI7XHJcblx0XHRcdFx0XHR0ZXh0dXJlLmdlbmVyYXRlTWlwbWFwcyA9IGZhbHNlO1xyXG5cdFx0XHRcdFx0dGV4dHVyZS5mbGlwWSA9IHRydWU7XHJcblxyXG5cdFx0XHRcdFx0YnJlYWs7XHJcblxyXG5cdFx0XHR9XHJcblxyXG5cdFx0XHRpZiAoIG9uTG9hZCApIG9uTG9hZCggdGV4dHVyZSwgdGV4RGF0YSApO1xyXG5cclxuXHRcdH1cclxuXHJcblx0XHRyZXR1cm4gc3VwZXIubG9hZCggdXJsLCBvbkxvYWRDYWxsYmFjaywgb25Qcm9ncmVzcywgb25FcnJvciApO1xyXG5cclxuXHR9XHJcblxyXG59XHJcblxyXG5leHBvcnQgeyBSR0JFTG9hZGVyIH07XHJcbiIsInZhciBtYXAgPSB7XG5cdFwiLi9hYmFuZG9uZWRfdGFua19mYXJtXzAyLmpwZ1wiOiBcIi4vc3JjL2JhY2tzdG9wcy9hYmFuZG9uZWRfdGFua19mYXJtXzAyLmpwZ1wiLFxuXHRcIi4vYXV0dW1uX2hvY2tleS5qcGdcIjogXCIuL3NyYy9iYWNrc3RvcHMvYXV0dW1uX2hvY2tleS5qcGdcIixcblx0XCIuL2NvbG9yZnVsX3N0dWRpby5qcGdcIjogXCIuL3NyYy9iYWNrc3RvcHMvY29sb3JmdWxfc3R1ZGlvLmpwZ1wiLFxuXHRcIi4vZGlraG9sb2xvX25pZ2h0X2VkaXQuanBnXCI6IFwiLi9zcmMvYmFja3N0b3BzL2Rpa2hvbG9sb19uaWdodF9lZGl0LmpwZ1wiLFxuXHRcIi4vbGFyZ2VfY29ycmlkb3IuanBnXCI6IFwiLi9zcmMvYmFja3N0b3BzL2xhcmdlX2NvcnJpZG9yLmpwZ1wiLFxuXHRcIi4vdGhlX3NreV9pc19vbl9maXJlLmpwZ1wiOiBcIi4vc3JjL2JhY2tzdG9wcy90aGVfc2t5X2lzX29uX2ZpcmUuanBnXCIsXG5cdFwiLi93aW50ZXJfbGFrZV8wMS5qcGdcIjogXCIuL3NyYy9iYWNrc3RvcHMvd2ludGVyX2xha2VfMDEuanBnXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL2JhY2tzdG9wcyBzeW5jIHJlY3Vyc2l2ZSAuKlwiOyIsInZhciBtYXAgPSB7XG5cdFwiLi9hYmFuZG9uZWRfdGFua19mYXJtXzAyLmpwZ1wiOiBcIi4vc3JjL2JhY2tzdG9wcy9hYmFuZG9uZWRfdGFua19mYXJtXzAyLmpwZ1wiLFxuXHRcIi4vYXV0dW1uX2hvY2tleS5qcGdcIjogXCIuL3NyYy9iYWNrc3RvcHMvYXV0dW1uX2hvY2tleS5qcGdcIixcblx0XCIuL2NvbG9yZnVsX3N0dWRpby5qcGdcIjogXCIuL3NyYy9iYWNrc3RvcHMvY29sb3JmdWxfc3R1ZGlvLmpwZ1wiLFxuXHRcIi4vZGlraG9sb2xvX25pZ2h0X2VkaXQuanBnXCI6IFwiLi9zcmMvYmFja3N0b3BzL2Rpa2hvbG9sb19uaWdodF9lZGl0LmpwZ1wiLFxuXHRcIi4vbGFyZ2VfY29ycmlkb3IuanBnXCI6IFwiLi9zcmMvYmFja3N0b3BzL2xhcmdlX2NvcnJpZG9yLmpwZ1wiLFxuXHRcIi4vdGhlX3NreV9pc19vbl9maXJlLmpwZ1wiOiBcIi4vc3JjL2JhY2tzdG9wcy90aGVfc2t5X2lzX29uX2ZpcmUuanBnXCIsXG5cdFwiLi93aW50ZXJfbGFrZV8wMS5qcGdcIjogXCIuL3NyYy9iYWNrc3RvcHMvd2ludGVyX2xha2VfMDEuanBnXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL2JhY2tzdG9wcyBzeW5jIHJlY3Vyc2l2ZSBeXFxcXC5cXFxcLy4qJFwiOyIsInZhciBtYXAgPSB7XG5cdFwiLi9hYmFuZG9uZWRfdGFua19mYXJtXzAyLmpwZ1wiOiBcIi4vc3JjL2JhY2tzdG9wcy9hYmFuZG9uZWRfdGFua19mYXJtXzAyLmpwZ1wiLFxuXHRcIi4vYXV0dW1uX2hvY2tleS5qcGdcIjogXCIuL3NyYy9iYWNrc3RvcHMvYXV0dW1uX2hvY2tleS5qcGdcIixcblx0XCIuL2NvbG9yZnVsX3N0dWRpby5qcGdcIjogXCIuL3NyYy9iYWNrc3RvcHMvY29sb3JmdWxfc3R1ZGlvLmpwZ1wiLFxuXHRcIi4vZGlraG9sb2xvX25pZ2h0X2VkaXQuanBnXCI6IFwiLi9zcmMvYmFja3N0b3BzL2Rpa2hvbG9sb19uaWdodF9lZGl0LmpwZ1wiLFxuXHRcIi4vbGFyZ2VfY29ycmlkb3IuanBnXCI6IFwiLi9zcmMvYmFja3N0b3BzL2xhcmdlX2NvcnJpZG9yLmpwZ1wiLFxuXHRcIi4vdGhlX3NreV9pc19vbl9maXJlLmpwZ1wiOiBcIi4vc3JjL2JhY2tzdG9wcy90aGVfc2t5X2lzX29uX2ZpcmUuanBnXCIsXG5cdFwiLi93aW50ZXJfbGFrZV8wMS5qcGdcIjogXCIuL3NyYy9iYWNrc3RvcHMvd2ludGVyX2xha2VfMDEuanBnXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL2JhY2tzdG9wcyBzeW5jIHJlY3Vyc2l2ZSBeXFxcXC5cXFxcLy4qXFxcXC5qcGckXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvYmFja3N0b3BzL2FiYW5kb25lZF90YW5rX2Zhcm1fMDIuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvYmFja3N0b3BzL2F1dHVtbl9ob2NrZXkuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvYmFja3N0b3BzL2NvbG9yZnVsX3N0dWRpby5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9iYWNrc3RvcHMvZGlraG9sb2xvX25pZ2h0X2VkaXQuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvYmFja3N0b3BzL2xhcmdlX2NvcnJpZG9yLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L2JhY2tzdG9wcy90aGVfc2t5X2lzX29uX2ZpcmUuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvYmFja3N0b3BzL3dpbnRlcl9sYWtlXzAxLmpwZ1wiOyIsImNvbnN0IE1BUFMgPSBbJ21hcCcsICdyb3VnaG5lc3NNYXAnLCAnYW9NYXAnLCAnbm9ybWFsTWFwJywgJ21ldGFsbmVzc01hcCcsIFwiZGlzcGxhY2VtZW50TWFwXCJdO1xyXG5jb25zdCBBTklTT1RST1BJQ19NQVBTID0gWydtYXAnLCAnbm9ybWFsTWFwJ11cclxuXHJcbmNvbnN0IE1BVEVSSUFMUyA9IHtcclxuICBcImdyb3VuZC1ncmFzcy1yb2NrXCI6IHtcclxuICAgIHJhdzogJ2FlcmlhbF9ncmFzc19yb2NrJyxcclxuICAgIHJlcGVhdDogNSxcclxuICAgIGFuaXNvdHJvcHk6IDE2XHJcbiAgfSxcclxuICBcImdyb3VuZC1zYW5kc3RvbmVcIjoge1xyXG4gICAgcmF3OiAnc2FuZHN0b25lX2NyYWNrcycsXHJcbiAgICByZXBlYXQ6IDgsXHJcbiAgICBhbmlzb3Ryb3B5OiAxNlxyXG4gIH0sXHJcbiAgXCJncm91bmQtd29vZC1mbG9vclwiOiB7XHJcbiAgICByYXc6IFwiV29vZEZsb29yMDQxXCIsXHJcbiAgICByZXBlYXQ6IDMyLFxyXG4gICAgYW5pc290cm9weTogMTYsXHJcbiAgfSxcclxuICBcImdyb3VuZC1zbm93XCI6IHtcclxuICAgIHJhdzogXCJTbm93MDA0XCIsXHJcbiAgICBhbmlzb3Ryb3B5OiAxNixcclxuICAgIHJlcGVhdDogNFxyXG4gIH0sXHJcbiAgXCJncm91bmQtZm9yZXN0XCI6IHtcclxuICAgIHJhdzogXCJmb3JyZXN0X2dyb3VuZF8wM1wiLFxyXG4gICAgYW5pc290cm9weTogMTYsXHJcbiAgICByZXBlYXQ6IDE2XHJcbiAgfSxcclxuICBcImJhcmtcIjoge1xyXG4gICAgcmF3OiBcImJhcmtfYnJvd25fMDJcIixcclxuICAgIGFuaXNvdHJvcHk6IDQsXHJcbiAgICBkaXNwbGFjZW1lbnRTY2FsZTogMC4yLFxyXG4gICAgZGlzcGxhY2VtZW50QmlhczogMC4wLFxyXG4gIH0sXHJcbiAgXCJnb2xkXCI6IHtcclxuICAgIHJhdzogXCJNZXRhbDAzNVwiLFxyXG4gIH0sXHJcbiAgXCJtZXRhbFwiOiB7XHJcbiAgICByYXc6IFwiTWV0YWwwMDlcIlxyXG4gIH0sXHJcbiAgXCJwbGFzdGljXCI6IHtcclxuICAgIHJhdzogXCJQbGFzdGljXCIsXHJcbiAgICByZXBlYXQ6IDMsXHJcbiAgICBhbmlzb3Ryb3B5OiAyXHJcbiAgfSxcclxuICBcImZhYnJpY1wiOiB7XHJcbiAgICByYXc6IFwiRmFicmljMDI2XCIsXHJcbiAgICByZXBlYXQ6IDIsXHJcbiAgICBhbmlzb3Ryb3B5OiA4LFxyXG4gIH0sXHJcbiAgXCJjb25jcmV0ZVwiOiB7XHJcbiAgICByYXc6IFwiZGlydHlfY29uY3JldGVcIixcclxuICAgIHJlcGVhdDogMixcclxuICAgIGFuaXNvdHJvcHk6IDRcclxuICB9LFxyXG4gIFwicm9ja1wiOiB7XHJcbiAgICByYXc6IFwicm9ja18wNVwiLFxyXG4gICAgZGlzcGxhY2VtZW50U2NhbGU6IDAuMSxcclxuICAgIGRpc3BsYWNlbWVudEJpYXM6IDAuMCxcclxuICAgIHJlcGVhdDogMVxyXG4gIH0sXHJcbiAgXCJtb3NzeV9yb2NrXCI6IHtcclxuICAgIHJhdzogXCJtb3NzeV9yb2NrXCIsXHJcbiAgICBhbmlzb3Ryb3B5OiA0LFxyXG4gIH0sXHJcbiAgXCJ3b29kXCI6IHtcclxuICAgIHJhdzogXCJXb29kMDI3XCIsXHJcbiAgICByZXBlYXQ6IDEuNSxcclxuICAgIGFuaXNvdHJvcHk6IDQsXHJcbiAgfSxcclxuICBcInBsYW5rc1wiOiB7XHJcbiAgICByYXc6IFwiYnJvd25fcGxhbmtzXzA0XCIsXHJcbiAgICByZXBlYXQ6IDIsXHJcbiAgICBhbmlzb3Ryb3B5OiA0XHJcbiAgfSxcclxuICBcInNub3dcIjoge1xyXG4gICAgcmF3OiBcIlNub3cwMDNcIixcclxuICAgIGRpc3BsYWNlbWVudFNjYWxlOiAwLjMsXHJcbiAgICBkaXNwbGFjZW1lbnRCaWFzOiAwLjAsXHJcbiAgfVxyXG59XHJcblxyXG5jb25zdCBNQVBfRlJPTV9GSUxFTkFNRSA9IHtcclxuICAnYW9NYXAnOiBbL0FtYmllbnRPY2NsdXNpb24oTWFwKT8vaSwgLyhcXGJ8XylBTyhtYXApPyhcXGJ8XykvaV0sXHJcbiAgJ2Rpc3BsYWNlbWVudE1hcCc6IFsvKFxcYnxfKURpc3AobGFjZW1lbnQpPyhNYXApPyhcXGJ8XykvaV0sXHJcbiAgJ25vcm1hbE1hcCc6IFsvKFxcYnxfKW5vcm0/KGFsKT8obWFwKT8oXFxifF8pL2ldLFxyXG4gICdlbWlzc2l2ZU1hcCc6IFsvKFxcYnxfKWVtaSh0fHRpb258c3NpdmV8c3MpPyhtYXApPyhcXGJ8XykvaV0sXHJcbiAgJ21ldGFsbmVzc01hcCc6IFsvKFxcYnxfKW1ldGFsKG5lc3N8bD9pYyk/KG1hcCk/KFxcYnxfKS9pXSxcclxuICAncm91Z2huZXNzTWFwJzogWy8oXFxifF8pcm91Z2gobmVzcyk/KG1hcCk/KFxcYnxfKS9pXSxcclxuICAnc3JjJzogWy8oXFxifF8pZGlmZih1c2UpPyhcXGJ8XykvaSwgLyhcXGJ8Xyljb2wob3IpPyhcXGJ8XykvaV0sXHJcbn1cclxuXHJcbmZ1bmN0aW9uIG1hcEZyb21GaWxlbmFtZShmaWxlbmFtZSkge1xyXG4gIGZvciAobGV0IG1hcCBpbiBNQVBfRlJPTV9GSUxFTkFNRSlcclxuICB7XHJcbiAgICBpZiAoTUFQX0ZST01fRklMRU5BTUVbbWFwXS5zb21lKGV4cCA9PiBleHAudGVzdChmaWxlbmFtZSkpKVxyXG4gICAge1xyXG4gICAgICByZXR1cm4gbWFwXHJcbiAgICB9XHJcbiAgfVxyXG59XHJcblxyXG5jb25zdCBBTExfTUFURVJJQUxTID0ge307XHJcblxyXG5mb3IgKGxldCBmaWxlTmFtZSBvZiByZXF1aXJlLmNvbnRleHQoJy4vbWF0ZXJpYWxzLycsIHRydWUsIC8uKi8pLmtleXMoKSkge1xyXG4gIGxldCBbZG90LCBmb2xkZXIsIGZpbGVdID0gZmlsZU5hbWUuc3BsaXQoJy8nKVxyXG4gIGxldCBuYW1lID0gZm9sZGVyLm1hdGNoKC8oLio/KVstX11cXGQray9pKVsxXVxyXG4gIGlmICghKG5hbWUgaW4gQUxMX01BVEVSSUFMUykpXHJcbiAge1xyXG4gICAgQUxMX01BVEVSSUFMU1tuYW1lXSA9IHt9XHJcbiAgfVxyXG4gIEFMTF9NQVRFUklBTFNbbmFtZV1bbWFwRnJvbUZpbGVuYW1lKGZpbGUpXSA9IHJlcXVpcmUoYC4vbWF0ZXJpYWxzLyR7Zm9sZGVyfS8ke2ZpbGV9YClcclxufVxyXG5cclxuZm9yIChsZXQgW25hbWUsIGRhdGFdIG9mIE9iamVjdC5lbnRyaWVzKE1BVEVSSUFMUykpIHtcclxuICBBTExfTUFURVJJQUxTW25hbWVdID0gT2JqZWN0LmFzc2lnbih7fSwgZGF0YSwgQUxMX01BVEVSSUFMU1tkYXRhLnJhd10gfHwge30pXHJcbn1cclxuXHJcbkFGUkFNRS5yZWdpc3RlclN5c3RlbSgnZW52aXJvcGFjay1tYXRlcmlhbCcsIHtcclxuICBzY2hlbWE6IHtcclxuICAgIGF1dG9BcHBseToge2RlZmF1bHQ6IHRydWV9LFxyXG4gICAgc2hhZGVyOiB7ZGVmYXVsdDogJ2F1dG8nfSxcclxuICB9LFxyXG4gIGluaXQoKSB7XHJcbiAgICB0aGlzLm1hdGVyaWFscyA9IEFMTF9NQVRFUklBTFM7XHJcbiAgfSxcclxuICB1cmwoZmlsZSkge1xyXG4gICAgaWYgKCFmaWxlKSByZXR1cm4gbnVsbDtcclxuICAgIGlmICghdGhpcy5kYXRhKSB7XHJcbiAgICAgIGNvbnNvbGUud2FybihcIk5vIGRhdGEgeWV0XCIpXHJcbiAgICAgIHJldHVybiBudWxsO1xyXG4gICAgfVxyXG4gICAgbGV0IGJhc2VVcmwgPSB0aGlzLmVsLnNjZW5lRWwuc3lzdGVtc1snZW52aXJvcGFjayddLmRhdGEuYmFzZVVybDtcclxuICAgIHJldHVybiBgJHtiYXNlVXJsfSR7YmFzZVVybCA/IFwiL1wiIDogXCJcIn0ke2ZpbGV9YFxyXG4gIH0sXHJcbiAgY2hvb3NlU2hhZGVyKCkge1xyXG4gICAgaWYgKHRoaXMuZGF0YS5zaGFkZXIgIT09ICdhdXRvJykgcmV0dXJuIHRoaXMuZGF0YS5zaGFkZXI7XHJcbiAgICBpZiAoQUZSQU1FLnV0aWxzLmRldmljZS5pc01vYmlsZSgpKSByZXR1cm4gJ3BibWF0Y2FwJztcclxuICAgIGlmIChBRlJBTUUudXRpbHMuZGV2aWNlLmlzTW9iaWxlVlIoKSkgcmV0dXJuICdwYm1hdGNhcCc7XHJcbiAgICByZXR1cm4gJ3N0YW5kYXJkJ1xyXG4gIH0sXHJcbiAgZm9yY2VTaGFkZXJDaGFuZ2Uoc2hhZGVyKSB7XHJcbiAgICB0aGlzLmRhdGEuc2hhZGVyID0gc2hhZGVyO1xyXG4gICAgdGhpcy5lbC5xdWVyeVNlbGVjdG9yQWxsKCcqW2Vudmlyb3BhY2stbWF0ZXJpYWxdJykuZm9yRWFjaChlbCA9PiB7XHJcbiAgICAgIGlmIChlbC5jb21wb25lbnRzWydlbnZpcm9wYWNrLW1hdGVyaWFsJ10uZGF0YS5zaGFkZXIgPT09ICdhdXRvJylcclxuICAgICAge1xyXG4gICAgICAgIGVsLmNvbXBvbmVudHNbJ2Vudmlyb3BhY2stbWF0ZXJpYWwnXS5mb3JjZVVwZGF0ZSgpXHJcbiAgICAgIH1cclxuICAgIH0pXHJcbiAgfVxyXG59KVxyXG5cclxuQUZSQU1FLnJlZ2lzdGVyQ29tcG9uZW50KCdlbnZpcm9wYWNrLW1hdGVyaWFsJywge1xyXG4gIHNjaGVtYToge1xyXG4gICAgbWF0ZXJpYWw6IHtkZWZhdWx0OiBcImdyb3VuZC1ncmFzcy1yb2NrXCIsIG9uZU9mOiBPYmplY3Qua2V5cyhNQVRFUklBTFMpfSxcclxuICAgIGRpc3BsYWNlbWVudE1hcDoge2RlZmF1bHQ6IGZhbHNlfSxcclxuICAgIHNoYWRlcjoge2RlZmF1bHQ6ICdhdXRvJ31cclxuICB9LFxyXG4gIGV2ZW50czoge1xyXG4gICAgbWF0ZXJpYWx0ZXh0dXJlbG9hZGVkOiBmdW5jdGlvbiAoZSkge1xyXG4gICAgICB0aGlzLnNldFJlcGVhdCh0aGlzLnJlcGVhdClcclxuICAgICAgdGhpcy5zZXRBbmlzb3Ryb3B5KHRoaXMuYW5pc290cm9weSlcclxuICAgIH0sXHJcbiAgICBvYmplY3QzZHNldDogZnVuY3Rpb24oZSkge1xyXG4gICAgICB0aGlzLmFwcGx5TWF0ZXJpYWwoKVxyXG4gICAgfSxcclxuICAgIGNvbXBvbmVudGNoYW5nZWQ6IGZ1bmN0aW9uKGUpIHtcclxuICAgICAgaWYgKGUuZGV0YWlsID09PSAnbWF0ZXJpYWwnKVxyXG4gICAgICB7XHJcbiAgICAgICAgdGhpcy5hcHBseU1hdGVyaWFsKClcclxuICAgICAgfVxyXG4gICAgfVxyXG4gIH0sXHJcbiAgdXBkYXRlKG9sZERhdGEpIHtcclxuICAgIGlmICh0aGlzLmRhdGEubWF0ZXJpYWwgIT09IG9sZERhdGEubWF0ZXJpYWwpIHtcclxuICAgICAgdGhpcy5mb3JjZVVwZGF0ZSgpXHJcbiAgICB9XHJcbiAgfSxcclxuICBmb3JjZVVwZGF0ZSgpIHtcclxuICAgIGxldCBtYXRlcmlhbCA9IHRoaXMuc3lzdGVtLm1hdGVyaWFsc1t0aGlzLmRhdGEubWF0ZXJpYWxdXHJcbiAgICBpZiAoIW1hdGVyaWFsKSB7XHJcbiAgICAgIGNvbnNvbGUud2FybihcIk5vIHN1Y2ggbWF0ZXJpYWxcIiwgdGhpcy5kYXRhLm1hdGVyaWFsKVxyXG4gICAgICByZXR1cm5cclxuICAgIH1cclxuXHJcbiAgICBsZXQgc2hhZGVyID0gdGhpcy5kYXRhLnNoYWRlciA9PT0gJ2F1dG8nID8gdGhpcy5jaG9vc2VTaGFkZXIoKSA6IHRoaXMuZGF0YS5zaGFkZXI7XHJcbiAgICB0aGlzLmVsLnNldEF0dHJpYnV0ZSgnbWF0ZXJpYWwnLCAnc2hhZGVyJywgc2hhZGVyKVxyXG4gICAgdGhpcy5lbC5zZXRBdHRyaWJ1dGUoJ21hdGVyaWFsJywgJ3NyYycsIHRoaXMuc3lzdGVtLnVybChtYXRlcmlhbC5zcmMpKVxyXG4gICAgdGhpcy5lbC5zZXRBdHRyaWJ1dGUoJ21hdGVyaWFsJywgJ25vcm1hbE1hcCcsIHRoaXMuc3lzdGVtLnVybChtYXRlcmlhbC5ub3JtYWxNYXApKVxyXG4gICAgdGhpcy5lbC5zZXRBdHRyaWJ1dGUoJ21hdGVyaWFsJywgJ2FtYmllbnRPY2NsdXNpb25NYXAnLCB0aGlzLnN5c3RlbS51cmwobWF0ZXJpYWwuYW9NYXApKVxyXG4gICAgdGhpcy5lbC5zZXRBdHRyaWJ1dGUoJ21hdGVyaWFsJywgJ3JvdWdobmVzc01hcCcsIHRoaXMuc3lzdGVtLnVybChtYXRlcmlhbC5yb3VnaG5lc3NNYXApKVxyXG4gICAgdGhpcy5lbC5zZXRBdHRyaWJ1dGUoJ21hdGVyaWFsJywgJ21ldGFsbmVzc01hcCcsIHRoaXMuc3lzdGVtLnVybChtYXRlcmlhbC5tZXRhbG5lc3NNYXApKVxyXG4gICAgdGhpcy5lbC5zZXRBdHRyaWJ1dGUoJ21hdGVyaWFsJywgJ2Rpc3BsYWNlbWVudE1hcCcsIHRoaXMuZGF0YS5kaXNwbGFjZW1lbnRNYXAgPyB0aGlzLnN5c3RlbS51cmwobWF0ZXJpYWwuZGlzcGxhY2VtZW50TWFwKSA6IG51bGwpXHJcbiAgICB0aGlzLmVsLnNldEF0dHJpYnV0ZSgnbWF0ZXJpYWwnLCAncm91Z2huZXNzJywgbWF0ZXJpYWwucm91Z2huZXNzTWFwID8gMS4wIDogKG1hdGVyaWFsLnJvdWdobmVzcyB8fCAwLjApKVxyXG4gICAgdGhpcy5lbC5zZXRBdHRyaWJ1dGUoJ21hdGVyaWFsJywgJ21ldGFsbmVzcycsIG1hdGVyaWFsLm1ldGFsbmVzc01hcCA/IDEuMCA6IChtYXRlcmlhbC5tZXRhbG5lc3MgfHwgMC4wKSlcclxuICAgIGlmIChzaGFkZXIgPT09ICdwYm1hdGNhcCcpXHJcbiAgICB7XHJcbiAgICAgIHRoaXMuZWwuc2V0QXR0cmlidXRlKCdtYXRlcmlhbCcsICdkaXNwbGFjZW1lbnRTY2FsZScsIG1hdGVyaWFsLmRpc3BsYWNlbWVudFNjYWxlIHx8IDEuMClcclxuICAgICAgdGhpcy5lbC5zZXRBdHRyaWJ1dGUoJ21hdGVyaWFsJywgJ2Rpc3BsYWNlbWVudEJpYXMnLCAoXCJkaXNwbGFjZW1lbnRCaWFzXCIgaW4gbWF0ZXJpYWwpID8gbWF0ZXJpYWwuZGlzcGxhY2VtZW50QmlhcyA6IDAuNSlcclxuICAgIH1cclxuICAgIGVsc2VcclxuICAgIHtcclxuICAgICAgdGhpcy5lbC5jb21wb25lbnRzLm1hdGVyaWFsLm1hdGVyaWFsLmRpc3BsYWNlbWVudFNjYWxlID0gbWF0ZXJpYWwuZGlzcGxhY2VtZW50U2NhbGUgfHwgMS4wXHJcbiAgICAgIHRoaXMuZWwuY29tcG9uZW50cy5tYXRlcmlhbC5tYXRlcmlhbC5kaXNwbGFjZW1lbnRCaWFzID0gKFwiZGlzcGxhY2VtZW50Qmlhc1wiIGluIG1hdGVyaWFsKSA/IG1hdGVyaWFsLmRpc3BsYWNlbWVudEJpYXMgOiAwLjU7XHJcbiAgICB9XHJcbiAgICB0aGlzLnNldFJlcGVhdChtYXRlcmlhbC5yZXBlYXQgfHwgMSlcclxuICAgIHRoaXMuc2V0QW5pc290cm9weShtYXRlcmlhbC5hbmlzb3Ryb3B5IHx8IDEpXHJcbiAgfSxcclxuICBjaG9vc2VTaGFkZXIoKSB7XHJcbiAgICBpZiAodGhpcy5kYXRhLnNoYWRlciAhPT0gJ2F1dG8nKSByZXR1cm4gdGhpcy5kYXRhLnNoYWRlcjtcclxuXHJcbiAgICByZXR1cm4gdGhpcy5zeXN0ZW0uY2hvb3NlU2hhZGVyKCk7XHJcbiAgfSxcclxuICBzZXRSZXBlYXQoc2NhbGUpIHtcclxuICAgIHRoaXMucmVwZWF0ID0gc2NhbGVcclxuICAgIGxldCBtYXRlcmlhbENvbXBvbmVudCA9IHRoaXMuZWwuY29tcG9uZW50cy5tYXRlcmlhbFxyXG4gICAgbGV0IG1hdGVyaWFsID0gbWF0ZXJpYWxDb21wb25lbnQubWF0ZXJpYWxcclxuICAgIGZvciAobGV0IG1hcCBvZiBNQVBTKSB7XHJcbiAgICAgIGlmICghbWF0ZXJpYWxbbWFwXSkgY29udGludWU7XHJcbiAgICAgIG1hdGVyaWFsW21hcF0ucmVwZWF0LnNldChzY2FsZSwgc2NhbGUpXHJcbiAgICAgIG1hdGVyaWFsW21hcF0ud3JhcFQgPSBUSFJFRS5SZXBlYXRXcmFwcGluZ1xyXG4gICAgICBtYXRlcmlhbFttYXBdLndyYXBTID0gVEhSRUUuUmVwZWF0V3JhcHBpbmdcclxuICAgICAgbWF0ZXJpYWxbbWFwXS5uZWVkc1VwZGF0ZSA9IHRydWVcclxuICAgIH1cclxuXHJcbiAgICBpZiAobWF0ZXJpYWxDb21wb25lbnQuZGF0YS5zaGFkZXIgPT09ICdwYm1hdGNhcCcpXHJcbiAgICB7XHJcbiAgICAgIG1hdGVyaWFsQ29tcG9uZW50LnNoYWRlci51cGRhdGUobWF0ZXJpYWxDb21wb25lbnQuc2hhZGVyLmRhdGEpXHJcbiAgICB9XHJcbiAgfSxcclxuICBzZXRBbmlzb3Ryb3B5KGFuaXNvdHJvcHkpIHtcclxuICAgIGxldCBtYXRlcmlhbCA9IHRoaXMuZWwuY29tcG9uZW50cy5tYXRlcmlhbC5tYXRlcmlhbFxyXG5cclxuICAgIGlmIChBRlJBTUUudXRpbHMuZGV2aWNlLmlzTW9iaWxlVlIoKSlcclxuICAgIHtcclxuICAgICAgYW5pc290cm9weSA9IDE7XHJcblxyXG4gICAgICBmb3IgKGxldCBtYXAgb2YgTUFQUylcclxuICAgICAge1xyXG4gICAgICAgIGlmIChtYXRlcmlhbFttYXBdKVxyXG4gICAgICAgIHtcclxuICAgICAgICAgIG1hdGVyaWFsW21hcF0ubWFnRmlsdGVyID0gVEhSRUUuTmVhcmVzdEZpbHRlclxyXG4gICAgICAgICAgbWF0ZXJpYWxbbWFwXS5taW5GaWx0ZXIgPSBUSFJFRS5MaW5lYXJNaXBtYXBOZWFyZXN0RmlsdGVyXHJcbiAgICAgICAgICBtYXRlcmlhbFttYXBdLm5lZWRzVXBkYXRlID0gdHJ1ZVxyXG4gICAgICAgIH1cclxuICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgIHRoaXMuYW5pc290cm9weSA9IGFuaXNvdHJvcHk7XHJcbiAgICBmb3IgKGxldCBtYXAgb2YgQU5JU09UUk9QSUNfTUFQUylcclxuICAgIHtcclxuICAgICAgICBpZiAoIW1hdGVyaWFsW21hcF0pIGNvbnRpbnVlO1xyXG5cclxuICAgICAgICBtYXRlcmlhbFttYXBdLmFuaXNvdHJvcHkgPSBhbmlzb3Ryb3B5O1xyXG4gICAgICAgIG1hdGVyaWFsW21hcF0ubmVlZHNVcGRhdGUgPSB0cnVlO1xyXG4gICAgfVxyXG4gIH0sXHJcbiAgYXBwbHlNYXRlcmlhbChtZXNoID0gdW5kZWZpbmVkKVxyXG4gIHtcclxuICAgIGlmICghdGhpcy5lbC5oYXNBdHRyaWJ1dGUoJ21hdGVyaWFsJykpIHJldHVyblxyXG4gICAgaWYgKCFtZXNoKSBtZXNoID0gdGhpcy5lbC5nZXRPYmplY3QzRCgnbWVzaCcpXHJcbiAgICBpZiAoIW1lc2gpIHJldHVyblxyXG5cclxuXHJcbiAgICBsZXQgbWF0ZXJpYWwgPSB0aGlzLmVsLmNvbXBvbmVudHMubWF0ZXJpYWwubWF0ZXJpYWxcclxuXHJcbiAgICBtZXNoLnRyYXZlcnNlKG8gPT4ge1xyXG4gICAgICBpZiAoby5tYXRlcmlhbClcclxuICAgICAge1xyXG4gICAgICAgIG8ubWF0ZXJpYWwgPSBtYXRlcmlhbFxyXG4gICAgICB9XHJcbiAgICB9KVxyXG4gICAgdGhpcy5lbC5lbWl0KCdlbnZpcm9wYWNrLW1hdGVyaWFsLWFwcGxpZWQnLCBtYXRlcmlhbClcclxuICB9XHJcbn0pXHJcbiIsImltcG9ydCB7IFBNUkVNR2VuZXJhdG9yfSBmcm9tICcuL1BNUkVNR2VuZXJhdG9yLmpzJ1xyXG5pbXBvcnQge1JHQkVMb2FkZXJ9IGZyb20gJy4vUkdCRUxvYWRlci5qcydcclxuXHJcbmNvbnN0IEVOVklST05NRU5UUyA9IHtcclxuICB0YW5rZmFybToge1xyXG4gICAgaGRyaTogJ2FiYW5kb25lZF90YW5rX2Zhcm1fMDInLFxyXG4gICAgZ3JvdW5kOiAnZ3JvdW5kLWdyYXNzLXJvY2snLFxyXG4gICAgbGlnaHRzOiBbXHJcbiAgICAgIHtwb3NpdGlvbjogXCIwLjUgMSAxXCIsIGludGVuc2l0eTogMS42fSxcclxuICAgICAge3Bvc2l0aW9uOiBcIjAuNSAwLjMgMC4xXCIsIGludGVuc2l0eTogMS42fVxyXG4gICAgXSxcclxuICAgIHByb3BzOiBbXHJcbiAgICAgIHtwcm9wOiAncm9jaycsIG51bU9iamVjdHM6IDUwMCwgbWF0ZXJpYWw6ICdtb3NzeV9yb2NrJ30sXHJcbiAgICBdXHJcbiAgfSxcclxuICBzYW5kc3RvbmU6IHtcclxuICAgIGhkcmk6ICd0aGVfc2t5X2lzX29uX2ZpcmUnLFxyXG4gICAgZ3JvdW5kOiAnZ3JvdW5kLXNhbmRzdG9uZScsXHJcbiAgICBsaWdodHM6IFtcclxuICAgICAge3Bvc2l0aW9uOiBcIjE0LjYwMzUxIDMuOTEyNTUgOC4zODI1NFwiLCBpbnRlbnNpdHk6IDEuNn0sXHJcbiAgICAgIC8vIHtwb3NpdGlvbjogXCIxOC4zMzE0NCAwLjMgMTguMzA0NDRcIiwgaW50ZW5zaXR5OiAxLjZ9XHJcbiAgICBdLFxyXG4gICAgcHJvcHM6IFtcclxuICAgICAge3Byb3A6ICdzdG9uZScsIG51bU9iamVjdHM6IDMwMCwgbWF0ZXJpYWw6ICdyb2NrJ30sXHJcbiAgICBdXHJcbiAgfSxcclxuICBpbnRlcmlvcjoge1xyXG4gICAgaGRyaTogXCJsYXJnZV9jb3JyaWRvclwiLFxyXG4gICAgdG9uZU1hcHBpbmc6IDIsXHJcbiAgICBncm91bmQ6IFwiZ3JvdW5kLXdvb2QtZmxvb3JcIixcclxuICAgIGxpZ2h0czogW1xyXG4gICAgICB7cG9zaXRpb246IFwiMCA3LjAxNiAtMy45MVwiLCBpbnRlbnNpdHk6IDEuNn1cclxuICAgIF0sXHJcbiAgICBwcm9wczogW1xyXG4gICAgICB7cHJvcDogXCJjb2x1bW5cIiwgbnVtT2JqZWN0czogMTAwLCBtYXRlcmlhbDogXCJwbGFua3NcIiwgbWF4U2NhbGU6IDUsIG1pblNjYWxlOiAzfSxcclxuICAgICAge3Byb3A6IFwic3RvbmVcIiwgbnVtT2JqZWN0czogMTAwLCBtYXRlcmlhbDogXCJ3b29kXCJ9XHJcbiAgICBdXHJcbiAgfSxcclxuICB3aW50ZXI6IHtcclxuICAgIGhkcmk6IFwid2ludGVyX2xha2VfMDFcIixcclxuICAgIHRvbmVNYXBwaW5nOiAzLFxyXG4gICAgZ3JvdW5kOiBcImdyb3VuZC1zbm93XCIsXHJcbiAgICBsaWdodHM6IFtcclxuICAgICAge3Bvc2l0aW9uOiBcIjAuNSAxIDFcIiwgaW50ZW5zaXR5OiAxLjYsIHNoYWRvd1JhZGl1czogMTB9LFxyXG4gICAgICB7cG9zaXRpb246IFwiMC41IDAuMyAwLjFcIiwgaW50ZW5zaXR5OiAxLjYsIHNoYWRvd1JhZGl1czogMTAsIHNoYWRvd0JpYXM6IDEuMH1cclxuICAgIF0sXHJcbiAgICBwcm9wczogW3tcclxuICAgICAgcHJvcDogJ3JvY2snLFxyXG4gICAgICBudW1PYmplY3RzOiA1MDAsXHJcbiAgICAgIG1hdGVyaWFsOiAnc25vdycsXHJcbiAgICB9XVxyXG4gIH0sXHJcbiAgYXV0dW1uOiB7XHJcbiAgICBoZHJpOiBcImF1dHVtbl9ob2NrZXlcIixcclxuICAgIGdyb3VuZDogXCJncm91bmQtZm9yZXN0XCIsXHJcbiAgICB0b25lTWFwcGluZzogMixcclxuICAgIGxpZ2h0czogW1xyXG4gICAgICB7cG9zaXRpb246IFwiMCA3LjAxNiAwLjkxXCIsIGludGVuc2l0eTogMS42LCBzaGFkb3dSYWRpdXM6IDN9XHJcbiAgICBdLFxyXG4gICAgcHJvcHM6IFtcclxuICAgICAge3Byb3A6ICdyb2NrJywgbnVtT2JqZWN0czogNTAwLCBtYXRlcmlhbDogJ21vc3N5X3JvY2snfSxcclxuICAgIF1cclxuICB9LFxyXG4gIGVtcHR5X3N0dWRpbzoge1xyXG4gICAgaGRyaTogXCJjb2xvcmZ1bF9zdHVkaW9cIixcclxuICB9LFxyXG4gIGVtcHR5X3N0dWRpb19mbG9vcjoge1xyXG4gICAgaGRyaTogXCJjb2xvcmZ1bF9zdHVkaW9cIixcclxuICAgIGdyb3VuZDogXCJncm91bmQtd29vZC1mbG9vclwiLFxyXG4gIH0sXHJcbiAgbmlnaHQ6IHtcclxuICAgIGhkcmk6IFwiZGlraG9sb2xvX25pZ2h0X2VkaXRcIixcclxuICAgIGdyb3VuZDogXCJncm91bmQtZm9yZXN0XCIsXHJcbiAgICB0b25lTWFwcGluZzogMixcclxuICAgIGxpZ2h0czogW1xyXG4gICAgICB7cG9zaXRpb246IFwiMCAzLjIgMFwiLCBpbnRlbnNpdHk6IDAuMDUsIHNoYWRvd1JhZGl1czogMywgc2hhZG93QmlhczogMC4xfVxyXG4gICAgXSxcclxuICAgIHByb3BzOiBbXHJcbiAgICAgIHtwcm9wOiAncm9jaycsIG51bU9iamVjdHM6IDEwMCwgbWF0ZXJpYWw6ICdtZXRhbCd9LFxyXG4gICAgXVxyXG4gIH0sXHJcbn1cclxuXHJcbkFGUkFNRS5yZWdpc3RlclN5c3RlbSgnZW52aXJvcGFjaycsIHtcclxuICBzY2hlbWE6IHtcclxuICAgIGJhc2VVcmw6IHt0eXBlOiAnc3RyaW5nJywgZGVmYXVsdDogZG9jdW1lbnQuY3VycmVudFNjcmlwdC5zcmMuc3BsaXQoJy8nKS5zbGljZSgwLCAtMSkuam9pbihcIi9cIil9XHJcbiAgfSxcclxuICBpbml0KCkge1xyXG4gICAgdGhpcy5lbnZpcm9ubWVudHMgPSBFTlZJUk9OTUVOVFM7XHJcbiAgICB0aGlzLnByZXNldHMgPSBFTlZJUk9OTUVOVFM7XHJcbiAgICB0aGlzLmVudmlyb3BhY2sgPSBudWxsO1xyXG4gIH0sXHJcbiAgdXJsKGZpbGUpIHtcclxuICAgIGlmICghZmlsZSkgcmV0dXJuIG51bGw7XHJcbiAgICBpZiAoIXRoaXMuZGF0YSkge1xyXG4gICAgICBjb25zb2xlLndhcm4oXCJObyBkYXRhIHlldFwiKVxyXG4gICAgICByZXR1cm4gbnVsbDtcclxuICAgIH1cclxuICAgIGxldCBiYXNlVXJsID0gdGhpcy5lbC5zY2VuZUVsLnN5c3RlbXNbJ2Vudmlyb3BhY2snXS5kYXRhLmJhc2VVcmw7XHJcbiAgICByZXR1cm4gYCR7YmFzZVVybH0ke2Jhc2VVcmwgPyBcIi9cIiA6IFwiXCJ9JHtmaWxlfWBcclxuICB9LFxyXG59KVxyXG5cclxuQUZSQU1FLnJlZ2lzdGVyQ29tcG9uZW50KCdlbnZpcm9wYWNrJywge1xyXG4gIHNjaGVtYToge1xyXG4gICAgcHJlc2V0OiB7dHlwZTogJ3N0cmluZycsIG9uZU9mOiBFTlZJUk9OTUVOVFMsIGRlZmF1bHQ6IFwidGFua2Zhcm1cIn0sXHJcbiAgICBiYXNlVXJsOiB7dHlwZTogJ3N0cmluZycsIGRlZmF1bHQ6IFwiXCJ9LFxyXG4gIH0sXHJcbiAgaW5pdCgpIHtcclxuICAgIHRoaXMubGlnaHRzID0gW11cclxuICAgIHRoaXMucHJvcHMgPSBbXVxyXG5cclxuICAgIHRoaXMuZGVmYXVsdExpZ2h0cyA9IFtdXHJcblxyXG4gICAgaWYgKHRoaXMuc3lzdGVtLmVudmlyb3BhY2spXHJcbiAgICB7XHJcbiAgICAgIC8vIGNvbnNvbGUud2FybihcIlRoZXJlJ3MgYWxyZWFkeSBhbiBleGlzdGluZyBlbnZpcm9wYWNrLiBFeHBlY3QgcHJvYmxlbXNcIilcclxuICAgICAgY29uc29sZS53YXJuKFwiUmVtb3ZpbmcgZXhpc3RpbmcgZW52aXJvcGFjayBmcm9tIG90aGVyIGVsZW1lbnRcIiwgdGhpcy5zeXN0ZW0uZW52aXJvcGFjay5lbClcclxuICAgICAgdGhpcy5zeXN0ZW0uZW52aXJvcGFjay5lbC5yZW1vdmVBdHRyaWJ1dGUoJ2Vudmlyb3BhY2snKVxyXG4gICAgfVxyXG4gICAgdGhpcy5zeXN0ZW0uZW52aXJvcGFjayA9IHRoaXNcclxuICB9LFxyXG4gIHJlbW92ZSgpIHtcclxuICAgIGlmICh0aGlzLmdyb3VuZClcclxuICAgIHtcclxuICAgICAgdGhpcy5ncm91bmQucmVtb3ZlKClcclxuICAgIH1cclxuXHJcbiAgICBmb3IgKGxldCBsaWdodCBvZiB0aGlzLmxpZ2h0cylcclxuICAgIHtcclxuICAgICAgbGlnaHQucmVtb3ZlKClcclxuICAgIH1cclxuXHJcbiAgICBsZXQgc2t5ID0gdGhpcy5lbC5zY2VuZUVsLnF1ZXJ5U2VsZWN0b3IoJ2Etc2t5Jyk7XHJcbiAgICBza3kucmVtb3ZlQXR0cmlidXRlKCdlbnZpcm9wYWNrLWhkcmknKVxyXG5cclxuICAgIGZvciAobGV0IHByb3Agb2YgdGhpcy5wcm9wcylcclxuICAgIHtcclxuICAgICAgcHJvcC5yZW1vdmUoKVxyXG4gICAgfVxyXG5cclxuICAgIHRoaXMuZWwuc2NlbmVFbC5zeXN0ZW1zLmxpZ2h0LnVzZXJEZWZpbmVkTGlnaHRzID0gZmFsc2VcclxuICAgIHRoaXMuZWwuc2NlbmVFbC5zeXN0ZW1zLmxpZ2h0LnNldHVwRGVmYXVsdExpZ2h0cygpXHJcblxyXG4gICAgaWYgKHRoaXMuc3lzdGVtLmVudmlyb3BhY2sgPT09IHRoaXMpXHJcbiAgICB7XHJcbiAgICAgIHRoaXMuc3lzdGVtLmVudmlyb3BhY2sgPSBudWxsXHJcbiAgICB9XHJcbiAgfSxcclxuICB1cGRhdGUoKSB7XHJcbiAgICBpZiAodGhpcy5kYXRhLmJhc2VVcmwpXHJcbiAgICB7XHJcbiAgICAgIHRoaXMuc3lzdGVtLmRhdGEuYmFzZVVybCA9IHRoaXMuZGF0YS5iYXNlVXJsXHJcbiAgICB9XHJcblxyXG4gICAgbGV0IHNjZW5lRWwgPSB0aGlzLmVsLnNjZW5lRWw7XHJcbiAgICBsZXQgc2t5ID0gc2NlbmVFbC5xdWVyeVNlbGVjdG9yKCdhLXNreScpO1xyXG4gICAgaWYgKCFza3kpIHtcclxuICAgICAgc2t5ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnYS1za3knKVxyXG4gICAgICBzY2VuZUVsLmFwcGVuZChza3kpXHJcbiAgICB9XHJcblxyXG4gICAgbGV0IGVudiA9IHRoaXMuc3lzdGVtLmVudmlyb25tZW50c1t0aGlzLmRhdGEucHJlc2V0XVxyXG4gICAgaWYgKCFlbnYpIHtcclxuICAgICAgY29uc29sZS53YXJuKFwiTm8gc3VjaCBwcmVzZXRcIiwgdGhpcy5kYXRhLnByZXNldClcclxuICAgICAgcmV0dXJuO1xyXG4gICAgfVxyXG5cclxuICAgIHNreS5zZXRBdHRyaWJ1dGUoJ2Vudmlyb3BhY2staGRyaScsIHtoZHJpOiBlbnYuaGRyaSwgYmFja3N0b3A6IGVudi5iYWNrc3RvcCB8fCBcIlwiLCB0b25lTWFwcGluZzogZW52LnRvbmVNYXBwaW5nIHx8IDF9KVxyXG5cclxuICAgIGxldCBncm91bmRcclxuICAgIGlmICghdGhpcy5ncm91bmQpIHtcclxuICAgICAgZ3JvdW5kID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnYS1wbGFuZScpXHJcbiAgICAgIHRoaXMuZ3JvdW5kID0gZ3JvdW5kXHJcbiAgICAgIHRoaXMuZWwuYXBwZW5kKGdyb3VuZClcclxuICAgICAgZ3JvdW5kLnNldEF0dHJpYnV0ZSgncG9zaXRpb24nLCAnMCAwIDAnKVxyXG4gICAgICBncm91bmQuc2V0QXR0cmlidXRlKCdyb3RhdGlvbicsIFwiLTkwIDAgMFwiKVxyXG4gICAgICBncm91bmQuc2V0QXR0cmlidXRlKCd3aWR0aCcsIDEwMClcclxuICAgICAgZ3JvdW5kLnNldEF0dHJpYnV0ZSgnaGVpZ2h0JywgMTAwKVxyXG4gICAgICBncm91bmQuc2V0QXR0cmlidXRlKCdzaGFkb3cnLCAnJylcclxuICAgIH1cclxuICAgIGVsc2VcclxuICAgIHtcclxuICAgICAgZ3JvdW5kID0gdGhpcy5ncm91bmRcclxuICAgIH1cclxuXHJcbiAgICBpZiAoZW52Lmdyb3VuZClcclxuICAgIHtcclxuICAgICAgZ3JvdW5kLnNldEF0dHJpYnV0ZSgnZW52aXJvcGFjay1tYXRlcmlhbCcsIHttYXRlcmlhbDogZW52Lmdyb3VuZH0pXHJcbiAgICAgIGdyb3VuZC5zZXRBdHRyaWJ1dGUoJ3Zpc2libGUnLCB0cnVlKVxyXG4gICAgfVxyXG4gICAgZWxzZVxyXG4gICAge1xyXG4gICAgICBncm91bmQuc2V0QXR0cmlidXRlKCd2aXNpYmxlJywgXCJmYWxzZVwiKVxyXG4gICAgfVxyXG5cclxuICAgIHNjZW5lRWwucXVlcnlTZWxlY3RvckFsbCgnKltkYXRhLWFmcmFtZS1kZWZhdWx0LWxpZ2h0XScpLmZvckVhY2goZWwgPT4ge1xyXG4gICAgICBlbC5yZW1vdmUoKVxyXG4gICAgfSlcclxuXHJcbiAgICB0aGlzLmVsLnNjZW5lRWwuc3lzdGVtcy5saWdodC51c2VyRGVmaW5lZExpZ2h0cyA9IHRydWVcclxuXHJcbiAgICBmb3IgKGxldCBsaWdodCBvZiB0aGlzLmxpZ2h0cylcclxuICAgIHtcclxuICAgICAgbGlnaHQucmVtb3ZlKClcclxuICAgIH1cclxuICAgIHRoaXMubGlnaHRzLmxlbmd0aCA9IDBcclxuXHJcbiAgICBpZiAodGhpcy5lbC5zY2VuZUVsLnN5c3RlbXNbJ2Vudmlyb3BhY2stbWF0ZXJpYWwnXS5jaG9vc2VTaGFkZXIoKSAhPT0gJ3BibWF0Y2FwJylcclxuICAgIHtcclxuICAgICAgZm9yIChsZXQgbGlnaHQgb2YgKGVudi5saWdodHMgfHwgW10pKVxyXG4gICAgICB7XHJcbiAgICAgICAgbGV0IGVsID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnYS1lbnRpdHknKVxyXG4gICAgICAgIHRoaXMuZWwuYXBwZW5kKGVsKVxyXG4gICAgICAgIHRoaXMubGlnaHRzLnB1c2goZWwpXHJcbiAgICAgICAgZWwuc2V0QXR0cmlidXRlKCdsaWdodCcsICd0eXBlJywgJ2RpcmVjdGlvbmFsJylcclxuICAgICAgICBlbC5zZXRBdHRyaWJ1dGUoJ2xpZ2h0JywgJ2Nhc3RTaGFkb3cnLCAndHJ1ZScpXHJcbiAgICAgICAgZWwuc2V0QXR0cmlidXRlKCdsaWdodCcsICdpbnRlbnNpdHknLCBsaWdodC5pbnRlbnNpdHkpXHJcbiAgICAgICAgZWwuc2V0QXR0cmlidXRlKCdsaWdodCcsICdzaGFkb3dSYWRpdXMnLCBsaWdodC5zaGFkb3dSYWRpdXMgfHwgMSlcclxuICAgICAgICBlbC5zZXRBdHRyaWJ1dGUoJ2xpZ2h0JywgJ3NoYWRvd0JpYXMnLCBsaWdodC5zaGFkb3dCaWFzIHx8IDAuMClcclxuICAgICAgICBlbC5zZXRBdHRyaWJ1dGUoJ3Bvc2l0aW9uJywgbGlnaHQucG9zaXRpb24pXHJcbiAgICAgICAgZWwuc2V0QXR0cmlidXRlKCdsaWdodCcsICdzaGFkb3dDYW1lcmFOZWFyJywgLTEwMClcclxuICAgICAgICBlbC5zZXRBdHRyaWJ1dGUoJ2xpZ2h0JywgJ3NoYWRvd0NhbWVyYVJpZ2h0JywgNTApXHJcbiAgICAgICAgZWwuc2V0QXR0cmlidXRlKCdsaWdodCcsICdzaGFkb3dDYW1lcmFMZWZ0JywgLTUwKVxyXG4gICAgICAgIGVsLnNldEF0dHJpYnV0ZSgnbGlnaHQnLCAnc2hhZG93Q2FtZXJhVG9wJywgNTApXHJcbiAgICAgICAgZWwuc2V0QXR0cmlidXRlKCdsaWdodCcsICdzaGFkb3dDYW1lcmFCb3R0b20nLCAtNTApXHJcbiAgICAgIH1cclxuICAgIH1cclxuXHJcbiAgICBmb3IgKGxldCBwcm9wIG9mIHRoaXMucHJvcHMpXHJcbiAgICB7XHJcbiAgICAgIHByb3AucmVtb3ZlKClcclxuICAgIH1cclxuICAgIHRoaXMucHJvcHMubGVuZ3RoID0gMDtcclxuXHJcbiAgICBmb3IgKGxldCBwcm9wIG9mIChlbnYucHJvcHMgfHwgW10pKVxyXG4gICAge1xyXG4gICAgICBsZXQgZWwgPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KCdhLWVudGl0eScpXHJcbiAgICAgIHRoaXMuZWwuYXBwZW5kKGVsKVxyXG4gICAgICB0aGlzLnByb3BzLnB1c2goZWwpXHJcbiAgICAgIGVsLnNldEF0dHJpYnV0ZSgnZW52aXJvcGFjay1tYXRlcmlhbCcsICdtYXRlcmlhbCcsIHByb3AubWF0ZXJpYWwgfHwgJ3JvY2snKVxyXG4gICAgICBlbC5zZXRBdHRyaWJ1dGUoJ2Vudmlyb3BhY2stcHJvcCcsICdwcm9wJywgcHJvcC5wcm9wIHx8ICdzdG9uZScpXHJcbiAgICAgIGVsLnNldEF0dHJpYnV0ZSgnc2NhdHRlci1lbnZpcm9wYWNrLXByb3BzJywgeydudW1PYmplY3RzJzogcHJvcC5udW1PYmplY3RzIHx8IDUwMDAsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICdtYXhTY2FsZSc6IHByb3AubWF4U2NhbGUgfHwgMjAsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICdtaW5TY2FsZSc6IHByb3AubWluU2NhbGUgfHwgNX0pXHJcbiAgICB9XHJcblxyXG4gICAgdGhpcy5lbC5zY2VuZUVsLnF1ZXJ5U2VsZWN0b3JBbGwoJypbZW52aXJvcGFjay1tYXRlcmlhbF0nKS5mb3JFYWNoKGVsID0+IHtcclxuICAgICAgaWYgKGVsLmNvbXBvbmVudHMgJiYgZWwuY29tcG9uZW50cy5tYXRlcmlhbCAmJiBlbC5jb21wb25lbnRzLm1hdGVyaWFsLmRhdGEuc2hhZGVyID09PSAncGJtYXRjYXAnKVxyXG4gICAgICB7XHJcbiAgICAgICAgZWwuY29tcG9uZW50cy5tYXRlcmlhbC5zaGFkZXIudXBkYXRlKGVsLmNvbXBvbmVudHMubWF0ZXJpYWwuZGF0YSlcclxuICAgICAgfVxyXG4gICAgfSlcclxuICB9XHJcbn0pXHJcblxyXG5jb25zdCBIRFJJUyA9IHt9O1xyXG5mb3IgKGxldCBmaWxlTmFtZSBvZiByZXF1aXJlLmNvbnRleHQoJy4vaGRyaXMvJywgdHJ1ZSwgLy4qLykua2V5cygpKSB7XHJcbiAgbGV0IFtkb3QsIGZpbGVdID0gZmlsZU5hbWUuc3BsaXQoJy8nKVxyXG4gIGxldCBuYW1lID0gZmlsZS5tYXRjaCgvKC4qPylbLV9dXFxkK2svaSlbMV1cclxuXHJcbiAgSERSSVNbbmFtZV0gPSByZXF1aXJlKGAuL2hkcmlzLyR7ZmlsZX1gKVxyXG59XHJcblxyXG5jb25zdCBCQUNLU1RPUFMgPSB7fTtcclxuXHJcbmZvciAobGV0IGZpbGVOYW1lIG9mIHJlcXVpcmUuY29udGV4dCgnLi9iYWNrc3RvcHMvJywgdHJ1ZSwgLy4qLykua2V5cygpKSB7XHJcbiAgbGV0IFtkb3QsIGZpbGVdID0gZmlsZU5hbWUuc3BsaXQoJy8nKVxyXG4gIGxldCBuYW1lID0gZmlsZS5tYXRjaCgvKC4qPylcXC5qcGcvaSlbMV1cclxuXHJcbiAgQkFDS1NUT1BTW25hbWVdID0gcmVxdWlyZShgLi9iYWNrc3RvcHMvJHtmaWxlfWApXHJcbn1cclxuXHJcbkFGUkFNRS5yZWdpc3RlclN5c3RlbSgnZW52aXJvcGFjay1oZHJpJywge1xyXG4gIGluaXQoKSB7XHJcbiAgICB0aGlzLmhkcmlzID0gSERSSVM7XHJcbiAgfSxcclxufSlcclxuXHJcbi8vIEFsbG93cyBzZXR0aW5nIGFuIEhEUkkgdG8gdXNlIGFzIGFuIGEtc2t5IGJhY2tncm91bmQgYW5kIHNjZW5lLXdpZGVcclxuLy8gZW52aXJvbm1lbnQgbWFwXHJcbkFGUkFNRS5yZWdpc3RlckNvbXBvbmVudCgnZW52aXJvcGFjay1oZHJpJywge1xyXG4gIGRlcGVuZGVuY2llczogWydtYXRlcmlhbCddLFxyXG4gIHNjaGVtYToge1xyXG4gICAgLy8gU2VsZWN0b3IgZm9yIHRoZSBgYS1hc3NldC1pdGVtYCB3aXRoIHRoZSBzcmMgc2V0IHRvIHRoZSBgLmhkcmlgIGZpbGVcclxuICAgIGhkcmk6IHt0eXBlOiAnc3RyaW5nJywgb25lT2Y6IEhEUklTfSxcclxuXHJcbiAgICBiYWNrc3RvcDoge3R5cGU6ICdzdHJpbmcnfSxcclxuXHJcbiAgICAvLyBFeHBvc3VyZSBmb3IgdGhlIGhkcmlcclxuICAgIGV4cG9zdXJlOiB7ZGVmYXVsdDogMS4wfSxcclxuXHJcbiAgICAvLyBUSFJFRS5qcyB0b25lIG1hcHBpbmcgY29uc3RhbnRcclxuICAgIHRvbmVNYXBwaW5nOiB7ZGVmYXVsdDogMX0sXHJcblxyXG4gICAgLy8gSWYgc2V0LCB3aWxsIHNldCB0aGUgZW52TWFwIGZvciBhbGwgc2VsZWN0ZWQgZWxlbWVudHMgYW5kIGNoaWxkcmVuIHdpdGggY29tcGF0aWJsZSBtYXRlcmlhbHNcclxuICAgIGVudk1hcFNlbGVjdG9yOiB7dHlwZTogJ3N0cmluZycsIGRlZmF1bHQ6ICdhLXNjZW5lJ30sXHJcblxyXG4gICAgLy8gSW50ZW5zaXR5IG9mIHRoZSBlbnZpcm9uZW1lbnQgbWFwXHJcbiAgICBpbnRlbnNpdHk6IHtkZWZhdWx0OiAxLjB9LFxyXG5cclxuICAgIC8vIElmID4gMCB3aWxsIHNldCB0aGUgZW52TWFwIGZvciBhbGwgb2JqZWN0cyB3aXRoIGNvbXBhdGlibGUgbWF0ZXJpYWwgY29udGludW91c2x5XHJcbiAgICB1cGRhdGVFbnZNYXBUaHJvdHRsZToge2RlZmF1bHQ6IDEwMH0sXHJcbiAgfSxcclxuICBpbml0KCkge1xyXG4gICAgaWYgKHRoaXMuZWwuaGFzQXR0cmlidXRlKCdtYXRlcmlhbCcpKVxyXG4gICAge1xyXG4gICAgICB0aGlzLm9yaWdpbmFsTWF0ZXJpYWwgPSBBRlJBTUUudXRpbHMuZXh0ZW5kKHt9LCB0aGlzLmVsLmdldEF0dHJpYnV0ZSgnbWF0ZXJpYWwnKSlcclxuICAgIH1cclxuICB9LFxyXG4gIHJlbW92ZSgpIHtcclxuICAgIHRoaXMuZWwucmVtb3ZlQXR0cmlidXRlKCdtYXRlcmlhbCcpXHJcbiAgICB0aGlzLmVsLnNldEF0dHJpYnV0ZSgnbWF0ZXJpYWwnLCB0aGlzLm9yaWdpbmFsTWF0ZXJpYWwpXHJcblxyXG4gICAgZm9yIChsZXQgciBvZiB0aGlzLmVudk1hcFNlbGVjdG9yRWxlbWVudHMpXHJcbiAgICB7XHJcbiAgICAgIHIub2JqZWN0M0QudHJhdmVyc2VWaXNpYmxlKG8gPT4ge1xyXG4gICAgICAgIGlmIChvLm1hdGVyaWFsICYmIG8ubWF0ZXJpYWwudHlwZSA9PT0gJ01lc2hTdGFuZGFyZE1hdGVyaWFsJyAmJlxyXG4gICAgICAgICAgKG8ubWF0ZXJpYWwuZW52TWFwID09PSB0aGlzLmVudk1hcCkpXHJcbiAgICAgICAge1xyXG4gICAgICAgICAgby5tYXRlcmlhbC5lbnZNYXAgPSBudWxsXHJcbiAgICAgICAgICBvLm1hdGVyaWFsLm5lZWRzVXBkYXRlID0gdHJ1ZVxyXG4gICAgICAgIH1cclxuICAgICAgfSlcclxuICAgIH1cclxuICB9LFxyXG4gIHVwZGF0ZShvbGREYXRhKSB7XHJcbiAgICBpZiAob2xkRGF0YS5oZHJpICE9PSB0aGlzLmRhdGEuaGRyaSlcclxuICAgIHtcclxuICAgICAgdGhpcy5zZXRIRFJJKClcclxuICAgIH1cclxuXHJcbiAgICBpZiAob2xkRGF0YS5lbnZNYXBTZWxlY3RvciAhPT0gdGhpcy5kYXRhLmVudk1hcFNlbGVjdG9yKVxyXG4gICAge1xyXG4gICAgICB0aGlzLmVudk1hcFNlbGVjdG9yRWxlbWVudHMgPSBBcnJheS5mcm9tKGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwodGhpcy5kYXRhLmVudk1hcFNlbGVjdG9yKSlcclxuICAgIH1cclxuXHJcbiAgICB0aGlzLmVsLnNjZW5lRWwucmVuZGVyZXIudG9uZU1hcHBpbmcgPSB0aGlzLmRhdGEudG9uZU1hcHBpbmdcclxuICAgIHRoaXMuZWwuc2NlbmVFbC5yZW5kZXJlci50b25lTWFwcGluZ0V4cG9zdXJlID0gdGhpcy5kYXRhLmV4cG9zdXJlXHJcblxyXG4gICAgaWYgKG9sZERhdGEudXBkYXRlRW52TWFwVGhyb3R0bGUgIT09IHRoaXMuZGF0YS51cGRhdGVFbnZNYXBUaHJvdHRsZSlcclxuICAgIHtcclxuICAgICAgaWYgKHRoaXMuZGF0YS51cGRhdGVFbnZNYXBUaHJvdHRsZSA8PSAwKSB7XHJcbiAgICAgICAgdGhpcy50aWNrID0gZnVuY3Rpb24oKSB7fVxyXG4gICAgICB9XHJcbiAgICAgIGVsc2VcclxuICAgICAge1xyXG4gICAgICAgIHRoaXMudGljayA9IEFGUkFNRS51dGlscy50aHJvdHRsZVRpY2sodGhpcy5fdGljaywgdGhpcy5kYXRhLnVwZGF0ZUVudk1hcFRocm90dGxlLCB0aGlzKVxyXG4gICAgICB9XHJcbiAgICB9XHJcbiAgfSxcclxuXHJcbiAgLy8gTG9hZHMgYW4gUkdCRSAoLmhkcikgaW1hZ2UgZnJvbSBVUkwsIGFuZCByZXR1cm5zIGEgUHJvbWlzZSByZXNvbHZpbmcgdG8gYSB0ZXh0dXJlXHJcbiAgbG9hZFJHQkUodXJsKSB7XHJcbiAgICByZXR1cm4gbmV3IFByb21pc2UoKHIsIGUpID0+IHtcclxuICAgICAgbmV3IFJHQkVMb2FkZXIoKVxyXG4gIFx0XHRcdC5zZXREYXRhVHlwZSggVEhSRUUuSGFsZkZsb2F0VHlwZSApIC8vIGFsdDogRmxvYXRUeXBlLCBIYWxmRmxvYXRUeXBlXHJcbiAgXHRcdFx0LmxvYWQoIHVybCAsIGZ1bmN0aW9uICggdGV4dHVyZSwgdGV4dHVyZURhdGEgKSB7XHJcbiAgICAgICAgICByKHt0ZXh0dXJlLCB0ZXh0dXJlRGF0YX0pXHJcbiAgXHRcdFx0fSApO1xyXG4gICAgICB9KVxyXG4gIH0sXHJcbiAgYXN5bmMgc2V0SERSSSgpIHtcclxuICAgIGxldCB1cmwgPSB0aGlzLmVsLnNjZW5lRWwuc3lzdGVtcy5lbnZpcm9wYWNrLnVybCh0aGlzLnN5c3RlbS5oZHJpc1t0aGlzLmRhdGEuaGRyaV0pXHJcbiAgICBsZXQge3RleHR1cmV9ID0gYXdhaXQgdGhpcy5sb2FkUkdCRSh1cmwpXHJcbiAgICBsZXQgcmVuZGVyZXIgPSB0aGlzLmVsLnNjZW5lRWwucmVuZGVyZXJcclxuICAgIHJlbmRlcmVyLnRvbmVNYXBwaW5nID0gdGhpcy5kYXRhLnRvbmVNYXBwaW5nXHJcbiAgICByZW5kZXJlci50b25lTWFwcGluZ0V4cG9zdXJlID0gdGhpcy5kYXRhLmV4cG9zdXJlXHJcbiAgICBsZXQgd2FzWFJFbmFibGVkID0gcmVuZGVyZXIueHIuZW5hYmxlZFxyXG4gICAgcmVuZGVyZXIueHIuZW5hYmxlZCA9IGZhbHNlXHJcbiAgICBsZXQgUE1SRU1HZW5lcmF0b3JDbGFzcyA9IFRIUkVFLlBNUkVNR2VuZXJhdG9yIHx8IFBNUkVNR2VuZXJhdG9yXHJcbiAgICB2YXIgcG1yZW1HZW5lcmF0b3IgPSBuZXcgUE1SRU1HZW5lcmF0b3JDbGFzcyggcmVuZGVyZXIgKTtcclxuICAgIHBtcmVtR2VuZXJhdG9yLmNvbXBpbGVFcXVpcmVjdGFuZ3VsYXJTaGFkZXIoKTtcclxuXHJcbiAgICBsZXQgc2t5RWwgPSB0aGlzLmVsXHJcbiAgICBsZXQgbWVzaCA9IHNreUVsLmdldE9iamVjdDNEKCdtZXNoJylcclxuICAgIG1lc2gubWF0ZXJpYWwuY29sb3Iuc2V0KFwiI0ZGRkZGRlwiKVxyXG5cclxuICAgIGlmICh0aGlzLmRhdGEuYmFja3N0b3AgfHwgdGhpcy5kYXRhLmhkcmkgaW4gQkFDS1NUT1BTKVxyXG4gICAge1xyXG4gICAgICBza3lFbC5zZXRBdHRyaWJ1dGUoJ21hdGVyaWFsJywgJ2NvbG9yJywgJ3doaXRlJylcclxuICAgICAgc2t5RWwuc2V0QXR0cmlidXRlKCdtYXRlcmlhbCcsICdzcmMnLCAnJylcclxuICAgICAgc2t5RWwuc2V0QXR0cmlidXRlKCdtYXRlcmlhbCcsICdzcmMnLCB0aGlzLmVsLnNjZW5lRWwuc3lzdGVtcy5lbnZpcm9wYWNrLnVybChyZXF1aXJlKGAuL2JhY2tzdG9wcy8ke3RoaXMuZGF0YS5iYWNrc3RvcCB8fCB0aGlzLmRhdGEuaGRyaX0uanBnYCkpKVxyXG4gICAgICBza3lFbC5jb21wb25lbnRzLm1hdGVyaWFsLm1hdGVyaWFsLnRvbmVNYXBwZWQgPSBmYWxzZVxyXG4gICAgICBza3lFbC5jb21wb25lbnRzLm1hdGVyaWFsLm1hdGVyaWFsLm5lZWRzVXBkYXRlID0gdHJ1ZVxyXG4gICAgfVxyXG4gICAgZWxzZVxyXG4gICAge1xyXG4gICAgICBtZXNoLm1hdGVyaWFsLm1hcCA9IHRleHR1cmVcclxuICAgICAgbWVzaC5tYXRlcmlhbC5uZWVkc1VwZGF0ZSA9IHRydWVcclxuICAgICAgc2t5RWwuY29tcG9uZW50cy5tYXRlcmlhbC5tYXRlcmlhbC50b25lTWFwcGVkID0gdHJ1ZVxyXG4gICAgICBza3lFbC5jb21wb25lbnRzLm1hdGVyaWFsLm1hdGVyaWFsLm5lZWRzVXBkYXRlID0gdHJ1ZVxyXG4gICAgfVxyXG5cclxuICAgIG1lc2guc2NhbGUueCA9IC0xXHJcbiAgICBtZXNoLnNjYWxlLnogPSAtMVxyXG5cclxuICAgIHRoaXMuaGRyaVRleHR1cmUgPSB0ZXh0dXJlXHJcbiAgICB2YXIgZW52TWFwID0gcG1yZW1HZW5lcmF0b3IuZnJvbUVxdWlyZWN0YW5ndWxhciggdGV4dHVyZSApLnRleHR1cmU7XHJcblxyXG4gICAgdGhpcy5lbnZNYXAgPSBlbnZNYXBcclxuICAgIHJlbmRlcmVyLnhyLmVuYWJsZWQgPSB3YXNYUkVuYWJsZWRcclxuXHJcbiAgICBwbXJlbUdlbmVyYXRvci5kaXNwb3NlKClcclxuXHJcbiAgICB0aGlzLnNldEVudk1hcCgpXHJcbiAgfSxcclxuICBzZXRFbnZNYXAoKSB7XHJcbiAgICBpZiAoIXRoaXMuZW52TWFwU2VsZWN0b3JFbGVtZW50cykgcmV0dXJuXHJcbiAgICBmb3IgKGxldCByIG9mIHRoaXMuZW52TWFwU2VsZWN0b3JFbGVtZW50cylcclxuICAgIHtcclxuICAgICAgci5vYmplY3QzRC50cmF2ZXJzZVZpc2libGUobyA9PiB7XHJcbiAgICAgICAgaWYgKG8ubWF0ZXJpYWwgJiYgby5tYXRlcmlhbC50eXBlID09PSAnTWVzaFN0YW5kYXJkTWF0ZXJpYWwnICYmXHJcbiAgICAgICAgICAoby5tYXRlcmlhbC5lbnZNYXAgIT09IHRoaXMuZW52TWFwIHx8IG8ubWF0ZXJpYWwuZW52TWFwSW50ZW5zaXR5ICE9PSB0aGlzLmRhdGEuZW52TWFwSW50ZW5zaXR5KSlcclxuICAgICAgICB7XHJcbiAgICAgICAgICBvLm1hdGVyaWFsLmVudk1hcCA9IHRoaXMuZW52TWFwXHJcbiAgICAgICAgICBvLm1hdGVyaWFsLmVudk1hcEludGVuc2l0eSA9IHRoaXMuZGF0YS5pbnRlbnNpdHlcclxuICAgICAgICAgIG8ubWF0ZXJpYWwubmVlZHNVcGRhdGUgPSB0cnVlXHJcbiAgICAgICAgfVxyXG4gICAgICB9KVxyXG4gICAgfVxyXG4gIH0sXHJcbiAgX3RpY2soKSB7XHJcbiAgICB0aGlzLnNldEVudk1hcCgpXHJcbiAgfSxcclxufSlcclxuIiwiY29uc3QgUFJPUFMgPSB7fVxyXG5mb3IgKGxldCBmaWxlTmFtZSBvZiByZXF1aXJlLmNvbnRleHQoJy4vbW9kZWxzLycsIHRydWUsIC8uKi8pLmtleXMoKSkge1xyXG4gIGxldCBbZG90LCBmaWxlXSA9IGZpbGVOYW1lLnNwbGl0KCcvJylcclxuICBsZXQgbmFtZSA9IGZpbGUubWF0Y2goLyguKj8pXFwuZ2xiL2kpWzFdXHJcblxyXG4gIFBST1BTW25hbWVdID0gcmVxdWlyZShgLi9tb2RlbHMvJHtmaWxlfWApXHJcbn1cclxuXHJcbmlmIChBRlJBTUUudXRpbHMuZGV2aWNlLmlzTW9iaWxlVlIoKSlcclxue1xyXG4gIFBST1BTLnJvY2sgPSBQUk9QUy5zdG9uZVxyXG59XHJcblxyXG5BRlJBTUUucmVnaXN0ZXJDb21wb25lbnQoJ2Vudmlyb3BhY2stcHJvcCcsIHtcclxuICBzY2hlbWE6IHtcclxuICAgIHByb3A6IHt0eXBlOiAnc3RyaW5nJywgb25lT2Y6IFBST1BTfSxcclxuICB9LFxyXG4gIHVwZGF0ZShvbGREYXRhKSB7XHJcbiAgICBpZiAoISh0aGlzLmRhdGEucHJvcCBpbiBQUk9QUykpXHJcbiAgICB7XHJcbiAgICAgIGNvbnNvbGUud2FybihcIk5vIHN1Y2ggcHJvcFwiLCB0aGlzLmRhdGEucHJvcClcclxuICAgICAgcmV0dXJuO1xyXG4gICAgfVxyXG4gICAgdGhpcy5lbC5zZXRBdHRyaWJ1dGUoJ2dsdGYtbW9kZWwnLCB0aGlzLmVsLnNjZW5lRWwuc3lzdGVtcy5lbnZpcm9wYWNrLnVybChQUk9QU1t0aGlzLmRhdGEucHJvcF0pKVxyXG4gIH1cclxufSlcclxuXHJcbkFGUkFNRS5yZWdpc3RlckNvbXBvbmVudCgnc2NhdHRlci1lbnZpcm9wYWNrLXByb3BzJywge1xyXG4gIHNjaGVtYToge1xyXG4gICAgaW5uZXJSYWRpdXM6IHtkZWZhdWx0OiAzMH0sXHJcbiAgICBvdXRlclJhZGl1czoge2RlZmF1bHQ6IDUwfSxcclxuICAgIG51bU9iamVjdHM6IHtkZWZhdWx0OiA1MDAwfSxcclxuICAgIG1heFNjYWxlOiB7IGRlZmF1bHQ6IDIwfSxcclxuICAgIG1pblNjYWxlOiB7ZGVmYXVsdDogMC41ICogMTB9LFxyXG4gIH0sXHJcbiAgZXZlbnRzOiB7XHJcbiAgICBvYmplY3QzZHNldDogZnVuY3Rpb24oZSkge1xyXG4gICAgICB0aGlzLmVsLmdldE9iamVjdDNEKCdtZXNoJykudmlzaWJsZSA9IGZhbHNlXHJcbiAgICAgIHRoaXMuc2NhdHRlcigpO1xyXG4gICAgfSxcclxuICAgICdlbnZpcm9wYWNrLW1hdGVyaWFsLWFwcGxpZWQnOiBmdW5jdGlvbihlKSB7XHJcbiAgICAgIHRoaXMuc2NhdHRlcigpO1xyXG4gICAgfSxcclxuICAgIG1hdGVyaWFsdGV4dHVyZWxvYWRlZDogZnVuY3Rpb24oZSkge1xyXG4gICAgICB0aGlzLnNjYXR0ZXIoKTtcclxuICAgIH0sXHJcbiAgICBjb21wb25lbnRjaGFuZ2VkOiBmdW5jdGlvbihlKSB7XHJcbiAgICAgIGlmIChlLmRldGFpbCA9PT0gJ21hdGVyaWFsJylcclxuICAgICAge1xyXG4gICAgICAgIHRoaXMuc2NhdHRlcigpO1xyXG4gICAgICB9XHJcbiAgICB9XHJcbiAgfSxcclxuICB1cGRhdGUob2xkRGF0YSkge1xyXG4gICAgdGhpcy5zY2F0dGVyKCk7XHJcbiAgfSxcclxuICBpbml0KCkge1xyXG4gIH0sXHJcbiAgcmVtb3ZlKCkge1xyXG4gICAgaWYgKHRoaXMuaW5zdGFuY2VkTWVzaClcclxuICAgIHtcclxuICAgICAgdGhpcy5pbnN0YW5jZWRNZXNoLnBhcmVudC5yZW1vdmUodGhpcy5pbnN0YW5jZWRNZXNoKVxyXG4gICAgICB0aGlzLmluc3RhbmNlZE1lc2guZGlzcG9zZSgpXHJcbiAgICB9XHJcbiAgfSxcclxuICBzY2F0dGVyKCkge1xyXG4gICAgaWYgKCF0aGlzLmVsLmdldE9iamVjdDNEKCdtZXNoJykpIHJldHVybjtcclxuICAgIGxldCBzb3VyY2VNZXNoID0gdGhpcy5lbC5nZXRPYmplY3QzRCgnbWVzaCcpLmdldE9iamVjdEJ5UHJvcGVydHkoJ3R5cGUnLCAnTWVzaCcpXHJcbiAgICBpZiAoIXNvdXJjZU1lc2gpIHJldHVybjtcclxuICAgIC8vIGlmICh0aGlzLmVsLmNvbXBvbmVudHMubWF0ZXJpYWwubWF0ZXJpYWwudHlwZSAhPT0gJ01lc2hTdGFuZGFyZE1hdGVyaWFsJykgcmV0dXJuO1xyXG4gICAgaWYgKHRoaXMuaW5zdGFuY2VkTWVzaClcclxuICAgIHtcclxuICAgICAgdGhpcy5pbnN0YW5jZWRNZXNoLnBhcmVudC5yZW1vdmUodGhpcy5pbnN0YW5jZWRNZXNoKVxyXG4gICAgICB0aGlzLmluc3RhbmNlZE1lc2guZGlzcG9zZSgpXHJcbiAgICB9XHJcblxyXG4gICAgbGV0IG51bU9iamVjdHMgPSB0aGlzLmRhdGEubnVtT2JqZWN0cztcclxuXHJcbiAgICBpZiAoQUZSQU1FLnV0aWxzLmRldmljZS5pc01vYmlsZSgpIHx8IEFGUkFNRS51dGlscy5kZXZpY2UuaXNNb2JpbGVWUigpKVxyXG4gICAge1xyXG4gICAgICBudW1PYmplY3RzID0gTWF0aC5taW4oMTAwLCBudW1PYmplY3RzKVxyXG4gICAgfVxyXG5cclxuICAgIGxldCBpbnN0YW5jZWRNZXNoID0gbmV3IFRIUkVFLkluc3RhbmNlZE1lc2goc291cmNlTWVzaC5nZW9tZXRyeSwgdGhpcy5lbC5jb21wb25lbnRzLm1hdGVyaWFsLm1hdGVyaWFsLCBudW1PYmplY3RzKVxyXG4gICAgLy8gT2xkIGEtZnJhbWUgY29tcGF0aWJpbGl0eVxyXG4gICAgaWYgKCFpbnN0YW5jZWRNZXNoLmRpc3Bvc2UpIHtcclxuICAgICAgaW5zdGFuY2VkTWVzaC5kaXNwb3NlID0gZnVuY3Rpb24oKSB7fTtcclxuICAgIH1cclxuICAgIGxldCBtYXRyaXggPSBuZXcgVEhSRUUuTWF0cml4NCgpO1xyXG4gICAgbGV0IHBvcyA9IG5ldyBUSFJFRS5WZWN0b3IzKCk7XHJcbiAgICBsZXQgc2NhbGUgPSBuZXcgVEhSRUUuVmVjdG9yMygpO1xyXG4gICAgbGV0IHJvdCA9IG5ldyBUSFJFRS5FdWxlcigpO1xyXG4gICAgbGV0IHF1YXQgPSBuZXcgVEhSRUUuUXVhdGVybmlvbigpXHJcblxyXG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBudW1PYmplY3RzOyArK2kpXHJcbiAgICB7XHJcbiAgICAgIG1hdHJpeC5pZGVudGl0eSgpXHJcbiAgICAgIHBvcy5zZXRGcm9tU3BoZXJpY2FsQ29vcmRzKFxyXG4gICAgICAgIFRIUkVFLk1hdGhVdGlscy5sZXJwKHRoaXMuZGF0YS5pbm5lclJhZGl1cywgdGhpcy5kYXRhLm91dGVyUmFkaXVzLCBNYXRoLnJhbmRvbSgpKSxcclxuICAgICAgICBNYXRoLnJhbmRvbSgpICogTWF0aC5QSSAqIDIsXHJcbiAgICAgICAgMFxyXG4gICAgICApO1xyXG4gICAgICBwb3MueCA9IHBvcy55O1xyXG4gICAgICBwb3MueSA9IDA7XHJcbiAgICAgIHNjYWxlLnNldCgxLDEsMSlcclxuICAgICAgc2NhbGUubXVsdGlwbHlTY2FsYXIoVEhSRUUuTWF0aFV0aWxzLmxlcnAodGhpcy5kYXRhLm1pblNjYWxlLCB0aGlzLmRhdGEubWF4U2NhbGUsIE1hdGgucmFuZG9tKCkpKTtcclxuICAgICAgcm90LnkgPSBNYXRoLnJhbmRvbSgpICogTWF0aC5QSSAqIDI7XHJcbiAgICAgIHF1YXQuc2V0RnJvbUV1bGVyKHJvdClcclxuICAgICAgbWF0cml4LmNvbXBvc2UocG9zLCBxdWF0LCBzY2FsZSlcclxuICAgICAgaW5zdGFuY2VkTWVzaC5zZXRNYXRyaXhBdChpLCBtYXRyaXgpXHJcbiAgICAgIC8vIGluc3RhbmNlZE1lc2guaW5zdGFuY2VNYXRyaXgubmVlZHNVcGRhdGUgPSB0cnVlXHJcbiAgICAgIC8vIGUub2JqZWN0M0Qucm90YXRpb24ueSA9IE1hdGgucmFuZG9tKCkgKiBNYXRoLlBJICogMjtcclxuICAgIH1cclxuICAgIHRoaXMuZWwub2JqZWN0M0QuYWRkKGluc3RhbmNlZE1lc2gpXHJcbiAgICB0aGlzLmluc3RhbmNlZE1lc2ggPSBpbnN0YW5jZWRNZXNoXHJcbiAgfVxyXG59KVxyXG4iLCJ2YXIgbWFwID0ge1xuXHRcIi4vYWJhbmRvbmVkX3RhbmtfZmFybV8wMl8yay5oZHJcIjogXCIuL3NyYy9oZHJpcy9hYmFuZG9uZWRfdGFua19mYXJtXzAyXzJrLmhkclwiLFxuXHRcIi4vYXV0dW1uX2hvY2tleV8yay5oZHJcIjogXCIuL3NyYy9oZHJpcy9hdXR1bW5faG9ja2V5XzJrLmhkclwiLFxuXHRcIi4vY29sb3JmdWxfc3R1ZGlvXzFrLmhkclwiOiBcIi4vc3JjL2hkcmlzL2NvbG9yZnVsX3N0dWRpb18xay5oZHJcIixcblx0XCIuL2Rpa2hvbG9sb19uaWdodF9lZGl0XzFrLmhkclwiOiBcIi4vc3JjL2hkcmlzL2Rpa2hvbG9sb19uaWdodF9lZGl0XzFrLmhkclwiLFxuXHRcIi4vbGFyZ2VfY29ycmlkb3JfMWsuaGRyXCI6IFwiLi9zcmMvaGRyaXMvbGFyZ2VfY29ycmlkb3JfMWsuaGRyXCIsXG5cdFwiLi9tb29ubGVzc19nb2xmXzFrLmhkclwiOiBcIi4vc3JjL2hkcmlzL21vb25sZXNzX2dvbGZfMWsuaGRyXCIsXG5cdFwiLi90aGVfc2t5X2lzX29uX2ZpcmVfMmsuaGRyXCI6IFwiLi9zcmMvaGRyaXMvdGhlX3NreV9pc19vbl9maXJlXzJrLmhkclwiLFxuXHRcIi4vd2ludGVyX2xha2VfMDFfMmsuaGRyXCI6IFwiLi9zcmMvaGRyaXMvd2ludGVyX2xha2VfMDFfMmsuaGRyXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL2hkcmlzIHN5bmMgcmVjdXJzaXZlIC4qXCI7IiwidmFyIG1hcCA9IHtcblx0XCIuL2FiYW5kb25lZF90YW5rX2Zhcm1fMDJfMmsuaGRyXCI6IFwiLi9zcmMvaGRyaXMvYWJhbmRvbmVkX3RhbmtfZmFybV8wMl8yay5oZHJcIixcblx0XCIuL2F1dHVtbl9ob2NrZXlfMmsuaGRyXCI6IFwiLi9zcmMvaGRyaXMvYXV0dW1uX2hvY2tleV8yay5oZHJcIixcblx0XCIuL2NvbG9yZnVsX3N0dWRpb18xay5oZHJcIjogXCIuL3NyYy9oZHJpcy9jb2xvcmZ1bF9zdHVkaW9fMWsuaGRyXCIsXG5cdFwiLi9kaWtob2xvbG9fbmlnaHRfZWRpdF8xay5oZHJcIjogXCIuL3NyYy9oZHJpcy9kaWtob2xvbG9fbmlnaHRfZWRpdF8xay5oZHJcIixcblx0XCIuL2xhcmdlX2NvcnJpZG9yXzFrLmhkclwiOiBcIi4vc3JjL2hkcmlzL2xhcmdlX2NvcnJpZG9yXzFrLmhkclwiLFxuXHRcIi4vbW9vbmxlc3NfZ29sZl8xay5oZHJcIjogXCIuL3NyYy9oZHJpcy9tb29ubGVzc19nb2xmXzFrLmhkclwiLFxuXHRcIi4vdGhlX3NreV9pc19vbl9maXJlXzJrLmhkclwiOiBcIi4vc3JjL2hkcmlzL3RoZV9za3lfaXNfb25fZmlyZV8yay5oZHJcIixcblx0XCIuL3dpbnRlcl9sYWtlXzAxXzJrLmhkclwiOiBcIi4vc3JjL2hkcmlzL3dpbnRlcl9sYWtlXzAxXzJrLmhkclwiXG59O1xuXG5cbmZ1bmN0aW9uIHdlYnBhY2tDb250ZXh0KHJlcSkge1xuXHR2YXIgaWQgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKTtcblx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oaWQpO1xufVxuZnVuY3Rpb24gd2VicGFja0NvbnRleHRSZXNvbHZlKHJlcSkge1xuXHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKG1hcCwgcmVxKSkge1xuXHRcdHZhciBlID0gbmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIiArIHJlcSArIFwiJ1wiKTtcblx0XHRlLmNvZGUgPSAnTU9EVUxFX05PVF9GT1VORCc7XG5cdFx0dGhyb3cgZTtcblx0fVxuXHRyZXR1cm4gbWFwW3JlcV07XG59XG53ZWJwYWNrQ29udGV4dC5rZXlzID0gZnVuY3Rpb24gd2VicGFja0NvbnRleHRLZXlzKCkge1xuXHRyZXR1cm4gT2JqZWN0LmtleXMobWFwKTtcbn07XG53ZWJwYWNrQ29udGV4dC5yZXNvbHZlID0gd2VicGFja0NvbnRleHRSZXNvbHZlO1xubW9kdWxlLmV4cG9ydHMgPSB3ZWJwYWNrQ29udGV4dDtcbndlYnBhY2tDb250ZXh0LmlkID0gXCIuL3NyYy9oZHJpcyBzeW5jIHJlY3Vyc2l2ZSBeXFxcXC5cXFxcLy4qJFwiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L2hkcmlzL2FiYW5kb25lZF90YW5rX2Zhcm1fMDJfMmsuaGRyXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvaGRyaXMvYXV0dW1uX2hvY2tleV8yay5oZHJcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9oZHJpcy9jb2xvcmZ1bF9zdHVkaW9fMWsuaGRyXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvaGRyaXMvZGlraG9sb2xvX25pZ2h0X2VkaXRfMWsuaGRyXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvaGRyaXMvbGFyZ2VfY29ycmlkb3JfMWsuaGRyXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvaGRyaXMvbW9vbmxlc3NfZ29sZl8xay5oZHJcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9oZHJpcy90aGVfc2t5X2lzX29uX2ZpcmVfMmsuaGRyXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvaGRyaXMvd2ludGVyX2xha2VfMDFfMmsuaGRyXCI7IiwicmVxdWlyZSgnLi9lbnZpcm9wYWNrLW1hdGVyaWFsLmpzJylcclxucmVxdWlyZSgnLi9oZC1lbnZpcm9ubWVudC5qcycpXHJcbnJlcXVpcmUoJy4vaGQtcHJvcHMuanMnKVxyXG5yZXF1aXJlKCcuL3BiLW1hdGNhcC5qcycpXHJcbnJlcXVpcmUoJy4uL3BhY2thZ2UuanNvbicpXHJcbnJlcXVpcmUoJyEhZmlsZS1sb2FkZXI/bmFtZT1SZWFkbWUubWQhLi4vUmVhZG1lLm1kJylcclxucmVxdWlyZSgnISFmaWxlLWxvYWRlcj9uYW1lPWVudmlyb3BhY2tzLmdpZiEuLi9lbnZpcm9wYWNrcy5naWYnKVxyXG4iLCJ2YXIgbWFwID0ge1xuXHRcIi4vYXV0dW1uL3JvdWdoRGlhbGVjdHJpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvYXV0dW1uL3JvdWdoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL2F1dHVtbi9yb3VnaE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9hdXR1bW4vcm91Z2hNZXRhbGxpYy5qcGdcIixcblx0XCIuL2F1dHVtbi9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9hdXR1bW4vc21vb3RoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL2F1dHVtbi9zbW9vdGhNZXRhbGxpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvYXV0dW1uL3Ntb290aE1ldGFsbGljLmpwZ1wiLFxuXHRcIi4vZGVmYXVsdC9yb3VnaERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL2RlZmF1bHQvcm91Z2hEaWFsZWN0cmljLmpwZ1wiLFxuXHRcIi4vZGVmYXVsdC9yb3VnaE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9kZWZhdWx0L3JvdWdoTWV0YWxsaWMuanBnXCIsXG5cdFwiLi9kZWZhdWx0L3Ntb290aERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL2RlZmF1bHQvc21vb3RoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL2RlZmF1bHQvc21vb3RoTWV0YWxsaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL2RlZmF1bHQvc21vb3RoTWV0YWxsaWMuanBnXCIsXG5cdFwiLi9pbnRlcmlvci9yb3VnaERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL2ludGVyaW9yL3JvdWdoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL2ludGVyaW9yL3JvdWdoTWV0YWxsaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL2ludGVyaW9yL3JvdWdoTWV0YWxsaWMuanBnXCIsXG5cdFwiLi9pbnRlcmlvci9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9pbnRlcmlvci9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiLFxuXHRcIi4vaW50ZXJpb3Ivc21vb3RoTWV0YWxsaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL2ludGVyaW9yL3Ntb290aE1ldGFsbGljLmpwZ1wiLFxuXHRcIi4vbmlnaHQvcm91Z2hEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9uaWdodC9yb3VnaERpYWxlY3RyaWMuanBnXCIsXG5cdFwiLi9uaWdodC9yb3VnaE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9uaWdodC9yb3VnaE1ldGFsbGljLmpwZ1wiLFxuXHRcIi4vbmlnaHQvc21vb3RoRGlhbGVjdHJpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvbmlnaHQvc21vb3RoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL25pZ2h0L3Ntb290aE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9uaWdodC9zbW9vdGhNZXRhbGxpYy5qcGdcIixcblx0XCIuL3NhbmRzdG9uZS9yb3VnaERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3NhbmRzdG9uZS9yb3VnaERpYWxlY3RyaWMuanBnXCIsXG5cdFwiLi9zYW5kc3RvbmUvcm91Z2hNZXRhbGxpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvc2FuZHN0b25lL3JvdWdoTWV0YWxsaWMuanBnXCIsXG5cdFwiLi9zYW5kc3RvbmUvc21vb3RoRGlhbGVjdHJpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvc2FuZHN0b25lL3Ntb290aERpYWxlY3RyaWMuanBnXCIsXG5cdFwiLi9zYW5kc3RvbmUvc21vb3RoTWV0YWxsaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3NhbmRzdG9uZS9zbW9vdGhNZXRhbGxpYy5qcGdcIixcblx0XCIuL3RhbmtmYXJtL3JvdWdoRGlhbGVjdHJpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvdGFua2Zhcm0vcm91Z2hEaWFsZWN0cmljLmpwZ1wiLFxuXHRcIi4vdGFua2Zhcm0vcm91Z2hNZXRhbGxpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvdGFua2Zhcm0vcm91Z2hNZXRhbGxpYy5qcGdcIixcblx0XCIuL3RhbmtmYXJtL3Ntb290aERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3RhbmtmYXJtL3Ntb290aERpYWxlY3RyaWMuanBnXCIsXG5cdFwiLi90YW5rZmFybS9zbW9vdGhNZXRhbGxpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvdGFua2Zhcm0vc21vb3RoTWV0YWxsaWMuanBnXCIsXG5cdFwiLi93aW50ZXIvcm91Z2hEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC93aW50ZXIvcm91Z2hEaWFsZWN0cmljLmpwZ1wiLFxuXHRcIi4vd2ludGVyL3JvdWdoTWV0YWxsaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3dpbnRlci9yb3VnaE1ldGFsbGljLmpwZ1wiLFxuXHRcIi4vd2ludGVyL3Ntb290aERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3dpbnRlci9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiLFxuXHRcIi4vd2ludGVyL3Ntb290aE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC93aW50ZXIvc21vb3RoTWV0YWxsaWMuanBnXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL21hdGNhcCBzeW5jIHJlY3Vyc2l2ZSAuKlxcXFwuanBnXCI7IiwidmFyIG1hcCA9IHtcblx0XCIuL2F1dHVtbi9yb3VnaERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL2F1dHVtbi9yb3VnaERpYWxlY3RyaWMuanBnXCIsXG5cdFwiLi9hdXR1bW4vcm91Z2hNZXRhbGxpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvYXV0dW1uL3JvdWdoTWV0YWxsaWMuanBnXCIsXG5cdFwiLi9hdXR1bW4vc21vb3RoRGlhbGVjdHJpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvYXV0dW1uL3Ntb290aERpYWxlY3RyaWMuanBnXCIsXG5cdFwiLi9hdXR1bW4vc21vb3RoTWV0YWxsaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL2F1dHVtbi9zbW9vdGhNZXRhbGxpYy5qcGdcIixcblx0XCIuL2RlZmF1bHQvcm91Z2hEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9kZWZhdWx0L3JvdWdoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL2RlZmF1bHQvcm91Z2hNZXRhbGxpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvZGVmYXVsdC9yb3VnaE1ldGFsbGljLmpwZ1wiLFxuXHRcIi4vZGVmYXVsdC9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9kZWZhdWx0L3Ntb290aERpYWxlY3RyaWMuanBnXCIsXG5cdFwiLi9kZWZhdWx0L3Ntb290aE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9kZWZhdWx0L3Ntb290aE1ldGFsbGljLmpwZ1wiLFxuXHRcIi4vaW50ZXJpb3Ivcm91Z2hEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9pbnRlcmlvci9yb3VnaERpYWxlY3RyaWMuanBnXCIsXG5cdFwiLi9pbnRlcmlvci9yb3VnaE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9pbnRlcmlvci9yb3VnaE1ldGFsbGljLmpwZ1wiLFxuXHRcIi4vaW50ZXJpb3Ivc21vb3RoRGlhbGVjdHJpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvaW50ZXJpb3Ivc21vb3RoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL2ludGVyaW9yL3Ntb290aE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9pbnRlcmlvci9zbW9vdGhNZXRhbGxpYy5qcGdcIixcblx0XCIuL25pZ2h0L3JvdWdoRGlhbGVjdHJpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvbmlnaHQvcm91Z2hEaWFsZWN0cmljLmpwZ1wiLFxuXHRcIi4vbmlnaHQvcm91Z2hNZXRhbGxpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvbmlnaHQvcm91Z2hNZXRhbGxpYy5qcGdcIixcblx0XCIuL25pZ2h0L3Ntb290aERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL25pZ2h0L3Ntb290aERpYWxlY3RyaWMuanBnXCIsXG5cdFwiLi9uaWdodC9zbW9vdGhNZXRhbGxpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvbmlnaHQvc21vb3RoTWV0YWxsaWMuanBnXCIsXG5cdFwiLi9zYW5kc3RvbmUvcm91Z2hEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9zYW5kc3RvbmUvcm91Z2hEaWFsZWN0cmljLmpwZ1wiLFxuXHRcIi4vc2FuZHN0b25lL3JvdWdoTWV0YWxsaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3NhbmRzdG9uZS9yb3VnaE1ldGFsbGljLmpwZ1wiLFxuXHRcIi4vc2FuZHN0b25lL3Ntb290aERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3NhbmRzdG9uZS9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiLFxuXHRcIi4vc2FuZHN0b25lL3Ntb290aE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC9zYW5kc3RvbmUvc21vb3RoTWV0YWxsaWMuanBnXCIsXG5cdFwiLi90YW5rZmFybS9yb3VnaERpYWxlY3RyaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3RhbmtmYXJtL3JvdWdoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL3RhbmtmYXJtL3JvdWdoTWV0YWxsaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3RhbmtmYXJtL3JvdWdoTWV0YWxsaWMuanBnXCIsXG5cdFwiLi90YW5rZmFybS9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC90YW5rZmFybS9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiLFxuXHRcIi4vdGFua2Zhcm0vc21vb3RoTWV0YWxsaWMuanBnXCI6IFwiLi9zcmMvbWF0Y2FwL3RhbmtmYXJtL3Ntb290aE1ldGFsbGljLmpwZ1wiLFxuXHRcIi4vd2ludGVyL3JvdWdoRGlhbGVjdHJpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvd2ludGVyL3JvdWdoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL3dpbnRlci9yb3VnaE1ldGFsbGljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC93aW50ZXIvcm91Z2hNZXRhbGxpYy5qcGdcIixcblx0XCIuL3dpbnRlci9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiOiBcIi4vc3JjL21hdGNhcC93aW50ZXIvc21vb3RoRGlhbGVjdHJpYy5qcGdcIixcblx0XCIuL3dpbnRlci9zbW9vdGhNZXRhbGxpYy5qcGdcIjogXCIuL3NyYy9tYXRjYXAvd2ludGVyL3Ntb290aE1ldGFsbGljLmpwZ1wiXG59O1xuXG5cbmZ1bmN0aW9uIHdlYnBhY2tDb250ZXh0KHJlcSkge1xuXHR2YXIgaWQgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKTtcblx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oaWQpO1xufVxuZnVuY3Rpb24gd2VicGFja0NvbnRleHRSZXNvbHZlKHJlcSkge1xuXHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKG1hcCwgcmVxKSkge1xuXHRcdHZhciBlID0gbmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIiArIHJlcSArIFwiJ1wiKTtcblx0XHRlLmNvZGUgPSAnTU9EVUxFX05PVF9GT1VORCc7XG5cdFx0dGhyb3cgZTtcblx0fVxuXHRyZXR1cm4gbWFwW3JlcV07XG59XG53ZWJwYWNrQ29udGV4dC5rZXlzID0gZnVuY3Rpb24gd2VicGFja0NvbnRleHRLZXlzKCkge1xuXHRyZXR1cm4gT2JqZWN0LmtleXMobWFwKTtcbn07XG53ZWJwYWNrQ29udGV4dC5yZXNvbHZlID0gd2VicGFja0NvbnRleHRSZXNvbHZlO1xubW9kdWxlLmV4cG9ydHMgPSB3ZWJwYWNrQ29udGV4dDtcbndlYnBhY2tDb250ZXh0LmlkID0gXCIuL3NyYy9tYXRjYXAgc3luYyByZWN1cnNpdmUgXlxcXFwuXFxcXC8uKlxcXFwvLiokXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvYXV0dW1uL3JvdWdoRGlhbGVjdHJpYy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9hdXR1bW4vcm91Z2hNZXRhbGxpYy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9hdXR1bW4vc21vb3RoRGlhbGVjdHJpYy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9hdXR1bW4vc21vb3RoTWV0YWxsaWMuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvZGVmYXVsdC9yb3VnaERpYWxlY3RyaWMuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvZGVmYXVsdC9yb3VnaE1ldGFsbGljLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L2RlZmF1bHQvc21vb3RoRGlhbGVjdHJpYy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9kZWZhdWx0L3Ntb290aE1ldGFsbGljLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L2ludGVyaW9yL3JvdWdoRGlhbGVjdHJpYy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9pbnRlcmlvci9yb3VnaE1ldGFsbGljLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L2ludGVyaW9yL3Ntb290aERpYWxlY3RyaWMuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvaW50ZXJpb3Ivc21vb3RoTWV0YWxsaWMuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvbmlnaHQvcm91Z2hEaWFsZWN0cmljLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L25pZ2h0L3JvdWdoTWV0YWxsaWMuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvbmlnaHQvc21vb3RoRGlhbGVjdHJpYy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9uaWdodC9zbW9vdGhNZXRhbGxpYy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9zYW5kc3RvbmUvcm91Z2hEaWFsZWN0cmljLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L3NhbmRzdG9uZS9yb3VnaE1ldGFsbGljLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L3NhbmRzdG9uZS9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L3NhbmRzdG9uZS9zbW9vdGhNZXRhbGxpYy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC90YW5rZmFybS9yb3VnaERpYWxlY3RyaWMuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvdGFua2Zhcm0vcm91Z2hNZXRhbGxpYy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC90YW5rZmFybS9zbW9vdGhEaWFsZWN0cmljLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L3RhbmtmYXJtL3Ntb290aE1ldGFsbGljLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L3dpbnRlci9yb3VnaERpYWxlY3RyaWMuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvd2ludGVyL3JvdWdoTWV0YWxsaWMuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvd2ludGVyL3Ntb290aERpYWxlY3RyaWMuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvd2ludGVyL3Ntb290aE1ldGFsbGljLmpwZ1wiOyIsInZhciBtYXAgPSB7XG5cdFwiLi9GYWJyaWMwMjZfMkstSlBHL0ZhYnJpYzAyNl8yS19Db2xvci5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvRmFicmljMDI2XzJLLUpQRy9GYWJyaWMwMjZfMktfQ29sb3IuanBnXCIsXG5cdFwiLi9GYWJyaWMwMjZfMkstSlBHL0ZhYnJpYzAyNl8yS19Ob3JtYWwuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL0ZhYnJpYzAyNl8ySy1KUEcvRmFicmljMDI2XzJLX05vcm1hbC5qcGdcIixcblx0XCIuL0ZhYnJpYzAyNl8ySy1KUEcvRmFicmljMDI2XzJLX1JvdWdobmVzcy5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvRmFicmljMDI2XzJLLUpQRy9GYWJyaWMwMjZfMktfUm91Z2huZXNzLmpwZ1wiLFxuXHRcIi4vTWV0YWwwMDlfMkstSlBHL01ldGFsMDA5XzJLX0NvbG9yLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9NZXRhbDAwOV8ySy1KUEcvTWV0YWwwMDlfMktfQ29sb3IuanBnXCIsXG5cdFwiLi9NZXRhbDAwOV8ySy1KUEcvTWV0YWwwMDlfMktfTWV0YWxuZXNzLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9NZXRhbDAwOV8ySy1KUEcvTWV0YWwwMDlfMktfTWV0YWxuZXNzLmpwZ1wiLFxuXHRcIi4vTWV0YWwwMDlfMkstSlBHL01ldGFsMDA5XzJLX05vcm1hbC5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvTWV0YWwwMDlfMkstSlBHL01ldGFsMDA5XzJLX05vcm1hbC5qcGdcIixcblx0XCIuL01ldGFsMDA5XzJLLUpQRy9NZXRhbDAwOV8yS19Sb3VnaG5lc3MuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL01ldGFsMDA5XzJLLUpQRy9NZXRhbDAwOV8yS19Sb3VnaG5lc3MuanBnXCIsXG5cdFwiLi9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfQ29sb3IuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL01ldGFsMDM1XzJLLUpQRy9NZXRhbDAzNV8yS19Db2xvci5qcGdcIixcblx0XCIuL01ldGFsMDM1XzJLLUpQRy9NZXRhbDAzNV8yS19NZXRhbG5lc3MuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL01ldGFsMDM1XzJLLUpQRy9NZXRhbDAzNV8yS19NZXRhbG5lc3MuanBnXCIsXG5cdFwiLi9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfTm9ybWFsLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfTm9ybWFsLmpwZ1wiLFxuXHRcIi4vTWV0YWwwMzVfMkstSlBHL01ldGFsMDM1XzJLX1JvdWdobmVzcy5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvTWV0YWwwMzVfMkstSlBHL01ldGFsMDM1XzJLX1JvdWdobmVzcy5qcGdcIixcblx0XCIuL1BsYXN0aWNfMkstSlBHL1BsYXN0aWNfYmFzZWNvbG9yLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9QbGFzdGljXzJLLUpQRy9QbGFzdGljX2Jhc2Vjb2xvci5qcGdcIixcblx0XCIuL1BsYXN0aWNfMkstSlBHL1BsYXN0aWNfbm9ybWFsLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9QbGFzdGljXzJLLUpQRy9QbGFzdGljX25vcm1hbC5qcGdcIixcblx0XCIuL1BsYXN0aWNfMkstSlBHL1BsYXN0aWNfcm91Z2huZXNzLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9QbGFzdGljXzJLLUpQRy9QbGFzdGljX3JvdWdobmVzcy5qcGdcIixcblx0XCIuL1Nub3cwMDNfMkstSlBHL1Nub3cwMDNfMktfQ29sb3IuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDNfMkstSlBHL1Nub3cwMDNfMktfQ29sb3IuanBnXCIsXG5cdFwiLi9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX0Rpc3BsYWNlbWVudC5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvU25vdzAwM18ySy1KUEcvU25vdzAwM18yS19EaXNwbGFjZW1lbnQuanBnXCIsXG5cdFwiLi9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX05vcm1hbC5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvU25vdzAwM18ySy1KUEcvU25vdzAwM18yS19Ob3JtYWwuanBnXCIsXG5cdFwiLi9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX1JvdWdobmVzcy5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvU25vdzAwM18ySy1KUEcvU25vdzAwM18yS19Sb3VnaG5lc3MuanBnXCIsXG5cdFwiLi9Tbm93MDA0XzJLLUpQRy9Tbm93MDA0XzJLX0NvbG9yLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9Tbm93MDA0XzJLLUpQRy9Tbm93MDA0XzJLX0NvbG9yLmpwZ1wiLFxuXHRcIi4vU25vdzAwNF8ySy1KUEcvU25vdzAwNF8yS19EaXNwbGFjZW1lbnQuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfRGlzcGxhY2VtZW50LmpwZ1wiLFxuXHRcIi4vU25vdzAwNF8ySy1KUEcvU25vdzAwNF8yS19Ob3JtYWwuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfTm9ybWFsLmpwZ1wiLFxuXHRcIi4vU25vdzAwNF8ySy1KUEcvU25vdzAwNF8yS19Sb3VnaG5lc3MuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfUm91Z2huZXNzLmpwZ1wiLFxuXHRcIi4vV29vZDAyN18ySy1KUEcvV29vZDAyN18yS19Db2xvci5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvV29vZDAyN18ySy1KUEcvV29vZDAyN18yS19Db2xvci5qcGdcIixcblx0XCIuL1dvb2QwMjdfMkstSlBHL1dvb2QwMjdfMktfTm9ybWFsLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9Xb29kMDI3XzJLLUpQRy9Xb29kMDI3XzJLX05vcm1hbC5qcGdcIixcblx0XCIuL1dvb2QwMjdfMkstSlBHL1dvb2QwMjdfMktfUm91Z2huZXNzLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9Xb29kMDI3XzJLLUpQRy9Xb29kMDI3XzJLX1JvdWdobmVzcy5qcGdcIixcblx0XCIuL1dvb2RGbG9vcjA0MV8ySy1KUEcvV29vZEZsb29yMDQxXzJLX0FtYmllbnRPY2NsdXNpb24uanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1dvb2RGbG9vcjA0MV8ySy1KUEcvV29vZEZsb29yMDQxXzJLX0FtYmllbnRPY2NsdXNpb24uanBnXCIsXG5cdFwiLi9Xb29kRmxvb3IwNDFfMkstSlBHL1dvb2RGbG9vcjA0MV8yS19Db2xvci5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvV29vZEZsb29yMDQxXzJLLUpQRy9Xb29kRmxvb3IwNDFfMktfQ29sb3IuanBnXCIsXG5cdFwiLi9Xb29kRmxvb3IwNDFfMkstSlBHL1dvb2RGbG9vcjA0MV8yS19Ob3JtYWwuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1dvb2RGbG9vcjA0MV8ySy1KUEcvV29vZEZsb29yMDQxXzJLX05vcm1hbC5qcGdcIixcblx0XCIuL1dvb2RGbG9vcjA0MV8ySy1KUEcvV29vZEZsb29yMDQxXzJLX1JvdWdobmVzcy5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvV29vZEZsb29yMDQxXzJLLUpQRy9Xb29kRmxvb3IwNDFfMktfUm91Z2huZXNzLmpwZ1wiLFxuXHRcIi4vYWVyaWFsX2dyYXNzX3JvY2tfMmtfanBnL2FlcmlhbF9ncmFzc19yb2NrX2FvXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfYW9fMmsuanBnXCIsXG5cdFwiLi9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfZGlmZl8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvYWVyaWFsX2dyYXNzX3JvY2tfMmtfanBnL2FlcmlhbF9ncmFzc19yb2NrX2RpZmZfMmsuanBnXCIsXG5cdFwiLi9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfbm9yXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfbm9yXzJrLmpwZ1wiLFxuXHRcIi4vYWVyaWFsX2dyYXNzX3JvY2tfMmtfanBnL2FlcmlhbF9ncmFzc19yb2NrX3JvdWdoXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfcm91Z2hfMmsuanBnXCIsXG5cdFwiLi9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2FvXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2FvXzJrLmpwZ1wiLFxuXHRcIi4vYmFya19icm93bl8wMl8ya19qcGcvYmFya19icm93bl8wMl9kaWZmXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2RpZmZfMmsuanBnXCIsXG5cdFwiLi9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2Rpc3BfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfZGlzcF8yay5qcGdcIixcblx0XCIuL2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfbm9yXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX25vcl8yay5qcGdcIixcblx0XCIuL2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfcm91Z2hfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfcm91Z2hfMmsuanBnXCIsXG5cdFwiLi9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9hb18yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvYnJvd25fcGxhbmtzXzA0XzJrX2pwZy9icm93bl9wbGFua3NfMDRfYW9fMmsuanBnXCIsXG5cdFwiLi9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9kaWZmXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9kaWZmXzJrLmpwZ1wiLFxuXHRcIi4vYnJvd25fcGxhbmtzXzA0XzJrX2pwZy9icm93bl9wbGFua3NfMDRfbm9yXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9ub3JfMmsuanBnXCIsXG5cdFwiLi9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9yb3VnaF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvYnJvd25fcGxhbmtzXzA0XzJrX2pwZy9icm93bl9wbGFua3NfMDRfcm91Z2hfMmsuanBnXCIsXG5cdFwiLi9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfQU9fMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19BT18yay5qcGdcIixcblx0XCIuL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19kaWZmXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfZGlmZl8yay5qcGdcIixcblx0XCIuL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19ub3JfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19ub3JfMmsuanBnXCIsXG5cdFwiLi9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfcm91Z2hfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19yb3VnaF8yay5qcGdcIixcblx0XCIuL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfYW9fMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfYW9fMmsuanBnXCIsXG5cdFwiLi9tb3NzeV9yb2NrXzJrX2pwZy9tb3NzeV9yb2NrX2RpZmZfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfZGlmZl8yay5qcGdcIixcblx0XCIuL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfZGlzcF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19kaXNwXzJrLmpwZ1wiLFxuXHRcIi4vbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19ub3JfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfbm9yXzJrLmpwZ1wiLFxuXHRcIi4vbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19yb3VnaF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19yb3VnaF8yay5qcGdcIixcblx0XCIuL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfYW9fMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfYW9fMmsuanBnXCIsXG5cdFwiLi9yb2NrXzA1XzJrX2pwZy9yb2NrXzA1X2RpZmZfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfZGlmZl8yay5qcGdcIixcblx0XCIuL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfZGlzcF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvcm9ja18wNV8ya19qcGcvcm9ja18wNV9kaXNwXzJrLmpwZ1wiLFxuXHRcIi4vcm9ja18wNV8ya19qcGcvcm9ja18wNV9ub3JfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfbm9yXzJrLmpwZ1wiLFxuXHRcIi4vcm9ja18wNV8ya19qcGcvcm9ja18wNV9yb3VnaF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvcm9ja18wNV8ya19qcGcvcm9ja18wNV9yb3VnaF8yay5qcGdcIixcblx0XCIuL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3NfQU9fMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3NfQU9fMmsuanBnXCIsXG5cdFwiLi9zYW5kc3RvbmVfY3JhY2tzXzJrX2pwZy9zYW5kc3RvbmVfY3JhY2tzX2RpZmZfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3NfZGlmZl8yay5qcGdcIixcblx0XCIuL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3Nfbm9yXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9zYW5kc3RvbmVfY3JhY2tzXzJrX2pwZy9zYW5kc3RvbmVfY3JhY2tzX25vcl8yay5qcGdcIixcblx0XCIuL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3Nfcm91Z2hfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3Nfcm91Z2hfMmsuanBnXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL21hdGVyaWFscyBzeW5jIHJlY3Vyc2l2ZSAuKlwiOyIsInZhciBtYXAgPSB7XG5cdFwiLi9GYWJyaWMwMjZfMkstSlBHL0ZhYnJpYzAyNl8yS19Db2xvci5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvRmFicmljMDI2XzJLLUpQRy9GYWJyaWMwMjZfMktfQ29sb3IuanBnXCIsXG5cdFwiLi9GYWJyaWMwMjZfMkstSlBHL0ZhYnJpYzAyNl8yS19Ob3JtYWwuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL0ZhYnJpYzAyNl8ySy1KUEcvRmFicmljMDI2XzJLX05vcm1hbC5qcGdcIixcblx0XCIuL0ZhYnJpYzAyNl8ySy1KUEcvRmFicmljMDI2XzJLX1JvdWdobmVzcy5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvRmFicmljMDI2XzJLLUpQRy9GYWJyaWMwMjZfMktfUm91Z2huZXNzLmpwZ1wiLFxuXHRcIi4vTWV0YWwwMDlfMkstSlBHL01ldGFsMDA5XzJLX0NvbG9yLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9NZXRhbDAwOV8ySy1KUEcvTWV0YWwwMDlfMktfQ29sb3IuanBnXCIsXG5cdFwiLi9NZXRhbDAwOV8ySy1KUEcvTWV0YWwwMDlfMktfTWV0YWxuZXNzLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9NZXRhbDAwOV8ySy1KUEcvTWV0YWwwMDlfMktfTWV0YWxuZXNzLmpwZ1wiLFxuXHRcIi4vTWV0YWwwMDlfMkstSlBHL01ldGFsMDA5XzJLX05vcm1hbC5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvTWV0YWwwMDlfMkstSlBHL01ldGFsMDA5XzJLX05vcm1hbC5qcGdcIixcblx0XCIuL01ldGFsMDA5XzJLLUpQRy9NZXRhbDAwOV8yS19Sb3VnaG5lc3MuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL01ldGFsMDA5XzJLLUpQRy9NZXRhbDAwOV8yS19Sb3VnaG5lc3MuanBnXCIsXG5cdFwiLi9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfQ29sb3IuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL01ldGFsMDM1XzJLLUpQRy9NZXRhbDAzNV8yS19Db2xvci5qcGdcIixcblx0XCIuL01ldGFsMDM1XzJLLUpQRy9NZXRhbDAzNV8yS19NZXRhbG5lc3MuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL01ldGFsMDM1XzJLLUpQRy9NZXRhbDAzNV8yS19NZXRhbG5lc3MuanBnXCIsXG5cdFwiLi9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfTm9ybWFsLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfTm9ybWFsLmpwZ1wiLFxuXHRcIi4vTWV0YWwwMzVfMkstSlBHL01ldGFsMDM1XzJLX1JvdWdobmVzcy5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvTWV0YWwwMzVfMkstSlBHL01ldGFsMDM1XzJLX1JvdWdobmVzcy5qcGdcIixcblx0XCIuL1BsYXN0aWNfMkstSlBHL1BsYXN0aWNfYmFzZWNvbG9yLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9QbGFzdGljXzJLLUpQRy9QbGFzdGljX2Jhc2Vjb2xvci5qcGdcIixcblx0XCIuL1BsYXN0aWNfMkstSlBHL1BsYXN0aWNfbm9ybWFsLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9QbGFzdGljXzJLLUpQRy9QbGFzdGljX25vcm1hbC5qcGdcIixcblx0XCIuL1BsYXN0aWNfMkstSlBHL1BsYXN0aWNfcm91Z2huZXNzLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9QbGFzdGljXzJLLUpQRy9QbGFzdGljX3JvdWdobmVzcy5qcGdcIixcblx0XCIuL1Nub3cwMDNfMkstSlBHL1Nub3cwMDNfMktfQ29sb3IuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDNfMkstSlBHL1Nub3cwMDNfMktfQ29sb3IuanBnXCIsXG5cdFwiLi9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX0Rpc3BsYWNlbWVudC5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvU25vdzAwM18ySy1KUEcvU25vdzAwM18yS19EaXNwbGFjZW1lbnQuanBnXCIsXG5cdFwiLi9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX05vcm1hbC5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvU25vdzAwM18ySy1KUEcvU25vdzAwM18yS19Ob3JtYWwuanBnXCIsXG5cdFwiLi9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX1JvdWdobmVzcy5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvU25vdzAwM18ySy1KUEcvU25vdzAwM18yS19Sb3VnaG5lc3MuanBnXCIsXG5cdFwiLi9Tbm93MDA0XzJLLUpQRy9Tbm93MDA0XzJLX0NvbG9yLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9Tbm93MDA0XzJLLUpQRy9Tbm93MDA0XzJLX0NvbG9yLmpwZ1wiLFxuXHRcIi4vU25vdzAwNF8ySy1KUEcvU25vdzAwNF8yS19EaXNwbGFjZW1lbnQuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfRGlzcGxhY2VtZW50LmpwZ1wiLFxuXHRcIi4vU25vdzAwNF8ySy1KUEcvU25vdzAwNF8yS19Ob3JtYWwuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfTm9ybWFsLmpwZ1wiLFxuXHRcIi4vU25vdzAwNF8ySy1KUEcvU25vdzAwNF8yS19Sb3VnaG5lc3MuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfUm91Z2huZXNzLmpwZ1wiLFxuXHRcIi4vV29vZDAyN18ySy1KUEcvV29vZDAyN18yS19Db2xvci5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvV29vZDAyN18ySy1KUEcvV29vZDAyN18yS19Db2xvci5qcGdcIixcblx0XCIuL1dvb2QwMjdfMkstSlBHL1dvb2QwMjdfMktfTm9ybWFsLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9Xb29kMDI3XzJLLUpQRy9Xb29kMDI3XzJLX05vcm1hbC5qcGdcIixcblx0XCIuL1dvb2QwMjdfMkstSlBHL1dvb2QwMjdfMktfUm91Z2huZXNzLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9Xb29kMDI3XzJLLUpQRy9Xb29kMDI3XzJLX1JvdWdobmVzcy5qcGdcIixcblx0XCIuL1dvb2RGbG9vcjA0MV8ySy1KUEcvV29vZEZsb29yMDQxXzJLX0FtYmllbnRPY2NsdXNpb24uanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1dvb2RGbG9vcjA0MV8ySy1KUEcvV29vZEZsb29yMDQxXzJLX0FtYmllbnRPY2NsdXNpb24uanBnXCIsXG5cdFwiLi9Xb29kRmxvb3IwNDFfMkstSlBHL1dvb2RGbG9vcjA0MV8yS19Db2xvci5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvV29vZEZsb29yMDQxXzJLLUpQRy9Xb29kRmxvb3IwNDFfMktfQ29sb3IuanBnXCIsXG5cdFwiLi9Xb29kRmxvb3IwNDFfMkstSlBHL1dvb2RGbG9vcjA0MV8yS19Ob3JtYWwuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL1dvb2RGbG9vcjA0MV8ySy1KUEcvV29vZEZsb29yMDQxXzJLX05vcm1hbC5qcGdcIixcblx0XCIuL1dvb2RGbG9vcjA0MV8ySy1KUEcvV29vZEZsb29yMDQxXzJLX1JvdWdobmVzcy5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvV29vZEZsb29yMDQxXzJLLUpQRy9Xb29kRmxvb3IwNDFfMktfUm91Z2huZXNzLmpwZ1wiLFxuXHRcIi4vYWVyaWFsX2dyYXNzX3JvY2tfMmtfanBnL2FlcmlhbF9ncmFzc19yb2NrX2FvXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfYW9fMmsuanBnXCIsXG5cdFwiLi9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfZGlmZl8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvYWVyaWFsX2dyYXNzX3JvY2tfMmtfanBnL2FlcmlhbF9ncmFzc19yb2NrX2RpZmZfMmsuanBnXCIsXG5cdFwiLi9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfbm9yXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfbm9yXzJrLmpwZ1wiLFxuXHRcIi4vYWVyaWFsX2dyYXNzX3JvY2tfMmtfanBnL2FlcmlhbF9ncmFzc19yb2NrX3JvdWdoXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfcm91Z2hfMmsuanBnXCIsXG5cdFwiLi9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2FvXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2FvXzJrLmpwZ1wiLFxuXHRcIi4vYmFya19icm93bl8wMl8ya19qcGcvYmFya19icm93bl8wMl9kaWZmXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2RpZmZfMmsuanBnXCIsXG5cdFwiLi9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2Rpc3BfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfZGlzcF8yay5qcGdcIixcblx0XCIuL2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfbm9yXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX25vcl8yay5qcGdcIixcblx0XCIuL2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfcm91Z2hfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfcm91Z2hfMmsuanBnXCIsXG5cdFwiLi9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9hb18yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvYnJvd25fcGxhbmtzXzA0XzJrX2pwZy9icm93bl9wbGFua3NfMDRfYW9fMmsuanBnXCIsXG5cdFwiLi9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9kaWZmXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9kaWZmXzJrLmpwZ1wiLFxuXHRcIi4vYnJvd25fcGxhbmtzXzA0XzJrX2pwZy9icm93bl9wbGFua3NfMDRfbm9yXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9ub3JfMmsuanBnXCIsXG5cdFwiLi9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9yb3VnaF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvYnJvd25fcGxhbmtzXzA0XzJrX2pwZy9icm93bl9wbGFua3NfMDRfcm91Z2hfMmsuanBnXCIsXG5cdFwiLi9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfQU9fMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19BT18yay5qcGdcIixcblx0XCIuL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19kaWZmXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfZGlmZl8yay5qcGdcIixcblx0XCIuL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19ub3JfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19ub3JfMmsuanBnXCIsXG5cdFwiLi9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfcm91Z2hfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL2ZvcnJlc3RfZ3JvdW5kXzAzXzJrX2pwZy9mb3JyZXN0X2dyb3VuZF8wM19yb3VnaF8yay5qcGdcIixcblx0XCIuL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfYW9fMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfYW9fMmsuanBnXCIsXG5cdFwiLi9tb3NzeV9yb2NrXzJrX2pwZy9tb3NzeV9yb2NrX2RpZmZfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfZGlmZl8yay5qcGdcIixcblx0XCIuL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfZGlzcF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19kaXNwXzJrLmpwZ1wiLFxuXHRcIi4vbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19ub3JfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfbm9yXzJrLmpwZ1wiLFxuXHRcIi4vbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19yb3VnaF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19yb3VnaF8yay5qcGdcIixcblx0XCIuL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfYW9fMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfYW9fMmsuanBnXCIsXG5cdFwiLi9yb2NrXzA1XzJrX2pwZy9yb2NrXzA1X2RpZmZfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfZGlmZl8yay5qcGdcIixcblx0XCIuL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfZGlzcF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvcm9ja18wNV8ya19qcGcvcm9ja18wNV9kaXNwXzJrLmpwZ1wiLFxuXHRcIi4vcm9ja18wNV8ya19qcGcvcm9ja18wNV9ub3JfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfbm9yXzJrLmpwZ1wiLFxuXHRcIi4vcm9ja18wNV8ya19qcGcvcm9ja18wNV9yb3VnaF8yay5qcGdcIjogXCIuL3NyYy9tYXRlcmlhbHMvcm9ja18wNV8ya19qcGcvcm9ja18wNV9yb3VnaF8yay5qcGdcIixcblx0XCIuL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3NfQU9fMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3NfQU9fMmsuanBnXCIsXG5cdFwiLi9zYW5kc3RvbmVfY3JhY2tzXzJrX2pwZy9zYW5kc3RvbmVfY3JhY2tzX2RpZmZfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3NfZGlmZl8yay5qcGdcIixcblx0XCIuL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3Nfbm9yXzJrLmpwZ1wiOiBcIi4vc3JjL21hdGVyaWFscy9zYW5kc3RvbmVfY3JhY2tzXzJrX2pwZy9zYW5kc3RvbmVfY3JhY2tzX25vcl8yay5qcGdcIixcblx0XCIuL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3Nfcm91Z2hfMmsuanBnXCI6IFwiLi9zcmMvbWF0ZXJpYWxzL3NhbmRzdG9uZV9jcmFja3NfMmtfanBnL3NhbmRzdG9uZV9jcmFja3Nfcm91Z2hfMmsuanBnXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL21hdGVyaWFscyBzeW5jIHJlY3Vyc2l2ZSBeXFxcXC5cXFxcLy4qXFxcXC8uKiRcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9GYWJyaWMwMjZfMkstSlBHL0ZhYnJpYzAyNl8yS19Db2xvci5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9GYWJyaWMwMjZfMkstSlBHL0ZhYnJpYzAyNl8yS19Ob3JtYWwuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvRmFicmljMDI2XzJLLUpQRy9GYWJyaWMwMjZfMktfUm91Z2huZXNzLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L01ldGFsMDA5XzJLLUpQRy9NZXRhbDAwOV8yS19Db2xvci5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9NZXRhbDAwOV8ySy1KUEcvTWV0YWwwMDlfMktfTWV0YWxuZXNzLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L01ldGFsMDA5XzJLLUpQRy9NZXRhbDAwOV8yS19Ob3JtYWwuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvTWV0YWwwMDlfMkstSlBHL01ldGFsMDA5XzJLX1JvdWdobmVzcy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfQ29sb3IuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvTWV0YWwwMzVfMkstSlBHL01ldGFsMDM1XzJLX01ldGFsbmVzcy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9NZXRhbDAzNV8ySy1KUEcvTWV0YWwwMzVfMktfTm9ybWFsLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L01ldGFsMDM1XzJLLUpQRy9NZXRhbDAzNV8yS19Sb3VnaG5lc3MuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvUGxhc3RpY18ySy1KUEcvUGxhc3RpY19iYXNlY29sb3IuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvUGxhc3RpY18ySy1KUEcvUGxhc3RpY19ub3JtYWwuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvUGxhc3RpY18ySy1KUEcvUGxhc3RpY19yb3VnaG5lc3MuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvU25vdzAwM18ySy1KUEcvU25vdzAwM18yS19Db2xvci5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX0Rpc3BsYWNlbWVudC5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX05vcm1hbC5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9Tbm93MDAzXzJLLUpQRy9Tbm93MDAzXzJLX1JvdWdobmVzcy5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9Tbm93MDA0XzJLLUpQRy9Tbm93MDA0XzJLX0NvbG9yLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfRGlzcGxhY2VtZW50LmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfTm9ybWFsLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L1Nub3cwMDRfMkstSlBHL1Nub3cwMDRfMktfUm91Z2huZXNzLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L1dvb2QwMjdfMkstSlBHL1dvb2QwMjdfMktfQ29sb3IuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvV29vZDAyN18ySy1KUEcvV29vZDAyN18yS19Ob3JtYWwuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvV29vZDAyN18ySy1KUEcvV29vZDAyN18yS19Sb3VnaG5lc3MuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvV29vZEZsb29yMDQxXzJLLUpQRy9Xb29kRmxvb3IwNDFfMktfQW1iaWVudE9jY2x1c2lvbi5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9Xb29kRmxvb3IwNDFfMkstSlBHL1dvb2RGbG9vcjA0MV8yS19Db2xvci5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9Xb29kRmxvb3IwNDFfMkstSlBHL1dvb2RGbG9vcjA0MV8yS19Ob3JtYWwuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvV29vZEZsb29yMDQxXzJLLUpQRy9Xb29kRmxvb3IwNDFfMktfUm91Z2huZXNzLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L2FlcmlhbF9ncmFzc19yb2NrXzJrX2pwZy9hZXJpYWxfZ3Jhc3Nfcm9ja19hb18yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfZGlmZl8yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9hZXJpYWxfZ3Jhc3Nfcm9ja18ya19qcGcvYWVyaWFsX2dyYXNzX3JvY2tfbm9yXzJrLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L2FlcmlhbF9ncmFzc19yb2NrXzJrX2pwZy9hZXJpYWxfZ3Jhc3Nfcm9ja19yb3VnaF8yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2FvXzJrLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L2JhcmtfYnJvd25fMDJfMmtfanBnL2JhcmtfYnJvd25fMDJfZGlmZl8yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9iYXJrX2Jyb3duXzAyXzJrX2pwZy9iYXJrX2Jyb3duXzAyX2Rpc3BfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvYmFya19icm93bl8wMl8ya19qcGcvYmFya19icm93bl8wMl9ub3JfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvYmFya19icm93bl8wMl8ya19qcGcvYmFya19icm93bl8wMl9yb3VnaF8yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9hb18yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9kaWZmXzJrLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L2Jyb3duX3BsYW5rc18wNF8ya19qcGcvYnJvd25fcGxhbmtzXzA0X25vcl8yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9icm93bl9wbGFua3NfMDRfMmtfanBnL2Jyb3duX3BsYW5rc18wNF9yb3VnaF8yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfQU9fMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvZm9ycmVzdF9ncm91bmRfMDNfMmtfanBnL2ZvcnJlc3RfZ3JvdW5kXzAzX2RpZmZfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvZm9ycmVzdF9ncm91bmRfMDNfMmtfanBnL2ZvcnJlc3RfZ3JvdW5kXzAzX25vcl8yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9mb3JyZXN0X2dyb3VuZF8wM18ya19qcGcvZm9ycmVzdF9ncm91bmRfMDNfcm91Z2hfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19hb18yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9tb3NzeV9yb2NrXzJrX2pwZy9tb3NzeV9yb2NrX2RpZmZfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvbW9zc3lfcm9ja18ya19qcGcvbW9zc3lfcm9ja19kaXNwXzJrLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfbm9yXzJrLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L21vc3N5X3JvY2tfMmtfanBnL21vc3N5X3JvY2tfcm91Z2hfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvcm9ja18wNV8ya19qcGcvcm9ja18wNV9hb18yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9yb2NrXzA1XzJrX2pwZy9yb2NrXzA1X2RpZmZfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvcm9ja18wNV8ya19qcGcvcm9ja18wNV9kaXNwXzJrLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfbm9yXzJrLmpwZ1wiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L3JvY2tfMDVfMmtfanBnL3JvY2tfMDVfcm91Z2hfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvc2FuZHN0b25lX2NyYWNrc18ya19qcGcvc2FuZHN0b25lX2NyYWNrc19BT18yay5qcGdcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9zYW5kc3RvbmVfY3JhY2tzXzJrX2pwZy9zYW5kc3RvbmVfY3JhY2tzX2RpZmZfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvc2FuZHN0b25lX2NyYWNrc18ya19qcGcvc2FuZHN0b25lX2NyYWNrc19ub3JfMmsuanBnXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvc2FuZHN0b25lX2NyYWNrc18ya19qcGcvc2FuZHN0b25lX2NyYWNrc19yb3VnaF8yay5qcGdcIjsiLCJ2YXIgbWFwID0ge1xuXHRcIi4vY29sdW1uLmdsYlwiOiBcIi4vc3JjL21vZGVscy9jb2x1bW4uZ2xiXCIsXG5cdFwiLi9waWxsYXIuZ2xiXCI6IFwiLi9zcmMvbW9kZWxzL3BpbGxhci5nbGJcIixcblx0XCIuL3JvY2suZ2xiXCI6IFwiLi9zcmMvbW9kZWxzL3JvY2suZ2xiXCIsXG5cdFwiLi9zdG9uZS5nbGJcIjogXCIuL3NyYy9tb2RlbHMvc3RvbmUuZ2xiXCJcbn07XG5cblxuZnVuY3Rpb24gd2VicGFja0NvbnRleHQocmVxKSB7XG5cdHZhciBpZCA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpO1xuXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhpZCk7XG59XG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dFJlc29sdmUocmVxKSB7XG5cdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8obWFwLCByZXEpKSB7XG5cdFx0dmFyIGUgPSBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiICsgcmVxICsgXCInXCIpO1xuXHRcdGUuY29kZSA9ICdNT0RVTEVfTk9UX0ZPVU5EJztcblx0XHR0aHJvdyBlO1xuXHR9XG5cdHJldHVybiBtYXBbcmVxXTtcbn1cbndlYnBhY2tDb250ZXh0LmtleXMgPSBmdW5jdGlvbiB3ZWJwYWNrQ29udGV4dEtleXMoKSB7XG5cdHJldHVybiBPYmplY3Qua2V5cyhtYXApO1xufTtcbndlYnBhY2tDb250ZXh0LnJlc29sdmUgPSB3ZWJwYWNrQ29udGV4dFJlc29sdmU7XG5tb2R1bGUuZXhwb3J0cyA9IHdlYnBhY2tDb250ZXh0O1xud2VicGFja0NvbnRleHQuaWQgPSBcIi4vc3JjL21vZGVscyBzeW5jIHJlY3Vyc2l2ZSAuKlwiOyIsInZhciBtYXAgPSB7XG5cdFwiLi9jb2x1bW4uZ2xiXCI6IFwiLi9zcmMvbW9kZWxzL2NvbHVtbi5nbGJcIixcblx0XCIuL3BpbGxhci5nbGJcIjogXCIuL3NyYy9tb2RlbHMvcGlsbGFyLmdsYlwiLFxuXHRcIi4vcm9jay5nbGJcIjogXCIuL3NyYy9tb2RlbHMvcm9jay5nbGJcIixcblx0XCIuL3N0b25lLmdsYlwiOiBcIi4vc3JjL21vZGVscy9zdG9uZS5nbGJcIlxufTtcblxuXG5mdW5jdGlvbiB3ZWJwYWNrQ29udGV4dChyZXEpIHtcblx0dmFyIGlkID0gd2VicGFja0NvbnRleHRSZXNvbHZlKHJlcSk7XG5cdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKGlkKTtcbn1cbmZ1bmN0aW9uIHdlYnBhY2tDb250ZXh0UmVzb2x2ZShyZXEpIHtcblx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhtYXAsIHJlcSkpIHtcblx0XHR2YXIgZSA9IG5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIgKyByZXEgKyBcIidcIik7XG5cdFx0ZS5jb2RlID0gJ01PRFVMRV9OT1RfRk9VTkQnO1xuXHRcdHRocm93IGU7XG5cdH1cblx0cmV0dXJuIG1hcFtyZXFdO1xufVxud2VicGFja0NvbnRleHQua2V5cyA9IGZ1bmN0aW9uIHdlYnBhY2tDb250ZXh0S2V5cygpIHtcblx0cmV0dXJuIE9iamVjdC5rZXlzKG1hcCk7XG59O1xud2VicGFja0NvbnRleHQucmVzb2x2ZSA9IHdlYnBhY2tDb250ZXh0UmVzb2x2ZTtcbm1vZHVsZS5leHBvcnRzID0gd2VicGFja0NvbnRleHQ7XG53ZWJwYWNrQ29udGV4dC5pZCA9IFwiLi9zcmMvbW9kZWxzIHN5bmMgcmVjdXJzaXZlIF5cXFxcLlxcXFwvLiokXCI7IiwibW9kdWxlLmV4cG9ydHMgPSBfX3dlYnBhY2tfcHVibGljX3BhdGhfXyArIFwiYXNzZXQvbW9kZWxzL2NvbHVtbi5nbGJcIjsiLCJtb2R1bGUuZXhwb3J0cyA9IF9fd2VicGFja19wdWJsaWNfcGF0aF9fICsgXCJhc3NldC9tb2RlbHMvcGlsbGFyLmdsYlwiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L21vZGVscy9yb2NrLmdsYlwiOyIsIm1vZHVsZS5leHBvcnRzID0gX193ZWJwYWNrX3B1YmxpY19wYXRoX18gKyBcImFzc2V0L21vZGVscy9zdG9uZS5nbGJcIjsiLCJjb25zdCBNQVRDQVBTID0ge31cclxuXHJcbmZvciAobGV0IGZpbGVOYW1lIG9mIHJlcXVpcmUuY29udGV4dCgnLi9tYXRjYXAvJywgdHJ1ZSwgLy4qXFwuanBnLykua2V5cygpKSB7XHJcbiAgbGV0IFtkb3QsIGZvbGRlciwgZmlsZV0gPSBmaWxlTmFtZS5zcGxpdCgnLycpXHJcbiAgLy8gbGV0IG5hbWUgPSBmb2xkZXIubWF0Y2goLyguKj8pWy1fXVxcZCtrL2kpWzFdXHJcbiAgbmFtZSA9IGZvbGRlcjtcclxuICBpZiAoIShuYW1lIGluIE1BVENBUFMpKVxyXG4gIHtcclxuICAgIE1BVENBUFNbbmFtZV0gPSB7fVxyXG4gIH1cclxuICBsZXQgbWF0Y2FwID0gZmlsZS5tYXRjaCgvKC4qPylcXC5qcGcvKVsxXTtcclxuICBNQVRDQVBTW25hbWVdW21hdGNhcF0gPSByZXF1aXJlKGAuL21hdGNhcC8ke2ZvbGRlcn0vJHtmaWxlfWApXHJcbn1cclxuXHJcbmNvbnN0IE1BVENBUF9URVhUVVJFUyA9IFtcInJvdWdoRGlhbGVjdHJpY1wiLCBcInNtb290aERpYWxlY3RyaWNcIiwgXCJyb3VnaE1ldGFsbGljXCIsIFwic21vb3RoTWV0YWxsaWNcIl07XHJcblxyXG5BRlJBTUUucmVnaXN0ZXJTaGFkZXIoJ3BibWF0Y2FwJywge1xyXG4gIHNjaGVtYToge1xyXG4gICAgY29sb3I6IHt0eXBlOiAnY29sb3InLCBpczogJ3VuaWZvcm0nfSxcclxuICAgIG9wYWNpdHk6IHt0eXBlOiAnbnVtYmVyJywgaXM6ICd1bmlmb3JtJywgZGVmYXVsdDogMS4wfSxcclxuICAgIHNyYzoge3R5cGU6ICdtYXAnLCBpczogJ3VuaWZvcm0nfSxcclxuICAgIG1ldGFsbmVzc01hcDoge3R5cGU6ICdtYXAnLCBpczogJ3VuaWZvcm0nfSxcclxuICAgIHJvdWdobmVzc01hcDoge3R5cGU6ICdtYXAnLCBpczogJ3VuaWZvcm0nfSxcclxuICAgIG5vcm1hbE1hcDoge3R5cGU6ICdtYXAnLCBpczogJ3VuaWZvcm0nfSxcclxuICAgIG5vcm1hbFNjYWxlOiB7dHlwZTogJ3ZlYzInLCBpczogJ3VuaWZvcm0nLCBkZWZhdWx0OiBuZXcgVEhSRUUuVmVjdG9yMigxLjAsIDEuMCl9LFxyXG4gICAgYW1iaWVudE9jY2x1c2lvbk1hcDoge3R5cGU6ICdtYXAnLCBpczogJ3VuaWZvcm0nfSxcclxuICAgIGRpc3BsYWNlbWVudE1hcDoge3R5cGU6ICdtYXAnLCBpczogJ3VuaWZvcm0nfSxcclxuICAgIGRpc3BsYWNlbWVudFNjYWxlOiB7dHlwZTogJ251bWJlcicsIGlzOiAndW5pZm9ybScsIGRlZmF1bHQ6IDEuMH0sXHJcbiAgICBkaXNwbGFjZW1lbnRCaWFzOiB7dHlwZTogJ251bWJlcicsIGlzOiAndW5pZm9ybScsIGRlZmF1bHQ6IDAuNX0sXHJcblxyXG4gICAgbWV0YWxuZXNzOiB7dHlwZTogJ251bWJlcicsIGlzOiAndW5pZm9ybScsIGRlZmF1bHQ6IDAuMH0sXHJcbiAgICByb3VnaG5lc3M6IHt0eXBlOiAnbnVtYmVyJywgaXM6ICd1bmlmb3JtJywgZGVmYXVsdDogMS4wfSxcclxuXHJcbiAgICByb3VnaERpYWxlY3RyaWM6IHt0eXBlOiAnbWFwJywgaXM6ICd1bmlmb3JtJ30sXHJcbiAgICBzbW9vdGhEaWFsZWN0cmljOiB7dHlwZTogJ21hcCcsIGlzOiAndW5pZm9ybSd9LFxyXG4gICAgcm91Z2hNZXRhbGxpYzoge3R5cGU6ICdtYXAnLCBpczogJ3VuaWZvcm0nfSxcclxuICAgIHNtb290aE1ldGFsbGljOiB7dHlwZTogJ21hcCcsIGlzOiAndW5pZm9ybSd9LFxyXG5cclxuICAgIGVudmlyb25tZW50OiB7dHlwZTogJ3N0cmluZyd9LFxyXG5cclxuICAgIC8vIHV2OiB7dHlwZTogJ3ZlYzInLCBpczogJ2F0dHJpYnV0ZSd9XHJcbiAgfSxcclxuXHJcbiAgdmVydGV4U2hhZGVyOiByZXF1aXJlKCchIXJhdy1sb2FkZXIhLi9tYXRjYXAvdmVydGV4U2hhZGVyLmdsc2wnKS5kZWZhdWx0LFxyXG4gIGZyYWdtZW50U2hhZGVyOiByZXF1aXJlKCchIXJhdy1sb2FkZXIhLi9tYXRjYXAvZnJhZ21lbnRTaGFkZXIuZ2xzbCcpLmRlZmF1bHQsXHJcblxyXG4gIGluaXQoZGF0YSkge1xyXG4gICAgdGhpcy5hdHRyaWJ1dGVzID0gdGhpcy5pbml0VmFyaWFibGVzKGRhdGEsICdhdHRyaWJ1dGUnKTtcclxuICAgIHRoaXMudW5pZm9ybXMgPSB0aGlzLmluaXRWYXJpYWJsZXMoZGF0YSwgJ3VuaWZvcm0nKTtcclxuICAgIHRoaXMudW5pZm9ybXMudXZUcmFuc2Zvcm0gPSB7IHZhbHVlOiBuZXcgVEhSRUUuTWF0cml4MygpIH07XHJcbiAgICB0aGlzLm1hdGVyaWFsID0gbmV3ICh0aGlzLnJhdyA/IFRIUkVFLlJhd1NoYWRlck1hdGVyaWFsIDogVEhSRUUuU2hhZGVyTWF0ZXJpYWwpKHtcclxuICAgICAgLy8gYXR0cmlidXRlczogdGhpcy5hdHRyaWJ1dGVzLFxyXG4gICAgICB1bmlmb3JtczogdGhpcy51bmlmb3JtcyxcclxuICAgICAgdmVydGV4U2hhZGVyOiB0aGlzLnZlcnRleFNoYWRlcixcclxuICAgICAgZnJhZ21lbnRTaGFkZXI6IHRoaXMuZnJhZ21lbnRTaGFkZXIsXHJcbiAgICB9KTtcclxuICAgIHRoaXMubWF0ZXJpYWwubWF0Y2FwID0gdHJ1ZVxyXG4gICAgdGhpcy5tYXRlcmlhbC5ub3JtYWxNYXBUeXBlID0gMFxyXG4gICAgdGhpcy5hdXRvTWF0Y2FwID0ge31cclxuICAgIHJldHVybiB0aGlzLm1hdGVyaWFsO1xyXG4gIH0sXHJcbiAgY2hvb3NlTWF0Y2FwcyhkYXRhKSB7XHJcbiAgICBpZiAoIWRhdGEpIHJldHVybiBcImRlZmF1bHRcIlxyXG4gICAgaWYgKGRhdGEuZW52aXJvbm1lbnQpIHJldHVybiBkYXRhLmVudmlyb25tZW50O1xyXG4gICAgaWYgKCF0aGlzLmVsLnNjZW5lRWwuc3lzdGVtcy5lbnZpcm9wYWNrKSByZXR1cm4gXCJkZWZhdWx0XCI7XHJcbiAgICBpZiAoIXRoaXMuZWwuc2NlbmVFbC5zeXN0ZW1zLmVudmlyb3BhY2suZW52aXJvcGFjaykgcmV0dXJuIFwiZGVmYXVsdFwiO1xyXG4gICAgaWYgKHRoaXMuZWwuc2NlbmVFbC5zeXN0ZW1zLmVudmlyb3BhY2suZW52aXJvcGFjay5kYXRhLnByZXNldCBpbiBNQVRDQVBTKSByZXR1cm4gdGhpcy5lbC5zY2VuZUVsLnN5c3RlbXMuZW52aXJvcGFjay5lbnZpcm9wYWNrLmRhdGEucHJlc2V0O1xyXG4gICAgcmV0dXJuIFwiZGVmYXVsdFwiXHJcbiAgfSxcclxuICB1cGRhdGUoZGF0YSkge1xyXG4gICAgbGV0IGVudmlyb25tZW50ID0gdGhpcy5jaG9vc2VNYXRjYXBzKGRhdGEpXHJcbiAgICBmb3IgKGxldCBtYXRjYXBNYXAgb2YgTUFUQ0FQX1RFWFRVUkVTKVxyXG4gICAge1xyXG4gICAgICBpZiAoZGF0YSAmJiAoIWRhdGFbbWF0Y2FwTWFwXSB8fCB0aGlzLmF1dG9NYXRjYXBbbWF0Y2FwTWFwXSkpXHJcbiAgICAgIHtcclxuICAgICAgICBkYXRhW21hdGNhcE1hcF0gPSB0aGlzLmVsLnNjZW5lRWwuc3lzdGVtc1snZW52aXJvcGFjayddLnVybChNQVRDQVBTW2Vudmlyb25tZW50XVttYXRjYXBNYXBdKVxyXG4gICAgICAgIHRoaXMuYXV0b01hdGNhcFttYXRjYXBNYXBdID0gdHJ1ZTtcclxuICAgICAgfVxyXG4gICAgfVxyXG4gICAgdGhpcy51cGRhdGVWYXJpYWJsZXMoZGF0YSwgJ2F0dHJpYnV0ZScpO1xyXG4gICAgdGhpcy51cGRhdGVWYXJpYWJsZXMoZGF0YSwgJ3VuaWZvcm0nKTtcclxuXHJcbiAgICBpZiAodGhpcy5tYXRlcmlhbC5tYXApXHJcbiAgICB7XHJcbiAgICAgIHRoaXMubWF0ZXJpYWwubWFwLnVwZGF0ZU1hdHJpeCgpXHJcbiAgICAgIHRoaXMubWF0ZXJpYWwudW5pZm9ybXMudXZUcmFuc2Zvcm0udmFsdWUuY29weSh0aGlzLm1hdGVyaWFsLm1hcC5tYXRyaXgpXHJcbiAgICB9XHJcbiAgfSxcclxuICBzZXRNYXBPblRleHR1cmVMb2FkOiBmdW5jdGlvbiAodmFyaWFibGVzLCBrZXksIG1hdGVyaWFsS2V5KSB7XHJcbiAgICB2YXIgc2VsZiA9IHRoaXM7XHJcbiAgICB0aGlzLmVsLmFkZEV2ZW50TGlzdGVuZXIoJ21hdGVyaWFsdGV4dHVyZWxvYWRlZCcsIChlKSA9PiB7XHJcbiAgICAgIGlmIChrZXkgPT09ICdzcmMnKSB7XHJcbiAgICAgICAgdmFyaWFibGVzLm1hcCA9IHZhcmlhYmxlcy5zcmNcclxuICAgICAgICBrZXkgPSAnbWFwJztcclxuICAgICAgfVxyXG5cclxuICAgICAgaWYgKHNlbGYubWF0ZXJpYWxbbWF0ZXJpYWxLZXldKVxyXG4gICAgICB7XHJcbiAgICAgICAgc2VsZi5tYXRlcmlhbFtrZXldID0gc2VsZi5tYXRlcmlhbFttYXRlcmlhbEtleV07XHJcbiAgICAgICAgc2VsZi5lbC5zY2VuZUVsLnN5c3RlbXMucmVuZGVyZXIuYXBwbHlDb2xvckNvcnJlY3Rpb24oc2VsZi5tYXRlcmlhbFtrZXldKVxyXG4gICAgICAgIHNlbGYubWF0ZXJpYWwubmVlZHNVcGRhdGUgPSB0cnVlXHJcbiAgICAgIH1cclxuICAgICAgdmFyaWFibGVzW2tleV0udmFsdWUgPSBzZWxmLm1hdGVyaWFsW21hdGVyaWFsS2V5XTtcclxuICAgICAgdmFyaWFibGVzW2tleV0ubmVlZHNVcGRhdGUgPSB0cnVlO1xyXG5cclxuICAgICAgaWYgKHRoaXMubWF0ZXJpYWwubWFwKVxyXG4gICAgICB7XHJcbiAgICAgICAgdGhpcy5tYXRlcmlhbC5tYXAudXBkYXRlTWF0cml4KClcclxuICAgICAgICB0aGlzLm1hdGVyaWFsLnVuaWZvcm1zLnV2VHJhbnNmb3JtLnZhbHVlLmNvcHkodGhpcy5tYXRlcmlhbC5tYXAubWF0cml4KVxyXG4gICAgICB9XHJcbiAgICB9KTtcclxuICB9XHJcbn0pO1xyXG5cclxuY2xhc3MgUEJNYXRjYXAgZXh0ZW5kcyBUSFJFRS5TaGFkZXJNYXRlcmlhbCB7XHJcbiAgY29uc3RydWN0b3IocGFyYW1ldGVycyA9IHt9KVxyXG4gIHtcclxuICAgIHN1cGVyKHBhcmFtZXRlcnMpXHJcblxyXG4gICAgdGhpcy52ZXJ0ZXhTaGFkZXIgPSByZXF1aXJlKCchIXJhdy1sb2FkZXIhLi9tYXRjYXAvdmVydGV4U2hhZGVyLmdsc2wnKS5kZWZhdWx0O1xyXG4gICAgdGhpcy5mcmFnbWVudFNoYWRlciA9IHJlcXVpcmUoJyEhcmF3LWxvYWRlciEuL21hdGNhcC9mcmFnbWVudFNoYWRlci5nbHNsJykuZGVmYXVsdDtcclxuXHJcbiAgICB0aGlzLmRlZmluZXMgPSB7ICdNQVRDQVAnOiAnJyB9O1xyXG4gICAgdGhpcy50eXBlID0gJ1BCTWF0Y2FwJ1xyXG5cclxuICAgIHRoaXMubWF0Y2FwID0gbnVsbFxyXG4gICAgdGhpcy5ub3JtYWxNYXBUeXBlID0gMFxyXG5cclxuICAgIHRoaXMucm91Z2huZXNzID0gMS4wO1xyXG4gICAgdGhpcy5tZXRhbG5lc3MgPSAwLjA7XHJcblxyXG4gICAgdGhpcy5jb2xvciA9IG5ldyBUSFJFRS5Db2xvciggMHhmZmZmZmYgKTtcclxuICAgIHRoaXMub3BhY2l0eSA9IDEuMDtcclxuICAgIHRoaXMubWFwID0gbnVsbDtcclxuICAgIHRoaXMubm9ybWFsTWFwID0gbnVsbDtcclxuICAgIHRoaXMubm9ybWFsTWFwU2NhbGUgPSBudWxsO1xyXG4gICAgdGhpcy5hbWJpZW50T2NjbHVzaW9uTWFwID0gbnVsbDtcclxuICAgIHRoaXMuZGlzcGxhY2VtZW50TWFwID0gbnVsbDtcclxuXHJcblxyXG5cclxuICAgIGxldCBsb2FkZXIgPSBuZXcgVEhSRUUuVGV4dHVyZUxvYWRlcigpXHJcbiAgICBmb3IgKGxldCBtYXAgaW4gTUFUQ0FQUy5kZWZhdWx0KVxyXG4gICAge1xyXG4gICAgICB0aGlzW21hcF0gPSBudWxsO1xyXG4gICAgICBpZiAobWFwIGluIHBhcmFtZXRlcnMpIGNvbnRpbnVlO1xyXG4gICAgICB0aGlzW21hcF0gPSBsb2FkZXIubG9hZChNQVRDQVBTLmRlZmF1bHRbbWFwXSwgKHQpID0+IHtcclxuICAgICAgICB0aGlzW21hcF0gPSB0XHJcbiAgICAgICAgdGhpcy5uZWVkc1VwZGF0ZSA9IHRydWVcclxuICAgICAgICB0Lm5lZWRzVXBkYXRlID0gdHJ1ZVxyXG4gICAgICAgIHRoaXMuc2V0VmFsdWVzKClcclxuICAgICAgfSlcclxuICAgIH1cclxuXHJcbiAgICB0aGlzLnNldFZhbHVlcyggcGFyYW1ldGVycyApXHJcbiAgfVxyXG4gIGNvcHkoc291cmNlKSB7XHJcbiAgICBzdXBlci5jb3B5KHNvdXJjZSlcclxuICB9XHJcbiAgc2V0VmFsdWVzKHBhcmFtZXRlcnMpIHtcclxuICAgIGlmIChwYXJhbWV0ZXJzKVxyXG4gICAge1xyXG4gICAgICBzdXBlci5zZXRWYWx1ZXMocGFyYW1ldGVycylcclxuICAgIH1cclxuXHJcbiAgICB0aGlzLnVuaWZvcm1zID0ge1xyXG4gICAgICByb3VnaG5lc3M6IHt2YWx1ZTogMS4wfSxcclxuICAgICAgbWV0YWxuZXNzOiB7dmFsdWU6IDAuMH0sXHJcbiAgICAgIHNtb290aERpYWxlY3RyaWM6IHt2YWx1ZTogbnVsbCwgdHlwZTogJ3QnfSxcclxuICAgICAgcm91Z2hEaWFsZWN0cmljOiB7dmFsdWU6IG51bGwsIHR5cGU6ICd0J30sXHJcbiAgICAgIHNtb290aE1ldGFsbGljOiB7dmFsdWU6IG51bGwsIHR5cGU6ICd0J30sXHJcbiAgICAgIHJvdWdoTWV0YWxsaWM6IHt2YWx1ZTogbnVsbCwgdHlwZTogJ3QnfSxcclxuICAgIH1cclxuICAgIHRoaXMudW5pZm9ybXMucm91Z2huZXNzLnZhbHVlID0gdGhpcy5yb3VnaG5lc3NcclxuICAgIHRoaXMudW5pZm9ybXMubWV0YWxuZXNzLnZhbHVlID0gdGhpcy5tZXRhbG5lc3NcclxuICAgIHRoaXMudW5pZm9ybXMuc21vb3RoRGlhbGVjdHJpYy52YWx1ZSA9IHRoaXMuc21vb3RoRGlhbGVjdHJpY1xyXG4gICAgdGhpcy51bmlmb3Jtcy5yb3VnaERpYWxlY3RyaWMudmFsdWUgPSB0aGlzLnJvdWdoRGlhbGVjdHJpY1xyXG4gICAgdGhpcy51bmlmb3Jtcy5zbW9vdGhNZXRhbGxpYy52YWx1ZSA9IHRoaXMuc21vb3RoTWV0YWxsaWNcclxuICAgIHRoaXMudW5pZm9ybXMucm91Z2hNZXRhbGxpYy52YWx1ZSA9IHRoaXMucm91Z2hNZXRhbGxpY1xyXG5cclxuICAgIHRoaXMudW5pZm9ybXNOZWVkVXBkYXRlID0gdHJ1ZVxyXG4gIH1cclxufVxyXG5cclxuUEJNYXRjYXAuTUFUQ0FQUyA9IE1BVENBUFM7XHJcblxyXG5USFJFRS5QQk1hdGNhcCA9IFBCTWF0Y2FwO1xyXG4iXSwibWFwcGluZ3MiOiI7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7QUNsRkE7Ozs7Ozs7Ozs7O0FDQUE7Ozs7Ozs7Ozs7OztBQ0FBO0FBQUE7Ozs7Ozs7Ozs7OztBQ0FBO0FBQUE7Ozs7Ozs7Ozs7O0FDQUE7Ozs7Ozs7Ozs7OztBQ0FBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7Ozs7QUMzMkJBO0FBQUE7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7OztBQ25kQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7OztBQzVCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7OztBQzVCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7OztBQzVCQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7Ozs7QUNuUkE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7QUN6YUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7QUNwSEE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7OztBQzdCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7O0FDN0JBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7QUNOQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7OztBQ2pEQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7OztBQ2pEQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7Ozs7Ozs7QUNBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7Ozs7Ozs7Ozs7QUNqRkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7O0FDakZBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7O0FDekJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7O0FDekJBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBOzs7Ozs7Ozs7OztBQ0FBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7OztBIiwic291cmNlUm9vdCI6IiJ9