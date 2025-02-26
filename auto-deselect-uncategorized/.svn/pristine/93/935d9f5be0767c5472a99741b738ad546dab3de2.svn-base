/**
 * Auto-Deselect Uncategorized
 *
 * @package WordPress/gutenberg
 * @requires wordpress-v5+
 * @see https://github.com/WordPress/gutenberg/tree/master/packages/editor/src/components/post-taxonomies
 * @extends https://github.com/WordPress/gutenberg/tree/master/packages/editor/src/components/post-taxonomies/hierarchical-term-selector.js
 *
 * @subpackage AutoDeselectUncategorized
 * @since 1.0.0
 */

/**
 * External dependencies
 */
import { without } from 'lodash';

function customizeCategorySelector(OriginalComponent) {
    return function (props) {
        // props.slug is the taxonomy (slug)
        if (props.slug === 'category') {

            if (!window.AutoDeselectUncategorized) {
                window.AutoDeselectUncategorized = class AutoDeselectUncategorized extends OriginalComponent {

                    onChange(termId) {
                        const { onUpdateTerms, terms = [], taxonomy } = this.props;
                        const defaultId = parseInt(scriptParams.defaultCategory, 10);
                        const hasTerm = terms.indexOf(termId) !== -1;
                        let newTerms = hasTerm ?
                            without(terms, termId) :
                            [...terms, termId];

                        if (newTerms.length === 0 ||
                            newTerms.length === 1 && newTerms.indexOf(defaultId) === 0
                        ) {
                            newTerms = [defaultId];
                        } else if (newTerms.indexOf(defaultId) !== -1) { // Uncategorized is in array
                            newTerms = without(newTerms, defaultId);
                        }

                        onUpdateTerms(newTerms, taxonomy.rest_base);
                    }

                } // End class
            }

            return wp.element.createElement(
                AutoDeselectUncategorized,
                props
            );

        } else { // not "category" taxonomy
            return wp.element.createElement(
                OriginalComponent,
                props
            );
        }
    }
}

wp.hooks.addFilter(
  'editor.PostTaxonomyType',
  'auto-deselect-uncategorized',
  customizeCategorySelector
);
