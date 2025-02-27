const fs = require( 'fs' );
const browserify = require( 'browserify' );
const babelify = require( 'babelify' );
const uglify = require( 'uglify-js' );

// Compiled JavaScript directory.
const jsDir = 'assets/js/';

// Source JavaScript directory.
const jsSrcDir = jsDir + 'src/';

fs.readdir( jsSrcDir, ( error, files ) => {
	console.log( 'Building JavaScript' );
	if ( ! files ) {
		console.log( files );
		return;
	}
	files.forEach( file => {
		if ( ! /\.js$/.test( file ) ) {
			return;
		}
		console.log( `Processing ${file}` );
		const jsMinFile = jsDir + file.replace( /\.js$/, '.min.js' );
		browserify( jsSrcDir + file, {
			transform: babelify
		} ).bundle( ( error, buffer ) => {
			if ( ! error ) {
				const minifiedJs = uglify.minify( buffer.toString() );
				if ( minifiedJs.code ) {
					fs.writeFile( jsMinFile, minifiedJs.code, error => {
						if( error ){
							console.log( error );
						} else {
							console.log( `${jsMinFile} written` );
						}
					} );
				}
			} else {
				console.log( error );
			}
		} );
	} );
} );
