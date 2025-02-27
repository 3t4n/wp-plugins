

var wpElem = wp.element;
var wpCreateElem = wpElem.createElement;
var favIcon = wpCreateElem("img", {
    src: "https://formafzar.com/assets/img/RaveshForm_logo2.png",
    alt: "formafzar"
});

var firstFormInit = false;
var RVCelement;
wp.blocks.registerBlockType('formafzar/formafzar-forms', {
    title: 'formafzar Forms',
    icon: favIcon,
    category: 'embed',
    attributes: {
        RVCshort_code: { type: 'string' },
        RVCsecret_code: { type: 'string' },
        RVCformid_code: { type: 'string' },
        RVCType_code: { type: 'string' }
    },
    edit: function (props) {
        if (!firstFormInit) {
            firstFormInit = true;
            setTimeout(function () {
                var zformsShortCode = props.attributes.RVCshort_code;
                if (zformsShortCode != undefined && zformsShortCode.length != 0) {
                    document.getElementById("tSecretCode").value = props.attributes.RVCsecret_code;
                    document.getElementById("TformId").value = props.attributes.RVCformid_code;
                    document.getElementById("Ttype").value=props.attributes.RVCType_code;
                }
            }, 1000);


        } else {
            var zformsShortCode = props.attributes.RVCshort_code;
            if (zformsShortCode != undefined && zformsShortCode.length != 0) {
                document.getElementById("tSecretCode").value=props.attributes.RVCsecret_code;
                document.getElementById("TformId").value =props.attributes.RVCformid_code;
                document.getElementById("Ttype").value=props.attributes.RVCType_code;
            }
        }



        function createFormLink() {
            var domain = document.getElementById("tSecretCode").value;
            var formId = document.getElementById("TformId").value; 
            var type = document.getElementById("Ttype").value;
            if (domain.trim() == '') { alert("شناسه امنیتی وارد نشده است"); return false };
            if (formId.trim() == '') { alert("شناسه فرم وارد نشده است"); return false };
            var shortCode = "[FormAfzar secretCode=\"" + domain + "\" formid=\"" + formId + "\" type=\"" + type + "\"]";
            props.setAttributes({ RVCformid_code: formId });
            props.setAttributes({ RVCshort_code: shortCode });
            props.setAttributes({ RVCsecret_code: domain });
            props.setAttributes({ RVCType_code: type });
            alert("اطلاعات با موفقیت ذخیره شد");

        }
        RVCelement = wpCreateElem("div", { class: "RVC-wb-twoColumns" },
                                           wpCreateElem("div",
                                               {
                                                   class: "RVC-wb-innerWrapper flLeft"
                                               },
                                               wpCreateElem("label", null, "شناسه امنیتی"),
                                               wpCreateElem("div",
                                                   null,
                                                   wpCreateElem("input",
                                                       {
                                                           type: "text",
                                                           id: "tSecretCode",
                                                           placeholder: "شناسه امنیتی"
                                                       }
                                                   )
                                               )
                                           ),
                                           wpCreateElem("div",
                                               {
                                                   class: "RVC-wb-innerWrapper flRight"
                                               },
                                               wpCreateElem("label", null, "شناسه فرم "),
                                               wpCreateElem("div",
                                                   null,
                                                   wpCreateElem("input",
                                                       {
                                                           type: "number",
                                                           id: "TformId",
                                                           placeholder: "شناسه فرم"
                                                       }
                                                   )
                                               )
                                           ),
                                           wpCreateElem("label", null, "نحوه نمایش"),
                                   wpCreateElem("div",
                                       {
                                           class: "RVC-wb-dropWrapper"
                                       },
                                       wpCreateElem("select",
                                           {
                                               id: "Ttype"
                                           },
                                           wpCreateElem("option", { value: "inline" }, "اسکریپت"),
                                           wpCreateElem("option", { value: "dialog" }, "پنجره کوچک"),
                                           wpCreateElem("option", { value: "fab" }, "دکمه شناور"),
                                           wpCreateElem("option", { value: "link" }, "لینک")
                                       )
                                   )

                                           , wpCreateElem("button", { id: "createFormLink", onClick: createFormLink, class: "RVC-wb-green" }, "ذخیره فرم")
                                       );
        return RVCelement;
    },
    save: function (props) {
        return wpCreateElem(
  			"div",
  			null,
  			props.attributes.RVCshort_code
  		)

    }
})