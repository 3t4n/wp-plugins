<?php  if ( ! defined( 'ABSPATH' ) ) exit;?>
<div class="bg-white p-8 mx-auto rounded-lg mt-5" style="min-height: 600px;" id="setting-page">
    <div class="flex flex-row gap-5">
        <div style="flex-basis: 55%">
            <h3 class="text-2xl font-bold">
                Your AI Assistant is <?php echo (get_option(OrdemioIntegration::OPTION_SHOW_FRONT) == 'Y' ? 'active' : 'disabled')?>
            </h3>
            <form method="POST" id="changeToggle">
            <div class="mt-3 py-3">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="1" name="show_front" <?php echo (get_option(OrdemioIntegration::OPTION_SHOW_FRONT) == 'Y' ? 'checked' : '')?> class="sr-only peer" onchange="changeToggle()">
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Display the assistant on the website.</span>
                </label>
                <input type="hidden" name="change_visible" value="Y">
            </div>
            </form>
            <div class="mt-5 text-md p-5 border border-gray-300 rounded-lg max-w-xl">
                <p class="text-lg">More settings are available in your account at Ordmeio.com:</p>
                <ul class="max-w-md space-y-1 text-md list-disc list-inside mt-3">
                    <li>Knowledge Base Management</li>
                    <li>Your Assistant's Statistics</li>
                    <li>Appearance Settings</li>
                    <li>Chats History</li>
                    <li>Lead Database</li>
                    <li>And other integrations.</li>
                </ul>
                <div class="mt-5">
                    <a href="https://app.ordemio.com" target="_blank" class="block text-white bg-blue-700 hover:bg-blue-800 hover:text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center max-w-lg">
                        Go to Ordemio Dashboard
                    </a>
                </div>
            </div>
        </div>
        <div  id="previewBlock" style="min-width: 450px;">
            <!-- iFrame with provided code snippet -->
            <iframe
                    src="https://chat.ordemio.com/widget/i/iframe.html?assistant_id=<?php echo esc_attr(get_option(OrdemioIntegration::OPTION_ASSISTANT))?>"
                    width="100%"
                    style="height: 100%; min-height: 500px; border: 1px solid #dedede"
                    frameborder="0"
            ></iframe>

        </div>
    </div>
</div>
