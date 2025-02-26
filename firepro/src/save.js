/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save( { attributes, className } ) {
	let sanatizedData = JSON.parse(attributes.compositionData);
	let slides = sanatizedData.slides;
	for(var i=0; i<slides.length; i++){
		slides[i].blockData.previewImage = "";
	}
	let ar = 1/sanatizedData.aspectRatio;
	if(slides.length == 0){
		ar = 0;
	}
	let outerStyle = {
	  position: 'relative',
		width: '100%',
		paddingBottom: (ar*100) + "%"
	};
	let innerStyle = {
	  position: 'absolute',
		top: 0,
		left: 0,
		width: '100%',
		height: '100%'
	};
	// JSON.stringify(sanatizedData, null, 2)
	// <div class="FP_compositionDataAttribute">{ attributes.compositionData }</div>
	return(
    <div id={ attributes.seed } >
			<div class="Firepro_OuterContainer" style={outerStyle}>
				<div class="FirePro_Data" style="display: none;">
					<pre>
						<code>{ JSON.stringify(sanatizedData, null, 2) }</code>
					</pre>
				</div>
					<img class="FirePro_Image FP_hide" />
					<canvas class="FirePro_ColorCorrection FP_hide" ></canvas>
					<canvas class="FirePro_Effects FP_hide" ></canvas>
					<canvas class="FirePro_Text FP_hide" ></canvas>
					<canvas class="FirePro_TextReveal FP_hide" ></canvas>
					<canvas class="FirePro_Transition" style={innerStyle}></canvas>
			</div>
    </div>
	);
	return (
		<div class='FirePro_Composition'>
			<div class="FirePro_Data" style="display: none;">
				<pre>
					<code></code>
				</pre>
			</div>
			<div class="Firepro_OuterContainer" style={outerStyle}>
				<div class="Firepro_InnerContainer" style={innerStyle}>
					<img class="FirePro_Image" style="display: none;" />
					<canvas class="FirePro_ColorCorrection" style="display: none;"></canvas>
					<canvas class="FirePro_Effects" style="display: none;"></canvas>
					<canvas class="FirePro_Text" style="display: none;"></canvas>
					<canvas class="FirePro_TextReveal" style="display: none;"></canvas>
					<canvas class="FirePro_Transition" style={innerStyle}></canvas>
				</div>
			</div>
		</div>
	);
}
