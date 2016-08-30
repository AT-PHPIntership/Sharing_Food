var gulp = require('gulp');
var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    
    mix.scripts([ 
	      'bower/AdminLTE/bootstrap/js/bootstrap.min.js',
	      'bower/AdminLTE/plugins/datatables/jquery.dataTables.min.js',
	      'bower/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js',
	      'bower/AdminLTE/plugins/morris/morris.min.js',
	      'bower/AdminLTE/plugins/knob/jquery.knob.js',
	      'bower/AdminLTE/plugins/daterangepicker/daterangepicker.js',
	      'bower/AdminLTE/plugins/datepicker/bootstrap-datepicker.js',
	      'bower/AdminLTE/plugins/fastclick/fastclick.js',
	      'bower/AdminLTE/dist/js/app.min.js',
	      'bower/AdminLTE/dist/js/demo.js',
	    ],
	    'public/backend/js/vendor.js',
	    'public'
	);
	mix.styles([
		  'bower/AdminLTE/bootstrap/css/bootstrap.min.css',
		  'bower/AdminLTE/plugins/datatables/dataTables.bootstrap.css',
	  	  'bower/AdminLTE/dist/css/AdminLTE.min.css',
	  	  'bower/AdminLTE/dist/css/skins/_all-skins.min.css',
	  	  'bower/AdminLTE/plugins/iCheck/flat/blue.css',
	  	  'bower/AdminLTE/plugins/morris/morris.css',
	  	  'bower/AdminLTE/plugins/datepicker/datepicker3.css',
	  	  'bower/AdminLTE/plugins/daterangepicker/daterangepicker.css',	      
	  ], 
	    'public/backend/css/vendor.css',
	    'public'
	);
});
