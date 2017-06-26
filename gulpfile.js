			var gulp           = require('gulp');
// Include Our Plugins
var jshint = require('gulp-jshint');
var concat         = require('gulp-concat');
var rename         = require('gulp-rename');
var sass           = require('gulp-sass');
var livereload      = require('gulp-livereload');
//var uglify = require('gulp-uglify');

	// Lint Task
// gulp.task('lint', function() {
//     return gulp.src('js/*.js')
//         .pipe(jshint())
//         .pipe(jshint.reporter('default'));
// });		
			// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('js/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('dist'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('js'));
}); 
		// Compile Our Sass
			gulp.task('sass', function() {
			    return gulp.src('sass/*.scss')
			        .pipe(sass())
			        .pipe(gulp.dest('css'));
			});
			 
			 
			gulp.task('watch', function () {
			    livereload.listen(35729);
			    gulp.watch('**/*.php').on('change', function(file) {
			          livereload.changed(file.path);
			      });
			    gulp.watch('./assets/sass/**/*.scss', ['sass']);
			    gulp.watch('./assets/js/**/*.js', ['scripts']);
			});
			 
			gulp.task('default', ['sass', 'watch']);