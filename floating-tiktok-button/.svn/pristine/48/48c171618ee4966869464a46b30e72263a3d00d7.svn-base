console.log(options);

var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : options.img_width,
    height : options.img_height
});

function makeCode() {		
    var elText = "https://tiktok.com/@"+options.tiktok_id;
    
    if (!elText) {
        console.log("Input a tiktok id");
        elText.focus();
        return;
    }
    
    qrcode.makeCode(elText);
}

makeCode();

jQuery("#tiktok_id").
on("blur", function () {
    makeCode();
}).
on("keydown", function (e) {
    if (e.keyCode == 13) {
        makeCode();
    }
});