
// copy shortcode on clicking copy shortcode button
function shortcodeCopy() {
  var copyText = document.getElementById("shortcodeText");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the Shortcode");
}

// Copy system info to the clipboard
function copySystemInfo() {
  var copyText = document.getElementById("system-info-raw");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
}

// Save system info to file
function downloadSystemInfo(){
  var text = document.getElementById("system-info-raw").value;
  text = text.replace(/\n/g, "\r\n"); // To retain the Line breaks.
  var blob = new Blob([text], { type: "text/plain"});
  var anchor = document.createElement("a");
  anchor.download = "flipdish-system-info.txt";
  anchor.href = window.URL.createObjectURL(blob);
  anchor.target ="_blank";
  anchor.style.display = "none"; // just to be safe!
  document.body.appendChild(anchor);
  anchor.click();
  document.body.removeChild(anchor);
}