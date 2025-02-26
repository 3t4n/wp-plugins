<div  style="">
    <h5  style="">10 LATEST ANNOUNCEMENTS</h5>
    <div class='well well-small'>
        <?php
        for ($i = 0; $i < 10; $i++) {
            $p = $posts_array[$i];
            if (empty($p))
                break;
            ?>
            <div class='well-small-row'>
                <h5  style="line-height: 17px; padding:0 0;margin:2px 0;" class="ori_announc_title"><?php echo $p->post_title; ?></h5>
                <p style="font-size:15px; line-height: 17px; padding:0 0;"  class="ori_announc_content"><?php
        $c = get_post_meta($p->ID, 'announc_description', true);
        echo $c;
            ?>
                </p>
                <!--p>By <span  class="ori_announc_by">
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
                </p-->
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
                <select class="span6" name="addannouncvisibility" id="addannouncvisibility">
                    <option value='' disabled selected class="empty">Announcement Visibility</option>
                    <option value="all">All</option>
                    <option value="tax_office">Tax Office</option>
                    <option value="tax_agent">Tax Agent</option>
                    <option value="admin">Admin Only</option>
                </select>
                <br />
                <span class="btn btn-mini btn-info do_post_announc" >Post</span>

            </div>
        </div>
    <?php } ?>
</div>
<style type="text/css">

    .well-small{
        float:left;
        max-height:250px;
        overflow: auto;
        width: 95%;
    }
    .well-small-row{float:left;border-top: 1px solid #ddd;width:100%; padding:0 0;}
    .well-small-row:first-child{border:none}
    
    .empty{color:gray !important}
    #addannouncvisibility{color:gray} 
    #addannouncvisibility option{color:black}
</style>
<script  type="text/javascript" >

    $(document).ready(function(){
        flg_apm.setAnnouncement.initClicks();
        $('.addannouncment').hide();
        $('.do_hide_addannouncment').hide();
        
        $('#addannouncvisibility').change(function(){
            $(this).css("color", "black");
            if( !$(this).data('removedPlaceHolder'))
            {
               $(this).find('option:first').remove();
               $(this).data('removedPlaceHolder', true);
            }
        });

    });


    flg_apm.setAnnouncement=function(){
    }
    flg_apm.setAnnouncement.username="<?php echo $current_user->data->display_name; ?>";
    flg_apm.setAnnouncement.initClicks=function(){
        $('.do_post_announc').off('click').on('click',function(){
            var vt=$('#addannounctitle').val();
            var vc=$('#addannounc').val();
            var vv=$('#addannouncvisibility').val();
            if(vt!=='' && vc!=='' && vv!==null){

                flg_apm.setAlertPanel.addAlert('Posting','Posting the Announcement, please wait...','',3000);
                $.ajax({
                    url: ajaxurl ,
                    type: "POST",
                    data: "subaction=saveAnnouncement&action=apm_extensions&args="+$.JSON.encode({
                        title:vt,
                        content:vc,
                        visibility:vv
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
