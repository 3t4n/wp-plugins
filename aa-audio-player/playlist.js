function load_playlist(link){
	    audio = $('audio');
		audio[0].src=link;
		audio[0].load();
        audio[0].play();

}