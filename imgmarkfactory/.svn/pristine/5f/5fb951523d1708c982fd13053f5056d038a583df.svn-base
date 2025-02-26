jQuery(document).ready(function ($) {
  let sourceImageIdList = [];
  let watermarkImageId;
  let watermarkImageUrl = null;
  const watermarkPositions = {};

  const config = {
    maxImageSelection: 3,
    defaultOpacity: 0.7,
    previewWidth: 300,
    allowFileTypes: ["image/jpeg", "image/png"],
    basedUrl: "https://api.ntuummm.com/api/free/v1",
  };
  const positionMapping = {
    center: (canvas, context, text) => {
      const textWidth = context.measureText(text).width;
      const textHeight = parseInt(context.font, 10) || 16;
      return { x: canvas.width / 2 - textWidth / 2, y: canvas.height / 2 + textHeight / 2 };
    },
    "bottom-right": (canvas, context, text) => {
      const textWidth = context.measureText(text).width;
      const textHeight = parseInt(context.font, 10) || 16;
      return { x: canvas.width * 0.9 - textWidth, y: canvas.height * 0.95 - textHeight };
    },
  };

  function showLoading() {
    document.getElementById("loading-indicator").style.display = "block";
    document.getElementById("loading-overlay").style.display = "block";
    document.querySelectorAll("button, input, textarea, select").forEach((el) => {
      el.disabled = true;
    });
  }

  function hideLoading() {
    document.getElementById("loading-indicator").style.display = "none";
    document.getElementById("loading-overlay").style.display = "none";
    document.querySelectorAll("button, input, textarea, select").forEach((el) => {
      if (el.id !== "export-quality") {
        el.disabled = false;
      }
    });
  }

  $("#watermark-type").on("change", function () {
    const type = $(this).val();
    $("#watermark-text-options").toggle(type === "text");
    $("#watermark-text-color-options").toggle(type === "text");
    generatePreview();
  });

  const showSuccessMessage = (message) => {
    $("#watermark-message")
      .addClass("notice-success")
      .css({ background: "#d4edda", color: "#155724", border: "1px solid #c3e6cb" })
      .text(message)
      .fadeIn();

    setTimeout(() => {
      $("#watermark-message").fadeOut(500, function () {
        $(this).removeClass("notice-success").css({ background: "", color: "", border: "" }).text("");
      });
    }, 3000);
  };

  const showErrorMessage = (message) => {
    $("#watermark-message")
      .addClass("notice-error")
      .css({ background: "#f8d7da", color: "#721c24", border: "1px solid #f5c6cb" })
      .text("Failed to apply watermark: " + message)
      .fadeIn();

    setTimeout(() => {
      $("#watermark-message").fadeOut(500, function () {
        $(this).removeClass("notice-error").css({ background: "", color: "", border: "" }).text("");
      });
    }, 5000);
  };

  async function getBase64FromUrl(url) {
    if (!url) {
      return;
    }
    const response = await fetch(url);
    const blob = await response.blob();
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
      reader.onloadend = () => resolve(reader.result);
      reader.onerror = reject;
      reader.readAsDataURL(blob);
    });
  }

  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  $("#select-images-button").on("click", function (e) {
    e.preventDefault();

    const mediaFrame = wp.media({
      title: "Select Images",
      button: { text: "Add Images" },
      multiple: true,
      library: {
        type: config.allowFileTypes,
      },
    });

    mediaFrame.on("select", function () {
      const attachments = mediaFrame.state().get("selection").toJSON();

      if (attachments.length > config.maxImageSelection) {
        alert(`You can only select up to ${config.maxImageSelection} images.`);
        return;
      }

      sourceImageIdList = attachments.map((image) => image.id);
      $("#selected-images").val(JSON.stringify(sourceImageIdList));

      const previewHtml = attachments.map((img) => `<img src="${img.url}" data-id="${img.id}" class="preview-image">`).join("");
      $("#preview-selected-images").html(previewHtml);

      generatePreview();
    });

    mediaFrame.open();
  });

  const generatePreview = (position) => {
    if (!sourceImageIdList.length) {
      $("#watermark-preview-area").html("<p>No images selected.</p>");
      return;
    }

    const type = $("#watermark-type").val();
    const watermarkText = $("#watermark-text").val();
    const opacity = parseFloat($("#watermark-opacity").val()) || config.defaultOpacity;

    const previewHtml = sourceImageIdList
      .map(
        (id) => `
            <canvas id="canvas-${id}" class="preview-canvas" style="margin: 10px;"></canvas>
        `
      )
      .join("");

    $("#watermark-preview-area").html(previewHtml);

    sourceImageIdList.forEach((id) => {
      const canvas = document.getElementById(`canvas-${id}`);
      const context = canvas.getContext("2d");
      const image = new Image();

      image.onload = () => {
        canvas.width = Math.min(image.width, config.previewWidth);
        canvas.height = (image.height / image.width) * canvas.width;
        context.drawImage(image, 0, 0, canvas.width, canvas.height);

        if (!watermarkPositions[id] || position) {
          watermarkPositions[id] = positionMapping[position]
            ? positionMapping[position](canvas, context, watermarkText)
            : { x: canvas.width / 2, y: canvas.height / 2 }; // Default to center
        }

        drawWatermark(context, canvas, type, watermarkText, opacity, id);
        makeDraggable(canvas, context, type, watermarkText, opacity, id);
      };

      image.src = $(`img[data-id="${id}"]`).attr("src");
    });
    currentWatermarkPosition = $("#watermark-position").val();
  };

  const drawWatermark = async (context, canvas, type, watermarkText, opacity, id) => {
    if (type === "text" && (!watermarkText || watermarkText === "")) {
      return;
    }
    if (type === "image" && watermarkImageUrl == null) {
      return;
    }
    const { x, y } = watermarkPositions[id];
    const textColor = $("#watermark-color").val();
    const imageToProcess = $(`img[data-id="${id}"]`).attr("src");
    const canvasWidth = canvas.width;
    const canvasHeight = canvas.height;

    const base64SourceImage = await getBase64FromUrl(imageToProcess);
    const base64WatermarkImage = await getBase64FromUrl(watermarkImageUrl);
    const payload = {
      sourceImageName: "use-for-generate-preview.png",
      base64SourceImage: base64SourceImage,
      watermarkType: type,
      canvasWidth: canvasWidth,
      canvasHeight: canvasHeight,
      base64WatermarkImage: base64WatermarkImage,
      watermarkText: watermarkText,
      watermarkTextColor: textColor,
      watermarkOpacity: opacity,
      watermarkXPosition: x,
      watermarkYPosition: y,
    };

    fetch(`${config.basedUrl}/generate-image-with-watermark-preview`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(payload),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Failed to generate watermark");
        }
        return response.blob();
      })
      .then((blob) => {
        const url = URL.createObjectURL(blob);
        const image = new Image();
        image.onload = () => {
          context.clearRect(0, 0, canvas.width, canvas.height);
          context.drawImage(image, 0, 0, canvas.width, canvas.height);
          URL.revokeObjectURL(url);
        };
        image.src = url;
      })
      .catch((error) => {
        showErrorMessage(error.message || error);
      });
  };

  $("#watermark-position").on("change", function () {
    const position = $("#watermark-position").val();
    generatePreview(position);
  });

  const makeDraggable = (canvas, context, type, watermarkText, opacity, id) => {
    let dragging = false;

    const debouncedDrawWatermark = debounce((ctx, cnv, t, text, op, idx) => {
      drawWatermark(ctx, cnv, t, text, op, idx);
    }, 500);

    canvas.addEventListener("mousedown", () => {
      dragging = true;
    });

    canvas.addEventListener("mousemove", (e) => {
      if (dragging) {
        const rect = canvas.getBoundingClientRect();
        watermarkPositions[id] = {
          x: e.clientX - rect.left,
          y: e.clientY - rect.top,
        };
        debouncedDrawWatermark(context, canvas, type, watermarkText, opacity, id);
      }
    });

    canvas.addEventListener("mouseup", () => {
      dragging = false;
    });

    canvas.addEventListener("mouseleave", () => {
      dragging = false;
    });
  };

  const debouncedGeneratePreview = debounce(() => {
    generatePreview();
  }, 500);

  $("#watermark-text").on("input", debouncedGeneratePreview);
  $("#watermark-opacity").on("input", debouncedGeneratePreview);
  $("#export-image-with-watermark-button").on("click", function () {
    if (sourceImageIdList.length <= 0) {
      return;
    }
    const type = $("#watermark-type").val();
    const watermarkText = $("#watermark-text").val();
    const opacity = parseFloat($("#watermark-opacity").val()) || config.defaultOpacity;
    const textColor = $("#watermark-color").val();
    async function delay(ms) {
      return new Promise((resolve) => setTimeout(resolve, ms));
    }
    (async () => {
      try {
        showLoading();
        for (const sourceImageId of sourceImageIdList) {
          const canvas = document.getElementById(`canvas-${sourceImageId}`);
          if (!canvas) {
            continue;
          }
          const { x, y } = watermarkPositions[sourceImageId];
          const payload = {
            action: "export_image_with_watermark",
            _wpnonce: imgMarkFactoryData.nonce,
            sourceImageId: sourceImageId,
            watermarkType: type,
            watermarkImageId: watermarkImageId,
            watermarkText: watermarkText,
            watermarkTextColor: textColor,
            watermarkOpacity: opacity,
            watermarkXPosition: x,
            watermarkYPosition: y,
            canvasWidth: canvas.width,
            canvasHeight: canvas.height,
          };
          await $.post(ajaxurl, payload);
          await delay(1000);
        }
        showSuccessMessage('Watermark applied successfully! Images saved in "img-mark-factory-exported" folder.');
      } catch (error) {
        showErrorMessage("Failed to apply watermark: " + error.responseText);
      } finally {
        hideLoading();
      }
    })();
  });

  $("#reset-button").on("click", function () {
    $("#watermark-form")[0].reset();
    $("#preview-selected-images").html("");
    $("#watermark-preview-area").html("");
    $("#watermark-message").hide().removeClass("notice-success notice-error").text("");
    sourceImageIdList = [];
    watermarkImageUrl = null;
  });

  $("#color-palette .color-option")
    .not(".custom-color")
    .on("click", function () {
      $("#color-palette .color-option").removeClass("selected");
      $(this).addClass("selected");
      $("#watermark-color").val($(this).data("color"));
      $("#custom-color-picker").hide();
      generatePreview();
    });
});
