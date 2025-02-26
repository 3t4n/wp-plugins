/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @param {Object} [props]           Properties passed from the editor.
 * @param {string} [props.className] Class name generated for the block.
 *
 * @return {WP
 Element} Element to render.
 */
import FM from './compiled';
export default function Edit( { attributes, setAttributes, className  } ) {

	// Test if global track has been made
	//<beginFold> ensure global tracker exists
	if(window.FireTrack == undefined){
		window.FireTrack = {};
	}
	//</endFold>

	// Assign seed to attributes (this will be permanently bound to the block)
	//<beginFold> Build Block Seed
	if(attributes.seed == undefined){
		let seed = (Date.now() + Math.floor(Math.random() * 1000000000)).toString().replace(/[^0-9a-z]/gi, '');
		setAttributes( { seed: seed } );
	}
	//</endFold>

	// Make sure compositionData is a proper object
	//<beginFold> setup CompositionData
	if(attributes.compositionData == undefined){
    let emptyComp = {};
    emptyComp.aspectRatio = 16/9;
    emptyComp.editorType = "advanced";
    emptyComp.slides = [];
		let emptyCompString = JSON.stringify(emptyComp);
		setAttributes( { compositionData: emptyCompString } );
	}
	//</endFold>

	// Test if this window has already built the seed
	//<beginFold> Test If UI has already been built
	if(window.FireTrack[attributes.seed] == undefined){
    window.FireTrack[attributes.seed] = {};
    window.FireTrack[attributes.seed].seed = attributes.seed;
    window.FireTrack[attributes.seed].compositionData = attributes.compositionData;
	}else{ // UI Has Already Been Built
    return  (
      <>
      <div id={ attributes.seed } >
        <div class="FP_compositionDataAttribute">{ attributes.compositionData }</div>
      </div>
      </>
    );
	}
	//</endFold>

	// Wait For React to create root container & call runtime
	//<beginFold> Excute RunLoop
	function runLoop(){
		let masterDiv = document.getElementById(attributes.seed);
		if(masterDiv == undefined){
			window.requestAnimationFrame(runLoop);
			return;
		}
		FM.runtime( masterDiv, attributes, setAttributes );
		return;
	}
	runLoop();

	return  (
    <>
    <div id={ attributes.seed } >
      <div class="FP_compositionDataAttribute">{ attributes.compositionData }</div>
    </div>
    </>
  );
	//</endFold>

}
