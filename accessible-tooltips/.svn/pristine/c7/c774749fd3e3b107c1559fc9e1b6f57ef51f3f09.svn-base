const path = require('path');

module.exports = {
  mode: 'production',
  entry: {
    'tooltips': './src/tooltips.js',
    'tinymce-tooltip-plugin': './src/tinymce-tooltip-plugin.js',
  },
  module: {
    rules: [
      {
        test: /\.css$/i,
        use: ["style-loader", "css-loader"],
      },
    ],
  },
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: '[name].bundle.js',
  },
  resolve: {
    modules: ['./src', './node_modules'],
  }
};

// module.exports = {
//   mode: 'production',
//   entry: './src/tinymce-tooltip-plugin.js',
//   module: {
//     rules: [
//       {
//         test: /\.css$/i,
//         use: ["style-loader", "css-loader"],
//       },
//     ],
//   },
//   output: {
//     path: path.resolve(__dirname, 'build'),
//     filename: 'tinymce-tooltip-plugin.js'
//   },
//   resolve: {
//     modules: ['./src'],
//   }
// };
