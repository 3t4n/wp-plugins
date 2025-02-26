module.exports = function ( grunt ) {

    // Project configuration.
    grunt.initConfig( {
        pkg              : 'Avatar Project',
        compress         : {
            main: {
                options: {
                    archive: 'avatar-project.zip'
                },
                src: [ '**', '!assets', '!assets/**', '!node_modules', '!node_modules/**', '!images', '!images/**', '!avatar-project.zip' ],
            }
        },
        responsive_images: {
            dev: {
                files  : [ {
                    expand: true,
                    src   : [ '**/*.jpg' ],
                    cwd   : 'images/',
                    dest  : 'avatars/'
                } ],
                options: {
                    sizes: [
                        {
                            name  : '32',
                            width : 32,
                            height: 32
                        },
                        {
                            name  : '64',
                            width : 64,
                            height: 64
                        },
                        {
                            name  : '128',
                            width : 128,
                            height: 128
                        },
                        {
                            name  : '256',
                            width : 256,
                            height: 256
                        },
                        {
                            name  : '512',
                            width : 512,
                            height: 512
                        }
                    ],
                }
            }
        },
    } )

    grunt.loadNpmTasks( 'grunt-responsive-images' )
    grunt.loadNpmTasks( 'grunt-contrib-compress' )

    // Default task(s).
    grunt.registerTask( 'default', [ 'responsive_images' ] )
    grunt.registerTask( 'zip', [ 'compress' ] )

}