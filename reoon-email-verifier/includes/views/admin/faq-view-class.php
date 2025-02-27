<?php

namespace REOONENV\Views;
use REOONENV\util\Util;
class FaqView
{

    public function __construct()
    {
    }

    // Display the plugin's FAQ
    function reoonev_faq()
    {
?>
        <div class="reo-em-ver-container">
        <h1 class="reo-em-ver-reo-em-ver-h1">Reoon Email Verifier FAQ</h1>
            <div class="reo-em-ver-card">
                
                <div class="reo-em-ver-card-body">
                    <h2 class="reo-em-ver-faq-question">What is the Reoon Email Verifier plugin?</h2>
                    <p class="reo-em-ver-faq-answer">The Reoon Email Verifier plugin is a tool that allows you to verify the validity of email addresses during the form submissions.</p>
                    <h2 class="reo-em-ver-faq-question">How does it work?</h2>
                    <p class="reo-em-ver-faq-answer">The plugin uses the API of Reoon Email Verifier to check whether the entered emails address is valid or not.</p>
					<h2 class="reo-em-ver-faq-question">What will happen if the account run out of credits?</h2>
                    <p class="reo-em-ver-faq-answer">In such cases email submissions will not be checked by the plugin and every submitted email addresses will be accepted (as like our plugin is not installed).</p>
                </div>
            </div>

            <?php Util::get_support_url()?>
        </div>

<?php
    }
}
