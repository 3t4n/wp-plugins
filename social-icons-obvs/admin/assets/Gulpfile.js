'use strict';

const gulp = require('gulp');
const babel = require('gulp-babel');
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-clean-css');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');

// styles
gulp.task('css', function () {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 3 versions', '> 5%', 'Explorer >= 10', 'Safari >= 8'],
            cascade: false
        }))
        .pipe(gulp.dest('./css/'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cleancss())
        .pipe(gulp.dest('./css/'));
});

// scripts
var jsFiles = 'js/functions/*.js',
    jsDest = 'js/';

gulp.task('js', function() {
    return gulp.src(jsFiles)
        .pipe(babel({
            presets : ['es2015']
        }))
        .pipe(concat('social-icons-obvs-admin.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('social-icons-obvs-admin.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
});

// watch
gulp.task('watch', function () {
    gulp.watch('sass/**/*.scss', ['css']);
    gulp.watch('js/**/*.js', ['js']);
});
