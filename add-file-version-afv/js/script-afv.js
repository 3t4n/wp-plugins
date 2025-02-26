//jQuery
var $ = jQuery;

//Vex
vex.defaultOptions.className = 'vex-theme-os';

//console.log(wpHomeUrl);



//Vue instance
var afvVueVm = new Vue({
    el: '#afv',


    mounted: function () {
        console.log("mounted()");
        this.initData();
    },


    methods: {
        initData: function (data) {
            console.log("initData()");
            
            this.afvGetInitData();

        }, //end of initData()


        afvGetInitData: function () {
            console.log("afvGetInitData()");
            var that = this;

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: wpHomeUrl + "/wp-admin/admin-ajax.php",
                data: {
                    action: "afv_get_init_data",
                },
                complete: function (data) {
                    data = JSON.parse(data.responseText);
                    console.log("data: ", data);
                    if (data.status == "success") {

                        that.form.autoVerArr = [];
                        if (data.afv_auto_ver == "enabled") {
                            that.form.autoVerArr.push("afv_auto_ver_enabled");
                            that.form.autoVerVal = "enabled";
                        } else if (data.afv_manual_ver == "enabled") {
                            that.form.manualVerArr.push("afv_manual_ver_enabled");
                            that.form.manualVerVal = "enabled";
                        }

                        that.form.verTargetFile = data.afv_ver_target_file;
                        that.form.manualVerInput = data.afv_manual_ver_input;

                    } //end of if (data.status == "success")

                    that.form.isInitDataLoaded = true;

                }
            });

        }, //end of afvGetInitData()


        afvIsInArray: function (value, array) {
            return array.indexOf(value) > -1;
        },


        afvToggleAutoVer: function() {
            console.log('toggleAutoVer()');
            var that = this;

            if (!this.afvIsInArray("afv_auto_ver_enabled", this.form.autoVerArr)) {
                this.form.autoVerArr.push("afv_auto_ver_enabled");
                this.form.autoVerVal = "enabled";
            } else {
                this.form.autoVerArr = [];
                this.form.autoVerVal = "disabled";
            }

            //Disable manual version
            this.form.manualVerArr = [];
            this.form.manualVerVal = "disabled";

        }, //end of afvToggleAutoVer()


        afvToggleManualVer: function () {
            console.log('toggleManualVer()');
            var that = this;

            if (!this.afvIsInArray("afv_manual_ver_enabled", this.form.manualVerArr)) {
                this.form.manualVerArr.push("afv_manual_ver_enabled");
                this.form.manualVerVal = "enabled";
            } else {
                this.form.manualVerArr = [];
                this.form.manualVerVal = "disabled";
            }

            //Disable auto version
            this.form.autoVerArr = [];
            this.form.autoVerVal = "disabled";

        }, //end of afvToggleManualVer()


        afvSaveChanges: function() {
            var that = this;
            // console.log("saveChanges()");
            // console.log('autoVerVal:', that.form.autoVerVal);
            // console.log('manualVerVal:', that.form.manualVerVal);
            // console.log('manualVerInput:', that.form.manualVerInput);
            // console.log('verTargetFile:', that.form.verTargetFile);

            //Check if manualVerInput is blank
            if (that.form.manualVerVal == "enabled" && that.form.manualVerInput == "") {
                vex.dialog.open({
                    message: 'Please specify manual file version.',
                    buttons: [$.extend({}, vex.dialog.buttons.YES, { text: 'Ok' })]
                });
                return;
            }

            this.form.isDoingAjax = true;
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: wpHomeUrl + "/wp-admin/admin-ajax.php",
                data: {
                    action: "afv_save_changes",
                    auto_ver_val: that.form.autoVerVal,
                    manual_ver_val: that.form.manualVerVal,
                    manual_ver_input: that.form.manualVerInput,
                    ver_target_file: that.form.verTargetFile,
                },
                complete: function (data) {
                    that.form.isDoingAjax = false;
                    data = JSON.parse(data.responseText);
                    console.log("data: ", data);
                    if (data.status == "success") {
                        vex.dialog.open({
                            message: 'AFV settings updated.',
                            buttons: [$.extend({}, vex.dialog.buttons.YES, { text: 'Ok' })]
                        });

                    } //end of if (data.status == "success")

                }
            });

        }, //end of afvSaveChanges()




    }, //end of methods


    data: {
        form: {
            isInitDataLoaded: false,
            autoVerArr: [],
            autoVerVal: "disabled",
            isDoingAjax: false,
            verTargetFileArr: [
                { name:"All", value:"all"},
                { name:"CSS only", value:"css"},
                { name:"JS only", value:"js"},
            ],
            verTargetFile: "all",
            manualVerArr: [],
            manualVerVal: "disabled",
            manualVerInput: "0.0.1",
        },

    }, //End of data




});




















