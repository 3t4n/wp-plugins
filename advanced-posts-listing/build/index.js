/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@restart/hooks/esm/index.js":
/*!**************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/index.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   useCallbackRef: () => (/* reexport safe */ _useCallbackRef__WEBPACK_IMPORTED_MODULE_0__["default"]),
/* harmony export */   useCommittedRef: () => (/* reexport safe */ _useCommittedRef__WEBPACK_IMPORTED_MODULE_1__["default"]),
/* harmony export */   useEventCallback: () => (/* reexport safe */ _useEventCallback__WEBPACK_IMPORTED_MODULE_2__["default"]),
/* harmony export */   useEventListener: () => (/* reexport safe */ _useEventListener__WEBPACK_IMPORTED_MODULE_3__["default"]),
/* harmony export */   useGlobalListener: () => (/* reexport safe */ _useGlobalListener__WEBPACK_IMPORTED_MODULE_4__["default"]),
/* harmony export */   useImage: () => (/* reexport safe */ _useImage__WEBPACK_IMPORTED_MODULE_11__["default"]),
/* harmony export */   useInterval: () => (/* reexport safe */ _useInterval__WEBPACK_IMPORTED_MODULE_5__["default"]),
/* harmony export */   useMergeState: () => (/* reexport safe */ _useMergeState__WEBPACK_IMPORTED_MODULE_7__["default"]),
/* harmony export */   useMergeStateFromProps: () => (/* reexport safe */ _useMergeStateFromProps__WEBPACK_IMPORTED_MODULE_8__["default"]),
/* harmony export */   useMounted: () => (/* reexport safe */ _useMounted__WEBPACK_IMPORTED_MODULE_9__["default"]),
/* harmony export */   usePrevious: () => (/* reexport safe */ _usePrevious__WEBPACK_IMPORTED_MODULE_10__["default"]),
/* harmony export */   useRafInterval: () => (/* reexport safe */ _useRafInterval__WEBPACK_IMPORTED_MODULE_6__["default"]),
/* harmony export */   useResizeObserver: () => (/* reexport safe */ _useResizeObserver__WEBPACK_IMPORTED_MODULE_12__["default"])
/* harmony export */ });
/* harmony import */ var _useCallbackRef__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./useCallbackRef */ "./node_modules/@restart/hooks/esm/useCallbackRef.js");
/* harmony import */ var _useCommittedRef__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./useCommittedRef */ "./node_modules/@restart/hooks/esm/useCommittedRef.js");
/* harmony import */ var _useEventCallback__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./useEventCallback */ "./node_modules/@restart/hooks/esm/useEventCallback.js");
/* harmony import */ var _useEventListener__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./useEventListener */ "./node_modules/@restart/hooks/esm/useEventListener.js");
/* harmony import */ var _useGlobalListener__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./useGlobalListener */ "./node_modules/@restart/hooks/esm/useGlobalListener.js");
/* harmony import */ var _useInterval__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./useInterval */ "./node_modules/@restart/hooks/esm/useInterval.js");
/* harmony import */ var _useRafInterval__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./useRafInterval */ "./node_modules/@restart/hooks/esm/useRafInterval.js");
/* harmony import */ var _useMergeState__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./useMergeState */ "./node_modules/@restart/hooks/esm/useMergeState.js");
/* harmony import */ var _useMergeStateFromProps__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./useMergeStateFromProps */ "./node_modules/@restart/hooks/esm/useMergeStateFromProps.js");
/* harmony import */ var _useMounted__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./useMounted */ "./node_modules/@restart/hooks/esm/useMounted.js");
/* harmony import */ var _usePrevious__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./usePrevious */ "./node_modules/@restart/hooks/esm/usePrevious.js");
/* harmony import */ var _useImage__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./useImage */ "./node_modules/@restart/hooks/esm/useImage.js");
/* harmony import */ var _useResizeObserver__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./useResizeObserver */ "./node_modules/@restart/hooks/esm/useResizeObserver.js");















/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useCallbackRef.js":
/*!***********************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useCallbackRef.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useCallbackRef)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);


/**
 * A convenience hook around `useState` designed to be paired with
 * the component [callback ref](https://reactjs.org/docs/refs-and-the-dom.html#callback-refs) api.
 * Callback refs are useful over `useRef()` when you need to respond to the ref being set
 * instead of lazily accessing it in an effect.
 *
 * ```ts
 * const [element, attachRef] = useCallbackRef<HTMLDivElement>()
 *
 * useEffect(() => {
 *   if (!element) return
 *
 *   const calendar = new FullCalendar.Calendar(element)
 *
 *   return () => {
 *     calendar.destroy()
 *   }
 * }, [element])
 *
 * return <div ref={attachRef} />
 * ```
 *
 * @category refs
 */
function useCallbackRef() {
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(null);
}

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useCommittedRef.js":
/*!************************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useCommittedRef.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);


/**
 * Creates a `Ref` whose value is updated in an effect, ensuring the most recent
 * value is the one rendered with. Generally only required for Concurrent mode usage
 * where previous work in `render()` may be discarded before being used.
 *
 * This is safe to access in an event handler.
 *
 * @param value The `Ref` value
 */
function useCommittedRef(value) {
  const ref = (0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(value);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    ref.current = value;
  }, [value]);
  return ref;
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (useCommittedRef);

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useEventCallback.js":
/*!*************************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useEventCallback.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useEventCallback)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _useCommittedRef__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./useCommittedRef */ "./node_modules/@restart/hooks/esm/useCommittedRef.js");


function useEventCallback(fn) {
  const ref = (0,_useCommittedRef__WEBPACK_IMPORTED_MODULE_1__["default"])(fn);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.useCallback)(function (...args) {
    return ref.current && ref.current(...args);
  }, [ref]);
}

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useEventListener.js":
/*!*************************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useEventListener.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useEventListener)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _useEventCallback__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./useEventCallback */ "./node_modules/@restart/hooks/esm/useEventCallback.js");


/**
 * Attaches an event handler outside directly to specified DOM element
 * bypassing the react synthetic event system.
 *
 * @param element The target to listen for events on
 * @param event The DOM event name
 * @param handler An event handler
 * @param capture Whether or not to listen during the capture event phase
 */
function useEventListener(eventTarget, event, listener, capture = false) {
  const handler = (0,_useEventCallback__WEBPACK_IMPORTED_MODULE_1__["default"])(listener);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    const target = typeof eventTarget === 'function' ? eventTarget() : eventTarget;
    target.addEventListener(event, handler, capture);
    return () => target.removeEventListener(event, handler, capture);
  }, [eventTarget]);
}

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useGlobalListener.js":
/*!**************************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useGlobalListener.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useGlobalListener)
/* harmony export */ });
/* harmony import */ var _useEventListener__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./useEventListener */ "./node_modules/@restart/hooks/esm/useEventListener.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);


/**
 * Attaches an event handler outside directly to the `document`,
 * bypassing the react synthetic event system.
 *
 * ```ts
 * useGlobalListener('keydown', (event) => {
 *  console.log(event.key)
 * })
 * ```
 *
 * @param event The DOM event name
 * @param handler An event handler
 * @param capture Whether or not to listen during the capture event phase
 */
function useGlobalListener(event, handler, capture = false) {
  const documentTarget = (0,react__WEBPACK_IMPORTED_MODULE_1__.useCallback)(() => document, []);
  return (0,_useEventListener__WEBPACK_IMPORTED_MODULE_0__["default"])(documentTarget, event, handler, capture);
}

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useImage.js":
/*!*****************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useImage.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useImage)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

/**
 * Fetch and load an image for programatic use such as in a `<canvas>` element.
 *
 * @param imageOrUrl The `HtmlImageElement` or image url to load
 * @param crossOrigin The `crossorigin` attribute to set
 *
 * ```ts
 * const { image, error } = useImage('/static/kittens.png')
 * const ref = useRef<HTMLCanvasElement>()
 *
 * useEffect(() => {
 *   const ctx = ref.current.getContext('2d')
 *
 *   if (image) {
 *     ctx.drawImage(image, 0, 0)
 *   }
 * }, [ref, image])
 *
 * return (
 *   <>
 *     {error && "there was a problem loading the image"}
 *     <canvas ref={ref} />
 *   </>
 * ```
 */
function useImage(imageOrUrl, crossOrigin) {
  const [state, setState] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)({
    image: null,
    error: null
  });
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    if (!imageOrUrl) return undefined;
    let image;
    if (typeof imageOrUrl === 'string') {
      image = new Image();
      if (crossOrigin) image.crossOrigin = crossOrigin;
      image.src = imageOrUrl;
    } else {
      image = imageOrUrl;
      if (image.complete && image.naturalHeight > 0) {
        setState({
          image,
          error: null
        });
        return;
      }
    }
    function onLoad() {
      setState({
        image,
        error: null
      });
    }
    function onError(error) {
      setState({
        image,
        error
      });
    }
    image.addEventListener('load', onLoad);
    image.addEventListener('error', onError);
    return () => {
      image.removeEventListener('load', onLoad);
      image.removeEventListener('error', onError);
    };
  }, [imageOrUrl, crossOrigin]);
  return state;
}

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useInterval.js":
/*!********************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useInterval.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _useCommittedRef__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./useCommittedRef */ "./node_modules/@restart/hooks/esm/useCommittedRef.js");



/**
 * Creates a `setInterval` that is properly cleaned up when a component unmounted
 *
 * ```tsx
 *  function Timer() {
 *    const [timer, setTimer] = useState(0)
 *    useInterval(() => setTimer(i => i + 1), 1000)
 *
 *    return <span>{timer} seconds past</span>
 *  }
 * ```
 *
 * @param fn an function run on each interval
 * @param ms The milliseconds duration of the interval
 */

/**
 * Creates a pausable `setInterval` that is properly cleaned up when a component unmounted
 *
 * ```tsx
 *  const [paused, setPaused] = useState(false)
 *  const [timer, setTimer] = useState(0)
 *
 *  useInterval(() => setTimer(i => i + 1), 1000, paused)
 *
 *  return (
 *    <span>
 *      {timer} seconds past
 *
 *      <button onClick={() => setPaused(p => !p)}>{paused ? 'Play' : 'Pause' }</button>
 *    </span>
 * )
 * ```
 *
 * @param fn an function run on each interval
 * @param ms The milliseconds duration of the interval
 * @param paused Whether or not the interval is currently running
 */

/**
 * Creates a pausable `setInterval` that _fires_ immediately and is
 * properly cleaned up when a component unmounted
 *
 * ```tsx
 *  const [timer, setTimer] = useState(-1)
 *  useInterval(() => setTimer(i => i + 1), 1000, false, true)
 *
 *  // will update to 0 on the first effect
 *  return <span>{timer} seconds past</span>
 * ```
 *
 * @param fn an function run on each interval
 * @param ms The milliseconds duration of the interval
 * @param paused Whether or not the interval is currently running
 * @param runImmediately Whether to run the function immediately on mount or unpause
 * rather than waiting for the first interval to elapse
 *

 */

function useInterval(fn, ms, paused = false, runImmediately = false) {
  let handle;
  const fnRef = (0,_useCommittedRef__WEBPACK_IMPORTED_MODULE_1__["default"])(fn);
  // this ref is necessary b/c useEffect will sometimes miss a paused toggle
  // orphaning a setTimeout chain in the aether, so relying on it's refresh logic is not reliable.
  const pausedRef = (0,_useCommittedRef__WEBPACK_IMPORTED_MODULE_1__["default"])(paused);
  const tick = () => {
    if (pausedRef.current) return;
    fnRef.current();
    schedule(); // eslint-disable-line no-use-before-define
  };

  const schedule = () => {
    clearTimeout(handle);
    handle = setTimeout(tick, ms);
  };
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    if (runImmediately) {
      tick();
    } else {
      schedule();
    }
    return () => clearTimeout(handle);
  }, [paused, runImmediately]);
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (useInterval);

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useIsomorphicEffect.js":
/*!****************************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useIsomorphicEffect.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

const isReactNative = typeof __webpack_require__.g !== 'undefined' &&
// @ts-ignore
__webpack_require__.g.navigator &&
// @ts-ignore
__webpack_require__.g.navigator.product === 'ReactNative';
const isDOM = typeof document !== 'undefined';

/**
 * Is `useLayoutEffect` in a DOM or React Native environment, otherwise resolves to useEffect
 * Only useful to avoid the console warning.
 *
 * PREFER `useEffect` UNLESS YOU KNOW WHAT YOU ARE DOING.
 *
 * @category effects
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (isDOM || isReactNative ? react__WEBPACK_IMPORTED_MODULE_0__.useLayoutEffect : react__WEBPACK_IMPORTED_MODULE_0__.useEffect);

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useMergeState.js":
/*!**********************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useMergeState.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useMergeState)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);


/**
 * Updates state, partial updates are merged into existing state values
 */

/**
 * Mimics a React class component's state model, of having a single unified
 * `state` object and an updater that merges updates into the existing state, as
 * opposed to replacing it.
 *
 * ```js
 * const [state, setState] = useMergeState({ name: 'Betsy', age: 24 })
 *
 * setState({ name: 'Johan' }) // { name: 'Johan', age: 24 }
 *
 * setState(state => ({ age: state.age + 10 })) // { name: 'Johan', age: 34 }
 * ```
 *
 * @param initialState The initial state object
 */
function useMergeState(initialState) {
  const [state, setState] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(initialState);
  const updater = (0,react__WEBPACK_IMPORTED_MODULE_0__.useCallback)(update => {
    if (update === null) return;
    if (typeof update === 'function') {
      setState(state => {
        const nextState = update(state);
        return nextState == null ? state : Object.assign({}, state, nextState);
      });
    } else {
      setState(state => Object.assign({}, state, update));
    }
  }, [setState]);
  return [state, updater];
}

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useMergeStateFromProps.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useMergeStateFromProps.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useMergeStateFromProps)
/* harmony export */ });
/* harmony import */ var _useMergeState__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./useMergeState */ "./node_modules/@restart/hooks/esm/useMergeState.js");

function useMergeStateFromProps(props, gDSFP, initialState) {
  const [state, setState] = (0,_useMergeState__WEBPACK_IMPORTED_MODULE_0__["default"])(initialState);
  const nextState = gDSFP(props, state);
  if (nextState !== null) setState(nextState);
  return [state, setState];
}

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useMounted.js":
/*!*******************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useMounted.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useMounted)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);


/**
 * Track whether a component is current mounted. Generally less preferable than
 * properlly canceling effects so they don't run after a component is unmounted,
 * but helpful in cases where that isn't feasible, such as a `Promise` resolution.
 *
 * @returns a function that returns the current isMounted state of the component
 *
 * ```ts
 * const [data, setData] = useState(null)
 * const isMounted = useMounted()
 *
 * useEffect(() => {
 *   fetchdata().then((newData) => {
 *      if (isMounted()) {
 *        setData(newData);
 *      }
 *   })
 * })
 * ```
 */
function useMounted() {
  const mounted = (0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(true);
  const isMounted = (0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(() => mounted.current);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    mounted.current = true;
    return () => {
      mounted.current = false;
    };
  }, []);
  return isMounted.current;
}

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/usePrevious.js":
/*!********************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/usePrevious.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ usePrevious)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);


/**
 * Store the last of some value. Tracked via a `Ref` only updating it
 * after the component renders.
 *
 * Helpful if you need to compare a prop value to it's previous value during render.
 *
 * ```ts
 * function Component(props) {
 *   const lastProps = usePrevious(props)
 *
 *   if (lastProps.foo !== props.foo)
 *     resetValueFromProps(props.foo)
 * }
 * ```
 *
 * @param value the value to track
 */
function usePrevious(value) {
  const ref = (0,react__WEBPACK_IMPORTED_MODULE_0__.useRef)(null);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    ref.current = value;
  });
  return ref.current;
}

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useRafInterval.js":
/*!***********************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useRafInterval.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _useCommittedRef__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./useCommittedRef */ "./node_modules/@restart/hooks/esm/useCommittedRef.js");


function useRafInterval(fn, ms, paused = false) {
  let handle;
  let start = new Date().getTime();
  const fnRef = (0,_useCommittedRef__WEBPACK_IMPORTED_MODULE_1__["default"])(fn);
  // this ref is necessary b/c useEffect will sometimes miss a paused toggle
  // orphaning a setTimeout chain in the aether, so relying on it's refresh logic is not reliable.
  const pausedRef = (0,_useCommittedRef__WEBPACK_IMPORTED_MODULE_1__["default"])(paused);
  function loop() {
    const current = new Date().getTime();
    const delta = current - start;
    if (pausedRef.current) return;
    if (delta >= ms && fnRef.current) {
      fnRef.current();
      start = new Date().getTime();
    }
    cancelAnimationFrame(handle);
    handle = requestAnimationFrame(loop);
  }
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    handle = requestAnimationFrame(loop);
    return () => cancelAnimationFrame(handle);
  }, []);
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (useRafInterval);

/***/ }),

/***/ "./node_modules/@restart/hooks/esm/useResizeObserver.js":
/*!**************************************************************!*\
  !*** ./node_modules/@restart/hooks/esm/useResizeObserver.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useResizeObserver)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _useIsomorphicEffect__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./useIsomorphicEffect */ "./node_modules/@restart/hooks/esm/useIsomorphicEffect.js");


const targetMap = new WeakMap();
let resizeObserver;
function getResizeObserver() {
  // eslint-disable-next-line no-return-assign
  return resizeObserver = resizeObserver || new window.ResizeObserver(entries => {
    entries.forEach(entry => {
      const handler = targetMap.get(entry.target);
      if (handler) handler(entry.contentRect);
    });
  });
}

/**
 * Efficiently observe size changes on an element. Depends on the `ResizeObserver` api,
 * and polyfills are needed in older browsers.
 *
 * ```ts
 * const [ref, attachRef] = useCallbackRef(null);
 *
 * const rect = useResizeObserver(ref);
 *
 * return (
 *  <div ref={attachRef}>
 *    {JSON.stringify(rect)}
 *  </div>
 * )
 * ```
 *
 * @param element The DOM element to observe
 */
function useResizeObserver(element) {
  const [rect, setRect] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(null);
  (0,_useIsomorphicEffect__WEBPACK_IMPORTED_MODULE_1__["default"])(() => {
    if (!element) return;
    getResizeObserver().observe(element);
    setRect(element.getBoundingClientRect());
    targetMap.set(element, rect => {
      setRect(rect);
    });
    return () => {
      targetMap.delete(element);
    };
  }, [element]);
  return rect;
}

/***/ }),

/***/ "./node_modules/@restart/ui/esm/Anchor.js":
/*!************************************************!*\
  !*** ./node_modules/@restart/ui/esm/Anchor.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   isTrivialHref: () => (/* binding */ isTrivialHref)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _restart_hooks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @restart/hooks */ "./node_modules/@restart/hooks/esm/index.js");
/* harmony import */ var _Button__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Button */ "./node_modules/@restart/ui/esm/Button.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
const _excluded = ["onKeyDown"];
function _objectWithoutPropertiesLoose(source, excluded) { if (source == null) return {}; var target = {}; var sourceKeys = Object.keys(source); var key, i; for (i = 0; i < sourceKeys.length; i++) { key = sourceKeys[i]; if (excluded.indexOf(key) >= 0) continue; target[key] = source[key]; } return target; }
/* eslint-disable jsx-a11y/no-static-element-interactions */
/* eslint-disable jsx-a11y/anchor-has-content */





function isTrivialHref(href) {
  return !href || href.trim() === '#';
}
/**
 * An generic `<a>` component that covers a few A11y cases, ensuring that
 * cases where the `href` is missing or trivial like "#" are treated like buttons.
 */
const Anchor = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.forwardRef((_ref, ref) => {
  let {
      onKeyDown
    } = _ref,
    props = _objectWithoutPropertiesLoose(_ref, _excluded);
  const [buttonProps] = (0,_Button__WEBPACK_IMPORTED_MODULE_3__.useButtonProps)(Object.assign({
    tagName: 'a'
  }, props));
  const handleKeyDown = (0,_restart_hooks__WEBPACK_IMPORTED_MODULE_1__.useEventCallback)(e => {
    buttonProps.onKeyDown(e);
    onKeyDown == null ? void 0 : onKeyDown(e);
  });
  if (isTrivialHref(props.href) || props.role === 'button') {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("a", Object.assign({
      ref: ref
    }, props, buttonProps, {
      onKeyDown: handleKeyDown
    }));
  }
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("a", Object.assign({
    ref: ref
  }, props, {
    onKeyDown: onKeyDown
  }));
});
Anchor.displayName = 'Anchor';
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Anchor);

/***/ }),

/***/ "./node_modules/@restart/ui/esm/Button.js":
/*!************************************************!*\
  !*** ./node_modules/@restart/ui/esm/Button.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   isTrivialHref: () => (/* binding */ isTrivialHref),
/* harmony export */   useButtonProps: () => (/* binding */ useButtonProps)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
const _excluded = ["as", "disabled"];
function _objectWithoutPropertiesLoose(source, excluded) { if (source == null) return {}; var target = {}; var sourceKeys = Object.keys(source); var key, i; for (i = 0; i < sourceKeys.length; i++) { key = sourceKeys[i]; if (excluded.indexOf(key) >= 0) continue; target[key] = source[key]; } return target; }


function isTrivialHref(href) {
  return !href || href.trim() === '#';
}
function useButtonProps({
  tagName,
  disabled,
  href,
  target,
  rel,
  role,
  onClick,
  tabIndex = 0,
  type
}) {
  if (!tagName) {
    if (href != null || target != null || rel != null) {
      tagName = 'a';
    } else {
      tagName = 'button';
    }
  }
  const meta = {
    tagName
  };
  if (tagName === 'button') {
    return [{
      type: type || 'button',
      disabled
    }, meta];
  }
  const handleClick = event => {
    if (disabled || tagName === 'a' && isTrivialHref(href)) {
      event.preventDefault();
    }
    if (disabled) {
      event.stopPropagation();
      return;
    }
    onClick == null ? void 0 : onClick(event);
  };
  const handleKeyDown = event => {
    if (event.key === ' ') {
      event.preventDefault();
      handleClick(event);
    }
  };
  if (tagName === 'a') {
    // Ensure there's a href so Enter can trigger anchor button.
    href || (href = '#');
    if (disabled) {
      href = undefined;
    }
  }
  return [{
    role: role != null ? role : 'button',
    // explicitly undefined so that it overrides the props disabled in a spread
    // e.g. <Tag {...props} {...hookProps} />
    disabled: undefined,
    tabIndex: disabled ? undefined : tabIndex,
    href,
    target: tagName === 'a' ? target : undefined,
    'aria-disabled': !disabled ? undefined : disabled,
    rel: tagName === 'a' ? rel : undefined,
    onClick: handleClick,
    onKeyDown: handleKeyDown
  }, meta];
}
const Button = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.forwardRef((_ref, ref) => {
  let {
      as: asProp,
      disabled
    } = _ref,
    props = _objectWithoutPropertiesLoose(_ref, _excluded);
  const [buttonProps, {
    tagName: Component
  }] = useButtonProps(Object.assign({
    tagName: asProp,
    disabled
  }, props));
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(Component, Object.assign({}, props, buttonProps, {
    ref: ref
  }));
});
Button.displayName = 'Button';
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Button);

/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/pin.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/pin.js ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);

/**
 * WordPress dependencies
 */

const pin = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "m21.5 9.1-6.6-6.6-4.2 5.6c-1.2-.1-2.4.1-3.6.7-.1 0-.1.1-.2.1-.5.3-.9.6-1.2.9l3.7 3.7-5.7 5.7v1.1h1.1l5.7-5.7 3.7 3.7c.4-.4.7-.8.9-1.2.1-.1.1-.2.2-.3.6-1.1.8-2.4.6-3.6l5.6-4.1zm-7.3 3.5.1.9c.1.9 0 1.8-.4 2.6l-6-6c.8-.4 1.7-.5 2.6-.4l.9.1L15 4.9 19.1 9l-4.9 3.6z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (pin);
//# sourceMappingURL=pin.js.map

/***/ }),

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react_bootstrap_pagination_control__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-bootstrap-pagination-control */ "./node_modules/react-bootstrap-pagination-control/dist/react-bootstrap-pagination-control.esm.js");
/* harmony import */ var bootstrap_dist_css_bootstrap_min_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! bootstrap/dist/css/bootstrap.min.css */ "./node_modules/bootstrap/dist/css/bootstrap.min.css");
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/pin.js");
/* harmony import */ var _hooks_useFeaturedImage__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./hooks/useFeaturedImage */ "./src/hooks/useFeaturedImage.js");
/* harmony import */ var _hooks_useCptNamesAndPostsByName__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./hooks/useCptNamesAndPostsByName */ "./src/hooks/useCptNamesAndPostsByName.js");
/* harmony import */ var _layouts_Slider_Slider__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./layouts/Slider/Slider */ "./src/layouts/Slider/Slider.jsx");
/* harmony import */ var _layouts_grid_Grid__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./layouts/grid/Grid */ "./src/layouts/grid/Grid.jsx");
/* harmony import */ var _layouts_Masanory_MasanoryLayout__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./layouts/Masanory/MasanoryLayout */ "./src/layouts/Masanory/MasanoryLayout.jsx");
/* harmony import */ var _layouts_Overlay_OverlayLayout__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./layouts/Overlay/OverlayLayout */ "./src/layouts/Overlay/OverlayLayout.jsx");
/* harmony import */ var _layouts_listing_ListingLayout__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./layouts/listing/ListingLayout */ "./src/layouts/listing/ListingLayout.jsx");
/* harmony import */ var _hooks_useSortedData__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./hooks/useSortedData */ "./src/hooks/useSortedData.js");




















function Edit({
  attributes,
  setAttributes
}) {
  const {
    showImgToggler,
    showContent,
    showMeta,
    showPostTitle,
    numPostsToShow,
    selectedCustomPostType,
    wordsLimit,
    widthPercentage,
    valueForWidth,
    customTaxonomyPosts,
    sortBy,
    imageUrl,
    ImgWidth,
    height,
    contentType,
    widthController,
    totalColoms,
    columnGap,
    rowGap,
    PaginationOnToggler,
    prevName,
    nextName,
    commaSeparatedIds,
    RemoveCommaSeparatedIds,
    selectedLayout,
    paginationAline,
    showReadMoreToggler,
    ReadMoreBgColor,
    ReadMoreTextColor,
    button_Right_Left_Padding,
    button_Top_bottom_Padding,
    title_Manage_styling,
    title_font_size,
    Meta_Manage_styling,
    Meta_font_size,
    Content_Manage_styling,
    Content_font_size,
    Read_more_font_size,
    customCSS,
    ReadMoreText
  } = attributes;
  const [page, setPage] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(1); // Current page state
  const perPage = numPostsToShow; // Posts per page
  const [errNotice, setErrNotice] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [activeTab, setActiveTab] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)('tab1');
  const [withImagePosts, setWithImagePosts] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)([]);
  const [tempCSS, setTempCSS] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(customCSS || '');
  const handleApplyCSS = () => {
    setAttributes({
      ...attributes,
      customCSS: tempCSS
    });
  };

  // Function to remove the applied CSS
  const handleRemoveApplyCSS = () => {
    setTempCSS('');
    setAttributes({
      ...attributes,
      customCSS: ''
    }); // Clear the saved customCSS
  };
  const {
    data,
    setData,
    fetchCustomTaxonomyIdsBytermName,
    handleSelectedCustomPostType,
    fetchPostsByIds,
    customPostsOptionsResponse,
    isLoading
  } = (0,_hooks_useCptNamesAndPostsByName__WEBPACK_IMPORTED_MODULE_7__["default"])({
    attributes,
    setAttributes
  });
  const {
    handleAlignmentChange,
    handleWidthChange,
    handleResolutionChange,
    handleHeightChange,
    getMaxHeightAndWidth,
    alignment,
    toggleGroupControlState
  } = (0,_hooks_useFeaturedImage__WEBPACK_IMPORTED_MODULE_6__["default"])({
    attributes,
    setAttributes
  });
  const truncateContent = (excerpt, limit) => {
    const words = excerpt?.split(" ");
    if (words.length > limit) {
      return words.slice(0, limit).join(" ") + "...";
    } else {
      return excerpt;
    }
  };
  // Call the custom hook with data, sortBy, and setData
  (0,_hooks_useSortedData__WEBPACK_IMPORTED_MODULE_13__["default"])(data, sortBy, setData);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    setAttributes({
      ...attributes,
      height: height,
      showImgToggler: showImgToggler,
      showContent: showContent,
      showPostTitle: showPostTitle,
      showMeta: showMeta
    });
  }, [data, valueForWidth, height]);

  //Fetch Include-Posts:
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    if (commaSeparatedIds.length > 0) {
      fetchPostsByIds(commaSeparatedIds);
    }
  }, [commaSeparatedIds, RemoveCommaSeparatedIds]);

  // Set ErrNotification:
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    // Helper function to clean and sort an array of IDs
    const cleanAndSortIds = arr => {
      return arr.map(id => id.replace(/\D/g, '')) // Remove non-numeric characters
      .filter(id => id !== '') // Remove empty strings
      .map(id => Number(id)) // Convert to numbers
      .sort((a, b) => a - b); // Sort numerically
    };

    // Clean and sort IDs from comma-separated strings
    const cleanedCommaIds = cleanAndSortIds(commaSeparatedIds);
    const cleanedRemoveIds = cleanAndSortIds(RemoveCommaSeparatedIds);

    // Remove duplicates
    const uniqueCommaIds = [...new Set(cleanedCommaIds)];
    const uniqueRemoveIds = [...new Set(cleanedRemoveIds)];

    // Check if the arrays are equal
    const arraysAreEqual = uniqueCommaIds.length > 0 && uniqueRemoveIds.length > 0 && uniqueCommaIds.length === uniqueRemoveIds.length && uniqueCommaIds.every((id, index) => id === uniqueRemoveIds[index]);
    if (arraysAreEqual) {
      setErrNotice(true);
    } else {
      setErrNotice(false);
    }
  }, [RemoveCommaSeparatedIds]);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    if (selectedLayout === "overlay-layout") {
      const updatedPosts = data.map(item => {
        // Flag for posts without images
        return {
          ...item,
          hasNoImage: !item.featured_image_url?.thumbnail // If no image, flag as 'no-image'
        };
      });
      setWithImagePosts(updatedPosts); // Update the state with flagged posts
    } else if (selectedLayout === "slider-layout") {
      // Filter out items without an image for the slider layout
      const withImagePosts = data.filter(item => item.featured_image_url?.thumbnail);
      setWithImagePosts(withImagePosts); // Update the state with filtered posts
    } else {
      setWithImagePosts(data); // Default: set the posts normally for other layouts
    }
  }, [selectedLayout, data]); // Dependencies

  // Exclude Posts From FinalData(data):
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    let newData = [];
    if (RemoveCommaSeparatedIds.length > 0) {
      // Filter data to exclude IDs in RemoveCommaSeparatedIds
      newData = data.filter(item => !RemoveCommaSeparatedIds.includes(item.id.toString()));
      if (JSON.stringify(newData) !== JSON.stringify(data)) {
        // Update state with the filtered data only if it has changed
        setData(newData);
      }
    }
  }, [data, RemoveCommaSeparatedIds]); // Dependencies to trigger effect

  // Define the component based on viewType
  let DynamicComponent;
  switch (selectedLayout) {
    case 'slider-layout':
      DynamicComponent = _layouts_Slider_Slider__WEBPACK_IMPORTED_MODULE_8__["default"];
      break;
    case 'overlay-layout':
      DynamicComponent = _layouts_Overlay_OverlayLayout__WEBPACK_IMPORTED_MODULE_11__["default"];
      break;
    case 'listing-layout':
      DynamicComponent = _layouts_listing_ListingLayout__WEBPACK_IMPORTED_MODULE_12__["default"];
      break;
    case 'grid-layout':
      DynamicComponent = _layouts_grid_Grid__WEBPACK_IMPORTED_MODULE_9__["default"];
      break;
    case 'masanory-layout':
    default:
      DynamicComponent = _layouts_Masanory_MasanoryLayout__WEBPACK_IMPORTED_MODULE_10__["default"];
      break;
  }

  // Handle tab change
  const handleTabChange = newTab => {
    setActiveTab(newTab);
  };
  const handleSort = selectedSortBy => {
    setAttributes({
      ...attributes,
      sortBy: selectedSortBy
    });
  };

  // Handle next page pagination
  const handleNextPage = () => {
    if (page < totalPages) {
      setPage(page + 1);
    }
  };

  // Handle previous page pagination
  const handlePrevPage = () => {
    if (page > 1) {
      setPage(page - 1);
    }
  };
  const handleIncludePosts = value => {
    if (!value.trim()) {
      setErrNotice(false);
      setAttributes({
        commaSeparatedIds: []
      });
    } else {
      const idsArray = value.split(',');
      setPage(1);
      setAttributes({
        ...attributes,
        commaSeparatedIds: idsArray
      });
    }
  };
  const handleExcludePosts = value => {
    if (value.trim()) {
      const idsArray = value.split(',');
      setAttributes({
        ...attributes,
        RemoveCommaSeparatedIds: idsArray
      });
    } else {
      setPage(1);
      setAttributes({
        ...attributes,
        RemoveCommaSeparatedIds: []
      });
    }
  };
  const handleChangeLayout = layout => {
    setAttributes({
      ...attributes,
      selectedLayout: layout
    });
  };
  const alinePagination = value => {
    setAttributes({
      ...attributes,
      paginationAline: value
    });
  };
  const selectedCustomPost = selectedCustomPostType === "Posts" ? "post" : selectedCustomPostType === "Pages" ? "page" : selectedCustomPostType.toLowerCase();
  const lowercaseSelectedCpt = customPostsOptionsResponse?.post_type_and_taxonomies?.[selectedCustomPost];

  // Pagination Data:
  const dataWithImages = withImagePosts.length > 0 ? withImagePosts : data;
  const paginatedData = PaginationOnToggler ? Array.isArray(dataWithImages) ? dataWithImages.slice((page - 1) * perPage, page * perPage) : [] : Array.isArray(dataWithImages) ? dataWithImages.slice(0, numPostsToShow) : [];
  const totalPages = Math.ceil(data?.length / perPage);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...(0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)()
  }, errNotice ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Notice, {
    status: "error",
    isDismissible: false
  }, "Please ensure IDs are not included in both the include and exclude lists.") : isLoading ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Placeholder, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Advanced Posts Listing", "advanced-posts-listing")
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Spinner, null), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Loading...", "advanced-posts-listing")))) : data?.length === 0 ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Placeholder, {
    icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_14__["default"],
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Advanced Posts Listing", "advanced-posts-listing")
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("No posts were found.", "advanced-posts-listing"))) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(DynamicComponent, {
    paginatedData: paginatedData,
    numPostsToShow: numPostsToShow,
    showImgToggler: showImgToggler,
    showPostTitle: showPostTitle,
    showMeta: showMeta,
    showContent: showContent,
    contentType: contentType,
    truncateContent: truncateContent,
    wordsLimit: wordsLimit,
    imageUrl: imageUrl,
    valueForWidth: valueForWidth,
    widthPercentage: widthPercentage,
    widthController: widthController,
    ImgWidth: ImgWidth,
    height: height,
    columnGap: columnGap,
    rowGap: rowGap,
    totalColoms: totalColoms,
    __: _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__ // Ensure you pass any translation function or props needed
    ,
    ReadMoreBgColor: ReadMoreBgColor,
    showReadMoreToggler: showReadMoreToggler,
    ReadMoreTextColor: ReadMoreTextColor,
    button_Top_bottom_Padding: button_Top_bottom_Padding,
    button_Right_Left_Padding: button_Right_Left_Padding,
    title_Manage_styling: title_Manage_styling,
    title_font_size: title_font_size,
    Meta_Manage_styling: Meta_Manage_styling,
    Meta_font_size: Meta_font_size,
    Content_Manage_styling: Content_Manage_styling,
    Content_font_size: Content_font_size,
    Read_more_font_size: Read_more_font_size,
    customCSS: customCSS,
    ReadMoreText: ReadMoreText
  })), data.length > 0 && data.length > numPostsToShow && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "pagination-control",
    style: {
      marginTop: rowGap,
      display: 'flex',
      justifyContent: paginationAline
    }
  }, PaginationOnToggler && !errNotice && selectedLayout !== 'slider-layout' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("nav", {
    "aria-label": "Page navigation"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
    className: "pagination"
  }, prevName.length > 0 && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    className: `page-item `
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "page-link",
    onClick: handlePrevPage,
    disabled: page === 1
  }, prevName)), showReadMoreToggler && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", null, `
                  .pagination-control .page-item.active .page-link,.pagination-control .page-link:hover {
                    background-color: ${ReadMoreBgColor}!important;
                    border-color:  ${ReadMoreBgColor}!important; 
                    color: ${ReadMoreTextColor}!important; ;
                  }
                `), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react_bootstrap_pagination_control__WEBPACK_IMPORTED_MODULE_4__.PaginationControl, {
    page: page,
    between: 5,
    total: dataWithImages.length,
    limit: perPage,
    changePage: newPage => setPage(newPage),
    ellipsis: 1,
    next: false,
    last: false,
    className: "custom-pagination"
  }), nextName.length > 0 && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    className: `page-item `
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "page-link",
    onClick: handleNextPage,
    disabled: page === totalPages
  }, nextName)))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TabPanel, {
    className: "my-tab-panel",
    tabs: [{
      name: 'Layouts',
      title: 'Layouts',
      className: 'tab-two'
    }, {
      name: 'General',
      title: 'General',
      className: 'tab-one'
    }, {
      name: 'Elements',
      title: 'Elements',
      className: 'tab-two'
    }],
    activeTab: activeTab,
    onSelect: handleTabChange
  }, tab => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null))), activeTab === 'Layouts' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Select Layout", "advanced-posts-listing"),
    initialOpen: true
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    className: "apgb-post-type",
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Choose A Layout", "advanced-posts-listing"),
    value: selectedLayout,
    onChange: handleChangeLayout,
    options: [{
      label: "Listing Layout",
      value: "listing-layout"
    }, {
      label: "Grid Layout",
      value: "grid-layout"
    }, {
      label: "Overlay Layout",
      value: "overlay-layout"
    }, {
      label: "Masonry Layout",
      value: "masonry-layout"
    }, {
      label: "Slider Layout",
      value: "slider-layout"
    }]
  }))), activeTab === 'Layouts' && selectedLayout !== 'slider-layout' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Layout Settings", "advanced-posts-listing"),
    initialOpen: false
  }, selectedLayout !== 'listing-layout' && selectedLayout !== 'slider-layout' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "dashicons-before-range",
    style: {
      display: 'flex',
      alignItems: 'center'
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    class: "dashicons dashicons-grid-view",
    style: {
      marginRight: '8px',
      marginTop: '-33px'
    }
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "rangeController",
    style: {
      flex: 1
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("No. Of Columns", "advanced-posts-listing"),
    value: totalColoms,
    max: 6,
    min: 1,
    onChange: value => {
      setAttributes({
        totalColoms: value
      });
    },
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Set the number of columns to displayed in a row.", "advanced-posts-listing")
  }))), selectedLayout !== 'listing-layout' && selectedLayout !== 'slider-layout' && totalColoms > 1 && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "dashicons-before-range ",
    style: {
      display: 'flex',
      alignItems: 'center'
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "dashicons dashicons-arrow-right-alt",
    style: {
      marginRight: '8px',
      marginTop: '-33px'
    }
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "rangeController",
    style: {
      flex: 1
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Column Gap", "advanced-posts-listing"),
    value: parseInt(columnGap),
    max: 100,
    min: 1,
    onChange: value => {
      const updatedColomGap = `${value}px`;
      setAttributes({
        columnGap: updatedColomGap
      });
    },
    className: "custom-range-control",
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Set the space to be applied between columns.", "advanced-posts-listing")
  }))), selectedLayout !== "slider-layout" && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "dashicons-before-range",
    style: {
      display: 'flex',
      alignItems: 'center'
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "dashicons dashicons-arrow-down-alt",
    style: {
      marginRight: '8px',
      marginTop: '-33px'
    }
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "rangeController",
    style: {
      flex: 1
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Row Gap", "advanced-posts-listing"),
    value: parseInt(rowGap),
    max: 150,
    min: 1,
    onChange: value => {
      const updatedRowGap = `${value}px`;
      setAttributes({
        rowGap: updatedRowGap
      });
    },
    className: "custom-range-control",
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Set the space to be applied between rows.", "advanced-posts-listing")
  }))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, activeTab === 'Layouts' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Custom CSS", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextareaControl, {
    __nextHasNoMarginBottom: true,
    help: "Enter custom CSS",
    onChange: value => setTempCSS(value) // Update tempCSS as the user types
    ,
    placeholder: "Enter your CSS here",
    value: tempCSS // Controlled value linked to tempCSS state
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    isPrimary: true,
    onClick: handleApplyCSS
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Update CSS", "advanced-posts-listing")), tempCSS && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
    isSecondary: true,
    onClick: handleRemoveApplyCSS,
    className: "Remove-css"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Remove CSS", "advanced-posts-listing")))))), activeTab === 'General' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Posts Count", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: "Number of Posts",
    value: numPostsToShow,
    min: 1,
    onChange: value => {
      setAttributes({
        numPostsToShow: value
      }); // Set numPostsToShow attribute
      setPage(1);
    },
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Set the maximum number of posts to display on the page", "advanced-posts-listing")
  }))), activeTab === 'General' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Data Source", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    className: "apgb-post-type",
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Post Type", "advanced-posts-listing"),
    value: selectedCustomPostType,
    onChange: handleSelectedCustomPostType,
    options: [{
      label: "Posts",
      value: "Posts"
    }, {
      label: "Pages",
      value: "Pages"
    }, ...(customPostsOptionsResponse && Object.keys(customPostsOptionsResponse.cpt_list || {}).map(key => ({
      label: customPostsOptionsResponse.cpt_list[key],
      value: key
    })))]
  }), lowercaseSelectedCpt?.filter(taxonomy => taxonomy.label !== "Pattern Categories" && taxonomy.label !== "Navigation Menus" && taxonomy.label !== "Formats").map((taxonomy, index) => {
    const lowercaseType = taxonomy.label === "Categories" ? "categories" : taxonomy.label === "Tags" ? "tags" : taxonomy?.slug.toLowerCase();
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.FormTokenField, {
      className: `apgb-filter-by-${taxonomy.label}`,
      key: taxonomy.label,
      name: lowercaseType,
      value: customTaxonomyPosts?.[lowercaseType] || [],
      label: taxonomy.label,
      onChange: term => {
        fetchCustomTaxonomyIdsBytermName(term, lowercaseType, index);
      }
    });
  }))), activeTab === 'Elements' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Post Title", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    checked: showPostTitle,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Display Post Title", "advanced-posts-listing"),
    onChange: () => setAttributes({
      showPostTitle: !showPostTitle
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    checked: title_Manage_styling,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Manage Styling", "advanced-posts-listing"),
    onChange: () => setAttributes({
      title_Manage_styling: !title_Manage_styling
    })
  }), title_Manage_styling && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(" Font Size ", "advanced-posts-listing"),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Specify the font size using px, em, or rem (e.g., 15px, 20rem, 25em).", "advanced-posts-listing"),
    __nextHasNoMarginBottom: true,
    value: title_font_size,
    onChange: value => {
      setAttributes({
        title_font_size: value
      });
    }
  }))), activeTab === 'Elements' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Post Content", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    checked: showContent,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Display Post Content", "advanced-posts-listing"),
    onChange: () => setAttributes({
      showContent: !showContent
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    checked: Content_Manage_styling,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Manage Styling", "advanced-posts-listing"),
    onChange: () => setAttributes({
      Content_Manage_styling: !Content_Manage_styling
    })
  }), Content_Manage_styling && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(" Font Size ", "advanced-posts-listing"),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Specify the font size using px, em, or rem (e.g., 15px, 20rem, 25em).", "advanced-posts-listing"),
    __nextHasNoMarginBottom: true,
    value: Content_font_size,
    onChange: value => {
      setAttributes({
        Content_font_size: value
      });
    }
  }), showContent && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RadioControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Display :", "advanced-posts-listing"),
    selected: contentType,
    options: [{
      label: "Display Excerpt",
      value: "Excerpt"
    }, {
      label: "Display Full Post Content",
      value: "Full-Post"
    }],
    onChange: newContentType => setAttributes({
      contentType: newContentType
    })
  }), contentType === "Excerpt" ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Max Number of Words", "advanced-posts-listing"),
    value: wordsLimit,
    min: 10,
    onChange: value => {
      setAttributes({
        wordsLimit: value
      });
    }
  }) : null))), activeTab === 'Elements' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Post Meta", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    checked: showMeta,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Display Post Meta Info"),
    onChange: () => setAttributes({
      showMeta: !showMeta
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    checked: Meta_Manage_styling,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Manage Styling", "advanced-posts-listing"),
    onChange: () => setAttributes({
      Meta_Manage_styling: !Meta_Manage_styling
    })
  }), Meta_Manage_styling && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(" Font Size ", "advanced-posts-listing"),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Specify the font size using px, em, or rem (e.g., 15px, 20rem, 25em).", "advanced-posts-listing"),
    __nextHasNoMarginBottom: true,
    value: Meta_font_size,
    onChange: value => {
      setAttributes({
        Meta_font_size: value
      });
    }
  }))), activeTab === 'Elements' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Featured Image", "advanced-posts-listing"),
    initialOpen: false
  }, selectedLayout !== 'slider-layout' && selectedLayout !== 'overlay-layout' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    checked: showImgToggler,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Display Featured Image", "advanced-posts-listing"),
    onChange: () => setAttributes({
      showImgToggler: !showImgToggler
    })
  }), showImgToggler && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    style: {
      display: "flex",
      gap: "10px"
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalNumberControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Width", "advanced-posts-listing"),
    value: parseInt(valueForWidth ? widthPercentage : ImgWidth) // ParseInt to ensure numerical value
    ,
    max: getMaxHeightAndWidth(attributes.imageUrl) // ParseInt for max value
    ,
    onChange: handleWidthChange
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalNumberControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Height", "advanced-posts-listing"),
    value: parseInt(valueForWidth ? widthPercentage : height) // ParseInt to ensure numerical value
    ,
    max: getMaxHeightAndWidth(attributes.imageUrl) // ParseInt for max value
    ,
    onChange: handleHeightChange
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    style: {
      display: "flex",
      alignItems: "center"
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalToggleGroupControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("IMAGE SIZE (%)", "advanced-posts-listing"),
    value: toggleGroupControlState === true ? "justify" : alignment,
    style: {
      width: "230px"
    },
    onChange: handleAlignmentChange,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Select the image size as a percentage.", "advanced-posts-listing")
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalToggleGroupControlOption, {
    value: "left",
    label: "25%"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalToggleGroupControlOption, {
    value: "center",
    label: "50%"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalToggleGroupControlOption, {
    value: "right",
    label: "75%"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalToggleGroupControlOption, {
    value: "justify",
    label: "100%"
  }))))))), activeTab === 'Elements' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Buttons", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    checked: showReadMoreToggler,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Enable Custom Styling", "advanced-posts-listing"),
    onChange: () => setAttributes({
      showReadMoreToggler: !showReadMoreToggler
    })
  }), showReadMoreToggler && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "Read-more-Text "
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Text Color:", "advanced-posts-listing")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ColorPalette, {
    value: ReadMoreTextColor,
    onChange: newColor => {
      setAttributes({
        ReadMoreTextColor: newColor
      });
    }
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    className: "Read-more-Text "
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Background Color:", "advanced-posts-listing")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ColorPalette, {
    value: ReadMoreBgColor,
    onChange: newColor => {
      setAttributes({
        ReadMoreBgColor: newColor
      });
    }
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Top-Bottom Padding", "advanced-posts-listing"),
    value: parseInt(button_Top_bottom_Padding),
    onChange: value => {
      const updatedTopBottom = `${value}px`;
      setAttributes({
        button_Top_bottom_Padding: updatedTopBottom
      });
    }
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.RangeControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Left-Right Padding", "advanced-posts-listing"),
    value: parseInt(button_Right_Left_Padding),
    onChange: value => {
      const updatedRightLeft = `${value}px`;
      setAttributes({
        button_Right_Left_Padding: updatedRightLeft
      });
    }
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(" Font Size ", "advanced-posts-listing"),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Specify the font size using px, em, or rem (e.g., 15px, 20rem, 25em).", "advanced-posts-listing"),
    __nextHasNoMarginBottom: true,
    value: Read_more_font_size,
    onChange: value => {
      setAttributes({
        Read_more_font_size: value
      });
    }
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)(" Update Button label ", "advanced-posts-listing"),
    __nextHasNoMarginBottom: true,
    value: ReadMoreText,
    onChange: value => {
      setAttributes({
        ReadMoreText: value
      });
    }
  }))), activeTab === 'General' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Posts Sorting", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("SORT BY", "advanced-posts-listing"),
    options: [{
      label: "Newest To Oldest",
      value: "new-to-old"
    }, {
      label: "Oldest To Newest",
      value: "old-to-new"
    }, {
      label: "A - Z",
      value: "A-Z"
    }, {
      label: "Z - A",
      value: "Z-A"
    }],
    value: sortBy,
    onChange: handleSort
  })))), activeTab === 'General' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Include & Exclude Posts", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("INCLUDE POSTS", "advanced-posts-listing"),
    value: commaSeparatedIds,
    onChange: handleIncludePosts,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Enter the comma seperated ids of posts Ex: 23,45,16 to be included. Only these will be displayed.", "advanced-posts-listing")
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("EXCLUDE POSTS", "advanced-posts-listing"),
    value: RemoveCommaSeparatedIds.join(','),
    onChange: handleExcludePosts,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Enter the comma seperated ids of posts to be excluded from result set Ex: 23,45", "advanced-posts-listing")
  }))), activeTab === 'General' && selectedLayout !== 'slider-layout' && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody, {
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Pagination Settings", "advanced-posts-listing"),
    initialOpen: false
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToggleControl, {
    checked: !!PaginationOnToggler,
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Turn on pagination", "advanced-posts-listing"),
    onChange: () => setAttributes({
      PaginationOnToggler: !PaginationOnToggler
    })
  }), PaginationOnToggler && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Add Prev Label", "advanced-posts-listing"),
    value: prevName,
    onChange: value => setAttributes({
      prevName: value
    }),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Text for the previous page button.", "advanced-posts-listing")
  }), PaginationOnToggler && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Add Next Label", "advanced-posts-listing"),
    value: nextName,
    onChange: value => setAttributes({
      nextName: value
    }),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Text for the next page button.", "advanced-posts-listing")
  }), PaginationOnToggler && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    style: {
      display: "flex",
      alignItems: "center"
    }
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalToggleGroupControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Pagination Alignment", "advanced-posts-listing"),
    value: paginationAline,
    style: {
      width: "230px"
    },
    onChange: alinePagination,
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__.__)("Select the alignment for pagination controls.", "advanced-posts-listing")
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalToggleGroupControlOption, {
    value: "left",
    label: "Left"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalToggleGroupControlOption, {
    value: "center",
    label: "Center"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalToggleGroupControlOption, {
    value: "right",
    label: "Right"
  })))))));
}

/***/ }),

/***/ "./src/hooks/useCptNamesAndPostsByName.js":
/*!************************************************!*\
  !*** ./src/hooks/useCptNamesAndPostsByName.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

const useCptNamesAndPostsByName = ({
  attributes,
  setAttributes
}) => {
  const {
    updatedCptIds,
    customTaxonomyPosts,
    selectedCustomPostType,
    commaSeparatedIds,
    RemoveCommaSeparatedIds,
    selectedLayout
  } = attributes;
  const [currentSelectedCpt, setCurrentSelectedCpt] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)("");
  const [data, setData] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)([]);
  const [restUrl] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(aplb_server_data?.rest_url);
  const [isLoading, setIsLoading] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [customPostsOptionsResponse, setCustomPostsOptionsResponse] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)([]);
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    if (commaSeparatedIds.length === 0 && updatedCptIds.length === 0) {
      fetchPostsBySelectedCustomPostsType();
    }
  }, [selectedCustomPostType, updatedCptIds, commaSeparatedIds, RemoveCommaSeparatedIds]);

  //Show Cpt-List on load:
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    fetchCptList();
  }, []);

  // Change SelectedOption from selectBox:
  const handleSelectedCustomPostType = value => {
    setCurrentSelectedCpt(value);
    // Create a copy of customTaxonomyPosts attribute
    const updatedCustomTaxonomyPosts = {
      ...customTaxonomyPosts
    };

    // Remove properties related to taxonomy types
    Object.keys(updatedCustomTaxonomyPosts).forEach(item => {
      delete updatedCustomTaxonomyPosts[item];
    });

    // Update the selected custom post type attribute
    setAttributes({
      ...attributes,
      selectedCustomPostType: value,
      customTaxonomyPosts: updatedCustomTaxonomyPosts,
      updatedCptIds: [] // Set updatedCptIds to an empty array
    });
  };
  const fetchCptList = async () => {
    try {
      const response = await fetch(`${restUrl}wpppro/v1/list-cpt`);
      const customPostsOptionsResponce = await response.json();
      setCustomPostsOptionsResponse(customPostsOptionsResponce);
      // setAttributes({ ...attributes, customPostsOptions: customPostsOptionsResponce });
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };
  const fetchPostsBySelectedCustomPostsType = async () => {
    setIsLoading(true); // Set loading to true when starting fetch
    try {
      let post_type = selectedCustomPostType.toLowerCase();
      const separator = restUrl.includes('?') ? '&' : '?';
      let query = `${restUrl}wp/v2/${post_type}${separator}per_page=100`;
      const response = await fetch(query);
      if (!response.ok) {
        throw new Error(`Failed to fetch data (${response.status} ${response.statusText})`);
      }
      const responseData = await response.json();

      // Ensure responseData is always an array
      const allPostsResponse = Array.isArray(responseData) ? responseData : [responseData];
      if (selectedCustomPostType) {
        setData(allPostsResponse);
      }
    } catch (error) {
      console.error("Error fetching data:", error);
    } finally {
      setIsLoading(false); // Set loading to false once fetch is complete
    }
  };

  //Fetch taxonomy-Posts-Ids by name with dynamic pagination starting from page 1
  const fetchCustomTaxonomyIdsBytermName = async (term, taxonomyType) => {
    const customTaxonomyPosts = "customTaxonomyPosts";
    const perPage = 100; // Define the number of items per page
    let page = 1; // Initialize page number to 1
    let termIds = []; // Initialize an array to hold all token IDs
    const separator = restUrl.includes('?') ? '&' : '?';
    try {
      // Fetch data for the first page
      while (true) {
        const response = await fetch(`${restUrl}wp/v2/${taxonomyType}${separator}page=${page}&per_page=${perPage}`);
        if (!response.ok) {
          throw new Error("Failed to fetch custom taxonomies");
        }
        const responseData = await response.json();

        // Iterate over the response data to find matching term
        for (const TermName of term) {
          const matchedTermName = responseData.find(data => data.name === TermName);
          if (matchedTermName) {
            termIds.push(matchedTermName.id); // Push each token ID to the array
            // setUpdatedIdsState(false);
          } else {
            return; // Return here to stop further execution
          }
        }

        // If termIds are found or there's no more data, exit the loop
        if (termIds.length > 0 || responseData.length < perPage) {
          break;
        }

        // Increment the page number for the next iteration
        page++;
      }

      // Construct the updated ids array with new IDs and taxonomyType
      const updatedIds = updatedCptIds?.filter(item => item.taxonomyType !== taxonomyType); // Remove existing IDs for the same taxonomyType  

      termIds.forEach(tokenId => {
        updatedIds.push({
          ids: tokenId,
          taxonomyType
        });
      });
      // Update the custom taxonomy posts attribute
      const Cpt = {
        ...attributes[customTaxonomyPosts],
        [taxonomyType]: term
      };
      setAttributes({
        ...attributes,
        [customTaxonomyPosts]: Cpt,
        updatedCptIds: updatedIds
      });
    } catch (error) {
      console.error("Error fetching custom taxonomy data:", error);
    }
  };
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    if (commaSeparatedIds.length === 0) {
      fetchCustomTaxonomyPostsByIds(updatedCptIds);
    }
  }, [updatedCptIds, commaSeparatedIds, RemoveCommaSeparatedIds]);
  const fetchCustomTaxonomyPostsByIds = async updatedCptIds => {
    try {
      const uniquePostIds = new Set();

      // Fetch posts for all IDs concurrently
      const fetchPromises = updatedCptIds.map(async ({
        ids: termIds,
        taxonomyType
      }) => {
        let post_type = selectedCustomPostType.toLowerCase();
        const response = await fetch(`${restUrl}wp/v2/${post_type}?${taxonomyType}=${termIds}`);
        if (!response.ok) {
          throw new Error(`Failed to fetch posts for IDs: ${termIdsArray.join(",")}`);
        }
        const responseData = await response.json();

        // Filter out posts that are already fetched
        const uniquePosts = responseData.filter(post => !uniquePostIds.has(post.id));

        // Add the IDs of newly fetched posts to the set
        uniquePosts.forEach(post => uniquePostIds.add(post.id));
        return uniquePosts;
      });

      // Wait for all fetch requests to complete
      const responseDataArray = await Promise.all(fetchPromises);

      // Merge all fetched data into a single array
      const mergedData = responseDataArray.reduce((acc, data) => acc.concat(data), []);

      // Filter the merged data to include only posts that match all term
      const filteredData = mergedData.filter(post => {
        // Check if the post contains all selected custom taxonomies
        const customTaxonomiesMatch = updatedCptIds.every(({
          taxonomyType,
          ids
        }) => {
          // Ensure post[taxonomyType] is defined before accessing the includes method
          return post[taxonomyType] && post[taxonomyType].includes(ids);
        });
        // Return true if all custom taxonomies match
        return customTaxonomiesMatch;
      });

      // Compare filteredData with current data using JSON.stringify
      if (JSON.stringify(filteredData) !== JSON.stringify(data)) {
        if (filteredData.length > 0) {
          setData(filteredData); // Update state if filteredData is different
        } else {
          setData([]); // Clear data if filteredData is empty
        }
      }
    } catch (error) {
      console.error("Error fetching posts by custom taxonomy:", error);
    }
  };
  const fetchPostsByIds = async () => {
    try {
      // const apiUrl = `${restUrl}wp/v2/posts?include=${commaSeparatedIds}`;
      const apiUrl = `${restUrl}wpppro/v1/get-post-by-id?id=${commaSeparatedIds}`;
      const response = await fetch(apiUrl);
      const jsonData = await response.json();

      // Compare the fetched data with the current data using JSON.stringify
      if (JSON.stringify(jsonData) !== JSON.stringify(data)) {
        setData(jsonData); // Update state with the fetched data if it has changed
      }
    } catch (error) {
      console.error('Error fetching posts by IDs:', error);
    }
  };
  return {
    isLoading,
    data,
    setData,
    fetchCptList,
    fetchCustomTaxonomyIdsBytermName,
    handleSelectedCustomPostType,
    fetchPostsBySelectedCustomPostsType,
    fetchPostsByIds,
    currentSelectedCpt,
    customPostsOptionsResponse
  };
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (useCptNamesAndPostsByName);

/***/ }),

/***/ "./src/hooks/useFeaturedImage.js":
/*!***************************************!*\
  !*** ./src/hooks/useFeaturedImage.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

const useFeaturedImage = ({
  attributes,
  setAttributes
}) => {
  const [valueForWidth, setValueForWidth] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [toggleGroupControlState, settoggleGroupControlState] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [widthController, setWidthController] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [alignment, setAlignment] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const handleResolutionChange = selectedResolution => {
    settoggleGroupControlState(true);
    // Set ImgWidth based on selected resolution
    let newWidth;
    let newHeight;
    switch (selectedResolution) {
      case "thumbnail":
        newWidth = 150;
        newHeight = 150;
        break;
      case "medium":
        newWidth = 300;
        newHeight = 300;
        break;
      case "large":
        newWidth = 1024;
        newHeight = 1024;
        break;
      default:
        newWidth = attributes?.ImgWidth;
        newHeight = attributes?.height;
        break;
    }

    // Convert to strings with "px" appended for CSS properties
    const widthString = `${newWidth}px`;
    const heightString = `${newHeight}px`;
    setValueForWidth(false);
    setWidthController(false);
    setAttributes({
      ...attributes,
      ImgWidth: widthString,
      height: heightString,
      imageUrl: selectedResolution,
      valueForWidth: false,
      selectedImageTogggler: true,
      widthPercentageState: false,
      widthController: false
    });
  };

  // Function to handle width change
  const handleWidthChange = newWidth => {
    setValueForWidth(false);
    setWidthController(true);
    const updatedWidth = `${newWidth}px`;
    setAttributes({
      ...attributes,
      ImgWidth: updatedWidth,
      valueForWidth: valueForWidth,
      selectedImageTogggler: false,
      widthPercentageState: false,
      widthController: true
    });
  };

  // Function to handle height change
  const handleHeightChange = newHeight => {
    setValueForWidth(false);
    settoggleGroupControlState(false);
    setWidthController(true);
    const updatedHeight = `${newHeight}px`;
    setAttributes({
      ...attributes,
      height: updatedHeight,
      valueForWidth: valueForWidth,
      selectedImageTogggler: false,
      widthPercentageState: false,
      widthController: true
    });
  };
  const handleAlignmentChange = alignment => {
    setAlignment(alignment);
    let widthPercentage;
    const imgWidth = getImageWidth(attributes.imageUrl); // Get the appropriate width based on the imageUrl
    switch (alignment) {
      case "left":
        widthPercentage = imgWidth * 0.25 + "px"; // 25% of the image width
        break;
      case "center":
        widthPercentage = imgWidth * 0.5 + "px"; // 50% of the image width
        break;
      case "right":
        widthPercentage = imgWidth * 0.75 + "px"; // 75% of the image width
        break;
      case "justify":
        widthPercentage = imgWidth + "px"; // 100% of the image width
        break;
      default:
        widthPercentage = imgWidth + "px"; // Default to 100% of the image width
        break;
    }
    settoggleGroupControlState(false);
    setValueForWidth(true);
    setWidthController(false);
    setAttributes({
      ...attributes,
      widthPercentage: widthPercentage,
      valueForWidth: true,
      selectedImageTogggler: false,
      widthPercentageState: true,
      widthController: false
    });
  };
  const getImageWidth = imageUrl => {
    switch (imageUrl) {
      case "thumbnail":
        return 150;
      // Thumbnail width
      case "medium":
        return 300;
      // Medium width
      case "large":
        return 1024;
      // Large width
      default:
        return 1024;
      // Default to large width if imageUrl is not recognized
    }
  };
  const getMaxHeightAndWidth = imageUrl => {
    switch (imageUrl) {
      case "thumbnail":
        return 150;
      case "medium":
        return 300;
      case "large":
        return 1024;
      default:
        return 1024;
      // Default max value
    }
  };
  return {
    getMaxHeightAndWidth,
    handleAlignmentChange,
    handleWidthChange,
    handleResolutionChange,
    handleHeightChange,
    toggleGroupControlState,
    widthController,
    alignment
  };
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (useFeaturedImage);

/***/ }),

/***/ "./src/hooks/useSortedData.js":
/*!************************************!*\
  !*** ./src/hooks/useSortedData.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);

const useSortedData = (data, sortBy, setData) => {
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    const sortData = (data, sortBy) => {
      if (!Array.isArray(data)) {
        console.error("data is not an array");
        return [];
      }
      const sortedData = [...data];
      if (sortBy === "new-to-old") {
        sortedData.sort((a, b) => new Date(b.date) - new Date(a.date));
      } else if (sortBy === "old-to-new") {
        sortedData.sort((a, b) => new Date(a.date) - new Date(b.date));
      } else if (sortBy === "A-Z") {
        sortedData.sort((a, b) => {
          const titleA = a.title.rendered ? a.title.rendered.toLowerCase() : '';
          const titleB = b.title.rendered ? b.title.rendered.toLowerCase() : '';
          return titleA.localeCompare(titleB);
        });
      } else if (sortBy === "Z-A") {
        sortedData.sort((a, b) => {
          const titleA = a.title.rendered ? a.title.rendered.toLowerCase() : '';
          const titleB = b.title.rendered ? b.title.rendered.toLowerCase() : '';
          return titleB.localeCompare(titleA);
        });
      }
      return sortedData;
    };
    const newSortedData = sortData(data, sortBy);

    // Compare newSortedData with the current data using JSON.stringify
    if (JSON.stringify(newSortedData) !== JSON.stringify(data)) {
      setData(newSortedData); // Update state if newSortedData is different
    }
  }, [data, sortBy, setData]);
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (useSortedData);

/***/ }),

/***/ "./src/layouts/Masanory/MasanoryLayout.jsx":
/*!*************************************************!*\
  !*** ./src/layouts/Masanory/MasanoryLayout.jsx ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _MasanoryLayoutmodule_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./MasanoryLayoutmodule.css */ "./src/layouts/Masanory/MasanoryLayoutmodule.css");



const MasanoryLayout = ({
  paginatedData,
  numPostsToShow,
  showImgToggler,
  showPostTitle,
  showMeta,
  showContent,
  contentType,
  truncateContent,
  wordsLimit,
  imageUrl,
  valueForWidth,
  widthPercentage,
  widthController,
  ImgWidth,
  height,
  columnGap,
  rowGap,
  totalColoms,
  ReadMoreBgColor,
  showReadMoreToggler,
  ReadMoreTextColor,
  button_Right_Left_Padding,
  button_Top_bottom_Padding,
  title_font_size,
  Meta_font_size,
  Content_font_size,
  Read_more_font_size,
  customCSS,
  __,
  // Placeholder for translation function
  Content_Manage_styling,
  title_Manage_styling,
  Meta_Manage_styling,
  ReadMoreText
}) => {
  const [columnCount, setColumnCount] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(1);
  const updateColumnCount = () => {
    const width = window.innerWidth;
    let columns = totalColoms || 1;
    if (width <= 575) {
      columns = 1; // Mobile screens
    } else if (width >= 576 && width < 992) {
      columns = 2; // Small screens
    } else if (width >= 992 && width < 1200) {
      columns = totalColoms || 3; // Medium screens
    } else if (width >= 1200) {
      columns = totalColoms || 4; // Large screens
    }
    setColumnCount(columns);
  };
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    updateColumnCount(); // Set initial column count
    window.addEventListener('resize', updateColumnCount); // Update column count on resize

    return () => {
      window.removeEventListener('resize', updateColumnCount); // Clean up the event listener
    };
  }, [totalColoms]);
  const masonry = paginatedData.slice(0, numPostsToShow);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "masonry-layout",
    style: {
      columnGap: columnGap || '20px',
      // Inline column gap with default value

      columnCount: columnCount
    }
  }, customCSS && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", null, customCSS), masonry.map(item => {
    const formattedDate = new Date(item?.date).toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric"
    });
    let featuredImgExist = false;
    if (item.hasOwnProperty("featured_image_url")) {
      const featuredImageUrlObj = item.featured_image_url;
      if (featuredImageUrlObj && typeof featuredImageUrlObj === "object" && Object.keys(featuredImageUrlObj).length > 0) {
        featuredImgExist = true;
      }
    }
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      key: item.id,
      className: "post-container",
      style: {
        marginBottom: rowGap || '20px' // Inline column gap with default value
      }
    }, showImgToggler && item?.featured_image_url && featuredImgExist && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "image-container"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      className: "block-image",
      src: item.featured_image_url[imageUrl],
      style: {
        ...(valueForWidth ? {
          maxWidth: widthPercentage,
          maxHeight: widthPercentage
        } : {
          maxWidth: widthController === true ? ImgWidth : '',
          maxHeight: widthController === true ? height : ''
        })
      }
    }), item.assigned_categories && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      className: "category-tag",
      style: {
        position: 'absolute',
        bottom: '10px',
        left: '10px',
        backgroundColor: 'rgba(0, 0, 0, 0.5)',
        color: 'white',
        padding: '5px 10px',
        borderRadius: '4px'
      }
    }, item.assigned_categories)), showPostTitle && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "post-title",
      style: {
        ...(title_Manage_styling && {
          fontSize: title_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      className: "title",
      href: item.link,
      dangerouslySetInnerHTML: {
        __html: item?.title.rendered
      }
    })), showMeta && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "meta-data",
      style: {
        ...(Meta_Manage_styling && {
          fontSize: Meta_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, formattedDate && `${formattedDate} `, item.post_author && `| Author: ${item.post_author} `, item.assigned_categories && `| Categories: ${item.assigned_categories} `)), showContent && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      style: {
        ...(Content_Manage_styling && {
          fontSize: Content_font_size
        })
      },
      className: "post-content",
      dangerouslySetInnerHTML: {
        __html: contentType === "Full-Post" ? item?.content?.rendered : !item?.excerpt?.rendered ? truncateContent(item?.content?.rendered, wordsLimit) : truncateContent(item?.excerpt?.rendered, wordsLimit)
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "read-more-btn"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: item.link,
      target: "_blank",
      className: "read-more-button",
      style: {
        ...(showReadMoreToggler && {
          backgroundColor: ReadMoreBgColor,
          color: ReadMoreTextColor,
          padding: `${button_Top_bottom_Padding} ${button_Right_Left_Padding}`,
          fontSize: Read_more_font_size
        })
      }
    }, __(ReadMoreText, "advanced-posts-listing"))));
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MasanoryLayout);

/***/ }),

/***/ "./src/layouts/Overlay/OverlayLayout.jsx":
/*!***********************************************!*\
  !*** ./src/layouts/Overlay/OverlayLayout.jsx ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _OverlayLayout_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./OverlayLayout.css */ "./src/layouts/Overlay/OverlayLayout.css");



const OverlayLayout = ({
  paginatedData,
  numPostsToShow,
  showImgToggler,
  showPostTitle,
  showMeta,
  showContent,
  contentType,
  truncateContent,
  wordsLimit,
  imageUrl,
  valueForWidth,
  widthPercentage,
  widthController,
  ImgWidth,
  height,
  columnGap,
  rowGap,
  totalColoms,
  ReadMoreBgColor,
  showReadMoreToggler,
  ReadMoreTextColor,
  button_Top_bottom_Padding,
  button_Right_Left_Padding,
  __,
  // Placeholder for translation function
  title_font_size,
  Meta_font_size,
  Content_font_size,
  Read_more_font_size,
  customCSS,
  Content_Manage_styling,
  title_Manage_styling,
  Meta_Manage_styling,
  ReadMoreText
}) => {
  const overlayData = paginatedData.slice(0, numPostsToShow);

  // Function to calculate column width based on window width
  const getOverlayTemplateColumns = totalColoms => {
    const widthh = window.innerWidth;
    if (widthh >= 992 && widthh < 1200) {
      return `calc(${100 / totalColoms}% - 20px)`;
    } else if (widthh >= 1200) {
      return `calc(${100 / totalColoms}% - 20px)`;
    } else {
      return '100%'; // Fallback for smaller screens
    }
  };

  // State to manage overlay columns
  const [overlayColumns, setOverlayColumns] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(getOverlayTemplateColumns(totalColoms));
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    const handleResize = () => {
      setOverlayColumns(getOverlayTemplateColumns(totalColoms));
    };
    window.addEventListener('resize', handleResize);
    // Initial setting
    setOverlayColumns(getOverlayTemplateColumns(totalColoms));
    return () => {
      window.removeEventListener('resize', handleResize);
    };
  }, [totalColoms]);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "overlay-layout",
    style: {
      columnGap: columnGap || '20px',
      rowGap: rowGap || '20px'
    }
  }, customCSS && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", null, customCSS), overlayData.map(item => {
    const formattedDate = new Date(item?.date).toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric"
    });
    let featuredImgExist = false;
    if (item.hasOwnProperty("featured_image_url")) {
      const featuredImageUrlObj = item.featured_image_url;
      if (featuredImageUrlObj && typeof featuredImageUrlObj === "object" && Object.keys(featuredImageUrlObj).length > 0) {
        featuredImgExist = true;
      }
    }
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      key: item.id,
      className: "post-container",
      style: {
        width: overlayColumns
      }
    }, showImgToggler && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "image-container",
      style: {
        backgroundImage: `url(${item.featured_image_url[imageUrl]})`,
        ...(valueForWidth ? {
          maxWidth: widthPercentage,
          maxHeight: widthPercentage
        } : {
          maxWidth: widthController === true ? ImgWidth : '',
          maxHeight: widthController === true ? height : ''
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "overlay"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "overlay-content"
    }, showPostTitle && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "post-title",
      style: {
        ...(title_Manage_styling && {
          fontSize: title_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      className: "title",
      href: item.link,
      dangerouslySetInnerHTML: {
        __html: item?.title.rendered
      }
    })), showMeta && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "meta-data",
      style: {
        ...(Meta_Manage_styling && {
          fontSize: Meta_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, formattedDate && `${formattedDate} `, item.post_author && `| Author: ${item.post_author} `, item.assigned_categories && `| Categories: ${item.assigned_categories} `)), showContent && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      style: {
        ...(Content_Manage_styling && {
          fontSize: Content_font_size
        })
      },
      className: "post-content",
      dangerouslySetInnerHTML: {
        __html: contentType === "Full-Post" ? item?.content?.rendered : !item?.excerpt?.rendered ? truncateContent(item?.content?.rendered, wordsLimit) : truncateContent(item?.excerpt?.rendered, wordsLimit)
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "read-more-btn"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: item.link,
      target: "_blank",
      className: "read-more-button",
      style: {
        ...(showReadMoreToggler && {
          backgroundColor: ReadMoreBgColor,
          color: ReadMoreTextColor,
          padding: `${button_Top_bottom_Padding} ${button_Right_Left_Padding}`,
          fontSize: Read_more_font_size
        })
      }
    }, __(ReadMoreText, "advanced-posts-listing")))))));
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (OverlayLayout);

/***/ }),

/***/ "./src/layouts/Slider/Slider.jsx":
/*!***************************************!*\
  !*** ./src/layouts/Slider/Slider.jsx ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Slidermodule_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Slidermodule.css */ "./src/layouts/Slider/Slidermodule.css");



const Slider = ({
  paginatedData,
  numPostsToShow,
  showImgToggler,
  showPostTitle,
  showMeta,
  showContent,
  contentType,
  truncateContent,
  wordsLimit,
  imageUrl,
  valueForWidth,
  widthPercentage,
  widthController,
  ImgWidth,
  height,
  ReadMoreBgColor,
  showReadMoreToggler,
  ReadMoreTextColor,
  button_Top_bottom_Padding,
  button_Right_Left_Padding,
  title_font_size,
  Meta_font_size,
  Content_font_size,
  Read_more_font_size,
  customCSS,
  __,
  Content_Manage_styling,
  title_Manage_styling,
  Meta_Manage_styling,
  ReadMoreText
}) => {
  const [currentIndex, setCurrentIndex] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(0);
  const slides = paginatedData.slice(0, numPostsToShow);
  const nextSlide = () => {
    setCurrentIndex(prevIndex => (prevIndex + 1) % slides.length);
  };
  const prevSlide = () => {
    setCurrentIndex(prevIndex => (prevIndex - 1 + slides.length) % slides.length);
  };
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    const interval = setInterval(() => {
      setCurrentIndex(prevIndex => (prevIndex + 1) % slides.length);
    }, 3000); // Change slide every 3 seconds

    return () => clearInterval(interval);
  }, [slides.length]);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "slider-container"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "slider"
  }, customCSS && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", null, customCSS), slides.map((item, index) => {
    const formattedDate = new Date(item?.date).toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric"
    });
    const featuredImgExist = item.featured_image_url && typeof item.featured_image_url === "object" && Object.keys(item.featured_image_url).length > 0;
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      key: item.id,
      className: `slide ${index === currentIndex ? 'active' : ''}`,
      style: {
        display: index === currentIndex ? 'block' : 'none'
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "post-container"
    }, showImgToggler && item.featured_image_url && featuredImgExist && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "image-container"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      className: "block-image",
      src: item.featured_image_url[imageUrl],
      style: {
        ...(valueForWidth ? {
          maxWidth: widthPercentage,
          maxHeight: widthPercentage
        } : {
          maxWidth: widthController ? ImgWidth : '',
          maxHeight: widthController ? height : ''
        })
      },
      alt: item.title.rendered // Added alt text for accessibility
    })), showPostTitle && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "post-title",
      style: {
        ...(title_Manage_styling && {
          fontSize: title_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      className: "title",
      href: item.link,
      dangerouslySetInnerHTML: {
        __html: item.title.rendered
      }
    })), showMeta && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "meta-data",
      style: {
        ...(Meta_Manage_styling && {
          fontSize: Meta_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, formattedDate && `${formattedDate} `, item.post_author && `| Author: ${item.post_author} `, item.assigned_categories && `| Categories: ${item.assigned_categories} `)), showContent && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "post-content",
      style: {
        ...(Content_Manage_styling && {
          fontSize: Content_font_size
        })
      },
      dangerouslySetInnerHTML: {
        __html: contentType === "Full-Post" ? item.content.rendered : !item.excerpt?.rendered ? truncateContent(item.content.rendered, wordsLimit) : truncateContent(item.excerpt.rendered, wordsLimit)
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "read-more-btn"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: item.link,
      target: "_blank",
      className: "read-more-button",
      style: {
        ...(showReadMoreToggler && {
          backgroundColor: ReadMoreBgColor,
          color: ReadMoreTextColor,
          padding: `${button_Top_bottom_Padding} ${button_Right_Left_Padding}`,
          fontSize: Read_more_font_size
        })
      }
    }, __(ReadMoreText, "advanced-posts-listing")))));
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "slider-button prev",
    onClick: prevSlide
  }, "\u276E"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "slider-button next",
    onClick: nextSlide
  }, "\u276F")));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Slider);

/***/ }),

/***/ "./src/layouts/grid/Grid.jsx":
/*!***********************************!*\
  !*** ./src/layouts/grid/Grid.jsx ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Gridmodule_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Gridmodule.css */ "./src/layouts/grid/Gridmodule.css");



const GridLayout = ({
  paginatedData,
  numPostsToShow,
  showImgToggler,
  showPostTitle,
  showMeta,
  showContent,
  contentType,
  truncateContent,
  wordsLimit,
  imageUrl,
  valueForWidth,
  widthPercentage,
  widthController,
  ImgWidth,
  height,
  columnGap,
  rowGap,
  totalColoms,
  ReadMoreBgColor,
  showReadMoreToggler,
  ReadMoreTextColor,
  button_Top_bottom_Padding,
  button_Right_Left_Padding,
  title_font_size,
  Meta_font_size,
  Content_font_size,
  Read_more_font_size,
  __,
  customCSS,
  title_Manage_styling,
  Content_Manage_styling,
  ReadMoreText,
  Meta_Manage_styling
}) => {
  const GridItems = paginatedData.slice(0, numPostsToShow);
  const getGridTemplateColumns = totalColoms => {
    const width = window.innerWidth;
    if (width >= 992 && width < 1200) {
      return `repeat(${totalColoms || 1}, 1fr)`;
    } else if (width >= 1200) {
      return `repeat(${totalColoms || 1}, 1fr)`;
    }
  };
  const [gridColumns, setGridColumns] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(getGridTemplateColumns());
  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    const handleResize = () => {
      setGridColumns(getGridTemplateColumns(totalColoms));
    };
    window.addEventListener('resize', handleResize);
    setGridColumns(getGridTemplateColumns(totalColoms));
    return () => {
      window.removeEventListener('resize', handleResize);
    };
  }, [totalColoms]);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "grid-layout",
    style: {
      columnGap: columnGap || '20px',
      rowGap: rowGap || '20px',
      gridTemplateColumns: gridColumns
    }
  }, customCSS && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", null, customCSS), GridItems.map(item => {
    const formattedDate = new Date(item?.date).toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric"
    });
    let featuredImgExist = false;
    if (item.hasOwnProperty("featured_image_url")) {
      const featuredImageUrlObj = item.featured_image_url;
      if (featuredImageUrlObj && typeof featuredImageUrlObj === "object" && Object.keys(featuredImageUrlObj).length > 0) {
        featuredImgExist = true;
      }
    }
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      key: item.id,
      className: "post-container"
    }, featuredImgExist && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "image-container"
    }, showImgToggler && item?.featured_image_url && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      className: "block-image",
      src: item.featured_image_url[imageUrl],
      style: {
        ...(valueForWidth ? {
          maxWidth: widthPercentage,
          maxHeight: widthPercentage
        } : {
          maxWidth: widthController === true ? ImgWidth : '',
          maxHeight: widthController === true ? height : ''
        })
      },
      alt: item.title.rendered // Added alt text for accessibility
    }), item.assigned_categories && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
      className: "category-tag",
      style: {
        position: 'absolute',
        bottom: '10px',
        left: '10px',
        backgroundColor: 'rgba(0, 0, 0, 0.5)',
        color: 'white',
        padding: '5px 10px',
        borderRadius: '4px'
      }
    }, item.assigned_categories))), showPostTitle && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "post-title",
      style: {
        ...(title_Manage_styling && {
          fontSize: title_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      className: "title",
      href: item.link,
      dangerouslySetInnerHTML: {
        __html: item?.title.rendered
      }
    })), showMeta && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "meta-data",
      style: {
        ...(Meta_Manage_styling && {
          fontSize: Meta_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, formattedDate && `${formattedDate} `, item.post_author && `| Author: ${item.post_author}`)), showContent && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      style: {
        ...(Content_Manage_styling && {
          fontSize: Content_font_size
        })
      },
      className: "post-content",
      dangerouslySetInnerHTML: {
        __html: contentType === "Full-Post" ? item?.content?.rendered : !item?.excerpt?.rendered ? truncateContent(item?.content?.rendered, wordsLimit) : truncateContent(item?.excerpt?.rendered, wordsLimit)
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "read-more-btn"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: item.link,
      target: "_blank",
      className: "read-more-button",
      style: {
        ...(showReadMoreToggler && {
          backgroundColor: ReadMoreBgColor,
          color: ReadMoreTextColor,
          padding: `${button_Top_bottom_Padding} ${button_Right_Left_Padding}`,
          fontSize: Read_more_font_size
        })
      }
    }, __(ReadMoreText, "advanced-posts-listing"))));
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (GridLayout);

/***/ }),

/***/ "./src/layouts/listing/ListingLayout.jsx":
/*!***********************************************!*\
  !*** ./src/layouts/listing/ListingLayout.jsx ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _ListingLayoutmodule_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ListingLayoutmodule.css */ "./src/layouts/listing/ListingLayoutmodule.css");


const ListingLayout = ({
  paginatedData,
  numPostsToShow,
  showImgToggler,
  showPostTitle,
  showMeta,
  showContent,
  contentType,
  truncateContent,
  wordsLimit,
  imageUrl,
  valueForWidth,
  widthPercentage,
  widthController,
  ImgWidth,
  height,
  rowGap,
  ReadMoreBgColor,
  showReadMoreToggler,
  ReadMoreTextColor,
  button_Top_bottom_Padding,
  button_Right_Left_Padding,
  title_font_size,
  Meta_font_size,
  Content_font_size,
  Read_more_font_size,
  customCSS,
  Content_Manage_styling,
  Meta_Manage_styling,
  title_Manage_styling,
  ReadMoreText,
  __ // Placeholder for translation function
}) => {
  const Listing = paginatedData.slice(0, numPostsToShow);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "listing-layout"
  }, customCSS && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("style", null, customCSS), Listing.map(item => {
    const formattedDate = new Date(item?.date).toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric"
    });
    let featuredImgExist = false;
    if (item.hasOwnProperty("featured_image_url")) {
      const featuredImageUrlObj = item.featured_image_url;
      if (featuredImageUrlObj && typeof featuredImageUrlObj === "object" && Object.keys(featuredImageUrlObj).length > 0) {
        featuredImgExist = true;
      }
    }
    return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      key: item.id,
      className: "post-container",
      style: {
        marginBottom: rowGap
      }
    }, showImgToggler && item?.featured_image_url && featuredImgExist && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "image-container"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      className: "block-image",
      src: item.featured_image_url[imageUrl],
      style: {
        ...(valueForWidth ? {
          maxWidth: widthPercentage,
          maxHeight: widthPercentage
        } : {
          maxWidth: widthController === true ? ImgWidth : '',
          maxHeight: widthController === true ? height : ''
        })
      },
      alt: item.title.rendered // Added alt text for accessibility
    })), showPostTitle && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "post-title",
      style: {
        ...(title_Manage_styling && {
          fontSize: title_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      className: "title",
      href: item.link,
      dangerouslySetInnerHTML: {
        __html: item?.title.rendered
      }
    })), showMeta && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "meta-data",
      style: {
        ...(Meta_Manage_styling && {
          fontSize: Meta_font_size
        })
      }
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, formattedDate && `${formattedDate} `, item.post_author && `| Author: ${item.post_author} `, item.assigned_categories && `| Categories: ${item.assigned_categories} `)), showContent && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      style: {
        ...(Content_Manage_styling && {
          fontSize: Content_font_size
        })
      },
      className: "post-content",
      dangerouslySetInnerHTML: {
        __html: contentType === "Full-Post" ? item?.content?.rendered : !item?.excerpt?.rendered ? truncateContent(item?.content?.rendered, wordsLimit) : truncateContent(item?.excerpt?.rendered, wordsLimit)
      }
    }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: "read-more-btn"
    }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
      href: item.link,
      target: "_blank",
      className: "read-more-button",
      style: {
        ...(showReadMoreToggler && {
          backgroundColor: ReadMoreBgColor,
          color: ReadMoreTextColor,
          padding: `${button_Top_bottom_Padding} ${button_Right_Left_Padding}`,
          fontSize: Read_more_font_size
        })
      }
    }, __(ReadMoreText, "advanced-posts-listing"))));
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ListingLayout);

/***/ }),

/***/ "./node_modules/bootstrap/dist/css/bootstrap.min.css":
/*!***********************************************************!*\
  !*** ./node_modules/bootstrap/dist/css/bootstrap.min.css ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/App.css":
/*!*********************!*\
  !*** ./src/App.css ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/layouts/Masanory/MasanoryLayoutmodule.css":
/*!*******************************************************!*\
  !*** ./src/layouts/Masanory/MasanoryLayoutmodule.css ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/layouts/Overlay/OverlayLayout.css":
/*!***********************************************!*\
  !*** ./src/layouts/Overlay/OverlayLayout.css ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/layouts/Slider/Slidermodule.css":
/*!*********************************************!*\
  !*** ./src/layouts/Slider/Slidermodule.css ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/layouts/grid/Gridmodule.css":
/*!*****************************************!*\
  !*** ./src/layouts/grid/Gridmodule.css ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/layouts/listing/ListingLayoutmodule.css":
/*!*****************************************************!*\
  !*** ./src/layouts/listing/ListingLayoutmodule.css ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./node_modules/react-bootstrap-pagination-control/dist/react-bootstrap-pagination-control.esm.js":
/*!********************************************************************************************************!*\
  !*** ./node_modules/react-bootstrap-pagination-control/dist/react-bootstrap-pagination-control.esm.js ***!
  \********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   PaginationControl: () => (/* binding */ PaginationControl)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_bootstrap__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-bootstrap */ "./node_modules/react-bootstrap/esm/Pagination.js");



var PaginationControl = function PaginationControl(_ref) {
  var _ref$page = _ref.page,
      page = _ref$page === void 0 ? 1 : _ref$page,
      _ref$between = _ref.between,
      between = _ref$between === void 0 ? 3 : _ref$between,
      total = _ref.total,
      limit = _ref.limit,
      _ref$changePage = _ref.changePage,
      changePage = _ref$changePage === void 0 ? function (page) {
    return console.log(page);
  } : _ref$changePage,
      _ref$next = _ref.next,
      next = _ref$next === void 0 ? true : _ref$next,
      _ref$last = _ref.last,
      last = _ref$last === void 0 ? false : _ref$last,
      _ref$ellipsis = _ref.ellipsis,
      ellipsis = _ref$ellipsis === void 0 ? 0 : _ref$ellipsis;
  var total_pages = Math.ceil(total / limit);
  between = between < 1 ? 1 : between;
  page = page < 1 ? 1 : page > total_pages ? total_pages : page;
  ellipsis = ellipsis < 1 ? 0 : ellipsis + 2 >= between ? between - 2 : ellipsis;
  var positions = Array.from({
    length: total_pages
  }, function (v, i) {
    return i;
  });
  var qtd_pages = between * 2 + 1;
  var range = total_pages <= qtd_pages // Show active without slice
  ? positions : page - 1 <= between // Show active in left
  ? positions.slice(0, qtd_pages - (ellipsis > 0 ? ellipsis + 1 : 0)) : page + between >= total_pages // Show active in right
  ? positions.slice(total_pages - qtd_pages + (ellipsis > 0 ? ellipsis + 1 : 0), total_pages) // Show active in middle
  : positions.slice(page - 1 - (between - (ellipsis > 0 ? ellipsis + 1 : 0)), page + (between - (ellipsis > 0 ? ellipsis + 1 : 0)));
  return total !== null && total > 0 ? react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"], {
    className: "justify-content-md-center"
  }, last && react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"].First, {
    onClick: function onClick() {
      return page > 1 ? changePage(1) : {};
    },
    disabled: page <= 1
  }), next && react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"].Prev, {
    onClick: function onClick() {
      return page > 1 ? changePage(page - 1) : {};
    },
    disabled: page <= 1
  }), total_pages > between * 2 + 1 && ellipsis > 0 && positions.slice(0, page - 1 <= between ? 0 : ellipsis).map(function (value) {
    return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"].Item, {
      key: value,
      onClick: function onClick() {
        return value !== page - 1 ? changePage(value + 1) : {};
      }
    }, value + 1);
  }), // Show ellipsis when "page" is bigger than "between"
  total_pages > between * 2 + 1 && ellipsis > 0 && page - 1 > between && react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"].Ellipsis, {
    disabled: true
  }), range.map(function (value) {
    return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"].Item, {
      active: value === page - 1,
      key: value,
      onClick: function onClick() {
        return value !== page - 1 ? changePage(value + 1) : {};
      }
    }, value + 1);
  }), // Show ellipsis when "page" is lower than "between"
  total_pages > between * 2 + 1 && ellipsis > 0 && page < total_pages - between && react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"].Ellipsis, {
    disabled: true
  }), total_pages > between * 2 + 1 && ellipsis > 0 && positions.slice(page >= total_pages - between ? total_pages : total_pages - ellipsis, total_pages).map(function (value) {
    return react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"].Item, {
      key: value,
      onClick: function onClick() {
        return value !== page - 1 ? changePage(value + 1) : {};
      }
    }, value + 1);
  }), next && react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"].Next, {
    onClick: function onClick() {
      return page < total_pages ? changePage(page + 1) : {};
    },
    disabled: page >= total_pages
  }), last && react__WEBPACK_IMPORTED_MODULE_0___default().createElement(react_bootstrap__WEBPACK_IMPORTED_MODULE_1__["default"].Last, {
    onClick: function onClick() {
      return page < total_pages ? changePage(total_pages) : {};
    },
    disabled: page >= total_pages
  })) : react__WEBPACK_IMPORTED_MODULE_0___default().createElement((react__WEBPACK_IMPORTED_MODULE_0___default().Fragment), null);
};


//# sourceMappingURL=react-bootstrap-pagination-control.esm.js.map


/***/ }),

/***/ "./node_modules/react-bootstrap/esm/PageItem.js":
/*!******************************************************!*\
  !*** ./node_modules/react-bootstrap/esm/PageItem.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   Ellipsis: () => (/* binding */ Ellipsis),
/* harmony export */   First: () => (/* binding */ First),
/* harmony export */   Last: () => (/* binding */ Last),
/* harmony export */   Next: () => (/* binding */ Next),
/* harmony export */   Prev: () => (/* binding */ Prev),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _restart_ui_Anchor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @restart/ui/Anchor */ "./node_modules/@restart/ui/esm/Anchor.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
/* eslint-disable react/no-multi-comp */





const PageItem = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.forwardRef(({
  active = false,
  disabled = false,
  className,
  style,
  activeLabel = '(current)',
  children,
  linkStyle,
  linkClassName,
  as = _restart_ui_Anchor__WEBPACK_IMPORTED_MODULE_3__["default"],
  ...props
}, ref) => {
  const Component = active || disabled ? 'span' : as;
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("li", {
    ref: ref,
    style: style,
    className: classnames__WEBPACK_IMPORTED_MODULE_0___default()(className, 'page-item', {
      active,
      disabled
    }),
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)(Component, {
      className: classnames__WEBPACK_IMPORTED_MODULE_0___default()('page-link', linkClassName),
      style: linkStyle,
      ...props,
      children: [children, active && activeLabel && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("span", {
        className: "visually-hidden",
        children: activeLabel
      })]
    })
  });
});
PageItem.displayName = 'PageItem';
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (PageItem);
function createButton(name, defaultValue, label = name) {
  const Button = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.forwardRef(({
    children,
    ...props
  }, ref) => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsxs)(PageItem, {
    ...props,
    ref: ref,
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("span", {
      "aria-hidden": "true",
      children: children || defaultValue
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("span", {
      className: "visually-hidden",
      children: label
    })]
  }));
  Button.displayName = name;
  return Button;
}
const First = createButton('First', '«');
const Prev = createButton('Prev', '‹', 'Previous');
const Ellipsis = createButton('Ellipsis', '…', 'More');
const Next = createButton('Next', '›');
const Last = createButton('Last', '»');

/***/ }),

/***/ "./node_modules/react-bootstrap/esm/Pagination.js":
/*!********************************************************!*\
  !*** ./node_modules/react-bootstrap/esm/Pagination.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _ThemeProvider__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./ThemeProvider */ "./node_modules/react-bootstrap/esm/ThemeProvider.js");
/* harmony import */ var _PageItem__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./PageItem */ "./node_modules/react-bootstrap/esm/PageItem.js");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
"use client";






const Pagination = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_1__.forwardRef(({
  bsPrefix,
  className,
  size,
  ...props
}, ref) => {
  const decoratedBsPrefix = (0,_ThemeProvider__WEBPACK_IMPORTED_MODULE_3__.useBootstrapPrefix)(bsPrefix, 'pagination');
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_2__.jsx)("ul", {
    ref: ref,
    ...props,
    className: classnames__WEBPACK_IMPORTED_MODULE_0___default()(className, decoratedBsPrefix, size && `${decoratedBsPrefix}-${size}`)
  });
});
Pagination.displayName = 'Pagination';
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Object.assign(Pagination, {
  First: _PageItem__WEBPACK_IMPORTED_MODULE_4__.First,
  Prev: _PageItem__WEBPACK_IMPORTED_MODULE_4__.Prev,
  Ellipsis: _PageItem__WEBPACK_IMPORTED_MODULE_4__.Ellipsis,
  Item: _PageItem__WEBPACK_IMPORTED_MODULE_4__["default"],
  Next: _PageItem__WEBPACK_IMPORTED_MODULE_4__.Next,
  Last: _PageItem__WEBPACK_IMPORTED_MODULE_4__.Last
}));

/***/ }),

/***/ "./node_modules/react-bootstrap/esm/ThemeProvider.js":
/*!***********************************************************!*\
  !*** ./node_modules/react-bootstrap/esm/ThemeProvider.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   DEFAULT_BREAKPOINTS: () => (/* binding */ DEFAULT_BREAKPOINTS),
/* harmony export */   DEFAULT_MIN_BREAKPOINT: () => (/* binding */ DEFAULT_MIN_BREAKPOINT),
/* harmony export */   ThemeConsumer: () => (/* binding */ Consumer),
/* harmony export */   createBootstrapComponent: () => (/* binding */ createBootstrapComponent),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   useBootstrapBreakpoints: () => (/* binding */ useBootstrapBreakpoints),
/* harmony export */   useBootstrapMinBreakpoint: () => (/* binding */ useBootstrapMinBreakpoint),
/* harmony export */   useBootstrapPrefix: () => (/* binding */ useBootstrapPrefix),
/* harmony export */   useIsRTL: () => (/* binding */ useIsRTL)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
"use client";




const DEFAULT_BREAKPOINTS = ['xxl', 'xl', 'lg', 'md', 'sm', 'xs'];
const DEFAULT_MIN_BREAKPOINT = 'xs';
const ThemeContext = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createContext({
  prefixes: {},
  breakpoints: DEFAULT_BREAKPOINTS,
  minBreakpoint: DEFAULT_MIN_BREAKPOINT
});
const {
  Consumer,
  Provider
} = ThemeContext;
function ThemeProvider({
  prefixes = {},
  breakpoints = DEFAULT_BREAKPOINTS,
  minBreakpoint = DEFAULT_MIN_BREAKPOINT,
  dir,
  children
}) {
  const contextValue = (0,react__WEBPACK_IMPORTED_MODULE_0__.useMemo)(() => ({
    prefixes: {
      ...prefixes
    },
    breakpoints,
    minBreakpoint,
    dir
  }), [prefixes, breakpoints, minBreakpoint, dir]);
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(Provider, {
    value: contextValue,
    children: children
  });
}
function useBootstrapPrefix(prefix, defaultPrefix) {
  const {
    prefixes
  } = (0,react__WEBPACK_IMPORTED_MODULE_0__.useContext)(ThemeContext);
  return prefix || prefixes[defaultPrefix] || defaultPrefix;
}
function useBootstrapBreakpoints() {
  const {
    breakpoints
  } = (0,react__WEBPACK_IMPORTED_MODULE_0__.useContext)(ThemeContext);
  return breakpoints;
}
function useBootstrapMinBreakpoint() {
  const {
    minBreakpoint
  } = (0,react__WEBPACK_IMPORTED_MODULE_0__.useContext)(ThemeContext);
  return minBreakpoint;
}
function useIsRTL() {
  const {
    dir
  } = (0,react__WEBPACK_IMPORTED_MODULE_0__.useContext)(ThemeContext);
  return dir === 'rtl';
}
function createBootstrapComponent(Component, opts) {
  if (typeof opts === 'string') opts = {
    prefix: opts
  };
  const isClassy = Component.prototype && Component.prototype.isReactComponent;
  // If it's a functional component make sure we don't break it with a ref
  const {
    prefix,
    forwardRefAs = isClassy ? 'ref' : 'innerRef'
  } = opts;
  const Wrapped = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.forwardRef(({
    ...props
  }, ref) => {
    props[forwardRefAs] = ref;
    const bsPrefix = useBootstrapPrefix(props.bsPrefix, prefix);
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(Component, {
      ...props,
      bsPrefix: bsPrefix
    });
  });
  Wrapped.displayName = `Bootstrap(${Component.displayName || Component.name})`;
  return Wrapped;
}

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ThemeProvider);

/***/ }),

/***/ "./node_modules/react/cjs/react-jsx-runtime.development.js":
/*!*****************************************************************!*\
  !*** ./node_modules/react/cjs/react-jsx-runtime.development.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, exports, __webpack_require__) => {

"use strict";
/**
 * @license React
 * react-jsx-runtime.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



if (true) {
  (function() {
'use strict';

var React = __webpack_require__(/*! react */ "react");

// ATTENTION
// When adding new symbols to this file,
// Please consider also adding to 'react-devtools-shared/src/backend/ReactSymbols'
// The Symbol used to tag the ReactElement-like types.
var REACT_ELEMENT_TYPE = Symbol.for('react.element');
var REACT_PORTAL_TYPE = Symbol.for('react.portal');
var REACT_FRAGMENT_TYPE = Symbol.for('react.fragment');
var REACT_STRICT_MODE_TYPE = Symbol.for('react.strict_mode');
var REACT_PROFILER_TYPE = Symbol.for('react.profiler');
var REACT_PROVIDER_TYPE = Symbol.for('react.provider');
var REACT_CONTEXT_TYPE = Symbol.for('react.context');
var REACT_FORWARD_REF_TYPE = Symbol.for('react.forward_ref');
var REACT_SUSPENSE_TYPE = Symbol.for('react.suspense');
var REACT_SUSPENSE_LIST_TYPE = Symbol.for('react.suspense_list');
var REACT_MEMO_TYPE = Symbol.for('react.memo');
var REACT_LAZY_TYPE = Symbol.for('react.lazy');
var REACT_OFFSCREEN_TYPE = Symbol.for('react.offscreen');
var MAYBE_ITERATOR_SYMBOL = Symbol.iterator;
var FAUX_ITERATOR_SYMBOL = '@@iterator';
function getIteratorFn(maybeIterable) {
  if (maybeIterable === null || typeof maybeIterable !== 'object') {
    return null;
  }

  var maybeIterator = MAYBE_ITERATOR_SYMBOL && maybeIterable[MAYBE_ITERATOR_SYMBOL] || maybeIterable[FAUX_ITERATOR_SYMBOL];

  if (typeof maybeIterator === 'function') {
    return maybeIterator;
  }

  return null;
}

var ReactSharedInternals = React.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED;

function error(format) {
  {
    {
      for (var _len2 = arguments.length, args = new Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {
        args[_key2 - 1] = arguments[_key2];
      }

      printWarning('error', format, args);
    }
  }
}

function printWarning(level, format, args) {
  // When changing this logic, you might want to also
  // update consoleWithStackDev.www.js as well.
  {
    var ReactDebugCurrentFrame = ReactSharedInternals.ReactDebugCurrentFrame;
    var stack = ReactDebugCurrentFrame.getStackAddendum();

    if (stack !== '') {
      format += '%s';
      args = args.concat([stack]);
    } // eslint-disable-next-line react-internal/safe-string-coercion


    var argsWithFormat = args.map(function (item) {
      return String(item);
    }); // Careful: RN currently depends on this prefix

    argsWithFormat.unshift('Warning: ' + format); // We intentionally don't use spread (or .apply) directly because it
    // breaks IE9: https://github.com/facebook/react/issues/13610
    // eslint-disable-next-line react-internal/no-production-logging

    Function.prototype.apply.call(console[level], console, argsWithFormat);
  }
}

// -----------------------------------------------------------------------------

var enableScopeAPI = false; // Experimental Create Event Handle API.
var enableCacheElement = false;
var enableTransitionTracing = false; // No known bugs, but needs performance testing

var enableLegacyHidden = false; // Enables unstable_avoidThisFallback feature in Fiber
// stuff. Intended to enable React core members to more easily debug scheduling
// issues in DEV builds.

var enableDebugTracing = false; // Track which Fiber(s) schedule render work.

var REACT_MODULE_REFERENCE;

{
  REACT_MODULE_REFERENCE = Symbol.for('react.module.reference');
}

function isValidElementType(type) {
  if (typeof type === 'string' || typeof type === 'function') {
    return true;
  } // Note: typeof might be other than 'symbol' or 'number' (e.g. if it's a polyfill).


  if (type === REACT_FRAGMENT_TYPE || type === REACT_PROFILER_TYPE || enableDebugTracing  || type === REACT_STRICT_MODE_TYPE || type === REACT_SUSPENSE_TYPE || type === REACT_SUSPENSE_LIST_TYPE || enableLegacyHidden  || type === REACT_OFFSCREEN_TYPE || enableScopeAPI  || enableCacheElement  || enableTransitionTracing ) {
    return true;
  }

  if (typeof type === 'object' && type !== null) {
    if (type.$$typeof === REACT_LAZY_TYPE || type.$$typeof === REACT_MEMO_TYPE || type.$$typeof === REACT_PROVIDER_TYPE || type.$$typeof === REACT_CONTEXT_TYPE || type.$$typeof === REACT_FORWARD_REF_TYPE || // This needs to include all possible module reference object
    // types supported by any Flight configuration anywhere since
    // we don't know which Flight build this will end up being used
    // with.
    type.$$typeof === REACT_MODULE_REFERENCE || type.getModuleId !== undefined) {
      return true;
    }
  }

  return false;
}

function getWrappedName(outerType, innerType, wrapperName) {
  var displayName = outerType.displayName;

  if (displayName) {
    return displayName;
  }

  var functionName = innerType.displayName || innerType.name || '';
  return functionName !== '' ? wrapperName + "(" + functionName + ")" : wrapperName;
} // Keep in sync with react-reconciler/getComponentNameFromFiber


function getContextName(type) {
  return type.displayName || 'Context';
} // Note that the reconciler package should generally prefer to use getComponentNameFromFiber() instead.


function getComponentNameFromType(type) {
  if (type == null) {
    // Host root, text node or just invalid type.
    return null;
  }

  {
    if (typeof type.tag === 'number') {
      error('Received an unexpected object in getComponentNameFromType(). ' + 'This is likely a bug in React. Please file an issue.');
    }
  }

  if (typeof type === 'function') {
    return type.displayName || type.name || null;
  }

  if (typeof type === 'string') {
    return type;
  }

  switch (type) {
    case REACT_FRAGMENT_TYPE:
      return 'Fragment';

    case REACT_PORTAL_TYPE:
      return 'Portal';

    case REACT_PROFILER_TYPE:
      return 'Profiler';

    case REACT_STRICT_MODE_TYPE:
      return 'StrictMode';

    case REACT_SUSPENSE_TYPE:
      return 'Suspense';

    case REACT_SUSPENSE_LIST_TYPE:
      return 'SuspenseList';

  }

  if (typeof type === 'object') {
    switch (type.$$typeof) {
      case REACT_CONTEXT_TYPE:
        var context = type;
        return getContextName(context) + '.Consumer';

      case REACT_PROVIDER_TYPE:
        var provider = type;
        return getContextName(provider._context) + '.Provider';

      case REACT_FORWARD_REF_TYPE:
        return getWrappedName(type, type.render, 'ForwardRef');

      case REACT_MEMO_TYPE:
        var outerName = type.displayName || null;

        if (outerName !== null) {
          return outerName;
        }

        return getComponentNameFromType(type.type) || 'Memo';

      case REACT_LAZY_TYPE:
        {
          var lazyComponent = type;
          var payload = lazyComponent._payload;
          var init = lazyComponent._init;

          try {
            return getComponentNameFromType(init(payload));
          } catch (x) {
            return null;
          }
        }

      // eslint-disable-next-line no-fallthrough
    }
  }

  return null;
}

var assign = Object.assign;

// Helpers to patch console.logs to avoid logging during side-effect free
// replaying on render function. This currently only patches the object
// lazily which won't cover if the log function was extracted eagerly.
// We could also eagerly patch the method.
var disabledDepth = 0;
var prevLog;
var prevInfo;
var prevWarn;
var prevError;
var prevGroup;
var prevGroupCollapsed;
var prevGroupEnd;

function disabledLog() {}

disabledLog.__reactDisabledLog = true;
function disableLogs() {
  {
    if (disabledDepth === 0) {
      /* eslint-disable react-internal/no-production-logging */
      prevLog = console.log;
      prevInfo = console.info;
      prevWarn = console.warn;
      prevError = console.error;
      prevGroup = console.group;
      prevGroupCollapsed = console.groupCollapsed;
      prevGroupEnd = console.groupEnd; // https://github.com/facebook/react/issues/19099

      var props = {
        configurable: true,
        enumerable: true,
        value: disabledLog,
        writable: true
      }; // $FlowFixMe Flow thinks console is immutable.

      Object.defineProperties(console, {
        info: props,
        log: props,
        warn: props,
        error: props,
        group: props,
        groupCollapsed: props,
        groupEnd: props
      });
      /* eslint-enable react-internal/no-production-logging */
    }

    disabledDepth++;
  }
}
function reenableLogs() {
  {
    disabledDepth--;

    if (disabledDepth === 0) {
      /* eslint-disable react-internal/no-production-logging */
      var props = {
        configurable: true,
        enumerable: true,
        writable: true
      }; // $FlowFixMe Flow thinks console is immutable.

      Object.defineProperties(console, {
        log: assign({}, props, {
          value: prevLog
        }),
        info: assign({}, props, {
          value: prevInfo
        }),
        warn: assign({}, props, {
          value: prevWarn
        }),
        error: assign({}, props, {
          value: prevError
        }),
        group: assign({}, props, {
          value: prevGroup
        }),
        groupCollapsed: assign({}, props, {
          value: prevGroupCollapsed
        }),
        groupEnd: assign({}, props, {
          value: prevGroupEnd
        })
      });
      /* eslint-enable react-internal/no-production-logging */
    }

    if (disabledDepth < 0) {
      error('disabledDepth fell below zero. ' + 'This is a bug in React. Please file an issue.');
    }
  }
}

var ReactCurrentDispatcher = ReactSharedInternals.ReactCurrentDispatcher;
var prefix;
function describeBuiltInComponentFrame(name, source, ownerFn) {
  {
    if (prefix === undefined) {
      // Extract the VM specific prefix used by each line.
      try {
        throw Error();
      } catch (x) {
        var match = x.stack.trim().match(/\n( *(at )?)/);
        prefix = match && match[1] || '';
      }
    } // We use the prefix to ensure our stacks line up with native stack frames.


    return '\n' + prefix + name;
  }
}
var reentry = false;
var componentFrameCache;

{
  var PossiblyWeakMap = typeof WeakMap === 'function' ? WeakMap : Map;
  componentFrameCache = new PossiblyWeakMap();
}

function describeNativeComponentFrame(fn, construct) {
  // If something asked for a stack inside a fake render, it should get ignored.
  if ( !fn || reentry) {
    return '';
  }

  {
    var frame = componentFrameCache.get(fn);

    if (frame !== undefined) {
      return frame;
    }
  }

  var control;
  reentry = true;
  var previousPrepareStackTrace = Error.prepareStackTrace; // $FlowFixMe It does accept undefined.

  Error.prepareStackTrace = undefined;
  var previousDispatcher;

  {
    previousDispatcher = ReactCurrentDispatcher.current; // Set the dispatcher in DEV because this might be call in the render function
    // for warnings.

    ReactCurrentDispatcher.current = null;
    disableLogs();
  }

  try {
    // This should throw.
    if (construct) {
      // Something should be setting the props in the constructor.
      var Fake = function () {
        throw Error();
      }; // $FlowFixMe


      Object.defineProperty(Fake.prototype, 'props', {
        set: function () {
          // We use a throwing setter instead of frozen or non-writable props
          // because that won't throw in a non-strict mode function.
          throw Error();
        }
      });

      if (typeof Reflect === 'object' && Reflect.construct) {
        // We construct a different control for this case to include any extra
        // frames added by the construct call.
        try {
          Reflect.construct(Fake, []);
        } catch (x) {
          control = x;
        }

        Reflect.construct(fn, [], Fake);
      } else {
        try {
          Fake.call();
        } catch (x) {
          control = x;
        }

        fn.call(Fake.prototype);
      }
    } else {
      try {
        throw Error();
      } catch (x) {
        control = x;
      }

      fn();
    }
  } catch (sample) {
    // This is inlined manually because closure doesn't do it for us.
    if (sample && control && typeof sample.stack === 'string') {
      // This extracts the first frame from the sample that isn't also in the control.
      // Skipping one frame that we assume is the frame that calls the two.
      var sampleLines = sample.stack.split('\n');
      var controlLines = control.stack.split('\n');
      var s = sampleLines.length - 1;
      var c = controlLines.length - 1;

      while (s >= 1 && c >= 0 && sampleLines[s] !== controlLines[c]) {
        // We expect at least one stack frame to be shared.
        // Typically this will be the root most one. However, stack frames may be
        // cut off due to maximum stack limits. In this case, one maybe cut off
        // earlier than the other. We assume that the sample is longer or the same
        // and there for cut off earlier. So we should find the root most frame in
        // the sample somewhere in the control.
        c--;
      }

      for (; s >= 1 && c >= 0; s--, c--) {
        // Next we find the first one that isn't the same which should be the
        // frame that called our sample function and the control.
        if (sampleLines[s] !== controlLines[c]) {
          // In V8, the first line is describing the message but other VMs don't.
          // If we're about to return the first line, and the control is also on the same
          // line, that's a pretty good indicator that our sample threw at same line as
          // the control. I.e. before we entered the sample frame. So we ignore this result.
          // This can happen if you passed a class to function component, or non-function.
          if (s !== 1 || c !== 1) {
            do {
              s--;
              c--; // We may still have similar intermediate frames from the construct call.
              // The next one that isn't the same should be our match though.

              if (c < 0 || sampleLines[s] !== controlLines[c]) {
                // V8 adds a "new" prefix for native classes. Let's remove it to make it prettier.
                var _frame = '\n' + sampleLines[s].replace(' at new ', ' at '); // If our component frame is labeled "<anonymous>"
                // but we have a user-provided "displayName"
                // splice it in to make the stack more readable.


                if (fn.displayName && _frame.includes('<anonymous>')) {
                  _frame = _frame.replace('<anonymous>', fn.displayName);
                }

                {
                  if (typeof fn === 'function') {
                    componentFrameCache.set(fn, _frame);
                  }
                } // Return the line we found.


                return _frame;
              }
            } while (s >= 1 && c >= 0);
          }

          break;
        }
      }
    }
  } finally {
    reentry = false;

    {
      ReactCurrentDispatcher.current = previousDispatcher;
      reenableLogs();
    }

    Error.prepareStackTrace = previousPrepareStackTrace;
  } // Fallback to just using the name if we couldn't make it throw.


  var name = fn ? fn.displayName || fn.name : '';
  var syntheticFrame = name ? describeBuiltInComponentFrame(name) : '';

  {
    if (typeof fn === 'function') {
      componentFrameCache.set(fn, syntheticFrame);
    }
  }

  return syntheticFrame;
}
function describeFunctionComponentFrame(fn, source, ownerFn) {
  {
    return describeNativeComponentFrame(fn, false);
  }
}

function shouldConstruct(Component) {
  var prototype = Component.prototype;
  return !!(prototype && prototype.isReactComponent);
}

function describeUnknownElementTypeFrameInDEV(type, source, ownerFn) {

  if (type == null) {
    return '';
  }

  if (typeof type === 'function') {
    {
      return describeNativeComponentFrame(type, shouldConstruct(type));
    }
  }

  if (typeof type === 'string') {
    return describeBuiltInComponentFrame(type);
  }

  switch (type) {
    case REACT_SUSPENSE_TYPE:
      return describeBuiltInComponentFrame('Suspense');

    case REACT_SUSPENSE_LIST_TYPE:
      return describeBuiltInComponentFrame('SuspenseList');
  }

  if (typeof type === 'object') {
    switch (type.$$typeof) {
      case REACT_FORWARD_REF_TYPE:
        return describeFunctionComponentFrame(type.render);

      case REACT_MEMO_TYPE:
        // Memo may contain any component type so we recursively resolve it.
        return describeUnknownElementTypeFrameInDEV(type.type, source, ownerFn);

      case REACT_LAZY_TYPE:
        {
          var lazyComponent = type;
          var payload = lazyComponent._payload;
          var init = lazyComponent._init;

          try {
            // Lazy may contain any component type so we recursively resolve it.
            return describeUnknownElementTypeFrameInDEV(init(payload), source, ownerFn);
          } catch (x) {}
        }
    }
  }

  return '';
}

var hasOwnProperty = Object.prototype.hasOwnProperty;

var loggedTypeFailures = {};
var ReactDebugCurrentFrame = ReactSharedInternals.ReactDebugCurrentFrame;

function setCurrentlyValidatingElement(element) {
  {
    if (element) {
      var owner = element._owner;
      var stack = describeUnknownElementTypeFrameInDEV(element.type, element._source, owner ? owner.type : null);
      ReactDebugCurrentFrame.setExtraStackFrame(stack);
    } else {
      ReactDebugCurrentFrame.setExtraStackFrame(null);
    }
  }
}

function checkPropTypes(typeSpecs, values, location, componentName, element) {
  {
    // $FlowFixMe This is okay but Flow doesn't know it.
    var has = Function.call.bind(hasOwnProperty);

    for (var typeSpecName in typeSpecs) {
      if (has(typeSpecs, typeSpecName)) {
        var error$1 = void 0; // Prop type validation may throw. In case they do, we don't want to
        // fail the render phase where it didn't fail before. So we log it.
        // After these have been cleaned up, we'll let them throw.

        try {
          // This is intentionally an invariant that gets caught. It's the same
          // behavior as without this statement except with a better message.
          if (typeof typeSpecs[typeSpecName] !== 'function') {
            // eslint-disable-next-line react-internal/prod-error-codes
            var err = Error((componentName || 'React class') + ': ' + location + ' type `' + typeSpecName + '` is invalid; ' + 'it must be a function, usually from the `prop-types` package, but received `' + typeof typeSpecs[typeSpecName] + '`.' + 'This often happens because of typos such as `PropTypes.function` instead of `PropTypes.func`.');
            err.name = 'Invariant Violation';
            throw err;
          }

          error$1 = typeSpecs[typeSpecName](values, typeSpecName, componentName, location, null, 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED');
        } catch (ex) {
          error$1 = ex;
        }

        if (error$1 && !(error$1 instanceof Error)) {
          setCurrentlyValidatingElement(element);

          error('%s: type specification of %s' + ' `%s` is invalid; the type checker ' + 'function must return `null` or an `Error` but returned a %s. ' + 'You may have forgotten to pass an argument to the type checker ' + 'creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and ' + 'shape all require an argument).', componentName || 'React class', location, typeSpecName, typeof error$1);

          setCurrentlyValidatingElement(null);
        }

        if (error$1 instanceof Error && !(error$1.message in loggedTypeFailures)) {
          // Only monitor this failure once because there tends to be a lot of the
          // same error.
          loggedTypeFailures[error$1.message] = true;
          setCurrentlyValidatingElement(element);

          error('Failed %s type: %s', location, error$1.message);

          setCurrentlyValidatingElement(null);
        }
      }
    }
  }
}

var isArrayImpl = Array.isArray; // eslint-disable-next-line no-redeclare

function isArray(a) {
  return isArrayImpl(a);
}

/*
 * The `'' + value` pattern (used in in perf-sensitive code) throws for Symbol
 * and Temporal.* types. See https://github.com/facebook/react/pull/22064.
 *
 * The functions in this module will throw an easier-to-understand,
 * easier-to-debug exception with a clear errors message message explaining the
 * problem. (Instead of a confusing exception thrown inside the implementation
 * of the `value` object).
 */
// $FlowFixMe only called in DEV, so void return is not possible.
function typeName(value) {
  {
    // toStringTag is needed for namespaced types like Temporal.Instant
    var hasToStringTag = typeof Symbol === 'function' && Symbol.toStringTag;
    var type = hasToStringTag && value[Symbol.toStringTag] || value.constructor.name || 'Object';
    return type;
  }
} // $FlowFixMe only called in DEV, so void return is not possible.


function willCoercionThrow(value) {
  {
    try {
      testStringCoercion(value);
      return false;
    } catch (e) {
      return true;
    }
  }
}

function testStringCoercion(value) {
  // If you ended up here by following an exception call stack, here's what's
  // happened: you supplied an object or symbol value to React (as a prop, key,
  // DOM attribute, CSS property, string ref, etc.) and when React tried to
  // coerce it to a string using `'' + value`, an exception was thrown.
  //
  // The most common types that will cause this exception are `Symbol` instances
  // and Temporal objects like `Temporal.Instant`. But any object that has a
  // `valueOf` or `[Symbol.toPrimitive]` method that throws will also cause this
  // exception. (Library authors do this to prevent users from using built-in
  // numeric operators like `+` or comparison operators like `>=` because custom
  // methods are needed to perform accurate arithmetic or comparison.)
  //
  // To fix the problem, coerce this object or symbol value to a string before
  // passing it to React. The most reliable way is usually `String(value)`.
  //
  // To find which value is throwing, check the browser or debugger console.
  // Before this exception was thrown, there should be `console.error` output
  // that shows the type (Symbol, Temporal.PlainDate, etc.) that caused the
  // problem and how that type was used: key, atrribute, input value prop, etc.
  // In most cases, this console output also shows the component and its
  // ancestor components where the exception happened.
  //
  // eslint-disable-next-line react-internal/safe-string-coercion
  return '' + value;
}
function checkKeyStringCoercion(value) {
  {
    if (willCoercionThrow(value)) {
      error('The provided key is an unsupported type %s.' + ' This value must be coerced to a string before before using it here.', typeName(value));

      return testStringCoercion(value); // throw (to help callers find troubleshooting comments)
    }
  }
}

var ReactCurrentOwner = ReactSharedInternals.ReactCurrentOwner;
var RESERVED_PROPS = {
  key: true,
  ref: true,
  __self: true,
  __source: true
};
var specialPropKeyWarningShown;
var specialPropRefWarningShown;
var didWarnAboutStringRefs;

{
  didWarnAboutStringRefs = {};
}

function hasValidRef(config) {
  {
    if (hasOwnProperty.call(config, 'ref')) {
      var getter = Object.getOwnPropertyDescriptor(config, 'ref').get;

      if (getter && getter.isReactWarning) {
        return false;
      }
    }
  }

  return config.ref !== undefined;
}

function hasValidKey(config) {
  {
    if (hasOwnProperty.call(config, 'key')) {
      var getter = Object.getOwnPropertyDescriptor(config, 'key').get;

      if (getter && getter.isReactWarning) {
        return false;
      }
    }
  }

  return config.key !== undefined;
}

function warnIfStringRefCannotBeAutoConverted(config, self) {
  {
    if (typeof config.ref === 'string' && ReactCurrentOwner.current && self && ReactCurrentOwner.current.stateNode !== self) {
      var componentName = getComponentNameFromType(ReactCurrentOwner.current.type);

      if (!didWarnAboutStringRefs[componentName]) {
        error('Component "%s" contains the string ref "%s". ' + 'Support for string refs will be removed in a future major release. ' + 'This case cannot be automatically converted to an arrow function. ' + 'We ask you to manually fix this case by using useRef() or createRef() instead. ' + 'Learn more about using refs safely here: ' + 'https://reactjs.org/link/strict-mode-string-ref', getComponentNameFromType(ReactCurrentOwner.current.type), config.ref);

        didWarnAboutStringRefs[componentName] = true;
      }
    }
  }
}

function defineKeyPropWarningGetter(props, displayName) {
  {
    var warnAboutAccessingKey = function () {
      if (!specialPropKeyWarningShown) {
        specialPropKeyWarningShown = true;

        error('%s: `key` is not a prop. Trying to access it will result ' + 'in `undefined` being returned. If you need to access the same ' + 'value within the child component, you should pass it as a different ' + 'prop. (https://reactjs.org/link/special-props)', displayName);
      }
    };

    warnAboutAccessingKey.isReactWarning = true;
    Object.defineProperty(props, 'key', {
      get: warnAboutAccessingKey,
      configurable: true
    });
  }
}

function defineRefPropWarningGetter(props, displayName) {
  {
    var warnAboutAccessingRef = function () {
      if (!specialPropRefWarningShown) {
        specialPropRefWarningShown = true;

        error('%s: `ref` is not a prop. Trying to access it will result ' + 'in `undefined` being returned. If you need to access the same ' + 'value within the child component, you should pass it as a different ' + 'prop. (https://reactjs.org/link/special-props)', displayName);
      }
    };

    warnAboutAccessingRef.isReactWarning = true;
    Object.defineProperty(props, 'ref', {
      get: warnAboutAccessingRef,
      configurable: true
    });
  }
}
/**
 * Factory method to create a new React element. This no longer adheres to
 * the class pattern, so do not use new to call it. Also, instanceof check
 * will not work. Instead test $$typeof field against Symbol.for('react.element') to check
 * if something is a React Element.
 *
 * @param {*} type
 * @param {*} props
 * @param {*} key
 * @param {string|object} ref
 * @param {*} owner
 * @param {*} self A *temporary* helper to detect places where `this` is
 * different from the `owner` when React.createElement is called, so that we
 * can warn. We want to get rid of owner and replace string `ref`s with arrow
 * functions, and as long as `this` and owner are the same, there will be no
 * change in behavior.
 * @param {*} source An annotation object (added by a transpiler or otherwise)
 * indicating filename, line number, and/or other information.
 * @internal
 */


var ReactElement = function (type, key, ref, self, source, owner, props) {
  var element = {
    // This tag allows us to uniquely identify this as a React Element
    $$typeof: REACT_ELEMENT_TYPE,
    // Built-in properties that belong on the element
    type: type,
    key: key,
    ref: ref,
    props: props,
    // Record the component responsible for creating this element.
    _owner: owner
  };

  {
    // The validation flag is currently mutative. We put it on
    // an external backing store so that we can freeze the whole object.
    // This can be replaced with a WeakMap once they are implemented in
    // commonly used development environments.
    element._store = {}; // To make comparing ReactElements easier for testing purposes, we make
    // the validation flag non-enumerable (where possible, which should
    // include every environment we run tests in), so the test framework
    // ignores it.

    Object.defineProperty(element._store, 'validated', {
      configurable: false,
      enumerable: false,
      writable: true,
      value: false
    }); // self and source are DEV only properties.

    Object.defineProperty(element, '_self', {
      configurable: false,
      enumerable: false,
      writable: false,
      value: self
    }); // Two elements created in two different places should be considered
    // equal for testing purposes and therefore we hide it from enumeration.

    Object.defineProperty(element, '_source', {
      configurable: false,
      enumerable: false,
      writable: false,
      value: source
    });

    if (Object.freeze) {
      Object.freeze(element.props);
      Object.freeze(element);
    }
  }

  return element;
};
/**
 * https://github.com/reactjs/rfcs/pull/107
 * @param {*} type
 * @param {object} props
 * @param {string} key
 */

function jsxDEV(type, config, maybeKey, source, self) {
  {
    var propName; // Reserved names are extracted

    var props = {};
    var key = null;
    var ref = null; // Currently, key can be spread in as a prop. This causes a potential
    // issue if key is also explicitly declared (ie. <div {...props} key="Hi" />
    // or <div key="Hi" {...props} /> ). We want to deprecate key spread,
    // but as an intermediary step, we will use jsxDEV for everything except
    // <div {...props} key="Hi" />, because we aren't currently able to tell if
    // key is explicitly declared to be undefined or not.

    if (maybeKey !== undefined) {
      {
        checkKeyStringCoercion(maybeKey);
      }

      key = '' + maybeKey;
    }

    if (hasValidKey(config)) {
      {
        checkKeyStringCoercion(config.key);
      }

      key = '' + config.key;
    }

    if (hasValidRef(config)) {
      ref = config.ref;
      warnIfStringRefCannotBeAutoConverted(config, self);
    } // Remaining properties are added to a new props object


    for (propName in config) {
      if (hasOwnProperty.call(config, propName) && !RESERVED_PROPS.hasOwnProperty(propName)) {
        props[propName] = config[propName];
      }
    } // Resolve default props


    if (type && type.defaultProps) {
      var defaultProps = type.defaultProps;

      for (propName in defaultProps) {
        if (props[propName] === undefined) {
          props[propName] = defaultProps[propName];
        }
      }
    }

    if (key || ref) {
      var displayName = typeof type === 'function' ? type.displayName || type.name || 'Unknown' : type;

      if (key) {
        defineKeyPropWarningGetter(props, displayName);
      }

      if (ref) {
        defineRefPropWarningGetter(props, displayName);
      }
    }

    return ReactElement(type, key, ref, self, source, ReactCurrentOwner.current, props);
  }
}

var ReactCurrentOwner$1 = ReactSharedInternals.ReactCurrentOwner;
var ReactDebugCurrentFrame$1 = ReactSharedInternals.ReactDebugCurrentFrame;

function setCurrentlyValidatingElement$1(element) {
  {
    if (element) {
      var owner = element._owner;
      var stack = describeUnknownElementTypeFrameInDEV(element.type, element._source, owner ? owner.type : null);
      ReactDebugCurrentFrame$1.setExtraStackFrame(stack);
    } else {
      ReactDebugCurrentFrame$1.setExtraStackFrame(null);
    }
  }
}

var propTypesMisspellWarningShown;

{
  propTypesMisspellWarningShown = false;
}
/**
 * Verifies the object is a ReactElement.
 * See https://reactjs.org/docs/react-api.html#isvalidelement
 * @param {?object} object
 * @return {boolean} True if `object` is a ReactElement.
 * @final
 */


function isValidElement(object) {
  {
    return typeof object === 'object' && object !== null && object.$$typeof === REACT_ELEMENT_TYPE;
  }
}

function getDeclarationErrorAddendum() {
  {
    if (ReactCurrentOwner$1.current) {
      var name = getComponentNameFromType(ReactCurrentOwner$1.current.type);

      if (name) {
        return '\n\nCheck the render method of `' + name + '`.';
      }
    }

    return '';
  }
}

function getSourceInfoErrorAddendum(source) {
  {
    if (source !== undefined) {
      var fileName = source.fileName.replace(/^.*[\\\/]/, '');
      var lineNumber = source.lineNumber;
      return '\n\nCheck your code at ' + fileName + ':' + lineNumber + '.';
    }

    return '';
  }
}
/**
 * Warn if there's no key explicitly set on dynamic arrays of children or
 * object keys are not valid. This allows us to keep track of children between
 * updates.
 */


var ownerHasKeyUseWarning = {};

function getCurrentComponentErrorInfo(parentType) {
  {
    var info = getDeclarationErrorAddendum();

    if (!info) {
      var parentName = typeof parentType === 'string' ? parentType : parentType.displayName || parentType.name;

      if (parentName) {
        info = "\n\nCheck the top-level render call using <" + parentName + ">.";
      }
    }

    return info;
  }
}
/**
 * Warn if the element doesn't have an explicit key assigned to it.
 * This element is in an array. The array could grow and shrink or be
 * reordered. All children that haven't already been validated are required to
 * have a "key" property assigned to it. Error statuses are cached so a warning
 * will only be shown once.
 *
 * @internal
 * @param {ReactElement} element Element that requires a key.
 * @param {*} parentType element's parent's type.
 */


function validateExplicitKey(element, parentType) {
  {
    if (!element._store || element._store.validated || element.key != null) {
      return;
    }

    element._store.validated = true;
    var currentComponentErrorInfo = getCurrentComponentErrorInfo(parentType);

    if (ownerHasKeyUseWarning[currentComponentErrorInfo]) {
      return;
    }

    ownerHasKeyUseWarning[currentComponentErrorInfo] = true; // Usually the current owner is the offender, but if it accepts children as a
    // property, it may be the creator of the child that's responsible for
    // assigning it a key.

    var childOwner = '';

    if (element && element._owner && element._owner !== ReactCurrentOwner$1.current) {
      // Give the component that originally created this child.
      childOwner = " It was passed a child from " + getComponentNameFromType(element._owner.type) + ".";
    }

    setCurrentlyValidatingElement$1(element);

    error('Each child in a list should have a unique "key" prop.' + '%s%s See https://reactjs.org/link/warning-keys for more information.', currentComponentErrorInfo, childOwner);

    setCurrentlyValidatingElement$1(null);
  }
}
/**
 * Ensure that every element either is passed in a static location, in an
 * array with an explicit keys property defined, or in an object literal
 * with valid key property.
 *
 * @internal
 * @param {ReactNode} node Statically passed child of any type.
 * @param {*} parentType node's parent's type.
 */


function validateChildKeys(node, parentType) {
  {
    if (typeof node !== 'object') {
      return;
    }

    if (isArray(node)) {
      for (var i = 0; i < node.length; i++) {
        var child = node[i];

        if (isValidElement(child)) {
          validateExplicitKey(child, parentType);
        }
      }
    } else if (isValidElement(node)) {
      // This element was passed in a valid location.
      if (node._store) {
        node._store.validated = true;
      }
    } else if (node) {
      var iteratorFn = getIteratorFn(node);

      if (typeof iteratorFn === 'function') {
        // Entry iterators used to provide implicit keys,
        // but now we print a separate warning for them later.
        if (iteratorFn !== node.entries) {
          var iterator = iteratorFn.call(node);
          var step;

          while (!(step = iterator.next()).done) {
            if (isValidElement(step.value)) {
              validateExplicitKey(step.value, parentType);
            }
          }
        }
      }
    }
  }
}
/**
 * Given an element, validate that its props follow the propTypes definition,
 * provided by the type.
 *
 * @param {ReactElement} element
 */


function validatePropTypes(element) {
  {
    var type = element.type;

    if (type === null || type === undefined || typeof type === 'string') {
      return;
    }

    var propTypes;

    if (typeof type === 'function') {
      propTypes = type.propTypes;
    } else if (typeof type === 'object' && (type.$$typeof === REACT_FORWARD_REF_TYPE || // Note: Memo only checks outer props here.
    // Inner props are checked in the reconciler.
    type.$$typeof === REACT_MEMO_TYPE)) {
      propTypes = type.propTypes;
    } else {
      return;
    }

    if (propTypes) {
      // Intentionally inside to avoid triggering lazy initializers:
      var name = getComponentNameFromType(type);
      checkPropTypes(propTypes, element.props, 'prop', name, element);
    } else if (type.PropTypes !== undefined && !propTypesMisspellWarningShown) {
      propTypesMisspellWarningShown = true; // Intentionally inside to avoid triggering lazy initializers:

      var _name = getComponentNameFromType(type);

      error('Component %s declared `PropTypes` instead of `propTypes`. Did you misspell the property assignment?', _name || 'Unknown');
    }

    if (typeof type.getDefaultProps === 'function' && !type.getDefaultProps.isReactClassApproved) {
      error('getDefaultProps is only used on classic React.createClass ' + 'definitions. Use a static property named `defaultProps` instead.');
    }
  }
}
/**
 * Given a fragment, validate that it can only be provided with fragment props
 * @param {ReactElement} fragment
 */


function validateFragmentProps(fragment) {
  {
    var keys = Object.keys(fragment.props);

    for (var i = 0; i < keys.length; i++) {
      var key = keys[i];

      if (key !== 'children' && key !== 'key') {
        setCurrentlyValidatingElement$1(fragment);

        error('Invalid prop `%s` supplied to `React.Fragment`. ' + 'React.Fragment can only have `key` and `children` props.', key);

        setCurrentlyValidatingElement$1(null);
        break;
      }
    }

    if (fragment.ref !== null) {
      setCurrentlyValidatingElement$1(fragment);

      error('Invalid attribute `ref` supplied to `React.Fragment`.');

      setCurrentlyValidatingElement$1(null);
    }
  }
}

function jsxWithValidation(type, props, key, isStaticChildren, source, self) {
  {
    var validType = isValidElementType(type); // We warn in this case but don't throw. We expect the element creation to
    // succeed and there will likely be errors in render.

    if (!validType) {
      var info = '';

      if (type === undefined || typeof type === 'object' && type !== null && Object.keys(type).length === 0) {
        info += ' You likely forgot to export your component from the file ' + "it's defined in, or you might have mixed up default and named imports.";
      }

      var sourceInfo = getSourceInfoErrorAddendum(source);

      if (sourceInfo) {
        info += sourceInfo;
      } else {
        info += getDeclarationErrorAddendum();
      }

      var typeString;

      if (type === null) {
        typeString = 'null';
      } else if (isArray(type)) {
        typeString = 'array';
      } else if (type !== undefined && type.$$typeof === REACT_ELEMENT_TYPE) {
        typeString = "<" + (getComponentNameFromType(type.type) || 'Unknown') + " />";
        info = ' Did you accidentally export a JSX literal instead of a component?';
      } else {
        typeString = typeof type;
      }

      error('React.jsx: type is invalid -- expected a string (for ' + 'built-in components) or a class/function (for composite ' + 'components) but got: %s.%s', typeString, info);
    }

    var element = jsxDEV(type, props, key, source, self); // The result can be nullish if a mock or a custom function is used.
    // TODO: Drop this when these are no longer allowed as the type argument.

    if (element == null) {
      return element;
    } // Skip key warning if the type isn't valid since our key validation logic
    // doesn't expect a non-string/function type and can throw confusing errors.
    // We don't want exception behavior to differ between dev and prod.
    // (Rendering will throw with a helpful message and as soon as the type is
    // fixed, the key warnings will appear.)


    if (validType) {
      var children = props.children;

      if (children !== undefined) {
        if (isStaticChildren) {
          if (isArray(children)) {
            for (var i = 0; i < children.length; i++) {
              validateChildKeys(children[i], type);
            }

            if (Object.freeze) {
              Object.freeze(children);
            }
          } else {
            error('React.jsx: Static children should always be an array. ' + 'You are likely explicitly calling React.jsxs or React.jsxDEV. ' + 'Use the Babel transform instead.');
          }
        } else {
          validateChildKeys(children, type);
        }
      }
    }

    if (type === REACT_FRAGMENT_TYPE) {
      validateFragmentProps(element);
    } else {
      validatePropTypes(element);
    }

    return element;
  }
} // These two functions exist to still get child warnings in dev
// even with the prod transform. This means that jsxDEV is purely
// opt-in behavior for better messages but that we won't stop
// giving you warnings if you use production apis.

function jsxWithValidationStatic(type, props, key) {
  {
    return jsxWithValidation(type, props, key, true);
  }
}
function jsxWithValidationDynamic(type, props, key) {
  {
    return jsxWithValidation(type, props, key, false);
  }
}

var jsx =  jsxWithValidationDynamic ; // we may want to special case jsxs internally to take advantage of static children.
// for now we can ship identical prod functions

var jsxs =  jsxWithValidationStatic ;

exports.Fragment = REACT_FRAGMENT_TYPE;
exports.jsx = jsx;
exports.jsxs = jsxs;
  })();
}


/***/ }),

/***/ "./node_modules/react/jsx-runtime.js":
/*!*******************************************!*\
  !*** ./node_modules/react/jsx-runtime.js ***!
  \*******************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


if (false) {} else {
  module.exports = __webpack_require__(/*! ./cjs/react-jsx-runtime.development.js */ "./node_modules/react/cjs/react-jsx-runtime.development.js");
}


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = window["React"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/primitives":
/*!************************************!*\
  !*** external ["wp","primitives"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["primitives"];

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ ((module, exports) => {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
	Copyright (c) 2018 Jed Watson.
	Licensed under the MIT License (MIT), see
	http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames () {
		var classes = '';

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (arg) {
				classes = appendClass(classes, parseValue(arg));
			}
		}

		return classes;
	}

	function parseValue (arg) {
		if (typeof arg === 'string' || typeof arg === 'number') {
			return arg;
		}

		if (typeof arg !== 'object') {
			return '';
		}

		if (Array.isArray(arg)) {
			return classNames.apply(null, arg);
		}

		if (arg.toString !== Object.prototype.toString && !arg.toString.toString().includes('[native code]')) {
			return arg.toString();
		}

		var classes = '';

		for (var key in arg) {
			if (hasOwn.call(arg, key) && arg[key]) {
				classes = appendClass(classes, key);
			}
		}

		return classes;
	}

	function appendClass (value, newClass) {
		if (!newClass) {
			return value;
		}
	
		if (value) {
			return value + ' ' + newClass;
		}
	
		return value + newClass;
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./src/block.json":
/*!************************!*\
  !*** ./src/block.json ***!
  \************************/
/***/ ((module) => {

"use strict";
module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"advanced-posts-listing/advanced-posts-listing-block","version":"1.0.5","title":"Advanced Posts Listing","category":"widgets","description":"Enables site admins to display blog post list and custom post type list.","example":{},"keywords":["post list","posts listing","posts","blog post","blog listing"],"attributes":{"selectedCustomPostType":{"type":"string","default":"Posts"},"showContent":{"type":"boolean","default":true},"contentType":{"type":"string","default":"Excerpt"},"showMeta":{"type":"boolean","default":true},"showPostTitle":{"type":"boolean","default":true},"showImgToggler":{"type":"boolean","default":true},"selectedImageTogggler":{"type":"boolean"},"widthPercentageState":{"type":"boolean"},"imageUrl":{"type":"string","default":"large"},"customPostsOptions":{"type":"array"},"showRange":{"type":"string"},"numPostsToShow":{"type":"number","default":10},"valueForWidth":{"type":"boolean","default":false},"widthPercentage":{"type":"string","default":"100%"},"widthController":{"type":"boolean","default":false},"height":{"type":"string"},"ImgWidth":{"type":"string"},"sortBy":{"type":"string","default":"new-to-old"},"wordsLimit":{"type":"number","default":30},"customTaxonomyPosts":{"type":"object","properties":{"[taxonomyType]":{"type":"array"}}},"showReadMoreToggler":{"type":"boolean"},"ReadMoreText":{"type":"string","default":"Read More"},"ReadMoreTextColor":{"type":"string","default":"#ffffff"},"ReadMoreBgColor":{"type":"string","default":"#000000"},"updatedCptIds":{"type":"array","items":{"type":"object","properties":{"ids":{"type":"integer"},"taxonomyType":{"type":"string"}}},"default":[]},"totalColoms":{"type":"number","default":3},"columnGap":{"type":"string","default":20},"rowGap":{"type":"string","default":30},"JustifyContent":{"type":"string","default":"start"},"prevName":{"type":"string","default":"Prev"},"nextName":{"type":"string","default":"Next"},"PaginationOnToggler":{"type":"boolean","default":true},"paginationAline":{"type":"string","default":"center"},"commaSeparatedIds":{"type":"array","default":[]},"RemoveCommaSeparatedIds":{"type":"array","default":[]},"selectedLayout":{"type":"string","default":"listing-layout"},"button_Top_bottom_Padding":{"type":"string","default":"10px"},"button_Right_Left_Padding":{"type":"string","default":"20px"},"title_Manage_styling":{"type":"boolean","default":false},"title_font_size":{"type":"string"},"Meta_Manage_styling":{"type":"boolean","default":false},"Meta_font_size":{"type":"string"},"Content_Manage_styling":{"type":"boolean","default":false},"Content_font_size":{"type":"string"},"Read_more_font_size":{"type":"string"},"customCSS":{"type":"string"}},"supports":{"color":{"background":true,"text":true,"gradients":true},"spacing":{"margin":true,"padding":true},"html":false,"typography":{"fontSize":true}},"textdomain":"advanced-posts-listing","editorScript":"file:./index.js","style":"file:./index.css"}');

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
/************************************************************************/
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
/******/ 	/* webpack/runtime/global */
/******/ 	(() => {
/******/ 		__webpack_require__.g = (function() {
/******/ 			if (typeof globalThis === 'object') return globalThis;
/******/ 			try {
/******/ 				return this || new Function('return this')();
/******/ 			} catch (e) {
/******/ 				if (typeof window === 'object') return window;
/******/ 			}
/******/ 		})();
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/edit.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./block.json */ "./src/block.json");
/* harmony import */ var _App_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./App.css */ "./src/App.css");





const iconSVG = (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
  class: "dashicons dashicons-excerpt-view"
});
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_3__.name, {
  icon: iconSVG,
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"]
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map