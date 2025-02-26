var yt = new Array();

function onYouTubePlayerReady(id) {
	id = unescape(id);
	var temp;
	temp = document.getElementById(id);
	if (getvar(id) > 0) {
		temp.loadVideoById(id);
		temp['interval'] = window.setInterval("updateInfo(\"" + id + "\");",
				250);
	} else {
		temp.cueVideoById(id.toString());
	}
	temp['status'] = temp.getPlayerState();
	yt[id] = temp;
}
function getvar(id) {
	var query = window.location.toString();
	return parseInt(query.search("yt_" + id));
}

function updateInfo(ytid) {
	yt[ytid]['status'] = yt[ytid].getPlayerState();

	editHtml('actVol_' + ytid, volume(ytid, 'getVolume'));
	editHtml("gespeeldeSeconden_" + ytid, (Math
			.round(yt[ytid].getCurrentTime() * 100) / 100));
	editHtml("totaalSeconden_" + ytid, (Math
			.round(yt[ytid].getDuration() * 100) / 100));
}
function editHtml(spanid, waarde) {
	document.getElementById(spanid).innerHTML = waarde;
}
function yt_actie(ytid, onderdeel) {
	if (yt[ytid]) {
		switch (onderdeel) {
		case 'afspelen':
			yt[ytid]['interval'] = window.setInterval("updateInfo('" + ytid + "')", 500);
			yt[ytid].playVideo();
			break;
		case 'pauze':
			yt[ytid].pauseVideo();
			break;
		case 'stop':
			clearInterval(yt[ytid]['interval']);
			yt[ytid].stopVideo();
			break;
		default:
			break;
		}
	}
}
function volume(ytid, actie, waarde) {
	if (yt[ytid]) {
		switch (actie) {
		case 'setVolume':
			yt[ytid].setVolume(waarde);
			break;
		case 'getVolume':
			var vol;
			if (yt[ytid].getVolume() < 10) {
				vol = "00" + yt[ytid].getVolume();
			} else if (yt[ytid].getVolume() < 100 && yt[ytid].getVolume() > 9) {
				vol = "0" + yt[ytid].getVolume();
			} else {
				vol = yt[ytid].getVolume();
			}
			return vol;
			break;
		case 'stiller':
			yt[ytid].setVolume(yt[ytid].getVolume() - 10);
			break;
		case 'harder':
			yt[ytid].setVolume(yt[ytid].getVolume() + 10);
			break;
		default:
			break;
		}
	}
}
function printHTML(ytid) {
	ytdiv = document.getElementById('yt_div_' + ytid);
	var id = ytid;
	htmlyt = '<div id="div_'
			+ id
			+ '"></div>'
			+ '<div id="divControl_'
			+ id
			+ '"><p>'
			+ '<a href="javascript:void(0);" onclick="yt_actie(\''
			+ id
			+ '\', \'afspelen\');">Afspelen</a> | '
			+ '<a href="javascript:void(0);" onclick="yt_actie(\''
			+ id
			+ '\', \'pauze\');">Pauze</a> | '
			+ '<a href="javascript:void(0);" onclick="yt_actie(\''
			+ id
			+ '\', \'stop\');">Stop</a><br />'
			+ 'Actueel volume: <span id="actVol_'
			+ id
			+ '">xxx</span> (<a href="javascript:void(0);" onclick="volume(\''
			+ id
			+ '\', \'stiller\');">Zachter</a>-<a href="javascript:void(0);" onclick="volume(\''
			+ id + '\', \'harder\');">Harder</a>)<br />'
			+ 'Afgespeeld: <span id="gespeeldeSeconden_' + id
			+ '">0</span> seconden van <span id="totaalSeconden_' + id
			+ '">0</span> seconden</p></div>' + '';
	ytdiv.innerHTML = htmlyt;
}