<?php

class Hello_Phil {
  private $lyrics = array();
  private $line;

  function __construct() {
    $this->line = $this->get_lyrics();
  }
  private function get_lyrics() {
	$lyrics = "I can feel it coming in the air tonight, oh Lord
And I've been waiting for this moment for all my life, Oh Lord
Can you feel it coming in the air tonight, oh Lord, oh Lord
Well, if you told me you were drowning
I would not lend a hand
I've seen your face before my friend
But I don't know if you know who I am
Well, I was there and I saw what you did
I saw it with my own two eyes
So you can wipe off that grin,
I know where you've been
It's all been a pack of lies
And I can feel it coming in the air tonight, oh Lord
Well, I've been waiting for this moment for all my life, oh Lord
I can feel it coming in the air tonight, oh Lord
And I've been waiting for this moment for all my life, oh Lord, oh Lord
Well I remember, I remember don't worry
How could I ever forget,
It's the first time, the last time we ever met
But I know the reason why you keep your silence up,
No you don't fool me
The hurt doesn't show
But the pain still grows
It's no stranger to you and me
And I can feel it coming in the air tonight, oh Lord
Well, I've been waiting for this moment for all my life, oh Lord
I can feel it in the air tonight, oh Lord, oh Lord
But I've been waiting for this moment for all my life, oh Lord
I can feel it coming in the air tonight, oh Lord
But I've been waiting for this moment for all my life, oh Lord
I can feel it in the air tonight, oh Lord, oh Lord, oh Lord
But I've been waiting for this moment for all my life, oh Lord, oh Lord";

	$lyrics = explode( "\n", $lyrics );
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

  public function print_random_line() {
    echo "<p id='phil'>$this->line</p>";
}

  public function phil_css() {
	     echo "
	      <style type='text/css'>
	       #phil {
		       float: right;
		       padding-right: 15px;
		       padding-top: 5px;
		       margin: 0;
		       font-size: 11px;
	       }
	      </style>
	     ";
}
}
