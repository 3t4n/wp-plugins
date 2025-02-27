<script>
    var app = new Vue({
        el: '#contactsLists',
        data () {
            return {
                urlEdit: 'admin.php?page=es-plugin-contacts-edit&id=',
                urlContacts: 'admin.php?page=es-plugin-contacts',
                urlMailLists: 'admin.php?page=es-plugin-maillists',
                contacts: null,
                maillist:null,
                maillistData:null,
                pagination: null,
                page:1,
                order:'desc',
                orderby:'id',
                loading:false,
                filter: '',
                timer: null,
                limit:10,
                showToast: false,
                msgToast: '',
                titleToast: '',
                selected:null,
                textConfirm: '',
                limitList: {
                    '10':10,
                    '25':25,
                    '50':50,
                    '100':100
                },

                timer: null,

                //not found
                notfound:false,
                msgBackList:'Volver a listas de contactos'
            }
        },
        methods: {
            filterData: function() {
                this.page = 1;
                this.getData();
            },
            setParameters: function(linkurl) {
                var url = new URL(linkurl);
                this.page = (url.searchParams.get("page"))?url.searchParams.get("page"):1;
                this.getData();
            },
            getData: async function() {
                this.loading = true;
                try {
                    if(this.$refs.maillist) {
                        this.maillist = this.$refs.maillist.value;
                        let maillistData = await this.listsService.getById(this.maillist);
                        this.maillistData = maillistData.data.data;
                    }
                    let result = await this.contactsService.getAll(this);
                    let data = result.data.data;
                    this.contacts = data.data;
                    this.pagination = data.links;
                } catch (error) {
                    let data = error.response;
                    if(data.data.code == 'errorMsg_contactListNotFound') {
                        this.notfound = true;
                    } else {
                        let msg = this.msgsService.getHtmlMgs(data.data.code);
                        let title = this.msgsService.getMsg('generic_title_error_fields');
                        this.showMsgToast(title,msg);
                    }
                    
                }
                this.loading = false;
            },
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
            editAction(data) {
                this.loading = true;
                window.location.replace(this.urlEdit+data.id);
            },
            deleteAction(contact) {
                this.selected = contact;
                let textConfirm = this.msgsService.getMsg('contacts_modal_confirm_delete');
                this.textConfirm = '¿'+textConfirm+' "'+this.selected.email+'"'+'?';
            },
            hideModal() {
                this.selected = null;
            },
            deleteContact() {
                this.loading = true;
                this.contactsService.deleteOne(this.selected.id).then((result)=> {
                    this.getData();
                    let msg = this.msgsService.getMsg('contacts_delete_ok');
                    let title = '';
                    this.showMsgToast(title,msg);
                }).catch((error) => {
                    
                }).then(() => {
                    this.hideModal();
                    this.loading = false;
                });
            },
            setLimit: function(value) {
                this.limit = value;
                this.page = 1;
                this.getData();
            },
            getFormatDate: function (date) {
                let nDate = new Date(date);
                if(date !== null && !isNaN(nDate.getDate())) {
                    return ('0' + nDate.getDate()).slice(-2) + '/'
                        + ('0' + (nDate.getMonth()+1)).slice(-2) + '/'
                        + nDate.getFullYear() +" "
                        + ('0' +nDate.getHours()).slice(-2) + ":"
                        + ('0' +nDate.getMinutes()).slice(-2);
                } else {
                    return '-';
                }
            },
            redirectToContacts: function() {
                window.location.replace(this.urlContacts);
            },

            //not found action
            backList() {
                window.location.replace(this.urlMailLists);
            }
        },
        mounted () {
            this.msgsService = new ESPluginMsgsService();
            this.contactsService = new ESPluginContactsService();
            this.listsService = new ESPluginListsService();
            this.getData();
        }
    })
</script>