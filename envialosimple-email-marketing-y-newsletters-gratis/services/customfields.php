<script>
    class ESPluginCustomfieldsService {
        getAll(data) {
            return new Promise((resolve, reject) => {
                axios.get(
                    '<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/customfields/getall",true); ?>'+'page='+data.page+
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
    }
</script>