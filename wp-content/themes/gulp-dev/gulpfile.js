const themename = 'mowp';

const gulp = require('gulp'),
// Prepare and optimize code etc
autoprefixer  = require('autoprefixer'),
browserSync   = require('browser-sync').create(),
imagemin      = require('gulp-image'),
sass          = require('gulp-sass'),
sourcemaps    = require('gulp-sourcemaps'),
concat        = require('gulp-concat'),
rename        = require('gulp-rename'),

root = '../' + themename + '/',
scss = root + 'sass/',
bootstrap = scss + 'bootstrap/',
js = root + 'js/',
images = root + 'image/',
imagemini = root + 'img/',
fonts = root + 'fonts/',
css = root + 'css/';

gulp.task('images', function() {
	return gulp.src(images + '/**/*.{jpg,JPG,png}')
			.pipe(imagemin())
			.pipe(gulp.dest(imagemini));
});

gulp.task('bootstrap', function () {
	return gulp.src(['node_modules/bootstrap/scss/*'])
	.pipe(gulp.dest(bootstrap));
});

// gulp.task('vendorbs', function () {
//     return gulp.src('node_modules/bootstrap/scss/vendor/*')
//         .pipe(gulp.dest(bootstrap + 'vendor/'));
// });

gulp.task('sass', function () {
return gulp.src([scss + '{style.scss,rtl.scss}'])
.pipe(sourcemaps.init())
.pipe(sass({
    outputStyle: 'expanded',
    indentType: 'tab',
    indentWidth: '1'
}).on('error', sass.logError))
.pipe(sourcemaps.write(scss + 'maps'))	
.pipe(gulp.dest(root))
.pipe(browserSync.stream());

});

gulp.task('woocommerce', function () {
  return gulp.src([scss + 'woocommerce.scss'])
  .pipe(sourcemaps.init())
  .pipe(sass({
      outputStyle: 'expanded',
      indentType: 'tab',
      indentWidth: '1'
  }).on('error', sass.logError))
  .pipe(sourcemaps.write(scss + 'maps'))	
  .pipe(gulp.dest(root))
  .pipe(browserSync.stream());
  
  });


// Add all External Css files into css folder
gulp.task('styles', function () {
return gulp.src([scss])
.pipe(sourcemaps.init())
.pipe(sass({
outputStyle: 'expanded',
indentType: 'tab',
indentWidth: '1'
}).on('error', sass.logError))
.pipe(sourcemaps.write(scss + 'maps'))	
.pipe(gulp.dest(css))
// .pipe(browserSync.stream());

});

// Move JS files to production/JS
gulp.task('js', function(){
	return gulp.src([js + '*.js'])
  .pipe(gulp.dest(js))
  // .pipe(browserSync.stream());
});




// // Move Fonts Folder to production/fonts
// gulp.task('fonts', function(){
//     return gulp.src(['node_modules/font-awesome/fonts/*','node_modules/ionicons/dist/fonts/*','node_modules/icomoon/style.css','node_modules/open-iconic/font/fonts'])
//         .pipe(gulp.dest(fonts));
// });

// // Icomoon Directory for the styles
// gulp.task('icomoon', function(){
//     return gulp.src('node_modules/icomoon/fonts/*')
//         .pipe(gulp.dest(fonts + 'fonts/'))
// });

// Watch Sass & server
gulp.task('serve',['sass','styles','bootstrap','woocommerce','js','images'], function(){
  browserSync.init({
			open: 'external',
			proxy: 'localhost/asbab/',
			port: 8888
  });
  gulp.watch(root + '**/*.scss' ,['sass','styles','bootstrap','woocommerce']);
  gulp.watch(js + '**/*.js',['js']);
	gulp.watch(images , ['images']);
	gulp.watch(root + '**/*.php').on('change', browserSync.reload);
});





gulp.task('default',['serve']);
