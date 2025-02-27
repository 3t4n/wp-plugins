(()=>{var e={46942:(e,t)=>{var r;!function(){"use strict";var o={}.hasOwnProperty;function a(){for(var e="",t=0;t<arguments.length;t++){var r=arguments[t];r&&(e=i(e,n(r)))}return e}function n(e){if("string"==typeof e||"number"==typeof e)return e;if("object"!=typeof e)return"";if(Array.isArray(e))return a.apply(null,e);if(e.toString!==Object.prototype.toString&&!e.toString.toString().includes("[native code]"))return e.toString();var t="";for(var r in e)o.call(e,r)&&e[r]&&(t=i(t,r));return t}function i(e,t){return t?e?e+" "+t:e+t:e}e.exports?(a.default=a,e.exports=a):void 0===(r=function(){return a}.apply(t,[]))||(e.exports=r)}()}},t={};function r(o){var a=t[o];if(void 0!==a)return a.exports;var n=t[o]={exports:{}};return e[o](n,n.exports,r),n.exports}(()=>{"use strict";const e=window.qf.blocks,t=window.React,o=window.qf.rendererCore,a=window.qf.utils,n=window.ReactDOM;function i(e){return i="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},i(e)}window.wp.data;var s=/^\s+/,l=/\s+$/;function c(e,t){if(t=t||{},(e=e||"")instanceof c)return e;if(!(this instanceof c))return new c(e,t);var r=function(e){var t,r,o,a={r:0,g:0,b:0},n=1,c=null,u=null,d=null,f=!1,h=!1;return"string"==typeof e&&(e=function(e){e=e.replace(s,"").replace(l,"").toLowerCase();var t,r=!1;if(S[e])e=S[e],r=!0;else if("transparent"==e)return{r:0,g:0,b:0,a:0,format:"name"};return(t=z.rgb.exec(e))?{r:t[1],g:t[2],b:t[3]}:(t=z.rgba.exec(e))?{r:t[1],g:t[2],b:t[3],a:t[4]}:(t=z.hsl.exec(e))?{h:t[1],s:t[2],l:t[3]}:(t=z.hsla.exec(e))?{h:t[1],s:t[2],l:t[3],a:t[4]}:(t=z.hsv.exec(e))?{h:t[1],s:t[2],v:t[3]}:(t=z.hsva.exec(e))?{h:t[1],s:t[2],v:t[3],a:t[4]}:(t=z.hex8.exec(e))?{r:F(t[1]),g:F(t[2]),b:F(t[3]),a:I(t[4]),format:r?"name":"hex8"}:(t=z.hex6.exec(e))?{r:F(t[1]),g:F(t[2]),b:F(t[3]),format:r?"name":"hex"}:(t=z.hex4.exec(e))?{r:F(t[1]+""+t[1]),g:F(t[2]+""+t[2]),b:F(t[3]+""+t[3]),a:I(t[4]+""+t[4]),format:r?"name":"hex8"}:!!(t=z.hex3.exec(e))&&{r:F(t[1]+""+t[1]),g:F(t[2]+""+t[2]),b:F(t[3]+""+t[3]),format:r?"name":"hex"}}(e)),"object"==i(e)&&(B(e.r)&&B(e.g)&&B(e.b)?(t=e.r,r=e.g,o=e.b,a={r:255*E(t,255),g:255*E(r,255),b:255*E(o,255)},f=!0,h="%"===String(e.r).substr(-1)?"prgb":"rgb"):B(e.h)&&B(e.s)&&B(e.v)?(c=T(e.s),u=T(e.v),a=function(e,t,r){e=6*E(e,360),t=E(t,100),r=E(r,100);var o=Math.floor(e),a=e-o,n=r*(1-t),i=r*(1-a*t),s=r*(1-(1-a)*t),l=o%6;return{r:255*[r,i,n,n,s,r][l],g:255*[s,r,r,i,n,n][l],b:255*[n,n,s,r,r,i][l]}}(e.h,c,u),f=!0,h="hsv"):B(e.h)&&B(e.s)&&B(e.l)&&(c=T(e.s),d=T(e.l),a=function(e,t,r){var o,a,n;function i(e,t,r){return r<0&&(r+=1),r>1&&(r-=1),r<1/6?e+6*(t-e)*r:r<.5?t:r<2/3?e+(t-e)*(2/3-r)*6:e}if(e=E(e,360),t=E(t,100),r=E(r,100),0===t)o=a=n=r;else{var s=r<.5?r*(1+t):r+t-r*t,l=2*r-s;o=i(l,s,e+1/3),a=i(l,s,e),n=i(l,s,e-1/3)}return{r:255*o,g:255*a,b:255*n}}(e.h,c,d),f=!0,h="hsl"),e.hasOwnProperty("a")&&(n=e.a)),n=R(n),{ok:f,format:e.format||h,r:Math.min(255,Math.max(a.r,0)),g:Math.min(255,Math.max(a.g,0)),b:Math.min(255,Math.max(a.b,0)),a:n}}(e);this._originalInput=e,this._r=r.r,this._g=r.g,this._b=r.b,this._a=r.a,this._roundA=Math.round(100*this._a)/100,this._format=t.format||r.format,this._gradientType=t.gradientType,this._r<1&&(this._r=Math.round(this._r)),this._g<1&&(this._g=Math.round(this._g)),this._b<1&&(this._b=Math.round(this._b)),this._ok=r.ok}function u(e,t,r){e=E(e,255),t=E(t,255),r=E(r,255);var o,a,n=Math.max(e,t,r),i=Math.min(e,t,r),s=(n+i)/2;if(n==i)o=a=0;else{var l=n-i;switch(a=s>.5?l/(2-n-i):l/(n+i),n){case e:o=(t-r)/l+(t<r?6:0);break;case t:o=(r-e)/l+2;break;case r:o=(e-t)/l+4}o/=6}return{h:o,s:a,l:s}}function d(e,t,r){e=E(e,255),t=E(t,255),r=E(r,255);var o,a,n=Math.max(e,t,r),i=Math.min(e,t,r),s=n,l=n-i;if(a=0===n?0:l/n,n==i)o=0;else{switch(n){case e:o=(t-r)/l+(t<r?6:0);break;case t:o=(r-e)/l+2;break;case r:o=(e-t)/l+4}o/=6}return{h:o,s:a,v:s}}function f(e,t,r,o){var a=[H(Math.round(e).toString(16)),H(Math.round(t).toString(16)),H(Math.round(r).toString(16))];return o&&a[0].charAt(0)==a[0].charAt(1)&&a[1].charAt(0)==a[1].charAt(1)&&a[2].charAt(0)==a[2].charAt(1)?a[0].charAt(0)+a[1].charAt(0)+a[2].charAt(0):a.join("")}function h(e,t,r,o){return[H(q(o)),H(Math.round(e).toString(16)),H(Math.round(t).toString(16)),H(Math.round(r).toString(16))].join("")}function g(e,t){t=0===t?0:t||10;var r=c(e).toHsl();return r.s-=t/100,r.s=$(r.s),c(r)}function p(e,t){t=0===t?0:t||10;var r=c(e).toHsl();return r.s+=t/100,r.s=$(r.s),c(r)}function b(e){return c(e).desaturate(100)}function m(e,t){t=0===t?0:t||10;var r=c(e).toHsl();return r.l+=t/100,r.l=$(r.l),c(r)}function v(e,t){t=0===t?0:t||10;var r=c(e).toRgb();return r.r=Math.max(0,Math.min(255,r.r-Math.round(-t/100*255))),r.g=Math.max(0,Math.min(255,r.g-Math.round(-t/100*255))),r.b=Math.max(0,Math.min(255,r.b-Math.round(-t/100*255))),c(r)}function x(e,t){t=0===t?0:t||10;var r=c(e).toHsl();return r.l-=t/100,r.l=$(r.l),c(r)}function w(e,t){var r=c(e).toHsl(),o=(r.h+t)%360;return r.h=o<0?360+o:o,c(r)}function y(e){var t=c(e).toHsl();return t.h=(t.h+180)%360,c(t)}function k(e,t){if(isNaN(t)||t<=0)throw new Error("Argument to polyad must be a positive number");for(var r=c(e).toHsl(),o=[c(e)],a=360/t,n=1;n<t;n++)o.push(c({h:(r.h+n*a)%360,s:r.s,l:r.l}));return o}function _(e){var t=c(e).toHsl(),r=t.h;return[c(e),c({h:(r+72)%360,s:t.s,l:t.l}),c({h:(r+216)%360,s:t.s,l:t.l})]}function M(e,t,r){t=t||6,r=r||30;var o=c(e).toHsl(),a=360/r,n=[c(e)];for(o.h=(o.h-(a*t>>1)+720)%360;--t;)o.h=(o.h+a)%360,n.push(c(o));return n}function A(e,t){t=t||6;for(var r=c(e).toHsv(),o=r.h,a=r.s,n=r.v,i=[],s=1/t;t--;)i.push(c({h:o,s:a,v:n})),n=(n+s)%1;return i}c.prototype={isDark:function(){return this.getBrightness()<128},isLight:function(){return!this.isDark()},isValid:function(){return this._ok},getOriginalInput:function(){return this._originalInput},getFormat:function(){return this._format},getAlpha:function(){return this._a},getBrightness:function(){var e=this.toRgb();return(299*e.r+587*e.g+114*e.b)/1e3},getLuminance:function(){var e,t,r,o=this.toRgb();return e=o.r/255,t=o.g/255,r=o.b/255,.2126*(e<=.03928?e/12.92:Math.pow((e+.055)/1.055,2.4))+.7152*(t<=.03928?t/12.92:Math.pow((t+.055)/1.055,2.4))+.0722*(r<=.03928?r/12.92:Math.pow((r+.055)/1.055,2.4))},setAlpha:function(e){return this._a=R(e),this._roundA=Math.round(100*this._a)/100,this},toHsv:function(){var e=d(this._r,this._g,this._b);return{h:360*e.h,s:e.s,v:e.v,a:this._a}},toHsvString:function(){var e=d(this._r,this._g,this._b),t=Math.round(360*e.h),r=Math.round(100*e.s),o=Math.round(100*e.v);return 1==this._a?"hsv("+t+", "+r+"%, "+o+"%)":"hsva("+t+", "+r+"%, "+o+"%, "+this._roundA+")"},toHsl:function(){var e=u(this._r,this._g,this._b);return{h:360*e.h,s:e.s,l:e.l,a:this._a}},toHslString:function(){var e=u(this._r,this._g,this._b),t=Math.round(360*e.h),r=Math.round(100*e.s),o=Math.round(100*e.l);return 1==this._a?"hsl("+t+", "+r+"%, "+o+"%)":"hsla("+t+", "+r+"%, "+o+"%, "+this._roundA+")"},toHex:function(e){return f(this._r,this._g,this._b,e)},toHexString:function(e){return"#"+this.toHex(e)},toHex8:function(e){return function(e,t,r,o,a){var n=[H(Math.round(e).toString(16)),H(Math.round(t).toString(16)),H(Math.round(r).toString(16)),H(q(o))];return a&&n[0].charAt(0)==n[0].charAt(1)&&n[1].charAt(0)==n[1].charAt(1)&&n[2].charAt(0)==n[2].charAt(1)&&n[3].charAt(0)==n[3].charAt(1)?n[0].charAt(0)+n[1].charAt(0)+n[2].charAt(0)+n[3].charAt(0):n.join("")}(this._r,this._g,this._b,this._a,e)},toHex8String:function(e){return"#"+this.toHex8(e)},toRgb:function(){return{r:Math.round(this._r),g:Math.round(this._g),b:Math.round(this._b),a:this._a}},toRgbString:function(){return 1==this._a?"rgb("+Math.round(this._r)+", "+Math.round(this._g)+", "+Math.round(this._b)+")":"rgba("+Math.round(this._r)+", "+Math.round(this._g)+", "+Math.round(this._b)+", "+this._roundA+")"},toPercentageRgb:function(){return{r:Math.round(100*E(this._r,255))+"%",g:Math.round(100*E(this._g,255))+"%",b:Math.round(100*E(this._b,255))+"%",a:this._a}},toPercentageRgbString:function(){return 1==this._a?"rgb("+Math.round(100*E(this._r,255))+"%, "+Math.round(100*E(this._g,255))+"%, "+Math.round(100*E(this._b,255))+"%)":"rgba("+Math.round(100*E(this._r,255))+"%, "+Math.round(100*E(this._g,255))+"%, "+Math.round(100*E(this._b,255))+"%, "+this._roundA+")"},toName:function(){return 0===this._a?"transparent":!(this._a<1)&&(C[f(this._r,this._g,this._b,!0)]||!1)},toFilter:function(e){var t="#"+h(this._r,this._g,this._b,this._a),r=t,o=this._gradientType?"GradientType = 1, ":"";if(e){var a=c(e);r="#"+h(a._r,a._g,a._b,a._a)}return"progid:DXImageTransform.Microsoft.gradient("+o+"startColorstr="+t+",endColorstr="+r+")"},toString:function(e){var t=!!e;e=e||this._format;var r=!1,o=this._a<1&&this._a>=0;return t||!o||"hex"!==e&&"hex6"!==e&&"hex3"!==e&&"hex4"!==e&&"hex8"!==e&&"name"!==e?("rgb"===e&&(r=this.toRgbString()),"prgb"===e&&(r=this.toPercentageRgbString()),"hex"!==e&&"hex6"!==e||(r=this.toHexString()),"hex3"===e&&(r=this.toHexString(!0)),"hex4"===e&&(r=this.toHex8String(!0)),"hex8"===e&&(r=this.toHex8String()),"name"===e&&(r=this.toName()),"hsl"===e&&(r=this.toHslString()),"hsv"===e&&(r=this.toHsvString()),r||this.toHexString()):"name"===e&&0===this._a?this.toName():this.toRgbString()},clone:function(){return c(this.toString())},_applyModification:function(e,t){var r=e.apply(null,[this].concat([].slice.call(t)));return this._r=r._r,this._g=r._g,this._b=r._b,this.setAlpha(r._a),this},lighten:function(){return this._applyModification(m,arguments)},brighten:function(){return this._applyModification(v,arguments)},darken:function(){return this._applyModification(x,arguments)},desaturate:function(){return this._applyModification(g,arguments)},saturate:function(){return this._applyModification(p,arguments)},greyscale:function(){return this._applyModification(b,arguments)},spin:function(){return this._applyModification(w,arguments)},_applyCombination:function(e,t){return e.apply(null,[this].concat([].slice.call(t)))},analogous:function(){return this._applyCombination(M,arguments)},complement:function(){return this._applyCombination(y,arguments)},monochromatic:function(){return this._applyCombination(A,arguments)},splitcomplement:function(){return this._applyCombination(_,arguments)},triad:function(){return this._applyCombination(k,[3])},tetrad:function(){return this._applyCombination(k,[4])}},c.fromRatio=function(e,t){if("object"==i(e)){var r={};for(var o in e)e.hasOwnProperty(o)&&(r[o]="a"===o?e[o]:T(e[o]));e=r}return c(e,t)},c.equals=function(e,t){return!(!e||!t)&&c(e).toRgbString()==c(t).toRgbString()},c.random=function(){return c.fromRatio({r:Math.random(),g:Math.random(),b:Math.random()})},c.mix=function(e,t,r){r=0===r?0:r||50;var o=c(e).toRgb(),a=c(t).toRgb(),n=r/100;return c({r:(a.r-o.r)*n+o.r,g:(a.g-o.g)*n+o.g,b:(a.b-o.b)*n+o.b,a:(a.a-o.a)*n+o.a})},c.readability=function(e,t){var r=c(e),o=c(t);return(Math.max(r.getLuminance(),o.getLuminance())+.05)/(Math.min(r.getLuminance(),o.getLuminance())+.05)},c.isReadable=function(e,t,r){var o,a,n,i,s,l=c.readability(e,t);switch(a=!1,(n=r,"AA"!==(i=((n=n||{level:"AA",size:"small"}).level||"AA").toUpperCase())&&"AAA"!==i&&(i="AA"),"small"!==(s=(n.size||"small").toLowerCase())&&"large"!==s&&(s="small"),o={level:i,size:s}).level+o.size){case"AAsmall":case"AAAlarge":a=l>=4.5;break;case"AAlarge":a=l>=3;break;case"AAAsmall":a=l>=7}return a},c.mostReadable=function(e,t,r){var o,a,n,i,s=null,l=0;a=(r=r||{}).includeFallbackColors,n=r.level,i=r.size;for(var u=0;u<t.length;u++)(o=c.readability(e,t[u]))>l&&(l=o,s=c(t[u]));return c.isReadable(e,s,{level:n,size:i})||!a?s:(r.includeFallbackColors=!1,c.mostReadable(e,["#fff","#000"],r))};var S=c.names={aliceblue:"f0f8ff",antiquewhite:"faebd7",aqua:"0ff",aquamarine:"7fffd4",azure:"f0ffff",beige:"f5f5dc",bisque:"ffe4c4",black:"000",blanchedalmond:"ffebcd",blue:"00f",blueviolet:"8a2be2",brown:"a52a2a",burlywood:"deb887",burntsienna:"ea7e5d",cadetblue:"5f9ea0",chartreuse:"7fff00",chocolate:"d2691e",coral:"ff7f50",cornflowerblue:"6495ed",cornsilk:"fff8dc",crimson:"dc143c",cyan:"0ff",darkblue:"00008b",darkcyan:"008b8b",darkgoldenrod:"b8860b",darkgray:"a9a9a9",darkgreen:"006400",darkgrey:"a9a9a9",darkkhaki:"bdb76b",darkmagenta:"8b008b",darkolivegreen:"556b2f",darkorange:"ff8c00",darkorchid:"9932cc",darkred:"8b0000",darksalmon:"e9967a",darkseagreen:"8fbc8f",darkslateblue:"483d8b",darkslategray:"2f4f4f",darkslategrey:"2f4f4f",darkturquoise:"00ced1",darkviolet:"9400d3",deeppink:"ff1493",deepskyblue:"00bfff",dimgray:"696969",dimgrey:"696969",dodgerblue:"1e90ff",firebrick:"b22222",floralwhite:"fffaf0",forestgreen:"228b22",fuchsia:"f0f",gainsboro:"dcdcdc",ghostwhite:"f8f8ff",gold:"ffd700",goldenrod:"daa520",gray:"808080",green:"008000",greenyellow:"adff2f",grey:"808080",honeydew:"f0fff0",hotpink:"ff69b4",indianred:"cd5c5c",indigo:"4b0082",ivory:"fffff0",khaki:"f0e68c",lavender:"e6e6fa",lavenderblush:"fff0f5",lawngreen:"7cfc00",lemonchiffon:"fffacd",lightblue:"add8e6",lightcoral:"f08080",lightcyan:"e0ffff",lightgoldenrodyellow:"fafad2",lightgray:"d3d3d3",lightgreen:"90ee90",lightgrey:"d3d3d3",lightpink:"ffb6c1",lightsalmon:"ffa07a",lightseagreen:"20b2aa",lightskyblue:"87cefa",lightslategray:"789",lightslategrey:"789",lightsteelblue:"b0c4de",lightyellow:"ffffe0",lime:"0f0",limegreen:"32cd32",linen:"faf0e6",magenta:"f0f",maroon:"800000",mediumaquamarine:"66cdaa",mediumblue:"0000cd",mediumorchid:"ba55d3",mediumpurple:"9370db",mediumseagreen:"3cb371",mediumslateblue:"7b68ee",mediumspringgreen:"00fa9a",mediumturquoise:"48d1cc",mediumvioletred:"c71585",midnightblue:"191970",mintcream:"f5fffa",mistyrose:"ffe4e1",moccasin:"ffe4b5",navajowhite:"ffdead",navy:"000080",oldlace:"fdf5e6",olive:"808000",olivedrab:"6b8e23",orange:"ffa500",orangered:"ff4500",orchid:"da70d6",palegoldenrod:"eee8aa",palegreen:"98fb98",paleturquoise:"afeeee",palevioletred:"db7093",papayawhip:"ffefd5",peachpuff:"ffdab9",peru:"cd853f",pink:"ffc0cb",plum:"dda0dd",powderblue:"b0e0e6",purple:"800080",rebeccapurple:"663399",red:"f00",rosybrown:"bc8f8f",royalblue:"4169e1",saddlebrown:"8b4513",salmon:"fa8072",sandybrown:"f4a460",seagreen:"2e8b57",seashell:"fff5ee",sienna:"a0522d",silver:"c0c0c0",skyblue:"87ceeb",slateblue:"6a5acd",slategray:"708090",slategrey:"708090",snow:"fffafa",springgreen:"00ff7f",steelblue:"4682b4",tan:"d2b48c",teal:"008080",thistle:"d8bfd8",tomato:"ff6347",turquoise:"40e0d0",violet:"ee82ee",wheat:"f5deb3",white:"fff",whitesmoke:"f5f5f5",yellow:"ff0",yellowgreen:"9acd32"},C=c.hexNames=function(e){var t={};for(var r in e)e.hasOwnProperty(r)&&(t[e[r]]=r);return t}(S);function R(e){return e=parseFloat(e),(isNaN(e)||e<0||e>1)&&(e=1),e}function E(e,t){(function(e){return"string"==typeof e&&-1!=e.indexOf(".")&&1===parseFloat(e)})(e)&&(e="100%");var r=function(e){return"string"==typeof e&&-1!=e.indexOf("%")}(e);return e=Math.min(t,Math.max(0,parseFloat(e))),r&&(e=parseInt(e*t,10)/100),Math.abs(e-t)<1e-6?1:e%t/parseFloat(t)}function $(e){return Math.min(1,Math.max(0,e))}function F(e){return parseInt(e,16)}function H(e){return 1==e.length?"0"+e:""+e}function T(e){return e<=1&&(e=100*e+"%"),e}function q(e){return Math.round(255*parseFloat(e)).toString(16)}function I(e){return F(e)/255}var N,P,L,z=(P="[\\s|\\(]+("+(N="(?:[-\\+]?\\d*\\.\\d+%?)|(?:[-\\+]?\\d+%?)")+")[,|\\s]+("+N+")[,|\\s]+("+N+")\\s*\\)?",L="[\\s|\\(]+("+N+")[,|\\s]+("+N+")[,|\\s]+("+N+")[,|\\s]+("+N+")\\s*\\)?",{CSS_UNIT:new RegExp(N),rgb:new RegExp("rgb"+P),rgba:new RegExp("rgba"+L),hsl:new RegExp("hsl"+P),hsla:new RegExp("hsla"+L),hsv:new RegExp("hsv"+P),hsva:new RegExp("hsva"+L),hex3:/^#?([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/,hex6:/^#?([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/,hex4:/^#?([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/,hex8:/^#?([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/});function B(e){return!!z.CSS_UNIT.exec(e)}r(46942);const O=window.lodash;function D(){return D=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var o in r)({}).hasOwnProperty.call(r,o)&&(e[o]=r[o])}return e},D.apply(null,arguments)}const j=window.wp.i18n,Y=(0,a.keyframes)({"0%":{transform:"translateY(100%)"},"100%":{transform:"translateY(0%)"}}),W=(0,a.keyframes)({"0%":{transform:"translateY(0%)"},"100%":{transform:"translateY(100%)"}}),V=e=>a.css`
	position: fixed;
	inset: 0;
	height: 100% !important;
	display: flex;
	background-color: #fff;
	flex-direction: column;
	z-index: 111111111;

	&.show {
		transform: translateY(100%);
		animation: ${Y} 0.5s ease-in-out 1 forwards;
	}

	&.hide {
		transform: translateY(0%);
		animation: ${W} 0.5s ease-in-out 1 forwards;
	}
	> div {
		background: ${e.backgroundColor};
		${(e=>{let t="";return e.backgroundImage&&e.backgroundImage&&(t=`background-image: url('${e.backgroundImage}');\n\t\t\tbackground-size: cover;\n\t\t\tbackground-position: ${100*parseFloat(e.backgroundImageFocalPoint?.x)}%\n\t\t\t${100*parseFloat(e.backgroundImageFocalPoint?.y)}%;\n\n\t\t\tbackground-repeat: no-repeat;\n\t\t`),t})(e)};
		padding: 20px 10px;
		overflow-y: auto;
		height: 100% !important;
	}
	.back-icon {
		width: 20px;
		height: 20px;
		margin-right: 5px;
		fill: ${e.questionsColor} !important
	}
}`,K=(0,a.keyframes)({"0%":{transform:"scale( 1 )"},"25%":{transform:"scale( 0.97 )"},"50%":{transform:"scale( 0.99 )"},"75%":{transform:"scale( 0.97 )"},"100%":{transform:"scale( 1 )"}}),U=a.css`
	& {
		position: absolute;
		top: 112%;
		right: 0;
		left: 0;
		padding-top: 15px;
		border-radius: 5px;
		width: 100%;
		overflow-y: auto;
		transition: transform, opacity 0.3s linear;
		z-index: 11111;
		opacity: 0;
		visibility: hidden;
		transform: translateY(-10px);
	}

	&.visible {
		max-height: 300px;
		visibility: visible;
		opacity: 1;
		transform: none;
	}

	&.fixed-choices {
		position: static;
		height: auto !important;
		padding: 10px 20px;
	}


}`,G=a.css`
	& {
		padding: 10px;
		margin-bottom: 8px;
		border-width: 1px;
		border-style: solid;
		border-radius: 5px;
		cursor: pointer;
		backface-visibility: hidden;
		-webkit-backface-visibility: hidden;
	}
	&:last-child {
		margin-bottom: 0;
	}

	&.isBeingSelected {
		animation: ${K} 0.4s linear forwards;
	}
}`,X=a.css`
	position: absolute;
	${(0,j.isRTL)()?"left: 0":"right: 0"};
	bottom: 4px;
	cursor: pointer;

	svg {
		width: 26px;
		height: 26px;
	}
`,J=e=>{const t=(0,o.useTheme)(),r=(0,a.useCx)();return React.createElement("div",D({tabIndex:"0"},e,{className:r("block-dropdown-renderer-expand-icon",X)}),React.createElement("svg",{stroke:"currentColor",fill:"currentColor",strokeWidth:"0",viewBox:"0 0 20 20",height:"1em",width:"1em",xmlns:"http://www.w3.org/2000/svg",className:r(a.css`
					fill: ${t.answersColor};
				`)},React.createElement("path",{fillRule:"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z",clipRule:"evenodd"})))},Q=e=>{const t=(0,o.useTheme)(),r=(0,a.useCx)();return React.createElement("div",D({},e,{className:r("block-dropdown-renderer-close-icon",X)}),React.createElement("svg",{height:"32",width:"32",viewBox:"0 0 512 512",className:r(a.css`
					fill: ${t.answersColor};
				`)},React.createElement("g",null,React.createElement("g",null,React.createElement("g",null,React.createElement("polygon",{points:"405,136.798 375.202,107 256,226.202 136.798,107 107,136.798 226.202,256 107,375.202 136.798,405 256,285.798\r 375.202,405 405,375.202 285.798,256 \t\t"},React.createElement("polygon",{points:"405,136.798 375.202,107 256,226.202 136.798,107 107,136.798 226.202,256 107,375.202 136.798,405 256,285.798\r 375.202,405 405,375.202 285.798,256 \t\t"})))))))};let Z;const ee=({choice:e,blockId:r,choiceIndex:n,val:i,clickHandler:s,showDropdown:l,clicked:u,hovered:d})=>{const[f,h]=(0,t.useState)(!1),g=(0,t.useRef)(),p=(0,a.useCx)();(0,t.useEffect)((()=>{l||h(!1)}),[l]);const b=(0,o.useTheme)(),m=c(b.answersColor),v=i&&i===e.value;return(0,t.useEffect)((()=>(u&&g.current.click(),()=>{u=!1})),[u]),React.createElement("div",{ref:g,id:`block-${r}-option-${n}`,className:p("dropdown__choiceWrapper",{selected:v,isBeingSelected:f},a.css`
						background: ${d?m.setAlpha(.2).toString():m.setAlpha(.1).toString()};

						border-color: ${b.answersColor};
						color: ${b.answersColor};

						&:hover {
							background: ${m.setAlpha(.2).toString()};
						}

						&.selected {
							background: ${c(b.answersColor).setAlpha(.75).toString()};
							color: ${c(b.answersColor).isDark()?"#fff":"#333"}
					`,G),role:"presentation",onClick:()=>{v&&clearTimeout(Z),v||h(!0),s(),Z=setTimeout((()=>{f&&h(!1)}),400)}},e.label)};let te,re,oe;const ae={display:e=>{var r;const{id:i,attributes:s,setIsValid:l,setIsAnswered:u,setValidationErr:d,val:f,setVal:h,next:g,showErrMsg:p,isActive:b,isTouchScreen:m,setFooterDisplay:v,inputRef:x,isPreview:w,isReviewing:y}=e,{choices:k,required:_}=s,M=(0,a.useCx)(),A=window.self!==window.top,S=(0,o.useBlockTheme)(s.themeId),[C,R]=(0,t.useState)(!1),[E,$]=(0,t.useState)(""),[F,H]=(0,t.useState)(-1),[T,q]=(0,t.useState)(!1),[I,N]=(0,t.useState)(!1),[P,L]=(0,t.useState)(!1),[z,B]=(0,t.useState)(""),[D,j]=(0,t.useState)(!1),[Y,W]=(0,t.useState)(!1),K=(0,t.useRef)(),G=(0,t.useRef)(),X=(0,o.useMessages)(),Z=c(S.answersColor),ae=(0,t.useMemo)((()=>(0,O.cloneDeep)(k).map(((e,t)=>(e.label||(e.label="Choice "+(t+1)),e))).filter((e=>e.label.toLowerCase().includes(f&&m?"":E.toLowerCase())))),[k,E]),ne=e=>{!0!==_||e&&""!==e?(l(!0),d(null)):(l(!1),d(X["label.errorAlert.selectionRequired"]))},ie=e=>{K.current&&!K.current.contains(e.target)&&(R(!1),H(-1))};(0,t.useEffect)((()=>(C?(document.addEventListener("mousedown",ie),document.querySelector(`#block-${i} .renderer-core-field-footer`)&&document.querySelector(`#block-${i} .renderer-core-field-footer`).classList.add("is-hidden")):document.querySelector(`#block-${i} .renderer-core-field-footer`)&&document.querySelector(`#block-${i} .renderer-core-field-footer`).classList.remove("is-hidden"),()=>{document.removeEventListener("mousedown",ie)})),[C]),(0,t.useEffect)((()=>{!w&&y||ne(f)}),[s]),(0,t.useEffect)((()=>(Y?(j(Y),v(!1)):oe=setTimeout((()=>{j(Y)}),500),()=>clearTimeout(oe))),[Y]);const se=e=>{if(L(""!==e.target.value),B(e.target.value),m&&!A||R(!0),f)return h(null),$(""),void ne(void 0);$(e.target.value)};(0,t.useEffect)((()=>{b||re&&clearTimeout(re),N(!1)}),[b]),(0,t.useEffect)((()=>{if(f){const e=ae.find((e=>e.value===f));$(e?e.label:"")}return()=>{re&&clearTimeout(re)}}),[]),(0,t.useEffect)((()=>{I&&g()}),[I]);const le=e=>{if(!m){if(27===e.keyCode)return R(!1),L(""!==z),void H(-1);if(38!==e.keyCode&&40!==e.keyCode){if(13===e.keyCode){if(e.stopPropagation(),-1===F)return R(!1),void H(-1);q(!0)}}else{const t=document.querySelector(`#block-${i}  .qf-block-dropdown-display__choices`);if(!t||F<=0&&38===e.keyCode||F===ae.length-1&&40===e.keyCode)return;R(!0);const r=38===e.keyCode?F-1:F+1;H(r);const o=document.getElementById(`block-${i}-option-${r}`);(function(e,t){const r=e.scrollTop,o=r+e.clientHeight,a=t.offsetTop,n=a+t.clientHeight;return a>=r+10&&n<=o-50})(t,o)||(t.scrollTop=o.offsetTop-30)}}},ce=(e=ae[F])=>{const t=ae.findIndex((t=>t.value===e.value));if(t!==F&&H(t),q(!1),L(!1),p(!1),clearTimeout(te),re&&clearTimeout(re),f&&f===e.value)return h(null),u(!1),$(""),ne(void 0),void N(!1);u(!0),h(e.value),ne(e.value),te=setTimeout((()=>{$(e.label),R(!1),H(-1),m&&!A?(W(!1),v(!0),re=setTimeout((()=>{N(!0)}),750)):N(!0)}),m?500:700)};return React.createElement("div",{ref:K,style:{position:"relative"}},React.createElement("input",{autoComplete:"off",ref:x,className:M(a.css`
						& {
							width: 100%;
							border: none;
							outline: none;
							font-size: 30px;
							padding-bottom: 8px;
							padding-top: 0;
							background: transparent;
							transition: box-shadow 0.1s ease-out 0s;
							box-shadow: ${Z.setAlpha(.3).toString()}
								0px 1px;
							@media ( max-width: 600px ) {
								font-size: 24px;
							}

							@media ( max-width: 480px ) {
								font-size: 20px;
							}
						}

						&::placeholder {
							opacity: 0.3;
							/* Chrome, Firefox, Opera, Safari 10.1+ */
							color: ${S.answersColor};
						}

						&:-ms-input-placeholder {
							opacity: 0.3;
							/* Internet Explorer 10-11 */
							color: ${S.answersColor};
						}

						&::-ms-input-placeholder {
							opacity: 0.3;
							/* Microsoft Edge */
							color: ${S.answersColor};
						}

						&:focus {
							box-shadow: ${Z.setAlpha(1).toString()}
								0px 2px;
						}

						color: ${S.answersColor};
					`),id:"dropdown-"+i,placeholder:X["block.dropdown.placeholder"],onChange:se,value:f&&m?E:m?"":E,onClick:()=>{m&&!A?(W(!0),x?.current?.blur()):R(!0)},onFocus:()=>{m&&v(!1)},onBlur:()=>{m&&v(!0)},onKeyDown:le,autoComplete:"off"}),f&&f.length>0||P&&(!m||A)?React.createElement(Q,{onClick:()=>{clearTimeout(te),re&&clearTimeout(re),$(""),u(!1),h(void 0),L(!1),m||x.current.focus()}}):React.createElement(J,{style:{transform:C?"rotate(180deg)":"rotate(0deg)"},onClick:()=>{C&&H(-1),m&&!A?W(!Y):(R(!C),x.current.focus())},onKeyDown:e=>{13===e.keyCode&&(e.stopPropagation(),C&&H(-1),m?W(!Y):(R(!C),x.current.focus()))}}),C&&React.createElement("div",{className:M("qf-block-dropdown-display__choices",{visible:C},U,a.css`
							background: ${null!==(r=S.backgroundColor)&&void 0!==r?r:"#fff"};
							padding: 15px;
							border: 1px dashed ${S.answersColor};
						`),ref:G,onWheel:e=>{C&&e.stopPropagation()}},ae?.length>0?ae.map(((e,t)=>React.createElement(ee,{blockId:i,choiceIndex:t,hovered:t===F,clicked:t===F&&T,role:"presentation",key:`block-dropdown-${i}-choice-${e.value}`,clickHandler:()=>ce(e),choice:e,val:f,showDropdown:C}))):React.createElement("div",{className:M(a.css`
								background: ${S.errorsBgColor};
								color: ${S.errorsFontColor};
								display: inline-block;
								padding: 5px 10px;
								border-radius: 5px;
							`)},X["block.dropdown.noSuggestions"])),D&&React.createElement(React.Fragment,null,(0,n.createPortal)(React.createElement("div",{className:M("fixed-dropdown",{show:Y,hide:!Y},V(S)),onWheel:e=>e.stopPropagation()},React.createElement("div",{className:"fixed-dropdown-content",onWheel:e=>{e.stopPropagation()}},React.createElement("div",{className:M(a.css`
											display: flex;
											align-items: center;
										`)},React.createElement("svg",{onClick:()=>{W(!1)},className:"back-icon",focusable:"false",viewBox:"0 0 16 16","aria-hidden":"true",role:"presentation"},React.createElement("path",{d:"M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"})),React.createElement("input",{autoFocus:!1,className:M(a.css`
												& {
													width: 100%;
													border: none;
													outline: none;
													padding-bottom: 8px;
													background: transparent;
													margin-bottom: 10px;
													transition: box-shadow 0.1s
														ease-out 0s;
													box-shadow: ${Z.setAlpha(.3).toString()}
														0px 1px;
												}

												&::placeholder {
													opacity: 0.3;
													/* Chrome, Firefox, Opera, Safari 10.1+ */
													color: ${S.answersColor};
												}

												&:-ms-input-placeholder {
													opacity: 0.3;
													/* Internet Explorer 10-11 */
													color: ${S.answersColor};
												}

												&::-ms-input-placeholder {
													opacity: 0.3;
													/* Microsoft Edge */
													color: ${S.answersColor};
												}

												&:focus {
													box-shadow: ${Z.setAlpha(1).toString()}
														0px 2px;
												}

												color: ${S.answersColor};
											`),placeholder:X["block.dropdown.placeholder"],onChange:se,value:E,onFocus:()=>{v(!1)},onBlur:()=>{v(!0)},onKeyDown:le,autoComplete:"off"})),React.createElement("div",{className:"qf-block-dropdown-display__choices visible fixed-choices",ref:G,onWheel:e=>{D&&e.stopPropagation()}},ae?.length>0?ae.map(((e,t)=>React.createElement(ee,{hovered:t===F,choiceIndex:t,blockId:i,clicked:t===F&&T,role:"presentation",key:`block-dropdown-${i}-choice-${e.value}`,clickHandler:()=>ce(e),choice:e,val:f,showDropdown:C}))):React.createElement("div",{className:M(a.css`
												background: ${S.errorsBgColor};
												color: ${S.errorsFontColor};
												display: inline-block;
												padding: 5px 10px;
												border-radius: 5px;
											`)},X["block.dropdown.noSuggestions"])))),document.querySelector(".renderer-core-form-flow"))))},mergeTag:({val:e,attributes:t})=>{const{choices:r}=t,o=r.findIndex((t=>t.value===e));let a="_ _ _ _";return r[o]&&(a=r[o].label,a||(a="Choice "+(index+1))),React.createElement(React.Fragment,null,a)}},{name:ne}={name:"dropdown",attributes:{choices:{type:"array",items:{type:"object",properties:{value:{type:"string"},label:{type:"string"}}},default:[{value:"123e45z7o89b",label:"Choice 1"}]}},supports:{editable:!0,required:!0,attachment:!0,description:!0,logic:!0,theme:!0,points:!0,payments:!0,choices:!0},logicalOperators:["is","is_not"]};(0,e.setBlockRendererSettings)(ne,ae)})(),(window.qf=window.qf||{}).blocklibDropdownBlockRenderer={}})();