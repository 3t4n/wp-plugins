<?php

    /**
     *  this file is included for display affiliate dashboard
     *
     * @since    1.0.0
     */	
?>

<div class="row wow fadeIn mb-4">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon amber darken-1 ciwcamp-space">
                    <i class="fa fa-television"></i>
                </div>
                <p class="card-category"><?php esc_html_e( 'Total Visits','ciwcamp-affliate-manager' ); ?></p>
                <h3 class="card-title" id="ciwcamp-total-visits"></h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon green darken-1 ciwcamp-revenue">
                    <i class="fa fa-bar-chart"></i>
                </div>
                <p class="card-category"><?php esc_html_e( 'Total Sales','ciwcamp-affliate-manager' ); ?></p>
                <h3 class="card-title" id="ciwcamp-total-sales"></h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon red darken-1 ciwcamp-issues">
                    <i class="fa fa-usd"></i>
                </div>
                <p class="card-category"><?php esc_html_e( 'Total Earnings','ciwcamp-affliate-manager' ); ?></p>
                <h3 class="card-title" id="ciwcamp-total-earnings"></h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon blue darken-1 ciwcamp-followers">
                <i class="fa fa-money"></i>
                </div>
                <p class="card-category"><?php esc_html_e( 'Balance','ciwcamp-affliate-manager' ); ?></p>
                <h3 class="card-title" id="ciwcamp-balance"></h3>
            </div>
        </div>
    </div>
</div> 

<div class="row wow fadeIn">
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="card">
            <div class="card-header"><?php esc_html_e( 'Visits and Conversion','ciwcamp-affliate-manager' ); ?></div>
            <div class="card-body">
                <canvas id="ciwcamp-visit-conversion"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="card">
            <div class="card-header"><?php esc_html_e( 'My Earnings','ciwcamp-affliate-manager' ); ?></div>
            <div class="card-body">
                <canvas id="ciwcamp-my-earnings"></canvas>
            </div>
        </div>
    </div>
</div>

