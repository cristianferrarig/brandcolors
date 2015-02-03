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
        tasks: [ 'less:build', 'autoprefixer:build' ]
      },
      js: {
        files: 'assets/js/**/*'
      }
    },

    less: {
      build: {
        src: 'assets/less/brandcolors.less',
        dest: 'assets/css/brandcolors.css'
      }
    },

    autoprefixer: {
      build: {
        src: 'assets/css/brandcolors.css',
        dest: 'assets/css/brandcolors.css'
      }
    }

  });

  grunt.registerTask( 'default', [ 'watch' ] );

};