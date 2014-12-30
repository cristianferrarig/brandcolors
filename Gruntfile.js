module.exports = function( grunt ) {

  require( 'load-grunt-tasks' )( grunt );

  grunt.initConfig({

    pkg: grunt.file.readJSON( 'package.json' ),

    watch: {
      options: {
        livereload: true
      },
      less: {
        files: 'assets/less/**/*',
        tasks: [ 'less:build', 'autoprefixer:build', 'cssmin:build' ]
      },
      js: {
        files: 'assets/js/src/**/*',
        tasks: 'uglify:build'
      }
    },

    less: {
      build: {
        src: 'assets/less/brandcolors.less',
        dest: 'assets/css/src/brandcolors.css'
      }
    },

    autoprefixer: {
      build: {
        src: 'assets/css/src/brandcolors.css',
        dest: 'assets/css/src/brandcolors.css'
      }
    },

    cssmin: {
      build: {
        src: 'assets/css/src/brandcolors.css',
        dest: 'assets/css/master.css'
      }
    },

    uglify: {
      build: {
        src: 'assets/js/src/brandcolors.js',
        dest: 'assets/js/master.js'
      }
    }

  });

  grunt.registerTask( 'default', [ 'watch' ] );

};