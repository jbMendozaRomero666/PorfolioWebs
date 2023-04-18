const {
    src,
    dest,
    watch,
    parallel
} = require('gulp');//retorna multiples funciones, forma de extraer multiples valores {}
//css
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');

//javaScript
const terser = require('gulp-terser-js');
function css(done){
    console.log('estoy compilando...');

    src('src/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(sass())
    .pipe(postcss([autoprefixer(),cssnano()]))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('public/build/css'));

    done();

}

function javaScript(done){
  src('src/js/**/*.js')
  .pipe(terser())
  .pipe(sourcemaps.write('.'))
  .pipe(dest('public/build/js'));
  done();
}

function dev(done){
    watch('src/scss/**/*.scss',css);
    watch('src/js/**/*.js',javaScript);

}


exports.css = css;
exports.dev = parallel(javaScript,dev);