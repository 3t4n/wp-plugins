<?php global $lang; ?>
<div class="wrap es-page">
    <div id="contactFormLists">
        <example-form-7-component></example-form-7-component>
        <h1 class="clearfix">
            <?php echo esc_html($lang['pages']['contactForm7']['title']); ?>
            <a href="<?php menu_page_url('es-plugin-contactform7-create'); ?>" class="btn btn-primary fright"><?php echo esc_html($lang['pages']['contactForm7']['btns']['create']); ?></a>
        </h1>
        <div >
            <div class="row mb20 filterBlock">
                <div class="col textFilter">
                    <label class="mb3"><?php echo esc_html($lang['pages']['contactForm7']['filter_name']); ?></label>
                    <div class="inputFilter">
                        <input type="search" v-model="filter" @change="filterData" v-on:keyup.enter="filterData" class="form-control" placeholder=""/>
                    </div>
                </div>
                <div class="col-auto orderFilter">
                    <label class="mb3"><?php echo esc_html($lang['globals']['orderBy']); ?>:</label>
                    <div class="row">
                        <div class="col pr1">
                            <select class="form-control" v-model="orderby" @change="filterData">
                                <option value="contactFormId"><?php echo esc_html($lang['globals']['id']); ?></option>
                                <option value="contactFormName"><?php echo esc_html($lang['globals']['name']); ?></option>
                            </select>
                        </div>
                        <div class="col col-auto pl1">
                            <select class="form-control" v-model="order" @change="filterData">
                                <option value="ASC"><?php echo esc_html($lang['globals']['asc']); ?></option>
                                <option value="DESC"><?php echo esc_html($lang['globals']['desc']); ?></option>
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
                            <th scope="col"><?php echo esc_html($lang['pages']['contactForm7']['fields_list']['id']); ?></th>
                            <th scope="col"><?php echo esc_html($lang['pages']['contactForm7']['fields_list']['contactForm7']); ?></th>
                            <th scope="col" class="text-center"><?php echo esc_html($lang['pages']['contactForm7']['fields_list']['formES']); ?></th>
                            <th scope="col" class="text-center w1p"><?php echo esc_html($lang['globals']['actions']); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="form in forms">
                            <td scope="row">{{form.contactFormId}}</td>
                            <td>{{form.contactFormName}}</td>
                            <td class="text-center">{{getFormEsName(form.option_value)}}</td>
                            <td class="text-right">
                                <btngroup-edit-delete-component :delete="deleteAction" :main="editAction" v-bind:data="form" title="Editar vinculación"></btngroup-edit-delete-component>
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
                                <li class="page-item" v-bind:class="{ disabled: (pages==0 || page==1) }" v-on:click="prevPage()"><span class="page-link" style="cursor: pointer;">« Anterior</span></li>
                                <li class="page-item" v-for="index in pages" v-on:click="setPage(index)" v-bind:class="{ disabled: page==index }">
                                    <span style="cursor:pointer;" class="page-link" v-on:click="" >{{index}}</span>
                                </li>
                                <li class="page-item" v-bind:class="{ disabled: (pages==0 || page==pages) }" v-on:click="nextPage()"><span class="page-link" style="cursor: pointer;">Siguiente »</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <loading-component v-bind:loading="loading" ></loading-component>
        <modal-confirm-component :accept="deleteForm" :cancel="hideModal" v-bind:show="(selected)?true:false" v-bind:text="textConfirm"></modal-confirm-component>
        <toast-component :close="hideToast" v-bind:title="titleToast" v-bind:msg="msgToast" v-bind:show="showToast"></toast-component>
    </div>

</div>
