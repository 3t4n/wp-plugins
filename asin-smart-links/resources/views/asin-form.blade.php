<div class='asin-smart-links-container pb-flex pb-gap-4 pb-items-center' x-data="asinData('<?php echo home_url('asin-smart-links/'); ?>')" @keydown.escape="show_link = false">
    <label class='asin-smart-links-label pb-text-bold' for="asin"><?php _e('ASIN', 'asin-smart-links'); ?></label>
    <input @input="show_link = false" class='asin-smart-links-input pb-border pb-border-solid pb-border-black pb-h-8' type="text" id="asin" name="asin"
        x-model="asin" autofocus>
    <button x-cloak x-show="asin" type='button' class='asin-smart-links-btn pb-bg-black pb-border pb-border-solid pb-border-black pb-px-6 pb-h-8 hover:pb-bg-gray-600 pb-text-white pb-cursor-pointer' x-bind="get_link"><?php _e('Get link', 'asin-smart-links') ?></button>

    <div class="pb-fixed pb-inset-0 pb-z-30 pb-flex pb-items-center pb-justify-center pb-overflow-auto pb-bg-black pb-bg-opacity-50" x-cloak x-show="show_link">
        <div class="pb-max-w-3xl pb-px-6 pb-py-4 pb-mx-auto pb-text-left pb-bg-white pb-rounded pb-shadow-lg"
            @click.away="show_link = false"
						x-transition:enter="motion-safe:ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
						x-transition:enter-end="opacity-100 scale-100">

            <div class="pb-flex pb-items-center pb-justify-between">
                <h5 class="pb-mr-3 pb-text-black pb-max-w-none"><?php _e('ASIN', 'asin-smart-links'); ?></h5>
            </div>

            <div class="">
                <b><?php _e('Here is your universal link:', 'asin-smart-links'); ?></b>
								<div class="pb-flex pb-gap-2 pb-items-center">
									<a x-ref="asin_link" :href="'<?php echo home_url('asin-smart-links/'); ?>' + asin" target="_blank" x-text="'<?php echo home_url('asin-smart-links/'); ?>' + asin"></a>
               	 	<button type='button' class='asin-smart-links-btn pb-cursor-pointer pb-border-0 pb-bg-transparent' @click=" navigator.clipboard.writeText($refs.asin_link.innerHTML); ">
										<svg class="pb-w-6 pb-h-6 pb-text-black" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184"></path>
										</svg>
									</button>
								</div>
                <div class="pb-text-center pb-pt-4">
                  <canvas id="canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
