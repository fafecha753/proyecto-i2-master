
const gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename');


// CSS task
//taskname, functiom
gulp.task('css', function () {
    console.log('Creating css-----------------------------------------------------------------------------------------------');
    return gulp
        .src("./src/assets/sass/**/*.scss") //source files
        .pipe(sass({ outputStyle: 'expanded' })//converts sass to css
            .on('error', sass.logError))
        .pipe(gulp.dest("./src/assets/css/"))
        .pipe(rename({ suffix: ".min" }))
        .pipe(gulp.dest("./src/assets/css")) //destination
});

gulp.task('watch', function () {
    gulp.watch('./src/assets/sass/*.scss', gulp.parallel('css')); //watch all sass
});
