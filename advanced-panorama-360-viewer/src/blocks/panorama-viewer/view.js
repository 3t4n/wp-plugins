import PanoramaViewer from "../../components/PanoramaViewer/PanoramaViewer";
import { createRoot } from "react-dom";
import { useState } from "react";
import Style from "./Style";

document.addEventListener("DOMContentLoaded", function () {
  const viewers = document.querySelectorAll(".wp-block-ap360v-panorama-viewer");
  viewers.forEach((viewer) => {
    const attributes = JSON.parse(viewer.dataset.attributes);
    viewer.removeAttribute("data-attributes");

    const root = createRoot(viewer);
    root.render(<View attributes={attributes} />);
  });
});

export function View({ attributes }) {
  const [viewer, setViewer] = useState(null);
  return (
    <>
      <Style attributes={attributes} />
      <PanoramaViewer attributes={attributes} viewer={viewer} setViewer={setViewer} />
    </>
  );
}
