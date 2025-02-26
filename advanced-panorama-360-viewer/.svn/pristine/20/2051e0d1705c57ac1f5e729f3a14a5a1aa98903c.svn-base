import { useState, useEffect } from "react";

export default function Style({ attributes }) {
  const { clientId, style, scene, additional, align, options } = attributes;
  const [css, setCSS] = useState();

  useEffect(() => {
    let css = `#${clientId} .pnlm-title-box {display: ${scene.title ? "" : "none"};}`;
    css += `#${clientId} .pnlm-author-box {display: ${scene.author ? "" : "none"};}`;
    css += `#${clientId} {height: ${style.height}; width: ${style.width}}`;
    css += `#${clientId} .next_prev{display: ${options?.nextPrevBtn ? "flex" : "none"};}`;
    css += `#${clientId} {${align === "right" ? "margin-left:auto" : align === "center" ? "margin: auto" : ""}}`;
    css += additional?.CSS;
    setCSS(css);
  }, [scene, style, clientId, additional, align]);

  return <style>{css}</style>;
}
