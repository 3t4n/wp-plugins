var gulp = require('gulp');
var wpPot = require('gulp-wp-pot');

gulp.task('default', function () {
    return gulp
      .src("*.php")
      .pipe(wpPot({
          domain: "overcast-ss-podcasting",
          package: "Add Overcast payments to Seriously Simple Podcasting",
          team: "Jake Spurlock <whyisjake@gmail.com>"
        }))
      .pipe(gulp.dest("languages/file.pot"));
});
