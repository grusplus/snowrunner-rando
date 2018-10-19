/**
 * Grunt!
 *
 * Front-end compile and dress-up directives
 *
 */

var webroot, // store local path to webroot
  path; // store local paths to files

webroot = 'webroot/';

path = {
  js: {
    src: webroot + '_private/js/',
    dest: webroot + 'js/'
  },
  sass: {
    src: webroot + '_private/sass/',
    dest: webroot + 'css/'
  },
};

module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

/**
 * SASS, with libsass
 * https://github.com/sindresorhus/grunt-sass
 */
    'sass': {
      options: {
        sourceMap: true
      },
      app: {
        src: path.sass.src + 'app.scss',
        dest: path.sass.dest + 'app.css'
      }
    },

/**
 * AutoPrefixer
 * https://github.com/nDmitry/grunt-autoprefixer
 */
    'autoprefixer': {
      options: {
        cascade: true
      },
      app: {
        map: path.sass.dest + 'app.css.map',
        src: path.sass.dest + 'app.css',
        dest: path.sass.dest + 'app.css'
      },
    },

/**
 * CSSMin
 * https://github.com/gruntjs/grunt-contrib-cssmin
 */
    'cssmin': {
      all: {
        expand: true,
        cwd: path.sass.dest,
        src: '*.css',
        dest: path.sass.dest,
        ext: '.css'
      }
    },

/**
 * Import
 * https://github.com/marcinrosinski/grunt-import
 */
    'import': {
      all: {
        files: [{
          expand: true,
          cwd: path.js.src,
          src: [
            '*.js',
            '!app.cjs.js'
          ],
          dest: path.js.dest
        }]
      }
    },

/**
 * UglifyJS
 * https://github.com/gruntjs/grunt-contrib-uglify
 */
    'uglify': {
      all: {
        expand: true,
        cwd: path.js.dest,
        src: ['*.js', '!*.cjs.js'],
        dest: path.js.dest,
        ext: '.js'
      }
    },

/**
 * Regex Replace
 * https://github.com/bomsy/grunt-regex-replace
 */
    'regex-replace': {
      // hack to make source maps work
      // replaces webroot/_prviate/etc. with /_private/etc.
      cssSourceMapFix: {
        src: [path.sass.dest + '*.map', path.sass.dest + '*.map'],
        actions: [{
          name: 'replace webroot',
          search: /webroot/g,
          replace: ''
        }]
      }
    },

/**
 * Watch
 * https://github.com/gruntjs/grunt-contrib-watch
 */
    'watch': {
      options: {
        livereload: true
      },
      sass: {
        files: [path.sass.src + '**/*.scss'],
        tasks: ['compile-css']
      },

      js: {
        files: [
          path.js.src + '**/*.js',
          '!' + path.js.src + 'app.cjs/**/*.js',
          '!' + path.js.src + 'app.cjs.js',
        ],
        tasks: ['compile-js']
      },
      cjs: {
        files: [
          path.js.src + 'app.cjs',
          path.js.src + 'app.cjs/**/*.js',
        ]
      }
    },

    // end grunt config
  });

  // Plugins
  grunt.loadNpmTasks('grunt-notify');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-import');
  grunt.loadNpmTasks('grunt-contrib-jst');
  grunt.loadNpmTasks('grunt-webfont');
  grunt.loadNpmTasks('grunt-regex-replace');
  grunt.loadNpmTasks('grunt-markdown');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Production plugins
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Dev Tasks
  grunt.registerTask('compile-js', ['import']);
  grunt.registerTask('compile-css', ['sass', 'autoprefixer']);
  grunt.registerTask('watch-js', ['watch:js', 'watch:cjs']);
  grunt.registerTask('watch-less', ['watch:less']);
  grunt.registerTask('compile', ['compile-js', 'compile-css']);

  // Deploy Tasks
  grunt.registerTask('prepare-css', ['cssmin']);
  grunt.registerTask('prepare-js', ['uglify']);
  grunt.registerTask('prepare', ['prepare-css', 'prepare-js']);

};
