document.addEventListener("DOMContentLoaded", () => {
  const assets = Array.from(document.querySelectorAll(".media-asset"));
  const generateButton = document.getElementById("generate-button");
  const progressBar = document.getElementById("progress-bar");
  const successLabel = document.getElementById("success-label");
  const selectedCount = document.getElementById("selected-count");
  const selectAllCheckbox = document.getElementById("select-all");
  const checkboxes = document.querySelectorAll(".unoptimized-checkbox");

  const tabLinks = document.querySelectorAll(".tab-link");
  const tabContents = document.querySelectorAll(".tab-content");
  tabLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      // Remove active classes from all links
      tabLinks.forEach((item) => {
        item.classList.remove("text-gray-500", "border-green-500");
        item.classList.add("text-gray-500", "border-transparent");
      });
      // Hide all tab contents
      tabContents.forEach((content) => content.classList.add("hidden"));
      // Activate the selected tab and show its content
      this.classList.remove("text-gray-500", "border-transparent");
      this.classList.add("text-gray-500", "border-green-500");
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.classList.remove("hidden");
      }
    });
  });

  // If no accessToken is set, disable the Generate button
  if (
    typeof aialgeAjax !== "undefined" &&
    !aialgeAjax.accessToken &&
    generateButton
  ) {
    generateButton.disabled = true;
    generateButton.classList.add("cursor-not-allowed", "opacity-50");
  }

  function updateSelectedCount() {
    const selected = document.querySelectorAll(
      ".unoptimized-checkbox:checked"
    ).length;
    selectedCount.textContent = `Number of assets selected for generation: ${selected}`;
  }

  function unselectAllAndResetProgress() {
    checkboxes.forEach((chk) => {
      chk.checked = false;
    });
    if (selectAllCheckbox) {
      selectAllCheckbox.checked = false;
    }
    progressBar.style.width = "0%";
  }

  if (selectAllCheckbox) {
    selectAllCheckbox.addEventListener("change", () => {
      checkboxes.forEach((chk) => {
        chk.checked = selectAllCheckbox.checked;
      });
      updateSelectedCount();
    });
  }

  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
      updateSelectedCount();
      if (!checkbox.checked && selectAllCheckbox) {
        selectAllCheckbox.checked = false;
      } else if (
        document.querySelectorAll(".unoptimized-checkbox:checked").length ===
          checkboxes.length &&
        selectAllCheckbox
      ) {
        selectAllCheckbox.checked = true;
      }
    });
  });

  // Processes a single batch of assets
  async function processBatch(batch) {
    return new Promise(async (resolve, reject) => {
      const formData = new FormData();
      formData.append("action", "proxy_request");
      // Use the localized nonce
      formData.append("nonce", aialgeAjax.nonce); 
      formData.append(
        "assets",
        JSON.stringify(
          batch.map((asset) => ({
            id: asset.dataset.id,
            url: asset.dataset.url,
            language: asset.dataset.language,
          }))
        )
      );

      try {
        const response = await fetch(aialgeAjax.ajaxurl, {
          method: "POST",
          body: formData,
        });
        if (!response.ok) {
          throw new Error("Failed to send request to server.");
        }
        const result = await response.json();
        if (!result.success) {
          reject(result.data || "Batch failed");
        } else {
          if (result.data.updatedAssets) {
            result.data.updatedAssets.forEach((item) =>
              updateAltTextInDOM(item.id, item.alt)
            );
          }
          if (result.data.proposedAssets) {
            result.data.proposedAssets.forEach((item) =>
              updateProposedAltInDOM(item.id, item.alt)
            );
          }
          resolve();
        }
      } catch (error) {
        reject(error);
      }
    });
  }

  // Process all selected assets in batches
  async function processAllBatches(selectedAssets) {
    let completed = 0;
    const batchSize = 3;
    progressBar.style.width = `1%`;

    // Helper function to wait X ms
    function delay(ms) {
      return new Promise((resolve) => setTimeout(resolve, ms));
    }

    for (let i = 0; i < selectedAssets.length; i += batchSize) {
      const batch = selectedAssets.slice(i, i + batchSize);
      await processBatch(batch);
      completed += batch.length;
      progressBar.style.width = `${(completed / selectedAssets.length) * 100}%`;
      // Wait for 1 second after each batch
      await delay(1000);
    }
  }

  if (generateButton) {
    generateButton.addEventListener("click", async () => {
      const selectedAssets = Array.from(
        document.querySelectorAll(".unoptimized-checkbox:checked")
      );
      if (selectedAssets.length === 0) {
        alert("No assets selected for generation.");
        return;
      }
      successLabel.textContent = "";
      successLabel.classList.add("hidden");
      generateButton.disabled = true;
      generateButton.classList.add("cursor-not-allowed", "opacity-50");
      try {
        await processAllBatches(selectedAssets);
        successLabel.textContent =
          "Generation completed for all selected assets! 🎉";
        successLabel.classList.remove("hidden");
      } catch (error) {
        alert("An error occurred during the alt text generation process.");
      } finally {
        generateButton.disabled = false;
        generateButton.classList.remove("cursor-not-allowed", "opacity-50");
        unselectAllAndResetProgress();
        updateSelectedCount();
      }
    });
  }

  // Update the 'Alt Text' cell in the DOM
  function updateAltTextInDOM(assetId, newAlt) {
    const row = document
      .querySelector(`.unoptimized-checkbox[data-id="${assetId}"]`)
      ?.closest(".media-asset");
    if (!row) return;
    const altTd = row.querySelector(".alt-text-cell");
    if (altTd) {
      altTd.textContent = newAlt;
      row.dataset.hasAlt = "true";
    }
  }

  // Update the 'Proposed Alt' cell and insert an Approve button
  function updateProposedAltInDOM(assetId, newAlt) {
    const row = document
      .querySelector(`.unoptimized-checkbox[data-id="${assetId}"]`)
      ?.closest(".media-asset");
    if (!row) return;
    const proposedTd = row.querySelector(".proposed-alt-cell");
    if (proposedTd) {
      proposedTd.textContent = newAlt;
    }
    const approveCell = row.children[5];
    if (approveCell) {
      approveCell.innerHTML = `<button class="approve-button bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700 transition" data-asset-id="${assetId}">Approve</button>`;
    }
  }

  // Single-asset "Approve" button
  document.addEventListener("click", async (e) => {
    if (e.target.classList.contains("approve-button")) {
      const assetId = e.target.getAttribute("data-asset-id");
      e.target.disabled = true;
      const formData = new FormData();
      formData.append("action", "approve_proposed_alt");
      formData.append("nonce", aialgeAjax.nonce); // If your plugin uses 'aialgeAjax', match it
      formData.append("assetId", assetId);

      try {
        const response = await fetch(aialgeAjax.ajaxurl, {
          method: "POST",
          body: formData,
        });
        if (!response.ok) {
          throw new Error("Network error approving alt text.");
        }
        const result = await response.json();
        if (!result.success) {
          alert(result.data || "Failed to approve alt text.");
          e.target.disabled = false;
        } else {
          const row = document
            .querySelector(`.unoptimized-checkbox[data-id="${assetId}"]`)
            ?.closest(".media-asset");
          if (row) {
            const altTd = row.querySelector(".alt-text-cell");
            const proposedTd = row.querySelector(".proposed-alt-cell");
            const newAlt = proposedTd ? proposedTd.textContent : "";
            if (altTd) {
              altTd.textContent = newAlt;
              row.dataset.hasAlt = "true";
            }
            if (proposedTd) {
              proposedTd.innerHTML = '<em class="text-gray-400">—</em>';
            }
            const approveCell = row.children[5];
            if (approveCell) {
              approveCell.innerHTML =
                '<span class="text-gray-400 text-xs">N/A</span>';
            }
          }
          unselectAllAndResetProgress();
          updateSelectedCount();
        }
      } catch (err) {
        alert(err.message);
        e.target.disabled = false;
      }
    }
  });

  // Bulk auto-approve button
  const autoApproveAllButton = document.getElementById("auto-approve-all");
  if (autoApproveAllButton) {
    autoApproveAllButton.addEventListener("click", async () => {
      const rows = document.querySelectorAll(".media-asset");
      const assetIds = [];
      rows.forEach((row) => {
        const proposedCell = row.querySelector(".proposed-alt-cell");
        if (proposedCell && proposedCell.textContent.trim() !== "—") {
          const checkbox = row.querySelector(".unoptimized-checkbox");
          if (checkbox) {
            assetIds.push(checkbox.dataset.id);
          }
        }
      });
      if (assetIds.length === 0) {
        alert("No assets with proposed alt text found for approval.");
        return;
      }
      autoApproveAllButton.disabled = true;
      const formData = new FormData();
      formData.append("action", "approve_all_proposed_alts");
      formData.append("nonce", aialgeAjax.nonce);
      formData.append("asset_ids", JSON.stringify(assetIds));
      try {
        const response = await fetch(aialgeAjax.ajaxurl, {
          method: "POST",
          body: formData,
        });
        if (!response.ok) {
          throw new Error("Network error during bulk approval.");
        }
        const result = await response.json();
        if (!result.success) {
          alert(result.data || "Bulk approval failed.");
        } else {
          assetIds.forEach((id) => {
            const row = document
              .querySelector(`.unoptimized-checkbox[data-id="${id}"]`)
              ?.closest(".media-asset");
            if (row) {
              const altCell = row.querySelector(".alt-text-cell");
              const proposedCell = row.querySelector(".proposed-alt-cell");
              if (altCell && proposedCell) {
                altCell.textContent = proposedCell.textContent;
                row.dataset.hasAlt = "true";
                proposedCell.innerHTML = '<em class="text-gray-400">—</em>';
              }
              const approveCell = row.children[5];
              if (approveCell) {
                approveCell.innerHTML =
                  '<span class="text-gray-400 text-xs">N/A</span>';
              }
            }
          });
        }
      } catch (err) {
        alert(err.message);
      } finally {
        autoApproveAllButton.disabled = false;
      }
    });
  }
});