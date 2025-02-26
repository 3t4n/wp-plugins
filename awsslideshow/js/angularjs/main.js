/*
 RequireJS 2.1.15 Copyright (c) 2010-2014, The Dojo Foundation All Rights Reserved.
 Available via the MIT or new BSD license.
 see: http://github.com/jrburke/requirejs for details
*/
var requirejs,require,define;
(function(ba){function G(b){return"[object Function]"===K.call(b)}function H(b){return"[object Array]"===K.call(b)}function v(b,c){if(b){var d;for(d=0;d<b.length&&(!b[d]||!c(b[d],d,b));d+=1);}}function T(b,c){if(b){var d;for(d=b.length-1;-1<d&&(!b[d]||!c(b[d],d,b));d-=1);}}function t(b,c){return fa.call(b,c)}function m(b,c){return t(b,c)&&b[c]}function B(b,c){for(var d in b)if(t(b,d)&&c(b[d],d))break}function U(b,c,d,e){c&&B(c,function(c,g){if(d||!t(b,g))e&&"object"===typeof c&&c&&!H(c)&&!G(c)&&!(c instanceof
RegExp)?(b[g]||(b[g]={}),U(b[g],c,d,e)):b[g]=c});return b}function u(b,c){return function(){return c.apply(b,arguments)}}function ca(b){throw b;}function da(b){if(!b)return b;var c=ba;v(b.split("."),function(b){c=c[b]});return c}function C(b,c,d,e){c=Error(c+"\nhttp://requirejs.org/docs/errors.html#"+b);c.requireType=b;c.requireModules=e;d&&(c.originalError=d);return c}function ga(b){function c(a,k,b){var f,l,c,d,e,g,i,p,k=k&&k.split("/"),h=j.map,n=h&&h["*"];if(a){a=a.split("/");l=a.length-1;j.nodeIdCompat&&
Q.test(a[l])&&(a[l]=a[l].replace(Q,""));"."===a[0].charAt(0)&&k&&(l=k.slice(0,k.length-1),a=l.concat(a));l=a;for(c=0;c<l.length;c++)if(d=l[c],"."===d)l.splice(c,1),c-=1;else if(".."===d&&!(0===c||1==c&&".."===l[2]||".."===l[c-1])&&0<c)l.splice(c-1,2),c-=2;a=a.join("/")}if(b&&h&&(k||n)){l=a.split("/");c=l.length;a:for(;0<c;c-=1){e=l.slice(0,c).join("/");if(k)for(d=k.length;0<d;d-=1)if(b=m(h,k.slice(0,d).join("/")))if(b=m(b,e)){f=b;g=c;break a}!i&&(n&&m(n,e))&&(i=m(n,e),p=c)}!f&&i&&(f=i,g=p);f&&(l.splice(0,
g,f),a=l.join("/"))}return(f=m(j.pkgs,a))?f:a}function d(a){z&&v(document.getElementsByTagName("script"),function(k){if(k.getAttribute("data-requiremodule")===a&&k.getAttribute("data-requirecontext")===i.contextName)return k.parentNode.removeChild(k),!0})}function e(a){var k=m(j.paths,a);if(k&&H(k)&&1<k.length)return k.shift(),i.require.undef(a),i.makeRequire(null,{skipMap:!0})([a]),!0}function n(a){var k,c=a?a.indexOf("!"):-1;-1<c&&(k=a.substring(0,c),a=a.substring(c+1,a.length));return[k,a]}function p(a,
k,b,f){var l,d,e=null,g=k?k.name:null,j=a,p=!0,h="";a||(p=!1,a="_@r"+(K+=1));a=n(a);e=a[0];a=a[1];e&&(e=c(e,g,f),d=m(r,e));a&&(e?h=d&&d.normalize?d.normalize(a,function(a){return c(a,g,f)}):-1===a.indexOf("!")?c(a,g,f):a:(h=c(a,g,f),a=n(h),e=a[0],h=a[1],b=!0,l=i.nameToUrl(h)));b=e&&!d&&!b?"_unnormalized"+(O+=1):"";return{prefix:e,name:h,parentMap:k,unnormalized:!!b,url:l,originalName:j,isDefine:p,id:(e?e+"!"+h:h)+b}}function s(a){var k=a.id,b=m(h,k);b||(b=h[k]=new i.Module(a));return b}function q(a,
k,b){var f=a.id,c=m(h,f);if(t(r,f)&&(!c||c.defineEmitComplete))"defined"===k&&b(r[f]);else if(c=s(a),c.error&&"error"===k)b(c.error);else c.on(k,b)}function w(a,b){var c=a.requireModules,f=!1;if(b)b(a);else if(v(c,function(b){if(b=m(h,b))b.error=a,b.events.error&&(f=!0,b.emit("error",a))}),!f)g.onError(a)}function x(){R.length&&(ha.apply(A,[A.length,0].concat(R)),R=[])}function y(a){delete h[a];delete V[a]}function F(a,b,c){var f=a.map.id;a.error?a.emit("error",a.error):(b[f]=!0,v(a.depMaps,function(f,
d){var e=f.id,g=m(h,e);g&&(!a.depMatched[d]&&!c[e])&&(m(b,e)?(a.defineDep(d,r[e]),a.check()):F(g,b,c))}),c[f]=!0)}function D(){var a,b,c=(a=1E3*j.waitSeconds)&&i.startTime+a<(new Date).getTime(),f=[],l=[],g=!1,h=!0;if(!W){W=!0;B(V,function(a){var i=a.map,j=i.id;if(a.enabled&&(i.isDefine||l.push(a),!a.error))if(!a.inited&&c)e(j)?g=b=!0:(f.push(j),d(j));else if(!a.inited&&(a.fetched&&i.isDefine)&&(g=!0,!i.prefix))return h=!1});if(c&&f.length)return a=C("timeout","Load timeout for modules: "+f,null,
f),a.contextName=i.contextName,w(a);h&&v(l,function(a){F(a,{},{})});if((!c||b)&&g)if((z||ea)&&!X)X=setTimeout(function(){X=0;D()},50);W=!1}}function E(a){t(r,a[0])||s(p(a[0],null,!0)).init(a[1],a[2])}function I(a){var a=a.currentTarget||a.srcElement,b=i.onScriptLoad;a.detachEvent&&!Y?a.detachEvent("onreadystatechange",b):a.removeEventListener("load",b,!1);b=i.onScriptError;(!a.detachEvent||Y)&&a.removeEventListener("error",b,!1);return{node:a,id:a&&a.getAttribute("data-requiremodule")}}function J(){var a;
for(x();A.length;){a=A.shift();if(null===a[0])return w(C("mismatch","Mismatched anonymous define() module: "+a[a.length-1]));E(a)}}var W,Z,i,L,X,j={waitSeconds:7,baseUrl:"./",paths:{},bundles:{},pkgs:{},shim:{},config:{}},h={},V={},$={},A=[],r={},S={},aa={},K=1,O=1;L={require:function(a){return a.require?a.require:a.require=i.makeRequire(a.map)},exports:function(a){a.usingExports=!0;if(a.map.isDefine)return a.exports?r[a.map.id]=a.exports:a.exports=r[a.map.id]={}},module:function(a){return a.module?
a.module:a.module={id:a.map.id,uri:a.map.url,config:function(){return m(j.config,a.map.id)||{}},exports:a.exports||(a.exports={})}}};Z=function(a){this.events=m($,a.id)||{};this.map=a;this.shim=m(j.shim,a.id);this.depExports=[];this.depMaps=[];this.depMatched=[];this.pluginMaps={};this.depCount=0};Z.prototype={init:function(a,b,c,f){f=f||{};if(!this.inited){this.factory=b;if(c)this.on("error",c);else this.events.error&&(c=u(this,function(a){this.emit("error",a)}));this.depMaps=a&&a.slice(0);this.errback=
c;this.inited=!0;this.ignore=f.ignore;f.enabled||this.enabled?this.enable():this.check()}},defineDep:function(a,b){this.depMatched[a]||(this.depMatched[a]=!0,this.depCount-=1,this.depExports[a]=b)},fetch:function(){if(!this.fetched){this.fetched=!0;i.startTime=(new Date).getTime();var a=this.map;if(this.shim)i.makeRequire(this.map,{enableBuildCallback:!0})(this.shim.deps||[],u(this,function(){return a.prefix?this.callPlugin():this.load()}));else return a.prefix?this.callPlugin():this.load()}},load:function(){var a=
this.map.url;S[a]||(S[a]=!0,i.load(this.map.id,a))},check:function(){if(this.enabled&&!this.enabling){var a,b,c=this.map.id;b=this.depExports;var f=this.exports,l=this.factory;if(this.inited)if(this.error)this.emit("error",this.error);else{if(!this.defining){this.defining=!0;if(1>this.depCount&&!this.defined){if(G(l)){if(this.events.error&&this.map.isDefine||g.onError!==ca)try{f=i.execCb(c,l,b,f)}catch(d){a=d}else f=i.execCb(c,l,b,f);this.map.isDefine&&void 0===f&&((b=this.module)?f=b.exports:this.usingExports&&
(f=this.exports));if(a)return a.requireMap=this.map,a.requireModules=this.map.isDefine?[this.map.id]:null,a.requireType=this.map.isDefine?"define":"require",w(this.error=a)}else f=l;this.exports=f;if(this.map.isDefine&&!this.ignore&&(r[c]=f,g.onResourceLoad))g.onResourceLoad(i,this.map,this.depMaps);y(c);this.defined=!0}this.defining=!1;this.defined&&!this.defineEmitted&&(this.defineEmitted=!0,this.emit("defined",this.exports),this.defineEmitComplete=!0)}}else this.fetch()}},callPlugin:function(){var a=
this.map,b=a.id,d=p(a.prefix);this.depMaps.push(d);q(d,"defined",u(this,function(f){var l,d;d=m(aa,this.map.id);var e=this.map.name,P=this.map.parentMap?this.map.parentMap.name:null,n=i.makeRequire(a.parentMap,{enableBuildCallback:!0});if(this.map.unnormalized){if(f.normalize&&(e=f.normalize(e,function(a){return c(a,P,!0)})||""),f=p(a.prefix+"!"+e,this.map.parentMap),q(f,"defined",u(this,function(a){this.init([],function(){return a},null,{enabled:!0,ignore:!0})})),d=m(h,f.id)){this.depMaps.push(f);
if(this.events.error)d.on("error",u(this,function(a){this.emit("error",a)}));d.enable()}}else d?(this.map.url=i.nameToUrl(d),this.load()):(l=u(this,function(a){this.init([],function(){return a},null,{enabled:!0})}),l.error=u(this,function(a){this.inited=!0;this.error=a;a.requireModules=[b];B(h,function(a){0===a.map.id.indexOf(b+"_unnormalized")&&y(a.map.id)});w(a)}),l.fromText=u(this,function(f,c){var d=a.name,e=p(d),P=M;c&&(f=c);P&&(M=!1);s(e);t(j.config,b)&&(j.config[d]=j.config[b]);try{g.exec(f)}catch(h){return w(C("fromtexteval",
"fromText eval for "+b+" failed: "+h,h,[b]))}P&&(M=!0);this.depMaps.push(e);i.completeLoad(d);n([d],l)}),f.load(a.name,n,l,j))}));i.enable(d,this);this.pluginMaps[d.id]=d},enable:function(){V[this.map.id]=this;this.enabling=this.enabled=!0;v(this.depMaps,u(this,function(a,b){var c,f;if("string"===typeof a){a=p(a,this.map.isDefine?this.map:this.map.parentMap,!1,!this.skipMap);this.depMaps[b]=a;if(c=m(L,a.id)){this.depExports[b]=c(this);return}this.depCount+=1;q(a,"defined",u(this,function(a){this.defineDep(b,
a);this.check()}));this.errback&&q(a,"error",u(this,this.errback))}c=a.id;f=h[c];!t(L,c)&&(f&&!f.enabled)&&i.enable(a,this)}));B(this.pluginMaps,u(this,function(a){var b=m(h,a.id);b&&!b.enabled&&i.enable(a,this)}));this.enabling=!1;this.check()},on:function(a,b){var c=this.events[a];c||(c=this.events[a]=[]);c.push(b)},emit:function(a,b){v(this.events[a],function(a){a(b)});"error"===a&&delete this.events[a]}};i={config:j,contextName:b,registry:h,defined:r,urlFetched:S,defQueue:A,Module:Z,makeModuleMap:p,
nextTick:g.nextTick,onError:w,configure:function(a){a.baseUrl&&"/"!==a.baseUrl.charAt(a.baseUrl.length-1)&&(a.baseUrl+="/");var b=j.shim,c={paths:!0,bundles:!0,config:!0,map:!0};B(a,function(a,b){c[b]?(j[b]||(j[b]={}),U(j[b],a,!0,!0)):j[b]=a});a.bundles&&B(a.bundles,function(a,b){v(a,function(a){a!==b&&(aa[a]=b)})});a.shim&&(B(a.shim,function(a,c){H(a)&&(a={deps:a});if((a.exports||a.init)&&!a.exportsFn)a.exportsFn=i.makeShimExports(a);b[c]=a}),j.shim=b);a.packages&&v(a.packages,function(a){var b,
a="string"===typeof a?{name:a}:a;b=a.name;a.location&&(j.paths[b]=a.location);j.pkgs[b]=a.name+"/"+(a.main||"main").replace(ia,"").replace(Q,"")});B(h,function(a,b){!a.inited&&!a.map.unnormalized&&(a.map=p(b))});if(a.deps||a.callback)i.require(a.deps||[],a.callback)},makeShimExports:function(a){return function(){var b;a.init&&(b=a.init.apply(ba,arguments));return b||a.exports&&da(a.exports)}},makeRequire:function(a,e){function j(c,d,m){var n,q;e.enableBuildCallback&&(d&&G(d))&&(d.__requireJsBuild=
!0);if("string"===typeof c){if(G(d))return w(C("requireargs","Invalid require call"),m);if(a&&t(L,c))return L[c](h[a.id]);if(g.get)return g.get(i,c,a,j);n=p(c,a,!1,!0);n=n.id;return!t(r,n)?w(C("notloaded",'Module name "'+n+'" has not been loaded yet for context: '+b+(a?"":". Use require([])"))):r[n]}J();i.nextTick(function(){J();q=s(p(null,a));q.skipMap=e.skipMap;q.init(c,d,m,{enabled:!0});D()});return j}e=e||{};U(j,{isBrowser:z,toUrl:function(b){var d,e=b.lastIndexOf("."),k=b.split("/")[0];if(-1!==
e&&(!("."===k||".."===k)||1<e))d=b.substring(e,b.length),b=b.substring(0,e);return i.nameToUrl(c(b,a&&a.id,!0),d,!0)},defined:function(b){return t(r,p(b,a,!1,!0).id)},specified:function(b){b=p(b,a,!1,!0).id;return t(r,b)||t(h,b)}});a||(j.undef=function(b){x();var c=p(b,a,!0),e=m(h,b);d(b);delete r[b];delete S[c.url];delete $[b];T(A,function(a,c){a[0]===b&&A.splice(c,1)});e&&(e.events.defined&&($[b]=e.events),y(b))});return j},enable:function(a){m(h,a.id)&&s(a).enable()},completeLoad:function(a){var b,
c,d=m(j.shim,a)||{},g=d.exports;for(x();A.length;){c=A.shift();if(null===c[0]){c[0]=a;if(b)break;b=!0}else c[0]===a&&(b=!0);E(c)}c=m(h,a);if(!b&&!t(r,a)&&c&&!c.inited){if(j.enforceDefine&&(!g||!da(g)))return e(a)?void 0:w(C("nodefine","No define call for "+a,null,[a]));E([a,d.deps||[],d.exportsFn])}D()},nameToUrl:function(a,b,c){var d,e,h;(d=m(j.pkgs,a))&&(a=d);if(d=m(aa,a))return i.nameToUrl(d,b,c);if(g.jsExtRegExp.test(a))d=a+(b||"");else{d=j.paths;a=a.split("/");for(e=a.length;0<e;e-=1)if(h=a.slice(0,
e).join("/"),h=m(d,h)){H(h)&&(h=h[0]);a.splice(0,e,h);break}d=a.join("/");d+=b||(/^data\:|\?/.test(d)||c?"":".js");d=("/"===d.charAt(0)||d.match(/^[\w\+\.\-]+:/)?"":j.baseUrl)+d}return j.urlArgs?d+((-1===d.indexOf("?")?"?":"&")+j.urlArgs):d},load:function(a,b){g.load(i,a,b)},execCb:function(a,b,c,d){return b.apply(d,c)},onScriptLoad:function(a){if("load"===a.type||ja.test((a.currentTarget||a.srcElement).readyState))N=null,a=I(a),i.completeLoad(a.id)},onScriptError:function(a){var b=I(a);if(!e(b.id))return w(C("scripterror",
"Script error for: "+b.id,a,[b.id]))}};i.require=i.makeRequire();return i}var g,x,y,D,I,E,N,J,s,O,ka=/(\/\*([\s\S]*?)\*\/|([^:]|^)\/\/(.*)$)/mg,la=/[^.]\s*require\s*\(\s*["']([^'"\s]+)["']\s*\)/g,Q=/\.js$/,ia=/^\.\//;x=Object.prototype;var K=x.toString,fa=x.hasOwnProperty,ha=Array.prototype.splice,z=!!("undefined"!==typeof window&&"undefined"!==typeof navigator&&window.document),ea=!z&&"undefined"!==typeof importScripts,ja=z&&"PLAYSTATION 3"===navigator.platform?/^complete$/:/^(complete|loaded)$/,
Y="undefined"!==typeof opera&&"[object Opera]"===opera.toString(),F={},q={},R=[],M=!1;if("undefined"===typeof define){if("undefined"!==typeof requirejs){if(G(requirejs))return;q=requirejs;requirejs=void 0}"undefined"!==typeof require&&!G(require)&&(q=require,require=void 0);g=requirejs=function(b,c,d,e){var n,p="_";!H(b)&&"string"!==typeof b&&(n=b,H(c)?(b=c,c=d,d=e):b=[]);n&&n.context&&(p=n.context);(e=m(F,p))||(e=F[p]=g.s.newContext(p));n&&e.configure(n);return e.require(b,c,d)};g.config=function(b){return g(b)};
g.nextTick="undefined"!==typeof setTimeout?function(b){setTimeout(b,4)}:function(b){b()};require||(require=g);g.version="2.1.15";g.jsExtRegExp=/^\/|:|\?|\.js$/;g.isBrowser=z;x=g.s={contexts:F,newContext:ga};g({});v(["toUrl","undef","defined","specified"],function(b){g[b]=function(){var c=F._;return c.require[b].apply(c,arguments)}});if(z&&(y=x.head=document.getElementsByTagName("head")[0],D=document.getElementsByTagName("base")[0]))y=x.head=D.parentNode;g.onError=ca;g.createNode=function(b){var c=
b.xhtml?document.createElementNS("http://www.w3.org/1999/xhtml","html:script"):document.createElement("script");c.type=b.scriptType||"text/javascript";c.charset="utf-8";c.async=!0;return c};g.load=function(b,c,d){var e=b&&b.config||{};if(z)return e=g.createNode(e,c,d),e.setAttribute("data-requirecontext",b.contextName),e.setAttribute("data-requiremodule",c),e.attachEvent&&!(e.attachEvent.toString&&0>e.attachEvent.toString().indexOf("[native code"))&&!Y?(M=!0,e.attachEvent("onreadystatechange",b.onScriptLoad)):
(e.addEventListener("load",b.onScriptLoad,!1),e.addEventListener("error",b.onScriptError,!1)),e.src=d,J=e,D?y.insertBefore(e,D):y.appendChild(e),J=null,e;if(ea)try{importScripts(d),b.completeLoad(c)}catch(m){b.onError(C("importscripts","importScripts failed for "+c+" at "+d,m,[c]))}};z&&!q.skipDataMain&&T(document.getElementsByTagName("script"),function(b){y||(y=b.parentNode);if(I=b.getAttribute("data-main"))return s=I,q.baseUrl||(E=s.split("/"),s=E.pop(),O=E.length?E.join("/")+"/":"./",q.baseUrl=
O),s=s.replace(Q,""),g.jsExtRegExp.test(s)&&(s=I),q.deps=q.deps?q.deps.concat(s):[s],!0});define=function(b,c,d){var e,g;"string"!==typeof b&&(d=c,c=b,b=null);H(c)||(d=c,c=null);!c&&G(d)&&(c=[],d.length&&(d.toString().replace(ka,"").replace(la,function(b,d){c.push(d)}),c=(1===d.length?["require"]:["require","exports","module"]).concat(c)));if(M){if(!(e=J))N&&"interactive"===N.readyState||T(document.getElementsByTagName("script"),function(b){if("interactive"===b.readyState)return N=b}),e=N;e&&(b||
(b=e.getAttribute("data-requiremodule")),g=F[e.getAttribute("data-requirecontext")])}(g?g.defQueue:R).push([b,c,d])};define.amd={jQuery:!0};g.exec=function(b){return eval(b)};g(q)}})(this);

define("requireLib", function(){});

define('workspace/workspaceService',[],function () {
// define(['angular'], function (angular) {
	
	var workspaceService = angular.module('WorkspaceService', []);
	
	var mediaLightbox;
	
	var updateIndex	=	function(items){
		
		jQuery.each(items, function(index, item){
		
			item.index = index;
			
		});
	};
	
	var getMaxOrderItems	=	function(items){
		
		var order	=	0;
		
		jQuery.each(items, function(index, item){
		
			if(item.zindex > order)
				order	=	item.zindex;
			
		});
		
		return parseInt(order + 1);
	}
	
	var getMaxOrderSlides	=	function(slides){
		
		var order	=	0;
		
		jQuery.each(slides, function(index, item){
		
			if(item.orderIndex > order)
				order	=	item.orderIndex;
			
		});
		
		return parseInt(order + 1);
	}
	
	workspaceService
	.factory('SettingFactory', function($rootScope){
		
		var validateGoogleFont	=	function(src){
			
			if(angular.isUndefined(src)) return;
			
			var fonts	=	src.split('|');
			
			WebFont.load({
			    google: {
			      families: fonts
			    }
			});
			
		};
		
		return {
			update: function(data){
				
				if(!angular.isUndefined(data)){
					
					if(typeof data.fontGoogle != 'undefined'){
						
						validateGoogleFont(data.fontGoogle);
					}
					
					angular.extend($rootScope.settings, data);
					
					console.log($rootScope.settings);
				}
			},
			setup: function(){
				
				validateGoogleFont($rootScope.settings.fontGoogle);
			}
		}
		
	})
	.factory('GalleryFactory', function($rootScope){
		
		return {};
	})
	.factory('SlideFactory', function($rootScope, GalleryFactory){
		
		return {
			new: 	function( kind ){
				
				var items		=	$rootScope.slides[$rootScope.slide].items;
				
				updateIndex(items);
				
				var zindex	=	getMaxOrderItems(items);
				
				var data	=	{
					name: 'New Element',
					top: 100, left: 200, 
					width: 100, height: 100,
					zindex: 	zindex,
					speed: 		1000,
					delay: 		0,
					effectIn: 	{name: 'awsfadeIn', duration: 200},
					effectOut: 	{name: 'awsfadeOut', duration: 100},
					timing: 	{name: 'custom'},
					index: 		items.length,
					src_img: 	false
				};
				
				
				switch(kind){
					case 'text':
						data.kind		=	'text';
						data.content	=	'INPUT TEXT HERE '+items.length;
						data.bgColor	=	'transparent';
						data.padTop		=	0;
						data.padBottom	=	0;
						data.padLeft	=	0;
						data.padRight	=	0;
						data.attrClass	=	'text';
						data.fontSize	=	30;
						data.fontWeight	=	'bold';
						data.width 		=	300;
						
						items.push(data);

						$rootScope.$broadcast('changeItems');
						
						break;
					case 'video':
						data.kind		=	'video';
						data.attrClass	=	'video';
						data.width 		=	420;
						data.height 	=	315;
						data.ratio		=	data.width/data.height;
						data.from		=	'youtube';
						data.src		=	'';
						data.isAuto		=	"0";
						
						items.push(data);

						$rootScope.$broadcast('changeItems');
						
						break;
					default:
						data.kind		=	'image';
						data.attrClass	=	'image';
						
						this.newImage(items, data);
						break;
				}
				
				
			},
			newImage: function(items, data_src){
				
				var items		=	$rootScope.slides[$rootScope.slide].items;
				
				updateIndex(items);
				
				var zindex	=	getMaxOrderItems(items);
				
				
				if ( mediaLightbox ) {
				      mediaLightbox.open();
				      return;
				    }
								
				mediaLightbox	=	wp.media({
					  title: 'Select or Upload Media Of Your Chosen Persuasion',
					  button: {
					    text: 'Use this media'
					  },
					  multiple: false  // Set to true to allow multiple files to be selected
				});
				
				mediaLightbox.on( 'select', function() {		      
			  	  	
					var items		=	$rootScope.slides[$rootScope.slide].items;
					
					var attachment	=	mediaLightbox.state().get('selection').first().toJSON();
					
					var data		=	{
											name: 'New Element',
											top: 100, left: 200, 
											width: 100, height: 100,
											zindex: 	zindex,
											speed: 		1000,
											delay: 		0,
											effectIn: 	{name: 'awsfadeIn', duration: 200},
											effectOut: 	{name: 'awsfadeOut', duration: 100},
											timing: 	{name: 'custom'},
											index: 		items.length,
											src_img: 	false,
											kind:		'image',
											attrClass:	'image'
										}; 
					
					data.src_img	=	attachment.url;
					data.srcId		=	[attachment.id];
					
					data.ratio		=	attachment.width / attachment.height;
					data.width 		=	150;
					data.height 	=	150/data.ratio;
					
					items.push(data);
					
					$rootScope.$broadcast('changeItems');

					$rootScope.$apply();
					
					
	 				
				});
				
				mediaLightbox.open();
			},
			delete: function(index){
				
				if(typeof index != 'undefined' || index >= 0){
					
					var items	=	$rootScope.slides[$rootScope.slide].items;
					
					items.splice(index, 1);
					
					updateIndex(items);
					
					$rootScope.$broadcast('changeItems');
				}
			},
			double: function(index){
				
				if(typeof index != 'undefined' && index >= 0){
					
					var items	=	$rootScope.slides[$rootScope.slide].items;
					
					var item	=	angular.copy(items[index]);
					
					item.top	+=	10;
					item.left	+=	10;
					item.zindex	=	getMaxOrderItems(items);
					
					items.push(item);
					
					updateIndex(items);
					
					$rootScope.$broadcast('changeItems');
				}
			},
			update: function(index, data){
				
				if(!angular.isUndefined(data)){
					
					data	=	angular.extend($rootScope.item.data, data);
					
					var element	=	$rootScope.slides[$rootScope.slide].items[index];
					
					switch(element.kind){
						case 'text':
							element.height 	=	parseInt(element.fontSize) + parseInt(element.padTop) + parseInt(element.padBottom);
							
						break;
						case 'image':
							
							
						break;
					}
					
					angular.extend(element, data);
					
					$rootScope.$broadcast('changeItems');
				}
			}
		};
		
	})
	.factory('SlidesFactory', ['$resource', '$rootScope', function($resource, $rootScope){
		
		var resource	=	$resource(ajax_object.ajax_url, {id:ajax_object.id, action:'aws_slide'}, {
									query: {method:'GET', params: {action:'aws_slides'}, isArray:false},
									getSlide: {method: 'GET', isArray:false, params: {action:'aws_slide'}},
									getSlides: {method: 'GET', isArray:false, params: {action:'aws_slides'}},
									save: {method: 'POST', params:{action:'aws_save_slides'} }
								});
		
		return {
			getResource: function(){
				
				return resource;
			},
			getSlides: function(){
				
				return resource.getSlides();
				
			},
			save: function(){
				
				
				
			},
			newSlide: function(){
				
				var slides	=	$rootScope.slides;
				
				updateIndex(slides);
				
				var newSlide	=	{
					orderIndex: getMaxOrderSlides(slides),
					settings: {published: 1, total: 0},
					styles: {bgColor: '#FFF', bgImage: false, bgImageId: [], from: 'color'},
					effects: {
						duration: 	1000,
						name: 		'awsfade'
					},
					effectIn: {
						duration: 	1000,
						name: 		'awsfade'
					},
					v_effectIn: {
						duration: 	1000,
						name: 		'aws'
					},
					h_effectIn: {
						duration: 	1000,
						name: 		'aws'
					},
					effectOut: {
						duration: 	1000,
						name: 		'awsfadeOut'
					},
					v_effectOut: {
						duration: 	1000,
						name: 		'bg_verticalOut'
					},
					h_effectOut: {
						duration: 	1000,
						name: 		'bg_horizontalOut'
					},
					title: 		'New Slide',
					items: 		[],
					index: 		slides.length,
					duration: 	4000
				};
				
				$rootScope.slides.push(newSlide);
				
				$rootScope.$broadcast('changeSlide');
			},
			doubleSlide: function(index){
				
				if(typeof index != 'undefined' && index >= 0){
				
					var slides	=	$rootScope.slides,
						slide	=	angular.copy(slides[index]);
					
					slide.orderIndex	=	getMaxOrderSlides(slides);
					
					$rootScope.slides.push(slide);
				
					updateIndex(slides);
				}
			},
			deleteSlide: function(index){
				
				$rootScope.slides.splice(index, 1);
				
				if($rootScope.slide >= 0){
					$rootScope.slide--;
					
					updateIndex($rootScope.slides);
				}
			},
			published: function(index){
				
				var settings	=	$rootScope.slides[index].settings;
				
				if(settings.published == 0){
					
					settings.published = 1;
					
				}else{
					
					settings.published = 0;
				}	
			},
			addBackground: function(element, bgColor, bgImage) {
				
				if(typeof bgImage != 'undefined' && bgImage != ''){
					
					element.css('background-image', 'url('+bgImage+')');
					
				}else{
					
					element.css('background-image', 'none');
				}
				
				element.css('background-color', bgColor);
				
			},
			updateOrder: function(){
				
			}
		}
		
	}]);
	
	return workspaceService;
});

	
define('awsui/awsuiModule',['workspace/workspaceService'], function (WorkspaceService) {
		
	var AwsuiModule = angular.module('AwsuiModule', ['WorkspaceService']);
	
	AwsuiModule.directive('awsAccordion', function(){
		
		return {
			transclude: true,
			controller: function($scope, $element, $attrs, $transclude){
				
				this.closeAll = function(group){
			
					$element.find('.in').not(group).removeClass('in');
				}
				
			},
			template: 	'<div class="panel-group" ng-transclude></div>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				element.addClass('ui-1');
				
				element.find('.accordion-toggle').click(function(e){
					
					
					e.preventDefault();
				});
			}
		};
	})
	.directive('awsAccordionGroup', function(){
		
		return {
			scope: {
				title: '@heading'
			},
			require: '^awsAccordion',
			transclude: true,
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			template: 	'<div class="panel-heading">'+
						'<h4 class="panel-title">'+
						'<a href="#" class="accordion-toggle" ng-click="toggleOpen($event)">'+
						'<span>{{title}}</span></a>'+
						'</h4></div>'+
						'<div class="panel-collapse collapse" ng-transclude></div>',
			link: function ($scope, element, attrs, accordionCtrl) {
				
				
				$scope.toggleOpen	=	function($event, d){
					
					var elthis	=	$event.currentTarget || $event.srcElement;
					var group	=	angular.element(elthis).closest('aws-accordion-group')
					
					accordionCtrl.closeAll(group);
					
					group.toggleClass('in');
					
					$event.preventDefault();
					
					
				}
				
				element.addClass('panel');
			}
		};
		
	})
	.directive('awsTabs', function(){
		
		return {
			transclude: true,
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			template: '<div class="tabs-group" ng-transclude></div>',
			link: function ($scope, element, attrs, accordionCtrl) {
				
				element.find('.tab-title a').eq(0).addClass('active');
				element.find('.tab-content').children('div').eq(0).addClass('active');
				
				element.find('.tab-title a').click(function(e){
					
					var content	=	element.find('.tab-content').find('.'+jQuery(this).data('id'));
					
					element.find('.active').removeClass('active');
					
					jQuery(this).addClass('active');
					content.addClass('active');
					
					e.preventDefault();
				})
			}
		};
	});
	
		
	return AwsuiModule;
});

	
define('workspace/workspaceController',['module'], function (module) {
	
	var workspaceController	= function($rootScope, $scope, $filter, SlidesFactory, SettingFactory){
		
		var orderBy = $filter('orderBy');
		
		
		$rootScope.heightWorkspace		=	600;
		$rootScope.heightSlideScroller	=	$rootScope.heightWorkspace - 200;
		
		$rootScope.settings	=	{
			width: 1170, height: 600, isAuto: 0, isPhone: 0, isResponsive: 1, isNavigation: 1, 
			isFullwindow: 0, isFullwidth: 1, isPagination: 0, isProgress: 0, direction: 'fade',
			fontGoogle: 'Open+Sans:400,800,700'
		};
		
		$rootScope.slides	=	[];
		
		$rootScope.slide	=	0;	//Index current slide
		
		$rootScope.items	=	[];
		
		$rootScope.resource	=	{};
		
		$rootScope.multipleSelection	=	{isEnable: false, data: []};
		
		multiSelection($rootScope);
		keyAction($rootScope);
		
		var resourceData	=	[];
		
		SlidesFactory.getSlides().$promise.then(function(data){
			
			if(!angular.isUndefined(data.slides) && !angular.isUndefined(data.settings)){
				$rootScope.slides 	=	orderBy(data.slides, 'orderIndex');
				$rootScope.settings	=	data.settings;
				
			}else{
				data.slides		=	$rootScope.slides;
				data.settings	=	$rootScope.settings;
			}
			
			SettingFactory.setup();
						
			resourceData	=	data;
		});
		
		$scope.save	=	function($event){
			
			resourceData.slides		=	$rootScope.slides;
			resourceData.settings	=	$rootScope.settings;
			
			resourceData.$save(function(data, getResponseHeaders){
				
				jQuery('#post_edit').submit();
			});

			$event.preventDefault();
		};
		
		$rootScope.$watch('slides', function(newValue, oldValue){

			if(newValue == oldValue) return;
			
			

		}, true);
		
		$scope.multipleSelect	=	function(event){
			
			if($rootScope.multipleSelection.isEnable){
				
				$rootScope.multipleSelection.isEnable	=	false;
				
				$rootScope.multipleSelection.data  		=	[];
				
				$rootScope.$broadcast('releaseSelection');
				
				
				
			}else{
				
				$rootScope.multipleSelection.isEnable	=	true;
			}
			
			event.preventDefault();
		}
		
		
		$rootScope.$on('elementSelected', function(event, data){
			
			if((jQuery.inArray(data.index, $rootScope.multipleSelection.data) == -1) && $rootScope.multipleSelection.isEnable){
				$rootScope.multipleSelection.data.push(data.index);
			}
			
		});
		
		$rootScope.mediaLightbox	=	wp.media({
		  title: 'Select or Upload Media Of Your Chosen Persuasion',
		  button: {
		    text: 'Insert'
		  },
		  multiple: false  // Set to true to allow multiple files to be selected
		});
		
	    $rootScope.mediaLightbox.on( 'select', function() {

 			$rootScope.mediaLightboxOnSelect();

 	    });

 		$rootScope.mediaLightbox.on( 'close', function() {

 			$rootScope.mediaLightboxOnClose();

 		});

 		$rootScope.mediaLightbox.on( 'open', function() {

 			$rootScope.mediaLightboxOnOpen();

 		});
		
	};
	
	
	function multiSelection( $rootScope ){
		
		$rootScope.selectedElements	=	[];
		
		Mousetrap.bind('shift', function(e){
			
			$rootScope.keyShiftdown	=	true;
			
		}, 'keydown');
		
		Mousetrap.bind('shift', function(e){
		
			$rootScope.keyShiftdown				=	false;
			
			$rootScope.$broadcast('shiftup');
			
		}, 'keyup');
	}
	
	function keyAction( $rootScope ){
	
		Mousetrap.bind('right', function(e){
			
			jQuery('body').css('overflow', 'hidden');
			
			var item = $rootScope.slides[$rootScope.slide].items[$rootScope.item.data.index];
			
			item.left++;
			
			$rootScope.$apply();
			
		}, 'keydown');
		
		Mousetrap.bind('left', function(e){
			
			jQuery('body').css('overflow', 'hidden');
						
			var item = $rootScope.slides[$rootScope.slide].items[$rootScope.item.data.index];
			
			item.left--;
			
			$rootScope.$apply();
			
		}, 'keydown');
		
		Mousetrap.bind('up', function(e){
			
			jQuery('body').css('overflow', 'hidden');
						
			var item = $rootScope.slides[$rootScope.slide].items[$rootScope.item.data.index];
			
			item.top--;
			
			$rootScope.$apply();
			
			
		}, 'keydown');
		
		Mousetrap.bind('down', function(e){
			
			jQuery('body').css('overflow', 'hidden');
			
			var item = $rootScope.slides[$rootScope.slide].items[$rootScope.item.data.index];
			
			item.top++;
			
			$rootScope.$apply();
			
		}, 'keydown');
		
		Mousetrap.bind(['down', 'up', 'left', 'right'], function(){
			
			jQuery('body').css('overflow', 'scroll');
			
		}, 'keyup');
	}
	
	return workspaceController;
	
});
(function( $ ){

define('lightbox',[],function () {
	
var $awslightbox	=	function(el, options) {
	
	var self = this;
	
	var settings = jQuery.extend( {
		responsive: 	1,
		width: 			'100%',
		height: 		450,
		title: 			jQuery(el).data('title'),
		auto: 			false,
		progress: 		false,
		viewport: 		1,
		effect: 		'fade',
		direction: 		'horizontal',
		navigation: 	true,
		nextprev: 		false,
		duration: 		2000,
		afterDisplay: 	function(){},
		afterClose: 	function(){},
		okAction: 		function(){},
		cancelAction: 	function(){},
		type: 			'image',
		dialog: 		false,
		ajaxUrl: 		'',
		ajaxGetData: 	function(){},
		media: [{name:'aws-media-lg', value:'(min-width: 1200px)'},
				{name:'aws-media-md', value:'(min-width: 992px) and (max-width:1199px)'}, 
				{name:'aws-media-sm', value:'(min-width: 768px) and (max-width:991px)'}, 
				{name:'aws-media-xs', value:'max-width: 767px'}]
	}, options);
	
	
	var action	=	{
		init: function(){
			
			this.$el	=	jQuery(el);
			this.el		=	el;
	
			this.$el.data('awslightbox', this);
			
			this.loadEvents();
		},
		render: function(){
			
			var _self	=	this;
			
			jQuery('.awslightbox').remove();
			
			this.$elLigthbox	=	$('<div class="awslightbox"/>');
			this.$elContent		=	$('<div class="content" />');
			this.$elContentBody	=	$('<div class="content-body" />');
			this.$elClose		=	$('<a href="#" class="fa fa-times awsclose" />');
			this.$elAction		=	$('<div class="actions"/>');
			this.$elOkAction	=	$('<a href="#" class="aws-button-s1 ok_action">OK</a>');
			
			
			
			if(settings.title){
				this.$elTitle	=	$('<div class="title" />');
				this.$elTitle.html(settings.title);
			}
			
			this.$elContent.append(this.$elClose);
			this.$elContent.append(this.$elTitle);
			this.$elContent.append(this.$elContentBody);
			this.$elLigthbox.append(this.$elContent);
			
			if(settings.dialog){
				
				
				this.$elAction.append(this.$elOkAction);
				this.$elContent.append(this.$elAction);
			}
		
			$('body').append(this.$elLigthbox);
		
			setTimeout(function(){
				
				_self.$elLigthbox.addClass('is-show-awslightbox');
				
				_self.setContent();
				
			}, 100);
			
			this.$elClose.click(function(e){
				
				_self.close();
				
				e.preventDefault();
			});
		},
		setContent: function(){
			var _self	=	this;
			
			switch(settings.type){
				case 'content':
					
					this.$elContentBody.html(this.el);
					
					settings.afterDisplay(_self);
					
					break;
				case 'image':
					
					break;
				case 'ajax':
										
					// $.getJSON(settings.ajaxUrl, _self.ajaxData, function(data){
//
// 						_self.$elContentBody.html(data.content);
//
// 						settings.afterDisplay(_self, data);
// 					});
					
					$.get(settings.ajaxUrl, function(data){
						
						_self.$elContentBody.html(data);
						
						settings.afterDisplay(_self, data);
					});
					break;
			}
			
		},
		close: function(){
			var _self	=	this;
			
			
			this.$elLigthbox.addClass('is-hide-awslightbox');
			
			setTimeout(function(){
				
				_self.$elLigthbox.removeClass('is-hide-awslightbox');
				_self.$elLigthbox.removeClass('is-show-awslightbox');
				_self.$elLigthbox.remove();
				
				settings.afterClose(_self);
				
			}, 500);	
		},
		show: function(){
			
			var _self	=	this;
			
			this.render();
			this._setMedia();
			
			if(settings.dialog){
			
				this.$elOkAction.click(function(e){
					e.preventDefault();
				
					settings.okAction(_self);
				
					_self.close();
				
				
				});
			
				// this.$el.find('.cancel_action').click(function(e){
//
// 					_self.cancelAction();
//
// 					e.preventDefault();
// 				});
			}
		},
		loadEvents: function(){
			
			var _self	=	this;
			
			this._fullsize();
		
			this.$el.click(function(e){
				
				_self.ajaxData	=	settings.ajaxGetData(_self, $(this));
				_self.render();
				_self._setMedia();
				
				e.preventDefault();
			});
			
			
			
			$(window).resize(function(e){
				
				
				_self._setMedia();
			});
		
		},
		_setMedia: function() {
			
			var _self	=	this;
			
			var i = 0;
			
			while(settings.media[i]){
				
				if(Modernizr.mq(settings.media[i].value)){
					
					var media	=	settings.media[i].name;
					
					if(jQuery('.awslightbox').data('media'))
						jQuery('.awslightbox').removeClass($('.awslightbox').data('media'))
						
					jQuery('.awslightbox').addClass(media);
					jQuery('.awslightbox').data('media', media);
					
					break;
				}
				
				i++;
			}
			
		},
		_fullsize: function(){
			
			var _self	=	this;
			
			if(this.$el.width() > $(window).width()) {
				this.$el.width($(window).width());
			}
			
			if(this.$el.height() > $(window).height()) {
				this.$el.height($(window).height());
			}
		}
		
	};
	
	action.init();
	
	this.show =	function(){
		
		action.show();
	}
}

return $awslightbox;

});

})( jQuery );

	
define('workspace/workspaceDirective',['lightbox'], function (awslightbox) {
	
	return function($compile, $rootScope, SlideFactory, SettingFactory, Path){
		
		return {
			transclude: true,
			templateUrl: Path.template+'templates/workspace.html',
			link: function ($scope, element, attribute, controller, transcludeFn) {
				
				jQuery('#workspace').height($rootScope.heightWorkspace);
				
				jQuery('#workspace .place-2').height(($rootScope.heightWorkspace - 30));
				
				$scope.settings			=	$rootScope.settings;
				
				$scope.iscroll			=	new IScroll('#wrapper_scroller', { scrollX: true, scrollY: true, mouseWheel: true, disableMouse:true, disablePointer:true, scrollbars: 'custom', interactiveScrollbars:true });
				
				$rootScope.$watchGroup(['settings.width', 'settings.height'], function(newValue, oldValue){
					
					if(newValue < 100) return;
					
					var widthContainer	=	parseInt($rootScope.settings.width),
						heightContainer	=	parseInt($rootScope.settings.height);
				
					var widthScroller	=	widthContainer + 1000,
						heightScroller	=	heightContainer + 1000;
				
					element.find('#wrapper_scroller .scroller').width(widthScroller).height(heightScroller);
					element.find('.container-elements').width(widthContainer).height(heightContainer);
					
					setTimeout(function () {
						$scope.iscroll.scrollToElement(document.querySelector('#wrapper_scroller .container-elements'), 10);
						$scope.iscroll.refresh();
					}, 0);
						
					
				}, true);
								
				document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
				
				$scope.preview	=	function($event){
					
					var previewTpl	=	'<workspacepreview class="aws-lightbox" width="{{settings.width}}" height="{{settings.height}}"></workspacepreview>',
						previewCpl	=	 $compile(previewTpl);
					
						previewCpl($scope, function(clonedElement, $scope){
							
				    		jQuery('body').append(clonedElement);
							
						});
					
					$event.preventDefault();
				};
				
				
				$scope.showSettings	=	function($event){
					
					var settings	=	 $compile('<div toolbarpanel-setting class="elementsetting"></div>');
				
						settings($scope, function(clonedElement, $scope){
							
							$scope.settings	=	$rootScope.settings;
							
							$scope.updateSettings = function(data){
								
								SettingFactory.update(data);
					
							}
							
							var lightboxSettings	=	new awslightbox(clonedElement, {
								type:'content',
								dialog: true,
								okAction: function(awslightbox){
									
									$rootScope.$apply();
								}
							});
					
							lightboxSettings.show();
						
						});
					
					$event.preventDefault();
				}
				
				$scope.createElement	=	function(name, $event){
					
					SlideFactory.new(name);
					
					$event.preventDefault();
				};

			}
		};
	};
});

	
define('workspace/previewDirective',[],function () {
	
	
	
	return function($compile, $rootScope, Path){
		
		return {
			transclude: true,
			templateUrl: Path.template+'templates/preview.html',
			link: function ($scope, element, attribute, controller, transcludeFn) {
				
				$scope.settings	=	$rootScope.settings;
				$scope.slides	=	$rootScope.slides;
				
				element.find('.preview').css({width: $scope.settings.width, height: $scope.settings.height});
				
				$scope.$watch('slides', function(){
					
					setTimeout(function(){
						
						jQuery(element).find('.aws_slideshow_wrap').awslideshow({
							type: $scope.settings.direction,
							responsive: $scope.settings.isResponsive,
							isfullwindow: 0,
							ispagination: $scope.settings.isPagination,
							isProgress: $scope.settings.isProgress,
							isAuto: $scope.settings.isAuto,
							pagination: true,
							preload: false,
							progress_theme: 'bars'
						});
					}, 500);
					
				}, true);
				
									
				$scope.closeLightbox	=	function(){
					
					element.remove();
				}
			}
		};
	};
});

	
define('workspace/workspaceEditorDirective',[],function () {
	
	return function(){
		
		return {
			transclude: true,
			templateUrl: ajax_object.plugin_url+'js/angularjs/app/workspace/editor.html',
			link: function ($scope, element, attribute) {
				
				$scope.vp = 'EAFASDF';
			}
		};
	};
});

	
define('elements/elementsController',[],function () {
	
	return function($scope){
		
		$scope.attr1	=	'ATTR1';
		$scope.attr2	=	'ATTR2';
	};
	
});
/*
 AngularJS v1.4.0-rc.1
 (c) 2010-2015 Google, Inc. http://angularjs.org
 License: MIT
*/
(function(Q,V,t){function G(b){return function(){var a=arguments[0],c;c="["+(b?b+":":"")+a+"] http://errors.angularjs.org/1.4.0-rc.1/"+(b?b+"/":"")+a;for(a=1;a<arguments.length;a++){c=c+(1==a?"?":"&")+"p"+(a-1)+"=";var d=encodeURIComponent,e;e=arguments[a];e="function"==typeof e?e.toString().replace(/ \{[\s\S]*$/,""):"undefined"==typeof e?"undefined":"string"!=typeof e?JSON.stringify(e):e;c+=d(e)}return Error(c)}}function Qa(b){if(null==b||Ra(b))return!1;var a=b.length;return b.nodeType===
na&&a?!0:M(b)||L(b)||0===a||"number"===typeof a&&0<a&&a-1 in b}function n(b,a,c){var d,e;if(b)if(E(b))for(d in b)"prototype"==d||"length"==d||"name"==d||b.hasOwnProperty&&!b.hasOwnProperty(d)||a.call(c,b[d],d,b);else if(L(b)||Qa(b)){var f="object"!==typeof b;d=0;for(e=b.length;d<e;d++)(f||d in b)&&a.call(c,b[d],d,b)}else if(b.forEach&&b.forEach!==n)b.forEach(a,c,b);else for(d in b)b.hasOwnProperty(d)&&a.call(c,b[d],d,b);return b}function Nd(b,a,c){for(var d=Object.keys(b).sort(),e=0;e<d.length;e++)a.call(c,
b[d[e]],d[e]);return d}function kc(b){return function(a,c){b(c,a)}}function Od(){return++jb}function lc(b,a){a?b.$$hashKey=a:delete b.$$hashKey}function Kb(b,a,c){for(var d=b.$$hashKey,e=0,f=a.length;e<f;++e){var g=a[e];if(D(g)||E(g))for(var h=Object.keys(g),l=0,k=h.length;l<k;l++){var m=h[l],r=g[m];c&&D(r)?(D(b[m])||(b[m]=L(r)?[]:{}),Kb(b[m],[r],!0)):b[m]=r}}lc(b,d);return b}function O(b){return Kb(b,pa.call(arguments,1),!1)}function Pd(b){return Kb(b,pa.call(arguments,1),!0)}function aa(b){return parseInt(b,
10)}function Lb(b,a){return O(Object.create(b),a)}function x(){}function Sa(b){return b}function oa(b){return function(){return b}}function v(b){return"undefined"===typeof b}function z(b){return"undefined"!==typeof b}function D(b){return null!==b&&"object"===typeof b}function M(b){return"string"===typeof b}function T(b){return"number"===typeof b}function ea(b){return"[object Date]"===qa.call(b)}function E(b){return"function"===typeof b}function Ta(b){return"[object RegExp]"===qa.call(b)}function Ra(b){return b&&
b.window===b}function Ua(b){return b&&b.$evalAsync&&b.$watch}function Va(b){return"boolean"===typeof b}function mc(b){return!(!b||!(b.nodeName||b.prop&&b.attr&&b.find))}function Qd(b){var a={};b=b.split(",");var c;for(c=0;c<b.length;c++)a[b[c]]=!0;return a}function ra(b){return F(b.nodeName||b[0]&&b[0].nodeName)}function Wa(b,a){var c=b.indexOf(a);0<=c&&b.splice(c,1);return c}function sa(b,a,c,d){if(Ra(b)||Ua(b))throw Ca("cpws");if(nc.test(qa.call(a)))throw Ca("cpta");if(a){if(b===a)throw Ca("cpi");
c=c||[];d=d||[];if(D(b)){var e=c.indexOf(b);if(-1!==e)return d[e];c.push(b);d.push(a)}if(L(b))for(var f=a.length=0;f<b.length;f++)e=sa(b[f],null,c,d),D(b[f])&&(c.push(b[f]),d.push(e)),a.push(e);else{var g=a.$$hashKey;L(a)?a.length=0:n(a,function(b,c){delete a[c]});for(f in b)b.hasOwnProperty(f)&&(e=sa(b[f],null,c,d),D(b[f])&&(c.push(b[f]),d.push(e)),a[f]=e);lc(a,g)}}else if(a=b)L(b)?a=sa(b,[],c,d):nc.test(qa.call(b))?a=new b.constructor(b):ea(b)?a=new Date(b.getTime()):Ta(b)?(a=new RegExp(b.source,
b.toString().match(/[^\/]*$/)[0]),a.lastIndex=b.lastIndex):D(b)&&(e=Object.create(Object.getPrototypeOf(b)),a=sa(b,e,c,d));return a}function fa(b,a){if(L(b)){a=a||[];for(var c=0,d=b.length;c<d;c++)a[c]=b[c]}else if(D(b))for(c in a=a||{},b)if("$"!==c.charAt(0)||"$"!==c.charAt(1))a[c]=b[c];return a||b}function ja(b,a){if(b===a)return!0;if(null===b||null===a)return!1;if(b!==b&&a!==a)return!0;var c=typeof b,d;if(c==typeof a&&"object"==c)if(L(b)){if(!L(a))return!1;if((c=b.length)==a.length){for(d=0;d<
c;d++)if(!ja(b[d],a[d]))return!1;return!0}}else{if(ea(b))return ea(a)?ja(b.getTime(),a.getTime()):!1;if(Ta(b))return Ta(a)?b.toString()==a.toString():!1;if(Ua(b)||Ua(a)||Ra(b)||Ra(a)||L(a)||ea(a)||Ta(a))return!1;c={};for(d in b)if("$"!==d.charAt(0)&&!E(b[d])){if(!ja(b[d],a[d]))return!1;c[d]=!0}for(d in a)if(!c.hasOwnProperty(d)&&"$"!==d.charAt(0)&&a[d]!==t&&!E(a[d]))return!1;return!0}return!1}function Xa(b,a,c){return b.concat(pa.call(a,c))}function oc(b,a){var c=2<arguments.length?pa.call(arguments,
2):[];return!E(a)||a instanceof RegExp?a:c.length?function(){return arguments.length?a.apply(b,Xa(c,arguments,0)):a.apply(b,c)}:function(){return arguments.length?a.apply(b,arguments):a.call(b)}}function Rd(b,a){var c=a;"string"===typeof b&&"$"===b.charAt(0)&&"$"===b.charAt(1)?c=t:Ra(a)?c="$WINDOW":a&&V===a?c="$DOCUMENT":Ua(a)&&(c="$SCOPE");return c}function Ya(b,a){if("undefined"===typeof b)return t;T(a)||(a=a?2:null);return JSON.stringify(b,Rd,a)}function pc(b){return M(b)?JSON.parse(b):b}function qc(b,
a){var c=Date.parse("Jan 01, 1970 00:00:00 "+b)/6E4;return isNaN(c)?a:c}function Mb(b,a,c){c=c?-1:1;var d=qc(a,b.getTimezoneOffset());a=b;b=c*(d-b.getTimezoneOffset());a=new Date(a.getTime());a.setMinutes(a.getMinutes()+b);return a}function ta(b){b=C(b).clone();try{b.empty()}catch(a){}var c=C("<div>").append(b).html();try{return b[0].nodeType===Za?F(c):c.match(/^(<[^>]+>)/)[1].replace(/^<([\w\-]+)/,function(a,b){return"<"+F(b)})}catch(d){return F(c)}}function rc(b){try{return decodeURIComponent(b)}catch(a){}}
function sc(b){var a={},c,d;n((b||"").split("&"),function(b){b&&(c=b.replace(/\+/g,"%20").split("="),d=rc(c[0]),z(d)&&(b=z(c[1])?rc(c[1]):!0,tc.call(a,d)?L(a[d])?a[d].push(b):a[d]=[a[d],b]:a[d]=b))});return a}function Nb(b){var a=[];n(b,function(b,d){L(b)?n(b,function(b){a.push(ua(d,!0)+(!0===b?"":"="+ua(b,!0)))}):a.push(ua(d,!0)+(!0===b?"":"="+ua(b,!0)))});return a.length?a.join("&"):""}function kb(b){return ua(b,!0).replace(/%26/gi,"&").replace(/%3D/gi,"=").replace(/%2B/gi,"+")}function ua(b,a){return encodeURIComponent(b).replace(/%40/gi,
"@").replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%3B/gi,";").replace(/%20/g,a?"%20":"+")}function Sd(b,a){var c,d,e=Ka.length;for(d=0;d<e;++d)if(c=Ka[d]+a,M(c=b.getAttribute(c)))return c;return null}function Td(b,a){var c,d,e={};n(Ka,function(a){a+="app";!c&&b.hasAttribute&&b.hasAttribute(a)&&(c=b,d=b.getAttribute(a))});n(Ka,function(a){a+="app";var e;!c&&(e=b.querySelector("["+a.replace(":","\\:")+"]"))&&(c=e,d=e.getAttribute(a))});c&&(e.strictDi=null!==Sd(c,"strict-di"),
a(c,d?[d]:[],e))}function uc(b,a,c){D(c)||(c={});c=O({strictDi:!1},c);var d=function(){b=C(b);if(b.injector()){var d=b[0]===V?"document":ta(b);throw Ca("btstrpd",d.replace(/</,"&lt;").replace(/>/,"&gt;"));}a=a||[];a.unshift(["$provide",function(a){a.value("$rootElement",b)}]);c.debugInfoEnabled&&a.push(["$compileProvider",function(a){a.debugInfoEnabled(!0)}]);a.unshift("ng");d=$a(a,c.strictDi);d.invoke(["$rootScope","$rootElement","$compile","$injector",function(a,b,c,d){a.$apply(function(){b.data("$injector",
d);c(b)(a)})}]);return d},e=/^NG_ENABLE_DEBUG_INFO!/,f=/^NG_DEFER_BOOTSTRAP!/;Q&&e.test(Q.name)&&(c.debugInfoEnabled=!0,Q.name=Q.name.replace(e,""));if(Q&&!f.test(Q.name))return d();Q.name=Q.name.replace(f,"");ba.resumeBootstrap=function(b){n(b,function(b){a.push(b)});return d()};E(ba.resumeDeferredBootstrap)&&ba.resumeDeferredBootstrap()}function Ud(){Q.name="NG_ENABLE_DEBUG_INFO!"+Q.name;Q.location.reload()}function Vd(b){b=ba.element(b).injector();if(!b)throw Ca("test");return b.get("$$testability")}
function vc(b,a){a=a||"_";return b.replace(Wd,function(b,d){return(d?a:"")+b.toLowerCase()})}function Xd(){var b;if(!wc){var a=lb();ka=Q.jQuery;z(a)&&(ka=null===a?t:Q[a]);ka&&ka.fn.on?(C=ka,O(ka.fn,{scope:La.scope,isolateScope:La.isolateScope,controller:La.controller,injector:La.injector,inheritedData:La.inheritedData}),b=ka.cleanData,ka.cleanData=function(a){var d;if(Ob)Ob=!1;else for(var e=0,f;null!=(f=a[e]);e++)(d=ka._data(f,"events"))&&d.$destroy&&ka(f).triggerHandler("$destroy");b(a)}):C=P;ba.element=
C;wc=!0}}function Pb(b,a,c){if(!b)throw Ca("areq",a||"?",c||"required");return b}function Ma(b,a,c){c&&L(b)&&(b=b[b.length-1]);Pb(E(b),a,"not a function, got "+(b&&"object"===typeof b?b.constructor.name||"Object":typeof b));return b}function Na(b,a){if("hasOwnProperty"===b)throw Ca("badname",a);}function xc(b,a,c){if(!a)return b;a=a.split(".");for(var d,e=b,f=a.length,g=0;g<f;g++)d=a[g],b&&(b=(e=b)[d]);return!c&&E(b)?oc(e,b):b}function mb(b){var a=b[0];b=b[b.length-1];var c=[a];do{a=a.nextSibling;
if(!a)break;c.push(a)}while(a!==b);return C(c)}function la(){return Object.create(null)}function Yd(b){function a(a,b,c){return a[b]||(a[b]=c())}var c=G("$injector"),d=G("ng");b=a(b,"angular",Object);b.$$minErr=b.$$minErr||G;return a(b,"module",function(){var b={};return function(f,g,h){if("hasOwnProperty"===f)throw d("badname","module");g&&b.hasOwnProperty(f)&&(b[f]=null);return a(b,f,function(){function a(c,d,e,f){f||(f=b);return function(){f[e||"push"]([c,d,arguments]);return y}}if(!g)throw c("nomod",
f);var b=[],d=[],e=[],s=a("$injector","invoke","push",d),y={_invokeQueue:b,_configBlocks:d,_runBlocks:e,requires:g,name:f,provider:a("$provide","provider"),factory:a("$provide","factory"),service:a("$provide","service"),value:a("$provide","value"),constant:a("$provide","constant","unshift"),decorator:a("$provide","decorator"),animation:a("$animateProvider","register"),filter:a("$filterProvider","register"),controller:a("$controllerProvider","register"),directive:a("$compileProvider","directive"),
config:s,run:function(a){e.push(a);return this}};h&&s(h);return y})}})}function Zd(b){O(b,{bootstrap:uc,copy:sa,extend:O,merge:Pd,equals:ja,element:C,forEach:n,injector:$a,noop:x,bind:oc,toJson:Ya,fromJson:pc,identity:Sa,isUndefined:v,isDefined:z,isString:M,isFunction:E,isObject:D,isNumber:T,isElement:mc,isArray:L,version:$d,isDate:ea,lowercase:F,uppercase:nb,callbacks:{counter:0},getTestability:Vd,$$minErr:G,$$csp:ab,reloadWithDebugInfo:Ud});bb=Yd(Q);try{bb("ngLocale")}catch(a){bb("ngLocale",[]).provider("$locale",
ae)}bb("ng",["ngLocale"],["$provide",function(a){a.provider({$$sanitizeUri:be});a.provider("$compile",yc).directive({a:ce,input:zc,textarea:zc,form:de,script:ee,select:fe,style:ge,option:he,ngBind:ie,ngBindHtml:je,ngBindTemplate:ke,ngClass:le,ngClassEven:me,ngClassOdd:ne,ngCloak:oe,ngController:pe,ngForm:qe,ngHide:re,ngIf:se,ngInclude:te,ngInit:ue,ngNonBindable:ve,ngPluralize:we,ngRepeat:xe,ngShow:ye,ngStyle:ze,ngSwitch:Ae,ngSwitchWhen:Be,ngSwitchDefault:Ce,ngOptions:De,ngTransclude:Ee,ngModel:Fe,
ngList:Ge,ngChange:He,pattern:Ac,ngPattern:Ac,required:Bc,ngRequired:Bc,minlength:Cc,ngMinlength:Cc,maxlength:Dc,ngMaxlength:Dc,ngValue:Ie,ngModelOptions:Je}).directive({ngInclude:Ke}).directive(ob).directive(Ec);a.provider({$anchorScroll:Le,$animate:Me,$$animateQueue:Ne,$$AnimateRunner:Oe,$browser:Pe,$cacheFactory:Qe,$controller:Re,$document:Se,$exceptionHandler:Te,$filter:Fc,$interpolate:Ue,$interval:Ve,$http:We,$httpParamSerializer:Xe,$httpParamSerializerJQLike:Ye,$httpBackend:Ze,$location:$e,
$log:af,$parse:bf,$rootScope:cf,$q:df,$$q:ef,$sce:ff,$sceDelegate:gf,$sniffer:hf,$templateCache:jf,$templateRequest:kf,$$testability:lf,$timeout:mf,$window:nf,$$rAF:of,$$asyncCallback:pf,$$jqLite:qf,$$HashMap:rf,$$cookieReader:sf})}])}function cb(b){return b.replace(tf,function(a,b,d,e){return e?d.toUpperCase():d}).replace(uf,"Moz$1")}function Gc(b){b=b.nodeType;return b===na||!b||9===b}function Hc(b,a){var c,d,e=a.createDocumentFragment(),f=[];if(Qb.test(b)){c=c||e.appendChild(a.createElement("div"));
d=(vf.exec(b)||["",""])[1].toLowerCase();d=ga[d]||ga._default;c.innerHTML=d[1]+b.replace(wf,"<$1></$2>")+d[2];for(d=d[0];d--;)c=c.lastChild;f=Xa(f,c.childNodes);c=e.firstChild;c.textContent=""}else f.push(a.createTextNode(b));e.textContent="";e.innerHTML="";n(f,function(a){e.appendChild(a)});return e}function P(b){if(b instanceof P)return b;var a;M(b)&&(b=S(b),a=!0);if(!(this instanceof P)){if(a&&"<"!=b.charAt(0))throw Rb("nosel");return new P(b)}if(a){a=V;var c;b=(c=xf.exec(b))?[a.createElement(c[1])]:
(c=Hc(b,a))?c.childNodes:[]}Ic(this,b)}function Sb(b){return b.cloneNode(!0)}function pb(b,a){a||qb(b);if(b.querySelectorAll)for(var c=b.querySelectorAll("*"),d=0,e=c.length;d<e;d++)qb(c[d])}function Jc(b,a,c,d){if(z(d))throw Rb("offargs");var e=(d=rb(b))&&d.events,f=d&&d.handle;if(f)if(a)n(a.split(" "),function(a){if(z(c)){var d=e[a];Wa(d||[],c);if(d&&0<d.length)return}b.removeEventListener(a,f,!1);delete e[a]});else for(a in e)"$destroy"!==a&&b.removeEventListener(a,f,!1),delete e[a]}function qb(b,
a){var c=b.ng339,d=c&&sb[c];d&&(a?delete d.data[a]:(d.handle&&(d.events.$destroy&&d.handle({},"$destroy"),Jc(b)),delete sb[c],b.ng339=t))}function rb(b,a){var c=b.ng339,c=c&&sb[c];a&&!c&&(b.ng339=c=++yf,c=sb[c]={events:{},data:{},handle:t});return c}function Tb(b,a,c){if(Gc(b)){var d=z(c),e=!d&&a&&!D(a),f=!a;b=(b=rb(b,!e))&&b.data;if(d)b[a]=c;else{if(f)return b;if(e)return b&&b[a];O(b,a)}}}function tb(b,a){return b.getAttribute?-1<(" "+(b.getAttribute("class")||"")+" ").replace(/[\n\t]/g," ").indexOf(" "+
a+" "):!1}function ub(b,a){a&&b.setAttribute&&n(a.split(" "),function(a){b.setAttribute("class",S((" "+(b.getAttribute("class")||"")+" ").replace(/[\n\t]/g," ").replace(" "+S(a)+" "," ")))})}function vb(b,a){if(a&&b.setAttribute){var c=(" "+(b.getAttribute("class")||"")+" ").replace(/[\n\t]/g," ");n(a.split(" "),function(a){a=S(a);-1===c.indexOf(" "+a+" ")&&(c+=a+" ")});b.setAttribute("class",S(c))}}function Ic(b,a){if(a)if(a.nodeType)b[b.length++]=a;else{var c=a.length;if("number"===typeof c&&a.window!==
a){if(c)for(var d=0;d<c;d++)b[b.length++]=a[d]}else b[b.length++]=a}}function Kc(b,a){return wb(b,"$"+(a||"ngController")+"Controller")}function wb(b,a,c){9==b.nodeType&&(b=b.documentElement);for(a=L(a)?a:[a];b;){for(var d=0,e=a.length;d<e;d++)if((c=C.data(b,a[d]))!==t)return c;b=b.parentNode||11===b.nodeType&&b.host}}function Lc(b){for(pb(b,!0);b.firstChild;)b.removeChild(b.firstChild)}function Ub(b,a){a||pb(b);var c=b.parentNode;c&&c.removeChild(b)}function zf(b,a){a=a||Q;if("complete"===a.document.readyState)a.setTimeout(b);
else C(a).on("load",b)}function Mc(b,a){var c=xb[a.toLowerCase()];return c&&Nc[ra(b)]&&c}function Af(b,a){var c=b.nodeName;return("INPUT"===c||"TEXTAREA"===c)&&Oc[a]}function Bf(b,a){var c=function(c,e){c.isDefaultPrevented=function(){return c.defaultPrevented};var f=a[e||c.type],g=f?f.length:0;if(g){if(v(c.immediatePropagationStopped)){var h=c.stopImmediatePropagation;c.stopImmediatePropagation=function(){c.immediatePropagationStopped=!0;c.stopPropagation&&c.stopPropagation();h&&h.call(c)}}c.isImmediatePropagationStopped=
function(){return!0===c.immediatePropagationStopped};1<g&&(f=fa(f));for(var l=0;l<g;l++)c.isImmediatePropagationStopped()||f[l].call(b,c)}};c.elem=b;return c}function qf(){this.$get=function(){return O(P,{hasClass:function(b,a){b.attr&&(b=b[0]);return tb(b,a)},addClass:function(b,a){b.attr&&(b=b[0]);return vb(b,a)},removeClass:function(b,a){b.attr&&(b=b[0]);return ub(b,a)}})}}function Da(b,a){var c=b&&b.$$hashKey;if(c)return"function"===typeof c&&(c=b.$$hashKey()),c;c=typeof b;return c="function"==
c||"object"==c&&null!==b?b.$$hashKey=c+":"+(a||Od)():c+":"+b}function Oa(b,a){if(a){var c=0;this.nextUid=function(){return++c}}n(b,this.put,this)}function Cf(b){return(b=b.toString().replace(Pc,"").match(Qc))?"function("+(b[1]||"").replace(/[\s\r\n]+/," ")+")":"fn"}function $a(b,a){function c(a){return function(b,c){if(D(b))n(b,kc(a));else return a(b,c)}}function d(a,b){Na(a,"service");if(E(b)||L(b))b=s.instantiate(b);if(!b.$get)throw Ea("pget",a);return r[a+"Provider"]=b}function e(a,b){return function(){var c=
H.invoke(b,this);if(v(c))throw Ea("undef",a);return c}}function f(a,b,c){return d(a,{$get:!1!==c?e(a,b):b})}function g(a){var b=[],c;n(a,function(a){function d(a){var b,c;b=0;for(c=a.length;b<c;b++){var e=a[b],f=s.get(e[0]);f[e[1]].apply(f,e[2])}}if(!m.get(a)){m.put(a,!0);try{M(a)?(c=bb(a),b=b.concat(g(c.requires)).concat(c._runBlocks),d(c._invokeQueue),d(c._configBlocks)):E(a)?b.push(s.invoke(a)):L(a)?b.push(s.invoke(a)):Ma(a,"module")}catch(e){throw L(a)&&(a=a[a.length-1]),e.message&&e.stack&&-1==
e.stack.indexOf(e.message)&&(e=e.message+"\n"+e.stack),Ea("modulerr",a,e.stack||e.message||e);}}});return b}function h(b,c){function d(a,e){if(b.hasOwnProperty(a)){if(b[a]===l)throw Ea("cdep",a+" <- "+k.join(" <- "));return b[a]}try{return k.unshift(a),b[a]=l,b[a]=c(a,e)}catch(f){throw b[a]===l&&delete b[a],f;}finally{k.shift()}}function e(b,c,f,g){"string"===typeof f&&(g=f,f=null);var h=[],k=$a.$$annotate(b,a,g),l,s,m;s=0;for(l=k.length;s<l;s++){m=k[s];if("string"!==typeof m)throw Ea("itkn",m);h.push(f&&
f.hasOwnProperty(m)?f[m]:d(m,g))}L(b)&&(b=b[l]);return b.apply(c,h)}return{invoke:e,instantiate:function(a,b,c){var d=Object.create((L(a)?a[a.length-1]:a).prototype||null);a=e(a,d,b,c);return D(a)||E(a)?a:d},get:d,annotate:$a.$$annotate,has:function(a){return r.hasOwnProperty(a+"Provider")||b.hasOwnProperty(a)}}}a=!0===a;var l={},k=[],m=new Oa([],!0),r={$provide:{provider:c(d),factory:c(f),service:c(function(a,b){return f(a,["$injector",function(a){return a.instantiate(b)}])}),value:c(function(a,
b){return f(a,oa(b),!1)}),constant:c(function(a,b){Na(a,"constant");r[a]=b;y[a]=b}),decorator:function(a,b){var c=s.get(a+"Provider"),d=c.$get;c.$get=function(){var a=H.invoke(d,c);return H.invoke(b,null,{$delegate:a})}}}},s=r.$injector=h(r,function(a,b){ba.isString(b)&&k.push(b);throw Ea("unpr",k.join(" <- "));}),y={},H=y.$injector=h(y,function(a,b){var c=s.get(a+"Provider",b);return H.invoke(c.$get,c,t,a)});n(g(b),function(a){H.invoke(a||x)});return H}function Le(){var b=!0;this.disableAutoScrolling=
function(){b=!1};this.$get=["$window","$location","$rootScope",function(a,c,d){function e(a){var b=null;Array.prototype.some.call(a,function(a){if("a"===ra(a))return b=a,!0});return b}function f(b){if(b){b.scrollIntoView();var c;c=g.yOffset;E(c)?c=c():mc(c)?(c=c[0],c="fixed"!==a.getComputedStyle(c).position?0:c.getBoundingClientRect().bottom):T(c)||(c=0);c&&(b=b.getBoundingClientRect().top,a.scrollBy(0,b-c))}else a.scrollTo(0,0)}function g(a){a=M(a)?a:c.hash();var b;a?(b=h.getElementById(a))?f(b):
(b=e(h.getElementsByName(a)))?f(b):"top"===a&&f(null):f(null)}var h=a.document;b&&d.$watch(function(){return c.hash()},function(a,b){a===b&&""===a||zf(function(){d.$evalAsync(g)})});return g}]}function db(b,a){if(!b&&!a)return"";if(!b)return a;if(!a)return b;L(b)&&(b=b.join(" "));L(a)&&(a=a.join(" "));return b+" "+a}function Df(b){M(b)&&(b=b.split(" "));var a={};n(b,function(b){b.length&&(a[b]=!0)});return a}function pf(){this.$get=["$$rAF","$timeout",function(b,a){return b.supported?function(a){return b(a)}:
function(b){return a(b,0,!1)}}]}function Ef(b,a,c,d){function e(a){try{a.apply(null,pa.call(arguments,1))}finally{if(H--,0===H)for(;J.length;)try{J.pop()()}catch(b){c.error(b)}}}function f(){g();h()}function g(){a:{try{u=m.state;break a}catch(a){}u=void 0}u=v(u)?null:u;ja(u,A)&&(u=A);A=u}function h(){if(w!==l.url()||p!==u)w=l.url(),p=u,n(B,function(a){a(l.url(),u)})}var l=this,k=b.location,m=b.history,r=b.setTimeout,s=b.clearTimeout,y={};l.isMock=!1;var H=0,J=[];l.$$completeOutstandingRequest=e;l.$$incOutstandingRequestCount=
function(){H++};l.notifyWhenNoOutstandingRequests=function(a){0===H?a():J.push(a)};var u,p,w=k.href,q=a.find("base"),K=null;g();p=u;l.url=function(a,c,e){v(e)&&(e=null);k!==b.location&&(k=b.location);m!==b.history&&(m=b.history);if(a){var f=p===e;if(w===a&&(!d.history||f))return l;var h=w&&Fa(w)===Fa(a);w=a;p=e;!d.history||h&&f?(h||(K=a),c?k.replace(a):h?(c=k,e=a.indexOf("#"),a=-1===e?"":a.substr(e+1),c.hash=a):k.href=a):(m[c?"replaceState":"pushState"](e,"",a),g(),p=u);return l}return K||k.href.replace(/%27/g,
"'")};l.state=function(){return u};var B=[],N=!1,A=null;l.onUrlChange=function(a){if(!N){if(d.history)C(b).on("popstate",f);C(b).on("hashchange",f);N=!0}B.push(a);return a};l.$$applicationDestroyed=function(){C(b).off("hashchange popstate",f)};l.$$checkUrlChange=h;l.baseHref=function(){var a=q.attr("href");return a?a.replace(/^(https?\:)?\/\/[^\/]*/,""):""};l.defer=function(a,b){var c;H++;c=r(function(){delete y[c];e(a)},b||0);y[c]=!0;return c};l.defer.cancel=function(a){return y[a]?(delete y[a],
s(a),e(x),!0):!1}}function Pe(){this.$get=["$window","$log","$sniffer","$document",function(b,a,c,d){return new Ef(b,d,a,c)}]}function Qe(){this.$get=function(){function b(b,d){function e(a){a!=r&&(s?s==a&&(s=a.n):s=a,f(a.n,a.p),f(a,r),r=a,r.n=null)}function f(a,b){a!=b&&(a&&(a.p=b),b&&(b.n=a))}if(b in a)throw G("$cacheFactory")("iid",b);var g=0,h=O({},d,{id:b}),l={},k=d&&d.capacity||Number.MAX_VALUE,m={},r=null,s=null;return a[b]={put:function(a,b){if(!v(b)){if(k<Number.MAX_VALUE){var c=m[a]||(m[a]=
{key:a});e(c)}a in l||g++;l[a]=b;g>k&&this.remove(s.key);return b}},get:function(a){if(k<Number.MAX_VALUE){var b=m[a];if(!b)return;e(b)}return l[a]},remove:function(a){if(k<Number.MAX_VALUE){var b=m[a];if(!b)return;b==r&&(r=b.p);b==s&&(s=b.n);f(b.n,b.p);delete m[a]}delete l[a];g--},removeAll:function(){l={};g=0;m={};r=s=null},destroy:function(){m=h=l=null;delete a[b]},info:function(){return O({},h,{size:g})}}}var a={};b.info=function(){var b={};n(a,function(a,e){b[e]=a.info()});return b};b.get=function(b){return a[b]};
return b}}function jf(){this.$get=["$cacheFactory",function(b){return b("templates")}]}function yc(b,a){function c(a,b,c){var d=/^\s*([@&]|=(\*?))(\??)\s*(\w*)\s*$/,e={};n(a,function(a,f){var g=a.match(d);if(!g)throw ha("iscp",b,f,a,c?"controller bindings definition":"isolate scope definition");e[f]={mode:g[1][0],collection:"*"===g[2],optional:"?"===g[3],attrName:g[4]||f}});return e}function d(a){var b=a.charAt(0);if(!b||b!==F(b))throw ha("baddir",a);}var e={},f=/^\s*directive\:\s*([\w\-]+)\s+(.*)$/,
g=/(([\w\-]+)(?:\:([^;]+))?;?)/,h=Qd("ngSrc,ngSrcset,src,srcset"),l=/^(?:(\^\^?)?(\?)?(\^\^?)?)?/,k=/^(on[a-z]+|formaction)$/;this.directive=function s(a,f){Na(a,"directive");M(a)?(d(a),Pb(f,"directiveFactory"),e.hasOwnProperty(a)||(e[a]=[],b.factory(a+"Directive",["$injector","$exceptionHandler",function(b,d){var f=[];n(e[a],function(e,g){try{var h=b.invoke(e);E(h)?h={compile:oa(h)}:!h.compile&&h.link&&(h.compile=oa(h.link));h.priority=h.priority||0;h.index=g;h.name=h.name||a;h.require=h.require||
h.controller&&h.name;h.restrict=h.restrict||"EA";var l=h,k=h,s=h.name,m={isolateScope:null,bindToController:null};D(k.scope)&&(!0===k.bindToController?(m.bindToController=c(k.scope,s,!0),m.isolateScope={}):m.isolateScope=c(k.scope,s,!1));D(k.bindToController)&&(m.bindToController=c(k.bindToController,s,!0));if(D(m.bindToController)){var H=k.controller,Z=k.controllerAs;if(!H)throw ha("noctrl",s);var da;a:if(Z&&M(Z))da=Z;else{if(M(H)){var n=Rc.exec(H);if(n){da=n[3];break a}}da=void 0}if(!da)throw ha("noident",
s);}var q=l.$$bindings=m;D(q.isolateScope)&&(h.$$isolateBindings=q.isolateScope);f.push(h)}catch(t){d(t)}});return f}])),e[a].push(f)):n(a,kc(s));return this};this.aHrefSanitizationWhitelist=function(b){return z(b)?(a.aHrefSanitizationWhitelist(b),this):a.aHrefSanitizationWhitelist()};this.imgSrcSanitizationWhitelist=function(b){return z(b)?(a.imgSrcSanitizationWhitelist(b),this):a.imgSrcSanitizationWhitelist()};var m=!0;this.debugInfoEnabled=function(a){return z(a)?(m=a,this):m};this.$get=["$injector",
"$interpolate","$exceptionHandler","$templateRequest","$parse","$controller","$rootScope","$document","$sce","$animate","$$sanitizeUri",function(a,b,c,d,u,p,w,q,K,B,N){function A(a,b){try{a.addClass(b)}catch(c){}}function R(a,b,c,d,e){a instanceof C||(a=C(a));n(a,function(b,c){b.nodeType==Za&&b.nodeValue.match(/\S+/)&&(a[c]=C(b).wrap("<span></span>").parent()[0])});var f=Y(a,b,a,c,d,e);R.$$addScopeClass(a);var g=null;return function(b,c,d){Pb(b,"scope");d=d||{};var e=d.parentBoundTranscludeFn,h=d.transcludeControllers;
d=d.futureParentElement;e&&e.$$boundTransclude&&(e=e.$$boundTransclude);g||(g=(d=d&&d[0])?"foreignobject"!==ra(d)&&d.toString().match(/SVG/)?"svg":"html":"html");d="html"!==g?C(Vb(g,C("<div>").append(a).html())):c?La.clone.call(a):a;if(h)for(var k in h)d.data("$"+k+"Controller",h[k].instance);R.$$addScopeInfo(d,b);c&&c(d,b);f&&f(b,d,d,e);return d}}function Y(a,b,c,d,e,f){function g(a,c,d,e){var f,k,l,m,s,B,y;if(p)for(y=Array(c.length),m=0;m<h.length;m+=3)f=h[m],y[f]=c[f];else y=c;m=0;for(s=h.length;m<
s;)if(k=y[h[m++]],c=h[m++],f=h[m++],c){if(c.scope){if(l=a.$new(),R.$$addScopeInfo(C(k),l),B=c.$$destroyBindings)c.$$destroyBindings=null,l.$on("$destroyed",B)}else l=a;B=c.transcludeOnThisElement?Z(a,c.transclude,e,c.elementTranscludeOnThisElement):!c.templateOnThisElement&&e?e:!e&&b?Z(a,b):null;c(f,l,k,d,B,c)}else f&&f(a,k.childNodes,t,e)}for(var h=[],k,l,m,s,p,B=0;B<a.length;B++){k=new ca;l=da(a[B],[],k,0===B?d:t,e);(f=l.length?I(l,a[B],k,b,c,null,[],[],f):null)&&f.scope&&R.$$addScopeClass(k.$$element);
k=f&&f.terminal||!(m=a[B].childNodes)||!m.length?null:Y(m,f?(f.transcludeOnThisElement||!f.templateOnThisElement)&&f.transclude:b);if(f||k)h.push(B,f,k),s=!0,p=p||f;f=null}return s?g:null}function Z(a,b,c,d){return function(d,e,f,g,h){d||(d=a.$new(!1,h),d.$$transcluded=!0);return b(d,e,{parentBoundTranscludeFn:c,transcludeControllers:f,futureParentElement:g})}}function da(a,b,c,d,e){var h=c.$attr,k;switch(a.nodeType){case na:v(b,wa(ra(a)),"E",d,e);for(var l,m,s,p=a.attributes,B=0,y=p&&p.length;B<
y;B++){var H=!1,Z=!1;l=p[B];k=l.name;m=S(l.value);l=wa(k);if(s=ia.test(l))k=k.replace(Tc,"").substr(8).replace(/_(.)/g,function(a,b){return b.toUpperCase()});var J=l.replace(/(Start|End)$/,"");G(J)&&l===J+"Start"&&(H=k,Z=k.substr(0,k.length-5)+"end",k=k.substr(0,k.length-6));l=wa(k.toLowerCase());h[l]=k;if(s||!c.hasOwnProperty(l))c[l]=m,Mc(a,l)&&(c[l]=!0);U(a,b,m,l,s);v(b,l,"A",d,e,H,Z)}a=a.className;D(a)&&(a=a.animVal);if(M(a)&&""!==a)for(;k=g.exec(a);)l=wa(k[2]),v(b,l,"C",d,e)&&(c[l]=S(k[3])),a=
a.substr(k.index+k[0].length);break;case Za:ya(b,a.nodeValue);break;case 8:try{if(k=f.exec(a.nodeValue))l=wa(k[1]),v(b,l,"M",d,e)&&(c[l]=S(k[2]))}catch(N){}}b.sort(Ga);return b}function va(a,b,c){var d=[],e=0;if(b&&a.hasAttribute&&a.hasAttribute(b)){do{if(!a)throw ha("uterdir",b,c);a.nodeType==na&&(a.hasAttribute(b)&&e++,a.hasAttribute(c)&&e--);d.push(a);a=a.nextSibling}while(0<e)}else d.push(a);return C(d)}function Sc(a,b,c){return function(d,e,f,g,h){e=va(e[0],b,c);return a(d,e,f,g,h)}}function I(a,
b,d,e,f,g,h,k,m){function s(a,b,c,d){if(a){c&&(a=Sc(a,c,d));a.require=I.require;a.directiveName=x;if(A===I||I.$$isolateScope)a=$(a,{isolateScope:!0});h.push(a)}if(b){c&&(b=Sc(b,c,d));b.require=I.require;b.directiveName=x;if(A===I||I.$$isolateScope)b=$(b,{isolateScope:!0});k.push(b)}}function B(a,b,c,d){var e;if(M(b)){var f=b.match(l);b=b.substring(f[0].length);var g=f[1]||f[3],f="?"===f[2];"^^"===g?c=c.parent():e=(e=d&&d[b])&&e.instance;e||(d="$"+b+"Controller",e=g?c.inheritedData(d):c.data(d));if(!e&&
!f)throw ha("ctreq",b,a);}else if(L(b))for(e=[],g=0,f=b.length;g<f;g++)e[g]=B(a,b[g],c,d);return e||null}function y(a,b,c,d,e,f){var g=la(),h;for(h in d){var k=d[h],l={$scope:k===A||k.$$isolateScope?e:f,$element:a,$attrs:b,$transclude:c},m=k.controller;"@"==m&&(m=b[k.name]);l=p(m,l,!0,k.controllerAs);g[k.name]=l;q||a.data("$"+k.name+"Controller",l.instance)}return g}function Z(a,c,e,f,g,l){function m(a,b,c){var d;Ua(a)||(c=b,b=a,a=t);q&&(d=n);c||(c=q?w.parent():w);return g(a,b,d,c,W)}var s,p,H,J,
n,eb,w;b===e?(f=d,w=d.$$element):(w=C(e),f=new ca(w,d));A&&(J=c.$new(!0));g&&(eb=m,eb.$$boundTransclude=g);Y&&(n=y(w,f,eb,Y,J,c));A&&(R.$$addScopeInfo(w,J,!0,!(u&&(u===A||u===A.$$originalDirective))),R.$$addScopeClass(w,!0),J.$$isolateBindings=A.$$isolateBindings,ba(c,f,J,J.$$isolateBindings,A,J));if(n){var da=A||N,K;da&&n[da.name]&&(p=da.$$bindings.bindToController,(H=n[da.name])&&H.identifier&&p&&(K=H,l.$$destroyBindings=ba(c,f,H.instance,p,da)));for(s in n){H=n[s];var va=H();va!==H.instance&&(H.instance=
va,w.data("$"+I.name+"Controller",va),H===K&&(l.$$destroyBindings(),l.$$destroyBindings=ba(c,f,va,p,da)))}}s=0;for(l=h.length;s<l;s++)p=h[s],aa(p,p.isolateScope?J:c,w,f,p.require&&B(p.directiveName,p.require,w,n),eb);var W=c;A&&(A.template||null===A.templateUrl)&&(W=J);a&&a(W,e.childNodes,t,g);for(s=k.length-1;0<=s;s--)p=k[s],aa(p,p.isolateScope?J:c,w,f,p.require&&B(p.directiveName,p.require,w,n),eb)}m=m||{};for(var J=-Number.MAX_VALUE,N,Y=m.controllerDirectives,A=m.newIsolateScopeDirective,u=m.templateDirective,
n=m.nonTlbTranscludeDirective,w=!1,K=!1,q=m.hasElementTranscludeDirective,W=d.$$element=C(b),I,x,v,Ga=e,ya,G=0,F=a.length;G<F;G++){I=a[G];var O=I.$$start,Wb=I.$$end;O&&(W=va(b,O,Wb));v=t;if(J>I.priority)break;if(v=I.scope)I.templateUrl||(D(v)?(P("new/isolated scope",A||N,I,W),A=I):P("new/isolated scope",A,I,W)),N=N||I;x=I.name;!I.templateUrl&&I.controller&&(v=I.controller,Y=Y||la(),P("'"+x+"' controller",Y[x],I,W),Y[x]=I);if(v=I.transclude)w=!0,I.$$tlb||(P("transclusion",n,I,W),n=I),"element"==v?
(q=!0,J=I.priority,v=W,W=d.$$element=C(V.createComment(" "+x+": "+d[x]+" ")),b=W[0],X(f,pa.call(v,0),b),Ga=R(v,e,J,g&&g.name,{nonTlbTranscludeDirective:n})):(v=C(Sb(b)).contents(),W.empty(),Ga=R(v,e));if(I.template)if(K=!0,P("template",u,I,W),u=I,v=E(I.template)?I.template(W,d):I.template,v=ga(v),I.replace){g=I;v=Qb.test(v)?Uc(Vb(I.templateNamespace,S(v))):[];b=v[0];if(1!=v.length||b.nodeType!==na)throw ha("tplrt",x,"");X(f,W,b);F={$attr:{}};v=da(b,[],F);var T=a.splice(G+1,a.length-(G+1));A&&z(v);
a=a.concat(v).concat(T);Q(d,F);F=a.length}else W.html(v);if(I.templateUrl)K=!0,P("template",u,I,W),u=I,I.replace&&(g=I),Z=Ff(a.splice(G,a.length-G),W,d,f,w&&Ga,h,k,{controllerDirectives:Y,newIsolateScopeDirective:A,templateDirective:u,nonTlbTranscludeDirective:n}),F=a.length;else if(I.compile)try{ya=I.compile(W,d,Ga),E(ya)?s(null,ya,O,Wb):ya&&s(ya.pre,ya.post,O,Wb)}catch(U){c(U,ta(W))}I.terminal&&(Z.terminal=!0,J=Math.max(J,I.priority))}Z.scope=N&&!0===N.scope;Z.transcludeOnThisElement=w;Z.elementTranscludeOnThisElement=
q;Z.templateOnThisElement=K;Z.transclude=Ga;m.hasElementTranscludeDirective=q;return Z}function z(a){for(var b=0,c=a.length;b<c;b++)a[b]=Lb(a[b],{$$isolateScope:!0})}function v(b,d,f,g,h,k,l){if(d===h)return null;h=null;if(e.hasOwnProperty(d)){var m;d=a.get(d+"Directive");for(var p=0,B=d.length;p<B;p++)try{m=d[p],(g===t||g>m.priority)&&-1!=m.restrict.indexOf(f)&&(k&&(m=Lb(m,{$$start:k,$$end:l})),b.push(m),h=m)}catch(y){c(y)}}return h}function G(b){if(e.hasOwnProperty(b))for(var c=a.get(b+"Directive"),
d=0,f=c.length;d<f;d++)if(b=c[d],b.multiElement)return!0;return!1}function Q(a,b){var c=b.$attr,d=a.$attr,e=a.$$element;n(a,function(d,e){"$"!=e.charAt(0)&&(b[e]&&b[e]!==d&&(d+=("style"===e?";":" ")+b[e]),a.$set(e,d,!0,c[e]))});n(b,function(b,f){"class"==f?(A(e,b),a["class"]=(a["class"]?a["class"]+" ":"")+b):"style"==f?(e.attr("style",e.attr("style")+";"+b),a.style=(a.style?a.style+";":"")+b):"$"==f.charAt(0)||a.hasOwnProperty(f)||(a[f]=b,d[f]=c[f])})}function Ff(a,b,c,e,f,g,h,k){var l=[],m,s,p=b[0],
B=a.shift(),y=Lb(B,{templateUrl:null,transclude:null,replace:null,$$originalDirective:B}),H=E(B.templateUrl)?B.templateUrl(b,c):B.templateUrl,N=B.templateNamespace;b.empty();d(K.getTrustedResourceUrl(H)).then(function(d){var J,u;d=ga(d);if(B.replace){d=Qb.test(d)?Uc(Vb(N,S(d))):[];J=d[0];if(1!=d.length||J.nodeType!==na)throw ha("tplrt",B.name,H);d={$attr:{}};X(e,b,J);var w=da(J,[],d);D(B.scope)&&z(w);a=w.concat(a);Q(c,d)}else J=p,b.html(d);a.unshift(y);m=I(a,J,c,f,b,B,g,h,k);n(e,function(a,c){a==
J&&(e[c]=b[0])});for(s=Y(b[0].childNodes,f);l.length;){d=l.shift();u=l.shift();var K=l.shift(),R=l.shift(),w=b[0];if(!d.$$destroyed){if(u!==p){var va=u.className;k.hasElementTranscludeDirective&&B.replace||(w=Sb(J));X(K,C(u),w);A(C(w),va)}u=m.transcludeOnThisElement?Z(d,m.transclude,R):R;m(s,d,w,e,u,m)}}l=null});return function(a,b,c,d,e){a=e;b.$$destroyed||(l?l.push(b,c,d,a):(m.transcludeOnThisElement&&(a=Z(b,m.transclude,e)),m(s,b,c,d,a,m)))}}function Ga(a,b){var c=b.priority-a.priority;return 0!==
c?c:a.name!==b.name?a.name<b.name?-1:1:a.index-b.index}function P(a,b,c,d){if(b)throw ha("multidir",b.name,c.name,a,ta(d));}function ya(a,c){var d=b(c,!0);d&&a.push({priority:0,compile:function(a){a=a.parent();var b=!!a.length;b&&R.$$addBindingClass(a);return function(a,c){var e=c.parent();b||R.$$addBindingClass(e);R.$$addBindingInfo(e,d.expressions);a.$watch(d,function(a){c[0].nodeValue=a})}}})}function Vb(a,b){a=F(a||"html");switch(a){case "svg":case "math":var c=V.createElement("div");c.innerHTML=
"<"+a+">"+b+"</"+a+">";return c.childNodes[0].childNodes;default:return b}}function T(a,b){if("srcdoc"==b)return K.HTML;var c=ra(a);if("xlinkHref"==b||"form"==c&&"action"==b||"img"!=c&&("src"==b||"ngSrc"==b))return K.RESOURCE_URL}function U(a,c,d,e,f){var g=T(a,e);f=h[e]||f;var l=b(d,!0,g,f);if(l){if("multiple"===e&&"select"===ra(a))throw ha("selmulti",ta(a));c.push({priority:100,compile:function(){return{pre:function(a,c,h){c=h.$$observers||(h.$$observers={});if(k.test(e))throw ha("nodomevents");
var m=h[e];m!==d&&(l=m&&b(m,!0,g,f),d=m);l&&(h[e]=l(a),(c[e]||(c[e]=[])).$$inter=!0,(h.$$observers&&h.$$observers[e].$$scope||a).$watch(l,function(a,b){"class"===e&&a!=b?h.$updateClass(a,b):h.$set(e,a)}))}}}})}}function X(a,b,c){var d=b[0],e=b.length,f=d.parentNode,g,h;if(a)for(g=0,h=a.length;g<h;g++)if(a[g]==d){a[g++]=c;h=g+e-1;for(var k=a.length;g<k;g++,h++)h<k?a[g]=a[h]:delete a[g];a.length-=e-1;a.context===d&&(a.context=c);break}f&&f.replaceChild(c,d);a=V.createDocumentFragment();a.appendChild(d);
C(c).data(C(d).data());ka?(Ob=!0,ka.cleanData([d])):delete C.cache[d[C.expando]];d=1;for(e=b.length;d<e;d++)f=b[d],C(f).remove(),a.appendChild(f),delete b[d];b[0]=c;b.length=1}function $(a,b){return O(function(){return a.apply(null,arguments)},a,b)}function aa(a,b,d,e,f,g){try{a(b,d,e,f,g)}catch(h){c(h,ta(d))}}function ba(a,c,d,e,f,g){var h;n(e,function(e,g){var k=e.attrName,l=e.optional,m,s,p,B;switch(e.mode){case "@":c.$observe(k,function(a){d[g]=a});c.$$observers[k].$$scope=a;c[k]&&(d[g]=b(c[k])(a));
break;case "=":if(l&&!c[k])break;s=u(c[k]);B=s.literal?ja:function(a,b){return a===b||a!==a&&b!==b};p=s.assign||function(){m=d[g]=s(a);throw ha("nonassign",c[k],f.name);};m=d[g]=s(a);l=function(b){B(b,d[g])||(B(b,m)?p(a,b=d[g]):d[g]=b);return m=b};l.$stateful=!0;l=e.collection?a.$watchCollection(c[k],l):a.$watch(u(c[k],l),null,s.literal);h=h||[];h.push(l);break;case "&":if(!c.hasOwnProperty(k)&&l)break;s=u(c[k]);if(s===x&&l)break;d[g]=function(b){return s(a,b)}}});e=h?function(){for(var a=0,b=h.length;a<
b;++a)h[a]()}:x;return g&&e!==x?(g.$on("$destroy",e),x):e}var ca=function(a,b){if(b){var c=Object.keys(b),d,e,f;d=0;for(e=c.length;d<e;d++)f=c[d],this[f]=b[f]}else this.$attr={};this.$$element=a};ca.prototype={$normalize:wa,$addClass:function(a){a&&0<a.length&&B.addClass(this.$$element,a)},$removeClass:function(a){a&&0<a.length&&B.removeClass(this.$$element,a)},$updateClass:function(a,b){var c=Vc(a,b);c&&c.length&&B.addClass(this.$$element,c);(c=Vc(b,a))&&c.length&&B.removeClass(this.$$element,c)},
$set:function(a,b,d,e){var f=this.$$element[0],g=Mc(f,a),h=Af(f,a),f=a;g?(this.$$element.prop(a,b),e=g):h&&(this[h]=b,f=h);this[a]=b;e?this.$attr[a]=e:(e=this.$attr[a])||(this.$attr[a]=e=vc(a,"-"));g=ra(this.$$element);if("a"===g&&"href"===a||"img"===g&&"src"===a)this[a]=b=N(b,"src"===a);else if("img"===g&&"srcset"===a){for(var g="",h=S(b),k=/(\s+\d+x\s*,|\s+\d+w\s*,|\s+,|,\s+)/,k=/\s/.test(h)?k:/(,)/,h=h.split(k),k=Math.floor(h.length/2),l=0;l<k;l++)var m=2*l,g=g+N(S(h[m]),!0),g=g+(" "+S(h[m+1]));
h=S(h[2*l]).split(/\s/);g+=N(S(h[0]),!0);2===h.length&&(g+=" "+S(h[1]));this[a]=b=g}!1!==d&&(null===b||b===t?this.$$element.removeAttr(e):this.$$element.attr(e,b));(a=this.$$observers)&&n(a[f],function(a){try{a(b)}catch(d){c(d)}})},$observe:function(a,b){var c=this,d=c.$$observers||(c.$$observers=la()),e=d[a]||(d[a]=[]);e.push(b);w.$evalAsync(function(){!e.$$inter&&c.hasOwnProperty(a)&&b(c[a])});return function(){Wa(e,b)}}};var ea=b.startSymbol(),fa=b.endSymbol(),ga="{{"==ea||"}}"==fa?Sa:function(a){return a.replace(/\{\{/g,
ea).replace(/}}/g,fa)},ia=/^ngAttr[A-Z]/;R.$$addBindingInfo=m?function(a,b){var c=a.data("$binding")||[];L(b)?c=c.concat(b):c.push(b);a.data("$binding",c)}:x;R.$$addBindingClass=m?function(a){A(a,"ng-binding")}:x;R.$$addScopeInfo=m?function(a,b,c,d){a.data(c?d?"$isolateScopeNoTemplate":"$isolateScope":"$scope",b)}:x;R.$$addScopeClass=m?function(a,b){A(a,b?"ng-isolate-scope":"ng-scope")}:x;return R}]}function wa(b){return cb(b.replace(Tc,""))}function Vc(b,a){var c="",d=b.split(/\s+/),e=a.split(/\s+/),
f=0;a:for(;f<d.length;f++){for(var g=d[f],h=0;h<e.length;h++)if(g==e[h])continue a;c+=(0<c.length?" ":"")+g}return c}function Uc(b){b=C(b);var a=b.length;if(1>=a)return b;for(;a--;)8===b[a].nodeType&&Gf.call(b,a,1);return b}function Re(){var b={},a=!1;this.register=function(a,d){Na(a,"controller");D(a)?O(b,a):b[a]=d};this.allowGlobals=function(){a=!0};this.$get=["$injector","$window",function(c,d){function e(a,b,c,d){if(!a||!D(a.$scope))throw G("$controller")("noscp",d,b);a.$scope[b]=c}return function(f,
g,h,l){var k,m,r;h=!0===h;l&&M(l)&&(r=l);if(M(f)){l=f.match(Rc);if(!l)throw Hf("ctrlfmt",f);m=l[1];r=r||l[3];f=b.hasOwnProperty(m)?b[m]:xc(g.$scope,m,!0)||(a?xc(d,m,!0):t);Ma(f,m,!0)}if(h)return h=(L(f)?f[f.length-1]:f).prototype,k=Object.create(h||null),r&&e(g,r,k,m||f.name),O(function(){var a=c.invoke(f,k,g,m);a!==k&&(D(a)||E(a))&&(k=a,r&&e(g,r,k,m||f.name));return k},{instance:k,identifier:r});k=c.instantiate(f,g,m);r&&e(g,r,k,m||f.name);return k}}]}function Se(){this.$get=["$window",function(b){return C(b.document)}]}
function Te(){this.$get=["$log",function(b){return function(a,c){b.error.apply(b,arguments)}}]}function Wc(b){function a(a){return D(a)?ea(a)?a.toISOString():Ya(a):a}return function(c){if(!c)return"";var d=[];Nd(c,function(c,f){null===c||v(c)||(L(c)||D(c)&&b?n(c,function(g,h){var l=b?"["+(L(c)?"":h)+"]":"";d.push(ua(f+l)+"="+ua(a(g)))}):d.push(ua(f)+"="+ua(a(c))))});return 0<d.length?d.join("&"):""}}function Xe(){this.$get=function(){return Wc(!1)}}function Ye(){this.$get=function(){return Wc(!0)}}
function Xb(b,a){if(M(b)){var c=b.replace(If,"").trim();if(c){var d=a("Content-Type");(d=d&&0===d.indexOf(Xc))||(d=(d=c.match(Jf))&&Kf[d[0]].test(c));d&&(b=pc(c))}}return b}function Yc(b){var a=la(),c;M(b)?n(b.split("\n"),function(b){c=b.indexOf(":");var e=F(S(b.substr(0,c)));b=S(b.substr(c+1));e&&(a[e]=a[e]?a[e]+", "+b:b)}):D(b)&&n(b,function(b,c){var f=F(c),g=S(b);f&&(a[f]=a[f]?a[f]+", "+g:g)});return a}function Zc(b){var a;return function(c){a||(a=Yc(b));return c?(c=a[F(c)],void 0===c&&(c=null),
c):a}}function $c(b,a,c,d){if(E(d))return d(b,a,c);n(d,function(d){b=d(b,a,c)});return b}function We(){var b=this.defaults={transformResponse:[Xb],transformRequest:[function(a){return D(a)&&"[object File]"!==qa.call(a)&&"[object Blob]"!==qa.call(a)&&"[object FormData]"!==qa.call(a)?Ya(a):a}],headers:{common:{Accept:"application/json, text/plain, */*"},post:fa(Yb),put:fa(Yb),patch:fa(Yb)},xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",paramSerializer:"$httpParamSerializer"},a=!1;this.useApplyAsync=
function(b){return z(b)?(a=!!b,this):a};var c=this.interceptors=[];this.$get=["$httpBackend","$$cookieReader","$cacheFactory","$rootScope","$q","$injector",function(d,e,f,g,h,l){function k(a){function c(a){var b=O({},a);b.data=a.data?$c(a.data,a.headers,a.status,e.transformResponse):a.data;a=a.status;return 200<=a&&300>a?b:h.reject(b)}function d(a,b){var c,e={};n(a,function(a,d){E(a)?(c=a(b),null!=c&&(e[d]=c)):e[d]=a});return e}if(!ba.isObject(a))throw G("$http")("badreq",a);var e=O({method:"get",
transformRequest:b.transformRequest,transformResponse:b.transformResponse,paramSerializer:b.paramSerializer},a);e.headers=function(a){var c=b.headers,e=O({},a.headers),f,g,h,c=O({},c.common,c[F(a.method)]);a:for(f in c){g=F(f);for(h in e)if(F(h)===g)continue a;e[f]=c[f]}return d(e,fa(a))}(a);e.method=nb(e.method);e.paramSerializer=M(e.paramSerializer)?l.get(e.paramSerializer):e.paramSerializer;var f=[function(a){var d=a.headers,e=$c(a.data,Zc(d),t,a.transformRequest);v(e)&&n(d,function(a,b){"content-type"===
F(b)&&delete d[b]});v(a.withCredentials)&&!v(b.withCredentials)&&(a.withCredentials=b.withCredentials);return m(a,e).then(c,c)},t],g=h.when(e);for(n(y,function(a){(a.request||a.requestError)&&f.unshift(a.request,a.requestError);(a.response||a.responseError)&&f.push(a.response,a.responseError)});f.length;){a=f.shift();var k=f.shift(),g=g.then(a,k)}g.success=function(a){Ma(a,"fn");g.then(function(b){a(b.data,b.status,b.headers,e)});return g};g.error=function(a){Ma(a,"fn");g.then(null,function(b){a(b.data,
b.status,b.headers,e)});return g};return g}function m(c,f){function l(b,c,d,e){function f(){m(c,b,d,e)}N&&(200<=b&&300>b?N.put(Y,[b,c,Yc(d),e]):N.remove(Y));a?g.$applyAsync(f):(f(),g.$$phase||g.$apply())}function m(a,b,d,e){b=Math.max(b,0);(200<=b&&300>b?K.resolve:K.reject)({data:a,status:b,headers:Zc(d),config:c,statusText:e})}function y(a){m(a.data,a.status,fa(a.headers()),a.statusText)}function n(){var a=k.pendingRequests.indexOf(c);-1!==a&&k.pendingRequests.splice(a,1)}var K=h.defer(),B=K.promise,
N,A,R=c.headers,Y=r(c.url,c.paramSerializer(c.params));k.pendingRequests.push(c);B.then(n,n);!c.cache&&!b.cache||!1===c.cache||"GET"!==c.method&&"JSONP"!==c.method||(N=D(c.cache)?c.cache:D(b.cache)?b.cache:s);N&&(A=N.get(Y),z(A)?A&&E(A.then)?A.then(y,y):L(A)?m(A[1],A[0],fa(A[2]),A[3]):m(A,200,{},"OK"):N.put(Y,B));v(A)&&((A=ad(c.url)?e()[c.xsrfCookieName||b.xsrfCookieName]:t)&&(R[c.xsrfHeaderName||b.xsrfHeaderName]=A),d(c.method,Y,f,l,R,c.timeout,c.withCredentials,c.responseType));return B}function r(a,
b){0<b.length&&(a+=(-1==a.indexOf("?")?"?":"&")+b);return a}var s=f("$http");b.paramSerializer=M(b.paramSerializer)?l.get(b.paramSerializer):b.paramSerializer;var y=[];n(c,function(a){y.unshift(M(a)?l.get(a):l.invoke(a))});k.pendingRequests=[];(function(a){n(arguments,function(a){k[a]=function(b,c){return k(O(c||{},{method:a,url:b}))}})})("get","delete","head","jsonp");(function(a){n(arguments,function(a){k[a]=function(b,c,d){return k(O(d||{},{method:a,url:b,data:c}))}})})("post","put","patch");k.defaults=
b;return k}]}function Lf(){return new Q.XMLHttpRequest}function Ze(){this.$get=["$browser","$window","$document",function(b,a,c){return Mf(b,Lf,b.defer,a.angular.callbacks,c[0])}]}function Mf(b,a,c,d,e){function f(a,b,c){var f=e.createElement("script"),m=null;f.type="text/javascript";f.src=a;f.async=!0;m=function(a){f.removeEventListener("load",m,!1);f.removeEventListener("error",m,!1);e.body.removeChild(f);f=null;var g=-1,y="unknown";a&&("load"!==a.type||d[b].called||(a={type:"error"}),y=a.type,
g="error"===a.type?404:200);c&&c(g,y)};f.addEventListener("load",m,!1);f.addEventListener("error",m,!1);e.body.appendChild(f);return m}return function(e,h,l,k,m,r,s,y){function H(){p&&p();w&&w.abort()}function J(a,d,e,f,g){K!==t&&c.cancel(K);p=w=null;a(d,e,f,g);b.$$completeOutstandingRequest(x)}b.$$incOutstandingRequestCount();h=h||b.url();if("jsonp"==F(e)){var u="_"+(d.counter++).toString(36);d[u]=function(a){d[u].data=a;d[u].called=!0};var p=f(h.replace("JSON_CALLBACK","angular.callbacks."+u),u,
function(a,b){J(k,a,d[u].data,"",b);d[u]=x})}else{var w=a();w.open(e,h,!0);n(m,function(a,b){z(a)&&w.setRequestHeader(b,a)});w.onload=function(){var a=w.statusText||"",b="response"in w?w.response:w.responseText,c=1223===w.status?204:w.status;0===c&&(c=b?200:"file"==za(h).protocol?404:0);J(k,c,b,w.getAllResponseHeaders(),a)};e=function(){J(k,-1,null,null,"")};w.onerror=e;w.onabort=e;s&&(w.withCredentials=!0);if(y)try{w.responseType=y}catch(q){if("json"!==y)throw q;}w.send(l)}if(0<r)var K=c(H,r);else r&&
E(r.then)&&r.then(H)}}function Ue(){var b="{{",a="}}";this.startSymbol=function(a){return a?(b=a,this):b};this.endSymbol=function(b){return b?(a=b,this):a};this.$get=["$parse","$exceptionHandler","$sce",function(c,d,e){function f(a){return"\\\\\\"+a}function g(c){return c.replace(m,b).replace(r,a)}function h(f,h,m,r){function u(a){try{var b=a;a=m?e.getTrusted(m,b):e.valueOf(b);var c;if(r&&!z(a))c=a;else if(null==a)c="";else{switch(typeof a){case "string":break;case "number":a=""+a;break;default:a=
Ya(a)}c=a}return c}catch(g){d(Ha.interr(f,g))}}r=!!r;for(var p,n,q=0,K=[],B=[],N=f.length,A=[],R=[];q<N;)if(-1!=(p=f.indexOf(b,q))&&-1!=(n=f.indexOf(a,p+l)))q!==p&&A.push(g(f.substring(q,p))),q=f.substring(p+l,n),K.push(q),B.push(c(q,u)),q=n+k,R.push(A.length),A.push("");else{q!==N&&A.push(g(f.substring(q)));break}m&&1<A.length&&Ha.throwNoconcat(f);if(!h||K.length){var Y=function(a){for(var b=0,c=K.length;b<c;b++){if(r&&v(a[b]))return;A[R[b]]=a[b]}return A.join("")};return O(function(a){var b=0,c=
K.length,e=Array(c);try{for(;b<c;b++)e[b]=B[b](a);return Y(e)}catch(g){d(Ha.interr(f,g))}},{exp:f,expressions:K,$$watchDelegate:function(a,b){var c;return a.$watchGroup(B,function(d,e){var f=Y(d);E(b)&&b.call(this,f,d!==e?c:f,a);c=f})}})}}var l=b.length,k=a.length,m=new RegExp(b.replace(/./g,f),"g"),r=new RegExp(a.replace(/./g,f),"g");h.startSymbol=function(){return b};h.endSymbol=function(){return a};return h}]}function Ve(){this.$get=["$rootScope","$window","$q","$$q",function(b,a,c,d){function e(e,
h,l,k){var m=4<arguments.length,r=m?pa.call(arguments,4):[],s=a.setInterval,y=a.clearInterval,H=0,J=z(k)&&!k,u=(J?d:c).defer(),p=u.promise;l=z(l)?l:0;p.then(null,null,m?function(){e.apply(null,r)}:e);p.$$intervalId=s(function(){u.notify(H++);0<l&&H>=l&&(u.resolve(H),y(p.$$intervalId),delete f[p.$$intervalId]);J||b.$apply()},h);f[p.$$intervalId]=u;return p}var f={};e.cancel=function(b){return b&&b.$$intervalId in f?(f[b.$$intervalId].reject("canceled"),a.clearInterval(b.$$intervalId),delete f[b.$$intervalId],
!0):!1};return e}]}function ae(){this.$get=function(){return{id:"en-us",NUMBER_FORMATS:{DECIMAL_SEP:".",GROUP_SEP:",",PATTERNS:[{minInt:1,minFrac:0,maxFrac:3,posPre:"",posSuf:"",negPre:"-",negSuf:"",gSize:3,lgSize:3},{minInt:1,minFrac:2,maxFrac:2,posPre:"\u00a4",posSuf:"",negPre:"(\u00a4",negSuf:")",gSize:3,lgSize:3}],CURRENCY_SYM:"$"},DATETIME_FORMATS:{MONTH:"January February March April May June July August September October November December".split(" "),SHORTMONTH:"Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" "),
DAY:"Sunday Monday Tuesday Wednesday Thursday Friday Saturday".split(" "),SHORTDAY:"Sun Mon Tue Wed Thu Fri Sat".split(" "),AMPMS:["AM","PM"],medium:"MMM d, y h:mm:ss a","short":"M/d/yy h:mm a",fullDate:"EEEE, MMMM d, y",longDate:"MMMM d, y",mediumDate:"MMM d, y",shortDate:"M/d/yy",mediumTime:"h:mm:ss a",shortTime:"h:mm a",ERANAMES:["Before Christ","Anno Domini"],ERAS:["BC","AD"]},pluralCat:function(b){return 1===b?"one":"other"}}}}function Zb(b){b=b.split("/");for(var a=b.length;a--;)b[a]=kb(b[a]);
return b.join("/")}function bd(b,a){var c=za(b);a.$$protocol=c.protocol;a.$$host=c.hostname;a.$$port=aa(c.port)||Nf[c.protocol]||null}function cd(b,a){var c="/"!==b.charAt(0);c&&(b="/"+b);var d=za(b);a.$$path=decodeURIComponent(c&&"/"===d.pathname.charAt(0)?d.pathname.substring(1):d.pathname);a.$$search=sc(d.search);a.$$hash=decodeURIComponent(d.hash);a.$$path&&"/"!=a.$$path.charAt(0)&&(a.$$path="/"+a.$$path)}function xa(b,a){if(0===a.indexOf(b))return a.substr(b.length)}function Fa(b){var a=b.indexOf("#");
return-1==a?b:b.substr(0,a)}function yb(b){return b.replace(/(#.+)|#$/,"$1")}function $b(b){return b.substr(0,Fa(b).lastIndexOf("/")+1)}function ac(b,a){this.$$html5=!0;a=a||"";var c=$b(b);bd(b,this);this.$$parse=function(a){var b=xa(c,a);if(!M(b))throw zb("ipthprfx",a,c);cd(b,this);this.$$path||(this.$$path="/");this.$$compose()};this.$$compose=function(){var a=Nb(this.$$search),b=this.$$hash?"#"+kb(this.$$hash):"";this.$$url=Zb(this.$$path)+(a?"?"+a:"")+b;this.$$absUrl=c+this.$$url.substr(1)};this.$$parseLinkUrl=
function(d,e){if(e&&"#"===e[0])return this.hash(e.slice(1)),!0;var f,g;(f=xa(b,d))!==t?(g=f,g=(f=xa(a,f))!==t?c+(xa("/",f)||f):b+g):(f=xa(c,d))!==t?g=c+f:c==d+"/"&&(g=c);g&&this.$$parse(g);return!!g}}function bc(b,a){var c=$b(b);bd(b,this);this.$$parse=function(d){d=xa(b,d)||xa(c,d);var e;"#"===d.charAt(0)?(e=xa(a,d),v(e)&&(e=d)):e=this.$$html5?d:"";cd(e,this);d=this.$$path;var f=/^\/[A-Z]:(\/.*)/;0===e.indexOf(b)&&(e=e.replace(b,""));f.exec(e)||(d=(e=f.exec(d))?e[1]:d);this.$$path=d;this.$$compose()};
this.$$compose=function(){var c=Nb(this.$$search),e=this.$$hash?"#"+kb(this.$$hash):"";this.$$url=Zb(this.$$path)+(c?"?"+c:"")+e;this.$$absUrl=b+(this.$$url?a+this.$$url:"")};this.$$parseLinkUrl=function(a,c){return Fa(b)==Fa(a)?(this.$$parse(a),!0):!1}}function dd(b,a){this.$$html5=!0;bc.apply(this,arguments);var c=$b(b);this.$$parseLinkUrl=function(d,e){if(e&&"#"===e[0])return this.hash(e.slice(1)),!0;var f,g;b==Fa(d)?f=d:(g=xa(c,d))?f=b+a+g:c===d+"/"&&(f=c);f&&this.$$parse(f);return!!f};this.$$compose=
function(){var c=Nb(this.$$search),e=this.$$hash?"#"+kb(this.$$hash):"";this.$$url=Zb(this.$$path)+(c?"?"+c:"")+e;this.$$absUrl=b+a+this.$$url}}function Ab(b){return function(){return this[b]}}function ed(b,a){return function(c){if(v(c))return this[b];this[b]=a(c);this.$$compose();return this}}function $e(){var b="",a={enabled:!1,requireBase:!0,rewriteLinks:!0};this.hashPrefix=function(a){return z(a)?(b=a,this):b};this.html5Mode=function(b){return Va(b)?(a.enabled=b,this):D(b)?(Va(b.enabled)&&(a.enabled=
b.enabled),Va(b.requireBase)&&(a.requireBase=b.requireBase),Va(b.rewriteLinks)&&(a.rewriteLinks=b.rewriteLinks),this):a};this.$get=["$rootScope","$browser","$sniffer","$rootElement","$window",function(c,d,e,f,g){function h(a,b,c){var e=k.url(),f=k.$$state;try{d.url(a,b,c),k.$$state=d.state()}catch(g){throw k.url(e),k.$$state=f,g;}}function l(a,b){c.$broadcast("$locationChangeSuccess",k.absUrl(),a,k.$$state,b)}var k,m;m=d.baseHref();var r=d.url(),s;if(a.enabled){if(!m&&a.requireBase)throw zb("nobase");
s=r.substring(0,r.indexOf("/",r.indexOf("//")+2))+(m||"/");m=e.history?ac:dd}else s=Fa(r),m=bc;k=new m(s,"#"+b);k.$$parseLinkUrl(r,r);k.$$state=d.state();var y=/^\s*(javascript|mailto):/i;f.on("click",function(b){if(a.rewriteLinks&&!b.ctrlKey&&!b.metaKey&&!b.shiftKey&&2!=b.which&&2!=b.button){for(var e=C(b.target);"a"!==ra(e[0]);)if(e[0]===f[0]||!(e=e.parent())[0])return;var h=e.prop("href"),l=e.attr("href")||e.attr("xlink:href");D(h)&&"[object SVGAnimatedString]"===h.toString()&&(h=za(h.animVal).href);
y.test(h)||!h||e.attr("target")||b.isDefaultPrevented()||!k.$$parseLinkUrl(h,l)||(b.preventDefault(),k.absUrl()!=d.url()&&(c.$apply(),g.angular["ff-684208-preventDefault"]=!0))}});yb(k.absUrl())!=yb(r)&&d.url(k.absUrl(),!0);var H=!0;d.onUrlChange(function(a,b){c.$evalAsync(function(){var d=k.absUrl(),e=k.$$state,f;k.$$parse(a);k.$$state=b;f=c.$broadcast("$locationChangeStart",a,d,b,e).defaultPrevented;k.absUrl()===a&&(f?(k.$$parse(d),k.$$state=e,h(d,!1,e)):(H=!1,l(d,e)))});c.$$phase||c.$digest()});
c.$watch(function(){var a=yb(d.url()),b=yb(k.absUrl()),f=d.state(),g=k.$$replace,m=a!==b||k.$$html5&&e.history&&f!==k.$$state;if(H||m)H=!1,c.$evalAsync(function(){var b=k.absUrl(),d=c.$broadcast("$locationChangeStart",b,a,k.$$state,f).defaultPrevented;k.absUrl()===b&&(d?(k.$$parse(a),k.$$state=f):(m&&h(b,g,f===k.$$state?null:k.$$state),l(a,f)))});k.$$replace=!1});return k}]}function af(){var b=!0,a=this;this.debugEnabled=function(a){return z(a)?(b=a,this):b};this.$get=["$window",function(c){function d(a){a instanceof
Error&&(a.stack?a=a.message&&-1===a.stack.indexOf(a.message)?"Error: "+a.message+"\n"+a.stack:a.stack:a.sourceURL&&(a=a.message+"\n"+a.sourceURL+":"+a.line));return a}function e(a){var b=c.console||{},e=b[a]||b.log||x;a=!1;try{a=!!e.apply}catch(l){}return a?function(){var a=[];n(arguments,function(b){a.push(d(b))});return e.apply(b,a)}:function(a,b){e(a,null==b?"":b)}}return{log:e("log"),info:e("info"),warn:e("warn"),error:e("error"),debug:function(){var c=e("debug");return function(){b&&c.apply(a,
arguments)}}()}}]}function Aa(b,a){if("__defineGetter__"===b||"__defineSetter__"===b||"__lookupGetter__"===b||"__lookupSetter__"===b||"__proto__"===b)throw ca("isecfld",a);return b}function ia(b,a){if(b){if(b.constructor===b)throw ca("isecfn",a);if(b.window===b)throw ca("isecwindow",a);if(b.children&&(b.nodeName||b.prop&&b.attr&&b.find))throw ca("isecdom",a);if(b===Object)throw ca("isecobj",a);}return b}function fd(b,a){if(b){if(b.constructor===b)throw ca("isecfn",a);if(b===Of||b===Pf||b===Qf)throw ca("isecff",
a);}}function Rf(b,a){return"undefined"!==typeof b?b:a}function gd(b,a){return"undefined"===typeof b?a:"undefined"===typeof a?b:b+a}function U(b,a){var c,d;switch(b.type){case q.Program:c=!0;n(b.body,function(b){U(b.expression,a);c=c&&b.expression.constant});b.constant=c;break;case q.Literal:b.constant=!0;b.toWatch=[];break;case q.UnaryExpression:U(b.argument,a);b.constant=b.argument.constant;b.toWatch=b.argument.toWatch;break;case q.BinaryExpression:U(b.left,a);U(b.right,a);b.constant=b.left.constant&&
b.right.constant;b.toWatch=b.left.toWatch.concat(b.right.toWatch);break;case q.LogicalExpression:U(b.left,a);U(b.right,a);b.constant=b.left.constant&&b.right.constant;b.toWatch=b.constant?[]:[b];break;case q.ConditionalExpression:U(b.test,a);U(b.alternate,a);U(b.consequent,a);b.constant=b.test.constant&&b.alternate.constant&&b.consequent.constant;b.toWatch=b.constant?[]:[b];break;case q.Identifier:b.constant=!1;b.toWatch=[b];break;case q.MemberExpression:U(b.object,a);b.computed&&U(b.property,a);
b.constant=b.object.constant&&(!b.computed||b.property.constant);b.toWatch=[b];break;case q.CallExpression:c=b.filter?!a(b.callee.name).$stateful:!1;d=[];n(b.arguments,function(b){U(b,a);c=c&&b.constant;b.constant||d.push.apply(d,b.toWatch)});b.constant=c;b.toWatch=b.filter&&!a(b.callee.name).$stateful?d:[b];break;case q.AssignmentExpression:U(b.left,a);U(b.right,a);b.constant=b.left.constant&&b.right.constant;b.toWatch=[b];break;case q.ArrayExpression:c=!0;d=[];n(b.elements,function(b){U(b,a);c=
c&&b.constant;b.constant||d.push.apply(d,b.toWatch)});b.constant=c;b.toWatch=d;break;case q.ObjectExpression:c=!0;d=[];n(b.properties,function(b){U(b.value,a);c=c&&b.value.constant;b.value.constant||d.push.apply(d,b.value.toWatch)});b.constant=c;b.toWatch=d;break;case q.ThisExpression:b.constant=!1,b.toWatch=[]}}function hd(b){if(1==b.length){b=b[0].expression;var a=b.toWatch;return 1!==a.length?a:a[0]!==b?a:t}}function id(b){return b.type===q.Identifier||b.type===q.MemberExpression}function jd(b){if(1===
b.body.length&&id(b.body[0].expression))return{type:q.AssignmentExpression,left:b.body[0].expression,right:{type:q.NGValueParameter},operator:"="}}function kd(b){return 0===b.body.length||1===b.body.length&&(b.body[0].expression.type===q.Literal||b.body[0].expression.type===q.ArrayExpression||b.body[0].expression.type===q.ObjectExpression)}function ld(b,a){this.astBuilder=b;this.$filter=a}function md(b,a){this.astBuilder=b;this.$filter=a}function Bb(b,a,c,d){ia(b,d);a=a.split(".");for(var e,f=0;1<
a.length;f++){e=Aa(a.shift(),d);var g=ia(b[e],d);g||(g={},b[e]=g);b=g}e=Aa(a.shift(),d);ia(b[e],d);return b[e]=c}function Cb(b){return"constructor"==b}function cc(b){return E(b.valueOf)?b.valueOf():Sf.call(b)}function bf(){var b=la(),a=la();this.$get=["$filter","$sniffer",function(c,d){function e(a,b){return null==a||null==b?a===b:"object"===typeof a&&(a=cc(a),"object"===typeof a)?!1:a===b||a!==a&&b!==b}function f(a,b,c,d,f){var g=d.inputs,h;if(1===g.length){var l=e,g=g[0];return a.$watch(function(a){var b=
g(a);e(b,l)||(h=d(a,t,t,[b]),l=b&&cc(b));return h},b,c,f)}for(var k=[],m=[],r=0,A=g.length;r<A;r++)k[r]=e,m[r]=null;return a.$watch(function(a){for(var b=!1,c=0,f=g.length;c<f;c++){var l=g[c](a);if(b||(b=!e(l,k[c])))m[c]=l,k[c]=l&&cc(l)}b&&(h=d(a,t,t,m));return h},b,c,f)}function g(a,b,c,d){var e,f;return e=a.$watch(function(a){return d(a)},function(a,c,d){f=a;E(b)&&b.apply(this,arguments);z(a)&&d.$$postDigest(function(){z(f)&&e()})},c)}function h(a,b,c,d){function e(a){var b=!0;n(a,function(a){z(a)||
(b=!1)});return b}var f,g;return f=a.$watch(function(a){return d(a)},function(a,c,d){g=a;E(b)&&b.call(this,a,c,d);e(a)&&d.$$postDigest(function(){e(g)&&f()})},c)}function l(a,b,c,d){var e;return e=a.$watch(function(a){return d(a)},function(a,c,d){E(b)&&b.apply(this,arguments);e()},c)}function k(a,b){if(!b)return a;var c=a.$$watchDelegate,c=c!==h&&c!==g?function(c,d,e,f){e=a(c,d,e,f);return b(e,c,d)}:function(c,d,e,f){e=a(c,d,e,f);c=b(e,c,d);return z(e)?c:e};a.$$watchDelegate&&a.$$watchDelegate!==
f?c.$$watchDelegate=a.$$watchDelegate:b.$stateful||(c.$$watchDelegate=f,c.inputs=a.inputs?a.inputs:[a]);return c}var m={csp:d.csp,expensiveChecks:!1},r={csp:d.csp,expensiveChecks:!0};return function(d,e,H){var n,u,p;switch(typeof d){case "string":p=d=d.trim();var q=H?a:b;n=q[p];n||(":"===d.charAt(0)&&":"===d.charAt(1)&&(u=!0,d=d.substring(2)),H=H?r:m,n=new dc(H),n=(new ec(n,c,H)).parse(d),n.constant?n.$$watchDelegate=l:u?n.$$watchDelegate=n.literal?h:g:n.inputs&&(n.$$watchDelegate=f),q[p]=n);return k(n,
e);case "function":return k(d,e);default:return x}}}]}function df(){this.$get=["$rootScope","$exceptionHandler",function(b,a){return nd(function(a){b.$evalAsync(a)},a)}]}function ef(){this.$get=["$browser","$exceptionHandler",function(b,a){return nd(function(a){b.defer(a)},a)}]}function nd(b,a){function c(a,b,c){function d(b){return function(c){e||(e=!0,b.call(a,c))}}var e=!1;return[d(b),d(c)]}function d(){this.$$state={status:0}}function e(a,b){return function(c){b.call(a,c)}}function f(c){!c.processScheduled&&
c.pending&&(c.processScheduled=!0,b(function(){var b,d,e;e=c.pending;c.processScheduled=!1;c.pending=t;for(var f=0,g=e.length;f<g;++f){d=e[f][0];b=e[f][c.status];try{E(b)?d.resolve(b(c.value)):1===c.status?d.resolve(c.value):d.reject(c.value)}catch(h){d.reject(h),a(h)}}}))}function g(){this.promise=new d;this.resolve=e(this,this.resolve);this.reject=e(this,this.reject);this.notify=e(this,this.notify)}var h=G("$q",TypeError);d.prototype={then:function(a,b,c){var d=new g;this.$$state.pending=this.$$state.pending||
[];this.$$state.pending.push([d,a,b,c]);0<this.$$state.status&&f(this.$$state);return d.promise},"catch":function(a){return this.then(null,a)},"finally":function(a,b){return this.then(function(b){return k(b,!0,a)},function(b){return k(b,!1,a)},b)}};g.prototype={resolve:function(a){this.promise.$$state.status||(a===this.promise?this.$$reject(h("qcycle",a)):this.$$resolve(a))},$$resolve:function(b){var d,e;e=c(this,this.$$resolve,this.$$reject);try{if(D(b)||E(b))d=b&&b.then;E(d)?(this.promise.$$state.status=
-1,d.call(b,e[0],e[1],this.notify)):(this.promise.$$state.value=b,this.promise.$$state.status=1,f(this.promise.$$state))}catch(g){e[1](g),a(g)}},reject:function(a){this.promise.$$state.status||this.$$reject(a)},$$reject:function(a){this.promise.$$state.value=a;this.promise.$$state.status=2;f(this.promise.$$state)},notify:function(c){var d=this.promise.$$state.pending;0>=this.promise.$$state.status&&d&&d.length&&b(function(){for(var b,e,f=0,g=d.length;f<g;f++){e=d[f][0];b=d[f][3];try{e.notify(E(b)?
b(c):c)}catch(h){a(h)}}})}};var l=function(a,b){var c=new g;b?c.resolve(a):c.reject(a);return c.promise},k=function(a,b,c){var d=null;try{E(c)&&(d=c())}catch(e){return l(e,!1)}return d&&E(d.then)?d.then(function(){return l(a,b)},function(a){return l(a,!1)}):l(a,b)},m=function(a,b,c,d){var e=new g;e.resolve(a);return e.promise.then(b,c,d)},r=function y(a){if(!E(a))throw h("norslvr",a);if(!(this instanceof y))return new y(a);var b=new g;a(function(a){b.resolve(a)},function(a){b.reject(a)});return b.promise};
r.defer=function(){return new g};r.reject=function(a){var b=new g;b.reject(a);return b.promise};r.when=m;r.all=function(a){var b=new g,c=0,d=L(a)?[]:{};n(a,function(a,e){c++;m(a).then(function(a){d.hasOwnProperty(e)||(d[e]=a,--c||b.resolve(d))},function(a){d.hasOwnProperty(e)||b.reject(a)})});0===c&&b.resolve(d);return b.promise};return r}function of(){this.$get=["$window","$timeout",function(b,a){var c=b.requestAnimationFrame||b.webkitRequestAnimationFrame,d=b.cancelAnimationFrame||b.webkitCancelAnimationFrame||
b.webkitCancelRequestAnimationFrame,e=!!c,f=e?function(a){var b=c(a);return function(){d(b)}}:function(b){var c=a(b,16.66,!1);return function(){a.cancel(c)}};f.supported=e;return f}]}function cf(){function b(a){function b(){this.$$watchers=this.$$nextSibling=this.$$childHead=this.$$childTail=null;this.$$listeners={};this.$$listenerCount={};this.$$watchersCount=0;this.$id=++jb;this.$$ChildScope=null}b.prototype=a;return b}var a=10,c=G("$rootScope"),d=null,e=null;this.digestTtl=function(b){arguments.length&&
(a=b);return a};this.$get=["$injector","$exceptionHandler","$parse","$browser",function(f,g,h,l){function k(a){a.currentScope.$$destroyed=!0}function m(){this.$id=++jb;this.$$phase=this.$parent=this.$$watchers=this.$$nextSibling=this.$$prevSibling=this.$$childHead=this.$$childTail=null;this.$root=this;this.$$destroyed=!1;this.$$listeners={};this.$$listenerCount={};this.$$watchersCount=0;this.$$isolateBindings=null}function r(a){if(p.$$phase)throw c("inprog",p.$$phase);p.$$phase=a}function s(a,b){do a.$$watchersCount+=
b;while(a=a.$parent)}function y(a,b,c){do a.$$listenerCount[c]-=b,0===a.$$listenerCount[c]&&delete a.$$listenerCount[c];while(a=a.$parent)}function q(){}function t(){for(;K.length;)try{K.shift()()}catch(a){g(a)}e=null}function u(){null===e&&(e=l.defer(function(){p.$apply(t)}))}m.prototype={constructor:m,$new:function(a,c){var d;c=c||this;a?(d=new m,d.$root=this.$root):(this.$$ChildScope||(this.$$ChildScope=b(this)),d=new this.$$ChildScope);d.$parent=c;d.$$prevSibling=c.$$childTail;c.$$childHead?(c.$$childTail.$$nextSibling=
d,c.$$childTail=d):c.$$childHead=c.$$childTail=d;(a||c!=this)&&d.$on("$destroy",k);return d},$watch:function(a,b,c,e){var f=h(a);if(f.$$watchDelegate)return f.$$watchDelegate(this,b,c,f,a);var g=this,l=g.$$watchers,k={fn:b,last:q,get:f,exp:e||a,eq:!!c};d=null;E(b)||(k.fn=x);l||(l=g.$$watchers=[]);l.unshift(k);s(this,1);return function(){0<=Wa(l,k)&&s(g,-1);d=null}},$watchGroup:function(a,b){function c(){h=!1;l?(l=!1,b(e,e,g)):b(e,d,g)}var d=Array(a.length),e=Array(a.length),f=[],g=this,h=!1,l=!0;
if(!a.length){var k=!0;g.$evalAsync(function(){k&&b(e,e,g)});return function(){k=!1}}if(1===a.length)return this.$watch(a[0],function(a,c,f){e[0]=a;d[0]=c;b(e,a===c?e:d,f)});n(a,function(a,b){var l=g.$watch(a,function(a,f){e[b]=a;d[b]=f;h||(h=!0,g.$evalAsync(c))});f.push(l)});return function(){for(;f.length;)f.shift()()}},$watchCollection:function(a,b){function c(a){e=a;var b,d,g,h;if(!v(e)){if(D(e))if(Qa(e))for(f!==r&&(f=r,n=f.length=0,k++),a=e.length,n!==a&&(k++,f.length=n=a),b=0;b<a;b++)h=f[b],
g=e[b],d=h!==h&&g!==g,d||h===g||(k++,f[b]=g);else{f!==s&&(f=s={},n=0,k++);a=0;for(b in e)e.hasOwnProperty(b)&&(a++,g=e[b],h=f[b],b in f?(d=h!==h&&g!==g,d||h===g||(k++,f[b]=g)):(n++,f[b]=g,k++));if(n>a)for(b in k++,f)e.hasOwnProperty(b)||(n--,delete f[b])}else f!==e&&(f=e,k++);return k}}c.$stateful=!0;var d=this,e,f,g,l=1<b.length,k=0,m=h(a,c),r=[],s={},p=!0,n=0;return this.$watch(m,function(){p?(p=!1,b(e,e,d)):b(e,g,d);if(l)if(D(e))if(Qa(e)){g=Array(e.length);for(var a=0;a<e.length;a++)g[a]=e[a]}else for(a in g=
{},e)tc.call(e,a)&&(g[a]=e[a]);else g=e})},$digest:function(){var b,f,h,k,m,s,n=a,y,K=[],u,v;r("$digest");l.$$checkUrlChange();this===p&&null!==e&&(l.defer.cancel(e),t());d=null;do{s=!1;for(y=this;w.length;){try{v=w.shift(),v.scope.$eval(v.expression,v.locals)}catch(x){g(x)}d=null}a:do{if(k=y.$$watchers)for(m=k.length;m--;)try{if(b=k[m])if((f=b.get(y))!==(h=b.last)&&!(b.eq?ja(f,h):"number"===typeof f&&"number"===typeof h&&isNaN(f)&&isNaN(h)))s=!0,d=b,b.last=b.eq?sa(f,null):f,b.fn(f,h===q?f:h,y),5>
n&&(u=4-n,K[u]||(K[u]=[]),K[u].push({msg:E(b.exp)?"fn: "+(b.exp.name||b.exp.toString()):b.exp,newVal:f,oldVal:h}));else if(b===d){s=!1;break a}}catch(C){g(C)}if(!(k=y.$$watchersCount&&y.$$childHead||y!==this&&y.$$nextSibling))for(;y!==this&&!(k=y.$$nextSibling);)y=y.$parent}while(y=k);if((s||w.length)&&!n--)throw p.$$phase=null,c("infdig",a,K);}while(s||w.length);for(p.$$phase=null;z.length;)try{z.shift()()}catch(D){g(D)}},$destroy:function(){if(!this.$$destroyed){var a=this.$parent;this.$broadcast("$destroy");
this.$$destroyed=!0;this===p&&l.$$applicationDestroyed();s(this,-this.$$watchersCount);for(var b in this.$$listenerCount)y(this,this.$$listenerCount[b],b);a&&a.$$childHead==this&&(a.$$childHead=this.$$nextSibling);a&&a.$$childTail==this&&(a.$$childTail=this.$$prevSibling);this.$$prevSibling&&(this.$$prevSibling.$$nextSibling=this.$$nextSibling);this.$$nextSibling&&(this.$$nextSibling.$$prevSibling=this.$$prevSibling);this.$destroy=this.$digest=this.$apply=this.$evalAsync=this.$applyAsync=x;this.$on=
this.$watch=this.$watchGroup=function(){return x};this.$$listeners={};this.$parent=this.$$nextSibling=this.$$prevSibling=this.$$childHead=this.$$childTail=this.$root=this.$$watchers=null}},$eval:function(a,b){return h(a)(this,b)},$evalAsync:function(a,b){p.$$phase||w.length||l.defer(function(){w.length&&p.$digest()});w.push({scope:this,expression:a,locals:b})},$$postDigest:function(a){z.push(a)},$apply:function(a){try{return r("$apply"),this.$eval(a)}catch(b){g(b)}finally{p.$$phase=null;try{p.$digest()}catch(c){throw g(c),
c;}}},$applyAsync:function(a){function b(){c.$eval(a)}var c=this;a&&K.push(b);u()},$on:function(a,b){var c=this.$$listeners[a];c||(this.$$listeners[a]=c=[]);c.push(b);var d=this;do d.$$listenerCount[a]||(d.$$listenerCount[a]=0),d.$$listenerCount[a]++;while(d=d.$parent);var e=this;return function(){var d=c.indexOf(b);-1!==d&&(c[d]=null,y(e,1,a))}},$emit:function(a,b){var c=[],d,e=this,f=!1,h={name:a,targetScope:e,stopPropagation:function(){f=!0},preventDefault:function(){h.defaultPrevented=!0},defaultPrevented:!1},
k=Xa([h],arguments,1),l,m;do{d=e.$$listeners[a]||c;h.currentScope=e;l=0;for(m=d.length;l<m;l++)if(d[l])try{d[l].apply(null,k)}catch(r){g(r)}else d.splice(l,1),l--,m--;if(f)return h.currentScope=null,h;e=e.$parent}while(e);h.currentScope=null;return h},$broadcast:function(a,b){var c=this,d=this,e={name:a,targetScope:this,preventDefault:function(){e.defaultPrevented=!0},defaultPrevented:!1};if(!this.$$listenerCount[a])return e;for(var f=Xa([e],arguments,1),h,l;c=d;){e.currentScope=c;d=c.$$listeners[a]||
[];h=0;for(l=d.length;h<l;h++)if(d[h])try{d[h].apply(null,f)}catch(k){g(k)}else d.splice(h,1),h--,l--;if(!(d=c.$$listenerCount[a]&&c.$$childHead||c!==this&&c.$$nextSibling))for(;c!==this&&!(d=c.$$nextSibling);)c=c.$parent}e.currentScope=null;return e}};var p=new m,w=p.$$asyncQueue=[],z=p.$$postDigestQueue=[],K=p.$$applyAsyncQueue=[];return p}]}function be(){var b=/^\s*(https?|ftp|mailto|tel|file):/,a=/^\s*((https?|ftp|file|blob):|data:image\/)/;this.aHrefSanitizationWhitelist=function(a){return z(a)?
(b=a,this):b};this.imgSrcSanitizationWhitelist=function(b){return z(b)?(a=b,this):a};this.$get=function(){return function(c,d){var e=d?a:b,f;f=za(c).href;return""===f||f.match(e)?c:"unsafe:"+f}}}function Tf(b){if("self"===b)return b;if(M(b)){if(-1<b.indexOf("***"))throw Ba("iwcard",b);b=od(b).replace("\\*\\*",".*").replace("\\*","[^:/.?&;]*");return new RegExp("^"+b+"$")}if(Ta(b))return new RegExp("^"+b.source+"$");throw Ba("imatcher");}function pd(b){var a=[];z(b)&&n(b,function(b){a.push(Tf(b))});
return a}function gf(){this.SCE_CONTEXTS=ma;var b=["self"],a=[];this.resourceUrlWhitelist=function(a){arguments.length&&(b=pd(a));return b};this.resourceUrlBlacklist=function(b){arguments.length&&(a=pd(b));return a};this.$get=["$injector",function(c){function d(a,b){return"self"===a?ad(b):!!a.exec(b.href)}function e(a){var b=function(a){this.$$unwrapTrustedValue=function(){return a}};a&&(b.prototype=new a);b.prototype.valueOf=function(){return this.$$unwrapTrustedValue()};b.prototype.toString=function(){return this.$$unwrapTrustedValue().toString()};
return b}var f=function(a){throw Ba("unsafe");};c.has("$sanitize")&&(f=c.get("$sanitize"));var g=e(),h={};h[ma.HTML]=e(g);h[ma.CSS]=e(g);h[ma.URL]=e(g);h[ma.JS]=e(g);h[ma.RESOURCE_URL]=e(h[ma.URL]);return{trustAs:function(a,b){var c=h.hasOwnProperty(a)?h[a]:null;if(!c)throw Ba("icontext",a,b);if(null===b||b===t||""===b)return b;if("string"!==typeof b)throw Ba("itype",a);return new c(b)},getTrusted:function(c,e){if(null===e||e===t||""===e)return e;var g=h.hasOwnProperty(c)?h[c]:null;if(g&&e instanceof
g)return e.$$unwrapTrustedValue();if(c===ma.RESOURCE_URL){var g=za(e.toString()),r,s,y=!1;r=0;for(s=b.length;r<s;r++)if(d(b[r],g)){y=!0;break}if(y)for(r=0,s=a.length;r<s;r++)if(d(a[r],g)){y=!1;break}if(y)return e;throw Ba("insecurl",e.toString());}if(c===ma.HTML)return f(e);throw Ba("unsafe");},valueOf:function(a){return a instanceof g?a.$$unwrapTrustedValue():a}}}]}function ff(){var b=!0;this.enabled=function(a){arguments.length&&(b=!!a);return b};this.$get=["$parse","$sceDelegate",function(a,c){if(b&&
8>fb)throw Ba("iequirks");var d=fa(ma);d.isEnabled=function(){return b};d.trustAs=c.trustAs;d.getTrusted=c.getTrusted;d.valueOf=c.valueOf;b||(d.trustAs=d.getTrusted=function(a,b){return b},d.valueOf=Sa);d.parseAs=function(b,c){var e=a(c);return e.literal&&e.constant?e:a(c,function(a){return d.getTrusted(b,a)})};var e=d.parseAs,f=d.getTrusted,g=d.trustAs;n(ma,function(a,b){var c=F(b);d[cb("parse_as_"+c)]=function(b){return e(a,b)};d[cb("get_trusted_"+c)]=function(b){return f(a,b)};d[cb("trust_as_"+
c)]=function(b){return g(a,b)}});return d}]}function hf(){this.$get=["$window","$document",function(b,a){var c={},d=aa((/android (\d+)/.exec(F((b.navigator||{}).userAgent))||[])[1]),e=/Boxee/i.test((b.navigator||{}).userAgent),f=a[0]||{},g,h=/^(Moz|webkit|ms)(?=[A-Z])/,l=f.body&&f.body.style,k=!1,m=!1;if(l){for(var r in l)if(k=h.exec(r)){g=k[0];g=g.substr(0,1).toUpperCase()+g.substr(1);break}g||(g="WebkitOpacity"in l&&"webkit");k=!!("transition"in l||g+"Transition"in l);m=!!("animation"in l||g+"Animation"in
l);!d||k&&m||(k=M(l.webkitTransition),m=M(l.webkitAnimation))}return{history:!(!b.history||!b.history.pushState||4>d||e),hasEvent:function(a){if("input"===a&&11>=fb)return!1;if(v(c[a])){var b=f.createElement("div");c[a]="on"+a in b}return c[a]},csp:ab(),vendorPrefix:g,transitions:k,animations:m,android:d}}]}function kf(){this.$get=["$templateCache","$http","$q",function(b,a,c){function d(e,f){d.totalPendingRequests++;var g=a.defaults&&a.defaults.transformResponse;L(g)?g=g.filter(function(a){return a!==
Xb}):g===Xb&&(g=null);return a.get(e,{cache:b,transformResponse:g})["finally"](function(){d.totalPendingRequests--}).then(function(a){b.put(e,a.data);return a.data},function(a){if(!f)throw ha("tpload",e,a.status,a.statusText);return c.reject(a)})}d.totalPendingRequests=0;return d}]}function lf(){this.$get=["$rootScope","$browser","$location",function(b,a,c){return{findBindings:function(a,b,c){a=a.getElementsByClassName("ng-binding");var g=[];n(a,function(a){var d=ba.element(a).data("$binding");d&&
n(d,function(d){c?(new RegExp("(^|\\s)"+od(b)+"(\\s|\\||$)")).test(d)&&g.push(a):-1!=d.indexOf(b)&&g.push(a)})});return g},findModels:function(a,b,c){for(var g=["ng-","data-ng-","ng\\:"],h=0;h<g.length;++h){var l=a.querySelectorAll("["+g[h]+"model"+(c?"=":"*=")+'"'+b+'"]');if(l.length)return l}},getLocation:function(){return c.url()},setLocation:function(a){a!==c.url()&&(c.url(a),b.$digest())},whenStable:function(b){a.notifyWhenNoOutstandingRequests(b)}}}]}function mf(){this.$get=["$rootScope","$browser",
"$q","$$q","$exceptionHandler",function(b,a,c,d,e){function f(f,l,k){E(f)||(k=l,l=f,f=x);var m=pa.call(arguments,3),r=z(k)&&!k,s=(r?d:c).defer(),n=s.promise,q;q=a.defer(function(){try{s.resolve(f.apply(null,m))}catch(a){s.reject(a),e(a)}finally{delete g[n.$$timeoutId]}r||b.$apply()},l);n.$$timeoutId=q;g[q]=s;return n}var g={};f.cancel=function(b){return b&&b.$$timeoutId in g?(g[b.$$timeoutId].reject("canceled"),delete g[b.$$timeoutId],a.defer.cancel(b.$$timeoutId)):!1};return f}]}function za(b){fb&&
(X.setAttribute("href",b),b=X.href);X.setAttribute("href",b);return{href:X.href,protocol:X.protocol?X.protocol.replace(/:$/,""):"",host:X.host,search:X.search?X.search.replace(/^\?/,""):"",hash:X.hash?X.hash.replace(/^#/,""):"",hostname:X.hostname,port:X.port,pathname:"/"===X.pathname.charAt(0)?X.pathname:"/"+X.pathname}}function ad(b){b=M(b)?za(b):b;return b.protocol===qd.protocol&&b.host===qd.host}function nf(){this.$get=oa(Q)}function rd(b){function a(a){try{return decodeURIComponent(a)}catch(b){return a}}
var c=b[0]||{},d={},e="";return function(){var b,g,h,l,k;b=c.cookie||"";if(b!==e)for(e=b,b=e.split("; "),d={},h=0;h<b.length;h++)g=b[h],l=g.indexOf("="),0<l&&(k=a(g.substring(0,l)),d[k]===t&&(d[k]=a(g.substring(l+1))));return d}}function sf(){this.$get=rd}function Fc(b){function a(c,d){if(D(c)){var e={};n(c,function(b,c){e[c]=a(c,b)});return e}return b.factory(c+"Filter",d)}this.register=a;this.$get=["$injector",function(a){return function(b){return a.get(b+"Filter")}}];a("currency",sd);a("date",
td);a("filter",Uf);a("json",Vf);a("limitTo",Wf);a("lowercase",Xf);a("number",ud);a("orderBy",vd);a("uppercase",Yf)}function Uf(){return function(b,a,c){if(!L(b)){if(null==b)return b;throw G("filter")("notarray",b);}var d;switch(fc(a)){case "function":break;case "boolean":case "null":case "number":case "string":d=!0;case "object":a=Zf(a,c,d);break;default:return b}return b.filter(a)}}function Zf(b,a,c){var d=D(b)&&"$"in b;!0===a?a=ja:E(a)||(a=function(a,b){if(v(a))return!1;if(null===a||null===b)return a===
b;var c;!(c=D(b))&&(c=D(a))&&(c=a,c=!(E(c.toString)&&c.toString!==Object.prototype.toString));if(c)return!1;a=F(""+a);b=F(""+b);return-1!==a.indexOf(b)});return function(e){return d&&!D(e)?Ia(e,b.$,a,!1):Ia(e,b,a,c)}}function Ia(b,a,c,d,e){var f=fc(b),g=fc(a);if("string"===g&&"!"===a.charAt(0))return!Ia(b,a.substring(1),c,d);if(L(b))return b.some(function(b){return Ia(b,a,c,d)});switch(f){case "object":var h;if(d){for(h in b)if("$"!==h.charAt(0)&&Ia(b[h],a,c,!0))return!0;return e?!1:Ia(b,a,c,!1)}if("object"===
g){for(h in a)if(e=a[h],!E(e)&&!v(e)&&(f="$"===h,!Ia(f?b:b[h],e,c,f,f)))return!1;return!0}return c(b,a);case "function":return!1;default:return c(b,a)}}function fc(b){return null===b?"null":typeof b}function sd(b){var a=b.NUMBER_FORMATS;return function(b,d,e){v(d)&&(d=a.CURRENCY_SYM);v(e)&&(e=a.PATTERNS[1].maxFrac);return null==b?b:wd(b,a.PATTERNS[1],a.GROUP_SEP,a.DECIMAL_SEP,e).replace(/\u00A4/g,d)}}function ud(b){var a=b.NUMBER_FORMATS;return function(b,d){return null==b?b:wd(b,a.PATTERNS[0],a.GROUP_SEP,
a.DECIMAL_SEP,d)}}function wd(b,a,c,d,e){if(D(b))return"";var f=0>b;b=Math.abs(b);var g=Infinity===b;if(!g&&!isFinite(b))return"";var h=b+"",l="",k=!1,m=[];g&&(l="\u221e");if(!g&&-1!==h.indexOf("e")){var r=h.match(/([\d\.]+)e(-?)(\d+)/);r&&"-"==r[2]&&r[3]>e+1?b=0:(l=h,k=!0)}if(g||k)0<e&&1>b&&(l=b.toFixed(e),b=parseFloat(l));else{g=(h.split(xd)[1]||"").length;v(e)&&(e=Math.min(Math.max(a.minFrac,g),a.maxFrac));b=+(Math.round(+(b.toString()+"e"+e)).toString()+"e"+-e);var g=(""+b).split(xd),h=g[0],g=
g[1]||"",r=0,s=a.lgSize,n=a.gSize;if(h.length>=s+n)for(r=h.length-s,k=0;k<r;k++)0===(r-k)%n&&0!==k&&(l+=c),l+=h.charAt(k);for(k=r;k<h.length;k++)0===(h.length-k)%s&&0!==k&&(l+=c),l+=h.charAt(k);for(;g.length<e;)g+="0";e&&"0"!==e&&(l+=d+g.substr(0,e))}0===b&&(f=!1);m.push(f?a.negPre:a.posPre,l,f?a.negSuf:a.posSuf);return m.join("")}function Db(b,a,c){var d="";0>b&&(d="-",b=-b);for(b=""+b;b.length<a;)b="0"+b;c&&(b=b.substr(b.length-a));return d+b}function $(b,a,c,d){c=c||0;return function(e){e=e["get"+
b]();if(0<c||e>-c)e+=c;0===e&&-12==c&&(e=12);return Db(e,a,d)}}function Eb(b,a){return function(c,d){var e=c["get"+b](),f=nb(a?"SHORT"+b:b);return d[f][e]}}function yd(b){var a=(new Date(b,0,1)).getDay();return new Date(b,0,(4>=a?5:12)-a)}function zd(b){return function(a){var c=yd(a.getFullYear());a=+new Date(a.getFullYear(),a.getMonth(),a.getDate()+(4-a.getDay()))-+c;a=1+Math.round(a/6048E5);return Db(a,b)}}function gc(b,a){return 0>=b.getFullYear()?a.ERAS[0]:a.ERAS[1]}function td(b){function a(a){var b;
if(b=a.match(c)){a=new Date(0);var f=0,g=0,h=b[8]?a.setUTCFullYear:a.setFullYear,l=b[8]?a.setUTCHours:a.setHours;b[9]&&(f=aa(b[9]+b[10]),g=aa(b[9]+b[11]));h.call(a,aa(b[1]),aa(b[2])-1,aa(b[3]));f=aa(b[4]||0)-f;g=aa(b[5]||0)-g;h=aa(b[6]||0);b=Math.round(1E3*parseFloat("0."+(b[7]||0)));l.call(a,f,g,h,b)}return a}var c=/^(\d{4})-?(\d\d)-?(\d\d)(?:T(\d\d)(?::?(\d\d)(?::?(\d\d)(?:\.(\d+))?)?)?(Z|([+-])(\d\d):?(\d\d))?)?$/;return function(c,e,f){var g="",h=[],l,k;e=e||"mediumDate";e=b.DATETIME_FORMATS[e]||
e;M(c)&&(c=$f.test(c)?aa(c):a(c));T(c)&&(c=new Date(c));if(!ea(c)||!isFinite(c.getTime()))return c;for(;e;)(k=ag.exec(e))?(h=Xa(h,k,1),e=h.pop()):(h.push(e),e=null);var m=c.getTimezoneOffset();f&&(m=qc(f,c.getTimezoneOffset()),c=Mb(c,f,!0));n(h,function(a){l=bg[a];g+=l?l(c,b.DATETIME_FORMATS,m):a.replace(/(^'|'$)/g,"").replace(/''/g,"'")});return g}}function Vf(){return function(b,a){v(a)&&(a=2);return Ya(b,a)}}function Wf(){return function(b,a,c){a=Infinity===Math.abs(Number(a))?Number(a):aa(a);
if(isNaN(a))return b;T(b)&&(b=b.toString());if(!L(b)&&!M(b))return b;c=!c||isNaN(c)?0:aa(c);c=0>c&&c>=-b.length?b.length+c:c;return 0<=a?b.slice(c,c+a):0===c?b.slice(a,b.length):b.slice(Math.max(0,c+a),c)}}function vd(b){return function(a,c,d){function e(a,b){return b?function(b,c){return a(c,b)}:a}function f(a){switch(typeof a){case "number":case "boolean":case "string":return!0;default:return!1}}function g(a){return null===a?"null":"function"===typeof a.valueOf&&(a=a.valueOf(),f(a))||"function"===
typeof a.toString&&(a=a.toString(),f(a))?a:""}function h(a,b){var c=typeof a,d=typeof b;c===d&&"object"===c&&(a=g(a),b=g(b));return c===d?("string"===c&&(a=a.toLowerCase(),b=b.toLowerCase()),a===b?0:a<b?-1:1):c<d?-1:1}if(!Qa(a))return a;c=L(c)?c:[c];0===c.length&&(c=["+"]);c=c.map(function(a){var c=!1,d=a||Sa;if(M(a)){if("+"==a.charAt(0)||"-"==a.charAt(0))c="-"==a.charAt(0),a=a.substring(1);if(""===a)return e(h,c);d=b(a);if(d.constant){var f=d();return e(function(a,b){return h(a[f],b[f])},c)}}return e(function(a,
b){return h(d(a),d(b))},c)});return pa.call(a).sort(e(function(a,b){for(var d=0;d<c.length;d++){var e=c[d](a,b);if(0!==e)return e}return 0},d))}}function Ja(b){E(b)&&(b={link:b});b.restrict=b.restrict||"AC";return oa(b)}function Ad(b,a,c,d,e){var f=this,g=[],h=f.$$parentForm=b.parent().controller("form")||Fb;f.$error={};f.$$success={};f.$pending=t;f.$name=e(a.name||a.ngForm||"")(c);f.$dirty=!1;f.$pristine=!0;f.$valid=!0;f.$invalid=!1;f.$submitted=!1;h.$addControl(f);f.$rollbackViewValue=function(){n(g,
function(a){a.$rollbackViewValue()})};f.$commitViewValue=function(){n(g,function(a){a.$commitViewValue()})};f.$addControl=function(a){Na(a.$name,"input");g.push(a);a.$name&&(f[a.$name]=a)};f.$$renameControl=function(a,b){var c=a.$name;f[c]===a&&delete f[c];f[b]=a;a.$name=b};f.$removeControl=function(a){a.$name&&f[a.$name]===a&&delete f[a.$name];n(f.$pending,function(b,c){f.$setValidity(c,null,a)});n(f.$error,function(b,c){f.$setValidity(c,null,a)});n(f.$$success,function(b,c){f.$setValidity(c,null,
a)});Wa(g,a)};Bd({ctrl:this,$element:b,set:function(a,b,c){var d=a[b];d?-1===d.indexOf(c)&&d.push(c):a[b]=[c]},unset:function(a,b,c){var d=a[b];d&&(Wa(d,c),0===d.length&&delete a[b])},parentForm:h,$animate:d});f.$setDirty=function(){d.removeClass(b,Pa);d.addClass(b,Gb);f.$dirty=!0;f.$pristine=!1;h.$setDirty()};f.$setPristine=function(){d.setClass(b,Pa,Gb+" ng-submitted");f.$dirty=!1;f.$pristine=!0;f.$submitted=!1;n(g,function(a){a.$setPristine()})};f.$setUntouched=function(){n(g,function(a){a.$setUntouched()})};
f.$setSubmitted=function(){d.addClass(b,"ng-submitted");f.$submitted=!0;h.$setSubmitted()}}function hc(b){b.$formatters.push(function(a){return b.$isEmpty(a)?a:a.toString()})}function gb(b,a,c,d,e,f){var g=F(a[0].type);if(!e.android){var h=!1;a.on("compositionstart",function(a){h=!0});a.on("compositionend",function(){h=!1;l()})}var l=function(b){k&&(f.defer.cancel(k),k=null);if(!h){var e=a.val();b=b&&b.type;"password"===g||c.ngTrim&&"false"===c.ngTrim||(e=S(e));(d.$viewValue!==e||""===e&&d.$$hasNativeValidators)&&
d.$setViewValue(e,b)}};if(e.hasEvent("input"))a.on("input",l);else{var k,m=function(a,b,c){k||(k=f.defer(function(){k=null;b&&b.value===c||l(a)}))};a.on("keydown",function(a){var b=a.keyCode;91===b||15<b&&19>b||37<=b&&40>=b||m(a,this,this.value)});if(e.hasEvent("paste"))a.on("paste cut",m)}a.on("change",l);d.$render=function(){a.val(d.$isEmpty(d.$viewValue)?"":d.$viewValue)}}function Hb(b,a){return function(c,d){var e,f;if(ea(c))return c;if(M(c)){'"'==c.charAt(0)&&'"'==c.charAt(c.length-1)&&(c=c.substring(1,
c.length-1));if(cg.test(c))return new Date(c);b.lastIndex=0;if(e=b.exec(c))return e.shift(),f=d?{yyyy:d.getFullYear(),MM:d.getMonth()+1,dd:d.getDate(),HH:d.getHours(),mm:d.getMinutes(),ss:d.getSeconds(),sss:d.getMilliseconds()/1E3}:{yyyy:1970,MM:1,dd:1,HH:0,mm:0,ss:0,sss:0},n(e,function(b,c){c<a.length&&(f[a[c]]=+b)}),new Date(f.yyyy,f.MM-1,f.dd,f.HH,f.mm,f.ss||0,1E3*f.sss||0)}return NaN}}function hb(b,a,c,d){return function(e,f,g,h,l,k,m){function r(a){return a&&!(a.getTime&&a.getTime()!==a.getTime())}
function s(a){return z(a)?ea(a)?a:c(a):t}Cd(e,f,g,h);gb(e,f,g,h,l,k);var n=h&&h.$options&&h.$options.timezone,q;h.$$parserName=b;h.$parsers.push(function(b){return h.$isEmpty(b)?null:a.test(b)?(b=c(b,q),n&&(b=Mb(b,n)),b):t});h.$formatters.push(function(a){if(a&&!ea(a))throw Ib("datefmt",a);if(r(a))return(q=a)&&n&&(q=Mb(q,n,!0)),m("date")(a,d,n);q=null;return""});if(z(g.min)||g.ngMin){var J;h.$validators.min=function(a){return!r(a)||v(J)||c(a)>=J};g.$observe("min",function(a){J=s(a);h.$validate()})}if(z(g.max)||
g.ngMax){var u;h.$validators.max=function(a){return!r(a)||v(u)||c(a)<=u};g.$observe("max",function(a){u=s(a);h.$validate()})}}}function Cd(b,a,c,d){(d.$$hasNativeValidators=D(a[0].validity))&&d.$parsers.push(function(b){var c=a.prop("validity")||{};return c.badInput&&!c.typeMismatch?t:b})}function Dd(b,a,c,d,e){if(z(d)){b=b(d);if(!b.constant)throw G("ngModel")("constexpr",c,d);return b(a)}return e}function ic(b,a){b="ngClass"+b;return["$animate",function(c){function d(a,b){var c=[],d=0;a:for(;d<a.length;d++){for(var e=
a[d],m=0;m<b.length;m++)if(e==b[m])continue a;c.push(e)}return c}function e(a){var b=[];return L(a)?(n(a,function(a){b=b.concat(e(a))}),b):M(a)?a.split(" "):D(a)?(n(a,function(a,c){a&&(b=b.concat(c.split(" ")))}),b):a}return{restrict:"AC",link:function(f,g,h){function l(a,b){var c=g.data("$classCounts")||{},d=[];n(a,function(a){if(0<b||c[a])c[a]=(c[a]||0)+b,c[a]===+(0<b)&&d.push(a)});g.data("$classCounts",c);return d.join(" ")}function k(b){if(!0===a||f.$index%2===a){var k=e(b||[]);if(!m){var n=l(k,
1);h.$addClass(n)}else if(!ja(b,m)){var q=e(m),n=d(k,q),k=d(q,k),n=l(n,1),k=l(k,-1);n&&n.length&&c.addClass(g,n);k&&k.length&&c.removeClass(g,k)}}m=fa(b)}var m;f.$watch(h[b],k,!0);h.$observe("class",function(a){k(f.$eval(h[b]))});"ngClass"!==b&&f.$watch("$index",function(c,d){var g=c&1;if(g!==(d&1)){var k=e(f.$eval(h[b]));g===a?(g=l(k,1),h.$addClass(g)):(g=l(k,-1),h.$removeClass(g))}})}}}]}function Bd(b){function a(a,b){b&&!f[a]?(k.addClass(e,a),f[a]=!0):!b&&f[a]&&(k.removeClass(e,a),f[a]=!1)}function c(b,
c){b=b?"-"+vc(b,"-"):"";a(ib+b,!0===c);a(Ed+b,!1===c)}var d=b.ctrl,e=b.$element,f={},g=b.set,h=b.unset,l=b.parentForm,k=b.$animate;f[Ed]=!(f[ib]=e.hasClass(ib));d.$setValidity=function(b,e,f){e===t?(d.$pending||(d.$pending={}),g(d.$pending,b,f)):(d.$pending&&h(d.$pending,b,f),Fd(d.$pending)&&(d.$pending=t));Va(e)?e?(h(d.$error,b,f),g(d.$$success,b,f)):(g(d.$error,b,f),h(d.$$success,b,f)):(h(d.$error,b,f),h(d.$$success,b,f));d.$pending?(a(Gd,!0),d.$valid=d.$invalid=t,c("",null)):(a(Gd,!1),d.$valid=
Fd(d.$error),d.$invalid=!d.$valid,c("",d.$valid));e=d.$pending&&d.$pending[b]?t:d.$error[b]?!1:d.$$success[b]?!0:null;c(b,e);l.$setValidity(b,e,d)}}function Fd(b){if(b)for(var a in b)return!1;return!0}var dg=/^\/(.+)\/([a-z]*)$/,F=function(b){return M(b)?b.toLowerCase():b},tc=Object.prototype.hasOwnProperty,nb=function(b){return M(b)?b.toUpperCase():b},fb,C,ka,pa=[].slice,Gf=[].splice,eg=[].push,qa=Object.prototype.toString,Ca=G("ng"),ba=Q.angular||(Q.angular={}),bb,jb=0;fb=V.documentMode;x.$inject=
[];Sa.$inject=[];var L=Array.isArray,nc=/^\[object (Uint8(Clamped)?)|(Uint16)|(Uint32)|(Int8)|(Int16)|(Int32)|(Float(32)|(64))Array\]$/,S=function(b){return M(b)?b.trim():b},od=function(b){return b.replace(/([-()\[\]{}+?*.$\^|,:#<!\\])/g,"\\$1").replace(/\x08/g,"\\x08")},ab=function(){if(z(ab.isActive_))return ab.isActive_;var b=!(!V.querySelector("[ng-csp]")&&!V.querySelector("[data-ng-csp]"));if(!b)try{new Function("")}catch(a){b=!0}return ab.isActive_=b},lb=function(){if(z(lb.name_))return lb.name_;
var b,a,c=Ka.length,d,e;for(a=0;a<c;++a)if(d=Ka[a],b=V.querySelector("["+d.replace(":","\\:")+"jq]")){e=b.getAttribute(d+"jq");break}return lb.name_=e},Ka=["ng-","data-ng-","ng:","x-ng-"],Wd=/[A-Z]/g,wc=!1,Ob,na=1,Za=3,$d={full:"1.4.0-rc.1",major:1,minor:4,dot:0,codeName:"sartorial-chronography"};P.expando="ng339";var sb=P.cache={},yf=1;P._data=function(b){return this.cache[b[this.expando]]||{}};var tf=/([\:\-\_]+(.))/g,uf=/^moz([A-Z])/,fg={mouseleave:"mouseout",mouseenter:"mouseover"},Rb=G("jqLite"),
xf=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,Qb=/<|&#?\w+;/,vf=/<([\w:]+)/,wf=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,ga={option:[1,'<select multiple="multiple">',"</select>"],thead:[1,"<table>","</table>"],col:[2,"<table><colgroup>","</colgroup></table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:[0,"",""]};ga.optgroup=ga.option;ga.tbody=ga.tfoot=ga.colgroup=ga.caption=ga.thead;ga.th=ga.td;var La=P.prototype={ready:function(b){function a(){c||
(c=!0,b())}var c=!1;"complete"===V.readyState?setTimeout(a):(this.on("DOMContentLoaded",a),P(Q).on("load",a))},toString:function(){var b=[];n(this,function(a){b.push(""+a)});return"["+b.join(", ")+"]"},eq:function(b){return 0<=b?C(this[b]):C(this[this.length+b])},length:0,push:eg,sort:[].sort,splice:[].splice},xb={};n("multiple selected checked disabled readOnly required open".split(" "),function(b){xb[F(b)]=b});var Nc={};n("input select option textarea button form details".split(" "),function(b){Nc[b]=
!0});var Oc={ngMinlength:"minlength",ngMaxlength:"maxlength",ngMin:"min",ngMax:"max",ngPattern:"pattern"};n({data:Tb,removeData:qb},function(b,a){P[a]=b});n({data:Tb,inheritedData:wb,scope:function(b){return C.data(b,"$scope")||wb(b.parentNode||b,["$isolateScope","$scope"])},isolateScope:function(b){return C.data(b,"$isolateScope")||C.data(b,"$isolateScopeNoTemplate")},controller:Kc,injector:function(b){return wb(b,"$injector")},removeAttr:function(b,a){b.removeAttribute(a)},hasClass:tb,css:function(b,
a,c){a=cb(a);if(z(c))b.style[a]=c;else return b.style[a]},attr:function(b,a,c){var d=b.nodeType;if(d!==Za&&2!==d&&8!==d)if(d=F(a),xb[d])if(z(c))c?(b[a]=!0,b.setAttribute(a,d)):(b[a]=!1,b.removeAttribute(d));else return b[a]||(b.attributes.getNamedItem(a)||x).specified?d:t;else if(z(c))b.setAttribute(a,c);else if(b.getAttribute)return b=b.getAttribute(a,2),null===b?t:b},prop:function(b,a,c){if(z(c))b[a]=c;else return b[a]},text:function(){function b(a,b){if(v(b)){var d=a.nodeType;return d===na||d===
Za?a.textContent:""}a.textContent=b}b.$dv="";return b}(),val:function(b,a){if(v(a)){if(b.multiple&&"select"===ra(b)){var c=[];n(b.options,function(a){a.selected&&c.push(a.value||a.text)});return 0===c.length?null:c}return b.value}b.value=a},html:function(b,a){if(v(a))return b.innerHTML;pb(b,!0);b.innerHTML=a},empty:Lc},function(b,a){P.prototype[a]=function(a,d){var e,f,g=this.length;if(b!==Lc&&(2==b.length&&b!==tb&&b!==Kc?a:d)===t){if(D(a)){for(e=0;e<g;e++)if(b===Tb)b(this[e],a);else for(f in a)b(this[e],
f,a[f]);return this}e=b.$dv;g=e===t?Math.min(g,1):g;for(f=0;f<g;f++){var h=b(this[f],a,d);e=e?e+h:h}return e}for(e=0;e<g;e++)b(this[e],a,d);return this}});n({removeData:qb,on:function a(c,d,e,f){if(z(f))throw Rb("onargs");if(Gc(c)){var g=rb(c,!0);f=g.events;var h=g.handle;h||(h=g.handle=Bf(c,f));for(var g=0<=d.indexOf(" ")?d.split(" "):[d],l=g.length;l--;){d=g[l];var k=f[d];k||(f[d]=[],"mouseenter"===d||"mouseleave"===d?a(c,fg[d],function(a){var c=a.relatedTarget;c&&(c===this||this.contains(c))||
h(a,d)}):"$destroy"!==d&&c.addEventListener(d,h,!1),k=f[d]);k.push(e)}}},off:Jc,one:function(a,c,d){a=C(a);a.on(c,function f(){a.off(c,d);a.off(c,f)});a.on(c,d)},replaceWith:function(a,c){var d,e=a.parentNode;pb(a);n(new P(c),function(c){d?e.insertBefore(c,d.nextSibling):e.replaceChild(c,a);d=c})},children:function(a){var c=[];n(a.childNodes,function(a){a.nodeType===na&&c.push(a)});return c},contents:function(a){return a.contentDocument||a.childNodes||[]},append:function(a,c){var d=a.nodeType;if(d===
na||11===d){c=new P(c);for(var d=0,e=c.length;d<e;d++)a.appendChild(c[d])}},prepend:function(a,c){if(a.nodeType===na){var d=a.firstChild;n(new P(c),function(c){a.insertBefore(c,d)})}},wrap:function(a,c){c=C(c).eq(0).clone()[0];var d=a.parentNode;d&&d.replaceChild(c,a);c.appendChild(a)},remove:Ub,detach:function(a){Ub(a,!0)},after:function(a,c){var d=a,e=a.parentNode;c=new P(c);for(var f=0,g=c.length;f<g;f++){var h=c[f];e.insertBefore(h,d.nextSibling);d=h}},addClass:vb,removeClass:ub,toggleClass:function(a,
c,d){c&&n(c.split(" "),function(c){var f=d;v(f)&&(f=!tb(a,c));(f?vb:ub)(a,c)})},parent:function(a){return(a=a.parentNode)&&11!==a.nodeType?a:null},next:function(a){return a.nextElementSibling},find:function(a,c){return a.getElementsByTagName?a.getElementsByTagName(c):[]},clone:Sb,triggerHandler:function(a,c,d){var e,f,g=c.type||c,h=rb(a);if(h=(h=h&&h.events)&&h[g])e={preventDefault:function(){this.defaultPrevented=!0},isDefaultPrevented:function(){return!0===this.defaultPrevented},stopImmediatePropagation:function(){this.immediatePropagationStopped=
!0},isImmediatePropagationStopped:function(){return!0===this.immediatePropagationStopped},stopPropagation:x,type:g,target:a},c.type&&(e=O(e,c)),c=fa(h),f=d?[e].concat(d):[e],n(c,function(c){e.isImmediatePropagationStopped()||c.apply(a,f)})}},function(a,c){P.prototype[c]=function(c,e,f){for(var g,h=0,l=this.length;h<l;h++)v(g)?(g=a(this[h],c,e,f),z(g)&&(g=C(g))):Ic(g,a(this[h],c,e,f));return z(g)?g:this};P.prototype.bind=P.prototype.on;P.prototype.unbind=P.prototype.off});Oa.prototype={put:function(a,
c){this[Da(a,this.nextUid)]=c},get:function(a){return this[Da(a,this.nextUid)]},remove:function(a){var c=this[a=Da(a,this.nextUid)];delete this[a];return c}};var rf=[function(){this.$get=[function(){return Oa}]}],Qc=/^function\s*[^\(]*\(\s*([^\)]*)\)/m,gg=/,/,hg=/^\s*(_?)(\S+?)\1\s*$/,Pc=/((\/\/.*$)|(\/\*[\s\S]*?\*\/))/mg,Ea=G("$injector");$a.$$annotate=function(a,c,d){var e;if("function"===typeof a){if(!(e=a.$inject)){e=[];if(a.length){if(c)throw M(d)&&d||(d=a.name||Cf(a)),Ea("strictdi",d);c=a.toString().replace(Pc,
"");c=c.match(Qc);n(c[1].split(gg),function(a){a.replace(hg,function(a,c,d){e.push(d)})})}a.$inject=e}}else L(a)?(c=a.length-1,Ma(a[c],"fn"),e=a.slice(0,c)):Ma(a,"fn",!0);return e};var ig=G("$animate"),Oe=function(){this.$get=["$q","$$rAF",function(a,c){function d(){}d.all=x;d.chain=x;d.prototype={end:x,cancel:x,resume:x,pause:x,complete:x,then:function(d,f){return a(function(a){c(function(){a()})}).then(d,f)}};return d}]},Ne=function(){var a=new Oa,c=[];this.$get=["$$AnimateRunner","$rootScope",
function(d,e){function f(d,f,l){var k=a.get(d);k||(a.put(d,k={}),c.push(d));f&&n(f.split(" "),function(a){a&&(k[a]=!0)});l&&n(l.split(" "),function(a){a&&(k[a]=!1)});1<c.length||e.$$postDigest(function(){n(c,function(c){var d=a.get(c);if(d){var e=Df(c.attr("class")),f="",g="";n(d,function(a,c){a!==!!e[c]&&(a?f+=(f.length?" ":"")+c:g+=(g.length?" ":"")+c)});n(c,function(a){f&&vb(a,f);g&&ub(a,g)});a.remove(c)}});c.length=0})}return{enabled:x,on:x,off:x,pin:x,push:function(a,c,e,k){k&&k();e=e||{};e.from&&
a.css(e.from);e.to&&a.css(e.to);(e.addClass||e.removeClass)&&f(a,e.addClass,e.removeClass);return new d}}}]},Me=["$provide",function(a){var c=this;this.$$registeredAnimations=Object.create(null);this.register=function(d,e){if(d&&"."!==d.charAt(0))throw ig("notcsel",d);var f=d+"-animation";c.$$registeredAnimations[d.substr(1)]=f;a.factory(f,e)};this.classNameFilter=function(a){1===arguments.length&&(this.$$classNameFilter=a instanceof RegExp?a:null);return this.$$classNameFilter};this.$get=["$$animateQueue",
function(a){function c(a,d,e){if(e){var l;a:{for(l=0;l<e.length;l++){var k=e[l];if(1===k.nodeType){l=k;break a}}l=void 0}!l||l.parentNode||l.previousElementSibling||(e=null)}e?e.after(a):d.prepend(a)}return{on:a.on,off:a.off,pin:a.pin,enabled:a.enabled,cancel:function(a){a.end&&a.end()},enter:function(f,g,h,l){g=g||h.parent();c(f,g,h);return a.push(f,"enter",l)},move:function(f,g,h,l){g=g||h.parent();c(f,g,h);return a.push(f,"move",l)},leave:function(c,e){return a.push(c,"leave",e,function(){c.remove()})},
addClass:function(c,e,h){h=h||{};h.addClass=db(h.addclass,e);return a.push(c,"addClass",h)},removeClass:function(c,e,h){h=h||{};h.removeClass=db(h.removeClass,e);return a.push(c,"removeClass",h)},setClass:function(c,e,h,l){l=l||{};l.addClass=db(l.addClass,e);l.removeClass=db(l.removeClass,h);return a.push(c,"setClass",l)},animate:function(c,e,h,l,k){k=k||{};k.from=k.from?O(k.from,e):e;k.to=k.to?O(k.to,h):h;k.tempClasses=db(k.tempClasses,l||"ng-inline-animate");return a.push(c,"animate",k)}}}]}],ha=
G("$compile");yc.$inject=["$provide","$$sanitizeUriProvider"];var Tc=/^((?:x|data)[\:\-_])/i,Hf=G("$controller"),Rc=/^(\S+)(\s+as\s+(\w+))?$/,Xc="application/json",Yb={"Content-Type":Xc+";charset=utf-8"},Jf=/^\[|^\{(?!\{)/,Kf={"[":/]$/,"{":/}$/},If=/^\)\]\}',?\n/,Ha=ba.$interpolateMinErr=G("$interpolate");Ha.throwNoconcat=function(a){throw Ha("noconcat",a);};Ha.interr=function(a,c){return Ha("interr",a,c.toString())};var jg=/^([^\?#]*)(\?([^#]*))?(#(.*))?$/,Nf={http:80,https:443,ftp:21},zb=G("$location"),
kg={$$html5:!1,$$replace:!1,absUrl:Ab("$$absUrl"),url:function(a){if(v(a))return this.$$url;var c=jg.exec(a);(c[1]||""===a)&&this.path(decodeURIComponent(c[1]));(c[2]||c[1]||""===a)&&this.search(c[3]||"");this.hash(c[5]||"");return this},protocol:Ab("$$protocol"),host:Ab("$$host"),port:Ab("$$port"),path:ed("$$path",function(a){a=null!==a?a.toString():"";return"/"==a.charAt(0)?a:"/"+a}),search:function(a,c){switch(arguments.length){case 0:return this.$$search;case 1:if(M(a)||T(a))a=a.toString(),this.$$search=
sc(a);else if(D(a))a=sa(a,{}),n(a,function(c,e){null==c&&delete a[e]}),this.$$search=a;else throw zb("isrcharg");break;default:v(c)||null===c?delete this.$$search[a]:this.$$search[a]=c}this.$$compose();return this},hash:ed("$$hash",function(a){return null!==a?a.toString():""}),replace:function(){this.$$replace=!0;return this}};n([dd,bc,ac],function(a){a.prototype=Object.create(kg);a.prototype.state=function(c){if(!arguments.length)return this.$$state;if(a!==ac||!this.$$html5)throw zb("nostate");this.$$state=
v(c)?null:c;return this}});var ca=G("$parse"),Of=Function.prototype.call,Pf=Function.prototype.apply,Qf=Function.prototype.bind,Jb=la();n("+ - * / % === !== == != < > <= >= && || ! = |".split(" "),function(a){Jb[a]=!0});var lg={n:"\n",f:"\f",r:"\r",t:"\t",v:"\v","'":"'",'"':'"'},dc=function(a){this.options=a};dc.prototype={constructor:dc,lex:function(a){this.text=a;this.index=0;for(this.tokens=[];this.index<this.text.length;)if(a=this.text.charAt(this.index),'"'===a||"'"===a)this.readString(a);else if(this.isNumber(a)||
"."===a&&this.isNumber(this.peek()))this.readNumber();else if(this.isIdent(a))this.readIdent();else if(this.is(a,"(){}[].,;:?"))this.tokens.push({index:this.index,text:a}),this.index++;else if(this.isWhitespace(a))this.index++;else{var c=a+this.peek(),d=c+this.peek(2),e=Jb[c],f=Jb[d];Jb[a]||e||f?(a=f?d:e?c:a,this.tokens.push({index:this.index,text:a,operator:!0}),this.index+=a.length):this.throwError("Unexpected next character ",this.index,this.index+1)}return this.tokens},is:function(a,c){return-1!==
c.indexOf(a)},peek:function(a){a=a||1;return this.index+a<this.text.length?this.text.charAt(this.index+a):!1},isNumber:function(a){return"0"<=a&&"9">=a&&"string"===typeof a},isWhitespace:function(a){return" "===a||"\r"===a||"\t"===a||"\n"===a||"\v"===a||"\u00a0"===a},isIdent:function(a){return"a"<=a&&"z">=a||"A"<=a&&"Z">=a||"_"===a||"$"===a},isExpOperator:function(a){return"-"===a||"+"===a||this.isNumber(a)},throwError:function(a,c,d){d=d||this.index;c=z(c)?"s "+c+"-"+this.index+" ["+this.text.substring(c,
d)+"]":" "+d;throw ca("lexerr",a,c,this.text);},readNumber:function(){for(var a="",c=this.index;this.index<this.text.length;){var d=F(this.text.charAt(this.index));if("."==d||this.isNumber(d))a+=d;else{var e=this.peek();if("e"==d&&this.isExpOperator(e))a+=d;else if(this.isExpOperator(d)&&e&&this.isNumber(e)&&"e"==a.charAt(a.length-1))a+=d;else if(!this.isExpOperator(d)||e&&this.isNumber(e)||"e"!=a.charAt(a.length-1))break;else this.throwError("Invalid exponent")}this.index++}this.tokens.push({index:c,
text:a,constant:!0,value:Number(a)})},readIdent:function(){for(var a=this.index;this.index<this.text.length;){var c=this.text.charAt(this.index);if(!this.isIdent(c)&&!this.isNumber(c))break;this.index++}this.tokens.push({index:a,text:this.text.slice(a,this.index),identifier:!0})},readString:function(a){var c=this.index;this.index++;for(var d="",e=a,f=!1;this.index<this.text.length;){var g=this.text.charAt(this.index),e=e+g;if(f)"u"===g?(f=this.text.substring(this.index+1,this.index+5),f.match(/[\da-f]{4}/i)||
this.throwError("Invalid unicode escape [\\u"+f+"]"),this.index+=4,d+=String.fromCharCode(parseInt(f,16))):d+=lg[g]||g,f=!1;else if("\\"===g)f=!0;else{if(g===a){this.index++;this.tokens.push({index:c,text:e,constant:!0,value:d});return}d+=g}this.index++}this.throwError("Unterminated quote",c)}};var q=function(a,c){this.lexer=a;this.options=c};q.Program="Program";q.ExpressionStatement="ExpressionStatement";q.AssignmentExpression="AssignmentExpression";q.ConditionalExpression="ConditionalExpression";
q.LogicalExpression="LogicalExpression";q.BinaryExpression="BinaryExpression";q.UnaryExpression="UnaryExpression";q.CallExpression="CallExpression";q.MemberExpression="MemberExpression";q.Identifier="Identifier";q.Literal="Literal";q.ArrayExpression="ArrayExpression";q.Property="Property";q.ObjectExpression="ObjectExpression";q.ThisExpression="ThisExpression";q.NGValueParameter="NGValueParameter";q.prototype={ast:function(a){this.text=a;this.tokens=this.lexer.lex(a);a=this.program();0!==this.tokens.length&&
this.throwError("is an unexpected token",this.tokens[0]);return a},program:function(){for(var a=[];;)if(0<this.tokens.length&&!this.peek("}",")",";","]")&&a.push(this.expressionStatement()),!this.expect(";"))return{type:q.Program,body:a}},expressionStatement:function(){return{type:q.ExpressionStatement,expression:this.filterChain()}},filterChain:function(){for(var a=this.expression();this.expect("|");)a=this.filter(a);return a},expression:function(){return this.assignment()},assignment:function(){var a=
this.ternary();this.expect("=")&&(a={type:q.AssignmentExpression,left:a,right:this.assignment(),operator:"="});return a},ternary:function(){var a=this.logicalOR(),c,d;return this.expect("?")&&(c=this.expression(),this.consume(":"))?(d=this.expression(),{type:q.ConditionalExpression,test:a,alternate:c,consequent:d}):a},logicalOR:function(){for(var a=this.logicalAND();this.expect("||");)a={type:q.LogicalExpression,operator:"||",left:a,right:this.logicalAND()};return a},logicalAND:function(){for(var a=
this.equality();this.expect("&&");)a={type:q.LogicalExpression,operator:"&&",left:a,right:this.equality()};return a},equality:function(){for(var a=this.relational(),c;c=this.expect("==","!=","===","!==");)a={type:q.BinaryExpression,operator:c.text,left:a,right:this.relational()};return a},relational:function(){for(var a=this.additive(),c;c=this.expect("<",">","<=",">=");)a={type:q.BinaryExpression,operator:c.text,left:a,right:this.additive()};return a},additive:function(){for(var a=this.multiplicative(),
c;c=this.expect("+","-");)a={type:q.BinaryExpression,operator:c.text,left:a,right:this.multiplicative()};return a},multiplicative:function(){for(var a=this.unary(),c;c=this.expect("*","/","%");)a={type:q.BinaryExpression,operator:c.text,left:a,right:this.unary()};return a},unary:function(){var a;return(a=this.expect("+","-","!"))?{type:q.UnaryExpression,operator:a.text,prefix:!0,argument:this.unary()}:this.primary()},primary:function(){var a;this.expect("(")?(a=this.filterChain(),this.consume(")")):
this.expect("[")?a=this.arrayDeclaration():this.expect("{")?a=this.object():this.constants.hasOwnProperty(this.peek().text)?a=sa(this.constants[this.consume().text]):this.peek().identifier?a=this.identifier():this.peek().constant?a=this.constant():this.throwError("not a primary expression",this.peek());for(var c;c=this.expect("(","[",".");)"("===c.text?(a={type:q.CallExpression,callee:a,arguments:this.parseArguments()},this.consume(")")):"["===c.text?(a={type:q.MemberExpression,object:a,property:this.expression(),
computed:!0},this.consume("]")):"."===c.text?a={type:q.MemberExpression,object:a,property:this.identifier(),computed:!1}:this.throwError("IMPOSSIBLE");return a},filter:function(a){a=[a];for(var c={type:q.CallExpression,callee:this.identifier(),arguments:a,filter:!0};this.expect(":");)a.push(this.expression());return c},parseArguments:function(){var a=[];if(")"!==this.peekToken().text){do a.push(this.expression());while(this.expect(","))}return a},identifier:function(){var a=this.consume();a.identifier||
this.throwError("is not a valid identifier",a);return{type:q.Identifier,name:a.text}},constant:function(){return{type:q.Literal,value:this.consume().value}},arrayDeclaration:function(){var a=[];if("]"!==this.peekToken().text){do{if(this.peek("]"))break;a.push(this.expression())}while(this.expect(","))}this.consume("]");return{type:q.ArrayExpression,elements:a}},object:function(){var a=[],c;if("}"!==this.peekToken().text){do{if(this.peek("}"))break;c={type:q.Property,kind:"init"};this.peek().constant?
c.key=this.constant():this.peek().identifier?c.key=this.identifier():this.throwError("invalid key",this.peek());this.consume(":");c.value=this.expression();a.push(c)}while(this.expect(","))}this.consume("}");return{type:q.ObjectExpression,properties:a}},throwError:function(a,c){throw ca("syntax",c.text,a,c.index+1,this.text,this.text.substring(c.index));},consume:function(a){if(0===this.tokens.length)throw ca("ueoe",this.text);var c=this.expect(a);c||this.throwError("is unexpected, expecting ["+a+
"]",this.peek());return c},peekToken:function(){if(0===this.tokens.length)throw ca("ueoe",this.text);return this.tokens[0]},peek:function(a,c,d,e){return this.peekAhead(0,a,c,d,e)},peekAhead:function(a,c,d,e,f){if(this.tokens.length>a){a=this.tokens[a];var g=a.text;if(g===c||g===d||g===e||g===f||!(c||d||e||f))return a}return!1},expect:function(a,c,d,e){return(a=this.peek(a,c,d,e))?(this.tokens.shift(),a):!1},constants:{"true":{type:q.Literal,value:!0},"false":{type:q.Literal,value:!1},"null":{type:q.Literal,
value:null},undefined:{type:q.Literal,value:t},"this":{type:q.ThisExpression}}};ld.prototype={compile:function(a,c){var d=this,e=this.astBuilder.ast(a);this.state={nextId:0,filters:{},expensiveChecks:c,fn:{vars:[],body:[],own:{}},assign:{vars:[],body:[],own:{}},inputs:[]};U(e,d.$filter);var f="",g;this.stage="assign";if(g=jd(e))this.state.computing="assign",f=this.nextId(),this.recurse(g,f),f="fn.assign="+this.generateFunction("assign","s,v,l");g=hd(e.body);d.stage="inputs";n(g,function(a,c){var e=
"fn"+c;d.state[e]={vars:[],body:[],own:{}};d.state.computing=e;var f=d.nextId();d.recurse(a,f);d.return_(f);d.state.inputs.push(e);a.watchId=c});this.state.computing="fn";this.stage="main";this.recurse(e);f='"'+this.USE+" "+this.STRICT+'";\n'+this.filterPrefix()+"var fn="+this.generateFunction("fn","s,l,a,i")+f+this.watchFns()+"return fn;";f=(new Function("$filter","ensureSafeMemberName","ensureSafeObject","ensureSafeFunction","ifDefined","plus","text",f))(this.$filter,Aa,ia,fd,Rf,gd,a);this.state=
this.stage=t;f.literal=kd(e);f.constant=e.constant;return f},USE:"use",STRICT:"strict",watchFns:function(){var a=[],c=this.state.inputs,d=this;n(c,function(c){a.push("var "+c+"="+d.generateFunction(c,"s"))});c.length&&a.push("fn.inputs=["+c.join(",")+"];");return a.join("")},generateFunction:function(a,c){return"function("+c+"){"+this.varsPrefix(a)+this.body(a)+"};"},filterPrefix:function(){var a=[],c=this;n(this.state.filters,function(d,e){a.push(d+"=$filter("+c.escape(e)+")")});return a.length?
"var "+a.join(",")+";":""},varsPrefix:function(a){return this.state[a].vars.length?"var "+this.state[a].vars.join(",")+";":""},body:function(a){return this.state[a].body.join("")},recurse:function(a,c,d,e,f,g){var h,l,k=this,m,r;e=e||x;if(!g&&z(a.watchId))c=c||this.nextId(),this.if_("i",this.lazyAssign(c,this.computedMember("i",a.watchId)),this.lazyRecurse(a,c,d,e,f,!0));else switch(a.type){case q.Program:n(a.body,function(c,d){k.recurse(c.expression,t,t,function(a){l=a});d!==a.body.length-1?k.current().body.push(l,
";"):k.return_(l)});break;case q.Literal:r=this.escape(a.value);this.assign(c,r);e(r);break;case q.UnaryExpression:this.recurse(a.argument,t,t,function(a){l=a});r=a.operator+"("+this.ifDefined(l,0)+")";this.assign(c,r);e(r);break;case q.BinaryExpression:this.recurse(a.left,t,t,function(a){h=a});this.recurse(a.right,t,t,function(a){l=a});r="+"===a.operator?this.plus(h,l):"-"===a.operator?this.ifDefined(h,0)+a.operator+this.ifDefined(l,0):"("+h+")"+a.operator+"("+l+")";this.assign(c,r);e(r);break;case q.LogicalExpression:c=
c||this.nextId();k.recurse(a.left,c);k.if_("&&"===a.operator?c:k.not(c),k.lazyRecurse(a.right,c));e(c);break;case q.ConditionalExpression:c=c||this.nextId();k.recurse(a.test,c);k.if_(c,k.lazyRecurse(a.alternate,c),k.lazyRecurse(a.consequent,c));e(c);break;case q.Identifier:c=c||this.nextId();d&&(d.context="inputs"===k.stage?"s":this.assign(this.nextId(),this.getHasOwnProperty("l",a.name)+"?l:s"),d.computed=!1,d.name=a.name);Aa(a.name);k.if_("inputs"===k.stage||k.not(k.getHasOwnProperty("l",a.name)),
function(){k.if_("inputs"===k.stage||"s",function(){f&&1!==f&&k.if_(k.not(k.nonComputedMember("s",a.name)),k.lazyAssign(k.nonComputedMember("s",a.name),"{}"));k.assign(c,k.nonComputedMember("s",a.name))})},c&&k.lazyAssign(c,k.nonComputedMember("l",a.name)));(k.state.expensiveChecks||Cb(a.name))&&k.addEnsureSafeObject(c);e(c);break;case q.MemberExpression:h=d&&(d.context=this.nextId())||this.nextId();c=c||this.nextId();k.recurse(a.object,h,t,function(){k.if_(k.notNull(h),function(){if(a.computed)l=
k.nextId(),k.recurse(a.property,l),k.addEnsureSafeMemberName(l),f&&1!==f&&k.if_(k.not(k.computedMember(h,l)),k.lazyAssign(k.computedMember(h,l),"{}")),r=k.ensureSafeObject(k.computedMember(h,l)),k.assign(c,r),d&&(d.computed=!0,d.name=l);else{Aa(a.property.name);f&&1!==f&&k.if_(k.not(k.nonComputedMember(h,a.property.name)),k.lazyAssign(k.nonComputedMember(h,a.property.name),"{}"));r=k.nonComputedMember(h,a.property.name);if(k.state.expensiveChecks||Cb(a.property.name))r=k.ensureSafeObject(r);k.assign(c,
r);d&&(d.computed=!1,d.name=a.property.name)}e(c)})},!!f);break;case q.CallExpression:c=c||this.nextId();a.filter?(l=k.filter(a.callee.name),m=[],n(a.arguments,function(a){var c=k.nextId();k.recurse(a,c);m.push(c)}),r=l+"("+m.join(",")+")",k.assign(c,r),e(c)):(l=k.nextId(),h={},m=[],k.recurse(a.callee,l,h,function(){k.if_(k.notNull(l),function(){k.addEnsureSafeFunction(l);n(a.arguments,function(a){k.recurse(a,k.nextId(),t,function(a){m.push(k.ensureSafeObject(a))})});h.name?(k.state.expensiveChecks||
k.addEnsureSafeObject(h.context),r=k.member(h.context,h.name,h.computed)+"("+m.join(",")+")"):r=l+"("+m.join(",")+")";r=k.ensureSafeObject(r);k.assign(c,r);e(c)})}));break;case q.AssignmentExpression:l=this.nextId();h={};if(!id(a.left))throw ca("lval");this.recurse(a.left,t,h,function(){k.if_(k.notNull(h.context),function(){k.recurse(a.right,l);k.addEnsureSafeObject(k.member(h.context,h.name,h.computed));r=k.member(h.context,h.name,h.computed)+a.operator+l;k.assign(c,r);e(c||r)})},1);break;case q.ArrayExpression:m=
[];n(a.elements,function(a){k.recurse(a,k.nextId(),t,function(a){m.push(a)})});r="["+m.join(",")+"]";this.assign(c,r);e(r);break;case q.ObjectExpression:m=[];n(a.properties,function(a){k.recurse(a.value,k.nextId(),t,function(c){m.push(k.escape(a.key.type===q.Identifier?a.key.name:""+a.key.value)+":"+c)})});r="{"+m.join(",")+"}";this.assign(c,r);e(r);break;case q.ThisExpression:this.assign(c,"s");e("s");break;case q.NGValueParameter:this.assign(c,"v"),e("v")}},getHasOwnProperty:function(a,c){var d=
a+"."+c,e=this.current().own;e.hasOwnProperty(d)||(e[d]=this.nextId(!1,a+"&&("+this.escape(c)+" in "+a+")"));return e[d]},assign:function(a,c){if(a)return this.current().body.push(a,"=",c,";"),a},filter:function(a){this.state.filters.hasOwnProperty(a)||(this.state.filters[a]=this.nextId(!0));return this.state.filters[a]},ifDefined:function(a,c){return"ifDefined("+a+","+this.escape(c)+")"},plus:function(a,c){return"plus("+a+","+c+")"},return_:function(a){this.current().body.push("return ",a,";")},
if_:function(a,c,d){if(!0===a)c();else{var e=this.current().body;e.push("if(",a,"){");c();e.push("}");d&&(e.push("else{"),d(),e.push("}"))}},not:function(a){return"!("+a+")"},notNull:function(a){return a+"!=null"},nonComputedMember:function(a,c){return a+"."+c},computedMember:function(a,c){return a+"["+c+"]"},member:function(a,c,d){return d?this.computedMember(a,c):this.nonComputedMember(a,c)},addEnsureSafeObject:function(a){this.current().body.push(this.ensureSafeObject(a),";")},addEnsureSafeMemberName:function(a){this.current().body.push(this.ensureSafeMemberName(a),
";")},addEnsureSafeFunction:function(a){this.current().body.push(this.ensureSafeFunction(a),";")},ensureSafeObject:function(a){return"ensureSafeObject("+a+",text)"},ensureSafeMemberName:function(a){return"ensureSafeMemberName("+a+",text)"},ensureSafeFunction:function(a){return"ensureSafeFunction("+a+",text)"},lazyRecurse:function(a,c,d,e,f,g){var h=this;return function(){h.recurse(a,c,d,e,f,g)}},lazyAssign:function(a,c){var d=this;return function(){d.assign(a,c)}},stringEscapeRegex:/[^ a-zA-Z0-9]/g,
stringEscapeFn:function(a){return"\\u"+("0000"+a.charCodeAt(0).toString(16)).slice(-4)},escape:function(a){if(M(a))return"'"+a.replace(this.stringEscapeRegex,this.stringEscapeFn)+"'";if(T(a))return a.toString();if(!0===a)return"true";if(!1===a)return"false";if(null===a)return"null";if("undefined"===typeof a)return"undefined";throw ca("esc");},nextId:function(a,c){var d="v"+this.state.nextId++;a||this.current().vars.push(d+(c?"="+c:""));return d},current:function(){return this.state[this.state.computing]}};
md.prototype={compile:function(a,c){var d=this,e=this.astBuilder.ast(a);this.expression=a;this.expensiveChecks=c;U(e,d.$filter);var f,g;if(f=jd(e))g=this.recurse(f);f=hd(e.body);var h;f&&(h=[],n(f,function(a,c){var e=d.recurse(a);a.input=e;h.push(e);a.watchId=c}));var l=[];n(e.body,function(a){l.push(d.recurse(a.expression))});f=0===e.body.length?function(){}:1===e.body.length?l[0]:function(a,c){var d;n(l,function(e){d=e(a,c)});return d};g&&(f.assign=function(a,c,d){return g(a,d,c)});h&&(f.inputs=
h);f.literal=kd(e);f.constant=e.constant;return f},recurse:function(a,c,d){var e,f,g=this,h;if(a.input)return this.inputs(a.input,a.watchId);switch(a.type){case q.Literal:return this.value(a.value,c);case q.UnaryExpression:return f=this.recurse(a.argument),this["unary"+a.operator](f,c);case q.BinaryExpression:return e=this.recurse(a.left),f=this.recurse(a.right),this["binary"+a.operator](e,f,c);case q.LogicalExpression:return e=this.recurse(a.left),f=this.recurse(a.right),this["binary"+a.operator](e,
f,c);case q.ConditionalExpression:return this["ternary?:"](this.recurse(a.test),this.recurse(a.alternate),this.recurse(a.consequent),c);case q.Identifier:return Aa(a.name,g.expression),g.identifier(a.name,g.expensiveChecks||Cb(a.name),c,d,g.expression);case q.MemberExpression:return e=this.recurse(a.object,!1,!!d),a.computed||(Aa(a.property.name,g.expression),f=a.property.name),a.computed&&(f=this.recurse(a.property)),a.computed?this.computedMember(e,f,c,d,g.expression):this.nonComputedMember(e,f,
g.expensiveChecks,c,d,g.expression);case q.CallExpression:return h=[],n(a.arguments,function(a){h.push(g.recurse(a))}),a.filter&&(f=this.$filter(a.callee.name)),a.filter||(f=this.recurse(a.callee,!0)),a.filter?function(a,d,e,g){for(var n=[],q=0;q<h.length;++q)n.push(h[q](a,d,e,g));a=f.apply(t,n,g);return c?{context:t,name:t,value:a}:a}:function(a,d,e,r){var n=f(a,d,e,r),q;if(null!=n.value){ia(n.context,g.expression);fd(n.value,g.expression);q=[];for(var t=0;t<h.length;++t)q.push(ia(h[t](a,d,e,r),
g.expression));q=ia(n.value.apply(n.context,q),g.expression)}return c?{value:q}:q};case q.AssignmentExpression:return e=this.recurse(a.left,!0,1),f=this.recurse(a.right),function(a,d,h,r){var n=e(a,d,h,r);a=f(a,d,h,r);ia(n.value,g.expression);n.context[n.name]=a;return c?{value:a}:a};case q.ArrayExpression:return h=[],n(a.elements,function(a){h.push(g.recurse(a))}),function(a,d,e,f){for(var g=[],n=0;n<h.length;++n)g.push(h[n](a,d,e,f));return c?{value:g}:g};case q.ObjectExpression:return h=[],n(a.properties,
function(a){h.push({key:a.key.type===q.Identifier?a.key.name:""+a.key.value,value:g.recurse(a.value)})}),function(a,d,e,f){for(var g={},n=0;n<h.length;++n)g[h[n].key]=h[n].value(a,d,e,f);return c?{value:g}:g};case q.ThisExpression:return function(a){return c?{value:a}:a};case q.NGValueParameter:return function(a,d,e,f){return c?{value:e}:e}}},"unary+":function(a,c){return function(d,e,f,g){d=a(d,e,f,g);d=z(d)?+d:0;return c?{value:d}:d}},"unary-":function(a,c){return function(d,e,f,g){d=a(d,e,f,g);
d=z(d)?-d:0;return c?{value:d}:d}},"unary!":function(a,c){return function(d,e,f,g){d=!a(d,e,f,g);return c?{value:d}:d}},"binary+":function(a,c,d){return function(e,f,g,h){var l=a(e,f,g,h);e=c(e,f,g,h);l=gd(l,e);return d?{value:l}:l}},"binary-":function(a,c,d){return function(e,f,g,h){var l=a(e,f,g,h);e=c(e,f,g,h);l=(z(l)?l:0)-(z(e)?e:0);return d?{value:l}:l}},"binary*":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)*c(e,f,g,h);return d?{value:e}:e}},"binary/":function(a,c,d){return function(e,
f,g,h){e=a(e,f,g,h)/c(e,f,g,h);return d?{value:e}:e}},"binary%":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)%c(e,f,g,h);return d?{value:e}:e}},"binary===":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)===c(e,f,g,h);return d?{value:e}:e}},"binary!==":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)!==c(e,f,g,h);return d?{value:e}:e}},"binary==":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)==c(e,f,g,h);return d?{value:e}:e}},"binary!=":function(a,c,d){return function(e,
f,g,h){e=a(e,f,g,h)!=c(e,f,g,h);return d?{value:e}:e}},"binary<":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)<c(e,f,g,h);return d?{value:e}:e}},"binary>":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)>c(e,f,g,h);return d?{value:e}:e}},"binary<=":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)<=c(e,f,g,h);return d?{value:e}:e}},"binary>=":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)>=c(e,f,g,h);return d?{value:e}:e}},"binary&&":function(a,c,d){return function(e,f,g,h){e=
a(e,f,g,h)&&c(e,f,g,h);return d?{value:e}:e}},"binary||":function(a,c,d){return function(e,f,g,h){e=a(e,f,g,h)||c(e,f,g,h);return d?{value:e}:e}},"ternary?:":function(a,c,d,e){return function(f,g,h,l){f=a(f,g,h,l)?c(f,g,h,l):d(f,g,h,l);return e?{value:f}:f}},value:function(a,c){return function(){return c?{context:t,name:t,value:a}:a}},identifier:function(a,c,d,e,f){return function(g,h,l,k){g=h&&a in h?h:g;e&&1!==e&&g&&!g[a]&&(g[a]={});h=g?g[a]:t;c&&ia(h,f);return d?{context:g,name:a,value:h}:h}},
computedMember:function(a,c,d,e,f){return function(g,h,l,k){var m=a(g,h,l,k),n,s;null!=m&&(n=c(g,h,l,k),Aa(n,f),e&&1!==e&&m&&!m[n]&&(m[n]={}),s=m[n],ia(s,f));return d?{context:m,name:n,value:s}:s}},nonComputedMember:function(a,c,d,e,f,g){return function(h,l,k,m){h=a(h,l,k,m);f&&1!==f&&h&&!h[c]&&(h[c]={});l=null!=h?h[c]:t;(d||Cb(c))&&ia(l,g);return e?{context:h,name:c,value:l}:l}},inputs:function(a,c){return function(d,e,f,g){return g?g[c]:a(d,e,f)}}};var ec=function(a,c,d){this.lexer=a;this.$filter=
c;this.options=d;this.ast=new q(this.lexer);this.astCompiler=d.csp?new md(this.ast,c):new ld(this.ast,c)};ec.prototype={constructor:ec,parse:function(a){return this.astCompiler.compile(a,this.options.expensiveChecks)}};la();la();var Sf=Object.prototype.valueOf,Ba=G("$sce"),ma={HTML:"html",CSS:"css",URL:"url",RESOURCE_URL:"resourceUrl",JS:"js"},ha=G("$compile"),X=V.createElement("a"),qd=za(Q.location.href);rd.$inject=["$document"];Fc.$inject=["$provide"];sd.$inject=["$locale"];ud.$inject=["$locale"];
var xd=".",bg={yyyy:$("FullYear",4),yy:$("FullYear",2,0,!0),y:$("FullYear",1),MMMM:Eb("Month"),MMM:Eb("Month",!0),MM:$("Month",2,1),M:$("Month",1,1),dd:$("Date",2),d:$("Date",1),HH:$("Hours",2),H:$("Hours",1),hh:$("Hours",2,-12),h:$("Hours",1,-12),mm:$("Minutes",2),m:$("Minutes",1),ss:$("Seconds",2),s:$("Seconds",1),sss:$("Milliseconds",3),EEEE:Eb("Day"),EEE:Eb("Day",!0),a:function(a,c){return 12>a.getHours()?c.AMPMS[0]:c.AMPMS[1]},Z:function(a,c,d){a=-1*d;return a=(0<=a?"+":"")+(Db(Math[0<a?"floor":
"ceil"](a/60),2)+Db(Math.abs(a%60),2))},ww:zd(2),w:zd(1),G:gc,GG:gc,GGG:gc,GGGG:function(a,c){return 0>=a.getFullYear()?c.ERANAMES[0]:c.ERANAMES[1]}},ag=/((?:[^yMdHhmsaZEwG']+)|(?:'(?:[^']|'')*')|(?:E+|y+|M+|d+|H+|h+|m+|s+|a|Z|G+|w+))(.*)/,$f=/^\-?\d+$/;td.$inject=["$locale"];var Xf=oa(F),Yf=oa(nb);vd.$inject=["$parse"];var ce=oa({restrict:"E",compile:function(a,c){if(!c.href&&!c.xlinkHref)return function(a,c){if("a"===c[0].nodeName.toLowerCase()){var f="[object SVGAnimatedString]"===qa.call(c.prop("href"))?
"xlink:href":"href";c.on("click",function(a){c.attr(f)||a.preventDefault()})}}}}),ob={};n(xb,function(a,c){function d(a,d,f){a.$watch(f[e],function(a){f.$set(c,!!a)})}if("multiple"!=a){var e=wa("ng-"+c),f=d;"checked"===a&&(f=function(a,c,f){f.ngModel!==f[e]&&d(a,c,f)});ob[e]=function(){return{restrict:"A",priority:100,link:f}}}});n(Oc,function(a,c){ob[c]=function(){return{priority:100,link:function(a,e,f){if("ngPattern"===c&&"/"==f.ngPattern.charAt(0)&&(e=f.ngPattern.match(dg))){f.$set("ngPattern",
new RegExp(e[1],e[2]));return}a.$watch(f[c],function(a){f.$set(c,a)})}}}});n(["src","srcset","href"],function(a){var c=wa("ng-"+a);ob[c]=function(){return{priority:99,link:function(d,e,f){var g=a,h=a;"href"===a&&"[object SVGAnimatedString]"===qa.call(e.prop("href"))&&(h="xlinkHref",f.$attr[h]="xlink:href",g=null);f.$observe(c,function(c){c?(f.$set(h,c),fb&&g&&e.prop(g,f[h])):"href"===a&&f.$set(h,null)})}}}});var Fb={$addControl:x,$$renameControl:function(a,c){a.$name=c},$removeControl:x,$setValidity:x,
$setDirty:x,$setPristine:x,$setSubmitted:x};Ad.$inject=["$element","$attrs","$scope","$animate","$interpolate"];var Hd=function(a){return["$timeout",function(c){return{name:"form",restrict:a?"EAC":"E",controller:Ad,compile:function(d,e){d.addClass(Pa).addClass(ib);var f=e.name?"name":a&&e.ngForm?"ngForm":!1;return{pre:function(a,d,e,k){if(!("action"in e)){var m=function(c){a.$apply(function(){k.$commitViewValue();k.$setSubmitted()});c.preventDefault()};d[0].addEventListener("submit",m,!1);d.on("$destroy",
function(){c(function(){d[0].removeEventListener("submit",m,!1)},0,!1)})}var n=k.$$parentForm;f&&(Bb(a,k.$name,k,k.$name),e.$observe(f,function(c){k.$name!==c&&(Bb(a,k.$name,t,k.$name),n.$$renameControl(k,c),Bb(a,k.$name,k,k.$name))}));d.on("$destroy",function(){n.$removeControl(k);f&&Bb(a,e[f],t,k.$name);O(k,Fb)})}}}}}]},de=Hd(),qe=Hd(!0),cg=/\d{4}-[01]\d-[0-3]\dT[0-2]\d:[0-5]\d:[0-5]\d\.\d+([+-][0-2]\d:[0-5]\d|Z)/,mg=/^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/,
ng=/^[a-z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-z0-9]([a-z0-9-]*[a-z0-9])?(\.[a-z0-9]([a-z0-9-]*[a-z0-9])?)*$/i,og=/^\s*(\-|\+)?(\d+|(\d*(\.\d*)))\s*$/,Id=/^(\d{4})-(\d{2})-(\d{2})$/,Jd=/^(\d{4})-(\d\d)-(\d\d)T(\d\d):(\d\d)(?::(\d\d)(\.\d{1,3})?)?$/,jc=/^(\d{4})-W(\d\d)$/,Kd=/^(\d{4})-(\d\d)$/,Ld=/^(\d\d):(\d\d)(?::(\d\d)(\.\d{1,3})?)?$/,Md={text:function(a,c,d,e,f,g){gb(a,c,d,e,f,g);hc(e)},date:hb("date",Id,Hb(Id,["yyyy","MM","dd"]),"yyyy-MM-dd"),"datetime-local":hb("datetimelocal",Jd,Hb(Jd,"yyyy MM dd HH mm ss sss".split(" ")),
"yyyy-MM-ddTHH:mm:ss.sss"),time:hb("time",Ld,Hb(Ld,["HH","mm","ss","sss"]),"HH:mm:ss.sss"),week:hb("week",jc,function(a,c){if(ea(a))return a;if(M(a)){jc.lastIndex=0;var d=jc.exec(a);if(d){var e=+d[1],f=+d[2],g=d=0,h=0,l=0,k=yd(e),f=7*(f-1);c&&(d=c.getHours(),g=c.getMinutes(),h=c.getSeconds(),l=c.getMilliseconds());return new Date(e,0,k.getDate()+f,d,g,h,l)}}return NaN},"yyyy-Www"),month:hb("month",Kd,Hb(Kd,["yyyy","MM"]),"yyyy-MM"),number:function(a,c,d,e,f,g){Cd(a,c,d,e);gb(a,c,d,e,f,g);e.$$parserName=
"number";e.$parsers.push(function(a){return e.$isEmpty(a)?null:og.test(a)?parseFloat(a):t});e.$formatters.push(function(a){if(!e.$isEmpty(a)){if(!T(a))throw Ib("numfmt",a);a=a.toString()}return a});if(z(d.min)||d.ngMin){var h;e.$validators.min=function(a){return e.$isEmpty(a)||v(h)||a>=h};d.$observe("min",function(a){z(a)&&!T(a)&&(a=parseFloat(a,10));h=T(a)&&!isNaN(a)?a:t;e.$validate()})}if(z(d.max)||d.ngMax){var l;e.$validators.max=function(a){return e.$isEmpty(a)||v(l)||a<=l};d.$observe("max",function(a){z(a)&&
!T(a)&&(a=parseFloat(a,10));l=T(a)&&!isNaN(a)?a:t;e.$validate()})}},url:function(a,c,d,e,f,g){gb(a,c,d,e,f,g);hc(e);e.$$parserName="url";e.$validators.url=function(a,c){var d=a||c;return e.$isEmpty(d)||mg.test(d)}},email:function(a,c,d,e,f,g){gb(a,c,d,e,f,g);hc(e);e.$$parserName="email";e.$validators.email=function(a,c){var d=a||c;return e.$isEmpty(d)||ng.test(d)}},radio:function(a,c,d,e){v(d.name)&&c.attr("name",++jb);c.on("click",function(a){c[0].checked&&e.$setViewValue(d.value,a&&a.type)});e.$render=
function(){c[0].checked=d.value==e.$viewValue};d.$observe("value",e.$render)},checkbox:function(a,c,d,e,f,g,h,l){var k=Dd(l,a,"ngTrueValue",d.ngTrueValue,!0),m=Dd(l,a,"ngFalseValue",d.ngFalseValue,!1);c.on("click",function(a){e.$setViewValue(c[0].checked,a&&a.type)});e.$render=function(){c[0].checked=e.$viewValue};e.$isEmpty=function(a){return!1===a};e.$formatters.push(function(a){return ja(a,k)});e.$parsers.push(function(a){return a?k:m})},hidden:x,button:x,submit:x,reset:x,file:x},zc=["$browser",
"$sniffer","$filter","$parse",function(a,c,d,e){return{restrict:"E",require:["?ngModel"],link:{pre:function(f,g,h,l){l[0]&&(Md[F(h.type)]||Md.text)(f,g,h,l[0],c,a,d,e)}}}}],pg=/^(true|false|\d+)$/,Ie=function(){return{restrict:"A",priority:100,compile:function(a,c){return pg.test(c.ngValue)?function(a,c,f){f.$set("value",a.$eval(f.ngValue))}:function(a,c,f){a.$watch(f.ngValue,function(a){f.$set("value",a)})}}}},ie=["$compile",function(a){return{restrict:"AC",compile:function(c){a.$$addBindingClass(c);
return function(c,e,f){a.$$addBindingInfo(e,f.ngBind);e=e[0];c.$watch(f.ngBind,function(a){e.textContent=a===t?"":a})}}}}],ke=["$interpolate","$compile",function(a,c){return{compile:function(d){c.$$addBindingClass(d);return function(d,f,g){d=a(f.attr(g.$attr.ngBindTemplate));c.$$addBindingInfo(f,d.expressions);f=f[0];g.$observe("ngBindTemplate",function(a){f.textContent=a===t?"":a})}}}}],je=["$sce","$parse","$compile",function(a,c,d){return{restrict:"A",compile:function(e,f){var g=c(f.ngBindHtml),
h=c(f.ngBindHtml,function(a){return(a||"").toString()});d.$$addBindingClass(e);return function(c,e,f){d.$$addBindingInfo(e,f.ngBindHtml);c.$watch(h,function(){e.html(a.getTrustedHtml(g(c))||"")})}}}}],He=oa({restrict:"A",require:"ngModel",link:function(a,c,d,e){e.$viewChangeListeners.push(function(){a.$eval(d.ngChange)})}}),le=ic("",!0),ne=ic("Odd",0),me=ic("Even",1),oe=Ja({compile:function(a,c){c.$set("ngCloak",t);a.removeClass("ng-cloak")}}),pe=[function(){return{restrict:"A",scope:!0,controller:"@",
priority:500}}],Ec={},qg={blur:!0,focus:!0};n("click dblclick mousedown mouseup mouseover mouseout mousemove mouseenter mouseleave keydown keyup keypress submit focus blur copy cut paste".split(" "),function(a){var c=wa("ng-"+a);Ec[c]=["$parse","$rootScope",function(d,e){return{restrict:"A",compile:function(f,g){var h=d(g[c],null,!0);return function(c,d){d.on(a,function(d){var f=function(){h(c,{$event:d})};qg[a]&&e.$$phase?c.$evalAsync(f):c.$apply(f)})}}}}]});var se=["$animate",function(a){return{multiElement:!0,
transclude:"element",priority:600,terminal:!0,restrict:"A",$$tlb:!0,link:function(c,d,e,f,g){var h,l,k;c.$watch(e.ngIf,function(c){c?l||g(function(c,f){l=f;c[c.length++]=V.createComment(" end ngIf: "+e.ngIf+" ");h={clone:c};a.enter(c,d.parent(),d)}):(k&&(k.remove(),k=null),l&&(l.$destroy(),l=null),h&&(k=mb(h.clone),a.leave(k).then(function(){k=null}),h=null))})}}}],te=["$templateRequest","$anchorScroll","$animate","$sce",function(a,c,d,e){return{restrict:"ECA",priority:400,terminal:!0,transclude:"element",
controller:ba.noop,compile:function(f,g){var h=g.ngInclude||g.src,l=g.onload||"",k=g.autoscroll;return function(f,g,n,q,t){var v=0,u,p,w,x=function(){p&&(p.remove(),p=null);u&&(u.$destroy(),u=null);w&&(d.leave(w).then(function(){p=null}),p=w,w=null)};f.$watch(e.parseAsResourceUrl(h),function(e){var h=function(){!z(k)||k&&!f.$eval(k)||c()},n=++v;e?(a(e,!0).then(function(a){if(n===v){var c=f.$new();q.template=a;a=t(c,function(a){x();d.enter(a,null,g).then(h)});u=c;w=a;u.$emit("$includeContentLoaded",
e);f.$eval(l)}},function(){n===v&&(x(),f.$emit("$includeContentError",e))}),f.$emit("$includeContentRequested",e)):(x(),q.template=null)})}}}}],Ke=["$compile",function(a){return{restrict:"ECA",priority:-400,require:"ngInclude",link:function(c,d,e,f){/SVG/.test(d[0].toString())?(d.empty(),a(Hc(f.template,V).childNodes)(c,function(a){d.append(a)},{futureParentElement:d})):(d.html(f.template),a(d.contents())(c))}}}],ue=Ja({priority:450,compile:function(){return{pre:function(a,c,d){a.$eval(d.ngInit)}}}}),
Ge=function(){return{restrict:"A",priority:100,require:"ngModel",link:function(a,c,d,e){var f=c.attr(d.$attr.ngList)||", ",g="false"!==d.ngTrim,h=g?S(f):f;e.$parsers.push(function(a){if(!v(a)){var c=[];a&&n(a.split(h),function(a){a&&c.push(g?S(a):a)});return c}});e.$formatters.push(function(a){return L(a)?a.join(f):t});e.$isEmpty=function(a){return!a||!a.length}}}},ib="ng-valid",Ed="ng-invalid",Pa="ng-pristine",Gb="ng-dirty",Gd="ng-pending",Ib=new G("ngModel"),rg=["$scope","$exceptionHandler","$attrs",
"$element","$parse","$animate","$timeout","$rootScope","$q","$interpolate",function(a,c,d,e,f,g,h,l,k,m){this.$modelValue=this.$viewValue=Number.NaN;this.$$rawModelValue=t;this.$validators={};this.$asyncValidators={};this.$parsers=[];this.$formatters=[];this.$viewChangeListeners=[];this.$untouched=!0;this.$touched=!1;this.$pristine=!0;this.$dirty=!1;this.$valid=!0;this.$invalid=!1;this.$error={};this.$$success={};this.$pending=t;this.$name=m(d.name||"",!1)(a);var r=f(d.ngModel),s=r.assign,q=r,H=s,
J=null,u,p=this;this.$$setOptions=function(a){if((p.$options=a)&&a.getterSetter){var c=f(d.ngModel+"()"),g=f(d.ngModel+"($$$p)");q=function(a){var d=r(a);E(d)&&(d=c(a));return d};H=function(a,c){E(r(a))?g(a,{$$$p:p.$modelValue}):s(a,p.$modelValue)}}else if(!r.assign)throw Ib("nonassign",d.ngModel,ta(e));};this.$render=x;this.$isEmpty=function(a){return v(a)||""===a||null===a||a!==a};var w=e.inheritedData("$formController")||Fb,C=0;Bd({ctrl:this,$element:e,set:function(a,c){a[c]=!0},unset:function(a,
c){delete a[c]},parentForm:w,$animate:g});this.$setPristine=function(){p.$dirty=!1;p.$pristine=!0;g.removeClass(e,Gb);g.addClass(e,Pa)};this.$setDirty=function(){p.$dirty=!0;p.$pristine=!1;g.removeClass(e,Pa);g.addClass(e,Gb);w.$setDirty()};this.$setUntouched=function(){p.$touched=!1;p.$untouched=!0;g.setClass(e,"ng-untouched","ng-touched")};this.$setTouched=function(){p.$touched=!0;p.$untouched=!1;g.setClass(e,"ng-touched","ng-untouched")};this.$rollbackViewValue=function(){h.cancel(J);p.$viewValue=
p.$$lastCommittedViewValue;p.$render()};this.$validate=function(){if(!T(p.$modelValue)||!isNaN(p.$modelValue)){var a=p.$$rawModelValue,c=p.$valid,d=p.$modelValue,e=p.$options&&p.$options.allowInvalid;p.$$runValidators(a,p.$$lastCommittedViewValue,function(f){e||c===f||(p.$modelValue=f?a:t,p.$modelValue!==d&&p.$$writeModelToScope())})}};this.$$runValidators=function(a,c,d){function e(){var d=!0;n(p.$validators,function(e,f){var h=e(a,c);d=d&&h;g(f,h)});return d?!0:(n(p.$asyncValidators,function(a,
c){g(c,null)}),!1)}function f(){var d=[],e=!0;n(p.$asyncValidators,function(f,h){var k=f(a,c);if(!k||!E(k.then))throw Ib("$asyncValidators",k);g(h,t);d.push(k.then(function(){g(h,!0)},function(a){e=!1;g(h,!1)}))});d.length?k.all(d).then(function(){h(e)},x):h(!0)}function g(a,c){l===C&&p.$setValidity(a,c)}function h(a){l===C&&d(a)}C++;var l=C;(function(){var a=p.$$parserName||"parse";if(u===t)g(a,null);else return u||(n(p.$validators,function(a,c){g(c,null)}),n(p.$asyncValidators,function(a,c){g(c,
null)})),g(a,u),u;return!0})()?e()?f():h(!1):h(!1)};this.$commitViewValue=function(){var a=p.$viewValue;h.cancel(J);if(p.$$lastCommittedViewValue!==a||""===a&&p.$$hasNativeValidators)p.$$lastCommittedViewValue=a,p.$pristine&&this.$setDirty(),this.$$parseAndValidate()};this.$$parseAndValidate=function(){var c=p.$$lastCommittedViewValue;if(u=v(c)?t:!0)for(var d=0;d<p.$parsers.length;d++)if(c=p.$parsers[d](c),v(c)){u=!1;break}T(p.$modelValue)&&isNaN(p.$modelValue)&&(p.$modelValue=q(a));var e=p.$modelValue,
f=p.$options&&p.$options.allowInvalid;p.$$rawModelValue=c;f&&(p.$modelValue=c,p.$modelValue!==e&&p.$$writeModelToScope());p.$$runValidators(c,p.$$lastCommittedViewValue,function(a){f||(p.$modelValue=a?c:t,p.$modelValue!==e&&p.$$writeModelToScope())})};this.$$writeModelToScope=function(){H(a,p.$modelValue);n(p.$viewChangeListeners,function(a){try{a()}catch(d){c(d)}})};this.$setViewValue=function(a,c){p.$viewValue=a;p.$options&&!p.$options.updateOnDefault||p.$$debounceViewValueCommit(c)};this.$$debounceViewValueCommit=
function(c){var d=0,e=p.$options;e&&z(e.debounce)&&(e=e.debounce,T(e)?d=e:T(e[c])?d=e[c]:T(e["default"])&&(d=e["default"]));h.cancel(J);d?J=h(function(){p.$commitViewValue()},d):l.$$phase?p.$commitViewValue():a.$apply(function(){p.$commitViewValue()})};a.$watch(function(){var c=q(a);if(c!==p.$modelValue&&(p.$modelValue===p.$modelValue||c===c)){p.$modelValue=p.$$rawModelValue=c;u=t;for(var d=p.$formatters,e=d.length,f=c;e--;)f=d[e](f);p.$viewValue!==f&&(p.$viewValue=p.$$lastCommittedViewValue=f,p.$render(),
p.$$runValidators(c,f,x))}return c})}],Fe=["$rootScope",function(a){return{restrict:"A",require:["ngModel","^?form","^?ngModelOptions"],controller:rg,priority:1,compile:function(c){c.addClass(Pa).addClass("ng-untouched").addClass(ib);return{pre:function(a,c,f,g){var h=g[0],l=g[1]||Fb;h.$$setOptions(g[2]&&g[2].$options);l.$addControl(h);f.$observe("name",function(a){h.$name!==a&&l.$$renameControl(h,a)});a.$on("$destroy",function(){l.$removeControl(h)})},post:function(c,e,f,g){var h=g[0];if(h.$options&&
h.$options.updateOn)e.on(h.$options.updateOn,function(a){h.$$debounceViewValueCommit(a&&a.type)});e.on("blur",function(e){h.$touched||(a.$$phase?c.$evalAsync(h.$setTouched):c.$apply(h.$setTouched))})}}}}}],sg=/(\s+|^)default(\s+|$)/,Je=function(){return{restrict:"A",controller:["$scope","$attrs",function(a,c){var d=this;this.$options=sa(a.$eval(c.ngModelOptions));this.$options.updateOn!==t?(this.$options.updateOnDefault=!1,this.$options.updateOn=S(this.$options.updateOn.replace(sg,function(){d.$options.updateOnDefault=
!0;return" "}))):this.$options.updateOnDefault=!0}]}},ve=Ja({terminal:!0,priority:1E3}),tg=G("ngOptions"),ug=/^\s*([\s\S]+?)(?:\s+as\s+([\s\S]+?))?(?:\s+group\s+by\s+([\s\S]+?))?(?:\s+disable\s+when\s+([\s\S]+?))?\s+for\s+(?:([\$\w][\$\w]*)|(?:\(\s*([\$\w][\$\w]*)\s*,\s*([\$\w][\$\w]*)\s*\)))\s+in\s+([\s\S]+?)(?:\s+track\s+by\s+([\s\S]+?))?$/,De=["$compile","$parse",function(a,c){function d(a,d,e){function f(a,c,d,e,g){this.selectValue=a;this.viewValue=c;this.label=d;this.group=e;this.disabled=g}
var m=a.match(ug);if(!m)throw tg("iexp",a,ta(d));var n=m[5]||m[7],q=m[6];a=/ as /.test(m[0])&&m[1];var t=m[9];d=c(m[2]?m[1]:n);var v=a&&c(a)||d,x=t&&c(t),u=t?function(a,c){return x(e,c)}:function(a){return Da(a)},p=c(m[2]||m[1]),w=c(m[3]||""),z=c(m[4]||""),C=c(m[8]),B={},N=q?function(a,c){B[q]=c;B[n]=a;return B}:function(a){B[n]=a;return B};return{trackBy:t,getWatchables:c(C,function(a){var c=[];a=a||[];Object.keys(a).forEach(function(d){var f=N(a[d],d);d=u(a[d],f);c.push(d);m[2]&&(d=p(e,f),c.push(d));
m[4]&&(f=z(e,f),c.push(f))});return c}),getOptions:function(){var a=[],c={},d=C(e)||[];Object.keys(d).forEach(function(g){if("$"!==g.charAt(0)){var h=N(d[g],g),m=v(e,h);g=u(m,h);var n=p(e,h),r=w(e,h),h=z(e,h),m=new f(g,m,n,r,h);a.push(m);c[g]=m}});return{items:a,selectValueMap:c,getOptionFromViewValue:function(a){return c[u(a,N(a))]},getViewValueFromOption:function(a){return t?ba.copy(a.viewValue):a.viewValue}}}}}var e=V.createElement("option"),f=V.createElement("optgroup");return{restrict:"A",terminal:!0,
require:["select","?ngModel"],link:function(c,h,l,k){function m(a,c){a.element=c;c.disabled=a.disabled;a.value!==c.value&&(c.value=a.selectValue);a.label!==c.label&&(c.label=a.label,c.textContent=a.label)}function r(a,c,d,e){c&&F(c.nodeName)===d?d=c:(d=e.cloneNode(!1),c?a.insertBefore(d,c):a.appendChild(d));return d}function q(a){for(var c;a;)c=a.nextSibling,Ub(a),a=c}function t(a){var c=p&&p[0],d=N&&N[0];if(c||d)for(;a&&(a===c||a===d);)a=a.nextSibling;return a}function v(){var a=A&&u.readValue();
A=D.getOptions();var c={},d=h[0].firstChild;B&&h.prepend(p);d=t(d);A.items.forEach(function(a){var g,k;a.group?(g=c[a.group],g||(g=r(h[0],d,"optgroup",f),d=g.nextSibling,g.label=a.group,g=c[a.group]={groupElement:g,currentOptionElement:g.firstChild}),k=r(g.groupElement,g.currentOptionElement,"option",e),m(a,k),g.currentOptionElement=k.nextSibling):(k=r(h[0],d,"option",e),m(a,k),d=k.nextSibling)});Object.keys(c).forEach(function(a){q(c[a].currentOptionElement)});q(d);x.$render();if(!x.$isEmpty(a)){var g=
u.readValue();if(D.trackBy&&!ja(a,g)||a!==g)x.$setViewValue(g),x.$render()}}var x=k[1];if(x){var u=k[0];k=l.multiple;for(var p,w=0,z=h.children(),K=z.length;w<K;w++)if(""===z[w].value){p=z.eq(w);break}var B=!!p,N=C(e.cloneNode(!1));N.val("?");var A,D=d(l.ngOptions,h,c);u.writeValue=function(a){var c=A.getOptionFromViewValue(a);c&&!c.disabled?h[0].value!==c.selectValue&&(N.remove(),B||p.remove(),h[0].value=c.selectValue,c.element.selected=!0,c.element.setAttribute("selected","selected")):null===a||
B?(N.remove(),B||h.prepend(p),h.val(""),p.prop("selected",!0),p.attr("selected",!0)):(B||p.remove(),h.prepend(N),h.val("?"),N.prop("selected",!0),N.attr("selected",!0))};u.readValue=function(){var a=A.selectValueMap[h.val()];return a&&!a.disabled?(B||p.remove(),N.remove(),A.getViewValueFromOption(a)):null};k&&(x.$isEmpty=function(a){return!a||0===a.length},u.writeValue=function(a){A.items.forEach(function(a){a.element.selected=!1});a&&a.forEach(function(a){(a=A.getOptionFromViewValue(a))&&!a.disabled&&
(a.element.selected=!0)})},u.readValue=function(){var a=h.val()||[],c=[];n(a,function(a){a=A.selectValueMap[a];a.disabled||c.push(A.getViewValueFromOption(a))});return c});B?(p.remove(),a(p)(c),p.removeClass("ng-scope")):p=C(e.cloneNode(!1));v();c.$watchCollection(D.getWatchables,v);D.trackBy&&c.$watch(l.ngModel,function(){x.$render()},!0)}}}}],we=["$locale","$interpolate","$log",function(a,c,d){var e=/{}/g,f=/^when(Minus)?(.+)$/;return{link:function(g,h,l){function k(a){h.text(a||"")}var m=l.count,
r=l.$attr.when&&h.attr(l.$attr.when),q=l.offset||0,t=g.$eval(r)||{},z={},C=c.startSymbol(),u=c.endSymbol(),p=C+m+"-"+q+u,w=ba.noop,D;n(l,function(a,c){var d=f.exec(c);d&&(d=(d[1]?"-":"")+F(d[2]),t[d]=h.attr(l.$attr[c]))});n(t,function(a,d){z[d]=c(a.replace(e,p))});g.$watch(m,function(c){var e=parseFloat(c),f=isNaN(e);f||e in t||(e=a.pluralCat(e-q));e===D||f&&T(D)&&isNaN(D)||(w(),f=z[e],v(f)?(null!=c&&d.debug("ngPluralize: no rule defined for '"+e+"' in "+r),w=x,k()):w=g.$watch(f,k),D=e)})}}}],xe=
["$parse","$animate",function(a,c){var d=G("ngRepeat"),e=function(a,c,d,e,k,m,n){a[d]=e;k&&(a[k]=m);a.$index=c;a.$first=0===c;a.$last=c===n-1;a.$middle=!(a.$first||a.$last);a.$odd=!(a.$even=0===(c&1))};return{restrict:"A",multiElement:!0,transclude:"element",priority:1E3,terminal:!0,$$tlb:!0,compile:function(f,g){var h=g.ngRepeat,l=V.createComment(" end ngRepeat: "+h+" "),k=h.match(/^\s*([\s\S]+?)\s+in\s+([\s\S]+?)(?:\s+as\s+([\s\S]+?))?(?:\s+track\s+by\s+([\s\S]+?))?\s*$/);if(!k)throw d("iexp",h);
var m=k[1],r=k[2],q=k[3],v=k[4],k=m.match(/^(?:(\s*[\$\w]+)|\(\s*([\$\w]+)\s*,\s*([\$\w]+)\s*\))$/);if(!k)throw d("iidexp",m);var x=k[3]||k[1],z=k[2];if(q&&(!/^[$a-zA-Z_][$a-zA-Z0-9_]*$/.test(q)||/^(null|undefined|this|\$index|\$first|\$middle|\$last|\$even|\$odd|\$parent|\$root|\$id)$/.test(q)))throw d("badident",q);var u,p,w,D,E={$id:Da};v?u=a(v):(w=function(a,c){return Da(c)},D=function(a){return a});return function(a,f,g,k,m){u&&(p=function(c,d,e){z&&(E[z]=c);E[x]=d;E.$index=e;return u(a,E)});
var v=la();a.$watchCollection(r,function(g){var k,r,u=f[0],y,A=la(),E,K,M,G,L,F,O;q&&(a[q]=g);if(Qa(g))L=g,r=p||w;else for(O in r=p||D,L=[],g)g.hasOwnProperty(O)&&"$"!==O.charAt(0)&&L.push(O);E=L.length;O=Array(E);for(k=0;k<E;k++)if(K=g===L?k:L[k],M=g[K],G=r(K,M,k),v[G])F=v[G],delete v[G],A[G]=F,O[k]=F;else{if(A[G])throw n(O,function(a){a&&a.scope&&(v[a.id]=a)}),d("dupes",h,G,M);O[k]={id:G,scope:t,clone:t};A[G]=!0}for(y in v){F=v[y];G=mb(F.clone);c.leave(G);if(G[0].parentNode)for(k=0,r=G.length;k<
r;k++)G[k].$$NG_REMOVED=!0;F.scope.$destroy()}for(k=0;k<E;k++)if(K=g===L?k:L[k],M=g[K],F=O[k],F.scope){y=u;do y=y.nextSibling;while(y&&y.$$NG_REMOVED);F.clone[0]!=y&&c.move(mb(F.clone),null,C(u));u=F.clone[F.clone.length-1];e(F.scope,k,x,M,z,K,E)}else m(function(a,d){F.scope=d;var f=l.cloneNode(!1);a[a.length++]=f;c.enter(a,null,C(u));u=f;F.clone=a;A[F.id]=F;e(F.scope,k,x,M,z,K,E)});v=A})}}}}],ye=["$animate",function(a){return{restrict:"A",multiElement:!0,link:function(c,d,e){c.$watch(e.ngShow,function(c){a[c?
"removeClass":"addClass"](d,"ng-hide",{tempClasses:"ng-hide-animate"})})}}}],re=["$animate",function(a){return{restrict:"A",multiElement:!0,link:function(c,d,e){c.$watch(e.ngHide,function(c){a[c?"addClass":"removeClass"](d,"ng-hide",{tempClasses:"ng-hide-animate"})})}}}],ze=Ja(function(a,c,d){a.$watch(d.ngStyle,function(a,d){d&&a!==d&&n(d,function(a,d){c.css(d,"")});a&&c.css(a)},!0)}),Ae=["$animate",function(a){return{require:"ngSwitch",controller:["$scope",function(){this.cases={}}],link:function(c,
d,e,f){var g=[],h=[],l=[],k=[],m=function(a,c){return function(){a.splice(c,1)}};c.$watch(e.ngSwitch||e.on,function(c){var d,e;d=0;for(e=l.length;d<e;++d)a.cancel(l[d]);d=l.length=0;for(e=k.length;d<e;++d){var q=mb(h[d].clone);k[d].$destroy();(l[d]=a.leave(q)).then(m(l,d))}h.length=0;k.length=0;(g=f.cases["!"+c]||f.cases["?"])&&n(g,function(c){c.transclude(function(d,e){k.push(e);var f=c.element;d[d.length++]=V.createComment(" end ngSwitchWhen: ");h.push({clone:d});a.enter(d,f.parent(),f)})})})}}}],
Be=Ja({transclude:"element",priority:1200,require:"^ngSwitch",multiElement:!0,link:function(a,c,d,e,f){e.cases["!"+d.ngSwitchWhen]=e.cases["!"+d.ngSwitchWhen]||[];e.cases["!"+d.ngSwitchWhen].push({transclude:f,element:c})}}),Ce=Ja({transclude:"element",priority:1200,require:"^ngSwitch",multiElement:!0,link:function(a,c,d,e,f){e.cases["?"]=e.cases["?"]||[];e.cases["?"].push({transclude:f,element:c})}}),Ee=Ja({restrict:"EAC",link:function(a,c,d,e,f){if(!f)throw G("ngTransclude")("orphan",ta(c));f(function(a){c.empty();
c.append(a)})}}),ee=["$templateCache",function(a){return{restrict:"E",terminal:!0,compile:function(c,d){"text/ng-template"==d.type&&a.put(d.id,c[0].text)}}}],vg={$setViewValue:x,$render:x},wg=["$element","$scope","$attrs",function(a,c,d){var e=this,f=new Oa;e.ngModelCtrl=vg;e.unknownOption=C(V.createElement("option"));e.renderUnknownOption=function(c){c="? "+Da(c)+" ?";e.unknownOption.val(c);a.prepend(e.unknownOption);a.val(c)};c.$on("$destroy",function(){e.renderUnknownOption=x});e.removeUnknownOption=
function(){e.unknownOption.parent()&&e.unknownOption.remove()};e.readValue=function(){e.removeUnknownOption();return a.val()};e.writeValue=function(c){e.hasOption(c)?(e.removeUnknownOption(),a.val(c),""===c&&e.emptyOption.prop("selected",!0)):v(c)&&e.emptyOption?(e.removeUnknownOption(),a.val("")):e.renderUnknownOption(c)};e.addOption=function(a,c){Na(a,'"option value"');""===a&&(e.emptyOption=c);var d=f.get(a)||0;f.put(a,d+1)};e.removeOption=function(a){var c=f.get(a);c&&(1===c?(f.remove(a),""===
a&&(e.emptyOption=t)):f.put(a,c-1))};e.hasOption=function(a){return!!f.get(a)}}],fe=function(){return{restrict:"E",require:["select","?ngModel"],controller:wg,link:function(a,c,d,e){var f=e[1];if(f){var g=e[0];g.ngModelCtrl=f;f.$render=function(){g.writeValue(f.$viewValue)};c.on("change",function(){a.$apply(function(){f.$setViewValue(g.readValue())})});if(d.multiple){g.readValue=function(){var a=[];n(c.find("option"),function(c){c.selected&&a.push(c.value)});return a};g.writeValue=function(a){var d=
new Oa(a);n(c.find("option"),function(a){a.selected=z(d.get(a.value))})};var h,l=NaN;a.$watch(function(){l!==f.$viewValue||ja(h,f.$viewValue)||(h=fa(f.$viewValue),f.$render());l=f.$viewValue});f.$isEmpty=function(a){return!a||0===a.length}}}}}},he=["$interpolate",function(a){function c(a){a[0].hasAttribute("selected")&&(a[0].selected=!0)}return{restrict:"E",priority:100,compile:function(d,e){if(v(e.value)){var f=a(d.text(),!0);f||e.$set("value",d.text())}return function(a,d,e){var k=d.parent(),m=
k.data("$selectController")||k.parent().data("$selectController");m&&m.ngModelCtrl&&(f?a.$watch(f,function(a,f){e.$set("value",a);f!==a&&m.removeOption(f);m.addOption(a,d);m.ngModelCtrl.$render();c(d)}):(m.addOption(e.value,d),m.ngModelCtrl.$render(),c(d)),d.on("$destroy",function(){m.removeOption(e.value);m.ngModelCtrl.$render()}))}}}}],ge=oa({restrict:"E",terminal:!1}),Bc=function(){return{restrict:"A",require:"?ngModel",link:function(a,c,d,e){e&&(d.required=!0,e.$validators.required=function(a,
c){return!d.required||!e.$isEmpty(c)},d.$observe("required",function(){e.$validate()}))}}},Ac=function(){return{restrict:"A",require:"?ngModel",link:function(a,c,d,e){if(e){var f,g=d.ngPattern||d.pattern;d.$observe("pattern",function(a){M(a)&&0<a.length&&(a=new RegExp("^"+a+"$"));if(a&&!a.test)throw G("ngPattern")("noregexp",g,a,ta(c));f=a||t;e.$validate()});e.$validators.pattern=function(a){return e.$isEmpty(a)||v(f)||f.test(a)}}}}},Dc=function(){return{restrict:"A",require:"?ngModel",link:function(a,
c,d,e){if(e){var f=-1;d.$observe("maxlength",function(a){a=aa(a);f=isNaN(a)?-1:a;e.$validate()});e.$validators.maxlength=function(a,c){return 0>f||e.$isEmpty(c)||c.length<=f}}}}},Cc=function(){return{restrict:"A",require:"?ngModel",link:function(a,c,d,e){if(e){var f=0;d.$observe("minlength",function(a){f=aa(a)||0;e.$validate()});e.$validators.minlength=function(a,c){return e.$isEmpty(c)||c.length>=f}}}}};Q.angular.bootstrap?console.log("WARNING: Tried to load angular more than once."):(Xd(),Zd(ba),
C(V).ready(function(){Td(V,uc)}))})(window,document);!window.angular.$$csp()&&window.angular.element(document).find("head").prepend('<style type="text/css">@charset "UTF-8";[ng\\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-animate-anchor{position:absolute;}</style>');

define("angular", function(){});

define('elements/elementsService',['angular'], function () {
	
	
	return function($compile) {
		
		
	}

});

	
define('elements/containerDirective',[],function () {
	
	return function($rootScope, $compile, SlidesFactory, Path){
		
		return {
			controller: function(){},
			transclude: true,
			templateUrl: Path.template+'templates/container.html',
			link: function ($scope, element, attribute, controller, transcludeFn) {
				
				$rootScope.$watch('slides', function(newSlide, oldSlide){
					
					if(angular.isUndefined($rootScope.slides)) return;
					
					var slide	=	$rootScope.slides[$rootScope.slide];
					
					if(!angular.isUndefined(slide) && !angular.isUndefined(slide.styles))
						SlidesFactory.addBackground(element, slide.styles.bgColor, slide.styles.bgImage);
					
					if(!angular.isUndefined(slide)){
						var slide	=	$rootScope.slides[$rootScope.slide];
						
						$scope.cslides	=	slide.items;
					}
				}, true);
				
				
				$rootScope.$watch('slide', function(newSlide, oldSlide){
					
					if(newSlide == oldSlide) return;
					
					var slide	=	$rootScope.slides[$rootScope.slide];
					
					if(!angular.isUndefined(slide))
						$scope.cslides	=	slide.items;
					
					
					if(!angular.isUndefined(slide) && !angular.isUndefined(slide.styles))
						SlidesFactory.addBackground(element, slide.styles.bgColor, slide.styles.bgImage);
				}, true);
				
				
			}
		}
	};
});

	
define('elements/containerController',['angular'], function () {
	
	return function($rootScope, $scope, SlidesFactory){
		
		$rootScope.$on('elementSelected', function(event, data){
			
			if(data.type == 'slide') return;
			
			var elements1	=	angular.element('.container-elements').find('.elements');
			var elements2	=	angular.element('.aws_sortable_items').find('li');
			
			elements1.removeClass('active');
			elements2.removeClass('active');
			
			elements2.each(function(index, value){
				
				if(jQuery(this).attr('pindex') == data.index)
					jQuery(this).addClass('active');
			});
			
			elements1.each(function(index, value){
				
				if(jQuery(this).attr('index') == data.index)
					jQuery(this).addClass('active');
			});
			
		});
		
		$rootScope.$on('arrange_elements', function(event, data){
			
			var selectedElements	=	$rootScope.selectedElements;
			
			if(selectedElements.length > 0){
				
				angular.forEach( selectedElements, function( value, index ){
					
					var items		=	$rootScope.slides[$rootScope.slide].items;
					var element		=	items[value];
					var elements	=	angular.element('.container-elements').find('.elements');
					
					elements.each(function(){
						
						if(jQuery(this).attr('index') == element.index)
							jQuery(this).addClass('active');
						
					});
					
				});
				
			}
			
		});
	};
	
});

	
define('elements/elementsDirective',['angular'], function () {
	
	return function($rootScope, $compile, SlideFactory){
		
		return {
			scope: {
				kind: '@',
				index: 	'@',
				width: 	'@',
				height: '@',
				top: 	'@',
				left: 	'@',
				zindex: '@',
				effectIn: '@',
				effectOut: '@',
				timing: '@',
				speed: '@',
				delay: '@',
				content: '@',
				ratio: '@'
			},
			template: '<div ng-transclude></div>',
			transclude: true,
			controller: function(){
				
				this.setWidth	=	function(width){
					
					
				}
			},
			link: function ($scope, element, attr, controller) {
				
				var data =	$rootScope.slides[$rootScope.slide].items[$scope.index];
				
				
				$scope.$watchGroup(['top', 'left', 'zindex', 'width'], function(newValue, oldValue){
					
					element.css({top: attr.top+'px', left: attr.left+'px', 'z-index':data.zindex, width: attr.width+'px'});
				}, true);
				
				if(data.kind != 'text')
					$scope.$watchGroup(['height', 'ratio', 'width'], function(newValue, oldValue){
						
						element.css({height: attr.height+'px'});
						
						if(newValue == oldValue) return;
						element.resizable('option', 'aspectRatio', attr.ratio);
						
					}, true);
					
				$scope.$watch('effectIn', function(newEffect, oldEffect){
					
					if(newEffect == oldEffect) return;
					
					element.css({
						'-webkit-animation-timing-function': $scope.timing,
						'-webkit-animation-duration': $scope.speed + 'ms',
						'-webkit-animation-delay': $scope.delay + 'ms'
					});
					
					element.removeClass(oldEffect).addClass(newEffect);
					
				}, true);
				
				element.addClass('elements box-1');
				
				element.click(function(){

					if( !$rootScope.keyShiftdown ){
						
						$rootScope.selectedElements.length	=	0;
						
						$rootScope.selectedElements			=	[$scope.index];
						
						$rootScope.item	=	{index: $scope.index, data: data};
						
						$rootScope.$broadcast('elementSelected', data);
						
						$rootScope.$broadcast('elementType', {type: $scope.kind, index: $scope.index, element: element });
						
						$rootScope.$broadcast('arrange_elements', {show: 0});
						
						$rootScope.$apply();
					}else{
						
						if(jQuery.inArray($scope.index, $rootScope.selectedElements) == -1){
							$rootScope.selectedElements.push($scope.index);
							$rootScope.$broadcast('arrange_elements', {show: 1});
						}
					}
										
				});
				
				if(angular.isUndefined(data.ratio)) data.ratio = 1;
				
				var handles	=	'all';
				
				if(data.kind == 'text'){
					
					handles	=	'w, e';
					
					element.resizable({
						handles: handles,
						resize: function(event, ui){
					
							data.width 	= 	ui.size.width;
							data.height = 	ui.size.height;
					
							$rootScope.$apply();
						},
						stop: function(event, ui){
					
					
						}
					});
				}
				
				if(data.kind == 'image'){
					
					element.resizable({
						handles: handles,
						aspectRatio: data.ratio,
						resize: function(event, ui){
					
							data.width 	= 	ui.size.width;
							data.height = 	ui.size.height;
					
							$rootScope.$apply();
						},
						start: function(event, ui){
							
						},
						stop: function(event, ui){
					
					
						}
					});
				}
				
				if(data.kind == 'video'){
					
					element.resizable({
						handles: handles,
						resize: function(event, ui){
					
							data.width 	= 	ui.size.width;
							data.height = 	ui.size.height;
					
							$rootScope.$apply();
						},
						start: function(event, ui){
							
						},
						stop: function(event, ui){
					
					
						}
					});
				}
				
				var startLeft	=	0;

				element.draggable({
					containment: '.container-elements',
					start: function(event, ui){
						
						
					},
					stop: function(event, ui){
						
						data.top 	= 	ui.position.top;
						data.left	= 	ui.position.left;
					},
					drag: function(event, ui){
						
						
					}
				});
					
			}
		}
	};
});

	
define('elements/imageDirective',['angular'], function () {
	
	return function($rootScope){
		
		return {
			scope: {
				index: '@',
				width: '@',
				height: '@',
				src: '@'
			},
			require: '^elements',
			link: function ($scope, element, attr, ctrlElements) {
				
				var data =	$rootScope.slides[$rootScope.slide].items[$scope.index];
				
				if(!angular.isUndefined(data.src_img) && data.src_img != '') {
					
					element.html(angular.element('<img src="'+data.src_img+'" width="'+$scope.width+'" height="'+$scope.height+'" />'));
					
				}else{
					
					data.src_img 	= '';
					data.srcId	=	[];
				}
				
				$scope.$watchGroup(['src'], function(){
					element.html(angular.element('<img src="'+data.src_img+'" width="'+$scope.width+'" height="'+$scope.height+'" />'));
				}, true);
				
				$scope.$watchGroup(['width', 'height'], function(){
					
					element.find('img').css({width: $scope.width+'px', height: $scope.height+'px'});
										
				}, true);
				
			}
		};
	};
});

	
define('elements/textDirective',['angular'], function () {
	
	return function($rootScope, SlideFactory){
		
		return {
			scope: {
				index: '@',
				bgcolor: '@',
				color: '@',
				fontname: '@',
				fontsize: '@',
				fontweight: '@',
				content: '@',
				padding: '@'
			},
			require: '^elements',
			transclude: true,
			template: '<div class="content" ng-transclude></div>',
			link: function ($scope, element, attr, ctrlElements) {
				
				$scope.$watchGroup(['fontname', 'fontsize', 'fontweight', 'color', 'bgcolor'], function(newValue, oldValue){
					
					element.css({
						'font-family': "'"+$scope.fontname+"'", 
						'font-size': $scope.fontsize+'px',
						'font-weight': $scope.fontweight,
						'color': $scope.color,
						'background-color': $scope.bgcolor
					});
					
					
				});
				
				$scope.$watch('fontsize', function(newValue, oldValue){
					var width	=	element.find('.content span').width();
					
					if(newValue == oldValue) return;
					
					
				});
				
				$scope.$watch('padding', function(newValue, oldValue){
						
					element.find('.content').css({
						'display': 'block',
						'padding': $scope.padding
					})
				});
				
			}
		};
	};
});

	
define('elements/elementsModule',[
	'elements/elementsController', 
	'elements/elementsService', 
	'elements/containerDirective',
	'elements/containerController',
	'elements/elementsDirective',
	'elements/imageDirective',
	'elements/textDirective'
], function (
	ElementsController, 
	ElementsService,
	ContainerDirective,
	ContainerController,
	ElementsDirective,
	ImageDirective,
	TextDirective
) {
		
		var elementsModule = angular.module('ElementsModule', ['ngRoute']);
		
		elementsModule.controller('ElementsController', ['$scope', ElementsController]);
		elementsModule.controller('ContainerController', ContainerController);
		elementsModule.directive('containerelements', ContainerDirective);
		elementsModule.directive('elements', ElementsDirective);
		elementsModule.directive('elementimage', ImageDirective);
		elementsModule.directive('elementtext', TextDirective);
		
	return elementsModule;
});

	
define('contextbar/contextbarDirective',['workspace/workspaceService'], function () {
		
	var ContextbarDirective = angular.module('ContextbarDirective', []);
	
	ContextbarDirective.directive('contextbar', function($rootScope, $compile){
		
		return {
			restrict: 'E',
			transclude: true,
			controller: function($scope, $element, $attrs, $transclude){
				
				this.loadDefaultElement	=	function(){
					
					var template =	'<li contextbar-newslide index="'+$rootScope.slide+'"></li>'+
									'<li contextbar-doubleslide></li>'+
									'<li contextbar-deleteslide></li>';

					return template;
				}
				
				this.loadImageElement = function(data){
				
					var template =	'<li contextbar-double></li><li contextbar-delete></li>';
									
					template	 = '<li contextbar-addimage></li>'+template;
						
					return template;
				}
				
				this.loadTextElement = function(){
					
					var template =	'<li contextbar-double></li><li contextbar-delete></li>';

					return template;
				}
				
				this.loadSlideElement = function(data){
					
					var template =	'<li contextbar-newslide index="'+data.index+'"></li><li contextbar-doubleslide></li><li contextbar-deleteslide></li>';

					return template;
				}
				
				this.loadPanelSlides	=	function(){
					
					var template =	'<li contextbar-newslide></li>';

					return template;
				}
				
				this.loadArrangeElements	=	function(){
					
					var template =	'<ul contextbar-arrangeelements></ul>';

					return template;
				}
			},
			template: 	'<div class="contextbar" ng-transclude></div>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				var template	=	'';
				
				$scope.show = false;
				
				$rootScope.$on('arrange_elements', function(event, data){
					
					if(data.show == 0){

						element.find('.contextbar').empty();
						
						return;
					}
					
					
					template = toolbarCtrl.loadArrangeElements();
					
					$compile(template)($scope, function(clonedElement, $scope){
						
							
						element.find('.contextbar').html(clonedElement);
					});
					
				});
				
				
				element.addClass('ui-1');
			}
		};
	})
	.directive('contextbarArrangeelements', function($rootScope){
		
		return {
			transclude: true,
			template: 	'<li><a href="#" class="aws-icon arrange-middle" ng-click="arrange_middle($event)"></a></li>'+
						'<li><a href="#" class="aws-icon arrange-center" ng-click="arrange_center($event)"></a></li>'+
						'<li><a href="#" class="aws-icon arrange-top" ng-click="arrange_top($event)"></a></li>'+
						'<li><a href="#" class="aws-icon arrange-bottom" ng-click="arrange_bottom($event)"></a></li>'+
						'<li><a href="#" class="aws-icon arrange-left" ng-click="arrange_left($event)"></a></li>'+
						'<li><a href="#" class="aws-icon arrange-right" ng-click="arrange_right($event)"></a></li>',
			link: function ($scope, element, attrs, contextbarCtrl) {
				
				$rootScope.$on('elementSelected', function(event, data){
					
					if(data.type == 'slide') return;
					
				});
				
				$scope.arrange_middle	= function(event){
					
					if($rootScope.selectedElements.length > 1){
						
						var items		=	$rootScope.slides[$rootScope.slide].items;
						var element_1	=	items[$rootScope.selectedElements[0]];
						var height_1	=	element_1.height;
						
						angular.forEach( $rootScope.selectedElements, function( value, index ){
							
							if(index > 0){
								
								var element_2	=	items[value];
								
								var height_2	=	element_2.height;
								
								if(height_1 > height_2){
									
									element_2.top	=	(element_1.top + ((element_1.height - element_2.height)/2));
									
								}else{
									
									element_1.top	=	(element_2.top + ((element_2.height - element_1.height)/2));
								}

							}
							
						});
					}
					
					event.preventDefault();
				};
				
				$scope.arrange_center	= function(event){
					
					if($rootScope.selectedElements.length > 1){
						
						var items		=	$rootScope.slides[$rootScope.slide].items;
						var element_1	=	items[$rootScope.selectedElements[0]];
						var width_1		=	element_1.height;
						
						angular.forEach( $rootScope.selectedElements, function( value, index ){
							
							if(index > 0){
								
								var element_2	=	items[value];
								
								var width_2		=	element_2.height;
																
								var e_w_1		=	element_1.width,
									e_w_2		=	element_2.width;
								
								
								
								if(width_1 > width_2){
									
									element_2.left	=	(element_1.left + ((e_w_1 - e_w_2)/2));
									
								}else{
									
									element_1.left	=	(element_2.left + ((e_w_2 - e_w_1)/2));
								}

							}
							
						});
					}
					
					event.preventDefault();
				};
				
				$scope.arrange_top		= function(event){
					
					if($rootScope.selectedElements.length > 1){
						
						var items		=	$rootScope.slides[$rootScope.slide].items;
						var element_1	=	items[$rootScope.selectedElements[0]];
						var top_1		=	element_1.top;
						
						angular.forEach( $rootScope.selectedElements, function( value, index ){
							
							if(index > 0){
								
								var element_2	=	items[value];
																
								element_2.top	=	top_1;

							}
							
						});
					}
					
					event.preventDefault();
				};
				
				$scope.arrange_bottom	= function(event){
					
					if($rootScope.selectedElements.length > 1){
						
						var items		=	$rootScope.slides[$rootScope.slide].items;
						var element_1	=	items[$rootScope.selectedElements[0]];
						var top_1		=	element_1.top,
							height_1	=	element_1.height;
						
						angular.forEach( $rootScope.selectedElements, function( value, index ){
							
							if(index > 0){
								
								var element_2		=	items[value],
									height_2		=	element_2.height;
																
									element_2.top	=	top_1 - (height_2 - height_1);

							}
							
						});
					}
					
					event.preventDefault();
				};
				
				$scope.arrange_left		= function(event){
					
					if($rootScope.selectedElements.length > 1){
						
						var items		=	$rootScope.slides[$rootScope.slide].items;
						var element_1	=	items[$rootScope.selectedElements[0]];
						var left_1		=	element_1.left;
						
						angular.forEach( $rootScope.selectedElements, function( value, index ){
							
							if(index > 0){
								
								var element_2	=	items[value];
																
								element_2.left	=	left_1;

							}
							
						});
					}
					
					event.preventDefault();
				};
				
				$scope.arrange_right	= function(event){
					
					if($rootScope.selectedElements.length > 1){
						
						var items		=	$rootScope.slides[$rootScope.slide].items;
						var element_1	=	items[$rootScope.selectedElements[0]];
						var left_1		=	element_1.left,
							width_1		=	element_1.width;
						
						angular.forEach( $rootScope.selectedElements, function( value, index ){
							
							if(index > 0){
								
								var element_2		=	items[value],
									width_2			=	element_2.width;
																
									element_2.left	=	left_1 - (width_2 - width_1);

							}
							
						});
					}
					
					event.preventDefault();
				};
			}
		}
	})
	.directive('contextbarAddimage', function($rootScope){
		
		return {
			require: '^contextbar',
			transclude: true,
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			template: 	'<a href="#"><span class="fa fa-plus-square"></span> Add Image</a>',
			link: function ($scope, element, attrs, contextbarCtrl) {
				
				var data 	=	$rootScope.slides[$rootScope.slide].items[$scope.index];
				
				$scope.mediaLightboxOnSelect	=	function(){
					
	  		      var attachment = $scope.mediaLightbox.state().get('selection').first().toJSON();
			  
	  			  var data 	=	$rootScope.slides[$rootScope.slide].items[$scope.itemSelected.index];
			  
	  			  data.src_img 	=	attachment.url;
	  			  data.srcId	=	[attachment.id];
			  
	  			  $scope.itemSelected.element.find('elementimage').html(angular.element('<img src="'+data.src_img+'" width="'+data.width+'" height="'+data.height+'" />'));
				  
				  $rootScope.$apply();
				}
				
				$scope.mediaLightboxOnClose	=	function(){
					
					var data 	=	$rootScope.slides[$rootScope.slide].items[$scope.itemSelected.index];
				
					data.src_img 	= '';
					data.srcId 		= [];
				
					$scope.itemSelected.element.find('.pad').empty();
				
					$rootScope.$apply();
				}
				
				$scope.mediaLightboxOnOpen	=	function(){
					
					var data 	=	$rootScope.slides[$rootScope.slide].items[$scope.itemSelected.index];
				
					var selection = $scope.mediaLightbox.state().get('selection');
				
				    var ids = data.srcId;
				
					ids.forEach(function(id) {
					   var attachment = wp.media.attachment(id);
				   
					   attachment.fetch();
				   
					   selection.add( attachment ? [ attachment ] : [] );
					});
				}
				
				
				var frame	=	$scope.mediaLightbox;
				
				element.on('click', function(e){

					frame.open();
					
					e.preventDefault();
				});
			}
		};
	})
	.directive('contextbarDouble', function($rootScope, SlideFactory){
		
		return {
			scope: {
				index: '@'
			},
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			template: 	'<a href="#" ng-click="double($event)"><span class="fa fa-files-o"></span> Double</a>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				$scope.double	=	function(event){
					
					SlideFactory.double( $rootScope.item.index );
					
					event.preventDefault();
				}
			}
		};
	})
	.directive('contextbarDelete', function($rootScope, SlideFactory){
		
		return {
			scope: {
				index: '@'
			},
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			template: 	'<a href="#" ng-click="delete($event)"><span class="fa fa-times"></span> Delete</a>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				$scope.delete	=	function(event){
					
					SlideFactory.delete( $rootScope.item.index );
					
					event.preventDefault();
				}
			}
		};
	})
	.directive('contextbarNewslide', ['$rootScope', 'SlidesFactory', function($rootScope, SlidesFactory){
		
		return {
			scope: {
				index: '@'
			},
			template: 	'<a href="#" ng-click="newSlide($event)"><span class="fa fa-plus-square"></span> New Slide</a>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				$scope.newSlide = function(event){
					
					SlidesFactory.newSlide();
					
					//$rootScope.$broadcast('changeSlide');
					
					event.preventDefault();
				}
				
				
			}
		};
	}])
	.directive('contextbarDoubleslide', ['$rootScope', 'SlidesFactory', function($rootScope, SlidesFactory){
		
		return {
			scope: {
				index: '@'
			},
			template: 	'<a href="#" ng-click="doubleSlide($event)"><span class="fa fa-files-o"></span> Double</a>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				$scope.doubleSlide = function(event){
					
					SlidesFactory.doubleSlide($rootScope.slide);
					
					//$rootScope.$broadcast('changeSlide');
					
					event.preventDefault();
				}
				
			}
		};
	}])
	.directive('contextbarDeleteslide', ['$rootScope', 'SlidesFactory', function($rootScope, SlidesFactory){
		
		return {
			scope: {
				index: '@'
			},
			template: 	'<a href="#" ng-click="deleteSlide($event)"><span class="fa fa-times"></span> Remove</a>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				$scope.deleteSlide = function(event){
					
					SlidesFactory.deleteSlide($rootScope.slide);
										
					event.preventDefault();
				}
				
			}
		};
	}])
	.directive('contextbarBackgroundslide', ['$rootScope', 'SlidesFactory', function($rootScope, SlidesFactory){
		
		return {
			
			template: 	'<span class="separate"></span><span class="colorpicker"></span><a href="#" ng-click="addImageBg($event)"><span class="fa fa-file-image-o"></span> Image</a>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				var slide = $rootScope.slides[$rootScope.slide];
								
				$scope.showSubmenu = function(event){
					
					element.toggleClass('isSubmenu');
					
					event.preventDefault();
				};
					
				element.find('.colorpicker').wpColorPicker({
					change: function(event, ui){
						
						if(!angular.isUndefined(slide.styles.bgColor)){
							slide.styles.bgColor	=	ui.color.toCSS();
						
							$rootScope.$apply();
						}
					}
				});
				
				var frame	=	$scope.mediaLightbox;
				
				$scope.addImageBg = function(e){

					frame.open();
					
					e.preventDefault();
				};
				
			}
		};
	}]);
	
	return ContextbarDirective;
});

	
define('contextbar/contextbarModule',[ 'workspace/workspaceService', 'contextbar/contextbarDirective' ], function () {
		
	var ContextbarModule = angular.module('ContextbarModule', ['ContextbarDirective']);
		
		ContextbarModule.controller('ContextbarController', function($rootScope, $scope){
			
		});
		
	return ContextbarModule;
});
define('tools/toolsService',[],function () {
		
	return function (ToolsbarElements) {
		
		this.showPanel = function(type){
			
			var template	=	'<div elements>elements</div>';
			
			switch(type){
			case 'effects':
				template = '<div elements>effects</div>';
				break;	
			}
			
			return template;
		}
		
	};
	
});
	
define('tools/toolsModule',[ 'tools/toolsService', 'workspace/workspaceService' ], 
function (ToolbarPanel) {
	
	
	var ToolbarModule	=	angular.module('ToolbarModule', []);
	
	var toolsWrap	=	jQuery('#tools');
	
	ToolbarModule.controller('ToolsController', ['$rootScope', '$scope', 'ToolsbarElements', 'SlideFactory', 'SettingFactory',
	function($rootScope, $scope, ToolsbarElements, SlideFactory, SettingFactory){
		
		$scope.tools		=	ToolsbarElements;
		$scope.effects		=	ToolsbarElements.info.effects;
		$scope.videos		=	ToolsbarElements.info.videos;
		$scope.effectIn		=	{name: 'awsfadeIn'};
		
		$rootScope.$watch('settings', function(newValue, oldValue){
			
			$scope.settings		=	$rootScope.settings;
		});
		
		$scope.updateSettings	=	function(data){
			
			SettingFactory.update(data);
		}
		
		$scope.update		=	function(data){
			
			SlideFactory.update($rootScope.item.index, data);
		}
		
		$scope.updateAuto	=	function(data){
			
			
		}
		
		$scope.updateEffectIn	=	function(effectIn){
			
			$scope.update({effectIn: effectIn});
			
		}

		$scope.updateEffectOut	=	function(effectOut){

			$scope.update({effectOut: effectOut});

		}
		
		$scope.updateTiming	=	function(timing){
			
			$scope.update({timing: timing});

		}
		
	}])
	.directive('colorbox', function($rootScope, $compile) {
		
		return {
			template: 	'',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				element.minicolors({
					position: 'bottom right',
					opacity: true,
					change: function(hex, opacity){

						
						
						$scope.$apply();
					}
				});
				
			}
		};
	})
	.directive('toolbar', function($compile, ToolsbarElements, $rootScope, Path) {
		
		return {
			
			templateUrl: Path.template+'templates/toolbar.html',
			controller: function($scope, $element, $attrs, $transclude){
				
				this.getName	=	function(){
					
					return $scope.name;
				}
				
			},
			link: function ($scope, element, attribute) {
				
				$scope.namePanel	=	'';
				
				$scope.togglePanel	=	function(name, $event){
					
					$rootScope.$broadcast('changeToolbar');
					
					if($scope.namePanel == name){

						$scope.namePanel = '';

					}else{
						$scope.namePanel	=	name;
					}
					
					$event.preventDefault();
				};
				
			}
		};
	})
	.directive('toolbarlists', function($compile) {
		
		return {
			transclude: true,
			require: '^toolbar',
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			template: 	'<div ng-transclude class="header"></div>'+
						'<ul class="elementslist">'+
							'<li ng-repeat="element in tool.list">'+
								'<a href="#" ng-click="createElement(element.name, $event)">'+
									'<span class="{{element.icon}}"></span>'+
									'<span class="lbl">{{element.label}}</span>'+
						'</a></li></ul>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				$scope.$watch('namePanel', function(newValue, oldValue){
					
					if(newValue == oldValue) return;
					
					if((newValue == attrs.name) && !element.hasClass('isShow')) {
						
						$scope.panelIsShow = true;
						
					}else{
						
						$scope.panelIsShow = false;
					}
										
				}, true);	
			}
		};
	})
	.directive('toolpanel', function($rootScope, $compile){
		
		return {
			transclude: true,
			require: '^toolbar',
			controller: function($scope, $element, $attrs, $transclude){
				
				$attrs.$set('bnname', $scope.name);
				
			},
			template: 	'<div ng-transclude class="header"></div>'+
						'<div class="pad content"></div>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				
				$scope.$watch('namePanel', function(newValue, oldValue){
					
					if(newValue == oldValue) $scope.panelIsShow = true;
					
					if((newValue == attrs.name) && !element.hasClass('isShow')) {
						
						$scope.panelIsShow = true;
						
					}else{
						
						$scope.panelIsShow = false;
					}
					
					$rootScope.$broadcast('panelType', {type: $scope.namePanel});
										
				}, true);	
				
				var templateTpl	=	''
				
				switch(attrs.name){
					case 'slides':
					    templateTpl	=	'<div toolbarpanel-slides></div>';
			
					break;
					case 'setting':
						templateTpl	=	'<div toolbarpanel-setting></div>';

					break;
					case 'effects':
					    templateTpl	=	'<div toolbarpanel-effects></div>';
						
					break;
					case 'info':
					    templateTpl	=	'<div toolbarpanel-info></div>';
					
					break;
					
				}
				
			    $compile(templateTpl)($scope, function(clonedElement, $scope){

					element.append(clonedElement);
				});
			}
		};
	})
	.directive('toolbarpanelElements', function($rootScope, ToolsbarElements) {
		
		return {
			transclude: true,
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			template: 	'<div class="elementslist">'+
							'<div ng-repeat="element in elementslist">'+
								'<a href="#" ng-click="createElement(element.name, $event)">'+
									'<span class="{{element.icon}}"></span>'+
									'<span class="lbl">{{element.label}}</span></a>'+
							'</div>'+
						'</div>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				$scope.elementslist	=	ToolsbarElements.slides.list;
				
			}
		};
	})
	.directive('toolbarpanelEffects', function() {
		
		return {
			transclude: true,
			require: '^toolbar',
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			template: 	'<div id="effects_scroller" class="tiny_scroller"><div class="scroller"><div class="container_scroller">'+
						'<ul>'+
							'<li ng-repeat="element in tool.list" ng-init="refreshScroll()">'+
								'<a href="#" ng-click="createElements(element.name, $event)">'+
									'<span class="lbl">{{element.label}}</span>'+
						'</a></li></ul>'
						+'</div></div></div>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				$scope.iscroll		=	new IScroll('#effects_scroller', { scrollX: false, scrollY: true, mouseWheel: true, disableMouse:true, disablePointer:true, scrollbars: 'custom', interactiveScrollbars:true });
				
				$scope.refreshScroll	=	function(){
				
					$scope.iscroll.refresh();
				}
			}
		};
	})
	.directive('toolbarpanelInfo', function($rootScope, ToolsbarElements, Path) {
		
		return {
			transclude: true,
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			templateUrl: Path.template+'templates/toolbarinfo.html',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				$scope.tools		=	ToolsbarElements;
				$scope.effects		=	ToolsbarElements.info.effects;
				$scope.videos		=	ToolsbarElements.info.videos;
				$scope.effectIn		=	{name: 'awsfadeIn'};
				
				var frame			=	$rootScope.mediaLightbox,
					slide			=	$rootScope.slides[$rootScope.slide];
				
				$rootScope.$on('elementSelected', function(event, data){
					
					if(data.type == 'slide') return;
					
					$scope.data = data;
					
				});
				
				$scope.loadImageLightbox	=	function(event){
					
					event.preventDefault();
			
					$rootScope.mediaLightboxOnSelect	=	function(){
			
				      var attachment = frame.state().get('selection').first().toJSON();
		  				
						
					  if(attachment.type == 'image'){
						  
						  var data		=	{};
						  
	  					data.src_img	=	attachment.url;
	  					data.srcId		=	[attachment.id];
					
	  					data.ratio		=	attachment.width / attachment.height;
	  					data.width 		=	150;
	  					data.height 	=	150/data.ratio;
						 
						$scope.update(data);
				  	  }
		  
					  $rootScope.$apply();
					}
				
					$rootScope.mediaLightboxOnClose	=	function(){
						
						$rootScope.$apply();
					}
		
					$rootScope.mediaLightboxOnOpen	=	function(){
						
					}
					
					frame.open();
				}
				
				$scope.changeBgColor	=	function(){
					
					var bgColor	=	element.find('.colorbgpicker').minicolors('rgbaString');
										
					$scope.update({bgColor: bgColor});
				}
				
				$scope.changeColor	=	function(){
					
					var color	=	element.find('.colorpicker').minicolors('rgbaString');
										
					$scope.update({color: color});
				}
				
			}
		};
	})
	.directive('toolbarpanelSetting', function(Path) {
		
		return {
			controller: function($scope, $element, $attrs, $transclude){
				
				
			},
			templateUrl: Path.template+'templates/toolbarsetting.html',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				
				
				
				
			}
		};
	})
	.directive('toolbarpanelInfoSlide', function($rootScope, SlidesFactory, $filter, ToolsbarElements, Path){
		return {
			scope: {
				index: '@'
			},
			templateUrl: Path.template+'templates/toolbarinfoslide.html',
			link: function ($scope, element, attrs) {
				
				$scope.tools		=	ToolsbarElements;
				$scope.effects		=	ToolsbarElements.info.effects;
				$scope.settings		=	$rootScope.settings;
				
				var frame			=	$rootScope.mediaLightbox;
				var slide 			= 	$rootScope.slides[0];
				
				var orderBy = $filter('orderBy');
				
				$rootScope.$on('elementType', function(event, data){
					
					if(data.type != 'slide') return;
					
					slide 	= $rootScope.slides[data.index];
				
					$scope.slide	=	slide;
				
					$scope.items	=	slide.items;
					
				});
				
				$rootScope.$watch('settings', function(){
					
					$scope.settings		=	$rootScope.settings;
					
				});
				
				
				$scope.getSettingDirection	=	function(){
	
					return $rootScope.settings.direction;
				}

				$scope.changeBgColor	=	function(){
	
					var color	=	element.find('.colorbgpicker').minicolors('rgbaString');
					
					slide.styles.bgColor	=	color;
				}
				
				$scope.updateProperties	=	function(duration, title, effectIn){
										
					slide.duration	=	duration;
					slide.title		=	title;
					slide.effectIn	=	effectIn;
				}
				
				$scope.loadScroll	=	function(){
					
					$scope.iscroll		=	new IScroll('#items_scroller', { scrollX: false, scrollY: true, mouseWheel: true, disableMouse:true, disablePointer:true, scrollbars: 'custom', interactiveScrollbars:true });
					
					var sortableElement = element.find('.aws_sortable_items');
				
					sortableElement.sortable({items: "> li",  
						
						stop: function(event, ui){
							
							var items	=	element.find('.aws_sortable_items li'),
								orders	=	sortableElement.sortable('toArray');
								
							jQuery.each(orders, function(index, id){
								
								var order			=	parseInt(items.filter('#'+id).attr('index'));
									
									$rootScope.slides[$scope.index].items[order].zindex = index;
									
							});
							
							$rootScope.$apply();
						}
					});
					
				}
				
				$scope.loadBackgroundImage	=	function(event){
					
					event.preventDefault();
					
					
					frame.open();
				}
		
				$rootScope.mediaLightboxOnSelect	=	function(){
			
			      var attachment = frame.state().get('selection').first().toJSON();
		  			
					
				  if(attachment.type == 'image'){
			  
				  	slide.styles.bgImage 		=	attachment.url;
				  	slide.styles.bgImageId	=	[attachment.id];
			
			  	  }
		  
				  slide.styles.bgSrc 		=	attachment.url;
				  slide.styles.bgId			=	[attachment.id];
		  
				  slide.styles.from			=	attachment.type;
		  
				  $rootScope.$apply();
				}
		
				$rootScope.mediaLightboxOnClose	=	function(){
					
					var attachment = frame.state().get('selection');
					
					if(attachment.length == 0){
					
						slide.styles.bgImage 	= '';
						slide.styles.bgImageId 	= [];
					
						slide.styles.bgSrc 		=	'';
						slide.styles.bgId		=	[];

						slide.styles.from		=	'color';
			
						$rootScope.$apply();
					}
				}
		
				$rootScope.mediaLightboxOnOpen	=	function(){
			
					var selection = frame.state().get('selection');

				    var ids = slide.styles.bgImageId;

					ids.forEach(function(id) {
					   var attachment = wp.media.attachment(id);

					   attachment.fetch();

					   selection.add( attachment ? [ attachment ] : [] );
					});
				}
				
				$scope.currentItem	=	function(event, index){

					var listSlides	=	element.find('ul.aws_sortable_items li');

					listSlides.removeClass('active');
					listSlides.filter('#'+event.currentTarget.id).addClass('active');
										
				}
			}
		}
		
	})
	.directive('toolbarpanelItems', ['$rootScope', 'SlideFactory', 'ToolsbarElements', '$compile', '$filter', function($rootScope, SlideFactory, ToolsbarElements, $compile, $filter) {
		
		return {
			template: 	'<div id="items_scroller" class="tiny_scroller" ng-init="initItems()">'+
						'<div class="scroller"><div class="container_scroller" id="container_items"><ul class="aws_sortable_items">'+
						'<li ng-repeat="item in items | orderBy:\'zindex\'" index="{{item.zindex}}" pindex="{{item.index}}" id="id_{{item.zindex}}" ng-click="currentItem($event, item.index)">'+
						'<i class="fa fa-sort"></i>'+
						'<span class="action fa published" ng-click="published($index)"></span>'+
						'<span class="name">{{item.name}}</span>'+
						'<span class="status">{{item.speed}}ms : {{item.delay}}ms</span>'+
						'</li></ul></div></div></div>'+
						'<ul class="aws_action_panel">'+
						'<li><a href="#" class="delete_item" ng-click="deleteItem($event)"><span class="fa fa-minus"></span></a></li>'+
						'<li><a href="#" class="double_item" ng-click="doubleItem($event)"><span class="fa fa-files-o"></span></a></li>'+
						'</ul>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				$scope.tools		=	ToolsbarElements;
				$scope.effects		=	ToolsbarElements.info.effects;
				
				var slide 			=	[];
				var orderBy 		=	$filter('orderBy');
				var slideIndex		=	0;
				var indexItem		=	0;
				var sortableElement = element.find('.aws_sortable_items');
				
				$rootScope.$watch('slides', function(newSlide, oldSlide){

					if(!angular.isUndefined($rootScope.slides[0])){
						$scope.items	=	$rootScope.slides[0].items;
						slide 			= 	$rootScope.slides[0];

						
					}
					
				});
				
				$rootScope.$on('elementType', function(event, data){
					
					if(data.type != 'slide') {
						
						indexItem		=	data.index;
						
					}else{
						
						sortableElement.sortable('refreshPositions');
						
						slideIndex		=	data.index;
				
						slide 			= 	$rootScope.slides[data.index];
						
						var items		=	[];
						
						angular.copy(slide.items, items);
						
						$scope.slide	=	slide;
						
						$scope.items	=	items;
						
					}
					
				});
				
				element.find('#items_scroller').height($rootScope.heightSlideScroller);
				
				$scope.iscroll		=	new IScroll('#items_scroller', { scrollX: false, scrollY: true, mouseWheel: true, disableMouse:true, disablePointer:true, scrollbars: 'custom', interactiveScrollbars:true });
				
				
			
				sortableElement.sortable({items: "> li",

					stop: function(event, ui){
						
						var _self	=	this,
							items	=	element.find('.aws_sortable_items li'),
							orders	=	sortableElement.sortable('toArray');
						
						jQuery.each(orders, function(index, id){
							
							
							var order	=	parseInt(jQuery(_self).find('#'+id).attr('pindex'));
								console.log('order: '+order, 'index: '+index);
								
								$rootScope.slides[slideIndex].items[order].zindex = index;

						});

						$rootScope.$apply();
					}
				});
				
				$scope.currentItem	=	function(event, index){
					
					$rootScope.item	=	{index: index, data: slide.items[index]};

					var listSlides	=	element.find('.aws_sortable_items li');
					
					listSlides.removeClass('active');
					listSlides.filter('#'+event.currentTarget.id).addClass('active');


					indexItem	=	index;
					
					$rootScope.$broadcast('elementSelected', slide.items[index]);
				}
				
				$rootScope.$on('changeItems', function(){
					
					var items		=	[];
					
					angular.copy(slide.items, items);
					
					$scope.items	=	items;
					
					setTimeout(function(){
						$scope.iscroll.refresh();
					}, 100);
					
				});
				
				$scope.deleteItem		=	function( event ){ SlideFactory.delete( indexItem ); event.preventDefault(); }
				$scope.doubleItem		=	function( event ){ SlideFactory.double( indexItem ); event.preventDefault(); }
			
			}
		};
	}])
	.directive('toolbarpanelSlides', ['$rootScope', 'SlidesFactory', 'ToolsbarElements', '$compile', function($rootScope, SlidesFactory, ToolsbarElements, $compile) {
		
		return {
			
			transclude: true,
			template: 	'<div id="slides_scroller" class="tiny_scroller" ng-init="initSlide()"><div class="scroller"><div class="container_scroller" id="container_slides"><ul class="aws_sortable"><li ng-repeat="slide in cslides | orderBy:\'orderIndex\'" orderindex="{{slide.orderIndex}}" index="{{slide.orderIndex}}" id="id_{{slide.orderIndex}}" pindex="{{$index}}" ng-click="loadSlides($event, slide.index)">'+
							'<span class="action fa published p-{{slide.settings.published}}" ng-click="published($index)"></span>'+
							'<span class="fa fa-info action_info" ng-click="showInfoSlide($index)"></span>'+
							'<span class="name">{{slide.title}}</span>'+
						'</li></ul></div></div></div>'+
						'<ul class="aws_action_panel">'+
						'<li><a href="#" class="new_slide" ng-click="newSlide($event)"><span class="fa fa-plus"></span></a></li>'+
						'<li><a href="#" class="delete_slide" ng-click="deleteSlide($event)"><span class="fa fa-minus"></span></a></li>'+
						'<li><a href="#" class="double_slide" ng-click="doubleSlide($event)"><span class="fa fa-files-o"></span></a></li>'+
						'</ul>'+
						'<div class="action_info_panel"><div toolbarpanel-info-slide index="0"></div></div>',
			link: function ($scope, element, attrs, toolbarCtrl) {
				
				element.find('#slides_scroller').height($rootScope.heightSlideScroller);
				
				$scope.iscroll		=	new IScroll('#slides_scroller', { scrollX: false, scrollY: true, mouseWheel: true, disableMouse:true, disablePointer:true, scrollbars: 'custom', interactiveScrollbars:true });
				
				var sortableElement = element.find('.aws_sortable');
				
				sortableElement.sortable({
					
					items: "> li", 
					stop: function(event, ui){
			
						var _self	=	jQuery(this),
							items	=	element.find('.aws_sortable li'),
							orders	=	sortableElement.sortable('toArray');
							
						jQuery.each(orders, function(index, id){

							var order	=	parseInt(_self.find('#'+id).attr('pindex'));
							
								
								$rootScope.slides[order].orderIndex = index;
																
						});
			
				}});
				
				
				$scope.elementslist	=	ToolsbarElements.slides.list;
				
				$rootScope.$watch('slides', function(newSlide, oldSlide){
					
					if(!angular.isUndefined($rootScope.slides)){
						$scope.cslides	=	$rootScope.slides;
						
					}
					
				});
				
				
				
				$scope.$watchGroup(['duration', 'title'], function(newValue, oldValue){
					
					if(newValue == oldValue) return;
					
					
				});
								
				$scope.loadSlides = function(event, index){
					
					$rootScope.slide = index;

					var slide = $rootScope.slides[index];
					
					$scope.duration	=	slide.effects.duration;
					$scope.title	=	slide.title;

					$rootScope.$broadcast('elementType', {type: 'slide', hasImage: false, index: index });

					var listSlides	=	element.find('ul li');

					listSlides.removeClass('active');
					listSlides.filter('#'+event.currentTarget.id).addClass('active');

				};
				
				$scope.published	=	function(index){
					
					SlidesFactory.published(index);
				}
				
				$scope.newSlide			=	function( event ){ SlidesFactory.newSlide(); event.preventDefault(); }
				$scope.deleteSlide		=	function( event ){ SlidesFactory.deleteSlide($rootScope.slide); event.preventDefault(); }
				$scope.doubleSlide		=	function( event ){ SlidesFactory.doubleSlide($rootScope.slide); event.preventDefault(); }
				
				$rootScope.$on('changeSlide', function(){
					setTimeout(function(){
						$scope.iscroll.refresh();
					}, 100);
					
				});
				
				$rootScope.$on('changeToolbar', function(){
					
					setTimeout(function(){
						$scope.iscroll.refresh();
					}, 100);
					
				});
				
				$scope.showInfoSlide	=	function(index){
					
					
					
					element.find('.action_info_panel').toggleClass('isShow');
					
					
					
				}
				
				
				
			}
		};
	}]);
	
	
	
return ToolbarModule;

});


	
define('workspace/workspaceModule',[
	'workspace/workspaceController', 
	'workspace/workspaceService', 
	'workspace/workspaceDirective', 
	'workspace/previewDirective',
	'workspace/workspaceEditorDirective', 
	'elements/elementsModule', 
	'contextbar/contextbarModule',
	'tools/toolsModule'
], function (
	WorkspaceController, 
	WorkspaceService,
	WorkspaceDirective,
	PreviewDirective,
	WorkspaceEditorDirective
	) {
		
		var workspace = angular.module('WorkspaceModule', ['ngRoute', 'ngResource', 'WorkspaceService', 'ToolbarModule', 'ElementsModule', 'ContextbarModule']);
		
		workspace.controller('WorkspaceController', ['$rootScope', '$scope', '$filter', 'SlidesFactory', 'SettingFactory', WorkspaceController]);
		
		workspace.directive('workspace', WorkspaceDirective);
		workspace.directive('workspaceeditor', WorkspaceEditorDirective);
		workspace.directive('workspacepreview', PreviewDirective);
				
	return workspace;
});

	
define('awsslideshow',[ 'awsui/awsuiModule', 'workspace/workspaceModule' ], function ( AwsuiModule, WorkspaceModule) {
		
		var app = angular.module('awsslideshow', ['ngRoute', 'AwsuiModule', 'WorkspaceModule']);
		
		app.config(['$routeProvider', '$provide', function ($routeProvider, $provide) {
			
			$routeProvider
			.when('/workspace', {
				
				controller: 'WorkspaceController',
				template: '<div workspace></div>'
				
			}).otherwise({
				
				redirectTo: '/workspace'
			});
			
			
		}]);
		
		app.value('Path', {
			'template': ajax_object.plugin_url+'js/angularjs/'
		});
		
		app.value('ToolsbarElements', {
				'info':{
					name: 'info',
					title: 'Infomation',
					icon: 'awsicon awsicon-info',
					effects: {
						effectsBgIn: [
							{label:'Default', name: 'awsfade', type: 'fade'},
							{label:'Scale', name: 'bg_scale', type: 'fade'},
							{label:'Flip Y', name: 'bg_flipy', type: 'fade'},
							{label:'Blur', name: 'bg_blur', type: 'fade'},
							{label:'Multi Blocks 1', name: 'bg_blocks_1_js', type: 'fade'},
							{label:'Multi Blocks 2', name: 'bg_blocks_2_js', type: 'fade'},
							{label:'Default', name: 'aws', type: 'horizontal'},					//Horizontal begin
							{label:'Default', name: 'aws', type: 'vertical'}				//Vertical begin
						],
						effectsBgOut: [
							{label:'Default', name: 'awsfadeOut', type: 'fade'},
							{label:'Scale', name: 'bg_scaleOut', type: 'fade'},
							{label:'Flip Y', name: 'bg_flipyOut', type: 'fade'},
							{label:'Multi Blocks 1', name: 'bg_blocks_1_out_js', type: 'fade'},
							{label:'Multi Blocks 2', name: 'bg_blocks_2_out_js', type: 'fade'}
						],
						effectsIn: [
							{label:'Fade', name: 'awsfadeIn', type: 'Fade'},
							{label:'Long Left', name: 'longLeftIn', type: 'Fade'},
							{label:'Long Right', name: 'longRightIn', type: 'Fade'},
							{label:'Long Top', name: 'longTopIn', type: 'Fade'},
							{label:'Long Bottom', name: 'longBottomIn', type: 'Fade'},
							{label:'Lightspeed', name: 'lightSpeedIn', type: 'Fade'},
							{label:'Bounce Left', name: 'bounceLeftIn', type: 'Fade'},
							{label:'Bounce Right', name: 'bounceRightIn', type: 'Fade'},
							{label:'Bounce Up', name: 'bounceUpIn', type: 'Fade'},
							{label:'Bounce Down', name: 'bounceDownIn', type: 'Fade'},
							{label:'Fade Scale', name: 'fadeScaleIn', type: 'Fade'},
							{label:'Fade Up', name: 'fadeUpIn', type: 'Fade'},
							{label:'Fade Down', name: 'fadeDownIn', type: 'Fade'},
							{label:'Fade Right', name: 'fadeRightIn', type: 'Fade'},
							{label:'Fade Left', name: 'fadeLeftIn', type: 'Fade'},
							// {label:'Splat', name: 'splatIn', type: 'Fade'},
// 							{label:'Swoosh', name: 'swooshIn', type: 'Fade'},
							{label:'Rotate Top Back Front', name: 'rotateTopBackToFrontIn', type: 'Fade'},
							{label:'Rotate Top Front Back', name: 'rotateTopFrontToBackIn', type: 'Fade'},
							{label:'Rotate Left Back Front', name: 'rotateLeftBackToFrontIn', type: 'Fade'},
							{label:'Rotate Left Front Back', name: 'rotateLeftFrontToBackIn', type: 'Fade'},
							{label:'Drop', name: 'tableDropIn', type: 'Fade'},
							{label:'Roll Left', name: 'rollLeftIn', type: 'Roll'},
							{label:'Roll Right', name: 'rollRightIn', type: 'Roll'},
							{label:'Roll Behind', name: 'rollBehindIn', type: 'Roll'},
							// {label:'Roll Center', name: 'rollCenterIn', type: 'Roll'},
							{label:'Puff', name: 'puffIn', type: 'Roll'},
							
						],
						effectsOut: [
							{label:'Fade', name: 'awsfadeOut', type: 'Fade'},
							{label:'Long Left', name: 'longLeftOut', type: 'Fade'},
							{label:'Long Right', name: 'longRightOut', type: 'Fade'},
							{label:'Long Top', name: 'longTopOut', type: 'Fade'},
							{label:'Long Bottom', name: 'longBottomOut', type: 'Fade'},
							{label:'Lightspeed', name: 'lightSpeedOut', type: 'Fade'},
							{label:'Bounce Left', name: 'bounceLeftOut', type: 'Fade'},
							{label:'Bounce Right', name: 'bounceRightOut', type: 'Fade'},
							{label:'Bounce Up', name: 'bounceUpOut', type: 'Fade'},
							{label:'Bounce Down', name: 'bounceDownOut', type: 'Fade'},
							{label:'Fade Scale', name: 'fadeScaleOut', type: 'Fade'},
							{label:'Fade Up', name: 'fadeUpOut', type: 'Fade'},
							{label:'Fade Down', name: 'fadeDownOut', type: 'Fade'},
							{label:'Fade Right', name: 'fadeRightOut', type: 'Fade'},
							{label:'Fade Left', name: 'fadeLeftOut', type: 'Fade'},
							{label:'Drop', name: 'tableDropOut', type: 'Fade'},
							{label:'Rotate Top Back Front', name: 'rotateTopBackToFrontOut', type: 'Fade'},
							{label:'Rotate Top Front Back', name: 'rotateTopFrontToBackOut', type: 'Fade'},
							{label:'Rotate Left Back Front', name: 'rotateLeftBackToFrontOut', type: 'Fade'},
							{label:'Rotate Left Front Back', name: 'rotateLeftFrontToBackOut', type: 'Fade'},
							{label:'Roll Left', name: 'rollLeftOut', type: 'Roll'},
							{label:'Roll Right', name: 'rollRightOut', type: 'Roll'},
							{label:'Roll Behind', name: 'rollBehindOut', type: 'Roll'},
							{label:'Puff', name: 'puffOut', type: 'Roll'}
						],
						timing: [
							{label:'Custom', name: 'custom', type: 'Default'},
							{label:'Linear', name: 'linear', type: 'Default'},
							{label:'Ease', name: 'ease', type: 'Default'},
							{label:'Ease In', name: 'ease-in', type: 'Default'},
							{label:'Ease Out', name: 'ease-out', type: 'Default'},
							{label:'Ease In Out', name: 'ease-in-out', type: 'Default'},
							{label:'easeInQuad', name: 'cubic-bezier(0.550, 0.085, 0.680, 0.530)', type: 'Penner Equations (approximated)'},
							{label:'easeInCubic', name: 'cubic-bezier(0.550, 0.055, 0.675, 0.190)', type: 'Penner Equations (approximated)'},
							{label:'easeInQuart', name: 'cubic-bezier(0.895, 0.030, 0.685, 0.220)', type: 'Penner Equations (approximated)'},
							{label:'easeInQuint', name: 'cubic-bezier(0.755, 0.050, 0.855, 0.060)', type: 'Penner Equations (approximated)'},
							{label:'easeInSine', name: 'cubic-bezier(0.470, 0.000, 0.745, 0.715)', type: 'Penner Equations (approximated)'},
							{label:'easeInExpo', name: 'cubic-bezier(0.950, 0.050, 0.795, 0.035)', type: 'Penner Equations (approximated)'},
							{label:'easeInCirc', name: 'cubic-bezier(0.600, 0.040, 0.980, 0.335)', type: 'Penner Equations (approximated)'},
							{label:'easeInBack', name: 'cubic-bezier(0.600, -0.280, 0.735, 0.045)', type: 'Penner Equations (approximated)'},
							{label:'easeOutQuad', name: 'cubic-bezier(0.250, 0.460, 0.450, 0.940)', type: 'Penner Equations (approximated)'},
							{label:'easeOutCubic', name: 'cubic-bezier(0.215, 0.610, 0.355, 1.000)', type: 'Penner Equations (approximated)'},
							{label:'easeOutQuint', name: 'cubic-bezier(0.230, 1.000, 0.320, 1.000)', type: 'Penner Equations (approximated)'},
							{label:'easeOutSine', name: 'cubic-bezier(0.390, 0.575, 0.565, 1.000)', type: 'Penner Equations (approximated)'},
							{label:'easeOutExpo', name: 'cubic-bezier(0.190, 1.000, 0.220, 1.000)', type: 'Penner Equations (approximated)'},
							{label:'easeOutCirc', name: 'cubic-bezier(0.075, 0.820, 0.165, 1.000)', type: 'Penner Equations (approximated)'},
							{label:'easeOutBack', name: 'cubic-bezier(0.175, 0.885, 0.320, 1.275)', type: 'Penner Equations (approximated)'},
							{label:'easeInOutQuad', name: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)', type: 'Penner Equations (approximated)'},
							{label:'easeInOutCubic', name: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)', type: 'Penner Equations (approximated)'}
						]
					},
					videos: [
						{label: 'Youtube', name: 'youtube'},
						{label: 'Vimeo', name: 'vimeo'},
						{label: 'Hosting', name: 'hosting'}
					],
					yesno: [
						{label: 'Yes', name: 1},
						{label: 'No', name: 0}
					]
				},
				'slides':{
					name: 'slides',
					title: 'Slides',
					icon: 'dashicons dashicons-images-alt',
					list: [
						{name: 'image', icon: 'awsicon awsicon-format-image x1', label: 'Image'},
						{name: 'video', icon: 'awsicon awsicon-format-video x1', label: 'Video'},
						{name: 'text', icon: 'awsicon awsicon-editor-paste-text x1', label: 'Text'}
					]
				},
				'setting':{
					name: 'setting',
					title: 'Setting',
					icon: 'awsicon awsicon-setting'
				},
			});
		
		app.init = function(){
			
			angular.bootstrap(document, ['awsslideshow']);
		};
		
	return app;
});
/*! iScroll v5.1.3 ~ (c) 2008-2014 Matteo Spinelli ~ http://cubiq.org/license */
(function (window, document, Math) {
var rAF = window.requestAnimationFrame	||
	window.webkitRequestAnimationFrame	||
	window.mozRequestAnimationFrame		||
	window.oRequestAnimationFrame		||
	window.msRequestAnimationFrame		||
	function (callback) { window.setTimeout(callback, 1000 / 60); };

var utils = (function () {
	var me = {};

	var _elementStyle = document.createElement('div').style;
	var _vendor = (function () {
		var vendors = ['t', 'webkitT', 'MozT', 'msT', 'OT'],
			transform,
			i = 0,
			l = vendors.length;

		for ( ; i < l; i++ ) {
			transform = vendors[i] + 'ransform';
			if ( transform in _elementStyle ) return vendors[i].substr(0, vendors[i].length-1);
		}

		return false;
	})();

	function _prefixStyle (style) {
		if ( _vendor === false ) return false;
		if ( _vendor === '' ) return style;
		return _vendor + style.charAt(0).toUpperCase() + style.substr(1);
	}

	me.getTime = Date.now || function getTime () { return new Date().getTime(); };

	me.extend = function (target, obj) {
		for ( var i in obj ) {
			target[i] = obj[i];
		}
	};

	me.addEvent = function (el, type, fn, capture) {
		el.addEventListener(type, fn, !!capture);
	};

	me.removeEvent = function (el, type, fn, capture) {
		el.removeEventListener(type, fn, !!capture);
	};

	me.prefixPointerEvent = function (pointerEvent) {
		return window.MSPointerEvent ? 
			'MSPointer' + pointerEvent.charAt(9).toUpperCase() + pointerEvent.substr(10):
			pointerEvent;
	};

	me.momentum = function (current, start, time, lowerMargin, wrapperSize, deceleration) {
		var distance = current - start,
			speed = Math.abs(distance) / time,
			destination,
			duration;

		deceleration = deceleration === undefined ? 0.0006 : deceleration;

		destination = current + ( speed * speed ) / ( 2 * deceleration ) * ( distance < 0 ? -1 : 1 );
		duration = speed / deceleration;

		if ( destination < lowerMargin ) {
			destination = wrapperSize ? lowerMargin - ( wrapperSize / 2.5 * ( speed / 8 ) ) : lowerMargin;
			distance = Math.abs(destination - current);
			duration = distance / speed;
		} else if ( destination > 0 ) {
			destination = wrapperSize ? wrapperSize / 2.5 * ( speed / 8 ) : 0;
			distance = Math.abs(current) + destination;
			duration = distance / speed;
		}

		return {
			destination: Math.round(destination),
			duration: duration
		};
	};

	var _transform = _prefixStyle('transform');

	me.extend(me, {
		hasTransform: _transform !== false,
		hasPerspective: _prefixStyle('perspective') in _elementStyle,
		hasTouch: 'ontouchstart' in window,
		hasPointer: window.PointerEvent || window.MSPointerEvent, // IE10 is prefixed
		hasTransition: _prefixStyle('transition') in _elementStyle
	});

	// This should find all Android browsers lower than build 535.19 (both stock browser and webview)
	me.isBadAndroid = /Android /.test(window.navigator.appVersion) && !(/Chrome\/\d/.test(window.navigator.appVersion));

	me.extend(me.style = {}, {
		transform: _transform,
		transitionTimingFunction: _prefixStyle('transitionTimingFunction'),
		transitionDuration: _prefixStyle('transitionDuration'),
		transitionDelay: _prefixStyle('transitionDelay'),
		transformOrigin: _prefixStyle('transformOrigin')
	});

	me.hasClass = function (e, c) {
		var re = new RegExp("(^|\\s)" + c + "(\\s|$)");
		return re.test(e.className);
	};

	me.addClass = function (e, c) {
		if ( me.hasClass(e, c) ) {
			return;
		}

		var newclass = e.className.split(' ');
		newclass.push(c);
		e.className = newclass.join(' ');
	};

	me.removeClass = function (e, c) {
		if ( !me.hasClass(e, c) ) {
			return;
		}

		var re = new RegExp("(^|\\s)" + c + "(\\s|$)", 'g');
		e.className = e.className.replace(re, ' ');
	};

	me.offset = function (el) {
		var left = -el.offsetLeft,
			top = -el.offsetTop;

		// jshint -W084
		while (el = el.offsetParent) {
			left -= el.offsetLeft;
			top -= el.offsetTop;
		}
		// jshint +W084

		return {
			left: left,
			top: top
		};
	};

	me.preventDefaultException = function (el, exceptions) {
		for ( var i in exceptions ) {
			if ( exceptions[i].test(el[i]) ) {
				return true;
			}
		}

		return false;
	};

	me.extend(me.eventType = {}, {
		touchstart: 1,
		touchmove: 1,
		touchend: 1,

		mousedown: 2,
		mousemove: 2,
		mouseup: 2,

		pointerdown: 3,
		pointermove: 3,
		pointerup: 3,

		MSPointerDown: 3,
		MSPointerMove: 3,
		MSPointerUp: 3
	});

	me.extend(me.ease = {}, {
		quadratic: {
			style: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)',
			fn: function (k) {
				return k * ( 2 - k );
			}
		},
		circular: {
			style: 'cubic-bezier(0.1, 0.57, 0.1, 1)',	// Not properly "circular" but this looks better, it should be (0.075, 0.82, 0.165, 1)
			fn: function (k) {
				return Math.sqrt( 1 - ( --k * k ) );
			}
		},
		back: {
			style: 'cubic-bezier(0.175, 0.885, 0.32, 1.275)',
			fn: function (k) {
				var b = 4;
				return ( k = k - 1 ) * k * ( ( b + 1 ) * k + b ) + 1;
			}
		},
		bounce: {
			style: '',
			fn: function (k) {
				if ( ( k /= 1 ) < ( 1 / 2.75 ) ) {
					return 7.5625 * k * k;
				} else if ( k < ( 2 / 2.75 ) ) {
					return 7.5625 * ( k -= ( 1.5 / 2.75 ) ) * k + 0.75;
				} else if ( k < ( 2.5 / 2.75 ) ) {
					return 7.5625 * ( k -= ( 2.25 / 2.75 ) ) * k + 0.9375;
				} else {
					return 7.5625 * ( k -= ( 2.625 / 2.75 ) ) * k + 0.984375;
				}
			}
		},
		elastic: {
			style: '',
			fn: function (k) {
				var f = 0.22,
					e = 0.4;

				if ( k === 0 ) { return 0; }
				if ( k == 1 ) { return 1; }

				return ( e * Math.pow( 2, - 10 * k ) * Math.sin( ( k - f / 4 ) * ( 2 * Math.PI ) / f ) + 1 );
			}
		}
	});

	me.tap = function (e, eventName) {
		var ev = document.createEvent('Event');
		ev.initEvent(eventName, true, true);
		ev.pageX = e.pageX;
		ev.pageY = e.pageY;
		e.target.dispatchEvent(ev);
	};

	me.click = function (e) {
		var target = e.target,
			ev;

		if ( !(/(SELECT|INPUT|TEXTAREA)/i).test(target.tagName) ) {
			ev = document.createEvent('MouseEvents');
			ev.initMouseEvent('click', true, true, e.view, 1,
				target.screenX, target.screenY, target.clientX, target.clientY,
				e.ctrlKey, e.altKey, e.shiftKey, e.metaKey,
				0, null);

			ev._constructed = true;
			target.dispatchEvent(ev);
		}
	};

	return me;
})();

function IScroll (el, options) {
	this.wrapper = typeof el == 'string' ? document.querySelector(el) : el;
	this.scroller = this.wrapper.children[0];
	this.scrollerStyle = this.scroller.style;		// cache style for better performance

	this.options = {

		resizeScrollbars: true,

		mouseWheelSpeed: 20,

		snapThreshold: 0.334,

// INSERT POINT: OPTIONS 

		startX: 0,
		startY: 0,
		scrollY: true,
		directionLockThreshold: 5,
		momentum: true,

		bounce: true,
		bounceTime: 600,
		bounceEasing: '',

		preventDefault: true,
		preventDefaultException: { tagName: /^(INPUT|TEXTAREA|BUTTON|SELECT)$/ },

		HWCompositing: true,
		useTransition: true,
		useTransform: true
	};

	for ( var i in options ) {
		this.options[i] = options[i];
	}

	// Normalize options
	this.translateZ = this.options.HWCompositing && utils.hasPerspective ? ' translateZ(0)' : '';

	this.options.useTransition = utils.hasTransition && this.options.useTransition;
	this.options.useTransform = utils.hasTransform && this.options.useTransform;

	this.options.eventPassthrough = this.options.eventPassthrough === true ? 'vertical' : this.options.eventPassthrough;
	this.options.preventDefault = !this.options.eventPassthrough && this.options.preventDefault;

	// If you want eventPassthrough I have to lock one of the axes
	this.options.scrollY = this.options.eventPassthrough == 'vertical' ? false : this.options.scrollY;
	this.options.scrollX = this.options.eventPassthrough == 'horizontal' ? false : this.options.scrollX;

	// With eventPassthrough we also need lockDirection mechanism
	this.options.freeScroll = this.options.freeScroll && !this.options.eventPassthrough;
	this.options.directionLockThreshold = this.options.eventPassthrough ? 0 : this.options.directionLockThreshold;

	this.options.bounceEasing = typeof this.options.bounceEasing == 'string' ? utils.ease[this.options.bounceEasing] || utils.ease.circular : this.options.bounceEasing;

	this.options.resizePolling = this.options.resizePolling === undefined ? 60 : this.options.resizePolling;

	if ( this.options.tap === true ) {
		this.options.tap = 'tap';
	}

	if ( this.options.shrinkScrollbars == 'scale' ) {
		this.options.useTransition = false;
	}

	this.options.invertWheelDirection = this.options.invertWheelDirection ? -1 : 1;

// INSERT POINT: NORMALIZATION

	// Some defaults	
	this.x = 0;
	this.y = 0;
	this.directionX = 0;
	this.directionY = 0;
	this._events = {};

// INSERT POINT: DEFAULTS

	this._init();
	this.refresh();

	this.scrollTo(this.options.startX, this.options.startY);
	this.enable();
}

IScroll.prototype = {
	version: '5.1.3',

	_init: function () {
		this._initEvents();

		if ( this.options.scrollbars || this.options.indicators ) {
			this._initIndicators();
		}

		if ( this.options.mouseWheel ) {
			this._initWheel();
		}

		if ( this.options.snap ) {
			this._initSnap();
		}

		if ( this.options.keyBindings ) {
			this._initKeys();
		}

// INSERT POINT: _init

	},

	destroy: function () {
		this._initEvents(true);

		this._execEvent('destroy');
	},

	_transitionEnd: function (e) {
		if ( e.target != this.scroller || !this.isInTransition ) {
			return;
		}

		this._transitionTime();
		if ( !this.resetPosition(this.options.bounceTime) ) {
			this.isInTransition = false;
			this._execEvent('scrollEnd');
		}
	},

	_start: function (e) {
		// React to left mouse button only
		if ( utils.eventType[e.type] != 1 ) {
			if ( e.button !== 0 ) {
				return;
			}
		}

		if ( !this.enabled || (this.initiated && utils.eventType[e.type] !== this.initiated) ) {
			return;
		}

		if ( this.options.preventDefault && !utils.isBadAndroid && !utils.preventDefaultException(e.target, this.options.preventDefaultException) ) {
			e.preventDefault();
		}

		var point = e.touches ? e.touches[0] : e,
			pos;

		this.initiated	= utils.eventType[e.type];
		this.moved		= false;
		this.distX		= 0;
		this.distY		= 0;
		this.directionX = 0;
		this.directionY = 0;
		this.directionLocked = 0;

		this._transitionTime();

		this.startTime = utils.getTime();

		if ( this.options.useTransition && this.isInTransition ) {
			this.isInTransition = false;
			pos = this.getComputedPosition();
			this._translate(Math.round(pos.x), Math.round(pos.y));
			this._execEvent('scrollEnd');
		} else if ( !this.options.useTransition && this.isAnimating ) {
			this.isAnimating = false;
			this._execEvent('scrollEnd');
		}

		this.startX    = this.x;
		this.startY    = this.y;
		this.absStartX = this.x;
		this.absStartY = this.y;
		this.pointX    = point.pageX;
		this.pointY    = point.pageY;

		this._execEvent('beforeScrollStart');
	},

	_move: function (e) {
		if ( !this.enabled || utils.eventType[e.type] !== this.initiated ) {
			return;
		}

		if ( this.options.preventDefault ) {	// increases performance on Android? TODO: check!
			e.preventDefault();
		}

		var point		= e.touches ? e.touches[0] : e,
			deltaX		= point.pageX - this.pointX,
			deltaY		= point.pageY - this.pointY,
			timestamp	= utils.getTime(),
			newX, newY,
			absDistX, absDistY;

		this.pointX		= point.pageX;
		this.pointY		= point.pageY;

		this.distX		+= deltaX;
		this.distY		+= deltaY;
		absDistX		= Math.abs(this.distX);
		absDistY		= Math.abs(this.distY);

		// We need to move at least 10 pixels for the scrolling to initiate
		if ( timestamp - this.endTime > 300 && (absDistX < 10 && absDistY < 10) ) {
			return;
		}

		// If you are scrolling in one direction lock the other
		if ( !this.directionLocked && !this.options.freeScroll ) {
			if ( absDistX > absDistY + this.options.directionLockThreshold ) {
				this.directionLocked = 'h';		// lock horizontally
			} else if ( absDistY >= absDistX + this.options.directionLockThreshold ) {
				this.directionLocked = 'v';		// lock vertically
			} else {
				this.directionLocked = 'n';		// no lock
			}
		}

		if ( this.directionLocked == 'h' ) {
			if ( this.options.eventPassthrough == 'vertical' ) {
				e.preventDefault();
			} else if ( this.options.eventPassthrough == 'horizontal' ) {
				this.initiated = false;
				return;
			}

			deltaY = 0;
		} else if ( this.directionLocked == 'v' ) {
			if ( this.options.eventPassthrough == 'horizontal' ) {
				e.preventDefault();
			} else if ( this.options.eventPassthrough == 'vertical' ) {
				this.initiated = false;
				return;
			}

			deltaX = 0;
		}

		deltaX = this.hasHorizontalScroll ? deltaX : 0;
		deltaY = this.hasVerticalScroll ? deltaY : 0;

		newX = this.x + deltaX;
		newY = this.y + deltaY;

		// Slow down if outside of the boundaries
		if ( newX > 0 || newX < this.maxScrollX ) {
			newX = this.options.bounce ? this.x + deltaX / 3 : newX > 0 ? 0 : this.maxScrollX;
		}
		if ( newY > 0 || newY < this.maxScrollY ) {
			newY = this.options.bounce ? this.y + deltaY / 3 : newY > 0 ? 0 : this.maxScrollY;
		}

		this.directionX = deltaX > 0 ? -1 : deltaX < 0 ? 1 : 0;
		this.directionY = deltaY > 0 ? -1 : deltaY < 0 ? 1 : 0;

		if ( !this.moved ) {
			this._execEvent('scrollStart');
		}

		this.moved = true;

		this._translate(newX, newY);

/* REPLACE START: _move */

		if ( timestamp - this.startTime > 300 ) {
			this.startTime = timestamp;
			this.startX = this.x;
			this.startY = this.y;
		}

/* REPLACE END: _move */

	},

	_end: function (e) {
		if ( !this.enabled || utils.eventType[e.type] !== this.initiated ) {
			return;
		}

		if ( this.options.preventDefault && !utils.preventDefaultException(e.target, this.options.preventDefaultException) ) {
			e.preventDefault();
		}

		var point = e.changedTouches ? e.changedTouches[0] : e,
			momentumX,
			momentumY,
			duration = utils.getTime() - this.startTime,
			newX = Math.round(this.x),
			newY = Math.round(this.y),
			distanceX = Math.abs(newX - this.startX),
			distanceY = Math.abs(newY - this.startY),
			time = 0,
			easing = '';

		this.isInTransition = 0;
		this.initiated = 0;
		this.endTime = utils.getTime();

		// reset if we are outside of the boundaries
		if ( this.resetPosition(this.options.bounceTime) ) {
			return;
		}

		this.scrollTo(newX, newY);	// ensures that the last position is rounded

		// we scrolled less than 10 pixels
		if ( !this.moved ) {
			if ( this.options.tap ) {
				utils.tap(e, this.options.tap);
			}

			if ( this.options.click ) {
				utils.click(e);
			}

			this._execEvent('scrollCancel');
			return;
		}

		if ( this._events.flick && duration < 200 && distanceX < 100 && distanceY < 100 ) {
			this._execEvent('flick');
			return;
		}

		// start momentum animation if needed
		if ( this.options.momentum && duration < 300 ) {
			momentumX = this.hasHorizontalScroll ? utils.momentum(this.x, this.startX, duration, this.maxScrollX, this.options.bounce ? this.wrapperWidth : 0, this.options.deceleration) : { destination: newX, duration: 0 };
			momentumY = this.hasVerticalScroll ? utils.momentum(this.y, this.startY, duration, this.maxScrollY, this.options.bounce ? this.wrapperHeight : 0, this.options.deceleration) : { destination: newY, duration: 0 };
			newX = momentumX.destination;
			newY = momentumY.destination;
			time = Math.max(momentumX.duration, momentumY.duration);
			this.isInTransition = 1;
		}


		if ( this.options.snap ) {
			var snap = this._nearestSnap(newX, newY);
			this.currentPage = snap;
			time = this.options.snapSpeed || Math.max(
					Math.max(
						Math.min(Math.abs(newX - snap.x), 1000),
						Math.min(Math.abs(newY - snap.y), 1000)
					), 300);
			newX = snap.x;
			newY = snap.y;

			this.directionX = 0;
			this.directionY = 0;
			easing = this.options.bounceEasing;
		}

// INSERT POINT: _end

		if ( newX != this.x || newY != this.y ) {
			// change easing function when scroller goes out of the boundaries
			if ( newX > 0 || newX < this.maxScrollX || newY > 0 || newY < this.maxScrollY ) {
				easing = utils.ease.quadratic;
			}

			this.scrollTo(newX, newY, time, easing);
			return;
		}

		this._execEvent('scrollEnd');
	},

	_resize: function () {
		var that = this;

		clearTimeout(this.resizeTimeout);

		this.resizeTimeout = setTimeout(function () {
			that.refresh();
		}, this.options.resizePolling);
	},

	resetPosition: function (time) {
		var x = this.x,
			y = this.y;

		time = time || 0;

		if ( !this.hasHorizontalScroll || this.x > 0 ) {
			x = 0;
		} else if ( this.x < this.maxScrollX ) {
			x = this.maxScrollX;
		}

		if ( !this.hasVerticalScroll || this.y > 0 ) {
			y = 0;
		} else if ( this.y < this.maxScrollY ) {
			y = this.maxScrollY;
		}

		if ( x == this.x && y == this.y ) {
			return false;
		}

		this.scrollTo(x, y, time, this.options.bounceEasing);

		return true;
	},

	disable: function () {
		this.enabled = false;
	},

	enable: function () {
		this.enabled = true;
	},

	refresh: function () {
		var rf = this.wrapper.offsetHeight;		// Force reflow

		this.wrapperWidth	= this.wrapper.clientWidth;
		this.wrapperHeight	= this.wrapper.clientHeight;

/* REPLACE START: refresh */

		this.scrollerWidth	= this.scroller.offsetWidth;
		this.scrollerHeight	= this.scroller.offsetHeight;

		this.maxScrollX		= this.wrapperWidth - this.scrollerWidth;
		this.maxScrollY		= this.wrapperHeight - this.scrollerHeight;

/* REPLACE END: refresh */

		this.hasHorizontalScroll	= this.options.scrollX && this.maxScrollX < 0;
		this.hasVerticalScroll		= this.options.scrollY && this.maxScrollY < 0;

		if ( !this.hasHorizontalScroll ) {
			this.maxScrollX = 0;
			this.scrollerWidth = this.wrapperWidth;
		}

		if ( !this.hasVerticalScroll ) {
			this.maxScrollY = 0;
			this.scrollerHeight = this.wrapperHeight;
		}

		this.endTime = 0;
		this.directionX = 0;
		this.directionY = 0;

		this.wrapperOffset = utils.offset(this.wrapper);

		this._execEvent('refresh');

		this.resetPosition();

// INSERT POINT: _refresh

	},

	on: function (type, fn) {
		if ( !this._events[type] ) {
			this._events[type] = [];
		}

		this._events[type].push(fn);
	},

	off: function (type, fn) {
		if ( !this._events[type] ) {
			return;
		}

		var index = this._events[type].indexOf(fn);

		if ( index > -1 ) {
			this._events[type].splice(index, 1);
		}
	},

	_execEvent: function (type) {
		if ( !this._events[type] ) {
			return;
		}

		var i = 0,
			l = this._events[type].length;

		if ( !l ) {
			return;
		}

		for ( ; i < l; i++ ) {
			this._events[type][i].apply(this, [].slice.call(arguments, 1));
		}
	},

	scrollBy: function (x, y, time, easing) {
		x = this.x + x;
		y = this.y + y;
		time = time || 0;

		this.scrollTo(x, y, time, easing);
	},

	scrollTo: function (x, y, time, easing) {
		easing = easing || utils.ease.circular;

		this.isInTransition = this.options.useTransition && time > 0;

		if ( !time || (this.options.useTransition && easing.style) ) {
			this._transitionTimingFunction(easing.style);
			this._transitionTime(time);
			this._translate(x, y);
		} else {
			this._animate(x, y, time, easing.fn);
		}
	},

	scrollToElement: function (el, time, offsetX, offsetY, easing) {
		el = el.nodeType ? el : this.scroller.querySelector(el);

		if ( !el ) {
			return;
		}

		var pos = utils.offset(el);

		pos.left -= this.wrapperOffset.left;
		pos.top  -= this.wrapperOffset.top;

		// if offsetX/Y are true we center the element to the screen
		if ( offsetX === true ) {
			offsetX = Math.round(el.offsetWidth / 2 - this.wrapper.offsetWidth / 2);
		}
		if ( offsetY === true ) {
			offsetY = Math.round(el.offsetHeight / 2 - this.wrapper.offsetHeight / 2);
		}

		pos.left -= offsetX || 0;
		pos.top  -= offsetY || 0;

		pos.left = pos.left > 0 ? 0 : pos.left < this.maxScrollX ? this.maxScrollX : pos.left;
		pos.top  = pos.top  > 0 ? 0 : pos.top  < this.maxScrollY ? this.maxScrollY : pos.top;

		time = time === undefined || time === null || time === 'auto' ? Math.max(Math.abs(this.x-pos.left), Math.abs(this.y-pos.top)) : time;

		this.scrollTo(pos.left, pos.top, time, easing);
	},

	_transitionTime: function (time) {
		time = time || 0;

		this.scrollerStyle[utils.style.transitionDuration] = time + 'ms';

		if ( !time && utils.isBadAndroid ) {
			this.scrollerStyle[utils.style.transitionDuration] = '0.001s';
		}


		if ( this.indicators ) {
			for ( var i = this.indicators.length; i--; ) {
				this.indicators[i].transitionTime(time);
			}
		}


// INSERT POINT: _transitionTime

	},

	_transitionTimingFunction: function (easing) {
		this.scrollerStyle[utils.style.transitionTimingFunction] = easing;


		if ( this.indicators ) {
			for ( var i = this.indicators.length; i--; ) {
				this.indicators[i].transitionTimingFunction(easing);
			}
		}


// INSERT POINT: _transitionTimingFunction

	},

	_translate: function (x, y) {
		if ( this.options.useTransform ) {

/* REPLACE START: _translate */

			this.scrollerStyle[utils.style.transform] = 'translate(' + x + 'px,' + y + 'px)' + this.translateZ;

/* REPLACE END: _translate */

		} else {
			x = Math.round(x);
			y = Math.round(y);
			this.scrollerStyle.left = x + 'px';
			this.scrollerStyle.top = y + 'px';
		}

		this.x = x;
		this.y = y;


	if ( this.indicators ) {
		for ( var i = this.indicators.length; i--; ) {
			this.indicators[i].updatePosition();
		}
	}


// INSERT POINT: _translate

	},

	_initEvents: function (remove) {
		var eventType = remove ? utils.removeEvent : utils.addEvent,
			target = this.options.bindToWrapper ? this.wrapper : window;

		eventType(window, 'orientationchange', this);
		eventType(window, 'resize', this);

		if ( this.options.click ) {
			eventType(this.wrapper, 'click', this, true);
		}

		if ( !this.options.disableMouse ) {
			eventType(this.wrapper, 'mousedown', this);
			eventType(target, 'mousemove', this);
			eventType(target, 'mousecancel', this);
			eventType(target, 'mouseup', this);
		}

		if ( utils.hasPointer && !this.options.disablePointer ) {
			eventType(this.wrapper, utils.prefixPointerEvent('pointerdown'), this);
			eventType(target, utils.prefixPointerEvent('pointermove'), this);
			eventType(target, utils.prefixPointerEvent('pointercancel'), this);
			eventType(target, utils.prefixPointerEvent('pointerup'), this);
		}

		if ( utils.hasTouch && !this.options.disableTouch ) {
			eventType(this.wrapper, 'touchstart', this);
			eventType(target, 'touchmove', this);
			eventType(target, 'touchcancel', this);
			eventType(target, 'touchend', this);
		}

		eventType(this.scroller, 'transitionend', this);
		eventType(this.scroller, 'webkitTransitionEnd', this);
		eventType(this.scroller, 'oTransitionEnd', this);
		eventType(this.scroller, 'MSTransitionEnd', this);
	},

	getComputedPosition: function () {
		var matrix = window.getComputedStyle(this.scroller, null),
			x, y;

		if ( this.options.useTransform ) {
			matrix = matrix[utils.style.transform].split(')')[0].split(', ');
			x = +(matrix[12] || matrix[4]);
			y = +(matrix[13] || matrix[5]);
		} else {
			x = +matrix.left.replace(/[^-\d.]/g, '');
			y = +matrix.top.replace(/[^-\d.]/g, '');
		}

		return { x: x, y: y };
	},

	_initIndicators: function () {
		var interactive = this.options.interactiveScrollbars,
			customStyle = typeof this.options.scrollbars != 'string',
			indicators = [],
			indicator;

		var that = this;

		this.indicators = [];

		if ( this.options.scrollbars ) {
			// Vertical scrollbar
			if ( this.options.scrollY ) {
				indicator = {
					el: createDefaultScrollbar('v', interactive, this.options.scrollbars),
					interactive: interactive,
					defaultScrollbars: true,
					customStyle: customStyle,
					resize: this.options.resizeScrollbars,
					shrink: this.options.shrinkScrollbars,
					fade: this.options.fadeScrollbars,
					listenX: false
				};

				this.wrapper.appendChild(indicator.el);
				indicators.push(indicator);
			}

			// Horizontal scrollbar
			if ( this.options.scrollX ) {
				indicator = {
					el: createDefaultScrollbar('h', interactive, this.options.scrollbars),
					interactive: interactive,
					defaultScrollbars: true,
					customStyle: customStyle,
					resize: this.options.resizeScrollbars,
					shrink: this.options.shrinkScrollbars,
					fade: this.options.fadeScrollbars,
					listenY: false
				};

				this.wrapper.appendChild(indicator.el);
				indicators.push(indicator);
			}
		}

		if ( this.options.indicators ) {
			// TODO: check concat compatibility
			indicators = indicators.concat(this.options.indicators);
		}

		for ( var i = indicators.length; i--; ) {
			this.indicators.push( new Indicator(this, indicators[i]) );
		}

		// TODO: check if we can use array.map (wide compatibility and performance issues)
		function _indicatorsMap (fn) {
			for ( var i = that.indicators.length; i--; ) {
				fn.call(that.indicators[i]);
			}
		}

		if ( this.options.fadeScrollbars ) {
			this.on('scrollEnd', function () {
				_indicatorsMap(function () {
					this.fade();
				});
			});

			this.on('scrollCancel', function () {
				_indicatorsMap(function () {
					this.fade();
				});
			});

			this.on('scrollStart', function () {
				_indicatorsMap(function () {
					this.fade(1);
				});
			});

			this.on('beforeScrollStart', function () {
				_indicatorsMap(function () {
					this.fade(1, true);
				});
			});
		}


		this.on('refresh', function () {
			_indicatorsMap(function () {
				this.refresh();
			});
		});

		this.on('destroy', function () {
			_indicatorsMap(function () {
				this.destroy();
			});

			delete this.indicators;
		});
	},

	_initWheel: function () {
		utils.addEvent(this.wrapper, 'wheel', this);
		utils.addEvent(this.wrapper, 'mousewheel', this);
		utils.addEvent(this.wrapper, 'DOMMouseScroll', this);

		this.on('destroy', function () {
			utils.removeEvent(this.wrapper, 'wheel', this);
			utils.removeEvent(this.wrapper, 'mousewheel', this);
			utils.removeEvent(this.wrapper, 'DOMMouseScroll', this);
		});
	},

	_wheel: function (e) {
		if ( !this.enabled ) {
			return;
		}

		e.preventDefault();
		e.stopPropagation();

		var wheelDeltaX, wheelDeltaY,
			newX, newY,
			that = this;

		if ( this.wheelTimeout === undefined ) {
			that._execEvent('scrollStart');
		}

		// Execute the scrollEnd event after 400ms the wheel stopped scrolling
		clearTimeout(this.wheelTimeout);
		this.wheelTimeout = setTimeout(function () {
			that._execEvent('scrollEnd');
			that.wheelTimeout = undefined;
		}, 400);

		if ( 'deltaX' in e ) {
			if (e.deltaMode === 1) {
				wheelDeltaX = -e.deltaX * this.options.mouseWheelSpeed;
				wheelDeltaY = -e.deltaY * this.options.mouseWheelSpeed;
			} else {
				wheelDeltaX = -e.deltaX;
				wheelDeltaY = -e.deltaY;
			}
		} else if ( 'wheelDeltaX' in e ) {
			wheelDeltaX = e.wheelDeltaX / 120 * this.options.mouseWheelSpeed;
			wheelDeltaY = e.wheelDeltaY / 120 * this.options.mouseWheelSpeed;
		} else if ( 'wheelDelta' in e ) {
			wheelDeltaX = wheelDeltaY = e.wheelDelta / 120 * this.options.mouseWheelSpeed;
		} else if ( 'detail' in e ) {
			wheelDeltaX = wheelDeltaY = -e.detail / 3 * this.options.mouseWheelSpeed;
		} else {
			return;
		}

		wheelDeltaX *= this.options.invertWheelDirection;
		wheelDeltaY *= this.options.invertWheelDirection;

		if ( !this.hasVerticalScroll ) {
			wheelDeltaX = wheelDeltaY;
			wheelDeltaY = 0;
		}

		if ( this.options.snap ) {
			newX = this.currentPage.pageX;
			newY = this.currentPage.pageY;

			if ( wheelDeltaX > 0 ) {
				newX--;
			} else if ( wheelDeltaX < 0 ) {
				newX++;
			}

			if ( wheelDeltaY > 0 ) {
				newY--;
			} else if ( wheelDeltaY < 0 ) {
				newY++;
			}

			this.goToPage(newX, newY);

			return;
		}

		newX = this.x + Math.round(this.hasHorizontalScroll ? wheelDeltaX : 0);
		newY = this.y + Math.round(this.hasVerticalScroll ? wheelDeltaY : 0);

		if ( newX > 0 ) {
			newX = 0;
		} else if ( newX < this.maxScrollX ) {
			newX = this.maxScrollX;
		}

		if ( newY > 0 ) {
			newY = 0;
		} else if ( newY < this.maxScrollY ) {
			newY = this.maxScrollY;
		}

		this.scrollTo(newX, newY, 0);

// INSERT POINT: _wheel
	},

	_initSnap: function () {
		this.currentPage = {};

		if ( typeof this.options.snap == 'string' ) {
			this.options.snap = this.scroller.querySelectorAll(this.options.snap);
		}

		this.on('refresh', function () {
			var i = 0, l,
				m = 0, n,
				cx, cy,
				x = 0, y,
				stepX = this.options.snapStepX || this.wrapperWidth,
				stepY = this.options.snapStepY || this.wrapperHeight,
				el;

			this.pages = [];

			if ( !this.wrapperWidth || !this.wrapperHeight || !this.scrollerWidth || !this.scrollerHeight ) {
				return;
			}

			if ( this.options.snap === true ) {
				cx = Math.round( stepX / 2 );
				cy = Math.round( stepY / 2 );

				while ( x > -this.scrollerWidth ) {
					this.pages[i] = [];
					l = 0;
					y = 0;

					while ( y > -this.scrollerHeight ) {
						this.pages[i][l] = {
							x: Math.max(x, this.maxScrollX),
							y: Math.max(y, this.maxScrollY),
							width: stepX,
							height: stepY,
							cx: x - cx,
							cy: y - cy
						};

						y -= stepY;
						l++;
					}

					x -= stepX;
					i++;
				}
			} else {
				el = this.options.snap;
				l = el.length;
				n = -1;

				for ( ; i < l; i++ ) {
					if ( i === 0 || el[i].offsetLeft <= el[i-1].offsetLeft ) {
						m = 0;
						n++;
					}

					if ( !this.pages[m] ) {
						this.pages[m] = [];
					}

					x = Math.max(-el[i].offsetLeft, this.maxScrollX);
					y = Math.max(-el[i].offsetTop, this.maxScrollY);
					cx = x - Math.round(el[i].offsetWidth / 2);
					cy = y - Math.round(el[i].offsetHeight / 2);

					this.pages[m][n] = {
						x: x,
						y: y,
						width: el[i].offsetWidth,
						height: el[i].offsetHeight,
						cx: cx,
						cy: cy
					};

					if ( x > this.maxScrollX ) {
						m++;
					}
				}
			}

			this.goToPage(this.currentPage.pageX || 0, this.currentPage.pageY || 0, 0);

			// Update snap threshold if needed
			if ( this.options.snapThreshold % 1 === 0 ) {
				this.snapThresholdX = this.options.snapThreshold;
				this.snapThresholdY = this.options.snapThreshold;
			} else {
				this.snapThresholdX = Math.round(this.pages[this.currentPage.pageX][this.currentPage.pageY].width * this.options.snapThreshold);
				this.snapThresholdY = Math.round(this.pages[this.currentPage.pageX][this.currentPage.pageY].height * this.options.snapThreshold);
			}
		});

		this.on('flick', function () {
			var time = this.options.snapSpeed || Math.max(
					Math.max(
						Math.min(Math.abs(this.x - this.startX), 1000),
						Math.min(Math.abs(this.y - this.startY), 1000)
					), 300);

			this.goToPage(
				this.currentPage.pageX + this.directionX,
				this.currentPage.pageY + this.directionY,
				time
			);
		});
	},

	_nearestSnap: function (x, y) {
		if ( !this.pages.length ) {
			return { x: 0, y: 0, pageX: 0, pageY: 0 };
		}

		var i = 0,
			l = this.pages.length,
			m = 0;

		// Check if we exceeded the snap threshold
		if ( Math.abs(x - this.absStartX) < this.snapThresholdX &&
			Math.abs(y - this.absStartY) < this.snapThresholdY ) {
			return this.currentPage;
		}

		if ( x > 0 ) {
			x = 0;
		} else if ( x < this.maxScrollX ) {
			x = this.maxScrollX;
		}

		if ( y > 0 ) {
			y = 0;
		} else if ( y < this.maxScrollY ) {
			y = this.maxScrollY;
		}

		for ( ; i < l; i++ ) {
			if ( x >= this.pages[i][0].cx ) {
				x = this.pages[i][0].x;
				break;
			}
		}

		l = this.pages[i].length;

		for ( ; m < l; m++ ) {
			if ( y >= this.pages[0][m].cy ) {
				y = this.pages[0][m].y;
				break;
			}
		}

		if ( i == this.currentPage.pageX ) {
			i += this.directionX;

			if ( i < 0 ) {
				i = 0;
			} else if ( i >= this.pages.length ) {
				i = this.pages.length - 1;
			}

			x = this.pages[i][0].x;
		}

		if ( m == this.currentPage.pageY ) {
			m += this.directionY;

			if ( m < 0 ) {
				m = 0;
			} else if ( m >= this.pages[0].length ) {
				m = this.pages[0].length - 1;
			}

			y = this.pages[0][m].y;
		}

		return {
			x: x,
			y: y,
			pageX: i,
			pageY: m
		};
	},

	goToPage: function (x, y, time, easing) {
		easing = easing || this.options.bounceEasing;

		if ( x >= this.pages.length ) {
			x = this.pages.length - 1;
		} else if ( x < 0 ) {
			x = 0;
		}

		if ( y >= this.pages[x].length ) {
			y = this.pages[x].length - 1;
		} else if ( y < 0 ) {
			y = 0;
		}

		var posX = this.pages[x][y].x,
			posY = this.pages[x][y].y;

		time = time === undefined ? this.options.snapSpeed || Math.max(
			Math.max(
				Math.min(Math.abs(posX - this.x), 1000),
				Math.min(Math.abs(posY - this.y), 1000)
			), 300) : time;

		this.currentPage = {
			x: posX,
			y: posY,
			pageX: x,
			pageY: y
		};

		this.scrollTo(posX, posY, time, easing);
	},

	next: function (time, easing) {
		var x = this.currentPage.pageX,
			y = this.currentPage.pageY;

		x++;

		if ( x >= this.pages.length && this.hasVerticalScroll ) {
			x = 0;
			y++;
		}

		this.goToPage(x, y, time, easing);
	},

	prev: function (time, easing) {
		var x = this.currentPage.pageX,
			y = this.currentPage.pageY;

		x--;

		if ( x < 0 && this.hasVerticalScroll ) {
			x = 0;
			y--;
		}

		this.goToPage(x, y, time, easing);
	},

	_initKeys: function (e) {
		// default key bindings
		var keys = {
			pageUp: 33,
			pageDown: 34,
			end: 35,
			home: 36,
			left: 37,
			up: 38,
			right: 39,
			down: 40
		};
		var i;

		// if you give me characters I give you keycode
		if ( typeof this.options.keyBindings == 'object' ) {
			for ( i in this.options.keyBindings ) {
				if ( typeof this.options.keyBindings[i] == 'string' ) {
					this.options.keyBindings[i] = this.options.keyBindings[i].toUpperCase().charCodeAt(0);
				}
			}
		} else {
			this.options.keyBindings = {};
		}

		for ( i in keys ) {
			this.options.keyBindings[i] = this.options.keyBindings[i] || keys[i];
		}

		utils.addEvent(window, 'keydown', this);

		this.on('destroy', function () {
			utils.removeEvent(window, 'keydown', this);
		});
	},

	_key: function (e) {
		if ( !this.enabled ) {
			return;
		}

		var snap = this.options.snap,	// we are using this alot, better to cache it
			newX = snap ? this.currentPage.pageX : this.x,
			newY = snap ? this.currentPage.pageY : this.y,
			now = utils.getTime(),
			prevTime = this.keyTime || 0,
			acceleration = 0.250,
			pos;

		if ( this.options.useTransition && this.isInTransition ) {
			pos = this.getComputedPosition();

			this._translate(Math.round(pos.x), Math.round(pos.y));
			this.isInTransition = false;
		}

		this.keyAcceleration = now - prevTime < 200 ? Math.min(this.keyAcceleration + acceleration, 50) : 0;

		switch ( e.keyCode ) {
			case this.options.keyBindings.pageUp:
				if ( this.hasHorizontalScroll && !this.hasVerticalScroll ) {
					newX += snap ? 1 : this.wrapperWidth;
				} else {
					newY += snap ? 1 : this.wrapperHeight;
				}
				break;
			case this.options.keyBindings.pageDown:
				if ( this.hasHorizontalScroll && !this.hasVerticalScroll ) {
					newX -= snap ? 1 : this.wrapperWidth;
				} else {
					newY -= snap ? 1 : this.wrapperHeight;
				}
				break;
			case this.options.keyBindings.end:
				newX = snap ? this.pages.length-1 : this.maxScrollX;
				newY = snap ? this.pages[0].length-1 : this.maxScrollY;
				break;
			case this.options.keyBindings.home:
				newX = 0;
				newY = 0;
				break;
			case this.options.keyBindings.left:
				newX += snap ? -1 : 5 + this.keyAcceleration>>0;
				break;
			case this.options.keyBindings.up:
				newY += snap ? 1 : 5 + this.keyAcceleration>>0;
				break;
			case this.options.keyBindings.right:
				newX -= snap ? -1 : 5 + this.keyAcceleration>>0;
				break;
			case this.options.keyBindings.down:
				newY -= snap ? 1 : 5 + this.keyAcceleration>>0;
				break;
			default:
				return;
		}

		if ( snap ) {
			this.goToPage(newX, newY);
			return;
		}

		if ( newX > 0 ) {
			newX = 0;
			this.keyAcceleration = 0;
		} else if ( newX < this.maxScrollX ) {
			newX = this.maxScrollX;
			this.keyAcceleration = 0;
		}

		if ( newY > 0 ) {
			newY = 0;
			this.keyAcceleration = 0;
		} else if ( newY < this.maxScrollY ) {
			newY = this.maxScrollY;
			this.keyAcceleration = 0;
		}

		this.scrollTo(newX, newY, 0);

		this.keyTime = now;
	},

	_animate: function (destX, destY, duration, easingFn) {
		var that = this,
			startX = this.x,
			startY = this.y,
			startTime = utils.getTime(),
			destTime = startTime + duration;

		function step () {
			var now = utils.getTime(),
				newX, newY,
				easing;

			if ( now >= destTime ) {
				that.isAnimating = false;
				that._translate(destX, destY);

				if ( !that.resetPosition(that.options.bounceTime) ) {
					that._execEvent('scrollEnd');
				}

				return;
			}

			now = ( now - startTime ) / duration;
			easing = easingFn(now);
			newX = ( destX - startX ) * easing + startX;
			newY = ( destY - startY ) * easing + startY;
			that._translate(newX, newY);

			if ( that.isAnimating ) {
				rAF(step);
			}
		}

		this.isAnimating = true;
		step();
	},
	handleEvent: function (e) {
		switch ( e.type ) {
			case 'touchstart':
			case 'pointerdown':
			case 'MSPointerDown':
			case 'mousedown':
				this._start(e);
				break;
			case 'touchmove':
			case 'pointermove':
			case 'MSPointerMove':
			case 'mousemove':
				this._move(e);
				break;
			case 'touchend':
			case 'pointerup':
			case 'MSPointerUp':
			case 'mouseup':
			case 'touchcancel':
			case 'pointercancel':
			case 'MSPointerCancel':
			case 'mousecancel':
				this._end(e);
				break;
			case 'orientationchange':
			case 'resize':
				this._resize();
				break;
			case 'transitionend':
			case 'webkitTransitionEnd':
			case 'oTransitionEnd':
			case 'MSTransitionEnd':
				this._transitionEnd(e);
				break;
			case 'wheel':
			case 'DOMMouseScroll':
			case 'mousewheel':
				this._wheel(e);
				break;
			case 'keydown':
				this._key(e);
				break;
			case 'click':
				if ( !e._constructed ) {
					e.preventDefault();
					e.stopPropagation();
				}
				break;
		}
	}
};
function createDefaultScrollbar (direction, interactive, type) {
	var scrollbar = document.createElement('div'),
		indicator = document.createElement('div');

	if ( type === true ) {
		scrollbar.style.cssText = 'position:absolute;z-index:9999';
		indicator.style.cssText = '-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:absolute;background:rgba(0,0,0,0.5);border:1px solid rgba(255,255,255,0.9);border-radius:3px';
	}

	indicator.className = 'iScrollIndicator';

	if ( direction == 'h' ) {
		if ( type === true ) {
			scrollbar.style.cssText += ';height:7px;left:2px;right:2px;bottom:0';
			indicator.style.height = '100%';
		}
		scrollbar.className = 'iScrollHorizontalScrollbar';
	} else {
		if ( type === true ) {
			scrollbar.style.cssText += ';width:7px;bottom:2px;top:2px;right:1px';
			indicator.style.width = '100%';
		}
		scrollbar.className = 'iScrollVerticalScrollbar';
	}

	scrollbar.style.cssText += ';overflow:hidden';

	if ( !interactive ) {
		scrollbar.style.pointerEvents = 'none';
	}

	scrollbar.appendChild(indicator);

	return scrollbar;
}

function Indicator (scroller, options) {
	this.wrapper = typeof options.el == 'string' ? document.querySelector(options.el) : options.el;
	this.wrapperStyle = this.wrapper.style;
	this.indicator = this.wrapper.children[0];
	this.indicatorStyle = this.indicator.style;
	this.scroller = scroller;

	this.options = {
		listenX: true,
		listenY: true,
		interactive: false,
		resize: true,
		defaultScrollbars: false,
		shrink: false,
		fade: false,
		speedRatioX: 0,
		speedRatioY: 0
	};

	for ( var i in options ) {
		this.options[i] = options[i];
	}

	this.sizeRatioX = 1;
	this.sizeRatioY = 1;
	this.maxPosX = 0;
	this.maxPosY = 0;

	if ( this.options.interactive ) {
		if ( !this.options.disableTouch ) {
			utils.addEvent(this.indicator, 'touchstart', this);
			utils.addEvent(window, 'touchend', this);
		}
		if ( !this.options.disablePointer ) {
			utils.addEvent(this.indicator, utils.prefixPointerEvent('pointerdown'), this);
			utils.addEvent(window, utils.prefixPointerEvent('pointerup'), this);
		}
		if ( !this.options.disableMouse ) {
			utils.addEvent(this.indicator, 'mousedown', this);
			utils.addEvent(window, 'mouseup', this);
		}
	}

	if ( this.options.fade ) {
		this.wrapperStyle[utils.style.transform] = this.scroller.translateZ;
		this.wrapperStyle[utils.style.transitionDuration] = utils.isBadAndroid ? '0.001s' : '0ms';
		this.wrapperStyle.opacity = '0';
	}
}

Indicator.prototype = {
	handleEvent: function (e) {
		switch ( e.type ) {
			case 'touchstart':
			case 'pointerdown':
			case 'MSPointerDown':
			case 'mousedown':
				this._start(e);
				break;
			case 'touchmove':
			case 'pointermove':
			case 'MSPointerMove':
			case 'mousemove':
				this._move(e);
				break;
			case 'touchend':
			case 'pointerup':
			case 'MSPointerUp':
			case 'mouseup':
			case 'touchcancel':
			case 'pointercancel':
			case 'MSPointerCancel':
			case 'mousecancel':
				this._end(e);
				break;
		}
	},

	destroy: function () {
		if ( this.options.interactive ) {
			utils.removeEvent(this.indicator, 'touchstart', this);
			utils.removeEvent(this.indicator, utils.prefixPointerEvent('pointerdown'), this);
			utils.removeEvent(this.indicator, 'mousedown', this);

			utils.removeEvent(window, 'touchmove', this);
			utils.removeEvent(window, utils.prefixPointerEvent('pointermove'), this);
			utils.removeEvent(window, 'mousemove', this);

			utils.removeEvent(window, 'touchend', this);
			utils.removeEvent(window, utils.prefixPointerEvent('pointerup'), this);
			utils.removeEvent(window, 'mouseup', this);
		}

		if ( this.options.defaultScrollbars ) {
			this.wrapper.parentNode.removeChild(this.wrapper);
		}
	},

	_start: function (e) {
		var point = e.touches ? e.touches[0] : e;

		e.preventDefault();
		e.stopPropagation();

		this.transitionTime();

		this.initiated = true;
		this.moved = false;
		this.lastPointX	= point.pageX;
		this.lastPointY	= point.pageY;

		this.startTime	= utils.getTime();

		if ( !this.options.disableTouch ) {
			utils.addEvent(window, 'touchmove', this);
		}
		if ( !this.options.disablePointer ) {
			utils.addEvent(window, utils.prefixPointerEvent('pointermove'), this);
		}
		if ( !this.options.disableMouse ) {
			utils.addEvent(window, 'mousemove', this);
		}

		this.scroller._execEvent('beforeScrollStart');
	},

	_move: function (e) {
		var point = e.touches ? e.touches[0] : e,
			deltaX, deltaY,
			newX, newY,
			timestamp = utils.getTime();

		if ( !this.moved ) {
			this.scroller._execEvent('scrollStart');
		}

		this.moved = true;

		deltaX = point.pageX - this.lastPointX;
		this.lastPointX = point.pageX;

		deltaY = point.pageY - this.lastPointY;
		this.lastPointY = point.pageY;

		newX = this.x + deltaX;
		newY = this.y + deltaY;

		this._pos(newX, newY);

// INSERT POINT: indicator._move

		e.preventDefault();
		e.stopPropagation();
	},

	_end: function (e) {
		if ( !this.initiated ) {
			return;
		}

		this.initiated = false;

		e.preventDefault();
		e.stopPropagation();

		utils.removeEvent(window, 'touchmove', this);
		utils.removeEvent(window, utils.prefixPointerEvent('pointermove'), this);
		utils.removeEvent(window, 'mousemove', this);

		if ( this.scroller.options.snap ) {
			var snap = this.scroller._nearestSnap(this.scroller.x, this.scroller.y);

			var time = this.options.snapSpeed || Math.max(
					Math.max(
						Math.min(Math.abs(this.scroller.x - snap.x), 1000),
						Math.min(Math.abs(this.scroller.y - snap.y), 1000)
					), 300);

			if ( this.scroller.x != snap.x || this.scroller.y != snap.y ) {
				this.scroller.directionX = 0;
				this.scroller.directionY = 0;
				this.scroller.currentPage = snap;
				this.scroller.scrollTo(snap.x, snap.y, time, this.scroller.options.bounceEasing);
			}
		}

		if ( this.moved ) {
			this.scroller._execEvent('scrollEnd');
		}
	},

	transitionTime: function (time) {
		time = time || 0;
		this.indicatorStyle[utils.style.transitionDuration] = time + 'ms';

		if ( !time && utils.isBadAndroid ) {
			this.indicatorStyle[utils.style.transitionDuration] = '0.001s';
		}
	},

	transitionTimingFunction: function (easing) {
		this.indicatorStyle[utils.style.transitionTimingFunction] = easing;
	},

	refresh: function () {
		this.transitionTime();

		if ( this.options.listenX && !this.options.listenY ) {
			this.indicatorStyle.display = this.scroller.hasHorizontalScroll ? 'block' : 'none';
		} else if ( this.options.listenY && !this.options.listenX ) {
			this.indicatorStyle.display = this.scroller.hasVerticalScroll ? 'block' : 'none';
		} else {
			this.indicatorStyle.display = this.scroller.hasHorizontalScroll || this.scroller.hasVerticalScroll ? 'block' : 'none';
		}

		if ( this.scroller.hasHorizontalScroll && this.scroller.hasVerticalScroll ) {
			utils.addClass(this.wrapper, 'iScrollBothScrollbars');
			utils.removeClass(this.wrapper, 'iScrollLoneScrollbar');

			if ( this.options.defaultScrollbars && this.options.customStyle ) {
				if ( this.options.listenX ) {
					this.wrapper.style.right = '8px';
				} else {
					this.wrapper.style.bottom = '8px';
				}
			}
		} else {
			utils.removeClass(this.wrapper, 'iScrollBothScrollbars');
			utils.addClass(this.wrapper, 'iScrollLoneScrollbar');

			if ( this.options.defaultScrollbars && this.options.customStyle ) {
				if ( this.options.listenX ) {
					this.wrapper.style.right = '2px';
				} else {
					this.wrapper.style.bottom = '2px';
				}
			}
		}

		var r = this.wrapper.offsetHeight;	// force refresh

		if ( this.options.listenX ) {
			this.wrapperWidth = this.wrapper.clientWidth;
			if ( this.options.resize ) {
				this.indicatorWidth = Math.max(Math.round(this.wrapperWidth * this.wrapperWidth / (this.scroller.scrollerWidth || this.wrapperWidth || 1)), 8);
				this.indicatorStyle.width = this.indicatorWidth + 'px';
			} else {
				this.indicatorWidth = this.indicator.clientWidth;
			}

			this.maxPosX = this.wrapperWidth - this.indicatorWidth;

			if ( this.options.shrink == 'clip' ) {
				this.minBoundaryX = -this.indicatorWidth + 8;
				this.maxBoundaryX = this.wrapperWidth - 8;
			} else {
				this.minBoundaryX = 0;
				this.maxBoundaryX = this.maxPosX;
			}

			this.sizeRatioX = this.options.speedRatioX || (this.scroller.maxScrollX && (this.maxPosX / this.scroller.maxScrollX));	
		}

		if ( this.options.listenY ) {
			this.wrapperHeight = this.wrapper.clientHeight;
			if ( this.options.resize ) {
				this.indicatorHeight = Math.max(Math.round(this.wrapperHeight * this.wrapperHeight / (this.scroller.scrollerHeight || this.wrapperHeight || 1)), 8);
				this.indicatorStyle.height = this.indicatorHeight + 'px';
			} else {
				this.indicatorHeight = this.indicator.clientHeight;
			}

			this.maxPosY = this.wrapperHeight - this.indicatorHeight;

			if ( this.options.shrink == 'clip' ) {
				this.minBoundaryY = -this.indicatorHeight + 8;
				this.maxBoundaryY = this.wrapperHeight - 8;
			} else {
				this.minBoundaryY = 0;
				this.maxBoundaryY = this.maxPosY;
			}

			this.maxPosY = this.wrapperHeight - this.indicatorHeight;
			this.sizeRatioY = this.options.speedRatioY || (this.scroller.maxScrollY && (this.maxPosY / this.scroller.maxScrollY));
		}

		this.updatePosition();
	},

	updatePosition: function () {
		var x = this.options.listenX && Math.round(this.sizeRatioX * this.scroller.x) || 0,
			y = this.options.listenY && Math.round(this.sizeRatioY * this.scroller.y) || 0;

		if ( !this.options.ignoreBoundaries ) {
			if ( x < this.minBoundaryX ) {
				if ( this.options.shrink == 'scale' ) {
					this.width = Math.max(this.indicatorWidth + x, 8);
					this.indicatorStyle.width = this.width + 'px';
				}
				x = this.minBoundaryX;
			} else if ( x > this.maxBoundaryX ) {
				if ( this.options.shrink == 'scale' ) {
					this.width = Math.max(this.indicatorWidth - (x - this.maxPosX), 8);
					this.indicatorStyle.width = this.width + 'px';
					x = this.maxPosX + this.indicatorWidth - this.width;
				} else {
					x = this.maxBoundaryX;
				}
			} else if ( this.options.shrink == 'scale' && this.width != this.indicatorWidth ) {
				this.width = this.indicatorWidth;
				this.indicatorStyle.width = this.width + 'px';
			}

			if ( y < this.minBoundaryY ) {
				if ( this.options.shrink == 'scale' ) {
					this.height = Math.max(this.indicatorHeight + y * 3, 8);
					this.indicatorStyle.height = this.height + 'px';
				}
				y = this.minBoundaryY;
			} else if ( y > this.maxBoundaryY ) {
				if ( this.options.shrink == 'scale' ) {
					this.height = Math.max(this.indicatorHeight - (y - this.maxPosY) * 3, 8);
					this.indicatorStyle.height = this.height + 'px';
					y = this.maxPosY + this.indicatorHeight - this.height;
				} else {
					y = this.maxBoundaryY;
				}
			} else if ( this.options.shrink == 'scale' && this.height != this.indicatorHeight ) {
				this.height = this.indicatorHeight;
				this.indicatorStyle.height = this.height + 'px';
			}
		}

		this.x = x;
		this.y = y;

		if ( this.scroller.options.useTransform ) {
			this.indicatorStyle[utils.style.transform] = 'translate(' + x + 'px,' + y + 'px)' + this.scroller.translateZ;
		} else {
			this.indicatorStyle.left = x + 'px';
			this.indicatorStyle.top = y + 'px';
		}
	},

	_pos: function (x, y) {
		if ( x < 0 ) {
			x = 0;
		} else if ( x > this.maxPosX ) {
			x = this.maxPosX;
		}

		if ( y < 0 ) {
			y = 0;
		} else if ( y > this.maxPosY ) {
			y = this.maxPosY;
		}

		x = this.options.listenX ? Math.round(x / this.sizeRatioX) : this.scroller.x;
		y = this.options.listenY ? Math.round(y / this.sizeRatioY) : this.scroller.y;

		this.scroller.scrollTo(x, y);
	},

	fade: function (val, hold) {
		if ( hold && !this.visible ) {
			return;
		}

		clearTimeout(this.fadeTimeout);
		this.fadeTimeout = null;

		var time = val ? 250 : 500,
			delay = val ? 0 : 300;

		val = val ? '1' : '0';

		this.wrapperStyle[utils.style.transitionDuration] = time + 'ms';

		this.fadeTimeout = setTimeout((function (val) {
			this.wrapperStyle.opacity = val;
			this.visible = +val;
		}).bind(this, val), delay);
	}
};

IScroll.utils = utils;

if ( typeof module != 'undefined' && module.exports ) {
	module.exports = IScroll;
} else {
	window.IScroll = IScroll;
}

})(window, document, Math);
define("iscroll", function(){});

/* mousetrap v1.4.6 craig.is/killing/mice */
(function(J,r,f){function s(a,b,d){a.addEventListener?a.addEventListener(b,d,!1):a.attachEvent("on"+b,d)}function A(a){if("keypress"==a.type){var b=String.fromCharCode(a.which);a.shiftKey||(b=b.toLowerCase());return b}return h[a.which]?h[a.which]:B[a.which]?B[a.which]:String.fromCharCode(a.which).toLowerCase()}function t(a){a=a||{};var b=!1,d;for(d in n)a[d]?b=!0:n[d]=0;b||(u=!1)}function C(a,b,d,c,e,v){var g,k,f=[],h=d.type;if(!l[a])return[];"keyup"==h&&w(a)&&(b=[a]);for(g=0;g<l[a].length;++g)if(k=
l[a][g],!(!c&&k.seq&&n[k.seq]!=k.level||h!=k.action||("keypress"!=h||d.metaKey||d.ctrlKey)&&b.sort().join(",")!==k.modifiers.sort().join(","))){var m=c&&k.seq==c&&k.level==v;(!c&&k.combo==e||m)&&l[a].splice(g,1);f.push(k)}return f}function K(a){var b=[];a.shiftKey&&b.push("shift");a.altKey&&b.push("alt");a.ctrlKey&&b.push("ctrl");a.metaKey&&b.push("meta");return b}function x(a,b,d,c){m.stopCallback(b,b.target||b.srcElement,d,c)||!1!==a(b,d)||(b.preventDefault?b.preventDefault():b.returnValue=!1,b.stopPropagation?
b.stopPropagation():b.cancelBubble=!0)}function y(a){"number"!==typeof a.which&&(a.which=a.keyCode);var b=A(a);b&&("keyup"==a.type&&z===b?z=!1:m.handleKey(b,K(a),a))}function w(a){return"shift"==a||"ctrl"==a||"alt"==a||"meta"==a}function L(a,b,d,c){function e(b){return function(){u=b;++n[a];clearTimeout(D);D=setTimeout(t,1E3)}}function v(b){x(d,b,a);"keyup"!==c&&(z=A(b));setTimeout(t,10)}for(var g=n[a]=0;g<b.length;++g){var f=g+1===b.length?v:e(c||E(b[g+1]).action);F(b[g],f,c,a,g)}}function E(a,b){var d,
c,e,f=[];d="+"===a?["+"]:a.split("+");for(e=0;e<d.length;++e)c=d[e],G[c]&&(c=G[c]),b&&"keypress"!=b&&H[c]&&(c=H[c],f.push("shift")),w(c)&&f.push(c);d=c;e=b;if(!e){if(!p){p={};for(var g in h)95<g&&112>g||h.hasOwnProperty(g)&&(p[h[g]]=g)}e=p[d]?"keydown":"keypress"}"keypress"==e&&f.length&&(e="keydown");return{key:c,modifiers:f,action:e}}function F(a,b,d,c,e){q[a+":"+d]=b;a=a.replace(/\s+/g," ");var f=a.split(" ");1<f.length?L(a,f,b,d):(d=E(a,d),l[d.key]=l[d.key]||[],C(d.key,d.modifiers,{type:d.action},
c,a,e),l[d.key][c?"unshift":"push"]({callback:b,modifiers:d.modifiers,action:d.action,seq:c,level:e,combo:a}))}var h={8:"backspace",9:"tab",13:"enter",16:"shift",17:"ctrl",18:"alt",20:"capslock",27:"esc",32:"space",33:"pageup",34:"pagedown",35:"end",36:"home",37:"left",38:"up",39:"right",40:"down",45:"ins",46:"del",91:"meta",93:"meta",224:"meta"},B={106:"*",107:"+",109:"-",110:".",111:"/",186:";",187:"=",188:",",189:"-",190:".",191:"/",192:"`",219:"[",220:"\\",221:"]",222:"'"},H={"~":"`","!":"1",
"@":"2","#":"3",$:"4","%":"5","^":"6","&":"7","*":"8","(":"9",")":"0",_:"-","+":"=",":":";",'"':"'","<":",",">":".","?":"/","|":"\\"},G={option:"alt",command:"meta","return":"enter",escape:"esc",mod:/Mac|iPod|iPhone|iPad/.test(navigator.platform)?"meta":"ctrl"},p,l={},q={},n={},D,z=!1,I=!1,u=!1;for(f=1;20>f;++f)h[111+f]="f"+f;for(f=0;9>=f;++f)h[f+96]=f;s(r,"keypress",y);s(r,"keydown",y);s(r,"keyup",y);var m={bind:function(a,b,d){a=a instanceof Array?a:[a];for(var c=0;c<a.length;++c)F(a[c],b,d);return this},
unbind:function(a,b){return m.bind(a,function(){},b)},trigger:function(a,b){if(q[a+":"+b])q[a+":"+b]({},a);return this},reset:function(){l={};q={};return this},stopCallback:function(a,b){return-1<(" "+b.className+" ").indexOf(" mousetrap ")?!1:"INPUT"==b.tagName||"SELECT"==b.tagName||"TEXTAREA"==b.tagName||b.isContentEditable},handleKey:function(a,b,d){var c=C(a,b,d),e;b={};var f=0,g=!1;for(e=0;e<c.length;++e)c[e].seq&&(f=Math.max(f,c[e].level));for(e=0;e<c.length;++e)c[e].seq?c[e].level==f&&(g=!0,
b[c[e].seq]=1,x(c[e].callback,d,c[e].combo,c[e].seq)):g||x(c[e].callback,d,c[e].combo);c="keypress"==d.type&&I;d.type!=u||w(a)||c||t(b);I=g&&"keydown"==d.type}};J.Mousetrap=m;"function"===typeof define&&define.amd&&define('mousetrap',m)})(window,document);

/* Modernizr 2.8.3 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-fontface-backgroundsize-borderimage-borderradius-boxshadow-flexbox-flexboxlegacy-hsla-multiplebgs-opacity-rgba-textshadow-cssanimations-csscolumns-generatedcontent-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-applicationcache-canvas-canvastext-draganddrop-hashchange-history-audio-video-indexeddb-input-inputtypes-localstorage-postmessage-sessionstorage-websockets-websqldatabase-webworkers-geolocation-inlinesvg-svg-touch-webgl-shiv-mq-cssclasses-addtest-prefixed-teststyles-testprop-testallprops-hasevent-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function D(a){j.cssText=a}function E(a,b){return D(n.join(a+";")+(b||""))}function F(a,b){return typeof a===b}function G(a,b){return!!~(""+a).indexOf(b)}function H(a,b){for(var d in a){var e=a[d];if(!G(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function I(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:F(f,"function")?f.bind(d||b):f}return!1}function J(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+p.join(d+" ")+d).split(" ");return F(b,"string")||F(b,"undefined")?H(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),I(e,b,c))}function K(){e.input=function(c){for(var d=0,e=c.length;d<e;d++)u[c[d]]=c[d]in k;return u.list&&(u.list=!!b.createElement("datalist")&&!!a.HTMLDataListElement),u}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)k.setAttribute("type",f=a[d]),e=k.type!=="text",e&&(k.value=l,k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&k.style.WebkitAppearance!==c?(g.appendChild(k),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(k,null).WebkitAppearance!=="textfield"&&k.offsetHeight!==0,g.removeChild(k)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=k.checkValidity&&k.checkValidity()===!1:e=k.value!=l)),t[a[d]]=!!e;return t}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.8.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k=b.createElement("input"),l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={svg:"http://www.w3.org/2000/svg"},s={},t={},u={},v=[],w=v.slice,x,y=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},z=function(b){var c=a.matchMedia||a.msMatchMedia;if(c)return c(b)&&c(b).matches||!1;var d;return y("@media "+b+" { #"+h+" { position: absolute; } }",function(b){d=(a.getComputedStyle?getComputedStyle(b,null):b.currentStyle)["position"]=="absolute"}),d},A=function(){function d(d,e){e=e||b.createElement(a[d]||"div"),d="on"+d;var f=d in e;return f||(e.setAttribute||(e=b.createElement("div")),e.setAttribute&&e.removeAttribute&&(e.setAttribute(d,""),f=F(e[d],"function"),F(e[d],"undefined")||(e[d]=c),e.removeAttribute(d))),e=null,f}var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return d}(),B={}.hasOwnProperty,C;!F(B,"undefined")&&!F(B.call,"undefined")?C=function(a,b){return B.call(a,b)}:C=function(a,b){return b in a&&F(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=w.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(w.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(w.call(arguments)))};return e}),s.flexbox=function(){return J("flexWrap")},s.flexboxlegacy=function(){return J("boxDirection")},s.canvas=function(){var a=b.createElement("canvas");return!!a.getContext&&!!a.getContext("2d")},s.canvastext=function(){return!!e.canvas&&!!F(b.createElement("canvas").getContext("2d").fillText,"function")},s.webgl=function(){return!!a.WebGLRenderingContext},s.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:y(["@media (",n.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},s.geolocation=function(){return"geolocation"in navigator},s.postmessage=function(){return!!a.postMessage},s.websqldatabase=function(){return!!a.openDatabase},s.indexedDB=function(){return!!J("indexedDB",a)},s.hashchange=function(){return A("hashchange",a)&&(b.documentMode===c||b.documentMode>7)},s.history=function(){return!!a.history&&!!history.pushState},s.draganddrop=function(){var a=b.createElement("div");return"draggable"in a||"ondragstart"in a&&"ondrop"in a},s.websockets=function(){return"WebSocket"in a||"MozWebSocket"in a},s.rgba=function(){return D("background-color:rgba(150,255,150,.5)"),G(j.backgroundColor,"rgba")},s.hsla=function(){return D("background-color:hsla(120,40%,100%,.5)"),G(j.backgroundColor,"rgba")||G(j.backgroundColor,"hsla")},s.multiplebgs=function(){return D("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(j.background)},s.backgroundsize=function(){return J("backgroundSize")},s.borderimage=function(){return J("borderImage")},s.borderradius=function(){return J("borderRadius")},s.boxshadow=function(){return J("boxShadow")},s.textshadow=function(){return b.createElement("div").style.textShadow===""},s.opacity=function(){return E("opacity:.55"),/^0.55$/.test(j.opacity)},s.cssanimations=function(){return J("animationName")},s.csscolumns=function(){return J("columnCount")},s.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return D((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),G(j.backgroundImage,"gradient")},s.cssreflections=function(){return J("boxReflect")},s.csstransforms=function(){return!!J("transform")},s.csstransforms3d=function(){var a=!!J("perspective");return a&&"webkitPerspective"in g.style&&y("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},s.csstransitions=function(){return J("transition")},s.fontface=function(){var a;return y('@font-face {font-family:"font";src:url("https://")}',function(c,d){var e=b.getElementById("smodernizr"),f=e.sheet||e.styleSheet,g=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"";a=/src/i.test(g)&&g.indexOf(d.split(" ")[0])===0}),a},s.generatedcontent=function(){var a;return y(["#",h,"{font:0/0 a}#",h,':after{content:"',l,'";visibility:hidden;font:3px/1 a}'].join(""),function(b){a=b.offsetHeight>=3}),a},s.video=function(){var a=b.createElement("video"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),c.h264=a.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),c.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,"")}catch(d){}return c},s.audio=function(){var a=b.createElement("audio"),c=!1;try{if(c=!!a.canPlayType)c=new Boolean(c),c.ogg=a.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),c.mp3=a.canPlayType("audio/mpeg;").replace(/^no$/,""),c.wav=a.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),c.m4a=(a.canPlayType("audio/x-m4a;")||a.canPlayType("audio/aac;")).replace(/^no$/,"")}catch(d){}return c},s.localstorage=function(){try{return localStorage.setItem(h,h),localStorage.removeItem(h),!0}catch(a){return!1}},s.sessionstorage=function(){try{return sessionStorage.setItem(h,h),sessionStorage.removeItem(h),!0}catch(a){return!1}},s.webworkers=function(){return!!a.Worker},s.applicationcache=function(){return!!a.applicationCache},s.svg=function(){return!!b.createElementNS&&!!b.createElementNS(r.svg,"svg").createSVGRect},s.inlinesvg=function(){var a=b.createElement("div");return a.innerHTML="<svg/>",(a.firstChild&&a.firstChild.namespaceURI)==r.svg};for(var L in s)C(s,L)&&(x=L.toLowerCase(),e[x]=s[L](),v.push((e[x]?"":"no-")+x));return e.input||K(),e.addTest=function(a,b){if(typeof a=="object")for(var d in a)C(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},D(""),i=k=null,function(a,b){function l(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function m(){var a=s.elements;return typeof a=="string"?a.split(" "):a}function n(a){var b=j[a[h]];return b||(b={},i++,a[h]=i,j[i]=b),b}function o(a,c,d){c||(c=b);if(k)return c.createElement(a);d||(d=n(c));var g;return d.cache[a]?g=d.cache[a].cloneNode():f.test(a)?g=(d.cache[a]=d.createElem(a)).cloneNode():g=d.createElem(a),g.canHaveChildren&&!e.test(a)&&!g.tagUrn?d.frag.appendChild(g):g}function p(a,c){a||(a=b);if(k)return a.createDocumentFragment();c=c||n(a);var d=c.frag.cloneNode(),e=0,f=m(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function q(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return s.shivMethods?o(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(s,b.frag)}function r(a){a||(a=b);var c=n(a);return s.shivCSS&&!g&&!c.hasCSS&&(c.hasCSS=!!l(a,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),k||q(a,c),a}var c="3.7.0",d=a.html5||{},e=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g,h="_html5shiv",i=0,j={},k;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",g="hidden"in a,k=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){g=!0,k=!0}})();var s={elements:d.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:c,shivCSS:d.shivCSS!==!1,supportsUnknownElements:k,shivMethods:d.shivMethods!==!1,type:"default",shivDocument:r,createElement:o,createDocumentFragment:p};a.html5=s,r(b)}(this,b),e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.mq=z,e.hasEvent=A,e.testProp=function(a){return H([a])},e.testAllProps=J,e.testStyles=y,e.prefixed=function(a,b,c){return b?J(a,b,c):J(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+v.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
define("modernizr", function(){});

(function($){

var AwsAnimation	=	function(options, element){
	
	this.options		=	options;
	this.element		=	element;
	this.elementSlides	=	element.find(options.slidesClassname);
	this.elementSlide	=	element.find(options.slideClassname);
	this.bgSlide		=	element.find(options.bgClassname);
	this.container		=	element.find(options.containerClassname);
	this.states			=	{
		currentSlide: 	0,
		nextSlide: 		true,
		isAnimating: 	false,
		isPaused: 		false,
		isAuto: 		true,
		totalSlides: 	this.elementSlides.length,
		scale: 1
	};
	
	
	if(this.options.isProgress)
		this.Progress	=	new AwsProgress(element.find('.progress'), {theme: options.progress_theme});
	
	
}

var AwsPreload	=	function(elements, options){
	
	this.options	=	$.extend({background: false, single: true, isReplace: true, complete: function(){}}, options);
	this.elements	=	elements;
	
	var _self	=	this;
	
	if(this.options.isReplace){
		
		$.when(this.loadReplace()).then(function(){
			
			_self.options.complete();
		});
		
	}else{
		
		$.when(this.loadAppend()).then(function(){
			
			_self.options.complete();
		});
		
	}
}

AwsPreload.prototype	=	{
	constructor: AwsPreload,
	load: function(){
		
		
		
	},
	loadAppend: function(){
		var defer	=	$.Deferred(),
			_self	=	this,
			index	=	0,
			total	=	this.elements.length;
		
		if(this.elements.length == 0) {
			
			defer.resolve();
			return defer.promise();
		}
		
		this.elements.each(function(index, value){
			
			if($(this).find('img').length == 0){
			
				var _self	=	$(this),
					image	=	$('<img alt="image"/>');
			
					_self.addClass('loading');
				
					image.attr('src', _self.data('src'));
			
					image.load(function(){
				
						_self.removeClass('loading');
						
						if(!_self.hasClass('box_item_bg'))
							_self.append(image);
						
						index++;
						
						if(index == total){
							
							defer.resolve();
						}
						
					});
			}else{
				
				index++;
				
				if(index == total){
					
					defer.resolve();
				}
			}
		});
		
		return defer.promise();
	},
	loadReplace: function(){
		
		var _self	=	this,
			index	=	0,
			total	=	this.elements.length;
		
		this.elements.each(function(index, value){
			
			var image	=	$(this),
				defer	=	$.Deferred();
			
				image.addClass('loading');
				
				image.load(function(){
					
					image.removeClass('loading');
					
					if(_self.options.single){
						
						defer.resolve();
						
					}else{
						
						if(index == total){
							
							defer.resolve();
						}
						
					}
						
				});
			
		});
		
		return defer.promise();
	}
}

var AwsData		=	{
	get: function(element, name, defaultValue, options){
		
		options	=	$.extend({unit: false, scale: false, belong: 'width'}, options);
		
		var data = element.data(name);
		
		if(typeof data == 'undefined')
			data = defaultValue;
		
		if(options.scale != false) {
			
			
			if(data > data * options.scale){
				data	=	data * options.scale;
			}
			
			
		}
		
		if(options.unit !== false)
			data = data + options.unit;
		
		return data;
	},
	getPadding: function(item, options){
		
		var data	=	this.get(item, 'padding', '0 0 0 0');
			
			data	=	data.split(' ');
			
		if(data.length > 0){
			
			var padding = '';
			
			$.each(data, function(index, pad){
				
				data[index] = (pad * options.scale) + options.unit;
				
			});
			
			return data.join(' ');
		}
	}
};

var AwsEffects	=	{
	
	addEffect: function(item, effect, data){
		
		var animation	=	data.join(' ');
		
		item.css(Modernizr.prefixed(effect), animation);
	},
	setAnimation: function(item, data){
		
		if(data.animation.indexOf('_js') > 0){
			
			this.setJsAnimation(item, data);
			
		}else{
		
			var data	=	$.extend({
				duration: '500ms',
				easing: 'linear',
				delay: '0s',
				iteration: 1,
				direction: 'normal',
				fillmode: 'forwards'
			
			}, data);
		
			if(data.easing == 'custom') data.easing = 'linear';
			
			var animation	=	[data.animation, data.duration, data.easing, data.delay, data.iteration, data.direction, data.fillmode].join(' ');
			
			item.css(Modernizr.prefixed('animation'), animation);
		}
	},
	setBgAnimation: function(item, data){
		
		if(data.animation.indexOf('_js') > 0){
			
			this.setJsAnimation(item, data);
			
		}else{
		
			var data	=	$.extend({
				duration: '500ms',
				easing: 'linear',
				delay: '0s',
				iteration: 1,
				direction: 'normal',
				fillmode: 'forwards'
			
			}, data);
		
			if(data.easing == 'custom') data.easing = 'linear';
			
			var effect	=	data.animation;
			
			if(data.state == 'in'){
				
				effect += 'In';
				
			}else{
				
				effect += 'Out';
			}
			
			var animation	=	[effect, data.duration, data.easing, data.delay, data.iteration, data.direction, data.fillmode].join(' ');
			
			item.css(Modernizr.prefixed('animation'), animation);
		}
	},
	setJsAnimation: function(item, data){
		
		var effect	=	data.animation;
		
		var width	=	item.width();
		var height	=	item.height();
		
		var initBlocks	=	function(cols, rows, initState){
			
			var total		=	cols*rows;
			var colWidth	=	Math.ceil(width/cols);
			var colHeight	=	Math.ceil(height/rows);
			var bgType		=	item.data('from');
			
			item.empty();
			item.css('opacity', 1);
			
			for(var r = 0; r < rows; r++){
			
				var top	=	r * colHeight;
			
				for(var c = 0; c < cols; c++){
				
					var left	=	c * colWidth;
				
					var block	=	$('<span/>');
				
					block.data('top', top);
					block.data('left', left);
					block.data('width', colWidth);
					block.data('height', colHeight);
				
					block.css({ 
						display: 'block',
						position: 'absolute',
						width: colWidth, 
						height: colHeight
					});
					
					
				
					var backLeft	=	-1*left;
					var backTop		=	-1*top;
					
					if(bgType == 'image')
						block.css('background-image', 'url('+item.data('src')+')');
					
					block.css('background-color', item.data('color'));
					
					block.css('background-position', backLeft+'px '+backTop+'px');
				
					item.append(block);
				}
			}
			
			
			item.css('background', 'none');
			
			if(typeof initState != 'undefined'){
				
				initState(item.children('span'));
				
				
			}
		}
		
		var getRandomInt	=	function(min, max) {
  		  		return Math.floor(Math.random() * (max - min)) + min;
			}
			
		var bg_blocks_1_js	=	{
			
			effectIn: function(){
				
				initBlocks(1, 30, function(items){
					
					var even	=	items.filter(':even');
					var odd		=	items.filter(':odd');
					
					even.each(function(){
						
						$(this).css({ top: $(this).data('top'), left:-1*(2000 + Math.ceil($(this).data('left'))) });
					});
					
					odd.each(function(){
						
						$(this).css({ top: $(this).data('top'), left:(2000 + Math.ceil($(this).data('left'))) });
					});
					
					return ;
				});
				
				this._effectIn(0);
				
			},
			_effectIn: function(i){
				
				var efBlocks	=	item.children('span');
				
				if(i >= efBlocks.length) return;
				
				var _self	=	this;
				
				var even	=	efBlocks.filter(':even');
				var odd		=	efBlocks.filter(':odd');
				
				even.each(function(index){
					
					$(this).animate({left: $(this).data('left')}, 1500);
				});
				
				odd.each(function(index){
					
					$(this).animate({left: $(this).data('left')}, 1500);
				});
				
				setTimeout(function(){
					
					item.css('opacity', 1);
				}, 1500);
			},
			effectOut: function(){
				
				var efBlocks	=	item.children('span');
								
				var _self	=	this;
				
				var even	=	efBlocks.filter(':even');
				var odd		=	efBlocks.filter(':odd');
				
				even.each(function(index){
					
					$(this).animate({left:-1*(2000 + Math.ceil($(this).data('left')))}, 1000);
				});
				
				odd.each(function(index){
					
					$(this).animate({left:(2000 + Math.ceil($(this).data('left')))}, 1000);
				});
				
				setTimeout(function(){
					
					item.css('opacity', 0);
				}, 1000);
			}
		}
		
		var bg_blocks_2_js	=	{
			
			effectIn: function(){
				
				initBlocks(30, 1, function(items){
					
					var even	=	items.filter(':even');
					var odd		=	items.filter(':odd');
					
					even.each(function(){
						
						$(this).css({ left: $(this).data('left'), top:-1*(2000 + Math.ceil($(this).data('top'))) });
					});
					
					odd.each(function(){
						
						$(this).css({ left: $(this).data('left'), top:(2000 + Math.ceil($(this).data('top'))) });
					});
					
					return ;
				});
				
				this._effectIn(0);
				
			},
			_effectIn: function(i){
				
				var efBlocks	=	item.children('span');
				
				if(i >= efBlocks.length) return;
				
				var _self	=	this;
				
				var even	=	efBlocks.filter(':even');
				var odd		=	efBlocks.filter(':odd');
				
				even.each(function(index){
					
					$(this).animate({top: $(this).data('top')}, 1500);
				});
				
				odd.each(function(index){
					
					$(this).animate({top: $(this).data('top')}, 1500);
				});
			},
			effectOut: function(){
				
				var efBlocks	=	item.children('span');
								
				var _self	=	this;
				
				var even	=	efBlocks.filter(':even');
				var odd		=	efBlocks.filter(':odd');
				
				even.each(function(index){
					
					$(this).animate({top:-1*(2000 + Math.ceil($(this).data('top')))}, 1000);
				});
				
				odd.each(function(index){
					
					$(this).animate({top:(2000 + Math.ceil($(this).data('top')))}, 1000);
				});
				
				setTimeout(function(){
					
					item.css('opacity', 0);
				}, 2000);
			}
		}
		
		switch(effect){
		case 'bg_blocks_1_js':
			
			if(data.state == 'in'){
		
				bg_blocks_1_js.effectIn();
			
			}else{
			
				bg_blocks_1_js.effectOut();
			}
			
			break;
		case 'bg_blocks_2_js':
			
			if(data.state == 'in'){
		
				bg_blocks_2_js.effectIn();
			
			}else{
			
				bg_blocks_2_js.effectOut();
			}
			
			break;
		}
		
	},
	setPadding: function(item, data, options){
		
		
		
	},
	setStyleText: function(item, data){
		
		var data	=	data.join(' ');
		
		
	}
};

var AwsProgress	=	function(element, options){
	
	var theme		=	options.theme || 'bars';
	
	this.element	=	element;
	this.options	=	options;
	this.theme		=	this.themes[theme];
	
	this.theme.init.call(this);
};

AwsProgress.prototype	=	{
	constructor: AwsProgress,
	themes: {},
	eventStart: function(){},
	eventStop: function(){},
	states: {
		isProgress: false
	},
	start: function(data){
		
		this.theme.start.call(this, data);
	},
	stop: function(){
		
		this.theme.stop.call(this);
	}
}

AwsProgress.prototype.themes.bars	=	{
	
	init: function(){
		
		this._s				=	this;
		this.percent		=	0;
		this.percentElement	=	$('<div class="percent"></div>');
		
		this.element.addClass('bars');
		this.element.append(this.percentElement);
	},
	setPercent: function(element, percent){
		
		if(Modernizr.cssanimations){
			
			AwsEffects.setAnimation(element.find('.percent'), {animation: 'awsprogress_bar_in', duration: (this.duration - 500)+'ms'});
			
		}else{
		
			var widthContainer	=	element.width();

			var v1	=	(this.stepTime * 100)/this.duration;

			var widthPercent	=	((widthContainer * v1)/100) * percent;

			element.find('.percent').width(widthPercent);
		}
	},
	resetPercent: function(element){
		
		if(Modernizr.cssanimations){
			
			AwsEffects.setAnimation(element.find('.percent'), {animation: 'awsprogress_bar_out', duration: '500ms'});
			
		}else{
			
			element.find('.percent').width(0);
		}
	},
	start: function( data ){
		
		var _s	=	this;
		
		var percent		=	1;
		
		this.theme.stepTime	=	100;
		
		this.theme.duration	=	data.duration;
		
		this.theme.setPercent(this.element, percent);
		
		var interval = setInterval(function(){
			
			percent++;
			
			_s.theme.setPercent(_s.element, percent);
			
		}, this.theme.stepTime);
		
		setTimeout(function(){
			
			clearInterval(interval);
			
			
			
		}, this.theme.duration);
	},
	stop: function(){
		
		this.theme.resetPercent(this.element);
	}
}

AwsAnimation.prototype		=	{
	constructor: 	AwsAnimation,
	Data: AwsData,
	Effect: AwsEffects,
	Video: {},
	method: 		function(nam, fn){
		
		this.prototype[name] = fn;
	},
	isPause: false,
	getBackground: 	function(index){
		
		var element = this.elementSlides.eq(index).find(this.options.bgClassname);
		
		return {
			element: 	element,
			effectIn: 	element.data('effectin'),
			effectOut: 	element.data('effectout'),
			from: 		element.data('from'),
			src: 		element.data('src'),
			color: 		element.data('color'),
			easing: 	this.Data.get(element, 'easing', 'linear')
		}
	},
	slideIn: 		function(index){
		
		if(index < 0) index = 0;
		
		var _self			=	this,
			dfd 			=	new jQuery.Deferred(),
			durationSlide	=	this.elementSlides.eq(index).data('duration'),
			items			=	this.getItems(index);
		
		this.element.trigger('slide_index', index);
		
		if(items.length > 0){			
			items.each(function(){
				
				var item		=	jQuery(this);

				_self.Effect.setAnimation(item, {
					animation: _self.Data.get(item, 'effect', 'awsfadeIn'),
					duration: _self.Data.get(item, 'duration', '0s', {unit: 'ms'}),
					easing: _self.Data.get(item, 'easing', 'linear'),
					delay: _self.Data.get(item, 'delay', '0s', {unit: 'ms'}),
					iteration: _self.Data.get(item, 'iteration', 1),
					direction: _self.Data.get(item, 'direction', 'normal'),
					fillmode: _self.Data.get(item, 'fillmode', 'forwards')
				});
				
				if(item.data('kind') == 'video' && item.data('auto') != 0)
					_self.Video.play(item.data('playerid'));
				
			});
			
		}else{
			dfd.resolve();
			return dfd.promise();
		}
		
		var timeout = setTimeout(function(){
			
						
			dfd.resolve();
			
		}, durationSlide);
		
		if(this.states.isPaused){
			
			clearTimeout(timeout);
			
			dfd.resolve();
		}
	
		return dfd.promise();
	
	},
	slideOut: 		function(index){
				
		var _self		=	this,
			dfd 		=	new jQuery.Deferred();
		
		if(index < 0 || typeof index == 'undefined') {
			
			dfd.resolve();
			return dfd.promise();
		}
		
		var duration	=	this.getDuration(index),
			items		=	this.getItems(index);
		
			if(items.length > 0){
				items.each(function(){

					var item		=	jQuery(this),
						delay		=	((_self.Data.get(item, 'delay', '0')*30)/100)+'ms';
						
						_self.Effect.setAnimation(item, {
							animation: _self.Data.get(item, 'effectout', 'awsfadeOut'),
							duration: _self.Data.get(item, 'duration', 500, {unit: 'ms'}),
							easing: _self.Data.get(item, 'easing', 'linear'),
							delay: delay,
							fillmode: _self.Data.get(item, 'fillmode', 'both')
						});
						
						if(item.data('kind') == 'video')
							_self.Video.stop(item.data('playerid'));
						
				});
			}
		
		var timeout = setTimeout(function(){
		
			dfd.resolve();
		}, duration);
		
		if(this.states.isPaused){
			
			clearTimeout(timeout);
			
			dfd.resolve();
			
		}
	
		return dfd.promise();
		
	},
	slides: 	function(from, to){
		
		var _self		=	this,
			slideFrom	=	this.elementSlides.eq(from),
			slideTo		=	this.elementSlides.eq(to);
		
		this.states.isAnimating = true;
		
		_self.options.eventStart.call(this);
		
		new AwsPreload(slideTo.find('.box_item_image'), {isReplace: false, complete: function(){
		
		$.when(_self.slideOut(from)).then(function(){
			
			if(_self.options.isAuto && _self.options.isProgress)
				_self.Progress.start({duration: slideTo.data('duration')});
			
			$.when(_self.slideBackground(from, to)).then(function(){
				
				$.when(_self.slideIn(to)).then(function(){
					
					if(_self.options.isAuto && _self.options.isProgress)
						_self.Progress.stop();
					
					_self.states.isAnimating = false;
					
					_self.resetIndex(from, to);
					
				});
			});
		});
		
	}});
		
	},
	slidesBreak: function(from, to){
		
		if(this.states.isAnimating) return;
		
		this.isPaused	=	true;
		this.states.isAnimating = true;
		
		var _self		=	this,
			slideFrom	=	this.elementSlides.eq(from),
			slideTo		=	this.elementSlides.eq(to);
		
		this.elementSlides.removeClass('active');
		slideTo.addClass('active');
				
		this.states.currentSlide = to;
		
		new AwsPreload(slideTo.find('.box_item_image'), {isReplace: false, complete: function(){
			
			$.when(_self.slideOut(from)).then(function(){
			
				$.when(_self.slideBackground(from, to)).then(function(){
				
					_self.states.isAnimating = false;
				
					_self.slideIn(to);
				});
		
			});
	
		}});
	},
	resetIndex: function(from, to){
		
		var slideFrom	=	this.elementSlides.eq(from),
			slideTo		=	this.elementSlides.eq(to);
			
			this.states.currentSlide = to;	
	
			slideFrom.removeClass('active');
			slideTo.addClass('active');
			
			if(this.options.isAuto == true && !this.isPaused){
				
				var index	=	this.getNextIndex();
				
				this.slides(index[0], index[1]);
				
			}
			
			this.options.eventComplete.call(this);
		
	}, 
	getNextIndex: 	function(){
		
		var from	=	0,
			to		=	1;
	
		if(this.states.currentSlide == (this.states.totalSlides - 1)){
		
			from	=	this.states.totalSlides - 1;
			to		=	0;
		
		}else{
		
			from	=	this.states.currentSlide;
			to		=	from + 1;
		
		}
		
		return [from, to];
	},
	getPrevIndex: function(){
		
		var from	=	0,
			to		=	1;

		if(this.states.currentSlide == 0){
		
			from	=	0;
			to		=	this.states.totalSlides - 1;
		
		}else{
	
			from	=	this.states.currentSlide;
			to		=	from - 1;
			
		}
		
		return [from, to];
	},
	nextSlides: function(){
		
		this.options.isAuto		=	false;
		
		if(this.states.isAnimating){
			
			return false;
		}
		
		this.states.nextSlide = true;
		
		var _self	=	this;
		
		var index	=	this.getNextIndex(),
			from	=	index[0],
			to		=	index[1];
		
		this.slidesBreak(from, to);
			
	},
	prevSlides: 	function(){
		
		this.options.isAuto		=	false;
		
		if(this.states.isAnimating) return;
		
		this.states.nextSlide = false;
		
		var index	=	this.getPrevIndex(),
			from	=	index[0],
			to		=	index[1];
	
		this.slidesBreak(from, to);
	},
	indexSlides: function(){
		
		
	},
	getItems: 		function(index){
		
		return this.elementSlides.eq(index).find(this.options.slideClassname);
	},
	getDuration: 		function(index){
		
		return 500;
	},
	getDurationSlide: 	function(){
		
		return 2000;
	},
	setScale: function(){
		
		var _self	=	this,
			width	=	this.Data.get(this.element, 'width'),
			height	=	this.Data.get(this.element, 'height');
		
		var widthContainer		=	this.element.find('.box_container').width();
		var heightBoxContainer	=	this.element.find('.box_container').height();
				
		if(this.options.isResponsive == 1){
			
			if(this.options.customScale) {
				
				
				$.each(this.options.customScale, function(index, media){
					
					if(Modernizr.mq(media.name)){

						_self.states.scale	=	media.value;
						
					}
					
				});
				
			}else{
				
				var windowHeight	=	$(window).height();
				var windowWidth		=	$(window).width();
				
				heightContainer	=	windowHeight;
				widthContainer	=	windowWidth;
				
				this.states.scale		=	1;
				
				this.states.scaleWidth 	= 1;
				this.states.scaleHeight = 1;
				
				if(width <= windowWidth){
					widthContainer	=	width;
					
				}else{
					
					this.states.scale 		= windowWidth/width;
					
					this.states.scaleHeight = this.states.scale;
				}
			
				if(height <= windowHeight){
					heightContainer	=	height;
					
				}else{
					
					this.states.scale 		= windowHeight/height;
					
					this.states.scaleWidth 	= this.states.scale;
				}
				
				
				if(width > windowWidth && height > windowHeight){
					this.states.scale 		= windowWidth/width;
					
					this.states.scaleHeight = windowHeight/height;
					this.states.scaleWidth 	= windowWidth/width;
					
				}
					
					var wboxContainer	=	widthContainer * this.states.scale,
						hboxContainer	=	heightContainer * this.states.scale;
					
				if(windowWidth < windowHeight && (width > windowWidth && height > windowHeight)){
					
					this.element.find('.box_container').css({width: windowWidth, height: hboxContainer});
					
				}
				
				if(windowWidth > windowHeight && (width > windowWidth && height > windowHeight)){
				
					this.element.find('.box_container').css({width: windowWidth, height: wboxContainer});
					
				}
				
				if(width <= windowWidth && height <= windowHeight){
					
					this.element.find('.box_container').css({width: wboxContainer, height: hboxContainer});
					
				}else{
					
					if(width < windowWidth && (width < windowWidth || height < windowHeight))
						this.element.find('.box_container').css({width: wboxContainer, height: hboxContainer});
					
					if(width > windowWidth && (width < windowWidth || height < windowHeight))
						this.element.find('.box_container').css({width: windowWidth, height: hboxContainer});
						
				}
				
				if(this.options.isfullwindow == 1 || (width > windowWidth && height > windowHeight)){
				
					this.element.css('width', windowWidth);
					this.element.css('height', windowHeight);
					
				}else{
					
					if(this.options.isFullwidth == 0)
						this.element.css('width', widthContainer);
					
					
					this.element.css('height', heightContainer);
					
				}
			}
							
		}else{
						
			this.element.css({'height': this.Data.get(this.element, 'height', {unit:'px'}), 'width': this.Data.get(this.element, 'width', {unit:'px'})});
		}
		
	},
	init: function(){
		
		var _self	=	this;
		
		this.reset();
		this.navigation();
		this.slides(-1, 0);
		
		$(window).resize(function(){
			
			_self.reset();
			
		});
	},
	start: function(){
		
		var _self	=	this;
		
		if(this.options.preload){
			
			new AwsPreload(this.element.find('.box_item_image'), {isReplace: false, complete: function(){
				
				_self.init();
			}});
			
		}else{
			
			this.init();
		}
		
	},
	pause: function(){
		
		
	},
	reset: 			function(){
		
		var _s	=	this;
		
		var sourceVideo	=	[];
		
		this.setScale();
		
		this.bgSlide.each(function(){
			
			var item	=	$(this);
			
			item.css({top: 0, left: 0});
			
			if(item.data('from') == 'color')
				item.css({'background-color': _s.Data.get(item, 'color', '#FFF')});
			
			if(item.data('from') == 'image'){
				
				item.css('background-image', "url('"+_s.Data.get(item, 'src', 'none')+"')");
				
			}
			
			if(item.data('from') == 'video'){
				
				sourceVideo.push({name: item.data('kind'), video: item.data('src'), element: item});
			}
		});
		
		this.elementSlide.each(function(){
			
			var item	=	$(this),
				kind	=	_s.Data.get(item, 'kind', 'image');
			
			item.css({
				'top': _s.Data.get(item, 'top', 0, {unit:'px', scale: _s.states.scale, belong: 'height'}), 
				'left': _s.Data.get(item, 'left', 0, {unit:'px', scale: _s.states.scale}), 
				'z-index': _s.Data.get(item, 'zindex', 0)
			});
			
			if(kind == 'image'){
				
				item.find('img').attr('alt', _s.Data.get(item, 'alt', 'alt slide'));
				
				item.css({
					'width': _s.Data.get(item, 'width', 100, {unit:'px', scale: _s.states.scale}),
					'height': _s.Data.get(item, 'height', 100, {unit:'px', scale: _s.states.scale})
				});
				
				
			}
			
			if(kind == 'text'){
				
				item.css({
					'font-family': "'"+_s.Data.get(item, 'fontname', 'arial')+"'",
					'font-size': _s.Data.get(item, 'fontsize', '12', {unit:'px', scale: _s.states.scale}),
					'font-weight': _s.Data.get(item, 'fontweight', 'normal'),
					'color': _s.Data.get(item, 'color', '#000'),
					'background': _s.Data.get(item, 'bgcolor', 'transparent'),
					'padding': _s.Data.getPadding( item, {unit:'px', scale: _s.states.scale})
				});
			}
			
			if(kind == 'video'){
				
				item.css({ 
					'width': _s.Data.get(item, 'width', 100, {unit:'px', scale: _s.states.scale}),
					'height': _s.Data.get(item, 'height', 100, {unit:'px', scale: _s.states.scale}) 
				});
				
				sourceVideo.push({
					name: _s.Data.get(item, 'from', 'youtube'), 
					video: item.data('src'), 
					element: item,
					auto: _s.Data.get(item, 'auto', 'false')
				});
			}
			
		});
		
		if(sourceVideo.length > 0){
			
			this.Video	=	new AwsVideo({players: sourceVideo});
		}
	},
	pagination: function(){
		
		var _s		=	this,
			pagi	=	this.element.find('.pagination');
			
			pagi.addClass('style-2');
			
			pagi.append($('<div/>'));
		
		$.each(this.elementSlides, function(index, slide){
			
			pagi.find('div').append($('<a class="index" href="#" data-index="'+index+'">'+(index+1)+'</a>'));
			
		});
		
		pagi.find('.index').click(function(e){
			
			e.preventDefault();
			
			var from	= _s.states.currentSlide, 
				to		= $(this).data('index');
			
			if(_s.states.isAnimating) return;

			if(from == to) return;
			
			if(to > from){
				_s.states.nextSlide = true;
			}else{
				_s.states.nextSlide = false;
			}
			
			_s.options.isAuto		=	false;
			
			pagi.find('.index').removeClass('active');
			$(this).addClass('active');
			
			_s.slidesBreak(from, to);
				
		});
		
		this.element.on('slide_index', function(event, index){
			
			var g	=	pagi.find('div').children('a');
			
			g.removeClass('active');
			g.eq(index).addClass('active');
		});
		
	},
	navigation: 	function(){
		
		var _self	=	this;
		
		if(this.options.pagination)
			this.pagination();
		
		this.element.find('.nextSlide').click(function(e){
			
			_self.nextSlides();
			
			e.preventDefault();
		});
		
		this.element.find('.prevSlide').click(function(e){
			
			
			_self.prevSlides();
			
			e.preventDefault();
		});
		
		if(typeof this.element.swipe == 'function')
		this.element.swipe( {
			
			swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
			  
				if(direction == 'left'){
					
					_self.nextSlides();
					
				}else{
					
					_self.prevSlides();
				}
			}
		});
	}
}

AwsAnimation.decorators = {};

AwsAnimation.prototype.decorate = function (decorator) {
	var F = function () {}, overrides = this.constructor.decorators[decorator], i, newobj;
	F.prototype = this;
	newobj = new F(); 
	newobj.uber = F.prototype; 
	for (i in overrides) {
		if (overrides.hasOwnProperty(i)) {
			newobj[i] = overrides[i]; 
		}
	}

	return newobj;
};

AwsAnimation.decorators.fade	=	{
	
	slideBackground: 	function(from, to){
		
		var dfd 		=	new jQuery.Deferred(),
			duration	=	500;
			
		var toBg	=	this.getBackground(to);
		
		if(from >= 0){
			var fromBg	=	this.getBackground(from);
			
			if(typeof fromBg.effectOut != 'undefined'){

				this.Effect.setBgAnimation(fromBg.element, {
					animation: fromBg.effectIn,
					easing: 	toBg.easing,
					state: 'out'
				});
			}
		}
		
		if(typeof toBg.effectIn != 'undefined'){
			
			this.Effect.setBgAnimation(toBg.element, {
				animation: 	toBg.effectIn,
				easing: 	toBg.easing,
				state: 'in'
			});
		}
		
		setTimeout(function(){
		
			dfd.resolve();
		
		}, duration);
	
		return dfd.promise();
	}
}

AwsAnimation.decorators.horizontal	=	{
	
	slideBackground: 	function(from, to){
		
		var dfd 		=	new jQuery.Deferred(),
			duration	=	1100;
		
		var toBg	=	this.getBackground(to);
		
		var easing	=	'cubic-bezier(.63,.36,.02,.96)';
		
		var animation_next_from	=	{
				animation: 'awsnext_h_from',
				duration: '1s',
				easing: easing},
			
			animation_next_to	=	{
				animation: 'awsnext_h_to',
				duration: '1s',
				easing: easing},
				
			animation_prev_from	=	{
				animation: 'awsprev_h_from',
				duration: '1s',
				easing: easing},
				
			animation_prev_to	=	{
				animation: 'awsprev_h_to',
				duration: '1s',
				easing: easing};
		
		if(from >= 0){
			var fromBg	=	this.getBackground(from);
			
			if(this.states.nextSlide){
				
				this.Effect.setAnimation(fromBg.element, { animation: fromBg.effectIn+'next_h_from', duration: '1s', easing: easing });
								
			}else{
				
				this.Effect.setAnimation(fromBg.element, { animation: fromBg.effectIn+'prev_h_from', duration: '1s', easing: easing });
				
			}
		}
		
		if(this.states.nextSlide){
			
			this.Effect.setAnimation(toBg.element, { animation: toBg.effectIn+'next_h_to', duration: '1s', easing: easing });
			
			
		}else{
			
			this.Effect.setAnimation(toBg.element, { animation: toBg.effectIn+'next_h_to', duration: '1s', easing: easing });
			
			
		}
		
		setTimeout(function(){
		
			dfd.resolve();
		
		}, duration);
	
		return dfd.promise();
	}
	
}

AwsAnimation.decorators.vertical	=	{
	
	slideBackground: 	function(from, to){
		
		var _s			=	this,
			dfd 		=	new jQuery.Deferred(),
			duration	=	1100;
		
		var toBg	=	this.getBackground(to);
		
		var easing	=	'cubic-bezier(0.230, 1.000, 0.320, 1.000)';
		
		var animation_next_from	=	{
				animation: 'awsnext_v_from',
				duration: '1s',
				easing: easing},
			
			animation_next_to	=	{
				animation: 'awsnext_v_to',
				duration: '1s',
				easing: easing},
				
			animation_prev_from	=	{
				animation: 'awsprev_v_from',
				duration: '1s',
				easing: easing},
				
			animation_prev_to	=	{
				animation: 'awsprev_v_to',
				duration: '1s',
				easing: easing};
		
		if(from >= 0){
			var fromBg	=	this.getBackground(from);
			
			if(this.states.nextSlide){
				
				this.Effect.setAnimation(fromBg.element, animation_next_from);
							
			}else{
				
				this.Effect.setAnimation(fromBg.element, animation_prev_from);
				
			}
		}
		
		if(this.states.nextSlide){
			
			
			this.Effect.setAnimation(toBg.element, animation_next_to);
					
		}else{
			
			this.Effect.setAnimation(toBg.element, animation_prev_to);
					
		}
		
		setTimeout(function(){
			
			dfd.resolve();
			
		}, duration);
	
		return dfd.promise();
	}
}

jQuery.fn.awslideshow	=	function(options){
	
	return this.each(function(){
		
		var settings = jQuery.extend( {
			type: 'fade',
			containerClassname: '.box_container',
			slidesClassname: 	'.box_items',
			slideClassname: 	'.box_item',
			bgClassname: 		'.box_item_bg',
			responsive: true,
			isfullwindow: false,
			customScale: false,
			preload: true,
			width:'100%',
			height:450,
			eventStart: function(){},
			eventComplete: function(){},
			timeslide:4000,
			isAuto:false,
			isProgress: 0,
			isFullwidth: 1,
			isResponsive: 1,
			viewport:1,
			effect:'fade',
			direction:'horizontal',
			navigation: true,
			pagination: false,
			nextprev:false,
			duration:2000,
			enableTouch:true,
			thumbNavi: false,
			customScale: false
		}, options),
		self	=	jQuery(this),
		wHeight	=	self.data('height'),
		wWidth	=	self.data('width');
		
		var awslideshow = {
			animationDecorate: {},
			init: 	function(){
				
				this.navigate();
				
				this.loadGoogleFont(self.data('fontgoogle'));
				
				var animation	=	new AwsAnimation(settings, self);
				
				this.animationDecorate = animation.decorate(settings.type);
				
				this.animationDecorate.start();

			},
			loadGoogleFont: function(src){
			
				if(typeof src == 'undefined') return;
			
				var fonts	=	src.split('|');
			
				WebFont.load({
				    google: {
				      families: fonts
				    }
				});
			
			},
			navigate: function(){
				
				if(settings.isProgress == 1 && settings.isAuto == 1){
					
					self.append($('<div class="progress"></div>'));
				}
				
				if(settings.ispagination == 1){
					
					self.append($('<div class="pagination"></div>'));
				}
			},
			
		};
		
		awslideshow.init();
		
		
	});
}

})(jQuery);



var AwsVideo	=	(function(){
	
	var source	= {};
	
	// Private method
	this.privateMethod	=	function(){
		
	}
	
	return function( options ){
		
		this.players	=	options.players;
		
		// Public method
		this.setup = function(){
			
			this.setDefaultSource();
			
			for(var i in source){
				
				source[i].init.call(this);
			}
		}
		
		this.setSource	=	function( newSource ){
			
			source[newSource.name]	=	newSource.value;
		}
		
		this.getSource	=	function(name){
			
			return source[name];
		}
		
		this.setup();
	};
	
})();

AwsVideo.prototype	=	{
	Sources: [],
	getPlayer: function(name){
		
		for(var i in this.players){
			
			if(this.players[i].playerID == name)
				return this.players[i];
		}
	},
	play: function(name){
		
		var player	=	this.getPlayer(name);
		
		if(typeof player != 'undefined')
				player.play();
		
	},
	stop: function(name){
		
		var player	=	this.getPlayer(name);
		
		if(typeof player != 'undefined')
				player.stop();
	},
	setDefaultSource: function(){
		
		for(var i in this.Sources){
			
			this.setSource( this.Sources[i] );
		}
	}
};

// Youtube
AwsVideo.prototype.Sources.push({
	name: 'youtube',
	value: {		
		init: function(){
			
			var _self	=	this;
			var players	=	this.players;
			
			var tag = document.createElement('script');
			var firstScriptTag = document.getElementsByTagName('script')[0];
		
				tag.src = "https://www.youtube.com/iframe_api";
				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
				
				
				jQuery(document).on('onYouTubeIframeAPIReady', function(){
					
					jQuery.each(players, function(index, player){
						
						if(player.name == 'youtube'){
							
							var element		=	player.element,
								playerID	=	'youtube_'+index;
							
							element.html(jQuery('<div id="'+playerID+'"/>'));
							element.data('playerid', playerID);
							
							players[index].playerID	=	playerID;
							
							players[index].player	=	new YT.Player(playerID, {
								height: '100%',
								width: '100%',
								videoId: player.video,
								events: {
									'onReady': onPlayerReady,
									'onStateChange': onPlayerStateChange
								}
							});
							
							players[index].play	=	function(){
								
								if(typeof this.player.playVideo != 'undefined')
									this.player.playVideo();
							}
							
							players[index].stop	=	function(){
								
								console.log('stop video');
								this.player.stopVideo();
							}
							
						}
						
					});

				});
				
				jQuery(document).on('onPlayerReady', function(){
				
					jQuery.each(players, function(index, player){
						
						if(player.name == 'youtube' && player.auto){
							players[index].player.playVideo();
						}
					});
					
				});
			
		}
	}
});

// Vimeo
AwsVideo.prototype.Sources.push({
	name: 'vimeo',
	value: {

		init: function(){
			
			var players	=	this.players;
			var tag = document.createElement('script');
			var firstScriptTag = document.getElementsByTagName('script')[0];

				tag.src = "//f.vimeocdn.com/js/froogaloop2.min.js";
				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
				
				
				jQuery.each(players, function(index, player){
					
					if(player.name == 'vimeo'){
						
						var iframe		=	jQuery('<iframe/>'),
							element		=	player.element,
							playerID	=	'vimeo_'+index;
							
							iframe.attr('src', '//player.vimeo.com/video/'+player.video+'?api=1&player_id='+playerID);
							iframe.attr('width', element.width()).attr('height', element.height()).attr('frameborder', 0);
							iframe.attr('id', playerID);
							
							element.html(iframe);
							element.data('playerid', playerID);
							
							
							iframe.load(function(){
								
								players[index].playerID	=	playerID;
								
								players[index].player	=	$f(iframe[0]);
								
								players[index].play	=	function(){
									
									this.player.api('play');
								}
								
								players[index].stop	=	function(){
									
									this.player.api('pause');
								}
								
								if(player.auto)
									players[index].player.api('play');
								
							});
					}
					
				});

		}

	}
});

// Hosting
AwsVideo.prototype.Sources.push({
	name: 'hosting',
	value: {
		init: function(){
			var players	=	this.players;
			var tag = document.createElement('script');
			var firstScriptTag = document.getElementsByTagName('script')[0];
			
				tag.src = awsslideshow_object.plugin_url+"js/jquery_awsslideshow/videojs/video.js";
				firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
				
				jQuery(tag).load(function(){
					jQuery.each(players, function(index, player){
					
						if(player.name == 'hosting'){
							
							var options	=	$.extend({width: 630, height: 354, auto: false, preload: 'auto'}, player);
							var video	=	$('<video class="video-js vjs-default-skin vjs-big-play-centered" controls/>');
							var element	=	$('#'+player.playerId);
							
							
							jQuery.each(player.video, function(index, data){
								
								var source	=	$('<source />');
								
								source.attr('src', data.src);
								source.attr('type', data.type);
								
								video.append(source);
							});
							
							video.attr('id', 'vjs_'+player.playerId);
							video.attr('width', options.width);
							video.attr('height', options.height);
							video.attr('preload', options.auto);
							
							
						
							element.html(video);
						
							videojs('vjs_'+player.playerId, {}, function(){
								
								var videojsPlayer	=	this;
								
								if(player.auto)
									this.play();
								
								players[index].play	=	function(){
									
									videojsPlayer.play();
								}
								
								players[index].stop	=	function(){
									
									videojsPlayer.pause();
								}
								
							});
						}
					});
				});	
				
				
		}
	}
});
		
function onYouTubeIframeAPIReady() {
	
	jQuery(document).trigger(jQuery.Event('onYouTubeIframeAPIReady'));
}

function onPlayerReady(event) {
  
  jQuery(document).trigger(jQuery.Event('onPlayerReady'));
}

function onPlayerStateChange(event) {
	
}
function stopVideo() {

};
define("awslideshow", function(){});

/**
 * @license AngularJS v1.4.0-beta.5
 * (c) 2010-2015 Google, Inc. http://angularjs.org
 * License: MIT
 */
(function(window, angular, undefined) {

/**
 * @ngdoc module
 * @name ngRoute
 * @description
 *
 * # ngRoute
 *
 * The `ngRoute` module provides routing and deeplinking services and directives for angular apps.
 *
 * ## Example
 * See {@link ngRoute.$route#example $route} for an example of configuring and using `ngRoute`.
 *
 *
 * <div doc-module-components="ngRoute"></div>
 */
 /* global -ngRouteModule */
var ngRouteModule = angular.module('ngRoute', ['ng']).
                        provider('$route', $RouteProvider),
    $routeMinErr = angular.$$minErr('ngRoute');

/**
 * @ngdoc provider
 * @name $routeProvider
 *
 * @description
 *
 * Used for configuring routes.
 *
 * ## Example
 * See {@link ngRoute.$route#example $route} for an example of configuring and using `ngRoute`.
 *
 * ## Dependencies
 * Requires the {@link ngRoute `ngRoute`} module to be installed.
 */
function $RouteProvider() {
  function inherit(parent, extra) {
    return angular.extend(Object.create(parent), extra);
  }

  var routes = {};

  /**
   * @ngdoc method
   * @name $routeProvider#when
   *
   * @param {string} path Route path (matched against `$location.path`). If `$location.path`
   *    contains redundant trailing slash or is missing one, the route will still match and the
   *    `$location.path` will be updated to add or drop the trailing slash to exactly match the
   *    route definition.
   *
   *    * `path` can contain named groups starting with a colon: e.g. `:name`. All characters up
   *        to the next slash are matched and stored in `$routeParams` under the given `name`
   *        when the route matches.
   *    * `path` can contain named groups starting with a colon and ending with a star:
   *        e.g.`:name*`. All characters are eagerly stored in `$routeParams` under the given `name`
   *        when the route matches.
   *    * `path` can contain optional named groups with a question mark: e.g.`:name?`.
   *
   *    For example, routes like `/color/:color/largecode/:largecode*\/edit` will match
   *    `/color/brown/largecode/code/with/slashes/edit` and extract:
   *
   *    * `color: brown`
   *    * `largecode: code/with/slashes`.
   *
   *
   * @param {Object} route Mapping information to be assigned to `$route.current` on route
   *    match.
   *
   *    Object properties:
   *
   *    - `controller` – `{(string|function()=}` – Controller fn that should be associated with
   *      newly created scope or the name of a {@link angular.Module#controller registered
   *      controller} if passed as a string.
   *    - `controllerAs` – `{string=}` – An identifier name for a reference to the controller.
   *      If present, the controller will be published to scope under the `controllerAs` name.
   *    - `template` – `{string=|function()=}` – html template as a string or a function that
   *      returns an html template as a string which should be used by {@link
   *      ngRoute.directive:ngView ngView} or {@link ng.directive:ngInclude ngInclude} directives.
   *      This property takes precedence over `templateUrl`.
   *
   *      If `template` is a function, it will be called with the following parameters:
   *
   *      - `{Array.<Object>}` - route parameters extracted from the current
   *        `$location.path()` by applying the current route
   *
   *    - `templateUrl` – `{string=|function()=}` – path or function that returns a path to an html
   *      template that should be used by {@link ngRoute.directive:ngView ngView}.
   *
   *      If `templateUrl` is a function, it will be called with the following parameters:
   *
   *      - `{Array.<Object>}` - route parameters extracted from the current
   *        `$location.path()` by applying the current route
   *
   *    - `resolve` - `{Object.<string, function>=}` - An optional map of dependencies which should
   *      be injected into the controller. If any of these dependencies are promises, the router
   *      will wait for them all to be resolved or one to be rejected before the controller is
   *      instantiated.
   *      If all the promises are resolved successfully, the values of the resolved promises are
   *      injected and {@link ngRoute.$route#$routeChangeSuccess $routeChangeSuccess} event is
   *      fired. If any of the promises are rejected the
   *      {@link ngRoute.$route#$routeChangeError $routeChangeError} event is fired. The map object
   *      is:
   *
   *      - `key` – `{string}`: a name of a dependency to be injected into the controller.
   *      - `factory` - `{string|function}`: If `string` then it is an alias for a service.
   *        Otherwise if function, then it is {@link auto.$injector#invoke injected}
   *        and the return value is treated as the dependency. If the result is a promise, it is
   *        resolved before its value is injected into the controller. Be aware that
   *        `ngRoute.$routeParams` will still refer to the previous route within these resolve
   *        functions.  Use `$route.current.params` to access the new route parameters, instead.
   *
   *    - `redirectTo` – {(string|function())=} – value to update
   *      {@link ng.$location $location} path with and trigger route redirection.
   *
   *      If `redirectTo` is a function, it will be called with the following parameters:
   *
   *      - `{Object.<string>}` - route parameters extracted from the current
   *        `$location.path()` by applying the current route templateUrl.
   *      - `{string}` - current `$location.path()`
   *      - `{Object}` - current `$location.search()`
   *
   *      The custom `redirectTo` function is expected to return a string which will be used
   *      to update `$location.path()` and `$location.search()`.
   *
   *    - `[reloadOnSearch=true]` - {boolean=} - reload route when only `$location.search()`
   *      or `$location.hash()` changes.
   *
   *      If the option is set to `false` and url in the browser changes, then
   *      `$routeUpdate` event is broadcasted on the root scope.
   *
   *    - `[caseInsensitiveMatch=false]` - {boolean=} - match routes without being case sensitive
   *
   *      If the option is set to `true`, then the particular route can be matched without being
   *      case sensitive
   *
   * @returns {Object} self
   *
   * @description
   * Adds a new route definition to the `$route` service.
   */
  this.when = function(path, route) {
    //copy original route object to preserve params inherited from proto chain
    var routeCopy = angular.copy(route);
    if (angular.isUndefined(routeCopy.reloadOnSearch)) {
      routeCopy.reloadOnSearch = true;
    }
    if (angular.isUndefined(routeCopy.caseInsensitiveMatch)) {
      routeCopy.caseInsensitiveMatch = this.caseInsensitiveMatch;
    }
    routes[path] = angular.extend(
      routeCopy,
      path && pathRegExp(path, routeCopy)
    );

    // create redirection for trailing slashes
    if (path) {
      var redirectPath = (path[path.length - 1] == '/')
            ? path.substr(0, path.length - 1)
            : path + '/';

      routes[redirectPath] = angular.extend(
        {redirectTo: path},
        pathRegExp(redirectPath, routeCopy)
      );
    }

    return this;
  };

  /**
   * @ngdoc property
   * @name $routeProvider#caseInsensitiveMatch
   * @description
   *
   * A boolean property indicating if routes defined
   * using this provider should be matched using a case insensitive
   * algorithm. Defaults to `false`.
   */
  this.caseInsensitiveMatch = false;

   /**
    * @param path {string} path
    * @param opts {Object} options
    * @return {?Object}
    *
    * @description
    * Normalizes the given path, returning a regular expression
    * and the original path.
    *
    * Inspired by pathRexp in visionmedia/express/lib/utils.js.
    */
  function pathRegExp(path, opts) {
    var insensitive = opts.caseInsensitiveMatch,
        ret = {
          originalPath: path,
          regexp: path
        },
        keys = ret.keys = [];

    path = path
      .replace(/([().])/g, '\\$1')
      .replace(/(\/)?:(\w+)([\?\*])?/g, function(_, slash, key, option) {
        var optional = option === '?' ? option : null;
        var star = option === '*' ? option : null;
        keys.push({ name: key, optional: !!optional });
        slash = slash || '';
        return ''
          + (optional ? '' : slash)
          + '(?:'
          + (optional ? slash : '')
          + (star && '(.+?)' || '([^/]+)')
          + (optional || '')
          + ')'
          + (optional || '');
      })
      .replace(/([\/$\*])/g, '\\$1');

    ret.regexp = new RegExp('^' + path + '$', insensitive ? 'i' : '');
    return ret;
  }

  /**
   * @ngdoc method
   * @name $routeProvider#otherwise
   *
   * @description
   * Sets route definition that will be used on route change when no other route definition
   * is matched.
   *
   * @param {Object|string} params Mapping information to be assigned to `$route.current`.
   * If called with a string, the value maps to `redirectTo`.
   * @returns {Object} self
   */
  this.otherwise = function(params) {
    if (typeof params === 'string') {
      params = {redirectTo: params};
    }
    this.when(null, params);
    return this;
  };


  this.$get = ['$rootScope',
               '$location',
               '$routeParams',
               '$q',
               '$injector',
               '$templateRequest',
               '$sce',
      function($rootScope, $location, $routeParams, $q, $injector, $templateRequest, $sce) {

    /**
     * @ngdoc service
     * @name $route
     * @requires $location
     * @requires $routeParams
     *
     * @property {Object} current Reference to the current route definition.
     * The route definition contains:
     *
     *   - `controller`: The controller constructor as define in route definition.
     *   - `locals`: A map of locals which is used by {@link ng.$controller $controller} service for
     *     controller instantiation. The `locals` contain
     *     the resolved values of the `resolve` map. Additionally the `locals` also contain:
     *
     *     - `$scope` - The current route scope.
     *     - `$template` - The current route template HTML.
     *
     * @property {Object} routes Object with all route configuration Objects as its properties.
     *
     * @description
     * `$route` is used for deep-linking URLs to controllers and views (HTML partials).
     * It watches `$location.url()` and tries to map the path to an existing route definition.
     *
     * Requires the {@link ngRoute `ngRoute`} module to be installed.
     *
     * You can define routes through {@link ngRoute.$routeProvider $routeProvider}'s API.
     *
     * The `$route` service is typically used in conjunction with the
     * {@link ngRoute.directive:ngView `ngView`} directive and the
     * {@link ngRoute.$routeParams `$routeParams`} service.
     *
     * @example
     * This example shows how changing the URL hash causes the `$route` to match a route against the
     * URL, and the `ngView` pulls in the partial.
     *
     * <example name="$route-service" module="ngRouteExample"
     *          deps="angular-route.js" fixBase="true">
     *   <file name="index.html">
     *     <div ng-controller="MainController">
     *       Choose:
     *       <a href="Book/Moby">Moby</a> |
     *       <a href="Book/Moby/ch/1">Moby: Ch1</a> |
     *       <a href="Book/Gatsby">Gatsby</a> |
     *       <a href="Book/Gatsby/ch/4?key=value">Gatsby: Ch4</a> |
     *       <a href="Book/Scarlet">Scarlet Letter</a><br/>
     *
     *       <div ng-view></div>
     *
     *       <hr />
     *
     *       <pre>$location.path() = {{$location.path()}}</pre>
     *       <pre>$route.current.templateUrl = {{$route.current.templateUrl}}</pre>
     *       <pre>$route.current.params = {{$route.current.params}}</pre>
     *       <pre>$route.current.scope.name = {{$route.current.scope.name}}</pre>
     *       <pre>$routeParams = {{$routeParams}}</pre>
     *     </div>
     *   </file>
     *
     *   <file name="book.html">
     *     controller: {{name}}<br />
     *     Book Id: {{params.bookId}}<br />
     *   </file>
     *
     *   <file name="chapter.html">
     *     controller: {{name}}<br />
     *     Book Id: {{params.bookId}}<br />
     *     Chapter Id: {{params.chapterId}}
     *   </file>
     *
     *   <file name="script.js">
     *     angular.module('ngRouteExample', ['ngRoute'])
     *
     *      .controller('MainController', function($scope, $route, $routeParams, $location) {
     *          $scope.$route = $route;
     *          $scope.$location = $location;
     *          $scope.$routeParams = $routeParams;
     *      })
     *
     *      .controller('BookController', function($scope, $routeParams) {
     *          $scope.name = "BookController";
     *          $scope.params = $routeParams;
     *      })
     *
     *      .controller('ChapterController', function($scope, $routeParams) {
     *          $scope.name = "ChapterController";
     *          $scope.params = $routeParams;
     *      })
     *
     *     .config(function($routeProvider, $locationProvider) {
     *       $routeProvider
     *        .when('/Book/:bookId', {
     *         templateUrl: 'book.html',
     *         controller: 'BookController',
     *         resolve: {
     *           // I will cause a 1 second delay
     *           delay: function($q, $timeout) {
     *             var delay = $q.defer();
     *             $timeout(delay.resolve, 1000);
     *             return delay.promise;
     *           }
     *         }
     *       })
     *       .when('/Book/:bookId/ch/:chapterId', {
     *         templateUrl: 'chapter.html',
     *         controller: 'ChapterController'
     *       });
     *
     *       // configure html5 to get links working on jsfiddle
     *       $locationProvider.html5Mode(true);
     *     });
     *
     *   </file>
     *
     *   <file name="protractor.js" type="protractor">
     *     it('should load and compile correct template', function() {
     *       element(by.linkText('Moby: Ch1')).click();
     *       var content = element(by.css('[ng-view]')).getText();
     *       expect(content).toMatch(/controller\: ChapterController/);
     *       expect(content).toMatch(/Book Id\: Moby/);
     *       expect(content).toMatch(/Chapter Id\: 1/);
     *
     *       element(by.partialLinkText('Scarlet')).click();
     *
     *       content = element(by.css('[ng-view]')).getText();
     *       expect(content).toMatch(/controller\: BookController/);
     *       expect(content).toMatch(/Book Id\: Scarlet/);
     *     });
     *   </file>
     * </example>
     */

    /**
     * @ngdoc event
     * @name $route#$routeChangeStart
     * @eventType broadcast on root scope
     * @description
     * Broadcasted before a route change. At this  point the route services starts
     * resolving all of the dependencies needed for the route change to occur.
     * Typically this involves fetching the view template as well as any dependencies
     * defined in `resolve` route property. Once  all of the dependencies are resolved
     * `$routeChangeSuccess` is fired.
     *
     * The route change (and the `$location` change that triggered it) can be prevented
     * by calling `preventDefault` method of the event. See {@link ng.$rootScope.Scope#$on}
     * for more details about event object.
     *
     * @param {Object} angularEvent Synthetic event object.
     * @param {Route} next Future route information.
     * @param {Route} current Current route information.
     */

    /**
     * @ngdoc event
     * @name $route#$routeChangeSuccess
     * @eventType broadcast on root scope
     * @description
     * Broadcasted after a route dependencies are resolved.
     * {@link ngRoute.directive:ngView ngView} listens for the directive
     * to instantiate the controller and render the view.
     *
     * @param {Object} angularEvent Synthetic event object.
     * @param {Route} current Current route information.
     * @param {Route|Undefined} previous Previous route information, or undefined if current is
     * first route entered.
     */

    /**
     * @ngdoc event
     * @name $route#$routeChangeError
     * @eventType broadcast on root scope
     * @description
     * Broadcasted if any of the resolve promises are rejected.
     *
     * @param {Object} angularEvent Synthetic event object
     * @param {Route} current Current route information.
     * @param {Route} previous Previous route information.
     * @param {Route} rejection Rejection of the promise. Usually the error of the failed promise.
     */

    /**
     * @ngdoc event
     * @name $route#$routeUpdate
     * @eventType broadcast on root scope
     * @description
     *
     * The `reloadOnSearch` property has been set to false, and we are reusing the same
     * instance of the Controller.
     */

    var forceReload = false,
        preparedRoute,
        preparedRouteIsUpdateOnly,
        $route = {
          routes: routes,

          /**
           * @ngdoc method
           * @name $route#reload
           *
           * @description
           * Causes `$route` service to reload the current route even if
           * {@link ng.$location $location} hasn't changed.
           *
           * As a result of that, {@link ngRoute.directive:ngView ngView}
           * creates new scope and reinstantiates the controller.
           */
          reload: function() {
            forceReload = true;
            $rootScope.$evalAsync(function() {
              // Don't support cancellation of a reload for now...
              prepareRoute();
              commitRoute();
            });
          },

          /**
           * @ngdoc method
           * @name $route#updateParams
           *
           * @description
           * Causes `$route` service to update the current URL, replacing
           * current route parameters with those specified in `newParams`.
           * Provided property names that match the route's path segment
           * definitions will be interpolated into the location's path, while
           * remaining properties will be treated as query params.
           *
           * @param {!Object<string, string>} newParams mapping of URL parameter names to values
           */
          updateParams: function(newParams) {
            if (this.current && this.current.$$route) {
              newParams = angular.extend({}, this.current.params, newParams);
              $location.path(interpolate(this.current.$$route.originalPath, newParams));
              // interpolate modifies newParams, only query params are left
              $location.search(newParams);
            } else {
              throw $routeMinErr('norout', 'Tried updating route when with no current route');
            }
          }
        };

    $rootScope.$on('$locationChangeStart', prepareRoute);
    $rootScope.$on('$locationChangeSuccess', commitRoute);

    return $route;

    /////////////////////////////////////////////////////

    /**
     * @param on {string} current url
     * @param route {Object} route regexp to match the url against
     * @return {?Object}
     *
     * @description
     * Check if the route matches the current url.
     *
     * Inspired by match in
     * visionmedia/express/lib/router/router.js.
     */
    function switchRouteMatcher(on, route) {
      var keys = route.keys,
          params = {};

      if (!route.regexp) return null;

      var m = route.regexp.exec(on);
      if (!m) return null;

      for (var i = 1, len = m.length; i < len; ++i) {
        var key = keys[i - 1];

        var val = m[i];

        if (key && val) {
          params[key.name] = val;
        }
      }
      return params;
    }

    function prepareRoute($locationEvent) {
      var lastRoute = $route.current;

      preparedRoute = parseRoute();
      preparedRouteIsUpdateOnly = preparedRoute && lastRoute && preparedRoute.$$route === lastRoute.$$route
          && angular.equals(preparedRoute.pathParams, lastRoute.pathParams)
          && !preparedRoute.reloadOnSearch && !forceReload;

      if (!preparedRouteIsUpdateOnly && (lastRoute || preparedRoute)) {
        if ($rootScope.$broadcast('$routeChangeStart', preparedRoute, lastRoute).defaultPrevented) {
          if ($locationEvent) {
            $locationEvent.preventDefault();
          }
        }
      }
    }

    function commitRoute() {
      var lastRoute = $route.current;
      var nextRoute = preparedRoute;

      if (preparedRouteIsUpdateOnly) {
        lastRoute.params = nextRoute.params;
        angular.copy(lastRoute.params, $routeParams);
        $rootScope.$broadcast('$routeUpdate', lastRoute);
      } else if (nextRoute || lastRoute) {
        forceReload = false;
        $route.current = nextRoute;
        if (nextRoute) {
          if (nextRoute.redirectTo) {
            if (angular.isString(nextRoute.redirectTo)) {
              $location.path(interpolate(nextRoute.redirectTo, nextRoute.params)).search(nextRoute.params)
                       .replace();
            } else {
              $location.url(nextRoute.redirectTo(nextRoute.pathParams, $location.path(), $location.search()))
                       .replace();
            }
          }
        }

        $q.when(nextRoute).
          then(function() {
            if (nextRoute) {
              var locals = angular.extend({}, nextRoute.resolve),
                  template, templateUrl;

              angular.forEach(locals, function(value, key) {
                locals[key] = angular.isString(value) ?
                    $injector.get(value) : $injector.invoke(value, null, null, key);
              });

              if (angular.isDefined(template = nextRoute.template)) {
                if (angular.isFunction(template)) {
                  template = template(nextRoute.params);
                }
              } else if (angular.isDefined(templateUrl = nextRoute.templateUrl)) {
                if (angular.isFunction(templateUrl)) {
                  templateUrl = templateUrl(nextRoute.params);
                }
                templateUrl = $sce.getTrustedResourceUrl(templateUrl);
                if (angular.isDefined(templateUrl)) {
                  nextRoute.loadedTemplateUrl = templateUrl;
                  template = $templateRequest(templateUrl);
                }
              }
              if (angular.isDefined(template)) {
                locals['$template'] = template;
              }
              return $q.all(locals);
            }
          }).
          then(function(locals) {
            // after route change
            if (nextRoute == $route.current) {
              if (nextRoute) {
                nextRoute.locals = locals;
                angular.copy(nextRoute.params, $routeParams);
              }
              $rootScope.$broadcast('$routeChangeSuccess', nextRoute, lastRoute);
            }
          }, function(error) {
            if (nextRoute == $route.current) {
              $rootScope.$broadcast('$routeChangeError', nextRoute, lastRoute, error);
            }
          });
      }
    }


    /**
     * @returns {Object} the current active route, by matching it against the URL
     */
    function parseRoute() {
      // Match a route
      var params, match;
      angular.forEach(routes, function(route, path) {
        if (!match && (params = switchRouteMatcher($location.path(), route))) {
          match = inherit(route, {
            params: angular.extend({}, $location.search(), params),
            pathParams: params});
          match.$$route = route;
        }
      });
      // No route matched; fallback to "otherwise" route
      return match || routes[null] && inherit(routes[null], {params: {}, pathParams:{}});
    }

    /**
     * @returns {string} interpolation of the redirect path with the parameters
     */
    function interpolate(string, params) {
      var result = [];
      angular.forEach((string || '').split(':'), function(segment, i) {
        if (i === 0) {
          result.push(segment);
        } else {
          var segmentMatch = segment.match(/(\w+)(?:[?*])?(.*)/);
          var key = segmentMatch[1];
          result.push(params[key]);
          result.push(segmentMatch[2] || '');
          delete params[key];
        }
      });
      return result.join('');
    }
  }];
}

ngRouteModule.provider('$routeParams', $RouteParamsProvider);


/**
 * @ngdoc service
 * @name $routeParams
 * @requires $route
 *
 * @description
 * The `$routeParams` service allows you to retrieve the current set of route parameters.
 *
 * Requires the {@link ngRoute `ngRoute`} module to be installed.
 *
 * The route parameters are a combination of {@link ng.$location `$location`}'s
 * {@link ng.$location#search `search()`} and {@link ng.$location#path `path()`}.
 * The `path` parameters are extracted when the {@link ngRoute.$route `$route`} path is matched.
 *
 * In case of parameter name collision, `path` params take precedence over `search` params.
 *
 * The service guarantees that the identity of the `$routeParams` object will remain unchanged
 * (but its properties will likely change) even when a route change occurs.
 *
 * Note that the `$routeParams` are only updated *after* a route change completes successfully.
 * This means that you cannot rely on `$routeParams` being correct in route resolve functions.
 * Instead you can use `$route.current.params` to access the new route's parameters.
 *
 * @example
 * ```js
 *  // Given:
 *  // URL: http://server.com/index.html#/Chapter/1/Section/2?search=moby
 *  // Route: /Chapter/:chapterId/Section/:sectionId
 *  //
 *  // Then
 *  $routeParams ==> {chapterId:'1', sectionId:'2', search:'moby'}
 * ```
 */
function $RouteParamsProvider() {
  this.$get = function() { return {}; };
}

ngRouteModule.directive('ngView', ngViewFactory);
ngRouteModule.directive('ngView', ngViewFillContentFactory);


/**
 * @ngdoc directive
 * @name ngView
 * @restrict ECA
 *
 * @description
 * # Overview
 * `ngView` is a directive that complements the {@link ngRoute.$route $route} service by
 * including the rendered template of the current route into the main layout (`index.html`) file.
 * Every time the current route changes, the included view changes with it according to the
 * configuration of the `$route` service.
 *
 * Requires the {@link ngRoute `ngRoute`} module to be installed.
 *
 * @animations
 * enter - animation is used to bring new content into the browser.
 * leave - animation is used to animate existing content away.
 *
 * The enter and leave animation occur concurrently.
 *
 * @scope
 * @priority 400
 * @param {string=} onload Expression to evaluate whenever the view updates.
 *
 * @param {string=} autoscroll Whether `ngView` should call {@link ng.$anchorScroll
 *                  $anchorScroll} to scroll the viewport after the view is updated.
 *
 *                  - If the attribute is not set, disable scrolling.
 *                  - If the attribute is set without value, enable scrolling.
 *                  - Otherwise enable scrolling only if the `autoscroll` attribute value evaluated
 *                    as an expression yields a truthy value.
 * @example
    <example name="ngView-directive" module="ngViewExample"
             deps="angular-route.js;angular-animate.js"
             animations="true" fixBase="true">
      <file name="index.html">
        <div ng-controller="MainCtrl as main">
          Choose:
          <a href="Book/Moby">Moby</a> |
          <a href="Book/Moby/ch/1">Moby: Ch1</a> |
          <a href="Book/Gatsby">Gatsby</a> |
          <a href="Book/Gatsby/ch/4?key=value">Gatsby: Ch4</a> |
          <a href="Book/Scarlet">Scarlet Letter</a><br/>

          <div class="view-animate-container">
            <div ng-view class="view-animate"></div>
          </div>
          <hr />

          <pre>$location.path() = {{main.$location.path()}}</pre>
          <pre>$route.current.templateUrl = {{main.$route.current.templateUrl}}</pre>
          <pre>$route.current.params = {{main.$route.current.params}}</pre>
          <pre>$routeParams = {{main.$routeParams}}</pre>
        </div>
      </file>

      <file name="book.html">
        <div>
          controller: {{book.name}}<br />
          Book Id: {{book.params.bookId}}<br />
        </div>
      </file>

      <file name="chapter.html">
        <div>
          controller: {{chapter.name}}<br />
          Book Id: {{chapter.params.bookId}}<br />
          Chapter Id: {{chapter.params.chapterId}}
        </div>
      </file>

      <file name="animations.css">
        .view-animate-container {
          position:relative;
          height:100px!important;
          background:white;
          border:1px solid black;
          height:40px;
          overflow:hidden;
        }

        .view-animate {
          padding:10px;
        }

        .view-animate.ng-enter, .view-animate.ng-leave {
          -webkit-transition:all cubic-bezier(0.250, 0.460, 0.450, 0.940) 1.5s;
          transition:all cubic-bezier(0.250, 0.460, 0.450, 0.940) 1.5s;

          display:block;
          width:100%;
          border-left:1px solid black;

          position:absolute;
          top:0;
          left:0;
          right:0;
          bottom:0;
          padding:10px;
        }

        .view-animate.ng-enter {
          left:100%;
        }
        .view-animate.ng-enter.ng-enter-active {
          left:0;
        }
        .view-animate.ng-leave.ng-leave-active {
          left:-100%;
        }
      </file>

      <file name="script.js">
        angular.module('ngViewExample', ['ngRoute', 'ngAnimate'])
          .config(['$routeProvider', '$locationProvider',
            function($routeProvider, $locationProvider) {
              $routeProvider
                .when('/Book/:bookId', {
                  templateUrl: 'book.html',
                  controller: 'BookCtrl',
                  controllerAs: 'book'
                })
                .when('/Book/:bookId/ch/:chapterId', {
                  templateUrl: 'chapter.html',
                  controller: 'ChapterCtrl',
                  controllerAs: 'chapter'
                });

              $locationProvider.html5Mode(true);
          }])
          .controller('MainCtrl', ['$route', '$routeParams', '$location',
            function($route, $routeParams, $location) {
              this.$route = $route;
              this.$location = $location;
              this.$routeParams = $routeParams;
          }])
          .controller('BookCtrl', ['$routeParams', function($routeParams) {
            this.name = "BookCtrl";
            this.params = $routeParams;
          }])
          .controller('ChapterCtrl', ['$routeParams', function($routeParams) {
            this.name = "ChapterCtrl";
            this.params = $routeParams;
          }]);

      </file>

      <file name="protractor.js" type="protractor">
        it('should load and compile correct template', function() {
          element(by.linkText('Moby: Ch1')).click();
          var content = element(by.css('[ng-view]')).getText();
          expect(content).toMatch(/controller\: ChapterCtrl/);
          expect(content).toMatch(/Book Id\: Moby/);
          expect(content).toMatch(/Chapter Id\: 1/);

          element(by.partialLinkText('Scarlet')).click();

          content = element(by.css('[ng-view]')).getText();
          expect(content).toMatch(/controller\: BookCtrl/);
          expect(content).toMatch(/Book Id\: Scarlet/);
        });
      </file>
    </example>
 */


/**
 * @ngdoc event
 * @name ngView#$viewContentLoaded
 * @eventType emit on the current ngView scope
 * @description
 * Emitted every time the ngView content is reloaded.
 */
ngViewFactory.$inject = ['$route', '$anchorScroll', '$animate'];
function ngViewFactory($route, $anchorScroll, $animate) {
  return {
    restrict: 'ECA',
    terminal: true,
    priority: 400,
    transclude: 'element',
    link: function(scope, $element, attr, ctrl, $transclude) {
        var currentScope,
            currentElement,
            previousLeaveAnimation,
            autoScrollExp = attr.autoscroll,
            onloadExp = attr.onload || '';

        scope.$on('$routeChangeSuccess', update);
        update();

        function cleanupLastView() {
          if (previousLeaveAnimation) {
            $animate.cancel(previousLeaveAnimation);
            previousLeaveAnimation = null;
          }

          if (currentScope) {
            currentScope.$destroy();
            currentScope = null;
          }
          if (currentElement) {
            previousLeaveAnimation = $animate.leave(currentElement);
            previousLeaveAnimation.then(function() {
              previousLeaveAnimation = null;
            });
            currentElement = null;
          }
        }

        function update() {
          var locals = $route.current && $route.current.locals,
              template = locals && locals.$template;

          if (angular.isDefined(template)) {
            var newScope = scope.$new();
            var current = $route.current;

            // Note: This will also link all children of ng-view that were contained in the original
            // html. If that content contains controllers, ... they could pollute/change the scope.
            // However, using ng-view on an element with additional content does not make sense...
            // Note: We can't remove them in the cloneAttchFn of $transclude as that
            // function is called before linking the content, which would apply child
            // directives to non existing elements.
            var clone = $transclude(newScope, function(clone) {
              $animate.enter(clone, null, currentElement || $element).then(function onNgViewEnter() {
                if (angular.isDefined(autoScrollExp)
                  && (!autoScrollExp || scope.$eval(autoScrollExp))) {
                  $anchorScroll();
                }
              });
              cleanupLastView();
            });

            currentElement = clone;
            currentScope = current.scope = newScope;
            currentScope.$emit('$viewContentLoaded');
            currentScope.$eval(onloadExp);
          } else {
            cleanupLastView();
          }
        }
    }
  };
}

// This directive is called during the $transclude call of the first `ngView` directive.
// It will replace and compile the content of the element with the loaded template.
// We need this directive so that the element content is already filled when
// the link function of another directive on the same element as ngView
// is called.
ngViewFillContentFactory.$inject = ['$compile', '$controller', '$route'];
function ngViewFillContentFactory($compile, $controller, $route) {
  return {
    restrict: 'ECA',
    priority: -400,
    link: function(scope, $element) {
      var current = $route.current,
          locals = current.locals;

      $element.html(locals.$template);

      var link = $compile($element.contents());

      if (current.controller) {
        locals.$scope = scope;
        var controller = $controller(current.controller, locals);
        if (current.controllerAs) {
          scope[current.controllerAs] = controller;
        }
        $element.data('$ngControllerController', controller);
        $element.children().data('$ngControllerController', controller);
      }

      link(scope);
    }
  };
}


})(window, window.angular);

define("ngRoute", function(){});

/**
 * @license AngularJS v1.4.0-beta.5
 * (c) 2010-2015 Google, Inc. http://angularjs.org
 * License: MIT
 */
(function(window, angular, undefined) {

var $resourceMinErr = angular.$$minErr('$resource');

// Helper functions and regex to lookup a dotted path on an object
// stopping at undefined/null.  The path must be composed of ASCII
// identifiers (just like $parse)
var MEMBER_NAME_REGEX = /^(\.[a-zA-Z_$][0-9a-zA-Z_$]*)+$/;

function isValidDottedPath(path) {
  return (path != null && path !== '' && path !== 'hasOwnProperty' &&
      MEMBER_NAME_REGEX.test('.' + path));
}

function lookupDottedPath(obj, path) {
  if (!isValidDottedPath(path)) {
    throw $resourceMinErr('badmember', 'Dotted member path "@{0}" is invalid.', path);
  }
  var keys = path.split('.');
  for (var i = 0, ii = keys.length; i < ii && obj !== undefined; i++) {
    var key = keys[i];
    obj = (obj !== null) ? obj[key] : undefined;
  }
  return obj;
}

/**
 * Create a shallow copy of an object and clear other fields from the destination
 */
function shallowClearAndCopy(src, dst) {
  dst = dst || {};

  angular.forEach(dst, function(value, key) {
    delete dst[key];
  });

  for (var key in src) {
    if (src.hasOwnProperty(key) && !(key.charAt(0) === '$' && key.charAt(1) === '$')) {
      dst[key] = src[key];
    }
  }

  return dst;
}

/**
 * @ngdoc module
 * @name ngResource
 * @description
 *
 * # ngResource
 *
 * The `ngResource` module provides interaction support with RESTful services
 * via the $resource service.
 *
 *
 * <div doc-module-components="ngResource"></div>
 *
 * See {@link ngResource.$resource `$resource`} for usage.
 */

/**
 * @ngdoc service
 * @name $resource
 * @requires $http
 *
 * @description
 * A factory which creates a resource object that lets you interact with
 * [RESTful](http://en.wikipedia.org/wiki/Representational_State_Transfer) server-side data sources.
 *
 * The returned resource object has action methods which provide high-level behaviors without
 * the need to interact with the low level {@link ng.$http $http} service.
 *
 * Requires the {@link ngResource `ngResource`} module to be installed.
 *
 * By default, trailing slashes will be stripped from the calculated URLs,
 * which can pose problems with server backends that do not expect that
 * behavior.  This can be disabled by configuring the `$resourceProvider` like
 * this:
 *
 * ```js
     app.config(['$resourceProvider', function($resourceProvider) {
       // Don't strip trailing slashes from calculated URLs
       $resourceProvider.defaults.stripTrailingSlashes = false;
     }]);
 * ```
 *
 * @param {string} url A parameterized URL template with parameters prefixed by `:` as in
 *   `/user/:username`. If you are using a URL with a port number (e.g.
 *   `http://example.com:8080/api`), it will be respected.
 *
 *   If you are using a url with a suffix, just add the suffix, like this:
 *   `$resource('http://example.com/resource.json')` or `$resource('http://example.com/:id.json')`
 *   or even `$resource('http://example.com/resource/:resource_id.:format')`
 *   If the parameter before the suffix is empty, :resource_id in this case, then the `/.` will be
 *   collapsed down to a single `.`.  If you need this sequence to appear and not collapse then you
 *   can escape it with `/\.`.
 *
 * @param {Object=} paramDefaults Default values for `url` parameters. These can be overridden in
 *   `actions` methods. If any of the parameter value is a function, it will be executed every time
 *   when a param value needs to be obtained for a request (unless the param was overridden).
 *
 *   Each key value in the parameter object is first bound to url template if present and then any
 *   excess keys are appended to the url search query after the `?`.
 *
 *   Given a template `/path/:verb` and parameter `{verb:'greet', salutation:'Hello'}` results in
 *   URL `/path/greet?salutation=Hello`.
 *
 *   If the parameter value is prefixed with `@` then the value for that parameter will be extracted
 *   from the corresponding property on the `data` object (provided when calling an action method).  For
 *   example, if the `defaultParam` object is `{someParam: '@someProp'}` then the value of `someParam`
 *   will be `data.someProp`.
 *
 * @param {Object.<Object>=} actions Hash with declaration of custom actions that should extend
 *   the default set of resource actions. The declaration should be created in the format of {@link
 *   ng.$http#usage $http.config}:
 *
 *       {action1: {method:?, params:?, isArray:?, headers:?, ...},
 *        action2: {method:?, params:?, isArray:?, headers:?, ...},
 *        ...}
 *
 *   Where:
 *
 *   - **`action`** – {string} – The name of action. This name becomes the name of the method on
 *     your resource object.
 *   - **`method`** – {string} – Case insensitive HTTP method (e.g. `GET`, `POST`, `PUT`,
 *     `DELETE`, `JSONP`, etc).
 *   - **`params`** – {Object=} – Optional set of pre-bound parameters for this action. If any of
 *     the parameter value is a function, it will be executed every time when a param value needs to
 *     be obtained for a request (unless the param was overridden).
 *   - **`url`** – {string} – action specific `url` override. The url templating is supported just
 *     like for the resource-level urls.
 *   - **`isArray`** – {boolean=} – If true then the returned object for this action is an array,
 *     see `returns` section.
 *   - **`transformRequest`** –
 *     `{function(data, headersGetter)|Array.<function(data, headersGetter)>}` –
 *     transform function or an array of such functions. The transform function takes the http
 *     request body and headers and returns its transformed (typically serialized) version.
 *     By default, transformRequest will contain one function that checks if the request data is
 *     an object and serializes to using `angular.toJson`. To prevent this behavior, set
 *     `transformRequest` to an empty array: `transformRequest: []`
 *   - **`transformResponse`** –
 *     `{function(data, headersGetter)|Array.<function(data, headersGetter)>}` –
 *     transform function or an array of such functions. The transform function takes the http
 *     response body and headers and returns its transformed (typically deserialized) version.
 *     By default, transformResponse will contain one function that checks if the response looks like
 *     a JSON string and deserializes it using `angular.fromJson`. To prevent this behavior, set
 *     `transformResponse` to an empty array: `transformResponse: []`
 *   - **`cache`** – `{boolean|Cache}` – If true, a default $http cache will be used to cache the
 *     GET request, otherwise if a cache instance built with
 *     {@link ng.$cacheFactory $cacheFactory}, this cache will be used for
 *     caching.
 *   - **`timeout`** – `{number|Promise}` – timeout in milliseconds, or {@link ng.$q promise} that
 *     should abort the request when resolved.
 *   - **`withCredentials`** - `{boolean}` - whether to set the `withCredentials` flag on the
 *     XHR object. See
 *     [requests with credentials](https://developer.mozilla.org/en/http_access_control#section_5)
 *     for more information.
 *   - **`responseType`** - `{string}` - see
 *     [requestType](https://developer.mozilla.org/en-US/docs/DOM/XMLHttpRequest#responseType).
 *   - **`interceptor`** - `{Object=}` - The interceptor object has two optional methods -
 *     `response` and `responseError`. Both `response` and `responseError` interceptors get called
 *     with `http response` object. See {@link ng.$http $http interceptors}.
 *
 * @param {Object} options Hash with custom settings that should extend the
 *   default `$resourceProvider` behavior.  The only supported option is
 *
 *   Where:
 *
 *   - **`stripTrailingSlashes`** – {boolean} – If true then the trailing
 *   slashes from any calculated URL will be stripped. (Defaults to true.)
 *
 * @returns {Object} A resource "class" object with methods for the default set of resource actions
 *   optionally extended with custom `actions`. The default set contains these actions:
 *   ```js
 *   { 'get':    {method:'GET'},
 *     'save':   {method:'POST'},
 *     'query':  {method:'GET', isArray:true},
 *     'remove': {method:'DELETE'},
 *     'delete': {method:'DELETE'} };
 *   ```
 *
 *   Calling these methods invoke an {@link ng.$http} with the specified http method,
 *   destination and parameters. When the data is returned from the server then the object is an
 *   instance of the resource class. The actions `save`, `remove` and `delete` are available on it
 *   as  methods with the `$` prefix. This allows you to easily perform CRUD operations (create,
 *   read, update, delete) on server-side data like this:
 *   ```js
 *   var User = $resource('/user/:userId', {userId:'@id'});
 *   var user = User.get({userId:123}, function() {
 *     user.abc = true;
 *     user.$save();
 *   });
 *   ```
 *
 *   It is important to realize that invoking a $resource object method immediately returns an
 *   empty reference (object or array depending on `isArray`). Once the data is returned from the
 *   server the existing reference is populated with the actual data. This is a useful trick since
 *   usually the resource is assigned to a model which is then rendered by the view. Having an empty
 *   object results in no rendering, once the data arrives from the server then the object is
 *   populated with the data and the view automatically re-renders itself showing the new data. This
 *   means that in most cases one never has to write a callback function for the action methods.
 *
 *   The action methods on the class object or instance object can be invoked with the following
 *   parameters:
 *
 *   - HTTP GET "class" actions: `Resource.action([parameters], [success], [error])`
 *   - non-GET "class" actions: `Resource.action([parameters], postData, [success], [error])`
 *   - non-GET instance actions:  `instance.$action([parameters], [success], [error])`
 *
 *
 *   Success callback is called with (value, responseHeaders) arguments. Error callback is called
 *   with (httpResponse) argument.
 *
 *   Class actions return empty instance (with additional properties below).
 *   Instance actions return promise of the action.
 *
 *   The Resource instances and collection have these additional properties:
 *
 *   - `$promise`: the {@link ng.$q promise} of the original server interaction that created this
 *     instance or collection.
 *
 *     On success, the promise is resolved with the same resource instance or collection object,
 *     updated with data from server. This makes it easy to use in
 *     {@link ngRoute.$routeProvider resolve section of $routeProvider.when()} to defer view
 *     rendering until the resource(s) are loaded.
 *
 *     On failure, the promise is resolved with the {@link ng.$http http response} object, without
 *     the `resource` property.
 *
 *     If an interceptor object was provided, the promise will instead be resolved with the value
 *     returned by the interceptor.
 *
 *   - `$resolved`: `true` after first server interaction is completed (either with success or
 *      rejection), `false` before that. Knowing if the Resource has been resolved is useful in
 *      data-binding.
 *
 * @example
 *
 * # Credit card resource
 *
 * ```js
     // Define CreditCard class
     var CreditCard = $resource('/user/:userId/card/:cardId',
      {userId:123, cardId:'@id'}, {
       charge: {method:'POST', params:{charge:true}}
      });

     // We can retrieve a collection from the server
     var cards = CreditCard.query(function() {
       // GET: /user/123/card
       // server returns: [ {id:456, number:'1234', name:'Smith'} ];

       var card = cards[0];
       // each item is an instance of CreditCard
       expect(card instanceof CreditCard).toEqual(true);
       card.name = "J. Smith";
       // non GET methods are mapped onto the instances
       card.$save();
       // POST: /user/123/card/456 {id:456, number:'1234', name:'J. Smith'}
       // server returns: {id:456, number:'1234', name: 'J. Smith'};

       // our custom method is mapped as well.
       card.$charge({amount:9.99});
       // POST: /user/123/card/456?amount=9.99&charge=true {id:456, number:'1234', name:'J. Smith'}
     });

     // we can create an instance as well
     var newCard = new CreditCard({number:'0123'});
     newCard.name = "Mike Smith";
     newCard.$save();
     // POST: /user/123/card {number:'0123', name:'Mike Smith'}
     // server returns: {id:789, number:'0123', name: 'Mike Smith'};
     expect(newCard.id).toEqual(789);
 * ```
 *
 * The object returned from this function execution is a resource "class" which has "static" method
 * for each action in the definition.
 *
 * Calling these methods invoke `$http` on the `url` template with the given `method`, `params` and
 * `headers`.
 * When the data is returned from the server then the object is an instance of the resource type and
 * all of the non-GET methods are available with `$` prefix. This allows you to easily support CRUD
 * operations (create, read, update, delete) on server-side data.

   ```js
     var User = $resource('/user/:userId', {userId:'@id'});
     User.get({userId:123}, function(user) {
       user.abc = true;
       user.$save();
     });
   ```
 *
 * It's worth noting that the success callback for `get`, `query` and other methods gets passed
 * in the response that came from the server as well as $http header getter function, so one
 * could rewrite the above example and get access to http headers as:
 *
   ```js
     var User = $resource('/user/:userId', {userId:'@id'});
     User.get({userId:123}, function(u, getResponseHeaders){
       u.abc = true;
       u.$save(function(u, putResponseHeaders) {
         //u => saved user object
         //putResponseHeaders => $http header getter
       });
     });
   ```
 *
 * You can also access the raw `$http` promise via the `$promise` property on the object returned
 *
   ```
     var User = $resource('/user/:userId', {userId:'@id'});
     User.get({userId:123})
         .$promise.then(function(user) {
           $scope.user = user;
         });
   ```

 * # Creating a custom 'PUT' request
 * In this example we create a custom method on our resource to make a PUT request
 * ```js
 *    var app = angular.module('app', ['ngResource', 'ngRoute']);
 *
 *    // Some APIs expect a PUT request in the format URL/object/ID
 *    // Here we are creating an 'update' method
 *    app.factory('Notes', ['$resource', function($resource) {
 *    return $resource('/notes/:id', null,
 *        {
 *            'update': { method:'PUT' }
 *        });
 *    }]);
 *
 *    // In our controller we get the ID from the URL using ngRoute and $routeParams
 *    // We pass in $routeParams and our Notes factory along with $scope
 *    app.controller('NotesCtrl', ['$scope', '$routeParams', 'Notes',
                                      function($scope, $routeParams, Notes) {
 *    // First get a note object from the factory
 *    var note = Notes.get({ id:$routeParams.id });
 *    $id = note.id;
 *
 *    // Now call update passing in the ID first then the object you are updating
 *    Notes.update({ id:$id }, note);
 *
 *    // This will PUT /notes/ID with the note object in the request payload
 *    }]);
 * ```
 */
angular.module('ngResource', ['ng']).
  provider('$resource', function() {
    var provider = this;

    this.defaults = {
      // Strip slashes by default
      stripTrailingSlashes: true,

      // Default actions configuration
      actions: {
        'get': {method: 'GET'},
        'save': {method: 'POST'},
        'query': {method: 'GET', isArray: true},
        'remove': {method: 'DELETE'},
        'delete': {method: 'DELETE'}
      }
    };

    this.$get = ['$http', '$q', function($http, $q) {

      var noop = angular.noop,
        forEach = angular.forEach,
        extend = angular.extend,
        copy = angular.copy,
        isFunction = angular.isFunction;

      /**
       * We need our custom method because encodeURIComponent is too aggressive and doesn't follow
       * http://www.ietf.org/rfc/rfc3986.txt with regards to the character set
       * (pchar) allowed in path segments:
       *    segment       = *pchar
       *    pchar         = unreserved / pct-encoded / sub-delims / ":" / "@"
       *    pct-encoded   = "%" HEXDIG HEXDIG
       *    unreserved    = ALPHA / DIGIT / "-" / "." / "_" / "~"
       *    sub-delims    = "!" / "$" / "&" / "'" / "(" / ")"
       *                     / "*" / "+" / "," / ";" / "="
       */
      function encodeUriSegment(val) {
        return encodeUriQuery(val, true).
          replace(/%26/gi, '&').
          replace(/%3D/gi, '=').
          replace(/%2B/gi, '+');
      }


      /**
       * This method is intended for encoding *key* or *value* parts of query component. We need a
       * custom method because encodeURIComponent is too aggressive and encodes stuff that doesn't
       * have to be encoded per http://tools.ietf.org/html/rfc3986:
       *    query       = *( pchar / "/" / "?" )
       *    pchar         = unreserved / pct-encoded / sub-delims / ":" / "@"
       *    unreserved    = ALPHA / DIGIT / "-" / "." / "_" / "~"
       *    pct-encoded   = "%" HEXDIG HEXDIG
       *    sub-delims    = "!" / "$" / "&" / "'" / "(" / ")"
       *                     / "*" / "+" / "," / ";" / "="
       */
      function encodeUriQuery(val, pctEncodeSpaces) {
        return encodeURIComponent(val).
          replace(/%40/gi, '@').
          replace(/%3A/gi, ':').
          replace(/%24/g, '$').
          replace(/%2C/gi, ',').
          replace(/%20/g, (pctEncodeSpaces ? '%20' : '+'));
      }

      function Route(template, defaults) {
        this.template = template;
        this.defaults = extend({}, provider.defaults, defaults);
        this.urlParams = {};
      }

      Route.prototype = {
        setUrlParams: function(config, params, actionUrl) {
          var self = this,
            url = actionUrl || self.template,
            val,
            encodedVal;

          var urlParams = self.urlParams = {};
          forEach(url.split(/\W/), function(param) {
            if (param === 'hasOwnProperty') {
              throw $resourceMinErr('badname', "hasOwnProperty is not a valid parameter name.");
            }
            if (!(new RegExp("^\\d+$").test(param)) && param &&
              (new RegExp("(^|[^\\\\]):" + param + "(\\W|$)").test(url))) {
              urlParams[param] = true;
            }
          });
          url = url.replace(/\\:/g, ':');

          params = params || {};
          forEach(self.urlParams, function(_, urlParam) {
            val = params.hasOwnProperty(urlParam) ? params[urlParam] : self.defaults[urlParam];
            if (angular.isDefined(val) && val !== null) {
              encodedVal = encodeUriSegment(val);
              url = url.replace(new RegExp(":" + urlParam + "(\\W|$)", "g"), function(match, p1) {
                return encodedVal + p1;
              });
            } else {
              url = url.replace(new RegExp("(\/?):" + urlParam + "(\\W|$)", "g"), function(match,
                  leadingSlashes, tail) {
                if (tail.charAt(0) == '/') {
                  return tail;
                } else {
                  return leadingSlashes + tail;
                }
              });
            }
          });

          // strip trailing slashes and set the url (unless this behavior is specifically disabled)
          if (self.defaults.stripTrailingSlashes) {
            url = url.replace(/\/+$/, '') || '/';
          }

          // then replace collapse `/.` if found in the last URL path segment before the query
          // E.g. `http://url.com/id./format?q=x` becomes `http://url.com/id.format?q=x`
          url = url.replace(/\/\.(?=\w+($|\?))/, '.');
          // replace escaped `/\.` with `/.`
          config.url = url.replace(/\/\\\./, '/.');


          // set params - delegate param encoding to $http
          forEach(params, function(value, key) {
            if (!self.urlParams[key]) {
              config.params = config.params || {};
              config.params[key] = value;
            }
          });
        }
      };


      function resourceFactory(url, paramDefaults, actions, options) {
        var route = new Route(url, options);

        actions = extend({}, provider.defaults.actions, actions);

        function extractParams(data, actionParams) {
          var ids = {};
          actionParams = extend({}, paramDefaults, actionParams);
          forEach(actionParams, function(value, key) {
            if (isFunction(value)) { value = value(); }
            ids[key] = value && value.charAt && value.charAt(0) == '@' ?
              lookupDottedPath(data, value.substr(1)) : value;
          });
          return ids;
        }

        function defaultResponseInterceptor(response) {
          return response.resource;
        }

        function Resource(value) {
          shallowClearAndCopy(value || {}, this);
        }

        Resource.prototype.toJSON = function() {
          var data = extend({}, this);
          delete data.$promise;
          delete data.$resolved;
          return data;
        };

        forEach(actions, function(action, name) {
          var hasBody = /^(POST|PUT|PATCH)$/i.test(action.method);

          Resource[name] = function(a1, a2, a3, a4) {
            var params = {}, data, success, error;

            /* jshint -W086 */ /* (purposefully fall through case statements) */
            switch (arguments.length) {
              case 4:
                error = a4;
                success = a3;
              //fallthrough
              case 3:
              case 2:
                if (isFunction(a2)) {
                  if (isFunction(a1)) {
                    success = a1;
                    error = a2;
                    break;
                  }

                  success = a2;
                  error = a3;
                  //fallthrough
                } else {
                  params = a1;
                  data = a2;
                  success = a3;
                  break;
                }
              case 1:
                if (isFunction(a1)) success = a1;
                else if (hasBody) data = a1;
                else params = a1;
                break;
              case 0: break;
              default:
                throw $resourceMinErr('badargs',
                  "Expected up to 4 arguments [params, data, success, error], got {0} arguments",
                  arguments.length);
            }
            /* jshint +W086 */ /* (purposefully fall through case statements) */

            var isInstanceCall = this instanceof Resource;
            var value = isInstanceCall ? data : (action.isArray ? [] : new Resource(data));
            var httpConfig = {};
            var responseInterceptor = action.interceptor && action.interceptor.response ||
              defaultResponseInterceptor;
            var responseErrorInterceptor = action.interceptor && action.interceptor.responseError ||
              undefined;

            forEach(action, function(value, key) {
              if (key != 'params' && key != 'isArray' && key != 'interceptor') {
                httpConfig[key] = copy(value);
              }
            });

            if (hasBody) httpConfig.data = data;
            route.setUrlParams(httpConfig,
              extend({}, extractParams(data, action.params || {}), params),
              action.url);

            var promise = $http(httpConfig).then(function(response) {
              var data = response.data,
                promise = value.$promise;

              if (data) {
                // Need to convert action.isArray to boolean in case it is undefined
                // jshint -W018
                if (angular.isArray(data) !== (!!action.isArray)) {
                  throw $resourceMinErr('badcfg',
                      'Error in resource configuration for action `{0}`. Expected response to ' +
                      'contain an {1} but got an {2}', name, action.isArray ? 'array' : 'object',
                    angular.isArray(data) ? 'array' : 'object');
                }
                // jshint +W018
                if (action.isArray) {
                  value.length = 0;
                  forEach(data, function(item) {
                    if (typeof item === "object") {
                      value.push(new Resource(item));
                    } else {
                      // Valid JSON values may be string literals, and these should not be converted
                      // into objects. These items will not have access to the Resource prototype
                      // methods, but unfortunately there
                      value.push(item);
                    }
                  });
                } else {
                  shallowClearAndCopy(data, value);
                  value.$promise = promise;
                }
              }

              value.$resolved = true;

              response.resource = value;

              return response;
            }, function(response) {
              value.$resolved = true;

              (error || noop)(response);

              return $q.reject(response);
            });

            promise = promise.then(
              function(response) {
                var value = responseInterceptor(response);
                (success || noop)(value, response.headers);
                return value;
              },
              responseErrorInterceptor);

            if (!isInstanceCall) {
              // we are creating instance / collection
              // - set the initial promise
              // - return the instance / collection
              value.$promise = promise;
              value.$resolved = false;

              return value;
            }

            // instance call
            return promise;
          };


          Resource.prototype['$' + name] = function(params, success, error) {
            if (isFunction(params)) {
              error = success; success = params; params = {};
            }
            var result = Resource[name].call(this, params, this, success, error);
            return result.$promise || result;
          };
        });

        Resource.bind = function(additionalParamDefaults) {
          return resourceFactory(url, extend({}, paramDefaults, additionalParamDefaults), actions);
        };

        return Resource;
      }

      return resourceFactory;
    }];
  });


})(window, window.angular);

define("ngResource", function(){});

require.config({
	skipDataMain: true,
	baseUrl: 	ajax_object.plugin_url+'js/angularjs/',
	paths: {
		'domReady': './libs/domReady',
		'angular': './libs/angular/angular',
		'iscroll': './libs/iscroll-master/iscroll',
		'mousetrap': './libs/mousetrap',
		'lightbox': './libs/jquery_awslightbox/jquery.awslightbox',
		'modernizr': './libs/modernizr',
		'awslideshow': './libs/jquery_awsslideshow/jquery.awslideshow',
		'ngRoute': './libs/angular/angular-route',
		'ngResource': './libs/angular/angular-resource',
		'ngAnimate': './libs/angular/angular-animate',
		'ngSanitize': './libs/angular/angular-sanitize'
	},
	shim: {
		angular: {
			exports: 'angular'
		},
		ngResource: {
			deps: ['angular'],
			exports: 'ngResource'
		},
		ngRoute: {
	  		deps: ['angular'],
			exports: 'ngRoute'
		},
		ngAnimate: {
	  		deps: ['angular'],
			exports: 'ngAnimate'
		},
		ngSanitize: {
	  		deps: ['angular'],
			exports: 'ngSanitize'
		}
	}
}); 

require(['awsslideshow', 'angular', 'iscroll', 'mousetrap', 'modernizr', 'awslideshow', 'ngRoute', 'ngResource'], function (AwsslideshowModule) {
	
	AwsslideshowModule.init();
	
});
define("main", function(){});

