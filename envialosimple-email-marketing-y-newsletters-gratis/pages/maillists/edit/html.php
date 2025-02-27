<?php global $lang; ?>
<div class="wrap es-page">
    <div id="maillistsEdit">
        <div v-if="!notfound">
            <div class="btnBackBlock">
                <a href="<?php menu_page_url('es-plugin-maillists'); ?>" class="btn btn-link"><i class="fa fa-chevron-left" aria-hidden="true"></i> <?php echo esc_html($lang['globals']['back_list']); ?></a>
            </div>
            <h1><?php echo esc_html($lang['pages']['maillists']['title_edit']); ?></h1>
            <form @submit.prevent="submitForm">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group mb20">
                            <label class="form-label" for="apikey"><?php echo esc_html($lang['pages']['maillists']['fields']['name']); ?>:</label>
                            <input name="name" ref="nameBlock" type="text" id="name" class="form-control" v-model="formData.name"  >
                        </div>
                        <div class="btnsBlock">
                            <button type="submit" class="btn btn-primary"><?php echo esc_html($lang['globals']['save']); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <notfound-component v-bind:show="notfound" v-bind:msg="msgBackList" :action="backList"></notfound-component>
        
        <loading-component v-bind:loading="loading" ></loading-component>
        <toast-component :close="hideToast" v-bind:msg="msgToast" v-bind:show="showToast"></toast-component>
        <success-msg-component v-bind:show="showSuccess" v-bind:msg="msgSuccess" :closeaction="hideModalSuccess" btnmsg="Volver al listado" :btnaction="actionBtnModalSuccess"></success-msg-component>
    </div>
</div>
