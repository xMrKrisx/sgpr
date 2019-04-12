// Alle plugins die worden gebruikt
var gulp = require('gulp');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var minify_css = require('gulp-cssnano');
var minify_js = require('gulp-uglify-es').default;
var concat = require('gulp-concat');
var livereload = require('gulp-livereload');

// De paden die worden gedefineerd
var paths = {
   resources: 'resources/',
   public: 'public/'
};

// De bestanden worden uit de hierboven genoemde paden worden gehaald
var sources = {
   javascript: [
      paths.resources + 'js/jquery.min.js',
      paths.resources + 'js/jspdf.min.js',
      paths.resources + 'js/main.js',
   ],
   scss: [
      paths.resources + 'sass'
   ]
};

// Error fallback functie
function onError(err) {
   console.log(err);
   this.emit('end');
}

// De sass compile functie
gulp.task("compile-scss", function() {
   return gulp.src('resources/sass/**.scss')
   .pipe(sass().on('error', sass.logError))
   .pipe(minify_css())
   .pipe(gulp.dest(paths.public + 'css'))
   .pipe(livereload())
}); 

// De js compile functie
gulp.task('compile-js', function() {
   return gulp.src(sources.javascript)
   .pipe(concat('main.min.js'))
   .pipe(minify_js())
   .pipe(rename('main.min.js'))
   .on('error', onError)
   .pipe(gulp.dest(paths.public + 'js'))
});

// De livereload functie
gulp.task('default', function() {
   livereload.listen();
   gulp.watch(paths.resources + 'sass/**.scss', gulp.series('compile-scss'));
   gulp.watch(paths.resources + 'js/main.js', gulp.series('compile-js'));
});

// Type gulp in the terminal to activate the compiler, Dont close it or it the process will be terminated!