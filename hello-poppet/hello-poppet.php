<?php
/*
Plugin Name: Hello Poppet
Plugin URI: https://isabelcastillo.com/free-plugins/hello-poppet
Description: Adds a random quote from <cite>Pirates of the Caribbean</cite>, all 4 movies, in the upper right of your admin screen on every page.
Version: 1.0.1
Author: Isabel Castillo
Author URI: https://isabelcastillo.com
License: GPL2

Copyright 2017 Isabel Castillo

Hello Poppet is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Hello Poppet is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Hello Poppet. If not, see <http://www.gnu.org/licenses/>.
*/
/**
 * Returns 1 quote from the Pirates of the Caribbean movies
 */
function hello_poppet_get_quote() {
	$quotes = array(
		// Part 1 - The Curse of the Black Pearl
		'Keep a weather eye on the horizon',
		'This is the day you will always remember as the day you almost caught Captain Jack Sparrow!',
		'Not all treasure is silver and gold, mate.',
		'Now... bring me that horizon.',
		'You\'re off the edge of the map, mate. Here there be monsters.',
		'Don\'t be alarmed, we\'re taking over the ship.',
		'Drink up, me hearties, yo ho!',
		'Son, I\'m Captain Jack Sparrow. Savvy?',
		'If you were waiting for the opportune moment, that was it.',
		'The code is more what you\'d call "guidelines" than actual rules.',
		'\'ello, poppet',
		'We know you\'re here, Poppet.',
		'I think I feel a change in the wind, says I.',
		'Easy on the goods, darling.',		
		'You think this wise, boy... crossing blades with a pirate?',
		'I hardly believe in ghost stories anymore, Captain Barbossa.',
		'Damn to the depths whatever muttonhead thought up \'parley\'!"',
		'You should know better than to wake a man when he\'s sleepin\'. It\'s bad luck!',
		'And the last we saw of ol\' Bill Turner, he was sinkin\' into the crushing black oblivion of Davy Jones\' Locker.',
		'Welcome aboard the Black Pearl, Miss Turner.',
		'I want you to know that I was rooting for you, mate.',
		'It would never have worked out between us, darling.',
		// Part 2 - Dead Man's Chest
		'Wherever we want to go, we go. That\'s what a ship is, you know.',
		'what the Black Pearl really is... is freedom.',		
		'Welcome to the Caribbean, love.',
		'I\'m deeply flattered, son, but my first and only love is the sea.',
		'There will come a time when you have a chance to do the right thing.',
		'Hide the rum.',
		'You know of Davy Jones? A man of the sea, a great sailor. Until he run afoul of that which vexes all men.',
		'Ah, Jack Sparrow does not know what he wants.',
		'There\'s more than one chest of value in these waters.',
		'But dere\'s a island, just south of de straits, where I trade spice for... mmm... delicious long pork.',
		'Sea turtles, mate. A pair of them strapped to my feet.',
		'We are very much alike, you and I, I and you... us.',
		'And what makes you think you\'re worthy to crew the Black Pearl?',
		'Truth be told, I\'ve never sailed a day in me life.',
		'One word love: curiosity. You long for freedom.',
		'He was a gentleman of fortune, he was!',
		// Part 3 - At World's End
		'One day at shore... ten years at sea.',
		'Jack! The world needs you back something fierce!',
		'The world used to be a bigger place.',
		'The world\'s still the same. There\'s just less in it.',
		'Why should I sail with any of you? Four of you have tried to kill me in the past... one of you succeeded.',
		'Mate, if you choose to lock your heart away you\'ll lose it for certain.',
		'You may kill me, but you can never insult me. Who am I?',
		'Sail the seas for eternity.',
		'Ten years, I looked after those who died at sea',
		'MY peanut!',
		'I have this magic compass that points to whatever I want.',
		'Gentlemen, hoist the colors!',
		'The Dutchman must have a captain.',
		'No one leaves the ship.',
		'Do you think he plans it all out, or just makes it up as he goes along?',
		'Well, slap me thrice and hand me to me mama!',
		'My vessel is magnificent and fierce and huge-ish.',
		'Aye, the wind\'s on our side, boys! That\'s all we need!',
		'All men are drawn to the sea, perilous though it may be.',
		'No cause is lost if there is but one fool left to fight for it.',
		'Send this pestilent, traitorous, cow-hearted, yeasty codpiece to the brig.',
		'By the sweat of our brow and the strength of our backs and the courage in our hearts!',
		'Why fight when you can negotiate?',
		'Frightened bilgerats aboard a derelict ship? No, no they will see free men and freedom!',
		'You know the problem with being the last of anything, by and by there be none left at all.',
		'Sometimes things come back mate. We\'re livin\' proof, you and me.',
		'You have a touch of destiny about you, William Turner.',
		'Land is where you are safe, Jack Sparrow, and so you will carry land with you.',
		'No, mate. I\'m free forever. Free to sail the seas beyond the edges of the map, free from death itself.',
		'I haven\'t the face for tentacles.',
		'We\'ll tie each other to the mast upside down so when the boat flips we\'ll be the right way up!',		
		'Mr. Gibbs, you may throw my hat if you like.',
		// Part 4 - On Stranger Tides
		'It\'s a pirate\'s life for me. Savvy?',
		'What were you doing in a Spanish convent, anyway?',
		'So I did what needed done... I survived.',		
		'Gentlemen, the fountain is the prize. Mermaid waters, that be our path.',
		'You\'ve stolen me. And I\'m here to take meself back.',
		'The seas may be rough, but I am the Captain!',
		'There\'ll be mermaids upon us within the hour, you mark my words. And we\'re the bait.',
		'I hear a rumor... Jack Sparrow is in London, hellbent to find the Fountain of Youth.',
		'There\'ll be dangers along the way... firstly mermaids, zombies... Blackbeard.',
		'We were peppered with cannon fire. And then the sea beneath the Pearl began to roil.',
		'I understand everything... except that wig.',
	);
	// randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

/**
 * Hook a quote to the admin notices
 */
add_action( 'admin_notices', 'hello_poppet' );
function hello_poppet() {
	$chosen = hello_poppet_get_quote();
	echo "<p id='poppet'>$chosen</p>";
}

/**
 * Insert CSS into the admin head to position our quote
 */
add_action( 'admin_head', 'poppet_css' );
function poppet_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';
	echo "<style>
	#poppet {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}</style>";
}
?>