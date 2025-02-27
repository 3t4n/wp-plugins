<?php global $lang; ?>
<script>
    var app = new Vue({
        el: '#contactFormLists',
        data () {
            return {
                urlEdit: 'admin.php?page=es-plugin-contactform7-edit&id=',
                forms: null,

                //filter
                order:'DESC',
                orderby:'contactFormId',
                filter: '',
                countForm: null,
                pages: 0,
                page:1,
                limit: 10,
                limitList: {
                    '10':10,
                    '25':25,
                    '50':50,
                    '100':100
                },
                
                //toast
                showToast: false,
                msgToast: '',
                loading:false,
                titleToast: '',

                timer:null,
                selected:null,
                textConfirm:null
            }
        },
        methods: {
            //get all form contactform 7
            getData: function(data) {
                this.loading = true;
                this.contactsform7Service.getAllConfigs(data).then((response)=> {
                    this.forms = response.data.forms;
                    this.setPagination(response.data.count);
                }).catch((error) => {
                    console.log('getForms - error:',error);
                }).then(() => {
                    this.loading = false;
                });
            },
            getFormEsName(data) {
                let allData = JSON.parse(data);
                if(allData.mailList && allData.mailList.name) {
                    return allData.mailList.name;
                } else {
                    return '';
                }
                
            },
            filterData() {
                let data = {
                    filter: this.filter,
                    order: this.order,
                    orderby: this.orderby,
                    limit:this.limit,
                    page:this.page
                }

                this.getData(data);
            },
            setLimit(limit) {
                this.limit = limit;
                this.page = 1;
                this.setPagination();
                this.filterData();
            },

            //pagination
            setPagination(count = null) {
                if(count) {
                    this.countForm = count;
                }
                this.pages = Math.ceil(this.countForm / this.limit);
            },
            prevPage() {
                this.page--;
                this.filterData();
            },
            nextPage() {
                this.page++;
                this.filterData();
            },
            setPage(page) {
                this.page = page;
                this.filterData();
            },

            //toast
            hideToast: function() {
                this.showToast = '';
                window.clearTimeout(this.timer);
            },
            showMsgToast(title,msg) {
                this.titleToast = title;
                this.msgToast = msg;
                this.showToast = true;
                this.timer = window.setTimeout(() => {
                    this.hideToast();
                },5000);
            },

            //actions
            editAction(data) {
                window.location.replace(this.urlEdit+data.contactFormId);
            },
            deleteAction(data) {
                this.selected = data;
                let textConfirm = this.msgsService.getMsg('forms_modal_confirm_delete');
                this.textConfirm = '¿'+textConfirm+' "'+this.selected.contactFormName+'"'+'?';
            },

            //modalDeleteActions
            deleteForm() {
                this.loading = true;
                this.contactsform7Service.deleteById(this.selected.contactFormId).then((response) => {
                    this.filterData();
                }).catch((error) => {
                    this.loading = false;
                });
                this.hideModal();
            },
            hideModal() {
                this.selected = null;
            }
        },
        mounted () {
            this.contactsform7Service = new ESPluginContactsform7Service();
            this.msgsService = new ESPluginMsgsService();

            this.getData();
        }
    })
</script>