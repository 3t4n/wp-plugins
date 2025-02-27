const { src, dest, watch, series, parallel } = require('gulp');
const rename = require('gulp-rename');
const uglify = require("gulp-uglify");
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

function scssAdminBuild(){    
    return src('admin/scss/streamweasels-player-pro-admin.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([ autoprefixer(), cssnano() ]))
        .pipe(rename('streamweasels-player-pro-admin.min.css'))
        .pipe(dest('admin/dist/'))
}

function scssPublicBuild(){    
    return src('public/scss/streamweasels-player-pro-public.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([ autoprefixer(), cssnano() ]))
        .pipe(rename('streamweasels-player-pro-public.min.css'))
        .pipe(dest('public/dist/'))
}

function javascriptAdminBuild() {
    return src('admin/js/streamweasels-player-pro-admin.js')
        .pipe(rename('streamweasels-player-pro-admin.min.js'))
        .pipe(uglify())
        .pipe(dest('admin/dist/'))
}

function javascriptPublicBuild() {
    return src('public/js/streamweasels-player-pro-public.js')
        .pipe(rename('streamweasels-player-pro-public.min.js'))
        .pipe(uglify())
        .pipe(dest('public/dist/'))
}

function watchTask() {
    watch(['admin/js/streamweasels-player-pro-admin.js', 'admin/scss/streamweasels-player-pro-admin.scss', 'public/js/streamweasels-player-pro-public.js', 'public/scss/streamweasels-player-pro-public.scss'],
        {interval: 1000, usePolling: true}, //Makes docker work
        series(
            parallel(javascriptAdminBuild, scssPublicBuild, scssAdminBuild, javascriptPublicBuild)
        )
    )
}

// build
exports.build = series(
    parallel(scssAdminBuild, scssPublicBuild, javascriptAdminBuild, javascriptPublicBuild), 
);

// watch
exports.watch = series(
    watchTask
);