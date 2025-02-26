var gulp = require('gulp')
var concat = require('gulp-concat')
var fs = require('fs')
var postcss = require('gulp-postcss')
var sass = require('gulp-sass-no-nodesass');
const gutil = require("gulp-util");
const webpack = require('webpack');
const path = require('path');
const TerserPlugin = require('terser-webpack-plugin');
var Fiber = require('fibers');
require('dotenv').config();
sass.compiler = require('sass');

// WEBPACK TASK
gulp.task('webpack',(done)=>{
    webpack({
        entry: {
			'blocks.build': path.resolve(__dirname, 'src') + '/blocks.tsx',
			'front.dist': path.resolve(__dirname, 'src') + '/frontend/scripts.ts',
		},
		output: {
			path: path.resolve(__dirname, 'dist'), 
			filename: '[name].js'
        },
        externals: {
            "react": "React",
            "react-dom": "ReactDOM",
            "jquery":"jQuery"
        },
		watch: false,
		optimization: {minimize: true,
			minimizer: [new TerserPlugin({terserOptions:{format:{comments:false}},test:/\.(ts|js)x?$/,cache: true,parallel: true,extractComments: false}),],},
		resolve: {extensions: ['.ts', '.tsx', '.js', '.jsx', '.scss']},
		module: {
			rules: [
                {test: /\.(ts|js)x?$/,exclude: [/node_modules/],use:{loader: 'babel-loader',options:
                {presets: ["@babel/preset-typescript", ["@babel/preset-react",
                {"pragma": "wp.element.createElement"}],"@babel/preset-env"]}}}
			],
		},
		devtool: false,
		plugins: []
    },(e, stats)=>{
        if(e) throw new gutil.PluginError("webpack", e);
        else gutil.log("[webpack]", stats.toString());
        done();
    });
});

// SCSS TASKS
gulp.task('blocks.editor.plain',() =>(gulp.src('src/plainmode.scss')
    .pipe(sass({fiber:Fiber,outputStyle:'compressed'}).on('error', sass.logError))
    .pipe(concat('blocks.editor.plain.css'))
    .pipe(gulp.dest('dist/'))))

gulp.task('blocks.style.build',() =>(gulp.src('src/style.scss')
    .pipe(sass({fiber:Fiber,outputStyle:'compressed'}).on('error', sass.logError))
    .pipe(concat('blocks.style.build.css'))
    .pipe(gulp.dest('dist/'))))

// POSTCSS TASK
gulp.task('tailwind',() =>(gulp.src('src/sass/tailwind.src.postcss')
    .pipe(postcss([require('precss'),require('tailwindcss')]))
    .pipe(concat('tailwind.css'))
    .pipe(gulp.dest('dist/'))))

// DEV/PROD MODE
gulp.task('setprod',function(){
    return new Promise(function(resolve, reject) {
        fs.writeFile("env.txt", "prod", function(err) {
            console.log("Production Mode set");
            resolve('');
        });
    }); 
});

gulp.task('setdev',function(){
    return new Promise(function(resolve, reject) { 
        fs.writeFile("env.txt", "dev", function(err) {
            console.log("Developer Mode set");
            resolve('');
        });
    }); 
});

// WATCHER
gulp.task('watcher',function(){
    gulp.watch(["src/**/*.scss","src/**/*.tsx","src/**/*.ts"], gulp.parallel('webpack','blocks.editor.plain','blocks.style.build'))
    gulp.watch(["tailwind.config.js","src/sass/tailwind.src.postcss"], gulp.series('tailwind',gulp.parallel('webpack','blocks.editor.plain','blocks.style.build')))
});

gulp.task('watchdev',gulp.series('setdev','tailwind',gulp.parallel('webpack','blocks.editor.plain','blocks.style.build'),'watcher'));
gulp.task('watchprod',gulp.series('setprod','tailwind',gulp.parallel('webpack','blocks.editor.plain','blocks.style.build'),'watcher'));
gulp.task('default', gulp.series('setprod','tailwind',gulp.parallel('webpack','blocks.editor.plain','blocks.style.build'),'watcher'));