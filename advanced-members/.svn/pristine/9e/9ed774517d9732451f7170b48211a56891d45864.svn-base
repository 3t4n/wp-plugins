/**
 * Minyfy all JS/CSS
 */

const minify = require('@node-minify/core');
// const babelMinify = require('@node-minify/babel-minify');
// const yui = require('@node-minify/yui');
const cleanCSS = require('@node-minify/clean-css');
const gcc = require("@node-minify/google-closure-compiler");

/** @js */
minify({
  compressor: gcc,
  type: "js",
  input: "assets/build/js/forms.js",
  output: "assets/build/js/forms.min.js",
  callback: function(err, min) {}
});
minify({
  compressor: gcc,
  type: "js",
  input: "assets/build/js/amem-admin.js",
  output: "assets/build/js/amem-admin.min.js",
  callback: function(err, min) {}
});
minify({
  compressor: gcc,
  type: "js",
  input: "assets/build/js/amem-input.js",
  output: "assets/build/js/amem-input.min.js",
  callback: function(err, min) {}
});
minify({
  compressor: gcc,
  type: "js",
  input: "assets/build/js/multi-form-validation-hotfix.js",
  output: "assets/build/js/multi-form-validation-hotfix.min.js",
  callback: function(err, min) {}
});
minify({
  compressor: gcc,
  type: "js",
  input: "assets/build/js/password-strength.js",
  output: "assets/build/js/password-strength.min.js",
  callback: function(err, min) {}
});


/** @css */
minify({
  compressor: cleanCSS,
  input: "assets/build/css/form.css",
  output: "assets/build/css/form.min.css",
  callback: (err, min) => {
    // console.log("cleancss concat");
    // console.log(err);
    // //console.log(min);
  }/*,
  options: {
    sourceMap: {
      filename: "public/css-dist/cleancss-concat.map",
      url: "public/css-dist/cleancss-concat.map",
    },
  },*/
});
minify({
  compressor: cleanCSS,
  input: "assets/build/css/admin.css",
  output: "assets/build/css/admin.min.css",
  callback: (err, min) => {}
});
minify({
  compressor: cleanCSS,
  input: "assets/build/css/themes/default.css",
  output: "assets/build/css/themes/default.min.css",
  callback: (err, min) => {}
});