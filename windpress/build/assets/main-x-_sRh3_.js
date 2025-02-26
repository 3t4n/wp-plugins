import { l as s } from "./logger-BTW-zIW3.js";
import { uniIframe as a } from "./constant-V9Qf7smn.js";
import { d as l } from "./vfs-DmzitRvm.js";
import { __tla as __tla_0 } from "./module-oN1JnOJ9.js";
import { __tla as __tla_1 } from "./index-BmQd5Vrd.js";
import { g as d } from "./intellisense-Nf6mwf2_.js";
import "./preload-helper-DH9yCMdR.js";
import "./index-BAMY2Nnw.js";
import "./index-CgqXENQe.js";
import "./stylesheet-B98yp78w.js";
import "./index-xtxc-82G.js";
Promise.all([
  (() => {
    try {
      return __tla_0;
    } catch {
    }
  })(),
  (() => {
    try {
      return __tla_1;
    } catch {
    }
  })()
]).then(async () => {
  function m(o, e = null) {
    const n = typeof e == "number" ? e.toString().length : 8;
    return ("0".repeat(n) + o).slice(-n);
  }
  (async function() {
    const o = a.contentWindow.document.querySelector('script#windpress\\:vfs[type="text/plain"]'), e = l(o.textContent);
    window.Builderius.API.monaco.languages.registerCompletionItemProvider("builderius-css", {
      provideCompletionItems(n, r) {
        const i = n.getWordUntilPosition(r);
        return {
          suggestions: d({
            volume: e
          }).map((t) => ({
            kind: t.key.includes("--color") ? window.Builderius.API.monaco.languages.CompletionItemKind.Color : window.Builderius.API.monaco.languages.CompletionItemKind.Variable,
            label: t.key,
            insertText: t.key,
            detail: t.value,
            range: {
              startLineNumber: r.lineNumber,
              startColumn: i.startColumn,
              endLineNumber: r.lineNumber,
              endColumn: i.endColumn
            },
            sortText: m(t.index)
          }))
        };
      }
    });
  })();
  const u = new BroadcastChannel("windpress");
  u.addEventListener("message", async (o) => {
    const e = o.data;
    e.source === "windpress/autocomplete" && e.task === "windpress.code-editor.saved.done" && setTimeout(() => {
    }, 1e3);
  });
  s("Module loaded!", {
    module: "generate-cache"
  });
});
