<?php
/**
 * @package Inspirations
 * @version 1.0
 */
/*
Plugin Name: Inspirations
Plugin URI: http://wordpress.org/plugins/pbas_inspirations
Description: Inspirations occur at anytime, anywhere. But you can make them appear on the top corner of your admin dashboard too.
Author: P B Arun Sarathy
Version: 1.0
Author URI: https://pbarunsarathy.com
*/

function pbas_insp_get_inspired() {
	/** These are the short bite-sized inspirations */
	$inspire = "Be Yourself
Move On
Free Yourself
Dream Big
Define Yourself
Be Happy
Be Fearless
Accept Yourself
Stay Positive
Trust Yourself
Work Hard
Game On
Don’t Stop
Stay Strong
Enjoy Life
You Only Live Once
You Are Your Choices
Whatever Happens, Take Responsibility
Ultimately Love is Everything
Thoughts Rule The World
Think Outside The Box
Paint The Town Red
Faith Can Move Mountains
Follow Your Own Star
God Doesn't Make Junk
What Is Normal Anyway?
It's Never Too Late
Beginnings Are Always Messy
Never Doubt Your Instinct
Work Hard. Stay Humble
Keep Writing
Courage Doesn't Always Roar
Just Go For It
Don't Worry Be Happy
Enjoy The Little Things
Your Time Is Now
No Feeling Is Final
You Are Awesome
You Are Your Thoughts
Go Take A Break. You Deserve One.
Say I Love You To Your Mom Or Dad, Now
Be. Here. Now
Keep Learning
Learning Never Ends
You Can
Create Opportunities
Imagine. Create. Inspire.
Believe In Yourself
All You Have Is Today.
Bless You With A Trouvaille
Bless You.
Build Your Discomfort Zone
Make Art
Have A Great Day Friend!
Follow Your Heart
Appreciate
This Moment Will PassTake Chances
Dream Big
Just Breathe
Imagine.
I'm Possible.
Know People.
Hate Less. Love More.
Don't Wish. Go Do.
Destiny Waits For None.
Don't Settle
Dare To Dream. Dream To Dare.
You Can Do It
No More Excuses
Sweat Is Just Fat Crying
Be Compassionate
Be Kind
To Infinity And Beyond
Be Your Own Hero
Your Opinion Matters
Creativity Is Contagious. Pass It On.
Own Your Today
Only Happiness Matters
If You Give Up, It Means You Never Wanted It
Faith. Hope. Love
Home Isn't A Place. It's You
Now Or Never
Feel It All
Don't Lose Your Fire
You Must Create
Success Only Breeds A New Goal
Live. Love. Sing
Forgive Yourself
Say No Too.
Be Positive, Patient And Persistent
Good Vibes Only
Feel Alive
Don't Stop Until You'Re Proud
Do What You Love
Wander Often. Wonder Always
Kill Them With Kindness.
All Is Well
Action Gets Results
Always Add Value
Live Consciously
Appreciate The Moment
Be A Giver
Be The Change
Be Your Best
Believe. Achieve. Receive
Break Bad Habits
Call Your Mom
Call Your Dad
Change Is Good
Smile. You'Re Alive.
Cook At Home
Count Your Blessings.
Daydream.
Celebrate Your Victories.
Make Faces, Alone In Mirror.
Design Your Life
Destiny Is Mine
Do It Now
Do Not Judge
Don't Be Afraid
Don't Chase Money
Donate To Charity.
Dreams Come True
Don't Just Think.
Embrace Spirituality
Read a Book.
Feed The Birds
Focus and Win
Follow Your Guts
Genius Is Patience
Get a Massage
Get a Pet
Get Enough Sleep
Get Fresh air
Give a Compliment
Give More Hugs
Have a Mentor
Health Is Wealth
Help a Stranger
Hope Trumps all
Imperfection Is Beauty
It's Possible
Keep It Fun
Laugh Out Loud
Let It Be
Knowledge Is Power
Learn Something New
Let It Go
Life Won't Wait
Listen To Music
Live For Others
Make Somebody's Day.
Love Your Parents. Go Tell Them.
Never Give Up.
Organize Your Life
Plan a Vacation
Play The Piano
Respect Elders
Seize The Day
Somebody Loves You.
Speak Your Mind
Success Is Yours
Take a Walk
Sun Will Shine
Take action Now
Try Something New
Volunteer Your Time
Wake Your Dreams.
Watch Children Play.
Play With Children
Watch The Sunrise
Winners Never Quit
Work It Out
Work Out Daily
Write Thank You Notes, By Hand
Yes, You Can
You Have Time
There's a Reason For Everything
Your Health Matters
You're Not Perfect. It's Ok.";

	// Here we split it into lines
	$inspire = explode( "\n", $inspire );

	// And then randomly choose a line
	return wptexturize( $inspire[ mt_rand( 0, count( $inspire ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function pbas_insp_get_short_quotes() {
	$chosen = pbas_insp_get_inspired();
	echo "<p id='pbas_insp_beherenow'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'pbas_insp_get_short_quotes' );

// We need some CSS to position the paragraph
function pbas_insp_beherenow_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#pbas_insp_beherenow {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'pbas_insp_beherenow_css' );

?>
