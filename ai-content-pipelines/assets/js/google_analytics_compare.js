document.addEventListener("DOMContentLoaded", function () {
  let selectedUserId;

  // Handle user selection
  document
    .getElementById("user_select")
    .addEventListener("change", function () {
      selectedUserId = this.value;

      // Reset the UI when the user changes
      ACresetAnalyticsUI();

      if (!selectedUserId) {
        document.getElementById("google_sign_in_or_sites").style.display =
          "none";
        return;
      }

      // Make an AJAX call to check if the user has a stored Google Access Token
      var xhr = new XMLHttpRequest();
      xhr.open("POST", myAjax.ajaxurl, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function () {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.success && response.data.access_token) {
            document.getElementById("ac_google_access_token").value =
              response.data.access_token;
            fetchGoogleSites(response.data.access_token); // Fetch the sites using the token
          } else {
            // No token found, show the Google Sign-In button
            document.getElementById("google_signin_container").style.display =
              "block";
            document.getElementById("gsc_list_sites_container").style.display =
              "none";
          }
        } else {
          alert("Failed to fetch Google Access Token.");
        }
      };
      xhr.send(
        "action=check_google_access_token&user_id=" +
          selectedUserId +
          "&_ajax_nonce=" +
          myAjax.nonce
      );
    });

  // Google Sign-In Flow
  document
    .getElementById("google_signin_button")
    .addEventListener("click", function () {
      const authWindow = window.open(
        "https://ai.1upmedia.com:443/google/auth",
        "Google Auth",
        "width=600,height=400"
      );

      window.addEventListener("message", function (event) {
        if (event.data.type === "googleAuthSuccess") {
          const accessToken = event.data.accessToken;
          document.getElementById("ac_google_access_token").value = accessToken;

          // Save the token via AJAX
          var xhr = new XMLHttpRequest();
          xhr.open("POST", myAjax.ajaxurl, true);
          xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
          );
          xhr.onload = function () {
            if (xhr.status === 200) {
              var response = JSON.parse(xhr.responseText);
              if (response.success) {
                fetchGoogleSites(accessToken); // Fetch Google sites after saving the token
              } else {
                alert("Failed to save Google Access Token.");
              }
            }
          };
          xhr.send(
            "action=save_google_access_token&user_id=" +
              selectedUserId +
              "&access_token=" +
              accessToken +
              "&_ajax_nonce=" +
              myAjax.nonce
          );
        }
      });
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
        const siteSelect = document.getElementById("site_select");
        siteSelect.innerHTML = '<option value="">Select a site</option>';
        data.forEach((site) => {
          const option = document.createElement("option");
          option.value = site.siteUrl;
          option.textContent = `${site.siteUrl} (${site.permissionLevel})`;
          siteSelect.appendChild(option);
        });
        document.getElementById("gsc_list_sites_container").style.display =
          "block";
        document.getElementById("google_signin_container").style.display =
          "none";

        // After selecting a site, reveal date fields and analytics button
        siteSelect.addEventListener("change", function () {
          if (this.value) {
            document.getElementById("gsc_buttons").style.display = "block";
            document.getElementById("comparison_results").style.display =
              "none"; // Hide previous results
          } else {
            document.getElementById("gsc_buttons").style.display = "none";
          }
        });
      })
      .catch((error) => {
        console.error("Error fetching sites:", error);

        // If the access token is invalid, remove it from the user and show Google Sign-In button
        removeGoogleAccessTokenFromUser().then(() => {
          document.getElementById("google_signin_container").style.display =
            "block";
          document.getElementById("gsc_list_sites_container").style.display =
            "none";
          document.getElementById("ac_google_access_token").value = ""; // Clear the access token
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
          var response = JSON.parse(xhr.responseText);
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
          selectedUserId +
          "&_ajax_nonce=" +
          myAjax.nonce
      );
    });
  }

  // Get Analytics Button Click
  document
    .getElementById("compare_button")
    .addEventListener("click", function () {
      const accessToken = document.getElementById(
        "ac_google_access_token"
      ).value;
      const siteUrl = document.getElementById("site_select").value;
      const startDate1 = document.getElementById("start_date_1").value;
      const endDate1 = document.getElementById("end_date_1").value;
      const startDate2 = document.getElementById("start_date_2").value;
      const endDate2 = document.getElementById("end_date_2").value;

      if (
        !accessToken ||
        !siteUrl ||
        !startDate1 ||
        !endDate1 ||
        !startDate2 ||
        !endDate2
      ) {
        alert(
          "Please sign in with Google, select a site, and provide both date ranges."
        );
        return;
      }

      fetch(`https://ai.1upmedia.com:443/google/compare-analytics`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          accessToken: accessToken,
          siteUrl: siteUrl,
          startDate1: startDate1,
          endDate1: endDate1,
          startDate2: startDate2,
          endDate2: endDate2,
        }),
      })
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
          displayComparisonResults(data.comparedData);
          renderComparisonChart(data.comparedData);
          document.getElementById("comparison_results").style.display = "block"; // Show the results
        })
        .catch((error) => {
          document.getElementById("comparison_results").textContent =
            "Error fetching comparison data: " + error;
        });
    });

  // Display comparison results in table format
  function displayComparisonResults(comparedData) {
    let tableHtml =
      '<table class="table table-striped"><thead><tr><th>Query</th><th>Clicks (Range 1 → Range 2)</th><th>Impressions (Range 1 → Range 2)</th><th>CTR (Range 1 → Range 2)</th><th>Position (Range 1 → Range 2)</th><th>Performance</th></tr></thead><tbody>';

    comparedData.forEach((data) => {
      const range1Clicks = data.range1 ? data.range1.clicks : 0;
      const range1Impressions = data.range1 ? data.range1.impressions : 0;
      const range1Ctr = data.range1
        ? (data.range1.ctr * 100).toFixed(2) + "%"
        : "0%";
      const range1Position = data.range1 ? data.range1.position : "N/A";

      const range2Clicks = data.range2 ? data.range2.clicks : "N/A";
      const range2Impressions = data.range2 ? data.range2.impressions : "N/A";
      const range2Ctr = data.range2
        ? (data.range2.ctr * 100).toFixed(2) + "%"
        : "N/A";
      const range2Position = data.range2 ? data.range2.position : "N/A";

      const performanceEmoji = data.range2
        ? data.clicksDiff > 0
          ? '<span class="green-up-arrow">&#x2191;</span>'
          : data.clicksDiff < 0
          ? '<span class="red-down-arrow">&#x2193;</span>'
          : '<span class="green-up-arrow">&#x2191;</span>'
        : '<span class="red-down-arrow">&#x2193;</span>';

      tableHtml += `
        <tr>
          <td>${data.query}</td>
          <td>${range1Clicks} → ${range2Clicks}</td>
          <td>${range1Impressions} → ${range2Impressions}</td>
          <td>${range1Ctr} → ${range2Ctr}</td>
          <td>${range1Position} → ${range2Position}</td>
          <td>${performanceEmoji}</td>
        </tr>`;
    });

    tableHtml += "</tbody></table>";
    document.getElementById("analytics_table_container").innerHTML = tableHtml;
  }

  // Render comparison chart using Chart.js
  function renderComparisonChart(comparedData) {
    const validData = comparedData.filter(
      (data) => data.range1 && (data.range2 || data.range2 === null)
    );

    const sortedData = validData.sort(
      (a, b) => b.impressionsDiff - a.impressionsDiff
    );
    const top5Performing = sortedData.slice(0, 5);
    const top5Decreasing = sortedData.slice(-5).reverse();

    const selectedData = [...top5Performing, ...top5Decreasing];

    const labels = selectedData.map((data) => data.query);
    const clicksDataRange1 = selectedData.map((data) =>
      data.range1 ? data.range1.clicks : 0
    );
    const clicksDataRange2 = selectedData.map((data) =>
      data.range2 ? data.range2.clicks : 0
    );

    const ctx = document.getElementById("comparisonChart").getContext("2d");
    if (ctx.chart) {
      ctx.chart.destroy();
    }

    ctx.chart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: labels,
        datasets: [
          {
            label: "Clicks (Range 1)",
            data: clicksDataRange1,
            backgroundColor: "rgba(75, 192, 192, 0.5)",
            borderColor: "rgba(75, 192, 192, 1)",
            borderWidth: 1,
          },
          {
            label: "Clicks (Range 2)",
            data: clicksDataRange2,
            backgroundColor: "rgba(153, 102, 255, 0.5)",
            borderColor: "rgba(153, 102, 255, 1)",
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        plugins: {
          legend: {
            position: "top",
          },
        },
      },
    });
  }

  // Function to reset the UI when a user is changed
  function ACresetAnalyticsUI() {
    document.getElementById("gsc_list_sites_container").style.display = "none";
    document.getElementById("gsc_buttons").style.display = "none";
    document.getElementById("comparison_results")
      ? (document.getElementById("comparison_results").style.display = "none")
      : "";
    document.getElementById("analytics_table_container").innerHTML = ""; // Clear any existing data
    document.getElementById("ac_google_access_token").value = ""; // Clear the access token field
  }
});
