(function(I,P){typeof exports=="object"&&typeof module<"u"?module.exports=P():typeof define=="function"&&define.amd?define(P):(I=typeof globalThis<"u"?globalThis:I||self,I.EhWebglFluid=P())})(this,function(){"use strict";function I(te,h,O,a){const v=te,Ae=h;let re=!0;O||yt(),a={IMMEDIATE:!1,TRIGGER:"hover",SIM_RESOLUTION:128,DYE_RESOLUTION:1024,CAPTURE_RESOLUTION:512,DENSITY_DISSIPATION:4,VELOCITY_DISSIPATION:.2,PRESSURE:.8,PRESSURE_ITERATIONS:20,CURL:30,SPLAT_RADIUS:.25,SPLAT_FORCE:6e3,SHADING:!0,COLORFUL:!0,COLOR_UPDATE_SPEED:10,PAUSED:!1,TRANSPARENT:!0,BLOOM:!0,BLOOM_ITERATIONS:8,BLOOM_RESOLUTION:256,BLOOM_INTENSITY:.8,BLOOM_THRESHOLD:.2,BLOOM_SOFT_KNEE:.7,SUNRAYS:!0,SUNRAYS_RESOLUTION:196,SUNRAYS_WEIGHT:1,EVENTS_CONTAINER:window,...a};let g=!1,ie=null;Ee();function k(){this.id=-1,this.texcoordX=0,this.texcoordY=0,this.prevTexcoordX=0,this.prevTexcoordY=0,this.deltaX=0,this.deltaY=0,this.down=!1,this.moved=!1,this.color=M()}let x=[],oe=[],N=[];x.push(new k);const{gl:t,ext:p}=_e(v);be()&&(a.DYE_RESOLUTION=512),p.supportLinearFiltering||(a.DYE_RESOLUTION=512,a.SHADING=!1,a.BLOOM=!1,a.SUNRAYS=!1);function _e(e){const i={alpha:!0,depth:!1,stencil:!1,antialias:!1,preserveDrawingBuffer:!1};let r=e.getContext("webgl2",i);const o=!!r;o||(r=e.getContext("webgl",i)||e.getContext("experimental-webgl",i));let n,s;o?(r.getExtension("EXT_color_buffer_float"),s=r.getExtension("OES_texture_float_linear")):(n=r.getExtension("OES_texture_half_float"),s=r.getExtension("OES_texture_half_float_linear")),r.clearColor(0,0,0,1);const u=o?r.HALF_FLOAT:n.HALF_FLOAT_OES;let f,c,_;return o?(f=b(r,r.RGBA16F,r.RGBA,u),c=b(r,r.RG16F,r.RG,u),_=b(r,r.R16F,r.RED,u)):(f=b(r,r.RGBA,r.RGBA,u),c=b(r,r.RGBA,r.RGBA,u),_=b(r,r.RGBA,r.RGBA,u)),{gl:r,ext:{formatRGBA:f,formatRG:c,formatR:_,halfFloatTexType:u,supportLinearFiltering:s}}}function b(e,i,r,o){if(!Oe(e,i,r,o))switch(i){case e.R16F:return b(e,e.RG16F,e.RG,o);case e.RG16F:return b(e,e.RGBA16F,e.RGBA,o);default:return null}return{internalFormat:i,format:r}}function Oe(e,i,r,o){let n=e.createTexture();e.bindTexture(e.TEXTURE_2D,n),e.texParameteri(e.TEXTURE_2D,e.TEXTURE_MIN_FILTER,e.NEAREST),e.texParameteri(e.TEXTURE_2D,e.TEXTURE_MAG_FILTER,e.NEAREST),e.texParameteri(e.TEXTURE_2D,e.TEXTURE_WRAP_S,e.CLAMP_TO_EDGE),e.texParameteri(e.TEXTURE_2D,e.TEXTURE_WRAP_T,e.CLAMP_TO_EDGE),e.texImage2D(e.TEXTURE_2D,0,i,4,4,0,r,o,null);let s=e.createFramebuffer();return e.bindFramebuffer(e.FRAMEBUFFER,s),e.framebufferTexture2D(e.FRAMEBUFFER,e.COLOR_ATTACHMENT0,e.TEXTURE_2D,n,0),e.checkFramebufferStatus(e.FRAMEBUFFER)==e.FRAMEBUFFER_COMPLETE}function be(){return/Mobi|Android/i.test(navigator.userAgent)}class ye{constructor(i,r){this.vertexShader=i,this.fragmentShaderSource=r,this.programs=[],this.activeProgram=null,this.uniforms=[]}setKeywords(i){let r=0;for(let n=0;n<i.length;n++)r+=Ot(i[n]);let o=this.programs[r];if(o==null){let n=d(t.FRAGMENT_SHADER,this.fragmentShaderSource,i);o=ne(this.vertexShader,n),this.programs[r]=o}o!=this.activeProgram&&(this.uniforms=ae(o),this.activeProgram=o)}bind(){t.useProgram(this.activeProgram)}}class E{constructor(i,r){this.uniforms={},this.program=ne(i,r),this.uniforms=ae(this.program)}bind(){t.useProgram(this.program)}}function ne(e,i){let r=t.createProgram();if(t.attachShader(r,e),t.attachShader(r,i),t.linkProgram(r),!t.getProgramParameter(r,t.LINK_STATUS))throw t.getProgramInfoLog(r);return r}function ae(e){let i=[],r=t.getProgramParameter(e,t.ACTIVE_UNIFORMS);for(let o=0;o<r;o++){let n=t.getActiveUniform(e,o).name;i[n]=t.getUniformLocation(e,n)}return i}function d(e,i,r){i=Le(i,r);const o=t.createShader(e);if(t.shaderSource(o,i),t.compileShader(o),!t.getShaderParameter(o,t.COMPILE_STATUS))throw t.getShaderInfoLog(o);return o}function Le(e,i){if(i==null)return e;let r="";return i.forEach(o=>{r+="#define "+o+`
`}),r+e}const R=d(t.VERTEX_SHADER,`
    precision highp float;
    attribute vec2 aPosition;
    varying vec2 vUv;
    varying vec2 vL;
    varying vec2 vR;
    varying vec2 vT;
    varying vec2 vB;
    uniform vec2 texelSize;
    void main () {
        vUv = aPosition * 0.5 + 0.5;
        vL = vUv - vec2(texelSize.x, 0.0);
        vR = vUv + vec2(texelSize.x, 0.0);
        vT = vUv + vec2(0.0, texelSize.y);
        vB = vUv - vec2(0.0, texelSize.y);
        gl_Position = vec4(aPosition, 0.0, 1.0);
    }
`),Ue=d(t.VERTEX_SHADER,`
    precision highp float;
    attribute vec2 aPosition;
    varying vec2 vUv;
    varying vec2 vL;
    varying vec2 vR;
    uniform vec2 texelSize;
    void main () {
        vUv = aPosition * 0.5 + 0.5;
        float offset = 1.33333333;
        vL = vUv - texelSize * offset;
        vR = vUv + texelSize * offset;
        gl_Position = vec4(aPosition, 0.0, 1.0);
    }
`),Ne=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying vec2 vUv;
    varying vec2 vL;
    varying vec2 vR;
    uniform sampler2D uTexture;
    void main () {
        vec4 sum = texture2D(uTexture, vUv) * 0.29411764;
        sum += texture2D(uTexture, vL) * 0.35294117;
        sum += texture2D(uTexture, vR) * 0.35294117;
        gl_FragColor = sum;
    }
`),we=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying highp vec2 vUv;
    uniform sampler2D uTexture;
    void main () {
        gl_FragColor = texture2D(uTexture, vUv);
    }
`),Fe=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying highp vec2 vUv;
    uniform sampler2D uTexture;
    uniform float value;
    void main () {
        gl_FragColor = value * texture2D(uTexture, vUv);
    }
`),Ie=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    uniform vec4 color;
    void main () {
        gl_FragColor = color;
    }
`),Pe=d(t.FRAGMENT_SHADER,a.TRANSPARENT?`
    precision highp float;
    precision highp sampler2D;
    varying vec2 vUv;
    uniform sampler2D uTexture;
    uniform float aspectRatio;
    #define SCALE 25.0
    void main () {
        vec2 uv = floor(vUv * SCALE * vec2(aspectRatio, 1.0));
        float v = mod(uv.x + uv.y, 2.0);
        v = v * 0.1 + 0.8;
        gl_FragColor = vec4(0.0, 0.0, 0.0, 0.0);
    }
`:`
    precision highp float;
    precision highp sampler2D;
    varying vec2 vUv;
    uniform sampler2D uTexture;
    uniform float aspectRatio;
    #define SCALE 25.0
    void main () {
        vec2 uv = floor(vUv * SCALE * vec2(aspectRatio, 1.0));
        float v = mod(uv.x + uv.y, 2.0);
        v = v * 0.1 + 0.8;
        gl_FragColor = vec4(vec3(v), 1.0);
    }
`),Ce=`
    precision highp float;
    precision highp sampler2D;
    varying vec2 vUv;
    varying vec2 vL;
    varying vec2 vR;
    varying vec2 vT;
    varying vec2 vB;
    uniform sampler2D uTexture;
    uniform sampler2D uBloom;
    uniform sampler2D uSunrays;
    uniform sampler2D uDithering;
    uniform vec2 ditherScale;
    uniform vec2 texelSize;
    vec3 linearToGamma (vec3 color) {
        color = max(color, vec3(0));
        return max(1.055 * pow(color, vec3(0.416666667)) - 0.055, vec3(0));
    }
    void main () {
        vec3 c = texture2D(uTexture, vUv).rgb;
    #ifdef SHADING
        vec3 lc = texture2D(uTexture, vL).rgb;
        vec3 rc = texture2D(uTexture, vR).rgb;
        vec3 tc = texture2D(uTexture, vT).rgb;
        vec3 bc = texture2D(uTexture, vB).rgb;
        float dx = length(rc) - length(lc);
        float dy = length(tc) - length(bc);
        vec3 n = normalize(vec3(dx, dy, length(texelSize)));
        vec3 l = vec3(0.0, 0.0, 1.0);
        float diffuse = clamp(dot(n, l) + 0.7, 0.7, 1.0);
        c *= diffuse;
    #endif
    #ifdef BLOOM
        vec3 bloom = texture2D(uBloom, vUv).rgb;
    #endif
    #ifdef SUNRAYS
        float sunrays = texture2D(uSunrays, vUv).r;
        c *= sunrays;
    #ifdef BLOOM
        bloom *= sunrays;
    #endif
    #endif
    #ifdef BLOOM
        float noise = texture2D(uDithering, vUv * ditherScale).r;
        noise = noise * 2.0 - 1.0;
        bloom += noise / 255.0;
        bloom = linearToGamma(bloom);
        c += bloom;
    #endif
        float a = max(c.r, max(c.g, c.b));
        gl_FragColor = vec4(c, a);
    }
`,Be=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying vec2 vUv;
    uniform sampler2D uTexture;
    uniform vec3 curve;
    uniform float threshold;
    void main () {
        vec3 c = texture2D(uTexture, vUv).rgb;
        float br = max(c.r, max(c.g, c.b));
        float rq = clamp(br - curve.x, 0.0, curve.y);
        rq = curve.z * rq * rq;
        c *= max(rq, br - threshold) / max(br, 0.0001);
        gl_FragColor = vec4(c, 0.0);
    }
`),Me=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying vec2 vL;
    varying vec2 vR;
    varying vec2 vT;
    varying vec2 vB;
    uniform sampler2D uTexture;
    void main () {
        vec4 sum = vec4(0.0);
        sum += texture2D(uTexture, vL);
        sum += texture2D(uTexture, vR);
        sum += texture2D(uTexture, vT);
        sum += texture2D(uTexture, vB);
        sum *= 0.25;
        gl_FragColor = sum;
    }
`),Xe=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying vec2 vL;
    varying vec2 vR;
    varying vec2 vT;
    varying vec2 vB;
    uniform sampler2D uTexture;
    uniform float intensity;
    void main () {
        vec4 sum = vec4(0.0);
        sum += texture2D(uTexture, vL);
        sum += texture2D(uTexture, vR);
        sum += texture2D(uTexture, vT);
        sum += texture2D(uTexture, vB);
        sum *= 0.25;
        gl_FragColor = sum * intensity;
    }
`),Ge=d(t.FRAGMENT_SHADER,`
    precision highp float;
    precision highp sampler2D;
    varying vec2 vUv;
    uniform sampler2D uTexture;
    void main () {
        vec4 c = texture2D(uTexture, vUv);
        float br = max(c.r, max(c.g, c.b));
        c.a = 1.0 - min(max(br * 20.0, 0.0), 0.8);
        gl_FragColor = c;
    }
`),ze=d(t.FRAGMENT_SHADER,`
    precision highp float;
    precision highp sampler2D;
    varying vec2 vUv;
    uniform sampler2D uTexture;
    uniform float weight;
    #define ITERATIONS 16
    void main () {
        float Density = 0.3;
        float Decay = 0.95;
        float Exposure = 0.7;
        vec2 coord = vUv;
        vec2 dir = vUv - 0.5;
        dir *= 1.0 / float(ITERATIONS) * Density;
        float illuminationDecay = 1.0;
        float color = texture2D(uTexture, vUv).a;
        for (int i = 0; i < ITERATIONS; i++)
        {
            coord -= dir;
            float col = texture2D(uTexture, coord).a;
            color += col * illuminationDecay * weight;
            illuminationDecay *= Decay;
        }
        gl_FragColor = vec4(color * Exposure, 0.0, 0.0, 1.0);
    }
`),Ye=d(t.FRAGMENT_SHADER,`
    precision highp float;
    precision highp sampler2D;
    varying vec2 vUv;
    uniform sampler2D uTarget;
    uniform float aspectRatio;
    uniform vec3 color;
    uniform vec2 point;
    uniform float radius;
    void main () {
        vec2 p = vUv - point.xy;
        p.x *= aspectRatio;
        vec3 splat = exp(-dot(p, p) / radius) * color;
        vec3 base = texture2D(uTarget, vUv).xyz;
        gl_FragColor = vec4(base + splat, 1.0);
    }
`),He=d(t.FRAGMENT_SHADER,`
    precision highp float;
    precision highp sampler2D;
    varying vec2 vUv;
    uniform sampler2D uVelocity;
    uniform sampler2D uSource;
    uniform vec2 texelSize;
    uniform vec2 dyeTexelSize;
    uniform float dt;
    uniform float dissipation;
    vec4 bilerp (sampler2D sam, vec2 uv, vec2 tsize) {
        vec2 st = uv / tsize - 0.5;
        vec2 iuv = floor(st);
        vec2 fuv = fract(st);
        vec4 a = texture2D(sam, (iuv + vec2(0.5, 0.5)) * tsize);
        vec4 b = texture2D(sam, (iuv + vec2(1.5, 0.5)) * tsize);
        vec4 c = texture2D(sam, (iuv + vec2(0.5, 1.5)) * tsize);
        vec4 d = texture2D(sam, (iuv + vec2(1.5, 1.5)) * tsize);
        return mix(mix(a, b, fuv.x), mix(c, d, fuv.x), fuv.y);
    }
    void main () {
    #ifdef MANUAL_FILTERING
        vec2 coord = vUv - dt * bilerp(uVelocity, vUv, texelSize).xy * texelSize;
        vec4 result = bilerp(uSource, coord, dyeTexelSize);
    #else
        vec2 coord = vUv - dt * texture2D(uVelocity, vUv).xy * texelSize;
        vec4 result = texture2D(uSource, coord);
    #endif
        float decay = 1.0 + dissipation * dt;
        gl_FragColor = result / decay;
    }`,p.supportLinearFiltering?null:["MANUAL_FILTERING"]),Ve=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying highp vec2 vUv;
    varying highp vec2 vL;
    varying highp vec2 vR;
    varying highp vec2 vT;
    varying highp vec2 vB;
    uniform sampler2D uVelocity;
    void main () {
        float L = texture2D(uVelocity, vL).x;
        float R = texture2D(uVelocity, vR).x;
        float T = texture2D(uVelocity, vT).y;
        float B = texture2D(uVelocity, vB).y;
        vec2 C = texture2D(uVelocity, vUv).xy;
        if (vL.x < 0.0) { L = -C.x; }
        if (vR.x > 1.0) { R = -C.x; }
        if (vT.y > 1.0) { T = -C.y; }
        if (vB.y < 0.0) { B = -C.y; }
        float div = 0.5 * (R - L + T - B);
        gl_FragColor = vec4(div, 0.0, 0.0, 1.0);
    }
`),We=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying highp vec2 vUv;
    varying highp vec2 vL;
    varying highp vec2 vR;
    varying highp vec2 vT;
    varying highp vec2 vB;
    uniform sampler2D uVelocity;
    void main () {
        float L = texture2D(uVelocity, vL).y;
        float R = texture2D(uVelocity, vR).y;
        float T = texture2D(uVelocity, vT).x;
        float B = texture2D(uVelocity, vB).x;
        float vorticity = R - L - T + B;
        gl_FragColor = vec4(0.5 * vorticity, 0.0, 0.0, 1.0);
    }
`),ke=d(t.FRAGMENT_SHADER,`
    precision highp float;
    precision highp sampler2D;
    varying vec2 vUv;
    varying vec2 vL;
    varying vec2 vR;
    varying vec2 vT;
    varying vec2 vB;
    uniform sampler2D uVelocity;
    uniform sampler2D uCurl;
    uniform float curl;
    uniform float dt;
    void main () {
        float L = texture2D(uCurl, vL).x;
        float R = texture2D(uCurl, vR).x;
        float T = texture2D(uCurl, vT).x;
        float B = texture2D(uCurl, vB).x;
        float C = texture2D(uCurl, vUv).x;
        vec2 force = 0.5 * vec2(abs(T) - abs(B), abs(R) - abs(L));
        force /= length(force) + 0.0001;
        force *= curl * C;
        force.y *= -1.0;
        vec2 vel = texture2D(uVelocity, vUv).xy;
        gl_FragColor = vec4(vel + force * dt, 0.0, 1.0);
    }
`),Ke=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying highp vec2 vUv;
    varying highp vec2 vL;
    varying highp vec2 vR;
    varying highp vec2 vT;
    varying highp vec2 vB;
    uniform sampler2D uPressure;
    uniform sampler2D uDivergence;
    void main () {
        float L = texture2D(uPressure, vL).x;
        float R = texture2D(uPressure, vR).x;
        float T = texture2D(uPressure, vT).x;
        float B = texture2D(uPressure, vB).x;
        float C = texture2D(uPressure, vUv).x;
        float divergence = texture2D(uDivergence, vUv).x;
        float pressure = (L + R + B + T - divergence) * 0.25;
        gl_FragColor = vec4(pressure, 0.0, 0.0, 1.0);
    }
`),qe=d(t.FRAGMENT_SHADER,`
    precision mediump float;
    precision mediump sampler2D;
    varying highp vec2 vUv;
    varying highp vec2 vL;
    varying highp vec2 vR;
    varying highp vec2 vT;
    varying highp vec2 vB;
    uniform sampler2D uPressure;
    uniform sampler2D uVelocity;
    void main () {
        float L = texture2D(uPressure, vL).x;
        float R = texture2D(uPressure, vR).x;
        float T = texture2D(uPressure, vT).x;
        float B = texture2D(uPressure, vB).x;
        vec2 velocity = texture2D(uVelocity, vUv).xy;
        velocity.xy -= vec2(R - L, T - B);
        gl_FragColor = vec4(velocity, 0.0, 1.0);
    }
`),m=(()=>(t.bindBuffer(t.ARRAY_BUFFER,t.createBuffer()),t.bufferData(t.ARRAY_BUFFER,new Float32Array([-1,-1,-1,1,1,1,1,-1]),t.STATIC_DRAW),t.bindBuffer(t.ELEMENT_ARRAY_BUFFER,t.createBuffer()),t.bufferData(t.ELEMENT_ARRAY_BUFFER,new Uint16Array([0,1,2,0,2,3]),t.STATIC_DRAW),t.vertexAttribPointer(0,2,t.FLOAT,!1,0,0),t.enableVertexAttribArray(0),e=>{t.bindFramebuffer(t.FRAMEBUFFER,e),t.drawElements(t.TRIANGLES,6,t.UNSIGNED_SHORT,0)}))();let T,l,K,q,y,j,X,ue,se=Qe(Ae);const C=new E(Ue,Ne),le=new E(R,we),$=new E(R,Fe),ce=new E(R,Ie),fe=new E(R,Pe),G=new E(R,Be),B=new E(R,Me),z=new E(R,Xe),ve=new E(R,Ge),J=new E(R,ze),L=new E(R,Ye),S=new E(R,He),Q=new E(R,Ve),Z=new E(R,We),F=new E(R,ke),Y=new E(R,Ke),H=new E(R,qe),U=new ye(R,Ce);function me(){let e=W(a.SIM_RESOLUTION),i=W(a.DYE_RESOLUTION);const r=p.halfFloatTexType,o=p.formatRGBA,n=p.formatRG,s=p.formatR,u=p.supportLinearFiltering?t.LINEAR:t.NEAREST;T==null?T=ee(i.width,i.height,o.internalFormat,o.format,r,u):T=he(T,i.width,i.height,o.internalFormat,o.format,r,u),l==null?l=ee(e.width,e.height,n.internalFormat,n.format,r,u):l=he(l,e.width,e.height,n.internalFormat,n.format,r,u),K=D(e.width,e.height,s.internalFormat,s.format,r,t.NEAREST),q=D(e.width,e.height,s.internalFormat,s.format,r,t.NEAREST),y=ee(e.width,e.height,s.internalFormat,s.format,r,t.NEAREST),je(),$e()}function je(){let e=W(a.BLOOM_RESOLUTION);const i=p.halfFloatTexType,r=p.formatRGBA,o=p.supportLinearFiltering?t.LINEAR:t.NEAREST;j=D(e.width,e.height,r.internalFormat,r.format,i,o),N.length=0;for(let n=0;n<a.BLOOM_ITERATIONS;n++){let s=e.width>>n+1,u=e.height>>n+1;if(s<2||u<2)break;let f=D(s,u,r.internalFormat,r.format,i,o);N.push(f)}}function $e(){let e=W(a.SUNRAYS_RESOLUTION);const i=p.halfFloatTexType,r=p.formatR,o=p.supportLinearFiltering?t.LINEAR:t.NEAREST;X=D(e.width,e.height,r.internalFormat,r.format,i,o),ue=D(e.width,e.height,r.internalFormat,r.format,i,o)}function D(e,i,r,o,n,s){t.activeTexture(t.TEXTURE0);let u=t.createTexture();t.bindTexture(t.TEXTURE_2D,u),t.texParameteri(t.TEXTURE_2D,t.TEXTURE_MIN_FILTER,s),t.texParameteri(t.TEXTURE_2D,t.TEXTURE_MAG_FILTER,s),t.texParameteri(t.TEXTURE_2D,t.TEXTURE_WRAP_S,t.CLAMP_TO_EDGE),t.texParameteri(t.TEXTURE_2D,t.TEXTURE_WRAP_T,t.CLAMP_TO_EDGE),t.texImage2D(t.TEXTURE_2D,0,r,e,i,0,o,n,null);let f=t.createFramebuffer();t.bindFramebuffer(t.FRAMEBUFFER,f),t.framebufferTexture2D(t.FRAMEBUFFER,t.COLOR_ATTACHMENT0,t.TEXTURE_2D,u,0),t.viewport(0,0,e,i),t.clear(t.COLOR_BUFFER_BIT);let c=1/e,_=1/i;return{texture:u,fbo:f,width:e,height:i,texelSizeX:c,texelSizeY:_,attach(w){return t.activeTexture(t.TEXTURE0+w),t.bindTexture(t.TEXTURE_2D,u),w}}}function ee(e,i,r,o,n,s){let u=D(e,i,r,o,n,s),f=D(e,i,r,o,n,s);return{width:e,height:i,texelSizeX:u.texelSizeX,texelSizeY:u.texelSizeY,get read(){return u},set read(c){u=c},get write(){return f},set write(c){f=c},swap(){let c=u;u=f,f=c}}}function Je(e,i,r,o,n,s,u){let f=D(i,r,o,n,s,u);return le.bind(),t.uniform1i(le.uniforms.uTexture,e.attach(0)),m(f.fbo),f}function he(e,i,r,o,n,s,u){return e.width==i&&e.height==r||(e.read=Je(e.read,i,r,o,n,s,u),e.write=D(i,r,o,n,s,u),e.width=i,e.height=r,e.texelSizeX=1/i,e.texelSizeY=1/r),e}function Qe(e){let i=t.createTexture();t.bindTexture(t.TEXTURE_2D,i),t.texParameteri(t.TEXTURE_2D,t.TEXTURE_MIN_FILTER,t.LINEAR),t.texParameteri(t.TEXTURE_2D,t.TEXTURE_MAG_FILTER,t.LINEAR),t.texParameteri(t.TEXTURE_2D,t.TEXTURE_WRAP_S,t.REPEAT),t.texParameteri(t.TEXTURE_2D,t.TEXTURE_WRAP_T,t.REPEAT),t.texImage2D(t.TEXTURE_2D,0,t.RGB,1,1,0,t.RGB,t.UNSIGNED_BYTE,new Uint8Array([255,255,255]));let r={texture:i,width:1,height:1,attach(n){return t.activeTexture(t.TEXTURE0+n),t.bindTexture(t.TEXTURE_2D,i),n}},o=new Image;return o.onload=()=>{r.width=o.width,r.height=o.height,t.bindTexture(t.TEXTURE_2D,i),t.texImage2D(t.TEXTURE_2D,0,t.RGB,t.RGB,t.UNSIGNED_BYTE,o)},o.src=e,r}function Ze(){let e=[];a.SHADING&&e.push("SHADING"),a.BLOOM&&e.push("BLOOM"),a.SUNRAYS&&e.push("SUNRAYS"),U.setKeywords(e)}Ze(),me(),a.IMMEDIATE&&pe(parseInt(Math.random()*20)+5);let de=Date.now(),V=0;Te(),Rt(),a.IMMEDIATE&&setTimeout(()=>{g=!0,setTimeout(()=>{g=!1,Re(null)},2e3)},2500);function Te(){if(requestAnimationFrame(Te),!re||!g)return;const e=et();Ee()&&me(),tt(e),rt(),a.PAUSED||it(e),Re(null)}function et(){let e=Date.now(),i=(e-de)/1e3;return i=Math.min(i,.016666),de=e,i}function Ee(){let e=A(v.clientWidth),i=A(v.clientHeight);return v.width!=e||v.height!=i?(v.width=e,v.height=i,!0):!1}function tt(e){!a.COLORFUL||(V+=e*a.COLOR_UPDATE_SPEED,V>=1&&(V=At(V,0,1),x.forEach(i=>{i.color=M()})))}function rt(){oe.length>0&&pe(oe.pop()),x.forEach(e=>{e.moved&&(e.moved=!1,ct(e))})}function it(e){t.disable(t.BLEND),t.viewport(0,0,l.width,l.height),Z.bind(),t.uniform2f(Z.uniforms.texelSize,l.texelSizeX,l.texelSizeY),t.uniform1i(Z.uniforms.uVelocity,l.read.attach(0)),m(q.fbo),F.bind(),t.uniform2f(F.uniforms.texelSize,l.texelSizeX,l.texelSizeY),t.uniform1i(F.uniforms.uVelocity,l.read.attach(0)),t.uniform1i(F.uniforms.uCurl,q.attach(1)),t.uniform1f(F.uniforms.curl,a.CURL),t.uniform1f(F.uniforms.dt,e),m(l.write.fbo),l.swap(),Q.bind(),t.uniform2f(Q.uniforms.texelSize,l.texelSizeX,l.texelSizeY),t.uniform1i(Q.uniforms.uVelocity,l.read.attach(0)),m(K.fbo),$.bind(),t.uniform1i($.uniforms.uTexture,y.read.attach(0)),t.uniform1f($.uniforms.value,a.PRESSURE),m(y.write.fbo),y.swap(),Y.bind(),t.uniform2f(Y.uniforms.texelSize,l.texelSizeX,l.texelSizeY),t.uniform1i(Y.uniforms.uDivergence,K.attach(0));for(let r=0;r<a.PRESSURE_ITERATIONS;r++)t.uniform1i(Y.uniforms.uPressure,y.read.attach(1)),m(y.write.fbo),y.swap();H.bind(),t.uniform2f(H.uniforms.texelSize,l.texelSizeX,l.texelSizeY),t.uniform1i(H.uniforms.uPressure,y.read.attach(0)),t.uniform1i(H.uniforms.uVelocity,l.read.attach(1)),m(l.write.fbo),l.swap(),S.bind(),t.uniform2f(S.uniforms.texelSize,l.texelSizeX,l.texelSizeY),p.supportLinearFiltering||t.uniform2f(S.uniforms.dyeTexelSize,l.texelSizeX,l.texelSizeY);let i=l.read.attach(0);t.uniform1i(S.uniforms.uVelocity,i),t.uniform1i(S.uniforms.uSource,i),t.uniform1f(S.uniforms.dt,e),t.uniform1f(S.uniforms.dissipation,a.VELOCITY_DISSIPATION),m(l.write.fbo),l.swap(),t.viewport(0,0,T.width,T.height),p.supportLinearFiltering||t.uniform2f(S.uniforms.dyeTexelSize,T.texelSizeX,T.texelSizeY),t.uniform1i(S.uniforms.uVelocity,l.read.attach(0)),t.uniform1i(S.uniforms.uSource,T.read.attach(1)),t.uniform1f(S.uniforms.dissipation,a.DENSITY_DISSIPATION),m(T.write.fbo),T.swap()}function Re(e){a.BLOOM&&ut(T.read,j),a.SUNRAYS&&(st(T.read,T.write,X),lt(X,ue,1)),e==null||!a.TRANSPARENT?(t.blendFunc(t.ONE,t.ONE_MINUS_SRC_ALPHA),t.enable(t.BLEND)):t.disable(t.BLEND);let i=e==null?t.drawingBufferWidth:e.width,r=e==null?t.drawingBufferHeight:e.height;t.viewport(0,0,i,r);let o=e==null?null:e.fbo;a.TRANSPARENT||ot(o,Dt(a.BACK_COLOR)),e==null&&a.TRANSPARENT&&nt(o),at(o,i,r)}function ot(e,i){ce.bind(),t.uniform4f(ce.uniforms.color,i.r,i.g,i.b,1),m(e)}function nt(e){fe.bind(),t.uniform1f(fe.uniforms.aspectRatio,v.width/v.height),m(e)}function at(e,i,r){if(U.bind(),a.SHADING&&t.uniform2f(U.uniforms.texelSize,1/i,1/r),t.uniform1i(U.uniforms.uTexture,T.read.attach(0)),a.BLOOM){t.uniform1i(U.uniforms.uBloom,j.attach(1)),t.uniform1i(U.uniforms.uDithering,se.attach(2));let o=_t(se,i,r);t.uniform2f(U.uniforms.ditherScale,o.x,o.y)}a.SUNRAYS&&t.uniform1i(U.uniforms.uSunrays,X.attach(3)),m(e)}function ut(e,i){if(N.length<2)return;let r=i;t.disable(t.BLEND),G.bind();let o=a.BLOOM_THRESHOLD*a.BLOOM_SOFT_KNEE+1e-4,n=a.BLOOM_THRESHOLD-o,s=o*2,u=.25/o;t.uniform3f(G.uniforms.curve,n,s,u),t.uniform1f(G.uniforms.threshold,a.BLOOM_THRESHOLD),t.uniform1i(G.uniforms.uTexture,e.attach(0)),t.viewport(0,0,r.width,r.height),m(r.fbo),B.bind();for(let f=0;f<N.length;f++){let c=N[f];t.uniform2f(B.uniforms.texelSize,r.texelSizeX,r.texelSizeY),t.uniform1i(B.uniforms.uTexture,r.attach(0)),t.viewport(0,0,c.width,c.height),m(c.fbo),r=c}t.blendFunc(t.ONE,t.ONE),t.enable(t.BLEND);for(let f=N.length-2;f>=0;f--){let c=N[f];t.uniform2f(B.uniforms.texelSize,r.texelSizeX,r.texelSizeY),t.uniform1i(B.uniforms.uTexture,r.attach(0)),t.viewport(0,0,c.width,c.height),m(c.fbo),r=c}t.disable(t.BLEND),z.bind(),t.uniform2f(z.uniforms.texelSize,r.texelSizeX,r.texelSizeY),t.uniform1i(z.uniforms.uTexture,r.attach(0)),t.uniform1f(z.uniforms.intensity,a.BLOOM_INTENSITY),t.viewport(0,0,i.width,i.height),m(i.fbo)}function st(e,i,r){t.disable(t.BLEND),ve.bind(),t.uniform1i(ve.uniforms.uTexture,e.attach(0)),t.viewport(0,0,i.width,i.height),m(i.fbo),J.bind(),t.uniform1f(J.uniforms.weight,a.SUNRAYS_WEIGHT),t.uniform1i(J.uniforms.uTexture,i.attach(0)),t.viewport(0,0,r.width,r.height),m(r.fbo)}function lt(e,i,r){C.bind();for(let o=0;o<r;o++)t.uniform2f(C.uniforms.texelSize,e.texelSizeX,0),t.uniform1i(C.uniforms.uTexture,e.attach(0)),m(i.fbo),t.uniform2f(C.uniforms.texelSize,0,e.texelSizeY),t.uniform1i(C.uniforms.uTexture,i.attach(0)),m(e.fbo)}function ct(e){let i=e.deltaX*a.SPLAT_FORCE,r=e.deltaY*a.SPLAT_FORCE;xe(e.texcoordX,e.texcoordY,i,r,e.color)}function pe(e){for(let i=0;i<e;i++){const r=M();r.r*=10,r.g*=10,r.b*=10;const o=Math.random(),n=Math.random(),s=1e3*(Math.random()-.5),u=1e3*(Math.random()-.5);xe(o,n,s,u,r)}}function xe(e,i,r,o,n){t.viewport(0,0,l.width,l.height),L.bind(),t.uniform1i(L.uniforms.uTarget,l.read.attach(0)),t.uniform1f(L.uniforms.aspectRatio,v.width/v.height),t.uniform2f(L.uniforms.point,e,i),t.uniform3f(L.uniforms.color,r,o,0),t.uniform1f(L.uniforms.radius,ft(a.SPLAT_RADIUS/100)),m(l.write.fbo),l.swap(),t.viewport(0,0,T.width,T.height),t.uniform1i(L.uniforms.uTarget,T.read.attach(0)),t.uniform3f(L.uniforms.color,n.r,n.g,n.b),m(T.write.fbo),T.swap()}function ft(e){let i=v.width/v.height;return i>1&&(e*=i),e}function vt(e){g=!0;let i=A(e.offsetX),r=A(e.offsetY),o=x.find(n=>n.id==-1);o==null&&(o=new k),Se(o,-1,i,r),a.COLORFUL||(x[0].down=!0,x[0].color=M())}function mt(e){g=!0,clearTimeout(ie),ie=setTimeout(ht,2e3);const i=v.getBoundingClientRect(),r=e.clientX-i.left,o=e.clientY-i.top;let n=A(r),s=A(o);ge(x[0],n,s)}function ht(){g=!1}function dt(e){g=!0;const i=e.targetTouches;for(;i.length>=x.length;)x.push(new k);for(let r=0;r<i.length;r++){let o=A(i[r].clientX),n=A(i[r].clientY);Se(x[r+1],i[r].identifier,o,n)}}function Tt(e){g=!0;const i=e.targetTouches;for(let r=0;r<i.length;r++){let o=A(i[r].clientX),n=A(i[r].clientY);ge(x[r+1],o,n)}}function Et(e){const i=e.changedTouches;for(let r=0;r<i.length;r++){let o=x.find(n=>n.id==i[r].identifier);De(o)}g=!1}function Rt(){a.EVENTS_CONTAINER.addEventListener("mousedown",vt),a.EVENTS_CONTAINER.addEventListener("mousemove",mt),a.EVENTS_CONTAINER.addEventListener("mouseup",()=>{De(x[0]),g=!1}),a.EVENTS_CONTAINER.addEventListener("touchstart",dt,{passive:!0}),a.EVENTS_CONTAINER.addEventListener("touchmove",Tt,{passive:!0}),a.EVENTS_CONTAINER.addEventListener("touchend",Et,{passive:!0})}function Se(e,i,r,o){e.id=i,e.down=!0,e.moved=!1,e.texcoordX=r/v.width,e.texcoordY=1-o/v.height,e.prevTexcoordX=e.texcoordX,e.prevTexcoordY=e.texcoordY,e.deltaX=0,e.deltaY=0,e.color=M()}function ge(e,i,r){a.TRIGGER==="click"&&(e.moved=e.down),e.prevTexcoordX=e.texcoordX,e.prevTexcoordY=e.texcoordY,e.texcoordX=i/v.width,e.texcoordY=1-r/v.height,e.deltaX=pt(e.texcoordX-e.prevTexcoordX),e.deltaY=xt(e.texcoordY-e.prevTexcoordY),a.TRIGGER==="hover"&&(e.moved=Math.abs(e.deltaX)>0||Math.abs(e.deltaY)>0)}function De(e){e.down=!1}function pt(e){let i=v.width/v.height;return i<1&&(e*=i),e}function xt(e){let i=v.width/v.height;return i>1&&(e/=i),e}function M(){if(a.CUSTOM_COLOR)return gt(a.COLOR);{let e=St(Math.random(),1,1);return e.r*=.15,e.g*=.15,e.b*=.15,e}}function St(e,i,r){let o,n,s,u,f,c,_,w;switch(u=Math.floor(e*6),f=e*6-u,c=r*(1-i),_=r*(1-f*i),w=r*(1-(1-f)*i),u%6){case 0:o=r,n=w,s=c;break;case 1:o=_,n=r,s=c;break;case 2:o=c,n=r,s=w;break;case 3:o=c,n=_,s=r;break;case 4:o=w,n=c,s=r;break;case 5:o=r,n=c,s=_;break}return{r:o,g:n,b:s}}function gt(e){const i=parseInt(e.slice(1,3),16)/255*.15,r=parseInt(e.slice(3,5),16)/255*.15,o=parseInt(e.slice(5,7),16)/255*.15;return{r:i,g:r,b:o}}function Dt(e){return{r:e.r/255,g:e.g/255,b:e.b/255}}function At(e,i,r){let o=r-i;return o==0?i:(e-i)%o+i}function W(e){let i=t.drawingBufferWidth/t.drawingBufferHeight;i<1&&(i=1/i);let r=Math.round(e),o=Math.round(e*i);return t.drawingBufferWidth>t.drawingBufferHeight?{width:o,height:r}:{width:r,height:o}}function _t(e,i,r){return{x:i/e.width,y:r/e.height}}function A(e){let i=Math.min(2,window.devicePixelRatio);return Math.floor(e*i)}function Ot(e){if(e.length==0)return 0;let i=0;for(let r=0;r<e.length;r++)i=(i<<5)-i+e.charCodeAt(r),i|=0;return i}function bt(e,i){re=e[0].isIntersecting}function yt(){const e={root:null,rootMargin:"0px",threshold:.001};new IntersectionObserver(bt,e).observe(v.parentElement)}}class P{constructor(h){var O,a;this.container=h.container,this.sectionContainer=h.sectionContainer,this.eventsContainer=h.eventsContainer,this.canvasClass=h.canvasClass,this.wrapperClass=h.wrapperClass,this.invertColor=(O=h.invert_color)!=null?O:!1,this.isApplyToPage=(a=h.isApplyToPage)!=null?a:!1,this.fluidOptions=h.fluidOptions,this.ditheringTextureUrl=h.ditheringTextureUrl,this.createWrapper(),this.createCanvas(),this.checkColor(),this.isApplyToPage?(this.shouldRender=!0,this.initFluid()):this.initIntersectionObserver()}init(){this.initFluid()}createWrapper(){var h;(h=document.querySelector(`.${this.wrapperClass}`))==null||h.remove(),this.wrapper=document.createElement("div"),this.wrapper.classList.add(this.wrapperClass),this.isApplyToPage?document.body.append(this.wrapper):this.sectionContainer.insertAdjacentElement("beforebegin",this.wrapper)}createCanvas(){this.canvas=document.createElement("canvas"),this.canvas.classList.add(this.canvasClass),this.wrapper.appendChild(this.canvas)}checkColor(){this.fluidOptions.hasOwnProperty("COLOR")&&this.fluidOptions.COLOR.startsWith("#000000")&&(this.fluidOptions.COLOR="#ffffff",this.canvas.style.filter="invert(1)")}initFluid(){this.instance=I(this.canvas,this.ditheringTextureUrl,this.isApplyToPage,{SIM_RESOLUTION:128,DYE_RESOLUTION:1024,DENSITY_DISSIPATION:3,VELOCITY_DISSIPATION:.2,PRESSURE:.8,PRESSURE_ITERATIONS:20,CURL:30,SPLAT_FORCE:6e3,SHADING:!0,COLORFUL:!0,COLOR_UPDATE_SPEED:10,PAUSED:!1,BACK_COLOR:{r:0,g:0,b:0},TRANSPARENT:!0,BLOOM_ITERATIONS:8,BLOOM_RESOLUTION:128,BLOOM_INTENSITY:.1,BLOOM_THRESHOLD:.6,BLOOM_SOFT_KNEE:.8,SUNRAYS_RESOLUTION:196,SUNRAYS_WEIGHT:1,CUSTOM_COLOR:!1,COLOR:"#FD5A00",EVENTS_CONTAINER:this.eventsContainer,...this.fluidOptions})}destroy(){new Promise(h=>{var O;this.canvas=null,(O=document.querySelector(`.${this.wrapperClass}`))==null||O.remove(),h()})}onIntersection(h,O){h[0].isIntersecting&&(this.initFluid(),this.observer.unobserve(this.wrapper))}initIntersectionObserver(){const h={root:null,rootMargin:"0px",threshold:.001};this.observer=new IntersectionObserver(this.onIntersection.bind(this),h),this.observer.observe(this.wrapper)}}return P});
