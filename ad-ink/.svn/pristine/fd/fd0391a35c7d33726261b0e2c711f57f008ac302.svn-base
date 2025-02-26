<?php
switch ($this->website['adstxt']) {
    case "validated":
?>
        <div class="inline px-3 py-1 text-green-500 uppercase bg-green-200 rounded-full cursor-pointer" ads-txt-modal-button>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cloud-download-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="mr-1 svg-inline--fa fa-cloud-download-alt fa-w-20">
                <path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zm-132.9 88.7L299.3 420.7c-6.2 6.2-16.4 6.2-22.6 0L171.3 315.3c-10.1-10.1-2.9-27.3 11.3-27.3H248V176c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v112h65.4c14.2 0 21.4 17.2 11.3 27.3z" class=""></path>
            </svg>
            <div class="inline">Ads.txt à jour</div>
        </div>
    <?php
        break;
    case "missing":
    case "outdated":
    ?>
        <div class="inline px-3 py-1 text-red-500 uppercase bg-red-200 rounded-full cursor-pointer" ads-txt-modal-button>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cloud-download-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="mr-1 svg-inline--fa fa-cloud-download-alt fa-w-20">
                <path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zm-132.9 88.7L299.3 420.7c-6.2 6.2-16.4 6.2-22.6 0L171.3 315.3c-10.1-10.1-2.9-27.3 11.3-27.3H248V176c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v112h65.4c14.2 0 21.4 17.2 11.3 27.3z" class=""></path>
            </svg>
            <div class="inline">Mettre à jour l'ads.txt</div>
        </div>
    <?php
        break;
    case "pending":
    ?>
        <div class="inline px-3 py-1 text-orange-500 uppercase bg-orange-200 rounded-full cursor-pointer" ads-txt-modal-button>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cloud-download-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="mr-1 svg-inline--fa fa-cloud-download-alt fa-w-20">
                <path fill="currentColor" d="M537.6 226.6c4.1-10.7 6.4-22.4 6.4-34.6 0-53-43-96-96-96-19.7 0-38.1 6-53.3 16.2C367 64.2 315.3 32 256 32c-88.4 0-160 71.6-160 160 0 2.7.1 5.4.2 8.1C40.2 219.8 0 273.2 0 336c0 79.5 64.5 144 144 144h368c70.7 0 128-57.3 128-128 0-61.9-44-113.6-102.4-125.4zm-132.9 88.7L299.3 420.7c-6.2 6.2-16.4 6.2-22.6 0L171.3 315.3c-10.1-10.1-2.9-27.3 11.3-27.3H248V176c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16v112h65.4c14.2 0 21.4 17.2 11.3 27.3z" class=""></path>
            </svg>
            <div class="inline">Ads.txt en attente de vérification</div>
        </div>
<?php
        break;
}

?>

<div class="fixed inset-0 z-50 hidden w-screen h-screen text-base bg-black bg-opacity-50" ads-txt-modal>
    <div class="relative max-w-2xl mx-auto mt-12 bg-white border rounded-lg modal-content">
        <div class="flex items-start px-6 py-3 border-b">
            <div>
                <div class="text-xl">Ads.Txt</div>
                <div class="text-sm">Mis à jour le <?php echo esc_html(date_format(date_create($this->adstxt["created_at"]), "d/m/Y")); ?></div>
            </div>
            <div class="flex items-center ml-auto">
                <div class="flex items-center justify-center w-8 h-8 rounded-full cursor-pointer hover:bg-gray-200" ads-txt-modal-close>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" class="svg-inline--fa fa-times fa-w-11">
                        <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" class=""></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="px-6 py-3 overflow-y-scroll whitespace-pre-line" style="max-height: 80vh;"><?php echo esc_html($this->adstxt["content"]); ?></div>
    </div>
</div>