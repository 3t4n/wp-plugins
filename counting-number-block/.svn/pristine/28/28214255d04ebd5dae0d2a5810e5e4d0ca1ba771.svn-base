/**
 * External dependencies
 */
import classnames from "classnames";

/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";

/**
 * Internal dependencies
 */
import { buildDataset, getStartValue } from "./utils";

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save(props) {
  const {
    attributes,
    attributes: { value, textAlign, prefix = "", suffix = "" },
  } = props;

  let dataset = buildDataset(attributes);
  let realValue = <span className="sr-value">{value}</span>;

  dataset = { ...dataset, "aria-hidden": "true" };
  if (attributes?.deprecatedAccessibility) {
    delete dataset["aria-hidden"];
    realValue = null;
  }

  return (
    <div
      {...useBlockProps.save({
        className: classnames({ [`has-text-align-${textAlign}`]: textAlign }),
      })}
    >
      {!!prefix.trim() && <span className="prefix">{prefix}</span>}
      <span className="value" {...dataset}>
        {getStartValue(attributes)}
      </span>
      {realValue}
      {!!suffix.trim() && <span className="suffix">{suffix}</span>}
    </div>
  );
}
