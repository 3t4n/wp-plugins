const wuid = common_asp_data.wuid;
const apiUrl = common_asp_data.apiUrl;
const encryptedKey = common_asp_data.encryptedKey;

async function checkPluginIntegration() {
  try {
    const responseUrl =
      apiUrl +
      "v1/connect/wordpress/authorize?wuid=" +
      encodeURIComponent(wuid);

    const response = await fetch(responseUrl, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-CONNECT-CHECK": encryptedKey,
      },
      redirect: "follow",
    });

    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
    const data = await response.json();
    return data.result;
  } catch (error) {
    console.error("Error fetching plugin data:", error);
    return null;
  }
}

async function haveActivedPlugin() {
  const connectedText = "✅ Connected";
  const unconnectedText = "❌ Not connected.";

  try {
    const responseUrl =
      apiUrl + "v1/connect/plugins?identifier=" + encodeURIComponent(wuid);

    const response = await fetch(responseUrl, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-CONNECT-CHECK": encryptedKey,
      },
    });

    const statusElement = document.getElementById("archisketch-plugin-status");
    if (!response.ok) {
      statusElement.innerText = unconnectedText;
      return;
    }

    const data = await response.json();
    statusElement.innerText =
      data.plugin.status === "pending" ? unconnectedText : connectedText;
  } catch (error) {
    console.error("Error fetching plugin data:", error);
  }
}

(async () => {
  await haveActivedPlugin();
})();
