const webpack = require('webpack');
const merge = require('merge');
const path = require('path');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin')

const config = {
  entry: path.resolve(__dirname, '../public/index.js'),

  output: {
    path: path.resolve(__dirname, '../../assets/public/js'),
    filename: 'app.bundle.js',
  },

  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
        },
      },
    ],
  },

  plugins: [
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
    }),
  ],
};

module.exports = (env, argv) => {
  if (argv.mode === 'development') {
    return merge(config, {
      plugins: [
        new webpack.DefinePlugin({
          'ENV': JSON.stringify(argv.mode),
        }),
        new FriendlyErrorsWebpackPlugin(),
      ],
      stats: {
        hash: false,
        version: false,
        timings: false,
        children: false,
        errors: false,
        errorDetails: false,
        warnings: false,
        chunks: false,
        modules: false,
        moduleTrace: false,
        reasons: false,
        source: false,
      },
    });
  }

  if (argv.mode === 'production') {
    return merge(config, {
      plugins: [
        new webpack.DefinePlugin({
          'ENV': JSON.stringify(argv.mode),
        }),
      ],
    });
  }

  return config;
}
