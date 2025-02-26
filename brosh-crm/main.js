function BROSHCRMIFRMWRPF() {
    document.querySelector('#wpbody-content').style.padding = "0";
}

function openBROSH(url,ispopup) {
	localStorage.setItem("openBROSH", (ispopup?"1":"0"));
	if(ispopup){
		window.open(url,"brosh_crm");
	}else{
		//var mainIF='<iframe src="'+url+'" width="100%" border="0"  id="BROSHCRMIFRM" onload="BROSHCRMIFRMWRPF()">';
		 //document.querySelector('#BROSHCRMIFRMWRP').innerHTML=mainIF;
		 var width=self.innerWidth-170;
		 var height=self.innerHeight-10;
		 window.open(url,'brosh',`directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=auto,resizable=yes,width=${width},height=${height},top=55,left=160`);
	}
}

/*const openBROSHLS = localStorage.getItem("openBROSH");
if(openBROSHLS){
	document.querySelector('#openBROSH'+openBROSHLS).click();
}*/