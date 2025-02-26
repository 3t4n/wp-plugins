document.addEventListener("DOMContentLoaded", function () {
  const uploadButtonAvatar = document.getElementById("upload_avatar_button");
  const avatarField = document.getElementById("agent700_chat_avatar");
  const primaryColorPicker = document.getElementById("primary_color_picker");
  const primaryColorField = document.getElementById("agent700_primary_color");
  const iconField = document.getElementById("agent700_chat_icon");
  const uploadButtonIcon = document.getElementById("upload_icon_button");
  let uploaderAvatar = wp.media({
    title: "Select Avatar",
    button: {text: "Use this image"},
    multiple: false,
  });
  let uploaderIcon = wp.media({
    title: "Select Icon",
    button: {text: "Use this image"},
    multiple: false,
  });

  // Container to display the current avatar image with a title
  const avatarPreviewContainer = document.createElement("div");
  uploadButtonAvatar.insertAdjacentElement("afterend", avatarPreviewContainer);

  const iconPreviewContainer = document.createElement("div");
  uploadButtonIcon.insertAdjacentElement("afterend", iconPreviewContainer);

  // Function to update avatar preview with title
  function updatePreviewImg(url, field) {
    let previewContainer =
    field == "avatar" ? avatarPreviewContainer : iconPreviewContainer;
    previewContainer.innerHTML = "";

    // Add the title
    const title = document.createElement("p");
    title.textContent = "Current Image:";
    previewContainer.appendChild(title);

    // Add the image
    const image = document.createElement("img");
    image.src = url;
    image.style.width = "50px";
    image.style.height = "50px";
    image.alt = field == "avatar" ? "Selected Avatar" : "Selected Icon";
    previewContainer.appendChild(image);
  }

  // Initial preview if an avatar is already set
  if (avatarField.value) {
    updatePreviewImg(avatarField.value, "avatar");
  }

  if (iconField.value) {
    updatePreviewImg(iconField.value, "icon");
  }

  uploadButtonAvatar.addEventListener("click", (e) => {
    uploadImage(e);
  });
  uploadButtonIcon.addEventListener("click", (e) => {
    uploadImage(e);
  });

  function uploadImage(e) {
    e.preventDefault();
    let dataUpload = e.target.dataset.upload;
    let containerUpload = ( dataUpload == 'avatar' ? uploaderAvatar : uploaderIcon);

    containerUpload.open();

    containerUpload.on("select", function () {
      const attachment = containerUpload
        .state()
        .get("selection")
        .first()
        .toJSON();

      if(dataUpload == "avatar") {
        avatarField.value = attachment.url;
      }
      else {
        iconField.value = attachment.url;
      }

      // Update the avatar preview dynamically without saving
      updatePreviewImg(attachment.url, dataUpload);
    });
    containerUpload.open();
  }

  primaryColorPicker.addEventListener("input", function () {
    primaryColorField.value = primaryColorPicker.value;
    document.documentElement.style.setProperty(
      "--primaryColor",
      primaryColorPicker.value
    );
  });
});
