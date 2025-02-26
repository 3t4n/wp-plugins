/**
 * External Dependencies
 */
const path = require('path');
const {getWebpackEntryPoints} = require('@wordpress/scripts/utils');
/**
 * WordPress Default Configuration
 */
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

/**
 * Get Entries from WordPress Core Webpack
 */
const blocks = getWebpackEntryPoints();


/**
 * Declare additional entry items
 */
const admin  = {'admin':'./src/admin/index.js'};
const maps   = {'maps':'./src/admin/maps.js'};
// const frontend  = {'frontend':'./src/frontend/index.js'};
// const filters   = {'filters/index': './src/filters/index.js' };

/**
 * Add items to Entries object
 * Maybe swith to 'webpack-merge' if needed.  But avoid if possible as it is additional depenedncy you may bnot need.
 */
//const entries = Object.assign({}, blocks, admin, frontend, filters);
const entries = Object.assign({}, blocks, admin, maps);

/**
 * Custom Configuration
 */
const config = {
    ...defaultConfig,
    entry: entries,
    output: {
        path: path.resolve( __dirname, 'build' ),
    },
}

module.exports = config;