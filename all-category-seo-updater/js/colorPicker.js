//x = control (on = 1 | off = 0), y = color, z = static gg
function color_roll(x,y,z){
	var show = document.getElementById('show_rollover_cp_'+z);
	if(x==1){
		show.innerHTML = '#'+y;
	}else{
		show.innerHTML = '';
	}
}

function color_choice(a,x,y,z){ //a == color, x == id of drop div being activated, y == id of div invisible div needs appended to, z == static g
	var h1_text = document.getElementById('h1_text');
	if(h1_text){
		update_h1(a,2);
	}
	var chosen = document.getElementById('chosen_color_cp_'+z);
	var color_div = document.getElementById('color_div_cp_'+z);
	var color_box = document.getElementById('color_box_cp_'+z);
	chosen.value = '#'+a;
	color_div.style.backgroundColor = '#'+a;
	color_box.style.backgroundColor = '#'+a;
	drop_activate(x,y,z);
}

function drop_activate(x,y,z){ //x == id of drop div being activated, y == id of div invisible div needs appended to, z == static g
	var dropper = document.getElementById(x);
	var main = document.getElementById('overall_div_cp_'+z);
	var color_box = document.getElementById('color_box_cp_'+z);
	if(dropper.style.display=='none' || dropper.style.display==''){
		main.style.zIndex = '26';
		dropper.style.zIndex = '27';
		/*color_box.style.zIndex = '28';*/
		main.style.display = 'block';
		dropper.style.display = 'block';
		color_box.style.border = '';
		color_box.style.display = 'none';
		create_invis(x,y,z);
	}
	else{
		go_away_invis(x,y,z);
	}
}

function create_invis(x,y,z){ //x == unique helper of invisible div, y == id of div invisible div needs appended to, z == static g
	var invis_div = document.createElement('div');
	invis_div.style.position = 'absolute';
	invis_div.style.top = '0px';
	invis_div.style.left = '0px';
	invis_div.style.zIndex = '0';
	invis_div.style.backgroundColor = '#000000';
	invis_div.name = 'invis_div_cp_'+x;
	invis_div.id = 'invis_div_cp_'+x;
	invis_div.style.opacity = .00;
	invis_div.style.MozOpacity = .00;				
	invis_div.style.filter = 'alpha(opacity='+(00)+')';
	if(strstr(navigator.appName, 'Microsoft Internet Explorer'))
	{
		invis_div.style.width = screen.width-30;
	}
	else
	{
		invis_div.style.width = '100%';
	}
	var out_height = window.screen.availHeight;
	if(document.body.offsetHeight < out_height){out_height = document.body.offsetHeight};
	invis_div.style.height = out_height+'px';
	var major_tmp = document.getElementById(y);
	major_tmp.appendChild(invis_div);
	var main_div = document.getElementById(x);
	main_div.style.zIndex = '25';
	var tmp_div = document.getElementById('invis_div_cp_'+x);
	if(strstr(navigator.appName, 'Microsoft Internet Explorer'))
	{
		tmp_div.onclick=function() {go_away_invis(x,y,z);};
	}
	else
	{
		tmp_div.setAttribute('onclick', 'go_away_invis(\''+x+'\',\''+y+'\',\''+z+'\')');
	}
}

function go_away_invis(x,y,z){ //x == unique helper of invisible div as well as drop div being hidden, z == static g
	var formElement = document.getElementById('invis_div_cp_'+x);
	if (formElement && formElement.parentNode && formElement.parentNode.removeChild) {
		formElement.parentNode.removeChild(formElement);
	}
	var dropper = document.getElementById(x);
	var main = document.getElementById('overall_div_cp_'+z);
	var color_box = document.getElementById('color_box_cp_'+z);
	main.style.display = 'none';
	main.style.zIndex = '4';
	dropper.style.display = 'none';
	dropper.style.zIndex = '5';
	color_box.style.border = 'solid 1px #000000';
	color_box.style.display = 'block';
}

function strstr( haystack, needle, bool ) { //equivalent to php function
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Onno Marsman
    // *     example 1: strstr('Kevin van Zonneveld', 'van');
    // *     returns 1: 'van Zonneveld'
    // *     example 2: strstr('Kevin van Zonneveld', 'van', true);
    // *     returns 2: 'Kevin '
 
    var pos = 0;
 
    haystack += '';
    pos = haystack.indexOf( needle );
    if( pos == -1 ){
        return false;
    } else{
        if( bool ){
            return haystack.substr( 0, pos );
        } else{
            return haystack.slice( pos );
        }
    }
}