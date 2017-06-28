require('es6-promise').polyfill();
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var rtlcss = require('gulp-rtlcss');
var rename = require('gulp-rename');
var livereload = require('gulp-livereload');
var plumber = require('gulp-plumber');
var gutil = require('gulp-util');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
//var jshint = require('gulp-jshint');
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

gulp.task('images', function() {
  return gulp.src('./images/src/*')
    .pipe(plumber({errorHandler: onError}))
    .pipe(imagemin({optimizationLevel: 7, progressive: true}))
    .pipe(gulp.dest('./images'));
});
var onError = function (err) {
  console.log('An error occurred:', gutil.colors.magenta(err.message));
  gutil.beep();
  this.emit('end');
};

gulp.task('js', function() {
  return gulp.src(['./js/*.js'])
   // .pipe(jshint())
  //  .pipe(jshint.reporter('default'))
    .pipe(concat('app.js'))
    .pipe(rename({suffix: '.min'}))
        .pipe(uglify().on('error', function(e){
            console.log(e);
         }))    
        .pipe(gulp.dest('./js'))
});
gulp.task('sass', function() {
  return gulp.src('./sass/*.scss')
  .pipe(plumber({ errorHandler: onError }))
  //
  //
});

gulp.task('sass', function() {
    return gulp.src('./sass/*.scss')
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(gulp.dest('./')) // Output LTR stylesheets (style.css)

    .pipe(rtlcss()) // Convert to RTL
        .pipe(rename({ basename: 'rtl' })) // Rename to rtl.css
        .pipe(gulp.dest('./')); // Output RTL stylesheets (rtl.css)
});

gulp.task('watch', function() {
  browserSync.init({
    files: ['./**/*.php'],
    //NB : pdate the proxy option to the local development URL. For example, if your local URL is localhost:8888/wordpress, update the proxy value above with that.
    proxy: 'http://localhost/wordpress/',
  });
  //uncomment if you are not using emmet livestule
  //gulp.watch('./sass/**/*.scss', ['sass', reload]);
  gulp.watch('./**/*.js', ['js', reload]);
  gulp.watch('images/src/*', ['images', reload]);
});
gulp.task('watch', function() {
    // livereload.listen(35729);
    // gulp.watch('**/*.php').on('change', function(file) {
    //     livereload.changed(file.path);
    // });
    // gulp.watch('**/*.js').on('change', function(file) {
    //     livereload.changed(file.path);
    // });
   gulp.watch('./sass/**/*.scss', ['sass']);
     gulp.watch('images/src/*', ['images']);
});
gulp.task('default', ['sass', 'js', 'images', 'watch']);
