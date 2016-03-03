var elixir = require('laravel-elixir');
var gulp = require('gulp');
var concat = require('gulp-concat');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

 var pluginPath = 'bower_components';
 var pluginjs = [
  pluginPath + "/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js",
  pluginPath + "/AdminLTE/bootstrap/js/bootstrap.min.js",
  pluginPath + "/AdminLTE/dist/js/app.min.js",
  pluginPath + "/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"

 ];
 var plugincss = [
  pluginPath + "/AdminLTE/bootstrap/css/bootstrap.min.css",
  pluginPath + "/AdminLTE/dist/css/AdminLTE.min.css",
  pluginPath + "/AdminLTE/dist/css/skins/skin-blue.min.css"

 ];
elixir(function(mix) {
    mix.sass('app.scss')
        .scripts('common.js')
        .scripts('task.js');
        //.scripts(['common.js','task.js'],'all.js')
});

gulp.task("pluginjs", function() {
    return gulp.src(pluginjs)
        .pipe(concat('plugin.js'))
        .pipe(gulp.dest('public/vendor/js'));
});

gulp.task("plugincss", function() {
    return gulp.src(plugincss)
        .pipe(concat('plugin.css'))
        .pipe(gulp.dest('public/vendor/css'));
});

gulp.task("plugin", ["plugincss", "pluginjs"]);
