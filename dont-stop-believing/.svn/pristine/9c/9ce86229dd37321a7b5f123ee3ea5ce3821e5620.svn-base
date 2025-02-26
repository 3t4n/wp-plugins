<?php
/*
Plugin Name: Don't Stop Believing
Plugin URI: http://www.chuchurocketeer.net/?p=349
Description: <cite>Any way you want it, that's the way you need it!</cite>  The Rock Ballad is a helluva drug, and this plug-in reminds you the overwhelming power of song, mullets, and a particular tiny leopard-print yellow muscle tee. Let Journey's lyrics drown you with a deluge of 80's anthem awesomeness and send you awash in a sea of lighter-waving electrolytes.  Let us sing high and mighty, for our diaphragms should be pushed up into our lungs!   Inspired by the <cite>Hello, Dolly</cite> plug-in, when Don't Stop Believing is activated, you will see a line of lyrics from random Journey's classic hits in the upper right of your admin screen on every page.
Author: Karen Chu
Version: 1.0
Author URI: http://chucuhrocketeer.net
*/


$lyrics = "Any way you want it 
thats the way you need it
Anyway you want it
She loves to laugh, she loves to sing
She does everything
She loves to move, she loves to groove
She loves a lot of things
All night, all night, oh every night
So hold tight, hold tight
Oh baby hold tight
Any way you want it
Thats the way you need it
any way you want it
thats the way you need it 
any way you want it
I was alone, I never knew
What love could do
Then we touched, and we sang
About the lovely things
All night, all night, oh every night
So hold tight, hold tight
Oh baby hold tight
She said, anyway you want it
thats the way you need it
She said Oooohhhhhhhhhhh
Hold tight, hold tight
Just a small town girl
Livin' in a lonely world
She took the midnight train
Goin' anywhere
Just a city boy
Born and raised in South Detroit
He took the midnight train
Goin' anywhere
A singer in a smokey room
A smell of wine and cheap perfume
For a smile they can share the night
It goes on and on and on and on
Strangers waiting
Up and down the boulevard
Their shadows searching in the night
Streetlights, people
Livin' just to find emotion
Hidin', somewhere in the night
Workin' hard to get my fill
Everybody wants a thrill
Payin' anything to roll the dice
Just one more time
Some will win, some will lose
Some were born to sing the blues
Oh, the movie never ends
It goes on and on and on and on
Strangers waiting
Up and down the boulevard
Their shadows searching in the night
Streetlights, people
Livin' just to find emotion
Hidin', somewhere in the night
Winter is here again, oh Lord
Haven't been home in a year or more
I hope she holds on a little longer
Sent a letter on a long summer day
Made of silver, not of clay
I've been runnin' down this dusty road
Wheel in the sky keeps on turnin'
I don't know where I'll be tomorrow
Wheel in the sky keeps on turnin'
I've been trying to make it home
Got to make it before too long
I can't take this very much longer
I'm stranded in the sleet and rain
Don't think I'm ever gonna make it home again
The mornin' sun is risin'
It's kissing the day
Wheel in the sky keeps on turnin'
I don't know where I'll be tomorrow
Wheel in the sky keeps on turnin'
Highway run... into the midnight sun
Wheels go round and round
You're on my mind
Restless hearts... sleep alone tonight
Sending all my love
Along the wire
They say that the road ain't no place to start a family
Right down the line
It's been you and me
And lovin' a music man ain't always what it's supposed to be
Oh, girl, you stand by me
I'm forever yours... faithfully
Circus life
Under the big top world
We all need the clowns to make us smile
Through space and time
Always another show
Wondering where I am, lost without you
And being apart ain't easy on this love affair
Two strangers learn to fall in love again
I get the joy of rediscovering you
Oh, girl, you stand by me
I'm forever yours... faithfully
Whooa, oh-oh-ooh
Whooa, oh-oh-ooh, oh
Whooa, oh-oh-oh, oh-whoooooa-oh
Faithfully
I'm still yours
I'm forever yours
Ever yours
Faithfully
Here we stand, worlds apart
Hearts broken in two, two, two
Sleepless nights, losing ground
I'm reaching for you, you, you
Feelin' that it's gone
Can't change your mind
If we can't go on to survive the tide
Love divides
Someday love will find you
Break those chains that bind you
One night will remind you
How we touched and went our separate ways
If he ever hurts you
True love won't desert you
You know I still love you
Though we touched and went our separate ways
Troubled times
Caught between confusions and pain, pain, pain
Distant eyes
Promises we made were in vain
In vain, vain
If you must go, I wish you love
You'll never walk alone
Take care my love, miss you love
Someday love will find you
Break those chains that bind you
One night will remind you
How we touched and went our separate ways
If he ever hurts you
True love won't desert you
You know I still love you
Though we touched and went our separate ways
Oooooooooh
Someday love will find you
Break those chains that bind you
One night will remind you
If he ever hurts you
True love won't desert you
You know I still love you
I still love you, girl
I really love you, girl
And if he ever hurts you
True love won't desert you
Nooooooooo
Nooooooooo
When the lights go down in the City
And the sun shines on the bay
I want to be there in my City
Ooh, ooh
So you think you're lonely
Well my friend I'm lonely too
I want to get back to my City by the bay
Ooh, ooh
It's sad, oh there's been mornings out on the road without you,
Without your charms,
Ooh, my, my, my
Lying beside you here in the dark
Feeling your heart with mine
Softly you whisper
You're so sincere
How could our love be so blind
We sailed on together
We drifted apart
And here you are by my side
So now I come to you with open arms
Nothing to hide
Believe what I say
So here I am with open arms
Hoping you'll see
What your love means to me
Open arms
Living without you, living alone
This empty house seems so cold
Wanting to hold you, wanting you near
How much I wanted you home
But now that you've come back
Turned night into day
I need you to stay
So now I come to you with open arms
Nothing to hide
Believe what I say
So here I am with open arms
Hoping you'll see
What your love means to me
Open arms";


$lyrics = explode("\n", $lyrics);
$chosen = wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );


function dont_stop_believing() {
	global $chosen;
	echo "<p id='dsb'>$chosen</p>";
}


add_action('admin_footer', 'dont_stop_believing');


function dsb_css() {
	echo "
	<style type='text/css'>
	#dsb {
		position: absolute;
		top: 2.3em;
		margin: 0;
		padding: 0;
		right: 10px;
		font-size: 14px;
		font: Arial;
		color: #960483;
	}
	</style>
	";
}

add_action('admin_head', 'dsb_css');

?>