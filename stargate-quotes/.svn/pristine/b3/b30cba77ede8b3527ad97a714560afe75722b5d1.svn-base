<?php
/*
Plugin Name: Stargate Quotes
Plugin URI: http://pgrytdal.tk/projects/stargate-quotes-plugin/
Description: When activated, this plugin will randomly display quotes from the Stargate franchise on every page of your user dashboard. Based on the Hello Dolly plugin by Matt Mullenweg.
Author: pgrytdal
Version: 1.6
Author URI: http://pgrytdal.tk/

**************************************************************************

Copyright (C) 2011-2012 Pgrytdal

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.


**************************************************************************/


function hello_stargate_get_lines() {
$lyrics = "Stargate Quotes
Yes, you go down the dark hallway alone, and I'll stay in the dark room alone.
Things will not calm down, Daniel Jackson. They will, in fact, calm up.
Do we or do we not have a Zanax detector?
I've heard of a place where Earth women do battle in a ring of Jello.
Indeed.
It took us 15 years and three super computers to MacGyver a system that worked.
Jack: Guess I'm going to have to cancel that Oprah interview. Teal'c: What is an \"oprah\"?
Had the Wraith attended the Geneva Convention they would have tried to feed on everyone there.
Holy Hannah!
If you once again try to harm me or one of my companions, my patience with you will expire.
Undomesticated equines could not move me.
Many have said that. But you are the first I believe could do it!
Permission to barge in, Sir?
Daniel, find me an anthropologist that dresses like this and I will eat this headdress.
Well, we're off to see the wizard.
Well, I suppose now is the time for me to say something profound... Nothing comes to mind.
We came here in peace, and we expect to go in one... piece.
Ya think?
Weir: Why are you whispering? McKay: I don't know. It seemed like the right thing to do
It's like looking through a microscope at a cell culture and seeing a thousand dancing hamsters!
You know, Normal Teenage stuff. Pimples, Rebellion, sucking the life out of people.
McKay: I built an atomic bomb for my grade six science fair exhibit.  Lt. Ford: They let you do that up in Canada?
Like \"dinosaurs turned into birds\" theoretically or \"theory of relativity\" theoretically? 
They're politicians, Rodney - they're all creepy. 
I am beat up, tied up, and couldn't order a pizza right now if I wanted to. But if you need it to be, yeah... it's an order. 
It's a city, not a yo-yo.
Maybourne, you are an idiot every day of the week. Couldn't you have taken just one day off?
Now that is one sweet potato.
Oh for crying out loud!
Anthropologist fascinating, or actual fascinating?
And now I'm flirting with someone from another species...
you're a dark side intergalactic encyclopedia salesman and unfortunately the home office hasn't been up front with you.
IN THE MIDDLE OF MY BACKSWING!?
I am not Lucy
It's my sidearm, I swear."
;

        // Here we split it into lines
        $lyrics = explode( "\n", $lyrics );

        // And then randomly choose a line
        return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_stargate() {
        $chosen = hello_stargate_get_lines();
        echo "<p id='stargate'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_stargate' );

// We need some CSS to position the paragraph
function dolly_css() {
        // This makes sure that the positioning is also good for right-to-left languages
        $x = is_rtl() ? 'left' : 'right';

        echo "
        <style type='text/css'>
        #stargate {
                float: $x;
                padding-$x: 15px;
                padding-top: 5px;
                margin: 0;
                font-size: 11px;
        }
        </style>
        ";
}

add_action( 'admin_head', 'dolly_css' );

?>
