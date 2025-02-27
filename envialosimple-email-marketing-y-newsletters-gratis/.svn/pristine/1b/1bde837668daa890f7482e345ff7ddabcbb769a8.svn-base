<?php global $lang; ?>
<div class="wrap es-page">
    <div id="campaignsLists">
        <h1 class="clearfix">
            <?php echo esc_html($lang['pages']['campaigns']['title']); ?>
            <a href="<?php menu_page_url('es-plugin-campaigns-create'); ?>" class="btn btn-primary fright"><?php echo esc_html($lang['pages']['campaigns']['create']); ?></a>
        </h1>
        <div >
            <!-- filter -->
            <div class="row mb10 filterBlock">
                <div class="col-12 mb10 col-md textFilter">
                    <label class="mb3"><?php echo esc_html($lang['pages']['campaigns']['filter_name']); ?></label>
                    <div class="inputFilter">
                        <input type="search" v-model="filterName" @change="filterData" v-on:keyup.enter="filterData" class="form-control" placeholder=""/>
                    </div>
                    
                </div>
                <div class="datePickerBlock mb10 col-auto">
                    <label class="mb3"><?php echo esc_html($lang['pages']['campaigns']['filter_createDateFrom']); ?></label>
                    <vuejs-datepicker placeholder="Desde" clear-button="true" clear-button-icon="fa fa-times" @cleared="filterData" @closed="filterData" format="dd/MM/yyyy" :language="lang_datepicker" input-class="form-control dateInput" v-model="createDateFromDate"></vuejs-datepicker>
                </div>
                <div class="datePickerBlock mb10 col-auto">
                    <label class="mb3"><?php echo esc_html($lang['pages']['campaigns']['filter_createDateTo']); ?></label>
                    <vuejs-datepicker placeholder="Hasta" clear-button="true" clear-button-icon="fa fa-times" @cleared="filterData" @closed="filterData" format="dd/MM/yyyy" :language="lang_datepicker" input-class="form-control dateInput" v-model="createDateToDate"></vuejs-datepicker>
                </div>
                <div class="col-12 mb10 col-md-auto statusFilter">
                    <label class="mb3"><?php echo esc_html($lang['pages']['campaigns']['filter_status']); ?></label>
                    <select v-model="filterStatus" @change="filterData" class="form-control">
                        <option></option>
                        <option v-for="(option, key) in status_options" v-bind:value="key">{{option}}</option>
                    </select>
                </div>
                <div class="col-xs-12 mb10 col-sm-auto orderFilter">
                    <label class="mb3"><?php echo esc_html($lang['globals']['orderBy']); ?>:</label>
                    <div class="row">
                        <div class="col pr1">
                            <select class="form-control" v-model="orderby" @change="getData">
                                <option value="id"><?php echo esc_html($lang['globals']['id']); ?></option>
                                <option value="name"><?php echo esc_html($lang['globals']['name']); ?></option>
                            </select>
                        </div>
                        <div class="col col-auto pl1">
                            <select class="form-control" v-model="order" @change="getData">
                                <option value="asc"><?php echo esc_html($lang['globals']['asc']); ?></option>
                                <option value="desc"><?php echo esc_html($lang['globals']['desc']); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- List -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><?php echo esc_html($lang['pages']['campaigns']['fields']['id']); ?></th>
                            <th scope="col"><?php echo esc_html($lang['pages']['campaigns']['fields']['name']); ?></th>
                            <th scope="col" class="text-center"><?php echo esc_html($lang['pages']['campaigns']['fields']['created']); ?></th>
                            <th scope="col" class="text-center"><?php echo esc_html($lang['pages']['campaigns']['fields']['send_date']); ?></th>
                            <th class="text-center" scope="col"><?php echo esc_html($lang['pages']['campaigns']['fields']['status']); ?></th>
                            <th scope="col" class="text-center w1p"><?php echo esc_html($lang['globals']['actions']); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="campaign in campaigns">
                            <td scope="row">{{campaign.id}}</td>
                            <td>{{renderTitle(campaign.name)}}</td>
                            <td class="text-center">{{getFormatDate(campaign.created)}}</td>
                            <td class="text-center">{{getSendDate(campaign)}}</td>
                            <td class="text-center">{{getStatus(campaign)}}</td>
                            <td class="text-right">
                                <btngroup-edit-delete-component v-if="checkStatusCampaign(campaign)" :main="editAction" v-bind:data="campaign" title="<?php echo esc_html($lang['globals']['edit']); ?>"></btngroup-edit-delete-component>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- pagination -->
            <div class="row paginationBlock">
                <div class="col-lg-auto leftBlock">
                    <div class="text-center mb20">
                        <btngroup-options-component :select="setLimit" v-bind:list="limitList" v-bind:value="limit" icon='<i class="fa fa-list-alt" ></i>&nbsp;&nbsp;'></btngroup-options-component>
                    </div>
                </div>
                <div class="col rightBlock">
                    <div class="paginationEs">
                        <nav>
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item" v-bind:class="{ disabled: link.url==null, active: link.active }"  v-for="link in pagination">
                                    <span style="cursor:pointer;" class="page-link" v-on:click="setParameters(link.url)" v-bind:href="link.url" v-html="link.label"></span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <loading-component v-bind:loading="loading" ></loading-component>
        <modal-confirm-component :accept="deleteContact" :cancel="hideModal" v-bind:show="(this.selected)?true:false" v-bind:text="this.textConfirm"></modal-confirm-component>
        <toast-component :close="hideToast" v-bind:title="titleToast" v-bind:msg="msgToast" v-bind:show="showToast"></toast-component>
    </div>
</div>