//************ ADMIN MENU ************//

const menuLinks = document.querySelectorAll(".animatepress-settings__menu li");
const menuContents = document.querySelectorAll(
  ".animatepress-settings__menu-content"
);

for (const link of menuLinks) {
  link.addEventListener("click", (e) => {
    let id = link.dataset.menu;

    menuLinks.forEach((link) => {
      link === e.target
        ? link.classList.add("active")
        : link.classList.remove("active");
    });
    menuContents.forEach((content) => {
      content.id === id
        ? content.classList.add("active")
        : content.classList.remove("active");
    });
  });
}

//************ VIDEOS DEMO ************//

const labelsDemo = document.querySelectorAll("label:has(.demo-video)");

labelsDemo?.forEach((label) => {
  let video = label.querySelector(".demo-video");
  let playPromise;
  label.addEventListener("mouseenter", () => {
    playPromise = video.play();
  });

  label.addEventListener("mouseleave", () => {
    if (playPromise !== undefined) {
      playPromise.then((_) => {
        video.pause();
        video.currentTime = 0;
      });
    }
  });
});

//************ AJAX FORM ************//

const animatepressSaveOptions = async (value) => {
  let formData = new FormData(value);

  const body = document.querySelector("body");
  const overlay = document.querySelector("#animatepress-loading-mask");
  const toast = document.querySelector("#animatepress-toast");
  const successMessage = document.querySelector("#animatepress-toast-success");
  const errorMessage = document.querySelector("#animatepress-toast-error");

  formData.append("_ajax_nonce", ANIMATEPRESSADMINDATA.nonce);
  formData.append("action", "animatepress_save_options_handler");

  // for (var pair of formData.entries()) {
  //   console.log(pair[0] + ", " + pair[1]);
  // }

  body.style.cursor = "wait";
  overlay.style.display = "block";
  toast.classList.remove("active");

  const response = await fetch(ANIMATEPRESSADMINDATA.optionsUrl, {
    method: "POST",
    body: formData,
  });

  if (response.ok) {
    toast.classList.add("animatepress-toast--success");
    successMessage.style.display = "block";
    errorMessage.style.display = "none";
  } else {
    toast.classList.add("animatepress-toast--error");
    successMessage.style.display = "none";
    errorMessage.style.display = "block";
  }

  body.style.cursor = "auto";
  overlay.style.display = "none";
  toast.classList.add("active");

  setTimeout(() => {
    toast.classList.remove("active");
  }, 5000);
};

const form = document.getElementById("animatepress-settings-form");
if (form) {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    animatepressSaveOptions(form);
  });
  document.addEventListener("keydown", function (e) {
    if (
      e.key === "s" &&
      (navigator.userAgentData.platform.match("macOS") ? e.metaKey : e.ctrlKey)
    ) {
      e.preventDefault();
      animatepressSaveOptions(form);
    }
  });
}