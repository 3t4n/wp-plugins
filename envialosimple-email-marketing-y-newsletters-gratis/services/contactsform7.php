<script>
    
    class ESPluginContactsform7Service {
        getForms() {
            return new Promise((resolve, reject) => {
                
                axios.get('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contactsform7/getForms"); ?>').then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        getFormById(data) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contactsform7/getFormById"); ?>',data).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        getFieldsById(id) {
            return new Promise((resolve, reject) => {
                axios.get('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contactsform7/getFieldsById",true); ?>'+'id='+id).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        getConfig(formSelected) {
            return new Promise((resolve, reject) => {
                axios.get('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contactsform7/getConfig",true); ?>'+'id='+formSelected).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        setConfig(formSelected,values) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contactsform7/setConfig"); ?>',{
                    id: formSelected,
                    value: values
                }).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        getAllConfigs(data) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contactsform7/getAllConfigs"); ?>',data).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
        deleteById(id) {
            return new Promise((resolve, reject) => {
                axios.post('<?php  echo es_plugin_get_url_rest_api("envialosimple/v1/contactsform7/deletebyid"); ?>',{id:id}).then(response => {
                    resolve(response);
                }).catch((error) => {
                    reject(error);
                });
            });
        };
    }
</script>
