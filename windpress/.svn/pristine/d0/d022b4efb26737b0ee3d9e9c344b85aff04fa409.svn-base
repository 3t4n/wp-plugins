const o = new MutationObserver(function(s) {
  s.forEach(function(e) {
    if (e.type === "attributes") {
      const a = e.attributeName;
      if (a !== "class" && a !== "plainclass") return;
      const i = e.target, c = (e.oldValue || "").split(/\s+/).filter((t) => t !== ""), n = i.getAttribute(a).split(/\s+/).filter((t) => t !== "");
      a === "plainclass" ? (c.forEach(function(t) {
        n.includes(t) || i.classList.remove(t);
      }), n.forEach(function(t) {
        c.includes(t) || i.classList.add(t);
      })) : a === "class" && i.hasAttribute("plainclass") && i.getAttribute("plainclass").split(/\s+/).filter((l) => l !== "").forEach(function(l) {
        n.includes(l) || i.classList.add(l);
      });
    }
  });
});
o.observe(document.body, { attributes: true, subtree: true, attributeFilter: ["class", "plainclass"], attributeOldValue: true });
window.addEventListener("message", function(s) {
  var _a;
  if (((_a = s.data) == null ? void 0 : _a.action) === "windpressoxygen-preview-class") {
    if (s.data.do === "remove") r();
    else if (s.data.do === "add") {
      const e = document.querySelector(`[ng-attr-component-id="${s.data.elementId}"]`);
      e && (r(), u(e, s.data.className));
    }
  }
});
function u(s, e) {
  s.setAttribute("previewclass", e), s.classList.add(e);
}
function d(s) {
  if (!s.hasAttribute("previewclass") || s.getAttribute("previewclass") === "") return;
  const e = s.getAttribute("previewclass");
  s.removeAttribute("previewclass"), !(s.hasAttribute("plainclass") && s.getAttribute("plainclass").split(/\s+/).filter((i) => i !== "").includes(e)) && s.classList.remove(e);
}
function r() {
  document.querySelectorAll("[ng-attr-component-id]").forEach(function(e) {
    d(e);
  });
}
