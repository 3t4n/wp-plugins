function toggleLoginLink() {
    var checkBox = document.getElementById("login_logout_redirect_login_custom");
    var linkInput = document.getElementById("login_logout_redirect_login_link_input");
    var pageSelect = document.getElementById("login_logout_redirect_login_page_select");
    if (checkBox.checked == true) {
        linkInput.style.display = "block";
        pageSelect.style.display = "none";
    } else {
        linkInput.style.display = "none";
        pageSelect.style.display = "block";
    }
}

function toggleLogoutLink() {
    var checkBox = document.getElementById("login_logout_redirect_logout_custom");
    var linkInput = document.getElementById("login_logout_redirect_logout_link_input");
    var pageSelect = document.getElementById("login_logout_redirect_logout_page_select");
    if (checkBox.checked == true) {
        linkInput.style.display = "block";
        pageSelect.style.display = "none";
    } else {
        linkInput.style.display = "none";
        pageSelect.style.display = "block";
    }
}

function toggleLoginRedirectSettings() {
    var checkBox = document.getElementById("login_logout_redirect_login_enable");
    var settingsDiv = document.getElementById("login_redirect_settings");
    settingsDiv.style.display = checkBox.checked ? "block" : "none";
}

function toggleLogoutRedirectSettings() {
    var checkBox = document.getElementById("login_logout_redirect_logout_enable");
    var settingsDiv = document.getElementById("logout_redirect_settings");
    settingsDiv.style.display = checkBox.checked ? "block" : "none";
}