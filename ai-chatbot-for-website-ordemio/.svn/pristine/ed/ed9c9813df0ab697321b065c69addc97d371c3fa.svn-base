<?php  if ( ! defined( 'ABSPATH' ) ) exit;
$this->api->setAuth(get_option(OrdemioIntegration::OPTION_TOKEN), get_option(OrdemioIntegration::OPTION_REFRESH_TOKEN));
$assistants = $this->api->assistants_list();
?>
<div class="container mx-auto mt-10">
    <div class="bg-white mb-8 px-4 py-3 max-w-2xl mx-auto rounded-lg">
        <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
            <li class="flex items-center text-green-600 space-x-2.5 rtl:space-x-reverse">
                <span class="flex items-center justify-center w-8 h-8 border bg-green-500 text-white border-green-600 rounded-full shrink-0">1</span>
                <span>
                    <h3 class="font-medium leading-tight text-green-600 ">Create account</h3>
                    <p class="text-sm">Create&nbsp;Ordemio&nbsp;account</p>
                </span>
            </li>
            <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
                <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">2</span>
                <span>
                    <h3 class="font-medium leading-tight text-blue-600 ">Choice Assistant</h3>
                    <p class="text-sm">Install assistant</p>
                </span>
            </li>
        </ol>
    </div>
    <div class="bg-white p-8 max-w-xl mx-auto rounded-lg">
        <div class="mx-auto mb-5">
            <h4 class="text-xl font-bold">Choice Assistant</h4>
        </div>
        <form class="mx-auto" method="POST">
            <?php foreach ($assistants as $assistant) { ?>
                <div class="p-6 bg-white border border-gray-200 rounded-lg mb-3 hover:bg-gray-50">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <?php echo esc_html($assistant['name'])?>
                        </h5>
                    </a>
                    <div class="flex flex-row gap-6 mt-3 mb-5 w-full text-md">
                        <div>
                            <div class="text-main-grey-80"> Messages </div>
                            <div class="text-gray-800"> <?php echo esc_html($assistant['messages_count'])?> </div>
                        </div>
                        <div>
                            <div class="text-main-grey-80"> Conversations </div>
                            <div class="text-gray-800"> <?php echo esc_html($assistant['chats_count'])?> </div>
                        </div>
                        <div>
                            <div class="text-main-grey-80"> Knowledge </div>
                            <div class="text-gray-800"> <?php echo esc_html($assistant['number_docs'])?> </div>
                        </div>
                    </div>
                    <a href="/wp-admin/admin.php?page=ordemio-settings&assistant=<?php echo esc_attr($assistant['id'])?>" class="hover:text-white inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Install this Assistant
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            <?php } ?>
            <input type="hidden" name="choice_assistant" value="Y">
        </form>
    </div>
</div>
