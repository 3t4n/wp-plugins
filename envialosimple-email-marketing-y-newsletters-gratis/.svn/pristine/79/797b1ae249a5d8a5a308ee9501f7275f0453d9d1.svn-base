<?php global $lang; ?>
<div class="wrap es-page">
    <div id="contactsEdit">
        <div v-if="!notfound">
            <div class="btnBackBlock">
                <a href="<?php menu_page_url('es-plugin-contacts'); ?>" class="btn btn-link"><i class="fa fa-chevron-left" aria-hidden="true"></i> Volver al listado</a>
            </div>
            <h1><?php echo esc_html($lang['pages']['contacts']['title_edit']); ?></h1>
            <form @submit.prevent="submitForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="p15 mb20">
                            <h6 class="mb20"><?php echo esc_html($lang['pages']['contacts']['title_data']); ?></h6>
                            <div class="form-group" v-if="contactData">
                                <p class="mb10">
                                    <?php echo esc_html($lang['pages']['contacts']['fields']['email']); ?>: <strong>{{contactData.email}}</strong>
                                </p>
                                <p class="mb10">
                                    <?php echo esc_html($lang['pages']['contacts']['create_date']); ?>: <strong>{{getFormatedDate(contactData.created)}}</strong>
                                </p>
                                <p>
                                    <?php echo esc_html($lang['pages']['contacts']['list_maillists']); ?><br/>
                                    <strong>{{mailListsSelected}}</strong>
                                </p>
                            </div>
                        </div>
                        <div class="mb20">
                            <h6 class="mb20"><?php echo esc_html($lang['pages']['contacts']['title_customFields']); ?></h6>
                            <div v-for="customfield in customfields" class="form-group">
                                <label class="form-label"  :for="'customFields'+customfield.id">{{customfield.name}} <span class="optional"><?php echo esc_html($lang['pages']['contacts']['fields']['optional']); ?></span></label>
                                <div v-if="customfield.type == 'Text field' || customfield.type == 'Hidden field'">
                                    <input  :ref="'customFieldsBlock'+customfield.id" type="text" :id="'customFieldsBlock'+customfield.id" class=" form-control"  v-model="customFieldsValues[customfield.id]" />
                                </div>
                                <div v-if="customfield.type == 'Check box'" :id="'customFieldsBlock'+customfield.id" :ref="'customFieldsBlock'+customfield.id">
                                    <label class="d-block mb10" v-for="(value, index) in getValuesFields(customfield)">
                                        <input type="checkbox" :id="'customFieldsBlock'+customfield.id+index" :value="value" v-model="customFieldsValues[customfield.id]" />
                                        {{value}}
                                    </label>
                                </div>
                                <div v-if="customfield.type == 'Radio button'" :id="'customFieldsBlock'+customfield.id" :ref="'customFieldsBlock'+customfield.id">
                                    <label class="d-block mb10" v-for="(value, index) in getValuesFields(customfield)">
                                        <input type="radio" :name="'customFieldsBlock'+customfield.id" :id="'customFieldsBlock'+customfield.id+index" :value="value" v-model="customFieldsValues[customfield.id]" />
                                        {{value}}
                                    </label>
                                </div>
                                <div v-if="customfield.type == 'Drop list'" >
                                    <select class="form-control mw100i" :id="'customFieldsBlock'+customfield.id" v-model="customFieldsValues[customfield.id]" :ref="'customFieldsBlock'+customfield.id">
                                        <option value=""><?php echo esc_html($lang['pages']['contacts']['fields']['select_option']); ?></option>
                                        <option v-for="(value, index) in getValuesFields(customfield)" :value="value" >{{value}}</option>
                                    </select>
                                </div>
                                <div v-if="customfield.type == 'Anual Date'" >
                                    <div class="row fieldDate" :id="'customFieldsBlock'+customfield.id" :ref="'customFieldsBlock'+customfield.id">
                                        <div class="col-sm-6">
                                            <label><?php echo esc_html($lang['pages']['contacts']['fields']['month']); ?></label>
                                            <select class="form-control mw100i"  v-model="customFieldsValues[customfield.id][0]" >
                                                <option value=""></option>
                                                <?php foreach($lang['pages']['contacts']['fields']['months'] as $key => $month): ?>
                                                    <option value="<?php echo esc_html($key+1); ?>"><?php echo esc_html($month); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label><?php echo esc_html($lang['pages']['contacts']['fields']['day']); ?></label>
                                            <input class="form-control" maxlength="2" type="text" v-model="customFieldsValues[customfield.id][1]" v-on:keypress="isNumber($event)"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb20" v-if="contactData">
                            <h6 class="mb20"><?php echo esc_html($lang['pages']['contacts']['title_resume']); ?></h6>
                            <ul class="listDataContact">
                                <li><span>Aperturas totales:</span> <strong>{{contactData.reads}}</strong></li>
                                <li><span>Clicks totales:</span> <strong>{{contactData.clicks}}</strong></li>
                                <li><span>Rebotes duros:</span> <strong>{{contactData.hardBounce}}</strong></li>
                                <li><span>Rebotes blandos:</span> <strong>{{contactData.softBounce}}</strong></li>
                                <li><span>Compartidos:</span> <strong>{{contactData.shared}}</strong></li>
                                <li><span>Desuscripciones:</span> <strong>{{contactData.unsubscription}}</strong></li>
                                <li><span>Quejas:</span> <strong>{{contactData.complaint}}</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="btnSubmit">
                    <button type="submit" class="btn btn-primary"><?php echo esc_html($lang['globals']['save']); ?></button>
                </div>
            </form>
        </div>

        <notfound-component v-bind:show="notfound" v-bind:msg="msgBackList" :action="backList"></notfound-component>

        <loading-component v-bind:loading="loading" ></loading-component>
        <toast-component :close="hideToast" v-bind:msg="msgToast" v-bind:show="showToast"></toast-component>
        <success-msg-component v-bind:show="showSuccess" v-bind:msg="msgSuccess" :closeaction="hideModalSuccess" btnmsg="Volver al listado" :btnaction="actionBtnModalSuccess"></success-msg-component>
    </div>
</div>
