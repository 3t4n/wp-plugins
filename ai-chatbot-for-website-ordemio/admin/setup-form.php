<?php  if ( ! defined( 'ABSPATH' ) ) exit;?>
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
                    <h3 class="font-medium leading-tight text-blue-600 ">Create Assistant</h3>
                    <p class="text-sm">Set up assistant fields</p>
                </span>
            </li>
            <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                    3
                </span>
                <span>
                    <h3 class="font-medium leading-tight">Training</h3>
                    <p class="text-sm">Training&nbsp;assistant</p>
                </span>
            </li>
        </ol>
    </div>
    <div class="bg-white p-8 max-w-xl mx-auto rounded-lg">
        <div class="mx-auto mb-5">
            <h4 class="text-xl font-bold">Create Assistant</h4>
        </div>
        <?php if (strlen(get_option(OrdemioIntegration::OPTION_ERROR))): ?>
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium"><?php echo esc_attr(get_option(OrdemioIntegration::OPTION_ERROR)); ?></span>
            </div>
        <?php endif; ?>
        <form class="mx-auto" method="POST">
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Assistant name</label>
                <input type="text" id="name" name="name"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                       value="AI <?php echo esc_attr(get_bloginfo('name'))?>" required/>
                <p id="helper-text-explanation" class="mt-2 text-xsm text-gray-500 ">This name will be displayed to your visitors when they chat with your assistant.</p>
            </div>
            <div class="mb-5">
                <label for="url"
                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your website</label>
                <input type="text" id="url" name="url"
                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700"
                       value="<?php echo esc_url(home_url())?>" required/>
                <p id="helper-text-explanation" class="mt-2 text-xsm text-gray-500">
                    Provide your website link and we will collect the knowledge from it so the assistant can answer questions about your business. We never use your data to train LLM!
                </p>
            </div>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create My Assistant
            </button>
            <input type="hidden" name="create_assistant" value="Y">
        </form>
    </div>
</div>
