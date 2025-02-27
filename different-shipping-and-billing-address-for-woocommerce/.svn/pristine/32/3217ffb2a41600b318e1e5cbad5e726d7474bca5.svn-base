(() => {
  "use strict";

  const React = window.React;
  const blocks = window.wp.blocks;
  const components = window.wp.components;
  const blocksCheckout = window.wc.blocksCheckout;
  const blockEditor = window.wp.blockEditor;
  const i18n = window.wp.i18n;

  const blockSettings = {
    $schema: "https://schemas.wp.org/trunk/block.json",
    apiVersion: 2,
    name: "multiple-billing-address/dropdown",
    version: "1.0.0",
    title: "Gift Message",
    category: "woocommerce",
    parent: ["woocommerce/checkout-billing-address-block"],
    attributes: {
      lock: {
        type: "object",
        default: { remove: true, move: true },
      },
    },
    textdomain: "multiple-billing-address",
  };
  blocks.registerBlockType(blockSettings, {
    edit: ({ attributes, setAttributes }) => {
      return "Multiple Billing Address Dropdown";
    },
  });
})();