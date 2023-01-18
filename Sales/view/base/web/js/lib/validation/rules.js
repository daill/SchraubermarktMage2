
define([
    'jquery',
    'underscore',
    'moment',
    'mage/translate'
], function ($, _, moment) {
    'use strict';

    return function (validator) {
        var validators = {
            'validate-zero-or-greater': [
                function (value) {
                    if (typeof value == 'string' && value.indexOf(",") > -1) {
                        value = value.replace(/,/g, '.');
                    }
                    return utils.isEmptyNoTrim(value) || !isNaN(utils.parseNumber(value))
                        && value >= 0 && (/^\s*-?\d+([,.]\d+)*\s*%?\s*$/).test(value);
                },
                $.mage.__('Please enter a number 0 or greater, without comma in this field.')
            ],
            'validate-greater-than-zero': [
                function (value) {
                    if (typeof value == 'string' && value.indexOf(",") > -1) {
                        value = value.replace(/,/g, '.');
                    }
                    return utils.isEmptyNoTrim(value) || !isNaN(utils.parseNumber(value))
                        && value > 0 && (/^\s*-?\d+([,.]\d+)*\s*%?\s*$/).test(value);
                },
                $.mage.__('Please enter a number greater than 0, without comma in this field.')
            ],
            'validate-css-length': [
                function (value) {
                    if (value !== '') {
                        return (/^[0-9]*\.*[0-9]+(px|pc|pt|ex|em|mm|cm|in|%)?$/).test(value);
                    }
    
                    return true;
                },
                $.mage.__('Please input a valid CSS-length (Ex: 100px, 77pt, 20em, .5ex or 50%).')
            ],
        };

        validators = _.mapObject(validators, function (data) {
            return {
                handler: data[0],
                message: data[1]
            };
        });

        return $.extend(validator, validators);
    };
});