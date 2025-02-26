const webpack = require('webpack');
const merge = require('merge');
const path = require('path');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin')

const config = {
  entry: path.resolve(__dirname, '../admin/index.js'),

  output: {
    path: path.resolve(__dirname, '../../assets/admin/js'),
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
      {
        test: /\.(png|jp(e*)g|svg|gif)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '../images/[hash]-[name].[ext]',
            },
          },
        ],
      },
      {
        test: /\.css$/i,
        use: ["style-loader", "css-loader"],
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
