/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',
    // Task configuration.
    clean: {
      build: ['webroot/libs/*']
    },

    less: {
      development: {
        options: {
          paths: ['webroot/less', 'webroot/css'],
          banner: '/** <%= pkg.title || pkg.name %> - v<%= pkg.version %> **/\n'
        },
        files: {
          'webroot/css/sugar.css': 'webroot/less/sugar.less'
        }
      },
      production: {
        options: {
          paths: ['webroot/less', 'webroot/css'],
          compress: true,
          plugins: [
            //new (require('less-plugin-autoprefix'))({browsers: ["last 2 versions"]}),
            //new (require('less-plugin-clean-css'))({ advanced: true })
          ]
        },
        files: {
          'webroot/css/sugar.min.css': 'webroot/less/sugar.less'
        }
      }
    },
    copy: {
      libs: {
        options: {
          processContentExclude: ['**/*.{png,gif,jpg,ico,psd,ttf,otf,woff,svg}'],
          noProcess: ['**/*.{png,gif,jpg,ico,psd,ttf,otf,woff,woff2,svg}'], // processContentExclude has been renamed to noProcess
          encoding: null
        },
        files: [
          // includes files within path
          //{expand: true, cwd: 'node_modules/backbone/', src: ['**'], dest: 'webroot/libs/backbone/'},
          //{expand: true, cwd: 'node_modules/bootstrap/', src: ['dist/**'], dest: 'webroot/libs/bootstrap/'},
          //{expand: true, cwd: 'node_modules/chosen/', src: ['*.js', '*.css', '*.png'], dest: 'webroot/libs/chosen/'},
          {expand: true, cwd: 'node_modules/flag-icons/', src: ['css/**', 'flags/**'], dest: 'webroot/libs/flag-icons/'},
          {expand: true, cwd: 'node_modules/font-awesome/', src: ['css/**', 'fonts/**'], dest: 'webroot/libs/fontawesome/'},
          {expand: true, cwd: 'node_modules/ionicons/', src: ['css/**', 'fonts/**', 'png/**'], dest: 'webroot/libs/ionicons/'},
          {expand: true, cwd: 'node_modules/image-picker/image-picker/', src: ['**'], dest: 'webroot/libs/image-picker/'},
          {expand: true, cwd: 'node_modules/jquery/dist/', src: ['**'], dest: 'webroot/libs/jquery/'},
          //{expand: true, cwd: 'node_modules/jquery-ui/', src: ['*.js', 'themes/base/**'], dest: 'webroot/libs/jquery-ui/'},
          {expand: true, cwd: 'node_modules/jstree/dist/', src: ['**'], dest: 'webroot/libs/jstree/'},
          {expand: true, cwd: 'node_modules/pickadate/lib/compressed', src: ['**'], dest: 'webroot/libs/pickadate/'},
          {expand: true, cwd: 'node_modules/tinymce/', src: ['**'], dest: 'webroot/libs/tinymce/'},
          {expand: true, cwd: 'webroot/js/tinymce/langs/', src: ['**'], dest: 'webroot/libs/tinymce/langs/'},
          {expand: true, cwd: 'node_modules/underscore/', src: ['*.js'], dest: 'webroot/libs/underscore/'},
          {expand: true, cwd: 'node_modules/sumoselect/', src: ['*.js', '*.css'], dest: 'webroot/libs/sumoselect/'},
          {expand: true, cwd: 'node_modules/select2/', src: ['dist/**'], dest: 'webroot/libs/select2/'},
          {expand: true, cwd: 'node_modules/select2-bootstrap-theme/', src: ['dist/**'], dest: 'webroot/libs/select2-bootstrap-theme/'},
          {expand: true, cwd: 'node_modules/daterangepicker/', src: ['*.js', '*.css', '*.png'], dest: 'webroot/libs/daterangepicker/'},
          {expand: true, cwd: 'node_modules/toastr/build/', src: ['**'], dest: 'webroot/libs/toastr/'},
          {expand: true, cwd: 'node_modules/sweetalert2/dist/', src: ['**'], dest: 'webroot/libs/sweetalert2/'},
          //{expand: true, cwd: 'node_modules/jqvmap/dist/', src: ['**'], dest: 'webroot/libs/jqvmap/'}
        ]
      },
    },
    watch: {
      assets: {
        files: [
          'webroot/less/**/*.less'
        ],
        tasks: ['less'],
        options: {
          spawn: false
        }
      }
    }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-clean');

  // Default task.
  grunt.registerTask('default', ['clean', 'less', 'copy']);

};
