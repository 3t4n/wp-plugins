<script>
    Vue.component('notfound-component', {
        data () {
            return {
                
            }
        },
        props: ['show','msg','action'],
        template: `
            <div class="block404" v-if="show">
                <div class="row">
                    <div class="col-sm-6 text-end">
                        <div class="d-inline-block text-left">
                            <h1>No es lo que buscabas, ¿no?</h1>
                            <p class="text">Lo sentimos, pero nosotros tampoco pudimos encontrar la página que estás buscando.</p>
                            <p class="errorcode">Error code: 404</p>
                            <div class="btnBlock">
                                <button class="btn btn-outline-primary" v-on:click="action">{{msg}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none d-sm-block">
                        <img src="<?php echo ES_PLUGIN_URL_BASE.'/assets/img/404.svg'; ?>" />
                    </div>
                </div>
            </div>
        `
    })
</script>