function cbfnl_products_selall() { 
    const chkboxes = document.getElementsByClassName("cbfnl_chkbox");
    for (let i = 0; i < chkboxes.length; i++) {
        chkboxes[i].checked = true;
    }
    document.getElementById("cbfunnel_products_save").className = "button-red";
}

function cbfnl_products_deselall() {
    const chkboxes = document.getElementsByClassName("cbfnl_chkbox");
    for (let i = 0; i < chkboxes.length; i++) {
        chkboxes[i].checked = false;
    }
    document.getElementById("cbfunnel_products_save").className = "button-red";
}

// Fetch URL from localized data
fetch(cbFunnelData.url)
    .then(response => response.text())
    .then(data => {
        document.getElementById("cbfnl_prod_images").innerHTML = data;
        const allchkboxstatus = cbFunnelData.allchkboxstatus;
        const buttons = document.getElementsByClassName("button button-primary button-large");

        for (let i = 0; i < buttons.length; i++) {
            buttons[i].style.display = "inline-block";
        }

        const chkboxes = document.getElementsByClassName("cbfnl_chkbox");
        document.getElementById("prod_selection_heading").innerHTML = "Select from the List of <b>" + chkboxes.length + "</b> Products Below to be Promoted";

        let numberchecked = 0;
        for (let j = 0; j < chkboxes.length; j++) {
            const myid = chkboxes[j].id;
            if (allchkboxstatus.includes(myid)) {
                chkboxes[j].checked = true;
                numberchecked++;
            } else {
                chkboxes[j].checked = false;
            }
        }
    });
