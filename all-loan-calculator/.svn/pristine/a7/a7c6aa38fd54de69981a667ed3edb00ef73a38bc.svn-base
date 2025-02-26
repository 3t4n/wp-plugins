//     Underscore.js 1.3.3
//     (c) 2009-2012 Jeremy Ashkenas, DocumentCloud Inc.
//     Underscore is freely distributable under the MIT license.
//     Portions of Underscore are inspired or borrowed from Prototype,
//     Oliver Steele's Functional, and John Resig's Micro-Templating.
//     For all details and documentation:
//     http://documentcloud.github.com/underscore
(function(b,f){var a=0,e=/^ui-id-\d+$/;
b.ui=b.ui||{};
if(b.ui.version){return
}b.extend(b.ui,{version:"1.9.2",keyCode:{BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38}});
b.fn.extend({_focus:b.fn.focus,focus:function(g,h){return typeof g==="number"?this.each(function(){var i=this;
setTimeout(function(){b(i).focus();
if(h){h.call(i)
}},g)
}):this._focus.apply(this,arguments)
},scrollParent:function(){var g;
if((b.ui.ie&&(/(static|relative)/).test(this.css("position")))||(/absolute/).test(this.css("position"))){g=this.parents().filter(function(){return(/(relative|absolute|fixed)/).test(b.css(this,"position"))&&(/(auto|scroll)/).test(b.css(this,"overflow")+b.css(this,"overflow-y")+b.css(this,"overflow-x"))
}).eq(0)
}else{g=this.parents().filter(function(){return(/(auto|scroll)/).test(b.css(this,"overflow")+b.css(this,"overflow-y")+b.css(this,"overflow-x"))
}).eq(0)
}return(/fixed/).test(this.css("position"))||!g.length?b(document):g
},zIndex:function(j){if(j!==f){return this.css("zIndex",j)
}if(this.length){var h=b(this[0]),g,i;
while(h.length&&h[0]!==document){g=h.css("position");
if(g==="absolute"||g==="relative"||g==="fixed"){i=parseInt(h.css("zIndex"),10);
if(!isNaN(i)&&i!==0){return i
}}h=h.parent()
}}return 0
},uniqueId:function(){return this.each(function(){if(!this.id){this.id="ui-id-"+(++a)
}})
},removeUniqueId:function(){return this.each(function(){if(e.test(this.id)){b(this).removeAttr("id")
}})
}});
function d(i,g){var k,j,h,l=i.nodeName.toLowerCase();
if("area"===l){k=i.parentNode;
j=k.name;
if(!i.href||!j||k.nodeName.toLowerCase()!=="map"){return false
}h=b("img[usemap=#"+j+"]")[0];
return !!h&&c(h)
}return(/input|select|textarea|button|object/.test(l)?!i.disabled:"a"===l?i.href||g:g)&&c(i)
}function c(g){return b.expr.filters.visible(g)&&!b(g).parents().andSelf().filter(function(){return b.css(this,"visibility")==="hidden"
}).length
}b.extend(b.expr[":"],{data:b.expr.createPseudo?b.expr.createPseudo(function(g){return function(h){return !!b.data(h,g)
}
}):function(j,h,g){return !!b.data(j,g[3])
},focusable:function(g){return d(g,!isNaN(b.attr(g,"tabindex")))
},tabbable:function(i){var g=b.attr(i,"tabindex"),h=isNaN(g);
return(h||g>=0)&&d(i,!h)
}});
b(function(){var g=document.body,h=g.appendChild(h=document.createElement("div"));
h.offsetHeight;
b.extend(h.style,{minHeight:"100px",height:"auto",padding:0,borderWidth:0});
b.support.minHeight=h.offsetHeight===100;
b.support.selectstart="onselectstart" in h;
g.removeChild(h).style.display="none"
});
if(!b("<a>").outerWidth(1).jquery){b.each(["Width","Height"],function(j,g){var h=g==="Width"?["Left","Right"]:["Top","Bottom"],k=g.toLowerCase(),m={innerWidth:b.fn.innerWidth,innerHeight:b.fn.innerHeight,outerWidth:b.fn.outerWidth,outerHeight:b.fn.outerHeight};
function l(o,n,i,p){b.each(h,function(){n-=parseFloat(b.css(o,"padding"+this))||0;
if(i){n-=parseFloat(b.css(o,"border"+this+"Width"))||0
}if(p){n-=parseFloat(b.css(o,"margin"+this))||0
}});
return n
}b.fn["inner"+g]=function(i){if(i===f){return m["inner"+g].call(this)
}return this.each(function(){b(this).css(k,l(this,i)+"px")
})
};
b.fn["outer"+g]=function(i,n){if(typeof i!=="number"){return m["outer"+g].call(this,i)
}return this.each(function(){b(this).css(k,l(this,i,true,n)+"px")
})
}
})
}if(b("<a>").data("a-b","a").removeData("a-b").data("a-b")){b.fn.removeData=(function(g){return function(h){if(arguments.length){return g.call(this,b.camelCase(h))
}else{return g.call(this)
}}
})(b.fn.removeData)
}(function(){var g=/msie ([\w.]+)/.exec(navigator.userAgent.toLowerCase())||[];
b.ui.ie=g.length?true:false;
b.ui.ie6=parseFloat(g[1],10)===6
})();
b.fn.extend({disableSelection:function(){return this.bind((b.support.selectstart?"selectstart":"mousedown")+".ui-disableSelection",function(g){g.preventDefault()
})
},enableSelection:function(){return this.unbind(".ui-disableSelection")
}});
b.extend(b.ui,{plugin:{add:function(h,j,l){var g,k=b.ui[h].prototype;
for(g in l){k.plugins[g]=k.plugins[g]||[];
k.plugins[g].push([j,l[g]])
}},call:function(g,j,h){var k,l=g.plugins[j];
if(!l||!g.element[0].parentNode||g.element[0].parentNode.nodeType===11){return
}for(k=0;
k<l.length;
k++){if(g.options[l[k][0]]){l[k][1].apply(g.element,h)
}}}},contains:b.contains,hasScroll:function(j,h){if(b(j).css("overflow")==="hidden"){return false
}var g=(h&&h==="left")?"scrollLeft":"scrollTop",i=false;
if(j[g]>0){return true
}j[g]=1;
i=(j[g]>0);
j[g]=0;
return i
},isOverAxis:function(h,g,i){return(h>g)&&(h<(g+i))
},isOver:function(l,h,k,j,g,i){return b.ui.isOverAxis(l,k,g)&&b.ui.isOverAxis(h,j,i)
}})
})(jQuery);
(function(b,e){var a=0,d=Array.prototype.slice,c=b.cleanData;
b.cleanData=function(f){for(var g=0,h;
(h=f[g])!=null;
g++){try{b(h).triggerHandler("remove")
}catch(j){}}c(f)
};
b.widget=function(g,j,f){var m,l,i,k,h=g.split(".")[0];
g=g.split(".")[1];
m=h+"-"+g;
if(!f){f=j;
j=b.Widget
}b.expr[":"][m.toLowerCase()]=function(n){return !!b.data(n,m)
};
b[h]=b[h]||{};
l=b[h][g];
i=b[h][g]=function(n,o){if(!this._createWidget){return new i(n,o)
}if(arguments.length){this._createWidget(n,o)
}};
b.extend(i,l,{version:f.version,_proto:b.extend({},f),_childConstructors:[]});
k=new j();
k.options=b.widget.extend({},k.options);
b.each(f,function(o,n){if(b.isFunction(n)){f[o]=(function(){var p=function(){return j.prototype[o].apply(this,arguments)
},q=function(r){return j.prototype[o].apply(this,r)
};
return function(){var t=this._super,r=this._superApply,s;
this._super=p;
this._superApply=q;
s=n.apply(this,arguments);
this._super=t;
this._superApply=r;
return s
}
})()
}});
i.prototype=b.widget.extend(k,{widgetEventPrefix:l?k.widgetEventPrefix:g},f,{constructor:i,namespace:h,widgetName:g,widgetBaseClass:m,widgetFullName:m});
if(l){b.each(l._childConstructors,function(o,p){var n=p.prototype;
b.widget(n.namespace+"."+n.widgetName,i,p._proto)
});
delete l._childConstructors
}else{j._childConstructors.push(i)
}b.widget.bridge(g,i)
};
b.widget.extend=function(k){var g=d.call(arguments,1),j=0,f=g.length,h,i;
for(;
j<f;
j++){for(h in g[j]){i=g[j][h];
if(g[j].hasOwnProperty(h)&&i!==e){if(b.isPlainObject(i)){k[h]=b.isPlainObject(k[h])?b.widget.extend({},k[h],i):b.widget.extend({},i)
}else{k[h]=i
}}}}return k
};
b.widget.bridge=function(g,f){var h=f.prototype.widgetFullName||g;
b.fn[g]=function(k){var i=typeof k==="string",j=d.call(arguments,1),l=this;
k=!i&&j.length?b.widget.extend.apply(null,[k].concat(j)):k;
if(i){this.each(function(){var n,m=b.data(this,h);
if(!m){return b.error("cannot call methods on "+g+" prior to initialization; attempted to call method '"+k+"'")
}if(!b.isFunction(m[k])||k.charAt(0)==="_"){return b.error("no such method '"+k+"' for "+g+" widget instance")
}n=m[k].apply(m,j);
if(n!==m&&n!==e){l=n&&n.jquery?l.pushStack(n.get()):n;
return false
}})
}else{this.each(function(){var m=b.data(this,h);
if(m){m.option(k||{})._init()
}else{b.data(this,h,new f(k,this))
}})
}return l
}
};
b.Widget=function(){};
b.Widget._childConstructors=[];
b.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",defaultElement:"<div>",options:{disabled:false,create:null},_createWidget:function(f,g){g=b(g||this.defaultElement||this)[0];
this.element=b(g);
this.uuid=a++;
this.eventNamespace="."+this.widgetName+this.uuid;
this.options=b.widget.extend({},this.options,this._getCreateOptions(),f);
this.bindings=b();
this.hoverable=b();
this.focusable=b();
if(g!==this){b.data(g,this.widgetName,this);
b.data(g,this.widgetFullName,this);
this._on(true,this.element,{remove:function(h){if(h.target===g){this.destroy()
}}});
this.document=b(g.style?g.ownerDocument:g.document||g);
this.window=b(this.document[0].defaultView||this.document[0].parentWindow)
}this._create();
this._trigger("create",null,this._getCreateEventData());
this._init()
},_getCreateOptions:b.noop,_getCreateEventData:b.noop,_create:b.noop,_init:b.noop,destroy:function(){this._destroy();
this.element.unbind(this.eventNamespace).removeData(this.widgetName).removeData(this.widgetFullName).removeData(b.camelCase(this.widgetFullName));
this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName+"-disabled ui-state-disabled");
this.bindings.unbind(this.eventNamespace);
this.hoverable.removeClass("ui-state-hover");
this.focusable.removeClass("ui-state-focus")
},_destroy:b.noop,widget:function(){return this.element
},option:function(j,k){var f=j,l,h,g;
if(arguments.length===0){return b.widget.extend({},this.options)
}if(typeof j==="string"){f={};
l=j.split(".");
j=l.shift();
if(l.length){h=f[j]=b.widget.extend({},this.options[j]);
for(g=0;
g<l.length-1;
g++){h[l[g]]=h[l[g]]||{};
h=h[l[g]]
}j=l.pop();
if(k===e){return h[j]===e?null:h[j]
}h[j]=k
}else{if(k===e){return this.options[j]===e?null:this.options[j]
}f[j]=k
}}this._setOptions(f);
return this
},_setOptions:function(f){var g;
for(g in f){this._setOption(g,f[g])
}return this
},_setOption:function(f,g){this.options[f]=g;
if(f==="disabled"){this.widget().toggleClass(this.widgetFullName+"-disabled ui-state-disabled",!!g).attr("aria-disabled",g);
this.hoverable.removeClass("ui-state-hover");
this.focusable.removeClass("ui-state-focus")
}return this
},enable:function(){return this._setOption("disabled",false)
},disable:function(){return this._setOption("disabled",true)
},_on:function(i,h,g){var j,f=this;
if(typeof i!=="boolean"){g=h;
h=i;
i=false
}if(!g){g=h;
h=this.element;
j=this.widget()
}else{h=j=b(h);
this.bindings=this.bindings.add(h)
}b.each(g,function(p,o){function m(){if(!i&&(f.options.disabled===true||b(this).hasClass("ui-state-disabled"))){return
}return(typeof o==="string"?f[o]:o).apply(f,arguments)
}if(typeof o!=="string"){m.guid=o.guid=o.guid||m.guid||b.guid++
}var n=p.match(/^(\w+)\s*(.*)$/),l=n[1]+f.eventNamespace,k=n[2];
if(k){j.delegate(k,l,m)
}else{h.bind(l,m)
}})
},_off:function(g,f){f=(f||"").split(" ").join(this.eventNamespace+" ")+this.eventNamespace;
g.unbind(f).undelegate(f)
},_delay:function(i,h){function g(){return(typeof i==="string"?f[i]:i).apply(f,arguments)
}var f=this;
return setTimeout(g,h||0)
},_hoverable:function(f){this.hoverable=this.hoverable.add(f);
this._on(f,{mouseenter:function(g){b(g.currentTarget).addClass("ui-state-hover")
},mouseleave:function(g){b(g.currentTarget).removeClass("ui-state-hover")
}})
},_focusable:function(f){this.focusable=this.focusable.add(f);
this._on(f,{focusin:function(g){b(g.currentTarget).addClass("ui-state-focus")
},focusout:function(g){b(g.currentTarget).removeClass("ui-state-focus")
}})
},_trigger:function(f,g,h){var k,j,i=this.options[f];
h=h||{};
g=b.Event(g);
g.type=(f===this.widgetEventPrefix?f:this.widgetEventPrefix+f).toLowerCase();
g.target=this.element[0];
j=g.originalEvent;
if(j){for(k in j){if(!(k in g)){g[k]=j[k]
}}}this.element.trigger(g,h);
return !(b.isFunction(i)&&i.apply(this.element[0],[g].concat(h))===false||g.isDefaultPrevented())
}};
b.each({show:"fadeIn",hide:"fadeOut"},function(g,f){b.Widget.prototype["_"+g]=function(j,i,l){if(typeof i==="string"){i={effect:i}
}var k,h=!i?g:i===true||typeof i==="number"?f:i.effect||f;
i=i||{};
if(typeof i==="number"){i={duration:i}
}k=!b.isEmptyObject(i);
i.complete=l;
if(i.delay){j.delay(i.delay)
}if(k&&b.effects&&(b.effects.effect[h]||b.uiBackCompat!==false&&b.effects[h])){j[g](i)
}else{if(h!==g&&j[h]){j[h](i.duration,i.easing,l)
}else{j.queue(function(m){b(this)[g]();
if(l){l.call(j[0])
}m()
})
}}}
});
if(b.uiBackCompat!==false){b.Widget.prototype._getCreateOptions=function(){return b.metadata&&b.metadata.get(this.element[0])[this.widgetName]
}
}})(jQuery);
(function(b,c){var a=false;
b(document).mouseup(function(d){a=false
});
b.widget("ui.mouse",{version:"1.9.2",options:{cancel:"input,textarea,button,select,option",distance:1,delay:0},_mouseInit:function(){var d=this;
this.element.bind("mousedown."+this.widgetName,function(e){return d._mouseDown(e)
}).bind("click."+this.widgetName,function(e){if(true===b.data(e.target,d.widgetName+".preventClickEvent")){b.removeData(e.target,d.widgetName+".preventClickEvent");
e.stopImmediatePropagation();
return false
}});
this.started=false
},_mouseDestroy:function(){this.element.unbind("."+this.widgetName);
if(this._mouseMoveDelegate){b(document).unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate)
}},_mouseDown:function(f){if(a){return
}(this._mouseStarted&&this._mouseUp(f));
this._mouseDownEvent=f;
var e=this,g=(f.which===1),d=(typeof this.options.cancel==="string"&&f.target.nodeName?b(f.target).closest(this.options.cancel).length:false);
if(!g||d||!this._mouseCapture(f)){return true
}this.mouseDelayMet=!this.options.delay;
if(!this.mouseDelayMet){this._mouseDelayTimer=setTimeout(function(){e.mouseDelayMet=true
},this.options.delay)
}if(this._mouseDistanceMet(f)&&this._mouseDelayMet(f)){this._mouseStarted=(this._mouseStart(f)!==false);
if(!this._mouseStarted){f.preventDefault();
return true
}}if(true===b.data(f.target,this.widgetName+".preventClickEvent")){b.removeData(f.target,this.widgetName+".preventClickEvent")
}this._mouseMoveDelegate=function(h){return e._mouseMove(h)
};
this._mouseUpDelegate=function(h){return e._mouseUp(h)
};
b(document).bind("mousemove."+this.widgetName,this._mouseMoveDelegate).bind("mouseup."+this.widgetName,this._mouseUpDelegate);
f.preventDefault();
a=true;
return true
},_mouseMove:function(d){if(b.ui.ie&&!(document.documentMode>=9)&&!d.button){return this._mouseUp(d)
}if(this._mouseStarted){this._mouseDrag(d);
return d.preventDefault()
}if(this._mouseDistanceMet(d)&&this._mouseDelayMet(d)){this._mouseStarted=(this._mouseStart(this._mouseDownEvent,d)!==false);
(this._mouseStarted?this._mouseDrag(d):this._mouseUp(d))
}return !this._mouseStarted
},_mouseUp:function(d){b(document).unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate);
if(this._mouseStarted){this._mouseStarted=false;
if(d.target===this._mouseDownEvent.target){b.data(d.target,this.widgetName+".preventClickEvent",true)
}this._mouseStop(d)
}return false
},_mouseDistanceMet:function(d){return(Math.max(Math.abs(this._mouseDownEvent.pageX-d.pageX),Math.abs(this._mouseDownEvent.pageY-d.pageY))>=this.options.distance)
},_mouseDelayMet:function(d){return this.mouseDelayMet
},_mouseStart:function(d){},_mouseDrag:function(d){},_mouseStop:function(d){},_mouseCapture:function(d){return true
}})
})(jQuery);
(function(e,c){e.ui=e.ui||{};
var i,j=Math.max,n=Math.abs,l=Math.round,d=/left|center|right/,g=/top|center|bottom/,a=/[\+\-]\d+%?/,k=/^\w+/,b=/%$/,f=e.fn.position;
function m(q,p,o){return[parseInt(q[0],10)*(b.test(q[0])?p/100:1),parseInt(q[1],10)*(b.test(q[1])?o/100:1)]
}function h(o,p){return parseInt(e.css(o,p),10)||0
}e.position={scrollbarWidth:function(){if(i!==c){return i
}var p,o,r=e("<div style='display:block;width:50px;height:50px;overflow:hidden;'><div style='height:100px;width:auto;'></div></div>"),q=r.children()[0];
e("body").append(r);
p=q.offsetWidth;
r.css("overflow","scroll");
o=q.offsetWidth;
if(p===o){o=r[0].clientWidth
}r.remove();
return(i=p-o)
},getScrollInfo:function(s){var r=s.isWindow?"":s.element.css("overflow-x"),q=s.isWindow?"":s.element.css("overflow-y"),p=r==="scroll"||(r==="auto"&&s.width<s.element[0].scrollWidth),o=q==="scroll"||(q==="auto"&&s.height<s.element[0].scrollHeight);
return{width:p?e.position.scrollbarWidth():0,height:o?e.position.scrollbarWidth():0}
},getWithinInfo:function(p){var q=e(p||window),o=e.isWindow(q[0]);
return{element:q,isWindow:o,offset:q.offset()||{left:0,top:0},scrollLeft:q.scrollLeft(),scrollTop:q.scrollTop(),width:o?q.width():q.outerWidth(),height:o?q.height():q.outerHeight()}
}};
e.fn.position=function(y){if(!y||!y.of){return f.apply(this,arguments)
}y=e.extend({},y);
var z,v,s,x,r,u=e(y.of),q=e.position.getWithinInfo(y.within),o=e.position.getScrollInfo(q),t=u[0],w=(y.collision||"flip").split(" "),p={};
if(t.nodeType===9){v=u.width();
s=u.height();
x={top:0,left:0}
}else{if(e.isWindow(t)){v=u.width();
s=u.height();
x={top:u.scrollTop(),left:u.scrollLeft()}
}else{if(t.preventDefault){y.at="left top";
v=s=0;
x={top:t.pageY,left:t.pageX}
}else{v=u.outerWidth();
s=u.outerHeight();
x=u.offset()
}}}r=e.extend({},x);
e.each(["my","at"],function(){var C=(y[this]||"").split(" "),B,A;
if(C.length===1){C=d.test(C[0])?C.concat(["center"]):g.test(C[0])?["center"].concat(C):["center","center"]
}C[0]=d.test(C[0])?C[0]:"center";
C[1]=g.test(C[1])?C[1]:"center";
B=a.exec(C[0]);
A=a.exec(C[1]);
p[this]=[B?B[0]:0,A?A[0]:0];
y[this]=[k.exec(C[0])[0],k.exec(C[1])[0]]
});
if(w.length===1){w[1]=w[0]
}if(y.at[0]==="right"){r.left+=v
}else{if(y.at[0]==="center"){r.left+=v/2
}}if(y.at[1]==="bottom"){r.top+=s
}else{if(y.at[1]==="center"){r.top+=s/2
}}z=m(p.at,v,s);
r.left+=z[0];
r.top+=z[1];
return this.each(function(){var B,K,D=e(this),F=D.outerWidth(),C=D.outerHeight(),E=h(this,"marginLeft"),A=h(this,"marginTop"),J=F+E+h(this,"marginRight")+o.width,I=C+A+h(this,"marginBottom")+o.height,G=e.extend({},r),H=m(p.my,D.outerWidth(),D.outerHeight());
if(y.my[0]==="right"){G.left-=F
}else{if(y.my[0]==="center"){G.left-=F/2
}}if(y.my[1]==="bottom"){G.top-=C
}else{if(y.my[1]==="center"){G.top-=C/2
}}G.left+=H[0];
G.top+=H[1];
if(!e.support.offsetFractions){G.left=l(G.left);
G.top=l(G.top)
}B={marginLeft:E,marginTop:A};
e.each(["left","top"],function(M,L){if(e.ui.position[w[M]]){e.ui.position[w[M]][L](G,{targetWidth:v,targetHeight:s,elemWidth:F,elemHeight:C,collisionPosition:B,collisionWidth:J,collisionHeight:I,offset:[z[0]+H[0],z[1]+H[1]],my:y.my,at:y.at,within:q,elem:D})
}});
if(e.fn.bgiframe){D.bgiframe()
}if(y.using){K=function(O){var Q=x.left-G.left,N=Q+v-F,P=x.top-G.top,M=P+s-C,L={target:{element:u,left:x.left,top:x.top,width:v,height:s},element:{element:D,left:G.left,top:G.top,width:F,height:C},horizontal:N<0?"left":Q>0?"right":"center",vertical:M<0?"top":P>0?"bottom":"middle"};
if(v<F&&n(Q+N)<v){L.horizontal="center"
}if(s<C&&n(P+M)<s){L.vertical="middle"
}if(j(n(Q),n(N))>j(n(P),n(M))){L.important="horizontal"
}else{L.important="vertical"
}y.using.call(this,O,L)
}
}D.offset(e.extend(G,{using:K}))
})
};
e.ui.position={fit:{left:function(s,r){var q=r.within,u=q.isWindow?q.scrollLeft:q.offset.left,w=q.width,t=s.left-r.collisionPosition.marginLeft,v=u-t,p=t+r.collisionWidth-w-u,o;
if(r.collisionWidth>w){if(v>0&&p<=0){o=s.left+v+r.collisionWidth-w-u;
s.left+=v-o
}else{if(p>0&&v<=0){s.left=u
}else{if(v>p){s.left=u+w-r.collisionWidth
}else{s.left=u
}}}}else{if(v>0){s.left+=v
}else{if(p>0){s.left-=p
}else{s.left=j(s.left-t,s.left)
}}}},top:function(r,q){var p=q.within,v=p.isWindow?p.scrollTop:p.offset.top,w=q.within.height,t=r.top-q.collisionPosition.marginTop,u=v-t,s=t+q.collisionHeight-w-v,o;
if(q.collisionHeight>w){if(u>0&&s<=0){o=r.top+u+q.collisionHeight-w-v;
r.top+=u-o
}else{if(s>0&&u<=0){r.top=v
}else{if(u>s){r.top=v+w-q.collisionHeight
}else{r.top=v
}}}}else{if(u>0){r.top+=u
}else{if(s>0){r.top-=s
}else{r.top=j(r.top-t,r.top)
}}}}},flip:{left:function(u,t){var s=t.within,y=s.offset.left+s.scrollLeft,B=s.width,q=s.isWindow?s.scrollLeft:s.offset.left,v=u.left-t.collisionPosition.marginLeft,z=v-q,p=v+t.collisionWidth-B-q,x=t.my[0]==="left"?-t.elemWidth:t.my[0]==="right"?t.elemWidth:0,A=t.at[0]==="left"?t.targetWidth:t.at[0]==="right"?-t.targetWidth:0,r=-2*t.offset[0],o,w;
if(z<0){o=u.left+x+A+r+t.collisionWidth-B-y;
if(o<0||o<n(z)){u.left+=x+A+r
}}else{if(p>0){w=u.left-t.collisionPosition.marginLeft+x+A+r-q;
if(w>0||n(w)<p){u.left+=x+A+r
}}}},top:function(t,s){var r=s.within,A=r.offset.top+r.scrollTop,B=r.height,o=r.isWindow?r.scrollTop:r.offset.top,v=t.top-s.collisionPosition.marginTop,x=v-o,u=v+s.collisionHeight-B-o,y=s.my[1]==="top",w=y?-s.elemHeight:s.my[1]==="bottom"?s.elemHeight:0,C=s.at[1]==="top"?s.targetHeight:s.at[1]==="bottom"?-s.targetHeight:0,q=-2*s.offset[1],z,p;
if(x<0){p=t.top+w+C+q+s.collisionHeight-B-A;
if((t.top+w+C+q)>x&&(p<0||p<n(x))){t.top+=w+C+q
}}else{if(u>0){z=t.top-s.collisionPosition.marginTop+w+C+q-o;
if((t.top+w+C+q)>u&&(z>0||n(z)<u)){t.top+=w+C+q
}}}}},flipfit:{left:function(){e.ui.position.flip.left.apply(this,arguments);
e.ui.position.fit.left.apply(this,arguments)
},top:function(){e.ui.position.flip.top.apply(this,arguments);
e.ui.position.fit.top.apply(this,arguments)
}}};
(function(){var s,u,p,r,q,o=document.getElementsByTagName("body")[0],t=document.createElement("div");
s=document.createElement(o?"div":"body");
p={visibility:"hidden",width:0,height:0,border:0,margin:0,background:"none"};
if(o){e.extend(p,{position:"absolute",left:"-1000px",top:"-1000px"})
}for(q in p){s.style[q]=p[q]
}s.appendChild(t);
u=o||document.documentElement;
u.insertBefore(s,u.firstChild);
t.style.cssText="position: absolute; left: 10.7432222px;";
r=e(t).offset().left;
e.support.offsetFractions=r>10&&r<11;
s.innerHTML="";
u.removeChild(s)
})();
if(e.uiBackCompat!==false){(function(p){var o=p.fn.position;
p.fn.position=function(r){if(!r||!r.offset){return o.call(this,r)
}var s=r.offset.split(" "),q=r.at.split(" ");
if(s.length===1){s[1]=s[0]
}if(/^\d/.test(s[0])){s[0]="+"+s[0]
}if(/^\d/.test(s[1])){s[1]="+"+s[1]
}if(q.length===1){if(/left|center|right/.test(q[0])){q[1]="center"
}else{q[1]=q[0];
q[0]="center"
}}return o.call(this,p.extend(r,{at:q[0]+s[0]+" "+q[1]+s[1],offset:c}))
}
}(jQuery))
}}(jQuery));
(function(d,e){var b=0,c={},a={};
c.height=c.paddingTop=c.paddingBottom=c.borderTopWidth=c.borderBottomWidth="hide";
a.height=a.paddingTop=a.paddingBottom=a.borderTopWidth=a.borderBottomWidth="show";
d.widget("ui.accordion",{version:"1.9.2",options:{active:0,animate:{},collapsible:false,event:"click",header:"> li > :first-child,> :not(li):even",heightStyle:"auto",icons:{activeHeader:"ui-icon-triangle-1-s",header:"ui-icon-triangle-1-e"},activate:null,beforeActivate:null},_create:function(){var g=this.accordionId="ui-accordion-"+(this.element.attr("id")||++b),f=this.options;
this.prevShow=this.prevHide=d();
this.element.addClass("ui-accordion ui-widget ui-helper-reset");
this.headers=this.element.find(f.header).addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-all");
this._hoverable(this.headers);
this._focusable(this.headers);
this.headers.next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();
if(!f.collapsible&&(f.active===false||f.active==null)){f.active=0
}if(f.active<0){f.active+=this.headers.length
}this.active=this._findActive(f.active).addClass("ui-accordion-header-active ui-state-active").toggleClass("ui-corner-all ui-corner-top");
this.active.next().addClass("ui-accordion-content-active").show();
this._createIcons();
this.refresh();
this.element.attr("role","tablist");
this.headers.attr("role","tab").each(function(l){var m=d(this),k=m.attr("id"),h=m.next(),j=h.attr("id");
if(!k){k=g+"-header-"+l;
m.attr("id",k)
}if(!j){j=g+"-panel-"+l;
h.attr("id",j)
}m.attr("aria-controls",j);
h.attr("aria-labelledby",k)
}).next().attr("role","tabpanel");
this.headers.not(this.active).attr({"aria-selected":"false",tabIndex:-1}).next().attr({"aria-expanded":"false","aria-hidden":"true"}).hide();
if(!this.active.length){this.headers.eq(0).attr("tabIndex",0)
}else{this.active.attr({"aria-selected":"true",tabIndex:0}).next().attr({"aria-expanded":"true","aria-hidden":"false"})
}this._on(this.headers,{keydown:"_keydown"});
this._on(this.headers.next(),{keydown:"_panelKeyDown"});
this._setupEvents(f.event)
},_getCreateEventData:function(){return{header:this.active,content:!this.active.length?d():this.active.next()}
},_createIcons:function(){var f=this.options.icons;
if(f){d("<span>").addClass("ui-accordion-header-icon ui-icon "+f.header).prependTo(this.headers);
this.active.children(".ui-accordion-header-icon").removeClass(f.header).addClass(f.activeHeader);
this.headers.addClass("ui-accordion-icons")
}},_destroyIcons:function(){this.headers.removeClass("ui-accordion-icons").children(".ui-accordion-header-icon").remove()
},_destroy:function(){var f;
this.element.removeClass("ui-accordion ui-widget ui-helper-reset").removeAttr("role");
this.headers.removeClass("ui-accordion-header ui-accordion-header-active ui-helper-reset ui-state-default ui-corner-all ui-state-active ui-state-disabled ui-corner-top").removeAttr("role").removeAttr("aria-selected").removeAttr("aria-controls").removeAttr("tabIndex").each(function(){if(/^ui-accordion/.test(this.id)){this.removeAttribute("id")
}});
this._destroyIcons();
f=this.headers.next().css("display","").removeAttr("role").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeClass("ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content ui-accordion-content-active ui-state-disabled").each(function(){if(/^ui-accordion/.test(this.id)){this.removeAttribute("id")
}});
if(this.options.heightStyle!=="content"){f.css("height","")
}},_setOption:function(f,g){if(f==="active"){this._activate(g);
return
}if(f==="event"){if(this.options.event){this._off(this.headers,this.options.event)
}this._setupEvents(g)
}this._super(f,g);
if(f==="collapsible"&&!g&&this.options.active===false){this._activate(0)
}if(f==="icons"){this._destroyIcons();
if(g){this._createIcons()
}}if(f==="disabled"){this.headers.add(this.headers.next()).toggleClass("ui-state-disabled",!!g)
}},_keydown:function(i){if(i.altKey||i.ctrlKey){return
}var j=d.ui.keyCode,h=this.headers.length,f=this.headers.index(i.target),g=false;
switch(i.keyCode){case j.RIGHT:case j.DOWN:g=this.headers[(f+1)%h];
break;
case j.LEFT:case j.UP:g=this.headers[(f-1+h)%h];
break;
case j.SPACE:case j.ENTER:this._eventHandler(i);
break;
case j.HOME:g=this.headers[0];
break;
case j.END:g=this.headers[h-1];
break
}if(g){d(i.target).attr("tabIndex",-1);
d(g).attr("tabIndex",0);
g.focus();
i.preventDefault()
}},_panelKeyDown:function(f){if(f.keyCode===d.ui.keyCode.UP&&f.ctrlKey){d(f.currentTarget).prev().focus()
}},refresh:function(){var h,i,f=this.options.heightStyle,g=this.element.parent();
if(f==="fill"){if(!d.support.minHeight){i=g.css("overflow");
g.css("overflow","hidden")
}h=g.height();
this.element.siblings(":visible").each(function(){var k=d(this),j=k.css("position");
if(j==="absolute"||j==="fixed"){return
}h-=k.outerHeight(true)
});
if(i){g.css("overflow",i)
}this.headers.each(function(){h-=d(this).outerHeight(true)
});
this.headers.next().each(function(){d(this).height(Math.max(0,h-d(this).innerHeight()+d(this).height()))
}).css("overflow","auto")
}else{if(f==="auto"){h=0;
this.headers.next().each(function(){h=Math.max(h,d(this).css("height","").height())
}).height(h)
}}},_activate:function(f){var g=this._findActive(f)[0];
if(g===this.active[0]){return
}g=g||this.active[0];
this._eventHandler({target:g,currentTarget:g,preventDefault:d.noop})
},_findActive:function(f){return typeof f==="number"?this.headers.eq(f):d()
},_setupEvents:function(g){var f={};
if(!g){return
}d.each(g.split(" "),function(i,h){f[h]="_eventHandler"
});
this._on(this.headers,f)
},_eventHandler:function(f){var n=this.options,i=this.active,j=d(f.currentTarget),l=j[0]===i[0],g=l&&n.collapsible,h=g?d():j.next(),k=i.next(),m={oldHeader:i,oldPanel:k,newHeader:g?d():j,newPanel:h};
f.preventDefault();
if((l&&!n.collapsible)||(this._trigger("beforeActivate",f,m)===false)){return
}n.active=g?false:this.headers.index(j);
this.active=l?d():j;
this._toggle(m);
i.removeClass("ui-accordion-header-active ui-state-active");
if(n.icons){i.children(".ui-accordion-header-icon").removeClass(n.icons.activeHeader).addClass(n.icons.header)
}if(!l){j.removeClass("ui-corner-all").addClass("ui-accordion-header-active ui-state-active ui-corner-top");
if(n.icons){j.children(".ui-accordion-header-icon").removeClass(n.icons.header).addClass(n.icons.activeHeader)
}j.next().addClass("ui-accordion-content-active")
}},_toggle:function(h){var f=h.newPanel,g=this.prevShow.length?this.prevShow:h.oldPanel;
this.prevShow.add(this.prevHide).stop(true,true);
this.prevShow=f;
this.prevHide=g;
if(this.options.animate){this._animate(f,g,h)
}else{g.hide();
f.show();
this._toggleComplete(h)
}g.attr({"aria-expanded":"false","aria-hidden":"true"});
g.prev().attr("aria-selected","false");
if(f.length&&g.length){g.prev().attr("tabIndex",-1)
}else{if(f.length){this.headers.filter(function(){return d(this).attr("tabIndex")===0
}).attr("tabIndex",-1)
}}f.attr({"aria-expanded":"true","aria-hidden":"false"}).prev().attr({"aria-selected":"true",tabIndex:0})
},_animate:function(f,n,j){var m,l,i,k=this,o=0,p=f.length&&(!n.length||(f.index()<n.index())),h=this.options.animate||{},q=p&&h.down||h,g=function(){k._toggleComplete(j)
};
if(typeof q==="number"){i=q
}if(typeof q==="string"){l=q
}l=l||q.easing||h.easing;
i=i||q.duration||h.duration;
if(!n.length){return f.animate(a,i,l,g)
}if(!f.length){return n.animate(c,i,l,g)
}m=f.show().outerHeight();
n.animate(c,{duration:i,easing:l,step:function(r,s){s.now=Math.round(r)
}});
f.hide().animate(a,{duration:i,easing:l,complete:g,step:function(r,s){s.now=Math.round(r);
if(s.prop!=="height"){o+=s.now
}else{if(k.options.heightStyle!=="content"){s.now=Math.round(m-n.outerHeight()-o);
o=0
}}}})
},_toggleComplete:function(g){var f=g.oldPanel;
f.removeClass("ui-accordion-content-active").prev().removeClass("ui-corner-top").addClass("ui-corner-all");
if(f.length){f.parent()[0].className=f.parent()[0].className
}this._trigger("activate",null,g)
}});
if(d.uiBackCompat!==false){(function(g,f){g.extend(f.options,{navigation:false,navigationFilter:function(){return this.href.toLowerCase()===location.href.toLowerCase()
}});
var h=f._create;
f._create=function(){if(this.options.navigation){var j=this,l=this.element.find(this.options.header),i=l.next(),k=l.add(i).find("a").filter(this.options.navigationFilter)[0];
if(k){l.add(i).each(function(m){if(g.contains(this,k)){j.options.active=Math.floor(m/2);
return false
}})
}}h.call(this)
}
}(jQuery,jQuery.ui.accordion.prototype));
(function(h,f){h.extend(f.options,{heightStyle:null,autoHeight:true,clearStyle:false,fillSpace:false});
var i=f._create,g=f._setOption;
h.extend(f,{_create:function(){this.options.heightStyle=this.options.heightStyle||this._mergeHeightStyle();
i.call(this)
},_setOption:function(j){if(j==="autoHeight"||j==="clearStyle"||j==="fillSpace"){this.options.heightStyle=this._mergeHeightStyle()
}g.apply(this,arguments)
},_mergeHeightStyle:function(){var j=this.options;
if(j.fillSpace){return"fill"
}if(j.clearStyle){return"content"
}if(j.autoHeight){return"auto"
}}})
}(jQuery,jQuery.ui.accordion.prototype));
(function(h,g){h.extend(g.options.icons,{activeHeader:null,headerSelected:"ui-icon-triangle-1-s"});
var f=g._createIcons;
g._createIcons=function(){if(this.options.icons){this.options.icons.activeHeader=this.options.icons.activeHeader||this.options.icons.headerSelected
}f.call(this)
}
}(jQuery,jQuery.ui.accordion.prototype));
(function(h,g){g.activate=g._activate;
var f=g._findActive;
g._findActive=function(i){if(i===-1){i=false
}if(i&&typeof i!=="number"){i=this.headers.index(this.headers.filter(i));
if(i===-1){i=false
}}return f.call(this,i)
}
}(jQuery,jQuery.ui.accordion.prototype));
jQuery.ui.accordion.prototype.resize=jQuery.ui.accordion.prototype.refresh;
(function(h,g){h.extend(g.options,{change:null,changestart:null});
var f=g._trigger;
g._trigger=function(j,k,l){var i=f.apply(this,arguments);
if(!i){return false
}if(j==="beforeActivate"){i=f.call(this,"changestart",k,{oldHeader:l.oldHeader,oldContent:l.oldPanel,newHeader:l.newHeader,newContent:l.newPanel})
}else{if(j==="activate"){i=f.call(this,"change",k,{oldHeader:l.oldHeader,oldContent:l.oldPanel,newHeader:l.newHeader,newContent:l.newPanel})
}}return i
}
}(jQuery,jQuery.ui.accordion.prototype));
(function(g,f){g.extend(f.options,{animate:null,animated:"slide"});
var h=f._create;
f._create=function(){var i=this.options;
if(i.animate===null){if(!i.animated){i.animate=false
}else{if(i.animated==="slide"){i.animate=300
}else{if(i.animated==="bounceslide"){i.animate={duration:200,down:{easing:"easeOutBounce",duration:1000}}
}else{i.animate=i.animated
}}}}h.call(this)
}
}(jQuery,jQuery.ui.accordion.prototype))
}})(jQuery);
(function(a,b){var c=0;
a.widget("ui.autocomplete",{version:"1.9.2",defaultElement:"<input>",options:{appendTo:"body",autoFocus:false,delay:300,minLength:1,position:{my:"left top",at:"left bottom",collision:"none"},source:null,change:null,close:null,focus:null,open:null,response:null,search:null,select:null},pending:0,_create:function(){var e,d,f;
this.isMultiLine=this._isMultiLine();
this.valueMethod=this.element[this.element.is("input,textarea")?"val":"text"];
this.isNewMenu=true;
this.element.addClass("ui-autocomplete-input").attr("autocomplete","off");
this._on(this.element,{keydown:function(g){if(this.element.prop("readOnly")){e=true;
f=true;
d=true;
return
}e=false;
f=false;
d=false;
var h=a.ui.keyCode;
switch(g.keyCode){case h.PAGE_UP:e=true;
this._move("previousPage",g);
break;
case h.PAGE_DOWN:e=true;
this._move("nextPage",g);
break;
case h.UP:e=true;
this._keyEvent("previous",g);
break;
case h.DOWN:e=true;
this._keyEvent("next",g);
break;
case h.ENTER:case h.NUMPAD_ENTER:if(this.menu.active){e=true;
g.preventDefault();
this.menu.select(g)
}break;
case h.TAB:if(this.menu.active){this.menu.select(g)
}break;
case h.ESCAPE:if(this.menu.element.is(":visible")){this._value(this.term);
this.close(g);
g.preventDefault()
}break;
default:d=true;
this._searchTimeout(g);
break
}},keypress:function(g){if(e){e=false;
g.preventDefault();
return
}if(d){return
}var h=a.ui.keyCode;
switch(g.keyCode){case h.PAGE_UP:this._move("previousPage",g);
break;
case h.PAGE_DOWN:this._move("nextPage",g);
break;
case h.UP:this._keyEvent("previous",g);
break;
case h.DOWN:this._keyEvent("next",g);
break
}},input:function(g){if(f){f=false;
g.preventDefault();
return
}this._searchTimeout(g)
},focus:function(){this.selectedItem=null;
this.previous=this._value()
},blur:function(g){if(this.cancelBlur){delete this.cancelBlur;
return
}clearTimeout(this.searching);
this.close(g);
this._change(g)
}});
this._initSource();
this.menu=a("<ul>").addClass("ui-autocomplete").appendTo(this.document.find(this.options.appendTo||"body")[0]).menu({input:a(),role:null}).zIndex(this.element.zIndex()+1).hide().data("menu");
this._on(this.menu.element,{mousedown:function(g){g.preventDefault();
this.cancelBlur=true;
this._delay(function(){delete this.cancelBlur
});
var h=this.menu.element[0];
if(!a(g.target).closest(".ui-menu-item").length){this._delay(function(){var i=this;
this.document.one("mousedown",function(j){if(j.target!==i.element[0]&&j.target!==h&&!a.contains(h,j.target)){i.close()
}})
})
}},menufocus:function(h,i){if(this.isNewMenu){this.isNewMenu=false;
if(h.originalEvent&&/^mouse/.test(h.originalEvent.type)){this.menu.blur();
this.document.one("mousemove",function(){a(h.target).trigger(h.originalEvent)
});
return
}}var g=i.item.data("ui-autocomplete-item")||i.item.data("item.autocomplete");
if(false!==this._trigger("focus",h,{item:g})){if(h.originalEvent&&/^key/.test(h.originalEvent.type)){this._value(g.value)
}}else{this.liveRegion.text(g.value)
}},menuselect:function(i,j){var h=j.item.data("ui-autocomplete-item")||j.item.data("item.autocomplete"),g=this.previous;
if(this.element[0]!==this.document[0].activeElement){this.element.focus();
this.previous=g;
this._delay(function(){this.previous=g;
this.selectedItem=h
})
}if(false!==this._trigger("select",i,{item:h})){this._value(h.value)
}this.term=this._value();
this.close(i);
this.selectedItem=h
}});
this.liveRegion=a("<span>",{role:"status","aria-live":"polite"}).addClass("ui-helper-hidden-accessible").insertAfter(this.element);
if(a.fn.bgiframe){this.menu.element.bgiframe()
}this._on(this.window,{beforeunload:function(){this.element.removeAttr("autocomplete")
}})
},_destroy:function(){clearTimeout(this.searching);
this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete");
this.menu.element.remove();
this.liveRegion.remove()
},_setOption:function(d,e){this._super(d,e);
if(d==="source"){this._initSource()
}if(d==="appendTo"){this.menu.element.appendTo(this.document.find(e||"body")[0])
}if(d==="disabled"&&e&&this.xhr){this.xhr.abort()
}},_isMultiLine:function(){if(this.element.is("textarea")){return true
}if(this.element.is("input")){return false
}return this.element.prop("isContentEditable")
},_initSource:function(){var f,d,e=this;
if(a.isArray(this.options.source)){f=this.options.source;
this.source=function(h,g){g(a.ui.autocomplete.filter(f,h.term))
}
}else{if(typeof this.options.source==="string"){d=this.options.source;
this.source=function(h,g){if(e.xhr){e.xhr.abort()
}e.xhr=a.ajax({url:d,data:h,dataType:"json",success:function(i){g(i)
},error:function(){g([])
}})
}
}else{this.source=this.options.source
}}},_searchTimeout:function(d){clearTimeout(this.searching);
this.searching=this._delay(function(){if(this.term!==this._value()){this.selectedItem=null;
this.search(null,d)
}},this.options.delay)
},search:function(e,d){e=e!=null?e:this._value();
this.term=this._value();
if(e.length<this.options.minLength){return this.close(d)
}if(this._trigger("search",d)===false){return
}return this._search(e)
},_search:function(d){this.pending++;
this.element.addClass("ui-autocomplete-loading");
this.cancelSearch=false;
this.source({term:d},this._response())
},_response:function(){var e=this,d=++c;
return function(f){if(d===c){e.__response(f)
}e.pending--;
if(!e.pending){e.element.removeClass("ui-autocomplete-loading")
}}
},__response:function(d){if(d){d=this._normalize(d)
}this._trigger("response",null,{content:d});
if(!this.options.disabled&&d&&d.length&&!this.cancelSearch){this._suggest(d);
this._trigger("open")
}else{this._close()
}},close:function(d){this.cancelSearch=true;
this._close(d)
},_close:function(d){if(this.menu.element.is(":visible")){this.menu.element.hide();
this.menu.blur();
this.isNewMenu=true;
this._trigger("close",d)
}},_change:function(d){if(this.previous!==this._value()){this._trigger("change",d,{item:this.selectedItem})
}},_normalize:function(d){if(d.length&&d[0].label&&d[0].value){return d
}return a.map(d,function(e){if(typeof e==="string"){return{label:e,value:e}
}return a.extend({label:e.label||e.value,value:e.value||e.label},e)
})
},_suggest:function(d){var e=this.menu.element.empty().zIndex(this.element.zIndex()+1);
this._renderMenu(e,d);
this.menu.refresh();
e.show();
this._resizeMenu();
e.position(a.extend({of:this.element},this.options.position));
if(this.options.autoFocus){this.menu.next()
}},_resizeMenu:function(){var d=this.menu.element;
d.outerWidth(Math.max(d.width("").outerWidth()+1,this.element.outerWidth()))
},_renderMenu:function(e,d){var f=this;
a.each(d,function(g,h){f._renderItemData(e,h)
})
},_renderItemData:function(d,e){return this._renderItem(d,e).data("ui-autocomplete-item",e)
},_renderItem:function(d,e){return a("<li>").append(a("<a>").text(e.label)).appendTo(d)
},_move:function(e,d){if(!this.menu.element.is(":visible")){this.search(null,d);
return
}if(this.menu.isFirstItem()&&/^previous/.test(e)||this.menu.isLastItem()&&/^next/.test(e)){this._value(this.term);
this.menu.blur();
return
}this.menu[e](d)
},widget:function(){return this.menu.element
},_value:function(){return this.valueMethod.apply(this.element,arguments)
},_keyEvent:function(e,d){if(!this.isMultiLine||this.menu.element.is(":visible")){this._move(e,d);
d.preventDefault()
}}});
a.extend(a.ui.autocomplete,{escapeRegex:function(d){return d.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&")
},filter:function(f,d){var e=new RegExp(a.ui.autocomplete.escapeRegex(d),"i");
return a.grep(f,function(g){return e.test(g.label||g.value||g)
})
}});
a.widget("ui.autocomplete",a.ui.autocomplete,{options:{messages:{noResults:"No search results.",results:function(d){return d+(d>1?" results are":" result is")+" available, use up and down arrow keys to navigate."
}}},__response:function(e){var d;
this._superApply(arguments);
if(this.options.disabled||this.cancelSearch){return
}if(e&&e.length){d=this.options.messages.results(e.length)
}else{d=this.options.messages.noResults
}this.liveRegion.text(d)
}})
}(jQuery));
(function(f,b){var k,e,a,h,i="ui-button ui-widget ui-state-default ui-corner-all",c="ui-state-hover ui-state-active ",g="ui-button-icons-only ui-button-icon-only ui-button-text-icons ui-button-text-icon-primary ui-button-text-icon-secondary ui-button-text-only",j=function(){var l=f(this).find(":ui-button");
setTimeout(function(){l.button("refresh")
},1)
},d=function(m){var l=m.name,n=m.form,o=f([]);
if(l){if(n){o=f(n).find("[name='"+l+"']")
}else{o=f("[name='"+l+"']",m.ownerDocument).filter(function(){return !this.form
})
}}return o
};
f.widget("ui.button",{version:"1.9.2",defaultElement:"<button>",options:{disabled:null,text:true,label:null,icons:{primary:null,secondary:null}},_create:function(){this.element.closest("form").unbind("reset"+this.eventNamespace).bind("reset"+this.eventNamespace,j);
if(typeof this.options.disabled!=="boolean"){this.options.disabled=!!this.element.prop("disabled")
}else{this.element.prop("disabled",this.options.disabled)
}this._determineButtonType();
this.hasTitle=!!this.buttonElement.attr("title");
var o=this,m=this.options,p=this.type==="checkbox"||this.type==="radio",n=!p?"ui-state-active":"",l="ui-state-focus";
if(m.label===null){m.label=(this.type==="input"?this.buttonElement.val():this.buttonElement.html())
}this._hoverable(this.buttonElement);
this.buttonElement.addClass(i).attr("role","button").bind("mouseenter"+this.eventNamespace,function(){if(m.disabled){return
}if(this===k){f(this).addClass("ui-state-active")
}}).bind("mouseleave"+this.eventNamespace,function(){if(m.disabled){return
}f(this).removeClass(n)
}).bind("click"+this.eventNamespace,function(q){if(m.disabled){q.preventDefault();
q.stopImmediatePropagation()
}});
this.element.bind("focus"+this.eventNamespace,function(){o.buttonElement.addClass(l)
}).bind("blur"+this.eventNamespace,function(){o.buttonElement.removeClass(l)
});
if(p){this.element.bind("change"+this.eventNamespace,function(){if(h){return
}o.refresh()
});
this.buttonElement.bind("mousedown"+this.eventNamespace,function(q){if(m.disabled){return
}h=false;
e=q.pageX;
a=q.pageY
}).bind("mouseup"+this.eventNamespace,function(q){if(m.disabled){return
}if(e!==q.pageX||a!==q.pageY){h=true
}})
}if(this.type==="checkbox"){this.buttonElement.bind("click"+this.eventNamespace,function(){if(m.disabled||h){return false
}f(this).toggleClass("ui-state-active");
o.buttonElement.attr("aria-pressed",o.element[0].checked)
})
}else{if(this.type==="radio"){this.buttonElement.bind("click"+this.eventNamespace,function(){if(m.disabled||h){return false
}f(this).addClass("ui-state-active");
o.buttonElement.attr("aria-pressed","true");
var q=o.element[0];
d(q).not(q).map(function(){return f(this).button("widget")[0]
}).removeClass("ui-state-active").attr("aria-pressed","false")
})
}else{this.buttonElement.bind("mousedown"+this.eventNamespace,function(){if(m.disabled){return false
}f(this).addClass("ui-state-active");
k=this;
o.document.one("mouseup",function(){k=null
})
}).bind("mouseup"+this.eventNamespace,function(){if(m.disabled){return false
}f(this).removeClass("ui-state-active")
}).bind("keydown"+this.eventNamespace,function(q){if(m.disabled){return false
}if(q.keyCode===f.ui.keyCode.SPACE||q.keyCode===f.ui.keyCode.ENTER){f(this).addClass("ui-state-active")
}}).bind("keyup"+this.eventNamespace,function(){f(this).removeClass("ui-state-active")
});
if(this.buttonElement.is("a")){this.buttonElement.keyup(function(q){if(q.keyCode===f.ui.keyCode.SPACE){f(this).click()
}})
}}}this._setOption("disabled",m.disabled);
this._resetButton()
},_determineButtonType:function(){var l,n,m;
if(this.element.is("[type=checkbox]")){this.type="checkbox"
}else{if(this.element.is("[type=radio]")){this.type="radio"
}else{if(this.element.is("input")){this.type="input"
}else{this.type="button"
}}}if(this.type==="checkbox"||this.type==="radio"){l=this.element.parents().last();
n="label[for='"+this.element.attr("id")+"']";
this.buttonElement=l.find(n);
if(!this.buttonElement.length){l=l.length?l.siblings():this.element.siblings();
this.buttonElement=l.filter(n);
if(!this.buttonElement.length){this.buttonElement=l.find(n)
}}this.element.addClass("ui-helper-hidden-accessible");
m=this.element.is(":checked");
if(m){this.buttonElement.addClass("ui-state-active")
}this.buttonElement.prop("aria-pressed",m)
}else{this.buttonElement=this.element
}},widget:function(){return this.buttonElement
},_destroy:function(){this.element.removeClass("ui-helper-hidden-accessible");
this.buttonElement.removeClass(i+" "+c+" "+g).removeAttr("role").removeAttr("aria-pressed").html(this.buttonElement.find(".ui-button-text").html());
if(!this.hasTitle){this.buttonElement.removeAttr("title")
}},_setOption:function(l,m){this._super(l,m);
if(l==="disabled"){if(m){this.element.prop("disabled",true)
}else{this.element.prop("disabled",false)
}return
}this._resetButton()
},refresh:function(){var l=this.element.is("input, button")?this.element.is(":disabled"):this.element.hasClass("ui-button-disabled");
if(l!==this.options.disabled){this._setOption("disabled",l)
}if(this.type==="radio"){d(this.element[0]).each(function(){if(f(this).is(":checked")){f(this).button("widget").addClass("ui-state-active").attr("aria-pressed","true")
}else{f(this).button("widget").removeClass("ui-state-active").attr("aria-pressed","false")
}})
}else{if(this.type==="checkbox"){if(this.element.is(":checked")){this.buttonElement.addClass("ui-state-active").attr("aria-pressed","true")
}else{this.buttonElement.removeClass("ui-state-active").attr("aria-pressed","false")
}}}},_resetButton:function(){if(this.type==="input"){if(this.options.label){this.element.val(this.options.label)
}return
}var p=this.buttonElement.removeClass(g),n=f("<span></span>",this.document[0]).addClass("ui-button-text").html(this.options.label).appendTo(p.empty()).text(),m=this.options.icons,l=m.primary&&m.secondary,o=[];
if(m.primary||m.secondary){if(this.options.text){o.push("ui-button-text-icon"+(l?"s":(m.primary?"-primary":"-secondary")))
}if(m.primary){p.prepend("<span class='ui-button-icon-primary ui-icon "+m.primary+"'></span>")
}if(m.secondary){p.append("<span class='ui-button-icon-secondary ui-icon "+m.secondary+"'></span>")
}if(!this.options.text){o.push(l?"ui-button-icons-only":"ui-button-icon-only");
if(!this.hasTitle){p.attr("title",f.trim(n))
}}}else{o.push("ui-button-text-only")
}p.addClass(o.join(" "))
}});
f.widget("ui.buttonset",{version:"1.9.2",options:{items:"button, input[type=button], input[type=submit], input[type=reset], input[type=checkbox], input[type=radio], a, :data(button)"},_create:function(){this.element.addClass("ui-buttonset")
},_init:function(){this.refresh()
},_setOption:function(l,m){if(l==="disabled"){this.buttons.button("option",l,m)
}this._super(l,m)
},refresh:function(){var l=this.element.css("direction")==="rtl";
this.buttons=this.element.find(this.options.items).filter(":ui-button").button("refresh").end().not(":ui-button").button().end().map(function(){return f(this).button("widget")[0]
}).removeClass("ui-corner-all ui-corner-left ui-corner-right").filter(":first").addClass(l?"ui-corner-right":"ui-corner-left").end().filter(":last").addClass(l?"ui-corner-left":"ui-corner-right").end().end()
},_destroy:function(){this.element.removeClass("ui-buttonset");
this.buttons.map(function(){return f(this).button("widget")[0]
}).removeClass("ui-corner-left ui-corner-right").end().button("destroy")
}})
}(jQuery));
(function($,undefined){$.extend($.ui,{datepicker:{version:"1.9.2"}});
var PROP_NAME="datepicker";
var dpuuid=new Date().getTime();
var instActive;
function Datepicker(){this.debug=false;
this._curInst=null;
this._keyEvent=false;
this._disabledInputs=[];
this._datepickerShowing=false;
this._inDialog=false;
this._mainDivId="ui-datepicker-div";
this._inlineClass="ui-datepicker-inline";
this._appendClass="ui-datepicker-append";
this._triggerClass="ui-datepicker-trigger";
this._dialogClass="ui-datepicker-dialog";
this._disableClass="ui-datepicker-disabled";
this._unselectableClass="ui-datepicker-unselectable";
this._currentClass="ui-datepicker-current-day";
this._dayOverClass="ui-datepicker-days-cell-over";
this.regional=[];
this.regional[""]={closeText:"Done",prevText:"Prev",nextText:"Next",currentText:"Today",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],monthNamesShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],dayNamesShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayNamesMin:["Su","Mo","Tu","We","Th","Fr","Sa"],weekHeader:"Wk",dateFormat:"mm/dd/yy",firstDay:0,isRTL:false,showMonthAfterYear:false,yearSuffix:""};
this._defaults={showOn:"focus",showAnim:"fadeIn",showOptions:{},defaultDate:null,appendText:"",buttonText:"...",buttonImage:"",buttonImageOnly:false,hideIfNoPrevNext:false,navigationAsDateFormat:false,gotoCurrent:false,changeMonth:false,changeYear:false,yearRange:"c-10:c+10",showOtherMonths:false,selectOtherMonths:false,showWeek:false,calculateWeek:this.iso8601Week,shortYearCutoff:"+10",minDate:null,maxDate:null,duration:"fast",beforeShowDay:null,beforeShow:null,onSelect:null,onChangeMonthYear:null,onClose:null,numberOfMonths:1,showCurrentAtPos:0,stepMonths:1,stepBigMonths:12,altField:"",altFormat:"",constrainInput:true,showButtonPanel:false,autoSize:false,disabled:false};
$.extend(this._defaults,this.regional[""]);
this.dpDiv=bindHover($('<div id="'+this._mainDivId+'" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>'))
}$.extend(Datepicker.prototype,{markerClassName:"hasDatepicker",maxRows:4,log:function(){if(this.debug){console.log.apply("",arguments)
}},_widgetDatepicker:function(){return this.dpDiv
},setDefaults:function(settings){extendRemove(this._defaults,settings||{});
return this
},_attachDatepicker:function(target,settings){var inlineSettings=null;
for(var attrName in this._defaults){var attrValue=target.getAttribute("date:"+attrName);
if(attrValue){inlineSettings=inlineSettings||{};
try{inlineSettings[attrName]=eval(attrValue)
}catch(err){inlineSettings[attrName]=attrValue
}}}var nodeName=target.nodeName.toLowerCase();
var inline=(nodeName=="div"||nodeName=="span");
if(!target.id){this.uuid+=1;
target.id="dp"+this.uuid
}var inst=this._newInst($(target),inline);
inst.settings=$.extend({},settings||{},inlineSettings||{});
if(nodeName=="input"){this._connectDatepicker(target,inst)
}else{if(inline){this._inlineDatepicker(target,inst)
}}},_newInst:function(target,inline){var id=target[0].id.replace(/([^A-Za-z0-9_-])/g,"\\\\$1");
return{id:id,input:target,selectedDay:0,selectedMonth:0,selectedYear:0,drawMonth:0,drawYear:0,inline:inline,dpDiv:(!inline?this.dpDiv:bindHover($('<div class="'+this._inlineClass+' ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>')))}
},_connectDatepicker:function(target,inst){var input=$(target);
inst.append=$([]);
inst.trigger=$([]);
if(input.hasClass(this.markerClassName)){return
}this._attachments(input,inst);
input.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp).bind("setData.datepicker",function(event,key,value){inst.settings[key]=value
}).bind("getData.datepicker",function(event,key){return this._get(inst,key)
});
this._autoSize(inst);
$.data(target,PROP_NAME,inst);
if(inst.settings.disabled){this._disableDatepicker(target)
}},_attachments:function(input,inst){var appendText=this._get(inst,"appendText");
var isRTL=this._get(inst,"isRTL");
if(inst.append){inst.append.remove()
}if(appendText){inst.append=$('<span class="'+this._appendClass+'">'+appendText+"</span>");
input[isRTL?"before":"after"](inst.append)
}input.unbind("focus",this._showDatepicker);
if(inst.trigger){inst.trigger.remove()
}var showOn=this._get(inst,"showOn");
if(showOn=="focus"||showOn=="both"){input.focus(this._showDatepicker)
}if(showOn=="button"||showOn=="both"){var buttonText=this._get(inst,"buttonText");
var buttonImage=this._get(inst,"buttonImage");
inst.trigger=$(this._get(inst,"buttonImageOnly")?$("<img/>").addClass(this._triggerClass).attr({src:buttonImage,alt:buttonText,title:buttonText}):$('<button type="button"></button>').addClass(this._triggerClass).html(buttonImage==""?buttonText:$("<img/>").attr({src:buttonImage,alt:buttonText,title:buttonText})));
input[isRTL?"before":"after"](inst.trigger);
inst.trigger.click(function(){if($.datepicker._datepickerShowing&&$.datepicker._lastInput==input[0]){$.datepicker._hideDatepicker()
}else{if($.datepicker._datepickerShowing&&$.datepicker._lastInput!=input[0]){$.datepicker._hideDatepicker();
$.datepicker._showDatepicker(input[0])
}else{$.datepicker._showDatepicker(input[0])
}}return false
})
}},_autoSize:function(inst){if(this._get(inst,"autoSize")&&!inst.inline){var date=new Date(2009,12-1,20);
var dateFormat=this._get(inst,"dateFormat");
if(dateFormat.match(/[DM]/)){var findMax=function(names){var max=0;
var maxI=0;
for(var i=0;
i<names.length;
i++){if(names[i].length>max){max=names[i].length;
maxI=i
}}return maxI
};
date.setMonth(findMax(this._get(inst,(dateFormat.match(/MM/)?"monthNames":"monthNamesShort"))));
date.setDate(findMax(this._get(inst,(dateFormat.match(/DD/)?"dayNames":"dayNamesShort")))+20-date.getDay())
}inst.input.attr("size",this._formatDate(inst,date).length)
}},_inlineDatepicker:function(target,inst){var divSpan=$(target);
if(divSpan.hasClass(this.markerClassName)){return
}divSpan.addClass(this.markerClassName).append(inst.dpDiv).bind("setData.datepicker",function(event,key,value){inst.settings[key]=value
}).bind("getData.datepicker",function(event,key){return this._get(inst,key)
});
$.data(target,PROP_NAME,inst);
this._setDate(inst,this._getDefaultDate(inst),true);
this._updateDatepicker(inst);
this._updateAlternate(inst);
if(inst.settings.disabled){this._disableDatepicker(target)
}inst.dpDiv.css("display","block")
},_dialogDatepicker:function(input,date,onSelect,settings,pos){var inst=this._dialogInst;
if(!inst){this.uuid+=1;
var id="dp"+this.uuid;
this._dialogInput=$('<input type="text" id="'+id+'" style="position: absolute; top: -100px; width: 0px;"/>');
this._dialogInput.keydown(this._doKeyDown);
$("body").append(this._dialogInput);
inst=this._dialogInst=this._newInst(this._dialogInput,false);
inst.settings={};
$.data(this._dialogInput[0],PROP_NAME,inst)
}extendRemove(inst.settings,settings||{});
date=(date&&date.constructor==Date?this._formatDate(inst,date):date);
this._dialogInput.val(date);
this._pos=(pos?(pos.length?pos:[pos.pageX,pos.pageY]):null);
if(!this._pos){var browserWidth=document.documentElement.clientWidth;
var browserHeight=document.documentElement.clientHeight;
var scrollX=document.documentElement.scrollLeft||document.body.scrollLeft;
var scrollY=document.documentElement.scrollTop||document.body.scrollTop;
this._pos=[(browserWidth/2)-100+scrollX,(browserHeight/2)-150+scrollY]
}this._dialogInput.css("left",(this._pos[0]+20)+"px").css("top",this._pos[1]+"px");
inst.settings.onSelect=onSelect;
this._inDialog=true;
this.dpDiv.addClass(this._dialogClass);
this._showDatepicker(this._dialogInput[0]);
if($.blockUI){$.blockUI(this.dpDiv)
}$.data(this._dialogInput[0],PROP_NAME,inst);
return this
},_destroyDatepicker:function(target){var $target=$(target);
var inst=$.data(target,PROP_NAME);
if(!$target.hasClass(this.markerClassName)){return
}var nodeName=target.nodeName.toLowerCase();
$.removeData(target,PROP_NAME);
if(nodeName=="input"){inst.append.remove();
inst.trigger.remove();
$target.removeClass(this.markerClassName).unbind("focus",this._showDatepicker).unbind("keydown",this._doKeyDown).unbind("keypress",this._doKeyPress).unbind("keyup",this._doKeyUp)
}else{if(nodeName=="div"||nodeName=="span"){$target.removeClass(this.markerClassName).empty()
}}},_enableDatepicker:function(target){var $target=$(target);
var inst=$.data(target,PROP_NAME);
if(!$target.hasClass(this.markerClassName)){return
}var nodeName=target.nodeName.toLowerCase();
if(nodeName=="input"){target.disabled=false;
inst.trigger.filter("button").each(function(){this.disabled=false
}).end().filter("img").css({opacity:"1.0",cursor:""})
}else{if(nodeName=="div"||nodeName=="span"){var inline=$target.children("."+this._inlineClass);
inline.children().removeClass("ui-state-disabled");
inline.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",false)
}}this._disabledInputs=$.map(this._disabledInputs,function(value){return(value==target?null:value)
})
},_disableDatepicker:function(target){var $target=$(target);
var inst=$.data(target,PROP_NAME);
if(!$target.hasClass(this.markerClassName)){return
}var nodeName=target.nodeName.toLowerCase();
if(nodeName=="input"){target.disabled=true;
inst.trigger.filter("button").each(function(){this.disabled=true
}).end().filter("img").css({opacity:"0.5",cursor:"default"})
}else{if(nodeName=="div"||nodeName=="span"){var inline=$target.children("."+this._inlineClass);
inline.children().addClass("ui-state-disabled");
inline.find("select.ui-datepicker-month, select.ui-datepicker-year").prop("disabled",true)
}}this._disabledInputs=$.map(this._disabledInputs,function(value){return(value==target?null:value)
});
this._disabledInputs[this._disabledInputs.length]=target
},_isDisabledDatepicker:function(target){if(!target){return false
}for(var i=0;
i<this._disabledInputs.length;
i++){if(this._disabledInputs[i]==target){return true
}}return false
},_getInst:function(target){try{return $.data(target,PROP_NAME)
}catch(err){throw"Missing instance data for this datepicker"
}},_optionDatepicker:function(target,name,value){var inst=this._getInst(target);
if(arguments.length==2&&typeof name=="string"){return(name=="defaults"?$.extend({},$.datepicker._defaults):(inst?(name=="all"?$.extend({},inst.settings):this._get(inst,name)):null))
}var settings=name||{};
if(typeof name=="string"){settings={};
settings[name]=value
}if(inst){if(this._curInst==inst){this._hideDatepicker()
}var date=this._getDateDatepicker(target,true);
var minDate=this._getMinMaxDate(inst,"min");
var maxDate=this._getMinMaxDate(inst,"max");
extendRemove(inst.settings,settings);
if(minDate!==null&&settings.dateFormat!==undefined&&settings.minDate===undefined){inst.settings.minDate=this._formatDate(inst,minDate)
}if(maxDate!==null&&settings.dateFormat!==undefined&&settings.maxDate===undefined){inst.settings.maxDate=this._formatDate(inst,maxDate)
}this._attachments($(target),inst);
this._autoSize(inst);
this._setDate(inst,date);
this._updateAlternate(inst);
this._updateDatepicker(inst)
}},_changeDatepicker:function(target,name,value){this._optionDatepicker(target,name,value)
},_refreshDatepicker:function(target){var inst=this._getInst(target);
if(inst){this._updateDatepicker(inst)
}},_setDateDatepicker:function(target,date){var inst=this._getInst(target);
if(inst){this._setDate(inst,date);
this._updateDatepicker(inst);
this._updateAlternate(inst)
}},_getDateDatepicker:function(target,noDefault){var inst=this._getInst(target);
if(inst&&!inst.inline){this._setDateFromField(inst,noDefault)
}return(inst?this._getDate(inst):null)
},_doKeyDown:function(event){var inst=$.datepicker._getInst(event.target);
var handled=true;
var isRTL=inst.dpDiv.is(".ui-datepicker-rtl");
inst._keyEvent=true;
if($.datepicker._datepickerShowing){switch(event.keyCode){case 9:$.datepicker._hideDatepicker();
handled=false;
break;
case 13:var sel=$("td."+$.datepicker._dayOverClass+":not(."+$.datepicker._currentClass+")",inst.dpDiv);
if(sel[0]){$.datepicker._selectDay(event.target,inst.selectedMonth,inst.selectedYear,sel[0])
}var onSelect=$.datepicker._get(inst,"onSelect");
if(onSelect){var dateStr=$.datepicker._formatDate(inst);
onSelect.apply((inst.input?inst.input[0]:null),[dateStr,inst])
}else{$.datepicker._hideDatepicker()
}return false;
break;
case 27:$.datepicker._hideDatepicker();
break;
case 33:$.datepicker._adjustDate(event.target,(event.ctrlKey?-$.datepicker._get(inst,"stepBigMonths"):-$.datepicker._get(inst,"stepMonths")),"M");
break;
case 34:$.datepicker._adjustDate(event.target,(event.ctrlKey?+$.datepicker._get(inst,"stepBigMonths"):+$.datepicker._get(inst,"stepMonths")),"M");
break;
case 35:if(event.ctrlKey||event.metaKey){$.datepicker._clearDate(event.target)
}handled=event.ctrlKey||event.metaKey;
break;
case 36:if(event.ctrlKey||event.metaKey){$.datepicker._gotoToday(event.target)
}handled=event.ctrlKey||event.metaKey;
break;
case 37:if(event.ctrlKey||event.metaKey){$.datepicker._adjustDate(event.target,(isRTL?+1:-1),"D")
}handled=event.ctrlKey||event.metaKey;
if(event.originalEvent.altKey){$.datepicker._adjustDate(event.target,(event.ctrlKey?-$.datepicker._get(inst,"stepBigMonths"):-$.datepicker._get(inst,"stepMonths")),"M")
}break;
case 38:if(event.ctrlKey||event.metaKey){$.datepicker._adjustDate(event.target,-7,"D")
}handled=event.ctrlKey||event.metaKey;
break;
case 39:if(event.ctrlKey||event.metaKey){$.datepicker._adjustDate(event.target,(isRTL?-1:+1),"D")
}handled=event.ctrlKey||event.metaKey;
if(event.originalEvent.altKey){$.datepicker._adjustDate(event.target,(event.ctrlKey?+$.datepicker._get(inst,"stepBigMonths"):+$.datepicker._get(inst,"stepMonths")),"M")
}break;
case 40:if(event.ctrlKey||event.metaKey){$.datepicker._adjustDate(event.target,+7,"D")
}handled=event.ctrlKey||event.metaKey;
break;
default:handled=false
}}else{if(event.keyCode==36&&event.ctrlKey){$.datepicker._showDatepicker(this)
}else{handled=false
}}if(handled){event.preventDefault();
event.stopPropagation()
}},_doKeyPress:function(event){var inst=$.datepicker._getInst(event.target);
if($.datepicker._get(inst,"constrainInput")){var chars=$.datepicker._possibleChars($.datepicker._get(inst,"dateFormat"));
var chr=String.fromCharCode(event.charCode==undefined?event.keyCode:event.charCode);
return event.ctrlKey||event.metaKey||(chr<" "||!chars||chars.indexOf(chr)>-1)
}},_doKeyUp:function(event){var inst=$.datepicker._getInst(event.target);
if(inst.input.val()!=inst.lastVal){try{var date=$.datepicker.parseDate($.datepicker._get(inst,"dateFormat"),(inst.input?inst.input.val():null),$.datepicker._getFormatConfig(inst));
if(date){$.datepicker._setDateFromField(inst);
$.datepicker._updateAlternate(inst);
$.datepicker._updateDatepicker(inst)
}}catch(err){$.datepicker.log(err)
}}return true
},_showDatepicker:function(input){input=input.target||input;
if(input.nodeName.toLowerCase()!="input"){input=$("input",input.parentNode)[0]
}if($.datepicker._isDisabledDatepicker(input)||$.datepicker._lastInput==input){return
}var inst=$.datepicker._getInst(input);
if($.datepicker._curInst&&$.datepicker._curInst!=inst){$.datepicker._curInst.dpDiv.stop(true,true);
if(inst&&$.datepicker._datepickerShowing){$.datepicker._hideDatepicker($.datepicker._curInst.input[0])
}}var beforeShow=$.datepicker._get(inst,"beforeShow");
var beforeShowSettings=beforeShow?beforeShow.apply(input,[input,inst]):{};
if(beforeShowSettings===false){return
}extendRemove(inst.settings,beforeShowSettings);
inst.lastVal=null;
$.datepicker._lastInput=input;
$.datepicker._setDateFromField(inst);
if($.datepicker._inDialog){input.value=""
}if(!$.datepicker._pos){$.datepicker._pos=$.datepicker._findPos(input);
$.datepicker._pos[1]+=input.offsetHeight
}var isFixed=false;
$(input).parents().each(function(){isFixed|=$(this).css("position")=="fixed";
return !isFixed
});
var offset={left:$.datepicker._pos[0],top:$.datepicker._pos[1]};
$.datepicker._pos=null;
inst.dpDiv.empty();
inst.dpDiv.css({position:"absolute",display:"block",top:"-1000px"});
$.datepicker._updateDatepicker(inst);
offset=$.datepicker._checkOffset(inst,offset,isFixed);
inst.dpDiv.css({position:($.datepicker._inDialog&&$.blockUI?"static":(isFixed?"fixed":"absolute")),display:"none",left:offset.left+"px",top:offset.top+"px"});
if(!inst.inline){var showAnim=$.datepicker._get(inst,"showAnim");
var duration=$.datepicker._get(inst,"duration");
var postProcess=function(){var cover=inst.dpDiv.find("iframe.ui-datepicker-cover");
if(!!cover.length){var borders=$.datepicker._getBorders(inst.dpDiv);
cover.css({left:-borders[0],top:-borders[1],width:inst.dpDiv.outerWidth(),height:inst.dpDiv.outerHeight()})
}};
inst.dpDiv.zIndex($(input).zIndex()+1);
$.datepicker._datepickerShowing=true;
if($.effects&&($.effects.effect[showAnim]||$.effects[showAnim])){inst.dpDiv.show(showAnim,$.datepicker._get(inst,"showOptions"),duration,postProcess)
}else{inst.dpDiv[showAnim||"show"]((showAnim?duration:null),postProcess)
}if(!showAnim||!duration){postProcess()
}if(inst.input.is(":visible")&&!inst.input.is(":disabled")){inst.input.focus()
}$.datepicker._curInst=inst
}},_updateDatepicker:function(inst){this.maxRows=4;
var borders=$.datepicker._getBorders(inst.dpDiv);
instActive=inst;
inst.dpDiv.empty().append(this._generateHTML(inst));
this._attachHandlers(inst);
var cover=inst.dpDiv.find("iframe.ui-datepicker-cover");
if(!!cover.length){cover.css({left:-borders[0],top:-borders[1],width:inst.dpDiv.outerWidth(),height:inst.dpDiv.outerHeight()})
}inst.dpDiv.find("."+this._dayOverClass+" a").mouseover();
var numMonths=this._getNumberOfMonths(inst);
var cols=numMonths[1];
var width=17;
inst.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width("");
if(cols>1){inst.dpDiv.addClass("ui-datepicker-multi-"+cols).css("width",(width*cols)+"em")
}inst.dpDiv[(numMonths[0]!=1||numMonths[1]!=1?"add":"remove")+"Class"]("ui-datepicker-multi");
inst.dpDiv[(this._get(inst,"isRTL")?"add":"remove")+"Class"]("ui-datepicker-rtl");
if(inst==$.datepicker._curInst&&$.datepicker._datepickerShowing&&inst.input&&inst.input.is(":visible")&&!inst.input.is(":disabled")&&inst.input[0]!=document.activeElement){inst.input.focus()
}if(inst.yearshtml){var origyearshtml=inst.yearshtml;
setTimeout(function(){if(origyearshtml===inst.yearshtml&&inst.yearshtml){inst.dpDiv.find("select.ui-datepicker-year:first").replaceWith(inst.yearshtml)
}origyearshtml=inst.yearshtml=null
},0)
}},_getBorders:function(elem){var convert=function(value){return{thin:1,medium:2,thick:3}[value]||value
};
return[parseFloat(convert(elem.css("border-left-width"))),parseFloat(convert(elem.css("border-top-width")))]
},_checkOffset:function(inst,offset,isFixed){var dpWidth=inst.dpDiv.outerWidth();
var dpHeight=inst.dpDiv.outerHeight();
var inputWidth=inst.input?inst.input.outerWidth():0;
var inputHeight=inst.input?inst.input.outerHeight():0;
var viewWidth=document.documentElement.clientWidth+(isFixed?0:$(document).scrollLeft());
var viewHeight=document.documentElement.clientHeight+(isFixed?0:$(document).scrollTop());
offset.left-=(this._get(inst,"isRTL")?(dpWidth-inputWidth):0);
offset.left-=(isFixed&&offset.left==inst.input.offset().left)?$(document).scrollLeft():0;
offset.top-=(isFixed&&offset.top==(inst.input.offset().top+inputHeight))?$(document).scrollTop():0;
offset.left-=Math.min(offset.left,(offset.left+dpWidth>viewWidth&&viewWidth>dpWidth)?Math.abs(offset.left+dpWidth-viewWidth):0);
offset.top-=Math.min(offset.top,(offset.top+dpHeight>viewHeight&&viewHeight>dpHeight)?Math.abs(dpHeight+inputHeight):0);
return offset
},_findPos:function(obj){var inst=this._getInst(obj);
var isRTL=this._get(inst,"isRTL");
while(obj&&(obj.type=="hidden"||obj.nodeType!=1||$.expr.filters.hidden(obj))){obj=obj[isRTL?"previousSibling":"nextSibling"]
}var position=$(obj).offset();
return[position.left,position.top]
},_hideDatepicker:function(input){var inst=this._curInst;
if(!inst||(input&&inst!=$.data(input,PROP_NAME))){return
}if(this._datepickerShowing){var showAnim=this._get(inst,"showAnim");
var duration=this._get(inst,"duration");
var postProcess=function(){$.datepicker._tidyDialog(inst)
};
if($.effects&&($.effects.effect[showAnim]||$.effects[showAnim])){inst.dpDiv.hide(showAnim,$.datepicker._get(inst,"showOptions"),duration,postProcess)
}else{inst.dpDiv[(showAnim=="slideDown"?"slideUp":(showAnim=="fadeIn"?"fadeOut":"hide"))]((showAnim?duration:null),postProcess)
}if(!showAnim){postProcess()
}this._datepickerShowing=false;
var onClose=this._get(inst,"onClose");
if(onClose){onClose.apply((inst.input?inst.input[0]:null),[(inst.input?inst.input.val():""),inst])
}this._lastInput=null;
if(this._inDialog){this._dialogInput.css({position:"absolute",left:"0",top:"-100px"});
if($.blockUI){$.unblockUI();
$("body").append(this.dpDiv)
}}this._inDialog=false
}},_tidyDialog:function(inst){inst.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")
},_checkExternalClick:function(event){if(!$.datepicker._curInst){return
}var $target=$(event.target),inst=$.datepicker._getInst($target[0]);
if((($target[0].id!=$.datepicker._mainDivId&&$target.parents("#"+$.datepicker._mainDivId).length==0&&!$target.hasClass($.datepicker.markerClassName)&&!$target.closest("."+$.datepicker._triggerClass).length&&$.datepicker._datepickerShowing&&!($.datepicker._inDialog&&$.blockUI)))||($target.hasClass($.datepicker.markerClassName)&&$.datepicker._curInst!=inst)){$.datepicker._hideDatepicker()
}},_adjustDate:function(id,offset,period){var target=$(id);
var inst=this._getInst(target[0]);
if(this._isDisabledDatepicker(target[0])){return
}this._adjustInstDate(inst,offset+(period=="M"?this._get(inst,"showCurrentAtPos"):0),period);
this._updateDatepicker(inst)
},_gotoToday:function(id){var target=$(id);
var inst=this._getInst(target[0]);
if(this._get(inst,"gotoCurrent")&&inst.currentDay){inst.selectedDay=inst.currentDay;
inst.drawMonth=inst.selectedMonth=inst.currentMonth;
inst.drawYear=inst.selectedYear=inst.currentYear
}else{var date=new Date();
inst.selectedDay=date.getDate();
inst.drawMonth=inst.selectedMonth=date.getMonth();
inst.drawYear=inst.selectedYear=date.getFullYear()
}this._notifyChange(inst);
this._adjustDate(target)
},_selectMonthYear:function(id,select,period){var target=$(id);
var inst=this._getInst(target[0]);
inst["selected"+(period=="M"?"Month":"Year")]=inst["draw"+(period=="M"?"Month":"Year")]=parseInt(select.options[select.selectedIndex].value,10);
this._notifyChange(inst);
this._adjustDate(target)
},_selectDay:function(id,month,year,td){var target=$(id);
if($(td).hasClass(this._unselectableClass)||this._isDisabledDatepicker(target[0])){return
}var inst=this._getInst(target[0]);
inst.selectedDay=inst.currentDay=$("a",td).html();
inst.selectedMonth=inst.currentMonth=month;
inst.selectedYear=inst.currentYear=year;
this._selectDate(id,this._formatDate(inst,inst.currentDay,inst.currentMonth,inst.currentYear))
},_clearDate:function(id){var target=$(id);
var inst=this._getInst(target[0]);
this._selectDate(target,"")
},_selectDate:function(id,dateStr){var target=$(id);
var inst=this._getInst(target[0]);
dateStr=(dateStr!=null?dateStr:this._formatDate(inst));
if(inst.input){inst.input.val(dateStr)
}this._updateAlternate(inst);
var onSelect=this._get(inst,"onSelect");
if(onSelect){onSelect.apply((inst.input?inst.input[0]:null),[dateStr,inst])
}else{if(inst.input){inst.input.trigger("change")
}}if(inst.inline){this._updateDatepicker(inst)
}else{this._hideDatepicker();
this._lastInput=inst.input[0];
if(typeof(inst.input[0])!="object"){inst.input.focus()
}this._lastInput=null
}},_updateAlternate:function(inst){var altField=this._get(inst,"altField");
if(altField){var altFormat=this._get(inst,"altFormat")||this._get(inst,"dateFormat");
var date=this._getDate(inst);
var dateStr=this.formatDate(altFormat,date,this._getFormatConfig(inst));
$(altField).each(function(){$(this).val(dateStr)
})
}},noWeekends:function(date){var day=date.getDay();
return[(day>0&&day<6),""]
},iso8601Week:function(date){var checkDate=new Date(date.getTime());
checkDate.setDate(checkDate.getDate()+4-(checkDate.getDay()||7));
var time=checkDate.getTime();
checkDate.setMonth(0);
checkDate.setDate(1);
return Math.floor(Math.round((time-checkDate)/86400000)/7)+1
},parseDate:function(format,value,settings){if(format==null||value==null){throw"Invalid arguments"
}value=(typeof value=="object"?value.toString():value+"");
if(value==""){return null
}var shortYearCutoff=(settings?settings.shortYearCutoff:null)||this._defaults.shortYearCutoff;
shortYearCutoff=(typeof shortYearCutoff!="string"?shortYearCutoff:new Date().getFullYear()%100+parseInt(shortYearCutoff,10));
var dayNamesShort=(settings?settings.dayNamesShort:null)||this._defaults.dayNamesShort;
var dayNames=(settings?settings.dayNames:null)||this._defaults.dayNames;
var monthNamesShort=(settings?settings.monthNamesShort:null)||this._defaults.monthNamesShort;
var monthNames=(settings?settings.monthNames:null)||this._defaults.monthNames;
var year=-1;
var month=-1;
var day=-1;
var doy=-1;
var literal=false;
var lookAhead=function(match){var matches=(iFormat+1<format.length&&format.charAt(iFormat+1)==match);
if(matches){iFormat++
}return matches
};
var getNumber=function(match){var isDoubled=lookAhead(match);
var size=(match=="@"?14:(match=="!"?20:(match=="y"&&isDoubled?4:(match=="o"?3:2))));
var digits=new RegExp("^\\d{1,"+size+"}");
var num=value.substring(iValue).match(digits);
if(!num){throw"Missing number at position "+iValue
}iValue+=num[0].length;
return parseInt(num[0],10)
};
var getName=function(match,shortNames,longNames){var names=$.map(lookAhead(match)?longNames:shortNames,function(v,k){return[[k,v]]
}).sort(function(a,b){return -(a[1].length-b[1].length)
});
var index=-1;
$.each(names,function(i,pair){var name=pair[1];
if(value.substr(iValue,name.length).toLowerCase()==name.toLowerCase()){index=pair[0];
iValue+=name.length;
return false
}});
if(index!=-1){return index+1
}else{throw"Unknown name at position "+iValue
}};
var checkLiteral=function(){if(value.charAt(iValue)!=format.charAt(iFormat)){throw"Unexpected literal at position "+iValue
}iValue++
};
var iValue=0;
for(var iFormat=0;
iFormat<format.length;
iFormat++){if(literal){if(format.charAt(iFormat)=="'"&&!lookAhead("'")){literal=false
}else{checkLiteral()
}}else{switch(format.charAt(iFormat)){case"d":day=getNumber("d");
break;
case"D":getName("D",dayNamesShort,dayNames);
break;
case"o":doy=getNumber("o");
break;
case"m":month=getNumber("m");
break;
case"M":month=getName("M",monthNamesShort,monthNames);
break;
case"y":year=getNumber("y");
break;
case"@":var date=new Date(getNumber("@"));
year=date.getFullYear();
month=date.getMonth()+1;
day=date.getDate();
break;
case"!":var date=new Date((getNumber("!")-this._ticksTo1970)/10000);
year=date.getFullYear();
month=date.getMonth()+1;
day=date.getDate();
break;
case"'":if(lookAhead("'")){checkLiteral()
}else{literal=true
}break;
default:checkLiteral()
}}}if(iValue<value.length){var extra=value.substr(iValue);
if(!/^\s+/.test(extra)){throw"Extra/unparsed characters found in date: "+extra
}}if(year==-1){year=new Date().getFullYear()
}else{if(year<100){year+=new Date().getFullYear()-new Date().getFullYear()%100+(year<=shortYearCutoff?0:-100)
}}if(doy>-1){month=1;
day=doy;
do{var dim=this._getDaysInMonth(year,month-1);
if(day<=dim){break
}month++;
day-=dim
}while(true)
}var date=this._daylightSavingAdjust(new Date(year,month-1,day));
if(date.getFullYear()!=year||date.getMonth()+1!=month||date.getDate()!=day){throw"Invalid date"
}return date
},ATOM:"yy-mm-dd",COOKIE:"D, dd M yy",ISO_8601:"yy-mm-dd",RFC_822:"D, d M y",RFC_850:"DD, dd-M-y",RFC_1036:"D, d M y",RFC_1123:"D, d M yy",RFC_2822:"D, d M yy",RSS:"D, d M y",TICKS:"!",TIMESTAMP:"@",W3C:"yy-mm-dd",_ticksTo1970:(((1970-1)*365+Math.floor(1970/4)-Math.floor(1970/100)+Math.floor(1970/400))*24*60*60*10000000),formatDate:function(format,date,settings){if(!date){return""
}var dayNamesShort=(settings?settings.dayNamesShort:null)||this._defaults.dayNamesShort;
var dayNames=(settings?settings.dayNames:null)||this._defaults.dayNames;
var monthNamesShort=(settings?settings.monthNamesShort:null)||this._defaults.monthNamesShort;
var monthNames=(settings?settings.monthNames:null)||this._defaults.monthNames;
var lookAhead=function(match){var matches=(iFormat+1<format.length&&format.charAt(iFormat+1)==match);
if(matches){iFormat++
}return matches
};
var formatNumber=function(match,value,len){var num=""+value;
if(lookAhead(match)){while(num.length<len){num="0"+num
}}return num
};
var formatName=function(match,value,shortNames,longNames){return(lookAhead(match)?longNames[value]:shortNames[value])
};
var output="";
var literal=false;
if(date){for(var iFormat=0;
iFormat<format.length;
iFormat++){if(literal){if(format.charAt(iFormat)=="'"&&!lookAhead("'")){literal=false
}else{output+=format.charAt(iFormat)
}}else{switch(format.charAt(iFormat)){case"d":output+=formatNumber("d",date.getDate(),2);
break;
case"D":output+=formatName("D",date.getDay(),dayNamesShort,dayNames);
break;
case"o":output+=formatNumber("o",Math.round((new Date(date.getFullYear(),date.getMonth(),date.getDate()).getTime()-new Date(date.getFullYear(),0,0).getTime())/86400000),3);
break;
case"m":output+=formatNumber("m",date.getMonth()+1,2);
break;
case"M":output+=formatName("M",date.getMonth(),monthNamesShort,monthNames);
break;
case"y":output+=(lookAhead("y")?date.getFullYear():(date.getYear()%100<10?"0":"")+date.getYear()%100);
break;
case"@":output+=date.getTime();
break;
case"!":output+=date.getTime()*10000+this._ticksTo1970;
break;
case"'":if(lookAhead("'")){output+="'"
}else{literal=true
}break;
default:output+=format.charAt(iFormat)
}}}}return output
},_possibleChars:function(format){var chars="";
var literal=false;
var lookAhead=function(match){var matches=(iFormat+1<format.length&&format.charAt(iFormat+1)==match);
if(matches){iFormat++
}return matches
};
for(var iFormat=0;
iFormat<format.length;
iFormat++){if(literal){if(format.charAt(iFormat)=="'"&&!lookAhead("'")){literal=false
}else{chars+=format.charAt(iFormat)
}}else{switch(format.charAt(iFormat)){case"d":case"m":case"y":case"@":chars+="0123456789";
break;
case"D":case"M":return null;
case"'":if(lookAhead("'")){chars+="'"
}else{literal=true
}break;
default:chars+=format.charAt(iFormat)
}}}return chars
},_get:function(inst,name){return inst.settings[name]!==undefined?inst.settings[name]:this._defaults[name]
},_setDateFromField:function(inst,noDefault){if(inst.input.val()==inst.lastVal){return
}var dateFormat=this._get(inst,"dateFormat");
var dates=inst.lastVal=inst.input?inst.input.val():null;
var date,defaultDate;
date=defaultDate=this._getDefaultDate(inst);
var settings=this._getFormatConfig(inst);
try{date=this.parseDate(dateFormat,dates,settings)||defaultDate
}catch(event){this.log(event);
dates=(noDefault?"":dates)
}inst.selectedDay=date.getDate();
inst.drawMonth=inst.selectedMonth=date.getMonth();
inst.drawYear=inst.selectedYear=date.getFullYear();
inst.currentDay=(dates?date.getDate():0);
inst.currentMonth=(dates?date.getMonth():0);
inst.currentYear=(dates?date.getFullYear():0);
this._adjustInstDate(inst)
},_getDefaultDate:function(inst){return this._restrictMinMax(inst,this._determineDate(inst,this._get(inst,"defaultDate"),new Date()))
},_determineDate:function(inst,date,defaultDate){var offsetNumeric=function(offset){var date=new Date();
date.setDate(date.getDate()+offset);
return date
};
var offsetString=function(offset){try{return $.datepicker.parseDate($.datepicker._get(inst,"dateFormat"),offset,$.datepicker._getFormatConfig(inst))
}catch(e){}var date=(offset.toLowerCase().match(/^c/)?$.datepicker._getDate(inst):null)||new Date();
var year=date.getFullYear();
var month=date.getMonth();
var day=date.getDate();
var pattern=/([+-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g;
var matches=pattern.exec(offset);
while(matches){switch(matches[2]||"d"){case"d":case"D":day+=parseInt(matches[1],10);
break;
case"w":case"W":day+=parseInt(matches[1],10)*7;
break;
case"m":case"M":month+=parseInt(matches[1],10);
day=Math.min(day,$.datepicker._getDaysInMonth(year,month));
break;
case"y":case"Y":year+=parseInt(matches[1],10);
day=Math.min(day,$.datepicker._getDaysInMonth(year,month));
break
}matches=pattern.exec(offset)
}return new Date(year,month,day)
};
var newDate=(date==null||date===""?defaultDate:(typeof date=="string"?offsetString(date):(typeof date=="number"?(isNaN(date)?defaultDate:offsetNumeric(date)):new Date(date.getTime()))));
newDate=(newDate&&newDate.toString()=="Invalid Date"?defaultDate:newDate);
if(newDate){newDate.setHours(0);
newDate.setMinutes(0);
newDate.setSeconds(0);
newDate.setMilliseconds(0)
}return this._daylightSavingAdjust(newDate)
},_daylightSavingAdjust:function(date){if(!date){return null
}date.setHours(date.getHours()>12?date.getHours()+2:0);
return date
},_setDate:function(inst,date,noChange){var clear=!date;
var origMonth=inst.selectedMonth;
var origYear=inst.selectedYear;
var newDate=this._restrictMinMax(inst,this._determineDate(inst,date,new Date()));
inst.selectedDay=inst.currentDay=newDate.getDate();
inst.drawMonth=inst.selectedMonth=inst.currentMonth=newDate.getMonth();
inst.drawYear=inst.selectedYear=inst.currentYear=newDate.getFullYear();
if((origMonth!=inst.selectedMonth||origYear!=inst.selectedYear)&&!noChange){this._notifyChange(inst)
}this._adjustInstDate(inst);
if(inst.input){inst.input.val(clear?"":this._formatDate(inst))
}},_getDate:function(inst){var startDate=(!inst.currentYear||(inst.input&&inst.input.val()=="")?null:this._daylightSavingAdjust(new Date(inst.currentYear,inst.currentMonth,inst.currentDay)));
return startDate
},_attachHandlers:function(inst){var stepMonths=this._get(inst,"stepMonths");
var id="#"+inst.id.replace(/\\\\/g,"\\");
inst.dpDiv.find("[data-handler]").map(function(){var handler={prev:function(){window["DP_jQuery_"+dpuuid].datepicker._adjustDate(id,-stepMonths,"M")
},next:function(){window["DP_jQuery_"+dpuuid].datepicker._adjustDate(id,+stepMonths,"M")
},hide:function(){window["DP_jQuery_"+dpuuid].datepicker._hideDatepicker()
},today:function(){window["DP_jQuery_"+dpuuid].datepicker._gotoToday(id)
},selectDay:function(){window["DP_jQuery_"+dpuuid].datepicker._selectDay(id,+this.getAttribute("data-month"),+this.getAttribute("data-year"),this);
return false
},selectMonth:function(){window["DP_jQuery_"+dpuuid].datepicker._selectMonthYear(id,this,"M");
return false
},selectYear:function(){window["DP_jQuery_"+dpuuid].datepicker._selectMonthYear(id,this,"Y");
return false
}};
$(this).bind(this.getAttribute("data-event"),handler[this.getAttribute("data-handler")])
})
},_generateHTML:function(inst){var today=new Date();
today=this._daylightSavingAdjust(new Date(today.getFullYear(),today.getMonth(),today.getDate()));
var isRTL=this._get(inst,"isRTL");
var showButtonPanel=this._get(inst,"showButtonPanel");
var hideIfNoPrevNext=this._get(inst,"hideIfNoPrevNext");
var navigationAsDateFormat=this._get(inst,"navigationAsDateFormat");
var numMonths=this._getNumberOfMonths(inst);
var showCurrentAtPos=this._get(inst,"showCurrentAtPos");
var stepMonths=this._get(inst,"stepMonths");
var isMultiMonth=(numMonths[0]!=1||numMonths[1]!=1);
var currentDate=this._daylightSavingAdjust((!inst.currentDay?new Date(9999,9,9):new Date(inst.currentYear,inst.currentMonth,inst.currentDay)));
var minDate=this._getMinMaxDate(inst,"min");
var maxDate=this._getMinMaxDate(inst,"max");
var drawMonth=inst.drawMonth-showCurrentAtPos;
var drawYear=inst.drawYear;
if(drawMonth<0){drawMonth+=12;
drawYear--
}if(maxDate){var maxDraw=this._daylightSavingAdjust(new Date(maxDate.getFullYear(),maxDate.getMonth()-(numMonths[0]*numMonths[1])+1,maxDate.getDate()));
maxDraw=(minDate&&maxDraw<minDate?minDate:maxDraw);
while(this._daylightSavingAdjust(new Date(drawYear,drawMonth,1))>maxDraw){drawMonth--;
if(drawMonth<0){drawMonth=11;
drawYear--
}}}inst.drawMonth=drawMonth;
inst.drawYear=drawYear;
var prevText=this._get(inst,"prevText");
prevText=(!navigationAsDateFormat?prevText:this.formatDate(prevText,this._daylightSavingAdjust(new Date(drawYear,drawMonth-stepMonths,1)),this._getFormatConfig(inst)));
var prev=(this._canAdjustMonth(inst,-1,drawYear,drawMonth)?'<a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="'+prevText+'"><span class="ui-icon ui-icon-circle-triangle-'+(isRTL?"e":"w")+'">'+prevText+"</span></a>":(hideIfNoPrevNext?"":'<a class="ui-datepicker-prev ui-corner-all ui-state-disabled" title="'+prevText+'"><span class="ui-icon ui-icon-circle-triangle-'+(isRTL?"e":"w")+'">'+prevText+"</span></a>"));
var nextText=this._get(inst,"nextText");
nextText=(!navigationAsDateFormat?nextText:this.formatDate(nextText,this._daylightSavingAdjust(new Date(drawYear,drawMonth+stepMonths,1)),this._getFormatConfig(inst)));
var next=(this._canAdjustMonth(inst,+1,drawYear,drawMonth)?'<a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="'+nextText+'"><span class="ui-icon ui-icon-circle-triangle-'+(isRTL?"w":"e")+'">'+nextText+"</span></a>":(hideIfNoPrevNext?"":'<a class="ui-datepicker-next ui-corner-all ui-state-disabled" title="'+nextText+'"><span class="ui-icon ui-icon-circle-triangle-'+(isRTL?"w":"e")+'">'+nextText+"</span></a>"));
var currentText=this._get(inst,"currentText");
var gotoDate=(this._get(inst,"gotoCurrent")&&inst.currentDay?currentDate:today);
currentText=(!navigationAsDateFormat?currentText:this.formatDate(currentText,gotoDate,this._getFormatConfig(inst)));
var controls=(!inst.inline?'<button type="button" class="ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all" data-handler="hide" data-event="click">'+this._get(inst,"closeText")+"</button>":"");
var buttonPanel=(showButtonPanel)?'<div class="ui-datepicker-buttonpane ui-widget-content">'+(isRTL?controls:"")+(this._isInRange(inst,gotoDate)?'<button type="button" class="ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all" data-handler="today" data-event="click">'+currentText+"</button>":"")+(isRTL?"":controls)+"</div>":"";
var firstDay=parseInt(this._get(inst,"firstDay"),10);
firstDay=(isNaN(firstDay)?0:firstDay);
var showWeek=this._get(inst,"showWeek");
var dayNames=this._get(inst,"dayNames");
var dayNamesShort=this._get(inst,"dayNamesShort");
var dayNamesMin=this._get(inst,"dayNamesMin");
var monthNames=this._get(inst,"monthNames");
var monthNamesShort=this._get(inst,"monthNamesShort");
var beforeShowDay=this._get(inst,"beforeShowDay");
var showOtherMonths=this._get(inst,"showOtherMonths");
var selectOtherMonths=this._get(inst,"selectOtherMonths");
var calculateWeek=this._get(inst,"calculateWeek")||this.iso8601Week;
var defaultDate=this._getDefaultDate(inst);
var html="";
for(var row=0;
row<numMonths[0];
row++){var group="";
this.maxRows=4;
for(var col=0;
col<numMonths[1];
col++){var selectedDate=this._daylightSavingAdjust(new Date(drawYear,drawMonth,inst.selectedDay));
var cornerClass=" ui-corner-all";
var calender="";
if(isMultiMonth){calender+='<div class="ui-datepicker-group';
if(numMonths[1]>1){switch(col){case 0:calender+=" ui-datepicker-group-first";
cornerClass=" ui-corner-"+(isRTL?"right":"left");
break;
case numMonths[1]-1:calender+=" ui-datepicker-group-last";
cornerClass=" ui-corner-"+(isRTL?"left":"right");
break;
default:calender+=" ui-datepicker-group-middle";
cornerClass="";
break
}}calender+='">'
}calender+='<div class="ui-datepicker-header ui-widget-header ui-helper-clearfix'+cornerClass+'">'+(/all|left/.test(cornerClass)&&row==0?(isRTL?next:prev):"")+(/all|right/.test(cornerClass)&&row==0?(isRTL?prev:next):"")+this._generateMonthYearHeader(inst,drawMonth,drawYear,minDate,maxDate,row>0||col>0,monthNames,monthNamesShort)+'</div><table class="ui-datepicker-calendar"><thead><tr>';
var thead=(showWeek?'<th class="ui-datepicker-week-col">'+this._get(inst,"weekHeader")+"</th>":"");
for(var dow=0;
dow<7;
dow++){var day=(dow+firstDay)%7;
thead+="<th"+((dow+firstDay+6)%7>=5?' class="ui-datepicker-week-end"':"")+'><span title="'+dayNames[day]+'">'+dayNamesMin[day]+"</span></th>"
}calender+=thead+"</tr></thead><tbody>";
var daysInMonth=this._getDaysInMonth(drawYear,drawMonth);
if(drawYear==inst.selectedYear&&drawMonth==inst.selectedMonth){inst.selectedDay=Math.min(inst.selectedDay,daysInMonth)
}var leadDays=(this._getFirstDayOfMonth(drawYear,drawMonth)-firstDay+7)%7;
var curRows=Math.ceil((leadDays+daysInMonth)/7);
var numRows=(isMultiMonth?this.maxRows>curRows?this.maxRows:curRows:curRows);
this.maxRows=numRows;
var printDate=this._daylightSavingAdjust(new Date(drawYear,drawMonth,1-leadDays));
for(var dRow=0;
dRow<numRows;
dRow++){calender+="<tr>";
var tbody=(!showWeek?"":'<td class="ui-datepicker-week-col">'+this._get(inst,"calculateWeek")(printDate)+"</td>");
for(var dow=0;
dow<7;
dow++){var daySettings=(beforeShowDay?beforeShowDay.apply((inst.input?inst.input[0]:null),[printDate]):[true,""]);
var otherMonth=(printDate.getMonth()!=drawMonth);
var unselectable=(otherMonth&&!selectOtherMonths)||!daySettings[0]||(minDate&&printDate<minDate)||(maxDate&&printDate>maxDate);
tbody+='<td class="'+((dow+firstDay+6)%7>=5?" ui-datepicker-week-end":"")+(otherMonth?" ui-datepicker-other-month":"")+((printDate.getTime()==selectedDate.getTime()&&drawMonth==inst.selectedMonth&&inst._keyEvent)||(defaultDate.getTime()==printDate.getTime()&&defaultDate.getTime()==selectedDate.getTime())?" "+this._dayOverClass:"")+(unselectable?" "+this._unselectableClass+" ui-state-disabled":"")+(otherMonth&&!showOtherMonths?"":" "+daySettings[1]+(printDate.getTime()==currentDate.getTime()?" "+this._currentClass:"")+(printDate.getTime()==today.getTime()?" ui-datepicker-today":""))+'"'+((!otherMonth||showOtherMonths)&&daySettings[2]?' title="'+daySettings[2]+'"':"")+(unselectable?"":' data-handler="selectDay" data-event="click" data-month="'+printDate.getMonth()+'" data-year="'+printDate.getFullYear()+'"')+">"+(otherMonth&&!showOtherMonths?"&#xa0;":(unselectable?'<span class="ui-state-default">'+printDate.getDate()+"</span>":'<a class="ui-state-default'+(printDate.getTime()==today.getTime()?" ui-state-highlight":"")+(printDate.getTime()==currentDate.getTime()?" ui-state-active":"")+(otherMonth?" ui-priority-secondary":"")+'" href="#">'+printDate.getDate()+"</a>"))+"</td>";
printDate.setDate(printDate.getDate()+1);
printDate=this._daylightSavingAdjust(printDate)
}calender+=tbody+"</tr>"
}drawMonth++;
if(drawMonth>11){drawMonth=0;
drawYear++
}calender+="</tbody></table>"+(isMultiMonth?"</div>"+((numMonths[0]>0&&col==numMonths[1]-1)?'<div class="ui-datepicker-row-break"></div>':""):"");
group+=calender
}html+=group
}html+=buttonPanel+($.ui.ie6&&!inst.inline?'<iframe src="javascript:false;" class="ui-datepicker-cover" frameborder="0"></iframe>':"");
inst._keyEvent=false;
return html
},_generateMonthYearHeader:function(inst,drawMonth,drawYear,minDate,maxDate,secondary,monthNames,monthNamesShort){var changeMonth=this._get(inst,"changeMonth");
var changeYear=this._get(inst,"changeYear");
var showMonthAfterYear=this._get(inst,"showMonthAfterYear");
var html='<div class="ui-datepicker-title">';
var monthHtml="";
if(secondary||!changeMonth){monthHtml+='<span class="ui-datepicker-month">'+monthNames[drawMonth]+"</span>"
}else{var inMinYear=(minDate&&minDate.getFullYear()==drawYear);
var inMaxYear=(maxDate&&maxDate.getFullYear()==drawYear);
monthHtml+='<select class="ui-datepicker-month" data-handler="selectMonth" data-event="change">';
for(var month=0;
month<12;
month++){if((!inMinYear||month>=minDate.getMonth())&&(!inMaxYear||month<=maxDate.getMonth())){monthHtml+='<option value="'+month+'"'+(month==drawMonth?' selected="selected"':"")+">"+monthNamesShort[month]+"</option>"
}}monthHtml+="</select>"
}if(!showMonthAfterYear){html+=monthHtml+(secondary||!(changeMonth&&changeYear)?"&#xa0;":"")
}if(!inst.yearshtml){inst.yearshtml="";
if(secondary||!changeYear){html+='<span class="ui-datepicker-year">'+drawYear+"</span>"
}else{var years=this._get(inst,"yearRange").split(":");
var thisYear=new Date().getFullYear();
var determineYear=function(value){var year=(value.match(/c[+-].*/)?drawYear+parseInt(value.substring(1),10):(value.match(/[+-].*/)?thisYear+parseInt(value,10):parseInt(value,10)));
return(isNaN(year)?thisYear:year)
};
var year=determineYear(years[0]);
var endYear=Math.max(year,determineYear(years[1]||""));
year=(minDate?Math.max(year,minDate.getFullYear()):year);
endYear=(maxDate?Math.min(endYear,maxDate.getFullYear()):endYear);
inst.yearshtml+='<select class="ui-datepicker-year" data-handler="selectYear" data-event="change">';
for(;
year<=endYear;
year++){inst.yearshtml+='<option value="'+year+'"'+(year==drawYear?' selected="selected"':"")+">"+year+"</option>"
}inst.yearshtml+="</select>";
html+=inst.yearshtml;
inst.yearshtml=null
}}html+=this._get(inst,"yearSuffix");
if(showMonthAfterYear){html+=(secondary||!(changeMonth&&changeYear)?"&#xa0;":"")+monthHtml
}html+="</div>";
return html
},_adjustInstDate:function(inst,offset,period){var year=inst.drawYear+(period=="Y"?offset:0);
var month=inst.drawMonth+(period=="M"?offset:0);
var day=Math.min(inst.selectedDay,this._getDaysInMonth(year,month))+(period=="D"?offset:0);
var date=this._restrictMinMax(inst,this._daylightSavingAdjust(new Date(year,month,day)));
inst.selectedDay=date.getDate();
inst.drawMonth=inst.selectedMonth=date.getMonth();
inst.drawYear=inst.selectedYear=date.getFullYear();
if(period=="M"||period=="Y"){this._notifyChange(inst)
}},_restrictMinMax:function(inst,date){var minDate=this._getMinMaxDate(inst,"min");
var maxDate=this._getMinMaxDate(inst,"max");
var newDate=(minDate&&date<minDate?minDate:date);
newDate=(maxDate&&newDate>maxDate?maxDate:newDate);
return newDate
},_notifyChange:function(inst){var onChange=this._get(inst,"onChangeMonthYear");
if(onChange){onChange.apply((inst.input?inst.input[0]:null),[inst.selectedYear,inst.selectedMonth+1,inst])
}},_getNumberOfMonths:function(inst){var numMonths=this._get(inst,"numberOfMonths");
return(numMonths==null?[1,1]:(typeof numMonths=="number"?[1,numMonths]:numMonths))
},_getMinMaxDate:function(inst,minMax){return this._determineDate(inst,this._get(inst,minMax+"Date"),null)
},_getDaysInMonth:function(year,month){return 32-this._daylightSavingAdjust(new Date(year,month,32)).getDate()
},_getFirstDayOfMonth:function(year,month){return new Date(year,month,1).getDay()
},_canAdjustMonth:function(inst,offset,curYear,curMonth){var numMonths=this._getNumberOfMonths(inst);
var date=this._daylightSavingAdjust(new Date(curYear,curMonth+(offset<0?offset:numMonths[0]*numMonths[1]),1));
if(offset<0){date.setDate(this._getDaysInMonth(date.getFullYear(),date.getMonth()))
}return this._isInRange(inst,date)
},_isInRange:function(inst,date){var minDate=this._getMinMaxDate(inst,"min");
var maxDate=this._getMinMaxDate(inst,"max");
return((!minDate||date.getTime()>=minDate.getTime())&&(!maxDate||date.getTime()<=maxDate.getTime()))
},_getFormatConfig:function(inst){var shortYearCutoff=this._get(inst,"shortYearCutoff");
shortYearCutoff=(typeof shortYearCutoff!="string"?shortYearCutoff:new Date().getFullYear()%100+parseInt(shortYearCutoff,10));
return{shortYearCutoff:shortYearCutoff,dayNamesShort:this._get(inst,"dayNamesShort"),dayNames:this._get(inst,"dayNames"),monthNamesShort:this._get(inst,"monthNamesShort"),monthNames:this._get(inst,"monthNames")}
},_formatDate:function(inst,day,month,year){if(!day){inst.currentDay=inst.selectedDay;
inst.currentMonth=inst.selectedMonth;
inst.currentYear=inst.selectedYear
}var date=(day?(typeof day=="object"?day:this._daylightSavingAdjust(new Date(year,month,day))):this._daylightSavingAdjust(new Date(inst.currentYear,inst.currentMonth,inst.currentDay)));
return this.formatDate(this._get(inst,"dateFormat"),date,this._getFormatConfig(inst))
}});
function bindHover(dpDiv){var selector="button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";
return dpDiv.delegate(selector,"mouseout",function(){$(this).removeClass("ui-state-hover");
if(this.className.indexOf("ui-datepicker-prev")!=-1){$(this).removeClass("ui-datepicker-prev-hover")
}if(this.className.indexOf("ui-datepicker-next")!=-1){$(this).removeClass("ui-datepicker-next-hover")
}}).delegate(selector,"mouseover",function(){if(!$.datepicker._isDisabledDatepicker(instActive.inline?dpDiv.parent()[0]:instActive.input[0])){$(this).parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover");
$(this).addClass("ui-state-hover");
if(this.className.indexOf("ui-datepicker-prev")!=-1){$(this).addClass("ui-datepicker-prev-hover")
}if(this.className.indexOf("ui-datepicker-next")!=-1){$(this).addClass("ui-datepicker-next-hover")
}}})
}function extendRemove(target,props){$.extend(target,props);
for(var name in props){if(props[name]==null||props[name]==undefined){target[name]=props[name]
}}return target
}$.fn.datepicker=function(options){if(!this.length){return this
}if(!$.datepicker.initialized){$(document).mousedown($.datepicker._checkExternalClick).find(document.body).append($.datepicker.dpDiv);
$.datepicker.initialized=true
}var otherArgs=Array.prototype.slice.call(arguments,1);
if(typeof options=="string"&&(options=="isDisabled"||options=="getDate"||options=="widget")){return $.datepicker["_"+options+"Datepicker"].apply($.datepicker,[this[0]].concat(otherArgs))
}if(options=="option"&&arguments.length==2&&typeof arguments[1]=="string"){return $.datepicker["_"+options+"Datepicker"].apply($.datepicker,[this[0]].concat(otherArgs))
}return this.each(function(){typeof options=="string"?$.datepicker["_"+options+"Datepicker"].apply($.datepicker,[this].concat(otherArgs)):$.datepicker._attachDatepicker(this,options)
})
};
$.datepicker=new Datepicker();
$.datepicker.initialized=false;
$.datepicker.uuid=new Date().getTime();
$.datepicker.version="1.9.2";
window["DP_jQuery_"+dpuuid]=$
})(jQuery);
(function(d,e){var b="ui-dialog ui-widget ui-widget-content ui-corner-all ",a={buttons:true,height:true,maxHeight:true,maxWidth:true,minHeight:true,minWidth:true,width:true},c={maxHeight:true,maxWidth:true,minHeight:true,minWidth:true};
d.widget("ui.dialog",{version:"1.9.2",options:{autoOpen:true,buttons:{},closeOnEscape:true,closeText:"close",dialogClass:"",draggable:true,hide:null,height:"auto",maxHeight:false,maxWidth:false,minHeight:150,minWidth:150,modal:false,position:{my:"center",at:"center",of:window,collision:"fit",using:function(g){var f=d(this).css(g).offset().top;
if(f<0){d(this).css("top",g.top-f)
}}},resizable:true,show:null,stack:true,title:"",width:300,zIndex:1000},_create:function(){this.originalTitle=this.element.attr("title");
if(typeof this.originalTitle!=="string"){this.originalTitle=""
}this.oldPosition={parent:this.element.parent(),index:this.element.parent().children().index(this.element)};
this.options.title=this.options.title||this.originalTitle;
var k=this,j=this.options,m=j.title||"&#160;",h,l,f,i,g;
h=(this.uiDialog=d("<div>")).addClass(b+j.dialogClass).css({display:"none",outline:0,zIndex:j.zIndex}).attr("tabIndex",-1).keydown(function(n){if(j.closeOnEscape&&!n.isDefaultPrevented()&&n.keyCode&&n.keyCode===d.ui.keyCode.ESCAPE){k.close(n);
n.preventDefault()
}}).mousedown(function(n){k.moveToTop(false,n)
}).appendTo("body");
this.element.show().removeAttr("title").addClass("ui-dialog-content ui-widget-content").appendTo(h);
l=(this.uiDialogTitlebar=d("<div>")).addClass("ui-dialog-titlebar  ui-widget-header  ui-corner-all  ui-helper-clearfix").bind("mousedown",function(){h.focus()
}).prependTo(h);
f=d("<a href='#'></a>").addClass("ui-dialog-titlebar-close  ui-corner-all").attr("role","button").click(function(n){n.preventDefault();
k.close(n)
}).appendTo(l);
(this.uiDialogTitlebarCloseText=d("<span>")).addClass("ui-icon ui-icon-closethick").text(j.closeText).appendTo(f);
i=d("<span>").uniqueId().addClass("ui-dialog-title").html(m).prependTo(l);
g=(this.uiDialogButtonPane=d("<div>")).addClass("ui-dialog-buttonpane ui-widget-content ui-helper-clearfix");
(this.uiButtonSet=d("<div>")).addClass("ui-dialog-buttonset").appendTo(g);
h.attr({role:"dialog","aria-labelledby":i.attr("id")});
l.find("*").add(l).disableSelection();
this._hoverable(f);
this._focusable(f);
if(j.draggable&&d.fn.draggable){this._makeDraggable()
}if(j.resizable&&d.fn.resizable){this._makeResizable()
}this._createButtons(j.buttons);
this._isOpen=false;
if(d.fn.bgiframe){h.bgiframe()
}this._on(h,{keydown:function(p){if(!j.modal||p.keyCode!==d.ui.keyCode.TAB){return
}var o=d(":tabbable",h),q=o.filter(":first"),n=o.filter(":last");
if(p.target===n[0]&&!p.shiftKey){q.focus(1);
return false
}else{if(p.target===q[0]&&p.shiftKey){n.focus(1);
return false
}}}})
},_init:function(){if(this.options.autoOpen){this.open()
}},_destroy:function(){var g,f=this.oldPosition;
if(this.overlay){this.overlay.destroy()
}this.uiDialog.hide();
this.element.removeClass("ui-dialog-content ui-widget-content").hide().appendTo("body");
this.uiDialog.remove();
if(this.originalTitle){this.element.attr("title",this.originalTitle)
}g=f.parent.children().eq(f.index);
if(g.length&&g[0]!==this.element[0]){g.before(this.element)
}else{f.parent.append(this.element)
}},widget:function(){return this.uiDialog
},close:function(i){var h=this,g,f;
if(!this._isOpen){return
}if(false===this._trigger("beforeClose",i)){return
}this._isOpen=false;
if(this.overlay){this.overlay.destroy()
}if(this.options.hide){this._hide(this.uiDialog,this.options.hide,function(){h._trigger("close",i)
})
}else{this.uiDialog.hide();
this._trigger("close",i)
}d.ui.dialog.overlay.resize();
if(this.options.modal){g=0;
d(".ui-dialog").each(function(){if(this!==h.uiDialog[0]){f=d(this).css("z-index");
if(!isNaN(f)){g=Math.max(g,f)
}}});
d.ui.dialog.maxZ=g
}return this
},isOpen:function(){return this._isOpen
},moveToTop:function(i,h){var g=this.options,f;
if((g.modal&&!i)||(!g.stack&&!g.modal)){return this._trigger("focus",h)
}if(g.zIndex>d.ui.dialog.maxZ){d.ui.dialog.maxZ=g.zIndex
}if(this.overlay){d.ui.dialog.maxZ+=1;
d.ui.dialog.overlay.maxZ=d.ui.dialog.maxZ;
this.overlay.$el.css("z-index",d.ui.dialog.overlay.maxZ)
}f={scrollTop:this.element.scrollTop(),scrollLeft:this.element.scrollLeft()};
d.ui.dialog.maxZ+=1;
this.uiDialog.css("z-index",d.ui.dialog.maxZ);
this.element.attr(f);
this._trigger("focus",h);
return this
},open:function(){if(this._isOpen){return
}var h,g=this.options,f=this.uiDialog;
this._size();
this._position(g.position);
f.show(g.show);
this.overlay=g.modal?new d.ui.dialog.overlay(this):null;
this.moveToTop(true);
h=this.element.find(":tabbable");
if(!h.length){h=this.uiDialogButtonPane.find(":tabbable");
if(!h.length){h=f
}}h.eq(0).focus();
this._isOpen=true;
this._trigger("open");
return this
},_createButtons:function(h){var g=this,f=false;
this.uiDialogButtonPane.remove();
this.uiButtonSet.empty();
if(typeof h==="object"&&h!==null){d.each(h,function(){return !(f=true)
})
}if(f){d.each(h,function(i,k){var j,l;
k=d.isFunction(k)?{click:k,text:i}:k;
k=d.extend({type:"button"},k);
l=k.click;
k.click=function(){l.apply(g.element[0],arguments)
};
j=d("<button></button>",k).appendTo(g.uiButtonSet);
if(d.fn.button){j.button()
}});
this.uiDialog.addClass("ui-dialog-buttons");
this.uiDialogButtonPane.appendTo(this.uiDialog)
}else{this.uiDialog.removeClass("ui-dialog-buttons")
}},_makeDraggable:function(){var h=this,g=this.options;
function f(i){return{position:i.position,offset:i.offset}
}this.uiDialog.draggable({cancel:".ui-dialog-content, .ui-dialog-titlebar-close",handle:".ui-dialog-titlebar",containment:"document",start:function(i,j){d(this).addClass("ui-dialog-dragging");
h._trigger("dragStart",i,f(j))
},drag:function(i,j){h._trigger("drag",i,f(j))
},stop:function(i,j){g.position=[j.position.left-h.document.scrollLeft(),j.position.top-h.document.scrollTop()];
d(this).removeClass("ui-dialog-dragging");
h._trigger("dragStop",i,f(j));
d.ui.dialog.overlay.resize()
}})
},_makeResizable:function(j){j=(j===e?this.options.resizable:j);
var k=this,i=this.options,f=this.uiDialog.css("position"),h=typeof j==="string"?j:"n,e,s,w,se,sw,ne,nw";
function g(l){return{originalPosition:l.originalPosition,originalSize:l.originalSize,position:l.position,size:l.size}
}this.uiDialog.resizable({cancel:".ui-dialog-content",containment:"document",alsoResize:this.element,maxWidth:i.maxWidth,maxHeight:i.maxHeight,minWidth:i.minWidth,minHeight:this._minHeight(),handles:h,start:function(l,m){d(this).addClass("ui-dialog-resizing");
k._trigger("resizeStart",l,g(m))
},resize:function(l,m){k._trigger("resize",l,g(m))
},stop:function(l,m){d(this).removeClass("ui-dialog-resizing");
i.height=d(this).height();
i.width=d(this).width();
k._trigger("resizeStop",l,g(m));
d.ui.dialog.overlay.resize()
}}).css("position",f).find(".ui-resizable-se").addClass("ui-icon ui-icon-grip-diagonal-se")
},_minHeight:function(){var f=this.options;
if(f.height==="auto"){return f.minHeight
}else{return Math.min(f.minHeight,f.height)
}},_position:function(g){var h=[],i=[0,0],f;
if(g){if(typeof g==="string"||(typeof g==="object"&&"0" in g)){h=g.split?g.split(" "):[g[0],g[1]];
if(h.length===1){h[1]=h[0]
}d.each(["left","top"],function(k,j){if(+h[k]===h[k]){i[k]=h[k];
h[k]=j
}});
g={my:h[0]+(i[0]<0?i[0]:"+"+i[0])+" "+h[1]+(i[1]<0?i[1]:"+"+i[1]),at:h.join(" ")}
}g=d.extend({},d.ui.dialog.prototype.options.position,g)
}else{g=d.ui.dialog.prototype.options.position
}f=this.uiDialog.is(":visible");
if(!f){this.uiDialog.show()
}this.uiDialog.position(g);
if(!f){this.uiDialog.hide()
}},_setOptions:function(h){var i=this,f={},g=false;
d.each(h,function(j,k){i._setOption(j,k);
if(j in a){g=true
}if(j in c){f[j]=k
}});
if(g){this._size()
}if(this.uiDialog.is(":data(resizable)")){this.uiDialog.resizable("option",f)
}},_setOption:function(h,i){var g,j,f=this.uiDialog;
switch(h){case"buttons":this._createButtons(i);
break;
case"closeText":this.uiDialogTitlebarCloseText.text(""+i);
break;
case"dialogClass":f.removeClass(this.options.dialogClass).addClass(b+i);
break;
case"disabled":if(i){f.addClass("ui-dialog-disabled")
}else{f.removeClass("ui-dialog-disabled")
}break;
case"draggable":g=f.is(":data(draggable)");
if(g&&!i){f.draggable("destroy")
}if(!g&&i){this._makeDraggable()
}break;
case"position":this._position(i);
break;
case"resizable":j=f.is(":data(resizable)");
if(j&&!i){f.resizable("destroy")
}if(j&&typeof i==="string"){f.resizable("option","handles",i)
}if(!j&&i!==false){this._makeResizable(i)
}break;
case"title":d(".ui-dialog-title",this.uiDialogTitlebar).html(""+(i||"&#160;"));
break
}this._super(h,i)
},_size:function(){var g,j,i,h=this.options,f=this.uiDialog.is(":visible");
this.element.show().css({width:"auto",minHeight:0,height:0});
if(h.minWidth>h.width){h.width=h.minWidth
}g=this.uiDialog.css({height:"auto",width:h.width}).outerHeight();
j=Math.max(0,h.minHeight-g);
if(h.height==="auto"){if(d.support.minHeight){this.element.css({minHeight:j,height:"auto"})
}else{this.uiDialog.show();
i=this.element.css("height","auto").height();
if(!f){this.uiDialog.hide()
}this.element.height(Math.max(i,j))
}}else{this.element.height(Math.max(h.height-g,0))
}if(this.uiDialog.is(":data(resizable)")){this.uiDialog.resizable("option","minHeight",this._minHeight())
}}});
d.extend(d.ui.dialog,{uuid:0,maxZ:0,getTitleId:function(f){var g=f.attr("id");
if(!g){this.uuid+=1;
g=this.uuid
}return"ui-dialog-title-"+g
},overlay:function(f){this.$el=d.ui.dialog.overlay.create(f)
}});
d.extend(d.ui.dialog.overlay,{instances:[],oldInstances:[],maxZ:0,events:d.map("focus,mousedown,mouseup,keydown,keypress,click".split(","),function(f){return f+".dialog-overlay"
}).join(" "),create:function(g){if(this.instances.length===0){setTimeout(function(){if(d.ui.dialog.overlay.instances.length){d(document).bind(d.ui.dialog.overlay.events,function(h){if(d(h.target).zIndex()<d.ui.dialog.overlay.maxZ){return false
}})
}},1);
d(window).bind("resize.dialog-overlay",d.ui.dialog.overlay.resize)
}var f=(this.oldInstances.pop()||d("<div>").addClass("ui-widget-overlay"));
d(document).bind("keydown.dialog-overlay",function(h){var i=d.ui.dialog.overlay.instances;
if(i.length!==0&&i[i.length-1]===f&&g.options.closeOnEscape&&!h.isDefaultPrevented()&&h.keyCode&&h.keyCode===d.ui.keyCode.ESCAPE){g.close(h);
h.preventDefault()
}});
f.appendTo(document.body).css({width:this.width(),height:this.height()});
if(d.fn.bgiframe){f.bgiframe()
}this.instances.push(f);
return f
},destroy:function(f){var g=d.inArray(f,this.instances),h=0;
if(g!==-1){this.oldInstances.push(this.instances.splice(g,1)[0])
}if(this.instances.length===0){d([document,window]).unbind(".dialog-overlay")
}f.height(0).width(0).remove();
d.each(this.instances,function(){h=Math.max(h,this.css("z-index"))
});
this.maxZ=h
},height:function(){var g,f;
if(d.ui.ie){g=Math.max(document.documentElement.scrollHeight,document.body.scrollHeight);
f=Math.max(document.documentElement.offsetHeight,document.body.offsetHeight);
if(g<f){return d(window).height()+"px"
}else{return g+"px"
}}else{return d(document).height()+"px"
}},width:function(){var f,g;
if(d.ui.ie){f=Math.max(document.documentElement.scrollWidth,document.body.scrollWidth);
g=Math.max(document.documentElement.offsetWidth,document.body.offsetWidth);
if(f<g){return d(window).width()+"px"
}else{return f+"px"
}}else{return d(document).width()+"px"
}},resize:function(){var f=d([]);
d.each(d.ui.dialog.overlay.instances,function(){f=f.add(this)
});
f.css({width:0,height:0}).css({width:d.ui.dialog.overlay.width(),height:d.ui.dialog.overlay.height()})
}});
d.extend(d.ui.dialog.overlay.prototype,{destroy:function(){d.ui.dialog.overlay.destroy(this.$el)
}})
}(jQuery));
(function(a,b){a.widget("ui.draggable",a.ui.mouse,{version:"1.9.2",widgetEventPrefix:"drag",options:{addClasses:true,appendTo:"parent",axis:false,connectToSortable:false,containment:false,cursor:"auto",cursorAt:false,grid:false,handle:false,helper:"original",iframeFix:false,opacity:false,refreshPositions:false,revert:false,revertDuration:500,scope:"default",scroll:true,scrollSensitivity:20,scrollSpeed:20,snap:false,snapMode:"both",snapTolerance:20,stack:false,zIndex:false},_create:function(){if(this.options.helper=="original"&&!(/^(?:r|a|f)/).test(this.element.css("position"))){this.element[0].style.position="relative"
}(this.options.addClasses&&this.element.addClass("ui-draggable"));
(this.options.disabled&&this.element.addClass("ui-draggable-disabled"));
this._mouseInit()
},_destroy:function(){this.element.removeClass("ui-draggable ui-draggable-dragging ui-draggable-disabled");
this._mouseDestroy()
},_mouseCapture:function(c){var d=this.options;
if(this.helper||d.disabled||a(c.target).is(".ui-resizable-handle")){return false
}this.handle=this._getHandle(c);
if(!this.handle){return false
}a(d.iframeFix===true?"iframe":d.iframeFix).each(function(){a('<div class="ui-draggable-iframeFix" style="background: #fff;"></div>').css({width:this.offsetWidth+"px",height:this.offsetHeight+"px",position:"absolute",opacity:"0.001",zIndex:1000}).css(a(this).offset()).appendTo("body")
});
return true
},_mouseStart:function(c){var d=this.options;
this.helper=this._createHelper(c);
this.helper.addClass("ui-draggable-dragging");
this._cacheHelperProportions();
if(a.ui.ddmanager){a.ui.ddmanager.current=this
}this._cacheMargins();
this.cssPosition=this.helper.css("position");
this.scrollParent=this.helper.scrollParent();
this.offset=this.positionAbs=this.element.offset();
this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left};
a.extend(this.offset,{click:{left:c.pageX-this.offset.left,top:c.pageY-this.offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset()});
this.originalPosition=this.position=this._generatePosition(c);
this.originalPageX=c.pageX;
this.originalPageY=c.pageY;
(d.cursorAt&&this._adjustOffsetFromHelper(d.cursorAt));
if(d.containment){this._setContainment()
}if(this._trigger("start",c)===false){this._clear();
return false
}this._cacheHelperProportions();
if(a.ui.ddmanager&&!d.dropBehaviour){a.ui.ddmanager.prepareOffsets(this,c)
}this._mouseDrag(c,true);
if(a.ui.ddmanager){a.ui.ddmanager.dragStart(this,c)
}return true
},_mouseDrag:function(c,e){this.position=this._generatePosition(c);
this.positionAbs=this._convertPositionTo("absolute");
if(!e){var d=this._uiHash();
if(this._trigger("drag",c,d)===false){this._mouseUp({});
return false
}this.position=d.position
}if(!this.options.axis||this.options.axis!="y"){this.helper[0].style.left=this.position.left+"px"
}if(!this.options.axis||this.options.axis!="x"){this.helper[0].style.top=this.position.top+"px"
}if(a.ui.ddmanager){a.ui.ddmanager.drag(this,c)
}return false
},_mouseStop:function(e){var g=false;
if(a.ui.ddmanager&&!this.options.dropBehaviour){g=a.ui.ddmanager.drop(this,e)
}if(this.dropped){g=this.dropped;
this.dropped=false
}var c=this.element[0],f=false;
while(c&&(c=c.parentNode)){if(c==document){f=true
}}if(!f&&this.options.helper==="original"){return false
}if((this.options.revert=="invalid"&&!g)||(this.options.revert=="valid"&&g)||this.options.revert===true||(a.isFunction(this.options.revert)&&this.options.revert.call(this.element,g))){var d=this;
a(this.helper).animate(this.originalPosition,parseInt(this.options.revertDuration,10),function(){if(d._trigger("stop",e)!==false){d._clear()
}})
}else{if(this._trigger("stop",e)!==false){this._clear()
}}return false
},_mouseUp:function(c){a("div.ui-draggable-iframeFix").each(function(){this.parentNode.removeChild(this)
});
if(a.ui.ddmanager){a.ui.ddmanager.dragStop(this,c)
}return a.ui.mouse.prototype._mouseUp.call(this,c)
},cancel:function(){if(this.helper.is(".ui-draggable-dragging")){this._mouseUp({})
}else{this._clear()
}return this
},_getHandle:function(c){var d=!this.options.handle||!a(this.options.handle,this.element).length?true:false;
a(this.options.handle,this.element).find("*").andSelf().each(function(){if(this==c.target){d=true
}});
return d
},_createHelper:function(d){var e=this.options;
var c=a.isFunction(e.helper)?a(e.helper.apply(this.element[0],[d])):(e.helper=="clone"?this.element.clone().removeAttr("id"):this.element);
if(!c.parents("body").length){c.appendTo((e.appendTo=="parent"?this.element[0].parentNode:e.appendTo))
}if(c[0]!=this.element[0]&&!(/(fixed|absolute)/).test(c.css("position"))){c.css("position","absolute")
}return c
},_adjustOffsetFromHelper:function(c){if(typeof c=="string"){c=c.split(" ")
}if(a.isArray(c)){c={left:+c[0],top:+c[1]||0}
}if("left" in c){this.offset.click.left=c.left+this.margins.left
}if("right" in c){this.offset.click.left=this.helperProportions.width-c.right+this.margins.left
}if("top" in c){this.offset.click.top=c.top+this.margins.top
}if("bottom" in c){this.offset.click.top=this.helperProportions.height-c.bottom+this.margins.top
}},_getParentOffset:function(){this.offsetParent=this.helper.offsetParent();
var c=this.offsetParent.offset();
if(this.cssPosition=="absolute"&&this.scrollParent[0]!=document&&a.contains(this.scrollParent[0],this.offsetParent[0])){c.left+=this.scrollParent.scrollLeft();
c.top+=this.scrollParent.scrollTop()
}if((this.offsetParent[0]==document.body)||(this.offsetParent[0].tagName&&this.offsetParent[0].tagName.toLowerCase()=="html"&&a.ui.ie)){c={top:0,left:0}
}return{top:c.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:c.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}
},_getRelativeOffset:function(){if(this.cssPosition=="relative"){var c=this.element.position();
return{top:c.top-(parseInt(this.helper.css("top"),10)||0)+this.scrollParent.scrollTop(),left:c.left-(parseInt(this.helper.css("left"),10)||0)+this.scrollParent.scrollLeft()}
}else{return{top:0,left:0}
}},_cacheMargins:function(){this.margins={left:(parseInt(this.element.css("marginLeft"),10)||0),top:(parseInt(this.element.css("marginTop"),10)||0),right:(parseInt(this.element.css("marginRight"),10)||0),bottom:(parseInt(this.element.css("marginBottom"),10)||0)}
},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}
},_setContainment:function(){var g=this.options;
if(g.containment=="parent"){g.containment=this.helper[0].parentNode
}if(g.containment=="document"||g.containment=="window"){this.containment=[g.containment=="document"?0:a(window).scrollLeft()-this.offset.relative.left-this.offset.parent.left,g.containment=="document"?0:a(window).scrollTop()-this.offset.relative.top-this.offset.parent.top,(g.containment=="document"?0:a(window).scrollLeft())+a(g.containment=="document"?document:window).width()-this.helperProportions.width-this.margins.left,(g.containment=="document"?0:a(window).scrollTop())+(a(g.containment=="document"?document:window).height()||document.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top]
}if(!(/^(document|window|parent)$/).test(g.containment)&&g.containment.constructor!=Array){var h=a(g.containment);
var e=h[0];
if(!e){return
}var f=h.offset();
var d=(a(e).css("overflow")!="hidden");
this.containment=[(parseInt(a(e).css("borderLeftWidth"),10)||0)+(parseInt(a(e).css("paddingLeft"),10)||0),(parseInt(a(e).css("borderTopWidth"),10)||0)+(parseInt(a(e).css("paddingTop"),10)||0),(d?Math.max(e.scrollWidth,e.offsetWidth):e.offsetWidth)-(parseInt(a(e).css("borderLeftWidth"),10)||0)-(parseInt(a(e).css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left-this.margins.right,(d?Math.max(e.scrollHeight,e.offsetHeight):e.offsetHeight)-(parseInt(a(e).css("borderTopWidth"),10)||0)-(parseInt(a(e).css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top-this.margins.bottom];
this.relative_container=h
}else{if(g.containment.constructor==Array){this.containment=g.containment
}}},_convertPositionTo:function(g,i){if(!i){i=this.position
}var e=g=="absolute"?1:-1;
var f=this.options,c=this.cssPosition=="absolute"&&!(this.scrollParent[0]!=document&&a.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,h=(/(html|body)/i).test(c[0].tagName);
return{top:(i.top+this.offset.relative.top*e+this.offset.parent.top*e-((this.cssPosition=="fixed"?-this.scrollParent.scrollTop():(h?0:c.scrollTop()))*e)),left:(i.left+this.offset.relative.left*e+this.offset.parent.left*e-((this.cssPosition=="fixed"?-this.scrollParent.scrollLeft():h?0:c.scrollLeft())*e))}
},_generatePosition:function(d){var e=this.options,l=this.cssPosition=="absolute"&&!(this.scrollParent[0]!=document&&a.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,i=(/(html|body)/i).test(l[0].tagName);
var h=d.pageX;
var g=d.pageY;
if(this.originalPosition){var c;
if(this.containment){if(this.relative_container){var k=this.relative_container.offset();
c=[this.containment[0]+k.left,this.containment[1]+k.top,this.containment[2]+k.left,this.containment[3]+k.top]
}else{c=this.containment
}if(d.pageX-this.offset.click.left<c[0]){h=c[0]+this.offset.click.left
}if(d.pageY-this.offset.click.top<c[1]){g=c[1]+this.offset.click.top
}if(d.pageX-this.offset.click.left>c[2]){h=c[2]+this.offset.click.left
}if(d.pageY-this.offset.click.top>c[3]){g=c[3]+this.offset.click.top
}}if(e.grid){var j=e.grid[1]?this.originalPageY+Math.round((g-this.originalPageY)/e.grid[1])*e.grid[1]:this.originalPageY;
g=c?(!(j-this.offset.click.top<c[1]||j-this.offset.click.top>c[3])?j:(!(j-this.offset.click.top<c[1])?j-e.grid[1]:j+e.grid[1])):j;
var f=e.grid[0]?this.originalPageX+Math.round((h-this.originalPageX)/e.grid[0])*e.grid[0]:this.originalPageX;
h=c?(!(f-this.offset.click.left<c[0]||f-this.offset.click.left>c[2])?f:(!(f-this.offset.click.left<c[0])?f-e.grid[0]:f+e.grid[0])):f
}}return{top:(g-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+((this.cssPosition=="fixed"?-this.scrollParent.scrollTop():(i?0:l.scrollTop())))),left:(h-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+((this.cssPosition=="fixed"?-this.scrollParent.scrollLeft():i?0:l.scrollLeft())))}
},_clear:function(){this.helper.removeClass("ui-draggable-dragging");
if(this.helper[0]!=this.element[0]&&!this.cancelHelperRemoval){this.helper.remove()
}this.helper=null;
this.cancelHelperRemoval=false
},_trigger:function(c,d,e){e=e||this._uiHash();
a.ui.plugin.call(this,c,[d,e]);
if(c=="drag"){this.positionAbs=this._convertPositionTo("absolute")
}return a.Widget.prototype._trigger.call(this,c,d,e)
},plugins:{},_uiHash:function(c){return{helper:this.helper,position:this.position,originalPosition:this.originalPosition,offset:this.positionAbs}
}});
a.ui.plugin.add("draggable","connectToSortable",{start:function(d,f){var e=a(this).data("draggable"),g=e.options,c=a.extend({},f,{item:e.element});
e.sortables=[];
a(g.connectToSortable).each(function(){var h=a.data(this,"sortable");
if(h&&!h.options.disabled){e.sortables.push({instance:h,shouldRevert:h.options.revert});
h.refreshPositions();
h._trigger("activate",d,c)
}})
},stop:function(d,f){var e=a(this).data("draggable"),c=a.extend({},f,{item:e.element});
a.each(e.sortables,function(){if(this.instance.isOver){this.instance.isOver=0;
e.cancelHelperRemoval=true;
this.instance.cancelHelperRemoval=false;
if(this.shouldRevert){this.instance.options.revert=true
}this.instance._mouseStop(d);
this.instance.options.helper=this.instance.options._helper;
if(e.options.helper=="original"){this.instance.currentItem.css({top:"auto",left:"auto"})
}}else{this.instance.cancelHelperRemoval=false;
this.instance._trigger("deactivate",d,c)
}})
},drag:function(d,g){var f=a(this).data("draggable"),c=this;
var e=function(j){var p=this.offset.click.top,n=this.offset.click.left;
var h=this.positionAbs.top,l=this.positionAbs.left;
var k=j.height,m=j.width;
var q=j.top,i=j.left;
return a.ui.isOver(h+p,l+n,q,i,k,m)
};
a.each(f.sortables,function(j){var h=false;
var k=this;
this.instance.positionAbs=f.positionAbs;
this.instance.helperProportions=f.helperProportions;
this.instance.offset.click=f.offset.click;
if(this.instance._intersectsWith(this.instance.containerCache)){h=true;
a.each(f.sortables,function(){this.instance.positionAbs=f.positionAbs;
this.instance.helperProportions=f.helperProportions;
this.instance.offset.click=f.offset.click;
if(this!=k&&this.instance._intersectsWith(this.instance.containerCache)&&a.ui.contains(k.instance.element[0],this.instance.element[0])){h=false
}return h
})
}if(h){if(!this.instance.isOver){this.instance.isOver=1;
this.instance.currentItem=a(c).clone().removeAttr("id").appendTo(this.instance.element).data("sortable-item",true);
this.instance.options._helper=this.instance.options.helper;
this.instance.options.helper=function(){return g.helper[0]
};
d.target=this.instance.currentItem[0];
this.instance._mouseCapture(d,true);
this.instance._mouseStart(d,true,true);
this.instance.offset.click.top=f.offset.click.top;
this.instance.offset.click.left=f.offset.click.left;
this.instance.offset.parent.left-=f.offset.parent.left-this.instance.offset.parent.left;
this.instance.offset.parent.top-=f.offset.parent.top-this.instance.offset.parent.top;
f._trigger("toSortable",d);
f.dropped=this.instance.element;
f.currentItem=f.element;
this.instance.fromOutside=f
}if(this.instance.currentItem){this.instance._mouseDrag(d)
}}else{if(this.instance.isOver){this.instance.isOver=0;
this.instance.cancelHelperRemoval=true;
this.instance.options.revert=false;
this.instance._trigger("out",d,this.instance._uiHash(this.instance));
this.instance._mouseStop(d,true);
this.instance.options.helper=this.instance.options._helper;
this.instance.currentItem.remove();
if(this.instance.placeholder){this.instance.placeholder.remove()
}f._trigger("fromSortable",d);
f.dropped=false
}}})
}});
a.ui.plugin.add("draggable","cursor",{start:function(d,e){var c=a("body"),f=a(this).data("draggable").options;
if(c.css("cursor")){f._cursor=c.css("cursor")
}c.css("cursor",f.cursor)
},stop:function(c,d){var e=a(this).data("draggable").options;
if(e._cursor){a("body").css("cursor",e._cursor)
}}});
a.ui.plugin.add("draggable","opacity",{start:function(d,e){var c=a(e.helper),f=a(this).data("draggable").options;
if(c.css("opacity")){f._opacity=c.css("opacity")
}c.css("opacity",f.opacity)
},stop:function(c,d){var e=a(this).data("draggable").options;
if(e._opacity){a(d.helper).css("opacity",e._opacity)
}}});
a.ui.plugin.add("draggable","scroll",{start:function(d,e){var c=a(this).data("draggable");
if(c.scrollParent[0]!=document&&c.scrollParent[0].tagName!="HTML"){c.overflowOffset=c.scrollParent.offset()
}},drag:function(e,f){var d=a(this).data("draggable"),g=d.options,c=false;
if(d.scrollParent[0]!=document&&d.scrollParent[0].tagName!="HTML"){if(!g.axis||g.axis!="x"){if((d.overflowOffset.top+d.scrollParent[0].offsetHeight)-e.pageY<g.scrollSensitivity){d.scrollParent[0].scrollTop=c=d.scrollParent[0].scrollTop+g.scrollSpeed
}else{if(e.pageY-d.overflowOffset.top<g.scrollSensitivity){d.scrollParent[0].scrollTop=c=d.scrollParent[0].scrollTop-g.scrollSpeed
}}}if(!g.axis||g.axis!="y"){if((d.overflowOffset.left+d.scrollParent[0].offsetWidth)-e.pageX<g.scrollSensitivity){d.scrollParent[0].scrollLeft=c=d.scrollParent[0].scrollLeft+g.scrollSpeed
}else{if(e.pageX-d.overflowOffset.left<g.scrollSensitivity){d.scrollParent[0].scrollLeft=c=d.scrollParent[0].scrollLeft-g.scrollSpeed
}}}}else{if(!g.axis||g.axis!="x"){if(e.pageY-a(document).scrollTop()<g.scrollSensitivity){c=a(document).scrollTop(a(document).scrollTop()-g.scrollSpeed)
}else{if(a(window).height()-(e.pageY-a(document).scrollTop())<g.scrollSensitivity){c=a(document).scrollTop(a(document).scrollTop()+g.scrollSpeed)
}}}if(!g.axis||g.axis!="y"){if(e.pageX-a(document).scrollLeft()<g.scrollSensitivity){c=a(document).scrollLeft(a(document).scrollLeft()-g.scrollSpeed)
}else{if(a(window).width()-(e.pageX-a(document).scrollLeft())<g.scrollSensitivity){c=a(document).scrollLeft(a(document).scrollLeft()+g.scrollSpeed)
}}}}if(c!==false&&a.ui.ddmanager&&!g.dropBehaviour){a.ui.ddmanager.prepareOffsets(d,e)
}}});
a.ui.plugin.add("draggable","snap",{start:function(d,e){var c=a(this).data("draggable"),f=c.options;
c.snapElements=[];
a(f.snap.constructor!=String?(f.snap.items||":data(draggable)"):f.snap).each(function(){var h=a(this);
var g=h.offset();
if(this!=c.element[0]){c.snapElements.push({item:this,width:h.outerWidth(),height:h.outerHeight(),top:g.top,left:g.left})
}})
},drag:function(u,p){var g=a(this).data("draggable"),q=g.options;
var y=q.snapTolerance;
var x=p.offset.left,w=x+g.helperProportions.width,f=p.offset.top,e=f+g.helperProportions.height;
for(var v=g.snapElements.length-1;
v>=0;
v--){var s=g.snapElements[v].left,n=s+g.snapElements[v].width,m=g.snapElements[v].top,A=m+g.snapElements[v].height;
if(!((s-y<x&&x<n+y&&m-y<f&&f<A+y)||(s-y<x&&x<n+y&&m-y<e&&e<A+y)||(s-y<w&&w<n+y&&m-y<f&&f<A+y)||(s-y<w&&w<n+y&&m-y<e&&e<A+y))){if(g.snapElements[v].snapping){(g.options.snap.release&&g.options.snap.release.call(g.element,u,a.extend(g._uiHash(),{snapItem:g.snapElements[v].item})))
}g.snapElements[v].snapping=false;
continue
}if(q.snapMode!="inner"){var c=Math.abs(m-e)<=y;
var z=Math.abs(A-f)<=y;
var j=Math.abs(s-w)<=y;
var k=Math.abs(n-x)<=y;
if(c){p.position.top=g._convertPositionTo("relative",{top:m-g.helperProportions.height,left:0}).top-g.margins.top
}if(z){p.position.top=g._convertPositionTo("relative",{top:A,left:0}).top-g.margins.top
}if(j){p.position.left=g._convertPositionTo("relative",{top:0,left:s-g.helperProportions.width}).left-g.margins.left
}if(k){p.position.left=g._convertPositionTo("relative",{top:0,left:n}).left-g.margins.left
}}var h=(c||z||j||k);
if(q.snapMode!="outer"){var c=Math.abs(m-f)<=y;
var z=Math.abs(A-e)<=y;
var j=Math.abs(s-x)<=y;
var k=Math.abs(n-w)<=y;
if(c){p.position.top=g._convertPositionTo("relative",{top:m,left:0}).top-g.margins.top
}if(z){p.position.top=g._convertPositionTo("relative",{top:A-g.helperProportions.height,left:0}).top-g.margins.top
}if(j){p.position.left=g._convertPositionTo("relative",{top:0,left:s}).left-g.margins.left
}if(k){p.position.left=g._convertPositionTo("relative",{top:0,left:n-g.helperProportions.width}).left-g.margins.left
}}if(!g.snapElements[v].snapping&&(c||z||j||k||h)){(g.options.snap.snap&&g.options.snap.snap.call(g.element,u,a.extend(g._uiHash(),{snapItem:g.snapElements[v].item})))
}g.snapElements[v].snapping=(c||z||j||k||h)
}}});
a.ui.plugin.add("draggable","stack",{start:function(d,e){var g=a(this).data("draggable").options;
var f=a.makeArray(a(g.stack)).sort(function(i,h){return(parseInt(a(i).css("zIndex"),10)||0)-(parseInt(a(h).css("zIndex"),10)||0)
});
if(!f.length){return
}var c=parseInt(f[0].style.zIndex)||0;
a(f).each(function(h){this.style.zIndex=c+h
});
this[0].style.zIndex=c+f.length
}});
a.ui.plugin.add("draggable","zIndex",{start:function(d,e){var c=a(e.helper),f=a(this).data("draggable").options;
if(c.css("zIndex")){f._zIndex=c.css("zIndex")
}c.css("zIndex",f.zIndex)
},stop:function(c,d){var e=a(this).data("draggable").options;
if(e._zIndex){a(d.helper).css("zIndex",e._zIndex)
}}})
})(jQuery);
(function(a,b){a.widget("ui.droppable",{version:"1.9.2",widgetEventPrefix:"drop",options:{accept:"*",activeClass:false,addClasses:true,greedy:false,hoverClass:false,scope:"default",tolerance:"intersect"},_create:function(){var d=this.options,c=d.accept;
this.isover=0;
this.isout=1;
this.accept=a.isFunction(c)?c:function(e){return e.is(c)
};
this.proportions={width:this.element[0].offsetWidth,height:this.element[0].offsetHeight};
a.ui.ddmanager.droppables[d.scope]=a.ui.ddmanager.droppables[d.scope]||[];
a.ui.ddmanager.droppables[d.scope].push(this);
(d.addClasses&&this.element.addClass("ui-droppable"))
},_destroy:function(){var c=a.ui.ddmanager.droppables[this.options.scope];
for(var d=0;
d<c.length;
d++){if(c[d]==this){c.splice(d,1)
}}this.element.removeClass("ui-droppable ui-droppable-disabled")
},_setOption:function(c,d){if(c=="accept"){this.accept=a.isFunction(d)?d:function(e){return e.is(d)
}
}a.Widget.prototype._setOption.apply(this,arguments)
},_activate:function(d){var c=a.ui.ddmanager.current;
if(this.options.activeClass){this.element.addClass(this.options.activeClass)
}(c&&this._trigger("activate",d,this.ui(c)))
},_deactivate:function(d){var c=a.ui.ddmanager.current;
if(this.options.activeClass){this.element.removeClass(this.options.activeClass)
}(c&&this._trigger("deactivate",d,this.ui(c)))
},_over:function(d){var c=a.ui.ddmanager.current;
if(!c||(c.currentItem||c.element)[0]==this.element[0]){return
}if(this.accept.call(this.element[0],(c.currentItem||c.element))){if(this.options.hoverClass){this.element.addClass(this.options.hoverClass)
}this._trigger("over",d,this.ui(c))
}},_out:function(d){var c=a.ui.ddmanager.current;
if(!c||(c.currentItem||c.element)[0]==this.element[0]){return
}if(this.accept.call(this.element[0],(c.currentItem||c.element))){if(this.options.hoverClass){this.element.removeClass(this.options.hoverClass)
}this._trigger("out",d,this.ui(c))
}},_drop:function(d,e){var c=e||a.ui.ddmanager.current;
if(!c||(c.currentItem||c.element)[0]==this.element[0]){return false
}var f=false;
this.element.find(":data(droppable)").not(".ui-draggable-dragging").each(function(){var g=a.data(this,"droppable");
if(g.options.greedy&&!g.options.disabled&&g.options.scope==c.options.scope&&g.accept.call(g.element[0],(c.currentItem||c.element))&&a.ui.intersect(c,a.extend(g,{offset:g.element.offset()}),g.options.tolerance)){f=true;
return false
}});
if(f){return false
}if(this.accept.call(this.element[0],(c.currentItem||c.element))){if(this.options.activeClass){this.element.removeClass(this.options.activeClass)
}if(this.options.hoverClass){this.element.removeClass(this.options.hoverClass)
}this._trigger("drop",d,this.ui(c));
return this.element
}return false
},ui:function(d){return{draggable:(d.currentItem||d.element),helper:d.helper,position:d.position,offset:d.positionAbs}
}});
a.ui.intersect=function(q,j,o){if(!j.offset){return false
}var e=(q.positionAbs||q.position.absolute).left,d=e+q.helperProportions.width,n=(q.positionAbs||q.position.absolute).top,m=n+q.helperProportions.height;
var g=j.offset.left,c=g+j.proportions.width,p=j.offset.top,k=p+j.proportions.height;
switch(o){case"fit":return(g<=e&&d<=c&&p<=n&&m<=k);
break;
case"intersect":return(g<e+(q.helperProportions.width/2)&&d-(q.helperProportions.width/2)<c&&p<n+(q.helperProportions.height/2)&&m-(q.helperProportions.height/2)<k);
break;
case"pointer":var h=((q.positionAbs||q.position.absolute).left+(q.clickOffset||q.offset.click).left),i=((q.positionAbs||q.position.absolute).top+(q.clickOffset||q.offset.click).top),f=a.ui.isOver(i,h,p,g,j.proportions.height,j.proportions.width);
return f;
break;
case"touch":return((n>=p&&n<=k)||(m>=p&&m<=k)||(n<p&&m>k))&&((e>=g&&e<=c)||(d>=g&&d<=c)||(e<g&&d>c));
break;
default:return false;
break
}};
a.ui.ddmanager={current:null,droppables:{"default":[]},prepareOffsets:function(f,h){var c=a.ui.ddmanager.droppables[f.options.scope]||[];
var g=h?h.type:null;
var k=(f.currentItem||f.element).find(":data(droppable)").andSelf();
droppablesLoop:for(var e=0;
e<c.length;
e++){if(c[e].options.disabled||(f&&!c[e].accept.call(c[e].element[0],(f.currentItem||f.element)))){continue
}for(var d=0;
d<k.length;
d++){if(k[d]==c[e].element[0]){c[e].proportions.height=0;
continue droppablesLoop
}}c[e].visible=c[e].element.css("display")!="none";
if(!c[e].visible){continue
}if(g=="mousedown"){c[e]._activate.call(c[e],h)
}c[e].offset=c[e].element.offset();
c[e].proportions={width:c[e].element[0].offsetWidth,height:c[e].element[0].offsetHeight}
}},drop:function(c,d){var e=false;
a.each(a.ui.ddmanager.droppables[c.options.scope]||[],function(){if(!this.options){return
}if(!this.options.disabled&&this.visible&&a.ui.intersect(c,this,this.options.tolerance)){e=this._drop.call(this,d)||e
}if(!this.options.disabled&&this.visible&&this.accept.call(this.element[0],(c.currentItem||c.element))){this.isout=1;
this.isover=0;
this._deactivate.call(this,d)
}});
return e
},dragStart:function(c,d){c.element.parentsUntil("body").bind("scroll.droppable",function(){if(!c.options.refreshPositions){a.ui.ddmanager.prepareOffsets(c,d)
}})
},drag:function(c,d){if(c.options.refreshPositions){a.ui.ddmanager.prepareOffsets(c,d)
}a.each(a.ui.ddmanager.droppables[c.options.scope]||[],function(){if(this.options.disabled||this.greedyChild||!this.visible){return
}var g=a.ui.intersect(c,this,this.options.tolerance);
var i=!g&&this.isover==1?"isout":(g&&this.isover==0?"isover":null);
if(!i){return
}var h;
if(this.options.greedy){var f=this.options.scope;
var e=this.element.parents(":data(droppable)").filter(function(){return a.data(this,"droppable").options.scope===f
});
if(e.length){h=a.data(e[0],"droppable");
h.greedyChild=(i=="isover"?1:0)
}}if(h&&i=="isover"){h.isover=0;
h.isout=1;
h._out.call(h,d)
}this[i]=1;
this[i=="isout"?"isover":"isout"]=0;
this[i=="isover"?"_over":"_out"].call(this,d);
if(h&&i=="isout"){h.isout=0;
h.isover=1;
h._over.call(h,d)
}})
},dragStop:function(c,d){c.element.parentsUntil("body").unbind("scroll.droppable");
if(!c.options.refreshPositions){a.ui.ddmanager.prepareOffsets(c,d)
}}}
})(jQuery);
(jQuery.effects||(function(b,d){var a=b.uiBackCompat!==false,c="ui-effects-";
b.effects={effect:{}};
/*!
     * jQuery Color Animations v2.0.0
     * http://jquery.com/
     *
     * Copyright 2012 jQuery Foundation and other contributors
     * Released under the MIT license.
     * http://jquery.org/license
     *
     * Date: Mon Aug 13 13:41:02 2012 -0500
     */
(function(s,h){var o="backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor color columnRuleColor outlineColor textDecorationColor textEmphasisColor".split(" "),l=/^([\-+])=\s*(\d+\.?\d*)/,k=[{re:/rgba?\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d+(?:\.\d+)?)\s*)?\)/,parse:function(t){return[t[1],t[2],t[3],t[4]]
}},{re:/rgba?\(\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d+(?:\.\d+)?)\s*)?\)/,parse:function(t){return[t[1]*2.55,t[2]*2.55,t[3]*2.55,t[4]]
}},{re:/#([a-f0-9]{2})([a-f0-9]{2})([a-f0-9]{2})/,parse:function(t){return[parseInt(t[1],16),parseInt(t[2],16),parseInt(t[3],16)]
}},{re:/#([a-f0-9])([a-f0-9])([a-f0-9])/,parse:function(t){return[parseInt(t[1]+t[1],16),parseInt(t[2]+t[2],16),parseInt(t[3]+t[3],16)]
}},{re:/hsla?\(\s*(\d+(?:\.\d+)?)\s*,\s*(\d+(?:\.\d+)?)\%\s*,\s*(\d+(?:\.\d+)?)\%\s*(?:,\s*(\d+(?:\.\d+)?)\s*)?\)/,space:"hsla",parse:function(t){return[t[1],t[2]/100,t[3]/100,t[4]]
}}],i=s.Color=function(u,v,t,w){return new s.Color.fn.parse(u,v,t,w)
},n={rgba:{props:{red:{idx:0,type:"byte"},green:{idx:1,type:"byte"},blue:{idx:2,type:"byte"}}},hsla:{props:{hue:{idx:0,type:"degrees"},saturation:{idx:1,type:"percent"},lightness:{idx:2,type:"percent"}}}},r={"byte":{floor:true,max:255},percent:{max:1},degrees:{mod:360,floor:true}},q=i.support={},f=s("<p>")[0],e,p=s.each;
f.style.cssText="background-color:rgba(1,1,1,.5)";
q.rgba=f.style.backgroundColor.indexOf("rgba")>-1;
p(n,function(t,u){u.cache="_"+t;
u.props.alpha={idx:3,type:"percent",def:1}
});
function m(u,w,v){var t=r[w.type]||{};
if(u==null){return(v||!w.def)?null:w.def
}u=t.floor?~~u:parseFloat(u);
if(isNaN(u)){return w.def
}if(t.mod){return(u+t.mod)%t.mod
}return 0>u?0:t.max<u?t.max:u
}function j(t){var v=i(),u=v._rgba=[];
t=t.toLowerCase();
p(k,function(A,B){var y,z=B.re.exec(t),x=z&&B.parse(z),w=B.space||"rgba";
if(x){y=v[w](x);
v[n[w].cache]=y[n[w].cache];
u=v._rgba=y._rgba;
return false
}});
if(u.length){if(u.join()==="0,0,0,0"){s.extend(u,e.transparent)
}return v
}return e[t]
}i.fn=s.extend(i.prototype,{parse:function(z,x,t,y){if(z===h){this._rgba=[null,null,null,null];
return this
}if(z.jquery||z.nodeType){z=s(z).css(x);
x=h
}var w=this,v=s.type(z),u=this._rgba=[];
if(x!==h){z=[z,x,t,y];
v="array"
}if(v==="string"){return this.parse(j(z)||e._default)
}if(v==="array"){p(n.rgba.props,function(A,B){u[B.idx]=m(z[B.idx],B)
});
return this
}if(v==="object"){if(z instanceof i){p(n,function(A,B){if(z[B.cache]){w[B.cache]=z[B.cache].slice()
}})
}else{p(n,function(B,C){var A=C.cache;
p(C.props,function(D,E){if(!w[A]&&C.to){if(D==="alpha"||z[D]==null){return
}w[A]=C.to(w._rgba)
}w[A][E.idx]=m(z[D],E,true)
});
if(w[A]&&b.inArray(null,w[A].slice(0,3))<0){w[A][3]=1;
if(C.from){w._rgba=C.from(w[A])
}}})
}return this
}},is:function(v){var t=i(v),w=true,u=this;
p(n,function(x,z){var A,y=t[z.cache];
if(y){A=u[z.cache]||z.to&&z.to(u._rgba)||[];
p(z.props,function(B,C){if(y[C.idx]!=null){w=(y[C.idx]===A[C.idx]);
return w
}})
}return w
});
return w
},_space:function(){var t=[],u=this;
p(n,function(v,w){if(u[w.cache]){t.push(v)
}});
return t.pop()
},transition:function(u,A){var v=i(u),w=v._space(),x=n[w],y=this.alpha()===0?i("transparent"):this,z=y[x.cache]||x.to(y._rgba),t=z.slice();
v=v[x.cache];
p(x.props,function(E,G){var D=G.idx,C=z[D],B=v[D],F=r[G.type]||{};
if(B===null){return
}if(C===null){t[D]=B
}else{if(F.mod){if(B-C>F.mod/2){C+=F.mod
}else{if(C-B>F.mod/2){C-=F.mod
}}}t[D]=m((B-C)*A+C,G)
}});
return this[w](t)
},blend:function(w){if(this._rgba[3]===1){return this
}var v=this._rgba.slice(),u=v.pop(),t=i(w)._rgba;
return i(s.map(v,function(x,y){return(1-u)*t[y]+u*x
}))
},toRgbaString:function(){var u="rgba(",t=s.map(this._rgba,function(w,x){return w==null?(x>2?1:0):w
});
if(t[3]===1){t.pop();
u="rgb("
}return u+t.join()+")"
},toHslaString:function(){var u="hsla(",t=s.map(this.hsla(),function(w,x){if(w==null){w=x>2?1:0
}if(x&&x<3){w=Math.round(w*100)+"%"
}return w
});
if(t[3]===1){t.pop();
u="hsl("
}return u+t.join()+")"
},toHexString:function(t){var u=this._rgba.slice(),v=u.pop();
if(t){u.push(~~(v*255))
}return"#"+s.map(u,function(w){w=(w||0).toString(16);
return w.length===1?"0"+w:w
}).join("")
},toString:function(){return this._rgba[3]===0?"transparent":this.toRgbaString()
}});
i.fn.parse.prototype=i.fn;
function g(v,u,t){t=(t+1)%1;
if(t*6<1){return v+(u-v)*t*6
}if(t*2<1){return u
}if(t*3<2){return v+(u-v)*((2/3)-t)*6
}return v
}n.hsla.to=function(v){if(v[0]==null||v[1]==null||v[2]==null){return[null,null,null,v[3]]
}var t=v[0]/255,y=v[1]/255,z=v[2]/255,B=v[3],A=Math.max(t,y,z),w=Math.min(t,y,z),C=A-w,D=A+w,u=D*0.5,x,E;
if(w===A){x=0
}else{if(t===A){x=(60*(y-z)/C)+360
}else{if(y===A){x=(60*(z-t)/C)+120
}else{x=(60*(t-y)/C)+240
}}}if(u===0||u===1){E=u
}else{if(u<=0.5){E=C/D
}else{E=C/(2-D)
}}return[Math.round(x)%360,E,u,B==null?1:B]
};
n.hsla.from=function(x){if(x[0]==null||x[1]==null||x[2]==null){return[null,null,null,x[3]]
}var w=x[0]/360,v=x[1],u=x[2],t=x[3],y=u<=0.5?u*(1+v):u+v-u*v,z=2*u-y;
return[Math.round(g(z,y,w+(1/3))*255),Math.round(g(z,y,w)*255),Math.round(g(z,y,w-(1/3))*255),t]
};
p(n,function(u,w){var v=w.props,t=w.cache,y=w.to,x=w.from;
i.fn[u]=function(D){if(y&&!this[t]){this[t]=y(this._rgba)
}if(D===h){return this[t].slice()
}var A,C=s.type(D),z=(C==="array"||C==="object")?D:arguments,B=this[t].slice();
p(v,function(E,G){var F=z[C==="object"?E:G.idx];
if(F==null){F=B[G.idx]
}B[G.idx]=m(F,G)
});
if(x){A=i(x(B));
A[t]=B;
return A
}else{return i(B)
}};
p(v,function(z,A){if(i.fn[z]){return
}i.fn[z]=function(E){var G=s.type(E),D=(z==="alpha"?(this._hsla?"hsla":"rgba"):u),C=this[D](),F=C[A.idx],B;
if(G==="undefined"){return F
}if(G==="function"){E=E.call(this,F);
G=s.type(E)
}if(E==null&&A.empty){return this
}if(G==="string"){B=l.exec(E);
if(B){E=F+parseFloat(B[2])*(B[1]==="+"?1:-1)
}}C[A.idx]=E;
return this[D](C)
}
})
});
p(o,function(t,u){s.cssHooks[u]={set:function(z,A){var w,y,v="";
if(s.type(A)!=="string"||(w=j(A))){A=i(w||A);
if(!q.rgba&&A._rgba[3]!==1){y=u==="backgroundColor"?z.parentNode:z;
while((v===""||v==="transparent")&&y&&y.style){try{v=s.css(y,"backgroundColor");
y=y.parentNode
}catch(B){}}A=A.blend(v&&v!=="transparent"?v:"_default")
}A=A.toRgbaString()
}try{z.style[u]=A
}catch(x){}}};
s.fx.step[u]=function(v){if(!v.colorInit){v.start=i(v.elem,u);
v.end=i(v.end);
v.colorInit=true
}s.cssHooks[u].set(v.elem,v.start.transition(v.end,v.pos))
}
});
s.cssHooks.borderColor={expand:function(u){var t={};
p(["Top","Right","Bottom","Left"],function(w,v){t["border"+v+"Color"]=u
});
return t
}};
e=s.Color.names={aqua:"#00ffff",black:"#000000",blue:"#0000ff",fuchsia:"#ff00ff",gray:"#808080",green:"#008000",lime:"#00ff00",maroon:"#800000",navy:"#000080",olive:"#808000",purple:"#800080",red:"#ff0000",silver:"#c0c0c0",teal:"#008080",white:"#ffffff",yellow:"#ffff00",transparent:[null,null,null,0],_default:"#ffffff"}
})(jQuery);
(function(){var f=["add","remove","toggle"],g={border:1,borderBottom:1,borderColor:1,borderLeft:1,borderRight:1,borderTop:1,borderWidth:1,margin:1,padding:1};
b.each(["borderLeftStyle","borderRightStyle","borderBottomStyle","borderTopStyle"],function(i,j){b.fx.step[j]=function(k){if(k.end!=="none"&&!k.setAttr||k.pos===1&&!k.setAttr){jQuery.style(k.elem,j,k.end);
k.setAttr=true
}}
});
function h(){var k=this.ownerDocument.defaultView?this.ownerDocument.defaultView.getComputedStyle(this,null):this.currentStyle,l={},j,i;
if(k&&k.length&&k[0]&&k[k[0]]){i=k.length;
while(i--){j=k[i];
if(typeof k[j]==="string"){l[b.camelCase(j)]=k[j]
}}}else{for(j in k){if(typeof k[j]==="string"){l[j]=k[j]
}}}return l
}function e(i,k){var m={},j,l;
for(j in k){l=k[j];
if(i[j]!==l){if(!g[j]){if(b.fx.step[j]||!isNaN(parseFloat(l))){m[j]=l
}}}}return m
}b.effects.animateClass=function(i,j,m,l){var k=b.speed(j,m,l);
return this.queue(function(){var p=b(this),n=p.attr("class")||"",o,q=k.children?p.find("*").andSelf():p;
q=q.map(function(){var r=b(this);
return{el:r,start:h.call(this)}
});
o=function(){b.each(f,function(r,s){if(i[s]){p[s+"Class"](i[s])
}})
};
o();
q=q.map(function(){this.end=h.call(this.el[0]);
this.diff=e(this.start,this.end);
return this
});
p.attr("class",n);
q=q.map(function(){var t=this,r=b.Deferred(),s=jQuery.extend({},k,{queue:false,complete:function(){r.resolve(t)
}});
this.el.animate(this.diff,s);
return r.promise()
});
b.when.apply(b,q.get()).done(function(){o();
b.each(arguments,function(){var r=this.el;
b.each(this.diff,function(s){r.css(s,"")
})
});
k.complete.call(p[0])
})
})
};
b.fn.extend({_addClass:b.fn.addClass,addClass:function(j,i,l,k){return i?b.effects.animateClass.call(this,{add:j},i,l,k):this._addClass(j)
},_removeClass:b.fn.removeClass,removeClass:function(j,i,l,k){return i?b.effects.animateClass.call(this,{remove:j},i,l,k):this._removeClass(j)
},_toggleClass:b.fn.toggleClass,toggleClass:function(k,j,i,m,l){if(typeof j==="boolean"||j===d){if(!i){return this._toggleClass(k,j)
}else{return b.effects.animateClass.call(this,(j?{add:k}:{remove:k}),i,m,l)
}}else{return b.effects.animateClass.call(this,{toggle:k},j,i,m)
}},switchClass:function(i,k,j,m,l){return b.effects.animateClass.call(this,{add:k,remove:i},j,m,l)
}})
})();
(function(){b.extend(b.effects,{version:"1.9.2",save:function(h,j){for(var g=0;
g<j.length;
g++){if(j[g]!==null){h.data(c+j[g],h[0].style[j[g]])
}}},restore:function(h,k){var j,g;
for(g=0;
g<k.length;
g++){if(k[g]!==null){j=h.data(c+k[g]);
if(j===d){j=""
}h.css(k[g],j)
}}},setMode:function(g,h){if(h==="toggle"){h=g.is(":hidden")?"show":"hide"
}return h
},getBaseline:function(h,i){var j,g;
switch(h[0]){case"top":j=0;
break;
case"middle":j=0.5;
break;
case"bottom":j=1;
break;
default:j=h[0]/i.height
}switch(h[1]){case"left":g=0;
break;
case"center":g=0.5;
break;
case"right":g=1;
break;
default:g=h[1]/i.width
}return{x:g,y:j}
},createWrapper:function(h){if(h.parent().is(".ui-effects-wrapper")){return h.parent()
}var i={width:h.outerWidth(true),height:h.outerHeight(true),"float":h.css("float")},l=b("<div></div>").addClass("ui-effects-wrapper").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0}),g={width:h.width(),height:h.height()},k=document.activeElement;
try{k.id
}catch(j){k=document.body
}h.wrap(l);
if(h[0]===k||b.contains(h[0],k)){b(k).focus()
}l=h.parent();
if(h.css("position")==="static"){l.css({position:"relative"});
h.css({position:"relative"})
}else{b.extend(i,{position:h.css("position"),zIndex:h.css("z-index")});
b.each(["top","left","bottom","right"],function(m,n){i[n]=h.css(n);
if(isNaN(parseInt(i[n],10))){i[n]="auto"
}});
h.css({position:"relative",top:0,left:0,right:"auto",bottom:"auto"})
}h.css(g);
return l.css(i).show()
},removeWrapper:function(g){var h=document.activeElement;
if(g.parent().is(".ui-effects-wrapper")){g.parent().replaceWith(g);
if(g[0]===h||b.contains(g[0],h)){b(h).focus()
}}return g
},setTransition:function(h,j,g,i){i=i||{};
b.each(j,function(l,k){var m=h.cssUnit(k);
if(m[0]>0){i[k]=m[0]*g+m[1]
}});
return i
}});
function e(h,g,i,j){if(b.isPlainObject(h)){g=h;
h=h.effect
}h={effect:h};
if(g==null){g={}
}if(b.isFunction(g)){j=g;
i=null;
g={}
}if(typeof g==="number"||b.fx.speeds[g]){j=i;
i=g;
g={}
}if(b.isFunction(i)){j=i;
i=null
}if(g){b.extend(h,g)
}i=i||g.duration;
h.duration=b.fx.off?0:typeof i==="number"?i:i in b.fx.speeds?b.fx.speeds[i]:b.fx.speeds._default;
h.complete=j||g.complete;
return h
}function f(g){if(!g||typeof g==="number"||b.fx.speeds[g]){return true
}if(typeof g==="string"&&!b.effects.effect[g]){if(a&&b.effects[g]){return false
}return true
}return false
}b.fn.extend({effect:function(){var i=e.apply(this,arguments),l=i.mode,g=i.queue,h=b.effects.effect[i.effect],j=!h&&a&&b.effects[i.effect];
if(b.fx.off||!(h||j)){if(l){return this[l](i.duration,i.complete)
}else{return this.each(function(){if(i.complete){i.complete.call(this)
}})
}}function k(o){var p=b(this),n=i.complete,q=i.mode;
function m(){if(b.isFunction(n)){n.call(p[0])
}if(b.isFunction(o)){o()
}}if(p.is(":hidden")?q==="hide":q==="show"){m()
}else{h.call(p[0],i,m)
}}if(h){return g===false?this.each(k):this.queue(g||"fx",k)
}else{return j.call(this,{options:i,duration:i.duration,callback:i.complete,mode:i.mode})
}},_show:b.fn.show,show:function(h){if(f(h)){return this._show.apply(this,arguments)
}else{var g=e.apply(this,arguments);
g.mode="show";
return this.effect.call(this,g)
}},_hide:b.fn.hide,hide:function(h){if(f(h)){return this._hide.apply(this,arguments)
}else{var g=e.apply(this,arguments);
g.mode="hide";
return this.effect.call(this,g)
}},__toggle:b.fn.toggle,toggle:function(h){if(f(h)||typeof h==="boolean"||b.isFunction(h)){return this.__toggle.apply(this,arguments)
}else{var g=e.apply(this,arguments);
g.mode="toggle";
return this.effect.call(this,g)
}},cssUnit:function(g){var h=this.css(g),i=[];
b.each(["em","px","%","pt"],function(j,k){if(h.indexOf(k)>0){i=[parseFloat(h),k]
}});
return i
}})
})();
(function(){var e={};
b.each(["Quad","Cubic","Quart","Quint","Expo"],function(g,f){e[f]=function(h){return Math.pow(h,g+2)
}
});
b.extend(e,{Sine:function(f){return 1-Math.cos(f*Math.PI/2)
},Circ:function(f){return 1-Math.sqrt(1-f*f)
},Elastic:function(f){return f===0||f===1?f:-Math.pow(2,8*(f-1))*Math.sin(((f-1)*80-7.5)*Math.PI/15)
},Back:function(f){return f*f*(3*f-2)
},Bounce:function(h){var f,g=4;
while(h<((f=Math.pow(2,--g))-1)/11){}return 1/Math.pow(4,3-g)-7.5625*Math.pow((f*3-2)/22-h,2)
}});
b.each(e,function(g,f){b.easing["easeIn"+g]=f;
b.easing["easeOut"+g]=function(h){return 1-f(1-h)
};
b.easing["easeInOut"+g]=function(h){return h<0.5?f(h*2)/2:1-f(h*-2+2)/2
}
})
})()
})(jQuery));
(function(b,d){var a=/up|down|vertical/,c=/up|left|vertical|horizontal/;
b.effects.effect.blind=function(g,m){var h=b(this),q=["position","top","bottom","left","right","height","width"],n=b.effects.setMode(h,g.mode||"hide"),r=g.direction||"up",j=a.test(r),i=j?"height":"width",p=j?"top":"left",t=c.test(r),l={},s=n==="show",f,e,k;
if(h.parent().is(".ui-effects-wrapper")){b.effects.save(h.parent(),q)
}else{b.effects.save(h,q)
}h.show();
f=b.effects.createWrapper(h).css({overflow:"hidden"});
e=f[i]();
k=parseFloat(f.css(p))||0;
l[i]=s?e:0;
if(!t){h.css(j?"bottom":"right",0).css(j?"top":"left","auto").css({position:"absolute"});
l[p]=s?k:e+k
}if(s){f.css(i,0);
if(!t){f.css(p,k+e)
}}f.animate(l,{duration:g.duration,easing:g.easing,queue:false,complete:function(){if(n==="hide"){h.hide()
}b.effects.restore(h,q);
b.effects.removeWrapper(h);
m()
}})
}
})(jQuery);
(function(a,b){a.effects.effect.bounce=function(m,l){var c=a(this),d=["position","top","bottom","left","right","height","width"],k=a.effects.setMode(c,m.mode||"effect"),j=k==="hide",v=k==="show",w=m.direction||"up",e=m.distance,h=m.times||5,x=h*2+(v||j?1:0),u=m.duration/x,p=m.easing,f=(w==="up"||w==="down")?"top":"left",n=(w==="up"||w==="left"),t,g,s,q=c.queue(),r=q.length;
if(v||j){d.push("opacity")
}a.effects.save(c,d);
c.show();
a.effects.createWrapper(c);
if(!e){e=c[f==="top"?"outerHeight":"outerWidth"]()/3
}if(v){s={opacity:1};
s[f]=0;
c.css("opacity",0).css(f,n?-e*2:e*2).animate(s,u,p)
}if(j){e=e/Math.pow(2,h-1)
}s={};
s[f]=0;
for(t=0;
t<h;
t++){g={};
g[f]=(n?"-=":"+=")+e;
c.animate(g,u,p).animate(s,u,p);
e=j?e*2:e/2
}if(j){g={opacity:0};
g[f]=(n?"-=":"+=")+e;
c.animate(g,u,p)
}c.queue(function(){if(j){c.hide()
}a.effects.restore(c,d);
a.effects.removeWrapper(c);
l()
});
if(r>1){q.splice.apply(q,[1,0].concat(q.splice(r,x+1)))
}c.dequeue()
}
})(jQuery);
(function(a,b){a.effects.effect.clip=function(f,i){var g=a(this),m=["position","top","bottom","left","right","height","width"],l=a.effects.setMode(g,f.mode||"hide"),p=l==="show",n=f.direction||"vertical",k=n==="vertical",q=k?"height":"width",j=k?"top":"left",h={},d,e,c;
a.effects.save(g,m);
g.show();
d=a.effects.createWrapper(g).css({overflow:"hidden"});
e=(g[0].tagName==="IMG")?d:g;
c=e[q]();
if(p){e.css(q,0);
e.css(j,c/2)
}h[q]=p?c:0;
h[j]=p?0:c/2;
e.animate(h,{queue:false,duration:f.duration,easing:f.easing,complete:function(){if(!p){g.hide()
}a.effects.restore(g,m);
a.effects.removeWrapper(g);
i()
}})
}
})(jQuery);
(function(a,b){a.effects.effect.drop=function(d,h){var e=a(this),j=["position","top","bottom","left","right","opacity","height","width"],i=a.effects.setMode(e,d.mode||"hide"),l=i==="show",k=d.direction||"left",f=(k==="up"||k==="down")?"top":"left",m=(k==="up"||k==="left")?"pos":"neg",g={opacity:l?1:0},c;
a.effects.save(e,j);
e.show();
a.effects.createWrapper(e);
c=d.distance||e[f==="top"?"outerHeight":"outerWidth"](true)/2;
if(l){e.css("opacity",0).css(f,m==="pos"?-c:c)
}g[f]=(l?(m==="pos"?"+=":"-="):(m==="pos"?"-=":"+="))+c;
e.animate(g,{queue:false,duration:d.duration,easing:d.easing,complete:function(){if(i==="hide"){e.hide()
}a.effects.restore(e,j);
a.effects.removeWrapper(e);
h()
}})
}
})(jQuery);
(function(a,b){a.effects.effect.explode=function(s,r){var k=s.pieces?Math.round(Math.sqrt(s.pieces)):3,d=k,c=a(this),m=a.effects.setMode(c,s.mode||"hide"),w=m==="show",g=c.show().css("visibility","hidden").offset(),t=Math.ceil(c.outerWidth()/d),q=Math.ceil(c.outerHeight()/k),h=[],v,u,e,p,n,l;
function x(){h.push(this);
if(h.length===k*d){f()
}}for(v=0;
v<k;
v++){p=g.top+v*q;
l=v-(k-1)/2;
for(u=0;
u<d;
u++){e=g.left+u*t;
n=u-(d-1)/2;
c.clone().appendTo("body").wrap("<div></div>").css({position:"absolute",visibility:"visible",left:-u*t,top:-v*q}).parent().addClass("ui-effects-explode").css({position:"absolute",overflow:"hidden",width:t,height:q,left:e+(w?n*t:0),top:p+(w?l*q:0),opacity:w?0:1}).animate({left:e+(w?0:n*t),top:p+(w?0:l*q),opacity:w?1:0},s.duration||500,s.easing,x)
}}function f(){c.css({visibility:"visible"});
a(h).remove();
if(!w){c.hide()
}r()
}}
})(jQuery);
(function(a,b){a.effects.effect.fade=function(f,c){var d=a(this),e=a.effects.setMode(d,f.mode||"toggle");
d.animate({opacity:e},{queue:false,duration:f.duration,easing:f.easing,complete:c})
}
})(jQuery);
(function(a,b){a.effects.effect.fold=function(e,i){var f=a(this),n=["position","top","bottom","left","right","height","width"],k=a.effects.setMode(f,e.mode||"hide"),r=k==="show",l=k==="hide",t=e.size||15,m=/([0-9]+)%/.exec(t),s=!!e.horizFirst,j=r!==s,g=j?["width","height"]:["height","width"],h=e.duration/2,d,c,q={},p={};
a.effects.save(f,n);
f.show();
d=a.effects.createWrapper(f).css({overflow:"hidden"});
c=j?[d.width(),d.height()]:[d.height(),d.width()];
if(m){t=parseInt(m[1],10)/100*c[l?0:1]
}if(r){d.css(s?{height:0,width:t}:{height:t,width:0})
}q[g[0]]=r?c[0]:t;
p[g[1]]=r?c[1]:0;
d.animate(q,h,e.easing).animate(p,h,e.easing,function(){if(l){f.hide()
}a.effects.restore(f,n);
a.effects.removeWrapper(f);
i()
})
}
})(jQuery);
(function(a,b){a.effects.effect.highlight=function(h,c){var e=a(this),d=["backgroundImage","backgroundColor","opacity"],g=a.effects.setMode(e,h.mode||"show"),f={backgroundColor:e.css("backgroundColor")};
if(g==="hide"){f.opacity=0
}a.effects.save(e,d);
e.show().css({backgroundImage:"none",backgroundColor:h.color||"#ffff99"}).animate(f,{queue:false,duration:h.duration,easing:h.easing,complete:function(){if(g==="hide"){e.hide()
}a.effects.restore(e,d);
c()
}})
}
})(jQuery);
(function(a,b){a.effects.effect.pulsate=function(c,g){var e=a(this),k=a.effects.setMode(e,c.mode||"show"),p=k==="show",l=k==="hide",q=(p||k==="hide"),m=((c.times||5)*2)+(q?1:0),f=c.duration/m,n=0,j=e.queue(),d=j.length,h;
if(p||!e.is(":visible")){e.css("opacity",0).show();
n=1
}for(h=1;
h<m;
h++){e.animate({opacity:n},f,c.easing);
n=1-n
}e.animate({opacity:n},f,c.easing);
e.queue(function(){if(l){e.hide()
}g()
});
if(d>1){j.splice.apply(j,[1,0].concat(j.splice(d,m+1)))
}e.dequeue()
}
})(jQuery);
(function(a,b){a.effects.effect.puff=function(j,c){var h=a(this),i=a.effects.setMode(h,j.mode||"hide"),f=i==="hide",g=parseInt(j.percent,10)||150,e=g/100,d={height:h.height(),width:h.width(),outerHeight:h.outerHeight(),outerWidth:h.outerWidth()};
a.extend(j,{effect:"scale",queue:false,fade:true,mode:i,complete:c,percent:f?g:100,from:f?d:{height:d.height*e,width:d.width*e,outerHeight:d.outerHeight*e,outerWidth:d.outerWidth*e}});
h.effect(j)
};
a.effects.effect.scale=function(c,f){var d=a(this),l=a.extend(true,{},c),g=a.effects.setMode(d,c.mode||"effect"),h=parseInt(c.percent,10)||(parseInt(c.percent,10)===0?0:(g==="hide"?0:100)),j=c.direction||"both",k=c.origin,e={height:d.height(),width:d.width(),outerHeight:d.outerHeight(),outerWidth:d.outerWidth()},i={y:j!=="horizontal"?(h/100):1,x:j!=="vertical"?(h/100):1};
l.effect="size";
l.queue=false;
l.complete=f;
if(g!=="effect"){l.origin=k||["middle","center"];
l.restore=true
}l.from=c.from||(g==="show"?{height:0,width:0,outerHeight:0,outerWidth:0}:e);
l.to={height:e.height*i.y,width:e.width*i.x,outerHeight:e.outerHeight*i.y,outerWidth:e.outerWidth*i.x};
if(l.fade){if(g==="show"){l.from.opacity=0;
l.to.opacity=1
}if(g==="hide"){l.from.opacity=1;
l.to.opacity=0
}}d.effect(l)
};
a.effects.effect.size=function(l,k){var q,i,j,c=a(this),p=["position","top","bottom","left","right","width","height","overflow","opacity"],n=["position","top","bottom","left","right","overflow","opacity"],m=["width","height","overflow"],g=["fontSize"],s=["borderTopWidth","borderBottomWidth","paddingTop","paddingBottom"],d=["borderLeftWidth","borderRightWidth","paddingLeft","paddingRight"],h=a.effects.setMode(c,l.mode||"effect"),r=l.restore||h!=="effect",v=l.scale||"both",t=l.origin||["middle","center"],u=c.css("position"),e=r?p:n,f={height:0,width:0,outerHeight:0,outerWidth:0};
if(h==="show"){c.show()
}q={height:c.height(),width:c.width(),outerHeight:c.outerHeight(),outerWidth:c.outerWidth()};
if(l.mode==="toggle"&&h==="show"){c.from=l.to||f;
c.to=l.from||q
}else{c.from=l.from||(h==="show"?f:q);
c.to=l.to||(h==="hide"?f:q)
}j={from:{y:c.from.height/q.height,x:c.from.width/q.width},to:{y:c.to.height/q.height,x:c.to.width/q.width}};
if(v==="box"||v==="both"){if(j.from.y!==j.to.y){e=e.concat(s);
c.from=a.effects.setTransition(c,s,j.from.y,c.from);
c.to=a.effects.setTransition(c,s,j.to.y,c.to)
}if(j.from.x!==j.to.x){e=e.concat(d);
c.from=a.effects.setTransition(c,d,j.from.x,c.from);
c.to=a.effects.setTransition(c,d,j.to.x,c.to)
}}if(v==="content"||v==="both"){if(j.from.y!==j.to.y){e=e.concat(g).concat(m);
c.from=a.effects.setTransition(c,g,j.from.y,c.from);
c.to=a.effects.setTransition(c,g,j.to.y,c.to)
}}a.effects.save(c,e);
c.show();
a.effects.createWrapper(c);
c.css("overflow","hidden").css(c.from);
if(t){i=a.effects.getBaseline(t,q);
c.from.top=(q.outerHeight-c.outerHeight())*i.y;
c.from.left=(q.outerWidth-c.outerWidth())*i.x;
c.to.top=(q.outerHeight-c.to.outerHeight)*i.y;
c.to.left=(q.outerWidth-c.to.outerWidth)*i.x
}c.css(c.from);
if(v==="content"||v==="both"){s=s.concat(["marginTop","marginBottom"]).concat(g);
d=d.concat(["marginLeft","marginRight"]);
m=p.concat(s).concat(d);
c.find("*[width]").each(function(){var w=a(this),o={height:w.height(),width:w.width(),outerHeight:w.outerHeight(),outerWidth:w.outerWidth()};
if(r){a.effects.save(w,m)
}w.from={height:o.height*j.from.y,width:o.width*j.from.x,outerHeight:o.outerHeight*j.from.y,outerWidth:o.outerWidth*j.from.x};
w.to={height:o.height*j.to.y,width:o.width*j.to.x,outerHeight:o.height*j.to.y,outerWidth:o.width*j.to.x};
if(j.from.y!==j.to.y){w.from=a.effects.setTransition(w,s,j.from.y,w.from);
w.to=a.effects.setTransition(w,s,j.to.y,w.to)
}if(j.from.x!==j.to.x){w.from=a.effects.setTransition(w,d,j.from.x,w.from);
w.to=a.effects.setTransition(w,d,j.to.x,w.to)
}w.css(w.from);
w.animate(w.to,l.duration,l.easing,function(){if(r){a.effects.restore(w,m)
}})
})
}c.animate(c.to,{queue:false,duration:l.duration,easing:l.easing,complete:function(){if(c.to.opacity===0){c.css("opacity",c.from.opacity)
}if(h==="hide"){c.hide()
}a.effects.restore(c,e);
if(!r){if(u==="static"){c.css({position:"relative",top:c.to.top,left:c.to.left})
}else{a.each(["top","left"],function(o,w){c.css(w,function(y,A){var z=parseInt(A,10),x=o?c.to.left:c.to.top;
if(A==="auto"){return x+"px"
}return z+x+"px"
})
})
}}a.effects.removeWrapper(c);
k()
}})
}
})(jQuery);
(function(a,b){a.effects.effect.shake=function(l,k){var c=a(this),d=["position","top","bottom","left","right","height","width"],j=a.effects.setMode(c,l.mode||"effect"),u=l.direction||"left",e=l.distance||20,h=l.times||3,v=h*2+1,q=Math.round(l.duration/v),g=(u==="up"||u==="down")?"top":"left",f=(u==="up"||u==="left"),t={},s={},r={},p,m=c.queue(),n=m.length;
a.effects.save(c,d);
c.show();
a.effects.createWrapper(c);
t[g]=(f?"-=":"+=")+e;
s[g]=(f?"+=":"-=")+e*2;
r[g]=(f?"-=":"+=")+e*2;
c.animate(t,q,l.easing);
for(p=1;
p<h;
p++){c.animate(s,q,l.easing).animate(r,q,l.easing)
}c.animate(s,q,l.easing).animate(t,q/2,l.easing).queue(function(){if(j==="hide"){c.hide()
}a.effects.restore(c,d);
a.effects.removeWrapper(c);
k()
});
if(n>1){m.splice.apply(m,[1,0].concat(m.splice(n,v+1)))
}c.dequeue()
}
})(jQuery);
(function(a,b){a.effects.effect.slide=function(e,i){var f=a(this),k=["position","top","bottom","left","right","width","height"],j=a.effects.setMode(f,e.mode||"show"),m=j==="show",l=e.direction||"left",g=(l==="up"||l==="down")?"top":"left",d=(l==="up"||l==="left"),c,h={};
a.effects.save(f,k);
f.show();
c=e.distance||f[g==="top"?"outerHeight":"outerWidth"](true);
a.effects.createWrapper(f).css({overflow:"hidden"});
if(m){f.css(g,d?(isNaN(c)?"-"+c:-c):c)
}h[g]=(m?(d?"+=":"-="):(d?"-=":"+="))+c;
f.animate(h,{queue:false,duration:e.duration,easing:e.easing,complete:function(){if(j==="hide"){f.hide()
}a.effects.restore(f,k);
a.effects.removeWrapper(f);
i()
}})
}
})(jQuery);
(function(a,b){a.effects.effect.transfer=function(d,h){var f=a(this),k=a(d.to),n=k.css("position")==="fixed",j=a("body"),l=n?j.scrollTop():0,m=n?j.scrollLeft():0,c=k.offset(),g={top:c.top-l,left:c.left-m,height:k.innerHeight(),width:k.innerWidth()},i=f.offset(),e=a('<div class="ui-effects-transfer"></div>').appendTo(document.body).addClass(d.className).css({top:i.top-l,left:i.left-m,height:f.innerHeight(),width:f.innerWidth(),position:n?"fixed":"absolute"}).animate(g,d.duration,d.easing,function(){e.remove();
h()
})
}
})(jQuery);
(function(b,c){var a=false;
b.widget("ui.menu",{version:"1.9.2",defaultElement:"<ul>",delay:300,options:{icons:{submenu:"ui-icon-carat-1-e"},menus:"ul",position:{my:"left top",at:"right top"},role:"menu",blur:null,focus:null,select:null},_create:function(){this.activeMenu=this.element;
this.element.uniqueId().addClass("ui-menu ui-widget ui-widget-content ui-corner-all").toggleClass("ui-menu-icons",!!this.element.find(".ui-icon").length).attr({role:this.options.role,tabIndex:0}).bind("click"+this.eventNamespace,b.proxy(function(d){if(this.options.disabled){d.preventDefault()
}},this));
if(this.options.disabled){this.element.addClass("ui-state-disabled").attr("aria-disabled","true")
}this._on({"mousedown .ui-menu-item > a":function(d){d.preventDefault()
},"click .ui-state-disabled > a":function(d){d.preventDefault()
},"click .ui-menu-item:has(a)":function(d){var e=b(d.target).closest(".ui-menu-item");
if(!a&&e.not(".ui-state-disabled").length){a=true;
this.select(d);
if(e.has(".ui-menu").length){this.expand(d)
}else{if(!this.element.is(":focus")){this.element.trigger("focus",[true]);
if(this.active&&this.active.parents(".ui-menu").length===1){clearTimeout(this.timer)
}}}}},"mouseenter .ui-menu-item":function(d){var e=b(d.currentTarget);
e.siblings().children(".ui-state-active").removeClass("ui-state-active");
this.focus(d,e)
},mouseleave:"collapseAll","mouseleave .ui-menu":"collapseAll",focus:function(f,d){var e=this.active||this.element.children(".ui-menu-item").eq(0);
if(!d){this.focus(f,e)
}},blur:function(d){this._delay(function(){if(!b.contains(this.element[0],this.document[0].activeElement)){this.collapseAll(d)
}})
},keydown:"_keydown"});
this.refresh();
this._on(this.document,{click:function(d){if(!b(d.target).closest(".ui-menu").length){this.collapseAll(d)
}a=false
}})
},_destroy:function(){this.element.removeAttr("aria-activedescendant").find(".ui-menu").andSelf().removeClass("ui-menu ui-widget ui-widget-content ui-corner-all ui-menu-icons").removeAttr("role").removeAttr("tabIndex").removeAttr("aria-labelledby").removeAttr("aria-expanded").removeAttr("aria-hidden").removeAttr("aria-disabled").removeUniqueId().show();
this.element.find(".ui-menu-item").removeClass("ui-menu-item").removeAttr("role").removeAttr("aria-disabled").children("a").removeUniqueId().removeClass("ui-corner-all ui-state-hover").removeAttr("tabIndex").removeAttr("role").removeAttr("aria-haspopup").children().each(function(){var d=b(this);
if(d.data("ui-menu-submenu-carat")){d.remove()
}});
this.element.find(".ui-menu-divider").removeClass("ui-menu-divider ui-widget-content")
},_keydown:function(j){var e,i,k,h,g,d=true;
function f(l){return l.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&")
}switch(j.keyCode){case b.ui.keyCode.PAGE_UP:this.previousPage(j);
break;
case b.ui.keyCode.PAGE_DOWN:this.nextPage(j);
break;
case b.ui.keyCode.HOME:this._move("first","first",j);
break;
case b.ui.keyCode.END:this._move("last","last",j);
break;
case b.ui.keyCode.UP:this.previous(j);
break;
case b.ui.keyCode.DOWN:this.next(j);
break;
case b.ui.keyCode.LEFT:this.collapse(j);
break;
case b.ui.keyCode.RIGHT:if(this.active&&!this.active.is(".ui-state-disabled")){this.expand(j)
}break;
case b.ui.keyCode.ENTER:case b.ui.keyCode.SPACE:this._activate(j);
break;
case b.ui.keyCode.ESCAPE:this.collapse(j);
break;
default:d=false;
i=this.previousFilter||"";
k=String.fromCharCode(j.keyCode);
h=false;
clearTimeout(this.filterTimer);
if(k===i){h=true
}else{k=i+k
}g=new RegExp("^"+f(k),"i");
e=this.activeMenu.children(".ui-menu-item").filter(function(){return g.test(b(this).children("a").text())
});
e=h&&e.index(this.active.next())!==-1?this.active.nextAll(".ui-menu-item"):e;
if(!e.length){k=String.fromCharCode(j.keyCode);
g=new RegExp("^"+f(k),"i");
e=this.activeMenu.children(".ui-menu-item").filter(function(){return g.test(b(this).children("a").text())
})
}if(e.length){this.focus(j,e);
if(e.length>1){this.previousFilter=k;
this.filterTimer=this._delay(function(){delete this.previousFilter
},1000)
}else{delete this.previousFilter
}}else{delete this.previousFilter
}}if(d){j.preventDefault()
}},_activate:function(d){if(!this.active.is(".ui-state-disabled")){if(this.active.children("a[aria-haspopup='true']").length){this.expand(d)
}else{this.select(d)
}}},refresh:function(){var f,e=this.options.icons.submenu,d=this.element.find(this.options.menus);
d.filter(":not(.ui-menu)").addClass("ui-menu ui-widget ui-widget-content ui-corner-all").hide().attr({role:this.options.role,"aria-hidden":"true","aria-expanded":"false"}).each(function(){var i=b(this),h=i.prev("a"),g=b("<span>").addClass("ui-menu-icon ui-icon "+e).data("ui-menu-submenu-carat",true);
h.attr("aria-haspopup","true").prepend(g);
i.attr("aria-labelledby",h.attr("id"))
});
f=d.add(this.element);
f.children(":not(.ui-menu-item):has(a)").addClass("ui-menu-item").attr("role","presentation").children("a").uniqueId().addClass("ui-corner-all").attr({tabIndex:-1,role:this._itemRole()});
f.children(":not(.ui-menu-item)").each(function(){var g=b(this);
if(!/[^\-—–\s]/.test(g.text())){g.addClass("ui-widget-content ui-menu-divider")
}});
f.children(".ui-state-disabled").attr("aria-disabled","true");
if(this.active&&!b.contains(this.element[0],this.active[0])){this.blur()
}},_itemRole:function(){return{menu:"menuitem",listbox:"option"}[this.options.role]
},focus:function(e,d){var g,f;
this.blur(e,e&&e.type==="focus");
this._scrollIntoView(d);
this.active=d.first();
f=this.active.children("a").addClass("ui-state-focus");
if(this.options.role){this.element.attr("aria-activedescendant",f.attr("id"))
}this.active.parent().closest(".ui-menu-item").children("a:first").addClass("ui-state-active");
if(e&&e.type==="keydown"){this._close()
}else{this.timer=this._delay(function(){this._close()
},this.delay)
}g=d.children(".ui-menu");
if(g.length&&(/^mouse/.test(e.type))){this._startOpening(g)
}this.activeMenu=d.parent();
this._trigger("focus",e,{item:d})
},_scrollIntoView:function(g){var j,f,h,d,e,i;
if(this._hasScroll()){j=parseFloat(b.css(this.activeMenu[0],"borderTopWidth"))||0;
f=parseFloat(b.css(this.activeMenu[0],"paddingTop"))||0;
h=g.offset().top-this.activeMenu.offset().top-j-f;
d=this.activeMenu.scrollTop();
e=this.activeMenu.height();
i=g.height();
if(h<0){this.activeMenu.scrollTop(d+h)
}else{if(h+i>e){this.activeMenu.scrollTop(d+h-e+i)
}}}},blur:function(e,d){if(!d){clearTimeout(this.timer)
}if(!this.active){return
}this.active.children("a").removeClass("ui-state-focus");
this.active=null;
this._trigger("blur",e,{item:this.active})
},_startOpening:function(d){clearTimeout(this.timer);
if(d.attr("aria-hidden")!=="true"){return
}this.timer=this._delay(function(){this._close();
this._open(d)
},this.delay)
},_open:function(e){var d=b.extend({of:this.active},this.options.position);
clearTimeout(this.timer);
this.element.find(".ui-menu").not(e.parents(".ui-menu")).hide().attr("aria-hidden","true");
e.show().removeAttr("aria-hidden").attr("aria-expanded","true").position(d)
},collapseAll:function(e,d){clearTimeout(this.timer);
this.timer=this._delay(function(){var f=d?this.element:b(e&&e.target).closest(this.element.find(".ui-menu"));
if(!f.length){f=this.element
}this._close(f);
this.blur(e);
this.activeMenu=f
},this.delay)
},_close:function(d){if(!d){d=this.active?this.active.parent():this.element
}d.find(".ui-menu").hide().attr("aria-hidden","true").attr("aria-expanded","false").end().find("a.ui-state-active").removeClass("ui-state-active")
},collapse:function(e){var d=this.active&&this.active.parent().closest(".ui-menu-item",this.element);
if(d&&d.length){this._close();
this.focus(e,d)
}},expand:function(e){var d=this.active&&this.active.children(".ui-menu ").children(".ui-menu-item").first();
if(d&&d.length){this._open(d.parent());
this._delay(function(){this.focus(e,d)
})
}},next:function(d){this._move("next","first",d)
},previous:function(d){this._move("prev","last",d)
},isFirstItem:function(){return this.active&&!this.active.prevAll(".ui-menu-item").length
},isLastItem:function(){return this.active&&!this.active.nextAll(".ui-menu-item").length
},_move:function(g,e,f){var d;
if(this.active){if(g==="first"||g==="last"){d=this.active[g==="first"?"prevAll":"nextAll"](".ui-menu-item").eq(-1)
}else{d=this.active[g+"All"](".ui-menu-item").eq(0)
}}if(!d||!d.length||!this.active){d=this.activeMenu.children(".ui-menu-item")[e]()
}this.focus(f,d)
},nextPage:function(f){var e,g,d;
if(!this.active){this.next(f);
return
}if(this.isLastItem()){return
}if(this._hasScroll()){g=this.active.offset().top;
d=this.element.height();
this.active.nextAll(".ui-menu-item").each(function(){e=b(this);
return e.offset().top-g-d<0
});
this.focus(f,e)
}else{this.focus(f,this.activeMenu.children(".ui-menu-item")[!this.active?"first":"last"]())
}},previousPage:function(f){var e,g,d;
if(!this.active){this.next(f);
return
}if(this.isFirstItem()){return
}if(this._hasScroll()){g=this.active.offset().top;
d=this.element.height();
this.active.prevAll(".ui-menu-item").each(function(){e=b(this);
return e.offset().top-g+d>0
});
this.focus(f,e)
}else{this.focus(f,this.activeMenu.children(".ui-menu-item").first())
}},_hasScroll:function(){return this.element.outerHeight()<this.element.prop("scrollHeight")
},select:function(d){this.active=this.active||b(d.target).closest(".ui-menu-item");
var e={item:this.active};
if(!this.active.has(".ui-menu").length){this.collapseAll(d,true)
}this._trigger("select",d,e)
}})
}(jQuery));
(function(a,b){a.widget("ui.progressbar",{version:"1.9.2",options:{value:0,max:100},min:0,_create:function(){this.element.addClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").attr({role:"progressbar","aria-valuemin":this.min,"aria-valuemax":this.options.max,"aria-valuenow":this._value()});
this.valueDiv=a("<div class='ui-progressbar-value ui-widget-header ui-corner-left'></div>").appendTo(this.element);
this.oldValue=this._value();
this._refreshValue()
},_destroy:function(){this.element.removeClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow");
this.valueDiv.remove()
},value:function(c){if(c===b){return this._value()
}this._setOption("value",c);
return this
},_setOption:function(c,d){if(c==="value"){this.options.value=d;
this._refreshValue();
if(this._value()===this.options.max){this._trigger("complete")
}}this._super(c,d)
},_value:function(){var c=this.options.value;
if(typeof c!=="number"){c=0
}return Math.min(this.options.max,Math.max(this.min,c))
},_percentage:function(){return 100*this._value()/this.options.max
},_refreshValue:function(){var d=this.value(),c=this._percentage();
if(this.oldValue!==d){this.oldValue=d;
this._trigger("change")
}this.valueDiv.toggle(d>this.min).toggleClass("ui-corner-right",d===this.options.max).width(c.toFixed(0)+"%");
this.element.attr("aria-valuenow",d)
}})
})(jQuery);
(function(c,d){c.widget("ui.resizable",c.ui.mouse,{version:"1.9.2",widgetEventPrefix:"resize",options:{alsoResize:false,animate:false,animateDuration:"slow",animateEasing:"swing",aspectRatio:false,autoHide:false,containment:false,ghost:false,grid:false,handles:"e,s,se",helper:false,maxHeight:null,maxWidth:null,minHeight:10,minWidth:10,zIndex:1000},_create:function(){var h=this,k=this.options;
this.element.addClass("ui-resizable");
c.extend(this,{_aspectRatio:!!(k.aspectRatio),aspectRatio:k.aspectRatio,originalElement:this.element,_proportionallyResizeElements:[],_helper:k.helper||k.ghost||k.animate?k.helper||"ui-resizable-helper":null});
if(this.element[0].nodeName.match(/canvas|textarea|input|select|button|img/i)){this.element.wrap(c('<div class="ui-wrapper" style="overflow: hidden;"></div>').css({position:this.element.css("position"),width:this.element.outerWidth(),height:this.element.outerHeight(),top:this.element.css("top"),left:this.element.css("left")}));
this.element=this.element.parent().data("resizable",this.element.data("resizable"));
this.elementIsWrapper=true;
this.element.css({marginLeft:this.originalElement.css("marginLeft"),marginTop:this.originalElement.css("marginTop"),marginRight:this.originalElement.css("marginRight"),marginBottom:this.originalElement.css("marginBottom")});
this.originalElement.css({marginLeft:0,marginTop:0,marginRight:0,marginBottom:0});
this.originalResizeStyle=this.originalElement.css("resize");
this.originalElement.css("resize","none");
this._proportionallyResizeElements.push(this.originalElement.css({position:"static",zoom:1,display:"block"}));
this.originalElement.css({margin:this.originalElement.css("margin")});
this._proportionallyResize()
}this.handles=k.handles||(!c(".ui-resizable-handle",this.element).length?"e,s,se":{n:".ui-resizable-n",e:".ui-resizable-e",s:".ui-resizable-s",w:".ui-resizable-w",se:".ui-resizable-se",sw:".ui-resizable-sw",ne:".ui-resizable-ne",nw:".ui-resizable-nw"});
if(this.handles.constructor==String){if(this.handles=="all"){this.handles="n,e,s,w,se,sw,ne,nw"
}var l=this.handles.split(",");
this.handles={};
for(var f=0;
f<l.length;
f++){var j=c.trim(l[f]),e="ui-resizable-"+j;
var g=c('<div class="ui-resizable-handle '+e+'"></div>');
g.css({zIndex:k.zIndex});
if("se"==j){g.addClass("ui-icon ui-icon-gripsmall-diagonal-se")
}this.handles[j]=".ui-resizable-"+j;
this.element.append(g)
}}this._renderAxis=function(q){q=q||this.element;
for(var n in this.handles){if(this.handles[n].constructor==String){this.handles[n]=c(this.handles[n],this.element).show()
}if(this.elementIsWrapper&&this.originalElement[0].nodeName.match(/textarea|input|select|button/i)){var o=c(this.handles[n],this.element),p=0;
p=/sw|ne|nw|se|n|s/.test(n)?o.outerHeight():o.outerWidth();
var m=["padding",/ne|nw|n/.test(n)?"Top":/se|sw|s/.test(n)?"Bottom":/^e$/.test(n)?"Right":"Left"].join("");
q.css(m,p);
this._proportionallyResize()
}if(!c(this.handles[n]).length){continue
}}};
this._renderAxis(this.element);
this._handles=c(".ui-resizable-handle",this.element).disableSelection();
this._handles.mouseover(function(){if(!h.resizing){if(this.className){var i=this.className.match(/ui-resizable-(se|sw|ne|nw|n|e|s|w)/i)
}h.axis=i&&i[1]?i[1]:"se"
}});
if(k.autoHide){this._handles.hide();
c(this.element).addClass("ui-resizable-autohide").mouseenter(function(){if(k.disabled){return
}c(this).removeClass("ui-resizable-autohide");
h._handles.show()
}).mouseleave(function(){if(k.disabled){return
}if(!h.resizing){c(this).addClass("ui-resizable-autohide");
h._handles.hide()
}})
}this._mouseInit()
},_destroy:function(){this._mouseDestroy();
var e=function(g){c(g).removeClass("ui-resizable ui-resizable-disabled ui-resizable-resizing").removeData("resizable").removeData("ui-resizable").unbind(".resizable").find(".ui-resizable-handle").remove()
};
if(this.elementIsWrapper){e(this.element);
var f=this.element;
this.originalElement.css({position:f.css("position"),width:f.outerWidth(),height:f.outerHeight(),top:f.css("top"),left:f.css("left")}).insertAfter(f);
f.remove()
}this.originalElement.css("resize",this.originalResizeStyle);
e(this.originalElement);
return this
},_mouseCapture:function(f){var g=false;
for(var e in this.handles){if(c(this.handles[e])[0]==f.target){g=true
}}return !this.options.disabled&&g
},_mouseStart:function(g){var j=this.options,f=this.element.position(),e=this.element;
this.resizing=true;
this.documentScroll={top:c(document).scrollTop(),left:c(document).scrollLeft()};
if(e.is(".ui-draggable")||(/absolute/).test(e.css("position"))){e.css({position:"absolute",top:f.top,left:f.left})
}this._renderProxy();
var k=b(this.helper.css("left")),h=b(this.helper.css("top"));
if(j.containment){k+=c(j.containment).scrollLeft()||0;
h+=c(j.containment).scrollTop()||0
}this.offset=this.helper.offset();
this.position={left:k,top:h};
this.size=this._helper?{width:e.outerWidth(),height:e.outerHeight()}:{width:e.width(),height:e.height()};
this.originalSize=this._helper?{width:e.outerWidth(),height:e.outerHeight()}:{width:e.width(),height:e.height()};
this.originalPosition={left:k,top:h};
this.sizeDiff={width:e.outerWidth()-e.width(),height:e.outerHeight()-e.height()};
this.originalMousePosition={left:g.pageX,top:g.pageY};
this.aspectRatio=(typeof j.aspectRatio=="number")?j.aspectRatio:((this.originalSize.width/this.originalSize.height)||1);
var i=c(".ui-resizable-"+this.axis).css("cursor");
c("body").css("cursor",i=="auto"?this.axis+"-resize":i);
e.addClass("ui-resizable-resizing");
this._propagate("start",g);
return true
},_mouseDrag:function(e){var g=this.helper,f=this.options,l={},k=this,i=this.originalMousePosition,m=this.axis;
var p=(e.pageX-i.left)||0,n=(e.pageY-i.top)||0;
var h=this._change[m];
if(!h){return false
}var j=h.apply(this,[e,p,n]);
this._updateVirtualBoundaries(e.shiftKey);
if(this._aspectRatio||e.shiftKey){j=this._updateRatio(j,e)
}j=this._respectSize(j,e);
this._propagate("resize",e);
g.css({top:this.position.top+"px",left:this.position.left+"px",width:this.size.width+"px",height:this.size.height+"px"});
if(!this._helper&&this._proportionallyResizeElements.length){this._proportionallyResize()
}this._updateCache(j);
this._trigger("resize",e,this.ui());
return false
},_mouseStop:function(h){this.resizing=false;
var i=this.options,l=this;
if(this._helper){var g=this._proportionallyResizeElements,e=g.length&&(/textarea/i).test(g[0].nodeName),f=e&&c.ui.hasScroll(g[0],"left")?0:l.sizeDiff.height,k=e?0:l.sizeDiff.width;
var n={width:(l.helper.width()-k),height:(l.helper.height()-f)},j=(parseInt(l.element.css("left"),10)+(l.position.left-l.originalPosition.left))||null,m=(parseInt(l.element.css("top"),10)+(l.position.top-l.originalPosition.top))||null;
if(!i.animate){this.element.css(c.extend(n,{top:m,left:j}))
}l.helper.height(l.size.height);
l.helper.width(l.size.width);
if(this._helper&&!i.animate){this._proportionallyResize()
}}c("body").css("cursor","auto");
this.element.removeClass("ui-resizable-resizing");
this._propagate("stop",h);
if(this._helper){this.helper.remove()
}return false
},_updateVirtualBoundaries:function(g){var j=this.options,i,h,f,k,e;
e={minWidth:a(j.minWidth)?j.minWidth:0,maxWidth:a(j.maxWidth)?j.maxWidth:Infinity,minHeight:a(j.minHeight)?j.minHeight:0,maxHeight:a(j.maxHeight)?j.maxHeight:Infinity};
if(this._aspectRatio||g){i=e.minHeight*this.aspectRatio;
f=e.minWidth/this.aspectRatio;
h=e.maxHeight*this.aspectRatio;
k=e.maxWidth/this.aspectRatio;
if(i>e.minWidth){e.minWidth=i
}if(f>e.minHeight){e.minHeight=f
}if(h<e.maxWidth){e.maxWidth=h
}if(k<e.maxHeight){e.maxHeight=k
}}this._vBoundaries=e
},_updateCache:function(e){var f=this.options;
this.offset=this.helper.offset();
if(a(e.left)){this.position.left=e.left
}if(a(e.top)){this.position.top=e.top
}if(a(e.height)){this.size.height=e.height
}if(a(e.width)){this.size.width=e.width
}},_updateRatio:function(h,g){var i=this.options,j=this.position,f=this.size,e=this.axis;
if(a(h.height)){h.width=(h.height*this.aspectRatio)
}else{if(a(h.width)){h.height=(h.width/this.aspectRatio)
}}if(e=="sw"){h.left=j.left+(f.width-h.width);
h.top=null
}if(e=="nw"){h.top=j.top+(f.height-h.height);
h.left=j.left+(f.width-h.width)
}return h
},_respectSize:function(l,g){var j=this.helper,i=this._vBoundaries,r=this._aspectRatio||g.shiftKey,q=this.axis,t=a(l.width)&&i.maxWidth&&(i.maxWidth<l.width),m=a(l.height)&&i.maxHeight&&(i.maxHeight<l.height),h=a(l.width)&&i.minWidth&&(i.minWidth>l.width),s=a(l.height)&&i.minHeight&&(i.minHeight>l.height);
if(h){l.width=i.minWidth
}if(s){l.height=i.minHeight
}if(t){l.width=i.maxWidth
}if(m){l.height=i.maxHeight
}var f=this.originalPosition.left+this.originalSize.width,p=this.position.top+this.size.height;
var k=/sw|nw|w/.test(q),e=/nw|ne|n/.test(q);
if(h&&k){l.left=f-i.minWidth
}if(t&&k){l.left=f-i.maxWidth
}if(s&&e){l.top=p-i.minHeight
}if(m&&e){l.top=p-i.maxHeight
}var n=!l.width&&!l.height;
if(n&&!l.left&&l.top){l.top=null
}else{if(n&&!l.top&&l.left){l.left=null
}}return l
},_proportionallyResize:function(){var k=this.options;
if(!this._proportionallyResizeElements.length){return
}var g=this.helper||this.element;
for(var f=0;
f<this._proportionallyResizeElements.length;
f++){var h=this._proportionallyResizeElements[f];
if(!this.borderDif){var e=[h.css("borderTopWidth"),h.css("borderRightWidth"),h.css("borderBottomWidth"),h.css("borderLeftWidth")],j=[h.css("paddingTop"),h.css("paddingRight"),h.css("paddingBottom"),h.css("paddingLeft")];
this.borderDif=c.map(e,function(l,n){var m=parseInt(l,10)||0,o=parseInt(j[n],10)||0;
return m+o
})
}h.css({height:(g.height()-this.borderDif[0]-this.borderDif[2])||0,width:(g.width()-this.borderDif[1]-this.borderDif[3])||0})
}},_renderProxy:function(){var e=this.element,h=this.options;
this.elementOffset=e.offset();
if(this._helper){this.helper=this.helper||c('<div style="overflow:hidden;"></div>');
var f=(c.ui.ie6?1:0),g=(c.ui.ie6?2:-1);
this.helper.addClass(this._helper).css({width:this.element.outerWidth()+g,height:this.element.outerHeight()+g,position:"absolute",left:this.elementOffset.left-f+"px",top:this.elementOffset.top-f+"px",zIndex:++h.zIndex});
this.helper.appendTo("body").disableSelection()
}else{this.helper=this.element
}},_change:{e:function(g,f,e){return{width:this.originalSize.width+f}
},w:function(h,f,e){var j=this.options,g=this.originalSize,i=this.originalPosition;
return{left:i.left+f,width:g.width-f}
},n:function(h,f,e){var j=this.options,g=this.originalSize,i=this.originalPosition;
return{top:i.top+e,height:g.height-e}
},s:function(g,f,e){return{height:this.originalSize.height+e}
},se:function(g,f,e){return c.extend(this._change.s.apply(this,arguments),this._change.e.apply(this,[g,f,e]))
},sw:function(g,f,e){return c.extend(this._change.s.apply(this,arguments),this._change.w.apply(this,[g,f,e]))
},ne:function(g,f,e){return c.extend(this._change.n.apply(this,arguments),this._change.e.apply(this,[g,f,e]))
},nw:function(g,f,e){return c.extend(this._change.n.apply(this,arguments),this._change.w.apply(this,[g,f,e]))
}},_propagate:function(f,e){c.ui.plugin.call(this,f,[e,this.ui()]);
(f!="resize"&&this._trigger(f,e,this.ui()))
},plugins:{},ui:function(){return{originalElement:this.originalElement,element:this.element,helper:this.helper,position:this.position,size:this.size,originalSize:this.originalSize,originalPosition:this.originalPosition}
}});
c.ui.plugin.add("resizable","alsoResize",{start:function(f,g){var e=c(this).data("resizable"),i=e.options;
var h=function(j){c(j).each(function(){var k=c(this);
k.data("resizable-alsoresize",{width:parseInt(k.width(),10),height:parseInt(k.height(),10),left:parseInt(k.css("left"),10),top:parseInt(k.css("top"),10)})
})
};
if(typeof(i.alsoResize)=="object"&&!i.alsoResize.parentNode){if(i.alsoResize.length){i.alsoResize=i.alsoResize[0];
h(i.alsoResize)
}else{c.each(i.alsoResize,function(j){h(j)
})
}}else{h(i.alsoResize)
}},resize:function(g,i){var f=c(this).data("resizable"),j=f.options,h=f.originalSize,l=f.originalPosition;
var k={height:(f.size.height-h.height)||0,width:(f.size.width-h.width)||0,top:(f.position.top-l.top)||0,left:(f.position.left-l.left)||0},e=function(m,n){c(m).each(function(){var q=c(this),r=c(this).data("resizable-alsoresize"),p={},o=n&&n.length?n:q.parents(i.originalElement[0]).length?["width","height"]:["width","height","top","left"];
c.each(o,function(s,u){var t=(r[u]||0)+(k[u]||0);
if(t&&t>=0){p[u]=t||null
}});
q.css(p)
})
};
if(typeof(j.alsoResize)=="object"&&!j.alsoResize.nodeType){c.each(j.alsoResize,function(m,n){e(m,n)
})
}else{e(j.alsoResize)
}},stop:function(e,f){c(this).removeData("resizable-alsoresize")
}});
c.ui.plugin.add("resizable","animate",{stop:function(i,p){var m=c(this).data("resizable"),j=m.options;
var h=m._proportionallyResizeElements,e=h.length&&(/textarea/i).test(h[0].nodeName),f=e&&c.ui.hasScroll(h[0],"left")?0:m.sizeDiff.height,l=e?0:m.sizeDiff.width;
var g={width:(m.size.width-l),height:(m.size.height-f)},k=(parseInt(m.element.css("left"),10)+(m.position.left-m.originalPosition.left))||null,n=(parseInt(m.element.css("top"),10)+(m.position.top-m.originalPosition.top))||null;
m.element.animate(c.extend(g,n&&k?{top:n,left:k}:{}),{duration:j.animateDuration,easing:j.animateEasing,step:function(){var o={width:parseInt(m.element.css("width"),10),height:parseInt(m.element.css("height"),10),top:parseInt(m.element.css("top"),10),left:parseInt(m.element.css("left"),10)};
if(h&&h.length){c(h[0]).css({width:o.width,height:o.height})
}m._updateCache(o);
m._propagate("resize",i)
}})
}});
c.ui.plugin.add("resizable","containment",{start:function(f,s){var q=c(this).data("resizable"),j=q.options,l=q.element;
var g=j.containment,k=(g instanceof c)?g.get(0):(/parent/.test(g))?l.parent().get(0):g;
if(!k){return
}q.containerElement=c(k);
if(/document/.test(g)||g==document){q.containerOffset={left:0,top:0};
q.containerPosition={left:0,top:0};
q.parentData={element:c(document),left:0,top:0,width:c(document).width(),height:c(document).height()||document.body.parentNode.scrollHeight}
}else{var n=c(k),i=[];
c(["Top","Right","Left","Bottom"]).each(function(p,o){i[p]=b(n.css("padding"+o))
});
q.containerOffset=n.offset();
q.containerPosition=n.position();
q.containerSize={height:(n.innerHeight()-i[3]),width:(n.innerWidth()-i[1])};
var r=q.containerOffset,e=q.containerSize.height,m=q.containerSize.width,h=(c.ui.hasScroll(k,"left")?k.scrollWidth:m),t=(c.ui.hasScroll(k)?k.scrollHeight:e);
q.parentData={element:k,left:r.left,top:r.top,width:h,height:t}
}},resize:function(g,r){var m=c(this).data("resizable"),i=m.options,f=m.containerSize,q=m.containerOffset,n=m.size,p=m.position,s=m._aspectRatio||g.shiftKey,e={top:0,left:0},h=m.containerElement;
if(h[0]!=document&&(/static/).test(h.css("position"))){e=q
}if(p.left<(m._helper?q.left:0)){m.size.width=m.size.width+(m._helper?(m.position.left-q.left):(m.position.left-e.left));
if(s){m.size.height=m.size.width/m.aspectRatio
}m.position.left=i.helper?q.left:0
}if(p.top<(m._helper?q.top:0)){m.size.height=m.size.height+(m._helper?(m.position.top-q.top):m.position.top);
if(s){m.size.width=m.size.height*m.aspectRatio
}m.position.top=m._helper?q.top:0
}m.offset.left=m.parentData.left+m.position.left;
m.offset.top=m.parentData.top+m.position.top;
var l=Math.abs((m._helper?m.offset.left-e.left:(m.offset.left-e.left))+m.sizeDiff.width),t=Math.abs((m._helper?m.offset.top-e.top:(m.offset.top-q.top))+m.sizeDiff.height);
var k=m.containerElement.get(0)==m.element.parent().get(0),j=/relative|absolute/.test(m.containerElement.css("position"));
if(k&&j){l-=m.parentData.left
}if(l+m.size.width>=m.parentData.width){m.size.width=m.parentData.width-l;
if(s){m.size.height=m.size.width/m.aspectRatio
}}if(t+m.size.height>=m.parentData.height){m.size.height=m.parentData.height-t;
if(s){m.size.width=m.size.height*m.aspectRatio
}}},stop:function(f,p){var l=c(this).data("resizable"),g=l.options,m=l.position,n=l.containerOffset,e=l.containerPosition,i=l.containerElement;
var j=c(l.helper),r=j.offset(),q=j.outerWidth()-l.sizeDiff.width,k=j.outerHeight()-l.sizeDiff.height;
if(l._helper&&!g.animate&&(/relative/).test(i.css("position"))){c(this).css({left:r.left-e.left-n.left,width:q,height:k})
}if(l._helper&&!g.animate&&(/static/).test(i.css("position"))){c(this).css({left:r.left-e.left-n.left,width:q,height:k})
}}});
c.ui.plugin.add("resizable","ghost",{start:function(g,h){var f=c(this).data("resizable"),i=f.options,e=f.size;
f.ghost=f.originalElement.clone();
f.ghost.css({opacity:0.25,display:"block",position:"relative",height:e.height,width:e.width,margin:0,left:0,top:0}).addClass("ui-resizable-ghost").addClass(typeof i.ghost=="string"?i.ghost:"");
f.ghost.appendTo(f.helper)
},resize:function(f,g){var e=c(this).data("resizable"),h=e.options;
if(e.ghost){e.ghost.css({position:"relative",height:e.size.height,width:e.size.width})
}},stop:function(f,g){var e=c(this).data("resizable"),h=e.options;
if(e.ghost&&e.helper){e.helper.get(0).removeChild(e.ghost.get(0))
}}});
c.ui.plugin.add("resizable","grid",{resize:function(e,n){var k=c(this).data("resizable"),h=k.options,l=k.size,i=k.originalSize,j=k.originalPosition,p=k.axis,m=h._aspectRatio||e.shiftKey;
h.grid=typeof h.grid=="number"?[h.grid,h.grid]:h.grid;
var g=Math.round((l.width-i.width)/(h.grid[0]||1))*(h.grid[0]||1),f=Math.round((l.height-i.height)/(h.grid[1]||1))*(h.grid[1]||1);
if(/^(se|s|e)$/.test(p)){k.size.width=i.width+g;
k.size.height=i.height+f
}else{if(/^(ne)$/.test(p)){k.size.width=i.width+g;
k.size.height=i.height+f;
k.position.top=j.top-f
}else{if(/^(sw)$/.test(p)){k.size.width=i.width+g;
k.size.height=i.height+f;
k.position.left=j.left-g
}else{k.size.width=i.width+g;
k.size.height=i.height+f;
k.position.top=j.top-f;
k.position.left=j.left-g
}}}}});
var b=function(e){return parseInt(e,10)||0
};
var a=function(e){return !isNaN(parseInt(e,10))
}
})(jQuery);
(function(a,b){a.widget("ui.selectable",a.ui.mouse,{version:"1.9.2",options:{appendTo:"body",autoRefresh:true,distance:0,filter:"*",tolerance:"touch"},_create:function(){var c=this;
this.element.addClass("ui-selectable");
this.dragged=false;
var d;
this.refresh=function(){d=a(c.options.filter,c.element[0]);
d.addClass("ui-selectee");
d.each(function(){var e=a(this);
var f=e.offset();
a.data(this,"selectable-item",{element:this,$element:e,left:f.left,top:f.top,right:f.left+e.outerWidth(),bottom:f.top+e.outerHeight(),startselected:false,selected:e.hasClass("ui-selected"),selecting:e.hasClass("ui-selecting"),unselecting:e.hasClass("ui-unselecting")})
})
};
this.refresh();
this.selectees=d.addClass("ui-selectee");
this._mouseInit();
this.helper=a("<div class='ui-selectable-helper'></div>")
},_destroy:function(){this.selectees.removeClass("ui-selectee").removeData("selectable-item");
this.element.removeClass("ui-selectable ui-selectable-disabled");
this._mouseDestroy()
},_mouseStart:function(e){var d=this;
this.opos=[e.pageX,e.pageY];
if(this.options.disabled){return
}var c=this.options;
this.selectees=a(c.filter,this.element[0]);
this._trigger("start",e);
a(c.appendTo).append(this.helper);
this.helper.css({left:e.clientX,top:e.clientY,width:0,height:0});
if(c.autoRefresh){this.refresh()
}this.selectees.filter(".ui-selected").each(function(){var f=a.data(this,"selectable-item");
f.startselected=true;
if(!e.metaKey&&!e.ctrlKey){f.$element.removeClass("ui-selected");
f.selected=false;
f.$element.addClass("ui-unselecting");
f.unselecting=true;
d._trigger("unselecting",e,{unselecting:f.element})
}});
a(e.target).parents().andSelf().each(function(){var g=a.data(this,"selectable-item");
if(g){var f=(!e.metaKey&&!e.ctrlKey)||!g.$element.hasClass("ui-selected");
g.$element.removeClass(f?"ui-unselecting":"ui-selected").addClass(f?"ui-selecting":"ui-unselecting");
g.unselecting=!f;
g.selecting=f;
g.selected=f;
if(f){d._trigger("selecting",e,{selecting:g.element})
}else{d._trigger("unselecting",e,{unselecting:g.element})
}return false
}})
},_mouseDrag:function(j){var i=this;
this.dragged=true;
if(this.options.disabled){return
}var e=this.options;
var d=this.opos[0],h=this.opos[1],c=j.pageX,g=j.pageY;
if(d>c){var f=c;
c=d;
d=f
}if(h>g){var f=g;
g=h;
h=f
}this.helper.css({left:d,top:h,width:c-d,height:g-h});
this.selectees.each(function(){var k=a.data(this,"selectable-item");
if(!k||k.element==i.element[0]){return
}var l=false;
if(e.tolerance=="touch"){l=(!(k.left>c||k.right<d||k.top>g||k.bottom<h))
}else{if(e.tolerance=="fit"){l=(k.left>d&&k.right<c&&k.top>h&&k.bottom<g)
}}if(l){if(k.selected){k.$element.removeClass("ui-selected");
k.selected=false
}if(k.unselecting){k.$element.removeClass("ui-unselecting");
k.unselecting=false
}if(!k.selecting){k.$element.addClass("ui-selecting");
k.selecting=true;
i._trigger("selecting",j,{selecting:k.element})
}}else{if(k.selecting){if((j.metaKey||j.ctrlKey)&&k.startselected){k.$element.removeClass("ui-selecting");
k.selecting=false;
k.$element.addClass("ui-selected");
k.selected=true
}else{k.$element.removeClass("ui-selecting");
k.selecting=false;
if(k.startselected){k.$element.addClass("ui-unselecting");
k.unselecting=true
}i._trigger("unselecting",j,{unselecting:k.element})
}}if(k.selected){if(!j.metaKey&&!j.ctrlKey&&!k.startselected){k.$element.removeClass("ui-selected");
k.selected=false;
k.$element.addClass("ui-unselecting");
k.unselecting=true;
i._trigger("unselecting",j,{unselecting:k.element})
}}}});
return false
},_mouseStop:function(e){var d=this;
this.dragged=false;
var c=this.options;
a(".ui-unselecting",this.element[0]).each(function(){var f=a.data(this,"selectable-item");
f.$element.removeClass("ui-unselecting");
f.unselecting=false;
f.startselected=false;
d._trigger("unselected",e,{unselected:f.element})
});
a(".ui-selecting",this.element[0]).each(function(){var f=a.data(this,"selectable-item");
f.$element.removeClass("ui-selecting").addClass("ui-selected");
f.selecting=false;
f.selected=true;
f.startselected=true;
d._trigger("selected",e,{selected:f.element})
});
this._trigger("stop",e);
this.helper.remove();
return false
}})
})(jQuery);
(function(b,c){var a=5;
b.widget("ui.slider",b.ui.mouse,{version:"1.9.2",widgetEventPrefix:"slide",options:{animate:false,distance:0,max:100,min:0,orientation:"horizontal",range:false,step:1,value:0,values:null},_create:function(){var f,d,j=this.options,h=this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),g="<a class='ui-slider-handle ui-state-default ui-corner-all' href='#'></a>",e=[];
this._keySliding=false;
this._mouseSliding=false;
this._animateOff=true;
this._handleIndex=null;
this._detectOrientation();
this._mouseInit();
this.element.addClass("ui-slider ui-slider-"+this.orientation+" ui-widget ui-widget-content ui-corner-all"+(j.disabled?" ui-slider-disabled ui-disabled":""));
this.range=b([]);
if(j.range){if(j.range===true){if(!j.values){j.values=[this._valueMin(),this._valueMin()]
}if(j.values.length&&j.values.length!==2){j.values=[j.values[0],j.values[0]]
}}this.range=b("<div></div>").appendTo(this.element).addClass("ui-slider-range ui-widget-header"+((j.range==="min"||j.range==="max")?" ui-slider-range-"+j.range:""))
}d=(j.values&&j.values.length)||1;
for(f=h.length;
f<d;
f++){e.push(g)
}this.handles=h.add(b(e.join("")).appendTo(this.element));
this.handle=this.handles.eq(0);
this.handles.add(this.range).filter("a").click(function(i){i.preventDefault()
}).mouseenter(function(){if(!j.disabled){b(this).addClass("ui-state-hover")
}}).mouseleave(function(){b(this).removeClass("ui-state-hover")
}).focus(function(){if(!j.disabled){b(".ui-slider .ui-state-focus").removeClass("ui-state-focus");
b(this).addClass("ui-state-focus")
}else{b(this).blur()
}}).blur(function(){b(this).removeClass("ui-state-focus")
});
this.handles.each(function(k){b(this).data("ui-slider-handle-index",k)
});
this._on(this.handles,{keydown:function(n){var o,l,k,m,i=b(n.target).data("ui-slider-handle-index");
switch(n.keyCode){case b.ui.keyCode.HOME:case b.ui.keyCode.END:case b.ui.keyCode.PAGE_UP:case b.ui.keyCode.PAGE_DOWN:case b.ui.keyCode.UP:case b.ui.keyCode.RIGHT:case b.ui.keyCode.DOWN:case b.ui.keyCode.LEFT:n.preventDefault();
if(!this._keySliding){this._keySliding=true;
b(n.target).addClass("ui-state-active");
o=this._start(n,i);
if(o===false){return
}}break
}m=this.options.step;
if(this.options.values&&this.options.values.length){l=k=this.values(i)
}else{l=k=this.value()
}switch(n.keyCode){case b.ui.keyCode.HOME:k=this._valueMin();
break;
case b.ui.keyCode.END:k=this._valueMax();
break;
case b.ui.keyCode.PAGE_UP:k=this._trimAlignValue(l+((this._valueMax()-this._valueMin())/a));
break;
case b.ui.keyCode.PAGE_DOWN:k=this._trimAlignValue(l-((this._valueMax()-this._valueMin())/a));
break;
case b.ui.keyCode.UP:case b.ui.keyCode.RIGHT:if(l===this._valueMax()){return
}k=this._trimAlignValue(l+m);
break;
case b.ui.keyCode.DOWN:case b.ui.keyCode.LEFT:if(l===this._valueMin()){return
}k=this._trimAlignValue(l-m);
break
}this._slide(n,i,k)
},keyup:function(k){var i=b(k.target).data("ui-slider-handle-index");
if(this._keySliding){this._keySliding=false;
this._stop(k,i);
this._change(k,i);
b(k.target).removeClass("ui-state-active")
}}});
this._refreshValue();
this._animateOff=false
},_destroy:function(){this.handles.remove();
this.range.remove();
this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-slider-disabled ui-widget ui-widget-content ui-corner-all");
this._mouseDestroy()
},_mouseCapture:function(f){var j,m,e,h,l,n,i,d,k=this,g=this.options;
if(g.disabled){return false
}this.elementSize={width:this.element.outerWidth(),height:this.element.outerHeight()};
this.elementOffset=this.element.offset();
j={x:f.pageX,y:f.pageY};
m=this._normValueFromMouse(j);
e=this._valueMax()-this._valueMin()+1;
this.handles.each(function(o){var p=Math.abs(m-k.values(o));
if(e>p){e=p;
h=b(this);
l=o
}});
if(g.range===true&&this.values(1)===g.min){l+=1;
h=b(this.handles[l])
}n=this._start(f,l);
if(n===false){return false
}this._mouseSliding=true;
this._handleIndex=l;
h.addClass("ui-state-active").focus();
i=h.offset();
d=!b(f.target).parents().andSelf().is(".ui-slider-handle");
this._clickOffset=d?{left:0,top:0}:{left:f.pageX-i.left-(h.width()/2),top:f.pageY-i.top-(h.height()/2)-(parseInt(h.css("borderTopWidth"),10)||0)-(parseInt(h.css("borderBottomWidth"),10)||0)+(parseInt(h.css("marginTop"),10)||0)};
if(!this.handles.hasClass("ui-state-hover")){this._slide(f,l,m)
}this._animateOff=true;
return true
},_mouseStart:function(){return true
},_mouseDrag:function(f){var d={x:f.pageX,y:f.pageY},e=this._normValueFromMouse(d);
this._slide(f,this._handleIndex,e);
return false
},_mouseStop:function(d){this.handles.removeClass("ui-state-active");
this._mouseSliding=false;
this._stop(d,this._handleIndex);
this._change(d,this._handleIndex);
this._handleIndex=null;
this._clickOffset=null;
this._animateOff=false;
return false
},_detectOrientation:function(){this.orientation=(this.options.orientation==="vertical")?"vertical":"horizontal"
},_normValueFromMouse:function(e){var d,h,g,f,i;
if(this.orientation==="horizontal"){d=this.elementSize.width;
h=e.x-this.elementOffset.left-(this._clickOffset?this._clickOffset.left:0)
}else{d=this.elementSize.height;
h=e.y-this.elementOffset.top-(this._clickOffset?this._clickOffset.top:0)
}g=(h/d);
if(g>1){g=1
}if(g<0){g=0
}if(this.orientation==="vertical"){g=1-g
}f=this._valueMax()-this._valueMin();
i=this._valueMin()+g*f;
return this._trimAlignValue(i)
},_start:function(f,e){var d={handle:this.handles[e],value:this.value()};
if(this.options.values&&this.options.values.length){d.value=this.values(e);
d.values=this.values()
}return this._trigger("start",f,d)
},_slide:function(h,g,f){var d,e,i;
if(this.options.values&&this.options.values.length){d=this.values(g?0:1);
if((this.options.values.length===2&&this.options.range===true)&&((g===0&&f>d)||(g===1&&f<d))){f=d
}if(f!==this.values(g)){e=this.values();
e[g]=f;
i=this._trigger("slide",h,{handle:this.handles[g],value:f,values:e});
d=this.values(g?0:1);
if(i!==false){this.values(g,f,true)
}}}else{if(f!==this.value()){i=this._trigger("slide",h,{handle:this.handles[g],value:f});
if(i!==false){this.value(f)
}}}},_stop:function(f,e){var d={handle:this.handles[e],value:this.value()};
if(this.options.values&&this.options.values.length){d.value=this.values(e);
d.values=this.values()
}this._trigger("stop",f,d)
},_change:function(f,e){if(!this._keySliding&&!this._mouseSliding){var d={handle:this.handles[e],value:this.value()};
if(this.options.values&&this.options.values.length){d.value=this.values(e);
d.values=this.values()
}this._trigger("change",f,d)
}},value:function(d){if(arguments.length){this.options.value=this._trimAlignValue(d);
this._refreshValue();
this._change(null,0);
return
}return this._value()
},values:function(e,h){var g,d,f;
if(arguments.length>1){this.options.values[e]=this._trimAlignValue(h);
this._refreshValue();
this._change(null,e);
return
}if(arguments.length){if(b.isArray(arguments[0])){g=this.options.values;
d=arguments[0];
for(f=0;
f<g.length;
f+=1){g[f]=this._trimAlignValue(d[f]);
this._change(null,f)
}this._refreshValue()
}else{if(this.options.values&&this.options.values.length){return this._values(e)
}else{return this.value()
}}}else{return this._values()
}},_setOption:function(e,f){var d,g=0;
if(b.isArray(this.options.values)){g=this.options.values.length
}b.Widget.prototype._setOption.apply(this,arguments);
switch(e){case"disabled":if(f){this.handles.filter(".ui-state-focus").blur();
this.handles.removeClass("ui-state-hover");
this.handles.prop("disabled",true);
this.element.addClass("ui-disabled")
}else{this.handles.prop("disabled",false);
this.element.removeClass("ui-disabled")
}break;
case"orientation":this._detectOrientation();
this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-"+this.orientation);
this._refreshValue();
break;
case"value":this._animateOff=true;
this._refreshValue();
this._change(null,0);
this._animateOff=false;
break;
case"values":this._animateOff=true;
this._refreshValue();
for(d=0;
d<g;
d+=1){this._change(null,d)
}this._animateOff=false;
break;
case"min":case"max":this._animateOff=true;
this._refreshValue();
this._animateOff=false;
break
}},_value:function(){var d=this.options.value;
d=this._trimAlignValue(d);
return d
},_values:function(d){var g,f,e;
if(arguments.length){g=this.options.values[d];
g=this._trimAlignValue(g);
return g
}else{f=this.options.values.slice();
for(e=0;
e<f.length;
e+=1){f[e]=this._trimAlignValue(f[e])
}return f
}},_trimAlignValue:function(g){if(g<=this._valueMin()){return this._valueMin()
}if(g>=this._valueMax()){return this._valueMax()
}var d=(this.options.step>0)?this.options.step:1,f=(g-this._valueMin())%d,e=g-f;
if(Math.abs(f)*2>=d){e+=(f>0)?d:(-d)
}return parseFloat(e.toFixed(5))
},_valueMin:function(){return this.options.min
},_valueMax:function(){return this.options.max
},_refreshValue:function(){var i,h,l,j,m,g=this.options.range,f=this.options,k=this,e=(!this._animateOff)?f.animate:false,d={};
if(this.options.values&&this.options.values.length){this.handles.each(function(n){h=(k.values(n)-k._valueMin())/(k._valueMax()-k._valueMin())*100;
d[k.orientation==="horizontal"?"left":"bottom"]=h+"%";
b(this).stop(1,1)[e?"animate":"css"](d,f.animate);
if(k.options.range===true){if(k.orientation==="horizontal"){if(n===0){k.range.stop(1,1)[e?"animate":"css"]({left:h+"%"},f.animate)
}if(n===1){k.range[e?"animate":"css"]({width:(h-i)+"%"},{queue:false,duration:f.animate})
}}else{if(n===0){k.range.stop(1,1)[e?"animate":"css"]({bottom:(h)+"%"},f.animate)
}if(n===1){k.range[e?"animate":"css"]({height:(h-i)+"%"},{queue:false,duration:f.animate})
}}}i=h
})
}else{l=this.value();
j=this._valueMin();
m=this._valueMax();
h=(m!==j)?(l-j)/(m-j)*100:0;
d[this.orientation==="horizontal"?"left":"bottom"]=h+"%";
this.handle.stop(1,1)[e?"animate":"css"](d,f.animate);
if(g==="min"&&this.orientation==="horizontal"){this.range.stop(1,1)[e?"animate":"css"]({width:h+"%"},f.animate)
}if(g==="max"&&this.orientation==="horizontal"){this.range[e?"animate":"css"]({width:(100-h)+"%"},{queue:false,duration:f.animate})
}if(g==="min"&&this.orientation==="vertical"){this.range.stop(1,1)[e?"animate":"css"]({height:h+"%"},f.animate)
}if(g==="max"&&this.orientation==="vertical"){this.range[e?"animate":"css"]({height:(100-h)+"%"},{queue:false,duration:f.animate})
}}}})
}(jQuery));
(function(a,b){a.widget("ui.sortable",a.ui.mouse,{version:"1.9.2",widgetEventPrefix:"sort",ready:false,options:{appendTo:"parent",axis:false,connectWith:false,containment:false,cursor:"auto",cursorAt:false,dropOnEmpty:true,forcePlaceholderSize:false,forceHelperSize:false,grid:false,handle:false,helper:"original",items:"> *",opacity:false,placeholder:false,revert:false,scroll:true,scrollSensitivity:20,scrollSpeed:20,scope:"default",tolerance:"intersect",zIndex:1000},_create:function(){var c=this.options;
this.containerCache={};
this.element.addClass("ui-sortable");
this.refresh();
this.floating=this.items.length?c.axis==="x"||(/left|right/).test(this.items[0].item.css("float"))||(/inline|table-cell/).test(this.items[0].item.css("display")):false;
this.offset=this.element.offset();
this._mouseInit();
this.ready=true
},_destroy:function(){this.element.removeClass("ui-sortable ui-sortable-disabled");
this._mouseDestroy();
for(var c=this.items.length-1;
c>=0;
c--){this.items[c].item.removeData(this.widgetName+"-item")
}return this
},_setOption:function(c,d){if(c==="disabled"){this.options[c]=d;
this.widget().toggleClass("ui-sortable-disabled",!!d)
}else{a.Widget.prototype._setOption.apply(this,arguments)
}},_mouseCapture:function(f,g){var e=this;
if(this.reverting){return false
}if(this.options.disabled||this.options.type=="static"){return false
}this._refreshItems(f);
var d=null,c=a(f.target).parents().each(function(){if(a.data(this,e.widgetName+"-item")==e){d=a(this);
return false
}});
if(a.data(f.target,e.widgetName+"-item")==e){d=a(f.target)
}if(!d){return false
}if(this.options.handle&&!g){var h=false;
a(this.options.handle,d).find("*").andSelf().each(function(){if(this==f.target){h=true
}});
if(!h){return false
}}this.currentItem=d;
this._removeCurrentsFromItems();
return true
},_mouseStart:function(e,f,c){var g=this.options;
this.currentContainer=this;
this.refreshPositions();
this.helper=this._createHelper(e);
this._cacheHelperProportions();
this._cacheMargins();
this.scrollParent=this.helper.scrollParent();
this.offset=this.currentItem.offset();
this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left};
a.extend(this.offset,{click:{left:e.pageX-this.offset.left,top:e.pageY-this.offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset()});
this.helper.css("position","absolute");
this.cssPosition=this.helper.css("position");
this.originalPosition=this._generatePosition(e);
this.originalPageX=e.pageX;
this.originalPageY=e.pageY;
(g.cursorAt&&this._adjustOffsetFromHelper(g.cursorAt));
this.domPosition={prev:this.currentItem.prev()[0],parent:this.currentItem.parent()[0]};
if(this.helper[0]!=this.currentItem[0]){this.currentItem.hide()
}this._createPlaceholder();
if(g.containment){this._setContainment()
}if(g.cursor){if(a("body").css("cursor")){this._storedCursor=a("body").css("cursor")
}a("body").css("cursor",g.cursor)
}if(g.opacity){if(this.helper.css("opacity")){this._storedOpacity=this.helper.css("opacity")
}this.helper.css("opacity",g.opacity)
}if(g.zIndex){if(this.helper.css("zIndex")){this._storedZIndex=this.helper.css("zIndex")
}this.helper.css("zIndex",g.zIndex)
}if(this.scrollParent[0]!=document&&this.scrollParent[0].tagName!="HTML"){this.overflowOffset=this.scrollParent.offset()
}this._trigger("start",e,this._uiHash());
if(!this._preserveHelperProportions){this._cacheHelperProportions()
}if(!c){for(var d=this.containers.length-1;
d>=0;
d--){this.containers[d]._trigger("activate",e,this._uiHash(this))
}}if(a.ui.ddmanager){a.ui.ddmanager.current=this
}if(a.ui.ddmanager&&!g.dropBehaviour){a.ui.ddmanager.prepareOffsets(this,e)
}this.dragging=true;
this.helper.addClass("ui-sortable-helper");
this._mouseDrag(e);
return true
},_mouseDrag:function(g){this.position=this._generatePosition(g);
this.positionAbs=this._convertPositionTo("absolute");
if(!this.lastPositionAbs){this.lastPositionAbs=this.positionAbs
}if(this.options.scroll){var h=this.options,c=false;
if(this.scrollParent[0]!=document&&this.scrollParent[0].tagName!="HTML"){if((this.overflowOffset.top+this.scrollParent[0].offsetHeight)-g.pageY<h.scrollSensitivity){this.scrollParent[0].scrollTop=c=this.scrollParent[0].scrollTop+h.scrollSpeed
}else{if(g.pageY-this.overflowOffset.top<h.scrollSensitivity){this.scrollParent[0].scrollTop=c=this.scrollParent[0].scrollTop-h.scrollSpeed
}}if((this.overflowOffset.left+this.scrollParent[0].offsetWidth)-g.pageX<h.scrollSensitivity){this.scrollParent[0].scrollLeft=c=this.scrollParent[0].scrollLeft+h.scrollSpeed
}else{if(g.pageX-this.overflowOffset.left<h.scrollSensitivity){this.scrollParent[0].scrollLeft=c=this.scrollParent[0].scrollLeft-h.scrollSpeed
}}}else{if(g.pageY-a(document).scrollTop()<h.scrollSensitivity){c=a(document).scrollTop(a(document).scrollTop()-h.scrollSpeed)
}else{if(a(window).height()-(g.pageY-a(document).scrollTop())<h.scrollSensitivity){c=a(document).scrollTop(a(document).scrollTop()+h.scrollSpeed)
}}if(g.pageX-a(document).scrollLeft()<h.scrollSensitivity){c=a(document).scrollLeft(a(document).scrollLeft()-h.scrollSpeed)
}else{if(a(window).width()-(g.pageX-a(document).scrollLeft())<h.scrollSensitivity){c=a(document).scrollLeft(a(document).scrollLeft()+h.scrollSpeed)
}}}if(c!==false&&a.ui.ddmanager&&!h.dropBehaviour){a.ui.ddmanager.prepareOffsets(this,g)
}}this.positionAbs=this._convertPositionTo("absolute");
if(!this.options.axis||this.options.axis!="y"){this.helper[0].style.left=this.position.left+"px"
}if(!this.options.axis||this.options.axis!="x"){this.helper[0].style.top=this.position.top+"px"
}for(var e=this.items.length-1;
e>=0;
e--){var f=this.items[e],d=f.item[0],j=this._intersectsWithPointer(f);
if(!j){continue
}if(f.instance!==this.currentContainer){continue
}if(d!=this.currentItem[0]&&this.placeholder[j==1?"next":"prev"]()[0]!=d&&!a.contains(this.placeholder[0],d)&&(this.options.type=="semi-dynamic"?!a.contains(this.element[0],d):true)){this.direction=j==1?"down":"up";
if(this.options.tolerance=="pointer"||this._intersectsWithSides(f)){this._rearrange(g,f)
}else{break
}this._trigger("change",g,this._uiHash());
break
}}this._contactContainers(g);
if(a.ui.ddmanager){a.ui.ddmanager.drag(this,g)
}this._trigger("sort",g,this._uiHash());
this.lastPositionAbs=this.positionAbs;
return false
},_mouseStop:function(d,e){if(!d){return
}if(a.ui.ddmanager&&!this.options.dropBehaviour){a.ui.ddmanager.drop(this,d)
}if(this.options.revert){var c=this;
var f=this.placeholder.offset();
this.reverting=true;
a(this.helper).animate({left:f.left-this.offset.parent.left-this.margins.left+(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollLeft),top:f.top-this.offset.parent.top-this.margins.top+(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollTop)},parseInt(this.options.revert,10)||500,function(){c._clear(d)
})
}else{this._clear(d,e)
}return false
},cancel:function(){if(this.dragging){this._mouseUp({target:null});
if(this.options.helper=="original"){this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper")
}else{this.currentItem.show()
}for(var c=this.containers.length-1;
c>=0;
c--){this.containers[c]._trigger("deactivate",null,this._uiHash(this));
if(this.containers[c].containerCache.over){this.containers[c]._trigger("out",null,this._uiHash(this));
this.containers[c].containerCache.over=0
}}}if(this.placeholder){if(this.placeholder[0].parentNode){this.placeholder[0].parentNode.removeChild(this.placeholder[0])
}if(this.options.helper!="original"&&this.helper&&this.helper[0].parentNode){this.helper.remove()
}a.extend(this,{helper:null,dragging:false,reverting:false,_noFinalSort:null});
if(this.domPosition.prev){a(this.domPosition.prev).after(this.currentItem)
}else{a(this.domPosition.parent).prepend(this.currentItem)
}}return this
},serialize:function(e){var c=this._getItemsAsjQuery(e&&e.connected);
var d=[];
e=e||{};
a(c).each(function(){var f=(a(e.item||this).attr(e.attribute||"id")||"").match(e.expression||(/(.+)[-=_](.+)/));
if(f){d.push((e.key||f[1]+"[]")+"="+(e.key&&e.expression?f[1]:f[2]))
}});
if(!d.length&&e.key){d.push(e.key+"=")
}return d.join("&")
},toArray:function(e){var c=this._getItemsAsjQuery(e&&e.connected);
var d=[];
e=e||{};
c.each(function(){d.push(a(e.item||this).attr(e.attribute||"id")||"")
});
return d
},_intersectsWith:function(m){var e=this.positionAbs.left,d=e+this.helperProportions.width,k=this.positionAbs.top,j=k+this.helperProportions.height;
var f=m.left,c=f+m.width,n=m.top,i=n+m.height;
var o=this.offset.click.top,h=this.offset.click.left;
var g=(k+o)>n&&(k+o)<i&&(e+h)>f&&(e+h)<c;
if(this.options.tolerance=="pointer"||this.options.forcePointerForContainers||(this.options.tolerance!="pointer"&&this.helperProportions[this.floating?"width":"height"]>m[this.floating?"width":"height"])){return g
}else{return(f<e+(this.helperProportions.width/2)&&d-(this.helperProportions.width/2)<c&&n<k+(this.helperProportions.height/2)&&j-(this.helperProportions.height/2)<i)
}},_intersectsWithPointer:function(e){var f=(this.options.axis==="x")||a.ui.isOverAxis(this.positionAbs.top+this.offset.click.top,e.top,e.height),d=(this.options.axis==="y")||a.ui.isOverAxis(this.positionAbs.left+this.offset.click.left,e.left,e.width),h=f&&d,c=this._getDragVerticalDirection(),g=this._getDragHorizontalDirection();
if(!h){return false
}return this.floating?(((g&&g=="right")||c=="down")?2:1):(c&&(c=="down"?2:1))
},_intersectsWithSides:function(f){var d=a.ui.isOverAxis(this.positionAbs.top+this.offset.click.top,f.top+(f.height/2),f.height),e=a.ui.isOverAxis(this.positionAbs.left+this.offset.click.left,f.left+(f.width/2),f.width),c=this._getDragVerticalDirection(),g=this._getDragHorizontalDirection();
if(this.floating&&g){return((g=="right"&&e)||(g=="left"&&!e))
}else{return c&&((c=="down"&&d)||(c=="up"&&!d))
}},_getDragVerticalDirection:function(){var c=this.positionAbs.top-this.lastPositionAbs.top;
return c!=0&&(c>0?"down":"up")
},_getDragHorizontalDirection:function(){var c=this.positionAbs.left-this.lastPositionAbs.left;
return c!=0&&(c>0?"right":"left")
},refresh:function(c){this._refreshItems(c);
this.refreshPositions();
return this
},_connectWith:function(){var c=this.options;
return c.connectWith.constructor==String?[c.connectWith]:c.connectWith
},_getItemsAsjQuery:function(h){var c=[];
var e=[];
var g=this._connectWith();
if(g&&h){for(var f=g.length-1;
f>=0;
f--){var l=a(g[f]);
for(var d=l.length-1;
d>=0;
d--){var k=a.data(l[d],this.widgetName);
if(k&&k!=this&&!k.options.disabled){e.push([a.isFunction(k.options.items)?k.options.items.call(k.element):a(k.options.items,k.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),k])
}}}}e.push([a.isFunction(this.options.items)?this.options.items.call(this.element,null,{options:this.options,item:this.currentItem}):a(this.options.items,this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),this]);
for(var f=e.length-1;
f>=0;
f--){e[f][0].each(function(){c.push(this)
})
}return a(c)
},_removeCurrentsFromItems:function(){var c=this.currentItem.find(":data("+this.widgetName+"-item)");
this.items=a.grep(this.items,function(e){for(var d=0;
d<c.length;
d++){if(c[d]==e.item[0]){return false
}}return true
})
},_refreshItems:function(c){this.items=[];
this.containers=[this];
var k=this.items;
var g=[[a.isFunction(this.options.items)?this.options.items.call(this.element[0],c,{item:this.currentItem}):a(this.options.items,this.element),this]];
var m=this._connectWith();
if(m&&this.ready){for(var f=m.length-1;
f>=0;
f--){var n=a(m[f]);
for(var e=n.length-1;
e>=0;
e--){var h=a.data(n[e],this.widgetName);
if(h&&h!=this&&!h.options.disabled){g.push([a.isFunction(h.options.items)?h.options.items.call(h.element[0],c,{item:this.currentItem}):a(h.options.items,h.element),h]);
this.containers.push(h)
}}}}for(var f=g.length-1;
f>=0;
f--){var l=g[f][1];
var d=g[f][0];
for(var e=0,o=d.length;
e<o;
e++){var p=a(d[e]);
p.data(this.widgetName+"-item",l);
k.push({item:p,instance:l,width:0,height:0,left:0,top:0})
}}},refreshPositions:function(c){if(this.offsetParent&&this.helper){this.offset.parent=this._getParentOffset()
}for(var e=this.items.length-1;
e>=0;
e--){var f=this.items[e];
if(f.instance!=this.currentContainer&&this.currentContainer&&f.item[0]!=this.currentItem[0]){continue
}var d=this.options.toleranceElement?a(this.options.toleranceElement,f.item):f.item;
if(!c){f.width=d.outerWidth();
f.height=d.outerHeight()
}var g=d.offset();
f.left=g.left;
f.top=g.top
}if(this.options.custom&&this.options.custom.refreshContainers){this.options.custom.refreshContainers.call(this)
}else{for(var e=this.containers.length-1;
e>=0;
e--){var g=this.containers[e].element.offset();
this.containers[e].containerCache.left=g.left;
this.containers[e].containerCache.top=g.top;
this.containers[e].containerCache.width=this.containers[e].element.outerWidth();
this.containers[e].containerCache.height=this.containers[e].element.outerHeight()
}}return this
},_createPlaceholder:function(d){d=d||this;
var e=d.options;
if(!e.placeholder||e.placeholder.constructor==String){var c=e.placeholder;
e.placeholder={element:function(){var f=a(document.createElement(d.currentItem[0].nodeName)).addClass(c||d.currentItem[0].className+" ui-sortable-placeholder").removeClass("ui-sortable-helper")[0];
if(!c){f.style.visibility="hidden"
}return f
},update:function(f,g){if(c&&!e.forcePlaceholderSize){return
}if(!g.height()){g.height(d.currentItem.innerHeight()-parseInt(d.currentItem.css("paddingTop")||0,10)-parseInt(d.currentItem.css("paddingBottom")||0,10))
}if(!g.width()){g.width(d.currentItem.innerWidth()-parseInt(d.currentItem.css("paddingLeft")||0,10)-parseInt(d.currentItem.css("paddingRight")||0,10))
}}}
}d.placeholder=a(e.placeholder.element.call(d.element,d.currentItem));
d.currentItem.after(d.placeholder);
e.placeholder.update(d,d.placeholder)
},_contactContainers:function(c){var e=null,n=null;
for(var h=this.containers.length-1;
h>=0;
h--){if(a.contains(this.currentItem[0],this.containers[h].element[0])){continue
}if(this._intersectsWith(this.containers[h].containerCache)){if(e&&a.contains(this.containers[h].element[0],e.element[0])){continue
}e=this.containers[h];
n=h
}else{if(this.containers[h].containerCache.over){this.containers[h]._trigger("out",c,this._uiHash(this));
this.containers[h].containerCache.over=0
}}}if(!e){return
}if(this.containers.length===1){this.containers[n]._trigger("over",c,this._uiHash(this));
this.containers[n].containerCache.over=1
}else{var m=10000;
var k=null;
var l=this.containers[n].floating?"left":"top";
var o=this.containers[n].floating?"width":"height";
var d=this.positionAbs[l]+this.offset.click[l];
for(var f=this.items.length-1;
f>=0;
f--){if(!a.contains(this.containers[n].element[0],this.items[f].item[0])){continue
}if(this.items[f].item[0]==this.currentItem[0]){continue
}var p=this.items[f].item.offset()[l];
var g=false;
if(Math.abs(p-d)>Math.abs(p+this.items[f][o]-d)){g=true;
p+=this.items[f][o]
}if(Math.abs(p-d)<m){m=Math.abs(p-d);
k=this.items[f];
this.direction=g?"up":"down"
}}if(!k&&!this.options.dropOnEmpty){return
}this.currentContainer=this.containers[n];
k?this._rearrange(c,k,null,true):this._rearrange(c,null,this.containers[n].element,true);
this._trigger("change",c,this._uiHash());
this.containers[n]._trigger("change",c,this._uiHash(this));
this.options.placeholder.update(this.currentContainer,this.placeholder);
this.containers[n]._trigger("over",c,this._uiHash(this));
this.containers[n].containerCache.over=1
}},_createHelper:function(d){var e=this.options;
var c=a.isFunction(e.helper)?a(e.helper.apply(this.element[0],[d,this.currentItem])):(e.helper=="clone"?this.currentItem.clone():this.currentItem);
if(!c.parents("body").length){a(e.appendTo!="parent"?e.appendTo:this.currentItem[0].parentNode)[0].appendChild(c[0])
}if(c[0]==this.currentItem[0]){this._storedCSS={width:this.currentItem[0].style.width,height:this.currentItem[0].style.height,position:this.currentItem.css("position"),top:this.currentItem.css("top"),left:this.currentItem.css("left")}
}if(c[0].style.width==""||e.forceHelperSize){c.width(this.currentItem.width())
}if(c[0].style.height==""||e.forceHelperSize){c.height(this.currentItem.height())
}return c
},_adjustOffsetFromHelper:function(c){if(typeof c=="string"){c=c.split(" ")
}if(a.isArray(c)){c={left:+c[0],top:+c[1]||0}
}if("left" in c){this.offset.click.left=c.left+this.margins.left
}if("right" in c){this.offset.click.left=this.helperProportions.width-c.right+this.margins.left
}if("top" in c){this.offset.click.top=c.top+this.margins.top
}if("bottom" in c){this.offset.click.top=this.helperProportions.height-c.bottom+this.margins.top
}},_getParentOffset:function(){this.offsetParent=this.helper.offsetParent();
var c=this.offsetParent.offset();
if(this.cssPosition=="absolute"&&this.scrollParent[0]!=document&&a.contains(this.scrollParent[0],this.offsetParent[0])){c.left+=this.scrollParent.scrollLeft();
c.top+=this.scrollParent.scrollTop()
}if((this.offsetParent[0]==document.body)||(this.offsetParent[0].tagName&&this.offsetParent[0].tagName.toLowerCase()=="html"&&a.ui.ie)){c={top:0,left:0}
}return{top:c.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:c.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}
},_getRelativeOffset:function(){if(this.cssPosition=="relative"){var c=this.currentItem.position();
return{top:c.top-(parseInt(this.helper.css("top"),10)||0)+this.scrollParent.scrollTop(),left:c.left-(parseInt(this.helper.css("left"),10)||0)+this.scrollParent.scrollLeft()}
}else{return{top:0,left:0}
}},_cacheMargins:function(){this.margins={left:(parseInt(this.currentItem.css("marginLeft"),10)||0),top:(parseInt(this.currentItem.css("marginTop"),10)||0)}
},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}
},_setContainment:function(){var f=this.options;
if(f.containment=="parent"){f.containment=this.helper[0].parentNode
}if(f.containment=="document"||f.containment=="window"){this.containment=[0-this.offset.relative.left-this.offset.parent.left,0-this.offset.relative.top-this.offset.parent.top,a(f.containment=="document"?document:window).width()-this.helperProportions.width-this.margins.left,(a(f.containment=="document"?document:window).height()||document.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top]
}if(!(/^(document|window|parent)$/).test(f.containment)){var d=a(f.containment)[0];
var e=a(f.containment).offset();
var c=(a(d).css("overflow")!="hidden");
this.containment=[e.left+(parseInt(a(d).css("borderLeftWidth"),10)||0)+(parseInt(a(d).css("paddingLeft"),10)||0)-this.margins.left,e.top+(parseInt(a(d).css("borderTopWidth"),10)||0)+(parseInt(a(d).css("paddingTop"),10)||0)-this.margins.top,e.left+(c?Math.max(d.scrollWidth,d.offsetWidth):d.offsetWidth)-(parseInt(a(d).css("borderLeftWidth"),10)||0)-(parseInt(a(d).css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left,e.top+(c?Math.max(d.scrollHeight,d.offsetHeight):d.offsetHeight)-(parseInt(a(d).css("borderTopWidth"),10)||0)-(parseInt(a(d).css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top]
}},_convertPositionTo:function(g,i){if(!i){i=this.position
}var e=g=="absolute"?1:-1;
var f=this.options,c=this.cssPosition=="absolute"&&!(this.scrollParent[0]!=document&&a.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,h=(/(html|body)/i).test(c[0].tagName);
return{top:(i.top+this.offset.relative.top*e+this.offset.parent.top*e-((this.cssPosition=="fixed"?-this.scrollParent.scrollTop():(h?0:c.scrollTop()))*e)),left:(i.left+this.offset.relative.left*e+this.offset.parent.left*e-((this.cssPosition=="fixed"?-this.scrollParent.scrollLeft():h?0:c.scrollLeft())*e))}
},_generatePosition:function(f){var i=this.options,c=this.cssPosition=="absolute"&&!(this.scrollParent[0]!=document&&a.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,j=(/(html|body)/i).test(c[0].tagName);
if(this.cssPosition=="relative"&&!(this.scrollParent[0]!=document&&this.scrollParent[0]!=this.offsetParent[0])){this.offset.relative=this._getRelativeOffset()
}var e=f.pageX;
var d=f.pageY;
if(this.originalPosition){if(this.containment){if(f.pageX-this.offset.click.left<this.containment[0]){e=this.containment[0]+this.offset.click.left
}if(f.pageY-this.offset.click.top<this.containment[1]){d=this.containment[1]+this.offset.click.top
}if(f.pageX-this.offset.click.left>this.containment[2]){e=this.containment[2]+this.offset.click.left
}if(f.pageY-this.offset.click.top>this.containment[3]){d=this.containment[3]+this.offset.click.top
}}if(i.grid){var h=this.originalPageY+Math.round((d-this.originalPageY)/i.grid[1])*i.grid[1];
d=this.containment?(!(h-this.offset.click.top<this.containment[1]||h-this.offset.click.top>this.containment[3])?h:(!(h-this.offset.click.top<this.containment[1])?h-i.grid[1]:h+i.grid[1])):h;
var g=this.originalPageX+Math.round((e-this.originalPageX)/i.grid[0])*i.grid[0];
e=this.containment?(!(g-this.offset.click.left<this.containment[0]||g-this.offset.click.left>this.containment[2])?g:(!(g-this.offset.click.left<this.containment[0])?g-i.grid[0]:g+i.grid[0])):g
}}return{top:(d-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+((this.cssPosition=="fixed"?-this.scrollParent.scrollTop():(j?0:c.scrollTop())))),left:(e-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+((this.cssPosition=="fixed"?-this.scrollParent.scrollLeft():j?0:c.scrollLeft())))}
},_rearrange:function(g,f,d,e){d?d[0].appendChild(this.placeholder[0]):f.item[0].parentNode.insertBefore(this.placeholder[0],(this.direction=="down"?f.item[0]:f.item[0].nextSibling));
this.counter=this.counter?++this.counter:1;
var c=this.counter;
this._delay(function(){if(c==this.counter){this.refreshPositions(!e)
}})
},_clear:function(d,e){this.reverting=false;
var f=[];
if(!this._noFinalSort&&this.currentItem.parent().length){this.placeholder.before(this.currentItem)
}this._noFinalSort=null;
if(this.helper[0]==this.currentItem[0]){for(var c in this._storedCSS){if(this._storedCSS[c]=="auto"||this._storedCSS[c]=="static"){this._storedCSS[c]=""
}}this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper")
}else{this.currentItem.show()
}if(this.fromOutside&&!e){f.push(function(g){this._trigger("receive",g,this._uiHash(this.fromOutside))
})
}if((this.fromOutside||this.domPosition.prev!=this.currentItem.prev().not(".ui-sortable-helper")[0]||this.domPosition.parent!=this.currentItem.parent()[0])&&!e){f.push(function(g){this._trigger("update",g,this._uiHash())
})
}if(this!==this.currentContainer){if(!e){f.push(function(g){this._trigger("remove",g,this._uiHash())
});
f.push((function(g){return function(h){g._trigger("receive",h,this._uiHash(this))
}
}).call(this,this.currentContainer));
f.push((function(g){return function(h){g._trigger("update",h,this._uiHash(this))
}
}).call(this,this.currentContainer))
}}for(var c=this.containers.length-1;
c>=0;
c--){if(!e){f.push((function(g){return function(h){g._trigger("deactivate",h,this._uiHash(this))
}
}).call(this,this.containers[c]))
}if(this.containers[c].containerCache.over){f.push((function(g){return function(h){g._trigger("out",h,this._uiHash(this))
}
}).call(this,this.containers[c]));
this.containers[c].containerCache.over=0
}}if(this._storedCursor){a("body").css("cursor",this._storedCursor)
}if(this._storedOpacity){this.helper.css("opacity",this._storedOpacity)
}if(this._storedZIndex){this.helper.css("zIndex",this._storedZIndex=="auto"?"":this._storedZIndex)
}this.dragging=false;
if(this.cancelHelperRemoval){if(!e){this._trigger("beforeStop",d,this._uiHash());
for(var c=0;
c<f.length;
c++){f[c].call(this,d)
}this._trigger("stop",d,this._uiHash())
}this.fromOutside=false;
return false
}if(!e){this._trigger("beforeStop",d,this._uiHash())
}this.placeholder[0].parentNode.removeChild(this.placeholder[0]);
if(this.helper[0]!=this.currentItem[0]){this.helper.remove()
}this.helper=null;
if(!e){for(var c=0;
c<f.length;
c++){f[c].call(this,d)
}this._trigger("stop",d,this._uiHash())
}this.fromOutside=false;
return true
},_trigger:function(){if(a.Widget.prototype._trigger.apply(this,arguments)===false){this.cancel()
}},_uiHash:function(c){var d=c||this;
return{helper:d.helper,placeholder:d.placeholder||a([]),position:d.position,originalPosition:d.originalPosition,offset:d.positionAbs,item:d.currentItem,sender:c?c.element:null}
}})
})(jQuery);
(function(b){function a(c){return function(){var d=this.element.val();
c.apply(this,arguments);
this._refresh();
if(d!==this.element.val()){this._trigger("change")
}}
}b.widget("ui.spinner",{version:"1.9.2",defaultElement:"<input>",widgetEventPrefix:"spin",options:{culture:null,icons:{down:"ui-icon-triangle-1-s",up:"ui-icon-triangle-1-n"},incremental:true,max:null,min:null,numberFormat:null,page:10,step:1,change:null,spin:null,start:null,stop:null},_create:function(){this._setOption("max",this.options.max);
this._setOption("min",this.options.min);
this._setOption("step",this.options.step);
this._value(this.element.val(),true);
this._draw();
this._on(this._events);
this._refresh();
this._on(this.window,{beforeunload:function(){this.element.removeAttr("autocomplete")
}})
},_getCreateOptions:function(){var c={},d=this.element;
b.each(["min","max","step"],function(e,f){var g=d.attr(f);
if(g!==undefined&&g.length){c[f]=g
}});
return c
},_events:{keydown:function(c){if(this._start(c)&&this._keydown(c)){c.preventDefault()
}},keyup:"_stop",focus:function(){this.previous=this.element.val()
},blur:function(c){if(this.cancelBlur){delete this.cancelBlur;
return
}this._refresh();
if(this.previous!==this.element.val()){this._trigger("change",c)
}},mousewheel:function(c,d){if(!d){return
}if(!this.spinning&&!this._start(c)){return false
}this._spin((d>0?1:-1)*this.options.step,c);
clearTimeout(this.mousewheelTimer);
this.mousewheelTimer=this._delay(function(){if(this.spinning){this._stop(c)
}},100);
c.preventDefault()
},"mousedown .ui-spinner-button":function(d){var c;
c=this.element[0]===this.document[0].activeElement?this.previous:this.element.val();
function e(){var f=this.element[0]===this.document[0].activeElement;
if(!f){this.element.focus();
this.previous=c;
this._delay(function(){this.previous=c
})
}}d.preventDefault();
e.call(this);
this.cancelBlur=true;
this._delay(function(){delete this.cancelBlur;
e.call(this)
});
if(this._start(d)===false){return
}this._repeat(null,b(d.currentTarget).hasClass("ui-spinner-up")?1:-1,d)
},"mouseup .ui-spinner-button":"_stop","mouseenter .ui-spinner-button":function(c){if(!b(c.currentTarget).hasClass("ui-state-active")){return
}if(this._start(c)===false){return false
}this._repeat(null,b(c.currentTarget).hasClass("ui-spinner-up")?1:-1,c)
},"mouseleave .ui-spinner-button":"_stop"},_draw:function(){var c=this.uiSpinner=this.element.addClass("ui-spinner-input").attr("autocomplete","off").wrap(this._uiSpinnerHtml()).parent().append(this._buttonHtml());
this.element.attr("role","spinbutton");
this.buttons=c.find(".ui-spinner-button").attr("tabIndex",-1).button().removeClass("ui-corner-all");
if(this.buttons.height()>Math.ceil(c.height()*0.5)&&c.height()>0){c.height(c.height())
}if(this.options.disabled){this.disable()
}},_keydown:function(d){var c=this.options,e=b.ui.keyCode;
switch(d.keyCode){case e.UP:this._repeat(null,1,d);
return true;
case e.DOWN:this._repeat(null,-1,d);
return true;
case e.PAGE_UP:this._repeat(null,c.page,d);
return true;
case e.PAGE_DOWN:this._repeat(null,-c.page,d);
return true
}return false
},_uiSpinnerHtml:function(){return"<span class='ui-spinner ui-widget ui-widget-content ui-corner-all'></span>"
},_buttonHtml:function(){return"<a class='ui-spinner-button ui-spinner-up ui-corner-tr'><span class='ui-icon "+this.options.icons.up+"'>&#9650;</span></a><a class='ui-spinner-button ui-spinner-down ui-corner-br'><span class='ui-icon "+this.options.icons.down+"'>&#9660;</span></a>"
},_start:function(c){if(!this.spinning&&this._trigger("start",c)===false){return false
}if(!this.counter){this.counter=1
}this.spinning=true;
return true
},_repeat:function(d,c,e){d=d||500;
clearTimeout(this.timer);
this.timer=this._delay(function(){this._repeat(40,c,e)
},d);
this._spin(c*this.options.step,e)
},_spin:function(d,c){var e=this.value()||0;
if(!this.counter){this.counter=1
}e=this._adjustValue(e+d*this._increment(this.counter));
if(!this.spinning||this._trigger("spin",c,{value:e})!==false){this._value(e);
this.counter++
}},_increment:function(c){var d=this.options.incremental;
if(d){return b.isFunction(d)?d(c):Math.floor(c*c*c/50000-c*c/500+17*c/200+1)
}return 1
},_precision:function(){var c=this._precisionOf(this.options.step);
if(this.options.min!==null){c=Math.max(c,this._precisionOf(this.options.min))
}return c
},_precisionOf:function(d){var e=d.toString(),c=e.indexOf(".");
return c===-1?0:e.length-c-1
},_adjustValue:function(e){var d,f,c=this.options;
d=c.min!==null?c.min:0;
f=e-d;
f=Math.round(f/c.step)*c.step;
e=d+f;
e=parseFloat(e.toFixed(this._precision()));
if(c.max!==null&&e>c.max){return c.max
}if(c.min!==null&&e<c.min){return c.min
}return e
},_stop:function(c){if(!this.spinning){return
}clearTimeout(this.timer);
clearTimeout(this.mousewheelTimer);
this.counter=0;
this.spinning=false;
this._trigger("stop",c)
},_setOption:function(c,d){if(c==="culture"||c==="numberFormat"){var e=this._parse(this.element.val());
this.options[c]=d;
this.element.val(this._format(e));
return
}if(c==="max"||c==="min"||c==="step"){if(typeof d==="string"){d=this._parse(d)
}}this._super(c,d);
if(c==="disabled"){if(d){this.element.prop("disabled",true);
this.buttons.button("disable")
}else{this.element.prop("disabled",false);
this.buttons.button("enable")
}}},_setOptions:a(function(c){this._super(c);
this._value(this.element.val())
}),_parse:function(c){if(typeof c==="string"&&c!==""){c=window.Globalize&&this.options.numberFormat?Globalize.parseFloat(c,10,this.options.culture):+c
}return c===""||isNaN(c)?null:c
},_format:function(c){if(c===""){return""
}return window.Globalize&&this.options.numberFormat?Globalize.format(c,this.options.numberFormat,this.options.culture):c
},_refresh:function(){this.element.attr({"aria-valuemin":this.options.min,"aria-valuemax":this.options.max,"aria-valuenow":this._parse(this.element.val())})
},_value:function(e,c){var d;
if(e!==""){d=this._parse(e);
if(d!==null){if(!c){d=this._adjustValue(d)
}e=this._format(d)
}}this.element.val(e);
this._refresh()
},_destroy:function(){this.element.removeClass("ui-spinner-input").prop("disabled",false).removeAttr("autocomplete").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow");
this.uiSpinner.replaceWith(this.element)
},stepUp:a(function(c){this._stepUp(c)
}),_stepUp:function(c){this._spin((c||1)*this.options.step)
},stepDown:a(function(c){this._stepDown(c)
}),_stepDown:function(c){this._spin((c||1)*-this.options.step)
},pageUp:a(function(c){this._stepUp((c||1)*this.options.page)
}),pageDown:a(function(c){this._stepDown((c||1)*this.options.page)
}),value:function(c){if(!arguments.length){return this._parse(this.element.val())
}a(this._value).call(this,c)
},widget:function(){return this.uiSpinner
}})
}(jQuery));
(function(c,e){var a=0,f=/#.*$/;
function d(){return ++a
}function b(g){return g.hash.length>1&&g.href.replace(f,"")===location.href.replace(f,"").replace(/\s/g,"%20")
}c.widget("ui.tabs",{version:"1.9.2",delay:300,options:{active:null,collapsible:false,event:"click",heightStyle:"content",hide:null,show:null,activate:null,beforeActivate:null,beforeLoad:null,load:null},_create:function(){var h=this,g=this.options,i=g.active,j=location.hash.substring(1);
this.running=false;
this.element.addClass("ui-tabs ui-widget ui-widget-content ui-corner-all").toggleClass("ui-tabs-collapsible",g.collapsible).delegate(".ui-tabs-nav > li","mousedown"+this.eventNamespace,function(k){if(c(this).is(".ui-state-disabled")){k.preventDefault()
}}).delegate(".ui-tabs-anchor","focus"+this.eventNamespace,function(){if(c(this).closest("li").is(".ui-state-disabled")){this.blur()
}});
this._processTabs();
if(i===null){if(j){this.tabs.each(function(k,l){if(c(l).attr("aria-controls")===j){i=k;
return false
}})
}if(i===null){i=this.tabs.index(this.tabs.filter(".ui-tabs-active"))
}if(i===null||i===-1){i=this.tabs.length?0:false
}}if(i!==false){i=this.tabs.index(this.tabs.eq(i));
if(i===-1){i=g.collapsible?false:0
}}g.active=i;
if(!g.collapsible&&g.active===false&&this.anchors.length){g.active=0
}if(c.isArray(g.disabled)){g.disabled=c.unique(g.disabled.concat(c.map(this.tabs.filter(".ui-state-disabled"),function(k){return h.tabs.index(k)
}))).sort()
}if(this.options.active!==false&&this.anchors.length){this.active=this._findActive(this.options.active)
}else{this.active=c()
}this._refresh();
if(this.active.length){this.load(g.active)
}},_getCreateEventData:function(){return{tab:this.active,panel:!this.active.length?c():this._getPanelForTab(this.active)}
},_tabKeydown:function(i){var h=c(this.document[0].activeElement).closest("li"),g=this.tabs.index(h),j=true;
if(this._handlePageNav(i)){return
}switch(i.keyCode){case c.ui.keyCode.RIGHT:case c.ui.keyCode.DOWN:g++;
break;
case c.ui.keyCode.UP:case c.ui.keyCode.LEFT:j=false;
g--;
break;
case c.ui.keyCode.END:g=this.anchors.length-1;
break;
case c.ui.keyCode.HOME:g=0;
break;
case c.ui.keyCode.SPACE:i.preventDefault();
clearTimeout(this.activating);
this._activate(g);
return;
case c.ui.keyCode.ENTER:i.preventDefault();
clearTimeout(this.activating);
this._activate(g===this.options.active?false:g);
return;
default:return
}i.preventDefault();
clearTimeout(this.activating);
g=this._focusNextTab(g,j);
if(!i.ctrlKey){h.attr("aria-selected","false");
this.tabs.eq(g).attr("aria-selected","true");
this.activating=this._delay(function(){this.option("active",g)
},this.delay)
}},_panelKeydown:function(g){if(this._handlePageNav(g)){return
}if(g.ctrlKey&&g.keyCode===c.ui.keyCode.UP){g.preventDefault();
this.active.focus()
}},_handlePageNav:function(g){if(g.altKey&&g.keyCode===c.ui.keyCode.PAGE_UP){this._activate(this._focusNextTab(this.options.active-1,false));
return true
}if(g.altKey&&g.keyCode===c.ui.keyCode.PAGE_DOWN){this._activate(this._focusNextTab(this.options.active+1,true));
return true
}},_findNextTab:function(h,i){var g=this.tabs.length-1;
function j(){if(h>g){h=0
}if(h<0){h=g
}return h
}while(c.inArray(j(),this.options.disabled)!==-1){h=i?h+1:h-1
}return h
},_focusNextTab:function(g,h){g=this._findNextTab(g,h);
this.tabs.eq(g).focus();
return g
},_setOption:function(g,h){if(g==="active"){this._activate(h);
return
}if(g==="disabled"){this._setupDisabled(h);
return
}this._super(g,h);
if(g==="collapsible"){this.element.toggleClass("ui-tabs-collapsible",h);
if(!h&&this.options.active===false){this._activate(0)
}}if(g==="event"){this._setupEvents(h)
}if(g==="heightStyle"){this._setupHeightStyle(h)
}},_tabId:function(g){return g.attr("aria-controls")||"ui-tabs-"+d()
},_sanitizeSelector:function(g){return g?g.replace(/[!"$%&'()*+,.\/:;<=>?@\[\]\^`{|}~]/g,"\\$&"):""
},refresh:function(){var h=this.options,g=this.tablist.children(":has(a[href])");
h.disabled=c.map(g.filter(".ui-state-disabled"),function(i){return g.index(i)
});
this._processTabs();
if(h.active===false||!this.anchors.length){h.active=false;
this.active=c()
}else{if(this.active.length&&!c.contains(this.tablist[0],this.active[0])){if(this.tabs.length===h.disabled.length){h.active=false;
this.active=c()
}else{this._activate(this._findNextTab(Math.max(0,h.active-1),false))
}}else{h.active=this.tabs.index(this.active)
}}this._refresh()
},_refresh:function(){this._setupDisabled(this.options.disabled);
this._setupEvents(this.options.event);
this._setupHeightStyle(this.options.heightStyle);
this.tabs.not(this.active).attr({"aria-selected":"false",tabIndex:-1});
this.panels.not(this._getPanelForTab(this.active)).hide().attr({"aria-expanded":"false","aria-hidden":"true"});
if(!this.active.length){this.tabs.eq(0).attr("tabIndex",0)
}else{this.active.addClass("ui-tabs-active ui-state-active").attr({"aria-selected":"true",tabIndex:0});
this._getPanelForTab(this.active).show().attr({"aria-expanded":"true","aria-hidden":"false"})
}},_processTabs:function(){var g=this;
this.tablist=this._getList().addClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").attr("role","tablist");
this.tabs=this.tablist.find("> li:has(a[href])").addClass("ui-state-default ui-corner-top").attr({role:"tab",tabIndex:-1});
this.anchors=this.tabs.map(function(){return c("a",this)[0]
}).addClass("ui-tabs-anchor").attr({role:"presentation",tabIndex:-1});
this.panels=c();
this.anchors.each(function(n,l){var h,j,m,k=c(l).uniqueId().attr("id"),o=c(l).closest("li"),p=o.attr("aria-controls");
if(b(l)){h=l.hash;
j=g.element.find(g._sanitizeSelector(h))
}else{m=g._tabId(o);
h="#"+m;
j=g.element.find(h);
if(!j.length){j=g._createPanel(m);
j.insertAfter(g.panels[n-1]||g.tablist)
}j.attr("aria-live","polite")
}if(j.length){g.panels=g.panels.add(j)
}if(p){o.data("ui-tabs-aria-controls",p)
}o.attr({"aria-controls":h.substring(1),"aria-labelledby":k});
j.attr("aria-labelledby",k)
});
this.panels.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").attr("role","tabpanel")
},_getList:function(){return this.element.find("ol,ul").eq(0)
},_createPanel:function(g){return c("<div>").attr("id",g).addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").data("ui-tabs-destroy",true)
},_setupDisabled:function(j){if(c.isArray(j)){if(!j.length){j=false
}else{if(j.length===this.anchors.length){j=true
}}}for(var h=0,g;
(g=this.tabs[h]);
h++){if(j===true||c.inArray(h,j)!==-1){c(g).addClass("ui-state-disabled").attr("aria-disabled","true")
}else{c(g).removeClass("ui-state-disabled").removeAttr("aria-disabled")
}}this.options.disabled=j
},_setupEvents:function(h){var g={click:function(i){i.preventDefault()
}};
if(h){c.each(h.split(" "),function(j,i){g[i]="_eventHandler"
})
}this._off(this.anchors.add(this.tabs).add(this.panels));
this._on(this.anchors,g);
this._on(this.tabs,{keydown:"_tabKeydown"});
this._on(this.panels,{keydown:"_panelKeydown"});
this._focusable(this.tabs);
this._hoverable(this.tabs)
},_setupHeightStyle:function(g){var i,j,h=this.element.parent();
if(g==="fill"){if(!c.support.minHeight){j=h.css("overflow");
h.css("overflow","hidden")
}i=h.height();
this.element.siblings(":visible").each(function(){var l=c(this),k=l.css("position");
if(k==="absolute"||k==="fixed"){return
}i-=l.outerHeight(true)
});
if(j){h.css("overflow",j)
}this.element.children().not(this.panels).each(function(){i-=c(this).outerHeight(true)
});
this.panels.each(function(){c(this).height(Math.max(0,i-c(this).innerHeight()+c(this).height()))
}).css("overflow","auto")
}else{if(g==="auto"){i=0;
this.panels.each(function(){i=Math.max(i,c(this).height("").height())
}).height(i)
}}},_eventHandler:function(g){var p=this.options,k=this.active,l=c(g.currentTarget),j=l.closest("li"),n=j[0]===k[0],h=n&&p.collapsible,i=h?c():this._getPanelForTab(j),m=!k.length?c():this._getPanelForTab(k),o={oldTab:k,oldPanel:m,newTab:h?c():j,newPanel:i};
g.preventDefault();
if(j.hasClass("ui-state-disabled")||j.hasClass("ui-tabs-loading")||this.running||(n&&!p.collapsible)||(this._trigger("beforeActivate",g,o)===false)){return
}p.active=h?false:this.tabs.index(j);
this.active=n?c():j;
if(this.xhr){this.xhr.abort()
}if(!m.length&&!i.length){c.error("jQuery UI Tabs: Mismatching fragment identifier.")
}if(i.length){this.load(this.tabs.index(j),g)
}this._toggle(g,o)
},_toggle:function(m,l){var k=this,g=l.newPanel,j=l.oldPanel;
this.running=true;
function i(){k.running=false;
k._trigger("activate",m,l)
}function h(){l.newTab.closest("li").addClass("ui-tabs-active ui-state-active");
if(g.length&&k.options.show){k._show(g,k.options.show,i)
}else{g.show();
i()
}}if(j.length&&this.options.hide){this._hide(j,this.options.hide,function(){l.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active");
h()
})
}else{l.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active");
j.hide();
h()
}j.attr({"aria-expanded":"false","aria-hidden":"true"});
l.oldTab.attr("aria-selected","false");
if(g.length&&j.length){l.oldTab.attr("tabIndex",-1)
}else{if(g.length){this.tabs.filter(function(){return c(this).attr("tabIndex")===0
}).attr("tabIndex",-1)
}}g.attr({"aria-expanded":"true","aria-hidden":"false"});
l.newTab.attr({"aria-selected":"true",tabIndex:0})
},_activate:function(h){var g,i=this._findActive(h);
if(i[0]===this.active[0]){return
}if(!i.length){i=this.active
}g=i.find(".ui-tabs-anchor")[0];
this._eventHandler({target:g,currentTarget:g,preventDefault:c.noop})
},_findActive:function(g){return g===false?c():this.tabs.eq(g)
},_getIndex:function(g){if(typeof g==="string"){g=this.anchors.index(this.anchors.filter("[href$='"+g+"']"))
}return g
},_destroy:function(){if(this.xhr){this.xhr.abort()
}this.element.removeClass("ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible");
this.tablist.removeClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all").removeAttr("role");
this.anchors.removeClass("ui-tabs-anchor").removeAttr("role").removeAttr("tabIndex").removeData("href.tabs").removeData("load.tabs").removeUniqueId();
this.tabs.add(this.panels).each(function(){if(c.data(this,"ui-tabs-destroy")){c(this).remove()
}else{c(this).removeClass("ui-state-default ui-state-active ui-state-disabled ui-corner-top ui-corner-bottom ui-widget-content ui-tabs-active ui-tabs-panel").removeAttr("tabIndex").removeAttr("aria-live").removeAttr("aria-busy").removeAttr("aria-selected").removeAttr("aria-labelledby").removeAttr("aria-hidden").removeAttr("aria-expanded").removeAttr("role")
}});
this.tabs.each(function(){var g=c(this),h=g.data("ui-tabs-aria-controls");
if(h){g.attr("aria-controls",h)
}else{g.removeAttr("aria-controls")
}});
this.panels.show();
if(this.options.heightStyle!=="content"){this.panels.css("height","")
}},enable:function(g){var h=this.options.disabled;
if(h===false){return
}if(g===e){h=false
}else{g=this._getIndex(g);
if(c.isArray(h)){h=c.map(h,function(i){return i!==g?i:null
})
}else{h=c.map(this.tabs,function(i,j){return j!==g?j:null
})
}}this._setupDisabled(h)
},disable:function(g){var h=this.options.disabled;
if(h===true){return
}if(g===e){h=true
}else{g=this._getIndex(g);
if(c.inArray(g,h)!==-1){return
}if(c.isArray(h)){h=c.merge([g],h).sort()
}else{h=[g]
}}this._setupDisabled(h)
},load:function(i,m){i=this._getIndex(i);
var l=this,j=this.tabs.eq(i),h=j.find(".ui-tabs-anchor"),g=this._getPanelForTab(j),k={tab:j,panel:g};
if(b(h[0])){return
}this.xhr=c.ajax(this._ajaxSettings(h,m,k));
if(this.xhr&&this.xhr.statusText!=="canceled"){j.addClass("ui-tabs-loading");
g.attr("aria-busy","true");
this.xhr.success(function(n){setTimeout(function(){g.html(n);
l._trigger("load",m,k)
},1)
}).complete(function(o,n){setTimeout(function(){if(n==="abort"){l.panels.stop(false,true)
}j.removeClass("ui-tabs-loading");
g.removeAttr("aria-busy");
if(o===l.xhr){delete l.xhr
}},1)
})
}},_ajaxSettings:function(g,j,i){var h=this;
return{url:g.attr("href"),beforeSend:function(l,k){return h._trigger("beforeLoad",j,c.extend({jqXHR:l,ajaxSettings:k},i))
}}
},_getPanelForTab:function(g){var h=c(g).attr("aria-controls");
return this.element.find(this._sanitizeSelector("#"+h))
}});
if(c.uiBackCompat!==false){c.ui.tabs.prototype._ui=function(h,g){return{tab:h,panel:g,index:this.anchors.index(h)}
};
c.widget("ui.tabs",c.ui.tabs,{url:function(h,g){this.anchors.eq(h).attr("href",g)
}});
c.widget("ui.tabs",c.ui.tabs,{options:{ajaxOptions:null,cache:false},_create:function(){this._super();
var g=this;
this._on({tabsbeforeload:function(h,i){if(c.data(i.tab[0],"cache.tabs")){h.preventDefault();
return
}i.jqXHR.success(function(){if(g.options.cache){c.data(i.tab[0],"cache.tabs",true)
}})
}})
},_ajaxSettings:function(h,i,j){var g=this.options.ajaxOptions;
return c.extend({},g,{error:function(m,k){try{g.error(m,k,j.tab.closest("li").index(),j.tab[0])
}catch(l){}}},this._superApply(arguments))
},_setOption:function(g,h){if(g==="cache"&&h===false){this.anchors.removeData("cache.tabs")
}this._super(g,h)
},_destroy:function(){this.anchors.removeData("cache.tabs");
this._super()
},url:function(g){this.anchors.eq(g).removeData("cache.tabs");
this._superApply(arguments)
}});
c.widget("ui.tabs",c.ui.tabs,{abort:function(){if(this.xhr){this.xhr.abort()
}}});
c.widget("ui.tabs",c.ui.tabs,{options:{spinner:"<em>Loading&#8230;</em>"},_create:function(){this._super();
this._on({tabsbeforeload:function(i,j){if(i.target!==this.element[0]||!this.options.spinner){return
}var h=j.tab.find("span"),g=h.html();
h.html(this.options.spinner);
j.jqXHR.complete(function(){h.html(g)
})
}})
}});
c.widget("ui.tabs",c.ui.tabs,{options:{enable:null,disable:null},enable:function(i){var h=this.options,g;
if(i&&h.disabled===true||(c.isArray(h.disabled)&&c.inArray(i,h.disabled)!==-1)){g=true
}this._superApply(arguments);
if(g){this._trigger("enable",null,this._ui(this.anchors[i],this.panels[i]))
}},disable:function(i){var h=this.options,g;
if(i&&h.disabled===false||(c.isArray(h.disabled)&&c.inArray(i,h.disabled)===-1)){g=true
}this._superApply(arguments);
if(g){this._trigger("disable",null,this._ui(this.anchors[i],this.panels[i]))
}}});
c.widget("ui.tabs",c.ui.tabs,{options:{add:null,remove:null,tabTemplate:"<li><a href='#{href}'><span>#{label}</span></a></li>"},add:function(l,k,j){if(j===e){j=this.anchors.length
}var m,h,i=this.options,g=c(i.tabTemplate.replace(/#\{href\}/g,l).replace(/#\{label\}/g,k)),n=!l.indexOf("#")?l.replace("#",""):this._tabId(g);
g.addClass("ui-state-default ui-corner-top").data("ui-tabs-destroy",true);
g.attr("aria-controls",n);
m=j>=this.tabs.length;
h=this.element.find("#"+n);
if(!h.length){h=this._createPanel(n);
if(m){if(j>0){h.insertAfter(this.panels.eq(-1))
}else{h.appendTo(this.element)
}}else{h.insertBefore(this.panels[j])
}}h.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").hide();
if(m){g.appendTo(this.tablist)
}else{g.insertBefore(this.tabs[j])
}i.disabled=c.map(i.disabled,function(o){return o>=j?++o:o
});
this.refresh();
if(this.tabs.length===1&&i.active===false){this.option("active",0)
}this._trigger("add",null,this._ui(this.anchors[j],this.panels[j]));
return this
},remove:function(i){i=this._getIndex(i);
var h=this.options,j=this.tabs.eq(i).remove(),g=this._getPanelForTab(j).remove();
if(j.hasClass("ui-tabs-active")&&this.anchors.length>2){this._activate(i+(i+1<this.anchors.length?1:-1))
}h.disabled=c.map(c.grep(h.disabled,function(k){return k!==i
}),function(k){return k>=i?--k:k
});
this.refresh();
this._trigger("remove",null,this._ui(j.find("a")[0],g[0]));
return this
}});
c.widget("ui.tabs",c.ui.tabs,{length:function(){return this.anchors.length
}});
c.widget("ui.tabs",c.ui.tabs,{options:{idPrefix:"ui-tabs-"},_tabId:function(h){var g=h.is("li")?h.find("a[href]"):h;
g=g[0];
return c(g).closest("li").attr("aria-controls")||g.title&&g.title.replace(/\s/g,"_").replace(/[^\w\u00c0-\uFFFF\-]/g,"")||this.options.idPrefix+d()
}});
c.widget("ui.tabs",c.ui.tabs,{options:{panelTemplate:"<div></div>"},_createPanel:function(g){return c(this.options.panelTemplate).attr("id",g).addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").data("ui-tabs-destroy",true)
}});
c.widget("ui.tabs",c.ui.tabs,{_create:function(){var g=this.options;
if(g.active===null&&g.selected!==e){g.active=g.selected===-1?false:g.selected
}this._super();
g.selected=g.active;
if(g.selected===false){g.selected=-1
}},_setOption:function(h,i){if(h!=="selected"){return this._super(h,i)
}var g=this.options;
this._super("active",i===-1?false:i);
g.selected=g.active;
if(g.selected===false){g.selected=-1
}},_eventHandler:function(){this._superApply(arguments);
this.options.selected=this.options.active;
if(this.options.selected===false){this.options.selected=-1
}}});
c.widget("ui.tabs",c.ui.tabs,{options:{show:null,select:null},_create:function(){this._super();
if(this.options.active!==false){this._trigger("show",null,this._ui(this.active.find(".ui-tabs-anchor")[0],this._getPanelForTab(this.active)[0]))
}},_trigger:function(j,k,l){var i,g,h=this._superApply(arguments);
if(!h){return false
}if(j==="beforeActivate"){i=l.newTab.length?l.newTab:l.oldTab;
g=l.newPanel.length?l.newPanel:l.oldPanel;
h=this._super("select",k,{tab:i.find(".ui-tabs-anchor")[0],panel:g[0],index:i.closest("li").index()})
}else{if(j==="activate"&&l.newTab.length){h=this._super("show",k,{tab:l.newTab.find(".ui-tabs-anchor")[0],panel:l.newPanel[0],index:l.newTab.closest("li").index()})
}}return h
}});
c.widget("ui.tabs",c.ui.tabs,{select:function(g){g=this._getIndex(g);
if(g===-1){if(this.options.collapsible&&this.options.selected!==-1){g=this.options.selected
}else{return
}}this.anchors.eq(g).trigger(this.options.event+this.eventNamespace)
}});
(function(){var g=0;
c.widget("ui.tabs",c.ui.tabs,{options:{cookie:null},_create:function(){var h=this.options,i;
if(h.active==null&&h.cookie){i=parseInt(this._cookie(),10);
if(i===-1){i=false
}h.active=i
}this._super()
},_cookie:function(i){var h=[this.cookie||(this.cookie=this.options.cookie.name||"ui-tabs-"+(++g))];
if(arguments.length){h.push(i===false?-1:i);
h.push(this.options.cookie)
}return c.cookie.apply(null,h)
},_refresh:function(){this._super();
if(this.options.cookie){this._cookie(this.options.active,this.options.cookie)
}},_eventHandler:function(){this._superApply(arguments);
if(this.options.cookie){this._cookie(this.options.active,this.options.cookie)
}},_destroy:function(){this._super();
if(this.options.cookie){this._cookie(null,this.options.cookie)
}}})
})();
c.widget("ui.tabs",c.ui.tabs,{_trigger:function(h,i,j){var g=c.extend({},j);
if(h==="load"){g.panel=g.panel[0];
g.tab=g.tab.find(".ui-tabs-anchor")[0]
}return this._super(h,i,g)
}});
c.widget("ui.tabs",c.ui.tabs,{options:{fx:null},_getFx:function(){var h,g,i=this.options.fx;
if(i){if(c.isArray(i)){h=i[0];
g=i[1]
}else{h=g=i
}}return i?{show:g,hide:h}:null
},_toggle:function(n,m){var l=this,g=m.newPanel,j=m.oldPanel,k=this._getFx();
if(!k){return this._super(n,m)
}l.running=true;
function i(){l.running=false;
l._trigger("activate",n,m)
}function h(){m.newTab.closest("li").addClass("ui-tabs-active ui-state-active");
if(g.length&&k.show){g.animate(k.show,k.show.duration,function(){i()
})
}else{g.show();
i()
}}if(j.length&&k.hide){j.animate(k.hide,k.hide.duration,function(){m.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active");
h()
})
}else{m.oldTab.closest("li").removeClass("ui-tabs-active ui-state-active");
j.hide();
h()
}}})
}})(jQuery);
(function(d){var b=0;
function c(f,g){var e=(f.attr("aria-describedby")||"").split(/\s+/);
e.push(g);
f.data("ui-tooltip-id",g).attr("aria-describedby",d.trim(e.join(" ")))
}function a(g){var h=g.data("ui-tooltip-id"),f=(g.attr("aria-describedby")||"").split(/\s+/),e=d.inArray(h,f);
if(e!==-1){f.splice(e,1)
}g.removeData("ui-tooltip-id");
f=d.trim(f.join(" "));
if(f){g.attr("aria-describedby",f)
}else{g.removeAttr("aria-describedby")
}}d.widget("ui.tooltip",{version:"1.9.2",options:{content:function(){return d(this).attr("title")
},hide:true,items:"[title]:not([disabled])",position:{my:"left top+15",at:"left bottom",collision:"flipfit flip"},show:true,tooltipClass:null,track:false,close:null,open:null},_create:function(){this._on({mouseover:"open",focusin:"open"});
this.tooltips={};
this.parents={};
if(this.options.disabled){this._disable()
}},_setOption:function(e,g){var f=this;
if(e==="disabled"){this[g?"_disable":"_enable"]();
this.options[e]=g;
return
}this._super(e,g);
if(e==="content"){d.each(this.tooltips,function(i,h){f._updateContent(h)
})
}},_disable:function(){var e=this;
d.each(this.tooltips,function(h,f){var g=d.Event("blur");
g.target=g.currentTarget=f[0];
e.close(g,true)
});
this.element.find(this.options.items).andSelf().each(function(){var f=d(this);
if(f.is("[title]")){f.data("ui-tooltip-title",f.attr("title")).attr("title","")
}})
},_enable:function(){this.element.find(this.options.items).andSelf().each(function(){var e=d(this);
if(e.data("ui-tooltip-title")){e.attr("title",e.data("ui-tooltip-title"))
}})
},open:function(f){var e=this,g=d(f?f.target:this.element).closest(this.options.items);
if(!g.length||g.data("ui-tooltip-id")){return
}if(g.attr("title")){g.data("ui-tooltip-title",g.attr("title"))
}g.data("ui-tooltip-open",true);
if(f&&f.type==="mouseover"){g.parents().each(function(){var i=d(this),h;
if(i.data("ui-tooltip-open")){h=d.Event("blur");
h.target=h.currentTarget=this;
e.close(h,true)
}if(i.attr("title")){i.uniqueId();
e.parents[this.id]={element:this,title:i.attr("title")};
i.attr("title","")
}})
}this._updateContent(g,f)
},_updateContent:function(j,i){var h,e=this.options.content,g=this,f=i?i.type:null;
if(typeof e==="string"){return this._open(i,j,e)
}h=e.call(j[0],function(k){if(!j.data("ui-tooltip-open")){return
}g._delay(function(){if(i){i.type=f
}this._open(i,j,k)
})
});
if(h){this._open(i,j,h)
}},_open:function(i,k,h){var j,g,f,l=d.extend({},this.options.position);
if(!h){return
}j=this._find(k);
if(j.length){j.find(".ui-tooltip-content").html(h);
return
}if(k.is("[title]")){if(i&&i.type==="mouseover"){k.attr("title","")
}else{k.removeAttr("title")
}}j=this._tooltip(k);
c(k,j.attr("id"));
j.find(".ui-tooltip-content").html(h);
function e(m){l.of=m;
if(j.is(":hidden")){return
}j.position(l)
}if(this.options.track&&i&&/^mouse/.test(i.type)){this._on(this.document,{mousemove:e});
e(i)
}else{j.position(d.extend({of:k},this.options.position))
}j.hide();
this._show(j,this.options.show);
if(this.options.show&&this.options.show.delay){f=setInterval(function(){if(j.is(":visible")){e(l.of);
clearInterval(f)
}},d.fx.interval)
}this._trigger("open",i,{tooltip:j});
g={keyup:function(m){if(m.keyCode===d.ui.keyCode.ESCAPE){var n=d.Event(m);
n.currentTarget=k[0];
this.close(n,true)
}},remove:function(){this._removeTooltip(j)
}};
if(!i||i.type==="mouseover"){g.mouseleave="close"
}if(!i||i.type==="focusin"){g.focusout="close"
}this._on(true,k,g)
},close:function(f){var e=this,h=d(f?f.currentTarget:this.element),g=this._find(h);
if(this.closing){return
}if(h.data("ui-tooltip-title")){h.attr("title",h.data("ui-tooltip-title"))
}a(h);
g.stop(true);
this._hide(g,this.options.hide,function(){e._removeTooltip(d(this))
});
h.removeData("ui-tooltip-open");
this._off(h,"mouseleave focusout keyup");
if(h[0]!==this.element[0]){this._off(h,"remove")
}this._off(this.document,"mousemove");
if(f&&f.type==="mouseleave"){d.each(this.parents,function(j,i){d(i.element).attr("title",i.title);
delete e.parents[j]
})
}this.closing=true;
this._trigger("close",f,{tooltip:g});
this.closing=false
},_tooltip:function(e){var g="ui-tooltip-"+b++,f=d("<div>").attr({id:g,role:"tooltip"}).addClass("ui-tooltip ui-widget ui-corner-all ui-widget-content "+(this.options.tooltipClass||""));
d("<div>").addClass("ui-tooltip-content").appendTo(f);
f.appendTo(this.document[0].body);
if(d.fn.bgiframe){f.bgiframe()
}this.tooltips[g]=e;
return f
},_find:function(e){var f=e.data("ui-tooltip-id");
return f?d("#"+f):d()
},_removeTooltip:function(e){e.remove();
delete this.tooltips[e.attr("id")]
},_destroy:function(){var e=this;
d.each(this.tooltips,function(h,f){var g=d.Event("blur");
g.target=g.currentTarget=f[0];
e.close(g,true);
d("#"+h).remove();
if(f.data("ui-tooltip-title")){f.attr("title",f.data("ui-tooltip-title"));
f.removeData("ui-tooltip-title")
}})
}})
}(jQuery));
(function(d){d.widget("ui.widget",{yield:null,returnValues:{},before:function(h,g){var e=this[h];
this[h]=function(){g.apply(this,arguments);
return e.apply(this,arguments)
}
},after:function(h,g){var e=this[h];
this[h]=function(){this.returnValues[h]=e.apply(this,arguments);
return g.apply(this,arguments)
}
},around:function(h,g){var e=this[h];
this[h]=function(){var i=this.yield;
this.yield=e;
var f=g.apply(this,arguments);
this.yield=i;
return f
}
}});
var c=(function(e){return(function(f){e.prototype=f;
return new e()
})
})(function(){});
var a=/xyz/.test(function(){xyz
})?/\b_super\b/:/.*/;
d.ui.widget.subclass=function b(f){d.widget(f);
f=f.split(".");
var g=d[f[0]][f[1]],k=this,e=k.prototype;
var h=arguments[0]=g.prototype=c(e);
d.extend.apply(null,arguments);
g.subclass=b;
for(key in h){if(h.hasOwnProperty(key)){switch(key){case"_create":var i=h._create;
h._create=function(){e._create.apply(this);
i.apply(this)
};
break;
case"_init":var l=h._init;
h._init=function(){e._init.apply(this);
l.apply(this)
};
break;
case"destroy":var j=h.destroy;
h.destroy=function(){j.apply(this);
e.destroy.apply(this)
};
break;
case"options":var m=h.options;
h.options=d.extend({},e.options,m);
break;
default:if(d.isFunction(h[key])&&d.isFunction(e[key])&&a.test(h[key])){h[key]=(function(n,o){return function(){var q=this._super;
this._super=e[n];
try{var p=o.apply(this,arguments)
}finally{this._super=q
}return p
}
})(key,h[key])
}break
}}}}
})(jQuery);

function S4(){return((1+Math.random())*65536|0).toString(16).substring(1)}function guid(){return S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4()}function js_beautify(e,t){function B(e){e=typeof e=="undefined"?!1:e;while(r.length&&(r[r.length-1]===" "||r[r.length-1]===c||r[r.length-1]===T||e&&(r[r.length-1]==="\n"||r[r.length-1]==="\r")))r.pop()}function j(e){return e.replace(/^\s\s*|\s\s*$/,"")}function F(e){e=e.replace(/\x0d/g,"");var t=[],n=e.indexOf("\n");while(n!==-1)t.push(e.substring(0,n)),e=e.substring(n+1),n=e.indexOf("\n");return e.length&&t.push(e),t}function I(){var e=_;_=!1,q(),_=e}function q(e,t){f.eat_next_space=!1;if(_&&V(f.mode))return;e=typeof e=="undefined"?!0:e,t=typeof t=="undefined"?!0:t,t&&(f.if_line=!1,f.chain_extra_indentation=0),B();if(!r.length)return;if(r[r.length-1]!=="\n"||!e)S=!0,r.push("\n");T&&r.push(T);for(var n=0;n<f.indentation_level+f.chain_extra_indentation;n+=1)r.push(c);f.var_line&&f.var_line_reindented&&r.push(c)}function R(){if(s==="TK_COMMENT")return q();if(f.eat_next_space){f.eat_next_space=!1;return}var e=" ";r.length&&(e=r[r.length-1]),e!==" "&&e!=="\n"&&e!==c&&r.push(" ")}function U(){S=!1,f.eat_next_space=!1,r.push(i)}function z(){f.indentation_level+=1}function W(){r.length&&r[r.length-1]===c&&r.pop()}function X(e){f&&l.push(f),f={previous_mode:f?f.mode:"BLOCK",mode:e,var_line:!1,var_line_tainted:!1,var_line_reindented:!1,in_html_comment:!1,if_line:!1,chain_extra_indentation:0,in_case_statement:!1,in_case:!1,case_body:!1,eat_next_space:!1,indentation_level:f?f.indentation_level+(f.var_line&&f.var_line_reindented?1:0):0,ternary_depth:0}}function V(e){return e==="[EXPRESSION]"||e==="[INDENTED-EXPRESSION]"}function $(e){return G(e,["[EXPRESSION]","(EXPRESSION)","(FOR-EXPRESSION)","(COND-EXPRESSION)"])}function J(){w=f.mode==="DO_BLOCK";if(l.length>0){var e=f.mode;f=l.pop(),f.previous_mode=e}}function K(e,t){for(var n=0;n<e.length;n++){var r=j(e[n]);if(r.charAt(0)!==t)return!1}return!0}function Q(e){return G(e,["case","return","do","if","throw","else"])}function G(e,t){for(var n=0;n<t.length;n+=1)if(t[n]===e)return!0;return!1}function Y(e){var t=v,r=n.charAt(t);while(G(r,h)&&r!==e){t++;if(t>=H)return 0;r=n.charAt(t)}return r}function Z(){var e,t;x=0;if(v>=H)return["","TK_EOF"];E=!1;var i=n.charAt(v);v+=1;var u=_&&V(f.mode);if(u){var a=0;while(G(i,h)){i==="\n"?(B(),r.push("\n"),S=!0,a=0):i==="	"?a+=4:i!=="\r"&&(a+=1);if(v>=H)return["","TK_EOF"];i=n.charAt(v),v+=1}if(S)for(e=0;e<a;e++)r.push(" ")}else{while(G(i,h)){i==="\n"&&(x+=O?x<=O?1:0:1);if(v>=H)return["","TK_EOF"];i=n.charAt(v),v+=1}if(L&&x>1)for(e=0;e<x;e+=1)q(e===0),S=!0;E=x>0}if(G(i,p)){if(v<H)while(G(n.charAt(v),p)){i+=n.charAt(v),v+=1;if(v===H)break}if(v===H||!i.match(/^[0-9]+[Ee]$/)||n.charAt(v)!=="-"&&n.charAt(v)!=="+")return i==="in"?[i,"TK_OPERATOR"]:(E&&s!=="TK_OPERATOR"&&s!=="TK_EQUALS"&&!f.if_line&&(L||o!=="var")&&q(),[i,"TK_WORD"]);var l=n.charAt(v);v+=1;var c=Z();return i+=l+c[0],[i,"TK_WORD"]}if(i==="("||i==="[")return[i,"TK_START_EXPR"];if(i===")"||i==="]")return[i,"TK_END_EXPR"];if(i==="{")return[i,"TK_START_BLOCK"];if(i==="}")return[i,"TK_END_BLOCK"];if(i===";")return[i,"TK_SEMICOLON"];if(i==="/"){var m="",y=!0;if(n.charAt(v)==="*"){v+=1;if(v<H)while(v<H&&(n.charAt(v)!=="*"||!n.charAt(v+1)||n.charAt(v+1)!=="/")){i=n.charAt(v),m+=i;if(i==="\n"||i==="\r")y=!1;v+=1;if(v>=H)break}return v+=2,y&&x===0?["/*"+m+"*/","TK_INLINE_COMMENT"]:["/*"+m+"*/","TK_BLOCK_COMMENT"]}if(n.charAt(v)==="/"){m=i;while(n.charAt(v)!=="\r"&&n.charAt(v)!=="\n"){m+=n.charAt(v),v+=1;if(v>=H)break}return E&&q(),[m,"TK_COMMENT"]}}if(i==="'"||i==='"'||i==="/"&&(s==="TK_WORD"&&Q(o)||o===")"&&G(f.previous_mode,["(COND-EXPRESSION)","(FOR-EXPRESSION)"])||s==="TK_COMMA"||s==="TK_COMMENT"||s==="TK_START_EXPR"||s==="TK_START_BLOCK"||s==="TK_END_BLOCK"||s==="TK_OPERATOR"||s==="TK_EQUALS"||s==="TK_EOF"||s==="TK_SEMICOLON")){var b=i,w=!1,T=0,N=0;t=i;if(v<H)if(b==="/"){var C=!1;while(w||C||n.charAt(v)!==b){t+=n.charAt(v),w?w=!1:(w=n.charAt(v)==="\\",n.charAt(v)==="["?C=!0:n.charAt(v)==="]"&&(C=!1)),v+=1;if(v>=H)return[t,"TK_STRING"]}}else while(w||n.charAt(v)!==b){t+=n.charAt(v),T&&T>=N&&(T=parseInt(t.substr(-N),16),T&&T>=32&&T<=126&&(T=String.fromCharCode(T),t=t.substr(0,t.length-N-2)+(T===b||T==="\\"?"\\":"")+T),T=0),T?T++:w?(w=!1,P&&(n.charAt(v)==="x"?(T++,N=2):n.charAt(v)==="u"&&(T++,N=4))):w=n.charAt(v)==="\\",v+=1;if(v>=H)return[t,"TK_STRING"]}v+=1,t+=b;if(b==="/")while(v<H&&G(n.charAt(v),p))t+=n.charAt(v),v+=1;return[t,"TK_STRING"]}if(i==="#"){if(r.length===0&&n.charAt(v)==="!"){t=i;while(v<H&&i!=="\n")i=n.charAt(v),t+=i,v+=1;return r.push(j(t)+"\n"),q(),Z()}var k="#";if(v<H&&G(n.charAt(v),g)){do i=n.charAt(v),k+=i,v+=1;while(v<H&&i!=="#"&&i!=="=");return i!=="#"&&(n.charAt(v)==="["&&n.charAt(v+1)==="]"?(k+="[]",v+=2):n.charAt(v)==="{"&&n.charAt(v+1)==="}"&&(k+="{}",v+=2)),[k,"TK_WORD"]}}if(i==="<"&&n.substring(v-1,v+3)==="<!--"){v+=3,i="<!--";while(n.charAt(v)!=="\n"&&v<H)i+=n.charAt(v),v++;return f.in_html_comment=!0,[i,"TK_COMMENT"]}if(i==="-"&&f.in_html_comment&&n.substring(v-1,v+2)==="-->")return f.in_html_comment=!1,v+=2,E&&q(),["-->","TK_COMMENT"];if(i===".")return[i,"TK_DOT"];if(G(i,d)){while(v<H&&G(i+n.charAt(v),d)){i+=n.charAt(v),v+=1;if(v>=H)break}return i===","?[i,"TK_COMMA"]:i==="="?[i,"TK_EQUALS"]:[i,"TK_OPERATOR"]}return[i,"TK_UNKNOWN"]}var n,r,i,s,o,u,a,f,l,c,h,p,d,v,m,g,y,b,w,E,S,x,T="";t=t?t:{};var N;t.space_after_anon_function!==undefined&&t.jslint_happy===undefined&&(t.jslint_happy=t.space_after_anon_function),t.braces_on_own_line!==undefined&&(N=t.braces_on_own_line?"expand":"collapse"),N=t.brace_style?t.brace_style:N?N:"collapse";var C=t.indent_size?t.indent_size:4,k=t.indent_char?t.indent_char:" ",L=typeof t.preserve_newlines=="undefined"?!0:t.preserve_newlines,A=typeof t.break_chained_methods=="undefined"?!1:t.break_chained_methods,O=typeof t.max_preserve_newlines=="undefined"?!1:t.max_preserve_newlines,M=t.jslint_happy==="undefined"?!1:t.jslint_happy,_=typeof t.keep_array_indentation=="undefined"?!1:t.keep_array_indentation,D=typeof t.space_before_conditional=="undefined"?!0:t.space_before_conditional,P=typeof t.unescape_strings=="undefined"?!1:t.unescape_strings;S=!1;var H=e.length;c="";while(C>0)c+=k,C-=1;while(e&&(e.charAt(0)===" "||e.charAt(0)==="	"))T+=e.charAt(0),e=e.substring(1);n=e,a="",s="TK_START_EXPR",o="",u="",r=[],w=!1,h="\n\r	 ".split(""),p="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_$".split(""),g="0123456789".split(""),d="+ - * / % & ++ -- = += -= *= /= %= == === != !== > < >= <= >> << >>> >>>= >>= <<= && &= | || ! !! , : ? ^ ^= |= ::",d+=" <%= <% %> <?= <? ?>",d=d.split(" "),m="continue,try,throw,return,var,if,switch,case,default,for,while,break,function".split(","),l=[],X("BLOCK"),v=0;for(;;){var et=Z();i=et[0],b=et[1];if(b==="TK_EOF")break;switch(b){case"TK_START_EXPR":if(i==="["){if(s==="TK_WORD"||o===")"){G(o,m)&&R(),X("(EXPRESSION)"),U();break}f.mode==="[EXPRESSION]"||f.mode==="[INDENTED-EXPRESSION]"?u==="]"&&o===","?(f.mode==="[EXPRESSION]"&&(f.mode="[INDENTED-EXPRESSION]",_||z()),X("[EXPRESSION]"),_||q()):o==="["?(f.mode==="[EXPRESSION]"&&(f.mode="[INDENTED-EXPRESSION]",_||z()),X("[EXPRESSION]"),_||q()):X("[EXPRESSION]"):X("[EXPRESSION]")}else a==="for"?X("(FOR-EXPRESSION)"):G(a,["if","while"])?X("(COND-EXPRESSION)"):X("(EXPRESSION)");o===";"||s==="TK_START_BLOCK"?q():s==="TK_END_EXPR"||s==="TK_START_EXPR"||s==="TK_END_BLOCK"||o==="."?E&&q():s!=="TK_WORD"&&s!=="TK_OPERATOR"?R():a==="function"||a==="typeof"?M&&R():(G(o,m)||o==="catch")&&D&&R(),U();break;case"TK_DOT":Q(o)?R():o===")"&&(A||E)&&(f.chain_extra_indentation=1,q(!0,!1)),U();break;case"TK_END_EXPR":if(i==="]")if(_){if(o==="}"){W(),U(),J();break}}else if(f.mode==="[INDENTED-EXPRESSION]"&&o==="]"){J(),q(),U();break}J(),U();break;case"TK_START_BLOCK":a==="do"?X("DO_BLOCK"):X("BLOCK");if(N==="expand"||N==="expand-strict"){var tt=!1;N==="expand-strict"?(tt=Y()==="}",tt||q(!0)):s!=="TK_OPERATOR"&&(o==="="||Q(o)&&o!=="else"?R():q(!0)),U(),tt||z()}else s!=="TK_OPERATOR"&&s!=="TK_START_EXPR"?s==="TK_START_BLOCK"?q():R():V(f.previous_mode)&&o===","&&(u==="}"?R():q()),z(),U();break;case"TK_END_BLOCK":J(),N==="expand"||N==="expand-strict"?(o!=="{"&&q(),U()):(s==="TK_START_BLOCK"?S?W():B():V(f.mode)&&_?(_=!1,q(),_=!0):q(),U());break;case"TK_WORD":if(w){R(),U(),R(),w=!1;break}y="NONE";if(i==="function"){f.var_line&&s!=="TK_EQUALS"&&(f.var_line_reindented=!0);if((S||o===";")&&o!=="{"&&s!=="TK_BLOCK_COMMENT"&&s!=="TK_COMMENT"){x=S?x:0,L||(x=1);for(var nt=0;nt<2-x;nt++)q(!1)}s==="TK_WORD"?o==="get"||o==="set"||o==="new"||o==="return"?R():q():s==="TK_OPERATOR"||o==="="?R():$(f.mode)||q(),U(),a=i;break}if(i==="case"||i==="default"&&f.in_case_statement){q(),f.case_body&&(f.indentation_level--,f.case_body=!1,W()),U(),f.in_case=!0,f.in_case_statement=!0;break}s==="TK_END_BLOCK"?G(i.toLowerCase(),["else","catch","finally"])?N==="expand"||N==="end-expand"||N==="expand-strict"?y="NEWLINE":(y="SPACE",R()):y="NEWLINE":s!=="TK_SEMICOLON"||f.mode!=="BLOCK"&&f.mode!=="DO_BLOCK"?s==="TK_SEMICOLON"&&$(f.mode)?y="SPACE":s==="TK_STRING"?y="NEWLINE":s==="TK_WORD"?(o==="else"&&B(!0),y="SPACE"):s==="TK_START_BLOCK"?y="NEWLINE":s==="TK_END_EXPR"&&(R(),y="NEWLINE"):y="NEWLINE",G(i,m)&&o!==")"&&(o==="else"?y="SPACE":y="NEWLINE"),f.if_line&&s==="TK_END_EXPR"&&(f.if_line=!1),G(i.toLowerCase(),["else","catch","finally"])?s!=="TK_END_BLOCK"||N==="expand"||N==="end-expand"||N==="expand-strict"?q():(B(!0),R()):y==="NEWLINE"?Q(o)?R():s!=="TK_END_EXPR"?(s!=="TK_START_EXPR"||i!=="var")&&o!==":"&&(i==="if"&&a==="else"&&o!=="{"?R():(f.var_line=!1,f.var_line_reindented=!1,q())):G(i,m)&&o!==")"&&(f.var_line=!1,f.var_line_reindented=!1,q()):V(f.mode)&&o===","&&u==="}"?q():y==="SPACE"&&R(),U(),a=i,i==="var"&&(f.var_line=!0,f.var_line_reindented=!1,f.var_line_tainted=!1),i==="if"&&(f.if_line=!0),i==="else"&&(f.if_line=!1);break;case"TK_SEMICOLON":U(),f.var_line=!1,f.var_line_reindented=!1,f.mode==="OBJECT"&&(f.mode="BLOCK");break;case"TK_STRING":s==="TK_END_EXPR"&&G(f.previous_mode,["(COND-EXPRESSION)","(FOR-EXPRESSION)"])?R():s==="TK_COMMENT"||s==="TK_STRING"||s==="TK_START_BLOCK"||s==="TK_END_BLOCK"||s==="TK_SEMICOLON"?q():s==="TK_WORD"?R():L&&E&&(q(),r.push(c)),U();break;case"TK_EQUALS":f.var_line&&(f.var_line_tainted=!0),R(),U(),R();break;case"TK_COMMA":if(f.var_line){if($(f.mode)||s==="TK_END_BLOCK")f.var_line_tainted=!1;if(f.var_line_tainted){U(),f.var_line_reindented=!0,f.var_line_tainted=!1,q();break}f.var_line_tainted=!1,U(),R();break}s==="TK_COMMENT"&&q(),s==="TK_END_BLOCK"&&f.mode!=="(EXPRESSION)"?(U(),f.mode==="OBJECT"&&o==="}"?q():R()):f.mode==="OBJECT"?(U(),q()):(U(),R());break;case"TK_OPERATOR":var rt=!0,it=!0;if(Q(o)){R(),U();break}if(i==="*"&&s==="TK_DOT"&&!u.match(/^\d+$/)){U();break}if(i===":"&&f.in_case){f.case_body=!0,z(),U(),q(),f.in_case=!1;break}if(i==="::"){U();break}G(i,["--","++","!"])||G(i,["-","+"])&&(G(s,["TK_START_BLOCK","TK_START_EXPR","TK_EQUALS","TK_OPERATOR"])||G(o,m))?(rt=!1,it=!1,o===";"&&$(f.mode)&&(rt=!0),s==="TK_WORD"&&G(o,m)&&(rt=!0),f.mode==="BLOCK"&&(o==="{"||o===";")&&q()):i===":"?f.ternary_depth===0?(f.mode==="BLOCK"&&(f.mode="OBJECT"),rt=!1):f.ternary_depth-=1:i==="?"&&(f.ternary_depth+=1),rt&&R(),U(),it&&R();break;case"TK_BLOCK_COMMENT":var st=F(i),ot;if(K(st.slice(1),"*")){q(),r.push(st[0]);for(ot=1;ot<st.length;ot++)q(),r.push(" "),r.push(j(st[ot]))}else{st.length>1?q():s==="TK_END_BLOCK"?q():R();for(ot=0;ot<st.length;ot++)r.push(st[ot]),r.push("\n")}Y("\n")!=="\n"&&q();break;case"TK_INLINE_COMMENT":R(),U(),$(f.mode)?R():I();break;case"TK_COMMENT":o===","&&!E&&B(!0),s!=="TK_COMMENT"&&(E?q():R()),U(),q();break;case"TK_UNKNOWN":U()}u=o,s=b,o=i}var ut=T+r.join("").replace(/[\r\n ]+$/,"");return ut}function setupConfig(e){var t=gbst.namespace("gbst.loan.app.loancalculator.translations");t.en=e}(function(){function C(e,t,n){if(e===t)return e!==0||1/e==1/t;if(e==null||t==null)return e===t;e._chain&&(e=e._wrapped),t._chain&&(t=t._wrapped);if(e.isEqual&&S.isFunction(e.isEqual))return e.isEqual(t);if(t.isEqual&&S.isFunction(t.isEqual))return t.isEqual(e);var r=a.call(e);if(r!=a.call(t))return!1;switch(r){case"[object String]":return e==String(t);case"[object Number]":return e!=+e?t!=+t:e==0?1/e==1/t:e==+t;case"[object Date]":case"[object Boolean]":return+e==+t;case"[object RegExp]":return e.source==t.source&&e.global==t.global&&e.multiline==t.multiline&&e.ignoreCase==t.ignoreCase}if(typeof e!="object"||typeof t!="object")return!1;var i=n.length;while(i--)if(n[i]==e)return!0;n.push(e);var s=0,o=!0;if(r=="[object Array]"){s=e.length,o=s==t.length;if(o)while(s--)if(!(o=s in e==s in t&&C(e[s],t[s],n)))break}else{if("constructor"in e!="constructor"in t||e.constructor!=t.constructor)return!1;for(var u in e)if(S.has(e,u)){s++;if(!(o=S.has(t,u)&&C(e[u],t[u],n)))break}if(o){for(u in t)if(S.has(t,u)&&!(s--))break;o=!s}}return n.pop(),o}var e=this,t=e._,n={},r=Array.prototype,i=Object.prototype,s=Function.prototype,o=r.slice,u=r.unshift,a=i.toString,f=i.hasOwnProperty,l=r.forEach,c=r.map,h=r.reduce,p=r.reduceRight,d=r.filter,v=r.every,m=r.some,g=r.indexOf,y=r.lastIndexOf,b=Array.isArray,w=Object.keys,E=s.bind,S=function(e){return new P(e)};typeof exports!="undefined"?(typeof module!="undefined"&&module.exports&&(exports=module.exports=S),exports._=S):e._=S,S.VERSION="1.3.3";var x=S.each=S.forEach=function(e,t,r){if(e==null)return;if(l&&e.forEach===l)e.forEach(t,r);else if(e.length===+e.length){for(var i=0,s=e.length;i<s;i++)if(i in e&&t.call(r,e[i],i,e)===n)return}else for(var o in e)if(S.has(e,o)&&t.call(r,e[o],o,e)===n)return};S.map=S.collect=function(e,t,n){var r=[];return e==null?r:c&&e.map===c?e.map(t,n):(x(e,function(e,i,s){r[r.length]=t.call(n,e,i,s)}),e.length===+e.length&&(r.length=e.length),r)},S.reduce=S.foldl=S.inject=function(e,t,n,r){var i=arguments.length>2;e==null&&(e=[]);if(h&&e.reduce===h)return r&&(t=S.bind(t,r)),i?e.reduce(t,n):e.reduce(t);x(e,function(e,s,o){i?n=t.call(r,n,e,s,o):(n=e,i=!0)});if(!i)throw new TypeError("Reduce of empty array with no initial value");return n},S.reduceRight=S.foldr=function(e,t,n,r){var i=arguments.length>2;e==null&&(e=[]);if(p&&e.reduceRight===p)return r&&(t=S.bind(t,r)),i?e.reduceRight(t,n):e.reduceRight(t);var s=S.toArray(e).reverse();return r&&!i&&(t=S.bind(t,r)),i?S.reduce(s,t,n,r):S.reduce(s,t)},S.find=S.detect=function(e,t,n){var r;return T(e,function(e,i,s){if(t.call(n,e,i,s))return r=e,!0}),r},S.filter=S.select=function(e,t,n){var r=[];return e==null?r:d&&e.filter===d?e.filter(t,n):(x(e,function(e,i,s){t.call(n,e,i,s)&&(r[r.length]=e)}),r)},S.reject=function(e,t,n){var r=[];return e==null?r:(x(e,function(e,i,s){t.call(n,e,i,s)||(r[r.length]=e)}),r)},S.every=S.all=function(e,t,r){var i=!0;return e==null?i:v&&e.every===v?e.every(t,r):(x(e,function(e,s,o){if(!(i=i&&t.call(r,e,s,o)))return n}),!!i)};var T=S.some=S.any=function(e,t,r){t||(t=S.identity);var i=!1;return e==null?i:m&&e.some===m?e.some(t,r):(x(e,function(e,s,o){if(i||(i=t.call(r,e,s,o)))return n}),!!i)};S.include=S.contains=function(e,t){var n=!1;return e==null?n:g&&e.indexOf===g?e.indexOf(t)!=-1:(n=T(e,function(e){return e===t}),n)},S.invoke=function(e,t){var n=o.call(arguments,2);return S.map(e,function(e){return(S.isFunction(t)?t||e:e[t]).apply(e,n)})},S.pluck=function(e,t){return S.map(e,function(e){return e[t]})},S.max=function(e,t,n){if(!t&&S.isArray(e)&&e[0]===+e[0])return Math.max.apply(Math,e);if(!t&&S.isEmpty(e))return-Infinity;var r={computed:-Infinity};return x(e,function(e,i,s){var o=t?t.call(n,e,i,s):e;o>=r.computed&&(r={value:e,computed:o})}),r.value},S.min=function(e,t,n){if(!t&&S.isArray(e)&&e[0]===+e[0])return Math.min.apply(Math,e);if(!t&&S.isEmpty(e))return Infinity;var r={computed:Infinity};return x(e,function(e,i,s){var o=t?t.call(n,e,i,s):e;o<r.computed&&(r={value:e,computed:o})}),r.value},S.shuffle=function(e){var t=[],n;return x(e,function(e,r,i){n=Math.floor(Math.random()*(r+1)),t[r]=t[n],t[n]=e}),t},S.sortBy=function(e,t,n){var r=S.isFunction(t)?t:function(e){return e[t]};return S.pluck(S.map(e,function(e,t,i){return{value:e,criteria:r.call(n,e,t,i)}}).sort(function(e,t){var n=e.criteria,r=t.criteria;return n===void 0?1:r===void 0?-1:n<r?-1:n>r?1:0}),"value")},S.groupBy=function(e,t){var n={},r=S.isFunction(t)?t:function(e){return e[t]};return x(e,function(e,t){var i=r(e,t);(n[i]||(n[i]=[])).push(e)}),n},S.sortedIndex=function(e,t,n){n||(n=S.identity);var r=0,i=e.length;while(r<i){var s=r+i>>1;n(e[s])<n(t)?r=s+1:i=s}return r},S.toArray=function(e){return e?S.isArray(e)?o.call(e):S.isArguments(e)?o.call(e):e.toArray&&S.isFunction(e.toArray)?e.toArray():S.values(e):[]},S.size=function(e){return S.isArray(e)?e.length:S.keys(e).length},S.first=S.head=S.take=function(e,t,n){return t!=null&&!n?o.call(e,0,t):e[0]},S.initial=function(e,t,n){return o.call(e,0,e.length-(t==null||n?1:t))},S.last=function(e,t,n){return t!=null&&!n?o.call(e,Math.max(e.length-t,0)):e[e.length-1]},S.rest=S.tail=function(e,t,n){return o.call(e,t==null||n?1:t)},S.compact=function(e){return S.filter(e,function(e){return!!e})},S.flatten=function(e,t){return S.reduce(e,function(e,n){return S.isArray(n)?e.concat(t?n:S.flatten(n)):(e[e.length]=n,e)},[])},S.without=function(e){return S.difference(e,o.call(arguments,1))},S.uniq=S.unique=function(e,t,n){var r=n?S.map(e,n):e,i=[];return e.length<3&&(t=!0),S.reduce(r,function(n,r,s){if(t?S.last(n)!==r||!n.length:!S.include(n,r))n.push(r),i.push(e[s]);return n},[]),i},S.union=function(){return S.uniq(S.flatten(arguments,!0))},S.intersection=S.intersect=function(e){var t=o.call(arguments,1);return S.filter(S.uniq(e),function(e){return S.every(t,function(t){return S.indexOf(t,e)>=0})})},S.difference=function(e){var t=S.flatten(o.call(arguments,1),!0);return S.filter(e,function(e){return!S.include(t,e)})},S.zip=function(){var e=o.call(arguments),t=S.max(S.pluck(e,"length")),n=new Array(t);for(var r=0;r<t;r++)n[r]=S.pluck(e,""+r);return n},S.indexOf=function(e,t,n){if(e==null)return-1;var r,i;if(n)return r=S.sortedIndex(e,t),e[r]===t?r:-1;if(g&&e.indexOf===g)return e.indexOf(t);for(r=0,i=e.length;r<i;r++)if(r in e&&e[r]===t)return r;return-1},S.lastIndexOf=function(e,t){if(e==null)return-1;if(y&&e.lastIndexOf===y)return e.lastIndexOf(t);var n=e.length;while(n--)if(n in e&&e[n]===t)return n;return-1},S.range=function(e,t,n){arguments.length<=1&&(t=e||0,e=0),n=arguments[2]||1;var r=Math.max(Math.ceil((t-e)/n),0),i=0,s=new Array(r);while(i<r)s[i++]=e,e+=n;return s};var N=function(){};S.bind=function(t,n){var r,i;if(t.bind===E&&E)return E.apply(t,o.call(arguments,1));if(!S.isFunction(t))throw new TypeError;return i=o.call(arguments,2),r=function(){if(this instanceof r){N.prototype=t.prototype;var e=new N,s=t.apply(e,i.concat(o.call(arguments)));return Object(s)===s?s:e}return t.apply(n,i.concat(o.call(arguments)))}},S.bindAll=function(e){var t=o.call(arguments,1);return t.length==0&&(t=S.functions(e)),x(t,function(t){e[t]=S.bind(e[t],e)}),e},S.memoize=function(e,t){var n={};return t||(t=S.identity),function(){var r=t.apply(this,arguments);return S.has(n,r)?n[r]:n[r]=e.apply(this,arguments)}},S.delay=function(e,t){var n=o.call(arguments,2);return setTimeout(function(){return e.apply(null,n)},t)},S.defer=function(e){return S.delay.apply(S,[e,1].concat(o.call(arguments,1)))},S.throttle=function(e,t){var n,r,i,s,o,u,a=S.debounce(function(){o=s=!1},t);return function(){n=this,r=arguments;var f=function(){i=null,o&&e.apply(n,r),a()};return i||(i=setTimeout(f,t)),s?o=!0:u=e.apply(n,r),a(),s=!0,u}},S.debounce=function(e,t,n){var r;return function(){var i=this,s=arguments,o=function(){r=null,n||e.apply(i,s)};n&&!r&&e.apply(i,s),clearTimeout(r),r=setTimeout(o,t)}},S.once=function(e){var t=!1,n;return function(){return t?n:(t=!0,n=e.apply(this,arguments))}},S.wrap=function(e,t){return function(){var n=[e].concat(o.call(arguments,0));return t.apply(this,n)}},S.compose=function(){var e=arguments;return function(){var t=arguments;for(var n=e.length-1;n>=0;n--)t=[e[n].apply(this,t)];return t[0]}},S.after=function(e,t){return e<=0?t():function(){if(--e<1)return t.apply(this,arguments)}},S.keys=w||function(e){if(e!==Object(e))throw new TypeError("Invalid object");var t=[];for(var n in e)S.has(e,n)&&(t[t.length]=n);return t},S.values=function(e){return S.map(e,S.identity)},S.functions=S.methods=function(e){var t=[];for(var n in e)S.isFunction(e[n])&&t.push(n);return t.sort()},S.extend=function(e){return x(o.call(arguments,1),function(t){for(var n in t)e[n]=t[n]}),e},S.pick=function(e){var t={};return x(S.flatten(o.call(arguments,1)),function(n){n in e&&(t[n]=e[n])}),t},S.defaults=function(e){return x(o.call(arguments,1),function(t){for(var n in t)e[n]==null&&(e[n]=t[n])}),e},S.clone=function(e){return S.isObject(e)?S.isArray(e)?e.slice():S.extend({},e):e},S.tap=function(e,t){return t(e),e},S.isEqual=function(e,t){return C(e,t,[])},S.isEmpty=function(e){if(e==null)return!0;if(S.isArray(e)||S.isString(e))return e.length===0;for(var t in e)if(S.has(e,t))return!1;return!0},S.isElement=function(e){return!!e&&e.nodeType==1},S.isArray=b||function(e){return a.call(e)=="[object Array]"},S.isObject=function(e){return e===Object(e)},S.isArguments=function(e){return a.call(e)=="[object Arguments]"},S.isArguments(arguments)||(S.isArguments=function(e){return!!e&&!!S.has(e,"callee")}),S.isFunction=function(e){return a.call(e)=="[object Function]"},S.isString=function(e){return a.call(e)=="[object String]"},S.isNumber=function(e){return a.call(e)=="[object Number]"},S.isFinite=function(e){return S.isNumber(e)&&isFinite(e)},S.isNaN=function(e){return e!==e},S.isBoolean=function(e){return e===!0||e===!1||a.call(e)=="[object Boolean]"},S.isDate=function(e){return a.call(e)=="[object Date]"},S.isRegExp=function(e){return a.call(e)=="[object RegExp]"},S.isNull=function(e){return e===null},S.isUndefined=function(e){return e===void 0},S.has=function(e,t){return f.call(e,t)},S.noConflict=function(){return e._=t,this},S.identity=function(e){return e},S.times=function(e,t,n){for(var r=0;r<e;r++)t.call(n,r)},S.escape=function(e){return(""+e).replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#x27;").replace(/\//g,"&#x2F;")},S.result=function(e,t){if(e==null)return null;var n=e[t];return S.isFunction(n)?n.call(e):n},S.mixin=function(e){x(S.functions(e),function(t){B(t,S[t]=e[t])})};var k=0;S.uniqueId=function(e){var t=k++;return e?e+t:t},S.templateSettings={evaluate:/<%([\s\S]+?)%>/g,interpolate:/<%=([\s\S]+?)%>/g,escape:/<%-([\s\S]+?)%>/g};var L=/.^/,A={"\\":"\\","'":"'",r:"\r",n:"\n",t:"	",u2028:"\u2028",u2029:"\u2029"};for(var O in A)A[A[O]]=O;var M=/\\|'|\r|\n|\t|\u2028|\u2029/g,_=/\\(\\|'|r|n|t|u2028|u2029)/g,D=function(e){return e.replace(_,function(e,t){return A[t]})};S.template=function(e,t,n){n=S.defaults(n||{},S.templateSettings);var r="__p+='"+e.replace(M,function(e){return"\\"+A[e]}).replace(n.escape||L,function(e,t){return"'+\n_.escape("+D(t)+")+\n'"}).replace(n.interpolate||L,function(e,t){return"'+\n("+D(t)+")+\n'"}).replace(n.evaluate||L,function(e,t){return"';\n"+D(t)+"\n;__p+='"})+"';\n";n.variable||(r="with(obj||{}){\n"+r+"}\n"),r="var __p='';var print=function(){__p+=Array.prototype.join.call(arguments, '')};\n"+r+"return __p;\n";var i=new Function(n.variable||"obj","_",r);if(t)return i(t,S);var s=function(e){return i.call(this,e,S)};return s.source="function("+(n.variable||"obj")+"){\n"+r+"}",s},S.chain=function(e){return S(e).chain()};var P=function(e){this._wrapped=e};S.prototype=P.prototype;var H=function(e,t){return t?S(e).chain():e},B=function(e,t){P.prototype[e]=function(){var e=o.call(arguments);return u.call(e,this._wrapped),H(t.apply(S,e),this._chain)}};S.mixin(S),x(["pop","push","reverse","shift","sort","splice","unshift"],function(e){var t=r[e];P.prototype[e]=function(){var n=this._wrapped;t.apply(n,arguments);var r=n.length;return(e=="shift"||e=="splice")&&r===0&&delete n[0],H(n,this._chain)}}),x(["concat","join","slice"],function(e){var t=r[e];P.prototype[e]=function(){return H(t.apply(this._wrapped,arguments),this._chain)}}),P.prototype.chain=function(){return this._chain=!0,this},P.prototype.value=function(){return this._wrapped}}).call(this),function(){var e=this,t=e.Backbone,n=Array.prototype.slice,r=Array.prototype.splice,i;typeof exports!="undefined"?i=exports:i=e.Backbone={},i.VERSION="0.9.2";var s=e._;!s&&typeof require!="undefined"&&(s=require("underscore"));var o=e.jQuery||e.Zepto||e.ender;i.setDomLibrary=function(e){o=e},i.noConflict=function(){return e.Backbone=t,this},i.emulateHTTP=!1,i.emulateJSON=!1;var u=/\s+/,a=i.Events={on:function(e,t,n){var r,i,s,o,a;if(!t)return this;e=e.split(u),r=this._callbacks||(this._callbacks={});while(i=e.shift())a=r[i],s=a?a.tail:{},s.next=o={},s.context=n,s.callback=t,r[i]={tail:o,next:a?a.next:s};return this},off:function(e,t,n){var r,i,o,a,f,l;if(!(i=this._callbacks))return;if(!(e||t||n))return delete this._callbacks,this;e=e?e.split(u):s.keys(i);while(r=e.shift()){o=i[r],delete i[r];if(!o||!t&&!n)continue;a=o.tail;while((o=o.next)!==a)f=o.callback,l=o.context,(t&&f!==t||n&&l!==n)&&this.on(r,f,l)}return this},trigger:function(e){var t,r,i,s,o,a,f;if(!(i=this._callbacks))return this;a=i.all,e=e.split(u),f=n.call(arguments,1);while(t=e.shift()){if(r=i[t]){s=r.tail;while((r=r.next)!==s)r.callback.apply(r.context||this,f)}if(r=a){s=r.tail,o=[t].concat(f);while((r=r.next)!==s)r.callback.apply(r.context||this,o)}}return this}};a.bind=a.on,a.unbind=a.off;var f=i.Model=function(e,t){var n;e||(e={}),t&&t.parse&&(e=this.parse(e));if(n=C(this,"defaults"))e=s.extend({},n,e);t&&t.collection&&(this.collection=t.collection),this.attributes={},this._escapedAttributes={},this.cid=s.uniqueId("c"),this.changed={},this._silent={},this._pending={},this.set(e,{silent:!0}),this.changed={},this._silent={},this._pending={},this._previousAttributes=s.clone(this.attributes),this.initialize.apply(this,arguments)};s.extend(f.prototype,a,{changed:null,_silent:null,_pending:null,idAttribute:"id",initialize:function(){},toJSON:function(e){return s.clone(this.attributes)},get:function(e){return this.attributes[e]},escape:function(e){var t;if(t=this._escapedAttributes[e])return t;var n=this.get(e);return this._escapedAttributes[e]=s.escape(n==null?"":""+n)},has:function(e){return this.get(e)!=null},set:function(e,t,n){var r,i,o;s.isObject(e)||e==null?(r=e,n=t):(r={},r[e]=t),n||(n={});if(!r)return this;r instanceof f&&(r=r.attributes);if(n.unset)for(i in r)r[i]=void 0;if(!this._validate(r,n))return!1;this.idAttribute in r&&(this.id=r[this.idAttribute]);var u=n.changes={},a=this.attributes,l=this._escapedAttributes,c=this._previousAttributes||{};for(i in r){o=r[i];if(!s.isEqual(a[i],o)||n.unset&&s.has(a,i))delete l[i],(n.silent?this._silent:u)[i]=!0;n.unset?delete a[i]:a[i]=o,!s.isEqual(c[i],o)||s.has(a,i)!=s.has(c,i)?(this.changed[i]=o,n.silent||(this._pending[i]=!0)):(delete this.changed[i],delete this._pending[i])}return n.silent||this.change(n),this},unset:function(e,t){return(t||(t={})).unset=!0,this.set(e,null,t)},clear:function(e){return(e||(e={})).unset=!0,this.set(s.clone(this.attributes),e)},fetch:function(e){e=e?s.clone(e):{};var t=this,n=e.success;return e.success=function(r,i,s){if(!t.set(t.parse(r,s),e))return!1;n&&n(t,r)},e.error=i.wrapError(e.error,t,e),(this.sync||i.sync).call(this,"read",this,e)},save:function(e,t,n){var r,o;s.isObject(e)||e==null?(r=e,n=t):(r={},r[e]=t),n=n?s.clone(n):{};if(n.wait){if(!this._validate(r,n))return!1;o=s.clone(this.attributes)}var u=s.extend({},n,{silent:!0});if(r&&!this.set(r,n.wait?u:n))return!1;var a=this,f=n.success;n.success=function(e,t,i){var o=a.parse(e,i);n.wait&&(delete n.wait,o=s.extend(r||{},o));if(!a.set(o,n))return!1;f?f(a,e):a.trigger("sync",a,e,n)},n.error=i.wrapError(n.error,a,n);var l=this.isNew()?"create":"update",c=(this.sync||i.sync).call(this,l,this,n);return n.wait&&this.set(o,u),c},destroy:function(e){e=e?s.clone(e):{};var t=this,n=e.success,r=function(){t.trigger("destroy",t,t.collection,e)};if(this.isNew())return r(),!1;e.success=function(i){e.wait&&r(),n?n(t,i):t.trigger("sync",t,i,e)},e.error=i.wrapError(e.error,t,e);var o=(this.sync||i.sync).call(this,"delete",this,e);return e.wait||r(),o},url:function(){var e=C(this,"urlRoot")||C(this.collection,"url")||k();return this.isNew()?e:e+(e.charAt(e.length-1)=="/"?"":"/")+encodeURIComponent(this.id)},parse:function(e,t){return e},clone:function(){return new this.constructor(this.attributes)},isNew:function(){return this.id==null},change:function(e){e||(e={});var t=this._changing;this._changing=!0;for(var n in this._silent)this._pending[n]=!0;var r=s.extend({},e.changes,this._silent);this._silent={};for(var n in r)this.trigger("change:"+n,this,this.get(n),e);if(t)return this;while(!s.isEmpty(this._pending)){this._pending={},this.trigger("change",this,e);for(var n in this.changed){if(this._pending[n]||this._silent[n])continue;delete this.changed[n]}this._previousAttributes=s.clone(this.attributes)}return this._changing=!1,this},hasChanged:function(e){return arguments.length?s.has(this.changed,e):!s.isEmpty(this.changed)},changedAttributes:function(e){if(!e)return this.hasChanged()?s.clone(this.changed):!1;var t,n=!1,r=this._previousAttributes;for(var i in e){if(s.isEqual(r[i],t=e[i]))continue;(n||(n={}))[i]=t}return n},previous:function(e){return!arguments.length||!this._previousAttributes?null:this._previousAttributes[e]},previousAttributes:function(){return s.clone(this._previousAttributes)},isValid:function(){return!this.validate(this.attributes)},_validate:function(e,t){if(t.silent||!this.validate)return!0;e=s.extend({},this.attributes,e);var n=this.validate(e,t);return n?(t&&t.error?t.error(this,n,t):this.trigger("error",this,n,t),!1):!0}});var l=i.Collection=function(e,t){t||(t={}),t.model&&(this.model=t.model),t.comparator&&(this.comparator=t.comparator),this._reset(),this.initialize.apply(this,arguments),e&&this.reset(e,{silent:!0,parse:t.parse})};s.extend(l.prototype,a,{model:f,initialize:function(){},toJSON:function(e){return this.map(function(t){return t.toJSON(e)})},add:function(e,t){var n,i,o,u,a,f,l={},c={},h=[];t||(t={}),e=s.isArray(e)?e.slice():[e];for(n=0,o=e.length;n<o;n++){if(!(u=e[n]=this._prepareModel(e[n],t)))throw new Error("Can't add an invalid model to a collection");a=u.cid,f=u.id;if(l[a]||this._byCid[a]||f!=null&&(c[f]||this._byId[f])){h.push(n);continue}l[a]=c[f]=u}n=h.length;while(n--)e.splice(h[n],1);for(n=0,o=e.length;n<o;n++)(u=e[n]).on("all",this._onModelEvent,this),this._byCid[u.cid]=u,u.id!=null&&(this._byId[u.id]=u);this.length+=o,i=t.at!=null?t.at:this.models.length,r.apply(this.models,[i,0].concat(e)),this.comparator&&this.sort({silent:!0});if(t.silent)return this;for(n=0,o=this.models.length;n<o;n++){if(!l[(u=this.models[n]).cid])continue;t.index=n,u.trigger("add",u,this,t)}return this},remove:function(e,t){var n,r,i,o;t||(t={}),e=s.isArray(e)?e.slice():[e];for(n=0,r=e.length;n<r;n++){o=this.getByCid(e[n])||this.get(e[n]);if(!o)continue;delete this._byId[o.id],delete this._byCid[o.cid],i=this.indexOf(o),this.models.splice(i,1),this.length--,t.silent||(t.index=i,o.trigger("remove",o,this,t)),this._removeReference(o)}return this},push:function(e,t){return e=this._prepareModel(e,t),this.add(e,t),e},pop:function(e){var t=this.at(this.length-1);return this.remove(t,e),t},unshift:function(e,t){return e=this._prepareModel(e,t),this.add(e,s.extend({at:0},t)),e},shift:function(e){var t=this.at(0);return this.remove(t,e),t},get:function(e){return e==null?void 0:this._byId[e.id!=null?e.id:e]},getByCid:function(e){return e&&this._byCid[e.cid||e]},at:function(e){return this.models[e]},where:function(e){return s.isEmpty(e)?[]:this.filter(function(t){for(var n in e)if(e[n]!==t.get(n))return!1;return!0})},sort:function(e){e||(e={});if(!this.comparator)throw new Error("Cannot sort a set without a comparator");var t=s.bind(this.comparator,this);return this.comparator.length==1?this.models=this.sortBy(t):this.models.sort(t),e.silent||this.trigger("reset",this,e),this},pluck:function(e){return s.map(this.models,function(t){return t.get(e)})},reset:function(e,t){e||(e=[]),t||(t={});for(var n=0,r=this.models.length;n<r;n++)this._removeReference(this.models[n]);return this._reset(),this.add(e,s.extend({silent:!0},t)),t.silent||this.trigger("reset",this,t),this},fetch:function(e){e=e?s.clone(e):{},e.parse===undefined&&(e.parse=!0);var t=this,n=
e.success;return e.success=function(r,i,s){t[e.add?"add":"reset"](t.parse(r,s),e),n&&n(t,r)},e.error=i.wrapError(e.error,t,e),(this.sync||i.sync).call(this,"read",this,e)},create:function(e,t){var n=this;t=t?s.clone(t):{},e=this._prepareModel(e,t);if(!e)return!1;t.wait||n.add(e,t);var r=t.success;return t.success=function(i,s,o){t.wait&&n.add(i,t),r?r(i,s):i.trigger("sync",e,s,t)},e.save(null,t),e},parse:function(e,t){return e},chain:function(){return s(this.models).chain()},_reset:function(e){this.length=0,this.models=[],this._byId={},this._byCid={}},_prepareModel:function(e,t){t||(t={});if(e instanceof f)e.collection||(e.collection=this);else{var n=e;t.collection=this,e=new this.model(n,t),e._validate(e.attributes,t)||(e=!1)}return e},_removeReference:function(e){this==e.collection&&delete e.collection,e.off("all",this._onModelEvent,this)},_onModelEvent:function(e,t,n,r){if((e=="add"||e=="remove")&&n!=this)return;e=="destroy"&&this.remove(t,r),t&&e==="change:"+t.idAttribute&&(delete this._byId[t.previous(t.idAttribute)],this._byId[t.id]=t),this.trigger.apply(this,arguments)}});var c=["forEach","each","map","reduce","reduceRight","find","detect","filter","select","reject","every","all","some","any","include","contains","invoke","max","min","sortBy","sortedIndex","toArray","size","first","initial","rest","last","without","indexOf","shuffle","lastIndexOf","isEmpty","groupBy"];s.each(c,function(e){l.prototype[e]=function(){return s[e].apply(s,[this.models].concat(s.toArray(arguments)))}});var h=i.Router=function(e){e||(e={}),e.routes&&(this.routes=e.routes),this._bindRoutes(),this.initialize.apply(this,arguments)},p=/:\w+/g,d=/\*\w+/g,v=/[-[\]{}()+?.,\\^$|#\s]/g;s.extend(h.prototype,a,{initialize:function(){},route:function(e,t,n){return i.history||(i.history=new m),s.isRegExp(e)||(e=this._routeToRegExp(e)),n||(n=this[t]),i.history.route(e,s.bind(function(r){var s=this._extractParameters(e,r);n&&n.apply(this,s),this.trigger.apply(this,["route:"+t].concat(s)),i.history.trigger("route",this,t,s)},this)),this},navigate:function(e,t){i.history.navigate(e,t)},_bindRoutes:function(){if(!this.routes)return;var e=[];for(var t in this.routes)e.unshift([t,this.routes[t]]);for(var n=0,r=e.length;n<r;n++)this.route(e[n][0],e[n][1],this[e[n][1]])},_routeToRegExp:function(e){return e=e.replace(v,"\\$&").replace(p,"([^/]+)").replace(d,"(.*?)"),new RegExp("^"+e+"$")},_extractParameters:function(e,t){return e.exec(t).slice(1)}});var m=i.History=function(){this.handlers=[],s.bindAll(this,"checkUrl")},g=/^[#\/]/,y=/msie [\w.]+/;m.started=!1,s.extend(m.prototype,a,{interval:50,getHash:function(e){var t=e?e.location:window.location,n=t.href.match(/#(.*)$/);return n?n[1]:""},getFragment:function(e,t){if(e==null)if(this._hasPushState||t){e=window.location.pathname;var n=window.location.search;n&&(e+=n)}else e=this.getHash();return e.indexOf(this.options.root)||(e=e.substr(this.options.root.length)),e.replace(g,"")},start:function(e){if(m.started)throw new Error("Backbone.history has already been started");m.started=!0,this.options=s.extend({},{root:"/"},this.options,e),this._wantsHashChange=this.options.hashChange!==!1,this._wantsPushState=!!this.options.pushState,this._hasPushState=!!(this.options.pushState&&window.history&&window.history.pushState);var t=this.getFragment(),n=document.documentMode,r=y.exec(navigator.userAgent.toLowerCase())&&(!n||n<=7);r&&(this.iframe=o('<iframe src="javascript:0" tabindex="-1" />').hide().appendTo("body")[0].contentWindow,this.navigate(t)),this._hasPushState?o(window).bind("popstate",this.checkUrl):this._wantsHashChange&&"onhashchange"in window&&!r?o(window).bind("hashchange",this.checkUrl):this._wantsHashChange&&(this._checkUrlInterval=setInterval(this.checkUrl,this.interval)),this.fragment=t;var i=window.location,u=i.pathname==this.options.root;if(this._wantsHashChange&&this._wantsPushState&&!this._hasPushState&&!u)return this.fragment=this.getFragment(null,!0),window.location.replace(this.options.root+"#"+this.fragment),!0;this._wantsPushState&&this._hasPushState&&u&&i.hash&&(this.fragment=this.getHash().replace(g,""),window.history.replaceState({},document.title,i.protocol+"//"+i.host+this.options.root+this.fragment));if(!this.options.silent)return this.loadUrl()},stop:function(){o(window).unbind("popstate",this.checkUrl).unbind("hashchange",this.checkUrl),clearInterval(this._checkUrlInterval),m.started=!1},route:function(e,t){this.handlers.unshift({route:e,callback:t})},checkUrl:function(e){var t=this.getFragment();t==this.fragment&&this.iframe&&(t=this.getFragment(this.getHash(this.iframe)));if(t==this.fragment)return!1;this.iframe&&this.navigate(t),this.loadUrl()||this.loadUrl(this.getHash())},loadUrl:function(e){var t=this.fragment=this.getFragment(e),n=s.any(this.handlers,function(e){if(e.route.test(t))return e.callback(t),!0});return n},navigate:function(e,t){if(!m.started)return!1;if(!t||t===!0)t={trigger:t};var n=(e||"").replace(g,"");if(this.fragment==n)return;this._hasPushState?(n.indexOf(this.options.root)!=0&&(n=this.options.root+n),this.fragment=n,window.history[t.replace?"replaceState":"pushState"]({},document.title,n)):this._wantsHashChange?(this.fragment=n,this._updateHash(window.location,n,t.replace),this.iframe&&n!=this.getFragment(this.getHash(this.iframe))&&(t.replace||this.iframe.document.open().close(),this._updateHash(this.iframe.location,n,t.replace))):window.location.assign(this.options.root+e),t.trigger&&this.loadUrl(e)},_updateHash:function(e,t,n){n?e.replace(e.toString().replace(/(javascript:|#).*$/,"")+"#"+t):e.hash=t}});var b=i.View=function(e){this.cid=s.uniqueId("view"),this._configure(e||{}),this._ensureElement(),this.initialize.apply(this,arguments),this.delegateEvents()},w=/^(\S+)\s*(.*)$/,E=["model","collection","el","id","attributes","className","tagName"];s.extend(b.prototype,a,{tagName:"div",$:function(e){return this.$el.find(e)},initialize:function(){},render:function(){return this},remove:function(){return this.$el.remove(),this},make:function(e,t,n){var r=document.createElement(e);return t&&o(r).attr(t),n&&o(r).html(n),r},setElement:function(e,t){return this.$el&&this.undelegateEvents(),this.$el=e instanceof o?e:o(e),this.el=this.$el[0],t!==!1&&this.delegateEvents(),this},delegateEvents:function(e){if(!e&&!(e=C(this,"events")))return;this.undelegateEvents();for(var t in e){var n=e[t];s.isFunction(n)||(n=this[e[t]]);if(!n)throw new Error('Method "'+e[t]+'" does not exist');var r=t.match(w),i=r[1],o=r[2];n=s.bind(n,this),i+=".delegateEvents"+this.cid,o===""?this.$el.bind(i,n):this.$el.delegate(o,i,n)}},undelegateEvents:function(){this.$el.unbind(".delegateEvents"+this.cid)},_configure:function(e){this.options&&(e=s.extend({},this.options,e));for(var t=0,n=E.length;t<n;t++){var r=E[t];e[r]&&(this[r]=e[r])}this.options=e},_ensureElement:function(){if(!this.el){var e=C(this,"attributes")||{};this.id&&(e.id=this.id),this.className&&(e["class"]=this.className),this.setElement(this.make(this.tagName,e),!1)}else this.setElement(this.el,!1)}});var S=function(e,t){var n=N(this,e,t);return n.extend=this.extend,n};f.extend=l.extend=h.extend=b.extend=S;var x={create:"POST",update:"PUT","delete":"DELETE",read:"GET"};i.sync=function(e,t,n){var r=x[e];n||(n={});var u={type:r,dataType:"json"};return n.url||(u.url=C(t,"url")||k()),!n.data&&t&&(e=="create"||e=="update")&&(u.contentType="application/json",u.data=JSON.stringify(t.toJSON())),i.emulateJSON&&(u.contentType="application/x-www-form-urlencoded",u.data=u.data?{model:u.data}:{}),i.emulateHTTP&&(r==="PUT"||r==="DELETE")&&(i.emulateJSON&&(u.data._method=r),u.type="POST",u.beforeSend=function(e){e.setRequestHeader("X-HTTP-Method-Override",r)}),u.type!=="GET"&&!i.emulateJSON&&(u.processData=!1),o.ajax(s.extend(u,n))},i.wrapError=function(e,t,n){return function(r,i){i=r===t?i:r,e?e(t,i,n):t.trigger("error",t,i,n)}};var T=function(){},N=function(e,t,n){var r;return t&&t.hasOwnProperty("constructor")?r=t.constructor:r=function(){e.apply(this,arguments)},s.extend(r,e),T.prototype=e.prototype,r.prototype=new T,t&&s.extend(r.prototype,t),n&&s.extend(r,n),r.prototype.constructor=r,r.__super__=e.prototype,r},C=function(e,t){return!e||!e[t]?null:s.isFunction(e[t])?e[t]():e[t]},k=function(){throw new Error('A "url" property or function must be specified')}}.call(this),function(){window.bnp={};var e=function(){return((1+Math.random())*65536|0).toString(16).substring(1)},t=function(){return e()+e()+"-"+e()+"-"+e()+"-"+e()+"-"+e()+e()+e()};bnp.NoPersistence=function(e){this.id=t(),this.data={},this.maxSize=e},_.extend(bnp.NoPersistence.prototype,{create:function(e){if(!_.isUndefined(this.maxSize)&&_.size(this.data)>this.maxSize)throw"Max collection size exceeded";return e.id||(e.id=e.attributes.id=t()),this.data[e.id]=_.extend({},e),e},find:function(e){return this.data[e.id]},findAll:function(){return _.values(this.data)},update:function(e){return this.data[e.id]=_.extend({},e),e},destroy:function(e){return delete this.data[e.id],e}}),Backbone.sync=function(e,t,n,r){typeof n=="function"&&(n={success:n,error:r});var i,s=t.collection||t,o=s.noPersistence;_.isUndefined(o)&&(s.noPersistence=new bnp.NoPersistence,o=s.noPersistence);switch(e){case"read":i=t.id?o.find(t):o.findAll();break;case"create":i=o.create(t);break;case"update":i=o.update(t);break;case"delete":i=o.destroy(t)}i?n.success(i):n.error("Record not found")}}(),function(e){"use strict";var t,n,r;typeof window=="undefined"?(t=require("underscore"),n=require("backbone"),r=module.exports=n):(t=window._,n=window.Backbone,r=window),n.Relational={showWarnings:!0},n.Semaphore={_permitsAvailable:null,_permitsUsed:0,acquire:function(){if(this._permitsAvailable&&this._permitsUsed>=this._permitsAvailable)throw new Error("Max permits acquired");this._permitsUsed++},release:function(){if(this._permitsUsed===0)throw new Error("All permits released");this._permitsUsed--},isLocked:function(){return this._permitsUsed>0},setAvailablePermits:function(e){if(this._permitsUsed>e)throw new Error("Available permits cannot be less than used permits");this._permitsAvailable=e}},n.BlockingQueue=function(){this._queue=[]},t.extend(n.BlockingQueue.prototype,n.Semaphore,{_queue:null,add:function(e){this.isBlocked()?this._queue.push(e):e()},process:function(){while(this._queue&&this._queue.length)this._queue.shift()()},block:function(){this.acquire()},unblock:function(){this.release(),this.isBlocked()||this.process()},isBlocked:function(){return this.isLocked()}}),n.Relational.eventQueue=new n.BlockingQueue,n.Store=function(){this._collections=[],this._reverseRelations=[],this._subModels=[],this._modelScopes=[r]},t.extend(n.Store.prototype,n.Events,{addModelScope:function(e){this._modelScopes.push(e)},addSubModels:function(e,t){this._subModels.push({superModelType:t,subModels:e})},setupSuperModel:function(e){t.find(this._subModels,function(n){return t.find(n.subModels,function(t,r){var i=this.getObjectByName(t);if(e===i)return n.superModelType._subModels[r]=e,e._superModel=n.superModelType,e._subModelTypeValue=r,e._subModelTypeAttribute=n.superModelType.prototype.subModelTypeAttribute,!0},this)},this)},addReverseRelation:function(e){var n=t.any(this._reverseRelations,function(n){return t.all(e,function(e,t){return e===n[t]})});if(!n&&e.model&&e.type){this._reverseRelations.push(e);var r=function(e,n){e.prototype.relations||(e.prototype.relations=[]),e.prototype.relations.push(n),t.each(e._subModels,function(e){r(e,n)},this)};r(e.model,e),this.retroFitRelation(e)}},retroFitRelation:function(e){var t=this.getCollection(e.model);t.each(function(t){if(!(t instanceof e.model))return;new e.type(t,e)},this)},getCollection:function(e){e instanceof n.RelationalModel&&(e=e.constructor);var r=e;while(r._superModel)r=r._superModel;var i=t.detect(this._collections,function(e){return e.model===r});return i||(i=this._createCollection(r)),i},getObjectByName:function(e){var n=e.split("."),r=null;return t.find(this._modelScopes,function(e){r=t.reduce(n,function(e,t){return e[t]},e);if(r&&r!==e)return!0},this),r},_createCollection:function(e){var t;return e instanceof n.RelationalModel&&(e=e.constructor),e.prototype instanceof n.RelationalModel&&(t=new n.Collection,t.model=e,this._collections.push(t)),t},resolveIdForItem:function(e,r){var i=t.isString(r)||t.isNumber(r)?r:null;return i===null&&(r instanceof n.RelationalModel?i=r.id:t.isObject(r)&&(i=r[e.prototype.idAttribute])),!i&&i!==0&&(i=null),i},find:function(e,t){var n=this.resolveIdForItem(e,t),r=this.getCollection(e);if(r){var i=r.get(n);if(i instanceof e)return i}return null},register:function(e){var t=this.getCollection(e);if(t){if(t.get(e))throw new Error("Cannot instantiate more than one Backbone.RelationalModel with the same id per type!");var n=e.collection;t.add(e),e.bind("destroy",this.unregister,this),e.collection=n}},update:function(e){var t=this.getCollection(e);t._onModelEvent("change:"+e.idAttribute,e,t)},unregister:function(e){e.unbind("destroy",this.unregister);var t=this.getCollection(e);t&&t.remove(e)}}),n.Relational.store=new n.Store,n.Relation=function(e,r){this.instance=e,r=t.isObject(r)?r:{},this.reverseRelation=t.defaults(r.reverseRelation||{},this.options.reverseRelation),this.reverseRelation.type=t.isString(this.reverseRelation.type)?n[this.reverseRelation.type]||n.Relational.store.getObjectByName(this.reverseRelation.type):this.reverseRelation.type,this.model=r.model||this.instance.constructor,this.options=t.defaults(r,this.options,n.Relation.prototype.options),this.key=this.options.key,this.keySource=this.options.keySource||this.key,this.keyDestination=this.options.keyDestination||this.keySource||this.key,this.relatedModel=this.options.relatedModel,t.isString(this.relatedModel)&&(this.relatedModel=n.Relational.store.getObjectByName(this.relatedModel));if(!this.checkPreconditions())return!1;e&&(this.keyContents=this.instance.get(this.keySource),this.key!==this.keySource&&this.instance.unset(this.keySource,{silent:!0}),this.instance._relations.push(this)),!this.options.isAutoRelation&&this.reverseRelation.type&&this.reverseRelation.key&&n.Relational.store.addReverseRelation(t.defaults({isAutoRelation:!0,model:this.relatedModel,relatedModel:this.model,reverseRelation:this.options},this.reverseRelation)),t.bindAll(this,"_modelRemovedFromCollection","_relatedModelAdded","_relatedModelRemoved"),e&&(this.initialize(),n.Relational.store.getCollection(this.instance).bind("relational:remove",this._modelRemovedFromCollection),n.Relational.store.getCollection(this.relatedModel).bind("relational:add",this._relatedModelAdded).bind("relational:remove",this._relatedModelRemoved))},n.Relation.extend=n.Model.extend,t.extend(n.Relation.prototype,n.Events,n.Semaphore,{options:{createModels:!0,includeInJSON:!0,isAutoRelation:!1},instance:null,key:null,keyContents:null,relatedModel:null,reverseRelation:null,related:null,_relatedModelAdded:function(e,t,n){var r=this;e.queue(function(){r.tryAddRelated(e,n)})},_relatedModelRemoved:function(e,t,n){this.removeRelated(e,n)},_modelRemovedFromCollection:function(e){e===this.instance&&this.destroy()},checkPreconditions:function(){var e=this.instance,r=this.key,i=this.model,s=this.relatedModel,o=n.Relational.showWarnings&&typeof console!="undefined";if(!i||!r||!s)return o&&console.warn("Relation=%o; no model, key or relatedModel (%o, %o, %o)",this,i,r,s),!1;if(i.prototype instanceof n.RelationalModel){if(s.prototype instanceof n.RelationalModel){if(this instanceof n.HasMany&&this.reverseRelation.type===n.HasMany)return o&&console.warn("Relation=%o; relation is a HasMany, and the reverseRelation is HasMany as well.",this),!1;if(e&&e._relations.length){var u=t.any(e._relations,function(e){var t=this.reverseRelation.key&&e.reverseRelation.key;return e.relatedModel===s&&e.key===r&&(!t||this.reverseRelation.key===e.reverseRelation.key)},this);if(u)return o&&console.warn("Relation=%o between instance=%o.%s and relatedModel=%o.%s already exists",this,e,r,s,this.reverseRelation.key),!1}return!0}return o&&console.warn("Relation=%o; relatedModel does not inherit from Backbone.RelationalModel (%o)",this,s),!1}return o&&console.warn("Relation=%o; model does not inherit from Backbone.RelationalModel (%o)",this,e),!1},setRelated:function(e,n){this.related=e,this.instance.acquire(),this.instance.set(this.key,e,t.defaults(n||{},{silent:!0})),this.instance.release()},_isReverseRelation:function(e){return e.instance instanceof this.relatedModel&&this.reverseRelation.key===e.key&&this.key===e.reverseRelation.key?!0:!1},getReverseRelations:function(e){var n=[],r=t.isUndefined(e)?this.related&&(this.related.models||[this.related]):[e];return t.each(r,function(e){t.each(e.getRelations(),function(e){this._isReverseRelation(e)&&n.push(e)},this)},this),n},sanitizeOptions:function(e){return e=e?t.clone(e):{},e.silent&&(e.silentChange=!0,delete e.silent),e},unsanitizeOptions:function(e){return e=e?t.clone(e):{},e.silentChange&&(e.silent=!0,delete e.silentChange),e},destroy:function(){n.Relational.store.getCollection(this.instance).unbind("relational:remove",this._modelRemovedFromCollection),n.Relational.store.getCollection(this.relatedModel).unbind("relational:add",this._relatedModelAdded).unbind("relational:remove",this._relatedModelRemoved),t.each(this.getReverseRelations(),function(e){e.removeRelated(this.instance)},this)}}),n.HasOne=n.Relation.extend({options:{reverseRelation:{type:"HasMany"}},initialize:function(){t.bindAll(this,"onChange"),this.instance.bind("relational:change:"+this.key,this.onChange);var e=this.findRelated({silent:!0});this.setRelated(e),t.each(this.getReverseRelations(),function(e){e.addRelated(this.instance)},this)},findRelated:function(e){var t=this.keyContents,n=null;if(t instanceof this.relatedModel)n=t;else if(t||t===0)n=this.relatedModel.findOrCreate(t,{create:this.options.createModels});return n},onChange:function(e,r,i){if(this.isLocked())return;this.acquire(),i=this.sanitizeOptions(i);var s=t.isUndefined(i._related),o=s?this.related:i._related;if(s){this.keyContents=r;if(r instanceof this.relatedModel)this.related=r;else if(r){var u=this.findRelated(i);this.setRelated(u)}else this.setRelated(null)}o&&this.related!==o&&t.each(this.getReverseRelations(o),function(e){e.removeRelated(this.instance,i)},this),t.each(this.getReverseRelations(),function(e){e.addRelated(this.instance,i)},this);if(!i.silentChange&&this.related!==o){var a=this;n.Relational.eventQueue.add(function(){a.instance.trigger("update:"+a.key,a.instance,a.related,i)})}this.release()},tryAddRelated:function(e,r){if(this.related)return;r=this.sanitizeOptions(r);var i=this.keyContents;if(i||i===0){var s=n.Relational.store.resolveIdForItem(this.relatedModel,i);!t.isNull(s)&&e.id===s&&this.addRelated(e,r)}},addRelated:function(e,t){if(e!==this.related){var n=this.related||null;this.setRelated(e),this.onChange(this.instance,e,{_related:n})}},removeRelated:function(e,t){if(!this.related)return;if(e===this.related){var n=this.related||null;this.setRelated(null),this.onChange(this.instance,e,{_related:n})}}}),n.HasMany=n.Relation.extend({collectionType:null,options:{reverseRelation:{type:"HasOne"},collectionType:n.Collection,collectionKey:!0,collectionOptions:{}},initialize:function(){t.bindAll(this,"onChange","handleAddition","handleRemoval","handleReset"),this.instance.bind("relational:change:"+this.key,this.onChange),this.collectionType=this.options.collectionType,t.isString(this.collectionType)&&(this.collectionType=n.Relational.store.getObjectByName(this.collectionType));if(!this.collectionType.prototype instanceof n.Collection)throw new Error("collectionType must inherit from Backbone.Collection");this.keyContents instanceof n.Collection?this.setRelated(this._prepareCollection(this.keyContents)):this.setRelated(this._prepareCollection()),this.findRelated({silent:!0})},_getCollectionOptions:function(){return t.isFunction(this.options.collectionOptions)?this.options.collectionOptions(this.instance):this.options.collectionOptions},_prepareCollection:function(e){this.related&&this.related.unbind("relational:add",this.handleAddition).unbind("relational:remove",this.handleRemoval).unbind("relational:reset",this.handleReset);if(!e||!(e instanceof n.Collection))e=new this.collectionType([],this._getCollectionOptions());e.model=this.relatedModel;if(this.options.collectionKey){var t=this.options.collectionKey===!0?this.options.reverseRelation.key:this.options.collectionKey;e[t]&&e[t]!==this.instance?n.Relational.showWarnings&&typeof console!="undefined"&&console.warn("Relation=%o; collectionKey=%s already exists on collection=%o",this,t,this.options.collectionKey):t&&(e[t]=this.instance)}return e.bind("relational:add",this.handleAddition).bind("relational:remove",this.handleRemoval).bind("relational:reset",this.handleReset),e},findRelated:function(e){if(this.keyContents){var r=[];this.keyContents instanceof n.Collection?r=this.keyContents.models:(this.keyContents=t.isArray(this.keyContents)?this.keyContents:[this.keyContents],t.each(this.keyContents,function(e){var t=null;if(e instanceof this.relatedModel)t=e;else if(e||e===0)t=this.relatedModel.findOrCreate(e,{create:this.options.createModels});t&&!this.related.getByCid(t)&&!this.related.get(t)&&r.push(t)},this)),r.length&&(e=this.unsanitizeOptions(e),this.related.add(r,e))}},onChange:function(e,r,i){i=this.sanitizeOptions(i),this.keyContents=r,t.each(this.getReverseRelations(),function(e){e.removeRelated(this.instance,i)},this);if(r instanceof n.Collection)this._prepareCollection(r),this.related=r;else{var s;this.related instanceof n.Collection?(s=this.related,s.remove(s.models)):s=this._prepareCollection(),this.setRelated(s),this.findRelated(i)}t.each(this.getReverseRelations(),function(e){e.addRelated(this.instance,i)},this);var o=this;n.Relational.eventQueue.add(function(){!i.silentChange&&o.instance.trigger("update:"+o.key,o.instance,o.related,i)})},tryAddRelated:function(e,r){r=this.sanitizeOptions(r);if(!this.related.getByCid(e)&&!this.related.get(e)){var i=t.any(this.keyContents,function(r){var i=n.Relational.store.resolveIdForItem(this.relatedModel,r);return!t.isNull(i)&&i===e.id},this);i&&this.related.add(e,r)}},handleAddition:function(e,r,i){if(!(e instanceof n.Model))return;i=this.sanitizeOptions(i),t.each(this.getReverseRelations(e),function(e){e.addRelated(this.instance,i)},this);var s=this;n.Relational.eventQueue.add(function(){!i.silentChange&&s.instance.trigger("add:"+s.key,e,s.related,i)})},handleRemoval:function(e,r,i){if(!(e instanceof n.Model))return;i=this.sanitizeOptions(i),t.each(this.getReverseRelations(e),function(e){e.removeRelated(this.instance,i)},this);var s=this;n.Relational.eventQueue.add(function(){!i.silentChange&&s.instance.trigger("remove:"+s.key,e,s.related,i)})},handleReset:function(e,t){t=this.sanitizeOptions(t);var r=this;n.Relational.eventQueue.add(function(){!t.silentChange&&r.instance.trigger("reset:"+r.key,r.related,t)})},addRelated:function(e,t){var n=this;t=this.unsanitizeOptions(t),e.queue(function(){n.related&&!n.related.getByCid(e)&&!n.related.get(e)&&n.related.add(e,t)})},removeRelated:function(e,t){t=this.unsanitizeOptions(t),(this.related.getByCid(e)||this.related.get(e))&&this.related.remove(e,t)}}),n.RelationalModel=n.Model.extend({relations:null,_relations:null,_isInitialized:!1,_deferProcessing:!1,_queue:null,subModelTypeAttribute:"type",subModelTypes:null,constructor:function(e,r){var i=this;if(r&&r.collection){this._deferProcessing=!0;var s=function(e){e===i&&(i._deferProcessing=!1,i.processQueue(),r.collection.unbind("relational:add",s))};r.collection.bind("relational:add",s),t.defer(function(){s(i)})}this._queue=new n.BlockingQueue,this._queue.block(),n.Relational.eventQueue.block(),n.Model.apply(this,arguments),n.Relational.eventQueue.unblock()},trigger:function(e){if(e.length>5&&"change"===e.substr(0,6)){var t=this,r=arguments;n.Relational.eventQueue.add(function(){n.Model.prototype.trigger.apply(t,r)})}else n.Model.prototype.trigger.apply(this,arguments);return this},initializeRelations:function(){this.acquire(),this._relations=[],t.each(this.relations,function(e){var r=t.isString(e.type)?n[e.type]||n.Relational.store.getObjectByName(e.type):e.type;r&&r.prototype instanceof n.Relation?new r(this,e):n.Relational.showWarnings&&typeof console!="undefined"&&console.warn("Relation=%o; missing or invalid type!",e)},this),this._isInitialized=!0,this.release(),this.processQueue()},updateRelations:function(e){this._isInitialized&&!this.isLocked()&&t.each(this._relations,function(t){var n=this.attributes[t.keySource]||this.attributes[t.key];t.related!==n&&this.trigger("relational:change:"+t.key,this,n,e||{})},this)},queue:function(e){this._queue.add(e)},processQueue:function(){this._isInitialized&&!this._deferProcessing&&this._queue.isBlocked()&&this._queue.unblock()},getRelation:function(e){return t.detect(this._relations,function(t){if(t.key===e)return!0},this)},getRelations:function(){return this._relations},fetchRelated:function(e,r,i){r||(r={});var s,o=[],u=this.getRelation(e),a=u&&u.keyContents,f=a&&t.select(t.isArray(a)?a:[a],function(e){var r=n.Relational.store.resolveIdForItem(u.relatedModel,e);return!t.isNull(r)&&(i||!n.Relational.store.find(u.relatedModel,r))},this);if(f&&f.length){var l=t.map(f,function(e){var n;if(t.isObject(e))n=u.relatedModel.build(e);else{var r={};r[u.relatedModel.prototype.idAttribute]=e,n=u.relatedModel.build(r)}return n},this);u.related instanceof n.Collection&&t.isFunction(u.related.url)&&(s=u.related.url(l));if(s&&s!==u.related.url()){var c=t.defaults({error:function(){var e=arguments;t.each(l,function(t){t.trigger("destroy",t,t.collection,r),r.error&&r.error.apply(t,e)})},url:s},r,{add:!0});o=[u.related.fetch(c)]}else o=t.map(l,function(e){var n=t.defaults({error:function(){e.trigger("destroy",e,e.collection,r),r.error&&r.error.apply(e,arguments)}},r);return e.fetch(n)},this)}return o},set:function(e,r,i){n.Relational.eventQueue.block();var s;t.isObject(e)||e==null?(s=e,i=r):(s={},s[e]=r);var o=n.Model.prototype.set.apply(this,arguments);return!this._isInitialized&&!this.isLocked()?(this.constructor.initializeModelHierarchy(),n.Relational.store.register(this),this.initializeRelations()):s&&this.idAttribute in s&&n.Relational.store.update(this),s&&this.updateRelations(i),n.Relational.eventQueue.unblock(),o},unset:function(e,t){n.Relational.eventQueue.block();var r=n.Model.prototype.unset.apply(this,arguments);return this.updateRelations(t),n.Relational.eventQueue.unblock(),r},clear:function(e){n.Relational.eventQueue.block();var t=n.Model.prototype.clear.apply(this,arguments);return this.updateRelations(e),n.Relational.eventQueue.unblock(),t},change:function(e){var t=this,r=arguments;n.Relational.eventQueue.add(function(){n.Model.prototype.change.apply(t,r)})},clone:function(){var e=t.clone(this.attributes);return t.isUndefined(e[this.idAttribute])||(e[this.idAttribute]=null),t.each(this.getRelations(),function(t){delete e[t.key]}),new this.constructor(e)},toJSON:function(){if(this.isLocked())return this.id;this.acquire();var e=n.Model.prototype.toJSON.call(this);return this.constructor._superModel&&!(this.constructor._subModelTypeAttribute in e)&&(e[this.constructor._subModelTypeAttribute]=this.constructor._subModelTypeValue),t.each(this._relations,function(r){var i=e[r.key];if(r.options.includeInJSON===!0)i&&t.isFunction(i.toJSON)?e[r.keyDestination]=i.toJSON():e[r.keyDestination]=null;else if(t.isString(r.options.includeInJSON))i instanceof n.Collection?e[r.keyDestination]=i.pluck(r.options.includeInJSON):i instanceof n.Model?e[r.keyDestination]=i.get(r.options.includeInJSON):e[r.keyDestination]=null;else if(t.isArray(r.options.includeInJSON))if(i instanceof n.Collection){var s=[];i.each(function(e){var n={};t.each(r.options.includeInJSON,function(t){n[t]=e.get(t)}),s.push(n)}),e[r.keyDestination]=s}else if(i instanceof n.Model){var s={};t.each(r.options.includeInJSON,function(e){s[e]=i.get(e)}),e[r.keyDestination]=s}else e[r.keyDestination]=null;else delete e[r.key];r.keyDestination!==r.key&&delete e[r.key]}),this.release(),e}},{setup:function(e){return this.prototype.relations=(this.prototype.relations||[]).slice(0),this._subModels={},this._superModel=null,this.prototype.hasOwnProperty("subModelTypes")?n.Relational.store.addSubModels(this.prototype.subModelTypes,this):this.prototype.subModelTypes=null,t.each(this.prototype.relations,function(e){e.model||(e.model=this);if(e.reverseRelation&&e.model===this){var r=!0;if(t.isString(e.relatedModel)){var i=n.Relational.store.getObjectByName(e.relatedModel);r=i&&i.prototype instanceof n.RelationalModel}var s=t.isString(e.type)?n[e.type]||n.Relational.store.getObjectByName(e.type):e.type;r&&s&&s.prototype instanceof n.Relation&&new s(null,e)}},this),this},build:function(e,t){var n=this;this.initializeModelHierarchy();if(this._subModels&&this.prototype.subModelTypeAttribute in e){var r=e[this.prototype.subModelTypeAttribute],i=this._subModels[r];i&&(n=i)}return new n(e,t)},initializeModelHierarchy:function(){if(t.isUndefined(this._superModel)||t.isNull(this._superModel)){n.Relational.store.setupSuperModel(this);if(this._superModel){if(this._superModel.prototype.relations){var e=t.any(this.prototype.relations,function(e){return e.model&&e.model!==this},this);e||(this.prototype.relations=this._superModel.prototype.relations.concat(this.prototype.relations))}}else this._superModel=!1}this.prototype.subModelTypes&&t.keys(this.prototype.subModelTypes).length!==t.keys(this._subModels).length&&t.each(this.prototype.subModelTypes,function(e){var t=n.Relational.store.getObjectByName(e);t&&t.initializeModelHierarchy()})},findOrCreate:function(e,r){var i=n.Relational.store.find(this,e);if(t.isObject(e))if(i)i.set(i.parse?i.parse(e):e,r);else if(!r||r&&r.create!==!1)i=this.build(e,r);return i}}),t.extend(n.RelationalModel.prototype,n.Semaphore),n.Collection.prototype.__prepareModel=n.Collection.prototype._prepareModel,n.Collection.prototype._prepareModel=function(e,t){t||(t={});if(e instanceof n.Model)e.collection||(e.collection=this);else{var r=e;t.collection=this,typeof this.model.findOrCreate!="undefined"?e=this.model.findOrCreate(r,t):e=new this.model(r,t),e._validate(e.attributes,t)||(e=!1)}return e};var i=n.Collection.prototype.__add=n.Collection.prototype.add;n.Collection.prototype.add=function(e,r){r||(r={}),t.isArray(e)||(e=[e]);var s=[];return t.each(e,function(e){e instanceof n.Model||(e=n.Collection.prototype._prepareModel.call(this,e,r)),e instanceof n.Model&&!this.get(e)&&!this.getByCid(e)&&s.push(e)},this),s.length&&(i.call(this,s,r),t.each(s,function(e){this.trigger("relational:add",e,this,r)},this)),this};var s=n.Collection.prototype.__remove=n.Collection.prototype.remove;n.Collection.prototype.remove=function(e,r){return r||(r={}),t.isArray(e)?e=e.slice(0):e=[e],t.each(e,function(e){e=this.getByCid(e)||this.get(e),e instanceof n.Model&&(s.call(this,e,r),this.trigger("relational:remove",e,this,r))},this),this};var o=n.Collection.prototype.__reset=n.Collection.prototype.reset;n.Collection.prototype.reset=function(e,t){return o.call(this,e,t),this.trigger("relational:reset",this,t),this};var u=n.Collection.prototype.__sort=n.Collection.prototype.sort;n.Collection.prototype.sort=function(e){return u.call(this,e),this.trigger("relational:reset",this,e),this};var a=n.Collection.prototype.__trigger=n.Collection.prototype.trigger;n.Collection.prototype.trigger=function(e){if(e==="add"||e==="remove"||e==="reset"){var r=this,i=arguments;e==="add"&&(i=t.toArray(i),t.isObject(i[3])&&(i[3]=t.clone(i[3]))),n.Relational.eventQueue.add(function(){a.apply(r,i)})}else a.apply(this,arguments);return this},n.RelationalModel.extend=function(e,t){var r=n.Model.extend.apply(this,arguments);return r.setup(this),r}}(),window.Store=function(e){this.name=e;var t=localStorage.getItem(this.name);this.records=t&&t.split(",")||[]},_.extend(Store.prototype,{save:function(){localStorage.setItem(this.name,this.records.join(","))},create:function(e){return e.id||(e.id=e.attributes.id=guid()),localStorage.setItem(this.name+"-"+e.id,JSON.stringify(e)),this.records.push(e.id.toString()),this.save(),e},update:function(e){return localStorage.setItem(this.name+"-"+e.id,JSON.stringify(e)),_.include(this.records,e.id.toString())||this.records.push(e.id.toString()),this.save(),e},find:function(e){return JSON.parse(localStorage.getItem(this.name+"-"+e.id))},findAll:function(){return _.map(this.records,function(e){return JSON.parse(localStorage.getItem(this.name+"-"+e))},this)},destroy:function(e){return localStorage.removeItem(this.name+"-"+e.id),this.records=_.reject(this.records,function(t){return t==e.id.toString()}),this.save(),e}}),Backbone.localSync=function(e,t,n,r){typeof n=="function"&&(n={success:n,error:r});var i,s=t.localStorage||
t.collection.localStorage;switch(e){case"read":i=t.id!=undefined?s.find(t):s.findAll();break;case"create":i=s.create(t);break;case"update":i=s.update(t);break;case"delete":i=s.destroy(t)}i?n.success(i):n.error("Record not found")},Backbone.ajaxSync=Backbone.sync,Backbone.sync=Backbone.localSync;var I18n=I18n||{};I18n.defaultLocale="en",I18n.fallbacks=!1,I18n.defaultSeparator=".",I18n.locale=null,I18n.PLACEHOLDER=/(?:\{\{|%\{)(.*?)(?:\}\}?)/gm,I18n.fallbackRules={},I18n.pluralizationRules={en:function(e){return e==0?["zero","none","other"]:e==1?"one":"other"}},I18n.getFallbacks=function(e){if(e===I18n.defaultLocale)return[];if(!I18n.fallbackRules[e]){var t=[],n=e.split("-");for(var r=1;r<n.length;r++)t.push(n.slice(0,r).join("-"));t.push(I18n.defaultLocale),I18n.fallbackRules[e]=t}return I18n.fallbackRules[e]},I18n.isValidNode=function(e,t,n){return e[t]!==null&&e[t]!==n},I18n.lookup=function(e,t){var t=t||{},n=e,r=this.prepareOptions(I18n.translations),i=t.locale||I18n.currentLocale(),s=r[i]||{},t=this.prepareOptions(t),o;typeof e=="object"&&(e=e.join(this.defaultSeparator)),t.scope&&(e=t.scope.toString()+this.defaultSeparator+e),e=e.split(this.defaultSeparator);while(s&&e.length>0)o=e.shift(),s=s[o];if(!s){if(I18n.fallbacks){var u=this.getFallbacks(i);for(var a=0;a<u.length;u++){s=I18n.lookup(n,this.prepareOptions({locale:u[a]},t));if(s)break}}!s&&this.isValidNode(t,"defaultValue")&&(s=t.defaultValue)}return s},I18n.prepareOptions=function(){var e={},t,n=arguments.length;for(var r=0;r<n;r++){t=arguments[r];if(!t)continue;for(var i in t)this.isValidNode(e,i)||(e[i]=t[i])}return e},I18n.interpolate=function(e,t){t=this.prepareOptions(t);var n=e.match(this.PLACEHOLDER),r,i,s;if(!n)return e;for(var o=0;r=n[o];o++)s=r.replace(this.PLACEHOLDER,"$1"),i=t[s],this.isValidNode(t,s)||(i="[missing "+r+" value]"),regex=new RegExp(r.replace(/\{/gm,"\\{").replace(/\}/gm,"\\}")),e=e.replace(regex,i);return e},I18n.translate=function(e,t){t=this.prepareOptions(t);var n=this.lookup(e,t);try{return typeof n=="object"?typeof t.count=="number"?this.pluralize(t.count,e,t):n:this.interpolate(n,t)}catch(r){return this.missingTranslation(e)}},I18n.localize=function(e,t){switch(e){case"currency":return this.toCurrency(t);case"number":return e=this.lookup("number.format"),this.toNumber(t,e);case"percentage":return this.toPercentage(t);default:return e.match(/^(date|time)/)?this.toTime(e,t):t.toString()}},I18n.parseDate=function(e){var t,n;if(typeof e=="object")return e;t=e.toString().match(/(\d{4})-(\d{2})-(\d{2})(?:[ T](\d{2}):(\d{2}):(\d{2}))?(Z|\+0000)?/);if(t){for(var r=1;r<=6;r++)t[r]=parseInt(t[r],10)||0;t[2]-=1,t[7]?n=new Date(Date.UTC(t[1],t[2],t[3],t[4],t[5],t[6])):n=new Date(t[1],t[2],t[3],t[4],t[5],t[6])}else typeof e=="number"?(n=new Date,n.setTime(e)):e.match(/\d+ \d+:\d+:\d+ [+-]\d+ \d+/)?(n=new Date,n.setTime(Date.parse(e))):(n=new Date,n.setTime(Date.parse(e)));return n},I18n.toTime=function(e,t){var n=this.parseDate(t),r=this.lookup(e);return n.toString().match(/invalid/i)?n.toString():r?this.strftime(n,r):n.toString()},I18n.strftime=function(e,t){var n=this.lookup("date");if(!n)return e.toString();n.meridian=n.meridian||["AM","PM"];var r=e.getDay(),i=e.getDate(),s=e.getFullYear(),o=e.getMonth()+1,u=e.getHours(),a=u,f=u>11?1:0,l=e.getSeconds(),c=e.getMinutes(),h=e.getTimezoneOffset(),p=Math.floor(Math.abs(h/60)),d=Math.abs(h)-p*60,v=(h>0?"-":"+")+(p.toString().length<2?"0"+p:p)+(d.toString().length<2?"0"+d:d);a>12?a-=12:a===0&&(a=12);var m=function(e){var t="0"+e.toString();return t.substr(t.length-2)},g=t;return g=g.replace("%a",n.abbr_day_names[r]),g=g.replace("%A",n.day_names[r]),g=g.replace("%b",n.abbr_month_names[o]),g=g.replace("%B",n.month_names[o]),g=g.replace("%d",m(i)),g=g.replace("%e",i),g=g.replace("%-d",i),g=g.replace("%H",m(u)),g=g.replace("%-H",u),g=g.replace("%I",m(a)),g=g.replace("%-I",a),g=g.replace("%m",m(o)),g=g.replace("%-m",o),g=g.replace("%M",m(c)),g=g.replace("%-M",c),g=g.replace("%p",n.meridian[f]),g=g.replace("%S",m(l)),g=g.replace("%-S",l),g=g.replace("%w",r),g=g.replace("%y",m(s)),g=g.replace("%-y",m(s).replace(/^0+/,"")),g=g.replace("%Y",s),g=g.replace("%z",v),g},I18n.toNumber=function(e,t){t=this.prepareOptions(t,this.lookup("number.format"),{precision:3,separator:".",delimiter:",",strip_insignificant_zeros:!1});var n=e<0,r=Math.abs(e).toFixed(t.precision).toString(),i=r.split("."),s,o=[],u;e=i[0],s=i[1];while(e.length>0)o.unshift(e.substr(Math.max(0,e.length-3),3)),e=e.substr(0,e.length-3);u=o.join(t.delimiter),t.precision>0&&(u+=t.separator+i[1]),n&&(u="-"+u);if(t.strip_insignificant_zeros){var a={separator:new RegExp(t.separator.replace(/\./,"\\.")+"$"),zeros:/0+$/};u=u.replace(a.zeros,"").replace(a.separator,"")}return u},I18n.toCurrency=function(e,t){return t=this.prepareOptions(t,this.lookup("number.currency.format"),this.lookup("number.format"),{unit:"$",precision:2,format:"%u%n",delimiter:",",separator:"."}),e=this.toNumber(e,t),e=t.format.replace("%u",t.unit).replace("%n",e),e},I18n.toHumanSize=function(e,t){var n=1024,r=e,i=0,s,o;while(r>=n&&i<4)r/=n,i+=1;return i===0?(s=this.t("number.human.storage_units.units.byte",{count:r}),o=0):(s=this.t("number.human.storage_units.units."+[null,"kb","mb","gb","tb"][i]),o=r-Math.floor(r)===0?0:1),t=this.prepareOptions(t,{precision:o,format:"%n%u",delimiter:""}),e=this.toNumber(r,t),e=t.format.replace("%u",s).replace("%n",e),e},I18n.toPercentage=function(e,t){return t=this.prepareOptions(t,this.lookup("number.percentage.format"),this.lookup("number.format"),{precision:3,separator:".",delimiter:""}),e=this.toNumber(e,t),e+"%"},I18n.pluralizer=function(e){return pluralizer=this.pluralizationRules[e],pluralizer!==undefined?pluralizer:this.pluralizationRules.en},I18n.findAndTranslateValidNode=function(e,t){for(i=0;i<e.length;i++){key=e[i];if(this.isValidNode(t,key))return t[key]}return null},I18n.pluralize=function(e,t,n){var r;try{r=this.lookup(t,n)}catch(i){}if(!r)return this.missingTranslation(t);var s;return n=this.prepareOptions(n),n.count=e.toString(),pluralizer=this.pluralizer(this.currentLocale()),key=pluralizer(Math.abs(e)),keys=typeof key=="object"&&key instanceof Array?key:[key],s=this.findAndTranslateValidNode(keys,r),s==null&&(s=this.missingTranslation(t,keys[0])),this.interpolate(s,n)},I18n.missingTranslation=function(){var e='[missing "'+this.currentLocale(),t=arguments.length;for(var n=0;n<t;n++)e+="."+arguments[n];return e+='" translation]',e},I18n.currentLocale=function(){return I18n.locale||I18n.defaultLocale},I18n.t=I18n.translate,I18n.l=I18n.localize,I18n.p=I18n.pluralize;var Handlebars={};(function(e,t){e.VERSION="1.0.0",e.COMPILER_REVISION=4,e.REVISION_CHANGES={1:"<= 1.0.rc.2",2:"== 1.0.0-rc.3",3:"== 1.0.0-rc.4",4:">= 1.0.0"},e.helpers={},e.partials={};var n=Object.prototype.toString,r="[object Function]",i="[object Object]";e.registerHelper=function(t,r,s){if(n.call(t)===i){if(s||r)throw new e.Exception("Arg not supported with multiple helpers");e.Utils.extend(this.helpers,t)}else s&&(r.not=s),this.helpers[t]=r},e.registerPartial=function(t,r){n.call(t)===i?e.Utils.extend(this.partials,t):this.partials[t]=r},e.registerHelper("helperMissing",function(e){if(arguments.length===2)return t;throw new Error("Missing helper: '"+e+"'")}),e.registerHelper("blockHelperMissing",function(t,i){var s=i.inverse||function(){},o=i.fn,u=n.call(t);return u===r&&(t=t.call(this)),t===!0?o(this):t===!1||t==null?s(this):u==="[object Array]"?t.length>0?e.helpers.each(t,i):s(this):o(t)}),e.K=function(){},e.createFrame=Object.create||function(t){e.K.prototype=t;var n=new e.K;return e.K.prototype=null,n},e.logger={DEBUG:0,INFO:1,WARN:2,ERROR:3,level:3,methodMap:{0:"debug",1:"info",2:"warn",3:"error"},log:function(t,n){if(e.logger.level<=t){var r=e.logger.methodMap[t];typeof console!="undefined"&&console[r]&&console[r].call(console,n)}}},e.log=function(t,n){e.logger.log(t,n)},e.registerHelper("each",function(t,i){var s=i.fn,o=i.inverse,u=0,a="",f,l=n.call(t);l===r&&(t=t.call(this)),i.data&&(f=e.createFrame(i.data));if(t&&typeof t=="object")if(t instanceof Array)for(var c=t.length;u<c;u++)f&&(f.index=u),a+=s(t[u],{data:f});else for(var h in t)t.hasOwnProperty(h)&&(f&&(f.key=h),a+=s(t[h],{data:f}),u++);return u===0&&(a=o(this)),a}),e.registerHelper("if",function(t,i){var s=n.call(t);return s===r&&(t=t.call(this)),!t||e.Utils.isEmpty(t)?i.inverse(this):i.fn(this)}),e.registerHelper("unless",function(t,n){return e.helpers["if"].call(this,t,{fn:n.inverse,inverse:n.fn})}),e.registerHelper("with",function(t,i){var s=n.call(t);s===r&&(t=t.call(this));if(!e.Utils.isEmpty(t))return i.fn(t)}),e.registerHelper("log",function(t,n){var r=n.data&&n.data.level!=null?parseInt(n.data.level,10):1;e.log(r,t)});var s=function(){function n(){this.yy={}}var e={trace:function(){},yy:{},symbols_:{error:2,root:3,program:4,EOF:5,simpleInverse:6,statements:7,statement:8,openInverse:9,closeBlock:10,openBlock:11,mustache:12,partial:13,CONTENT:14,COMMENT:15,OPEN_BLOCK:16,inMustache:17,CLOSE:18,OPEN_INVERSE:19,OPEN_ENDBLOCK:20,path:21,OPEN:22,OPEN_UNESCAPED:23,CLOSE_UNESCAPED:24,OPEN_PARTIAL:25,partialName:26,params:27,hash:28,dataName:29,param:30,STRING:31,INTEGER:32,BOOLEAN:33,hashSegments:34,hashSegment:35,ID:36,EQUALS:37,DATA:38,pathSegments:39,SEP:40,$accept:0,$end:1},terminals_:{2:"error",5:"EOF",14:"CONTENT",15:"COMMENT",16:"OPEN_BLOCK",18:"CLOSE",19:"OPEN_INVERSE",20:"OPEN_ENDBLOCK",22:"OPEN",23:"OPEN_UNESCAPED",24:"CLOSE_UNESCAPED",25:"OPEN_PARTIAL",31:"STRING",32:"INTEGER",33:"BOOLEAN",36:"ID",37:"EQUALS",38:"DATA",40:"SEP"},productions_:[0,[3,2],[4,2],[4,3],[4,2],[4,1],[4,1],[4,0],[7,1],[7,2],[8,3],[8,3],[8,1],[8,1],[8,1],[8,1],[11,3],[9,3],[10,3],[12,3],[12,3],[13,3],[13,4],[6,2],[17,3],[17,2],[17,2],[17,1],[17,1],[27,2],[27,1],[30,1],[30,1],[30,1],[30,1],[30,1],[28,1],[34,2],[34,1],[35,3],[35,3],[35,3],[35,3],[35,3],[26,1],[26,1],[26,1],[29,2],[21,1],[39,3],[39,1]],performAction:function(t,n,r,i,s,o,u){var a=o.length-1;switch(s){case 1:return o[a-1];case 2:this.$=new i.ProgramNode([],o[a]);break;case 3:this.$=new i.ProgramNode(o[a-2],o[a]);break;case 4:this.$=new i.ProgramNode(o[a-1],[]);break;case 5:this.$=new i.ProgramNode(o[a]);break;case 6:this.$=new i.ProgramNode([],[]);break;case 7:this.$=new i.ProgramNode([]);break;case 8:this.$=[o[a]];break;case 9:o[a-1].push(o[a]),this.$=o[a-1];break;case 10:this.$=new i.BlockNode(o[a-2],o[a-1].inverse,o[a-1],o[a]);break;case 11:this.$=new i.BlockNode(o[a-2],o[a-1],o[a-1].inverse,o[a]);break;case 12:this.$=o[a];break;case 13:this.$=o[a];break;case 14:this.$=new i.ContentNode(o[a]);break;case 15:this.$=new i.CommentNode(o[a]);break;case 16:this.$=new i.MustacheNode(o[a-1][0],o[a-1][1]);break;case 17:this.$=new i.MustacheNode(o[a-1][0],o[a-1][1]);break;case 18:this.$=o[a-1];break;case 19:this.$=new i.MustacheNode(o[a-1][0],o[a-1][1],o[a-2][2]==="&");break;case 20:this.$=new i.MustacheNode(o[a-1][0],o[a-1][1],!0);break;case 21:this.$=new i.PartialNode(o[a-1]);break;case 22:this.$=new i.PartialNode(o[a-2],o[a-1]);break;case 23:break;case 24:this.$=[[o[a-2]].concat(o[a-1]),o[a]];break;case 25:this.$=[[o[a-1]].concat(o[a]),null];break;case 26:this.$=[[o[a-1]],o[a]];break;case 27:this.$=[[o[a]],null];break;case 28:this.$=[[o[a]],null];break;case 29:o[a-1].push(o[a]),this.$=o[a-1];break;case 30:this.$=[o[a]];break;case 31:this.$=o[a];break;case 32:this.$=new i.StringNode(o[a]);break;case 33:this.$=new i.IntegerNode(o[a]);break;case 34:this.$=new i.BooleanNode(o[a]);break;case 35:this.$=o[a];break;case 36:this.$=new i.HashNode(o[a]);break;case 37:o[a-1].push(o[a]),this.$=o[a-1];break;case 38:this.$=[o[a]];break;case 39:this.$=[o[a-2],o[a]];break;case 40:this.$=[o[a-2],new i.StringNode(o[a])];break;case 41:this.$=[o[a-2],new i.IntegerNode(o[a])];break;case 42:this.$=[o[a-2],new i.BooleanNode(o[a])];break;case 43:this.$=[o[a-2],o[a]];break;case 44:this.$=new i.PartialNameNode(o[a]);break;case 45:this.$=new i.PartialNameNode(new i.StringNode(o[a]));break;case 46:this.$=new i.PartialNameNode(new i.IntegerNode(o[a]));break;case 47:this.$=new i.DataNode(o[a]);break;case 48:this.$=new i.IdNode(o[a]);break;case 49:o[a-2].push({part:o[a],separator:o[a-1]}),this.$=o[a-2];break;case 50:this.$=[{part:o[a]}]}},table:[{3:1,4:2,5:[2,7],6:3,7:4,8:6,9:7,11:8,12:9,13:10,14:[1,11],15:[1,12],16:[1,13],19:[1,5],22:[1,14],23:[1,15],25:[1,16]},{1:[3]},{5:[1,17]},{5:[2,6],7:18,8:6,9:7,11:8,12:9,13:10,14:[1,11],15:[1,12],16:[1,13],19:[1,19],20:[2,6],22:[1,14],23:[1,15],25:[1,16]},{5:[2,5],6:20,8:21,9:7,11:8,12:9,13:10,14:[1,11],15:[1,12],16:[1,13],19:[1,5],20:[2,5],22:[1,14],23:[1,15],25:[1,16]},{17:23,18:[1,22],21:24,29:25,36:[1,28],38:[1,27],39:26},{5:[2,8],14:[2,8],15:[2,8],16:[2,8],19:[2,8],20:[2,8],22:[2,8],23:[2,8],25:[2,8]},{4:29,6:3,7:4,8:6,9:7,11:8,12:9,13:10,14:[1,11],15:[1,12],16:[1,13],19:[1,5],20:[2,7],22:[1,14],23:[1,15],25:[1,16]},{4:30,6:3,7:4,8:6,9:7,11:8,12:9,13:10,14:[1,11],15:[1,12],16:[1,13],19:[1,5],20:[2,7],22:[1,14],23:[1,15],25:[1,16]},{5:[2,12],14:[2,12],15:[2,12],16:[2,12],19:[2,12],20:[2,12],22:[2,12],23:[2,12],25:[2,12]},{5:[2,13],14:[2,13],15:[2,13],16:[2,13],19:[2,13],20:[2,13],22:[2,13],23:[2,13],25:[2,13]},{5:[2,14],14:[2,14],15:[2,14],16:[2,14],19:[2,14],20:[2,14],22:[2,14],23:[2,14],25:[2,14]},{5:[2,15],14:[2,15],15:[2,15],16:[2,15],19:[2,15],20:[2,15],22:[2,15],23:[2,15],25:[2,15]},{17:31,21:24,29:25,36:[1,28],38:[1,27],39:26},{17:32,21:24,29:25,36:[1,28],38:[1,27],39:26},{17:33,21:24,29:25,36:[1,28],38:[1,27],39:26},{21:35,26:34,31:[1,36],32:[1,37],36:[1,28],39:26},{1:[2,1]},{5:[2,2],8:21,9:7,11:8,12:9,13:10,14:[1,11],15:[1,12],16:[1,13],19:[1,19],20:[2,2],22:[1,14],23:[1,15],25:[1,16]},{17:23,21:24,29:25,36:[1,28],38:[1,27],39:26},{5:[2,4],7:38,8:6,9:7,11:8,12:9,13:10,14:[1,11],15:[1,12],16:[1,13],19:[1,19],20:[2,4],22:[1,14],23:[1,15],25:[1,16]},{5:[2,9],14:[2,9],15:[2,9],16:[2,9],19:[2,9],20:[2,9],22:[2,9],23:[2,9],25:[2,9]},{5:[2,23],14:[2,23],15:[2,23],16:[2,23],19:[2,23],20:[2,23],22:[2,23],23:[2,23],25:[2,23]},{18:[1,39]},{18:[2,27],21:44,24:[2,27],27:40,28:41,29:48,30:42,31:[1,45],32:[1,46],33:[1,47],34:43,35:49,36:[1,50],38:[1,27],39:26},{18:[2,28],24:[2,28]},{18:[2,48],24:[2,48],31:[2,48],32:[2,48],33:[2,48],36:[2,48],38:[2,48],40:[1,51]},{21:52,36:[1,28],39:26},{18:[2,50],24:[2,50],31:[2,50],32:[2,50],33:[2,50],36:[2,50],38:[2,50],40:[2,50]},{10:53,20:[1,54]},{10:55,20:[1,54]},{18:[1,56]},{18:[1,57]},{24:[1,58]},{18:[1,59],21:60,36:[1,28],39:26},{18:[2,44],36:[2,44]},{18:[2,45],36:[2,45]},{18:[2,46],36:[2,46]},{5:[2,3],8:21,9:7,11:8,12:9,13:10,14:[1,11],15:[1,12],16:[1,13],19:[1,19],20:[2,3],22:[1,14],23:[1,15],25:[1,16]},{14:[2,17],15:[2,17],16:[2,17],19:[2,17],20:[2,17],22:[2,17],23:[2,17],25:[2,17]},{18:[2,25],21:44,24:[2,25],28:61,29:48,30:62,31:[1,45],32:[1,46],33:[1,47],34:43,35:49,36:[1,50],38:[1,27],39:26},{18:[2,26],24:[2,26]},{18:[2,30],24:[2,30],31:[2,30],32:[2,30],33:[2,30],36:[2,30],38:[2,30]},{18:[2,36],24:[2,36],35:63,36:[1,64]},{18:[2,31],24:[2,31],31:[2,31],32:[2,31],33:[2,31],36:[2,31],38:[2,31]},{18:[2,32],24:[2,32],31:[2,32],32:[2,32],33:[2,32],36:[2,32],38:[2,32]},{18:[2,33],24:[2,33],31:[2,33],32:[2,33],33:[2,33],36:[2,33],38:[2,33]},{18:[2,34],24:[2,34],31:[2,34],32:[2,34],33:[2,34],36:[2,34],38:[2,34]},{18:[2,35],24:[2,35],31:[2,35],32:[2,35],33:[2,35],36:[2,35],38:[2,35]},{18:[2,38],24:[2,38],36:[2,38]},{18:[2,50],24:[2,50],31:[2,50],32:[2,50],33:[2,50],36:[2,50],37:[1,65],38:[2,50],40:[2,50]},{36:[1,66]},{18:[2,47],24:[2,47],31:[2,47],32:[2,47],33:[2,47],36:[2,47],38:[2,47]},{5:[2,10],14:[2,10],15:[2,10],16:[2,10],19:[2,10],20:[2,10],22:[2,10],23:[2,10],25:[2,10]},{21:67,36:[1,28],39:26},{5:[2,11],14:[2,11],15:[2,11],16:[2,11],19:[2,11],20:[2,11],22:[2,11],23:[2,11],25:[2,11]},{14:[2,16],15:[2,16],16:[2,16],19:[2,16],20:[2,16],22:[2,16],23:[2,16],25:[2,16]},{5:[2,19],14:[2,19],15:[2,19],16:[2,19],19:[2,19],20:[2,19],22:[2,19],23:[2,19],25:[2,19]},{5:[2,20],14:[2,20],15:[2,20],16:[2,20],19:[2,20],20:[2,20],22:[2,20],23:[2,20],25:[2,20]},{5:[2,21],14:[2,21],15:[2,21],16:[2,21],19:[2,21],20:[2,21],22:[2,21],23:[2,21],25:[2,21]},{18:[1,68]},{18:[2,24],24:[2,24]},{18:[2,29],24:[2,29],31:[2,29],32:[2,29],33:[2,29],36:[2,29],38:[2,29]},{18:[2,37],24:[2,37],36:[2,37]},{37:[1,65]},{21:69,29:73,31:[1,70],32:[1,71],33:[1,72],36:[1,28],38:[1,27],39:26},{18:[2,49],24:[2,49],31:[2,49],32:[2,49],33:[2,49],36:[2,49],38:[2,49],40:[2,49]},{18:[1,74]},{5:[2,22],14:[2,22],15:[2,22],16:[2,22],19:[2,22],20:[2,22],22:[2,22],23:[2,22],25:[2,22]},{18:[2,39],24:[2,39],36:[2,39]},{18:[2,40],24:[2,40],36:[2,40]},{18:[2,41],24:[2,41],36:[2,41]},{18:[2,42],24:[2,42],36:[2,42]},{18:[2,43],24:[2,43],36:[2,43]},{5:[2,18],14:[2,18],15:[2,18],16:[2,18],19:[2,18],20:[2,18],22:[2,18],23:[2,18],25:[2,18]}],defaultActions:{17:[2,1]},parseError:function(t,n){throw new Error(t)},parse:function(t){function v(e){r.length=r.length-2*e,i.length=i.length-e,s.length=s.length-e}function m(){var e;return e=n.lexer.lex()||1,typeof e!="number"&&(e=n.symbols_[e]||e),e}var n=this,r=[0],i=[null],s=[],o=this.table,u="",a=0,f=0,l=0,c=2,h=1;this.lexer.setInput(t),this.lexer.yy=this.yy,this.yy.lexer=this.lexer,this.yy.parser=this,typeof this.lexer.yylloc=="undefined"&&(this.lexer.yylloc={});var p=this.lexer.yylloc;s.push(p);var d=this.lexer.options&&this.lexer.options.ranges;typeof this.yy.parseError=="function"&&(this.parseError=this.yy.parseError);var g,y,b,w,E,S,x={},T,N,C,k;for(;;){b=r[r.length-1];if(this.defaultActions[b])w=this.defaultActions[b];else{if(g===null||typeof g=="undefined")g=m();w=o[b]&&o[b][g]}if(typeof w=="undefined"||!w.length||!w[0]){var L="";if(!l){k=[];for(T in o[b])this.terminals_[T]&&T>2&&k.push("'"+this.terminals_[T]+"'");this.lexer.showPosition?L="Parse error on line "+(a+1)+":\n"+this.lexer.showPosition()+"\nExpecting "+k.join(", ")+", got '"+(this.terminals_[g]||g)+"'":L="Parse error on line "+(a+1)+": Unexpected "+(g==1?"end of input":"'"+(this.terminals_[g]||g)+"'"),this.parseError(L,{text:this.lexer.match,token:this.terminals_[g]||g,line:this.lexer.yylineno,loc:p,expected:k})}}if(w[0]instanceof Array&&w.length>1)throw new Error("Parse Error: multiple actions possible at state: "+b+", token: "+g);switch(w[0]){case 1:r.push(g),i.push(this.lexer.yytext),s.push(this.lexer.yylloc),r.push(w[1]),g=null,y?(g=y,y=null):(f=this.lexer.yyleng,u=this.lexer.yytext,a=this.lexer.yylineno,p=this.lexer.yylloc,l>0&&l--);break;case 2:N=this.productions_[w[1]][1],x.$=i[i.length-N],x._$={first_line:s[s.length-(N||1)].first_line,last_line:s[s.length-1].last_line,first_column:s[s.length-(N||1)].first_column,last_column:s[s.length-1].last_column},d&&(x._$.range=[s[s.length-(N||1)].range[0],s[s.length-1].range[1]]),S=this.performAction.call(x,u,f,a,this.yy,w[1],i,s);if(typeof S!="undefined")return S;N&&(r=r.slice(0,-1*N*2),i=i.slice(0,-1*N),s=s.slice(0,-1*N)),r.push(this.productions_[w[1]][0]),i.push(x.$),s.push(x._$),C=o[r[r.length-2]][r[r.length-1]],r.push(C);break;case 3:return!0}}return!0}},t=function(){var e={EOF:1,parseError:function(t,n){if(!this.yy.parser)throw new Error(t);this.yy.parser.parseError(t,n)},setInput:function(e){return this._input=e,this._more=this._less=this.done=!1,this.yylineno=this.yyleng=0,this.yytext=this.matched=this.match="",this.conditionStack=["INITIAL"],this.yylloc={first_line:1,first_column:0,last_line:1,last_column:0},this.options.ranges&&(this.yylloc.range=[0,0]),this.offset=0,this},input:function(){var e=this._input[0];this.yytext+=e,this.yyleng++,this.offset++,this.match+=e,this.matched+=e;var t=e.match(/(?:\r\n?|\n).*/g);return t?(this.yylineno++,this.yylloc.last_line++):this.yylloc.last_column++,this.options.ranges&&this.yylloc.range[1]++,this._input=this._input.slice(1),e},unput:function(e){var t=e.length,n=e.split(/(?:\r\n?|\n)/g);this._input=e+this._input,this.yytext=this.yytext.substr(0,this.yytext.length-t-1),this.offset-=t;var r=this.match.split(/(?:\r\n?|\n)/g);this.match=this.match.substr(0,this.match.length-1),this.matched=this.matched.substr(0,this.matched.length-1),n.length-1&&(this.yylineno-=n.length-1);var i=this.yylloc.range;return this.yylloc={first_line:this.yylloc.first_line,last_line:this.yylineno+1,first_column:this.yylloc.first_column,last_column:n?(n.length===r.length?this.yylloc.first_column:0)+r[r.length-n.length].length-n[0].length:this.yylloc.first_column-t},this.options.ranges&&(this.yylloc.range=[i[0],i[0]+this.yyleng-t]),this},more:function(){return this._more=!0,this},less:function(e){this.unput(this.match.slice(e))},pastInput:function(){var e=this.matched.substr(0,this.matched.length-this.match.length);return(e.length>20?"...":"")+e.substr(-20).replace(/\n/g,"")},upcomingInput:function(){var e=this.match;return e.length<20&&(e+=this._input.substr(0,20-e.length)),(e.substr(0,20)+(e.length>20?"...":"")).replace(/\n/g,"")},showPosition:function(){var e=this.pastInput(),t=(new Array(e.length+1)).join("-");return e+this.upcomingInput()+"\n"+t+"^"},next:function(){if(this.done)return this.EOF;this._input||(this.done=!0);var e,t,n,r,i,s;this._more||(this.yytext="",this.match="");var o=this._currentRules();for(var u=0;u<o.length;u++){n=this._input.match(this.rules[o[u]]);if(n&&(!t||n[0].length>t[0].length)){t=n,r=u;if(!this.options.flex)break}}if(t){s=t[0].match(/(?:\r\n?|\n).*/g),s&&(this.yylineno+=s.length),this.yylloc={first_line:this.yylloc.last_line,last_line:this.yylineno+1,first_column:this.yylloc.last_column,last_column:s?s[s.length-1].length-s[s.length-1].match(/\r?\n?/)[0].length:this.yylloc.last_column+t[0].length},this.yytext+=t[0],this.match+=t[0],this.matches=t,this.yyleng=this.yytext.length,this.options.ranges&&(this.yylloc.range=[this.offset,this.offset+=this.yyleng]),this._more=!1,this._input=this._input.slice(t[0].length),this.matched+=t[0],e=this.performAction.call(this,this.yy,this,o[r],this.conditionStack[this.conditionStack.length-1]),this.done&&this._input&&(this.done=!1);if(e)return e;return}return this._input===""?this.EOF:this.parseError("Lexical error on line "+(this.yylineno+1)+". Unrecognized text.\n"+this.showPosition(),{text:"",token:null,line:this.yylineno})},lex:function(){var t=this.next();return typeof t!="undefined"?t:this.lex()},begin:function(t){this.conditionStack.push(t)},popState:function(){return this.conditionStack.pop()},_currentRules:function(){return this.conditions[this.conditionStack[this.conditionStack.length-1]].rules},topState:function(){return this.conditionStack[this.conditionStack.length-2]},pushState:function(t){this.begin(t)}};return e.options={},e.performAction=function(t,n,r,i){var s=i;switch(r){case 0:return n.yytext="\\",14;case 1:n.yytext.slice(-1)!=="\\"&&this.begin("mu"),n.yytext.slice(-1)==="\\"&&(n.yytext=n.yytext.substr(0,n.yyleng-1),this.begin("emu"));if(n.yytext)return 14;break;case 2:return 14;case 3:return n.yytext.slice(-1)!=="\\"&&this.popState(),n.yytext.slice(-1)==="\\"&&(n.yytext=n.yytext.substr(0,n.yyleng-1)),14;case 4:return n.yytext=n.yytext.substr(0,n.yyleng-4),this.popState(),15;case 5:return 25;case 6:return 16;case 7:return 20;case 8:return 19;case 9:return 19;case 10:return 23;case 11:return 22;case 12:this.popState(),this.begin("com");break;case 13:return n.yytext=n.yytext.substr(3,n.yyleng-5),this.popState(),15;case 14:return 22;case 15:return 37;case 16:return 36;case 17:return 36;case 18:return 40;case 19:break;case 20:return this.popState(),24;case 21:return this.popState(),18;case 22:return n.yytext=n.yytext.substr(1,n.yyleng-2).replace(/\\"/g,'"'),31;case 23:return n.yytext=n.yytext.substr(1,n.yyleng-2).replace(/\\'/g,"'"),31;case 24:return 38;case 25:return 33;case 26:return 33;case 27:return 32;case 28:return 36;case 29:return n.yytext=n.yytext.substr(1,n.yyleng-2),36;case 30:return"INVALID";case 31:return 5}},e.rules=[/^(?:\\\\(?=(\{\{)))/,/^(?:[^\x00]*?(?=(\{\{)))/,/^(?:[^\x00]+)/,/^(?:[^\x00]{2,}?(?=(\{\{|$)))/,/^(?:[\s\S]*?--\}\})/,/^(?:\{\{>)/,/^(?:\{\{#)/,/^(?:\{\{\/)/,/^(?:\{\{\^)/,/^(?:\{\{\s*else\b)/,/^(?:\{\{\{)/,/^(?:\{\{&)/,/^(?:\{\{!--)/,/^(?:\{\{![\s\S]*?\}\})/,/^(?:\{\{)/,/^(?:=)/,/^(?:\.(?=[}\/ ]))/,/^(?:\.\.)/,/^(?:[\/.])/,/^(?:\s+)/,/^(?:\}\}\})/,/^(?:\}\})/,/^(?:"(\\["]|[^"])*")/,/^(?:'(\\[']|[^'])*')/,/^(?:@)/,/^(?:true(?=[}\s]))/,/^(?:false(?=[}\s]))/,/^(?:-?[0-9]+(?=[}\s]))/,/^(?:[^\s!"#%-,\.\/;->@\[-\^`\{-~]+(?=[=}\s\/.]))/,/^(?:\[[^\]]*\])/,/^(?:.)/,/^(?:$)/],e.conditions={mu:{rules:[5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],inclusive:!1},emu:{rules:[3],inclusive:!1},com:{rules:[4],inclusive:!1},INITIAL:{rules:[0,1,2,31],inclusive:!0}},e}();return e.lexer=t,n.prototype=e,e.Parser=n,new n}();e.Parser=s,e.parse=function(t){return t.constructor===e.AST.ProgramNode?t:(e.Parser.yy=e.AST,e.Parser.parse(t))},e.AST={},e.AST.ProgramNode=function(t,n){this.type="program",this.statements=t,n&&(this.inverse=new e.AST.ProgramNode(n))},e.AST.MustacheNode=function(e,t,n){this.type="mustache",this.escaped=!n,this.hash=t;var r=this.id=e[0],i=this.params=e.slice(1),s=this.eligibleHelper=r.isSimple;this.isHelper=s&&(i.length||t)},e.AST.PartialNode=function(e,t){this.type="partial",this.partialName=e,this.context=t},e.AST.BlockNode=function(t,n,r,i){var s=function(t,n){if(t.original!==n.original)throw new e.Exception(t.original+" doesn't match "+n.original)};s(t.id,i),this.type="block",this.mustache=t,this.program=n,this.inverse=r,this.inverse&&!this.program&&(this.isInverse=!0)},e.AST.ContentNode=function(e){this.type="content",this.string=e},e.AST.HashNode=function(e){this.type="hash",this.pairs=e},e.AST.IdNode=function(t){this.type="ID";var n="",r=[],i=0;for(var s=0,o=t.length;s<o;s++){var u=t[s].part;n+=(t[s].separator||"")+u;if(u===".."||u==="."||u==="this"){if(r.length>0)throw new e.Exception("Invalid path: "+n);u===".."?i++:this.isScoped=!0}else r.push(u)}this.original=n,this.parts=r,this.string=r.join("."),this.depth=i,this.isSimple=t.length===1&&!this.isScoped&&i===0,this.stringModeValue=this.string},e.AST.PartialNameNode=function(e){this.type="PARTIAL_NAME",this.name=e.original},e.AST.DataNode=function(e){this.type="DATA",this.id=e},e.AST.StringNode=function(e){this.type="STRING",this.original=this.string=this.stringModeValue=e},e.AST.IntegerNode=function(e){this.type="INTEGER",this.original=this.integer=e,this.stringModeValue=Number(e)},e.AST.BooleanNode=function(e){this.type="BOOLEAN",this.bool=e,this.stringModeValue=e==="true"},e.AST.CommentNode=function(e){this.type="comment",this.comment=e};var o=["description","fileName","lineNumber","message","name","number","stack"];e.Exception=function(e){var t=Error.prototype.constructor.apply(this,arguments);for(var n=0;n<o.length;n++)this[o[n]]=t[o[n]]},e.Exception.prototype=new Error,e.SafeString=function(e){this.string=e},e.SafeString.prototype.toString=function(){return this.string.toString()};var u={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#x27;","`":"&#x60;"},a=/[&<>"'`]/g,f=/[&<>"'`]/,l=function(e){return u[e]||"&amp;"};e.Utils={extend:function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n])},escapeExpression:function(t){return t instanceof e.SafeString?t.toString():t==null||t===!1?"":(t=t.toString(),f.test(t)?t.replace(a,l):t)},isEmpty:function(e){return!e&&e!==0?!0:n.call(e)==="[object Array]"&&e.length===0?!0:!1}};var c=e.Compiler=function(){},h=e.JavaScriptCompiler=function(){};c.prototype={compiler:c,disassemble:function(){var e=this.opcodes,t,n=[],r,i;for(var s=0,o=e.length;s<o;s++){t=e[s];if(t.opcode==="DECLARE")n.push("DECLARE "+t.name+"="+t.value);else{r=[];for(var u=0;u<t.args.length;u++)i=t.args[u],typeof i=="string"&&(i='"'+i.replace("\n","\\n")+'"'),r.push(i);n.push(t.opcode+" "+r.join(" "))}}return n.join("\n")},equals:function(e){var t=this.opcodes.length;if(e.opcodes.length!==t)return!1;for(var n=0;n<t;n++){var r=this.opcodes[n],i=e.opcodes[n];if(r.opcode!==i.opcode||r.args.length!==i.args.length)return!1;for(var s=0;s<r.args.length;s++)if(r.args[s]!==i.args[s])return!1}t=this.children.length;if(e.children.length!==t)return!1;for(n=0;n<t;n++)if(!this.children[n].equals(e.children[n]))return!1;return!0},guid:0,compile:function(e,t){this.children=[],this.depths={list:[]},this.options=t;var n=this.options.knownHelpers;this.options.knownHelpers={helperMissing:!0,blockHelperMissing:!0,each:!0,"if":!0,unless:!0,"with":!0,log:!0};if(n)for(var r in n)this.options.knownHelpers[r]=n[r];return this.program(e)},accept:function(e){return this[e.type](e)},program:function(e){var t=e.statements,n;this.opcodes=[];for(var r=0,i=t.length;r<i;r++)n=t[r],this[n.type](n);return this.isSimple=i===1,this.depths.list=this.depths.list.sort(function(e,t){return e-t}),this},compileProgram:function(e){var t=(new this.compiler).compile(e,this.options),n=this.guid++,r;this.usePartial=this.usePartial||t.usePartial,this.children[n]=t;for(var i=0,s=t.depths.list.length;i<s;i++){r=t.depths.list[i];if(r<2)continue;this.addDepth(r-1)}return n},block:function(e){var t=e.mustache,n=e.program,r=e.inverse;n&&(n=this.compileProgram(n)),r&&(r=this.compileProgram(r));var i=this.classifyMustache(t);i==="helper"?this.helperMustache(t,n,r):i==="simple"?(this.simpleMustache(t),this.opcode("pushProgram",n),this.opcode("pushProgram",r),this.opcode("emptyHash"),this.opcode("blockValue")):(this.ambiguousMustache(t,n,r),this.opcode("pushProgram",n),this.opcode("pushProgram",r),this.opcode("emptyHash"),this.opcode("ambiguousBlockValue")),this.opcode("append")},hash:function(e){var t=e.pairs,n,r;this.opcode("pushHash");for(var i=0,s=t.length;i<s;i++)n=t[i],r=n[1],this.options.stringParams?(r.depth&&this.addDepth(r.depth),this.opcode("getContext",r.depth||0),this.opcode("pushStringParam",r.stringModeValue,r.type)):this.accept(r),this.opcode("assignToHash",n[0]);this.opcode("popHash")},partial:function(e){var t=e.partialName;this.usePartial=!0,e.context?this.ID(e.context):this.opcode("push","depth0"),this.opcode("invokePartial",t.name),this.opcode("append")},content:function(e){this.opcode("appendContent",e.string)},mustache:function(e){var t=this.options,n=this.classifyMustache(e);n==="simple"?this.simpleMustache(e):n==="helper"?this.helperMustache(e):this.ambiguousMustache(e),e.escaped&&!t.noEscape?this.opcode("appendEscaped"):this.opcode("append")},ambiguousMustache:function(e,t,n){var r=e.id,i=r.parts[0],s=t!=null||n!=null;this.opcode("getContext",r.depth),this.opcode("pushProgram",t),this.opcode("pushProgram",n),this.opcode("invokeAmbiguous",i,s)},simpleMustache:function(e){var t=e.id;t.type==="DATA"?this.DATA(t):t.parts.length?this.ID(t):(this.addDepth(t.depth),this.opcode("getContext",t.depth),this.opcode("pushContext")),this.opcode("resolvePossibleLambda")},helperMustache:function(e,t,n){var r=this.setupFullMustacheParams(e,t,n),i=e.id.parts[0];if(this.options.knownHelpers[i])this.opcode("invokeKnownHelper",r.length,i);else{if(this.options.knownHelpersOnly)throw new Error("You specified knownHelpersOnly, but used the unknown helper "+i);this.opcode("invokeHelper",r.length,i)}},ID:function(e){this.addDepth(e.depth),this.opcode("getContext",e.depth);var t=e.parts[0];t?this.opcode("lookupOnContext",e.parts[0]):this.opcode("pushContext");for(var n=1,r=e.parts.length;n<r;n++)this.opcode("lookup",e.parts[n])},DATA:function(t){this.options.data=!0;if(t.id.isScoped||t.id.depth)throw new e.Exception("Scoped data references are not supported: "+t.original);this.opcode("lookupData");var n=t.id.parts;for(var r=0,i=n.length;r<i;r++)this.opcode("lookup",n[r])},STRING:function(e){this.opcode("pushString",e.string)},INTEGER:function(e){this.opcode("pushLiteral",e.integer)},BOOLEAN:function(e){this.opcode("pushLiteral",e.bool)},comment:function(){},opcode:function(e){this.opcodes.push({opcode:e,args:[].slice.call(arguments,1)})},declare:function(e,t){this.opcodes.push({opcode:"DECLARE",name:e,value:t})},addDepth:function(e){if(isNaN(e))throw new Error("EWOT");if(e===0)return;this.depths[e]||(this.depths[e]=!0,this.depths.list.push(e))},classifyMustache:function(e){var t=e.isHelper,n=e.eligibleHelper,r=this.options;if(n&&!t){var i=e.id.parts[0];r.knownHelpers[i]?t=!0:r.knownHelpersOnly&&(n=!1)}return t?"helper":n?"ambiguous":"simple"},pushParams:function(e){var t=e.length,n;while(t--)n=e[t],this.options.stringParams?(n.depth&&this.addDepth(n.depth),this.opcode("getContext",n.depth||0),this.opcode("pushStringParam",n.stringModeValue,n.type)):this[n.type](n)},setupMustacheParams:function(e){var t=e.params;return this.pushParams(t),e.hash?this.hash(e.hash):this.opcode("emptyHash"),t},setupFullMustacheParams:function(e,t,n){var r=e.params;return this.pushParams(r),this.opcode("pushProgram",t),this.opcode("pushProgram",n),e.hash?this.hash(e.hash):this.opcode("emptyHash"),r}};var p=function(e){this.value=e};h.prototype={nameLookup:function(e,t){return/^[0-9]+$/.test(t)?e+"["+t+"]":h.isValidJavaScriptVariableName(t)?e+"."+t:e+"['"+t+"']"},appendToBuffer
:function(e){return this.environment.isSimple?"return "+e+";":{appendToBuffer:!0,content:e,toString:function(){return"buffer += "+e+";"}}},initializeBuffer:function(){return this.quotedString("")},namespace:"Handlebars",compile:function(t,n,r,i){this.environment=t,this.options=n||{},e.log(e.logger.DEBUG,this.environment.disassemble()+"\n\n"),this.name=this.environment.name,this.isChild=!!r,this.context=r||{programs:[],environments:[],aliases:{}},this.preamble(),this.stackSlot=0,this.stackVars=[],this.registers={list:[]},this.compileStack=[],this.inlineStack=[],this.compileChildren(t,n);var s=t.opcodes,o;this.i=0;for(g=s.length;this.i<g;this.i++)o=s[this.i],o.opcode==="DECLARE"?this[o.name]=o.value:this[o.opcode].apply(this,o.args);return this.createFunctionContext(i)},nextOpcode:function(){var e=this.environment.opcodes;return e[this.i+1]},eat:function(){this.i=this.i+1},preamble:function(){var e=[];if(!this.isChild){var t=this.namespace,n="helpers = this.merge(helpers, "+t+".helpers);";this.environment.usePartial&&(n=n+" partials = this.merge(partials, "+t+".partials);"),this.options.data&&(n+=" data = data || {};"),e.push(n)}else e.push("");this.environment.isSimple?e.push(""):e.push(", buffer = "+this.initializeBuffer()),this.lastContext=0,this.source=e},createFunctionContext:function(t){var n=this.stackVars.concat(this.registers.list);n.length>0&&(this.source[1]=this.source[1]+", "+n.join(", "));if(!this.isChild)for(var r in this.context.aliases)this.context.aliases.hasOwnProperty(r)&&(this.source[1]=this.source[1]+", "+r+"="+this.context.aliases[r]);this.source[1]&&(this.source[1]="var "+this.source[1].substring(2)+";"),this.isChild||(this.source[1]+="\n"+this.context.programs.join("\n")+"\n"),this.environment.isSimple||this.source.push("return buffer;");var i=this.isChild?["depth0","data"]:["Handlebars","depth0","helpers","partials","data"];for(var s=0,o=this.environment.depths.list.length;s<o;s++)i.push("depth"+this.environment.depths.list[s]);var u=this.mergeSource();if(!this.isChild){var a=e.COMPILER_REVISION,f=e.REVISION_CHANGES[a];u="this.compilerInfo = ["+a+",'"+f+"'];\n"+u}if(t)return i.push(u),Function.apply(this,i);var l="function "+(this.name||"")+"("+i.join(",")+") {\n  "+u+"}";return e.log(e.logger.DEBUG,l+"\n\n"),l},mergeSource:function(){var e="",n;for(var r=0,i=this.source.length;r<i;r++){var s=this.source[r];s.appendToBuffer?n?n=n+"\n    + "+s.content:n=s.content:(n&&(e+="buffer += "+n+";\n  ",n=t),e+=s+"\n  ")}return e},blockValue:function(){this.context.aliases.blockHelperMissing="helpers.blockHelperMissing";var e=["depth0"];this.setupParams(0,e),this.replaceStack(function(t){return e.splice(1,0,t),"blockHelperMissing.call("+e.join(", ")+")"})},ambiguousBlockValue:function(){this.context.aliases.blockHelperMissing="helpers.blockHelperMissing";var e=["depth0"];this.setupParams(0,e);var t=this.topStack();e.splice(1,0,t),e[e.length-1]="options",this.source.push("if (!"+this.lastHelper+") { "+t+" = blockHelperMissing.call("+e.join(", ")+"); }")},appendContent:function(e){this.source.push(this.appendToBuffer(this.quotedString(e)))},append:function(){this.flushInline();var e=this.popStack();this.source.push("if("+e+" || "+e+" === 0) { "+this.appendToBuffer(e)+" }"),this.environment.isSimple&&this.source.push("else { "+this.appendToBuffer("''")+" }")},appendEscaped:function(){this.context.aliases.escapeExpression="this.escapeExpression",this.source.push(this.appendToBuffer("escapeExpression("+this.popStack()+")"))},getContext:function(e){this.lastContext!==e&&(this.lastContext=e)},lookupOnContext:function(e){this.push(this.nameLookup("depth"+this.lastContext,e,"context"))},pushContext:function(){this.pushStackLiteral("depth"+this.lastContext)},resolvePossibleLambda:function(){this.context.aliases.functionType='"function"',this.replaceStack(function(e){return"typeof "+e+" === functionType ? "+e+".apply(depth0) : "+e})},lookup:function(e){this.replaceStack(function(t){return t+" == null || "+t+" === false ? "+t+" : "+this.nameLookup(t,e,"context")})},lookupData:function(e){this.push("data")},pushStringParam:function(e,t){this.pushStackLiteral("depth"+this.lastContext),this.pushString(t),typeof e=="string"?this.pushString(e):this.pushStackLiteral(e)},emptyHash:function(){this.pushStackLiteral("{}"),this.options.stringParams&&(this.register("hashTypes","{}"),this.register("hashContexts","{}"))},pushHash:function(){this.hash={values:[],types:[],contexts:[]}},popHash:function(){var e=this.hash;this.hash=t,this.options.stringParams&&(this.register("hashContexts","{"+e.contexts.join(",")+"}"),this.register("hashTypes","{"+e.types.join(",")+"}")),this.push("{\n    "+e.values.join(",\n    ")+"\n  }")},pushString:function(e){this.pushStackLiteral(this.quotedString(e))},push:function(e){return this.inlineStack.push(e),e},pushLiteral:function(e){this.pushStackLiteral(e)},pushProgram:function(e){e!=null?this.pushStackLiteral(this.programExpression(e)):this.pushStackLiteral(null)},invokeHelper:function(e,t){this.context.aliases.helperMissing="helpers.helperMissing";var n=this.lastHelper=this.setupHelper(e,t,!0),r=this.nameLookup("depth"+this.lastContext,t,"context");this.push(n.name+" || "+r),this.replaceStack(function(e){return e+" ? "+e+".call("+n.callParams+") "+": helperMissing.call("+n.helperMissingParams+")"})},invokeKnownHelper:function(e,t){var n=this.setupHelper(e,t);this.push(n.name+".call("+n.callParams+")")},invokeAmbiguous:function(e,t){this.context.aliases.functionType='"function"',this.pushStackLiteral("{}");var n=this.setupHelper(0,e,t),r=this.lastHelper=this.nameLookup("helpers",e,"helper"),i=this.nameLookup("depth"+this.lastContext,e,"context"),s=this.nextStack();this.source.push("if ("+s+" = "+r+") { "+s+" = "+s+".call("+n.callParams+"); }"),this.source.push("else { "+s+" = "+i+"; "+s+" = typeof "+s+" === functionType ? "+s+".apply(depth0) : "+s+"; }")},invokePartial:function(e){var t=[this.nameLookup("partials",e,"partial"),"'"+e+"'",this.popStack(),"helpers","partials"];this.options.data&&t.push("data"),this.context.aliases.self="this",this.push("self.invokePartial("+t.join(", ")+")")},assignToHash:function(e){var t=this.popStack(),n,r;this.options.stringParams&&(r=this.popStack(),n=this.popStack());var i=this.hash;n&&i.contexts.push("'"+e+"': "+n),r&&i.types.push("'"+e+"': "+r),i.values.push("'"+e+"': ("+t+")")},compiler:h,compileChildren:function(e,t){var n=e.children,r,i;for(var s=0,o=n.length;s<o;s++){r=n[s],i=new this.compiler;var u=this.matchExistingProgram(r);u==null?(this.context.programs.push(""),u=this.context.programs.length,r.index=u,r.name="program"+u,this.context.programs[u]=i.compile(r,t,this.context),this.context.environments[u]=r):(r.index=u,r.name="program"+u)}},matchExistingProgram:function(e){for(var t=0,n=this.context.environments.length;t<n;t++){var r=this.context.environments[t];if(r&&r.equals(e))return t}},programExpression:function(e){this.context.aliases.self="this";if(e==null)return"self.noop";var t=this.environment.children[e],n=t.depths.list,r,i=[t.index,t.name,"data"];for(var s=0,o=n.length;s<o;s++)r=n[s],r===1?i.push("depth0"):i.push("depth"+(r-1));return(n.length===0?"self.program(":"self.programWithDepth(")+i.join(", ")+")"},register:function(e,t){this.useRegister(e),this.source.push(e+" = "+t+";")},useRegister:function(e){this.registers[e]||(this.registers[e]=!0,this.registers.list.push(e))},pushStackLiteral:function(e){return this.push(new p(e))},pushStack:function(e){this.flushInline();var t=this.incrStack();return e&&this.source.push(t+" = "+e+";"),this.compileStack.push(t),t},replaceStack:function(e){var t="",n=this.isInline(),r;if(n){var i=this.popStack(!0);if(i instanceof p)r=i.value;else{var s=this.stackSlot?this.topStackName():this.incrStack();t="("+this.push(s)+" = "+i+"),",r=this.topStack()}}else r=this.topStack();var o=e.call(this,r);return n?((this.inlineStack.length||this.compileStack.length)&&this.popStack(),this.push("("+t+o+")")):(/^stack/.test(r)||(r=this.nextStack()),this.source.push(r+" = ("+t+o+");")),r},nextStack:function(){return this.pushStack()},incrStack:function(){return this.stackSlot++,this.stackSlot>this.stackVars.length&&this.stackVars.push("stack"+this.stackSlot),this.topStackName()},topStackName:function(){return"stack"+this.stackSlot},flushInline:function(){var e=this.inlineStack;if(e.length){this.inlineStack=[];for(var t=0,n=e.length;t<n;t++){var r=e[t];r instanceof p?this.compileStack.push(r):this.pushStack(r)}}},isInline:function(){return this.inlineStack.length},popStack:function(e){var t=this.isInline(),n=(t?this.inlineStack:this.compileStack).pop();return!e&&n instanceof p?n.value:(t||this.stackSlot--,n)},topStack:function(e){var t=this.isInline()?this.inlineStack:this.compileStack,n=t[t.length-1];return!e&&n instanceof p?n.value:n},quotedString:function(e){return'"'+e.replace(/\\/g,"\\\\").replace(/"/g,'\\"').replace(/\n/g,"\\n").replace(/\r/g,"\\r").replace(/\u2028/g,"\\u2028").replace(/\u2029/g,"\\u2029")+'"'},setupHelper:function(e,t,n){var r=[];this.setupParams(e,r,n);var i=this.nameLookup("helpers",t,"helper");return{params:r,name:i,callParams:["depth0"].concat(r).join(", "),helperMissingParams:n&&["depth0",this.quotedString(t)].concat(r).join(", ")}},setupParams:function(e,t,n){var r=[],i=[],s=[],o,u,a;r.push("hash:"+this.popStack()),u=this.popStack(),a=this.popStack();if(a||u)a||(this.context.aliases.self="this",a="self.noop"),u||(this.context.aliases.self="this",u="self.noop"),r.push("inverse:"+u),r.push("fn:"+a);for(var f=0;f<e;f++)o=this.popStack(),t.push(o),this.options.stringParams&&(s.push(this.popStack()),i.push(this.popStack()));return this.options.stringParams&&(r.push("contexts:["+i.join(",")+"]"),r.push("types:["+s.join(",")+"]"),r.push("hashContexts:hashContexts"),r.push("hashTypes:hashTypes")),this.options.data&&r.push("data:data"),r="{"+r.join(",")+"}",n?(this.register("options",r),t.push("options")):t.push(r),t.join(", ")}};var d="break else new var case finally return void catch for switch while continue function this with default if throw delete in try do instanceof typeof abstract enum int short boolean export interface static byte extends long super char final native synchronized class float package throws const goto private transient debugger implements protected volatile double import public let yield".split(" "),v=h.RESERVED_WORDS={};for(var m=0,g=d.length;m<g;m++)v[d[m]]=!0;h.isValidJavaScriptVariableName=function(e){return!h.RESERVED_WORDS[e]&&/^[a-zA-Z_$][0-9a-zA-Z_$]+$/.test(e)?!0:!1},e.precompile=function(t,n){if(t==null||typeof t!="string"&&t.constructor!==e.AST.ProgramNode)throw new e.Exception("You must pass a string or Handlebars AST to Handlebars.precompile. You passed "+t);n=n||{},"data"in n||(n.data=!0);var r=e.parse(t),i=(new c).compile(r,n);return(new h).compile(i,n)},e.compile=function(n,r){function s(){var i=e.parse(n),s=(new c).compile(i,r),o=(new h).compile(s,r,t,!0);return e.template(o)}if(n==null||typeof n!="string"&&n.constructor!==e.AST.ProgramNode)throw new e.Exception("You must pass a string or Handlebars AST to Handlebars.compile. You passed "+n);r=r||{},"data"in r||(r.data=!0);var i;return function(e,t){return i||(i=s()),i.call(this,e,t)}},e.VM={template:function(t){var n={escapeExpression:e.Utils.escapeExpression,invokePartial:e.VM.invokePartial,programs:[],program:function(t,n,r){var i=this.programs[t];return r?i=e.VM.program(t,n,r):i||(i=this.programs[t]=e.VM.program(t,n)),i},merge:function(t,n){var r=t||n;return t&&n&&(r={},e.Utils.extend(r,n),e.Utils.extend(r,t)),r},programWithDepth:e.VM.programWithDepth,noop:e.VM.noop,compilerInfo:null};return function(r,i){i=i||{};var s=t.call(n,e,r,i.helpers,i.partials,i.data),o=n.compilerInfo||[],u=o[0]||1,a=e.COMPILER_REVISION;if(u!==a){if(u<a){var f=e.REVISION_CHANGES[a],l=e.REVISION_CHANGES[u];throw"Template was precompiled with an older version of Handlebars than the current runtime. Please update your precompiler to a newer version ("+f+") or downgrade your runtime to an older version ("+l+")."}throw"Template was precompiled with a newer version of Handlebars than the current runtime. Please update your runtime to a newer version ("+o[1]+")."}return s}},programWithDepth:function(e,t,n){var r=Array.prototype.slice.call(arguments,3),i=function(e,i){return i=i||{},t.apply(this,[e,i.data||n].concat(r))};return i.program=e,i.depth=r.length,i},program:function(e,t,n){var r=function(e,r){return r=r||{},t(e,r.data||n)};return r.program=e,r.depth=0,r},noop:function(){return""},invokePartial:function(n,r,i,s,o,u){var a={helpers:s,partials:o,data:u};if(n===t)throw new e.Exception("The partial "+r+" could not be found");if(n instanceof Function)return n(i,a);if(!e.compile)throw new e.Exception("The partial "+r+" could not be compiled when running in runtime-only mode");return o[r]=e.compile(n,{data:u!==t}),o[r](i,a)}},e.template=e.VM.template})(Handlebars),function(e){function t(){var t=this;t.VERSION="0.1",t.templates={},t.addTemplate=function(n,r){if(t[n])throw"Invalid name: "+n+".";if(t.templates[n])throw'Template " + name + " exists';t.templates[n]=Handlebars.compile(r),t[n]=function(r,i){r=r||{};var s=t.templates[n](r);return i?s:e(s)}},t.addPartial=function(e,t){if(Handlebars.partials[e])throw'Partial " + name + " exists';Handlebars.registerPartial(e,t)},t.addHelper=function(e,t,n){if(Handlebars.helpers[e])throw'Helper " + name + " exists';typeof t=="function"?Handlebars.registerHelper(e,t):Handlebars.registerHelper(e,new Function(n,t))},t.grabTemplates=function(){e('script[type="text/html"]').each(function(n,r){var i=e(typeof n=="number"?r:n),s="".trim?i.html().trim():e.trim(i.html());i.hasClass("partial")?t.addPartial(i.attr("id"),s):i.hasClass("helper")?t.addHelper(i.attr("id"),s,i.attr("data-args")):t.addTemplate(i.attr("id"),s)})},t.clearAll=function(){for(var e in t.templates)delete t[e];t.templates={},Handlebars.partials={}},t.refresh=function(){t.clearAll(),t.grabTemplates()}}window.ich=new t,e(function(){ich.grabTemplates()})}(window.jQuery||window.Zepto),function(e){function i(e,t){var n=Math.pow(10,t);return Math.round(e*n)/n}function s(e,t){var n=parseInt(e.css(t),10);if(n)return n;var r=e[0].currentStyle;return r&&r.width&&parseInt(r.width,10)}function o(e){var t=e.data("events");return t&&t.onSlide}function u(t,n){function k(e,s,o,u){o===undefined?o=s/v*b:u&&(o-=n.min),w&&(o=Math.round(o/w)*w);if(s===undefined||w)s=o*v/b;if(isNaN(o))return r;s=Math.max(0,Math.min(s,v)),o=s/v*b;if(u||!f)o+=n.min;f&&(u?s=v-s:o=n.max-o),o=i(o,E);var a=e.type=="click";if(C&&l!==undefined&&!a){e.type="onSlide",N.trigger(e,[o,s]);if(e.isDefaultPrevented())return r}var d=a?n.speed:0,S=a?function(){e.type="change",N.trigger(e,[o])}:null;return f?(g.animate({top:s},d,S),n.progress&&y.animate({height:v-s+g.height()/2},d)):(g.animate({left:s},d,S),n.progress&&y.animate({width:s+g.width()/2},d)),h||(c=l!==o&&e.type!="drag"&&e.type!="api"),l=o,m=s,p=n.formatValue?n.formatValue(o):o,t.val(p),c&&N.trigger("changeValue",[o]),r}function L(e){var i=t.val();i=n.parseValue?n.parseValue(i):i,r.setValue(i,e)}function A(){f=n.vertical||s(a,"height")>s(a,"width"),f?(v=s(a,"height")-s(g,"height"),d=a.offset().top+v):(v=s(a,"width")-s(g,"width"),d=a.offset().left)}function O(){A(),r.setValue(n.value!==undefined?n.value:n.min)}var r=this,u=n.css,a=e("<div><div/><a href='#'/></div>").data("rangeinput",r),f,l,c=!1,h=!1,p,d,v,m;t.before(a);var g=a.addClass(u.slider).find("a").addClass(u.handle),y=a.find("div").addClass(u.progress);e.each("min,max,step,value".split(","),function(e,r){var i=t.attr(r);parseFloat(i)&&(n[r]=parseFloat(i,10))});var b=n.max-n.min,w=n.step=="any"?0:n.step,E=n.precision;if(E===undefined)try{E=w.toString().split(".")[1].length}catch(S){E=0}if(t.attr("type")=="range"){var x=t.clone().wrap("<div/>").parent().html(),T=e(x.replace(/type/i,"type=text data-orig-type"));T.val(n.value),t.replaceWith(T),t=T}t.addClass(u.input);var N=e(r).add(t),C=!0;e.extend(r,{getValue:function(){return l},getDisplayValue:function(){return p},setValue:function(t,n){return A(),k(n||e.Event("api"),undefined,t,!0)},getConf:function(){return n},updateFromInput:function(e){return L(e),this},suppressChangeValue:function(e){return typeof e=="boolean"&&(h=e),this},getProgress:function(){return y},getHandle:function(){return g},getInput:function(){return t},step:function(t,i){i=i||e.Event();var s=n.step=="any"?1:n.step;r.setValue(l+s*(t||1),i)},stepUp:function(e){return r.step(e||1)},stepDown:function(e){return r.step(-e||-1)}}),e.each("onSlide,change".split(","),function(t,i){e.isFunction(n[i])&&e(r).bind(i,n[i]),r[i]=function(t){return t&&e(r).bind(i,t),r}}),g.drag({drag:!1}).bind("dragStart",function(){A(),C=o(e(r))||o(t)}).bind("drag",function(e,n,r){if(t.is(":disabled"))return!1;k(e,f?n:r)}).bind("dragEnd",function(e){e.isDefaultPrevented()||(e.type="change",N.trigger(e,[l]),N.trigger("changeValue",[l]))}).click(function(e){return e.preventDefault()}),a.click(function(e){if(t.is(":disabled")||e.target==g[0])return e.preventDefault();A();var n=f?g.height()/2:g.width()/2;k(e,f?v-d-n+e.pageY:e.pageX-d-n)}),n.keyboard&&t.keydown(function(n){if(t.attr("readonly"))return;var i=n.keyCode,s=e([75,76,38,33,39]).index(i)!=-1,o=e([74,72,40,34,37]).index(i)!=-1;if((s||o)&&!(n.shiftKey||n.altKey||n.ctrlKey))return s?r.step(i==33?10:1,n):o&&r.step(i==34?-10:-1,n),n.preventDefault()}),t.blur(function(t){var i=e(this).val();i=n.parseValue?n.parseValue(i):i,i!==l&&r.setValue(i,t)}),e.extend(t[0],{stepUp:r.stepUp,stepDown:r.stepDown}),O(),v||e(window).load(O)}e.tools=e.tools||{version:"1.2.6.R8"};var t;t=e.tools.rangeinput={conf:{min:0,max:100,step:"any",steps:0,value:0,precision:undefined,vertical:0,keyboard:!0,progress:!1,speed:100,formatValue:null,parseValue:null,css:{input:"range",slider:"slider",progress:"progress",handle:"handle"}}};var n,r;e.fn.drag=function(t){return t=e.extend({x:!0,y:!0,drag:!0,_ie_disableDragStart:!0},t),e.browser.msie&&this.bind("dragstart",function(){return!1}),n=n||e(document).bind("mousedown mouseup touchstart touchend",function(i){var s=e(i.target);if(i.type!="mousedown"&&i.type!="touchstart"||!s.data("drag"))try{r&&r.trigger("dragEnd")}finally{n.unbind("mousemove.drag touchmove.drag"),r=null}else{var o,u;i.type=="touchstart"?(o=i.originalEvent.targetTouches[0].pageX,u=i.originalEvent.targetTouches[0].pageY):(o=i.pageX,u=i.pageY);var a=s.position(),f=o-a.left,l=u-a.top,c=!0;n.bind("mousemove.drag touchmove.drag",function(e){var n,i;e.type=="touchmove"?(n=e.originalEvent.targetTouches[0].pageX,i=e.originalEvent.targetTouches[0].pageY):(n=e.pageX,i=e.pageY);var o=n-f,u=i-l,a={};t.x&&(a.left=o),t.y&&(a.top=u),c&&(s.trigger("dragStart"),c=!1),t.drag&&s.css(a),s.trigger("drag",[u,o]),r=s}),i.preventDefault()}}),this.data("drag",!0)},e.expr[":"].range=function(t){var n=t.getAttribute("type");return n&&n=="range"||!!e(t).filter("input").data("rangeinput")},e.fn.rangeinput=function(n){if(this.data("rangeinput"))return this;n=e.extend(!0,{},t.conf,n);var r;return this.each(function(){var t=new u(e(this),e.extend(!0,{},n)),i=t.getInput().data("rangeinput",t);r=r?r.add(i):i}),r?r:this}}(jQuery),window.Modernizr=function(e,t,n){function r(e){p.cssText=e}function i(e,t){return r(m.join(e+";")+(t||""))}function s(e,t){return typeof e===t}function o(e,t){return!!~(""+e).indexOf(t)}function u(e,t,r){for(var i in e){var o=t[e[i]];if(o!==n)return r===!1?e[i]:s(o,"function")?o.bind(r||t):o}return!1}var a="2.6.2",f={},l=t.documentElement,c="modernizr",h=t.createElement(c),p=h.style,d,v={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),g={},y={},b={},w=[],E=w.slice,S,x=function(e,n,r,i){var s,o,u,a,f=t.createElement("div"),h=t.body,p=h||t.createElement("body");if(parseInt(r,10))while(r--)u=t.createElement("div"),u.id=i?i[r]:c+(r+1),f.appendChild(u);return s=["&#173;",'<style id="s',c,'">',e,"</style>"].join(""),f.id=c,(h?f:p).innerHTML+=s,p.appendChild(f),h||(p.style.background="",p.style.overflow="hidden",a=l.style.overflow,l.style.overflow="hidden",l.appendChild(p)),o=n(f,e),h?f.parentNode.removeChild(f):(p.parentNode.removeChild(p),l.style.overflow=a),!!o},T={}.hasOwnProperty,N;!s(T,"undefined")&&!s(T.call,"undefined")?N=function(e,t){return T.call(e,t)}:N=function(e,t){return t in e&&s(e.constructor.prototype[t],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(e){var t=this;if(typeof t!="function")throw new TypeError;var n=E.call(arguments,1),r=function(){if(this instanceof r){var i=function(){};i.prototype=t.prototype;var s=new i,o=t.apply(s,n.concat(E.call(arguments)));return Object(o)===o?o:s}return t.apply(e,n.concat(E.call(arguments)))};return r}),g.touch=function(){var n;return"ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch?n=!0:x(["@media (",m.join("touch-enabled),("),c,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(e){n=e.offsetTop===9}),n};for(var C in g)N(g,C)&&(S=C.toLowerCase(),f[S]=g[C](),w.push((f[S]?"":"no-")+S));return f.addTest=function(e,t){if(typeof e=="object")for(var r in e)N(e,r)&&f.addTest(r,e[r]);else{e=e.toLowerCase();if(f[e]!==n)return f;t=typeof t=="function"?t():t,typeof enableClasses!="undefined"&&enableClasses&&(l.className+=" "+(t?"":"no-")+e),f[e]=t}return f},r(""),h=d=null,f._version=a,f._prefixes=m,f.testStyles=x,f}(this,this.document),function(e){function n(t,n,r){var i=r.relative?t.position().top:t.offset().top,s=r.relative?t.position().left:t.offset().left,o=r.position[0];i-=n.outerHeight()-r.offset[0],s+=t.outerWidth()+r.offset[1],/iPad/i.test(navigator.userAgent)&&(i-=e(window).scrollTop());var u=n.outerHeight()+t.outerHeight();o=="center"&&(i+=u/2),o=="bottom"&&(i+=u),o=r.position[1];var a=n.outerWidth()+t.outerWidth();return o=="center"&&(s-=a/2),o=="left"&&(s-=a),{top:i,left:s}}function r(r,i){var s=this,o=r.add(s),u,a=0,f=0,l=r.attr("title"),c=r.attr("data-tooltip"),h=t[i.effect],p,d=r.is(":input"),v=d&&r.is(":checkbox, :radio, select, :button, :submit"),m=r.attr("type"),g=i.events[m]||i.events[d?v?"widget":"input":"def"];if(!h)throw'Nonexistent effect "'+i.effect+'"';g=g.split(/,\s*/);if(g.length!=2)throw"Tooltip: bad events configuration for "+m;r.bind(g[0],function(e){clearTimeout(a),i.predelay?f=setTimeout(function(){s.show(e)},i.predelay):s.show(e)}).bind(g[1],function(e){clearTimeout(f),i.delay?a=setTimeout(function(){s.hide(e)},i.delay):s.hide(e)}),l&&i.cancelDefault&&(r.removeAttr("title"),r.data("title",l)),e.extend(s,{show:function(t){if(!u){c?u=e(c):i.tip?u=e(i.tip).eq(0):l?u=e(i.layout).addClass(i.tipClass).appendTo(document.body).hide().append(l):(u=r.next(),u.length||(u=r.parent().next()));if(!u.length)throw"Cannot find tooltip for "+r}if(s.isShown())return s;u.stop(!0,!0);var d=n(r,u,i);i.tip&&u.html(r.data("title")),t=e.Event(),t.type="onBeforeShow",o.trigger(t,[d]);if(t.isDefaultPrevented())return s;d=n(r,u,i),u.css({position:"absolute",top:d.top,left:d.left}),p=!0,h[0].call(s,function(){t.type="onShow",p="full",o.trigger(t)});var v=i.events.tooltip.split(/,\s*/);return u.data("__set")||(u.unbind(v[0]).bind(v[0],function(){clearTimeout(a),clearTimeout(f)}),v[1]&&!r.is("input:not(:checkbox, :radio), textarea")&&u.unbind(v[1]).bind(v[1],function(e){e.relatedTarget!=r[0]&&r.trigger(g[1].split(" ")[0])}),i.tip||u.data("__set",!0)),s},hide:function(n){if(!u||!s.isShown())return s;n=e.Event(),n.type="onBeforeHide",o.trigger(n);if(n.isDefaultPrevented())return;return p=!1,t[i.effect][1].call(s,function(){n.type="onHide",o.trigger(n)}),s},isShown:function(e){return e?p=="full":p},getConf:function(){return i},getTip:function(){return u},getTrigger:function(){return r}}),e.each("onHide,onBeforeShow,onShow,onBeforeHide".split(","),function(t,n){e.isFunction(i[n])&&e(s).bind(n,i[n]),s[n]=function(t){return t&&e(s).bind(n,t),s}})}e.tools=e.tools||{version:"1.2.6.R8"},e.tools.tooltip={conf:{effect:"toggle",fadeOutSpeed:"fast",predelay:0,delay:30,opacity:1,tip:0,fadeIE:!1,position:["top","center"],offset:[0,0],relative:!1,cancelDefault:!0,events:{def:"mouseenter,mouseleave",input:"focus,blur",widget:"focus mouseenter,blur mouseleave",tooltip:"mouseenter,mouseleave"},layout:"<div/>",tipClass:"tooltip"},addEffect:function(e,n,r){t[e]=[n,r]}};var t={toggle:[function(e){var t=this.getConf(),n=this.getTip(),r=t.opacity;r<1&&n.css({opacity:r}),n.show(),e.call()},function(e){this.getTip().hide(),e.call()}],fade:[function(t){var n=this.getConf();!e.browser.msie||n.fadeIE?this.getTip().fadeTo(n.fadeInSpeed,n.opacity,t):(this.getTip().show(),t())},function(t){var n=this.getConf();!e.browser.msie||n.fadeIE?this.getTip().fadeOut(n.fadeOutSpeed,t):(this.getTip().hide(),t())}]};e.fn.tooltip=function(t){var n=this.data("tooltip");return n?n:(t=e.extend(!0,{},e.tools.tooltip.conf,t),typeof t.position=="string"&&(t.position=t.position.split(/,?\s/)),this.each(function(){n=new r(e(this),t),e(this).data("tooltip",n)}),t.api?n:this)}}(jQuery),function(e){e.widget("ui.selectmenu",{options:{appendTo:"body",typeAhead:1e3,style:"dropdown",positionOptions:{my:"left top",at:"left bottom",offset:null},width:null,menuWidth:null,handleWidth:26,maxHeight:null,icons:null,format:null,escapeHtml:!1,bgImage:function(){}},_create:function(){var t=this,n=this.options,r=(this.element.attr("id")||"ui-selectmenu-"+Math.random().toString(16).slice(2,10)).replace(/(:|\.)/g,"");this.ids=[r,r+"-button",r+"-menu"],this._safemouseup=!0,this.isOpen=!1,this.newelement=e("<a />",{"class":this.widgetBaseClass+" ui-widget ui-state-default ui-corner-all",id:this.ids[1],role:"button",href:"#nogo",tabindex:this.element.attr("disabled")?1:0,"aria-haspopup":!0,"aria-owns":this.ids[2]}),this.newelementWrap=e("<span />").append(this.newelement).insertAfter(this.element);var i=this.element.attr("tabindex");i&&this.newelement.attr("tabindex",i),this.newelement.data("selectelement",this.element),this.selectmenuIcon=e('<span class="'+this.widgetBaseClass+'-icon ui-icon"></span>').prependTo(this.newelement),this.newelement.prepend('<span class="'+t.widgetBaseClass+'-status" />'),this.element.bind({"click.selectmenu":function(e){t.newelement.focus(),e.preventDefault()}}),this.newelement.bind("mousedown.selectmenu",function(e){return t._toggle(e,!0),n.style=="popup"&&(t._safemouseup=!1,setTimeout(function(){t._safemouseup=!0},300)),!1}).bind("click.selectmenu",function(){return!1}).bind("keydown.selectmenu",function(n){var r=!1;switch(n.keyCode){case e.ui.keyCode.ENTER:r=!0;break;case e.ui.keyCode.SPACE:t._toggle(n);break;case e.ui.keyCode.UP:n.altKey?t.open(n):t._moveSelection(-1);break;case e.ui.keyCode.DOWN:n.altKey?t.open(n):t._moveSelection(1);break;case e.ui.keyCode.LEFT:t._moveSelection(-1);break;case e.ui.keyCode.RIGHT:t._moveSelection(1);break;case e.ui.keyCode.TAB:r=!0;break;case e.ui.keyCode.PAGE_UP:case e.ui.keyCode.HOME:t.index(0);break;case e.ui.keyCode.PAGE_DOWN:case e.ui.keyCode.END:t.index(t._optionLis.length);break;default:r=!0}return r}).bind("keypress.selectmenu",function(e){return e.which>0&&t._typeAhead(e.which,"mouseup"),!0}).bind("mouseover.selectmenu",function(){n.disabled||e(this).addClass("ui-state-hover")}).bind("mouseout.selectmenu",function(){n.disabled||e(this).removeClass("ui-state-hover")}).bind("focus.selectmenu",function(){n.disabled||e(this).addClass("ui-state-focus")}).bind("blur.selectmenu",function(){n.disabled||e(this).removeClass("ui-state-focus")}),e(document).bind("mousedown.selectmenu-"+this.ids[0],function(e){t.isOpen&&t.close(e)}),this.element.bind("click.selectmenu",function(){t._refreshValue()}).bind("focus.selectmenu",function(){t.newelement&&t.newelement[0].focus()}),n.width||(n.width=this.element.outerWidth()),this.newelement.width(n.width),this.element.hide(),this.list=e("<ul />",{"class":"ui-widget ui-widget-content","aria-hidden":!0,role:"listbox","aria-labelledby":this.ids[1],id:this.ids[2]}),this.listWrap=e("<div />",{"class":t.widgetBaseClass+"-menu"}).append(this.list).appendTo(n.appendTo),this.list.bind("keydown.selectmenu",function(n){var r=!1;switch(n.keyCode){case e.ui.keyCode.UP:n.altKey?t.close(n,!0):t._moveFocus(-1);break;case e.ui.keyCode.DOWN:n.altKey?t.close(n,!0):t._moveFocus(1);break;case e.ui.keyCode.LEFT:t._moveFocus(-1);break;case e.ui.keyCode.RIGHT:t._moveFocus(1);break;case e.ui.keyCode.HOME:t._moveFocus(":first");break;case e.ui.keyCode.PAGE_UP:t._scrollPage("up");break;case e.ui.keyCode.PAGE_DOWN:t._scrollPage("down");break;case e.ui.keyCode.END:t._moveFocus(":last");break;case e.ui.keyCode.ENTER:case e.ui.keyCode.SPACE:t.close(n,!0),e(n.target).parents("li:eq(0)").trigger("mouseup");break;case e.ui.keyCode.TAB:r=!0,t.close(n,!0),e(n.target).parents("li:eq(0)").trigger("mouseup");break;case e.ui.keyCode.ESCAPE:t.close(n,!0);break;default:r=!0}return r}).bind("keypress.selectmenu",function(e){return e.which>0&&t._typeAhead(e.which,"focus"),!0}).bind("mousedown.selectmenu mouseup.selectmenu",function(){return!1}),e(window).bind("resize.selectmenu-"+this.ids[0],e.proxy(t.close,this))},_init:function(){var t=this,n=this.options,r=[];this.element.find("option").each(function(){var i=e(this);r.push({value:i.attr("value"),text:t._formatText(i.text(),i),selected:i.attr("selected"),disabled:i.attr("disabled"),classes:i.attr("class"),typeahead:i.attr("typeahead"),parentOptGroup:i.parent("optgroup"),bgImage:n.bgImage.call(i)})});var i=t.options.style=="popup"?" ui-state-active":"";this.list.html("");if(r.length)for(var s=0;s<r.length;s++){var o={role:"presentation"};r[s].disabled&&(o["class"]=this.namespace+"-state-disabled");var u={html:r[s].text||"&nbsp;",href:"#nogo",tabindex:-1,role:"option","aria-selected":!1};r[s].disabled&&(u["aria-disabled"]=r[s].disabled),r[s].typeahead&&(u.typeahead=r[s].typeahead);var a=e("<a/>",u).bind("focus.selectmenu",function(){e(this).parent().mouseover()}).bind("blur.selectmenu",function(){e(this).parent().mouseout()}),f=e("<li/>",o).append(a).data("index",s).addClass(r[s].classes).data("optionClasses",r[s].classes||"").bind("mouseup.selectmenu",function(n){return t._safemouseup&&!t._disabled(n.currentTarget)&&!t._disabled(e(n.currentTarget).parents("ul>li."+t.widgetBaseClass+"-group "))&&(t.index(e(this).data("index")),t.select(n),t.close(n,!0)),!1}).bind("click.selectmenu",function(){return!1}).bind("mouseover.selectmenu",function(){!e(this).hasClass(t.namespace+"-state-disabled")&&!e(this).parent("ul").parent("li").hasClass(t.namespace+"-state-disabled")&&(t._selectedOptionLi().addClass(i),t._focusedOptionLi().removeClass(t.widgetBaseClass+"-item-focus ui-state-hover"),e(this).removeClass("ui-state-active").addClass(t.widgetBaseClass+"-item-focus ui-state-hover"))}).bind("mouseout.selectmenu",function(){e(this).is(t._selectedOptionLi())&&e(this).addClass(i),e(this).removeClass(t.widgetBaseClass+"-item-focus ui-state-hover")});if(r[s].parentOptGroup.length){var l=t.widgetBaseClass+"-group-"+this.element.find("optgroup").index(r[s].parentOptGroup);this.list.find("li."+l).length?this.list.find("li."+l+":last ul").append(f):e(' <li role="presentation" class="'+t.widgetBaseClass+"-group "+l+(r[s].parentOptGroup.attr("disabled")?" "+this.namespace+'-state-disabled" aria-disabled="true"':'"')+'><span class="'+t.widgetBaseClass+'-group-label">'+r[s].parentOptGroup.attr("label")+"</span><ul></ul></li> ").appendTo(this.list).find("ul").append(f)}else f.appendTo(this.list);if(n.icons)for(var c in n.icons)if(f.is(n.icons[c].find)){f.data("optionClasses",r[s].classes+" "+t.widgetBaseClass+"-hasIcon").addClass(t.widgetBaseClass+"-hasIcon");var h=n.icons[c].icon||"";f.find("a:eq(0)").prepend('<span class="'+t.widgetBaseClass+"-item-icon ui-icon "+h+'"></span>'),r[s].bgImage&&f.find("span").css("background-image",r[s].bgImage)}}else e('<li role="presentation"><a href="#nogo" tabindex="-1" role="option"></a></li>').appendTo(this.list);var p=n.style=="dropdown";this.newelement.toggleClass(t.widgetBaseClass+"-dropdown",p).toggleClass(t.widgetBaseClass+"-popup",!p),this.list.toggleClass(t.widgetBaseClass+"-menu-dropdown ui-corner-bottom",p).toggleClass(t.widgetBaseClass+"-menu-popup ui-corner-all",!p).find("li:first").toggleClass("ui-corner-top",!p).end().find("li:last").addClass("ui-corner-bottom"),this.selectmenuIcon.toggleClass("ui-icon-triangle-1-s",p).toggleClass("ui-icon-triangle-2-n-s",!p),n.style=="dropdown"?this.list.width(n.menuWidth?n.menuWidth:n.width):this.list.width(n.menuWidth?n.menuWidth:n.width-n.handleWidth),this.list.css("height","auto");var d=this.listWrap.height(),v=e(window).height(),m=n.maxHeight?Math.min(n.maxHeight,v):v/3;d>m&&this.list.height(m),this._optionLis=this.list.find("li:not(."+t.widgetBaseClass+"-group)"),this.element.attr("disabled")?this.disable():this.enable(),this._refreshValue(),this._selectedOptionLi().addClass(this.widgetBaseClass+"-item-focus"),clearTimeout(this.refreshTimeout),this.refreshTimeout=window.setTimeout
(function(){t._refreshPosition()},200)},destroy:function(){this.element.removeData(this.widgetName).removeClass(this.widgetBaseClass+"-disabled"+" "+this.namespace+"-state-disabled").removeAttr("aria-disabled").unbind(".selectmenu"),e(window).unbind(".selectmenu-"+this.ids[0]),e(document).unbind(".selectmenu-"+this.ids[0]),this.newelementWrap.remove(),this.listWrap.remove(),this.element.unbind(".selectmenu").show(),e.Widget.prototype.destroy.apply(this,arguments)},_typeAhead:function(e,t){var n=this,r=String.fromCharCode(e).toLowerCase(),i=null,s=null;n._typeAhead_timer&&(window.clearTimeout(n._typeAhead_timer),n._typeAhead_timer=undefined),n._typeAhead_chars=(n._typeAhead_chars===undefined?"":n._typeAhead_chars).concat(r),n._typeAhead_chars.length<2||n._typeAhead_chars.substr(-2,1)===r&&n._typeAhead_cycling?(n._typeAhead_cycling=!0,i=r):(n._typeAhead_cycling=!1,i=n._typeAhead_chars);var o=(t!=="focus"?this._selectedOptionLi().data("index"):this._focusedOptionLi().data("index"))||0;for(var u=0;u<this._optionLis.length;u++){var a=this._optionLis.eq(u).text().substr(0,i.length).toLowerCase();if(a===i)if(n._typeAhead_cycling){s===null&&(s=u);if(u>o){s=u;break}}else s=u}s!==null&&this._optionLis.eq(s).find("a").trigger(t),n._typeAhead_timer=window.setTimeout(function(){n._typeAhead_timer=undefined,n._typeAhead_chars=undefined,n._typeAhead_cycling=undefined},n.options.typeAhead)},_uiHash:function(){var t=this.index();return{index:t,option:e("option",this.element).get(t),value:this.element[0].value}},open:function(e){var t=this,n=this.options;if(t.newelement.attr("aria-disabled")!="true"){t._trigger("opening",e,t._uiHash()),t._closeOthers(e),t.newelement.addClass("ui-state-active"),t.list.attr("aria-hidden",!1),t.listWrap.addClass(t.widgetBaseClass+"-open");var r=this._selectedOptionLi();n.style=="dropdown"?t.newelement.removeClass("ui-corner-all").addClass("ui-corner-top"):this.list.css("left",-5e3).scrollTop(this.list.scrollTop()+r.position().top-this.list.outerHeight()/2+r.outerHeight()/2).css("left","auto"),t._refreshPosition();var i=r.find("a");i.length&&i[0].focus(),t.isOpen=!0,t._trigger("open",e,t._uiHash())}},close:function(e,t){this.newelement.is(".ui-state-active")&&(this.newelement.removeClass("ui-state-active"),this.listWrap.removeClass(this.widgetBaseClass+"-open"),this.list.attr("aria-hidden",!0),this.options.style=="dropdown"&&this.newelement.removeClass("ui-corner-top").addClass("ui-corner-all"),t&&this.newelement.focus(),this.isOpen=!1,this._trigger("close",e,this._uiHash()))},change:function(e){this.element.trigger("change"),this._trigger("change",e,this._uiHash())},select:function(e){if(this._disabled(e.currentTarget))return!1;this._trigger("select",e,this._uiHash())},widget:function(){return this.listWrap.add(this.newelementWrap)},_closeOthers:function(t){e("."+this.widgetBaseClass+".ui-state-active").not(this.newelement).each(function(){e(this).data("selectelement").selectmenu("close",t)}),e("."+this.widgetBaseClass+".ui-state-hover").trigger("mouseout")},_toggle:function(e,t){this.isOpen?this.close(e,t):this.open(e)},_formatText:function(t,n){return this.options.format?t=this.options.format(t,n):this.options.escapeHtml&&(t=e("<div />").text(t).html()),t},_selectedIndex:function(){return this.element[0].selectedIndex},_selectedOptionLi:function(){return this._optionLis.eq(this._selectedIndex())},_focusedOptionLi:function(){return this.list.find("."+this.widgetBaseClass+"-item-focus")},_moveSelection:function(e,t){if(!this.options.disabled){var n=parseInt(this._selectedOptionLi().data("index")||0,10),r=n+e;r<0&&(r=0),r>this._optionLis.size()-1&&(r=this._optionLis.size()-1);if(r===t)return!1;this._optionLis.eq(r).hasClass(this.namespace+"-state-disabled")?(e>0?++e:--e,this._moveSelection(e,r)):this._optionLis.eq(r).trigger("mouseover").trigger("mouseup")}},_moveFocus:function(e,t){if(!isNaN(e))var n=parseInt(this._focusedOptionLi().data("index")||0,10),r=n+e;else var r=parseInt(this._optionLis.filter(e).data("index"),10);r<0&&(r=0),r>this._optionLis.size()-1&&(r=this._optionLis.size()-1);if(r===t)return!1;var i=this.widgetBaseClass+"-item-"+Math.round(Math.random()*1e3);this._focusedOptionLi().find("a:eq(0)").attr("id",""),this._optionLis.eq(r).hasClass(this.namespace+"-state-disabled")?(e>0?++e:--e,this._moveFocus(e,r)):this._optionLis.eq(r).find("a:eq(0)").attr("id",i).focus(),this.list.attr("aria-activedescendant",i)},_scrollPage:function(e){var t=Math.floor(this.list.outerHeight()/this._optionLis.first().outerHeight());t=e=="up"?-t:t,this._moveFocus(t)},_setOption:function(e,t){this.options[e]=t,e=="disabled"&&(t&&this.close(),this.element.add(this.newelement).add(this.list)[t?"addClass":"removeClass"](this.widgetBaseClass+"-disabled"+" "+this.namespace+"-state-disabled").attr("aria-disabled",t))},disable:function(e,t){typeof e=="undefined"?this._setOption("disabled",!0):t=="optgroup"?this._disableOptgroup(e):this._disableOption(e)},enable:function(e,t){typeof e=="undefined"?this._setOption("disabled",!1):t=="optgroup"?this._enableOptgroup(e):this._enableOption(e)},_disabled:function(t){return e(t).hasClass(this.namespace+"-state-disabled")},_disableOption:function(e){var t=this._optionLis.eq(e);t&&(t.addClass(this.namespace+"-state-disabled").find("a").attr("aria-disabled",!0),this.element.find("option").eq(e).attr("disabled","disabled"))},_enableOption:function(e){var t=this._optionLis.eq(e);t&&(t.removeClass(this.namespace+"-state-disabled").find("a").attr("aria-disabled",!1),this.element.find("option").eq(e).removeAttr("disabled"))},_disableOptgroup:function(e){var t=this.list.find("li."+this.widgetBaseClass+"-group-"+e);t&&(t.addClass(this.namespace+"-state-disabled").attr("aria-disabled",!0),this.element.find("optgroup").eq(e).attr("disabled","disabled"))},_enableOptgroup:function(e){var t=this.list.find("li."+this.widgetBaseClass+"-group-"+e);t&&(t.removeClass(this.namespace+"-state-disabled").attr("aria-disabled",!1),this.element.find("optgroup").eq(e).removeAttr("disabled"))},index:function(t){if(!arguments.length)return this._selectedIndex();if(!!this._disabled(e(this._optionLis[t]))||t==this._selectedIndex())return!1;this.element[0].selectedIndex=t,this._refreshValue(),this.change()},value:function(e){if(!arguments.length||e==this.element[0].value)return this.element[0].value;this.element[0].value=e,this._refreshValue(),this.change()},_refreshValue:function(){var e=this.options.style=="popup"?" ui-state-active":"",t=this.widgetBaseClass+"-item-"+Math.round(Math.random()*1e3);this.list.find("."+this.widgetBaseClass+"-item-selected").removeClass(this.widgetBaseClass+"-item-selected"+e).find("a").attr("aria-selected","false").attr("id",""),this._selectedOptionLi().addClass(this.widgetBaseClass+"-item-selected"+e).find("a").attr("aria-selected","true").attr("id",t);var n=this.newelement.data("optionClasses")?this.newelement.data("optionClasses"):"",r=this._selectedOptionLi().data("optionClasses")?this._selectedOptionLi().data("optionClasses"):"";this.newelement.removeClass(n).data("optionClasses",r).addClass(r).find("."+this.widgetBaseClass+"-status").html(this._selectedOptionLi().find("a:eq(0)").html()),this.list.attr("aria-activedescendant",t)},_refreshPosition:function(){var e=this.options;if(e.style=="popup"&&!e.positionOptions.offset)var t=this._selectedOptionLi(),n="0 "+(this.list.offset().top-t.offset().top-(this.newelement.outerHeight()+t.outerHeight())/2);this.listWrap.removeAttr("style").zIndex(this.element.zIndex()+1).position({of:e.positionOptions.of||this.newelement,my:e.positionOptions.my,at:e.positionOptions.at,offset:e.positionOptions.offset||n,collision:e.positionOptions.collision||(e.style=="popup"?"fit":"flip")})}})}(jQuery),function(){function xt(e,t){var n;e||(e={});for(n in t)e[n]=t[n];return e}function Tt(){var e=0,t=arguments,n=t.length,r={};for(;e<n;e++)r[t[e++]]=t[e];return r}function Nt(e,t){return parseInt(e,t||10)}function Ct(e){return typeof e=="string"}function kt(e){return typeof e=="object"}function Lt(e){return Object.prototype.toString.call(e)==="[object Array]"}function At(e){return typeof e=="number"}function Ot(e){return r.log(e)/r.LN10}function Mt(e){return r.pow(10,e)}function _t(e,t){var n=e.length;while(n--)if(e[n]===t){e.splice(n,1);break}}function Dt(t){return t!==e&&t!==null}function Pt(e,t,n){var r,i="setAttribute",s;if(Ct(t))Dt(n)?e[i](t,n):e&&e.getAttribute&&(s=e.getAttribute(t));else if(Dt(t)&&kt(t))for(r in t)e[i](r,t[r]);return s}function Ht(e){return Lt(e)?e:[e]}function Bt(){var e=arguments,t,n,r=e.length;for(t=0;t<r;t++){n=e[t];if(typeof n!="undefined"&&n!==null)return n}}function jt(t,n){m&&n&&n.opacity!==e&&(n.filter="alpha(opacity="+n.opacity*100+")"),xt(t.style,n)}function Ft(e,n,r,i,s){var o=t.createElement(e);return n&&xt(o,n),s&&jt(o,{padding:0,border:W,margin:0}),r&&jt(o,r),i&&i.appendChild(o),o}function It(e,t){var n=function(){};return n.prototype=new e,xt(n.prototype,t),n}function qt(e){return e=(e||0).toString(),e.indexOf(".")>-1?e.split(".")[1].length:0}function Rt(e,t,n,r){var i=O.lang,s=e,o=t===-1?qt(e):isNaN(t=f(t))?2:t,u=n===undefined?i.decimalPoint:n,a=r===undefined?i.thousandsSep:r,l=s<0?"-":"",c=String(Nt(s=f(+s||0).toFixed(o))),h=c.length>3?c.length%3:0;return l+(h?c.substr(0,h)+a:"")+c.substr(h).replace(/(\d{3})(?=\d)/g,"$1"+a)+(o?u+f(s-c).toFixed(o).slice(2):"")}function Ut(e,t){return(new Array((t||2)+1-String(e).length)).join(0)+e}function zt(e,t,n){var r=e[t];e[t]=function(){var e=Array.prototype.slice.call(arguments);return e.unshift(r),n.apply(this,e)}}function Wt(e,t,n,r){var i,s;n=Bt(n,1),i=e/n,t||(t=[1,2,2.5,5,10],r&&r.allowDecimals===!1&&(n===1?t=[1,2,5,10]:n<=.1&&(t=[1/n])));for(s=0;s<t.length;s++){e=t[s];if(i<=(t[s]+(t[s+1]||t[s]))/2)break}return e*=n,e}function Xt(e,t){var n=t||[[G,[1,2,5,10,20,25,50,100,200,500]],[Y,[1,2,5,10,15,30]],[Z,[1,2,5,10,15,30]],[et,[1,2,3,4,6,8,12]],[tt,[1,2]],[nt,[1,2]],[rt,[1,2,3,4,6]],[it,null]],r=n[n.length-1],i=P[r[0]],s=r[1],o,u;for(u=0;u<n.length;u++){r=n[u],i=P[r[0]],s=r[1];if(n[u+1]){var a=(i*s[s.length-1]+P[n[u+1][0]])/2;if(e<=a)break}}return i===P[it]&&e<5*i&&(s=[1,2,5]),i===P[it]&&e<5*i&&(s=[1,2,5]),o=Wt(e/i,s),{unitRange:i,count:o,unitName:r[0]}}function Vt(e,t,n,r){var i=[],o,u={},a=O.global.useUTC,f,l=new Date(t),c=e.unitRange,h=e.count;if(Dt(t)){c>=P[Y]&&(l.setMilliseconds(0),l.setSeconds(c>=P[Z]?0:h*s(l.getSeconds()/h))),c>=P[Z]&&l[gt](c>=P[et]?0:h*s(l[ct]()/h)),c>=P[et]&&l[yt](c>=P[tt]?0:h*s(l[ht]()/h)),c>=P[tt]&&l[bt](c>=P[rt]?1:h*s(l[dt]()/h)),c>=P[rt]&&(l[wt](c>=P[it]?0:h*s(l[vt]()/h)),f=l[mt]()),c>=P[it]&&(f-=f%h,l[Et](f)),c===P[nt]&&l[bt](l[dt]()-l[pt]()+Bt(r,1)),o=1,f=l[mt]();var p=l.getTime(),d=l[vt](),v=l[dt](),m=a?0:(864e5+l.getTimezoneOffset()*60*1e3)%864e5;while(p<n)i.push(p),c===P[it]?p=lt(f+o*h,0):c===P[rt]?p=lt(f,d+o*h):!!a||c!==P[tt]&&c!==P[nt]?(p+=c*h,c<=P[et]&&p%P[tt]===m&&(u[p]=tt)):p=lt(f,d,v+o*h*(c===P[tt]?1:7)),o++;i.push(p)}return i.info=xt(e,{higherRanks:u,totalRange:c*h}),i}function $t(){this.color=0,this.symbol=0}function Jt(e,t){var n=e.length,r,i;for(i=0;i<n;i++)e[i].ss_i=i;e.sort(function(e,n){return r=t(e,n),r===0?e.ss_i-n.ss_i:r});for(i=0;i<n;i++)delete e[i].ss_i}function Kt(e){var t=e.length,n=e[0];while(t--)e[t]<n&&(n=e[t]);return n}function Qt(e){var t=e.length,n=e[0];while(t--)e[t]>n&&(n=e[t]);return n}function Gt(e,t){var n;for(n in e)e[n]&&e[n]!==t&&e[n].destroy&&e[n].destroy(),delete e[n]}function Yt(e){A||(A=Ft(j)),e&&A.appendChild(e),A.innerHTML=""}function Zt(e,t){var r="Highcharts error #"+e+": www.highcharts.com/errors/"+e;if(t)throw r;n.console&&console.log(r)}function en(e){return parseFloat(e.toPrecision(14))}function tn(e,t){_=Bt(e,t.animation)}function Sn(){var e=O.global.useUTC,t=e?"getUTC":"get",n=e?"setUTC":"set";lt=e?Date.UTC:function(e,t,n,r,i,s){return(new Date(e,t,Bt(n,1),Bt(r,0),Bt(i,0),Bt(s,0))).getTime()},ct=t+"Minutes",ht=t+"Hours",pt=t+"Day",dt=t+"Date",vt=t+"Month",mt=t+"FullYear",gt=n+"Minutes",yt=n+"Hours",bt=n+"Date",wt=n+"Month",Et=n+"FullYear"}function xn(e){return O=hn(O,e),Sn(),O}function Tn(){return O}function Cn(){}function Dn(e,t,n){this.axis=e,this.pos=t,this.type=n||"",this.isNew=!0,n||this.addLabel()}function Pn(e,t){return this.axis=e,t&&(this.options=t,this.id=t.id),this}function Hn(e,t,n,r,i,s){var o=e.chart.inverted;this.axis=e,this.isNegative=n,this.options=t,this.x=r,this.stack=i,this.percent=s==="percent",this.alignOptions={align:t.align||(o?n?"left":"right":"center"),verticalAlign:t.verticalAlign||(o?"middle":n?"bottom":"top"),y:Bt(t.y,o?4:n?14:-6),x:Bt(t.x,o?n?-6:6:0)},this.textAlign=t.textAlign||(o?n?"right":"left":"center")}function Bn(){this.init.apply(this,arguments)}function jn(e,t){var n=t.borderWidth,r=t.style,i=Nt(r.padding);this.chart=e,this.options=t,this.crosshairs=[],this.now={x:0,y:0},this.isHidden=!0,this.label=e.renderer.label("",0,0,t.shape,null,null,t.useHTML,null,"tooltip").attr({padding:i,fill:t.backgroundColor,"stroke-width":n,r:t.borderRadius,zIndex:8}).css(r).css({padding:0}).hide().add(),T||this.label.shadow(t.shadow),this.shared=t.shared}function Fn(e,t){var n=T?"":t.chart.zoomType;this.zoomX=/x/.test(n),this.zoomY=/y/.test(n),this.options=t,this.chart=e,this.init(e,t.tooltip)}function In(e){this.init(e)}function qn(){this.init.apply(this,arguments)}var e,t=document,n=window,r=Math,i=r.round,s=r.floor,o=r.ceil,u=r.max,a=r.min,f=r.abs,l=r.cos,c=r.sin,h=r.PI,p=h*2/360,d=navigator.userAgent,v=n.opera,m=/msie/i.test(d)&&!v,g=t.documentMode===8,y=/AppleWebKit/.test(d),b=/Firefox/.test(d),w=/(Mobile|Android|Windows Phone)/.test(d),E="http://www.w3.org/2000/svg",S=!!t.createElementNS&&!!t.createElementNS(E,"svg").createSVGRect,x=b&&parseInt(d.split("Firefox/")[1],10)<4,T=!S&&!m&&!!t.createElement("canvas").getContext,N,C=t.documentElement.ontouchstart!==e,k={},L=0,A,O,M,_,D,P,H=function(){},B=[],j="div",F="absolute",I="relative",q="hidden",R="highcharts-",U="visible",z="px",W="none",X="M",V="L",$="rgba(192,192,192,"+(S?1e-4:.002)+")",J="",K="hover",Q="select",G="millisecond",Y="second",Z="minute",et="hour",tt="day",nt="week",rt="month",it="year",st="fill",ot="linearGradient",ut="stops",at="stroke",ft="stroke-width",lt,ct,ht,pt,dt,vt,mt,gt,yt,bt,wt,Et,St={};n.Highcharts={},M=function(e,t,n){if(!Dt(t)||isNaN(t))return"Invalid date";e=Bt(e,"%Y-%m-%d %H:%M:%S");var r=new Date(t),s,o=r[ht](),u=r[pt](),a=r[dt](),f=r[vt](),l=r[mt](),c=O.lang,h=c.weekdays,p={a:h[u].substr(0,3),A:h[u],d:Ut(a),e:a,b:c.shortMonths[f],B:c.months[f],m:Ut(f+1),y:l.toString().substr(2,2),Y:l,H:Ut(o),I:Ut(o%12||12),l:o%12||12,M:Ut(r[ct]()),p:o<12?"AM":"PM",P:o<12?"am":"pm",S:Ut(r.getSeconds()),L:Ut(i(t%1e3),3)};for(s in p)while(e.indexOf("%"+s)!==-1)e=e.replace("%"+s,p[s]);return n?e.substr(0,1).toUpperCase()+e.substr(1):e},$t.prototype={wrapColor:function(e){this.color>=e&&(this.color=0)},wrapSymbol:function(e){this.symbol>=e&&(this.symbol=0)}},P=Tt(G,1,Y,1e3,Z,6e4,et,36e5,tt,864e5,nt,6048e5,rt,26784e5,it,31556952e3),D={init:function(e,t,n){t=t||"";var r=e.shift,i=t.indexOf("C")>-1,s=i?7:3,o,u,a,f=t.split(" "),l=[].concat(n),c,h,p=function(e){a=e.length;while(a--)e[a]===X&&e.splice(a+1,0,e[a+1],e[a+2],e[a+1],e[a+2])};i&&(p(f),p(l)),e.isArea&&(c=f.splice(f.length-6,6),h=l.splice(l.length-6,6));if(r<=l.length/s)while(r--)l=[].concat(l).splice(0,s).concat(l);e.shift=0;if(f.length){o=l.length;while(f.length<o)u=[].concat(f).splice(f.length-s,s),i&&(u[s-6]=u[s-2],u[s-5]=u[s-1]),f=f.concat(u)}return c&&(f=f.concat(c),l=l.concat(h)),[f,l]},step:function(e,t,n,r){var i=[],s=e.length,o;if(n===1)i=r;else if(s===t.length&&n<1)while(s--)o=parseFloat(e[s]),i[s]=isNaN(o)?e[s]:n*parseFloat(t[s]-o)+o;else i=t;return i}},function(r){n.HighchartsAdapter=n.HighchartsAdapter||r&&{init:function(t){var n=r.fx,i=n.step,s,o=r.Tween,u=o&&o.propHooks;r.extend(r.easing,{easeOutQuad:function(e,t,n,r,i){return-r*(t/=i)*(t-2)+n}}),r.each(["cur","_default","width","height"],function(t,r){var s=i,a,f;r==="cur"?s=n.prototype:r==="_default"&&o&&(s=u[r],r="set"),a=s[r],a&&(s[r]=function(n){return n=t?n:this,f=n.elem,f.attr?f.attr(n.prop,r==="cur"?e:n.now):a.apply(this,arguments)})}),s=function(e){var n=e.elem,r;e.started||(r=t.init(n,n.d,n.toD),e.start=r[0],e.end=r[1],e.started=!0),n.attr("d",t.step(e.start,e.end,e.pos,n.toD))},o?u.d={set:s}:i.d=s,this.each=Array.prototype.forEach?function(e,t){return Array.prototype.forEach.call(e,t)}:function(e,t){var n=0,r=e.length;for(;n<r;n++)if(t.call(e[n],e[n],n,e)===!1)return n}},getScript:r.getScript,inArray:r.inArray,adapterRun:function(e,t){return r(e)[t]()},grep:r.grep,map:function(e,t){var n=[],r=0,i=e.length;for(;r<i;r++)n[r]=t.call(e[r],e[r],r,e);return n},merge:function(){var e=arguments;return r.extend(!0,null,e[0],e[1],e[2],e[3])},offset:function(e){return r(e).offset()},addEvent:function(e,t,n){r(e).bind(t,n)},removeEvent:function(e,n,i){var s=t.removeEventListener?"removeEventListener":"detachEvent";t[s]&&!e[s]&&(e[s]=function(){}),r(e).unbind(n,i)},fireEvent:function(e,t,n,i){var s=r.Event(t),o="detached"+t,u;!m&&n&&(delete n.layerX,delete n.layerY),xt(s,n),e[t]&&(e[o]=e[t],e[t]=null),r.each(["preventDefault","stopPropagation"],function(e,t){var n=s[t];s[t]=function(){try{n.call(s)}catch(e){t==="preventDefault"&&(u=!0)}}}),r(e).trigger(s),e[o]&&(e[t]=e[o],e[o]=null),i&&!s.isDefaultPrevented()&&!u&&i(s)},washMouseEvent:function(t){var n=t.originalEvent||t;return n.pageX===e&&(n.pageX=t.pageX,n.pageY=t.pageY),n},animate:function(e,t,n){var i=r(e);t.d&&(e.toD=t.d,t.d=1),i.stop(),i.animate(t,n)},stop:function(e){r(e).stop()}}}(n.jQuery);var nn=n.HighchartsAdapter,rn=nn||{};nn&&nn.init.call(nn,D);var sn=rn.adapterRun,on=rn.getScript,un=rn.inArray,an=rn.each,fn=rn.grep,ln=rn.offset,cn=rn.map,hn=rn.merge,pn=rn.addEvent,dn=rn.removeEvent,vn=rn.fireEvent,mn=rn.washMouseEvent,gn=rn.animate,yn=rn.stop,bn={enabled:!0,align:"center",x:0,y:15,style:{color:"#666",fontSize:"11px",lineHeight:"14px"}};O={colors:["#4572A7","#AA4643","#89A54E","#80699B","#3D96AE","#DB843D","#92A8CD","#A47D7C","#B5CA92"],symbols:["circle","diamond","square","triangle","triangle-down"],lang:{loading:"Loading...",months:["January","February","March","April","May","June","July","August","September","October","November","December"],shortMonths:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],weekdays:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],decimalPoint:".",numericSymbols:["k","M","G","T","P","E"],resetZoom:"Reset zoom",resetZoomTitle:"Reset zoom level 1:1",thousandsSep:","},global:{useUTC:!0,canvasToolsURL:"http://code.highcharts.com/2.3.5/modules/canvas-tools.js",VMLRadialGradientURL:"http://code.highcharts.com/2.3.5/gfx/vml-radial-gradient.png"},chart:{borderColor:"#4572A7",borderRadius:5,defaultSeriesType:"line",ignoreHiddenSeries:!0,spacingTop:10,spacingRight:10,spacingBottom:15,spacingLeft:10,style:{fontFamily:'"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif',fontSize:"12px"},backgroundColor:"#FFFFFF",plotBorderColor:"#C0C0C0",resetZoomButton:{theme:{zIndex:20},position:{align:"right",x:-10,y:10}}},title:{text:"Chart title",align:"center",y:15,style:{color:"#3E576F",fontSize:"16px"}},subtitle:{text:"",align:"center",y:30,style:{color:"#6D869F"}},plotOptions:{line:{allowPointSelect:!1,showCheckbox:!1,animation:{duration:1e3},events:{},lineWidth:2,shadow:!0,marker:{enabled:!0,lineWidth:0,radius:4,lineColor:"#FFFFFF",states:{hover:{enabled:!0},select:{fillColor:"#FFFFFF",lineColor:"#000000",lineWidth:2}}},point:{events:{}},dataLabels:hn(bn,{enabled:!1,formatter:function(){return this.y},verticalAlign:"bottom",y:0}),cropThreshold:300,pointRange:0,showInLegend:!0,states:{hover:{marker:{}},select:{marker:{}}},stickyTracking:!0}},labels:{style:{position:F,color:"#3E576F"}},legend:{enabled:!0,align:"center",layout:"horizontal",labelFormatter:function(){return this.name},borderWidth:1,borderColor:"#909090",borderRadius:5,navigation:{activeColor:"#3E576F",inactiveColor:"#CCC"},shadow:!1,itemStyle:{cursor:"pointer",color:"#3E576F",fontSize:"12px"},itemHoverStyle:{color:"#000"},itemHiddenStyle:{color:"#CCC"},itemCheckboxStyle:{position:F,width:"13px",height:"13px"},symbolWidth:16,symbolPadding:5,verticalAlign:"bottom",x:0,y:0},loading:{labelStyle:{fontWeight:"bold",position:I,top:"1em"},style:{position:F,backgroundColor:"white",opacity:.5,textAlign:"center"}},tooltip:{enabled:!0,backgroundColor:"rgba(255, 255, 255, .85)",borderWidth:2,borderRadius:5,dateTimeLabelFormats:{millisecond:"%A, %b %e, %H:%M:%S.%L",second:"%A, %b %e, %H:%M:%S",minute:"%A, %b %e, %H:%M",hour:"%A, %b %e, %H:%M",day:"%A, %b %e, %Y",week:"Week from %A, %b %e, %Y",month:"%B %Y",year:"%Y"},headerFormat:'<span style="font-size: 10px">{point.key}</span><br/>',pointFormat:'<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',shadow:!0,shared:T,snap:w?25:10,style:{color:"#333333",fontSize:"12px",padding:"5px",whiteSpace:"nowrap"}},credits:{enabled:!0,text:"Highcharts.com",href:"http://www.highcharts.com",position:{align:"right",x:-10,verticalAlign:"bottom",y:-5},style:{cursor:"pointer",color:"#909090",fontSize:"10px"}}};var wn=O.plotOptions,En=wn.line;Sn();var Nn=function(e){function r(e){n=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]?(?:\.[0-9]+)?)\s*\)/.exec(e),n?t=[Nt(n[1]),Nt(n[2]),Nt(n[3]),parseFloat(n[4],10)]:(n=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(e),n&&(t=[Nt(n[1],16),Nt(n[2],16),Nt(n[3],16),1]))}function i(n){var r;return t&&!isNaN(t[0])?n==="rgb"?r="rgb("+t[0]+","+t[1]+","+t[2]+")":n==="a"?r=t[3]:r="rgba("+t.join(",")+")":r=e,r}function s(e){if(At(e)&&e!==0){var n;for(n=0;n<3;n++)t[n]+=Nt(e*255),t[n]<0&&(t[n]=0),t[n]>255&&(t[n]=255)}return this}function o(e){return t[3]=e,this}var t=[],n;return r(e),{get:i,brighten:s,setOpacity:o}};Cn.prototype={init:function(e,n){var r=this;r.element=n==="span"?Ft(n):t.createElementNS(E,n),r.renderer=e,r.attrSetters={}},animate:function(e,t,n){var r=Bt(t,_,!0);yn(this),r?(r=hn(r),n&&(r.complete=n),gn(this,e,r)):(this.attr(e),n&&n())},attr:function(n,r){var i=this,s,o,a,f,l,c=i.element,h=c.nodeName.toLowerCase(),p=i.renderer,d,v,m=i.attrSetters,g=i.shadows,b,w,S=i;Ct(n)&&Dt(r)&&(s=n,n={},n[s]=r);if(Ct(n))s=n,h==="circle"?s={x:"cx",y:"cy"}[s]||s:s==="strokeWidth"&&(s="stroke-width"),S=Pt(c,s)||i[s]||0,s!=="d"&&s!=="visibility"&&(S=parseFloat(S));else for(s in n){d=!1,o=n[s],a=m[s]&&m[s].call(i,o,s);if(a!==!1){a!==e&&(o=a);if(s==="d")o&&o.join&&(o=o.join(" ")),/(NaN| {2}|^$)/.test(o)&&(o="M 0 0");else if(s==="x"&&h==="text"){for(f=0;f<c.childNodes.length;f++)l=c.childNodes[f],Pt(l,"x")===Pt(c,"x")&&Pt(l,"x",o);i.rotation&&Pt(c,"transform","rotate("+i.rotation+" "+o+" "+Nt(n.y||Pt(c,"y"))+")")}else if(s==="fill")o=p.color(o,c,s);else if(h!=="circle"||s!=="x"&&s!=="y")if(h==="rect"&&s==="r")Pt(c,{rx:o,ry:o}),d=!0;else if(s==="translateX"||s==="translateY"||s==="rotation"||s==="verticalAlign")w=!0,d=!0;else if(s==="stroke")o=p.color(o,c,s);else if(s==="dashstyle"){s="stroke-dasharray",o=o&&o.toLowerCase();if(o==="solid")o=W;else if(o){o=o.replace("shortdashdotdot","3,1,1,1,1,1,").replace("shortdashdot","3,1,1,1").replace("shortdot","1,1,").replace("shortdash","3,1,").replace("longdash","8,3,").replace(/dot/g,"1,3,").replace("dash","4,3,").replace(/,$/,"").split(","),f=o.length;while(f--)o[f]=Nt(o[f])*n["stroke-width"];o=o.join(",")}}else s==="isTracker"?i[s]=o:s==="width"?o=Nt(o):s==="align"?(s="text-anchor",o={left:"start",center:"middle",right:"end"}[o]):s==="title"&&(v=c.getElementsByTagName("title")[0],v||(v=t.createElementNS(E,"title"),c.appendChild(v)),v.textContent=o);else s={x:"cx",y:"cy"}[s]||s;s==="strokeWidth"&&(s="stroke-width"),s==="stroke-width"&&o===0&&(y||p.forExport)&&(o=1e-6),i.symbolName&&/^(x|y|width|height|r|start|end|innerR|anchorX|anchorY)/.test(s)&&(b||(i.symbolAttr(n),b=!0),d=!0);if(g&&/^(width|height|visibility|x|y|d|transform)$/.test(s)){f=g.length;while(f--)Pt(g[f],s,s==="height"?u(o-(g[f].cutHeight||0),0):o)}(s==="width"||s==="height")&&h==="rect"&&o<0&&(o=0),i[s]=o,w&&i.updateTransform(),s==="text"?(o!==i.textStr&&delete i.bBox,i.textStr=o,i.added&&p.buildText(i)):d||Pt(c,s,o)}}return S},symbolAttr:function(e){var t=this;an(["x","y","r","start","end","width","height","innerR","anchorX","anchorY"],function(n){t[n]=Bt(e[n],t[n])}),t.attr({d:t.renderer.symbols[t.symbolName](t.x,t.y,t.width,t.height,t)})},clip:function(e){return this.attr("clip-path",e?"url("+this.renderer.url+"#"+e.id+")":W)},crisp:function(e,t,n,r,o){var u=this,a,f={},l={},c;e=e||u.strokeWidth||u.attr&&u.attr("stroke-width")||0,c=i(e)%2/2,l.x=s(t||u.x||0)+c,l.y=s(n||u.y||0)+c,l.width=s((r||u.width||0)-2*c),l.height=s((o||u.height||0)-2*c),l.strokeWidth=e;for(a in l)u[a]!==l[a]&&(u[a]=f[a]=l[a]);return f},css:function(e){var t=this,n=t.element,r=e&&e.width&&n.nodeName.toLowerCase()==="text",i,s="",o=function(e,t){return"-"+t.toLowerCase()};e&&e.color&&(e.fill=e.color),e=xt(t.styles,e),t.styles=e,T&&r&&delete e.width;if(m&&!S)r&&delete e.width,jt(t.element,e);else{for(i in e)s+=i.replace(/([A-Z])/g,o)+":"+e[i]+";";t.attr({style:s})}return r&&t.added&&t.renderer.buildText(t),t},on:function(e,t){return C&&e==="click"&&(this.element.ontouchstart=function(e){e.preventDefault(),t()}),this.element["on"+e]=t,this},setRadialReference:function(e){return this.element.radialReference=e,this},translate:function(e,t){return this.attr({translateX:e,translateY:t})},invert:function(){var e=this;return e.inverted=!0,e.updateTransform(),e},htmlCss:function(e){var t=this,n=t.element,r=e&&n.tagName==="SPAN"&&e.width;return r&&(delete e.width,t.textWidth=r,t.updateTransform()),t.styles=xt(t.styles,e),jt(t.element,e),t},htmlGetBBox:function(){var e=this,t=e.element,n=e.bBox;return n||(t.nodeName==="text"&&(t.style.position=F),n=e.bBox={x:t.offsetLeft,y:t.offsetTop,width:t.offsetWidth,height:t.offsetHeight}),n},htmlUpdateTransform:function(){if(!this.added){this.alignOnAdd=!0;return}var e=this,t=e.renderer,n=e.element,r=e.translateX||0,i=e.translateY||0,s=e.x||0,o=e.y||0,u=e.textAlign||"left",a={left:0,center:.5,right:1}[u],f=u&&u!=="left",h=e.shadows;if(r||i)jt(n,{marginLeft:r,marginTop:i}),h&&an(h,function(e){jt(e,{marginLeft:r+1,marginTop:i+1})});e.inverted&&an(n.childNodes,function(e){t.invertChild(e,n)});if(n.tagName==="SPAN"){var d,g,w=e.rotation,E,S=0,x=1,T=0,N,C=Nt(e.textWidth),k=e.xCorr||0,L=e.yCorr||0,A=[w,u,n.innerHTML,e.textWidth].join(","),O={},M;A!==e.cTT&&(Dt(w)&&(t.isSVG?(M=m?"-ms-transform":y?"-webkit-transform":b?"MozTransform":v?"-o-transform":"",O[M]=O.transform="rotate("+w+"deg)"):(S=w*p,x=l(S),T=c(S),O.filter=w?["progid:DXImageTransform.Microsoft.Matrix(M11=",x,", M12=",-T,", M21=",T,", M22=",x,", sizingMethod='auto expand')"].join(""):W),jt(n,O)),d=Bt(e.elemWidth,n.offsetWidth),g=Bt(e.elemHeight,n.offsetHeight),d>C&&/[ \-]/.test(n.textContent||n.innerText)&&(jt(n,{width:C+z,display:"block",whiteSpace:"normal"}),d=C),E=t.fontMetrics(n.style.fontSize).b,k=x<0&&-d,L=T<0&&-g,N=x*T<0,k+=T*E*(N?1-a:a),L-=x*E*(w?N?a:1-a:1),f&&(k-=d*a*(x<0?-1:1),w&&(L-=g*a*(T<0?-1:1)),jt(n,{textAlign:u})),e.xCorr=k,e.yCorr=L),jt(n,{left:s+k+z,top:o+L+z}),y&&(g=n.offsetHeight),e.cTT=A}},updateTransform:function(){var e=this,t=e.translateX||0,n=e.translateY||0,r=e.inverted,i=e.rotation,s=[];r&&(t+=e.attr("width"),n+=e.attr("height")),(t||n)&&s.push("translate("+t+","+n+")"),r?s.push("rotate(90) scale(-1,1)"):i&&s.push("rotate("+i+" "+(e.x||0)+" "+(e.y||0)+")"),s.length&&Pt(e.element,"transform",s.join(" "))},toFront:function(){var e=this.element;return e.parentNode.appendChild(e),this},align:function(e,t,n){var r=this;e?(r.alignOptions=e,r.alignByTranslate=t,n||r.renderer.alignedObjects.push(r)):(e=r.alignOptions,t=r.alignByTranslate),n=Bt(n,r.renderer);var s=e.align,o=e.verticalAlign,u=(n.x||0)+(e.x||0),a=(n.y||0)+(e.y||0),f={};if(s==="right"||s==="center")u+=(n.width-(e.width||0))/{right:1,center:2}[s];f[t?"translateX":"x"]=i(u);if(o==="bottom"||o==="middle")a+=(n.height-(e.height||0))/({bottom:1,middle:2}[o]||1);return f[t?"translateY":"y"]=i(a),r[r.placed?"animate":"attr"](f),r.placed=!0,r.alignAttr=f,r},getBBox:function(){var e=this,t=e.bBox,n=e.renderer,r,i,s=e.rotation,o=e.element,u=e.styles,a=s*p;if(!t){if(o.namespaceURI===E||n.forExport){try{t=o.getBBox?xt({},o.getBBox()):{width:o.offsetWidth,height:o.offsetHeight}}catch(h){}if(!t||t.width<0)t={width:0,height:0}}else t=e.htmlGetBBox();n.isSVG&&(r=t.width,i=t.height,m&&u&&u.fontSize==="11px"&&i===22.700000762939453&&(t.height=i=14),s&&(t.width=f(i*c(a))+f(r*l(a)),t.height=f(i*l(a))+f(r*c(a)))),e.bBox=t}return t},show:function(){return this.attr({visibility:U})},hide:function(){return this.attr({visibility:q})},add:function(e){var t=this.renderer,n=e||t,r=n.element||t.box,i=r.childNodes,s=this.element,o=Pt(s,"zIndex"),u,a,f,l;e&&(this.parentGroup=e),this.parentInverted=e&&e.inverted,this.textStr!==undefined&&t.buildText(this),o&&(n.handleZ=!0,o=Nt(o));if(n.handleZ)for(f=0;f<i.length;f++){u=i[f],a=Pt(u,"zIndex");if(u!==s&&(Nt(a)>o||!Dt(o)&&Dt(a))){r.insertBefore(s,u),l=!0;break}}return l||r.appendChild(s),this.added=!0,vn(this,"add"),this},safeRemoveChild:function(e){var t=e.parentNode;t&&t.removeChild(e)},destroy:function(){var e=this,t=e.element||{},n=e.shadows,r,i;t.onclick=t.onmouseout=t.onmouseover=t.onmousemove=null,yn(e),e.clipPath&&(e.clipPath=e.clipPath.destroy());if(e.stops){for(i=0;i<e.stops.length;i++)e.stops[i]=e.stops[i].destroy();e.stops=null}e.safeRemoveChild(t),n&&an(n,function(t){e.safeRemoveChild(t)}),_t(e.renderer.alignedObjects,e);for(r in e)delete e[r];return null},empty:function(){var e=this.element,t=e.childNodes,n=t.length;while(n--)e.removeChild(t[n])},shadow:function(e,t,n){var r=[],i,s,o=this.element,a,f,l,c;if(e){f=Bt(e.width,3),l=(e.opacity||.15)/f,c=this.parentInverted?"(-1,-1)":"("+Bt(e.offsetX,1)+", "+Bt(e.offsetY,1)+")";for(i=1;i<=f;i++)s=o.cloneNode(0),a=f*2+1-2*i,Pt(s,{isShadow:"true",stroke:e.color||"black","stroke-opacity":l*i,"stroke-width":a,transform:"translate"+c,fill:W}),n&&(Pt(s,"height",u(Pt(s,"height")-a,0)),s.cutHeight=a),t?t.element.appendChild(s):o.parentNode.insertBefore(s,o),r.push(s);this.shadows=r}return this}};var kn=function(){this.init.apply(this,arguments)};kn.prototype={Element:Cn,init:function(e,r,i,s){var u=this,a=location,f;f=u.createElement("svg").attr({xmlns:E,version:"1.1"}),e.appendChild(f.element),u.isSVG=!0,u.box=f.element,u.boxWrapper=f,u.alignedObjects=[],u.url=(b||y)&&t.getElementsByTagName("base").length?a.href.replace(/#.*?$/,"").replace(/([\('\)])/g,"\\$1").replace(/ /g,"%20"):"",u.defs=this.createElement("defs").add(),u.forExport=s,u.gradients={},u.setSize(r,i,!1);var l,c;b&&e.getBoundingClientRect&&(u.subPixelFix=l=function(){jt(e,{left:0,top:0}),c=e.getBoundingClientRect(),jt(e,{left:o(c.left)-c.left+z,top:o(c.top)-c.top+z})},l(),pn(n,"resize",l))},isHidden:function(){return!this.boxWrapper.getBBox().width},destroy:function(){var e=this,t=e.defs;return e.box=null,e.boxWrapper=e.boxWrapper.destroy(),Gt(e.gradients||{}),e.gradients=null,t&&(e.defs=t.destroy()),e.subPixelFix&&dn(n,"resize",e.subPixelFix),e.alignedObjects=null,null},createElement:function(e){var t=new this.Element;return t.init(this,e),t},draw:function(){},buildText:function(e){function g(t){return m[t]=r.getBBox?r.getBBox().height:e.renderer.fontMetrics(r.style.fontSize).h,i(m[t]-(m[t-1]||0))}var r=e.element,s=Bt(e.textStr,"").toString().replace(/<(b|strong)>/g,'<span style="font-weight:bold">').replace(/<(i|em)>/g,'<span style="font-style:italic">').replace(/<a/g,"<span").replace(/<\/(b|strong|i|em|a)>/g,"</span>").split(/<br.*?>/g),o=r.childNodes,u=/style="([^"]+)"/,a=/href="([^"]+)"/,f=Pt(r,"x"),l=e.styles,c=l&&l.width&&Nt(l.width),h=l&&l.lineHeight,p,d="getComputedStyle",v=o.length,m=[];while(v--)r.removeChild(o[v]);c&&!e.added&&this.box.appendChild(r),s[s.length-1]===""&&s.pop(),an(s,function(i,s){var o,l=0,v;i=i.replace(/<span/g,"|||<span").replace(/<\/span>/g,"</span>|||"),o=i.split("|||"),an(o,function(i){if(i!==""||o.length===1){var m={},y=t.createElementNS(E,"tspan"),b;u.test(i)&&(b=i.match(u)[1].replace(/(;| |^)color([ :])/,"$1fill$2"),Pt(y,"style",b)),a.test(i)&&(Pt(y,"onclick",'location.href="'+i.match(a)[1]+'"'),jt(y,{cursor:"pointer"})),i=(i.replace(/<(.|\n)*?>/g,"")||" ").replace(/&lt;/g,"<").replace(/&gt;/g,">"),y.appendChild(t.createTextNode(i)),l?m.dx=3:m.x=f;if(!l){if(s){!S&&e.renderer.forExport&&jt(y,{display:"block"}),v=n[d]&&Nt(n[d](p,null).getPropertyValue("line-height"));if(!v||isNaN(v))v=h||p.offsetHeight||g(s)||18;Pt(y,"dy",v)}p=y}Pt(y,m),r.appendChild(y),l++;if(c){var w=i.replace(/([^\^])-/g,"$1- ").split(" "),x,T,N=[];while(w.length||N.length)delete e.bBox,T=e.getBBox().width,x=T>c,!x||w.length===1?(w=N,N=[],w.length&&(y=t.createElementNS(E,"tspan"),Pt(y,{dy:h||16,x:f}),b&&Pt(y,"style"
,b),r.appendChild(y),T>c&&(c=T))):(y.removeChild(y.firstChild),N.unshift(w.pop())),w.length&&y.appendChild(t.createTextNode(w.join(" ").replace(/- /g,"-")))}}})})},button:function(e,t,n,r,i,s,o){var u=this.label(e,t,n),a=0,f,l,c,h,p,d="style",v={x1:0,y1:0,x2:0,y2:1};return i=hn(Tt(ft,1,at,"#999",st,Tt(ot,v,ut,[[0,"#FFF"],[1,"#DDD"]]),"r",3,"padding",3,d,Tt("color","black")),i),c=i[d],delete i[d],s=hn(i,Tt(at,"#68A",st,Tt(ot,v,ut,[[0,"#FFF"],[1,"#ACF"]])),s),h=s[d],delete s[d],o=hn(i,Tt(at,"#68A",st,Tt(ot,v,ut,[[0,"#9BD"],[1,"#CDF"]])),o),p=o[d],delete o[d],pn(u.element,"mouseenter",function(){u.attr(s).css(h)}),pn(u.element,"mouseleave",function(){f=[i,s,o][a],l=[c,h,p][a],u.attr(f).css(l)}),u.setState=function(e){a=e,e?e===2&&u.attr(o).css(p):u.attr(i).css(c)},u.on("click",function(){r.call(u)}).attr(i).css(xt({cursor:"default"},c))},crispLine:function(e,t){return e[1]===e[4]&&(e[1]=e[4]=i(e[1])-t%2/2),e[2]===e[5]&&(e[2]=e[5]=i(e[2])+t%2/2),e},path:function(e){var t={fill:W};return Lt(e)?t.d=e:kt(e)&&xt(t,e),this.createElement("path").attr(t)},circle:function(e,t,n){var r=kt(e)?e:{x:e,y:t,r:n};return this.createElement("circle").attr(r)},arc:function(e,t,n,r,i,s){return kt(e)&&(t=e.y,n=e.r,r=e.innerR,i=e.start,s=e.end,e=e.x),this.symbol("arc",e||0,t||0,n||0,n||0,{innerR:r||0,start:i||0,end:s||0})},rect:function(e,t,n,r,i,s){i=kt(e)?e.r:i;var o=this.createElement("rect").attr({rx:i,ry:i,fill:W});return o.attr(kt(e)?e:o.crisp(s,e,t,u(n,0),u(r,0)))},setSize:function(e,t,n){var r=this,i=r.alignedObjects,s=i.length;r.width=e,r.height=t,r.boxWrapper[Bt(n,!0)?"animate":"attr"]({width:e,height:t});while(s--)i[s].align()},g:function(e){var t=this.createElement("g");return Dt(e)?t.attr({"class":R+e}):t},image:function(e,t,n,r,i){var s={preserveAspectRatio:W},o;return arguments.length>1&&xt(s,{x:t,y:n,width:r,height:i}),o=this.createElement("image").attr(s),o.element.setAttributeNS?o.element.setAttributeNS("http://www.w3.org/1999/xlink","href",e):o.element.setAttribute("hc-svg-href",e),o},symbol:function(e,t,n,r,s,o){var u,a=this.symbols[e],f=a&&a(i(t),i(n),r,s,o),l,c=/^url\((.*?)\)$/,h,p,d;return f?(u=this.path(f),xt(u,{symbolName:e,x:t,y:n,width:r,height:s}),o&&xt(u,o)):c.test(e)&&(d=function(e,t){e.element&&(e.attr({width:t[0],height:t[1]}),e.alignByTranslate||e.translate(i((r-t[0])/2),i((s-t[1])/2)))},h=e.match(c)[1],p=k[h],u=this.image(h).attr({x:t,y:n}),p?d(u,p):(u.attr({width:0,height:0}),l=Ft("img",{onload:function(){d(u,k[h]=[this.width,this.height])},src:h}))),u},symbols:{circle:function(e,t,n,r){var i=.166*n;return[X,e+n/2,t,"C",e+n+i,t,e+n+i,t+r,e+n/2,t+r,"C",e-i,t+r,e-i,t,e+n/2,t,"Z"]},square:function(e,t,n,r){return[X,e,t,V,e+n,t,e+n,t+r,e,t+r,"Z"]},triangle:function(e,t,n,r){return[X,e+n/2,t,V,e+n,t+r,e,t+r,"Z"]},"triangle-down":function(e,t,n,r){return[X,e,t,V,e+n,t,e+n/2,t+r,"Z"]},diamond:function(e,t,n,r){return[X,e+n/2,t,V,e+n,t+r/2,e+n/2,t+r,e,t+r/2,"Z"]},arc:function(e,t,n,r,i){var s=i.start,o=i.r||n||r,u=i.end-1e-6,a=i.innerR,f=i.open,p=l(s),d=c(s),v=l(u),m=c(u),g=i.end-s<h?0:1;return[X,e+o*p,t+o*d,"A",o,o,0,g,1,e+o*v,t+o*m,f?X:V,e+a*v,t+a*m,"A",a,a,0,g,0,e+a*p,t+a*d,f?"":"Z"]}},clipRect:function(e,t,n,r){var i,s=R+L++,o=this.createElement("clipPath").attr({id:s}).add(this.defs);return i=this.rect(e,t,n,r,0).add(o),i.id=s,i.clipPath=o,i},color:function(e,t,n){var r=this,i,s=/^rgba/,o,u,a,f,l,c,h,p,d,v,m=[];e&&e.linearGradient?o="linearGradient":e&&e.radialGradient&&(o="radialGradient");if(o){u=e[o],a=r.gradients,l=e.stops,p=t.radialReference,Lt(u)&&(e[o]=u={x1:u[0],y1:u[1],x2:u[2],y2:u[3],gradientUnits:"userSpaceOnUse"}),o==="radialGradient"&&p&&!Dt(u.gradientUnits)&&xt(u,{cx:p[0]-p[2]/2+u.cx*p[2],cy:p[1]-p[2]/2+u.cy*p[2],r:u.r*p[2],gradientUnits:"userSpaceOnUse"});for(d in u)d!=="id"&&m.push(d,u[d]);for(d in l)m.push(l[d]);return m=m.join(","),a[m]?v=a[m].id:(u.id=v=R+L++,a[m]=f=r.createElement(o).attr(u).add(r.defs),f.stops=[],an(l,function(e){var t;s.test(e[1])?(i=Nn(e[1]),c=i.get("rgb"),h=i.get("a")):(c=e[1],h=1),t=r.createElement("stop").attr({offset:e[0],"stop-color":c,"stop-opacity":h}).add(f),f.stops.push(t)})),"url("+r.url+"#"+v+")"}return s.test(e)?(i=Nn(e),Pt(t,n+"-opacity",i.get("a")),i.get("rgb")):(t.removeAttribute(n+"-opacity"),e)},text:function(e,t,n,r){var s=this,o=O.chart.style,u=T||!S&&s.forExport,a;return r&&!s.forExport?s.html(e,t,n):(t=i(Bt(t,0)),n=i(Bt(n,0)),a=s.createElement("text").attr({x:t,y:n,text:e}).css({fontFamily:o.fontFamily,fontSize:o.fontSize}),u&&a.css({position:F}),a.x=t,a.y=n,a)},html:function(e,t,n){var r=O.chart.style,s=this.createElement("span"),o=s.attrSetters,u=s.element,a=s.renderer;return o.text=function(e){return e!==u.innerHTML&&delete this.bBox,u.innerHTML=e,!1},o.x=o.y=o.align=function(e,t){return t==="align"&&(t="textAlign"),s[t]=e,s.htmlUpdateTransform(),!1},s.attr({text:e,x:i(t),y:i(n)}).css({position:F,whiteSpace:"nowrap",fontFamily:r.fontFamily,fontSize:r.fontSize}),s.css=s.htmlCss,a.isSVG&&(s.add=function(e){var t,n=a.box.parentNode,r,i=[];if(e){t=e.div;if(!t){r=e;while(r)i.push(r),r=r.parentGroup;an(i.reverse(),function(e){var r;t=e.div=e.div||Ft(j,{className:Pt(e.element,"class")},{position:F,left:(e.translateX||0)+z,top:(e.translateY||0)+z},t||n),r=t.style,xt(e.attrSetters,{translateX:function(e){r.left=e+z},translateY:function(e){r.top=e+z},visibility:function(e,t){r[t]=e}})})}}else t=n;return t.appendChild(u),s.added=!0,s.alignOnAdd&&s.htmlUpdateTransform(),s}),s},fontMetrics:function(e){e=Nt(e||11);var t=e<24?e+4:i(e*1.2),n=i(t*.8);return{h:t,b:n}},label:function(t,n,r,s,o,u,a,f,l){function k(){var e,t=p.element.style;v=(y===undefined||b===undefined||h.styles.textAlign)&&p.getBBox(),h.width=(y||v.width||0)+2*g,h.height=(b||v.height||0)+2*g,T=g+c.fontMetrics(t&&t.fontSize).b,C&&(d||(e=f?-T:0,h.box=d=s?c.symbol(s,-m*g,e,h.width,h.height):c.rect(-m*g,e,h.width,h.height,0,x[ft]),d.add(h)),d.attr(hn({width:h.width,height:h.height},x)),x=null)}function L(){var e=h.styles,t=e&&e.textAlign,n=g*(1-m),r;r=f?0:T,Dt(y)&&(t==="center"||t==="right")&&(n+={center:.5,right:1}[t]*(y-v.width)),(n!==p.x||r!==p.y)&&p.attr({x:n,y:r}),p.x=n,p.y=r}function A(e,t){d?d.attr(e,t):x[e]=t}function O(){p.add(h),h.attr({text:t,x:n,y:r}),d&&Dt(o)&&h.attr({anchorX:o,anchorY:u})}var c=this,h=c.g(l),p=c.text("",0,0,a).attr({zIndex:1}),d,v,m=0,g=3,y,b,w,E,S=0,x={},T,N=h.attrSetters,C;pn(h,"add",O),N.width=function(e){return y=e,!1},N.height=function(e){return b=e,!1},N.padding=function(e){return Dt(e)&&e!==g&&(g=e,L()),!1},N.align=function(e){return m={left:0,center:.5,right:1}[e],!1},N.text=function(e,t){return p.attr(t,e),k(),L(),!1},N[ft]=function(e,t){return C=!0,S=e%2/2,A(t,e),!1},N.stroke=N.fill=N.r=function(e,t){return t==="fill"&&(C=!0),A(t,e),!1},N.anchorX=function(e,t){return o=e,A(t,e+S-w),!1},N.anchorY=function(e,t){return u=e,A(t,e-E),!1},N.x=function(e){return h.x=e,e-=m*((y||v.width)+g),w=i(e),h.attr("translateX",w),!1},N.y=function(e){return E=h.y=i(e),h.attr("translateY",e),!1};var M=h.css;return xt(h,{css:function(t){if(t){var n={};t=hn({},t),an(["fontSize","fontWeight","fontFamily","color","lineHeight","width"],function(r){t[r]!==e&&(n[r]=t[r],delete t[r])}),p.css(n)}return M.call(h,t)},getBBox:function(){return{width:v.width+2*g,height:v.height+2*g,x:v.x-g,y:v.y-g}},shadow:function(e){return d&&d.shadow(e),h},destroy:function(){dn(h,"add",O),dn(h.element,"mouseenter"),dn(h.element,"mouseleave"),p&&(p=p.destroy()),d&&(d=d.destroy()),Cn.prototype.destroy.call(h),h=c=k=L=A=O=null}})}},N=kn;var Ln;if(!S&&!T){var An={init:function(e,t){var n=this,r=["<",t,' filled="f" stroked="f"'],i=["position: ",F,";"];(t==="shape"||t===j)&&i.push("left:0;top:0;width:1px;height:1px;"),g&&i.push("visibility: ",t===j?q:U),r.push(' style="',i.join(""),'"/>'),t&&(r=t===j||t==="span"||t==="img"?r.join(""):e.prepVML(r),n.element=Ft(r)),n.renderer=e,n.attrSetters={}},add:function(e){var t=this,n=t.renderer,r=t.element,i=n.box,s=e&&e.inverted,o=e?e.element||e:i;return s&&n.invertChild(r,o),o.appendChild(r),t.added=!0,t.alignOnAdd&&!t.deferUpdateTransform&&t.updateTransform(),vn(t,"add"),t},updateTransform:Cn.prototype.htmlUpdateTransform,attr:function(t,n){var r=this,s,o,a,f,h=r.element||{},d=h.style,v=h.nodeName,m=r.renderer,y=r.symbolName,b,w=r.shadows,E,S=r.attrSetters,x=r;Ct(t)&&Dt(n)&&(s=t,t={},t[s]=n);if(Ct(t))s=t,s==="strokeWidth"||s==="stroke-width"?x=r.strokeweight:x=r[s];else for(s in t){o=t[s],E=!1,f=S[s]&&S[s].call(r,o,s);if(f!==!1&&o!==null){f!==e&&(o=f);if(y&&/^(x|y|r|start|end|width|height|innerR|anchorX|anchorY)/.test(s))b||(r.symbolAttr(t),b=!0),E=!0;else if(s==="d"){o=o||[],r.d=o.join(" "),a=o.length;var T=[];while(a--)At(o[a])?T[a]=i(o[a]*10)-5:o[a]==="Z"?T[a]="x":T[a]=o[a];o=T.join(" ")||"x",h.path=o;if(w){a=w.length;while(a--)w[a].path=w[a].cutOff?this.cutOffPath(o,w[a].cutOff):o}E=!0}else if(s==="visibility"){if(w){a=w.length;while(a--)w[a].style[s]=o}v==="DIV"&&(o=o===q?"-999em":0,s="top"),d[s]=o,E=!0}else if(s==="zIndex")o&&(d[s]=o),E=!0;else if(s==="width"||s==="height")o=u(0,o),this[s]=o,r.updateClipping?(r[s]=o,r.updateClipping()):d[s]=o,E=!0;else if(s==="x"||s==="y")r[s]=o,d[{x:"left",y:"top"}[s]]=o;else if(s==="class")h.className=o;else if(s==="stroke")o=m.color(o,h,s),s="strokecolor";else if(s==="stroke-width"||s==="strokeWidth")h.stroked=o?!0:!1,s="strokeweight",r[s]=o,At(o)&&(o+=z);else if(s==="dashstyle"){var N=h.getElementsByTagName("stroke")[0]||Ft(m.prepVML(["<stroke/>"]),null,null,h);N[s]=o||"solid",r.dashstyle=o,E=!0}else s==="fill"?v==="SPAN"?d.color=o:v!=="IMG"&&(h.filled=o!==W?!0:!1,o=m.color(o,h,s,r),s="fillcolor"):v==="shape"&&s==="rotation"?(r[s]=o,h.style.left=-i(c(o*p)+1)+z,h.style.top=i(l(o*p))+z):s==="translateX"||s==="translateY"||s==="rotation"?(r[s]=o,r.updateTransform(),E=!0):s==="text"&&(this.bBox=null,h.innerHTML=o,E=!0);E||(g?h[s]=o:Pt(h,s,o))}}return x},clip:function(e){var t=this,n,r=t.element,i=r.parentNode,s;return e?(n=e.members,_t(n,t),n.push(t),t.destroyClip=function(){_t(n,t)},i&&i.className==="highcharts-tracker"&&!g&&jt(r,{visibility:q}),s=e.getCSS(t)):(t.destroyClip&&t.destroyClip(),s={clip:g?"inherit":"rect(auto)"}),t.css(s)},css:Cn.prototype.htmlCss,safeRemoveChild:function(e){e.parentNode&&Yt(e)},destroy:function(){return this.destroyClip&&this.destroyClip(),Cn.prototype.destroy.apply(this)},empty:function(){var e=this.element,t=e.childNodes,n=t.length,r;while(n--)r=t[n],r.parentNode.removeChild(r)},on:function(e,t){return this.element["on"+e]=function(){var e=n.event;e.target=e.srcElement,t(e)},this},cutOffPath:function(e,t){var n;e=e.split(/[ ,]/),n=e.length;if(n===9||n===11)e[n-4]=e[n-2]=Nt(e[n-2])-10*t;return e.join(" ")},shadow:function(e,t,n){var r=[],i,s=this.element,o=this.renderer,u,a=s.style,f,l=s.path,c,h,p,d;l&&typeof l.value!="string"&&(l="x"),h=l;if(e){p=Bt(e.width,3),d=(e.opacity||.15)/p;for(i=1;i<=3;i++)c=p*2+1-2*i,n&&(h=this.cutOffPath(l.value,c+.5)),f=['<shape isShadow="true" strokeweight="',c,'" filled="false" path="',h,'" coordsize="10 10" style="',s.style.cssText,'" />'],u=Ft(o.prepVML(f),null,{left:Nt(a.left)+Bt(e.offsetX,1),top:Nt(a.top)+Bt(e.offsetY,1)}),n&&(u.cutOff=c+1),f=['<stroke color="',e.color||"black",'" opacity="',d*i,'"/>'],Ft(o.prepVML(f),null,null,u),t?t.element.appendChild(u):s.parentNode.insertBefore(u,s),r.push(u);this.shadows=r}return this}};An=It(Cn,An);var On={Element:An,isIE8:d.indexOf("MSIE 8.0")>-1,init:function(e,n,r){var i=this,s,o;i.alignedObjects=[],s=i.createElement(j),o=s.element,o.style.position=I,e.appendChild(s.element),i.box=o,i.boxWrapper=s,i.setSize(n,r,!1),t.namespaces.hcv||(t.namespaces.add("hcv","urn:schemas-microsoft-com:vml"),t.createStyleSheet().cssText="hcv\\:fill, hcv\\:path, hcv\\:shape, hcv\\:stroke{ behavior:url(#default#VML); display: inline-block; } ")},isHidden:function(){return!this.box.offsetWidth},clipRect:function(e,t,n,r){var s=this.createElement(),o=kt(e);return xt(s,{members:[],left:o?e.x:e,top:o?e.y:t,width:o?e.width:n,height:o?e.height:r,getCSS:function(e){var t=e.inverted,n=this,r=n.top,s=n.left,o=s+n.width,u=r+n.height,a={clip:"rect("+i(t?s:r)+"px,"+i(t?u:o)+"px,"+i(t?o:u)+"px,"+i(t?r:s)+"px)"};return!t&&g&&e.element.nodeName!=="IMG"&&xt(a,{width:o+z,height:u+z}),a},updateClipping:function(){an(s.members,function(e){e.css(s.getCSS(e))})}})},color:function(e,t,n,i){var s=this,o,u=/^rgba/,a,f,l=W;e&&e.linearGradient?f="gradient":e&&e.radialGradient&&(f="pattern");if(f){var c,p,d=e.linearGradient||e.radialGradient,v,m,g,y,b,w,E,S,x="",T=e.stops,N,C,k=[],L=function(){a=['<fill colors="'+k.join(",")+'" opacity="',w,'" o:opacity2="',b,'" type="',f,'" ',x,'focus="100%" method="any" />'],Ft(s.prepVML(a),null,null,t)};N=T[0],C=T[T.length-1],N[0]>0&&T.unshift([0,N[1]]),C[0]<1&&T.push([1,C[1]]),an(T,function(e,t){u.test(e[1])?(o=Nn(e[1]),c=o.get("rgb"),p=o.get("a")):(c=e[1],p=1),k.push(e[0]*100+"% "+c),t?(w=p,E=c):(b=p,S=c)});if(n==="fill")if(f==="gradient")v=d.x1||d[0]||0,m=d.y1||d[1]||0,g=d.x2||d[2]||0,y=d.y2||d[3]||0,x='angle="'+(90-r.atan((y-m)/(g-v))*180/h)+'"',L();else{var A=d.r,M=A*2,_=A*2,D=d.cx,P=d.cy,H=t.radialReference,B,j=function(){H&&(B=i.getBBox(),D+=(H[0]-B.x)/B.width-.5,P+=(H[1]-B.y)/B.height-.5,M*=H[2]/B.width,_*=H[2]/B.height),x='src="'+O.global.VMLRadialGradientURL+'" '+'size="'+M+","+_+'" '+'origin="0.5,0.5" '+'position="'+D+","+P+'" '+'color2="'+S+'" ',L()};i.added?j():pn(i,"add",j),l=E}else l=c}else if(u.test(e)&&t.tagName!=="IMG")o=Nn(e),a=["<",n,' opacity="',o.get("a"),'"/>'],Ft(this.prepVML(a),null,null,t),l=o.get("rgb");else{var F=t.getElementsByTagName(n);F.length&&(F[0].opacity=1),l=e}return l},prepVML:function(e){var t="display:inline-block;behavior:url(#default#VML);",n=this.isIE8;return e=e.join(""),n?(e=e.replace("/>",' xmlns="urn:schemas-microsoft-com:vml" />'),e.indexOf('style="')===-1?e=e.replace("/>",' style="'+t+'" />'):e=e.replace('style="','style="'+t)):e=e.replace("<","<hcv:"),e},text:kn.prototype.html,path:function(e){var t={coordsize:"10 10"};return Lt(e)?t.d=e:kt(e)&&xt(t,e),this.createElement("shape").attr(t)},circle:function(e,t,n){return this.symbol("circle").attr({x:e-n,y:t-n,width:2*n,height:2*n})},g:function(e){var t,n;return e&&(n={className:R+e,"class":R+e}),t=this.createElement(j).attr(n),t},image:function(e,t,n,r,i){var s=this.createElement("img").attr({src:e});return arguments.length>1&&s.attr({x:t,y:n,width:r,height:i}),s},rect:function(e,t,n,r,i,s){kt(e)&&(t=e.y,n=e.width,r=e.height,s=e.strokeWidth,e=e.x);var o=this.symbol("rect");return o.r=i,o.attr(o.crisp(s,e,t,u(n,0),u(r,0)))},invertChild:function(e,t){var n=t.style;jt(e,{flip:"x",left:Nt(n.width)-1,top:Nt(n.height)-1,rotation:-90})},symbols:{arc:function(e,t,n,r,i){var s=i.start,o=i.end,u=i.r||n||r,a=l(s),f=c(s),p=l(o),d=c(o),v=i.innerR,m=.08/u,g=v&&.1/v||0,y;return o-s===0?["x"]:(2*h-o+s<m?p=-m:o-s<g&&(p=l(s+g)),y=["wa",e-u,t-u,e+u,t+u,e+u*a,t+u*f,e+u*p,t+u*d],i.open&&!v&&y.push("e",X,e,t),y.push("at",e-v,t-v,e+v,t+v,e+v*p,t+v*d,e+v*a,t+v*f,"x","e"),y)},circle:function(e,t,n,r){return["wa",e,t,e+n,t+r,e+n,t+r/2,e+n,t+r/2,"e"]},rect:function(e,t,n,r,i){var s=e+n,o=t+r,u,f;return!Dt(i)||!i.r?u=kn.prototype.symbols.square.apply(0,arguments):(f=a(i.r,n,r),u=[X,e+f,t,V,s-f,t,"wa",s-2*f,t,s,t+2*f,s-f,t,s,t+f,V,s,o-f,"wa",s-2*f,o-2*f,s,o,s,o-f,s-f,o,V,e+f,o,"wa",e,o-2*f,e+2*f,o,e+f,o,e,o-f,V,e,t+f,"wa",e,t,e+2*f,t+2*f,e,t+f,e+f,t,"x","e"]),u}}};Ln=function(){this.init.apply(this,arguments)},Ln.prototype=hn(kn.prototype,On),N=Ln}var Mn,_n;T&&(Mn=function(){E="http://www.w3.org/1999/xhtml"},Mn.prototype.symbols={},_n=function(){function t(){var t=e.length,n;for(n=0;n<t;n++)e[n]();e=[]}var e=[];return{push:function(n,r){e.length===0&&on(r,t),e.push(n)}}}()),N=Ln||Mn||kn,Dn.prototype={addLabel:function(){var e=this,t=e.axis,n=t.options,r=t.chart,s=t.horiz,o=t.categories,a=e.pos,f=n.labels,l,c=t.tickPositions,h=o&&s&&o.length&&!f.step&&!f.staggerLines&&!f.rotation&&r.plotWidth/c.length||!s&&r.plotWidth/2,p=a===c[0],d=a===c[c.length-1],v,m,g=o&&Dt(o[a])?o[a]:a,y=e.label,b=c.info,w;t.isDatetimeAxis&&b&&(w=n.dateTimeLabelFormats[b.higherRanks[a]||b.unitName]),e.isFirst=p,e.isLast=d,l=t.labelFormatter.call({axis:t,chart:r,isFirst:p,isLast:d,dateTimeLabelFormat:w,value:t.isLog?en(Mt(g)):g}),v=h&&{width:u(1,i(h-2*(f.padding||10)))+z},v=xt(v,f.style),Dt(y)?y&&y.attr({text:l}).css(v):(m={align:f.align},At(f.rotation)&&(m.rotation=f.rotation),e.label=Dt(l)&&f.enabled?r.renderer.text(l,0,0,f.useHTML).attr(m).css(v).add(t.labelGroup):null)},getLabelSize:function(){var e=this.label,t=this.axis;return e?(this.labelBBox=e.getBBox())[t.horiz?"height":"width"]:0},getLabelSides:function(){var e=this.labelBBox,t=this.axis,n=t.options,r=n.labels,i=e.width,s=i*{left:0,center:.5,right:1}[r.align]-r.x;return[-s,i-s]},handleOverflow:function(e,t){var n=!0,r=this.axis,i=r.chart,s=this.isFirst,o=this.isLast,u=t.x,a=r.reversed,f=r.tickPositions;if(s||o){var l=this.getLabelSides(),c=l[0],h=l[1],p=i.plotLeft,d=p+r.len,v=r.ticks[f[e+(s?1:-1)]],m=v&&v.label.xy&&v.label.xy.x+v.getLabelSides()[s?0:1];s&&!a||o&&a?u+c<p&&(u=p-c,v&&u+h>m&&(n=!1)):u+h>d&&(u=d-h,v&&u+c<m&&(n=!1)),t.x=u}return n},getPosition:function(e,t,n,r){var i=this.axis,s=i.chart,o=r&&s.oldChartHeight||s.chartHeight;return{x:e?i.translate(t+n,null,null,r)+i.transB:i.left+i.offset+(i.opposite?(r&&s.oldChartWidth||s.chartWidth)-i.right-i.left:0),y:e?o-i.bottom+i.offset-(i.opposite?i.height:0):o-i.translate(t+n,null,null,r)-i.transB}},getLabelPosition:function(e,t,n,r,i,s,o,u){var a=this.axis,f=a.transA,l=a.reversed,c=a.staggerLines;return e=e+i.x-(s&&r?s*f*(l?-1:1):0),t=t+i.y-(s&&!r?s*f*(l?1:-1):0),Dt(i.y)||(t+=Nt(n.styles.lineHeight)*.9-n.getBBox().height/2),c&&(t+=o/(u||1)%c*16),{x:e,y:t}},getMarkPath:function(e,t,n,r,i,s){return s.crispLine([X,e,t,V,e+(i?0:-n),t+(i?n:0)],r)},render:function(t,n){var r=this,i=r.axis,s=i.options,o=i.chart,u=o.renderer,a=i.horiz,f=r.type,l=r.label,c=r.pos,h=s.labels,p=r.gridLine,d=f?f+"Grid":"grid",v=f?f+"Tick":"tick",m=s[d+"LineWidth"],g=s[d+"LineColor"],y=s[d+"LineDashStyle"],b=s[v+"Length"],w=s[v+"Width"]||0,E=s[v+"Color"],S=s[v+"Position"],x,T=r.mark,N,C=h.step,k,L=!0,A=i.tickmarkOffset,O=r.getPosition(a,c,A,n),M=O.x,_=O.y,D=i.staggerLines;m&&(x=i.getPlotLinePath(c+A,m,n),p===e&&(k={stroke:g,"stroke-width":m},y&&(k.dashstyle=y),f||(k.zIndex=1),r.gridLine=p=m?u.path(x).attr(k).add(i.gridGroup):null),!n&&p&&x&&p[r.isNew?"attr":"animate"]({d:x})),w&&b&&(S==="inside"&&(b=-b),i.opposite&&(b=-b),N=r.getMarkPath(M,_,b,w,a,u),T?T.animate({d:N}):r.mark=u.path(N).attr({stroke:E,"stroke-width":w}).add(i.axisGroup)),l&&!isNaN(M)&&(l.xy=O=r.getLabelPosition(M,_,l,a,h,A,t,C),r.isFirst&&!Bt(s.showFirstLabel,1)||r.isLast&&!Bt(s.showLastLabel,1)?L=!1:!D&&a&&h.overflow==="justify"&&!r.handleOverflow(t,O)&&(L=!1),C&&t%C&&(L=!1),L?(l[r.isNew?"attr":"animate"](O),r.isNew=!1):l.attr("y",-9999))},destroy:function(){Gt(this,this.axis)}},Pn.prototype={render:function(){var e=this,t=e.axis,n=t.horiz,r=(t.pointRange||0)/2,i=e.options,s=i.label,o=e.label,f=i.width,l=i.to,c=i.from,h=Dt(c)&&Dt(l),p=i.value,d=i.dashStyle,v=e.svgElem,m=[],g,y,b,w,E,S,x=i.color,T=i.zIndex,N=i.events,C,k=t.chart.renderer;t.isLog&&(c=Ot(c),l=Ot(l),p=Ot(p));if(f)m=t.getPlotLinePath(p,f),C={stroke:x,"stroke-width":f},d&&(C.dashstyle=d);else{if(!h)return;c=u(c,t.min-r),l=a(l,t.max+r),m=t.getPlotBandPath(c,l,i),C={fill:x},i.borderWidth&&(C.stroke=i.borderColor,C["stroke-width"]=i.borderWidth)}Dt(T)&&(C.zIndex=T);if(v)m?v.animate({d:m},null,v.onGetPath):(v.hide(),v.onGetPath=function(){v.show()});else if(m&&m.length){e.svgElem=v=k.path(m).attr(C).add();if(N){g=function(t){v.on(t,function(n){N[t].apply(e,[n])})};for(y in N)g(y)}}return s&&Dt(s.text)&&m&&m.length&&t.width>0&&t.height>0?(s=hn({align:n&&h&&"center",x:n?!h&&4:10,verticalAlign:!n&&h&&"middle",y:n?h?16:10:h?6:-4,rotation:n&&!h&&90},s),o||(e.label=o=k.text(s.text,0,0).attr({align:s.textAlign||s.align,rotation:s.rotation,zIndex:T}).css(s.style).add()),b=[m[1],m[4],Bt(m[6],m[1])],w=[m[2],m[5],Bt(m[7],m[2])],E=Kt(b),S=Kt(w),o.align(s,!1,{x:E,y:S,width:Qt(b)-E,height:Qt(w)-S}),o.show()):o&&o.hide(),e},destroy:function(){var e=this,t=e.axis;_t(t.plotLinesAndBands,e),Gt(e,this.axis)}},Hn.prototype={destroy:function(){Gt(this,this.axis)},setTotal:function(e){this.total=e,this.cum=e},render:function(e){var t=this.options.formatter.call(this);this.label?this.label.attr({text:t,visibility:q}):this.label=this.axis.chart.renderer.text(t,0,0).css(this.options.style).attr({align:this.textAlign,rotation:this.options.rotation,visibility:q}).add(e)},setOffset:function(e,t){var n=this,r=n.axis,i=r.chart,s=i.inverted,o=this.isNegative,u=r.translate(this.percent?100:this.total,0,0,0,1),a=r.translate(0),l=f(u-a),c=i.xAxis[0].translate(this.x)+e,h=i.plotHeight,p={x:s?o?u:u-l:c,y:s?h-c-t:o?h-u-l:h-u,width:s?l:t,height:s?t:l},d=this.label,v;d&&(d.align(this.alignOptions,null,p),v=d.alignAttr,d.attr({visibility:this.options.crop===!1||i.isInsidePlot(v.x,v.y)?S?"inherit":U:q}))}},Bn.prototype={defaultOptions:{dateTimeLabelFormats:{millisecond:"%H:%M:%S.%L",second:"%H:%M:%S",minute:"%H:%M",hour:"%H:%M",day:"%e. %b",week:"%e. %b",month:"%b '%y",year:"%Y"},endOnTick:!1,gridLineColor:"#C0C0C0",labels:bn,lineColor:"#C0D0E0",lineWidth:1,minPadding:.01,maxPadding:.01,minorGridLineColor:"#E0E0E0",minorGridLineWidth:1,minorTickColor:"#A0A0A0",minorTickLength:2,minorTickPosition:"outside",startOfWeek:1,startOnTick:!1,tickColor:"#C0D0E0",tickLength:5,tickmarkPlacement:"between",tickPixelInterval:100,tickPosition:"outside",tickWidth:1,title:{align:"middle",style:{color:"#6D869F",fontWeight:"bold"}},type:"linear"},defaultYAxisOptions:{endOnTick:!0,gridLineWidth:1,tickPixelInterval:72,showLastLabel:!0,labels:{align:"right",x:-8,y:3},lineWidth:0,maxPadding:.05,minPadding:.05,startOnTick:!0,tickWidth:0,title:{rotation:270,text:"Y-values"},stackLabels:{enabled:!1,formatter:function(){return this.total},style:bn.style}},defaultLeftAxisOptions:{labels:{align:"right",x:-8,y:null},title:{rotation:270}},defaultRightAxisOptions:{labels:{align:"left",x:8,y:null},title:{rotation:90}},defaultBottomAxisOptions:{labels:{align:"center",x:0,y:14},title:{rotation:0}},defaultTopAxisOptions:{labels:{align:"center",x:0,y:-5},title:{rotation:0}},init:function(t,n){var r=n.isX,i=this;i.horiz=t.inverted?!r:r,i.isXAxis=r,i.xOrY=r?"x":"y",i.opposite=n.opposite,i.side=i.horiz?i.opposite?0:2:i.opposite?1:3,i.setOptions(n);var s=this.options,o=s.type,u=o==="datetime";i.labelFormatter=s.labels.formatter||i.defaultLabelFormatter,i.staggerLines=i.horiz&&s.labels.staggerLines,i.userOptions=n,i.minPixelPadding=0,i.chart=t,i.reversed=s.reversed,i.categories=s.categories,i.isLog=o==="logarithmic",i.isLinked=Dt(s.linkedTo),i.isDatetimeAxis=u,i.tickmarkOffset=s.categories&&s.tickmarkPlacement==="between"?.5:0,i.ticks={},i.minorTicks={},i.plotLinesAndBands=[],i.alternateBands={},i.len=0,i.minRange=i.userMinRange=s.minRange||s.maxZoom,i.range=s.range,i.offset=s.offset||0,i.stacks={},i.max=null,i.min=null;var a,f=i.options.events;t.axes.push(i),t[r?"xAxis":"yAxis"].push(i),i.series=[],t.inverted&&r&&i.reversed===e&&(i.reversed=!0),i.removePlotBand=i.removePlotBandOrLine,i.removePlotLine=i.removePlotBandOrLine,i.addPlotBand=i.addPlotBandOrLine,i.addPlotLine=i.addPlotBandOrLine;for(a in f)pn(i,a,f[a]);i.isLog&&(i.val2lin=Ot,i.lin2val=Mt)},setOptions:function(e){this.options=hn(this.defaultOptions,this.isXAxis?{}:this.defaultYAxisOptions,[this.defaultTopAxisOptions,this.defaultRightAxisOptions,this.defaultBottomAxisOptions,this.defaultLeftAxisOptions][this.side],hn(O[this.isXAxis?"xAxis":"yAxis"],e))},defaultLabelFormatter:function(){var t=this.axis,n=this.value,r=t.categories,i=this.dateTimeLabelFormat,s=O.lang.numericSymbols,o=s&&s.length,u,a,f=t.isLog?n:t.tickInterval;if(r)a=n;else if(i)a=M(i,n);else if(o&&f>=1e3)while(o--&&a===e)u=Math.pow(1e3,o+1),f>=u&&s[o]!==null&&(a=Rt(n/u,-1)+s[o]);return a===e&&(n>=1e3?a=Rt(n,0):a=Rt(n,-1)),a},getSeriesExtremes:function(){var t=this,n=t.chart,r=t.stacks,i=[],s=[],o;t.hasVisibleSeries=!1,t.dataMin=t.dataMax=null,an(t.series,function(f){if(f.visible||!n.options.chart.ignoreHiddenSeries){var l=f.options,c,h,p,d,v,m,g,y,b,w,E=l.threshold,S,x=[],T=0;t.hasVisibleSeries=!0,t.isLog&&E<=0&&(E=l.threshold=null);if(t.isXAxis)g=f.xData,g.length&&(t.dataMin=a(Bt(t.dataMin,g[0]),Kt(g)),t.dataMax=u(Bt(t.dataMax,g[0]),Qt(g)));else{var N,C,k,L=f.cropped,A=f.xAxis.getExtremes(),O,M=!!f.modifyValue;c=l.stacking,t.usePercentage=c==="percent",c&&(v=l.stack,d=f.type+Bt(v,""),m="-"+d,f.stackKey=d,h=i[d]||[],i[d]=h,p=s[m]||[],s[m]=p),t.usePercentage&&(t.dataMin=0,t.dataMax=99),g=f.processedXData,y=f.processedYData,S=y.length;for(o=0;o<S;o++){b=g[o],w=y[o],c&&(N=w<E,C=N?p:h,k=N?m:d,Dt(C[b])?(C[b]=en(C[b]+w),w=[w,C[b]]):C[b]=w,r[k]||(r[k]={}),r[k][b]||(r[k][b]=new Hn(t,t.options.stackLabels,N,b,v,c)),r[k][b].setTotal(C[b]));if(w!==null&&w!==e){M&&(w=f.modifyValue(w));if(L||(g[o+1]||b)>=A.min&&(g[o-1]||b)<=A.max){O=w.length;if(O)while(O--)w[O]!==null&&(x[T++]=w[O]);else x[T++]=w}}}!t.usePercentage&&x.length&&(t.dataMin=a(Bt(t.dataMin,x[0]),Kt(x)),t.dataMax=u(Bt(t.dataMax,x[0]),Qt(x))),Dt(E)&&(t.dataMin>=E?(t.dataMin=E,t.ignoreMinPadding=!0):t.dataMax<E&&(t.dataMax=E,t.ignoreMaxPadding=!0))}}})},translate:function(e,t,n,r,i,s){var o=this,u=o.len,a=1,f=0,l=r?o.oldTransA:o.transA,c=r?o.oldMin:o.min,h,p=o.options.ordinal||o.isLog&&i;return l||(l=o.transA),n&&(a*=-1,f=u),o.reversed&&(a*=-1,f-=a*u),t?(o.reversed&&(e=u-e),h=e/l+c,p&&(h=o.lin2val(h))):(p&&(e=o.val2lin(e)),h=a*(e-c)*l+f+a*o.minPixelPadding+(s?l*o.pointRange/2:0)),h},getPlotLinePath:function(e,t,n){var r=this,s=r.chart,o=r.left,u=r.top,a,f,l,c,h=r.translate(e,null,null,n),p=n&&s.oldChartHeight||s.chartHeight,d=n&&s.oldChartWidth||s.chartWidth,v,m=r.transB;a=l=i(h+m),f=c=i(p-h-m);if(isNaN(h))v=!0;else if(r.horiz){f=u,c=p-r.bottom;if(a<o||a>o+r.width)v=!0}else{a=o,l=d-r.right;if(f<u||f>u+r.height)v=!0}return v?null:s.renderer.crispLine([X,a,f,V,l,c],t||0)},getPlotBandPath:function(e,t){var n=this.getPlotLinePath(t),r=this.getPlotLinePath(e);return r&&n?r.push(n[4],n[5],n[1],n[2]):r=null,r},getLinearTickPositions:function(e,t,n){var r,i,u=en(s(t/e)*e),a=en(o(n/e)*e),f=[];r=u;while(r<=a){f.push(r),r=en(r+e);if(r===i)break;i=r}return f},getLogTickPositions:function(e,t,n,o){var u=this,a=u.options,f=u.len,l=[];o||(u._minorAutoInterval=null);if(e>=.5)e=i(e),l=u.getLinearTickPositions(e,t,n);else if(e>=.08){var c=s(t),h,p,d,v,m,g,y;e>.3?h=[1,2,4]:e>.15?h=[1,2,4,6,8]:h=[1,2,3,4,5,6,7,8,9];for(p=c;p<n+1&&!y;p++){v=h.length;for(d=0;d<v&&!y;d++)m=Ot(Mt(p)*h[d]),m>t&&l.push(g),g>n&&(y=!0),g=m}}else{var b=Mt(t),w=Mt(n),E=a[o?"minorTickInterval":"tickInterval"],S=E==="auto"?null:E,x=a.tickPixelInterval/(o?5:1),T=o?f/u.tickPositions.length:f;e=Bt(S,u._minorAutoInterval,(w-b)*x/(T||1)),e=Wt(e,null,r.pow(10,s(r.log(e)/r.LN10))),l=cn(u.getLinearTickPositions(e,b,w),Ot),o||(u._minorAutoInterval=e/5)}return o||(u.tickInterval=e),l},getMinorTickPositions:function(){var e=this,t=e.options,n=e.tickPositions,r=e.minorTickInterval,i=[],s,o,u;if(e.isLog){u=n.length;for(o=1;o<u;o++)i=i.concat(e.getLogTickPositions(r,n[o-1],n[o],!0))}else if(e.isDatetimeAxis&&t.minorTickInterval==="auto")i=i.concat(Vt(Xt(r),e.min,e.max,t.startOfWeek));else for(s=e.min+(n[0]-e.min)%r;s<=e.max;s+=r)i.push(s);return i},adjustForMinRange:function(){var t=this,n=t.options,r=t.min,i=t.max,s,o=t.dataMax-t.dataMin>=t.minRange,u,f,l,c,h,p,d;t.isXAxis&&t.minRange===e&&!t.isLog&&(Dt(n.min)||Dt(n.max)?t.minRange=null:(an(t.series,function(t){c=t.xData,h=t.xIncrement?1:c.length-1;for(f=h;f>0;f--){l=c[f]-c[f-1];if(u===e||l<u)u=l}}),t.minRange=a(u*5,t.dataMax-t.dataMin)));if(i-r<t.minRange){var v=t.minRange;s=(v-i+r)/2,p=[r-s,Bt(n.min,r-s)],o&&(p[2]=t.dataMin),r=Qt(p),d=[r+v,Bt(n.max,r+v)],o&&(d[2]=t.dataMax),i=Kt(d),i-r<v&&(p[0]=i-v,p[1]=Bt(n.min,i-v),r=Qt(p))}t.min=r,t.max=i},setAxisTranslation:function(){var e=this,t=e.max-e.min,n=0,r,i=0,s=0,o=e.linkedParent,f=e.transA;e.isXAxis&&(o?(i=o.minPointOffset,s=o.pointRangePadding):an(e.series,function(e){var t=e.pointRange,o=e.options.pointPlacement,f=e.closestPointRange;n=u(n,t),i=u(i,o?0:t/2),s=u(s,o==="on"?0:t),!e.noSharedTooltip&&Dt(f)&&(r=Dt(r)?a(r,f):f)}),e.minPointOffset=i,e.pointRangePadding=s,e.pointRange=n,e.closestPointRange=r),e.oldTransA=f,e.translationSlope=e.transA=f=e.len/(t+s||1),e.transB=e.horiz?e.left:e.bottom,e.minPixelPadding=f*i},setTickPositions:function(e){var t=this,n=t.chart,i=t.options,o=t.isLog,f=t.isDatetimeAxis,l=t.isXAxis,c=t.isLinked,h=t.options.tickPositioner,p,d=i.maxPadding,v=i.minPadding,m,g,y=i.tickInterval,b=i.minTickInterval,w=i.tickPixelInterval,E,S=t.categories;c?(t.linkedParent=n[l?"xAxis":"yAxis"][i.linkedTo],g=t.linkedParent.getExtremes(),t.min=Bt(g.min,g.dataMin),t.max=Bt(g.max,g.dataMax),i.type!==t.linkedParent.options.type&&Zt(11,1)):(t.min=Bt(t.userMin,i.min,t.dataMin),t.max=Bt(t.userMax,i.max,t.dataMax)),o&&(!e&&a(t.min,Bt(t.dataMin,t.min))<=0&&Zt(10,1),t.min=en(Ot(t.min)),t.max=en(Ot(t.max))),t.range&&(t.userMin=t.min=u(t.min,t.max-t.range),t.userMax=t.max,e&&(t.range=null)),t.adjustForMinRange(),!S&&!t.usePercentage&&!c&&Dt(t.min)&&Dt(t.max)&&(m=t.max-t.min,m&&(!Dt(i.min)&&!Dt(t.userMin)&&v&&(t.dataMin<0||!t.ignoreMinPadding)&&(t.min-=m*v),!Dt(i.max)&&!Dt(t.userMax)&&d&&(t.dataMax>0||!t.ignoreMaxPadding)&&(t.max+=m*d))),t.min===t.max||t.min===undefined||t.max===undefined?t.tickInterval=1:c&&!y&&w===t.linkedParent.options.tickPixelInterval?t.tickInterval=t.linkedParent.tickInterval:t.tickInterval=Bt(y,S?1:(t.max-t.min)*w/(t.len||1)),l&&!e&&an(t.series,function(e){e.processData(t.min!==t.oldMin||t.max!==t.oldMax)}),t.setAxisTranslation(e),t.beforeSetTickPositions&&t.beforeSetTickPositions(),t.postProcessTickInterval&&(t.tickInterval=t.postProcessTickInterval(t.tickInterval)),!y&&t.tickInterval<b&&(t.tickInterval=b),!f&&!o&&(p=r.pow(10,s(r.log(t.tickInterval)/r.LN10)),y||(t.tickInterval=Wt(t.tickInterval,null,p,i))),t.minorTickInterval=i.minorTickInterval==="auto"&&t.tickInterval?t.tickInterval/5:i.minorTickInterval,t.tickPositions=E=i.tickPositions||h&&h.apply(t,[t.min,t.max]),E||(f?E=(t.getNonLinearTimeTicks||Vt)(Xt(t.tickInterval,i.units),t.min,t.max,i.startOfWeek,t.ordinalPositions,t.closestPointRange,!0):o?E=t.getLogTickPositions(t.tickInterval,t.min,t.max):E=t.getLinearTickPositions(t.tickInterval,t.min,t.max),t.tickPositions=E);if(!c){var x=E[0],T=E[E.length-1],N=t.minPointOffset||0,C;i.startOnTick?t.min=x:t.min-N>x&&E.shift(),i.endOnTick?t.max=T:t.max+N<T&&E.pop(),E.length===1&&(C=1e-9,t.min-=C,t.max+=C)}},setMaxTicks:function(){var e=this.chart,t=e.maxTicks,n=this.tickPositions,r=this.xOrY;t||(t={x:0,y:0}),!this.isLinked&&!this.isDatetimeAxis&&n.length>t[r]&&this.options.alignTicks!==!1&&(t[r]=n.length),e.maxTicks=t},adjustTickAmount:function(){var e=this,t=e.chart,n=e.xOrY,r=e.tickPositions,i=t.maxTicks;if(i&&i[n]&&!e.isDatetimeAxis&&!e.categories&&!e.isLinked&&e.options.alignTicks!==!1){var s=e.tickAmount,o=r.length,u;e.tickAmount=u=i[n];if(o<u){while(r.length<u)r.push(en(r[r.length-1]+e.tickInterval));e.transA*=(o-1)/(u-1),e.max=r[r.length-1]}Dt(s)&&u!==s&&(e.isDirty=!0)}},setScale:function(){var e=this,t=e.stacks,n,r,i,s;e.oldMin=e.min,e.oldMax=e.max,e.oldAxisLength=e.len,e.setAxisSize(),s=e.len!==e.oldAxisLength,an(e.series,function(e){if(e.isDirtyData||e.isDirty||e.xAxis.isDirty)i=!0});if(s||i||e.isLinked||e.userMin!==e.oldUserMin||e.userMax!==e.oldUserMax)e.getSeriesExtremes(),e.setTickPositions(),e.oldUserMin=e.userMin,e.oldUserMax=e.userMax,e.isDirty||(e.isDirty=s||e.min!==e.oldMin||e.max!==e.oldMax);if(!e.isXAxis)for(n in t)for(r in t[n])t[n][r].cum=t[n][r].total;e.setMaxTicks()},setExtremes:function(e,t,n,r,i){var s=this,o=s.chart;n=Bt(n,!0),i=xt(i,{min:e,max:t}),vn(s,"setExtremes",i,function(){s.userMin=e,s.userMax=t,s.isDirtyExtremes=!0,n&&o.redraw(r)})},zoom:function(t,n){return this.setExtremes(t,n,!1,e,{trigger:"zoom"}),!0},setAxisSize:function(){var e=this,t=e.chart,n=e.options,r=n.offsetLeft||0,i=n.offsetRight||0;e.left=Bt(n.left,t.plotLeft+r),e.top=Bt(n.top,t.plotTop),e.width=Bt(n.width,t.plotWidth-r+i),e.height=Bt(n.height,t.plotHeight),e.bottom=t.chartHeight-e.height-e.top,e.right=t.chartWidth-e.width-e.left,e.len=u(e.horiz?e.width:e.height,0)},getExtremes:function(){var e=this,t=e.isLog;return{min:t?en(Mt(e.min)):e.min,max:t?en(Mt(e.max)):e.max,dataMin:e.dataMin,dataMax:e.dataMax,userMin:e.userMin,userMax:e.userMax}},getThreshold:function(e){var t=this,n=t.isLog,r=n?Mt(t.min):t.min,i=n?Mt(t.max):t.max;return r>e||e===null?e=r:i<e&&(e=i),t.translate(e,0,1,0,1)},addPlotBandOrLine:function(e){var t=(new Pn(this,e)).render();return this.plotLinesAndBands.push(t),t},getOffset:function(){var e=this,t=e.chart,n=t.renderer,r=e.options,i=e.tickPositions,s=e.ticks,o=e.horiz,a=e.side,f,l,c=0,h,p=0,d=r.title,v=r.labels,m=0,g=t.axisOffset,y=[-1,1,1
,-1][a],b;e.hasData=f=e.hasVisibleSeries||Dt(e.min)&&Dt(e.max)&&!!i,e.showAxis=l=f||Bt(r.showEmpty,!0),e.axisGroup||(e.gridGroup=n.g("grid").attr({zIndex:r.gridZIndex||1}).add(),e.axisGroup=n.g("axis").attr({zIndex:r.zIndex||2}).add(),e.labelGroup=n.g("axis-labels").attr({zIndex:v.zIndex||7}).add());if(f||e.isLinked)an(i,function(t){s[t]?s[t].addLabel():s[t]=new Dn(e,t)}),an(i,function(e){if(a===0||a===2||{1:"left",3:"right"}[a]===v.align)m=u(s[e].getLabelSize(),m)}),e.staggerLines&&(m+=(e.staggerLines-1)*16);else for(b in s)s[b].destroy(),delete s[b];d&&d.text&&(e.axisTitle||(e.axisTitle=n.text(d.text,0,0,d.useHTML).attr({zIndex:7,rotation:d.rotation||0,align:d.textAlign||{low:"left",middle:"center",high:"right"}[d.align]}).css(d.style).add(e.axisGroup),e.axisTitle.isNew=!0),l&&(c=e.axisTitle.getBBox()[o?"height":"width"],p=Bt(d.margin,o?5:10),h=d.offset),e.axisTitle[l?"show":"hide"]()),e.offset=y*Bt(r.offset,g[a]),e.axisTitleMargin=Bt(h,m+p+(a!==2&&m&&y*r.labels[o?"y":"x"])),g[a]=u(g[a],e.axisTitleMargin+c+y*e.offset)},getLinePath:function(e){var t=this.chart,n=this.opposite,r=this.offset,i=this.horiz,s=this.left+(n?this.width:0)+r,o=t.chartHeight-this.bottom-(n?this.height:0)+r;return this.lineTop=o,t.renderer.crispLine([X,i?this.left:s,i?o:this.top,V,i?t.chartWidth-this.right:s,i?o:t.chartHeight-this.bottom],e)},getTitlePosition:function(){var e=this.horiz,t=this.left,n=this.top,r=this.len,i=this.options.title,s=e?t:n,o=this.opposite,u=this.offset,a=Nt(i.style.fontSize||12),f={low:s+(e?0:r),middle:s+r/2,high:s+(e?r:0)}[i.align],l=(e?n+this.height:t)+(e?1:-1)*(o?-1:1)*this.axisTitleMargin+(this.side===2?a:0);return{x:e?f:l+(o?this.width:0)+u+(i.x||0),y:e?l-(o?this.height:0)+u:f+(i.y||0)}},render:function(){var t=this,n=t.chart,r=n.renderer,i=t.options,s=t.isLog,o=t.isLinked,u=t.tickPositions,a=t.axisTitle,f=t.stacks,l=t.ticks,c=t.minorTicks,h=t.alternateBands,p=i.stackLabels,d=i.alternateGridColor,v=t.tickmarkOffset,m=i.lineWidth,g,y=n.hasRendered,b=y&&Dt(t.oldMin)&&!isNaN(t.oldMin),w=t.hasData,E=t.showAxis,S,x;if(w||o)t.minorTickInterval&&!t.categories&&an(t.getMinorTickPositions(),function(e){c[e]||(c[e]=new Dn(t,e,"minor")),b&&c[e].isNew&&c[e].render(null,!0),c[e].isActive=!0,c[e].render()}),u.length&&an(u.slice(1).concat([u[0]]),function(e,n){n=n===u.length-1?0:n+1;if(!o||e>=t.min&&e<=t.max)l[e]||(l[e]=new Dn(t,e)),b&&l[e].isNew&&l[e].render(n,!0),l[e].isActive=!0,l[e].render(n)}),d&&an(u,function(n,r){r%2===0&&n<t.max&&(h[n]||(h[n]=new Pn(t)),S=n+v,x=u[r+1]!==e?u[r+1]+v:t.max,h[n].options={from:s?Mt(S):S,to:s?Mt(x):x,color:d},h[n].render(),h[n].isActive=!0)}),t._addedPlotLB||(an((i.plotLines||[]).concat(i.plotBands||[]),function(e){t.addPlotBandOrLine(e)}),t._addedPlotLB=!0);an([l,c,h],function(e){var t;for(t in e)e[t].isActive?e[t].isActive=!1:(e[t].destroy(),delete e[t])}),m&&(g=t.getLinePath(m),t.axisLine?t.axisLine.animate({d:g}):t.axisLine=r.path(g).attr({stroke:i.lineColor,"stroke-width":m,zIndex:7}).add(t.axisGroup),t.axisLine[E?"show":"hide"]()),a&&E&&(a[a.isNew?"attr":"animate"](t.getTitlePosition()),a.isNew=!1);if(p&&p.enabled){var T,N,C,k=t.stackTotalGroup;k||(t.stackTotalGroup=k=r.g("stack-labels").attr({visibility:U,zIndex:6}).add()),k.translate(n.plotLeft,n.plotTop);for(T in f){N=f[T];for(C in N)N[C].render(k)}}t.isDirty=!1},removePlotBandOrLine:function(e){var t=this.plotLinesAndBands,n=t.length;while(n--)t[n].id===e&&t[n].destroy()},setTitle:function(e,t){var n=this.chart,r=this.options,i=this.axisTitle;r.title=hn(r.title,e),this.axisTitle=i&&i.destroy(),this.isDirty=!0,Bt(t,!0)&&n.redraw()},redraw:function(){var e=this,t=e.chart;t.tracker.resetTracker&&t.tracker.resetTracker(!0),e.render(),an(e.plotLinesAndBands,function(e){e.render()}),an(e.series,function(e){e.isDirty=!0})},setCategories:function(e,t){var n=this,r=n.chart;n.categories=n.userOptions.categories=e,an(n.series,function(e){e.translate(),e.setTooltipPoints(!0)}),n.isDirty=!0,Bt(t,!0)&&r.redraw()},destroy:function(){var e=this,t=e.stacks,n;dn(e);for(n in t)Gt(t[n]),t[n]=null;an([e.ticks,e.minorTicks,e.alternateBands,e.plotLinesAndBands],function(e){Gt(e)}),an(["stackTotalGroup","axisLine","axisGroup","gridGroup","labelGroup","axisTitle"],function(t){e[t]&&(e[t]=e[t].destroy())})}},jn.prototype={destroy:function(){an(this.crosshairs,function(e){e&&e.destroy()}),this.label&&(this.label=this.label.destroy())},move:function(e,t,n,r){var i=this,s=i.now,o=i.options.animation!==!1&&!i.isHidden;xt(s,{x:o?(2*s.x+e)/3:e,y:o?(s.y+t)/2:t,anchorX:o?(2*s.anchorX+n)/3:n,anchorY:o?(s.anchorY+r)/2:r}),i.label.attr(s),o&&(f(e-s.x)>1||f(t-s.y)>1)&&(clearTimeout(this.tooltipTimeout),this.tooltipTimeout=setTimeout(function(){i&&i.move(e,t,n,r)},32))},hide:function(){if(!this.isHidden){var e=this.chart.hoverPoints;this.label.hide(),e&&an(e,function(e){e.setState()}),this.chart.hoverPoints=null,this.isHidden=!0}},hideCrosshairs:function(){an(this.crosshairs,function(e){e&&e.hide()})},getAnchor:function(e,t){var n,r=this.chart,s=r.inverted,o=0,u=0,a;return e=Ht(e),n=e[0].tooltipPos,n||(an(e,function(e){a=e.series.yAxis,o+=e.plotX,u+=(e.plotLow?(e.plotLow+e.plotHigh)/2:e.plotY)+(!s&&a?a.top-r.plotTop:0)}),o/=e.length,u/=e.length,n=[s?r.plotWidth-u:o,this.shared&&!s&&e.length>1&&t?t.chartY-r.plotTop:s?r.plotHeight-o:u]),cn(n,i)},getPosition:function(e,t,n){var r=this.chart,i=r.plotLeft,s=r.plotTop,o=r.plotWidth,a=r.plotHeight,f=Bt(this.options.distance,12),l=n.plotX,c=n.plotY,h=l+i+(r.inverted?f:-e-f),p=c-t+s+15,d;return h<7&&(h=i+u(l,0)+f),h+e>i+o&&(h-=h+e-(i+o),p=c-t+s-f,d=!0),p<s+5&&(p=s+5,d&&c>=p&&c<=p+t&&(p=c+s+f)),p+t>s+a&&(p=u(s,s+a-t-f)),{x:h,y:p}},refresh:function(e,t){function u(){var e=this,t=e.points||Ht(e),n=t[0].series,r;return r=[n.tooltipHeaderFormatter(t[0].key)],an(t,function(e){n=e.series,r.push(n.tooltipFormatter&&n.tooltipFormatter(e)||e.point.tooltipFormatter(n.tooltipOptions.pointFormat))}),r.push(o.footerFormat||""),r.join("")}var n=this,r=n.chart,s=n.label,o=n.options,a,f,l,c,h={},p,d=[],v=o.formatter||u,m=r.hoverPoints,g,y,b=o.crosshairs,w=n.shared,E;c=n.getAnchor(e,t),a=c[0],f=c[1],w&&(!e.series||!e.series.noSharedTooltip)?(r.hoverPoints=e,m&&an(m,function(e){e.setState()}),an(e,function(e){e.setState(K),d.push(e.getLabelConfig())}),h={x:e[0].category,y:e[0].y},h.points=d,e=e[0]):h=e.getLabelConfig(),p=v.call(h),E=e.series,l=w||!E.isCartesian||E.tooltipOutsidePlot||r.isInsidePlot(a,f),p===!1||!l?this.hide():(n.isHidden&&s.show(),s.attr({text:p}),y=o.borderColor||e.color||E.color||"#606060",s.attr({stroke:y}),g=(o.positioner||n.getPosition).call(n,s.width,s.height,{plotX:a,plotY:f}),n.move(i(g.x),i(g.y),a+r.plotLeft,f+r.plotTop),n.isHidden=!1);if(b){b=Ht(b);var S,x=b.length,T,N;while(x--)N=e.series[x?"yAxis":"xAxis"],b[x]&&N&&(S=N.getPlotLinePath(x?Bt(e.stackY,e.y):e.x,1),n.crosshairs[x]?n.crosshairs[x].attr({d:S,visibility:U}):(T={"stroke-width":b[x].width||1,stroke:b[x].color||"#C0C0C0",zIndex:b[x].zIndex||2},b[x].dashStyle&&(T.dashstyle=b[x].dashStyle),n.crosshairs[x]=r.renderer.path(S).attr(T).add()))}vn(r,"tooltipRefresh",{text:p,x:a+r.plotLeft,y:f+r.plotTop,borderColor:y})}},Fn.prototype={normalizeMouseEvent:function(t){var r,s,o,u;return t=t||n.event,t.target||(t.target=t.srcElement),t=mn(t),u=t.touches?t.touches.item(0):t,this.chartPosition=r=ln(this.chart.container),u.pageX===e?(s=t.x,o=t.y):(s=u.pageX-r.left,o=u.pageY-r.top),xt(t,{chartX:i(s),chartY:i(o)})},getMouseCoordinates:function(e){var t={xAxis:[],yAxis:[]},n=this.chart;return an(n.axes,function(r){var i=r.isXAxis,s=n.inverted?!i:i;t[i?"xAxis":"yAxis"].push({axis:r,value:r.translate((s?e.chartX-n.plotLeft:r.top+r.len-e.chartY)-r.minPixelPadding,!0)})}),t},getIndex:function(e){var t=this.chart;return t.inverted?t.plotHeight+t.plotTop-e.chartY:e.chartX-t.plotLeft},onmousemove:function(e){var t=this,n=t.chart,r=n.series,i=n.tooltip,s,o,u=n.hoverPoint,l=n.hoverSeries,c,h,p=n.chartWidth,d=t.getIndex(e);if(i&&t.options.tooltip.shared&&(!l||!l.noSharedTooltip)){o=[],c=r.length;for(h=0;h<c;h++)r[h].visible&&r[h].options.enableMouseTracking!==!1&&!r[h].noSharedTooltip&&r[h].tooltipPoints&&r[h].tooltipPoints.length&&(s=r[h].tooltipPoints[d],s._dist=f(d-s[r[h].xAxis.tooltipPosName||"plotX"]),p=a(p,s._dist),o.push(s));c=o.length;while(c--)o[c]._dist>p&&o.splice(c,1);o.length&&o[0].plotX!==t.hoverX&&(i.refresh(o,e),t.hoverX=o[0].plotX)}l&&l.tracker&&(s=l.tooltipPoints[d],s&&s!==u&&s.onMouseOver())},resetTracker:function(t){var n=this,r=n.chart,i=r.hoverSeries,s=r.hoverPoint,o=r.tooltip,u=o&&o.shared?r.hoverPoints:s;t=t&&o&&u,t&&Ht(u)[0].plotX===e&&(t=!1),t?o.refresh(u):(s&&s.onMouseOut(),i&&i.onMouseOut(),o&&(o.hide(),o.hideCrosshairs()),n.hoverX=null)},setDOMEvents:function(){function c(){if(n.selectionMarker){var e={xAxis:[],yAxis:[]},o=n.selectionMarker.getBBox(),f=o.x-r.plotLeft,l=o.y-r.plotTop,h;s&&(an(r.axes,function(t){if(t.options.zoomEnabled!==!1){var n=t.isXAxis,i=r.inverted?!n:n,s=t.translate(i?f:r.plotHeight-l-o.height,!0,0,0,1),c=t.translate((i?f+o.width:r.plotHeight-l)-2*t.minPixelPadding,!0,0,0,1);!isNaN(s)&&!isNaN(c)&&(e[n?"xAxis":"yAxis"].push({axis:t,min:a(s,c),max:u(s,c)}),h=!0)}}),h&&vn(r,"selection",e,function(e){r.zoom(e)})),n.selectionMarker=n.selectionMarker.destroy()}r&&(jt(i,{cursor:"auto"}),r.cancelClick=s,r.mouseIsDown=s=!1),dn(t,"mouseup",c),C&&dn(t,"touchend",c)}var e=!0,n=this,r=n.chart,i=r.container,s,o=n.zoomX&&!r.inverted||n.zoomY&&r.inverted,l=n.zoomY&&!r.inverted||n.zoomX&&r.inverted;n.hideTooltipOnMouseMove=function(e){e=mn(e),n.chartPosition&&r.hoverSeries&&r.hoverSeries.isCartesian&&!r.isInsidePlot(e.pageX-n.chartPosition.left-r.plotLeft,e.pageY-n.chartPosition.top-r.plotTop)&&n.resetTracker()},n.hideTooltipOnMouseLeave=function(){n.resetTracker(),n.chartPosition=null},i.onmousedown=function(e){e=n.normalizeMouseEvent(e),e.type.indexOf("touch")===-1&&e.preventDefault&&e.preventDefault(),r.mouseIsDown=!0,r.cancelClick=!1,r.mouseDownX=n.mouseDownX=e.chartX,n.mouseDownY=e.chartY,pn(t,"mouseup",c),C&&pn(t,"touchend",c)};var h=function(t){if(t&&t.touches&&t.touches.length>1)return;t=n.normalizeMouseEvent(t);var i=t.type,u=t.chartX,a=t.chartY,c=!r.isInsidePlot(u-r.plotLeft,a-r.plotTop);i.indexOf("touch")===-1&&(t.returnValue=!1),i==="touchstart"&&(Pt(t.target,"isTracker")?r.runTrackerClick||t.preventDefault():!r.runChartClick&&!c&&t.preventDefault()),c&&(u<r.plotLeft?u=r.plotLeft:u>r.plotLeft+r.plotWidth&&(u=r.plotLeft+r.plotWidth),a<r.plotTop?a=r.plotTop:a>r.plotTop+r.plotHeight&&(a=r.plotTop+r.plotHeight));if(r.mouseIsDown&&i!=="touchstart"){s=Math.sqrt(Math.pow(n.mouseDownX-u,2)+Math.pow(n.mouseDownY-a,2));if(s>10){var h=r.isInsidePlot(n.mouseDownX-r.plotLeft,n.mouseDownY-r.plotTop);r.hasCartesianSeries&&(n.zoomX||n.zoomY)&&h&&(n.selectionMarker||(n.selectionMarker=r.renderer.rect(r.plotLeft,r.plotTop,o?1:r.plotWidth,l?1:r.plotHeight,0).attr({fill:n.options.chart.selectionMarkerFill||"rgba(69,114,167,0.25)",zIndex:7}).add()));if(n.selectionMarker&&o){var p=u-n.mouseDownX;n.selectionMarker.attr({width:f(p),x:(p>0?0:p)+n.mouseDownX})}if(n.selectionMarker&&l){var d=a-n.mouseDownY;n.selectionMarker.attr({height:f(d),y:(d>0?0:d)+n.mouseDownY})}h&&!n.selectionMarker&&n.options.chart.panning&&r.pan(u)}}return c||n.onmousemove(t),e=c,c||!r.hasCartesianSeries};/Android 4\.0/.test(d)||(i.onmousemove=h),pn(i,"mouseleave",n.hideTooltipOnMouseLeave),C||pn(t,"mousemove",n.hideTooltipOnMouseMove),i.ontouchstart=function(e){(n.zoomX||n.zoomY)&&i.onmousedown(e),h(e)},i.ontouchmove=h,i.ontouchend=function(){s&&n.resetTracker()},i.onclick=function(e){var t=r.hoverPoint,i,s;e=n.normalizeMouseEvent(e),e.cancelBubble=!0,r.cancelClick||(t&&(Pt(e.target,"isTracker")||Pt(e.target.parentNode,"isTracker"))?(i=t.plotX,s=t.plotY,xt(t,{pageX:n.chartPosition.left+r.plotLeft+(r.inverted?r.plotWidth-s:i),pageY:n.chartPosition.top+r.plotTop+(r.inverted?r.plotHeight-i:s)}),vn(t.series,"click",xt(e,{point:t})),t.firePointEvent("click",e)):(xt(e,n.getMouseCoordinates(e)),r.isInsidePlot(e.chartX-r.plotLeft,e.chartY-r.plotTop)&&vn(r,"click",e)))}},destroy:function(){var e=this,n=e.chart,r=n.container;n.trackerGroup&&(n.trackerGroup=n.trackerGroup.destroy()),dn(r,"mouseleave",e.hideTooltipOnMouseLeave),dn(t,"mousemove",e.hideTooltipOnMouseMove),r.onclick=r.onmousedown=r.onmousemove=r.ontouchstart=r.ontouchend=r.ontouchmove=null,clearInterval(this.tooltipTimeout)},init:function(e,t){e.trackerGroup||(e.trackerGroup=e.renderer.g("tracker").attr({zIndex:9}).add()),t.enabled&&(e.tooltip=new jn(e,t)),this.setDOMEvents()}},In.prototype={init:function(e){var t=this,n=t.options=e.options.legend;if(!n.enabled)return;var r=n.itemStyle,i=Bt(n.padding,8),s=n.itemMarginTop||0;t.baseline=Nt(r.fontSize)+3+s,t.itemStyle=r,t.itemHiddenStyle=hn(r,n.itemHiddenStyle),t.itemMarginTop=s,t.padding=i,t.initialItemX=i,t.initialItemY=i-5,t.maxItemWidth=0,t.chart=e,t.itemHeight=0,t.lastLineHeight=0,t.render(),pn(t.chart,"endResize",function(){t.positionCheckboxes()})},colorizeItem:function(t,n){var r=this,i=r.options,s=t.legendItem,o=t.legendLine,u=t.legendSymbol,a=r.itemHiddenStyle.color,f=n?i.itemStyle.color:a,l=n?t.color:a,c=t.options&&t.options.marker,h={stroke:l,fill:l},p,d;s&&s.css({fill:f}),o&&o.attr({stroke:l});if(u){if(c){c=t.convertAttribs(c);for(p in c)d=c[p],d!==e&&(h[p]=d)}u.attr(h)}},positionItem:function(e){var t=this,n=t.options,r=n.symbolPadding,i=!n.rtl,s=e._legendItemPos,o=s[0],u=s[1],a=e.checkbox;e.legendGroup&&e.legendGroup.translate(i?o:t.legendWidth-o-2*r-4,u),a&&(a.x=o,a.y=u)},destroyItem:function(e){var t=e.checkbox;an(["legendItem","legendLine","legendSymbol","legendGroup"],function(t){e[t]&&e[t].destroy()}),t&&Yt(e.checkbox)},destroy:function(){var e=this,t=e.group,n=e.box;n&&(e.box=n.destroy()),t&&(e.group=t.destroy())},positionCheckboxes:function(e){var t=this.group.alignAttr,n,r=this.clipHeight||this.legendHeight;t&&(n=t.translateY,an(this.allItems,function(i){var s=i.checkbox,o;s&&(o=n+s.y+(e||0)+3,jt(s,{left:t.translateX+i.legendItemWidth+s.x-20+z,top:o+z,display:o>n-6&&o<n+r-6?"":W}))}))},renderItem:function(e){var t=this,n=t.chart,r=n.renderer,i=t.options,s=i.layout==="horizontal",o=i.symbolWidth,a=i.symbolPadding,f=t.itemStyle,l=t.itemHiddenStyle,c=t.padding,h=!i.rtl,p,d=i.width,v=i.itemMarginBottom||0,m=t.itemMarginTop,g=t.initialItemX,y,b,w=e.legendItem,E=e.series||e,S=E.options,x=S.showCheckbox,T=i.useHTML;w||(e.legendGroup=r.g("legend-item").attr({zIndex:1}).add(t.scrollGroup),E.drawLegendSymbol(t,e),e.legendItem=w=r.text(i.labelFormatter.call(e),h?o+a:-a,t.baseline,T).css(hn(e.visible?f:l)).attr({align:h?"left":"right",zIndex:2}).add(e.legendGroup),(T?w:e.legendGroup).on("mouseover",function(){e.setState(K),w.css(t.options.itemHoverStyle)}).on("mouseout",function(){w.css(e.visible?f:l),e.setState()}).on("click",function(t){var n="legendItemClick",r=function(){e.setVisible()};t={browserEvent:t},e.firePointEvent?e.firePointEvent(n,t,r):vn(e,n,t,r)}),t.colorizeItem(e,e.visible),S&&x&&(e.checkbox=Ft("input",{type:"checkbox",checked:e.selected,defaultChecked:e.selected},i.itemCheckboxStyle,n.container),pn(e.checkbox,"click",function(t){var n=t.target;vn(e,"checkboxClick",{checked:n.checked},function(){e.select()})}))),y=w.getBBox(),b=e.legendItemWidth=i.itemWidth||o+a+y.width+c+(x?20:0),t.itemHeight=p=y.height,s&&t.itemX-g+b>(d||n.chartWidth-2*c-g)&&(t.itemX=g,t.itemY+=m+t.lastLineHeight+v,t.lastLineHeight=0),t.maxItemWidth=u(t.maxItemWidth,b),t.lastItemY=m+t.itemY+v,t.lastLineHeight=u(p,t.lastLineHeight),e._legendItemPos=[t.itemX,t.itemY],s?t.itemX+=b:(t.itemY+=m+p+v,t.lastLineHeight=p),t.offsetWidth=d||u(s?t.itemX-g:b,t.offsetWidth)},render:function(){var e=this,t=e.chart,n=t.renderer,r=e.group,i,s,o,u,a=e.box,f=e.options,l=e.padding,c=f.borderWidth,h=f.backgroundColor;e.itemX=e.initialItemX,e.itemY=e.initialItemY,e.offsetWidth=0,e.lastItemY=0,r||(e.group=r=n.g("legend").attr({zIndex:7}).add(),e.contentGroup=n.g().attr({zIndex:1}).add(r),e.scrollGroup=n.g().add(e.contentGroup),e.clipRect=n.clipRect(0,0,9999,t.chartHeight),e.contentGroup.clip(e.clipRect)),i=[],an(t.series,function(e){var t=e.options;if(!t.showInLegend)return;i=i.concat(e.legendItems||(t.legendType==="point"?e.data:e))}),Jt(i,function(e,t){return(e.options&&e.options.legendIndex||0)-(t.options&&t.options.legendIndex||0)}),f.reversed&&i.reverse(),e.allItems=i,e.display=s=!!i.length,an(i,function(t){e.renderItem(t)}),o=f.width||e.offsetWidth,u=e.lastItemY+e.lastLineHeight,u=e.handleOverflow(u);if(c||h)o+=l,u+=l,a?o>0&&u>0&&(a[a.isNew?"attr":"animate"](a.crisp(null,null,null,o,u)),a.isNew=!1):(e.box=a=n.rect(0,0,o,u,f.borderRadius,c||0).attr({stroke:f.borderColor,"stroke-width":c||0,fill:h||W}).add(r).shadow(f.shadow),a.isNew=!0),a[s?"show":"hide"]();e.legendWidth=o,e.legendHeight=u,an(i,function(t){e.positionItem(t)}),s&&r.align(xt({width:o,height:u},f),!0,t.spacingBox),t.isResizing||this.positionCheckboxes()},handleOverflow:function(e){var t=this,n=this.chart,r=n.renderer,i,s=this.options,u=s.y,f=s.verticalAlign==="top",l=n.spacingBox.height+(f?-u:u)-this.padding,c=s.maxHeight,h,p=this.clipRect,d=s.navigation,v=Bt(d.animation,!0),m=d.arrowSize||12,g=this.nav;return s.layout==="horizontal"&&(l/=2),c&&(l=a(l,c)),e>l?(this.clipHeight=h=l-20,this.pageCount=i=o(e/h),this.currentPage=Bt(this.currentPage,1),this.fullHeight=e,p.attr({height:h}),g||(this.nav=g=r.g().attr({zIndex:1}).add(this.group),this.up=r.symbol("triangle",0,0,m,m).on("click",function(){t.scroll(-1,v)}).add(g),this.pager=r.text("",15,10).css(d.style).add(g),this.down=r.symbol("triangle-down",0,0,m,m).on("click",function(){t.scroll(1,v)}).add(g)),t.scroll(0),e=l):g&&(p.attr({height:n.chartHeight}),g.hide(),this.scrollGroup.attr({translateY:1}),this.clipHeight=0),e},scroll:function(t,n){var r=this.pageCount,i=this.currentPage+t,s=this.clipHeight,o=this.options.navigation,u=o.activeColor,f=o.inactiveColor,l=this.pager,c=this.padding,h;i>r&&(i=r),i>0&&(n!==e&&tn(n,this.chart),this.nav.attr({translateX:c,translateY:s+7,visibility:U}),this.up.attr({fill:i===1?f:u}).css({cursor:i===1?"default":"pointer"}),l.attr({text:i+"/"+this.pageCount}),this.down.attr({x:18+this.pager.getBBox().width,fill:i===r?f:u}).css({cursor:i===r?"default":"pointer"}),h=-a(s*(i-1),this.fullHeight-s+c)+1,this.scrollGroup.animate({translateY:h}),l.attr({text:i+"/"+r}),this.currentPage=i,this.positionCheckboxes(h))}},qn.prototype={init:function(e,t){var n,r=e.series;e.series=null,n=hn(O,e),n.series=e.series=r;var i=n.chart,s=i.margin,o=kt(s)?s:[s,s,s,s];this.optionsMarginTop=Bt(i.marginTop,o[0]),this.optionsMarginRight=Bt(i.marginRight,o[1]),this.optionsMarginBottom=Bt(i.marginBottom,o[2]),this.optionsMarginLeft=Bt(i.marginLeft,o[3]);var u=i.events;this.runChartClick=u&&!!u.click,this.callback=t,this.isResizing=0,this.options=n,this.axes=[],this.series=[],this.hasCartesianSeries=i.showAxes;var a=this,f;a.index=B.length,B.push(a),i.reflow!==!1&&pn(a,"load",a.initReflow);if(u)for(f in u)pn(a,f,u[f]);a.xAxis=[],a.yAxis=[],a.animation=T?!1:Bt(i.animation,!0),a.pointCount=0,a.counters=new $t,a.firstRender()},initSeries:function(e){var t=this,n=t.options.chart,r=e.type||n.type||n.defaultSeriesType,i=new St[r];return i.init(this,e),i},addSeries:function(e,t,n){var r,i=this;return e&&(tn(n,i),t=Bt(t,!0),vn(i,"addSeries",{options:e},function(){r=i.initSeries(e),i.isDirtyLegend=!0,t&&i.redraw()})),r},isInsidePlot:function(e,t,n){var r=n?t:e,i=n?e:t;return r>=0&&r<=this.plotWidth&&i>=0&&i<=this.plotHeight},adjustTickAmounts:function(){this.options.chart.alignTicks!==!1&&an(this.axes,function(e){e.adjustTickAmount()}),this.maxTicks=null},redraw:function(e){var t=this,n=t.axes,r=t.series,i=t.tracker,s=t.legend,o=t.isDirtyLegend,u,a=t.isDirtyBox,f=r.length,l=f,c,h=t.renderer,p=h.isHidden(),d=[];tn(e,t),p&&t.cloneRenderTo();while(l--){c=r[l];if(c.isDirty&&c.options.stacking){u=!0;break}}if(u){l=f;while(l--)c=r[l],c.options.stacking&&(c.isDirty=!0)}an(r,function(e){e.isDirty&&e.options.legendType==="point"&&(o=!0)}),o&&s.options.enabled&&(s.render(),t.isDirtyLegend=!1),t.hasCartesianSeries&&(t.isResizing||(t.maxTicks=null,an(n,function(e){e.setScale()})),t.adjustTickAmounts(),t.getMargins(),an(n,function(e){e.isDirtyExtremes&&(e.isDirtyExtremes=!1,d.push(function(){vn(e,"afterSetExtremes",e.getExtremes())}));if(e.isDirty||a||u)e.redraw(),a=!0})),a&&t.drawChartBox(),an(r,function(e){e.isDirty&&e.visible&&(!e.isCartesian||e.xAxis)&&e.redraw()}),i&&i.resetTracker&&i.resetTracker(!0),h.draw(),vn(t,"redraw"),p&&t.cloneRenderTo(!0),an(d,function(e){e.call()})},showLoading:function(e){var t=this,n=t.options,r=t.loadingDiv,i=n.loading;r||(t.loadingDiv=r=Ft(j,{className:R+"loading"},xt(i.style,{left:t.plotLeft+z,top:t.plotTop+z,width:t.plotWidth+z,height:t.plotHeight+z,zIndex:10,display:W}),t.container),t.loadingSpan=Ft("span",null,i.labelStyle,r)),t.loadingSpan.innerHTML=e||n.lang.loading,t.loadingShown||(jt(r,{opacity:0,display:""}),gn(r,{opacity:i.style.opacity},{duration:i.showDuration||0}),t.loadingShown=!0)},hideLoading:function(){var e=this.options,t=this.loadingDiv;t&&gn(t,{opacity:0},{duration:e.loading.hideDuration||100,complete:function(){jt(t,{display:W})}}),this.loadingShown=!1},get:function(e){var t=this,n=t.axes,r=t.series,i,s,o;for(i=0;i<n.length;i++)if(n[i].options.id===e)return n[i];for(i=0;i<r.length;i++)if(r[i].options.id===e)return r[i];for(i=0;i<r.length;i++){o=r[i].points||[];for(s=0;s<o.length;s++)if(o[s].id===e)return o[s]}return null},getAxes:function(){var e=this,t=this.options,n=t.xAxis||{},r=t.yAxis||{},i,s;n=Ht(n),an(n,function(e,t){e.index=t,e.isX=!0}),r=Ht(r),an(r,function(e,t){e.index=t}),i=n.concat(r),an(i,function(t){s=new Bn(e,t)}),e.adjustTickAmounts()},getSelectedPoints:function(){var e=[];return an(this.series,function(t){e=e.concat(fn(t.points,function(e){return e.selected}))}),e},getSelectedSeries:function(){return fn(this.series,function(e){return e.selected})},showResetZoom:function(){var e=this,t=O.lang,n=e.options.chart.resetZoomButton,r=n.theme,i=r.states,s=n.relativeTo==="chart"?null:"plotBox";this.resetZoomButton=e.renderer.button(t.resetZoom,null,null,function(){e.zoomOut()},r,i&&i.hover).attr({align:n.position.align,title:t.resetZoomTitle}).add().align(n.position,!1,e[s]),this.resetZoomButton.alignTo=s},zoomOut:function(){var e=this,t=e.resetZoomButton;vn(e,"selection",{resetSelection:!0},function(){e.zoom()}),t&&(e.resetZoomButton=t.destroy())},zoom:function(e){var t=this,n;!e||e.resetSelection?an(t.axes,function(e){n=e.zoom()}):an(e.xAxis.concat(e.yAxis),function(e){var r=e.axis;t.tracker[r.isXAxis?"zoomX":"zoomY"]&&(n=r.zoom(e.min,e.max))}),t.resetZoomButton||t.showResetZoom(),n&&t.redraw(Bt(t.options.chart.animation,t.pointCount<100))},pan:function(e){var t=this,n=t.xAxis[0],r=t.mouseDownX,i=n.pointRange/2,s=n.getExtremes(),o=n.translate(r-e,!0)+i,f=n.translate(r+t.plotWidth-e,!0)-i,l=t.hoverPoints;l&&an(l,function(e){e.setState()}),n.series.length&&o>a(s.dataMin,s.min)&&f<u(s.dataMax,s.max)&&n.setExtremes(o,f,!0,!1,{trigger:"pan"}),t.mouseDownX=e,jt(t.container,{cursor:"move"})},setTitle:function(e,t){var n=this,r=n.options,i,s;n.chartTitleOptions=i=hn(r.title,e),n.chartSubtitleOptions=s=hn(r.subtitle,t),an([["title",e,i],["subtitle",t,s]],function(e){var t=e[0],r=n[t],i=e[1],s=e[2];r&&i&&(n[t]=r=r.destroy()),s&&s.text&&!r&&(n[t]=n.renderer.text(s.text,0,0,s.useHTML).attr({align:s.align,"class":R+t,zIndex:s.zIndex||4}).css(s.style).add().align(s,!1,n.spacingBox))})},getChartSize:function(){var e=this,t=e.options.chart,n=e.renderToClone||e.renderTo;e.containerWidth=sn(n,"width"),e.containerHeight=sn(n,"height"),e.chartWidth=u(0,Bt(t.width,e.containerWidth,600)),e.chartHeight=u(0,Bt(t.height,e.containerHeight>19?e.containerHeight:400))},cloneRenderTo:function(e){var n=this.renderToClone,r=this.container;e?n&&(this.renderTo.appendChild(r),Yt(n),delete this.renderToClone):(r&&this.renderTo.removeChild(r),this.renderToClone=n=this.renderTo.cloneNode(0),jt(n,{position:F,top:"-9999px",display:"block"}),t.body.appendChild(n),r&&n.appendChild(r))},getContainer:function(){var e=this,n,r=e.options.chart,i,s,o,u="data-highcharts-chart",a,f;e.renderTo=o=r.renderTo,f=R+L++,Ct(o)&&(e.renderTo=o=t.getElementById(o)),o||Zt(13,!0),a=Nt(Pt(o,u)),!isNaN(a)&&B[a]&&B[a].destroy(),Pt(o,u,e.index),o.innerHTML="",o.offsetWidth||e.cloneRenderTo(),e.getChartSize(),i=e.chartWidth,s=e.chartHeight,e.container=n=Ft(j,{className:R+"container"+(r.className?" "+r.className:""),id:f},xt({position:I,overflow:q,width:i+z,height:s+z,textAlign:"left",lineHeight:"normal",zIndex:0},r.style),e.renderToClone||o),e.renderer=r.forExport?new kn(n,i,s,!0):new N(n,i,s),T&&e.renderer.create(e,n,i,s)},getMargins:function(){var e=this,t=e.options.chart,n=t.spacingTop,r=t.spacingRight,i=t.spacingBottom,s=t.spacingLeft,o,a=e.legend,f=e.optionsMarginTop,l=e.optionsMarginLeft,c=e.optionsMarginRight,h=e.optionsMarginBottom,p=e.chartTitleOptions,d=e.chartSubtitleOptions,v=e.options.legend,m=Bt(v.margin,10),g=v.x,y=v.y,b=v.align,w=v.verticalAlign,E;e.resetMargins(),o=e.axisOffset,(e.title||e.subtitle)&&!Dt(e.optionsMarginTop)&&(E=u(e.title&&!p.floating&&!p.verticalAlign&&p.y||0,e.subtitle&&!d.floating&&!d.verticalAlign&&d.y||0),E&&(e.plotTop=u(e.plotTop,E+Bt(p.margin,15)+n))),a.display&&!v.floating&&(b==="right"?Dt(c)||(e.marginRight=u(e.marginRight,a.legendWidth-g+m+r)):b==="left"?Dt(l)||(e.plotLeft=u(e.plotLeft,a.legendWidth+g+m+s)):w==="top"?Dt(f)||(e.plotTop=u(e.plotTop,a.legendHeight+y+m+n)):w==="bottom"&&(Dt(h)||(e.marginBottom=u(e.marginBottom,a.legendHeight-y+m+i)))),e.extraBottomMargin&&(e.marginBottom+=e.extraBottomMargin),e.extraTopMargin&&(e.plotTop+=e.extraTopMargin),e.hasCartesianSeries&&an(e.axes,function(e){e.getOffset()}),Dt(l)||(e.plotLeft+=o[3]),Dt(f)||(e.plotTop+=o[0]),Dt(h)||(e.marginBottom+=o[2]),Dt(c)||(e.marginRight+=o[1]),e.setChartSize()},initReflow:function(){function o(o){var u=r.width||sn(i,"width"),a=r.height||sn(i,"height"),f=o?o.target:n;if(!e.hasUserSize&&u&&a&&(f===n||f===t)){if(u!==e.containerWidth||a!==e.containerHeight)clearTimeout(s),e.reflowTimeout=s=setTimeout(function(){e.container&&(e.setSize(u,a,!1),e.hasUserSize=null)},100);e.containerWidth=u,e.containerHeight=a}}var e=this,r=e.options.chart,i=e.renderTo,s;pn(n,"resize",o),pn(e,"destroy",function(){dn(n,"resize",o)})},setSize:function(e,t,n){var r=this,s,o,a,f=r.resetZoomButton,l=r.title,c=r.subtitle,h;r.isResizing+=1,h=function(){r&&vn(r,"endResize",null,function(){r.isResizing-=1})},tn(n,r),r.oldChartHeight=r.chartHeight,r.oldChartWidth=r.chartWidth,Dt(e)&&(r.chartWidth=s=u(0,i(e)),r.hasUserSize=!!s),Dt(t)&&(r.chartHeight=o=u(0,i(t))),jt(r.container,{width:s+z,height:o+z}),r.renderer.setSize(s,o,n),r.plotWidth=s-r.plotLeft-r.marginRight,r.plotHeight=o-r.plotTop-r.marginBottom,r.maxTicks=null,an(r.axes,function(e){e.isDirty=!0,e.setScale()}),an(r.series,function(e){e.isDirty=!0}),r.isDirtyLegend=!0,r.isDirtyBox=!0,r.getMargins(),a=r.spacingBox,l&&l.align(null,null,a),c&&c.align(null,null,a),f&&f.align&&f.align(null,null,r[f.alignTo]),r.redraw(n),r.oldChartHeight=null,vn(r,"resize"),_===!1?h():setTimeout(h,_&&_.duration||500)},setChartSize:function(){var e=this,t=e.inverted,n=e.chartWidth,r=e.chartHeight,s=e.options.chart,o=s.spacingTop,a=s.spacingRight,f=s.spacingBottom,l=s.spacingLeft,c,h,p,d,v;e.plotLeft=c=i(e.plotLeft),e.plotTop=h=i(e.plotTop),e.plotWidth=p=u(0,i(n-c-e.marginRight)),e.plotHeight=d=u(0,i(r-h-e.marginBottom)),e.plotSizeX=t?d:p,e.plotSizeY=t?p:d,e.plotBorderWidth=v=s.plotBorderWidth||0,e.spacingBox={x:l,y:o,width:n-l-a,height:r-o-f},e.plotBox={x:c,y:h,width:p,height:d},e.clipBox={x:v/2,y:v/2,width:e.plotSizeX-v,height:e.plotSizeY-v},an(e.axes,function(e){e.setAxisSize(),e.setAxisTranslation()})},resetMargins:function(){var e=this,t=e.options.chart,n=t.spacingTop,r=t.spacingRight,i=t.spacingBottom,s=t.spacingLeft;e.plotTop=Bt(e.optionsMarginTop,n),e.marginRight=Bt(e.optionsMarginRight,r),e.marginBottom=Bt(e.optionsMarginBottom,i),e.plotLeft=Bt(e.optionsMarginLeft,s),e.axisOffset=[0,0,0,0]},drawChartBox:function(){var e=this,t=e.options.chart,n=e.renderer,r=e.chartWidth,i=e.chartHeight,s=e.chartBackground,o=e.plotBackground,u=e.plotBorder,a=e.plotBGImage,f=t.borderWidth||0,l=t.backgroundColor,c=t.plotBackgroundColor,h=t.plotBackgroundImage,p=t.plotBorderWidth||0,d,v,m=e.plotLeft,g=e.plotTop,y=e.plotWidth,b=e.plotHeight,w=e.plotBox,E=e.clipRect,S=e.clipBox;d=f+(t.shadow?8:0);if(f||l)s?s.animate(s.crisp(null,null,null,r-d,i-d)):(v={fill:l||W},f&&(v.stroke=t.borderColor,v["stroke-width"]=f),e.chartBackground=n.rect(d/2,d/2,r-d,i-d,t.borderRadius,f).attr(v).add().shadow(t.shadow));c&&(o?o.animate(w):e.plotBackground=n.rect(m,g,y,b,0).attr({fill:c}).add().shadow(t.plotShadow)),h&&(a?a.animate(w):e.plotBGImage=n.image(h,m,g,y,b).add()),E?E.animate({width:S.width,height:S.height}):e.clipRect=n.clipRect(S),p&&(u?u.animate(u.crisp(null,m,g,y,b)):e.plotBorder=n.rect(m,g,y,b,0,p).attr({stroke:t.plotBorderColor,"stroke-width":p,zIndex:1}).add()),e.isDirtyBox=!1},propFromSeries:function(){var e=this,t=e.options.chart,n,r=e.options.series,i,s;an(["inverted","angular","polar"],function(o){n=St[t.type||t.defaultSeriesType],s=e[o]||t[o]||n&&n.prototype[o],i=r&&r.length;while(!s&&i--)n=St[r[i].type],n&&n.prototype[o]&&(s=!0);e[o]=s})},render:function(){var e=this,t=e.axes,n=e.renderer,r=e.options,i=r.labels,s=r.credits,o;e.setTitle(),e.legend=new In(e),an(t,function(e){e.setScale()}),e.getMargins(),e.maxTicks=null,an(t,function(e){e.setTickPositions(!0),e.setMaxTicks()}),e.adjustTickAmounts(),e.getMargins(),e.drawChartBox(),e.hasCartesianSeries&&an(t,function(e){e.render()}),e.seriesGroup||(e.seriesGroup=n.g("series-group").attr({zIndex:3}).add()),an(e.series,function(e){e.translate(),e.setTooltipPoints(),e.render()}),i.items&&an(i.items,function(t){var r=xt(i.style,t.style),s=Nt(r.left)+e.plotLeft,o=Nt(r.top)+e.plotTop+12;delete r.left,delete r.top,n.text(t.html,s,o).attr({zIndex:2}).css(r).add()}),s.enabled&&!e.credits&&(o=s.href,e.credits=n.text(s.text,0,0).on("click",function(){o&&(location.href=o)}).attr({align:s.position.align,zIndex:8}).css(s.style).add().align(s.position)),e.hasRendered=!0},destroy:function(){var t=this,n=t.axes,r=t.series,i=t.container,s,o=i&&i.parentNode;vn(t,"destroy"),B[t.index]=e,t.renderTo.removeAttribute("data-highcharts-chart"),dn(t),s=n.length;while(s--)n[s]=n[s].destroy();s=r.length;while(s--)r[s]=r[s].destroy();an(["title","subtitle","chartBackground","plotBackground","plotBGImage","plotBorder","seriesGroup","clipRect","credits","tracker","scroller","rangeSelector","legend","resetZoomButton","tooltip","renderer"],function(e){var n=t[e];n&&n.destroy&&(t[e]=n.destroy())}),i&&(i.innerHTML="",dn(i),o&&Yt(i));for(s in t)delete t[s]},isReadyToRender:function(){var e=this;return!S&&n==n.top&&t.readyState!=="complete"||T&&!n.canvg?(T?_n.push(function(){e.firstRender()},e.options.global.canvasToolsURL):t.attachEvent("onreadystatechange",function(){t.detachEvent("onreadystatechange",e.firstRender),t.readyState==="complete"&&e.firstRender()}),!1):!0},firstRender:function(){var e=this,t=e.options,n=e.callback;if(!e.isReadyToRender())return;e.getContainer(),vn(e,"init"),Highcharts.RangeSelector&&t.rangeSelector.enabled&&(e.rangeSelector=new Highcharts.RangeSelector(e)),e.resetMargins(),e.setChartSize(),e.propFromSeries(),e.getAxes(),an(t.series||[],function(t){e.initSeries(t)}),Highcharts.Scroller&&(t.navigator.enabled||t.scrollbar.enabled)&&(e.scroller=new Highcharts.Scroller(e)),e.tracker=new Fn(e,t),e.render(),e.renderer.draw(),n&&n.apply(e,[e]),an(e.callbacks,function(t){t.apply(e,[e])}),e.cloneRenderTo(!0),vn(e,"load")}},qn.prototype.callbacks=[];var Rn=function(){};Rn.prototype={init:function(e,t,n){var r=this,i=e.chart.counters,s;return r.series=e,r.applyOptions(t,n),r.pointAttr={},e.options.colorByPoint&&(s=e.chart.options.colors,r.color=r.color||s[i.color++],i.wrapColor(s.length)),e.chart.pointCount++,r},applyOptions:function(t,n){var r=this,i=r.series,s=typeof t;r.config=t,s==="number"||t===null?r.y=t:typeof t[0]=="number"?(r.x=t[0],r.y=t[1]):s==="object"&&typeof t.length!="number"?(xt(r,t),r.options=t,t.dataLabels&&(i._hasPointLabels=!0),t.marker&&(i._hasPointMarkers=!0)):typeof t[0]=="string"&&(r.name=t[0],r.y=t[1]),r.x===e&&(r.x=n===e?i.autoIncrement():n)},destroy:function(){var e=this,t=e.series,n=t.chart,r=n.hoverPoints,i;n.pointCount--,r&&(e.setState(),_t(r,e),r.length||(n.hoverPoints=null)),e===n.hoverPoint&&e.onMouseOut();if(e.graphic||e.dataLabel)dn(e),e.destroyElements();e.legendItem&&n.legend.destroyItem(e);for(i in e)e[i]=null},destroyElements:function(){var e=this,t=["graphic","tracker","dataLabel","dataLabelUpper","group","connector","shadowGroup"],n,r=6;while(r--)n=t[r],e[n]&&(e[n]=e[n].destroy())},getLabelConfig:function(){var e=this;return{x:e.category,y:e.y,key:e.name||e.category,series
:e.series,point:e,percentage:e.percentage,total:e.total||e.stackTotal}},select:function(e,t){var n=this,r=n.series,i=r.chart;e=Bt(e,!n.selected),n.firePointEvent(e?"select":"unselect",{accumulate:t},function(){n.selected=e,n.setState(e&&Q),t||an(i.getSelectedPoints(),function(e){e.selected&&e!==n&&(e.selected=!1,e.setState(J),e.firePointEvent("unselect"))})})},onMouseOver:function(){var e=this,t=e.series,n=t.chart,r=n.tooltip,i=n.hoverPoint;i&&i!==e&&i.onMouseOut(),e.firePointEvent("mouseOver"),r&&(!r.shared||t.noSharedTooltip)&&r.refresh(e),e.setState(K),n.hoverPoint=e},onMouseOut:function(){var e=this.series.chart,t=e.hoverPoints;if(!t||un(this,t)===-1)this.firePointEvent("mouseOut"),this.setState(),e.hoverPoint=null},tooltipFormatter:function(e){var t=this,n=t.series,r=n.tooltipOptions,i=e.match(/\{(series|point)\.[a-zA-Z]+\}/g),s=/[{\.}]/,o,u,a,f,l,c,h,p={y:0,open:0,high:0,low:0,close:0,percentage:1,total:1};r.valuePrefix=r.valuePrefix||r.yPrefix,r.valueDecimals=Bt(r.valueDecimals,r.yDecimals),r.valueSuffix=r.valueSuffix||r.ySuffix;for(h in i)u=i[h],Ct(u)&&u!==e&&(l=(" "+u).split(s),o={point:t,series:n}[l[1]],c=l[2],o===t&&p.hasOwnProperty(c)?(f=p[c]?c:"value",a=(r[f+"Prefix"]||"")+Rt(t[c],Bt(r[f+"Decimals"],-1))+(r[f+"Suffix"]||"")):a=o[c],e=e.replace(u,a));return e},update:function(e,t,n){var r=this,i=r.series,s=r.graphic,o,u=i.data,a=u.length,f=i.chart;t=Bt(t,!0),r.firePointEvent("update",{options:e},function(){r.applyOptions(e),kt(e)&&(i.getAttribs(),s&&s.attr(r.pointAttr[i.state]));for(o=0;o<a;o++)if(u[o]===r){i.xData[o]=r.x,i.yData[o]=r.toYData?r.toYData():r.y,i.options.data[o]=e;break}i.isDirty=!0,i.isDirtyData=!0,t&&f.redraw(n)})},remove:function(e,t){var n=this,r=n.series,i=r.chart,s,o=r.data,u=o.length;tn(t,i),e=Bt(e,!0),n.firePointEvent("remove",null,function(){for(s=0;s<u;s++)if(o[s]===n){o.splice(s,1),r.options.data.splice(s,1),r.xData.splice(s,1),r.yData.splice(s,1);break}n.destroy(),r.isDirty=!0,r.isDirtyData=!0,e&&i.redraw()})},firePointEvent:function(e,t,n){var r=this,i=this.series,s=i.options;(s.point.events[e]||r.options&&r.options.events&&r.options.events[e])&&this.importEvents(),e==="click"&&s.allowPointSelect&&(n=function(e){r.select(null,e.ctrlKey||e.metaKey||e.shiftKey)}),vn(this,e,t,n)},importEvents:function(){if(!this.hasImportedEvents){var e=this,t=hn(e.series.options.point,e.options),n=t.events,r;e.events=n;for(r in n)pn(e,r,n[r]);this.hasImportedEvents=!0}},setState:function(e){var t=this,n=t.plotX,r=t.plotY,i=t.series,s=i.options.states,o=wn[i.type].marker&&i.options.marker,u=o&&!o.enabled,a=o&&o.states[e],f=a&&a.enabled===!1,l=i.stateMarkerGraphic,c=i.chart,h,p=t.pointAttr;e=e||J;if(e===t.state||t.selected&&e!==Q||s[e]&&s[e].enabled===!1||e&&(f||u&&!a.enabled))return;t.graphic?(h=o&&t.graphic.symbolName&&p[e].r,t.graphic.attr(hn(p[e],h?{x:n-h,y:r-h,width:2*h,height:2*h}:{}))):(e&&a&&(h=a.radius,l?l.attr({x:n-h,y:r-h}):i.stateMarkerGraphic=l=c.renderer.symbol(i.symbol,n-h,r-h,2*h,2*h).attr(p[e]).add(i.markerGroup)),l&&l[e&&c.isInsidePlot(n,r)?"show":"hide"]()),t.state=e}};var Un=function(){};Un.prototype={isCartesian:!0,type:"line",pointClass:Rn,sorted:!0,requireSorting:!0,pointAttrToOptions:{stroke:"lineColor","stroke-width":"lineWidth",fill:"fillColor",r:"radius"},init:function(e,t){var n=this,r,i;n.chart=e,n.options=t=n.setOptions(t),n.bindAxes(),xt(n,{name:t.name,state:J,pointAttr:{},visible:t.visible!==!1,selected:t.selected===!0}),T&&(t.animation=!1),i=t.events;for(r in i)pn(n,r,i[r]);if(i&&i.click||t.point&&t.point.events&&t.point.events.click||t.allowPointSelect)e.runTrackerClick=!0;n.getColor(),n.getSymbol(),n.setData(t.data,!1),n.isCartesian&&(e.hasCartesianSeries=!0),e.series.push(n),Jt(e.series,function(e,t){return(e.options.index||0)-(t.options.index||0)}),an(e.series,function(e,t){e.index=t,e.name=e.name||"Series "+(t+1)})},bindAxes:function(){var t=this,n=t.options,r=t.chart,i;t.isCartesian&&an(["xAxis","yAxis"],function(s){an(r[s],function(r){i=r.options;if(n[s]===i.index||n[s]===e&&i.index===0)r.series.push(t),t[s]=r,r.isDirty=!0})})},autoIncrement:function(){var e=this,t=e.options,n=e.xIncrement;return n=Bt(n,t.pointStart,0),e.pointInterval=Bt(e.pointInterval,t.pointInterval,1),e.xIncrement=n+e.pointInterval,n},getSegments:function(){var e=this,t=-1,n=[],r,i=e.points,s=i.length;if(s)if(e.options.connectNulls){r=s;while(r--)i[r].y===null&&i.splice(r,1);i.length&&(n=[i])}else an(i,function(e,r){e.y===null?(r>t+1&&n.push(i.slice(t+1,r)),t=r):r===s-1&&n.push(i.slice(t+1,r+1))});e.segments=n},setOptions:function(e){var t=this.chart,n=t.options,r=n.plotOptions,i=r[this.type],s=e.data,o;return e.data=null,o=hn(i,r.series,e),o.data=e.data=s,this.tooltipOptions=hn(n.tooltip,o.tooltip),i.marker===null&&delete o.marker,o},getColor:function(){var e=this.options,t=this.chart.options.colors,n=this.chart.counters;this.color=e.color||!e.colorByPoint&&t[n.color++]||"gray",n.wrapColor(t.length)},getSymbol:function(){var e=this,t=e.options.marker,n=e.chart,r=n.options.symbols,i=n.counters;e.symbol=t.symbol||r[i.symbol++],/^url/.test(e.symbol)&&(t.radius=0),i.wrapSymbol(r.length)},drawLegendSymbol:function(e){var t=this.options,n=t.marker,r,i=e.options,s,o=i.symbolWidth,u=this.chart.renderer,a=this.legendGroup,f=e.baseline,l;t.lineWidth&&(l={"stroke-width":t.lineWidth},t.dashStyle&&(l.dashstyle=t.dashStyle),this.legendLine=u.path([X,0,f-4,V,o,f-4]).attr(l).add(a)),n&&n.enabled&&(r=n.radius,this.legendSymbol=s=u.symbol(this.symbol,o/2-r,f-4-r,2*r,2*r).add(a))},addPoint:function(e,t,n,r){var i=this,s=i.options,o=i.data,u=i.graph,a=i.area,f=i.chart,l=i.xData,c=i.yData,h=u&&u.shift||0,p=s.data,d,v=i.pointClass.prototype;tn(r,f),u&&n&&(u.shift=h+1),a&&(n&&(a.shift=h+1),a.isArea=!0),t=Bt(t,!0),d={series:i},v.applyOptions.apply(d,[e]),l.push(d.x),c.push(v.toYData?v.toYData.call(d):d.y),p.push(e),s.legendType==="point"&&i.generatePoints(),n&&(o[0]&&o[0].remove?o[0].remove(!1):(o.shift(),l.shift(),c.shift(),p.shift())),i.getAttribs(),i.isDirty=!0,i.isDirtyData=!0,t&&f.redraw()},setData:function(e,t){var n=this,r=n.points,i=n.options,s=n.initialColor,o=n.chart,u=null,a=n.xAxis,f,l=n.pointClass.prototype;n.xIncrement=null,n.pointRange=a&&a.categories?1:i.pointRange,Dt(s)&&(o.counters.color=s);var c=[],h=[],p=e?e.length:[],d=i.turboThreshold||1e3,v,m=n.pointArrayMap,g=m&&m.length;if(p>d){f=0;while(u===null&&f<p)u=e[f],f++;if(At(u)){var y=Bt(i.pointStart,0),b=Bt(i.pointInterval,1);for(f=0;f<p;f++)c[f]=y,h[f]=e[f],y+=b;n.xIncrement=y}else if(Lt(u))if(g)for(f=0;f<p;f++)v=e[f],c[f]=v[0],h[f]=v.slice(1,g+1);else for(f=0;f<p;f++)v=e[f],c[f]=v[0],h[f]=v[1]}else for(f=0;f<p;f++)v={series:n},l.applyOptions.apply(v,[e[f]]),c[f]=v.x,h[f]=l.toYData?l.toYData.call(v):v.y;n.requireSorting&&c.length>1&&c[1]<c[0]&&Zt(15),Ct(h[0])&&Zt(14,!0),n.data=[],n.options.data=e,n.xData=c,n.yData=h,f=r&&r.length||0;while(f--)r[f]&&r[f].destroy&&r[f].destroy();a&&(a.minRange=a.userMinRange),n.isDirty=n.isDirtyData=o.isDirtyBox=!0,Bt(t,!0)&&o.redraw(!1)},remove:function(e,t){var n=this,r=n.chart;e=Bt(e,!0),n.isRemoving||(n.isRemoving=!0,vn(n,"remove",null,function(){n.destroy(),r.isDirtyLegend=r.isDirtyBox=!0,e&&r.redraw(t)})),n.isRemoving=!1},processData:function(t){var n=this,r=n.xData,i=n.yData,s=r.length,o=0,a=s,f,l,c,h=n.xAxis,p,d=n.options,v=d.cropThreshold,m=n.isCartesian;if(m&&!n.isDirty&&!h.isDirty&&!n.yAxis.isDirty&&!t)return!1;if(m&&n.sorted&&(!v||s>v||n.forceCrop)){var g=h.getExtremes(),y=g.min,b=g.max;if(r[s-1]<y||r[0]>b)r=[],i=[];else if(r[0]<y||r[s-1]>b){for(p=0;p<s;p++)if(r[p]>=y){o=u(0,p-1);break}for(;p<s;p++)if(r[p]>b){a=p+1;break}r=r.slice(o,a),i=i.slice(o,a),f=!0}}for(p=r.length-1;p>0;p--)l=r[p]-r[p-1],l>0&&(c===e||l<c)&&(c=l);n.cropped=f,n.cropStart=o,n.processedXData=r,n.processedYData=i,d.pointRange===null&&(n.pointRange=c||1),n.closestPointRange=c},generatePoints:function(){var t=this,n=t.options,r=n.data,i=t.data,s,o=t.processedXData,u=t.processedYData,a=t.pointClass,f=o.length,l=t.cropStart||0,c,h=t.hasGroupedData,p,d=[],v;if(!i&&!h){var m=[];m.length=r.length,i=t.data=m}for(v=0;v<f;v++)c=l+v,h?d[v]=(new a).init(t,[o[v]].concat(Ht(u[v]))):(i[c]?p=i[c]:r[c]!==e&&(i[c]=p=(new a).init(t,r[c],o[v])),d[v]=p);if(i&&(f!==(s=i.length)||h))for(v=0;v<s;v++)v===l&&!h&&(v+=f),i[v]&&(i[v].destroyElements(),i[v].plotX=e);t.data=i,t.points=d},translate:function(){this.processedXData||this.processData(),this.generatePoints();var t=this,n=t.chart,r=t.options,s=r.stacking,o=t.xAxis,u=o.categories,a=t.yAxis,f=t.points,l=f.length,c=!!t.modifyValue,h,p=a.series,d=p.length,v=r.pointPlacement==="between";while(d--)if(p[d].visible){p[d]===t&&(h=!0);break}for(d=0;d<l;d++){var m=f[d],g=m.x,y=m.y,b=m.low,w=a.stacks[(y<r.threshold?"-":"")+t.stackKey],E,S;m.plotX=o.translate(g,0,0,0,1,v),s&&t.visible&&w&&w[g]&&(E=w[g],S=E.total,E.cum=b=E.cum-y,y=b+y,h&&(b=Bt(r.threshold,a.min)),a.isLog&&b<=0&&(b=null),s==="percent"&&(b=S?b*100/S:0,y=S?y*100/S:0),m.percentage=S?m.y*100/S:0,m.total=m.stackTotal=S,m.stackY=y),m.yBottom=Dt(b)?a.translate(b,0,1,0,1):null,c&&(y=t.modifyValue(y,m)),m.plotY=typeof y=="number"?i(a.translate(y,0,1,0,1)*10)/10:e,m.clientX=n.inverted?n.plotHeight-m.plotX:m.plotX,m.category=u&&u[m.x]!==e?u[m.x]:m.x}t.getSegments()},setTooltipPoints:function(e){var t=this,n=[],r,i,o,a=t.xAxis,f=a?a.tooltipLen||a.len:t.chart.plotSizeX,l=a&&a.tooltipPosName||"plotX",c,h,p=[];if(t.options.enableMouseTracking===!1)return;e&&(t.tooltipPoints=null),an(t.segments||t.points,function(e){n=n.concat(e)}),a&&a.reversed&&(n=n.reverse()),r=n.length;for(h=0;h<r;h++){c=n[h],i=n[h-1]?o+1:0,o=n[h+1]?u(0,s((c[l]+(n[h+1]?n[h+1][l]:f))/2)):f;while(i>=0&&i<=o)p[i++]=c}t.tooltipPoints=p},tooltipHeaderFormatter:function(e){var t=this,n=t.tooltipOptions,r=n.xDateFormat,i=t.xAxis,s=i&&i.options.type==="datetime",o;if(s&&!r)for(o in P)if(P[o]>=i.closestPointRange){r=n.dateTimeLabelFormats[o];break}return n.headerFormat.replace("{point.key}",s&&At(e)?M(r,e):e).replace("{series.name}",t.name).replace("{series.color}",t.color)},onMouseOver:function(){var e=this,t=e.chart,n=t.hoverSeries;n&&n!==e&&n.onMouseOut(),e.options.events.mouseOver&&vn(e,"mouseOver"),e.setState(K),t.hoverSeries=e},onMouseOut:function(){var e=this,t=e.options,n=e.chart,r=n.tooltip,i=n.hoverPoint;i&&i.onMouseOut(),e&&t.events.mouseOut&&vn(e,"mouseOut"),r&&!t.stickyTracking&&!r.shared&&r.hide(),e.setState(),n.hoverSeries=null},animate:function(e){var t=this,n=t.chart,r=n.renderer,i,s,o=t.options.animation,u=n.clipBox,a=n.inverted,f;o&&!kt(o)&&(o=wn[t.type].animation),f="_sharedClip"+o.duration+o.easing,e?(i=n[f],s=n[f+"m"],i||(n[f]=i=r.clipRect(xt(u,{width:0})),n[f+"m"]=s=r.clipRect(-99,a?-n.plotLeft:-n.plotTop,99,a?n.chartWidth:n.chartHeight)),t.group.clip(i),t.markerGroup.clip(s),t.sharedClipKey=f):(i=n[f],i&&(i.animate({width:n.plotSizeX},o),n[f+"m"].animate({width:n.plotSizeX+99},o)),t.animate=null,t.animationTimeout=setTimeout(function(){t.afterAnimate()},o.duration))},afterAnimate:function(){var e=this.chart,t=this.sharedClipKey,n=this.group,r=this.trackerGroup;n&&this.options.clip!==!1&&(n.clip(e.clipRect),r&&r.clip(e.clipRect),this.markerGroup.clip()),setTimeout(function(){t&&e[t]&&(e[t]=e[t].destroy(),e[t+"m"]=e[t+"m"].destroy())},100)},drawPoints:function(){var t=this,n,r=t.points,i=t.chart,s,o,u,a,f,l,c,h,p=t.options,d=p.marker,v,m,g,y=t.markerGroup;if(d.enabled||t._hasPointMarkers){u=r.length;while(u--)a=r[u],s=a.plotX,o=a.plotY,h=a.graphic,v=a.marker||{},m=d.enabled&&v.enabled===e||v.enabled,g=i.isInsidePlot(s,o,i.inverted),m&&o!==e&&!isNaN(o)?(n=a.pointAttr[a.selected?Q:J],f=n.r,l=Bt(v.symbol,t.symbol),c=l.indexOf("url")===0,h?h.attr({visibility:g?S?"inherit":U:q}).animate(xt({x:s-f,y:o-f},h.symbolName?{width:2*f,height:2*f}:{})):g&&(f>0||c)&&(a.graphic=h=i.renderer.symbol(l,s-f,o-f,2*f,2*f).attr(n).add(y))):h&&(a.graphic=h.destroy())}},convertAttribs:function(e,t,n,r){var i=this.pointAttrToOptions,s,o,u={};e=e||{},t=t||{},n=n||{},r=r||{};for(s in i)o=i[s],u[s]=Bt(e[o],t[s],n[s],r[s]);return u},getAttribs:function(){var e=this,t=wn[e.type].marker?e.options.marker:e.options,n=t.states,r=n[K],i,s=e.color,o={stroke:s,fill:s},u=e.points||[],a,f,l=[],c,h=e.pointAttrToOptions,p,d;e.options.marker?(r.radius=r.radius||t.radius+2,r.lineWidth=r.lineWidth||t.lineWidth+1):r.color=r.color||Nn(r.color||s).brighten(r.brightness).get(),l[J]=e.convertAttribs(t,o),an([K,Q],function(t){l[t]=e.convertAttribs(n[t],l[J])}),e.pointAttr=l,a=u.length;while(a--){f=u[a],t=f.options&&f.options.marker||f.options,t&&t.enabled===!1&&(t.radius=0),p=e.options.colorByPoint;if(f.options)for(d in h)Dt(t[h[d]])&&(p=!0);p?(t=t||{},c=[],n=t.states||{},i=n[K]=n[K]||{},e.options.marker||(i.color=Nn(i.color||f.color).brighten(i.brightness||r.brightness).get()),c[J]=e.convertAttribs(xt({color:f.color},t),l[J]),c[K]=e.convertAttribs(n[K],l[K],c[J]),c[Q]=e.convertAttribs(n[Q],l[Q],c[J])):c=l,f.pointAttr=c}},destroy:function(){var e=this,t=e.chart,n=/AppleWebKit\/533/.test(d),r,i,s=e.data||[],o,u,a;vn(e,"destroy"),dn(e),an(["xAxis","yAxis"],function(t){a=e[t],a&&(_t(a.series,e),a.isDirty=!0)}),e.legendItem&&e.chart.legend.destroyItem(e),i=s.length;while(i--)o=s[i],o&&o.destroy&&o.destroy();e.points=null,clearTimeout(e.animationTimeout),an(["area","graph","dataLabelsGroup","group","markerGroup","tracker","trackerGroup"],function(t){e[t]&&(r=n&&t==="group"?"hide":"destroy",e[t][r]())}),t.hoverSeries===e&&(t.hoverSeries=null),_t(t.series,e);for(u in e)delete e[u]},drawDataLabels:function(){var t=this,n=t.options,r=n.dataLabels,i=t.points,s,o,u,a;if(r.enabled||t._hasPointLabels)t.dlProcessOptions&&t.dlProcessOptions(r),a=t.plotGroup("dataLabelsGroup","data-labels",t.visible?U:q,r.zIndex||6),o=r,an(i,function(n){var i,f=n.dataLabel,l,c,h,p=!0;s=n.options&&n.options.dataLabels,i=o.enabled||s&&s.enabled;if(f&&!i)n.dataLabel=f.destroy();else if(i){h=r.rotation,r=hn(o,s),u=r.formatter.call(n.getLabelConfig(),r),r.style.color=Bt(r.color,r.style.color,t.color,"black");if(f)f.attr({text:u}),p=!1;else if(Dt(u)){l={fill:r.backgroundColor,stroke:r.borderColor,"stroke-width":r.borderWidth,r:r.borderRadius||0,rotation:h,padding:r.padding,zIndex:1};for(c in l)l[c]===e&&delete l[c];f=n.dataLabel=t.chart.renderer[h?"text":"label"](u,0,-999,null,null,null,r.useHTML).attr(l).css(r.style).add(a).shadow(r.shadow)}f&&t.alignDataLabel(n,f,r,null,p)}})},alignDataLabel:function(e,t,n,r,s){var o=this.chart,u=o.inverted,a=Bt(e.plotX,-999),f=Bt(e.plotY,-999),l=t.getBBox(),c;r=xt({x:u?o.plotWidth-f:a,y:i(u?o.plotHeight-a:f),width:0,height:0},r),xt(n,{width:l.width,height:l.height}),n.rotation?(c={align:n.align,x:r.x+n.x+r.width/2,y:r.y+n.y+r.height/2},t[s?"attr":"animate"](c)):(t.align(n,null,r),c=t.alignAttr),t.attr({visibility:n.crop===!1||o.isInsidePlot(c.x,c.y)||o.isInsidePlot(a,f,u)?o.renderer.isSVG?"inherit":U:q})},getSegmentPath:function(e){var t=this,n=[],r=t.options.step;return an(e,function(i,s){var o=i.plotX,u=i.plotY,a;t.getPointSpline?n.push.apply(n,t.getPointSpline(e,i,s)):(n.push(s?V:X),r&&s&&(a=e[s-1],r==="right"?n.push(a.plotX,u):r==="center"?n.push((a.plotX+o)/2,a.plotY,(a.plotX+o)/2,u):n.push(o,a.plotY)),n.push(i.plotX,i.plotY))}),n},getGraphPath:function(){var e=this,t=[],n,r=[];return an(e.segments,function(i){n=e.getSegmentPath(i),i.length>1?t=t.concat(n):r.push(i[0])}),e.singlePoints=r,e.graphPath=t,t},drawGraph:function(){var e=this.options,t=this.graph,n=this.group,r=e.lineColor||this.color,i=e.lineWidth,s=e.dashStyle,o,u=this.getGraphPath();t?(yn(t),t.animate({d:u})):i&&(o={stroke:r,"stroke-width":i,zIndex:1},s&&(o.dashstyle=s),this.graph=this.chart.renderer.path(u).attr(o).add(n).shadow(e.shadow))},invertGroups:function(){function n(){var t={width:e.yAxis.len,height:e.xAxis.len};an(["group","trackerGroup","markerGroup"],function(n){e[n]&&e[n].attr(t).invert()})}var e=this,t=e.chart;pn(t,"resize",n),pn(e,"destroy",function(){dn(t,"resize",n)}),n(),e.invertGroups=n},plotGroup:function(e,t,n,r,i){var s=this[e],o=this.chart,u=this.xAxis,a=this.yAxis;return s||(this[e]=s=o.renderer.g(t).attr({visibility:n,zIndex:r||.1}).add(i)),s.translate(u?u.left:o.plotLeft,a?a.top:o.plotTop),s},render:function(){var e=this,t=e.chart,n,r=e.options,i=r.animation,s=i&&!!e.animate,o=e.visible?U:q,u=r.zIndex,a=e.hasRendered,f=t.seriesGroup;n=e.plotGroup("group","series",o,u,f),e.markerGroup=e.plotGroup("markerGroup","markers",o,u,f),s&&e.animate(!0),e.getAttribs(),n.inverted=t.inverted,e.drawGraph&&e.drawGraph(),e.drawPoints(),e.drawDataLabels(),e.options.enableMouseTracking!==!1&&e.drawTracker(),t.inverted&&e.invertGroups(),r.clip!==!1&&!e.sharedClipKey&&!a&&(n.clip(t.clipRect),this.trackerGroup&&this.trackerGroup.clip(t.clipRect)),s?e.animate():a||e.afterAnimate(),e.isDirty=e.isDirtyData=!1,e.hasRendered=!0},redraw:function(){var e=this,t=e.chart,n=e.isDirtyData,r=e.group;r&&(t.inverted&&r.attr({width:t.plotWidth,height:t.plotHeight}),r.animate({translateX:e.xAxis.left,translateY:e.yAxis.top})),e.translate(),e.setTooltipPoints(!0),e.render(),n&&vn(e,"updatedData")},setState:function(e){var t=this,n=t.options,r=t.graph,i=n.states,s=n.lineWidth;e=e||J;if(t.state!==e){t.state=e;if(i[e]&&i[e].enabled===!1)return;e&&(s=i[e].lineWidth||s+1),r&&!r.dashstyle&&r.attr({"stroke-width":s},e?0:500)}},setVisible:function(t,n){var r=this,i=r.chart,s=r.legendItem,o=r.group,u=r.tracker,a=r.dataLabelsGroup,f=r.markerGroup,l,c,h=r.points,p,d=i.options.chart.ignoreHiddenSeries,v=r.visible;r.visible=t=t===e?!v:t,l=t?"show":"hide",o&&o[l](),f&&f[l]();if(u)u[l]();else if(h){c=h.length;while(c--)p=h[c],p.tracker&&p.tracker[l]()}i.hoverSeries===r&&r.onMouseOut(),a&&a[l](),s&&i.legend.colorizeItem(r,t),r.isDirty=!0,r.options.stacking&&an(i.series,function(e){e.options.stacking&&e.visible&&(e.isDirty=!0)}),d&&(i.isDirtyBox=!0),n!==!1&&i.redraw(),vn(r,l)},show:function(){this.setVisible(!0)},hide:function(){this.setVisible(!1)},select:function(t){var n=this;n.selected=t=t===e?!n.selected:t,n.checkbox&&(n.checkbox.checked=t),vn(n,t?"select":"unselect")},drawTracker:function(){var e=this,t=e.options,n=t.trackByArea,r=[].concat(n?e.areaPath:e.graphPath),i=r.length,s=e.chart,o=s.renderer,u=s.options.tooltip.snap,a=e.tracker,f=t.cursor,l=f&&{cursor:f},c=e.singlePoints,h=this.isCartesian&&this.plotGroup("trackerGroup",null,U,t.zIndex||1,s.trackerGroup),p,d,v=function(){s.hoverSeries!==e&&e.onMouseOver()},m=function(){t.stickyTracking||e.onMouseOut()};if(i&&!n){d=i+1;while(d--)r[d]===X&&r.splice(d+1,0,r[d+1]-u,r[d+2],V),(d&&r[d]===X||d===i)&&r.splice(d,0,V,r[d-2]+u,r[d-1])}for(d=0;d<c.length;d++)p=c[d],r.push(X,p.plotX-u,p.plotY,V,p.plotX+u,p.plotY);a?a.attr({d:r}):(e.tracker=a=o.path(r).attr({isTracker:!0,"stroke-linejoin":"round",visibility:e.visible?U:q,stroke:$,fill:n?$:W,"stroke-width":t.lineWidth+(n?0:2*u)}).on("mouseover",v).on("mouseout",m).css(l).add(h),C&&a.on("touchstart",v))}};var zn=It(Un);St.line=zn,wn.area=hn(En,{threshold:0});var Wn=It(Un,{type:"area",getSegmentPath:function(e){var t=Un.prototype.getSegmentPath.call(this,e),n=[].concat(t),r,i=this.options,s=t.length;s===3&&n.push(V,t[1],t[2]);if(i.stacking&&!this.closedStacks)for(r=e.length-1;r>=0;r--)r<e.length-1&&i.step&&n.push(e[r+1].plotX,e[r].yBottom),n.push(e[r].plotX,e[r].yBottom);else this.closeSegment(n,e);return this.areaPath=this.areaPath.concat(n),t},closeSegment:function(e,t){var n=this.yAxis.getThreshold(this.options.threshold);e.push(V,t[t.length-1].plotX,n,V,t[0].plotX,n)},drawGraph:function(){this.areaPath=[],Un.prototype.drawGraph.apply(this);var e=this.areaPath,t=this.options,n=this.area;n?n.animate({d:e}):this.area=this.chart.renderer.path(e).attr({fill:Bt(t.fillColor,Nn(this.color).setOpacity(t.fillOpacity||.75).get()),zIndex:0}).add(this.group)},drawLegendSymbol:function(e,t){t.legendSymbol=this.chart.renderer.rect(0,e.baseline-11,e.options.symbolWidth,12,2).attr({zIndex:3}).add(t.legendGroup)}});St.area=Wn,wn.spline=hn(En);var Xn=It(Un,{type:"spline",getPointSpline:function(e,t,n){var r=1.5,i=r+1,s=t.plotX,o=t.plotY,f=e[n-1],l=e[n+1],c,h,p,d,v;if(f&&l){var m=f.plotX,g=f.plotY,y=l.plotX,b=l.plotY,w;c=(r*s+m)/i,h=(r*o+g)/i,p=(r*s+y)/i,d=(r*o+b)/i,w=(d-h)*(p-s)/(p-c)+o-d,h+=w,d+=w,h>g&&h>o?(h=u(g,o),d=2*o-h):h<g&&h<o&&(h=a(g,o),d=2*o-h),d>b&&d>o?(d=u(b,o),h=2*o-d):d<b&&d<o&&(d=a(b,o),h=2*o-d),t.rightContX=p,t.rightContY=d}return n?(v=["C",f.rightContX||f.plotX,f.rightContY||f.plotY,c||s,h||o,s,o],f.rightContX=f.rightContY=null):v=[X,s,o],v}});St.spline=Xn,wn.areaspline=hn(wn.area);var Vn=Wn.prototype,$n=It(Xn,{type:"areaspline",closedStacks:!0,getSegmentPath:Vn.getSegmentPath,closeSegment:Vn.closeSegment,drawGraph:Vn.drawGraph});St.areaspline=$n,wn.column=hn(En,{borderColor:"#FFFFFF",borderWidth:1,borderRadius:0,groupPadding:.2,marker:null,pointPadding:.1,minPointLength:0,cropThreshold:50,pointRange:null,states:{hover:{brightness:.1,shadow:!1},select:{color:"#C0C0C0",borderColor:"#000000",shadow:!1}},dataLabels:{align:null,verticalAlign:null,y:null},threshold:0});var Jn=It(Un,{type:"column",tooltipOutsidePlot:!0,pointAttrToOptions:{stroke:"borderColor","stroke-width":"borderWidth",fill:"color",r:"borderRadius"},init:function(){Un.prototype.init.apply(this,arguments);var e=this,t=e.chart;t.hasRendered&&an(t.series,function(t){t.type===e.type&&(t.isDirty=!0)})},translate:function(){var t=this,n=t.chart,r=t.options,i=r.stacking,s=r.borderWidth,l=0,c=t.xAxis,h=t.yAxis,p=c.reversed,d={},v,m;Un.prototype.translate.apply(t),r.grouping===!1?l=1:an(n.series,function(n){var r=n.options;n.type===t.type&&n.visible&&t.options.group===r.group&&(r.stacking?(v=n.stackKey,d[v]===e&&(d[v]=l++),m=d[v]):r.grouping!==!1&&(m=l++),n.columnIndex=m)});var g=t.points,y=f(c.transA)*(c.ordinalSlope||r.pointRange||c.closestPointRange||1),b=y*r.groupPadding,w=y-2*b,E=w/l,S=r.pointWidth,x=Dt(S)?(E-S)/2:E*r.pointPadding,T=Bt(S,E-2*x),N=o(u(T,1+2*s)),C=(p?l-(t.columnIndex||0):t.columnIndex)||0,k=x+(b+C*E-y/2)*(p?-1:1),L=r.threshold,A=t.translatedThreshold=h.getThreshold(L),O=Bt(r.minPointLength,5);an(g,function(e){var r=a(u(-999,e.plotY),h.len+999),l=Bt(e.yBottom,A),c=e.plotX+k,p=o(a(r,l)),d=o(u(r,l)-p),v=h.stacks[(e.y<0?"-":"")+t.stackKey],m;i&&t.visible&&v&&v[e.x]&&v[e.x].setOffset(k,N),f(d)<O&&O&&(d=O,p=f(p-A)>O?l-O:A-(r<=A?O:0)),e.barX=c,e.pointWidth=T,e.shapeType="rect",e.shapeArgs=m=n.renderer.Element.prototype.crisp.call(0,s,c,p,N,d),s%2&&(m.y-=1,m.height+=1),e.trackerArgs=f(d)<3&&hn(e.shapeArgs,{height:6,y:p-3})})},getSymbol:H,drawLegendSymbol:Wn.prototype.drawLegendSymbol,drawGraph:H,drawPoints:function(){var t=this,n=t.options,r=t.chart.renderer,i;an(t.points,function(s){var o=s.plotY,u=s.graphic;o!==e&&!isNaN(o)&&s.y!==null?(i=s.shapeArgs,u?(yn(u),u.animate(hn(i))):s.graphic=u=r[s.shapeType](i).attr(s.pointAttr[s.selected?Q:J]).add(t.group).shadow(n.shadow,null,n.stacking&&!n.borderRadius)):u&&(s.graphic=u.destroy())})},drawTracker:function(){var t=this,n=t.chart,r=n.renderer,i,s,o=+(new Date),u=t.options,a=u.cursor,f=a&&{cursor:a},l=t.isCartesian&&t.plotGroup("trackerGroup",null,U,u.zIndex||1,n.trackerGroup),c,h,p,d=t.points,v,m=d.length,g=function(e){c=e.relatedTarget||e.fromElement,n.hoverSeries!==t&&Pt(c,"isTracker")!==o&&t.onMouseOver(),d[e.target._i].onMouseOver()},y=function(e){u.stickyTracking||(c=e.relatedTarget||e.toElement,Pt(c,"isTracker")!==o&&t.onMouseOut())};while(m--)v=d[m],s=v.tracker,i=v.trackerArgs||v.shapeArgs,h=v.plotY,p=!t.isCartesian||h!==e&&!isNaN(h),delete i.strokeWidth,v.y!==null&&p&&(s?s.attr(i):(v.tracker=s=r[v.shapeType](i).attr({isTracker:o,fill:$,visibility:t.visible?U:q}).on("mouseover",g).on("mouseout",y).css(f).add(v.group||l),C&&s.on("touchstart",g)),s.element._i=m)},alignDataLabel:function(e,t,n,r,i){var s=this.chart,o=s.inverted,u=e.below||e.plotY>Bt(this.translatedThreshold,s.plotSizeY),a=this.options.stacking||n.inside;e.shapeArgs&&(r=hn(e.shapeArgs),o&&(r={x:s.plotWidth-r.y-r.height,y:s.plotHeight-r.x-r.width,width:r.height,height:r.width}),a||(o?(r.x+=u?0:r.width,r.width=0):(r.y+=u?r.height:0,r.height=0))),n.align=Bt(n.align,!o||a?"center":u?"right":"left"),n.verticalAlign=Bt(n.verticalAlign,o||a?"middle":u?"top":"bottom"),Un.prototype.alignDataLabel.call(this,e,t,n,r,i)},animate:function(e){var t=this,n=t.points,r=t.options;e||(an(n,function(e){var n=e.graphic,i=e.shapeArgs,s=t.yAxis,o=r.threshold;n&&(n.attr({height:0,y:Dt(o)?s.getThreshold(o):s.translate(s.getExtremes().min,0,1,0,1)}),n.animate({height:i.height,y:i.y},r.animation))}),t.animate=null)},remove:function(){var e=this,t=e.chart;t.hasRendered&&an(t.series,function(t){t.type===e.type&&(t.isDirty=!0)}),Un.prototype.remove.apply(e,arguments)}});St.column=Jn,wn.bar=hn(wn.column);var Kn=It(Jn,{type:"bar",inverted:!0});St.bar=Kn,wn.scatter=hn(En,{lineWidth:0,states:{hover:{lineWidth:0}},tooltip:{headerFormat:'<span style="font-size: 10px; color:{series.color}">{series.name}</span><br/>',pointFormat:"x: <b>{point.x}</b><br/>y: <b>{point.y}</b><br/>"}});var Qn=It(Un,{type:"scatter",sorted:!1,requireSorting:!1,translate:function(){var e=this;Un.prototype.translate.apply(e),an(e.points,function(t){t.shapeType="circle",t.shapeArgs={x:t.plotX,y:t.plotY,r:e.chart.options.tooltip.snap}})},drawTracker:function(){var t=this,n=t.options.cursor,r=n&&{cursor:n},i=t.points,s=i.length,o,u=t.markerGroup,a=function(n){t.onMouseOver(),n.target._i!==e&&i[n.target._i].onMouseOver()},f=function(){t.options.stickyTracking||t.onMouseOut()};while(s--)o=i[s].graphic,o&&(o.element._i=s);t._hasTracking?t._hasTracking=!0:(u.attr({isTracker:!0}).on("mouseover",a).on("mouseout",f).css(r),C&&u.on("touchstart",a))},setTooltipPoints:H});St.scatter=Qn,wn.pie=hn(En,{borderColor:"#FFFFFF",borderWidth:1,center:["50%","50%"],colorByPoint:!0,dataLabels:{distance:30,enabled:!0,formatter:function(){return this.point.name}},legendType:"point",marker:null,size:"75%",showInLegend:!1,slicedOffset:10,states:{hover:{brightness:.1,shadow:!1}}});var Gn=It(Rn,{init:function(){Rn.prototype.init.apply(this,arguments);var e=this,t;return xt(e,{visible:e.visible!==!1,name:Bt(e.name,"Slice")}),t=function(){e.slice()},pn(e,"select",t),pn(e,"unselect",t),e},setVisible:function(t){var n=this,r=n.series,i=r.chart,s=n.tracker,o=n.dataLabel,u=n.connector,a=n.shadowGroup,f;n.visible=t=t===e?!n.visible:t,f=t?"show":"hide",n.group[f](),s&&s[f](),o&&o[f](),u&&u[f](),a&&a[f](),n.legendItem&&i.legend.colorizeItem(n,t),!r.isDirty&&r.options.ignoreHiddenPoint&&(r.isDirty=!0,i.redraw())},slice:function(e,t,n){var r=this,i=r.series,s=i.chart,o=r.slicedTranslation,u;tn(n,s),t=Bt(t,!0),e=r.sliced=Dt(e)?e:!r.sliced,u={translateX:e?o[0]:s.plotLeft,translateY:e?o[1]:s.plotTop},r.group.animate(u),r.shadowGroup&&r.shadowGroup.animate(u)}}),Yn={type:"pie",isCartesian:!1,pointClass:Gn,requireSorting:!1,pointAttrToOptions:{stroke:"borderColor","stroke-width":"borderWidth",fill:"color"},getColor:function(){this.initialColor=this.chart.counters.color},animate:function(){var e=this,t=e.points,n=e.startAngleRad;an(t,function(t){var r=t.graphic,i=t.shapeArgs;r&&(r.attr({r:e.center[3]/2,start:n,end:n}),r.animate({r:i.r,start:i.start,end:i.end},e.options.animation))}),e.animate=null},setData:function(e,t){Un.prototype.setData.call(this,e,!1),this.processData(),this.generatePoints(),Bt(t,!0)&&this.chart.redraw()},getCenter:function(){var e=this.options,t=this.chart,n=t.plotWidth,r=t.plotHeight,i=e.center.concat([e.size,e.innerSize||0]),s=a(n,r),o;return cn(i,function(e,t){return o=/%$/.test(e),o?[n,r,s,s][t]*Nt(e)/100:e})},translate:function(){this.generatePoints();var e=0,t=this,n=0,s=1e3,o=t.options,u=o.slicedOffset,a=u+o.borderWidth,f,p=t.chart,d,v,m,g=t.startAngleRad=h/180*((o.startAngle||0)%360-90),y=t.points,b=2*h,w,E,S,x=o.dataLabels.distance,T=o.ignoreHiddenPoint,N,C=y.length,k;t.center=f=t.getCenter(),t.getX=function(e,t){return m=r.asin((e-f[1])/(f[2]/2+x)),f[0]+(t?-1:1)*l(m)*(f[2]/2+x)};for(N=0;N<C;N++)k=y[N],e+=T&&!k.visible?0:k.y;for(N=0;N<C;N++){k=y[N],w=e?k.y/e:0,d=i((g+n*b)*s)/s;if(!T||k.visible)n+=w;v=i((g+n*b)*s)/s,k.shapeType="arc",k.shapeArgs={x:f[0],y:f[1],r:f[2]/2,innerR:f[3]/2,start:d,end:v},m=(v+d)/2,m>.75*b&&(m-=2*h),k.slicedTranslation=cn([l(m)*u+p.plotLeft,c(m)*u+p.plotTop],i),E=l(m)*f[2]/2,S=c(m)*f[2]/2,k.tooltipPos=[f[0]+E*.7,f[1]+S*.7],k.half=m<b/4?0:1,k.angle=m,k.labelPos=[f[0]+E+l(m)*x,f[1]+S+c(m)*x,f[0]+E+l(m)*a,f[1]+S+c(m)*a,f[0]+E,f[1]+S,x<0?"center":k.half?"right":"left",m],k.percentage=w*100,k.total=e}this.setTooltipPoints()},render:function(){var e=this;e.getAttribs(),this.drawPoints(),e.options.enableMouseTracking!==!1&&e.drawTracker(),this.drawDataLabels(),e.options.animation&&e.animate&&e.animate(),e.isDirty=!1},drawPoints:function(){var e=this,t=e.chart,n=t.renderer,r,i,s,o=e.options.shadow,u,a;an(e.points,function(f){i=f.graphic,a=f.shapeArgs,s=f.group,u=f.shadowGroup,o&&!u&&(u=f.shadowGroup=n.g("shadow").attr({zIndex:4}).add()),s||(s=f.group=n.g("point").attr({zIndex:5}).add()),r=f.sliced?f.slicedTranslation:[t.plotLeft,t.plotTop],s.translate(r[0],r[1]),u&&u.translate(r[0],r[1]),i?i.animate(a):f.graphic=i=n.arc(a).setRadialReference(e.center).attr(xt(f.pointAttr[J],{"stroke-linejoin":"round"})).add(f.group).shadow(o,u),f.visible===!1&&f.setVisible(!1)})},drawDataLabels:function(){var e=this,t=e.data,n,r=e.chart,i=e.options.dataLabels,s=Bt(i.connectorPadding,10),o=Bt(i.connectorWidth,1),u,a,l=Bt(i.softConnector,!0),c=i.distance,h=e.center,p=h[2]/2,d=h[1],v=c>0,m,g,y,b=[[],[]],w,E,S,x,T=2,N,C=function(e,t){return t.y-e.y},k=function(e,t){e.sort(function(e,n){return(n.angle-e.angle)*t})};if(!i.enabled&&!e._hasPointLabels)return;Un.prototype.drawDataLabels.apply(e),an(t,function(e){e.dataLabel&&b[e.half].push(e)}),y=b[0][0]&&b[0][0].dataLabel&&(b[0][0].dataLabel.getBBox().height||21);while(T--){var L=[],A,O=[],M=b[T],_,D=M.length,P;k(M,T-.5);if(c>0){for(_=d-p-c;_<=d+p+c;_+=y)L.push(_);A=L.length;if(D>A){x=[].concat(M),x.sort(C),N=D;while(N--)x[N].rank=N;N=D;while(N--)M[N].rank>=A&&M.splice(N,1);D=M.length}for(N=0;N<D;N++){n=M[N],g=n.labelPos;var H=9999,B,j;for(j=0;j<A;j++)B=f(L[j]-g[1]),B<H&&(H=B,P=j);if(P<N&&L[N]!==null)P=N;else if(A<D-N+P&&L[N]!==null){P=A-D+N;while(L[P]===null)P++}else while(L[P]===null)P++;O.push({i:P,y:L[P]}),L[P]=null}O.sort(C)}for(N=0;N<D;N++){var F,I;n=M[N],g=n.labelPos,m=n.dataLabel,S=n.visible===!1?q:U,I=g[1];if(c>0){F=O.pop(),P=F.i,E=F.y;if(I>E&&L[P+1]!==null||I<E&&L[P-1]!==null)E=I}else E=I;w=i.justify?h[0]+(T?-1:1)*(p+c):e.getX(P===0||P===L.length-1?I:E,T),m.attr({visibility:S,align:g[6]})[m.moved?"animate":"attr"]({x:w+i.x+({left:s,right:-s}[g[6]]||0),y:E+i.y-10}),m.moved=!0,v&&o&&(u=n.connector,a=l?[X,w+(g[6]==="left"?5:-5),E,"C",w,E,2*g[2]-g[4],2*g[3]-g[5],g[2],g[3],V,g[4],g[5]]:[X,w+(g[6]==="left"?5:-5),E,V,g[2],g[3],V,g[4],g[5]],u?(u.animate({d:a}),u.attr("visibility",S)):n.connector=u=e.chart.renderer.path(a).attr({"stroke-width":o,stroke:i.connectorColor||n.color||"#606060",visibility:S,zIndex:3}).translate(r.plotLeft,r.plotTop).add())}}},alignDataLabel:H,drawTracker:Jn.prototype.drawTracker,drawLegendSymbol:Wn.prototype.drawLegendSymbol,getSymbol:function(){}};Yn=It(Un,Yn),St.pie=Yn,xt(Highcharts,{Axis:Bn,CanVGRenderer:Mn,Chart:qn,Color:Nn,Legend:In,MouseTracker:Fn,Point:Rn,Tick:Dn,Tooltip:jn,Renderer:N,Series:Un,SVGRenderer:kn,VMLRenderer:Ln,arrayMin:Kt,arrayMax:Qt,charts:B,dateFormat:M,pathAnim:D,getOptions:Tn,hasBidiBug:x,isTouchDevice:w,numberFormat:Rt,seriesTypes:St,setOptions:xn,addEvent:pn,removeEvent:dn,createElement:Ft,discardElement:Yt,css:jt,each:an,extend:xt,map:cn,merge:hn,pick:Bt,splat:Ht,extendClass:It,pInt:Nt,wrap:zt,svg:S,canvas:T,vml:!S&&!T,product:"Highcharts",version:"2.3.5"})}(),function(e){function r(r,i){var s=this,o=r.add(s),u=e(window),a,f,l,c=e.tools.expose&&(i.mask||i.expose),h=Math.random().toString().slice(10);c&&(typeof c=="string"&&(c={color:c}),c.closeOnClick=c.closeOnEsc=!1);var p=i.target||r.attr("rel");f=p?e(p):r;if(!f.length)throw"Could not find Overlay: "+p;r&&r.index(f)==-1&&r.click(function(e){return s.load(e),e.preventDefault()}),e.extend(s,{load:function(r){if(s.isOpened())return s;var a=n[i.effect];if(!a)throw'Overlay: cannot find effect : "'+i.effect+'"';i.oneInstance&&e.each(t,function(){this.close(r)}),r=r||e.Event(),r.type="onBeforeLoad",o.trigger(r);if(r.isDefaultPrevented())return s;l=!0,c&&e(f).expose(c);var p=i.top,d=i.left,v=f.outerWidth({margin:!0}),m=f.outerHeight({margin:!0});return typeof p=="string"&&(p=p=="center"?Math.max((u.height()-m)/2,0):parseInt(p,10)/100*u.height()),d=="center"&&(d=Math.max((u.width()-v)/2,0)),a[0].call(s,{top:p,left:d},function(){l&&(r.type="onLoad",o.trigger(r))}),c&&i.closeOnClick&&e.mask.getMask().one("click",s.close),i.closeOnClick&&e(document).bind("click."+h,function(t){e(t.target).parents(f).length||s.close(t)}),i.closeOnEsc&&e(document).bind("keydown."+h,function(e){e.keyCode==27&&s.close(e)}),s},close:function(t){if(!s.isOpened())return s;t=t||e.Event(),t
.type="onBeforeClose",o.trigger(t);if(t.isDefaultPrevented())return;return l=!1,n[i.effect][1].call(s,function(){t.type="onClose",o.trigger(t)}),e(document).unbind("click."+h).unbind("keydown."+h),c&&e.mask.close(),s},getOverlay:function(){return f},getTrigger:function(){return r},getClosers:function(){return a},isOpened:function(){return l},getConf:function(){return i}}),e.each("onBeforeLoad,onStart,onLoad,onBeforeClose,onClose".split(","),function(t,n){e.isFunction(i[n])&&e(s).bind(n,i[n]),s[n]=function(t){return t&&e(s).bind(n,t),s}}),a=f.find(i.close||".close"),!a.length&&!i.close&&(a=e('<a class="close"></a>'),f.prepend(a)),a.click(function(e){s.close(e)}),i.load&&s.load()}e.tools=e.tools||{version:"1.2.6.R4"},e.tools.overlay={addEffect:function(e,t,r){n[e]=[t,r]},conf:{close:null,closeOnClick:!0,closeOnEsc:!0,closeSpeed:"fast",effect:"default",fixed:!e.browser.msie||e.browser.version>6,left:"center",load:!1,mask:null,oneInstance:!0,speed:"normal",target:null,top:"10%"}};var t=[],n={};e.tools.overlay.addEffect("default",function(t,n){var r=this.getConf(),i=e(window);r.fixed||(t.top+=i.scrollTop(),t.left+=i.scrollLeft()),t.position=r.fixed?"fixed":"absolute",this.getOverlay().css(t).fadeIn(r.speed,n)},function(e){this.getOverlay().fadeOut(this.getConf().closeSpeed,e)}),e.fn.overlay=function(n){var i=this.data("overlay");return i?i:(e.isFunction(n)&&(n={onBeforeLoad:n}),n=e.extend(!0,{},e.tools.overlay.conf,n),this.each(function(){i=new r(e(this),n),t.push(i),e(this).data("overlay",i)}),n.api?i:this)}}(jQuery),function(e){function n(){if(e.browser.msie){var t=e(document).height(),n=e(window).height();return[window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth,t-n<20?n:t]}return[e(document).width(),e(document).height()]}function r(t){if(t)return t.call(e.mask)}e.tools=e.tools||{version:"1.2.6.R4"};var t;t=e.tools.expose={conf:{maskId:"exposeMask",loadSpeed:"slow",closeSpeed:"fast",closeOnClick:!0,closeOnEsc:!0,zIndex:9998,opacity:.8,startOpacity:0,color:"#fff",onLoad:null,onClose:null}};var i,s,o,u,a;e.mask={load:function(f,l){if(o)return this;typeof f=="string"&&(f={color:f}),f=f||u,u=f=e.extend(e.extend({},t.conf),f),i=e("#"+f.maskId),i.length||(i=e("<div/>").attr("id",f.maskId),e("body").append(i));var c=n();return i.css({position:"absolute",top:0,left:0,width:c[0],height:c[1],display:"none",opacity:f.startOpacity,zIndex:f.zIndex}),f.color&&i.css("backgroundColor",f.color),r(f.onBeforeLoad)===!1?this:(f.closeOnEsc&&e(document).bind("keydown.mask",function(t){t.keyCode==27&&e.mask.close(t)}),f.closeOnClick&&i.bind("click.mask",function(t){e.mask.close(t)}),e(window).bind("resize.mask",function(){e.mask.fit()}),l&&l.length&&(a=l.eq(0).css("zIndex"),e.each(l,function(){var t=e(this);/relative|absolute|fixed/i.test(t.css("position"))||t.css("position","relative")}),s=l.css({zIndex:Math.max(f.zIndex+1,a=="auto"?0:a)})),i.css({display:"block"}).fadeTo(f.loadSpeed,f.opacity,function(){e.mask.fit(),r(f.onLoad),o="full"}),o=!0,this)},close:function(){if(o){if(r(u.onBeforeClose)===!1)return this;i.fadeOut(u.closeSpeed,function(){r(u.onClose),s&&s.css({zIndex:a}),o=!1}),e(document).unbind("keydown.mask"),i.unbind("click.mask"),e(window).unbind("resize.mask")}return this},fit:function(){if(o){var e=n();i.css({width:e[0],height:e[1]})}},getMask:function(){return i},isLoaded:function(e){return e?o=="full":o},getConf:function(){return u},getExposed:function(){return s}},e.fn.mask=function(t){return e.mask.load(t),this},e.fn.expose=function(t){return e.mask.load(t,this),this}}(jQuery);var JSON;JSON||(JSON={}),function(){function k(e){return e<10?"0"+e:e}function o(e){return p.lastIndex=0,p.test(e)?'"'+e.replace(p,function(e){var t=r[e];return typeof t=="string"?t:"\\u"+("0000"+e.charCodeAt(0).toString(16)).slice(-4)})+'"':'"'+e+'"'}function l(t,r){var s,u,a,f,c=e,h,p=r[t];p&&typeof p=="object"&&typeof p.toJSON=="function"&&(p=p.toJSON(t)),typeof i=="function"&&(p=i.call(r,t,p));switch(typeof p){case"string":return o(p);case"number":return isFinite(p)?String(p):"null";case"boolean":case"null":return String(p);case"object":if(!p)return"null";e+=n,h=[];if(Object.prototype.toString.apply(p)==="[object Array]"){f=p.length;for(s=0;s<f;s+=1)h[s]=l(s,p)||"null";return a=h.length===0?"[]":e?"[\n"+e+h.join(",\n"+e)+"\n"+c+"]":"["+h.join(",")+"]",e=c,a}if(i&&typeof i=="object"){f=i.length;for(s=0;s<f;s+=1)typeof i[s]=="string"&&(u=i[s],(a=l(u,p))&&h.push(o(u)+(e?": ":":")+a))}else for(u in p)Object.prototype.hasOwnProperty.call(p,u)&&(a=l(u,p))&&h.push(o(u)+(e?": ":":")+a);return a=h.length===0?"{}":e?"{\n"+e+h.join(",\n"+e)+"\n"+c+"}":"{"+h.join(",")+"}",e=c,a}}typeof Date.prototype.toJSON!="function"&&(Date.prototype.toJSON=function(){return isFinite(this.valueOf())?this.getUTCFullYear()+"-"+k(this.getUTCMonth()+1)+"-"+k(this.getUTCDate())+"T"+k(this.getUTCHours())+":"+k(this.getUTCMinutes())+":"+k(this.getUTCSeconds())+"Z":null},String.prototype.toJSON=Number.prototype.toJSON=Boolean.prototype.toJSON=function(){return this.valueOf()});var q=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,p=/[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,e,n,r={"\b":"\\b","	":"\\t","\n":"\\n","\f":"\\f","\r":"\\r",'"':'\\"',"\\":"\\\\"},i;typeof JSON.stringify!="function"&&(JSON.stringify=function(t,r,s){var o;n=e="";if(typeof s=="number")for(o=0;o<s;o+=1)n+=" ";else typeof s=="string"&&(n=s);if(!(i=r)||typeof r=="function"||typeof r=="object"&&typeof r.length=="number")return l("",{"":t});throw Error("JSON.stringify")}),typeof JSON.parse!="function"&&(JSON.parse=function(a,e){function c(t,n){var r,i,s=t[n];if(s&&typeof s=="object")for(r in s)Object.prototype.hasOwnProperty.call(s,r)&&(i=c(s,r),i!==void 0?s[r]=i:delete s[r]);return e.call(t,n,s)}var d,a=String(a);q.lastIndex=0,q.test(a)&&(a=a.replace(q,function(e){return"\\u"+("0000"+e.charCodeAt(0).toString(16)).slice(-4)}));if(/^[\],:{}\s]*$/.test(a.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,"@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,"]").replace(/(?:^|:|,)(?:\s*\[)+/g,"")))return d=eval("("+a+")"),typeof e=="function"?c({"":d},""):d;throw new SyntaxError("JSON.parse")})}(),typeof exports!="undefined"&&(exports.js_beautify=js_beautify),function(e){typeof define=="function"&&define.amd?typeof jQuery!="undefined"?define(["jquery"],e):define([],e):typeof jQuery!="undefined"?e(jQuery):e()}(function(e,t){function a(e,t){var n=decodeURI(e),i=s[t||!1?"strict":"loose"].exec(n),o={attr:{},param:{},seg:{}},u=14;while(u--)o.attr[r[u]]=i[u]||"";return o.param.query=p(o.attr.query),o.param.fragment=p(o.attr.fragment),o.seg.path=o.attr.path.replace(/^\/+|\/+$/g,"").split("/"),o.seg.fragment=o.attr.fragment.replace(/^\/+|\/+$/g,"").split("/"),o.attr.base=o.attr.host?(o.attr.protocol?o.attr.protocol+"://"+o.attr.host:o.attr.host)+(o.attr.port?":"+o.attr.port:""):"",o}function f(e){var t=e.tagName;return typeof t!="undefined"?n[t.toLowerCase()]:t}function l(e,t){if(e[t].length==0)return e[t]={};var n={};for(var r in e[t])n[r]=e[t][r];return e[t]=n,n}function c(e,t,n,r){var i=e.shift();if(!i)g(t[n])?t[n].push(r):"object"==typeof t[n]?t[n]=r:"undefined"==typeof t[n]?t[n]=r:t[n]=[t[n],r];else{var s=t[n]=t[n]||[];"]"==i?g(s)?""!=r&&s.push(r):"object"==typeof s?s[y(s).length]=r:s=t[n]=[t[n],r]:~i.indexOf("]")?(i=i.substr(0,i.length-1),!u.test(i)&&g(s)&&(s=l(t,n)),c(e,s,i,r)):(!u.test(i)&&g(s)&&(s=l(t,n)),c(e,s,i,r))}}function h(e,t,n){if(~t.indexOf("]")){var r=t.split("["),i=r.length,s=i-1;c(r,e,"base",n)}else{if(!u.test(t)&&g(e.base)){var o={};for(var a in e.base)o[a]=e.base[a];e.base=o}d(e.base,t,n)}return e}function p(e){return m(String(e).split(/&|;/),function(e,t){try{t=decodeURIComponent(t.replace(/\+/g," "))}catch(n){}var r=t.indexOf("="),i=v(t),s=t.substr(0,i||r),o=t.substr(i||r,t.length),o=o.substr(o.indexOf("=")+1,o.length);return""==s&&(s=t,o=""),h(e,s,o)},{base:{}}).base}function d(e,n,r){var i=e[n];t===i?e[n]=r:g(i)?i.push(r):e[n]=[i,r]}function v(e){var t=e.length,n,r;for(var i=0;i<t;++i){r=e[i],"]"==r&&(n=!1),"["==r&&(n=!0);if("="==r&&!n)return i}}function m(e,n){var r=0,i=e.length>>0,s=arguments[2];while(r<i)r in e&&(s=n.call(t,s,e[r],r,e)),++r;return s}function g(e){return Object.prototype.toString.call(e)==="[object Array]"}function y(e){var t=[];for(prop in e)e.hasOwnProperty(prop)&&t.push(prop);return t}function b(e,n){return arguments.length===1&&e===!0&&(n=!0,e=t),n=n||!1,e=e||window.location.toString(),{data:a(e,n),attr:function(e){return e=i[e]||e,typeof e!="undefined"?this.data.attr[e]:this.data.attr},param:function(e){return typeof e!="undefined"?this.data.param.query[e]:this.data.param.query},fparam:function(e){return typeof e!="undefined"?this.data.param.fragment[e]:this.data.param.fragment},segment:function(e){return typeof e=="undefined"?this.data.seg.path:(e=e<0?this.data.seg.path.length+e:e-1,this.data.seg.path[e])},fsegment:function(e){return typeof e=="undefined"?this.data.seg.fragment:(e=e<0?this.data.seg.fragment.length+e:e-1,this.data.seg.fragment[e])}}}var n={a:"href",img:"src",form:"action",base:"href",script:"src",iframe:"src",link:"href"},r=["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","fragment"],i={anchor:"fragment"},s={strict:/^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,loose:/^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/},o=Object.prototype.toString,u=/^[0-9]+$/;typeof e!="undefined"?(e.fn.url=function(t){var n="";return this.length&&(n=e(this).attr(f(this[0]))||""),b(n,t)},e.url=b):window.purl=b}),function(e,t,n){function c(){s=t[o](function(){r.each(function(){var t=e(this),n=t.width(),r=t.height(),i=e.data(this,a);(n!==i.w||r!==i.h)&&t.trigger(u,[i.w=n,i.h=r])}),c()},i[f])}var r=e([]),i=e.resize=e.extend(e.resize,{}),s,o="setTimeout",u="resize",a=u+"-special-event",f="delay",l="throttleWindow";i[f]=250,i[l]=!0,e.event.special[u]={setup:function(){if(!i[l]&&this[o])return!1;var t=e(this);r=r.add(t),e.data(this,a,{w:t.width(),h:t.height()}),r.length===1&&c()},teardown:function(){if(!i[l]&&this[o])return!1;var t=e(this);r=r.not(t),t.removeData(a),r.length||clearTimeout(s)},add:function(t){function s(t,i,s){var o=e(this),u=e.data(this,a);u.w=i!==n?i:o.width(),u.h=s!==n?s:o.height(),r.apply(this,arguments)}if(!i[l]&&this[o])return!1;var r;if(e.isFunction(t))return r=t,s;r=t.handler,t.handler=s}}}(jQuery,this);var gbst=function(){var e=function(){return new e.fn._init};return e.fn=e.prototype={constructor:e,_init:function(){return this.util.FunctionUtil.bindFunction=this.util.FunctionUtil.bind,this},module:function(){var e={},t=function(t){return e[t]?e[t]:e[t]={}};return t.getModules=function(){return e},t}(),namespace:function(e,t){var n=e.split("."),r;t||(t=this,n[0]==="gbst"&&(n=n.slice(1)));for(r=0;r<n.length;r+=1)typeof t[n[r]]=="undefined"&&(t[n[r]]={}),t=t[n[r]];return t},util:{getNewId:function(e){var t=0,n=e||"gbst-",r=function(e){e=e||"";var r=n+e+t;return t++,r};return r.getPrefix=function(){return n},r.getCounter=function(){return t},r}(),FunctionUtil:{bind:function(e,t){var n=function(){return e.apply(t,arguments)};return n}},StringUtil:{substitute:function(e){var t=Array.prototype.slice.call(arguments,1),n=arguments[0]||"";return n.replace(/{(\d+)}/g,function(e,n){return typeof t[n]!="undefined"?t[n]:"{"+n+"}"})}},NumberUtil:{round:function(e,t){typeof t!="number"&&(t=2);var n=Math.pow(10,t),r=Math.round(n*e)/n;return r},parseNumber:function(e,t){var n;e===n&&(e="");if(typeof t!="string"||t=="")t=".";e+="";var r=new RegExp("[^\\d"+t+"\\-]","g"),i=e.replace(r,"");i=i.replace(t,".");var s=/-?\.?\d+\.?\d*/,o=s.exec(i),u=0;return o!=null&&(u=parseFloat(o[0],10),isNaN(u)&&(u=0)),u}}}},e.fn._init.prototype=e.prototype,e()}();(function(){var e=gbst.module("gbst.calculations.base.config");e.periods={month:{perYear:12,multiplier:1/12},fortnight:{perYear:26,multiplier:1/26},week:{perYear:52,multiplier:1/52}},e.extendedPeriods={month:{perYear:12,multiplier:1/12},fortnight:{perYear:26.1,multiplier:14/365.25},week:{perYear:52.2,multiplier:7/365.25}}})(),function(e){e.CalcUtil=function(){this.pmt=function(e,t,n){var r=t,i=r*e,s=1-Math.pow(1+r,-n),o=i/s;return o},this.nper=function(e,t,n){var r=t,i=Math.log(1-r*e/n),s=Math.log(1+r),o=-i/s;return o},this.fv=function(e,t,n,r){var i=t,s=1+i,o=e*Math.pow(s,r),u=n/i,a=Math.pow(s,r)-1,f=o-u*a;return f},this.pv=function(e,t,n,r){var i=0,s=n/t,o=1+t,u=Math.pow(o,-r),a=1-u;return i=s*a,i},this.getEffPeriods=function(e,t,n){t=typeof t=="number"?t:12,n=typeof n=="number"?n:1;var r=e*(t/n);return r},this.getEffInterestRate=function(e,t,n,r,i){t=typeof t=="number"?t:12,n=typeof n=="number"?n:t,r=typeof r=="number"?r:1,i=typeof i=="number"?i:1;var s=t/r,o=i/n,u=e,a=s*o;if(a==1)u=e/s;else{var f=1+e/s,l=s*o,c=Math.pow(f,l)-1;u=c}return u}}}(gbst.module("gbst.calculations.base")),function(e){var t=e.calc=gbst.calculator=function(e){return new t.fn.init(e)};t.fn=t.prototype={constructor:t,init:function(e){return this.context={conf:e,_chain:!1},this},chain:function(e){return e=typeof e=="undefined"?!0:e,this.context._chain=e,this},isChaining:function(){return this.context._chain},endChain:function(){return this.context._chain=!1,this},getContext:function(){return this.context},getConf:function(){return this.context.conf},addFunctions:function(e,t){for(var n in e)e.hasOwnProperty(n)&&this.addToWrapper(e[n],t,n)},addToWrapper:function(e,t,r){typeof t=="undefined"&&(t=!0);var i=null;return t?i=function(){var t=Array.prototype.slice.call(arguments);return n.call(this,e.apply(this,t),this.isChaining())}:i=function(){var t=Array.prototype.slice.call(arguments);return e.apply(this,t)},r&&(this[r]=i),i}},t.fn.init.prototype=t.fn,t.extend=t.fn.extend=function(e){$.extend(this,e)};var n=function(e,t){return t?this.chain():e}}(gbst.module("gbst.calculator")),function(){var e=gbst.module("gbst.calculator.loan.config");e.RepaymentTypes={IO:"IO",PI:"PI"},e.mapping={squashStateMapping:{nperRemaining:"nper",consideredPV:"pv"},resultsToInputsMapping:{consideredPV:"pv",nperRemaining:"nperRemaining",period:"period",pv:"pv"}}}(),function(e){var t=gbst.module("gbst.calculator.loan");t.LoanSummaryItem=function(e,t,n){this.period=typeof e=="number"?e:0,this.inValues=t,this.outValues=n},t.LoanSummaryItem.prototype={},t.PeriodResult=function(){this.pv=0,this.interestEarned=0,this.nperRemaining=0,this.period=0,this.totals=new Object},t.PeriodResult.getInstance=function(e){var n=null,r=new t.PeriodResult;for(n in r)e.hasOwnProperty(n)&&(r[n]=e[n]);return r}}(gbst.calculator),function(e){var t=gbst.module("gbst.calculator.loan");t.LoanSummary=function(){this._storageArea={},this.summaryList=[],this.valueStack=[]},t.LoanSummary.prototype={initialSummaryItem:null,lastSummaryItem:null,_storageArea:null,pushValue:function(e){this.valueStack.push(e)},pushSummary:function(e){this.summaryList.push(e),this.lastSummaryItem=e},getLastSummary:function(){return this.lastSummaryItem},getStorage:function(e){return this._storageArea[e]||(this._storageArea[e]={}),this._storageArea[e]},getRawStorage:function(){return this._storageArea},reset:function(){this.summaryList.length=0,this.valueStack.length=0,this.lastSummaryItem=null,this._storageArea={}}}}(gbst.calculator),function(e,t){var n=gbst.module("gbst.calculations.base"),r=new n.CalcUtil,i=gbst.module("gbst.calculator.loan.config"),s=gbst.module("gbst.calculator.loan");s.LoanOperatorBase=function(){this.type="loanOperatorBase",this.config=null,this._loan=null,this.operatorProperties=[],this.overrideList=["invoke","isActivePeriod","updateResults","finaliseResults","reset"],this.isActivePeriod=function(e){return!0},this.isActive=function(){var e=this.getConfig();return e.active},this.setActive=function(e){var t=this.getConfig();t.active=e},this.setConfig=function(t){this.config=e.extend({active:!0},t)},this.getConfig=function(){return this.config||(this.config={active:!0}),this.config},this.invoke=function(e,t){},this.updateResults=function(e,t,n){},this.finaliseResults=function(e,t,n){},this.reset=function(){},this.applyOverrides=function(){var t=this.getConfig(),n=0,r=this.overrideList,i=r?r.length:0,s=null,o=null;for(n=0;n<i;n++)s=r[n],t.hasOwnProperty(s)&&(o=t[s],e.isFunction(o)&&(o=e.proxy(o,this)),this[s]=o)},this.getLoanRef=function(){return this._loan},this.setLoanRef=function(e){this._loan=e}},s.LoanOperator={};var o={};o.pmt=function(e){var t=e.pv,n=e.effRate;return t*n},s.Loan=function(t){this.LoanOperator=null,this.loanConfig=t,this.loanContext=this.context.loan={period:0,lastResult:null,valueStack:[],operators:[],operatorsActive:!0},this.clone=function(t){t=e.extend({cloneOperators:!0},t);var n=this.getConf(),r=this.calcConfig,i=null;i=gbst.calculator(n).loan(r);if(t.cloneOperators){var s=0,o=0,u=null,a=null,f=null;u=this.getOperators(!0),o=u.length;for(s=0;s<o;s++)a=u[s],f=i[a.type],i.createOperator(f,a.getConfig())}return i},this.reset=this.addToWrapper(function(t){var n=this.getOperators(),r=n.length,i=0;t=e.extend({clearValueStack:!0},t),this.setPeriod(0),this.loanContext.lastResult=null,t.clearValueStack&&(this.loanContext.valueStack.length=0);for(i=0;i<r;i++)n[i].reset()}),this.getValueStack=function(){return[{period:this.loanContext.period}].concat(this.loanContext.valueStack)},this.pushResult=function(e){return this.loanContext.valueStack.push(e),this},this.setLastResult=function(e){return this.loanContext.lastResult=e,this},this.getLastResult=function(){return this.loanContext.lastResult},this.squashState=function(t){var n=this.getConf(),r=this.getValueStack(),i={},s={},o=Array.prototype.slice.call(arguments,1);t=e.extend({processOperators:!0},t),e.extend.apply(i,[i].concat(r,o)),e.extend(s,n,i);var u=this.loanConfig.squashStateMapping;return this.mapResultToInput(s,s,u,!1),t.processOperators&&this._precalculate(s.period,s),s},this.createOperator=function(e,t){e.prototype=this.LoanOperator;var n=new e(t);return n.applyOverrides(),n.setLoanRef(this),n},this.pushOperator=function(e){return this.loanContext.operators.push(e)},this.popOperator=function(){return this.loanContext.operators.pop()},this.getOperators=function(e){var t=this.loanContext.operators.concat();return t},this.getActiveOperators=function(e){var t=0,n=[],r=this.getOperators(),i=r.length,s=this.getOperatorsActive();if(s){typeof e!="number"&&(e=this.getPeriod());for(t=0;t<i;t++)r[t].isActivePeriod(e)&&n.push(r[t])}return n},this.setOperatorsActive=function(e){this.loanContext.operatorsActive=e===!0},this.getOperatorsActive=function(){return this.loanContext.operatorsActive},this.clearOperators=function(){return this.loanContext.operators.length=0,this},this.isInterestOnly=function(e){return typeof e=="undefined"&&(e=this.squashState()),e.repaymentType==i.RepaymentTypes.IO},this.pmt=this.addToWrapper(function(e){var t=Array.prototype.slice.call(arguments,1),n=this.squashState.apply(this,[e].concat(t)),i=0;return typeof e=="number"?(i=e,e={update:!0}):this.isInterestOnly(n)===!0?i=o.pmt(n):i=r.pmt(n.pv,n.effRate,n.nperRemaining),e&&e.update&&this.pushResult({pmt:i}),i}),this.totalPmt=this.addToWrapper(function(e){var t=Array.prototype.slice.call(arguments,1),n=this.squashState.apply(this,[e].concat(t)),r=0;return r=n.pmt*n.nper,r}),this.nper=this.addToWrapper(function(e){var t=this.squashState(e),n=0;return typeof e=="number"?(n=e,e={update:!0}):n=r.nper(t.pv,t.effRate,t.pmt),e&&e.update&&this.pushResult({nper:n}),n}),this.fv=this.addToWrapper(function(e){var t=this.squashState(e),n=t.period,i=0;return typeof e=="number"?(i=e,e={update:!0}):i=r.fv(t.pv,t.effRate,t.pmt,n),e&&e.update&&this.pushResult({fv:i}),i}),this.pv=this.addToWrapper(function(e){var t=this.squashState(e),n=t.period,i=0;return typeof e=="number"?(i=e,e={update:!0}):i=r.pv(t.fv,t.effRate,t.pmt,n),e&&e.update&&this.pushResult({pv:i}),i}),this.getFrequency=function(e){e||(e=this.squashState({processOperators:!1}));var t=e.frequency;if(!t)throw new Error("Unable to retrieve 'frequency' object from object. loanInfo="+e);return t},this.termToPeriod=function(e,t,n){var i=this.getFrequency();t=typeof t=="number"?t:i.pmtPPY,n=typeof n=="number"?n:i.pmtFreq;var s=r.getEffPeriods(e,t,n);return s},this.getEffInterestRate=function(e,t,n,i,s){var o=null,u=typeof t;u=="number"?o={cpndPPY:t,pmtPPY:n,cpndFreq:i,pmtFreq:s}:u=="object"?o=t:o=this.getFrequency();var a=r.getEffInterestRate(e,o.cpndPPY,o.pmtPPY,o.cpndFreq,o.pmtFreq);return a},this.convertTerms=function(t,n,r,i){var s=r.length,o=null,u=0,a=null,f={};for(u=0;u<s;u++)a=r[u],o=a.fallbackValue,f[a.periodName]=n[a.periodName],n.hasOwnProperty(a.periodName)==0&&(n.hasOwnProperty(a.termName)?f[a.periodName]=this.termToPeriod(n[a.termName]):f[a.periodName]=o);e.extend(n,f)},this.convertInterestRate=function(t,n){var r=this.getFrequency(t),i={interestRate:n.interestRate};i.decimalRate=n.decimalRate?n.decimalRate:i.interestRate?i.interestRate/100:undefined,i.effRate=n.effRate?n.effRate:i.decimalRate?this.getEffInterestRate(i.decimalRate,r):undefined,e.extend(n,i)},this.getPeriod=function(){return this.loanContext.period},this.setPeriod=function(e){return this.loanContext.period=e,this},this.calculateLoan=this.addToWrapper(function(e){var t=null,n=0;this.reset({clearValueStack:!1}),t=this.squashState({processOperators:!1}),n=t.nper;var r=this._calculateToPeriod(n,t,e);return r}),this.calculateToPeriod=this.addToWrapper(function(e,t){this.reset({clearValueStack:!1});var n=this.squashState({processOperators:!1}),r=this._calculateToPeriod(e,n,t);return r}),this._calculateToPeriod=function(t,n,r){r=e.extend({stopAtZeroPV:!0},r);var i=0,o=n,u=null,a=new s.LoanSummary,f={processOperators:!1};for(i=0;i<=t;i++){i==0?u=this.calculateInitialPeriod(o,a,r):u=this._calculatePeriod(i,o,a,r),o=this.squashState(f),this.mapResultToInput(o,u.outValues,this.loanConfig.resultsToInputsMapping,!0),i==0&&(a.initialLoanItem=u),a.pushSummary(u);if(r.stopAtZeroPV&&o.pv<=0)break}return this._finaliseResults(i,u,a),a},this.calculateInitialPeriod=function(e,t,n){e.consideredPV=0,e.pmt=0;var r=this._calculatePeriod(0,e,t,n);return r},this._calculatePeriod=function(e,t,n,r){var i=null,s=null,o=null;return i=this._precalculate(e,t,r),s=this._calculate(e,t,r),o=this._postcalculate(e,t,s,n,i,r),this.setLastResult(o),o},this._precalculate=function(e,t,n){var r=0,i=this.getActiveOperators(e),s=i.length,o=null;for(;r<s;r++)o=i[r],o.invoke(e,t);return i},this._calculate=function(e,t,n){var r=t.pv,i=t.consideredPV,o=t.effRate,u=0,a=t.pmt,f=r,l=t.nper-e;u=i*o,f=r+u,n.stopAtZeroPV&&f<=a&&(f=Math.max(f,0),a=f),f-=a,t.pmt=a;var c=s.PeriodResult.getInstance({pv:f,interestEarned:u,nperRemaining:l,period:e});return c},this._postcalculate=function(e,t,n,r,i,o){var u=null,a=0,f=i?i.length:0,l=null;u=new s.LoanSummaryItem(e,t,n),this._updateResults(e,u,r);for(;a<f;a++)l=i[a],l.updateResults(e,u,r);return u},this._finaliseResults=function(e,t,n){var r=0,i=null,s=null,o=0;if(this.getOperatorsActive()){s=this.getOperators(),o=s.length;for(r=0;r<o;r++)i=s[r],i.finaliseResults(e,t,n)}},this._updateResults=function(t,n,r){var i=n.inValues,s=n.outValues,o=i.pmt-s.interestEarned,u=r.lastSummaryItem!=null?r.lastSummaryItem.outValues.totals:null;s.totals=e.extend({pmt:0,interestEarned:0,principalPaid:0},u),s.totals.pmt+=i.pmt,s.totals.interestEarned+=s.interestEarned,s.totals.principalPaid+=o},this.mapResultToInput=function(t,n,r,i){var s=null,o=null;for(s in r){if(!r.hasOwnProperty(s))continue;o=r[s];if(e.isFunction(o))o(s,t,n);else if(i||t.hasOwnProperty(s)==0)t[s]=n[o]}}},s.normaliseLoanParams=function(e,t){s.normaliseFrequency(t);var n=[{termName:"term",periodName:"nper",fallbackValue:undefined}];e.convertTerms(t,t,n,!0),e.convertInterestRate(t,t,!0)},s.normaliseFrequency=function(t){var n={},r=1,i=12,s=n,o=typeof t.frequency;o=="object"?(s=t.frequency,r=this.getNumber(s.freq,r),i=this.getNumber(s.ppy,i)):o=="number"&&(i=t.frequency),n.cpndFreq=this.getNumber(s.cpndFreq,r),n.cpndPPY=this.getNumber(s.cpndPPY,i),n.pmtFreq=this.getNumber(s.pmtFreq,r),n.pmtPPY=this.getNumber(s.pmtPPY,i),e.extend(!0,t,{frequency:n})},s.getNumber=function(e,t){return typeof e=="number"?e:t},s.validateLoanConfig=function(t){var n=e.extend({squashStateMapping:i.mapping.squashStateMapping,resultsToInputsMapping:i.mapping.resultsToInputsMapping},t);return n},t.fn.loan=function(e){s.Loan.prototype=this,e=s.validateLoanConfig(e);var t=new s.Loan(e);return s.normaliseLoanParams(t,this.getConf()),s.LoanOperatorBase.prototype=t,t.LoanOperator=new s.LoanOperatorBase,t}}(jQuery,gbst.calculator),function(e){var t=gbst.module("gbst.calculator.loan"),n=gbst.module("gbst.calculator.loan.calculaterepayment");n.CalculateRepaymentOperator=function(e){this.type="calculateRepayment",this.setConfig(e),this.operatorProperties=["pmt"],this.isActivePeriod=function(e){var t=this.getConfig();return t.active&&(t.auto===!0||e==t.atPeriod)},this.invoke=function(e,t){var n=this.getConfig(),r=this.getLoanRef(),i=0;i=r.pmt({processOperators:!1},t),t.pmt=i,n.update===!0&&r.pushResult({pmt:i})},this.updateResults=function(e,t,n){var r=n.getStorage(this.type),i=r.pmtList=r.pmtList||[];i.push({period:e,pmt:t.inValues.pmt})},this.reset=function(){}},n.normaliseParams=function(e,t,n){return n=$.extend({},{active:!0},n),n.auto!==!0&&this.normalisePeriods(e,t,n),n},n.normalisePeriods=function(e,t,n){var r,i={period:n.period!==r?n.period:0,atPeriod:n.atPeriod,update:n.update!==r?n.update:!0};n.term!==r&&(i.period=e.termToPeriod(n.term)),i.atPeriod=i.atPeriod?i.atPeriod:i.period+1,$.extend(n,i)},e.fn.calculateRepayment=function(e){e==null&&(e={});var t=this.squashState({processOperators:!1});e=n.normaliseParams(this,t,e);var r=this.createOperator(n.CalculateRepaymentOperator,e);return this.pushOperator(r),r}}(gbst.calculator),function(e){var t=gbst.module("gbst.calculator.loan"),n=gbst.module("gbst.calculator.loan.aggregateModule");n.AggregateOperator=function(e){this.type="aggregate",this.setConfig(e),this.operatorProperties=[],this.isActivePeriod=function(e){var t=this.getConfig();return t.active},this.invoke=function(e,t){},this.updateResults=function(e,t,n){},this.reset=function(){}},n.normaliseParams=function(e,t,n){typeof n.active=="undefined"&&(n.active=!0)},e.prototype.aggregate=function(e){if(e==null)return this;var t=this.squashState({processOperators:!1});n.normaliseParams(this,t,e);var r=this.createOperator(n.AggregateOperator,e);return this.pushOperator(r),r}}(gbst.calculator),function(e){var t=gbst.module("gbst.calculator.loan.config"),n=gbst.module("gbst.calculator.loan"),r=gbst.module("gbst.calculator.loan.interestrate");r.InterestRateOperator=function(e){this.type="interestRate",this.setConfig(e),this.operatorProperties=["interestRate","decimalRate","effRate","repaymentType"],this.isActivePeriod=function(e){var t=this.getConfig();return t.active&&e==t.startPeriod&&e==0||e>t.startPeriod&&e<=t.endPeriod},this.invoke=function(e,t){var n=0,r=this.getConfig(),i=null,s=this.operatorProperties,o=s.length;for(n=0;n<o;n++)i=s[n],r.hasOwnProperty(i)&&(t[i]=r[i])},this.updateResults=function(e,t,n){},this.reset=function(){}},r.normaliseParams=function(e,t,n){typeof n.active=="undefined"&&(n.active=!0),this.normalisePeriods(e,t,n),this.normaliseInterestRates(e,t,n),this.normaliseRepaymentType(e,t,n)},r.normalisePeriods=function(e,t,n){var r=[{termName:"startTerm",periodName:"startPeriod",fallbackValue:t.period},{termName:"endTerm",periodName:"endPeriod",fallbackValue:Number.POSITIVE_INFINITY}];e.convertTerms(t,n,r)},r.normaliseInterestRates=function(e,t,n){e.convertInterestRate(t,n)},r.normaliseRepaymentType=function(e,n,r){var i=null,s=r.repaymentType;s!=null&&(i={repaymentType:t.RepaymentTypes[s]?t.RepaymentTypes[s]:t.RepaymentTypes.PI},$.extend(r,i))},e.prototype.interestRate=function(e){if(e==null)return this;var t=this.squashState({processOperators:!1});r.normaliseParams(this,t,e);var n=this.createOperator(r.InterestRateOperator,e);return this.pushOperator(n),n}}(gbst.calculator),function(e){var t=gbst.module("gbst.calculator.loan"),n=gbst.module("gbst.calculator.loan.fee");n.StartupFeeOperator=function(e){this.type="startupFee",this.setConfig(e),this.operatorProperties=["pv"],this.isActivePeriod=function(e){var t=this.getConfig();return t.active&&e==t.period},this.invoke=function(e,t){var n=this.getConfig();n.includeInPrincipal&&(t.pv=t.pv?t.pv:0,t.pv+=n.startupFee)},this.updateResults=function(e,t,n){var r={startupFee:0},i=t.outValues,s=this.getConfig();i=$.extend(r,i),i.startupFee+=s.startupFee,i.totals=$.extend(r,i.totals),t.outValues=i;var o=n.getStorage(this.type),u=o.feeList=o.feeList||[];u.push({period:e,fee:s.startupFee,includeInPrincipal:s.includeInPrincipal,type:"startupFee"})},this.reset=function(){}},n.OngoingFeeOperator=function(e){this.type="ongoingFee",this.setConfig(e),this.operatorProperties=[],this.isActivePeriod=function(e){var t=this.getConfig(),n=e==0&&t.applyInInitialPeriod,r=e>t.startPeriod&&e<=t.endPeriod;return t.active&&(n||r)},this.invoke=function(e,t){},this.updateResults=function(e,t,n){var r=!0,i=this.getConfig(),s=i.frequencyTest;typeof s=="function"&&(r=s.call(this,e,t.inValues));if(!r)return;var o=t.outValues,i=this.getConfig();o.ongoingFee=o.ongoingFee?o.ongoingFee+i.ongoingFee:i.ongoingFee,o.totals.ongoingFee=o.totals.ongoingFee?o.totals.ongoingFee+i.ongoingFee:i.ongoingFee,t.outValues=o;var u=n.getStorage(this.type),a=u.feeList=u.feeList||[];a.push({period:e,fee:i.ongoingFee,type:"ongoingFee"})},this.reset=function(){}},n.OngoingFeeOperator.prototype=t.LoanOperator,n.normaliseStartupParams=function(e,t,n){n=$.extend({},{active:!0,includeInPrincipal:!1},n);if(!n.startupFee)throw new Error("Invalid fees configuration. Requires 'startupFee' property.");return this.normaliseStartupFees(e,t,n),n},n.normaliseStartupFees=function(e,t,n){var r=[{termName:"term",periodName:"period",fallbackValue:0}];e.convertTerms(t,n,r)},n.normaliseOngoingParams=function(e,t,n){n=$.extend({},{active:!0,applyInInitialPeriod:!1},n);if(!n.ongoingFee)throw new Error("Invalid fees configuration. Requires 'ongoingFee' property.");return this.normaliseOngoingFees(e,t,n),n},n.normaliseOngoingFees=function(e,t,n){var r=[{termName:"startTerm",periodName:"startPeriod",fallbackValue:0},{termName:"endTerm",periodName:"endPeriod",fallbackValue:Number.POSITIVE_INFINITY}];e.convertTerms(t,n,r)},e.fn.startupFee=function(e){if(e==null)return this;var t=this.squashState({processOperators:!1});e=n.normaliseStartupParams(this,t,e);var r=this.createOperator(n.StartupFeeOperator,e);return this.pushOperator(r),r},e.fn.ongoingFee=function(e){if(e==null)return this;var t=this.squashState({processOperators:!1});e=n.normaliseOngoingParams(this,t,e);var r=this.createOperator(n.OngoingFeeOperator,e);return this.pushOperator(r),r}}(gbst.calculator),function(e){var t=gbst.module("gbst.calculator.loan"),n=gbst.module("gbst.calculator.loan.offset");n.OffsetOperator=function(e){this.type="offset",this.setConfig(e),this.originalConsideredPV=0,this.offsetBalance=0,this.newConsideredPV=0,this.operatorProperties=["consideredPV"],this.isActivePeriod=function(e){var t=this.getConfig();return t.active&&e>=t.startPeriod&&e<=t.endPeriod},this.invoke=function(e,t){var n=this.getConfig(),r=0;this.originalConsideredPV=t.consideredPV,this.offsetBalance=n.offsetBalance,r=this.originalConsideredPV-this.offsetBalance,r=Math.max(r,0),this.newConsideredPV=r,t.consideredPV=r},this.updateResults=function(e,t,n){var r=n.getStorage(this.type),i=r.pmtList=r.pmtList||[];i.push({period:e,originalConsideredPV:this.originalConsideredPV,offsetBalance:this.offsetBalance,newConsideredPV:this.newConsideredPV})},this.reset=function(){}},n.normaliseParams=function(e,t,n){n=$.extend({},{active:!0},n);if(!n.hasOwnProperty("offsetBalance"))throw new Error("Invalid configuration. Requires 'offsetBalance' property.");return this.normaliseOffsetBalance(e,t,n),this.normalisePeriods(e,t,n),n},n.normaliseOffsetBalance=function(e,t,n){var r="offsetBalance",i={},s=parseFloat(n[r],10);if(isNaN(s)||!isFinite(s))throw new Error("Invalid configuration. Expected '"+r+"' to be a finite number but got: '"+n[r]+"'");i[r]=s,$.extend(n,i)},n.normalisePeriods=function(e,t,n){var r=[{termName:"startTerm",periodName:"startPeriod",fallbackValue:0},{termName:"endTerm",periodName:"endPeriod",fallbackValue:Number.POSITIVE_INFINITY}];e.convertTerms(t,n,r)},e.fn.offset=function(e){if(e==null)return this;var t=this.squashState({processOperators:!1});e=n.normaliseParams
(this,t,e);var r=this.createOperator(n.OffsetOperator,e);return this.pushOperator(r),r}}(gbst.calculator),function(e){var t=gbst.module("gbst.calculator.loan"),n=gbst.module("gbst.calculator.loan.extrarepayment");n.ExtraRepaymentOperator=function(e){this.type="extraRepayment",this.setConfig(e),this.originalPmt=0,this.newPmt=0,this.operatorProperties=["pmt"],this.isActivePeriod=function(e){var t=this.getConfig();return t.active&&e>t.startPeriod&&e<=t.endPeriod},this.invoke=function(e,t){var n=this.getConfig(),r=n.type;this.originalPmt=t.pmt,this.newPmt=0;if(r=="pmt")this.newPmt=n.pmt;else{if(r!="pmtDiff")throw new Error("Invalid extra-repayment configuration. Expected 'type' to be either 'pmt' or 'pmtDiff' but received: type='"+r+"'");this.newPmt=this.originalPmt+n.pmtDiff}t.pmt=this.newPmt},this.updateResults=function(e,t,n){var r=n.getStorage(this.type),i=r.pmtList=r.pmtList||[],s=this.getConfig(),o=s.type;i.push({period:e,originalPmt:this.originalPmt,type:o,pmt:this.newPmt,pmtDiff:this.newPmt-this.originalPmt})},this.reset=function(){}},n.normaliseParams=function(e,t,n){n=$.extend({},{active:!0},n);if(!n.pmt&&!n.pmtDiff)throw new Error("Invalid configuration. Requires 'pmt' or 'pmtDiff' property.");return this.normaliseRepayment(e,t,n),this.normalisePeriods(e,t,n),n},n.normaliseRepayment=function(e,t,n){var r="pmt",i="pmt";n.hasOwnProperty(r)||(i=r="pmtDiff");var s=parseFloat(n[r],10);if(isNaN(s)||!isFinite(s))throw new Error("Invalid configuration. Expected '"+r+"' to be a finite number but got: '"+n[r]+"'");var o={type:i};o[r]=s,$.extend(n,o)},n.normalisePeriods=function(e,t,n){var r=[{termName:"startTerm",periodName:"startPeriod",fallbackValue:0},{termName:"endTerm",periodName:"endPeriod",fallbackValue:Number.POSITIVE_INFINITY}];e.convertTerms(t,n,r)},e.fn.extraRepayment=function(e){if(e==null)return this;var t=this.squashState({processOperators:!1});e=n.normaliseParams(this,t,e);var r=this.createOperator(n.ExtraRepaymentOperator,e);return this.pushOperator(r),r}}(gbst.calculator),function(e){var t=gbst.module("gbst.loan.shared.view");t.Events={CONTROL_CHANGE:"view.controlchange"},t.SliderView=Backbone.View.extend({templateId:null,model:null,dispatcher:null,controlConfig:null,viewDirty:!0,rangeInput:null,rangeList:null,configFormatters:null,initialize:function(e){this.model=e.model,this.dispatcher=e.dispatcher,this.setControlConfig(e.controlConfig)},setControlConfig:function(e){var t=_.extend({},e.controlData.sliderData);this.controlConfig=_.extend({},e),this.controlConfig.controlData.sliderData=t,this.templateId=this.controlConfig.templateId;var n=_.pick(e,["modelToControlFormatter","controlToModelFormatter"]);return _.defaults(n,{modelToControlFormatter:function(e){return e},controlToModelFormatter:function(e){return e}}),this.configFormatters=n,this},invalidateView:function(){return this.viewDirty=!0,this},render:function(){var t=this.controlConfig,n=null,r=null;if(this.viewDirty){var i=this.prepareContext(t);r=HandlebarsTemplates[this.templateId](i),this.$el.empty().append(r);var s=t.controlData.sliderData;s.max==s.min?(s.oldMax=s.max,s.max=s.max+.01):s.oldMax&&(s.max=s.oldMax),this.rangeList=this.setupRangeInput(this.$el,t);var o=this.$el.find(".rawRange");this.viewDirty=!1,this.rangeInput=o.eq(0).data("rangeinput"),this.initRangeControlBehaviour(o),o.bind("changeValue",e.proxy(this.inputChange_handler,this)),this.controlConfig.emptyValue&&(e(o).focusin(e.proxy(this.clearValue,this)),e(o).focusout(e.proxy(this.restoreValue,this)))}return n=this.model.get(t.name),this.setControlValue(n),this},clearValue:function(t){e(t.target).val("")},restoreValue:function(t){var n=this.model.get(this.controlConfig.name);e(t.target).val(this.controlConfig.formatter(n))},prepareContext:function(e){var t={};return t.name=e.name,t.templateData=_.extend({},e.templateData),t.templateData.title=I18n.t(e.templateData.title),t},setControlValue:function(e){var t=this.configFormatters.modelToControlFormatter(e);this.rangeInput.suppressChangeValue(!0),this.rangeInput.setValue(t),this.rangeInput.suppressChangeValue(!1)},disable:function(e){var t=this.rangeInput.getInput(),n=this.rangeInput.getHandle();e?(t.attr("disabled","disabled"),n.attr("aria-disabled","true")):(t.removeAttr("disabled"),n.attr("aria-disabled","false"))},setValue:function(e){this.rangeInput.setValue(e)},getMaxValue:function(){var e=this.controlConfig,t=e.controlData.sliderData;return t.max},getMinValue:function(){var e=this.controlConfig,t=e.controlData.sliderData;return t.min},resetMaxValue:function(e){var t=this.controlConfig,n=t.controlData.sliderData;n.max=e,typeof n.oldMax!="undefined"&&delete n.oldMax;var r=this.model.get(t.name);r>e&&this.setValue(e)},resetMinValue:function(e){var t=this.controlConfig,n=t.controlData.sliderData;n.min=e;var r=this.model.get(t.name);r<e&&this.setValue(e)},inputChange_handler:function(e){var n=this.rangeInput.getValue(),r=n,i={};r=this.configFormatters.controlToModelFormatter(n),i[this.controlConfig.name]=r,this.model.set(i),this.dispatcher.trigger(t.Events.CONTROL_CHANGE,{name:this.controlConfig.name,value:r,control:this})},setupRangeInput:function(t,n){var r=t.find(".rawRange"),i=[],s=n.controlData,o=n.formatter,u=n.parser;return r.each(function(t,n){var r={formatValue:o,parseValue:u,progress:!0};e.extend(r,s.sliderData);var a=e(n).rangeinput(r);i.push(a)}),i},initRangeControlBehaviour:function(t){var n=function(e){var t=e.data.api;t.updateFromInput(e)},r=function(t){var n=e(this).parent().data("rangeinput");if(n.getInput().is(":disabled"))return;switch(t.keyCode){case 38:case 39:n.stepUp(),t.preventDefault();break;case 40:case 37:n.stepDown(),t.preventDefault();break;case 33:n.stepUp(10),t.preventDefault();break;case 34:n.stepDown(10),t.preventDefault()}},i=function(t){e(this).focus()},s=0,o=t.length,u=null,a=null,f=null,l=null,c=null;for(s=0;s<o;s++){u=t.eq(s),a=u.data("rangeinput"),f=a.getConf();var h=this.slider=u.prev(".slider");l=a.getHandle(),l.keydown(r),l.click(i),l.attr("role","slider"),l.attr("aria-valuemax",f.max),l.attr("aria-valuemin",f.min),l.attr("aria-label",u.prevAll("label").text()),l.attr("aria-valuenow",a.getValue()),u.bind("onSlide",function(e,t){a.getHandle().attr("aria-valuenow",t)}),c=a.getInput(),c.focusin(function(){e(this).select()}),u.bind("change",{api:a},n),this.controlConfig.sliderFirst!==!1&&(u.detach(),h.before(u));if(this.controlConfig.inputLabel){var p="<label>"+this.controlConfig.inputLabel+"</label>";this.controlConfig.sliderFirst!==!1?(u.after(p),this.controlConfig.inputLabelClass&&u.next("label").addClass(this.controlConfig.inputLabelClass)):(u.before(p),this.controlConfig.inputLabelClass&&u.prev("label").addClass(this.controlConfig.inputLabelClass))}var d=this.$el.find(".tooltip-container");if(d&&this.controlConfig.templateData.tooltipBeforeSlider){var v=d.detach();v.insertBefore(h)}var m=this.$el.find(".rangeInputLabel");if(m&&this.controlConfig.rangeInputLabelBeforeInput){var v=m.detach();v.insertBefore(u)}}}})}(jQuery),function(e){var t=gbst.module("gbst.loan.shared.view");t.Events={CONTROL_CHANGE:"view.controlchange"},t.RadiogroupView=Backbone.View.extend({templateId:null,model:null,dispatcher:null,controlConfig:null,viewDirty:!0,configFormatters:null,initialize:function(e){this.model=e.model,this.dispatcher=e.dispatcher,this.setControlConfig(e.controlConfig)},setControlConfig:function(e){this.controlConfig=e,this.templateId=this.controlConfig.templateId;var t=_.pick(e,["modelToControlFormatter","controlToModelFormatter"]);return _.defaults(t,{modelToControlFormatter:function(e){return e},controlToModelFormatter:function(e){return e}}),this.configFormatters=t,this},invalidateView:function(){return this.viewDirty=!0,this},render:function(){var t=this.controlConfig,n=null,r=null;if(this.viewDirty){var i=this.prepareContext(t);r=HandlebarsTemplates[this.templateId](i),this.$el.empty().append(r);var s=this.elements=this.$el.find("fieldset");t.templateData.vertical?s.buttonsetv():s.buttonset(),this.viewDirty=!1,s.bind("change",e.proxy(this.inputChange_handler,this))}return n=this.model.get(t.name),this.setControlValue(n),this},prepareContext:function(e){var t=_.extend({},e);return t.templateData=_.extend({},e.templateData),e.templateData.title&&(t.templateData.title=I18n.t(e.templateData.title)),e.templateData.legend&&(t.templateData.legend=I18n.t(e.templateData.legend)),t},refreshValue:function(){var e=this.model.get(this.controlConfig.name);this.setControlValue(e)},setControlValue:function(e){var t=this.configFormatters.modelToControlFormatter(e),n=this.$el.find(":radio");n.val([t]),n.button("refresh")},inputChange_handler:function(n){var r=e(n.target),i=r.val(),s=i;s=this.configFormatters.controlToModelFormatter(i);var o=this.controlConfig.name;this.model.set(o,s),this.dispatcher.trigger(t.Events.CONTROL_CHANGE,{name:o,value:s,control:this})}})}(jQuery),function(e){e.fn.buttonsetv=function(){e(":radio, :checkbox",this).wrap('<div style="margin: 1px"/>'),e(this).buttonset(),e("label:first",this).removeClass("ui-corner-left").addClass("ui-corner-top"),e("label:last",this).removeClass("ui-corner-right").addClass("ui-corner-bottom"),mw=0,e("label",this).each(function(t){w=e(this).width(),w>mw&&(mw=w)}),e("label",this).each(function(t){e(this).width(mw)})}}(jQuery),function(e){var t=gbst.module("gbst.loan.shared.view");t.Events={CONTROL_CHANGE:"view.controlchange"},t.StandardInputView=Backbone.View.extend({templateId:null,model:null,dispatcher:null,controlConfig:null,controlsInitialised:!1,input:null,initialize:function(t){this.model=t.model,this.dispatcher=e(t.dispatcher),this.controlConfig=t.controlConfig,this.templateId=this.controlConfig.templateId},render:function(){var t=this.controlConfig,n=null,r=null,i=null;if(!this.controlsInitialised){var s=this.prepareContext(t);i=HandlebarsTemplates[this.templateId](s),this.$el.append(i),this.suppressSliderChange(!0),this.rangeList=this.setupRangeInput(this.$el,t),this.suppressSliderChange(!1);var o=this.$el.find(":range");this.viewDirty=!1,this.rangeInput=o.eq(0).data("rangeinput"),this.initRangeControlBehaviour(o),o.bind("changeValue",e.proxy(this.inputChange_handler,this)),this.input=this.$el.find(":input"),this.controlConfig.emptyValue&&(e(this.input).focusin(e.proxy(this.clearValue,this)),e(this.input).focusout(e.proxy(this.restoreValue,this))),this.controlsInitialised=!0}n=this.model.get(t.name),this.setControlValue(n)},clearValue:function(t){e(t.target).val("")},restoreValue:function(t){e(t.target).val(this.model.get(this.controlConfig.name))},prepareContext:function(e){var t={};return t.name=e.name,t.templateData=_.extend({},e.templateData),e.templateData.disableTranslation||(t.templateData.title=I18n.t(e.templateData.title)),t.controlData=_.extend({},e.controlData),t},suppressSliderChange:function(e){this.ignoreChangeEvents=e,this.rangeInput&&this.rangeInput.suppressChangeValue(e)},setControlValue:function(e){var t=this.controlConfig.formatter,n=e;t&&_.isFunction(t)&&(n=t(e)),this.input.val(n),this.rangeInput.suppressChangeValue(!0),this.rangeInput.setValue(e),this.rangeInput.suppressChangeValue(!1)},inputChange_handler:function(e){var n=this.controlConfig.parser,r=this.input.val(),i={};n&&(r=n(r)),i[this.controlConfig.name]=r,this.model.set(i),this.dispatcher.trigger(t.Events.CONTROL_CHANGE,{name:this.controlConfig.name,value:r,control:this})},setupRangeInput:function(t,n){var r=t.find("input"),i=[],s=n.controlData,o=n.formatter,u=n.parser;return r.each(function(t,n){var r={formatValue:o,parseValue:u,progress:!0};e.extend(r,s.inputData);var a=e(n).rangeinput(r);i.push(a)}),i},initRangeControlBehaviour:function(t){var n=function(e){var t=e.data.api;t.updateFromInput(e)},r=function(e){var t=e.data.api,n=e.data.direction;return e.type!="mousedown"&&(n>0?t.stepUp():t.stepDown()),e.preventDefault(),!1},i=function(t){var n=e(this).parent().data("rangeinput");switch(t.keyCode){case 38:case 39:n.stepUp(),t.preventDefault();break;case 40:case 37:n.stepDown(),t.preventDefault();break;case 33:n.stepUp(10),t.preventDefault();break;case 34:n.stepDown(10),t.preventDefault()}},s=function(t){e(this).focus()},o=0,u=t.length,a=null,f=null,l=null,c=null,h=null,p=null,d=null,v=null;for(o=0;o<u;o++){f=t.eq(o),h=f.data("rangeinput"),p=h.getConf(),a=f.parent(),f.bind("change",{api:h},n),v=f.prev(".slider"),f.detach(),v.before(f),v.hide(),d=h.getHandle(),d.keydown(i),d.click(s),d.attr("role","slider"),d.attr("aria-valuemax",p.max),d.attr("aria-valuemin",p.min);var m=h.getInput();m.focusin(function(){e(this).select()});var g=a.find("div.spinner-button");g.detach(),v.before(g),l=a.find("input.minus-icon"),l.attr("title","Decrease the value by "+p.step),l.bind("click mousedown",{api:h,direction:-1},r),l.click(s),c=a.find("input.plus-icon"),c.attr("title","Increase the value by "+p.step),c.bind("click mousedown",{api:h,direction:1},r),c.click(s)}}})}(jQuery),function(e){var t=gbst.module("gbst.loan.shared.view");t.Events={CONTROL_CHANGE:"view.controlchange"},t.SelectmenuView=Backbone.View.extend({templateId:null,model:null,dispatcher:null,controlConfig:null,viewDirty:!0,input:null,events:{"change select":"inputChange_handler"},initialize:function(e){this.model=e.model,this.dispatcher=e.dispatcher,this.setControlConfig(e.controlConfig)},setControlConfig:function(e){return this.controlConfig=e,this.templateId=this.controlConfig.templateId,this},invalidateView:function(){return this.viewDirty=!0,this},render:function(){var e=this.controlConfig,t=null,n=this.input,r=!1,i=null;if(this.viewDirty){var s=this.prepareContext(e);i=HandlebarsTemplates[this.templateId](s),this.$el.empty().append(i),n=this.input=this.$el.find("select"),r=!0,t=this.model.get(e.name),(this.setControlValue(t)||r)&&n.selectmenu({label:I18n.t(e.templateData.title)}),this.viewDirty=!1}var o=n.next(),u=o.find(".ui-selectmenu-icon");return u.parent(".ui-selectmenu-icon-wrapper").length===0&&u.wrap('<div class="ui-selectmenu-icon-wrapper"></div>'),this},prepareContext:function(e){var t=_.extend({},e);return t.templateData=_.extend({},e.templateData),t.templateData.titleString=I18n.t(e.templateData.title),t},rebuild:function(t){var n=this.input.selectmenu("index");if(n===-1||n>=t.length)n=t.length-1;this.controlConfig.controlData.listData=t,this.input.empty();for(var r=0,i=t.length;r<i;r++)this.input.append(e("<option></option>").attr("value",t[r].value).text(t[r].label));var s=this.input.data("selectmenu");s&&(s.list.height("auto"),this.input.selectmenu(),this.input.selectmenu("index",n))},setControlValue:function(e){var t=this.input.val(),n=t!==e;return this.input.val([e]),n},inputChange_handler:function(e){var n=this.input.val(),r={};r[this.controlConfig.name]=n,this.model.set(r),this.dispatcher.trigger(t.Events.CONTROL_CHANGE,{name:this.controlConfig.name,value:n,control:this})}})}(jQuery);