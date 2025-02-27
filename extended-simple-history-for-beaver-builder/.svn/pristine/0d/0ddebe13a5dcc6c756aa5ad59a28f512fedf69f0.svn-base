const fs = require( 'fs' );
const sass = require( 'sass' );
const postcss = require( 'postcss' );
const autoprefixer = require( 'autoprefixer' );
const cssnano = require( 'cssnano' );
const postcssPresetEnv = require('postcss-preset-env');

// Compiled CSS directory.
const cssDir = 'assets/css/';

// SCSS source directory.
const scssDir = cssDir + 'scss/';

fs.readdir( scssDir, ( error, files ) => {
	console.log( 'Building CSS' );
	if ( ! files ) {
		console.log( files );
		return;
	}
	files.forEach( file => {
		if ( ! /^[^_].*\.s[ac]ss$/.test( file ) ) {
			return;
		}
		console.log( `Processing ${file}` );
		const cssFile = cssDir + file.replace( /\.s[ac]ss$/, '.css' );
		const cssMinFile = cssDir + file.replace( /\.s[ac]ss$/, '.min.css' );
		sass.render( {
			file: scssDir + file,
			outputStyle: 'expanded',
			outFile: cssFile,
			sourceMap: true,
			sourceMapEmbed: true,
		}, ( error, result ) => {
			if ( ! error ) {
				fs.writeFile( cssFile, result.css.toString(), error => {
					if( error ){
						console.log( error );
					} else {
						console.log( `${cssFile} written` );
					}
					postcss( [
						autoprefixer,
						cssnano,
						postcssPresetEnv(),
					] ).process(
						result.css.toString(),
						{
							from: cssFile,
							to: cssMinFile,
							map: { inline: false },
						}
					).then( processed => {
						fs.writeFile( cssMinFile, processed.css, error => {
							if( error ){
								console.log( error );
							} else {
								console.log( `${cssMinFile} written` );
							}
						} );
						fs.writeFile( `${cssMinFile}.map`, processed.map.toString(), error => {
							if( error ){
								console.log( error );
							} else {
								console.log( `${cssMinFile}.map written` );
							}
						} );
					} );
				} );
			} else {
				console.log( error );
			}
		} );
	} );
} );
