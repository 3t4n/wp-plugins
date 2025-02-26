var req = new XMLHttpRequest();

function Processing(name, tg, tx) {
	obj = document.getElementById(name);
	obj.innerHTML = '<web-progress-bar role="progressbar"><div class="zipping">' + tx + '</div><div class="web-progress-bar-wrapper"><div class="web-progress-bar-indeterminate"></div></div></web-progress-bar>';
	if (tg) {
		tg.classList.toggle('w-button-disable');
		tg.disabled = true;
	}
}

function DisplayContent(name, tg) {
	obj = document.getElementById(name);
	obj.innerHTML = req.responseText;
	if (tg) {
		tg.disabled = false;
		tg.classList.remove('w-button-disable');
	}
}

function SendQuery(url, callbackFunction, method, cache, request) {
	req.onreadystatechange = function () {
		if (req.readyState == 4) {
			if (req.status == 200) {
				eval(callbackFunction);
			}
		}
	};
	if (cache != 1) {
		url += "&rand=" + Math.random() * 1000;
	}
	if (method == 'POST') {
		req.open("POST", url, true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.send(request);
	} else {
		req.open("GET", url, true);
		req.send(null);
	}
}

function sd_type() {
	document.getElementById("opd").setAttribute("style", "display: bock;");
	document.getElementById("yid").setAttribute("style", "display: none;");
	document.getElementById('b1').classList.add('selected');
	document.getElementById('b2').classList.remove('selected');
	document.getElementById('device_id').value = "";
	document.getElementById('av_u').value = 0;
}

function yid_type() {
	document.getElementById("opd").setAttribute("style", "display: none;");
	document.getElementById("yid").setAttribute("style", "display: bock;");
	document.getElementById('b2').classList.add('selected');
	document.getElementById('b1').classList.remove('selected');
	document.getElementById('tbi').value = 0;
	document.getElementById('model').value = "";
	document.getElementById('av').value = 0;
	document.getElementById("mdl").setAttribute("style", "display: none;");
}

window.onload = function () {
	var tbi = document.getElementById("tbi"),
		model = document.getElementById("model"),
		mdl = document.getElementById("mdl");
	tbi.onchange = function () {
		if (tbi.value == 0 || tbi.value == "other" || tbi.value == "") {
			mdl.style.display = "none";
			
		} 
		model.length = 1;
		if (this.selectedIndex < 1) return;
		var nsx = plist[tbi.value];
		if (nsx) {
			mdl.style.display = "inline-block";
			for (var i = 0; i < nsx.length; i++) {
				model.options[model.options.length] = new Option(nsx[i], nsx[i]);
			}
		} else {
			mdl.style.display = "none";
		}
	};
	tbi.onchange();
}

var apksubmit = document.getElementById("apksubmit");
var ddea_o = document.getElementById("ddea");
ddea_o.style.display = "none";

function ajax(url,request){  
		SendQuery(url,'DisplayContent("downloader_area",apksubmit)','POST',1,request);	
}

apkdownloader.addEventListener("submit", function (evt) {
Processing('downloader_area',apksubmit,'Connecting to Google Play');
evt.preventDefault();

var a = document.getElementById("region-package").value;
var tb = document.getElementById("tbi").value;
var av = document.getElementById("av").value;
var model = document.getElementById("model").value;
var device_id = document.getElementById("device_id").value;
var av_u = document.getElementById("av_u").value;
ddea_o.style.display = "block";
ajax('https://googleplayapi.androidcontents.com/','google_id='+a+'&x=downloader&tbi='+tb+'&av_u='+av_u+'&device_id='+device_id+'&model='+encodeURI(model)+'&hl=en&de_av=&android_ver='+av);
});


b2.addEventListener("click", yid_type);
b1.addEventListener("click", sd_type);

var plist={"samsung":["Samsung Galaxy Note 10+ SM-N975F","Samsung Galaxy Note 10 SM-N970F","Samsung Galaxy Note 9","Samsung Galaxy S10 plus","Samsung Galaxy S10","Samsung Galaxy S6 edge","Samsung Galaxy S3","Samsung Galaxy Grand Prime","Samsung Galaxy A3 SM-A300FU","Samsung Galaxy A5 SM-A500FU","Samsung Galaxy A6 SM-A600FN","Samsung Galaxy A7","Samsung Galaxy A8 SM-A530F","Samsung Galaxy A10 SM-A105F","Samsung Galaxy J7 7.0","Samsung Galaxy Note 3 SC-01F","Samsung Galaxy Camera 2 EK-GC200","Samsung Galaxy Tab 3","Samsung Galaxy Tab 4 SM-T230NU","Samsung Galaxy Tab A T550","Samsung Galaxy Tab S 10.5 SM-T800"],"huawei":["Huawei Honor 7i","Huawei P9","Huawei P10","Huawei Nova 3i","Huawei nova 4","Huawei Honor NOTE 8","Huawei Honor 6 H60-L04","Huawei Honor 6 H60-L01","Huawei Honor 5X","Huawei Honor 4X Play Che2-TL00","Huawei Honor 3C Play H30-T00","Huawei Ascend Y300","Huawei Ascend P8 Lite","Huawei Ascend Mate 7","Huawei Ascend G6-C00","Huawei Ascend G6-L11 4G LTE","Huawei Ascend Mate MT1-U06","Huawei Ascend P6-U06","Huawei Ascend P8","Huawei MediaPad 10 LINK"],"google":["Google Nexus 5","Google Nexus 6","Google Nexus 7","Google Pixel 2","Google Nexus 4","Google Pixel 3 XL","Google Pixel XL","Google Pixel 3A XL","Google Nexus 6P","Google Nexus 10 P8110"],"xiaomi":["Xiaomi Redmi Note 7","Xiaomi Redmi 7A","Xiaomi Redmi Note 5","Xiaomi MI Note LTE","Xiaomi MI Note Pro","Xiaomi Mi Mix 3","Xiaomi Redmi 15"],"sony":["Sony Xperia XZ","Sony Xperia XZ3","Sony Xperia Z1","Sony Xperia Z2","Sony Xperia Z3","Sony Xperia Z5","Sony Xperia ZL","Sony Xperia ZR","Sony Xperia V","Sony Xperia E1","Sony Xperia C5","Sony Xperia M2","Sony Xperia M4","Sony Xperia SP","Sony Xperia T","Sony Xperia UL","Sony Xperia XA1 Ultra","Sony Xperia Tablet Z","Sony Xperia Tablet Z2","Sony Xperia Tablet Z4"],"lg":["LG G8 ThinQ","LG G3","LG G4","LG G5 H830","LG Optimus L70","LG Q7","LG G6","LG K7","LG Volt","LG Vu 3"],"motorola":["Motorola X4","Motorola E6","Motorola Z2 Play","Motorola One","Motorola Moto G7","Motorola Moto G6","Motorola Moto G4","Motorola Moto C","Motorola Moto E (2nd gen)","Motorola DROID Ultra"],"oneplus":["OnePlus 6","OnePlus 7 Pro Dual-SIM GM1910"],"htc":["HTC One M8","HTC One M9","HTC One E8","HTC 10","HTC Desire 610","HTC Droid DNA","HTC One Mini 2","HTC One S Z520e","HTC U11","HTC U12","LG G2 Mini"],"oppo":["OPPO A37fw","Oppo Neo5"],"other":["Panasonic Eluga Note","Acer Iconia B1-A71","Dell Venue 8","Lenovo K3 Note","Infinix Hot 6X","Realme 3 Pro","Blu","Fujitsu","Symphony","vivo Y55L"],"tablet":["Samsung Galaxy Tab 3","Sony Xperia Tablet Z","Sony Xperia Tablet Z2","Sony Xperia Tablet Z4","NVIDIA SHIELD Tablet","NVIDIA SHIELD Tablet K1","Huawei MediaPad 10 LINK","Bq Curie 2"]};