<?php
/*
Plugin Name: Arrested Development
Plugin URI: TBA
Description: A plugin based off Hello, Dolly that displays Arrested Development quotes at the top of your admin screen.
Author: Sarah Rennick
Version: 1.0
Author URI: http://sarahrennick.net
*/

function arrested_development_get_quote() {
	$quotes = "Illusion, Michael. A trick is something a whore does for money... Or candy!
Not tricks, Michael, illusions. A trick is something a whore does for money... Or cocaine!
You want your belt to buckle, not your chair.
There's always money in the banana stand.
NO TOUCHING!
STEVE HOLT!
Well, if it isn't the boy who lives under the stairs.
I'm looking for something that says \"Dad likes leather.\"
I don't understand the question, and I won't respond to it.
No, Mother. I can blow myself.
Annyong.
I mean, this family runs into problems and it's \"Oh, let's have Gob **** our way out of it.\"
I'm afraid I just blue myself.
I'd never thought I'd miss a hand so much.
Even if it means me taking a chubby, I will suck it up!
I wouldn't mind kissing that man between the cheeks.
Tobias, you blowhard!
Hey, fake Uncle Jack.
Why can’t I have hair and money and him nothing?
Oh my god! We're having a fire... Sale! Oh the burning! It burns me!
Who'd like a banger in the mouth?
Marry me!
Excuse me, do these effectively hide my thunder?
And say goodbye to these... Because it's the last time!
Bob Loblaw Law Blog
Do you guys know where I could get one of those gold T-shaped pendants?
You lied to me... you said my FATHER was my father, but my UNCLE is my father. MY FATHER IS MY UNCLE.
<em>Her?</em>
What do you think of when you hear the name \"Sudden Valley\"?
Check your lease man, because you're living in **** City!
And that's why you always leave a note.
Forget-Me-Now
There's unlimited juice? This party is gonna be off the hook!
Caw-ca-caw-ca-ca-caw!
I'M A MONSTER!
Don't leave your uncle T-Bag hanging.
Well, let's just say that I'm buy-curious.
I don't know what that is nor do I care to find out.
Come on!
No mother, I can blow myself. You've interfered for the last time.
You taste these tears. Taste my sad, Michael.
Taste the happy, Michael. Taste it.
Hey, brother.
Hey, brother-in-law.
Hey, adopted-brother.
Oh, great. And now you're mocking me. You selfish coun - try music loving lady.
Everybody dance <strong>NOW.</strong>
I'm an ideas man Michael. I think I proved that with \"**** Mountain.\"
Is there a little girl all here by herself? Daddy needs to get his rocks off.  
I was mistakenly voted out of a four-person housing situation in a \"pack first, no talking after\" scenario. 
Stupid, forgetful Michael.
I've made a huge mistake.";

	// Split the text into lines
	$quotes = explode( "\n", $quotes );

	// Randomly chooses a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the selected line
function arrested_development() {
	$selected = arrested_development_get_quote();
	echo "<p id='arrested_development'>$selected</p>";
}

// Set the function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'arrested_development' );

// CSS to position the paragraph
function arrested_development_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#arrested_development {
		float: $x;
		padding-$x: 10px;
		padding-top: 5px;		
		margin: 0;
		font-size: 12px;
	}
	</style>
	";
}

add_action( 'admin_head', 'arrested_development_css' );

?>