'use strict';
module.exports = function(grunt) {

    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch our project for changes
        watch: {
            less: {
				files: ['public/assets/less/*/**'],
                tasks: ['less']
            },
            livereload: {
                options: { livereload: true },
                files: ['public/assets/**/*', 'admin/assets/**/*', '**/*.html', '**/*.php', 'public/assets/img/**/*.{png,jpg,jpeg,gif,webp,svg}']
            }
        },
        // less compiling
		less: {

		  	publicLess: {
		    	options: {
		      		paths: ["public/assets/less/*/**"],
		      		cleancss:true
		    	},
		    	files: {
		      		"public/assets/css/wp-status-page.css": 	"public/assets/less/master.less"
		    	}
		  	}
		},
   		uglify: {

            publicscripts: {
               	files: {
                    'public/assets/js/wp-status-page.min.js': [
                     	'public/assets/js/source/general.js'
                    ]
                }
            }
        }

    });

    // register task
    grunt.registerTask('default', ['watch']);

};