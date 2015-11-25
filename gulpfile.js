var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');
var minifycss = require('gulp-minify-css');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var themePath = 'public_html/app/themes/child-theme/';

var paths = {
    sass: themePath + 'scss/*.scss',
    javascript: themePath + 'js/source/*.js',
};

var dest = {
    css: themePath + 'css',
    javascript: themePath + 'js'
};


/* Compile Our Sass */
gulp.task('sass', function() {
    return gulp.src(themePath + 'scss/main.scss')
        .pipe(sass())
        .on('error', swallowError)
        .pipe(gulp.dest(dest.css))
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss())
        .pipe(gulp.dest(dest.css))
});

/* Compile Our Scripts */
gulp.task('scripts', function() {
    return gulp.src(paths.javascript)
        .pipe(concat('app.min.js'))
        .on('error', swallowError)
        .pipe(uglify())
        .on('error', swallowError)
        .pipe(gulp.dest(dest.javascript))
});

/* Watch Files For Changes */
gulp.task('watch', function() {
    gulp.watch(paths.sass, ['sass']);
    gulp.watch(paths.javascript, ['scripts']);

});
function swallowError (error) {

    //If you want details of the error in the console
    console.log(error.toString());

    this.emit('end');
}

gulp.task('default', ['sass', 'watch', 'scripts']);