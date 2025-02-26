<?php
/**
 * Plugin Name: Kotowaza
 * Description: Proverbs that are transmitted to Japan are randomly displayed in the upper right corner of the management screen.
 * Version:     1.2.5 beta
 * Author:      nzwy
 * License:     GPLv2
 * Text Domain: kotowaza
 *
 * @package kotowaza
 * @version 1.2.5 beta
 */

function get_kotowaza() {
	$kotowaza = 'Make haste slowly.
Out of the mouth comes evil.
Better to ask the way than go astray.
Failure teaches success.
Kill two birds with one stone.
Good fortune and happiness will come to the home of those who smile.
When the cat’s away, the mice will play.
If you can’t beat them, join them.
When one door shuts, another opens.
So many men, so many minds.
Birds of a feather flock together.
Let sleeping dogs lie.
He that will lie will steal.
No pain, no gain.
Speech is silver, silence is golden.
A word to the wise is enough.
Patience is a virtue.
What happens twice will happen three times.-1-45
Third time lucky.
A hedge between keeps friendship green.
Misfortunes never come singly.
He that would the daughter win, must with the mother first begin.
Tomorrow is another day.
Example is better than precept.
He that is always shooting must sometimes hit.
All’s well that ends well.
A picture is worth a thousand words.
If you chase two rabbits, you will not catch either.
The early bird catches a worm.
You have to learn to walk before you run.
Persistence pays off.
Bread is better than the songs of birds.
Stoop to conquer.
Spare the rod and spoil the child.
A wonder lasts but nine days.';

	$kotowaza = explode( "\n", $kotowaza );

	return wptexturize( $kotowaza[ mt_rand( 0, count( $kotowaza ) - 1 ) ] );
}

function output_kotowaza() {
	$kotowaza = get_kotowaza();
	echo '<p id="kotowaza"><span dir="ltr" lang="en">' . $kotowaza . '</span></p>';
	
	echo ' <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />';
	
	/*
		$res = curl_exec( $ch );
	*/
}

add_action( 'admin_notices', 'output_kotowaza' );

function kotowaza_css() {
	echo "
	<style type='text/css'>
	#kotowaza {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #kotowaza {
		float: left;
	}
	.block-editor-page #kotowaza {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#kotowaza,
		.rtl #kotowaza {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'kotowaza_css' );
