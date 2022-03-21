const { dest, src, series, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify');
const uglifycss = require('gulp-uglifycss');
const rename = require('gulp-rename');

function clean() {
  return src('./css/main.css')
    .pipe(uglifycss({
      "maxLineLen": 80,
      "uglyComments": true
    }))
    .pipe(rename({ extname: '.min.css' }))
    .pipe(dest('./css'));
}

function build(cb) {
  src('./sass/main.scss')
    .pipe(sass())
    .pipe(rename({ basename: 'style', extname: '.css' }))
    .pipe(dest('.'));
  src('./sass/main.scss')
    .pipe(sass())
    .pipe(rename({ basename: 'main', extname: '.css' }))
    .pipe(dest('./css'));
  cb();
}
function listen() {
  watch('./sass/*.scss', series(build, clean));
}

exports.build = build;
exports.clean = clean;
exports.listen = listen;
exports.default = function () {
  build(clean);
  listen();
}