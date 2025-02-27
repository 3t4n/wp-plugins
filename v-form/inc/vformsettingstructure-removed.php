<?php
defined('ABSPATH') || die("Nice try");
global $wpdb;

?>
<style>
html * {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

a {
  text-decoration: none;
}

.cd-intro {
  width: 90%;
  max-width: 768px;
  text-align: center;
}

.cd-intro {
  margin: 4em auto;
}
@media only screen and (min-width: 768px) {
  .cd-intro {
    margin: 5em auto;
  }
}
@media only screen and (min-width: 1170px) {
  .cd-intro {
    margin: 6em auto;
  }
}

.cd-headline {
  font-size: 30px;
  line-height: 1.2;
}
@media only screen and (min-width: 768px) {
  .cd-headline {
    font-size: 4.4rem;
    font-weight: 300;
  }
}
@media only screen and (min-width: 1170px) {
  .cd-headline {
    font-size: 6rem;
  }
}

.cd-words-wrapper {
  display: inline-block;
  position: relative;
  text-align: left;
}
.cd-words-wrapper b {
  display: inline-block;
  position: absolute;
  white-space: nowrap;
  left: 0;
  top: 0;
}
.cd-words-wrapper b.is-visible {
  position: relative;
}
.no-js .cd-words-wrapper b {
  opacity: 0;
}
.no-js .cd-words-wrapper b.is-visible {
  opacity: 1;
}
/* --------------------------------

xslide

-------------------------------- */
.cd-headline.slide span {
  display: inline-block;
  padding: .2em 0;
}
.cd-headline.slide .cd-words-wrapper {
  overflow: hidden;
  vertical-align: top;
}
.cd-headline.slide b {
  opacity: 0;
  top: .2em;
}
.cd-headline.slide b.is-visible {
  top: 0;
  opacity: 1;
  -webkit-animation: slide-in 0.6s;
  -moz-animation: slide-in 0.6s;
  animation: slide-in 0.6s;
}
.cd-headline.slide b.is-hidden {
  -webkit-animation: slide-out 0.6s;
  -moz-animation: slide-out 0.6s;
  animation: slide-out 0.6s;
}

@-webkit-keyframes slide-in {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-100%);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateY(20%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
  }
}
@-moz-keyframes slide-in {
  0% {
    opacity: 0;
    -moz-transform: translateY(-100%);
  }
  60% {
    opacity: 1;
    -moz-transform: translateY(20%);
  }
  100% {
    opacity: 1;
    -moz-transform: translateY(0);
  }
}
@keyframes slide-in {
  0% {
    opacity: 0;
    -webkit-transform: translateY(-100%);
    -moz-transform: translateY(-100%);
    -ms-transform: translateY(-100%);
    -o-transform: translateY(-100%);
    transform: translateY(-100%);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateY(20%);
    -moz-transform: translateY(20%);
    -ms-transform: translateY(20%);
    -o-transform: translateY(20%);
    transform: translateY(20%);
  }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
  }
}
@-webkit-keyframes slide-out {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateY(120%);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateY(100%);
  }
}
@-moz-keyframes slide-out {
  0% {
    opacity: 1;
    -moz-transform: translateY(0);
  }
  60% {
    opacity: 0;
    -moz-transform: translateY(120%);
  }
  100% {
    opacity: 0;
    -moz-transform: translateY(100%);
  }
}
@keyframes slide-out {
  0% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
  }
  60% {
    opacity: 0;
    -webkit-transform: translateY(120%);
    -moz-transform: translateY(120%);
    -ms-transform: translateY(120%);
    -o-transform: translateY(120%);
    transform: translateY(120%);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateY(100%);
    -moz-transform: translateY(100%);
    -ms-transform: translateY(100%);
    -o-transform: translateY(100%);
    transform: translateY(100%);
  }
}

.colourful {
      animation: colorchange 8s infinite; /* animation-name followed by duration in seconds*/
         /* you could also use milliseconds (ms) or something like 2.5s */
      -webkit-animation: colorchange 8s infinite; /* Chrome and Safari */
      -moz-animation: colorchange 8s infinite;
		  -ms-animation: colorchange 8s infinite;
		  -o-animation: colorchange 8s infinite;
    }

    @keyframes colorchange
    {
      0%   {color: #eb008b;}
      25%  {color: #fff100;}
      50%  {color: #01a54f;}
      75%  {color: #00adef;}
      100% {color: #eb008b;}
    }

    @-webkit-keyframes colorchange /* Safari and Chrome - necessary duplicate */
    {
      0%   {color: #eb008b;}
      25%  {color: #fff100;}
      50%  {color: #01a54f;}
      75%  {color: #00adef;}
      100% {color: #eb008b;}
    }

  @-moz-keyframes colorchange
    {
      0%   {color: #eb008b;}
      25%  {color: #fff100;}
      50%  {color: #01a54f;}
      75%  {color: #00adef;}
      100% {color: #eb008b;}
    }

@-ms-keyframes colorchange
    {
      0%   {color: #eb008b;}
      25%  {color: #fff100;}
      50%  {color: #01a54f;}
      75%  {color: #00adef;}
      100% {color: #eb008b;}
    }

@-o-keyframes colorchange
    {
      0%   {color: #eb008b;}
      25%  {color: #fff100;}
      50%  {color: #01a54f;}
      75%  {color: #00adef;}
      100% {color: #eb008b;}
    }

    
#vform_comingsooncont{
    max-width: 1200px;
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    margin-top:40px;
}

#vform_comingsooncont .colvform-showcaseplugins {
    -webkit-box-shadow: 11px 0 38px 0 rgb(0 0 0 / 10%);
    box-shadow: 11px 0 38px 0 rgb(0 0 0 / 10%);
    padding: 20px;
    width: 41.8%;
    float: left;
    margin: 2%;
}

</style>
<div class="wrap" id="vform-main">

<div id="vform-getsubscription">
    <div class="subscr-vform">
    <i class="fa fa-times" id="vf-close-subscr" aria-hidden="true"></i>
        <form action="javascript:void(0)" id="mysubmitemail-vform">
          <p>Thank you!</p>
          <p>You can join our Newsletter for future updates, discount, extra feaures and some big deals.</p>
          <input type="text" name="username" id="" placeholder="Your Good Name" required>
          <input type="email" name="useremail" id="" placeholder="Your email Address" required>
          <input type="submit" value="submit" class="button" id="sendmyvfrm-eml">
          <p><i class="fa fa-lock" aria-hidden="true"></i> We respect your privacy, we don't send any spam and unsual links & emails.</p>
        </form>
    </div>
  </div>

  <div class="banner"></div>
  <div class="vform_body">

    <header class="bv-page__header">
      <div class="bv-page__header-content">
        <h1 class="bv-page__title">Thanks For Being Here</h1>
        <p class="bv-page__description">Some of the future lists that we will launch for you just free*...</p>
        <p class="bv-page__description">Please Don't Forget To Rate Us On <code>Wordpress.org</code></p>
        <p class="bv-page__description">*We try our best for all those addon for free but some feature need the premium access.</p>
        <a href="javascript:void(0)" id="vf-unlockmyadvanced" class="button">Join Our Newsletter and stay Tuned new updates</a>
      </div>
      <div class="inner-help-vform">
        <span>i</span>
        <h1>Information</h1>
        <p>Having Issue Related The Plugin, just Email Us at: <code>vforminfo@gmail.com</code><br/>We will contact you within 24hrs.</p>
        <p>Upgrade To Premium and unlock your form power.<a href="https://onlinetool24.co.in/vform/" target="_blank">Upgrade To Premium</a></p>
      </div>
    </header>

  </div>

  <ul class="coming-vform">

  </ul>


  <section class="cd-intro">
		<h1 class="cd-headline slide">
			<span>Coming Soon:</span>
			<span class="cd-words-wrapper colourful">
        <b class="is-visible">Certificate Designs...</b>
        <b>Password protected Forms...</b>
        <b>Campaigns...</b>
        <b>Automations...</b>
        <b>Triggers...</b>
        <b>Form Stylings...</b>
        <b>Templates...</b>
        <b>Import/Export...</b>
        <b>Create Groups...</b>
        <b>Create Lists...</b>
        <b>Translations ready...</b>
        <b>Create Tags...</b>
        <b>Analytics...</b>
        <b>Sharing In Social Platform...</b>
        <b>Integrations...</b>
        <b>Email Forwarding...</b>
        <b>Small Form Chatbot...</b>
        <b>Your Suggestions :)</b>
        <b>And More... ;)</b>
			</span>
		</h1>
	</section>

  <div class="banner2"></div>


  <div class="contmain1vform" id="vform_comingsooncont">
      <div class="row">
          <p>I hope you like it.</p>
          <p>If you have any suggestion/query just email me:) vforminfo@gmail.com.</p>
          <p>Here our more beautiful and easy to use Plugins:</p>
          <div class="colvform-showcaseplugins">
              <a href="https://wordpress.org/plugins/exit-popup-advanced/" target="_blank">VF Exit Popup your Fast &amp; Secure Exit Popup for WordPress</a>
              <p>Exit Popup enabling you to display a javascript modal window, which can include text, images, videos, forms, maps and so on, before a visitor leaves your website.</p>
              <a href="https://wordpress.org/plugins/exit-popup-advanced/" target="_blank" class="button">View</a>
          </div>
          <div class="colvform-showcaseplugins">
              <a href="https://wordpress.org/plugins/custom-shape-dividers/" target="_blank">Custom Shape Dividers create dividers in a easy way</a>
              <p>I created this free tool to make it easier for designers and non designers to use a beautiful SVG shape divider for their latest project. We hope you enjoy this tool.</p>
              <a href="https://wordpress.org/plugins/custom-shape-dividers/" target="_blank" class="button">View</a>
          </div>
      </div>
  </div>

</div>

<script>

/* main.js */
jQuery(document).ready(function($){
	//set animation timing
	var animationDelay = 2500,
		//loading bar effect
		barAnimationDelay = 3800,
		barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
		//letters effect
		lettersDelay = 50,
		//type effect
		typeLettersDelay = 150,
		selectionDuration = 500,
		typeAnimationDelay = selectionDuration + 800,
		//clip effect
		revealDuration = 600,
		revealAnimationDelay = 1500;

	initHeadline();


	function initHeadline() {
		//insert <i> element for each letter of a changing word
		singleLetters($('.cd-headline.letters').find('b'));
		//initialise headline animation
		animateHeadline($('.cd-headline'));
	}

	function singleLetters($words) {
		$words.each(function(){
			var word = $(this),
				letters = word.text().split(''),
				selected = word.hasClass('is-visible');
			for (i in letters) {
				if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
				letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
			}
		    var newLetters = letters.join('');
		    word.html(newLetters).css('opacity', 1);
		});
	}

	function animateHeadline($headlines) {
		var duration = animationDelay;
		$headlines.each(function(){
			var headline = $(this);

			if(headline.hasClass('loading-bar')) {
				duration = barAnimationDelay;
				setTimeout(function(){ headline.find('.cd-words-wrapper').addClass('is-loading') }, barWaiting);
			} else if (headline.hasClass('clip')){
				var spanWrapper = headline.find('.cd-words-wrapper'),
					newWidth = spanWrapper.width() + 10
				spanWrapper.css('width', newWidth);
			} else if (!headline.hasClass('type') ) {
				//assign to .cd-words-wrapper the width of its longest word
				var words = headline.find('.cd-words-wrapper b'),
					width = 0;
				words.each(function(){
					var wordWidth = $(this).width();
				    if (wordWidth > width) width = wordWidth;
				});
				headline.find('.cd-words-wrapper').css('width', width);
			};

			//trigger animation
			setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
		});
	}

	function hideWord($word) {
		var nextWord = takeNext($word);

		if($word.parents('.cd-headline').hasClass('type')) {
			var parentSpan = $word.parent('.cd-words-wrapper');
			parentSpan.addClass('selected').removeClass('waiting');
			setTimeout(function(){
				parentSpan.removeClass('selected');
				$word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
			}, selectionDuration);
			setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);

		} else if($word.parents('.cd-headline').hasClass('letters')) {
			var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
			hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
			showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

		}  else if($word.parents('.cd-headline').hasClass('clip')) {
			$word.parents('.cd-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
				switchWord($word, nextWord);
				showWord(nextWord);
			});

		} else if ($word.parents('.cd-headline').hasClass('loading-bar')){
			$word.parents('.cd-words-wrapper').removeClass('is-loading');
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
			setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('is-loading') }, barWaiting);

		} else {
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, animationDelay);
		}
	}

	function showWord($word, $duration) {
		if($word.parents('.cd-headline').hasClass('type')) {
			showLetter($word.find('i').eq(0), $word, false, $duration);
			$word.addClass('is-visible').removeClass('is-hidden');

		}  else if($word.parents('.cd-headline').hasClass('clip')) {
			$word.parents('.cd-words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){
				setTimeout(function(){ hideWord($word) }, revealAnimationDelay);
			});
		}
	}

	function hideLetter($letter, $word, $bool, $duration) {
		$letter.removeClass('in').addClass('out');

		if(!$letter.is(':last-child')) {
		 	setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);
		} else if($bool) {
		 	setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
		}

		if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
			var nextWord = takeNext($word);
			switchWord($word, nextWord);
		}
	}

	function showLetter($letter, $word, $bool, $duration) {
		$letter.addClass('in').removeClass('out');

		if(!$letter.is(':last-child')) {
			setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration);
		} else {
			if($word.parents('.cd-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('waiting'); }, 200);}
			if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
		}
	}

	function takeNext($word) {
		return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
	}

	function takePrev($word) {
		return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
	}

	function switchWord($oldWord, $newWord) {
		$oldWord.removeClass('is-visible').addClass('is-hidden');
		$newWord.removeClass('is-hidden').addClass('is-visible');
	}
});


</script>
