(function(r,a){typeof exports=="object"&&typeof module<"u"?module.exports=a():typeof define=="function"&&define.amd?define(a):(r=typeof globalThis<"u"?globalThis:r||self,r.EhWebglKineticTypography=a())})(this,function(){"use strict";var St=Object.defineProperty;var Rt=(r,a,c)=>a in r?St(r,a,{enumerable:!0,configurable:!0,writable:!0,value:c}):r[a]=c;var o=(r,a,c)=>(Rt(r,typeof a!="symbol"?a+"":a,c),c);class r{constructor(e){o(this,"loadTexture",()=>new Promise(e=>{this.texture=this.loader.load(this.options.texture.image,t=>{t.minFilter=t.magFilter=THREE.LinearFilter,t.needsUpdate=!0,e()})}));o(this,"init",()=>{this.createGeometry(),this.createMaterial(),this.createMesh(),this.initEvents(),this.render(),this.onResize()});o(this,"createGeometry",()=>{switch(this.options.shape){case"sphere":this.geometry=new THREE.SphereGeometry(1,64,64);break;case"plane_square":this.geometry=new THREE.PlaneGeometry(2,2,100,100);break;case"plane_rectangle":this.geometry=new THREE.PlaneGeometry(2,1,100,100);break;case"torus":this.geometry=new THREE.TorusGeometry(1,.33,100,100);break;case"rectangle":this.geometry=new THREE.BoxGeometry(2,.66,.66,100,100,100);break;case"box":this.geometry=new THREE.BoxGeometry(1,1,1,64,64,64);break;case"knot":this.geometry=new THREE.TorusKnotGeometry(1,.33,768,3,4,3);break;case"knot_2":this.geometry=new THREE.TorusKnotGeometry(1,.33,768,3,1,3);break}});o(this,"createMaterial",()=>{this.material=new THREE.ShaderMaterial({uniforms:{uTime:{value:0},uTexture:{value:this.texture},uRepeat:{value:new THREE.Vector2(this.options.texture.repeatTextX,this.options.texture.repeatTextY)},uTextAnimate:{value:this.options.textAnimation.animate},uTextAnimationAxis:{value:this.options.textAnimation.axis},uTextAnimationDirection:{value:this.options.textAnimation.direction},uTextAnimationSpeed:{value:this.options.textAnimation.speed},uApplyFog:{value:this.options.mesh.applyFog},uFogFactor:{value:this.options.mesh.fogFactor},uFogColor:{value:new THREE.Color(this.options.mesh.fogColor)},uApplyFresnel:{value:this.options.mesh.applyFresnel},uFresnelFactor:{value:this.options.mesh.fresnelFactor},uFresnelColor:{value:new THREE.Color(this.options.mesh.fresnelColor)},uApplyTwist:{value:this.options.mesh.twist},uTwistFactor:{value:this.options.mesh.twistFactor},uApplyDisplacement:{value:this.options.mesh.displace},uDisplaceStrength:{value:this.options.mesh.displaceStrength},uDisplaceSpeed:{value:this.options.mesh.displaceSpeed},uApplySwirl:{value:this.options.mesh.swirl},uSwirlDirection:{value:this.options.mesh.swirlDirection},uSwirlFactor:{value:this.options.mesh.swirlFactor},uApplyWave:{value:this.options.mesh.wave},uApplyWaveShadow:{value:this.options.mesh.waveShadow},uWaveFreq:{value:this.options.mesh.waveFrequency},uWaveAmp:{value:this.options.mesh.waveAmplitude},uWaveSpeed:{value:this.options.mesh.waveSpeed}},transparent:!0,side:THREE.DoubleSide,depthTest:!0,fragmentShader:this.fragment,vertexShader:this.vertex})});o(this,"updateGeometry",()=>{this.createGeometry(),this.mesh.geometry=this.geometry,this.mesh.updateMatrix()});o(this,"lerp",(e,t,i)=>(1-i)*e+i*t);o(this,"onMouseMove",e=>{const t=this.isTouchDevice?e.touches[0].clientX:e.clientX,i=this.isTouchDevice?e.touches[0].clientY:e.clientY;this.mouse.x=t/this.width*2-1,this.mouse.y=-(i/this.height)*2+1});o(this,"render",()=>{if(requestAnimationFrame(this.render.bind(this)),!!this.shouldRender){if(this.material.uniforms.uTime.value=this.clock.getElapsedTime(),this.options.mouseEffects.moveEffect){const e=this.lerp(this.mesh.position.x,this.mouse.x*this.options.mouseEffects.mouseMoveFactor,this.options.mouseEffects.mouseMoveLerp),t=this.lerp(this.mesh.position.y,this.mouse.y*this.options.mouseEffects.mouseMoveFactor,this.options.mouseEffects.mouseMoveLerp);this.mesh.position.set(e,t,0)}this.renderer.render(this.scene,this.camera)}});o(this,"initEvents",()=>{window.addEventListener("resize",this.onResize),this.initMouseEvent(),this.applyToPage?this.shouldRender=!0:this.initIntersectionObserver()});o(this,"onResize",()=>{this.width=this.dom.offsetWidth,this.height=this.dom.offsetHeight,this.canvas.width=this.width,this.canvas.height=this.height,this.camera.aspect=this.width/this.height,this.camera.position.z=this.getCameraZoom(),this.camera.updateProjectionMatrix(),this.renderer.setSize(this.width,this.height)});if(this.options=e,this.dom=e.dom,this.canvas=e.canvas,this.applyToPage=e.applyToPage,this.width=this.dom.offsetWidth,this.height=this.dom.offsetHeight,this.cameraZoomSettings=e.zoom,this.isTouchDevice="ontouchstart"in window,this.renderer=new THREE.WebGLRenderer({canvas:this.canvas,antialias:!0,alpha:!0}),this.renderer.setPixelRatio(Math.max(window.devicePixelRatio,2)),this.renderer.setSize(this.width,this.height),this.camera=new THREE.PerspectiveCamera(70,this.width/this.height,.1,100),this.camera.position.set(0,0,this.getCameraZoom()),this.scene=new THREE.Scene,this.clock=new THREE.Clock,this.mouseEffectEventActive=!1,this.mouse={x:0,y:0},this.fragment=`
        uniform float uTime;
        uniform sampler2D uTexture;
        uniform vec2 uRepeat;
        uniform bool uTextAnimate;
        uniform float uTextAnimationAxis;
        uniform float uTextAnimationDirection;
        uniform float uTextAnimationSpeed;
        uniform bool uApplyFog;
        uniform float uFogFactor;
        uniform vec3 uFogColor;
        uniform bool uApplyFresnel;
        uniform float uFresnelFactor;
        uniform vec3 uFresnelColor;
        uniform bool uApplySwirl;
		uniform float uSwirlDirection;
        uniform float uSwirlFactor;
        uniform bool uApplyWaveShadow;
        uniform float uWaveFreq;
        uniform float uWaveAmp;
        uniform float uWaveSpeed;


        varying vec2 vUv;
        varying vec3 vPosition;
        varying vec3 vNormal;
        varying vec3 vEyeVector;
        varying float vWave;

        float map(float value, float min1, float max1, float min2, float max2) {
            return min2 + (value - min1) * (max2 - min2) / (max1 - min1);
        }

        void main(){

            vec2 uv = vUv;
            float fresnel = 1.;
            float fog = 1.;
            float shadow = 1.;


            if ( uTextAnimate) {

                if ( uTextAnimationAxis == 0. ) {

                    if(uApplySwirl) {
                        uv = fract(vUv * uRepeat + vec2(uTime * uTextAnimationSpeed * uTextAnimationDirection, sin(vUv.x * uSwirlFactor * uSwirlDirection)));
                    } else {
                        uv = fract( vUv * uRepeat + vec2(uTime * uTextAnimationSpeed * uTextAnimationDirection, 0.));
                    }

                } else {

                    if (uApplySwirl) {
                        uv = fract(vUv * uRepeat - vec2( sin(vUv.y * uSwirlFactor * uSwirlDirection) , uTime * uTextAnimationSpeed * uTextAnimationDirection));
                    } else {
                        uv = fract( vUv * uRepeat - vec2(0., uTime * uTextAnimationSpeed * uTextAnimationDirection));
                    }
                }
            } else {
				if (uApplySwirl) {
					uv = fract(vUv * uRepeat + vec2(sin( vUv.y * uSwirlFactor * uSwirlDirection), 0.) );
                } else {
					uv = fract( vUv * uRepeat );
				}
            }

            vec4 image = texture2D(uTexture, uv);

            if(uApplyFresnel) {
                fresnel = pow(1.+dot(vEyeVector,vNormal), uFresnelFactor);
                image.rgb = mix(uFresnelColor, image.rgb, fresnel);
            }

            if ( uApplyFog ) {
                fog = clamp(vPosition.z / uFogFactor, 0., 1.);
                image.rgb = mix(uFogColor, image.rgb, fog);
            }

            if ( uApplyWaveShadow ) {
                // float wave = vWave;
                // wave = map(wave, -1., 1., 0., 0.1);
                // shadow = 1. - wave;
                // image.rgb = image.rgb * shadow;
                float shadow = cos((vPosition.x - vPosition.y) * uWaveFreq - uTime * uWaveSpeed);
                image.rgb *= 0.9+shadow*.1;
            }

            gl_FragColor = image;

        }
        `,this.vertex=`
        uniform float uTime;
        uniform bool uApplyTwist;
        uniform float uTwistFactor;
        uniform bool uApplyDisplacement;
        uniform float uDisplaceSpeed;
        uniform float uDisplaceStrength;
        uniform bool uApplyFresnel;
        uniform bool uApplyWave;
        uniform float uWaveFreq;
        uniform float uWaveAmp;
        uniform float uWaveSpeed;

        varying vec2 vUv;
        varying vec3 vPosition;
        varying vec3 vNormal;
        varying vec3 vEyeVector;
        varying float vWave;

        mat4 rotation3d(vec3 axis, float angle) {
            axis = normalize(axis);
            float s = sin(angle);
            float c = cos(angle);
            float oc = 1.0 - c;

            return mat4(
              oc * axis.x * axis.x + c,           oc * axis.x * axis.y - axis.z * s,  oc * axis.z * axis.x + axis.y * s,  0.0,
              oc * axis.x * axis.y + axis.z * s,  oc * axis.y * axis.y + c,           oc * axis.y * axis.z - axis.x * s,  0.0,
              oc * axis.z * axis.x - axis.y * s,  oc * axis.y * axis.z + axis.x * s,  oc * axis.z * axis.z + c,           0.0,
              0.0,                                0.0,                                0.0,                                1.0
            );
          }

        vec3 rotate(vec3 v, vec3 axis, float angle) {
        return (rotation3d(axis, angle) * vec4(v, 1.0)).xyz;
        }

        // GLSL textureless classic 3D noise "cnoise", // with an RSL-style periodic variant "pnoise".
        // Author:  Stefan Gustavson (stefan.gustavson@liu.se)
        // Version: 2011-10-11
        //
        // Many thanks to Ian McEwan of Ashima Arts for the
        // ideas for permutation and gradient selection.
        //
        // Copyright (c) 2011 Stefan Gustavson. All rights reserved.
        // Distributed under the MIT license. See LICENSE file.
        // https://github.com/ashima/webgl-noise
        //

        vec3 mod289(vec3 x) {
            return x - floor(x * (1.0 / 289.0)) * 289.0;
        }
        vec4 mod289(vec4 x) {
            return x - floor(x * (1.0 / 289.0)) * 289.0;
        }
        vec4 permute(vec4 x) {
            return mod289(((x*34.0)+1.0)*x);
        }
        vec4 taylorInvSqrt(vec4 r) {
            return 1.79284291400159 - 0.85373472095314 * r;
        }
        vec3 fade(vec3 t) {
            return t*t*t*(t*(t*6.0-15.0)+10.0);
        }
        // Classic Perlin noise
        float cnoise(vec3 P) {
            vec3 Pi0 = floor(P); // Integer part for indexing

            vec3 Pi1 = Pi0 + vec3(1.0); // Integer part + 1

            Pi0 = mod289(Pi0);
            Pi1 = mod289(Pi1);
            vec3 Pf0 = fract(P); // Fractional part for interpolation

            vec3 Pf1 = Pf0 - vec3(1.0); // Fractional part - 1.0

            vec4 ix = vec4(Pi0.x, Pi1.x, Pi0.x, Pi1.x);
            vec4 iy = vec4(Pi0.yy, Pi1.yy);
            vec4 iz0 = Pi0.zzzz;
            vec4 iz1 = Pi1.zzzz;
            vec4 ixy = permute(permute(ix) + iy);
            vec4 ixy0 = permute(ixy + iz0);
            vec4 ixy1 = permute(ixy + iz1);
            vec4 gx0 = ixy0 * (1.0 / 7.0);
            vec4 gy0 = fract(floor(gx0) * (1.0 / 7.0)) - 0.5;
            gx0 = fract(gx0);
            vec4 gz0 = vec4(0.5) - abs(gx0) - abs(gy0);
            vec4 sz0 = step(gz0, vec4(0.0));
            gx0 -= sz0 * (step(0.0, gx0) - 0.5);
            gy0 -= sz0 * (step(0.0, gy0) - 0.5);
            vec4 gx1 = ixy1 * (1.0 / 7.0);
            vec4 gy1 = fract(floor(gx1) * (1.0 / 7.0)) - 0.5;
            gx1 = fract(gx1);
            vec4 gz1 = vec4(0.5) - abs(gx1) - abs(gy1);
            vec4 sz1 = step(gz1, vec4(0.0));
            gx1 -= sz1 * (step(0.0, gx1) - 0.5);
            gy1 -= sz1 * (step(0.0, gy1) - 0.5);
            vec3 g000 = vec3(gx0.x, gy0.x, gz0.x);
            vec3 g100 = vec3(gx0.y, gy0.y, gz0.y);
            vec3 g010 = vec3(gx0.z, gy0.z, gz0.z);
            vec3 g110 = vec3(gx0.w, gy0.w, gz0.w);
            vec3 g001 = vec3(gx1.x, gy1.x, gz1.x);
            vec3 g101 = vec3(gx1.y, gy1.y, gz1.y);
            vec3 g011 = vec3(gx1.z, gy1.z, gz1.z);
            vec3 g111 = vec3(gx1.w, gy1.w, gz1.w);
            vec4 norm0 = taylorInvSqrt(vec4(dot(g000, g000), dot(g010, g010), dot(g100, g100), dot(g110, g110)));
            g000 *= norm0.x;
            g010 *= norm0.y;
            g100 *= norm0.z;
            g110 *= norm0.w;
            vec4 norm1 = taylorInvSqrt(vec4(dot(g001, g001), dot(g011, g011), dot(g101, g101), dot(g111, g111)));
            g001 *= norm1.x;
            g011 *= norm1.y;
            g101 *= norm1.z;
            g111 *= norm1.w;
            float n000 = dot(g000, Pf0);
            float n100 = dot(g100, vec3(Pf1.x, Pf0.yz));
            float n010 = dot(g010, vec3(Pf0.x, Pf1.y, Pf0.z));
            float n110 = dot(g110, vec3(Pf1.xy, Pf0.z));
            float n001 = dot(g001, vec3(Pf0.xy, Pf1.z));
            float n101 = dot(g101, vec3(Pf1.x, Pf0.y, Pf1.z));
            float n011 = dot(g011, vec3(Pf0.x, Pf1.yz));
            float n111 = dot(g111, Pf1);
            vec3 fade_xyz = fade(Pf0);
            vec4 n_z = mix(vec4(n000, n100, n010, n110), vec4(n001, n101, n011, n111), fade_xyz.z);
            vec2 n_yz = mix(n_z.xy, n_z.zw, fade_xyz.y);
            float n_xyz = mix(n_yz.x, n_yz.y, fade_xyz.x);
            return 2.2 * n_xyz;
        }

        void main(){

            vUv = uv;
            vPosition = position;

            // Fresnel effect
            if ( uApplyFresnel) {
            //   vec4 worldPosition = vec4(1.);
              vNormal = normalize(normalMatrix*normal);
              vec4 worldPosition = modelMatrix * vec4( vPosition, 1.0);
              vEyeVector = normalize(worldPosition.xyz - cameraPosition);

            }

             // Twist effect
            if ( uApplyTwist ) {
                vec3 axis = vec3(1., 0., 0.);
                float twist = 0.1;
                float angle = vPosition.x * uTwistFactor;
                vPosition = rotate(vPosition, axis, angle);
            }

            // Displacement Effect
            if ( uApplyDisplacement) {
                float noise = cnoise(vec3(vPosition + uTime * uDisplaceSpeed ) * .2);
                vPosition = vPosition * (noise * pow(uDisplaceStrength, 2.0) + 1.);
            }

            // Wave Effect
            if( uApplyWave ) {
              vPosition.z += sin((vPosition.x - vPosition.y) * uWaveFreq - uTime * uWaveSpeed) * uWaveAmp;
              vWave = vPosition.z;
            }

            gl_Position = projectionMatrix * modelViewMatrix * vec4(vPosition, 1.0)  ;

        }
        `,this.options.texture.image)this.setTexture(this.options.texture.image),this.createGeometry(),this.createMaterial(),this.createMesh(),this.initEvents(),this.render(),this.onResize();else{console.error("Kinetic Shapes: No image defined");return}}setTexture(e){this.texture=new THREE.Texture(e),this.texture.minFilter=this.texture.magFilter=THREE.LinearFilter,this.texture.needsUpdate=!0}getCameraZoom(){if(!this.cameraZoomSettings)return 3;let e=this.cameraZoomSettings[BreakdanceFrontend.data.BASE_BREAKPOINT_ID]||3;return Object.keys(this.cameraZoomSettings).reverse().forEach(t=>{window.BreakdanceFrontend.utils.matchMedia(t)&&this.cameraZoomSettings[t]!=null&&(e=this.cameraZoomSettings[t])}),e}createMesh(){this.mesh=new THREE.Mesh(this.geometry,this.material),this.mesh.position.set(this.options.mesh.positionX,this.options.mesh.positionY,0),this.mesh.rotation.set(this.options.mesh.rotationX,this.options.mesh.rotationY,this.options.mesh.rotationZ),this.scene.add(this.mesh)}initMouseEvent(){this.options.mouseEffects.moveEffect&&!this.mouseEffectEventActive&&(this.mouseEffectEventActive=!0,this.isTouchDevice?this.options.eventsContainer.addEventListener("touchstart",this.onMouseMove):this.options.eventsContainer.addEventListener("mousemove",this.onMouseMove))}onIntersection(e,t){this.shouldRender=e[0].isIntersecting}initIntersectionObserver(){const e={root:null,rootMargin:"0px",threshold:.001};this.observer=new IntersectionObserver(this.onIntersection.bind(this),e),this.observer.observe(this.dom)}destroy(){this.observer&&this.observer.disconnect()}}const a=(n,e,t,i,s)=>(n-e)*(s-i)/(t-e)+i,c=n=>{if(!!n){if((n==null?void 0:n.color)!=""&&n[0]==="#")return n.slice(0,7);{const e=n.replace("var(","").replace(")","");return getComputedStyle(document.documentElement).getPropertyValue(e).replace(/ /g,"").slice(0,7)}}};class Pt{constructor(e){var i,s,l,h;this.options=e,this.sectionContainer=e.sectionContainer,this.applyToPage=e.applyToPage;const t=((h=(l=(s=(i=this.options)==null?void 0:i.shape)==null?void 0:s.image)==null?void 0:l.texture)==null?void 0:h.url)||this.options.placeholderImage;this.createMarkup(),this.loadImage(t).then(m=>{this.textureImage=m,this.setOptions(),this.createInstance()})}loadImage(e){return new Promise((t,i)=>{const s=new Image;s.crossOrigin="anonymous",s.src=e,s.onload=()=>t(s),s.onerror=l=>i(l)})}init(){this.createMarkup(),this.setOptions(),this.createInstance()}createMarkup(){var e;this.domWrapper=document.createElement("div"),this.domWrapper.classList.add(`eh-webgl-kinetic-typography-${this.options.id}`),(e=this.options)!=null&&e.apply_to_page?document.body.append(this.domWrapper):this.sectionContainer.insertAdjacentElement("beforebegin",this.domWrapper),this.canvas=document.createElement("canvas"),this.canvas.classList.add("eh-webgl-kinetic-typography__canvas"),this.domWrapper.append(this.canvas)}setOptions(){var i,s,l,h,m,u,f,v,p,x,g,d,y,w,T,E,z,F,b,A,P,S,R,_,M,C,W,D,H,I,k,U,G,L,q,O,Z,X,Y,B,V,j,K,N,$,J,Q,ee,te,ie,ae,se,re,ne,oe,ce,le,he,me,ue,fe,ve,pe,xe,ge,de,ye,we,Te,Ee,ze,Fe,be,Ae,Pe,Se,Re,_e,Me,Ce,We,De,He,Ie,ke,Ue,Ge,Le,qe,Oe,Ze,Xe,Ye,Be,Ve,je,Ke,Ne,$e,Je,Qe,et,tt,it,at,st,rt,nt,ot,ct,lt,ht,mt,ut,ft,vt,pt,xt,gt,dt,yt,wt,Tt,Et,zt,Ft,bt,At;let e=0,t=0;(h=(l=(s=(i=this.options)==null?void 0:i.shape)==null?void 0:s.transform)==null?void 0:l.position)!=null&&h.x&&(e=a((v=(f=(u=(m=this.options)==null?void 0:m.shape)==null?void 0:u.transform)==null?void 0:f.position)==null?void 0:v.x,0,100,-10,10)),(d=(g=(x=(p=this.options)==null?void 0:p.shape)==null?void 0:x.transform)==null?void 0:g.position)!=null&&d.y&&(t=a((E=(T=(w=(y=this.options)==null?void 0:y.shape)==null?void 0:w.transform)==null?void 0:T.position)==null?void 0:E.y,0,100,-10,10),t=t-t*2),this.instanceOptions={dom:this.domWrapper,eventsContainer:this.options.eventsContainer,applyToPage:this.applyToPage,canvas:this.canvas,shape:((F=(z=this.options)==null?void 0:z.shape)==null?void 0:F.shape_type)||"knot_2",zoom:(b=this.options)==null?void 0:b.camera_zoom,texture:{image:this.textureImage,repeatTextX:((S=(P=(A=this.options)==null?void 0:A.shape)==null?void 0:P.image)==null?void 0:S.repeat_x)||1,repeatTextY:((M=(_=(R=this.options)==null?void 0:R.shape)==null?void 0:_.image)==null?void 0:M.repeat_y)||1},textAnimation:{animate:((D=(W=(C=this.options)==null?void 0:C.shape)==null?void 0:W.image_animation)==null?void 0:D.enable)||!1,axis:((k=(I=(H=this.options)==null?void 0:H.shape)==null?void 0:I.image_animation)==null?void 0:k.axis)||0,direction:((L=(G=(U=this.options)==null?void 0:U.shape)==null?void 0:G.image_animation)==null?void 0:L.direction)||-1,speed:((Z=(O=(q=this.options)==null?void 0:q.shape)==null?void 0:O.image_animation)==null?void 0:Z.speed)||.1},mesh:{positionX:e,positionY:t,rotationX:(V=(B=(Y=(X=this.options)==null?void 0:X.shape)==null?void 0:Y.transform)==null?void 0:B.rotation_x)!=null&&V.number?THREE.MathUtils.degToRad(($=(N=(K=(j=this.options)==null?void 0:j.shape)==null?void 0:K.transform)==null?void 0:N.rotation_x)==null?void 0:$.number):0,rotationY:(te=(ee=(Q=(J=this.options)==null?void 0:J.shape)==null?void 0:Q.transform)==null?void 0:ee.rotation_y)!=null&&te.number?THREE.MathUtils.degToRad((re=(se=(ae=(ie=this.options)==null?void 0:ie.shape)==null?void 0:ae.transform)==null?void 0:se.rotation_y)==null?void 0:re.number):0,rotationZ:(le=(ce=(oe=(ne=this.options)==null?void 0:ne.shape)==null?void 0:oe.transform)==null?void 0:ce.rotation_z)!=null&&le.number?THREE.MathUtils.degToRad((fe=(ue=(me=(he=this.options)==null?void 0:he.shape)==null?void 0:me.transform)==null?void 0:ue.rotation_z)==null?void 0:fe.number):0,applyFog:((xe=(pe=(ve=this.options)==null?void 0:ve.effects)==null?void 0:pe.fog)==null?void 0:xe.enable)||!1,fogFactor:((ye=(de=(ge=this.options)==null?void 0:ge.effects)==null?void 0:de.fog)==null?void 0:ye.factor)||.1,fogColor:c((Ee=(Te=(we=this.options)==null?void 0:we.effects)==null?void 0:Te.fog)==null?void 0:Ee.color)||"#F9FAFB",applyFresnel:((be=(Fe=(ze=this.options)==null?void 0:ze.effects)==null?void 0:Fe.fresnel)==null?void 0:be.enable)||!1,fresnelFactor:((Se=(Pe=(Ae=this.options)==null?void 0:Ae.effects)==null?void 0:Pe.fresnel)==null?void 0:Se.factor)||1,fresnelColor:c((Me=(_e=(Re=this.options)==null?void 0:Re.effects)==null?void 0:_e.fresnel)==null?void 0:Me.color)||"#000000",twist:((De=(We=(Ce=this.options)==null?void 0:Ce.effects)==null?void 0:We.twist)==null?void 0:De.enable)||!1,twistFactor:((ke=(Ie=(He=this.options)==null?void 0:He.effects)==null?void 0:Ie.twist)==null?void 0:ke.factor)||.1,displace:((Le=(Ge=(Ue=this.options)==null?void 0:Ue.effects)==null?void 0:Ge.displacement)==null?void 0:Le.enable)||!1,displaceSpeed:((Ze=(Oe=(qe=this.options)==null?void 0:qe.effects)==null?void 0:Oe.displacement)==null?void 0:Ze.speed)||.1,displaceStrength:((Be=(Ye=(Xe=this.options)==null?void 0:Xe.effects)==null?void 0:Ye.displacement)==null?void 0:Be.strength)||1,swirl:((Ke=(je=(Ve=this.options)==null?void 0:Ve.effects)==null?void 0:je.swirl)==null?void 0:Ke.enable)||!1,swirlDirection:((Je=($e=(Ne=this.options)==null?void 0:Ne.effects)==null?void 0:$e.swirl)==null?void 0:Je.direction)||1,swirlFactor:((tt=(et=(Qe=this.options)==null?void 0:Qe.effects)==null?void 0:et.swirl)==null?void 0:tt.factor)||.1,wave:((st=(at=(it=this.options)==null?void 0:it.effects)==null?void 0:at.wave)==null?void 0:st.enable)||!1,waveShadow:((ot=(nt=(rt=this.options)==null?void 0:rt.effects)==null?void 0:nt.wave)==null?void 0:ot.shadow)||!1,waveFrequency:((ht=(lt=(ct=this.options)==null?void 0:ct.effects)==null?void 0:lt.wave)==null?void 0:ht.frequency)||1,waveAmplitude:((ft=(ut=(mt=this.options)==null?void 0:mt.effects)==null?void 0:ut.wave)==null?void 0:ft.amplitude)||.5,waveSpeed:((xt=(pt=(vt=this.options)==null?void 0:vt.effects)==null?void 0:pt.wave)==null?void 0:xt.speed)||1},mouseEffects:{moveEffect:((yt=(dt=(gt=this.options)==null?void 0:gt.effects)==null?void 0:dt.mouse)==null?void 0:yt.enable)||!1,mouseMoveFactor:((Et=(Tt=(wt=this.options)==null?void 0:wt.effects)==null?void 0:Tt.mouse)==null?void 0:Et.factor)||1,mouseMoveLerp:.05},isScallable:((Ft=(zt=this.options)==null?void 0:zt.shape)==null?void 0:Ft.isScallable)||!1,scaleFactor:((At=(bt=this.options)==null?void 0:bt.shape)==null?void 0:At.scale_factor)||3.2}}createInstance(){this.experience=new r(this.instanceOptions)}update(e){var s,l,h,m,u,f,v,p,x,g,d,y,w,T,E,z,F,b,A,P,S,R,_,M,C,W,D,H,I,k,U,G,L,q,O,Z,X,Y,B,V,j,K,N,$,J,Q,ee,te,ie,ae,se,re,ne,oe,ce,le,he,me,ue,fe,ve,pe,xe,ge,de,ye,we,Te,Ee,ze,Fe,be,Ae,Pe,Se,Re,_e,Me,Ce,We,De,He,Ie,ke,Ue,Ge,Le,qe,Oe,Ze,Xe,Ye,Be,Ve,je;if(Object.keys(e).length===0)return;this.experience.cameraZoomSettings=e.camera_zoom,this.experience.camera.position.z=this.experience.getCameraZoom(),(e==null?void 0:e.apply_to_page)!=this.applyToPage&&(this.applyToPage=e==null?void 0:e.apply_to_page,this.experience.applyToPage=this.applyToPage,this.domWrapper.remove(),this.applyToPage?(document.body.append(this.domWrapper),this.experience.destroy()):(this.sectionContainer.insertAdjacentElement("beforebegin",this.domWrapper),this.experience.destroy(),this.experience.initIntersectionObserver()),this.experience.mouseEffectEventActive&&(this.experience.options.eventsContainer.removeEventListener("mousemove",this.experience.onMouseMove),this.experience.options.eventsContainer=this.applyToPage?document:this.options.containerEl,this.experience.options.eventsContainer.addEventListener("mousemove",this.experience.onMouseMove))),this.experience.material.uniforms.uRepeat.value.x=((l=(s=e==null?void 0:e.shape)==null?void 0:s.image)==null?void 0:l.repeat_x)||1,this.experience.material.uniforms.uRepeat.value.y=((m=(h=e==null?void 0:e.shape)==null?void 0:h.image)==null?void 0:m.repeat_y)||1,this.experience.material.uniforms.uTextAnimate.value=((f=(u=e==null?void 0:e.shape)==null?void 0:u.image_animation)==null?void 0:f.enable)||!1,this.experience.material.uniforms.uTextAnimationAxis.value=((p=(v=e==null?void 0:e.shape)==null?void 0:v.image_animation)==null?void 0:p.axis)||0,this.experience.material.uniforms.uTextAnimationDirection.value=((g=(x=e==null?void 0:e.shape)==null?void 0:x.image_animation)==null?void 0:g.direction)||-1,this.experience.material.uniforms.uTextAnimationSpeed.value=((y=(d=e==null?void 0:e.shape)==null?void 0:d.image_animation)==null?void 0:y.speed)||.1,this.experience.material.uniforms.uApplyFog.value=((T=(w=e==null?void 0:e.effects)==null?void 0:w.fog)==null?void 0:T.enable)||!1,this.experience.material.uniforms.uFogFactor.value=((z=(E=e==null?void 0:e.effects)==null?void 0:E.fog)==null?void 0:z.factor)||.1,this.experience.material.uniforms.uApplyFresnel.value=((b=(F=e==null?void 0:e.effects)==null?void 0:F.fresnel)==null?void 0:b.enable)||!1,this.experience.material.uniforms.uFresnelFactor.value=((P=(A=e==null?void 0:e.effects)==null?void 0:A.fresnel)==null?void 0:P.factor)||1,this.experience.material.uniforms.uApplyTwist.value=((R=(S=e==null?void 0:e.effects)==null?void 0:S.twist)==null?void 0:R.enable)||!1,this.experience.material.uniforms.uTwistFactor.value=((M=(_=e==null?void 0:e.effects)==null?void 0:_.twist)==null?void 0:M.factor)||.1,this.experience.material.uniforms.uApplyDisplacement.value=((W=(C=e==null?void 0:e.effects)==null?void 0:C.displacement)==null?void 0:W.enable)||!1,this.experience.material.uniforms.uDisplaceStrength.value=((H=(D=e==null?void 0:e.effects)==null?void 0:D.displacement)==null?void 0:H.strength)||1,this.experience.material.uniforms.uDisplaceSpeed.value=((k=(I=e==null?void 0:e.effects)==null?void 0:I.displacement)==null?void 0:k.speed)||.1,this.experience.material.uniforms.uApplySwirl.value=((G=(U=e==null?void 0:e.effects)==null?void 0:U.swirl)==null?void 0:G.enable)||!1,this.experience.material.uniforms.uSwirlDirection.value=((q=(L=e==null?void 0:e.effects)==null?void 0:L.swirl)==null?void 0:q.direction)||1,this.experience.material.uniforms.uSwirlFactor.value=((Z=(O=e==null?void 0:e.effects)==null?void 0:O.swirl)==null?void 0:Z.factor)||.1,this.experience.material.uniforms.uApplyWave.value=((Y=(X=e==null?void 0:e.effects)==null?void 0:X.wave)==null?void 0:Y.enable)||!1,this.experience.material.uniforms.uApplyWaveShadow.value=((V=(B=e==null?void 0:e.effects)==null?void 0:B.wave)==null?void 0:V.shadow)||!1,this.experience.material.uniforms.uWaveFreq.value=((K=(j=e==null?void 0:e.effects)==null?void 0:j.wave)==null?void 0:K.frequency)||1,this.experience.material.uniforms.uWaveAmp.value=(($=(N=e==null?void 0:e.effects)==null?void 0:N.wave)==null?void 0:$.amplitude)||.5,this.experience.material.uniforms.uWaveSpeed.value=((Q=(J=e==null?void 0:e.effects)==null?void 0:J.wave)==null?void 0:Q.speed)||1,(te=(ee=e==null?void 0:e.effects)==null?void 0:ee.fog)!=null&&te.color?this.experience.material.uniforms.uFogColor.value=new THREE.Color(c((ae=(ie=e==null?void 0:e.effects)==null?void 0:ie.fog)==null?void 0:ae.color)):this.experience.material.uniforms.uFogColor.value=new THREE.Color("#F9FAFB"),(re=(se=e==null?void 0:e.effects)==null?void 0:se.fresnel)!=null&&re.color?this.experience.material.uniforms.uFresnelColor.value=new THREE.Color(c((oe=(ne=e==null?void 0:e.effects)==null?void 0:ne.fresnel)==null?void 0:oe.color)):this.experience.material.uniforms.uFresnelColor.value=new THREE.Color("#000000"),((ce=e==null?void 0:e.shape)==null?void 0:ce.shape_type)!==this.experience.options.shape&&(this.experience.options.shape=((le=e==null?void 0:e.shape)==null?void 0:le.shape_type)||"knot_2",this.experience.updateGeometry()),this.experience.options.texture.image=((ue=(me=(he=e==null?void 0:e.shape)==null?void 0:he.image)==null?void 0:me.texture)==null?void 0:ue.url)||this.options.placeholderImage,this.loadImage(this.experience.options.texture.image).then(Ke=>{this.experience.setTexture(Ke),this.experience.material.uniforms.uTexture.value=this.experience.texture});let t=0,i=0;(pe=(ve=(fe=e==null?void 0:e.shape)==null?void 0:fe.transform)==null?void 0:ve.position)!=null&&pe.x&&(t=a((de=(ge=(xe=e==null?void 0:e.shape)==null?void 0:xe.transform)==null?void 0:ge.position)==null?void 0:de.x,0,100,-10,10)),(Te=(we=(ye=e==null?void 0:e.shape)==null?void 0:ye.transform)==null?void 0:we.position)!=null&&Te.y&&(i=a((Fe=(ze=(Ee=e==null?void 0:e.shape)==null?void 0:Ee.transform)==null?void 0:ze.position)==null?void 0:Fe.y,0,100,-10,10),i=i-i*2),this.experience.mesh.position.set(t,i,0),this.experience.mesh.rotation.x=(Pe=(Ae=(be=e==null?void 0:e.shape)==null?void 0:be.transform)==null?void 0:Ae.rotation_x)!=null&&Pe.number?THREE.MathUtils.degToRad((_e=(Re=(Se=e==null?void 0:e.shape)==null?void 0:Se.transform)==null?void 0:Re.rotation_x)==null?void 0:_e.number):0,this.experience.mesh.rotation.y=(We=(Ce=(Me=e==null?void 0:e.shape)==null?void 0:Me.transform)==null?void 0:Ce.rotation_y)!=null&&We.number?THREE.MathUtils.degToRad((Ie=(He=(De=e==null?void 0:e.shape)==null?void 0:De.transform)==null?void 0:He.rotation_y)==null?void 0:Ie.number):0,this.experience.mesh.rotation.z=(Ge=(Ue=(ke=e==null?void 0:e.shape)==null?void 0:ke.transform)==null?void 0:Ue.rotation_z)!=null&&Ge.number?THREE.MathUtils.degToRad((Oe=(qe=(Le=e==null?void 0:e.shape)==null?void 0:Le.transform)==null?void 0:qe.rotation_z)==null?void 0:Oe.number):0,this.experience.options.mouseEffects.moveEffect=((Xe=(Ze=e==null?void 0:e.effects)==null?void 0:Ze.mouse)==null?void 0:Xe.enable)||!1,this.experience.options.mouseEffects.mouseMoveFactor=((Be=(Ye=e==null?void 0:e.effects)==null?void 0:Ye.mouse)==null?void 0:Be.factor)||1,this.experience.mouseEffectEventActive||this.experience.initMouseEvent(),this.experience.isScallable=((Ve=e==null?void 0:e.shape)==null?void 0:Ve.isScallable)||!1,this.experience.scaleFactor=((je=e==null?void 0:e.shape)==null?void 0:je.scale_factor)||3.2,this.experience.isScallable?this.experience.onResize():this.experience.mesh.scale.set(1,1,1)}onResize(){this.experience.onResize()}}return Pt});
