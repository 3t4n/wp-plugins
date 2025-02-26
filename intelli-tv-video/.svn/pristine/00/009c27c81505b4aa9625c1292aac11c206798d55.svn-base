! function (e) {
    function t(r) {
        if (n[r]) return n[r].exports;
        var a = n[r] = {
            i: r,
            l: !1,
            exports: {}
        };
        return e[r].call(a.exports, a, a.exports, t), a.l = !0, a.exports
    }
    var n = {};
    t.m = e, t.c = n, t.d = function (e, n, r) {
        t.o(e, n) || Object.defineProperty(e, n, {
            configurable: !1,
            enumerable: !0,
            get: r
        })
    }, t.n = function (e) {
        var n = e && e.__esModule ? function () {
            return e.default
        } : function () {
            return e
        };
        return t.d(n, "a", n), n
    }, t.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, t.p = "", t(t.s = 0)
}([function (e, t, n) {
    "use strict";
    Object.defineProperty(t, "__esModule", {
        value: !0
    });
    n(1)
}, function (e, t, n) {
    "use strict";
    var r = n(2),
        a = (n.n(r), n(3)),
        l = (n.n(a), n(4)),
        i = Object.assign || function (e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = arguments[t];
                for (var r in n) Object.prototype.hasOwnProperty.call(n, r) && (e[r] = n[r])
            }
            return e
        },
        __ = wp.i18n.__,
        o = wp.element.Fragment,
        c = wp.components.Placeholder;
        
        var inlineBlockIframeSrc = '';
        const intelliIcon = wp.element.createElement('svg', {
            xmlns: "http://www.w3.org/2000/SVG",
            viewBox: "0 0 291.05 308"
        }, wp.element.createElement("path", {
            fill: "#0084ff",
            transform:"translate(-3 -1.67)",
            d: "M3,81V239.73a3.54,3.54,0,0,0,5.56,2.87l64.93-44.87A3.47,3.47,0,0,0,75,194.86V125.93A3.5,3.5,0,0,0,73.48,123L8.56,78.18A3.54,3.54,0,0,0,3,81Z"
        }), wp.element.createElement("path", {
            fill: "#0084ff",
            transform:"translate(-3 -1.67)",
            d: "M9.81,45.73,243,200.89a6.55,6.55,0,0,0,7.73-.35l33.07-26.66s23.17-16.19,0-39.12C261.19,112.43,101.62,15.9,93.29,10.86a6.74,6.74,0,0,1-.62-.42c-2.8-2.15-26-18.75-52.87.22C23.07,22.48,13.79,31.08,9,36.19a6.39,6.39,0,0,0,.84,9.54Z"
        }), wp.element.createElement("path", {
            fill: "#0084ff",
            transform:"translate(-3 -1.67)",
            d: "M167.85,177l52.78,34.82a4.72,4.72,0,0,1,.07,7.86L102.63,300.58l-.26.19c-1.92,1.52-25.43,19.29-48.94-.1l-31.33-23a4.73,4.73,0,0,1,.19-7.77L162.52,177A4.83,4.83,0,0,1,167.85,177Z"
        }));

        const externalIcon = wp.element.createElement('svg', {
            xmlns: "http://www.w3.org/2000/SVG",
            viewBox: "0 0 24 24",
            className:"intellitv-external-link-icon"
        }, wp.element.createElement("path", {
            d: "M18.2 17c0 .7-.6 1.2-1.2 1.2H7c-.7 0-1.2-.6-1.2-1.2V7c0-.7.6-1.2 1.2-1.2h3.2V4.2H7C5.5 4.2 4.2 5.5 4.2 7v10c0 1.5 1.2 2.8 2.8 2.8h10c1.5 0 2.8-1.2 2.8-2.8v-3.6h-1.5V17zM14.9 3v1.5h3.7l-6.4 6.4 1.1 1.1 6.4-6.4v3.7h1.5V3h-6.3z"
        }));

    (0, wp.blocks.registerBlockType)("intellitv/intellitv-iframe-block-gutenberg", {
        title: __("Intelli TV video", "intellitv-iframe-block-gutenberg"),
        description: __("Easily insert an Intelli TV video to your WordPress blog or site by pasting a share URL in your editor.", "intellitv-iframe-block-gutenberg"),
        keywords: [__("iframe"), __("external")],
        category: "embed",
        icon: intelliIcon,
        supports: {
            anchor: !0,
            className: !1,
            customClassName: !0,
            align: ["full"]
        },
        attributes: {
            iframeSrc: {
                type: "string"
            },
            iframeWidth: {
                type: "string",
                default:"100%"
            },
            iframeHeight: {
                type: "string",
                default:"auto"
            },
            iframepadding: {
                type: "string",
                default:"0px"
            },
            iframemargin: {
                type: "string",
                default:"0px"
            },
            allowFullscreen: {
                type: "boolean",
                default:true
            },
            responsive: {
                type: "boolean",
                default:true
            },
            allowaccelerometer: {
                type: "boolean",
                default:true
            },
            autoplay: {
                type: "boolean",
                default:true
            },
            encryptedmedia: {
                type: "boolean",
                default:true
            },
            gyroscope: {
                type: "boolean",
                default:true
            },
            useImportant: {
                type: "boolean"
            }
        },
        edit: function (e) {
            
            function updateContent(event) {
                // e.setAttributes({iframeSrc: event.target.value})
                inlineBlockIframeSrc = event.target.value;
            }
            
            function inlineBlockSubmit(){
                e.setAttributes({iframeSrc: inlineBlockIframeSrc});
            }
            
            function iframeLoaded(){
                
            }
            
            var allows_attributes = '';
            var t = e.attributes,
                n = [t.className];
            "full" == t.align && n.push("alignfull");
            var r = { /* iframe styles */
                width: "100%",
                maxWidth: "100%",
                height: "auto",
                padding: "0px",
                margin: "0px"
            }, a = {},
            er = {  /* embed styles */
                position:"relative",
                width:"100%",
                display:"inline-block"
            },
            wr = { /* wrapper styles */
                display:"inline-block",
                width:"100%",
                position:"relative"
            };
            if(t.responsive){
                r.position = "absolute";
                r.top = "0";
                r.left = "0";
                r.height = "100%"; 
                er.position = "relative",
                er.paddingBottom = "56.25%", 
                er.height = 10, 
                er.overflow = "hidden",
                er.maxWidth = "100%"
            }else{
                /* then user custom settings */
                if( t.iframeWidth && isNaN(t.iframeWidth)){
                    r.width = wr.width = t.iframeWidth;
                }else if( t.iframeWidth && t.iframeWidth !="auto" ){
                     r.width = wr.width = t.iframeWidth+"px";
                }
                if( t.iframeWidth && isNaN(t.iframeWidth)){
                    r.maxWidth = wr.maxWidth = t.iframeWidth;  
                }else if( t.iframeWidth && t.iframeWidth !="auto" ){
                     r.maxWidth = wr.maxWidth = t.iframeWidth+"px";
                }
                if( t.iframeHeight && isNaN(t.iframeHeight)){
                    r.height = wr.height = t.iframeHeight;
                }else if( t.iframeHeight && t.iframeHeight !="auto" ){
                     r.height = wr.height = t.iframeHeight+"px";
                }
            }
            // (n ? -1 === n.indexOf("%") && (n += "px") : n = "auto", o ? -1 === o.indexOf("%") && (o += "px") : o = "auto", l.node.style.width = n, l.node.style.height = o);
            if(t.iframepadding){
                if( t.iframepadding && isNaN(t.iframepadding)){
                    wr.padding = t.iframepadding;
                }else if( t.iframepadding && t.iframepadding !="auto" ){
                    wr.padding = t.iframepadding+"px";
                }
            }
            if(t.iframemargin){
                if( t.iframemargin && isNaN(t.iframemargin)){
                    wr.margin = t.iframemargin;
                }else if( t.iframemargin && t.iframemargin !="auto" ){
                    wr.margin = t.iframemargin+"px";
                }
            }
            
            
            if(t.allowaccelerometer)
                allows_attributes += 'accelerometer;';
            if(t.autoplay)
                allows_attributes += 'autoplay;';
            if(t.encryptedmedia)
                allows_attributes += 'encrypted-media;';
            if(t.gyroscope)
                allows_attributes += 'gyroscope;';
            
            if(t.iframeSrc){
                var hh = t.iframeSrc.substring(t.iframeSrc.lastIndexOf('/') + 1);
                if(hh.length > 0 && !hh.includes("intelli.tv") && !hh.includes("embed") && !hh.includes("watch")){
                    t.iframeSrc = 'https://embed.intelli.tv/watch/'+hh; //https://embed.intelli.tv/watch/IBh-HrMXFj
                }
            }
            
            var s = wp.element.createElement("iframe", i({
                id: t.anchor,
                className: n.join(" "),
                src: t.iframeSrc, 
                style: r,
                allowFullscreen: t.allowFullscreen,
                frameBorder: "0",
                'allow': allows_attributes,
                onLoad:iframeLoaded
            }, a));
            
            return t.iframeSrc ? wp.element.createElement(o, null, wp.element.createElement(l.a, e), wp.element.createElement('div', i({
                id: t.anchor,
                className: "intelli-tv-embed-wrapper",
                style: wr
            },a), null, wp.element.createElement('div', i({
                id: t.anchor,
                className: "embed-container",
                style: er
            },a), null, s))) : wp.element.createElement(o, null, wp.element.createElement(l.a, e), wp.element.createElement(c, {
                icon: intelliIcon,
                label: __("Intelli TV URL", "intellitv-iframe-block-gutenberg"),
                instructions: __("Paste a link to the content you want to display on your site.", "intellitv-iframe-block-gutenberg"),
                className: "intelli-tv-embed",
                
            },wp.element.createElement('form', i({
                className:"intellitv-block-input-wrapper"
            }),
            wp.element.createElement('input', i({
                type:"text",
                className:"intellitv-block-input components-placeholder__input",
                onChange:updateContent,
                "aria-label": "Intelli TV URL",
                placeholder:"Enter URL to embed here...",
                required:true
            })),wp.element.createElement('button', i({
                type:"submit",
                onClick:inlineBlockSubmit,
                isPrimary: !0,
                className:"intellitv-block-btn components-button is-primary",
            }), __("Embed", "intellitv-iframe-block-gutenberg"))), wp.element.createElement('a', i({
                href:"https://help.intelli.tv/article/16/wordpress-plugin",
                textDecoration:"underline",
                target:"_blank",
                rel:"external noreferrer noopener",
                className:"intellitv-block-anchor",
            }), __("Learn more about embeds", "intellitv-iframe-block-gutenberg"), externalIcon)));
        },
        save: function (e) {
            var allows_attributes = '';
            var t = e.attributes,
                n = [t.className];
            "full" == t.align && n.push("alignfull");
            if(t.responsive)
                t.iframeWidth = "100%";
            var r = { /* iframe styles */
                width: "100%",
                maxWidth: "100%",
                height: "auto",
                padding: "0px",
                margin: "0px"
            },
            er = {  /* embed styles */
                position:"relative",
                width:"100%",
                display:"inline-block"
            },
            wr = { /* wrapper styles */
                display:"inline-block",
                width:"100%",
                position:"relative"
            };
            var l = {};
            if(t.responsive){
                r.position = "absolute";
                r.top = "0";
                r.left = "0";
                r.height = "100%"; 
                er.position = "relative",
                er.paddingBottom = "56.25%", 
                er.overflow = "hidden",
                er.maxWidth = "100%"
            }else{
                /* then user custom settings */
                if( t.iframeWidth && isNaN(t.iframeWidth)){
                    r.width = wr.width = t.iframeWidth;
                }else if( t.iframeWidth && t.iframeWidth !="auto" ){
                     r.width = wr.width = t.iframeWidth+"px";
                }
                if( t.iframeWidth && isNaN(t.iframeWidth)){
                    r.maxWidth = wr.maxWidth = t.iframeWidth;  
                }else if( t.iframeWidth && t.iframeWidth !="auto" ){
                     r.maxWidth = wr.maxWidth = t.iframeWidth+"px";
                }
                if( t.iframeHeight && isNaN(t.iframeHeight)){
                    r.height = wr.height = t.iframeHeight;
                }else if( t.iframeHeight && t.iframeHeight !="auto" ){
                     r.height = wr.height = t.iframeHeight+"px";
                }
            }
            if(t.iframepadding){
                if( t.iframepadding && isNaN(t.iframepadding)){
                    wr.padding = t.iframepadding;
                }else if( t.iframepadding && t.iframepadding !="auto" ){
                    wr.padding = t.iframepadding+"px";
                }
            }
            if(t.iframemargin){
                if( t.iframemargin && isNaN(t.iframemargin)){
                    wr.margin = t.iframemargin;
                }else if( t.iframemargin && t.iframemargin !="auto" ){
                    wr.margin = t.iframemargin+"px";
                }
            }

            if(t.allowaccelerometer)
                allows_attributes += 'accelerometer;';
            if(t.autoplay)
                allows_attributes += 'autoplay;';
            if(t.encryptedmedia)
                allows_attributes += 'encrypted-media;';
            if(t.gyroscope)
                allows_attributes += 'gyroscope;';
            if (t.useImportant){
                for (var a in r) r[a] += " !important";
                for (var a1 in er) er[a1] += " !important";
                for (var a2 in wr) wr[a2] += " !important";
            }
                

            if(t.iframeSrc){
                var hh = t.iframeSrc.substring(t.iframeSrc.lastIndexOf('/') + 1);
                if(hh.length > 0 && !hh.includes("intelli.tv") && !hh.includes("embed") && !hh.includes("watch")){
                    t.iframeSrc = 'https://embed.intelli.tv/watch/'+hh;
                }
            }
             var s = t.iframeSrc ? wp.element.createElement(o, null, wp.element.createElement(l.a, e), wp.element.createElement('div', i({
                id: t.anchor,
                className: "intelli-tv-embed-wrapper",
                style: wr
            },l), null, wp.element.createElement('div', i({
                id: t.anchor,
                className: "embed-container",
                style: er
            },l), null, wp.element.createElement("iframe", i({
                id: t.anchor,
                className: n.join(" "),
                src: t.iframeSrc, 
                style: r,
                allowFullscreen: t.allowFullscreen,
                frameBorder: "0",
                'allow': allows_attributes
            }, l))))):"";
            return s;
        }
    })
}, function (e, t) {}, function (e, t) {}, function (e, t, n) {
    "use strict";

    function r(e, t) {
        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
    }

    function a(e, t) {
        if (!e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        return !t || "object" !== typeof t && "function" !== typeof t ? e : t
    }

    function l(e, t) {
        if ("function" !== typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
        e.prototype = Object.create(t && t.prototype, {
            constructor: {
                value: e,
                enumerable: !1,
                writable: !0,
                configurable: !0
            }
        }), t && (Object.setPrototypeOf ? Object.setPrototypeOf(e, t) : e.__proto__ = t)
    }
    var i = function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var r = t[n];
                    r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
                }
            }
            return function (t, n, r) {
                return n && e(t.prototype, n), r && e(t, r), t
            }
        }(),
        __ = wp.i18n.__,
        o = wp.element.Component,
        c = wp.editor.InspectorControls,
        s = wp.components,
        m = s.PanelBody,
        u = s.TextControl,
        f = s.ToggleControl,
        p = function (e) {
            function t() {
                return r(this, t), a(this, (t.__proto__ || Object.getPrototypeOf(t)).apply(this, arguments))
            }
            
            return l(t, e), i(t, [{
                key: "render",
                value: function () {
                    var e = this.props,
                        t = e.attributes,
                        n = e.setAttributes;
                    return wp.element.createElement(c, {
                        key: "inspector"
                    }, wp.element.createElement(m, {
                        title: __("Settings", "intellitv-iframe-block-gutenberg")
                    }, wp.element.createElement(u, {
                        label: __("Intelli TV video URL", "intellitv-iframe-block-gutenberg"),
                        value: t.iframeSrc,
                        onChange: function (e) {
                            n({
                                iframeSrc: e
                            })
                        }
                    }), wp.element.createElement(f, {
                        label: __("Responsive", "intellitv-iframe-block-gutenberg"),
                        checked: t.responsive,
                        onChange: function (e) {
                            n({
                                responsive: e
                            })
                        }
                    })),
                    /*wp.element.createElement(m, {
                        title: __("Allow", "intellitv-iframe-block-gutenberg")
                    }, wp.element.createElement(f, {
                        label: __("Allow fullscreen", "intellitv-iframe-block-gutenberg"),
                        checked: t.allowFullscreen,
                        onChange: function (e) {
                            n({
                                allowFullscreen: e
                            })
                        }
                    }), wp.element.createElement(f, {
                        label: __("Accelerometer", "intellitv-iframe-block-gutenberg"),
                        checked: t.allowaccelerometer,
                        onChange: function (e) {
                            n({
                                allowaccelerometer: e
                            })
                        }
                    }), wp.element.createElement(f, {
                        label: __("Autoplay", "intellitv-iframe-block-gutenberg"),
                        checked: t.autoplay,
                        onChange: function (e) {
                            n({
                                autoplay: e
                            })
                        }
                    }), wp.element.createElement(f, {
                        label: __("Encrypted Media", "intellitv-iframe-block-gutenberg"),
                        checked: t.encryptedmedia,
                        onChange: function (e) {
                            n({
                                encryptedmedia: e
                            })
                        }
                    }), wp.element.createElement(f, {
                        label: __("Gyroscope", "intellitv-iframe-block-gutenberg"),
                        checked: t.gyroscope,
                        onChange: function (e) {
                            n({
                                gyroscope: e
                            })
                        }
                    })), */
                    wp.element.createElement(m, {
                        title: __("Style", "intellitv-iframe-block-gutenberg")
                    }, wp.element.createElement(u, {
                        label: __("Width (px)(%)", "intellitv-iframe-block-gutenberg"),
                        value: t.iframeWidth,
                        readOnly: t.responsive,
                        onChange: function (e) {
                            n({
                                iframeWidth: e
                            })
                        }
                    }), wp.element.createElement(u, {
                        label: __("Height (px)(%)", "intellitv-iframe-block-gutenberg"),
                        value: t.iframeHeight,
                        readOnly: t.responsive,
                        onChange: function (e) {
                            n({
                                iframeHeight: e
                            })
                        }
                    }), wp.element.createElement(u, {
                        label: __("Padding (px)(%)", "intellitv-iframe-block-gutenberg"),
                        value: t.iframepadding,
                        onChange: function (e) {
                            n({
                                iframepadding: e
                            })
                        }
                    }), wp.element.createElement(u, {
                        label: __("Margin (px)(%)", "intellitv-iframe-block-gutenberg"),
                        value: t.iframemargin,
                        onChange: function (e) {
                            n({
                                iframemargin: e
                            })
                        }
                    }), wp.element.createElement(f, {
                        label: __("Use !important", "intellitv-iframe-block-gutenberg"),
                        checked: t.useImportant,
                        help:"In CSS, important means that only the ! important property value is to be applied to an element and all other declarations on the element are to be ignored. In other words, an important rule can be used to override other styling rules in CSS.",
                        onChange: function (e) {
                            n({
                                useImportant: e
                            })
                        }
                    })))
                }
            }]), t
        }(o);
    t.a = p
}]);