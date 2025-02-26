document.addEventListener("DOMContentLoaded", function () {
  let selectedUserId;

  // Handle user selection
  const userSelect = document.getElementById("user_select");
  userSelect.addEventListener("change", function () {
    selectedUserId = this.value;

    // Reset the UI when the user changes
    GSCresetAnalyticsUI();

    if (!selectedUserId) {
      document.getElementById("gsc_sign_in_or_sites").style.display = "none";
      return;
    }

    // Make an AJAX call to check if the user has a stored Google Access Token
    const xhr = new XMLHttpRequest();
    xhr.open("POST", myAjax.ajaxurl, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        if (response.success && response.data.access_token) {
          document.getElementById("gsc_google_access_token").value =
            response.data.access_token;
          fetchGoogleSites(response.data.access_token); // Fetch the sites using the token
        } else {
          // No token found, show the Google Sign-In button
          document.getElementById("gsc_google_signin_container").style.display =
            "block";
          document.getElementById("gsc_list_sites_container").style.display =
            "none";
          document.getElementById("gsc_sign_in_or_sites").style.display =
            "block";
        }
      } else {
        alert("Failed to fetch Google Access Token.");
      }
    };
    xhr.send(
      "action=check_google_access_token&user_id=" +
        encodeURIComponent(selectedUserId) +
        "&_ajax_nonce=" +
        encodeURIComponent(myAjax.nonce)
    );
  });

  // Google Sign-In Flow
  const googleSigninButton = document.getElementById(
    "gsc_google_signin_button"
  );
  googleSigninButton.addEventListener("click", function () {
    const authWindow = window.open(
      "https://ai.1upmedia.com:443/google/auth",
      "Google Auth",
      "width=600,height=400"
    );

    window.addEventListener(
      "message",
      function (event) {
        if (event.data.type === "googleAuthSuccess") {
          const accessToken = event.data.accessToken;
          document.getElementById("gsc_google_access_token").value =
            accessToken;

          // Save the token via AJAX
          const xhr = new XMLHttpRequest();
          xhr.open("POST", myAjax.ajaxurl, true);
          xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
          );
          xhr.onload = function () {
            if (xhr.status === 200) {
              const response = JSON.parse(xhr.responseText);
              if (response.success) {
                fetchGoogleSites(accessToken); // Fetch Google sites after saving the token
              } else {
                alert("Failed to save Google Access Token.");
              }
            }
          };
          xhr.send(
            "action=save_google_access_token&user_id=" +
              encodeURIComponent(selectedUserId) +
              "&access_token=" +
              encodeURIComponent(accessToken) +
              "&_ajax_nonce=" +
              encodeURIComponent(myAjax.nonce)
          );
        }
      },
      false
    );
  });

  // Fetch and display Google Sites
  function fetchGoogleSites(accessToken) {
    fetch(
      `https://ai.1upmedia.com:443/google/sites?accessToken=${encodeURIComponent(
        accessToken
      )}`
    )
      .then(async (response) => {
        try {
          // Handle 204 No Content response or other cases where no data is returned
          if (response.status === 204) {
            return [];
          }

          // Attempt to parse JSON response
          return await response.json();
        } catch (error) {
          console.error("Error parsing response JSON:", error);
          // Return an empty array in case of any parsing error
          return [];
        }
      })
      .then((data) => {
        const siteSelect = document.getElementById("gsc_site_select");
        siteSelect.innerHTML =
          '<option value="">Select a site, If available</option>';
        data.forEach((site) => {
          const option = document.createElement("option");
          option.value = site.siteUrl;
          option.textContent = `${site.siteUrl} (${site.permissionLevel})`;
          siteSelect.appendChild(option);
        });
        document.getElementById("gsc_list_sites_container").style.display =
          "block";
        document.getElementById("gsc_google_signin_container").style.display =
          "none";
        document.getElementById("gsc_sign_in_or_sites").style.display = "block";

        // After selecting a site, reveal date fields and analytics button
        siteSelect.addEventListener("change", function () {
          if (this.value) {
            document.getElementById("gsc_buttons").style.display = "block";
          } else {
            document.getElementById("gsc_buttons").style.display = "none";
          }
        });
      })
      .catch((error) => {
        console.error("Error fetching sites:", error);

        // If the access token is invalid, remove it from the user and show Google Sign-In button
        removeGoogleAccessTokenFromUser().then(() => {
          document.getElementById("gsc_google_signin_container").style.display =
            "block";
          document.getElementById("gsc_list_sites_container").style.display =
            "none";
          document.getElementById("gsc_google_access_token").value = ""; // Clear the access token
          alert(
            "Your Google access token has expired or is invalid. Please sign in again."
          );
        });
      });
  }

  function removeGoogleAccessTokenFromUser() {
    return new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", myAjax.ajaxurl, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function () {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            resolve();
          } else {
            reject("Failed to remove access token.");
          }
        } else {
          reject("Failed to communicate with server.");
        }
      };
      xhr.onerror = function () {
        reject("AJAX request failed.");
      };
      xhr.send(
        "action=remove_google_access_token&user_id=" +
          encodeURIComponent(selectedUserId) +
          "&_ajax_nonce=" +
          encodeURIComponent(myAjax.nonce)
      );
    });
  }

  // Get Analytics Button Click
  document
    .getElementById("gsc_get_analytics_button")
    .addEventListener("click", function () {
      const accessToken = document.getElementById(
        "gsc_google_access_token"
      ).value;
      const siteUrl = document.getElementById("gsc_site_select").value;
      const startDate = document.getElementById("gsc_start_date").value;
      const endDate = document.getElementById("gsc_end_date").value;

      if (!accessToken || !siteUrl || !startDate || !endDate) {
        alert(
          "Please select a site, provide start and end dates, and sign in with Google first."
        );
        return;
      }

      fetch(
        `https://ai.1upmedia.com:443/google/sites/${encodeURIComponent(
          siteUrl
        )}/analytics`,
        {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            accessToken: accessToken,
            startDate: startDate,
            endDate: endDate,
          }),
        }
      )
        .then(async (response) => {
          try {
            // Handle 204 No Content response or other cases where no data is returned
            if (response.status === 204) {
              return [];
            }

            // Attempt to parse JSON response
            return await response.json();
          } catch (error) {
            console.error("Error parsing response JSON:", error);
            // Return an empty array in case of any parsing error
            return [];
          }
        })
        .then((data) => {
          let tableHtml =
            "<table><thead><tr><th>Query</th><th>Clicks</th><th>Impressions</th><th>CTR</th><th>Position</th><th>Ranking URL</th><th>Device</th><th>Country</th></tr></thead><tbody>";

          data.forEach((entry) => {
            const [query, rankingUrl, device, country] = entry.keys;

            tableHtml += `
            <tr>
                <td>${query}</td>
                <td>${entry.clicks}</td>
                <td>${entry.impressions}</td>
                <td>${(entry.ctr * 100).toFixed(2)}%</td>
                <td>${entry.position.toFixed(2)}</td>
                <td><a href="${rankingUrl}" target="_blank">${rankingUrl}</a></td>
                <td>${device}</td>
                <td>${country.toUpperCase()}</td>
            </tr>`;
          });

          tableHtml += "</tbody></table>";
          document.getElementById("gsc_analytics_table_container").innerHTML =
            tableHtml;
          document.getElementById("gsc_results").style.display = "block";
        })
        .catch((error) => {
          document.getElementById("gsc_analytics_table_container").textContent =
            "Error fetching analytics data: " + error;
        });
    });

  // Function to reset the UI when a user is changed
  function GSCresetAnalyticsUI() {
    document.getElementById("gsc_list_sites_container").style.display = "none";
    document.getElementById("gsc_buttons").style.display = "none";
    document.getElementById("gsc_compare_analytics_container").style.display =
      "none";
    document.getElementById("gsc_google_access_token").value = ""; // Clear the access token field
    document.getElementById("gsc_results").style.display = "none"; // Hide the results section
  }
});
