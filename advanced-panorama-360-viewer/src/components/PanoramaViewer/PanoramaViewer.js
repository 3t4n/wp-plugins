import { useRef, useEffect } from "react";

import "./style.scss";

export default function PanoramaViewer({ attributes, viewer, setViewer }) {
  const { clientId, scene, options = {} } = attributes;

  const ref = useRef();

  useEffect(() => {
    if (ref.current && window.pannellum) {
      ref.current.innerHTML = `<div id="controls"></div>`;
      const instance = window.pannellum.viewer(ref.current, {
        type: "equirectangular",
        scenes: [scene],
        ...options,
      });
      window.viewer = instance;
      setViewer(instance);
    }

    return () => {
      if (viewer) {
        viewer.destroy();
      }
    };
  }, [attributes]);

  // useEffect(() => {
  //   if (ref.current) {
  //     const controlIcons = {
  //       moveUp: "&#9650;",
  //       moveDown: "&#9660;",
  //       moveLeft: "&#9664;",
  //       moveRight: "&#9654;",
  //       zoomIn: "&plus;",
  //       zoomOut: "&minus;",
  //       fullscreen: "&#x2922;",
  //     };
  //     const controlsElement = ref.current.querySelector("#controls");
  //     if (controlsElement) {
  //       controlsElement.innerHTML = "";
  //       Object.keys(controls).map((key) => {
  //         if (controls[key]) {
  //           const div = document.createElement("div");
  //           div.classList.add("ctrl");
  //           div.innerHTML = controlIcons[key];
  //           controlsElement.append(div);
  //           div.addEventListener("click", function () {
  //             key === "moveUp" && viewer.setPitch(viewer.getPitch() + 10);
  //             key === "moveDown" && viewer.setPitch(viewer.getPitch() - 10);
  //             key === "moveLeft" && viewer.setYaw(viewer.getYaw() - 10);
  //             key === "moveRight" && viewer.setYaw(viewer.getYaw() + 10);
  //             key === "zoomIn" && viewer.setHfov(viewer.getHfov() - 10);
  //             key === "zoomOut" && viewer.setHfov(viewer.getHfov() + 10);
  //             key === "fullscreen" && viewer.toggleFullscreen();
  //           });
  //         }
  //       });
  //     }
  //   }

  //   return () => {
  //     if (viewer) {
  //       viewer.destroy();
  //     }
  //   };
  // }, [controls]);

  return (
    <>
      <div id={clientId} ref={ref}>
        <div id="controls"></div>
      </div>
    </>
  );
}
