import { m as c, __tla as __tla_0 } from "./monaco-editor-Dg0eLWcY.js";
import { __tla as __tla_1 } from "./dashboard-CFCjYHDx.js";
import "./preload-helper-DH9yCMdR.js";
import "./index-DDChq6R5.js";
import "./index-CgqXENQe.js";
import "./_plugin-vue_export-helper-Ds8ZmEpB.js";
import "./runtime-core.esm-bundler-CxI1Hi6i.js";
import "./isObject-CRxghtyK.js";
import "./xmark-CRWel2Xe.js";
import "./virtual-Cakm3k_V.js";
import "./index-Dgh2qPwk.js";
import "./set-DvizEivO.js";
import { __tla as __tla_2 } from "./module-oN1JnOJ9.js";
import "./index-BAMY2Nnw.js";
import { __tla as __tla_3 } from "./index-BmQd5Vrd.js";
import "./index.browser-B0na17u1.js";
import "./_initCloneObject-D8oIiuqH.js";
import "./build-BEB5OvHV.js";
import { __tla as __tla_4 } from "./index-CcO2jMy2.js";
import "./stylesheet-B98yp78w.js";
import "./index-xtxc-82G.js";
import { __tla as __tla_5 } from "./build-C39uKkyY.js";
import "./postcss-CMxDEYNb.js";
import "./index-DYEcFSWi.js";
import "./index-iAEQxtNR.js";
import "./didyoumean-DVWXwy9y.js";
import "./resolve-config-D_K0LwYp.js";
import "./index-Dqc2aLRA.js";
import "./intellisense-Nf6mwf2_.js";
let q, G;
let __tla = Promise.all([
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
  })(),
  (() => {
    try {
      return __tla_2;
    } catch {
    }
  })(),
  (() => {
    try {
      return __tla_3;
    } catch {
    }
  })(),
  (() => {
    try {
      return __tla_4;
    } catch {
    }
  })(),
  (() => {
    try {
      return __tla_5;
    } catch {
    }
  })()
]).then(async () => {
  var p = Object.defineProperty, a = Object.getOwnPropertyDescriptor, g = Object.getOwnPropertyNames, d = Object.prototype.hasOwnProperty, m = (o, t, i, s) => {
    if (t && typeof t == "object" || typeof t == "function") for (let r of g(t)) !d.call(o, r) && r !== i && p(o, r, {
      get: () => t[r],
      enumerable: !(s = a(t, r)) || s.enumerable
    });
    return o;
  }, l = (o, t, i) => (m(o, t, "default"), i), n = {};
  l(n, c);
  var x = {
    wordPattern: /(-?\d*\.\d\w*)|([^\`\~\!\@\#\%\^\&\*\(\)\-\=\+\[\{\]\}\\\|\;\:\'\"\,\.\<\>\/\?\s]+)/g,
    comments: {
      lineComment: "//",
      blockComment: [
        "/*",
        "*/"
      ]
    },
    brackets: [
      [
        "{",
        "}"
      ],
      [
        "[",
        "]"
      ],
      [
        "(",
        ")"
      ]
    ],
    onEnterRules: [
      {
        beforeText: /^\s*\/\*\*(?!\/)([^\*]|\*(?!\/))*$/,
        afterText: /^\s*\*\/$/,
        action: {
          indentAction: n.languages.IndentAction.IndentOutdent,
          appendText: " * "
        }
      },
      {
        beforeText: /^\s*\/\*\*(?!\/)([^\*]|\*(?!\/))*$/,
        action: {
          indentAction: n.languages.IndentAction.None,
          appendText: " * "
        }
      },
      {
        beforeText: /^(\t|(\ \ ))*\ \*(\ ([^\*]|\*(?!\/))*)?$/,
        action: {
          indentAction: n.languages.IndentAction.None,
          appendText: "* "
        }
      },
      {
        beforeText: /^(\t|(\ \ ))*\ \*\/\s*$/,
        action: {
          indentAction: n.languages.IndentAction.None,
          removeText: 1
        }
      }
    ],
    autoClosingPairs: [
      {
        open: "{",
        close: "}"
      },
      {
        open: "[",
        close: "]"
      },
      {
        open: "(",
        close: ")"
      },
      {
        open: '"',
        close: '"',
        notIn: [
          "string"
        ]
      },
      {
        open: "'",
        close: "'",
        notIn: [
          "string",
          "comment"
        ]
      },
      {
        open: "`",
        close: "`",
        notIn: [
          "string",
          "comment"
        ]
      },
      {
        open: "/**",
        close: " */",
        notIn: [
          "string"
        ]
      }
    ],
    folding: {
      markers: {
        start: new RegExp("^\\s*//\\s*#?region\\b"),
        end: new RegExp("^\\s*//\\s*#?endregion\\b")
      }
    }
  }, e = {
    operators: [
      "<=",
      ">=",
      "==",
      "!=",
      "===",
      "!==",
      "=>",
      "+",
      "-",
      "**",
      "*",
      "/",
      "%",
      "++",
      "--",
      "<<",
      "</",
      ">>",
      ">>>",
      "&",
      "|",
      "^",
      "!",
      "~",
      "&&",
      "||",
      "??",
      "?",
      ":",
      "=",
      "+=",
      "-=",
      "*=",
      "**=",
      "/=",
      "%=",
      "<<=",
      ">>=",
      ">>>=",
      "&=",
      "|=",
      "^=",
      "@"
    ],
    symbols: /[=><!~?:&|+\-*\/\^%]+/,
    escapes: /\\(?:[abfnrtv\\"']|x[0-9A-Fa-f]{1,4}|u[0-9A-Fa-f]{4}|U[0-9A-Fa-f]{8})/,
    digits: /\d+(_+\d+)*/,
    octaldigits: /[0-7]+(_+[0-7]+)*/,
    binarydigits: /[0-1]+(_+[0-1]+)*/,
    hexdigits: /[[0-9a-fA-F]+(_+[0-9a-fA-F]+)*/,
    regexpctl: /[(){}\[\]\$\^|\-*+?\.]/,
    regexpesc: /\\(?:[bBdDfnrstvwWn0\\\/]|@regexpctl|c[A-Z]|x[0-9a-fA-F]{2}|u[0-9a-fA-F]{4})/,
    tokenizer: {
      root: [
        [
          /[{}]/,
          "delimiter.bracket"
        ],
        {
          include: "common"
        }
      ],
      common: [
        [
          /#?[a-z_$][\w$]*/,
          {
            cases: {
              "@keywords": "keyword",
              "@default": "identifier"
            }
          }
        ],
        [
          /[A-Z][\w\$]*/,
          "type.identifier"
        ],
        {
          include: "@whitespace"
        },
        [
          /\/(?=([^\\\/]|\\.)+\/([dgimsuy]*)(\s*)(\.|;|,|\)|\]|\}|$))/,
          {
            token: "regexp",
            bracket: "@open",
            next: "@regexp"
          }
        ],
        [
          /[()\[\]]/,
          "@brackets"
        ],
        [
          /[<>](?!@symbols)/,
          "@brackets"
        ],
        [
          /!(?=([^=]|$))/,
          "delimiter"
        ],
        [
          /@symbols/,
          {
            cases: {
              "@operators": "delimiter",
              "@default": ""
            }
          }
        ],
        [
          /(@digits)[eE]([\-+]?(@digits))?/,
          "number.float"
        ],
        [
          /(@digits)\.(@digits)([eE][\-+]?(@digits))?/,
          "number.float"
        ],
        [
          /0[xX](@hexdigits)n?/,
          "number.hex"
        ],
        [
          /0[oO]?(@octaldigits)n?/,
          "number.octal"
        ],
        [
          /0[bB](@binarydigits)n?/,
          "number.binary"
        ],
        [
          /(@digits)n?/,
          "number"
        ],
        [
          /[;,.]/,
          "delimiter"
        ],
        [
          /"([^"\\]|\\.)*$/,
          "string.invalid"
        ],
        [
          /'([^'\\]|\\.)*$/,
          "string.invalid"
        ],
        [
          /"/,
          "string",
          "@string_double"
        ],
        [
          /'/,
          "string",
          "@string_single"
        ],
        [
          /`/,
          "string",
          "@string_backtick"
        ]
      ],
      whitespace: [
        [
          /[ \t\r\n]+/,
          ""
        ],
        [
          /\/\*\*(?!\/)/,
          "comment.doc",
          "@jsdoc"
        ],
        [
          /\/\*/,
          "comment",
          "@comment"
        ],
        [
          /\/\/.*$/,
          "comment"
        ]
      ],
      comment: [
        [
          /[^\/*]+/,
          "comment"
        ],
        [
          /\*\//,
          "comment",
          "@pop"
        ],
        [
          /[\/*]/,
          "comment"
        ]
      ],
      jsdoc: [
        [
          /[^\/*]+/,
          "comment.doc"
        ],
        [
          /\*\//,
          "comment.doc",
          "@pop"
        ],
        [
          /[\/*]/,
          "comment.doc"
        ]
      ],
      regexp: [
        [
          /(\{)(\d+(?:,\d*)?)(\})/,
          [
            "regexp.escape.control",
            "regexp.escape.control",
            "regexp.escape.control"
          ]
        ],
        [
          /(\[)(\^?)(?=(?:[^\]\\\/]|\\.)+)/,
          [
            "regexp.escape.control",
            {
              token: "regexp.escape.control",
              next: "@regexrange"
            }
          ]
        ],
        [
          /(\()(\?:|\?=|\?!)/,
          [
            "regexp.escape.control",
            "regexp.escape.control"
          ]
        ],
        [
          /[()]/,
          "regexp.escape.control"
        ],
        [
          /@regexpctl/,
          "regexp.escape.control"
        ],
        [
          /[^\\\/]/,
          "regexp"
        ],
        [
          /@regexpesc/,
          "regexp.escape"
        ],
        [
          /\\\./,
          "regexp.invalid"
        ],
        [
          /(\/)([dgimsuy]*)/,
          [
            {
              token: "regexp",
              bracket: "@close",
              next: "@pop"
            },
            "keyword.other"
          ]
        ]
      ],
      regexrange: [
        [
          /-/,
          "regexp.escape.control"
        ],
        [
          /\^/,
          "regexp.invalid"
        ],
        [
          /@regexpesc/,
          "regexp.escape"
        ],
        [
          /[^\]]/,
          "regexp"
        ],
        [
          /\]/,
          {
            token: "regexp.escape.control",
            next: "@pop",
            bracket: "@close"
          }
        ]
      ],
      string_double: [
        [
          /[^\\"]+/,
          "string"
        ],
        [
          /@escapes/,
          "string.escape"
        ],
        [
          /\\./,
          "string.escape.invalid"
        ],
        [
          /"/,
          "string",
          "@pop"
        ]
      ],
      string_single: [
        [
          /[^\\']+/,
          "string"
        ],
        [
          /@escapes/,
          "string.escape"
        ],
        [
          /\\./,
          "string.escape.invalid"
        ],
        [
          /'/,
          "string",
          "@pop"
        ]
      ],
      string_backtick: [
        [
          /\$\{/,
          {
            token: "delimiter.bracket",
            next: "@bracketCounting"
          }
        ],
        [
          /[^\\`$]+/,
          "string"
        ],
        [
          /@escapes/,
          "string.escape"
        ],
        [
          /\\./,
          "string.escape.invalid"
        ],
        [
          /`/,
          "string",
          "@pop"
        ]
      ],
      bracketCounting: [
        [
          /\{/,
          "delimiter.bracket",
          "@bracketCounting"
        ],
        [
          /\}/,
          "delimiter.bracket",
          "@pop"
        ],
        {
          include: "common"
        }
      ]
    }
  };
  q = x;
  G = {
    defaultToken: "invalid",
    tokenPostfix: ".js",
    keywords: [
      "break",
      "case",
      "catch",
      "class",
      "continue",
      "const",
      "constructor",
      "debugger",
      "default",
      "delete",
      "do",
      "else",
      "export",
      "extends",
      "false",
      "finally",
      "for",
      "from",
      "function",
      "get",
      "if",
      "import",
      "in",
      "instanceof",
      "let",
      "new",
      "null",
      "return",
      "set",
      "static",
      "super",
      "switch",
      "symbol",
      "this",
      "throw",
      "true",
      "try",
      "typeof",
      "undefined",
      "var",
      "void",
      "while",
      "with",
      "yield",
      "async",
      "await",
      "of"
    ],
    typeKeywords: [],
    operators: e.operators,
    symbols: e.symbols,
    escapes: e.escapes,
    digits: e.digits,
    octaldigits: e.octaldigits,
    binarydigits: e.binarydigits,
    hexdigits: e.hexdigits,
    regexpctl: e.regexpctl,
    regexpesc: e.regexpesc,
    tokenizer: e.tokenizer
  };
});
export {
  __tla,
  q as conf,
  G as language
};
