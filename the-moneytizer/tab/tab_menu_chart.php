<div class="accordion" id="accordion_menu_chart">
    <div class="accordion-item">
        <h2 class="accordion-header" id="menu_chart">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_menu_chart" aria-expanded="true" aria-controls="collapse_menu_chart">
        <i class="bi bi-bar-chart-line"></i>&nbsp;<?php _e('Statistiques','themoneytizer'); ?>
        </button>
        </h2>
        <div id="collapse_menu_chart" class="accordion-collapse collapse" aria-labelledby="menu_chart" data-bs-parent="#accordion_menu_chart">
            <div class="accordion-body">
                <h5><?php _e('Statistiques globales de votre site : ','themoneytizer'); ?></h5>
                <p id="el-intro-1" class="themoneytizer_card mid-size" style="margin-top: 20px;">
                  <?php _e('Retrouvez vos statistiques concernant vos gains ainsi que votre CPM pour chaque formats sur les 30 derniers jours','themoneytizer'); ?>
                </p>
                <div style="width:100%; margin-top:40px; text-align:center">
                    <span id="global_statistics_label"></span>
                </div>
                <canvas id="global_statistics"></canvas>
                <div id="chart_div" style='margin-top:50px;'></div>
            </div>
        </div>
    </div>
</div>