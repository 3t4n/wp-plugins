/**
 * Simple YouTube Responsive
 * Lazy Load, Since version 2.0.0
 *
 **/
function ERDYTready(fx) {
	if ( document.readyState !== 'loading' ) {
		fx();
		return;
	}
	document.addEventListener('DOMContentLoaded', fx);
}

ERDYTready( function(){
	var ERDYTlazyDiv = document.querySelectorAll('.erd-ytplay');
	for (var i=0; i < ERDYTlazyDiv.length; i++) {
		ERDYTlazyDiv[i].addEventListener( 'click', function(){
			var dataFullScreen = this.dataset.allowfullscreen;
			if( dataFullScreen && dataFullScreen == 'true' ){
				var allowFullScreen = true;
			}else{
				var allowFullScreen = false;
			}
			var erdyti = document.createElement( 'iframe' );
				erdyti.setAttribute( 'id', 'erdyti-' + [i] + '-' + this.dataset.vid );
				erdyti.setAttribute( 'frameborder', '0' );
				if( allowFullScreen ){
					erdyti.setAttribute( 'allowfullscreen', '' );
				}
				erdyti.setAttribute( 'allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' );
				erdyti.setAttribute( 'src', this.dataset.src );
				if(this.dataset.title){
					erdyti.setAttribute( 'title', this.dataset.title );
				}
			var erdytip = this.parentNode;
				erdytip.innerHTML = '';
				erdytip.appendChild( erdyti );
		});
	}
});