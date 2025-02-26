<?php  if ( ! defined( 'ABSPATH' ) ) exit;?>
<div class="container mx-auto mt-10">
    <div class="bg-white mb-8 px-4 py-3 max-w-2xl mx-auto rounded-lg">
        <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
            <li class="flex items-center text-blue-600 space-x-2.5 rtl:space-x-reverse">
                <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">1</span>
                <span>
                    <h3 class="font-medium leading-tight text-blue-600 ">Create account</h3>
                    <p class="text-sm">Create&nbsp;Ordemio&nbsp;account</p>
                </span>
            </li>
            <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">2</span>
                <span>
                    <h3 class="font-medium leading-tight  ">Create Assistant</h3>
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
    <div class="bg-white p-8 mx-auto rounded-lg" style="max-width: fit-content">
        <div class="flex flex-row gap-3 justify-center">
            <div>
                <div class="mb-5">
                    <img src="<?php echo esc_attr(plugin_dir_url( __FILE__ ) . '../assets/imgs/logo.svg'); ?>"/>
                </div>
                <div class="mx-auto mb-5">
                    <h4 class="text-xl font-bold">Create a Free account</h4>
                    <p>Get a custom AI Chatbot for your website in minutes</p>
                </div>
                <?php if (strlen(get_option(OrdemioIntegration::OPTION_ERROR))): ?>
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <span class="font-medium"><?php echo esc_attr(get_option(OrdemioIntegration::OPTION_ERROR)); ?></span>
                    </div>
                <?php endif; ?>
                <form class="mx-auto" method="POST">
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               required/>
                    </div>
                    <div class="mb-5">
                        <label for="password"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password"  name="password"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                               required/>
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create an account
                    </button>
                    <div class="flex flex-row gap-5 mt-5">
                        <div class="flex flex-row gap-1 text-md">
                            <svg class="w-4 h-4 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#16e9a282" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <div>No code</div>
                        </div>
                        <div class="flex flex-row gap-1 text-md">
                            <svg class="w-4 h-4 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#16e9a282" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <div>Ready in minutes</div>
                        </div>
                        <div class="flex flex-row gap-1 text-md">
                            <svg class="w-4 h-4 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#16e9a282" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <div>95+ Languages</div>
                        </div>
                    </div>
                    <div class="flex items-start mt-5">
                        <label for="terms" class="text-sm font-medium text-gray-900 dark:text-gray-300">
                            Already have an account? <a href="/wp-admin/admin.php?page=ordemio-settings&state=installation_auth" class="text-blue-600 hover:underline">Sign in</a>
                        </label>
                    </div>
                    <input type="hidden" name="register_user" value="Y">
                    <p class="text-xsm text-gray-600 mt-4">
                        By&nbsp;continuing, you agree to&nbsp;our
                        <a href="https://www.ordemio.com/terms" class="underline" target="_blank" rel="noopener noreferrer">Terms of&nbsp;Service</a> and
                        <a href="https://www.ordemio.com/privacy" class="underline" target="_blank" rel="noopener noreferrer">Privacy Policy</a>
                    </p>
                </form>
            </div>
            <div>
                <img src="<?php echo esc_attr(plugin_dir_url( __FILE__ ) . '../assets/imgs/screen.png'); ?>" style="max-width: 400px" />
            </div>
        </div>
    </div>
</div>
