(function($){"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*! alertifyjs - v1.11.4 - Mohammad Younes <Mohammad@alertifyjs.com> (http://alertifyjs.com) */
!function (a) {
  "use strict";

  function b(a, b) {
    a.className += " " + b;
  }

  function c(a, b) {
    for (var c = a.className.split(" "), d = b.split(" "), e = 0; e < d.length; e += 1) {
      var f = c.indexOf(d[e]);
      f > -1 && c.splice(f, 1);
    }

    a.className = c.join(" ");
  }

  function d() {
    return "rtl" === a.getComputedStyle(document.body).direction;
  }

  function e() {
    return document.documentElement && document.documentElement.scrollTop || document.body.scrollTop;
  }

  function f() {
    return document.documentElement && document.documentElement.scrollLeft || document.body.scrollLeft;
  }

  function g(a) {
    for (; a.lastChild;) {
      a.removeChild(a.lastChild);
    }
  }

  function h(a) {
    if (null === a) return a;
    var b;

    if (Array.isArray(a)) {
      b = [];

      for (var c = 0; c < a.length; c += 1) {
        b.push(h(a[c]));
      }

      return b;
    }

    if (a instanceof Date) return new Date(a.getTime());
    if (a instanceof RegExp) return b = new RegExp(a.source), b.global = a.global, b.ignoreCase = a.ignoreCase, b.multiline = a.multiline, b.lastIndex = a.lastIndex, b;

    if ("object" == _typeof(a)) {
      b = {};

      for (var d in a) {
        a.hasOwnProperty(d) && (b[d] = h(a[d]));
      }

      return b;
    }

    return a;
  }

  function i(a, b) {
    if (a.elements) {
      var c = a.elements.root;
      c.parentNode.removeChild(c), delete a.elements, a.settings = h(a.__settings), a.__init = b, delete a.__internal;
    }
  }

  function j(a, b) {
    return function () {
      if (arguments.length > 0) {
        for (var c = [], d = 0; d < arguments.length; d += 1) {
          c.push(arguments[d]);
        }

        return c.push(a), b.apply(a, c);
      }

      return b.apply(a, [null, a]);
    };
  }

  function k(a, b) {
    return {
      index: a,
      button: b,
      cancel: !1
    };
  }

  function l(a, b) {
    if ("function" == typeof b.get(a)) return b.get(a).call(b);
  }

  function m() {
    function a(a, b) {
      for (var c in b) {
        b.hasOwnProperty(c) && (a[c] = b[c]);
      }

      return a;
    }

    function b(a) {
      var b = d[a].dialog;
      return b && "function" == typeof b.__init && b.__init(b), b;
    }

    function c(b, c, e, f) {
      var g = {
        dialog: null,
        factory: c
      };
      return void 0 !== f && (g.factory = function () {
        return a(new d[f].factory(), new c());
      }), e || (g.dialog = a(new g.factory(), t)), d[b] = g;
    }

    var d = {};
    return {
      defaults: o,
      dialog: function dialog(d, e, f, g) {
        if ("function" != typeof e) return b(d);
        if (this.hasOwnProperty(d)) throw new Error("alertify.dialog: name already exists");
        var h = c(d, e, f, g);
        this[d] = f ? function () {
          if (0 === arguments.length) return h.dialog;
          var b = a(new h.factory(), t);
          return b && "function" == typeof b.__init && b.__init(b), b.main.apply(b, arguments), b.show.apply(b);
        } : function () {
          if (h.dialog && "function" == typeof h.dialog.__init && h.dialog.__init(h.dialog), 0 === arguments.length) return h.dialog;
          var a = h.dialog;
          return a.main.apply(h.dialog, arguments), a.show.apply(h.dialog);
        };
      },
      closeAll: function closeAll(a) {
        for (var b = p.slice(0), c = 0; c < b.length; c += 1) {
          var d = b[c];
          void 0 !== a && a === d || d.close();
        }
      },
      setting: function setting(a, c, d) {
        if ("notifier" === a) return u.setting(c, d);
        var e = b(a);
        return e ? e.setting(c, d) : void 0;
      },
      set: function set(a, b, c) {
        return this.setting(a, b, c);
      },
      get: function get(a, b) {
        return this.setting(a, b);
      },
      notify: function notify(a, b, c, d) {
        return u.create(b, d).push(a, c);
      },
      message: function message(a, b, c) {
        return u.create(null, c).push(a, b);
      },
      success: function success(a, b, c) {
        return u.create("success", c).push(a, b);
      },
      error: function error(a, b, c) {
        return u.create("error", c).push(a, b);
      },
      warning: function warning(a, b, c) {
        return u.create("warning", c).push(a, b);
      },
      dismissAll: function dismissAll() {
        u.dismissAll();
      }
    };
  }

  var n = {
    ENTER: 13,
    ESC: 27,
    F1: 112,
    F12: 123,
    LEFT: 37,
    RIGHT: 39
  },
      o = {
    autoReset: !0,
    basic: !1,
    closable: !0,
    closableByDimmer: !0,
    frameless: !1,
    maintainFocus: !0,
    maximizable: !0,
    modal: !0,
    movable: !0,
    moveBounded: !1,
    overflow: !0,
    padding: !0,
    pinnable: !0,
    pinned: !0,
    preventBodyShift: !1,
    resizable: !0,
    startMaximized: !1,
    transition: "pulse",
    notifier: {
      delay: 5,
      position: "bottom-right",
      closeButton: !1
    },
    glossary: {
      title: "AlertifyJS",
      ok: "OK",
      cancel: "Cancel",
      acccpt: "Accept",
      deny: "Deny",
      confirm: "Confirm",
      decline: "Decline",
      close: "Close",
      maximize: "Maximize",
      restore: "Restore"
    },
    theme: {
      input: "ajs-input",
      ok: "ajs-ok",
      cancel: "ajs-cancel"
    }
  },
      p = [],
      q = function () {
    return document.addEventListener ? function (a, b, c, d) {
      a.addEventListener(b, c, !0 === d);
    } : document.attachEvent ? function (a, b, c) {
      a.attachEvent("on" + b, c);
    } : void 0;
  }(),
      r = function () {
    return document.removeEventListener ? function (a, b, c, d) {
      a.removeEventListener(b, c, !0 === d);
    } : document.detachEvent ? function (a, b, c) {
      a.detachEvent("on" + b, c);
    } : void 0;
  }(),
      s = function () {
    var a,
        b,
        c = !1,
        d = {
      animation: "animationend",
      OAnimation: "oAnimationEnd oanimationend",
      msAnimation: "MSAnimationEnd",
      MozAnimation: "animationend",
      WebkitAnimation: "webkitAnimationEnd"
    };

    for (a in d) {
      if (void 0 !== document.documentElement.style[a]) {
        b = d[a], c = !0;
        break;
      }
    }

    return {
      type: b,
      supported: c
    };
  }(),
      t = function () {
    function m(a) {
      if (!a.__internal) {
        delete a.__init, a.__settings || (a.__settings = h(a.settings));
        var c;
        "function" == typeof a.setup ? (c = a.setup(), c.options = c.options || {}, c.focus = c.focus || {}) : c = {
          buttons: [],
          focus: {
            element: null,
            select: !1
          },
          options: {}
        }, "object" != _typeof(a.hooks) && (a.hooks = {});
        var d = [];
        if (Array.isArray(c.buttons)) for (var e = 0; e < c.buttons.length; e += 1) {
          var f = c.buttons[e],
              g = {};

          for (var i in f) {
            f.hasOwnProperty(i) && (g[i] = f[i]);
          }

          d.push(g);
        }
        var k = a.__internal = {
          isOpen: !1,
          activeElement: document.body,
          timerIn: void 0,
          timerOut: void 0,
          buttons: d,
          focus: c.focus,
          options: {
            title: void 0,
            modal: void 0,
            basic: void 0,
            frameless: void 0,
            pinned: void 0,
            movable: void 0,
            moveBounded: void 0,
            resizable: void 0,
            autoReset: void 0,
            closable: void 0,
            closableByDimmer: void 0,
            maximizable: void 0,
            startMaximized: void 0,
            pinnable: void 0,
            transition: void 0,
            padding: void 0,
            overflow: void 0,
            onshow: void 0,
            onclosing: void 0,
            onclose: void 0,
            onfocus: void 0,
            onmove: void 0,
            onmoved: void 0,
            onresize: void 0,
            onresized: void 0,
            onmaximize: void 0,
            onmaximized: void 0,
            onrestore: void 0,
            onrestored: void 0
          },
          resetHandler: void 0,
          beginMoveHandler: void 0,
          beginResizeHandler: void 0,
          bringToFrontHandler: void 0,
          modalClickHandler: void 0,
          buttonsClickHandler: void 0,
          commandsClickHandler: void 0,
          transitionInHandler: void 0,
          transitionOutHandler: void 0,
          destroy: void 0
        },
            l = {};
        l.root = document.createElement("div"), l.root.style.display = "none", l.root.className = Da.base + " " + Da.hidden + " ", l.root.innerHTML = Ca.dimmer + Ca.modal, l.dimmer = l.root.firstChild, l.modal = l.root.lastChild, l.modal.innerHTML = Ca.dialog, l.dialog = l.modal.firstChild, l.dialog.innerHTML = Ca.reset + Ca.commands + Ca.header + Ca.body + Ca.footer + Ca.resizeHandle + Ca.reset, l.reset = [], l.reset.push(l.dialog.firstChild), l.reset.push(l.dialog.lastChild), l.commands = {}, l.commands.container = l.reset[0].nextSibling, l.commands.pin = l.commands.container.firstChild, l.commands.maximize = l.commands.pin.nextSibling, l.commands.close = l.commands.maximize.nextSibling, l.header = l.commands.container.nextSibling, l.body = l.header.nextSibling, l.body.innerHTML = Ca.content, l.content = l.body.firstChild, l.footer = l.body.nextSibling, l.footer.innerHTML = Ca.buttons.auxiliary + Ca.buttons.primary, l.resizeHandle = l.footer.nextSibling, l.buttons = {}, l.buttons.auxiliary = l.footer.firstChild, l.buttons.primary = l.buttons.auxiliary.nextSibling, l.buttons.primary.innerHTML = Ca.button, l.buttonTemplate = l.buttons.primary.firstChild, l.buttons.primary.removeChild(l.buttonTemplate);

        for (var m = 0; m < a.__internal.buttons.length; m += 1) {
          var n = a.__internal.buttons[m];
          ya.indexOf(n.key) < 0 && ya.push(n.key), n.element = l.buttonTemplate.cloneNode(), n.element.innerHTML = n.text, "string" == typeof n.className && "" !== n.className && b(n.element, n.className);

          for (var o in n.attrs) {
            "className" !== o && n.attrs.hasOwnProperty(o) && n.element.setAttribute(o, n.attrs[o]);
          }

          "auxiliary" === n.scope ? l.buttons.auxiliary.appendChild(n.element) : l.buttons.primary.appendChild(n.element);
        }

        a.elements = l, k.resetHandler = j(a, X), k.beginMoveHandler = j(a, aa), k.beginResizeHandler = j(a, ga), k.bringToFrontHandler = j(a, B), k.modalClickHandler = j(a, R), k.buttonsClickHandler = j(a, T), k.commandsClickHandler = j(a, F), k.transitionInHandler = j(a, Y), k.transitionOutHandler = j(a, Z);

        for (var p in k.options) {
          void 0 !== c.options[p] ? a.set(p, c.options[p]) : v.defaults.hasOwnProperty(p) ? a.set(p, v.defaults[p]) : "title" === p && a.set(p, v.defaults.glossary[p]);
        }

        "function" == typeof a.build && a.build();
      }

      document.body.appendChild(a.elements.root);
    }

    function o() {
      wa = f(), xa = e();
    }

    function t() {
      a.scrollTo(wa, xa);
    }

    function u() {
      for (var a = 0, d = 0; d < p.length; d += 1) {
        var e = p[d];
        (e.isModal() || e.isMaximized()) && (a += 1);
      }

      0 === a && document.body.className.indexOf(Da.noOverflow) >= 0 ? (c(document.body, Da.noOverflow), w(!1)) : a > 0 && document.body.className.indexOf(Da.noOverflow) < 0 && (w(!0), b(document.body, Da.noOverflow));
    }

    function w(d) {
      v.defaults.preventBodyShift && (d && document.documentElement.scrollHeight > document.documentElement.clientHeight ? (Fa = xa, Ea = a.getComputedStyle(document.body).top, b(document.body, Da.fixed), document.body.style.top = -xa + "px") : d || (xa = Fa, document.body.style.top = Ea, c(document.body, Da.fixed), t()));
    }

    function x(a, d, e) {
      "string" == typeof e && c(a.elements.root, Da.prefix + e), b(a.elements.root, Da.prefix + d), za = a.elements.root.offsetWidth;
    }

    function y(a) {
      a.get("modal") ? (c(a.elements.root, Da.modeless), a.isOpen() && (pa(a), N(a), u())) : (b(a.elements.root, Da.modeless), a.isOpen() && (oa(a), N(a), u()));
    }

    function z(a) {
      a.get("basic") ? b(a.elements.root, Da.basic) : c(a.elements.root, Da.basic);
    }

    function A(a) {
      a.get("frameless") ? b(a.elements.root, Da.frameless) : c(a.elements.root, Da.frameless);
    }

    function B(a, b) {
      for (var c = p.indexOf(b), d = c + 1; d < p.length; d += 1) {
        if (p[d].isModal()) return;
      }

      return document.body.lastChild !== b.elements.root && (document.body.appendChild(b.elements.root), p.splice(p.indexOf(b), 1), p.push(b), W(b)), !1;
    }

    function C(a, d, e, f) {
      switch (d) {
        case "title":
          a.setHeader(f);
          break;

        case "modal":
          y(a);
          break;

        case "basic":
          z(a);
          break;

        case "frameless":
          A(a);
          break;

        case "pinned":
          O(a);
          break;

        case "closable":
          Q(a);
          break;

        case "maximizable":
          P(a);
          break;

        case "pinnable":
          K(a);
          break;

        case "movable":
          ea(a);
          break;

        case "resizable":
          ka(a);
          break;

        case "padding":
          f ? c(a.elements.root, Da.noPadding) : a.elements.root.className.indexOf(Da.noPadding) < 0 && b(a.elements.root, Da.noPadding);
          break;

        case "overflow":
          f ? c(a.elements.root, Da.noOverflow) : a.elements.root.className.indexOf(Da.noOverflow) < 0 && b(a.elements.root, Da.noOverflow);
          break;

        case "transition":
          x(a, f, e);
      }

      "function" == typeof a.hooks.onupdate && a.hooks.onupdate.call(a, d, e, f);
    }

    function D(a, b, c, d, e) {
      var f = {
        op: void 0,
        items: []
      };
      if (void 0 === e && "string" == typeof d) f.op = "get", b.hasOwnProperty(d) ? (f.found = !0, f.value = b[d]) : (f.found = !1, f.value = void 0);else {
        var g;

        if (f.op = "set", "object" == _typeof(d)) {
          var h = d;

          for (var i in h) {
            b.hasOwnProperty(i) ? (b[i] !== h[i] && (g = b[i], b[i] = h[i], c.call(a, i, g, h[i])), f.items.push({
              key: i,
              value: h[i],
              found: !0
            })) : f.items.push({
              key: i,
              value: h[i],
              found: !1
            });
          }
        } else {
          if ("string" != typeof d) throw new Error("args must be a string or object");
          b.hasOwnProperty(d) ? (b[d] !== e && (g = b[d], b[d] = e, c.call(a, d, g, e)), f.items.push({
            key: d,
            value: e,
            found: !0
          })) : f.items.push({
            key: d,
            value: e,
            found: !1
          });
        }
      }
      return f;
    }

    function E(a) {
      var b;
      S(a, function (a) {
        return b = !0 === a.invokeOnClose;
      }), !b && a.isOpen() && a.close();
    }

    function F(a, b) {
      switch (a.srcElement || a.target) {
        case b.elements.commands.pin:
          b.isPinned() ? H(b) : G(b);
          break;

        case b.elements.commands.maximize:
          b.isMaximized() ? J(b) : I(b);
          break;

        case b.elements.commands.close:
          E(b);
      }

      return !1;
    }

    function G(a) {
      a.set("pinned", !0);
    }

    function H(a) {
      a.set("pinned", !1);
    }

    function I(a) {
      l("onmaximize", a), b(a.elements.root, Da.maximized), a.isOpen() && u(), l("onmaximized", a);
    }

    function J(a) {
      l("onrestore", a), c(a.elements.root, Da.maximized), a.isOpen() && u(), l("onrestored", a);
    }

    function K(a) {
      a.get("pinnable") ? b(a.elements.root, Da.pinnable) : c(a.elements.root, Da.pinnable);
    }

    function L(a) {
      var b = f();
      a.elements.modal.style.marginTop = e() + "px", a.elements.modal.style.marginLeft = b + "px", a.elements.modal.style.marginRight = -b + "px";
    }

    function M(a) {
      var b = parseInt(a.elements.modal.style.marginTop, 10),
          c = parseInt(a.elements.modal.style.marginLeft, 10);

      if (a.elements.modal.style.marginTop = "", a.elements.modal.style.marginLeft = "", a.elements.modal.style.marginRight = "", a.isOpen()) {
        var d = 0,
            g = 0;
        "" !== a.elements.dialog.style.top && (d = parseInt(a.elements.dialog.style.top, 10)), a.elements.dialog.style.top = d + (b - e()) + "px", "" !== a.elements.dialog.style.left && (g = parseInt(a.elements.dialog.style.left, 10)), a.elements.dialog.style.left = g + (c - f()) + "px";
      }
    }

    function N(a) {
      a.get("modal") || a.get("pinned") ? M(a) : L(a);
    }

    function O(a) {
      a.get("pinned") ? (c(a.elements.root, Da.unpinned), a.isOpen() && M(a)) : (b(a.elements.root, Da.unpinned), a.isOpen() && !a.isModal() && L(a));
    }

    function P(a) {
      a.get("maximizable") ? b(a.elements.root, Da.maximizable) : c(a.elements.root, Da.maximizable);
    }

    function Q(a) {
      a.get("closable") ? (b(a.elements.root, Da.closable), ua(a)) : (c(a.elements.root, Da.closable), va(a));
    }

    function R(a, b) {
      if (a.timeStamp - Ha > 200 && (Ha = a.timeStamp) && !Ga) {
        var c = a.srcElement || a.target;
        return !0 === b.get("closableByDimmer") && c === b.elements.modal && E(b), Ga = !1, !1;
      }
    }

    function S(a, b) {
      if (Date.now() - Ia > 200 && (Ia = Date.now())) for (var c = 0; c < a.__internal.buttons.length; c += 1) {
        var d = a.__internal.buttons[c];

        if (!d.element.disabled && b(d)) {
          var e = k(c, d);
          "function" == typeof a.callback && a.callback.apply(a, [e]), !1 === e.cancel && a.close();
          break;
        }
      }
    }

    function T(a, b) {
      var c = a.srcElement || a.target;
      S(b, function (a) {
        return a.element === c && (Ja = !0);
      });
    }

    function U(a) {
      if (Ja) return void (Ja = !1);
      var b = p[p.length - 1],
          c = a.keyCode;
      return 0 === b.__internal.buttons.length && c === n.ESC && !0 === b.get("closable") ? (E(b), !1) : ya.indexOf(c) > -1 ? (S(b, function (a) {
        return a.key === c;
      }), !1) : void 0;
    }

    function V(a) {
      var b = p[p.length - 1],
          c = a.keyCode;

      if (c === n.LEFT || c === n.RIGHT) {
        for (var d = b.__internal.buttons, e = 0; e < d.length; e += 1) {
          if (document.activeElement === d[e].element) switch (c) {
            case n.LEFT:
              return void d[(e || d.length) - 1].element.focus();

            case n.RIGHT:
              return void d[(e + 1) % d.length].element.focus();
          }
        }
      } else if (c < n.F12 + 1 && c > n.F1 - 1 && ya.indexOf(c) > -1) return a.preventDefault(), a.stopPropagation(), S(b, function (a) {
        return a.key === c;
      }), !1;
    }

    function W(a, b) {
      if (b) b.focus();else {
        var c = a.__internal.focus,
            d = c.element;

        switch (_typeof(c.element)) {
          case "number":
            a.__internal.buttons.length > c.element && (d = !0 === a.get("basic") ? a.elements.reset[0] : a.__internal.buttons[c.element].element);
            break;

          case "string":
            d = a.elements.body.querySelector(c.element);
            break;

          case "function":
            d = c.element.call(a);
        }

        void 0 !== d && null !== d || 0 !== a.__internal.buttons.length || (d = a.elements.reset[0]), d && d.focus && (d.focus(), c.select && d.select && d.select());
      }
    }

    function X(a, b) {
      if (!b) for (var c = p.length - 1; c > -1; c -= 1) {
        if (p[c].isModal()) {
          b = p[c];
          break;
        }
      }

      if (b && b.isModal()) {
        var d,
            e = a.srcElement || a.target,
            f = e === b.elements.reset[1] || 0 === b.__internal.buttons.length && e === document.body;
        f && (b.get("maximizable") ? d = b.elements.commands.maximize : b.get("closable") && (d = b.elements.commands.close)), void 0 === d && ("number" == typeof b.__internal.focus.element ? e === b.elements.reset[0] ? d = b.elements.buttons.auxiliary.firstChild || b.elements.buttons.primary.firstChild : f && (d = b.elements.reset[0]) : e === b.elements.reset[0] && (d = b.elements.buttons.primary.lastChild || b.elements.buttons.auxiliary.lastChild)), W(b, d);
      }
    }

    function Y(a, b) {
      clearTimeout(b.__internal.timerIn), W(b), t(), Ja = !1, l("onfocus", b), r(b.elements.dialog, s.type, b.__internal.transitionInHandler), c(b.elements.root, Da.animationIn);
    }

    function Z(a, b) {
      clearTimeout(b.__internal.timerOut), r(b.elements.dialog, s.type, b.__internal.transitionOutHandler), da(b), ja(b), b.isMaximized() && !b.get("startMaximized") && J(b), v.defaults.maintainFocus && b.__internal.activeElement && (b.__internal.activeElement.focus(), b.__internal.activeElement = null), "function" == typeof b.__internal.destroy && b.__internal.destroy.apply(b);
    }

    function $(a, b) {
      var c = a[Na] - La,
          d = a[Oa] - Ma;
      Qa && (d -= document.body.scrollTop), b.style.left = c + "px", b.style.top = d + "px";
    }

    function _(a, b) {
      var c = a[Na] - La,
          d = a[Oa] - Ma;
      Qa && (d -= document.body.scrollTop), b.style.left = Math.min(Pa.maxLeft, Math.max(Pa.minLeft, c)) + "px", b.style.top = Qa ? Math.min(Pa.maxTop, Math.max(Pa.minTop, d)) + "px" : Math.max(Pa.minTop, d) + "px";
    }

    function aa(a, c) {
      if (null === Sa && !c.isMaximized() && c.get("movable")) {
        var d,
            e = 0,
            f = 0;

        if ("touchstart" === a.type ? (a.preventDefault(), d = a.targetTouches[0], Na = "clientX", Oa = "clientY") : 0 === a.button && (d = a), d) {
          var g = c.elements.dialog;

          if (b(g, Da.capture), g.style.left && (e = parseInt(g.style.left, 10)), g.style.top && (f = parseInt(g.style.top, 10)), La = d[Na] - e, Ma = d[Oa] - f, c.isModal() ? Ma += c.elements.modal.scrollTop : c.isPinned() && (Ma -= document.body.scrollTop), c.get("moveBounded")) {
            var h = g,
                i = -e,
                j = -f;

            do {
              i += h.offsetLeft, j += h.offsetTop;
            } while (h = h.offsetParent);

            Pa = {
              maxLeft: i,
              minLeft: -i,
              maxTop: document.documentElement.clientHeight - g.clientHeight - j,
              minTop: -j
            }, Ra = _;
          } else Pa = null, Ra = $;

          return l("onmove", c), Qa = !c.isModal() && c.isPinned(), Ka = c, Ra(d, g), b(document.body, Da.noSelection), !1;
        }
      }
    }

    function ba(a) {
      if (Ka) {
        var b;
        "touchmove" === a.type ? (a.preventDefault(), b = a.targetTouches[0]) : 0 === a.button && (b = a), b && Ra(b, Ka.elements.dialog);
      }
    }

    function ca() {
      if (Ka) {
        var a = Ka;
        Ka = Pa = null, c(document.body, Da.noSelection), c(a.elements.dialog, Da.capture), l("onmoved", a);
      }
    }

    function da(a) {
      Ka = null;
      var b = a.elements.dialog;
      b.style.left = b.style.top = "";
    }

    function ea(a) {
      a.get("movable") ? (b(a.elements.root, Da.movable), a.isOpen() && qa(a)) : (da(a), c(a.elements.root, Da.movable), a.isOpen() && ra(a));
    }

    function fa(a, b, c) {
      var e = b,
          f = 0,
          g = 0;

      do {
        f += e.offsetLeft, g += e.offsetTop;
      } while (e = e.offsetParent);

      var h, i;
      !0 === c ? (h = a.pageX, i = a.pageY) : (h = a.clientX, i = a.clientY);
      var j = d();

      if (j && (h = document.body.offsetWidth - h, isNaN(Ta) || (f = document.body.offsetWidth - f - b.offsetWidth)), b.style.height = i - g + Wa + "px", b.style.width = h - f + Wa + "px", !isNaN(Ta)) {
        var k = .5 * Math.abs(b.offsetWidth - Ua);
        j && (k *= -1), b.offsetWidth > Ua ? b.style.left = Ta + k + "px" : b.offsetWidth >= Va && (b.style.left = Ta - k + "px");
      }
    }

    function ga(a, c) {
      if (!c.isMaximized()) {
        var d;

        if ("touchstart" === a.type ? (a.preventDefault(), d = a.targetTouches[0]) : 0 === a.button && (d = a), d) {
          l("onresize", c), Sa = c, Wa = c.elements.resizeHandle.offsetHeight / 2;
          var e = c.elements.dialog;
          return b(e, Da.capture), Ta = parseInt(e.style.left, 10), e.style.height = e.offsetHeight + "px", e.style.minHeight = c.elements.header.offsetHeight + c.elements.footer.offsetHeight + "px", e.style.width = (Ua = e.offsetWidth) + "px", "none" !== e.style.maxWidth && (e.style.minWidth = (Va = e.offsetWidth) + "px"), e.style.maxWidth = "none", b(document.body, Da.noSelection), !1;
        }
      }
    }

    function ha(a) {
      if (Sa) {
        var b;
        "touchmove" === a.type ? (a.preventDefault(), b = a.targetTouches[0]) : 0 === a.button && (b = a), b && fa(b, Sa.elements.dialog, !Sa.get("modal") && !Sa.get("pinned"));
      }
    }

    function ia() {
      if (Sa) {
        var a = Sa;
        Sa = null, c(document.body, Da.noSelection), c(a.elements.dialog, Da.capture), Ga = !0, l("onresized", a);
      }
    }

    function ja(a) {
      Sa = null;
      var b = a.elements.dialog;
      "none" === b.style.maxWidth && (b.style.maxWidth = b.style.minWidth = b.style.width = b.style.height = b.style.minHeight = b.style.left = "", Ta = Number.Nan, Ua = Va = Wa = 0);
    }

    function ka(a) {
      a.get("resizable") ? (b(a.elements.root, Da.resizable), a.isOpen() && sa(a)) : (ja(a), c(a.elements.root, Da.resizable), a.isOpen() && ta(a));
    }

    function la() {
      for (var a = 0; a < p.length; a += 1) {
        var b = p[a];
        b.get("autoReset") && (da(b), ja(b));
      }
    }

    function ma(b) {
      1 === p.length && (q(a, "resize", la), q(document.body, "keyup", U), q(document.body, "keydown", V), q(document.body, "focus", X), q(document.documentElement, "mousemove", ba), q(document.documentElement, "touchmove", ba), q(document.documentElement, "mouseup", ca), q(document.documentElement, "touchend", ca), q(document.documentElement, "mousemove", ha), q(document.documentElement, "touchmove", ha), q(document.documentElement, "mouseup", ia), q(document.documentElement, "touchend", ia)), q(b.elements.commands.container, "click", b.__internal.commandsClickHandler), q(b.elements.footer, "click", b.__internal.buttonsClickHandler), q(b.elements.reset[0], "focus", b.__internal.resetHandler), q(b.elements.reset[1], "focus", b.__internal.resetHandler), Ja = !0, q(b.elements.dialog, s.type, b.__internal.transitionInHandler), b.get("modal") || oa(b), b.get("resizable") && sa(b), b.get("movable") && qa(b);
    }

    function na(b) {
      1 === p.length && (r(a, "resize", la), r(document.body, "keyup", U), r(document.body, "keydown", V), r(document.body, "focus", X), r(document.documentElement, "mousemove", ba), r(document.documentElement, "mouseup", ca), r(document.documentElement, "mousemove", ha), r(document.documentElement, "mouseup", ia)), r(b.elements.commands.container, "click", b.__internal.commandsClickHandler), r(b.elements.footer, "click", b.__internal.buttonsClickHandler), r(b.elements.reset[0], "focus", b.__internal.resetHandler), r(b.elements.reset[1], "focus", b.__internal.resetHandler), q(b.elements.dialog, s.type, b.__internal.transitionOutHandler), b.get("modal") || pa(b), b.get("movable") && ra(b), b.get("resizable") && ta(b);
    }

    function oa(a) {
      q(a.elements.dialog, "focus", a.__internal.bringToFrontHandler, !0);
    }

    function pa(a) {
      r(a.elements.dialog, "focus", a.__internal.bringToFrontHandler, !0);
    }

    function qa(a) {
      q(a.elements.header, "mousedown", a.__internal.beginMoveHandler), q(a.elements.header, "touchstart", a.__internal.beginMoveHandler);
    }

    function ra(a) {
      r(a.elements.header, "mousedown", a.__internal.beginMoveHandler), r(a.elements.header, "touchstart", a.__internal.beginMoveHandler);
    }

    function sa(a) {
      q(a.elements.resizeHandle, "mousedown", a.__internal.beginResizeHandler), q(a.elements.resizeHandle, "touchstart", a.__internal.beginResizeHandler);
    }

    function ta(a) {
      r(a.elements.resizeHandle, "mousedown", a.__internal.beginResizeHandler), r(a.elements.resizeHandle, "touchstart", a.__internal.beginResizeHandler);
    }

    function ua(a) {
      q(a.elements.modal, "click", a.__internal.modalClickHandler);
    }

    function va(a) {
      r(a.elements.modal, "click", a.__internal.modalClickHandler);
    }

    var wa,
        xa,
        ya = [],
        za = null,
        Aa = !1,
        Ba = a.navigator.userAgent.indexOf("Safari") > -1 && a.navigator.userAgent.indexOf("Chrome") < 0,
        Ca = {
      dimmer: '<div class="ajs-dimmer"></div>',
      modal: '<div class="ajs-modal" tabindex="0"></div>',
      dialog: '<div class="ajs-dialog" tabindex="0"></div>',
      reset: '<button class="ajs-reset"></button>',
      commands: '<div class="ajs-commands"><button class="ajs-pin"></button><button class="ajs-maximize"></button><button class="ajs-close"></button></div>',
      header: '<div class="ajs-header"></div>',
      body: '<div class="ajs-body"></div>',
      content: '<div class="ajs-content"></div>',
      footer: '<div class="ajs-footer"></div>',
      buttons: {
        primary: '<div class="ajs-primary ajs-buttons"></div>',
        auxiliary: '<div class="ajs-auxiliary ajs-buttons"></div>'
      },
      button: '<button class="ajs-button"></button>',
      resizeHandle: '<div class="ajs-handle"></div>'
    },
        Da = {
      animationIn: "ajs-in",
      animationOut: "ajs-out",
      base: "alertify",
      basic: "ajs-basic",
      capture: "ajs-capture",
      closable: "ajs-closable",
      fixed: "ajs-fixed",
      frameless: "ajs-frameless",
      hidden: "ajs-hidden",
      maximize: "ajs-maximize",
      maximized: "ajs-maximized",
      maximizable: "ajs-maximizable",
      modeless: "ajs-modeless",
      movable: "ajs-movable",
      noSelection: "ajs-no-selection",
      noOverflow: "ajs-no-overflow",
      noPadding: "ajs-no-padding",
      pin: "ajs-pin",
      pinnable: "ajs-pinnable",
      prefix: "ajs-",
      resizable: "ajs-resizable",
      restore: "ajs-restore",
      shake: "ajs-shake",
      unpinned: "ajs-unpinned"
    },
        Ea = "",
        Fa = 0,
        Ga = !1,
        Ha = 0,
        Ia = 0,
        Ja = !1,
        Ka = null,
        La = 0,
        Ma = 0,
        Na = "pageX",
        Oa = "pageY",
        Pa = null,
        Qa = !1,
        Ra = null,
        Sa = null,
        Ta = Number.Nan,
        Ua = 0,
        Va = 0,
        Wa = 0;
    return {
      __init: m,
      isOpen: function isOpen() {
        return this.__internal.isOpen;
      },
      isModal: function isModal() {
        return this.elements.root.className.indexOf(Da.modeless) < 0;
      },
      isMaximized: function isMaximized() {
        return this.elements.root.className.indexOf(Da.maximized) > -1;
      },
      isPinned: function isPinned() {
        return this.elements.root.className.indexOf(Da.unpinned) < 0;
      },
      maximize: function maximize() {
        return this.isMaximized() || I(this), this;
      },
      restore: function restore() {
        return this.isMaximized() && J(this), this;
      },
      pin: function pin() {
        return this.isPinned() || G(this), this;
      },
      unpin: function unpin() {
        return this.isPinned() && H(this), this;
      },
      bringToFront: function bringToFront() {
        return B(null, this), this;
      },
      moveTo: function moveTo(a, b) {
        if (!isNaN(a) && !isNaN(b)) {
          l("onmove", this);
          var c = this.elements.dialog,
              e = c,
              f = 0,
              g = 0;
          c.style.left && (f -= parseInt(c.style.left, 10)), c.style.top && (g -= parseInt(c.style.top, 10));

          do {
            f += e.offsetLeft, g += e.offsetTop;
          } while (e = e.offsetParent);

          var h = a - f,
              i = b - g;
          d() && (h *= -1), c.style.left = h + "px", c.style.top = i + "px", l("onmoved", this);
        }

        return this;
      },
      resizeTo: function resizeTo(a, b) {
        var c = parseFloat(a),
            d = parseFloat(b),
            e = /(\d*\.\d+|\d+)%/;

        if (!isNaN(c) && !isNaN(d) && !0 === this.get("resizable")) {
          l("onresize", this), ("" + a).match(e) && (c = c / 100 * document.documentElement.clientWidth), ("" + b).match(e) && (d = d / 100 * document.documentElement.clientHeight);
          var f = this.elements.dialog;
          "none" !== f.style.maxWidth && (f.style.minWidth = (Va = f.offsetWidth) + "px"), f.style.maxWidth = "none", f.style.minHeight = this.elements.header.offsetHeight + this.elements.footer.offsetHeight + "px", f.style.width = c + "px", f.style.height = d + "px", l("onresized", this);
        }

        return this;
      },
      setting: function setting(a, b) {
        var c = this,
            d = D(this, this.__internal.options, function (a, b, d) {
          C(c, a, b, d);
        }, a, b);
        if ("get" === d.op) return d.found ? d.value : void 0 !== this.settings ? D(this, this.settings, this.settingUpdated || function () {}, a, b).value : void 0;

        if ("set" === d.op) {
          if (d.items.length > 0) for (var e = this.settingUpdated || function () {}, f = 0; f < d.items.length; f += 1) {
            var g = d.items[f];
            g.found || void 0 === this.settings || D(this, this.settings, e, g.key, g.value);
          }
          return this;
        }
      },
      set: function set(a, b) {
        return this.setting(a, b), this;
      },
      get: function get(a) {
        return this.setting(a);
      },
      setHeader: function setHeader(b) {
        return "string" == typeof b ? (g(this.elements.header), this.elements.header.innerHTML = b) : b instanceof a.HTMLElement && this.elements.header.firstChild !== b && (g(this.elements.header), this.elements.header.appendChild(b)), this;
      },
      setContent: function setContent(b) {
        return "string" == typeof b ? (g(this.elements.content), this.elements.content.innerHTML = b) : b instanceof a.HTMLElement && this.elements.content.firstChild !== b && (g(this.elements.content), this.elements.content.appendChild(b)), this;
      },
      showModal: function showModal(a) {
        return this.show(!0, a);
      },
      show: function show(a, d) {
        if (m(this), this.__internal.isOpen) {
          da(this), ja(this), b(this.elements.dialog, Da.shake);
          var e = this;
          setTimeout(function () {
            c(e.elements.dialog, Da.shake);
          }, 200);
        } else {
          if (this.__internal.isOpen = !0, p.push(this), v.defaults.maintainFocus && (this.__internal.activeElement = document.activeElement), document.body.hasAttribute("tabindex") || document.body.setAttribute("tabindex", Aa = "0"), "function" == typeof this.prepare && this.prepare(), ma(this), void 0 !== a && this.set("modal", a), o(), u(), "string" == typeof d && "" !== d && (this.__internal.className = d, b(this.elements.root, d)), this.get("startMaximized") ? this.maximize() : this.isMaximized() && J(this), N(this), this.elements.root.removeAttribute("style"), c(this.elements.root, Da.animationOut), b(this.elements.root, Da.animationIn), clearTimeout(this.__internal.timerIn), this.__internal.timerIn = setTimeout(this.__internal.transitionInHandler, s.supported ? 1e3 : 100), Ba) {
            var f = this.elements.root;
            f.style.display = "none", setTimeout(function () {
              f.style.display = "block";
            }, 0);
          }

          za = this.elements.root.offsetWidth, c(this.elements.root, Da.hidden), "function" == typeof this.hooks.onshow && this.hooks.onshow.call(this), l("onshow", this);
        }

        return this;
      },
      close: function close() {
        return this.__internal.isOpen && !1 !== l("onclosing", this) && (na(this), c(this.elements.root, Da.animationIn), b(this.elements.root, Da.animationOut), clearTimeout(this.__internal.timerOut), this.__internal.timerOut = setTimeout(this.__internal.transitionOutHandler, s.supported ? 1e3 : 100), b(this.elements.root, Da.hidden), za = this.elements.modal.offsetWidth, void 0 !== this.__internal.className && "" !== this.__internal.className && c(this.elements.root, this.__internal.className), "function" == typeof this.hooks.onclose && this.hooks.onclose.call(this), l("onclose", this), p.splice(p.indexOf(this), 1), this.__internal.isOpen = !1, u()), p.length || "0" !== Aa || document.body.removeAttribute("tabindex"), this;
      },
      closeOthers: function closeOthers() {
        return v.closeAll(this), this;
      },
      destroy: function destroy() {
        return this.__internal && (this.__internal.isOpen ? (this.__internal.destroy = function () {
          i(this, m);
        }, this.close()) : this.__internal.destroy || i(this, m)), this;
      }
    };
  }(),
      u = function () {
    function d(a) {
      a.__internal || (a.__internal = {
        position: v.defaults.notifier.position,
        delay: v.defaults.notifier.delay
      }, l = document.createElement("DIV"), h(a)), l.parentNode !== document.body && document.body.appendChild(l);
    }

    function e(a) {
      a.__internal.pushed = !0, m.push(a);
    }

    function f(a) {
      m.splice(m.indexOf(a), 1), a.__internal.pushed = !1;
    }

    function h(a) {
      switch (l.className = n.base, a.__internal.position) {
        case "top-right":
          b(l, n.top + " " + n.right);
          break;

        case "top-left":
          b(l, n.top + " " + n.left);
          break;

        case "top-center":
          b(l, n.top + " " + n.center);
          break;

        case "bottom-left":
          b(l, n.bottom + " " + n.left);
          break;

        case "bottom-center":
          b(l, n.bottom + " " + n.center);
          break;

        default:
        case "bottom-right":
          b(l, n.bottom + " " + n.right);
      }
    }

    function i(d, h) {
      function i(a, b) {
        b.__internal.closeButton && "true" !== a.target.getAttribute("data-close") || b.dismiss(!0);
      }

      function m(a, b) {
        r(b.element, s.type, m), l.removeChild(b.element);
      }

      function o(a) {
        return a.__internal || (a.__internal = {
          pushed: !1,
          delay: void 0,
          timer: void 0,
          clickHandler: void 0,
          transitionEndHandler: void 0,
          transitionTimeout: void 0
        }, a.__internal.clickHandler = j(a, i), a.__internal.transitionEndHandler = j(a, m)), a;
      }

      function p(a) {
        clearTimeout(a.__internal.timer), clearTimeout(a.__internal.transitionTimeout);
      }

      return o({
        element: d,
        push: function push(a, c) {
          if (!this.__internal.pushed) {
            e(this), p(this);
            var d, f;

            switch (arguments.length) {
              case 0:
                f = this.__internal.delay;
                break;

              case 1:
                "number" == typeof a ? f = a : (d = a, f = this.__internal.delay);
                break;

              case 2:
                d = a, f = c;
            }

            return this.__internal.closeButton = v.defaults.notifier.closeButton, void 0 !== d && this.setContent(d), u.__internal.position.indexOf("top") < 0 ? l.appendChild(this.element) : l.insertBefore(this.element, l.firstChild), k = this.element.offsetWidth, b(this.element, n.visible), q(this.element, "click", this.__internal.clickHandler), this.delay(f);
          }

          return this;
        },
        ondismiss: function ondismiss() {},
        callback: h,
        dismiss: function dismiss(a) {
          return this.__internal.pushed && (p(this), "function" == typeof this.ondismiss && !1 === this.ondismiss.call(this) || (r(this.element, "click", this.__internal.clickHandler), void 0 !== this.element && this.element.parentNode === l && (this.__internal.transitionTimeout = setTimeout(this.__internal.transitionEndHandler, s.supported ? 1e3 : 100), c(this.element, n.visible), "function" == typeof this.callback && this.callback.call(this, a)), f(this))), this;
        },
        delay: function delay(a) {
          if (p(this), this.__internal.delay = void 0 === a || isNaN(+a) ? u.__internal.delay : +a, this.__internal.delay > 0) {
            var b = this;
            this.__internal.timer = setTimeout(function () {
              b.dismiss();
            }, 1e3 * this.__internal.delay);
          }

          return this;
        },
        setContent: function setContent(c) {
          if ("string" == typeof c ? (g(this.element), this.element.innerHTML = c) : c instanceof a.HTMLElement && this.element.firstChild !== c && (g(this.element), this.element.appendChild(c)), this.__internal.closeButton) {
            var d = document.createElement("span");
            b(d, n.close), d.setAttribute("data-close", !0), this.element.appendChild(d);
          }

          return this;
        },
        dismissOthers: function dismissOthers() {
          return u.dismissAll(this), this;
        }
      });
    }

    var k,
        l,
        m = [],
        n = {
      base: "alertify-notifier",
      message: "ajs-message",
      top: "ajs-top",
      right: "ajs-right",
      bottom: "ajs-bottom",
      left: "ajs-left",
      center: "ajs-center",
      visible: "ajs-visible",
      hidden: "ajs-hidden",
      close: "ajs-close"
    };
    return {
      setting: function setting(a, b) {
        if (d(this), void 0 === b) return this.__internal[a];

        switch (a) {
          case "position":
            this.__internal.position = b, h(this);
            break;

          case "delay":
            this.__internal.delay = b;
        }

        return this;
      },
      set: function set(a, b) {
        return this.setting(a, b), this;
      },
      get: function get(a) {
        return this.setting(a);
      },
      create: function create(a, b) {
        d(this);
        var c = document.createElement("div");
        return c.className = n.message + ("string" == typeof a && "" !== a ? " ajs-" + a : ""), i(c, b);
      },
      dismissAll: function dismissAll(a) {
        for (var b = m.slice(0), c = 0; c < b.length; c += 1) {
          var d = b[c];
          void 0 !== a && a === d || d.dismiss();
        }
      }
    };
  }(),
      v = new m();

  v.dialog("alert", function () {
    return {
      main: function main(a, b, c) {
        var d, e, f;

        switch (arguments.length) {
          case 1:
            e = a;
            break;

          case 2:
            "function" == typeof b ? (e = a, f = b) : (d = a, e = b);
            break;

          case 3:
            d = a, e = b, f = c;
        }

        return this.set("title", d), this.set("message", e), this.set("onok", f), this;
      },
      setup: function setup() {
        return {
          buttons: [{
            text: v.defaults.glossary.ok,
            key: n.ESC,
            invokeOnClose: !0,
            className: v.defaults.theme.ok
          }],
          focus: {
            element: 0,
            select: !1
          },
          options: {
            maximizable: !1,
            resizable: !1
          }
        };
      },
      build: function build() {},
      prepare: function prepare() {},
      setMessage: function setMessage(a) {
        this.setContent(a);
      },
      settings: {
        message: void 0,
        onok: void 0,
        label: void 0
      },
      settingUpdated: function settingUpdated(a, b, c) {
        switch (a) {
          case "message":
            this.setMessage(c);
            break;

          case "label":
            this.__internal.buttons[0].element && (this.__internal.buttons[0].element.innerHTML = c);
        }
      },
      callback: function callback(a) {
        if ("function" == typeof this.get("onok")) {
          var b = this.get("onok").call(this, a);
          void 0 !== b && (a.cancel = !b);
        }
      }
    };
  }), v.dialog("confirm", function () {
    function a(a) {
      null !== c.timer && (clearInterval(c.timer), c.timer = null, a.__internal.buttons[c.index].element.innerHTML = c.text);
    }

    function b(b, d, e) {
      a(b), c.duration = e, c.index = d, c.text = b.__internal.buttons[d].element.innerHTML, c.timer = setInterval(j(b, c.task), 1e3), c.task(null, b);
    }

    var c = {
      timer: null,
      index: null,
      text: null,
      duration: null,
      task: function task(b, d) {
        if (d.isOpen()) {
          if (d.__internal.buttons[c.index].element.innerHTML = c.text + " (&#8207;" + c.duration + "&#8207;) ", c.duration -= 1, -1 === c.duration) {
            a(d);
            var e = d.__internal.buttons[c.index],
                f = k(c.index, e);
            "function" == typeof d.callback && d.callback.apply(d, [f]), !1 !== f.close && d.close();
          }
        } else a(d);
      }
    };
    return {
      main: function main(a, b, c, d) {
        var e, f, g, h;

        switch (arguments.length) {
          case 1:
            f = a;
            break;

          case 2:
            f = a, g = b;
            break;

          case 3:
            f = a, g = b, h = c;
            break;

          case 4:
            e = a, f = b, g = c, h = d;
        }

        return this.set("title", e), this.set("message", f), this.set("onok", g), this.set("oncancel", h), this;
      },
      setup: function setup() {
        return {
          buttons: [{
            text: v.defaults.glossary.ok,
            key: n.ENTER,
            className: v.defaults.theme.ok
          }, {
            text: v.defaults.glossary.cancel,
            key: n.ESC,
            invokeOnClose: !0,
            className: v.defaults.theme.cancel
          }],
          focus: {
            element: 0,
            select: !1
          },
          options: {
            maximizable: !1,
            resizable: !1
          }
        };
      },
      build: function build() {},
      prepare: function prepare() {},
      setMessage: function setMessage(a) {
        this.setContent(a);
      },
      settings: {
        message: null,
        labels: null,
        onok: null,
        oncancel: null,
        defaultFocus: null,
        reverseButtons: null
      },
      settingUpdated: function settingUpdated(a, b, c) {
        switch (a) {
          case "message":
            this.setMessage(c);
            break;

          case "labels":
            "ok" in c && this.__internal.buttons[0].element && (this.__internal.buttons[0].text = c.ok, this.__internal.buttons[0].element.innerHTML = c.ok), "cancel" in c && this.__internal.buttons[1].element && (this.__internal.buttons[1].text = c.cancel, this.__internal.buttons[1].element.innerHTML = c.cancel);
            break;

          case "reverseButtons":
            !0 === c ? this.elements.buttons.primary.appendChild(this.__internal.buttons[0].element) : this.elements.buttons.primary.appendChild(this.__internal.buttons[1].element);
            break;

          case "defaultFocus":
            this.__internal.focus.element = "ok" === c ? 0 : 1;
        }
      },
      callback: function callback(b) {
        a(this);
        var c;

        switch (b.index) {
          case 0:
            "function" == typeof this.get("onok") && void 0 !== (c = this.get("onok").call(this, b)) && (b.cancel = !c);
            break;

          case 1:
            "function" == typeof this.get("oncancel") && void 0 !== (c = this.get("oncancel").call(this, b)) && (b.cancel = !c);
        }
      },
      autoOk: function autoOk(a) {
        return b(this, 0, a), this;
      },
      autoCancel: function autoCancel(a) {
        return b(this, 1, a), this;
      }
    };
  }), v.dialog("prompt", function () {
    var b = document.createElement("INPUT"),
        c = document.createElement("P");
    return {
      main: function main(a, b, c, d, e) {
        var f, g, h, i, j;

        switch (arguments.length) {
          case 1:
            g = a;
            break;

          case 2:
            g = a, h = b;
            break;

          case 3:
            g = a, h = b, i = c;
            break;

          case 4:
            g = a, h = b, i = c, j = d;
            break;

          case 5:
            f = a, g = b, h = c, i = d, j = e;
        }

        return this.set("title", f), this.set("message", g), this.set("value", h), this.set("onok", i), this.set("oncancel", j), this;
      },
      setup: function setup() {
        return {
          buttons: [{
            text: v.defaults.glossary.ok,
            key: n.ENTER,
            className: v.defaults.theme.ok
          }, {
            text: v.defaults.glossary.cancel,
            key: n.ESC,
            invokeOnClose: !0,
            className: v.defaults.theme.cancel
          }],
          focus: {
            element: b,
            select: !0
          },
          options: {
            maximizable: !1,
            resizable: !1
          }
        };
      },
      build: function build() {
        b.className = v.defaults.theme.input, b.setAttribute("type", "text"), b.value = this.get("value"), this.elements.content.appendChild(c), this.elements.content.appendChild(b);
      },
      prepare: function prepare() {},
      setMessage: function setMessage(b) {
        "string" == typeof b ? (g(c), c.innerHTML = b) : b instanceof a.HTMLElement && c.firstChild !== b && (g(c), c.appendChild(b));
      },
      settings: {
        message: void 0,
        labels: void 0,
        onok: void 0,
        oncancel: void 0,
        value: "",
        type: "text",
        reverseButtons: void 0
      },
      settingUpdated: function settingUpdated(a, c, d) {
        switch (a) {
          case "message":
            this.setMessage(d);
            break;

          case "value":
            b.value = d;
            break;

          case "type":
            switch (d) {
              case "text":
              case "color":
              case "date":
              case "datetime-local":
              case "email":
              case "month":
              case "number":
              case "password":
              case "search":
              case "tel":
              case "time":
              case "week":
                b.type = d;
                break;

              default:
                b.type = "text";
            }

            break;

          case "labels":
            d.ok && this.__internal.buttons[0].element && (this.__internal.buttons[0].element.innerHTML = d.ok), d.cancel && this.__internal.buttons[1].element && (this.__internal.buttons[1].element.innerHTML = d.cancel);
            break;

          case "reverseButtons":
            !0 === d ? this.elements.buttons.primary.appendChild(this.__internal.buttons[0].element) : this.elements.buttons.primary.appendChild(this.__internal.buttons[1].element);
        }
      },
      callback: function callback(a) {
        var c;

        switch (a.index) {
          case 0:
            this.settings.value = b.value, "function" == typeof this.get("onok") && void 0 !== (c = this.get("onok").call(this, a, this.settings.value)) && (a.cancel = !c);
            break;

          case 1:
            "function" == typeof this.get("oncancel") && void 0 !== (c = this.get("oncancel").call(this, a)) && (a.cancel = !c), a.cancel || (b.value = this.settings.value);
        }
      }
    };
  }), "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && "object" == _typeof(module.exports) ? module.exports = v : "function" == typeof define && define.amd ? define([], function () {
    return v;
  }) : a.alertify || (a.alertify = v);
}("undefined" != typeof window ? window : void 0);})(jQuery);
(function($){"use strict";

function pt_logout() {
  var ajax_data = {
    'action': 'pt_logout',
    'nonce': flo_ajax_var.nonce
  };
  jQuery('.pt-settings--logout-spinner').css('visibility', 'visible');
  jQuery.post(ajaxurl, ajax_data, function (response) {
    console.log(response);
    jQuery('.pt-settings--logout-spinner').css('visibility', 'hidden');
    setTimeout(function () {
      // Simulate an HTTP redirect:
      window.location.replace(pictime_data.pt_settings_url);
    }, 1000);
  });
}
/**
 *
 * Update the account integration Data
 *
 */


function flo_pt_resync() {
  var ajax_data = {
    'action': 'pt_sync_data',
    'nonce': flo_ajax_var.nonce
  };
  jQuery('.pt-settings--sync-spinner').css('visibility', 'visible');
  jQuery.post(ajaxurl, ajax_data, function (response) {
    console.log(response);
    jQuery('.pt-settings--sync-spinner').css('visibility', 'hidden');
  });
}

$(document).ready(function () {
  jQuery('.pt-settings--logout').on('click', '.pt-settings--logout-l, .pt-settings--logout-r', function () {
    pt_logout();
  });
  jQuery('.pt-settings--container').on('click', '.pt-settings--resync', function () {
    flo_pt_resync();
  });
});})(jQuery);
(function($){"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (i) {
  "use strict";

  "function" == typeof define && define.amd ? define(["jquery"], i) : "undefined" != typeof exports ? module.exports = i(require("jquery")) : i(jQuery);
}(function (i) {
  "use strict";

  var e = window.Slick || {};
  (e = function () {
    var e = 0;
    return function (t, o) {
      var s,
          n = this;
      n.defaults = {
        accessibility: !0,
        adaptiveHeight: !1,
        appendArrows: i(t),
        appendDots: i(t),
        arrows: !0,
        asNavFor: null,
        prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
        nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
        autoplay: !1,
        autoplaySpeed: 3e3,
        centerMode: !1,
        centerPadding: "50px",
        cssEase: "ease",
        customPaging: function customPaging(e, t) {
          return i('<button type="button" />').text(t + 1);
        },
        dots: !1,
        dotsClass: "slick-dots",
        draggable: !0,
        easing: "linear",
        edgeFriction: .35,
        fade: !1,
        focusOnSelect: !1,
        focusOnChange: !1,
        infinite: !0,
        initialSlide: 0,
        lazyLoad: "ondemand",
        mobileFirst: !1,
        pauseOnHover: !0,
        pauseOnFocus: !0,
        pauseOnDotsHover: !1,
        respondTo: "window",
        responsive: null,
        rows: 1,
        rtl: !1,
        slide: "",
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        swipe: !0,
        swipeToSlide: !1,
        touchMove: !0,
        touchThreshold: 5,
        useCSS: !0,
        useTransform: !0,
        variableWidth: !1,
        vertical: !1,
        verticalSwiping: !1,
        waitForAnimate: !0,
        zIndex: 1e3
      }, n.initials = {
        animating: !1,
        dragging: !1,
        autoPlayTimer: null,
        currentDirection: 0,
        currentLeft: null,
        currentSlide: 0,
        direction: 1,
        $dots: null,
        listWidth: null,
        listHeight: null,
        loadIndex: 0,
        $nextArrow: null,
        $prevArrow: null,
        scrolling: !1,
        slideCount: null,
        slideWidth: null,
        $slideTrack: null,
        $slides: null,
        sliding: !1,
        slideOffset: 0,
        swipeLeft: null,
        swiping: !1,
        $list: null,
        touchObject: {},
        transformsEnabled: !1,
        unslicked: !1
      }, i.extend(n, n.initials), n.activeBreakpoint = null, n.animType = null, n.animProp = null, n.breakpoints = [], n.breakpointSettings = [], n.cssTransitions = !1, n.focussed = !1, n.interrupted = !1, n.hidden = "hidden", n.paused = !0, n.positionProp = null, n.respondTo = null, n.rowCount = 1, n.shouldClick = !0, n.$slider = i(t), n.$slidesCache = null, n.transformType = null, n.transitionType = null, n.visibilityChange = "visibilitychange", n.windowWidth = 0, n.windowTimer = null, s = i(t).data("slick") || {}, n.options = i.extend({}, n.defaults, o, s), n.currentSlide = n.options.initialSlide, n.originalSettings = n.options, void 0 !== document.mozHidden ? (n.hidden = "mozHidden", n.visibilityChange = "mozvisibilitychange") : void 0 !== document.webkitHidden && (n.hidden = "webkitHidden", n.visibilityChange = "webkitvisibilitychange"), n.autoPlay = i.proxy(n.autoPlay, n), n.autoPlayClear = i.proxy(n.autoPlayClear, n), n.autoPlayIterator = i.proxy(n.autoPlayIterator, n), n.changeSlide = i.proxy(n.changeSlide, n), n.clickHandler = i.proxy(n.clickHandler, n), n.selectHandler = i.proxy(n.selectHandler, n), n.setPosition = i.proxy(n.setPosition, n), n.swipeHandler = i.proxy(n.swipeHandler, n), n.dragHandler = i.proxy(n.dragHandler, n), n.keyHandler = i.proxy(n.keyHandler, n), n.instanceUid = e++, n.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/, n.registerBreakpoints(), n.init(!0);
    };
  }()).prototype.activateADA = function () {
    this.$slideTrack.find(".slick-active").attr({
      "aria-hidden": "false"
    }).find("a, input, button, select").attr({
      tabindex: "0"
    });
  }, e.prototype.addSlide = e.prototype.slickAdd = function (e, t, o) {
    var s = this;
    if ("boolean" == typeof t) o = t, t = null;else if (t < 0 || t >= s.slideCount) return !1;
    s.unload(), "number" == typeof t ? 0 === t && 0 === s.$slides.length ? i(e).appendTo(s.$slideTrack) : o ? i(e).insertBefore(s.$slides.eq(t)) : i(e).insertAfter(s.$slides.eq(t)) : !0 === o ? i(e).prependTo(s.$slideTrack) : i(e).appendTo(s.$slideTrack), s.$slides = s.$slideTrack.children(this.options.slide), s.$slideTrack.children(this.options.slide).detach(), s.$slideTrack.append(s.$slides), s.$slides.each(function (e, t) {
      i(t).attr("data-slick-index", e);
    }), s.$slidesCache = s.$slides, s.reinit();
  }, e.prototype.animateHeight = function () {
    var i = this;

    if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
      var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
      i.$list.animate({
        height: e
      }, i.options.speed);
    }
  }, e.prototype.animateSlide = function (e, t) {
    var o = {},
        s = this;
    s.animateHeight(), !0 === s.options.rtl && !1 === s.options.vertical && (e = -e), !1 === s.transformsEnabled ? !1 === s.options.vertical ? s.$slideTrack.animate({
      left: e
    }, s.options.speed, s.options.easing, t) : s.$slideTrack.animate({
      top: e
    }, s.options.speed, s.options.easing, t) : !1 === s.cssTransitions ? (!0 === s.options.rtl && (s.currentLeft = -s.currentLeft), i({
      animStart: s.currentLeft
    }).animate({
      animStart: e
    }, {
      duration: s.options.speed,
      easing: s.options.easing,
      step: function step(i) {
        i = Math.ceil(i), !1 === s.options.vertical ? (o[s.animType] = "translate(" + i + "px, 0px)", s.$slideTrack.css(o)) : (o[s.animType] = "translate(0px," + i + "px)", s.$slideTrack.css(o));
      },
      complete: function complete() {
        t && t.call();
      }
    })) : (s.applyTransition(), e = Math.ceil(e), !1 === s.options.vertical ? o[s.animType] = "translate3d(" + e + "px, 0px, 0px)" : o[s.animType] = "translate3d(0px," + e + "px, 0px)", s.$slideTrack.css(o), t && setTimeout(function () {
      s.disableTransition(), t.call();
    }, s.options.speed));
  }, e.prototype.getNavTarget = function () {
    var e = this,
        t = e.options.asNavFor;
    return t && null !== t && (t = i(t).not(e.$slider)), t;
  }, e.prototype.asNavFor = function (e) {
    var t = this.getNavTarget();
    null !== t && "object" == _typeof(t) && t.each(function () {
      var t = i(this).slick("getSlick");
      t.unslicked || t.slideHandler(e, !0);
    });
  }, e.prototype.applyTransition = function (i) {
    var e = this,
        t = {};
    !1 === e.options.fade ? t[e.transitionType] = e.transformType + " " + e.options.speed + "ms " + e.options.cssEase : t[e.transitionType] = "opacity " + e.options.speed + "ms " + e.options.cssEase, !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
  }, e.prototype.autoPlay = function () {
    var i = this;
    i.autoPlayClear(), i.slideCount > i.options.slidesToShow && (i.autoPlayTimer = setInterval(i.autoPlayIterator, i.options.autoplaySpeed));
  }, e.prototype.autoPlayClear = function () {
    var i = this;
    i.autoPlayTimer && clearInterval(i.autoPlayTimer);
  }, e.prototype.autoPlayIterator = function () {
    var i = this,
        e = i.currentSlide + i.options.slidesToScroll;
    i.paused || i.interrupted || i.focussed || (!1 === i.options.infinite && (1 === i.direction && i.currentSlide + 1 === i.slideCount - 1 ? i.direction = 0 : 0 === i.direction && (e = i.currentSlide - i.options.slidesToScroll, i.currentSlide - 1 == 0 && (i.direction = 1))), i.slideHandler(e));
  }, e.prototype.buildArrows = function () {
    var e = this;
    !0 === e.options.arrows && (e.$prevArrow = i(e.options.prevArrow).addClass("slick-arrow"), e.$nextArrow = i(e.options.nextArrow).addClass("slick-arrow"), e.slideCount > e.options.slidesToShow ? (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows), e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows), !0 !== e.options.infinite && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({
      "aria-disabled": "true",
      tabindex: "-1"
    }));
  }, e.prototype.buildDots = function () {
    var e,
        t,
        o = this;

    if (!0 === o.options.dots) {
      for (o.$slider.addClass("slick-dotted"), t = i("<ul />").addClass(o.options.dotsClass), e = 0; e <= o.getDotCount(); e += 1) {
        t.append(i("<li />").append(o.options.customPaging.call(this, o, e)));
      }

      o.$dots = t.appendTo(o.options.appendDots), o.$dots.find("li").first().addClass("slick-active");
    }
  }, e.prototype.buildOut = function () {
    var e = this;
    e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide"), e.slideCount = e.$slides.length, e.$slides.each(function (e, t) {
      i(t).attr("data-slick-index", e).data("originalStyling", i(t).attr("style") || "");
    }), e.$slider.addClass("slick-slider"), e.$slideTrack = 0 === e.slideCount ? i('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent(), e.$list = e.$slideTrack.wrap('<div class="slick-list"/>').parent(), e.$slideTrack.css("opacity", 0), !0 !== e.options.centerMode && !0 !== e.options.swipeToSlide || (e.options.slidesToScroll = 1), i("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading"), e.setupInfinite(), e.buildArrows(), e.buildDots(), e.updateDots(), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), !0 === e.options.draggable && e.$list.addClass("draggable");
  }, e.prototype.buildRows = function () {
    var i,
        e,
        t,
        o,
        s,
        n,
        r,
        l = this;

    if (o = document.createDocumentFragment(), n = l.$slider.children(), l.options.rows > 1) {
      for (r = l.options.slidesPerRow * l.options.rows, s = Math.ceil(n.length / r), i = 0; i < s; i++) {
        var d = document.createElement("div");

        for (e = 0; e < l.options.rows; e++) {
          var a = document.createElement("div");

          for (t = 0; t < l.options.slidesPerRow; t++) {
            var c = i * r + (e * l.options.slidesPerRow + t);
            n.get(c) && a.appendChild(n.get(c));
          }

          d.appendChild(a);
        }

        o.appendChild(d);
      }

      l.$slider.empty().append(o), l.$slider.children().children().children().css({
        width: 100 / l.options.slidesPerRow + "%",
        display: "inline-block"
      });
    }
  }, e.prototype.checkResponsive = function (e, t) {
    var o,
        s,
        n,
        r = this,
        l = !1,
        d = r.$slider.width(),
        a = window.innerWidth || i(window).width();

    if ("window" === r.respondTo ? n = a : "slider" === r.respondTo ? n = d : "min" === r.respondTo && (n = Math.min(a, d)), r.options.responsive && r.options.responsive.length && null !== r.options.responsive) {
      s = null;

      for (o in r.breakpoints) {
        r.breakpoints.hasOwnProperty(o) && (!1 === r.originalSettings.mobileFirst ? n < r.breakpoints[o] && (s = r.breakpoints[o]) : n > r.breakpoints[o] && (s = r.breakpoints[o]));
      }

      null !== s ? null !== r.activeBreakpoint ? (s !== r.activeBreakpoint || t) && (r.activeBreakpoint = s, "unslick" === r.breakpointSettings[s] ? r.unslick(s) : (r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s]), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)), l = s) : (r.activeBreakpoint = s, "unslick" === r.breakpointSettings[s] ? r.unslick(s) : (r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s]), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)), l = s) : null !== r.activeBreakpoint && (r.activeBreakpoint = null, r.options = r.originalSettings, !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e), l = s), e || !1 === l || r.$slider.trigger("breakpoint", [r, l]);
    }
  }, e.prototype.changeSlide = function (e, t) {
    var o,
        s,
        n,
        r = this,
        l = i(e.currentTarget);

    switch (l.is("a") && e.preventDefault(), l.is("li") || (l = l.closest("li")), n = r.slideCount % r.options.slidesToScroll != 0, o = n ? 0 : (r.slideCount - r.currentSlide) % r.options.slidesToScroll, e.data.message) {
      case "previous":
        s = 0 === o ? r.options.slidesToScroll : r.options.slidesToShow - o, r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide - s, !1, t);
        break;

      case "next":
        s = 0 === o ? r.options.slidesToScroll : o, r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide + s, !1, t);
        break;

      case "index":
        var d = 0 === e.data.index ? 0 : e.data.index || l.index() * r.options.slidesToScroll;
        r.slideHandler(r.checkNavigable(d), !1, t), l.children().trigger("focus");
        break;

      default:
        return;
    }
  }, e.prototype.checkNavigable = function (i) {
    var e, t;
    if (e = this.getNavigableIndexes(), t = 0, i > e[e.length - 1]) i = e[e.length - 1];else for (var o in e) {
      if (i < e[o]) {
        i = t;
        break;
      }

      t = e[o];
    }
    return i;
  }, e.prototype.cleanUpEvents = function () {
    var e = this;
    e.options.dots && null !== e.$dots && (i("li", e.$dots).off("click.slick", e.changeSlide).off("mouseenter.slick", i.proxy(e.interrupt, e, !0)).off("mouseleave.slick", i.proxy(e.interrupt, e, !1)), !0 === e.options.accessibility && e.$dots.off("keydown.slick", e.keyHandler)), e.$slider.off("focus.slick blur.slick"), !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide), e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide), !0 === e.options.accessibility && (e.$prevArrow && e.$prevArrow.off("keydown.slick", e.keyHandler), e.$nextArrow && e.$nextArrow.off("keydown.slick", e.keyHandler))), e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler), e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler), e.$list.off("touchend.slick mouseup.slick", e.swipeHandler), e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler), e.$list.off("click.slick", e.clickHandler), i(document).off(e.visibilityChange, e.visibility), e.cleanUpSlideEvents(), !0 === e.options.accessibility && e.$list.off("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && i(e.$slideTrack).children().off("click.slick", e.selectHandler), i(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange), i(window).off("resize.slick.slick-" + e.instanceUid, e.resize), i("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault), i(window).off("load.slick.slick-" + e.instanceUid, e.setPosition);
  }, e.prototype.cleanUpSlideEvents = function () {
    var e = this;
    e.$list.off("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.off("mouseleave.slick", i.proxy(e.interrupt, e, !1));
  }, e.prototype.cleanUpRows = function () {
    var i,
        e = this;
    e.options.rows > 1 && ((i = e.$slides.children().children()).removeAttr("style"), e.$slider.empty().append(i));
  }, e.prototype.clickHandler = function (i) {
    !1 === this.shouldClick && (i.stopImmediatePropagation(), i.stopPropagation(), i.preventDefault());
  }, e.prototype.destroy = function (e) {
    var t = this;
    t.autoPlayClear(), t.touchObject = {}, t.cleanUpEvents(), i(".slick-cloned", t.$slider).detach(), t.$dots && t.$dots.remove(), t.$prevArrow && t.$prevArrow.length && (t.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove()), t.$nextArrow && t.$nextArrow.length && (t.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove()), t.$slides && (t.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function () {
      i(this).attr("style", i(this).data("originalStyling"));
    }), t.$slideTrack.children(this.options.slide).detach(), t.$slideTrack.detach(), t.$list.detach(), t.$slider.append(t.$slides)), t.cleanUpRows(), t.$slider.removeClass("slick-slider"), t.$slider.removeClass("slick-initialized"), t.$slider.removeClass("slick-dotted"), t.unslicked = !0, e || t.$slider.trigger("destroy", [t]);
  }, e.prototype.disableTransition = function (i) {
    var e = this,
        t = {};
    t[e.transitionType] = "", !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
  }, e.prototype.fadeSlide = function (i, e) {
    var t = this;
    !1 === t.cssTransitions ? (t.$slides.eq(i).css({
      zIndex: t.options.zIndex
    }), t.$slides.eq(i).animate({
      opacity: 1
    }, t.options.speed, t.options.easing, e)) : (t.applyTransition(i), t.$slides.eq(i).css({
      opacity: 1,
      zIndex: t.options.zIndex
    }), e && setTimeout(function () {
      t.disableTransition(i), e.call();
    }, t.options.speed));
  }, e.prototype.fadeSlideOut = function (i) {
    var e = this;
    !1 === e.cssTransitions ? e.$slides.eq(i).animate({
      opacity: 0,
      zIndex: e.options.zIndex - 2
    }, e.options.speed, e.options.easing) : (e.applyTransition(i), e.$slides.eq(i).css({
      opacity: 0,
      zIndex: e.options.zIndex - 2
    }));
  }, e.prototype.filterSlides = e.prototype.slickFilter = function (i) {
    var e = this;
    null !== i && (e.$slidesCache = e.$slides, e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.filter(i).appendTo(e.$slideTrack), e.reinit());
  }, e.prototype.focusHandler = function () {
    var e = this;
    e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*", function (t) {
      t.stopImmediatePropagation();
      var o = i(this);
      setTimeout(function () {
        e.options.pauseOnFocus && (e.focussed = o.is(":focus"), e.autoPlay());
      }, 0);
    });
  }, e.prototype.getCurrent = e.prototype.slickCurrentSlide = function () {
    return this.currentSlide;
  }, e.prototype.getDotCount = function () {
    var i = this,
        e = 0,
        t = 0,
        o = 0;
    if (!0 === i.options.infinite) {
      if (i.slideCount <= i.options.slidesToShow) ++o;else for (; e < i.slideCount;) {
        ++o, e = t + i.options.slidesToScroll, t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow;
      }
    } else if (!0 === i.options.centerMode) o = i.slideCount;else if (i.options.asNavFor) for (; e < i.slideCount;) {
      ++o, e = t + i.options.slidesToScroll, t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow;
    } else o = 1 + Math.ceil((i.slideCount - i.options.slidesToShow) / i.options.slidesToScroll);
    return o - 1;
  }, e.prototype.getLeft = function (i) {
    var e,
        t,
        o,
        s,
        n = this,
        r = 0;
    return n.slideOffset = 0, t = n.$slides.first().outerHeight(!0), !0 === n.options.infinite ? (n.slideCount > n.options.slidesToShow && (n.slideOffset = n.slideWidth * n.options.slidesToShow * -1, s = -1, !0 === n.options.vertical && !0 === n.options.centerMode && (2 === n.options.slidesToShow ? s = -1.5 : 1 === n.options.slidesToShow && (s = -2)), r = t * n.options.slidesToShow * s), n.slideCount % n.options.slidesToScroll != 0 && i + n.options.slidesToScroll > n.slideCount && n.slideCount > n.options.slidesToShow && (i > n.slideCount ? (n.slideOffset = (n.options.slidesToShow - (i - n.slideCount)) * n.slideWidth * -1, r = (n.options.slidesToShow - (i - n.slideCount)) * t * -1) : (n.slideOffset = n.slideCount % n.options.slidesToScroll * n.slideWidth * -1, r = n.slideCount % n.options.slidesToScroll * t * -1))) : i + n.options.slidesToShow > n.slideCount && (n.slideOffset = (i + n.options.slidesToShow - n.slideCount) * n.slideWidth, r = (i + n.options.slidesToShow - n.slideCount) * t), n.slideCount <= n.options.slidesToShow && (n.slideOffset = 0, r = 0), !0 === n.options.centerMode && n.slideCount <= n.options.slidesToShow ? n.slideOffset = n.slideWidth * Math.floor(n.options.slidesToShow) / 2 - n.slideWidth * n.slideCount / 2 : !0 === n.options.centerMode && !0 === n.options.infinite ? n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2) - n.slideWidth : !0 === n.options.centerMode && (n.slideOffset = 0, n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2)), e = !1 === n.options.vertical ? i * n.slideWidth * -1 + n.slideOffset : i * t * -1 + r, !0 === n.options.variableWidth && (o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow), e = !0 === n.options.rtl ? o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, !0 === n.options.centerMode && (o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow + 1), e = !0 === n.options.rtl ? o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0 : o[0] ? -1 * o[0].offsetLeft : 0, e += (n.$list.width() - o.outerWidth()) / 2)), e;
  }, e.prototype.getOption = e.prototype.slickGetOption = function (i) {
    return this.options[i];
  }, e.prototype.getNavigableIndexes = function () {
    var i,
        e = this,
        t = 0,
        o = 0,
        s = [];

    for (!1 === e.options.infinite ? i = e.slideCount : (t = -1 * e.options.slidesToScroll, o = -1 * e.options.slidesToScroll, i = 2 * e.slideCount); t < i;) {
      s.push(t), t = o + e.options.slidesToScroll, o += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow;
    }

    return s;
  }, e.prototype.getSlick = function () {
    return this;
  }, e.prototype.getSlideCount = function () {
    var e,
        t,
        o = this;
    return t = !0 === o.options.centerMode ? o.slideWidth * Math.floor(o.options.slidesToShow / 2) : 0, !0 === o.options.swipeToSlide ? (o.$slideTrack.find(".slick-slide").each(function (s, n) {
      if (n.offsetLeft - t + i(n).outerWidth() / 2 > -1 * o.swipeLeft) return e = n, !1;
    }), Math.abs(i(e).attr("data-slick-index") - o.currentSlide) || 1) : o.options.slidesToScroll;
  }, e.prototype.goTo = e.prototype.slickGoTo = function (i, e) {
    this.changeSlide({
      data: {
        message: "index",
        index: parseInt(i)
      }
    }, e);
  }, e.prototype.init = function (e) {
    var t = this;
    i(t.$slider).hasClass("slick-initialized") || (i(t.$slider).addClass("slick-initialized"), t.buildRows(), t.buildOut(), t.setProps(), t.startLoad(), t.loadSlider(), t.initializeEvents(), t.updateArrows(), t.updateDots(), t.checkResponsive(!0), t.focusHandler()), e && t.$slider.trigger("init", [t]), !0 === t.options.accessibility && t.initADA(), t.options.autoplay && (t.paused = !1, t.autoPlay());
  }, e.prototype.initADA = function () {
    var e = this,
        t = Math.ceil(e.slideCount / e.options.slidesToShow),
        o = e.getNavigableIndexes().filter(function (i) {
      return i >= 0 && i < e.slideCount;
    });
    e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
      "aria-hidden": "true",
      tabindex: "-1"
    }).find("a, input, button, select").attr({
      tabindex: "-1"
    }), null !== e.$dots && (e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function (t) {
      var s = o.indexOf(t);
      i(this).attr({
        role: "tabpanel",
        id: "slick-slide" + e.instanceUid + t,
        tabindex: -1
      }), -1 !== s && i(this).attr({
        "aria-describedby": "slick-slide-control" + e.instanceUid + s
      });
    }), e.$dots.attr("role", "tablist").find("li").each(function (s) {
      var n = o[s];
      i(this).attr({
        role: "presentation"
      }), i(this).find("button").first().attr({
        role: "tab",
        id: "slick-slide-control" + e.instanceUid + s,
        "aria-controls": "slick-slide" + e.instanceUid + n,
        "aria-label": s + 1 + " of " + t,
        "aria-selected": null,
        tabindex: "-1"
      });
    }).eq(e.currentSlide).find("button").attr({
      "aria-selected": "true",
      tabindex: "0"
    }).end());

    for (var s = e.currentSlide, n = s + e.options.slidesToShow; s < n; s++) {
      e.$slides.eq(s).attr("tabindex", 0);
    }

    e.activateADA();
  }, e.prototype.initArrowEvents = function () {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.off("click.slick").on("click.slick", {
      message: "previous"
    }, i.changeSlide), i.$nextArrow.off("click.slick").on("click.slick", {
      message: "next"
    }, i.changeSlide), !0 === i.options.accessibility && (i.$prevArrow.on("keydown.slick", i.keyHandler), i.$nextArrow.on("keydown.slick", i.keyHandler)));
  }, e.prototype.initDotEvents = function () {
    var e = this;
    !0 === e.options.dots && (i("li", e.$dots).on("click.slick", {
      message: "index"
    }, e.changeSlide), !0 === e.options.accessibility && e.$dots.on("keydown.slick", e.keyHandler)), !0 === e.options.dots && !0 === e.options.pauseOnDotsHover && i("li", e.$dots).on("mouseenter.slick", i.proxy(e.interrupt, e, !0)).on("mouseleave.slick", i.proxy(e.interrupt, e, !1));
  }, e.prototype.initSlideEvents = function () {
    var e = this;
    e.options.pauseOnHover && (e.$list.on("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.on("mouseleave.slick", i.proxy(e.interrupt, e, !1)));
  }, e.prototype.initializeEvents = function () {
    var e = this;
    e.initArrowEvents(), e.initDotEvents(), e.initSlideEvents(), e.$list.on("touchstart.slick mousedown.slick", {
      action: "start"
    }, e.swipeHandler), e.$list.on("touchmove.slick mousemove.slick", {
      action: "move"
    }, e.swipeHandler), e.$list.on("touchend.slick mouseup.slick", {
      action: "end"
    }, e.swipeHandler), e.$list.on("touchcancel.slick mouseleave.slick", {
      action: "end"
    }, e.swipeHandler), e.$list.on("click.slick", e.clickHandler), i(document).on(e.visibilityChange, i.proxy(e.visibility, e)), !0 === e.options.accessibility && e.$list.on("keydown.slick", e.keyHandler), !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler), i(window).on("orientationchange.slick.slick-" + e.instanceUid, i.proxy(e.orientationChange, e)), i(window).on("resize.slick.slick-" + e.instanceUid, i.proxy(e.resize, e)), i("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault), i(window).on("load.slick.slick-" + e.instanceUid, e.setPosition), i(e.setPosition);
  }, e.prototype.initUI = function () {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.show(), i.$nextArrow.show()), !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.show();
  }, e.prototype.keyHandler = function (i) {
    var e = this;
    i.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === i.keyCode && !0 === e.options.accessibility ? e.changeSlide({
      data: {
        message: !0 === e.options.rtl ? "next" : "previous"
      }
    }) : 39 === i.keyCode && !0 === e.options.accessibility && e.changeSlide({
      data: {
        message: !0 === e.options.rtl ? "previous" : "next"
      }
    }));
  }, e.prototype.lazyLoad = function () {
    function e(e) {
      i("img[data-lazy]", e).each(function () {
        var e = i(this),
            t = i(this).attr("data-lazy"),
            o = i(this).attr("data-srcset"),
            s = i(this).attr("data-sizes") || n.$slider.attr("data-sizes"),
            r = document.createElement("img");
        r.onload = function () {
          e.animate({
            opacity: 0
          }, 100, function () {
            o && (e.attr("srcset", o), s && e.attr("sizes", s)), e.attr("src", t).animate({
              opacity: 1
            }, 200, function () {
              e.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading");
            }), n.$slider.trigger("lazyLoaded", [n, e, t]);
          });
        }, r.onerror = function () {
          e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), n.$slider.trigger("lazyLoadError", [n, e, t]);
        }, r.src = t;
      });
    }

    var t,
        o,
        s,
        n = this;
    if (!0 === n.options.centerMode ? !0 === n.options.infinite ? s = (o = n.currentSlide + (n.options.slidesToShow / 2 + 1)) + n.options.slidesToShow + 2 : (o = Math.max(0, n.currentSlide - (n.options.slidesToShow / 2 + 1)), s = n.options.slidesToShow / 2 + 1 + 2 + n.currentSlide) : (o = n.options.infinite ? n.options.slidesToShow + n.currentSlide : n.currentSlide, s = Math.ceil(o + n.options.slidesToShow), !0 === n.options.fade && (o > 0 && o--, s <= n.slideCount && s++)), t = n.$slider.find(".slick-slide").slice(o, s), "anticipated" === n.options.lazyLoad) for (var r = o - 1, l = s, d = n.$slider.find(".slick-slide"), a = 0; a < n.options.slidesToScroll; a++) {
      r < 0 && (r = n.slideCount - 1), t = (t = t.add(d.eq(r))).add(d.eq(l)), r--, l++;
    }
    e(t), n.slideCount <= n.options.slidesToShow ? e(n.$slider.find(".slick-slide")) : n.currentSlide >= n.slideCount - n.options.slidesToShow ? e(n.$slider.find(".slick-cloned").slice(0, n.options.slidesToShow)) : 0 === n.currentSlide && e(n.$slider.find(".slick-cloned").slice(-1 * n.options.slidesToShow));
  }, e.prototype.loadSlider = function () {
    var i = this;
    i.setPosition(), i.$slideTrack.css({
      opacity: 1
    }), i.$slider.removeClass("slick-loading"), i.initUI(), "progressive" === i.options.lazyLoad && i.progressiveLazyLoad();
  }, e.prototype.next = e.prototype.slickNext = function () {
    this.changeSlide({
      data: {
        message: "next"
      }
    });
  }, e.prototype.orientationChange = function () {
    var i = this;
    i.checkResponsive(), i.setPosition();
  }, e.prototype.pause = e.prototype.slickPause = function () {
    var i = this;
    i.autoPlayClear(), i.paused = !0;
  }, e.prototype.play = e.prototype.slickPlay = function () {
    var i = this;
    i.autoPlay(), i.options.autoplay = !0, i.paused = !1, i.focussed = !1, i.interrupted = !1;
  }, e.prototype.postSlide = function (e) {
    var t = this;
    t.unslicked || (t.$slider.trigger("afterChange", [t, e]), t.animating = !1, t.slideCount > t.options.slidesToShow && t.setPosition(), t.swipeLeft = null, t.options.autoplay && t.autoPlay(), !0 === t.options.accessibility && (t.initADA(), t.options.focusOnChange && i(t.$slides.get(t.currentSlide)).attr("tabindex", 0).focus()));
  }, e.prototype.prev = e.prototype.slickPrev = function () {
    this.changeSlide({
      data: {
        message: "previous"
      }
    });
  }, e.prototype.preventDefault = function (i) {
    i.preventDefault();
  }, e.prototype.progressiveLazyLoad = function (e) {
    e = e || 1;
    var t,
        o,
        s,
        n,
        r,
        l = this,
        d = i("img[data-lazy]", l.$slider);
    d.length ? (t = d.first(), o = t.attr("data-lazy"), s = t.attr("data-srcset"), n = t.attr("data-sizes") || l.$slider.attr("data-sizes"), (r = document.createElement("img")).onload = function () {
      s && (t.attr("srcset", s), n && t.attr("sizes", n)), t.attr("src", o).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"), !0 === l.options.adaptiveHeight && l.setPosition(), l.$slider.trigger("lazyLoaded", [l, t, o]), l.progressiveLazyLoad();
    }, r.onerror = function () {
      e < 3 ? setTimeout(function () {
        l.progressiveLazyLoad(e + 1);
      }, 500) : (t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), l.$slider.trigger("lazyLoadError", [l, t, o]), l.progressiveLazyLoad());
    }, r.src = o) : l.$slider.trigger("allImagesLoaded", [l]);
  }, e.prototype.refresh = function (e) {
    var t,
        o,
        s = this;
    o = s.slideCount - s.options.slidesToShow, !s.options.infinite && s.currentSlide > o && (s.currentSlide = o), s.slideCount <= s.options.slidesToShow && (s.currentSlide = 0), t = s.currentSlide, s.destroy(!0), i.extend(s, s.initials, {
      currentSlide: t
    }), s.init(), e || s.changeSlide({
      data: {
        message: "index",
        index: t
      }
    }, !1);
  }, e.prototype.registerBreakpoints = function () {
    var e,
        t,
        o,
        s = this,
        n = s.options.responsive || null;

    if ("array" === i.type(n) && n.length) {
      s.respondTo = s.options.respondTo || "window";

      for (e in n) {
        if (o = s.breakpoints.length - 1, n.hasOwnProperty(e)) {
          for (t = n[e].breakpoint; o >= 0;) {
            s.breakpoints[o] && s.breakpoints[o] === t && s.breakpoints.splice(o, 1), o--;
          }

          s.breakpoints.push(t), s.breakpointSettings[t] = n[e].settings;
        }
      }

      s.breakpoints.sort(function (i, e) {
        return s.options.mobileFirst ? i - e : e - i;
      });
    }
  }, e.prototype.reinit = function () {
    var e = this;
    e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide"), e.slideCount = e.$slides.length, e.currentSlide >= e.slideCount && 0 !== e.currentSlide && (e.currentSlide = e.currentSlide - e.options.slidesToScroll), e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0), e.registerBreakpoints(), e.setProps(), e.setupInfinite(), e.buildArrows(), e.updateArrows(), e.initArrowEvents(), e.buildDots(), e.updateDots(), e.initDotEvents(), e.cleanUpSlideEvents(), e.initSlideEvents(), e.checkResponsive(!1, !0), !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler), e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0), e.setPosition(), e.focusHandler(), e.paused = !e.options.autoplay, e.autoPlay(), e.$slider.trigger("reInit", [e]);
  }, e.prototype.resize = function () {
    var e = this;
    i(window).width() !== e.windowWidth && (clearTimeout(e.windowDelay), e.windowDelay = window.setTimeout(function () {
      e.windowWidth = i(window).width(), e.checkResponsive(), e.unslicked || e.setPosition();
    }, 50));
  }, e.prototype.removeSlide = e.prototype.slickRemove = function (i, e, t) {
    var o = this;
    if (i = "boolean" == typeof i ? !0 === (e = i) ? 0 : o.slideCount - 1 : !0 === e ? --i : i, o.slideCount < 1 || i < 0 || i > o.slideCount - 1) return !1;
    o.unload(), !0 === t ? o.$slideTrack.children().remove() : o.$slideTrack.children(this.options.slide).eq(i).remove(), o.$slides = o.$slideTrack.children(this.options.slide), o.$slideTrack.children(this.options.slide).detach(), o.$slideTrack.append(o.$slides), o.$slidesCache = o.$slides, o.reinit();
  }, e.prototype.setCSS = function (i) {
    var e,
        t,
        o = this,
        s = {};
    !0 === o.options.rtl && (i = -i), e = "left" == o.positionProp ? Math.ceil(i) + "px" : "0px", t = "top" == o.positionProp ? Math.ceil(i) + "px" : "0px", s[o.positionProp] = i, !1 === o.transformsEnabled ? o.$slideTrack.css(s) : (s = {}, !1 === o.cssTransitions ? (s[o.animType] = "translate(" + e + ", " + t + ")", o.$slideTrack.css(s)) : (s[o.animType] = "translate3d(" + e + ", " + t + ", 0px)", o.$slideTrack.css(s)));
  }, e.prototype.setDimensions = function () {
    var i = this;
    !1 === i.options.vertical ? !0 === i.options.centerMode && i.$list.css({
      padding: "0px " + i.options.centerPadding
    }) : (i.$list.height(i.$slides.first().outerHeight(!0) * i.options.slidesToShow), !0 === i.options.centerMode && i.$list.css({
      padding: i.options.centerPadding + " 0px"
    })), i.listWidth = i.$list.width(), i.listHeight = i.$list.height(), !1 === i.options.vertical && !1 === i.options.variableWidth ? (i.slideWidth = Math.ceil(i.listWidth / i.options.slidesToShow), i.$slideTrack.width(Math.ceil(i.slideWidth * i.$slideTrack.children(".slick-slide").length))) : !0 === i.options.variableWidth ? i.$slideTrack.width(5e3 * i.slideCount) : (i.slideWidth = Math.ceil(i.listWidth), i.$slideTrack.height(Math.ceil(i.$slides.first().outerHeight(!0) * i.$slideTrack.children(".slick-slide").length)));
    var e = i.$slides.first().outerWidth(!0) - i.$slides.first().width();
    !1 === i.options.variableWidth && i.$slideTrack.children(".slick-slide").width(i.slideWidth - e);
  }, e.prototype.setFade = function () {
    var e,
        t = this;
    t.$slides.each(function (o, s) {
      e = t.slideWidth * o * -1, !0 === t.options.rtl ? i(s).css({
        position: "relative",
        right: e,
        top: 0,
        zIndex: t.options.zIndex - 2,
        opacity: 0
      }) : i(s).css({
        position: "relative",
        left: e,
        top: 0,
        zIndex: t.options.zIndex - 2,
        opacity: 0
      });
    }), t.$slides.eq(t.currentSlide).css({
      zIndex: t.options.zIndex - 1,
      opacity: 1
    });
  }, e.prototype.setHeight = function () {
    var i = this;

    if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
      var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
      i.$list.css("height", e);
    }
  }, e.prototype.setOption = e.prototype.slickSetOption = function () {
    var e,
        t,
        o,
        s,
        n,
        r = this,
        l = !1;
    if ("object" === i.type(arguments[0]) ? (o = arguments[0], l = arguments[1], n = "multiple") : "string" === i.type(arguments[0]) && (o = arguments[0], s = arguments[1], l = arguments[2], "responsive" === arguments[0] && "array" === i.type(arguments[1]) ? n = "responsive" : void 0 !== arguments[1] && (n = "single")), "single" === n) r.options[o] = s;else if ("multiple" === n) i.each(o, function (i, e) {
      r.options[i] = e;
    });else if ("responsive" === n) for (t in s) {
      if ("array" !== i.type(r.options.responsive)) r.options.responsive = [s[t]];else {
        for (e = r.options.responsive.length - 1; e >= 0;) {
          r.options.responsive[e].breakpoint === s[t].breakpoint && r.options.responsive.splice(e, 1), e--;
        }

        r.options.responsive.push(s[t]);
      }
    }
    l && (r.unload(), r.reinit());
  }, e.prototype.setPosition = function () {
    var i = this;
    i.setDimensions(), i.setHeight(), !1 === i.options.fade ? i.setCSS(i.getLeft(i.currentSlide)) : i.setFade(), i.$slider.trigger("setPosition", [i]);
  }, e.prototype.setProps = function () {
    var i = this,
        e = document.body.style;
    i.positionProp = !0 === i.options.vertical ? "top" : "left", "top" === i.positionProp ? i.$slider.addClass("slick-vertical") : i.$slider.removeClass("slick-vertical"), void 0 === e.WebkitTransition && void 0 === e.MozTransition && void 0 === e.msTransition || !0 === i.options.useCSS && (i.cssTransitions = !0), i.options.fade && ("number" == typeof i.options.zIndex ? i.options.zIndex < 3 && (i.options.zIndex = 3) : i.options.zIndex = i.defaults.zIndex), void 0 !== e.OTransform && (i.animType = "OTransform", i.transformType = "-o-transform", i.transitionType = "OTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)), void 0 !== e.MozTransform && (i.animType = "MozTransform", i.transformType = "-moz-transform", i.transitionType = "MozTransition", void 0 === e.perspectiveProperty && void 0 === e.MozPerspective && (i.animType = !1)), void 0 !== e.webkitTransform && (i.animType = "webkitTransform", i.transformType = "-webkit-transform", i.transitionType = "webkitTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)), void 0 !== e.msTransform && (i.animType = "msTransform", i.transformType = "-ms-transform", i.transitionType = "msTransition", void 0 === e.msTransform && (i.animType = !1)), void 0 !== e.transform && !1 !== i.animType && (i.animType = "transform", i.transformType = "transform", i.transitionType = "transition"), i.transformsEnabled = i.options.useTransform && null !== i.animType && !1 !== i.animType;
  }, e.prototype.setSlideClasses = function (i) {
    var e,
        t,
        o,
        s,
        n = this;

    if (t = n.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"), n.$slides.eq(i).addClass("slick-current"), !0 === n.options.centerMode) {
      var r = n.options.slidesToShow % 2 == 0 ? 1 : 0;
      e = Math.floor(n.options.slidesToShow / 2), !0 === n.options.infinite && (i >= e && i <= n.slideCount - 1 - e ? n.$slides.slice(i - e + r, i + e + 1).addClass("slick-active").attr("aria-hidden", "false") : (o = n.options.slidesToShow + i, t.slice(o - e + 1 + r, o + e + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === i ? t.eq(t.length - 1 - n.options.slidesToShow).addClass("slick-center") : i === n.slideCount - 1 && t.eq(n.options.slidesToShow).addClass("slick-center")), n.$slides.eq(i).addClass("slick-center");
    } else i >= 0 && i <= n.slideCount - n.options.slidesToShow ? n.$slides.slice(i, i + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : t.length <= n.options.slidesToShow ? t.addClass("slick-active").attr("aria-hidden", "false") : (s = n.slideCount % n.options.slidesToShow, o = !0 === n.options.infinite ? n.options.slidesToShow + i : i, n.options.slidesToShow == n.options.slidesToScroll && n.slideCount - i < n.options.slidesToShow ? t.slice(o - (n.options.slidesToShow - s), o + s).addClass("slick-active").attr("aria-hidden", "false") : t.slice(o, o + n.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false"));

    "ondemand" !== n.options.lazyLoad && "anticipated" !== n.options.lazyLoad || n.lazyLoad();
  }, e.prototype.setupInfinite = function () {
    var e,
        t,
        o,
        s = this;

    if (!0 === s.options.fade && (s.options.centerMode = !1), !0 === s.options.infinite && !1 === s.options.fade && (t = null, s.slideCount > s.options.slidesToShow)) {
      for (o = !0 === s.options.centerMode ? s.options.slidesToShow + 1 : s.options.slidesToShow, e = s.slideCount; e > s.slideCount - o; e -= 1) {
        t = e - 1, i(s.$slides[t]).clone(!0).attr("id", "").attr("data-slick-index", t - s.slideCount).prependTo(s.$slideTrack).addClass("slick-cloned");
      }

      for (e = 0; e < o + s.slideCount; e += 1) {
        t = e, i(s.$slides[t]).clone(!0).attr("id", "").attr("data-slick-index", t + s.slideCount).appendTo(s.$slideTrack).addClass("slick-cloned");
      }

      s.$slideTrack.find(".slick-cloned").find("[id]").each(function () {
        i(this).attr("id", "");
      });
    }
  }, e.prototype.interrupt = function (i) {
    var e = this;
    i || e.autoPlay(), e.interrupted = i;
  }, e.prototype.selectHandler = function (e) {
    var t = this,
        o = i(e.target).is(".slick-slide") ? i(e.target) : i(e.target).parents(".slick-slide"),
        s = parseInt(o.attr("data-slick-index"));
    s || (s = 0), t.slideCount <= t.options.slidesToShow ? t.slideHandler(s, !1, !0) : t.slideHandler(s);
  }, e.prototype.slideHandler = function (i, e, t) {
    var o,
        s,
        n,
        r,
        l,
        d = null,
        a = this;
    if (e = e || !1, !(!0 === a.animating && !0 === a.options.waitForAnimate || !0 === a.options.fade && a.currentSlide === i)) if (!1 === e && a.asNavFor(i), o = i, d = a.getLeft(o), r = a.getLeft(a.currentSlide), a.currentLeft = null === a.swipeLeft ? r : a.swipeLeft, !1 === a.options.infinite && !1 === a.options.centerMode && (i < 0 || i > a.getDotCount() * a.options.slidesToScroll)) !1 === a.options.fade && (o = a.currentSlide, !0 !== t ? a.animateSlide(r, function () {
      a.postSlide(o);
    }) : a.postSlide(o));else if (!1 === a.options.infinite && !0 === a.options.centerMode && (i < 0 || i > a.slideCount - a.options.slidesToScroll)) !1 === a.options.fade && (o = a.currentSlide, !0 !== t ? a.animateSlide(r, function () {
      a.postSlide(o);
    }) : a.postSlide(o));else {
      if (a.options.autoplay && clearInterval(a.autoPlayTimer), s = o < 0 ? a.slideCount % a.options.slidesToScroll != 0 ? a.slideCount - a.slideCount % a.options.slidesToScroll : a.slideCount + o : o >= a.slideCount ? a.slideCount % a.options.slidesToScroll != 0 ? 0 : o - a.slideCount : o, a.animating = !0, a.$slider.trigger("beforeChange", [a, a.currentSlide, s]), n = a.currentSlide, a.currentSlide = s, a.setSlideClasses(a.currentSlide), a.options.asNavFor && (l = (l = a.getNavTarget()).slick("getSlick")).slideCount <= l.options.slidesToShow && l.setSlideClasses(a.currentSlide), a.updateDots(), a.updateArrows(), !0 === a.options.fade) return !0 !== t ? (a.fadeSlideOut(n), a.fadeSlide(s, function () {
        a.postSlide(s);
      })) : a.postSlide(s), void a.animateHeight();
      !0 !== t ? a.animateSlide(d, function () {
        a.postSlide(s);
      }) : a.postSlide(s);
    }
  }, e.prototype.startLoad = function () {
    var i = this;
    !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.hide(), i.$nextArrow.hide()), !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.hide(), i.$slider.addClass("slick-loading");
  }, e.prototype.swipeDirection = function () {
    var i,
        e,
        t,
        o,
        s = this;
    return i = s.touchObject.startX - s.touchObject.curX, e = s.touchObject.startY - s.touchObject.curY, t = Math.atan2(e, i), (o = Math.round(180 * t / Math.PI)) < 0 && (o = 360 - Math.abs(o)), o <= 45 && o >= 0 ? !1 === s.options.rtl ? "left" : "right" : o <= 360 && o >= 315 ? !1 === s.options.rtl ? "left" : "right" : o >= 135 && o <= 225 ? !1 === s.options.rtl ? "right" : "left" : !0 === s.options.verticalSwiping ? o >= 35 && o <= 135 ? "down" : "up" : "vertical";
  }, e.prototype.swipeEnd = function (i) {
    var e,
        t,
        o = this;
    if (o.dragging = !1, o.swiping = !1, o.scrolling) return o.scrolling = !1, !1;
    if (o.interrupted = !1, o.shouldClick = !(o.touchObject.swipeLength > 10), void 0 === o.touchObject.curX) return !1;

    if (!0 === o.touchObject.edgeHit && o.$slider.trigger("edge", [o, o.swipeDirection()]), o.touchObject.swipeLength >= o.touchObject.minSwipe) {
      switch (t = o.swipeDirection()) {
        case "left":
        case "down":
          e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide + o.getSlideCount()) : o.currentSlide + o.getSlideCount(), o.currentDirection = 0;
          break;

        case "right":
        case "up":
          e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide - o.getSlideCount()) : o.currentSlide - o.getSlideCount(), o.currentDirection = 1;
      }

      "vertical" != t && (o.slideHandler(e), o.touchObject = {}, o.$slider.trigger("swipe", [o, t]));
    } else o.touchObject.startX !== o.touchObject.curX && (o.slideHandler(o.currentSlide), o.touchObject = {});
  }, e.prototype.swipeHandler = function (i) {
    var e = this;
    if (!(!1 === e.options.swipe || "ontouchend" in document && !1 === e.options.swipe || !1 === e.options.draggable && -1 !== i.type.indexOf("mouse"))) switch (e.touchObject.fingerCount = i.originalEvent && void 0 !== i.originalEvent.touches ? i.originalEvent.touches.length : 1, e.touchObject.minSwipe = e.listWidth / e.options.touchThreshold, !0 === e.options.verticalSwiping && (e.touchObject.minSwipe = e.listHeight / e.options.touchThreshold), i.data.action) {
      case "start":
        e.swipeStart(i);
        break;

      case "move":
        e.swipeMove(i);
        break;

      case "end":
        e.swipeEnd(i);
    }
  }, e.prototype.swipeMove = function (i) {
    var e,
        t,
        o,
        s,
        n,
        r,
        l = this;
    return n = void 0 !== i.originalEvent ? i.originalEvent.touches : null, !(!l.dragging || l.scrolling || n && 1 !== n.length) && (e = l.getLeft(l.currentSlide), l.touchObject.curX = void 0 !== n ? n[0].pageX : i.clientX, l.touchObject.curY = void 0 !== n ? n[0].pageY : i.clientY, l.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(l.touchObject.curX - l.touchObject.startX, 2))), r = Math.round(Math.sqrt(Math.pow(l.touchObject.curY - l.touchObject.startY, 2))), !l.options.verticalSwiping && !l.swiping && r > 4 ? (l.scrolling = !0, !1) : (!0 === l.options.verticalSwiping && (l.touchObject.swipeLength = r), t = l.swipeDirection(), void 0 !== i.originalEvent && l.touchObject.swipeLength > 4 && (l.swiping = !0, i.preventDefault()), s = (!1 === l.options.rtl ? 1 : -1) * (l.touchObject.curX > l.touchObject.startX ? 1 : -1), !0 === l.options.verticalSwiping && (s = l.touchObject.curY > l.touchObject.startY ? 1 : -1), o = l.touchObject.swipeLength, l.touchObject.edgeHit = !1, !1 === l.options.infinite && (0 === l.currentSlide && "right" === t || l.currentSlide >= l.getDotCount() && "left" === t) && (o = l.touchObject.swipeLength * l.options.edgeFriction, l.touchObject.edgeHit = !0), !1 === l.options.vertical ? l.swipeLeft = e + o * s : l.swipeLeft = e + o * (l.$list.height() / l.listWidth) * s, !0 === l.options.verticalSwiping && (l.swipeLeft = e + o * s), !0 !== l.options.fade && !1 !== l.options.touchMove && (!0 === l.animating ? (l.swipeLeft = null, !1) : void l.setCSS(l.swipeLeft))));
  }, e.prototype.swipeStart = function (i) {
    var e,
        t = this;
    if (t.interrupted = !0, 1 !== t.touchObject.fingerCount || t.slideCount <= t.options.slidesToShow) return t.touchObject = {}, !1;
    void 0 !== i.originalEvent && void 0 !== i.originalEvent.touches && (e = i.originalEvent.touches[0]), t.touchObject.startX = t.touchObject.curX = void 0 !== e ? e.pageX : i.clientX, t.touchObject.startY = t.touchObject.curY = void 0 !== e ? e.pageY : i.clientY, t.dragging = !0;
  }, e.prototype.unfilterSlides = e.prototype.slickUnfilter = function () {
    var i = this;
    null !== i.$slidesCache && (i.unload(), i.$slideTrack.children(this.options.slide).detach(), i.$slidesCache.appendTo(i.$slideTrack), i.reinit());
  }, e.prototype.unload = function () {
    var e = this;
    i(".slick-cloned", e.$slider).remove(), e.$dots && e.$dots.remove(), e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(), e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(), e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "");
  }, e.prototype.unslick = function (i) {
    var e = this;
    e.$slider.trigger("unslick", [e, i]), e.destroy();
  }, e.prototype.updateArrows = function () {
    var i = this;
    Math.floor(i.options.slidesToShow / 2), !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && !i.options.infinite && (i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === i.currentSlide ? (i.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : i.currentSlide >= i.slideCount - i.options.slidesToShow && !1 === i.options.centerMode ? (i.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : i.currentSlide >= i.slideCount - 1 && !0 === i.options.centerMode && (i.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")));
  }, e.prototype.updateDots = function () {
    var i = this;
    null !== i.$dots && (i.$dots.find("li").removeClass("slick-active").end(), i.$dots.find("li").eq(Math.floor(i.currentSlide / i.options.slidesToScroll)).addClass("slick-active"));
  }, e.prototype.visibility = function () {
    var i = this;
    i.options.autoplay && (document[i.hidden] ? i.interrupted = !0 : i.interrupted = !1);
  }, i.fn.slick = function () {
    var i,
        t,
        o = this,
        s = arguments[0],
        n = Array.prototype.slice.call(arguments, 1),
        r = o.length;

    for (i = 0; i < r; i++) {
      if ("object" == _typeof(s) || void 0 === s ? o[i].slick = new e(o[i], s) : t = o[i].slick[s].apply(o[i].slick, n), void 0 !== t) return t;
    }

    return o;
  };
});})(jQuery);
(function($){"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*! lazysizes - v3.0.0-rc4 */

/*
  lazysizes does not need any JS configuration: Add the class "lazyload"
  to your images/iframes in conjunction with a data-src and/or data-srcset attribute.
  Optionally you can also add a src attribute with a low quality image:
*/
!function (a, b) {
  var c = b(a, a.document);
  a.lazySizes = c, "object" == (typeof module === "undefined" ? "undefined" : _typeof(module)) && module.exports && (module.exports = c);
}(window, function (a, b) {
  "use strict";

  if (b.getElementsByClassName) {
    var c,
        d = b.documentElement,
        e = a.Date,
        f = a.HTMLPictureElement,
        g = "addEventListener",
        h = "getAttribute",
        i = a[g],
        j = a.setTimeout,
        k = a.requestAnimationFrame || j,
        l = a.requestIdleCallback,
        m = /^picture$/i,
        n = ["load", "error", "lazyincluded", "_lazyloaded"],
        o = {},
        p = Array.prototype.forEach,
        q = function q(a, b) {
      return o[b] || (o[b] = new RegExp("(\\s|^)" + b + "(\\s|$)")), o[b].test(a[h]("class") || "") && o[b];
    },
        r = function r(a, b) {
      q(a, b) || a.setAttribute("class", (a[h]("class") || "").trim() + " " + b);
    },
        s = function s(a, b) {
      var c;
      (c = q(a, b)) && a.setAttribute("class", (a[h]("class") || "").replace(c, " "));
    },
        t = function t(a, b, c) {
      var d = c ? g : "removeEventListener";
      c && t(a, b), n.forEach(function (c) {
        a[d](c, b);
      });
    },
        u = function u(a, c, d, e, f) {
      var g = b.createEvent("CustomEvent");
      return g.initCustomEvent(c, !e, !f, d || {}), a.dispatchEvent(g), g;
    },
        v = function v(b, d) {
      var e;
      !f && (e = a.picturefill || c.pf) ? e({
        reevaluate: !0,
        elements: [b]
      }) : d && d.src && (b.src = d.src);
    },
        w = function w(a, b) {
      return (getComputedStyle(a, null) || {})[b];
    },
        x = function x(a, b, d) {
      for (d = d || a.offsetWidth; d < c.minSize && b && !a._lazysizesWidth;) {
        d = b.offsetWidth, b = b.parentNode;
      }

      return d;
    },
        y = function () {
      var a,
          c,
          d = [],
          e = [],
          f = d,
          g = function g() {
        var b = f;

        for (f = d.length ? e : d, a = !0, c = !1; b.length;) {
          b.shift()();
        }

        a = !1;
      },
          h = function h(d, e) {
        a && !e ? d.apply(this, arguments) : (f.push(d), c || (c = !0, (b.hidden ? j : k)(g)));
      };

      return h._lsFlush = g, h;
    }(),
        z = function z(a, b) {
      return b ? function () {
        y(a);
      } : function () {
        var b = this,
            c = arguments;
        y(function () {
          a.apply(b, c);
        });
      };
    },
        A = function A(a) {
      var b,
          c = 0,
          d = 125,
          f = 666,
          g = f,
          h = function h() {
        b = !1, c = e.now(), a();
      },
          i = l ? function () {
        l(h, {
          timeout: g
        }), g !== f && (g = f);
      } : z(function () {
        j(h);
      }, !0);

      return function (a) {
        var f;
        (a = a === !0) && (g = 44), b || (b = !0, f = d - (e.now() - c), 0 > f && (f = 0), a || 9 > f && l ? i() : j(i, f));
      };
    },
        B = function B(a) {
      var b,
          c,
          d = 99,
          f = function f() {
        b = null, a();
      },
          g = function g() {
        var a = e.now() - c;
        d > a ? j(g, d - a) : (l || f)(f);
      };

      return function () {
        c = e.now(), b || (b = j(g, d));
      };
    },
        C = function () {
      var f,
          k,
          l,
          n,
          o,
          x,
          C,
          E,
          F,
          G,
          H,
          I,
          J,
          K,
          L,
          M = /^img$/i,
          N = /^iframe$/i,
          O = "onscroll" in a && !/glebot/.test(navigator.userAgent),
          P = 0,
          Q = 0,
          R = 0,
          S = -1,
          T = function T(a) {
        R--, a && a.target && t(a.target, T), (!a || 0 > R || !a.target) && (R = 0);
      },
          U = function U(a, c) {
        var e,
            f = a,
            g = "hidden" == w(b.body, "visibility") || "hidden" != w(a, "visibility");

        for (F -= c, I += c, G -= c, H += c; g && (f = f.offsetParent) && f != b.body && f != d;) {
          g = (w(f, "opacity") || 1) > 0, g && "visible" != w(f, "overflow") && (e = f.getBoundingClientRect(), g = H > e.left && G < e.right && I > e.top - 1 && F < e.bottom + 1);
        }

        return g;
      },
          V = function V() {
        var a, e, g, i, j, m, n, p, q;

        if ((o = c.loadMode) && 8 > R && (a = f.length)) {
          e = 0, S++, null == K && ("expand" in c || (c.expand = d.clientHeight > 500 && d.clientWidth > 500 ? 500 : 370), J = c.expand, K = J * c.expFactor), K > Q && 1 > R && S > 2 && o > 2 && !b.hidden ? (Q = K, S = 0) : Q = o > 1 && S > 1 && 6 > R ? J : P;

          for (; a > e; e++) {
            if (f[e] && !f[e]._lazyRace) if (O) {
              if ((p = f[e][h]("data-expand")) && (m = 1 * p) || (m = Q), q !== m && (C = innerWidth + m * L, E = innerHeight + m, n = -1 * m, q = m), g = f[e].getBoundingClientRect(), (I = g.bottom) >= n && (F = g.top) <= E && (H = g.right) >= n * L && (G = g.left) <= C && (I || H || G || F) && (l && 3 > R && !p && (3 > o || 4 > S) || U(f[e], m))) {
                if (ba(f[e]), j = !0, R > 9) break;
              } else !j && l && !i && 4 > R && 4 > S && o > 2 && (k[0] || c.preloadAfterLoad) && (k[0] || !p && (I || H || G || F || "auto" != f[e][h](c.sizesAttr))) && (i = k[0] || f[e]);
            } else ba(f[e]);
          }

          i && !j && ba(i);
        }
      },
          W = A(V),
          X = function X(a) {
        r(a.target, c.loadedClass), s(a.target, c.loadingClass), t(a.target, Z);
      },
          Y = z(X),
          Z = function Z(a) {
        Y({
          target: a.target
        });
      },
          $ = function $(a, b) {
        try {
          a.contentWindow.location.replace(b);
        } catch (c) {
          a.src = b;
        }
      },
          _ = function _(a) {
        var b,
            d,
            e = a[h](c.srcsetAttr);
        (b = c.customMedia[a[h]("data-media") || a[h]("media")]) && a.setAttribute("media", b), e && a.setAttribute("srcset", e), b && (d = a.parentNode, d.insertBefore(a.cloneNode(), a), d.removeChild(a));
      },
          aa = z(function (a, b, d, e, f) {
        var g, i, k, l, o, q;
        (o = u(a, "lazybeforeunveil", b)).defaultPrevented || (e && (d ? r(a, c.autosizesClass) : a.setAttribute("sizes", e)), i = a[h](c.srcsetAttr), g = a[h](c.srcAttr), f && (k = a.parentNode, l = k && m.test(k.nodeName || "")), q = b.firesLoad || "src" in a && (i || g || l), o = {
          target: a
        }, q && (t(a, T, !0), clearTimeout(n), n = j(T, 2500), r(a, c.loadingClass), t(a, Z, !0)), l && p.call(k.getElementsByTagName("source"), _), i ? a.setAttribute("srcset", i) : g && !l && (N.test(a.nodeName) ? $(a, g) : a.src = g), (i || l) && v(a, {
          src: g
        })), a._lazyRace && delete a._lazyRace, s(a, c.lazyClass), y(function () {
          (!q || a.complete && a.naturalWidth > 1) && (q ? T(o) : R--, X(o));
        }, !0);
      }),
          ba = function ba(a) {
        var b,
            d = M.test(a.nodeName),
            e = d && (a[h](c.sizesAttr) || a[h]("sizes")),
            f = "auto" == e;
        (!f && l || !d || !a.src && !a.srcset || a.complete || q(a, c.errorClass)) && (b = u(a, "lazyunveilread").detail, f && D.updateElem(a, !0, a.offsetWidth), a._lazyRace = !0, R++, aa(a, b, f, e, d));
      },
          ca = function ca() {
        if (!l) {
          if (e.now() - x < 999) return void j(ca, 999);
          var a = B(function () {
            c.loadMode = 3, W();
          });
          l = !0, c.loadMode = 3, W(), i("scroll", function () {
            3 == c.loadMode && (c.loadMode = 2), a();
          }, !0);
        }
      };

      return {
        _: function _() {
          x = e.now(), f = b.getElementsByClassName(c.lazyClass), k = b.getElementsByClassName(c.lazyClass + " " + c.preloadClass), L = c.hFac, i("scroll", W, !0), i("resize", W, !0), a.MutationObserver ? new MutationObserver(W).observe(d, {
            childList: !0,
            subtree: !0,
            attributes: !0
          }) : (d[g]("DOMNodeInserted", W, !0), d[g]("DOMAttrModified", W, !0), setInterval(W, 999)), i("hashchange", W, !0), ["focus", "mouseover", "click", "load", "transitionend", "animationend", "webkitAnimationEnd"].forEach(function (a) {
            b[g](a, W, !0);
          }), /d$|^c/.test(b.readyState) ? ca() : (i("load", ca), b[g]("DOMContentLoaded", W), j(ca, 2e4)), f.length ? (V(), y._lsFlush()) : W();
        },
        checkElems: W,
        unveil: ba
      };
    }(),
        D = function () {
      var a,
          d = z(function (a, b, c, d) {
        var e, f, g;
        if (a._lazysizesWidth = d, d += "px", a.setAttribute("sizes", d), m.test(b.nodeName || "")) for (e = b.getElementsByTagName("source"), f = 0, g = e.length; g > f; f++) {
          e[f].setAttribute("sizes", d);
        }
        c.detail.dataAttr || v(a, c.detail);
      }),
          e = function e(a, b, c) {
        var e,
            f = a.parentNode;
        f && (c = x(a, f, c), e = u(a, "lazybeforesizes", {
          width: c,
          dataAttr: !!b
        }), e.defaultPrevented || (c = e.detail.width, c && c !== a._lazysizesWidth && d(a, f, e, c)));
      },
          f = function f() {
        var b,
            c = a.length;
        if (c) for (b = 0; c > b; b++) {
          e(a[b]);
        }
      },
          g = B(f);

      return {
        _: function _() {
          a = b.getElementsByClassName(c.autosizesClass), i("resize", g);
        },
        checkElems: g,
        updateElem: e
      };
    }(),
        E = function E() {
      E.i || (E.i = !0, D._(), C._());
    };

    return function () {
      var b,
          d = {
        lazyClass: "lazyload",
        loadedClass: "lazyloaded",
        loadingClass: "lazyloading",
        preloadClass: "lazypreload",
        errorClass: "lazyerror",
        autosizesClass: "lazyautosizes",
        srcAttr: "data-src",
        srcsetAttr: "data-srcset",
        sizesAttr: "data-sizes",
        minSize: 40,
        customMedia: {},
        init: !0,
        expFactor: 1.5,
        hFac: .8,
        loadMode: 2
      };
      c = a.lazySizesConfig || a.lazysizesConfig || {};

      for (b in d) {
        b in c || (c[b] = d[b]);
      }

      a.lazySizesConfig = c, j(function () {
        c.init && E();
      });
    }(), {
      cfg: c,
      autoSizer: D,
      loader: C,
      init: E,
      uP: v,
      aC: r,
      rC: s,
      hC: q,
      fire: u,
      gW: x,
      rAF: y
    };
  }
});})(jQuery);