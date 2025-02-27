<script>
    Vue.component('success-msg-component', {
        data () {
            return {
                
            }
        },
        methods: {
            closeModal() {
                this.closeaction();
            },
            action() {
                this.btnaction();
            }
        },
        props: ['show','msg','closeaction','btnmsg','btnaction'],
        template: `
            <div class="successMsg" v-if="show">
                <div class="contentBlock" >
                    <span class="btnClose" v-if="closeaction" v-on:click="closeModal"><i class="fa fa-times"></i></span>
                    <i class="fa fa-check-circle"></i>
                    <p v-if="msg">{{msg}}</p>
                    <div class="btnBlock" v-if="btnaction" v-on:click="action">
                        <button class="btn btn-primary btn-lg">{{btnmsg}}</button>
                    </div>
                </div>
            </div>
        `
    })
</script>