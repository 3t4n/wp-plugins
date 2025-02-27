<?php global $lang; ?>
<div class="wrap es-page">
    <div id="es-contactform7-list">
        <div v-if="!notfound">
            <div class="btnBackBlock">
                <a href="<?php menu_page_url('es-plugin-contactform7'); ?>" class="btn btn-link"><i class="fa fa-chevron-left" aria-hidden="true"></i> <?php echo esc_html($lang['globals']['back_list']); ?></a>
            </div>
            <div class="row" v-if="form">
                <div class="col-md-6">
                    <h1 class=""><?php echo esc_html($lang['pages']['contactForm7']['title_edit']); ?> - {{form.title}}</h1>
                    <p><?php echo esc_html($lang['pages']['contactForm7']['subtitle']); ?></p>
                    <p><?php echo esc_html($lang['pages']['contactForm7']['subtitle2']); ?><a target="_blank" href="<?php echo esc_html($lang['pages']['contactForm7']['subtitle2_link']); ?>"><?php echo esc_html($lang['pages']['contactForm7']['subtitle2_link_text']); ?></a></p>
                    <div class="formListsBlock mt20" v-if="form">

                        <div class="" v-if="formSelected">
                            <div class="form-group mb40" >
                                <label><strong><?php echo esc_html($lang['pages']['contactForm7']['labels']['maillist']); ?></strong></label>
                                <singlelist-maillists-component
                                    v-bind:options="maillists"
                                    v-bind:selected="config.mailList"
                                    v-bind:pagination="paginationMaillist"
                                    v-bind:required="requiredMailList"
                                    :remove="removeMaillist"
                                    :add="addMaillist"
                                    :search="getMaillists"
                                ></singlelist-maillists-component>
                            </div>
                        </div>
                        <div v-if="config.mailList">
                            <p><strong><?php echo esc_html($lang['pages']['contactForm7']['title_fields']); ?></strong></p>
                            <div class="row">
                                <div class="col">
                                    <label class="mb10"><?php echo esc_html($lang['pages']['contactForm7']['labels']['fields_contactForm']); ?></label>
                                </div>
                                <div class="col-auto">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="col">
                                    <label class="mb10"><?php echo esc_html($lang['pages']['contactForm7']['labels']['fields_customField']); ?></label>
                                </div>
                            </div>
                            <div class="row" v-if="field.name" v-for="(field, index) in contactFormFields">
                                <div class="col">
                                    <div  class="form-group mb20" >
                                        <p class="form-control">{{field.name}}</p>
                                    </div>
                                </div>
                                <div class="col-auto mt5">
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </div>
                                <div class="col">
                                    <div class="form-group mb20">
                                        <select class="form-control" v-model="config.associatedFields[field.name]" >
                                            <option value=""></option>
                                            <option value="emailbase" v-if="ifUsedEmail(field)">Email</option>
                                            <option :value="customField.id" v-for="customField in customFields" v-if="ifUsed(customField,field.name)">{{customField.name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="mt-3 btnSubmit" v-if="formSelected">
                <button class="btn btn-primary" v-on:click="setConfig">GUARDAR</button>
            </div>
        </div>
        
        <notfound-component v-bind:show="notfound" v-bind:msg="msgBackList" :action="backList"></notfound-component>
        
        <loading-component v-bind:loading="loading" ></loading-component>
        <toast-component :close="hideToast" v-bind:msg="msgToast" v-bind:show="showToast"></toast-component>
        <success-msg-component v-bind:show="showSuccess" v-bind:msg="msgSuccess" :closeaction="hideModalSuccess" btnmsg="Volver al listado" :btnaction="actionBtnModalSuccess"></success-msg-component>
    </div>

</div>
