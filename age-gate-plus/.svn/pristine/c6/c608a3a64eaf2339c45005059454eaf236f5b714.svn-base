const gulp = require('gulp')
const sass = require('gulp-sass')
const sourcemaps = require('gulp-sourcemaps')
const rename = require('gulp-rename')
const autoprefixer = require('gulp-autoprefixer')
const cleanCSS = require('gulp-clean-css')
const notify = require('gulp-notify')
const browserSync = require('browser-sync')

sass.compiler = require('node-sass')

// REPLACE THIS WITH YOUR LOCAL DEV URL
var proxyUrl = 'http://local.agegator.com'
// SET PROXY TO USE HTTPS OR HTTP
var proxySecure = false

gulp.task('app-sass', function () {
	return gulp.src('./lib/app/src/scss/style.scss')
		.pipe(sourcemaps.init())
		.pipe(sass.sync().on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(cleanCSS({
			compatibility: 'ie11'
		}))
		.pipe(rename({
			basename: "app",
			suffix: ".min",
			extname: ".css"
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./dist/css'))
		.pipe(notify({
			title: "Sass compiled successfully!",
			onLast: true,
			sound: true
		}))
})

gulp.task('admin-sass', function () {
	return gulp.src('./lib/admin/src/scss/style.scss')
		.pipe(sourcemaps.init())
		.pipe(sass.sync().on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(cleanCSS({
			compatibility: 'ie11'
		}))
		.pipe(rename({
			basename: "admin",
			suffix: ".min",
			extname: ".css"
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./dist/css'))
		.pipe(notify({
			title: "Sass compiled successfully!",
			onLast: true,
			sound: true
		}))
})

gulp.task('feedback-sass', function () {
	return gulp.src('./lib/admin/src/scss/feedback.scss')
		.pipe(sourcemaps.init())
		.pipe(sass.sync().on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(cleanCSS({
			compatibility: 'ie11'
		}))
		.pipe(rename({
			basename: "feedback",
			suffix: ".min",
			extname: ".css"
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./dist/css'))
		.pipe(notify({
			title: "Sass compiled successfully!",
			onLast: true,
			sound: true
		}))
})

gulp.task('watch', function () {
	const files = [
		'./dist/css/*.css',
		'./dist/js/*.js',
		'**/*.php',
	]

	browserSync.init(files, { 
		https: proxySecure,
		proxy: {
			target: proxyUrl
		},
	})

	gulp.watch('./lib/app/src/scss/**/*.scss', gulp.series('app-sass'))
	gulp.watch('./lib/admin/src/scss/**/*.scss', gulp.series('admin-sass'))
	gulp.watch('./lib/admin/src/scss/feedback.scss', gulp.series('feedback-sass'))
})

gulp.task('default', gulp.series(['app-sass', 'admin-sass', 'feedback-sass']))