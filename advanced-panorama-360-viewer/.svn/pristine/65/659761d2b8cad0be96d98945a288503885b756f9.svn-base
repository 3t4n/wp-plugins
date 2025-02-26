import { __ } from "@wordpress/i18n";
const { Panel, PanelBody, PanelRow, FormToggle } = wp.components;
import { produce } from "immer";

import BMediaUpload from "../../../components/BMediaUpload/BMediaUpload";
import { TextControl } from "@wordpress/components";
// import BMediaUpload from "../../components/BMediaUpload/BMediaUpload";
// import Scenes from "./Scenes";

export function General({ attributes, setAttributes }) {
  const { options, scene } = attributes;
  const { title, author, panorama } = scene;

  const updateScene = (key, value) => {
    const newScene = produce(scene, (draft) => {
      draft[key] = value;
    });

    setAttributes({ scene: newScene });
  };

  return (
    <>
      <Panel>
        <PanelBody title="Scene" initialOpen={true}>
          <BMediaUpload
            value={panorama}
            placeholder={__("Scene", "advanced-panorama-360-viewer")}
            onSelect={(panorama) => updateScene("panorama", panorama)}
            type={["image"]}
            label={__("Scene URL", "advanced-panorama-360-viewer")}
          />
          <TextControl label={__("Title", "advanced-panorama-360-viewer")} value={title} onChange={(title) => updateScene("title", title)} />
          <TextControl label={__("Author", "advanced-panorama-360-viewer")} value={author || ""} onChange={(author) => updateScene("author", author)} />
        </PanelBody>
        <PanelBody title={__("Options", "advanced-panorama-360-viewer")} initialOpen={false}>
          <PanelRow>
            <label>{__("Autoload", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={options?.autoLoad} onChange={() => setAttributes({ options: { ...options, autoLoad: !options?.autoLoad } })} />
          </PanelRow>
          {/* <PanelRow>
            <label>{__("Show Controls", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={options?.showControls} onChange={() => setAttributes({ options: { ...options, showControls: !options?.showControls } })} />
          </PanelRow>

          <PanelRow>
            <label>{__("Show Next Prev Button", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={options?.nextPrevBtn} onChange={() => setAttributes({ options: { ...options, nextPrevBtn: !options?.nextPrevBtn } })} />
          </PanelRow> */}

          <PanelRow>
            <label>{__("Mouse Draggable", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={options?.draggable} onChange={() => setAttributes({ options: { ...options, draggable: !options?.draggable } })} />
          </PanelRow>
          {/* <PanelRow>
            <label>{__("Mouse Zoom", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={options?.mouseZoom} onChange={() => setAttributes({ options: { ...options, mouseZoom: !options?.mouseZoom } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("Keyboard Zoom", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={options?.keyboardZoom} onChange={() => setAttributes({ options: { ...options, keyboardZoom: !options?.keyboardZoom } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("Compass", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={options?.compass} onChange={() => setAttributes({ options: { ...options, compass: !options?.compass } })} />
          </PanelRow>
          <RangeControl
            label={__("Scene Fade Duration", "advanced-panorama-360-viewer")}
            value={options.sceneFadeDuration}
            onChange={(sceneFadeDuration) => setAttributes({ options: { ...options, sceneFadeDuration } })}
            min={0}
            step={1}
            max={3000}
          /> */}
          {/* <BMediaUpload
            value={options?.preview}
            placeholder={__("Preview Image", "advanced-panorama-360-viewer")}
            onSelect={(preview) => setAttributes({ options: { ...options, preview } })}
            type={["image"]}
            label={__("Preview Image", "advanced-panorama-360-viewer")}
          /> */}
          {/* <RangeControl
            label={__("Auto Rotation", "advanced-panorama-360-viewer") + ` (${options.autoRotate} deg per second)`}
            value={options.autoRotate}
            onChange={(autoRotate) => setAttributes({ options: { ...options, autoRotate } })}
            min={-50}
            step={1}
            max={50}
            renderTooltipContent={(value) => `${value}dps`}
          />
          <span>
            <b>{__("Note", "advanced-panorama-360-viewer")}: </b>
            {__("set 0 to disable auto rotate", "advanced-panorama-360-viewer")}
          </span> */}
        </PanelBody>
        {/* <PanelBody title={__("Custom Controls", "advanced-panorama-360-viewer")} initialOpen={false}>
          <PanelRow>
            <label>{__("Move Up", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={controls?.moveUp} onChange={() => setAttributes({ controls: { ...controls, moveUp: !controls?.moveUp } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("Move Down", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={controls?.moveDown} onChange={() => setAttributes({ controls: { ...controls, moveDown: !controls?.moveDown } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("Move Left", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={controls?.moveLeft} onChange={() => setAttributes({ controls: { ...controls, moveLeft: !controls?.moveLeft } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("Move Right", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={controls?.moveRight} onChange={() => setAttributes({ controls: { ...controls, moveRight: !controls?.moveRight } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("Zoom In", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={controls?.zoomIn} onChange={() => setAttributes({ controls: { ...controls, zoomIn: !controls?.zoomIn } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("Zoom Out", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={controls?.zoomOut} onChange={() => setAttributes({ controls: { ...controls, zoomOut: !controls?.zoomOut } })} />
          </PanelRow>
          <PanelRow>
            <label>{__("Fullscreen", "advanced-panorama-360-viewer")}</label>
            <FormToggle checked={controls?.fullscreen} onChange={() => setAttributes({ controls: { ...controls, fullscreen: !controls?.fullscreen } })} />
          </PanelRow>
        </PanelBody> */}
      </Panel>
    </>
  );
}
