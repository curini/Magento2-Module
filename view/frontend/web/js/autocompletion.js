define([
  "jquery",
  "Magento_Ui/js/lib/validation/validator",
  "jquery-ui-modules/autocomplete",
  "jquery-ui-modules/widget",
], function ($) {
  "use strict";

  $.widget("mage.emailAutocomplete", {
    options: {
      ajax_url: "",
      source: [],
    },

    _create: function () {
      const self = this;

      $.getJSON(this.options.ajax_url).then(function (data) {
        self.options.source = data;
        self.element.on("keyup", self.autocompletion.bind(self));
        self.element.on("blur", self.verify.bind(self));
      });
    },

    verify: function () {
      const validator = this.element.closest("form").validate();

      if (validator) {
        validator.element(this.element);
      }
    },

    disableNavigatorAutofill: function () {
      this.element.attr("autocomplete", "new-password");
    },

    autocompletion: function () {
      const self = this;

      self.disableNavigatorAutofill();

      self.element.autocomplete({
        source: function (request, response) {
          if (request.term.indexOf("@") === -1) {
            response([]);
          } else {
            let requestSplited = request.term.split("@");

            if (requestSplited.length > 2) {
              response([]);
              return;
            }

            let term = request.term.split("@")[0];
            let domainPart = request.term.split("@")[1].toLowerCase();

            let results = $.map(self.options.source, function (item) {
              return item.startsWith(domainPart) ? term + "@" + item : null;
            });

            response(results);
          }
        },
        appendTo: self.element.parent(),
        select: function (ui, item) {
          self.element.val(item.item.value);
          self.verify();
        },
      });
    },
  });

  return $.mage.emailAutocomplete;
});
