<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
function aieo_getRandomNumberBetween1And3()
{
    $randomNumber = wp_rand(1, 3);
    return $randomNumber;
}
$randomNumber = aieo_getRandomNumberBetween1And3();


?>
<div id="aieo-wpbody-content">
    <div class="ai-optimizer-top-bar">
        <a href="https://eshop-optimizer.com/?utm_source=woo&utm_medium=plugin&utm_campaign=header" class="ai-optimizer-top-bar-logo" target="_blank">
            <img src="<?php echo AIEO_URI; ?>assets/images/OMLogo-300.webp" />
        </a>
        <div class="ai-optimizer-top-bar-infos">
            <div class="ai-optimizer-top-bar-info-item">
                <div class="ai-optimizer-version">
                    <a href="https://eshop-optimizer.com/changelog/?utm_source=woo&utm_medium=plugin&utm_campaign=header" class="ai-optimizer-website" target="_blank"><strong>v<?php echo esc_html(AIEO_VERSION); ?></strong></a>
                </div>
            </div>
            <div class="ai-optimizer-top-bar-info-item">
                <strong><a href="https://eshop-optimizer.com/?utm_source=woo&utm_medium=plugin&utm_campaign=header" class="ai-optimizer-website" target="_blank">
                        eshop-optimizer.com<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6 2.40002H7.20002L8.00002 4.00002H11.264L6.39202 8.88002L7.52002 10.008L12 5.53602V8.00002L13.6 8.80002V2.40002ZM9.60002 9.60002V12H4.00002V6.40002H7.20002L8.80002 4.80002H2.40002V13.6H11.2V8.00002L9.60002 9.60002Z" fill="#3858E9"></path>
                        </svg>
                    </a></strong>
            </div>
        </div>
    </div>
    <div class="wrap merchant-wrap">
        <div class="ai-optimizer-modules-header<?php echo $randomNumber; ?>">
            <div class="ai-optimizer-modules-header-left">
                <div class="ai-optimizer-modules-header-heading">Welcome to AI eShop Optimizer 👋🏻
                    </br>Build on your strengths and value your loyal clients.
                </div>
                <div class="ai-optimizer-modules-header-subheading">
                    We’re glad to see you <strong><?php
                                                    $current_user = wp_get_current_user();
                                                    echo esc_html($current_user->display_name); ?> :)</strong>
                    <div class="card-dark">
                        AI eShop Optimizer is the first AI-powered service for <strong>generalized product catalog optimization</strong> and is available for Woocommerce-powered shops.
                        </br></br>Our innovative work on <strong>AI-powered semantic-triple analysis</strong> now provides optimal recommendations in retail e-commerce.
                        </br></br>AI eShop Optimizer analyses all your orders and generates <strong>optimal cross-sells and up-sells</strong> for all your products!
                        </br></br>With a few clicks you will get relevant recommendations in seconds <strong>saving you thousands of hours</strong>!
                        </br></br>Our existing-beta customers have observed an <strong>increase in sales of over 57% within a year</strong>!
                        </br></br>Play on your strengths and <strong>trust those who trust you: your existing clients!</strong>
                        </br></br>Get your <strong><a href="https://eshop-optimizer.com/ai-powered-product-recommendations" target="_blank">GraphDB-powered</a> free analysis</strong> of up to 50000 order items!
                        </br></br>Follow the steps below and <strong><a href="https://eshop-optimizer.com/my-account/?utm_source=woo&utm_medium=plugin&utm_campaign=subheading" target="_blank">create a free account today!</a></strong>
                    </div>
                </div>
            </div>
            <div class="ai-optimizer-modules-header-right">
                <ul class="ai-optimizer-modules-header-shortlinks">
                    <li>
                        <a href="https://eshop-optimizer.com/my-account/?utm_source=woo&utm_medium=plugin&utm_campaign=setup" target="_blank">
                            <svg width=" 24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.7744 12.9949C18.652 12.8581 18.5845 12.6822 18.5845 12.5C18.5845 12.3178 18.652 12.1419 18.7744 12.0051L19.7516 10.9252C19.8593 10.8072 19.9261 10.6588 19.9426 10.5012C19.959 10.3435 19.9242 10.1848 19.8432 10.0478L18.3164 7.45319C18.2362 7.31635 18.114 7.20788 17.9673 7.14324C17.8206 7.07861 17.6569 7.06111 17.4995 7.09324L16.0643 7.3782C15.8817 7.41526 15.6916 7.38539 15.5299 7.29421C15.3681 7.20303 15.246 7.05685 15.1864 6.88326L14.7208 5.51095C14.6695 5.362 14.572 5.23264 14.4418 5.14113C14.3117 5.04963 14.1556 5.00061 13.9955 5.00102H10.9419C10.7754 4.99248 10.6107 5.03771 10.4728 5.12979C10.335 5.22187 10.2316 5.35574 10.1785 5.51095L9.751 6.88326C9.69146 7.05685 9.56929 7.20303 9.40756 7.29421C9.24582 7.38539 9.05571 7.41526 8.87309 7.3782L7.39972 7.09324C7.25051 7.07252 7.0984 7.09565 6.96256 7.15971C6.82671 7.22376 6.71319 7.32588 6.63632 7.45319L5.10951 10.0478C5.02642 10.1833 4.98906 10.3411 5.00277 10.4987C5.01648 10.6563 5.08056 10.8056 5.18585 10.9252L6.15537 12.0051C6.27776 12.1419 6.34526 12.3178 6.34526 12.5C6.34526 12.6822 6.27776 12.8581 6.15537 12.9949L5.18585 14.0748C5.08056 14.1944 5.01648 14.3437 5.00277 14.5013C4.98906 14.6589 5.02642 14.8167 5.10951 14.9522L6.63632 17.5468C6.71655 17.6837 6.83871 17.7921 6.98538 17.8568C7.13206 17.9214 7.29576 17.9389 7.45316 17.9068L8.88836 17.6218C9.07098 17.5847 9.26109 17.6146 9.42282 17.7058C9.58456 17.797 9.70673 17.9431 9.76627 18.1167L10.2319 19.489C10.2851 19.6443 10.3884 19.7781 10.5263 19.8702C10.6641 19.9623 10.8289 20.0075 10.9953 19.999H14.049C14.209 19.9994 14.3651 19.9504 14.4953 19.8589C14.6254 19.7674 14.723 19.638 14.7742 19.489L15.2399 18.1167C15.2994 17.9431 15.4216 17.797 15.5833 17.7058C15.745 17.6146 15.9352 17.5847 16.1178 17.6218L17.553 17.9068C17.7104 17.9389 17.8741 17.9214 18.0208 17.8568C18.1674 17.7921 18.2896 17.6837 18.3698 17.5468L19.8966 14.9522C19.9777 14.8152 20.0125 14.6565 19.996 14.4988C19.9796 14.3412 19.9127 14.1928 19.805 14.0748L18.7744 12.9949ZM17.637 13.9998L18.2477 14.6747L17.2705 16.3395L16.3697 16.1595C15.8199 16.0491 15.2479 16.1408 14.7624 16.4173C14.2769 16.6938 13.9117 17.1357 13.736 17.6593L13.4459 18.4992H11.4916L11.2167 17.6443C11.041 17.1208 10.6758 16.6788 10.1903 16.4023C9.70476 16.1258 9.13281 16.0341 8.58299 16.1445L7.68218 16.3245L6.68976 14.6672L7.30048 13.9923C7.67604 13.5798 7.88367 13.0459 7.88367 12.4925C7.88367 11.9391 7.67604 11.4052 7.30048 10.9927L6.68976 10.3178L7.66691 8.66802L8.56773 8.848C9.11755 8.9584 9.68949 8.86665 10.175 8.59018C10.6605 8.31371 11.0258 7.87175 11.2015 7.3482L11.4916 6.50082H13.4459L13.736 7.3557C13.9117 7.87925 14.2769 8.32121 14.7624 8.59768C15.2479 8.87415 15.8199 8.9659 16.3697 8.8555L17.2705 8.67552L18.2477 10.3403L17.637 11.0152C17.2656 11.4267 17.0606 11.9576 17.0606 12.5075C17.0606 13.0574 17.2656 13.5883 17.637 13.9998ZM12.4687 9.50041C11.8648 9.50041 11.2744 9.67633 10.7722 10.0059C10.2701 10.3355 9.87867 10.804 9.64755 11.3521C9.41643 11.9002 9.35595 12.5033 9.47378 13.0852C9.5916 13.6671 9.88243 14.2015 10.3095 14.621C10.7365 15.0405 11.2806 15.3262 11.873 15.442C12.4653 15.5577 13.0793 15.4983 13.6373 15.2713C14.1953 15.0442 14.6722 14.6598 15.0077 14.1665C15.3432 13.6732 15.5223 13.0933 15.5223 12.5C15.5223 11.7045 15.2006 10.9415 14.6279 10.379C14.0553 9.81644 13.2786 9.50041 12.4687 9.50041ZM12.4687 13.9998C12.1667 13.9998 11.8716 13.9118 11.6205 13.747C11.3694 13.5822 11.1737 13.348 11.0581 13.0739C10.9426 12.7999 10.9123 12.4983 10.9712 12.2074C11.0302 11.9165 11.1756 11.6492 11.3891 11.4395C11.6026 11.2297 11.8747 11.0869 12.1709 11.029C12.467 10.9712 12.774 11.0009 13.053 11.1144C13.332 11.2279 13.5704 11.4201 13.7382 11.6668C13.906 11.9134 13.9955 12.2034 13.9955 12.5C13.9955 12.8978 13.8347 13.2792 13.5483 13.5605C13.262 13.8418 12.8737 13.9998 12.4687 13.9998Z" fill="#787C82"></path>
                            </svg>
                            <span>Manage your <strong>Account</strong></span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.8626 8.04102L14.2809 12.0291L10.8626 16.0172L9.72363 15.041L12.3053 12.0291L9.72363 9.01721L10.8626 8.04102Z" fill="#757575"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://eshop-optimizer.com/help-and-support/?utm_source=woo&utm_medium=plugin&utm_campaign=setup" target="_blank">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.96 16.8C12.24 16.8 12.4768 16.7032 12.6704 16.5096C12.8635 16.3165 12.96 16.08 12.96 15.8C12.96 15.52 12.8635 15.2835 12.6704 15.0904C12.4768 14.8968 12.24 14.8 11.96 14.8C11.68 14.8 11.4432 14.8968 11.2496 15.0904C11.0565 15.2835 10.96 15.52 10.96 15.8C10.96 16.08 11.0565 16.3165 11.2496 16.5096C11.4432 16.7032 11.68 16.8 11.96 16.8ZM12.08 8.56C12.4533 8.56 12.7533 8.6632 12.98 8.8696C13.2067 9.07653 13.32 9.34667 13.32 9.68C13.32 9.90667 13.2435 10.1365 13.0904 10.3696C12.9368 10.6032 12.72 10.8467 12.44 11.1C12.04 11.4467 11.7467 11.78 11.56 12.1C11.3733 12.42 11.28 12.74 11.28 13.06C11.28 13.2467 11.3501 13.4032 11.4904 13.5296C11.6301 13.6565 11.7933 13.72 11.98 13.72C12.1667 13.72 12.3333 13.6533 12.48 13.52C12.6267 13.3867 12.72 13.22 12.76 13.02C12.8 12.7933 12.8901 12.5835 13.0304 12.3904C13.1701 12.1968 13.4 11.9467 13.72 11.64C14.1333 11.2533 14.4235 10.9 14.5904 10.58C14.7568 10.26 14.84 9.90667 14.84 9.52C14.84 8.84 14.5835 8.2832 14.0704 7.8496C13.5568 7.41653 12.8933 7.2 12.08 7.2C11.52 7.2 11.0235 7.30667 10.5904 7.52C10.1568 7.73333 9.82 8.06 9.58 8.5C9.48667 8.67333 9.45333 8.8432 9.48 9.0096C9.50667 9.17653 9.6 9.31333 9.76 9.42C9.93333 9.52667 10.1235 9.56 10.3304 9.52C10.5368 9.48 10.7067 9.36667 10.84 9.18C10.9867 8.98 11.1635 8.82667 11.3704 8.72C11.5768 8.61333 11.8133 8.56 12.08 8.56ZM12 20C10.9067 20 9.87333 19.7899 8.9 19.3696C7.92667 18.9499 7.0768 18.38 6.3504 17.66C5.62347 16.94 5.05013 16.0933 4.6304 15.12C4.21013 14.1467 4 13.1067 4 12C4 10.8933 4.21013 9.85333 4.6304 8.88C5.05013 7.90667 5.62347 7.06 6.3504 6.34C7.0768 5.62 7.92667 5.04987 8.9 4.6296C9.87333 4.20987 10.9067 4 12 4C13.12 4 14.1667 4.20987 15.14 4.6296C16.1133 5.04987 16.96 5.62 17.68 6.34C18.4 7.06 18.9667 7.90667 19.38 8.88C19.7933 9.85333 20 10.8933 20 12C20 13.1067 19.7933 14.1467 19.38 15.12C18.9667 16.0933 18.4 16.94 17.68 17.66C16.96 18.38 16.1133 18.9499 15.14 19.3696C14.1667 19.7899 13.12 20 12 20ZM12 18.4C13.7867 18.4 15.3 17.7768 16.54 16.5304C17.78 15.2835 18.4 13.7733 18.4 12C18.4 10.2267 17.78 8.71653 16.54 7.4696C15.3 6.2232 13.7867 5.6 12 5.6C10.2533 5.6 8.74987 6.2232 7.4896 7.4696C6.22987 8.71653 5.6 10.2267 5.6 12C5.6 13.7733 6.22987 15.2835 7.4896 16.5304C8.74987 17.7768 10.2533 18.4 12 18.4Z" fill="#787C82"></path>
                            </svg>
                            <span>Get <strong>help and support</strong></span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.8626 8.04102L14.2809 12.0291L10.8626 16.0172L9.72363 15.041L12.3053 12.0291L9.72363 9.01721L10.8626 8.04102Z" fill="#757575"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://eshop-optimizer.com//help-and-support/feedback/?utm_source=woo&utm_medium=plugin&utm_campaign=setup" target="_blank">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.09407 4L5.18893 4.8922L6.53571 6.22098L7.43957 5.32878L6.09343 4H6.09407ZM17.9066 4L16.5598 5.32878L17.4643 6.22098L18.8104 4.89283L17.9066 4ZM12 4.39597C11.7879 4.39851 11.5731 4.41056 11.3571 4.43658C11.3507 4.43658 11.3443 4.43531 11.3379 4.43658C8.73043 4.73165 6.65529 6.81112 6.29464 9.3735C6.00664 11.4358 6.86807 13.3059 8.30357 14.5103C8.89076 15.005 9.28793 15.6838 9.42857 16.433V20.2404H10.8943C11.118 20.6193 11.5262 20.875 12 20.875C12.4738 20.875 12.882 20.6193 13.1057 20.2404H14.5714V17.7022H14.6319V16.9483C14.6319 16.018 15.1217 15.0801 15.9176 14.351C16.9821 13.2989 17.7857 11.8045 17.7857 10.088C17.7857 6.95327 15.1719 4.36678 12 4.39597ZM12 5.6651C14.4846 5.63083 16.5 7.6386 16.5 10.088C16.5 11.4168 15.8764 12.5869 15.0131 13.4385L15.0336 13.4588C14.1757 14.2398 13.6209 15.292 13.4651 16.4337H10.6532C10.5118 15.346 10.0393 14.2933 9.14636 13.5382C8.01043 12.5863 7.3335 11.1522 7.55979 9.53278C7.84071 7.5339 9.48386 5.92654 11.4973 5.70635C11.6635 5.68347 11.8309 5.66991 11.9987 5.66573L12 5.6651ZM3 10.088V11.3572H4.92857V10.088H3ZM19.0714 10.088V11.3572H21V10.088H19.0714ZM6.53571 15.2242L5.18957 16.5523L6.09407 17.4452L7.43893 16.1164L6.53571 15.2242ZM17.4643 15.2242L16.5604 16.1164L17.9059 17.4452L18.8104 16.5523L17.4643 15.2242ZM10.7143 17.7028H13.2857V18.9719H10.7143V17.7028Z" fill="#787C82"></path>
                            </svg>
                            <span>Have an <strong>idea or feedback?</strong></span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.8626 8.04102L14.2809 12.0291L10.8626 16.0172L9.72363 15.041L12.3053 12.0291L9.72363 9.01721L10.8626 8.04102Z" fill="#757575"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://wordpress.org/plugins/ai-eshop-optimizer/" target="_blank">
                            <svg width=" 24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 7L13.2747 9.35645L16 9.73445L14 11.4545L14.6667 14L12 12.5682L9.33333 14L10 11.4545L8 9.73445L10.8 9.35645L12 7Z" fill="#787C82"></path>
                                <path d="M13.116 21L12 20.3846L14.5714 16.0769H18.4286C18.5975 16.0772 18.7648 16.0455 18.9209 15.9837C19.077 15.922 19.2188 15.8313 19.3383 15.717C19.4577 15.6026 19.5524 15.4669 19.6169 15.3174C19.6815 15.168 19.7145 15.0078 19.7143 14.8462V7.46154C19.7145 7.29984 19.6815 7.13969 19.6169 6.99026C19.5524 6.84082 19.4577 6.70505 19.3383 6.59071C19.2188 6.47638 19.077 6.38573 18.9209 6.32396C18.7648 6.2622 18.5975 6.23053 18.4286 6.23077H5.57143C5.40251 6.23053 5.23521 6.2622 5.07911 6.32396C4.923 6.38573 4.78117 6.47638 4.66173 6.59071C4.54228 6.70505 4.44759 6.84082 4.38307 6.99026C4.31854 7.13969 4.28546 7.29984 4.28571 7.46154V14.8462C4.28546 15.0078 4.31854 15.168 4.38307 15.3174C4.44759 15.4669 4.54228 15.6026 4.66173 15.717C4.78117 15.8313 4.923 15.922 5.07911 15.9837C5.23521 16.0455 5.40251 16.0772 5.57143 16.0769H11.3571V17.3077H5.57143C4.88944 17.3077 4.23539 17.0484 3.75315 16.5867C3.27092 16.1251 3 15.499 3 14.8462V7.46154C2.99992 7.13826 3.06637 6.81814 3.19557 6.51945C3.32476 6.22077 3.51417 5.94938 3.75297 5.72079C3.99176 5.4922 4.27527 5.31088 4.58729 5.18721C4.8993 5.06353 5.23372 4.99992 5.57143 5H18.4286C18.7663 4.99992 19.1007 5.06353 19.4127 5.18721C19.7247 5.31088 20.0082 5.4922 20.247 5.72079C20.4858 5.94938 20.6752 6.22077 20.8044 6.51945C20.9336 6.81814 21.0001 7.13826 21 7.46154V14.8462C21 15.499 20.7291 16.1251 20.2468 16.5867C19.7646 17.0484 19.1106 17.3077 18.4286 17.3077H15.3204L13.116 21Z" fill="#787C82"></path>
                            </svg>
                            <span><strong>Review</strong> on Wordpress.org</span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.8626 8.04102L14.2809 12.0291L10.8626 16.0172L9.72363 15.041L12.3053 12.0291L9.72363 9.01721L10.8626 8.04102Z" fill="#757575"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ai-optimizer-modules-panel">


            <div class="ai-optimizer-modules-box">
                <div class="ai-optimizer-modules-box-heading">Introducing the Graph Database AI-powered optimizer for the best in market, zero data point, recommendations</div>
                <div class="ai-optimizer-modules-list-promo">

                    <div class="ai-optimizer-modules-list-item">
                        <div class="ai-optimizer-modules-list-item-icon">
                            <svg width="20" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 14">
                                <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h17A1.5 1.5 0 0 1 20 1.5V3H0V1.5Z"></path>
                                <path d="M0 5v7.5A1.5 1.5 0 0 0 1.5 14h17a1.5 1.5 0 0 0 1.5-1.5V5H0Zm7 4H2V7h5v2Z"></path>
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">Free analysis of up to 50000 order items!</div>
                            <div class="ai-optimizer-modules-list-item-desc">In this version, up to 50000 order items can be exported with OrderID larger or equal than the OrderID you set.
                                <div class="pro"> In the pro-version the volume of the orders is unlimited and the frequency of updates is unlimited.
                                    </br> A number of different AI network analysis algorithms such as Closeness, Adamic-Adar, Jaccard, Louvain, and Breadth First Search are used to determine the optimal recommendations.
                                    </br> You just provide us your orders (as well as the products that were never sold in your eshop) and with a click, in minutes, all your products get their optimal recommendations!
                                </div></br>We are using only the following data: Order ID, Product ID, Category IDs, Tag IDs, Order items, Date and time, Stock, Unit Prices and Product Title. Even with minimal data points the results to your bottom line are impressive!
                                <div class="pro"> The pro-version also factors for your existing crossells and upsells as well as the product categories, tags and the full-text description of each product.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="ai-optimizer-modules-box">
                <div class="ai-optimizer-modules-box-heading">Your status and display preferences</div>
                <div class="ai-optimizer-modules-list">

                    <div class="ai-optimizer-modules-list-item-setup">
                        <div class="ai-optimizer-modules-list-item-icon-setup">
                            <svg id="glipy_copy_4" data-name="glipy copy 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                <title>1</title>
                                <path d="M32,2A30,30,0,1,0,62,32,30.03661,30.03661,0,0,0,32,2ZM43.57,50.56H20.43a.71507.71507,0,0,1,0-1.43h5.23l1.29-4.87h1.49l-1.3,4.87h9.72l-1.3-4.87h1.49l1.28,4.87h5.24a.70634.70634,0,0,1,.71.71A.72142.72142,0,0,1,43.57,50.56Zm6.28-7.73H14.14A2.14236,2.14236,0,0,1,12,40.69c-.26-.33,40.01-.01,40-.12A2.14808,2.14808,0,0,1,49.85,42.83ZM52,39.14H12V15.59a2.15746,2.15746,0,0,1,2.14-2.15H49.85A2.15952,2.15952,0,0,1,52,15.59Z" />
                                <path d="M24.83,23.17l-3.34,3.32a.74346.74346,0,0,0,0,1.02l3.34,3.33a.71433.71433,0,0,0,1.01-1.01L23.01,27l2.83-2.83A.71078.71078,0,0,0,24.83,23.17Z" />
                                <path d="M32.98,21.77l-3.32,10a.71324.71324,0,0,0,1.35.46l3.33-10A.718.718,0,0,0,32.98,21.77Z" />
                                <path d="M39.17,23.17a.71078.71078,0,0,0-1.01,1L40.99,27l-2.83,2.83a.72249.72249,0,0,0,.5,1.22.71055.71055,0,0,0,.51-.21l3.34-3.33a.74346.74346,0,0,0,0-1.02Z" />
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">Display preferences
                                <i class="ai-optimizer-modules-indicator-setup"></i>
                            </div>
                            <div class="ai-optimizer-modules-list-item-desc">
                                Please choose the recommendation option choices that will appear in your single product pages.</br></br>
                                <div class="table">
                                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                        <?php wp_nonce_field('eshop_optimizer_update_display_preferences', 'eshop_optimizer_nonce_field_1'); ?>
                                        <input type="hidden" name="action" value="eshop_optimizer_display_references">
                                        <div class="row">
                                            <div class="cell input ai-optimizer-display-preferences">
                                                <label><input type="checkbox" id="aieo_display_upsells" name="aieo_display_upsells" value="1" <?php checked(1, get_option('aieo_display_upsells'), true); ?>>Please display <i>Up-sells</i><label>
                                            </div>
                                            <div class="cell"></div>
                                        </div>
                                        <div class="row">
                                            <div class="cell input ai-optimizer-display-preferences">
                                                <label><input type="checkbox" id="aieo_display_cross_sells" name="aieo_display_cross_sells" value="1" <?php checked(1, get_option('aieo_display_cross_sells'), true); ?>>Please display <i>Cross-sells</i><label>
                                            </div>
                                            <div class="cell"></div>
                                        </div>
                                        <div class="row">
                                            <div class="cell input ai-optimizer-display-preferences">
                                                <label><input type="checkbox" id="aieo_display_related" name="aieo_display_related" value="1" <?php checked(1, get_option('aieo_display_related'), true); ?>>Please display <i>Related by Woo</i><label>
                                            </div>
                                            <div class="cell"></div>
                                        </div>
                                        <div class="row">
                                            <div class="cell input ai-optimizer-display-preferences">
                                                <label><input type="checkbox" id="aieo_display_recently_viewed_products" name="aieo_display_recently_viewed_products" value="1" <?php checked(1, get_option('aieo_display_recently_viewed_products'), true); ?>>Please display <i>Viewed Recently</i><label>
                                            </div>
                                            <div class="cell"></div>
                                        </div>
                                        <div class="ai-optimizer-rowspantwo">
                                            </br></br>
                                            You may also choose the order of appearence of Up-sells and Cross-sells.

                                        </div>

                                        <div class="row">
                                            <div class="cell input ai-optimizer-display-preferences">
                                                <label><input type="checkbox" id="aieo_recommendations_display_order" name="aieo_recommendations_display_order" value="1" <?php checked(1, get_option('aieo_recommendations_display_order'), true); ?>>Please display Cross-sells above Up-sells</i><label>
                                            </div>
                                            <div class="cell"></div>
                                        </div>


                                </div>
                                <div class="cellsubmit">
                                    <input type="submit" class="button button-primary button-setup  center-content" value="Update display preferences">

                                </div>
                                </form>

                            </div>
                        </div>
                    </div>



                    <div class="ai-optimizer-modules-list-item-setup">
                        <div class="ai-optimizer-modules-list-item-icon-setup">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 400 400" style="enable-background:new 0 0 400 400;" xml:space="preserve">
                                <g>
                                    <path class="st0" d="M128.1,271.9L107,293c-51.3-51.3-51.3-134.7,0-186l21.1,21.1C88.4,167.7,88.4,232.3,128.1,271.9z" />
                                    <path class="st1" d="M293,293l-21.1-21.1c39.7-39.7,39.7-104.2,0-143.8L293,107C344.3,158.3,344.3,241.7,293,293z" />
                                    <path class="st2" d="M293,107l-21.1,21.1c-39.7-39.7-104.2-39.7-143.8,0L107,107C158.3,55.7,241.7,55.7,293,107z" />
                                    <path class="st3" d="M293,293c-51.3,51.3-134.7,51.3-186,0l21.1-21.1c39.7,39.7,104.2,39.7,143.8,0L293,293z" />
                                    <path class="st4" d="M281.9,97.1l-21.2,21.2c8,6,15.1,13.1,21.1,21.1l21.2-21.2C296.7,110.3,289.7,103.3,281.9,97.1z" />
                                    <path class="st5" d="M302.9,281.9l-21.2-21.2c-6,8-13.1,15.1-21.1,21.1l21.2,21.2C289.7,296.7,296.7,289.7,302.9,281.9z" />
                                    <path class="st6" d="M118.1,302.9l21.2-21.2c-8-6-15.1-13.1-21.1-21.1l-21.2,21.2C103.3,289.7,110.3,296.7,118.1,302.9z" />
                                    <path class="st7" d="M97.1,118.1l21.2,21.2c6-8,13.1-15.1,21.1-21.1l-21.2-21.2C110.3,103.3,103.3,110.3,97.1,118.1z" />
                                    <circle class="st8" cx="200" cy="200" r="111.8" />
                                </g>
                                <path d="M195.8,210.4v-13.5c2.7,0.8,5.6,0.8,8.4,0v13.5c0,5,4.1,9.1,9.1,9.1l0,0h0.1c4.6,17.7,20.9,30.6,40.1,30.1
	c21.2-0.6,38.6-18,39.1-39.2c0.5-21-14.9-38.5-35.2-41c0,0-8.7-8.5-15.4-13.5c-8.5-6.3-26.3-5.1-26.9,11.6h-30.3
	c-0.6-16.7-18.4-17.9-26.9-11.6c-6.8,5-15.4,13.5-15.4,13.5c-20.2,2.6-35.7,20.1-35.2,41.1c0.6,21.2,18,38.6,39.2,39.1
	c19.2,0.5,35.4-12.4,40-30.1h0.1C191.7,219.5,195.8,215.4,195.8,210.4z M147.6,239.6c-16.6,0-30.2-13.5-30.2-30.2
	s13.5-30.2,30.2-30.2s30.2,13.5,30.2,30.2S164.3,239.6,147.6,239.6z M200,191.2c-4.7,0-8.4-3.7-8.4-8.4s3.7-8.4,8.4-8.4
	s8.4,3.7,8.4,8.4S204.6,191.2,200,191.2z M147.8,187c-4.5,0-8.6,1.3-12,3.5c3.3,0.4,5.9,3.2,5.9,6.7c0,3.7-3,6.7-6.7,6.7
	c-3.3,0-6.1-2.5-6.6-5.6c-1.9,3.3-3,7.1-3,11.2c0,12.4,10,22.5,22.5,22.5c12.4,0,22.5-10,22.5-22.5C170.3,197,160.2,187,147.8,187z
	 M232.8,198.2c0.5,3.2,3.3,5.6,6.6,5.6c3.7,0,6.7-3,6.7-6.7c0-3.5-2.6-6.3-5.9-6.7c3.5-2.2,7.6-3.5,12-3.5c12.4,0,22.5,10,22.5,22.5
	c0,12.4-10,22.5-22.5,22.5s-22.5-10-22.5-22.5C229.7,205.3,230.8,201.5,232.8,198.2z M252.4,239.6c-16.6,0-30.2-13.5-30.2-30.2
	s13.5-30.2,30.2-30.2s30.2,13.5,30.2,30.2S269,239.6,252.4,239.6z" />
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">
                                Activate Google UTM Analytics for Each Recommendation Interaction
                                <i class="ai-optimizer-modules-indicator-setup"></i>
                            </div>
                            <div class="ai-optimizer-modules-list-item-desc">In your dashboard you can compare the sales that match our recommendations.</br>
                                In this section, you can opt to generate UTM reference codes for every recommendation, allowing you to track their effectiveness in Google Analytics. </br></br>The recommendations in the product pages,
                                will have their urls appended as follows:
                                </br><i><strong>utm_source=AIO< (Empty or Cart)>
                                            < CrossSell/UpSell/WooRANDRelated/RecentlyViewed>&utm_campaign=< recommendation sequence>_< origin productid>_< target productid></strong></i>
                                </br></br>
                                <strong>IMPORTANT NOTICE:</strong> This choice assumes the default related/up-sell templates. <a href="https://eshop-optimizer.com/help-and-support" target="_blank">Please read detailed instructions here for further customizations</a>.
                                </br>
                                </br>
                                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    <?php wp_nonce_field('eshop_optimizer_utm_stats_action', 'eshop_optimizer_utm_stats_nonce_2'); ?>
                                    <input type="hidden" name="action" value="eshop_optimizer_utm_stats">


                                    <div class="cellsubmit">

                                        <input type="checkbox" id="aieo_activate_utm_stats" name="aieo_activate_utm_stats" value="1" <?php checked(1, get_option('aieo_activate_utm_stats'), true); ?>>
                                        <label for="aieo_activate_utm_stats">Activate UTM Stats</label>
                                    </div>
                                    <div class="row google-settings-row">
                                        <div class="cell">Google Measurement ID</div>
                                        <div class="cell input">
                                            <input type="text" id="aieo_google_ga4" name="aieo_google_ga4" value="<?php echo esc_attr(get_option('aieo_google_ga4')); ?>">
                                        </div>
                                    </div>





                                    <div class="cellsubmit">
                                        <input class="button button-primary button-setup center-content" type="submit" value="Save UTM settings">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="ai-optimizer-modules-list-item-setup">
                        <div class="ai-optimizer-modules-list-item-icon-setup">
                            <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2h1V0H1.5A1.5 1.5 0 0 0 0 1.5V3h2V2ZM0 9a4 4 0 0 1 4-4h10a4 4 0 0 1 0 8H4a4 4 0 0 1-4-4ZM16 3V2h-1V0h1.5A1.5 1.5 0 0 1 18 1.5V3h-2ZM16 16h-1v2h1.5a1.5 1.5 0 0 0 1.5-1.5V15h-2v1ZM2 15v1h1v2H1.5A1.5 1.5 0 0 1 0 16.5V15h2ZM8 18H5v-2h3v2ZM10 18h3v-2h-3v2ZM8 2H5V0h3v2ZM10 2h3V0h-3v2Z"></path>
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">Performance Status
                            </div>
                            <div class="ai-optimizer-modules-list-item-desc">
                                <?php
                                if (class_exists('Automattic\WooCommerce\Utilities\OrderUtil') && function_exists('WC')) {
                                    // Check if HPOS (High Performance Order Storage) is enabled
                                    if (Automattic\WooCommerce\Utilities\OrderUtil::custom_orders_table_usage_is_enabled()) {
                                ?>
                                        <h4>Great Job: High Performance Order Storage in Woocommerce is active in your installation!!!</h4>
                                    <?php
                                    } else {
                                        // If HPOS is not enabled then display this message
                                    ?>
                                        <h4>Tip: High Performance Order Storage (HPOS) is not active in your installation. It improves not only the orders export process but your eshop's overall performance.</h4>
                                        <a href="https://woocommerce.com/document/high-performance-order-storage/" target="_blank">Here is how you can enable it with a couple of clicks!</a>. It is also bound to multiply the speed of your transactions! :)
                                <?php
                                    }
                                }
                                if (aieo_is_index_wp_mysql_for_speed_active()) {
                                    echo '</br><h4>Also, your DB tables are properly indexed as you have actived <i>Index WP MySQL For Speed</i>!</h4>';
                                } else {
                                    echo '</br><h4>Please consider the highly recommended <i><a href="https://wordpress.org/plugins/index-wp-mysql-for-speed/" target="_blank">Index WP MySQL For Speed</a></i> to speed up your DB queries. It is bound to boost your overall performance!</h4>';
                                }


                                ?>
                            </div>
                        </div>
                    </div>




                </div>
            </div>


            <div class="ai-optimizer-modules-box">
                <div class="ai-optimizer-modules-box-heading">1. Superfast Export of your Orders</div>
                <div class="ai-optimizer-modules-list">


                    <div class="ai-optimizer-modules-list-item-action">
                        <div class="ai-optimizer-modules-list-item-icon-action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16">
                                <path d="M12.5 8c0 1.654-1.122 3-2.5 3S7.5 9.654 7.5 8 8.622 5 10 5s2.5 1.346 2.5 3Zm7.5-.449S16.457 16 10.012 16C4.03 16 0 7.551 0 7.551S3.705 0 10.012 0C16.424 0 20 7.551 20 7.551ZM14.167 8c0-2.757-1.87-5-4.167-5-2.298 0-4.167 2.243-4.167 5s1.87 5 4.167 5c2.297 0 4.167-2.243 4.167-5Z"></path>
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">Privacy first!
                                <i class="ai-optimizer-modules-indicator"></i>
                            </div>
                            <div class="ai-optimizer-modules-list-item-desc">
                                Our optimization algorithm may carry out semantic/textual analysis on the titles of your products or product variations, and could also consider their pricing when suggesting up-sells and cross-sells.
                                </br></br> However, you have the option to exclude product titles and prices from this analysis. Despite these omissions, our robust algorithm can still offer highly relevant recommendations!
                                </br></br>
                                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    <?php wp_nonce_field('eshop_optimizer_handle_export_orders_action', 'eshop_optimizer_handle_export_orders_nonce_3'); ?>


                                    <div><label><input type="checkbox" name="aieo_include_text" value="1" <?php checked(get_option('aieo_include_text', '1'), '1'); ?>>Please include product\categories\tags text</label></div>
                                    <div><label class="soon"><input type="checkbox" name="aieo_include_full_text" value="1" <?php checked(get_option('aieo_include_full_text', '0'), '1'); ?> disabled="disabled">Please include the full text for sentiment analysis</label></div>
                                    <div><label><input type="checkbox" name="aieo_include_price" value="1" <?php checked(get_option('aieo_include_price', '1'), '1'); ?>>Please include product price data</label></div>
                                    <div><label><input type="checkbox" name="aieo_variations_choice" value="1" <?php checked(get_option('aieo_variations_choice', '1'), '1'); ?>>Please base the computations on the parent (not variation) products </label></div>
                            </div>
                        </div>
                    </div>
                    <div class="ai-optimizer-modules-list-item-action">
                        <div class="ai-optimizer-modules-list-item-icon-action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path d="M1.493 2.879C3.757 2.562 6.757 1.616 9.128.233a1.733 1.733 0 0 1 1.728-.004c2.369 1.354 5.502 2.29 7.65 2.628.818.128 1.491.81 1.491 1.638v.501c.031 6.043-.48 11.332-9.472 14.903a1.45 1.45 0 0 1-1.062 0C.478 16.328-.029 11.04.001 4.996L0 4.499c-.002-.83.672-1.505 1.493-1.62Zm9.214 6.414a1 1 0 1 0-1.414 1.414 1 1 0 0 0 1.414-1.414Zm-4 0a1 1 0 1 0-1.414 1.414 1 1 0 0 0 1.414-1.414Zm8 0a1 1 0 1 0-1.414 1.414 1 1 0 0 0 1.414-1.414Z"></path>
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">Consider Repeat Registered Customers
                                <i class="ai-optimizer-modules-indicator"></i>
                            </div>
                            <div class="ai-optimizer-modules-list-item-desc">
                                We track whether a purchase has been made by a guest or a registered user.</br>We also offer the option to adjust based on the preferences of customers who’ve chosen to register on your e-shop. </br></br>You can choose not to provide the user ID, but we’ll still distinguish between guest and registered user purchases.
                                <div class="pro">The pro-version provides you with option to apply more weight to the choices made by your most loyal customers</div>
                                </br>
                                <div><label><input type="checkbox" name="aieo_include_eponymous" value="1" <?php checked(get_option('aieo_include_eponymous', '1'), '1'); ?>>Please include (anonymous) customer IDs</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="ai-optimizer-modules-list-item-action">
                        <div class="ai-optimizer-modules-list-item-icon-action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path d="M1.493 2.879C3.757 2.562 6.757 1.616 9.128.233a1.733 1.733 0 0 1 1.728-.004c2.369 1.354 5.502 2.29 7.65 2.628.818.128 1.491.81 1.491 1.638v.501c.031 6.043-.48 11.332-9.472 14.903a1.45 1.45 0 0 1-1.062 0C.478 16.328-.029 11.04.001 4.996L0 4.499c-.002-.83.672-1.505 1.493-1.62Zm9.214 6.414a1 1 0 1 0-1.414 1.414 1 1 0 0 0 1.414-1.414Zm-4 0a1 1 0 1 0-1.414 1.414 1 1 0 0 0 1.414-1.414Zm8 0a1 1 0 1 0-1.414 1.414 1 1 0 0 0 1.414-1.414Z"></path>
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">Account for Seasonality
                                <i class="ai-optimizer-modules-indicator"></i>
                            </div>
                            <div class="ai-optimizer-modules-list-item-desc">
                                You have the flexibility to adjust for seasonality by defining an optimal timeframe centered around the current date.<div class="pro">The pro version offers season-specific recommendations based on your selected duration, granted there are enough data points. Furthermore, we aim to provide consistent, automatic updates in the future.</div>
                                </br>
                                <div><label><input type="checkbox" name="aieo_include_seasonality" value="1" <?php checked(get_option('aieo_include_seasonality', '0'), '1'); ?>>Yes, I am interested in product seasonality adjustment</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="ai-optimizer-modules-list-item-action">
                        <div class="ai-optimizer-modules-list-item-icon-action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path d="M1.493 2.879C3.757 2.562 6.757 1.616 9.128.233a1.733 1.733 0 0 1 1.728-.004c2.369 1.354 5.502 2.29 7.65 2.628.818.128 1.491.81 1.491 1.638v.501c.031 6.043-.48 11.332-9.472 14.903a1.45 1.45 0 0 1-1.062 0C.478 16.328-.029 11.04.001 4.996L0 4.499c-.002-.83.672-1.505 1.493-1.62Zm9.214 6.414a1 1 0 1 0-1.414 1.414 1 1 0 0 0 1.414-1.414Zm-4 0a1 1 0 1 0-1.414 1.414 1 1 0 0 0 1.414-1.414Zm8 0a1 1 0 1 0-1.414 1.414 1 1 0 0 0 1.414-1.414Z"></path>
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">Operational Efficiency Settings
                                <i class="ai-optimizer-modules-indicator"></i>
                            </div>
                            <div class="ai-optimizer-modules-list-item-desc">
                                By leveraging Stored Procedures, we can achieve an export rate of approximately 100,000 order items per minute. Ideally, all the boxes should be checked for optimal functionality.
                                </br>However, you have the autonomy to adjust settings; for instance, you might choose to initially process your orders before running aggregate statistics or forgo the more resource-intensive step of rebuilding the product table (which handles about 10,000 variable products per minute).</br></br>
                                Your available options are:
                                <div><label><input type="checkbox" name="aieo_create_catalogue" value="1" <?php checked(get_option('aieo_create_catalogue', '1'), '1'); ?>>Please recreate the full product catalogue</label></div>
                                <div><label><input type="checkbox" name="aieo_create_orders" value="1" <?php checked(get_option('aieo_create_orders', '1'), '1'); ?>>Process and transform my orders to the required format</label></div>
                                <div><label><input type="checkbox" name="aieo_include_unsold" value="1" <?php checked(get_option('aieo_include_unsold', '0'), '1'); ?>>Please include products that have no sales</label></div>
                                <div><label><input type="checkbox" name="aieo_include_aggregate_stats" value="1" <?php checked(get_option('aieo_include_aggregate_stats', '0'), '1'); ?>>Please include aggregate statistics for products</label></div>
                                <div><label><input type="checkbox" name="aieo_include_aggregate_cust_std_stats" value="1" <?php checked(get_option('aieo_include_aggregate_cust_std_stats', '0'), '1'); ?>>Please include aggregate statistics for customers</label></div>
                                <div><label><input type="checkbox" name="aieo_include_aggregate_cust_adv_stats" value="1" <?php checked(get_option('aieo_include_aggregate_cust_adv_stats', '0'), '1'); ?>>Please include aggregate advanced statistics for customer behaviour</label></div>


                                <div><label><input type="checkbox" name="aieo_create_uuids" value="1" <?php checked(get_option('aieo_create_uuids', '0'), '1'); ?>>Please create locally the UUIDs for the GraphDB's nodes & edges</label></div>
                                <div><label><input type="checkbox" name="aieo_create_export" value="1" <?php checked(get_option('aieo_create_export', '1'), '1'); ?>>Produce the export table/CSV</label></div>
                            </div>
                        </div>
                    </div>

                    <div class="ai-optimizer-modules-list-item-action">
                        <div class="ai-optimizer-modules-list-item-icon-action">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h17A1.5 1.5 0 0 1 20 1.5v6A1.5 1.5 0 0 1 18.5 9h-5.889a1.5 1.5 0 0 1-1.5-1.5V5.111a1.111 1.111 0 1 0-2.222 0V7.5a1.5 1.5 0 0 1-1.5 1.5H1.5A1.5 1.5 0 0 1 0 7.5v-6Z"></path>
                                <path d="M7 5a3 3 0 0 1 6 0v4.384a.5.5 0 0 0 .356.479l2.695.808a2.5 2.5 0 0 1 1.756 2.748l-.633 4.435A2.5 2.5 0 0 1 14.699 20H6.96a2.5 2.5 0 0 1-2.27-1.452l-2.06-4.464a2.417 2.417 0 0 1-.106-1.777c.21-.607.719-1.16 1.516-1.273 1.035-.148 2.016.191 2.961.82V5Zm3-1a1 1 0 0 0-1 1v7.793c0 1.39-1.609 1.921-2.527 1.16-.947-.784-1.59-.987-2.069-.948a.486.486 0 0 0 .042.241l2.06 4.463A.5.5 0 0 0 6.96 18h7.74a.5.5 0 0 0 .494-.43l.633-4.434a.5.5 0 0 0-.35-.55l-2.695-.808A2.5 2.5 0 0 1 11 9.384V5a1 1 0 0 0-1-1Z"></path>
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">Specify Your Dataset’s Starting Point
                                <i class="ai-optimizer-modules-indicator"></i>
                            </div>
                            <div class="ai-optimizer-modules-list-item-desc">
                                Designate a starting point for your order export file, bypassing initial or demo orders.

                                <input type="hidden" name="action" value="eshop_optimizer_handle_export_orders">

                                <div class="table">
                                    <div class="row">
                                        <div class="cell description">
                                            Set initial Order ID
                                        </div>
                                        <div class="cell input">
                                            <input type="number" id="aieo_order_id" name="aieo_order_id" placeholder="Set initial Order ID" value="<?php echo esc_attr(get_option('aieo_order_id')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell description">
                                            Maximum Number of Records
                                        </div>
                                        <div class="cell input">
                                            <input type="number" id="aieo_max_records" name="aieo_max_records" placeholder="Maximum Number of Records" value="<?php echo esc_attr(get_option('aieo_max_records')); ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="cellsubmit"><input type="submit" name="export_orders" class="button button-primary button-optimal" value="Save settings & Export Orders"></div>
                                </form>

                                <?php
                                // Define allowed HTML tags and attributes for wp_kses
                                $allowed_html_tags = array(
                                    'a' => array(
                                        'href' => array(),
                                        'title' => array(),
                                        'class' => array(),
                                        'style' => array(),
                                    ),
                                    'br' => array(),
                                );
                                // Get the domain of the site
                                $parsed_url = wp_parse_url(home_url());
                                $domain = $parsed_url['host'];
                                // Display the delete button if the file exists
                                $uploads_dir = wp_upload_dir();
                                $file_path = $uploads_dir['basedir'] . '/' . esc_html($domain) . '_exported_orders_hpos.csv'; // Update the filename and extension accordingly
                                $downloadfilemessage = sprintf(
                                    __('The orders file has been created!!!</br>Download: <a href="%s">%s_exported_orders_hpos.csv</a>', 'eshop-optimizer'),
                                    esc_url($uploads_dir['baseurl'] . '/' . esc_html($domain) . '_exported_orders_hpos.csv'),
                                    $domain,
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Get the domain of the site
                    if (file_exists($file_path)) {

                        echo '<div class="ai-optimizer-modules-list-item-support">
                        <div class="ai-optimizer-modules-list-item-icon-support">
                        <svg id="glipy_copy_4" data-name="glipy copy 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><title>1</title><path d="M32,2A30,30,0,1,0,62,32,30.03657,30.03657,0,0,0,32,2ZM38.45,48.13a.717.717,0,0,1-.72.72H26.28a.71492.71492,0,0,1-.71-.72V45.27a.7151.7151,0,0,1,1.43,0v2.15H37.02V45.27a.715.715,0,1,1,1.43,0Zm-4.8-5.51a.695.695,0,0,1,1.01,0,.71226.71226,0,0,1,0,1.01l-2.14,2.15a.74336.74336,0,0,1-1.02,0l-2.15-2.15a.71773.71773,0,0,1,1.02-1.01l.92.92V32.39a.715.715,0,0,1,1.43,0V43.54Zm9.48-4.44-8.97-.04V32.39a2.15013,2.15013,0,0,0-4.3,0v5.74L18.3,38.08a6.361,6.361,0,0,1-1.41-12.55.86162.86162,0,0,0,.26-.34A6.70364,6.70364,0,0,1,28.67,23.1a.71653.71653,0,0,0,1.01.11c1.13-1.05-2.07-2.93-2.9-3.29a6.69654,6.69654,0,0,1,13.11,1.92.715.715,0,0,0,1.43,0,7.83085,7.83085,0,0,0-.12-1.29,8.9141,8.9141,0,0,1,1.93-.21C54.96,20.83,54.95,37.69,43.13,38.18Z"/></svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">';

                        // When condition for remote connection - to be done when users are ready to notify them that their table was uploaded in the server - now it is set to 7 to be always false
                        if ((int) get_option('aieo_activate_remote_connection') === 7) {

                            echo '<div class="ai-optimizer-modules-list-item-title">Your orders file has been uploaded!<i class="ai-optimizer-modules-indicator-support"></i></div>
<div class="ai-optimizer-modules-list-item-desc">
<div class="file-download">Your orders file has been successfully uploaded to our server</div>                 
<div class="promo"></br>You are going to be notified as soon as its processing completes in order to visit our portal and download your recommendations as well as see key vital statistics</div>                
</div>';
                        } else {



                            echo                '<div class="ai-optimizer-modules-list-item-title">Download orders file & clean up!
                                <i class="ai-optimizer-modules-indicator-support"></i>
                            </div>
                            <div class="ai-optimizer-modules-list-item-desc">
                            <div class="file-download">' . wp_kses($downloadfilemessage, $allowed_html_tags) . '</div>';

                            // if the user can initiate a remote connection is pro. So we we inform him that he can upload the file directly from here.
                            if ((int) get_option('aieo_activate_remote_connection') === 1) {
                                echo   '<div class="pro">As a pro user you can upload the file directly from this plugin via the upload data in your server tab</div>';
                            } else {
                                echo   '<div class="promo">Why do we save your file on your server?</br>Our pro users on annual contracts are able to transfer their data directly into our server for optimization calculations and fully automate the process
                            </div>';
                            }
                            echo '<div class="cellsubmit"><a href="' . esc_url(admin_url('admin-post.php?action=delete_exported_file')) . '" class="button button-primary button-alarm buttonsubmit">Important! Click to remove the file from your server</a></div></div>';
                        }
                        echo '</div>
              </div>
              </div>';
                    } else {
                        echo '</div>';
                    }
                    ?>

                </div>
                <div class="ai-optimizer-modules-box">
                    <div class="ai-optimizer-modules-box-heading">2. Process Data Using Our AI-Enhanced Service</div>
                    <div class="ai-optimizer-modules-list">
                        <a href="https://eshop-optimizer.com/my-account/" class="ai-optimizer-modules-list-item-action">
                            <div class="ai-optimizer-modules-list-item-icon-action">
                                <svg id="glipy_copy_3" data-name="glipy copy 3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                    <title>1</title>
                                    <path d="M32,2A30,30,0,1,0,62,32,30.03661,30.03661,0,0,0,32,2ZM51.29,44.81H47.84v.89a2.14242,2.14242,0,0,1-2.14,2.14h-.89v3.45a.71.71,0,0,1-1.42,0V47.84h-2.6v1.17a.72337.72337,0,0,1-.72.72.71491.71491,0,0,1-.71-.72V47.84H36.74v3.45a.70634.70634,0,0,1-.71.71.72141.72141,0,0,1-.72-.71V47.84h-2.6v1.17a.71009.71009,0,1,1-1.42,0V47.84h-2.6v3.45a.71513.71513,0,0,1-1.43,0V47.84H24.64v1.17a.71491.71491,0,0,1-.71.72.72337.72337,0,0,1-.72-.72V47.84h-2.6v3.45a.71.71,0,1,1-1.42,0V47.84H18.3a2.14242,2.14242,0,0,1-2.14-2.14v-.89H12.71a.71.71,0,0,1,0-1.42h3.45v-2.6H14.99a.72341.72341,0,0,1-.72-.72.71491.71491,0,0,1,.72-.71h1.17V36.74H12.71a.71513.71513,0,0,1,0-1.43h3.45v-2.6H14.99a.71.71,0,0,1,0-1.42h1.17v-2.6H12.71a.71513.71513,0,0,1,0-1.43h3.45V24.64H14.99a.71491.71491,0,0,1-.72-.71.72342.72342,0,0,1,.72-.72h1.17v-2.6H12.71a.71.71,0,1,1,0-1.42h3.45V18.3a2.14247,2.14247,0,0,1,2.14-2.14h.89V12.71a.71.71,0,0,1,1.42,0v3.45h2.6V14.99a.72338.72338,0,0,1,.72-.72.71493.71493,0,0,1,.71.72v1.17h2.62V12.71a.70632.70632,0,0,1,.71-.71.7214.7214,0,0,1,.72.71v3.45h2.6V14.99a.71.71,0,0,1,1.42,0v1.17h2.6V12.71a.7214.7214,0,0,1,.72-.71.70632.70632,0,0,1,.71.71v3.45h2.62V14.99a.71493.71493,0,0,1,.71-.72.72338.72338,0,0,1,.72.72v1.17h2.6V12.71a.71.71,0,0,1,1.42,0v3.45h.89a2.14247,2.14247,0,0,1,2.14,2.14v.89h3.45a.71.71,0,0,1,0,1.42H47.84v2.6h1.17a.72342.72342,0,0,1,.72.72.71491.71491,0,0,1-.72.71H47.84v2.62h3.45a.71513.71513,0,0,1,0,1.43H47.84v2.6h1.17a.71.71,0,0,1,0,1.42H47.84v2.6h3.45a.71513.71513,0,0,1,0,1.43H47.84v2.62h1.17a.71491.71491,0,0,1,.72.71.72341.72341,0,0,1-.72.72H47.84v2.6h3.45a.71.71,0,1,1,0,1.42Z" />
                                    <path d="M44.81,40.57V23.43a.7444.7444,0,0,0-.2-.51l-3.53-3.53a.7444.7444,0,0,0-.51-.2H23.43a.7444.7444,0,0,0-.51.2l-3.53,3.53a.7444.7444,0,0,0-.2.51V40.57a.74414.74414,0,0,0,.2.50995l3.53,3.53a.7444.7444,0,0,0,.51.2H40.57a.7444.7444,0,0,0,.51-.2l3.53-3.53A.74414.74414,0,0,0,44.81,40.57Zm-1.42-.29-3.11,3.11H23.72l-3.11-3.11V23.72l3.11-3.11H40.28l3.11,3.11Z" />
                                    <path d="M19.41,43.69a.71.71,0,0,0,0,1.42A.71.71,0,0,0,19.41,43.69Z" />
                                    <path d="M19.41,20.11a.71.71,0,0,0,0-1.42A.71.71,0,0,0,19.41,20.11Z" />
                                    <path d="M44.41,18.69a.71.71,0,0,0,0,1.42A.71.71,0,0,0,44.41,18.69Z" />
                                    <path d="M44.41,43.69a.71.71,0,0,0,0,1.42A.71.71,0,0,0,44.41,43.69Z" />
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content">
                                <div class="ai-optimizer-modules-list-item-title">
                                    Upload your order details to our AI Graph DB service
                                </div>
                                <div class="ai-optimizer-modules-list-item-desc">Visit <strong><u>eshop-optimizer.com</u></strong> to open an account and upload your data. You will get the optimal upsells and crossells for your top selling products as well as extremely valuable statistics about your sales and tips on how to improve! <div class="pro">In the pro-version we offer recommendations for all your products based on all your orders.</div>
                                </div>
                            </div>
                        </a>
                        <div class="ai-optimizer-modules-list-item-action">
                            <div class="ai-optimizer-modules-list-item-icon-action">
                                <svg id="glipy_copy_4" data-name="glipy copy 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                    <path d="M32,2A30,30,0,1,0,62,32,30.03657,30.03657,0,0,0,32,2ZM38.45,48.13a.717.717,0,0,1-.72.72H26.28a.71492.71492,0,0,1-.71-.72V45.27a.7151.7151,0,0,1,1.43,0v2.15H37.02V45.27a.715.715,0,1,1,1.43,0Zm-4.8-5.51a.695.695,0,0,1,1.01,0,.71226.71226,0,0,1,0,1.01l-2.14,2.15a.74336.74336,0,0,1-1.02,0l-2.15-2.15a.71773.71773,0,0,1,1.02-1.01l.92.92V32.39a.715.715,0,0,1,1.43,0V43.54Zm9.48-4.44-8.97-.04V32.39a2.15013,2.15013,0,0,0-4.3,0v5.74L18.3,38.08a6.361,6.361,0,0,1-1.41-12.55.86162.86162,0,0,0,.26-.34A6.70364,6.70364,0,0,1,28.67,23.1a.71653.71653,0,0,0,1.01.11c1.13-1.05-2.07-2.93-2.9-3.29a6.69654,6.69654,0,0,1,13.11,1.92.715.715,0,0,0,1.43,0,7.83085,7.83085,0,0,0-.12-1.29,8.9141,8.9141,0,0,1,1.93-.21C54.96,20.83,54.95,37.69,43.13,38.18Z" />
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content">
                                <div class="ai-optimizer-modules-list-item-title">Download your existing up-sells and cross-sells<i class="ai-optimizer-modules-indicator"></i></div>
                                <div class="ai-optimizer-modules-list-item-desc">Backup your existing up-sells and cross-sells: Secure your current recommendations just in case you wish to revert to them in the unlikely event that our system’s suggestions don’t meet your expectations.</br></br>
                                    <div class="pro">The pro-version also factors for your existing crossells and you may need to provide them in order to account for the bias/impact of your existing recommendations.</br></div>
                                </div></br>
                                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                    <?php wp_nonce_field('eshop_optimizer_export_csv_action', 'eshop_optimizer_export_csv_nonce_4'); ?>
                                    <input type="hidden" name="action" value="eshop_optimizer_export_csv">
                                    <div class="cellsubmit">
                                        <input type="submit" value="Export your existing Up-sells and Cross-sells" class="button button-optimal-reverse">
                                    </div>
                                </form>

                            </div>








                        </div>
                    </div>
                </div>
                <div class="ai-optimizer-modules-box">
                    <div class="ai-optimizer-modules-box-heading">3. Eshop Update</div>
                    <div class="ai-optimizer-modules-list-two-thirds">
                        <div class="ai-optimizer-modules-list-item-support-dual">


                            <div class="ai-optimizer-modules-list-item-icon-dual">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0Zm1 8.414 1.293 1.293a1 1 0 1 0 1.414-1.414l-3-3a.998.998 0 0 0-1.414 0l-3 3a1 1 0 0 0 1.414 1.414L9 8.414V14a1 1 0 1 0 2 0V8.414Z"></path>
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content-dual">
                                <div class="ai-optimizer-modules-list-item-title-dual">
                                    Monitor Your Server and Define Time-Out Limits
                                    <i class="ai-optimizer-modules-indicator-support"></i>
                                </div>
                                <div class="ai-optimizer-modules-list-item-desc">
                                    Keep an eye on the duration it takes to update the Up-sells and Cross-sells for your items. This monitoring can assist in appropriately configuring the time-out parameters for your PHP and SQL operations.
                                    </br></br>
                                    <form id="recommendationsUploadForm"  method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" enctype="multipart/form-data">
                                        <?php wp_nonce_field('eshop_optimizer_handle_upload_action', 'eshop_optimizer_process_params_nonce_6'); ?>
                                        <input type="hidden" name="action" value="eshop_optimizer_handle_upload">

                                        <div><label><input type="checkbox" name="aieo_monitor_performance" value="1" <?php checked(get_option('aieo_monitor_performance', '0'), '1'); ?>>Monitor my performance</label></div>


                                        <div class="table">
                                            <div class="row">
                                                <div class="cell description">
                                                    Batch size
                                                </div>
                                                <div class="cell input">
                                                    <input type="number" id="aieo_batch_size" name="aieo_batch_size" placeholder="Set Batch Size" value="<?php echo esc_attr(get_option('aieo_batch_size')); ?>" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="cell description">
                                                    Sleep between batches (in seconds)
                                                </div>
                                                <div class="cell input">
                                                    <input type="number" id="aieo_batch_sleep" name="aieo_batch_sleep" placeholder="Cooling time (s)" value="<?php echo esc_attr(get_option('aieo_batch_sleep')); ?>" required>
                                                </div>
                                            </div>


                                        </div>


                                </div>
                            </div>

                            <div class="ai-optimizer-modules-list-item-icon-dual-right">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0Zm1 8.414 1.293 1.293a1 1 0 1 0 1.414-1.414l-3-3a.998.998 0 0 0-1.414 0l-3 3a1 1 0 0 0 1.414 1.414L9 8.414V14a1 1 0 1 0 2 0V8.414Z"></path>
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content-dual">
                                <div class="ai-optimizer-modules-list-item-title">
                                    Update your products with their optimal recommendations
                                    <i class="ai-optimizer-modules-indicator"></i>
                                </div>
                                <div class="ai-optimizer-modules-list-item-desc">
                                    Upload the file with your optimal recommendations.
                                    <div class="cellsubmit">

                                        <input type="file" name="csv_file" id="csv_file">
                                    </div>
                                    <div class="cellsubmit">


                                        <input type="submit" value="Upload optimal Up-sells and Cross-sells" class="button button-primary button-optimal">
                                    </div>

                                    </form>
                                 <!--   <div id="progressBar">Waiting to start...</div> -->
                                </div>
                            </div>
                        </div>


                        <!--
                    <a href="https://eshop-optimizer.com" target="_blank" class="ai-optimizer-modules-list-item">
                        <div class="ai-optimizer-modules-list-item-icon">
                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9 5a1 1 0 1 0-2 0v3a1 1 0 0 0 .293.707l2 2a1 1 0 0 0 1.414-1.414L9 7.586V5Z"></path>
                                <path d="m14.312 12.897 5.395 5.396a1 1 0 1 1-1.414 1.414l-5.396-5.395A7.954 7.954 0 0 1 8 16c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8a7.946 7.946 0 0 1-1.688 4.897ZM8 2C4.691 2 2 4.691 2 8s2.691 6 6 6 6-2.691 6-6-2.691-6-6-6Z"></path>
                            </svg>
                        </div>
                        <div class="ai-optimizer-modules-list-item-content">
                            <div class="ai-optimizer-modules-list-item-title">Monitor your sales and watch them grow!</div>
                            <div class="ai-optimizer-modules-list-item-desc">We bet that you are going to be gob smacked with the relevance of our recommendations.
                                </br></br>At times you may be in owe on... how on earth we discovered this or that suggestion while "knowing nothing" about your business. Well, thats AI for your store in full force!
                                </br></br>This is why we offer free analyses: We are sure that you will want to make the most of it and that you will also tell your friends!</div>
                        </div>
                    </a>

                -->
                    </div>
                </div>
                <div class="ai-optimizer-modules-box">
                    <div class="ai-optimizer-modules-box-heading">4. Expert Performance Enhancement Services</div>
                    <div class="ai-optimizer-modules-list">

                        <a href="https://eshop-optimizer.com/dashboard/" class="ai-optimizer-modules-list-item-pro" target="_blank">
                            <div class="ai-optimizer-modules-list-item-icon-pro">
                                <svg id="glipy_copy_4" data-name="glipy copy 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                    <title>1</title>
                                    <path d="M32,2A30,30,0,1,0,62,32,30.03661,30.03661,0,0,0,32,2ZM13.86,19.09a2.08292,2.08292,0,0,1,2.17-1.98H47.97a2.08292,2.08292,0,0,1,2.17,1.98V39.64H40.09a5.78986,5.78986,0,0,0-4.15,1.72,1.57927,1.57927,0,0,1-1.13.46H29.19a1.57927,1.57927,0,0,1-1.13-.46,5.78986,5.78986,0,0,0-4.15-1.72H13.86ZM52,43.31a3.57428,3.57428,0,0,1-3.57,3.58H15.57A3.57428,3.57428,0,0,1,12,43.31V41.79a.71491.71491,0,0,1,.71-.72h11.2a4.44138,4.44138,0,0,1,3.15,1.3,2.96175,2.96175,0,0,0,2.13.88h5.62a2.96175,2.96175,0,0,0,2.13-.88,4.44138,4.44138,0,0,1,3.15-1.3h11.2a.71491.71491,0,0,1,.71.72Z" />
                                    <path d="M29.14,37.71a2.1604,2.1604,0,0,0,2.02-1.42H43.43a.71513.71513,0,0,0,0-1.43H31.16a2.15551,2.15551,0,0,0-2.02-1.43,2.13281,2.13281,0,0,0-2.01,1.43H20.57a.71513.71513,0,0,0,0,1.43h6.56A2.13746,2.13746,0,0,0,29.14,37.71ZM29.86,35.57a.71522.71522,0,0,1-1.43,0A.71522.71522,0,0,1,29.86,35.57Z" />
                                    <path d="M20.57,30.57H32.84A2.1556,2.1556,0,0,0,34.86,32a2.13289,2.13289,0,0,0,2.01-1.43h6.56a.71513.71513,0,0,0,0-1.43H36.87A2.13286,2.13286,0,0,0,34.86,27.71,2.15557,2.15557,0,0,0,32.84,29.14H20.57A.71513.71513,0,0,0,20.57,30.57Zm15-.71a.71522.71522,0,0,1-1.43,0A.71522.71522,0,0,1,35.57,29.86Z" />
                                    <path d="M20.57,24.86h6.56a2.13281,2.13281,0,0,0,2.01,1.43,2.15552,2.15552,0,0,0,2.02-1.43H43.43a.71513.71513,0,0,0,0-1.43H31.16A2.15552,2.15552,0,0,0,29.14,22a2.13281,2.13281,0,0,0-2.01,1.43H20.57A.71513.71513,0,0,0,20.57,24.86Zm9.29-.72a.71507.71507,0,0,1-1.43,0A.71507.71507,0,0,1,29.86,24.14Z" />
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content">
                                <div class="ai-optimizer-modules-list-item-title">
                                    Establish Fundamentals, Oversee and Evaluate Progress
                                </div>
                                <div class="ai-optimizer-modules-list-item-desc">Register at <strong><u>eshop-optimizer.com</u></strong> to input your existing product suggestions along with supplementary product data like categories, tags, attributes, and content quality metrics. Subsequently, the system will generate astute recommendations spanning your entire catalog, regardless of sales history. <div class="pro">This is only available in the pro-version and provides access to our dashboard with easy access to your most valuable products as well as exact metrics about the progress you are making</div>
                                </div>
                            </div>
                        </a>
                        <a href="https://eshop-optimizer.com/service/ga4-events-integration" class="ai-optimizer-modules-list-item-pro" target="_blank">
                            <div class="ai-optimizer-modules-list-item-icon-pro">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 400 400" style="enable-background:new 0 0 400 400;" xml:space="preserve">
                                    <g>
                                        <path class="st0" d="M128.1,271.9L107,293c-51.3-51.3-51.3-134.7,0-186l21.1,21.1C88.4,167.7,88.4,232.3,128.1,271.9z" />
                                        <path class="st1" d="M293,293l-21.1-21.1c39.7-39.7,39.7-104.2,0-143.8L293,107C344.3,158.3,344.3,241.7,293,293z" />
                                        <path class="st2" d="M293,107l-21.1,21.1c-39.7-39.7-104.2-39.7-143.8,0L107,107C158.3,55.7,241.7,55.7,293,107z" />
                                        <path class="st3" d="M293,293c-51.3,51.3-134.7,51.3-186,0l21.1-21.1c39.7,39.7,104.2,39.7,143.8,0L293,293z" />
                                        <path class="st4" d="M281.9,97.1l-21.2,21.2c8,6,15.1,13.1,21.1,21.1l21.2-21.2C296.7,110.3,289.7,103.3,281.9,97.1z" />
                                        <path class="st5" d="M302.9,281.9l-21.2-21.2c-6,8-13.1,15.1-21.1,21.1l21.2,21.2C289.7,296.7,296.7,289.7,302.9,281.9z" />
                                        <path class="st6" d="M118.1,302.9l21.2-21.2c-8-6-15.1-13.1-21.1-21.1l-21.2,21.2C103.3,289.7,110.3,296.7,118.1,302.9z" />
                                        <path class="st7" d="M97.1,118.1l21.2,21.2c6-8,13.1-15.1,21.1-21.1l-21.2-21.2C110.3,103.3,103.3,110.3,97.1,118.1z" />
                                        <circle class="st8" cx="200" cy="200" r="111.8" />
                                    </g>
                                    <path d="M195.8,210.4v-13.5c2.7,0.8,5.6,0.8,8.4,0v13.5c0,5,4.1,9.1,9.1,9.1l0,0h0.1c4.6,17.7,20.9,30.6,40.1,30.1
	c21.2-0.6,38.6-18,39.1-39.2c0.5-21-14.9-38.5-35.2-41c0,0-8.7-8.5-15.4-13.5c-8.5-6.3-26.3-5.1-26.9,11.6h-30.3
	c-0.6-16.7-18.4-17.9-26.9-11.6c-6.8,5-15.4,13.5-15.4,13.5c-20.2,2.6-35.7,20.1-35.2,41.1c0.6,21.2,18,38.6,39.2,39.1
	c19.2,0.5,35.4-12.4,40-30.1h0.1C191.7,219.5,195.8,215.4,195.8,210.4z M147.6,239.6c-16.6,0-30.2-13.5-30.2-30.2
	s13.5-30.2,30.2-30.2s30.2,13.5,30.2,30.2S164.3,239.6,147.6,239.6z M200,191.2c-4.7,0-8.4-3.7-8.4-8.4s3.7-8.4,8.4-8.4
	s8.4,3.7,8.4,8.4S204.6,191.2,200,191.2z M147.8,187c-4.5,0-8.6,1.3-12,3.5c3.3,0.4,5.9,3.2,5.9,6.7c0,3.7-3,6.7-6.7,6.7
	c-3.3,0-6.1-2.5-6.6-5.6c-1.9,3.3-3,7.1-3,11.2c0,12.4,10,22.5,22.5,22.5c12.4,0,22.5-10,22.5-22.5C170.3,197,160.2,187,147.8,187z
	 M232.8,198.2c0.5,3.2,3.3,5.6,6.6,5.6c3.7,0,6.7-3,6.7-6.7c0-3.5-2.6-6.3-5.9-6.7c3.5-2.2,7.6-3.5,12-3.5c12.4,0,22.5,10,22.5,22.5
	c0,12.4-10,22.5-22.5,22.5s-22.5-10-22.5-22.5C229.7,205.3,230.8,201.5,232.8,198.2z M252.4,239.6c-16.6,0-30.2-13.5-30.2-30.2
	s13.5-30.2,30.2-30.2s30.2,13.5,30.2,30.2S269,239.6,252.4,239.6z" />
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content">
                                <div class="ai-optimizer-modules-list-item-title">
                                    Integrate and Retrieve Google GA4 Events
                                </div>
                                <div class="ai-optimizer-modules-list-item-desc">Set up an account at <strong><u>eshop-optimizer.com</u></strong> and link your Google Big Query to fetch the "add to cart" events. This allows us to amalgamate completed transactions with the inclinations of your website's visitors. <div class="pro">This is only available in the pro-version and we undertake the set up of the Big Queries for an additional fee; all you have to do is to provide access to your Analytics</div>
                                </div>
                            </div>
                        </a>
                        <a href="https://eshop-optimizer.com/service/go-phygital-connect-and-scrutinize-your-offline-sales" class="ai-optimizer-modules-list-item-pro" target="_blank">
                            <div class="ai-optimizer-modules-list-item-icon-pro">
                                <svg id="glipy_copy_4" data-name="glipy copy 4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                    <title>1</title>
                                    <path d="M32,2A30,30,0,1,0,62,32,30.03657,30.03657,0,0,0,32,2ZM13.86,19.09a2.08287,2.08287,0,0,1,2.17-1.98H47.97a2.08286,2.08286,0,0,1,2.17,1.98V39.64H40.09a5.78983,5.78983,0,0,0-4.15,1.72,1.57938,1.57938,0,0,1-1.13.46H29.19a1.57926,1.57926,0,0,1-1.13-.46,5.79,5.79,0,0,0-4.15-1.72H13.86ZM52,43.31a3.57432,3.57432,0,0,1-3.57,3.58H15.57A3.57428,3.57428,0,0,1,12,43.31V41.79a.7149.7149,0,0,1,.71-.72h11.2a4.44148,4.44148,0,0,1,3.15,1.3,2.96173,2.96173,0,0,0,2.13.88h5.62a2.96176,2.96176,0,0,0,2.13-.88,4.44124,4.44124,0,0,1,3.15-1.3h11.2a.71491.71491,0,0,1,.71.72Z" />
                                    <path d="M46.19,31.39a1.9863,1.9863,0,0,0,0-3.19c-3.96-2.67-10.71-7.77-16.25-6.41-4.13.94-9.2,4.29-12.13,6.41a1.97538,1.97538,0,0,0,0,3.19c2.93,2.12,8,5.47,12.13,6.42C35.48,39.17,42.23,34.06,46.19,31.39Zm-7.25-6.11a56.96844,56.96844,0,0,1,6.4,4.08.53754.53754,0,0,1,0,.88,56.479,56.479,0,0,1-6.41,4.07A8.342,8.342,0,0,0,38.94,25.28ZM18.66,30.24a.53754.53754,0,0,1,0-.88,56.96453,56.96453,0,0,1,6.4-4.08,8.34176,8.34176,0,0,0,.01,9.03A56.4752,56.4752,0,0,1,18.66,30.24Zm11.8-7.12a6.84716,6.84716,0,1,1,.33,13.41A6.88648,6.88648,0,0,1,30.46,23.12Z" />
                                    <path d="M32,25.3a4.495,4.495,0,0,0,0,8.99A4.48966,4.48966,0,0,0,32,25.3Zm-3.06,4.49a3.06008,3.06008,0,0,1,6.12,0A3.06008,3.06008,0,0,1,28.94,29.79Z" />
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content">
                                <div class="ai-optimizer-modules-list-item-title">
                                    Go Phygital: Connect and Scrutinize Offline Sales
                                </div>
                                <div class="ai-optimizer-modules-list-item-desc">Visit <strong><u>eshop-optimizer.com</u></strong> to load the shopping baskets of your physical stores. Then we will then combine the purchasing behaviour in your store(s) with that of your website <div class="pro">This is only available in the pro-version at an additional fee; the invoices will be extracted from your ERP and the products will be matched based on their barcode and/or SKU</div>
                                </div>
                            </div>
                        </a>

                        <a href="https://eshop-optimizer.com/site-audit" target="_blank" class="ai-optimizer-modules-list-item-pro">
                            <div class="ai-optimizer-modules-list-item-icon-pro">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9 5a1 1 0 1 0-2 0v3a1 1 0 0 0 .293.707l2 2a1 1 0 0 0 1.414-1.414L9 7.586V5Z"></path>
                                    <path d="m14.312 12.897 5.395 5.396a1 1 0 1 1-1.414 1.414l-5.396-5.395A7.954 7.954 0 0 1 8 16c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8a7.946 7.946 0 0 1-1.688 4.897ZM8 2C4.691 2 2 4.691 2 8s2.691 6 6 6 6-2.691 6-6-2.691-6-6-6Z"></path>
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content">
                                <div class="ai-optimizer-modules-list-item-title">Performance Audit</div>
                                <div class="ai-optimizer-modules-list-item-desc">Prepare to be astounded by the pertinence of our suggestions. Occasionally, you might find yourself wondering how we unearthed a particular recommendation without having in-depth knowledge of your enterprise.
                                    </br></br>That's the prowess of AI tailored for your store! Our confidence in our system's capabilities is why we offer complimentary analyses. We believe you'll want to maximize its potential and share your positive experiences with peers!</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="ai-optimizer-modules-box">
                    <div class="ai-optimizer-modules-box-heading">5. Pro Panel</div>
                    <div class="ai-optimizer-modules-list">

                        <div class="ai-optimizer-modules-list-item-pro-section">
                            <div class="ai-optimizer-modules-list-item-icon-pro-section">
                                <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 2h1V0H1.5A1.5 1.5 0 0 0 0 1.5V3h2V2ZM0 9a4 4 0 0 1 4-4h10a4 4 0 0 1 0 8H4a4 4 0 0 1-4-4ZM16 3V2h-1V0h1.5A1.5 1.5 0 0 1 18 1.5V3h-2ZM16 16h-1v2h1.5a1.5 1.5 0 0 0 1.5-1.5V15h-2v1ZM2 15v1h1v2H1.5A1.5 1.5 0 0 1 0 16.5V15h2ZM8 18H5v-2h3v2ZM10 18h3v-2h-3v2ZM8 2H5V0h3v2ZM10 2h3V0h-3v2Z"></path>
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content">
                                <div class="ai-optimizer-modules-list-item-title">Link Your Eshop-Optimizer.com Account
                                    <i class="ai-optimizer-modules-indicator-pro-section"></i>
                                </div>
                                <div class="ai-optimizer-modules-list-item-desc">
                                    <div class="table">
                                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                            <?php wp_nonce_field('eshop_optimizer_account_action', 'eshop_optimizer_account_nonce_7'); ?>
                                            <input type="hidden" name="action" value="eshop_optimizer_account">
                                            <div class="row">
                                                <div class="cell">Activate Remote Connection</div>
                                                <div class="cell input">
                                                    <input type="checkbox" id="aieo_activate_account" name="aieo_activate_account" value="1" <?php checked(1, get_option('aieo_activate_account'), true); ?>>
                                                </div>
                                            </div>
                                            <div class="row account-settings-row">
                                                <div class="cell">User</div>
                                                <div class="cell input">
                                                    <input type="text" id="aieo_account_username" name="aieo_account_username" value="<?php echo esc_attr(get_option('aieo_account_username')); ?>">
                                                </div>
                                            </div>
                                            <div class="row account-settings-row">
                                                <div class="cell">Password</div>
                                                <div class="cell input">
                                                    <?php
                                                    $account_pass_encrypted_in_db = get_option('aieo_account_password');
                                                    $account_pass_method = 'aes-256-ctr';
                                                    $account_pass_key = AUTH_KEY;
                                                    $account_pass_iv = substr(AUTH_SALT, 0, 16);
                                                    // Decrypt
                                                    $decrypted_account_password = openssl_decrypt($account_pass_encrypted_in_db, $account_pass_method, $account_pass_key, 0, $account_pass_iv);
                                                    ?>
                                                    <input type="password" id="aieo_account_password" name="aieo_account_password" value="<?php echo esc_attr($decrypted_account_password); ?>">
                                                </div>
                                            </div>
                                            <div class="row account-settings-row">
                                                <div class="cell">Datatable Prefix</div>
                                                <div class="cell input">
                                                    <!-- <input type="text" id="aieo_account_table" name="aieo_account_table" value=" -->
                                                    <?php echo esc_attr(get_option('aieo_account_table')); ?>
                                                    <!-- " > -->
                                                </div>
                                            </div>
                                            <div class="row account-settings-row">
                                                <div class="cell">Latest Report Prefix</div>
                                                <div class="cell input">
                                                    <!-- <input type="text" id="aieo_account_table" name="aieo_account_table" value=" -->
                                                    <?php echo esc_attr(get_option('aieo_account_report_table')); ?>
                                                    <!-- " > -->
                                                </div>
                                            </div>
                                            <div class="row account-settings-row">
                                                <div class="cell">Subscription Expiration:</div>
                                                <div class="cell input">
                                                    <!-- <input type="text" id="aieo_account_table" name="aieo_account_table" value=" -->
                                                    <?php echo esc_attr(get_option('aieo_subscription_expiration')); ?>
                                                    <!-- " > -->
                                                </div>
                                            </div>
                                            <div class="row account-settings-row">
                                                <div class="cell">JWT Debugging</div>
                                                <div class="cell input">
                                                    <textarea name="aieo_remote_debugging" id="aieo_remote_debugging" rows="5" cols="30"><?php echo esc_textarea(get_option('aieo_jwt_debugging')); ?></textarea>

                                                </div>
                                            </div>
                                    </div>
                                    <div class="cellsubmit">

                                        <input type="submit" class="button button-primary button-pro-section  center-content" value="Validate my account">

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="ai-optimizer-modules-list-item-pro-section">
                            <div class="ai-optimizer-modules-list-item-icon-pro-section">
                                <svg id="Glyph_Line" data-name="Glyph Line" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                    <title>1</title>
                                    <path d="M23.05,45.92a2.21016,2.21016,0,0,1,0-4.42A2.21016,2.21016,0,0,1,23.05,45.92Z" />
                                    <path d="M28.55,33.72H17.64a.3222.3222,0,0,1-.32-.32V31.71a3.8367,3.8367,0,0,1,3.83-3.83h3.89a3.83671,3.83671,0,0,1,3.83,3.83V33.4A.329.329,0,0,1,28.55,33.72Z" />
                                    <path d="M40.91,45.92a2.21008,2.21008,0,0,1,0-4.42A2.21008,2.21008,0,0,1,40.91,45.92Z" />
                                    <path d="M46.36,33.72H35.45a.329.329,0,0,1-.32-.32V31.71a3.83671,3.83671,0,0,1,3.83-3.83h3.89a3.8367,3.8367,0,0,1,3.83,3.83V33.4A.3222.3222,0,0,1,46.36,33.72Z" />
                                    <path d="M42.14,18.08H39.67a.97741.97741,0,0,0-.97.97v2.51c.05,2.8,4.36,2.8,4.41,0V19.05A.97091.97091,0,0,0,42.14,18.08Zm0,0H39.67a.97741.97741,0,0,0-.97.97v2.51c.05,2.8,4.36,2.8,4.41,0V19.05A.97091.97091,0,0,0,42.14,18.08ZM32,0A32,32,0,1,0,64,32,32.004,32.004,0,0,0,32,0Zm5.27,19.05a2.407,2.407,0,0,1,2.4-2.4h2.47a2.407,2.407,0,0,1,2.4,2.4v2.51c-.12,4.69-7.15,4.69-7.27,0Zm-17.81,0a2.407,2.407,0,0,1,2.4-2.4h2.47a2.407,2.407,0,0,1,2.4,2.4v2.51c-.12,4.69-7.15,4.69-7.27,0ZM51.3,44.43H44.47a3.6362,3.6362,0,0,1-7.12994,0H26.61a3.64351,3.64351,0,0,1-7.13,0H12.7a.71513.71513,0,0,1,0-1.43h6.78a3.658,3.658,0,0,1,2.86-2.86V35.15h-4.7a1.75836,1.75836,0,0,1-1.75-1.75V31.71A5.26642,5.26642,0,0,1,21.15,26.45h3.89a5.26642,5.26642,0,0,1,5.26,5.26V33.4a1.75836,1.75836,0,0,1-1.75,1.75H23.76v5A3.63452,3.63452,0,0,1,26.61,43H37.34a3.65938,3.65938,0,0,1,2.85-2.86V35.15H35.45A1.75836,1.75836,0,0,1,33.7,33.4V31.71A5.26642,5.26642,0,0,1,38.96,26.45h3.89a5.26642,5.26642,0,0,1,5.26,5.26V33.4a1.75836,1.75836,0,0,1-1.75,1.75H41.62v4.99A3.6461,3.6461,0,0,1,44.47,43H51.3A.71513.71513,0,0,1,51.3,44.43ZM43.11,21.56V19.05a.97091.97091,0,0,0-.97-.97H39.67a.97741.97741,0,0,0-.97.97v2.51C38.75,24.36,43.06,24.36,43.11,21.56Zm-17.81,0V19.05a.97741.97741,0,0,0-.97-.97H21.86a.97091.97091,0,0,0-.97.97v2.51C20.94,24.36,25.25,24.36,25.3,21.56Z" />
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content">
                                <div class="ai-optimizer-modules-list-item-title">
                                    Remote Transfer
                                    <i class="ai-optimizer-modules-indicator-pro-section"></i>
                                </div>
                                <div class="ai-optimizer-modules-list-item-desc">
                                    Pro users can connect directly transfer into our servers to send their orders and other data for processing.
                                    </br></br>

                                    <div class="table">
                                        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                                            <?php wp_nonce_field('eshop_optimizer_transfer_to_remote_action', 'eshop_optimizer_transfer_to_remote_nonce_8'); ?>
                                            <input type="hidden" name="action" value="eshop_optimizer_transfer_to_remote">


                                    </div>
                                    <div class="cellsubmit">

                                        <?php
                                        // Fetch the option from the WordPress database
                                        $aieo_account_type = get_option('aieo_user_membership');

                                        // Check if the account type is not 'Pro'
                                        if ($aieo_account_type !== 'Pro') {
                                            // If not 'Pro', add the 'disabled' attribute to the submit button
                                            echo '<input type="submit" class="button button-primary button-pro-section center-content" value="Remote Transfer of Orders" disabled>';
                                        } else {
                                            // If 'Pro', render the submit button without the 'disabled' attribute
                                            echo '<input type="submit" class="button button-primary button-pro-section center-content" value="Remote Transfer of Orders">';
                                        }
                                        ?>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="ai-optimizer-modules-list-item-pro-section">
                            <div class="ai-optimizer-modules-list-item-icon-pro-section">
                                <svg id="glipy" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                                    <title>1</title>
                                    <path d="M32,3A29,29,0,1,0,61,32,29.0337,29.0337,0,0,0,32,3Zm0,52.5A23.5,23.5,0,1,1,55.5,32,23.524,23.524,0,0,1,32,55.5Z" />
                                    <path d="M32,10.5A21.5,21.5,0,1,0,53.5,32,21.52451,21.52451,0,0,0,32,10.5Zm3.52,2.91A19.01318,19.01318,0,0,1,50.59,28.48a1.00782,1.00782,0,0,1-.8,1.17,1.10085,1.10085,0,0,1-.18.02,1.00667,1.00667,0,0,1-.99-.82A16.98412,16.98412,0,0,0,35.15,15.38a1.00224,1.00224,0,1,1,.37-1.97Zm6.77,9.68L35.21,34.87a.9238.9238,0,0,1-.34.34L23.09,42.29a1.06678,1.06678,0,0,1-.52.14,1.01537,1.01537,0,0,1-.86-1.52l7.08-11.78a.9244.9244,0,0,1,.34-.34l11.78-7.08A1.01248,1.01248,0,0,1,42.29,23.09ZM31,12.43a1,1,0,0,1,2,0v3.34a1,1,0,0,1-2,0Zm-2.52.98a1.0027,1.0027,0,0,1,1.17.8,1.01313,1.01313,0,0,1-.8,1.17A16.98412,16.98412,0,0,0,15.38,28.85a1.00667,1.00667,0,0,1-.99.82,1.10085,1.10085,0,0,1-.18-.02A1.00782,1.00782,0,0,1,13.41,28.48,19.01318,19.01318,0,0,1,28.48,13.41ZM11.43,32a1.003,1.003,0,0,1,1-1h3.34a1,1,0,0,1,0,2H12.43A1.003,1.003,0,0,1,11.43,32ZM28.67,50.61a1.22418,1.22418,0,0,1-.19-.02A19.01311,19.01311,0,0,1,13.41,35.52a1.00224,1.00224,0,0,1,1.97-.37A16.98419,16.98419,0,0,0,28.85,48.62a1.00377,1.00377,0,0,1-.18,1.99Zm4.33.96a1,1,0,0,1-2,0V48.23a1,1,0,0,1,2,0Zm2.52-.98a1.22418,1.22418,0,0,1-.19.02,1.00377,1.00377,0,0,1-.18-1.99,16.97933,16.97933,0,0,0,13.5-13.59.99955.99955,0,0,1,1.16-.81,1.01241,1.01241,0,0,1,.81,1.16A19.01834,19.01834,0,0,1,35.52,50.59ZM51.57,33H48.23a1,1,0,0,1,0-2h3.34a1,1,0,0,1,0,2Z" />
                                    <polygon points="25.49 38.51 33.63 33.63 38.51 25.49 30.37 30.37 25.49 38.51" />
                                </svg>
                            </div>
                            <div class="ai-optimizer-modules-list-item-content">
                                <div class="ai-optimizer-modules-list-item-title">
                                    Inspect Profitability and Identify Premium Products
                                </div>
                                <div class="ai-optimizer-modules-list-item-desc">Visit <strong><u><a href="https://eshop-optimizer.com/dashboard" title="Dashboard" target="_blank">eshop-optimizer.com</a></u></strong> to access the statistics of your most valuable products with tips on how improve them!</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php


    ?>