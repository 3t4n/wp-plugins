const title = document.getElementById("title");
const texts = JSON.parse(title.getAttribute('data-messages'));
const box = document.getElementById("box");
let wordIndex = 0;
let words = 0;

function type(words, wordIndex = 0) {
  if (words < texts.length) {
    if (wordIndex < texts[words].length) {
      title.innerHTML += texts[words][wordIndex];
      setTimeout(type, Math.ceil(Math.random() * 200), words, ++wordIndex);
    }
    else {
      setTimeout(erase, 3000, title);
    }
  }else{
    setTimeout(type, Math.ceil(Math.random() * 200), words =0, wordIndex);
  }
}
function erase(text, len = text.innerHTML.length) {
  if (len >= 0) {
    text.innerHTML = text.innerHTML.substring(0, len);
    setTimeout(erase, 70, text, len - 1);
  } else {
    if(words >= texts.length){ words = 0; }
    setTimeout(type, Math.ceil(Math.random() * 200), ++words, wordIndex);
  }
}

window.addEventListener("load", type(words));