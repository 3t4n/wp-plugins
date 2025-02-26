# Requires coffee-script and uglifyjs

{ exec, spawn } = require 'child_process'
fs = require 'fs'

# Use first CoffeeScript file
csRegex = /\.coffee$/
src    = ( file.replace csRegex, '' for file in fs.readdirSync('.') when file.match csRegex )[0]
date   = new Date().toDateString()
banner = """
/*!
* Highlight Permalinked Comment
* Copyright (c) Evan Solomon #{date}
* Licensed GPL
*/
"""

prependBanner = ( targetFile ) ->
	fs.readFile targetFile, 'utf-8', ( err, code ) ->
		return if err
		fs.writeFile targetFile, "#{banner}\n#{code}"

task 'build', 'compile and minify', ->
	exec "coffee -c #{src}.coffee && uglifyjs #{src}.js -cm -o #{src}.min.js", ->
		for ext in [ 'js', 'min.js' ]
			targetFile = "#{src}.#{ext}"
			prependBanner targetFile if fs.existsSync targetFile
