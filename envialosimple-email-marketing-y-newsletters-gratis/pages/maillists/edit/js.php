<?php global $lang; ?>
<script>
    var app = new Vue({
        el: '#maillistsEdit',
        data () {
            return {
                urlMailLists: 'admin.php?page=es-plugin-maillists',
                showToast: false,
                msgToast: '',
                loading:false,
                formData: {
                    id:null,
                    name:''
                },

                timer:null,

                showSuccess:false,
                msgSuccess: '',

                //not found
                notfound:false,
                msgBackList:'Volver al listado'
            }
        },
        methods : {
            hideToast: function() {
                this.showToast = '';
                window.clearTimeout(this.timer);
            },
            showMsgToast: function(msg) {
                this.msgToast = msg;
                this.showToast = true;
                this.timer = window.setTimeout(() => {
                    this.hideToast();
                },5000);
            },
            submitForm: function() {
                this.msgsService.hideErrorsForm(this.$refs);
                this.loading = true;
                this.listsService.edit(this.formData).then(response => {
                    this.loading = false;

                    //show msg
                    this.showSuccess = true;
                    this.msgSuccess = 'La lista se editó con éxito.';
                }).catch((error) => {
                    this.loading = false;
                    let response = error.response;
                    if(response.status == '422') {
                        this.msgsService.showErrorsForm(response.data.code,this.$refs);
                        this.showMsgToast('<?php echo esc_html($lang['globals']['error_form']); ?>');
                    } else {
                        this.showMsgToast(this.msgsService.getHtmlMgs(response.data.code));
                    }
                });
            },
            //get data
            getContactData() {
                this.loading = true;
                let urlParams = new URLSearchParams(window.location.search);
                this.idMailList = urlParams.get('id');

                this.listsService.getById(this.idMailList).then((result)=> {
                    let dataContact = result.data.data;
                    this.formData.id = this.idMailList;
                    this.formData.name = dataContact.name;
                    this.contactData = dataContact;                    
                }).catch((error) => {
                    this.notfound = true;
                }).then(() => {
                    this.loading = false;
                });
            },

            //modalSuccess
            hideModalSuccess() {
                this.showSuccess = false;
                this.msgSuccess = '';
            },
            actionBtnModalSuccess() {
                window.location.replace(this.urlMailLists);
            },

            //not found action
            backList() {
                window.location.replace(this.urlMailLists);
            }
        },
        mounted () {
            this.listsService = new ESPluginListsService();
            this.msgsService = new ESPluginMsgsService();

            this.getContactData();
        }
    })
</script>