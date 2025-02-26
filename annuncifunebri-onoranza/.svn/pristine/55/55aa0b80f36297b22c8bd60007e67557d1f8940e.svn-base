<?php $vapidKey = 'BMl8UuCUEXJ0qXj7AcTpUfIbSKCG8d5BfbQv_EWnWA_lKUFQ_-9Sqz17W08FL7d27nh4k0s2QM55fcwXimVT9UI'; ?>

<script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
    import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-messaging.js";

    function detectBrowser() {
        var userAgent = navigator.userAgent;
        if (userAgent.indexOf("Edg") > -1) {
            return "Microsoft Edge";
        } else if (userAgent.indexOf("Chrome") > -1) {
            return "Chrome";
        } else if (userAgent.indexOf("Firefox") > -1) {
            return "Firefox";
        } else if (userAgent.indexOf("Safari") > -1) {
            return "Safari";
        } else if (userAgent.indexOf("Opera") > -1) {
            return "Opera";
        } else if (userAgent.indexOf("Trident") > -1 || userAgent.indexOf("MSIE") > -1) {
            return "Internet Explorer";
        }

        return "Unknown";
    }

    const firebaseConfig = {
        apiKey: "AIzaSyB3PHxEZsQG172OTSg8KLEUkk59xUQfQY0",
        authDomain: "annuncifunebri-push.firebaseapp.com",
        databaseURL: "https://annuncifunebri-push.firebaseio.com",
        projectId: "annuncifunebri-push",
        storageBucket: "annuncifunebri-push.appspot.com",
        messagingSenderId: "280797063326",
        appId: "1:280797063326:web:eec10279e9256b0c43b38f"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const messaging = getMessaging(app);

    let browserName = detectBrowser();
    let registration = await navigator.serviceWorker.register("<?php echo ANNFU_PLUGIN_URL ?>/js/service-worker.js");
    if(browserName != 'Safari') {
        getAndSendToken(messaging, registration);
    }

    const allowButton = document.getElementById("annfu_allow_notifications");
    const allowButtonWrapper = document.getElementById("annfu_allow_notifications_wrapper");
    allowButton.addEventListener("click", async () => {
        let permission = await Notification.requestPermission();
        if (permission === "granted") {
            getAndSendToken(messaging, registration)
        } else {
            console.log("Notification permission denied");
        }
    });

    async function getAndSendToken(messaging, registration) {
        getToken(messaging, {
            serviceWorkerRegistration: registration,
            vapidKey: '<?php echo $vapidKey ?>'
        }).then((token) => {
            if (token) {
                sendToken(token);
                Cookies.set('annfu_pwa', token, {expires: 365});
                allowButtonWrapper.style.display = 'none';
            } else {
                allowButtonWrapper.style.display = 'block';
            }
        }).catch((err) => {
            if(Notification.permission === 'denied') {
                document.getElementById('annfu_notification_text').innerHTML = 'Per poter ricevere le notifiche, devi prima abilitarle sul browser';
            }
        });
    }

    function sendToken(token) {
        const formData = new FormData();
        formData.append('token', token);
        formData.append('sistema_operativo', 'pwa');
        formData.append('app', '<?php echo get_site_url() ?>');
        formData.append('of', '<?php echo get_option('annfu_onoranza_funebre_id') ?>');
        fetch('<?php echo ANNFU_SITE_API ?>/v2/app',{
            method: 'post',
            body: formData
        });
    }
</script>

<div id="annfu_allow_notifications_wrapper">
    <span id="annfu_notification_text"></span>
    <button id="annfu_allow_notifications" class="btn btn-default">Abilita notifiche</button>
</div>
