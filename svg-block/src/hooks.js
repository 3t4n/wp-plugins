/**
 * External dependencies
 */
import { __ } from "@wordpress/i18n";

/**
 * WordPress dependencies
 */
import { addFilter } from "@wordpress/hooks";
import { select } from "@wordpress/data";

/**
 * Force block support for typography when using the block as a button
 */
addFilter(
  "blockEditor.useSetting.before",
  "boldblocks/CBB/useSetting.before",
  (settingValue, settingName, clientId, blockName) => {
    if (blockName !== "boldblocks/svg-block") {
      return settingValue;
    }

    const { getBlockAttributes } = select("core/block-editor");
    const useAsButton = getBlockAttributes(clientId)?.useAsButton ?? false;

    if (!useAsButton && settingName.includes("typography")) {
      return false;
    }

    return settingValue;
  },
);
