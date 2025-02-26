/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { addFilter } from "@wordpress/hooks";
import { SelectControl, Flex, Button, Tooltip, Icon, ExternalLink } from "@wordpress/components";
import { help, trash, plusCircle } from '@wordpress/icons';

/**
 * Internal dependencies
 */
import { isEmpty, hasOtherBlockAtts } from './../utils/index';

/**
 * Checks for Rules as part of required PersonalizeWP logic.
 *
 * @since 2.8.0
 * @param {Object} attributes All original PWP attributes
 * @return {boolean} Return True if the attributes validate for Rules
 */
const checkRequiredRules = ( required, attributes ) => {
	if ( Object.hasOwn( attributes, 'rules' ) && 0 < attributes.rules.filter(Boolean).length ) {
		return true;
	}
	// Return original
	return required;
}
addFilter(
	'personalizeWP.hasRequiredFields',
	'personalizewp/check-for-rules',
	checkRequiredRules
);

/**
 * Render the Rules inspector control panel.
 *
 * @since 2.6.0
 * @param {Object} props All the props passed to this function
 */
export default function RulesControls( props ) {
	const {
		blockAtts,
		setPersonalizeWPAtts,
		settings
	} = props;

	// Check for rules to use, awaiting loading.
	if ( ! settings?.rules || 0 >= settings.rules.length ) {
		return null;
	}

	// Process the rules into options we can use.
	const ruleOptions = [
			{
				value: 0,
				label: __( '-- Select a rule --', 'personalizewp' ),
			},
		].concat(
			...Array.from(settings.rules).map(
				function(rule) {
					return {
						value: parseInt( rule.id, 10 ),
						label: rule.name,
						disabled: !rule.is_usable,
					}
				} )
		);

	let selectedRules = blockAtts?.rules ?? [];
	// This is required to ensure the first SelectControl appears
	if ( ! selectedRules || isEmpty( selectedRules ) ) {
		selectedRules = [ 0 ];
	}

	/**
	 * Sanitizes a group of Rules, ensuring only valid, unique options.
	 * @param {Array} rules Array of Rules
	 */
	const sanitizeRules = (rules) => {
		// Internal use of ints
		rules = rules.map( num => parseInt(num, 10) );
		// Note: Don't attempt to remove "empty" entries from the array,
		// such as zero, as a 0 is required for the new dropdown entry.
		// And remove any duplicate Rules
		return [...new Set(rules)];
	};

	/**
	 * Regenerate the Rules attribute, when a Rule select control changes.
	 * @param {String} index Position of Rule to update
	 * @param {String} rule  Value of RuleID to update
	 */
	const updateBlockRules = (index, rule) => {
		selectedRules[ index ] = rule;
		setPersonalizeWPAtts( {
			rules: sanitizeRules( selectedRules ),
		} );
	};

	/**
	 * Trigger the removal of another Rule select control, and updating the Rule attribute.
	 * @param {String} index Position of Rule to remove
	 */
	const removeBlockRule = (index) => {
		// Remove this rule from the block
		selectedRules.splice( index, 1 );
		setPersonalizeWPAtts( {
			rules: sanitizeRules( selectedRules ),
		} );
	};

	/**
	 * Trigger the addition of another Rule select control, at the end, and updating the Rule attribute.
	 */
	const addBlockRule = () => {
		// Add a rule to the end of the rules
		selectedRules.splice( selectedRules.length, 0, 0 );
		setPersonalizeWPAtts( {
			rules: sanitizeRules( selectedRules ),
		} );
	};

	// These controls can be marked as inert if settings have been made elsewhere.
	const inert = hasOtherBlockAtts( blockAtts, [ 'rules' ] );

	return (
		<div className="pwp-panel rules">
			<Flex direction="row" align="flex-start">
				<h3>{ __( 'Rules', 'personalizewp' ) }</h3>
				<Tooltip
					delay={ 200 }
					text={ __( 'If you add multiple rules these will be calculated using AND and return true if ALL rules are met.', 'personalizewp' ) }
					className="pwp-tooltip"
					placement="bottom-end">
					<div>
						<Icon icon={ help } size={ 20 } />
					</div>
				</Tooltip>
			</Flex>

			{ selectedRules.map( (ruleID, index ) => {
				return (
					<Flex
						direction="row"
						data-key={"i" + index}
						key={"pwp-rule-" + index}
						className="select-rule"
						inert={ inert ? 'true' : undefined }
					>
						<SelectControl
							label={ 0 === index ? __( 'Rules', 'personalizewp' ) : '' }
							hideLabelFromVision={true}
							value={ String(ruleID) }
							options={ ruleOptions }
							onChange={ ( value ) => {
								updateBlockRules( index, value );
							} }
							__nextHasNoMarginBottom
							disabled={ inert }
						/>

						{
							// Only show this when there are at least 2 fields
							1 < selectedRules.length && (
								<Button
									label={ __( 'Delete field', 'personalizewp' ) }
									icon={ trash }
									onClick={ () => { removeBlockRule( index ) } }
								/>
							)
						}
					</Flex>
				);
			} ) }

			<div className="rule-set__add-rule">
				<Flex direction="row" align="center">
					<p className="help"><ExternalLink href={ settings.add_rule_link }>{ __( 'Add a new rule', 'personalizewp' ) }</ExternalLink></p>
					{
						// Only show the plus if this is the last item, and it's not "no rule"
						0 !== selectedRules[selectedRules.length - 1] && (
							<Button
								label={ __( 'Add another', 'personalizewp' ) }
								icon={ plusCircle }
								onClick={ () => { addBlockRule() } }
							/>
						)
					}
				</Flex>
			</div>
		</div>
	);
}
