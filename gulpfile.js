var gulp = require('gulp');
var stylus = require('gulp-stylus');
var autoprefixer = require('autoprefixer-stylus');
var watch = require('gulp-watch');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var concatCss = require('gulp-concat-css');
var minifyCss = require('gulp-minify-css');
var path = require('path');
var nib = require('nib');


var config = {};
config.stylusSrcPath = './resources/assets/stylus/app.styl';
config.stylusDestDir = './public/styles';
config.includesDir = 'includes';
config.cssSrcMinifyPath = './public/styles/*.css';
config.cssDistDir = './public/styles/dist';


gulp.task('stylus', function () {
  gulp.src(config.stylusSrcPath )
    .pipe(stylus({
      use: [
        nib(),
        autoprefixer()
      ],
      'include css': true,
    }))
    .pipe(concatCss('./bundle.css'))
    .pipe(gulp.dest(config.stylusDestDir));
});

gulp.task('minify-css', function () {
  return gulp.src(config.cssSrcMinifyPath)
    // .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(minifyCss())
    .pipe(rename({
      suffix: '.min',
    }))
    .pipe(gulp.dest(config.cssDistDir));
});

gulp.task('watch', function() {
    gulp.watch(config.stylusSrcPath, ['stylus']);
});

gulp.task('default', ['watch']);

