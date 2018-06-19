// Dependencies
var gulp = require('gulp'),     
    sass = require('gulp-ruby-sass') 
    notify = require("gulp-notify") 
    bower = require('gulp-bower');

/* The sassPath is the folder to store Sass files, 
and bowerDir is the path to 'bower_components'. */
var config = {
     sassPath: './resources/sass',
     bowerDir: './bower_components' 
}

// Setup up gulp task for running bower.
gulp.task('bower', function() { 
    return bower()
         .pipe(gulp.dest(config.bowerDir)) 
});

/* Moving content in bower_components/font-awesome/fonts/ 
directory to ./public/fonts. */
gulp.task('icons', function() { 
    return gulp.src('./bower_components/font-awesome/fonts/**.*') 
        .pipe(gulp.dest('./public/_fonts')); 
});

/* Setting up Sass and linking bootstrap and font-awesome 
into path so sass files can access them. */
gulp.task('css', function() { 
    return gulp.src(config.sassPath + '/main.scss')
         .pipe(sass({
             style: 'compressed',
             loadPath: [
                 './resources/sass',
                 config.bowerDir + '/bootstrap-sass/assets/stylesheets',
                 config.bowerDir + '/font-awesome/scss',
             ]
         }) 
            .on("error", notify.onError(function (error) {
                 return "Error: " + error.message;
             }))) 
         .pipe(gulp.dest('./public/_css')); 
});

// Rerun the task when a file changes
 gulp.task('watch', function() {
     gulp.watch(config.sassPath + '/**/*.scss', ['css']); 
});

  gulp.task('default', ['bower', 'icons', 'css']);