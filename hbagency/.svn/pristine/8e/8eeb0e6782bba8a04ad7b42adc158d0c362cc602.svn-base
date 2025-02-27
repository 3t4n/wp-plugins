(()=>{
    "use strict";
    var e = {
        d: (t,n)=>{
            for (var i in n)
                e.o(n, i) && !e.o(t, i) && Object.defineProperty(t, i, {
                    enumerable: !0,
                    get: n[i]
                })
        }
        ,
        o: (e,t)=>Object.prototype.hasOwnProperty.call(e, t),
        r: e=>{
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                value: "Module"
            }),
            Object.defineProperty(e, "__esModule", {
                value: !0
            })
        }
    };
    (()=>{
        var t = {};
        e.r(t),
        e.d(t, {
            afterMain: ()=>Fe,
            afterRead: ()=>He,
            afterWrite: ()=>Ye,
            applyStyles: ()=>et,
            arrow: ()=>bt,
            auto: ()=>Ae,
            basePlacements: ()=>Me,
            beforeMain: ()=>We,
            beforeRead: ()=>Be,
            beforeWrite: ()=>Re,
            bottom: ()=>_e,
            clippingParents: ()=>De,
            computeStyles: ()=>Tt,
            createPopper: ()=>Jt,
            createPopperBase: ()=>Qt,
            createPopperLite: ()=>Zt,
            detectOverflow: ()=>zt,
            end: ()=>Pe,
            eventListeners: ()=>Ct,
            flip: ()=>Bt,
            hide: ()=>Wt,
            left: ()=>ke,
            main: ()=>Ve,
            modifierPhases: ()=>Xe,
            offset: ()=>Vt,
            placements: ()=>ze,
            popper: ()=>Ne,
            popperGenerator: ()=>Ut,
            popperOffsets: ()=>Ft,
            preventOverflow: ()=>Rt,
            read: ()=>Ge,
            reference: ()=>Ie,
            right: ()=>Oe,
            start: ()=>Le,
            top: ()=>Se,
            variationPlacements: ()=>je,
            viewport: ()=>$e,
            write: ()=>qe
        });
        const n = "transitionend"
          , i = e=>{
            let t = e.getAttribute("data-bs-target");
            if (!t || "#" === t) {
                let n = e.getAttribute("href");
                if (!n || !n.includes("#") && !n.startsWith("."))
                    return null;
                n.includes("#") && !n.startsWith("#") && (n = `#${n.split("#")[1]}`),
                t = n && "#" !== n ? n.trim() : null
            }
            return t
        }
          , s = e=>{
            const t = i(e);
            return t && document.querySelector(t) ? t : null
        }
          , r = e=>{
            const t = i(e);
            return t ? document.querySelector(t) : null
        }
          , o = e=>!(!e || "object" != typeof e) && (void 0 !== e.jquery && (e = e[0]),
        void 0 !== e.nodeType)
          , a = e=>o(e) ? e.jquery ? e[0] : e : "string" == typeof e && e.length > 0 ? document.querySelector(e) : null
          , l = e=>{
            if (!o(e) || 0 === e.getClientRects().length)
                return !1;
            const t = "visible" === getComputedStyle(e).getPropertyValue("visibility")
              , n = e.closest("details:not([open])");
            if (!n)
                return t;
            if (n !== e) {
                const t = e.closest("summary");
                if (t && t.parentNode !== n)
                    return !1;
                if (null === t)
                    return !1
            }
            return t
        }
          , d = e=>!e || e.nodeType !== Node.ELEMENT_NODE || (!!e.classList.contains("disabled") || (void 0 !== e.disabled ? e.disabled : e.hasAttribute("disabled") && "false" !== e.getAttribute("disabled")))
          , c = ()=>{}
          , p = e=>{
            e.offsetHeight
        }
          , u = ()=>window.jQuery && !document.body.hasAttribute("data-bs-no-jquery") ? window.jQuery : null
          , f = []
          , h = ()=>"rtl" === document.documentElement.dir
          , m = e=>{
            var t;
            t = ()=>{
                const t = u();
                if (t) {
                    const n = e.NAME
                      , i = t.fn[n];
                    t.fn[n] = e.jQueryInterface,
                    t.fn[n].Constructor = e,
                    t.fn[n].noConflict = ()=>(t.fn[n] = i,
                    e.jQueryInterface)
                }
            }
            ,
            "loading" === document.readyState ? (f.length || document.addEventListener("DOMContentLoaded", (()=>{
                for (const e of f)
                    e()
            }
            )),
            f.push(t)) : t()
        }
          , g = e=>{
            "function" == typeof e && e()
        }
          , v = (e,t,i=!0)=>{
            if (!i)
                return void g(e);
            const s = (e=>{
                if (!e)
                    return 0;
                let {transitionDuration: t, transitionDelay: n} = window.getComputedStyle(e);
                const i = Number.parseFloat(t)
                  , s = Number.parseFloat(n);
                return i || s ? (t = t.split(",")[0],
                n = n.split(",")[0],
                1e3 * (Number.parseFloat(t) + Number.parseFloat(n))) : 0
            }
            )(t) + 5;
            let r = !1;
            const o = ({target: i})=>{
                i === t && (r = !0,
                t.removeEventListener(n, o),
                g(e))
            }
            ;
            t.addEventListener(n, o),
            setTimeout((()=>{
                r || t.dispatchEvent(new Event(n))
            }
            ), s)
        }
          , b = {
            find: (e,t=document.documentElement)=>[].concat(...Element.prototype.querySelectorAll.call(t, e)),
            findOne: (e,t=document.documentElement)=>Element.prototype.querySelector.call(t, e),
            children: (e,t)=>[].concat(...e.children).filter((e=>e.matches(t))),
            parents(e, t) {
                const n = [];
                let i = e.parentNode.closest(t);
                for (; i; )
                    n.push(i),
                    i = i.parentNode.closest(t);
                return n
            },
            prev(e, t) {
                let n = e.previousElementSibling;
                for (; n; ) {
                    if (n.matches(t))
                        return [n];
                    n = n.previousElementSibling
                }
                return []
            },
            next(e, t) {
                let n = e.nextElementSibling;
                for (; n; ) {
                    if (n.matches(t))
                        return [n];
                    n = n.nextElementSibling
                }
                return []
            },
            focusableChildren(e) {
                const t = ["a", "button", "input", "textarea", "select", "details", "[tabindex]", '[contenteditable="true"]'].map((e=>`${e}:not([tabindex^="-"])`)).join(",");
                return this.find(t, e).filter((e=>!d(e) && l(e)))
            }
        }
          , w = b;
        function y(e) {
            if ("true" === e)
                return !0;
            if ("false" === e)
                return !1;
            if (e === Number(e).toString())
                return Number(e);
            if ("" === e || "null" === e)
                return null;
            if ("string" != typeof e)
                return e;
            try {
                return JSON.parse(decodeURIComponent(e))
            } catch {
                return e
            }
        }
        function E(e) {
            return e.replace(/[A-Z]/g, (e=>`-${e.toLowerCase()}`))
        }
        const T = {
            setDataAttribute(e, t, n) {
                e.setAttribute(`data-bs-${E(t)}`, n)
            },
            removeDataAttribute(e, t) {
                e.removeAttribute(`data-bs-${E(t)}`)
            },
            getDataAttributes(e) {
                if (!e)
                    return {};
                const t = {}
                  , n = Object.keys(e.dataset).filter((e=>e.startsWith("bs") && !e.startsWith("bsConfig")));
                for (const i of n) {
                    let n = i.replace(/^bs/, "");
                    n = n.charAt(0).toLowerCase() + n.slice(1, n.length),
                    t[n] = y(e.dataset[i])
                }
                return t
            },
            getDataAttribute: (e,t)=>y(e.getAttribute(`data-bs-${E(t)}`))
        }
          , x = T
          , C = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top"
          , S = ".sticky-top"
          , _ = "padding-right"
          , O = "margin-right";
        const k = class {
            constructor() {
                this._element = document.body
            }
            getWidth() {
                const e = document.documentElement.clientWidth;
                return Math.abs(window.innerWidth - e)
            }
            hide() {
                const e = this.getWidth();
                this._disableOverFlow(),
                this._setElementAttributes(this._element, _, (t=>t + e)),
                this._setElementAttributes(C, _, (t=>t + e)),
                this._setElementAttributes(S, O, (t=>t - e))
            }
            reset() {
                this._resetElementAttributes(this._element, "overflow"),
                this._resetElementAttributes(this._element, _),
                this._resetElementAttributes(C, _),
                this._resetElementAttributes(S, O)
            }
            isOverflowing() {
                return this.getWidth() > 0
            }
            _disableOverFlow() {
                this._saveInitialAttribute(this._element, "overflow"),
                this._element.style.overflow = "hidden"
            }
            _setElementAttributes(e, t, n) {
                const i = this.getWidth();
                this._applyManipulationCallback(e, (e=>{
                    if (e !== this._element && window.innerWidth > e.clientWidth + i)
                        return;
                    this._saveInitialAttribute(e, t);
                    const s = window.getComputedStyle(e).getPropertyValue(t);
                    e.style.setProperty(t, `${n(Number.parseFloat(s))}px`)
                }
                ))
            }
            _saveInitialAttribute(e, t) {
                const n = e.style.getPropertyValue(t);
                n && x.setDataAttribute(e, t, n)
            }
            _resetElementAttributes(e, t) {
                this._applyManipulationCallback(e, (e=>{
                    const n = x.getDataAttribute(e, t);
                    null !== n ? (x.removeDataAttribute(e, t),
                    e.style.setProperty(t, n)) : e.style.removeProperty(t)
                }
                ))
            }
            _applyManipulationCallback(e, t) {
                if (o(e))
                    t(e);
                else
                    for (const n of w.find(e, this._element))
                        t(n)
            }
        }
          , A = /[^.]*(?=\..*)\.|.*/
          , M = /\..*/
          , L = /::\d+$/
          , P = {};
        let D = 1;
        const $ = {
            mouseenter: "mouseover",
            mouseleave: "mouseout"
        }
          , N = new Set(["click", "dblclick", "mouseup", "mousedown", "contextmenu", "mousewheel", "DOMMouseScroll", "mouseover", "mouseout", "mousemove", "selectstart", "selectend", "keydown", "keypress", "keyup", "orientationchange", "touchstart", "touchmove", "touchend", "touchcancel", "pointerdown", "pointermove", "pointerup", "pointerleave", "pointercancel", "gesturestart", "gesturechange", "gestureend", "focus", "blur", "change", "reset", "select", "submit", "focusin", "focusout", "load", "unload", "beforeunload", "resize", "move", "DOMContentLoaded", "readystatechange", "error", "abort", "scroll"]);
        function I(e, t) {
            return t && `${t}::${D++}` || e.uidEvent || D++
        }
        function j(e) {
            const t = I(e);
            return e.uidEvent = t,
            P[t] = P[t] || {},
            P[t]
        }
        function z(e, t, n=null) {
            return Object.values(e).find((e=>e.originalHandler === t && e.delegationSelector === n))
        }
        function B(e, t, n) {
            const i = "string" == typeof t
              , s = i ? n : t;
            let r = V(e);
            return N.has(r) || (r = e),
            [i, s, r]
        }
        function G(e, t, n, i, s) {
            if ("string" != typeof t || !e)
                return;
            if (n || (n = i,
            i = null),
            t in $) {
                const e = e=>function(t) {
                    if (!t.relatedTarget || t.relatedTarget !== t.delegateTarget && !t.delegateTarget.contains(t.relatedTarget))
                        return e.call(this, t)
                }
                ;
                i ? i = e(i) : n = e(n)
            }
            const [r,o,a] = B(t, n, i)
              , l = j(e)
              , d = l[a] || (l[a] = {})
              , c = z(d, o, r ? n : null);
            if (c)
                return void (c.oneOff = c.oneOff && s);
            const p = I(o, t.replace(A, ""))
              , u = r ? function(e, t, n) {
                return function i(s) {
                    const r = e.querySelectorAll(t);
                    for (let {target: o} = s; o && o !== this; o = o.parentNode)
                        for (const a of r)
                            if (a === o)
                                return s.delegateTarget = o,
                                i.oneOff && F.off(e, s.type, t, n),
                                n.apply(o, [s])
                }
            }(e, n, i) : function(e, t) {
                return function n(i) {
                    return i.delegateTarget = e,
                    n.oneOff && F.off(e, i.type, t),
                    t.apply(e, [i])
                }
            }(e, n);
            u.delegationSelector = r ? n : null,
            u.originalHandler = o,
            u.oneOff = s,
            u.uidEvent = p,
            d[p] = u,
            e.addEventListener(a, u, r)
        }
        function H(e, t, n, i, s) {
            const r = z(t[n], i, s);
            r && (e.removeEventListener(n, r, Boolean(s)),
            delete t[n][r.uidEvent])
        }
        function W(e, t, n, i) {
            const s = t[n] || {};
            for (const r of Object.keys(s))
                if (r.includes(i)) {
                    const i = s[r];
                    H(e, t, n, i.originalHandler, i.delegationSelector)
                }
        }
        function V(e) {
            return e = e.replace(M, ""),
            $[e] || e
        }
        const F = {
            on(e, t, n, i) {
                G(e, t, n, i, !1)
            },
            one(e, t, n, i) {
                G(e, t, n, i, !0)
            },
            off(e, t, n, i) {
                if ("string" != typeof t || !e)
                    return;
                const [s,r,o] = B(t, n, i)
                  , a = o !== t
                  , l = j(e)
                  , d = t.startsWith(".");
                if (void 0 !== r) {
                    if (!l || !l[o])
                        return;
                    return void H(e, l, o, r, s ? n : null)
                }
                if (d)
                    for (const n of Object.keys(l))
                        W(e, l, n, t.slice(1));
                const c = l[o] || {};
                for (const n of Object.keys(c)) {
                    const i = n.replace(L, "");
                    if (!a || t.includes(i)) {
                        const t = c[n];
                        H(e, l, o, t.originalHandler, t.delegationSelector)
                    }
                }
            },
            trigger(e, t, n) {
                if ("string" != typeof t || !e)
                    return null;
                const i = u();
                let s = null
                  , r = !0
                  , o = !0
                  , a = !1;
                t !== V(t) && i && (s = i.Event(t, n),
                i(e).trigger(s),
                r = !s.isPropagationStopped(),
                o = !s.isImmediatePropagationStopped(),
                a = s.isDefaultPrevented());
                const l = new Event(t,{
                    bubbles: r,
                    cancelable: !0
                });
                if (void 0 !== n)
                    for (const e of Object.keys(n))
                        Object.defineProperty(l, e, {
                            get: ()=>n[e]
                        });
                return a && l.preventDefault(),
                o && e.dispatchEvent(l),
                l.defaultPrevented && s && s.preventDefault(),
                l
            }
        }
          , R = F
          , q = new Map
          , Y = {
            set(e, t, n) {
                q.has(e) || q.set(e, new Map);
                const i = q.get(e);
                i.has(t) || 0 === i.size ? i.set(t, n) : console.error(`Bootstrap doesn't allow more than one instance per element. Bound instance: ${Array.from(i.keys())[0]}.`)
            },
            get: (e,t)=>q.has(e) && q.get(e).get(t) || null,
            remove(e, t) {
                if (!q.has(e))
                    return;
                const n = q.get(e);
                n.delete(t),
                0 === n.size && q.delete(e)
            }
        };
        const X = class {
            static get Default() {
                return {}
            }
            static get DefaultType() {
                return {}
            }
            static get NAME() {
                throw new Error('You have to implement the static method "NAME", for each component!')
            }
            _getConfig(e) {
                return e = this._mergeConfigObj(e),
                e = this._configAfterMerge(e),
                this._typeCheckConfig(e),
                e
            }
            _configAfterMerge(e) {
                return e
            }
            _mergeConfigObj(e, t) {
                const n = o(t) ? x.getDataAttribute(t, "config") : {};
                return {
                    ...this.constructor.Default,
                    ..."object" == typeof n ? n : {},
                    ...o(t) ? x.getDataAttributes(t) : {},
                    ..."object" == typeof e ? e : {}
                }
            }
            _typeCheckConfig(e, t=this.constructor.DefaultType) {
                for (const i of Object.keys(t)) {
                    const s = t[i]
                      , r = e[i]
                      , a = o(r) ? "element" : null == (n = r) ? `${n}` : Object.prototype.toString.call(n).match(/\s([a-z]+)/i)[1].toLowerCase();
                    if (!new RegExp(s).test(a))
                        throw new TypeError(`${this.constructor.NAME.toUpperCase()}: Option "${i}" provided type "${a}" but expected type "${s}".`)
                }
                var n
            }
        }
        ;
        const K = class extends X {
            constructor(e, t) {
                super(),
                (e = a(e)) && (this._element = e,
                this._config = this._getConfig(t),
                Y.set(this._element, this.constructor.DATA_KEY, this))
            }
            dispose() {
                Y.remove(this._element, this.constructor.DATA_KEY),
                R.off(this._element, this.constructor.EVENT_KEY);
                for (const e of Object.getOwnPropertyNames(this))
                    this[e] = null
            }
            _queueCallback(e, t, n=!0) {
                v(e, t, n)
            }
            _getConfig(e) {
                return e = this._mergeConfigObj(e, this._element),
                e = this._configAfterMerge(e),
                this._typeCheckConfig(e),
                e
            }
            static getInstance(e) {
                return Y.get(a(e), this.DATA_KEY)
            }
            static getOrCreateInstance(e, t={}) {
                return this.getInstance(e) || new this(e,"object" == typeof t ? t : null)
            }
            static get VERSION() {
                return "5.2.0-beta1"
            }
            static get DATA_KEY() {
                return `bs.${this.NAME}`
            }
            static get EVENT_KEY() {
                return `.${this.DATA_KEY}`
            }
            static eventName(e) {
                return `${e}${this.EVENT_KEY}`
            }
        }
          , U = "backdrop"
          , Q = "show"
          , J = `mousedown.bs.${U}`
          , Z = {
            className: "modal-backdrop",
            isVisible: !0,
            isAnimated: !1,
            rootElement: "body",
            clickCallback: null
        }
          , ee = {
            className: "string",
            isVisible: "boolean",
            isAnimated: "boolean",
            rootElement: "(element|string)",
            clickCallback: "(function|null)"
        };
        const te = class extends X {
            constructor(e) {
                super(),
                this._config = this._getConfig(e),
                this._isAppended = !1,
                this._element = null
            }
            static get Default() {
                return Z
            }
            static get DefaultType() {
                return ee
            }
            static get NAME() {
                return U
            }
            show(e) {
                if (!this._config.isVisible)
                    return void g(e);
                this._append();
                const t = this._getElement();
                this._config.isAnimated && p(t),
                t.classList.add(Q),
                this._emulateAnimation((()=>{
                    g(e)
                }
                ))
            }
            hide(e) {
                this._config.isVisible ? (this._getElement().classList.remove(Q),
                this._emulateAnimation((()=>{
                    this.dispose(),
                    g(e)
                }
                ))) : g(e)
            }
            dispose() {
                this._isAppended && (R.off(this._element, J),
                this._element.remove(),
                this._isAppended = !1)
            }
            _getElement() {
                if (!this._element) {
                    const e = document.createElement("div");
                    e.className = this._config.className,
                    this._config.isAnimated && e.classList.add("fade"),
                    this._element = e
                }
                return this._element
            }
            _configAfterMerge(e) {
                return e.rootElement = a(e.rootElement),
                e
            }
            _append() {
                if (this._isAppended)
                    return;
                const e = this._getElement();
                this._config.rootElement.append(e),
                R.on(e, J, (()=>{
                    g(this._config.clickCallback)
                }
                )),
                this._isAppended = !0
            }
            _emulateAnimation(e) {
                v(e, this._getElement(), this._config.isAnimated)
            }
        }
          , ne = ".bs.focustrap"
          , ie = `focusin${ne}`
          , se = `keydown.tab${ne}`
          , re = "backward"
          , oe = {
            trapElement: null,
            autofocus: !0
        }
          , ae = {
            trapElement: "element",
            autofocus: "boolean"
        };
        const le = class extends X {
            constructor(e) {
                super(),
                this._config = this._getConfig(e),
                this._isActive = !1,
                this._lastTabNavDirection = null
            }
            static get Default() {
                return oe
            }
            static get DefaultType() {
                return ae
            }
            static get NAME() {
                return "focustrap"
            }
            activate() {
                this._isActive || (this._config.autofocus && this._config.trapElement.focus(),
                R.off(document, ne),
                R.on(document, ie, (e=>this._handleFocusin(e))),
                R.on(document, se, (e=>this._handleKeydown(e))),
                this._isActive = !0)
            }
            deactivate() {
                this._isActive && (this._isActive = !1,
                R.off(document, ne))
            }
            _handleFocusin(e) {
                const {trapElement: t} = this._config;
                if (e.target === document || e.target === t || t.contains(e.target))
                    return;
                const n = w.focusableChildren(t);
                0 === n.length ? t.focus() : this._lastTabNavDirection === re ? n[n.length - 1].focus() : n[0].focus()
            }
            _handleKeydown(e) {
                "Tab" === e.key && (this._lastTabNavDirection = e.shiftKey ? re : "forward")
            }
        }
          , de = "show"
          , ce = "showing"
          , pe = "hiding"
          , ue = ".offcanvas.show"
          , fe = "hidePrevented.bs.offcanvas"
          , he = "hidden.bs.offcanvas"
          , me = {
            backdrop: !0,
            keyboard: !0,
            scroll: !1
        }
          , ge = {
            backdrop: "(boolean|string)",
            keyboard: "boolean",
            scroll: "boolean"
        };
        class ve extends K {
            constructor(e, t) {
                super(e, t),
                this._isShown = !1,
                this._backdrop = this._initializeBackDrop(),
                this._focustrap = this._initializeFocusTrap(),
                this._addEventListeners()
            }
            static get Default() {
                return me
            }
            static get DefaultType() {
                return ge
            }
            static get NAME() {
                return "offcanvas"
            }
            toggle(e) {
                return this._isShown ? this.hide() : this.show(e)
            }
            show(e) {
                if (this._isShown)
                    return;
                if (R.trigger(this._element, "show.bs.offcanvas", {
                    relatedTarget: e
                }).defaultPrevented)
                    return;
                this._isShown = !0,
                this._backdrop.show(),
                this._config.scroll || (new k).hide(),
                this._element.setAttribute("aria-modal", !0),
                this._element.setAttribute("role", "dialog"),
                this._element.classList.add(ce);
                this._queueCallback((()=>{
                    this._config.scroll || this._focustrap.activate(),
                    this._element.classList.add(de),
                    this._element.classList.remove(ce),
                    R.trigger(this._element, "shown.bs.offcanvas", {
                        relatedTarget: e
                    })
                }
                ), this._element, !0)
            }
            hide() {
                if (!this._isShown)
                    return;
                if (R.trigger(this._element, "hide.bs.offcanvas").defaultPrevented)
                    return;
                this._focustrap.deactivate(),
                this._element.blur(),
                this._isShown = !1,
                this._element.classList.add(pe),
                this._backdrop.hide();
                this._queueCallback((()=>{
                    this._element.classList.remove(de, pe),
                    this._element.removeAttribute("aria-modal"),
                    this._element.removeAttribute("role"),
                    this._config.scroll || (new k).reset(),
                    R.trigger(this._element, he)
                }
                ), this._element, !0)
            }
            dispose() {
                this._backdrop.dispose(),
                this._focustrap.deactivate(),
                super.dispose()
            }
            _initializeBackDrop() {
                const e = Boolean(this._config.backdrop);
                return new te({
                    className: "offcanvas-backdrop",
                    isVisible: e,
                    isAnimated: !0,
                    rootElement: this._element.parentNode,
                    clickCallback: e ? ()=>{
                        "static" !== this._config.backdrop ? this.hide() : R.trigger(this._element, fe)
                    }
                    : null
                })
            }
            _initializeFocusTrap() {
                return new le({
                    trapElement: this._element
                })
            }
            _addEventListeners() {
                R.on(this._element, "keydown.dismiss.bs.offcanvas", (e=>{
                    "Escape" === e.key && (this._config.keyboard ? this.hide() : R.trigger(this._element, fe))
                }
                ))
            }
            static jQueryInterface(e) {
                return this.each((function() {
                    const t = ve.getOrCreateInstance(this, e);
                    if ("string" == typeof e) {
                        if (void 0 === t[e] || e.startsWith("_") || "constructor" === e)
                            throw new TypeError(`No method named "${e}"`);
                        t[e](this)
                    }
                }
                ))
            }
        }
        R.on(document, "click.bs.offcanvas.data-api", '[data-bs-toggle="offcanvas"]', (function(e) {
            const t = r(this);
            if (["A", "AREA"].includes(this.tagName) && e.preventDefault(),
            d(this))
                return;
            R.one(t, he, (()=>{
                l(this) && this.focus()
            }
            ));
            const n = w.findOne(ue);
            n && n !== t && ve.getInstance(n).hide();
            ve.getOrCreateInstance(t).toggle(this)
        }
        )),
        R.on(window, "load.bs.offcanvas.data-api", (()=>{
            for (const e of w.find(ue))
                ve.getOrCreateInstance(e).show()
        }
        )),
        R.on(window, "resize.bs.offcanvas", (()=>{
            for (const e of w.find("[aria-modal][class*=show][class*=offcanvas-]"))
                "fixed" !== getComputedStyle(e).position && ve.getOrCreateInstance(e).hide()
        }
        )),
        ((e,t="hide")=>{
            const n = `click.dismiss${e.EVENT_KEY}`
              , i = e.NAME;
            R.on(document, n, `[data-bs-dismiss="${i}"]`, (function(n) {
                if (["A", "AREA"].includes(this.tagName) && n.preventDefault(),
                d(this))
                    return;
                const s = r(this) || this.closest(`.${i}`);
                e.getOrCreateInstance(s)[t]()
            }
            ))
        }
        )(ve),
        m(ve);
        const be = "show"
          , we = "collapse"
          , ye = "collapsing"
          , Ee = '[data-bs-toggle="collapse"]'
          , Te = {
            toggle: !0,
            parent: null
        }
          , xe = {
            toggle: "boolean",
            parent: "(null|element)"
        };
        class Ce extends K {
            constructor(e, t) {
                super(e, t),
                this._isTransitioning = !1,
                this._triggerArray = [];
                const n = w.find(Ee);
                for (const e of n) {
                    const t = s(e)
                      , n = w.find(t).filter((e=>e === this._element));
                    null !== t && n.length && this._triggerArray.push(e)
                }
                this._initializeChildren(),
                this._config.parent || this._addAriaAndCollapsedClass(this._triggerArray, this._isShown()),
                this._config.toggle && this.toggle()
            }
            static get Default() {
                return Te
            }
            static get DefaultType() {
                return xe
            }
            static get NAME() {
                return "collapse"
            }
            toggle() {
                this._isShown() ? this.hide() : this.show()
            }
            show() {
                if (this._isTransitioning || this._isShown())
                    return;
                let e = [];
                if (this._config.parent && (e = this._getFirstLevelChildren(".collapse.show, .collapse.collapsing").filter((e=>e !== this._element)).map((e=>Ce.getOrCreateInstance(e, {
                    toggle: !1
                })))),
                e.length && e[0]._isTransitioning)
                    return;
                if (R.trigger(this._element, "show.bs.collapse").defaultPrevented)
                    return;
                for (const t of e)
                    t.hide();
                const t = this._getDimension();
                this._element.classList.remove(we),
                this._element.classList.add(ye),
                this._element.style[t] = 0,
                this._addAriaAndCollapsedClass(this._triggerArray, !0),
                this._isTransitioning = !0;
                const n = `scroll${t[0].toUpperCase() + t.slice(1)}`;
                this._queueCallback((()=>{
                    this._isTransitioning = !1,
                    this._element.classList.remove(ye),
                    this._element.classList.add(we, be),
                    this._element.style[t] = "",
                    R.trigger(this._element, "shown.bs.collapse")
                }
                ), this._element, !0),
                this._element.style[t] = `${this._element[n]}px`
            }
            hide() {
                if (this._isTransitioning || !this._isShown())
                    return;
                if (R.trigger(this._element, "hide.bs.collapse").defaultPrevented)
                    return;
                const e = this._getDimension();
                this._element.style[e] = `${this._element.getBoundingClientRect()[e]}px`,
                p(this._element),
                this._element.classList.add(ye),
                this._element.classList.remove(we, be);
                for (const e of this._triggerArray) {
                    const t = r(e);
                    t && !this._isShown(t) && this._addAriaAndCollapsedClass([e], !1)
                }
                this._isTransitioning = !0;
                this._element.style[e] = "",
                this._queueCallback((()=>{
                    this._isTransitioning = !1,
                    this._element.classList.remove(ye),
                    this._element.classList.add(we),
                    R.trigger(this._element, "hidden.bs.collapse")
                }
                ), this._element, !0)
            }
            _isShown(e=this._element) {
                return e.classList.contains(be)
            }
            _configAfterMerge(e) {
                return e.toggle = Boolean(e.toggle),
                e.parent = a(e.parent),
                e
            }
            _getDimension() {
                return this._element.classList.contains("collapse-horizontal") ? "width" : "height"
            }
            _initializeChildren() {
                if (!this._config.parent)
                    return;
                const e = this._getFirstLevelChildren(Ee);
                for (const t of e) {
                    const e = r(t);
                    e && this._addAriaAndCollapsedClass([t], this._isShown(e))
                }
            }
            _getFirstLevelChildren(e) {
                const t = w.find(":scope .collapse .collapse", this._config.parent);
                return w.find(e, this._config.parent).filter((e=>!t.includes(e)))
            }
            _addAriaAndCollapsedClass(e, t) {
                if (e.length)
                    for (const n of e)
                        n.classList.toggle("collapsed", !t),
                        n.setAttribute("aria-expanded", t)
            }
            static jQueryInterface(e) {
                const t = {};
                return "string" == typeof e && /show|hide/.test(e) && (t.toggle = !1),
                this.each((function() {
                    const n = Ce.getOrCreateInstance(this, t);
                    if ("string" == typeof e) {
                        if (void 0 === n[e])
                            throw new TypeError(`No method named "${e}"`);
                        n[e]()
                    }
                }
                ))
            }
        }
        R.on(document, "click.bs.collapse.data-api", Ee, (function(e) {
            ("A" === e.target.tagName || e.delegateTarget && "A" === e.delegateTarget.tagName) && e.preventDefault();
            const t = s(this)
              , n = w.find(t);
            for (const e of n)
                Ce.getOrCreateInstance(e, {
                    toggle: !1
                }).toggle()
        }
        )),
        m(Ce);
        var Se = "top"
          , _e = "bottom"
          , Oe = "right"
          , ke = "left"
          , Ae = "auto"
          , Me = [Se, _e, Oe, ke]
          , Le = "start"
          , Pe = "end"
          , De = "clippingParents"
          , $e = "viewport"
          , Ne = "popper"
          , Ie = "reference"
          , je = Me.reduce((function(e, t) {
            return e.concat([t + "-" + Le, t + "-" + Pe])
        }
        ), [])
          , ze = [].concat(Me, [Ae]).reduce((function(e, t) {
            return e.concat([t, t + "-" + Le, t + "-" + Pe])
        }
        ), [])
          , Be = "beforeRead"
          , Ge = "read"
          , He = "afterRead"
          , We = "beforeMain"
          , Ve = "main"
          , Fe = "afterMain"
          , Re = "beforeWrite"
          , qe = "write"
          , Ye = "afterWrite"
          , Xe = [Be, Ge, He, We, Ve, Fe, Re, qe, Ye];
        function Ke(e) {
            return e ? (e.nodeName || "").toLowerCase() : null
        }
        function Ue(e) {
            if (null == e)
                return window;
            if ("[object Window]" !== e.toString()) {
                var t = e.ownerDocument;
                return t && t.defaultView || window
            }
            return e
        }
        function Qe(e) {
            return e instanceof Ue(e).Element || e instanceof Element
        }
        function Je(e) {
            return e instanceof Ue(e).HTMLElement || e instanceof HTMLElement
        }
        function Ze(e) {
            return "undefined" != typeof ShadowRoot && (e instanceof Ue(e).ShadowRoot || e instanceof ShadowRoot)
        }
        const et = {
            name: "applyStyles",
            enabled: !0,
            phase: "write",
            fn: function(e) {
                var t = e.state;
                Object.keys(t.elements).forEach((function(e) {
                    var n = t.styles[e] || {}
                      , i = t.attributes[e] || {}
                      , s = t.elements[e];
                    Je(s) && Ke(s) && (Object.assign(s.style, n),
                    Object.keys(i).forEach((function(e) {
                        var t = i[e];
                        !1 === t ? s.removeAttribute(e) : s.setAttribute(e, !0 === t ? "" : t)
                    }
                    )))
                }
                ))
            },
            effect: function(e) {
                var t = e.state
                  , n = {
                    popper: {
                        position: t.options.strategy,
                        left: "0",
                        top: "0",
                        margin: "0"
                    },
                    arrow: {
                        position: "absolute"
                    },
                    reference: {}
                };
                return Object.assign(t.elements.popper.style, n.popper),
                t.styles = n,
                t.elements.arrow && Object.assign(t.elements.arrow.style, n.arrow),
                function() {
                    Object.keys(t.elements).forEach((function(e) {
                        var i = t.elements[e]
                          , s = t.attributes[e] || {}
                          , r = Object.keys(t.styles.hasOwnProperty(e) ? t.styles[e] : n[e]).reduce((function(e, t) {
                            return e[t] = "",
                            e
                        }
                        ), {});
                        Je(i) && Ke(i) && (Object.assign(i.style, r),
                        Object.keys(s).forEach((function(e) {
                            i.removeAttribute(e)
                        }
                        )))
                    }
                    ))
                }
            },
            requires: ["computeStyles"]
        };
        function tt(e) {
            return e.split("-")[0]
        }
        var nt = Math.max
          , it = Math.min
          , st = Math.round;
        function rt(e, t) {
            void 0 === t && (t = !1);
            var n = e.getBoundingClientRect()
              , i = 1
              , s = 1;
            if (Je(e) && t) {
                var r = e.offsetHeight
                  , o = e.offsetWidth;
                o > 0 && (i = st(n.width) / o || 1),
                r > 0 && (s = st(n.height) / r || 1)
            }
            return {
                width: n.width / i,
                height: n.height / s,
                top: n.top / s,
                right: n.right / i,
                bottom: n.bottom / s,
                left: n.left / i,
                x: n.left / i,
                y: n.top / s
            }
        }
        function ot(e) {
            var t = rt(e)
              , n = e.offsetWidth
              , i = e.offsetHeight;
            return Math.abs(t.width - n) <= 1 && (n = t.width),
            Math.abs(t.height - i) <= 1 && (i = t.height),
            {
                x: e.offsetLeft,
                y: e.offsetTop,
                width: n,
                height: i
            }
        }
        function at(e, t) {
            var n = t.getRootNode && t.getRootNode();
            if (e.contains(t))
                return !0;
            if (n && Ze(n)) {
                var i = t;
                do {
                    if (i && e.isSameNode(i))
                        return !0;
                    i = i.parentNode || i.host
                } while (i)
            }
            return !1
        }
        function lt(e) {
            return Ue(e).getComputedStyle(e)
        }
        function dt(e) {
            return ["table", "td", "th"].indexOf(Ke(e)) >= 0
        }
        function ct(e) {
            return ((Qe(e) ? e.ownerDocument : e.document) || window.document).documentElement
        }
        function pt(e) {
            return "html" === Ke(e) ? e : e.assignedSlot || e.parentNode || (Ze(e) ? e.host : null) || ct(e)
        }
        function ut(e) {
            return Je(e) && "fixed" !== lt(e).position ? e.offsetParent : null
        }
        function ft(e) {
            for (var t = Ue(e), n = ut(e); n && dt(n) && "static" === lt(n).position; )
                n = ut(n);
            return n && ("html" === Ke(n) || "body" === Ke(n) && "static" === lt(n).position) ? t : n || function(e) {
                var t = -1 !== navigator.userAgent.toLowerCase().indexOf("firefox");
                if (-1 !== navigator.userAgent.indexOf("Trident") && Je(e) && "fixed" === lt(e).position)
                    return null;
                var n = pt(e);
                for (Ze(n) && (n = n.host); Je(n) && ["html", "body"].indexOf(Ke(n)) < 0; ) {
                    var i = lt(n);
                    if ("none" !== i.transform || "none" !== i.perspective || "paint" === i.contain || -1 !== ["transform", "perspective"].indexOf(i.willChange) || t && "filter" === i.willChange || t && i.filter && "none" !== i.filter)
                        return n;
                    n = n.parentNode
                }
                return null
            }(e) || t
        }
        function ht(e) {
            return ["top", "bottom"].indexOf(e) >= 0 ? "x" : "y"
        }
        function mt(e, t, n) {
            return nt(e, it(t, n))
        }
        function gt(e) {
            return Object.assign({}, {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }, e)
        }
        function vt(e, t) {
            return t.reduce((function(t, n) {
                return t[n] = e,
                t
            }
            ), {})
        }
        const bt = {
            name: "arrow",
            enabled: !0,
            phase: "main",
            fn: function(e) {
                var t, n = e.state, i = e.name, s = e.options, r = n.elements.arrow, o = n.modifiersData.popperOffsets, a = tt(n.placement), l = ht(a), d = [ke, Oe].indexOf(a) >= 0 ? "height" : "width";
                if (r && o) {
                    var c = function(e, t) {
                        return gt("number" != typeof (e = "function" == typeof e ? e(Object.assign({}, t.rects, {
                            placement: t.placement
                        })) : e) ? e : vt(e, Me))
                    }(s.padding, n)
                      , p = ot(r)
                      , u = "y" === l ? Se : ke
                      , f = "y" === l ? _e : Oe
                      , h = n.rects.reference[d] + n.rects.reference[l] - o[l] - n.rects.popper[d]
                      , m = o[l] - n.rects.reference[l]
                      , g = ft(r)
                      , v = g ? "y" === l ? g.clientHeight || 0 : g.clientWidth || 0 : 0
                      , b = h / 2 - m / 2
                      , w = c[u]
                      , y = v - p[d] - c[f]
                      , E = v / 2 - p[d] / 2 + b
                      , T = mt(w, E, y)
                      , x = l;
                    n.modifiersData[i] = ((t = {})[x] = T,
                    t.centerOffset = T - E,
                    t)
                }
            },
            effect: function(e) {
                var t = e.state
                  , n = e.options.element
                  , i = void 0 === n ? "[data-popper-arrow]" : n;
                null != i && ("string" != typeof i || (i = t.elements.popper.querySelector(i))) && at(t.elements.popper, i) && (t.elements.arrow = i)
            },
            requires: ["popperOffsets"],
            requiresIfExists: ["preventOverflow"]
        };
        function wt(e) {
            return e.split("-")[1]
        }
        var yt = {
            top: "auto",
            right: "auto",
            bottom: "auto",
            left: "auto"
        };
        function Et(e) {
            var t, n = e.popper, i = e.popperRect, s = e.placement, r = e.variation, o = e.offsets, a = e.position, l = e.gpuAcceleration, d = e.adaptive, c = e.roundOffsets, p = e.isFixed, u = o.x, f = void 0 === u ? 0 : u, h = o.y, m = void 0 === h ? 0 : h, g = "function" == typeof c ? c({
                x: f,
                y: m
            }) : {
                x: f,
                y: m
            };
            f = g.x,
            m = g.y;
            var v = o.hasOwnProperty("x")
              , b = o.hasOwnProperty("y")
              , w = ke
              , y = Se
              , E = window;
            if (d) {
                var T = ft(n)
                  , x = "clientHeight"
                  , C = "clientWidth";
                if (T === Ue(n) && "static" !== lt(T = ct(n)).position && "absolute" === a && (x = "scrollHeight",
                C = "scrollWidth"),
                s === Se || (s === ke || s === Oe) && r === Pe)
                    y = _e,
                    m -= (p && T === E && E.visualViewport ? E.visualViewport.height : T[x]) - i.height,
                    m *= l ? 1 : -1;
                if (s === ke || (s === Se || s === _e) && r === Pe)
                    w = Oe,
                    f -= (p && T === E && E.visualViewport ? E.visualViewport.width : T[C]) - i.width,
                    f *= l ? 1 : -1
            }
            var S, _ = Object.assign({
                position: a
            }, d && yt), O = !0 === c ? function(e) {
                var t = e.x
                  , n = e.y
                  , i = window.devicePixelRatio || 1;
                return {
                    x: st(t * i) / i || 0,
                    y: st(n * i) / i || 0
                }
            }({
                x: f,
                y: m
            }) : {
                x: f,
                y: m
            };
            return f = O.x,
            m = O.y,
            l ? Object.assign({}, _, ((S = {})[y] = b ? "0" : "",
            S[w] = v ? "0" : "",
            S.transform = (E.devicePixelRatio || 1) <= 1 ? "translate(" + f + "px, " + m + "px)" : "translate3d(" + f + "px, " + m + "px, 0)",
            S)) : Object.assign({}, _, ((t = {})[y] = b ? m + "px" : "",
            t[w] = v ? f + "px" : "",
            t.transform = "",
            t))
        }
        const Tt = {
            name: "computeStyles",
            enabled: !0,
            phase: "beforeWrite",
            fn: function(e) {
                var t = e.state
                  , n = e.options
                  , i = n.gpuAcceleration
                  , s = void 0 === i || i
                  , r = n.adaptive
                  , o = void 0 === r || r
                  , a = n.roundOffsets
                  , l = void 0 === a || a
                  , d = {
                    placement: tt(t.placement),
                    variation: wt(t.placement),
                    popper: t.elements.popper,
                    popperRect: t.rects.popper,
                    gpuAcceleration: s,
                    isFixed: "fixed" === t.options.strategy
                };
                null != t.modifiersData.popperOffsets && (t.styles.popper = Object.assign({}, t.styles.popper, Et(Object.assign({}, d, {
                    offsets: t.modifiersData.popperOffsets,
                    position: t.options.strategy,
                    adaptive: o,
                    roundOffsets: l
                })))),
                null != t.modifiersData.arrow && (t.styles.arrow = Object.assign({}, t.styles.arrow, Et(Object.assign({}, d, {
                    offsets: t.modifiersData.arrow,
                    position: "absolute",
                    adaptive: !1,
                    roundOffsets: l
                })))),
                t.attributes.popper = Object.assign({}, t.attributes.popper, {
                    "data-popper-placement": t.placement
                })
            },
            data: {}
        };
        var xt = {
            passive: !0
        };
        const Ct = {
            name: "eventListeners",
            enabled: !0,
            phase: "write",
            fn: function() {},
            effect: function(e) {
                var t = e.state
                  , n = e.instance
                  , i = e.options
                  , s = i.scroll
                  , r = void 0 === s || s
                  , o = i.resize
                  , a = void 0 === o || o
                  , l = Ue(t.elements.popper)
                  , d = [].concat(t.scrollParents.reference, t.scrollParents.popper);
                return r && d.forEach((function(e) {
                    e.addEventListener("scroll", n.update, xt)
                }
                )),
                a && l.addEventListener("resize", n.update, xt),
                function() {
                    r && d.forEach((function(e) {
                        e.removeEventListener("scroll", n.update, xt)
                    }
                    )),
                    a && l.removeEventListener("resize", n.update, xt)
                }
            },
            data: {}
        };
        var St = {
            left: "right",
            right: "left",
            bottom: "top",
            top: "bottom"
        };
        function _t(e) {
            return e.replace(/left|right|bottom|top/g, (function(e) {
                return St[e]
            }
            ))
        }
        var Ot = {
            start: "end",
            end: "start"
        };
        function kt(e) {
            return e.replace(/start|end/g, (function(e) {
                return Ot[e]
            }
            ))
        }
        function At(e) {
            var t = Ue(e);
            return {
                scrollLeft: t.pageXOffset,
                scrollTop: t.pageYOffset
            }
        }
        function Mt(e) {
            return rt(ct(e)).left + At(e).scrollLeft
        }
        function Lt(e) {
            var t = lt(e)
              , n = t.overflow
              , i = t.overflowX
              , s = t.overflowY;
            return /auto|scroll|overlay|hidden/.test(n + s + i)
        }
        function Pt(e) {
            return ["html", "body", "#document"].indexOf(Ke(e)) >= 0 ? e.ownerDocument.body : Je(e) && Lt(e) ? e : Pt(pt(e))
        }
        function Dt(e, t) {
            var n;
            void 0 === t && (t = []);
            var i = Pt(e)
              , s = i === (null == (n = e.ownerDocument) ? void 0 : n.body)
              , r = Ue(i)
              , o = s ? [r].concat(r.visualViewport || [], Lt(i) ? i : []) : i
              , a = t.concat(o);
            return s ? a : a.concat(Dt(pt(o)))
        }
        function $t(e) {
            return Object.assign({}, e, {
                left: e.x,
                top: e.y,
                right: e.x + e.width,
                bottom: e.y + e.height
            })
        }
        function Nt(e, t) {
            return t === $e ? $t(function(e) {
                var t = Ue(e)
                  , n = ct(e)
                  , i = t.visualViewport
                  , s = n.clientWidth
                  , r = n.clientHeight
                  , o = 0
                  , a = 0;
                return i && (s = i.width,
                r = i.height,
                /^((?!chrome|android).)*safari/i.test(navigator.userAgent) || (o = i.offsetLeft,
                a = i.offsetTop)),
                {
                    width: s,
                    height: r,
                    x: o + Mt(e),
                    y: a
                }
            }(e)) : Qe(t) ? function(e) {
                var t = rt(e);
                return t.top = t.top + e.clientTop,
                t.left = t.left + e.clientLeft,
                t.bottom = t.top + e.clientHeight,
                t.right = t.left + e.clientWidth,
                t.width = e.clientWidth,
                t.height = e.clientHeight,
                t.x = t.left,
                t.y = t.top,
                t
            }(t) : $t(function(e) {
                var t, n = ct(e), i = At(e), s = null == (t = e.ownerDocument) ? void 0 : t.body, r = nt(n.scrollWidth, n.clientWidth, s ? s.scrollWidth : 0, s ? s.clientWidth : 0), o = nt(n.scrollHeight, n.clientHeight, s ? s.scrollHeight : 0, s ? s.clientHeight : 0), a = -i.scrollLeft + Mt(e), l = -i.scrollTop;
                return "rtl" === lt(s || n).direction && (a += nt(n.clientWidth, s ? s.clientWidth : 0) - r),
                {
                    width: r,
                    height: o,
                    x: a,
                    y: l
                }
            }(ct(e)))
        }
        function It(e, t, n) {
            var i = "clippingParents" === t ? function(e) {
                var t = Dt(pt(e))
                  , n = ["absolute", "fixed"].indexOf(lt(e).position) >= 0 && Je(e) ? ft(e) : e;
                return Qe(n) ? t.filter((function(e) {
                    return Qe(e) && at(e, n) && "body" !== Ke(e)
                }
                )) : []
            }(e) : [].concat(t)
              , s = [].concat(i, [n])
              , r = s[0]
              , o = s.reduce((function(t, n) {
                var i = Nt(e, n);
                return t.top = nt(i.top, t.top),
                t.right = it(i.right, t.right),
                t.bottom = it(i.bottom, t.bottom),
                t.left = nt(i.left, t.left),
                t
            }
            ), Nt(e, r));
            return o.width = o.right - o.left,
            o.height = o.bottom - o.top,
            o.x = o.left,
            o.y = o.top,
            o
        }
        function jt(e) {
            var t, n = e.reference, i = e.element, s = e.placement, r = s ? tt(s) : null, o = s ? wt(s) : null, a = n.x + n.width / 2 - i.width / 2, l = n.y + n.height / 2 - i.height / 2;
            switch (r) {
            case Se:
                t = {
                    x: a,
                    y: n.y - i.height
                };
                break;
            case _e:
                t = {
                    x: a,
                    y: n.y + n.height
                };
                break;
            case Oe:
                t = {
                    x: n.x + n.width,
                    y: l
                };
                break;
            case ke:
                t = {
                    x: n.x - i.width,
                    y: l
                };
                break;
            default:
                t = {
                    x: n.x,
                    y: n.y
                }
            }
            var d = r ? ht(r) : null;
            if (null != d) {
                var c = "y" === d ? "height" : "width";
                switch (o) {
                case Le:
                    t[d] = t[d] - (n[c] / 2 - i[c] / 2);
                    break;
                case Pe:
                    t[d] = t[d] + (n[c] / 2 - i[c] / 2)
                }
            }
            return t
        }
        function zt(e, t) {
            void 0 === t && (t = {});
            var n = t
              , i = n.placement
              , s = void 0 === i ? e.placement : i
              , r = n.boundary
              , o = void 0 === r ? De : r
              , a = n.rootBoundary
              , l = void 0 === a ? $e : a
              , d = n.elementContext
              , c = void 0 === d ? Ne : d
              , p = n.altBoundary
              , u = void 0 !== p && p
              , f = n.padding
              , h = void 0 === f ? 0 : f
              , m = gt("number" != typeof h ? h : vt(h, Me))
              , g = c === Ne ? Ie : Ne
              , v = e.rects.popper
              , b = e.elements[u ? g : c]
              , w = It(Qe(b) ? b : b.contextElement || ct(e.elements.popper), o, l)
              , y = rt(e.elements.reference)
              , E = jt({
                reference: y,
                element: v,
                strategy: "absolute",
                placement: s
            })
              , T = $t(Object.assign({}, v, E))
              , x = c === Ne ? T : y
              , C = {
                top: w.top - x.top + m.top,
                bottom: x.bottom - w.bottom + m.bottom,
                left: w.left - x.left + m.left,
                right: x.right - w.right + m.right
            }
              , S = e.modifiersData.offset;
            if (c === Ne && S) {
                var _ = S[s];
                Object.keys(C).forEach((function(e) {
                    var t = [Oe, _e].indexOf(e) >= 0 ? 1 : -1
                      , n = [Se, _e].indexOf(e) >= 0 ? "y" : "x";
                    C[e] += _[n] * t
                }
                ))
            }
            return C
        }
        const Bt = {
            name: "flip",
            enabled: !0,
            phase: "main",
            fn: function(e) {
                var t = e.state
                  , n = e.options
                  , i = e.name;
                if (!t.modifiersData[i]._skip) {
                    for (var s = n.mainAxis, r = void 0 === s || s, o = n.altAxis, a = void 0 === o || o, l = n.fallbackPlacements, d = n.padding, c = n.boundary, p = n.rootBoundary, u = n.altBoundary, f = n.flipVariations, h = void 0 === f || f, m = n.allowedAutoPlacements, g = t.options.placement, v = tt(g), b = l || (v === g || !h ? [_t(g)] : function(e) {
                        if (tt(e) === Ae)
                            return [];
                        var t = _t(e);
                        return [kt(e), t, kt(t)]
                    }(g)), w = [g].concat(b).reduce((function(e, n) {
                        return e.concat(tt(n) === Ae ? function(e, t) {
                            void 0 === t && (t = {});
                            var n = t
                              , i = n.placement
                              , s = n.boundary
                              , r = n.rootBoundary
                              , o = n.padding
                              , a = n.flipVariations
                              , l = n.allowedAutoPlacements
                              , d = void 0 === l ? ze : l
                              , c = wt(i)
                              , p = c ? a ? je : je.filter((function(e) {
                                return wt(e) === c
                            }
                            )) : Me
                              , u = p.filter((function(e) {
                                return d.indexOf(e) >= 0
                            }
                            ));
                            0 === u.length && (u = p);
                            var f = u.reduce((function(t, n) {
                                return t[n] = zt(e, {
                                    placement: n,
                                    boundary: s,
                                    rootBoundary: r,
                                    padding: o
                                })[tt(n)],
                                t
                            }
                            ), {});
                            return Object.keys(f).sort((function(e, t) {
                                return f[e] - f[t]
                            }
                            ))
                        }(t, {
                            placement: n,
                            boundary: c,
                            rootBoundary: p,
                            padding: d,
                            flipVariations: h,
                            allowedAutoPlacements: m
                        }) : n)
                    }
                    ), []), y = t.rects.reference, E = t.rects.popper, T = new Map, x = !0, C = w[0], S = 0; S < w.length; S++) {
                        var _ = w[S]
                          , O = tt(_)
                          , k = wt(_) === Le
                          , A = [Se, _e].indexOf(O) >= 0
                          , M = A ? "width" : "height"
                          , L = zt(t, {
                            placement: _,
                            boundary: c,
                            rootBoundary: p,
                            altBoundary: u,
                            padding: d
                        })
                          , P = A ? k ? Oe : ke : k ? _e : Se;
                        y[M] > E[M] && (P = _t(P));
                        var D = _t(P)
                          , $ = [];
                        if (r && $.push(L[O] <= 0),
                        a && $.push(L[P] <= 0, L[D] <= 0),
                        $.every((function(e) {
                            return e
                        }
                        ))) {
                            C = _,
                            x = !1;
                            break
                        }
                        T.set(_, $)
                    }
                    if (x)
                        for (var N = function(e) {
                            var t = w.find((function(t) {
                                var n = T.get(t);
                                if (n)
                                    return n.slice(0, e).every((function(e) {
                                        return e
                                    }
                                    ))
                            }
                            ));
                            if (t)
                                return C = t,
                                "break"
                        }, I = h ? 3 : 1; I > 0; I--) {
                            if ("break" === N(I))
                                break
                        }
                    t.placement !== C && (t.modifiersData[i]._skip = !0,
                    t.placement = C,
                    t.reset = !0)
                }
            },
            requiresIfExists: ["offset"],
            data: {
                _skip: !1
            }
        };
        function Gt(e, t, n) {
            return void 0 === n && (n = {
                x: 0,
                y: 0
            }),
            {
                top: e.top - t.height - n.y,
                right: e.right - t.width + n.x,
                bottom: e.bottom - t.height + n.y,
                left: e.left - t.width - n.x
            }
        }
        function Ht(e) {
            return [Se, Oe, _e, ke].some((function(t) {
                return e[t] >= 0
            }
            ))
        }
        const Wt = {
            name: "hide",
            enabled: !0,
            phase: "main",
            requiresIfExists: ["preventOverflow"],
            fn: function(e) {
                var t = e.state
                  , n = e.name
                  , i = t.rects.reference
                  , s = t.rects.popper
                  , r = t.modifiersData.preventOverflow
                  , o = zt(t, {
                    elementContext: "reference"
                })
                  , a = zt(t, {
                    altBoundary: !0
                })
                  , l = Gt(o, i)
                  , d = Gt(a, s, r)
                  , c = Ht(l)
                  , p = Ht(d);
                t.modifiersData[n] = {
                    referenceClippingOffsets: l,
                    popperEscapeOffsets: d,
                    isReferenceHidden: c,
                    hasPopperEscaped: p
                },
                t.attributes.popper = Object.assign({}, t.attributes.popper, {
                    "data-popper-reference-hidden": c,
                    "data-popper-escaped": p
                })
            }
        };
        const Vt = {
            name: "offset",
            enabled: !0,
            phase: "main",
            requires: ["popperOffsets"],
            fn: function(e) {
                var t = e.state
                  , n = e.options
                  , i = e.name
                  , s = n.offset
                  , r = void 0 === s ? [0, 0] : s
                  , o = ze.reduce((function(e, n) {
                    return e[n] = function(e, t, n) {
                        var i = tt(e)
                          , s = [ke, Se].indexOf(i) >= 0 ? -1 : 1
                          , r = "function" == typeof n ? n(Object.assign({}, t, {
                            placement: e
                        })) : n
                          , o = r[0]
                          , a = r[1];
                        return o = o || 0,
                        a = (a || 0) * s,
                        [ke, Oe].indexOf(i) >= 0 ? {
                            x: a,
                            y: o
                        } : {
                            x: o,
                            y: a
                        }
                    }(n, t.rects, r),
                    e
                }
                ), {})
                  , a = o[t.placement]
                  , l = a.x
                  , d = a.y;
                null != t.modifiersData.popperOffsets && (t.modifiersData.popperOffsets.x += l,
                t.modifiersData.popperOffsets.y += d),
                t.modifiersData[i] = o
            }
        };
        const Ft = {
            name: "popperOffsets",
            enabled: !0,
            phase: "read",
            fn: function(e) {
                var t = e.state
                  , n = e.name;
                t.modifiersData[n] = jt({
                    reference: t.rects.reference,
                    element: t.rects.popper,
                    strategy: "absolute",
                    placement: t.placement
                })
            },
            data: {}
        };
        const Rt = {
            name: "preventOverflow",
            enabled: !0,
            phase: "main",
            fn: function(e) {
                var t = e.state
                  , n = e.options
                  , i = e.name
                  , s = n.mainAxis
                  , r = void 0 === s || s
                  , o = n.altAxis
                  , a = void 0 !== o && o
                  , l = n.boundary
                  , d = n.rootBoundary
                  , c = n.altBoundary
                  , p = n.padding
                  , u = n.tether
                  , f = void 0 === u || u
                  , h = n.tetherOffset
                  , m = void 0 === h ? 0 : h
                  , g = zt(t, {
                    boundary: l,
                    rootBoundary: d,
                    padding: p,
                    altBoundary: c
                })
                  , v = tt(t.placement)
                  , b = wt(t.placement)
                  , w = !b
                  , y = ht(v)
                  , E = "x" === y ? "y" : "x"
                  , T = t.modifiersData.popperOffsets
                  , x = t.rects.reference
                  , C = t.rects.popper
                  , S = "function" == typeof m ? m(Object.assign({}, t.rects, {
                    placement: t.placement
                })) : m
                  , _ = "number" == typeof S ? {
                    mainAxis: S,
                    altAxis: S
                } : Object.assign({
                    mainAxis: 0,
                    altAxis: 0
                }, S)
                  , O = t.modifiersData.offset ? t.modifiersData.offset[t.placement] : null
                  , k = {
                    x: 0,
                    y: 0
                };
                if (T) {
                    if (r) {
                        var A, M = "y" === y ? Se : ke, L = "y" === y ? _e : Oe, P = "y" === y ? "height" : "width", D = T[y], $ = D + g[M], N = D - g[L], I = f ? -C[P] / 2 : 0, j = b === Le ? x[P] : C[P], z = b === Le ? -C[P] : -x[P], B = t.elements.arrow, G = f && B ? ot(B) : {
                            width: 0,
                            height: 0
                        }, H = t.modifiersData["arrow#persistent"] ? t.modifiersData["arrow#persistent"].padding : {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0
                        }, W = H[M], V = H[L], F = mt(0, x[P], G[P]), R = w ? x[P] / 2 - I - F - W - _.mainAxis : j - F - W - _.mainAxis, q = w ? -x[P] / 2 + I + F + V + _.mainAxis : z + F + V + _.mainAxis, Y = t.elements.arrow && ft(t.elements.arrow), X = Y ? "y" === y ? Y.clientTop || 0 : Y.clientLeft || 0 : 0, K = null != (A = null == O ? void 0 : O[y]) ? A : 0, U = D + q - K, Q = mt(f ? it($, D + R - K - X) : $, D, f ? nt(N, U) : N);
                        T[y] = Q,
                        k[y] = Q - D
                    }
                    if (a) {
                        var J, Z = "x" === y ? Se : ke, ee = "x" === y ? _e : Oe, te = T[E], ne = "y" === E ? "height" : "width", ie = te + g[Z], se = te - g[ee], re = -1 !== [Se, ke].indexOf(v), oe = null != (J = null == O ? void 0 : O[E]) ? J : 0, ae = re ? ie : te - x[ne] - C[ne] - oe + _.altAxis, le = re ? te + x[ne] + C[ne] - oe - _.altAxis : se, de = f && re ? function(e, t, n) {
                            var i = mt(e, t, n);
                            return i > n ? n : i
                        }(ae, te, le) : mt(f ? ae : ie, te, f ? le : se);
                        T[E] = de,
                        k[E] = de - te
                    }
                    t.modifiersData[i] = k
                }
            },
            requiresIfExists: ["offset"]
        };
        function qt(e, t, n) {
            void 0 === n && (n = !1);
            var i, s, r = Je(t), o = Je(t) && function(e) {
                var t = e.getBoundingClientRect()
                  , n = st(t.width) / e.offsetWidth || 1
                  , i = st(t.height) / e.offsetHeight || 1;
                return 1 !== n || 1 !== i
            }(t), a = ct(t), l = rt(e, o), d = {
                scrollLeft: 0,
                scrollTop: 0
            }, c = {
                x: 0,
                y: 0
            };
            return (r || !r && !n) && (("body" !== Ke(t) || Lt(a)) && (d = (i = t) !== Ue(i) && Je(i) ? {
                scrollLeft: (s = i).scrollLeft,
                scrollTop: s.scrollTop
            } : At(i)),
            Je(t) ? ((c = rt(t, !0)).x += t.clientLeft,
            c.y += t.clientTop) : a && (c.x = Mt(a))),
            {
                x: l.left + d.scrollLeft - c.x,
                y: l.top + d.scrollTop - c.y,
                width: l.width,
                height: l.height
            }
        }
        function Yt(e) {
            var t = new Map
              , n = new Set
              , i = [];
            function s(e) {
                n.add(e.name),
                [].concat(e.requires || [], e.requiresIfExists || []).forEach((function(e) {
                    if (!n.has(e)) {
                        var i = t.get(e);
                        i && s(i)
                    }
                }
                )),
                i.push(e)
            }
            return e.forEach((function(e) {
                t.set(e.name, e)
            }
            )),
            e.forEach((function(e) {
                n.has(e.name) || s(e)
            }
            )),
            i
        }
        var Xt = {
            placement: "bottom",
            modifiers: [],
            strategy: "absolute"
        };
        function Kt() {
            for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++)
                t[n] = arguments[n];
            return !t.some((function(e) {
                return !(e && "function" == typeof e.getBoundingClientRect)
            }
            ))
        }
        function Ut(e) {
            void 0 === e && (e = {});
            var t = e
              , n = t.defaultModifiers
              , i = void 0 === n ? [] : n
              , s = t.defaultOptions
              , r = void 0 === s ? Xt : s;
            return function(e, t, n) {
                void 0 === n && (n = r);
                var s, o, a = {
                    placement: "bottom",
                    orderedModifiers: [],
                    options: Object.assign({}, Xt, r),
                    modifiersData: {},
                    elements: {
                        reference: e,
                        popper: t
                    },
                    attributes: {},
                    styles: {}
                }, l = [], d = !1, c = {
                    state: a,
                    setOptions: function(n) {
                        var s = "function" == typeof n ? n(a.options) : n;
                        p(),
                        a.options = Object.assign({}, r, a.options, s),
                        a.scrollParents = {
                            reference: Qe(e) ? Dt(e) : e.contextElement ? Dt(e.contextElement) : [],
                            popper: Dt(t)
                        };
                        var o = function(e) {
                            var t = Yt(e);
                            return Xe.reduce((function(e, n) {
                                return e.concat(t.filter((function(e) {
                                    return e.phase === n
                                }
                                )))
                            }
                            ), [])
                        }(function(e) {
                            var t = e.reduce((function(e, t) {
                                var n = e[t.name];
                                return e[t.name] = n ? Object.assign({}, n, t, {
                                    options: Object.assign({}, n.options, t.options),
                                    data: Object.assign({}, n.data, t.data)
                                }) : t,
                                e
                            }
                            ), {});
                            return Object.keys(t).map((function(e) {
                                return t[e]
                            }
                            ))
                        }([].concat(i, a.options.modifiers)));
                        return a.orderedModifiers = o.filter((function(e) {
                            return e.enabled
                        }
                        )),
                        a.orderedModifiers.forEach((function(e) {
                            var t = e.name
                              , n = e.options
                              , i = void 0 === n ? {} : n
                              , s = e.effect;
                            if ("function" == typeof s) {
                                var r = s({
                                    state: a,
                                    name: t,
                                    instance: c,
                                    options: i
                                })
                                  , o = function() {};
                                l.push(r || o)
                            }
                        }
                        )),
                        c.update()
                    },
                    forceUpdate: function() {
                        if (!d) {
                            var e = a.elements
                              , t = e.reference
                              , n = e.popper;
                            if (Kt(t, n)) {
                                a.rects = {
                                    reference: qt(t, ft(n), "fixed" === a.options.strategy),
                                    popper: ot(n)
                                },
                                a.reset = !1,
                                a.placement = a.options.placement,
                                a.orderedModifiers.forEach((function(e) {
                                    return a.modifiersData[e.name] = Object.assign({}, e.data)
                                }
                                ));
                                for (var i = 0; i < a.orderedModifiers.length; i++)
                                    if (!0 !== a.reset) {
                                        var s = a.orderedModifiers[i]
                                          , r = s.fn
                                          , o = s.options
                                          , l = void 0 === o ? {} : o
                                          , p = s.name;
                                        "function" == typeof r && (a = r({
                                            state: a,
                                            options: l,
                                            name: p,
                                            instance: c
                                        }) || a)
                                    } else
                                        a.reset = !1,
                                        i = -1
                            }
                        }
                    },
                    update: (s = function() {
                        return new Promise((function(e) {
                            c.forceUpdate(),
                            e(a)
                        }
                        ))
                    }
                    ,
                    function() {
                        return o || (o = new Promise((function(e) {
                            Promise.resolve().then((function() {
                                o = void 0,
                                e(s())
                            }
                            ))
                        }
                        ))),
                        o
                    }
                    ),
                    destroy: function() {
                        p(),
                        d = !0
                    }
                };
                if (!Kt(e, t))
                    return c;
                function p() {
                    l.forEach((function(e) {
                        return e()
                    }
                    )),
                    l = []
                }
                return c.setOptions(n).then((function(e) {
                    !d && n.onFirstUpdate && n.onFirstUpdate(e)
                }
                )),
                c
            }
        }
        var Qt = Ut()
          , Jt = Ut({
            defaultModifiers: [Ct, Ft, Tt, et, Vt, Bt, Rt, bt, Wt]
        })
          , Zt = Ut({
            defaultModifiers: [Ct, Ft, Tt, et]
        });
        const en = "dropdown"
          , tn = "ArrowUp"
          , nn = "ArrowDown"
          , sn = "click.bs.dropdown.data-api"
          , rn = "keydown.bs.dropdown.data-api"
          , on = "show"
          , an = '[data-bs-toggle="dropdown"]:not(.disabled):not(:disabled)'
          , ln = `${an}.show`
          , dn = ".dropdown-menu"
          , cn = h() ? "top-end" : "top-start"
          , pn = h() ? "top-start" : "top-end"
          , un = h() ? "bottom-end" : "bottom-start"
          , fn = h() ? "bottom-start" : "bottom-end"
          , hn = h() ? "left-start" : "right-start"
          , mn = h() ? "right-start" : "left-start"
          , gn = {
            offset: [0, 2],
            boundary: "clippingParents",
            reference: "toggle",
            display: "dynamic",
            popperConfig: null,
            autoClose: !0
        }
          , vn = {
            offset: "(array|string|function)",
            boundary: "(string|element)",
            reference: "(string|element|object)",
            display: "string",
            popperConfig: "(null|object|function)",
            autoClose: "(boolean|string)"
        };
        class bn extends K {
            constructor(e, t) {
                super(e, t),
                this._popper = null,
                this._parent = this._element.parentNode,
                this._menu = w.findOne(dn, this._parent),
                this._inNavbar = this._detectNavbar()
            }
            static get Default() {
                return gn
            }
            static get DefaultType() {
                return vn
            }
            static get NAME() {
                return en
            }
            toggle() {
                return this._isShown() ? this.hide() : this.show()
            }
            show() {
                if (d(this._element) || this._isShown())
                    return;
                const e = {
                    relatedTarget: this._element
                };
                if (!R.trigger(this._element, "show.bs.dropdown", e).defaultPrevented) {
                    if (this._createPopper(),
                    "ontouchstart"in document.documentElement && !this._parent.closest(".navbar-nav"))
                        for (const e of [].concat(...document.body.children))
                            R.on(e, "mouseover", c);
                    this._element.focus(),
                    this._element.setAttribute("aria-expanded", !0),
                    this._menu.classList.add(on),
                    this._element.classList.add(on),
                    R.trigger(this._element, "shown.bs.dropdown", e)
                }
            }
            hide() {
                if (d(this._element) || !this._isShown())
                    return;
                const e = {
                    relatedTarget: this._element
                };
                this._completeHide(e)
            }
            dispose() {
                this._popper && this._popper.destroy(),
                super.dispose()
            }
            update() {
                this._inNavbar = this._detectNavbar(),
                this._popper && this._popper.update()
            }
            _completeHide(e) {
                if (!R.trigger(this._element, "hide.bs.dropdown", e).defaultPrevented) {
                    if ("ontouchstart"in document.documentElement)
                        for (const e of [].concat(...document.body.children))
                            R.off(e, "mouseover", c);
                    this._popper && this._popper.destroy(),
                    this._menu.classList.remove(on),
                    this._element.classList.remove(on),
                    this._element.setAttribute("aria-expanded", "false"),
                    x.removeDataAttribute(this._menu, "popper"),
                    R.trigger(this._element, "hidden.bs.dropdown", e)
                }
            }
            _getConfig(e) {
                if ("object" == typeof (e = super._getConfig(e)).reference && !o(e.reference) && "function" != typeof e.reference.getBoundingClientRect)
                    throw new TypeError(`${en.toUpperCase()}: Option "reference" provided type "object" without a required "getBoundingClientRect" method.`);
                return e
            }
            _createPopper() {
                if (void 0 === t)
                    throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)");
                let e = this._element;
                "parent" === this._config.reference ? e = this._parent : o(this._config.reference) ? e = a(this._config.reference) : "object" == typeof this._config.reference && (e = this._config.reference);
                const n = this._getPopperConfig();
                this._popper = Jt(e, this._menu, n)
            }
            _isShown() {
                return this._menu.classList.contains(on)
            }
            _getPlacement() {
                const e = this._parent;
                if (e.classList.contains("dropend"))
                    return hn;
                if (e.classList.contains("dropstart"))
                    return mn;
                if (e.classList.contains("dropup-center"))
                    return "top";
                if (e.classList.contains("dropdown-center"))
                    return "bottom";
                const t = "end" === getComputedStyle(this._menu).getPropertyValue("--bs-position").trim();
                return e.classList.contains("dropup") ? t ? pn : cn : t ? fn : un
            }
            _detectNavbar() {
                return null !== this._element.closest(".navbar")
            }
            _getOffset() {
                const {offset: e} = this._config;
                return "string" == typeof e ? e.split(",").map((e=>Number.parseInt(e, 10))) : "function" == typeof e ? t=>e(t, this._element) : e
            }
            _getPopperConfig() {
                const e = {
                    placement: this._getPlacement(),
                    modifiers: [{
                        name: "preventOverflow",
                        options: {
                            boundary: this._config.boundary
                        }
                    }, {
                        name: "offset",
                        options: {
                            offset: this._getOffset()
                        }
                    }]
                };
                return (this._inNavbar || "static" === this._config.display) && (x.setDataAttribute(this._menu, "popper", "static"),
                e.modifiers = [{
                    name: "applyStyles",
                    enabled: !1
                }]),
                {
                    ...e,
                    ..."function" == typeof this._config.popperConfig ? this._config.popperConfig(e) : this._config.popperConfig
                }
            }
            _selectMenuItem({key: e, target: t}) {
                const n = w.find(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", this._menu).filter((e=>l(e)));
                n.length && ((e,t,n,i)=>{
                    const s = e.length;
                    let r = e.indexOf(t);
                    return -1 === r ? !n && i ? e[s - 1] : e[0] : (r += n ? 1 : -1,
                    i && (r = (r + s) % s),
                    e[Math.max(0, Math.min(r, s - 1))])
                }
                )(n, t, e === nn, !n.includes(t)).focus()
            }
            static jQueryInterface(e) {
                return this.each((function() {
                    const t = bn.getOrCreateInstance(this, e);
                    if ("string" == typeof e) {
                        if (void 0 === t[e])
                            throw new TypeError(`No method named "${e}"`);
                        t[e]()
                    }
                }
                ))
            }
            static clearMenus(e) {
                if (2 === e.button || "keyup" === e.type && "Tab" !== e.key)
                    return;
                const t = w.find(ln);
                for (const n of t) {
                    const t = bn.getInstance(n);
                    if (!t || !1 === t._config.autoClose)
                        continue;
                    const i = e.composedPath()
                      , s = i.includes(t._menu);
                    if (i.includes(t._element) || "inside" === t._config.autoClose && !s || "outside" === t._config.autoClose && s)
                        continue;
                    if (t._menu.contains(e.target) && ("keyup" === e.type && "Tab" === e.key || /input|select|option|textarea|form/i.test(e.target.tagName)))
                        continue;
                    const r = {
                        relatedTarget: t._element
                    };
                    "click" === e.type && (r.clickEvent = e),
                    t._completeHide(r)
                }
            }
            static dataApiKeydownHandler(e) {
                const t = /input|textarea/i.test(e.target.tagName)
                  , n = "Escape" === e.key
                  , i = [tn, nn].includes(e.key);
                if (!i && !n)
                    return;
                if (t && !n)
                    return;
                e.preventDefault();
                const s = w.findOne(an, e.delegateTarget.parentNode)
                  , r = bn.getOrCreateInstance(s);
                if (i)
                    return e.stopPropagation(),
                    r.show(),
                    void r._selectMenuItem(e);
                r._isShown() && (e.stopPropagation(),
                r.hide(),
                s.focus())
            }
        }
        R.on(document, rn, an, bn.dataApiKeydownHandler),
        R.on(document, rn, dn, bn.dataApiKeydownHandler),
        R.on(document, sn, bn.clearMenus),
        R.on(document, "keyup.bs.dropdown.data-api", bn.clearMenus),
        R.on(document, sn, an, (function(e) {
            e.preventDefault(),
            bn.getOrCreateInstance(this).toggle()
        }
        )),
        m(bn);
        function wn(e) {
            return null !== e && "object" == typeof e && "constructor"in e && e.constructor === Object
        }
        function yn(e={}, t={}) {
            Object.keys(t).forEach((n=>{
                void 0 === e[n] ? e[n] = t[n] : wn(t[n]) && wn(e[n]) && Object.keys(t[n]).length > 0 && yn(e[n], t[n])
            }
            ))
        }
        const En = {
            body: {},
            addEventListener() {},
            removeEventListener() {},
            activeElement: {
                blur() {},
                nodeName: ""
            },
            querySelector: ()=>null,
            querySelectorAll: ()=>[],
            getElementById: ()=>null,
            createEvent: ()=>({
                initEvent() {}
            }),
            createElement: ()=>({
                children: [],
                childNodes: [],
                style: {},
                setAttribute() {},
                getElementsByTagName: ()=>[]
            }),
            createElementNS: ()=>({}),
            importNode: ()=>null,
            location: {
                hash: "",
                host: "",
                hostname: "",
                href: "",
                origin: "",
                pathname: "",
                protocol: "",
                search: ""
            }
        };
        function Tn() {
            const e = "undefined" != typeof document ? document : {};
            return yn(e, En),
            e
        }
        const xn = {
            document: En,
            navigator: {
                userAgent: ""
            },
            location: {
                hash: "",
                host: "",
                hostname: "",
                href: "",
                origin: "",
                pathname: "",
                protocol: "",
                search: ""
            },
            history: {
                replaceState() {},
                pushState() {},
                go() {},
                back() {}
            },
            CustomEvent: function() {
                return this
            },
            addEventListener() {},
            removeEventListener() {},
            getComputedStyle: ()=>({
                getPropertyValue: ()=>""
            }),
            Image() {},
            Date() {},
            screen: {},
            setTimeout() {},
            clearTimeout() {},
            matchMedia: ()=>({}),
            requestAnimationFrame: e=>"undefined" == typeof setTimeout ? (e(),
            null) : setTimeout(e, 0),
            cancelAnimationFrame(e) {
                "undefined" != typeof setTimeout && clearTimeout(e)
            }
        };
        function Cn() {
            const e = "undefined" != typeof window ? window : {};
            return yn(e, xn),
            e
        }
        class Sn extends Array {
            constructor(e) {
                "number" == typeof e ? super(e) : (super(...e || []),
                function(e) {
                    const t = e.__proto__;
                    Object.defineProperty(e, "__proto__", {
                        get: ()=>t,
                        set(e) {
                            t.__proto__ = e
                        }
                    })
                }(this))
            }
        }
        function _n(e=[]) {
            const t = [];
            return e.forEach((e=>{
                Array.isArray(e) ? t.push(..._n(e)) : t.push(e)
            }
            )),
            t
        }
        function On(e, t) {
            return Array.prototype.filter.call(e, t)
        }
        function kn(e, t) {
            const n = Cn()
              , i = Tn();
            let s = [];
            if (!t && e instanceof Sn)
                return e;
            if (!e)
                return new Sn(s);
            if ("string" == typeof e) {
                const n = e.trim();
                if (n.indexOf("<") >= 0 && n.indexOf(">") >= 0) {
                    let e = "div";
                    0 === n.indexOf("<li") && (e = "ul"),
                    0 === n.indexOf("<tr") && (e = "tbody"),
                    0 !== n.indexOf("<td") && 0 !== n.indexOf("<th") || (e = "tr"),
                    0 === n.indexOf("<tbody") && (e = "table"),
                    0 === n.indexOf("<option") && (e = "select");
                    const t = i.createElement(e);
                    t.innerHTML = n;
                    for (let e = 0; e < t.childNodes.length; e += 1)
                        s.push(t.childNodes[e])
                } else
                    s = function(e, t) {
                        if ("string" != typeof e)
                            return [e];
                        const n = []
                          , i = t.querySelectorAll(e);
                        for (let e = 0; e < i.length; e += 1)
                            n.push(i[e]);
                        return n
                    }(e.trim(), t || i)
            } else if (e.nodeType || e === n || e === i)
                s.push(e);
            else if (Array.isArray(e)) {
                if (e instanceof Sn)
                    return e;
                s = e
            }
            return new Sn(function(e) {
                const t = [];
                for (let n = 0; n < e.length; n += 1)
                    -1 === t.indexOf(e[n]) && t.push(e[n]);
                return t
            }(s))
        }
        kn.fn = Sn.prototype;
        const An = "resize scroll".split(" ");
        function Mn(e) {
            return function(...t) {
                if (void 0 === t[0]) {
                    for (let t = 0; t < this.length; t += 1)
                        An.indexOf(e) < 0 && (e in this[t] ? this[t][e]() : kn(this[t]).trigger(e));
                    return this
                }
                return this.on(e, ...t)
            }
        }
        Mn("click"),
        Mn("blur"),
        Mn("focus"),
        Mn("focusin"),
        Mn("focusout"),
        Mn("keyup"),
        Mn("keydown"),
        Mn("keypress"),
        Mn("submit"),
        Mn("change"),
        Mn("mousedown"),
        Mn("mousemove"),
        Mn("mouseup"),
        Mn("mouseenter"),
        Mn("mouseleave"),
        Mn("mouseout"),
        Mn("mouseover"),
        Mn("touchstart"),
        Mn("touchend"),
        Mn("touchmove"),
        Mn("resize"),
        Mn("scroll");
        const Ln = {
            addClass: function(...e) {
                const t = _n(e.map((e=>e.split(" "))));
                return this.forEach((e=>{
                    e.classList.add(...t)
                }
                )),
                this
            },
            removeClass: function(...e) {
                const t = _n(e.map((e=>e.split(" "))));
                return this.forEach((e=>{
                    e.classList.remove(...t)
                }
                )),
                this
            },
            hasClass: function(...e) {
                const t = _n(e.map((e=>e.split(" "))));
                return On(this, (e=>t.filter((t=>e.classList.contains(t))).length > 0)).length > 0
            },
            toggleClass: function(...e) {
                const t = _n(e.map((e=>e.split(" "))));
                this.forEach((e=>{
                    t.forEach((t=>{
                        e.classList.toggle(t)
                    }
                    ))
                }
                ))
            },
            attr: function(e, t) {
                if (1 === arguments.length && "string" == typeof e)
                    return this[0] ? this[0].getAttribute(e) : void 0;
                for (let n = 0; n < this.length; n += 1)
                    if (2 === arguments.length)
                        this[n].setAttribute(e, t);
                    else
                        for (const t in e)
                            this[n][t] = e[t],
                            this[n].setAttribute(t, e[t]);
                return this
            },
            removeAttr: function(e) {
                for (let t = 0; t < this.length; t += 1)
                    this[t].removeAttribute(e);
                return this
            },
            transform: function(e) {
                for (let t = 0; t < this.length; t += 1)
                    this[t].style.transform = e;
                return this
            },
            transition: function(e) {
                for (let t = 0; t < this.length; t += 1)
                    this[t].style.transitionDuration = "string" != typeof e ? `${e}ms` : e;
                return this
            },
            on: function(...e) {
                let[t,n,i,s] = e;
                function r(e) {
                    const t = e.target;
                    if (!t)
                        return;
                    const s = e.target.dom7EventData || [];
                    if (s.indexOf(e) < 0 && s.unshift(e),
                    kn(t).is(n))
                        i.apply(t, s);
                    else {
                        const e = kn(t).parents();
                        for (let t = 0; t < e.length; t += 1)
                            kn(e[t]).is(n) && i.apply(e[t], s)
                    }
                }
                function o(e) {
                    const t = e && e.target && e.target.dom7EventData || [];
                    t.indexOf(e) < 0 && t.unshift(e),
                    i.apply(this, t)
                }
                "function" == typeof e[1] && ([t,i,s] = e,
                n = void 0),
                s || (s = !1);
                const a = t.split(" ");
                let l;
                for (let e = 0; e < this.length; e += 1) {
                    const t = this[e];
                    if (n)
                        for (l = 0; l < a.length; l += 1) {
                            const e = a[l];
                            t.dom7LiveListeners || (t.dom7LiveListeners = {}),
                            t.dom7LiveListeners[e] || (t.dom7LiveListeners[e] = []),
                            t.dom7LiveListeners[e].push({
                                listener: i,
                                proxyListener: r
                            }),
                            t.addEventListener(e, r, s)
                        }
                    else
                        for (l = 0; l < a.length; l += 1) {
                            const e = a[l];
                            t.dom7Listeners || (t.dom7Listeners = {}),
                            t.dom7Listeners[e] || (t.dom7Listeners[e] = []),
                            t.dom7Listeners[e].push({
                                listener: i,
                                proxyListener: o
                            }),
                            t.addEventListener(e, o, s)
                        }
                }
                return this
            },
            off: function(...e) {
                let[t,n,i,s] = e;
                "function" == typeof e[1] && ([t,i,s] = e,
                n = void 0),
                s || (s = !1);
                const r = t.split(" ");
                for (let e = 0; e < r.length; e += 1) {
                    const t = r[e];
                    for (let e = 0; e < this.length; e += 1) {
                        const r = this[e];
                        let o;
                        if (!n && r.dom7Listeners ? o = r.dom7Listeners[t] : n && r.dom7LiveListeners && (o = r.dom7LiveListeners[t]),
                        o && o.length)
                            for (let e = o.length - 1; e >= 0; e -= 1) {
                                const n = o[e];
                                i && n.listener === i || i && n.listener && n.listener.dom7proxy && n.listener.dom7proxy === i ? (r.removeEventListener(t, n.proxyListener, s),
                                o.splice(e, 1)) : i || (r.removeEventListener(t, n.proxyListener, s),
                                o.splice(e, 1))
                            }
                    }
                }
                return this
            },
            trigger: function(...e) {
                const t = Cn()
                  , n = e[0].split(" ")
                  , i = e[1];
                for (let s = 0; s < n.length; s += 1) {
                    const r = n[s];
                    for (let n = 0; n < this.length; n += 1) {
                        const s = this[n];
                        if (t.CustomEvent) {
                            const n = new t.CustomEvent(r,{
                                detail: i,
                                bubbles: !0,
                                cancelable: !0
                            });
                            s.dom7EventData = e.filter(((e,t)=>t > 0)),
                            s.dispatchEvent(n),
                            s.dom7EventData = [],
                            delete s.dom7EventData
                        }
                    }
                }
                return this
            },
            transitionEnd: function(e) {
                const t = this;
                return e && t.on("transitionend", (function n(i) {
                    i.target === this && (e.call(this, i),
                    t.off("transitionend", n))
                }
                )),
                this
            },
            outerWidth: function(e) {
                if (this.length > 0) {
                    if (e) {
                        const e = this.styles();
                        return this[0].offsetWidth + parseFloat(e.getPropertyValue("margin-right")) + parseFloat(e.getPropertyValue("margin-left"))
                    }
                    return this[0].offsetWidth
                }
                return null
            },
            outerHeight: function(e) {
                if (this.length > 0) {
                    if (e) {
                        const e = this.styles();
                        return this[0].offsetHeight + parseFloat(e.getPropertyValue("margin-top")) + parseFloat(e.getPropertyValue("margin-bottom"))
                    }
                    return this[0].offsetHeight
                }
                return null
            },
            styles: function() {
                const e = Cn();
                return this[0] ? e.getComputedStyle(this[0], null) : {}
            },
            offset: function() {
                if (this.length > 0) {
                    const e = Cn()
                      , t = Tn()
                      , n = this[0]
                      , i = n.getBoundingClientRect()
                      , s = t.body
                      , r = n.clientTop || s.clientTop || 0
                      , o = n.clientLeft || s.clientLeft || 0
                      , a = n === e ? e.scrollY : n.scrollTop
                      , l = n === e ? e.scrollX : n.scrollLeft;
                    return {
                        top: i.top + a - r,
                        left: i.left + l - o
                    }
                }
                return null
            },
            css: function(e, t) {
                const n = Cn();
                let i;
                if (1 === arguments.length) {
                    if ("string" != typeof e) {
                        for (i = 0; i < this.length; i += 1)
                            for (const t in e)
                                this[i].style[t] = e[t];
                        return this
                    }
                    if (this[0])
                        return n.getComputedStyle(this[0], null).getPropertyValue(e)
                }
                if (2 === arguments.length && "string" == typeof e) {
                    for (i = 0; i < this.length; i += 1)
                        this[i].style[e] = t;
                    return this
                }
                return this
            },
            each: function(e) {
                return e ? (this.forEach(((t,n)=>{
                    e.apply(t, [t, n])
                }
                )),
                this) : this
            },
            html: function(e) {
                if (void 0 === e)
                    return this[0] ? this[0].innerHTML : null;
                for (let t = 0; t < this.length; t += 1)
                    this[t].innerHTML = e;
                return this
            },
            text: function(e) {
                if (void 0 === e)
                    return this[0] ? this[0].textContent.trim() : null;
                for (let t = 0; t < this.length; t += 1)
                    this[t].textContent = e;
                return this
            },
            is: function(e) {
                const t = Cn()
                  , n = Tn()
                  , i = this[0];
                let s, r;
                if (!i || void 0 === e)
                    return !1;
                if ("string" == typeof e) {
                    if (i.matches)
                        return i.matches(e);
                    if (i.webkitMatchesSelector)
                        return i.webkitMatchesSelector(e);
                    if (i.msMatchesSelector)
                        return i.msMatchesSelector(e);
                    for (s = kn(e),
                    r = 0; r < s.length; r += 1)
                        if (s[r] === i)
                            return !0;
                    return !1
                }
                if (e === n)
                    return i === n;
                if (e === t)
                    return i === t;
                if (e.nodeType || e instanceof Sn) {
                    for (s = e.nodeType ? [e] : e,
                    r = 0; r < s.length; r += 1)
                        if (s[r] === i)
                            return !0;
                    return !1
                }
                return !1
            },
            index: function() {
                let e, t = this[0];
                if (t) {
                    for (e = 0; null !== (t = t.previousSibling); )
                        1 === t.nodeType && (e += 1);
                    return e
                }
            },
            eq: function(e) {
                if (void 0 === e)
                    return this;
                const t = this.length;
                if (e > t - 1)
                    return kn([]);
                if (e < 0) {
                    const n = t + e;
                    return kn(n < 0 ? [] : [this[n]])
                }
                return kn([this[e]])
            },
            append: function(...e) {
                let t;
                const n = Tn();
                for (let i = 0; i < e.length; i += 1) {
                    t = e[i];
                    for (let e = 0; e < this.length; e += 1)
                        if ("string" == typeof t) {
                            const i = n.createElement("div");
                            for (i.innerHTML = t; i.firstChild; )
                                this[e].appendChild(i.firstChild)
                        } else if (t instanceof Sn)
                            for (let n = 0; n < t.length; n += 1)
                                this[e].appendChild(t[n]);
                        else
                            this[e].appendChild(t)
                }
                return this
            },
            prepend: function(e) {
                const t = Tn();
                let n, i;
                for (n = 0; n < this.length; n += 1)
                    if ("string" == typeof e) {
                        const s = t.createElement("div");
                        for (s.innerHTML = e,
                        i = s.childNodes.length - 1; i >= 0; i -= 1)
                            this[n].insertBefore(s.childNodes[i], this[n].childNodes[0])
                    } else if (e instanceof Sn)
                        for (i = 0; i < e.length; i += 1)
                            this[n].insertBefore(e[i], this[n].childNodes[0]);
                    else
                        this[n].insertBefore(e, this[n].childNodes[0]);
                return this
            },
            next: function(e) {
                return this.length > 0 ? e ? this[0].nextElementSibling && kn(this[0].nextElementSibling).is(e) ? kn([this[0].nextElementSibling]) : kn([]) : this[0].nextElementSibling ? kn([this[0].nextElementSibling]) : kn([]) : kn([])
            },
            nextAll: function(e) {
                const t = [];
                let n = this[0];
                if (!n)
                    return kn([]);
                for (; n.nextElementSibling; ) {
                    const i = n.nextElementSibling;
                    e ? kn(i).is(e) && t.push(i) : t.push(i),
                    n = i
                }
                return kn(t)
            },
            prev: function(e) {
                if (this.length > 0) {
                    const t = this[0];
                    return e ? t.previousElementSibling && kn(t.previousElementSibling).is(e) ? kn([t.previousElementSibling]) : kn([]) : t.previousElementSibling ? kn([t.previousElementSibling]) : kn([])
                }
                return kn([])
            },
            prevAll: function(e) {
                const t = [];
                let n = this[0];
                if (!n)
                    return kn([]);
                for (; n.previousElementSibling; ) {
                    const i = n.previousElementSibling;
                    e ? kn(i).is(e) && t.push(i) : t.push(i),
                    n = i
                }
                return kn(t)
            },
            parent: function(e) {
                const t = [];
                for (let n = 0; n < this.length; n += 1)
                    null !== this[n].parentNode && (e ? kn(this[n].parentNode).is(e) && t.push(this[n].parentNode) : t.push(this[n].parentNode));
                return kn(t)
            },
            parents: function(e) {
                const t = [];
                for (let n = 0; n < this.length; n += 1) {
                    let i = this[n].parentNode;
                    for (; i; )
                        e ? kn(i).is(e) && t.push(i) : t.push(i),
                        i = i.parentNode
                }
                return kn(t)
            },
            closest: function(e) {
                let t = this;
                return void 0 === e ? kn([]) : (t.is(e) || (t = t.parents(e).eq(0)),
                t)
            },
            find: function(e) {
                const t = [];
                for (let n = 0; n < this.length; n += 1) {
                    const i = this[n].querySelectorAll(e);
                    for (let e = 0; e < i.length; e += 1)
                        t.push(i[e])
                }
                return kn(t)
            },
            children: function(e) {
                const t = [];
                for (let n = 0; n < this.length; n += 1) {
                    const i = this[n].children;
                    for (let n = 0; n < i.length; n += 1)
                        e && !kn(i[n]).is(e) || t.push(i[n])
                }
                return kn(t)
            },
            filter: function(e) {
                return kn(On(this, e))
            },
            remove: function() {
                for (let e = 0; e < this.length; e += 1)
                    this[e].parentNode && this[e].parentNode.removeChild(this[e]);
                return this
            }
        };
        Object.keys(Ln).forEach((e=>{
            Object.defineProperty(kn.fn, e, {
                value: Ln[e],
                writable: !0
            })
        }
        ));
        const Pn = kn;
        function Dn(e, t) {
            return void 0 === t && (t = 0),
            setTimeout(e, t)
        }
        function $n() {
            return Date.now()
        }
        function Nn(e, t) {
            void 0 === t && (t = "x");
            const n = Cn();
            let i, s, r;
            const o = function(e) {
                const t = Cn();
                let n;
                return t.getComputedStyle && (n = t.getComputedStyle(e, null)),
                !n && e.currentStyle && (n = e.currentStyle),
                n || (n = e.style),
                n
            }(e);
            return n.WebKitCSSMatrix ? (s = o.transform || o.webkitTransform,
            s.split(",").length > 6 && (s = s.split(", ").map((e=>e.replace(",", "."))).join(", ")),
            r = new n.WebKitCSSMatrix("none" === s ? "" : s)) : (r = o.MozTransform || o.OTransform || o.MsTransform || o.msTransform || o.transform || o.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,"),
            i = r.toString().split(",")),
            "x" === t && (s = n.WebKitCSSMatrix ? r.m41 : 16 === i.length ? parseFloat(i[12]) : parseFloat(i[4])),
            "y" === t && (s = n.WebKitCSSMatrix ? r.m42 : 16 === i.length ? parseFloat(i[13]) : parseFloat(i[5])),
            s || 0
        }
        function In(e) {
            return "object" == typeof e && null !== e && e.constructor && "Object" === Object.prototype.toString.call(e).slice(8, -1)
        }
        function jn(e) {
            return "undefined" != typeof window && void 0 !== window.HTMLElement ? e instanceof HTMLElement : e && (1 === e.nodeType || 11 === e.nodeType)
        }
        function zn() {
            const e = Object(arguments.length <= 0 ? void 0 : arguments[0])
              , t = ["__proto__", "constructor", "prototype"];
            for (let n = 1; n < arguments.length; n += 1) {
                const i = n < 0 || arguments.length <= n ? void 0 : arguments[n];
                if (null != i && !jn(i)) {
                    const n = Object.keys(Object(i)).filter((e=>t.indexOf(e) < 0));
                    for (let t = 0, s = n.length; t < s; t += 1) {
                        const s = n[t]
                          , r = Object.getOwnPropertyDescriptor(i, s);
                        void 0 !== r && r.enumerable && (In(e[s]) && In(i[s]) ? i[s].__swiper__ ? e[s] = i[s] : zn(e[s], i[s]) : !In(e[s]) && In(i[s]) ? (e[s] = {},
                        i[s].__swiper__ ? e[s] = i[s] : zn(e[s], i[s])) : e[s] = i[s])
                    }
                }
            }
            return e
        }
        function Bn(e, t, n) {
            e.style.setProperty(t, n)
        }
        function Gn(e) {
            let {swiper: t, targetPosition: n, side: i} = e;
            const s = Cn()
              , r = -t.translate;
            let o, a = null;
            const l = t.params.speed;
            t.wrapperEl.style.scrollSnapType = "none",
            s.cancelAnimationFrame(t.cssModeFrameID);
            const d = n > r ? "next" : "prev"
              , c = (e,t)=>"next" === d && e >= t || "prev" === d && e <= t
              , p = ()=>{
                o = (new Date).getTime(),
                null === a && (a = o);
                const e = Math.max(Math.min((o - a) / l, 1), 0)
                  , d = .5 - Math.cos(e * Math.PI) / 2;
                let u = r + d * (n - r);
                if (c(u, n) && (u = n),
                t.wrapperEl.scrollTo({
                    [i]: u
                }),
                c(u, n))
                    return t.wrapperEl.style.overflow = "hidden",
                    t.wrapperEl.style.scrollSnapType = "",
                    setTimeout((()=>{
                        t.wrapperEl.style.overflow = "",
                        t.wrapperEl.scrollTo({
                            [i]: u
                        })
                    }
                    )),
                    void s.cancelAnimationFrame(t.cssModeFrameID);
                t.cssModeFrameID = s.requestAnimationFrame(p)
            }
            ;
            p()
        }
        let Hn, Wn, Vn;
        function Fn() {
            return Hn || (Hn = function() {
                const e = Cn()
                  , t = Tn();
                return {
                    smoothScroll: t.documentElement && "scrollBehavior"in t.documentElement.style,
                    touch: !!("ontouchstart"in e || e.DocumentTouch && t instanceof e.DocumentTouch),
                    passiveListener: function() {
                        let t = !1;
                        try {
                            const n = Object.defineProperty({}, "passive", {
                                get() {
                                    t = !0
                                }
                            });
                            e.addEventListener("testPassiveListener", null, n)
                        } catch (e) {}
                        return t
                    }(),
                    gestures: "ongesturestart"in e
                }
            }()),
            Hn
        }
        function Rn(e) {
            return void 0 === e && (e = {}),
            Wn || (Wn = function(e) {
                let {userAgent: t} = void 0 === e ? {} : e;
                const n = Fn()
                  , i = Cn()
                  , s = i.navigator.platform
                  , r = t || i.navigator.userAgent
                  , o = {
                    ios: !1,
                    android: !1
                }
                  , a = i.screen.width
                  , l = i.screen.height
                  , d = r.match(/(Android);?[\s\/]+([\d.]+)?/);
                let c = r.match(/(iPad).*OS\s([\d_]+)/);
                const p = r.match(/(iPod)(.*OS\s([\d_]+))?/)
                  , u = !c && r.match(/(iPhone\sOS|iOS)\s([\d_]+)/)
                  , f = "Win32" === s;
                let h = "MacIntel" === s;
                return !c && h && n.touch && ["1024x1366", "1366x1024", "834x1194", "1194x834", "834x1112", "1112x834", "768x1024", "1024x768", "820x1180", "1180x820", "810x1080", "1080x810"].indexOf(`${a}x${l}`) >= 0 && (c = r.match(/(Version)\/([\d.]+)/),
                c || (c = [0, 1, "13_0_0"]),
                h = !1),
                d && !f && (o.os = "android",
                o.android = !0),
                (c || u || p) && (o.os = "ios",
                o.ios = !0),
                o
            }(e)),
            Wn
        }
        function qn() {
            return Vn || (Vn = function() {
                const e = Cn();
                return {
                    isSafari: function() {
                        const t = e.navigator.userAgent.toLowerCase();
                        return t.indexOf("safari") >= 0 && t.indexOf("chrome") < 0 && t.indexOf("android") < 0
                    }(),
                    isWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(e.navigator.userAgent)
                }
            }()),
            Vn
        }
        const Yn = {
            on(e, t, n) {
                const i = this;
                if (!i.eventsListeners || i.destroyed)
                    return i;
                if ("function" != typeof t)
                    return i;
                const s = n ? "unshift" : "push";
                return e.split(" ").forEach((e=>{
                    i.eventsListeners[e] || (i.eventsListeners[e] = []),
                    i.eventsListeners[e][s](t)
                }
                )),
                i
            },
            once(e, t, n) {
                const i = this;
                if (!i.eventsListeners || i.destroyed)
                    return i;
                if ("function" != typeof t)
                    return i;
                function s() {
                    i.off(e, s),
                    s.__emitterProxy && delete s.__emitterProxy;
                    for (var n = arguments.length, r = new Array(n), o = 0; o < n; o++)
                        r[o] = arguments[o];
                    t.apply(i, r)
                }
                return s.__emitterProxy = t,
                i.on(e, s, n)
            },
            onAny(e, t) {
                const n = this;
                if (!n.eventsListeners || n.destroyed)
                    return n;
                if ("function" != typeof e)
                    return n;
                const i = t ? "unshift" : "push";
                return n.eventsAnyListeners.indexOf(e) < 0 && n.eventsAnyListeners[i](e),
                n
            },
            offAny(e) {
                const t = this;
                if (!t.eventsListeners || t.destroyed)
                    return t;
                if (!t.eventsAnyListeners)
                    return t;
                const n = t.eventsAnyListeners.indexOf(e);
                return n >= 0 && t.eventsAnyListeners.splice(n, 1),
                t
            },
            off(e, t) {
                const n = this;
                return !n.eventsListeners || n.destroyed ? n : n.eventsListeners ? (e.split(" ").forEach((e=>{
                    void 0 === t ? n.eventsListeners[e] = [] : n.eventsListeners[e] && n.eventsListeners[e].forEach(((i,s)=>{
                        (i === t || i.__emitterProxy && i.__emitterProxy === t) && n.eventsListeners[e].splice(s, 1)
                    }
                    ))
                }
                )),
                n) : n
            },
            emit() {
                const e = this;
                if (!e.eventsListeners || e.destroyed)
                    return e;
                if (!e.eventsListeners)
                    return e;
                let t, n, i;
                for (var s = arguments.length, r = new Array(s), o = 0; o < s; o++)
                    r[o] = arguments[o];
                "string" == typeof r[0] || Array.isArray(r[0]) ? (t = r[0],
                n = r.slice(1, r.length),
                i = e) : (t = r[0].events,
                n = r[0].data,
                i = r[0].context || e),
                n.unshift(i);
                return (Array.isArray(t) ? t : t.split(" ")).forEach((t=>{
                    e.eventsAnyListeners && e.eventsAnyListeners.length && e.eventsAnyListeners.forEach((e=>{
                        e.apply(i, [t, ...n])
                    }
                    )),
                    e.eventsListeners && e.eventsListeners[t] && e.eventsListeners[t].forEach((e=>{
                        e.apply(i, n)
                    }
                    ))
                }
                )),
                e
            }
        };
        const Xn = {
            updateSize: function() {
                const e = this;
                let t, n;
                const i = e.$el;
                t = void 0 !== e.params.width && null !== e.params.width ? e.params.width : i[0].clientWidth,
                n = void 0 !== e.params.height && null !== e.params.height ? e.params.height : i[0].clientHeight,
                0 === t && e.isHorizontal() || 0 === n && e.isVertical() || (t = t - parseInt(i.css("padding-left") || 0, 10) - parseInt(i.css("padding-right") || 0, 10),
                n = n - parseInt(i.css("padding-top") || 0, 10) - parseInt(i.css("padding-bottom") || 0, 10),
                Number.isNaN(t) && (t = 0),
                Number.isNaN(n) && (n = 0),
                Object.assign(e, {
                    width: t,
                    height: n,
                    size: e.isHorizontal() ? t : n
                }))
            },
            updateSlides: function() {
                const e = this;
                function t(t) {
                    return e.isHorizontal() ? t : {
                        width: "height",
                        "margin-top": "margin-left",
                        "margin-bottom ": "margin-right",
                        "margin-left": "margin-top",
                        "margin-right": "margin-bottom",
                        "padding-left": "padding-top",
                        "padding-right": "padding-bottom",
                        marginRight: "marginBottom"
                    }[t]
                }
                function n(e, n) {
                    return parseFloat(e.getPropertyValue(t(n)) || 0)
                }
                const i = e.params
                  , {$wrapperEl: s, size: r, rtlTranslate: o, wrongRTL: a} = e
                  , l = e.virtual && i.virtual.enabled
                  , d = l ? e.virtual.slides.length : e.slides.length
                  , c = s.children(`.${e.params.slideClass}`)
                  , p = l ? e.virtual.slides.length : c.length;
                let u = [];
                const f = []
                  , h = [];
                let m = i.slidesOffsetBefore;
                "function" == typeof m && (m = i.slidesOffsetBefore.call(e));
                let g = i.slidesOffsetAfter;
                "function" == typeof g && (g = i.slidesOffsetAfter.call(e));
                const v = e.snapGrid.length
                  , b = e.slidesGrid.length;
                let w = i.spaceBetween
                  , y = -m
                  , E = 0
                  , T = 0;
                if (void 0 === r)
                    return;
                "string" == typeof w && w.indexOf("%") >= 0 && (w = parseFloat(w.replace("%", "")) / 100 * r),
                e.virtualSize = -w,
                o ? c.css({
                    marginLeft: "",
                    marginBottom: "",
                    marginTop: ""
                }) : c.css({
                    marginRight: "",
                    marginBottom: "",
                    marginTop: ""
                }),
                i.centeredSlides && i.cssMode && (Bn(e.wrapperEl, "--swiper-centered-offset-before", ""),
                Bn(e.wrapperEl, "--swiper-centered-offset-after", ""));
                const x = i.grid && i.grid.rows > 1 && e.grid;
                let C;
                x && e.grid.initSlides(p);
                const S = "auto" === i.slidesPerView && i.breakpoints && Object.keys(i.breakpoints).filter((e=>void 0 !== i.breakpoints[e].slidesPerView)).length > 0;
                for (let s = 0; s < p; s += 1) {
                    C = 0;
                    const o = c.eq(s);
                    if (x && e.grid.updateSlide(s, o, p, t),
                    "none" !== o.css("display")) {
                        if ("auto" === i.slidesPerView) {
                            S && (c[s].style[t("width")] = "");
                            const r = getComputedStyle(o[0])
                              , a = o[0].style.transform
                              , l = o[0].style.webkitTransform;
                            if (a && (o[0].style.transform = "none"),
                            l && (o[0].style.webkitTransform = "none"),
                            i.roundLengths)
                                C = e.isHorizontal() ? o.outerWidth(!0) : o.outerHeight(!0);
                            else {
                                const e = n(r, "width")
                                  , t = n(r, "padding-left")
                                  , i = n(r, "padding-right")
                                  , s = n(r, "margin-left")
                                  , a = n(r, "margin-right")
                                  , l = r.getPropertyValue("box-sizing");
                                if (l && "border-box" === l)
                                    C = e + s + a;
                                else {
                                    const {clientWidth: n, offsetWidth: r} = o[0];
                                    C = e + t + i + s + a + (r - n)
                                }
                            }
                            a && (o[0].style.transform = a),
                            l && (o[0].style.webkitTransform = l),
                            i.roundLengths && (C = Math.floor(C))
                        } else
                            C = (r - (i.slidesPerView - 1) * w) / i.slidesPerView,
                            i.roundLengths && (C = Math.floor(C)),
                            c[s] && (c[s].style[t("width")] = `${C}px`);
                        c[s] && (c[s].swiperSlideSize = C),
                        h.push(C),
                        i.centeredSlides ? (y = y + C / 2 + E / 2 + w,
                        0 === E && 0 !== s && (y = y - r / 2 - w),
                        0 === s && (y = y - r / 2 - w),
                        Math.abs(y) < .001 && (y = 0),
                        i.roundLengths && (y = Math.floor(y)),
                        T % i.slidesPerGroup == 0 && u.push(y),
                        f.push(y)) : (i.roundLengths && (y = Math.floor(y)),
                        (T - Math.min(e.params.slidesPerGroupSkip, T)) % e.params.slidesPerGroup == 0 && u.push(y),
                        f.push(y),
                        y = y + C + w),
                        e.virtualSize += C + w,
                        E = C,
                        T += 1
                    }
                }
                if (e.virtualSize = Math.max(e.virtualSize, r) + g,
                o && a && ("slide" === i.effect || "coverflow" === i.effect) && s.css({
                    width: `${e.virtualSize + i.spaceBetween}px`
                }),
                i.setWrapperSize && s.css({
                    [t("width")]: `${e.virtualSize + i.spaceBetween}px`
                }),
                x && e.grid.updateWrapperSize(C, u, t),
                !i.centeredSlides) {
                    const t = [];
                    for (let n = 0; n < u.length; n += 1) {
                        let s = u[n];
                        i.roundLengths && (s = Math.floor(s)),
                        u[n] <= e.virtualSize - r && t.push(s)
                    }
                    u = t,
                    Math.floor(e.virtualSize - r) - Math.floor(u[u.length - 1]) > 1 && u.push(e.virtualSize - r)
                }
                if (0 === u.length && (u = [0]),
                0 !== i.spaceBetween) {
                    const n = e.isHorizontal() && o ? "marginLeft" : t("marginRight");
                    c.filter(((e,t)=>!i.cssMode || t !== c.length - 1)).css({
                        [n]: `${w}px`
                    })
                }
                if (i.centeredSlides && i.centeredSlidesBounds) {
                    let e = 0;
                    h.forEach((t=>{
                        e += t + (i.spaceBetween ? i.spaceBetween : 0)
                    }
                    )),
                    e -= i.spaceBetween;
                    const t = e - r;
                    u = u.map((e=>e < 0 ? -m : e > t ? t + g : e))
                }
                if (i.centerInsufficientSlides) {
                    let e = 0;
                    if (h.forEach((t=>{
                        e += t + (i.spaceBetween ? i.spaceBetween : 0)
                    }
                    )),
                    e -= i.spaceBetween,
                    e < r) {
                        const t = (r - e) / 2;
                        u.forEach(((e,n)=>{
                            u[n] = e - t
                        }
                        )),
                        f.forEach(((e,n)=>{
                            f[n] = e + t
                        }
                        ))
                    }
                }
                if (Object.assign(e, {
                    slides: c,
                    snapGrid: u,
                    slidesGrid: f,
                    slidesSizesGrid: h
                }),
                i.centeredSlides && i.cssMode && !i.centeredSlidesBounds) {
                    Bn(e.wrapperEl, "--swiper-centered-offset-before", -u[0] + "px"),
                    Bn(e.wrapperEl, "--swiper-centered-offset-after", e.size / 2 - h[h.length - 1] / 2 + "px");
                    const t = -e.snapGrid[0]
                      , n = -e.slidesGrid[0];
                    e.snapGrid = e.snapGrid.map((e=>e + t)),
                    e.slidesGrid = e.slidesGrid.map((e=>e + n))
                }
                if (p !== d && e.emit("slidesLengthChange"),
                u.length !== v && (e.params.watchOverflow && e.checkOverflow(),
                e.emit("snapGridLengthChange")),
                f.length !== b && e.emit("slidesGridLengthChange"),
                i.watchSlidesProgress && e.updateSlidesOffset(),
                !(l || i.cssMode || "slide" !== i.effect && "fade" !== i.effect)) {
                    const t = `${i.containerModifierClass}backface-hidden`
                      , n = e.$el.hasClass(t);
                    p <= i.maxBackfaceHiddenSlides ? n || e.$el.addClass(t) : n && e.$el.removeClass(t)
                }
            },
            updateAutoHeight: function(e) {
                const t = this
                  , n = []
                  , i = t.virtual && t.params.virtual.enabled;
                let s, r = 0;
                "number" == typeof e ? t.setTransition(e) : !0 === e && t.setTransition(t.params.speed);
                const o = e=>i ? t.slides.filter((t=>parseInt(t.getAttribute("data-swiper-slide-index"), 10) === e))[0] : t.slides.eq(e)[0];
                if ("auto" !== t.params.slidesPerView && t.params.slidesPerView > 1)
                    if (t.params.centeredSlides)
                        (t.visibleSlides || Pn([])).each((e=>{
                            n.push(e)
                        }
                        ));
                    else
                        for (s = 0; s < Math.ceil(t.params.slidesPerView); s += 1) {
                            const e = t.activeIndex + s;
                            if (e > t.slides.length && !i)
                                break;
                            n.push(o(e))
                        }
                else
                    n.push(o(t.activeIndex));
                for (s = 0; s < n.length; s += 1)
                    if (void 0 !== n[s]) {
                        const e = n[s].offsetHeight;
                        r = e > r ? e : r
                    }
                (r || 0 === r) && t.$wrapperEl.css("height", `${r}px`)
            },
            updateSlidesOffset: function() {
                const e = this
                  , t = e.slides;
                for (let n = 0; n < t.length; n += 1)
                    t[n].swiperSlideOffset = e.isHorizontal() ? t[n].offsetLeft : t[n].offsetTop
            },
            updateSlidesProgress: function(e) {
                void 0 === e && (e = this && this.translate || 0);
                const t = this
                  , n = t.params
                  , {slides: i, rtlTranslate: s, snapGrid: r} = t;
                if (0 === i.length)
                    return;
                void 0 === i[0].swiperSlideOffset && t.updateSlidesOffset();
                let o = -e;
                s && (o = e),
                i.removeClass(n.slideVisibleClass),
                t.visibleSlidesIndexes = [],
                t.visibleSlides = [];
                for (let e = 0; e < i.length; e += 1) {
                    const a = i[e];
                    let l = a.swiperSlideOffset;
                    n.cssMode && n.centeredSlides && (l -= i[0].swiperSlideOffset);
                    const d = (o + (n.centeredSlides ? t.minTranslate() : 0) - l) / (a.swiperSlideSize + n.spaceBetween)
                      , c = (o - r[0] + (n.centeredSlides ? t.minTranslate() : 0) - l) / (a.swiperSlideSize + n.spaceBetween)
                      , p = -(o - l)
                      , u = p + t.slidesSizesGrid[e];
                    (p >= 0 && p < t.size - 1 || u > 1 && u <= t.size || p <= 0 && u >= t.size) && (t.visibleSlides.push(a),
                    t.visibleSlidesIndexes.push(e),
                    i.eq(e).addClass(n.slideVisibleClass)),
                    a.progress = s ? -d : d,
                    a.originalProgress = s ? -c : c
                }
                t.visibleSlides = Pn(t.visibleSlides)
            },
            updateProgress: function(e) {
                const t = this;
                if (void 0 === e) {
                    const n = t.rtlTranslate ? -1 : 1;
                    e = t && t.translate && t.translate * n || 0
                }
                const n = t.params
                  , i = t.maxTranslate() - t.minTranslate();
                let {progress: s, isBeginning: r, isEnd: o} = t;
                const a = r
                  , l = o;
                0 === i ? (s = 0,
                r = !0,
                o = !0) : (s = (e - t.minTranslate()) / i,
                r = s <= 0,
                o = s >= 1),
                Object.assign(t, {
                    progress: s,
                    isBeginning: r,
                    isEnd: o
                }),
                (n.watchSlidesProgress || n.centeredSlides && n.autoHeight) && t.updateSlidesProgress(e),
                r && !a && t.emit("reachBeginning toEdge"),
                o && !l && t.emit("reachEnd toEdge"),
                (a && !r || l && !o) && t.emit("fromEdge"),
                t.emit("progress", s)
            },
            updateSlidesClasses: function() {
                const e = this
                  , {slides: t, params: n, $wrapperEl: i, activeIndex: s, realIndex: r} = e
                  , o = e.virtual && n.virtual.enabled;
                let a;
                t.removeClass(`${n.slideActiveClass} ${n.slideNextClass} ${n.slidePrevClass} ${n.slideDuplicateActiveClass} ${n.slideDuplicateNextClass} ${n.slideDuplicatePrevClass}`),
                a = o ? e.$wrapperEl.find(`.${n.slideClass}[data-swiper-slide-index="${s}"]`) : t.eq(s),
                a.addClass(n.slideActiveClass),
                n.loop && (a.hasClass(n.slideDuplicateClass) ? i.children(`.${n.slideClass}:not(.${n.slideDuplicateClass})[data-swiper-slide-index="${r}"]`).addClass(n.slideDuplicateActiveClass) : i.children(`.${n.slideClass}.${n.slideDuplicateClass}[data-swiper-slide-index="${r}"]`).addClass(n.slideDuplicateActiveClass));
                let l = a.nextAll(`.${n.slideClass}`).eq(0).addClass(n.slideNextClass);
                n.loop && 0 === l.length && (l = t.eq(0),
                l.addClass(n.slideNextClass));
                let d = a.prevAll(`.${n.slideClass}`).eq(0).addClass(n.slidePrevClass);
                n.loop && 0 === d.length && (d = t.eq(-1),
                d.addClass(n.slidePrevClass)),
                n.loop && (l.hasClass(n.slideDuplicateClass) ? i.children(`.${n.slideClass}:not(.${n.slideDuplicateClass})[data-swiper-slide-index="${l.attr("data-swiper-slide-index")}"]`).addClass(n.slideDuplicateNextClass) : i.children(`.${n.slideClass}.${n.slideDuplicateClass}[data-swiper-slide-index="${l.attr("data-swiper-slide-index")}"]`).addClass(n.slideDuplicateNextClass),
                d.hasClass(n.slideDuplicateClass) ? i.children(`.${n.slideClass}:not(.${n.slideDuplicateClass})[data-swiper-slide-index="${d.attr("data-swiper-slide-index")}"]`).addClass(n.slideDuplicatePrevClass) : i.children(`.${n.slideClass}.${n.slideDuplicateClass}[data-swiper-slide-index="${d.attr("data-swiper-slide-index")}"]`).addClass(n.slideDuplicatePrevClass)),
                e.emitSlidesClasses()
            },
            updateActiveIndex: function(e) {
                const t = this
                  , n = t.rtlTranslate ? t.translate : -t.translate
                  , {slidesGrid: i, snapGrid: s, params: r, activeIndex: o, realIndex: a, snapIndex: l} = t;
                let d, c = e;
                if (void 0 === c) {
                    for (let e = 0; e < i.length; e += 1)
                        void 0 !== i[e + 1] ? n >= i[e] && n < i[e + 1] - (i[e + 1] - i[e]) / 2 ? c = e : n >= i[e] && n < i[e + 1] && (c = e + 1) : n >= i[e] && (c = e);
                    r.normalizeSlideIndex && (c < 0 || void 0 === c) && (c = 0)
                }
                if (s.indexOf(n) >= 0)
                    d = s.indexOf(n);
                else {
                    const e = Math.min(r.slidesPerGroupSkip, c);
                    d = e + Math.floor((c - e) / r.slidesPerGroup)
                }
                if (d >= s.length && (d = s.length - 1),
                c === o)
                    return void (d !== l && (t.snapIndex = d,
                    t.emit("snapIndexChange")));
                const p = parseInt(t.slides.eq(c).attr("data-swiper-slide-index") || c, 10);
                Object.assign(t, {
                    snapIndex: d,
                    realIndex: p,
                    previousIndex: o,
                    activeIndex: c
                }),
                t.emit("activeIndexChange"),
                t.emit("snapIndexChange"),
                a !== p && t.emit("realIndexChange"),
                (t.initialized || t.params.runCallbacksOnInit) && t.emit("slideChange")
            },
            updateClickedSlide: function(e) {
                const t = this
                  , n = t.params
                  , i = Pn(e).closest(`.${n.slideClass}`)[0];
                let s, r = !1;
                if (i)
                    for (let e = 0; e < t.slides.length; e += 1)
                        if (t.slides[e] === i) {
                            r = !0,
                            s = e;
                            break
                        }
                if (!i || !r)
                    return t.clickedSlide = void 0,
                    void (t.clickedIndex = void 0);
                t.clickedSlide = i,
                t.virtual && t.params.virtual.enabled ? t.clickedIndex = parseInt(Pn(i).attr("data-swiper-slide-index"), 10) : t.clickedIndex = s,
                n.slideToClickedSlide && void 0 !== t.clickedIndex && t.clickedIndex !== t.activeIndex && t.slideToClickedSlide()
            }
        };
        const Kn = {
            getTranslate: function(e) {
                void 0 === e && (e = this.isHorizontal() ? "x" : "y");
                const {params: t, rtlTranslate: n, translate: i, $wrapperEl: s} = this;
                if (t.virtualTranslate)
                    return n ? -i : i;
                if (t.cssMode)
                    return i;
                let r = Nn(s[0], e);
                return n && (r = -r),
                r || 0
            },
            setTranslate: function(e, t) {
                const n = this
                  , {rtlTranslate: i, params: s, $wrapperEl: r, wrapperEl: o, progress: a} = n;
                let l, d = 0, c = 0;
                n.isHorizontal() ? d = i ? -e : e : c = e,
                s.roundLengths && (d = Math.floor(d),
                c = Math.floor(c)),
                s.cssMode ? o[n.isHorizontal() ? "scrollLeft" : "scrollTop"] = n.isHorizontal() ? -d : -c : s.virtualTranslate || r.transform(`translate3d(${d}px, ${c}px, 0px)`),
                n.previousTranslate = n.translate,
                n.translate = n.isHorizontal() ? d : c;
                const p = n.maxTranslate() - n.minTranslate();
                l = 0 === p ? 0 : (e - n.minTranslate()) / p,
                l !== a && n.updateProgress(e),
                n.emit("setTranslate", n.translate, t)
            },
            minTranslate: function() {
                return -this.snapGrid[0]
            },
            maxTranslate: function() {
                return -this.snapGrid[this.snapGrid.length - 1]
            },
            translateTo: function(e, t, n, i, s) {
                void 0 === e && (e = 0),
                void 0 === t && (t = this.params.speed),
                void 0 === n && (n = !0),
                void 0 === i && (i = !0);
                const r = this
                  , {params: o, wrapperEl: a} = r;
                if (r.animating && o.preventInteractionOnTransition)
                    return !1;
                const l = r.minTranslate()
                  , d = r.maxTranslate();
                let c;
                if (c = i && e > l ? l : i && e < d ? d : e,
                r.updateProgress(c),
                o.cssMode) {
                    const e = r.isHorizontal();
                    if (0 === t)
                        a[e ? "scrollLeft" : "scrollTop"] = -c;
                    else {
                        if (!r.support.smoothScroll)
                            return Gn({
                                swiper: r,
                                targetPosition: -c,
                                side: e ? "left" : "top"
                            }),
                            !0;
                        a.scrollTo({
                            [e ? "left" : "top"]: -c,
                            behavior: "smooth"
                        })
                    }
                    return !0
                }
                return 0 === t ? (r.setTransition(0),
                r.setTranslate(c),
                n && (r.emit("beforeTransitionStart", t, s),
                r.emit("transitionEnd"))) : (r.setTransition(t),
                r.setTranslate(c),
                n && (r.emit("beforeTransitionStart", t, s),
                r.emit("transitionStart")),
                r.animating || (r.animating = !0,
                r.onTranslateToWrapperTransitionEnd || (r.onTranslateToWrapperTransitionEnd = function(e) {
                    r && !r.destroyed && e.target === this && (r.$wrapperEl[0].removeEventListener("transitionend", r.onTranslateToWrapperTransitionEnd),
                    r.$wrapperEl[0].removeEventListener("webkitTransitionEnd", r.onTranslateToWrapperTransitionEnd),
                    r.onTranslateToWrapperTransitionEnd = null,
                    delete r.onTranslateToWrapperTransitionEnd,
                    n && r.emit("transitionEnd"))
                }
                ),
                r.$wrapperEl[0].addEventListener("transitionend", r.onTranslateToWrapperTransitionEnd),
                r.$wrapperEl[0].addEventListener("webkitTransitionEnd", r.onTranslateToWrapperTransitionEnd))),
                !0
            }
        };
        function Un(e) {
            let {swiper: t, runCallbacks: n, direction: i, step: s} = e;
            const {activeIndex: r, previousIndex: o} = t;
            let a = i;
            if (a || (a = r > o ? "next" : r < o ? "prev" : "reset"),
            t.emit(`transition${s}`),
            n && r !== o) {
                if ("reset" === a)
                    return void t.emit(`slideResetTransition${s}`);
                t.emit(`slideChangeTransition${s}`),
                "next" === a ? t.emit(`slideNextTransition${s}`) : t.emit(`slidePrevTransition${s}`)
            }
        }
        const Qn = {
            slideTo: function(e, t, n, i, s) {
                if (void 0 === e && (e = 0),
                void 0 === t && (t = this.params.speed),
                void 0 === n && (n = !0),
                "number" != typeof e && "string" != typeof e)
                    throw new Error(`The 'index' argument cannot have type other than 'number' or 'string'. [${typeof e}] given.`);
                if ("string" == typeof e) {
                    const t = parseInt(e, 10);
                    if (!isFinite(t))
                        throw new Error(`The passed-in 'index' (string) couldn't be converted to 'number'. [${e}] given.`);
                    e = t
                }
                const r = this;
                let o = e;
                o < 0 && (o = 0);
                const {params: a, snapGrid: l, slidesGrid: d, previousIndex: c, activeIndex: p, rtlTranslate: u, wrapperEl: f, enabled: h} = r;
                if (r.animating && a.preventInteractionOnTransition || !h && !i && !s)
                    return !1;
                const m = Math.min(r.params.slidesPerGroupSkip, o);
                let g = m + Math.floor((o - m) / r.params.slidesPerGroup);
                g >= l.length && (g = l.length - 1),
                (p || a.initialSlide || 0) === (c || 0) && n && r.emit("beforeSlideChangeStart");
                const v = -l[g];
                if (r.updateProgress(v),
                a.normalizeSlideIndex)
                    for (let e = 0; e < d.length; e += 1) {
                        const t = -Math.floor(100 * v)
                          , n = Math.floor(100 * d[e])
                          , i = Math.floor(100 * d[e + 1]);
                        void 0 !== d[e + 1] ? t >= n && t < i - (i - n) / 2 ? o = e : t >= n && t < i && (o = e + 1) : t >= n && (o = e)
                    }
                if (r.initialized && o !== p) {
                    if (!r.allowSlideNext && v < r.translate && v < r.minTranslate())
                        return !1;
                    if (!r.allowSlidePrev && v > r.translate && v > r.maxTranslate() && (p || 0) !== o)
                        return !1
                }
                let b;
                if (b = o > p ? "next" : o < p ? "prev" : "reset",
                u && -v === r.translate || !u && v === r.translate)
                    return r.updateActiveIndex(o),
                    a.autoHeight && r.updateAutoHeight(),
                    r.updateSlidesClasses(),
                    "slide" !== a.effect && r.setTranslate(v),
                    "reset" !== b && (r.transitionStart(n, b),
                    r.transitionEnd(n, b)),
                    !1;
                if (a.cssMode) {
                    const e = r.isHorizontal()
                      , n = u ? v : -v;
                    if (0 === t) {
                        const t = r.virtual && r.params.virtual.enabled;
                        t && (r.wrapperEl.style.scrollSnapType = "none",
                        r._immediateVirtual = !0),
                        f[e ? "scrollLeft" : "scrollTop"] = n,
                        t && requestAnimationFrame((()=>{
                            r.wrapperEl.style.scrollSnapType = "",
                            r._swiperImmediateVirtual = !1
                        }
                        ))
                    } else {
                        if (!r.support.smoothScroll)
                            return Gn({
                                swiper: r,
                                targetPosition: n,
                                side: e ? "left" : "top"
                            }),
                            !0;
                        f.scrollTo({
                            [e ? "left" : "top"]: n,
                            behavior: "smooth"
                        })
                    }
                    return !0
                }
                return r.setTransition(t),
                r.setTranslate(v),
                r.updateActiveIndex(o),
                r.updateSlidesClasses(),
                r.emit("beforeTransitionStart", t, i),
                r.transitionStart(n, b),
                0 === t ? r.transitionEnd(n, b) : r.animating || (r.animating = !0,
                r.onSlideToWrapperTransitionEnd || (r.onSlideToWrapperTransitionEnd = function(e) {
                    r && !r.destroyed && e.target === this && (r.$wrapperEl[0].removeEventListener("transitionend", r.onSlideToWrapperTransitionEnd),
                    r.$wrapperEl[0].removeEventListener("webkitTransitionEnd", r.onSlideToWrapperTransitionEnd),
                    r.onSlideToWrapperTransitionEnd = null,
                    delete r.onSlideToWrapperTransitionEnd,
                    r.transitionEnd(n, b))
                }
                ),
                r.$wrapperEl[0].addEventListener("transitionend", r.onSlideToWrapperTransitionEnd),
                r.$wrapperEl[0].addEventListener("webkitTransitionEnd", r.onSlideToWrapperTransitionEnd)),
                !0
            },
            slideToLoop: function(e, t, n, i) {
                if (void 0 === e && (e = 0),
                void 0 === t && (t = this.params.speed),
                void 0 === n && (n = !0),
                "string" == typeof e) {
                    const t = parseInt(e, 10);
                    if (!isFinite(t))
                        throw new Error(`The passed-in 'index' (string) couldn't be converted to 'number'. [${e}] given.`);
                    e = t
                }
                const s = this;
                let r = e;
                return s.params.loop && (r += s.loopedSlides),
                s.slideTo(r, t, n, i)
            },
            slideNext: function(e, t, n) {
                void 0 === e && (e = this.params.speed),
                void 0 === t && (t = !0);
                const i = this
                  , {animating: s, enabled: r, params: o} = i;
                if (!r)
                    return i;
                let a = o.slidesPerGroup;
                "auto" === o.slidesPerView && 1 === o.slidesPerGroup && o.slidesPerGroupAuto && (a = Math.max(i.slidesPerViewDynamic("current", !0), 1));
                const l = i.activeIndex < o.slidesPerGroupSkip ? 1 : a;
                if (o.loop) {
                    if (s && o.loopPreventsSlide)
                        return !1;
                    i.loopFix(),
                    i._clientLeft = i.$wrapperEl[0].clientLeft
                }
                return o.rewind && i.isEnd ? i.slideTo(0, e, t, n) : i.slideTo(i.activeIndex + l, e, t, n)
            },
            slidePrev: function(e, t, n) {
                void 0 === e && (e = this.params.speed),
                void 0 === t && (t = !0);
                const i = this
                  , {params: s, animating: r, snapGrid: o, slidesGrid: a, rtlTranslate: l, enabled: d} = i;
                if (!d)
                    return i;
                if (s.loop) {
                    if (r && s.loopPreventsSlide)
                        return !1;
                    i.loopFix(),
                    i._clientLeft = i.$wrapperEl[0].clientLeft
                }
                function c(e) {
                    return e < 0 ? -Math.floor(Math.abs(e)) : Math.floor(e)
                }
                const p = c(l ? i.translate : -i.translate)
                  , u = o.map((e=>c(e)));
                let f = o[u.indexOf(p) - 1];
                if (void 0 === f && s.cssMode) {
                    let e;
                    o.forEach(((t,n)=>{
                        p >= t && (e = n)
                    }
                    )),
                    void 0 !== e && (f = o[e > 0 ? e - 1 : e])
                }
                let h = 0;
                if (void 0 !== f && (h = a.indexOf(f),
                h < 0 && (h = i.activeIndex - 1),
                "auto" === s.slidesPerView && 1 === s.slidesPerGroup && s.slidesPerGroupAuto && (h = h - i.slidesPerViewDynamic("previous", !0) + 1,
                h = Math.max(h, 0))),
                s.rewind && i.isBeginning) {
                    const s = i.params.virtual && i.params.virtual.enabled && i.virtual ? i.virtual.slides.length - 1 : i.slides.length - 1;
                    return i.slideTo(s, e, t, n)
                }
                return i.slideTo(h, e, t, n)
            },
            slideReset: function(e, t, n) {
                return void 0 === e && (e = this.params.speed),
                void 0 === t && (t = !0),
                this.slideTo(this.activeIndex, e, t, n)
            },
            slideToClosest: function(e, t, n, i) {
                void 0 === e && (e = this.params.speed),
                void 0 === t && (t = !0),
                void 0 === i && (i = .5);
                const s = this;
                let r = s.activeIndex;
                const o = Math.min(s.params.slidesPerGroupSkip, r)
                  , a = o + Math.floor((r - o) / s.params.slidesPerGroup)
                  , l = s.rtlTranslate ? s.translate : -s.translate;
                if (l >= s.snapGrid[a]) {
                    const e = s.snapGrid[a];
                    l - e > (s.snapGrid[a + 1] - e) * i && (r += s.params.slidesPerGroup)
                } else {
                    const e = s.snapGrid[a - 1];
                    l - e <= (s.snapGrid[a] - e) * i && (r -= s.params.slidesPerGroup)
                }
                return r = Math.max(r, 0),
                r = Math.min(r, s.slidesGrid.length - 1),
                s.slideTo(r, e, t, n)
            },
            slideToClickedSlide: function() {
                const e = this
                  , {params: t, $wrapperEl: n} = e
                  , i = "auto" === t.slidesPerView ? e.slidesPerViewDynamic() : t.slidesPerView;
                let s, r = e.clickedIndex;
                if (t.loop) {
                    if (e.animating)
                        return;
                    s = parseInt(Pn(e.clickedSlide).attr("data-swiper-slide-index"), 10),
                    t.centeredSlides ? r < e.loopedSlides - i / 2 || r > e.slides.length - e.loopedSlides + i / 2 ? (e.loopFix(),
                    r = n.children(`.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`).eq(0).index(),
                    Dn((()=>{
                        e.slideTo(r)
                    }
                    ))) : e.slideTo(r) : r > e.slides.length - i ? (e.loopFix(),
                    r = n.children(`.${t.slideClass}[data-swiper-slide-index="${s}"]:not(.${t.slideDuplicateClass})`).eq(0).index(),
                    Dn((()=>{
                        e.slideTo(r)
                    }
                    ))) : e.slideTo(r)
                } else
                    e.slideTo(r)
            }
        };
        const Jn = {
            loopCreate: function() {
                const e = this
                  , t = Tn()
                  , {params: n, $wrapperEl: i} = e
                  , s = i.children().length > 0 ? Pn(i.children()[0].parentNode) : i;
                s.children(`.${n.slideClass}.${n.slideDuplicateClass}`).remove();
                let r = s.children(`.${n.slideClass}`);
                if (n.loopFillGroupWithBlank) {
                    const e = n.slidesPerGroup - r.length % n.slidesPerGroup;
                    if (e !== n.slidesPerGroup) {
                        for (let i = 0; i < e; i += 1) {
                            const e = Pn(t.createElement("div")).addClass(`${n.slideClass} ${n.slideBlankClass}`);
                            s.append(e)
                        }
                        r = s.children(`.${n.slideClass}`)
                    }
                }
                "auto" !== n.slidesPerView || n.loopedSlides || (n.loopedSlides = r.length),
                e.loopedSlides = Math.ceil(parseFloat(n.loopedSlides || n.slidesPerView, 10)),
                e.loopedSlides += n.loopAdditionalSlides,
                e.loopedSlides > r.length && (e.loopedSlides = r.length);
                const o = []
                  , a = [];
                r.each(((t,n)=>{
                    const i = Pn(t);
                    n < e.loopedSlides && a.push(t),
                    n < r.length && n >= r.length - e.loopedSlides && o.push(t),
                    i.attr("data-swiper-slide-index", n)
                }
                ));
                for (let e = 0; e < a.length; e += 1)
                    s.append(Pn(a[e].cloneNode(!0)).addClass(n.slideDuplicateClass));
                for (let e = o.length - 1; e >= 0; e -= 1)
                    s.prepend(Pn(o[e].cloneNode(!0)).addClass(n.slideDuplicateClass))
            },
            loopFix: function() {
                const e = this;
                e.emit("beforeLoopFix");
                const {activeIndex: t, slides: n, loopedSlides: i, allowSlidePrev: s, allowSlideNext: r, snapGrid: o, rtlTranslate: a} = e;
                let l;
                e.allowSlidePrev = !0,
                e.allowSlideNext = !0;
                const d = -o[t] - e.getTranslate();
                if (t < i) {
                    l = n.length - 3 * i + t,
                    l += i;
                    e.slideTo(l, 0, !1, !0) && 0 !== d && e.setTranslate((a ? -e.translate : e.translate) - d)
                } else if (t >= n.length - i) {
                    l = -n.length + t + i,
                    l += i;
                    e.slideTo(l, 0, !1, !0) && 0 !== d && e.setTranslate((a ? -e.translate : e.translate) - d)
                }
                e.allowSlidePrev = s,
                e.allowSlideNext = r,
                e.emit("loopFix")
            },
            loopDestroy: function() {
                const {$wrapperEl: e, params: t, slides: n} = this;
                e.children(`.${t.slideClass}.${t.slideDuplicateClass},.${t.slideClass}.${t.slideBlankClass}`).remove(),
                n.removeAttr("data-swiper-slide-index")
            }
        };
        function Zn(e) {
            const t = this
              , n = Tn()
              , i = Cn()
              , s = t.touchEventsData
              , {params: r, touches: o, enabled: a} = t;
            if (!a)
                return;
            if (t.animating && r.preventInteractionOnTransition)
                return;
            !t.animating && r.cssMode && r.loop && t.loopFix();
            let l = e;
            l.originalEvent && (l = l.originalEvent);
            let d = Pn(l.target);
            if ("wrapper" === r.touchEventsTarget && !d.closest(t.wrapperEl).length)
                return;
            if (s.isTouchEvent = "touchstart" === l.type,
            !s.isTouchEvent && "which"in l && 3 === l.which)
                return;
            if (!s.isTouchEvent && "button"in l && l.button > 0)
                return;
            if (s.isTouched && s.isMoved)
                return;
            !!r.noSwipingClass && "" !== r.noSwipingClass && l.target && l.target.shadowRoot && e.path && e.path[0] && (d = Pn(e.path[0]));
            const c = r.noSwipingSelector ? r.noSwipingSelector : `.${r.noSwipingClass}`
              , p = !(!l.target || !l.target.shadowRoot);
            if (r.noSwiping && (p ? function(e, t) {
                return void 0 === t && (t = this),
                function t(n) {
                    if (!n || n === Tn() || n === Cn())
                        return null;
                    n.assignedSlot && (n = n.assignedSlot);
                    const i = n.closest(e);
                    return i || n.getRootNode ? i || t(n.getRootNode().host) : null
                }(t)
            }(c, d[0]) : d.closest(c)[0]))
                return void (t.allowClick = !0);
            if (r.swipeHandler && !d.closest(r.swipeHandler)[0])
                return;
            o.currentX = "touchstart" === l.type ? l.targetTouches[0].pageX : l.pageX,
            o.currentY = "touchstart" === l.type ? l.targetTouches[0].pageY : l.pageY;
            const u = o.currentX
              , f = o.currentY
              , h = r.edgeSwipeDetection || r.iOSEdgeSwipeDetection
              , m = r.edgeSwipeThreshold || r.iOSEdgeSwipeThreshold;
            if (h && (u <= m || u >= i.innerWidth - m)) {
                if ("prevent" !== h)
                    return;
                e.preventDefault()
            }
            if (Object.assign(s, {
                isTouched: !0,
                isMoved: !1,
                allowTouchCallbacks: !0,
                isScrolling: void 0,
                startMoving: void 0
            }),
            o.startX = u,
            o.startY = f,
            s.touchStartTime = $n(),
            t.allowClick = !0,
            t.updateSize(),
            t.swipeDirection = void 0,
            r.threshold > 0 && (s.allowThresholdMove = !1),
            "touchstart" !== l.type) {
                let e = !0;
                d.is(s.focusableElements) && (e = !1,
                "SELECT" === d[0].nodeName && (s.isTouched = !1)),
                n.activeElement && Pn(n.activeElement).is(s.focusableElements) && n.activeElement !== d[0] && n.activeElement.blur();
                const i = e && t.allowTouchMove && r.touchStartPreventDefault;
                !r.touchStartForcePreventDefault && !i || d[0].isContentEditable || l.preventDefault()
            }
            t.params.freeMode && t.params.freeMode.enabled && t.freeMode && t.animating && !r.cssMode && t.freeMode.onTouchStart(),
            t.emit("touchStart", l)
        }
        function ei(e) {
            const t = Tn()
              , n = this
              , i = n.touchEventsData
              , {params: s, touches: r, rtlTranslate: o, enabled: a} = n;
            if (!a)
                return;
            let l = e;
            if (l.originalEvent && (l = l.originalEvent),
            !i.isTouched)
                return void (i.startMoving && i.isScrolling && n.emit("touchMoveOpposite", l));
            if (i.isTouchEvent && "touchmove" !== l.type)
                return;
            const d = "touchmove" === l.type && l.targetTouches && (l.targetTouches[0] || l.changedTouches[0])
              , c = "touchmove" === l.type ? d.pageX : l.pageX
              , p = "touchmove" === l.type ? d.pageY : l.pageY;
            if (l.preventedByNestedSwiper)
                return r.startX = c,
                void (r.startY = p);
            if (!n.allowTouchMove)
                return Pn(l.target).is(i.focusableElements) || (n.allowClick = !1),
                void (i.isTouched && (Object.assign(r, {
                    startX: c,
                    startY: p,
                    currentX: c,
                    currentY: p
                }),
                i.touchStartTime = $n()));
            if (i.isTouchEvent && s.touchReleaseOnEdges && !s.loop)
                if (n.isVertical()) {
                    if (p < r.startY && n.translate <= n.maxTranslate() || p > r.startY && n.translate >= n.minTranslate())
                        return i.isTouched = !1,
                        void (i.isMoved = !1)
                } else if (c < r.startX && n.translate <= n.maxTranslate() || c > r.startX && n.translate >= n.minTranslate())
                    return;
            if (i.isTouchEvent && t.activeElement && l.target === t.activeElement && Pn(l.target).is(i.focusableElements))
                return i.isMoved = !0,
                void (n.allowClick = !1);
            if (i.allowTouchCallbacks && n.emit("touchMove", l),
            l.targetTouches && l.targetTouches.length > 1)
                return;
            r.currentX = c,
            r.currentY = p;
            const u = r.currentX - r.startX
              , f = r.currentY - r.startY;
            if (n.params.threshold && Math.sqrt(u ** 2 + f ** 2) < n.params.threshold)
                return;
            if (void 0 === i.isScrolling) {
                let e;
                n.isHorizontal() && r.currentY === r.startY || n.isVertical() && r.currentX === r.startX ? i.isScrolling = !1 : u * u + f * f >= 25 && (e = 180 * Math.atan2(Math.abs(f), Math.abs(u)) / Math.PI,
                i.isScrolling = n.isHorizontal() ? e > s.touchAngle : 90 - e > s.touchAngle)
            }
            if (i.isScrolling && n.emit("touchMoveOpposite", l),
            void 0 === i.startMoving && (r.currentX === r.startX && r.currentY === r.startY || (i.startMoving = !0)),
            i.isScrolling)
                return void (i.isTouched = !1);
            if (!i.startMoving)
                return;
            n.allowClick = !1,
            !s.cssMode && l.cancelable && l.preventDefault(),
            s.touchMoveStopPropagation && !s.nested && l.stopPropagation(),
            i.isMoved || (s.loop && !s.cssMode && n.loopFix(),
            i.startTranslate = n.getTranslate(),
            n.setTransition(0),
            n.animating && n.$wrapperEl.trigger("webkitTransitionEnd transitionend"),
            i.allowMomentumBounce = !1,
            !s.grabCursor || !0 !== n.allowSlideNext && !0 !== n.allowSlidePrev || n.setGrabCursor(!0),
            n.emit("sliderFirstMove", l)),
            n.emit("sliderMove", l),
            i.isMoved = !0;
            let h = n.isHorizontal() ? u : f;
            r.diff = h,
            h *= s.touchRatio,
            o && (h = -h),
            n.swipeDirection = h > 0 ? "prev" : "next",
            i.currentTranslate = h + i.startTranslate;
            let m = !0
              , g = s.resistanceRatio;
            if (s.touchReleaseOnEdges && (g = 0),
            h > 0 && i.currentTranslate > n.minTranslate() ? (m = !1,
            s.resistance && (i.currentTranslate = n.minTranslate() - 1 + (-n.minTranslate() + i.startTranslate + h) ** g)) : h < 0 && i.currentTranslate < n.maxTranslate() && (m = !1,
            s.resistance && (i.currentTranslate = n.maxTranslate() + 1 - (n.maxTranslate() - i.startTranslate - h) ** g)),
            m && (l.preventedByNestedSwiper = !0),
            !n.allowSlideNext && "next" === n.swipeDirection && i.currentTranslate < i.startTranslate && (i.currentTranslate = i.startTranslate),
            !n.allowSlidePrev && "prev" === n.swipeDirection && i.currentTranslate > i.startTranslate && (i.currentTranslate = i.startTranslate),
            n.allowSlidePrev || n.allowSlideNext || (i.currentTranslate = i.startTranslate),
            s.threshold > 0) {
                if (!(Math.abs(h) > s.threshold || i.allowThresholdMove))
                    return void (i.currentTranslate = i.startTranslate);
                if (!i.allowThresholdMove)
                    return i.allowThresholdMove = !0,
                    r.startX = r.currentX,
                    r.startY = r.currentY,
                    i.currentTranslate = i.startTranslate,
                    void (r.diff = n.isHorizontal() ? r.currentX - r.startX : r.currentY - r.startY)
            }
            s.followFinger && !s.cssMode && ((s.freeMode && s.freeMode.enabled && n.freeMode || s.watchSlidesProgress) && (n.updateActiveIndex(),
            n.updateSlidesClasses()),
            n.params.freeMode && s.freeMode.enabled && n.freeMode && n.freeMode.onTouchMove(),
            n.updateProgress(i.currentTranslate),
            n.setTranslate(i.currentTranslate))
        }
        function ti(e) {
            const t = this
              , n = t.touchEventsData
              , {params: i, touches: s, rtlTranslate: r, slidesGrid: o, enabled: a} = t;
            if (!a)
                return;
            let l = e;
            if (l.originalEvent && (l = l.originalEvent),
            n.allowTouchCallbacks && t.emit("touchEnd", l),
            n.allowTouchCallbacks = !1,
            !n.isTouched)
                return n.isMoved && i.grabCursor && t.setGrabCursor(!1),
                n.isMoved = !1,
                void (n.startMoving = !1);
            i.grabCursor && n.isMoved && n.isTouched && (!0 === t.allowSlideNext || !0 === t.allowSlidePrev) && t.setGrabCursor(!1);
            const d = $n()
              , c = d - n.touchStartTime;
            if (t.allowClick) {
                const e = l.path || l.composedPath && l.composedPath();
                t.updateClickedSlide(e && e[0] || l.target),
                t.emit("tap click", l),
                c < 300 && d - n.lastClickTime < 300 && t.emit("doubleTap doubleClick", l)
            }
            if (n.lastClickTime = $n(),
            Dn((()=>{
                t.destroyed || (t.allowClick = !0)
            }
            )),
            !n.isTouched || !n.isMoved || !t.swipeDirection || 0 === s.diff || n.currentTranslate === n.startTranslate)
                return n.isTouched = !1,
                n.isMoved = !1,
                void (n.startMoving = !1);
            let p;
            if (n.isTouched = !1,
            n.isMoved = !1,
            n.startMoving = !1,
            p = i.followFinger ? r ? t.translate : -t.translate : -n.currentTranslate,
            i.cssMode)
                return;
            if (t.params.freeMode && i.freeMode.enabled)
                return void t.freeMode.onTouchEnd({
                    currentPos: p
                });
            let u = 0
              , f = t.slidesSizesGrid[0];
            for (let e = 0; e < o.length; e += e < i.slidesPerGroupSkip ? 1 : i.slidesPerGroup) {
                const t = e < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
                void 0 !== o[e + t] ? p >= o[e] && p < o[e + t] && (u = e,
                f = o[e + t] - o[e]) : p >= o[e] && (u = e,
                f = o[o.length - 1] - o[o.length - 2])
            }
            let h = null
              , m = null;
            i.rewind && (t.isBeginning ? m = t.params.virtual && t.params.virtual.enabled && t.virtual ? t.virtual.slides.length - 1 : t.slides.length - 1 : t.isEnd && (h = 0));
            const g = (p - o[u]) / f
              , v = u < i.slidesPerGroupSkip - 1 ? 1 : i.slidesPerGroup;
            if (c > i.longSwipesMs) {
                if (!i.longSwipes)
                    return void t.slideTo(t.activeIndex);
                "next" === t.swipeDirection && (g >= i.longSwipesRatio ? t.slideTo(i.rewind && t.isEnd ? h : u + v) : t.slideTo(u)),
                "prev" === t.swipeDirection && (g > 1 - i.longSwipesRatio ? t.slideTo(u + v) : null !== m && g < 0 && Math.abs(g) > i.longSwipesRatio ? t.slideTo(m) : t.slideTo(u))
            } else {
                if (!i.shortSwipes)
                    return void t.slideTo(t.activeIndex);
                t.navigation && (l.target === t.navigation.nextEl || l.target === t.navigation.prevEl) ? l.target === t.navigation.nextEl ? t.slideTo(u + v) : t.slideTo(u) : ("next" === t.swipeDirection && t.slideTo(null !== h ? h : u + v),
                "prev" === t.swipeDirection && t.slideTo(null !== m ? m : u))
            }
        }
        function ni() {
            const e = this
              , {params: t, el: n} = e;
            if (n && 0 === n.offsetWidth)
                return;
            t.breakpoints && e.setBreakpoint();
            const {allowSlideNext: i, allowSlidePrev: s, snapGrid: r} = e;
            e.allowSlideNext = !0,
            e.allowSlidePrev = !0,
            e.updateSize(),
            e.updateSlides(),
            e.updateSlidesClasses(),
            ("auto" === t.slidesPerView || t.slidesPerView > 1) && e.isEnd && !e.isBeginning && !e.params.centeredSlides ? e.slideTo(e.slides.length - 1, 0, !1, !0) : e.slideTo(e.activeIndex, 0, !1, !0),
            e.autoplay && e.autoplay.running && e.autoplay.paused && e.autoplay.run(),
            e.allowSlidePrev = s,
            e.allowSlideNext = i,
            e.params.watchOverflow && r !== e.snapGrid && e.checkOverflow()
        }
        function ii(e) {
            const t = this;
            t.enabled && (t.allowClick || (t.params.preventClicks && e.preventDefault(),
            t.params.preventClicksPropagation && t.animating && (e.stopPropagation(),
            e.stopImmediatePropagation())))
        }
        function si() {
            const e = this
              , {wrapperEl: t, rtlTranslate: n, enabled: i} = e;
            if (!i)
                return;
            let s;
            e.previousTranslate = e.translate,
            e.isHorizontal() ? e.translate = -t.scrollLeft : e.translate = -t.scrollTop,
            0 === e.translate && (e.translate = 0),
            e.updateActiveIndex(),
            e.updateSlidesClasses();
            const r = e.maxTranslate() - e.minTranslate();
            s = 0 === r ? 0 : (e.translate - e.minTranslate()) / r,
            s !== e.progress && e.updateProgress(n ? -e.translate : e.translate),
            e.emit("setTranslate", e.translate, !1)
        }
        let ri = !1;
        function oi() {}
        const ai = (e,t)=>{
            const n = Tn()
              , {params: i, touchEvents: s, el: r, wrapperEl: o, device: a, support: l} = e
              , d = !!i.nested
              , c = "on" === t ? "addEventListener" : "removeEventListener"
              , p = t;
            if (l.touch) {
                const t = !("touchstart" !== s.start || !l.passiveListener || !i.passiveListeners) && {
                    passive: !0,
                    capture: !1
                };
                r[c](s.start, e.onTouchStart, t),
                r[c](s.move, e.onTouchMove, l.passiveListener ? {
                    passive: !1,
                    capture: d
                } : d),
                r[c](s.end, e.onTouchEnd, t),
                s.cancel && r[c](s.cancel, e.onTouchEnd, t)
            } else
                r[c](s.start, e.onTouchStart, !1),
                n[c](s.move, e.onTouchMove, d),
                n[c](s.end, e.onTouchEnd, !1);
            (i.preventClicks || i.preventClicksPropagation) && r[c]("click", e.onClick, !0),
            i.cssMode && o[c]("scroll", e.onScroll),
            i.updateOnWindowResize ? e[p](a.ios || a.android ? "resize orientationchange observerUpdate" : "resize observerUpdate", ni, !0) : e[p]("observerUpdate", ni, !0)
        }
        ;
        const li = {
            attachEvents: function() {
                const e = this
                  , t = Tn()
                  , {params: n, support: i} = e;
                e.onTouchStart = Zn.bind(e),
                e.onTouchMove = ei.bind(e),
                e.onTouchEnd = ti.bind(e),
                n.cssMode && (e.onScroll = si.bind(e)),
                e.onClick = ii.bind(e),
                i.touch && !ri && (t.addEventListener("touchstart", oi),
                ri = !0),
                ai(e, "on")
            },
            detachEvents: function() {
                ai(this, "off")
            }
        }
          , di = (e,t)=>e.grid && t.grid && t.grid.rows > 1;
        const ci = {
            setBreakpoint: function() {
                const e = this
                  , {activeIndex: t, initialized: n, loopedSlides: i=0, params: s, $el: r} = e
                  , o = s.breakpoints;
                if (!o || o && 0 === Object.keys(o).length)
                    return;
                const a = e.getBreakpoint(o, e.params.breakpointsBase, e.el);
                if (!a || e.currentBreakpoint === a)
                    return;
                const l = (a in o ? o[a] : void 0) || e.originalParams
                  , d = di(e, s)
                  , c = di(e, l)
                  , p = s.enabled;
                d && !c ? (r.removeClass(`${s.containerModifierClass}grid ${s.containerModifierClass}grid-column`),
                e.emitContainerClasses()) : !d && c && (r.addClass(`${s.containerModifierClass}grid`),
                (l.grid.fill && "column" === l.grid.fill || !l.grid.fill && "column" === s.grid.fill) && r.addClass(`${s.containerModifierClass}grid-column`),
                e.emitContainerClasses()),
                ["navigation", "pagination", "scrollbar"].forEach((t=>{
                    const n = s[t] && s[t].enabled
                      , i = l[t] && l[t].enabled;
                    n && !i && e[t].disable(),
                    !n && i && e[t].enable()
                }
                ));
                const u = l.direction && l.direction !== s.direction
                  , f = s.loop && (l.slidesPerView !== s.slidesPerView || u);
                u && n && e.changeDirection(),
                zn(e.params, l);
                const h = e.params.enabled;
                Object.assign(e, {
                    allowTouchMove: e.params.allowTouchMove,
                    allowSlideNext: e.params.allowSlideNext,
                    allowSlidePrev: e.params.allowSlidePrev
                }),
                p && !h ? e.disable() : !p && h && e.enable(),
                e.currentBreakpoint = a,
                e.emit("_beforeBreakpoint", l),
                f && n && (e.loopDestroy(),
                e.loopCreate(),
                e.updateSlides(),
                e.slideTo(t - i + e.loopedSlides, 0, !1)),
                e.emit("breakpoint", l)
            },
            getBreakpoint: function(e, t, n) {
                if (void 0 === t && (t = "window"),
                !e || "container" === t && !n)
                    return;
                let i = !1;
                const s = Cn()
                  , r = "window" === t ? s.innerHeight : n.clientHeight
                  , o = Object.keys(e).map((e=>{
                    if ("string" == typeof e && 0 === e.indexOf("@")) {
                        const t = parseFloat(e.substr(1));
                        return {
                            value: r * t,
                            point: e
                        }
                    }
                    return {
                        value: e,
                        point: e
                    }
                }
                ));
                o.sort(((e,t)=>parseInt(e.value, 10) - parseInt(t.value, 10)));
                for (let e = 0; e < o.length; e += 1) {
                    const {point: r, value: a} = o[e];
                    "window" === t ? s.matchMedia(`(min-width: ${a}px)`).matches && (i = r) : a <= n.clientWidth && (i = r)
                }
                return i || "max"
            }
        };
        const pi = {
            addClasses: function() {
                const e = this
                  , {classNames: t, params: n, rtl: i, $el: s, device: r, support: o} = e
                  , a = function(e, t) {
                    const n = [];
                    return e.forEach((e=>{
                        "object" == typeof e ? Object.keys(e).forEach((i=>{
                            e[i] && n.push(t + i)
                        }
                        )) : "string" == typeof e && n.push(t + e)
                    }
                    )),
                    n
                }(["initialized", n.direction, {
                    "pointer-events": !o.touch
                }, {
                    "free-mode": e.params.freeMode && n.freeMode.enabled
                }, {
                    autoheight: n.autoHeight
                }, {
                    rtl: i
                }, {
                    grid: n.grid && n.grid.rows > 1
                }, {
                    "grid-column": n.grid && n.grid.rows > 1 && "column" === n.grid.fill
                }, {
                    android: r.android
                }, {
                    ios: r.ios
                }, {
                    "css-mode": n.cssMode
                }, {
                    centered: n.cssMode && n.centeredSlides
                }, {
                    "watch-progress": n.watchSlidesProgress
                }], n.containerModifierClass);
                t.push(...a),
                s.addClass([...t].join(" ")),
                e.emitContainerClasses()
            },
            removeClasses: function() {
                const {$el: e, classNames: t} = this;
                e.removeClass(t.join(" ")),
                this.emitContainerClasses()
            }
        };
        const ui = {
            init: !0,
            direction: "horizontal",
            touchEventsTarget: "wrapper",
            initialSlide: 0,
            speed: 300,
            cssMode: !1,
            updateOnWindowResize: !0,
            resizeObserver: !0,
            nested: !1,
            createElements: !1,
            enabled: !0,
            focusableElements: "input, select, option, textarea, button, video, label",
            width: null,
            height: null,
            preventInteractionOnTransition: !1,
            userAgent: null,
            url: null,
            edgeSwipeDetection: !1,
            edgeSwipeThreshold: 20,
            autoHeight: !1,
            setWrapperSize: !1,
            virtualTranslate: !1,
            effect: "slide",
            breakpoints: void 0,
            breakpointsBase: "window",
            spaceBetween: 0,
            slidesPerView: 1,
            slidesPerGroup: 1,
            slidesPerGroupSkip: 0,
            slidesPerGroupAuto: !1,
            centeredSlides: !1,
            centeredSlidesBounds: !1,
            slidesOffsetBefore: 0,
            slidesOffsetAfter: 0,
            normalizeSlideIndex: !0,
            centerInsufficientSlides: !1,
            watchOverflow: !0,
            roundLengths: !1,
            touchRatio: 1,
            touchAngle: 45,
            simulateTouch: !0,
            shortSwipes: !0,
            longSwipes: !0,
            longSwipesRatio: .5,
            longSwipesMs: 300,
            followFinger: !0,
            allowTouchMove: !0,
            threshold: 0,
            touchMoveStopPropagation: !1,
            touchStartPreventDefault: !0,
            touchStartForcePreventDefault: !1,
            touchReleaseOnEdges: !1,
            uniqueNavElements: !0,
            resistance: !0,
            resistanceRatio: .85,
            watchSlidesProgress: !1,
            grabCursor: !1,
            preventClicks: !0,
            preventClicksPropagation: !0,
            slideToClickedSlide: !1,
            preloadImages: !0,
            updateOnImagesReady: !0,
            loop: !1,
            loopAdditionalSlides: 0,
            loopedSlides: null,
            loopFillGroupWithBlank: !1,
            loopPreventsSlide: !0,
            rewind: !1,
            allowSlidePrev: !0,
            allowSlideNext: !0,
            swipeHandler: null,
            noSwiping: !0,
            noSwipingClass: "swiper-no-swiping",
            noSwipingSelector: null,
            passiveListeners: !0,
            maxBackfaceHiddenSlides: 10,
            containerModifierClass: "swiper-",
            slideClass: "swiper-slide",
            slideBlankClass: "swiper-slide-invisible-blank",
            slideActiveClass: "swiper-slide-active",
            slideDuplicateActiveClass: "swiper-slide-duplicate-active",
            slideVisibleClass: "swiper-slide-visible",
            slideDuplicateClass: "swiper-slide-duplicate",
            slideNextClass: "swiper-slide-next",
            slideDuplicateNextClass: "swiper-slide-duplicate-next",
            slidePrevClass: "swiper-slide-prev",
            slideDuplicatePrevClass: "swiper-slide-duplicate-prev",
            wrapperClass: "swiper-wrapper",
            runCallbacksOnInit: !0,
            _emitClasses: !1
        };
        function fi(e, t) {
            return function(n) {
                void 0 === n && (n = {});
                const i = Object.keys(n)[0]
                  , s = n[i];
                "object" == typeof s && null !== s ? (["navigation", "pagination", "scrollbar"].indexOf(i) >= 0 && !0 === e[i] && (e[i] = {
                    auto: !0
                }),
                i in e && "enabled"in s ? (!0 === e[i] && (e[i] = {
                    enabled: !0
                }),
                "object" != typeof e[i] || "enabled"in e[i] || (e[i].enabled = !0),
                e[i] || (e[i] = {
                    enabled: !1
                }),
                zn(t, n)) : zn(t, n)) : zn(t, n)
            }
        }
        const hi = {
            eventsEmitter: Yn,
            update: Xn,
            translate: Kn,
            transition: {
                setTransition: function(e, t) {
                    const n = this;
                    n.params.cssMode || n.$wrapperEl.transition(e),
                    n.emit("setTransition", e, t)
                },
                transitionStart: function(e, t) {
                    void 0 === e && (e = !0);
                    const n = this
                      , {params: i} = n;
                    i.cssMode || (i.autoHeight && n.updateAutoHeight(),
                    Un({
                        swiper: n,
                        runCallbacks: e,
                        direction: t,
                        step: "Start"
                    }))
                },
                transitionEnd: function(e, t) {
                    void 0 === e && (e = !0);
                    const n = this
                      , {params: i} = n;
                    n.animating = !1,
                    i.cssMode || (n.setTransition(0),
                    Un({
                        swiper: n,
                        runCallbacks: e,
                        direction: t,
                        step: "End"
                    }))
                }
            },
            slide: Qn,
            loop: Jn,
            grabCursor: {
                setGrabCursor: function(e) {
                    const t = this;
                    if (t.support.touch || !t.params.simulateTouch || t.params.watchOverflow && t.isLocked || t.params.cssMode)
                        return;
                    const n = "container" === t.params.touchEventsTarget ? t.el : t.wrapperEl;
                    n.style.cursor = "move",
                    n.style.cursor = e ? "grabbing" : "grab"
                },
                unsetGrabCursor: function() {
                    const e = this;
                    e.support.touch || e.params.watchOverflow && e.isLocked || e.params.cssMode || (e["container" === e.params.touchEventsTarget ? "el" : "wrapperEl"].style.cursor = "")
                }
            },
            events: li,
            breakpoints: ci,
            checkOverflow: {
                checkOverflow: function() {
                    const e = this
                      , {isLocked: t, params: n} = e
                      , {slidesOffsetBefore: i} = n;
                    if (i) {
                        const t = e.slides.length - 1
                          , n = e.slidesGrid[t] + e.slidesSizesGrid[t] + 2 * i;
                        e.isLocked = e.size > n
                    } else
                        e.isLocked = 1 === e.snapGrid.length;
                    !0 === n.allowSlideNext && (e.allowSlideNext = !e.isLocked),
                    !0 === n.allowSlidePrev && (e.allowSlidePrev = !e.isLocked),
                    t && t !== e.isLocked && (e.isEnd = !1),
                    t !== e.isLocked && e.emit(e.isLocked ? "lock" : "unlock")
                }
            },
            classes: pi,
            images: {
                loadImage: function(e, t, n, i, s, r) {
                    const o = Cn();
                    let a;
                    function l() {
                        r && r()
                    }
                    Pn(e).parent("picture")[0] || e.complete && s ? l() : t ? (a = new o.Image,
                    a.onload = l,
                    a.onerror = l,
                    i && (a.sizes = i),
                    n && (a.srcset = n),
                    t && (a.src = t)) : l()
                },
                preloadImages: function() {
                    const e = this;
                    function t() {
                        null != e && e && !e.destroyed && (void 0 !== e.imagesLoaded && (e.imagesLoaded += 1),
                        e.imagesLoaded === e.imagesToLoad.length && (e.params.updateOnImagesReady && e.update(),
                        e.emit("imagesReady")))
                    }
                    e.imagesToLoad = e.$el.find("img");
                    for (let n = 0; n < e.imagesToLoad.length; n += 1) {
                        const i = e.imagesToLoad[n];
                        e.loadImage(i, i.currentSrc || i.getAttribute("src"), i.srcset || i.getAttribute("srcset"), i.sizes || i.getAttribute("sizes"), !0, t)
                    }
                }
            }
        }
          , mi = {};
        class gi {
            constructor() {
                let e, t;
                for (var n = arguments.length, i = new Array(n), s = 0; s < n; s++)
                    i[s] = arguments[s];
                if (1 === i.length && i[0].constructor && "Object" === Object.prototype.toString.call(i[0]).slice(8, -1) ? t = i[0] : [e,t] = i,
                t || (t = {}),
                t = zn({}, t),
                e && !t.el && (t.el = e),
                t.el && Pn(t.el).length > 1) {
                    const e = [];
                    return Pn(t.el).each((n=>{
                        const i = zn({}, t, {
                            el: n
                        });
                        e.push(new gi(i))
                    }
                    )),
                    e
                }
                const r = this;
                r.__swiper__ = !0,
                r.support = Fn(),
                r.device = Rn({
                    userAgent: t.userAgent
                }),
                r.browser = qn(),
                r.eventsListeners = {},
                r.eventsAnyListeners = [],
                r.modules = [...r.__modules__],
                t.modules && Array.isArray(t.modules) && r.modules.push(...t.modules);
                const o = {};
                r.modules.forEach((e=>{
                    e({
                        swiper: r,
                        extendParams: fi(t, o),
                        on: r.on.bind(r),
                        once: r.once.bind(r),
                        off: r.off.bind(r),
                        emit: r.emit.bind(r)
                    })
                }
                ));
                const a = zn({}, ui, o);
                return r.params = zn({}, a, mi, t),
                r.originalParams = zn({}, r.params),
                r.passedParams = zn({}, t),
                r.params && r.params.on && Object.keys(r.params.on).forEach((e=>{
                    r.on(e, r.params.on[e])
                }
                )),
                r.params && r.params.onAny && r.onAny(r.params.onAny),
                r.$ = Pn,
                Object.assign(r, {
                    enabled: r.params.enabled,
                    el: e,
                    classNames: [],
                    slides: Pn(),
                    slidesGrid: [],
                    snapGrid: [],
                    slidesSizesGrid: [],
                    isHorizontal: ()=>"horizontal" === r.params.direction,
                    isVertical: ()=>"vertical" === r.params.direction,
                    activeIndex: 0,
                    realIndex: 0,
                    isBeginning: !0,
                    isEnd: !1,
                    translate: 0,
                    previousTranslate: 0,
                    progress: 0,
                    velocity: 0,
                    animating: !1,
                    allowSlideNext: r.params.allowSlideNext,
                    allowSlidePrev: r.params.allowSlidePrev,
                    touchEvents: function() {
                        const e = ["touchstart", "touchmove", "touchend", "touchcancel"]
                          , t = ["pointerdown", "pointermove", "pointerup"];
                        return r.touchEventsTouch = {
                            start: e[0],
                            move: e[1],
                            end: e[2],
                            cancel: e[3]
                        },
                        r.touchEventsDesktop = {
                            start: t[0],
                            move: t[1],
                            end: t[2]
                        },
                        r.support.touch || !r.params.simulateTouch ? r.touchEventsTouch : r.touchEventsDesktop
                    }(),
                    touchEventsData: {
                        isTouched: void 0,
                        isMoved: void 0,
                        allowTouchCallbacks: void 0,
                        touchStartTime: void 0,
                        isScrolling: void 0,
                        currentTranslate: void 0,
                        startTranslate: void 0,
                        allowThresholdMove: void 0,
                        focusableElements: r.params.focusableElements,
                        lastClickTime: $n(),
                        clickTimeout: void 0,
                        velocities: [],
                        allowMomentumBounce: void 0,
                        isTouchEvent: void 0,
                        startMoving: void 0
                    },
                    allowClick: !0,
                    allowTouchMove: r.params.allowTouchMove,
                    touches: {
                        startX: 0,
                        startY: 0,
                        currentX: 0,
                        currentY: 0,
                        diff: 0
                    },
                    imagesToLoad: [],
                    imagesLoaded: 0
                }),
                r.emit("_swiper"),
                r.params.init && r.init(),
                r
            }
            enable() {
                const e = this;
                e.enabled || (e.enabled = !0,
                e.params.grabCursor && e.setGrabCursor(),
                e.emit("enable"))
            }
            disable() {
                const e = this;
                e.enabled && (e.enabled = !1,
                e.params.grabCursor && e.unsetGrabCursor(),
                e.emit("disable"))
            }
            setProgress(e, t) {
                const n = this;
                e = Math.min(Math.max(e, 0), 1);
                const i = n.minTranslate()
                  , s = (n.maxTranslate() - i) * e + i;
                n.translateTo(s, void 0 === t ? 0 : t),
                n.updateActiveIndex(),
                n.updateSlidesClasses()
            }
            emitContainerClasses() {
                const e = this;
                if (!e.params._emitClasses || !e.el)
                    return;
                const t = e.el.className.split(" ").filter((t=>0 === t.indexOf("swiper") || 0 === t.indexOf(e.params.containerModifierClass)));
                e.emit("_containerClasses", t.join(" "))
            }
            getSlideClasses(e) {
                const t = this;
                return t.destroyed ? "" : e.className.split(" ").filter((e=>0 === e.indexOf("swiper-slide") || 0 === e.indexOf(t.params.slideClass))).join(" ")
            }
            emitSlidesClasses() {
                const e = this;
                if (!e.params._emitClasses || !e.el)
                    return;
                const t = [];
                e.slides.each((n=>{
                    const i = e.getSlideClasses(n);
                    t.push({
                        slideEl: n,
                        classNames: i
                    }),
                    e.emit("_slideClass", n, i)
                }
                )),
                e.emit("_slideClasses", t)
            }
            slidesPerViewDynamic(e, t) {
                void 0 === e && (e = "current"),
                void 0 === t && (t = !1);
                const {params: n, slides: i, slidesGrid: s, slidesSizesGrid: r, size: o, activeIndex: a} = this;
                let l = 1;
                if (n.centeredSlides) {
                    let e, t = i[a].swiperSlideSize;
                    for (let n = a + 1; n < i.length; n += 1)
                        i[n] && !e && (t += i[n].swiperSlideSize,
                        l += 1,
                        t > o && (e = !0));
                    for (let n = a - 1; n >= 0; n -= 1)
                        i[n] && !e && (t += i[n].swiperSlideSize,
                        l += 1,
                        t > o && (e = !0))
                } else if ("current" === e)
                    for (let e = a + 1; e < i.length; e += 1) {
                        (t ? s[e] + r[e] - s[a] < o : s[e] - s[a] < o) && (l += 1)
                    }
                else
                    for (let e = a - 1; e >= 0; e -= 1) {
                        s[a] - s[e] < o && (l += 1)
                    }
                return l
            }
            update() {
                const e = this;
                if (!e || e.destroyed)
                    return;
                const {snapGrid: t, params: n} = e;
                function i() {
                    const t = e.rtlTranslate ? -1 * e.translate : e.translate
                      , n = Math.min(Math.max(t, e.maxTranslate()), e.minTranslate());
                    e.setTranslate(n),
                    e.updateActiveIndex(),
                    e.updateSlidesClasses()
                }
                let s;
                n.breakpoints && e.setBreakpoint(),
                e.updateSize(),
                e.updateSlides(),
                e.updateProgress(),
                e.updateSlidesClasses(),
                e.params.freeMode && e.params.freeMode.enabled ? (i(),
                e.params.autoHeight && e.updateAutoHeight()) : (s = ("auto" === e.params.slidesPerView || e.params.slidesPerView > 1) && e.isEnd && !e.params.centeredSlides ? e.slideTo(e.slides.length - 1, 0, !1, !0) : e.slideTo(e.activeIndex, 0, !1, !0),
                s || i()),
                n.watchOverflow && t !== e.snapGrid && e.checkOverflow(),
                e.emit("update")
            }
            changeDirection(e, t) {
                void 0 === t && (t = !0);
                const n = this
                  , i = n.params.direction;
                return e || (e = "horizontal" === i ? "vertical" : "horizontal"),
                e === i || "horizontal" !== e && "vertical" !== e || (n.$el.removeClass(`${n.params.containerModifierClass}${i}`).addClass(`${n.params.containerModifierClass}${e}`),
                n.emitContainerClasses(),
                n.params.direction = e,
                n.slides.each((t=>{
                    "vertical" === e ? t.style.width = "" : t.style.height = ""
                }
                )),
                n.emit("changeDirection"),
                t && n.update()),
                n
            }
            changeLanguageDirection(e) {
                const t = this;
                t.rtl && "rtl" === e || !t.rtl && "ltr" === e || (t.rtl = "rtl" === e,
                t.rtlTranslate = "horizontal" === t.params.direction && t.rtl,
                t.rtl ? (t.$el.addClass(`${t.params.containerModifierClass}rtl`),
                t.el.dir = "rtl") : (t.$el.removeClass(`${t.params.containerModifierClass}rtl`),
                t.el.dir = "ltr"),
                t.update())
            }
            mount(e) {
                const t = this;
                if (t.mounted)
                    return !0;
                const n = Pn(e || t.params.el);
                if (!(e = n[0]))
                    return !1;
                e.swiper = t;
                const i = ()=>`.${(t.params.wrapperClass || "").trim().split(" ").join(".")}`;
                let s = (()=>{
                    if (e && e.shadowRoot && e.shadowRoot.querySelector) {
                        const t = Pn(e.shadowRoot.querySelector(i()));
                        return t.children = e=>n.children(e),
                        t
                    }
                    return n.children ? n.children(i()) : Pn(n).children(i())
                }
                )();
                if (0 === s.length && t.params.createElements) {
                    const e = Tn().createElement("div");
                    s = Pn(e),
                    e.className = t.params.wrapperClass,
                    n.append(e),
                    n.children(`.${t.params.slideClass}`).each((e=>{
                        s.append(e)
                    }
                    ))
                }
                return Object.assign(t, {
                    $el: n,
                    el: e,
                    $wrapperEl: s,
                    wrapperEl: s[0],
                    mounted: !0,
                    rtl: "rtl" === e.dir.toLowerCase() || "rtl" === n.css("direction"),
                    rtlTranslate: "horizontal" === t.params.direction && ("rtl" === e.dir.toLowerCase() || "rtl" === n.css("direction")),
                    wrongRTL: "-webkit-box" === s.css("display")
                }),
                !0
            }
            init(e) {
                const t = this;
                if (t.initialized)
                    return t;
                return !1 === t.mount(e) || (t.emit("beforeInit"),
                t.params.breakpoints && t.setBreakpoint(),
                t.addClasses(),
                t.params.loop && t.loopCreate(),
                t.updateSize(),
                t.updateSlides(),
                t.params.watchOverflow && t.checkOverflow(),
                t.params.grabCursor && t.enabled && t.setGrabCursor(),
                t.params.preloadImages && t.preloadImages(),
                t.params.loop ? t.slideTo(t.params.initialSlide + t.loopedSlides, 0, t.params.runCallbacksOnInit, !1, !0) : t.slideTo(t.params.initialSlide, 0, t.params.runCallbacksOnInit, !1, !0),
                t.attachEvents(),
                t.initialized = !0,
                t.emit("init"),
                t.emit("afterInit")),
                t
            }
            destroy(e, t) {
                void 0 === e && (e = !0),
                void 0 === t && (t = !0);
                const n = this
                  , {params: i, $el: s, $wrapperEl: r, slides: o} = n;
                return void 0 === n.params || n.destroyed || (n.emit("beforeDestroy"),
                n.initialized = !1,
                n.detachEvents(),
                i.loop && n.loopDestroy(),
                t && (n.removeClasses(),
                s.removeAttr("style"),
                r.removeAttr("style"),
                o && o.length && o.removeClass([i.slideVisibleClass, i.slideActiveClass, i.slideNextClass, i.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-slide-index")),
                n.emit("destroy"),
                Object.keys(n.eventsListeners).forEach((e=>{
                    n.off(e)
                }
                )),
                !1 !== e && (n.$el[0].swiper = null,
                function(e) {
                    const t = e;
                    Object.keys(t).forEach((e=>{
                        try {
                            t[e] = null
                        } catch (e) {}
                        try {
                            delete t[e]
                        } catch (e) {}
                    }
                    ))
                }(n)),
                n.destroyed = !0),
                null
            }
            static extendDefaults(e) {
                zn(mi, e)
            }
            static get extendedDefaults() {
                return mi
            }
            static get defaults() {
                return ui
            }
            static installModule(e) {
                gi.prototype.__modules__ || (gi.prototype.__modules__ = []);
                const t = gi.prototype.__modules__;
                "function" == typeof e && t.indexOf(e) < 0 && t.push(e)
            }
            static use(e) {
                return Array.isArray(e) ? (e.forEach((e=>gi.installModule(e))),
                gi) : (gi.installModule(e),
                gi)
            }
        }
        Object.keys(hi).forEach((e=>{
            Object.keys(hi[e]).forEach((t=>{
                gi.prototype[t] = hi[e][t]
            }
            ))
        }
        )),
        gi.use([function(e) {
            let {swiper: t, on: n, emit: i} = e;
            const s = Cn();
            let r = null
              , o = null;
            const a = ()=>{
                t && !t.destroyed && t.initialized && (i("beforeResize"),
                i("resize"))
            }
              , l = ()=>{
                t && !t.destroyed && t.initialized && i("orientationchange")
            }
            ;
            n("init", (()=>{
                t.params.resizeObserver && void 0 !== s.ResizeObserver ? t && !t.destroyed && t.initialized && (r = new ResizeObserver((e=>{
                    o = s.requestAnimationFrame((()=>{
                        const {width: n, height: i} = t;
                        let s = n
                          , r = i;
                        e.forEach((e=>{
                            let {contentBoxSize: n, contentRect: i, target: o} = e;
                            o && o !== t.el || (s = i ? i.width : (n[0] || n).inlineSize,
                            r = i ? i.height : (n[0] || n).blockSize)
                        }
                        )),
                        s === n && r === i || a()
                    }
                    ))
                }
                )),
                r.observe(t.el)) : (s.addEventListener("resize", a),
                s.addEventListener("orientationchange", l))
            }
            )),
            n("destroy", (()=>{
                o && s.cancelAnimationFrame(o),
                r && r.unobserve && t.el && (r.unobserve(t.el),
                r = null),
                s.removeEventListener("resize", a),
                s.removeEventListener("orientationchange", l)
            }
            ))
        }
        , function(e) {
            let {swiper: t, extendParams: n, on: i, emit: s} = e;
            const r = []
              , o = Cn()
              , a = function(e, t) {
                void 0 === t && (t = {});
                const n = new (o.MutationObserver || o.WebkitMutationObserver)((e=>{
                    if (1 === e.length)
                        return void s("observerUpdate", e[0]);
                    const t = function() {
                        s("observerUpdate", e[0])
                    };
                    o.requestAnimationFrame ? o.requestAnimationFrame(t) : o.setTimeout(t, 0)
                }
                ));
                n.observe(e, {
                    attributes: void 0 === t.attributes || t.attributes,
                    childList: void 0 === t.childList || t.childList,
                    characterData: void 0 === t.characterData || t.characterData
                }),
                r.push(n)
            };
            n({
                observer: !1,
                observeParents: !1,
                observeSlideChildren: !1
            }),
            i("init", (()=>{
                if (t.params.observer) {
                    if (t.params.observeParents) {
                        const e = t.$el.parents();
                        for (let t = 0; t < e.length; t += 1)
                            a(e[t])
                    }
                    a(t.$el[0], {
                        childList: t.params.observeSlideChildren
                    }),
                    a(t.$wrapperEl[0], {
                        attributes: !1
                    })
                }
            }
            )),
            i("destroy", (()=>{
                r.forEach((e=>{
                    e.disconnect()
                }
                )),
                r.splice(0, r.length)
            }
            ))
        }
        ]);
        const vi = gi;
        function bi(e) {
            let {swiper: t, extendParams: n, on: i, emit: s} = e;
            function r(e) {
                let n;
                return e && (n = Pn(e),
                t.params.uniqueNavElements && "string" == typeof e && n.length > 1 && 1 === t.$el.find(e).length && (n = t.$el.find(e))),
                n
            }
            function o(e, n) {
                const i = t.params.navigation;
                e && e.length > 0 && (e[n ? "addClass" : "removeClass"](i.disabledClass),
                e[0] && "BUTTON" === e[0].tagName && (e[0].disabled = n),
                t.params.watchOverflow && t.enabled && e[t.isLocked ? "addClass" : "removeClass"](i.lockClass))
            }
            function a() {
                if (t.params.loop)
                    return;
                const {$nextEl: e, $prevEl: n} = t.navigation;
                o(n, t.isBeginning && !t.params.rewind),
                o(e, t.isEnd && !t.params.rewind)
            }
            function l(e) {
                e.preventDefault(),
                (!t.isBeginning || t.params.loop || t.params.rewind) && (t.slidePrev(),
                s("navigationPrev"))
            }
            function d(e) {
                e.preventDefault(),
                (!t.isEnd || t.params.loop || t.params.rewind) && (t.slideNext(),
                s("navigationNext"))
            }
            function c() {
                const e = t.params.navigation;
                if (t.params.navigation = function(e, t, n, i) {
                    const s = Tn();
                    return e.params.createElements && Object.keys(i).forEach((r=>{
                        if (!n[r] && !0 === n.auto) {
                            let o = e.$el.children(`.${i[r]}`)[0];
                            o || (o = s.createElement("div"),
                            o.className = i[r],
                            e.$el.append(o)),
                            n[r] = o,
                            t[r] = o
                        }
                    }
                    )),
                    n
                }(t, t.originalParams.navigation, t.params.navigation, {
                    nextEl: "swiper-button-next",
                    prevEl: "swiper-button-prev"
                }),
                !e.nextEl && !e.prevEl)
                    return;
                const n = r(e.nextEl)
                  , i = r(e.prevEl);
                n && n.length > 0 && n.on("click", d),
                i && i.length > 0 && i.on("click", l),
                Object.assign(t.navigation, {
                    $nextEl: n,
                    nextEl: n && n[0],
                    $prevEl: i,
                    prevEl: i && i[0]
                }),
                t.enabled || (n && n.addClass(e.lockClass),
                i && i.addClass(e.lockClass))
            }
            function p() {
                const {$nextEl: e, $prevEl: n} = t.navigation;
                e && e.length && (e.off("click", d),
                e.removeClass(t.params.navigation.disabledClass)),
                n && n.length && (n.off("click", l),
                n.removeClass(t.params.navigation.disabledClass))
            }
            n({
                navigation: {
                    nextEl: null,
                    prevEl: null,
                    hideOnClick: !1,
                    disabledClass: "swiper-button-disabled",
                    hiddenClass: "swiper-button-hidden",
                    lockClass: "swiper-button-lock",
                    navigationDisabledClass: "swiper-navigation-disabled"
                }
            }),
            t.navigation = {
                nextEl: null,
                $nextEl: null,
                prevEl: null,
                $prevEl: null
            },
            i("init", (()=>{
                !1 === t.params.navigation.enabled ? u() : (c(),
                a())
            }
            )),
            i("toEdge fromEdge lock unlock", (()=>{
                a()
            }
            )),
            i("destroy", (()=>{
                p()
            }
            )),
            i("enable disable", (()=>{
                const {$nextEl: e, $prevEl: n} = t.navigation;
                e && e[t.enabled ? "removeClass" : "addClass"](t.params.navigation.lockClass),
                n && n[t.enabled ? "removeClass" : "addClass"](t.params.navigation.lockClass)
            }
            )),
            i("click", ((e,n)=>{
                const {$nextEl: i, $prevEl: r} = t.navigation
                  , o = n.target;
                if (t.params.navigation.hideOnClick && !Pn(o).is(r) && !Pn(o).is(i)) {
                    if (t.pagination && t.params.pagination && t.params.pagination.clickable && (t.pagination.el === o || t.pagination.el.contains(o)))
                        return;
                    let e;
                    i ? e = i.hasClass(t.params.navigation.hiddenClass) : r && (e = r.hasClass(t.params.navigation.hiddenClass)),
                    s(!0 === e ? "navigationShow" : "navigationHide"),
                    i && i.toggleClass(t.params.navigation.hiddenClass),
                    r && r.toggleClass(t.params.navigation.hiddenClass)
                }
            }
            ));
            const u = ()=>{
                t.$el.addClass(t.params.navigation.navigationDisabledClass),
                p()
            }
            ;
            Object.assign(t.navigation, {
                enable: ()=>{
                    t.$el.removeClass(t.params.navigation.navigationDisabledClass),
                    c(),
                    a()
                }
                ,
                disable: u,
                update: a,
                init: c,
                destroy: p
            })
        }
        const wi = e=>{
            try {
                const t = e.querySelector(".swiper-button-next")
                  , n = e.querySelector(".swiper-button-prev")
                  , i = e.querySelector(".swiper");
                new vi(i,{
                    modules: [bi],
                    spaceBetween: 30,
                    slidesPerView: 1,
                    centeredSlides: !0,
                    loop: !0,
                    navigation: {
                        nextEl: t,
                        prevEl: n
                    },
                    breakpoints: {
                        420: {
                            slidesPerView: "auto"
                        }
                    }
                })
            } catch (e) {
                console.warn("carouselBootstrap E", e)
            }
        }
        ;
        document.addEventListener("DOMContentLoaded", (()=>{
            try {
                const e = document.querySelectorAll(".swiper-container");
                if (!e.length)
                    return;
                e.forEach(wi)
            } catch (e) {
                console.warn("carousel DOMContentLoaded E", e)
            }
        }
        ))
    }
    )()
}
)();

