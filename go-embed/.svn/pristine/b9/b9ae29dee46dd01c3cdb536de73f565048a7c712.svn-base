const webpack = require('webpack'); //to access built-in plugins
const path = require('path');
const package = require('./package.json');
const appName = package.name;
const pathArray = path.resolve(__dirname).replace(/\\/g, '/').split('/');
const pathApp = pathArray[pathArray.length - 1];

module.exports = {
  // dynamically set the env to prod or dev
  mode: process.env.NODE_ENV !== 'production' ? 'development' : 'production',
  // use our configred component file
  entry: {
    index: './src/wpComponent.js'
  },
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: 'jsappembed.js', // embedded file use in WordPress page
    library: 'jsappembed',
    libraryTarget: 'umd' // use umd to make it work anywhere, other values 'commonjs' and 'amd', 
  },
  plugins: [
    new webpack.DefinePlugin({
      JS_APP_ID: JSON.stringify(pathApp), // use for multiple application
    })
  ],
  // loader
  module: {
    rules: [
    {
        test: /\.ts(x?)$/,
        exclude: [
          /node_modules/,
        ],
        loader: 'ts-loader'
      },
      {
        test: /\.js$/, // find all js
        include: path.resolve(__dirname, 'src'),
        exclude: [
          path.resolve(__dirname, 'node_modules'),
          path.resolve(__dirname, 'bower_components'),
          path.resolve(__dirname, 'build')
        ],
        use: {
          loader: 'babel-loader', // run all js through babel-loader
          options: {
            // turns es6 and react to browser friendly js
            presets: ['@babel/preset-env', '@babel/preset-react'],
            // can also include plugins like below
            plugins: [
              ["@babel/plugin-transform-runtime"]
            ]
          }
        }
      },
       {
        test: /\.(png|svg|jpg|jpeg|gif|wav)$/i,
        type: 'asset/resource',

      },
      {
        // turn any imported css in your package to css in js 
        test: /\.css$/i, 
        use: ['style-loader', 'css-loader'],
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          // Creates `style` nodes from JS strings
          "style-loader",
          // Translates CSS into CommonJS
          "css-loader",
        ],
      },
    ]
  },
  // allow tree shaking
  optimization: {
    providedExports: true,
    usedExports: true,
  },
  // don't include these packages in the production build, the host project should/must 
  // have the packages already
  // in package.json add them to your peerDependencies and devDependencies
};