var gulp = require('gulp');
var wpPot = require('gulp-wp-pot');

gulp.task('pot', function () {
	return gulp.src('./*.php')
		.pipe(wpPot({
			domain: 'wp360pro-dpm',
			package: 'wp360.pro Duplicate Post Meta',
			team: 'wp360.pro <dev@wp360.pro>'
		}))
		.pipe(gulp.dest('./languages'));
});
