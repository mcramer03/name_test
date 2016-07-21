module.exports = function(grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		bower_concat: {

			all: {

				dest: {
					'js' : 'client/build/_bower.js',
					'css' : 'client/build/_bower.css'
				},
				include: [
					'jquery',
					'bootstrap',
					'bootstrap-css',
					'lunr.js'
				]

			}

		},

		concat: {

			js_concat: {

				src: ['client/build/_bower.js', 'client/src/js/**'],
				dest: 'public/assets/js/script.min.js'

			},

			css_concat: {

				src: ['client/build/_bower.css', 'client/src/css/*.css'],
				dest: 'public/assets/css/style.min.css'

			}

		},

		uglify: {

			build: {

				src: 'client/build/build.js',
				dest: 'public/assets/js/script.min.js'

			}

		}

	});

	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.loadNpmTasks('grunt-contrib-concat');

	grunt.loadNpmTasks('grunt-bower-concat');

	grunt.registerTask('default', ['bower_concat', 'concat']);

};