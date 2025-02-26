=== Maniacal Maze ===
Contributors: maniacalv
Tags: maze, game
Requires at least: 3
Tested up to: 4.9.8
Requires PHP: 5
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A random maze generator.

== Description ==
A place to practice my code by developing a maze generation program. I hope to revisit a 16 year old project I made by starting fresh with a CSS framework, and as a WordPress plugin. 

Version 3 changes the frontend so that you make square mazes.
These mazes are now solvable via mouse click, arrow keys or touch on phone.

Version 2 draws the entire maze as a single image which can be downloaded. The maze should look good across multiple devices, depending on the theme. I added a that and end color so you can actually print and solve these!

Version 1 creates a random maze, and using divs, should display well on most-sized screens, including phones.

Next I am considering ways to add interactivity!
I'd like to add more options, too!

== Installation ==
Just install like any other plugin. Put a [maniacal_maze] on an empty page or post to start the fun!

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==
= 3.0 =
* Overhauled the code so most of the data is in javascript
* Created handlers for touch and keyboard
* Created logic to check for allowed moves
* The maze is now solvable and should work with mouse, touch or arrow keys, on phone, tablet and PC.

= 2.2 =
* FIxed the shortcode so it returns, not echos.

= 2.1 =
* Tweaked the display. Not 100% satisfied but it works well enough for now.

= 2.0 =
* We have attained version 2, a fully printable, solveable, random maze!
* I rethought the display code to make sure it fits your display as least somewhat.
* I added a green and red tile as a start and end point.

= 1.1 = 
* I replaced the current display code with one that creates a canvas image.
* I originally had it draw walls, except for the exit walls. This caused a problem with edges midding chunks.
* I finally had it draw a black background, then cut our the floor.
* It then cut out the walls it needed to making things look better.
* The ground toggles between 2 grays.

= 1.0 =
* After many changes and optimizations to how I was doing things, I made so that it
* Marks itself used. Increments the total counter.
* Looks for walls that are not bedrock or in use already.
* Randomly picks a wall, marks that bit, then in the new room, marks the opposite wall bit
* It then moves to the new room.
* If it can't find an exit, it moves back one in the history and repeats until it finds a new room
* What REALLY REALLY helps is when you map height to h and width to w in the history instead of the other way around.

= 0.3 =
* Changed how I enqueueued the css framework. Hopefully this doesn't mess up any themes. If so I'll have to compile a css file with w3 under #maniacal_maze_mazer
* Moved the maze creating code over to a function.
* Renamed the variable $doors to $walls since it does the exact opposite of what I named it.
* Started working on the function for starting the process with the first two steps in the loop, manually in a for().
* Took out my test code for error checking and resubmitting to WP Repository!

= 0.1 =
* First release to submit to Wordpress for inclusion into the repository.
* Maze width and height page with error checking finished.
* Link is created and page refreshed to the new link.
* Links can be entered by hand and easy to change.
* Links are error checked.
* Array of cells created with empty value for doors.
* Array of bitwise "bedrock" created to make it easier when finding valid walls.
* CSS done using W3.CSS.
* Created jQuery and javascript to handle buttons turning red as well as sizing cell to fit your display and to update this if your viewport size changes.