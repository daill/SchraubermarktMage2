define([
    'jquery',
], function($) {
    'use strict';
  
    return function(targetWidget) {
      $.validator.addRule(
        'validate-zero-or-greater',
        function (value) {
            if (typeof value == 'string' && value.indexOf(",") > -1) {
                value = value.replace(/,/g, '.');
            }
            return $.mage.isEmptyNoTrim(value) || !$.mage.isNaN(utils.parseNumber(value))
                && value >= 0 && (/^\s*-?\d+([,.]\d+)*\s*%?\s*$/).test(value);
        },
        $.mage.__('Please enter a number 0 or greater, without comma in this field.')
      )
      return targetWidget;
    }
  });