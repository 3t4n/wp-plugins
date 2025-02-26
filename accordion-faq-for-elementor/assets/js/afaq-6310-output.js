
  jQuery(window).load(function () {
    //Page Load
    var FAQList = jQuery(".afaq-6310-faq-for-elementor");
    FAQList.each(function () {
      var ids = jQuery(this).attr("data-database-id");
      let category = Number(jQuery(this).attr("data-category-active"));
      let categoryDefault = Number(
        jQuery(this).attr("data-default-category-active")
      );
      let iconClass = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
        "data-icon-class"
      );
      let upArrow = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
        "data-up-arrow"
      );
      let downArrow = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
        "data-down-arrow"
      );
      let faqMode = Number(
        jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr("data-faq-mode")
      );
      let categoryClassName = "";

      if (category == 1 && categoryDefault == 1) {
        jQuery(".afaq-6310-faq-template-"+ ids).show();
      } else if (category == 0) {
        jQuery(".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-common-head:first, .afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content:first").show();
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +":first ."+ iconClass +" i"
        ).attr("class", upArrow);
      }

      //get selected category
      if (category == 1 && categoryDefault == 1) {
        categoryClassName = jQuery(
          ".afaq-6310-category-template-" + ids +"-wrapper:first"
        ).attr("data-category-class-name");
      } else if (category == 1 && categoryDefault == 0) {
        categoryClassName = "afaq-6310-no-category-selected-dummy";
      }

      //FAQ Mode
      if (faqMode == 1) {
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-label-head"
        ).removeClass("afaq-6310-faq-template-"+ ids +"-active");   
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
        ).hide();
        jQuery(".afaq-6310-faq-for-elementor-"+ ids +" ."+ iconClass +" i").attr(
          "class",
          downArrow
        );
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
        ).hide();
        //Setting tabs
        if (categoryClassName == "") {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +":first .afaq-6310-faq-template-common-head"
          ).addClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +":first .afaq-6310-faq-template-common-head ."+ iconClass +" i"
          ).attr("class", upArrow);
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +":first .afaq-6310-faq-template-"+ ids +"-content"
          ).show();
        } else {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids
          ).hide();
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName
          ).show();
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +":first .afaq-6310-faq-template-"+ ids +"-label-head"
          ).addClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +":first ."+ iconClass +" i"
          ).attr("class", upArrow);
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +":first .afaq-6310-faq-template-"+ ids +"-content"
          ).show();
        }
      } else if (faqMode == 2) {
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-label-head"
        ).removeClass("afaq-6310-faq-template-"+ ids +"-active");
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
        ).hide();
        jQuery(".afaq-6310-faq-for-elementor-"+ ids +" ."+ iconClass +" i").attr(
          "class",
          downArrow
        );
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
        ).hide();

        if (categoryClassName == "") {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-common-head"
          ).addClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-common-head ."+ iconClass +" i"
          ).attr("class", upArrow);
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).show();
        } else {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids
          ).hide();
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName
          ).show();
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" .afaq-6310-faq-template-"+ ids +"-label-head"
          ).addClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" ."+ iconClass +" i"
          ).attr("class", upArrow);
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" .afaq-6310-faq-template-"+ ids +"-content"
          ).show();
        }
      } else if (faqMode == 3) {
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-common-head"
        ).removeClass("afaq-6310-faq-template-"+ ids +"-active");
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
        ).hide();
        jQuery(".afaq-6310-faq-for-elementor-"+ ids +" ."+ iconClass +" i").attr(
          "class",
          downArrow
        );
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
        ).hide();

        if (categoryClassName == "") {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-common-head ."+ iconClass +" i"
          ).attr("class", downArrow);
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();
        } else {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids
          ).hide();
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName
          ).show();
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" ."+ iconClass +" i"
          ).attr("class", downArrow);
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();
        }
      }
    });
    //Page load Script End

    //Category Click
    jQuery("body").on(
      "click",
      ".afaq-6310-category-template-wrapper",
      function () {
        let ids = jQuery(this)
          .closest(".afaq-6310-faq-for-elementor")
          .attr("data-database-id");
        jQuery(
          ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-search-template-input"
        ).val("");
        let iconClass = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
          "data-icon-class"
        );
        let upArrow = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
          "data-up-arrow"
        );
        let downArrow = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
          "data-down-arrow"
        );
        let faqMode = Number(
          jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr("data-faq-mode")
        );

        if (!jQuery(this).hasClass("afaq-6310-category-wrapper-active")) {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-category-template-wrapper"
          ).removeClass("afaq-6310-category-wrapper-active");
        }
        jQuery(this).addClass("afaq-6310-category-wrapper-active");
        let categoryClassName = jQuery(this).attr("data-category-class-name");
        //FAQ Mode
        if (faqMode == 1) {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-label-head"
          ).removeClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();
          jQuery(".afaq-6310-faq-for-elementor-"+ ids +" ."+ iconClass +" i").attr(
            "class",
            downArrow
          );
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();
          //Setting tabs
          if (categoryClassName == "") {
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-common-head"
            ).addClass("afaq-6310-faq-template-"+ ids +"-active");
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +":first .afaq-6310-faq-template-common-head ."+ iconClass +" i"
            ).attr("class", upArrow);
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +":first .afaq-6310-faq-template-"+ ids +"-content"
            ).show();
          } else {
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids
            ).hide();
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName
            ).show();
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +":first .afaq-6310-faq-template-"+ ids +"-label-head"
            ).addClass("afaq-6310-faq-template-"+ ids +"-active");
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +":first ."+ iconClass +" i"
            ).attr("class", upArrow);
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +":first .afaq-6310-faq-template-"+ ids +"-content"
            ).show();
          }
        } else if (faqMode == 2) {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-label-head"
          ).removeClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();
          jQuery(".afaq-6310-faq-for-elementor-"+ ids +" ."+ iconClass +" i").attr(
            "class",
            downArrow
          );
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();

          if (categoryClassName == "") {
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-common-head"
            ).addClass("afaq-6310-faq-template-"+ ids +"-active");
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-common-head ."+ iconClass +" i"
            ).attr("class", upArrow);
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
            ).show();
          } else {
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids
            ).hide();
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName
            ).show();
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" .afaq-6310-faq-template-"+ ids +"-label-head"
            ).addClass("afaq-6310-faq-template-"+ ids +"-active");
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" ."+ iconClass +" i"
            ).attr("class", upArrow);
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" .afaq-6310-faq-template-"+ ids +"-content"
            ).show();
          }
        } else if (faqMode == 3) {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-label-head"
          ).removeClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();
          jQuery(".afaq-6310-faq-for-elementor-"+ ids +" ."+ iconClass +" i").attr(
            "class",
            downArrow
          );
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();

          if (categoryClassName == "") {
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-common-head ."+ iconClass +" i"
            ).attr("class", downArrow);
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
            ).hide();
          } else {
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids
            ).hide();
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName
            ).show();
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" ."+ iconClass +" i"
            ).attr("class", downArrow);
            jQuery(
              ".afaq-6310-faq-for-elementor-"+ ids +" ."+ categoryClassName +" .afaq-6310-faq-template-"+ ids +"-content"
            ).hide();
          }
        }
        dynamicCSS(jQuery(this)
        .closest(".afaq-6310-faq-for-elementor")
        .attr("class").split(' ').pop()); 
      }
    );

    //search Section
    jQuery("body").on(
      "keyup",
      ".afaq-6310-faq-for-elementor .afaq-6310-search-template-input",
      function () {
        var ids = jQuery(this)
          .closest(".afaq-6310-faq-for-elementor")
          .attr("data-database-id");
        var value = jQuery(this).val().toLowerCase();
        let iconClass = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
          "data-icon-class"
        );
        let upArrow = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
          "data-up-arrow"
        );
        let downArrow = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
          "data-down-arrow"
        );
        let categoryTemId = jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
          "data-category-template"
        );
        let faqMode = Number(
          jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr("data-faq-mode")
        );
        let categoryActive = Number(
          jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
            "data-category-active"
          )
        );
        let categoryDefault = Number(
          jQuery(".afaq-6310-faq-for-elementor-"+ ids).attr(
            "data-default-category-active"
          )
        );

        jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-category-template-wrapper"
        ).removeClass("afaq-6310-category-wrapper-active");

        jQuery(".afaq-6310-faq-template-"+ ids).removeClass(
          "afaq-6310-search-filter-class"
        );
        if (value.length > 0) {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-category-template-"+ categoryTemId +"-wrapper"
          ).removeClass("afaq-6310-category-wrapper-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids
          ).filter(function () {
            var title = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-head-title")
              .text()
              .toLowerCase();
            var description = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-content-feature")
              .text()
              .toLowerCase();
            jQuery(this).toggle(
              title.indexOf(value) > -1 || description.indexOf(value) > -1
            );
            if (title.indexOf(value) > -1 || description.indexOf(value) > -1) {
              jQuery(this).addClass("afaq-6310-search-filter-class");
            }
          });
        } else if (categoryActive == 1 && categoryDefault == 1) {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-category-template-wrapper:first"
          ).trigger("click");
          var firstClassName = jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-category-template-wrapper:first"
          ).attr("data-category-class-name");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" ."+ firstClassName
          ).filter(function () {
            var title = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-head-title")
              .text()
              .toLowerCase();
            var description = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-content-feature")
              .text()
              .toLowerCase();
            jQuery(this).toggle(
              title.indexOf(value) > -1 || description.indexOf(value) > -1
            );
            if (title.indexOf(value) > -1 || description.indexOf(value) > -1) {
              jQuery(this).addClass("afaq-6310-search-filter-class");
            }
          });
        } else if (categoryActive == 1 && categoryDefault == 0) {
          jQuery(".afaq-6310-faq-template-"+ ids).hide();
        } else if (value.length == 0 && categoryActive == 0) {
          jQuery(".afaq-6310-faq-template-"+ ids).show();
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids
          ).filter(function () {
            var title = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-head-title")
              .text()
              .toLowerCase();
            var description = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-content-feature")
              .text()
              .toLowerCase();
            jQuery(this).toggle(
              title.indexOf(value) > -1 || description.indexOf(value) > -1
            );
            if (title.indexOf(value) > -1 || description.indexOf(value) > -1) {
              jQuery(this).addClass("afaq-6310-search-filter-class");
            }
          });
        }

        //FAQ Mode Start
        if (faqMode == 1) {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-label-head"
          ).removeClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(".afaq-6310-faq-for-elementor-"+ ids +" ."+ iconClass +" i").attr(
            "class",
            downArrow
          );
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();
          //Setting tabs
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-search-filter-class:first .afaq-6310-faq-template-"+ ids +"-label-head"
          ).addClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-search-filter-class:first ."+ iconClass +" i"
          ).attr("class", upArrow);
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-search-filter-class:first .afaq-6310-faq-template-"+ ids +"-content"
          ).show();
        } else if (faqMode == 2) {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-search-filter-class .afaq-6310-faq-template-"+ ids +"-label-head"
          ).addClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-search-filter-class ."+ iconClass +" i"
          ).attr("class", upArrow);
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-search-filter-class .afaq-6310-faq-template-"+ ids +"-content"
          ).show();
        } else if (faqMode == 3) {
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-label-head"
          ).removeClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(".afaq-6310-faq-for-elementor-"+ ids +" ."+ iconClass +" i").attr(
            "class",
            upArrow
          );
          jQuery(
            ".afaq-6310-faq-for-elementor-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();
        }
        //FAQ Mode End
        dynamicCSS(jQuery(this)
        .closest(".afaq-6310-faq-for-elementor")
        .attr("class").split(' ').pop()); 
      }
    );

    //Click expand/hide section
    jQuery("body").on(
      "click",
      ".afaq-6310-faq-template-common-head",
      function () {
        var ids = jQuery(this)
          .closest(".afaq-6310-faq-for-elementor")
          .attr("data-database-id");
        var animation_duration = jQuery(this)
          .closest(".afaq-6310-faq-for-elementor")
          .attr("data-animation-duration");
        var content = jQuery(".afaq-6310-faq-template-"+ ids +"-content");
        let iconClass = jQuery(".afaq-6310-faq-for-elementor-"+ids).attr(
          "data-icon-class"
        );
        let upArrow = jQuery(".afaq-6310-faq-for-elementor-"+ids).attr(
          "data-up-arrow"
        );
        let downArrow = jQuery(".afaq-6310-faq-for-elementor-"+ids).attr(
          "data-down-arrow"
        );
        let faqMode = Number(
          jQuery(".afaq-6310-faq-for-elementor-"+ids).attr("data-faq-mode")
        );
        let enableCollapsible = Number(
          jQuery(".afaq-6310-faq-for-elementor-"+ids).attr(
            "data-enable-collapsible"
          )
        );

        if (faqMode == 2) {
          enableCollapsible = 1;
        }
        if (faqMode != 2 && !enableCollapsible) {
          content.slideUp(animation_duration * 1000);
        }

        if (jQuery(this).hasClass("afaq-6310-faq-template-"+ ids +"-active")) {
          jQuery(this).removeClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(this).find("."+ iconClass +" i").attr("class", downArrow);
          if (faqMode == 2) {
            jQuery(this)
              .siblings(".afaq-6310-faq-template-"+ ids +"-content")
              .slideUp(animation_duration * 1000);
          } else if (enableCollapsible) {
            jQuery(this)
              .siblings(".afaq-6310-faq-template-"+ ids +"-content")
              .slideUp(animation_duration * 1000);
          }
        } else {
          if (faqMode != 2 && !enableCollapsible) {
            jQuery(".afaq-6310-faq-template-"+ ids +"-label-head").removeClass(
              "afaq-6310-faq-template-"+ ids +"-active"
            );
          }
          jQuery(this).addClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(this)
            .next()
            .slideDown(animation_duration * 1000);
          if (!enableCollapsible) {
            jQuery("."+ iconClass +" i").attr("class", downArrow);
          }
          jQuery(this).find("."+ iconClass +" i").attr("class", upArrow);
        }
      }
    );

    // ############ Special Section Start ############
    //Page Load
    var FAQListSpecial = jQuery(".afaq-6310-faq-for-elementor-special");
    FAQListSpecial.each(function () {
      var ids = jQuery(this).attr("data-database-id");
      let category = Number(jQuery(this).attr("data-category-active"));
      let categoryDefault = Number(
        jQuery(this).attr("data-default-category-active")
      );
      let iconClass = jQuery(
        ".afaq-6310-faq-for-elementor-special-"+ ids
      ).attr("data-icon-class");
      let upArrow = jQuery(".afaq-6310-faq-for-elementor-special-"+ ids).attr(
        "data-up-arrow"
      );

      if (category == 1 && categoryDefault == 1) {
        jQuery(".afaq-6310-faq-template-"+ ids).show();
        jQuery(".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-"+ ids +":first .afaq-6310-faq-template-"+ ids +"-panel-body").addClass(
          "afaq-6310-faq-template-"+ ids +"-panel-title-icon"
        );
      } else if (category == 0) {
        jQuery(".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-"+ ids +":first .afaq-6310-faq-template-"+ ids +"-panel-body").show();
      }
    });

    setTimeout(() => {
      var activeListSpecial = jQuery(".afaq-6310-category-wrapper-active");
      activeListSpecial.each(function () {
        // jQuery(this).trigger('click');
      });
    }, 10);

    jQuery("body").on(
      "click",
      ".afaq-6310-category-template-wrapper-special",
      function () {
        let ids = jQuery(this)
          .closest(".afaq-6310-faq-for-elementor-special")
          .attr("data-database-id");
        if (!jQuery(this).hasClass("afaq-6310-category-wrapper-active")) {
          jQuery(
            ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-category-template-wrapper-special"
          ).removeClass("afaq-6310-category-wrapper-active");
        }
        jQuery(this).addClass("afaq-6310-category-wrapper-active");
        let className = jQuery(this).attr("data-category-class-name");
        jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-"+ ids
        ).hide();
        jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-"+ ids +"-label-head"
        ).removeClass("afaq-6310-faq-template-"+ ids +"-active");
        jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
        ).hide();
        jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids +" ."+ className
        ).show();
        jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids +" .active-search-template input"
        ).val("");
      }
    );

    //search Section
    jQuery("body").on(
      "keyup",
      ".afaq-6310-faq-for-elementor-special .afaq-6310-search-template-input",
      function () {
        var ids = jQuery(this)
          .closest(".afaq-6310-faq-for-elementor-special")
          .attr("data-database-id");
        var value = jQuery(this).val().toLowerCase();
        let categoryDefault = Number(
          jQuery(this)
            .closest(".afaq-6310-faq-for-elementor-special")
            .attr("data-default-category-active")
        );
        let category = Number(
          jQuery(this)
            .closest(".afaq-6310-faq-for-elementor-special")
            .attr("data-category-active")
        );
        let iconClass = jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids
        ).attr("data-icon-class");
        let upArrow = jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids
        ).attr("data-up-arrow");
        let downArrow = jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids
        ).attr("data-down-arrow");

        if (value.length > 0) {
          jQuery(
            ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-"+ ids +"-panel-title span"
          ).addClass("afaq-6310-faq-template-"+ ids +"-panel-title-icon");
          jQuery(
            ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-"+ ids +"-panel-body"
          ).hide();

          jQuery(".afaq-6310-faq-template-"+ ids).filter(function () {
            var title = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-panel-title-icon")
              .text()
              .toLowerCase();
            var description = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-panel-body")
              .text()
              .toLowerCase();
            jQuery(this).toggle(
              title.indexOf(value) > -1 || description.indexOf(value) > -1
            );
          });
        } else if (category == 1 && categoryDefault == 1) {
          jQuery(
            ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-category-template-"+ ids +"-wrapper:first"
          ).trigger("click");
          jQuery(".afaq-6310-faq-template-"+ ids).filter(function () {
            var title = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-panel-title-icon")
              .text()
              .toLowerCase();
            var description = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-panel-body")
              .text()
              .toLowerCase();
            jQuery(this).toggle(
              title.indexOf(value) > -1 || description.indexOf(value) > -1
            );
          });
        } else if (value.length == 0 && category == 1 && categoryDefault == 0) {
          jQuery(".afaq-6310-faq-template-"+ ids).hide();
        } else if (value.length == 0 && category == 0) {
          //No category selected
          jQuery(
            ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-common-head"
          ).removeClass("afaq-6310-faq-template-"+ ids +"-active");
          jQuery(
            ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-"+ ids +"-content"
          ).hide();
          jQuery(
            ".afaq-6310-faq-for-elementor-special-"+ ids +" .afaq-6310-faq-template-"+ ids +" ."+ iconClass +" i"
          ).attr("class", downArrow);

          jQuery(".afaq-6310-faq-template-"+ ids).filter(function () {
            var title = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-head-title")
              .text()
              .toLowerCase();
            var description = jQuery(this)
              .find(".afaq-6310-faq-template-"+ ids +"-content-feature")
              .text()
              .toLowerCase();
            jQuery(this).toggle(
              title.indexOf(value) > -1 || description.indexOf(value) > -1
            );
          });
        }
      }
    );

    //Click expand/hide section
    jQuery("body").on(
      "click",
      ".afaq-6310-faq-template-common-head-special",
      function () {
        var ids = jQuery(this)
          .closest(".afaq-6310-faq-for-elementor-special")
          .attr("data-database-id");
        var animation_duration = jQuery(this)
          .closest(".afaq-6310-faq-for-elementor-special")
          .attr("data-animation-duration");
        var content = jQuery(".afaq-6310-faq-template-"+ ids +"-content");
        let iconClass = jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids
        ).attr("data-icon-class");
        let upArrow = jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids
        ).attr("data-up-arrow");
        let downArrow = jQuery(
          ".afaq-6310-faq-for-elementor-special-"+ ids
        ).attr("data-down-arrow");

        jQuery(".afaq-6310-faq-template-"+ ids +"-panel-body").slideUp(
          animation_duration * 1000
        );
        if (
          jQuery(this)
            .find(".afaq-6310-faq-template-"+ ids +"-panel-title span")
            .hasClass("afaq-6310-faq-template-"+ ids +"-panel-title-icon")
        ) {
          jQuery(
            ".afaq-6310-faq-template-"+ ids +"-panel .afaq-6310-faq-template-"+ ids +"-label-head-special"
          )
            .find("span")
            .addClass("afaq-6310-faq-template-"+ ids +"-panel-title-icon");
          jQuery(this)
            .find("span")
            .removeClass("afaq-6310-faq-template-"+ ids +"-panel-title-icon");

          jQuery(this)
            .next()
            .find("div")
            .slideDown(animation_duration * 1000);
        } else {
          jQuery(
            ".afaq-6310-faq-template-"+ ids +"-panel .afaq-6310-faq-template-"+ ids +"-label-head-special"
          )
            .find("span")
            .addClass("afaq-6310-faq-template-"+ ids +"-panel-title-icon");
        }
      }
    );
    dynamicCSS('afaq-6310-template-11');  
    dynamicCSS('afaq-6310-template-15');  
    dynamicCSS('afaq-6310-template-16');  
});


function dynamicCSS(className) {
  if(className == 'afaq-6310-template-11') {
    //Template 11
    let template11 = jQuery(".afaq-6310-template-11");
    template11.each(function () {
      let id = jQuery(this).attr("data-database-id");
      let headList = jQuery(this).find(
        ".afaq-6310-faq-template-"+ id +"-label-head"
      );
      headList.each(function () {
        let height = Math.ceil(Number(jQuery(this).height()) / 2);
        jQuery(this)
          .find(".afaq-6310-faq-template-"+ id +"-label-head-before")
          .css({            
            "border-top": height +"px solid transparent",
            "border-bottom": height +"px solid transparent",
          });
        jQuery(this)
          .find(".afaq-6310-faq-template-"+ id +"-label-head-after")
          .css({
            "border-top":+ height +"px solid transparent",
            "border-bottom":+ height +"px solid transparent",
          });
      });
    });
  } else if(className == 'afaq-6310-template-15') {
    //Template 15
    let template16 = jQuery(".afaq-6310-template-15");
    template16.each(function () {
      let id = jQuery(this).attr("data-database-id");
      let border = Number(jQuery(this).attr("data-title-border-size")) * 2;
      let headList = jQuery(this).find(
        ".afaq-6310-faq-template-"+ id +"-head-right-icon"
      );
      headList.each(function () {
        let height = Number(jQuery(this).height()) + border;
        let lineHeight = height + 15;
        jQuery(this)
          .closest(".afaq-6310-faq-template-"+ id +"-right-section")
          .siblings(".afaq-6310-faq-template-"+ id +"-left-section")
          .find(".afaq-6310-faq-template-"+ id +"-head-arrow")
          .css({"height":+ height +"px","line-height":+ lineHeight +"px"});
      });
    });
  } else if(className == 'afaq-6310-template-16') {
    //Template 16
    let borderList = jQuery(".afaq-6310-template-16");
    borderList.each(function () {
      let id = jQuery(this).attr("data-database-id");
      let headList = jQuery(this).find(
        ".afaq-6310-faq-template-"+ id +"-label-head"
      );
      headList.each(function () {
        let height = Math.ceil(Number(jQuery(this).height()) / 2);
        console.log(height);
        jQuery(this)
          .find(".afaq-6310-faq-template-"+ id +"-head-right-icon-after")
          .css({
            "border-top": height +"px solid transparent",
            "border-bottom":+ height +"px solid transparent",
          });
      });
    });
  }
}