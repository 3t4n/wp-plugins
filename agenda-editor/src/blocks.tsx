/* eslint-disable no-undef */
//import './blocks/linkwrapper/linkwrapper.jsx'
import _ from 'lodash'
import React from 'react'
// IMPORT CUSTOM BLOCKS
import './blocks/grid-block/grid'
import './blocks/html/html'
import './blocks/slick/slick'
import './blocks/tailwind-block/tailwind'
import './blocks/linkwrapper/linkwrapper'
window.lodash = _.noConflict()
const wp = window.wp

declare global {
	interface Props {}
	interface Window {
			wp:any,
			lodash:any
	}
	interface Math {
		round:(x: number) => number
	}
}

function docReady(fn) {
	if (document.readyState === "complete" || document.readyState === "interactive")
			setTimeout(fn, 1);
	else document.addEventListener("DOMContentLoaded", fn);
}    

// DOM-READY FUNCTION
docReady(()=>{
	let ie9 = /MSIE 9/i.test(navigator.userAgent)     
	let ie10 = /MSIE 10/i.test(navigator.userAgent)      
	let ie11 = /rv:11.0/i.test(navigator.userAgent)
	if(ie11||ie10||ie9){ 
		document.body.classList.add('isIE')
	}
});

// REMOVE BLOCK VALIDITY TEST
const withCustomClassName = wp.compose.createHigherOrderComponent((BlockListBlock) => {
  return props => {
	props.block.isValid = true
	return <BlockListBlock { ...props } />
  }
}, 'withCustomClassName')
wp.hooks.addFilter('editor.BlockListBlock', 'my-plugin/with-custom-class-name', withCustomClassName);

// DISABLE DISCUSSION PANEL
// wp.data.removeEditorPanel( 'taxonomy-panel-category' );
// wp.data.removeEditorPanel( 'taxonomy-panel-post_tag' );
// wp.data.removeEditorPanel( 'featured-image' );
// wp.data.removeEditorPanel( 'post-excerpt' );
// wp.data.removeEditorPanel( 'discussion-panel' );