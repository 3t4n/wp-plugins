/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, BlockControls } from '@wordpress/block-editor';
import { useState } from '@wordpress/element';


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
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */

/**
 * Custum components import for Blocks Controls
 */

import ElevationToggle from './components/ElevationToggle';
import FillAnswerToggle from './components/FillAnswerToggle';
import CategoryDropDown from './components/CategoryDropDown';
import DifficultyDropDown from './components/DifficultyDropDown';

export default function Edit({ attributes, setAttributes }) {

	const [showDisclaimer, setShowDisclaimer] = useState(false)
	return (
		<>
			<BlockControls>
				<ElevationToggle attributes={attributes} setAttributes={setAttributes} />
				<FillAnswerToggle attributes={attributes} setAttributes={setAttributes} />
				<CategoryDropDown attributes={attributes} setAttributes={setAttributes} />
				<DifficultyDropDown attributes={attributes} setAttributes={setAttributes} />

			</BlockControls>

			<div {...useBlockProps()}>
				<div className={"simplequizblock-container " + (attributes.elevation ? "simplequizblock-shadow" : "")}>
					<div className="simplequizblock-question">
						De quelle couleur est le cheval blanc d'Henry IV ?
					</div>
					<div className="simplequizblock-answers">

						<div className={"simplequizblock-unique-answer " + (attributes.fill ? "simplequizblock-good-fill" : "simplequizblock-good-border")}>Rouge</div>
						<div className={"simplequizblock-unique-answer " + (attributes.fill ? "simplequizblock-bad-fill" : "simplequizblock-bad-border")}>Blanc</div>
						<div className="simplequizblock-unique-answer">Crème</div>
						<div className="simplequizblock-unique-answer">La réponse D</div>

					</div>
					<div className="simplequizblock-result">
						<div className='simplequizblock-good-answer'>
							'Félicitation ! 🥳'
						</div>
					</div>
				</div>
				<div className='simplequizblock-agreement'>
					<div className='simplequizblock-hide' onClick={() => setShowDisclaimer(prev => !prev)}>{showDisclaimer ? 'Cacher' : 'Montrer'} l'averstissement</div>
					{
						showDisclaimer ?
						<div className='simplequizblock-checkbox'>
							<input type='checkbox'  checked={attributes.showLink} onChange={() => setAttributes({showLink: !attributes.showLink})} />
							En cochant cette case, je donne mon accord pour qu'un lien vers le site de l'API (quizzapi.jomoreschi.fr) apparaisse lors
							de l'affichage du résultat. Le lien s'ouvrira dans une nouvelle page, et permettra à l'utilisateur de proposer de nouvelles
							questions à l'API.
						</div>
						:null
					}
				</div>
			</div>
			
		</>
	);
}
