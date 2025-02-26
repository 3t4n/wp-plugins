import { __ } from "@wordpress/i18n";
const { Panel, PanelBody, PanelRow } = wp.components;

import BUnitControl from "../../../components/BUnitControl/BUnitControl";

export default function Style({ attributes, setAttributes }) {
  const { style } = attributes;
  return (
    <>
      <Panel>
        <PanelBody title={__("Style", "advanced-panorama-360-viewer")}>
          <PanelRow>
            <label>{__("Width", "advanced-panorama-360-viewer")}</label>
            <BUnitControl
              value={style?.width}
              onChange={(width) => setAttributes({ style: { ...style, width } })}
              units={[
                { value: "px", label: "px", default: 500 },
                { value: "%", label: "%", default: 100 },
              ]}
            />
          </PanelRow>
          <PanelRow>
            <label>{__("Height", "advanced-panorama-360-viewer")}</label>
            <BUnitControl
              value={style?.height}
              onChange={(height) => setAttributes({ style: { ...style, height } })}
              units={[
                { value: "px", label: "px", default: 500 },
                { value: "%", label: "%", default: 100 },
                { value: "vh", label: "vh", default: 100 },
              ]}
            />
          </PanelRow>
        </PanelBody>
        {/* <PanelBody title={__("Additional", "advanced-panorama-360-viewer")}>
          <PanelRow>
            <label>{__("ID", "advanced-panorama-360-viewer")}</label>
            <TextControl value={additional.ID} onChange={(ID) => setAttributes({ additional: { ...additional, ID } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("Class", "advanced-panorama-360-viewer")}</label>
            <TextControl value={additional.Class} onChange={(Class) => setAttributes({ additional: { ...additional, Class } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("CSS", "advanced-panorama-360-viewer")}</label>
          </PanelRow>
          <TextareaControl value={additional.CSS} onChange={(CSS) => setAttributes({ additional: { ...additional, CSS } })} />
        </PanelBody> */}
      </Panel>
    </>
  );
}
