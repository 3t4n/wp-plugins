<div class="my-4 broad-card white-card">
    <?php $program = $result->program ?? null; ?>
    <?php if ( $program ) { ?>
    <div class="program-overview-wrapper refer-a-friend-program">

        <div class="p-6 program-details">
            <div class="program-details-flex-box">
                <div class="program-initials"><?php echo esc_html($program->initial); ?></div>
                <div class="program-name-flex-box">
                    <span class="type"><?php echo esc_html($program->type); ?></span>
                    <span class="name"><?php echo esc_html($program->name); ?></span>
                </div>
            </div>
        </div>

        <div class="p-6 program-settings">
            <ul>
                <li>
                    <span class="setting-name">Active rewards</span>
                    <span class="setting-value"><?php echo esc_html($result->active_rewards); ?></span>
                </li>
                <li>
                    <span class="setting-name">Program created</span>
                    <span class="setting-value"><?php echo esc_html($program->created_at); ?></span>
                </li>
                <li>
                    <span class="setting-name">Last edited</span>
                    <span class="setting-value"><?php echo esc_html($program->last_edited); ?></span>
                </li>
            </ul>
        </div>

    </div>
    <?php } ?>

</div>

<div class="grid all-stats-grid refer-a-friend-program">

    <div class="slim-card white-card">
        <div class="card-title">Customers</div>
        <h3 class="card-value">
            <span><?php echo (int)$result->total_customers; ?></span>
            <span class="card-progress <?php echo esc_attr(Partnero_Util::get_growth_class( $result->total_customers_growth )); ?>">
                        <span class="dashicons <?php echo esc_attr(Partnero_Util::get_growth_icon( $result->total_customers_growth )); ?>"></span>
                        <span><?php echo (float)$result->total_customers_growth; ?>%</span>
                    </span>
        </h3>
    </div>

    <div class="slim-card white-card">
        <div class="card-title">Referring customers</div>
        <h3 class="card-value">
            <span><?php echo (int)$result->total_referring_customers; ?></span>
            <span class="card-progress <?php echo esc_attr(Partnero_Util::get_growth_class( $result->total_referring_customers_growth )); ?>">
                        <span class="dashicons <?php echo esc_attr(Partnero_Util::get_growth_icon( $result->total_referring_customers_growth )); ?>"></span>
                        <span><?php echo (float)$result->total_referring_customers_growth; ?>%</span>
                    </span>
        </h3>
    </div>

    <div class="slim-card white-card">
        <div class="card-title">Referred customers</div>
        <h3 class="card-value">
            <span><?php echo (int)$result->total_referred_customers; ?></span>
            <span class="card-progress <?php echo esc_attr(Partnero_Util::get_growth_class( $result->total_referred_customers_growth )); ?>">
                        <span class="dashicons <?php echo esc_attr(Partnero_Util::get_growth_icon( $result->total_referred_customers_growth )); ?>">
                        </span>
                        <span><?php echo (float)$result->total_referred_customers_growth; ?>%</span>
                    </span>
        </h3>
    </div>

    <div class="slim-card white-card">
        <div class="card-title">Sales</div>
        <h3 class="card-value">
            <span><?php echo (int)$result->total_sales; ?></span>
            <span class="card-progress <?php echo esc_attr(Partnero_Util::get_growth_class( $result->total_sales_growth )); ?>">
                        <span class="dashicons <?php echo esc_attr(Partnero_Util::get_growth_icon( $result->total_sales_growth )); ?>"></span>
                        <span><?php echo (float)$result->total_sales_growth; ?>%</span>
                    </span>
        </h3>
    </div>

    <div class="slim-card white-card">
        <div class="card-title">Participation</div>
        <h3 class="card-value">
            <span><?php echo esc_html($result->participation); ?></span>
            <span class="card-progress <?php echo esc_attr(Partnero_Util::get_growth_class( $result->participation_growth )); ?>">
                            <span class="dashicons <?php echo esc_attr(Partnero_Util::get_growth_icon( $result->participation_growth )); ?>">
                            </span>
                            <span><?php echo (float)$result->participation_growth; ?>%</span>
                        </span>
        </h3>
    </div>

    <div class="slim-card teal-card">
        <div class="card-title">Program revenue</div>
        <h3 class="card-value">
            <?php foreach( $result->total_revenue_from_sales as $reward ) { ?>
                <span><?php echo esc_html($reward); ?></span>
            <?php } ?>
        </h3>
    </div>

</div>

<div class="my-4 p-6 broad-card white-card">
    <form action="" method="POST" class="app-settings">
        <div class="switch-container">
            <button type="button"
                    class="switch-button"
                    role="switch"
                    aria-checked="<?php echo $sync_customers_setting ?>"
                    aria-labelledby="availability-label"
            >
                <span aria-hidden="true" class="switch-handle"></span>
            </button>
            <label id="availability-label" class="switch-label">Sync customers from WooCommerce directly into the program.</label>
        </div>
        <div>
            <input type='hidden' name='page' value='partnero-admin'/>
            <input type='hidden' name='program_action' value='update-sync-customers-setting'/>
            <input type="hidden" name="sync_customers_setting" id="sync-customers-setting" value="<?php echo $sync_customers_setting ?>">
            <input type='hidden' name='program_type' value='<?php echo esc_html($active_type) ?>'/>
            <input type='submit' name='submit' class='btn' value="Save">
        </div>
    </form>
</div>

<div class="my-4 p-6 broad-card white-card">
    <form action='' method='POST' class="app-settings">
        <div>
            <label for="tax_setting" class="title">
                Select which sale amount you’d like to calculate commissions from:
            </label>
            <select name="tax_setting">
                <option
                    value="net"
                    <?php if( $tax_setting === 'net' ) { echo 'selected'; } ?>
                >
                    NET (after tax is deducted)
                </option>

                <option
                    value="gross"
                    <?php if( $tax_setting === 'gross' ) { echo 'selected'; } ?>
                >
                    GROSS (total amount, tax included)
                </option>
            </select>
        </div>
        <div>
            <input type='hidden' name='page' value='partnero-admin'/>
            <input type='hidden' name='program_action' value='update-tax-setting'/>
            <input type='hidden' name='program_type' value='<?php echo esc_html($active_type) ?>'/>
            <input type='submit' name='submit' class='btn' value="Save">
        </div>
    </form>
</div>