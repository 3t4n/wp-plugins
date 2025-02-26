<?php
/*
Plugin Name: Randon Cat Facts
Plugin URI: http://www.topcatlitterboxes.com/cat-facts-plugin
Description: Displays a random fact about cats
Version: 0.1
Author: TopCats
Author URI: http://www.topcatlitterboxes.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
function cat_facts(){
$facts = array();
$facts = array("Cats have amazing night vision requiring only one sixth the amount of light to see objects as humans need.","Contrary to what many people think cats have much better sense of hearing than dogs. They can detect frequencies ranging from 55Hz to 79 kHz while dogs can only hear up to 44 kHz. Humans can hear only up to a meager 18 kHz.","Think a cat's whiskers are only on its face? In fact cats have whiskers all over their bodies which help them detect objects in the dark by sensing currents of air and by touching them.","Their sense of smell is not as acute as a dog's (or else we may have had sniffer cats prowling airports) but about twice more powerful than a human's.","Due to a mutation that occurred during the evolution of the cat they cannot taste sweetness, they only respond to bitter tastes. So if that chocolate bar you left on the table to enjoy after dinner goes missing don't blame the cat.","Cats can tolerate very high temperatures, staying comfortable up to 52oC, 10oC more than a human. At such temperatures, they don't sweat but pant a lot more.","Cats love to sleep, snoozing away for 13 to 16 hours on average. While other lazier varieties stay awake for just four hours a day. The phrase cat nap is adopted from such behavior of cats.","Cats are obsessively clean animals who love to groom themselves all day. Microscopic spikes on their tongues are used as a comb. So if you see a cat belching out a hair ball, you know where it came from.","Ailurophilia is the 'love of cats.'","There are more than 500 million domestic cats in the world, with 33 different breeds.","A cat's heart beats twice as fast as a human heart, at 110 to 140 beats per minute.","The largest cat breed is the Ragdoll.   Males weigh twelve to twenty pounds, with females weighing ten to fifteen pounds.   The smallest cat breed is the Singapura.  Males weigh about six pounds while females weigh about four pounds.","If your cat is near you, and her tail is quivering, this is the greatest expression of love your cat can give you.   If her tail starts thrashing, her mood has changed --- Time to distance yourself from her.","Cats wag their tails when it is in a stage of conflict.  The cat wants to do two things at once, but each impulse blocks the other.  For example:   If your cat is in the doorway wanting to go outside, and you open the door to find it raining, the cat's tail will wag because of internal conflict.  The cat wants to go outside, but doesn't want to go into the rain.  Once the cat makes a decision and either returns to the house or leaves into the rain, the tail will immediately stop wagging.","Don't pick a kitten or a cat up by the scruff of its neck;  only mother cats can do this safely, and only with their kittens.","The largest known litter (with all surviving) was that of a Persian in South Africa named Bluebell.  Bluebell gave birth to 14 kittens in one litter!","A single pair of cats and their kittens can produce as many as 420,000 kittens in just 7 years.","Cats have 290 bones in their bodies, and 517 muscles.");
$numberoffacts = count($facts);
$pickfact = rand(0,$numberoffacts);
echo '<span class="catfacts"><p><span style="font-weight=bold;">Cat fact: </span>'.$facts[$pickfact].'</p></span>';
}

function cat_facts_shortcode() {
$return = cat_facts();
return $return;
}

add_shortcode('catfacts', 'cat_facts');

?>