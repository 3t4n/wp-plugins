import { __ } from "@wordpress/i18n";
const { TabPanel, PanelBody, PanelRow } = wp.components;
const { InspectorControls } = wp.blockEditor;

import { useEffect, useState } from "@wordpress/element";

import { General } from "./tabs/General";
import Style from "./tabs/Style";
import tabController from "../../utils/tabController";
import { ClipboardButton } from "@wordpress/components";

const Settings = ({ attributes, setAttributes, isSelected }) => {
  // const { style, additional, options, controls, basicControls, sceneFadeDuration, autoRotation } = attributes;

  const [hasCopied, setHasCopied] = useState(false);

  const postType = wp.data.select("core/editor")?.getCurrentPostType() || "product";
  const postId = wp.data.select("core/editor")?.getCurrentPostId();

  useEffect(() => {
    tabController();
  }, [isSelected]);

  return (
    <InspectorControls>
      {postType === "ap360v-viewer" && (
        <PanelBody>
          <PanelRow>
            <ClipboardButton
              style={{ width: "100%", justifyContent: "center" }}
              variant="primary"
              text={`[advance_panorama_viewer id=${postId}]`}
              onCopy={() => setHasCopied(true)}
              onFinishCopy={() => setHasCopied(false)}
            >
              {hasCopied ? "Copied!" : "Copy Shortcode"}
            </ClipboardButton>
          </PanelRow>
        </PanelBody>
      )}
      <TabPanel
        className="ap360v-tab-panel"
        activeClass="active"
        onSelect={tabController}
        tabs={[
          {
            name: "general",
            title: __("General", "advanced-panorama-360-viewer"),
            className: "general",
          },
          {
            name: "style",
            title: __("Style", "advanced-panorama-360-viewer"),
            className: "style",
          },
        ]}
      >
        {(tab) => {
          return (
            <span>
              {tab.name === "general" && <General attributes={attributes} setAttributes={setAttributes} />}
              {tab.name === "style" && <Style attributes={attributes} setAttributes={setAttributes} />}
            </span>
          );
        }}
      </TabPanel>
    </InspectorControls>
  );
};

export default Settings;
