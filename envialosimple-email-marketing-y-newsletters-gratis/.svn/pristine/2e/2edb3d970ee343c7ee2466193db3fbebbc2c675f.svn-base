<?php global $lang; ?>
<div class="wrap es-page">
    <div id="campaignCreate">
        <div class="btnBackBlock">
            <a href="<?php menu_page_url('es-plugin-campaigns'); ?>" class="btn btn-link"><i class="fa fa-chevron-left" aria-hidden="true"></i> <?php echo esc_html($lang['globals']['back_list']); ?></a>
        </div>
        <h1><?php echo esc_html($lang['pages']['campaign_create_edit']['title_create']); ?></h1>
        <form @submit.prevent='submitForm'>
            <div class="form-group mb30">
                <label class="form-label" ><?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['name']); ?></label>
                <input name="name" type="text" ref="nameBlock" class=" form-control" v-model="form.name" />
                <label><small class="text-muted"><?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['name_sub']); ?></small></label>
            </div>
            <div class="row columnsBlock">
                <div class="col-md-6">
                    <div class="mb20">
                        <h6><?php echo esc_html($lang['pages']['campaign_create_edit']['title_general']); ?></h6>
                        <div class="form-group">
                            <label class="form-label" ><?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['subject']); ?></label>
                            <input  type="text" ref="subjectBlock" v-model="form.subject" class=" form-control"  />
                        </div>
                        <div class="form-group">
                            <label class="form-label" ><?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['text_preview']); ?></label>
                            <input  type="text" ref="previewTextBlock" v-model="form.previewText" class=" form-control"  />
                            <label>
                                <small class="text-muted"><?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['sub_text_preview']); ?></small>
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb20">
                        <h6><?php echo esc_html($lang['pages']['campaign_create_edit']['title_from']); ?></h6>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" ><?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['from_alias']); ?></label>
                                    <input  type="text" ref="fromAliasBlock" v-model="form.fromAlias" name="fromAlias" class=" form-control"  />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" ><?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['from_email']); ?></label>
                                    <input  type="text" ref="fromEmailBlock" v-model="form.fromEmail" name="fromEmail" placeholder="<?php echo esc_html($lang['pages']['campaign_create_edit']['placeholder_example_email']); ?>"  class=" form-control"  />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" ><?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['reply_email']); ?></label>
                            <input type="text" ref="replyEmailBlock" v-model="form.replyEmail" name="replyEmail" placeholder="<?php echo esc_html($lang['pages']['campaign_create_edit']['placeholder_example_email']); ?>"  class=" form-control"  />
                        </div>
                    </div>

                    <div class="mb20">
                        <h6><?php echo esc_html($lang['pages']['campaign_create_edit']['title_maillist']); ?></h6>
                        <div class="mb10">
                            <label class="mb10 ">
                                <input type="radio" @change="changeTypeList" v-model="type_list" value="maillist" name="type_list" />
                                <?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['maillists']); ?>
                            </label>
                            <label class="mb10 ml15">
                                <input type="radio" @change="changeTypeList" v-model="type_list" value="segment" name="type_list" />
                                <?php echo esc_html($lang['pages']['campaign_create_edit']['fields']['segment']); ?>
                            </label>
                        </div>
                        <div class="form-group">
                            <duallist-maillists-component
                                v-if="type_list == 'maillist'"
                                v-bind:options="mailListsOptions"
                                v-bind:selected="mailListsSelected"
                                v-bind:pagination="paginationMailList"
                                :add="addMaillist"
                                :remove="removeMaillist"
                                :search="getMailLists"
                                :nextpage="nextPageMailList"
                                :prevpage="prevPageMailList"
                                :addall="addAllMailList"
                                :removeall="removeAllMailList"
                            ></duallist-maillists-component>
                            <singlelist-segments-component 
                                v-if="type_list == 'segment'"
                                v-bind:options="segments"
                                v-bind:selected="segmentSelected"
                                v-bind:pagination="paginationSegment"
                                :remove="removeSegment"
                                :add="addSegment"
                                :search="getSegments"
                            ></singlelist-segments-component>
                        </div>
                    </div>
                    
                    <div class="accordion mb20" id="accordionExample">
                        <div class="accordion-item">
                            <input class="d-none" type="checkbox" id="openColapse1" name="openColapse1" />
                            <h2 class="accordion-header" >
                                <label for="openColapse1" class="accordion-button" type="button" >
                                    <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['title']); ?>
                                </label>
                            </h2>
                            <div class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="row mb25">
                                        <div class="col col-auto">
                                            <input type="checkbox" v-model="form.trackLinkClicks"  name="trackLinkClicks" />
                                        </div>
                                        <div class="col pl0">
                                            <div class="label">
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][0]['title']); ?>
                                            </div>
                                            <p>
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][0]['text']); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb25">
                                        <div class="col col-auto">
                                            <input type="checkbox" v-model="form.trackReads" name="trackReads" />
                                        </div>
                                        <div class="col pl0">
                                            <div class="label">
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][1]['title']); ?>
                                            </div>
                                            <p>
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][1]['text']); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb25">
                                        <div class="col col-auto">
                                            <input type="checkbox" v-model="form.trackAnalitics" name="trackAnalitics" />
                                        </div>
                                        <div class="col pl0">
                                            <div class="label">
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][2]['title']); ?>
                                            </div>
                                            <p>
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][2]['text']); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb25">
                                        <div class="col col-auto">
                                            <input type="checkbox" v-model="form.sendReport" name="sendReport" />
                                        </div>
                                        <div class="col pl0">
                                            <div class="label">
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][3]['title']); ?>
                                            </div>
                                            <p>
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][3]['text']); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb25">
                                        <div class="col col-auto">
                                            <input type="checkbox" v-model="form.publicArchive" name="publicArchive" />
                                        </div>
                                        <div class="col pl0">
                                            <div class="label">
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][4]['title']); ?>
                                            </div>
                                            <p>
                                                <?php echo esc_html($lang['pages']['campaign_create_edit']['advances_options']['options'][4]['text']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 rightBlock">
                    <div  class="emptyContent" v-if="!form.content">
                        <h6><?php echo esc_html($lang['pages']['campaign_create_edit']['title_content']); ?></h6>
                        <p class="mb30"><?php echo esc_html($lang['pages']['campaign_create_edit']['content_text']); ?></p>
                        <p class="btnBlock">
                            <span class="btn btn-primary" v-on:click="showModalContent()"><?php echo esc_html($lang['pages']['campaign_create_edit']['content_btn']); ?></span>
                        </p>
                    </div>
                    <div class="contentBlock" v-bind:class="{ 'd-none': !form.content}">
                        <div class="topBlock">
                            <h6><?php echo esc_html($lang['pages']['campaign_create_edit']['title_content']); ?></h6>
                            <div class="mb20">
                                <div class="contentActionsBlock" >
                                    <span class="delete" v-on:click="showRemoveContent">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        <span>Eliminar</span>
                                    </span>
                                    <span class="edit" v-on:click="showModalContent">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <span>Editar</span>
                                    </span>
                                    <span class="edit disabled" v-on:click="errorNeedSave">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <span>Probar email</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="iframeBlock">
                            <iframe id="iframePreview" class="w100" ref="iframeContent" ></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btnSubmit">
                <button type="submit" class="btn btn-outline-primary mr10">GUARDAR</button>
            </div>
        </form>
        <div class="deleteContent">
            <success-msg-component v-bind:show="showDetele" v-bind:msg="msgDeleteContent" :closeaction="hideRemoveContent" btnmsg="Eliminar" :btnaction="removeContent"></success-msg-component>
        </div>
        <loading-component v-bind:loading="loading" ></loading-component>
        <toast-component :close="hideToast" v-bind:msg="msgToast" v-bind:show="showToast"></toast-component>
        <modal-campaign-content-component :save="saveContent" :cancel="hideModalContent" v-bind:show="showContent" v-bind:newcontent="newContent"></modal-campaign-content-component>
        <success-msg-component v-bind:show="showSuccess" v-bind:msg="msgSuccess" :closeaction="hideModalSuccess" :btnaction="actionBtnModalSuccess" btnmsg="Volver al listado" ></success-msg-component>
    </div>
</div>