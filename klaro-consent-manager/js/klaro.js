! function(e, t) {
    "object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.klaro = t() : e.klaro = t()
}(this, function() {
    return function(e) {
        function t(o) {
            if (n[o]) return n[o].exports;
            var r = n[o] = {
                i: o,
                l: !1,
                exports: {}
            };
            return e[o].call(r.exports, r, r.exports, t), r.l = !0, r.exports
        }
        var n = {};
        return t.m = e, t.c = n, t.i = function(e) {
            return e
        }, t.d = function(e, n, o) {
            t.o(e, n) || Object.defineProperty(e, n, {
                configurable: !1,
                enumerable: !0,
                get: o
            })
        }, t.n = function(e) {
            var n = e && e.__esModule ? function() {
                return e.default
            } : function() {
                return e
            };
            return t.d(n, "a", n), n
        }, t.o = function(e, t) {
            return Object.prototype.hasOwnProperty.call(e, t)
        }, t.p = "", t(t.s = 33)
    }([function(e, t, n) {
        "use strict";

        function o() {
            return null
        }

        function r(e) {
            var t = e.nodeName,
                n = e.attributes;
            e.attributes = {}, t.defaultProps && _(e.attributes, t.defaultProps), n && _(e.attributes, n)
        }

        function i(e, t) {
            var n, o, r;
            if (t) {
                for (r in t)
                    if (n = G.test(r)) break;
                if (n) {
                    o = e.attributes = {};
                    for (r in t) t.hasOwnProperty(r) && (o[G.test(r) ? r.replace(/([A-Z0-9])/, "-$1").toLowerCase() : r] = t[r])
                }
            }
        }

        function a(e, t, o) {
            var r = t && t._preactCompatRendered && t._preactCompatRendered.base;
            r && r.parentNode !== t && (r = null), !r && t && (r = t.firstElementChild);
            for (var i = t.childNodes.length; i--;) t.childNodes[i] !== r && t.removeChild(t.childNodes[i]);
            var a = n.i(K.c)(e, t, r);
            return t && (t._preactCompatRendered = a && (a._component || {
                base: a
            })), "function" == typeof o && o(), a && a._component || a
        }

        function l(e, t, o, r) {
            var i = n.i(K.a)(ee, {
                    context: e.context
                }, t),
                l = a(i, o),
                c = l._component || l.base;
            return r && r.call(c, l), c
        }

        function c(e) {
            l(this, e.vnode, e.container)
        }

        function s(e, t) {
            return n.i(K.a)(c, {
                vnode: e,
                container: t
            })
        }

        function p(e) {
            var t = e._preactCompatRendered && e._preactCompatRendered.base;
            return !(!t || t.parentNode !== e) && (n.i(K.c)(n.i(K.a)(o), e, t), !0)
        }

        function u(e) {
            return v.bind(null, e)
        }

        function d(e, t) {
            for (var n = t || 0; n < e.length; n++) {
                var o = e[n];
                Array.isArray(o) ? d(o) : o && "object" === (void 0 === o ? "undefined" : W(o)) && !k(o) && (o.props && o.type || o.attributes && o.nodeName || o.children) && (e[n] = v(o.type || o.nodeName, o.props || o.attributes, o.children))
            }
        }

        function f(e) {
            return "function" == typeof e && !(e.prototype && e.prototype.render)
        }

        function m(e) {
            return P({
                displayName: e.displayName || e.name,
                render: function() {
                    return e(this.props, this.context)
                }
            })
        }

        function h(e) {
            var t = e[$];
            return t ? !0 === t ? e : t : (t = m(e), Object.defineProperty(t, $, {
                configurable: !0,
                value: !0
            }), t.displayName = e.displayName, t.propTypes = e.propTypes, t.defaultProps = e.defaultProps, Object.defineProperty(e, $, {
                configurable: !0,
                value: t
            }), t)
        }

        function v() {
            for (var e = [], t = arguments.length; t--;) e[t] = arguments[t];
            return d(e, 2), b(K.a.apply(void 0, e))
        }

        function b(e) {
            e.preactCompatNormalized = !0, x(e), f(e.nodeName) && (e.nodeName = h(e.nodeName));
            var t = e.attributes.ref,
                n = t && (void 0 === t ? "undefined" : W(t));
            return !te || "string" !== n && "number" !== n || (e.attributes.ref = g(t, te)), w(e), e
        }

        function y(e, t) {
            for (var o = [], r = arguments.length - 2; r-- > 0;) o[r] = arguments[r + 2];
            if (!k(e)) return e;
            var i = e.attributes || e.props,
                a = n.i(K.a)(e.nodeName || e.type, _({}, i), e.children || i && i.children),
                l = [a, t];
            return o && o.length ? l.push(o) : t && t.children && l.push(t.children), b(K.d.apply(void 0, l))
        }

        function k(e) {
            return e && (e instanceof Z || e.$$typeof === V)
        }

        function g(e, t) {
            return t._refProxies[e] || (t._refProxies[e] = function(n) {
                t && t.refs && (t.refs[e] = n, null === n && (delete t._refProxies[e], t = null))
            })
        }

        function w(e) {
            var t = e.nodeName,
                n = e.attributes;
            if (n && "string" == typeof t) {
                var o = {};
                for (var r in n) o[r.toLowerCase()] = r;
                if (o.ondoubleclick && (n.ondblclick = n[o.ondoubleclick], delete n[o.ondoubleclick]), o.onchange && ("textarea" === t || "input" === t.toLowerCase() && !/^fil|che|rad/i.test(n.type))) {
                    var i = o.oninput || "oninput";
                    n[i] || (n[i] = z([n[i], n[o.onchange]]), delete n[o.onchange])
                }
            }
        }

        function x(e) {
            var t = e.attributes || (e.attributes = {});
            ae.enumerable = "className" in t, t.className && (t.class = t.className), Object.defineProperty(t, "className", ae)
        }

        function _(e, t) {
            for (var n = arguments, o = 1, r = void 0; o < arguments.length; o++)
                if (r = n[o])
                    for (var i in r) r.hasOwnProperty(i) && (e[i] = r[i]);
            return e
        }

        function C(e, t) {
            for (var n in e)
                if (!(n in t)) return !0;
            for (var o in t)
                if (e[o] !== t[o]) return !0;
            return !1
        }

        function O(e) {
            return e && (e.base || 1 === e.nodeType && e) || null
        }

        function N() {}

        function P(e) {
            function t(e, t) {
                E(this), R.call(this, e, t, X), T.call(this, e, t)
            }
            return e = _({
                constructor: t
            }, e), e.mixins && j(e, S(e.mixins)), e.statics && _(t, e.statics), e.propTypes && (t.propTypes = e.propTypes), e.defaultProps && (t.defaultProps = e.defaultProps), e.getDefaultProps && (t.defaultProps = e.getDefaultProps.call(t)), N.prototype = R.prototype, t.prototype = _(new N, e), t.displayName = e.displayName || "Component", t
        }

        function S(e) {
            for (var t = {}, n = 0; n < e.length; n++) {
                var o = e[n];
                for (var r in o) o.hasOwnProperty(r) && "function" == typeof o[r] && (t[r] || (t[r] = [])).push(o[r])
            }
            return t
        }

        function j(e, t) {
            for (var n in t) t.hasOwnProperty(n) && (e[n] = z(t[n].concat(e[n] || ne), "getDefaultProps" === n || "getInitialState" === n || "getChildContext" === n))
        }

        function E(e) {
            for (var t in e) {
                var n = e[t];
                "function" != typeof n || n.__bound || F.hasOwnProperty(t) || ((e[t] = n.bind(e)).__bound = !0)
            }
        }

        function A(e, t, n) {
            if ("string" == typeof t && (t = e.constructor.prototype[t]), "function" == typeof t) return t.apply(e, n)
        }

        function z(e, t) {
            return function() {
                for (var n, o = arguments, r = this, i = 0; i < e.length; i++) {
                    var a = A(r, e[i], o);
                    if (t && null != a) {
                        n || (n = {});
                        for (var l in a) a.hasOwnProperty(l) && (n[l] = a[l])
                    } else void 0 !== a && (n = a)
                }
                return n
            }
        }

        function T(e, t) {
            M.call(this, e, t), this.componentWillReceiveProps = z([M, this.componentWillReceiveProps || "componentWillReceiveProps"]), this.render = z([M, D, this.render || "render", U])
        }

        function M(e, t) {
            if (e) {
                var n = e.children;
                if (n && Array.isArray(n) && 1 === n.length && ("string" == typeof n[0] || "function" == typeof n[0] || n[0] instanceof Z) && (e.children = n[0], e.children && "object" === W(e.children) && (e.children.length = 1, e.children[0] = e.children)), J) {
                    var o = "function" == typeof this ? this : this.constructor,
                        r = this.propTypes || o.propTypes,
                        i = this.displayName || o.name;
                    r && q.a.checkPropTypes(r, e, "prop", i)
                }
            }
        }

        function D(e) {
            te = this
        }

        function U() {
            te === this && (te = null)
        }

        function R(e, t, n) {
            K.e.call(this, e, t), this.state = this.getInitialState ? this.getInitialState() : {}, this.refs = {}, this._refProxies = {}, n !== X && T.call(this, e, t)
        }

        function L(e, t) {
            R.call(this, e, t)
        }

        function B(e) {
            e()
        }
        n.d(t, "a", function() {
            return a
        });
        var I = n(1),
            q = n.n(I),
            K = n(30),
            W = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            } : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            },
            H = "a abbr address area article aside audio b base bdi bdo big blockquote body br button canvas caption cite code col colgroup data datalist dd del details dfn dialog div dl dt em embed fieldset figcaption figure footer form h1 h2 h3 h4 h5 h6 head header hgroup hr html i iframe img input ins kbd keygen label legend li link main map mark menu menuitem meta meter nav noscript object ol optgroup option output p param picture pre progress q rp rt ruby s samp script section select small source span strong style sub summary sup table tbody td textarea tfoot th thead time title tr track u ul var video wbr circle clipPath defs ellipse g image line linearGradient mask path pattern polygon polyline radialGradient rect stop svg text tspan".split(" "),
            V = "undefined" != typeof Symbol && Symbol.for && Symbol.for("react.element") || 60103,
            $ = "undefined" != typeof Symbol && Symbol.for ? Symbol.for("__preactCompatWrapper") : "__preactCompatWrapper",
            F = {
                constructor: 1,
                render: 1,
                shouldComponentUpdate: 1,
                componentWillReceiveProps: 1,
                componentWillUpdate: 1,
                componentDidUpdate: 1,
                componentWillMount: 1,
                componentDidMount: 1,
                componentWillUnmount: 1,
                componentDidUnmount: 1
            },
            G = /^(?:accent|alignment|arabic|baseline|cap|clip|color|fill|flood|font|glyph|horiz|marker|overline|paint|stop|strikethrough|stroke|text|underline|unicode|units|v|vector|vert|word|writing|x)[A-Z]/,
            X = {},
            J = !1;
        try {
            J = !1
        } catch (e) {}
        var Z = n.i(K.a)("a", null).constructor;
        Z.prototype.$$typeof = V, Z.prototype.preactCompatUpgraded = !1, Z.prototype.preactCompatNormalized = !1, Object.defineProperty(Z.prototype, "type", {
            get: function() {
                return this.nodeName
            },
            set: function(e) {
                this.nodeName = e
            },
            configurable: !0
        }), Object.defineProperty(Z.prototype, "props", {
            get: function() {
                return this.attributes
            },
            set: function(e) {
                this.attributes = e
            },
            configurable: !0
        });
        var Q = K.b.event;
        K.b.event = function(e) {
            return Q && (e = Q(e)), e.persist = Object, e.nativeEvent = e, e
        };
        var Y = K.b.vnode;
        K.b.vnode = function(e) {
            if (!e.preactCompatUpgraded) {
                e.preactCompatUpgraded = !0;
                var t = e.nodeName,
                    n = e.attributes = null == e.attributes ? {} : _({}, e.attributes);
                "function" == typeof t ? (!0 === t[$] || t.prototype && "isReactComponent" in t.prototype) && (e.children && "" === String(e.children) && (e.children = void 0), e.children && (n.children = e.children), e.preactCompatNormalized || b(e), r(e)) : (e.children && "" === String(e.children) && (e.children = void 0), e.children && (n.children = e.children), n.defaultValue && (n.value || 0 === n.value || (n.value = n.defaultValue), delete n.defaultValue), i(e, n))
            }
            Y && Y(e)
        };
        var ee = function() {};
        ee.prototype.getChildContext = function() {
            return this.props.context
        }, ee.prototype.render = function(e) {
            return e.children[0]
        };
        for (var te, ne = [], oe = {
                map: function(e, t, n) {
                    return null == e ? null : (e = oe.toArray(e), n && n !== e && (t = t.bind(n)), e.map(t))
                },
                forEach: function(e, t, n) {
                    if (null == e) return null;
                    e = oe.toArray(e), n && n !== e && (t = t.bind(n)), e.forEach(t)
                },
                count: function(e) {
                    return e && e.length || 0
                },
                only: function(e) {
                    if (e = oe.toArray(e), 1 !== e.length) throw new Error("Children.only() expects only one child.");
                    return e[0]
                },
                toArray: function(e) {
                    return null == e ? [] : ne.concat(e)
                }
            }, re = {}, ie = H.length; ie--;) re[H[ie]] = u(H[ie]);
        var ae = {
            configurable: !0,
            get: function() {
                return this.class
            },
            set: function(e) {
                this.class = e
            }
        };
        _(R.prototype = new K.e, {
            constructor: R,
            isReactComponent: {},
            replaceState: function(e, t) {
                var n = this;
                this.setState(e, t);
                for (var o in n.state) o in e || delete n.state[o]
            },
            getDOMNode: function() {
                return this.base
            },
            isMounted: function() {
                return !!this.base
            }
        }), N.prototype = R.prototype, L.prototype = new N, L.prototype.isPureReactComponent = !0, L.prototype.shouldComponentUpdate = function(e, t) {
            return C(this.props, e) || C(this.state, t)
        };
        var le = {
            version: "15.1.0",
            DOM: re,
            PropTypes: q.a,
            Children: oe,
            render: a,
            createClass: P,
            createPortal: s,
            createFactory: u,
            createElement: v,
            cloneElement: y,
            isValidElement: k,
            findDOMNode: O,
            unmountComponentAtNode: p,
            Component: R,
            PureComponent: L,
            unstable_renderSubtreeIntoContainer: l,
            unstable_batchedUpdates: B,
            __spread: _
        };
        t.b = le
    }, function(e, t, n) {
        "function" == typeof Symbol && Symbol.iterator;
        e.exports = n(5)()
    }, function(e, t, n) {
        "use strict";

        function o(e) {
            for (var t = new Set([]), n = 0; n < e.apps.length; n++)
                for (var o = e.apps[n].purposes || [], r = 0; r < o.length; r++) t.add(o[r]);
            return Array.from(t)
        }
        t.a = o
    }, function(e, t, n) {
        "use strict";

        function o(e) {
            return e.elementID || "klaro"
        }

        function r(e) {
            var t = o(e),
                n = document.getElementById(t);
            return null === n && (n = document.createElement("div"), n.id = t, document.body.appendChild(n)), n
        }

        function i(e) {
            var t = new Map([]);
            return n.i(b.b)(t, g), n.i(b.b)(t, n.i(b.a)(e.translations || {})), t
        }

        function a(e, t) {
            if (void 0 !== e) {
                var o = r(e),
                    a = i(e),
                    l = c(e),
                    s = e.lang || n.i(y.a)(),
                    p = function() {
                        for (var e = arguments.length, t = Array(e), n = 0; n < e; n++) t[n] = arguments[n];
                        return y.b.apply(void 0, [a, s].concat(t))
                    };
                return n.i(h.a)(d.b.createElement(f.a, {
                    t: p,
                    stylePrefix: _,
                    manager: l,
                    config: e,
                    show: t || !1
                }), o)
            }
        }

        function l(e) {
            x || a(C), null !== k && k(e)
        }

        function c(e) {
            e = e || C;
            var t = o(e);
            return void 0 === O[t] && (O[t] = new m.a(e)), O[t]
        }

        function s(e) {
            return e = e || C, a(e, !0), !1
        }

        function p() {
            return "v0.2.5"
        }
        Object.defineProperty(t, "__esModule", {
            value: !0
        }), t.renderKlaro = a, t.initialize = l, t.getManager = c, t.show = s, t.version = p;
        var u = n(31),
            d = (n.n(u), n(0)),
            f = n(9),
            m = n(14),
            h = n(0),
            v = n(15),
            b = n(18),
            y = n(17);
        n.d(t, "language", function() {
            return y.a
        });
        var k = window.onload,
            g = n.i(b.a)(v.a),
            w = document.currentScript.dataset.config || "klaroConfig",
            x = "true" == document.currentScript.dataset.noAutoLoad,
            _ = document.currentScript.dataset.stylePrefix || "klaro",
            C = window[w],
            O = {};
        window.onload = l
    }, function(e, t) {
        function n(e, t) {
            var n = e[1] || "",
                r = e[3];
            if (!r) return n;
            if (t && "function" == typeof btoa) {
                var i = o(r);
                return [n].concat(r.sources.map(function(e) {
                    return "/*# sourceURL=" + r.sourceRoot + e + " */"
                })).concat([i]).join("\n")
            }
            return [n].join("\n")
        }

        function o(e) {
            return "/*# sourceMappingURL=data:application/json;charset=utf-8;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(e)))) + " */"
        }
        e.exports = function(e) {
            var t = [];
            return t.toString = function() {
                return this.map(function(t) {
                    var o = n(t, e);
                    return t[2] ? "@media " + t[2] + "{" + o + "}" : o
                }).join("")
            }, t.i = function(e, n) {
                "string" == typeof e && (e = [
                    [null, e, ""]
                ]);
                for (var o = {}, r = 0; r < this.length; r++) {
                    var i = this[r][0];
                    "number" == typeof i && (o[i] = !0)
                }
                for (r = 0; r < e.length; r++) {
                    var a = e[r];
                    "number" == typeof a[0] && o[a[0]] || (n && !a[2] ? a[2] = n : n && (a[2] = "(" + a[2] + ") and (" + n + ")"), t.push(a))
                }
            }, t
        }
    }, function(e, t, n) {
        "use strict";

        function o() {}
        var r = n(6);
        e.exports = function() {
            function e(e, t, n, o, i, a) {
                if (a !== r) {
                    var l = new Error("Calling PropTypes validators directly is not supported by the `prop-types` package. Use PropTypes.checkPropTypes() to call them. Read more at http://fb.me/use-check-prop-types");
                    throw l.name = "Invariant Violation", l
                }
            }

            function t() {
                return e
            }
            e.isRequired = e;
            var n = {
                array: e,
                bool: e,
                func: e,
                number: e,
                object: e,
                string: e,
                symbol: e,
                any: e,
                arrayOf: t,
                element: e,
                instanceOf: t,
                node: e,
                objectOf: t,
                oneOf: t,
                oneOfType: t,
                shape: t,
                exact: t
            };
            return n.checkPropTypes = o, n.PropTypes = n, n
        }
    }, function(e, t, n) {
        "use strict";
        e.exports = "SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED"
    }, function(e, t) {
        e.exports = function(e) {
            var t = "undefined" != typeof window && window.location;
            if (!t) throw new Error("fixUrls requires window.location");
            if (!e || "string" != typeof e) return e;
            var n = t.protocol + "//" + t.host,
                o = n + t.pathname.replace(/\/[^\/]*$/, "/");
            return e.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(e, t) {
                var r = t.trim().replace(/^"(.*)"$/, function(e, t) {
                    return t
                }).replace(/^'(.*)'$/, function(e, t) {
                    return t
                });
                if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/)/i.test(r)) return e;
                var i;
                return i = 0 === r.indexOf("//") ? r : 0 === r.indexOf("/") ? n + r : o + r.replace(/^\.\//, ""), "url(" + JSON.stringify(i) + ")"
            })
        }
    }, function(e, t, n) {
        "use strict";

        function o(e, t) {
            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }

        function r(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        function i(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var a = n(0),
            l = Object.assign || function(e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var o in n) Object.prototype.hasOwnProperty.call(n, o) && (e[o] = n[o])
                }
                return e
            },
            c = function() {
                function e(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
                    }
                }
                return function(t, n, o) {
                    return n && e(t.prototype, n), o && e(t, o), t
                }
            }(),
            s = function(e) {
                function t() {
                    return o(this, t), r(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
                }
                return i(t, e), c(t, [{
                    key: "render",
                    value: function() {
                        var e = this.props,
                            t = e.checked,
                            n = e.onToggle,
                            o = e.name,
                            r = e.title,
                            i = e.description,
                            c = e.t,
                            s = this.props.required || !1,
                            p = this.props.optOut || !1,
                            u = this.props.purposes || [],
                            d = function(e) {
                                n(e.target.checked)
                            },
                            f = "app-item-" + o,
                            m = u.map(function(e) {
                                return c(["purposes", e])
                            }).join(", "),
                            h = p ? a.b.createElement("span", {
                                class: "cm-opt-out",
                                title: c(["app", "optOut", "description"])
                            }, c(["app", "optOut", "title"])) : "",
                            v = s ? a.b.createElement("span", {
                                class: "cm-required",
                                title: c(["app", "required", "description"])
                            }, c(["app", "required", "title"])) : "",
                            b = void 0;
                        return u.length > 0 && (b = a.b.createElement("p", {
                            className: "purposes"
                        }, c(["app", u.length > 1 ? "purposes" : "purpose"]), ": ", m)), a.b.createElement("div", null, a.b.createElement("input", {
                            id: f,
                            class: "cm-app-input",
                            "aria-describedby": f + "-description",
                            disabled: s,
                            checked: t || s,
                            type: "checkbox",
                            onChange: d
                        }), a.b.createElement("label", l({
                            for: f,
                            class: "cm-app-label"
                        }, s ? {
                            tabIndex: "0"
                        } : {}), a.b.createElement("span", {
                            className: "cm-app-title"
                        }, r), v, h, a.b.createElement("span", {
                            className: "switch" + (s ? " disabled" : "")
                        }, a.b.createElement("div", {
                            className: "slider round active"
                        }))), a.b.createElement("div", {
                            id: f + "-description"
                        }, a.b.createElement("p", {
                            className: "cm-app-description"
                        }, i || c([o, "description"])), b))
                    }
                }]), t
            }(a.b.Component);
        t.a = s
    }, function(e, t, n) {
        "use strict";

        function o(e, t) {
            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }

        function r(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        function i(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var a = n(0),
            l = n(12),
            c = function() {
                function e(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
                    }
                }
                return function(t, n, o) {
                    return n && e(t.prototype, n), o && e(t, o), t
                }
            }(),
            s = function(e) {
                function t() {
                    return o(this, t), r(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
                }
                return i(t, e), c(t, [{
                    key: "render",
                    value: function() {
                        var e = this.props,
                            t = e.config,
                            n = e.show,
                            o = e.t,
                            r = e.manager,
                            i = e.stylePrefix;
                        return a.b.createElement("div", {
                            className: i
                        }, a.b.createElement(l.a, {
                            t: o,
                            show: n,
                            config: t,
                            manager: r
                        }))
                    }
                }]), t
            }(a.b.Component);
        t.a = s
    }, function(e, t, n) {
        "use strict";

        function o(e, t) {
            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }

        function r(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        function i(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var a = n(0),
            l = n(8),
            c = (n(2), Object.assign || function(e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var o in n) Object.prototype.hasOwnProperty.call(n, o) && (e[o] = n[o])
                }
                return e
            }),
            s = function() {
                function e(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
                    }
                }
                return function(t, n, o) {
                    return n && e(t.prototype, n), o && e(t, o), t
                }
            }(),
            p = (function(e) {
                function t() {
                    return o(this, t), r(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
                }
                i(t, e), s(t, [{
                    key: "render",
                    value: function() {}
                }])
            }(a.b.Component), function(e) {
                function t(e, n) {
                    o(this, t);
                    var i = r(this, (t.__proto__ || Object.getPrototypeOf(t)).call(this, e, n));
                    return e.manager.watch(i), i.state = {
                        consents: e.manager.consents
                    }, i
                }
                return i(t, e), s(t, [{
                    key: "componentWillUnmount",
                    value: function() {
                        this.props.manager.unwatch(this)
                    }
                }, {
                    key: "update",
                    value: function(e, t, n) {
                        e == this.props.manager && "consents" == t && this.setState({
                            consents: n
                        })
                    }
                }, {
                    key: "render",
                    value: function() {
                        var e = this.props,
                            t = e.config,
                            n = e.t,
                            o = e.manager,
                            r = this.state.consents,
                            i = t.apps,
                            s = function(e, t) {
                                e.map(function(e) {
                                    o.updateConsent(e.name, t)
                                }), o.confirmed && o.saveAndApplyConsents()
                            },
                            p = function(e) {
                                s(i, e)
                            },
                            u = i.map(function(e, t) {
                                var o = function(t) {
                                        s([e], t)
                                    },
                                    i = r[e.name];
                                return a.b.createElement("li", {
                                    className: "cm-app"
                                }, a.b.createElement(l.a, c({
                                    checked: i || e.required,
                                    onToggle: o,
                                    t: n
                                }, e)))
                            }),
                            d = 0 == i.filter(function(e) {
                                return !(e.required || !1) && r[e.name]
                            }).length,
                            f = a.b.createElement("li", {
                                className: "cm-app cm-toggle-all"
                            }, a.b.createElement(l.a, {
                                name: "disableAll",
                                title: n(["app", "disableAll", "title"]),
                                description: n(["app", "disableAll", "description"]),
                                checked: !d,
                                onToggle: p,
                                t: n
                            }));
                        return a.b.createElement("ul", {
                            className: "cm-apps"
                        }, u, f)
                    }
                }]), t
            }(a.b.Component));
        t.a = p
    }, function(e, t, n) {
        "use strict";

        function o(e, t) {
            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }

        function r(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        function i(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var a = n(0),
            l = n(13),
            c = n(10),
            s = function() {
                function e(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
                    }
                }
                return function(t, n, o) {
                    return n && e(t.prototype, n), o && e(t, o), t
                }
            }(),
            p = function(e) {
                function t() {
                    return o(this, t), r(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
                }
                return i(t, e), s(t, [{
                    key: "render",
                    value: function() {
                        var e = this.props,
                            t = e.hide,
                            n = e.saveAndHide,
                            o = e.config,
                            r = e.manager,
                            i = e.t,
                            s = void 0;
                        o.mustConsent || (s = a.b.createElement("button", {
                            title: i(["close"]),
                            className: "hide",
                            type: "button",
                            onClick: t
                        }, a.b.createElement(l.a, {
                            t: i
                        })));
                        var p = a.b.createElement("a", {
                            onClick: function(e) {
                                t()
                            },
                            href: o.privacyPolicy
                        }, i(["consentModal", "privacyPolicy", "name"]));
                        return a.b.createElement("div", {
                            className: "cookie-modal"
                        }, a.b.createElement("div", {
                            className: "cm-bg",
                            onClick: t
                        }), a.b.createElement("div", {
                            className: "cm-modal"
                        }, a.b.createElement("div", {
                            className: "cm-header"
                        }, s, a.b.createElement("h1", {
                            className: "title"
                        }, i(["consentModal", "title"])), a.b.createElement("p", null, i(["consentModal", "description"]), "  ", i(["consentModal", "privacyPolicy", "text"], {
                            privacyPolicy: p
                        }))), a.b.createElement("div", {
                            className: "cm-body"
                        }, a.b.createElement(c.a, {
                            t: i,
                            config: o,
                            manager: r
                        })), a.b.createElement("div", {
                            className: "cm-footer"
                        }, a.b.createElement("button", {
                            className: "cm-btn cm-btn-success",
                            type: "button",
                            onClick: n
                        }, i(["save"])), a.b.createElement("a", {
                            target: "_blank",
                            className: "cm-powered-by",
                            href: o.poweredBy || "https://klaro.kiprotect.com"
                        }, i(["poweredBy"])))))
                    }
                }]), t
            }(a.b.Component);
        t.a = p
    }, function(e, t, n) {
        "use strict";

        function o(e, t) {
            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }

        function r(e, t) {
            if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? e : t
        }

        function i(e, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            e.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: e,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
        }
        var a = n(0),
            l = n(11),
            c = n(2),
            s = function() {
                function e(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
                    }
                }
                return function(t, n, o) {
                    return n && e(t.prototype, n), o && e(t, o), t
                }
            }(),
            p = function(e) {
                function t() {
                    return o(this, t), r(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
                }
                return i(t, e), s(t, [{
                    key: "componentWillReceiveProps",
                    value: function(e) {
                        e.show && this.setState({
                            modal: void 0
                        })
                    }
                }, {
                    key: "render",
                    value: function() {
                        var e, t = this,
                            o = this.state.modal,
                            r = this.props,
                            i = r.config,
                            s = r.manager,
                            p = r.show,
                            u = r.t,
                            d = n.i(c.a)(i),
                            f = d.map(function(e) {
                                return u(["purposes", e])
                            }).join(", "),
                            m = function(e) {
                                void 0 !== e && e.preventDefault(), t.setState({
                                    modal: !0
                                })
                            },
                            h = function(e) {
                                void 0 !== e && e.preventDefault(), t.setState({
                                    modal: !1
                                })
                            },
                            v = function(e) {
                                void 0 !== e && e.preventDefault(), s.saveAndApplyConsents(), t.setState({
                                    modal: !1
                                })
                            },
                            b = function(e) {
                                s.declineAll(), s.saveAndApplyConsents(), t.setState({
                                    modal: !1
                                })
                            };
                        if (s.changed && (e = a.b.createElement("p", {
                                className: "cn-changes"
                            }, u(["consentNotice", "changeDescription"]))), s.confirmed && !p) return a.b.createElement("div", null);
                        var y = (o || p && void 0 === o || i.mustConsent && s.confirmed, !i.mustConsent && !s.confirmed && !i.noNotice);
                        return o || p && void 0 === o || i.mustConsent && !s.confirmed ? a.b.createElement(l.a, {
                            t: u,
                            config: i,
                            hide: h,
                            declineAndHide: b,
                            saveAndHide: v,
                            manager: s
                        }) : a.b.createElement("div", {
                            className: "cookie-notice " + (y ? "" : "cookie-notice-hidden")
                        }, a.b.createElement("div", {
                            className: "cn-body"
                        }, a.b.createElement("p", null, u(["consentNotice", "description"], {
                            purposes: a.b.createElement("strong", null, f)
                        }), a.b.createElement("a", {
                            href: "#",
                            onClick: m
                        }, u(["consentNotice", "learnMore"]), "...")), e, a.b.createElement("p", {
                            className: "cn-ok"
                        }, a.b.createElement("button", {
                            className: "cm-btn cm-btn-sm cm-btn-success",
                            type: "button",
                            onClick: v
                        }, u(["ok"])), a.b.createElement("button", {
                            className: "cm-btn cm-btn-sm cm-btn-danger cn-decline",
                            type: "button",
                            onClick: b
                        }, u(["decline"])))))
                    }
                }]), t
            }(a.b.Component);
        t.a = p
    }, function(e, t, n) {
        "use strict";
        n.d(t, "a", function() {
            return r
        });
        var o = n(0),
            r = function(e) {
                var t = e.t;
                return o.b.createElement("svg", {
                    role: "img",
                    "aria-label": t(["close"]),
                    width: "12",
                    height: "12",
                    viewPort: "0 0 12 12",
                    version: "1.1",
                    xmlns: "http://www.w3.org/2000/svg"
                }, o.b.createElement("title", null, t(["close"])), o.b.createElement("line", {
                    x1: "1",
                    y1: "11",
                    x2: "11",
                    y2: "1",
                    "stroke-width": "1"
                }), o.b.createElement("line", {
                    x1: "1",
                    y1: "1",
                    x2: "11",
                    y2: "11",
                    "stroke-width": "1"
                }))
            }
    }, function(e, t, n) {
        "use strict";

        function o(e, t) {
            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }
        var r = n(16),
            i = function() {
                function e(e, t) {
                    var n = [],
                        o = !0,
                        r = !1,
                        i = void 0;
                    try {
                        for (var a, l = e[Symbol.iterator](); !(o = (a = l.next()).done) && (n.push(a.value), !t || n.length !== t); o = !0);
                    } catch (e) {
                        r = !0, i = e
                    } finally {
                        try {
                            !o && l.return && l.return()
                        } finally {
                            if (r) throw i
                        }
                    }
                    return n
                }
                return function(t, n) {
                    if (Array.isArray(t)) return t;
                    if (Symbol.iterator in Object(t)) return e(t, n);
                    throw new TypeError("Invalid attempt to destructure non-iterable instance")
                }
            }(),
            a = function() {
                function e(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
                    }
                }
                return function(t, n, o) {
                    return n && e(t.prototype, n), o && e(t, o), t
                }
            }(),
            l = function() {
                function e(t) {
                    o(this, e), this.config = t, this.consents = this.defaultConsents, this.confirmed = !1, this.changed = !1, this.states = {}, this.executedOnce = {}, this.watchers = new Set([]), this.loadConsents(), this.applyConsents()
                }
                return a(e, [{
                    key: "watch",
                    value: function(e) {
                        this.watchers.has(e) || this.watchers.add(e)
                    }
                }, {
                    key: "unwatch",
                    value: function(e) {
                        this.watchers.has(e) && this.watchers.delete(e)
                    }
                }, {
                    key: "notify",
                    value: function(e, t) {
                        var n = this;
                        this.watchers.forEach(function(o) {
                            o.update(n, e, t)
                        })
                    }
                }, {
                    key: "getApp",
                    value: function(e) {
                        var t = this.config.apps.filter(function(t) {
                            return t.name == e
                        });
                        if (t.length > 0) return t[0]
                    }
                }, {
                    key: "getDefaultConsent",
                    value: function(e) {
                        var t = e.default;
                        return void 0 === t && (t = this.config.default), void 0 === t && (t = !1), t
                    }
                }, {
                    key: "declineAll",
                    value: function() {
                        var e = this;
                        this.config.apps.map(function(t) {
                            e.updateConsent(t.name, !1)
                        })
                    }
                }, {
                    key: "updateConsent",
                    value: function(e, t) {
                        this.consents[e] = t, this.notify("consents", this.consents)
                    }
                }, {
                    key: "resetConsent",
                    value: function() {
                        this.consents = this.defaultConsents, this.confirmed = !1, this.applyConsents(), n.i(r.a)(this.cookieName), this.notify("consents", this.consents)
                    }
                }, {
                    key: "getConsent",
                    value: function(e) {
                        return this.consents[e] || !1
                    }
                }, {
                    key: "_checkConsents",
                    value: function() {
                        var e = !0,
                            t = new Set(this.config.apps.map(function(e) {
                                return e.name
                            })),
                            n = new Set(Object.keys(this.consents)),
                            o = !0,
                            r = !1,
                            i = void 0;
                        try {
                            for (var a, l = Object.keys(this.consents)[Symbol.iterator](); !(o = (a = l.next()).done); o = !0) {
                                var c = a.value;
                                t.has(c) || delete this.consents[c]
                            }
                        } catch (e) {
                            r = !0, i = e
                        } finally {
                            try {
                                !o && l.return && l.return()
                            } finally {
                                if (r) throw i
                            }
                        }
                        var s = !0,
                            p = !1,
                            u = void 0;
                        try {
                            for (var d, f = this.config.apps[Symbol.iterator](); !(s = (d = f.next()).done); s = !0) {
                                var m = d.value;
                                n.has(m.name) || (this.consents[m.name] = this.getDefaultConsent(m), e = !1)
                            }
                        } catch (e) {
                            p = !0, u = e
                        } finally {
                            try {
                                !s && f.return && f.return()
                            } finally {
                                if (p) throw u
                            }
                        }
                        this.confirmed = e, e || (this.changed = !0)
                    }
                }, {
                    key: "loadConsents",
                    value: function() {
                        var e = n.i(r.b)(this.cookieName);
                        return null !== e && (this.consents = JSON.parse(e.value), this._checkConsents(), this.notify("consents", this.consents)), this.consents
                    }
                }, {
                    key: "saveAndApplyConsents",
                    value: function() {
                        this.saveConsents(), this.applyConsents()
                    }
                }, {
                    key: "saveConsents",
                    value: function() {
                        null === this.consents && n.i(r.a)(this.cookieName);
                        var e = JSON.stringify(this.consents);
                        n.i(r.c)(this.cookieName, e, this.config.cookieExpiresAfterDays || 120), this.confirmed = !0, this.changed = !1
                    }
                }, {
                    key: "applyConsents",
                    value: function() {
                        for (var e = 0; e < this.config.apps.length; e++) {
                            var t = this.config.apps[e],
                                n = this.states[t.name],
                                o = this.confirmed || (void 0 !== t.optOut ? t.optOut : this.config.optOut || !1),
                                r = this.getConsent(t.name) && o;
                            n !== r && (this.updateAppElements(t, r), this.updateAppCookies(t, r), void 0 !== t.callback && t.callback(r, t), this.states[t.name] = r)
                        }
                    }
                }, {
                    key: "updateAppElements",
                    value: function(e, t) {
                        if (t) {
                            if (e.onlyOnce && this.executedOnce[e.name]) return;
                            this.executedOnce[e.name] = !0
                        }
                        for (var n = document.querySelectorAll("[data-name='" + e.name + "']"), o = 0; o < n.length; o++) {
                            var r = n[o],
                                i = r.parentElement,
                                a = r.dataset,
                                l = a.type,
                                c = (a.name, ["href", "src"]);
                            if ("SCRIPT" == r.tagName) {
                                var s = document.createElement("script"),
                                    p = !0,
                                    u = !1,
                                    d = void 0;
                                try {
                                    for (var f, m = Object.keys(a)[Symbol.iterator](); !(p = (f = m.next()).done); p = !0) {
                                        var h = f.value;
                                        s.dataset[h] = a[h]
                                    }
                                } catch (e) {
                                    u = !0, d = e
                                } finally {
                                    try {
                                        !p && m.return && m.return()
                                    } finally {
                                        if (u) throw d
                                    }
                                }
                                s.type = "opt-in", s.innerText = r.innerText, s.text = r.text, s.class = r.class, s.style = r.style, s.id = r.id, s.name = r.name, s.defer = r.defer, s.async = r.async, t && (s.type = l, void 0 !== a.src && (s.src = a.src)), i.insertBefore(s, r), i.removeChild(r)
                            } else if (t) {
                                var v = !0,
                                    b = !1,
                                    y = void 0;
                                try {
                                    for (var k, g = c[Symbol.iterator](); !(v = (k = g.next()).done); v = !0) {
                                        var w = k.value,
                                            x = a[w];
                                        void 0 !== x && (void 0 === a["original" + w] && (a["original" + w] = r[w]), r[w] = x)
                                    }
                                } catch (e) {
                                    b = !0, y = e
                                } finally {
                                    try {
                                        !v && g.return && g.return()
                                    } finally {
                                        if (b) throw y
                                    }
                                }
                                void 0 !== a.title && (r.title = a.title), void 0 !== a.originalDisplay && (r.style.display = a.originalDisplay)
                            } else {
                                void 0 !== a.title && r.removeAttribute("title"), "true" === a.hide && (void 0 === a.originalDisplay && (a.originalDisplay = r.style.display), r.style.display = "none");
                                var _ = !0,
                                    C = !1,
                                    O = void 0;
                                try {
                                    for (var N, P = c[Symbol.iterator](); !(_ = (N = P.next()).done); _ = !0) {
                                        var w = N.value,
                                            S = a[w];
                                        void 0 !== S && (void 0 !== a["original" + w] && (r[w] = a["original" + w]))
                                    }
                                } catch (e) {
                                    C = !0, O = e
                                } finally {
                                    try {
                                        !_ && P.return && P.return()
                                    } finally {
                                        if (C) throw O
                                    }
                                }
                            }
                        }
                    }
                }, {
                    key: "updateAppCookies",
                    value: function(e, t) {
                        if (!t && void 0 !== e.cookies && e.cookies.length > 0)
                            for (var o = n.i(r.d)(), a = 0; a < e.cookies.length; a++) {
                                var l = e.cookies[a],
                                    c = void 0,
                                    s = void 0;
                                if (l instanceof Array) {
                                    var p = l,
                                        u = i(p, 3);
                                    l = u[0], c = u[1], s = u[2]
                                }
                                l instanceof RegExp || (l = new RegExp("^" + function(e) {
                                    return e.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&")
                                }(l) + "$"));
                                for (var d = 0; d < o.length; d++) {
                                    var f = o[d],
                                        m = l.exec(f.name);
                                    null !== m && n.i(r.a)(f.name, c, s)
                                }
                            }
                    }
                }, {
                    key: "cookieName",
                    get: function() {
                        return this.config.cookieName || "klaro"
                    }
                }, {
                    key: "defaultConsents",
                    get: function() {
                        for (var e = {}, t = 0; t < this.config.apps.length; t++) {
                            var n = this.config.apps[t];
                            e[n.name] = this.getDefaultConsent(n)
                        }
                        return e
                    }
                }]), e
            }();
        t.a = l
    }, function(e, t, n) {
        "use strict";
        var o = n(20),
            r = n.n(o),
            i = n(21),
            a = n.n(i),
            l = n(22),
            c = n.n(l),
            s = n(23),
            p = n.n(s),
            u = n(24),
            d = n.n(u),
            f = n(25),
            m = n.n(f),
            h = n(26),
            v = n.n(h),
            b = n(27),
            y = n.n(b),
            k = n(29),
            g = n.n(k),
            w = n(28),
            x = n.n(w);
        t.a = {
            de: r.a,
            en: a.a,
            fi: c.a,
            fr: p.a,
            hu: d.a,
            it: m.a,
            nl: v.a,
            no: y.a,
            sv: g.a,
            ro: x.a
        }
    }, function(e, t, n) {
        "use strict";

        function o() {
            for (var e = document.cookie.split(";"), t = [], n = new RegExp("^\\s*([^=]+)\\s*=\\s*(.*?)$"), o = 0; o < e.length; o++) {
                var r = e[o],
                    i = n.exec(r);
                null !== i && t.push({
                    name: i[1],
                    value: i[2]
                })
            }
            return t
        }

        function r(e) {
            for (var t = o(), n = 0; n < t.length; n++)
                if (t[n].name == e) return t[n];
            return null
        }

        function i(e, t, n) {
            var o = "";
            if (n) {
                var r = new Date;
                r.setTime(r.getTime() + 24 * n * 60 * 60 * 1e3), o = "; expires=" + r.toUTCString()
            }
            document.cookie = e + "=" + (t || "") + o + "; path=/"
        }

        function a(e, t, n) {
            var o = e + "=; Max-Age=-99999999;";
            void 0 !== t && (o += " path=" + t + ";"), void 0 !== n && (o += " domain=" + n + ";"), document.cookie = o
        }
        t.d = o, t.b = r, t.c = i, t.a = a
    }, function(e, t, n) {
        "use strict";

        function o(e) {
            if (Array.isArray(e)) {
                for (var t = 0, n = Array(e.length); t < e.length; t++) n[t] = e[t];
                return n
            }
            return Array.from(e)
        }

        function r() {
            var e = (window.language || document.documentElement.lang || "en").toLowerCase(),
                t = new RegExp("^([\\w]+)-([\\w]+)$"),
                n = t.exec(e);
            return null == n ? e : n[1]
        }

        function i(e, t, n) {
            var o = t;
            Array.isArray(o) || (o = [o]);
            for (var r = e, i = 0; i < o.length; i++) {
                if (void 0 === r) return n;
                r = r instanceof Map ? r.get(o[i]) : r[o[i]]
            }
            return void 0 === r ? n : r
        }

        function a(e, t, n) {
            var r = n;
            Array.isArray(r) || (r = [r]);
            var a = i(e, [t].concat(o(r)));
            if (void 0 === a) return "[missing translation: {lang}/{key}]".format({
                key: r.join("/"),
                lang: t
            }).join("");
            var l = Array.prototype.slice.call(arguments, 3);
            return l.length > 0 ? a.format.apply(a, o(l)) : a
        }
        t.a = r, t.b = a;
        var l = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        };
        String.prototype.format = function() {
            var e, t = this.toString(),
                n = l(arguments[0]);
            e = 0 == arguments.length ? {} : "string" === n || "number" === n ? Array.prototype.slice.call(arguments) : arguments[0];
            for (var o = [], r = t; r.length > 0;) {
                var i = r.match(/\{(?!\{)([\w\d]+)\}(?!\})/);
                if (null !== i) {
                    var a = r.substr(0, i.index);
                    r.substr(i.index, i[0].length);
                    r = r.substr(i.index + i[0].length);
                    var c = parseInt(i[1]);
                    o.push(a), c != c ? o.push(e[i[1]]) : o.push(e[c])
                } else o.push(r), r = ""
            }
            return o
        }
    }, function(e, t, n) {
        "use strict";

        function o(e) {
            var t = new Map([]),
                n = !0,
                r = !1,
                i = void 0;
            try {
                for (var a, l = Object.keys(e)[Symbol.iterator](); !(n = (a = l.next()).done); n = !0) {
                    var c = a.value,
                        s = e[c];
                    "string" == typeof c && ("string" == typeof s ? t.set(c, s) : t.set(c, o(s)))
                }
            } catch (e) {
                r = !0, i = e
            } finally {
                try {
                    !n && l.return && l.return()
                } finally {
                    if (r) throw i
                }
            }
            return t
        }

        function r(e, t, n, o) {
            var i = function(e, t, n) {
                if (n instanceof Map) {
                    var o = new Map([]);
                    r(o, n, !0, !1), e.set(t, o)
                } else e.set(t, n)
            };
            if (!(t instanceof Map && e instanceof Map)) throw "Parameters are not maps!";
            void 0 === n && (n = !0), void 0 === o && (o = !1), o && (e = new e.constructor(e));
            var a = !0,
                l = !1,
                c = void 0;
            try {
                for (var s, p = t.keys()[Symbol.iterator](); !(a = (s = p.next()).done); a = !0) {
                    var u = s.value,
                        d = t.get(u),
                        f = e.get(u);
                    if (e.has(u))
                        if (d instanceof Map && f instanceof Map) e.set(u, r(f, d, n, o));
                        else {
                            if (!n) continue;
                            i(e, u, d)
                        } else i(e, u, d)
                }
            } catch (e) {
                l = !0, c = e
            } finally {
                try {
                    !a && p.return && p.return()
                } finally {
                    if (l) throw c
                }
            }
            return e
        }
        t.a = o, t.b = r
    }, function(e, t, n) {
        t = e.exports = n(4)(!1), t.push([e.i, '', ""])
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Informationen die wir sammeln",
                description: "Hier können Sie einsehen und anpassen, welche Information wir über Sie sammeln.\n",
                privacyPolicy: {
                    name: "Datenschutzerklärung",
                    text: "Bitte lesen Sie unsere {privacyPolicy} um weitere Details zu erfahren.\n"
                }
            },
            consentNotice: {
                changeDescription: "Es gab Änderungen seit Ihrem letzten Besuch, bitte aktualisieren Sie Ihre Auswahl.",
                description: "Wir speichern und verarbeiten Ihre personenbezogenen Informationen für folgende Zwecke: {purposes}.\n",
                learnMore: "Mehr erfahren"
            },
            ok: "OK",
            save: "Speichern",
            decline: "Ablehnen",
            app: {
                disableAll: {
                    title: "Alle Anwendungen aktivieren/deaktivieren",
                    description: "Nutzen Sie diesen Schalter um alle Apps zu aktivieren/deaktivieren."
                },
                optOut: {
                    title: "(Opt-Out)",
                    description: "Diese Anwendung wird standarmäßig gelanden (aber Sie können sie deaktivieren)"
                },
                required: {
                    title: "(immer notwendig)",
                    description: "Diese Anwendung wird immer benötigt"
                },
                purposes: "Zwecke",
                purpose: "Zweck"
            },
            poweredBy: "Realisiert mit Klaro!"
        }
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Information that we collect",
                description: "Here you can see and customize the information that we collect about you.\n",
                privacyPolicy: {
                    name: "privacy policy",
                    text: "To learn more, please read our {privacyPolicy}.\n"
                }
            },
            consentNotice: {
                changeDescription: "There were changes since your last visit, please update your consent.",
                description: "We collect and process your personal information for the following purposes: {purposes}.\n",
                learnMore: "Learn more"
            },
            ok: "OK",
            save: "Save",
            decline: "Decline",
            close: "Close",
            app: {
                disableAll: {
                    title: "Toggle all apps",
                    description: "Use this switch to enable/disable all apps."
                },
                optOut: {
                    title: "(opt-out)",
                    description: "This app is loaded by default (but you can opt out)"
                },
                required: {
                    title: "(always required)",
                    description: "This application is always required"
                },
                purposes: "Purposes",
                purpose: "Purpose"
            },
            poweredBy: "Powered by Klaro!"
        }
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Keräämämme tiedot",
                description: "Voit tarkastella ja muokata sinusta keräämiämme tietoja.\n",
                privacyPolicy: {
                    name: "tietosuojasivultamme",
                    text: "Voit lukea lisätietoja {privacyPolicy}.\n"
                }
            },
            consentNotice: {
                changeDescription: "Olemme tehneet muutoksia ehtoihin viime vierailusi jälkeen, tarkista ehdot.",
                description: "Keräämme ja käsittelemme henkilötietoja seuraaviin tarkoituksiin: {purposes}.\n",
                learnMore: "Lue lisää"
            },
            ok: "Hyväksy",
            save: "Tallenna",
            decline: "Hylkää",
            app: {
                disableAll: {
                    title: "Valitse kaikki",
                    description: "Aktivoi kaikki päälle/pois."
                },
                optOut: {
                    title: "(ladataan oletuksena)",
                    description: "Ladataan oletuksena (mutta voit ottaa sen pois päältä)"
                },
                required: {
                    title: "(vaaditaan)",
                    description: "Sivusto vaatii tämän aina"
                },
                purposes: "Käyttötarkoitukset",
                purpose: "Käyttötarkoitus"
            },
            poweredBy: "Palvelun tarjoaa Klaro!"
        }
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Les informations que nous collectons",
                description: "Ici, vous pouvez voir et personnaliser les informations que nous collectons sur vous.\n",
                privacyPolicy: {
                    name: "politique de confidentialité",
                    text: "Pour en savoir plus, merci de lire notre {privacyPolicy}.\n"
                }
            },
            consentNotice: {
                changeDescription: "Des modifications ont eu lieu depuis votre dernière visite, merci de mettre à jour votre consentement.",
                description: "Nous collectons et traitons vos informations personnelles dans le but suivant : {purposes}.\n",
                learnMore: "En savoir plus"
            },
            ok: "OK",
            save: "Sauvegarder",
            decline: "Refuser",
            close: "Fermer",
            app: {
                disableAll: {
                    title: "Changer toutes les options",
                    description: "Utiliser ce bouton pour activer/désactiver toutes les options"
                },
                optOut: {
                    title: "(opt-out)",
                    description: "Cette application est chargée par défaut (mais vous pouvez la désactiver)"
                },
                required: {
                    title: "(toujours requis)",
                    description: "Cette application est toujours requise"
                },
                purposes: "Utilisations",
                purpose: "Utilisation"
            },
            poweredBy: "Propulsé par Klaro!"
        }
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Információk, amiket gyűjtünk",
                description: "Itt láthatod és testreszabhatod az rólad gyűjtött információkat.\n",
                privacyPolicy: {
                    name: "adatvédelmi irányelveinket",
                    text: "További információért kérjük, olvassd el az {privacyPolicy}.\n"
                }
            },
            consentNotice: {
                changeDescription: "Az utolsó látogatás óta változások történtek, kérjük, frissítsd a hozzájárulásodat.",
                description: "Az személyes adataidat összegyűjtjük és feldolgozzuk az alábbi célokra: {purposes}.\n",
                learnMore: "Tudj meg többet"
            },
            ok: "Elfogad",
            save: "Save",
            decline: "Mentés",
            close: "Elvet",
            app: {
                disableAll: {
                    title: "Összes app átkapcsolása",
                    description: "Használd ezt a kapcsolót az összes alkalmazás engedélyezéséhez/letiltásához."
                },
                optOut: {
                    title: "(leiratkozás)",
                    description: "Ez az alkalmazás alapértelmezés szerint betöltött (de ki lehet kapcsolni)"
                },
                required: {
                    title: "(mindig kötelező)",
                    description: "Ez az alkalmazás mindig kötelező"
                },
                purposes: "Célok",
                purpose: "Cél"
            },
            poweredBy: "Powered by Klaro!"
        }
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Informazioni che raccogliamo",
                description: "Qui puoi vedere e scegliere le informazioni che raccogliamo su di te.\n",
                privacyPolicy: {
                    name: "policy privacy",
                    text: "Per saperne di più, leggi la nostra {privacyPolicy}.\n"
                }
            },
            consentNotice: {
                changeDescription: "Ci sono stati cambiamenti dalla tua ultima visita, aggiorna il tuo consenso.",
                description: "Raccogliamo ed elaboriamo le vostre informazioni personali per i seguenti scopi: {purposes}.\n",
                learnMore: "Scopri di più"
            },
            ok: "OK",
            save: "Salva",
            decline: "Rifiuta",
            app: {
                disableAll: {
                    title: "Cambia per tutte le app",
                    description: "Usa questo interruttore per abilitare/disabilitare tutte le app."
                },
                optOut: {
                    title: "(opt-out)",
                    description: "Quest'applicazione è caricata di default (ma puoi disattivarla)"
                },
                required: {
                    title: "(sempre richiesto)",
                    description: "Quest'applicazione è sempre richiesta"
                },
                purposes: "Scopi",
                purpose: "Scopo"
            },
            poweredBy: "Realizzato da Klaro!"
        }
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Informatie die we verzamelen",
                description: "Hier kunt u de informatie bekijken en aanpassen die we over u verzamelen.\n",
                privacyPolicy: {
                    name: "privacybeleid",
                    text: "Lees ons privacybeleid voor meer informatie {privacyPolicy}.\n"
                }
            },
            consentNotice: {
                changeDescription: "Er waren wijzigingen sinds uw laatste bezoek, werk uw voorkeuren bij.",
                description: "Wij verzamelen en verwerken uw persoonlijke gegevens voor de volgende doeleinden: {purposes}.\n",
                learnMore: "Lees meer"
            },
            ok: "OK",
            save: "Opslaan",
            decline: "Afwijzen",
            app: {
                disableAll: {
                    title: "Alle opties in/uit schakelen",
                    description: "Gebruik deze schakeloptie om alle apps in/uit te schakelen."
                },
                optOut: {
                    title: "(afmelden)",
                    description: "Deze app is standaard geladen (maar je kunt je afmelden)"
                },
                required: {
                    title: "(altijd verplicht)",
                    description: "Deze applicatie is altijd vereist"
                },
                purposes: "Doeleinden",
                purpose: "Doeleinde"
            },
            poweredBy: "Aangedreven door Klaro!"
        }
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Informasjon vi samler inn",
                description: "Her kan du se og velge hvilken informasjon vi samler inn om deg.\n",
                privacyPolicy: {
                    name: "personvernerklæring",
                    text: "For å lære mer, vennligst les vår {privacyPolicy}.\n"
                }
            },
            consentNotice: {
                changeDescription: "Det har skjedd endringer siden ditt siste besøk, vennligst oppdater ditt samtykke.",
                description: "Vi samler inn og prosesserer din personlige informasjon av følgende årsaker: {purposes}.\n",
                learnMore: "Lær mer"
            },
            ok: "OK",
            save: "Opslaan",
            decline: "Avslå",
            app: {
                disableAll: {
                    title: "Bytt alle apper",
                    description: "Bruk denne for å skru av/på alle apper."
                },
                optOut: {
                    title: "(opt-out)",
                    description: "Denne appen er lastet som standard (men du kan skru det av)"
                },
                required: {
                    title: "(alltid påkrevd)",
                    description: "Denne applikasjonen er alltid påkrevd"
                },
                purposes: "Årsaker",
                purpose: "Årsak"
            },
            poweredBy: "Laget med Klaro!"
        }
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Informațiile pe care le colectăm",
                description: "Aici puteți vedea și personaliza informațiile pe care le colectăm despre dvs.\n",
                privacyPolicy: {
                    name: "politica privacy",
                    text: "Pentru a afla mai multe, vă rugăm să citiți {privacyPolicy}.\n"
                }
            },
            consentNotice: {
                changeDescription: "Au existat modificări de la ultima vizită, vă rugăm să actualizați consimțământul.",
                description: "Colectăm și procesăm informațiile dvs. personale în următoarele scopuri: {purposes}.\n",
                learnMore: "Află mai multe"
            },
            ok: "OK",
            save: "Salvează",
            decline: "Renunță",
            app: {
                disableAll: {
                    title: "Comutați între toate aplicațiile",
                    description: "Utilizați acest switch pentru a activa/dezactiva toate aplicațiile."
                },
                optOut: {
                    title: "(opt-out)",
                    description: "Această aplicație este încărcată în mod implicit (dar puteți renunța)"
                },
                required: {
                    title: "(întotdeauna necesar)",
                    description: "Această aplicație este întotdeauna necesară"
                },
                purposes: "Scopuri",
                purpose: "Scop"
            },
            poweredBy: "Realizat de Klaro!"
        }
    }, function(e, t) {
        e.exports = {
            consentModal: {
                title: "Information som vi samlar",
                description: "Här kan du se och anpassa vilken information vi samlar om dig.\n",
                privacyPolicy: {
                    name: "Integritetspolicy",
                    text: "För att veta mer, läs vår {privacyPolicy}.\n"
                }
            },
            consentNotice: {
                changeDescription: "Det har skett förändringar sedan ditt senaste besök, var god uppdatera ditt medgivande.",
                description: "Vi samlar och bearbetar din personliga data i följande syften: {purposes}.\n",
                learnMore: "Läs mer"
            },
            ok: "OK",
            save: "Spara",
            decline: "Avböj",
            app: {
                disableAll: {
                    title: "Ändra för alla appar",
                    description: "Använd detta reglage för att aktivera/avaktivera samtliga appar."
                },
                optOut: {
                    title: "(Avaktivera)",
                    description: "Den här appen laddas som standardinställning (men du kan avaktivera den)"
                },
                required: {
                    title: "(Krävs alltid)",
                    description: "Den här applikationen krävs alltid"
                },
                purposes: "Syften",
                purpose: "Syfte"
            },
            poweredBy: "Körs på Klaro!"
        }
    }, function(e, t, n) {
        "use strict";

        function o(e, t) {
            var n, o, r, i, a = T;
            for (i = arguments.length; i-- > 2;) z.push(arguments[i]);
            for (t && null != t.children && (z.length || z.push(t.children), delete t.children); z.length;)
                if ((o = z.pop()) && void 0 !== o.pop)
                    for (i = o.length; i--;) z.push(o[i]);
                else "boolean" == typeof o && (o = null), (r = "function" != typeof e) && (null == o ? o = "" : "number" == typeof o ? o = String(o) : "string" != typeof o && (r = !1)), r && n ? a[a.length - 1] += o : a === T ? a = [o] : a.push(o), n = r;
            var l = new E;
            return l.nodeName = e, l.children = a, l.attributes = null == t ? void 0 : t, l.key = null == t ? void 0 : t.key, void 0 !== A.vnode && A.vnode(l), l
        }

        function r(e, t) {
            for (var n in t) e[n] = t[n];
            return e
        }

        function i(e, t) {
            return o(e.nodeName, r(r({}, e.attributes), t), arguments.length > 2 ? [].slice.call(arguments, 2) : e.children)
        }

        function a(e) {
            !e._dirty && (e._dirty = !0) && 1 == U.push(e) && (A.debounceRendering || M)(l)
        }

        function l() {
            var e, t = U;
            for (U = []; e = t.pop();) e._dirty && O(e)
        }

        function c(e, t, n) {
            return "string" == typeof t || "number" == typeof t ? void 0 !== e.splitText : "string" == typeof t.nodeName ? !e._componentConstructor && s(e, t.nodeName) : n || e._componentConstructor === t.nodeName
        }

        function s(e, t) {
            return e.normalizedNodeName === t || e.nodeName.toLowerCase() === t.toLowerCase()
        }

        function p(e) {
            var t = r({}, e.attributes);
            t.children = e.children;
            var n = e.nodeName.defaultProps;
            if (void 0 !== n)
                for (var o in n) void 0 === t[o] && (t[o] = n[o]);
            return t
        }

        function u(e, t) {
            var n = t ? document.createElementNS("http://www.w3.org/2000/svg", e) : document.createElement(e);
            return n.normalizedNodeName = e, n
        }

        function d(e) {
            var t = e.parentNode;
            t && t.removeChild(e)
        }

        function f(e, t, n, o, r) {
            if ("className" === t && (t = "class"), "key" === t);
            else if ("ref" === t) n && n(null), o && o(e);
            else if ("class" !== t || r)
                if ("style" === t) {
                    if (o && "string" != typeof o && "string" != typeof n || (e.style.cssText = o || ""), o && "object" == typeof o) {
                        if ("string" != typeof n)
                            for (var i in n) i in o || (e.style[i] = "");
                        for (var i in o) e.style[i] = "number" == typeof o[i] && !1 === D.test(i) ? o[i] + "px" : o[i]
                    }
                } else if ("dangerouslySetInnerHTML" === t) o && (e.innerHTML = o.__html || "");
            else if ("o" == t[0] && "n" == t[1]) {
                var a = t !== (t = t.replace(/Capture$/, ""));
                t = t.toLowerCase().substring(2), o ? n || e.addEventListener(t, m, a) : e.removeEventListener(t, m, a), (e._listeners || (e._listeners = {}))[t] = o
            } else if ("list" !== t && "type" !== t && !r && t in e) {
                try {
                    e[t] = null == o ? "" : o
                } catch (e) {}
                null != o && !1 !== o || "spellcheck" == t || e.removeAttribute(t)
            } else {
                var l = r && t !== (t = t.replace(/^xlink:?/, ""));
                null == o || !1 === o ? l ? e.removeAttributeNS("http://www.w3.org/1999/xlink", t.toLowerCase()) : e.removeAttribute(t) : "function" != typeof o && (l ? e.setAttributeNS("http://www.w3.org/1999/xlink", t.toLowerCase(), o) : e.setAttribute(t, o))
            } else e.className = o || ""
        }

        function m(e) {
            return this._listeners[e.type](A.event && A.event(e) || e)
        }

        function h() {
            for (var e; e = R.pop();) A.afterMount && A.afterMount(e), e.componentDidMount && e.componentDidMount()
        }

        function v(e, t, n, o, r, i) {
            L++ || (B = null != r && void 0 !== r.ownerSVGElement, I = null != e && !("__preactattr_" in e));
            var a = b(e, t, n, o, i);
            return r && a.parentNode !== r && r.appendChild(a), --L || (I = !1, i || h()), a
        }

        function b(e, t, n, o, r) {
            var i = e,
                a = B;
            if (null != t && "boolean" != typeof t || (t = ""), "string" == typeof t || "number" == typeof t) return e && void 0 !== e.splitText && e.parentNode && (!e._component || r) ? e.nodeValue != t && (e.nodeValue = t) : (i = document.createTextNode(t), e && (e.parentNode && e.parentNode.replaceChild(i, e), k(e, !0))), i.__preactattr_ = !0, i;
            var l = t.nodeName;
            if ("function" == typeof l) return N(e, t, n, o);
            if (B = "svg" === l || "foreignObject" !== l && B, l = String(l), (!e || !s(e, l)) && (i = u(l, B), e)) {
                for (; e.firstChild;) i.appendChild(e.firstChild);
                e.parentNode && e.parentNode.replaceChild(i, e), k(e, !0)
            }
            var c = i.firstChild,
                p = i.__preactattr_,
                d = t.children;
            if (null == p) {
                p = i.__preactattr_ = {};
                for (var f = i.attributes, m = f.length; m--;) p[f[m].name] = f[m].value
            }
            return !I && d && 1 === d.length && "string" == typeof d[0] && null != c && void 0 !== c.splitText && null == c.nextSibling ? c.nodeValue != d[0] && (c.nodeValue = d[0]) : (d && d.length || null != c) && y(i, d, n, o, I || null != p.dangerouslySetInnerHTML), w(i, t.attributes, p), B = a, i
        }

        function y(e, t, n, o, r) {
            var i, a, l, s, p, u = e.childNodes,
                f = [],
                m = {},
                h = 0,
                v = 0,
                y = u.length,
                g = 0,
                w = t ? t.length : 0;
            if (0 !== y)
                for (var x = 0; x < y; x++) {
                    var _ = u[x],
                        C = _.__preactattr_,
                        O = w && C ? _._component ? _._component.__key : C.key : null;
                    null != O ? (h++, m[O] = _) : (C || (void 0 !== _.splitText ? !r || _.nodeValue.trim() : r)) && (f[g++] = _)
                }
            if (0 !== w)
                for (var x = 0; x < w; x++) {
                    s = t[x], p = null;
                    var O = s.key;
                    if (null != O) h && void 0 !== m[O] && (p = m[O], m[O] = void 0, h--);
                    else if (v < g)
                        for (i = v; i < g; i++)
                            if (void 0 !== f[i] && c(a = f[i], s, r)) {
                                p = a, f[i] = void 0, i === g - 1 && g--, i === v && v++;
                                break
                            }
                    p = b(p, s, n, o), l = u[x], p && p !== e && p !== l && (null == l ? e.appendChild(p) : p === l.nextSibling ? d(l) : e.insertBefore(p, l))
                }
            if (h)
                for (var x in m) void 0 !== m[x] && k(m[x], !1);
            for (; v <= g;) void 0 !== (p = f[g--]) && k(p, !1)
        }

        function k(e, t) {
            var n = e._component;
            n ? P(n) : (null != e.__preactattr_ && e.__preactattr_.ref && e.__preactattr_.ref(null), !1 !== t && null != e.__preactattr_ || d(e), g(e))
        }

        function g(e) {
            for (e = e.lastChild; e;) {
                var t = e.previousSibling;
                k(e, !0), e = t
            }
        }

        function w(e, t, n) {
            var o;
            for (o in n) t && null != t[o] || null == n[o] || f(e, o, n[o], n[o] = void 0, B);
            for (o in t) "children" === o || "innerHTML" === o || o in n && t[o] === ("value" === o || "checked" === o ? e[o] : n[o]) || f(e, o, n[o], n[o] = t[o], B)
        }

        function x(e, t, n) {
            var o, r = q.length;
            for (e.prototype && e.prototype.render ? (o = new e(t, n), S.call(o, t, n)) : (o = new S(t, n), o.constructor = e, o.render = _); r--;)
                if (q[r].constructor === e) return o.nextBase = q[r].nextBase, q.splice(r, 1), o;
            return o
        }

        function _(e, t, n) {
            return this.constructor(e, n)
        }

        function C(e, t, n, o, r) {
            e._disable || (e._disable = !0, e.__ref = t.ref, e.__key = t.key, delete t.ref, delete t.key, void 0 === e.constructor.getDerivedStateFromProps && (!e.base || r ? e.componentWillMount && e.componentWillMount() : e.componentWillReceiveProps && e.componentWillReceiveProps(t, o)), o && o !== e.context && (e.prevContext || (e.prevContext = e.context), e.context = o), e.prevProps || (e.prevProps = e.props), e.props = t, e._disable = !1, 0 !== n && (1 !== n && !1 === A.syncComponentUpdates && e.base ? a(e) : O(e, 1, r)), e.__ref && e.__ref(e))
        }

        function O(e, t, n, o) {
            if (!e._disable) {
                var i, a, l, c = e.props,
                    s = e.state,
                    u = e.context,
                    d = e.prevProps || c,
                    f = e.prevState || s,
                    m = e.prevContext || u,
                    b = e.base,
                    y = e.nextBase,
                    g = b || y,
                    w = e._component,
                    _ = !1,
                    N = m;
                if (e.constructor.getDerivedStateFromProps && (s = r(r({}, s), e.constructor.getDerivedStateFromProps(c, s)), e.state = s), b && (e.props = d, e.state = f, e.context = m, 2 !== t && e.shouldComponentUpdate && !1 === e.shouldComponentUpdate(c, s, u) ? _ = !0 : e.componentWillUpdate && e.componentWillUpdate(c, s, u), e.props = c, e.state = s, e.context = u), e.prevProps = e.prevState = e.prevContext = e.nextBase = null, e._dirty = !1, !_) {
                    i = e.render(c, s, u), e.getChildContext && (u = r(r({}, u), e.getChildContext())), b && e.getSnapshotBeforeUpdate && (N = e.getSnapshotBeforeUpdate(d, f));
                    var S, j, E = i && i.nodeName;
                    if ("function" == typeof E) {
                        var z = p(i);
                        a = w, a && a.constructor === E && z.key == a.__key ? C(a, z, 1, u, !1) : (S = a, e._component = a = x(E, z, u), a.nextBase = a.nextBase || y, a._parentComponent = e, C(a, z, 0, u, !1), O(a, 1, n, !0)), j = a.base
                    } else l = g, S = w, S && (l = e._component = null), (g || 1 === t) && (l && (l._component = null), j = v(l, i, u, n || !b, g && g.parentNode, !0));
                    if (g && j !== g && a !== w) {
                        var T = g.parentNode;
                        T && j !== T && (T.replaceChild(j, g), S || (g._component = null, k(g, !1)))
                    }
                    if (S && P(S), e.base = j, j && !o) {
                        for (var M = e, D = e; D = D._parentComponent;)(M = D).base = j;
                        j._component = M, j._componentConstructor = M.constructor
                    }
                }
                for (!b || n ? R.unshift(e) : _ || (e.componentDidUpdate && e.componentDidUpdate(d, f, N), A.afterUpdate && A.afterUpdate(e)); e._renderCallbacks.length;) e._renderCallbacks.pop().call(e);
                L || o || h()
            }
        }

        function N(e, t, n, o) {
            for (var r = e && e._component, i = r, a = e, l = r && e._componentConstructor === t.nodeName, c = l, s = p(t); r && !c && (r = r._parentComponent);) c = r.constructor === t.nodeName;
            return r && c && (!o || r._component) ? (C(r, s, 3, n, o), e = r.base) : (i && !l && (P(i), e = a = null), r = x(t.nodeName, s, n), e && !r.nextBase && (r.nextBase = e, a = null), C(r, s, 1, n, o), e = r.base, a && e !== a && (a._component = null, k(a, !1))), e
        }

        function P(e) {
            A.beforeUnmount && A.beforeUnmount(e);
            var t = e.base;
            e._disable = !0, e.componentWillUnmount && e.componentWillUnmount(), e.base = null;
            var n = e._component;
            n ? P(n) : t && (t.__preactattr_ && t.__preactattr_.ref && t.__preactattr_.ref(null), e.nextBase = t, d(t), q.push(e), g(t)), e.__ref && e.__ref(null)
        }

        function S(e, t) {
            this._dirty = !0, this.context = t, this.props = e, this.state = this.state || {}, this._renderCallbacks = []
        }

        function j(e, t, n) {
            return v(n, e, {}, !1, t, !1)
        }
        n.d(t, "a", function() {
            return o
        }), n.d(t, "d", function() {
            return i
        }), n.d(t, "e", function() {
            return S
        }), n.d(t, "c", function() {
            return j
        }), n.d(t, "b", function() {
            return A
        });
        var E = function() {},
            A = {},
            z = [],
            T = [],
            M = "function" == typeof Promise ? Promise.resolve().then.bind(Promise.resolve()) : setTimeout,
            D = /acit|ex(?:s|g|n|p|$)|rph|ows|mnc|ntw|ine[ch]|zoo|^ord/i,
            U = [],
            R = [],
            L = 0,
            B = !1,
            I = !1,
            q = [];
        r(S.prototype, {
            setState: function(e, t) {
                this.prevState || (this.prevState = this.state), this.state = r(r({}, this.state), "function" == typeof e ? e(this.state, this.props) : e), t && this._renderCallbacks.push(t), a(this)
            },
            forceUpdate: function(e) {
                e && this._renderCallbacks.push(e), O(this, 2)
            },
            render: function() {}
        })
    }, function(e, t, n) {
        var o = n(19);
        "string" == typeof o && (o = [
            [e.i, o, ""]
        ]);
        var r = {};
        r.transform = void 0;
        n(32)(o, r);
        o.locals && (e.exports = o.locals)
    }, function(e, t, n) {
        function o(e, t) {
            for (var n = 0; n < e.length; n++) {
                var o = e[n],
                    r = m[o.id];
                if (r) {
                    r.refs++;
                    for (var i = 0; i < r.parts.length; i++) r.parts[i](o.parts[i]);
                    for (; i < o.parts.length; i++) r.parts.push(p(o.parts[i], t))
                } else {
                    for (var a = [], i = 0; i < o.parts.length; i++) a.push(p(o.parts[i], t));
                    m[o.id] = {
                        id: o.id,
                        refs: 1,
                        parts: a
                    }
                }
            }
        }

        function r(e, t) {
            for (var n = [], o = {}, r = 0; r < e.length; r++) {
                var i = e[r],
                    a = t.base ? i[0] + t.base : i[0],
                    l = i[1],
                    c = i[2],
                    s = i[3],
                    p = {
                        css: l,
                        media: c,
                        sourceMap: s
                    };
                o[a] ? o[a].parts.push(p) : n.push(o[a] = {
                    id: a,
                    parts: [p]
                })
            }
            return n
        }

        function i(e, t) {
            var n = v(e.insertInto);
            if (!n) throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
            var o = k[k.length - 1];
            if ("top" === e.insertAt) o ? o.nextSibling ? n.insertBefore(t, o.nextSibling) : n.appendChild(t) : n.insertBefore(t, n.firstChild), k.push(t);
            else {
                if ("bottom" !== e.insertAt) throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");
                n.appendChild(t)
            }
        }

        function a(e) {
            if (null === e.parentNode) return !1;
            e.parentNode.removeChild(e);
            var t = k.indexOf(e);
            t >= 0 && k.splice(t, 1)
        }

        function l(e) {
            var t = document.createElement("style");
            return e.attrs.type = "text/css", s(t, e.attrs), i(e, t), t
        }

        function c(e) {
            var t = document.createElement("link");
            return e.attrs.type = "text/css", e.attrs.rel = "stylesheet", s(t, e.attrs), i(e, t), t
        }

        function s(e, t) {
            Object.keys(t).forEach(function(n) {
                e.setAttribute(n, t[n])
            })
        }

        function p(e, t) {
            var n, o, r, i;
            if (t.transform && e.css) {
                if (!(i = t.transform(e.css))) return function() {};
                e.css = i
            }
            if (t.singleton) {
                var s = y++;
                n = b || (b = l(t)), o = u.bind(null, n, s, !1), r = u.bind(null, n, s, !0)
            } else e.sourceMap && "function" == typeof URL && "function" == typeof URL.createObjectURL && "function" == typeof URL.revokeObjectURL && "function" == typeof Blob && "function" == typeof btoa ? (n = c(t), o = f.bind(null, n, t), r = function() {
                a(n), n.href && URL.revokeObjectURL(n.href)
            }) : (n = l(t), o = d.bind(null, n), r = function() {
                a(n)
            });
            return o(e),
                function(t) {
                    if (t) {
                        if (t.css === e.css && t.media === e.media && t.sourceMap === e.sourceMap) return;
                        o(e = t)
                    } else r()
                }
        }

        function u(e, t, n, o) {
            var r = n ? "" : o.css;
            if (e.styleSheet) e.styleSheet.cssText = w(t, r);
            else {
                var i = document.createTextNode(r),
                    a = e.childNodes;
                a[t] && e.removeChild(a[t]), a.length ? e.insertBefore(i, a[t]) : e.appendChild(i)
            }
        }

        function d(e, t) {
            var n = t.css,
                o = t.media;
            if (o && e.setAttribute("media", o), e.styleSheet) e.styleSheet.cssText = n;
            else {
                for (; e.firstChild;) e.removeChild(e.firstChild);
                e.appendChild(document.createTextNode(n))
            }
        }

        function f(e, t, n) {
            var o = n.css,
                r = n.sourceMap,
                i = void 0 === t.convertToAbsoluteUrls && r;
            (t.convertToAbsoluteUrls || i) && (o = g(o)), r && (o += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(r)))) + " */");
            var a = new Blob([o], {
                    type: "text/css"
                }),
                l = e.href;
            e.href = URL.createObjectURL(a), l && URL.revokeObjectURL(l)
        }
        var m = {},
            h = function(e) {
                var t;
                return function() {
                    return void 0 === t && (t = e.apply(this, arguments)), t
                }
            }(function() {
                return window && document && document.all && !window.atob
            }),
            v = function(e) {
                var t = {};
                return function(n) {
                    return void 0 === t[n] && (t[n] = e.call(this, n)), t[n]
                }
            }(function(e) {
                return document.querySelector(e)
            }),
            b = null,
            y = 0,
            k = [],
            g = n(7);
        e.exports = function(e, t) {
            if ("undefined" != typeof DEBUG && DEBUG && "object" != typeof document) throw new Error("The style-loader cannot be used in a non-browser environment");
            t = t || {}, t.attrs = "object" == typeof t.attrs ? t.attrs : {}, t.singleton || (t.singleton = h()), t.insertInto || (t.insertInto = "head"), t.insertAt || (t.insertAt = "bottom");
            var n = r(e, t);
            return o(n, t),
                function(e) {
                    for (var i = [], a = 0; a < n.length; a++) {
                        var l = n[a],
                            c = m[l.id];
                        c.refs--, i.push(c)
                    }
                    if (e) {
                        o(r(e, t), t)
                    }
                    for (var a = 0; a < i.length; a++) {
                        var c = i[a];
                        if (0 === c.refs) {
                            for (var s = 0; s < c.parts.length; s++) c.parts[s]();
                            delete m[c.id]
                        }
                    }
                }
        };
        var w = function() {
            var e = [];
            return function(t, n) {
                return e[t] = n, e.filter(Boolean).join("\n")
            }
        }()
    }, function(e, t, n) {
        e.exports = n(3)
    }])
});