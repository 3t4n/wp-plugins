//x == value passed in | y == direction coming from (select or color picker)
function update_h1(x,y){
	var h1_text = document.getElementById('h1_text');
	if(y == 1){
		h1_text.style.fontSize = x+'px';
	}
	else if(y == 2){
		h1_text.style.color = '#'+x;
	}
	else if(y == 3){
		h1_text.style.fontWeight = x;
	}
}