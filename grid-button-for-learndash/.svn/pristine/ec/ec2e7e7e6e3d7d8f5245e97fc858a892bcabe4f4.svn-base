//Utils
function getNode(element,class_name) {
    for (let el = element; el && el.parentNode; el = el.parentNode) {
        if (el.classList?.contains(class_name)) {
            return el;
        } 
    }
    return null;
}

function getInputAccessMode(str) {
    return str.split('trgb_').pop().split('_')[0];
}

function getInputUserStatus(str) {
    const accessMode = getInputAccessMode(str);
    return str.split('trgb_' + accessMode + '_').pop().split('_text')[0];
}



function displayTextSections(btnId) {
    const textSection = document.getElementById("trgb-text-section");
    const styleSection = document.getElementById("trgb-style-section");
    textSection.style.display = "block";
    document.getElementById(btnId).classList.add("button-secondary-active");
    styleSection.style.display = "none";
    document.getElementById("trgb-style-section-btn").classList.remove("button-secondary-active");
}
function displayStyleSections(btnId) {
    const styleSection = document.getElementById("trgb-style-section");
    const textSection = document.getElementById("trgb-text-section");
    styleSection.style.display = "block";
    document.getElementById(btnId).classList.add("button-secondary-active");
    textSection.style.display = "none";
    document.getElementById("trgb-text-section-btn").classList.remove("button-secondary-active");
}

//Apply to all
function clickApplyAll(checkboxId,type) {
    // Get the checkbox
    const checkBox = document.getElementById(checkboxId);
    //span label text
    const spanLabel = document.getElementById('apply-all-label-' + type);
    let clean = false;
    spanLabel.textContent = 'Clean all below';
    if (checkBox.checked == false) { 
        clean = true;
        spanLabel.textContent = 'Apply to all below';
    }

    const divParent = getNode(checkBox,'trgb-apply-all-base-' + type);
    const fields = divParent.getElementsByTagName("input");
    const toTranspose = new Object;
    for (var i = 0; i < fields.length; i++) {
        if(fields[i].id === 'trgb-checkbox-' + type + '-apply-all') {
            continue;
        }
        let key = (type == 'text') ? getInputUserStatus(fields[i].name) : fields[i].getAttribute('data-property');
        toTranspose[key] = fields[i].value;
        if(fields[i].type == 'checkbox') {
            toTranspose[key] = fields[i].checked;
        }
    }

    // console.log(toTranspose);

    const divSectionText = document.getElementById('trgb-' + type + '-section');
    const fieldsGroups = divSectionText.querySelectorAll('.trgb-form-fields-group');
    for (var x = 0; x < fieldsGroups.length; x++) {
        if(getNode(fieldsGroups[x],'trgb-apply-all-base-' + type)) {
            //fields base are not our target...
            continue;
        }
        const fieldsCollection = fieldsGroups[x].getElementsByTagName("input");
        for (var z = 0; z < fieldsCollection.length; z++) {
            if(clean) {
                if (fieldsCollection[z].type == 'checkbox') {
                    fieldsCollection[z].checked = false;
                } else {
                    fieldsCollection[z].value = '';
                }
                continue; 
            }
            let key = (type == 'text') ? getInputUserStatus(fieldsCollection[z].name) : fieldsCollection[z].getAttribute('data-property');
            if(key) {
                if (fieldsCollection[z].type == 'checkbox') {
                    fieldsCollection[z].checked = toTranspose[key];
                } else {
                    fieldsCollection[z].value = toTranspose[key]; 
                }
            }
        } //end inner for
    } //endn outter for
}