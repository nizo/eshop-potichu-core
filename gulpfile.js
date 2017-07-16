var gulp = require('gulp');
var minifyCss = require("gulp-minify-css");
var uglify = require("gulp-uglify");
var rename  = require("gulp-rename");

 
gulp.task('minify-css', function () {
    gulp.src(['./css/*.css','!./css/*.min.css'])
    .pipe(minifyCss())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./css'));
});


gulp.task('minify-js', function () {
     gulp.src(['./js/*.js','!./js/*.min.js', '!./js/potichu-deferred-scripts.js'])
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./js'));
});

gulp.task('default', ['minify-css', 'minify-js']);