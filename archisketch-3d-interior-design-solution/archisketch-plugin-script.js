async function checkPluginIntegration() {
    try {
        const responseUrl = apiUrl + 'v1/connect/wordpress/authorize?wuid=' + encodeURIComponent(wuid);
        
        const response = await fetch(responseUrl, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "X-CONNECT-CHECK": encryptedKey,
            },
            redirect: 'follow',
        });

        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
        const data = await response.json();
        const resultURL = data.result;
        return resultURL;
    } catch (error) {
        console.error("Error fetching plugin data:", error);
        return null;
    }
}

async function haveActivedPlugin() {
    const connectedText = navigator.language.startsWith("ko") ? "✅ 연동 완료!" : "✅ Connected";
    const unconnectedText = navigator.language.startsWith("ko") ? "❌ 연동되지 않음." : "❌ Not connected.";

    try {
        const responseUrl = apiUrl + 'v1/connect/plugins?identifier=' + encodeURIComponent(wuid);
    
        const response = await fetch(responseUrl, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "X-CONNECT-CHECK": encryptedKey,
            },
        });

        if (!response.ok) {
            return document.getElementById('archisketch-plugin-status').innerText = unconnectedText;
        };

        const data = await response.json();      
        return document.getElementById('archisketch-plugin-status').innerText = data.plugin.status === "pending" ? unconnectedText : connectedText;
    } catch (error) {
        console.error("Error fetching plugin data:", error);
    }
}

(async () => {
    await haveActivedPlugin();
})();