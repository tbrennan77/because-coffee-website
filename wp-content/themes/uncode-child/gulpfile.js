const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const groupmq = require('gulp-group-css-media-queries');
const bs = require('browser-sync');

const SASS_SOURCES = [
  './wp-content/themes/uncode-child/*.scss', // This picks up our style.scss file at the root of the theme
  'css/**/*.scss',                           // All other Sass files in the /css directory
];

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./app"
    });

    gulp.watch("app/scss/*.scss", ['sass']);
    gulp.watch("app/*.html").on('change', browserSync.reload);
});

/**
 * Compile Sass files
 */
gulp.task('compile:sass', () =>
  gulp.src(SASS_SOURCES, { base: './' })
    .pipe(plumber()) // Prevent termination on error
    .pipe(sass({
      indentType: 'tab',
      indentWidth: 1,
      outputStyle: 'expanded', // Expanded so that our CSS is readable
    })).on('error', sass.logError)
    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false,
      })
    ]))
    .pipe(groupmq()) // Group media queries!
    .pipe(gulp.dest('.')) // Output compiled files in the same dir as Sass sources
    .pipe(bs.stream())); // Stream to browserSync


/*
 * Default task executed by running `gulp`
 */
gulp.task('default', ['watch:sass']);

/**
 * Watch Sass files for changes
 */
gulp.task('watch:sass', ['compile:sass'], () => {
  bs.init({
    proxy: 'http://localhost/coffee'
  });

  gulp.watch(SASS_SOURCES, ['compile:sass']);
});
