<script>
    Vue.component('toast-component', {
        data () {
            return {

            }
        },
        props: ['show','msg','close','style'],
        template: `
            <div class="toastBlock" v-bind:class="{ show: this.show}">
                <div class="toast show" v-bind:class="[style]">
                    <button type="button" v-on:click="close" class="btn-close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                    <div class="toast-body">
                        <div class="content" v-html="msg"></div>
                    </div>
                </div>
            </div>
        `
    })
</script>