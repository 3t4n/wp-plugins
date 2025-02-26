/**
 * ArianeLab Admin lib
 *
 * PHP version 5
 *
 * @category Plugin
 * @package  ArianeLab
 * @author   Guillaume Leroy <gleroy@arianelab.com>
 * @license  Copyright ArianeLab
 * @version  1.0
 * @link     https://www.arianelab.com
 */
var alm;

jQuery(document).ready(function($) {
  alm = new ALBackEnd();
  alm.init();
});

/**
 * Class ALBackEnd
 */
function ALBackEnd() {
  /**
   * Disable visit tag
   *
   * @var bool
   */
  this.novisit = false;

  /**
   * Enable visit tag
   *
   * @var bool
   */
  this.visitonly = false;

  /**
   * Initialize handlers
   *
   * @return void
   */
  this.init = function() {
    jQuery(".arianelab_tag").on("change", this.run.bind(this));
    jQuery(".arianelab_tag").each(this.initCheckBox.bind(this));
  };

  /**
   * Initialize checkboxes
   *
   * @param int        i   Element index
   * @param DOMElement elm Dom Element
   *
   * @return void
   */
  this.initCheckBox = function(i, elm) {
    this.run({ target: elm });
  };

  /**
   * Run check
   *
   * @param Event evt CTA Event
   *
   * @return void
   */
  this.run = function(evt) {
    this.novisit = false;
    this.visitonly = false;
    this.check(evt);
  };

  /**
   * Disable tag field
   *
   * @param DOMElement elm DOM Element
   *
   * @return void
   */
  this.disable = function(elm) {
    jQuery("#card_" + elm).addClass("disabled");
    jQuery("#arianelab_tag_" + elm).attr("checked", false);
    jQuery("#card_" + elm + " input").attr("disabled", "disabled");
    jQuery("#arianelab_tag_" + elm + "_cfg").hide();
    if (elm === "visit") {
      this.novisit = true;
      this.visitonly = false;
    } else {
      //this.visitonly = false;
    }
  };

  /**
   * Enable tag field
   *
   * @param DOMElement elm DOM Element
   *
   * @return void
   */
  this.enable = function(elm) {
    jQuery("#card_" + elm).removeClass("disabled");
    jQuery("#card_" + elm + " input").attr("disabled", false);
    if (elm === "visit") {
      this.novisit = false;
      this.visitonly = true;
    } else {
      //this.visitonly = false;
    }
  };

  /**
   * Check selected tags
   *
   * @param Event evt Event
   *
   * @return void
   */
  this.check = function(evt) {
    jQuery(".arianelab_tag").each(this.checkStatus.bind(this));
    if (this.novisit === true) {
      this.disable("visit");
      this.enable("sub");
      this.enable("diff");
    } else {
      this.enable("visit");
      if (
        jQuery(evt.target).val() == "visit" &&
        jQuery(evt.target).is(":checked")
      ) {
        this.disable("sub");
        this.disable("diff");
      } else {
        this.enable("sub");
        this.enable("diff");
      }
    }
    // TODO : if
  };

  /**
   * Check selected tags
   *
   * @param int        i   Element index
   * @param DOMElement elm DOM Element
   *
   * @return void
   */
  this.checkStatus = function(i, elm) {
    if (jQuery(elm).is(":checked")) {
      if (jQuery(elm).val() !== "visit") {
        this.novisit = true;
      }
      jQuery("#" + jQuery(elm).attr("id") + "_cfg").show();
    } else {
      jQuery("#" + jQuery(elm).attr("id") + "_cfg").hide();
    }
  };

  return this;
}
