/*
* This file is part of
*  _ __  _   _ _ __   ___
* | '_ \| | | | '_ \ / _ \
* | |_) | |_| | |_) |  __/
* | .__/ \__, | .__/ \___|
* |_|    |___/|_|
*                 Personal Yii Page Engine
*
*	Copyright (c) 2016 Jacob Moen
*	Licensed under the MIT license
*/

// fix problems with undefined Promise class
// http://stackoverflow.com/questions/32490328/gulp-autoprefixer-throwing-referenceerror-promise-is-not-defined
require('es6-promise').polyfill();

// Load plugins
var gulp = require('gulp'),
sass = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
cssnano = require('gulp-cssnano'),
jshint = require('gulp-jshint'),
uglify = require('gulp-uglify'),
imagemin = require('gulp-imagemin'),
rename = require('gulp-rename'),
concat = require('gulp-concat'),
notify = require('gulp-notify'),
cache = require('gulp-cache'),
browsersync = require('browser-sync'),
sourcemaps = require('gulp-sourcemaps'),
del = require('del'),
gulpif = require('gulp-if'),
runSequence = require('run-sequence');

var PATHS = {
    sass: [
        'vendor/bower/foundation-sites/scss',
        'vendor/bower/motion-ui/src/',
        'vendor/bower/font-awesome/scss/'
    ],
    javascript: [
        'vendor/bower/jquery/dist/jquery.js',
        'vendor/bower/what-input/what-input.js',
        'vendor/bower/foundation-sites/js/foundation.core.js',
        'vendor/bower/foundation-sites/js/foundation.util.*.js',
        // Paths to individual JS components defined below
        'vendor/bower/foundation-sites/js/foundation.abide.js',
        'vendor/bower/foundation-sites/js/foundation.accordion.js',
        'vendor/bower/foundation-sites/js/foundation.accordionMenu.js',
        'vendor/bower/foundation-sites/js/foundation.drilldown.js',
        'vendor/bower/foundation-sites/js/foundation.dropdown.js',
        'vendor/bower/foundation-sites/js/foundation.dropdownMenu.js',
        'vendor/bower/foundation-sites/js/foundation.equalizer.js',
        'vendor/bower/foundation-sites/js/foundation.interchange.js',
        'vendor/bower/foundation-sites/js/foundation.magellan.js',
        'vendor/bower/foundation-sites/js/foundation.offcanvas.js',
        'vendor/bower/foundation-sites/js/foundation.orbit.js',
        'vendor/bower/foundation-sites/js/foundation.responsiveMenu.js',
        'vendor/bower/foundation-sites/js/foundation.responsiveToggle.js',
        'vendor/bower/foundation-sites/js/foundation.reveal.js',
        'vendor/bower/foundation-sites/js/foundation.slider.js',
        'vendor/bower/foundation-sites/js/foundation.sticky.js',
        'vendor/bower/foundation-sites/js/foundation.tabs.js',
        'vendor/bower/foundation-sites/js/foundation.toggler.js',
        'vendor/bower/foundation-sites/js/foundation.tooltip.js',
        // Yii2 scrips
        "vendor/yiisoft/yii2/assets/yii.js",
        "vendor/yiisoft/yii2/assets/yii.validation.js",
        "vendor/yiisoft/yii2/assets/yii.activeForm.js",
        // Custom scripts
        'js/**/!(custom).js',
        'js/custom.js'
    ]
};

var sassOptions = {
    errLogToConsole: true,
    outputStyle: 'expanded',
    includePaths: require('node-neat').includePaths
};

var autoprefixerOptions = {
    browsers: ['last 2 versions', '> 5%', 'Firefox ESR']
};


// Styles
gulp.task('styles', function() {
    return gulp.src('themes/default/scss/all.scss')
    .pipe(sourcemaps.init())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(sourcemaps.write('.', { sourceRoot: '../../themes/default/scss/' }))
    .pipe(gulp.dest('web/themes/default/css'))
    .pipe(gulpif('*.css', rename({ suffix: '.min' })))
    .pipe(gulpif('*.css', cssnano()))
    .pipe(gulpif('*.css', gulp.dest('web/themes/default/css')))
    .pipe(gulpif('*.css', notify({ message: 'Styles task complete' })));
});

// Scripts
gulp.task('scripts', function() {
    return gulp.src(PATHS.javascript)
    //.pipe(jshint('.jshintrc'))
    //.pipe(jshint.reporter('default'))
    .pipe(sourcemaps.init())
    .pipe(concat('all.js'))
    .pipe(sourcemaps.write('.', { sourceRoot: '../../js/' }))
    .pipe(gulp.dest('web/js'))
    .pipe(gulpif('*.js', rename({ suffix: '.min' })))
    .pipe(gulpif('*.js', uglify()))
    .pipe(gulpif('*.js', gulp.dest('web/js')))
    .pipe(gulpif('*.js', notify({ message: 'Scripts task complete' })));
});

// Images
gulp.task('images', function() {
    return gulp.src('img/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest('web/img'))
    .pipe(notify({ message: 'Images task complete' }));
});

// Copy fonts
gulp.task('fonts', function() {
    return gulp.src([
        'vendor/bower/font-awesome/fonts/*'
    ])
    .pipe(gulp.dest('./web/fonts'));
});

// Clean
gulp.task('clean', function() {
    return del(['web/themes/default/css/*']);
    //return del(['web/css/*', 'web/js/*', 'web/fonts/*']);
});

// Build the "web" folder by running all of the above tasks
gulp.task('build', function(callback) {
    runSequence('clean', ['styles'], callback);
    //runSequence('clean', ['styles', 'scripts', 'fonts'], callback);
});

// Watch
gulp.task('watch', function() {

    // Initialize Browsersync
    browsersync.init({
        proxy: "http://pype.dev"
    });

    // Watch .scss files
    gulp.watch('themes/default/scss/**/*.scss', ['styles']);

    // Watch .js files
    //gulp.watch('js/**/*.js', ['scripts']);

    // Watch image files
    //gulp.watch('img/**/*', ['images']);

    // Watch any view files in 'views', reload on change
    gulp.watch(['themes/default/views/**/*.php']).on('change', browsersync.reload);

    // Watch any files in 'web', reload on change
    //gulp.watch(['web/js/*']).on('change', browsersync.reload);
    gulp.watch(['web/themes/default/css/*']).on('change', browsersync.reload);
});

gulp.task('default', ['build', 'watch'], function() {});
