// webpack
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");

module.exports = {
  mode: "production",
  devtool: "source-map",

  entry: {
    cookie_control_public: __dirname + "/asset_src/index.jsx",
  },

  output: {
    filename: "[name].js",
    path: __dirname + "/asset_dist",
    publicPath: "auto",
  },

  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: [
          {
            loader: "babel-loader",
            options: {
              presets: [
                [
                  "@babel/env",
                  {
                    useBuiltIns: "usage",
                    corejs: 3,
                  },
                ],
              ],
              plugins: ["@babel/plugin-transform-class-properties"],
            },
          },
        ],
      },
      {
        test: /\.(css|scss)$/i,
        use: [
          { loader: MiniCssExtractPlugin.loader },
          { loader: "css-loader", options: {} },
          {
            loader: "postcss-loader",
            options: {
              postcssOptions: { plugins: [require("autoprefixer")()] },
            },
          },
          {
            loader: "sass-loader",
            options: {
              implementation: require("sass"),
            },
          },
        ],
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/i,
        type: "asset/resource",
        include: [path.resolve(__dirname, "asset_src/images")],
        generator: {
          filename: "images/[name][ext]",
        },
      },
      {
        test: /\.(jpe?g|png|gif|svg)$/i,
        type: "asset/resource",
        include: [path.resolve(__dirname, "asset_src/images/icons")],
        generator: {
          filename: "images/icons/[name][ext]",
        },
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
    }),
  ],

  devServer: {
    contentBase: __dirname + "/dist",
    hot: true,
  },
};
