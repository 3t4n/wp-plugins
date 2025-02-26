=== Insert Block Pattern Block ===
Contributors: emunthe
Donate link: 
Tags: Gutenberg, Block, Theme Block Patterns
Requires at least: 5.5
Tested up to: 5.6
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Gutenberg Block for inserting Theme Block Patterns into page/post or into a insertable block (columns).

== Description ==

This Block inserts any Block Pattern at any insert point (+), also from inside a column block. 

The block is replaced by the Block Pattern content. (The "Insert Block Pattern" Block is removed)  

Theme Block Patterns are an excellent method for making well designed block content available to editors and authors.

This Block is a provisional solution. It will be maintained until the Block Pattern Library is extended.

= Languages =
1. English
2. Norwegian

== Screenshots ==
1. Insert Block Pattern into page ( a paragraph )
2. Insert Block Pattern into a Columns Block 


== Installation ==

= Manual Installation =

1. Unpack the  `insert-block-pattern-block.zip` to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

= NPM Installation =

A minimal `package.json`, `webpack.config.js` is included.

`Note: copy this into a .babelrc file at plugins/insert-block-pattern-block/.babelrc`
`{
  "presets": ["@babel/preset-env", "@babel/preset-react"],
  "plugins": [
    "@babel/plugin-syntax-dynamic-import",
    "@babel/plugin-proposal-class-properties"
  ]
}`

To install and build:

`plugins/insert-block-pattern-block/$ npm i`
`plugins/insert-block-pattern-block/$ npm run build`

= Creating language files =

1. Create .mo and .po files from the languages/ibpb.pot file for your language.

2. Check that textdomain in front of mo and po. The files need to be of the form: 'ibpb-<LOCALE\>.mo'. eg. ibpb-nb_NO.mo, ibpb-nb_NO.po 

3. Use WP-Cli at `plugins/ipbp/`

`$ wp i18n make-json languages/ibpb-<LOCALE\>.po --no-purge`

This produces a 2 json file with a hash strings.

It does not currently work directly by adding these 2 files - they must be combined into a new json file:

Copy one of the 2 generated files to:

`ibpb-<LOCALE\>-ibpb_blocks_registration.json`

Combine the messages into one file

`"locale_data": { "messages": { <MESSAGES HERE> }}`

Rename the source line to: 

`"source": "ibpb_blocks_registration.js"`,

This should end up with a file something like this:

`plugins/insert-block-pattern-block/languages/ibpb-<LOCALE\>-ibpb_blocks_registration.json`

`{
  "translation-revision-date": "2021-01-17 10:27+0100",
  "generator": "WP-CLI/2.2.0",
  "source": "ibpb_blocks_registration.js",
  "domain": "messages",
  "locale_data": {
    "messages": {
        "": {
            "domain": "messages",
            "lang": "nb_NO",
            "plural-forms": "nplurals=2; plural=(n != 1);"
          },
			  "Block for inserting a Block Pattern": [
				    "Blokk for \u00e5 sette inn ett blokkm\u00f8nster"
         ],
  		  "Block Pattern": ["Blokkm\u00f8nster"],
			  "Insert Block Pattern": ["Sett inn Blokkm\u00f8nster"],
			  "Select a Block Pattern Category": ["Velg kategori"],
			  "Uncategorized": ["Ukategorisert"],
			  "Select a Block Pattern": ["Velg Blokk m\u00f8nster"]
		}
	}
}`

== Frequently Asked Questions ==

= Can the the Insert Block Pattern Block insert into a column ? =

Yes.

= Is this block used in production environment ? =

Yes.

= Is support provided ? =

The plugin will be maintained until the Block Pattern Library is extended with similar functionality.

The plugin is used in production but will be kept as simple as possible.  

= Does the plugin have language support ? =

Yes. There is a pot file included. It is tranlated to Norwegian.

= Does the plugin include the source code ? =

Yes.



== Changelog ==

= 1.0 =
* Release version 1.0.

