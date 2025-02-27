<script>
    var app = new Vue({
        el: '#mailListsLists',
        data () {
            return {
                urlEdit: 'admin.php?page=es-plugin-maillists-edit&id=',
                urlManage: 'admin.php?page=es-plugin-contacts&maillist=',
                mailLists: null,
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

                timer:null
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
                    let result = await this.listsService.getAll(this);
                    let data = result.data.data;
                    this.mailLists = data.data;
                    this.pagination = data.links;
                } catch (error) {
                    let data = error.response;
                    let msg = this.msgsService.getHtmlMgs(data.data.code);
                    let title = this.msgsService.getMsg('generic_title_error_fields');
                    this.showMsgToast(title,msg);
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
                let textConfirm = this.msgsService.getMsg('mailList_modal_confirm_delete');
                this.textConfirm = '¿'+textConfirm+' "'+this.selected.name+'"'+'?';
            },
            mainAction(data) {
                this.loading = true;
                window.location.replace(this.urlManage+data.id);
            },
            hideModal() {
                this.selected = null;
            },
            deleteContact() {
                this.loading = true;
                this.listsService.delete(this.selected.id).then((result)=> {
                    this.getData();
                    let msg = this.msgsService.getMsg('mailList_delete_ok');
                    let title = '';
                    this.showMsgToast(title,msg);
                }).catch((error) => {
                    console.log(error);
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
                if(date !== null) {
                    let nDate = new Date(date);
                    if(!isNaN(nDate.getDate())) {
                        return ('0' + nDate.getDate()).slice(-2) + '/'
                            + ('0' + (nDate.getMonth()+1)).slice(-2) + '/'
                            + nDate.getFullYear() +" "
                            + ('0' +nDate.getHours()).slice(-2) + ":"
                            + ('0' +nDate.getMinutes()).slice(-2);
                    }
                }
                
                return '-';
            },
        },
        mounted () {
            this.msgsService = new ESPluginMsgsService();
            this.listsService = new ESPluginListsService();
            this.getData();
        }
    })
</script>