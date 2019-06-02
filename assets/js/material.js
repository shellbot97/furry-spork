(function($) {
  'use strict';
  $(function() {

    $('[data-toggle="expansionPanel"]').on('click', function() {
      $('#' + $(this).attr("target-panel")).toggleClass('expanded');
    });

    /* Dropdown */
    $('[data-toggle="dropdown"]').on('click', function() {
      var menuEl = document.querySelector('#' + $(this).attr("toggle-dropdown"));
      var menu = new mdc.menu.MDCSimpleMenu(menuEl);
      menu.open = !menu.open;
    });

    mdc.autoInit();

    /* Select menu */
    var MDCSelect = mdc.select.MDCSelect;
    if ($('#hero-js-select').length) {
      var heroSelect = document.getElementById('hero-js-select');
      var heroSelectComponent = new mdc.select.MDCSelect(heroSelect);
    }
    if ($('#hero-js-select2').length) {
      var heroSelect2 = document.getElementById('hero-js-select2');
      var heroSelectComponent2 = new mdc.select.MDCSelect(heroSelect2);
    }
    if ($('#hero-js-select3').length) {
      var heroSelect2 = document.getElementById('hero-js-select3');
      var heroSelectComponent2 = new mdc.select.MDCSelect(heroSelect2);
    }
    if ($('#hero-js-select4').length) {
      var heroSelect2 = document.getElementById('hero-js-select4');
      var heroSelectComponent2 = new mdc.select.MDCSelect(heroSelect2);
    }
    if ($('#hero-js-select5').length) {
      var heroSelect2 = document.getElementById('hero-js-select5');
      var heroSelectComponent2 = new mdc.select.MDCSelect(heroSelect2);
    }

    /* text field */
    if ($('#tf-box-example').length) {
      var tfEl = document.getElementById('tf-box-example');
      var tf = new mdc.textField.MDCTextField(tfEl);
    }
    if ($('#tf-box-example2').length) {
      var tfEl2 = document.getElementById('tf-box-example2');
      var tf2 = new mdc.textField.MDCTextField(tfEl2);
    }
    if ($('#tf-box-example3').length) {
      var tfEl2 = document.getElementById('tf-box-example3');
      var tf2 = new mdc.textField.MDCTextField(tfEl2);
    }
    if ($('#tf-box-example4').length) {
      var tfEl2 = document.getElementById('tf-box-example4');
      var tf2 = new mdc.textField.MDCTextField(tfEl2);
    }
    if ($('#tf-box-example5').length) {
      var tfEl2 = document.getElementById('tf-box-example5');
      var tf2 = new mdc.textField.MDCTextField(tfEl2);
    }
    if ($('#demo-tf-box-wrapper').length) {
      var wrapper = document.getElementById('demo-tf-box-wrapper');
    }
    if ($('#tf-box-leading-example').length) {
      var tfBoxLeadingEl = document.getElementById('tf-box-leading-example');
      var tfBoxLeading = new mdc.textField.MDCTextField(tfBoxLeadingEl);
    }
    if ($('#demo-tf-box-leading-wrapper').length) {
      var wrapperBoxLeading = document.getElementById('demo-tf-box-leading-wrapper');
    }
    if ($('#tf-outlined-example').length) {
      var tfEl = document.getElementById('tf-outlined-example');
      var tf = new mdc.textField.MDCTextField(tfEl);
    }
    if ($('#demo-tf-outlined-wrapper').length) {
      var wrapper = document.getElementById('demo-tf-outlined-wrapper');
    }
  });
})(jQuery);