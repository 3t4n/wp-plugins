Bitcoin Blockheight
===============
* Contributors: markjr13, tejinderb
* Tags: bitcoin, blockheight, timestamp
* Requires at least: 5.4
* Tested up to: 6.7.1
* Requires PHP: 7.0
* Stable tag: 1.0.2
* Donate Link: https://thirteen.ca/micro-saas-empire/bitcoin-blockheight/
* License: GNU General Public License v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html


Bitcoin Blockheight is a straight-forward plugin that fetches the current Bitcoin Blockheight and adds it to your Wordpress posts, under or beside the post date field.

## Description

This plugin offers limited support. This is something I had developed for my own blog (Bombthrower.com) and decided to release it because a lot Bitcoiners have taken to referring to the blockheight as a kind of timestamp.

In the back of my mind I have the idea that if it becomes widely used, I may add options to link the blockheight field to an on-chain copy of the post somewhere, like IPFS (or maybe an ordinal).

== Screenshots ==

1. The current blockheight is fetched when you publish your post
2. There are a few methods to control display, including a shortcode
3. The blockheight shows up as if it were a date field

== Frequently Asked Questions ==

### How does it get the blockheight?

It makes a call to an endpoint maintained on a server here, it's just a .txt file with the current blockheight. There's cronjob that populates that from a nearby Bitcoin node on our network. 

### Does it support any other blockchains? Like Ethereum?

No. Next question.

### Does it update the blockheight for a post when it is revised? 

Not yet. This may be added if there is any demand for it.

== Support ==

If you have a question or concern around the plugin, you can: 

	* Email me at microsaas@thirteen.ca 
	* Catch me on Twitter: @Stuntpope
	* On Nostr: npub1elwpzsul8d9k4tgxqdjuzxp0wa94ysr4zu9xeudrcxe2h3sazqkq5mehan (NIP-05: markjr@bombthrower.com) 

If you find this plugin useful, please consider donating to support its development:

- via BTC: bc1qcjjk8f9ynznm9aqx4lqtaucw5y8qs0gs0a8aju

- Lightning: lnbc1pjzem7hpp502vefct5jyv4lgjrhr76rstfvgq4tsds7eyhvsts9z6l47exr0fsdqu2askcmr9wssx7e3q2dshgmmndp5scqzpgxqyz5vqsp5hjumlyrmchfvkd0q3tc3q0kktlpnu7d3frjk4ln5uq4n6pjm00zs9qyyssqma8xvjhshaq25aq0p5t85eyq2jjxsygjd97ka0tmrtpaajndwmj4xf5x4mtjalp8xzj8mz8ju6kmyet8l8r59z3a75nu60npglddltspfffw7c


== ChangeLog ==

= 1.0.2 = 

* fixed number_format() for PHP8 

= 1.0.1 =

* a call to getblockheight() was missing its function prefix
