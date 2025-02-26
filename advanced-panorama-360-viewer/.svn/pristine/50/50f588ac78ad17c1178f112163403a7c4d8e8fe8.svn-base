import { useBlockProps } from "@wordpress/block-editor";
import PanoramaViewer from "../../components/PanoramaViewer/PanoramaViewer";
import { useState, useEffect } from "react";
import Settings from "./settings";
import "./editor.scss";
import Style from "./Style";

export default function Edit(props) {
  const [viewer, setViewer] = useState(null);
  const { attributes, setAttributes } = props;

  //generate new unique ID
  useEffect(() => {
    setAttributes({ clientId: "advanced-panorama-360-viewer" + props.clientId.substr(0, 8) });
  }, [props.clientId]);

  return (
    <div {...useBlockProps()}>
      <Settings {...props} />
      <Style attributes={attributes} />
      <PanoramaViewer attributes={attributes} viewer={viewer} setViewer={setViewer} />
    </div>
  );
}
