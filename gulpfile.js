var gulp = require('gulp');
var minifyCss = require("gulp-minify-css");
var uglify = require("gulp-uglify");
var rename  = require("gulp-rename");
var concatCss = require('gulp-concat-css');
var replace = require('gulp-replace');
var bump = require('gulp-bump');
var fs = require('fs');
var semver = require('semver');


gulp.task('minify-css', function () {
    gulp.src(['./css/*.css','!./css/*.min.css'])
    .pipe(minifyCss())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./css'));
});

gulp.task('concatenate-css', function () {
    gulp.src(['./css/grid.css', './css/layout.css', './css/shortcodes.css', './css/custom.css'])
    .pipe(concatCss("bundled.css"))
    .pipe(minifyCss())
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

var saveVersionToFunctions = function (version) {
	return gulp.src(['functions.php'])	
		.pipe(replace(/define\('WEB_VERSION','(.+?)'\);/, 'define(\'WEB_VERSION\',\'' + version + '\');'))
	.pipe(gulp.dest('./'));	
};
  
gulp.task('bump', function () {	
	var pkg = JSON.parse(fs.readFileSync('./package.json', 'utf8'));
	var newVer = semver.inc(pkg.version, 'patch');
  
	saveVersionToFunctions(newVer);
	return gulp.src(['./package.json'])
	  .pipe(bump({
		version: newVer
	  }))
	  .pipe(gulp.dest('./'));
});
  
gulp.task('default', ['minify-js', 'concatenate-css', 'bump']);