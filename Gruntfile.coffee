module.exports = (grunt) ->

  grunt.loadNpmTasks 'grunt-contrib-less'
  grunt.task.loadNpmTasks 'grunt-contrib-watch'

  grunt.initConfig
    less:
      options:
        compress: true

      main:
        src: ['./assets/css/main.less']
        dest: './assets/css/main.css'

      admin:
        src: ['./assets/css/admin.less']
        dest: './assets/css/admin.css'

    watch:
      less:
        files: ['./assets/css/*.less'],
        tasks: ['less']

  grunt.event.on 'coffee.error', (msg) ->
    console.log "ERROR : " + msg

  grunt.registerTask 'default', ['less', 'watch']
