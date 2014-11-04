module.exports = function( grunt ) {

  require( 'load-grunt-tasks' )( grunt );

  grunt.initConfig({

    pkg: grunt.file.readJSON( 'package.json' ),

    watch: {
      css: {
        files: [ 'assets/css/src/*.css' ],
        tasks: [ 'cssmin', 'autoprefixer' ]
      },
      js: {
        files: [ 'assets/js/src/*.js' ],
        tasks: [ 'uglify' ]
      }
    },

    cssmin: {
      build: {
        files: {
          'assets/css/app.css': [ 'assets/css/src/reset.css', 'assets/css/src/app.css' ]
        }
      }
    },

    autoprefixer: {
      build: {
        src: 'assets/css/app.css',
        dest: 'assets/css/app.css'
      }
    },

    uglify: {
      build: {
        files: {
          'assets/js/app.js': [ 'assets/js/src/app.js' ]
        }
      }
    }

  });

  grunt.registerTask( 'default', [ 'watch' ] );

};