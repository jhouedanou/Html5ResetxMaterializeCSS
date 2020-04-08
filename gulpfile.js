require('es6-promise').polyfill();
var cssScss = require('gulp-css-scss');
var sourcemaps = require('gulp-sourcemaps');
var gulp = require('gulp');
var shell = require('gulp-shell');
var gutil = require('gulp-util');
var notify = require('gulp-notify');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var plumber = require('gulp-plumber');
var gutil = require('gulp-util');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
var mainBowerFiles = require('main-bower-files');
var spritesmith = require('gulp.spritesmith');
var strip_comments = require('gulp-strip-json-comments');
var haml = require('gulp-haml');
// Error handling.
// Lifted directly from https://github.com/mikaelbr/gulp-notify/issues/81#issuecomment-100422179.
var reportError = function (error) {
    var lineNumber = (error.lineNumber) ? 'LINE ' + error.lineNumber + ' -- ' : '';

    notify({
        title: 'Task Failed [' + error.plugin + ']',
        message: lineNumber + 'See console.',
        sound: 'Sosumi' // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
    }).write(error);

    gutil.beep(); // Beep 'sosumi' again
    console.log(error);
    console.log(error.toString());
    var report = '';
    var chalk = gutil.colors.white.bgRed;

    report += chalk('TASK:') + ' [' + error.plugin + ']\n';
    report += chalk('PROB:') + ' ' + error.message + '\n';
    if (error.lineNumber) { report += chalk('LINE:') + ' ' + error.lineNumber + '\n'; }
    if (error.fileName) { report += chalk('FILE:') + ' ' + error.fileName + '\n'; }
    console.error(report);

    // Prevent the 'watch' task from stopping
    this.emit('end');
};
gulp.task('css2scss', function () {
    return gulp.src('./stylesheets/*.css')
        .pipe(cssScss())
        .pipe(gulp.dest('scss'));
});
gulp.task('sprite', function () {
    var spriteData =
        gulp.src('./images/sprite/*.*')
            .pipe(spritesmith({
                imgName: 'sprite.png',
                cssName: 'sprite.css',
            }));
    spriteData.img.pipe(gulp.dest('./images/'));
    spriteData.css.pipe(gulp.dest('./styles/'));
});
gulp.task('images', function () {
    return gulp.src('./images/src/*')
        .pipe(plumber({ errorHandler: onError }))
        .pipe(imagemin({ optimizationLevel: 7, progressive: true }))
        .pipe(gulp.dest('./images'));
});
var onError = function (err) {
    console.log('An error occurred:', gutil.colors.magenta(err.message));
    gutil.beep();
    this.emit('end');
};
gulp.task('script', function () {
    return gulp.src(['./functions.js'])
        .pipe(concat('functions.js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify().on('error', function (e) {
            console.log(e);
        }))
        .pipe(gulp.dest('./'))
});
gulp.task('js', function () {
    return gulp.src(['./js/*.js'])
        .pipe(concat('app.js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .on('error', function (err) { gutil.log(gutil.colors.red('[Error]'), err.toString()); })
        .pipe(gulp.dest('./js'))
});
gulp.task('sass', function () {
    return gulp.src('./*.scss')
        .pipe(plumber({
            errorHandler: reportError
        }))
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'expanded' }))
        .pipe(strip_comments())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./')) // Output LTR stylesheets (style.css)
        .on('error', reportError)
        .pipe(browserSync.stream());
});


// Get and render all .haml files recursively
gulp.task('haml', function () {
    gulp.src('./haml/**/*.haml')
        .pipe(haml())
        .pipe(gulp.dest('./'));
});
gulp.task('ext', function () {
    gulp.src('./haml/**/*.haml')
    // .pipe(haml({ext: '.php'}))
    // .pipe(gulp.dest('./php'));
});

gulp.task('browser-sync', function () {
    var files = [
        './*.php',
        './*.html',
        './*.js',
        "themes/**/*.tpl",

    ];
    browserSync.init(files, {
        // server: {
        //     baseDir: "./",
        //     index: "index.html",
        //     directory: true
        //  },
        online: true,
        proxy: "127.0.0.1/wordpress/",
        notify: true
    });
});
gulp.task('watch', function () {
    gulp.watch('./*.scss', gulp.series('sass'));
    gulp.watch('images/src/*', gulp.series('images'));
    gulp.watch('images/sprite/*', gulp.series('sprite'));
});
gulp.task('default', gulp.parallel(['sass', 'haml', 'ext', 'browser-sync', 'watch']));
gulp.task('build', gulp.parallel(['sprite', 'haml', 'ext', 'sass', 'js', 'script', 'images', 'browser-sync', 'watch']));
