(()=>{var e={46942:(e,t)=>{var o;!function(){"use strict";var n={}.hasOwnProperty;function a(){for(var e="",t=0;t<arguments.length;t++){var o=arguments[t];o&&(e=r(e,i(o)))}return e}function i(e){if("string"==typeof e||"number"==typeof e)return e;if("object"!=typeof e)return"";if(Array.isArray(e))return a.apply(null,e);if(e.toString!==Object.prototype.toString&&!e.toString.toString().includes("[native code]"))return e.toString();var t="";for(var o in e)n.call(e,o)&&e[o]&&(t=r(t,o));return t}function r(e,t){return t?e?e+" "+t:e+t:e}e.exports?(a.default=a,e.exports=a):void 0===(o=function(){return a}.apply(t,[]))||(e.exports=o)}()}},t={};function o(n){var a=t[n];if(void 0!==a)return a.exports;var i=t[n]={exports:{}};return e[n](i,i.exports,o),i.exports}o.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return o.d(t,{a:t}),t},o.d=(e,t)=>{for(var n in t)o.o(t,n)&&!o.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{"use strict";const e=window.qf.blocks,t=window.React,n=window.qf.rendererCore,a=window.wp.data,i=window.lodash,r=window.emotion;var c=o(46942),l=o.n(c);const s=({attributes:e,isPreview:t})=>React.createElement("div",{className:l()("renderer-core-block-attachment",r.css`
					${"split-right"!==e.layout&&"split-left"!==e.layout&&`\n\t\t\t\t\tmax-width: ${e?.attachmentMaxWidth};\n\t\t\t\t\tmargin: auto;\n\t\t\t\t\ttext-align: center;\n\t\t\t\t\t`}
					overflow: hidden;
				`)},e.attachment&&e.attachment.url?React.createElement("img",{alt:"",src:e.attachment.url,className:l()("renderer-core-block-attachment__image",r.css`
							${"split-right"!==e.layout&&"split-left"!==e.layout&&`border-radius: ${e.attachmentBorderRadius};\n\t\t\t\t\t\t\t margin: auto;\n\t\t\t\t\t\t\t`}
						`)}):React.createElement(React.Fragment,null,t&&React.createElement("div",{className:"renderer-core-block-attachment__placeholder"},React.createElement("svg",{className:"renderer-core-block-attachment__placeholder-icon",focusable:"false",viewBox:"0 0 24 24",role:"presentation"},React.createElement("circle",{cx:"12",cy:"12",r:"3.2"}),React.createElement("path",{d:"M9 2L7.17 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2h-3.17L15 2H9zm3 15c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"}))))),m=({isSticky:e,buttonText:t,next:o,theme:a})=>{const i=(0,n.useMessages)(),c="ontouchstart"in window||navigator.maxTouchPoints>0||navigator.msMaxTouchPoints>0;return React.createElement("div",{className:l()("qf-welcome-screen-block__action-wrapper",{"is-sticky":e},r.css`
					& {
						display: flex;
						justify-content: center;
						align-items: center;
						margin-top: 20px;
					}
					// &.is-sticky {
					// 	position: absolute;
					// 	bottom: 0;
					// 	right: 0;
					// 	left: 0;
					// 	width: 100%;
					// 	background-color: rgba(0, 0, 0, 0.05);
					// 	box-shadow: rgba(0, 0, 0, 0.1) 0 -1px;
					// 	height: 70px;
					// 	display: flex;
					// 	align-items: center;
					// 	justify-content: center;

					// 	.qf-welcome-screen-block__action {
					// 		margin: 0 auto;
				`)},React.createElement("div",{className:"qf-welcome-screen-block__action"},React.createElement(n.Button,{theme:a,onClick:o},t)),React.createElement("div",{className:l()("qf-welcome-screen-block__action-helper-text",r.css`
						color: ${a.questionsColor};
						font-size: 12px;
					`)},!c&&React.createElement(n.HTMLParser,{value:i["label.hintText.enter"]})))},u={display:({attributes:e})=>{var o,c;const{isPreview:u,deviceWidth:d,editor:p}=(0,n.useFormContext)(),[h,f]=(0,t.useState)(!1),[b,w]=(0,t.useState)(!1),g=(0,n.useBlockTheme)(e.themeId),y=(0,t.useRef)(),v=(0,t.useRef)(),{goToBlock:x}=(0,a.useDispatch)("quillForms/renderer-core"),{walkPath:k}=(0,a.useSelect)((e=>({walkPath:e("quillForms/renderer-core").getWalkPath()})));(0,t.useEffect)((()=>(f(!0),()=>f(!1))),[]);let R=i.noop;return k[0]&&k[0].id&&"off"===p.mode&&(R=()=>x(k[0].id)),React.createElement("div",{className:r.css`
				height: 100%;
				position: relative;
				outline: none;
			`,ref:y,tabIndex:"0",onKeyDown:e=>{"Enter"===e.key&&(e.stopPropagation(),R())}},React.createElement("div",{className:l()("qf-welcome-screen-block__wrapper","blocktype-welcome-screen-block",`renderer-core-block-${e?.layout}-layout`,{"with-sticky-footer":b,active:h},r.css`
						& {
							position: absolute;
							top: 0;
							left: 0;
							right: 0;
							bottom: 0;
							z-index: 6;
							display: flex;
							${("stack"===e.layout||"mobile"===d&&("float-left"===e.layout||"float-right"===e.layout))&&"flex-direction: column;\n\t\t\t\t\t\t\t.qf-welcome-screen-block__content-wrapper {\n\n\t\t\t\t\t\t\t\tposition: absolute;\n\t\t\t\t\t\t\t\ttop: 0;\n\t\t\t\t\t\t\t\tright: 0;\n\t\t\t\t\t\t\t\tleft: 0;\n\t\t\t\t\t\t\t}"}
							justify-content: center;
							width: 100%;
							height: 100%;
							overflow-y: auto;
							opacity: 0;
							visibility: hidden;
							transition: all 0.4s ease-in-out;
							-webkit-transition: all 0.4s ease-in-out;
							-moz-transition: all 0.4s ease-in-out;
						}

						&.active {
							opacity: 1;
							visibility: visible;
						}
						// &.with-sticky-footer {
						// 	display: block;
						// 	.qf-welcome-screen-block__content-wrapper {
						// 		height: calc(100% - 70px);

						// 	}
						// }
						.qf-welcome-screen-block__content-wrapper {
							display: flex;
							flex-direction: column;
							justify-content: center;
							max-width: 700px;
							padding: 30px;
							word-wrap: break-word;
							text-align: center;
							margin-right: auto;
							margin-left: auto;
							min-height: 100%;
						}
					`)},React.createElement("div",{className:"qf-welcome-screen-block__content-wrapper"},React.createElement("div",{className:"qf-welcome-screen-block__content",ref:v},("stack"===e.layout||"mobile"===d&&("float-left"===e.layout||"float-right"===e.layout))&&React.createElement(s,{isPreview:u,attributes:e}),React.createElement("div",{className:r.css`
								margin-top: 25px;
							`},(e?.label||"on"===p.mode)&&React.createElement("div",{className:l()("renderer-components-block-label",r.css`
										color: ${g.questionsColor};
										font-family: ${g.questionsLabelFont};
										@media ( min-width: 768px ) {
											font-size: ${g.questionsLabelFontSize.lg} !important;
											line-height: ${g.questionsLabelLineHeight.lg} !important;
										}
										@media ( max-width: 767px ) {
											font-size: ${g.questionsLabelFontSize.sm} !important;
											line-height: ${g.questionsLabelLineHeight.sm} !important;
										}
									`)},"on"===p?.mode?React.createElement(p.editLabel,null):React.createElement(n.HTMLParser,{value:null!==(o=e?.label)&&void 0!==o?o:""})),(e?.description&&""!==e.description||"on"===p.mode)&&React.createElement("div",{className:l()("renderer-components-block-description",r.css`
												color: ${g.questionsColor};
												font-family: ${g.questionsDescriptionFont};
												@media ( min-width: 768px ) {
													font-size: ${g.questionsDescriptionFontSize.lg} !important;
													line-height: ${g.questionsDescriptionLineHeight.lg} !important;
												}
												@media ( max-width: 767px ) {
													font-size: ${g.questionsDescriptionFontSize.sm} !important;
													line-height: ${g.questionsDescriptionLineHeight.sm} !important;
												}
											`)},"on"===p?.mode?React.createElement(p.editDescription,null):React.createElement(n.HTMLParser,{value:null!==(c=e.description)&&void 0!==c?c:""})),e.customHTML&&React.createElement("div",{className:l()("renderer-components-block-custom-html",r.css`
											color: ${g.questionsColor};
										`),dangerouslySetInnerHTML:{__html:e?.customHTML}})),React.createElement(m,{theme:g,next:R,isSticky:b,buttonText:e.buttonText}))),("stack"!==e.layout&&"mobile"!==d||"mobile"===d&&("split-left"===e.layout||"split-right"===e.layout))&&React.createElement("div",{className:l()("renderer-core-block-attachment-wrapper",r.css`
								img {
									object-position: ${100*e?.attachmentFocalPoint?.x}%
										${100*e?.attachmentFocalPoint?.y}%;
								}
							`)},React.createElement(s,{isPreview:u,attributes:e}))))}},{name:d}={name:"welcome-screen",attributes:{buttonText:{type:"string",default:"Let's start!"}},supports:{editable:!1,required:!1,attachment:!0,description:!0,logic:!1}};(0,e.setBlockRendererSettings)(d,u)})(),(window.qf=window.qf||{}).blocklibWelcomeScreenBlockRenderer={}})();