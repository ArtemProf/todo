var globalOptions = {
	dot:true,
	livereload:35740
};

var globalExcludes = [
	'!node_modules/**',
	'!vendor/**'
];

module.exports = function (grunt){
	grunt.initConfig({
		cfgBootstrapResultDir: './frontend/web/css/bootstrap',
		cfgBootstrapSourceDir: './vendor/bower/bootstrap',
		shell:{
			migrations:{
				command:'./common/yii migrate/down 1 --interactive=0; ./common/yii migrate --interactive=0;'
			},
			assets:{
				command:'rm -rf ./frontend/web/assets/*; touch frontend/web/index.php'
			},
			bootstrap:{
				command:[
					'rm -f /tmp/{bootstrap,variables}.less',
					'cp <%=cfgBootstrapSourceDir%>/less/{bootstrap,variables}.less /tmp/',
					'cp <%=cfgBootstrapResultDir%>/config/bootstrap.less <%=cfgBootstrapSourceDir%>/less/',
					'cp <%=cfgBootstrapResultDir%>/config/variables.less <%=cfgBootstrapSourceDir%>/less/',
					'cd <%=cfgBootstrapSourceDir%> && npm update && grunt dist',
					'cp ./dist/css/bootstrap.min.css ../../../<%=cfgBootstrapResultDir%>/bootstrap.css',
					'cp ./dist/js/bootstrap.min.js ../../../<%=cfgBootstrapResultDir%>/bootstrap.js',
					'mv /tmp/bootstrap.less /tmp/variables.less ./less/'
				].join(' && ')
			},
			composer:{
				command:'composer update --no-interaction --optimize-autoloader'
			}
		},
		less:{
			development:{
				options:{
					compress:true,
					yuicompress:true,
					optimization:2
				},
				files:{
					'frontend/web/css/style.css':'frontend/web/css/style.less'
				}
			}
		},
		sprite:{
			css:{
				src:'frontend/web/img/sprite/*.png',
				dest:'frontend/web/img/sprite.1.png',
				destCss:'frontend/web/css/sprite.css'
			},
			less:{
				src:'frontend/web/img/sprite/*.png',
				dest:'frontend/web/img/sprite.1.png',
				destCss:'frontend/web/css/sprite.less'
			}
		},
		watch:{
			reload:{
				files:['**/*.{php,css,js}'].concat(globalExcludes),
				options:globalOptions
			},
			coffee:{
				files:['**/*.coffee'],
				tasks:['coffee']
			},
			migrations:{
				files:['**/migrations/*.php'].concat(globalExcludes),
				tasks:['shell:migrations'],
				options:globalOptions
			},
			sprite:{
				files:'frontend/web/img/sprite/*.png',
				tasks:['sprite']
			},
			lessBootstrap:{
				files:['frontend/web/css/bootstrap/config/*.less'],
				tasks:['shell:bootstrap']
			},
			less:{
				files:['**/*.less', 'frontend/web/css/bootstrap/bootstrap.css'].concat(globalExcludes).concat(['!frontend/web/css/bootstrap/config/*.less']),
				tasks:['less']
			},
			composer:{
				files:['composer.json', 'bower.json', 'package.json'],
				tasks:['shell:composer']
			}
		}
	});

	grunt.registerTask('default', ['watch']);
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-spritesmith');
	grunt.loadNpmTasks('grunt-shell');
};
