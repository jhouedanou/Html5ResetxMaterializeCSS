require('es6-promise').polyfill();
var gulp = require('gulp');
var sass = require('gulp-sass');
//var autoprefixer = require('gulp-autoprefixer');
//var rtlcss = require('gulp-rtlcss');
var rename = require('gulp-rename');
var plumber = require('gulp-plumber');
var gutil = require('gulp-util');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;
var mainBowerFiles = require('main-bower-files');
var spritesmith  = require('gulp.spritesmith');
var strip_comments = require('gulp-strip-json-comments');
gulp.task('sprite', function() {
    var spriteData = 
        gulp.src('./images/sprite/*.*')
            .pipe(spritesmith({
                imgName: 'sprite.png',
                cssName: 'sprite.css',
            }));
    spriteData.img.pipe(gulp.dest('./images/')); 
    spriteData.css.pipe(gulp.dest('./styles/')); 
});
gulp.task('images', function() {
    return gulp.src('./images/src/*')
        .pipe(plumber({ errorHandler: onError }))
        .pipe(imagemin({ optimizationLevel: 7, progressive: true }))
        .pipe(gulp.dest('./images'));
});
var onError = function(err) {
    console.log('An error occurred:', gutil.colors.magenta(err.message));
    gutil.beep();
    this.emit('end');
};
gulp.task('script', function() {
    return gulp.src(['./functions.js'])
        .pipe(concat('functions.js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify().on('error', function(e) {
            console.log(e);
        }))
        .pipe(gulp.dest('./'))
});
gulp.task('js', function() {
    return gulp.src(['./js/*.js'])
        .pipe(concat('app.js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify().on('error', function(e) {
            console.log(e);
        }))
        .pipe(gulp.dest('./js'))
});
gulp.task('sass', function() {
    return gulp.src('./sass/*.scss')
});
gulp.task('sass', function() {
    return gulp.src('./sass/*.scss')
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(strip_comments())
       // .pipe(autoprefixer())
        .pipe(gulp.dest('./')) // Output LTR stylesheets (style.css)
        .pipe(plumber({ errorHandler: onError }))
});
gulp.task('browser-sync', function() {
    var files = [
        './*.php',
        './*.js'
    ];
    browserSync.init(files, {
      //  server:"./",
        online:true,
       proxy: "localhost/wordpress/",
        notify: true
    });
});
gulp.task('watch', function() {
    gulp.watch('./sass/**/*.scss', ['sass']);
    gulp.watch('images/src/*', ['images']);
    gulp.watch('images/sprite/*', ['sprite']);
});
gulp.task('default', ['sprite', 'sass', 'js', 'script', 'images', 'browser-sync', 'watch']);
gulp.task('build',['sprite', 'sass', 'js', 'script', 'images']);
