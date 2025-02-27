<?php global $lang; ?>
<div class="wrap es-page">
    <div id="mailListsLists">
        <h1 class="clearfix">
            <?php echo esc_html($lang['pages']['mailLists']['title']); ?>
            <a href="<?php menu_page_url('es-plugin-maillists-create'); ?>" class="btn btn-primary fright"><?php echo esc_html($lang['pages']['mailLists']['create']); ?></a>
        </h1>
        <div id="contactsLists">
            <div class="row mb20 filterBlock">
                <div class="col textFilter">
                    <label class="mb3"><?php echo esc_html($lang['pages']['mailLists']['filter_name']); ?></label>
                    <div class="inputFilter">
                        <input type="search" v-model="filter" @change="filterData" v-on:keyup.enter="filterData" class="form-control" placeholder=""/>
                    </div>
                </div>
                <div class="col-auto orderFilter">
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
                            <th scope="col"><?php echo esc_html($lang['pages']['mailLists']['fields']['id']); ?></th>
                            <th scope="col"><?php echo esc_html($lang['pages']['mailLists']['fields']['name']); ?></th>
                            <th scope="col" class="text-center"><?php echo esc_html($lang['pages']['mailLists']['fields']['count']); ?></th>
                            <th class="text-center" scope="col"><?php echo esc_html($lang['pages']['mailLists']['fields']['lastSend']); ?></th>
                            <th scope="col" class="text-center w1p"><?php echo esc_html($lang['globals']['actions']); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="mailList in mailLists">
                            <td >{{mailList.id}}</td>
                            <td>{{mailList.name}}</td>
                            <td class="text-center">{{mailList.count}}</td>
                            <td class="text-center">{{getFormatDate(mailList.lastSend)}}</td>
                            <td class="text-right">
                                <btngroup-edit-delete-component :edit="editAction" :main="mainAction" v-bind:data="mailList" title="<?php echo esc_html($lang['globals']['manage']); ?>"></btngroup-edit-delete-component>
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
