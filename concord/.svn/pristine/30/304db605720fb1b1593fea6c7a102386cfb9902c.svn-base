document.addEventListener("DOMContentLoaded", function () {
  const setupSection = document.getElementById("setup_section");
  const changeSelectionBtn = document.getElementById("change_selection");
  const saveProjectIdBtn = document.getElementById("save_project_id");
  const projectIdInput = document.getElementById("project_id");
  const projectsSection = document.getElementById("projects_section");
  const tabBtns = document.querySelectorAll(".tab-btn");
  const tabContents = document.querySelectorAll(".tab-content");
  const deleteIntegrationBtn = document.getElementById("delete_integration");
  const toggleIntegration = document.getElementById("toggle_integration");

  changeSelectionBtn?.addEventListener("click", () => {
    setupSection.style.display = "flex";
    projectsSection.style.display = "none";
  });

  // Tab switching
  tabBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const tab = btn.dataset.tab;

      tabBtns.forEach((b) => b.classList.remove("active"));
      tabContents.forEach((c) => c.classList.remove("active"));

      btn.classList.add("active");
      document.getElementById(`${tab}-setup`).classList.add("active");
    });
  });

  function showLoading(element) {
    const loadingSpinner = document.createElement("div");
    loadingSpinner.className = "loading active";
    element.appendChild(loadingSpinner);
    element.disabled = true;
  }

  function hideLoading(element) {
    const spinner = element.querySelector(".loading");
    if (spinner) spinner.remove();
    element.disabled = false;
  }

  saveProjectIdBtn?.addEventListener("click", async () => {
    const projectId = projectIdInput.value.trim();
    if (!projectId) return;

    showLoading(saveProjectIdBtn);
    try {
      const response = await fetch(concordData.ajaxUrl, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          action: "concord_save_project_id",
          nonce: concordData.nonce,
          project_id: projectId,
        }),
      });

      const data = await response.json();
      if (data.success) {
        location.reload();
      }
    } catch (error) {
      console.error("Error:", error);
    } finally {
      hideLoading(saveProjectIdBtn);
    }
  });

  deleteIntegrationBtn?.addEventListener("click", async () => {
    if (!confirm("Are you sure you want to delete this connection?")) {
      return;
    }

    showLoading(deleteIntegrationBtn);
    try {
      const response = await fetch(concordData.ajaxUrl, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          action: "concord_delete_integration",
          nonce: concordData.nonce,
        }),
      });

      const data = await response.json();
      if (data.success) {
        location.reload();
      }
    } catch (error) {
      console.error("Error:", error);
    } finally {
      hideLoading(deleteIntegrationBtn);
    }
  });

  toggleIntegration?.addEventListener("change", async (event) => {
    const toggleLabel = toggleIntegration
      .closest(".toggle-switch")
      .querySelector(".toggle-label");
    const originalText = toggleLabel.textContent;
    toggleLabel.textContent = "Saving...";
    toggleIntegration.disabled = true;

    try {
      const response = await fetch(concordData.ajaxUrl, {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({
          action: "concord_toggle_integration",
          nonce: concordData.nonce,
        }),
      });

      const data = await response.json();
      if (data.success) {
        // location.reload();
      } else {
        // Revert the toggle if the request failed
        toggleIntegration.checked = !toggleIntegration.checked;
      }
    } catch (error) {
      console.error("Error:", error);
      // Revert the toggle if there was an error
      toggleIntegration.checked = !toggleIntegration.checked;
    } finally {
      toggleLabel.textContent = originalText;
      toggleIntegration.disabled = false;
    }
  });
});
