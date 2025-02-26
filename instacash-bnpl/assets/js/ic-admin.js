let sections = document.querySelectorAll(".form-table");
let secOpen = document.createElement("a");
secOpen.classList.add("section-open");
secOpen.classList.add("button-primary");
secOpen.innerHTML = "&rang;";

if(sections) {
    sections.forEach(function(section, index){
        section.classList.add("panel");
        if(section.rows.length == 0) {
            return;
        }
        let open = secOpen.cloneNode(true)
        open.onclick = openSection;

        section.parentNode.insertBefore(open, section);
    });
}

function openSection(event) {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
        panel.style.display = "none";
    } else {
        panel.style.display = "block";
    }
}
