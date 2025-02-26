<?php ?>
<div class="clearfix">
    <h4 class="dash_appdashtitle">
        <?php echo $appLabel; ?> Modules list:
    </h4>
    <div class='ori_dash_2col'>
        <h6>Main Modules</h6>
        <?php
        foreach ($app['modules'] as $k => $module) {
            if (isset($widg['modules'])) {
                $bool = false;
                foreach (explode(',', $widg['modules']) as $o => $mod) {
                    if ($mod == $k) {
                        $bool = true;
                    }
                }
            } else {
                $bool = true;
            }
            if (isset($module['is_secundary']) and $module['is_secundary'] == true) {

            } else if ($bool) {

                $icon = '';
                if (isset($module['icon'])) {
                    $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $module['icon'] . "' /> ";
                }
                $popcont = "<ul>
                <li>Total items: " . $armodsnum[$k]['total'] . "</li>
                <li>Total created by me: " . $armodsnum[$k]['total_mine'] . "</li>
                <li>Total assigned to me: " . $armodsnum[$k]['total_assignme'] . "</li>
                </ul>";
                ?>

                <div class='ori_dash_listmod'>
                    <a class='hasPopover'  data-html='true' data-iswidget='true' data-toggle="popover" data-content="<?php echo $popcont; ?>" data-title="Click to see all <?php echo $module['name']; ?>" href='admin.php?page=<?php echo $mainkey . '-' . $k; ?>'> <?php echo $icon . ' ' . $module['name']; ?> </a>
                    <span class='pull-right'>
                        <!--span class='btn btn-mini hasTooltip'   title="See all <?php echo $module['name']; ?>"   > <a   href='admin.php?page=<?php echo $mainkey . '-' . $k; ?>'> <i class="icon-eye-open "></i> </a>
                        </span-->
                        <span class='btn  btn-mini hasTooltip'   title="Create <?php echo $module['singular_name']; ?>" >  <a    href='post-new.php?post_type=<?php echo $k; ?>'> <i class="icon-plus "></i> </a>
                        </span>
                    </span>
                </div>
                <span class="clearfix"></span>
                <?php
            }
        };

        if (isset($widg['add_links'])) {
            foreach ($widg['add_links'] as $k => $lin) {
                if ($lin['position'] !== 'other') {
                    ?>
                    <div class='ori_dash_listmod'>
                        <a class='hasTooltip'   data-title="Click to see open this link" href='admin.php?page=<?php echo $lin['pagename']; ?>'> <?php echo $lin['label']; ?> </a>

                    </div>
                    <span class="clearfix"></span>
                    <?php
                }
            }
        }
        ?>
    </div>
    <div class='ori_dash_2col'>
        <h6>Others Modules</h6>
        <?php
        foreach ($app['modules'] as $k => $module) {
            if (isset($module['is_secundary']) and $module['is_secundary'] == true) {
                ?>
                <?php
                $icon = '';
                if (isset($module['icon'])) {
                    $icon = "<img src='" . $apm_settings['paths']['img'] . "/" . $module['icon'] . "' /> ";
                }
                $popcont = "<ul>
                <li>Total items: " . $armodsnum[$k]['total'] . "</li>
                <li>Total created by me: " . $armodsnum[$k]['total_mine'] . "</li>
                <li>Total assigned to me: " . $armodsnum[$k]['total_assignme'] . "</li>
                </ul>";
                ?>
                <div class='ori_dash_listmod'>
                    <a class='hasPopover'  data-html='true' data-placement="top" data-toggle="popover" data-content="<?php echo $popcont; ?>" data-title="Click to see all <?php echo $module['name']; ?>" href='admin.php?page=<?php echo $mainkey . '-' . $k; ?>'> <?php echo $icon . ' ' . $module['name']; ?> </a>
                    <span class='pull-right'>
                        <!--span class='btn btn-mini hasTooltip'   title="See all <?php echo $module['name']; ?>"   > <a   href='admin.php?page=<?php echo $mainkey . '-' . $k; ?>'> <i class="icon-eye-open "></i> </a>
                        </span-->
                        <span class='btn  btn-mini hasTooltip' data-placement="left"  title="Add <?php echo $module['singular_name']; ?>" >  <a    href='post-new.php?post_type=<?php echo $k; ?>'> <i class="icon-plus "></i> </a>
                        </span>
                    </span>
                </div>
                <span class="clearfix"></span>
                <?php
            }
        };

        if (isset($widg['add_links'])) {
            foreach ($widg['add_links'] as $k => $lin) {
                if ($lin['position'] == 'other') {
                    ?>
                    <div class='ori_dash_listmod'>
                        <a class='hasTooltip'   data-title="Click to see open this link" href='admin.php?page=<?php echo $lin['pagename']; ?>'> <?php echo $lin['label']; ?> </a>

                    </div>
                    <span class="clearfix"></span>
                    <?php
                }
            }
        }
        ?>
    </div>
    <span class="clearfix"></span>
</div>