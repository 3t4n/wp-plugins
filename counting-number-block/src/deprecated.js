/**
 * WordPress dependencies
 */

/**
 * Internal dependencies
 */
import { supports, attributes } from "./block.json";
import save from "./save";

/**
 * Deprecated
 */
export default [
  {
    supports,
    attributes: {
      ...attributes,
      deprecatedAccessibility: {
        type: "boolean",
        default: true,
      },
    },
    save,
  },
  {
    supports,
    attributes: {
      ...attributes,
      deprecatedAccessibility: {
        type: "boolean",
        default: true,
      },
      deprecatedStartVal: {
        type: "boolean",
        default: true,
      },
    },
    save,
  },
];
