<script>
    class ESPluginListsService {
        getAll(data) {
            return new Promise((resolve, reject) => {
                axios.get(
                    '<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/lists/getall",true); ?>'+'page='+data.page+
                    '&orderby='+data.orderby+
                    '&order='+data.order+
                    '&filterName='+data.filter+
                    '&limit='+data.limit
                ).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        getById(id) {
            return new Promise((resolve, reject) => {
                axios.get('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/lists/getbyid",true); ?>'+'id='+id).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        delete(id) {
            return new Promise((resolve, reject) => {
                axios.get('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/lists/getbdeleteyid",true); ?>'+'id='+id).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        create(data) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/lists/create"); ?>',data).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        edit(data) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/lists/edit"); ?>',data).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
    }
</script>