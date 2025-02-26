<div id="annfu_download_pwa_wrapper" class="<?php echo get_option('annfu_notifiche_pwa_fixed') ? 'annfu_fixed' : '' ?>">
    <div>
        <div id="annfu_ios_istruzioni" class="annfu_none">
            <?php echo get_option('annfu_invito_download_pwa_ios') ?>
        </div>
        <button id="annfu_install" hidden>
            <?php echo get_option('annfu_invito_download_pwa_android') ?>
        </button>
    </div>
    <a href="#" id="annfu_close_pwa" class="annfu_pointer"><small>Chiudi</small></a>
</div>
<script type="text/javascript">
    let installPrompt = null;
    const installButton = document.querySelector("#annfu_install");

    window.addEventListener("beforeinstallprompt", (event) => {
        event.preventDefault();
        installPrompt = event;
        if (Cookies.get('annfu_download_pwa') == 1) {
            document.body.classList.remove('annfu_pwa_banner_show');
        } else {
            installButton.removeAttribute("hidden");
            document.body.classList.add('annfu_pwa_banner_show');
        }
    });

    window.addEventListener("appinstalled", () => {
        disableInAppInstallPrompt();
    });

    installButton.addEventListener("click", async () => {
        if (!installPrompt) {
            return;
        }
        const result = await installPrompt.prompt();
        disableInAppInstallPrompt();
    });

    function disableInAppInstallPrompt() {
        installPrompt = null;
        installButton.setAttribute("hidden", "");
        Cookies.set('annfu_download_pwa', 1, {expires: 7});
        document.getElementById("annfu_download_pwa_wrapper").classList.add('annfu_none');
        document.body.classList.remove('annfu_pwa_banner_show');
    }

    function showIosInstallInstructions() {
        const userAgent = window.navigator.userAgent.toLowerCase();
        const isIos = /iphone|ipad|ipod/.test(userAgent);
        const isInStandaloneMode = window.matchMedia('(display-mode: standalone)').matches;

        if (isIos && !isInStandaloneMode) {
            document.querySelector("#annfu_ios_istruzioni").classList.remove('annfu_none');
        }
    }

    showIosInstallInstructions();

    jQuery(document).ready(function () {
        if (Cookies.get('annfu_download_pwa') == 1) {
            jQuery('#annfu_download_pwa_wrapper').hide();
            jQuery('body').removeClass('annfu_pwa_banner_show');
        }

        jQuery('#annfu_close_pwa').on('click', function () {
            jQuery('#annfu_download_pwa_wrapper').hide();
            jQuery('body').removeClass('annfu_pwa_banner_show');
            Cookies.set('annfu_download_pwa', 1, {expires: 7});
        })

        if (navigator.standalone || window.matchMedia('(display-mode: standalone)').matches) {
            fetch('https://admin.annuncifunebri.it/api/PWAIn',{
                method: 'post',
                body: JSON.stringify({
                    'url': window.location.href,
                    'user': Cookies.get('annfu_pwa') || null,
                    'of': '<?php echo get_option('annfu_onoranza_funebre_id') ?>'
                })
            });
        }
    });

</script>
<?php if(get_option('annfu_css_pwa', '') != ''): ?>
    <style type="text/css">
        <?php echo get_option('annfu_css_pwa', '') ?>
    </style>
<?php endif; ?>
