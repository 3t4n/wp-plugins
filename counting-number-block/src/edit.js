/**
 * External dependencies
 */
import classnames from "classnames";

/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { settings as settingsIcon } from "@wordpress/icons";
import {
  useBlockProps,
  InspectorControls,
  BlockControls,
  AlignmentControl,
  useBlockEditingMode,
} from "@wordpress/block-editor";
import {
  PanelBody,
  TextControl,
  ToggleControl,
  Dropdown,
  ToolbarButton,
} from "@wordpress/components";
import { useEffect } from "@wordpress/element";

/**
 * Internal dependencies
 */
import { buildDataset } from "./utils";

// Editor style
import "./editor.scss";

// Editor script
import "./editor";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit(props) {
  const {
    attributes,
    attributes: {
      value = 1000,
      startVal = 0,
      duration = 2,
      scrollSpyOnce,
      scrollSpyDelay = 0,
      textAlign,
      disableGrouping = false,
      separator = ",",
      decimal = ".",
      prefix = "",
      suffix = "",
    },
    setAttributes,
    isSelected,
    clientId,
  } = props;

  useEffect(() => {
    window.dispatchEvent(
      new CustomEvent("boldblocks.countingNumber.settingsUpdated", {
        detail: {
          selector: `#block-${clientId} .value`,
        },
      })
    );

    return () => {
      window.dispatchEvent(
        new CustomEvent("boldblocks.countingNumber.removeCounting", {
          detail: {
            selector: `#block-${clientId} .value`,
          },
        })
      );
    };
  }, [
    value,
    startVal,
    duration,
    scrollSpyOnce,
    scrollSpyDelay,
    disableGrouping,
    separator,
    decimal,
  ]);

  const blockEditingMode = useBlockEditingMode
    ? useBlockEditingMode()
    : "default";

  const ValueControls = (
    <>
      <TextControl
        label={__("The number value", "counting-number-block")}
        value={value}
        onChange={(value) => {
          setAttributes({ value });
        }}
        type="number"
        step="any"
      />
      <TextControl
        label={__("Start counting from value", "counting-number-block")}
        value={startVal}
        onChange={(startVal) => setAttributes({ startVal })}
        type="number"
        step="any"
      />
    </>
  );

  const PrefixSuffixControls = (
    <>
      <TextControl
        label={__("Prefix", "counting-number-block")}
        value={prefix}
        onChange={(prefix) => setAttributes({ prefix })}
        help={__("Display before the number.", "counting-number-block")}
      />
      <TextControl
        label={__("Suffix", "counting-number-block")}
        value={suffix}
        onChange={(suffix) => setAttributes({ suffix })}
        help={__("Display after the number.", "counting-number-block")}
      />
    </>
  );

  const CounterSettingControls = (
    <>
      <TextControl
        label={__("Duration (in seconds)", "counting-number-block")}
        value={duration}
        onChange={(duration) => setAttributes({ duration })}
        type="number"
        step={0.5}
        min={0}
      />
      <ToggleControl
        label={__("Don't group large number", "counting-number-block")}
        checked={disableGrouping}
        onChange={(disableGrouping) => setAttributes({ disableGrouping })}
        help={__("E.G. 1000 instead of 1,000", "counting-number-block")}
      />
      {!disableGrouping && (
        <TextControl
          label={__("Grouping separator", "counting-number-block")}
          value={separator}
          onChange={(separator) => setAttributes({ separator })}
          help={__("E.G. 1,000 instead of 1000", "counting-number-block")}
        />
      )}
      <TextControl
        label={__("Decimal separator", "counting-number-block")}
        value={decimal}
        onChange={(decimal) => setAttributes({ decimal })}
        help={__("Default (.)", "counting-number-block")}
      />
      <TextControl
        label={__("Delay (in seconds)", "counting-number-block")}
        value={scrollSpyDelay}
        onChange={(scrollSpyDelay) => setAttributes({ scrollSpyDelay })}
        type="number"
        step={0.1}
        min={0}
      />
      <ToggleControl
        label={__("Only run once?", "counting-number-block")}
        checked={scrollSpyOnce}
        onChange={(scrollSpyOnce) => setAttributes({ scrollSpyOnce })}
      />
    </>
  );

  const ToolbarSettingControls = (
    <>
      {ValueControls}
      {PrefixSuffixControls}
    </>
  );

  const settingsLabel = __("Block settings", "counting-number-block");

  return (
    <>
      {isSelected && (
        <>
          <BlockControls group="block">
            <Dropdown
              popoverProps={{
                position: "bottom right",
              }}
              contentClassName="counting-number"
              renderToggle={({ isOpen, onToggle }) => (
                <ToolbarButton
                  label={settingsLabel}
                  onClick={onToggle}
                  aria-haspopup="true"
                  aria-expanded={isOpen}
                  icon={settingsIcon}
                />
              )}
              renderContent={() => <>{ToolbarSettingControls}</>}
            />
            {blockEditingMode === "default" && (
              <AlignmentControl
                value={textAlign}
                onChange={(nextAlign) => {
                  setAttributes({ textAlign: nextAlign });
                }}
              />
            )}
          </BlockControls>
          <InspectorControls>
            <PanelBody title={settingsLabel}>
              {ValueControls}
              {CounterSettingControls}
              {PrefixSuffixControls}
            </PanelBody>
          </InspectorControls>
        </>
      )}
      <div
        {...useBlockProps({
          className: classnames({
            [`has-text-align-${textAlign}`]: textAlign,
          }),
        })}
      >
        {!!prefix.trim() && <span className="prefix">{prefix}</span>}
        <span className="value" {...buildDataset(attributes)}>
          {value}
        </span>
        {!!suffix.trim() && <span className="suffix">{suffix}</span>}
      </div>
    </>
  );
}
