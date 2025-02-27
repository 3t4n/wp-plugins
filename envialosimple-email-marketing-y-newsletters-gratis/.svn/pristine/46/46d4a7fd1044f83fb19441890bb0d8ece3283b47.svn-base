<?php global $lang; ?>
<script>
    var app = new Vue({
        el: '#maillistsCreate',
        data () {
            return {
                urlMailLists: 'admin.php?page=es-plugin-maillists',
                urlMailListsEdit: 'admin.php?page=es-plugin-maillists-edit&id=',
                showToast: false,
                msgToast: '',
                loading:false,
                formData: {
                    name:''
                },
                list_id: null,

                timer:null,
                
                showSuccess:false,
                msgSuccess: ''
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
                this.listsService.create(this.formData).then(response => {
                    let dataList = response.data.data;
                    this.loading = false;

                    //show msg
                    this.showSuccess = true;
                    this.msgSuccess = 'La lista se creó con éxito.';
                    this.list_id = dataList.id;
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

            //modalSuccess
            hideModalSuccess() {
                this.showSuccess = false;
                this.msgSuccess = '';
                
                window.location.replace(this.urlMailListsEdit+this.list_id);
            },
            actionBtnModalSuccess() {
                window.location.replace(this.urlMailLists);
            }
        },
        mounted () {
            this.listsService = new ESPluginListsService();
            this.msgsService = new ESPluginMsgsService();
        }
    })
</script>