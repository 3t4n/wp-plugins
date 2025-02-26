.PHONY: all
all: assets/js/admin-script.min.js assets/js/script.min.js assets/css/styles.min.css assets/css/admin-styles.min.css

assets/css/admin-styles.min.css: assets/css/admin-styles.css
	npx lightningcss --minify $^  -o $@

assets/css/styles.min.css: assets/css/styles.css
	npx lightningcss --minify $^  -o $@

assets/js/admin-script.min.js: assets/js/admin-script.js
	npx terser $^ --compress --mangle -o $@

assets/js/script.min.js: assets/js/script.js
	npx terser $^ --compress --mangle -o $@
