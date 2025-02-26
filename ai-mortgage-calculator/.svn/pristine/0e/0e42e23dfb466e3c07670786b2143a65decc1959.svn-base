<?php 
	$globals = AI_Mortgage_Calculator::instance();
	$options = get_option(  $globals['settings_options_key'] ); 
?>

<div data-controller="refinance-calculator">

<div class="aimc-relative aimc-max-w-xl aimc-mx-auto">

    <div class="aimc-bg-gray-100 aimc-p-4 aimc-rounded-sm">
        <h2 class="aimc-text-2xl aimc-font-medium aimc-text-gray-700"><?php echo esc_attr($options['refinance']['title']); ?></h2>
        <p class="aimc-text-sm aimc-text-gray-600"><?php echo esc_attr($options['refinance']['description']); ?></p>
    
        <div class="aimc-bg-white aimc-shadow-sm aimc-rounded-sm aimc-mt-4 aimc-p-4">

            <div class="aimc-grid aimc-grid-cols-3 aimc-gap-4">
                <div></div>
                <div class="aimc-text-center aimc-uppercase aimc-text-sm aimc-text-gray-700">
                    <span class="aimc-bg-title">Current Mortgage</span>
                </div>
                <div class="aimc-text-center aimc-uppercase aimc-text-sm aimc-text-gray-700">
                    <span class="aimc-bg-title">New Mortgage</span>
                </div>


                <div class="aimc-self-center aimc-font-medium aimc-text-sm aimc-text-gray-800">Loan Amount</div>
                <div class="aimc-relative aimc-rounded-md">
                    <div class="aimc-absolute aimc-inset-y-0 aimc-left-0 aimc-pl-3 aimc-h-9 aimc-flex aimc-items-center aimc-pointer-events-none">
                        <span class="aimc-text-gray-400 aimc-text-sm">$</span>
                    </div>

                    <input class="input-mask-money aimc-pl-7 aimc-text-sm aimc-text-gray-800 aimc-h-9 aimc-py-2 aimc-border aimc-border-gray-400 aimc-rounded-sm aimc-block aimc-w-full focus:aimc-ring-gray-500 focus:aimc-border-gray-500 aimc-shadow-none focus:aimc-outline-none" type="text" name="original_loan_amount" id="original_loan_amount" 
                        data-action="keyup->refinance-calculator#process" 
                        data-target="refinance-calculator.originalLoanAmount" 
                        value="<?php echo esc_attr($options['refinance']['current_loan_amount']); ?>">
                </div>
                <div class="aimc-relative aimc-rounded-md">
                    <div class="aimc-absolute aimc-inset-y-0 aimc-left-0 aimc-pl-3 aimc-h-9 aimc-flex aimc-items-center aimc-pointer-events-none">
                        <span class="aimc-text-gray-400 aimc-text-sm">$</span>
                    </div>

                    <input class="input-mask-money aimc-pl-7 aimc-text-sm aimc-text-gray-800 aimc-h-9 aimc-py-2 aimc-border aimc-border-gray-400 aimc-rounded-sm aimc-block aimc-w-full focus:aimc-ring-gray-500 focus:aimc-border-gray-500 aimc-shadow-none focus:aimc-outline-none" type="text" name="original_loan_amount" id="original_loan_amount"
                        data-action="keyup->refinance-calculator#process"
                        data-target="refinance-calculator.newLoanAmount"
                        value="<?php echo esc_attr($options['refinance']['new_loan_amount']); ?>">
                </div>


                <div class="aimc-self-center aimc-font-medium aimc-text-sm aimc-text-gray-800">Interest Rate</div>
                <div class="aimc-relative aimc-rounded-md">
                    <input class="aimc-pr-7 aimc-text-sm aimc-text-gray-800 aimc-h-9 aimc-py-2 aimc-border aimc-border-gray-400 aimc-rounded-sm aimc-block aimc-w-full focus:aimc-ring-gray-500 focus:aimc-border-gray-500 aimc-shadow-none focus:aimc-outline-none" type="number" name="original_interest_rate" id="original_interest_rate" step="any" 
                        data-action="keyup->refinance-calculator#process" 
                        data-target="refinance-calculator.originalInterestRatePercent"
                        value="<?php echo esc_attr($options['refinance']['current_interest_rate']); ?>">

                    <div class="aimc-absolute aimc-inset-y-0 aimc-right-0 aimc-pr-3 aimc-h-9 aimc-flex aimc-items-center aimc-pointer-events-none">
                        <span class="aimc-text-gray-400 aimc-text-sm">%</span>
                    </div>
                </div>
                <div class="aimc-relative aimc-rounded-md">
                    <input class="aimc-pr-7 aimc-text-sm aimc-text-gray-800 aimc-h-9 aimc-py-2 aimc-border aimc-border-gray-400 aimc-rounded-sm aimc-block aimc-w-full focus:aimc-ring-gray-500 focus:aimc-border-gray-500 aimc-shadow-none focus:aimc-outline-none" type="number" name="new_interest_rate" id="new_interest_rate" step="any"
                        data-action="keyup->refinance-calculator#process" 
                        data-target="refinance-calculator.newInterestRatePercent" 
                        value="<?php echo esc_attr($options['refinance']['new_interest_rate']); ?>">

                    <div class="aimc-absolute aimc-inset-y-0 aimc-right-0 aimc-pr-3 aimc-h-9 aimc-flex aimc-items-center aimc-pointer-events-none">
                        <span class="aimc-text-gray-400 aimc-text-sm">%</span>
                    </div>
                </div>


                <div class="aimc-self-center aimc-font-medium aimc-text-sm aimc-text-gray-800">Loan Term</div>
                <div class="aimc-relative aimc-rounded-md">
                    <input class="aimc-pr-7 aimc-text-sm aimc-text-gray-800 aimc-h-9 aimc-py-2 aimc-border aimc-border-gray-400 aimc-rounded-sm aimc-block aimc-w-full focus:aimc-ring-gray-500 focus:aimc-border-gray-500 aimc-shadow-none focus:aimc-outline-none" type="number" name="original_loan_term" id="original_loan_term" 
                        data-action="keyup->refinance-calculator#process" 
                        data-target="refinance-calculator.originalLoanTerm" 
                        value="<?php echo esc_attr($options['refinance']['current_loan_term']); ?>">

                    <div class="aimc-absolute aimc-inset-y-0 aimc-right-0 aimc-pr-3 aimc-h-9 aimc-flex aimc-items-center aimc-pointer-events-none">
                        <span class="aimc-text-gray-400 aimc-text-sm">Years</span>
                    </div>
                </div>
                <div class="aimc-relative aimc-rounded-md">
                    <input class="aimc-pr-7 aimc-text-sm aimc-text-gray-800 aimc-h-9 aimc-py-2 aimc-border aimc-border-gray-400 aimc-rounded-sm aimc-block aimc-w-full focus:aimc-ring-gray-500 focus:aimc-border-gray-500 aimc-shadow-none focus:aimc-outline-none" type="number" name="new_loan_term" id="new_loan_term" 
                        data-action="keyup->refinance-calculator#process" 
                        data-target="refinance-calculator.newLoanTerm" 
                        value="<?php echo esc_attr($options['refinance']['new_loan_term']); ?>">

                    <div class="aimc-absolute aimc-inset-y-0 aimc-right-0 aimc-pr-3 aimc-h-9 aimc-flex aimc-items-center aimc-pointer-events-none">
                        <span class="aimc-text-gray-400 aimc-text-sm">Years</span>
                    </div>
                </div>


                <div class="aimc-self-center aimc-font-medium aimc-text-sm aimc-text-gray-800">Start of Payment</div>
                <div>
                    <input type="text" class="input-mask-date aimc-text-sm aimc-text-gray-800 aimc-h-9 aimc-py-2 aimc-border aimc-border-gray-400 aimc-rounded-sm aimc-block aimc-w-full focus:aimc-ring-gray-500 focus:aimc-border-gray-500 aimc-shadow-none focus:aimc-outline-none" id="original_loan_start_date" name="original_loan_start_date"
                        data-action="keyup->refinance-calculator#process"
                        data-target="refinance-calculator.originalLoanStartDate"
                        value="08/2020">
                </div>
                <div>
                    <input type="text" class="input-mask-date aimc-text-sm aimc-text-gray-800 aimc-h-9 aimc-py-2 aimc-border aimc-border-gray-400 aimc-rounded-sm aimc-block aimc-w-full focus:aimc-ring-gray-500 focus:aimc-border-gray-500 aimc-shadow-none focus:aimc-outline-none" id="new_loan_start_date" name="new_loan_start_date"
                        data-action="keyup->refinance-calculator#process"
                        data-target="refinance-calculator.newLoanStartDate"
                        value="05/2022">
                </div>


                <div class="aimc-self-center aimc-font-medium aimc-text-sm aimc-text-gray-800">Extra Principal Payment</div>
                <div>
                    <input style="display: none;" data-action="keyup->refinance-calculator#process" data-target="refinance-calculator.originalAdditionalMonthlyPayment" value="0">
                </div>
                <div class="aimc-relative aimc-rounded-md">
                    <div class="aimc-absolute aimc-inset-y-0 aimc-left-0 aimc-pl-3 aimc-h-9 aimc-flex aimc-items-center aimc-pointer-events-none">
                        <span class="aimc-text-gray-500 aimc-text-sm">$</span>
                    </div>

                    <input class="input-mask-money aimc-pl-7 aimc-text-sm aimc-text-gray-800 aimc-h-9 aimc-py-2 aimc-border aimc-border-gray-400 aimc-rounded-sm aimc-block aimc-w-full focus:aimc-ring-gray-500 focus:aimc-border-gray-500 aimc-shadow-none focus:aimc-outline-none" type="text" id="new_additional_monthly_payment" name="new_additional_monthly_payment" 
                        data-action="keyup->refinance-calculator#process"
                        data-target="refinance-calculator.newAdditionalMonthlyPayment" 
                        value="<?php echo esc_attr($options['refinance']['extra_principal_payment']); ?>">
                </div>

            </div>

        </div>

        <div class="aimc-mt-3">

            <div class="aimc-grid grid-col sm:aimc-grid-cols-2 aimc-gap-4">

                <div>
                    <h3 class="aimc-uppercase aimc-text-base aimc-text-gray-900">Refinance Saving</h3>
                    
                    <div class="aimc-font-bold aimc-text-3xl aimc-text-gray-900" data-target="refinance-calculator.monthlySavingsContainer">
                        <span class="aimc-text-emerald-500" data-target="refinance-calculator.monthlySavings"></span>
                        <span class="aimc-font-medium aimc-text-base aimc-text-gray-700">per month</span>
                    </div>

                </div>

                <div class="aimc-text-center aimc-mt-4">
                    <span class="aimc-text-base aimc-text-gray-900">Lifetime Savings</span>
                    <div class="aimc-font-bold aimc-text-2xl" data-target="refinance-calculator.lifetimeSavingsContainer">
                        <span class="aimc-text-cyan-500" data-target="refinance-calculator.lifetimeSavings"></span>
                    </div>
                </div>

            </div>


            <div class="aimc-flex aimc-gap-6 aimc-mt-2">
                <div>
                    <span class="aimc-text-sm aimc-text-gray-800">New Payment</span>
                    <div class="aimc-font-bold aimc-text-sm aimc-text-gray-900">
                        <span data-target="refinance-calculator.newMonthlyPayment"></span>
                        <span class="aimc-font-medium aimc-text-sm aimc-text-gray-700">/month</span>
                    </div>
                </div>

                <div>
                    <span class="aimc-text-sm aimc-text-gray-800">Payoff Period</span>
                    <div class="aimc-font-bold aimc-text-sm aimc-text-gray-900" data-target="refinance-calculator.payoffRelativeOccurrenceContainer">
                        <span data-target="refinance-calculator.payoff"></span>
                        <span data-target="refinance-calculator.payoffRelativeOccurrence"></span>
                    </div>
                </div>
            </div>

            
            <div class="aimc-text-[0.6rem] aimc-text-right aimc-text-gray-300">
                Calculator By: <a class="aimc-text-gray-300 hover:aimc-text-gray-300 aimc-no-underline" href="https://choicehm.com" target="_blank">Choice Home Mortgage</a>
            </div>

            <span data-target="refinance-calculator.originalMonthlyPayment" style="display: none;"></span>


        </div>
    </div>

</div>