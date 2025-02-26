<?php
global $current_user;
$args = array(
    'orderby' => 'post_date',
    'order' => 'DESC',
    'posts_per_page' => 10,
    'post_type' => 'ff_taxannouncement',
);
$posts_array = get_posts($args);
$p = $posts_array[0];
//var_dump($posts_array);
?>
<div  style="background:blue;">
    <h5  style="">10 LATEST ANNOUNCEMENTS</h5>
    <div class='well well-small'>
        <?php
        for ($i = 0; $i < 10; $i++) {
            $p = $posts_array[$i];
            if (empty($p))
                break;
            ?>
            <div class='well-small-row'>
                <h5 class="ori_announc_title"><?php echo $p->post_title; ?></h5>
                <p style="font-size:16px;"  class="ori_announc_content"><?php
        $c = get_post_meta($p->ID, 'announc_description', true);
        echo $c;
            ?>
                </p>
                <p>By <span  class="ori_announc_by">
                        <?php
                        $args = array(
                            'include' => array($p->post_author),
                        );
                        $u = get_users($args);
                        echo $u[0]->display_name;
                        ?>
                    </span>
                    on
                    <span  class="ori_announc_on"> <?php echo $p->post_date; ?></span>
                </p>
            </div>
        <?php } ?>
    </div>
    <br clear = "all" />
    <?php
    if (current_user_can('administrator')) {
        ?>
        <div class='row-fluid' style="">
            <p>All announcements published will be active on either agent or tax office dashboards or both. I will switch it to draft it will not be shown and can be saved for next year</p>
            <div class="do_show_addannouncment"><label>Show Add Announcement:</label> <i class="icon-chevron-down"></i></div>
            <div class="do_hide_addannouncment"><label>Hide Add Announcement:</label> <i class="icon-chevron-up"></i></div>
            <div class="addannouncment" >
                <input placeholder="Announcement Title" type="text" name="addannounctitle" id="addannounctitle"  class="span12">
                <textarea  placeholder="Announcement Content" name="addannounc" id="addannounc" rows="3" class="span12"></textarea>
                <span class="btn btn-mini btn-info do_post_announc" >Post</span>

            </div>
            <br clear = "all" />
        </div>
    <?php } ?>
    <br clear = "all" />
</div>
<br clear = "all" />
<style type="text/css">
    #fgl_dashboard_widget_agent_earning{
        float:left;
    }
    .well-small{
        float:left;
        max-height:300px;
        overflow: auto;
        width: 95%;
    }
    .well-small-row{float:left;border-top: 1px solid #ddd;width:100%}
    .well-small-row:first-child{border:none}
</style>
<script  type="text/javascript" >

    $(document).ready(function(){
        flg_apm.setAnnouncement.initClicks();
        $('.addannouncment').hide();
        $('.do_hide_addannouncment').hide();


    });


    flg_apm.setAnnouncement=function(){
    }
    flg_apm.setAnnouncement.username="<?php echo $current_user->data->display_name; ?>";
    flg_apm.setAnnouncement.initClicks=function(){
        $('.do_post_announc').off('click').on('click',function(){
            var vt=$('#addannounctitle').val();
            var vc=$('#addannounc').val();
            if(vt!=='' && vc!==''){

                flg_apm.setAlertPanel.addAlert('Posting','Posting the Announcement, please wait...','',3000);
                $.ajax({
                    url: ajaxurl ,
                    type: "POST",
                    data: "subaction=saveAnnouncement&action=apm_extensions&args="+$.JSON.encode({
                        title:vt,
                        content:vc
                    }),
                    error: function(data){
                        flg_apm.setAlertPanel.addAlert('Posting Issue','An error appeared while Posting...','error',4000);
                    },
                    success: function(data){
                        flg_apm.setAlertPanel.addAlert('Posted','The Announcement was Posted successfully','ok',3000);

                        var tmp_new_row = $('.well-small-row:first-child').clone();

                        //ori_announc_title  ori_announc_content  ori_announc_by ori_announc_on
                        $(tmp_new_row).find('.ori_announc_title').html(vt);
                        $(tmp_new_row).find('.ori_announc_content').html(vc);
                        $(tmp_new_row).find('.ori_announc_by').html(flg_apm.setAnnouncement.username);

                        var data_ar=$.JSON.decode(data);
                        // d=$.datepicker.formatDate('yy-mm-dd', new Date());
                        // var currentTime = new Date();
                        $(tmp_new_row).find('.ori_announc_on').html(data_ar.timedate);
                        $('.well-small').prepend($(tmp_new_row).html());
                    }
                });
            }else{
                flg_apm.setAlertPanel.addAlert('Missing content','Please fill all the fields...','error',3000);
            }
        })
        $('.do_show_addannouncment').off('click').on('click',function(){
            $('.addannouncment').show(500);
            $('.do_show_addannouncment').hide();
            $('.do_hide_addannouncment').show();
        })
        $('.do_hide_addannouncment').off('click').on('click',function(){
            $('.addannouncment').hide(500);
            $('.do_show_addannouncment').show();
            $('.do_hide_addannouncment').hide();
        })
    }
</script>
